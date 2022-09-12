<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
    <link href="CSS/STYLE_HISTORY.css" rel="stylesheet">
    <link href="CSS/PRINT_TRIVIA.css" rel="stylesheet" type="text/css" media="print" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <meta charset="utf-8">
    <title> <span lang="en">Fun Fact</span> | <span lang="en">DoomWiki</span></title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="DOOM, curiosità, trivia" />
    <meta name="description" content="Pagina riguardante le curiosità generali" />
    <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano, Angeloni Alberto" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    require 'SCRIPTS/.php/database_connection.php';
    include 'SCRIPTS/.php/user.php';
    $user = new User($conn);
    if (isset($_POST['CookieAccepted']) && $_POST['CookieAccepted'] == 'Accetta') {
        setCookie('CookieAccepted','Accetta',time() + (86400 * 30));
        $_COOKIE['CookieAccepted'] = 'Accetta';
        header('location:trivia.php');
    }
    if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
    ?>
        <form class="cookie-banner" action="trivia.php" method="post">
            <p>
                Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
                il contenuto e analizzare il traffico di rete.
                <a href=cookie_informativa.php>Leggi di più riguardo ai <span lang="en">cookie</span></a>
            </p>
            <input type="submit" name="CookieAccepted" value="Accetta">
        </form>
    <?php
    }
    ?>
    <header>
    <h1 id="logo">DOOM WIKI</h1>
    <label id="BurgherButtonLabel" for="BurgherButton">
      Menu
    </label>
    <input type="checkbox" id="BurgherButton" aria-hidden="true" aria-label="Apri il menu">
        <nav id="NavBar">
            <ul id="MenuBar">
                <li class="MenuBarItem" lang="en"><a href="index.php" lang="en">HOMEPAGE</a></li>
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
                <li class="MenuBarItem CurrentLocation">CURIOSITÀ</li>
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
                if ($user->isLogged()) echo "<img src='IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
                else echo "<img src='IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
                ?>
            </div>
        </nav>
    </header>

    <div class="main trivia_title">
        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <section>
            <p>
                Sapevi che secondo le stime <span lang="en">DOOM</span> è il <span lang="en">software</span> più installato del 1995?
                A quanto pare il gioco era installato su più <span lang="en">pc</span> di <span lang="en">Windows</span> 95.
                La popolarità del gioco spinse il fondatore di <span lang="en">Microsft</span> Bill Gates a considerare l'idea
                di acquistare il <span lang="en">software</span>, poi però decisero di creare un <span lang="en">port</span>
                del gioco per <span lang="en">Windows</span> in modo da promuovere il sitema operativo come una piattaforma
                di gioco. Il 13 ottobre 1995 la <span lang="en">Microsoft</span> presento un video promozionale di
                <span lang="en">Windows</span> 95 con Bill Gates sovrapposto al gioco.
            </p>
            <section class="trivia_img">
              <img src="IMAGES/Win95promo.jpg" alt="Bill Gates nella promo di Windows 95" />
            </section>
          </section>
        </article>

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <section>
            <p>
                Inizialmente <span lang="en">Id Software</span> voleva creare un gioco basato sul film "<span lang="en">Alien</span>",
                la <span lang="en">software house</span> cominciò anche a contrattare con la <span lang="en">Twenty Century Fox</span>
                per le licenze, ma l'idea fu abbandonata per lasciare più spazio alla creatività degli sviluppatori. Il
                <span lang="en">concept</span> finale di <span lang="en">DOOM</span> trae ispirazione da <span lang="en">Alien</span>
                ma anche da altri famosi prodotti Holliwoodiani; la motosega e il fucile a pompa sono citazioni alla saga di
                "<span lang="en">Evil Dead</span>" da noi conosciuta come "La Casa". Il nome <span lang="en">DOOM</span> viene da una
                battuta del film "Il Colore Dei Soldi" dove Tom Cruise si presenta ad una partita di biliardo con una stecca personalizzata
                in una custodia, quando gli viene chiesto cosa ci sia dentro lui risponde -"<span lang="en">Doom</span>".
            </p>
            <section class="trivia_img">
              <img src="IMAGES/Alien.jpg" alt="Poster del film Alien" />
              <img src="IMAGES/EvilDead.jpg" alt="Poster del film Evil Dead" />
            </section>
            </section>
        </article>

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <section>
            <p>
                L'idea di usare i demoni come nemici venne ad alcuni sviluppatori dopo aver giocato una campagna di
                <span lang="en">Dundeons and Dragons</span> dove alla fine si apre un portale che permise un'invasione demoniaca.
                Il <span lang="en">cacodemon</span> di <span lang="en">DOOM</span> è ispirato al classico mostro di <span lang="en">Dungeons and Dragons "Beholder"</span>,
                il suo <span lang="en">design</span> trae ispirazione da un altro mostro di <span lang="en">D&D</span>, il terrore astrale
            </p>
            <section class="trivia_img">
              <img src="IMAGES/cacodemon.jpg" alt="classico nemico di DOOM" />
              <img src="IMAGES/Beholder.png" alt="Beholder da Dungeons & Dragons" />
              <img src="IMAGES/Astral_dreadnought.png" alt="Terrore Astrale da Dungeons & Dragons" />
            </section>
          </section>
        </article>

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <section>
            <p>
                Il direttore creativo Tom Hall aveva originariamente creato una trama molto elaborata per il gioco, e scrisse un
                documento chiamato <span lang="en">DOOM Bible</span> contenente il <span lang="en">design</span> del gioco.
            </p>
            <p>
                La trama originale avrebbe dovuto aver luogo su un pianeta alieno chiamato Tei Tenga che sarebbe stato invaso da
                creature provenienti dall'inferno, ci sarebbero inoltre dovuti essere 5 personaggi giocabili caratterizzati da abilità
                peculiari. La storia comprendeva originariamente l'andare e tornare dall'inferno con la possibile distruzione del pianeta,
                infine il protagonista sarebbe stato ritenuto responsabile dell'accaduto su Tei Tenga e mandato in prigione.
              </p>
              <p>
                John Carmack (co-fondatore di<span lang="en">Id Software</span>) non approvo una storia così dettagliata e la
                <span lang="en">DOOM Bible</span> venne per lo più ignorata nella versione finale. Carmack spiegò la sua posizione riguardo
                la narrazzione nei videogiochi nel 2003 dicendo: "la storia nei videogiochi e come la storia dei film porno. Ci si aspetta
                che ci sia, ma non è così importante".
              </p>
              <p>
                Alcuni elementi del documento vennero mantenutinella versione finale del gioco, come il laboratorio militare sul pianeta alieno,
                l'andare e tornare dall'inferno e le versioni modificate di alcune armi e alcuni mostri presentati in origine nella <span lang="en">DOOM Bible</span>.
                Alla fine Tom Hall portò con sè alcuni elementi della <span lang="en">DOOM Bible</span> dop aver lasciato <span lang="en">Id Software</span>
                per lavorare con la <span lang="en">software house "3D Realms"</span>. Lo sparatutto in prima persona "<span lang="en">Rise of the Triad</span>"
                presenta i personaggi originariamente descritti nella <span lang="en">DOOM Bible</span> e nel simulatore di volo "<span lang="en">Terminal Velocity</span>"
                si può trovare un pianeta chiamato Tei Tenga.
            </p>
            <section class="trivia_img">
              <img src="IMAGES/DOOMBible.jpg" alt="Copertina della DOOM Bible" />
              <img src="IMAGES/RiseoftheTriad.jpg" alt="Copertina di Rise of the Triad" />
              <img src="IMAGES/TerminalVelocity.jpg" alt="Copertina di Terminal Velocity" />
            </section>
          </section>
        </article>

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <section>
            <p>
                La saga di <span lang="en">DOOM</span> contiente tantissimi segreti e <span lang="en">easter eggs</span>, nelle prime versioni della mappa "<span lang="en">
                    command control</span>" il giocatore poteva trovare una stanza con un enorme svastica nazista sul pavimento e sul soffitto, questa doveva essere una
                citazione a il gioco "<span lang="en">Wolfenstein 3D</span>", ma fu rimosso per via di alcune controversie. <span lang="en">Wolfenstein</span> venne
                citato di nuovo in <span lang="en">DOOM</span> II con una mappa segreta accessibile dal livello 15 basata sui livelli 1 e 9 di
                "<span lang="en">Escape from Wolfenstein</span>" che presenta come nemici i soldati nazisti del gioco, ma presenta anche un riferimento ad un altro gioco
                di <span lang="en">Id Software: "Commander Keen"</span>
            </p>
            <section class="trivia_img">
              <img src="IMAGES/Wolfenstein-New-Order-3D-Easter-Egg.jpg" alt="Livello ispirato a Wolfenstein 3d" />
              <img src="IMAGES/Map32_commander_keen.png" alt="Citazione al gioco Commander Keen" />
            </section>
          </section>
        </article>

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <section>
            <p>
                Il nome dei livelli e alcune musiche di <span lang="en">DOOM</span> hanno origini interessanti, il primo episodio del primo
                <span lang="en">DOOM, "Knee-Deep in the Dead"</span> fu uno dei pochi titoli della <span lang="en">DOOM Bible</span> che finirono nel gioco, mentre il
                quarto e ultimo episodio di <span lang="en">Ultimate DOOM</span> chiamato <span lang="en">Thy Flesh Consumed</span> prendo il nome da un passaggio della
                Bibbia di re Giacomo, proverbi 5:11, che cita "<span lang="en">and thou mourn at the last, when thy flesh and thy body are consumed</span>".
            </p>
            <p>
                Molti livelli di <span lang="en">Thy Flesh Consumed</span> prendono il nome da passi della Bibbia, e il ventunesimo livello di <span lang="en">DOOM</span>
                <abbr>II</abbr> si chiama Nirvana e vi si può trovare un fucile a pompa. Questo è probabilmente un riferimento alla <span lang="en">band</span>
                "Nirvana" il cui cantante Curt Cobain si suicidò con un fucile lo stesso anno del lancio di <span lang="en">DOOM</span><abbr>II</abbr>. Un altro
                riferimento a <span lang="en">band</span> all'interno del gioco si può trovare nel primo livello di <span lang="en">Thy Flesh Consumed, Hell Beneath</span>
                contiene una stanza segreta con il logo dei "<span lang="en">Nine Inch Nails</span>"
            </p>
            <section class="trivia_img">
              <img src="IMAGES/NIN_reference.jpg" alt="Stanza con il logo dei Nine Inch Nails" />
              <img src="IMAGES/ThyFleshConsumed.png" alt="Elenco dei livelli di 'Thy Flesh Consumed'" />
            </section>
          </section>
        </article>

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <section>
            <p>
                La colonna sonora di <span lang="en">DOOM</span><abbr>II</abbr> contiene molte tracce influenzate da <span lang="en">band rock</span> ed
                <span lang="en">heavy metal</span>. La traccia "<span lang="en">Bye Bye American Pie</span>" contiene un <span lang="en">sample</span> della canzone
                "<span lang="en">Them Bones</span>" degli <span lang="en">Alice in Chains</span>, oppure la traccia "<span lang="en">Shawn's got the Shotgun</span>"
                contiene un giro di batteria di "<span lang="en">South of Heaven</span>" degli <span lang="en">Slayer</span>. La traccia
                "<span lang="en">Into Sandy's City</span>" presenta una versione più lenta della melodia di apertura di "<span lang="en">Sex Type Thing</span>" degli
                "<span lang="en">Stone Temple Pilots</span>". La traccia "<span lang="en">The Demon's Dead</span>" usa la melodia di apertura di
                "<span lang="en">After All(The Dead)</span>" dei <span lang="en">Black Sabbath</span>
            </p>
            <section class="trivia_img">
              <img src="IMAGES/SouthOfHeaven.jpg" alt="Copertina dell'album South of Heaven degli Slayers" />
              <img src="IMAGES/Thembones.jpeg" alt="Copertina del singolo Them Bones degli Alice in Chains " />
              <img src="IMAGES/dehumanizer.jpg" alt="Copertina di Dehumanizer, album dei Black Sabbath contenente il singolo After All" />
            </section>
          </section>
        </article>

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <section>
            <p>
                Durante lo sviluppo di <span lang="en">DOOM</span> <abbr>III</abbr> <span lang="en">Id Software</span> ha sparpagliato molti riferimenti alla serie, in qualunque
                momento se il giocatore inserisce un trucco dei vecchi <span lang="en">DOOM</span> appare una scritta che recita: "la tua memoria funziona bene!"
            </p>
          </section>
        </article>

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <section>
            <p>
                All'inizio del gioco si può trovare un cabinato del gioco <span lang="en">Super Turbo Turkey Puncher 3</span>; questo finto cabinato contiene grafiche
                ispirate a quelle del primo capitolo della serie e ad altri giochi di <span lang="en">Capcom</span> come <span lang="en">Street Fighter</span>
                <span lang="el">Alpha</span>. In giro per la base si possono trovare riviste chiamate <span lang="en">Game HOG</span>, che presenta sulla copertina
                la faccia del <span lang="en">DOOM Guy</span> del primo gioco con un'espressione scioccata che si poteva vedere raramente per via di un
                <span lang="en">bug</span>
            </p>
            <section class="trivia_img">
              <img src="IMAGES/Super_Turkey.jpg" alt="Super Turbo Turkey Puncher 3" />
              <img src="IMAGES/Gamehog.jpg" alt="Copertina della finta rivista 'GameHOG'" />
            </section>
          </section>
        </article>
    </div>

    <footer id="foot">

    <div id="siteInfo">
      <h1>Doom Wiki</h1>
      <p>DoomWiki è sviluppato da appassionati e ammiratori del videogioco.</p>
      <p><span lang="en">&copy;Doom</span> è un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank">2022 Bethesda Softworks LLC<span class="screen-reader-only">(apre una nuova finestra)</span></a>,
        un'azienda <span lang="en">ZeniMax Media</span>. I marchi appartengono ai rispettivi proprietari. Tutti i diritti riservati.</p>
    </div>

    <div id="SiteMap">
      <p>Mappa del sito</p>
      <ul>
        <li lang="en"><a href="index.php">Homepage</a></li>
        <li>Trama
          <ul>
            <li lang="en"><a href="history.php">Doom <abbr title="Primo">I</abbr></a></li>
            <li lang="en"><a href="history_2.php">Doom <abbr title="Secondo">II</abbr></a></li>
            <li lang="en"><a href="history_3.php">Doom <abbr title="Terzo">III</abbr></a></li>
            <li lang="en"><a href="history_2016.php">Doom <abbr title="Quarto">IV</abbr></a></li>
            <li lang="en"><a href="history_eternals.php">Doom <abbr title="Quinto">V</abbr> (Doom eternal)</a></li>
          </ul>
        </li>
        <li><a href="stats.php">Statistiche</a></li>
        <li><a href="trivia.php">Curiosità</a></li>
        <li><a href="signup.php">Registrazione</a> (nuovo utente)</li>
        <li><a href="signup.php">Accesso</a> (utente già registrato)</li>
        <li><a href="account-managment.php">Impostazioni profilo (utente gia resitrato)</a>
          <ul>
            <li><a href="account-managment/email-change.php">Cambio <span lang="en">email</span></a></li>
            <li><a href="account-managment/password-change.php">Cambio <span lang="en">password</span></a></li>
            <li><a href="account-managment/profile-pic-change.php">Cambio immagine-profilo</a></li>
            <li><a href="account-managment/username-change.php">Cambio nome utente</a></li>
            <li><a href="account-managment/delete-account.php">Eliminazione profilo</a></li>
          </ul>
        </li>
        <li><a href="help.php">Modulo assistenza</a></li>
        <li><a href="cookie_informativa.php">Informativa <span lang="en">cookie</span></a></li>
      </ul>
    </div>

  </footer>
</body>

</html>
