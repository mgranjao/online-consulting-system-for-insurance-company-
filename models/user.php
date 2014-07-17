<?php


require_once("basededatos.php");
require_once './models/clientesagente.php';


class User  extends Basededatos
{
	function __construct(){
		parent::__construct();
	}
	
	function get_usuarios($tipo){
		
		$query='SELECT u.id, u.primer_nombre, u.segundo_nombre, u.primer_apellido, u.segundo_apellido , u.forget, u.numero_de_documento, u.email, u.ciudad, 
				(SELECT nombre FROM estados WHERE id=u.estado_id) as  estado, 
				(SELECT nombre FROM tipo_usuarios WHERE id=u.tipo_usuario_id ) as tipo_usuario,
				(SELECT COUNT(*) FROM solicitudes WHERE usuario_id=u.id) as num_solicitudes,
				(SELECT COUNT(*) FROM usuarios_adicionales WHERE usuario_id=u.id) as num_usuarios,
				u.fecha_creacion,
				u.ruc,
				u.tipo_usuario_id 
				FROM usuarios u WHERE tipo_usuario_id like("'.$tipo.'")';
		
		$array_datos=$this->query($query,1);
		return $array_datos;

	}
        
        function get_usuarios_excel($tipo){
		
		$query='SELECT u.id, u.primer_nombre, u.segundo_nombre, u.primer_apellido, u.segundo_apellido , u.forget, u.numero_de_documento, u.email, u.ciudad, 
				(SELECT nombre FROM estados WHERE id=u.estado_id) as  estado, 
				(SELECT nombre FROM tipo_usuarios WHERE id=u.tipo_usuario_id ) as tipo_usuario,
				(SELECT COUNT(*) FROM solicitudes WHERE usuario_id=u.id) as num_solicitudes,
				(SELECT COUNT(*) FROM usuarios_adicionales WHERE usuario_id=u.id) as num_usuarios,
				u.fecha_creacion,
				u.ruc,
				u.tipo_usuario_id,
                                u.telefono_convencional,
                                u.telefono_movil,
                                u.nombre_de_la_empresa,
                                u.razon_social,
                                u.ciudad,
                                u.calle_principal,
                                u.calle_secundaria,
                                u.cargo
				FROM usuarios u WHERE tipo_usuario_id like("'.$tipo.'")';
		
		$array_datos=$this->query($query,1);
		return $array_datos;

	}
	
