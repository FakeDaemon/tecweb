<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="../CSS/STYLE_HELPREQUESTS.css" rel="stylesheet">
  <link href="../CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
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
  if (isset($_POST['helpRequestID']) && isset($_POST['act'])) {
    if ($_POST['act'] == 'Gestisci') {
      $stmt = $conn->prepare("UPDATE jangeli.helpRequests SET requestMod=?, requestState = 'WorkingOn' WHERE id=?");
      $stmt->bind_param("si", $user->email, $_POST['helpRequestID']);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->affected_row > 0) {
        header("location:help-requests.php?Success");
      } else {
        header("location:help-requests.php?Fail");
      }
    } else if ($_POST['act'] == 'Risolvi') {
      $stmt = $conn->prepare("UPDATE jangeli.helpRequests SET requestState = 'Resolved' WHERE requestMod=? AND id=?");
      $stmt->bind_param("si", $user->email, $_POST['helpRequestID']);
      $stmt->execute();
      var_dump($stmt);
      if ($stmt->affected_rows > 0) {
        header("location:help-requests.php?WorkingOn&Success");
      } else {
        header("location:help-requests.php?WorkingOn&Fail");
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
    <?php if (isset($_GET['WorkingOn'])) { ?>
      <p>RICHIESTE IN LAVORAZIONE</p>
      <div id="auth_widget" action="users-managment.php" method="get">
        <?php
        if(isset($_GET['Success'])) echo "<p class='actionResult'>Richiesta archiviata con successo.</p>";
        $stmt = $conn->prepare("SELECT * FROM jangeli.helpRequests WHERE requestState='WorkingOn' AND requestMod=?");
        $stmt->bind_param("s", $user->email);
        $stmt->execute();
        $requestsList = $stmt->get_result();
        if ($requestsList->num_rows > 0) {
          while ($row = $requestsList->fetch_assoc()) {
            echo "<form action='help-requests.php' method='post'>";
            echo "<fieldset>";
            echo "<input type='hidden' name='helpRequestID' value='" . $row['id'] . "'>";
            echo "<legend>&nbsp" . $row['requestDate'] . "&nbsp</legend>";
            echo "<p>Contatto : " . $row['requestEmail'] . "</p>";
            echo "<p>" . $row['requestBody'] . "</p>";
            echo "<input type='submit' name='act' value='Risolvi'>";
            echo "</fieldset>";
            echo "</form>";
          }
        } else {
          echo "<p>Non hai richieste in fase di lavorazione.</p>";
          echo "<p><a href='help-requests.php'>Richieste in attesa</a></p>";
          echo "<p><a href='../siteManager.php'>Torna alla gestione del sito</a></p>";
        }
        ?>
      </div>
    <?php } else { ?>
      <p>RICHIESTE IN ATTESA</p>
      <div id="auth_widget" action="users-managment.php" method="get">
        <?php
        if (isset($_GET['Success'])) echo "<p>Modifiche effettuate con successo</p>";
        $requestsList = $conn->query("SELECT * FROM jangeli.helpRequests WHERE requestState='Pending'");
        if ($requestsList->num_rows > 0) {
          while ($row = $requestsList->fetch_assoc()) {
            echo "<form action='help-requests.php' method='post'>";
            echo "<fieldset>";
            echo "<input type='hidden' name='helpRequestID' value='" . $row['id'] . "'>";
            echo "<legend>&nbsp" . $row['requestDate'] . "&nbsp</legend>";
            echo "<p>Contatto : " . $row['requestEmail'] . "</p>";
            echo "<p>" . $row['requestBody'] . "</p>";
            echo "<input type='submit' name='act' value='Gestisci'>";
            echo "</fieldset>";
            echo "</form>";
          }
        } else {
          echo "<p>Non ci sono richieste in attesa. Funziona tutto troppo bene...</p>";
          echo "<p><a href='../'>Pagina principale.</a></p>";
          echo "<p><a href='help-requests.php?WorkingOn'>Richieste in lavorazione</a></p>";
          echo "<p><a href='../siteManager.php'>Gestione del sito</a></p>";
        }
        ?>
      </div>

    <?php } ?>

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
  <script src="SCRIPTS/.js/authpage.js"></script>
  <?php $conn->close(); ?>
</body>

</html>
