<?php
 header("Access-Control-Allow-Origin: *");
 header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
 header('Access-Control-Allow-Headers: *');
 require_once "./includes/db.php";

switch ($_SERVER['REQUEST_METHOD']){
case 'POST':
    $_POST = json_decode(file_get_contents('php://input'), true);
    $id = uniqid("or_", true);
    $userId = $_POST['userId'];
    $carId = $_POST['carId'];
    $inputsString = $_POST['inputsString'];
    $typeOrder= $_POST['typeOrder'];
    $statusOrder= $_POST['statusOrder'];
    $date= $_POST['date'];
    $sql = "INSERT INTO orderlist (id, userId, carId, arr_data, typeOrder, statusOrder, date) 
    VALUES ('$id', '$userId', '$carId', '$inputsString', '$typeOrder', '$statusOrder', '$date')";
    if (mysqli_query($connection, $sql)) {
        echo "Данные успешно добавлены";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    case 'GET':
        $userId = $_GET['userId'];
        $result = mysqli_query($connection, "SELECT * FROM `orderlist` WHERE `userId` = '$userId'");
        if(!$result){
          echo false;
          exit();
        }
      $array = array();
      $array1 = array();
      while($res = mysqli_fetch_assoc($result)){
        $array[] = $res;
      }
      echo json_encode($array); 
      exit();
default:
    exit();
}
 ?>