	function get_usuario($id){
		$query='SELECT * FROM usuarios WHERE id='.$id.';';
		$array_datos=$this->query($query,1);
		return $array_datos;
	}
	
	
	function update(){
            
			$queryConsulta='SELECT * FROM usuarios WHERE id='.$_POST["id"].';';
                        $array_datos=$this->query($queryConsulta,1);
                        $_SESSION["error"]=0;
                        if(strcmp($array_datos[0]["estado_id"],"2")==0 and strcmp($_POST["estado_id"],"1")==0 and strcmp($_POST["tipo_usuario"],"3")==0)
                        {
                            $wsdl=URL_WEBSERVICE."sise-servicio-1.0/ClientesAgenteWsImpl?wsdl";
                            $info_wsdl= new SoapClient($wsdl);

                            $args=array("numDoc"=>$_POST["ruc"],
                                                    "tipoAgente"=>"",
                                                    "codAgente"=>"",
                                                    "snActivas"=>-1,
                                                    "campoin1"=>"",
                                                    "campoin2"=>"",
                                                    "campoin3"=>"",
                                                    "campoin4"=>"",
                                                    "campoin5"=>"");

                            

                            try{ 
                                    $info_clientes=$info_wsdl->__soapCall('ws_sise_clientes_agente', $args);	
                                    
                            }
                            catch(SoapFault $info_clientes){
                                    $_SESSION["error"]=1;
                                    $_SESSION["flash_error"]="Hay un problema con los  Web Sevices, intentelo mas tarde.";
                                    
                            }
                            
                            if($_SESSION["error"]==0 and isset($info_clientes->item)){
                                $info_clientes=$info_clientes->item;
                                $clientes_agente=new Clientesagente();

                                for($i=0;$i<count($info_clientes);$i++){
                                        $clientes_agente->set_cliente($info_clientes[$i]->codAseg, $info_clientes[$i]->contratante, $info_clientes[$i]->idPersona, $info_clientes[$i]->numeroDocumento, $info_clientes[$i]->ramos, $_POST["ruc"]);
                                }
                            }
                            
                        }
                        if($_SESSION["error"]==0 or strcmp($_POST["tipo_usuario"],"3")!=0){
                            switch ($_POST["tipo_usuario"]) {
                                    case '1':

                                            $query='UPDATE usuarios SET
                                            primer_nombre="'.format($_POST["primer_nombre"]).'",
                                            segundo_nombre="'.format($_POST["segundo_nombre"]).'",
                                            primer_apellido="'.format($_POST["primer_apellido"]).'",
                                            segundo_apellido="'.format($_POST["segundo_apellido"]).'",
                                            tipo_de_documento="'.$_POST["tipo_de_documento"].'",
                                            numero_de_documento="'.$_POST["numero_de_documento"].'",
                                            contrasena=PASSWORD("'.$_POST["password"].'"),
                                            forget="'.$_POST["password"].'",
                                            sexo="'.$_POST["sexo"].'",
                                            email="'.$_POST["email"].'",
                                            estado_id 	="'.$_POST["estado_id"].'"
                                            WHERE id='.$_POST["id"].'';

                                            $this->query($query,0);
                                            $_SESSION["flash_ok"]="Se actualizo correctamente";

                                    break;
                                    case '0':

                                            $query='UPDATE usuarios SET
                                            estado_id 	="1"
                                            WHERE id='.$_POST["id"].'';

                                            $this->query($query,0);
                                            $_SESSION["flash_ok"]="Se actualizo correctamente";

                                            //enviar correo de activacion para usuario
                                            $html='

                                                            Estimado/a '.format($_POST["primer_nombre"]).' '.format($_POST["primer_apellido"]).'<br>
                                                            <p>
                                                            Su usuario de Equivida - Consulta en línea ha sido activado. Actualmente puede hacer uso de los servivios en línea.
                                                            </p>

                                                            <p>
                                                            Saludos<br>
                                                            Equipo de Equivida 
                                                            </p>
                                                            ';

                                                            $ch = curl_init(MAIL_SERVER);

                                                            curl_setopt ($ch, CURLOPT_POST, 1);
                                                            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                                                            $post= "action=register&asunto=Equivida: Usuario Activado&de=consultaenlinea@equivida.com&para=".$_POST["email"]."&html=".$html."&rol=persona";
                                                            curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
                                                            $page=curl_exec ($ch);
                                                            curl_close ($ch);

                                                            //enviar correo de activacion para administrador
                                                                $html='
                                                                Estimado/a miembro de Soporte Web de Equivida<br>
                                                                <p>
                                                                El usuario '.format($_POST["primer_nombre"]).' '.format($_POST["primer_apellido"]).' ha sido activado.                                                            
                                                                </p>
                                                                <p>
                                                                Saludos<br>
                                                                Equipo de Equivida 
                                                                </p>
                                                                ';
                                                            $ch = curl_init(MAIL_SERVER);

                                                            curl_setopt ($ch, CURLOPT_POST, 1);
                                                            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                                                            $post= "action=register&asunto=Equivida: Usuario Activado&de=consultaenlinea@equivida.com&para=accionistas@equivida.com&html=".$html."&rol=persona";
                                                            curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
                                                            $page=curl_exec ($ch);
                                                            curl_close ($ch);
                                    break;


                                    default:

                                            if(isset($_POST["randomPassword"])){

                                                    $query='UPDATE usuarios SET
                                                    nombre_de_la_empresa="'.format($_POST["nombre_de_la_empresa"]).'",
                                                    razon_social="'.format($_POST["razon_social"]).'",
                                                    ruc="'.format($_POST["ruc"]).'",
                                                    primer_nombre="'.format($_POST["primer_nombre"]).'",
                                                    segundo_nombre="'.format($_POST["segundo_nombre"]).'",
                                                    primer_apellido="'.format($_POST["primer_apellido"]).'",
                                                    segundo_apellido="'.format($_POST["segundo_apellido"]).'",
                                                    tipo_de_documento="'.$_POST["tipo_de_documento"].'",
                                                    numero_de_documento="'.$_POST["numero_de_documento"].'",
                                                    contrasena=PASSWORD("'.$_POST["randomPassword"].'"),
                                                    forget="'.$_POST["randomPassword"].'",
                                                    sexo="'.$_POST["sexo"].'",
                                                    email="'.$_POST["email"].'",
                                                    estado_id 	="'.$_POST["estado_id"].'"
                                                    WHERE id='.$_POST["id"].'';

                                                    $this->query($query,0);
                                                    $_SESSION["flash_ok"]="Se actualizo correctamente";
                                                    if(strcmp($_POST["tipo_usuario"],"3")==0)
                                                    {
                                                          $_SESSION["flash_ok"]="Información importada Correctamente.";
                                                    }
                                                    if((isset($_POST["enviar_alerta"]))&&($_POST["enviar_alerta"]=="si")){

                                                            //Enviar Correo

                                                            switch($_POST["tipo_usuario"]){
                                                            case 1:
                                                                    $tipo_usuario="Persona";
                                                            break;
                                                            case 2:
                                                                    $tipo_usuario="Empresa";
                                                            break;
                                                            case 3:
                                                                    $tipo_usuario="Broker";
                                                            break;
                                                            case 4:
                                                                    $tipo_usuario="Accionista";
                                                            break;


                                                            }

                                                            $para=$_POST["email"];

                                                            if($_POST["cambiar_password"]=="si"){

                                                                    $url_correcta="id=".$_POST["id"];
                                                                    $key=encrypt($url_correcta,"bedomax");
                                                                    //echo $key;

                                                                    $ch = curl_init(MAIL_SERVER);

                                                                    curl_setopt ($ch, CURLOPT_POST, 1);
                                                                    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

                                                                    $post= "action=password_cambiar_generado&asunto=Equivida: Cuenta Aprobada&de=servicioalcliente@equivida.com&para=".$para."&key=".$key."&tipo_usuario=".$tipo_usuario."&ambiente=local";
                                                                    curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
                                                                    $page=curl_exec ($ch);
                                                                    curl_close ($ch);

                                                                    $_SESSION["flash_ok"]="Se enviaron los accesos a su correo electrónico";



                                                            }else{

                                                                    $ch = curl_init(MAIL_SERVER);
                                                                    curl_setopt ($ch, CURLOPT_POST, 1);
                                                                    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

                                                                    $post= "action=password_generado&asunto=Equivida: Cuenta Aprobada&de=servicioalcliente@equivida.com&para=".$para."&randomPassword=".$_POST["randomPassword"]."&tipo_usuario=".$tipo_usuario."&ambiente=local";
                                                                    curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
                                                                    $page=curl_exec ($ch);
                                                                    curl_close ($ch);

                                                                    $_SESSION["flash_ok"]="Se enviaron los accesos a su correo electrónico";

                                                            }



                                                    }

                                            }else{

                                                    if((isset($_POST["password"]))&&($_POST["password"]!="")){

                                                            $query='UPDATE usuarios SET
                                                            nombre_de_la_empresa="'.format($_POST["nombre_de_la_empresa"]).'",
                                                            razon_social="'.format($_POST["razon_social"]).'",
                                                            ruc="'.format($_POST["ruc"]).'",
                                                            primer_nombre="'.format($_POST["primer_nombre"]).'",
                                                            segundo_nombre="'.format($_POST["segundo_nombre"]).'",
                                                            primer_apellido="'.format($_POST["primer_apellido"]).'",
                                                            segundo_apellido="'.format($_POST["segundo_apellido"]).'",
                                                            tipo_de_documento="'.$_POST["tipo_de_documento"].'",
                                                            numero_de_documento="'.$_POST["numero_de_documento"].'",
                                                            sexo="'.$_POST["sexo"].'",
                                                            email="'.$_POST["email"].'",
                                                            contrasena=PASSWORD("'.$_POST["password"].'"),
                                                            forget="'.$_POST["password"].'",
                                                            estado_id 	="'.$_POST["estado_id"].'"
                                                            WHERE id='.$_POST["id"].'';

                                                            $this->query($query,0);
                                                            $_SESSION["flash_ok"]="Se actualizo correctamente";


                                                    }else{


                                                            $query='UPDATE usuarios SET
                                                            nombre_de_la_empresa="'.format($_POST["nombre_de_la_empresa"]).'",
                                                            razon_social="'.format($_POST["razon_social"]).'",
                                                            ruc="'.format($_POST["ruc"]).'",
                                                            primer_nombre="'.format($_POST["primer_nombre"]).'",
                                                            segundo_nombre="'.format($_POST["segundo_nombre"]).'",
                                                            primer_apellido="'.format($_POST["primer_apellido"]).'",
                                                            segundo_apellido="'.format($_POST["segundo_apellido"]).'",
                                                            tipo_de_documento="'.$_POST["tipo_de_documento"].'",
                                                            numero_de_documento="'.$_POST["numero_de_documento"].'",
                                                            sexo="'.$_POST["sexo"].'",
                                                            email="'.$_POST["email"].'",
                                                            estado_id 	="'.$_POST["estado_id"].'"
                                                            WHERE id='.$_POST["id"].'';

                                                            $this->query($query,0);
                                                            $_SESSION["flash_ok"]="Se actualizo correctamente";

                                                    }


                                            }	


                                            $this->update_accionista();

                                           if($array_datos[0]['estado_id']!=1&&$_POST["estado_id"]==1) //Si el usuario se activa enviar correo electronico a la cuenta
                                             { 
                                               $html='

                                                            Estimado/a '.format($_POST["primer_nombre"]).' '.format($_POST["primer_apellido"]).'<br>
                                                            <p>
                                                            Su usuario de Equivida - Consulta en línea ha sido activado. Actualmente puede hacer uso de los servivios en línea.
                                                            </p>

                                                            <p>
                                                            Saludos<br>
                                                            Equipo de Equivida 
                                                            </p>
                                                            ';

                                                            $ch = curl_init(MAIL_SERVER);

                                                            curl_setopt ($ch, CURLOPT_POST, 1);
                                                            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                                                            $post= "action=register&asunto=Equivida: Usuario Activado&de=consultaenlinea@equivida.com&para=".$_POST["email"]."&html=".$html."&rol=persona";
                                                            curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
                                                            $page=curl_exec ($ch);
                                                            curl_close ($ch);
                                             } 

                                               if ($_POST["estado_id"]==3) //Si es que el usuario es Denegado enviar un correo electronico informando
                                            {
                                                //Enviar Cliente
                                                $html='
                                                Estimado '.format($_POST["primer_nombre"]).' '.format($_POST["primer_apellido"]).',
                                                <p>
                                                Su solicitud  para crear la cuenta vinculada al email: '.$_POST["email"].'  ha sido denegada.
                                                </p>                   
                                                <p>
                                                En caso de algun error o para cualquier duda comunicarse con: soporteweb@equivida.com
                                                </p>
                                                <br>
                                                Muchas gracias

                                                <p>
                                                Saludos<br>
                                                Equipo de Equivida
                                                </p>
                                                ';
                                                $ch = curl_init(MAIL_SERVER);

                                                curl_setopt ($ch, CURLOPT_POST, 1);
                                                curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                                                $para=EMAIL_CONTACTO;

                                                $post= "action=register&asunto=Equivida.com: Consulta en Linea - Cuenta Denegada&de=soporteweb@equivida.com&para=".$_POST["email"]."&html=".$html."&rol=persona";
                                                curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
                                                $page=curl_exec ($ch);
                                                curl_close ($ch);
                                            }

                            }
                        }

	}
	
