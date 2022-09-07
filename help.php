<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_HELP.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Chiedi Aiuto | WikiDoom</title>
  <meta name="keywords" content="DOOM" />
  <meta name="description" content="DOOM Wiki" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
</head>

<body>
  <?php
  require 'SCRIPTS/.php/database_connection.php';
  include 'SCRIPTS/.php/user.php';

  $user = new User($conn);
  if (isset($_POST['email']) && isset($_POST['message'])) {
    if (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $_POST['email'])) {
      $GLOBALS["emailWrongFormat"] = true;
    }else{
      if ($_POST['message'] != "") {
        $stmt = $conn->prepare("INSERT INTO DoomWiki.helpRequests(requestBody, requestDate, requestEmail) VALUES (? , ? , ?);");
        $currentDate = date("Y-m-d H:i:s");
        $stmt->bind_param("sss", htmlentities($_POST['message']), $currentDate, $_POST['email']);
        $stmt->execute();
        header('location: help.php?Success');
      }else{
        $GLOBALS["messageWrongFormat"] = true;
      }
    }
  }
  ?>
  <header>
    <h1 id="logo">DOOM WIKI</h1>

    <nav id="NavBar">
      <ul id="MenuBar">
        <li class="MenuBarItem" lang="en"><a href="/" lang="en">HOMEPAGE</a></li>
        <li class="MenuBarItemNestedList">
          <label id="NestedListLbl" for="NestedListBtn">
            TRAMA
          </label>
          <input id="NestedListBtn" type="checkbox" value="Mostra Capitoli Disponibili">
          <ul id="MenuBarNestedList">
            <li class="NestedListItem"><a href="history.php">CAPITOLO <abbr title="Primo">I</abbr></a></li>
            <li class="NestedListItem"><a href="history_2.php">CAPITOLO <abbr title="Secondo">II</abbr></a></li>
            <li class="NestedListItem"><a href="history_3.php">CAPITOLO <abbr title="Terzo">III</abbr></a></li>
            <li class="NestedListItem"><a href="history_2016.php">CAPITOLO <abbr title="Quarto">IV</abbr></a></li>
            <li class="NestedListItem"><a href="history_eternals.php">CAPITOLO <abbr title="Quinto">V</abbr></a></li>
          </ul>
        </li>
        <li class="MenuBarItem"><a href="stats.php">STATISTICHE</a></li>
        <li class="MenuBarItem"><a href="stats.php">CURIOSITÀ</a></li>
      </ul>
      <div id="MenuUserWidget">
        <div>
          <?php
          if ($user->isLogged()) echo "<p>" . $user->user_name . "</p>";
          else echo "<p>OSPITE</p>";
          if ($user->isLogged()) {
            if ($user->isSuperUser()) echo "<a href='siteManager.php'>Gestione Sito</a>";
            echo "<a href='account-managment.php'>Impostazioni</a>";
          } else {
            echo "<a href='signup.php'>Registrati</a>";
            echo "<a href='login.php'>Entra</a>";
          }
          ?>
        </div>
        <?php
        if ($user->isLogged()) echo "<img src='/IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='/IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
        ?>
      </div>
    </nav>
  </header>
  <div class="main">

    <?php
    if (isset($_GET['Success']) && $_GET['Success'] == '') {
    ?>
      <div class="result">
        <p class="success">Richiesta inviata con successo.</p>
        <p class="subTitle">La tua richiesta è stata inoltrata al nostro team di moderatori, riceverai una risposta sulla mail che hai fornito il prima possibile</p>
      </div>
    <?php
    } else {
    ?>
      <p>METTITI IN CONTATTO</p>
      <form id="auth_widget" action="help.php" method="post">
        <?php if($GLOBALS['emailWrongFormat']) echo "<p class='errorMessage'>Formato email non valido.</p>";?>
        <?php if($GLOBALS['messageWrongFormat']) echo "<p class='errorMessage'>Formato del messaggio non valido.</p>";?>
        <label id="email_input_label" for="email_input" class="up"><span lang="en">Email</span></label>
        <input id="email_input" type="text" name="email" required>

        <label id="textarea_label" for="text_input" class="up">Il tuo messaggio</label>
        <textarea maxlength="300" id="text_input" name="message" placeholder="Inserisci qui il tuo messaggio, descrivi il meglio possibile il tuo dubbio. Ti contatteremo il prima possibile." required></textarea>
        <p id="message_helper" class="noJs"><span id="message_length">0</span>/300</p>

        <input type="submit" value="INVIA">
        <input id="reset_button" type="reset" value="PULISCI">

        <p>Problema già risolto?<br><a href="index.php">Torna alla home page!</a></p>
      </form>
    <?php
    }
    ?>

  </div>
  <footer id="foot">
    <p>
      <span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC</a>,
      a ZeniMax Media company. I marchi appartengono ai rispettivi proprietari.
      Tutti i diritti riservati.<br>
      <br>
    </p>
    <img class="imgVadidCode" src="IMAGES/valid-xhtml10.png" alt="html valido" />
    <img class="imgVadidCode" src="IMAGES/vcss-blue.gif" alt="css valido" />
  </footer>
  <script src="/SCRIPTS/.js/helppage.js"></script>
</body>

</html>