
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
									
										<h4>Crear Directorio</h4>
									
									
										Ingrese la información del nuevo directorio:
										
										
										<div class="formulario">
											
											
											<form action="<?=URL?>?page=administrador&action=save_directorio" class="login_admin" method="POST" accept-charset="utf-8">


												<p>
													<label>Nombre:</label>
													<input type="text" name="nombre" value="" id="nombre" class="required">
												</p>

												<p>
													<label>Padre del Directorio:</label>
													<select name="padre" id="padre" class="required">
														
														<option value="0">Ninguno</option>
														
														<?php
														for($i=0;$i<count($this->directorios);$i++){
															?>
															<option value="<?=$this->directorios[$i]["id"]?>"><?=$this->directorios[$i]["nombre"]?></option>
															
															
															<?
															if(count($this->directorios[$i]["hijo"])>0){
															?>
															
																<?
																for($j=0;$j<count($this->directorios[$i]["hijo"]);$j++){
																	?>
																
																	<option value="<?=$this->directorios[$i]["hijo"][$j]["id"]?>">- <?=$this->directorios[$i]["hijo"][$j]["nombre"]?></option>
															
															
																
																	<?
																	if(count($this->directorios[$i]["hijo"][$j]["hijo"])>0){
																	?>
																	
																	
																		<?
																		for($a=0;$a<count($this->directorios[$i]["hijo"][$j]["hijo"]);$a++){
																		?>
																		
																			<option value="<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["id"]?>">--<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["nombre"]?> (<?=count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"])?>)</option>
																		
																			<?
																			if(count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"])>0){
																			?>

																				<?
																				for($b=0;$b<count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"]);$b++){
																				?>
																				<option value="">---<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["nombre"]?> (<?=count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["archivos"])?>)</option>		
																				<?
																				}
																				?>
																			<?
																		}



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
														<option value="0">Todos</option>
														<?php
														for($i=0;$i<count($this->tipo_accionistas);$i++){
														?>
														<option value="<?=$this->tipo_accionistas[$i]["id"]?>"><?=$this->tipo_accionistas[$i]["nombre"]?></option>
														<?}?>
														
													</select>
													
													
												</p>
												<p align="center"><input type="submit" value="Crear &rarr;"></p>
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