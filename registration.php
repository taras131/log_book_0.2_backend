<?php
  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
  header('Access-Control-Allow-Headers: *');
  require_once "./includes/db.php";


 $_POST = json_decode(file_get_contents('php://input'), true);
 $login = $_POST["login"];
 $password = $_POST["password"];
 $result = mysqli_query($connection, "INSERT INTO `users` (`login`, `password`) VALUES('{$login}', '{$password}')");
var_dump($result);
?>