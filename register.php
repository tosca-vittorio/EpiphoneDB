
<?php
  $data_registrazione = date("d-m-Y");
  # Oltre alla verifica dei campi lato JAVASCRIPT è necessario effettuare un
  # controllo dei campi LATO PHP, perché il browser può essere facilmente aggirato.

  require 'dbconfig.php';

  # Controlliamo che siano stati inviati tutti i dati, quindi che non ci siano dati mancanti
  if (!empty($_POST["Nome"]) && !empty($_POST["Cognome"]) && !empty($_POST["Username"])
      && !empty($_POST["Password"]) && !empty($_POST["cPassword"]) && !empty($_POST["Email"]) && !empty($_POST["Genere"]))
  {
    # Se tutti i campi sono riempiti allora effettuiamo il controllo
    # Ci connettiamo al DATABASE
    $conn = mysqli_connect($dbconfig['host'],$dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $num_error = 0;

    # Leggiamo lo "username"
    $username = mysqli_real_escape_string($conn, $_POST['Username']);

    # Verifichiamo che non ci siano altri utenti con lo stesso "Username"
    $query = "SELECT username FROM users WHERE username = '$username'";
    # ESEGUIAMO LA QUERY che abbiamo definito
    $res = mysqli_query($conn, $query) or die("Errore:" .mysqli_error($conn));

    # Controlliamo il numero di righe che ci ritorna la query
    if(mysqli_num_rows($res) > 0)
    {
      # Se ritorna un valore maggiore di 0 vuol dire che già è l'username è in uso
      $error = "Username già in uso!";
      $num_error = $num_error + 1;
    }

    if (strlen($_POST["Password"]) < 4)
    {
      $error = "Errore durante l'inserimento della password. Inserisci almeno 4 caratteri";
      $num_error = $num_error + 1;
    }

    # CONFERMA PASSWORD
    if (strcmp($_POST["Password"], $_POST["cPassword"]) != 0)
    {
      $error = "Le password non coincidono, hai già dimenticato la tua password?!";
      $num_error = $num_error + 1;

    }

    # EMAIL
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $query = "SELECT email FROM users WHERE email = '$email'";
    $res = mysqli_query($conn, $query);

    if(mysqli_num_rows($res) > 0)
    {
      $error = "Email già in uso!";
      $num_error = $num_error + 1;
    }

    # Controlliamo che il numero di errori sia 0
    if($num_error == 0)
    {
      # Leggiamo tutte le altre stringhe di cui non abbiamo fatto l'escape
      $name = mysqli_real_escape_string($conn, $_POST["Nome"]);
      $cognome = mysqli_real_escape_string($conn, $_POST["Cognome"]);
      $gender = mysqli_real_escape_string($conn, $_POST["Genere"]);
      $password = mysqli_real_escape_string($conn, $_POST["Password"]);

      # CRIPTIAMO LA PASSWORD
      $password = password_hash($password, PASSWORD_BCRYPT);

      # PREPARIAMO LA QUERY
      $query = "INSERT INTO users VALUES('', '$name', '$cognome', '$username', '$password', '$email', '$gender', '$data_registrazione')";

      # ESEGUIAMO LA QUERY:
      # POSSIAMO METTERE "mysqli_query" DIRETTAMENTE ALL'INTERNO DELL' IF
      # Essendo una QUERY di TIPO INSERT, "mysqli_query" ritornerà un valore booleano
      # TRUE: tutto ok / FALSE: altrimenti
      if(mysqli_query($conn, $query))
      {
        # Una volta che l'utente ha effettuato la registrazione con successo
        # idealmente andrebbe indirizzato verso la pagina principale
        $_SESSION["username"] = $_POST['Username'];

        # Memorizziamo anche l'ID dell'utente
        # "mysqli_insert_id" recupera l'ultimo "id" che è stato generato tramite auto-increment
        # dall'ultima query che è stata inserita, in questo caso "INSERT", quindi
        # andrà a prendere l'id generato dall'utente appena registrato.
        $_SESSION["id"] = mysqli_insert_id($conn);

        # chiudo la connessione
        mysqli_close($conn);
        $msg = "Benvenuto $username nella Community dei Modificati!";
      }
    }
  }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="register.css">
  <script src="register.js" defer></script>

  </script>
  <title>REGISTER</title>
</head>

<body>
  <div id="progbar"></div>
  <div id="scrollPath"></div>

   <div class="box_login">


     <div class="register">

       <div class="register_copy">
         <h2>Iscriviti</h2>
         <p>È veloce e semplice</p>
       </div>

       <div class="register_logo">
         <img src="icon/logo.png" alt="">
       </div>


       <form action="register.php" id='form' class='type_zero' name='form_dati' method="POST">

         <?php

         if(isset($msg))
        {
          echo "<span name='welcome_php' class='okay'>";
          echo $msg;
          echo "</span>";
        }
        else
        {
          echo "<span name='welcome_php' class='okay hidden'>";
          echo $msg;
          echo "</span>";
        }


         if(isset($error))
         {
           echo "<span name='notExists_php' class='errore'>";
           echo $error;
           echo "</span>";
         }
         else
         {
           echo "<span name='notExists_php' class='errore hidden'>";
           echo $error;
           echo "</span>";
         }


        ?>

        <span name='error_nome' class='errore hidden'></span>
        <span name='error_cognome' class='errore hidden'></span>
        <span name='error_username' class='errore hidden'></span>
        <span name='error_cUsername' class='errore hidden'></span>
        <span name='error_password' class='errore hidden'></span>
        <span name='error_cPassword' class='errore hidden'></span>


         <div class="user_box">
           <label><input type='text' name='Nome' placeholder="Nome" id="Nome"></label>
           <label><input type='text' name='Cognome'placeholder="Cognome" id="Cognome"></label>
        </div>

      <div class="user_box2">
        <div class='username'>
          <label><input type='text' name='Username' placeholder="Username" id="Username"></label>
        </div>
        <div class="wrapper">
           <label><input type='password' name='Password' placeholder="Password" id="Password"></label>
           <span id='p'>
             <i class="fa fa-eye" aria-hidden="true" id="eyeP"></i>
           </span>
         </div>
       </div>

         <div class="verifyPassword">
           <label><input type='password' name='cPassword' placeholder="Conferma Password" id="cPassword"></label>
         </div>

         <div class="user_mail">
            <?php
                  # manteniamo il valore della mail anche se la pagina viene ricaricata in modo da non perdere il contenuto.
                  # Quindi dobbiamo riempire il campo "value" in maniera dinamica. In questo caso VERIFICHIAMO SE SONO STATI
                  # INVIATI I DATI ALLA STESSA PAGINA PHP DAL FORM SEMPRE DELLA STESSA:
             ?>
           <label><input type='text' name='Email' id="email" placeholder="E-Mail" <?php if(isset($_POST['Email'])){echo "value=".$_POST['Email'];}?>></label>
           <span id="text"></span>
         </div>

         <h3 class='mb0'>Genere</h3>
         <div class="gender_box">
             <label><input type="radio" class='genere' name="Genere" value="Maschio"> Maschio</label>
             <label><input type="radio" class='genere' name="Genere" value="Femmina"> Femmina</label>
             <label><input type="radio" class='genere' name="Genere" value="Non lo so"> Non lo so</label>
         </div>


         <div id="zero"><input type='submit'name='submit' value='Registrati'></div>
       </form>

       <div class='signup'>
         <p> Hai già un account? <a href="login.php"> Accedi!</a></p>
       </div>

     </div>
   </div>

</body>
</html>
