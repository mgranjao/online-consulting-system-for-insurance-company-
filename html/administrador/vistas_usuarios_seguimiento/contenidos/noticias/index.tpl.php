
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
											Tienes <b><?=count($this->noticias)?></b> noticias registradas.
										</p>
										
										
										
										
										<a href="<?=URL?>?page=administrador&action=crear_noticia_usuario_seguimiento">Crear noticia</a>
										
										
											<div class="datatable">


													<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

														<thead>
															<tr>
																<th>ID</th>
																<th>Titulo</th>
																<th>Sección</th>
																<th>Fecha </th>
																<th>Modificar</th>
																<th>Eliminar</th>
															</tr>
														</thead>
														<tbody>

														<?php 
														for($i=0;$i<count($this->noticias);$i++){
															?>
															<tr>
																<td><?=$this->noticias[$i]["id"]?></td>
																<td><?=$this->noticias[$i]["titulo"]?></td>
																<td><?=$this->noticias[$i]["seccion_nombre"]?></td>
																<td><?=$this->noticias[$i]["fecha_create"]?></td>
																<td>
																		
																		<a href="<?=URL?>?page=administrador&action=editar_noticia_usuario_seguimiento&id=<?=$this->noticias[$i]["id"]?>">
																		<img src="<?=URL?>images/icon_edit.png" width="17" height="18" alt="Icon Edit">
																		</a>
																	
																	</td>
																	
																	<td>
																		<a href="<?=URL?>?page=administrador&action=delete_noticia_usuario_seguimiento&id=<?=$this->noticias[$i]["id"]?>"  title="¿Deseas eliminar esta noticia?" class="eliminar">
																		<img src="<?=URL?>images/delete.png"  alt="Icon Delete">
																		</a>
																	</td>
															</tr>
															<?
														}
														 ?>






														</tbody>
													</table>


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