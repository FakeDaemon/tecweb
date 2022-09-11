<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_SIGNUP.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Registrazione | WikiDoom</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="keywords" content="DOOM, sign up, user" />
  <meta name="description" content="Pagina che permette la registrazione di un utente" />
  <meta http-equiv="Content-Security-Policy" content="script-src 'self' https://fonts.googleapis.com/ https://fonts.gstatic.com/;">
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
</head>

<body>
  <?php
  require 'SCRIPTS/.php/database_connection.php';
  include 'SCRIPTS/.php/user.php';
  $user = new User($conn);

  if (isset($_POST['CookieAccepted']) && $_POST['CookieAccepted'] == 'Accetta') {
    setCookie('CookieAccepted', 'Accetta', time() + (86400 * 30));
    $_COOKIE['CookieAccepted'] = 'Accetta';
    header('location : signup.php');
  }
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
  ?>
    <form class="cookie-banner" action="signup.php" method="post">
      <p>
        Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
        il contenuto e analizzare il traffico di rete.
        <a href=cookie_informativa.php>Leggi di più riguardo ai <span lang="en">cookie</span></a>
      </p>
      <input type="submit" name="CookieAccepted" value="Accetta">
    </form>
  <?php
  }
  if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    if (preg_match('/^[A-Za-z0-9]*$/', $_POST['username']) && preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])[a-zA-Z0-9]{8,15}$/', $_POST['password']) && $_POST['password'] === $_POST['passwordConfirm']) {
      $stmt = $conn->prepare("SELECT Fst_mail FROM DoomWiki.users WHERE fst_mail = ?");
      $stmt->bind_param("s", $_POST['email']);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows === 0) {
        $passw = password_hash($_POST['password'], PASSWORD_ARGON2I);
        $username = htmlspecialchars($_POST['username']);
        $currentDate = date('Y-m-d H:i:s');
        $stmt = $conn->prepare("INSERT INTO DoomWiki.users(user_name, psw, lst_psw_change, sign_in_date, fst_mail) VALUES(?, ?, ?, ?, ?);");
        $stmt->bind_param("sssss", $username, $passw, $currentDate, $currentDate, $_POST['email']);
        $stmt->execute();
        if ($stmt->affected_rows > 0)
          header("location: signup.php?msg=accountCreated");
        else
          header("location: signup.php?msg=errorOnAccountCreation");
      } else {
        $GLOBALS['AlreadySigned'] = true;
      }
    } else {
      if (!preg_match('/^[A-Za-z0-9]*$/', $_POST['username'])) {
        $GLOBALS['UsernameFormatError'] = true;
      } else if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])[a-zA-Z0-9]{8,15}$/', $_POST['password'])) {
        $GLOBALS['PasswordFormatError'] = true;
      } else {
        $GLOBALS['PasswordsDiscordant'] = true;
      }
    }
  }
  ?>
  <header>
  <h1 id="logo">DOOM WIKI</h1>
    <label id="BurgherButtonLabel" for="BurgherButton">
      Menu
    </label>
    <nav id="NavBar">
      <ul id="MenuBar">
        <li class="MenuBarItem" lang="en"><a href="/" lang="en">HOMEPAGE</a></li>
        <li class="MenuBarItemNestedList">
          <label id="NestedListLbl" for="NestedListBtn">
            TRAMA
          </label>
          <input id="NestedListBtn" type="checkbox" value="Mostra Capitoli Disponibili">
          <ul id="MenuBarNestedList">
            <li class="NestedListItem"><a href="history.php">CAPITOLO <abbr title="Primo">I</abbr></a></li>
            <li class="NestedListItem"><a href="history_2.php">CAPITOLO <abbr title="Secondo">II</abbr></a></li>
            <li class="NestedListItem"><a href="history_3.php">CAPITOLO <abbr title="Terzo">III</abbr></a></li>
            <li class="NestedListItem"><a href="history_2016.php">CAPITOLO <abbr title="Quarto">IV</abbr></a></li>
            <li class="NestedListItem"><a href="history_eternals.php">CAPITOLO <abbr title="Quinto">V</abbr></a></li>
          </ul>
        </li>
        <li class="MenuBarItem"><a href="stats.php">STATISTICHE</a></li>
        <li class="MenuBarItem"><a href="stats.php">CURIOSITÀ</a></li>
      </ul>
      <div id="MenuUserWidget">
        <div>
          <?php
          if ($user->isLogged()) echo "<p>" . $user->user_name . "</p>";
          else echo "<p>OSPITE</p>";
          if ($user->isLogged()) {
            if ($user->isSuperUser()) echo "<a href='siteManager.php'>Gestione Sito</a>";
            echo "<a href='account-managment.php'>Impostazioni</a>";
          } else {
            echo "<a href='signup.php'>Registrati</a>";
            echo "<a href='login.php'>Entra</a>";
          }
          ?>
        </div>
        <?php
        if ($user->isLogged()) echo "<img src='/IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='/IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
        ?>
      </div>
    </nav>
  </header>
  <div class="main">
    <p>ISCRIZIONE</p>
    <form id="auth_widget" action="signup.php" method="POST" novalidate>
      <?php
      if (isset($_GET["msg"]) && $_GET["msg"] == "accountCreated") {
      ?>
        <p id="ConfirmMessage"><span lang="en">Account</span> creato!</p>
        <p>Accedi e comincia subito ad interagire con la <span lang="en">community</span>!</p>
        <a href="/">Torna alla home page.</a>
      <?php
      } else if (isset($_GET["msg"]) && $_GET["msg"] == "errorOnAccountCreation") {
      ?>
        <p id="ConfirmMessage">Errore durante la creazione dell'<span lang="en">account.</span></p>
        <p>C'è stato un errore nei nostri sistemi durante la creazione dell'account. Probabilmente stiamo già lavorando per risolvere il problema, la prossima volta che proverai tutto funzionerà correttamente.</p>
        <a href="/">Torna alla home page.</a>
      <?php
      } else {
        if ($GLOBALS['AlreadySigned']) echo '<p id="ErrorMessage"><span lang="en">È gia presente un <span lang="en">account</span> registrato con l\'indirizzo <span lang="en">email</span> inserito</p>';
        if ($GLOBALS['UsernameFormatError']) echo '<p id="ErrorMessage">Nome utente non valido.</p>';
        if ($GLOBALS['PasswordFormatError']) echo '<p id="ErrorMessage"><span lang="en">Password</span> non valida.</p>';
        if ($GLOBALS['PasswordsDiscordant']) echo '<p id="ErrorMessage"><span lang="en">Password</span> diverse tra loro.</p>'
      ?>
        <p id="username_hints"><span lang="en">Username</span>: <span class="sr_only">Deve essere formato da una sola parola, può contenere uno o più numeri ma non deve contenere simboli.</span>
        </p>
        <ul aria-hidden="true">
          <li>Deve essere formato da una singola parola;</li>
          <li>Può contenere uno o più numeri;</li>
          <li>Non deve contenere simboli.</li>
        </ul>
        <label id="username_input_label" for="username_input" class="up" required>Username *<span class="sr_only">Campo Richiesto</span></label>
        <input id="username_input" type="text" name="username" title="Username Pubblico in uso nel sito" <?php if (isset($_POST['username'])) echo "value=" . $_POST['username']; ?> required>

        <label id="email_input_label" for="email_input" class="up" required><span lang="en">Email</span> * <span class="sr_only">Campo Richiesto</span></label>
        <input id="email_input" title="Email univoca per la creazione dell'account" type="email" name="email" <?php if (isset($_POST['email'])) echo "value=" . $_POST['email']; ?> required>

        <p id="password_hints"><span lang="en">Password</span>: <span class="sr_only">Deve contenere almeno otto e massimo quindici caratteri dei quali uno deve essere un numero e uno deve essere scritto in maiuscolo</span>
        </p>
        <ul aria-hidden="true">
          <li>Deve avere almeno otto e massimo quindici caratteri;</li>
          <li>Deve contenere almeno un numero;</li>
          <li>Deve avere almeno una lettera maiuscola.</li>
        </ul>


        <label id="password_input_label" for="password_input" class="up" required><span lang="en">Password</span> *<span class="sr_only">Campo Richiesto</span></label>
        <input title="Password dell'account in fase di creazione." id="password_input" type="password" name="password" required>

        <label id="password_confirm_input_label" for="password_confirm_input" class="up" required>Conferma <span lang="en">password</span> *<span class="sr_only">Campo Richiesto</span></label>
        <input title="Conferma della password scritta precedentemente." id="password_confirm_input" name="passwordConfirm" type="password" required>

        <label class="noJs" id="radio_label" for="password_visibility">
          <input id="password_visibility" type="checkbox">
          Mostra <span lang="en">password</span>.
        </label>
        <input type="submit" value="ISCRIVIMI">
        <input id="reset_button" type="reset" value="PULISCI">
        <hr>
        <p><a href="login.php">Hai già un <span lang="en">account</span>?</a></p>
      <?php } ?>
    </form>
  </div>
  <footer id="foot">
    <p>
      <span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC</a>,
      a ZeniMax Media company. I marchi appartengono ai rispettivi proprietari.
      Tutti i diritti riservati.
    </p>
    <img class="imgVadidCode" src="IMAGES/valid-xhtml10.png" alt="html valido" />
    <img class="imgVadidCode" src="IMAGES/vcss-blue.gif" alt="css valido" />
  </footer>
  <script src="SCRIPTS/.js/signuppage.js"></script>
</body>

</html>
