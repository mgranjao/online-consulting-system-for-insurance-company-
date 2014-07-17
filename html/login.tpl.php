<!DOCTYPE html>
<!--[if lt IE 7]><html lang="es" class="ie6"><![endif]-->
<!--[if IE 7]><html lang="es" class="ie7"><![endif]-->
<!--[if IE 8]><html lang="es" class="ie8"><![endif]-->
<!--[if IE 9]><html lang="es" class="ie9"><![endif]-->
<!--[if gt IE 9]><html lang="es"><![endif]-->
<!--[if !IE]>-->
<html lang="es"><!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Equivida - Consulta en Línea</title>
	<meta name="generator" content="TextMate http://macromates.com/">
	<meta name="author" content="Maximiliano Cáceres">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=URL?>css/login.css?rand=<?=rand()?>" type="text/css" media="screen" title="no title" charset="utf-8">
	
	<link rel="shortcut icon" href="<?=URL?>images/favicon.ico" />
	
	<!--[if lt IE 7]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
	<![endif]-->
	
		<!--[if lte IE 8]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script><![endif]-->

		<!--[if lt IE 9]>
		<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
		<![endif]-->
		
		
		
	
	
	<script src="<?=URL?>js/modernizr.custom.47227.js" type="text/javascript" charset="utf-8"></script>
	
	<script src="<?=URL?>js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=URL?>js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
	
	
	
	<link rel="stylesheet" href="<?=URL?>css/colorbox.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<script src="<?=URL?>js/jquery.colorbox.js" type="text/javascript" charset="utf-8"></script>
	
	<script src="<?=URL?>js/equivida_login.js" type="text/javascript" charset="utf-8"></script>


</head>
<body>
	


	<div class="container">
		<div class="cabecera">
	    	<a href="http://www.equivida.com" target="_self" id="logo"></a>
	    </div>
	    <div class="cuerpo">
	    	<div id="texto-explicativo">
	        	<span id="titulo">Te damos la bienvenida a los servicios en línea de Equivida</span>
	
	            <span id="texto">Aquí podrás realizar consultas de tus pólizas y realizar distintas transacciones.  
				</span>
	        </div>
	
	
			<div class="aviso">
				
			
				
				<?php
				
				if((isset($_SESSION["flash_ok"]))&&($_SESSION["flash_ok"]!="")){
					?>
						<div class="ok">
							<div class="inside">

								<?=$_SESSION["flash_ok"]?>
								
							</div>
						</div>
					<?php
					$_SESSION["flash_ok"]="";
				}
				
				?>
				
				
				<?php
				
				if((isset($_SESSION["flash_error"]))&&($_SESSION["flash_error"]!="")){
					?>
						<div class="error">
							<div class="inside">

								<?=$_SESSION["flash_error"]?>

							</div>
						</div>
					<?php
					$_SESSION["flash_error"]="";
				}
				
				?>
				
				
				
			</div>
			
			
			<!-- Personas -->
			
			<div class="login hidden" id="login-1">

				<div class="inside">
					
					<p align="center">
					<img src="<?=URL?>images/personas_blanco.png"  alt="Personas Blanco">
					</p>
					
					<p class="texto">
						Ingresa tus datos, si no tienes cuenta, <a href="?page=sign-up&tipo=1">Regístrate aquí</a>
					</p>
					
					<form action="<?=URL?>?page=login" method="POST" accept-charset="utf-8">
						
						<input type="hidden" name="rol" value="1" id="rol">
						
						<p>
							<label>E-mail:</label>
							<input type="text" name="usuario" class="required" value="" id="usuario">
						</p>
						<p>
							<label>Contraseña:</label>
							<input type="password" name="contrasena" class="required" value="" id="contrasena">
						</p>

						<p align="center">
							<input type="submit" name="some_name" value="Entrar" id="some_name">
						</p>

						<p class="forget_password">
							<a class="box">¿Olvidaste tu usuario o contraseña?
</a>
						</p>

					</form>
					
				</div>
				
			</div>
			
			<!-- Personas -->
			
			
			<!-- Empresas -->
			
			
			<div class="login empresa hidden" id="login-2">

				<div class="inside">
					
					<p align="center">
						
						
					<img src="<?=URL?>images/empresas_blanco.png"  alt="Empresas Blanco">
					
					</p>
					
					<p class="texto">
						Ingresa tus datos, si no tienes cuenta, <a href="?page=sign-up&tipo=2">Regístrate aquí</a>
					</p>
					
					<form action="<?=URL?>?page=login" method="POST" accept-charset="utf-8">
						
						<input type="hidden" name="rol" value="2" id="rol">
						
						<p>
							<label>E-mail:</label>
							<input type="text" name="usuario" class="required" value="" id="usuario" >
						</p>
						<p>
							<label>Contraseña:</label>
							<input type="password" name="contrasena" class="required" value="" id="contrasena" >
						</p>

						<p align="center">
							<input type="submit" name="some_name" value="Entrar" id="some_name">
						</p>

						<p class="forget_password">
							<a class="box">¿Olvidaste tu usuario o contraseña?
