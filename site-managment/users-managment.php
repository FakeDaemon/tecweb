<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="../CSS/STYLE_SITEMANAGMENT.css" rel="stylesheet">
  <link href="../CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Gestione Sito | DoomWiki</title>
  <meta name="keywords" content="DOOM" />
  <meta name="description" content="DOOM Wiki" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <?php
  $level = 1;
  require '../SCRIPTS/.php/database_connection.php';
  include '../SCRIPTS/.php/user.php';

  $user = new User($conn);
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {header("location: ../cookie_informativa.php");}
  if (!$user->isLogged()) header("location: ../login.php");
  if (!$user->isSuperUser()) header("location: ../error.html");

  $result = $conn->query("SELECT fst_mail, user_name, profile_pic FROM DoomWiki.users WHERE ROLE = 'default'");
  $usersList = array();

  while ($row = $result->fetch_assoc()) {
    $temp_user = user::createUser($row['fst_mail'], $row['user_name'], $row['profile_pic']);
    array_push($usersList, $temp_user);
  }
  if (isset($_POST['action'])) {
    if (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $_POST['UserEmail'])) {
      $GLOBALS["emailWrongFormat"] = true;
    } else {
      $GLOBALS["UserEmailFound"] = false;
      foreach ($usersList as $user) {
        if ($user->email === $_POST['UserEmail']) {
          $GLOBALS["UserEmailFound"] = true;
          break;
        }
      }
      if ($GLOBALS["UserEmailFound"]) {
        if ($_POST['action'] == "Ban") {
          $stmt = $conn->prepare("DELETE FROM DoomWiki.users WHERE fst_mail = ?;");
          $stmt2 = $conn->prepare("INSERT INTO DoomWiki.blackList(fst_mail, ban_date, ban_reason) VALUES(?, ?, ?);");
          $currentDate = date("Y-m-d H:i:s");
          $stmt->bind_param("s", $_POST['UserEmail']);
          $stmt2->bind_param("sss", $_POST['UserEmail'], $currentDate, htmlentities($_POST['message']));
          $stmt->execute();
          $stmt2->execute();
          header("location: users-managment.php?success");
        } else if ($_POST['action'] == "Rendi Mod") {
          $stmt = $conn->prepare("UPDATE DoomWiki.users SET role='mod' WHERE fst_mail=?");
          $stmt->bind_param("s", $_POST['UserEmail']);
          $stmt->execute();
          header("location: users-managment.php?success");
        }
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
    <p>GESTIONE MODDERS</p>
    <form id="auth_widget" action="users-managment.php" method="post" novalidate>
      <?php
      if (isset($GLOBALS['emailWrongFormat']) && $GLOBALS['emailWrongFormat']) echo "<p>Formato <span lang='en'>email</span> non valido.</p>";
      if (isset($GLOBALS['UserEmailFound']) && !$GLOBALS['UserEmailFound']) echo "<p>Nessun utente trovato.</p>";
      if (isset($_GET['success'])) echo "<p>Modifiche effettuate con successo.</p>";
      ?>
      <label id="searchBarLabel" class="up" for="searchBar">Cerca utente per <span>email</span>.</label>
      <input list="browsers" id="searchBar" type="text" name="UserEmail" required>
      <label class="up" for="text_input">Ragione</label>
      <textarea maxlength="300" id="text_input" name="message" placeholder="Scrivi un motivo della promozione a moderatore o del ban dal sito."></textarea>
      <input type="submit" name="action" value="Ban">
      <input type="submit" name="action" value="Rendi Mod">
      <datalist id="browsers">
        <?php
        foreach ($usersList as $user) {
          echo '<option value="' . $user->email . '"></option>';
        }
        ?>
      </datalist>
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
    <img class="imgVadidCode" src="IMAGES/valid-xhtml10.png" alt="html valido" />
    <img class="imgVadidCode" src="IMAGES/vcss-blue.gif" alt="css valido" />
  </footer>
  <script type="text/javascript" src="../SCRIPTS/.js/users-managment.js"></script>
  <?php $conn->close(); ?>
</body>

</html>
