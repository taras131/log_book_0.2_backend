<?php
 header("Access-Control-Allow-Origin: *");
 header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
 header('Access-Control-Allow-Headers: *');
 require_once "./includes/db.php";

    $_POST = json_decode(file_get_contents('php://input'), true);
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $carId = $_POST['carId'];
            $dateIsValid = $_POST['dateIsValid'];
            $userId = $_POST['userId'];
            if($carId){
                $sql = "INSERT INTO technicalinspectionlist (carId, dateIsValid, userId) VALUES('$carId', '$dateIsValid', '$userId') ON DUPLICATE KEY UPDATE dateIsValid=VALUES(dateIsValid), userId=VALUES(userId)";
                if(mysqli_query($connection, $sql)){
                    echo "New date created successfully";
                } else {
                    echo "New date created ERROR";
                }
                break;
            } else {
                echo "Неполные данные";
                exit();
            }
        case 'GET':
            $userId = $_GET['userId'];
            $result = mysqli_query($connection, "SELECT * FROM `technicalinspectionlist` WHERE `userId` = '$userId'");

            if(!$result){
                echo false;
                exit();
            }
            $array = array();
            while($res = mysqli_fetch_assoc($result)){
                $array[] = $res;
            }
           echo json_encode($array);
            break;
      
        default:
            exit();
  }
?>