<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_AUTH.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title> Home </title>
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
    <p>ACCESSO</p>
    <form id="auth_widget">
      <label id="username_input_label" for="username_input" class="up"><span lang="en">Username</span></label>
      <input id="username_input" type="text" name="username" required>

      <label id="password_input_label" for="password_input" class="up"><span lang="en">Password</span></label>
      <input id="password_input" type="password" name="password" required>

      <label id="radio_label" for="password_visibility">
        <input id="password_visibility" type="checkbox">
        Mostra <span lang="en">password</span>.
      </label>

      <label id="radio_label" for="save_username">
        <input id="save_username" type="checkbox" name="SaveUsername" value="True">
        Salva username.
      </label>

      <input type="submit" value="ACCEDI">
      <input id="reset_button" type="reset" value="PULISCI">

      <p id="HelpLink"> <a href="help.php">Serve aiuto?</a> </p>
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
