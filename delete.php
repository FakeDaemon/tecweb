<?php
include 'SCRIPTS/.php/header.php';
echo bin2hex(random_bytes(32));
echo password_hash("user1", PASSWORD_DEFAULT);
?>
