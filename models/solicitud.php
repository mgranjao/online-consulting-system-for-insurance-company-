<?php

require_once("basededatos.php");
require_once("cliente.php");


class Solicitud extends  Basededatos
{
	function __construct(){
		parent::__construct();
	}
	function set_solicitud($seccion,$accion){
		
		
		$login=new Cliente();
		$direcciones=$login->get_direcciones();
		
		
		$query='INSERT INTO solicitudes SET
				usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'",
				seccion="'.$seccion.'",
				poliza="'.$_POST["n_poliza"].'",
				accion="'.$accion.'",
				html_cliente="",
				html_equivida="",
				fecha_create=NOW();';
		
		$this->query($query,0);
		
		$insert_id=mysql_insert_id();
		
		
		$tiempo=0;
		
		if($_POST["envio"]=="email"){
			$tiempo="24hrs";
		}else{
			$tiempo="72hrs";
		}
		
		if ($_POST['solicitud_estado_cuenta']==1)
                {$html='
		Estimado cliente,
		<p>
		Su solicitud  de Estado de cuenta N° '.$insert_id.' para <b>'.$seccion.'</b> ha sido recibida y sera| atendida en el lapso de '.$tiempo.'.
		</p>                   
		'//<b>Período seleccionado:</b> '.$_POST["periodo"].'<br> anterior(es) al mes actual
                +'<p>
		Para cualquier duda comunicarse con: soporteweb@equivida.com
		</p>
		<br>
		Muchas gracias
		
		<p>
		Saludos<br>
		Equipo de Equivida
		</p>
		';
		
		for($i=0;$i<count($direcciones);$i++){
				if($direcciones[$i]["id"]==$_POST["lugar_entrega"]){
					$enviar_direccion=$direcciones[$i];
				}
		}
	
		
		$html_equivida='
		
		
		<b>Solicitud '.$seccion.'  - Vi|a: '.$_POST["envio"].' </b>
		<p>
		El cliente genero| una solicitud de '.$seccion.', con los siguientes datos:
		<br>
		<h3>Solicitud No. : '.$insert_id.'</h3>
		<b>N. Po|liza:</b> '.$_POST["n_poliza"].'<br>
		<b>Nombre:</b> '.$_SESSION["equivida"]["bd"]["primer_nombre"].' '.$_SESSION["equivida"]["bd"]["primer_apellido"].'<br>
		<b>Email:</b> '.$_SESSION["equivida"]["bd"]["email"].'<br>
		<b>Teléfono Celular:</b> '.$_SESSION["equivida"]["bd"]["telefono_movil"].'<br>
		<b>Teléfono Convencional:</b> '.$_SESSION["equivida"]["bd"]["telefono_convencional"].'<br>
		<b>Tipo de Usuario:</b> '.$_SESSION["equivida"]["rol"].'<br>
		<b>Ce|dula del Asegurado:</b> '.$_POST["cedula_asegurado"].'<br>
		';//<b>Desde:</b> '.$_POST["desde"].'<br>
		//<b>Hasta:</b> '.$_POST["hasta"].'<br>
                $html_equivida.=/*'
                <b>Período:</b> '.$_POST["periodo"].'<br> anterior(es) al mes actual*/
		'<b>Tipo de Envio:</b> '.$_POST["envio"].'<br> 
		<b>Nu|mero de Contacto:</b> '.$_POST["n_contacto"].'<br> 
		<br>
		<b>Direccioo|n del Cliente:</b><br>
		<b>Calle Principal:</b>'.$enviar_direccion["calle_principal"].'<br>
		<b>Calle Secundaria:</b>'.$enviar_direccion["calle_secundaria"].'<br>
		<b>Provincia:</b>'.$enviar_direccion["provincia_nombre"].'<br>
		<b>Cantón:</b>'.$enviar_direccion["canton"].'<br>
		<b>Ciudad:</b>'.$enviar_direccion["ciudad"].'<br>
		<b>Tipo:</b>'.$enviar_direccion["tipo"].'<br>
		
		<p>Tiene <b>'.$tiempo.'</b> para responder este e-mail.</p>
		
		<p>
		Saludos<br>
		Equipo de Equivida
		</p>
		';
                }
                else
                {
                 $html='
		Estimado cliente,
		<p>
		Su solicitud  N° '.$insert_id.' para <b>'.$seccion.'</b> ha sido recibida y sera| atendida en el lapso de '.$tiempo.'.
		</p>                   
		<p>
		Para cualquier duda comunicarse con: soporteweb@equivida.com
		</p>
		<br>
		Muchas gracias
		
		<p>
		Saludos<br>
		Equipo de Equivida
		</p>
		';
		
		for($i=0;$i<count($direcciones);$i++){
				if($direcciones[$i]["id"]==$_POST["lugar_entrega"]){
					$enviar_direccion=$direcciones[$i];
				}
		}
	
		
		$html_equivida='
		
		
		<b>Solicitud '.$seccion.'  - Vi|a: '.$_POST["envio"].' </b>
		<p>
		El cliente genero| una solicitud de '.$seccion.', con los siguientes datos:
		<br>
		<h3>Solicitud No. : '.$insert_id.'</h3>
		<b>N. Po|liza:</b> '.$_POST["n_poliza"].'<br>
		<b>Nombre:</b> '.$_SESSION["equivida"]["bd"]["primer_nombre"].' '.$_SESSION["equivida"]["bd"]["primer_apellido"].'<br>
		<b>Email:</b> '.$_SESSION["equivida"]["bd"]["email"].'<br>
		<b>Teléfono Celular:</b> '.$_SESSION["equivida"]["bd"]["telefono_movil"].'<br>
		<b>Teléfono Convencional:</b> '.$_SESSION["equivida"]["bd"]["telefono_convencional"].'<br>
		<b>Tipo de Usuario:</b> '.$_SESSION["equivida"]["rol"].'<br>
		<b>Ce|dula del Asegurado:</b> '.$_POST["cedula_asegurado"].'<br>
		<b>Desde:</b> '.$_POST["desde"].'<br>
		<b>Hasta:</b> '.$_POST["hasta"].'<br>
                <b>Período:</b> '.$_POST["periodo"].'<br> anterior(es) al mes actual
		<b>Tipo de Envio:</b> '.$_POST["envio"].'<br> 
		<b>Nu|mero de Contacto:</b> '.$_POST["n_contacto"].'<br> 
		<br>
		<b>Direccioo|n del Cliente:</b><br>
		<b>Calle Principal:</b>'.$enviar_direccion["calle_principal"].'<br>
		<b>Calle Secundaria:</b>'.$enviar_direccion["calle_secundaria"].'<br>
		<b>Provincia:</b>'.$enviar_direccion["provincia_nombre"].'<br>
		<b>Cantón:</b>'.$enviar_direccion["canton"].'<br>
		<b>Ciudad:</b>'.$enviar_direccion["ciudad"].'<br>
		<b>Tipo:</b>'.$enviar_direccion["tipo"].'<br>
		
		<p>Tiene <b>'.$tiempo.'</b> para responder este e-mail.</p>
		
		<p>
		Saludos<br>
		Equipo de Equivida
		</p>
		';   
                }
	
		
				
		$email=$_SESSION["equivida"]["bd"]["email"];
		
		//Enviar Cliente
		
		$ch = curl_init(MAIL_SERVER);

		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		$para=EMAIL_CONTACTO;

		$post= "action=register&asunto=Equivida.com: Consulta en Linea - Solicitud Estado de Cuenta&de=soporteweb@equivida.com&para=".$email."&html=".$html."&rol=usuario";
		curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
		$page=curl_exec ($ch);
		curl_close ($ch);
		
		
		//Enviar Soporte
		
		
		$ch = curl_init(MAIL_SERVER);

		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		$para=EMAIL_CONTACTO;

		$post= "action=register&asunto=Equivida.com: Consulta en Linea - Solicitud Estado de Cuenta&de=soporteweb@equivida.com&para=".$para."&html=".$html_equivida."&rol=".$_SESSION["equivida"]["rol"]."&seccion=solicitud_estado_cuenta";
		curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
		$page=curl_exec ($ch);
		curl_close ($ch);
		

		
		$_SESSION["flash_ok"]="La solicitud se envío correctamente";
		
		
		$query='UPDATE solicitudes SET
				html_cliente="'.addslashes($html).'",
				html_equivida="'.addslashes($html_equivida).'"
				WHERE id='.$insert_id.'';

		$this->query($query,0);
			
		
		
	} 
	
