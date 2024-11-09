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

  <script src="operazioni2.js" defer></script>
  <link rel="stylesheet" href="operazioni.css">
  <title>OPERAZIONI 2</title>
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
    <li class="numb "><a href="operazioni.php"><span>1</span></a></li>
    <li class="numb active"><a href="operazioni2.php"><span>2</span></a></li>
  </ul>
</div>

<div class="main zoom">
  <div class="gradient_border" id="box_border">
    <div class="descrizione">
      <h3 class='big-text  mb50'>I NOSTRI TECNICI</h3>
      <p class=' mb10'>
        Questa operazione consente all'utente di visualizzare tutti i tecnici che lavorano per noi.<br>
      </p>
      <div class="pulsantiera">
        <button type="button" class="button" id='showWorkers'>Ingegneri</button>
        <button type="button" class="button hidden" id='hiddenWorkers'>Nascondi</button>
      </div>
      <section id='viewWorkers'>
      </section>
    </div>
  </div>
</div>

<div class="main zoom">
  <div class="gradient_border" id="box_border">
    <div class="descrizione">
      <h3 class='big-text  mb50'>I NOSTRI ALBUM</h3>
      <p class=' mb10'>
        Questa operazione consente all'utente di visualizzare gli articoli all'interno del database.<br>
        Inizialmente non ho previsto la presenza di una copertina per i miei album in database, ma successivamente ho voluto aggiungerle. Per farlo ho creato in un secondo DATABASE SQL una tabella "covers" contenente tutti
        gli URL relativi ad ogni copertina degli album memorizzati. Inizialmente effettuo una prima FETCH AJAX ASINCRONA al file "album.php":
        <li class='mb50'> fetch("http://localhost/PHP%20PROJECTS/panoramica%20sito/album.php") </li>
      </p>
      <p class=' mb10'>
        Mi collego al DATABASE SQL:
        <li class='mb50'>  $conn = mysqli_connect("localhost", "root", "", "epiphonedb") or die ("Errore: " .mysqli_connect_error()); </li>
      </p>
      <p class=' mb10'>
        definisco la QUERY per interrogare il DATABASE:
        <li class='mb50'> $query = "SELECT * FROM album"; </li>
      </p>
      <p class=' mb10'>
        Eseguo la QUERY:
        <li class='mb50'> $res = mysqli_query($conn, $query) or die ("Errore: " .mysqli_error($conn)); </li>
      </p>
      <p class=' mb10'>
        Scorro tutte le righe:
        <li class='mb50'> while($row = mysqli_fetch_assoc($res)) </li>
      </p>
      <p class=' mb10'>
        Memorizzo tutti i risultati della query all'interno di un ARRAY PHP "$album":
        <li class='mb50'> array_push($album, $row); </li>
      </p>
      <p class=' mb10'>
        e infine converto questo ARRAY IN UN JSON:
        <li class='mb50'> echo json_encode($utenti); </li>
      </p>
      <p class=' mb10'>
        Successivamente, all'interno della funzione "onJsonAlbums" effettuo la SECONDA FETCH AJAX ASINCRONA per reperire anche le cover degli album stessi:
        <li class='mb10'> function onJsonAlbums(json) </li>
        <li class='mb50'> fetch("http://localhost/PHP%20PROJECTS/panoramica%20sito/cover.php") </li>
      </p>
      <p class=' mb10'>
        Una volta effettuata la richiesta per il JSON delle COVER, creo dinamicamente gli elementi e utilizzo gli ATTRIBUTI DATASET per memorizzare all'interno di ogni tag HTML <'div'> un dataset univoco:
        <li class='mb50'> album.dataset.id = album_id; </li>
      </p>
      <p class=' mb10'>
        Mi collego al SECONDO DATABASE SQL:
        <li class='mb50'> $conn = mysqli_connect("localhost", "root", "", "database") or die ("Errore: " .mysqli_connect_error()); </li>
      </p>
      <p class=' mb10'>
        definisco la QUERY per interrogare il DATABASE:
        <li class='mb50'> $query = "SELECT * FROM covers"; </li>
      </p>
      <p class=' mb10'>
        Eseguo la QUERY:
        <li class='mb50'> $res = mysqli_query($conn, $query) or die ("Errore: " .mysqli_error($conn)); </li>
      </p>
      <p class=' mb10'>
        Scorro tutte le righe:
        <li class='mb50'> while($row = mysqli_fetch_assoc($res)) </li>
      </p>
      <p class=' mb10'>
        Memorizzo tutti i risultati della query all'interno di un ARRAY PHP "$cover":
        <li class='mb50'> array_push($cover, $row); </li>
      </p>
      <p class=' mb10'>
        e infine converto questo ARRAY IN UN JSON:
        <li class='mb50'> echo json_encode($cover); </li>
      </p>
      <p class=' mb10'>
        Adesso all'interno della funzione "onJsonCovers" effettuo il MATCHING fra i SINGOLI ALBUM e le relative COVER. Grazie all'utilizzo degli attributi "dataset" sono riuscito correttamente a matchare i risultati:
        <li class='mb25'> if(cover_id === album_id) </li>
      </p>
      <div class="pulsantiera">
        <button type="button" class="button" id='showAlbums'>Album</button>
        <button type="button" class="button hidden" id='hiddenAlbums'>Nascondi</button>
      </div>
      <section id='viewAlbums'>
      </section>

      <div class="MODpulsantiera">
        <button type="button" class="button" id='searchAlbums'>Ricerca Album</button>
        <button type="button" class="button hidden" id='hiddenSearch'>Nascondi</button>
      </div>
      <section id='viewSearch' class='hidden'>
        <div class='main'>
          <p class=' mb10'>
              CONTROLLA SE ABBIAMO L'ALBULM DEI TUOI SOGNI ALL'INTERNO DEL NOSTRO DATABASE:
          </p>
          <span name='error_search' class='errore hidden'></span>
          <span name='search_found' class='errore hidden'></span>
          <form class='type_two' name='search' action="database_search.php" method="POST">
            <label><input id='input_search' type='text' name='searchAlbum' placeholder="INSERISCI NOME ALBUM" autocomplete="off"></label>
            <label>&nbsp;<input id='submit_search' type='submit'></label>
          </form>
        </div>
        <section id='viewRisultati'>
        </section>
      </section>

    </div>
  </div>
