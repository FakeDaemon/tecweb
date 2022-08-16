<?php
$err = "true";
$ini_array = parse_ini_file('CNFG/CNFGS.ini', true);
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
