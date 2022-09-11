<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="../CSS/STYLE_PROFILEPICCHANGE.css" rel="stylesheet">
  <link href="../CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Gestione Immagine Profilo | WikiDoom</title>
  <meta name="keywords" content="DOOM" />
  <meta name="description" content="DOOM Wiki" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <?php
  $level = 1;
  require '../SCRIPTS/.php/database_connection.php';
  include '../SCRIPTS/.php/user.php';
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {header("location: ../cookie_informativa.php");}
  $user = new User($conn);
  if (!$user->isLogged()) header("location: ../login.php");
  if (isset($_GET['act']) && $_GET['act'] == "rmv") {
    $stmt = $conn->prepare("UPDATE DoomWiki.users SET profile_pic = ? WHERE SessID = ?");
    $profile_pic = 1;
    $stmt->bind_param("is", $profile_pic, $_COOKIE['SessionID']);
    $stmt->execute();
    header("location: ../account-managment.php?msg=Success");
  }
  if (isset($_POST['profilePic'])) {
    $stmt = $conn->prepare("UPDATE DoomWiki.users SET profile_pic = ? WHERE SessID = ?");
    $stmt->bind_param("is", $_POST['profilePic'], $_COOKIE['SessionID']);
    $stmt->execute();
    header("location: ../account-managment.php?msg=Success");
  }
  ?>
  <header>
  <h1 id="logo">DOOM WIKI</h1>
    <label id="BurgherButtonLabel" for="BurgherButton">
      Menu
    </label>
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
        <div>
          <?php
          if ($user->isLogged()) echo "<p>" . $user->user_name . "</p>";
          else echo "<p>OSPITE</p>";
          if ($user->isLogged()) {
            if ($user->isSuperUser()) echo "<a href='../siteManager.php'>Gestione Sito</a>";
            echo "<a href='../account-managment.php'>Impostazioni</a>";
          } else {
            echo "<a href='../signup.php'>Registrati</a>";
            echo "<a href='../login.php'>Entra</a>";
          }
          ?>
        </div>
        <?php
        if ($user->isLogged()) echo "<img src='../IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='../IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
        ?>
      </div>
    </nav>
  </header>
  <div class="main">
    <p>SCEGLI UN IMMAGINE</p>
    <form id="auth_widget" action="profile-pic-change.php" method="POST">

      <label for="Img_1">
        <input id="Img_1" type="radio" name="profilePic" value="1" <?php if ($user->profile_pic == 1) echo "checked"; ?>>
        <img src="../IMAGES/ProfilePics/ProfilePicN1.jpg" alt="Doomguy">
        Doomguy
      </label>

      <label for="Img_2">
        <input id="Img_2" type="radio" name="profilePic" value="2" <?php if ($user->profile_pic == 2) echo "checked"; ?>>
        <img src="../IMAGES/ProfilePics/ProfilePicN2.jpg" alt="Hellknight">
        Hellknight
      </label>

      <label for="Img_3">
        <input id="Img_3" type="radio" name="profilePic" value="3" <?php if ($user->profile_pic == 3) echo "checked"; ?>>
        <img src="../IMAGES/ProfilePics/ProfilePicN3.jpg" alt="Two Cherubs Monsters">
        Two Cherubs Monsters
      </label>
      <label for="Img_4">
        <input id="Img_4" type="radio" name="profilePic" value="4" <?php if ($user->profile_pic == 4) echo "checked"; ?>>
        <img src="../IMAGES/ProfilePics/ProfilePicN4.jpg" alt="Cacodemon">
        Cacodemon
      </label>
      <label for="Img_5">
        <input id="Img_5" type="radio" name="profilePic" value="5" <?php if ($user->profile_pic == 5) echo "checked"; ?>>
        <img src="../IMAGES/ProfilePics/ProfilePicN5.jpg" alt="Bruiser Pic">
        Bruiser
      </label>
      <label for="Img_6">
        <input id="Img_6" type="radio" name="profilePic" value="6" <?php if ($user->profile_pic == 5) echo "checked"; ?>>
        <img src="../IMAGES/ProfilePics/ProfilePicN6.jpg" alt="Spider Mastermind">
        Spider Mastermind
      </label>
      <input type="submit" name="SubmitButton" value="Conferma">
    </form>
  </div>
  <footer id="foot">
    <p>
      <span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC</a>,
      a ZeniMax Media company. I marchi appartengono ai rispettivi proprietari.
      Tutti i diritti riservati.
    </p>
    <img class="imgVadidCode" src="../IMAGES/valid-xhtml10.png" alt="html valido" />
    <img class="imgVadidCode" src="../IMAGES/vcss-blue.gif" alt="css valido" />
  </footer>
</body>

</html>
