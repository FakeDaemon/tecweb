<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_HELP.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Chiedi Aiuto | WikiDoom</title>
  <meta name="keywords" content="DOOM"/>
  <meta name="description" content="DOOM Wiki"/>
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="SCRIPTS/css_modifier.js"></script>
  <script type="text/javascript" src="SCRIPTS/cookie_extractor.js"></script>
</head>

<body>
  <?php
    include 'SCRIPTS/.php/header.php';
    $user_name = isLogged();
    if($user_name!==NULL)
    printLoggedMenuWidget();
    else
    printDefaultMenuWidget();
   ?>
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
        ?>
      </div>
    </nav>
  </header>
  <div class="main">

    <p>METTITI IN CONTATTO</p>
    <form id="auth_widget">
      <label id="email_input_label" for="email_input" class="up"><span lang="en">Email</span></label>
      <input id="email_input" type="email" name="email" required>

      <label id="textarea_label" for="text_input" class="up">Il tuo messaggio</label>
      <textarea maxlength="300" id="text_input" name="message" placeholder="Inserisci qui il tuo messaggio, descrivi il meglio possibile il tuo dubbio. Ti contatteremo il prima possibile." required></textarea>
      <p id="message_helper" class="noJs"><span id="message_length">0</span>/300</p>

      <input type="submit" value="INVIA">
      <input id="reset_button" type="reset" value="PULISCI">

      <p>Problema già risolto?<br><a href="index.php">Torna alla home page!</a></p>
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
  <script type="text/javascript" src="SCRIPTS/helppage.js"></script>
</body>

</html>
