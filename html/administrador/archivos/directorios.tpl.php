
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
							
							
									<?php

										include 'html/layouts/message.tpl.php';


									?>


							
							
							<div class="area_trabajo">
								
								
								
								
							
								
								<div class="inside">
									
										<h4>Directorios</h4>
									
										Estructura de los archivos subidos:
										
										
										<a href="<?=URL?>?page=administrador&action=carga_archivos" class="cargar_archivo"></a>
										
										<a href="<?=URL?>?page=administrador&action=new_directorio" class="nueva_carpeta"></a>
										
										<ul class="path">
											<?php
											
										
											
											for($i=0;$i<count($this->directorios);$i++){
												?>
												<li>
													<?=$this->directorios[$i]["nombre"]?> 
													
													<?php
													switch($this->directorios[$i]["tipo_accionista_id"]){
														case 0:
														echo "(Todos)";
														break;
														case 1:
														echo "(Accionistas)";
														break;
														case 2:
														echo "(Miembros Directorio)";
														break;
													}
													?>
													
													
													<a href="<?=URL?>?page=administrador&action=editar_directorio&id=<?=$this->directorios[$i]["id"]?>"><img src="<?=URL?>images/icon_edit.png"></a>
														<a href="<?=URL?>?page=administrador&action=borrar_directorio&id=<?=$this->directorios[$i]["id"]?>" class="eliminar" title="¿Deseas eliminar el directorio ?"><img src="<?=URL?>images/delete.png"></a>
													
													
													
														<?
														if(count($this->directorios[$i]["hijo"])>0){
														?>
															<ul>
																<?
																for($j=0;$j<count($this->directorios[$i]["hijo"]);$j++){
																	?>
																	<li>
																	
																	<?=$this->directorios[$i]["hijo"][$j]["nombre"]?> 	
																	
																	
																	
																	<?php
																	switch($this->directorios[$i]["hijo"][$j]["tipo_accionista_id"]){
																		case 0:
																		echo "(Todos)";
																		break;
																		case 1:
																		echo "(Accionistas)";
																		break;
																		case 2:
																		echo "(Miembros Directorio)";
																		break;
																	}
																	?>
																	
																	
																	
																	<a href="<?=URL?>?page=administrador&action=editar_directorio&id=<?=$this->directorios[$i]["hijo"][$j]["id"]?>"><img src="<?=URL?>images/icon_edit.png"></a>
																		<a href="<?=URL?>?page=administrador&action=borrar_directorio&id=<?=$this->directorios[$i]["hijo"][$j]["id"]?>" class="eliminar" title="¿Deseas eliminar el directorio?"><img src="<?=URL?>images/delete.png"></a>
																	
																	
																	
																	
																	
																	<?
																	if(count($this->directorios[$i]["hijo"][$j]["hijo"])>0){
																	?>
																	<ul>
																		<?
																		for($a=0;$a<count($this->directorios[$i]["hijo"][$j]["hijo"]);$a++){
																		?>
																			<li>
																			
																			<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["nombre"]?>
																				
																			
																			<?php
																			switch($this->directorios[$i]["hijo"][$j]["hijo"][$a]["tipo_accionista_id"]){
																				case 0:
																				echo "(Todos)";
																				break;
																				case 1:
																				echo "(Accionistas)";
																				break;
																				case 2:
																				echo "(Miembros Directorio)";
																				break;
																			}
																			?>

																			
																			
																			
																			
																			<a href="<?=URL?>?page=administrador&action=editar_directorio&id=<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["id"]?>"><img src="<?=URL?>images/icon_edit.png"></a>
																				<a href="<?=URL?>?page=administrador&action=borrar_directorio&id=<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["id"]?>" class="eliminar" title="¿Deseas eliminar  el directorio?"><img src="<?=URL?>images/delete.png"></a>	
																			
																			
																				
																				
																				<?php
																				
																				
																				if(count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"])>0){
																					?>
																						<ul class="archivos">
																							<?php
																							for($e=0;$e<count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"]);$e++){
																								?>
																									<li>
																									<a href="<?=URL?><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"][$e]["file"]?>"><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"][$e]["titulo"]?></a>
																									
																										<?php
																										switch($this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"][$e]["tipo_accionista_id"]){
																											case 0:
																											echo "(Todos)";
																											break;
																											case 1:
																											echo "(Accionistas)";
																											break;
																											case 2:
																											echo "(Miembros Directorio)";
																											break;
																										}
																										?>
																									
																									<br>
																									<small><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"][$e]["descripcion"]?></small>
																										
																										<a href="<?=URL?>?page=administrador&action=editar_archivo&id=<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"][$e]["id"]?>" ><img src="<?=URL?>images/icon_edit.png"></a>
																										<a href="<?=URL?>?page=administrador&action=borrar_archivo&id=<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"][$e]["id"]?>" class="eliminar" title="¿Deseas eliminar el archivo?"><img src="<?=URL?>images/delete.png"></a>
																									
																									</li>
																								<?php
																							}
																							?>
																						</ul>
																					<?php
																				}
																				?>


																				<?php 

																				if(count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"])>0){
																					?>
																					<ul>
																					<?
																					for($b=0;$b<count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"]);$b++){
																						?>
																						
																							<li> 
																								<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["nombre"]?> 
																								
																									<?php
																									switch($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["tipo_accionista_id"]){
																										case 0:
																										echo "(Todos)";
																										break;
																										case 1:
																										echo "(Accionistas)";
																										break;
																										case 2:
																										echo "(Miembros Directorio)";
																										break;
																									}
																									?>
																								
																								
																								
																								<a href="<?=URL?>?page=administrador&action=editar_directorio&id=<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["id"]?>"><img src="<?=URL?>images/icon_edit.png"></a>
																							<a href="<?=URL?>?page=administrador&action=borrar_directorio&id=<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["id"]?>" class="eliminar" title="¿Deseas eliminar  el directorio?"><img src="<?=URL?>images/delete.png"></a>	
																							

																							<?php 
																							
																							if(count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["archivos"])>0){
																							?>

																							<ul class="archivos">

																									<?php 
																									for($c=0;$c<count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["archivos"]);$c++){

																										?>
																										<li>
																									<a href="<?=URL?><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["archivos"][$c]["file"]?>"><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["archivos"][$c]["titulo"]?></a>
																									
																									
																										<?php
																										switch($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["archivos"][$c]["tipo_accionista_id"]){
																											case 0:
																											echo "(Todos)";
																											break;
																											case 1:
																											echo "(Accionistas)";
																											break;
																											case 2:
																											echo "(Miembros Directorio)";
																											break;
																										}
																										?>
																									
																									
																									<br>
																									<small><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["archivos"][$c]["descripcion"]?></small>
																										
																										<a href="<?=URL?>?page=administrador&action=editar_archivo&id=<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["archivos"][$c]["id"]?>"><img src="<?=URL?>images/icon_edit.png"></a>
																										<a href="<?=URL?>?page=administrador&action=borrar_archivo&id=<?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$b]["archivos"][$c]["id"]?>" class="eliminar" title="¿Deseas eliminar el archivo?"><img src="<?=URL?>images/delete.png"></a>
																									
																									</li>
																										<?

																									}
																									?>

																							</ul>

																							<?
																							}
																							?>	

																							 </li>
																						<?
																					}
																					?>
																					</ul>
																						
																					<?

																				}

																				?>

																				
																			</li>
																			
																		<?
																		}
																		?>
																	</ul>	
																	<?
																	}
																	?>	
																	</li>
																	<?
																}
																?>
															</ul>
														<?php	
														}


													}
													?>
													
													
												</li>
											
										</ul>
									
									
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