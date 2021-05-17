<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
    header('Access-Control-Allow-Headers: *');
    require_once "./includes/db.php";
 
    $_POST = json_decode(file_get_contents('php://input'), true);
    $id = $_POST["id"];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $yearManufacture = $_POST['yearManufacture'];
    $userId = $_POST['userId'];
    if(!$id) {
      exit();
    }
    $result = mysqli_query($connection, "INSERT INTO `carslist` (`userId`,`id`, `brand`, `model`, `yearManufacture`) VALUES('{$userId}', '{$id}', '{$brand}', '{$model}', '{$yearManufacture}')");
    var_dump($_POST['method']);
  
    
?>