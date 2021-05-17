<?php 
require_once "./includes/db.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
header('Access-Control-Allow-Headers: *');

$carId = $_GET['carId'];
$result = mysqli_query($connection, "SELECT * FROM `maintenancelist` WHERE `carId` = '$carId'");
if(!$result){
    echo false;
    exit();
}
//echo json_encode(mysqli_fetch_assoc($result));
$array = array();
while($res = mysqli_fetch_assoc($result)){
    $array[] = $res;
}
echo json_encode($array);
?>