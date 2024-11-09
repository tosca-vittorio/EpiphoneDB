
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

  <script src="modal.js" defer></script>
  <link rel="stylesheet" href="modal.css">

  <script src="animazioni.js" defer></script>

  <script src="index.js" defer></script>
  <link rel="stylesheet" href="index_footer.css">
  <link rel="stylesheet" href="index.css">

  <link rel="stylesheet" href="album.css">

  <script src='api.js' defer></script>
  <link rel='stylesheet' href='api.css'>

  <title>API</title>
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


<div class="contenuto zoom" id='brown'>
  <h3 class='big-text mb20 animaX2'>HMW3</h3>
  <p class='hmw3 animaX2'>Questa è la pagina interna dedicata all'implementazione e l'utilizzo di API per utilizzare informazioni esterne ricavate dal file formato JSON.
                  Le API che ho usato all'interno del sito sono:
  </p>
    <ul class='list animaX2'>
      <li><a href="https://scrollrevealjs.org/">ScrollReveal<br>(Animazoni Testuali);</a></li>
      <li><a href="https://flickity.metafizzy.co/">Flickity<br>(Carousel);</a></li>
      <li><a href="https://openweathermap.org/api">Open Weather Map<br>(Meteo);</a></li>
      <li><a href="https://developer.spotify.com/documentation/web-api/">Spotify<br>(API);</a></li>
    </ul>

    <p class='hmw3 animaX2'> Le API "ScrollReveal" e "Flickity" sono state usate principalmente per la realizzazione della "homepage". Entrambe non richiedono nessun tipo di autorizzazione
                     per essere usate, quindi non necessitano né di una 'key' né di un 'token'. Entrambe sono state descritte proprio all'interno della prima pagina del sito: la <a href="index.php">homepage</a>.<br>
    </p>
