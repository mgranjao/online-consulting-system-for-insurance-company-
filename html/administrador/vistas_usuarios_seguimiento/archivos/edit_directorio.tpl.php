
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
									
										<h4>Editar Directorio</h4>
									
									
										Editar la información del siguiente formulario:
										
										
										<div class="formulario">
											
											
											<form action="<?=URL?>?page=administrador&action=update_directorio_usuario_seguimiento" class="login_admin" method="POST" accept-charset="utf-8">

												
												
												<input type="hidden" name="id" value="<?=$this->directorio[0]["id"]?>" id="id">
												
												<p>
													<label>Nombre:</label>
													<input type="text" name="nombre" value="<?=$this->directorio[0]["nombre"]?>" id="nombre" class="required">
												</p>

												<p>
													<label>Padre del Directorio:</label>
													<select name="padre" id="padre" class="required">
														
														<option value="0" <? if($this->directorio[0]["parent_id"]=="0"){?> selected <?}?> >Ninguno</option>
														
														<?php
														for($i=0;$i<count($this->directorios);$i++){
															?>
															<option value="<?=$this->directorios[$i]["id"]?>"  <? if($this->directorio[0]["parent_id"]==$this->directorios[$i]["id"]){?> selected <?}?> ><?=$this->directorios[$i]["nombre"]?></option>
															
															
															<?
															if(count($this->directorios[$i]["hijo"])>0){
															?>
															
																<?
																for($j=0;$j<count($this->directorios[$i]["hijo"]);$j++){
																	?>
																
																	<option value="<?=$this->directorios[$i]["hijo"][$j]["id"]?>"  <? if($this->directorio[0]["parent_id"]==$this->directorios[$i]["hijo"][$j]["id"]){?> selected <?}?> >- <?=$this->directorios[$i]["hijo"][$j]["nombre"]?></option>
															
															
																
																	<?
																	if(count($this->directorios[$i]["hijo"][$j]["hijo"])>0){
																	?>
																	
																	
																		<?
																		for($a=0;$a<count($this->directorios[$i]["hijo"][$j]["hijo"]);$a++){
																		?>
																		
																			<option value="" >--<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["nombre"]?>(x)</option>
																		
																		<?
																		}
																		?>
																	
																	<?
																	}
																	?>
																
																<?
																}
																?>
															<?
															}
															?>
															
															<?
														}
														?>
														
													</select>
												</p>

												<p>
													<label>Tipo de usuario:</label>
													
													<select name="tipo_accionista_id" id="tipo_accionista_id" onchange="">
														<option value="0" <? if($this->directorio[0]["tipo_accionista_id"]=="0"){?> selected <?}?> >Todos</option>
														<?php
														for($i=0;$i<count($this->tipo_accionistas);$i++){
														?>
														<option value="<?=$this->tipo_accionistas[$i]["id"]?>" <? if($this->directorio[0]["tipo_accionista_id"]==$this->tipo_accionistas[$i]["id"]){?> selected <?}?> ><?=$this->tipo_accionistas[$i]["nombre"]?></option>
														<?}?>
														
													</select>
													
													
												</p>
												
												<p align="center"><input type="submit" value="Actualizar &rarr;"></p>
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