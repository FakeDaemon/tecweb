<?php
function getIPAddr() {
  if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else{
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

function isLogged(){
  if(isset($_COOKIE["SessionID"])){
    require 'database_connection.php';
    $stmt = $conn->prepare("SELECT user_name FROM DoomWiki.users WHERE SessID = ?;");
    $stmt->bind_param("s", $_COOKIE["SessionID"]);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 1){
      // echo "Very, very, very rare error";
     $stmt = $conn->query("UPDATE DoomWiki.users SET SessID = NULL WHERE SessId = ?;");
      $stmt->bind_param("s", $_COOKIE["SessionID"]);
      $stmt->execute();
      return NULL;
    }else if($result->num_rows === 1){
      $user = $result->fetch_assoc();
      return $user['user_name'];
    }else{

      return NULL;
    }
  }else{
    return NULL;
  }
}

function printLoggedMenuWidget($level=0){
  //Uso il cookie con il session ID per recuperare l'username
  require 'database_connection.php';
  $stmt = $conn->prepare("SELECT user_name FROM DoomWiki.users WHERE fst_mail = ?");
  $stmt->bind_param('s', explode('_',$_COOKIE["SessionID"])[0]);
  $stmt -> execute();
  $result = $stmt -> get_result();
  $user = $result->fetch_assoc();
  $conn->close();
  echo "<div>";
  echo "<p>".$user['user_name']."</p>";
  echo "<a href='";
  for($i=0; $i<$level; $i++) echo "../";
  echo "account-managment.php'>Impostazioni</a>";
  echo "</div>";
  echo "<img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, accedi o registrati!'>";
}

function printDefaultMenuWidget(){
  echo "<div>";
  echo "<p>OSPITE</p>";
  echo "<a href='signup.php'>Registrati</a>";
  echo "<a href='login.php'>Entra</a>";
  echo "</div>";
  echo "<img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, effettua l'accesso!'>";
}

function random_str(
  int $length = 64,
  string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
  ): string {
    if ($length < 1) {
      throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
      $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
  }

  ?>
