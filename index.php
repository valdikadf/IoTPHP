<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL);
require_once "config.php";
require_once "functions.php"; 
$id = 1;
// Create connection
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT `x`, `y`, `z` FROM `".DB_TABLE."` WHERE `id`=".$id;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo " x = " . $row["x"]. "<br /> y = " . $row["y"]. "<br /> z = " . $row["z"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn); 
?>