	function delete(){
		
		if($_SESSION["equivida"]["rol"]=="admin"){
			
			$query='DELETE FROM direcciones WHERE usuario_id='.$_GET["id"].';';
			$this->query($query,0);
		
			$query='DELETE FROM correos WHERE usuario_id='.$_GET["id"].';';
			$this->query($query,0);
		
			$query='DELETE FROM solicitudes WHERE usuario_id='.$_GET["id"].';';
			$this->query($query,0);
		
			$query='DELETE FROM telefonos WHERE usuario_id='.$_GET["id"].';';
			$this->query($query,0);
		
			$query='DELETE FROM usuarios WHERE id ='.$_GET["id"].' LIMIT 1';
			$this->query($query,0);
		
			$_SESSION["flash_ok"]="El usuario se borró correctamente";
		
		}else{
			$_SESSION["flash_error"]="El usuario se borró correctamente";
		}
	}
	
	function update_accionista(){
		
		if($_POST["tipo_usuario"]==4){
				
				$query='SELECT * FROM accionistas WHERE usuario_id='.$_POST["id"].';';
				$array_datos=$this->query($query,1);
				
				if(count($array_datos)>0){
					
					$query='UPDATE accionistas SET tipo_accionista_id="'.$_POST["tipo_accionista_id"].'" WHERE usuario_id="'.$_POST["id"].'";';
					$this->query($query,0);
					
				}else{
					
					$query='INSERT INTO accionistas SET  usuario_id="'.$_POST["id"].'",  tipo_accionista_id="'.$_POST["tipo_accionista_id"].'";';
					$this->query($query,0);
					
				}
		}
		
	}
	
