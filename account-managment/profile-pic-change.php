<!DOCTYPE html>
<html lang="it" dir="ltr">
<head>
  <link href="../CSS/STYLE_ACCOUNTMANAGMENT.css" rel="stylesheet">
  <link href="../CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Gestione Immagine Profilo | WikiDoom</title>
  <meta name="keywords" content="DOOM"/>
  <meta name="description" content="DOOM Wiki"/>
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <?php
  require '../SCRIPTS/.php/database_connection.php';
  var_dump($conn);
  include '../SCRIPTS/.php/user.php';

  $user = new User($conn);
  if(!$user->isLogged()) header("location: ../login.php");
   ?>
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
        if($user->isLogged()) echo "<p>".$user->user_name."</p>";
        else echo "<p>OSPITE</p>";
        if($user->isLogged()) echo "<a href='account-managment.php'>Impostazioni</a>";
        else {
          echo "<a href='signup.php'>Registrati</a>";
          echo "<a href='login.php'>Entra</a>";
        }
        ?>
        </div>
        <?php
        if($user->isLogged()) echo "<img src='/IMAGES/ProfilePics/ProfilePicN".$user->profile_pic.".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='/IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
        ?>
      </div>
    </nav>
  </header>
  <div class="main">
    <p>SCEGLI UN IMMAGINE</p>
    <form id="auth_widget">

      <label for="Img_1">
        <input id="Img_1" type="radio" name="profilePic" value="Cacodemon">
        <img src="../IMAGES/ProfilePics/Cacodemon.jpg" alt="Cacodemon Pic">
        CacoDemon
      </label>

      <label for="Img_2">
        <input id="Img_2" type="radio" name="profilePic" value="HellKnight">
        <img src="../IMAGES/ProfilePics/HellKnight.jpg" alt="HellKnight Pic">
        HellKnight
      </label>
      <label for="Img_3">
        <input id="Img_3" type="radio" name="profilePic" value="Cherub">
        <img src="../IMAGES/ProfilePics/Cherub.jpg" alt="Two Cherubs Monsters">
        Cherubs
      </label>
      <label for="Img_4">
        <input id="Img_4" type="radio" name="profilePic" value="Bruiser">
        <img src="../IMAGES/ProfilePics/Bruiser.jpg" alt="Bruiser Pic">
        Bruiser
      </label>
      <input type="submit" name="SubmitButton" value="Conferma">
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
</body>
</html>
