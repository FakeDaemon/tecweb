<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_CREDENTIALRECOVERY.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Recupero Credenziali | WikiDoom</title>
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
        <li class="MenuBarItem"><a href="stats.php">CURIOSITÀ</a></li>
      </ul>
      <div id="MenuUserWidget">
        <?php
        $GLOBALS['logState'] = false;
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

    <div class="main">
      <p>RECUPERO CREDENZIALI</p>
      <form id="auth_widget">

        <p>Inserisci l'<span lang="en">email</span> che hai usato per iscriverti al sito nel campo sottostante. </p>
        <p>Riceverai tutte le istruzioni per recuperare la tua password.</p>
        <p>Se non ricevi nessun messaggio o non ricordi la tua  <span lang="en">email</span> <a href="help.php">scrivici</a> e ti ricontatteremo.</p>

        <label id="email_input_label" for="email_input" class="up"><span lang="en">Email</span></label>
        <input id="email_input" type="text" name="username" required>

        <a id="HelpLink" href="help.php">Serve aiuto?</a>
        <input type="submit" value="INVIA LINK">
        <input id="reset_button" type="reset" value="PULISCI">
      </form>
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
  <script type="text/javascript" src="SCRIPTS/CredentialRecoveryPage.js"></script>
</body>
</html>
