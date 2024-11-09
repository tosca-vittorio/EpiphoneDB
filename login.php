
<?php

  session_start();

  # Includiamo la nostra funzione di verifica log
  include 'auth.php';

  # Se la funzione ci ritorna l'ID dell'utente che ha effettuato il login
  if(checkAuth())
  {
    # POSSIAMO INDIRIZZARE L'UTENTE VERSO LA HOME-PAGE:
    header("Location: index.php");
    exit;
  }


  # Controlliamo che siano stati inviati tutti i dati, quindi che non ci siano dati mancanti
  if (!empty($_POST["username"]) && !empty($_POST["password"]))
  {


    # Se tutti i campi sono riempiti allora effettuiamo il controllo
    # Ci connettiamo al DATABASE
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));


    # Leggiamo i dati in ingresso dopo aver eseguito l'ESCAPE delle STRINGHE:
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    # Definiamo la QUERY:
    $query = "SELECT id, username, password FROM users WHERE username = '$username'";

    # MANDIAMO IN ESECUZIONE LA QUERY:
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    # VERIFICHIAMO IL RISULTATO
    if(mysqli_num_rows($res) > 0)
    {
      # L'UTENTE ESISTE
      # QUINDI MEMORIZZO ALL'INTERNO DI UNA VARIABILE L'ARRAY ASSOCIATIVO
      # IN MODO DA SALVARE TUTTE LE INFORMAZIONI
      $entry = mysqli_fetch_assoc($res);

      # VERIFICO LA PASSWORD


      if($_POST['password'] === $entry['password']) //if (password_verify($_POST['password'], $entry['password'])) //if($_POST['password'] === $entry['password'])
      {
        # VERIFICO SE L'UTENTE VUOLE ESSERE RICORDATO
        if(!empty($_POST['ricordami']))
        {
          # SE IL CAMPO NON E' VUOTO, QUINDI E' STATO INVIATO, ALLORA MEMORIZZO
          # UNA SESSIONE A LUNGO TERMINE PER QUESTO UTENTE. PER FARE QUESTO,
          # MEMORIZZO UNA FUNZIONE HANDLER ALL'INTERNO DELLA TABELLA "cookies"
          # LA QUALE MEMORIZZERA' L'ID DELL'UTENTE CHE STA EFFETTUANDO L'ACCESSO,
          # LA DATA DI SCADENZA DELLA SESSIONE, E UN "HASH" CHE FUNZIONERA' DA TOKEN PER
          # MOTIVI DI SICUREZZA.

          # QUINDI, DEFINIAMO UN TOKEN RANDOMICO GENERATO DAL SERVER STESSO E
          # SUCCESSIVAMENTE INSERITO ALL' INTERNO DEL DATABASE:
          $token = random_bytes(12);

          # EFFETTUIAMO L'HASH PER MOTIVI DI SICUREZZA SUL TOKEN GENERATO.
          # NON LO MEMORIZZIAMO IN CHIARO:
          $hash = password_hash($token, PASSWORD_BCRYPT);

          # SETTIAMO LA DATA DI SCADENZA DEL TOKEN
          # IL TEMPO DALL'ISTANTE IN CUI LOGGA A + 7 GIORNI DOPO:
          $expires = strtotime("+7 day");

          # PREPARO LA QUERY
          $query = "INSERT INTO cookies(hash, user, expires) VALUES('".$hash."', ".$entry['id'].", ".$expires.")";
          # ESEGUIAMO LA QUERY
          $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

          # IN CASO DI SUCCESSO, MEMORIZZIAMO I CAMPI CHE ABBIAMO INSERITO ALL'INTERO DELLA TABELLA COOKIE
          # NEI COOKIE DEL SERVER:
          setcookie("user_id", $entry['id'], $expires);
          setcookie("cookie_id", mysqli_insert_id($conn), $expires);
          setcookie("token", $token, $expires);
        }
          # ALTRIMENTI, MEMORIZZIAMO TUTTO ALL'INTERNO DI DUE VARIABILI DI SESSIONE
          $_SESSION["username"] = $entry['username'];
          $_SESSION["id"] = $entry['id'];

        header("Location: index.php");
        mysqli_close($conn);
      }

    }
      $error = "Dati non corretti.";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel='stylesheet' href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="login.css">
  <script src='login.js' defer></script>
  <title>LOGIN</title>
</head>

<body>

  <div id="progbar"></div>
  <div id="scrollPath"></div>

   <div class="box_login">


     <div class="login_copy">
       <h3>Effettua il login per continuare</h3>
     </div>

     <div class="login">



       <div class="login_logo">
         <img src="icon/logo.png" alt="">
       </div>



       <form action="login.php" class='type_zero' name='form_dati' method="POST">
         <?php
         if(isset($error))
         {
           echo "<span name='notExists_php' class='errore'>";
           echo $error;
           echo "</span>";
         }
        ?>
         <span name='error_username' class='errore hidden'></span>
         <span name='error_password' class='errore hidden'></span>
         <label><input type='text' name='username' placeholder="username" id="username"></label>
         <div class="wrapper">
           <label><input type='password' name='password' placeholder="password" id="password"></label>
           <span>
             <i class="fa fa-eye" aria-hidden="true" id="eye"></i>
           </span>
         </div>

         <div class='checkbox'>
           <label><input type="checkbox" id='check' name="ricordami" value="remember">Ricordami</label>
         </div>

         <div id="zero"><input type='submit' value='Accedi'></div>
         <div class="option">OR</div>
       </form>

       <div class="fblink">
         <span class="fab fa-facebook"></span>
         <a href="">Log in with Facebook</a>
       </div>

       <div class="forget-id">
         <a href="">Password dimenticata</a>
       </div>

       <div class='signup'>
         <p> Non hai un account? <a href="register.php"> Iscriviti!</a> </p>
       </div>

     </div>
   </div>

</body>
</html>
