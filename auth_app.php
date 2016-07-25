<?php
require_once("config.php");
session_start();
/*
// Create connection
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
*/
function clean($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_POST['login'])&&isset($_POST['pass'])) {
	$login = clean($_POST['login']); 
	$pass = clean($_POST['pass']);
	echo "{$login:$pass}" ; 
}

/*$query = "SELECT `id`,`name` FROM `foreman` WHERE `login`='Arny' AND `pass`='2012qwer' LIMIT 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
	session_start();

	// output data of each row
	while($row = mysqli_fetch_assoc()) {
		echo "{\n\tsession_id:\"".session_id()."\",\n\tid:\"".$row['id']."\",\n\tname:\"".row['name']."\"\n}";
	}
    echo "Record updated successfully\n SQL: ".$query;
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
*/
?>