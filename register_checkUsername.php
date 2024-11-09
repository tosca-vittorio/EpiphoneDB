<?php

#Adesso controlliamo se l'username inserito è UNICO! Controlliamo all'interno del
#DATABASE se esiste già un "username" con lo stesso nome

#includo il file di configurazione del database che ho opportunamente creato
# Nel caso di un errore all'interno della pagina ".php" richiesta, utilizzando
# "require" viene ritornato un errore e la pagina va in "failure".
# "require" è un vincolo più stringente
require 'dbconfig.php';

# Per prima cosa settiamo l'HEADER della risposta ritornata
# application/json perché vogliamo che la pagina php ci ritorni un JSON
header("Content-Type: application/json");

# Adesso possiamo connetterci al database tramite la funzione "mysqli_connect('host', 'user', 'pssw', 'database')"
$conn = mysqli_connect($dbconfig['host'],$dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

# A questo punto LEGGIAMO IL CAMPO "q" DALL'ARRAY GET CHE CI E' STATO PASSATO DAL CLIENT
# IN MODO DA ANDARE A LEGGERE IL VALORE DELL'USERNAME DA CONTROLLARE
# EFFETTUO SEMPRE L'ESCAPE DELLA STRINGA
$username = mysqli_real_escape_string($conn, $_POST['alias']);

# Preparo la mia QUERY
$query = "SELECT username FROM users WHERE username = '$username'";
# ESEGUIAMO LA QUERY che abbiamo definito
$res = mysqli_query($conn, $query);

# CREIAMO L'ARRAY CHE DOBBIAMO CONVERTIRE IN JSON CHE VOGLIAMO RITORNATO
# VOGLIAMO RITORNATO UN JSON CON UN SINGOLO CAMPO CHE MI DICE SE L'UTENTE ESISTE O NO.
# QUINDI, RITORNIAMO UN CAMPO "EXISTS" CHE AVRA' VALORE "mysqli_num_rows($res)".
# SE QUESTO VALORE E' MAGGIORE DI ZERO, VIENE RITORNATO "TRUE", ALTRIMENTI "FALSE".
# "mysqli_num_rows" RITORNA IL NUMERO DI ELEMENTI CHE LA QUERY FORNISCE, QUINDI
# SE QUESTA CONDIZIONE RITORNA  UN VALORE MAGGIORE DI ZERO, IN QUESTO CASO
# 1 (PERCHE' L'USERNAME DEVE ESSERE UNIVOCO), ALLORA VUOL DIRE CHE L'USERNAME E'
# STATO GIA' USATO, QUINDI NON E' DISPONIBILE E TORNO "TRUE"
# ALTRIMENTI E' DISPONIBILE, E TORNO "FALSE"
# $array = ('exists' => mysqli_num_rows($res) > 0 ? true : false);

$array = array();


if(mysqli_num_rows($res) > 0)
{
  $exist = true;
  array_push($array, $exist);
}
else
{
  $exist = false;
  array_push($array, $exist);

}

# INFINE CODIFICHIAMO IN JSON
$json = json_encode($array);
# RITORNIAMO IL JSON ALL'UTENTE
echo $json;

# CHIUDIAMO LA CONNESSIONE
mysqli_close($conn);
 ?>
