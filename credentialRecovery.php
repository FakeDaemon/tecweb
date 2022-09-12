<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_CREDENTIALRECOVERY.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Recupero Credenziali | WikiDoom</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="keywords" content="DOOM, credential, recovery" />
  <meta name="description" content="Pagina riguardante il recupero delle credenziali" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="SCRIPTS/css_modifier.js"></script>
  <script type="text/javascript" src="SCRIPTS/cookie_extractor.js"></script>
</head>

<body onload="redirection()">
  <?php
  require 'SCRIPTS/.php/database_connection.php';
  include 'SCRIPTS/.php/user.php';

  $user = new User($conn);
  if (isset($_POST['CookieAccepted']) && $_POST['CookieAccepted'] == 'Accetta') {
    setCookie('CookieAccepted', 'Accetta', time() + (86400 * 30));
    $_COOKIE['CookieAccepted'] = 'Accetta';
    header('location:credentialRecovery.php');
  }
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
  ?>
    <form class="cookie-banner" action="credentialRecovery.php" method="post">
      <p>
        Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
        il contenuto e analizzare il traffico di rete.
        <a href=cookie_informativa.php>Leggi di più riguardo ai <span lang="en">cookie</span></a>
      </p>
      <input type="submit" name="CookieAccepted" value="Accetta">
    </form>
  <?php
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
        if ($user->isLogged()) echo "<img src='IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
        ?>
      </div>
    </nav>
  </header>
  <div class="main">

    <div class="main">
      <p>RECUPERO CREDENZIALI</p>
      <form id="auth_widget">

        <p>Inserisci l'<span lang="en">email</span> che hai usato per iscriverti al sito nel campo sottostante. </p>
        <p>Riceverai tutte le istruzioni per recuperare la tua password.</p>
        <p>Se non ricevi nessun messaggio o non ricordi la tua <span lang="en">email</span> <a href="help.php">scrivici</a> e ti ricontatteremo.</p>

        <label id="email_input_label" for="email_input" class="up"><span lang="en">Email</span></label>
        <input id="email_input" type="text" name="username" required>

        <a id="HelpLink" href="help.php">Serve aiuto?</a>
        <input type="submit" value="INVIA LINK">
        <input id="reset_button" type="reset" value="PULISCI">
      </form>
    </div>

  </div>
  <footer id="foot">

    <div id="siteInfo">
      <h1>Doom Wiki</h1>
      <p>DoomWiki è sviluppato da appassionati e ammiratori del videogioco.</p>
      <p><span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC<span class="screen-reader-only">(apre una nuova finestra)</span></a>,
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
        <li><a href="stats.php">Statistiche</a></li>
        <li><a href="trivia.php">Curiosità</a></li>
        <li><a href="signup.php">Registrazione</a> (nuovo utente)</li>
        <li><a href="signup.php">Accesso</a> (utente già registrato)</li>
        <li><a href="account-managment.php">Impostazioni profilo (utente gia resitrato)</a>
          <ul>
            <li><a href="account-managment/email-change.php">Cambio <span lang="en">email</span></a></li>
            <li><a href="account-managment/password-change.php">Cambio <span lang="en">password</span></a></li>
            <li><a href="account-managment/profile-pic-change.php">Cambio immagine-profilo</a></li>
            <li><a href="account-managment/username-change.php">Cambio nome utente</a></li>
            <li><a href="account-managment/delete-account.php">Eliminazione profilo</a></li>
          </ul>
        </li>
        <li><a href="help.php">Modulo assistenza</a></li>
        <li><a href="cookie_informativa.php">Informativa <span lang="en">cookie</span></a></li>
      </ul>
    </div>

  </footer>
  <script type="text/javascript" src="SCRIPTS/CredentialRecoveryPage.js"></script>
</body>

</html>
