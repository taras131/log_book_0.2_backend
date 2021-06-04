<?php 
require_once "./includes/db.php";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
header('Access-Control-Allow-Headers: *');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $userId = $_POST["userId"];
        $email_1 = $_POST["email_1"];
        $email_2 = $_POST["email_2"];
        $email_3 = $_POST["email_3"];
        if(!$userId) {
            exit();
        }
        $sql = "INSERT INTO setting (userId, email_1, email_2, email_3) VALUES ('$userId',' $email_1', '$email_2', '$email_3') ON DUPLICATE KEY UPDATE email_1=VALUES(email_1), email_2=VALUES(email_2), email_3=VALUES(email_3)";
        if (mysqli_query($connection, $sql)) {
            echo "update settings successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        exit();
    case 'GET':
        $userId = $_GET["userId"];
        $result = mysqli_query($connection, "SELECT * FROM `setting` WHERE `userId` = '$userId'");
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