	function get_solicitudes($user_id){
		$query='SELECT * FROM  solicitudes WHERE usuario_id="'.$user_id.'" order by fecha_create DESC;';
		$array_datos=$this->query($query,1);
		
		return $array_datos;
		
	}
	
	
	function get_todas_solicitudes(){
		$query='SELECT id, (SELECT email FROM usuarios WHERE id=s.usuario_id) as email, seccion, poliza, accion, fecha_create FROM  solicitudes s WHERE 1 order by fecha_create DESC;';
		$array_datos=$this->query($query,1);
		
		return $array_datos;
		
	}
	
	function ver_solicitud($id){
		
		$query='SELECT id, (SELECT email FROM usuarios WHERE id=s.usuario_id) as email, seccion, poliza, accion, fecha_create, html_cliente, html_equivida FROM  solicitudes s WHERE id='.$id.' order by fecha_create DESC;';
		$array_datos=$this->query($query,1);
		return $array_datos;
		
		
	}
	
	function get_tipo_accionista($id){
		
		$query='SELECT * FROM accionistas WHERE usuario_id='.$id.';';
		$array_datos=$this->query($query,1);
		
		if(count($array_datos)>0){
			return $array_datos[0]["tipo_accionista_id"];
		}else{
			return 0;
		}
		
	}
	
