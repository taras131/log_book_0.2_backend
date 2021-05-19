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
    $num = $_POST['num'];
    if(!$id) {
      exit();
    }
    $sql = "INSERT INTO carslist (userId, id, brand, model, yearManufacture, num) VALUES ('$userId','$id', '$brand', '$model', '$yearManufacture', '$num')";
    if (mysqli_query($connection, $sql)) {
      echo "New car created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($connection);
?>