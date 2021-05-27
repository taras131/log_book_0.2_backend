<?php
  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
  header('Access-Control-Allow-Headers: *');
  require_once "./includes/db.php";

  $_POST = json_decode(file_get_contents('php://input'), true);
  $id = $_POST['id'];
  $carId = $_POST['carId'];
  if(!$id){
    exit();
    mysqli_close($connection);
  }
 if(mysqli_query($connection, "DELETE FROM `noticelist` WHERE `id`=$id")){
   echo "delete record successfully";
   exit(); 
 } else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>