<?php
class client
{
	public function __construct()
	{
        $params = array('location' => 'http://dikobrozz.esy.es/soap/server.php',
        				'uri' => 'urn://dikobrozz.esy.es/soap/server.php',
        				'trace' => 1);
		$this->instance = new SoapClient(NULL, $params);
	}

	public function getName($id_array)
	{
		try
		{
			return $this->instance->__soapCall('getStudentName', $id_array);
		} catch (SoapFault $e)
		{
			echo "Throw exseption: ".$e->getMessage()."\n <br /> At line: ".
			$e->getCode()."\n<br />";
			echo "<pre>".print_r($e->getTrace(),1)."</pre>\n";

		} 		
	}
}

$client = new client;
?>