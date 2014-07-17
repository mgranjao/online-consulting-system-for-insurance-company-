<?php

/**
* Conexión Base de Datos
*/


class Basededatos
{
	private $db,$conectado;
	public $error;
	function __construct(){
			$this->db = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
			if (!$this->db) {
			    die('Could not connect: ' . mysql_error());
				$this->error=mysql_error();
			}else{
				$this->conectado=mysql_select_db(DB_NAME,$this->db);
			}
		
			mysql_query('SET NAMES utf8'); 
	}
	
	function query($sql,$devuelve){
		
		global $b_debugmode;
		
		$query=mysql_query($sql,$this->db);
		
		  // Check result
		  // This shows the actual query sent to MySQL, and the error. Useful for debugging.
		 if (!$query) {
		    if($b_debugmode){
		      $message  = '<b>Invalid query:</b><br>' . mysql_error() . '<br><br>';
		      $message .= '<b>Whole query:</b><br>' . $query . '<br><br>';
		      die($message);
		    }
		  }
		
		
		if($devuelve==1){
		for($i=0;$i<@mysql_num_rows($query);$i++){
			$texto=mysql_fetch_assoc($query);
			foreach($texto as $key=>$value){
				$array[$i][$key]=$value;
			}
		}

		return $array;
		}else{
			return "";
		}
	}
	
	
	
	
	
	function __destruct() {
	       //mysql_close($this->db);
	 }
	
	function formatear($texto){

		$texto=str_replace("á",".a",$texto);
		$texto=str_replace("é",".e",$texto);
		$texto=str_replace("í",".i",$texto);
		$texto=str_replace("ó",".o",$texto);
		$texto=str_replace("ú",".u",$texto);
		$texto=str_replace("ñ",".n",$texto);
		
		$texto=str_replace("Á",".A",$texto);
		$texto=str_replace("É",".E",$texto);
		$texto=str_replace("Í",".I",$texto);
		$texto=str_replace("Ó",".O",$texto);
		$texto=str_replace("Ú",".U",$texto);
		$texto=str_replace("Ñ",".N",$texto);


		$texto=strtolower($texto);
		$texto=ucwords($texto);


		$texto=str_replace(".a","á",$texto);
		$texto=str_replace(".e","é",$texto);
		$texto=str_replace(".i","í",$texto);
		$texto=str_replace(".o","ó",$texto);
		$texto=str_replace(".u","ú",$texto);
		$texto=str_replace(".n","ñ",$texto);


		return $texto;
	}
	
}



?>