<?php
function sendMessage($QuestionID){
  if(isset($_POST['AnswerBody']) && $GLOBALS['logState']){
    require 'database_connection.php';
    if($conn->connect_error){
      //errore di connessione
    }else{
      $stmt = $conn->prepare("INSERT INTO DoomWiki.comments(commentBody, writeDate, topicID, email) VALUES(?, ?, ?, ?)");
      $commentBody = $_POST['AnswerBody'];
      $currentDate = date("Y-m-d H:i:s");
      $stmt->bind_param("ssis", htmlentities($commentBody), $currentDate, $QuestionID, explode('_',$_COOKIE["SessionID"])[0]);
      $stmt->execute();
      header("location: questions.php?id=".$QuestionID);
    }
  }
}
function printQuestion($QuestionID, $PageCount){
  require 'database_connection.php';
  $stmt = $conn->prepare("SELECT * FROM DoomWiki.topics AS t JOIN DoomWiki.users AS u ON t.email = u.fst_mail WHERE t.id = ? ;");
  $stmt->bind_param("i", $QuestionID);
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
  $stmt->bind_param("i", $QuestionID);
  $stmt->execute();
  $result = $stmt->get_result();

  if($PageCount > intval($result->num_rows/10)){
    echo "<div class='message'>";
    echo "<div class='userDetails'>";
    echo "<img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>";
    echo "<p class='username'>DoomWiki.it</p>";
    echo "<p class='messageDatestamp'>In questo momento</p>";
    echo "</div>";
    echo "<p class='text'>Qualcuno si diverte a cambiare parametri nell'URL del sito. Dai, valà torna alla <a href='questions.php?id=".$QuestionID."'>prima pagina</a></p>";
    echo "</div>";
  }

  $commentCount = $PageCount*10;
  $a=0;
  while ($comment = $result->fetch_assoc()) {
    if($a>=$commentCount && $commentCount<10*($PageCount+1)){
      echo "<div class='message";
      if($GLOBALS['logState'] && $comment['email'] === explode('_',$_COOKIE["SessionID"])[0]) //utente loggato
      echo " ofUser";
      echo "'>";
      echo "<div class='userDetails'>";
      echo "<img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>";
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

  if($commentCount!==0 && ($result->num_rows > 10*($PageCount))){
    echo "<a class='";
    if($PageCount == 0) echo "CurrentPage";
    echo "' id='FirstPage' href='questions.php?id=".$QuestionID."'>Prima Pagina</a>";
    echo "<a class='";
    if($PageCount == 0) echo "CurrentPage";
    echo "' href='questions.php?id=".$QuestionID."&page=";
    if($PageCount == 0) echo $PageCount;
    else echo $PageCount-1;
    echo "'>Pagina Precedente</a>";
    echo "<a class='";
    if($PageCount == intval($result->num_rows/10)) echo "CurrentPage";
    echo "' href='questions.php?id=".$QuestionID."&page=";
    echo $PageCount+1;
    echo "'>Pagina Successiva</a>";
    echo "<a class='";
    if($PageCount == intval($result->num_rows/10)) echo "CurrentPage";
    echo "' id='LastPage' href='questions.php?id=".$QuestionID."&page=".intval($result->num_rows/10)."'>Ultima Pagina</a>";
  }


  $conn->close();
};
?>
