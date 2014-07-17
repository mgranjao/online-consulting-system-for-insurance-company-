	<?php
		$this->display("html/layouts/header.tpl.php");
	?>


	<?php
	
	
	switch($_SESSION["equivida"]["rol"]){
		
		case "persona":
			$this->display("html/layouts/menu_cliente.tpl.php");
		break;
		case "empresa":
			$this->display("html/layouts/menu_empresa.tpl.php");		
		break;
		case "brokers":
			$this->display("html/layouts/menu_brokers.tpl.php");
		break;
		case "accionista":
			$this->display("html/layouts/menu_accionista.tpl.php");
		break;
		case "director":
			$this->display("html/layouts/menu_accionista.tpl.php");
		break;
		
	}
	
	
	?>
	
	
	

<div  class="right">
	
	
	<?php
		
		include 'html/layouts/message.tpl.php';
		
		
	?>


	<div  id="" class="inside">

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			<h1>Configuración de Acceso - Editar Usuario</h1>
			
			
			
				<div class="formulario">
					
						<p>
						Para modificar la información del usuario debes ingresar la contraseña actual:
						</p>
						<span class="campo_obligatorio">(Campo Obligatorio *)</span>
						
						<a href="<?=URL?>?page=configuracion&action=configuracion_acceso" class="regresar"></a>
						
	
						<div class="datatable">
								
							
							<form action="<?=URL?>?page=configuracion&action=update_usuario_admin" method="POST"  class="form_acceso_2"  accept-charset="utf-8">
								
							

								<input type="hidden" name="var_valida_email" value="0" id="var_valida_email">
								<input type="hidden" name="var_valida_contrasena" value="0" id="var_valida_contrasena">
								<input type="hidden" name="var_valida_verificar_contrasena" value="0" id="var_valida_verificar_contrasena">

								<input type="hidden" name="var_valida_editar_contrasena" value="0" id="var_valida_editar_contrasena">

								<input type="hidden" name="var_valida_editar_email" value="<?=$_SESSION["equivida"]["bd"]["email"]?>" id="var_valida_editar_email">

								<input type="hidden" name="tipo_usuario" value="admin" id="tipo_usuario">

								<input type="hidden" name="id" value="<?=$_SESSION["equivida"]["bd"]["id"]?>" id="id">

								<p>
								<label>Email</label>
								<input type="text" name="email" value="<?=$_SESSION["equivida"]["bd"]["email"]?>" id="email"  autocomplete="off">
								</p>
								
								<div id="error_user"></div>

	
								<p>
								<label>Contraseña actual</label>
								<input type="password" name="contrasena_actual" value="" id="contrasena_actual"  autocomplete="off">
								</p>
	
								<p>
									<label>Deseas actualizar tu contraseña</label>

									<input type="checkbox" name="actualizar_password" id="actualizar_password" value="si"> Si
								
								</p>



								<div   id="ver_campos_contrasena" class="hidden">

								¿Quieres <a href="" class="usuario_generar_contraseña">Generar una Contraseña</a> automática?  
                                                                 <br></br>
															<div  id="texto_password_generado" class="hidden">

															</div>

								<p>
								<label>Nueva contraseña</label>
								<input type="hidden" name="contrasena" value="" id="contrasena"  autocomplete="off">
                                <input class="input-pass" type="text" name="contrasenav" value="" id="contrasenav" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" onselectstart="return false" autocomplete="off">    
                                                                
								</p>
								<div id="error_password"></div>
	
								<p>
									<label>Confirmar nueva contraseña <span class="campo_obligatorio">*</span> </label>
									<input type="hidden" name="verificar_contrasena" value="" class="required" id="verificar_contrasena"  autocomplete="off">
									<input class="input-pass" type="text" name="verificar_contrasenav" value="" class="required" id="verificar_contrasenav"  onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" onselectstart="return false" autocomplete="off">
								
								</p>
								<div id="error_verificar_password"></div>

								</div>

								<p align="center"><input type="submit" value="Guardar"></p>



								</form>
							
							
						</div>
						
						
					<div class="aclaratoria">
                    <div class="recuerde">Recuerda:</div>
                    <ul>
                    <li>Puedes editar tu cuenta de usuario, cambiar tu correo electrónico y contraseña. Si utilizas el generador de contraseñas, te sugerimos que la anotes en un lugar seguro para que no la olvides.</li>
                    <li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20beneficiarios%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
                    </ul>
                </div>
				
					
				
				</div>
			
			
			</div>

		</div>

	</div>


</div>
<div  id="" class="clear"></div>


<?php
	$this->display("html/layouts/footer.tpl.php");
?>