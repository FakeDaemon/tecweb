<!DOCTYPE html>
<html lang="it" dir="ltr">
<head>
  <link href="../CSS/STYLE_PASSWORDCHANGE.css" rel="stylesheet">
  <link href="../CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Gestione Account | WikiDoom</title>
  <meta name="keywords" content="DOOM"/>
  <meta name="description" content="DOOM Wiki"/>
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <li class="NestedListItem"><a href="../history.php">CAPITOLO <abbr title="Primo">I</abbr></a></li>
            <li class="NestedListItem"><a href="../history_2.php">CAPITOLO <abbr title="Secondo">II</abbr></a></li>
            <li class="NestedListItem"><a href="../history_3.php">CAPITOLO <abbr title="Terzo">III</abbr></a></li>
            <li class="NestedListItem"><a href="../history_2016.php">CAPITOLO <abbr title="Quarto">IV</abbr></a></li>
            <li class="NestedListItem"><a href="../history_eternals.php">CAPITOLO <abbr title="Quinto">V</abbr></a></li>
          </ul>
        </li>
        <li class="MenuBarItem"><a href="../stats.php">STATISTICHE</a></li>
        <li class="MenuBarItem"><a href="../trivia.php">CURIOSITÀ</a></li>
      </ul>
      <div id="MenuUserWidget">
        <?php
          include '../SCRIPTS/.php/header.php';
          if(isLogged())
            printLoggedMenuWidget(1);
          else
            printDefaultMenuWidget(1);
        ?>
      </div>
    </nav>
  </header>
  <div class="main">

    <p>CAMBIO <span lang="en">PASSWORD</span></p>
    <form id="auth_widget">
      <label id="OldPasswordLabel" class="up" for="LastPassword">Vecchia <span lang="en">Password</span></label>
      <input id="LastPassword" type="password" name="OldPassword">

      <p id="password_hints">Ricorda che la nuova <span lang="en">Password</span>: <span class="sr_only">Deve contenere almeno otto caratteri dei quali uno deve essere un numero e uno deve essere scritto in maiuscolo. Ovviamente deve essere diversa dalla precedente.</span>
      </p>
          <ul aria-hidden="true">
            <li>Deve essere diversa dalla precedente;</li>
            <li>Deve avere almeno otto caratteri;</li>
            <li>Deve contenere almeno un numero;</li>
            <li>Deve avere almeno una lettera maiuscola.</li>
          </ul>

      <label id="NewPasswordLabel" class="up" for="NewPassword">Nuova <span lang="en">Password</span></label>
      <input id="NewPassword" type="password" name="NewPassword">

      <label id="PasswordConfirmLabel" class="up" for="NewPasswordConfirm">Conferma <span lang="en">Password</span></label>
      <input id="NewPasswordConfirm" type="password" name="NewPasswordConfirm">

      <label class="noJs" id="radio_label" for="password_visibility">
        <input id="password_visibility" type="checkbox">
        Mostra <span lang="en">password</span>.
      </label>

      <input type="submit" name="SubmitButton" value="Conferma">
      <input id="ResetButton" type="reset" value="Pulisci">

      <a href="../help.php">Serve aiuto?</a>
    </form>

  </div>
  <footer id="foot">
    <p>
      <span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC</a>,
      a ZeniMax Media company. I marchi appartengono ai rispettivi proprietari.
      Tutti i diritti riservati.<br>
      <br>
    </p>
    <img class="imgVadidCode" src="../IMAGES/valid-xhtml10.png" alt="html valido"/>
    <img class="imgVadidCode" src="../IMAGES/vcss-blue.gif" alt="css valido"/>
  </footer>
  <script src="../SCRIPTS/.js/passwordchangepage.js"></script>
</body>

</html>
