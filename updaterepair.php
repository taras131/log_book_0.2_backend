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
$reasonsRepair = $_POST["reasonsRepair"];
$usedParts = $_POST["usedParts"];
$accomplishedWork = $_POST["accomplishedWork"];
$result = $_POST["result"];
if(!$id) {
    exit();
}
$sql = "INSERT INTO repairslist (userId, carId, id, date, odometer, reasonsRepair, usedParts, accomplishedWork, result) VALUES ('$userId','$carId', '$id', '$date', '$odometer', '$reasonsRepair', '$usedParts', '$accomplishedWork', '$result') ON DUPLICATE KEY UPDATE userId=VALUES(userId), carId=VALUES(carId), date=VALUES(date), odometer=VALUES(odometer), reasonsRepair=VALUES(reasonsRepair), usedParts=VALUES(usedParts), accomplishedWork=VALUES(accomplishedWork), result=VALUES(result)";
if (mysqli_query($connection, $sql)) {
    echo "repair record update successfully";;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
exit();
?>