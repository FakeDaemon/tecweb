<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link href="CSS/STYLE_ANSWERCHANGE.css" rel="stylesheet">
    <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <meta charset="utf-8">
    <title> Home </title>
    <meta name="keywords" content="DOOM" />
    <meta name="description" content="DOOM Wiki" />
    <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
</head>

<body>
    <?php
    require 'SCRIPTS/.php/database_connection.php';
    require 'SCRIPTS/.php/questionPageScripts.php';
    include 'SCRIPTS/.php/user.php';
    $user = new User($conn);
    if (isset($_GET['cid'])) {
        $stmt = $conn->prepare("SELECT * FROM DoomWiki.comments WHERE id=?");
        $stmt->bind_param("i", $_GET['cid']);
        $stmt->execute();
        $result = $stmt->get_result();
        $comment = $result->fetch_assoc();
        if ($comment['email'] !== $user->email) {
            //header("location:answerChange.php", true);
        }
    }
    ob_end_flush();
    ?>
    <header>
        <h1 id="logo">DOOM WIKI</h1>
        <nav id="NavBar">
            <ul id="MenuBar">
                <li class="MenuBarItem" lang="en"><a href="/">HOMEPAGE</a></li>
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
                <li class="MenuBarItem"><a href="trivia.php">CURIOSITÀ</a></li>
            </ul>
            <div id="MenuUserWidget">
                <div>
                    <?php
                    if ($user->isLogged()) echo "<p>" . $user->user_name . "</p>";
                    else echo "<p>OSPITE</p>";
                    if ($user->isLogged()) echo "<a href='account-managment.php'>Impostazioni</a>";
                    else {
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
    <?php
    if (isset($_GET['cid']) && $comment['email'] === $user->email) { ?>
        <div class="main">
            <p>MODIFICA COMMENTO</p>
            <form action="answerChange.php" method="post">
                <p class='mainParagraph'>Versione Attuale:</p>
                <p class='subParagraph'><?php echo $comment['commentBody']; ?></p>
                <label class="up" for="newComment">Nuova risposta</label>
                <textarea maxlength='300' id='newComment' name='newComment' placeholder='Scrivi la nuova versione della risposta.'></textarea>
                <input type="submit" value="Conferma">
                <input type="reset" value="Pulisci">
            </form>
        </div>
    <?php } else { ?>
        <div class="main">
            <p>LE TUE RISPOSTE</p>
            <div class="commentList">
                <?php
                $stmt = $conn->prepare("SELECT t.title as topicTitle, c.writeDate as writeDate, c.id as commentId, c.commentBody as commentBody FROM DoomWiki.comments AS c JOIN DoomWiki.topics AS t ON c.topicID=t.id WHERE c.email=?");
                $stmt->bind_param("s", $user->email);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($comment = $result->fetch_assoc()) {
                ?>
                    <div class="comment">
                        <p class="questionTitle"><?php echo $comment['topicTitle']; ?></p>
                        <p class="answerDate"><?php echo $comment['writeDate']; ?></p>
                        <p class="answerBody"><?php echo $comment['commentBody']; ?></p>
                        <a href="answerChange.php?cid=<?php echo $comment['commentId']; ?> ">Gestisci</a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php } ?>
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
</body>

</html>