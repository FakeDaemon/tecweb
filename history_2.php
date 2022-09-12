<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="CSS/STYLE_HISTORY.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="CSS/PRINT.css" rel="stylesheet" type="text/css" media="print" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
  <meta charset="utf-8">
  <title> DOOM 2 </title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="keywords" content="DOOM, wiki, doom 2, trama, gameplay, release, fun fact" />
  <meta name="description" content="Pagina riguardante il secondo capitolo" />
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
    header('location:history_2.php');
  }
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
  ?>
    <form class="cookie-banner" action="history_2.php" method="post">
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
            <li class="NestedListItem CurrentLocation"><a href="history_2.php">CAPITOLO <abbr title="Secondo">II</abbr></a></li>
            <li class="NestedListItem"><a href="history_3.php">CAPITOLO <abbr title="Terzo">III</abbr></a></li>
            <li class="NestedListItem"><a href="history_2016.php">CAPITOLO <abbr title="Quarto">IV</abbr></a></li>
            <li class="NestedListItem"><a href="history_eternals.php">CAPITOLO <abbr title="Quinto">V</abbr></a></li>
          </ul>
        </li>
        <li class="MenuBarItem"><a href="stats.php">STATISTICHE</a></li>
        <li class="MenuBarItem"><a href="trivia.php">CURIOSIT&Agrave;;</a></li>
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
  </header>
  <div class="main">
    <h1 id="replace2" lang="en">DOOM 2</h1>
    <article>
      <h2 class="paragrafo">Riassunto</h2>
      <section>
      <p>
        <span lang="en">Doom</span> 2 (anche conosciuto come <span lang="en">Doom 2 Hell On Earth</span>) &egrave; il sequel del grande classico
        <a href="history.html"><span lang="en">Doom</span></a>, &egrave; stato rilasciato il 30 Settembre 1984.
      </p>
     </section>
    </article>
    <article>
      <h2 class="paragrafo">Trama</h2>
      <section>
      <p>
        Il giocatore ancora una volta entra nei panni del <span lang="en">Marine</span> solitario, un eroe senza nome, che &eacute; stato l'unico sopravvissuto dopo gli eventi
        accaduti su Marte di <span lang="en">Doom</span>.
        Fa cos&igrave; ritorno verso la Terra quando si accorge di un'inesorabile verit&agrave;...scopre infatti che la Terra &egrave; stata invasa (era stato fatto intendere nel finale del gioco precedente).
      </p>
      <p>
        Con tutte le maggiori metropoli terrestri ridotte in cumuli di rovine, i rimanenti <span lang="en">leader</span> della Terra stanno progettando un piano di evacuazione mondiale,
        per salvare i sopravvissuti della terra tramite l'uso di navicelle spaziali.
        Purtroppo per&ograve;, lo spazioporto &egrave; l'unica via di fuga per le navi, che &egrave; controllato da una legione armata di demoni.
        Tutto quel che resta dell'esercito mette in atto un assalto disperato ma vengono decimati....solo il giocatore rimane in vita.
      </p>
      <p>
        Il <span lang="en">marine</span> riesce così ad entrare nel porto stellare infestato, uccidendo ogni demone che incontra sulla propria strada,
        e uccide tutta la legione da solo, l'umanit&agrave; riesce così a mettere in azione il piano e fuggire.... ma il nostro <span lang="en">Marine</span> ha qualcos'altro in mente.
      </p>
      <p>
        Si viene a scoprire infatti che la sorgente dell'invasione infernale &egrave; proprio la citt&agrave; natale del nostro giocatore, torna cos&igrave; a combattere,
        e distrugge la sorgente dell'invasione e tutte le creature a sua protezione.
        Trova per&ograve; anche un altro portale diretto all'inferno.
      </p>
      <p>
        Per chiuderlo, il nostro eroe dovr&agrave; rientrare all'inferno e stoppare l'invasione.
        Dopo aver percorso la sua superficie contorta,
        il Marine riesce ad affrontare l'Icona del Peccato (<span lang="en">Icon of Sin</span> nella lingua originale), un gigantesco demone, e lo uccide.
        La sua morte raccapricciante provoca devastazione all'Inferno,
        e il portale per la Terra viene così sigillato.
      </p>
      <img src="IMAGES/chaingun.jpg" alt="immagine di gioco con mitragliatore">
    </section>
    </article>
    <article>
      <h2 class="paragrafo">Gameplay</h2>
      <section>
      <p>
        <span lang="en">Doom</span> <abbr title="due">II</abbr> non &egrave; un gioco drammaticamente differente rispetto al suo predecessore.
        Non ci sono state importanti migliorie tecnologiche ne grafiche;
        il <span lang="en">gameplay</span> consiste sempre nel navigare attraverso livelli non lineari, trovando le chiavi per aprire alle aree successive, uccidendo pi&ugrave; mostri possibile.
      </p>
      <p>
        Rispetto al suo precedessore, il gioco prende luogo in una singola sequenza di livelli collegati, con brevi messaggi testuali tra un livello e l'altro, mentre in <span lang="en">Doom</span> i livelli erano racchiusi in 3 grandi episodi
        e un quarto episodio <span lang="en">bonus</span> contenente un interludio testuale dopo aver battuto l'ottavo livello di ogni episodio.
        Durante il tempo d'attesa tra un livello e l'altro in <span lang="en"> Doom</span> 2, viene visualizzata una semplice immagine di background, mentre in <span lang="en">Doom</span> veniva visualizzata una mappa.
        Un'altra differenza sta nel fatto che il giocatore pu&ograve; tenere le armi che trova in un livello anche negli altri invece che partire da zero ad ogni nuovo livello
        a meno che non muoia ovviamente, cosa che non era supportata dal suo predecessore.
      </p>
      <p>
        Questo <span lang="en">Level Desing</span> &egrave; solo vagamente basato sulle aree nelle quali il giocatore &egrave; obbligato ad andare, esistono infatti un sacco di stanze segrete
        e di <span lang="en">Easter Egg</span>.
      </p>
      <p>
        I primi tre livelli sono ambientati all'interno del porto stellare, successivamente si passer&agrave; a delle aree cittadine in rovina finch&egrave; si cerca la sorgente dell'invasione,
        i livelli hanno un <span lang="en">look</span> urbano somigliante a delle localit&agrave; terrestri.
        Verso la fine del gioco, l'inferno emerge nella sua vera forma, e nei livelli finali entra in scena con un aspetto da incubo, molto simile all'inferno di Dante
        ricolmo di lava e avvolto dalle caratteristiche fiamme.
        Vengono inclusi nuovi nemici quali:
      </p>
      <img src="IMAGES/supershotgun.png" alt="immagine raffigurante la nuova arma">
      <table class="npc_table">
        <caption class="tab_title">NPC</caption>
        <thead>
          <tr class="tab_subtitle">
            <th scope="col">Nome</th>
            <th scope="col">Foto</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" class="npc_name"><span lang="en">Heavy Weapon Dude (Chaingunner)</span></th>
            <td><img class="npc" src="IMAGES/HWD.png" alt="Tizio col mitragliatore pesante"></td>
          </tr>
          <tr>
            <th scope="row" class="npc_name"><span lang="en">Hell Knight</span></th>
            <td><img class="npc" src="IMAGES/Hellknight.png" alt="Cavaliere infernale"></td>
          </tr>
          <tr>
            <th scope="row" class="npc_name"><span lang="en">Mancubus</span></th>
            <td><img class="npc" src="IMAGES/Macunbus.png" alt="Grosso mostro spara laser"></td>
          </tr>
          <tr>
            <th scope="row" class="npc_name"><span lang="en">Revenant</span></th>
            <td><img class="npc" src="IMAGES/Revenant.png" alt="Scheletro"></td>
          </tr>
          <tr>
            <th scope="row" class="npc_name"><span lang="en">Arachnotron</span></th>
            <td><img class="npc" src="IMAGES/Spiderdemon.png" alt="Ragno meccanico"></td>
          </tr>
          <tr>
            <th scope="row" class="npc_name"><span lang="en">Pain Elemental</span></th>
            <td><img class="npc" src="IMAGES/Pain-Element.png" alt="Essere volante spara fuoco"></td>
          </tr>
          <tr>
            <th scope="row" class="npc_name"><span lang="en">Archvile</span></th>
            <td><img class="npc" src="IMAGES/Archvile.png" alt="Alto sacerdote demoniaco infernale"></td>
          </tr>
        </tbody>
      </table>
      <p>
        Essendo pi&ugrave; vario ed innovativo rispetto al primo capitolo, l'introduzione di questa serie di nemici ha cambiato notevolmente le meccaniche del <span lang="en">gameplay</span> relativo alla modalit&agrave; <span lang="en">single player</span>.
        Alcuni <span lang="en">Eater Egg</span> vengono ripresi dal gioco <span lang="en">cult</span> di <span lang="en">id Software</span> <span lang="de">Wolfenstein</span> <abbr title="3 dimensioni">3D</abbr>,
        in due livelli segreti i nemici avranno le sembianze della guardia tedesca classica del gioco, tornando indietro nel tempo con il design e la musica.
        L'unica arma che viene aggiunta &egrave; il <span lang="en">super shotgun</span> (una doppietta a canne mozze).
      </p>
      <p>
        Viene aggiunto inoltre un altro <span lang="en">powerup</span> la megasfera: intrisa di potere demoniaco porta al massimo la salute del giocatore e aumenta il livello di corazza al 200%.
        Alcune aggiunte sono ovviamente decorative quali lampade e pezzi mutilati di vari umanodi e demoni, altre quali i barili esplosivi sono interattive in quanto una volta che il giocatore sparer&agrave; ad uno di questi barili, esploder&agrave; causando seri danni nell'area circostante.
        <span lang="en">Doom</span> 2 richiede una quantit&agrave; leggermente maggiore di risorse hardware rispetto al suo predecessore, poich&egrave; ha livelli pi&ugrave; grandi e un maggior numero di nemici in essi,ma con i processori attuali il gioco gira tranquillamente su quasi tutti i computer.
      </p>
    </section>
    </article>
    <article>
      <h2 class="paragrafo">Release</h2>
      <section>
      <p>
        <span lang="en">Doom</span><abbr title="Secondo">II</abbr>, ha venduto circa due milioni di copie una volta immesso sul mercato, diventando così il prodotto pi&ugrave; venduto per la <span lang="en">software house</span>
        <span lang="en">id Software</span> fino al 2012, quando, viene battuto dal gioco <span lang="en">Rage</span>.
        Sono stati elogiati dalla critica i suoi nuovi e vari nemici e il suo design innovativo della mappa, che mirava a essere pi&ugrave; non lineare rispetto al suo predecessore.
        Ha anche introdotto al mondo dei giochi <abbr lang="en" title="First Person Shooter">FPS</abbr> <span lang="en">Multiplayer</span> in <abbr lang="en" title="Map 01">MAP01</abbr>: <span lang="en">"Entryway"</span>, che &egrave; considerata una delle migliori mappe <span lang="en">deathmatch</span> mai pubblicate,
        anche se alcuni sostengono che <abbr lang="en" title="Map 07">MAP07</abbr>: <span lang="en">Dead Simple (Doom <abbr title="Secondo">II</abbr>)</span> avrebbe il titolo di "miglior livello di <span lang="en">deathmatch</span>".

        In generale <span lang="en">Doom</span><abbr title="Secondo">II</abbr> &egrave; stato giudicato positivamente dalla <span lang="en">gaming-community</span>,
        ma &egrave; stato ritenuto deludente in alcune sue aree, le lamentele pi&ugrave; ricevute riguardano la mancanza di nuove e importanti funzionalit&agrave; e il <span lang="en">level design</span> troppo omogeneo, alle volte quasi squallido,
        specialmente se messo a confronto di giochi usciti poco dopo quali <span lang="en">Duke Nukem <abbr title="3 dimensioni">3D</abbr></span> e <span lang="en">Star Wars: Dark Forces</span>.
      </p>
      <img lang="en" src="IMAGES/starwars.jpg" alt="Scena di gioco di star wars dark forces">
      <img lang="en" src="IMAGES/dukenuke.jpg" alt="Scena di gioco di duke nukem">
      <p class="history">
        Diversamente dal capitolo principale, il sequel non ha avuto versioni demo o condivise, &egrave; stato direttamente venduto al dettaglio.
        <span lang="en">Doom</span><abbr title="Secondo">II</abbr> era quindi anche conosciuto come la versione commerciale del gioco, mentre la versione registrata era disponibile solo per corrispondenza.
        Come <span lang="en">Doom</span><abbr title="Secondo">II</abbr>, ha ricevuto molte richieste di <span lang="en">porting</span> del gioco su altre piattaforme accreditate quali:
        il classico <span lang="en">Mac, PlayStation, Sega Saturn, Game Boy Advance</span> e <span lang="en">Xbox</span>.
        <span lang="en">Doom</span><abbr title="Secondo">II</abbr> &egrave; stato poi rilasciato nuovamente nell'edizione <span lang="en">Doom 3 BFG</span>, dove ogni riferimento nazista &egrave; stato modificato nei livelli 31 e 32.
      </p>
    </section>
    </article>
    <article>
      <h2 class="paragrafo">Note Legali</h2>
      <section>
      <p class="history">
        In accordo con la legge tedesca <span lang="dec">"Strafgesetzbuch"</span> 86a, <cite>"l'utilizzo di simbologie incostituzioniali &egrave; proibito al di fuori di determinati contesti quali,
          ricerca, insegnamento e altro"</cite>.
        Poich&egrave; in due livelli segreti chiamati <span lang="dec">"Wolfenstein"</span> e <span lang="dec">"Grosse"</span>, appaiono simbologie filo-naziste quali svastiche e soldati <abbr lang="dec" title="Schutzstaffel">SS</abbr>,
        la versione tedesca di <span lang="en">Doom</span><abbr title="Secondo">II</abbr> non contiene tali livelli, evitando così che il prodotto possa diventare il soggetto di procedure legali per le quali esso potrebbe
        venire ristretto o addirittura bandito dal commercio.
        Questo imponeva che fosse proibita la vendita, noleggio o scambio del gioco tra gli appassionati, rendendo quasi illegale anche solo il possesso del gioco stesso.
      </p>
      <p>
        Il 31 Dicembre 1994, il gioco venne messo nell'<span lang="dec">Index of the Bundesprüfstelle für jugendgefährdende Schriften</span>, che significa che il gioco non pu&ograve; essere pubblicizzato,
        venduto o noleggiato e anche solamente dato a soggetti minori.
        Questa restrizione verr&agrave; applicata a tutte le versioni del gioco tranne quella per la <span lang="en">console Game Boy Advance</span>.
      </p>
      <p>
        La versione tedesca &egrave; leggermente inferiore rispetto a quella standard in termini di dimensione, come risultato della somma dei contenuti rimossi.
        Esistono per&ograve; vari trucchi o <span lang="en">"cheats"</span> che permettono di sbloccare i livelli segreti di ogni mappa, in questa versione, non appena il giocatore prova ad utilizzare tali trucchi,
        il gioco si arresta improvvisamente poich&egrave; il codice riguardante i livelli segreti &egrave; ancora presente nel sorgente, solamente non viene visualizzato nell'interfaccia grafica.
      </p>
      <p>
        A seguito di un appello di <span lang="en">Bethesda Softworks</span> (ora proprietaria di <span lang="en">ID Software</span>)<span lang="en"> Doom</span> e <span lang="en">Doom</span><abbr title="Secondo">II</abbr> sono stati presi
        dall'<span lang="dec">Index of Bundesprüfstelle für jugendgefährende Medien</span> <abbr lang="dec" title="Bundesprüfstelle für jugendgefährende Medien">(BPjM)</abbr>.
        La restrizione sui due giochi &egrave; scaduta il 31 agosto 2011 a seguito di una riunione del <abbr lang="dec" title="Bundesprüfstelle für jugendgefährende Medien">BPjM</abbr>.
        La decisione si basava principalmente sul fatto che nel contesto dei videogiochi moderni, la violenza rappresentata in <span lang="en">Doom</span> e
        <span lang="en">Doom</span><abbr title="Secondo">II</abbr> non pu&ograve; essere descritta come realistica in pi&ugrave; la sua grafica pixelata lo rende pi&ugrave; cartone animato in natura.
        Questo non includeva la versione di <span lang="en">Doom</span><abbr title="Secondo">II</abbr> contenente i due livelli <span lang="dec">Wolfenstein</span> con le sue svastiche e soldati <abbr lang="dec" title="Schutzstaffel">SS</abbr>.
      </p>
      <p>
        Nel 2019, <span lang="en">Doom</span><abbr title="Secondo">II</abbr> &egrave; stato rimosso da tale indice assieme a <span lang="dec">Wolfenstein</span><abbr title="3 dimensioni">3D</abbr>, e sono disponibili in Germania senza alcuna restrizione.
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
