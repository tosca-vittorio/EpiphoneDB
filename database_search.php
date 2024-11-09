<?php

  // print_r($_REQUEST);
  //LA PRIMA COSA DA FARE E' IL COLLEGAMENTO AL DATABASE
  //SUPPONIAMO DI ACCEDERE SENZA PASSWORD
  $conn = mysqli_connect("localhost", "root", "", "epiphonedb") or die ("Errore: " .mysqli_connect_error());

  //A QUESTO PUNTO PREPARIAMO LA QUERY
  $query = "SELECT *
            FROM album
            WHERE nome like '".$_REQUEST["input"]."%' ";

  //ESEGUIAMO LA QUERY
  //GLI PASSO LA CONNESSIONE($conn) E LA QUERY CHE DEVE ESSERE ESEGUITA($query)
  $res = mysqli_query($conn, $query) or die ("Errore: " .mysqli_error($conn));

  $results = array();

  if(mysqli_num_rows($res) > 0)
  {
    //A QUESTO PUNTO SIAMO IN GRADO DI UTILIZZARE LA FETCH ALLA QUALE PASSO IL RESULT SET
    //SCORRO TUTTE LE RIGHE
    while($row = mysqli_fetch_assoc($res))
    {
      array_push($results, $row);
      //IL WHILE CONTINUERA' A CICLARE
      //E ASSEGNERA' AD OGNI ITERAZIONE, A $row IL VALORE DI UNA RIGA

      //PER VEDERE QUESTO:
      //STAMPIAMO L'INTERA RIGA
      //print_r($row);

      // POSSIAMO STILIZZARE LE INFORMAZIONI COME VOGLIAMO.
    }
    echo json_encode($results);

    mysqli_free_result($res);
    mysqli_close($conn);
  }
  else
  {
    echo json_encode($results);
  }

 ?>