	function set_notificar(){
	
		if((isset($_FILES["archivo"]['name']))&&($_FILES["archivo"]['name']!="")){
			
		$tamano = $_FILES["archivo"]['size'];
	    $tipo = $_FILES["archivo"]['type'];
	    $archivo = $_FILES["archivo"]['name'];
	    $prefijo = substr(md5(uniqid(rand())),0,6);
		
		$texto_archivo="";
		
		if(($tipo=="application/pdf")||($tipo=="application/doc")||($tipo=="application/msword")){
			
			if ($archivo != "") {
		        // guardamos el archivo a la carpeta files
		        $destino =  "archivos/".$prefijo."_".$archivo;
		        if (copy($_FILES['archivo']['tmp_name'],$destino)) {
		            $status = "Archivo subido: <b>".$archivo."</b>";
					
					$texto_archivo="<b>Archivo Adjunto:</b>".URL.$destino."<br>";
			
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
                
		$query='INSERT INTO solicitudes SET
				usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'",
				seccion="Siniestro",
				poliza="'.$_POST["n_poliza"].'",
				accion="Notificar",
				html_cliente="",
				html_equivida="",
				fecha_create=NOW();';
				
		$this->query($query,0);
		
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
		
		/*$html_equivida='
		
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
			<b>Nombre Completo de Contacto :</b>'.$_POST["nombre_completo_contacto"].'<br>
			<b>Tele|fono Contacto :</b>'.$_POST["telefono_contacto"].'<br>
			<b>Celular Contacto :</b>'.$_POST["celular_contacto"].'<br>
			<b>Mail Contacto :</b>'.$_POST["mail_contacto"].'<br>
			<b>Fecha del evento:</b>'.$_POST["fecha_del_evento"].'<br>
			<b>Diagnostico y breve descripcio|n del evento:</b>'.$_POST["breve_descripcion"].'<br>
                        '.$texto_archivo.'
		</p>
		
		<p>Tienes <b>'.$tiempo.'</b> para responder este e-mail.</p>
		
		';*/
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
		
		

			$_SESSION["flash_ok"]="La notificación fue envíada correctamente";
		
				$query='UPDATE solicitudes SET
						html_cliente="'.addslashes($html).'",
						html_equivida="'.addslashes($html_equivida).'"
						WHERE id='.$insert_id.'';

				$this->query($query,0);
	}
	
	function set_factura(){
		
		$query='INSERT INTO solicitudes SET
				usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'",
				seccion="Factura",
				poliza="'.$_POST["poliza"].'",
				accion="Solicitar",
				html_cliente="",
				html_equivida="",
				fecha_create=NOW();';
		
		$this->query($query,0);
		$insert_id=mysql_insert_id();

		$login=new Cliente();
		$direcciones=$login->get_direcciones();
		
		$seccion="Factura";
		
		$tiempo=0;
		
		if($_POST["envio"]=="email"){
			$tiempo="24hrs";
		}else{
			$tiempo="72hrs";
		}
		
		$mes = date("n"); 
        $mesArray = array( 
            1 => "Enero",
            2 => "Febrero",
             3 => "Marzo",
             4 => "Abril", 
             5 => "Mayo",
              6 => "Junio", 
              7 => "Julio", 
              8 => "Agosto",
           9 => "Septiembre", 
           10 => "Octubre", 
           11 => "Noviembre", 
           12 => "Diciembre" 
         );
         
				$html='
				Estimado cliente,
				<p>
				Su solicitud  N° '.$insert_id.' para <b>última emisión hasta:</b>'.$mesArray[$mes].' ha sido recibida y será atendida en el lapso de '.$tiempo.'.
				</p>
				<p>
				Para cualquier duda comunicarse con: soporteweb@equivida.com
				</p>
				<br>
				Muchas gracias

				<p>
				Saludos<br>
				Equipo de Equivida
				</p>
				';
				
				for($i=0;$i<count($direcciones);$i++){
						if($direcciones[$i]["id"]==$_POST["lugar_entrega"]){
							$enviar_direccion=$direcciones[$i];
						}
				}


				$html_equivida='


				<b>Solicitud  <b>Factura</b>  - '.$_POST["envio"].' </b>
				<p>
				El cliente genero| una solicitud de '.$seccion.', con los siguientes datos:
				<br>
				
				<h3>Solicitud No. : '.$insert_id.'</h3>
				<b>No. Po|liza:</b> '.$_POST["n_poliza"].'<br>
				
				<b>Nombre:</b> '.$_SESSION["equivida"]["bd"]["primer_nombre"].' '.$_SESSION["equivida"]["bd"]["primer_apellido"].'<br>
				<b>Email:</b> '.$_SESSION["equivida"]["bd"]["email"].'<br>
				<b>Tele|fono Celular:</b> '.$_SESSION["equivida"]["bd"]["telefono_movil"].'<br>
				<b>Tele|fono Convencional:</b> '.$_SESSION["equivida"]["bd"]["telefono_convencional"].'<br>
				<b>Tipo de Usuario:</b> '.$_SESSION["equivida"]["rol"].'<br>
				
				<h3>Información de la Factura</h3>
				
				<b>última emisión hasta:</b>'.$mesArray[$mes].'<br>
				<b>Cédula del Asegurado:</b> '.$_POST["n_cedula"].'<br>
				<!--<b>Fecha Desde:</b> '.$_POST["ano_desde"]."/".$_POST["mes_desde"].'<br>
				<b>Fecha Hasta:</b> '.$_POST["ano_hasta"]."/".$_POST["mes_hasta"].'<br>-->
				<b>Tipo de Envío:</b> '.$_POST["envio"].'<br> 
				<b>Nu|mero de Contacto:</b> '.$_POST["n_contacto"].'<br> 
				<br>
			
				<h3>Direccio|n del Cliente</h3>
			
				<b>Calle Principal:</b>'.$enviar_direccion["calle_principal"].'<br>
				<b>Calle Secundaria:</b>'.$enviar_direccion["calle_secundaria"].'<br>
				<b>Teléfono convencional:</b>'.$enviar_direccion["telefono_convencional"].'<br>
				<b>Provincia:</b>'.$enviar_direccion["provincia_nombre"].'<br>
				<b>Cantón:</b>'.$enviar_direccion["canton"].'<br>
				<b>Ciudad:</b>'.$enviar_direccion["ciudad"].'<br>
				<b>Tipo:</b>'.$enviar_direccion["tipo"].'<br>
				<p>Tienes <b>'.$tiempo.'</b> para responder este e-mail.</p>
				<p>
				Saludos<br>
				Equipo de Equivida
				</p>
				';
				


					
						$email=$_SESSION["equivida"]["bd"]["email"];
                                                
						//Enviar Cliente

						$ch = curl_init(MAIL_SERVER);

						curl_setopt ($ch, CURLOPT_POST, 1);
						curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
						$para=EMAIL_CONTACTO;

						$post= "action=register&asunto=Equivida.com: Consulta en Linea - Solicitud Factura&de=soporteweb@equivida.com&para=".$email."&html=".$html."&rol=usuario";
						curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
						$page=curl_exec ($ch);
						curl_close ($ch);


						//Enviar Soporte


						$ch = curl_init(MAIL_SERVER);

						curl_setopt ($ch, CURLOPT_POST, 1);
						curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
						$para=EMAIL_CONTACTO;

						$post= "action=register&asunto=Equivida.com: Consulta en Linea - Solicitud Factura&de=soporteweb@equivida.com&para=".$para."&html=".$html_equivida."&rol=".$_SESSION["equivida"]["rol"]."&seccion=factura";
						curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
						$page=curl_exec ($ch);
						curl_close ($ch);
					
					
						$_SESSION["flash_ok"]="La solicitud se envío correctamente";
						

							$query='UPDATE solicitudes SET
									html_cliente="'.addslashes($html).'",
									html_equivida="'.addslashes($html_equivida).'"
									WHERE id='.$insert_id.'';

							$this->query($query,0);
	}


	function set_prestamo(){

		$login=new Cliente();
		$direcciones=$login->get_direcciones();

		$seccion="Pre|stamo";

		$query='INSERT INTO solicitudes SET
				usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'",
				seccion="Prestamo",
				poliza="'.$_POST["poliza"].'",
				accion="Solicitar",
				html_cliente="",
				html_equivida="",
				fecha_create=NOW();';
		
		$this->query($query,0);
		$insert_id=mysql_insert_id();
		
		$tiempo="24hrs";

		$html='
				Estimado cliente,
				<p>
				Su Consulta N° '.$insert_id.' para <b>Préstamo</b> ha sido recibida y será atendida en el lapso de '.$tiempo.'.
				</p>
				<p>
				Si desea una asesoría inmediata comuníquese con nosotros al 1800-EQUIVIDA.<br/>
				También puede escribirnos sus inquietudes o comentarios a: soporteweb@equivida.com<br/>
				</p>
				<br>
				Muchas gracias

				<p>
				Saludos<br>
				Equipo de Equivida
				</p>
				';
		for($i=0;$i<count($direcciones);$i++){
						if($direcciones[$i]["id"]==$_POST["lugar_entrega"]){
							$enviar_direccion=$direcciones[$i];
						}
				}

				if(count($enviar_direccion)==0){
					$enviar_direccion=$direcciones[0];
				}

				$html_equivida='


				<b>Consulta para <b>Préstamo</b>  - '.$_POST["envio"].' </b>
				<p>
				El cliente generó una consulta de '.$seccion.', con los siguientes datos:
				<br>
				<h3>Solicitud No. : '.$insert_id.'</h3>
				<b>N. Po|liza:</b> '.$_POST["n_poliza"].'<br>
				<b>Nombre:</b> '.$_SESSION["equivida"]["bd"]["primer_nombre"].' '.$_SESSION["equivida"]["bd"]["primer_apellido"].'<br>
				<b>Email:</b> '.$_SESSION["equivida"]["bd"]["email"].'<br>
				<b>Tele|fono Celular:</b> '.$_SESSION["equivida"]["bd"]["telefono_movil"].'<br>
				<b>Tele|fono Convencional:</b> '.$_SESSION["equivida"]["bd"]["telefono_convencional"].'<br>
				<b>Tipo de Usuario:</b> '.$_SESSION["equivida"]["rol"].'<br>
				
				<b>Ce|dula del Asegurado:</b> '.$_POST["n_cedula"].'<br>
				<b>Valor a Prestar:</b> '.$_POST["valor_a_prestar"].'<br>
				<b>Monto máximo a prestar:</b> '.$_POST["monto_a_prestar"].'<br> 
				<b>Nu|mero de Contacto:</b> '.$_POST["n_contacto"].'<br> 
				<br>
				<b>Direccio|n del Cliente:</b><br>
				<b>Calle Principal:</b>'.$enviar_direccion["calle_principal"].'<br>
				<b>Calle Secundaria:</b>'.$enviar_direccion["calle_secundaria"].'<br>
				<b>Tele|fono convencional:</b>'.$enviar_direccion["telefono_convencional"].'<br>
				<b>Provincia:</b>'.$enviar_direccion["provincia_nombre"].'<br>
				<b>Canto|n:</b>'.$enviar_direccion["canton"].'<br>
				<b>Ciudad:</b>'.$enviar_direccion["ciudad"].'<br>
				<b>Tipo:</b>'.$enviar_direccion["tipo"].'<br>
				
				
				<p>Tiene <b>'.$tiempo.'</b> para comunicarse con el cliente.</p>
				
				<p>
				Saludos<br>
				Equipo de Equivida
				</p>
				';

				
				
				
	
				
					$email=$_SESSION["equivida"]["bd"]["email"];

					//Enviar Cliente

					$ch = curl_init(MAIL_SERVER);

					curl_setopt ($ch, CURLOPT_POST, 1);
					curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
					$para=EMAIL_CONTACTO;

					$post= "action=register&asunto=Equivida.com: Consulta en Linea - Solicitud Prestamo&de=soporteweb@equivida.com&para=".$email."&html=".$html."&rol=usuario";
					curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
					$page=curl_exec ($ch);
					curl_close ($ch);


					//Enviar Soporte


					$ch = curl_init(MAIL_SERVER);

					curl_setopt ($ch, CURLOPT_POST, 1);
					curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
					$para=EMAIL_CONTACTO;

					$post= "action=register&asunto=Equivida.com: Consulta en Linea - Solicitud Prestamo&de=soporteweb@equivida.com&para=".$para."&html=".$html_equivida."&rol=".$_SESSION["equivida"]["rol"]."&seccion=prestamo";
					curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
					$page=curl_exec ($ch);
					curl_close ($ch);

				
				$_SESSION["flash_ok"]="La solicitud se envío correctamente";
				
					$query='UPDATE solicitudes SET
							html_cliente="'.addslashes($html).'",
							html_equivida="'.addslashes($html_equivida).'"
							WHERE id='.$insert_id.'';

					$this->query($query,0);

	}
	
	
	function set_contacto(){
		
		
		
		if((trim($_POST["asunto"])!="")&&(trim($_POST["mensaje"])!="")){
			
		
		if((isset($_FILES["archivo"]['name']))&&($_FILES["archivo"]['name']!="")){
			
		$tamano = $_FILES["archivo"]['size'];
	    $tipo = $_FILES["archivo"]['type'];
	    $archivo = $_FILES["archivo"]['name'];
	    $prefijo = substr(md5(uniqid(rand())),0,6);
		
		$texto_archivo="";
		
		if(($tipo=="application/pdf")||($tipo=="application/doc")||($tipo=="application/msword")){
			
			if ($archivo != "") {
		        // guardamos el archivo a la carpeta files
		        $destino =  "archivos/".$prefijo."_".$archivo;
		        if (copy($_FILES['archivo']['tmp_name'],$destino)) {
		            $status = "Archivo subido: <b>".$archivo."</b>";
					
					$texto_archivo="<b>Archivo Adjunto:</b>".URL.$destino."<br>";
			
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


	
		
		
		// Email Cliente
		$seccion="Formulario de Contacto";
		$query='INSERT INTO solicitudes SET
				usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'",
				seccion="Datos Generales",
				poliza="0",
				accion="Contacto",
				fecha_create=NOW();';

		$this->query($query,0);

		$insert_id=mysql_insert_id();

		$tiempo="5hrs";
		
		$html='
		Estimado cliente,
		<p>
		Su solicitud  N° '.$insert_id.' para <b>'.$seccion.'</b> ha sido recibida y sera| atendida en el lapso de '.$tiempo.'.
		</p>
		<p>
		Para cualquier duda comunicarse con: soporteweb@equivida.com
		</p>
		<br>
		Muchas gracias

		<p>
		Saludos<br>
		Equipo de Equivida
		</p>
		';
		
		$email=$_SESSION["equivida"]["bd"]["email"];
		
	
		$ch = curl_init(MAIL_SERVER);

		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		$para=EMAIL_CONTACTO;

		$post= "action=register&asunto=Equivida.com: Formulario de Contacto&de=soporteweb@equivida.com&para=".$email."&html=".$html."&rol=usuario";
		curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
		$page=curl_exec ($ch);
		curl_close ($ch);
		// Email Cliente
		
		//Email Equivida
		
		
		
		$html_cliente=$html;
		
		
		
			$html='
					<p>
					<b>Formulario de Contacto:</b>

					<p>
					Informacio|n Mail:
					</p>
					<h4>Solicitud: '.$insert_id.'</h4>
					<b>Nombre: </b> '.$_POST["nombre"].'<br>
					<b>Apellidos Paterno: </b> '.$_POST["apellidoPaterno"].'<br>
					<b>Apellidos Materno: </b> '.$_POST["apellidoMaterno"].'<br>
					<b>Ce|dula: </b> '.$_POST["cedula"].'<br>
					<b>Email: </b> '.$_POST["email"].'<br>
					<b>Ciudad: </b> '.$_POST["ciudad"].'<br>
					<b>Pai|s: </b> '.$_POST["pais"].'<br>
					<b>Tipo Usuario: </b> '.$_SESSION["equivida"]["rol"].'<br>
					<b>Asunto: </b> '.$_POST["asunto"].'<br>
					<b>Nu|mero de Contacto: </b> '.$_POST["n_contacto"].'<br>
					<b>Mensaje: </b> '.$_POST["mensaje"].'<br>'.$texto_archivo.'
					</p>
					
					<p>Tienes <b>'.$tiempo.'</b> para responder este e-mail.</p>
					
					<p>
					Saludos<br>
					Equipo de Equivida
					</p>
			';
			$html_equivida=$html;
			
			
			$html=str_replace("á","a|",$html);
			$html=str_replace("é","e|",$html);
			$html=str_replace("í","i|",$html);
			$html=str_replace("ó","o|",$html);
			$html=str_replace("ú","u|",$html);
			$html=str_replace("ñ","n|",$html);


			$ch = curl_init(MAIL_SERVER);

			curl_setopt ($ch, CURLOPT_POST, 1);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			$para=EMAIL_CONTACTO;

			$post= "action=register&asunto=Equivida.com: Consulta en Linea - Formulario Contacto&de=servicioalcliente@equivida.com&para=".$para."&html=".$html."&rol=".$_SESSION["equivida"]["rol"]."&seccion=contacto";
			curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
			$page=curl_exec ($ch);
			curl_close ($ch);

			$_SESSION["flash_ok"]="El mensaje fue envíado correctamente";
		
		
		//Email Equivida
		
			$query='UPDATE solicitudes SET
					html_cliente="'.addslashes($html_cliente).'",
					html_equivida="'.addslashes($html_equivida).'"
					WHERE id='.$insert_id.'';

			$this->query($query,0);
		
		

		}else{
			
			$_SESSION["flash_error"]="Todos los campos son obligatorios";
			
		}
		
	}
	
	

	function set_certificado(){

		$query='INSERT INTO solicitudes SET
				usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'",
				seccion="Certificado Individual",
				poliza="'.$_SESSION["poliza"]["nro_pol"].'",
				accion="Generar",
				fecha_create=NOW();';
		
		$this->query($query,0);
		
		$insert_id=mysql_insert_id();
		
		return $insert_id;
		
	}
	
}

?>