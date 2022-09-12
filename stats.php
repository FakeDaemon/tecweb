<html lang="en" dir="ltr">

<head>
    <link href="CSS/STYLE.css" rel="stylesheet">
    <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
    <link href="CSS/STYLE_TABLE.css" rel="stylesheet">
    <link href="CSS/PRINT_STATS.css" rel="stylesheet" type="text/css" media="print" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <meta charset="utf-8">
    <title> Home </title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="DOOM, stats, weapons" />
    <meta name="description" content="Pagina riguardante le statistiche di gioco" />
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
        header('location : stats.php');
    }
    if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
    ?>
        <form class="cookie-banner" action="stats.php" method="post">
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
                <li class="MenuBarItem CurrentLocation">STATISTICHE</li>
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
    <div class="main">

        <table>
            <caption>Armi</caption>
            <thead>
                <tr>
                    <th class="head">Nome Arma</th>
                    <th class="head">Descrizione</th>
                    <th class="head">Presente in</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        <span lang="en">Fists</span>
                    </th>
                    <th>
                        Arma base per attacchi ravvicinati. Munizioni infinite, crea danno quanto un colpo di <span lang="en">Pistol</span>; normalmente usate come ultima spiaggia oppure in modalità berserk.
                    </th>
                    <th>DOOM, DOOM2, DOOM3, DOOM(2016), DOOM Eternal</th>
                </tr>
                <tr>
                    <th>
                        <span lang="en">Chainsaw</span>
                    </th>
                    <th>
                        Fa lo stesso danno dei <span lang="en">Fists</span> ma 4 volte più veloce
                    </th>
                    <th>DOOM, DOOM2, DOOM3, DOOM(2016), DOOM Eternal</th>
                </tr>
                <tr>
                    <th>
                        <span lang="en">Pistol</span>
                    </th>
                    <th>
                        Arma a lungo raggio di default. Quasi completamente inutile con avversari più forti di <span lang="en">zombieman</span> oppure <span lang="en">shotgun guy</span>
                    </th>
                    <th>DOOM, DOOM2, DOOM3, DOOM(2016), DOOM Eternal</th>
                </tr>
                <tr>
                    <th>
                        <span lang="en">Chaingun</span>
                    </th>
                    <th>
                        Molto utile contro le folle di piccoli mostri o singoli mostri grossi. Ha un <span lang="en"> rate of fire</span> molto alto e si rischia spesso di esaurire le munizioni
                    </th>
                    <th>DOOM, DOOM2, DOOM3, DOOM(2016), DOOM Eternal</th>
                </tr>
                <tr>
                    <th>
                        <span lang="en">Rocket launcher</span>
                    </th>
                    <th>
                        Lancia razzi esplosivi. Fa molto danno, ma si rischia di autoinfliggersi seri danni se usato a corto raggio.
                    </th>
                    <th>DOOM, DOOM2, DOOM3, DOOM(2016), DOOM Eternal</th>
                </tr>
                <tr>
                    <th>
                        <span lang="en">Plasma gun</span>

                    </th>
                    <th>
                        Spara impulsi di plasma blu ad elevata velocità. Se usato appropriatamente può demolire facilmente un gruppo di nemici
                    </th>
                    <th>DOOM, DOOM2, DOOM3, DOOM(2016), DOOM Eternal</th>
                <tr>
                    <th>
                        <abbr lang="en" title="Big Fucking Gun 9000">BFG9000</abbr>
                    </th>
                    <th>
                        <span lang="en">The "Big Fucking Gun"</span>, piuttosto controintuitivo il suo utilizzo, soprattutto per un giocatore alle prime armi. In compenso elimina quasi tutti i nemici in un singolo colpo.
                    </th>
                    <th>DOOM, DOOM2, DOOM3, DOOM3("<span lang="en">Ressurrection of evil</span>") DOOM(2016), DOOM Eternal</th>
                </tr>
                <tr>
                    <th><span lang="en">Super Shotgun</span></th>
                    <th>Una doppietta a canne mozze che richiede molto tempo per la ricarica dei proiettili, a distanza ravvicinata risulta più letale del normale <span lang="en">Shotgun</span></th>
                    <th>DOOM2, DOOM3("<span lang="en">Ressurrection of evil</span>"), DOOM(2016), DOOM Eternal</th>
                </tr>
                <tr>
                    <th><span lang="en">Flashlight</span></th>
                    <th>Di per sè non è un'arma ma fa il doppio del danno dei pugni. Ma il raggio di azione è ridotto</th>
                    <th>DOOM3, DOOM3("<span lang="en">Ressurrection of evil</span>")</th>
                </tr>
                <tr>
                    <th><span lang="en">Machine Gun</span></th>
                    <th>Simile alla <span lang="en">Chaingun</span>, meno potente ma con mira più accurata</th>
                    <th>DOOM3</th>
                </tr>
                <tr>
                    <th><span lang="en">Granades</span></th>
                    <th>Granate a frammentazione, esplodono dopo un tempo fisso</th>
                    <th>DOOM3</th>
                </tr>
                <tr>
                    <th><span lang="en">Soul Cube</span></th>
                    <th>Quest'arma la si può caricare ammazzando mostri, colpisce sempre il nemico lo termina con un singolo colpo (ad eccezione dei boss Sabaoth e Cyberdemon). Inoltre può essere usata per recuperare punti vita</th>
                    <th>DOOM3</th>
                </tr>
                <tr>
                    <th><span lang="en">Artifact</span></th>
                    <th>Arma con utilizzo analogo al "Soul Cube"</th>
                    <th>DOOM3("<span lang="en">Ressurrection of evil</span>")</th>
                </tr>
                <tr>
                    <th><span lang="en">Grabber</span></th>
                    <th>Noto anche come "<span lang="en">Ionized Plasma Levitator</span>", permette di sollevare oggetti dal terreno e scagliarli con estrema forza. Inoltre può afferrare le palle di fuoco sparate dai nemici, raggiungere oggetti altrimenti irraggiungibili e rimuovere ostacoli</th>
                    <th>DOOM3("<span lang="en">Ressurrection of evil</span>")</th>
                </tr>
                <tr>
                    <th><span lang="en">Burst Rifle</span></th>
                    <th>Fucile semiautomatico, spara 3 colpi per volta. <span lang="en">"Multiplayer Only"</span></th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Frag Granade</span></th>
                    <th>Analogo a <span lang="en">Granades</span> di "<span lang="en">Doom</span> 3", ma con design e danno differenti</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Gauss Cannon</span></th>
                    <th>Spara una raffica di energia, maggiore è il tempo di carica maggiore è il danno della raffica</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Heavy Assault Rifle</span></th>
                    <th>Analogo di <span lang="en">Machine Gun</span>, ma ha la possibilità di sparare missili</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Hellshot</span></th>
                    <th>Arma semiautomatica alimentata a energia infernale. Causa danni secondari da fuoco a chi viene colpito. "<span lang="en">Multiplayer Only</span>"</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Hologram</span></th>
                    <th>Ologramma del giocatore. Distrae gli avversari</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Kinetic Mine</span></th>
                    <th>Mina che esplode quando un avversario è abbastanza vicino. "<span lang="en">Multiplayer Only</span>"</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Lighting Gun</span></th>
                    <th>Arma a corto raggio che spara continui flussi di elettricità. "<span lang="en">Multiplayer Only</span>"</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Mark V Pistol</span></th>
                    <th>Pistola ricaricabile. "<span lang="en">Multiplayer Only</span>"</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Personal Teleporter</span></th>
                    <th>Teletrasporta il giocatore al punto di partenza. "<span lang="en">Multiplayer Only</span>"</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Reaper</span></th>
                    <th>Rilascia 6 raffiche circolari di energia. "<span lang="en">Multiplayer Only</span>"</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Shield Wall</span></th>
                    <th>Quando attivato, crea una barriera invalicabile dai nemici e dai proiettili</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Siphon Granade</span></th>
                    <th>Cosa diamine è il <span lang="en">siphon</span>?</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Static Cannon</span></th>
                    <th>Si carica coi movimenti del giocatore, rilascia tutta l'energia in un colpo solo. "<span lang="en">Multiplayer Only</span>"</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Tesla Rocket</span></th>
                    <th>Usa scintille elettriche che attaccano tutti i nemici nel suo raggio di tiro. Rallenta muovendosi</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Thread Sensor</span></th>
                    <th>Un dispositivo che, quando lanciato, si attacca a una superficie e rivela i nemici</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Vortex Rifle</span></th>
                    <th>Fucile da cecchino. "<span lang="en">Multiplayer Only</span>"</th>
                    <th>DOOM(2016)</th>
                </tr>
                <tr>
                    <th><span lang="en">Heavy Cannon</span></th>
                    <th>Analogo a <span lang="en">Heavy Assault Rifle</span> in DOOM(2016)</th>
                    <th>DOOM Eternal</th>
                </tr>
                <tr>
                    <th> <span lang="en">Plasma Rifle</span> </th>
                    <th>Arma che spara molto velocemente, paricolarmente efficace contro gli scudi</th>
                    <th>DOOM Eternal</th>
                </tr>
                <tr>
                    <th> <span>Ballista</span> </th>
                    <th>Analogo a <span lang="en">Plasma Rifle</span>. Spara lentamente e colpisce duramente. </th>
                    <th>DOOM Eternal</th>
                </tr>
                <tr>
                    <th>Unmaykr</th>
                    <th>Usa i proiettili della BFG9000, si ispira all'arma <span lang="en"> "Unmaker"</span> di "DOOM 64". Lo si sblocca solo dopo aver attraversato i sei <span>Slayer Gates</span> </th>
                    <th>DOOM Eternal</th>
                </tr>
                <tr>
                    <th>Crucible</th>
                    <th>Puo essere trovato solo in punti singoli della mappa, usa le munizioni del BFG9000, termina i nemici in un singolo colpo.</th>
                    <th>DOOM Eternal</th>
                </tr>
            </tbody>
        </table>
    </div>
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
