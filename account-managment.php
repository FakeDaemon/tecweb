<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_ACCOUNTMANAGMENT.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Gestione Account | WikiDoom</title>
  <meta name="keywords" content="DOOM"/>
  <meta name="description" content="DOOM Wiki"/>
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="SCRIPTS/css_modifier.js"></script>
</head>

<body>
  <header>
    <h1 id="logo">DOOM WIKI</h1>

    <nav id="NavBar">
      <ul id="MenuBar">
        <li class="MenuBarItem" lang="en"><a href="/" lang="en">HOMEPAGE</a></li>
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

    <p>GESTIONE <span lang="en">ACCOUNT</span></p>
    <div id="auth_widget">
      <p>IMMAGINE PROFILO</p>
      <a href="account-managment/profile-pic-change.php">Cambia immagine profilo.</a>
      <a href="account-managment/profile-pic-change.php?act=rmv">Rimuovi immagine profilo.</a>

      <p>DATI ACCOUNT</p>
      <a href="account-managment/username-change.php">Cambia <span lang="en">username</span>.</a>
      <a href="account-managment/password-change.php">Cambia <span lang="en">password</span>.</a>
      <a href="account-managment/email-change.php">Cambia <span lang="en">emails</span> associata all'account.</a>

      <hr>

      <a href="account-managment/log-out.php">Chiudi sessione.</a>
      <a class="noPlease" href="account-managment/delete-account.php">Elimina account.</a>
      <span><a class="smaller" href="help.php">Serve aiuto?</a></span>

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
