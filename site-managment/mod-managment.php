<!DOCTYPE html>
<html lang="it" dir="ltr">
<head>
  <link href="../CSS/STYLE_SITEMANAGMENT.css" rel="stylesheet">
  <link href="../CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Gestione Sito | DoomWiki</title>
  <meta name="keywords" content="DOOM"/>
  <meta name="description" content="DOOM Wiki"/>
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <?php
  $level=1;
  require '../SCRIPTS/.php/database_connection.php';
  include '../SCRIPTS/.php/user.php';

  $user = new User($conn);
  if(!$user->isLogged() || !$user->isAdmin()) header("location: ../login.php");

  $result=$conn->query("SELECT fst_mail, user_name, profile_pic FROM DoomWiki.users WHERE ROLE = 'mod'");
  $modsList = array();
  while($row = $result->fetch_assoc()){
    $mod = user::createMod($row['fst_mail'], $row['user_name'], $row['profile_pic']);
    array_push($modsList, $mod);
  }
  $GLOBALS["ModNameFound"]=false;
  if(isset($_POST['action'])){
    foreach ($modsList as $mod) {
      if($mod->email === $_POST['ModName']){
        $GLOBALS["ModNameFound"]=true;
        break;
      }
    }
    if($GLOBALS["ModNameFound"]){
      if($_POST['action']=="Ban"){
        $stmt = $conn->prepare("DELETE FROM DoomWiki.users WHERE fst_mail = ?; INSERT INTO DoomWiki.blackList(fst_mail, ban_date) VALUES(?, ?)");
        $currentDate = date("Y-m-d H:i:s");
        $stmt->bind_param("ssis", htmlentities($commentBody), $currentDate, $_GET['id'], $user->email);
        $stmt->execute();
      }
    }
  }
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
        <div>
          <?php
          if($user->isLogged()) echo "<p>".$user->user_name."</p>";
          else echo "<p>OSPITE</p>";
          if($user->isLogged()) echo "<a href='../account-managment.php'>Impostazioni</a>";
          else {
            echo "<a href='../signup.php'>Registrati</a>";
            echo "<a href='../login.php'>Entra</a>";
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
    <p>GESTIONE MODDERS</p>
    <form id="auth_widget" action="mod-managment.php" method="post">
      <label class="up" for="searchBar">Cerca Mod</label>
      <input list="browsers" id="searchBar" type="text" name="ModName" required>
      <textarea maxlength="300" id="text_input" name="message" placeholder="Motivo del ban o della destituzione dal ruolo di mod." required></textarea>
      <input type="submit" name="action" value="Ban">
      <input type="submit" name="action" value="Togli privilegi">
      <datalist id="browsers">
        <?php
        foreach ($modsList as $mod) {
          echo '<option value="'.$mod->email.'"></option>';
        }
        ?>
      </datalist>
      <p><span lang="en">Mods</span> attuali</p>
      <p class="small">(nome utente - email)</p>
      <ul>
        <?php
        foreach ($modsList as $mod) {
          echo '<li><img src="/IMAGES/ProfilePics/ProfilePicN'.($mod->profile_pic).'.jpg" alt=""><span><span class="user_name">'.($mod->user_name).'</span><span class="email">'.($mod->email).'</span></span></li>';
        }
        ?>
      </ul>
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
  <script type="text/javascript" src="SCRIPTS/.js/authpage.js"></script>
  <?php $conn->close(); ?>
</body>

</html>
