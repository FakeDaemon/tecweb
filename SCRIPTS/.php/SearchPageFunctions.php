<?php
function inputClean($inputString){
  $ShittyWords = array("e", "né", "o", "inoltre", "ma", "però", "dunque", "anzi", "che", "allorché", "perché", "giacché", "purché", "affinché", "eppure", "oppure", "dopoché", "e", "anche", "neanche", "neppure", "o", "ovvero", "ossia", "oppure", "ma", "però", "tuttavia", "anzi", "infatti", "cioè", "ossia", "dunque", "quindi", "perciò", "che", "come", "quando", "mentre", "finché", "affinché", "perché", "perché", "poiché", "siccome", "sebbene", "quantunque", "se", "purché", "qualora", "perché", "come", "se", "fuorché", "tranne", "il", "lo", "la", "i", "gli", "le", "di", "a", "da", "in", "con", "su", "per", "tra", "fra", "qui", "qua", "costì", "colà", "vicino", "lontano", "ora", "adesso", "ancora", "ieri", "oggi", "domani", "prima", "poi", "presto", "subito", "tardi", "sempre", "mai", "bene", "male", "meglio", "peggio", "volentieri", "molto", "poco", "meno", "troppo", "più", "tanto", "assai", "niente", "nulla", "sì", "certo", "sicuro", "no", "non", "neanche", "neppure", "nemmeno", "forse", "probabilmente", "quasi",  "bene", "male", "forse", "pure", "sempre", "ieri", "oggi", "poi", "tardi", "mai", "magari", "volentieri", "molto", "tanto", "poco", "meno", "spesso", "meglio", "peggio", "presto", "subito", "almeno", "dappertutto", "infatti", "inoltre", "intanto");
  $aux = explode(' ', $inputString);
  $ret = array();
  foreach ($aux as $word) {
    if(in_array(strtolower($word), $ShittyWords, true) === false) {
      array_push($ret, $word);
    }
  }
  return $ret;
}
function printResult($row){
  echo '<a href="questions.php?id='.$row['id'].'"><p class="title">'.$row['title'].'</p><p class="details">Aperto da '.$row['user_name'].' in data '.$row['creation_date'].'</p></a>';
}
function printSearchResult($SearchTerms){
  require 'database_connection.php';
  if($conn->connect_error){

  }else{
    $target = inputClean(htmlentities($SearchTerms));
    $sql = "SELECT * FROM DoomWiki.topics JOIN DoomWiki.users ON fst_mail = email";
    $result = $conn->query($sql);
    $resultCount=0;
    while ($row = $result->fetch_assoc()) {
      if($resultCount<10){
        foreach ($target as $word){
          if(strpos($row['title'], $word) !== false){
            if($resultCount < 10) {
              printResult($row);
              $resultCount+=1;
              break;
            }
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
