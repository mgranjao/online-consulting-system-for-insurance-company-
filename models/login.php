<?php


/**
* 
*/

require_once("basededatos.php");
class Login  extends Basededatos
{
	
	function __construct(){
		parent::__construct();
	}
	function login(){
		
		$is_user=0;
		
		$query='SELECT * FROM usuarios where email="'.trim($_POST["usuario"]).'" and contrasena=password("'.trim($_POST["contrasena"]).'");';
		$array_datos=$this->query($query,1);
		
		if(count($array_datos)>0){
			$is_user=1;
		}	

		if($is_user==0){

			$query2='SELECT * FROM usuarios_adicionales where email="'.trim($_POST["usuario"]).'" and contrasena=password("'.trim($_POST["contrasena"]).'");';

			$array_datos2=$this->query($query2,1);


			if(count($array_datos2)>0){
				$query='SELECT * FROM usuarios where id="'.trim($array_datos2[0]["usuario_id"]).'";';
				$array_datos=$this->query($query,1);
				$is_user=2;
			}else{
				$is_user=0;
			}

		}
	


		if($is_user>0){
			
			
			
			
			if($array_datos[0]["tipo_usuario_id"]==$_POST["rol"]){
				
				
				
				
				if($array_datos[0]["estado_id"]=="1"){
				
				
				
				$_SESSION["equivida"]["id"]=$array_datos[0]["id"];
				$_SESSION["equivida"]["username"]=$array_datos[0]["email"];
				$_SESSION["equivida"]["apellidoMaterno"]=$array_datos[0]["segundo_apellido"];
				$_SESSION["equivida"]["apellidoPaterno"]=$array_datos[0]["primer_apellido"];
				$_SESSION["equivida"]["primerNombre"]=$array_datos[0]["primer_nombre"];
				$_SESSION["equivida"]["cedula"]=$array_datos[0]["numero_de_documento"];

				$_SESSION["equivida"]["bd"]=$array_datos[0];
				
				switch($_POST["rol"]){
					case "1":
						$_SESSION["equivida"]["rol"]="persona";
					break;
					case "2":

						$_SESSION["equivida"]["rol"]="empresa";
					break;
					case "3":
						$_SESSION["equivida"]["rol"]="brokers";
					break;
					case "4":
						$_SESSION["equivida"]["rol"]="accionista";
					break;
				
					
				}
				
				
				$user=new User();
				$tipo_accionista_id=$user->get_tipo_accionista($_SESSION["equivida"]["id"]);

				if($tipo_accionista_id=="2"){	
					$_SESSION["equivida"]["rol"]="director";
				}
				
				switch($is_user){
					case 1:
						$_SESSION["tipo_user_equivida"]="admin";
						$_SESSION["email__adicional_user_equivida"]="";
					break;
					case 2:
						$_SESSION["tipo_user_equivida"]="adicional";
						$_SESSION["email__adicional_user_equivida"]=$array_datos2[0]["email"];
						$_SESSION["equivida"]["primerNombre"]=$array_datos2[0]["nombre_completo"];
					break;
				}

					
				
					
					}else{
						$_SESSION["flash_error"]="Su usuario se encuentra pendiente de aprobación";
					}
			
			}else{
				
				$_SESSION["flash_error"]="Existe un error, el usuario no corresponde al tipo de usuario";
				
				
			}
			
			
		}else{
			
			$_SESSION["flash_error"]="Revise que este bien ingresado su correo electrónico y contraseña";
			
		}
		
		
			
			
	}














	function logout(){
		foreach($_SESSION as $key=>$value){
			$result = session_unregister($key);
		}
	}
	
