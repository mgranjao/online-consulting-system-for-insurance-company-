<?php


require_once("basededatos.php");

class Tipo_usuario  extends Basededatos
{
	function __construct(){
		parent::__construct();
	}
	
	function get_tipo_usuarios(){
		
		$query='SELECT * FROM tipo_usuarios e WHERE 1';
		
		$array_datos=$this->query($query,1);
		return $array_datos;

	}
	
	
	function get_tipo_accionistas(){
		$query='SELECT * FROM tipos_accionistas order by id ASC';
		$array_datos=$this->query($query,1);
		return $array_datos;
	}
	
}


?>