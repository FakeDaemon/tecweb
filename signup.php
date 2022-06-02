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
    <p>ISCRIZIONE</p>
    <form onsubmit="return validateForm();"id="auth_widget">
      <label id="username_input_label" for="username_input" class="up" required><span lang="en">Username</span></label>
      <input id="username_input" type="text" name="username" required>

      <label id="email_input_label" for="email_input" class="up" required><span lang="en">Email</span></label>
      <input id="email_input" type="email" name="username" required>

      <p id="password_hints">Password: <span class="sr_only">Deve contenere almeno otto caratteri dei quali uno deve essere un numero e uno deve essere scritto in maiuscolo</span>
      </p>
          <ul aria-hidden="true">
            <li>Deve avere almeno otto caratteri;</li>
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
