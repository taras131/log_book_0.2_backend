<?php 
require_once "./includes/db.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
header('Access-Control-Allow-Headers: *');

$_POST = json_decode(file_get_contents('php://input'), true);
    $id = $_POST["id"];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $yearManufacture = $_POST['yearManufacture'];
    $userId = $_POST['userId'];
    $num = $_POST['num'];
    if(!$id) {
        exit();
    }

    $sql = "INSERT INTO carslist (userId, id, brand, model, yearManufacture, num) VALUES ('$userId','$id', '$brand', '$model', '$yearManufacture', '$num') ON DUPLICATE KEY UPDATE num=VALUES(num), brand=VALUES(brand), model=VALUES(model), yearManufacture=VALUES(yearManufacture)";
          if (mysqli_query($connection, $sql)) {
        echo "car update successfully";;
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    exit();
?>