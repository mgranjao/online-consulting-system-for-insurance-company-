<?php

require_once("./models/login.php");
require_once("./models/provincia.php");
require_once './models/directorio.php';
require_once './models/cliente.php';


class Configuracion_controller{
	
	private $tpl;
	function __construct($page,&$tpl) {
			$this->tpl=$tpl;
			if($page!="")
			eval('$this->'.$page.'();');
			else
			$this->index();
	}
	
	function datos_personales(){
		
		
		switch($_SESSION["equivida"]["rol"]){
			
			case "accionista":
				$directorio=new Directorio();
				$this->tpl->directorios=$directorio->get_directorios();
			break;
			case "director":
				$directorio=new Directorio();
				$this->tpl->directorios=$directorio->get_directorios();
			break;
		
			
		}
		
		
		
		$provincias=new Provincia();
		$this->tpl->provincias=$provincias->get_provincias();
		
		
		$login=new Login();
		
		$cliente_bd=new Cliente();
		
	
		if((isset($_POST))&&($_POST["status"]=="enviar")){

	//Enviar Correo
                    if($_POST["tipo_usuario"]!=2 and $_POST["tipo_usuario"]!=2)
                    {
			$html='		<p>
						
						<b>Formulario Actualizacio|n Datos del Cliente:</b>
						<p>
						Información Mail:
                                                Datos Antigüos:
						</p>
					
					<b>Apellido Paterno: </b> '.$_POST["apellidoPaterno"].'<br>
					<b>Apellido Materno: </b> '.$_POST["apellidoMaterno"].'<br>
                                        <b>Primer Nombre: </b> '.$_POST["primerNombre"].'<br>
                                        <b>Segundo Nombre: </b> '.$_POST["segundoNombre"].'<br>    
					<b>Email: </b> '.$_POST["email"].'<br>
					<b>Ce|dula: </b> '.$_POST["cedula"].'<br>
                                        <b>Fecha de Nacimiento(aaaa-mm-dd): </b> '.$_POST["fechaNacimiento"].'<br>
                                        
					

                                        <p>
                                        Datos Ingresados por el Cliente:
                                        </p>
                                        
                                        <b>Apellido Paterno: </b> '.$_POST["apellidoPaternoTxt"].'<br>
                                        <b>Apellido Materno: </b> '.$_POST["apellidoMaternoTxt"].'<br>
                                        <b>Primer Nombre: </b> '.$_POST["primerNombreTxt"].'<br>
                                        <b>Segundo Nombre: </b> '.$_POST["segundoNombreTxt"].'<br>
                                        <b>Email: </b> '.$_POST["emailTxt"].'<br>
                                        <b>Tipo de documento: </b> '.$_POST["tipoDocumentoTxt"].'<br>
                                        <b>Cédula o pasaporte: </b> '.$_POST["cedulaTxt"].'<br>
                                        <b>Fecha de Nacimiento(aaaa-mm-dd): </b> '.$_POST["fechaNacimientoTxt"].'<br>     
					<b>Nu|mero de contacto: </b> '.$_POST["n_contactoTxt"].'<br>
                                        </p>
			';
                    }else{
                        $html='		<p>
						
						<b>Formulario Actualizacio|n Datos del Cliente:</b>
						<p>
						Información Mail:
                                                Datos Antigüos:
						</p>
					
					<b>Razon Social: </b> '.$_POST["razon_social"].'<br>
					<b>RUC: </b> '.$_POST["ruc"].'<br>
                                        <b>Email: </b> '.$_POST["primerNombre"].'<br>
                                        

					

                                        <p>
                                        Datos Ingresados por el Cliente:
                                        </p>
                                        <b>Razon Social: </b> '.$_POST["razonSocialTxt"].'<br>
					<b>RUC: </b> '.$_POST["rucTxt"].'<br>
                                        <b>Email: </b> '.$_POST["emailTxt"].'<br>
                                        
                                        </p>
			';
                    }
			$ch = curl_init(MAIL_SERVER);
			
			curl_setopt ($ch, CURLOPT_POST, 1);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			$para=EMAIL_CONTACTO;
                        $post= "action=register&asunto=Equivida.com: Consulta en Linea - Formulario Actualizacion Datos&de=servicioalcliente@equivida.com&para=".$para."&html=".$html."&rol=".$_SESSION["equivida"]["rol"]."&seccion=actualizacion";
			curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
			$page=curl_exec ($ch);
			curl_close ($ch);

			$_SESSION["flash_ok"]="El mensaje fue envíado correctamente";

			

		}

		
		/* Consulta información cliente */
		if(($_SESSION["equivida"]["rol"]!="accionista")&&($_SESSION["equivida"]["rol"]!="director")){
			$wsdl=URL_WEBSERVICE."equivida-servicio-1.0/ClienteUnicoWsImpl?wsdl";
			
			$cliente = new SoapClient($wsdl);
			
			$args=array("codTipoId"=>"C","idPersona"=>$_SESSION["equivida"]["cedula"]);
			$info_cliente = $cliente->__soapCall('personaNatural', $args);
                        $this->tpl->info_cliente=$info_cliente;
                        
                }

	
		/* Consulta información cliente */
		
		
		$this->tpl->direcciones=$cliente_bd->get_direcciones();                
		$this->tpl->correos=$cliente_bd->get_correos();
		$this->tpl->telefonos=$cliente_bd->get_telefonos();
		
		
		$this->tpl->display('html/configuracion/datos_personales/index.tpl.php');
	}



