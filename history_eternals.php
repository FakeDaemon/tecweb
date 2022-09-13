<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
    <link href="CSS/STYLE_COMMON.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="CSS/STYLE_HISTORY.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="CSS/PRINT.css" rel="stylesheet" type="text/css" media="print" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <meta charset="utf-8">
    <title> DOOM Eternal | DoomWiki </title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="DOOM WIKI, trama, gameplay, introduzione, livelli" />
    <meta name="description" content="DOOM Eternal, Tutte le informazioni sul gioco" />
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
        header('location:history_eternals.php');
    }
    if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
    ?>
        <form class="cookie-banner" action="history_eternals.php" method="post">
            <p>
                Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
                il contenuto e analizzare il traffico di rete.
                <a href=cookie_informativa.php>Leggi di pi&ugrave; riguardo ai <span lang="en">cookie</span></a>
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
                        <li class="NestedListItem CurrentLocation"><a href="history_eternals.php">CAPITOLO <abbr title="Quinto">V</abbr></a></li>
                    </ul>
                </li>
                <li class="MenuBarItem"><a href="stats.php">ARMI</a></li>
                <li class="MenuBarItem"><a href="trivia.php">CURIOSIT&Agrave;</a></li>
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
        <h1 id="replace5" lang="en">DOOM ETERNALS</h1>
        <article>
            <h2 class="paragrafo">Introduzione</h2>
            <section>
            <p>
                <span lang="en">Doom Eternal</span> &egrave; il <span lang="en">sequel</span> del <span lang="en">reboot</span> del 2016. Il gioco &egrave; uscito il 19 Marzo 2020
                per <span lang="en">PlayStation</span> 4, <span lang="en">Xbox One</span>, <abbr lang="en" title="Personal Computer">PC</abbr> e
                <span lang="en">Google Stadia</span>. La versione per <span lang="en">Nintendo Switch</span> uscii pi&ugrave; tardi: l'8 dicembre 2020.
                Successivamente sono stati rilasciati due <abbr title="Downloadable Content">DLC</abbr>: "Gli d&egrave;i antichi", la parte 1 il 20 ottobre 2020, e la parte 2 il
                18 Marzo 2021. Il gioco &egrave; stato chiamato <span lang="en">Doom Eternal</span> per evitare di creare confusione con <span lang="en">Doom</span> 2 del 1984
            </p>
          </section>
        </article>
        <article>
            <h2 class="paragrafo">Trama</h2>
            <section>
            <p>
                Un pò di tempo dopo gli eventi di <span lang="en">Doom</span> (2016), la Terra &egrave; stata invasa da forze demoniache che hanno spazzato via il 60% della
                popolazione grazie alla corrotta <span lang="en">Union Aerospace Corporation</span>. Gli ultimi umani rimasti sono fuggiti dal pianeta o si sono uniti
                formando <abbr title="Armored Response Coalition" lang="en">ARC</abbr>, un movimento di resistenza formato per fermare l'invasione e che ora si nasconde dopo aver subito grosse perdite.
              </p>
              <p>
                Il <span lang="en">Doom Slayer</span>, precedentemente tradito e teletrasportato fuori dalla base di Marte dal <abbr title="dottore">dr.</abbr>
                <span lang="en">Samuel Hayden</span>, f&agrave; ritorno grazie a un satellite-fortezza pilotato dall'<abbr title="intelligenza artificiale">AI</abbr> VEGA per sedare l'invasione
                uccidendo i Sacerdoti Infernali: <span lang="en">Deags Nilox, Ranak</span>, e <span lang="en">Grav</span>. I sacerdoti servono un essere angelico conosciuto come <span lang="en">Khan Maykr</span> che vuole sacrificare
                l'umanit&agrave;. Lo <span lang="en">Slayer</span> si teletrasporta in una citt&agrave; distrutta della California e riesce a uccidere <span lang="en">Deag Nilox</span>, ma <span lang="en">Khan Maykr</span>
                teletrasporta i due sacerdoti rimanenti in una <span lang="en">location</span> sconosciuta, obbligando lo <span lang="en">Slayer</span> a
                continuare la ricerca. Dopo aver recuperato il localizzatore celestiale, viaggia all'Inferno per recuperare una fonte energetica dalla sentinella caduta
                conosciuta come "Il Traditore" che avverte lo <span lang="en">Slayer</span> del fatto che i giorni dell'umanit&agrave; sono ormai terminati.
              </p>
              <p>
                <span lang="en">Slayer</span> riceve dal Traditore la fonte energetica e una daga speciale. VEGA dirige lo <span lang="en">Slayer</span> verso
                una cittadella in Antartide dove <span lang="en">Deag Ranak</span> si &egrave; rifugiato, lo <span lang="en">Slayer</span> lo uccide dopo aver sconfitto il suo cacciatore di guardiani
                <span lang="en">Doom</span>.
            </p>
            <img src="IMAGES/doom_eternal_story.jpg" alt="Uno dei nemici principali del gioco">
            <p>
                In risposta, <span lang="en">Khan Maykr</span> sposta <span lang="en">Deag Grav</span> in una localit&agrave; sconosciuta e accelera l'invasione della Terra. Obbligato a cambiare
                i suoi piani lo <span lang="en">Slayer</span> distrugge il grande nido di sangue nell'Europa centrale, dove l'invasione &egrave; cominciata.
                Senza piste per trovare l'ultimo sacerdote, Vega suggerisce di cercare il <abbr title="dottore">dr.</abbr> <span lang="en">Hayden</span>, che conosce la posizione di <span lang="en">Deag Grav</span>.
                Lo <span lang="en">Slayer</span> si apre la strada verso un composto di <abbr title="Armored Response Coalition" lang="en">ARC</abbr> dove rinviene il guscio robotico di <span lang="en">Hayden</span> e il Crogiolo, prima di affrontare
                un Predatore, una sentinella demoniaca inviata a fermarlo.
              </p>
              <p>
                Mentre scaricano la coscienza di <span lang="en">Hayden</span> nella fortezza scoprono la posizione dell'ultimo sacerdote,
                nascosto su <span lang="en">Sentinel Prime</span>, il cui unico accesso si trova nella citt&agrave; di <span lang="en">Hebeth</span>, nel nucleo di Marte.
              </p>
              <p>
                <span lang="en">Slayer</span> viaggia quindi verso la struttura su Phobos dove spara con la <abbr title="Big Fucking Gun" lang="en">BFG</abbr>, aprendo cos&igrave; un buco sulla superficie marziana
                e permettendo l'accesso a <span lang="en">Hebet</span>. Una volta raggiunto <span lang="en">Sentinel Prime</span>. Una volta raggiunta la destinazione
                <span lang="en">Slayer</span> ha un <span lang="en">flashback</span>: gravemente ferito viene portato da <span lang="en">Deags</span> e obbligato a combattere in un arena.
                Impressionato dalla spietatezza del <span lang="en">Doom Guy</span>, il sacerdote lo conduce dalle Sentinelle, mentre <span lang="en">Khan Maykr</span> indaga la conoscienza
                demoniaca del <span lang="en">Doom Guy</span>.
            </p>
            <img src="IMAGES/doom_eternal_end.jpeg" alt="il personaggio principale che brandisce in mano l'arma finale">
            <p>
                Nel presente <span lang="en">Slayer</span> trova <span lang="en">Deag Grav</span> nell'arena e sconfigge un enorme demone
                chiamato "il Gladiatore", quindi nonostante sappia che sia contro la legge delle Sentinelle uccidere un sacerdote su suolo sacro,
                <span lang="en">Slayer</span> lo uccide lo stesso e ritorna alla fortezza.
              </p>
              <p>
                Una volta tornato, <span lang="en">Khan Maykr</span> spegne la fortezza da remoto per prevenire ulteriori interferenze nei suoi piani e rivela le sue intenzioni di risorgere l'Icona del Peccato: il predatore divora pianeti che distrugger&agrave; l'umanit&agrave;.
                Soppravvissuto ad un imboscata demoniaca usa l'energia <span lang="en">Argent</span> latente del Crogiolo demoniaco per riavviare la fortezza e viaggiare verso <span lang="en">Argent D'Nur</span>
                e recuperare il suo vecchio Crogiolo. Ulteriori <span lang="en">flashback</span> rivelano della battaglia di <span lang="en">Argent D'Nur</span> dove <span lang="en">Maykr</span>, all'epoca
                conosciuto come "il Serafino" intrise il <span lang="en">Doom Guy</span> con abilit&agrave; sovrumane. Recuperata l'elsa del Crogiolo ci viene rivelato che il
                patto tra <span lang="en">Maykr</span> e gli inferi consiste in uno scambio: <span lang="en">Maykr</span> riceve l'energia <span lang="en">Argent</span> demoniaca, prodotta dalle anime umane; e gli inferi ottengono
                nuovi mondi da invadere. Scopriamo inoltre che l'energia <span lang="en">Argent</span> serve a <span lang="en">Maykr</span> per fare sopravvivere la dimensione da cui proviene, <span lang="en">Urdak</span>.
              </p>
              <p>
                Dopo un lungo viaggio trovano un portale per raggiungere <span lang="en">Urdak</span>. Lo <span lang="en">Slayer</span> trova <span lang="en">Maykr</span> e ferma il rituale utilizzando il pugnale
                del Traditore per distruggere il cuore dell'Icona. Libero dal controllo di <span lang="en">Maykr</span>, l'Icona del Peccato si risveglia dal suo stato dormiente e si
                teletrasporta sulla Terra. Con la barriera dimensionale distrutta, i demoni rompono il loro patto e invadono <span lang="en">Urdak</span>. <span lang="en">Maykr</span> combatte lo
                <span lang="en">Slayer</span> e ne esce vincitore, VEGA quindi si sacrifica rimanendo su <span lang="en">Urdak</span> per far s&igrave; che il portale per la Terra rimanga attivo.
                Dopo un intensa battaglia <span lang="en">Slayer</span> uccide l'Icona del Peccato fermando quindi anche l'invasione infernale della Terra.
            </p>
          </section>
        </article>
        <article>
            <h2 class="paragrafo">Gameplay</h2>
            <section>
            <h3 class="lista_titolo" lang="en">Singleplayer:</h3>
            <p>
                Una nuova meccanica di gioco &egrave; la possibilit&agrave; di invadere la partita di un altro giocatore, grazie a una meccanica chiamata "invasione".
                Invasione ti permette di fare squadra con un altro giocatore nella sua partita privata. Un'invasore può cooperare con altri invasori e combattere
                l'<span lang="en">host</span> della partita. C'&egrave; un altra novit&agrave; chiamata "demoni potenziati", dove un demone che ha ucciso il giocatore può tornare
                pi&ugrave; forte di prima, ma se ucciso offre riconpense migliori.
              </p>
              <p>
                Il <span lang="en">Doom Slayer</span> ora possiede un cannone sulle spalle che dopo un <span lang="en">cooldown</span> tra un colpo e l'altro permette di sparare fiamme o granate senza interrompere l'azione, lo <span lang="en">Slayer</span>
                possiede anche un nuovo attacco corpo a corpo. Questo capitolo si concentra soprattutto sulla mobilit&agrave; e sulla possibilit&agrave; di movimento, quindi ora
                i giocatori possiedono anche un rampino che permette di effettuare scatti veloci in avanti e di aggrapparsi ad alti appigli nella mappa.
              </p>
              <p>
                La possibilit&agrave; di alternare armi torna da <span lang="en">DOOM</span> 2016, bilanciata in modo da essere pi&ugrave; comoda per il giocatore.
              </p>
              <p>
                Tornano anche le vite aggiuntive dalla modalit&agrave; <span lang="en">arcade</span> di <span lang="en">DOOM 2016</span> questa volta disponibili anche
                nella campagna <span lang="en">singleplayer</span>, facendo ripartire il giocatore nel punto della morte senza perdite di <span lang="en">loot</span>
                e munizioni.
            </p>
            <h3 class="lista_titolo" lang="en">Multiplayer</h3>
            <p>
                La parte <span lang="en">multiplayer</span> di <span lang="en">DOOM Eternal</span> &egrave; chiamata "modalit&agrave; battaglia" e consiste in un
                <span lang="en">deathmatch</span> assimmetrico 2 VS 1, dove due giocatori possono interpretare una vasta gamma di demoni e sfruttare le loro abilit&agrave;
                per sconfiggere lo <span lang="en">Slayer</span>. Diversamente da <span lang="en">DOOM</span> 2016 le modalit&agrave; <span lang="en">multiplayer</span>
                del gioco sono state sviluppate direttamente da <span lang="en">id Software</span>. Le classiche modalit&agrave; <span lang="en">multiplayer</span> di
                <span lang="en">DOOM</span> vengono riproposte anche in questo capitolo.
            </p>
          </section>
        </article>
        <article>
            <h2 class="paragrafo">Livelli</h2>
            <section>
            <ul class="lista">
                <li>
                    Inferno in terra
                </li>
                <li>
                    Exultia
                </li>
                <li>
                    Base dei cultisti
                </li>
                <li>
                    Base dei <span lang="en">Doom Hunter</span>
                </li>
                <li>
                    Nido di sangue
                </li>
                <li>
                    Complesso <abbr title="Armored Response Coalition" lang="en">ARC</abbr>
                </li>
                <li>
                    Il nucleo di Marte
                </li>
                <li>
                    <span lang="en">Sentinel Prime</span>
                </li>
                <li>
                    Taras Nabad
                </li>
                <li>
                    Nekravol
                </li>
                <li>
                    Nekravol - parte 2
                </li>
                <li>
                    Urdak
                </li>
                <li>
                    Peccato Finale
                </li>
                <li>
                    Fortezza dell'apocalisse
                </li>
            </ul>
            <h3 class="lista_titolo" lang="en">Master Levels</h3>
            <p>
                <span lang="en">DOOM Eternal</span> include speciali livelli denominati <span lang="en">Master Levels</span>, dove vengono riproposti livelli dalla
                campagna principale a cui vengono aggiunti nemici pi&ugrave; forti e il <span lang="en">layout</span> dei livelli viene modificato in modo da offrire un
                esperienza di gioco pi&ugrave; ardua. Al lancio era disponibile solo "Complesso <abbr title="Armored Response Coalition" lang="en">ARC</abbr>" in modalit&agrave; <span lang="en">master level</span> e il livello
                "Base dei Cultisti" era disponibile in questa modalit&agrave; solo con il preorder del gioco. Altri <span lang="en">master levels</span> sono gi&agrave; stati
                confermati e usciranno presto.
            </p>
          </section>
        </article>
    </div>
    <footer id="foot">
      <div id="siteInfo">
        <h1 lang="en">Doom Wiki</h1>
        <p><span lang="en">DoomWiki</span> &egrave; sviluppato da appassionati e ammiratori del videogioco.</p>
        <p><span lang="en">&copy;Doom</span> &egrave; un marchio ragistrato <a href="https://bethesda.net/it/dashboard" target="_blank" lang="en">2022 Bethesda Softworks LLC<span class="screen-reader-only">(apre una nuova finestra, il sito &egrave; in inglese)</span></a>,
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
              <li lang="en">Doom <abbr title="Quinto">V</abbr> (Doom eternal)</li>
            </ul>
          </li>
          <li><a href="stats.php">Armi</a></li>
          <li><a href="trivia.php">Curiosit&agrave;</a></li>
          <li><a href="signup.php">Registrazione</a> (nuovo utente)</li>
          <li><a href="login.php">Accesso</a> (utente gi&agrave; registrato)</li>
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
