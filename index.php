
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

  <script src="animazioni.js" defer></script>
  <link rel="stylesheet" href="index_footer.css">
  <link rel="stylesheet" href="index.css">
  <script src="index.js" defer></script>
  <title>HOME</title>
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
      <a href="" class="default_button">Contatti</a>
    </div>

    <button id="icona_menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </header>
</div>

  <section class="hero">
    <div class="hero_element anima">
      <p class="intro-text">Toscano Vittorio O46001514 presenta</p>
      <h1 class='big-text'>EPIPHONE DB PROJECT</h1>
      <?php
       ECHO "<h1 class='big-text'>Piacere di rivederti ".$_SESSION["username"]." !</h1>"
       ?>
      <a href="logout.php" class="default_button">Esci</a>
    </div>
    <video autoplay muted loop id='video_background'>
      <source src="epi.mp4" type='video/mp4'>
    </video>
  </section>

  <section class='poster mt-3'>
    <div class="poster_image anima">
      <img src="icon/cover2.JPG" alt="">
    </div>
    <div class="poster_content anima">
      <h3 class='big-text'>BENVENUTO!</h3>
      <p class='mb50'> Benvenuti nella "homepage" del mio primo sito, realizzato e implementato durante il corso di Web Programming della facoltà di Ingegneria Informatica dell'Università degli Studi di Catania.
          Con la speranza e l'ambizione di cercare l'originalità, ho pensato di utilizzare proprio le stesse sezioni di contenuto, e anche alcune pagine interne, per descrivere il lavoro che ho svolto per ottenere questi risultati.
      </p>
      <a href="https://www.dieei.unict.it/" class="default_button">DIEEI uniCT</a>
    </div>
  </section>

  <section class='background mt-3'>
    <div class="background_title anima">
      <h3 class='big-text tw'>HMW 1</h3>
    </div>

    <div class="background_text anima">
      <h4 class='med-text tw'>HOMEPAGE</h4>
      <p class='taw'> Iniziamo dalla prima pagina nonché il primo homework: l'homepage.<br>
                      La struttura dell'intera pagina è STATICA, quindi è tutto creato in HTML e stilizzato in CSS.<br>Ho cercato di scrivere il codice in maniera MODULARE (a BLOCCHI), in maniera da poter riutilizzare il codice
                      utilizzando combinazioni sempre diverse con il fine di ottenere una personalizzazione facile e molto veloce.<br> Ritengo che l'homepage di un'applicazione web abbia il compito di riassumere un po' i contenuti dell'intero sito, ecco perché ho inserito diversi
                      "blocchi di contenuto" cercando, tuttavia, di diverisificare lo stile per ognuno di essi affinché l'insieme di tutti questi elementi possa risultare quanto meno monotono possibile.
       </p>
     <h4 class='normal-text tw'>PRIMA BOZZA</h4>
     <p class='taw'>
                      In realtà la prima bozza di "homepage"
                      è completamente diversa soprattutto a livello grafico. Infatti, a causa di una tempistica stretta, non sono riuscito a consegnare una "homepage(hmw1)" elaborata come questa, tuttavia lavorando parallelamente ai successivi homework
                      sono riuscito a ridisegnare lo stile e la grafica della homepage, e di conseguenza anche delle pagine interne.
      </p>

      <h4 class='med-text tw'>HEADER + BACKGROUND VIDEO</h4>
      <p class='taw'> I cambiamenti principali e sostanziali, rispetto alla precedente grafica e struttura, sono chiaramente la sezione "HEADER" che è stata posizionata sopra la sezione "COVER", e infine proprio la stessa sezione "COVER" che non si presenta più come classico sfondo statico,
                      ma contiene un video in background che cambia totalmente l'impatto visivo con la pagina e le sensazioni che percepiamo. Per implementare questa nuova sezione, spinto dalla curiosità e dal piacere di creare veramente qualcosa di bello, oltre che funzionale, mi sono avvalso
                      di fonti esterne per studiare meglio il meccanismo di implementazione da usare. Anche se può sembrare complesso, in realtà la struttura è molto simile a quella di un semplice sfondo statico. Infatti, per esempio, l'implementazione delle scritte che si sovrappongono allo sfondo è
                      praticamente la stessa. Invece, per utilizzare un video in background anziché un immagine, ho utilizzato il tag HTML <'video'> e ad esso ho aggiunto gli attributi "autoplay" (per avviare il video in automatico), "muted"(per mutarlo e renderlo senza audio) e "loop" (per una riproduzione ciclica).
                      L'ultimo dettaglio che manca è quello che all'interno dei tag <'video'> e <'/video'> bisogna aggiungere il tag HTML <'source'> che conterrà la sorgente del video (src="video.mp4") e la tipologia del file (type='video/mp4').
                       </p>

      <h4 class='med-text tw'>ANIMAZIONI TESTUALI</h4>
      <p class='taw pb25'> Per aggiungere più DINAMICITÀ ad una pagina puramente STATICA, ho utilizzato "ScrollReveal".<br>
                      ScrollReveal è una libreria di javascript per animazioni testuali che vengono attivate nel momento in cui gli elementi entrano/escono dalla viewport. Utilizzare questa API è veramente molto facie perché non richiede nessun tipo di autorizzazione per l'utilizzo ed è molto versatile perché attraverso i "METHODS" delle API possiamo personalizzare
                      a nostro piacimento tutte le animazioni che vogliamo.<br>
                      <a href="https://scrollrevealjs.org/" id="ScrollReveal">ScrollReveal</a>
                      </p>

    </div>

  </section>

