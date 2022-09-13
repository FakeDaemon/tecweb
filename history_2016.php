<!DOCTYPE html>
<html lang="it" dir="ltr">

<head>
    <link href="CSS/STYLE_COMMON.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="CSS/STYLE_HISTORY.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="CSS/PRINT.css" rel="stylesheet" type="text/css" media="print" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <meta charset="utf-8">
    <title> DOOM (2016) | DoomWiki</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="DOOM WIKI, doom 2016, introduzione, trama, gameplay, multiplayer" />
    <meta name="description" content="DOOM (2016), Tutte le informazioni sul gioco" />
    <meta name="author" content="Antonio Oseliero, Angeli Jacopo, Destro Stefano , Angeloni Alberto" />
</head>

<body>
    <?php
    require 'SCRIPTS/.php/database_connection.php';
    include 'SCRIPTS/.php/user.php';
    $user = new User($conn);
    if (isset($_POST['CookieAccepted']) && $_POST['CookieAccepted'] == 'Accetta') {
        setCookie('CookieAccepted','Accetta',time() + (86400 * 30));
        $_COOKIE['CookieAccepted'] = 'Accetta';
        header('location:history_2016.php');
    }
    if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
    ?>
        <form class="cookie-banner" action="history_2016.php" method="post">
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
                        <li class="NestedListItem CurrentLocation"><a href="history_2016.php">CAPITOLO <abbr title="Quarto">IV</abbr></a></li>
                        <li class="NestedListItem"><a href="history_eternals.php">CAPITOLO <abbr title="Quinto">V</abbr></a></li>
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
        <h1 id="replace4" lang="en">DOOM 2016</h1>
        <article>
            <h2 class="paragrafo">Introduzione</h2>
            <section>
            <p>
                <span lang="en">DOOM</span> (conosciuto come <span lang="en">DOOM</span> 4 durante lo sviluppo) &egrave; un <span lang="en">soft reboot</span>
                del <span lang="en">franchise</span> di <span lang="en">DOOM</span> prodotto da <span lang="en">Id Software</span> e pubblicato da
                <span lang="en">Bethesda Softworks</span>. Il gioco &egrave; stato rilasciato il 13 Maggio 2016 ed &egrave; attualmente disponibile su <abbr title="Personal Computer">
                    PC</abbr>, <abbr title="PlayStation 4">PS4</abbr>, <span lang="en">Xbox One</span> e successivamente <span lang="en">Nintendo Switch</span> il 10 Novembre 2017.
            </p>
            </section>
        </article>
        <article>
            <h2 class="paragrafo">Trama</h2>
            <section>
            <img src="IMAGES/doom_2016_inizio.jpg" alt="una delle prime scene del gioco dove recuperiamo la storica tuta del protagonista">
            <p>
                Il gioco &egrave; ambientato su Marte in un laboratorio detto <abbr title="Union AereoSpace Corporation">UAC</abbr>, invaso dalla forze dell'inferno. Il
                <span lang="en">DOOM Slayer</span> si risveglia incatenato ad un sarcofago, dopo essersi liberato e aver riottenuto la sua armatura
                <span lang="en">Praetor</span> attraversa la superficie marziana per riavviare il sistema satellitare della base. Per la base si possono
                trovare sparse registrazioni della dottoressa Olivia Pierce, dove si nota una palese fissazione della ricercatrice per l'inferno, questa incoraggia
                lo staff del laboratorio ad aprirne i portali, risultando nello sterminio generale dello staff e nel collasso della base.
              </p>
              <p>
                Contattato dal presidente della <abbr title="Union AereoSpace Corporation">UAC</abbr> <span lang="en">Samuel Hayden</span>, uno dei pochi soppravvissuti all'incidente, il protagonista viene guidato alla base per prevenire il completo collasso della stessa. Con la guida di <span lang="en">Hayden</span> e della <abbr title="Intelligenza Artificiale">IA</abbr>
                chiamata VEGA, apprende dai rapporti della diagnostica che le vittime e i danni sono enormi; ad eccezione di <span lang="en">Hayden</span>, tutto lo staff &egrave; diventato
                un demone o morto orribilmente. Dopo aver stabilizzato la Fonderia in seguito ad un <span lang="en">meltdown</span>, il <span lang="en">Doom Guy</span>
                apprende che il piano di Pierce &egrave; quello di usare la torre energetica Argent della <abbr title="Union AereoSpace Corporation">UAC</abbr> per aprire un
                portale permanente con l'inferno. Cercando un modo per disattivare la torre, <span lang="en">Hayden</span> dice di smantellare delicatamente l'approvvigionamento
                energetico in modo da proteggere l'infinita fonte energetica; nonostante le proteste di  <span lang="en">Hayden, Doom Guy</span> distrugge tutti i
                pannelli e le loro lenti, eliminando completamente le fonti energetiche <span lang="en">Argernt</span> nel sistema solare. Una volta raggiunta la cima della torre,
                troviamo <span lang="en">Pierce</span> con un accumulatore <span lang="en">Argent</span> che attiva, prima di saltare nel flusso energetico, questo apre un portale temporaneo che trasporta il giocatore
                negli inferi.
              </p>
              <p>
                Atterrando nel santuario Kadingir, il giocatore dovr&agrave; farsi largo tra le forze infernali per ritornare su Marte. Seguendo l'ologramma
                delle prime spedizioni di <span lang="en">Hayden, Doom Guy</span> riesce a raggiungere il portale e a tornare su Marte. Ritornati alla base
                <abbr title="Union AereoSpace Corporation">UAC</abbr>, ora distrutta, si riunisce ad <span lang="en">Hayden</span>, che applica un sistema alla tuta che gli permette di
                tornare all'inferno quando vuole. Quindi si viaggia verso i laboratori Lazarus alla ricerca di informazioni su <span lang="en">Pierce</span>. Passando attraverso il
                laboratorio di ricerca avanzata, <span lang="en">Doom Guy</span> apprende di un artefatto infernale chiamato Crogiolo. Necessitando un accumulatore <span lang="en">Argent</span>
                per tornare all'inferno, <span lang="en">Doom Guy</span> esplora i laboratori Lazarus incontrando un Cyberdemone fuggito; ricostruito e riportato in
                vita con l'energia <span lang="en">Argent</span>. Sconfitto il Cyberdemone e strappato un accumulatore dal suo petto vengono entrambi trasportati all'inferno dove
                <span lang="en">Doom Guy</span> riesce a finire il demone. Avanzando negli inferi raggiungiamo finalmente la Necropoli.
              </p>
              <p>
                Uccidendo le guardie infernali <span lang="en">Doom Guy</span> recupera il Crogiolo prima che <span lang="en">Hayden</span> lo riporti su Marte. Arrivati all'unit&agrave; di processo centrale di VEGA, l'<abbr title="Intelligenza Artificiale">IA</abbr> ti guida in modo da disabilitare la sue unit&agrave; di controllo, permettendogli di usare la sua immensa
                riserva <span lang="en">Argent</span> in modo da rispedirti un'ultima volta all'inferno. Usando il Crogiolo distrugge le fonti energetiche che danno energia ai portali
                tra Marte e l'inferno ed entra nelle profondit&agrave; dell'<span lang="en">Argent D'Nur</span>. Raggiungendo il nucleo troviamo Olivia <span lang="en">Pierce</span> terrorizzata dall'aver realizzato
                di essere solamente una pedina, quindi viene colpita da un grosso raggio <span lang="en">Argent</span> che la trasforma in un Aracnomante Supremo, che viene sconfitto
                quindi dal <span lang="en">Doom Guy</span>. Ritornando su Marte veniamo catturati da <span lang="en">Hayden</span>, che ruba il Crogiolo per i suoi fini, insistendo che
                nonostante tutto, la ricerca deve continuare per rispondere alle esigenze energetiche dell'umanit&agrave;. Impossibilitato ad uccidere il <span lang="en">Doom Guy</span>
                ma preoccupato delle sue interferenze, ci trasporta in una <span lang="en">location</span> sconosciuta.
            </p>
          </section>
        </article>
        <article>
            <h2 class="paragrafo">Gameplay</h2>
            <section>
            <img src="IMAGES/doom_2016_gameplay.jpg" alt="una schermata del gioco">
            <p>
                Nonostante alcune similarit&agrave; a <span lang="en">DOOM</span> 3, il <span lang="en">gameplay</span> di questo <span lang="en">DOOM</span> &egrave;
                significativamente differente dal predecessore. Il gioco risulta pi&ugrave; veloce, con <span lang="en">sprint, double jump</span>, il
                <span lang="en">Doom Guy</span> risulta pi&ugrave; veloce di ogni nemico del gioco, ed &egrave; inteso che il movimento sia la chiave delle strategie
                d'attacco e di difesa. Differentemente da <span lang="en">DOOM</span> 3, <span lang="en">Doom Guy</span> &egrave; equipaggiato per uscire sulla
                superficie marziana, parzialmente terraformata in questo reboot, dove la minore gravit&agrave; del pianeta diventa una <span lang="en">feature</span>
                del gioco, con il <span lang="en">Doom Guy</span> in grado di effettuare lunghi salti, scalare grossi ostacoli e sopportare relativamente alte
                cadute senza danni.
              </p>
              <p>
                Alcune <span lang="en">feature</span> del <span lang="en">gameplay</span> vogliono rifarsi ai vecchi giochi della saga:
                come nell'originale <span lang="en">DOOM</span> (ma diversamente da <span lang="en">DOOM</span> 3) non serve ricaricare l'arma, sia le carte
                d'accesso che le chiavi-teschio vengono reintrodotte e il numero delle armi non &egrave; limitato. A differenza di<span lang="en">DOOM</span> 3 non
                esistono <abbr title="Non Playable Character">NPC</abbr> al di fuori di <span lang="en">Samuel Hayden, VEGA,</span> e Olivia <span lang="en">Pierce</span>; Esistono diverse novit&agrave;, per esempio, il "<span lang="en">karate system</span>", che permette al giocatore di combattere i demoni in <span lang="en">melee</span>.
              </p>
              <p>
                Questa aggiunta permette di finire gli avversari grazie alle "<span lang="en">Glory Kills</span>":
                quando il nemico subisce sufficenti danni comincer&agrave; prima a brillare di arancione e poi di blu, quando questo avviene possiamo eliminare il domone
                con un uccisione teatrale. Il gioco consiste di una successione di arene che vengono sigillate e riempite di orde demoniache, che dovranno essere
                annientate per proseguire.
              </p>
              <p>
                Una volta pulita l'area la porta si apre permettendo di proseguire e di passare un <span lang="en">checkpoint</span>.
                Un altro elemento di contrasto con <span lang="en">DOOM</span> 3 &egrave; che le imboscate formate da un piccolo gruppo di nemici in luoghi bui e stretti,
                elemento centrale del <span lang="en">gameplay</span> del predecessore, sono presenti, ma molto meno comuni. L'ultima introduzione alla serie
                &egrave; il <span lang="en">modding</span> delle armi, che ora possono essere potenziate e modificate, insieme all'armatura <span lang="en">Praetor</span> permettendo molte strategie
                al giocatore.
            </p>
          </section>
        </article>
        <article>
            <h2 class="paragrafo">Multiplayer</h2>
            <section>
            <p>
                <span lang="en">Id Software</span> ha collaborato con lo studio <span lang="en">Certain Affinity</span> in modo da sviluppare una sezione
                <span lang="en">multiplayer</span>. Non &egrave; la prima volta che questo studio viene chiamato per sviluppare questo tipo di sezioni di gioco:
                hanno infatti collaborato allo sviluppo del multiplayer di <span lang="en">Halo: the Master Chief Collection, Call of Duty: Ghosts, Halo 4</span>
                e molti altri.
            </p>
            <img src="IMAGES/multiplayer_2016.png" alt="schermata per il multiplayer">
            <h3 class="lista_titolo">Modalit&agrave; <span lang="en">multiplayer</span>:</h3>
            <ul class="lista">
                <li lang="en">Team Deathmatch</li>
                <li lang="en">Clan Arena</li>
                <li lang="en">Freeze Tag</li>
                <li>Dominio</li>
                <li lang="en">Warpath</li>
                <li>Raccolta di Anime</li>
                <li>Corsa Infernale</li>
            </ul>
            <table class="npc_table">
              <caption class="tab_title">Demoni Giocabili</caption>
              <thead class="npc_head">
                <tr class="tab_subtitle">
                  <th scope="col">Nome</th>
                  <th scope="col">Foto</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="npc_name"><span lang="en">Baron</span></th>
                  <td><img class="npc" src="IMAGES/baron2016.png" alt="Demone rosso cornuto"></td>
                </tr>
                <tr>
                  <th scope="row" class="npc_name"><span lang="en">Mancubus</span></th>
                  <td><img class="npc" src="IMAGES/mancubus2016.webp" alt="Grosso mostro spara laser"></td>
                </tr>
                <tr>
                  <th scope="row" class="npc_name"><span lang="en">Revenant</span></th>
                  <td><img class="npc" src="IMAGES/revenant2016.webp" alt="Scheletro"></td>
                </tr>
                <tr>
                  <th scope="row" class="npc_name"><span lang="en">Preator</span></th>
                  <td><img class="npc" src="IMAGES/predator2016.png" alt="Particolare suit"></td>
                </tr>
                <tr>
                  <th scope="row" class="npc_name"><span lang="en">Cacodemon (<abbr title="Downloadable Content">DLC</abbr>)</span></th>
                  <td><img class="npc" src="IMAGES/cacodemon2016.webp" alt="Mostro tondo volante spara fuoco"></td>
                </tr>
                <tr>
                  <th scope="row" class="npc_name"><span lang="en">Harvester (<abbr title="Downloadable Content">DLC</abbr>)</span></th>
                  <td><img class="npc" src="IMAGES/harvester2016.webp" alt="Agile mostriciattolo cornuto"></td>
                </tr>
                <tr>
                  <th scope="row" class="npc_name"><span lang="en">Spectre (<abbr title="Downloadable Content">DLC</abbr>)</span></th>
                  <td><img class="npc" src="IMAGES/spectre2016.webp" alt="Alto sacerdote demoniaco infernale"></td>
                </tr>
              </tbody>
            </table>

            <h3 class="lista_titolo"><span lang="en">Power-ups</span></h3>
              <ul class="lista">
                  <li lang="en">Quad Damage</li>
                  <li>Invisibilit&agrave;</li>
                  <li>Rigenerazione</li>
                  <li>Rapidit&agrave;</li>
                  <li>Invulnerabilit&agrave;</li>
              </ul>
              <h3 class="lista_titolo">Mappe Incluse nel <span lang="en">Multiplayer</span></h3>
              <dl class="mappe">
                <dt>Scavo</dt>
                <dd>Un modesto avamposto minatorio dello <abbr title="Union AereoSpace Corporation">UAC</abbr></dd>
                <dt>Inferno</dt>
                <dd>Una mappa infernale con molti interni e esterni, piena di piattaforme, abissi e piattaforme di teletrasporto</dd>
                <dt>Abisso</dt>
                <dd>Un enorme mappa sotto la calotta ghiacchiata di Marte.</dd>
                <dt>Tritarifiuti</dt>
                <dd>Questa piccola mappa si trova nell'impianto di smaltimento rifiuti del complesso residenziale
                <abbr title="Union AereoSpace Corporation">UAC</abbr></dd>
                <dt>Elica</dt>
                <dd>Luogo di sperimentazione sui demoni per la creazione e sviluppo di armi</dd>
                <dt>Perdizione</dt>
                <dd>Un'antica arena popolata da sfortunate anime agonizzanti</dd>
                <dt>Sacrilego</dt>
                <dd>Ambientata all'inferno questa mappa offre linee di tiro pulite</dd>
                <dt>Calura</dt>
                <dd>Una struttura industriale <abbr title="Union AereoSpace Corporation">UAC</abbr> con muri luccicanti</dd>
                <dt lang="en">Beneath</dt>
                <dd>Prima di essere teletrasportato sulla Terra, le energie dell'Inferno vengono ammassate in queste caverne</dd>
              </dl>
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
