<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_SIGNUP.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Registrazione | WikiDoom</title>
  <meta name="keywords" content="DOOM"/>
  <meta name="description" content="DOOM Wiki"/>
  <meta http-equiv="Content-Security-Policy" content="script-src 'self' https://fonts.googleapis.com/ https://fonts.gstatic.com/;">
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto"/>
  <script type="text/javascript" src="SCRIPTS/cookie_extractor.js"></script>
</head>
<body>
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
        <?php
        include 'SCRIPTS/header.php';
        if(isLogged()) printLoggedMenuWidget();
        else printDefaultMenuWidget();
        ?>
      </div>
    </nav>
  </header>
  <div class="main">
    <p>ISCRIZIONE</p>
    <form id="auth_widget" action="signup.php" method="POST">
      <?php
      include 'SCRIPTS/SignUpPage.php';
      PerformSignUp();
      if(isset($_GET["msg"]) && $_GET["msg"]=="accountCreated"){
        ?>
        <p id="ConfirmMessage"><span lang="en">Account</span> creato!</p>
        <p>Verificalo tramite il link che ti è stato inviato nell'indirizzo <span lang="en">email</span> inserito!</p>
        <a href="/">Torna alla home page.</a>
        <?php
      }else{
        ?>
        <p id="username_hints"><span lang="en">Username</span>: <span class="sr_only">Deve essere formato da una sola parola, può contenere uno o più numeri ma non deve contenere simboli.</span>
        </p>
        <ul aria-hidden="true">
          <li>Deve essere formato da una singola parola;</li>
          <li>Può contenere uno o più numeri;</li>
          <li>Non deve contenere simboli.</li>
        </ul>
        <label id="username_input_label" for="username_input" class="up" required>Username</label>
        <input id="username_input" type="text" name="username" <?php if(isset($_POST['username'])) echo "value=".$_POST['username'];?> required>

        <label id="email_input_label" for="email_input" class="up" required><span lang="en">Email</span></label>
        <input id="email_input" type="email" name="email" <?php if(isset($_POST['email'])) echo "value=".$_POST['email'];?> required>

        <p id="password_hints"><span lang="en">Password</span>: <span class="sr_only">Deve contenere almeno otto e massimo quindici caratteri dei quali uno deve essere un numero e uno deve essere scritto in maiuscolo</span>
        </p>
        <ul aria-hidden="true">
          <li>Deve avere almeno otto e massimo quindici caratteri;</li>
          <li>Deve contenere almeno un numero;</li>
          <li>Deve avere almeno una lettera maiuscola.</li>
        </ul>


        <label id="password_input_label" for="password_input" class="up" required><span lang="en">Password</span></label>
        <input id="password_input" type="password" name="password" required>

        <label id="password_confirm_input_label" for="password_confirm_input" class="up" required>Conferma <span lang="en">password</span></label>
        <input id="password_confirm_input" type="password" required>

        <label class="noJs" id="radio_label" for="password_visibility">
          <input id="password_visibility" type="checkbox">
          Mostra <span lang="en">password</span>.
        </label>
        <input type="submit" value="ISCRIVIMI">
        <input id="reset_button" type="reset" value="PULISCI">
        <hr>
        <p><a href="login.php">Hai già un <span lang="en">account</span>?</a></p>
      <?php } ?>
    </form>
  </div>
  <footer id="foot">
    <p>
      <span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC</a>,
      a ZeniMax Media company. I marchi appartengono ai rispettivi proprietari.
      Tutti i diritti riservati.<br>
      <br>
    </p>
    <img class="imgVadidCode" src="IMAGES/valid-xhtml10.png" alt="html valido"/>
    <img class="imgVadidCode" src="IMAGES/vcss-blue.gif" alt="css valido"/>
  </footer>
  <script type="text/javascript" src="SCRIPTS/signuppage.js"></script>
</body>
</html>
