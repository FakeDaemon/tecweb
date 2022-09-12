<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link href="CSS/STYLE_SEARCHRESULTS.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title> Home </title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="keywords" content="DOOM, search, result" />
  <meta name="description" content="Pagina che mostra i risultati di una ricerca" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano, Angeloni Alberto" />
</head>

<body>
  <?php
  require 'SCRIPTS/.php/database_connection.php';
  include 'SCRIPTS/.php/user.php';
  include 'SCRIPTS/.php/utils.php';

  $user = new User($conn);

  if (isset($_POST['CookieAccepted']) && $_POST['CookieAccepted'] == 'Accetta') {
    setCookie('CookieAccepted', 'Accetta', time() + (86400 * 30));
    $_COOKIE['CookieAccepted'] = 'Accetta';
    header('location:searchResult.php');
  }
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
  ?>
    <form class="cookie-banner" action="searchResult.php" method="post">
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

    <nav id="NavBar">
      <ul id="MenuBar">
        <li class="MenuBarItem" lang="en"><a href="index.php">HOMEPAGE</a></li>
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
        if ($user->isLogged()) echo "<img src='IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
        ?>
      </div>
    </nav>
  </header>

  <div class="main">
    <form class="searchBar" action="searchResult.php" method="get">
      <label for="SearchBar">NUOVA RICERCA</label>
      <input id="SearchBar" type="text" name="SearchTerms" required>
      <input type="submit" value="CERCA">
      <input type="reset" value="PULISCI">
    </form>
    <a id="AnswerPagelink" href="questionEditor.php">Fai una domanda alla community!</a>
    <?php
    if (strlen($_GET['SearchTerms']) > 0) {
    ?>
      <span>
        <p class="SearchTerms">"&nbsp; <?php echo $_GET["SearchTerms"]; ?> &nbsp;"</p>
      </span>
      <p>Risultati della ricerca:</p>
      <span class="TopicList">
      <?php
      $target = keywordsExtraxtor($_GET['SearchTerms']);
      $sql = "SELECT * FROM DoomWiki.topics JOIN DoomWiki.users ON fst_mail = email WHERE state='Approved'";
      $result = $conn->query($sql);
      $resultCount = 0;
      while ($row = $result->fetch_assoc()) {
        if ($resultCount < 20) {
          foreach ($target as $word) {
            if (strpos($row['title'], $word) !== false) {
              if ($resultCount < 20) {
                echo '<a href="questions.php?id=' . $row['id'] . '"><p class="title">' . $row['title'] . '</p><p class="details">Aperto da ' . $row['user_name'] . ' in data ' . $row['creation_date'] . '</p></a>';
                $resultCount += 1;
                break;
              }
            }
          }
        }
      }
      if ($resultCount === 0) { //Nessun risultato
        echo "<p>Nessuno ha ancora chiesto quello che hai cercato.<a href='QuestionPage.php'>Chiedi alla community!</a></p> ";
      }
    } else {
      echo "<span><p>Richerca non valida. Riprova o prova ad usare altri termini usando l'<a href='#SearchBar'>area di testo</a>.</p><span>";
    }
      ?>
      </span>
      <?php
      if ($GLOBALS['MorePage']) { ?>
        <a class="CurrentPage" id="FirstPage" href="questions.php?id=123&page=0">Prima Pagina</a>
        <a class="CurrentPage" href="questions.php?id=123&page=0">Pagina Precedente</a>
        <a href="questions.php?id=123&page=0">Pagina Successiva</a>
        <a id="LastPage" href="questions.php?id=123&page=0">Ultima Pagina</a>
      <?php } ?>
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
</body>

</html>