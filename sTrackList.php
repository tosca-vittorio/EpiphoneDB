<?php

  # PER LA RICHIESTA PER IL TOKEN, CI SERVONO LE CREDENZIALI OTTENUTE
  # IN FASE DI REGISTRAZIONE
  $client_id = '1c1c5548f5494973b53fea75d26e916f';
  $client_secret = '6e6a96b529764e48852d17f0dacb3224';

  # INIZIAMO UNA SESSIONE DI CURL
  $ch = curl_init();

  # SETTIAMO LA RICHIESTA E IMPOSTIAMO L'URL TRAMITE "curl_setopt()"
  # fetch("https://accounts.spotify.com/api/token")
  curl_setopt($ch, CURLOPT_URL , 'https://accounts.spotify.com/api/token');

  # RESTITUISCI IL RISULTATO COME STRINGA
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  # IMPOSTIAMO IL TIPO DI RICHIESTA
  # method:"post"
  curl_setopt($ch, CURLOPT_POST, 1);

  # IMPOSTIAMO IL BODY DELLA RICHIESTA "POST"
  # body: 'grant_type=client_credentials'
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');

  # IMPOSTIAMO NELL'HEADER IL TIPO DI AUTORIZZAZIONE
  # 'Authorization':'Basic ' + btoa(client_id + ':' + client_secret)
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Basic ".base64_encode($client_id.":".$client_secret)));

  # LEGGIAMO IL JSON DI RISPOSTA CHE OTTERREMO DALLA FUNZIONE "curl_exec()"ù
  $token = json_decode(curl_exec($ch), true);

  # CHIUDO LA SESSIONE DI CURL
  curl_close($ch);


  # ADESSO ESEGUIAMO LA RICHIESTA ALL'API REST UTILIZZANDO IL TOKEN CHE ABBIAMO
  # APPENA PRELEVATO:

  # CODIFICHIAMO LA NOSTRA QUERY DI RICHIESTA
  $query = urlencode($_POST['idAlbum']);

  # COSTRUISCO IL MIO URL:
  # 'https://api.spotify.com/v1/albums/'+ album_id +'/tracks'
  # ENDPOINT BASE + PARAMETRO "q" + IL VALORE DELL'UTENTE
  $url = "https://api.spotify.com/v1/albums/".$query."/tracks";

  # INIZIAMO UN'ALTRA SESSIONE DI CURL
  $ch = curl_init();

  # IMPOSTIAMO L'URL
  curl_setopt($ch, CURLOPT_URL , $url);

  # RITORNA UN JSON
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  # IMPOSTIAMO IL TOKEN CHE CI HA RITORNATO IL SERVER OAUTH
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer ".$token['access_token']));

  # SALVIAMO IL RISULTATO
  $res = curl_exec($ch);

  # CHIUDIAMO LA CONNESSIONE
  curl_close($ch);

  # RITORNIAMO IL RISULTATO ALL'UTENTE
  echo $res;
 ?>
