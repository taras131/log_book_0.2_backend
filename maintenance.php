<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
    header('Access-Control-Allow-Headers: *');
    require_once "./includes/db.php";
 
    switch ($_SERVER['REQUEST_METHOD']){
      case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $id = $_POST['id'];
        $carId = $_POST['carId'];
        $datecommission= $_POST['datecommission'];
        $odometer = $_POST['odometer'];
        $text = $_POST['text'];
        $userId = $_POST['userId'];
        if(!$id){
          exit();
          mysqli_close($connection);
        }
        $sql = "INSERT INTO maintenancelist (id, carId, datecommission, odometer, text, userId) VALUES ('$id', '$carId', '$datecommission', '$odometer', '$text', '$userId')";
        
        if (mysqli_query($connection, $sql)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($connection);
        case 'GET':
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
    } 
   ?>