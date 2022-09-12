<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="../CSS/STYLE_ACCOUNTDELETE.css" rel="stylesheet">
  <link href="../CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Elimina Account | WikiDoom</title>
  <meta name="keywords" content="DOOM" />
  <meta name="description" content="DOOM Wiki" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
</head>

<body>
  <?php
  $level = 1;
  require '../SCRIPTS/.php/database_connection.php';
  include '../SCRIPTS/.php/user.php';
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {header("location:../cookie_informativa.php");}
  $user = new User($conn);

  if (!$user->isLogged()) header("location:../login.php");

  $GLOBALS['wrongPass'] = false;
  if (isset($_POST['Password']) && $_POST['Password'] != "") {
    if (password_verify($_POST['Password'], $user->password)) {
      header("location:delete-account.php?lastChance");
    } else $GLOBALS['wrongPass'] = true;
  }
  if (isset($_POST['action']) && $_POST['action'] == "Conferma") {
    $stmt = $conn->prepare("DELETE FROM DoomWiki.users WHERE SessID = ?");
    $stmt->bind_param("s", $_COOKIE['SessionID']);
    $stmt->execute();
    var_dump($conn);
    setcookie("SessionID", "", time() + 60 * 60 * 24 * 365);
    $_COOKIE["SessionID"] = "";
    header("location:../index.php");
  }
  ?>
  <header>
  <h1 id="logo">DOOM WIKI</h1>
    <label id="BurgherButtonLabel" for="BurgherButton">
      Menu
    </label>
    <input type="checkbox" id="BurgherButton" aria-hidden="true" aria-label="Apri il menu">
    <nav id="NavBar">
      <ul id="MenuBar">
        <li class="MenuBarItem" lang="en"><a href="../index.php" lang="en">HOMEPAGE</a></li>
        <li class="MenuBarItemNestedList">
          <label id="NestedListLbl" for="NestedListBtn">
            TRAMA
          </label>
          <input id="NestedListBtn" type="checkbox" value="Mostra Capitoli Disponibili">
          <ul id="MenuBarNestedList">
            <li class="NestedListItem"><a href="../history.php">CAPITOLO <abbr title="Primo">I</abbr></a></li>
            <li class="NestedListItem"><a href="../history_2.php">CAPITOLO <abbr title="Secondo">II</abbr></a></li>
            <li class="NestedListItem"><a href="../history_3.php">CAPITOLO <abbr title="Terzo">III</abbr></a></li>
            <li class="NestedListItem"><a href="../history_2016.php">CAPITOLO <abbr title="Quarto">IV</abbr></a></li>
            <li class="NestedListItem"><a href="../history_eternals.php">CAPITOLO <abbr title="Quinto">V</abbr></a></li>
          </ul>
        </li>
        <li class="MenuBarItem"><a href="../stats.php">STATISTICHE</a></li>
        <li class="MenuBarItem"><a href="../trivia.php">CURIOSITÀ</a></li>
      </ul>
      <div id="MenuUserWidget">
        <div>
          <?php
          if ($user->isLogged()) echo "<p>" . $user->user_name . "</p>";
          else echo "<p>OSPITE</p>";
          if ($user->isLogged()) {
            if ($user->isSuperUser()) echo "<a href='../siteManager.php'>Gestione Sito</a>";
            echo "<a href='../account-managment.php'>Impostazioni</a>";
          } else {
            echo "<a href='../signup.php'>Registrati</a>";
            echo "<a href='../login.php'>Entra</a>";
          }
          ?>
        </div>
        <?php
        if ($user->isLogged()) echo "<img src='../IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='../IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
        ?>
      </div>
    </nav>
  </header>
  <div class="main">

    <p>ELIMINA <span lang="en">ACCOUNT</span></p>
    <form id="auth_widget" action="delete-account.php" method="POST">
      <?php
      if ($GLOBALS['wrongPass'])
        echo "<p class='ErrorMessage'><span lang='en'>Password</span> non corretta.</p>";

      if (!isset($_GET['lastChance'])) { ?>
        <p>STAI PER ELIMINARE L'INTERO ACCOUNT.</p>
        <p>Se sei certo della tua scelta inserisci la tua <span lang="en">password</span> e conferma la tua scelta.</p>

        <label id="Password" class="up" for="PasswordInput">Vecchia <span lang="en">Password</span></label>
        <input id="PasswordInput" type="password" name="Password" required>

        <label class="noJs" id="radio_label" for="password_visibility">
          <input id="password_visibility" type="checkbox">
          Mostra <span lang="en">password</span>.
        </label>

        <input id="SubmitButton" type="submit" value="Conferma">
        <input id="ResetButton" type="reset" value="Pulisci">
        <a href="account-managment.php">Torna alle impostazioni.</a>
        <a href="../help.php">Serve aiuto?</a>
        <a class='ErrorMessage' href='credentialRecovery.php'><span lang='en'>Password</span> dimenticata?</a>
      <?php
      } else {
      ?>
        <p>Sei sicuro della tua scelta?</p>
        <input id="SubmitButton" type="submit" name="action" value="Conferma">
        <a href="../help.php">Serve aiuto?</a>
      <?php
      }
      ?>


    </form>

  </div>
  <footer id="foot">

    <div id="siteInfo">
      <h1>Doom Wiki</h1>
      <p>DoomWiki è sviluppato da appassionati e ammiratori del videogioco.</p>
      <p><span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC<span class="screen-reader-only">(apre una nuova finestra)</span></a>,
        un'azienda <span lang="en">ZeniMax Media</span>. I marchi appartengono ai rispettivi proprietari. Tutti i diritti riservati.</p>
    </div>

    <div id="SiteMap">
      <p>Mappa del sito</p>
      <ul>
        <li lang="en"><a href="index.php">Homepage</a></li>
        <li>Trama
          <ul>
            <li lang="en"><a href="../history.php">Doom <abbr title="Primo">I</abbr></a></li>
            <li lang="en"><a href="../history_2.php">Doom <abbr title="Secondo">II</abbr></a></li>
            <li lang="en"><a href="../history_3.php">Doom <abbr title="Terzo">III</abbr></a></li>
            <li lang="en"><a href="../history_2016.php">Doom <abbr title="Quarto">IV</abbr></a></li>
            <li lang="en"><a href="../history_eternals.php">Doom <abbr title="Quinto">V</abbr> (Doom eternal)</a></li>
          </ul>
        </li>
        <li><a href="../stats.php">Statistiche</a></li>
        <li><a href="../trivia.php">Curiosità</a></li>
        <li><a href="../signup.php">Registrazione</a> (nuovo utente)</li>
        <li><a href="../signup.php">Accesso</a> (utente già registrato)</li>
        <li><a href="../account-managment.php">Impostazioni profilo (utente gia resitrato)</a>
          <ul>
            <li><a href="../account-managment/email-change.php">Cambio <span lang="en">email</span></a></li>
            <li><a href="../account-managment/password-change.php">Cambio <span lang="en">password</span></a></li>
            <li><a href="../account-managment/profile-pic-change.php">Cambio immagine-profilo</a></li>
            <li><a href="../account-managment/username-change.php">Cambio nome utente</a></li>
            <li><a href="../account-managment/delete-account.php">Eliminazione profilo</a></li>
          </ul>
        </li>
        <li><a href="../help.php">Modulo assistenza</a></li>
        <li><a href="../cookie_informativa.php">Informativa <span lang="en">cookie</span></a></li>
      </ul>
    </div>

  </footer>
  <script src="../SCRIPTS/.js/passwordchangepage.js"></script>
</body>

</html>
