<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link href="CSS/STYLE_QUESTIONEDITOR.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title> Home </title>
  <meta name="keywords" content="DOOM"/>
  <meta name="description" content="DOOM Wiki"/>
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto"/>
</head>
<body>
  <?php
  include 'SCRIPTS/.php/header.php';
  include 'SCRIPTS/.php/questionEditorScripts.php';
  $GLOBALS['logState'] = false;
  $state = createTopic();
  isLogged();
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
        if($GLOBALS['logState'])
        printLoggedMenuWidget();
        else
        printDefaultMenuWidget();
        ?>
      </div>
    </nav>
  </header>
  <?php if($state === "okay"){?>
    <div class="main">
      <span>
        <h1>Domanda inviata!</h1>
        <p>La tua domanda è stata inviata ai nostri moderatori, non appena verrà approvata riceverai una <span lang="en">email</span> di conferma. Grazie per il tuo contributo.</p>
        <a href="/">Continua la navigazione!</a>
      </span>
    </div>
  <?php }else if($state === "error"){?>
    <div class="main">
      <span>
        <h1>Errore del sistema.</h1>
        <p>Qualcosa è andato storto durante l'invio della tua domanda. Probabilmente stiamo già lavorando per risolvere il problema, il tuo prossimo tentativo avrà sicuramente successo, magari tenta tra qualche decina di minuti.</p>
        <a href="help.php">Segnala il problema!</a>
        <a href="/">Continua la navigazione!</a>
      </span>
    </div>
  <?php }else{ ?>
    <form class="main" method="post" action="questionEditor.php">
      <label for="Title">TITOLO DELLA DOMANDA</label>
      <input id="Title" type="text" name="QuestionTitle" required>
      <label for="Body">CORPO DELLA DOMANDA</label>
      <textarea id="Body" name="QuestionBody" rows="8" cols="80" required></textarea>
      <input type="submit" value="POSTA LA DOMANDA">
      <input type="reset" value="PULISCI">
    </form>
  <?php } ?>

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
