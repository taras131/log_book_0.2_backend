<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
    header('Access-Control-Allow-Headers: *');
    require_once "./includes/db.php";
 
    switch ($_SERVER['REQUEST_METHOD']){
      case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $userId = $_POST['userId'];
        $carId = $_POST['carId'];
        $date= $_POST['date'];
        $odometer = $_POST['odometer'];
        $text = $_POST['text'];
        if(!$userId){
          exit();
          mysqli_close($connection);
        }
        $sql = "INSERT INTO noticelist (userId, carId, date, odometer, text) VALUES ('$userId', '$carId', '$date', '$odometer', '$text')";
        if (mysqli_query($connection, $sql)) {
          echo "New notice record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($connection);
        exit();
        case 'GET':
          $userId = $_GET['userId'];
        if(!$userId){
            exit();
        mysqli_close($connection);
        }
  $sql = "SELECT * FROM `noticelist` WHERE `userId` = '$userId'";
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