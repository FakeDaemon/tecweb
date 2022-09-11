<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link href="CSS/STYLE_ANSWERCHANGE.css" rel="stylesheet">
    <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <meta charset="utf-8">
    <title> Home </title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="DOOM, topic, answer, change" />
    <meta name="description" content="Pagina che permette il cambio di una risposta" />
    <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
</head>

<body>
    <?php
    require 'SCRIPTS/.php/database_connection.php';
    require 'SCRIPTS/.php/utils.php';
    require 'SCRIPTS/.php/user.php';
    $user = new User($conn);
    if (isset($_POST['CookieAccepted']) && $_POST['CookieAccepted'] == 'Accetta') {
        setCookie('CookieAccepted', 'Accetta', time() + (86400 * 30));
        $_COOKIE['CookieAccepted'] = 'Accetta';
        header('location : answerChange.php');
    }
    if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
    ?>
        <form class="cookie-banner" action="answerChange.php" method="post">
            <p>
                Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
                il contenuto e analizzare il traffico di rete.
                <a href=cookie_informativa.php>Leggi di più riguardo ai <span lang="en">cookie</span></a>
            </p>
            <input type="submit" name="CookieAccepted" value="Accetta">
        </form>
    <?php
    }

    if (!$user->isLogged()) {
        header("location:login.php");
    }

    if (isset($_GET['cid']) || isset($_POST['cid'])) {
        $cid = $_GET['cid'] ? $_GET['cid'] : $_POST['cid'];
        $tid = $_GET['tid'] ? $_GET['tid'] : $_POST['tid'];
        $page = $_GET['page'] ? $_GET['page'] : $_POST['page'];
        $stmt = $conn->prepare("SELECT * FROM DoomWiki.comments WHERE id=?");
        $stmt->bind_param("i", $cid);
        $stmt->execute();
        $result = $stmt->get_result();
        $comment = $result->fetch_assoc();
        if (($comment['state']) === 'Deleted') $GLOBALS['answerDeleted'] = true;
        else $GLOBALS['answerDeleted'] = false;
        if (!$GLOBALS['answerDeleted']) {
            $stmt = $conn->prepare("SELECT title, description FROM DoomWiki.topics WHERE id=?");
            $stmt->bind_param("i", $tid);
            $stmt->execute();
            $result = $stmt->get_result();
            $topic = $result->fetch_assoc();
            if (isset($_POST['cid'])) {
                $GLOBALS['error'] = checkInput($_POST['newComment']);
                if (!$GLOBALS['error']) {
                    if (strlen($_POST['newComment']) > 0) {
                        $stmt = $conn->prepare("UPDATE DoomWiki.comments SET commentBody = ?, state = 'Modified' WHERE id = ?");
                        $stmt->bind_param("si", $_POST['newComment'], $_POST['cid']);
                        $stmt->execute();
                    } else {
                        $stmt = $conn->prepare("UPDATE DoomWiki.comments SET commentBody = ?, state = 'Deleted' WHERE id = ?");
                        $stmt->bind_param("si", $_POST['newComment'], $_POST['cid']);
                        $stmt->execute();
                    }
                    header("location:questions.php?id=" . $_POST['tid'] . ($_POST['page'] > 0 ? "page=" . $_POST['page'] : ""));
                }
            } else if ($comment['email'] !== $user->email) {
                header("location:answerChange.php", true);
            }
        }
    }
    ob_end_flush();
    ?>
    <header>
        <h1 id="logo">DOOM WIKI</h1>
    <label id="BurgherButtonLabel" for="BurgherButton">
      Menu
    </label>
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
    <?php
    if ((isset($_POST['cid']) && $GLOBALS['error']) || (isset($_GET['cid']) && $comment['email'] === $user->email)) { ?>
        <?php if ($GLOBALS['answerDeleted']) {
        ?>
            <div class="main">
                <p>RISPOSTA ELIMINATA</p>
                <div class="commentList">
                    <p>Hai eliminato questa risposta, non puoi più modificarla.
                    <p>
                    <p><a href="answerChange.php">Controlla tutte le tue risposte</a></p>
                    <p><a href="/">Torna alla home page</a></p>
                </div>
            </div>
        <?php
        } else { ?>
            <div class="main">
                <p>MODIFICA RISPOSTA</p>
                <form action="answerChange.php" method="post">
                    <?php if ($GLOBALS['error']) echo '<p class="error">Risposta inserita non valida, riprova con un\'altra versione.</p>'; ?>
                    <div class="topicPointer">
                        <p class="title"><?php echo $topic['title']; ?></p>
                        <p class="description"><?php echo $topic['description']; ?></p>
                    </div>
                    <input type="hidden" name="cid" value="<?php echo $cid; ?>">
                    <input type="hidden" name="tid" value="<?php echo $tid; ?>">
                    <input type="hidden" name="page" value="<?php echo $page; ?>">
                    <p class='mainParagraph'>La tua risposta:</p>
                    <p class='subParagraph'><?php echo $comment['commentBody']; ?></p>
                    <hr>
                    <p class="instructions">Se vuoi eliminare il commento lascia lo spazio vuoto, ricorda che dopo l'eliminazione non sarai più in grado di modficare il commento.</p>
                    <label class="up" for="newComment">Inserisci una nuova risposta:</label>
                    <textarea maxlength='300' id='newComment' name='newComment' placeholder='Scrivi la nuova versione della risposta oppure lascia vuoto se vuoi eliminare il commento.'></textarea>
                    <input type="submit" value="Conferma">
                    <input type="reset" value="Pulisci">
                </form>
            </div>
        <?php }
    } else { ?>
        <div class="main">
            <p>LE TUE RISPOSTE</p>
            <div class="commentList">
                <?php
                $stmt = $conn->prepare("SELECT t.title as topicTitle, c.writeDate as writeDate, c.id as commentId, c.commentBody as commentBody FROM DoomWiki.comments AS c JOIN DoomWiki.topics AS t ON c.topicID=t.id WHERE c.email=? AND c.state<>'Deleted'");
                $stmt->bind_param("s", $user->email);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($comment = $result->fetch_assoc()) {
                        if (strlen($comment['commentBody']) > 0) { ?>
                            <div class="comment">
                                <p class="questionTitle"><?php echo $comment['topicTitle']; ?></p>
                                <p class="answerDate"><?php echo $comment['writeDate']; ?></p>
                                <p class="answerBody"><?php echo $comment['commentBody']; ?></p>
                                <a href="answerChange.php?cid=<?php echo $comment['commentId']; ?> ">Gestisci</a>
                            </div>
                    <?php
                        }
                    }
                } else { ?>
                    <p class="HCentered">Non hai ancora risposto a nessuna domanda. Che aspetti!</p>
                <?php
                }
                if (isset($_GET['UserSettings'])) echo "<a href='account-managment.php'>Torna alle impostazioni.</a>";
                ?>
            </div>
        </div>
    <?php } ?>
    <footer id="foot">
        <p>
            <span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC</a>,
            a ZeniMax Media company. I marchi appartengono ai rispettivi proprietari.
            Tutti i diritti riservati.
        </p>
        <img class="imgVadidCode" src="IMAGES/valid-xhtml10.png" alt="html valido" />
        <img class="imgVadidCode" src="IMAGES/vcss-blue.gif" alt="css valido" />
    </footer>
</body>

</html>