<section class='griglia_colonne'>
  <div class="grid">
    <div class="col anima">
      <h3 class="big-text">FLICKITY</h3>
    </div>
    <div class="col anima">
      <p>Ammetto di aver inserito un "carousel" con uno scopo puramente estetico, infatti anch'esso è statico. Tuttavia manca soltanto la parte dinamica gestita con le API di Flickity, anch'esse molto semplici da utilizzare e soprattutto non necessitano di autorizzazione per essere utilizzate.<br>
        <a href="https://flickity.metafizzy.co/" id="Flickity">Flickity</a>
      </p>
    </div>
  </div>
</section>


<section class='flickity'>
  <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>



  <div class="carousel-cell">
    <div class="cell_content zoom">
      test9
    </div>
  </div>

  <div class="carousel-cell">
    <div class="cell_content zoom">
      test8
    </div>
  </div>

  <div class="carousel-cell">
    <div class="cell_content zoom">
      test7
    </div>
  </div>

  <div class="carousel-cell">
    <div class="cell_content zoom">
      test6
    </div>
  </div>

  <div class="carousel-cell">
    <div class="cell_content zoom">
      test5
    </div>
  </div>

  <div class="carousel-cell">
    <div class="cell_content ">
      test4
    </div>
  </div>

  <div class="carousel-cell">
    <div class="cell_content">
      test3
    </div>
  </div>

  <div class="carousel-cell">
    <div class="cell_content">
      test2
    </div>
  </div>

  <div class="carousel-cell">
    <div class="cell_content">
      test1
    </div>
  </div>

  </div>
</section>

<section class='panel_blue mt-3'>
  <div class="grid">

    <div class="col panel_blue__text">
      <div class="grid">
        <div class="col anima">
          <h3 class='big-text tw'> CSS </h3>
        </div>
        <div class="col anima">
          <p class='tw mt-2'>Se con l'HTML andiamo a definire la struttura della nostra applicazione web, con il codice CSS andiamo a creare il design dei nostri contenuti. Uno degli strumenti principali che ho utilizzato è sicuramente Flex Blox.<br>
                             CSS Flexible Box Layout, comunemente noto come Flexbox, è un modello di layout web CSS 3 che ci permette di posizionare e allineare i nostri elementi con poche righe di codice e in diversi modi.
          </p>
        </div>
      </div>
    </div>

    <div class="col panel_blue__dots">
      <div class="dot zoom"> <a href="https://codepen.io/enxaneta/full/adLPwv/">Flexbox</a></div>
      <div class="dot zoom"> TEXT </div>
      <div class="dot zoom"> TEXT </div>
      <div class="dot zoom"> TEXT </div>
    </div>

  </div>
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
