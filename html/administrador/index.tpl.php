
<?php
	$this->display("html/layouts/admin_header.tpl.php");
?>

				

		<div class="formulario_crear">
			
	
			<div class="header_box"></div>
			<div class="body_box">
				
				<div class="inside">
					
					
					
					
					<h1>Administrador Consulta en Línea</h1>
					
					
                                        <div class="aviso">
				
			
				
				<?php
				
				if((isset($_SESSION["flash_ok"]))&&($_SESSION["flash_ok"]!="")){
					?>
						<div class="ok">
							<div class="inside">

								<?=$_SESSION["flash_ok"]?>
								
							</div>
						</div>
					<?php
					$_SESSION["flash_ok"]="";
				}
				
				?>
				
				
				<?php
				
				if((isset($_SESSION["flash_error"]))&&($_SESSION["flash_error"]!="")){
					?>
						<div class="error">
							<div class="inside">

								<?=$_SESSION["flash_error"]?>

							</div>
						</div>
					<?php
					$_SESSION["flash_error"]="";
				}
				
				?>
				
				
				
			</div>
                                        
                                        
					<div class="panel_admin">
						
						<div class="left_admin">
							
							
							<?php
								$this->display("html/layouts/admin_menu.tpl.php");
							?>
							
							
							
						</div>
						
						<div class="right_admin">
							
							
							<div class="area_trabajo">
								
								
							
				<? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>  				
								<div class="inside">
									
										<h4>Todos los usuarios</h4>
								
									
									<p>
										Listado de Usuarios registrados:
									</p>
									
				<ul class="imprimir">
                                    <li><a href="<?=URL?>?page=administrador&action=index&format=excel" class="exportar">Exportar</a></li>
                                    <div  id="" class="clear"></div>
                                </ul>
								
									
									
										<div class="datatable">


												<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

													<thead>
														<tr>
															<th>ID</th>
															<th>Cédula/RUC</th>
															<th>Email</th>
															
															
															<th>Nombres </th>
															<th>Apellidos</th>
						
															<th>Fecha de Creación</th>
															<th>Solicitudes</th>
															
															<th>Status</th>
															<th>Usuarios</th>
															<th>Tipo</th>
															<th>Modificar</th>
															
															<?php
															if($_SESSION["equivida"]["rol"]=="admin"){
															?>
															<th>Eliminar</th>
															<?php
															}
															?>
														</tr>
													</thead>
													<tbody>
														
														<?php
														
														for($i=0;$i<count($this->users);$i++){
                                                                                                                    
															?>
																<tr>
																	<td><?=$this->users[$i]["id"]?></td>
																	<td>
																	<?php
																	if(($this->users[$i]["tipo_usuario_id"]=="2")||($this->users[$i]["tipo_usuario_id"]=="3")){
																	?>
																	<?=$this->users[$i]["ruc"]?>
																	<?	
																	}else{
																	?>
																	<?=$this->users[$i]["numero_de_documento"]?>
																	
																	<?	
																	}
																	?>
																	
																	</td>
																	<td><?=$this->users[$i]["email"]?></td>
																	
																	<td><?=$this->users[$i]["primer_nombre"]." ".$this->users[$i]["segundo_nombre"]?></td>
																	<td><?=$this->users[$i]["primer_apellido"]." ".$this->users[$i]["segundo_apellido"]?></td>
													
																	<td><?=$this->users[$i]["fecha_creacion"]?></td>
                                                                                                                                        <? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>    
																	<td><a href="<?=URL?>?page=administrador&action=solicitudes&id=<?=$this->users[$i]["id"]?>"><?=$this->users[$i]["num_solicitudes"]?></a></td>
																	  <?}else{?>
                                                                                                                                        <td><a href="<?=URL?>?page=administrador&action=solicitudes_usuario_seguimiento&id=<?=$this->users[$i]["id"]?>"><?=$this->users[$i]["num_solicitudes"]?></a></td>
                                                                                                                                        <?}?>
                                                                                                                                        <td><?=$this->users[$i]["estado"]?></td>
																	<td><?=$this->users[$i]["num_usuarios"]?></td>
																	<td><?=$this->users[$i]["tipo_usuario"]?></td>
																	<td>     <? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>    
																		<a href="<?=URL?>?page=administrador&action=editar_usuario&id=<?=$this->users[$i]["id"]?>">
                                                                                                                                                    <?}else{?>
                                                                                                                                                <a href="<?=URL?>?page=administrador&action=editar_usuario_usuario_seguimiento&id=<?=$this->users[$i]["id"]?>">    
                                                                                                                                                     <?}?>
																		<img src="<?=URL?>images/icon_edit.png" width="17" height="18" alt="Icon Edit">
																		</a>
																	</td>
																	
																	<td>    
																	
																	<?php
																	if($_SESSION["equivida"]["rol"]=="admin"){
																	?>
																	
																	<? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?> 
																		<a href="<?=URL?>?page=administrador&action=delete_usuario&id=<?=$this->users[$i]["id"]?>&back=index"  title="¿Deseas eliminar este usuario?" class="eliminar">
																		<?}else{?>
                                                                                                                                                <a href="<?=URL?>?page=administrador&action=delete_usuario_usuario_seguimiento&id=<?=$this->users[$i]["id"]?>&back=index"  title="¿Deseas eliminar este usuario?" class="eliminar">    
                                                                                                                                                    <?}?>
                                                                                                                                                    <img src="<?=URL?>images/delete.png"  alt="Icon Delete">
																		</a>
																		
																		<?php
																		}
																		?>
																		
																		
																		
																	</td>
																	
																</tr>
															<?php
														}
														
														
														?>
														
													
														
													
														
										
													</tbody>
												</table>


										</div>
									
									
									
								</div>
                                                            <?}?>
								
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