<?php


require_once("basededatos.php");
require_once("simpleimage.php");


class Noticia  extends Basededatos
{
	function __construct(){
		parent::__construct();
	}
	
	
	function save(){
		
		if(isset($_FILES["archivo"])&&($_FILES["archivo"]['name']!="")){

				$tamano = $_FILES["archivo"]['size'];
		    	$tipo = $_FILES["archivo"]['type'];
		   	 	$archivo = $_FILES["archivo"]['name'];
		    	$prefijo = substr(md5(uniqid(rand())),0,6);

				
		    	if(($tipo=="image/jpeg")||($tipo=="image/png")){
				
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

				$image = new SimpleImage();
				$image->load($destino);
				$image->resizeToWidth(85);
				$image->save($destino);
				
				
				$query='INSERT INTO noticias SET
				titulo="'.addslashes($_POST["titulo"]).'",
				breve="'.addslashes($_POST["breve"]).'",
				contenido="'.addslashes($_POST["contenido"]).'",
				imagen="'.$destino.'",
				seccion_id="'.addslashes($_POST["seccion_id"]).'",
				fecha_create=NOW();';
				$this->query($query,0);
				
				$_SESSION["flash_ok"]="La noticia se subió correctamente";

			}else{
				
				$_SESSION["flash_error"]="Error al subir al archivo";
				
			}

		}else{

				$query='INSERT INTO noticias SET
				titulo="'.addslashes($_POST["titulo"]).'",
				breve="'.addslashes($_POST["breve"]).'",
				contenido="'.addslashes($_POST["contenido"]).'",
				imagen="",
				seccion_id="'.addslashes($_POST["seccion_id"]).'",
				fecha_create=NOW();';
				$this->query($query,0);
		}
	}
	
	
	
	function update(){


		if(isset($_FILES["archivo"])&&($_FILES["archivo"]['name']!="")){

				$tamano = $_FILES["archivo"]['size'];
		    	$tipo = $_FILES["archivo"]['type'];
		   	 	$archivo = $_FILES["archivo"]['name'];
		    	$prefijo = substr(md5(uniqid(rand())),0,6);
				
				
			

		    	if(($tipo=="image/jpeg")||($tipo=="image/png")){
				
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
			 	
			
				$image = new SimpleImage();
				$image->load($destino);
				$image->resizeToWidth(85);
				$image->save($destino);
			
				$query='UPDATE  noticias SET
				titulo="'.addslashes($_POST["titulo"]).'",
				breve="'.addslashes($_POST["breve"]).'",
				contenido="'.addslashes($_POST["contenido"]).'",
				imagen="'.$destino.'",
				seccion_id="'.addslashes($_POST["seccion_id"]).'",
				fecha_create=NOW()
				WHERE id='.$_POST["id"].';';
				$this->query($query,0);
				
				$_SESSION["flash_ok"]="La noticia se subió correctamente";

			}else{
				
				$_SESSION["flash_error"]="Error al subir al archivo";
				
			}

		}else{

				$query='UPDATE  noticias SET
				titulo="'.addslashes($_POST["titulo"]).'",
				breve="'.addslashes($_POST["breve"]).'",
				contenido="'.addslashes($_POST["contenido"]).'",
				seccion_id="'.addslashes($_POST["seccion_id"]).'",
				fecha_create=NOW()
				WHERE id='.$_POST["id"].';';
				$this->query($query,0);
		}
		
	}

	function delete(){
		$query='DELETE FROM noticias WHERE id="'.$_GET["id"].'" LIMIT 1;';
		$this->query($query,0);
	}
		
	function get_noticia($id){
		$query='SELECT n.id,n.titulo, breve, n.contenido,n.imagen, n.seccion_id,n.fecha_create,
					   (SELECT nombre FROM secciones WHERE id=n.seccion_id) as seccion_nombre FROM noticias n 
					   WHERE n.id='.$id.'
					   order by n.id DESC';
		$array_datos=$this->query($query,1);
		return $array_datos;
	}
	
	function get_noticias_seccion($id){
		$query='SELECT n.id,n.titulo, breve, n.contenido,n.imagen, n.seccion_id,n.fecha_create,
					   (SELECT nombre FROM secciones WHERE id=n.seccion_id) as seccion_nombre FROM noticias n 
					   WHERE seccion_id='.$id.' or seccion_id=6 
					   order by n.id DESC';
		$array_datos=$this->query($query,1);
		return $array_datos;
	}

	function get_noticias(){
		$query='SELECT n.id,n.titulo, breve, n.contenido,n.imagen, n.seccion_id,n.fecha_create,
					   (SELECT nombre FROM secciones WHERE id=n.seccion_id) as seccion_nombre FROM noticias n order by n.id DESC';
		$array_datos=$this->query($query,1);
		return $array_datos;
	}
	
	function get_secciones(){
		$query='SELECT * FROM secciones order by id ASC';
		$array_datos=$this->query($query,1);
		return $array_datos;
	}

}


?>