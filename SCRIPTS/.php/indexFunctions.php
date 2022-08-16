<?php
function printLastTopics(){
  require 'database_connection.php';
  $result = $conn->query("SELECT * FROM DoomWiki.topics JOIN DoomWiki.users ON email = fst_mail ORDER BY creation_date LIMIT 10;");
  while($row = $result->fetch_assoc()){
    echo '<a href="questions.php?id='.$row['id'].'"><p class="title">'.$row['title'].'</p><p class="details">Aperto da '.$row['user_name'].' in data '.$row['creation_date'].'</p></a>';
  }
}
function printHotTopics(){
  require 'database_connection.php';
  $stmt = $conn->prepare("SELECT * FROM DoomWiki.topics WHERE title = ?");
  $stmt->bind_param("s", $_POST['QuestionTitle']);
  $stmt->execute();
  $result = $stmt->get_result();
}
?>
