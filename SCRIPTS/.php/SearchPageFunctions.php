<?php
function printSearchResult($SearchTerms){
  //si connette al data base, fa una ricerca nel database, e printa tutti i topic il cui titolo contiene
  //Se non c'è nessun risultato lo comunica
  require 'database_connection.php';
  if($conn->connect_error){//errore di connessione

  }else{
    $target = str_split($SearchTerms, ' ');

    $sql = "SELECT * FROM DoomWiki.topics";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
      
    }

    $conn->close;
    if(true){//Nessun risultato
      echo "<p>Nessuno ha ancora chiesto quello che hai cercato.<a href='QuestionPage.php'>Chiedi alla community!</a></p> ";
      if(false){//Più pagine
          $GLOBALS['MorePage'] = true;
      }
    }
  }
}
 ?>
