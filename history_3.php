<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
    <link href="CSS/STYLE_COMMON.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="CSS/STYLE_HISTORY.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="CSS/PRINT.css" rel="stylesheet" type="text/css" media="print" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <meta charset="utf-8">
    <title> DOOM 3</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="DOOM, wiki, doom 3, trama, gameplay, release, fun fact" />
    <meta name="description" content="Pagina riguardante il terzo capitolo" />
    <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
</head>

<body>
    <?php
    require 'SCRIPTS/.php/database_connection.php';
    include 'SCRIPTS/.php/user.php';
    $user = new User($conn);
    if (
        isset($_POST['CookieAccepted']) &&
        $_POST['CookieAccepted'] == 'Accetta'
    ) {
        setCookie(
            'CookieAccepted',
            'Accetta',
            'time() + (86400 * 30)'
        );
        $_COOKIE['CookieAccepted'] = 'Accetta';
        header('location:history_3.php');
    }
    if (
        !(isset($_COOKIE['CookieAccepted'])) ||
        !($_COOKIE['CookieAccepted'] == 'Accetta')
    ) {
    ?>
        <form class="cookie-banner" action="history_3.php" method="post">
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
                        <li class="NestedListItem CurrentLocation"><a href="history_3.php">CAPITOLO <abbr title="Terzo">III</abbr></a></li>
                        <li class="NestedListItem"><a href="history_2016.php">CAPITOLO <abbr title="Quarto">IV</abbr></a></li>
                        <li class="NestedListItem"><a href="history_eternals.php">CAPITOLO <abbr title="Quinto">V</abbr></a></li>
                    </ul>
                </li>
                <li class="MenuBarItem"><a href="stats.php">STATISTICHE</a></li>
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
                else echo "<img src='IMAGES/ProfilePics/ProfilePicN1.jpg' alt='Doomguy, accedi o registrati!'/>";
                ?>
            </div>
        </nav>
    </header>
    <div class="main">
        <h1 id="replace3" lang="en">DOOM 3</h1>
        <article>
            <h2 class="paragrafo">Riassunto</h2>
            <section>
            <p>
                <span lang="en">Doom</span> 3 &egrave; un videogioco sparatutto in prima persona (<abbr lang="en" title="First Person Shooter">FPS</abbr>), del genere
                horror/fantascientifico, sviluppato da <span lang="en">id Software</span> e pubblicato da <span lang="en">ActiVision</span>.
                Il gioco &egrave; ambientato tra il 15 e il 16 Novembre dell'anno 2145 su Marte, <span lang="en">Doom</span> 3 &egrave; un gioco incentrato sull'horror, a differenza dei precedenti titoli ricchi di azione.
              </p>
              <p>
                <span lang="en">Doom</span> 3 ha subito una lunga fase di progettazione e testing, iniziata nel 2000, con una buona dimostrazione all' <abbr title="Evento di presentazione videogiochi annuale a Los Angeles">E3</abbr> nel 2002, 2003, il gioco &egrave; stato infine rilasciato nell'Agosto del 2004.
                Il gioco &egrave; stato sviluppato per il sistema operativo <span lang="en">Windows</span> e poi ha subito l'operazione di <span lang="en">porting</span> verso Linux nel 2004, cinque mesi dopo &egrave; stato rilasciato per <span lang="en">Mac OS</span>
                e per la console <span lang="en">Xbox</span> (co-sviluppato da <span lang="en">Vicarious Visions</span>).
                Tale versione &egrave; graficamente simile, ma meno dettagliata, dell'originale e supporta la modalit&agrave; a due giocatori cooperativa online.
                Esiste poi un'espansione <span lang="en">Doom</span> 3: <span lang="en">Resurrection of Evil</span>, sviluppata da <span lang="en">Nerve Software</span>
                e co-sviluppata da <span lang="en">id Software</span>, che &egrave; stata rilasciata nell'Aprile 2005, anch'essa portata poi per <span lang="en">Xbox</span> venne rilasciata mesi dopo.
                Un film di <span lang="en">Doom</span> vagamente basato sul franchise, &egrave; stato rilasciato circa sei mesi dopo, il 21 ottobre 2005.
              </p>
              <p>
                <span lang="en">Doom</span> 3 si concentra su un <span lang="en">gameplay</span> pi&ugrave; lento e metodico rispetto al <span lang="en">"run and gun"</span> dei suoi predecessori.
                Ha ricevuto un'opinione positiva da parte della critica per le sue atmosfere paurose e la sua grafica rivoluzionaria, ma &egrave; stato altrettanto criticato principalmente per il suo <span lang="en">gameplay</span>, che essendo pi&ugrave; lento, alla lunga stancava, e per i suoi dettagli horror ricchi di <span lang="fr">cliché</span>.
            </p>
          </section>
        </article>
        <article>
            <h2 class="paragrafo"><span lang="en">Features</span></h2>
            <section>
            <p>
                In accordo con <span lang="en">John Carmack</span> capo del reparto e sviluppatore del motore grafico del gioco, il tripudio di caratteristiche in <span lang="en">Doom</span> 3 sono:
                effetti di luce e ombra unificati, animazioni complesse e <span lang="en">scripting</span> in tempo reale, e una illuminazione delle aree <span lang="en">pixel</span> per <span lang="en">pixel</span> dinamica.
                Oltre questo si aggiunge il fatto che l'interfaccia utente aggiunga interattivit&agrave; extra al gioco stesso, ma il punto cardine del motore grafico di <span lang="en">Doom</span> 3 sta nell'aver unito la computazione degli effetti di luce e buio.
                Tuti i motori grafici <abbr title="3 dimensioni">3D</abbr> compresi <span lang="en"> Quake</span> 3 e <span lang="en">Unreal Tournament</span>,
                processano gli effetti luce/ombra durante la creazione della mappa stessa, che li rendeva estremamente statici alla vista,
                nettamente con il processo utilizzato dal motore di <span lang="en">Doom</span> 3, il quale processa la maggior parte delle sorgenti di luce al volo.
                Questo permette alla luci di proiettare ombre su oggetti non statici quali mostri o macchinari, quest'effetto era impossibile processando le luci durante la creazione della mappa.
                Oltre all'illuminazione e alle ombre dinamiche, il motore di <span lang="en">Doom</span> 3 &egrave; stato il primo di <span lang="en">id Software</span> a fare un uso estensivo del <span lang="en">bump mapping</span>.
                Per creare un'atmosfera pi&ugrave; simile a quella di un film, viene intervallato il gameplay con molte sequenze animate in-game di mostri che tendono un'imboscata al giocatore o semplicemente un agguato.
                Altre caratteristiche importanti del motore di Doom 3 sono l'evidenziazione dettagliata delle <span lang="en">texture</span>,
                la gestione realistica della fisica degli oggetti, una colonna sonora ambientale e suono multicanale.
            </p>
            <img src="IMAGES/doom3-hell.jpg" alt="ambientazione infernale">
          </section>
        </article>
        <article>
            <h2 class="paragrafo">Sviluppo</h2>
            <section>
            <p>
                Nel Giugno del 2000, <span lang="en">John Carmack</span> ha annunciato che stava lavorando ad un <span lang="en">remake</span> di <span lang="en">Doom</span> con la tecnologia di nuova generazione.
                Questo piano si &egrave; rivelato senza il consenso di <span lang="en">id Software</span>.
              </p>
              <p>
                <span lang="en">Kevin Cloud</span> e <span lang="en">Adrian Carmack</span> si opposero con decisione all'idea di realizzare un <span lang="en">remake</span> di <span lang="en">Doom</span>, pensavano che così si stesse riproponendo la classica formula senza portare un qualche tipo di innovazione.
                Comunque dopo la calda reazione del pubblico a <span lang="en">Return to Castle Wolfenstein</span> (un <span lang="en">remake</span> di <span lang="en">Wolfenstein 3D</span>) e i miglioramneti nella tecnologia di <span lang="en">rendering</span>, la maggior parte dei lavoratori accettarono il fatto che un <span lang="en">remake</span>
                di <span lang="en">Doom</span> confrontandosi con <span lang="en">Kevin</span> e <span lang="en">Adrian</span> con un ultimatum: <cite>Lasciateci lavorare o licenziateci.</cite>
                Dopo un confronto ragionevole, si &egrave; arrivati ad un accordo per lavorare a <span lang="en">Doom</span> 3.
              </p>
              <p>
                Il gioco &egrave; stato sviluppato in 4 anni, nel 2001 &egrave; stato mostrato al pubblico per la prima volta con il <abbr lang="en" title="Chief Executive Officer">CEO</abbr> di <span lang="en">Apple</span> <span lang="en">Steve Jobs</span> che ha presentato <span lang="en">John Carmack</span> sul palco, il quale ha presentato qualche immagine di gioco, comprese quelle di <span lang="en">Doom</span> 3.
                &Egrave; stato mostrato nuovamente un <span lang="en">gameplay</span> di 15 minuti durante l' E3 del 2002, che ha portato alla vittoria del premio di quell'edizione.
                Il tutto comincia con una sequenza di demoni e spiriti che vengono rilasciati tramite un portale, una guardia viene posseduta da uno spirito levitando per aria,
                finendo per trasformarsi in uno <span lang="en">zombie</span>.
                Dopo una breve visuale dell'inferno ci si rimette nei panni del nostro <span lang="en">marine</span> in prima persona, il giocatore riprende quindi ad ammazzare qualsiasi cosa si metta sul suo cammino prima di finire le munizioni, rimanendo intrappolato e ucciso da mostri di vario genere tra i quali un <span lang="en">Hell Knight</span> che ci prender&agrave; la testa e se la manger&agrave;.
              </p>
              <p>
                L'anno seguente, un nuovo trailer viene rilasciato sempre in occasione dell' E3, dove venne annunciato tragicamente che il gioco non sarebbe stato pronto per il 2003.
                In accordo con alcuni commenti di <span lang="en">John Carmack</span>, lo sviluppo ha subito dei ritardi, in quanto originariamente l'uscita era pianificata in concomitanza di altri giochi epocali quali <span lang="en">Half-Life</span> e <span lang="en">Halo 2</span>, ma nessuno di questi tre riuscì a rispettare tale scadenza.
            </p>
          </section>
        </article>
        <article>
            <h2 class="paragrafo">Trama</h2>
            <section>
            <p>
                Prima degli eventi del gioco, il progetto originale dell'<abbr lang="en" title="Union Aerospace Corporation">UAC</abbr>, era quello di esplorare il
                pianeta rosso per trasformarlo in un <span lang="en">habitat</span> ospitale per i terrestri, viene così creato un dispositivo denominato <span lang="en">Hydrocon</span>,
                che trasforma l'ossido di ferro (il principale minerale presente su Marte), in ossigeno e idrogeno, andando così a creare un'atmosfera che permetta lo sviluppo di vita sul pianeta.
                Iniziano così i lavori per la costruzione di un insediamento umano detto <span lang="en">Mars City</span>, durante gli scavi vengono alla luce per&ograve; antichi
                artefatti e strutture che rivelano l'esistenza di un'antica civilt&agrave; marziana.
              </p>
              <p>
                Come risposta l' <abbr lang="en" title="Union Aerospace Corporation">UAC</abbr> modifica il progetto iniziale trasformandolo in un vero e proprio sito di scavi archeologici
                con laboratori e strutture disseminate in differenti posizioni del pianeta, il punto di rottura per&ograve;, avviene nel momento in cui si scopre un artefatto, nome in codice U1,
                detto anche il cubo dell'anima, assieme ad alcune tavole di pietra scritte dall'antica civilt&agrave; misteriosa.
              </p>
              <p>
                Queste tavole contengono le informazioni tecniche riguardo un'avanzata tecnologia di teletrasporto, il che cambia irreparabilmente le sorti dello sviluppo tecnologico umano.
                Con la supervisione del pi&ugrave; brillante scienziato dell' <abbr lang="en" title="Union Aerospace Corporation">UAC</abbr>, il creatore dell'<span lang="en">Hydrocon</span>,
                <abbr title="Dottore">Dr.</abbr> <span lang="en">Malcolm Betruger</span> l'<abbr lang="en" title="Union Aerospace Corporation">UAC</abbr> inizia lo sviluppo di tale tecnologia, seguendo le antiche informazioni scritte sulle tavole.
                Esso avviene in una locazione segreta conosciuta come laboratorio Delta, nello stesso momento lo scienziato <span lang="en">Pierce Rogers</span>, che era a capo delle operazioni archeologiche,
                riesce nella traduzione dei geroglifici riportati sulle suddette tavole di pietra, che avvertivano chiunque le avesse ritrovate dei rischi riguardanti l'uso di tale tecnologia, i quali sono stati la causa dell'estinzione della civilt&agrave; marziana.
            </p>
            <img src="IMAGES/doom3_uac.jpg" alt="ambientazione base UAC">
            <p>
                Una volta attivato, il teletrasporto si rivela non essere propriamente tale, in quanto, funziona come un portale per un'altra dimensione.
                Dopo aver effettuato svariati <span lang="en">test</span> con videocamere e cavie non umane (animali), gli scienziati scoprono che questa nuova dimensione era dominata da orribili creature in un ambiente dove il caldo soffocante era perenne.
                Tutto il personale scientifico inizia al pi&ugrave; presto l'esplorazione di questa nuova dimensione, chiunque tornasse per&ograve; riportava gravi danni psicologici che portavano sempre i soggetti ad un' inesorabile morte.
                Quando questi test venivano effettuati, nel laboratorio 3 si stava gi&agrave; provvedendo alla traduzione del monito scritto sulle tavole, ma quando si scoprì la verit&agrave;, era gi&agrave; troppo tardi.
                Il <cite>progetto teletrasporto</cite> era gi&agrave; concentrato sull'esplorazione e lo sfruttamento delle scoperte dell'altra dimensione, come per esempio riportare in vita specie morte e riuscire ad affrontare lunghi viaggi nella dimensione.
                Non molto tempo dopo, l'intera base di Marte ha iniziato ad avere strani problemi con la luce e l'energia, diversi membri del personale hanno segnalato situazioni spaventose, chiedendo di essere trasferiti al largo di Marte.
              </p>
              <p>
                <span lang="en">Betruger</span> stesso divenne ossessionato da questa nuova dimensione, venendo corrotto dal potere e dall'autorit&agrave; che deteneva, usandolo per controllare <span lang="en">Mars City</span>
                e nascondere gli orrori delle sue scoperte dalla Terra.
              </p>
              <p>
                Alcuni scienziati del laboratorio Delta come <span lang="en">Ian McCormick</span> e <span lang="en">Jonathan Ishii</span> ipotizzavano da tempo che la nuova dimensione scoperta, fosse infatti, l'inferno stesso,
                ma erano troppo spaventati per inviare tali teorie alla Terra.
              </p>
              <p>
                Una scienziata per&ograve;, chiamata <abbr title="Dottoressa">Dr</abbr> <span lang="en">Elizabeth McNeil</span>, sfida l'autorit&agrave; di <span lang="en">Betruger</span>
                chiamando il consiglio dell'<abbr lang="en" title="Union Aerospace Corporation">UAC</abbr> e chiedendo di fermare le ricerche del laboratorio Delta.
                Alla scoperta di tali eventi <span lang="en">Betruger</span> riesce ad espellere la dottoressa dal pianeta, e poco dopo, entra lui stesso nel portale.
                Al suo ritorno per&ograve; era una persona diversa, un paio di giorni dopo infatti, il consiglio dell'<abbr lang="en" title="Union Aerospace Corporation">UAC</abbr>
                nomina l'avvocato e consigliere della societ&agrave; <span lang="en">Elliot Swann</span> e la sua guardia del corpo <span lang="en">Jack Campbell</span> per avere un responso sui danni dell'intera operazione su Marte.
                In data 15 Novembre 2145, arrivano a destinazione <span lang="en">Elliot</span> e <span lang="en">Jack</span> a bordo dell'astronave <span lang="en">Darkstar</span>.
            </p>
            <img src="IMAGES/spoiler.jpg" alt="allerta spoiler">
            <p>
                Ancora una volta ci ritroviamo nei panni del <span lang="en">marine</span> senza nome, ora diventato caporale, arrivato sul pianeta a bordo della <span lang="en">Darkstar</span>.
                Il nostro protagonista infatti si trova li in quanto avrebbe dovuto sostituire un altro militare morto durante le operazioni.
              </p>
              <p>
                La sua missione &egrave; quella di ritrovare lo scienziato <span lang="en">Jonathan Ishii</span> che risulta scomparso, visto per l'ultima volta nel centro comunicazioni.
                Nel frattempo <span lang="en">Swann</span> e <span lang="en">Campbell</span> discutono animatamente con <span lang="en">Betruger</span> riguardo i numerosi incidenti avvenuti nella base,
                come per esempio il personale spaventato e le varie voci su ci&ograve; che sta accadendo al laboratorio Delta, a tali accuse <span lang="en">Betruger</span>
                risponde <cite>Presto accadranno cose stupefacenti</cite> e se ne va di scena.
              </p>
              <p>
                Una volta ritrovato <span lang="en">Ishii</span>, egli balbetta qualcosa riguardo l'avvertire immediatamente il laboratorio Delta, subito dopo, l'inferno si scatena
                attraverso il portale principale, dal quale viene emesso un fortissimo impulso elettromagnetico che attraversa l'intera base, disegnando nell'ambiente diversi pentacoli luminosi,
                trasformando il 90% del personale in <span lang="en">zombie</span>, coinvolgendo anche <span lang="en">Ishii</span>.
              </p>
              <p>
                Il personale rimanente verr&agrave; poi sterminato dalle orde demoniache che infestano la base, tranne un manipolo di uomini denominato <span lang="en">Bravo Team</span>.
                Il nostro protagonista ha quindi il compito di riunirsi con il <span lang="en">Bravo Team</span> per lanciare un segnale di soccorso alla flotta spaziale.
                Quando il <span lang="en">marine</span> prende l'ascensore per la sezione amministrativa, origlia una conversazione tra <span lang="en">Swann</span> e <span lang="en">Betruger</span>
                il quale mantiene un atteggiamento pacato, egli sostiene infatti che la situazione &egrave; sotto controllo.
              </p>
              <p>
                Intuendo che <span lang="en">Betruger</span> &egrave; in qualche modo collegato all'invasione <span lang="en">Swann</span> e <span lang="en">Campbell</span> si dirigono verso il centro comunicazioni per prevenire l'arrivo di chiunque altro sul pianeta.
            </p>
            <img src="IMAGES/doom3-enemy.jpg" alt="nemico tipico del gioco">
            <p>
                Lo sforzo del <span lang="en">marine</span> per riunirsi con il <span lang="en">Bravo Team</span> risulta vano in quanto l'inferno inizia a colpire duro, uccidendo o impadronendosi dell'anima dell' intera popolazione umana presente su Marte,
                lasciando in vita solo pochi umani che si barricano all'interno dell'area pi&ugrave; sicura che riescono a trovare.
              </p>
              <p>
                Attraversando la sezione amministrativa e il laboratorio Alpha il <span lang="en">marine</span> incontra molti <span lang="en">zombi</span> e demoni nemici, capitanati da un demone pi&ugrave; potente denominato <span lang="en">Vagary</span>.
                Nel frattempo il <span lang="en">Bravo Team</span> viene attaccato e sterminato da un gruppo di diavoletti, ad eccezione di un unico sopravvissuto che possiede una carta di soccorso che stringe nel pugno prima di morire.
                Quando il protagonista arriva nel luogo del massacro, egli riceve tale tessera dall'unico sopravvissuto, che sar&agrave; ucciso da uno spettro poco dopo.
                Arrivato così al centro comunicazioni, il <span lang="en">marine</span> <span lang="en">Campbell</span>, ha distrutto la <span lang="en">console</span> con la famosissima <abbr lang="en" title="Big Fucking Gun">BFG</abbr> 9000.
                L'unica soluzione &egrave; trasmettere la richiesta di soccorso direttamente dalla torre satellitare, in quel preciso momento <span lang="en">Swann</span> chiede al nostro eroe di non inviare tale richiesta in quanto nessuno &egrave; in grado di capire cosa stia succedendo all'interno della base,
                ci si trova così davanti ad un dubbio morale gigantesco....
              </p>
              <p>
                A prescindere da ci&ograve; il nostro protagonista ha il compito di accedere al laboratorio Delta e fermare l'invasione, dopo aver ricevuto l'autorizzazione di sicurezza per accedervi,
                egli viene intrappolato nel centro di smaltimento rifiuti per mano di <span lang="en">Betruger</span> stesso.
              </p>
              <p>
                <span lang="en">Betruger</span> rivela al nostro eroe il suo piano, dicendo chiaramente di controllare le orde demoniache e che avrebbe gi&agrave; inviato una richiesta d'aiuto
                alla flotta stellare, con l'unico scopo di dirottare le astronavi per attaccare il pianeta Terra.
              </p>
              <p>
                Dopodich&egrave; usa i suoi nuovi poteri, trasformando i militari feriti nel suo squadrone personale, dopo essere scappato dal centro smaltimento rifiuti il <span lang="en">marine</span> senza nome
                riesce ad arrivare all'entrata del laboratorio Delta.
              </p>
              <p>
                Una volta entratovi egli trova <span lang="en">McCormick</span> che gli spiega tutto il contesto antecedente al suo arrivo: gli esperimenti, l'invasione...
                e aiuta il protagonista a teletrasportarsi nel centro di ricerca del settore Delta. <span lang="en">McCormick</span> rivela anche che quando l'invasione ha avuto inizio,
                <span lang="en">Betruger</span> era andato all'inferno in possesso del cubo dell'anima, egli crede infatti che sia proprio quell'artefatto la chiave per scatenare o terminare l'espansione infernale.
                Dopo essere arrivato al centro di ricerca, il protagonista scopre come il settore Delta sia quello che abbia subito maggiormente le conseguenze degli attacchi infernali,
                messaggi insanguinati e cadaveri ricoprono le pareti e il pavimento, una volta superati, si trova davanti al portale principale, e proprio in quel momento, <span lang="en">Betruger</span>
                lo attiva inviando due <span lang="en">Hell Knights</span> a fermarlo, una volta uccisi, il protagonista entra nel portale arrivando così, all'inferno.
            </p>
            <img src="IMAGES/GuardianHell.jpg" alt="guardiano dell'inferno">
            <p>
                Arrivato lì il protagonista si ritrover&agrave; a combattere svariate legioni infernali, senza riuscire a trovare il cubo dell'anima, protetto dal guardiano dell'inferno stesso.
                Dopo averlo combattuto ed uscitone vincitore, il <span lang="en">marine</span> prende possesso dell'artefatto e ritorna su Marte.
              </p>
              <p>
                Poco dopo il suo ritorno, egli viene schernito da <span lang="en">Betruger</span>, che rivela l'esistenza di un altro portale, che sarebbe in grado di
                trasportare milioni di creature demoniache all'interno del nostro universo, tale portale viene chiamato <span lang="en">Hell Gate</span>.
              </p>
              <p>
                Dopo aver attraversato nuovamente alcuni settori del complesso marziano, il <span lang="en">marine</span> si ritrova nel settore 3, dove incontra l'archeologo <span lang="en">Pierce Rogers</span>,
                il quale spiega come l'antica civilt&agrave; marziana sia riuscita ad unire scienza e religione al fine di creare un portale per viaggiare attraverso il sistema solare, Terra compresa.
                Tale portale per&ograve; ha solamente aperto il cancello infernale e scatenato un'invasione.
              </p>
              <p>
                Gli antichi in un ultimo atto di sacrificio, costruirono il cubo, alimentandolo con le loro stesse anime, dopodich&egrave; esso venne affidato al pi&ugrave; potente guerriero marziano per cacciare i demoni da dove sono venuti.
                I restanti abitanti del pianeta seppellirono il loro guerriero con il cubo e qualche tavola di pietra con incisi degli avvertimenti per i futuri organismi che avrebbero ritrovato tale artefatto.
                Dal momento in cui il pianeta era divenuto desolato, gli antichi hanno migrato verso altri pianeti, questo &egrave; il motivo per cui <span lang="en">Rogers</span> sostiene che gli umani siano discendenti diretti di tale civilt&agrave;.
              </p>
              <p>
                Quando il <span lang="en">Marine</span> entra nella base originale di Marte &egrave; gi&agrave; martedì 16 novembre e raggiunge le Caverne del sito archeologico all'alba.
                Dopo aver ripristinato il controllo dell'ascensore principale, procede sottoterra fino alle strutture degli antichi.
                Combattendo contro i demoni, raggiunge il sito di scavo dell'antica civilt&agrave;. Anni di terremoti e il tempo passato stanno iniziando a far crollare
                la struttura.
              </p>
              <p>
                Dopo aver combattuto qualunque demone si intromettesse nel suo cammino, il <span lang="en">Doom Guy</span> finalmente raggiunge il sito di scavo primario e scopre di pi&ugrave; sul cubo dell'anima grazie ad un video informativo dell' <abbr lang="en" title="Union Aerospace Corporation">UAC</abbr> trasmesso su dei <span lang="en">tablet</span>, scopre inoltre anche una sezione dell'inferno che si &egrave; infiltrata nel sottosuolo marziano e nelle viscere di questo pianeta. L&igrave;, incontra l'invulnerabile <span lang="en">Cyberdemon</span>,
                che era a guardia dell'<span lang="en">Hell Gate</span>, un enorme portale per l'inferno. Usando il cubo dell'anima, il <span lang="en">Doom Guy</span> sconfigge il <span lang="en">Cyberdemon</span> e il cubo stesso sigilla per sempre il portale.
              </p>
              <p>
                Successivamente, la squadra <span lang="en">marine</span> di ricognizione Zulu, arriva a <span lang="en">Mars City</span> per mettere al sicuro la base,
                ritrovano l'unico sopravvissuto al laboratorio Delta, e trovano anche il cadavere di <span lang="en">Swann</span> morto per le ferite riportate,
                anch'essi si domandano dove si trovi il dottor <span lang="en">Betruger</span>.
                Il gioco finisce all'inferno, rivelando che ora <span lang="en">Betruger</span> &egrave; divenuto un demone dalle fattezze di un drago chiamato <span lang="en">Maledict</span>.
            </p>
            <img src="IMAGES/cyberdemon.png" alt="boss finale del gioco">
          </section>
        </article>
        <article>
            <h2 class="paragrafo">Gameplay</h2>
            <section>
            <p>
                Il <span lang="en">gameplay</span> di <span lang="en">Doom</span> 3 non &egrave; così frenetico come quello dei precedenti capitoli, tutto il gioco
                ha ambientazioni prettamente <span lang="en">dark</span>, non &egrave; presente nessun visore che permetta l'illuminazione e nessuna arma &egrave; attrezzata con torce.
                Il giocatore pu&ograve; solo usare una torcia che per&ograve; occupa uno slot arma.
              </p>
              <p>
                Gran parte del gioco prende piede nel quartier generale dell'<abbr title="Union Aerospace Corporation">UAC</abbr>, queste sale sono spazi angusti, infestati da demoni che
                sbucano da ogni direzione, nettamente in contrasto per&ograve;, sono i livelli ambientati all'inferno in quanto sono molto pi&ugrave; simili ai capitoli precedenti, i quali presentano
                grandi spazi aperti e usano effetti grafici unici.
              </p>
              <p>
                Ci sono 4 livelli di difficolt&agrave; presenti in questo capitolo, <span lang="en">"Recruit, Marine, Veteran, Nightmare"</span>, i primi tre sono sempre disponibili.
                Nella difficolt&agrave; <span lang="en">Recruit</span> vengono generati molte meno entit&agrave; nemiche, ma sempre un ammontare deciso.
                La principale differenza tra le varie difficolt&agrave; messe a disposizione &egrave; il livello di danno che il giocatore subisce ad ogni colpo ricevuto.
              </p>
              <p>
                Dopo aver completato il gioco a difficolt&agrave; massima, viene sbloccata la difficolt&agrave; "<span lang="en">Nightmare</span>".
                Giocando a questa difficolt&agrave;, il livello di salute decresce di 5 punti ad intervalli di 5 secondi fino a che non raggiunge il livello 25, dove rimane stabile.
                In pi&ugrave; non sono presenti kit medici lungo tutta la durata del gioco; le uniche possibilit&agrave; di curarsi sono le <span lang="en">health stations</span>,
                oppure l'uso del cubo dell'anima.
            </p>
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
