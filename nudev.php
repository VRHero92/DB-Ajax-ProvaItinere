<?php
session_start();

include("db.php");
$conn=mysqli_connect($db_host,$db_user,$db_password);
mysqli_select_db($conn, $db_database);

$peva = $_GET["pevaa"];
$nami = $_GET["name"];
$surnami = $_GET["surname"];
$aifo7s = $_GET["aifo5c"];

if(isset($_GET["pevaa"]) && isset($_GET["name"]) && isset($_GET["surname"]) && isset($_GET["aifo5c"])){
  $result = mysqli_query($conn, "INSERT INTO sviluppatore(PIVA,NOME,COGNOME,TELEFONO) VALUES(\"".$peva."\",\"".$nami."\",\"".$surnami."\",\"".$aifo7s."\")") or die(mysqli_error($conn));
    if($result){
      $res=array(
        "status"=>"OK",
      );
      $json=json_encode($res);
      echo $json;
    }
}else{
  $res=array(
    "status"=>"NOT",
  );
  $json=json_encode($res);
  echo $json;
}

?>
