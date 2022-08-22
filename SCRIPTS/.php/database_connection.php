<?php
$ini_url = 'CNFG/CNFGS.ini';
if($level){
  for ($i=0; $i < $level; $i++) {
    $ini_url = '../'.$ini_url;
  }
}
$ini_array = parse_ini_file($ini_url, true);
if($ini_array){
  $err = "false";
  $servername = $ini_array['Dbcredentials']['servername'];
  $usrnm = $ini_array['Dbcredentials']['username'];
  $psw = $ini_array['Dbcredentials']['password'];

  // Create connection
  $conn = new mysqli($servername, $usrnm, $psw);
  // Check connection
  if ($conn->connect_error) {
    $err = "true";
    echo $conn->connect_error;
    return;
  }
  $conn->set_charset('utf8mb4');
}
?>
