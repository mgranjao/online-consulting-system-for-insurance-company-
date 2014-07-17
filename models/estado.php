<?php


require_once("basededatos.php");

class Estado  extends Basededatos
{
	function __construct(){
		parent::__construct();
	}
	
	function get_estados(){
		
		$query='SELECT * FROM estados e WHERE 1';
		
		$array_datos=$this->query($query,1);
		return $array_datos;

	}
	
	
}


?>