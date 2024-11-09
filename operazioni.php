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

  <script src="index.js" defer></script>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="index_footer.css">

  <script src="operazioni.js" defer></script>
  <link rel="stylesheet" href="operazioni.css">



  <title>OPERAZIONI</title>
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
        <li><a class='normal-text' href="operazioni.html">Operazioni</a></li>
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
      <h2> “La musica è intorno a noi. È invisibile, ma tu l'avverti. <br>
             Tutti la sentono, ma solo qualcuno riesce ad ascoltarla.” </h2>
      <div class="cover_button"><a href=""> E tu? </a></div>
    </div>
  </div>
</section>

<div class="pagination mb50">
  <ul>
    <li class="numb active"><a href="operazioni.php"><span>1</span></a></li>
    <li class="numb"><a href="operazioni2.php"><span>2</span></a></li>
  </ul>
</div>

<div class="main zoom">
  <div class="gradient_border" id="box_border">
    <div class="descrizione">
      <h3 class='big-text  mb50'>UTENTI REGISTRATI</h3>
      <p class=' mb10'>
        Questa operazione consente all'utente di visualizzare tutti gli altri utenti che hanno effettuato la registrazione al sito.<br>
        Dal file "operazioni.js" viene effettuata una FETCH ASINCRONA (AJAX) ad un FILE.PHP:
        <li class=' mb25'>fetch("http://localhost/PHP%20PROJECTS/panoramica%20sito/utenti.php")</li>
      </p>
      <p class=' mb10'>
        Mi collego al DATABASE SQL:
        <li class='mb25'> $conn = mysqli_connect("localhost", "root", "", "database") or die ("Errore: " .mysqli_connect_error()); </li>
      </p>
      <p class=" mb10">
        interrogo il DATABASE con una semplice QUERY:
        <li class=' mb25'>$query = "SELECT * FROM users"; </li>
      </p>
      <p class=' mb10'>
        Eseguo la QUERY:
        <li class='mb25'> $res = mysqli_query($conn, $query) or die ("Errore: " .mysqli_error($conn)); </li>
      </p>
      <p class=' mb10'>
        Scorro tutte le righe:
        <li class='mb25'> while($row = mysqli_fetch_assoc($res)) </li>
      </p>
      <p class=" mb10">
        Memorizzo tutti i risultati della query all'interno di un ARRAY PHP "$utenti":
        <li class=' mb25'>array_push($utenti, $row); </li>
      </p>
      <p class=" mb10">
        e infine converto questo ARRAY IN UN JSON:
        <li class=' mb50'>echo json_encode($utenti); </li>
      </p>
      <p class="">
        Una volta ottenuto il JSON dalla FETCH ASINCRONA effettuata in locale, sono in grado, tramite il codice JAVASCRIPT, di creare dinamicamente nuovi elementi HTML che ospiteranno le informazioni contenute nel file JSON.
      </p>
      <div class="pulsantiera">
        <button type="button" class="button" id='showUsers'>Utenti Registrati</button>
        <button type="button" class="button hidden" id='hiddenUsers'>Nascondi</button>
      </div>
      <section id='viewUsers'>
      </section>
    </div>
  </div>
</div>

<div class="main zoom">
  <div class="gradient_border" id="box_border">
    <div class="descrizione">
      <h3 class='big-text  mb50'>PARTNERSHIP</h3>
      <p class=' mb10'>
        Questa operazione consente all'utente di visualizzare tutti gli artisti che hanno deciso di essere nostro partner.<br>
      </p>
      <div class="pulsantiera">
        <button type="button" class="button" id='showArtists'>Artisti</button>
        <button type="button" class="button hidden" id='hiddenArtists'>Nascondi</button>
      </div>
      <section id='viewArtists'>
      </section>
    </div>
  </div>
</div>

<div class="main zoom">
  <div class="gradient_border" id="box_border">
    <div class="descrizione">
      <h3 class='big-text  mb50'>VIENI A TROVARCI NEI NOSTRI STORE</h3>
      <p class=' mb10'>
        Questa operazione consente all'utente di visualizzare tutti i nostri negozi.<br>
      </p>
      <div class="pulsantiera">
        <button type="button" class="button" id='showStores'>Negozi</button>
        <button type="button" class="button hidden" id='hiddenStores'>Nascondi</button>
      </div>
      <section id='viewStores'>
      </section>
    </div>
  </div>
</div>

<div class="main zoom">
  <div class="gradient_border" id="box_border">
    <div class="descrizione">
      <h3 class='big-text  mb50'>I NOSTRI CLIENTI</h3>
      <p class=' mb10'>
        Questa operazione consente all'utente di visualizzare tutti i clienti che hanno acquistato utilizzando il sito.<br>
      </p>
      <div class="pulsantiera">
        <button type="button" class="button" id='showClients'>Clienti</button>
        <button type="button" class="button hidden" id='hiddenClients'>Nascondi</button>
      </div>
      <section id='viewClients'>
      </section>
    </div>
  </div>
</div>

<div class="pagination">
  <ul>
    <li class="numb active"><a href="operazioni.php"><span>1</span></a></li>
    <li class="numb"><a href="operazioni2.php"><span>2</span></a></li>
  </ul>
</div>

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
