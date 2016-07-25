<?php
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

set_time_limit(0);
ob_implicit_flush();

echo "- Клиент <br /><br />";

$address = '185.28.21.84'; // адресс localhost.
$port = 10045; // порт с которым будет установленно соединение.

echo "Создание сокета... ";
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if ($socket < 0)
{
    echo "Ошибка: ".socket_strerror(socket_last_error())."<br />";
}
else
{
    echo "OK <br />";
}

echo "Подключение к сокету... ";
$connect = socket_connect($socket, $address, $port);

if($connect === false) {
    echo "Ошибка : ".socket_strerror(socket_last_error())."<br />";
}
else
{
    echo "OK <br />";

    echo 'Сервер сказал: ';
    $awr = socket_read($socket, 1024);
    echo $awr."<br />";

    $msg = "\nHello Сервер!\n\r";
    echo "Говорим серверу \"".$msg."\"...";
    socket_write($socket, $msg, strlen($msg));
    echo "OK <br />";

    echo "Сервер сказал: ";
    $awr = socket_read($socket, 1024);
    echo $awr."<br />";
    
    $msg = "\nexit\n\r";
    echo "Говорим серверу \"".$msg."\"...";
    socket_write($socket, $msg, strlen($msg));
    echo "OK <br />";
}

if(isset($socket))
{
    echo "Закрываем соединение... ";
    socket_close($socket);
    echo "OK <br />";
}
/*echo "<h2>Соединение TCP/IP</h2>\n";

/* Получаем порт сервиса WWW. *
$service_port = getservbyname('www', 'tcp');

/* Получаем  IP адрес целевого хоста. *
$address = gethostbyname('www.dikobrozz.esy.es');

/* Создаём  TCP/IP сокет. *
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "Не удалось выполнить socket_create(): причина: " . socket_strerror(socket_last_error()) . "\n<br />";
} else {
    echo "OK.\n\r<br />";
}

echo "Пытаемся соединиться с '$address' на порту '$service_port'...";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
    echo "Не удалось выполнить socket_connect().\nПричина: ($result) " . socket_strerror(socket_last_error($socket)) . "\r\n<br />";
} else {
    echo "OK.\r\n";
}

$in = "HEAD / HTTP/1.1\r\n";
$in .= "Host: www.dikobrozz.esy.es\r\n";
$in .= "Connection: Close\r\n\r\n";
$out = '';

echo "Отправляем  HTTP HEAD запрос...";
socket_write($socket, $in, strlen($in));
echo "OK.\r\n<br />";

echo "Читаем ответ:\r\n\n";
while ($out = socket_read($socket, 2048)) {
    echo $out."<br />";
}

echo "Закрываем сокет...";
socket_close($socket);
echo "OK.\r\n\n<br />";
?>*/