<?php

/**
* 
*/

require_once './models/user.php';
require_once './models/directorio.php';
require_once './models/estado.php';
require_once './models/tipo_usuario.php';
require_once './models/archivo.php';
require_once './models/noticia.php';
require_once './models/banner.php';
require_once './models/polizacolectiva.php';


class Administrador_controller{
	
	private $tpl;
	function __construct($page,&$tpl) {
			$this->tpl=$tpl;
			if($page!="")
			eval('$this->'.$page.'();');
			else
			$this->index();
	}
	
	function index(){
		
		$user=new User();
		//$this->tpl->users=$user->get_usuarios("%");                
		//$this->tpl->display('html/administrador/index.tpl.php');
                
               switch($_GET["format"]){
				case "excel":
                                        $this->tpl->users=$user->get_usuarios_excel("%");
					$this->tpl->display('html/administrador/usuarios/excel/todos.tpl.php');
				break;
				
				default:
                                        $this->tpl->users=$user->get_usuarios("%");       
					$this->tpl->display('html/administrador/index.tpl.php');
                                break;
				
			}
		
	}
	
	function mensaje_usuario_seguimiento(){
        $this->tpl->display('html/administrador/usuarios_seguimiento/seguimiento.tpl.php');
        }
	function personas(){
		if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_personas"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
                    
		$user=new User();
		//$this->tpl->users=$user->get_usuarios("1");
		//$this->tpl->display('html/administrador/usuarios/personas.tpl.php');
                switch($_GET["format"]){
				case "excel":
                                        $this->tpl->users=$user->get_usuarios_excel("1");
					$this->tpl->display('html/administrador/usuarios/excel/todos.tpl.php');
				break;
				
				default:
                                        $this->tpl->users=$user->get_usuarios("1");      
					$this->tpl->display('html/administrador/usuarios/personas.tpl.php');
                                break;
				
			}
		
	}
	
	function empresas(){
		if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_empresas"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
                
		$user=new User();
		//$this->tpl->users=$user->get_usuarios("2");
		//$this->tpl->display('html/administrador/usuarios/empresas.tpl.php');
                switch($_GET["format"]){
				case "excel":
                                        $this->tpl->users=$user->get_usuarios_excel("2");
					$this->tpl->display('html/administrador/usuarios/excel/instituciones.tpl.php');
				break;
				
				default:
                                        $this->tpl->users=$user->get_usuarios("2");      
					$this->tpl->display('html/administrador/usuarios/empresas.tpl.php');
                                break;
				
			}
		
	}
	
	function brokers(){
		if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_brokers"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
                
		$user=new User();
		//$this->tpl->users=$user->get_usuarios("3");
		//$this->tpl->display('html/administrador/usuarios/brokers.tpl.php');
                switch($_GET["format"]){
				case "excel":
                                        $this->tpl->users=$user->get_usuarios_excel("3");
					$this->tpl->display('html/administrador/usuarios/excel/instituciones.tpl.php');
				break;
				
				default:
                                        $this->tpl->users=$user->get_usuarios("3");      
					$this->tpl->display('html/administrador/usuarios/brokers.tpl.php');
                                break;
				
			}
		
		
	}
	function accionistas(){
		if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_accionistas"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
                
		$user=new User();
		//$this->tpl->users=$user->get_usuarios("4");
		//$this->tpl->display('html/administrador/usuarios/accionistas.tpl.php');
                switch($_GET["format"]){
				case "excel":
                                        $this->tpl->users=$user->get_usuarios_excel("4");
					$this->tpl->display('html/administrador/usuarios/excel/todos.tpl.php');
				break;
				
				default:
                                        $this->tpl->users=$user->get_usuarios("4");      
					$this->tpl->display('html/administrador/usuarios/accionistas.tpl.php');
                                break;
				
			}
		
	}
	
	function solicitudes(){
		
		
		$user=new User();
		$this->tpl->usuarios=$user->get_usuario($_GET["id"]);
		$this->tpl->solicitudes=$user->get_solicitudes($_GET["id"]);
		

		
		$this->tpl->display('html/administrador/solicitudes/solicitudes.tpl.php');
		
		
	}
	
	
	function historial(){
            if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_solicitudes"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
            
		$user=new User();
		$this->tpl->solicitudes=$user->get_todas_solicitudes();
		$this->tpl->display('html/administrador/solicitudes/historial.tpl.php');
	
		
	}
	
	
	function ver_solicitud(){
		$user=new User();
		$this->tpl->solicitud=$user->ver_solicitud($_GET["id"]);
		$this->tpl->display('html/administrador/solicitudes/ver_solicitud.tpl.php');
	}
	
