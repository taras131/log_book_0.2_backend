<?php
  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
  header('Access-Control-Allow-Headers: *');
  require_once "./includes/db.php";
  $_POST = json_decode(file_get_contents('php://input'), true);
        $id = $_POST["id"];
        $result1 = mysqli_query($connection, "DELETE FROM `maintenancelist` WHERE `carId`=$id");
        $result = mysqli_query($connection, "DELETE FROM `carslist` WHERE `id`=$id");
        var_dump($result);     
?>