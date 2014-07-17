
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
									
										<h4>Agregar Pólizas Colectivas</h4>
										
									
										<div class="formulario">
											
											

											
												
												
												
												
												
												
												
                                                                                                    
												
												
													<form action="<?=URL?>?page=administrador&action=insert_polizas_colectivas" method="POST" class="default_form" accept-charset="utf-8" enctype="multipart/form-data">

													<p>
															<label>Cantidad de Pólizas a cargar al sistema: <span class="campo_obligatorio">*</span> </label>
															<input type="text" name="cantidad_polizas" value="0" id="cantidad_polizas" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" onselectstart="return false" autocomplete="off">    
                                                                                                                            
											                </p>
                                                                                                                <input type="hidden" name="valido_nro_poliza" value="0" id="valido_nro_poliza" >
                                                                                                                <div name="div_error_polizas_colectivas" id="div_error_polizas_colectivas"> </div>
														
                                                                                                                <div name="div_polizas_colectivas" id="div_polizas_colectivas"> </div>
                                                                                                                
                                                                                                                 <!--<p align="center"><input type="button" name="validar_polizas" value="Validar Pólizas" id="validar_polizas" ></p>-->
                                                                                                                
                                                                                                                 <div name="div_submit_polizas_colectivas" id="div_submit_polizas_colectivas"> </div>
                                                                                                                 <p align="center"><input type="submit" value="Guardar &rarr;" id="agregar_polizas_colectivas"></p>

                                                                                                                 
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