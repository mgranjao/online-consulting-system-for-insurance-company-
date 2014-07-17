
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
											Editar información de la noticia:
										</p>
										


										
									
											<div class="formulario">




												<form action="<?=URL?>?page=administrador&action=actualizar_noticia_usuario_seguimiento" class="form_default" method="POST" accept-charset="utf-8"  enctype="multipart/form-data">
													
														<input type="hidden" name="id" value="<?=$this->noticia[0]["id"]?>" id="id">
														<p>
															<label>Titulo</label>
															<input type="text" name="titulo" value="<?=stripslashes($this->noticia[0]["titulo"])?>" class="required noticia" id="titulo">
														</p>
														
														<p>
															<label>Sección</label>
															<select name="seccion_id" id="seccion_id">
																<?php
																	for($i=0;$i<count($this->secciones);$i++){
																		?>
																		<option value="<?=$this->secciones[$i]["id"]?>"
																			<? if($this->noticia[0]["seccion_id"]==$this->secciones[$i]["id"]){
																				?>
																				selected
																				<?
																			}?>
																		><?=$this->secciones[$i]["nombre"]?></option>
																		<?
																	}
																?>	
																
															</select>
														</p>
														
														<p>
														<label>Imagen Subida:</label> <?php 
														if($this->noticia[0]["imagen"]!=""){
															?>
															 <img src="<?=$this->noticia[0]["imagen"]?>" />
															<?
														}else{
															?>
															[No hay imagen]
															<?
														}
														 ?>
														
														<div  class="clear"></div>
														</p>

														<p>
															<label>Cambiar Imagen</label>
															<input type="file" name="archivo" value="" id="archivo">
														</p>
														
														<p>
																<label>Breve</label>
																<textarea name="breve" rows="8"  class="required noticia" cols="40"><?=stripslashes($this->noticia[0]["breve"])?></textarea>
														</p>
														
														<p>
															<label>Contenido</label>
															<textarea name="contenido" rows="8"  class="required noticia" cols="40"><?=stripslashes($this->noticia[0]["contenido"])?></textarea>
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