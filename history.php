<!DOCTYPE html>
<html lang="it" dir="ltr">
<head>
    <link href="CSS/STYLE_COMMON.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="CSS/STYLE_HISTORY.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="CSS/STYLE_HOME.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="CSS/PRINT.css" rel="stylesheet" type="text/css" media="print" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <meta charset="utf-8">
    <title>DOOM</title>
    <meta name="keywords" content="DOOM, Fun Fact" />
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
        header('location : history.php');
    }
    if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
    ?>
        <form class="cookie-banner" action="history.php" method="post">
            <p>
                Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
                il contenuto e analizzare il traffico di rete.
            </p>
            <a href=cookie_informativa.php>Leggi di più riguardo ai <span lang="en">cookie</span></a>
            <hr>
            <input type="submit" name="CookieAccepted" value="Accetta">
        </form>
    <?php
    }
    ?>
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
                        <li class="NestedListItem CurrentLocation"><a href="history.php">CAPITOLO <abbr title="Primo">I</abbr></a></li>
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
        <script type="text/javascript">
            var trama_btn = document.getElementById("I_nested_list_span");
            var nested_lst = document.getElementById("nstd_lst");
            trama_btn.addEventListener('click', function() {
                nested_lst.classList.toggle("open");
            });
        </script>
    </header>
    <div class="main">
        <h1 id="replace1" lang="en">DOOM</h1>
        <article>
            <h2 class="paragrafo">Un breve riassunto della saga</h2>
            <section>
            <p>
                <span lang="en">Doom </span>(ufficialmente scritto come <span lang="en">DOOM</span> e occasionalmente <span lang="en"> DooM </span> dai fan)
                è il primo videogioco rilasciato della serie e viene considerato uno dei giochi che hanno consolidato il genere
                <abbr lang="en" title="First Person Shooter">FPS</abbr>. Con una trama stile horror fantascientifica il gioco ha introdotto per la prima
                volta le modalità cooperativa e <span lang="en">deathmatch</span> (battaglia a squadre) dandogli il senso che conosciamo oggi e incentivando modifiche
                al gioco stesso da parte dei <span lang="en">fan</span>. Inizialmente è stato rilasciato nel Dicembre del 1993, quando una copia condivisa è stata caricata
                in un server <abbr lang="en" title="File Transfer Protocol">FTP</abbr> dell'università del <span lang="en">Wisconsin</span>. La versione ultimata di <span lang="en">Doom</span>, ovvero
                un aggiornamento di quella originale che comprendeva un quarto episodio, fu rilasciata nel 1995 e venduta al dettaglio. In <span lang="en">Doom</span>,
                il giocatore veste i panni di un <span lang="en">marine</span> spaziale senza nome, chiamato anche <span lang="en">Doomguy</span> dalla community
                prima di essere rinominato nei capitoli successivi <span lang="en">"Doom Slayer"</span>, che dovrà affrontare orde di invasori venuti dall'inferno. Si stima che <span lang="en">Doom</span> sia stato giocato da 15-20 milioni di
                pesone nei due anni seguenti al suo rilascio, rendendo popolare la modalità di gioco, creando un vero e proprio fenomeno di sottocultura videoludica.
                <span lang="en">Doom</span> è stato il pioniere nell'utilizzo di una immersiva interfaccia grafica <abbr title="3 dimensioni">3D</abbr>, ha implementato la
                modalità <span lang="en">multiplayer</span> e supportato gli utenti che potevano avere una propria versione <span lang="en">"custom"</span> del gioco,
                in quanto ogni giocatore poteva aggiungere codice, organizzandolo in archivi di file conosciuti come <abbr lang="en" title="Where's All the Data?">"WADs"</abbr>.
            </p>
            <img src="IMAGES/demonepo.jpg" alt="Raffigurazione di un demone presente in doom 2016">
            <p>
                Negli anni 90' infatti, ogni gioco <abbr title="First Person Shooter">FPS</abbr>, veniva ricondotto immediatamente al genere <span lang="en">Doom</span>, divenuto poi
                <span lang="en">"Doom</span> clone" con accezione dispregiativa. Le sue grafiche e meccaniche violente, associate ad un immaginario quasi satanico,
                hanno reso il gioco soggetto di alcune controversie legali. Il franchise di <span lang="en">Doom</span> ha
                continuato ad esistere negli anni, grazie al rilascio di <span lang="en">Doom</span> <abbr title="Secondo">II</abbr>: <span lang="en">Hell on Earth</span>
                (1994) con numerose espansioni, includendo <span lang="en">Master Levels for Doom</span> <abbr title="Secondo">II</abbr>, e <span lang="en">Final Doom</span>
                (1996). Originariamente il gioco è stato sviluppato in <span lang="en"><abbr title="">DOS</abbr></span>, i giochi della serie, negli anni hanno
                poi subito operazioni di <span lang="en">"porting"</span> verso altre piattaforme. Una volta che il codice sorgente è stato reso pubblico nel 1997,
                sono comparse numerose versioni, poichè i fan hanno cominciato a trasportare il codice su un numero illimitato di dispositivi. La serie ha iniziato a
                far perdere interesse nel momento in cui la tecnologia del motore grafico ha iniziato ad essere ritenuta obsoleta a partire
                dalla seconda metà degli anni 90', anche se i fan hanno continuato a produrre archivi di codice <span lang="en"><abbr lang="en" title="Where's All the Data?"> (WADs)</abbr></span>,
                <span lang="en">speedruns</span> (sfide per finire il gioco nel minor tempo possibile), e modifiche al codice sorgente originale. La serie attirò
                nuovamente l'attenzione della community videoludica nel 2004, con il rilascio di <span lang="en">Doom</span> 3 che integrava una
                nuova interfaccia grafica chiamata <span lang="en">id Tech</span> 4, che modernizzava la telecamera di gioco rendendola simile a quella di una
                moderna telecamera. Nel 2016 poi, è stato sviluppato un <span lang="en">reboot</span>
                della saga, semplicemente denominato <span lang="en">Doom</span>, che consiste in un riadattamento (non proprio fedelissimo) dei due giochi originali,
                con un comparto grafico interamente sviluppato ad hoc, tale adattamento è stato pubblicato dalla <span lang="en">software House Bethesda</span>.
                Nel 2019 poi, è uscito nelle sale cinematografiche <span lang="en">Doom: Annihilation</span>, un film che riprende le tematiche dell'universo del
                videogioco.
                A Marzo 2020, è stato rilasciato <span lang="en">Doom Eternal</span>, il <span lang="en">sequel</span>
                di <span lang="en">Doom</span> (2016).
            </p>
            <img src="IMAGES/DOOM_cover.jpg" alt="Copertina gioco originale">
          </section>
        </article>
        <article>
            <h2 class="paragrafo">Trama</h2>
            <section>
            <p>
                <span lang="en">Doom</span> ha una trama semplice che avanza nel corso del gioco principalmente attraverso
                messaggi mostrati tra un livello e l'altro. Il giocatore prende le parti di un <span lang="en">marine</span>, "uno dei più tosti del pianeta Terra,
                addestrato per l'azione", che è stato deportato su Marte dopo aver assalito un ufficiale che aveva impartito l'ordine di fare fuoco su alcuni civili.
                In questo luogo, il nostro <span lang="en">marine</span> lavora per la <span lang="en">Union Aerospace Corporation</span> <abbr title="Union Aerospace Corporation">(UAC)</abbr>,
                un conglomerato multiplanetario militare, che effettua esperimenti segreti sui viaggi interdimensionali. Di recente il teletrasporto da loro inventato,
                ha mostrato segni di anomalie e instabilità, ma le ricerche continano senza sosta, quando all'improvviso qualcosa va storto e alcune creature infernali,
                spuntano dai teletrasporti nei pianeti <span lang="en">Phobos and Deimos</span>. Dalla base interessata parte subito un'azione difensiva, volta a
                bloccare l'invasione sul nascere, ma la base verrà presto conquistata dai mostri, tutto il personale rimasto ucciso viene traformato in
                <span lang="en">zombie</span>. Un distaccamento militare da Marte parte verso <span lang="en">Phobos</span> per indagare sull'incidente.Il giocatore
                ha la missione di rendere sicuro il perimetro, affinchè la squadra d'assalto possa trasportare le armi pesanti all'interno. La connessione radio cede
                molto presto, così il giocatore si rende conto di essere l'unico sopravvissuto. Essendo impossibilitato a pilotare l'astronave per il ritorno, poichè
                irreversibilmente danneggiata, l'unica via di fuga è combattere attraverso i vari complessi della base lunare.
            </p>
            <img src="IMAGES/final_battle.jpg" alt="scena di copertina di un annuncio riguardo doom 2016">
          </section>
        </article>
        <article>
            <h2 class="paragrafo"><span lang="en">Gameplay</span></h2>
            <section>
            <p>
                <span lang="en">Doom</span> è uno sparatutto in prima persona, con un'impostazione di sfondo che mescola fantascienza e <span lang="en">horror</span>
                (nello stile <span lang="en">weird menace</span>); il gioco si compone di tre episodi, ognuno dei quali si svolge in un luogo generico e
                viene giocato separatamente. L'obiettivo primario di ogni livello è semplice: localizzare l'uscita che conduce alla prossima area di gioco,
                (contrassegnata da una scritta <span lang="en">EXIT</span> rossa), ovviamente sopravvivendo a tutti i pericoli che incontreremo nel nostro percorso.
                Tra gli ostacoli troveremo mostri, barili di rifiuti radioattivi, soffitti che scendono per schiacciare il giocatore e porte bloccate per le quali
                avremo bisogno di una chiave, o di attivare uno <span lang="en">switch</span> che dovrà essere localizzato. I livelli solitamente sono labirintici
                (la minimappa è un aiuto cruciale per poterli navigare), oltretutto, in ogni livello sono presenti stanze segrete in abbondanza che contengono
                <span lang="en">powerups</span> come premio per chi esplora completamente il livello in questione. Una schermata di conteggio alla fine di ogni
                livello, (trane per l'ultimo livello di ogni episodio che descrive parte della trama) aiuta il giocatore per collezionare tutti gli obiettivi
                secondari, per esempio mostrando la percentuale di creature uccise nel livello, o il numero di segreti svelati.
            </p>
            <img src="IMAGES/gameplay.jpg" alt="Scena di gioco dove si vede la famosa pistola al plasma">
            <p>
                A parte la modalità <span lang="en">single-player</span> <span lang="en">Doom</span> supporta due modalità <span lang="en">multiplayer</span>,
                giocabili quando si è all'interno di una rete: una modalità cooperativa, dove un <span lang="en">team</span> di due fino a quattro giocatori,
                fanno squadra per affrontare le legioni infernali, e una modalità <span lang="en">deathmatch</span> dove lo stesso numero di giocatori combattono
                tra di loro. I mostri nemici sono l'elemento di <span lang="en">gameplay</span> predominante in <span lang="en">Doom</span>. Ci sono 10 tipologie
                di mostri, inclusi umani impossessati come demoni dai livelli di forza differenti, i quali vanno dai più deboli, ma onnipresenti,
                <span lang="en">Imps</span> fino ai rossi fluttuanti Cacodemoni e i boss, i quali tendono a sopravvivere a colpi multipli
                anche se il giocatore usa tutte le armi più potenti in suo possesso. I mostri generalmente possiedono una <abbr title="Intelligenza artificiale"><span lang="en">IA</span></abbr>
                molto semplice, e quindi nella maggior parte dei casi, dovranno essere in sovrannumero per poter sconfiggere il giocatore, anche se alle volte,
                la superiorità numerica comporta delle lotte interne fra mostri. L'arsenale di armi messe a disposizione al giocatore era distintivo nel 1993 ed è
                diventato un prototipo per i futuri sparatutto. Il giocatore inizia armato solamente di una pistola e un tirapugni in caso finisse le munizioni,
                ma la maggior parte delle armi disponibili gioco potranno essere raccolte o scovate tramite i segreti, come la motosega,
                un fucile da caccia, una mitragliatrice, un lanciarazzi, una pistola al plasma e il potentissimo BFG9000. Per informazioni più dettagliate,
                ti invitiamo a cliccare sul seguente <a href="stats.php">link</a> per la sezione dedicata alle armi.
                Oltre tutto questo, <span lang="en">Doom</span> ci permette di aquisire diversi <span lang="en">powerups</span> nel corso del gioco quali: uno zaino
                (raddoppia la quantità di munizioni trasportabili), armature, kit medici e strani manufatti alieni che rendono il giocatore invisibile, oppure faranno
                salire il suo livello di salute/armatura oltre i limiti canonici.
            </p>
            <img src="IMAGES/doom-slayer.jpg" alt="immagine raffigurante il protagonista del gioco">
          </section>
        </article>
        <article>
            <h2 class="paragrafo"><span lang="en">Release</span></h2>
            <section>
            <p>
                Il primo episodio distribuito in modalità <span lang="en">shareware</span>, era essenzialmente una demo del gioco che consentiva una facile portabilità,
                e all'epoca lo si trovava in moltissimi modi:
            </p>
            <ul class="lista">
                <li><span lang="en">floppy disk</span>;</li>
                <li>navigando su <span lang="en">Internet</span>;</li>
                <li><abbr lang="en" title="Compact Disk ">CD-ROM;</abbr></li>
            </ul>
            <p>
                Incoraggiando così giocatori e venditori al dettaglio a diffondere il gioco quanto più possibile. Si sitma che nel 1995 la distribuzione
                <span lang="en">shareware</span> di <span lang="en">Doom</span> fosse installata su più di 10 milioni di computer. La versione registrata di
                <span lang="en">Doom</span>, contenente tutti e tre gli episodi, era solo disponibile solo con ordini postali, anche se la maggior parte degli utenti
                non ha acquistato la questa versione, sono state vendute oltre un milione di copie e questa popolarità ha aiutato le vendite dei giochi successivi
                della serie <span lang="en">Doom</span>, che non sono stati rilasciati come <span lang="en">shareware</span>. L'originale Doom alla fine ha ricevuto
                anche un rilascio al dettaglio, quando fu venduto in una versione espansa chiamata <span lang="en">The Ultimate Doom</span>, (aggiungendo un quarto
                episodio).
            </p>
            <p>
                Doom è stato anche ampiamente elogiato dalla stampa videoludica, nel 1994 è stato nominato gioco dell'anno sia da "<span lang="en">PC Gamer</span>"
                che da "<span lang="en">Computer Gaming World</span>". Ha ricevuto il premio per l'eccellenza tecnica da "<span lang="en">PC Magazine</span>" e il premio
                <span lang="en">Best Action Adventure Game</span> dall'<span lang="en">Academy of Interactive Arts & Sciences</span>.
            </p>
            <p>
                Oltre alla natura elettrizzante della campagna <span lang="en">single player</span>, la modalità <span lang="en">deathmatch</span> è stata un fattore importante per la popolarità del gioco.
                <span lang="en">Doom</span> non era il primo a portare un <span lang="en">gameplay</span> dove i giocatori si ritrovavano uno contro uno, vedi:
                <span lang="en">(MIDI Maze, su Atari ST, ne aveva una nel 1987)</span>, ma ridefini il concetto di arena <span lang="en">multiplayer</span>,
                nel mondo del <span lang="en">gaming</span>. E' stato il primo a utilizzare le connessioni Ethernet, e la combinazione di violenza e sangue combattendo
                contro i propri amici ha reso la modalità talmente popolare, da arrivare a coniare il termine <span lang="en">"deathmatching</span>. Grazie alla sua ampia
                distribuzione, <span lang="en">Doom</span> ha aperto la strada verso la <span lang="en">community</span> videoludica mondiale odierna, dove le
                <span lang="en">Software House</span> hanno una grossa attenzione mediatica, e solo in Italia hanno un fatturato di circa 2,2 miliardi di euro.
            </p>
            <img src="IMAGES/motosega.jpg" alt="immagine raffigurante la celebre motosega in azione">
          </section>
        </article>
        <article>
            <h2 class="paragrafo">Note Legali</h2>
            <section>
            <p>
                <span lang="en">Doom</span> era e rimane un prodotto controverso dato l'alto tasso di violenza, <span lang="en">gore</span> e immaginari riferimenti
                satanici. E' stato più volte criticato da organizzazioni cristiane per le sue sfumature diaboliche, (anche se alcuni <span lang="en">fan</span>
                piuttosto religiosi lo difendono in quanto anti-satanico), e ha stimolato la paura verso la realtà virtuale, anche se nella sua forma più arretrata,
                in quanto potrebbe essere usata per simulare uccisioni in maniera molto dettagliata; nel 1994 tutto questo ha portato a dei tentativi, poi falliti,
                da parte di un senatore dello stato di <span lang="en">Washington</span>, Phil Talmadge, di introdurre una licenza obbligatoria per
                usare tecnologie di realtà virtuale. Il gioco è finito sulle prime pagine nuovamente nel 1999, quando è stato collegato al tristemente famoso massacro
                del liceo <span lang="en">Columbine.</span><span lang="en">Doom</span> ha ricevuto il <span lang="en">ban</span> da parte della
                <span lang="de">Bundesprüfstelle für jugendgefährdende Schriften</span>, ovvero un' agenzia tedesca per il controllo di contenuti multimediali dannosi
                per i minori, ciò comporta il fatto che il gioco non possa essere pubblicizzato, venduto, noleggiato e nemmeno regalato a persone minorenni. Questo
                <span lang="en">ban</span> è stato revocato il 31 Agosto 2011, quando <span lang="en">Bethesda Softworks</span>, l'odierno proprietario di
                <span lang="en">id Software</span> ha sostenuto il fatto che le dinamiche e grafice crude del gioco sono state sorpassate di gran lunga dagli
                sparatutto odierni e di conseguenza la violenza rappresentata ha un impatto minore.
            </p>
            <img src="IMAGES/doom-cover.jpeg" alt="scena di una battaglia tra il marine e le orde demoniache">
          </section>
        </article>
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
