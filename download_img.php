<?php
$socket = fsockopen("test",80);
fputs($socket,"GET /index.php http/1.0\n\n");
while(!feof($socket)){
	echo fgets($socket);
}
fclose($socket);
/*//$uploaddir = 'uploads/';
//$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
include('functions.php');
echo '<pre>';
uploadFile($_FILES['userfile']);

echo 'Некоторая отладочная информация:';
print_r($_FILES);
 echo "</pre>";
*/
?>