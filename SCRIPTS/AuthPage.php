<?php
function printPasswordError(){
  echo "<div class='ErrorBox'>";
  echo "<p class='ErrorMessage'>Credenziali errate.</p>";
  echo "</div>";
}
function chekUserPresence($username, $password){
  //Controllo se l'utente è presente nel database
  //Controllo se la password corrisponde altrimenti printo un messaggio di errore
  // printPasswordError();
  return True;
}
  function PerformAuth(){
    if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['username'])){
      if(chekUserPresence($_POST['username'], $_POST['password'])){
        //Salva username
        if(isset($_POST['SaveUsername']) && $_POST['SaveUsername'] === "True"){
          setcookie("username", $_POST['username'], time() + 60*60*24*365);
          $_COOKIE["username"]=$_POST['username'];
        }

        //Creo cookie di sessionID
        //Modifico l'entries nel database per poter identificare l'utente durante la navigazione

      }
    }
  }
?>
