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
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {header("location:../cookie_informativa.php");}
  if (!$user->isLogged() || !$user->isAdmin()) header("location:../login.php");
  $result = $conn->query("SELECT fst_mail, user_name, profile_pic FROM DoomWiki.users WHERE ROLE = 'mod'");
  $modsList = array();
  while ($row = $result->fetch_assoc()) {
    $mod = user::createUser($row['fst_mail'], $row['user_name'], $row['profile_pic']);
    array_push($modsList, $mod);
  }
  if (isset($_POST['action'])) {
    if (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $_POST['ModEmail'])) {
      $GLOBALS["emailWrongFormat"] = true;
    } else {
      $GLOBALS["ModEmailFound"] = false;
      foreach ($modsList as $mod) {
        if ($mod->email === $_POST['ModEmail']) {
          $GLOBALS["ModEmailFound"] = true;
          break;
        }
      }
      if ($GLOBALS["ModEmailFound"]) {
        if ($_POST['action'] == "Ban") {
          $stmt = $conn->prepare("DELETE FROM DoomWiki.users WHERE fst_mail = ?;");
          $stmt2 = $conn->prepare("INSERT INTO DoomWiki.blackList(fst_mail, ban_date, ban_reason) VALUES(?, ?, ?);");
          $currentDate = date("Y-m-d H:i:s");
          $stmt->bind_param("s", $_POST['ModEmail']);
          $stmt2->bind_param("sss", $_POST['ModEmail'], $currentDate, htmlentities($_POST['message']));
          $stmt->execute();
          $stmt2->execute();
          header("location:mod-managment.php?success");
        } else if ($_POST['action'] == "Togli privilegi") {
          $stmt = $conn->prepare("UPDATE DoomWiki.users SET role='default', SessId=NULL WHERE fst_mail=?");
          $stmt->bind_param("s", $_POST['ModEmail']);
          $stmt->execute();
          var_dump($conn);
          header("location:mod-managment.php?success");
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
    <p>GESTIONE MODDERS</p>
    <form id="auth_widget" action="mod-managment.php" method="post" novalidate>
      <?php
      if (isset($GLOBALS['emailWrongFormat']) && !$GLOBALS['emailWrongFormat']) echo "<p>Formato <span lang='en'>email</span> non valido.</p>";
      if (isset($GLOBALS['ModEmailFound']) && !$GLOBALS['ModEmailFound']) echo "<p>Nessun utente trovato.</p>";
      if (isset($_GET['success'])) echo "<p>Modifiche effettuate con successo.</p>";
      ?>
      <label id="searchBarLabel" class="up" for="searchBar">Cerca Mod per <span>email</span>.</label>
      <input list="mods" id="searchBar" type="text" name="ModEmail" required>
      <label class="up" for="text_input">Motivo del ban</label>
      <textarea maxlength="300" id="text_input" name="message" placeholder="Motivo del ban o della destituzione dal ruolo di mod." required></textarea>
      <input type="submit" name="action" value="Ban">
      <input type="submit" name="action" value="Togli privilegi">
      <datalist id="mods">
        <?php
        foreach ($modsList as $mod) {
          echo '<option value="' . $mod->email . '"></option>';
        }
        ?>
      </datalist>
      <p><span lang="en">Mods</span> attuali</p>
      <p class="small">(nome utente - email)</p>
      <ul>
        <?php
        foreach ($modsList as $mod) {
          echo '<li><img src="../IMAGES/ProfilePics/ProfilePicN' . ($mod->profile_pic) . '.jpg" alt=""><span><span class="user_name">' . ($mod->user_name) . '</span><span class="email">' . ($mod->email) . '</span></span></li>';
        }
        ?>
      </ul>
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
  <script src="../SCRIPTS/.js/mod-managment.js"></script>
  <?php $conn->close(); ?>
</body>

</html>
