<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
    <link href="CSS/STYLE_COMMON.css" rel="stylesheet">
    <link href="CSS/STYLE_TABLE.css" rel="stylesheet">
    <link href="CSS/PRINT_STATS.css" rel="stylesheet" type="text/css" media="print" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <meta charset="utf-8">
    <title> Armi | DoomWiki </title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="DOOM WIKI, armi, descrizione" />
    <meta name="description" content="Lista delle armi del gioco con descrizione" />
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
        header('location:stats.php');
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
                <li class="MenuBarItem CurrentLocation">ARMI</li>
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
                if ($user->isLogged()) echo "<img src='IMAGES/ProfilePics/ProfilePicN" . $user->profile_pic . ".jpg' alt='Doomguy, accedi o registrati!'>";
                else echo "<img src='IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'>";
                ?>
            </div>
        </nav>
    </header>
    <div class="main">

        <table>
            <caption>Armi</caption>
            <thead>
                <tr>
                    <th scope="col" class="head">Nome Arma</th>
                    <th scope="col" class="head">Descrizione</th>
                    <th scope="col" class="head">Presente in</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">
                        <span lang="en">Fists</span>
                    </th>
                    <td>
                        Arma base per attacchi ravvicinati. Munizioni infinite, crea danno quanto un colpo di <span lang="en">Pistol</span>; normalmente usate come ultima spiaggia oppure in modalità berserk.
                    </td>
                    <td>DOOM, DOOM2, DOOM3, DOOM(2016), DOOM Eternal</td>
                </tr>
                <tr>
                    <th scope="row">
                        <span lang="en">Chainsaw</span>
                    </th>
                    <td>
                        Fa lo stesso danno dei <span lang="en">Fists</span> ma 4 volte più veloce
                    </td>
                    <td>DOOM, DOOM2, DOOM3, DOOM(2016), DOOM Eternal</td>
                </tr>
                <tr>
                    <th scope="row">
                        <span lang="en">Pistol</span>
                    </th>
                    <td>
                        Arma a lungo raggio di default. Quasi completamente inutile con avversari più forti di <span lang="en">zombieman</span> oppure <span lang="en">shotgun guy</span>
                    </td>
                    <td>DOOM, DOOM2, DOOM3, DOOM(2016), DOOM Eternal</td>
                </tr>
                <tr>
                    <th scope="row">
                        <span lang="en">Chaingun</span>
                    </th>
                    <td>
                        Molto utile contro le folle di piccoli mostri o singoli mostri grossi. Ha un <span lang="en"> rate of fire</span> molto alto e si rischia spesso di esaurire le munizioni
                    </td>
                    <td>DOOM, DOOM2, DOOM3, DOOM(2016), DOOM Eternal</td>
                </tr>
                <tr>
                    <th scope="row">
                        <span lang="en">Rocket launcher</span>
                    </th>
                    <td>
                        Lancia razzi esplosivi. Fa molto danno, ma si rischia di autoinfliggersi seri danni se usato a corto raggio.
                    </td>
                    <td>DOOM, DOOM2, DOOM3, DOOM(2016), DOOM Eternal</td>
                </tr>
                <tr>
                    <th scope="row">
                        <span lang="en">Plasma gun</span>

                    </th>
                    <td>
                        Spara impulsi di plasma blu ad elevata velocità. Se usato appropriatamente può demolire facilmente un gruppo di nemici
                    </td>
                    <td>DOOM, DOOM2, DOOM3, DOOM(2016), DOOM Eternal</td>
                <tr>
                    <th scope="row">
                        <abbr lang="en" title="Big Fucking Gun 9000">BFG9000</abbr>
                    </th>
                    <td>
                        <span lang="en">The "Big Fucking Gun"</span>, piuttosto controintuitivo il suo utilizzo, soprattutto per un giocatore alle prime armi. In compenso elimina quasi tutti i nemici in un singolo colpo.
                    </td>
                    <td>DOOM, DOOM2, DOOM3, DOOM3("<span lang="en">Ressurrection of evil</span>") DOOM(2016), DOOM Eternal</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Super Shotgun</span></th>
                    <td>Una doppietta a canne mozze che richiede molto tempo per la ricarica dei proiettili, a distanza ravvicinata risulta più letale del normale <span lang="en">Shotgun</span></td>
                    <td>DOOM2, DOOM3("<span lang="en">Ressurrection of evil</span>"), DOOM(2016), DOOM Eternal</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Flashlight</span></th>
                    <td>Di per sè non è un'arma ma fa il doppio del danno dei pugni. Ma il raggio di azione è ridotto</td>
                    <td>DOOM3, DOOM3("<span lang="en">Ressurrection of evil</span>")</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Machine Gun</span></th>
                    <td>Simile alla <span lang="en">Chaingun</span>, meno potente ma con mira più accurata</td>
                    <td>DOOM3</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Granades</span></th>
                    <td>Granate a frammentazione, esplodono dopo un tempo fisso</td>
                    <td>DOOM3</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Soul Cube</span></th>
                    <td>Quest'arma la si può caricare ammazzando mostri, colpisce sempre il nemico lo termina con un singolo colpo (ad eccezione dei boss Sabaoth e Cyberdemon). Inoltre può essere usata per recuperare punti vita</td>
                    <td>DOOM3</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Artifact</span></th>
                    <td>Arma con utilizzo analogo al "Soul Cube"</td>
                    <td>DOOM3("<span lang="en">Ressurrection of evil</span>")</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Grabber</span></th>
                    <td>Noto anche come "<span lang="en">Ionized Plasma Levitator</span>", permette di sollevare oggetti dal terreno e scagliarli con estrema forza. Inoltre può afferrare le palle di fuoco sparate dai nemici, raggiungere oggetti altrimenti irraggiungibili e rimuovere ostacoli</td>
                    <td>DOOM3("<span lang="en">Ressurrection of evil</span>")</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Burst Rifle</span></th>
                    <td>Fucile semiautomatico, spara 3 colpi per volta. <span lang="en">"Multiplayer Only"</span></td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Frag Granade</span></th>
                    <td>Analogo a <span lang="en">Granades</span> di "<span lang="en">Doom</span> 3", ma con design e danno differenti</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Gauss Cannon</span></th>
                    <td>Spara una raffica di energia, maggiore è il tempo di carica maggiore è il danno della raffica</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Heavy Assault Rifle</span></th>
                    <td>Analogo di <span lang="en">Machine Gun</span>, ma ha la possibilità di sparare missili</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Hellshot</span></th>
                    <td>Arma semiautomatica alimentata a energia infernale. Causa danni secondari da fuoco a chi viene colpito. "<span lang="en">Multiplayer Only</span>"</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Hologram</span></th>
                    <td>Ologramma del giocatore. Distrae gli avversari</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Kinetic Mine</span></th>
                    <td>Mina che esplode quando un avversario è abbastanza vicino. "<span lang="en">Multiplayer Only</span>"</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Lighting Gun</span></th>
                    <td>Arma a corto raggio che spara continui flussi di elettricità. "<span lang="en">Multiplayer Only</span>"</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Mark V Pistol</span></th>
                    <td>Pistola ricaricabile. "<span lang="en">Multiplayer Only</span>"</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Personal Teleporter</span></th>
                    <td>Teletrasporta il giocatore al punto di partenza. "<span lang="en">Multiplayer Only</span>"</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Reaper</span></th>
                    <td>Rilascia 6 raffiche circolari di energia. "<span lang="en">Multiplayer Only</span>"</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Shield Wall</span></th>
                    <td>Quando attivato, crea una barriera invalicabile dai nemici e dai proiettili</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Siphon Granade</span></th>
                    <td>Granata che esplode creando un campo gravitazionale</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Static Cannon</span></th>
                    <td>Si carica coi movimenti del giocatore, rilascia tutta l'energia in un colpo solo. "<span lang="en">Multiplayer Only</span>"</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Tesla Rocket</span></th>
                    <td>Usa scintille elettriche che attaccano tutti i nemici nel suo raggio di tiro. Rallenta muovendosi</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Thread Sensor</span></th>
                    <td>Un dispositivo che, quando lanciato, si attacca a una superficie e rivela i nemici</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Vortex Rifle</span></th>
                    <td>Fucile da cecchino. "<span lang="en">Multiplayer Only</span>"</td>
                    <td>DOOM(2016)</td>
                </tr>
                <tr>
                    <th scope="row"><span lang="en">Heavy Cannon</span></th>
                    <td>Analogo a <span lang="en">Heavy Assault Rifle</span> in DOOM(2016)</td>
                    <td>DOOM Eternal</td>
                </tr>
                <tr>
                    <th scope="row"> <span lang="en">Plasma Rifle</span> </th>
                    <td>Arma che spara molto velocemente, paricolarmente efficace contro gli scudi</td>
                    <td>DOOM Eternal</td>
                </tr>
                <tr>
                    <th scope="row"><span>Ballista</span></th>
                    <td>Analogo a <span lang="en">Plasma Rifle</span>. Spara lentamente e colpisce duramente.</td>
                    <td>DOOM Eternal</td>
                </tr>
                <tr>
                    <th scope="row">Unmaykr</th>
                    <td>Usa i proiettili della BFG9000, si ispira all'arma <span lang="en"> "Unmaker"</span> di "DOOM 64". Lo si sblocca solo dopo aver attraversato i sei <span>Slayer Gates</span></td>
                    <td>DOOM Eternal</td>
                </tr>
                <tr>
                    <th scope="row">Crucible</th>
                    <td>Puo essere trovato solo in punti singoli della mappa, usa le munizioni del BFG9000, termina i nemici in un singolo colpo.</td>
                    <td>DOOM Eternal</td>
                </tr>
            </tbody>
        </table>
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
