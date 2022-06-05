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
    <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto"/>
</head>

<body>
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
              <li class="NestedListItem">CAPITOLO I</li>
              <li class="NestedListItem">CAPITOLO II</li>
              <li class="NestedListItem">CAPITOLO III</li>
              <li class="NestedListItem">CAPITOLO IV</li>
              <li class="NestedListItem">CAPITOLO V</li>
            </ul>
        </li>
        <li class="MenuBarItem">STATISTICHE</li>
        <li class="MenuBarItem">CURIOSITÀ</li>
      </ul>
      <!-- <ul id="container_list">
        <li class="container_list_li" lang="en">HOME</li>
        <li id="nested_list">
          <span id="I_nested_list_span">TRAMA</span>
          <ul id="nstd_lst">
            <li class="nested_list_li"><span id="II_nested_list_span"><a href="history.html">&nbsp;&nbsp;&nbsp;CAPITOLO I</a></span></li>
            <li class="nested_list_li"><a href="history_2.html">&nbsp;&nbsp;&nbsp;CAPITOLO II</a></li>
            <li class="nested_list_li"><a href="history_3.html">&nbsp;&nbsp;&nbsp;CAPITOLO III</a></li>
            <li class="nested_list_li"><a href="history_2016.html">&nbsp;&nbsp;&nbsp;CAPITOLO IV</a></li>
            <li class="nested_list_li"><a href="history_eternals.html">&nbsp;&nbsp;&nbsp;CAPITOLO V</a></li>
          </ul>
        </li>
        <li class="container_list_li" lang="en"><a href="stats.html">STATS</a></li>
        <li class="container_list_li"><a href="trivia.html">CURIOSITÀ</a></li>
      </ul> -->
      <div id="MenuUserWidget">

      </div>
    </nav>
  </header>
  <div class="main">
    <p id="Welcome_Messages">BENVENUTI ALLA <strong>WIKI</strong> (non) <strong>OFFICIALE</strong> DI <strong lang="en">DOOM</strong></p>
    <div id="home_widget">

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
<script type="text/javascript" src="SCRIPTS/common_jsv_functions.js"></script>
</body>
</html>
