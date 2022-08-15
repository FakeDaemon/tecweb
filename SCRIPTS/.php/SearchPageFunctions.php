<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
function printResult($row){
  echo '<a href="questions.php?id='.$row['id'].'"><p class="title">'.$row['title'].'</p><p class="details">Aperto da '.$row['user_name'].' in data '.$row['creation_date'].'</p></a>';
}
function printSearchResult($SearchTerms){
  //si connette al data base, fa una ricerca nel database, e printa tutti i topic il cui titolo contiene
  //Se non c'è nessun risultato lo comunica
  require 'database_connection.php';
  if($conn->connect_error){//errore di connessione

  }else{
    $target = explode(" ", htmlentities($SearchTerms));
    $sql = "SELECT * FROM DoomWiki.topics JOIN DoomWiki.users ON fst_mail = email";
    $result = $conn->query($sql);
    $resultCount=0;
    while ($row = $result->fetch_assoc()) {
      if($resultCount<10){
        foreach ($target as $word){
          if(strpos($row['title'], $word) !== false){
            if($resultCount < 10) printResult($row);
            $resultCount+=1;
          }
        }
      }
    }
    if($resultCount === 0){//Nessun risultato
      echo "<p>Nessuno ha ancora chiesto quello che hai cercato.<a href='QuestionPage.php'>Chiedi alla community!</a></p> ";
    }
    if($resultCount === 10){//Più pagine
      $GLOBALS['MorePage'] = true;
    }
  }
}
?>
