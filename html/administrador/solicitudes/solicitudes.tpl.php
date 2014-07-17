
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
									
										<h4>Historial de Solicitudes</h4>
										
										<p>
											Revise las solicitudes generadas por el usuario:
										</p>
					
											
											<?php
											
											switch($this->usuarios[0]["tipo_usuario_id"]){
												case "1":
												?>
												
											
												<a href="<?=URL?>?page=administrador&action=personas" class="regresar"></a>
												<?
												break;
												
												case "2":
												?>
										
												<a href="<?=URL?>?page=administrador&action=empresas" class="regresar"></a>
												<?
												break;
												
												case "3":
												?>
								
												<a href="<?=URL?>?page=administrador&action=brokers" class="regresar"></a>
												<?
												break;
												
												case "4":
												?>

												<a href="<?=URL?>?page=administrador&action=accionistas" class="regresar"></a>
												<?
												break;
												
												
											}
											
											?>
											
											
									
									<p>
										<b>Información del Usuario:</b><br><br>
										<b>Nombre Completo: </b><?=$this->usuarios[0]["primer_apellido"]?> <?=$this->usuarios[0]["segundo_apellido"]?> <?=$this->usuarios[0]["primer_nombre"]?> <?=$this->usuarios[0]["segundo_nombre"]?><br>
										<b>Número de documento: </b> <?=$this->usuarios[0]["numero_de_documento"]?><br>
										<b>Email: </b> <?=$this->usuarios[0]["email"]?><br><br>
										
										<a href="<?=URL?>?page=administrador&action=editar_usuario&id=<?=$this->usuarios[0]["id"]?>">Ver perfil del Usuario</a>
									</p>
									
									
					
									
									
									
										<div class="datatable">


												<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

													<thead>
														<tr>
															
															<th>ID</th>
															<th>Sección</th>
															<th>Póliza</th>
															<th>Acción </th>
															<th>Fecha Creación</th>
															<th>Visualizar</th>
														</tr>
													</thead>
													<tbody>
														
														<?php
														
														for($i=0;$i<count($this->solicitudes);$i++){
															
															if(($this->solicitudes[$i]["poliza"]==0)||($this->solicitudes[$i]["poliza"]=="")){
																$poliza="-";
															}else{
																$poliza=$this->solicitudes[$i]["poliza"];
															}
															
															
															
															
															?>
																<tr>
																	<td><?=$this->solicitudes[$i]["id"]?></td>
																	<td><?=$this->solicitudes[$i]["seccion"]?></td>
																	<td><?=$poliza?></td>
																	<td><?=$this->solicitudes[$i]["accion"]?></td>
																	<td><?=$this->solicitudes[$i]["fecha_create"]?></td>
																	<td> <a href="<?=URL?>?page=administrador&action=ver_solicitud&id=<?=$this->solicitudes[$i]["id"]?>"><img src="<?=URL?>images/view_solicitudes.png" width="24" height="24" alt="View Solicitudes"> </a> </td>
																</tr>
															<?php
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