<?php 
require_once("config.php");
$id = 1;
// Create connection
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
if(isset($_GET['x'])&&isset($_GET['y'])&&isset($_GET['z'])) {
	$x = (int)$_GET['x'];
	$y = (int)$_GET['y'];
	$z = (int)$_GET['z'];
} else {
	$x = 'NULL';
	$y = 'NULL';
	$z = 'NULL';
}
$sql = "UPDATE `".DB_TABLE."` SET `x`=".$x.",`y`=".$y.",`z`=".$z." WHERE `id`=".$id;

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>