</a>
						</p>

					</form>
					
				</div>
				
			</div>
			
			
			<!-- Fin Empresas -->
			
			
			
			<!-- Brokers -->
			
			
			<div class="login brokers hidden" id="login-3">

				<div class="inside">
					
					<p align="center">
						
					<img src="<?=URL?>images/brokers_blanco.png"  alt="Brokers Blanco">
					
					</p>
					
					<p class="texto">
						Ingresa tus datos, si no tienes cuenta,  <a href="?page=sign-up&tipo=3">Regístrate aquí</a>
					</p>
					
					<form action="<?=URL?>?page=login" method="POST" accept-charset="utf-8">
						
						<input type="hidden" name="rol" value="3" id="rol">
						
						<p>
							<label>E-mail:</label>
							<input type="text" name="usuario" value="" class="required" id="usuario" >
						</p>
						<p>
							<label>Contraseña:</label>
							<input type="password" name="contrasena" value="" class="required" id="contrasena" >
						</p>

						<p align="center">
							<input type="submit" name="some_name" value="Entrar" id="some_name">
						</p>

						<p class="forget_password">
							<a class="box">¿Olvidaste tu usuario o contraseña?
</a>
						</p>

					</form>
					
				</div>
				
			</div>
			
			
			<!-- Fin Brokers -->
			
			
			
			<!-- Accionistas -->
			
			<div class="login accionistas hidden" id="login-4">

				<div class="inside">
					
					<p align="center">
						
					<img src="<?=URL?>images/accionistas_blanco.png" alt="Brokers Blanco">
					
					</p>
					
					<p class="texto">
						Ingrese sus datos, si no tiene cuenta, <a href="?page=sign-up&tipo=4">Regístrese aquí</a>
					</p>
					
					<form action="<?=URL?>?page=login" method="POST" accept-charset="utf-8">
						
						<input type="hidden" name="rol" value="4" id="rol">
						
						<p>
							<label>E-mail:</label>
							<input type="text" name="usuario" value="" class="required" id="usuario" >
						</p>
						<p>
							<label>Contraseña:</label>
							<input type="password" name="contrasena" value="" class="required" id="contrasena" >
						</p>

						<p align="center">
							<input type="submit" name="some_name" value="Entrar" id="some_name">
						</p>

						<p class="forget_password">
							<a class="box">¿Olvidó su contraseña?</a>
						</p>

					</form>
					
				</div>
				
			</div>
			
			
			<!-- Fin Accionistas -->
			

	        <div class="opciones-login">

				<a class="botones botonlogin" id="botonlogin-1">
					<img src="<?=URL?>images/boton_personas.png" />
				</a>
				<a class="botones botonlogin" id="botonlogin-2">
					<img src="<?=URL?>images/boton_empresas.png" />
				</a>
				<a class="botones botonlogin mover" id="botonlogin-3">
					<img src="<?=URL?>images/boton_brokers.png" />
				</a>
				<a class="botones botonlogin" id="botonlogin-4">
					<img src="<?=URL?>images/boton_accionistas.png" />
				</a>
				
                <div class="clear"></div>
                
                <div class="notas-usuarios">
                	<div class="btn-usuario" id="btn-note-1">
                    	<div class="txt-usuario">
                        Si contrataste con Equivida una o más de nuestras soluciones para cliente individual...
                        </div>
                        <a class="botonlogin btn-reg-usuario" id="botonlogin-1">CREA TU USUARIO AQUÍ</a>
                    </div>
                    
                    <div class="btn-usuario" id="btn-note-2">
                    	<div class="txt-usuario">
                        Si contrataste con Equivida una solución empresarial para tu compañía y tus empleados...
                        </div>
                        <a class="botonlogin btn-reg-usuario" id="botonlogin-2">CREA TU USUARIO AQUÍ</a>
                    </div>
                    
                    <div class="btn-usuario" id="btn-note-3">
                    	<div class="txt-usuario">
                        Si perteneces a un Broker aliado de Equivida y mantienes pólizas contratadas con nosotros...
                        </div>
                        <a class="botonlogin btn-reg-usuario" id="botonlogin-3">CREA TU USUARIO AQUÍ</a>
                    </div>
                    
                    <div class="btn-usuario" id="btn-note-4">
                    	<div class="txt-usuario">
                        Si usted es uno de nuestros inversores, miembro Accionista o del Directorio de Equivida...
                        </div>
                        <a class="botonlogin btn-reg-usuario" id="botonlogin-4">CREE SU USUARIO AQUÍ</a>
                    </div>
                </div>
                
				<div class="clear"></div>

	        </div>




	    </div>
	    <div class="footer">
	    	<div id="logo"></div>
	        <div id="menu">
	        	<ul>
		        	<li><a style="text-decoration:none;" href="http://www.equivida.com/index.php/mapa-del-sitio">Mapa del Sitio</a></li>
		            <li><a style="text-decoration:none;" href="http://www.equivida.com/index.php/oportunidades-laborales">Oportunidades Laborales</a></li>
		        </ul>
	        </div>
	        <div id="copyright">
	        	<span>&copy; Copyright <a href="http://www.equivida.com">Equivida</a> 2013</span>
	        </div>
	    </div>
	</div>
	
	
	
	
	<!-- Proyección Futura -->
	<div style="display:none">
		<div id="box">

			<div class="header">

				<div class="inside">
					<h1>Problemas para ingresar</h1>
                    <a class="cerrar">Cerrar</a>
				</div>

			</div>


			<div class="text">

					
					
					<!--<form action="index.php?action=forget" class="form_forget" method="POST" accept-charset="utf-8">-->
					<form action="<?=URL?>index/forget" class="form_forget" method="POST" accept-charset="utf-8">	

					
				
					<div class="olvidaste">
						
						<p>
							Si no recuerdas la contraseña, <b>ingresa tu correo electrónico</b> y te enviaremos los accesos.
						</p>
					
						<p>
							<input type="text" name="email" value="" class="required email" id="email">
						</p>
					
						<p align="center">
							<input type="submit" name="Enviar" value="Enviar" id="enviar">
						</p>
                                                
                                                <hr/>
                                                <p>
							Si olvidaste el e-mail(usuario) con el que registraste tu cuenta, <b>comunícate con nuestro call center</b> y te enviaremos los accesos.
						</p>
					
					</div>
					
					</form>
					
					
					
			</div>


		</div>
	</div>
	<!-- Proyección Futura -->
	
	
	
	
	
	<!-- Proyección Futura -->
	<div style="display:none">
		<div id="box_2">

			<div class="header">

				<div class="inside">
					<?php
					
					if($_GET["action"]=="recuperar"){
						?>
						<h1>Recuperar Contraseña</h1>
						<?
					}
					
					if($_GET["action"]=="activar"){
						?>
						<h1>Activar Cuenta</h1>
						<?
					}
					
					?>
					
					
				</div>

			</div>


			<div class="text">

				
					
					<!--<form action="index.php?action=update_password" class="form_acceso" method="POST" accept-charset="utf-8">-->
					<form action="<?=URL?>index/update_password" class="form_acceso" method="POST" accept-charset="utf-8">
					
					<a class="cerrar">Cerrar</a>
					
					<p>	
						Actualización de Contraseña, tienes los siguientes datos registrados:
					</p>
					
				
					<input type="hidden" name="id" value="<?=$this->usuario[0]["id"]?>" id="id">
					
					<?php
					if(isset($this->usuario[0]["primer_nombre"])){
					?>
					
					<p>
						<label>Nombres:</label>
						<input type="text" name="nombres" value="<?=$this->usuario[0]["primer_nombre"]?> <?=$this->usuario[0]["segundo_nombre"]?>" id="nombres" READONLY>
					</p>
					
					<p>
						<label>Apellidos:</label>
						<input type="text" name="apellidos" value="<?=$this->usuario[0]["primer_apellido"]?> <?=$this->usuario[0]["segundo_apellido"]?>" id="apellidos" READONLY>
					</p>
					
					
					<p>
						<label>Nº Documento:</label>
						<input type="text" name="n_documento" value="<?=$this->usuario[0]["numero_de_documento"]?>" id="n_documento" READONLY>
					</p>
					<input type="hidden" name="tipo_usuario" value="admin" id="tipo_usuario">
					<?php
					}else{
						?>
							<p>
								<label>Nombre Completo:</label>
								<input type="text" name="nombres" value="<?=$this->usuario[0]["nombre_completo"]?>" id="nombres" READONLY>
							</p>
							
							<input type="hidden" name="tipo_usuario" value="adicional" id="tipo_usuario">
						<?php
					}
					?>
					
					
					
					
					<p>
						<label>Email: </label>
						<input type="text" name="email" value="<?=$this->usuario[0]["email"]?>" id="email" readonly>
					</p>
					
					<p>
						<span class="atencion">Tu contraseña debe tener mínimo 8 caracteres (letras y números)</span>
					</p>
					
					<p>
						<label>Contraseña nueva: </label>
						<input type="password" name="nueva_contrasena" value="" id="nueva_contrasena">
						
						<div id="error_password"></div>
						
					</p>
					
					<p>
						<label>Verificar Contraseña nueva: </label>
						<input type="password" name="verificar_nueva_contrasena" value="" id="verificar_nueva_contrasena">
						
						<div id="error_verificar_password"></div>
						
						
					</p>
					
					<input type="hidden" name="var_valida" class="required" value="" id="var_valida">
					
					<p align="center">
						<input type="submit" name="guardar" value="Guardar" id="guardar">
					</p>
					
					
					
					</form>
					
					
					
			</div>


		</div>
	</div>
	<!-- Proyección Futura -->
	
	<?php
	
	
	if($this->forget=="1"){
		?>
			
			<script type="text/javascript" charset="utf-8">
				
				$.colorbox({inline:true, href:"#box_2",
				onOpen:function(){ 
					$('a.cerrar').click(function(event){
						parent.$.fn.colorbox.close();
					});
				}});
				
			</script>
			
		<?php
	}
	?>
	
	
	
<input type="hidden" name="URL" value="<?=URL?>" id="URL" />	
</body>
</html>