	function directorios(){
		if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_archivos"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
                
		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();
		$this->tpl->display('html/administrador/archivos/directorios.tpl.php');
		
	}
	
	function carga_archivos(){
		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();
		
		$tipousuario=new Tipo_usuario();
		$this->tpl->tipo_accionistas=$tipousuario->get_tipo_accionistas();
		
		$this->tpl->display('html/administrador/archivos/cargar.tpl.php');
	}
	
	function new_directorio(){
		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();
		
		$tipousuario=new Tipo_usuario();
		$this->tpl->tipo_accionistas=$tipousuario->get_tipo_accionistas();
		
		$this->tpl->display('html/administrador/archivos/new_directorio.tpl.php');
	}
	
	function save_directorio(){
		$directorio=new Directorio();
		$directorio->crear_directorio();
		
		
		header('Location: ?page=administrador&action=directorios');
	}
	
	
	function editar_directorio(){
		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();
		$this->tpl->directorio=$directorio->get_directorio($_GET["id"]);
		
		$tipousuario=new Tipo_usuario();
		$this->tpl->tipo_accionistas=$tipousuario->get_tipo_accionistas();
		
		$this->tpl->display('html/administrador/archivos/edit_directorio.tpl.php');
	}
	
	function update_directorio(){
		$directorio=new Directorio();
		$directorio->update_directorio();
		header('Location: ?page=administrador&action=directorios');
	}
	
	function borrar_directorio(){
		$directorio=new Directorio();
		$directorio->borrar_directorio();
		header('Location: ?page=administrador&action=directorios');
	}
	
	/* Metodos para Editar información de Usuario registrados */
	
	function editar_usuario(){
		$user=new User();
		$this->tpl->usuarios=$user->get_usuario($_GET["id"]);
		
		$estado=new Estado();
		$this->tpl->estados=$estado->get_estados();
		
		$tipousuario=new Tipo_usuario();
		$this->tpl->tipousuarios=$tipousuario->get_tipo_usuarios();
		
		if($this->tpl->usuarios[0]["tipo_usuario_id"]=="4"){
			
			$this->tpl->tipo_accionistas=$tipousuario->get_tipo_accionistas();
			$this->tpl->usuarios[0]["tipo_accionista_id"]=$user->get_tipo_accionista($this->tpl->usuarios[0]["id"]);
		}
		
		
		if($this->tpl->usuarios[0]["tipo_usuario_id"]=="1"){
			$this->tpl->display('html/administrador/usuarios/editar_personas.tpl.php');
		}else{
			
			
		
			$this->tpl->usuarios_adicionales=$user->get_usuarios_adicionales($_GET["id"]);
			
			$this->tpl->display('html/administrador/usuarios/editar_empresas.tpl.php');
		}
		

		
	}
	
	
	function update_usuario(){
		$user=new User();
		$user->update();
                
                
		
                header('Location: ?page=dashboard/');
	}
	
	function delete_usuario(){
		$user=new User();
		$user->delete();
		header('Location: ?page=administrador&action='.$_GET["back"]);		
	}
	
	/* *** Fin **** */
	

	function save_archivo(){
		
		$archivo= new Archivo();
		$archivo->subir_archivo();
		
		$tipousuario=new Tipo_usuario();
		$this->tpl->tipo_accionistas=$tipousuario->get_tipo_accionistas();
		
		header('Location: ?page=administrador&action=directorios');
	}
	
	function editar_archivo(){
		$archivo= new Archivo();
		$this->tpl->archivo=$archivo->get_archivo();
		
		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();
		
		
		$tipousuario=new Tipo_usuario();
		$this->tpl->tipo_accionistas=$tipousuario->get_tipo_accionistas();
		
		$this->tpl->display('html/administrador/archivos/editar_cargar.tpl.php');
	}

	function update_archivo(){

		$archivo= new Archivo();
		$archivo->update_archivo();
		header('Location: ?page=administrador&action=directorios');
	}


	function borrar_archivo(){
		$archivo= new Archivo();
		$archivo->eliminar_archivo();
		header('Location: ?page=administrador&action=directorios');
	}
	
