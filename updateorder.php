<?php 
require_once "./includes/db.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
header('Access-Control-Allow-Headers: *');

$_POST = json_decode(file_get_contents('php://input'), true);
$_POST = json_decode(file_get_contents('php://input'), true);
    $id = $_POST['id'];
    $userId = $_POST['userId'];
    $carId = $_POST['carId'];
    $inputsString = $_POST['inputsString'];
    $typeOrder= $_POST['typeOrder'];
    $statusOrder= $_POST['statusOrder'];
    $date= $_POST['date'];
    if(!$id){
    exit();
    }
    $sql = "INSERT INTO orderlist (id, userId, carId, arr_data, typeOrder, statusOrder, date)
     VALUES ('$id', '$userId', '$carId', '$inputsString', '$typeOrder', '$statusOrder', '$date') 
     ON DUPLICATE KEY UPDATE userId=VALUES(userId),carId=VALUES(carId),arr_data=VALUES(arr_data), typeOrder=VALUES(typeOrder),
     statusOrder=VALUES(statusOrder), date=VALUES(date)";
    if (mysqli_query($connection, $sql)) {
        echo "Данные успешно добавлены";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    exit();
?>