<?php

$wsdl2='http://yacutinga.equivida.local:8080/sise-servicio-1.0/ClientesAgenteWsImpl?wsdl';

//$wsdl2='http://10.10.30.41:8080/sise-servicio-1.0/InfoPolizaWsImpl?wsdl';
//$wsdl2='http://yacutingadevelop.equivida.local:8080/sise-servicio-1.0/InfoPolizaWsImpl?wsdl';

//$wsdl2='http://200.32.69.186:5051/sise-servicio-1.0/InfoPolizaWsImpl?wsdl';
//$wsdl2='http://200.32.69.186:5052/sise-servicio-1.0/InfoPolizaWsImpl?wsdl';

echo "<b>URL</b>:".$wsdl2."<br>";
echo "<b>Envia:</b>";
                                 
$args=array("numDoc"=>1790048772001,
			"tipoAgente"=>"",
			"codAgente"=>"",
			"snActivas"=>-1,
			"campoin1"=>"",
			"campoin2"=>"",
			"campoin3"=>"",
			"campoin4"=>"",
			"campoin5"=>"");


echo "<pre>";
print_r($args);
echo "</pre>";



try {
	$info_wsdl= new SoapClient($wsdl2);
	$info_clientes=$info_wsdl->__soapCall('ws_sise_clientes_agente', $args);
} catch (Exception $e) {
	echo "<pre>";
	print_r($e);
	echo "</pre>";
}


echo "<pre>";
print_r($info_clientes);
echo "</pre>";


?>