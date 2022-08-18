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
  <?php
  require 'SCRIPTS/.php/database_connection.php';
  require 'SCRIPTS/.php/questionPageScripts.php';
  include 'SCRIPTS/.php/user.php';

  $user = new User($conn);
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
        <div>
        <?php
        if($user->isLogged()) echo "<p>".$user->user_name."</p>";
        else echo "<p>OSPITE</p>";
        if($user->isLogged()) echo "<a href='account-managment.php'>Impostazioni</a>";
        else {
          echo "<a href='signup.php'>Registrati</a>";
          echo "<a href='login.php'>Entra</a>";
        }
        ?>
        </div>
        <?php
        if($user->isLogged()) echo "<img src='/IMAGES/ProfilePics/ProfilePicN".$user->profile_pic.".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='/IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
        ?>
      </div>
    </nav>
  </header>
  <div class="main">
    <?php
    printQuestion($_GET['id'], isset($_GET['page']) ? $_GET['page'] : 0);
    if($GLOBALS['logState']){
      echo '<a id="AnswerPagelink" href="questionEditor.php">Fai una domanda alla community!</a>';
    }else{
      echo '<a id="AnswerPagelink" href="login.php">Fai una domanda alla community!</a>';
    }
    echo '<br><a id="HelpPagelink" href="help.php?topicID='.$_GET['id'].'">Qualcosa di strano? Fai una seganalazione!</a>';
    ?>


    <?php if($user->isLogged()) {?>
      <form action="questions.php?id=<?php echo $_GET['id']; ?>" method="post">
        <label for="AnswerBox">
          La tua risposta:
        </label>
        <textarea maxlength="30000" id="AnswerBox" name="AnswerBody" rows="8" cols="80"></textarea>
        <input type="submit" value="INVIA">
        <input type="reset" value="PULISCI">
      </form>
    <?php }else{ ?>
      <form class="blocked" action="questions.php?id=<?php echo $_GET['id']; ?>" method="post">
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
</body>
</html>
