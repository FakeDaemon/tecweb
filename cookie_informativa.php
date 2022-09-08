<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link href="CSS/STYLE_COMMON.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="CSS/STYLE_HISTORY.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="CSS/STYLE_HOME.css" rel="stylesheet" type="text/css" media="screen" />
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
    header('location : cookie_informativa.php');
  }
  if (!(isset($_COOKIE['CookieAccepted'])) || !($_COOKIE['CookieAccepted'] == 'Accetta')) {
  ?>
    <form class="cookie-banner" action="cookie_informativa.php" method="post">
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
      <h2 class="paragrafo">Termini d’uso</h2>
      <p>
        L'utilizzo del seguente sito <span lang="en">web</span> implica per l'utente la conoscenza delle seguenti condizioni.<br />
        Il materiale contenuto nel sito <span lang="en">web</span> è protetto da <span lang="en">copyright</span>.<br />
        Nessuna responsabilità viene assunta in relazione sia al contenuto di quanto pubblicato su questo sito
        ed all'uso che terzi ne potranno fare, sia per le eventuali contaminazioni derivanti dall'accesso, dall'interconnessione,
        dallo scarico di materiale e programmi informatici da questo sito.<br />
        La informiamo che ai sensi dell’<abbr title="articolo">art.</abbr> 13 Regolamento <abbr title="Unione Europea numero">UE n.</abbr>
        2016/679 (in seguito, <abbr lang="en" title="General data protection regulation">“GDPR”</abbr>) che i Suoi dati personali, previa esplicita
        ed espressa manifestazione del consenso mediante la selezione della casella pertinente, saranno trattati con le
        modalità e per le finalità che seguono.<br />
      </p>
    </article>
    <article>
      <h2 class="paragrafo">Oggetto del trattamento</h2>
      <p>
        Il Titolare può trattare i Dati personali che: l’utente fornisce volontariamente (ad esempio, le informazioni fornite in sede di registrazione);
        vengono raccolti dal Titolare automaticamente (quando accede ai Servizi, possiamo raccogliere alcune informazioni direttamente dal tuo dispositivo,
        ricorrendo all’utilizzo di <span lang="en">cookie</span> e altre tecnologie analoghe per analizzare la Sua interazione con i Servizi;
        per ulteriori informazioni sulle tipologie di <span lang="en">cookie</span> e tecnologie analoghe di cui ci avvaliamo, le ragioni e le
        rispettive modalità di controllo, verifichi la nostra <span lang="en">Cookie Policy</span>).</br>

        I Suoi Dati personali sono trattati, indipendentemente dal Suo consenso esplicito ed espresso <abbr title="articolo">art.</abbr> 6
        <abbr title="lettera">lett.</abbr> b), e) <abbr lang="en" title="General data protection regulation">“GDPR”</abbr>) per le seguenti finalità:
      </p>
      <ul class="lista">
        <li>adempimento agli obblighi previsti dalla legge, da un regolamento, dalla normativa comunitaria o da un ordine dell’Autorità;</li>
        <li>esercizio di attività che afferiscono a un legittimo interesse del Titolare.</li>
      </ul>
      <p>
        Il conferimento dei Dati per le finalità appena menzionate ha natura obbligatoria ai fini della fornitura dei Servizi offerti dal Titolare.
        In difetto, non saremo in grado di stipulare il contratto di fornitura dei Servizi e/o di garantire la corretta fornitura dei Servizi
        e/o adempiere agli obblighi gravanti sul Titolare del trattamento in esecuzione del contratto di fornitura dei Servizi.</br>

        In particolare, la base giuridica per il trattamento dei Suoi Dati personali risiede nello specifico contesto in cui vengono raccolti.
        La ragione principale per cui i Dati personali vengono da Noi raccolti e utilizzati risiede nell’esecuzione del contratto di fornitura
        dei Servizi del Titolare. Tuttavia, utilizzeremo i Suoi Dati personali anche laddove tale attività rientri nell’interesse legittimo del
        Titolare, salvo che tale interesse non sia in conflitto con gli interessi di protezione dei Suoi Dati o con i Suoi diritti e libertà
        fondamentali). In taluni casi, potremmo avere un obbligo giuridico di raccolta dei Suoi Dati personali (ad esempio, nell’ambito di un
        procedimento legale) o potremmo dover elaborare e condividere con altri soggetti tali Dati, all’esito di un giudizio di bilanciamento
        che ci imponga di ottemperare a un obbligo che risulti prevalente rispetto al Suo interesse di protezione dei Dati.</br>

        Parimenti, ove raccogliessimo e utilizzassimo i Dati fondandoci su interessi legittimi (nostri o di terzi), Le daremo conto di
        quali interessi legittimi si tratta nel caso concreto.</br>

        Solo previo un Suo specifico e distinto consenso (<abbr title="articolo">art.</abbr> 7
        <abbr lang="en" title="General data protection regulation">“GDPR”</abbr>), per le seguenti finalità di marketing:
      </p>
      <ul class="lista">
        <li>
          inviarLe via <span lang="en">e-mail</span>, posta e/o messaggio e/o contatti telefonici,
          <span lang="en">newsletter</span>, comunicazioni commerciali e/o materiale pubblicitario su prodotti o servizi
          offerti dal Titolare e rilevazione del grado di soddisfazione sulla qualità dei servizi;
        </li>
        <li>
          inviarLe via <span lang="en">e-mail</span>, posta e/o sms e/o contatti telefonici comunicazioni commerciali e/o promozionali di soggetti
          terzi.
        </li>
      </ul>
      <p>
        Il conferimento dei dati per le finalità appena menzionate ha invece natura facoltativa. Può quindi decidere di non conferire alcun
        dato o di negare successivamente la possibilità di trattare dati già forniti: in tal caso, non potrà ricevere newsletter,
        comunicazioni commerciali e materiale pubblicitario inerenti ai Servizi offerti dal Titolare. Continuerà comunque ad avere diritto
        ai Servizi per i quali non è necessario il suo esplicito ed espresso consenso.</br>

        Qualora avesse necessità di ulteriori informazioni sulla base giuridica e/o sulle finalità del trattamento dei Suoi Dati, ci contatti
        al seguente indirizzo: DoomWiki@gmail.com.</br>
      </p>
    </article>
    <article>
      <h2 class="paragrafo">Modalità di trattamento e comunicazione dei Dati personali</h2>
      <p>
        Il trattamento dei Suoi dati personali è realizzato per mezzo delle operazioni indicate all’<abbr title="articolo">art.</abbr>
        4 <abbr title="numero">n.</abbr> 2 <abbr title="General data protection regulation">GDPR</abbr> e precisamente:
        raccolta, registrazione, organizzazione, conservazione, consultazione, elaborazione, modificazione, selezione, estrazione,
        raffronto, utilizzo, interconnessione, blocco, comunicazione, cancellazione e distruzione dei dati. I Suoi dati personali sono sottoposti
        a trattamento elettronico automatizzato.</br>

        I Dati personali saranno trattati da Noi e da soggetti (interni ed esterni) specificamente autorizzati dal Titolare del trattamento ai
        sensi dell’<abbr title="articolo">art.</abbr> 4 <abbr title="numero">n.</abbr> 10 del Regolamento <abbr title="Unione Europea">UE</abbr>
        2016/679 e operanti sotto la supervisione di quest’ultimo, nel rispetto delle istruzioni ricevute e dei vincoli contrattuali tra questi
        intercorrenti. A titolo meramente esemplificativo, i Dati potranno essere trattati/comunicati da/a:
      </p>

      <ul class="lista">
        <li> dipendenti e collaboratori del Titolare, nella loro qualità di incaricati e/o responsabili del trattamento e/o amministratori di
          sistema
        </li>
        <li>
          società e/o professionisti che svolgono attività esterna per conto del Titolare, nella loro qualità di responsabili del trattamento
        </li>
        <li>
          consulenti incaricati della tenuta della gestione contabile per conto del Titolare del trattamento
        </li>
        <li>
          legali ai quali il Titolare ha conferito apposito mandato professionale
        </li>
      </ul>

      <p>
        I Dati personali vengono trattati dal Titolare avvalendosi di server ubicati in territorio <abbr title="Unione Europea">UE</abbr>.</br>

        Resta in ogni caso inteso che il Titolare, ove si rendesse necessario, avrà facoltà di spostare i server di riferimento anche
        in territori extra-<abbr title="Unione Europea">UE</abbr>. In tal caso, il Titolare assicura sin d’ora che il trasferimento dei
        dati extra-<abbr title="Unione Europea">UE</abbr> avverrà in conformità alle disposizioni di legge applicabili, previa stipula
        delle clausole contrattuali standard previste dalla Commissione Europea.</br>

        Il Titolare tratterà i dati personali per il tempo necessario per adempiere alle finalità di cui sopra e comunque per non oltre
        12 mesi dalla raccolta dei dati per le Finalità di marketing.</br>
      </p>
      <h2 class="paragrafo">Diritti dell’interessato</h2>
      <p>
        Nella Sua qualità di interessato, ha i diritti di cui all’<abbr title="articoli">artt.</abbr> 15-21
        <abbr title="General data protection regulation">GDPR</abbr> e precisamente i diritti di:
      </p>
      <ul class="lista">
        <li>
          ottenere dal Titolare la conferma se sia o meno in corso un trattamento di Dati personali, in tal caso, ha diritto ad ottenerne
          l’accesso limitatamente a quelli che La riguardano e avrà diritto di ricevere dal Titolare la loro relativa comunicazione in forma intelligibile
        </li>
        <li>
          ottenere l’indicazione:
        </li>
        <ol>
          <li>dell’origine dei dati personali</li>
          <li>delle finalità e modalità del trattamento</li>
          <li>della logica applicata in caso di trattamento effettuato con l’ausilio di strumenti elettronici</li>
          <li>degli estremi identificativi del titolare, dei responsabili e del rappresentante designato ai sensi dell’
            <abbr title="articolo">art.</abbr> 3, comma 1, <abbr title="General data protection regulation">GDPR</abbr>
          </li>
          <li>dei soggetti o delle categorie di soggetti ai quali i dati personali possono essere comunicati o che possono venirne a conoscenza
            in qualità di rappresentanti designati nel territorio dello Stato, di responsabili o incaricati</li>
        </ol>
        <li>
          ottenere:
        </li>
        <ol>
          <li>l’aggiornamento, la rettificazione ovvero, quando vi ha interesse, l’integrazione dei dati</li>
          <li>la cancellazione, la trasformazione in forma anonima o il blocco dei dati trattati in violazione di legge, compresi
            quelli di cui non è necessaria la conservazione in relazione agli scopi per i quali i dati sono stati raccolti o
            successivamente trattati</li>
          <li>l’attestazione che le operazioni di cui ai punti 1) e 2) sono state portate a conoscenza, anche per quanto riguarda il loro contenuto,
            di coloro ai quali i dati sono stati comunicati o diffusi, eccettuato il caso in cui tale adempimento si riveli impossibile o comporti
            un impiego di mezzi manifestamente sproporzionato rispetto al diritto tutelato</li>
          <li>chiedere al Titolare la limitazione del trattamento alle condizioni e per le finalità di cui all’<abbr title="articolo">art.</abbr>
            18 <abbr title="General data protection regulation">GDPR</abbr></li>
          <li>proporre reclamo a un’Autorità di vigilanza</li>
          <li>ricevere, in formato strutturato, di uso comune e leggibile da dispositivo automatico, i Dati personali che La riguardano forniti al
            Titolare e trasmetterli ad altro titolare ai sensi e alle condizioni dell’<abbr title="articolo">art.</abbr> 20
            <abbr title="General data protection regulation">GDPR</abbr>
          </li>
        </ol>
        <li>
          opporsi, in tutto o in parte:
        </li>
        <ol>
          <li>per motivi legittimi al trattamento dei dati personali che La riguardano, ancorché pertinenti allo scopo
            della raccolta</li>
          <li>al trattamento di dati personali che La riguardano a fini di invio di materiale pubblicitario o di vendita diretta o per
            il compimento di ricerche di mercato o di comunicazione commerciale, mediante l’uso di sistemi automatizzati di chiamata
            senza l’intervento di un operatore mediante <span lang="en">e-mail</span> e/o mediante modalità di <span lang="en">marketing</span>
            tradizionali mediante telefono e/o posta cartacea</li>
        </ol>
      </ul>
      <p>
        Si fa presente che il diritto di opposizione dell’interessato, esposto al precedente punto 2), per finalità di <span lang="en">marketing</span>
        diretto mediante modalità automatizzate si estende a quelle tradizionali e che comunque resta salva la possibilità per l’interessato di
        esercitare il diritto di opposizione anche solo in parte. Pertanto, l’interessato può decidere di ricevere solo comunicazioni mediante
        modalità tradizionali ovvero solo comunicazioni automatizzate oppure nessuna delle due tipologie di comunicazione.
      </p>
      <h2 class="paragrafo">Modalità di esercizio dei diritti</h2>
      <p>
        Potrà in qualsiasi momento esercitare i diritti inviando un’<span lang="en">e-mail</span> a DoomWiki@gmail.com
      </p>
      <h2 class="paragrafo">Informativa sui <span lang="en">cookie</span></h2>
      <p>
        Questo sito utilizza <span lang="en">cookie</span>, anche di terze parti, per migliorarne l’esperienza di navigazione e consentire a
        chi naviga di usufruire dei nostri servizi <span lang="en">online</span> e di visualizzare pubblicità in linea con le proprie preferenze.
        I <span lang="en">cookie</span> utilizzati in questo sito rientrano nelle categorie descritte di seguito.
      </p>
      <dl class="lista">
        <dt>
          <h3><span lang="en">Cookie</span> tecnici</h3>
        </dt>
        <dd>Quei cookie strettamente necessari per permettere:
          <ul>
            <li>la navigazione e fruizione del sito <span lang="en">web</span> (permettendo, ad esempio, di realizzare un acquisto o autenticarsi
              per accedere ad aree riservate, “<span lang="en">cookie</span> di navigazione o di sessione”)</li>
            <li>la raccolta di informazioni, in forma aggregata, sul numero degli utenti e su come questi visitano il sito stesso
              (“<span lang="en">cookie analytics</span>”)</li>
            <li>la navigazione in funzione di una serie di criteri selezionati (ad esempio, la lingua, i prodotti selezionati per l'acquisto,
              “<span lang="en">cookie</span> di funzionalità”) al fine di migliorare il servizio reso allo stesso</li>
          </ul>
        </dd>
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