</div>

  <div class="contenuto zoom" id='blue'>
    <h3 class='big-text mb20 anima'>METEO API</h3>
    <p class='meteo_desc anima'>Questa API, dato in ingresso il nome di una qualsiasi città, mi fornisce tutte le informazioni METEREOLOGICHE.<br>
       Per prima cosa, tramite il codice JAVASCRIPT ho selezionato il "form_meteo" e ad esso ho assegnato un Listener attraverso "addEventListener" nel quale ho inserito l'evento 'submit' e l'handler 'search'.
       Successivament ho definito la funzione handler 'search', nella quale ho prima di tutto disattivato il comportamento di default (caricamento della pagina all'invio dei dati) tramite "event.preventDefault();",
       dopodiché sono andato a leggere il valore testuale dell'input inserito dall'utente e, prima di andare ad effettuare la richiesta HTTP con "fetch()" ho codificato il valore di input tramite "encodeURIComponent".
       Dato che questa API richiede una 'key' che viene consegnata in fase di registrazione, all'interno della richiesta ho aggiunto, oltre all'endpoint della API, il valore di input inserito dall'utente e la 'key' che ho ottenuto in fase di registrazione.
       <li class='fs50 anima'>fetch('https://api.openweathermap.org/data/2.5/weather?q=' + input_value + '&appid=' + key).then(onResponse).then(onJson)</li>

                    <p class='meteo_desc mt25 anima'> Una volta effettuata la richiesta HTTP ricevo una "promise" che mi permette di utilizzare il metodo ".then" che prima, chiama la funzione "onResponse", nella quale estraggo il file JSON dalla "response", e dopo in cascata
                                viene chiamata anche la funzione "onJson", alla quale passerò in ingresso il file JSON estratto nella precedente funzione. A questo punto, sempre all'interno della funzione "onJson", prima di tutto ho estratto le informazioni che volevo
                                memorizzare, successivamente ho definito una funzione
                                <li class='anima'>Meteo(nome, id, nazione, longitudine, latitudine, temperatura, max, min, percepita, umidità, pressione, vel_vento, ang_vento, descrizione);</li>
                                <p class='meteo_desc mt25 anima'>
                                  alla quale ho passato tutte le informazioni estratte dal JSON. All'interno della funzione "Meteo()" ho creato dinamicamente tutti gli elementi HTML che avrebbero contenuto le informazioni memorizate, tramite codice javascript.
                                  Intenzionalmente ho deciso di non cancellare i contenuti creati in precedenza, anzi attraverso la proprietà CSS "Flexbox" ho imposto una direzione del tipo: <br>"flex-direction: column-reverse;".
                                </p>
                    </p>
    </p>

    <p class='meteo_desc anima'>
      Per GARANTIRE LA SICUREZZA dei DATI SENSIBILI quali CHIAVI(KEYS) E CREDENZIALI OTTENUTE IN FASE DI REGISTRAZIONE per utilizzare le API REST anziché effettuare una fetch alle API REST tramite un file JAVASCRIPT ho utilizzato un file PHP.
      <br>Da un file JAVASCRIPT effettuiamo una RICHIESTA ASINCRONA ad un file PHP:
        <li class='anima mb50'> fetch("sMeteo.php", {method: "post", body:formData}).then(onResponse).then(onJson); </li>
        <p class='meteo_desc anima'>
          In questo modo andrò ad effettuare la RICHIESTA ALL'API REST TRAMITE "curl" in PHP, in modo da tenere nascoste le credenziali delle varie APIs.
        </p>
    </p>



    <form id="form_meteo" class='zoom'>
      <input type="text" id='input_meteo' placeholder="Inserisci una città">
      <input type="submit" class='button' value="Submit">
    </form>

    <section id='meteo'>

    </section>
  </div>


  <div class="contenuto zoom" id='green'>
    <h3 class='big-text mb20 animaX2'>SPOTIFY API</h3>
    <p class='spot_desc animaX2'> Iniziamo descrivendo le caratteristiche generali delle web API SPOTIFY for developers. <br>
    </p>
    <h3 class='med-text mb10 animaX2'>OAuth 2.0</h3>
    <p class='spot_desc animaX2'> OAuth 2.0 è un protocollo di autenticazione per API REST. Il client effettua una richiesta al server di autenticazione, il server verifica le credenziali
                          e restituisce un "TOKEN" che viene utilizzato dal client per le richieste al servizio. Spotify fornisce delle API accessibili tramite OAuth 2.0.<br>
                          Al momento della registrazione, l'utente che vuole accedere al servizio riceve le credenziali: "client_id" e "client_secret". <bt> La richiesta del "TOKEN"
                          avviene mediante metodo HTTP. I dati che dobbiamo trasmettere sono le credenziali personali, ottenute in fase di registrazione, che dobbiamo mettere all'interno
                          di una variabile "grant_type=client_credentials", ma questo lo vedremo nel dettaglio successivamente.
    </p>
    <h3 class='med-text mb10 animaX2'>Get TOKEN</h3>
    <p class='spot_desc animaX2'> Anche in questo caso ho iniziato selezionando, tramite codice javascript, il "form_music" e ad esso ho assegnato un Listener attraverso "addEventListener" nel quale ho inserito l'evento 'submit'
                          e l'handler 'searchAlbum'. Nel caso di OAuth 2.0 abbiamo 2 richieste fetch da effettuare, ovvero la prima per ottenere il token e la seconda per la richiesta effettiva delle API.<br>
                          Quindi all'interno della funzione handler 'searchAlbum' ho effettuato la prima richiesta "fetch()" utilizzando l'endpoint per la richiesta del "TOKEN":
                          <li class='fs animaX2'>fetch("https://accounts.spotify.com/api/token",</li>

                          <p class='spot_desc animaX2'> e ho aggiunto dei parametri descrittivi della richiesta POST che devo effettuare;<br>
                                                Qui sto specificando il metodo per il token, che è di tipo POST
                                                <li class'animaX2'>method:"post",</li>
                                                <p class='spot_desc animaX2'>
                                                                      passiamo le nostre credenziali nell'URL quando effettuiamo la richiesta di tipo GET
                                                                      <li>body: 'grant_type=client_credentials',</li>
                                                                      <p class='spot_desc animaX2'>
                                                                                           Sucessivamente ho specificato degli "Headers" aggiuntivi:
                                                                                           <li>headers:</li>
                                                                                           <li>'Content-Type':'application/x-www-form-urlencoded',</li>
                                                                                           <p class='spot_desc animaX2'>
                                                                                             qui inserisco il "client_id" e il "client_secret" che ottengo in fase di registrazione
                                                                                             <li class='animaX2'>'Authorization':'Basic ' + btoa(client_id + ':' + client_secret)</li>
                                                                                             <p class='spot_desc animaX2'>
                                                                                                                  Chiudo la funzione fetch e chiamo le funzioni "onTokenResponse" e "onTokenJson"
                                                                                                                  <li class='fs animaX2'>.then(onTokenResponse).then(onTokenJson);</li>
                                                                                             <p class='spot_desc animaX2'>
                                                                                               Una volta effettuata la richiesta HTTP ricevo una "promise" che mi permette di utilizzare il metodo ".then" che prima, chiama la funzione "onTokenResponse", nella quale estraggo il file JSON dalla "response", e dopo in cascata viene chiamata anche la funzione "onTokenJson", alla quale passerò in ingresso il file JSON estratto nella precedente funzione e potrò ottenere il "TOKEN" tramite l'attributo ".access_token" -> ("token = json.access_token").
                                                                                             </p>
                                                                                             </p>
                                                                                           </p>
                                                                      </p>
                                                </p>
                          </p>
    </p>
    <h3 class='med-text mb10 animaX2'>Get an ALBUM</h3>
    <p class='spot_desc animaX2'>
                          Fatto questo, ho implementato la funzione "searchAlbum", la quale farà richiesta alle API di SPOTIFY per interogare il database. Anche in questo caso ho disattivato il comportamento di default del form (caricamento della pagina all'invio dei dati) tramite "event.preventDefault();", e ho memorizzato l'input testuale inserito dall'utente, opportunamente codificato attraverso "encodeURIComponent". A questo punto ho effettuato la richiesta asincrona
                          alle REST API di Spotify, utilizzando l'opportuno "endpoint" e aggiungendo il nome dell'album inserito dall'utente:
                          <li class='animaX2'>fetch('https://api.spotify.com/v1/search?type=album&q=' + album_value,</li>
                          <p class='spot_desc animaX2'>
                              All'interno della fetch, oltre ad inserire il relativo "endpoint", bisogna allegare il token per ogni richiesta d'informazioni all'interno di "headers":
                              <li class='animaX2'> 'Authorization': 'Bearer ' + token </li>
                              <p class='spot_desc animaX2'>
                                Chiudo la "fetch" e chiamo le funzioni "onResponseAlbum" e "onJsonAlbum"
                                <li class='animaX2'> .then(onResponseAlbum).then(onJsonAlbum); </li>
                              </p>
                          </p>
    </p>

    <p class='spot_desc mt-50 animaX2'>
                          La procedura è sempre la stessa.<br>
                          Prima, viene chiamata la funzione "onResponseAlbum" che richiede una "response" come parametro d'ingresso dalla quale ho estratto il JSON che ho successivamente passato come parametro alla funzione "onJsonAlbum", che viene chiamata in cascata subito dopo. All'interno di "onJsonAlbum" ho memorizzato tutte le informazioni che desideravo, prima in delle variabili javascript, e dopo aver creato dinamicamente gli elementi HTML che avrebbero contenuto i dati ricavati dal JSON,
                          ho deciso di memorizzare le informazioni proprio nell'elemento html "<'div'>", attraverso degli attributi data che ci permettono di aggiungere informazioni extra su elementi semantici HTML. Così facendo, ho da prima creato il titolo dell'album insieme alla copertina dello stesso, associando, però, proprio all'immagine di copertina un Listener che attiva una "ModalView" all'event 'click'. Inoltre, ho deciso di personalizzasre la "ModalView" mostrando, non solo la copertina dell'album ingrandita, ma anche una sezione testuale contente dettagli dell'album stesso.<br><br>

                          Ho deciso, dunque, di non usare subito tutti i dati ricavati dal JSON, ma di conservarne alcuni, tramite "attributi data", per utilizzarli successivamente all'interno della funzione "onClick", nella quale creo gli elementi da appendere all'interno della "ModalView".
  </p>
  <h3 class='med-text mb10 animaX2'>Get an Album's Tracks</h3>
  <p class='spot_desc animaX2'>
                        Operando similmente a prima, ho effettuato un'altra richiesta di informazioni, questa volta relativa alla "tracklist" contenuta in ogni "Album".
                        Per creare una richiesta valida ho dovuto memorizzare, dalla "fetch()" precedente, l'ID dell'Album e dell'Artista per ogni elemento creato dinamicamente.
                        In questo modo sono riuscito a reperire le informazioni necessarie per questa richiesta e attraverso un ciclo "FOR" ho effettuato una "fetch()" per ogni Album.
                        <li class='animaX2'> fetch('https://api.spotify.com/v1/albums/'+ albumID +'/tracks',</li>
                        <p class='spot_desc animaX2'>
                            All'interno della fetch, oltre ad inserire il relativo "endpoint", bisogna allegare il token per ogni richiesta d'informazioni all'interno di "headers":
                            <li class='animaX2'> 'Authorization': 'Bearer ' + token </li>
                            <p class='spot_desc animaX2'>
                              Chiudo la "fetch" e chiamo le funzioni "onResponseTracks" e "onJsonTracks"
                              <li class='animaX2'> .then(onResponseTracks).then(onJsonTracks); </li>
                            </p>
                        </p>
  </p>

  <p class='meteo_desc anima'>
    Per GARANTIRE LA SICUREZZA dei DATI SENSIBILI quali CHIAVI(KEYS) E CREDENZIALI OTTENUTE IN FASE DI REGISTRAZIONE per utilizzare le API REST anziché effettuare una fetch alle API REST tramite un file JAVASCRIPT ho utilizzato un file PHP.
    <br>Da un file JAVASCRIPT effettuiamo una RICHIESTA ASINCRONA ad un file PHP:
      <li class='anima mb50'> fetch("sAlbum.php", {method: "post", body:formData}).then(onResponseAlbum).then(onJsonAlbum); </li>
      <p class='meteo_desc anima'>
        In questo modo andrò ad effettuare la RICHIESTA ALL'API REST TRAMITE "curl" in PHP, in modo da tenere nascoste le credenziali delle varie APIs.
      </p>
  </p>
  <p class='spot_desc animaX2'>
    Infine, ecco il risultato dell'implementazione completa:
  </p>
  <form id='form_music' class='zoom'>

    <input type='text' id='album_input' placeholder="Inserisci il nome dell'album e l'autore">
    <input type='submit' id='submit' value='Cerca'>
  </form>
  </div>




    <section id='album__view' class='spotify_green'>
    </section>

    <section id='modalView' class='hidden'>
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

  <div class="wrapper zoom">
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
    <p class='powered zoom'> 2021 © Copyright Toscano Vittorio O46001514 ©</p>

</footer>



</body>
</html>
