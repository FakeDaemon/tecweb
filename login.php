<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_AUTH.css" rel="stylesheet">
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title>Accedi | DoomWiki</title>
  <meta name="keywords" content="DOOM" />
  <meta name="description" content="DOOM Wiki" />
  <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
</head>

<body>
  <?php
  require 'SCRIPTS/.php/database_connection.php';
  include 'SCRIPTS/.php/user.php';
  $user = new User($conn);
  if (isset($_POST['CookieAccepted']) && $_POST['CookieAccepted'] == 'Accetta') {
    setCookie('CookieAccepted', 'Accetta', time() + (86400 * 30));
    $_COOKIE['CookieAccepted'] = 'Accetta';
    header('location : login.php');
  }
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
  ?>
    <form class="cookie-banner" action="login.php" method="post">
      <p>
        Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
        il contenuto e analizzare il traffico di rete.</br>
        <a href=cookie_informativa.php>Leggi di più riguardo ai <span lang="en">cookie</span></a></br>
      </p>
      <input type="submit" name="CookieAccepted" value="Accetta">
    </form>
  <?php
  }
  if ($user->isLogged()) header("location: account-managment.php");
  if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['email'])) {
    if (!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $_POST['email'])) {
      $ret = "emailWrongFormat";
    } else {
      if (isset($_POST['SaveEmail']) && $_POST['SaveEmail'] === "True") {
        setcookie("email", $_POST['email'], time() + 60 * 60 * 24 * 365);
        $_COOKIE["email"] = $_POST['email'];
      } else {
        setcookie("email", "", time() - 3600);
        $_COOKIE["email"] = "";
      }
      $ret = "userFound";
      $stmt = $conn->prepare("SELECT psw FROM DoomWiki.users WHERE fst_mail = ?");
      $stmt->bind_param("s", $_POST['email']);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($conn->connect_error) {
        $ret = "errorState";
      } else if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($_POST['password'], $row['psw'])) {
          $SessID = bin2hex(random_bytes(64));
          $stmt = $conn->prepare("UPDATE DoomWiki.users SET SessID = ? WHERE fst_mail= ?;");
          $stmt->bind_param("ss", $SessID, $_POST['email']);
          $stmt->execute();
          $result = $stmt->get_result();

          setcookie("SessionID", $SessID, time() + 60 * 60 * 2);
          $_COOKIE["SessionID"] = $SessID;

          $conn->close();
          header("location: /");
        } else {
          $ret = "wrongPassword";
        }
      } else {
        $stmt = $conn->prepare("SELECT * FROM DoomWiki.blackList WHERE fst_mail = ?");
        $stmt->bind_param("s", $_POST['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          $ret = "YouHaveBeenBanned";
        } else {
          $ret = "noUserFound";
        }
      }
    }
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
        if ($user->isLogged()) echo "<img src='/IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
        else echo "<img src='/IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
        ?>
      </div>
    </nav>
  </header>
  <div class="main">
    <p>ACCESSO</p>
    <form id="auth_widget" method="POST" action="login.php" novalidate>
      <?php
      switch ($ret) {
        case 'noUserFound':
        case 'wrongPassword':
          echo "<div class='ErrorBox'>";
          echo "<p class='ErrorMessage'><span lang='en'>Credenziali non corrette.</p>";
          echo "</div>";
          break;
        case 'errorState':
          echo "<div class='ErrorBox'>";
          echo "<p class='ErrorMessage'>Errore nel sistema durante l'accesso.</p>";
          echo "</div>";
          break;
        case 'YouHaveBeenBanned':
          $stmt = $conn->prepare("SELECT * FROM DoomWiki.blackList WHERE fst_mail = ?");
          $stmt->bind_param("s", $_POST['email']);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();
          echo "<div class='ErrorBox'>";
          echo "<p class='ErrorMessage'>Sei stato bannato dal sito nel giorno<br><small>" . $row['ban_date'] . "</small>.</p>";
          echo "<p class='ErrorMessage'>Motivo:<br><small>" . $row['ban_reason'] . "</small>.</p>";
          echo "</div>";
          break;
        case 'emailWrongFormat':
          echo "<div class='ErrorBox'>";
          echo "<p class='ErrorMessage'>Formato <span lang='en'>email</span> non valido.</p>";
          echo "</div>";
          break;
        default:
          break;
      }
      ?>
      <label id="email_input_label" for="email_input" class="up"><span lang="en">Email</span></label>
      <input id="email_input" type="text" name="email" <?php if (isset($_COOKIE['email']) && $_COOKIE['email'] != "")
                                                          echo "value='" . $_COOKIE['email'] . "'";
                                                        else
                                                          echo "value=''" ?> required>

      <label id="password_input_label" for="password_input" class="up"><span lang="en">Password</span></label>
      <input id="password_input" type="password" name="password">

      <label id="radio_label" class="radio_label noJs" for="password_visibility">
        <input id="password_visibility" type="checkbox">
        Mostra <span lang="en">password</span>.
      </label>

      <label class="radio_label" for="save_username">
        <input id="save_email" type="checkbox" name="SaveEmail" <?php if (isset($_COOKIE['email']) && $_COOKIE['email'] != "") echo "checked"; ?> value="True">
        Salva email.
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
    <img class="imgVadidCode" src="IMAGES/valid-xhtml10.png" alt="html valido" />
    <img class="imgVadidCode" src="IMAGES/vcss-blue.gif" alt="css valido" />
  </footer>
  <script type="text/javascript" src="SCRIPTS/.js/authpage.js"></script>
  <?php $conn->close(); ?>
</body>

</html>