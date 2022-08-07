<?php

  function isLogged(){
    return False;
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
