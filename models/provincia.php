<?php

require_once("basededatos.php");


class Provincia extends  Basededatos
{
	function __construct(){
		parent::__construct();
	}
	function get_provincias($array=null){
		
		if(count($array)>0){
			foreach($array as $key=>$value){
			$query='SELECT * from provincias where '.$key.'='.$value.' order by nombre ASC;';	
			}
		}else{
			$query='SELECT * from provincias order by nombre ASC;';
		}

		$array_datos=$this->query($query,1);

		return $array_datos;
	} 
	
}

?>