	function save_usuario_adicional(){


		switch($_POST["tipo_usuario"]){

			case "usuario_adicional":

				$query='SELECT * FROM usuarios where email="'.$_POST["email"].'";';
				$array_datos=$this->query($query,1);

				if(count($array_datos)==0){
				
					$query='INSERT INTO usuarios_adicionales SET
					email="'.$_POST["email"].'",
			 		nombre_completo="'.$_POST["nombre_completo"].'",
			  		usuario_id="'.$_POST["usuario_padre_id"].'",
			  		contrasena=PASSWORD("'.$_POST["contrasena"].'"),
			   		fecha_create=NOW();';
			
			
					
				
					$array_datos=$this->query($query,0);
					$_SESSION["flash_ok"]="El usuario está creado correctamente";


						$para=$_POST["email"];
						$ch = curl_init(MAIL_SERVER);
						curl_setopt ($ch, CURLOPT_POST, 1);
						curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

						$post= "action=password_generado&asunto=Equivida: Cuenta Adicional&de=servicioalcliente@equivida.com&para=".$para."&randomPassword=".$_POST["contrasena"]."&tipo_usuario=Usuario Adicional&ambiente=local";
						curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
						$page=curl_exec ($ch);
						curl_close ($ch);
						
						$_SESSION["flash_ok"]="Se enviaron los accesos a su correo electrónico";
					
		


				}else{
					$_SESSION["flash_error"]="Ya existe un usuario con ese e-mail";
				}		

			break;
		}

	}


