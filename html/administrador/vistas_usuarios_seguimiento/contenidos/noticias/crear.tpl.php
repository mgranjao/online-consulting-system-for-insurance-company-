
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
									
									<h4>Noticias</h4>
									
								
									
										<p>
											Ingresar la noticia: 
										</p>
										
										<a href="<?=URL?>?page=administrador&action=noticias_usuario_seguimiento" class="regresar"></a>
										
											<div class="formulario">




												<form action="<?=URL?>?page=administrador&action=save_noticia_usuario_seguimiento" class="form_default" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
													
													
														<p>
															<label>Titulo</label>
															<input type="text" name="titulo" value="" class="required noticia" id="titulo">
														</p>
														
														<p>
															<label>Sección</label>
															<select name="seccion_id" id="seccion_id">
																<?php
																	for($i=0;$i<count($this->secciones);$i++){
																		?>
																		<option value="<?=$this->secciones[$i]["id"]?>"><?=$this->secciones[$i]["nombre"]?></option>
																		<?
																	}
																?>	
																
															</select>
														</p>
														
														
														<p>
															<label>Imagen:</label>
															<input name="archivo" type="file"> 
														</p>
														
														<p>
																<label>Breve</label>
																<textarea name="breve" rows="8"  class="required noticia" cols="40"></textarea>
														</p>
														
														<p>
															<label>Contenido</label>
															<textarea name="contenido" rows="8"  class="required noticia" cols="40"></textarea>
														</p>
														
														<p align="center">
															<input type="submit" name="Guardar" value="Guardar" id="Guardar">
														</p>
														
													
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