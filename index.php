<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_HOMEPAGE.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link href="CSS/PRINT_HOME.css" rel="stylesheet" type="text/css" media="print" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta charset="utf-8">
  <title> Home | DoomWiki </title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="keywords" content="DOOM WIKI, benvenuti, community" />
  <meta name="description" content="Homepage della DoomWiki" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano, Angeloni Alberto" />
</head>

<body>
  <?php

  require 'SCRIPTS/.php/database_connection.php';
  include 'SCRIPTS/.php/user.php';
  $user = new User($conn);
  if (isset($_POST['CookieAccepted']) && $_POST['CookieAccepted'] == 'Accetta') {
    setCookie('CookieAccepted', 'Accetta', time() + (86400 * 30));
    $_COOKIE['CookieAccepted'] = 'Accetta';
    header('location:index.php');
  }
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
  ?>
    <form class="cookie-banner" action="index.php" method="post">
      <p>
        Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
        il contenuto e analizzare il traffico di rete.
        <a href=cookie_informativa.php>Leggi di più riguardo ai <span lang="en">cookie</span></a>
      </p>
      <input type="submit" name="CookieAccepted" value="Accetta">
    </form>
  <?php
  }
  ?>
  <header>
    <h1 id="logo">DOOM WIKI</h1>
    <label id="BurgherButtonLabel" for="BurgherButton">
      Menu
    </label>
    <input type="checkbox" id="BurgherButton" aria-hidden="true" aria-label="Apri il menu">
    <nav aria-label="Menu principale" id="NavBar">
      <ul id="MenuBar">
        <li class="MenuBarItem CurrentLocation" lang="en">HOMEPAGE</li>
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
        <li class="MenuBarItem"><a href="stats.php">ARMI</a></li>
        <li class="MenuBarItem"><a href="trivia.php">CURIOSIT&Agrave;</a></li>
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
        if ($user->isLogged()) echo "<img src='IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
        ?>
      </div>
    </nav>
  </header>
  <div class="main">
    <p id="Welcome_Messages">BENVENUTI ALLA <strong lang="en">WIKI</strong> DI <strong lang="en">DOOM</strong></p>
    <p id="SubMessage">Un sito dedicato al gioco di <span lang="en">DOOM</span>, dove consultare informazioni dettagliate su tutti gli aspetti del gioco e dove appassionati di <span lang="en">DOOM</span> possono interagire tra di loro.</p>
    <form class="searchBar" id="searchBar" action="searchResult.php" method="get" novalidate>
      <label for="SearchBar">CERCA NEL SITO</label>
      <input id="SearchBar" type="text" name="SearchTerms" required>
      <input type="submit" value="CERCA">
      <input type="reset" value="PULISCI">
    </form>
    <div class="TopicList">
      <p>ULTIME DOMANDE DELLA COMMUNITY</p>
      <?php
      $result = $conn->query("SELECT * FROM DoomWiki.topics LEFT OUTER JOIN DoomWiki.users ON email = fst_mail WHERE state='Approved' ORDER BY creation_date LIMIT 10;");
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<a href="questions.php?id=' . $row['id'] . '"><p class="title">' . $row['title'] . '</p><p class="details">Aperto da ' . ($row['user_name'] != NULL ? $row['user_name'] : "utente eliminato") . ' in data ' . $row['creation_date'] . '</p></a>';
        }
        echo '<a href="questions.php?Latest">Vedi Tutti</a>';
        echo '</div>';
        echo '<div class="TopicList">';
        echo '<p>ULTIME DOMANDE DELLA COMMUNITY</p>';
        $result = $conn->query("SELECT t.id, u.user_name, t.title, t.creation_date,COUNT(c.id) AS CommentsCount FROM DoomWiki.topics AS t LEFT OUTER JOIN DoomWiki.users AS u ON t.email = u.fst_mail LEFT OUTER JOIN DoomWiki.comments AS c ON c.topicID=t.id WHERE t.state='Approved' GROUP BY t.id ORDER BY CommentsCount DESC;");
        while ($row = $result->fetch_assoc()) {
          echo '<a href="questions.php?id=' . $row['id'] . '"><p class="title">' . $row['title'] . '</p><p class="details">Aperto da ' . ($row['user_name'] != NULL ? $row['user_name'] : "utente eliminato") . ' in data ' . explode(" ", $row['creation_date'])[0] . ' in ore ' . explode(" ", $row['creation_date'])[1] . '</p></a>';
        }
        echo '<a href="questions.php?Comments">Vedi Tutti</a>';
      } else {
        echo '<p class="subTitle">Nessuno ha ancora chiesto nulla. <a href="questionEditor.php">Chiedi</a> qualcosa per primo!</p>';
      }
      ?>
    </div>
  </div>
  <footer id="foot">
    <div id="siteInfo">
      <h1 lang="en">Doom Wiki</h1>
      <p><span lang="en">DoomWiki</span> &egrave; sviluppato da appassionati e ammiratori del videogioco.</p>
      <p><span lang="en">&copy;Doom</span> &egrave; un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank" lang="en">2022 Bethesda Softworks LLC<span class="screen-reader-only">(apre una nuova finestra, il sito &egrave; in inglese)</span></a>,
        un'azienda <span lang="en">ZeniMax Media</span>. I marchi appartengono ai rispettivi proprietari. Tutti i diritti riservati.</p>
    </div>

    <div id="SiteMap">
      <p>Mappa del sito</p>
      <ul>
        <li lang="en">Homepage</li>
        <li>Trama
          <ul>
            <li lang="en"><a href="history.php">Doom <abbr title="Primo">I</abbr></a></li>
            <li lang="en"><a href="history_2.php">Doom <abbr title="Secondo">II</abbr></a></li>
            <li lang="en"><a href="history_3.php">Doom <abbr title="Terzo">III</abbr></a></li>
            <li lang="en"><a href="history_2016.php">Doom <abbr title="Quarto">IV</abbr></a></li>
            <li lang="en"><a href="history_eternals.php">Doom <abbr title="Quinto">V</abbr> (Doom eternal)</a></li>
          </ul>
        </li>
        <li><a href="stats.php">Armi</a></li>
        <li><a href="trivia.php">Curiosit&agrave;</a></li>
        <li><a href="signup.php">Registrazione</a> (nuovo utente)</li>
        <li><a href="login.php">Accesso</a> (utente gi&agrave; registrato)</li>
        <li><a href="account-managment.php">Impostazioni profilo (utente gia resitrato)</a>
          <ul>
            <li><a href="account-managment/email-change.php">Cambio <span lang="en">email</span></a></li>
            <li><a href="account-managment/password-change.php">Cambio <span lang="en">password</span></a></li>
            <li><a href="account-managment/profile-pic-change.php">Cambio immagine-profilo</a></li>
            <li><a href="account-managment/username-change.php">Cambio nome utente</a></li>
            <li><a href="account-managment/delete-account.php">Eliminazione profilo</a></li>
          </ul>
        </li>
        <li><a href="help.php">Modulo assistenza</a></li>
        <li><a href="cookie_informativa.php">Informativa <span lang="en">cookie</span></a></li>
      </ul>
    </div>
  </footer>
  <script src="SCRIPTS/.js/indexScripts.js"></script>
</body>

</html>
