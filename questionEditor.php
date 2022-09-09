<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link href="CSS/STYLE_QUESTIONEDITOR.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title> Home </title>
  <meta name="keywords" content="DOOM" />
  <meta name="description" content="DOOM Wiki" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
</head>

<body>
  <?php
  require 'SCRIPTS/.php/database_connection.php';
  include 'SCRIPTS/.php/user.php';

  $user = new User($conn);
  if (!$user->isLogged()) {
    header("location:login.php?QE");
  }

  if (isset($_POST['CookieAccepted']) && $_POST['CookieAccepted'] == 'Accetta') {
    setCookie('CookieAccepted', 'Accetta', time() + (86400 * 30));
    $_COOKIE['CookieAccepted'] = 'Accetta';
    header('location : questionEditor.php');
  }
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
  ?>
    <form class="cookie-banner" action="questionEditor.php" method="post">
      <p>
        Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
        il contenuto e analizzare il traffico di rete.
        <a href=cookie_informativa.php>Leggi di più riguardo ai <span lang="en">cookie</span></a>
      </p>
      <input type="submit" name="CookieAccepted" value="Accetta">
    </form>
  <?php
  }

  if (isset($_POST['QuestionTitle']) && isset($_POST['QuestionBody'])) {
    $stmt = $conn->prepare("SELECT * FROM DoomWiki.topics WHERE title = ?");
    $stmt->bind_param("s", $_POST['QuestionTitle']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
      $stmt = $conn->prepare("INSERT INTO DoomWiki.topics(title, description, creation_date, email) VALUES(?, ?, ?, ? );");
      $title = htmlspecialchars($_POST['QuestionTitle']);
      $description = htmlspecialchars($_POST['QuestionBody']);
      $creationDate = date("Y-m-d H:i:s");
      $stmt->bind_param("ssss", $title, $description, $creationDate, $user->email);
      $stmt->execute();
      if ($conn->connect_error) {
        header("location: questionEditor.php?Error");
      }
      header("location: questionEditor.php?Success");
    } else {
      $row = $result->fetch_assoc();
      header("location:questionEditor?Duplicate=" . $row['id']);
    }
  }

  ?>
  <header>
    <h1 id="logo">DOOM WIKI</h1>
    <nav id="NavBar">
      <ul id="MenuBar">
        <li class="MenuBarItem" lang="en"><a href="/">HOMEPAGE</a></li>
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
        <li class="MenuBarItem"><a href="trivia.php">CURIOSITÀ</a></li>
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

  <?php if (isset($_GET['Success'])) { ?>
    <div class="main">
      <span>
        <h1>Domanda inviata!</h1>
        <p>La tua domanda è stata inviata ai nostri moderatori, verifica il suo stato nella <a href="questions.php?User">pagina dedicata</a>.Nel frattempo ti ringraziamo per il tuo contributo.</p>
        <a href="/">Torna alla <span lang="en">home page</span>!</a>
      </span>
    </div>
  <?php } else if (isset($_GET['Error'])) { ?>
    <div class="main">
      <span>
        <h1>Errore del sistema.</h1>
        <p>Qualcosa è andato storto durante l'invio della tua domanda. Probabilmente stiamo già lavorando per risolvere il problema, il tuo prossimo tentativo avrà sicuramente successo, magari tenta tra qualche minuto.</p>
        <a href="help.php">Segnala il problema!</a>
        <a href="/">Torna alla <span lang="en">home page</span>!</a>
      </span>
    </div>
  <?php } else if (isset($_GET['Duplicate'])) { ?>
    <div class="main">
      <span>
        <h1>Domanda duplicata.</h1>
        <p>Ci risulta cha la tua domanda è già stata chiesta in <a href="questions.php?id=<?php echo $_GET['Duplicate']; ?>">questa pagina</a></p>
        <a href="/">Torna alla <span lang="en">home page</span>!</a>
        <a href="help.php">Segnala un problema.</a>
      </span>
    </div>
  <?php } else { ?>
    <form class="main" method="post" action="questionEditor.php">
      <label for="Title">TITOLO DELLA DOMANDA</label>
      <input id="Title" type="text" name="QuestionTitle" required>
      <label for="Body">CORPO DELLA DOMANDA</label>
      <textarea id="Body" name="QuestionBody" rows="8" cols="80" required></textarea>
      <input type="submit" value="POSTA LA DOMANDA">
      <input type="reset" value="PULISCI">
    </form>
  <?php } ?>

  <footer id="foot">
    <p>
      <span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC</a>,
      a ZeniMax Media company. I marchi appartengono ai rispettivi proprietari.
      Tutti i diritti riservati.
    </p>
    <img class="imgVadidCode" src="IMAGES/valid-xhtml10.png" alt="html valido" />
    <img class="imgVadidCode" src="IMAGES/vcss-blue.gif" alt="css valido" />
  </footer>
</body>

</html>
