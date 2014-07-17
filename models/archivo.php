<?php


require_once("basededatos.php");

class Archivo  extends Basededatos
{
	function __construct(){
		parent::__construct();
	}
	
	function subir_archivo(){
		
		
		
		// obtenemos los datos del archivo
		    $tamano = $_FILES["archivo"]['size'];
		    $tipo = $_FILES["archivo"]['type'];
		    $archivo = $_FILES["archivo"]['name'];
		    $prefijo = substr(md5(uniqid(rand())),0,6);


			if(($tipo=="application/pdf")||($tipo=="application/doc")){
				
				if ($archivo != "") {
			        // guardamos el archivo a la carpeta files
			        $destino =  "archivos/".$prefijo."_".$archivo;
			        if (copy($_FILES['archivo']['tmp_name'],$destino)) {
			            $status = "Archivo subido: <b>".$archivo."</b>";
			        } else {
			            $status = "Error al subir el archivo";
			        }
			    } else {
			        $status = "Error al subir archivo";
			    }
			
				$query='
				INSERT INTO archivos SET
				titulo="'.$_POST["titulo"].'",
				descripcion="'.$_POST["descripcion"].'",
				file="'.$destino.'",
				directorio_id="'.$_POST["padre"].'",
			 	fecha="'.$_POST["fecha"].'",
				tipo="'.$tipo.'",
				tipo_accionista_id="'.$_POST["tipo_accionista_id"].'",
				fecha_create=NOW();';
				
				$this->query($query,0);
				
				$_SESSION["flash_ok"]="El archivo se subió correctamente";

			}else{
				
				$_SESSION["flash_error"]="Error al subir al archivo";
				
			}
				

	}
	

	function get_archivo(){

		$query='SELECT * FROM archivos WHERE id='.$_GET["id"].' order by fecha ASC;';
		$array_datos=$this->query($query,1);
		return $array_datos;
	}

	function update_archivo(){

	
			if((isset($_FILES["archivo"]))&&($_FILES["archivo"]['name']!="")){

				$tamano = $_FILES["archivo"]['size'];
		    	$tipo = $_FILES["archivo"]['type'];
		    	$archivo = $_FILES["archivo"]['name'];
		    	$prefijo = substr(md5(uniqid(rand())),0,6);


		    	if(($tipo=="application/pdf")||($tipo=="application/doc")){
				
				if ($archivo != "") {
			        // guardamos el archivo a la carpeta files
			        $destino =  "archivos/".$prefijo."_".$archivo;
			        if (copy($_FILES['archivo']['tmp_name'],$destino)) {
			            $status = "Archivo subido: <b>".$archivo."</b>";
			        } else {
			            $status = "Error al subir el archivo";
			        }
			    } else {
			        $status = "Error al subir archivo";
			    }
			
				$query='
				UPDATE  archivos SET
				titulo="'.$_POST["titulo"].'",
				descripcion="'.$_POST["descripcion"].'",
				file="'.$destino.'",
				directorio_id="'.$_POST["padre"].'",
				fecha="'.$_POST["fecha"].'",
				tipo="'.$tipo.'",
				tipo_accionista_id="'.$_POST["tipo_accionista_id"].'",
				fecha_create=NOW()  WHERE id='.$_POST["id"].';';
				
				$this->query($query,0);
				
				$_SESSION["flash_ok"]="El archivo se actualizo correctamente";

			}else{
				$_SESSION["flash_error"]="Error al subir al archivo";
			}

			}else{


				$query='UPDATE archivos SET
						titulo="'.$_POST["titulo"].'",
						descripcion="'.$_POST["descripcion"].'",
						fecha="'.$_POST["fecha"].'",
						tipo_accionista_id="'.$_POST["tipo_accionista_id"].'",
						directorio_id="'.$_POST["padre"].'" WHERE id='.$_POST["id"].';';
						$this->query($query,0);
						$_SESSION["flash_ok"]="El archivo se actualizo correctamente";

			}
	}


	function eliminar_archivo(){
		
		$query='DELETE FROM archivos WHERE id = '.$_GET["id"].' LIMIT 1 ;';
		$this->query($query,0);
		$_SESSION["flash_ok"]="Se borro correctamente";
		
	}

}



?>