<?php

# Andreamo a utilizzare questa funzione di checkAuth all'INTERNO DELLA PAGINA DI LOGIN


require_once 'dbconfig.php';

# Controlliamo che l'utente sia già autenticato, per non dover chiedere il login
# ogni volta. Utilizziamo una funzione che verifica lo stato di log dell'utente.
function checkAuth()
{
  # Prendiamo la variabile global "$dbconfig"
  GLOBAL $dbconfig;

  # Verifichiamo se è non è settata la variabile di sessione
  if(!isset($_SESSION["id"]))
  {
    # Adesso dobbiamo considerare 2 OPZIONI:
    #
    # 1) L'utente non è loggato
    # 2) L'utente è loggato con la modalità a lungo termine

    # Quindi controllo le variabili relative ai COOKIE:
    if(isset($_COOKIE["user_id"]) && isset($_COOKIE["token"]) && isset($_COOKIE["cookie_id"]))
    {

      # Controllo la VALIDITA' DEI COOKIE. Per farlo, interagisco con il database
      # per ricavare le INFORMAZIONI DEI COOKIE e VERIFICARE SE IL COOKIE PASSATO
      # E' ANCORA VALIDO.

      # Mi connetto con il database
      $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

      # Eseguo l'ESCAPE DELLE STRINGHE
      $cookieid = mysqli_real_escape_string($conn, $_COOKIE['cookie_id']);
      $userid = mysqli_real_escape_string($conn, $_COOKIE['user_id']);

      # DEFINISCO LA QUERY che estrarrà le informazioni dalla tabella "cookies"
      # tramite l' ID del COOKIE passato. E mando in esecuzione:
      $res = mysqli_query($conn, "SELECT * FROM cookies WHERE id = $cookieid AND user = $userid");

      if($cookie = mysqli_fetch_assoc($res))
      {
        # Leggiamo, in particolare, il valore del cookie chiamato "expires" e
        # dobbiamo verificare che NON SIA SCADUTO!

        # SE IL TEMPO ATTUALE SUPERA LA SCADENZA DEL COOKIE
        if(time() > $cookie['expires'])
        {
          # ALLORA DEVO ELIMINARE IL COOKIE SCADUTO DAL DATABASE: // il punto dopo la parentesi quadra??
          mysqli_query($conn, "DELETE FROM cookies WHERE id = ".$cookie['id']) or die(mysqli_error($conn));

          # L'UTENTE VERRA' INDIRIZZATO ALLA PAGINA DI LOGOUT
          header("Location: logout.php");
          exit;
        }

        //  MODIFICO LA DATA DI SCADENZA
        //  $expires = strtotime("+7 day");

        # ALTRIMENTI DOBBIAMO VERIFICARE CHE IL TOKEN DEL COOKIE CHE CI VIENE PASSATO SIA VALIDO
        # VERIFICANDO IL TOKEN PASSATO CON QUELLO MEMORIZZATO ALL'INTERNO DEL DATABASE:
        else if ($_COOKIE['token'] === $cookie['hash']) // se non funziona qualcosa prova ($_COOKIE['token'] === $cookie['hash'])
        {
          # MEMORIZZIAMO L'USER ID IN UNA VARIABILE DI SESSIONE
          $_SESSION["id"] = $_COOKIE["user_id"];
          # CHIUDIAMO LA CONNESSIONE
          mysqli_close($conn);
          # RITORNIAMO L'ID DELL'UTENTE REGISTRATO
          return $_SESSION["id"];
        }
      }
    }
  }
}
 ?>
