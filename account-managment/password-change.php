<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="../CSS/STYLE_PASSWORDCHANGE.css" rel="stylesheet">
  <link href="../CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Gestione Account | WikiDoom</title>
  <meta name="keywords" content="DOOM" />
  <meta name="description" content="DOOM Wiki" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
</head>

<body>
  <?php
  $level = 1;
  require '../SCRIPTS/.php/database_connection.php';
  include '../SCRIPTS/.php/user.php';
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {header("location: ../cookie_informativa.php");}
  $user = new User($conn);
  $GLOBALS['wrongPass'] = false;
  $GLOBALS['inputDifferent'] = false;

  if (!$user->isLogged()) header("location: ../login.php");

  if (isset($_POST['OldPassword']) && isset($_POST['NewPassword']) && isset($_POST['NewPasswordConfirm'])) {
    if (password_verify($_POST['OldPassword'], $user->password)) {
      if ($_POST['NewPassword'] == $_POST['NewPasswordConfirm']) {
        $stmt = $conn->prepare("UPDATE DoomWiki.users SET psw = ?, lst_psw_change = ? WHERE SessID = ?");
        $currentDate = date('Y-m-d H:i:s');
        $psw = password_hash($_POST['NewPassword'], PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $psw, $currentDate, $_COOKIE['SessionID']);
        $stmt->execute();
        header("location: ../account-managment.php?msg=Success");
      } else {
        $GLOBALS['inputDifferent'] = true;
      }
    } else {
      $GLOBALS['wrongPass'] = true;
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

    <p>CAMBIO <span lang="en">PASSWORD</span></p>
    <form id="auth_widget" action="password-change.php" method="POST">
      <?php
      if ($GLOBALS['wrongPass'])
        echo "<p class='ErrorMessage'>Vecchia <span lang='en'>password</span> non corretta.</p>";
      if ($GLOBALS['inputDifferent'])
        echo "<p class='ErrorMessage'><span lang='en'>Password</span> non corrispondenti.</p>";
      ?>
      <label id="OldPasswordLabel" class="up" for="LastPassword">Vecchia <span lang="en">Password</span></label>
      <input id="LastPassword" type="password" name="OldPassword" required>

      <p id="password_hints">Ricorda che la nuova <span lang="en">Password</span>: <span class="sr_only">Deve contenere almeno otto caratteri dei quali uno deve essere un numero e uno deve essere scritto in maiuscolo. Ovviamente deve essere diversa dalla precedente.</span>
      </p>
      <ul aria-hidden="true">
        <li>Deve essere diversa dalla precedente;</li>
        <li>Deve avere almeno otto caratteri;</li>
        <li>Deve contenere almeno un numero;</li>
        <li>Deve avere almeno una lettera maiuscola.</li>
      </ul>

      <label id="NewPasswordLabel" class="up" for="NewPassword">Nuova <span lang="en">Password</span></label>
      <input id="NewPassword" type="password" name="NewPassword" required>

      <label id="PasswordConfirmLabel" class="up" for="NewPasswordConfirm">Conferma <span lang="en">Password</span></label>
      <input id="NewPasswordConfirm" type="password" name="NewPasswordConfirm" required>

      <label class="noJs" id="radio_label" for="password_visibility">
        <input id="password_visibility" type="checkbox">
        Mostra <span lang="en">password</span>.
      </label>

      <input type="submit" name="SubmitButton" value="Conferma">
      <input id="ResetButton" type="reset" value="Pulisci">

      <a href="../help.php">Serve aiuto?</a>
      <a class='ErrorMessage' href='credentialRecovery.php'><span lang='en'>Password</span> dimenticata?</a>
    </form>

  </div>
  <footer id="foot">
    <p>
      <span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC</a>,
      a ZeniMax Media company. I marchi appartengono ai rispettivi proprietari.
      Tutti i diritti riservati.
    </p>
    <img class="imgVadidCode" src="../IMAGES/valid-xhtml10.png" alt="html valido" />
    <img class="imgVadidCode" src="../IMAGES/vcss-blue.gif" alt="css valido" />
  </footer>
  <script src="../SCRIPTS/.js/passwordchangepage.js"></script>
</body>

</html>
