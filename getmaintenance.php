<?php 
require_once "./includes/db.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
header('Access-Control-Allow-Headers: *');

$userId = $_GET['userId'];
if(!$userId){
    exit();
    mysqli_close($connection);
  }
  $sql = "SELECT * FROM `maintenancelist` WHERE `userId` = '$userId'";
  if ($result = mysqli_query($connection, $sql)) {
    $array = array();
    while($res = mysqli_fetch_assoc($result)){
        $array[] = $res;
    }
    echo json_encode($array);
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($connection);
?>