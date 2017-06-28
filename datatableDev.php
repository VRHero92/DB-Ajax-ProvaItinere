<?php

// Avvia la sessione
session_start();

include("db.php");

// Controlla ruolo
if($_SESSION["type"] != 1)
{
	die("Permesso negato");
}

// Crea connessione al DB
$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);


$result = mysqli_query($conn, "SELECT * FROM SVILUPPATORE");

$num_rows = mysqli_num_rows($result);

$res = array();

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $res[] = array(
	  'PIVA'=> $row['PIVA'],
      'NOME' => $row['NOME'],
	  'COGNOME'=>$row['COGNOME'],
    'TELEFONO'=>$row['TELEFONO']
   );
}

$json_data = array(
                "draw"            => 1,
                "recordsTotal"    => $num_rows,
                "recordsFiltered" => $num_rows,
                "data"            => $res
            );
$json = json_encode($json_data);
echo $json;
?>
