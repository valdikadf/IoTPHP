<?php
error_reporting(E_ALL);
require_once "SocketServer.class.php";
$ip = "185.28.21.84";
$port = 6432;
$server = new SocketServer($ip,$port); // Binds to determined IP
$server->hook("connect","connect_function"); // On connect does connect_function($server,$client,"");
$server->hook("disconnect","disconnect_function"); // On disconnect does disconnect_function($server,$client,"");
$server->hook("input","handle_input"); // When receiving input does handle_input($server,$client,$input);
$server->infinite_loop(); // starts the loop.
?>