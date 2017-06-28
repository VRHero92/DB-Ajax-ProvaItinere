<?php
session_start();

include("db.php");
$conn=mysqli_connect($db_host,$db_user,$db_password);
mysqli_select_db($conn, $db_database);

$username = $_GET["us"];
$password = $_GET["pass"];
$type    = $_GET["ru"];
$password=md5($password);
if(isset($_GET["ru"]) && isset($_GET["pass"]) && isset($_GET["us"])){
  $result = mysqli_query($conn, "INSERT INTO users(username,password,type) VALUES(\"".$username."\", \"".$password."\",\"".$type."\")") or die(mysqli_error($conn));
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
