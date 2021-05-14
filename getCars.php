<?php 
require_once "./includes/db.php";
header("Access-Control-Allow-Origin: *");

$result = mysqli_query($connection, "SELECT * FROM `carslist`");
if(!$result){
    echo "result is false";
    exit();
}
//echo json_encode(mysqli_fetch_assoc($result));
$array = array();
while($res = mysqli_fetch_assoc($result)){
    $array[] = $res;
}
echo json_encode($array);
?>