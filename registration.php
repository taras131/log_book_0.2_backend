<?php
  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
  header('Access-Control-Allow-Headers: *');
  require_once "./includes/db.php";

 $_POST = json_decode(file_get_contents('php://input'), true);
 $login = $_POST['login'];
 $password = $_POST['password'];
 $id = uniqid("tp_", true);
 if($login AND $password) {
  $result = mysqli_query($connection, "INSERT INTO `users` (`id`,`login`, `password`) VALUES('{$id}','{$login}', '{$password}')");
 } else {
   echo "некорректные данные";
 }
 echo $result;
?>