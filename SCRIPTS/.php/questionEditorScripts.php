<?php
function createTopic(){
  $ret = "okay";
  if(isset($_COOKIE['SessionID']) && count(explode('_', $_COOKIE['SessionID']))===2){
    if(isset($_POST['QuestionTitle'])){
      if(isset($_POST['QuestionBody'])){
        require 'database_connection.php';

        $stmt = $conn->prepare("SELECT * FROM DoomWiki.topics WHERE title = ?");
        $stmt->bind_param("s", $_POST['QuestionTitle']);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 0){
          $stmt = $conn->prepare("INSERT INTO DoomWiki.topics(title, description, creation_date, email) VALUES(?, ?, ?, ?, ?);");
          $title = htmlspecialchars($_POST['QuestionTitle']);
          $description = htmlspecialchars($_POST['QuestionBody']);
          $creationDate = date("Y-m-d H:i:s");
          $email = explode('_', $_COOKIE['SessionID'])[0];
          $stmt->bind_param("sssss", $title, $description, $creationDate, $email);
          $stmt->execute();
          if($conn->connect_error){
            $ret = "error";
          }
        }
        $conn->close();
        return $ret;
      }
    }
  }else{
    setcookie('SessionID', ' ', time()-3600);
    $_COOKIE['SessionID'] = '';
  }
}
?>
