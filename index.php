<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link href="CSS/STYLE_HOMEPAGE.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title> Home </title>
  <meta name="keywords" content="DOOM"/>
  <meta name="description" content="DOOM Wiki"/>
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano, Angeloni Alberto"/>
</head>
<body>
  <?php
  require 'SCRIPTS/.php/database_connection.php';
  include 'SCRIPTS/.php/user.php';
  include 'SCRIPTS/.php/header.php';
  
  $user = new User($conn);
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
        <?php
        echo "<div>";
        if($user->isLogged()) echo "<p>".$user->user_name."</p>";
        else echo "<p>OSPITE</p>";
        echo "<a href='";
        if($user->isLogged()) echo "account-managment.php'>Impostazioni</a>";
        else {
          echo "<a href='signup.php'>Registrati</a>";
          echo "<a href='login.php'>Entra</a>";
        }
        echo "</div>";
        if($user->isLogged()) echo "<img src='/IMAGES/ProfilePics/ProfilePicN".$user->profile_pic.".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>";
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
      $result = $conn->query("SELECT * FROM DoomWiki.topics JOIN DoomWiki.users ON email = fst_mail ORDER BY creation_date LIMIT 10;");
      while($row = $result->fetch_assoc()){
        echo '<a href="questions.php?id='.$row['id'].'"><p class="title">'.$row['title'].'</p><p class="details">Aperto da '.$row['user_name'].' in data '.$row['creation_date'].'</p></a>';
      }
      ?>

      <a href="#">Vedi Tutti</a>
    </div>
    <div class="TopicList">
      <?php
      require 'database_connection.php';
      $result = $conn->query("SELECT * FROM DoomWiki.topics JOIN DoomWiki.users ON email = fst_mail ORDER BY creation_date LIMIT 10;");
      while($row = $result->fetch_assoc()){
        echo '<a href="questions.php?id='.$row['id'].'"><p class="title">'.$row['title'].'</p><p class="details">Aperto da '.$row['user_name'].' in data '.$row['creation_date'].'</p></a>';
      }
      ?>
      <p>DOMANDE PIÙ DISCUSSE</p>
    </div>
  </div>

  <footer id="foot">
    <p>
      <span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC</a>,
      a ZeniMax Media company. I marchi appartengono ai rispettivi proprietari.
      Tutti i diritti riservati.<br>
      <br>
    </p>
    <img class="imgVadidCode" src="IMAGES/valid-xhtml10.png" alt="html valido"/>
    <img class="imgVadidCode" src="IMAGES/vcss-blue.gif" alt="css valido"/>
  </footer>
</body>
</html>