	function update_usuario_adicional(){

		if($_POST["actualizar_password"]=="si"){
			
			$query='UPDATE usuarios_adicionales SET 
					email="'.$_POST["email"].'",
			 		nombre_completo="'.$_POST["nombre_completo"].'",
			  		usuario_id="'.$_POST["usuario_id"].'",
			  		contrasena=PASSWORD("'.$_POST["contrasena"].'")
					WHERE id="'.$_POST["id"].'";';
		
		}else{

			$query='UPDATE usuarios_adicionales SET 
					email="'.$_POST["email"].'",
			 		nombre_completo="'.$_POST["nombre_completo"].'",
			  		usuario_id="'.$_POST["usuario_id"].'"
					WHERE id="'.$_POST["id"].'";';


		}
		
		$_SESSION["email__adicional_user_equivida"]=$_POST["email"];
		$this->query($query,0);
		$_SESSION["flash_ok"]="El usuario se actualizó correctamente";

	}

	function update_usuario_admin(){
		

		if($_POST["actualizar_password"]=="si"){

			if (!preg_match("/[0-9]+/",$_POST["contrasena"])){
		     		$_SESSION["flash_error"]="Debe ingresar una contraseña con letras y números";
		   	}else{
				if(strlen($_POST["contrasena"])>=8){
					
					
					$query='SELECT * FROM usuarios where email="'.$_SESSION["equivida"]["bd"]["email"].'" and contrasena=password("'.$_POST["contrasena_actual"].'");';
		

					$array_datos=$this->query($query,1);
					
					if(count($array_datos)>0){

						$query='UPDATE  usuarios  SET
								email="'.$_POST["email"].'",
								contrasena=PASSWORD("'.$_POST["contrasena"].'"),
								forget = "'.$_POST["contrasena"].'"
								WHERE id='.$_SESSION["equivida"]["bd"]["id"].';';
						$cambiar=$this->query($query,0);	
						
						$_SESSION["equivida"]["username"]=$_POST["email"];
						$_SESSION["equivida"]["bd"]["email"]=$_POST["email"];

						$_SESSION["flash_ok"]="Los datos se actualizaron correctamente";

					}else{

						$_SESSION["flash_error"]="La contraseña actual es incorrecta";
					}
					
					
					
				}else{
					$_SESSION["flash_error"]="Debe ingresar una contraseña con letras y números";
				}
			}


		}else{


				$query='UPDATE  usuarios  SET
								email="'.$_POST["email"].'"
								WHERE id='.$_SESSION["equivida"]["bd"]["id"].';';
	
				$cambiar=$this->query($query,0);	
				$_SESSION["equivida"]["username"]=$_POST["email"];
				$_SESSION["equivida"]["bd"]["email"]=$_POST["email"];
				$_SESSION["flash_ok"]="Los datos se actualizaron correctamente";


		}


		

	}



	function eliminar_usuario_adicional(){

		$query='SELECT * FROM usuarios_adicionales where usuario_id="'.$_SESSION["equivida"]["id"].'" and id="'.$_GET["id"].'";';
		$array_datos=$this->query($query,1);

		if(count($array_datos)>0){
			$query='DELETE FROM usuarios_adicionales WHERE id='.$_GET["id"].';';
			$array_datos=$this->query($query,1);
			$_SESSION["flash_ok"]="El usuario fue borrado correctamente";
		}else{
			$_SESSION["flash_error"]="Existe un error al borrar el usuario";
		}
	}
	
	
	function eliminar_usuario_adicional_admin(){
		$query='DELETE FROM usuarios_adicionales WHERE id='.$_GET["id"].' LIMIT 1;';
		$array_datos=$this->query($query,1);
		$_SESSION["flash_ok"]="El usuario fue borrado correctamente";
	}

