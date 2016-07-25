<?php
/**
 * @author	Cyril Mazur
 * 			www.cyrilmazur.com		twitter.com/CyrilMazur	facebook.com/CyrilMazur
 * 			More info and tutorial about this script at www.cyrilmazur.com
 * 
 * INSTALLATION
 * 
 * 1. Read www.cyrilmazur.com to find out more
 * 
 * 2. You can add a daemon behavior to your socket server with another tutorial on www.cyrilmazur.com
 * 
 * Enjoy your new socket server ;-)
 * 
 * Cyril Mazur.
 */

// require classes
require 'ClsSocketServer.php';
require 'ClsMyExampleServer.php';

// instantiate class
$server = new ClsMyExampleServer('dikobrozz.esy.es',9990,20);

// start the server
$server->start();

;
?>