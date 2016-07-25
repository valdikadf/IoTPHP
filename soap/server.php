<?php

class server
{
	public function __construct()
	{

	}

	public function getStudentName($id_array)
	{
		$length_id=strlen($id_array);
		for($i=0; $i<$length_id;$i++)
		{
			$fullvalue = $fullvalue.$id_array[$i];
		}
		return 'Sam';
	}
}

$params = array('uri' => 'dikobrozz.esy.es/soap/server.php')
$server = new SoapServer(NULL, $params);
$server->setClass('server');
$server->handle();
?>