	function get_usuario_adicional(){
		
		$query='SELECT * FROM usuarios_adicionales where id="'.$_GET["id"].'";';
		$array_datos=$this->query($query,1);
		return $array_datos;
	
	}

	function get_usuarios_adicionales($usuario_id){
			$query='SELECT * FROM usuarios_adicionales where usuario_id="'.$usuario_id.'";';
			$array_datos=$this->query($query,1);
			
			return $array_datos;
	}


        
        
	function save_usuario_seguimiento(){
                
                if ($_POST['permiso_todos'] == "")
                    $_POST['permiso_todos']=0;
                if ($_POST['permiso_personas'] == "")
                    $_POST['permiso_personas']=0;
                if ($_POST['permiso_empresas'] == "")
                    $_POST['permiso_empresas']=0;
                if ($_POST['permiso_brokers'] == "")
                    $_POST['permiso_brokers']=0;
                if ($_POST['permiso_accionistas'] == "")
                    $_POST['permiso_accionistas']=0;
                if ($_POST['permiso_archivos'] == "")
                    $_POST['permiso_archivos']=0;
                if ($_POST['permiso_solicitudes'] == "")
                    $_POST['permiso_solicitudes']=0;

		switch($_POST["tipo_usuario"]){

			case "usuario_seguimiento":

				$query='SELECT * FROM usuarios_seguimiento where email="'.$_POST["email"].'";';
				$array_datos=$this->query($query,1);

				if(count($array_datos)==0){
				
					$query='INSERT INTO usuarios_seguimiento SET
					email="'.$_POST["email"].'",
			 		nombre_completo="'.$_POST["nombre_completo"].'",
			  		contrasena=PASSWORD("'.$_POST["contrasena"].'"),
                                        permiso_todos="'.$_POST["permiso_todos"].'",
                                        permiso_personas="'.$_POST["permiso_personas"].'",
                                        permiso_empresas="'.$_POST["permiso_empresas"].'",
                                        permiso_brokers="'.$_POST["permiso_brokers"].'",
                                        permiso_accionistas="'.$_POST["permiso_accionistas"].'",
                                        permiso_archivos="'.$_POST["permiso_archivos"].'",
                                        permiso_solicitudes="'.$_POST["permiso_solicitudes"].'",    
			   		fecha_create=NOW();';
			
			
					
				
					$array_datos=$this->query($query,0);
					$_SESSION["flash_ok"]="El usuario está creado correctamente";

                                        /*
						$para=$_POST["email"];
						$ch = curl_init(MAIL_SERVER);
						curl_setopt ($ch, CURLOPT_POST, 1);
						curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

						$post= "action=password_generado&asunto=Equivida: Cuenta Adicional&de=servicioalcliente@equivida.com&para=".$para."&randomPassword=".$_POST["contrasena"]."&tipo_usuario=Usuario Adicional&ambiente=local";
						curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
						$page=curl_exec ($ch);
						curl_close ($ch);
						
						$_SESSION["flash_ok"]="Se enviaron los accesos a su correo electrónico";
					*/
		


				}else{
					$_SESSION["flash_error"]="Ya existe un usuario con ese e-mail";
				}		

			break;
		}

	}