	function update_user(){
	
			if (!preg_match("/[0-9]+/",$_POST["nueva_contrasena"])){
		     		$_SESSION["flash_error"]="Debe ingresar una contraseña con letras y números";
		   	}else{
				if(strlen($_POST["nueva_contrasena"])>=8){
					
					
					$query='SELECT * FROM usuarios where email="'.$_SESSION["equivida"]["bd"]["email"].'" and contrasena=password("'.$_POST["contrasena"].'");';
		

					$array_datos=$this->query($query,1);
					
					if(count($array_datos)>0){

						$query='UPDATE  usuarios  SET
								email="'.$_POST["email"].'",
								contrasena=PASSWORD("'.$_POST["nueva_contrasena"].'"),
								forget = "'.$_POST["nueva_contrasena"].'"
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
		
		
		
	}
	
	
	function update_password(){
		
			
			if($_POST["tipo_usuario"]=="admin"){
			
			$query='SELECT * FROM usuarios where id='.$_POST["id"].';';

			
			$array_datos=$this->query($query,1);
			
			if(count($array_datos)>0){

				$query='UPDATE  usuarios  SET
						contrasena=PASSWORD("'.$_POST["nueva_contrasena"].'"), forget="'.$_POST["nueva_contrasena"].'"  WHERE id='.$_POST["id"].';';
		
				$cambiar=$this->query($query,0);	
				
				$_SESSION["flash_ok"]="Los datos se actualizaron correctamente";

			}else{
				$_SESSION["flash_error"]="Error no se pudo actualizar correctamente la contraseña";
			}
			
			
			}else{
				
				
				
				$query='SELECT * FROM usuarios_adicionales where id='.$_POST["id"].';';


				$array_datos=$this->query($query,1);

				if(count($array_datos)>0){

					$query='UPDATE  usuarios_adicionales  SET
							contrasena=PASSWORD("'.$_POST["nueva_contrasena"].'")  WHERE id='.$_POST["id"].';';

					$cambiar=$this->query($query,0);	

					$_SESSION["flash_ok"]="Los datos se actualizaron correctamente";

				}else{
					$_SESSION["flash_error"]="Error no se pudo actualizar correctamente la contraseña";
				}
				
				
				
			}
		
		
	}
	
	
	
	function new_user(){
	
		$error="";
		
		
		
		if($_POST["tipo_usuario"]==1){
				
				if(trim($_POST["primer_nombre"])==""){
					$error="- Primer nombre es campo obligatorio<br>".$error;
				}

				if(trim($_POST["primer_apellido"])==""){
					$error="- Primer Apellido es campo obligatorio<br>".$error;
				}

				if(trim($_POST["tipo_de_documento"])==""){
					$error="- Tipo de Documento es campo obligatorio<br>".$error;
				}

				if(trim($_POST["n_documento"])==""){
					$error="- Número Documento es campo obligatorio<br>".$error;
				}

				if(trim($_POST["email"])==""){
					$error="- Email es campo obligatorio<br>".$error;
				}

				if(trim($_POST["contrasena"])==""){
					$error="- La contraseña es campo obligatorio<br>".$error;
				}


				if(trim($_POST["contrasena"])!=trim($_POST["verificar_contrasena"])){
					$error="- La contraseña debe ser igual a la de verificación<br>".$error;
				}

				if($_POST["imagen_seguridad"]=="0"){
					$error="- Debe seleccionar una imagen de seguridad<br>".$error;
				}

				if($_POST["condiciones"]!="condiciones"){
					$error="- Debe aceptar las condiciones<br>".$error;
				}

				
				$query='SELECT * FROM usuarios where numero_de_documento="'.$_POST["n_documento"].'" and tipo_usuario_id="'.$_POST["tipo_usuario"].'" and estado_id <> 3;';
				$array_datos=$this->query($query,1);
				
				
				if(count($array_datos)>0){
					$error="- El número de documento esta ocupado<br>".$error;
				}
				
			
				if($_POST["tipo_usuario"]!="1"){
					$estado="2";
				}else{
					$estado="2"; //Estado de Persona tambien inicia en pendiente
				}

				if(isset($_POST["tipo_de_documento"])&&($error=="")){
				
				$query='INSERT INTO usuarios SET
					 	primer_nombre="'.format($_POST["primer_nombre"]).'",
						segundo_nombre="'.format($_POST["segundo_nombre"]).'",
					 	primer_apellido="'.format($_POST["primer_apellido"]).'",
					 	segundo_apellido="'.format($_POST["segundo_apellido"]).'",
						tipo_de_documento="'.$_POST["tipo_de_documento"].'",
						numero_de_documento="'.$_POST["n_documento"].'",
						sexo="'.$_POST["sexo"].'",
						email="'.$_POST["email"].'",
						contrasena=PASSWORD("'.$_POST["contrasena"].'"),
						forget="'.$_POST["contrasena"].'",
						pais="'.format($_POST["pais"]).'",
						provincia_id="'.$_POST["provincia_id"].'",
						ciudad="'.format($_POST["ciudad"]).'",
					 	calle_principal="'.format($_POST["calle_principal"]).'",
						calle_secundaria="'.format($_POST["calle_secundaria"]).'",
                                                numero_casa="'.format($_POST["numero_casa"]).'",
						telefono_convencional="'.$_POST["telefono_convencional"].'",
					 	telefono_movil="'.$_POST["telefono_movil"].'",
						nombre_de_la_empresa="'.format($_POST["nombre_de_la_empresa"]).'",
					 	razon_social="'.$_POST["razon_social"].'",
						ruc="'.$_POST["ruc"].'",
						cargo="'.$_POST["cargo"].'",
					 	imagen_seguridad="'.$_POST["imagen_seguridad"].'",
					 	fecha_creacion=NOW(),
						tipo_usuario_id ="'.$_POST["tipo_usuario"].'",
						estado_id="'.$estado.'",
						fecha_actualizacion=NOW();';


							$cambiar=$this->query($query,0);
							$insert_id=mysql_insert_id();

							$query='INSERT INTO direcciones SET
									ciudad="'.$_POST["ciudad"].'",
									canton="'.$_POST["canton"].'",
									provincia_id="'.$_POST["provincia_id"].'",
									calle_principal="'.$_POST["calle_principal"].'",
									calle_secundaria="'.$_POST["calle_secundaria"].'",
									usuario_id="'.$insert_id.'",
									tipo="DOMICILIO";';

							$cambiar=$this->query($query,0);

							$query='INSERT INTO correos SET
									email="'.$_POST["email"].'",
									usuario_id="'.$insert_id.'",
									tipo="PERSONAL";';

							$this->query($query,0);


							//Enviar Correo

							/*$html='

							Estimado/a '.format($_POST["primer_nombre"]).' '.format($_POST["primer_apellido"]).'<br>
							<p>
							Sus accesos para ingresar al Sistema de Clientes de Equivida son los siguientes:
							</p>
							<b>Url Ingreso:</b> www.equivida.com/consultaenlinea/<br>
							<b>Usuario:</b> '.$_POST["email"].'<br>
							<b>Contrasena:</b> '.$_POST["contrasena"].'<br>

							<p>
							Si tiene algún problema adicional, por favor comunicarse con soporteweb@equivida.com
							</p>
							<p>
							Saludos<br>
							Equipo de Equivida 
							</p>
							';*/
							
                                                        $html='

							Estimado/a '.format($_POST["primer_nombre"]).' '.format($_POST["primer_apellido"]).'<br>
							<p>
							Su usuario ha sido registrado con éxito. Por su seguridad, verificaremos sus datos previa la activación de su cuenta. Nuestro Call Center le atenderá en horario de 8:00 a 17:30 de lunes a viernes. 
                                                        </p>
							
							<p>
							Saludos<br>
							Equipo de Equivida 
							</p>
							';
							
						
							$ch = curl_init(MAIL_SERVER);

							curl_setopt ($ch, CURLOPT_POST, 1);
							curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
							$post= "action=register&asunto=Equivida: Accesos Consulta en Linea&de=consultaenlinea@equivida.com&para=".$_POST["email"]."&html=".$html."&rol=persona";
							curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
							$page=curl_exec ($ch);
							curl_close ($ch);
							
                                                        
                                                        /*************Correo a Soporte de Equivida**************/
                                                        if($_POST["tipo_usuario"]==4){
                                                            $html='
                                                            Estimado/a miembro de Soporte Web de Equivida<br>
                                                            <p>
                                                            '.format($_POST["primer_nombre"]).' '.format($_POST["primer_apellido"]).' se ha registrado en Consulta en Línea como Accionista o miembro del Directorio de Equivida S.A. Favor validar su identidad previo el envío de link para la activación de su cuenta.                                                            
                                                            </p>
                                                            <p>
                                                            Saludos<br>
                                                            Equipo de Equivida 
                                                            </p>
                                                            ';
                                                        }else{
                                                            $html='
                                                            Estimado/a miembro de Soporte Web de Equivida<br>
                                                            <p>
                                                            Se ha creado una nueva cuenta N° "'.$insert_id.'" correspondiente al usuario '.format($_POST["primer_nombre"]).'  '.format($_POST["primer_apellido"]).', usted tiene 24 horas (laborables) para comunicarse con el cliente a los teléfonos '.$_POST["telefono_convencional"].' (convencional) o '.$_POST["telefono_movil"].' (móvil), para hacer la verificación de identidad y activar su cuenta en el sistema
                                                            </p>
                                                            <p>
                                                            Saludos<br>
                                                            Equipo de Equivida 
                                                            </p>
                                                            ';
                                                        }
							
						
							$ch = curl_init(MAIL_SERVER);

							curl_setopt ($ch, CURLOPT_POST, 1);
							curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
							if($_POST["tipo_usuario"]==4){
                                                            $post= "action=register&asunto=Equivida: Nuevo registro de Accionista&de=consultaenlinea@equivida.com&para=accionistas@equivida.com&html=".$html."&rol=persona";
                                                        }else{
                                                            $post= "action=register&asunto=Equivida: Accesos Consulta en Linea&de=consultaenlinea@equivida.com&para=soporteweb@equivida.com&html=".$html."&rol=persona";
                                                        }
                                                        curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
							$page=curl_exec ($ch);
							curl_close ($ch);  
							
							//INSERTAR LOG DE USUARIOS
							$query_log='INSERT INTO logs_usuarios SET 
									usuario_id='.$insert_id.',
									post="'.addslashes(serialize($_POST)).'",
									fecha_creacion=NOW();';
									
							$this->query($query_log,0);
							//echo $query;
							
							  
							              
							}

		}else{
			
			
			
				if(trim($_POST["primer_nombre"])==""){
					$error="- Primer nombre es campo obligatorio<br>".$error;
				}

				if(trim($_POST["primer_apellido"])==""){
					$error="- Primer Apellido es campo obligatorio<br>".$error;
				}

				if(trim($_POST["tipo_de_documento"])==""){
					$error="- Tipo de Documento es campo obligatorio<br>".$error;
				}

				if(trim($_POST["n_documento"])==""){
					$error="- Número Documento es campo obligatorio<br>".$error;
				}
				
				if(trim($_POST["email"])==""){
					$error="- Email es campo obligatorio<br>".$error;
				}


				if($_POST["imagen_seguridad"]=="0"){
					$error="- Debe seleccionar una imagen de seguridad<br>".$error;
				}

				if($_POST["condiciones"]!="condiciones"){
					$error="- Debe aceptar las condiciones<br>".$error;
				}


				if($_POST["tipo_usuario"]!="1"){
					$estado="2";
				}else{
					$estado="2"; //1Estado de personas tambien inicia en pendiente
				}
				
				
				if(isset($_POST["tipo_de_documento"])&&($error=="")){


				$query='INSERT INTO usuarios SET
					 	primer_nombre="'.format($_POST["primer_nombre"]).'",
						segundo_nombre="'.format($_POST["segundo_nombre"]).'",
					 	primer_apellido="'.format($_POST["primer_apellido"]).'",
					 	segundo_apellido="'.format($_POST["segundo_apellido"]).'",
						tipo_de_documento="'.$_POST["tipo_de_documento"].'",
						numero_de_documento="'.$_POST["n_documento"].'",
						sexo="'.$_POST["sexo"].'",
						email="'.$_POST["email"].'",
						pais="'.format($_POST["pais"]).'",
						provincia_id="'.$_POST["provincia_id"].'",
						ciudad="'.format($_POST["ciudad"]).'",
					 	calle_principal="'.format($_POST["calle_principal"]).'",
						calle_secundaria="'.format($_POST["calle_secundaria"]).'",
						telefono_convencional="'.$_POST["telefono_convencional"].'",
					 	telefono_movil="'.$_POST["telefono_movil"].'",
						nombre_de_la_empresa="'.format($_POST["nombre_de_la_empresa"]).'",
					 	razon_social="'.$_POST["razon_social"].'",
						ruc="'.$_POST["ruc"].'",
						cargo="'.$_POST["cargo"].'",
					 	imagen_seguridad="'.$_POST["imagen_seguridad"].'",
					 	fecha_creacion=NOW(),
						tipo_usuario_id ="'.$_POST["tipo_usuario"].'",
						estado_id="'.$estado.'",
						fecha_actualizacion=NOW();';


							$cambiar=$this->query($query,0);
							$insert_id=mysql_insert_id();

							$query='INSERT INTO direcciones SET
									ciudad="'.$_POST["ciudad"].'",
									canton="'.$_POST["canton"].'",
									provincia_id="'.$_POST["provincia_id"].'",
									calle_principal="'.$_POST["calle_principal"].'",
									calle_secundaria="'.$_POST["calle_secundaria"].'",
									usuario_id="'.$insert_id.'",
									tipo="DOMICILIO";';

							$cambiar=$this->query($query,0);

							$query='INSERT INTO correos SET
									email="'.$_POST["email"].'",
									usuario_id="'.$insert_id.'",
									tipo="PERSONAL";';

							$this->query($query,0);


							//Enviar Correo
							
							
							switch($_POST["tipo_usuario"]){
								case "1":
									$tipo_usuario="Persona";
								break;
								case "2":
									$tipo_usuario="Empresa";
								break;
								case "3":
									$tipo_usuario="Broker";
								break;
								case "4":
									$tipo_usuario="Accionista";
								break;
							}
							/*
							$html='
							Estimado/a Administrador<br>
							<p>
							Validar la siguiente cuenta creada en <b>'.$tipo_usuario.'</b>: 
							</p>
							<b>Url Ingreso:</b> www.equivida.com/consultaenlinea/admin/<br>
							<b>Usuario:</b> '.$_POST["email"].'<br>
							<b>Empresa:</b> '.$_POST["nombre_de_la_empresa"].'<br>
							<b>RUC:</b> '.$_POST["ruc"].'<br>
							<b>Cargo:</b> '.$_POST["cargo"].'<br>
							<b>Nombre:</b> '.$_POST["primer_nombre"].'<br>
							<b>Apellido:</b> '.$_POST["primer_apellido"].'<br>
							<p>
							Si tiene algún problema adicional, por favor comunicarse con soporteweb@equivida.com
							</p>
							<p>
							Saludos<br>
							Equipo de Equivida 
							</p>
							';
							$ch = curl_init(MAIL_SERVER);
							curl_setopt ($ch, CURLOPT_POST, 1);
							curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
							$para=EMAIL_CONTACTO;
							$post= "action=register&asunto=Equivida: Cuenta ".$tipo_usuario." para validar&de=consultaenlinea@equivida.com&para=".$para."&html=".$html."&rol=persona";
							curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
							$page=curl_exec ($ch);
							curl_close ($ch);
							*/
                                                         
                                                        $html='

							Estimado/a '.format($_POST["primer_nombre"]).' '.format($_POST["primer_apellido"]).'<br>
							<p>
							Su usuario ha sido registrado con éxito. Por su seguridad, verificaremos sus datos previa la activación de su cuenta. Nuestro Call Center le atenderá en horario de 8:00 a 17:30 de lunes a viernes. 
							</p>
							
							<p>
							Saludos<br>
							Equipo de Equivida 
							</p>
							';

							$ch = curl_init(MAIL_SERVER);

							curl_setopt ($ch, CURLOPT_POST, 1);
							curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
							$post= "action=register&asunto=Equivida: Accesos Consulta en Linea&de=consultaenlinea@equivida.com&para=".$_POST["email"]."&html=".$html."&rol=persona";
							curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
							$page=curl_exec ($ch);
							curl_close ($ch);

							
                                                        
                                                        /*************Correo a Soporte de Equivida**************/
                                                      
                                                        if($_POST["tipo_usuario"]==4){
                                                            $html='
                                                            Estimado/a miembro de Soporte Web de Equivida<br>
                                                            <p>
                                                            '.format($_POST["primer_nombre"]).' '.format($_POST["primer_apellido"]).' se ha registrado en Consulta en Línea como Accionista o miembro del Directorio de Equivida S.A. Favor validar su identidad previo el envío de link para la activación de su cuenta.                                                            
                                                            </p>
                                                            <p>
                                                            Saludos<br>
                                                            Equipo de Equivida 
                                                            </p>
                                                            ';
                                                        }else{
                                                            $html='
                                                            Estimado/a miembro de Soporte Web de Equivida<br>
                                                            <p>
                                                            Se ha creado una nueva cuenta N° "'.$insert_id.'" correspondiente al usuario '.format($_POST["primer_nombre"]).'  '.format($_POST["primer_apellido"]).', usted tiene 24 horas (laborables) para comunicarse con el cliente a los teléfonos '.$_POST["telefono_convencional"].' (convencional) o '.$_POST["telefono_movil"].' (móvil), para hacer la verificación de identidad y activar su cuenta en el sistema
                                                            </p>
                                                            <p>
                                                            Saludos<br>
                                                            Equipo de Equivida 
                                                            </p>
                                                            ';
                                                        }

							$ch = curl_init(MAIL_SERVER);

							curl_setopt ($ch, CURLOPT_POST, 1);
							curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
							if($_POST["tipo_usuario"]==4){
                                                            $post= "action=register&asunto=Equivida: Nuevo registro de Accionista&de=consultaenlinea@equivida.com&para=accionistas@equivida.com&html=".$html."&rol=persona";
                                                        }else{
                                                            $post= "action=register&asunto=Equivida: Accesos Consulta en Linea&de=consultaenlinea@equivida.com&para=soporteweb@equivida.com&html=".$html."&rol=persona";
                                                        }
                                                        curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
							$page=curl_exec ($ch);
							curl_close ($ch);  
						}
					
			
			
		}
		
		return $error;
		
		
		
		
		
	}
	
	function forget($email){
		$query='SELECT * FROM usuarios where email="'.$email.'";';
		$array_datos=$this->query($query,1);
		
		if(count($array_datos)==0){
			$query='SELECT * FROM usuarios_adicionales where email="'.$email.'";';
			$array_datos=$this->query($query,1);
			$array_datos["tipo_usuario"]="adicional";
			
		}else{
			$array_datos["tipo_usuario"]="admin";
		}
		
		
		return $array_datos;
	}
	
	
	function forget_id($id){
		
		if($_GET["tipo_usuario"]=="admin"){
			$query='SELECT * FROM usuarios where id="'.$id.'";';
			$array_datos=$this->query($query,1);
		}else{
			$query='SELECT * FROM usuarios_adicionales where id="'.$id.'";';
			$array_datos=$this->query($query,1);	
		}
		
		return $array_datos;
	}
	





	function login_admin(){



		$query='SELECT * FROM super_usuarios where usuario="'.$_POST["usuario"].'" and contrasena=password("'.$_POST["contrasena"].'");';


		$array_datos=$this->query($query,1);
		
		if(count($array_datos)>0){


			$_SESSION["equivida"]["id"]=$array_datos[0]["id"];
			$_SESSION["equivida"]["usuario"]=$array_datos[0]["usuario"];
			$_SESSION["equivida"]["rol"]="admin";


		}else{
                        
                    
                    $query='SELECT * FROM usuarios_seguimiento where email="'.$_POST["usuario"].'" and contrasena=password("'.$_POST["contrasena"].'");';


		$array_datos=$this->query($query,1);
		
		if(count($array_datos)>0){


			$_SESSION["equivida"]["id"]=$array_datos[0]["id"];
			$_SESSION["equivida"]["usuario"]=$array_datos[0]["mail"];
			$_SESSION["equivida"]["rol"]="seguimiento";
                        $_SESSION["equivida"]["permiso_todos"]=$array_datos[0]["permiso_todos"];
                        $_SESSION["equivida"]["permiso_personas"]=$array_datos[0]["permiso_personas"];
                        $_SESSION["equivida"]["permiso_empresas"]=$array_datos[0]["permiso_empresas"];
                        $_SESSION["equivida"]["permiso_brokers"]=$array_datos[0]["permiso_brokers"];
                        $_SESSION["equivida"]["permiso_accionistas"]=$array_datos[0]["permiso_accionistas"];
                        $_SESSION["equivida"]["permiso_archivos"]=$array_datos[0]["permiso_archivos"];
                        $_SESSION["equivida"]["permiso_solicitudes"]=$array_datos[0]["permiso_solicitudes"];
                        $_SESSION["equivida"]["permiso_polizas_colectivas"]=$array_datos[0]["permiso_polizas_colectivas"];
                }else{

			$_SESSION["flash_error"]="Revise que este bien ingresado el nombre de usuario y contraseña";

		}
                }

	}




	
	function limpia_texto($texto){
		$texto=str_replace("&","",$texto);
		$texto=str_replace("|","",$texto);
		$texto=str_replace(" and ","",$texto);
		$texto=str_replace(" or ","",$texto);
		$texto=str_replace("=","",$texto);
		$texto=str_replace("+","",$texto);
		$texto=str_replace("!","",$texto);
		$texto=str_replace(" ","",$texto);
		return $texto;
	}
	
	
}


?>