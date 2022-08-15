<?php
function printQuestion($QuestionID, $PageCount){
  require 'database_connection.php';
  $stmt = $conn->prepare("SELECT * FROM DoomWiki.topics WHERE id = ?");
  $stmt->bind_param("i", $QuestionID);
  $stmt->execute();
  $result = $stmt->get_result();

  $a=0;
  while ($a <= 10 && $row = $result->fetch_assoc()) {
    echo $row['id'];
  }

  $conn->close();
};
?>
