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
	
	<script src="<?=URL?>js/jquery.maskedinput-1.3.min.js" type="text/javascript" charset="utf-8"></script>
	
	<link rel="stylesheet" href="<?=URL?>css/jquery.alerts.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<script src="<?=URL?>js/jquery.alerts.js" type="text/javascript" charset="utf-8"></script>
	
	
	<script src="<?=URL?>js/equivida_login.js?rand=<?=rand()?>" type="text/javascript" charset="utf-8"></script>


</head>
<body>
	
	
		<div id="dvLoading"></div>
	
	


	<div class="container">
		<div class="cabecera">
	    	<a href="http://www.equivida.com" target="_self" id="logo"></a>
	    </div>
	   

	    <div  class="add_header">
	    <ul>
	    	<li> <a href="http://www.equivida.com">Ir al Sitio Web</a> </li>
	    	<li> <a href="<?=URL?>index.php">Regresar al Login</a> </li>
	    </ul>
	    </div>

	  </div>  	
		
		
		<div class="formulario_crear">
			
			<div class="header_box"></div>
			<div class="body_box">
				
				<div class="inside">
					
					<h1>CONSULTA EN LÍNEA</h1>
					
					<form action="<?=URL?>?page=save" method="POST" class="default_form" accept-charset="utf-8">
						

					<input type="hidden" name="tipo_usuario" value="<?=$_GET["tipo"]?>" id="tipo_usuario">
					
					
					
					<div class="box_chico">
						
						<div class="header_chico"></div>
						<div class="body_chico">
							
							<div class="inside">
								<?php
								
								switch ($_GET["tipo"]) {
									case '1':
										$title="PERSONAS";
									break;
									case '2':
										$title="EMPRESAS";
									break;
									case '3':
										$title="BROKERS";
									break;
									case '4':
										$title="ACCIONISTA";
									break;
									default:
									break;
								}
								
								?>
								
								<h1>REGISTRO DE <?=$title?></h1>
								
								<?php
								
								if(isset($this->log)){
									?>
										<div class="cuadro_error">
											
											<b>Error al registrarse: </b><br>
											<?php
											echo $this->log;
											?>
										</div>
									<?php
									
									
									
								}
								
								
								?>
								
								
								<p>
								
									<span class="texto_obligatorio">* Campos Obligatorios</span>

								</p>
								
								<div class="form">
									
								
									
									
										<div id="campos_empresas" <?php if(($_GET["tipo"]=="1")||($_GET["tipo"]=="4")){ ?>  class="hidden" <?php } ?>>


										<h2>INFORMACIÓN EMPRESA</h2>


										<div class="box">
											<label>Nombre de la Empresa <span class="obligatorio">*</span>:</label>
											<input type="text" name="nombre_de_la_empresa" value="" id="nombre_de_la_empresa">
										</div>
										<div class="box space">
											<label>Razón Social <span class="obligatorio">*</span>:</label>
											<input type="text" name="razon_social" value="" id="razon_social">
										</div>
										<div class="box space">
											<label>RUC <span class="obligatorio">*</span>:</label>
											<input type="text" name="ruc" value="" maxlength="13" id="ruc">
										</div>
										
										<div id="error_ruc"></div>
										
										
										
										<div class="box space">
											<label>Cargo <span class="obligatorio">*</span>:</label>
											<input type="text" name="cargo" value="" id="cargo">
										</div>

										</div>


										<div  id="" class="clear"></div>
									
									
										<h2>DATOS DEL USUARIO</h2>
									
									<div class="box">
										<label>Primer Nombre<span class="obligatorio">*</span>:</label>
										<input type="text" name="primer_nombre" value="" id="primer_nombre">
									</div>
									<div class="box space">
										<label>Segundo Nombre:</label>
										<input type="text" name="segundo_nombre" value="" id="segundo_nombre">
									</div>
									<div class="box space">
										<label>Primer Apellido<span class="obligatorio">*</span>:</label>
										<input type="text" name="primer_apellido" value="" id="primer_apellido">
									</div>
									<div class="box space">
										<label>Segundo Apellido:</label>
										<input type="text" name="segundo_apellido" value="" id="segundo_apellido">
									</div>
									
									<div class="clear"></div>


									<div class="box">
										<label>Tipo de Documento<span class="obligatorio">*</span>:</label>
										<select name="tipo_de_documento" id="tipo_de_documento">
											<option value="">Seleccione:</option>
											<option value="C">Cédula</option>
											<option value="P">Pasaporte</option>
										</select> 
									</div>


									<div class="box space">
										<label>Número de Documento<span class="obligatorio">*</span>:</label>
										<input type="text" name="n_documento" class=""  maxlength="10" value="" id="n_documento">
									</div>
									
									
									<div id="error_cedula"></div>

									<div class="box space">
										<label>Género:</label>
										<select name="sexo" id="sexo">
											<option value="">Seleccione:</option>
											<option value="M">Masculino</option>
											<option value="F">Femenino</option>
										</select> 
									</div>
									
									<?php
									if(!($_GET["tipo"]=="1")){
									?>
									
										<div class="box space">
											<label>Email<?php echo ($_GET["tipo"]!=4) ?  '' : ' de trabajo'; ?><span class="obligatorio">*</span>:</label>
											<input type="text" name="email" value="" id="email" autocomplete="off">
										</div>

										<div id="error_user" class="empresas">
										</div>
										
									<?php
									}
									?>
									<div  id="" class="clear"></div>

									
									<?php
									
									if(($_GET["tipo"]=="1")){
										?>
											
												<h2>ACCESOS Y CONTRASEÑA</h2>

												<div class="box accesos">
													<label>Email<span class="obligatorio">*</span>:<br><span class="leyenda">Utiliza un correo que uses frecuentemente</span></label>
													<input type="text" name="email" value="" id="email" autocomplete="off">
												</div>

												<div id="error_user">



												</div>


												<div class="box accesos space">
													<label>Contraseña<span class="obligatorio">*</span>:<br><span class="leyenda">Mínimo 8 caracteres (letras y números)</span></label>
													<input type="password" name="contrasena" value="" id="contrasena" autocomplete="off">
												</div>


												<div id="error_password">



												</div>


												<div class="box accesos space">
													<label>Verificar Contraseña<span class="obligatorio">*</span>:<br><span class="leyenda">Ingrese la misma contraseña</span></label>
													<input type="password" name="verificar_contrasena" value="" id="verificar_contrasena" autocomplete="off">
												</div>


												<div id="error_verificar_password">



												</div>




												<div class="clear"></div>
											
											
										<?php
									}
									
									?>
									
									
									
									<h2>DATOS DE CONTACTO</h2>
									
									
									<div class="box">
										<label>País:</label>
										<input type="text" name="pais" value="" id="pais">
									</div>
									<div class="box space">
										<label>Provincia:</label>
										<select name="provincia_id" id="provincia_id" class="required" >

											<option value="">Seleccionar</option>

											<?php

											for($i=0;$i<count($this->provincias);$i++){
												?>
												<option value="<?=$this->provincias[$i]["id"]?>"><?=$this->provincias[$i]["nombre"]?></option>
												<?php
											}

											?>						
										</select>
									</div>
									<div class="box space">
										<label>Cantón:</label>
										<input type="text" name="canton" value="" id="canton">
									</div>
									<div class="box space">
										<label>Ciudad:</label>
										<input type="text" name="ciudad" value="" id="ciudad">
									</div>
									
									<div class="clear"></div>
									
									
									<div class="box">
                                                                            <label>Calle Principal<?php echo ($_GET["tipo"]!=4) ?  '<span class="obligatorio">*</span>' : ''; ?>:</label>
										<input type="text" name="calle_principal" value="" id="calle_principal">
									</div>
									<div class="box space">
										<label>Calle Secundaria<?php echo ($_GET["tipo"]!=4) ?  '<span class="obligatorio">*</span>' : ''; ?>:</label>
										<input type="text" name="calle_secundaria" value="" id="calle_secundaria">
									</div>
									<div class="box space">
										<label>Teléfono Convencional<span class="obligatorio">*</span>:</label>
										<input type="text" name="telefono_convencional" value="" id="telefono_convencional" class="telefono solo-entero">
									</div>
                                                                        <div id="error_telefono_convencional"></div>
									<div class="box space">
										<label>Teléfono Móvil<span class="obligatorio">*</span>:</label>
										<input type="text" name="telefono_movil" value="" id="telefono_movil" class="telefono solo-entero">
									</div>
                                                                        <div id="error_telefono_movil"></div>
									
									
								
									<div class="clear"></div>
									<div class="box">
										<label>Número de casa<?php echo ($_GET["tipo"]!=4) ?  '<span class="obligatorio">*</span>' : ''; ?>:</label>
										<input type="text" name="numero_casa" value="" id="numero_casa">
									</div>
								
									<div class="clear"></div>
									<!--<div class="seguridad">
										
										<h2>Selecciona una imagen de seguridad para tu ingreso</h2>
										
										<div class="image">
											
											<a class="imagen-seguridad" id="imagen-1">
											<img src="images/seguridad/1.jpg" width="80" height="84" alt="Seguridad Imagen">
											</a>
										</div>
										
										<div class="image space">
											<a class="imagen-seguridad" id="imagen-2">
											<img src="images/seguridad/2.jpg" width="80" height="84" alt="Seguridad Imagen">
											</a>
										</div>
										
										<div class="image space">
											<a  class="imagen-seguridad" id="imagen-3">
											<img src="images/seguridad/3.jpg" width="80" height="84" alt="Seguridad Imagen">
											</a>
										</div>
										
										<div class="image space">
											<a  class="imagen-seguridad" id="imagen-4"> 
											<img src="images/seguridad/4.jpg" width="80" height="84" alt="Seguridad Imagen">
											</a>
										</div>
										
										<div class="image space">
											<a class="imagen-seguridad" id="imagen-5">
											<img src="images/seguridad/5.jpg" width="80" height="84" alt="Seguridad Imagen">
											</a>
										</div>
										
										<div class="image space">
											<a class="imagen-seguridad" id="imagen-6">
											<img src="images/seguridad/6.jpg" width="80" height="84" alt="Seguridad Imagen">
											</a>
										</div>
										
										<div class="image space">
											<a class="imagen-seguridad" id="imagen-7">
											<img src="images/seguridad/7.jpg" width="80" height="84" alt="Seguridad Imagen">
											</a>
										</div>
										
										<div class="image space">
											<a  class="imagen-seguridad" id="imagen-8">
											<img src="images/seguridad/8.jpg" width="80" height="84" alt="Seguridad Imagen">
											</a>
										</div>
										
										<div class="image space">
											<a  class="imagen-seguridad" id="imagen-9">
											<img src="images/seguridad/9.jpg" width="80" height="84" alt="Seguridad Imagen">
											</a>
										</div>
										
										 <input type="hidden" name="imagen_seguridad" value="0" id="imagen_seguridad">
										
										
										
										
										<div class="clear"></div>
										
										
										<div class="error_imagen"></div>
										
										
									</div>-->
									
                                   									
									<input type="hidden" name="var_valida_email" value="0" id="var_valida_email">
									<input type="hidden" name="var_valida_n_documento" value="0" id="var_valida_n_documento">
									<input type="hidden" name="var_valida_ruc" value="0" id="var_valida_ruc">
									<input type="hidden" name="var_valida_contrasena" value="0" id="var_valida_contrasena">
									<input type="hidden" name="var_valida_verificar_contrasena" value="0" id="var_valida_verificar_contrasena">
									
									
									<div class="condiciones">
										<input type="checkbox" name="condiciones" value="condiciones" id="condiciones"> ACEPTO LAS <a href="http://www.equivida.com/consultaenlinea/archivos/TerminosCondiciones.pdf" target="_blank">CONDICIONES</a> DE USO DE ESTE SITIO
										
										<div class="error_condiciones"></div>
										
										
											<?php

											switch ($_GET["tipo"]) {
												case '1':
													?>
													<p>
														<input type="button" class="registrar" name="registrarse" value="Registrarse" id="registrarse_persona">
													</p>
													<?
												break;
												case '2':
													?>
													<p>
														<input type="button" class="registrar" name="registrarse" value="Registrarse" id="registrarse_empresa">
													</p>
													<?
												break;
												case '3':
													?>
													<p>
														<input type="button" class="registrar" name="registrarse" value="Registrarse" id="registrarse_empresa">
													</p>
													<?
												break;
												case '4':
													?>
													<p>
														<input type="button" class="registrar" name="registrarse" value="Registrarse" id="registrarse_accionista">
													</p>
													<?
												break;
												default:
												break;
											}

											?>
										
										
										
										
									
										
									</div>
								
								 <div class="aclaratoria">
                                    <div class="recuerde">Recuerda:</div>
                                    <ul>
                                    <li>Los datos de contacto: dirección, e-mail y teléfonos son indispensables para brindarte algunos servicios como el envío de estados de cuenta o facturas. Por favor ingresa información actualizada.</li>
                                    </ul>
                                    </div>
									
									<div class="clear"></div>
									
									
									
									
								</div>
								
							</div>
						
						</div>
						<div class="footer_chico"></div>
						
					</div>
					
					</form>
					
					
				</div>
				
				
			</div>
			<div class="footer_box"></div>
			
		</div>




	 <div class="container">
	    <div class="footer">
	    	<div id="logo"></div>
	        <div id="menu">
	        	<ul>
		        	<li><a href="http://www.equivida.com/index.php/mapa-del-sitio">Mapa del sitio</a></li>
		            <li><a href="http://www.equivida.com/index.php/oportunidades-laborales">Oportunidades Laborales</a></li>
		        </ul>
	        </div>
	        <div id="copyright">
	        	<span>&copy; Copyright Equivida 2013</span>
	        </div>
	    </div>
	</div>
	
	
	
<input type="hidden" name="URL" value="<?=URL?>" id="URL" />
</body>
</html>
