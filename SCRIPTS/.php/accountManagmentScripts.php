<?php
if(isset($_GET['act']) && $_GET['act']=='closeSess'){
  setcookie("SessionID", "", time() + 60*60*24*365);
  $_COOKIE["SessionID"]="";
  header("location: /");
}
?>
