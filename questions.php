<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link href="CSS/STYLE_TOPICPAGE.css" rel="stylesheet">
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
    <p>Testo della domanda</p>
    <div class="details">
      <img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>
      <p class="username">USERNAME</p>
      <p class="postDate">Postato il 01/01/2000</p>
    </div>
    <h1 class="title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</h1>

    <p>Tutte le risposte</p>
    <div class="chat">
      <div class="message">
        <div class="userDetails">
          <img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>
          <p class="username">USERNAME</p>
          <p class="messageDatestamp">Postato il 01/01/2000</p>
        </div>
        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="message ofUser">
        <div class="userDetails">
          <img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>
          <p class="username">USERNAME</p>
          <p class="messageDatestamp">Postato il 01/01/2000</p>
        </div>
        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="message ofUser">
        <div class="userDetails">
          <img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>
          <p class="username">USERNAME</p>
          <p class="messageDatestamp">Postato il 01/01/2000</p>
        </div>
        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="message">
        <div class="userDetails">
          <img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>
          <p class="username">USERNAME</p>
          <p class="messageDatestamp">Postato il 01/01/2000</p>
        </div>
        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="message ofUser">
        <div class="userDetails">
          <img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>
          <p class="username">USERNAME</p>
          <p class="messageDatestamp">Postato il 01/01/2000</p>
        </div>
        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="message">
        <div class="userDetails">
          <img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>
          <p class="username">USERNAME</p>
          <p class="messageDatestamp">Postato il 01/01/2000</p>
        </div>
        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="message">
        <div class="userDetails">
          <img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>
          <p class="username">USERNAME</p>
          <p class="messageDatestamp">Postato il 01/01/2000</p>
        </div>
        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>

    </div>

    <a class="CurrentPage" id="FirstPage" href="questions.php?id=123&page=0">Prima Pagina</a>
    <a class="CurrentPage" href="questions.php?id=123&page=0">Pagina Precedente</a>
    <a class="CurrentPage" href="questions.php?id=123&page=0">1</a>
    <a href="questions.php?id=123&page=0">2</a>
    <a href="questions.php?id=123&page=0">3</a>
    <span>...</span>
    <a href="questions.php?id=123&page=0">Pagina Successiva</a>
    <a id="LastPage" href="questions.php?id=123&page=0">Ultima Pagina</a>

    <a id="AnswerPagelink" href="#">Fai una domanda alla community!</a>

    <?php if($GLOBALS['logState']) {?>

      <form class="blocked" action="questions.php?id=123" method="post">
        <label for="AnswerBox">
          La tua risposta:
        </label>
        <textarea maxlength="30000" id="AnswerBox" name="AnswerBody" rows="8" cols="80"></textarea>
        <input type="submit" value="INVIA">
        <input type="reset" value="PULISCI">
      </form>
    <?php }else{ ?>
      <form class="blocked" action="questions.php?id=123" method="post">
        <label for="AnswerBox">
          La tua risposta:
        </label>
        <a href="login.php">Per rispondere effettua l'accesso al sito!</a>
        <input disabled type="submit" value="INVIA">
        <input disabled type="reset" value="PULISCI">
      </form>
    <?php }?>
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
  <script src="SCRIPTS/.js/common_jsv_functions.js"></script>
</body>
</html>
