<?php 
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
    header('Access-Control-Allow-Headers: *');
    require_once "./includes/db.php";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $_POST = json_decode(file_get_contents('php://input'), true);
    $login = $_POST['login'];
    $password = $_POST['password'];
    $result = mysqli_query($connection, "SELECT `id` FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    $res = mysqli_fetch_assoc($result);
    if(count($res)==0){
        echo "Пользователя не существует";
        exit();
    }
    
    echo($res['id']);
    $connection->close();
?>