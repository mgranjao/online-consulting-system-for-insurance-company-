<?php

$wsdl2='http://yacutinga.equivida.local:8080/sise-servicio-1.0/InfoPolizaWsImpl?wsdl';
//$wsdl2='http://10.10.30.41:8080/sise-servicio-1.0/InfoPolizaWsImpl?wsdl';
//$wsdl2='http://yacutingadevelop.equivida.local:8080/sise-servicio-1.0/InfoPolizaWsImpl?wsdl';

//$wsdl2='http://200.32.69.186:5051/sise-servicio-1.0/InfoPolizaWsImpl?wsdl';
//$wsdl2='http://200.32.69.186:5052/sise-servicio-1.0/InfoPolizaWsImpl?wsdl';


echo "<b>URL</b>:".$wsdl2."<br>";
echo "<b>Envia:</b>";




$args=array("cod_suc"=>2,"cod_ramo"=>55, "nro_pol"=>"2550000175","campoin1"=>"","campoin2"=>"","campoin3"=>"","campoin4"=>"","campoin5"=>"");

echo "<pre>";
print_r($args);
echo "</pre>";



try {
	$client = new SoapClient($wsdl2);
	$infopoliza_array=$client->__soapCall('ws_sise_info_poliza', $args);
} catch (Exception $e) {
	echo "<pre>";
	print_r($e);
	echo "</pre>";
}





echo "<pre>";
print_r($infopoliza_array);
echo "</pre>";


?>