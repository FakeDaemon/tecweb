<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link href="CSS/STYLE_COMMON.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="CSS/STYLE_HISTORY.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="CSS/STYLE_SCREENL.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="CSS/STYLE_SCREENP.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <meta charset="utf-8">
    <title> DOOM Eternals </title>
    <meta name="keywords" content="DOOM, Fun Fact" />
    <meta name="description" content="DOOM Wiki" />
    <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
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
                  <li class="NestedListItem CurrentLocation"><a href="history_eternals.php">CAPITOLO <abbr title="Quinto">V</abbr></a></li>
                </ul>
            </li>
            <li class="MenuBarItem"><a href="stats.php">STATISTICHE</a></li>
            <li class="MenuBarItem"><a href="trivia.php">CURIOSITÀ</a></li>
          </ul>
          <div id="MenuUserWidget">
            <?php
              include 'SCRIPTS/.php/header.php';
              if(isLogged())
                printLoggedMenuWidget();
              else
                printDefaultMenuWidget();
            ?>
          </div>
        </nav>
        <script type="text/javascript">
            var trama_btn = document.getElementById("I_nested_list_span");
            var nested_lst = document.getElementById("nstd_lst");
            trama_btn.addEventListener('click', function() {
                nested_lst.classList.toggle("open");
            });
        </script>
    </header>
    <div class="main">
        <h1 id="replace5" lang="en">DOOM ETERNALS</h1>
        <article id="Introduzione">
            <h2 class="paragrafo">Introduzione</h2>
            <a name="Introduzione"></a>
            <p>
                <span lang="en">Doom Eternal</span> è il <span lang="en">sequel</span> del <span lang="en">reboot</span> del 2016. Il gioco è uscito il 19 Marzo 2020
                per <span lang="en">PlayStation</span> 4, <span lang="en">Xbox One</span>, <abbr title="Personal Computer">PC</abbr> e
                <span lang="en">Google Stadia</span>. La versione per <span lang="en">Nintendo Switch</span> uscii più tardi: l'8 dicembre 2020.
                Successivamente sono stati rilasciati due <abbr title="Downloadable Content">DLC</abbr>: Gli dei antichi - parte uno il 20 ottobre 2020, e parte due il
                18 Marzo 2021. Il gioco è stato chiamato <span lang="en">Doom Eternal</span> per evitare di creare confusione con <span lang="en">Doom</span> 2 del 1984
            </p>
        </article>
        <article id="Trama">
            <h2 class="paragrafo">Trama</h2>
            <a name="Trama"></a>
            <p>
                Un pò di tempo dopo gli eventi di <span lang="en">Doom</span> (2016), la Terra è stata invasa da forze demoniache che hanno spazzato via il 60% della
                popolazione grazie alla corrotta <span lang="en">Union Aerospace Corporation</span>. Gli ultimi umani rimasti sono fuggiti dal pianeta o si sono uniti
                formando ARC, un movimento di resistenza formato per fermare l'invasione e che ora si nasconde dopo aver subito grosse perdite. Il
                <span lang="en">Doom Slayer</span>, precedentemente tradito e teletrasportato fuori dalla base di Marte dal <abbr title="dottore">dr.</abbr> Samuel
                Hayden, fà ritorno grazie a un satellite-fortezza pilotato dall' <abbr title="intelligenza artificiale">AI</abbr> VEGA per sedare l'invasione
                uccidendo i Sacerdoti Infernali: Deags Nilox, Ranak, e Grav. I sacerdoti servono un essere angelico conosciuto come Khan Maykr che vuole sacrificare
                l'umanità. Lo <span lang="en">Slayer</span> si teletrasporta in una città distrutta della California e riesce a uccidere Deag Nilox, ma Khan Maykr
                teletrasporta i due sacerdoti rimanenti in una <span lang="en">location</span> sconosciuta, obbligando lo <span lang="en">Slayer</span> a
                continuare la ricerca. Dopo aver recuperato il localizzatore celestiale, viaggia all'Inferno per recuperare una fonte energetica dalla sentinella caduta
                conosciuta come "Il Traditore" che avverte lo <span lang="en">Slayer</span> del fatto che i giorni dell'umanità sono ormai terminati.
                <span lang="en">Slayer</span> riceve dal Traditore la fonte energetica e una daga speciale. VEGA dirige lo <span lang="en">Slayer</span> verso
                una cittadella in Antartide dove Deag Ranak si è rifugiato, lo <span lang="en">Slayer</span> lo uccide dopo aver sconfitto il suo cacciatore di guardiani
                <span lang="en">Doom</span>.
            </p>
            <img src="IMAGES/doom_eternal_story.jpg" alt="Uno dei nemici principali del gioco">
            <p>
                In risposta, Khan Maykr sposta Deag Grav in una località sconosciuta e accelera l'invasione della Terra. Obbligato a cambiare
                i suoi piani lo <span lang="en">Slayer</span> distrugge il grande nido di sangue nell'Europa centrale, dove l'invasione è cominciata.
                Senza piste per trovare l'ultimo sacerdote Vega suggerisce di cercare il <abbr title="dottore">dr.</abbr> Hayden, che conosce la posizione di Deag Grav.
                Lo <span lang="en">Slayer</span> si apre la strada verso un composto di ARC dove rinviene il guscio robotico di Hayden e il crogiolo, prima di affrontare
                un Predatore, sentinella demoniaca inviata a fermarlo. Mentre scaricano la coscienza di Hayden nella fortezza scoprono la posizione dell'ultimo sacerdote,
                nascosto su <span lang="en">Sentinel Prime</span>, il cui unico accesso si trova nella città di Hebeth, nel nucleo di Marte.
                <span lang="en">Slayer</span> viaggia quindi verso la struttura su Phobos dove spara con la BFG 10000, aprendo così un buco sulla superficie marziana
                e permettendo l'accesso a Hebet. Una volta raggiunto <span lang="en">Sentinel Prime</span>. Una volta raggiunta la destinazione
                <span lang="en">Slayer</span> ha un <span lang="en">flashback</span>: gravemente ferito viene portato da Deags e obbligato a combattere in un arena.
                Impressionato dalla spietatezza del <span lang="en">Doomguy</span>, il sacerdote lo conduce dalle Sentinelle, mentre Khan Maykr indaga la conoscenza
                demoniaca del <span lang="en">Doomguy</span>.
            </p>
            <img src="IMAGES/doom_eternal_end.jpeg" alt="il personaggio principale che brandisce in mano l'arma finale">
            <p>
                Nel presente <span lang="en">Slayer</span> trova Deag Grav nell'arena e sconfigge un enorme demone
                chiamato "il Gladiatore", quindi nonostante sappia che sia contro la legge delle Sentinelle uccidere un sacerdote su suolo sacro,
                <span lang="en">Slayer</span> lo uccide lo stesso e ritorna alla fortezza. Una volta tornato, Khan Maykr spegne la fortezza da remoto per prevenire
                ulteriori interferenze nei suoi piani e rivela le sue intenzioni di risorgere l'Icona del Peccato: il predatore divora pianeti che distruggerà l'umanità.
                Soppravvissuto ad un imboscata demoniaca usa l'energia Argent latente del Crogiolo demoniaco per riavviare la fortezza e viaggiare verso Argent d'Nur
                e recuperare il suo vecchio Crogiolo. Ulteriori <span lang="en">flashback</span> rivelano della battaglia di Argent D'Nur dove Maykr, all'epoca
                conosciuto come "il Serafino" intrise il <span lang="en">Doomguy</span> con abilità sovrumane. Recuperata l'elsa del Crogiolo ci viene rivelato che il
                patto tra Maykrs e gli inferi consiste in uno scambio: Maykrs riceve l'energia Argent demoniaca, prodotta dalle anime umane; e gli inferi ottengono
                nuovi mondi da invadere. Scopriamo inoltre che l'energia Argent serve a Maykrs per fare sopravvivere la dimensione da cui proviene, Urdak.
                Dopo un lungo viaggio trovano un portale per raggiungere Urdak. Lo <span lang="en">Slayer</span> trova Maykrs e ferma il rituale utilizzando il pugnale
                del Traditore per distruggere il cuore dell'Icona. Libero dal controllo di Maykrs, l'Icona del Peccato si risveglia dal suo stato dormiente e si
                teletrasporta sulla Terra. Con la barriera dimensionale distrutta, i demoni rompono il loro patto e invadono Urdak. Maykrs combatte lo
                <span lang="en">Slayer</span> e ne esce vincitore, VEGA quindi si sacrifica rimanendo su Urdak per far si che il portale per la Terra rimanga attivo.
                Dopo un intensa battaglia <span lang="en">Slayer</span> uccide l'Icona del Peccato fermando quindi anche l'invasione infernale della Terra.
            </p>
        </article>
        <article id="Gameplay">
            <h2 class="paragrafo">Gameplay</h2>
            <a name="Gameplay"></a>
            <h3 class="lista_titolo" lang="en">Singleplayer:</h3>
            <p>
                Una nuova meccanica di gioco è la possibilità di invadere la partita di un altro giocatore, grazie a una meccanica chiamata "invasione".
                Invasione ti permette di fare squadra con un altro giocatore nella sua partita privata. Un'invasore può cooperare con altri invasori e combattere
                l'<span lang="en">host</span> della partita. C'è un altra novità chiamata "demoni potenziati", dove un demone che ha ucciso il giocatore può tornare
                più forte di prima, ma se ucciso offre riconpense migliori. Il <span lang="en">Doom Slayer</span> ora possiede un cannone sulle spalle che dopo un
                <span lang="en">cooldown</span> tra un colpo e l'altro permette di sparare fiamme o granate senza interrompere l'azione, lo <span lang="en">Slayer</span>
                possiede anche un nuovo attacco corpo a corpo. Questo capitolo si concentra soprattutto sulla mobilità e sulla possibilità di movimento, quindi ora
                i giocatori possiedono anche un rampino che permette di effettuare scatti veloci in avanti e di aggrapparsi ad alti appigli nella mappa.
                La possibilità di alternare armi torna da <span lang="en">DOOM 2016</span>, bilanciata in modo da essere più comoda per il giocatore.
                Tornano anche le vite aggiuntive dalla modalità <span lang="en">arcade</span> di <span lang="en">DOOM 2016</span> questa volta disponibili anche
                nella campagna <span lang="en">singleplayer</span>, facendo ripartire il giocatore nel punto della morte senza perdite di <span lang="en">loot</span>
                e munizioni.
            </p>
            <h3 class="lista_titolo" lang="en">Multiplayer</h3>
            <p>
                La parte <span lang="en">multiplayer</span> di <span lang="en">DOOM Eternal</span> è chiamata "modalità battaglia" e consiste in un
                <span lang="en">deathmatch</span> assimmetrico 2 VS 1, dove due giocatori possono interpretare una vasta gamma di demoni e sfruttare le loro abilità
                per sconfiggere lo <span lang="en">Slayer</span>. Diversamente da <span lang="en">DOOM</span> 2016 le modalità <span lang="en">multiplayer</span>
                del gioco sono state sviluppate direttamente da <span lang="en">ID Software</span>. Le classiche modalità <span lang="en">multiplayer</span> di
                <span lang="en">DOOM</span> vengono riproposte anche in questo capitolo.
            </p>
        </article>
        <article id="Livelli">
            <h2 class="paragrafo">Livelli</h2>
            <a name="Livelli"></a>
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
                    Complesso ARC
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
                campagna principale a cui vengono aggiunti nemici più forti e il <span lang="en">layout</span> dei livelli viene modificato in modo da offrire un
                esperienza di gioco più ardua. Al lancio era disponibile solo "Complesso ARC" in modalità <span lang="en">master level</span> e il livello
                "Base dei Cultisti" era disponibile in questa modalità solo con il preorder del gioco. Altri <span lang="en">master levels</span> sono già stati
                confermati e usciranno presto.
            </p>
        </article>
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
