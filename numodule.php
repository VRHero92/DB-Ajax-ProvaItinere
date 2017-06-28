<?php
session_start();

include("db.php");
$conn=mysqli_connect($db_host,$db_user,$db_password);
mysqli_select_db($conn, $db_database);

$modl2 = $_GET["modl"];
$funkt2 = $_GET["funkt"];
$scott2 = $_GET["scott"];

if(isset($_GET["modl"]) && isset($_GET["funkt"]) && isset($_GET["scott"])){
  $result = mysqli_query($conn, "INSERT INTO modulo(NOME,FUNZIONE,COSTO) VALUES(\"".$modl2."\",\"".$funkt2."\",\"".$scott2."\")") or die(mysqli_error($conn));
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
