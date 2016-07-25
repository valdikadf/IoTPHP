<?php
error_reporting(E_ALL);

set_time_limit(0);
ob_implicit_flush();

$ip = "185.28.21.84";
$port = 10045;

//create socket
if( !$socket = socket_create(AF_INET,SOCK_STREAM,0) ){
    showError();
}

echo "The socket's protocol info was set \n";

//Start socket bind
if( !socket_bind($socket,$ip,$port) ){
    showError($socket);
}
echo "The socket has  been hound to specific port \n";
//start listening on this port
if( !socket_listen($socket)){
    showError($socket);
}
echo "Now listening for connections @ @ @ \n";

//start waiting client messeg
do{
    $client = socket_accept($socket);
    echo "New connections with client established \n";
    $message = "\n Hey! Welcome to another exciting talk! \n\n";
    socket_write($client, $message, strlen($message));

    // check for any massage sent by the user
    do{
        if( !$clientMssg = socket_read($socket,2048,PHP_NORMAL_READ)){
            showError($socket);
        }

        // say something back
        $messageForUser = "Thanks for your input. Will think about it.";
        socket_write($client,$messageForUser,strlen($messageForUser));

        // Check client message 
        if( !$clientMssg = trim($clientMssg)){
            continue;
        }
        if( $clientMssg == 'close'){
            //exit from the stream
            socket_close($client);
            echo "\n\n------------------- \n"."The user has left the connection\n";
            break 2;
        }

    }while(true);
}while(true);
//end socket
echo "Ending socket \n";
socket_close($socket);

//show error function
function showError( $theSocket = null){
    $errorcode = socket_last_error($theSocket);
    $errormsg = socket_strerror($errorcode);

    die("Couldn't create socket: [$errorcode] $errormsg");
}