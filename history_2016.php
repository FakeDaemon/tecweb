<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link href="CSS/STYLE_COMMON.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="CSS/STYLE_HISTORY.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="CSS/STYLE_SCREENL.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="CSS/STYLE_SCREENP.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <meta charset="utf-8">
    <title> DOOM (2016) </title>
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
        setCookie('CookieAccepted','Accetta',time() + (86400 * 30));
        $_COOKIE['CookieAccepted'] = 'Accetta';
        header('location : history_2016.php');
    }
    if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
    ?>
        <form class="cookie-banner" action="history_2016.php" method="post">
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
                        <li class="NestedListItem"><a href="history_2.php">CAPITOLO <abbr title="Secondo">II</abbr></a></li>
                        <li class="NestedListItem"><a href="history_3.php">CAPITOLO <abbr title="Terzo">III</abbr></a></li>
                        <li class="NestedListItem CurrentLocation"><a href="history_2016.php">CAPITOLO <abbr title="Quarto">IV</abbr></a></li>
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
        <h1 id="replace4" lang="en">DOOM 2016</h1>
        <article id="Introduzione">
            <h2 class="paragrafo">Introduzione</h2>
            <a name="Introduzione"></a>
            <p>
                <span lang="en">DOOM</span> (conosciuto come <span lang="en">DOOM</span> 4 durante lo sviluppo) è un <span lang="en">soft reboot</span>
                del <span lang="fr">franchise</span> di <span lang="en">DOOM</span> prodotto da <span lang="en">Id Software</span> e pubblicato da
                <span lang="en">Bethesda Softworks</span>. Il gioco è stato rilasciato il 13 Maggio 2016 ed è attualmente disponibile su <abbr title="Personal Computer">
                    PC</abbr>, <abbr title="PlayStation4">PS4</abbr>, <span lang="en">Xbox One</span> e <span lang="en">Nintendo Switch</span> il 10 Novembre 2017
            </p>
        </article>
        <article id="Trama">
            <h2 class="paragrafo">Trama</h2>
            <a name="Trama"></a>
            <img src="IMAGES/doom_2016_inizio.jpg" alt="una delle prime scene del gioco dove recuperiamo la storica tuta del protagonista">
            <p>
                Il gioco è ambientato su Marte in un laboratorio <abbr title="Union AereoSpace Corporation">UAC</abbr> invaso dalla forze dell'inferno. Il
                <span lang="en">DOOM Slayer</span> si risveglia incatenato ad un sarcofago, dopo essersi liberato e aver riottenuto la sua armatura
                <span lang="en">Praetor</span> attraversa la superficie marziana per riavviare il sistema satellitare della base. Per la base si possono
                trovare sparse registrazioni della dottoressa Olivia Pierce, dove si nota una palese fissazione della ricercatrice per l'inferno e incoraggia
                lo staff del laboratorio ad aprirne i portali, risultando nello sterminio generale e nel collasso della base. Contattato dal preidente della
                <abbr title="Union AereoSpace Corporation">UAC</abbr> Samuel Hayden, uno dei pochi soppravvissuti all'incidente, il protagonista viene guidato
                attraverso alla base per prevenire il completo collasso della base. Con la guida di Hayden e della <abbr title="Intelligenza Artificiale">IA</abbr>
                chiamata VEGA apprende dai rapporti della diagnostica che le vittime e i danni sono enormi; con l'eccezione di Hayden tutto lo staff è o diventato
                un demone o morto orribilmente. Dopo aver stabilizzato la Fonderia in seguito ad un <span lang="en">meltdown</span>, il <span lang="en">DOOMguy</span>
                apprende che il piano di Pierce è quello di usare la torre energetica Argent della <abbr title="Union AereoSpace Corporation">UAC</abbr> per aprire un
                portale permanente con l'inferno. Cercando un modo per disattivare la torre, Hayden dice di smantellare delicatamente l'approvvigionamento
                energetico in modo da proteggere l'infinita fonte energetica; nonostante le proteste di Hayden <span lang="en">DOOMguy</span> distrugge tutti i
                pannelli e le loro lenti eliminando completamente le fonti energetiche Argernt nel sistema solare. Una volta raggiunta la cima della torre,
                troviamo Pierce con un accumulutaore Argent che attiva prima di saltare nel flusso energetico, che apre un portale temporaneo che trasporta il giocatore
                negli inferi. Atterrando nel santuario Kadingir, il giocatore dovrà farsi largo tra le forze infernali per ritornare su Marte. Seguendo l'ologramma
                delle prime spedizioni di Hayden <span lang="en">DOOMguy</span> riesce a raggiungere il portale e a tornare su Marte. Ritornati alla base
                <abbr title="Union AereoSpace Corporation">UAC</abbr>, ora distrutta, si riunisce ad Hayden, che applica un sistema alla tuta che gli permette di
                tornare all'inferno quando vuole. Quindi si viaggia verso i laboratori Lazarus alla ricerca di informazioni su Pierce. Passando attraverso il
                laboratorio di ricerca avanzata, <span lang="en">DOOMguy</span> apprende di un'artefatto infernale chiamato Crogiolo. Necessitando un accumulatore Argent
                per tornare all'inferno, <span lang="en">DOOMguy</span> esplora i laboratori Lazarus incontrando un Cyberdemone fuggito; ricostruito e riportato in
                vita con l'energia Argent. Sconfitto il Cyberdemone e strappato un accumulatore dal suo petto vengono entrambi trasportati all'inferno dove
                <span lang="en">DOOMguy</span> riesce a finire il demone. Avanzando negli inferi raggiungiamo finalmente la Necropoli. Uccidendo le guardie infernali
                <span lang="en">DOOMguy</span> recupera il Crogiolo prima che Hayden lo riporti su Marte. Arrivati all'unità di processo centrale di VEGA, l'
                <abbr title="Intelligenza Artificiale">IA</abbr> ti guida in modo da disabilitare la sue unità di controllo, permettendogli di usare la sua immensa
                riserva Argent in modo da rispedirti un'ultima volta all'inferno. Usando il Crogiolo distrugge le fonti energetiche che danno energia ai portali
                tra MArte e l'inferno ed entra nelle profondità dell' Argent D'Nur. Raggiungendo il nucleo troviamo Olivia Pierce terrorizzata dall'aver realizzato
                di essere solamente una pedina, quindi viene colpita da un grosso raggio Argent che la trasforma in un Aracnomante Supremo, che viene sconfitto
                quindi dal <span lang="en">DOOMguy</span>. Ritornando su Marte vieniamo catturati da Hayden, che ruba il Crogiolo per i suoi fini, insistendo che
                nonstante tutto, la ricerca deve continuare per rispondere alle esigenze energetiche dell'umanità. Impossibilitato ad uccidere il <span lang="en">DOOMguy</span>
                ma preoccupato delle sue interferenze, ci trasporta in una <span lang="en">location</span> sconosciuta.
            </p>
        </article>
        <article id="Gameplay">
            <h2 class="paragrafo">Gameplay</h2>
            <a name="Gameplay"></a>
            <img src="IMAGES/doom_2016_gameplay.jpg" alt="una schermata del gioco">
            <p class="history">
                Nonostante alcune similarità a <span lang="en">DOOM</span> 3, il <span lang="en">gameplay</span> di questo <span lang="en">DOOM</span> è
                significativamente differente dal predecessore. Il gioco risulta più veloce, con <span lang="en">sprint, double jump</span>, il
                <span lang="en">DOOMguy</span> risulta più veloce di ogni nemico del gioco, ed è inteso che il movimento sia la chiave delle strategie
                d'attacco e di difesa. Differentemente da <span lang="en">DOOM</span> 3, <span lang="en">DOOMguy</span> è equipaggiato per uscire sulla
                superficie marziana, parzialmente terraformata in questo reboot, dove la minore gravità del pianeta diventa una <span lang="en">feature</span>
                del gioco, con il <span lang="en">DOOMguy</span> in grado di effettuale lunghi salti, scalare alti ostacoli e sopportre relativamente alte
                cadute senza danni. Alcune <span lang="en">feature</span> del <span lang="en">gameplay</span> vogliono rifarsi ai vecchi giochi della saga:
                come nell'originale <span lang="en">DOOM</span> (ma diversamente da <span lang="en">DOOM</span> 3) non serve ricaricare l'arma, sia le carte
                d'accesso che le chiavi-teschio vengono reintrodotte e il numero delle armi non è limitato. A differenza di<span lang="en">DOOM</span> 3 non
                esistono <abbr title="Non Playable Character">NPC</abbr> al di fuori di Samuel Hayden, VEGA, e Olivia Pierce; tutto il personale
                <abbr title="Union AereoSpace Corporation">UAC</abbr> è o morto o zombificato. Esistono diverse novità: una è il "<span lang="en">karate system</span>"
                che permette al giocatore di combattere i demoni in melee. Questa aggiunta permette di finire gtli avversari grazie alle "<span lang="en">Glory Kills</span>":
                quando il nemico subisce sufficenti danni comincerà prima a brillare di arancione e poi di blu, quando questo avviene possiamo eliminare il domone
                con un uccisione teatrale. Il gioco consiste di una successione di arene che vengono sigillate e riempite di orde demoniache, che dovranno essere
                annientate per proseguire. Una volta pulita l'area la porta si apre permettorndi di proseguire e di passare un <span lang="en">checkpoint</span>.
                Un altro elemento di contrasto con <span lang="en">DOOM</span> 3 è che le imboscate formate da un piccolo gruppo di nemici in luoghi bui e stretti
                elemento centrale del <span lang="en">gameplay</span> del predecessore sono presenti, ma molto meno comuni. L'ultima introduzione alla serie
                è il <span lang="en">moodding</span> delle armi, che ora possono essere potenziate e modificate, insieme all'armatura Praetor permettendo molte strategie
                al giocatore.
            </p>
        </article>
        <article id="Multiplayer">
            <h2 class="paragrafo">Multiplayer</h2>
            <a name="Multiplayer"></a>
            <p>
                <span lang="en">Id Software</span> ha collaborato con lo studio <span lang="en">Certain Affinity</span> in modo da sviluppare una sezione
                <span lang="en">multiplayer</span>. Non è la prima volta che questo studio viene chiamato per sviluppare questo tipo di sezioni di gioco:
                hanno infatti collaborato allo sviluppo del multiplayer di <span lang="en">Halo: the Master Chief Collection, Call of Duty: Ghosts, Halo 4</span>
                e molti altri.
            </p>
            <img src="IMAGES/multiplayer_2016.png" alt="schermata per il multiplayer">
            <h3 class="lista_titolo">Modalità <span lang="en">multiplayer</span>:</h3>
            <ul class="lista">
                <li><span lang="en">Team Deathmatch</span></li>
                <li><span lang="en">Clan Arena</span></li>
                <li><span lang="en">Freeze Tag</span></li>
                <li>Dominio</li>
                <li><span lang="en">Warpath</span></li>
                <li>Raccolta di anime</li>
                <li>Corsa Infernale</li>
            </ul>
            <table class="npc_table">
              <thead class="npc_head">
                <tr>
                  <th colspan="2">
                    <h1 class="tab_title">Demoni Giocabili</h1>
                  </th>
                </tr>
                <tr class="tab_subtitle">
                  <th>Nome</th>
                  <th>Foto</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th class="npc_name"><span lang="en">Baron</span></th>
                  <th><img class="npc" src="IMAGES/baron2016.png" alt="Demone rosso cornuto"></th>
                </tr>
                <tr>
                  <th class="npc_name"><span lang="en">Mancubus</span></th>
                  <th><img class="npc" src="IMAGES/mancubus2016.webp" alt="Grosso mostro spara laser"></th>
                </tr>
                <tr>
                  <th class="npc_name"><span lang="en">Revenant</span></th>
                  <th><img class="npc" src="IMAGES/revenant2016.webp" alt="Scheletro"></th>
                </tr>
                <tr>
                  <th class="npc_name"><span lang="en">Preator</span></th>
                  <th><img class="npc" src="IMAGES/predator2016.png" alt="Particolare suit"></th>
                </tr>
                <tr>
                  <th class="npc_name"><span lang="en">Cacodemon (<abbr title="Downloadable Content">DLC</abbr>)</span></th>
                  <th><img class="npc" src="IMAGES/cacodemon2016.webp" alt="Mostro tondo volante spara fuoco"></th>
                </tr>
                <tr>
                  <th class="npc_name"><span lang="en">Harvester (<abbr title="Downloadable Content">DLC</abbr>)</span></th>
                  <th><img class="npc" src="IMAGES/harvester2016.webp" alt="Agile mostriciattolo cornuto"></th>
                </tr>
                <tr>
                  <th class="npc_name"><span lang="en">Spectre (<abbr title="Downloadable Content">DLC</abbr>)</span></th>
                  <th><img class="npc" src="IMAGES/spectre2016.webp" alt="Alto sacerdote demoniaco infernale"></th>
                </tr>
              </tbody>
            </table>

            <h3 class="lista_titolo"><span lang="en">Power-ups</span></h3>
                        <ul class="lista">
                            <li><span lang="en">Quad Damage</span></li>
                            <li>Invisibilità</li>
                            <li>Rigenerazione</li>
                            <li>Rapidità</li>
                            <li>Invulnerabilità</li>
                        </ul>
                        <h3 class="lista_titolo">Mappe Incluse nel <span lang="en">Multiplayer</span></h3>
                        <ul class="lista">
                            <li>Scavo
                                Un modesto avamposto minatorio dello <abbr title="Union AereoSpace Corporation">UAC</abbr>
                            </li>
                            <li>
                                Inferno
                                Una mappa infernale con molti interni e esterni, piena di piattaforme, abissi e piattaforme di teletrasporto
                            </li>
                            <li>
                                Abisso
                                Un enorme mappa sotto la calotta ghiacchiata di Marte.
                            </li>
                            <li>
                                Tritarifiuti
                                Questa piccola mappa si trova nell'impianto di smaltimento rifiuti del complesso residenziale
                                <abbr title="Union AereoSpace Corporation">UAC</abbr>
                            </li>
                            <li>
                                Elica
                                Luogo di sperimentazione sui demoni per la creazione e sviluppo di armi
                            </li>
                            <li>
                                Perdizione
                                Un'antica arena popolata da sfortunate anime agonizzanti
                            </li>
                            <li>
                                Sacrilego
                                Ambientata all'inferno questa mappa offre linee di tiro pulite
                            </li>
                            <li>
                                Calura
                                Una struttura industriale <abbr title="Union AereoSpace Corporation">UAC</abbr> con muri luccicanti
                            </li>
                            <li>
                                <span lang="en">Beneath</span>
                                Prima di essere teletrasportato sulla Terra, le energie dell'Inferno vengono ammassate in queste caverne
                            </li>
                        </ul>
                        <dl class="">
                          <dt>Scavo</dt>
                          <dd>Un modesto avamposto minatorio dello <abbr title="Union AereoSpace Corporation">UAC</abbr></dd>
                        </dl>
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
