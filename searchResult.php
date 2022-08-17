<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link href="CSS/STYLE_SEARCHRESULTS.css" rel="stylesheet">
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
  $GLOBALS['MorePage'] = false;
  $GLOBALS['logState'] = false;
  include 'SCRIPTS/.php/SearchPageFunctions.php';
  ?>
  <header>
    <h1 id="logo">DOOM WIKI</h1>

    <nav id="NavBar">
      <ul id="MenuBar">
        <li class="MenuBarItem" lang="en"><a href="/">HOMEPAGE</a></li>
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
        include 'SCRIPTS/.php/header.php';
        isLogged();
        if($GLOBALS['logState'])
        printLoggedMenuWidget();
        else
        printDefaultMenuWidget();
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
    <span>
      <p class="SearchTerms">"&nbsp; <?php echo $_GET["SearchTerms"];?> &nbsp;"</p>
    </span>
    <p>Risultati della ricerca:</p>
    <span class="TopicList">
      <?php printSearchResult($_GET["SearchTerms"]); ?>
    </span>
    <?php
    if($GLOBALS['MorePage']){ ?>
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
      <br>
      <br>
    </p>
    <img class="imgVadidCode" src="IMAGES/valid-xhtml10.png" alt="html valido"/>
    <img class="imgVadidCode" src="IMAGES/vcss-blue.gif" alt="css valido"/>
  </footer>
</body>
</html>