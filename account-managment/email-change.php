<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="../CSS/STYLE_EMAILCHANGE.css" rel="stylesheet">
  <link href="../CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Gestione Mails | WikiDoom</title>
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
      if (isset($_POST['FirstEmail']) || isset($_POST['SecondEmail'])) {
        if ($_POST['FirstEmail'] != "" && $_POST['FirstEmail'] != $user->email) {
          $stmt = $conn->prepare("UPDATE DoomWiki.users SET fst_mail = ? WHERE SessID = ?");
          $stmt->bind_param("ss", ($_POST['FirstEmail']), $_COOKIE['SessionID']);
          $stmt->execute();
        }
        if ($_POST['SecondEmail'] !== "" && $_POST['SecondEmail'] != $user->secondaryEmail) {
          $stmt = $conn->prepare("UPDATE DoomWiki.users SET scnd_mail = ? WHERE SessID = ?");
          $stmt->bind_param("ss", ($_POST['SecondEmail']), $_COOKIE['SessionID']);
          $stmt->execute();
        }
        header("location:../account-managment.php?msg=Success");
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
        if ($user->isLogged()) echo "<img src='..IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='..IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
        ?>
      </div>
    </nav>
  </header>
  <div class="main">

    <p>GESTIONE <span lang="en">EMAILS</span></p>
    <form id="auth_widget" action="email-change.php" method="POST">
      <?php if ($GLOBALS['wrongPass']) {
        echo "<p class='ErrorMessage'><span lang='en'>Password</span> non corretta.</p>";
        echo "<a class='ErrorMessage' href='credentialRecovery.php'><span lang='en'>Password</span> dimenticata?</p>";
      }
      ?>
      <p>Scrivi il nuovo o i nuovi indirizzi e clicca o premi su <a href="#ConfirmButton">Conferma</a> per cambiare le corrispettive informazioni.</p>
      <label for="PrimaryMail"><span lang="en">Email</span> Principale</label>
      <?php
      if (isset($_POST['FirstEmail']) && $_POST['FirstEmail'] !== '') {
        echo '<input id="PrimaryMail" type="email" name="FirstEmail" value="' . $_POST['FirstEmail'] . '"';
      } else {
        echo '<input id="PrimaryMail" type="email" name="FirstEmail" placeholder="' . $user->email . '"';
      }
      ?>
      <input id="PrimaryMail" type="email" name="FirstEmail" placeholder="<?php echo $user->email; ?>">
      <label for="SecondaryMail"><span lang="en">Email</span> Secondaria</label>
      <?php
      if (isset($_POST['SecondEmail']) && $_POST['SecondEmail'] !== '') {
        echo '<input id="SecondaryMail" type="email" name="SecondEmail" value=' . $_POST['SecondEmail'] . '>';
      } else {
        echo '<input id="SecondaryMail" type="email" name="SecondEmail" placeholder=' . $user->secondaryEmail . '>';
      }
      ?>
      <label for="Password"><span lang="en">Password</span></label>
      <input id="Password" type="password" name="Password" required>
      <label id="radio_label" for="password_visibility">
        <input id="password_visibility" type="checkbox">
        Mostra <span lang="en">password</span>.
      </label>
      <input id="ConfirmButton" type="submit" value="Conferma">
      <input type="reset" value="Pulisci">
      <a href="../help.php">Serve aiuto?</a>
    </form>

  </div>
  <footer id="foot">
    <p>
      <span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC</a>,
      a ZeniMax Media company. I marchi appartengono ai rispettivi proprietari.
      Tutti i diritti riservati.
    </p>
    <p>
      L'informativa sui <span lang="en">cookie</span> è consultabile all'indirizzo <a href="cookie_informativa.php">Cookie-information</a>
    </p>
    <img class="imgVadidCode" src="..IMAGES/valid-xhtml10.png" alt="html valido" />
    <img class="imgVadidCode" src="..IMAGES/vcss-blue.gif" alt="css valido" />
  </footer>
  <script src="../SCRIPTS/.js/emailChange.js"></script>
</body>

</html>
