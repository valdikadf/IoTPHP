<?php
require_once("config.php");
function uploadFile($fileName){
	$uploaddir = 'uploads/';
    $uploadfile = $uploaddir . basename($fileName['name']);
    if(($fileName['type'] == 'image/gif' || $fileName['type'] == 'image/jpeg' || $fileName['type'] == 'image/png') && ($fileName['size'] != 0 and $fileName['size']<=512000)) 
	{ 
	 	if (move_uploaded_file($fileName['tmp_name'], $uploadfile)) {
	      echo "Файл корректен и был успешно загружен.\n";
	 	} else {
	      echo "Возможная атака с помощью файловой загрузки!\n";
	  	}
	}
}
function mySQLiquery($query){
	// Create connection
	$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	// Check connection
	if (!$conn) {
		die("Connection failed: ".mysqli_connect_error());
	}
	if (mysqli_query($conn, $query)) {
    echo "Record updated successfully";
	} else {
    echo "Error updating record: " . mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>