	function noticias(){
		$noticia=new Noticia();
		$this->tpl->noticias=$noticia->get_noticias();
		$this->tpl->display('html/administrador/contenidos/noticias/index.tpl.php');

	}
	
	function crear_noticia(){
		$noticia=new Noticia();
		$this->tpl->secciones=$noticia->get_secciones();
		$this->tpl->display('html/administrador/contenidos/noticias/crear.tpl.php');
	}

	function editar_noticia(){
		$noticia=new Noticia();
		$this->tpl->secciones=$noticia->get_secciones();
		$this->tpl->noticia=$noticia->get_noticia($_GET["id"]);
		$this->tpl->display('html/administrador/contenidos/noticias/editar.tpl.php');
	}
	
	function actualizar_noticia(){
		$noticia=new Noticia();
		$noticia->update();
		header('Location: ?page=administrador&action=noticias');
	}

	function save_noticia(){
		$noticia=new Noticia();
		$noticia->save();
		header('Location: ?page=administrador&action=noticias');
	}
	function delete_noticia(){
		$noticia=new Noticia();
		$noticia->delete();
		header('Location: ?page=administrador&action=noticias');	
	}
	
	
	
	//Metodos de Usuarios Adicionales
	
	function usuario_nuevo(){
		$this->tpl->display('html/administrador/usuarios/usuarios_adicionales/nuevo.tpl.php');
	}
	
	function editar_usuario_adicional(){
		$user=new User();
		$this->tpl->usuario_adicional=$user->get_usuario_adicional();
		$this->tpl->display('html/administrador/usuarios/usuarios_adicionales/editar.tpl.php');
	}
	
	function update_usuario_adicional(){
		$user=new User();
		$user->update_usuario_adicional();
		header('Location: ?page=administrador&action=editar_usuario&id='.$_POST["usuario_id"]);
	}
	
	function eliminar_usuario_adicional(){

		$user=new User();
		$usuario_adicional=$user->get_usuario_adicional();
		$user->eliminar_usuario_adicional_admin();
		header('Location: ?page=administrador&action=editar_usuario&id='.$usuario_adicional[0]["usuario_id"]);			
	}
	
	function save_usuario(){

		$user=new User();
		$user->save_usuario_adicional();
		header('Location: ?page=administrador&action=editar_usuario&id='.$_POST["usuario_id"]);
		
	}
	
	function banners(){
		$banner=new Banner();
		$this->tpl->array_datos=$banner->get_banner();		
		$this->tpl->display('html/administrador/banners.tpl.php');
	}
	
	function save_banners(){
		
		$banner=new Banner();
		$banner->save_banner();
		header('Location: ?page=administrador&action=banners');
		
	}
	
	//Fin
        
        
        
	function usuarios_seguimiento(){
		$user=new User();
		
			$this->tpl->usuarios_seguimiento=$user->get_usuarios_seguimiento();
			$this->tpl->display('html/administrador/usuarios_seguimiento/usuarios_seguimiento.tpl.php');
		
	}
	
        
        function usuario_seguimiento_nuevo(){
		$this->tpl->display('html/administrador/usuarios_seguimiento/nuevo.tpl.php');
	}
	
	function editar_usuario_seguimiento(){
		$user=new User();
		$this->tpl->usuario_seguimiento=$user->get_usuario_seguimiento();
		$this->tpl->display('html/administrador/usuarios_seguimiento/editar.tpl.php');
	}
	
	function update_usuario_seguimiento(){
		$user=new User();
		$user->update_usuario_seguimiento();
		header('Location: ?page=administrador&action=usuarios_seguimiento');
	}
	
	function eliminar_usuario_seguimiento(){

		$user=new User();
		$user->eliminar_usuario_seguimiento();
		header('Location: ?page=administrador&action=usuarios_seguimiento');			
	}
	
	function save_usuario_seguimiento(){

		$user=new User();
		$user->save_usuario_seguimiento();
		header('Location: ?page=administrador&action=usuarios_seguimiento');
		
	}
        
        function editar_usuario_administrador(){
		$user=new User();
		$this->tpl->usuario_administrador=$user->get_usuario_administrador();
		$this->tpl->display('html/administrador/usuarios_seguimiento/editar_admin.tpl.php');
	}
	
        function update_usuario_administrador(){
		$user=new User();
		$user->update_usuario_administrador();
		header('Location: ?page=administrador&action=usuarios_seguimiento');
	}
        
