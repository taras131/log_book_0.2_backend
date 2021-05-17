<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
    header('Access-Control-Allow-Headers: *');
    require_once "./includes/db.php";
 
    $_POST = json_decode(file_get_contents('php://input'), true);
    $carId = $_POST["carId"];
    $date= $_POST['date'];
    $odometer = $_POST['odometer'];
    $text = $_POST['text'];
    if(!$carId) {
      exit();
    }
    $result = mysqli_query($connection, "INSERT INTO `maintenancelist` (`carId`,`date`, `odometer`, `text`)
     VALUES('{$carId}', '{$date}', '{$odometer}', '{text}')");
    var_dump($_POST['method']);
?>