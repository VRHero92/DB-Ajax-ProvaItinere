<?php
//connessione
session_start();
if($_SESSION["type"] != 1) die("Permesso negato");

include("db.php");
$conn=mysqli_connect($db_host,$db_user,$db_password);
mysqli_select_db($conn, $db_database);

$layoutus = $_GET["id_layout"];
//query
$res=mysqli_query($conn,"select * from modulo where id=any(select ID_MODULO from COMPONENTE where ID_LAYOUT ='".$layoutus."')");

  if(mysqli_num_rows($res)==0){
    $json_data = array(
      "recordsTotal"    => 0,
      "data"            => ""
    );
  	$json = json_encode($json_data);
  	echo $json;
	}else{
	$num_rows = mysqli_num_rows($res);
	$result = array();
	while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
   	$result[] = array(
      'idmod'=> $row['ID'],
	  	'nomemod'=> $row['NOME'],
      'funzmod'=> $row['FUNZIONE'],
	  	'costomod'=> $row['COSTO'],
  		);
		}
	$json_data = array(
    "recordsTotal"    => $num_rows,
    "data"            => $result
  );
	$json = json_encode($json_data);
	echo $json;
}
?>