        function enviar_password_usuario(){
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
                                                if($data[0]["tipo_usuario_id"]==4 and strcmp($data[0]["estado_id"],"0"))
                                                {    
                                                    $_POST["tipo_usuario"]=0;
                                                    $_POST["estado_id"]=1;
                                                    $_POST["id"]=$data[0]["id"];
                                                    $_POST["primer_nombre"]=$data[0]["primer_nombre"];
                                                    $_POST["primer_apellido"]=$data[0]["primer_apellido"];
                                                    $_POST["id"]=$data[0]["id"];
                                                    $user=new User();
                                                    $user->update();
                                                }
						$_SESSION["flash_ok"]="Se enviaron los accesos al correo electrónico";
                                                
                                                
                                                
					}else{
							$_SESSION["flash_error"]="No existe el usuario";
					}
				
					//$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/editar_personas.tpl.php');
                                        header('Location: ?page=dashboard');
                                        
        }
        
      /*************************************************************************************************/  
      /***************FUNCIONES DE VISTAS PARA USUARIOS DE SEGUIMIENTO**********************************/
      /*************************************************************************************************/ 
      /*************************************************************************************************/ 
        
        
     
	function personas_usuario_seguimiento(){
		if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_personas"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
                    
		$user=new User();
		//$this->tpl->users=$user->get_usuarios("1");
		//$this->tpl->display('html/administrador/usuarios/personas.tpl.php');
                switch($_GET["format"]){
				case "excel":
                                        $this->tpl->users=$user->get_usuarios_excel("1");
					$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/excel/todos.tpl.php');
				break;
				
				default:
                                        $this->tpl->users=$user->get_usuarios("1");      
					$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/personas.tpl.php');
                                break;
				
			}
		
	}
	
	function empresas_usuario_seguimiento(){
		if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_empresas"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
                
		$user=new User();
		//$this->tpl->users=$user->get_usuarios("2");
		//$this->tpl->display('html/administrador/usuarios/empresas.tpl.php');
                switch($_GET["format"]){
				case "excel":
                                        $this->tpl->users=$user->get_usuarios_excel("2");
					$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/excel/instituciones.tpl.php');
				break;
				
				default:
                                        $this->tpl->users=$user->get_usuarios("2");      
					$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/empresas.tpl.php');
                                break;
				
			}
		
	}
	
	function brokers_usuario_seguimiento(){
		if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_brokers"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
                
		$user=new User();
		//$this->tpl->users=$user->get_usuarios("3");
		//$this->tpl->display('html/administrador/usuarios/brokers.tpl.php');
                switch($_GET["format"]){
				case "excel":
                                        $this->tpl->users=$user->get_usuarios_excel("3");
					$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/excel/instituciones.tpl.php');
				break;
				
				default:
                                        $this->tpl->users=$user->get_usuarios("3");      
					$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/brokers.tpl.php');
                                break;
				
			}
		
		
	}
	function accionistas_usuario_seguimiento(){
		if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_accionistas"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
                
		$user=new User();
		//$this->tpl->users=$user->get_usuarios("4");
		//$this->tpl->display('html/administrador/usuarios/accionistas.tpl.php');
                switch($_GET["format"]){
				case "excel":
                                        $this->tpl->users=$user->get_usuarios_excel("4");
					$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/excel/todos.tpl.php');
				break;
				
				default:
                                        $this->tpl->users=$user->get_usuarios("4");      
					$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/accionistas.tpl.php');
                                break;
				
			}
		
	}
	
	function solicitudes_usuario_seguimiento(){
		
		
		$user=new User();
		$this->tpl->usuarios=$user->get_usuario($_GET["id"]);
		$this->tpl->solicitudes=$user->get_solicitudes($_GET["id"]);
		

		
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/solicitudes/solicitudes.tpl.php');
		
		
	}
	
	
	function historial_usuario_seguimiento(){
            if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_solicitudes"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
            
		$user=new User();
		$this->tpl->solicitudes=$user->get_todas_solicitudes();
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/solicitudes/historial.tpl.php');
	
		
	}
	
	
	function ver_solicitud_usuario_seguimiento(){
		$user=new User();
		$this->tpl->solicitud=$user->ver_solicitud($_GET["id"]);
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/solicitudes/ver_solicitud.tpl.php');
	}
	
	function directorios_usuario_seguimiento(){
		if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_archivos"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
                
		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/archivos/directorios.tpl.php');
		
	}
	
	function carga_archivos_usuario_seguimiento(){
		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();
		
		$tipousuario=new Tipo_usuario();
		$this->tpl->tipo_accionistas=$tipousuario->get_tipo_accionistas();
		
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/archivos/cargar.tpl.php');
	}
	
	function new_directorio_usuario_seguimiento(){
		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();
		
		$tipousuario=new Tipo_usuario();
		$this->tpl->tipo_accionistas=$tipousuario->get_tipo_accionistas();
		
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/archivos/new_directorio.tpl.php');
	}
	
	function save_directorio_usuario_seguimiento(){
		$directorio=new Directorio();
		$directorio->crear_directorio();
		
		
		header('Location: ?page=administrador&action=directorios_usuario_seguimiento');
	}
	
	
	function editar_directorio_usuario_seguimiento(){
		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();
		$this->tpl->directorio=$directorio->get_directorio($_GET["id"]);
		
		$tipousuario=new Tipo_usuario();
		$this->tpl->tipo_accionistas=$tipousuario->get_tipo_accionistas();
		
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/archivos/edit_directorio.tpl.php');
	}
	
	function update_directorio_usuario_seguimiento(){
		$directorio=new Directorio();
		$directorio->update_directorio();
		header('Location: ?page=administrador&action=directorios_usuario_seguimiento');
	}
	
	function borrar_directorio_usuario_seguimiento(){
		$directorio=new Directorio();
		$directorio->borrar_directorio();
		header('Location: ?page=administrador&action=directorios_usuario_seguimiento');
	}
	
	/* Metodos para Editar información de Usuario registrados */
	
	function editar_usuario_usuario_seguimiento(){
		$user=new User();
		$this->tpl->usuarios=$user->get_usuario($_GET["id"]);
		
		$estado=new Estado();
		$this->tpl->estados=$estado->get_estados();
		
		$tipousuario=new Tipo_usuario();
		$this->tpl->tipousuarios=$tipousuario->get_tipo_usuarios();
		
		if($this->tpl->usuarios[0]["tipo_usuario_id"]=="4"){
			
			$this->tpl->tipo_accionistas=$tipousuario->get_tipo_accionistas();
			$this->tpl->usuarios[0]["tipo_accionista_id"]=$user->get_tipo_accionista($this->tpl->usuarios[0]["id"]);
		}
		
		
		if($this->tpl->usuarios[0]["tipo_usuario_id"]=="1"){
			$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/editar_personas.tpl.php');
		}else{
			
			
		
			$this->tpl->usuarios_adicionales=$user->get_usuarios_adicionales($_GET["id"]);
			
			$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/editar_empresas.tpl.php');
		}
		

		
	}
	
	
	function update_usuario_usuario_seguimiento(){
		$user=new User();
		$user->update();
		header('Location: ?page=dashboard');
	}
	
	function delete_usuario_usuario_seguimiento(){
		$user=new User();
		$user->delete();
		header('Location: ?page=administrador&action='.$_GET["back"].'_usuario_seguimiento');		
	}
	
	/* *** Fin **** */
	

	function save_archivo_usuario_seguimiento(){
		
		$archivo= new Archivo();
		$archivo->subir_archivo();
		
		$tipousuario=new Tipo_usuario();
		$this->tpl->tipo_accionistas=$tipousuario->get_tipo_accionistas();
		
		header('Location: ?page=administrador&action=directorios_usuario_seguimiento');
	}
	
	function editar_archivo_usuario_seguimiento(){
		$archivo= new Archivo();
		$this->tpl->archivo=$archivo->get_archivo();
		
		$directorio=new Directorio();
		$this->tpl->directorios=$directorio->get_directorios();
		
		
		$tipousuario=new Tipo_usuario();
		$this->tpl->tipo_accionistas=$tipousuario->get_tipo_accionistas();
		
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/archivos/editar_cargar.tpl.php');
	}

	function update_archivo_usuario_seguimiento(){

		$archivo= new Archivo();
		$archivo->update_archivo();
		header('Location: ?page=administrador&action=directorios_usuario_seguimiento');
	}


	function borrar_archivo_usuario_seguimiento(){
		$archivo= new Archivo();
		$archivo->eliminar_archivo();
		header('Location: ?page=administrador&action=directorios_usuario_seguimiento');
	}
	
        
        
        function noticias_usuario_seguimiento(){
		$noticia=new Noticia();
		$this->tpl->noticias=$noticia->get_noticias();
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/contenidos/noticias/index.tpl.php');

	}
	
	function crear_noticia_usuario_seguimiento(){
		$noticia=new Noticia();
		$this->tpl->secciones=$noticia->get_secciones();
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/contenidos/noticias/crear.tpl.php');
	}

	function editar_noticia_usuario_seguimiento(){
		$noticia=new Noticia();
		$this->tpl->secciones=$noticia->get_secciones();
		$this->tpl->noticia=$noticia->get_noticia($_GET["id"]);
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/contenidos/noticias/editar.tpl.php');
	}
	
	function actualizar_noticia_usuario_seguimiento(){
		$noticia=new Noticia();
		$noticia->update();
		header('Location: ?page=administrador&action=noticias_usuario_seguimiento');
	}

	function save_noticia_usuario_seguimiento(){
		$noticia=new Noticia();
		$noticia->save();
		header('Location: ?page=administrador&action=noticias_usuario_seguimiento');
	}
	function delete_noticia_usuario_seguimiento(){
		$noticia=new Noticia();
		$noticia->delete();
		header('Location: ?page=administrador&action=noticias_usuario_seguimiento');	
	}
	
	
	
	//Metodos de Usuarios Adicionales
	
	function usuario_nuevo_usuario_seguimiento(){
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/usuarios_adicionales/nuevo.tpl.php');
	}
	
	function editar_usuario_adicional_usuario_seguimiento(){
		$user=new User();
		$this->tpl->usuario_adicional=$user->get_usuario_adicional();
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/usuarios_adicionales/editar.tpl.php');
	}
	
	function update_usuario_adicional_usuario_seguimiento(){
		$user=new User();
		$user->update_usuario_adicional();
		header('Location: ?page=administrador&action=editar_usuario_usuario_seguimiento&id='.$_POST["usuario_id"]);
	}
	
	function eliminar_usuario_adicional_usuario_seguimiento(){

		$user=new User();
		$usuario_adicional=$user->get_usuario_adicional();
		$user->eliminar_usuario_adicional_admin();
		header('Location: ?page=administrador&action=editar_usuario_usuario_seguimiento&id='.$usuario_adicional[0]["usuario_id"]);			
	}
	
	function save_usuario_usuario_seguimiento(){

		$user=new User();
		$user->save_usuario_adicional();
		header('Location: ?page=administrador&action=editar_usuario_usuario_seguimiento&id='.$_POST["usuario_id"]);
		
	}
	
	function banners_usuario_seguimiento(){
		$banner=new Banner();
		$this->tpl->array_datos=$banner->get_banner();		
		$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/banners.tpl.php');
	}
	
	function save_banners_usuario_seguimiento(){
		
		$banner=new Banner();
		$banner->save_banner();
		header('Location: ?page=administrador&action=banners_usuario_seguimiento');
		
	}
        
        
        function enviar_password_usuario_usuario_seguimiento(){
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
					
					
						$_SESSION["flash_ok"]="Se enviaron los accesos al correo electrónico";

					}else{
							$_SESSION["flash_error"]="No existe el usuario";
					}
				
					//$this->tpl->display('html/administrador/vistas_usuarios_seguimiento/usuarios/editar_personas.tpl.php');
                                        header('Location: ?page=dashboard');
                                        
        }
        
        
        
        
/********************************Poliza colectiva****************************************************************/

        function polizas_colectivas(){
            if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_polizas_colectivas"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
            
		$polizas_colectivas=new PolizaColectiva();
		$this->tpl->polizas_colectivas=$polizas_colectivas->get_polizas_colectivas();
                
		$this->tpl->display('html/administrador/polizas_colectivas/polizas.tpl.php');
	
		
	}
        
        
        function agregar_polizas_colectivas(){
            if ($_SESSION["equivida"]["rol"]=="seguimiento" && $_SESSION["equivida"]["permiso_polizas_colectivas"]!=1)
                   header('Location: ?page=administrador&action=mensaje_usuario_seguimiento'); 
            
                        
		$this->tpl->display('html/administrador/polizas_colectivas/agregar_polizas.tpl.php');
	}
        
        
        function insert_polizas_colectivas(){
           $solicitud=new PolizaColectiva();
				$solicitud->insert_polizas_colectivas();
                  header('Location: ?page=administrador&action=polizas_colectivas');
        }
}