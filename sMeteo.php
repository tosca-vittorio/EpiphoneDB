<?php

  # PER LA RICHIESTA CI SERVONO LE CREDENZIALI OTTENUTE IN FASE DI REGISTRAZIONE
  $key = 'eb550879b9b84a699d3aec96b74355b5';

  # INIZIAMO UNA SESSIONE DI CURL
  $ch = curl_init();

  # CODIFICHIAMO LA NOSTRA QUERY DI RICHIESTA
  $query = urlencode($_POST['city']);

  # COSTRUISCO IL MIO URL:
  # https://api.openweathermap.org/data/2.5/weather?q=' + input_value + '&appid=' + key
  # ENDPOINT BASE + PARAMETRO "q" + IL VALORE DELL'UTENTE
  $url = "https://api.openweathermap.org/data/2.5/weather?q=".$query."&appid=".$key;

  # INIZIAMO UN'ALTRA SESSIONE DI CURL
  $ch = curl_init();

  # IMPOSTIAMO L'URL
  curl_setopt($ch, CURLOPT_URL , $url);

  # RITORNA UN JSON
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  # SALVIAMO IL RISULTATO
  $res = curl_exec($ch);

  # CHIUDIAMO LA CONNESSIONE
  curl_close($ch);

  # RITORNIAMO IL RISULTATO ALL'UTENTE
  echo $res;
 ?>
