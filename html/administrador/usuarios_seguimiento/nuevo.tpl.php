
<?php
	$this->display("html/layouts/admin_header.tpl.php");
?>


		
		<div class="formulario_crear">
			
			<div class="header_box"></div>
			<div class="body_box">
				
				<div class="inside">
					
					<h1>Administrador Consulta en Línea</h1>
					
					
					<div class="panel_admin">
						
						<div class="left_admin">
							
							
							<?php
								$this->display("html/layouts/admin_menu.tpl.php");
							?>
							
							
							
						</div>
						
						<div class="right_admin">
							
							
							<div class="area_trabajo">
								
								
							
								
								<div class="inside">
									
										<h4>Usuario Seguimiento - Nuevo </h4>
										
									
										<div class="formulario">
											
											

											
												
												
												
												
												
												
												
												
												
												
													<form action="<?=URL?>?page=administrador&action=save_usuario_seguimiento" method="POST"  class="form_acceso_2"  accept-charset="utf-8">



														<input type="hidden" name="var_valida_email" value="0" id="var_valida_email">
														<input type="hidden" name="var_valida_contrasena" value="0" id="var_valida_contrasena">
														<input type="hidden" name="var_valida_verificar_contrasena" value="0" id="var_valida_verificar_contrasena">


														<input type="hidden" name="tipo_usuario" value="usuario_seguimiento" id="usuario_seguimiento">

														<input type="hidden" name="usuario_id" value="<?=$_GET["id"]?>" id="usuario_id">
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
															<label>Contraseña Actual <span class="campo_obligatorio">*</span> </label>
															<input type="hidden" name="contrasena" value="" id="contrasena" class="contrasena" autocomplete="off">
                                                                                                                        <input type="text" name="contrasenav" value="" id="contrasenav" class="contrasena" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" onselectstart="return false" autocomplete="off">    


														</p>

														<div id="error_password"></div>

														<p>
															<label>Confirmar Nueva Contraseña <span class="campo_obligatorio">*</span> </label>
															<input type="hidden" name="verificar_contrasena" value="" class="required" id="verificar_contrasena"  autocomplete="off">
                                                                                                                        <input type="text" name="verificar_contrasenav" value="" class="required" id="verificar_contrasenav"  onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" onselectstart="return false" autocomplete="off">

														</p>
														<div id="error_verificar_password"></div>
                                                                                                                
                                                                                                                <p>
															<label>Permiso Todos </label>
															<input type="checkbox" name="permiso_todos" value="1" id="permiso_todos">
														</p>
                                                                                                                
                                                                                                                <p>
															<label>Permiso Personas </label>
															<input type="checkbox" name="permiso_personas" value="1" id="permiso_personas">
														</p>
                                                                                                                
                                                                                                                <p>
															<label>permiso Empresas</label>
															<input type="checkbox" name="permiso_empresas" value="1" id="permiso_empresas">
														</p>
                                                                                                                
                                                                                                                <p>
															<label>Permiso Brokers</label>
															<input type="checkbox" name="permiso_brokers" value="1" id="permiso_brokers">
														</p>
                                                                                                                
                                                                                                                <p>
															<label>Permiso Accionistas</label>
															<input type="checkbox" name="permiso_accionistas" value="1" id="permiso_accionistas">
														</p>
                                                                                                                
                                                                                                                <p>
															<label>Permiso Archivos</label>
															<input type="checkbox" name="permiso_archivos" value="1" id="permiso_archivos">
														</p>
                                                                                                                
                                                                                                                <p>
															<label>Permiso Solicitudes</label>
															<input type="checkbox" name="permiso_solicitudes" value="1" id="permiso_solicitudes">
														</p>
                                                                                                                
                                                                                                                <p>
															<label>Permiso Pólizas Colectivas</label>
															<input type="checkbox" name="permiso_polizas_colectivas" value="1" id="permiso_polizas_colectivas">
														</p>

															<p align="center"><input type="submit" value="Guardar &rarr;"></p>
													</form>
												
												
												
												
													
													
												
												

												
											
											
											
										</div>
										
										
										
										
										
										
									
										
										
									
								</div>
								
							</div>
							
							
						</div>
						
						<div class="clear"></div>
						
					</div>
					
					
					
					
				</div>
				
				
			</div>
			<div class="footer_box"></div>
			
		</div>


<?php
	$this->display("html/layouts/admin_footer.tpl.php");
?>