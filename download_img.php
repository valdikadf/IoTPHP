<?php header('Content-Type: text/html; charset=utf-8');

//$uploaddir = 'uploads/';
//$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
include('functions.php');
echo '<pre>';
uploadFile($_FILES['userfile']);

echo 'Некоторая отладочная информация:';
print_r($_FILES);
 echo "</pre>";

?>