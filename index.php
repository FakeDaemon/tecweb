<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link href="CSS/STYLE_HOMEPAGE.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link href="CSS/PRINT_HOME.css" rel="stylesheet" type="text/css" media="print" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title> Home </title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="keywords" content="DOOM, home, community" />
  <meta name="description" content="Homepage della wiki" />
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
    header('location : index.php');
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
    <nav id="NavBar">
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
    <p id="Welcome_Messages">BENVENUTI ALLA <strong lang="en">WIKI</strong> DI <strong lang="en">DOOM</strong></p>
    <p id="SubMessage">Un sito dedicato al gioco di <span lang="en">DOOM</span>, dove consultare informazioni dettagliate su tutti gli aspetti del gioco e dove appassionati di <span lang="en">DOOM</span> possono interagire tra di loro.</p>
    <form class="searchBar" action="searchResult.php" method="get">
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
          echo '<a href="questions.php?id=' . $row['id'] . '"><p class="title">' . $row['title'] . '</p><p class="details">Aperto da ' . ($row['user_name'] != NULL ? $row['user_name'] : "utente eliminato") . ' in data ' . $row['creation_date'] . '</p></a>';
        }
        echo '<a href="questions.php?Comments">Vedi Tutti</a>';
      } else {
        echo '<p class="subTitle">Nessuno ha ancora chiesto nulla. <a href="questionEditor.php">Chiedi</a> qualcosa per primo!</p>';
      }
      ?>
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
