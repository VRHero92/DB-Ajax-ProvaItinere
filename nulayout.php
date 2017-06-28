<?php
session_start();

include("db.php");
$conn=mysqli_connect($db_host,$db_user,$db_password);
mysqli_select_db($conn, $db_database);

$namelay = $_GET["layname"];
$pivalay = $_GET["laypiva"];
$modulay = $_GET["layarray"];

if(isset($_GET["layname"]) && isset($_GET["laypiva"]) && isset($_GET["layarray"])){
  $result = mysqli_query($conn, "INSERT INTO LAYOUT(NOME,SVILUPPATOREREF) VALUES(\"".$namelay."\",\"".$pivalay."\")") or die(mysqli_error($conn));

  if($result){
      $ID_LAYOUT = mysqli_insert_id($conn);
    foreach($modulay as $ID_MODULO)
    {

      $checkQuery = mysqli_query($conn, "INSERT INTO COMPONENTE(ID_LAYOUT,ID_MODULO) VALUES(\"".$ID_LAYOUT."\",\"".$ID_MODULO."\")") or die(mysqli_error($conn));
        if(!$checkQuery){
          $status=array(
            "status"=>"NOT",
          );
          $json=json_encode($status);
          echo $json;
        }
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
