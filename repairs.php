<?php
  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
  header('Access-Control-Allow-Headers: *');
  require_once "./includes/db.php";
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
            $_POST = json_decode(file_get_contents('php://input'), true);
            $userId = $_POST['userId']; 
            $carId = $_POST['carId'];
            $odometer = $_POST['odometer'];
            $date = $_POST['date'];
            $reasonsRepair = $_POST['reasonsRepairs'];
            $usedParts = $_POST['usedParts'];
            $accomplishedWork = $_POST['accomplishedWork'];
            $result = $_POST['result'];
            if($userId){
              $sql = "INSERT INTO repairslist (userId, carId, odometer, date, reasonsRepair, usedParts, accomplishedWork, result) VALUES('$userId', '$carId', '$odometer', '$date', '$reasonsRepair', '$usedParts', '$accomplishedWork', '$result')";
              if(mysqli_query($connection, $sql)){
                echo "New date created successfully";
              } else {
                echo "New date created ERROR";
              }
            } else {
              echo "Неполные данные";
            }
        break;
    
    default:
        # code...
        break;
}
?>