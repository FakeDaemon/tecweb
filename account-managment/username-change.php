<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="../CSS/STYLE_USERNAMECHANGE.css" rel="stylesheet">
  <link href="../CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Cambio Username | WikiDoom</title>
  <meta name="keywords" content="DOOM"/>
  <meta name="description" content="DOOM Wiki"/>
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="SCRIPTS/css_modifier.js"></script>
  <script type="text/javascript" src="SCRIPTS/cookie_extractor.js"></script>
</head>

<body onload="redirection()">
  <header>
    <h1 id="logo">DOOM WIKI</h1>

    <nav id="NavBar">
      <ul id="MenuBar">
        <li class="MenuBarItem" lang="en"><a href="../" lang="en">HOMEPAGE</a></li>
        <li class="MenuBarItemNestedList">
          <label id="NestedListLbl" for="NestedListBtn">
            TRAMA
          </label>
          <input id="NestedListBtn" type="checkbox" value="Mostra Capitoli Disponibili">
            <ul id="MenuBarNestedList">
              <li class="NestedListItem"><a href="../history.html">CAPITOLO <abbr title="Primo">I</abbr></a></li>
              <li class="NestedListItem"><a href="../history_2.html">CAPITOLO <abbr title="Secondo">II</abbr></a></li>
              <li class="NestedListItem"><a href="../history_3.html">CAPITOLO <abbr title="Terzo">III</abbr></a></li>
              <li class="NestedListItem"><a href="../history_2016.html">CAPITOLO <abbr title="Quarto">IV</abbr></a></li>
              <li class="NestedListItem"><a href="../history_eternals.html">CAPITOLO <abbr title="Quinto">V</abbr></a></li>
            </ul>
        </li>
        <li class="MenuBarItem"><a href="../stats.html">STATISTICHE</a></li>
        <li class="MenuBarItem"><a href="../stats.html">CURIOSITÀ</a></li>
      </ul>
      <div id="MenuUserWidget">

      </div>
    </nav>
  </header>
  <div class="main">

    <p>NOME UTENTE</p>
    <form id="auth_widget">
      <p>Nome utente attuale:</p>
      <p>CURRENT_USERNAME</p>
      <label id="NewUsernameLabel" for="NextUsername" class="up">Nuovo Nome Utente</label>
      <input id="NextUsername" type="text" name="NewUsername">

      <input id="ConfirmButton" type="submit" name="SubmitButton" value="Conferma">
      <input id="ResetButton" type="reset" value="Pulisci">
      <a href="../help.php">Serve aiuto?</a>
    </form>

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
  <script type="text/javascript" src="../SCRIPTS/usernamechangepage.js"></script>
</body>

</html>
