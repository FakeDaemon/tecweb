<?php

  function isLogged(){
    return False;
  }

  function printLoggedMenuWidget(){
    //Uso il cookie con il session ID per recuperare l'username
    echo "<div>";
    echo "<p>USERNAME</p>";
    echo "<a href='account-managment.php'>Impostazioni</a>";
    echo "</div>";
    echo "<img src='/IMAGES/ProfilePics/Default.jpg' alt='Doomguy, effettua l'accesso!'>";
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
