<?php 
require_once "./includes/db.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
header('Access-Control-Allow-Headers: *');

$userId = $_GET['userId'];
//$userId = "tp_60a156cda72228.69967808";
$result = mysqli_query($connection, "SELECT * FROM `carslist` WHERE `userId` = '$userId'");
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