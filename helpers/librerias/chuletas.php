<?php

function super_unique($array)
{
  $result = array_map("unserialize", array_unique(array_map("serialize", $array)));

  foreach ($result as $key => $value)
  {
    if ( is_array($value) )
    {
      $result[$key] = super_unique($value);
    }
  }

  return $result;
}

function disponible($texto){
	if(trim($texto)==""){
		$texto='<font style="color:#a19f97;">No disponble</font>';
	}
	
	return $texto;
}


function format($texto){
	
	
	//$texto=utf8_encode($texto);
		
	$texto=str_replace("á","|a",$texto);
	$texto=str_replace("é","|e",$texto);
	$texto=str_replace("í","|i",$texto);
	$texto=str_replace("ó","|o",$texto);
	$texto=str_replace("ú","|u",$texto);
	$texto=str_replace("ñ","|n",$texto);

	
	$texto=str_replace("Á","|A",$texto);
	$texto=str_replace("É","|E",$texto);
	$texto=str_replace("Í","|I",$texto);
	$texto=str_replace("Ó","|O",$texto);
	$texto=str_replace("Ú","|U",$texto);
	$texto=str_replace("Ñ","|N",$texto);
	
	$texto=strtolower($texto);
	$texto = ucwords ($texto);
	
	$texto=str_replace("|a","á",$texto);
	$texto=str_replace("|e","é",$texto);
	$texto=str_replace("|i","í",$texto);
	$texto=str_replace("|o","ó",$texto);
	$texto=str_replace("|u","ú",$texto);
	$texto=str_replace("|n","ñ",$texto);
	

	return $texto;
}



?>