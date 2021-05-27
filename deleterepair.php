<?php
  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
  header('Access-Control-Allow-Headers: *');
  require_once "./includes/db.php";
  $_POST = json_decode(file_get_contents('php://input'), true);
        $id = $_POST["id"];
        if(mysqli_query($connection, "DELETE FROM `repairslist` WHERE `id`=$id")){
            echo "delete record successfully";
            exit();  
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        exit();      
?>