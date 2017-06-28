<?php
session_start();

include("db.php");
$conn=mysqli_connect($db_host,$db_user,$db_password);
mysqli_select_db($conn, $db_database);

$cod2 = $_GET["cod1"];
$city2 = $_GET["city1"];
$stre2 = $_GET["stre1"];
$ipho2 = $_GET["ipho1"];

//echo (\"".$cod2."\", \"".$city2."\",\"".$stre2."\",\"".$ipho2."\")");

if(isset($_GET["cod1"]) && isset($_GET["city1"]) && isset($_GET["stre1"]) && isset($_GET["ipho1"])){
  $result = mysqli_query($conn, "INSERT INTO cliente(CODICE,CITTA,INDIRIZZO,TELEFONO) VALUES(\"".$cod2."\",\"".$city2."\",\"".$stre2."\",\"".$ipho2."\")") or die(mysqli_error($conn));
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
