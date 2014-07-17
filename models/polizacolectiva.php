<?php

require_once("basededatos.php");
require_once("cliente.php");


class PolizaColectiva extends  Basededatos
{
	function __construct(){
		parent::__construct();
	}
        
        
        function get_polizas_colectivas(){
		
		$query='SELECT  pc.id,
				pc.n_poliza,
                                pc.nombre_contratante,
                                pc.url_archivo,
                                pc.fecha_creacion
				FROM polizas_colectivas pc';
		
		$array_datos=$this->query($query,1);
		return $array_datos;

	}
        
        function get_polizas_colectivas_excel(){
		
		$query='SELECT  pc.id,
				pc.n_poliza,
                                pc.nombre_contratante,
                                pc.url_archivo,
                                pc.fecha_creacion
				FROM polizas_colectivas pc';
		
		$array_datos=$this->query($query,1);
		return $array_datos;

	}
	
	function get_poliza_colectiva($id){
		$query='SELECT * FROM usuarios WHERE id='.$id.';';
		$array_datos=$this->query($query,1);
		return $array_datos;
	}
	
        	
        
	
	function insert_polizas_colectivas(){
            $cantidad = $_POST["cantidad_polizas"];
            
            
            for ($i=0;$i<$cantidad;$i++)
            {
		if((isset($_FILES["archivo"]['name'][$i]))&&($_FILES["archivo"]['name'][$i]!="")&&(isset($_POST["nro_poliza"][$i]))&&$_POST["nro_poliza"][$i]!=""){
			
	    $tamano = $_FILES["archivo"]['size'][$i];
	    $tipo = $_FILES["archivo"]['type'][$i];
	    $archivo = $_FILES["archivo"]['name'][$i];
	    $prefijo = substr(md5(uniqid(rand())),0,6);
		
		$texto_archivo="";
		
		if(($tipo=="application/pdf")||($tipo=="application/doc")||($tipo=="application/msword")){
			
			if ($archivo != "") {
		        // guardamos el archivo a la carpeta files
		        $destino =  "archivos/polizas_colectivas/".$_POST["nro_poliza"][$i]."-$prefijo.pdf";//.$prefijo."_".$archivo;
		        if (copy($_FILES['archivo']['tmp_name'][$i],$destino)) {
		            $status = "Archivo subido: <b>".$archivo."</b>";
					
					$texto_archivo="".URL.$destino."";
			
		        } else {
		            $status = "Error al subir el archivo";
		        }
		    } else {
		        $status = "Error al subir archivo";
		    }
		
			$_SESSION["flash_ok"]="El archivo se subió correctamente";

		}else{
			
			$_SESSION["flash_error"]="Error al subir al archivo";
			
		}
		}
                
                
                
               
		$query='INSERT INTO polizas_colectivas SET
				n_poliza="'.$_POST["nro_poliza"][$i].'",
				nombre_contratante="'.$_POST["nombre_contratante"][$i].'",
				url_archivo="'.$texto_archivo.'",
				fecha_creacion=NOW();';
				
		$this->query($query,0);
		
                /*
		$insert_id=mysql_insert_id();
		$tiempo="72hrs";
		
		$html='
			Estimado Cliente,
			<p>
			Su notificación ha sido recibida en <b>EQUIVIDA S.A.</b>
			</p>
			<p>
			Un ejecutivo de siniestros se comunicará con usted en el transcurso de las próximas 48 horas, para indicarle los pasos a seguir para su reclamo.
			</p>
			<p>
			Para cualquier duda comunicarse con: soporteweb@equivida.com
			</p>
			Muchas gracias.
		';
		
		
		$html_equivida='
		<b>Notificación Siniestro</b>
		<p>
			<h3>Solicitud No. : '.$insert_id.'</h3>
			<b>Po|liza:</b>'.$_POST["n_poliza"].'<br>
			<b>E-mail:</b>'.$_POST["email"].'<br>
			<b>Primer Nombre:</b>'.$_POST["primer_nombre"].'<br>
			<b>Segundo Nombre:</b>'.$_POST["segundo_nombre"].'<br>
			<b>Apellido Paterno:</b>'.$_POST["apellido_paterno"].'<br>
			<b>Tipo de Usuario:</b> '.$_SESSION["equivida"]["rol"].'<br>
			<b>Ce|dula:</b>'.$_POST["cedula"].'<br>
				<b>Teléfono Celular:</b> '.$_SESSION["equivida"]["bd"]["telefono_movil"].'<br>
				<b>Teléfono Convencional:</b> '.$_SESSION["equivida"]["bd"]["telefono_convencional"].'<br>
			<b>Contratante :</b>'.$_POST["contratante"].'<br>
			
		<b>Datos de Contacto</b><br>	
			<b>Afectado :</b>'.$_POST["afectado"].'<br>
                        <b>Lugar del Siniestro :</b>'.$_POST["lugar"].'<br>
			<b>Tele|fono emergencia :</b>'.$_POST["telefono_contacto"].'<br>
			
			<b>Fecha del evento:</b>'.$_POST["fecha_del_evento"].'<br>
			<b>Diagnostico y breve descripcio|n del evento:</b>'.$_POST["breve_descripcion"].'<br>
                        '.$texto_archivo.'
		</p>
		<p>Tienes <b>'.$tiempo.'</b> para responder este e-mail.</p>
		';
		
		$html_equivida=str_replace("á","a|",$html_equivida);
		$html_equivida=str_replace("é","e|",$html_equivida);
		$html_equivida=str_replace("í","i|",$html_equivida);
		$html_equivida=str_replace("ó","o|",$html_equivida);
		$html_equivida=str_replace("ú","u|",$html_equivida);
		$html_equivida=str_replace("ñ","n|",$html_equivida);
	
		
			$email=$_SESSION["equivida"]["bd"]["email"];

			//Enviar Cliente

			$ch = curl_init(MAIL_SERVER);

			curl_setopt ($ch, CURLOPT_POST, 1);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			$para=EMAIL_CONTACTO;

			$post= "action=notificar&asunto=Equivida.com: Consulta en Linea - Notificacion Siniestro&de=soporteweb@equivida.com&para=".$email."&html=".$html."&rol=usuario";
			curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
			$page=curl_exec ($ch);
			curl_close ($ch);


			//Enviar Soporte


			$ch = curl_init(MAIL_SERVER);

			curl_setopt ($ch, CURLOPT_POST, 1);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			$para=EMAIL_CONTACTO;

			$post= "action=notificar&asunto=Equivida.com: Consulta en Linea - Notificacion Siniestro&de=soporteweb@equivida.com&para=".$para."&html=".$html_equivida."&rol=".$_SESSION["equivida"]["rol"];
			curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
			$page=curl_exec ($ch);
			curl_close ($ch);
		*/
		

			$_SESSION["flash_ok"]="Las polizas colectivas fueron agregadas correctamente";
		/*
				$query='UPDATE solicitudes SET
						html_cliente="'.addslashes($html).'",
						html_equivida="'.addslashes($html_equivida).'"
						WHERE id='.$insert_id.'';

				$this->query($query,0);*/
                
                
            }
	}
	
	
}

?>