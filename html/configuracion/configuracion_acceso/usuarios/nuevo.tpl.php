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
			
			<h1> Configuración Accesos / Nuevo Usuario </h1>
			
			
			
				<div class="formulario">
					
						<p>
						Ingrese la información del nuevo usuario:
						</p>
						<span class="campo_obligatorio">(Campo Obligatorio *)</span>
						

						<a href="<?=URL?>?page=configuracion&action=configuracion_acceso" class="regresar"></a>
						
						
						<div class="datatable">
								
							
							<form action="<?=URL?>?page=configuracion&action=save_usuario" method="POST"  class="form_acceso_2"  accept-charset="utf-8">
								
							

								<input type="hidden" name="var_valida_email" value="0" id="var_valida_email">
								<input type="hidden" name="var_valida_contrasena" value="0" id="var_valida_contrasena">
								<input type="hidden" name="var_valida_verificar_contrasena" value="0" id="var_valida_verificar_contrasena">
								
								
								<input type="hidden" name="tipo_usuario" value="usuario_adicional" id="tipo_usuario">
								
									
								
								<input type="hidden" name="usuario_id" value="<?=$_GET["id"]?>" id="usuario_id">
								
								<input type="hidden" name="usuario_padre_id" value="<?=$_SESSION["equivida"]["id"]?>" id="usuario_padre_id">
								
								<input type="hidden" name="usuario_padre" value="<?=$_GET["username"]?>" id="usuario_padre">
								
								<input type="hidden" name="var_valida_editar_email" value="" id="var_valida_editar_email">



								<input type="hidden" name="var_valida_editar_contrasena" value="1" id="var_valida_editar_contrasena">

								<p>
									<label>Nombre Completo <span class="campo_obligatorio">*</span> </label>
									<input type="text" name="nombre_completo" value="" id="nombre_completo"  autocomplete="off">
									
								</p>
								
								

								<p>
									<label>Email <span class="campo_obligatorio">*</span> </label>
									<input type="text" name="email" value="" id="email"  autocomplete="off">
								</p>
								
								<div id="error_user"></div>
							
									¿ También puedes <a href="" class="usuario_generar_contraseña">Generar Contraseña</a> ?  
									<br></br>
									<div  id="texto_password_generado" class="hidden">
										
									</div>
								
								<p>
									<label>Nueva Contraseña <span class="campo_obligatorio">*</span> </label>
									<input type="hidden" name="contrasena" value="" id="contrasena"  autocomplete="off">
									<input type="text" name="contrasenav" value="" id="contrasenav" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" onselectstart="return false" autocomplete="off">    
									
									
								</p>
								
								<div id="error_password"></div>
								
								<p>
									<label>Confirmar Nueva Contraseña <span class="campo_obligatorio">*</span> </label>
									<input type="hidden" name="verificar_contrasena" value="" class="required" id="verificar_contrasena"  autocomplete="off">
									<input type="text" name="verificar_contrasenav" value="" class="required" id="verificar_contrasenav"  onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" onselectstart="return false" autocomplete="off">
								
								</p>
								<div id="error_verificar_password"></div>

									<p align="center"><input type="submit" value="Guardar &rarr;"></p>
							</form>
							
							
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