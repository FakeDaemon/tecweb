<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_AUTH.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Accedi | DoomWiki</title>
  <meta name="keywords" content="DOOM"/>
  <meta name="description" content="DOOM Wiki"/>
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="SCRIPTS/css_modifier.js"></script>
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
          if(isLogged())
            printLoggedMenuWidget();
          else
            printDefaultMenuWidget();
        ?>
      </div>
    </nav>
  </header>
  <div class="main">
    <p>ACCESSO</p>
    <form id="auth_widget" method="POST" action="login.php">
      <?php
      include 'SCRIPTS/AuthPage.php';
      PerformAuth();
      ?>
      <label id="username_input_label" for="username_input" class="up"><span lang="en">Username</span></label>
      <input id="username_input" type="text" name="username"  <?php if(isset($_COOKIE['username']) && $_COOKIE['username']!="")
      echo "value='".$_COOKIE['username']."'";
      else
      echo "value=''"?> required>

      <label id="password_input_label" for="password_input" class="up"><span lang="en">Password</span></label>
      <input id="password_input" type="password" name="password" required>

      <label id="radio_label" class="radio_label noJs" for="password_visibility">
        <input id="password_visibility" type="checkbox">
        Mostra <span lang="en">password</span>.
      </label>

      <label class="radio_label" for="save_username">
        <input id="save_username" type="checkbox" name="SaveUsername" <?php if(isset($_COOKIE['username']) && $_COOKIE['username']!="") echo "checked"; ?> value="True">
        Salva username.
      </label>

      <input type="submit" value="ACCEDI">
      <input id="reset_button" type="reset" value="PULISCI">

      <a id="HelpLink" href="help.php">Serve aiuto?</a>
      <p id="credentialRecovery"> <a href="credentialRecovery.php">Credenziali dimenticate?</a> </p>

      <hr>
      <p>Non fai ancora parte della <span lang="en">community</span>?</p>
      <a href="signup.php">Crea un nuovo <span lang="en">account</span></a>
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
  <script type="text/javascript" src="SCRIPTS/authpage.js"></script>
</body>

</html>
