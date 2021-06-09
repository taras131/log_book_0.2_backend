<?php
  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
  header('Access-Control-Allow-Headers: *');
  require_once "./includes/db.php";

  $_POST = json_decode(file_get_contents('php://input'), true);
  $id = $_POST["id"];
  $userId = $_POST["userId"];
  if(!$id){
    exit();
    mysqli_close($connection);
  }
  if(mysqli_query($connection, "DELETE FROM `orderlist` WHERE `id`='$id'")){
   echo "delete order successfully";
   exit(); 
 } else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  exit();  
}
mysqli_close($connection);
?>