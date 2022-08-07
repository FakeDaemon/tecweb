<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
function printMailError(){
  echo "<div class='ErrorBox'>";
  echo "<p class='ErrorMessage'>Email già associata ad un altro account.</p>";
  echo "<a class='ErrorSubMessage' href='credentialRecovery.php'>Tenta un <span lang='en'>log-in</span>.</a>";
  echo "<a class='ErrorSubMessage' href='credentialRecovery.php'>Credenziali dimenticate?</a>";
  echo "</div>";
};
function printUsernameError(){
  echo "<div class='ErrorBox'>";
  echo "<p class='ErrorMessage'>Nome Utente: Formato non valido.</p>";
  echo "</div>";
};
function printPasswordError(){
  echo "<div class='ErrorBox'>";
  echo "<p class='ErrorMessage'>Password: Formato non valido.</p>";
  echo "</div>";
};

function usernameFormat($username){
  if(preg_match('/^[A-Za-z0-9]*$/', $username)) return True;
  else{
    printUsernameError();
    return False;
  };
}
function passwordFormat($password){
  if(preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])[a-zA-Z0-9]{8,15}$/', $password)) return True;
  else{
    printPasswordError();
    return False;
  }
}

function isFree($email){
  //controlla se email è presente nel database
  //returna True se non è presente
  return True;
}
function createAccount($username, $psw, $email){
  //Esegue una query di inserimento nel database con codice TBD per email di Conferma
  //Invia una mail di conferma con link per confermare l'account TBD
  //Pagina php che vuole due parametri ad esempio nome utente e 10 caratteri della password appena creata che cambia lo stato dell'utente da NonEsistente a Verificato.
  // echo $username." ".$psw." ".$email;
}
function PerformSignUp(){
  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
    if(usernameFormat(htmlentities($_POST['username'])) && passwordFormat($_POST['password'])){
      if(isset($_POST['email'])){
        if(isFree($_POST['email'])){
          $psw = password_hash($_POST['password'], PASSWORD_ARGON2I);
          $username = $_POST['username'];
          createAccount($username, $psw, $_POST['email']);
          header("location: signup.php?msg=accountCreated");
        }else printMailError();
      }
    }
  }
}
?>
