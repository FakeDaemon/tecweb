<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="CSS/STYLE_HISTORY.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="CSS/STYLE_SCREENL.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="CSS/STYLE_SCREENP.css" rel="stylesheet" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title> DOOM 2 </title>
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
    header('location : history_2.php');
  }
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
  ?>
    <form class="cookie-banner" action="history_2.php" method="post">
      <p>
        Il nostro sito utilizza dei <span lang="en">cookie</span> per personalizzare
        il contenuto e analizzare il traffico di rete.</br>
        <a href=cookie_informativa.php>Leggi di più riguardo ai <span lang="en">cookie</span></a></br>
      </p>
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
            <li class="NestedListItem"><a href="history.php">CAPITOLO <abbr title="Primo">I</abbr></a></li>
            <li class="NestedListItem CurrentLocation"><a href="history_2.php">CAPITOLO <abbr title="Secondo">II</abbr></a></li>
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
    <h1 id="replace2" lang="en">DOOM 2</h1>
    <article id="Riassunto">
      <h2 class="paragrafo">Riassunto</h2>
      <a name="Riassunto"></a>
      <p>
        <span lang="en">Doom</span> 2 (anche conosciuto come <span lang="en">Doom 2 Hell On Earth</span>) è il sequel del grande classico
        <a href="history.html"><span lang="en">Doom</span></a>, è stato rilasciato il 30 Settembre 1984.
      </p>
    </article>
    <article id="Trama">
      <h2 class="paragrafo">Trama</h2>
      <a name="Trama"></a>
      <p class="history">
        Il giocatore ancora una volta entra nei panni del <span lang="en">Marine</span> solitario, un eroe senza nome, che, è stato l'unico sopravvissuto dopo gli eventi
        accaduti su Marte di <span lang="en">Doom</span>.
        Fa così ritorno verso la Terra quando si accorge di un'inesorabile verità...scopre infatti che la Terra è stata invasa (era stato fatto intendere nel finale di del gioco precedente).

        Con tutte le maggiori metropoli terrestri ridotte in cumuli di rovine, i rimanenti <span lang="en">leader</span> della Terra stanno progettando un piano di evacuazione mondiale,
        per salvare i sopravvissuti della terra tramite l'uso di navicelle spaziali.
        Purtroppo però, lo spazioporto è l'unica via di fuga per le navi, che è controllato da una legione armata di demoni.
        Tutto quel che resta dell'esercito mette in atto un assalto disperato ma vengono decimati....solo il giocatore rimane in vita.

        Il <span lang="en">marine</span> riesce così ad entrare nel porto stellare infestato, uccidendo ogni demone che incontra sulla propria strada,
        e uccide tutta la legione da solo, l'umanità riesce così a mettere in azione il piano e fuggire....ma il nostro <span lang="en">Marine</span> ha qualcos'altro in mente.

        Si viene a scoprire infatti che la sorgente dell'invasione infernale è proprio la città natale del nostro giocatore, torna così a combattere,
        e distrugge la sorgente dell'invasione e tutte le creature a sua protezione.
        Trova però anche un altro portale diretto all'inferno.

        Per chiuderlo, il nostro eroe dovrà rientrare all'inferno e stoppare l'invasione.
        Dopo aver percorso la sua superficie contorta,
        il Marine riesce ad affrontare l'Icona del Peccato (<span lang="en">Icon of Sin</span> nella lingua originale), un gigantesco demone, e lo uccide.
        La sua morte raccapricciante provoca devastazione all'Inferno,
        e il portale per la Terra viene così sigillato.
      </p>
      <img src="IMAGES/chaingun.jpg" alt="immagine di gioco con mitragliatore">
    </article>
    <article id="Gameplay">
      <h2 class="paragrafo">Gameplay</h2>
      <a name="Gameplay"></a>
      <p class="history">
        <span lang="en">Doom</span> <abbr title="due">II</abbr> non è un gioco drammaticamente differente rispetto al suo predecessore.
        Non ci sono state importanti migliorie tecnologiche ne grafiche;
        il <span lang="en">gameplay</span> consiste sempre nel navigare attraverso livelli non lineari, trovando le chiavi per aprire alle aree successive, uccidendo più mostri possibile.

        Rispetto al suo precedessore, il gioco prende luogo in una singola sequenza di livelli collegati, con brevi messaggi testuali tra un livello e l'altro, mentre in <span lang="en">Doom</span> i livelli erano racchiusi in 3 grandi episodi
        e un quarto episodio <span lang="en">bonus</span> contenente un interludio testuale dopo aver battuto l'ottavo livello di ogni episodio.
        Durante il tempo d'attesa tra un livello e l'altro in <span lang="en"> Doom</span> 2, viene visualizzata una semplice immagine di background, mentre in <span lang="en">Doom</span> veniva visualizzata una mappa.
        Un'altra differenza sta nel fatto che il giocatore può tenere le armi che trova in un livello anche negli altri invece che partire da zero ad ogni nuovo livello
        a meno che non muoia ovviamente, cosa che non era supportata dal suo predecessore.

        Questo <span lang="en">Level Desing</span> è solo vagamente basato sulle aree nelle quali il giocatore è obbligato ad andare, esistono infatti un sacco di stanze segrete
        e di <span lang="en">Easter Egg</span>.
        I primi tre livelli sono ambientati all'interno del porto stellare, successivamente si passerà a delle aree cittadine in rovina finchè si cerca la sorgente dell'invasione,
        i livelli hanno un <span lang="en">look</span> urbano somigliante a delle località terrestri.
        Verso la fine del gioco, l' inferno emerge nella sua vera forma, e nei livelli finali entra in scena con un aspetto da incubo, molto simile all'inferno di Dante
        ricolmo di lava e avvolto dalle caratteristiche fiamme.
        Vengono inclusi nuovi nemici quali:
      </p>
      <img src="IMAGES/supershotgun.png" alt="immagine raffigurante la nuova arma">
      <table class="npc_table">
        <thead class="npc_head">
          <tr class="tab_title">
            <th colspan="2">
              NPC
            </th>
          </tr>
          <tr class="tab_subtitle">
            <th>Nome</th>
            <th>Foto</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="npc_name"><span lang="en">Heavy Weapon Dude (Chaingunner)</span></th>
            <th><img class="npc" src="IMAGES/HWD.png" alt="Tizio col mitragliatore pesante"></th>
          </tr>
          <tr>
            <th class="npc_name"><span lang="en">Hell Knight</span></th>
            <th><img class="npc" src="IMAGES/Hellknight.png" alt="Cavaliere infernale"></th>
          </tr>
          <tr>
            <th class="npc_name"><span lang="en">Mancubus</span></th>
            <th><img class="npc" src="IMAGES/Macunbus.png" alt="Grosso mostro spara laser"></th>
          </tr>
          <tr>
            <th class="npc_name"><span lang="en">Revenant</span></th>
            <th><img class="npc" src="IMAGES/Revenant.png" alt="Scheletro"></th>
          </tr>
          <tr>
            <th class="npc_name"><span lang="en">Arachnotron</span></th>
            <th><img class="npc" src="IMAGES/Spiderdemon.png" alt="Ragno meccanico"></th>
          </tr>
          <tr>
            <th class="npc_name"><span lang="en">Pain Elemental</span></th>
            <th><img class="npc" src="IMAGES/Pain-Element.png" alt="Essere volante spara fuoco"></th>
          </tr>
          <tr>
            <th class="npc_name"><span lang="en">Archvile</span></th>
            <th><img class="npc" src="IMAGES/Archvile.png" alt="Alto sacerdote demoniaco infernale"></th>
          </tr>
        </tbody>
      </table>
      <p class="history">
        Essendo più vario ed innovativo rispetto al primo capitolo, l'introduzione di questa serie di nemici ha cambiato notevolmente le meccaniche del <span lang="en">gameplay</span> relativo alla modalità <span lang="en">single player</span>.
        Alcuni <span lang="en">Eater Egg</span> vengono ripresi dal gioco <span lang="en">cult</span> di <span lang="en">id Software</span> <span lang="de">Wolfenstein <abbr title="3 dimensioni">3D</span></span>,
        in due livelli segreti i nemici avranno le sembianze della guardia tedesca classica del gioco, tornando indietro nel tempo con il design e la musica.
        L'unica arma che viene aggiunta è il <span lang="en">super shotgun</span> (una doppietta a canne mozze).
        Viene aggiunto inoltre un altro <span lang="en">powerup</span> la megasfera: intrisa di potere demoniaco porta al massimo la salute del giocatore e aumenta il livello di corazza al 200%.
        Alcune aggiunte sono ovviamente decorative quali lampade e pezzi mutilati di vari umanodi e demoni, altre quali i barili esplosivi sono interattive in quanto una volta che il giocatore sparerà ad uno di questi barili, esploderà causando seri danni nell'area circostante.
        <span lang="en">Doom</span> 2 richiede una quantità leggermente maggiore di risorse hardware rispetto al suo predecessore, poichè ha livelli più grandi e un maggior numero di nemici in essi,ma con i processori attuali il gioco gira tranquillamente su quasi tutti i computer.
      </p>
    </article>
    <article id="Release">
      <h2 class="paragrafo">Release</h2>
      <a name="Release"></a>
      <p class="history">
        <span lang="en">Doom</span><abbr title="Secondo">II</abbr>, ha venduto circa due milioni di copie una volta immesso sul mercato, diventando così il prodotto più venduto per la <span lang="en">Software House</span>
        <span lang="en">id Software</span> fino al 2012, quando, viene battuto dal gioco <span lang="en">Rage</span>.
        Sono stati elogiati dalla critica i suoi nuovi e vari nemici e il suo design innovativo della mappa, che mirava a essere più non lineare rispetto al suo predecessore.
        Ha anche introdotto al mondo dei giochi <abbr lang="en" title="First Person Shooter">FPS</abbr> <span lang="en">Multiplayer</span> in <abbr lang="en" title="Map 01">MAP01</abbr>: <span lang="en">"Entryway"</span>, che è considerata una delle migliori mappe <span lang="en">deathmatch</span> mai pubblicate,
        anche se alcuni sostengono che <abbr lang="en" title="Map 07">MAP07</abbr>: <span lang="en">Dead Simple (Doom <abbr title="Secondo">II</abbr>)</span> avrebbe il titolo di "miglior livello di <span lang="en">deathmatch</span>".

        In generale <span lang="en">Doom</span><abbr title="Secondo">II</abbr> è stato giudicato positivamente dalla <span lang="en">gaming-community</span>,
        ma è stato ritenuto deludente in alcune sue aree, le lamentele più ricevute riguardano la mancanza di nuove e importanti funzionalità e il <span lang="en">level design</span> troppo omogeneo, alle volte quasi squallido,
        specialmente se messo a confronto di giochi usciti poco dopo quali <span lang="en">Duke Nukem <abbr title="3 dimensioni">3D</abbr></span> e <span lang="en">Star Wars : Dark Forces</span>.
      </p>
      <img lang="en" src="IMAGES/star wars.jpg" alt="Scena di gioco di star wars dark forces">
      <img lang="en" src="IMAGES/duke nuke,.jpg" alt="Scena di gioco di duke nukem">
      <p class="history">
        Diversamente dal capitolo principale, il sequel non ha avuto versioni demo o condivise, è stato direttamente venduto al dettaglio.
        <span lang="en">Doom</span><abbr title="Secondo">II</abbr> era quindi anche conosciuto come la versione commerciale del gioco, mentre la versione registrata era disponibile solo per corrispondenza.
        Come <span lang="en">Doom</span><span lang="en">Doom</span><abbr title="Secondo">II</abbr>, ha ricevuto molte richieste di <span lang="en">porting</span> del gioco su altre piattaforme accreditate quali:
        il classico <span lang="en">Mac</span>, <span lang="en">PlayStation</span>, <span lang="en">Sega Saturn</span>, <span lang="en">Game Boy Advance</span> e <span lang="en">Xbox</span>.
        <span lang="en">Doom</span><abbr title="Secondo">II</abbr> è stato poi rilasciato nuovamente nell'edizione <span lang="en">Doom 3 BFG</span>, dove ogni riferimento nazista è stato modificato nei livelli 31 e 32.
      </p>
    </article>
    <article id="Note Legali">
      <h2 class="paragrafo">Note Legali</h2>
      <a name="Note Legali"></a>
      <p class="history">
        In accordo con la legge tedesca <span lang="dec">"Strafgesetzbuch"</span> 86a, <cite>"l'utilizzo di simbologie incostituzioniali è poibito al di fuori di determinati contesti quali,
          ricerca, insegnamento e altro"</cite>.
        Poichè in due livelli segreti chiamati <span lang="dec">"<strong>Wolfenstein</strong>"</span> e <span lang="dec">"<strong>Grosse</strong>"</span>, appaiono simbologie filo-naziste quali svastiche e soldati <abbr lang="dec" title="Schutzstaffel">SS</abbr>,
        la versione tedesca di <span lang="en">Doom</span><abbr title="Secondo">II</abbr> non contiene tali livelli, evitando così che il prodotto possa diventare il soggetto di procedure legali per le quali esso potrebbe
        venire ristretto o addirittura bandito dal commercio.
        Questo imponeva che fosse proibita la vendita, noleggio o scambio del gioco tra gli appassionati, rendendo quasi illegale anche solo il possesso del gioco stesso.

        Il 31 Dicember 1994, il gioco venne messo nell'<span lang="dec">Index of the Bundesprüfstelle für jugendgefährdende Schriften</span>, che significa che il gioco non può essere pubblicizzato,
        venduto o noleggiato e anche solamente dato a soggetti minori.
        Questa restrizione verrà applicata a tutte le versioni del gioco tranne quella per la <span lang="en">console Game Boy Advance</span>.

        La versione tedesca è leggermente inferiore rispetto a quella standard in termini di dimensione, come risultato della somma dei contenuti rimossi.
        Esistono però vari trucchi o <span lang="en"><strong>"cheats"</strong></span> che permettono di sbloccare i livelli segreti di ogni mappa, in questa versione, non appena il giocatore prova ad utilizzare tali trucchi,
        il gioco si arresta improvvisamente poichè il codice riguardante i livelli segreti è ancora presente nel sorgente, solamente non viene visualizzato nell'interfaccia grafica.

        A seguito di un appello di <span lang="en">Bethesda Softworks</span> (ora proprietaria di <span lang="en">ID Software</span>)<span lang="en"> Doom</span> e <span lang="en">Doom</span><abbr title="Secondo">II</abbr> sono stati presi
        dall'<span lang="dec">Index of Bundesprüfstelle für jugendgefährende Medien</span> <abbr lang="dec" title="Bundesprüfstelle für jugendgefährende Medien">(BPjM)</abbr>.
        La restrizione sui due giochi è scaduta il 31 agosto 2011 a seguito di una riunione del <abbr lang="dec" title="Bundesprüfstelle für jugendgefährende Medien">BPjM</abbr>.
        La decisione si basava principalmente sul fatto che nel contesto dei videogiochi moderni, la violenza rappresentata in <span lang="en">Doom</span> e
        <span lang="en">Doom</span><abbr title="Secondo">II</abbr> non può essere descritta come realistica in più la sua grafica pixelata lo rende più cartone animato in natura.
        Questo non includeva la versione di <span lang="en">Doom</span><abbr title="Secondo">II</abbr> contenente i due livelli <span lang="dec">Wolfenstein</span> con le sue svastiche e soldati <abbr lang="dec" title="Schutzstaffel">SS</abbr>.

        Nel 2019, <span lang="en">Doom</span><abbr title="Secondo">II</abbr> è stato rimosso da tale indice assieme a <span lang="dec">Wolfenstein</span><abbr title="3 dimensioni">3D</abbr>, e sono disponibili in Germania senza alcuna restrizione.
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
