<?php


require_once("basededatos.php");

class Banner  extends Basededatos
{
	function __construct(){
		parent::__construct();
	}

	function update_banner(){

	
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
	
	function get_banner(){
		$banners='SELECT * from banners ORDER BY id ASC';
		$array_datos=$this->query($banners,1);
		return $array_datos;
	}
	
	function save_banner(){
		
		/* Banner 1 */
		
		if((isset($_FILES["banner-4"]))&&($_FILES["banner-4"]['name']!="")){
			
			$tamano = $_FILES["banner-4"]['size'];
	    	$tipo = $_FILES["banner-4"]['type'];
	    	$archivo = $_FILES["banner-4"]['name'];
	    	$prefijo = substr(md5(uniqid(rand())),0,6);
			
			if(($tipo=="image/jpeg")||($tipo=="image/png")){
				
				
				
				if ($archivo != "") {
			        // guardamos el archivo a la carpeta files
			        $destino =  "archivos/".$prefijo."_".$archivo;
			
					
			        if (copy($_FILES['banner-4']['tmp_name'],$destino)) {
			            $status = "Archivo subido: <b>".$archivo."</b>";
			        } else {
			            $status = "Error al subir el archivo";
			        }
			    } else {
			        $status = "Error al subir archivo";
			    }
				
				
				$query='
				UPDATE  banners SET
				imagen="'.$destino.'"
				WHERE  	seccion_id=4;';
				
				$this->query($query,0);
				
				$_SESSION["flash_ok"]="El archivo se actualizo correctamente";
				
				
			}
			
		}
		
		/* Fin Banner 1 */
		
		
		/* Banner 2 */
		
		if((isset($_FILES["banner-5"]))&&($_FILES["banner-5"]['name']!="")){
			
			$tamano = $_FILES["banner-5"]['size'];
	    	$tipo = $_FILES["banner-5"]['type'];
	    	$archivo = $_FILES["banner-5"]['name'];
	    	$prefijo = substr(md5(uniqid(rand())),0,6);
	
			if(($tipo=="image/jpeg")||($tipo=="image/png")){
				
				
				if ($archivo != "") {
			        // guardamos el archivo a la carpeta files
			        $destino =  "archivos/".$prefijo."_".$archivo;
			        if (copy($_FILES['banner-5']['tmp_name'],$destino)) {
			            $status = "Archivo subido: <b>".$archivo."</b>";
			        } else {
			            $status = "Error al subir el archivo";
			        }
			    } else {
			        $status = "Error al subir archivo";
			    }
				
				
				$query='
				UPDATE  banners SET
				imagen="'.$destino.'"
				WHERE  	seccion_id=5;';
				
				$this->query($query,0);
				
				$_SESSION["flash_ok"]="El archivo se actualizo correctamente";
				
				
			}
			
		}
		
		/* Fin Banner 2 */
		
		
	}
	
}



?>