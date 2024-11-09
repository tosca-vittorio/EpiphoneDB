
<?php

require 'auth.php';
session_start();

//DOBBIAMO VERIFICARE PRIMA DI TUTTO SE NON ESISTE LA SESSIONE
if(!isset($_SESSION["username"]))
{
  //QUINDI NON ESISTE:
  //ALLO INDIRIZZIAMO L'UTENTE VERSO IL LOGIN
  header("Location: login.php");
  //DOPODICHE' USCIAMO
  exit;
}

# Se la funzione ci ritorna l'ID dell'utente che ha effettuato il login
if(checkAuth())
{
  # POSSIAMO INDIRIZZARE L'UTENTE VERSO LA HOME-PAGE:
  header("Location: index.php");
  exit;
}

// CONTROLLARE SE SONO SETTATI I COOKIE
// SE SONO ANCORA VALIDI CON LA AUTH.PHP


//IN QUESTO MODO IO NASCONDO IL CONTENUTO SE NON SONO EFFETTIVAMENTE LOGGATO
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <script src="https://unpkg.com/scrollreveal" defer></script>
  <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js" defer></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.min.css" integrity="sha512-BiFZ6oflftBIwm6lYCQtQ5DIRQ6tm02svznor2GYQOfAlT3pnVJ10xCrU3XuXnUrWQ4EG8GKxntXnYEdKY0Ugg==" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js" integrity="sha512-cA8gcgtYJ+JYqUe+j2JXl6J3jbamcMQfPe0JOmQGDescd+zqXwwgneDzniOd3k8PcO7EtTW6jA7L4Bhx03SXoA==" crossorigin="anonymous" defer></script>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


  <script src="info.js" defer></script>
  <script src="gazzelle.js" defer></script>
  <script src="maneskin.js" defer></script>
  <script src="einaudi.js" defer></script>
  <script src="animazioni.js" defer></script>

  <script src="index.js" defer></script>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="index_footer.css">

  <script src="album.js" defer></script>
  <link rel="stylesheet" href="album.css">



  <title>ALBUM</title>
</head>


<body>

<div id="progbar"></div>
<div id="scrollPath"></div>

  <div class="box">
    <header class="header">
      <div class="logo">
        <img src="icon/logo.png" alt="">
      </div>

      <ul class="menu">
        <li><a class='normal-text' href="index.php">Home</a></li>
        <li><a class='normal-text' href="album.php">Album</a></li>
        <li><a class='normal-text' href="api.php">API</a></li>
        <li><a class='normal-text' href="panoramica.php">Panoramica</a></li>
        <li><a class='normal-text' href="operazioni.php">Operazioni</a></li>
      </ul>

      <div class="cta">
        <a href="logout.php" class="default_button">LOGOUT</a>
      </div>

      <button id="icona_menu">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </header>
  </div>

<section class="cover">
  <div id="overlay"></div>
  <div class="cover_caption">
    <div class="cover_copy anima">
      <h2> “La musica è intorno a noi. È invisibile, ma tu l'avverti. </br>
             Tutti la sentono, ma solo qualcuno riesce ad ascoltarla.” </h2>
      <div class="cover_button"><a href=""> E tu? </a></div>
    </div>
  </div>