	function update_usuario_seguimiento(){
                if ($_POST['permiso_todos'] == "")
                    $_POST['permiso_todos']=0;
                if ($_POST['permiso_personas'] == "")
                    $_POST['permiso_personas']=0;
                if ($_POST['permiso_empresas'] == "")
                    $_POST['permiso_empresas']=0;
                if ($_POST['permiso_brokers'] == "")
                    $_POST['permiso_brokers']=0;
                if ($_POST['permiso_accionistas'] == "")
                    $_POST['permiso_accionistas']=0;
                if ($_POST['permiso_archivos'] == "")
                    $_POST['permiso_archivos']=0;
                if ($_POST['permiso_solicitudes'] == "")
                    $_POST['permiso_solicitudes']=0;
                
		if($_POST["actualizar_password"]=="si"){
			
			$query='UPDATE usuarios_seguimiento SET 
					email="'.$_POST["email"].'",
			 		nombre_completo="'.$_POST["nombre_completo"].'",
			  		contrasena=PASSWORD("'.$_POST["contrasena"].'"),
                                        permiso_todos="'.$_POST["permiso_todos"].'",
                                        permiso_personas="'.$_POST["permiso_personas"].'",
                                        permiso_empresas="'.$_POST["permiso_empresas"].'",
                                        permiso_brokers="'.$_POST["permiso_brokers"].'",
                                        permiso_accionistas="'.$_POST["permiso_accionistas"].'",
                                        permiso_archivos="'.$_POST["permiso_archivos"].'",
                                        permiso_solicitudes="'.$_POST["permiso_solicitudes"].'",
                                        permiso_polizas_colectivas="'.$_POST["permiso_polizas_colectivas"].'"    
					WHERE id="'.$_POST["id"].'";';
                        
		
		}else{

			$query='UPDATE usuarios_seguimiento SET 
					email="'.$_POST["email"].'",
			 		nombre_completo="'.$_POST["nombre_completo"].'",
                                        permiso_todos="'.$_POST["permiso_todos"].'",
                                        permiso_personas="'.$_POST["permiso_personas"].'",
                                        permiso_empresas="'.$_POST["permiso_empresas"].'",
                                        permiso_brokers="'.$_POST["permiso_brokers"].'",
                                        permiso_accionistas="'.$_POST["permiso_accionistas"].'",
                                        permiso_archivos="'.$_POST["permiso_archivos"].'",
                                        permiso_solicitudes="'.$_POST["permiso_solicitudes"].'",
                                        permiso_polizas_colectivas="'.$_POST["permiso_polizas_colectivas"].'"  
					WHERE id="'.$_POST["id"].'";';
                        
                       

		}
		
		$_SESSION["email__adicional_user_equivida"]=$_POST["email"];
		$this->query($query,0);
		$_SESSION["flash_ok"]="El usuario se actualizó correctamente";

	}

        
	function eliminar_usuario_seguimiento(){

		$query='SELECT * FROM usuarios_seguimiento where id="'.$_GET["id"].'";';
		$array_datos=$this->query($query,1);

		if(count($array_datos)>0){
			$query='DELETE FROM usuarios_seguimiento WHERE id='.$_GET["id"].';';
			$array_datos=$this->query($query,1);
			$_SESSION["flash_ok"]="El usuario fue borrado correctamente";
		}else{
			$_SESSION["flash_error"]="Existe un error al borrar el usuario";
		}
	}
	
	
	

	function get_usuario_seguimiento(){
		
		$query='SELECT * FROM usuarios_seguimiento where id="'.$_GET["id"].'";';
		$array_datos=$this->query($query,1);
		return $array_datos;
	
	}

	function get_usuarios_seguimiento(){//$usuario_id
			$query='SELECT * FROM usuarios_seguimiento'; // where usuario_id="'.$usuario_id.'";';
			$array_datos=$this->query($query,1);
			
			return $array_datos;
	}
        
        function get_usuario_administrador(){//$usuario_id
			$query='SELECT * FROM super_usuarios'; // where usuario_id="'.$usuario_id.'";';
			$array_datos=$this->query($query,1);
			
			return $array_datos;
	}

        
        
	function update_usuario_administrador(){
                
                
		if($_POST["actualizar_password"]=="si"){
			
			$query='UPDATE super_usuarios SET 
					usuario="'.$_POST["usuario"].'",
			  		contrasena=PASSWORD("'.$_POST["contrasena"].'")
					WHERE id="1";';
		
		}else{

			$query='UPDATE super_usuarios SET 
					usuario="'.$_POST["usuario"].'"  
					WHERE id="1";';
                        
                       

		}
		
		$_SESSION["email__adicional_user_equivida"]=$_POST["email"];
		$this->query($query,0);
		$_SESSION["flash_ok"]="El usuario se actualizó correctamente";

	}

}


?>