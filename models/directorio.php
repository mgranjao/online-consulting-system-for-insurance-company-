<?php


require_once("basededatos.php");



class Directorio  extends Basededatos
{
	function __construct(){
		parent::__construct();
	}
	
	function crear_directorio(){
		
		$query='INSERT INTO directorios SET
				nombre="'.$_POST["nombre"].'",
				parent_id="'.$_POST["padre"].'",
				tipo_accionista_id="'.$_POST["tipo_accionista_id"].'",
				fecha_create=NOW();';
		
		$this->query($query,0);
		$_SESSION["flash_ok"]="El directorio se creo correctamente";
	}
	function get_directorios(){
		$query='SELECT * FROM directorios WHERE parent_id=0;';
		$array_datos=$this->query($query,1);
		
		for($i=0;$i<count($array_datos);$i++){
			
			//Segundo Nivel
			$query='SELECT * FROM directorios WHERE parent_id='.$array_datos[$i]["id"].';';
			$array_datos_2=$this->query($query,1);
			$array_datos[$i]["hijo"]=$array_datos_2;
			
			//Tercer Nivel
			for($j=0;$j<count($array_datos[$i]["hijo"]);$j++){
				
				$query='SELECT * FROM directorios WHERE parent_id='.$array_datos[$i]["hijo"][$j]["id"].';';
				
				$array_datos_3=$this->query($query,1);
				$array_datos[$i]["hijo"][$j]["hijo"]=$array_datos_3;
				
				
				for($a=0;$a<count($array_datos[$i]["hijo"][$j]["hijo"]);$a++){
					
					$query='SELECT * FROM archivos WHERE directorio_id='.$array_datos[$i]["hijo"][$j]["hijo"][$a]["id"].' order by fecha ASC;';
					
					
					$array_datos_4=$this->query($query,1);
					$array_datos[$i]["hijo"][$j]["hijo"][$a]["archivos"]=$array_datos_4;


					$query='SELECT * FROM directorios WHERE parent_id='.$array_datos[$i]["hijo"][$j]["hijo"][$a]["id"].';';
					$array_datos_5=$this->query($query,1);

					$array_datos[$i]["hijo"][$j]["hijo"][$a]["hijo"]=$array_datos_5;


					for($b=0;$b<count($array_datos[$i]["hijo"][$j]["hijo"][$a]["hijo"]);$b++){

							$query='SELECT * FROM archivos WHERE directorio_id='.$array_datos[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["id"].' order by fecha ASC;';
							$array_datos_6=$this->query($query,1);
							$array_datos[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["archivos"]=$array_datos_6;
						
					}

				
				}
				
				
			}
			
		}

	
		
		return $array_datos;
	}
	
	
	function get_directorio($id){
		
		$query='SELECT * FROM directorios WHERE id='.$id.';';
		$array_datos=$this->query($query,1);
		return $array_datos;
		
	}
	
	function update_directorio(){			
		
		$query='UPDATE directorios SET
				nombre="'.$_POST["nombre"].'",
				parent_id="'.$_POST["padre"].'",
				tipo_accionista_id="'.$_POST["tipo_accionista_id"].'"
				WHERE id='.$_POST["id"].'';

		$this->query($query,0);
		$_SESSION["flash_ok"]="Se actualizo correctamente";
	
	}
	
	
	function borrar_directorio(){		
		$query='DELETE FROM directorios WHERE id = '.$_GET["id"].' LIMIT 1 ;';
		$this->query($query,0);
		$_SESSION["flash_ok"]="Se borro correctamente";
		
	}

}



?>