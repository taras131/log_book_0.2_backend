<?php 
require_once "./includes/db.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
header('Access-Control-Allow-Headers: *');

$_POST = json_decode(file_get_contents('php://input'), true);
$userId = $_POST["userId"];
$carId = $_POST["carId"];
$id = $_POST["id"];
$date = $_POST["date"];
$odometer = $_POST["odometer"];
$text = $_POST["text"];
if(!$id) {
    exit();
}
$sql = "INSERT INTO noticelist (userId, carId, date, odometer, text) VALUES ('$userId', '$carId', '$date', '$odometer', '$text') ON DUPLICATE KEY UPDATE userId=VALUES(userId), carId=VALUES(carId), date=VALUES(date), odometer=VALUES(odometer), text=VALUES(text)";
if (mysqli_query($connection, $sql)) {
    echo "update notice record successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
exit();
