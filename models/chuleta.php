<?php

function texto($texto){
	
	$texto=str_replace("Ð","Ñ",$texto);
	$texto=str_replace("Ñ","|N",$texto);
	$texto=str_replace("┴","|A",$texto);
	$texto=str_replace("═","|I",$texto);
	$texto=str_replace("Ë","|O",$texto);
	$texto=str_replace("╔","|E",$texto);
	$texto=str_replace("┌","|U",$texto);
	$texto=str_replace("#","|N",$texto);
	
	$texto=str_replace("á","|a",$texto);
	$texto=str_replace("í","|i",$texto);
	$texto=str_replace("ó","|o",$texto);
	$texto=str_replace("é","|e",$texto);
	$texto=str_replace("ú","|u",$texto);
	$texto=str_replace("ñ","|n",$texto);
	
	
	
	$texto=strtolower($texto);
	$texto=ucwords($texto);
	$texto=str_replace("|a","á",$texto);
	$texto=str_replace("|i","í",$texto);
	$texto=str_replace("|o","ó",$texto);
	$texto=str_replace("|e","é",$texto);
	$texto=str_replace("|u","ú",$texto);
	$texto=str_replace("|n","ñ",$texto);
	
	return $texto;
}

function textoMAYUSCULAS($texto){
	
	$texto=str_replace("Ð","Ñ",$texto);
	$texto=str_replace("Ñ","|N",$texto);
	$texto=str_replace("┴","|A",$texto);
	$texto=str_replace("═","|I",$texto);
	$texto=str_replace("Ë","|O",$texto);
	$texto=str_replace("╔","|E",$texto);
	$texto=str_replace("┌","|U",$texto);
	$texto=str_replace("#","|N",$texto);
	
	
	$texto=strtolower($texto);
	$texto=strtoupper($texto);
	$texto=str_replace("|A","Á",$texto);
	$texto=str_replace("|I","Í",$texto);
	$texto=str_replace("|O","Ó",$texto);
	$texto=str_replace("|E","É",$texto);
	$texto=str_replace("|U","Ú",$texto);
	$texto=str_replace("|N","Ñ",$texto);
	
	return $texto;
}



function encrypt($string, $key) {
   //$key_string=mencrypt($string,$key);
   return $string;
}
 
function decrypt($string, $key) {
   //$key_string=mdecrypt($string,$key);
   return $string;
}

function encode_this($string){
	$string = utf8_encode($string);
	$control = "qwerty"; //defino la llave para encriptar la cadena, cambiarla por la que deseamos usar
	$string = $control.$string.$control; //concateno la llave para encriptar la cadena
	$string = base64_encode($string);//codifico la cadena
	return($string);
}

function decode_get2($string){
	$cad = split("[?]",$string); //separo la url desde el ?
	$string = $cad[1]; //capturo la url desde el separador ? en adelante
	$string = base64_decode($string); //decodifico la cadena
	$control = "qwerty"; //defino la llave con la que fue encriptada la cadena,, cambiarla por la que deseamos usar
	$string = str_replace($control, "", "$string"); //quito la llave de la cadena
	//procedo a dejar cada variable en el $_GET
	$cad_get = split("[&]",$string); //separo la url por &
	foreach($cad_get as $value)
	{
		$val_get = split("[=]",$value); //asigno los valosres al GET
		$_GET[$val_get[0]]=utf8_decode($val_get[1]);
	}
}

//Nuevos Metodos de Encriptacion de URLs

function mencrypt($input,$key){
	$key = substr(md5($key),0,24);
	$td = mcrypt_module_open ('tripledes', '', 'ecb', '');
	$iv = mcrypt_create_iv (mcrypt_enc_get_iv_size ($td), MCRYPT_RAND);
	mcrypt_generic_init ($td, $key, $iv);
	$encrypted_data = mcrypt_generic ($td, $input);
	mcrypt_generic_deinit ($td);
	mcrypt_module_close ($td);
	return trim(chop(url_base64_encode($encrypted_data)));
}


function mdecrypt($input,$key){
	$input = trim(chop(url_base64_decode($input)));
	$td = mcrypt_module_open ('tripledes', '', 'ecb', '');
	$key = substr(md5($key),0,24);
	$iv = mcrypt_create_iv (mcrypt_enc_get_iv_size ($td), MCRYPT_RAND);
	mcrypt_generic_init ($td, $key, $iv);
	$decrypted_data = mdecrypt_generic ($td, $input);
	mcrypt_generic_deinit ($td);
	mcrypt_module_close ($td);
	return trim(chop($decrypted_data));
}

function url_base64_encode($str){
	return strtr(base64_encode($str),
	array(
		'+' => '.',
		'=' => '-',
		'/' => '~'
	)
	);
}

function url_base64_decode($str){
	return base64_decode(strtr($str,
	array(
	'.' => '+',
	'-' => '=',
	'~' => '/'
	)
	));
}



?>