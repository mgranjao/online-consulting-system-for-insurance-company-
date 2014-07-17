<?php



session_start();
require_once 'Savant3.php';
require_once 'config.php';
require_once 'models/login.php';
require_once 'models/solicitud.php';
require_once 'models/chuleta.php';

require_once 'controllers/personas_controller.php';
require_once 'controllers/empresas_controller.php';
require_once 'controllers/brokers_controller.php';
require_once 'controllers/accionista_controller.php';
require_once 'models/url.php';

require_once 'controllers/configuracion_controller.php';

require_once 'controllers/administrador_controller.php';

require_once 'helpers/librerias/chuletas.php';
require_once "helpers/swift/Swift.php";
require_once "helpers/swift/Swift/Connection/SMTP.php";
require_once "helpers/pdf/fpdf.php";
require_once "helpers/dompdf/dompdf_config.inc.php";

// Load the Savant3 class file and create an instance.
$tpl = new Savant3();

if(isset($_GET["page"])){
	$page=$_GET["page"];
	$action=$_GET["action"];
}else{
	$url=new Urlweb(URL);
	$_GET["page"]=$url->get_seccion(0);
	$_GET["action"]=$url->get_seccion(1);
	$page=$_GET["page"];
	$action=$_GET["action"];
}


if((isset($_SESSION["equivida"]))||($page=="login")||($page=="login_admin")){
	
	switch ($page) {
		case 'login':
			$login=new Login();
			$login->login();
			header('Location: '.URL.'dashboard');		
		break;

		case 'login_admin':
			
				$login=new Login();
				$log=$login->login_admin();
				header('Location: '.URL.'dashboard');
			
		break;


		case 'logout':
			$login=new Login();
			$login->logout();
			header('Location: '.URL.'index.php');
		break;	

		case 'personas':
		
			$personas=new Personas_controller($action,$tpl);
		
		break;

		case 'configuracion':
		
			$configuracion=new Configuracion_controller($action,$tpl);
			
		break;
		
		
		default:
			
			switch($_SESSION["equivida"]["rol"]){
				
				case "persona":
					
						try {
							$dashboard=new Personas_controller($action,$tpl);
						} catch (Exception $e) {
							$tpl->display('html/personas/error_servidor.tpl.php');
						}
				
				
				break;
				case "empresa":
				
						try {
							$dashboard=new Empresas_controller($action,$tpl);
						} catch (Exception $e) {
							$tpl->display('html/personas/error_servidor.tpl.php');
						}
				
				break;
				case "brokers":
				
					try {
						$dashboard=new Brokers_controller($action,$tpl);
					} catch (Exception $e) {
						$tpl->display('html/personas/error_servidor.tpl.php');
					}
				
					
				break;
				case "accionista":
					$dashboard=new Accionista_controller($action,$tpl);
				break;
				
				case "director":
					$dashboard=new Accionista_controller($action,$tpl);
				break;
				
				case "admin":
					$dashboard=new Administrador_controller($action,$tpl);
				break;
                                
                                case "seguimiento":
					$dashboard=new Administrador_controller($action,$tpl);
				break;
				
			}
		
		}
}else{
	
	switch ($page) {

		case 'sign-up':
		
			$provincias=new Provincia();
			$tpl->provincias=$provincias->get_provincias();
			$tpl->display('html/sign-up.tpl.php');
		
		break;
		case 'save':
			
			$login=new Login();
			$log=$login->new_user();
			
			if($log==""){
				$tpl->display('html/save.tpl.php');
			}else{
				$tpl->log=$log;
				header('Location: ?page=sign-up&tipo='.$_POST["tipo_usuario"]);
			}
			
		break;
		
		case 'admin':
		
		
			$tpl->display('html/admin.tpl.php');
		
		break;
		
		
		
		
		default:
			
			
			
			switch($_GET["action"]){
				
				
				case "forget":
				
					$login=new Login();
					
					$_POST["email"]=str_replace("'","",$_POST["email"]);
					$_POST["email"]=str_replace("(","",$_POST["email"]);
					$_POST["email"]=str_replace(")","",$_POST["email"]);
					$_POST["email"]=str_replace("=","",$_POST["email"]);
					$_POST["email"]=str_replace("!","",$_POST["email"]);
					
					$data=$login->forget($_POST["email"]);
					
			
					if(count($data[0])>0){
						
		
						$url_correcta="id=".$data[0]["id"];
						
						$para=$data[0]["email"];
						
						$key=encrypt($url_correcta,"bedomax");
						
						$ch = curl_init(MAIL_SERVER);

						curl_setopt ($ch, CURLOPT_POST, 1);
						curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
						
						$post= "action=forget&asunto=Equivida: Recuperar Acceso&de=servicioalcliente@equivida.com&para=".$para."&key=".$key."&ambiente=local&tipo=".$data["tipo_usuario"];
						curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
						$page=curl_exec ($ch);
						curl_close ($ch);
					
					
						$_SESSION["flash_ok"]="Se enviaron los accesos a su correo electrónico";

					}else{
							$_SESSION["flash_error"]="No existe el usuario";
					}
				
					$tpl->display('html/login.tpl.php');
			
					
				break;
				
				
				case "recuperar":
				
					$cadena_desencriptada = decrypt($_GET["key"],"bedomax");
					
					
					$id=str_replace("id=","",$cadena_desencriptada);
					
			
					$login=new Login();
					$data=$login->forget_id($id);
					

				
		
					if(count($data)>0){
						
						$tpl->usuario=$data;
						$tpl->forget=1;

					}else{
						$_SESSION["flash_error"]="No existe el usuario";
					}
					
					$tpl->display('html/login.tpl.php');
		
				break;
				
				
				case "activar":
				
					$cadena_desencriptada = decrypt($_GET["key"],"bedomax");
					
					
					$id=str_replace("id=","",$cadena_desencriptada);
		
					$login=new Login();
					$data=$login->forget_id($id);
					
					if(count($data)>0){
						
						$tpl->usuario=$data;
						$tpl->forget=1;

					}else{
						$_SESSION["flash_error"]="No existe el usuario";
					}
					
					$tpl->display('html/login.tpl.php');
					
				break;
				
				
				case "update_password":
					
					
					
					
					if(isset($_POST["id"])){

						$login=new Login();
						$login->update_password();


					}
					
					$tpl->display('html/login.tpl.php');
					
				break;
				
				default:
				
					$tpl->display('html/login.tpl.php');
				
				
			}
			
		
		

			
		
		
		
		
	}
	
}

?>

