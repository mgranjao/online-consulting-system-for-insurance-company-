<?php

/**
* 
*/
require_once("./models/login.php");
require_once("./models/provincia.php");
require_once './models/directorio.php';
require_once './models/banner.php';

class Accionista_controller{
	
	private $tpl;
	function __construct($page,&$tpl) {
			$this->tpl=$tpl;
			if($page!="")
			eval('$this->'.$page.'();');
			else
			$this->index();
	}
	
	function index(){
		
		
			$provincias=new Provincia();
			$this->tpl->provincias=$provincias->get_provincias();


			$login=new Cliente();


			if($_POST["status"]=="nueva_direccion"){

				$login->set_direccion();

			}


			if($_POST["status"]=="nuevo_email"){

				$login->set_email();

			}


			if(isset($_GET["borrar"])){

				$login->borrar();

			}


			if((isset($_POST))&&($_POST["status"]=="enviar")){

		//Enviar Correo

				$html='		<p>

							<b>Formulario Actualizacio|n Datos del Cliente:</b>
							<p>
							Información Mail:
							</p>

						<b>Nombre: </b> '.$_POST["nombre"].'<br>
						<b>Apellidos: </b> '.$_POST["apellidoPaterno"].'<br>
						<b>Apellidos: </b> '.$_POST["apellidoMaterno"].'<br>
						<b>Cédula: </b> '.$_POST["cedula"].'<br>
						<b>Email: </b> '.$_POST["email"].'<br>
						<b>Ciudad: </b> '.$_POST["ciudad"].'<br>
						<b>Provincia: </b> '.$_POST["provincia"].'<br>
						<b>País: </b> '.$_POST["pais"].'<br>
						<b>Tipo Usuario: </b> '.$_POST["tipo_usuario"].'<br>

						<b>Asunto: </b> '.$_POST["asunto"].'<br>
						<b>Mensaje: </b> '.$_POST["mensaje"].'<br>

						</p>
				';

				$ch = curl_init(MAIL_SERVER);

				curl_setopt ($ch, CURLOPT_POST, 1);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
				$para=EMAIL_CONTACTO;

				$post= "action=register&asunto=Equivida.com: Consulta en Linea - Formulario Actualizacion Datos&de=servicioalcliente@equivida.com&para=".$para."&html=".$html;
				curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
				$page=curl_exec ($ch);
				curl_close ($ch);

				$_SESSION["flash_ok"]="El mensaje fue envíado correctamente";



			}




			if(isset($_GET["borrar_correo"])){

				$login->borrar_correo();

			}


			/*
			$wsdl=URL_WEBSERVICE."equivida-servicio-1.0/ClienteUnicoWsImpl?wsdl";

			$cliente = new SoapClient($wsdl);

			$args=array("codTipoId"=>"C","idPersona"=>$_SESSION["equivida"]["cedula"]);
			$info_cliente = $cliente->__soapCall('personaNatural', $args);


			$this->tpl->info_cliente=$info_cliente;
			*/
			$this->tpl->direcciones=$login->get_direcciones();
			$this->tpl->correos=$login->get_correos();
		
	
		
		$noticia=new Noticia();
		$array_noticias=$noticia->get_noticias_seccion(1);

		switch($_SESSION["equivida"]["rol"]){
				case "accionista":
					$array_noticias=$noticia->get_noticias_seccion(4);
				break;
				case "director":
					$array_noticias=$noticia->get_noticias_seccion(5);
				break;
		}	

		if(count($array_noticias)>0){
			$_SESSION["mostrar_noticias"]=1;
		}else{
			$_SESSION["mostrar_noticias"]=0;
		}
		
		
		
		$banner=new Banner();
		$this->tpl->banners=$banner->get_banner();
		
		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();
		$this->tpl->display('html/accionista/index.tpl.php');
		
	}
	
	function view(){
		
		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();
		
		$this->tpl->display('html/accionista/view.tpl.php');
	}

	function informate(){

		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();

		$noticia=new Noticia();
		if(!(isset($_GET["id"]))){


			switch($_SESSION["equivida"]["rol"]){
				case "accionista":
					$this->tpl->noticias=$noticia->get_noticias_seccion(4);
					$this->tpl->display('html/accionista/informate.tpl.php');
				break;
				case "director":
					$this->tpl->noticias=$noticia->get_noticias_seccion(5);
					$this->tpl->display('html/accionista/informate.tpl.php');
				break;
			}
			
		}else{
			$this->tpl->noticias=$noticia->get_noticia($_GET["id"]);
			$this->tpl->display('html/accionista/informate.tpl.php');
		}
	}

	
	
	
}