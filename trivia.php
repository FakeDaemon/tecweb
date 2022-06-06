<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link href="CSS/STYLE.css" rel="stylesheet">
    <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
    <link href="CSS/STYLE_HISTORY.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <meta charset="utf-8">
    <title> Fun Fact </title>
    <meta name="keywords" content="DOOM, Fun Fact" />
    <meta name="description" content="DOOM Wiki" />
    <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano, Angeloni Alberto" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="cookie-banner js-cookie-banner">
        We use 🍪...
        <button class="js-cookie-dismiss">Accept</button>
    </div>
    <script type="text/javascript" src="SCRIPTS/cookie.js"></script>
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
            <li class="MenuBarItem CurrentLocation">CURIOSITÀ</li>
          </ul>
          <div id="MenuUserWidget">
            <?php
              include 'SCRIPTS/header.php';
              if(isLogged())
                printLoggedMenuWidget();
              else
                printDefaultMenuWidget();
            ?>
          </div>
        </nav>
    </header>

    <div class="main">
        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <p>
                Sapevi che secondo le stime <span lang="en">DOOM</span> è il <span lang="en">software</span> più installato del 1995?
                A quanto pare il gioco era installato su più <span lang="en">pc</span> di <span lang="en">Windows</span> 95.
                La popolarità del gioco spinse il fondatore di <span lang="en">Microsft</span> Bill Gates a considerare l'idea
                di acquistare il <span lang="en">software</span>, poi però decisero di creare un <span lang="en">port</span>
                del gioco per <span lang="en">Windows</span> in modo da promuovere il sitema operativo come una piattaforma
                di gioco. Il 13 ottobre 1995 la <span lang="en">Microsoft</span> presento un video promozionale di
                <span lang="en">Windows</span> 95 con Bill Gates sovrapposto al gioco.
            </p>
        </article>
        <img id="FunFact" src="IMAGES/Win95promo.jpg" alt="Bill Gates nella promo di Windows 95" />

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
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
        </article>
        <img id="FunFact" src="IMAGES/Alien.jpg" alt="Poster del film Alien" />
        <img id="FunFact" src="IMAGES/EvilDead.jpg" alt="Poster del film Evil Dead" />

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <p>
                L'idea di usare i demoni come nemici venne ad alcuni sviluppatori dopo aver giocato una campagna di
                <span lang="en">Dundeons and Dragons</span> dove alla fine si apre un portale che permise un'invasione demoniaca.
                Il <span lang="en">cacodemon</span> di <span lang="en">DOOM</span> è ispirato al classico mostro di <span lang="en">Dungeons and Dragons "Beholder"</span>,
                il suo <span lang="en">design</span> trae ispirazione da un altro mostro di <span lang="en">D&D</span>, il terrore astrale
            </p>
        </article>
        <img id="FunFact" src="IMAGES/cacodemon.jpg" alt="classico nemico di DOOM" />
        <img id="FunFact" src="IMAGES/Beholder.png" alt="Beholder da Dungeons & Dragons" />
        <img id="FunFact" src="IMAGES/Astral_dreadnought.png" alt="Terrore Astrale da Dungeons & Dragons" />

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <p>
                Il direttore creativo Tom Hall aveva originariamente creato una trama molto elaborata per il gioco, e scrisse un
                documento chiamato <span lang="en">DOOM Bible</span> contenente il <span lang="en">design</span> del gioco.
                La trama originale avrebbe dovuto aver luogo su un pianeta alieno chiamato Tei Tenga che sarebbe stato invaso da
                creature provenienti dall'inferno, ci sarebbero inoltre dovuti essere 5 personaggi giocabili caratterizzati da abilità
                peculiari. La storia comprendeva originariamente l'andare e tornare dall'inferno con la possibile distruzione del pianeta,
                infine il protagonista sarebbe stato ritenuto responsabile dell'accaduto su Tei Tenga e mandato in prigione.
                John Carmack (co-fondatore di<span lang="en">Id Software</span>) non approvo una storia così dettagliata e la
                <span lang="en">DOOM Bible</span> venne per lo più ignorata nella versione finale. Carmack spiegò la sua posizione riguardo
                la narrazzione nei videogiochi nel 2003 dicendo: "la storia nei videogiochi e come la storia dei film porno. Ci si aspetta
                che ci sia, ma non è così importante".
                Alcuni elementi del documento vennero mantenutinella versione finale del gioco, come il laboratorio militare sul pianeta alieno,
                l'andare e tornare dall'inferno e le versioni modificate di alcune armi e alcuni mostri presentati in origine nella <span lang="en">DOOM Bible</span>.
                Alla fine Tom Hall portò con sè alcuni elementi della <span lang="en">DOOM Bible</span> dop aver lasciato <span lang="en">Id Software</span>
                per lavorare con la <span lang="en">software house "3D Realms"</span>. Lo sparatutto in prima persona "<span lang="en">Rise of the Triad</span>"
                presenta i personaggi originariamente descritti nella <span lang="en">DOOM Bible</span> e nel simulatore di volo "<span lang="en">Terminal Velocity</span>"
                si può trovare un pianeta chiamato Tei Tenga
            </p>
        </article>
        <img id="FunFact" src="IMAGES/DOOMBible.jpg" alt="Copertina della DOOM Bible" />
        <img id="FunFact" src="IMAGES/RiseoftheTriad.jpg" alt="Copertina di Rise of the Triad" />
        <img id="FunFact" src="IMAGES/TerminalVelocity.jpg" alt="Copertina di Terminal Velocity" />

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <p>
                La saga di <span lang="en">DOOM</span> contiente tantissimi segreti e <span lang="en">easter eggs</span>, nelle prime versioni della mappa "<span lang="en">
                    command control</span>" il giocatore poteva trovare una stanza con un enorme svastica nazista sul pavimento e sul soffitto, questa doveva essere una
                citazione a il gioco "<span lang="en">Wolfenstein 3D</span>", ma fu rimosso per via di alcune controversie. <span lang="en">Wolfenstein</span> venne
                citato di nuovo in <span lang="en">DOOM</span> II con una mappa segreta accessibile dal livello 15 basata sui livelli 1 e 9 di
                "<span lang="en">Escape from Wolfenstein</span>" che presenta come nemici i soldati nazisti del gioco, ma presenta anche un riferimento ad un altro gioco
                di <span lang="en">Id Software: "Commander Keen"</span>
            </p>
        </article>
        <img id="FunFact" src="IMAGES/Wolfenstein-New-Order-3D-Easter-Egg.jpg" alt="Livello ispirato a Wolfenstein 3d" />
        <img id="FunFact" src="IMAGES/Map32_commander_keen.png" alt="Citazione al gioco Commander Keen" />

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <p>
                Il nome dei livelli e alcune musiche di <span lang="en">DOOM</span> hanno origini interessanti, il primo episodio del primo
                <span lang="en">DOOM, "Knee-Deep in the Dead"</span> fu uno dei pochi titoli della <span lang="en">DOOM Bible</span> che finirono nel gioco, mentre il
                quarto e ultimo episodio di <span lang="en">Ultimate DOOM</span> chiamato <span lang="en">Thy Flesh Consumed</span> prendo il nome da un passaggio della
                Bibbia di re Giacomo, proverbi 5:11, che cita "<span lang="en">and thou mourn at the last, when thy flesh and thy body are consumed<span>".</span>
                    Molti livelli di <span lang="en">Thy Flesh Consumed</span> prendono il nome da passi della Bibbia, e il ventunesimo livello di <span lang="en">DOOM</span>
                    <abbr>II</abbr> si chiama Nirvana e vi si può trovare un fucile a pompa. Questo è probabilmente un riferimento alla <span lang="en">band</span>
                    "Nirvana" il cui cantante Curt Cobain si suicidò con un fucile lo stesso anno del lancio di <span lang="en">DOOM</span><abbr>II</abbr>. Un altro
                    riferimento a <span lang="en">band</span> all'interno del gioco si può trovare nel primo livello di <span lang="en">Thy Flesh Consumed, Hell Beneath</span>
                    contiene una stanza segreta con il logo dei "<span lang="en">Nine Inch Nails</span>"
            </p>
        </article>
        <img id="FunFact" src="images/NIN_reference.jpg" alt="Stanza con il logo dei Nine Inch Nails" />
        <img id="FunFact" src="images/ThyFleshConsumed.png" alt="Elenco dei livelli di 'Thy Flesh Consumed'" />

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <p>
                La colonna sonora di <span lang="en">DOOM</span><abbr>II</abbr> contiene molte tracce influenzate da <span lang="en">band rock</span> ed
                <span lang="en">heavy metal</span>. La traccia "<span lang="en">Bye Bye American Pie</span>" contiene un <span lang="en">sample</span> della canzone
                "<span lang="en">Them Bones</span>" degli <span lang="en">Alice in Chains</span>, oppure la traccia "<span lang="en">Shawn's got the Shotgun</span>"
                contiene un giro di batteria di "<span lang="en">South of Heaven</span>" degli <span lang="en">Slayer</span>. La traccia
                "<span lang="en">Into Sandy's City</span>" presenta una versione più lenta della melodia di apertura di "<span lang="en">Sex Type Thing</span>" degli
                "<span lang="en">Stone Temple Pilots</span>". La traccia "<span lang="en">The Demon's Dead</span>" usa la melodia di apertura di
                "<span lang="en">After All(The Dead)</span>" dei <span lang="en">Black Sabbath</span>
            </p>
        </article>
        <img id="FunFact" src="IMAGES/SouthOfHeaven.jpg" alt="Copertina dell'album South of Heaven degli Slayers" />
        <img id="FunFact" src="IMAGES/Thembones.jpeg" alt="Copertina del singolo Them Bones degli Alice in Chains " />
        <img id="FunFact" src="IMAGES/dehumanizer.jpg" alt="Copertina di Dehumanizer, album dei Black Sabbath contenente il singolo After All" />

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <p>
                Durante lo sviluppo di <span lang="en">DOOM</span> <abbr>III</abbr> <span lang="en">Id Software</span> ha sparpagliato molti riferimenti alla serie, in qualunque
                momento se il giocatore inserisce un trucco dei vecchi <span lang="en">DOOM</span> appare una scritta che recita: "la tua memoria funziona bene!"
            </p>
        </article>

        <article>
            <h2 class="paragrafo" lang="en">Did you know?</h2>
            <p>
                All'inizio del gioco si può trovare un cabinato del gioco <span lang="en">Super Turbo Turkey Puncher 3</span>; questo finto cabinato contiene grafiche
                ispirate a quelle del primo capitolo della serie e ad altri giochi di <span lang="en">Capcom</span> come <span lang="en">Street Fighter</span>
                <span lang="el">Alpha</span>. In giro per la base si possono trovare riviste chiamate <span lang="en">Game HOG</span>, che presenta sulla copertina
                la faccia del <span lang="en">DOOM Guy</span> del primo gioco con un'espressione scioccata che si poteva vedere raramente per via di un
                <span lang="en">pug</span>
            </p>
        </article>
        <img id="FunFact" src="IMAGES/Super_Turkey.jpg" alt="Super Turbo Turkey Puncher 3" />
        <img id="FunFact" src="IMAGES/Gamehog.jpg" alt="Copertina della finta rivista 'GameHOG'" />

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
</body>

</html>
