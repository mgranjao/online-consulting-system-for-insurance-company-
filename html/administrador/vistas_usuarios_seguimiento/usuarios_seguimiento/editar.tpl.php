
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
									
										<h4>Usuario Adicional - Editar </h4>
										
									
										<div class="formulario">
											
											

											
												
												
												
												<form action="<?=URL?>?page=administrador&action=update_usuario_seguimiento" method="POST"  class="form_acceso_2"  accept-charset="utf-8">



													<input type="hidden" name="var_valida_email" value="0" id="var_valida_email">
													<input type="hidden" name="var_valida_contrasena" value="0" id="var_valida_contrasena">
													<input type="hidden" name="var_valida_verificar_contrasena" value="0" id="var_valida_verificar_contrasena">

													<input type="hidden" name="var_valida_editar_contrasena" value="0" id="var_valida_editar_contrasena">


													<input type="hidden" name="var_valida_editar_email" value="<?=$this->usuario_seguimiento[0]["email"]?>" id="var_valida_editar_email">


													<input type="hidden" name="tipo_usuario" value="usuario_seguimiento" id="usuario_seguimiento">

													<input type="hidden" name="usuario_id" value="<?=$this->usuario_seguimiento[0]["usuario_id"]?>" id="usuario_id">
													<input type="hidden" name="usuario_padre" value="<?=$this->usuario_seguimiento[0]["usuario_id"]?>" id="usuario_padre">

													<input type="hidden" name="id" value="<?=$this->usuario_seguimiento[0]["id"]?>" id="usuario_id">

													<p>
														<label>Nombre Completo <span class="campo_obligatorio">*</span> </label>
														<input type="text" name="nombre_completo" value="<?=$this->usuario_seguimiento[0]["nombre_completo"]?>" id="nombre_completo"  autocomplete="off">

													</p>



													<p>
														<label>Email <span class="campo_obligatorio">*</span> </label>
														<input type="text" name="email" value="<?=$this->usuario_seguimiento[0]["email"]?>" id="email"  autocomplete="off">
													</p>

													<div id="error_user"></div>

													<p>
														<label>Deseas actualizar contraseña</label>

														<input type="checkbox" name="actualizar_password" id="actualizar_password" value="si"> Si

													</p>



													<div   id="ver_campos_contrasena" class="hidden">




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
														<input type="hidden" name="verificar_contrasena" value="" class="required" id="verificar_contrasena" autocomplete="off">
                                                                                                                <input type="text" name="verificar_contrasenav" value="" class="required" id="verificar_contrasenav"  onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" onselectstart="return false" autocomplete="off">

													</p>

													<div id="error_verificar_password"></div>

													</div>
                                                                                                        
                                                                                                        
                                                                                                        
                                                                                                                <p>
															<label>Permiso Todos </label>
															<input type="checkbox" name="permiso_todos" value="1" id="permiso_todos" <?if ($this->usuario_seguimiento[0]["permiso_todos"]==1) {?>checked<?}?> >
														</p>
                                                                                                                
                                                                                                                <p>
															<label>Permiso Personas </label>
															<input type="checkbox" name="permiso_personas" value="1" id="permiso_personas" <?if ($this->usuario_seguimiento[0]["permiso_personas"]==1) {?>checked<?}?>>
														</p>
                                                                                                                
                                                                                                                <p>
															<label>permiso Empresas</label>
															<input type="checkbox" name="permiso_empresas" value="1" id="permiso_empresas" <?if ($this->usuario_seguimiento[0]["permiso_empresas"]==1) {?>checked<?}?>>
														</p>
                                                                                                                
                                                                                                                <p>
															<label>Permiso Brokers</label>
															<input type="checkbox" name="permiso_brokers" value="1" id="permiso_brokers" <?if ($this->usuario_seguimiento[0]["permiso_brokers"]==1) {?>checked<?}?>>
														</p>
                                                                                                                
                                                                                                                <p>
															<label>Permiso Accionistas</label>
															<input type="checkbox" name="permiso_accionistas" value="1" id="permiso_accionistas" <?if ($this->usuario_seguimiento[0]["permiso_accionistas"]==1) {?>checked<?}?>>
														</p>
                                                                                                                
                                                                                                                <p>
															<label>Permiso Archivos</label>
															<input type="checkbox" name="permiso_archivos" value="1" id="permiso_archivos" <?if ($this->usuario_seguimiento[0]["permiso_archivos"]==1) {?>checked<?}?>>
														</p>
                                                                                                                
                                                                                                                <p>
															<label>Permiso Solicitudes</label>
															<input type="checkbox" name="permiso_solicitudes" value="1" id="permiso_solicitudes" <?if ($this->usuario_seguimiento[0]["permiso_solicitudes"]==1) {?>checked<?}?>>
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