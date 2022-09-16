<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_HELP.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Chiedi Aiuto | DoomWiki</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="keywords" content=" DOOM WIKI, contatto, moderatori" />
  <meta name="description" content="Pagina per chiedere aiuto riguardo le funzioni del sito" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
</head>

<body>
  <?php
  require 'SCRIPTS/.php/database_connection.php';
  include 'SCRIPTS/.php/user.php';

  $user = new User($conn);
  if (isset($_POST['CookieAccepted']) && $_POST['CookieAccepted'] == 'Accetta') {
    setCookie('CookieAccepted', 'Accetta', time() + (86400 * 30));
    $_COOKIE['CookieAccepted'] = 'Accetta';
    header('location:help.php');
  }
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
  ?>
    <form class="cookie-banner" action="help.php" method="post">
      <p>
        Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
        il contenuto e analizzare il traffico di rete.
        <a href=cookie_informativa.php>Leggi di più riguardo ai <span lang="en">cookie</span></a>
      </p>
      <input type="submit" name="CookieAccepted" value="Accetta">
    </form>
  <?php
  }
  if (isset($_POST['email']) && isset($_POST['message'])) {
    if (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $_POST['email'])) {
      $GLOBALS["emailWrongFormat"] = true;
    }else{
      if ($_POST['message'] != "") {
        $stmt = $conn->prepare("INSERT INTO jangeli.helpRequests(requestBody, requestDate, requestEmail) VALUES (? , ? , ?);");
        $currentDate = date("Y-m-d H:i:s");
        $stmt->bind_param("sss", htmlentities($_POST['message']), $currentDate, $_POST['email']);
        $stmt->execute();
        header('location:help.php?Success');
      }else{
        $GLOBALS["messageWrongFormat"] = true;
      }
    }
  }
  ?>
  <header>
  <h1 id="logo">DOOM WIKI</h1>
    <label id="BurgherButtonLabel" for="BurgherButton">
      Menu
    </label>
    <input type="checkbox" id="BurgherButton" aria-hidden="true" aria-label="Apri il menu">
    <nav id="NavBar">
      <ul id="MenuBar">
        <li class="MenuBarItem" lang="en"><a href="index.php" lang="en">HOMEPAGE</a></li>
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
        <li class="MenuBarItem"><a href="stats.php">ARMI</a></li>
        <li class="MenuBarItem"><a href="trivia.php">CURIOSIT&Agrave;</a></li>
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
        if ($user->isLogged()) echo "<img src='IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
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
        <?php if(isset($GLOBALS['emailWrongFormat']) && $GLOBALS['emailWrongFormat']) echo "<p class='errorMessage'>Formato email non valido.</p>";?>
        <?php if(isset($GLOBALS['messageWrongFormat']) && $GLOBALS['messageWrongFormat']) echo "<p class='errorMessage'>Formato del messaggio non valido.</p>";?>
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
    <div id="siteInfo">
      <h1 lang="en">Doom Wiki</h1>
      <p><span lang="en">DoomWiki</span> &egrave; sviluppato da appassionati e ammiratori del videogioco.</p>
      <p><span lang="en">&copy;Doom</span> &egrave; un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank" lang="en">2022 Bethesda Softworks LLC<span class="screen-reader-only">(apre una nuova finestra, il sito &egrave; in inglese)</span></a>,
        un'azienda <span lang="en">ZeniMax Media</span>. I marchi appartengono ai rispettivi proprietari. Tutti i diritti riservati.</p>
    </div>

    <div id="SiteMap">
      <p>Mappa del sito</p>
      <ul>
        <li lang="en"><a href="index.php">Homepage</a></li>
        <li>Trama
          <ul>
            <li lang="en"><a href="history.php">Doom <abbr title="Primo">I</abbr></a></li>
            <li lang="en"><a href="history_2.php">Doom <abbr title="Secondo">II</abbr></a></li>
            <li lang="en"><a href="history_3.php">Doom <abbr title="Terzo">III</abbr></a></li>
            <li lang="en"><a href="history_2016.php">Doom <abbr title="Quarto">IV</abbr></a></li>
            <li lang="en"><a href="history_eternals.php">Doom <abbr title="Quinto">V</abbr> (Doom eternal)</a></li>
          </ul>
        </li>
        <li><a href="stats.php">Armi</a></li>
        <li><a href="trivia.php">Curiosit&agrave;</a></li>
        <li><a href="signup.php">Registrazione</a> (nuovo utente)</li>
        <li><a href="login.php">Accesso</a> (utente gi&agrave; registrato)</li>
        <li><a href="account-managment.php">Impostazioni profilo (utente gia resitrato)</a>
          <ul>
            <li><a href="account-managment/email-change.php">Cambio <span lang="en">email</span></a></li>
            <li><a href="account-managment/password-change.php">Cambio <span lang="en">password</span></a></li>
            <li><a href="account-managment/profile-pic-change.php">Cambio immagine-profilo</a></li>
            <li><a href="account-managment/username-change.php">Cambio nome utente</a></li>
            <li><a href="account-managment/delete-account.php">Eliminazione profilo</a></li>
          </ul>
        </li>
        <li class="on">Modulo assistenza</li>
        <li><a href="cookie_informativa.php">Informativa <span lang="en">cookie</span></a></li>
      </ul>
    </div>
  </footer>
  <script src="/SCRIPTS/.js/helppage.js"></script>
</body>

</html>
