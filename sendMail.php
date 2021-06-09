<?php 
  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
  header('Access-Control-Allow-Headers: *');
  require_once "./includes/db.php";
$_POST = json_decode(file_get_contents('php://input'), true);
$arr_data = $_POST['arr_data'];
$email_1 = $_POST['email_1'];
$email_2 = $_POST['email_2'];
$email_3 = $_POST['email_3'];
$to  = $email_1; 
$to .= ",".$email_2;
$to .= ",".$email_3 ; 
$subject = $_POST['title']; 
$i = 0;
//Подготовим тело
$tbody = "";
foreach ($arr_data as $ps) {
    $i++;
  	$_tableRow = "";
    $_tableRow .= "<tr>";
    $_tableRow .= "<td>".$i."</td>";
    $_tableRow .= "<td>".$ps[0]."</td>";
    $_tableRow .= "<td>".$ps[1]."</td>";
    $_tableRow .= "<td align='center'>".$ps[2]."</td>";
    $_tableRow .= "</tr>";
    $tbody .= $_tableRow;
} 
//скомпонуем
$table = "<table class='table table-hover object_table'>
    <thead>
         <tr>
            <th width='50'><i class='glyphicon glyphicon-bookmark'></i> №</th>
            <th><i class='glyphicon glyphicon-paperclip'></i> Наименование</th>
            <th>Кат номер</th>
            <th>Кол-во</th>
        </tr>
    </thead>
    <tbody>".$tbody."</tbody>
    </table>";
$message = '
<html>
    <head>
        <title>'.$subject.'</title>
    </head>
    <body>
        <h2>Заявка на запчасти</h2>
        <p>Марка: '.$_POST['brand'].'</p>
        <p>Модель: '.$_POST['model'].'</p> 
        <p>Год выпуска: '.$_POST['yearManufacture'].'</p>
        <p>Номер: '.$_POST['num'].'</p>      
        <p>VIN номер: '.$_POST['vin'].'</p>  
        <h3>Детали , необходимые для ремонта:</h3>
    </body>
</html>';
$message .= $table;   
$message;
$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
$headers .= "From: Механическая служба <from@example.com>\r\n"; 
$headers .= "Reply-To: reply-to@example.com\r\n"; 

echo mail($to, $subject, $message, $headers); 
?>