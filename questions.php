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

  if(isset($_POST['AnswerBody']) && $user->isLogged()){
    if($conn->connect_error){
      //errore di connessione
    }else{
      $stmt = $conn->prepare("INSERT INTO DoomWiki.comments(commentBody, writeDate, topicID, email) VALUES(?, ?, ?, ?)");
      $commentBody = $_POST['AnswerBody'];
      $currentDate = date("Y-m-d H:i:s");
      $stmt->bind_param("ssis", htmlentities($commentBody), $currentDate, $_GET['id'], $user->email);
      $stmt->execute();
      header("location: questions.php?id=".$_GET['id']);
    }
  }

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
    $stmt = $conn->prepare("SELECT * FROM DoomWiki.topics AS t JOIN DoomWiki.users AS u ON t.email = u.fst_mail WHERE t.id = ? ;");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $topic = $result->fetch_assoc();

    echo "<p>Testo della domanda</p>";

    echo "<div class='details'>";
    echo "<img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>";
    echo "<p class='username'>".$topic['user_name']."</p>";
    echo "<p class='postDate'>Postato il ".$topic['creation_date']."</p>";
    echo "</div>";

    echo "<h1 class='title'>".$topic['title']."</h1>";
    echo "<h2>".$topic['description']."</h2>";

    echo "<p>Tutte le risposte</p>";
    echo "<div class='chat'>";

    $stmt = $conn->prepare("SELECT * FROM DoomWiki.topics AS t JOIN DoomWiki.comments AS c ON t.id = c.topicID JOIN DoomWiki.users AS u ON u.fst_mail=c.email WHERE t.id = ? ;");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();

    $commentCount = $_GET['page']*10;
    $a=0;
    while ($comment = $result->fetch_assoc()) {
      echo "ciao";
      if($a>=$commentCount && $commentCount<10*($_GET['page']+1)){
        echo "<div class='message'>";
        echo "<div class='userDetails'>";
        echo "<img src='/IMAGES/ProfilePics/ProfilePicN".$comment['profile_pic'].".jpg' alt='Doomguy, accedi o registrati!'>";
        echo "<p class='username'>".$comment['user_name']."</p>";
        echo "<p class='messageDatestamp'>Postato il ".$comment['writeDate']."</p>";
        echo "</div>";
        echo "<p class='text'>".$comment['commentBody']."</p>";
        echo "</div>";
        $commentCount++;
      }
      $a++;
    }
    echo "</div>";

    if($commentCount!==0 && ($result->num_rows > 10*($_GET['page']+1))){
      echo "<a class='";
      if($_GET['page'] == 0) echo "CurrentPage";
      else echo '';
      echo "' id='FirstPage' href='questions.php?id=".$QuestionID."'>Prima Pagina</a>";
      echo "<a class='";
      if($_GET['page'] == 0) echo "CurrentPage";
      else echo '';
      echo "' href='questions.php?id=".$QuestionID."&page=";
      if($_GET['page'] == 0) echo $_GET['page'];
      else echo $_GET['page']-1;
      echo "'>Pagina Precedente</a>";
      echo "<a href='questions.php?id=".$QuestionID."&page=";
      echo $_GET['page']+1;
      echo "'>Pagina Successiva</a>";
      echo "<a id='LastPage' href='questions.php?id=".$QuestionID."'>Ultima Pagina</a>";
    }
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
