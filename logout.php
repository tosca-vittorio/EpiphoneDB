<?php

  require 'dbconfig.php';

  # Dobbiamo CANCELLARE I DATI DI SESSIONE E RITORNARE ALLA PAGINA DI LOG-IN:

  # ELIMINIAMO L'EVENTUALE SESSIONE ATTIVA, RECUPERANDOLA CON "session_start()" e poi
  # UTILIZZANDO "session_destroy()" LA ELIMINIAMO
    session_start();
    session_destroy();

  # VERIFICHIAMO LA VALIDITA' DEI COOKIE
  if(isset($_COOKIE["user_id"]) && isset($_COOKIE["token"]) && isset($_COOKIE["cookie_id"]))
  {
    # LEGGO II DATI DEI COOKIE SETTATI ED EFFETTUO L'ESCAPE DELLE STRINGHE
    $cookieid = mysqli_real_escape_string($conn, $_COOKIE["cookie_id"]);
    $userid = mysqli_real_escape_string($conn, $_COOKIE["user_id"]);

    # RICERCO I COOKIE DELL'UTENTE ALL'INTERNO DEL DATABASE
    $res = mysqli_query($conn, "SELECT id, hash FROM cookies WHERE id = $cookieid AND user = $userid");

    if($cookie = mysqli_fetch_assoc($res))
    {
      # SE TROVO ALMENO UN MATCH, VERIFICO CHE IL TOKEN DEL CLIENT SIA ANCORA VALIDO
      # ALTRIMENTI SARA' GIA' STATO ELIMINATO NELLA FUNZIONE "checkAuth()"
      if($_COOKIE['token'] === $cookie['hash'])  //if(password_verify($_COOKIE['token'], $cookie['hash'])) o se non funziona qualcosa prova ($_COOKIE['token'] === $cookie['hash'])
      {
        # ELIMINO I DATI DAL DATABASE
        mysqli_query($conn, "DELETE FROM cookies WHERE id = $cookieid");
        # CHIUDO LA CONNESSIONE CON IL DATABASE
        mysqli_close($conn);

        # ELIMINO I COOKIE
        setcookie('user_id', '');
        setcookie('cookie_id', '');
        setcookie('token', '');
      }
    }
    mysqli_close($conn);
  }

  # INFINE L'UTENTE SARA' INDIRIZZATO VERSO IL LOGIN
  header("Location: login.php");
?>
