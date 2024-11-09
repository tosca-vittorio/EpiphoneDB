
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

  <script src="index.js" defer></script>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="index_footer.css">
  <script src="panoramica.js" defer></script>
  <link rel="stylesheet" href="panoramica.css">



  <title>PANORAMICA</title>
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
      <h2> “La musica è intorno a noi. È invisibile, ma tu l'avverti. <br>
             Tutti la sentono, ma solo qualcuno riesce ad ascoltarla.” </h2>
      <div class="cover_button"><a href=""> E tu? </a></div>
    </div>
  </div>
</section>

  <div class="contenuto zoom" id='blue'>
    <h3 class='big-text mb50 zoom'>HOMEWORK 1</h3>

    <h3 class="med-text mb20 zoom">REGISTRAZIONE</h3>
    <p class='anima'> Questa sezione è dedicata proprio a te, che ti sei registrato nel mio sito e hai effettuato il "log-in" per poter accedere a tutti i contenuti!<br>
                      Iniziamo quindi dalla "REGISTRAZIONE", implementata in un file ".php" che contiene anche codice HTML. Lo script PHP verifica da subito se l'utente ha inviato informazioni:
                      <li class='mb50'> if (!empty($_POST["Nome"]) && !empty($_POST["Cognome"]) && !empty($_POST["Username"])
                            && !empty($_POST["Password"]) && !empty($_POST["cPassword"]) && !empty($_POST["Email"]) && !empty($_POST["Genere"]))</li>
    </p>
    <p class='anima'>
                      I dati vengono inviati tramite il FORM HTML che utilizza l'apposito " <input type='submit' name='submit' id='esempio'> " per inviare i dati alla stessa pagina "register.php":
                      <li class='mb50'><" form action='register.php' class='type_zero' name='form_dati' method='POST' "></li>
    </p>

    <h3 class="med-text mb20 mt75 zoom">CONNESSIONE AL DATABASE</h3>
    <p class='anima'>
    Ho implementato alcuni controlli che l'utente deve necessariamente rispettare, per esempio viene mostrato un errore quando le due password inserite dall'utente non coincidono, oppure viene mostrato un altro errore quando
    l'utente inserisce una mail non valida.<br> Nel momento in cui l'utente inserisce tutti i campi nel modo corretto riesce dunque a registrarsi nel sito, lo script PHP memorizza i valori che l'utente ha inserito all'interno delle apposite <'label'>
    e crea una connessione con il "DATABASE SQL":
    <li> $conn = mysqli_connect("localhost", "root", "", "database") or die ("Errore: " .mysqli_connect_error()); </li>
    </p>

    <h3 class="med-text mb20 mt75 zoom">SQL INJECTION</h3>
    <p class='anima'>
        Nella sicurezza informatica SQL injection è una tecnica di "code injection", usata per attaccare applicazioni che gestiscono dati attraverso database relazionali sfruttando il linguaggio SQL. Il mancato controllo dell'input dell'utente permette di inserire artificiosamente delle stringhe di codice SQL che saranno eseguite dall'applicazione server: grazie a questo meccanismo è possibile far eseguire comandi SQL anche molto complessi, dall'alterazione dei dati (es: registrazioni uutenti) al download completo dei contenuti nel database!
    </p>

    <h3 class="med-text mb20 mt75 zoom">SQL INJECTION (SOLUZIONE)</h3>
    <p class='anima'>
        Per ridurre il rischio di "code injection" ho dovuto eseguire, per ogni input che l'utente ha inserito, il cosiddetto "ESCAPE DELLA STRINGA":
        <li class='mb10'>  $name = mysqli_real_escape_string($conn, $_POST["Nome"]); </li>
        <li class='mb10'>  $cognome = mysqli_real_escape_string($conn, $_POST["Cognome"]); </li>
        <li class='mb10'>  $username = mysqli_real_escape_string($conn, $_POST["Username"]); </li>
    </p>

    <h3 class="med-text mb20 mt75 zoom">QUERY AL DATABASE</h3>
    <p class='anima'>
      Arrivati a questo punto bisogna preparare la QUERY per interrogare il DATABASE SQL che confronterà l'USERNAME inserito dall'utente ($username) con gli USERNAME MEMORIZZATI AL SUO INTERNO:
      <li class='mb50'> $query = "SELECT username FROM users WHERE username = '$username'"; </li>
    </p>
    <p class='anima'>
      Una volta aver preparato la QUERY per il DATABASE, possiamo ESEGUIRLA:
      <li class='mb50'>$res = mysqli_query($conn, $query) or die ("Errore: " .mysqli_error($conn));</li>
    </p>
    <p class='anima'>
      Controlliamo il numero di righe che ci ritorna la query e se ritorna un valore maggiore di 0 vuol dire che già è l'USERNAME E' GIA IN USO.
      <li class='mb50'> if(mysqli_num_rows($res) > 0) </li>
    </p>
    <p class='anima'>
      Superato questo primissimo controllo, ne vengono effetuati degli altri per verificare la correttezza dei dati inseriti e la validità degli stessi:
      <li class='mb10'> if (strlen($_POST["Password"]) < 4) #CONTROLLO LUNGHEZZA PASSWORD </li>
      <li class='mb50'> if (strcmp($_POST["Password"], $_POST["cPassword"]) != 0) #CONTROLLO VERIFICA PASSWORD </li>
    </p>
    <p class='anima'>
      Se la QUERY non ritorna nessun errore salvo un messaggio di benvenuto in una variabile php:
      <li class='mb50'>$msg = "Benvenuto $username nella Community dei Modificati!";</li>
    </p>
    <p class='anima'>
        e infine chiudiamo la connessione con il database:
        <li>mysqli_close($conn);</li>
    </p>
  </div>


  <div class="contenuto zoom" id='mblue'>
    <h3 class="med-text mb10 zoom">LOG IN</h3>
    <p class='animaX2'> Il file "login.php" contiene la primissima pagina dell'intera applicazione web ed è una delle sezioni più importanti perché ci permette di accedere a tutti i contenuti presenti all'interno del sito.
      Lo script PHP avvia subito una SESSIONE tramite " session_start()" e carica il "auth.php" che contiene la funzione di verifica dello stato di log dell'utente:
      <li class='mb50'>  include 'auth.php'; </li>
    </p>
    <p class='animaX2'>
      Se la funzione ci ritorna l'ID dell'utente che ha effettuato il login POSSIAMO INDIRIZZARE L'UTENTE VERSO LA HOME-PAGE:
      <li class='mb50'> header("Location: index.php"); </li>

    </p>
    <p class='animaX2'> Controlliamo che siano stati inviati tutti i dati, quindi che non ci siano dati mancanti:
      <li class='mb50'>  if (!empty($_POST["username"]) && !empty($_POST["password"])) </li>
    </p>
    <p class='animaX2'> Se tutti i campi sono riempiti allora mi connetto al DATABASE per interrogarlo successivamente:
      <li class='mb50'>    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));</li>
    </p>
    <p class='animaX2'> Leggiamo i dati in ingresso dopo aver eseguito l'ESCAPE delle STRINGHE:
      <li class='mb10'>  $username = mysqli_real_escape_string($conn, $_POST['username']);</li>
      <li class='mb50'>  $password = mysqli_real_escape_string($conn, $_POST['password']); </li>
    </p>
    <p class='animaX2'> A questo punto prepariamo la nostra QUERY, quindi andremo a estrarre dalla TABELLA SQL "users" i campi "id", "username" e "password", se l'USERNAME
      INSERITO DALL'UTENTE ESISTE:
      <li class='mb50'>$query = "SELECT id, username, password FROM users WHERE username = '$username'";</li>
    </p>
    <p class='animaX2'> ESEGUIAMO la QUERY:
      <li class='mb50'>    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));</li>
    </p>
    <p class='animaX2'>
      Verifichiamo il RISULTATO DELLA QUERY:
      <li class='mb50'> if(mysqli_num_rows($res) > 0) </li>
    </p>
    <p class='animaX2'>
      Se l'UTENTE ESISTE memorizzo all'interno di una variabile PHP l'ARRAY ASSOCIATIVO contente i RISULTATI DELLA QUERY:
      <li class='mb50'> $entry = mysqli_fetch_assoc($res);</li>
    </p>
    <p class='animaX2'>
      Verifico se la PASSWORD inserita dall'UTENTE è IDENTICA alla PASSWORD MEMORIZZATA all'interno della tabella "users":
      <li class='mb10'>if($_POST['password'] === $entry['password'])</li>
    </p>
    <p class='animaX2'>
      Se la PASSWORD è CORRETTA allora devo verificare se l'utente ha scelto di essere "ricordato", quindi di avere una sessione prolungata, oppure no:
      <li class='mb50'>if(!empty($_POST['ricordami']))</li>
    </p>
    <p class='animaX2'>
      Se il campo non è vuoto, quindi è stato inviato e l'utente vuole avere una sessione prolungata, allora MEMORIZZO una SESSIONE A LUNGO TERMINE per questo Utente.
      In pratica definirò una funzione "HANDLER" all'interno della tabella "cookies", la quale memorizzerà l'ID dell'UTENTE che sta effettuando l'accesso,
      la DATA di SCADENZA DELLA SESSIONE e un "HASH" che funzionerà da TOKEN per motivi di sicurezza. Quindi definisco un TOKEN RANDOMICO GENERATO DAL SERVER STESSO:
      <li class='mb50'> $token = random_bytes(12);</li>
    </p>
    <p class='animaX2'>
      Effettuo l'HASH sul TOKEN generato per motivi di sicurezza, in modo da non memorizzarlo in chiaro:
      <li class='mb50'>$hash = password_hash($token, PASSWORD_BCRYPT);</li>
    </p>
    <p class='animaX2'>
      Setto la DATA DI SCADENZA DEL TOKEN che durerà dal momento in cui l'utente effettua il LOG-IN a +7 GIORNI DOPO:
      <li class='mb50'>$expires = strtotime("+7 day");</li>
    </p>
    <p class='animaX2'>
      Al solito, preparo la QUERY per il DATABASE:
      <li class='mb50'>$query = "INSERT INTO cookies(hash, user, expires) VALUES('".$hash."', ".$entry['id'].", ".$expires.")";</li>
    </p>
    <p class='animaX2'>
      e la ESEGUO:
      <li class='mb50'>$res = mysqli_query($conn, $query) or die(mysqli_error($conn));</li>

    <p class='animaX2'>
      In caso di successo, MEMORIZZO i COOKIE:
      <li class='mb10'>setcookie("user_id", $entry['id'], $expires);</li>
      <li class='mb10'>setcookie("cookie_id", mysqli_insert_id($conn), $expires);</li>
      <li class='mb50'>setcookie("token", $token, $expires);</li>
    </p>
    <p class='animaX2'>
      Altrimenti, se l'UTENTE non desidera la sessione prolungata vengono create delle semplici VARIABILI DI SESSIONE:
      <li class='mb10'>$_SESSION["id"] = $entry['id'];</li>
      <li class='mb50'>$_SESSION["username"] = $entry['username'];</li>
    </p>
    <p class='animaX2'>
      Infine indirizzo l'utente verso la prima pagina dell'applicazione web:
      <li class='mb50'>header("Location: index.php");</li>
    </p>
    <p class='animaX2'>
      e chiudiamo la connessione:
      <li class='mb50'> mysqli_close($conn); </li>
    </p>
  </div>

  <div class="contenuto zoom" id='midblue'>
    <h3 class="med-text mb10 zoom">LOG OUT</h3>
    <p class='anima'>
      Nel caso di un errore all'interno della pagina ".php" richiesta, utilizzando "require" viene ritornato un errore e la pagina va in "failure". Includo il file di configurazione del database che ho opportunamente creato:
      <li class='mb50'>require 'dbconfig.php';</li>
    </p>
    <p class='anima'>
      Eliminiamo l'EVENTUALE SESSIONE ATTIVA, recuperandola con "session_start()" e poi utilizzando "session_destroy()" la ELIMINIAMO:
      <li class='mb10'>session_start()</li>
      <li class='mb50'>session_destroy()</li>
    </p>
    <p class='anima'>
      Verifichiamo la VALIDITA' DEI COOKIE:
      <li class='mb50'>if(isset($_COOKIE["user_id"]) && isset($_COOKIE["token"]) && isset($_COOKIE["cookie_id"]))</li>
    </p>
    <p class='anima'>
      Leggo i DATI dei COOKIE SETTATI ed effettuo l'ESCAPE DELLE STRINGHE
      <li class='mb10'>$cookieid = mysqli_real_escape_string($conn, $_COOKIE["cookie_id"]);</li>
      <li class='mb50'>$userid = mysqli_real_escape_string($conn, $_COOKIE["user_id"]);</li>
    </p>
    <p class='anima'>
      Con questa sintassi, definiamo ed eseguiamo la QUERY. Ricerco i COOKIE DELL'UTENTE ALL'INTERNO DEL DATABASE:
      <li class='mb50'>$res = mysqli_query($conn, "SELECT id, hash FROM cookies WHERE id = $cookieid AND user = $userid");</li>
    </p>
    <p class='anima'>
      Verifico i risultati della QUERY:
      <li class='mb50'>if($cookie = mysqli_fetch_assoc($res))</li>
    </p>
    <p class='anima'>
      Se trovo ALMENO UN MATCH, verifico che IL TOKEN DEL CLIENT SIA ANCORA VALIDO, ALTRIMENTI SARA' GIA' STATO ELIMINATO NELLA FUNZIONE "checkAuth()":
      <li class='mb50'>if($_COOKIE['token'] === $cookie['hash'])</li>
    </p>
    <p class='anima'>
      ELIMINO I DATI DAL DATABASE:
      <li class='mb50'>mysqli_query($conn, "DELETE FROM cookies WHERE id = $cookieid");</li>
    </p>
    <p class='anima'>
      ELIMINO I COOKIE:
      <li class='mb10'>setcookie('user_id', '');</li>
      <li class='mb10'>setcookie('cookie_id', '');</li>
      <li class='mb50'>setcookie('token', '');</li>
    </p>
    <p class='anima'>
      Infine l'utente sarà indirizzato verso il LOGIN:
      <li class='mb50'>header("Location: login.php");</li>
    </p>
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
