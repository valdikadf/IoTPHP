<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_POST['user'])&&isset($_POST['password'])){
	$_SESSION['user'] = test_input($_POST['user']);
	$_SESSION['password'] = test_input($_POST['password']);
}
if($_SESSION['user'] =="admin"&&$_SESSION['password'] =="qwertyuiop"){
		require_once('machine_control.php');
}else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<?php
if(isset($_SESSION['password'])&&isset($_SESSION['user'])){
	echo 	"<div class=\"error\">
				<p>The ".$_SESSION['password']." and ".$_SESSION['password']." is not right!</p>
			</div>";
}
?>
<div class="form">
	<form action="" method="post">
		<input type="text" name="user" placeholder="user">
		<input type="password" name="password" placeholder="password">
		<input type="submit" value="submit">
	</form>
</div>
</body>
</html>
<?php
}




















































/*error_reporting(E_ALL);
require_once "config.php";
require_once "functions.php"; 
$test = 123;
$pack = pack("n",$test);
$binarydata = pack("n", 0x1234);
echo "<pre>".print_r($pack,1)."</pre>";
$unpack = unpack("n",$pack);
echo "<pre>".print_r($unpack,1)."</pre>";
echo "<pre>".print_r(unpack("n",$binarydata),1)."</pre>";
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
?>*/
?>