	//Direccion

	function nueva_direccion(){

		$cliente=new Cliente();
		$cliente->set_direccion();
		header('Location: ?page=configuracion&action=datos_personales');
		
	}

	function borrar_direccion(){
		$cliente=new Cliente();
		$cliente->borrar_direccion();
		header('Location: ?page=configuracion&action=datos_personales');
	}


	function editar_direccion(){

		$provincias=new Provincia();
		$this->tpl->provincias=$provincias->get_provincias();

		$cliente=new Cliente();
		$direccion=$cliente->get_direccion($_GET["id"]);

		$this->tpl->direccion=$direccion;
		$this->tpl->display('html/configuracion/datos_personales/editar_direccion.tpl.php');
	}


	function actualizar_direccion(){

		$cliente=new Cliente();
		$cliente->update_direccion();
		header('Location: ?page=configuracion&action=datos_personales');

	}


	//Fin Direccion


	//Correo
	
	function nuevo_correo(){
		$cliente=new Cliente();
		$cliente->set_email();
		header('Location: ?page=configuracion&action=datos_personales');
	}

	function borrar_correo(){
		$cliente=new Cliente();
		$cliente->borrar_correo();
		header('Location: ?page=configuracion&action=datos_personales');
	}


	function editar_correo(){
		
		$cliente=new Cliente();
		$this->tpl->correo=$cliente->get_correo($_GET["id"]);
		$this->tpl->display('html/configuracion/datos_personales/editar_mail.tpl.php');
	}
	

	function actualizar_correo(){

		$cliente=new Cliente();
		$cliente->update_email();
		header('Location: ?page=configuracion&action=datos_personales');

	}

	//Fin Correo

	//Teléfono

	function nuevo_telefono(){
		$cliente=new Cliente();
		$cliente->set_telefono();
		header('Location: ?page=configuracion&action=datos_personales');

	}

	function editar_telefono(){
		$cliente=new Cliente();
		$this->tpl->telefono=$cliente->get_telefono($_GET["id"]);
		$this->tpl->display('html/configuracion/datos_personales/editar_telefono.tpl.php');	
	}

	function actualizar_telefono(){
		$cliente=new Cliente();
		$cliente->actualizar_telefono();
		header('Location: ?page=configuracion&action=datos_personales');
	}

	function borrar_telefono(){
		$cliente=new Cliente();
		$cliente->borrar_telefono();
		header('Location: ?page=configuracion&action=datos_personales');
	}

	//Fin Teléfono





	function configuracion_acceso(){
		
		switch($_SESSION["equivida"]["rol"]){

			case "accionista":
				$directorio=new Directorio();
				$this->tpl->directorios=$directorio->get_directorios();
			break;
			case "director":
				$directorio=new Directorio();
				$this->tpl->directorios=$directorio->get_directorios();
			break;


		}
		
		if(isset($_POST["id"])){
			$login=new Login();
			$login->update_user();
		}

		$user=new User();
		$this->tpl->usuarios_adicionales=$user->get_usuarios_adicionales($_SESSION["equivida"]["id"]);	
		$this->tpl->display('html/configuracion/configuracion_acceso/index.tpl.php');
	}
	
	
	
	function usuario_nuevo(){
		$this->tpl->display('html/configuracion/configuracion_acceso/usuarios/nuevo.tpl.php');
	}
	
	
	function save_usuario(){
		$user=new User();
		$user->save_usuario_adicional();
		header('Location: ?page=configuracion&action=configuracion_acceso');
	}

	function editar_usuario_admin(){
		$this->tpl->display('html/configuracion/configuracion_acceso/usuarios/editar_usuario_admin.tpl.php');
	}

	function editar_usuario_adicional(){
		$user=new User();
		$this->tpl->usuario_adicional=$user->get_usuario_adicional();
		$this->tpl->display('html/configuracion/configuracion_acceso/usuarios/editar_usuario_adicional.tpl.php');
	
	}

	function update_usuario_adicional(){

		$user=new User();
		$user->update_usuario_adicional();
		header('Location: ?page=configuracion&action=configuracion_acceso');

	}

	function update_usuario_admin(){
		$user=new User();
		$user->update_usuario_admin();
		header('Location: ?page=configuracion&action=configuracion_acceso');
	}


	function eliminar_usuario_adicional(){
		
		$user=new User();
		$user->eliminar_usuario_adicional();
		header('Location: ?page=configuracion&action=configuracion_acceso');
	}
	
	
	function contacto(){
		
		
		switch($_SESSION["equivida"]["rol"]){

			case "accionista":
				$directorio=new Directorio();
				$this->tpl->directorios=$directorio->get_directorios();
			break;
				case "director":
					$directorio=new Directorio();
					$this->tpl->directorios=$directorio->get_directorios();
				break;

		}
		
		if((isset($_POST))&&($_POST["status"]=="enviar")){

			//Enviar Correo
			$solicitud=new Solicitud();
			$solicitud->set_contacto();
		}

		
		$this->tpl->display('html/configuracion/contacto/index.tpl.php');
	}




}




?>