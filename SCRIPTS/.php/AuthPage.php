<?php
function printPasswordError(){
  echo "<div class='ErrorBox'>";
  echo "<p class='ErrorMessage'>Credenziali errate.</p>";
  echo "</div>";
}

function checkUser($email, $password){
  require 'database_connection.php';
  $ret = "userFound";

  $stmt = $conn->prepare("SELECT psw FROM DoomWiki.users WHERE fst_mail = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if($conn->connect_error){
    $ret = "errorState";
  }else if($result->num_rows > 0){
    $user = $result->fetch_assoc();
    if(password_verify($password, $user['psw'])){
      $ret = "userFound";
    }else{
      $ret = "wrongPassword";
    }
  }else{
    $ret = "noUserFound";
  }

  $conn->close;
  return $ret;
}

function PerformAuth(){
  if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['email'])){
    if(isset($_POST['SaveEmail']) && $_POST['SaveEmail'] === "True"){
      setcookie("email", $_POST['email'], time() + 60*60*24*365);
      $_COOKIE["email"]=$_POST['email'];
    }else{
      setcookie("email", "", time()-3600);
      $_COOKIE["email"]="";
    }
    switch (checkUser($_POST['email'], $_POST['password'])) {
      case 'userFound':
      $SessID = password_hash(strval(getIPAddr()).strval($_SERVER['HTTP_USER_AGENT']), PASSWORD_DEFAULT);

      setcookie("SessionID", $_POST['email']."_".$SessID, time() + 60*60*2);
      $_COOKIE["SessionID"]=$SessID;

      header("location: /");
      break;
      case 'noUserFound':
      case 'wrongPassword':
      echo "<div class='ErrorBox'>";
      echo "<p class='ErrorMessage'><span lang='en'>Credenziali non corrette.</p>";
      echo "</div>";
      break;
      case 'errorState':
      echo "<div class='ErrorBox'>";
      echo "<p class='ErrorMessage'>Errore nel sistema durante l'accesso.</p>";
      echo "</div>";
      break;
      default:
      // code...
      break;
    }
  }
}

?>
