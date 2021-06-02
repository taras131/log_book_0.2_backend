<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
    header('Access-Control-Allow-Headers: *');
    require_once "./includes/db.php";
 
    $_POST = json_decode(file_get_contents('php://input'), true);
    switch ($_SERVER['REQUEST_METHOD']){
        case 'POST':
          $id = $_POST["id"];
          $brand = $_POST['brand'];
          $model = $_POST['model'];
          $yearManufacture = $_POST['yearManufacture'];
          $userId = $_POST['userId'];
          $num = $_POST['num'];
          $vin = $_POST['vin'];
          $category = $_POST['category'];
          if(!$id) {
            exit();
          }
          $sql = "INSERT INTO carslist (userId, id, brand, model, yearManufacture, num, vin, category) VALUES ('$userId','$id', '$brand', '$model', '$yearManufacture', '$num', '$vin', '$category')";
          if (mysqli_query($connection, $sql)) {
            echo "New car created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          mysqli_close($connection);
          exit();
        case 'GET':
          $userId = $_GET['userId'];
          $result = mysqli_query($connection, "SELECT * FROM `carslist` WHERE `userId` = '$userId'");
          if(!$result){
            echo false;
            exit();
          }
        $array = array();
        while($res = mysqli_fetch_assoc($result)){
          $array[] = $res;
        }
        echo json_encode($array); 
        exit();
      case 'PUT':
        echo "car update successfully";
      default:
        break;
    }
   
?>