</section>

  <div class="contenuto anima">
    <h3 class='big-text mb20 zoom'>CARICAMENTO DINAMICO <br> HMW 2</h3>
    <p class='anima'>  Benvenuti nella prima pagina interna del sito. <br>
         Iniziamo subito specificando che questa pagina è composta fondamentalmente da due parti: <br>
         -> una STATICA <br>
         -> una DINAMICA <br><br>
    </p>
    <h3 class="med-text mb20 zoom">PARTE STATICA</h3>
    <p class='anima'>  La "Header" è una delle parti statiche della pagina e comprende semplicemente logo, menù e bottone.
         La sezione successiva l'ho definita "Cover", nella quale è situata un'immagine che svolge la funzione di sfondo.
         Sopra questa immagine ho aggiunto un effetto di "overlay" in modo da scurire l'immagine a mio piacimento e mettere, soprattutto, in risalto la scritta centrale sovrapposta all'immagine stessa.
         Inoltre, sempre all'interno della sezione "Cover", possiamo notare anche un bottone che in base alle esigenze può anche non avere una funzione ben definita. Esso può essere semplicemente
         svolgere una funzione più grafica che interattiva. Infatti, grazie ad alcuni comandi CSS, ho cercato di dare uno stile al bottone che fosse coerente sia con i colori della pagina, sia con
         i colori della scritta centrale. INFINE, arriviamo proprio a questa sezione che ho soprannominato "contenuto", in questo caso puramente testuale e statica.
    </p>
    <h3 class="med-text mb20 zoom">PARTE DINAMICA</h3>
    <p class='anima'>  Dall'ultimo blocco testuale e statico (INTERAMENTE QUESTO), <br>
         andrò a descrivere, invece, i CONTENUTI DINAMICI che susseguono dal blocco testuale in poi. <br>
         Iniziamo quindi dal "search box". Questo, è un form dove l'utente può effettuare una vera e propria ricerca fra i contenuti caricati dinamicamente dei quali parliamo subito. Ho caricato dinamicamente
         tramite, in questo caso 3, file javascript esterni in modo da poter avere una corrispondenza univoca fra una sezione e un artista; infatti, proprio da questo fattore deriva il numero di file javascript esterni
         che bisogna utilizzare solo per gli artisti da inserire dinamicamente. Il file javascript "nome_artista.js" contiene le informazioni riguardanti il singolo album, ovvero: titolo dell'album, la copertina, la tracklist e il prezzo. Queste informazioni
         vengono utilizzate dalla funzione che ho implementato "createItem(info)" che date queste informazioni da un file esterno crea un "Item". <br>
         Questo "Item" è il contenitore delle informazioni che ho ricavato dal file javascript esterno e rappresenta concretamente un album del singolo artista.
    </p>
    <h4 class='normal-text mb10 zoom'>"MOSTRA DETTAGLI" / "NASCONDI DETTAGLI"</h4>
    <p class='anima'>  Attraverso il codice CSS ho cercato di creare uno stile grafico abbastanza "minimal" mentre tramite il codice JAVASCRIPT ho implementato la sezione "Mostra Dettagli". Inizialmente ho aggiunto a questa sezione
         la classe CSS ".hidden", in maniera da poter nascondere, inizialmente, le informazioni desiderate. Utilizzando JAVASCRIPT ho creato uno script che verrà chiamato nel momento in cui l'utente scatena l'evento "click" sopra la stessa sezione "Mostra Dettagli".
         Con un procedimento molto simile, ho implementato anche la chiusura, o riscomparsa, di quest'ultima.
    </p>

    <h4 class='normal-text mb10 zoom'>"SELEZIONA" - "AGGIUNGI AI PREFERITI" <br> "DESELEZIONA" - "RIMUOVI DAI PREFERITI"</h4>
    <p class='anima'>  Infine giungiamo all'ultima parte dinamica della pagina. Ogni "Item/Album" può essere SELEZIONATO cliccando ESCLUSIVAMENTE all'interno della "CHECKBOX".
         Una volta SELEZIONATO l'Item, esso apparirà nella sezione "Preferiti", inizialmente nascosta, che conterrà tutti gli Album selezionati dall'utente. Ogni Item/Album cambia comportamento
         dopo il secondo 'click' consecutivo sulla stessa checkbox, infatti in questo caso andremo a DESELEZIONARE l'Item/Album e di conseguenza andremo a rimuoverlo anche dalla sezione "Preferiti".<br><br>
         <evidenzia>ADESSO PROVA TU!!</evidenzia>
    </p>

  </div>

  <div id='search' class='search_box zoom'>
  <div>
    <label> Cerca </label>
    <input type='text' id='search'/>
  </div>
</div>

<section id='preferiti' class='hidden'>
  <h1 id=copy>Preferiti:</h1>
  <div class='preferiti__copy'>

  </div>
</section>

<section id='artist_info' class='box zoom'>
</section>


<section class='master zoom'>
  <section id='gazzelle' class='contenitore'>
  </section>

  <section id='maneskin' class='contenitore'>
  </section>

  <section id='einaudi' class='contenitore'>
  </section>
</section>

<footer class='footer'>
  <div class="grid">
    <div class="col zoom">
      <h4 class='med-text tw'>TITOLO</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    </div>
    <div class="col zoom">
      <h4 class='normal-text tw'>TITOLO</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    </div>
    <div class="col zoom">
      <h4 class='med-text tw'>TITOLO</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="col zoom">
      <h4 class='normal-text tw'>TITOLO</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>

  <div class="wrapper anima">
    <div class="button">
      <div class="icon">
        <i class="fab fa-facebook-f"></i>
      </div>
      <span><a id='facebook' href="https://www.facebook.com/Vittorio09/">Facebook</a></span>
    </div>

    <div class="button">
      <div class="icon">
        <i class="fab fa-instagram"></i>
      </div>
      <span><a id='instagram' href="https://www.instagram.com/tosca_vittorio/">Instagram</a></span>
    </div>

    <div class="button">
      <div class="icon">
        <i class="fab fa-twitter"></i>
      </div>
      <span><a id='twitter' href="">Twitter</a></span>
    </div>

    <div class="button">
      <div class="icon">
        <i class="fab fa-github"></i>
      </div>
      <span><a id='github' href="">GitHub</a></span>
    </div>

    <div class="button">
      <div class="icon">
        <i class="fab fa-youtube"></i>
      </div>
        <span><a id='youtube' href="">YouTube</a></span>
      </div>
    </div>
    <p class='powered anima'> 2021 © Copyright Toscano Vittorio O46001514 ©</p>

</footer>



</body>
</html>
