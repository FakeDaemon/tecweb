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
  $SessID = strval(getIPAddr()).strval($_SERVER['HTTP_USER_AGENT']);
  if(isset($_COOKIE["SessionID"]) && password_verify($SessID, $_COOKIE["SessionID"])) {
    $GLOBALS["logState"] = true;
  }
}

function printLoggedMenuWidget($level=0){
  //Uso il cookie con il session ID per recuperare l'username
  echo "<div>";
  echo "<p>USERNAME</p>";
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

?>
