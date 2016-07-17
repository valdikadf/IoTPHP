<?php 
require_once("config.php");
$id = 1;
// Create connection
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
if(isset($_GET['steering'])) {
	$steering = (int)$_GET['steering'];
	$sql = "UPDATE `".DB_TABLE."` SET `steering`=".$steering." WHERE `id`=".$id;
}
if(isset($_GET['throttle'])) {
	$throttle = (int)$_GET['throttle'];
	$sql = "UPDATE `".DB_TABLE."` SET `throttle`=".$throttle." WHERE `id`=".$id;
}

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully\nSQL: ".$sql;
} else {
    echo "Error updating record: " . mysqli_error($conn)."SQL:".$sql."GET ".$_GET['throttle'];;
}


mysqli_close($conn);
?>