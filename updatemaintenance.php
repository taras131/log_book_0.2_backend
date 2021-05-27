<?php 
require_once "./includes/db.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
header('Access-Control-Allow-Headers: *');

$_POST = json_decode(file_get_contents('php://input'), true);
$userId = $_POST["userId"];
$carId = $_POST["carId"];
$id = $_POST["id"];
$datecommission = $_POST["datecommission"];
$odometer = $_POST["odometer"];
$text = $_POST["text"];
if(!$id) {
    exit();
}
$sql = "INSERT INTO maintenancelist (id, carId, datecommission, odometer, text, userId) VALUES ('$id', '$carId', '$datecommission', '$odometer', '$text', '$userId') ON DUPLICATE KEY UPDATE carId=VALUES(carId), datecommission=VALUES(datecommission), odometer=VALUES(odometer), text=VALUES(text), userId=VALUES(userId)";
if (mysqli_query($connection, $sql)) {
    echo "maintenance record update successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
exit();
?>) VALUES ('$userId','$carId', '$id', '$date', '$odometer', '$reasonsRepair', '$usedParts', '$accomplishedWork', '$result') ON DUPLICATE KEY UPDATE userId=VALUES(userId), carId=VALUES(carId), date=VALUES(date), odometer=VALUES(odometer), reasonsRepair=VALUES(reasonsRepair), usedParts=VALUES(usedParts), accomplishedWork=VALUES(accomplishedWork), result=VALUES(result)";
if (mysqli_query($connection, $sql)) {
    echo "repair record update successfully";;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
exit();
?>