</div>

<div class="main zoom">
  <div class="gradient_border" id="box_border">
    <div class="descrizione">
      <h3 class='big-text  mb50'>CHE ALBUM HANNO ACQUISTATO I NOSTRI CLIENTI?</h3>
      <p class=' mb10'>
        Questa operazione consente all'utente di inserire, all'interno di un FORM HTML, l'ID di un CLIENTE in modo da visualizzare gli ALBUM CHE HA ACQUISTATO .<br>
      </p>
      <div class="pulsantiera">
        <button type="button" class="button" id='showOp1'>Operazione 1</button>
        <button type="button" class="button hidden" id='hiddenOp1'>Nascondi</button>
      </div>
      <section id='viewOp1Form' class='hidden'>
        <div class='main'>
          <span name='error_op1' class='errore hidden'></span>
          <form class='type_two' name='op1' action="operazione1.php" method="POST">
            <label><input id='op1' type='text' name='id' placeholder="ID CLIENTE"></label>
            <label>&nbsp;<input id='op1_submit' type='submit'></label>
          </form>
        </div>
        <section id='viewOp1'>
        </section>
      </section>
    </div>
  </div>
</div>






<div class="pagination">
  <ul>
    <li class="numb "><a href="operazioni.php"><span>1</span></a></li>
    <li class="numb active"><a href="operazioni2.php"><span>2</span></a></li>
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
