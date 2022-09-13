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
</head>

<body>
  <?php
  $level = 1;
  require '../SCRIPTS/.php/database_connection.php';
  include '../SCRIPTS/.php/user.php';
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {header("location:../cookie_informativa.php");}
  $user = new User($conn);
  if (!$user->isLogged() || !$user->isSuperUser()) header("location:../account-managment.php");
  if (isset($_POST['act'])) {
    if ($_POST['act'] == "Accetta") {
      $stmt = $conn->prepare("UPDATE DoomWiki.topics SET state='Approved', modified_date=? WHERE id=?");
      $currentDate = date("Y-m-d H:i:s");
      $stmt->bind_param("ss", $currentDate, $_POST['reviewID']);
      $stmt->execute();
      header("location:topic-managment.php?success");
    } else if ($_POST['act'] == "Rifiuta") {
      $GLOBALS['RejectAction'] = true;
    } else if ($_POST['act'] == "Conferma") {
      $stmt = $conn->prepare("UPDATE DoomWiki.topics SET state='Rejected', modified_date=?, rejectReason=? WHERE id=?");
      $currentDate = date("Y-m-d H:i:s");
      var_dump($_POST);
      $stmt->bind_param("sss", $currentDate, $_POST['rejectReason'], $_POST['reviewID']);
      $stmt->execute();
      header("location:topic-managment.php?success");
    } else {
      header("location:topic-managment.php?Error");
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

    <p>TOPICS SOSPESI</p>
    <form id="auth_widget" action="topic-managment.php" method="post">
      <?php
      if (isset($GLOBALS['RejectAction']) && $GLOBALS['RejectAction']) {
        $stmt = $conn->prepare("SELECT * FROM DoomWiki.topics WHERE id=?");
        $stmt->bind_param("s", $_POST['reviewID']);
        $stmt->execute();
        $result = $stmt->get_result();
        $topic = $result->fetch_assoc();
        echo "<form action='topic-managment.php' method='post'>";
        echo "<fieldset class='RejectForm'>";
        echo "<input type='hidden' name='reviewID' value='" . $topic['id'] . "'>";
        echo "<legend>" . $topic['title'] . "</legend>";
        echo "<p>" . $topic['description'] . "</p>";
        echo "<p class='details'>Chiesto da " . $topic['email'] . " in data " . $topic['creation_date'] . "</p>";
        echo "<label class='up' for='RejectReason'>Ragione del rifiuto</label>";
        echo "<textarea maxlength='300' id='RejectReason' name='rejectReason' placeholder='Scrivi il perchè hai deciso di rifiutare la domanda.'></textarea>";
        echo "<input type='submit' name='act' value='Conferma'>";
        echo "</fieldset>";
        echo "</form>";
      } else {
        if (isset($_GET['success'])) {
          echo "<p class='alert'>Modifiche effettuate con successo!</p>";
        }
        $topicsList = $conn->query("SELECT * FROM DoomWiki.topics WHERE STATE='Pending'");
        if ($topicsList->num_rows > 0) {
          while ($topic = $topicsList->fetch_assoc()) {
            echo "<form action='topic-managment.php' method='post'>";
            echo "<fieldset>";
            echo "<input type='hidden' name='reviewID' value='" . $topic['id'] . "'>";
            echo "<legend>" . $topic['title'] . "</legend>";
            echo "<p>" . $topic['description'] . "</p>";
            echo "<p class='details'>Chiesto da " . $topic['email'] . " in data " . $topic['creation_date'] . "</p>";
            echo "<input type='submit' name='act' value='Accetta'>";
            echo "<input type='submit' name='act' value='Rifiuta'>";
            echo "</fieldset>";
            echo "</form>";
          }
        } else {
          echo "<p>Nessun topic in attesa.</p>";
        }
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
  <?php $conn->close(); ?>
</body>

</html>
