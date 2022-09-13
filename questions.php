<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link href="CSS/STYLE_TOPICPAGE.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link href="CSS/PRINT_QUESTIONS.css" rel="stylesheet" type="text/css" media="print" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <?php
  require 'SCRIPTS/.php/database_connection.php';
  if (count($_GET)==0 || count($_GET) > 1 || (count($_GET) > 0 && !(isset($_GET['id']) || isset($_GET['User']) || isset($_GET['Latest']) || isset($_GET['Comments'])))) header("location:questions.php?User");
  if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM DoomWiki.topics AS t LEFT OUTER JOIN DoomWiki.users AS u ON t.email = u.fst_mail WHERE t.id = ? ;");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $topic = $result->fetch_assoc();
    echo "<title>" . substr($topic['title'],0, 15) . "... | DoomWiki</title>";
    echo '<meta name="description" content="Un utente chiede \''. $topic['title'] . '\'. Qui le risposte della community." />';
  } else if (isset($_GET['User'])) {
    echo "<title>Le tue domande | DoomWiki</title>";
    echo '<meta name="description" content="I tuoi contributi su DoomWiki. La lista delle tue domande, con realtivo stato." />';
  } else{
    echo "<title>Ultime domande | DoomWiki</title>";
    echo '<meta name="description" content="Ultime domande della community. Vieni a vedere cosa a chiesto questo utente, scandaloso." />';
  } ?>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="keywords" content="DOOM WIKI, domande, domanda, utenti" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
</head>

