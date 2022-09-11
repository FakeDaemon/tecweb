<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_ACCOUNTMANAGMENT.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Gestione Account | WikiDoom</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="keywords" content="DOOM, account, support, profile" />
  <meta name="description" content="Pagina di gestione account" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="SCRIPTS/css_modifier.js"></script>
</head>

<body>
  <?php
  require 'SCRIPTS/.php/database_connection.php';
  include 'SCRIPTS/.php/user.php';
  $user = new User($conn);
  if (isset($_POST['CookieAccepted']) && $_POST['CookieAccepted'] == 'Accetta') {
    setCookie('CookieAccepted', 'Accetta', time() + (86400 * 30));
    $_COOKIE['CookieAccepted'] = 'Accetta';
    header('location : account-managment.php');
  }
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
  ?>
    <form class="cookie-banner" action="account-managment.php" method="post">
      <p>
        Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
        il contenuto e analizzare il traffico di rete.
        <a href=cookie_informativa.php>Leggi di più riguardo ai <span lang="en">cookie</span></a>
      </p>
      <input type="submit" name="CookieAccepted" value="Accetta">
    </form>
  <?php
  }
  if (!$user->isLogged()) header("location: login.php");
  if (isset($_GET['act']) && $_GET['act'] == 'closeSess') {
    $stmt = $conn->prepare("UPDATE DoomWiki.users SET SessID = NULL WHERE fst_mail = ?");
    $stmt->bind_param("s", $user->email);
    $stmt->execute();
    setcookie("SessionID", "", time() + 60 * 60 * 24 * 365);
    $_COOKIE["SessionID"] = "";
    header("location: /");
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
        <li class="MenuBarItem"><a href="trivia.php">CURIOSITÀ</a></li>
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

    <p>GESTIONE <span lang="en">ACCOUNT</span></p>
    <div id="auth_widget">
      <?php
      if (isset($_GET['msg']) && $_GET['msg'] == "Success") {
        echo "<p class='status'>Modifiche effettuate con successo!</p>";
      }
      ?>
      <p>I TUOI CONTRIBUTI</p>
      <a href="questions.php?User">Le tue domande</a>
      <a href="answerChange.php?UserSettings">Le tue risposte</a>

      <p>IMMAGINE PROFILO</p>
      <a href="account-managment/profile-pic-change.php">Cambia immagine profilo.</a>
      <a href="account-managment/profile-pic-change.php?act=rmv">Rimuovi immagine profilo.</a>

      <p>DATI ACCOUNT</p>
      <a href="account-managment/username-change.php">Cambia <span lang="en">username</span>.</a>
      <a href="account-managment/password-change.php">Cambia <span lang="en">password</span>.</a>
      <a href="account-managment/email-change.php">Cambia <span lang="en">emails</span> associate all'account.</a>

      <hr>

      <a href="account-managment.php?act=closeSess">Chiudi sessione.</a>
      <a class="noPlease" href="account-managment/delete-account.php">Elimina account.</a>
      <span><a class="smaller" href="help.php">Serve aiuto?</a></span>

    </div>

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
</body>

</html>
