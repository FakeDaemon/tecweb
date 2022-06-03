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
  <script src="SCRIPTS/css_modifier.js"></script>
  <script type="text/javascript" src="SCRIPTS/cookie_extractor.js"></script>
</head>

<body onload="redirection()">
  <header>
    <h1 id="logo">DOOM WIKI</h1>

    <nav id="main_menu">
      <ul id="container_list">
        <li class="container_list_li" lang="en">HOME</li>
        <li id="nested_list">
          <span id="I_nested_list_span">TRAMA</span>
          <ul id="nstd_lst">
            <li class="nested_list_li"><span id="II_nested_list_span"><a href="history.html">&nbsp&nbsp&nbspCAPITOLO I</a></span></li>
            <li class="nested_list_li"><a href="history_2.html">&nbsp&nbsp&nbspCAPITOLO II</a></li>
            <li class="nested_list_li"><a href="history_3.html">&nbsp&nbsp&nbspCAPITOLO III</a></li>
            <li class="nested_list_li"><a href="history_2016.html">&nbsp&nbsp&nbspCAPITOLO IV</a></li>
            <li class="nested_list_li"><a href="history_eternals.html">&nbsp&nbsp&nbspCAPITOLO V</a></li>
          </ul>
        </li>
        <li class="container_list_li" lang="en"><a href="stats.html">STATS</a></li>
        <li class="container_list_li"><a href="trivia.html">CURIOSITÀ</a></li>
        <li class="container_list_li" lang="en"><a href="community.html">COMMUNITY</a></li>
      </ul>
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
    <img class="imgVadidCode" src="IMAGES/valid-xhtml10.png" alt="html valido"/>
    <img class="imgVadidCode" src="IMAGES/vcss-blue.gif" alt="css valido"/>
  </footer>
  <script type="text/javascript" src="../SCRIPTS/passwordchangepage.js"></script>
</body>

</html>