<body>
  <?php
  require 'SCRIPTS/.php/questionPageScripts.php';
  include 'SCRIPTS/.php/user.php';
  $user = new User($conn);
  if (isset($_GET['User']) && !$user->isLogged()) header("location:login.php");
  if (isset($_POST['CookieAccepted']) && $_POST['CookieAccepted'] == 'Accetta') {
    setCookie('CookieAccepted', 'Accetta', time() + (86400 * 30));
    $_COOKIE['CookieAccepted'] = 'Accetta';
    header('location:questions.php');
  }
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
  ?>
    <form class="cookie-banner" action="questions.php" method="post">
      <p>
        Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
        il contenuto e analizzare il traffico di rete.
        <a href=cookie_informativa.php>Leggi di più riguardo ai <span lang="en">cookie</span></a>
      </p>
      <input type="submit" name="CookieAccepted" value="Accetta">
    </form>
  <?php
  }
  if (isset($_POST['AnswerBody']) && $user->isLogged()) {
    if ($conn->connect_error) {
      //errore di connessione
    } else {
      $stmt = $conn->prepare("INSERT INTO DoomWiki.comments(commentBody, writeDate, topicID, email) VALUES(?, ?, ?, ?)");
      $commentBody = $_POST['AnswerBody'];
      $currentDate = date("Y-m-d H:i:s");
      $stmt->bind_param("ssis", htmlentities($commentBody), $currentDate, $_GET['id'], $user->email);
      $stmt->execute();
      header("location:questions.php?id=" . $_GET['id']);
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
        <li class="MenuBarItem" lang="en"><a href="index.php">HOMEPAGE</a></li>
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
        if ($user->isLogged()) echo "<img src='IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
        ?>
      </div>
    </nav>
  </header>
  <div class="main">
    <?php
    if (isset($_GET['id'])) {
      $stmt = $conn->prepare("SELECT * FROM DoomWiki.topics AS t LEFT OUTER JOIN DoomWiki.users AS u ON t.email = u.fst_mail WHERE t.id = ? ;");
      $stmt->bind_param("i", $_GET['id']);
      $stmt->execute();
      $result = $stmt->get_result();
      $topic = $result->fetch_assoc();

      echo "<p>Testo della domanda</p>";

      echo "<div class='details'>";
      echo "<img src='IMAGES/ProfilePics/ProfilePicN" . ($topic['profile_pic'] != NULL ? $topic['profile_pic'] : 1) . ".jpg' alt=''>";
      echo "<p class='username'>" . ($topic['user_name'] != NULL ? $topic['user_name'] : "utente eliminato") . "</p>";
      echo "<p class='postDate'>Postato il " . $topic['creation_date'] . "</p>";
      echo "</div>";

      echo "<h1 class='title'>" . $topic['title'] . "</h1>";
      echo "<h2>" . $topic['description'] . "</h2>";

      echo "<p>Tutte le risposte</p>";
      echo "<div class='chat'>";

      $stmt = $conn->prepare("SELECT * FROM DoomWiki.topics AS t JOIN DoomWiki.comments AS c ON t.id = c.topicID LEFT OUTER JOIN DoomWiki.users AS u ON u.fst_mail=c.email WHERE t.id = ? ;");
      $stmt->bind_param("i", $_GET['id']);
      $stmt->execute();
      $result = $stmt->get_result();

      $commentCount = (isset($_GET['page']) ? $_GET['page'] : 0) * 10;
      $a = 0;
      if ($result->num_rows > $commentCount) {
        while ($comment = $result->fetch_assoc()) {
          if ($a >= $commentCount && $commentCount < 10 * ($_GET['page'] + 1)) {
            echo "<div class='message" . ($comment["email"] === $user->email ? " ofUser" : "") . "'>";
            echo "<div class='userDetails'>";
            echo "<img src='/IMAGES/ProfilePics/ProfilePicN" . ($comment['profile_pic'] != NULL ? $comment['profile_pic'] : 1) . ".jpg' alt='Doomguy, accedi o registrati!'>";
            echo "<p class='username'>" . ($comment['user_name'] != NULL ? $comment['user_name'] : "utente eliminato") . "</p>";
            echo "<p class='messageDatestamp'>Postato il " . $comment['writeDate'] . "</p>";
            echo "</div>";
            if ($comment['state'] === 'Deleted') {
              echo "<p class='text'><span>Il commento è stato eliminato</span></p>";
            } else {
              echo "<p class='text'>" . ($comment['state'] === 'Modified' ? "<span>ATTENZIONE: il commento è stato modificato.</span><br><br>" : "") . $comment['commentBody'] . ($comment["email"] === $user->email ? "<br><br><a href='answerChange.php?cid=" . $comment['id'] . "&tid=" . $_GET['id'] . "&page=" . ($_GET['page'] !== NULL ? $_GET['page'] : "0") . "'>Gestisci risposta</a>" : "") . "</p>";
            }
            echo "</div>";
            $commentCount++;
          }
        }
      } else {
        echo "<div class='message'>";
        echo "<div class='userDetails'>";
        echo "<img src='/IMAGES/ProfilePics/ProfilePicN" . ($comment['profile_pic'] != NULL ? $comment['profile_pic'] : 1) . ".jpg' alt='DoomWiki Avatar.'>";
        echo "<p class='username'>DoomWiki</p>";
        echo "</div>";
        echo "<p class='text'>Nessuno ha ancora risposto alla domanda.</p>";
        echo "</div>";
      }
      echo "</div>";

      if ($commentCount !== 0 && ($result->num_rows > 10 * ($_GET['page'] + 1))) {
        echo "<a class='";
        if ($_GET['page'] == 0) echo "CurrentPage";
        else echo '';
        echo "' id='FirstPage' href='questions.php?id=" . $QuestionID . "'>Prima Pagina</a>";
        echo "<a class='";
        if ($_GET['page'] == 0) echo "CurrentPage";
        else echo '';
        echo "' href='questions.php?id=" . $QuestionID . "&page=";
        if ($_GET['page'] == 0) echo $_GET['page'];
        else echo $_GET['page'] - 1;
        echo "'>Pagina Precedente</a>";
        echo "<a href='questions.php?id=" . $QuestionID . "&page=";
        echo $_GET['page'] + 1;
        echo "'>Pagina Successiva</a>";
        echo "<a id='LastPage' href='questions.php?id=" . $QuestionID . "'>Ultima Pagina</a>";
      }
      if (isset($GLOBALS['logState']) && $GLOBALS['logState']) {
        echo '<a id="AnswerPagelink" href="questionEditor.php">Fai una domanda alla community!</a>';
      } else {
        echo '<a id="AnswerPagelink" href="questionEditor.php">Fai una domanda alla community!</a>';
      }
      echo '<br><a id="HelpPagelink" href="help.php?topicID=' . $_GET['id'] . '">Qualcosa di strano? Fai una seganalazione!</a>';
    ?>

      <?php if ($user->isLogged()) { ?>
        <form action="questions.php?id=<?php echo $_GET['id']; ?>" method="post">
          <label for="AnswerBox">
            La tua risposta:
          </label>
          <textarea required maxlength="30000" id="AnswerBox" name="AnswerBody" rows="8" cols="80"></textarea>
          <input type="submit" value="INVIA">
          <input type="reset" value="PULISCI">
        </form>
      <?php } else { ?>
        <form class="blocked" action="questions.php?id=<?php echo $_GET['id']; ?>" method="post">
          <label for="AnswerBox">
            La tua risposta:
          </label>
          <a href="login.php">Per rispondere effettua l'accesso al sito!</a>
          <input disabled type="submit" value="INVIA">
          <input disabled type="reset" value="PULISCI">
        </form>
      <?php }
    } else if (isset($_GET['User'])) {
      if ($user->isLogged())
        $stmt = $conn->prepare('SELECT * FROM DoomWiki.topics WHERE email = ? ORDER BY creation_date DESC');
      $stmt->bind_param("s", $user->email);
      $stmt->execute();
      $result = $stmt->get_result();
      ?>
      <div class="TList">
        <p>DOMANDE POSTE</p>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            if ($row['state'] == 'Pending') {
              echo "<div class='TListItem'>";
              echo "<p class='title'>" . $row['title'] . "</p>";
              echo "<p class='description'>" . $row['description'] . "</p>";
              echo "<p class='state'>In fase di revisione.</p>";
              echo "</div>";
            } else if ($row['state'] == 'Approved') {
              echo "<div class='TListItem'>";
              echo "<p class='title'>" . $row['title'] . "</p>";
              echo "<p class='description'>" . $row['description'] . "</p>";
              echo "<p class='date'>" . $row['modified_date'] . "</p>";
              echo "<p class='state'>Approvata!</p>";
              echo "<p><a href='questions.php?id=" . $row['id'] . "'>Vai alla domanda</a></p>";
              echo "</div>";
            } else { //state = rejected;
              echo "<div class='TListItem'>";
              echo "<p class='title'>" . $row['title'] . "</p>";
              echo "<p class='description'>" . $row['description'] . "</p>";
              echo "<p class='date'>" . $row['modified_date'] . "</p>";
              echo "<p class='state'>Non approvata. Motivo:</p>";
              echo "<p class='state'>\"" . $row['rejectReason'] . "\"</p>";
              echo "<p><a href='questionEditor.php'>Riformula la domanda</a></p>";
              echo "</div>";
            }
          }
        } else {
        ?>
          <p>Non hai inviato domande per il momento.</p>
          <a href="questionEditor.php">Chiedi alla <span lang="en">community</span>!</a>
        <?php
        }
        ?>
        <a href="account-managment.php">Vai alle impostazioni.</a>
      </div>
    <?php
    } else if (isset($_GET['Latest']) && $_GET['Latest'] === "") {
      $stmt = $conn->prepare("SELECT * FROM DoomWiki.topics LEFT OUTER JOIN DoomWiki.users ON email = fst_mail WHERE state='Approved' ORDER BY creation_date;");
      $stmt->execute();
      $result = $stmt->get_result();
    ?>
      <p>Ulitime domande degli utenti</p>
      <div class="TPList">
        <?php
        if ($result->num_rows === 0) {
        ?>
          <p>Nessuna domanda ancora registrata.</p>
        <?php
        } else {
          while ($row = $result->fetch_assoc()) {
            echo '<a href="questions.php?id=' . $row['id'] . '"><p class="title">' . $row['title'] . '</p><p class="details">Aperto da ' . ($row['user_name'] != NULL ? $row['user_name'] : "utente eliminato") . ' in data ' . $row['creation_date'] . '</p></a>';
          }
        }
      } else if (isset($_GET['Comments']) && $_GET['Comments'] === "") {
        $stmt = $conn->prepare("SELECT t.id, u.user_name, t.title, t.creation_date,COUNT(c.id) AS CommentsCount FROM DoomWiki.topics AS t LEFT OUTER JOIN DoomWiki.users AS u ON t.email = u.fst_mail LEFT OUTER JOIN DoomWiki.comments AS c ON c.topicID=t.id WHERE t.state='Approved' GROUP BY t.id ORDER BY CommentsCount DESC;");
        $stmt->execute();
        $result = $stmt->get_result();
        ?>
        <p>Ulitime domande degli utenti</p>
        <div class="TPList">
          <?php
          if ($result->num_rows === 0) {
          ?>
            <p>Nessuna domanda ancora registrata.</p>
        <?php
          } else {
            while ($row = $result->fetch_assoc()) {
              echo '<a href="questions.php?id=' . $row['id'] . '"><p class="title">' . $row['title'] . '</p><p class="details">Aperto da ' . ($row['user_name'] != NULL ? $row['user_name'] : "utente eliminato") . ' in data ' . $row['creation_date'] . '</p><p>Numero risposte : ' . $row['CommentsCount'] . '</p></a>';
            }
          }
        }
        ?>
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
</body>

</html>
