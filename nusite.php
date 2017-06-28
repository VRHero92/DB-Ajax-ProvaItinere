<?php
session_start();

include("db.php");
$conn=mysqli_connect($db_host,$db_user,$db_password);
mysqli_select_db($conn, $db_database);

$urlsite = $_GET["urlsito"];
$datesite = $_GET["datesito"];
$clientsite = $_GET["clientesito"];
$layoutsite = $_GET["layoutsito"];

if(isset($_GET["urlsito"]) && isset($_GET["datesito"]) && isset($_GET["clientesito"]) && isset($_GET["layoutsito"])){
  $result = mysqli_query($conn, "INSERT INTO SITO_WEB(URL,DATA_PUBBLICAZIONE,CLIENTE,LAYOUTREF) VALUES(\"".$urlsite."\",\"".$datesite."\",\"".$clientsite."\",\"".$layoutsite."\")") or die(mysqli_error($conn));

  if($result){

      $querysult=mysqli_query($conn,"select SVILUPPATOREREF from LAYOUT where LAYOUT.id = '".$layoutsite."'");
      $pivasiteprefinal = mysqli_fetch_assoc($querysult);
      $pivasite = $pivasiteprefinal["SVILUPPATOREREF"];

      $checkQuery = mysqli_query($conn, "INSERT INTO COMMISSIONE(cfcliente,pivadev,urlsito) VALUES(\"".$clientsite."\",\"".$pivasite."\",\"".$urlsite."\")") or die(mysqli_error($conn));
        if(!$checkQuery){
          $status=array(
            "status"=>"NOT",
          );
          $json=json_encode($status);
          echo $json;
        }
    $status=array(
      "status"=>"OK",
    );
    $json=json_encode($status);
    echo $json;
  }
}else{
  echo "errore";
}


?>
