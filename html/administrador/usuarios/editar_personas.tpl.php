
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
									
										<h4>Información Registrada por el Usuario</h4>
										
										<p>
											Usuario registrado el <b><?=$this->usuarios[0]["fecha_creacion"]?></b>
										</p>
										<div class="formulario">
											
											 <div class="password">
													
                                                                                        <div class="inside"></div>
                                                                                        <p>Enviar correo para recuperar password al cliente:
											</p>
											<p>
                                                                                        <form action="<?=URL?>?page=administrador&action=enviar_password_usuario" class="form_default" method="POST" accept-charset="utf-8">
                                                                                         <input type="hidden" name="email" value="<?=$this->usuarios[0]["email"]?>" id="email" class="required">
                                                                                         <p align="center"><input type="submit" value="Enviar"></p>    
                                                                                        </form>  
                                                                                        <br/>
                                                                                        </p>
                                                                                        </div>

											
											<form action="<?=URL?>?page=administrador&action=update_usuario" class="form_default" method="POST" accept-charset="utf-8">

												<input type="hidden" name="id" value="<?=$this->usuarios[0]["id"]?>" id="id">
												<input type="hidden" name="tipo_usuario" value="<?=$this->usuarios[0]["tipo_usuario_id"]?>" id="tipo_usuario">
												
												<?php
												
												switch($this->usuarios[0]["tipo_usuario_id"]){
													case 1:
													?>
													<h2>Tipo de Usuario: Persona</h2>
													<?
													break;
													
													case 2:
													?>
													<h2>Tipo de Usuario: Empresa</h2>
													<?
													break;
													
													case 3:
													?>
													<h2>Tipo de Usuario: Brokers</h2>
													<?
													break;
													
													
													case 4:
													?>
													<h2>Tipo de Usuario: Accionista</h2>
													<?
													break;
												}
												
												?>
												
												
												<div class="estado">
													
													<div class="inside">
															
															<p>
																Estado:
															</p>
															<p>
														
																<select name="estado_id" id="estado_id" class="required">

																		<?php

																		for($i=0;$i<count($this->estados);$i++){
																			?>
																			<option value="<?=$this->estados[$i]["id"]?>" 
																			<? if($this->usuarios[0]["estado_id"]==$this->estados[$i]["id"]){
																				?>
																				selected
																				<?
																			} ?>><?=$this->estados[$i]["nombre"]?></option>
																			<?
																		}

																		?>



																</select>

															</p>

														
														
													</div>
													
												</div>
												
												
												<p>
													<label>
														Primer Nombre:
													</label>
													
													<input type="text" name="primer_nombre" value="<?=$this->usuarios[0]["primer_nombre"]?>" id="primer_nombre" class="required">
													
												</p>
												
												
												<p class="impar">
													<label>
														Segundo Nombre:
													</label>
													
													<input type="text" name="segundo_nombre" value="<?=$this->usuarios[0]["segundo_nombre"]?>" id="segundo_nombre" class="">
													
												</p>
												
												
												<p>
													<label>
														Primer Apellido:
													</label>
													
													<input type="text" name="primer_apellido" value="<?=$this->usuarios[0]["primer_apellido"]?>" id="primer_apellido" class="required">
													
												</p>
												
												
												
												<p class="impar"> 
													<label>
														Segundo Apellido:
													</label>
													
													<input type="text" name="segundo_apellido" value="<?=$this->usuarios[0]["segundo_apellido"]?>" id="segundo_apellido" class="">
													
												</p>
												
												
												<p>
													<label>Tipo de Documento<span class="obligatorio">*</span> :</label>
												
													<select name="tipo_de_documento" id="tipo_de_documento" class="required">
														<option value="">Seleccione:</option>
														<option value="C" <? if($this->usuarios[0]["tipo_de_documento"]=="C"){ ?> selected <?}?> >Cédula</option>
														<option value="P" <? if($this->usuarios[0]["tipo_de_documento"]=="P"){ ?> selected <?}?> >Pasaporte</option>
													</select> 
												
												</p>
												
												<p class="impar">
													<label>
														Número Documento:
													</label>
													
													<input type="text" name="numero_de_documento" value="<?=$this->usuarios[0]["numero_de_documento"]?>" id="numero_de_documento" class="required">
													
												</p>
												
												
												<p>
													<label>
														Sexo:
													</label>
													
									
													
													<select name="sexo" id="sexo">
														<option value="">Seleccione:</option>
														<option value="M" <? if($this->usuarios[0]["sexo"]=="M"){?> selected <?}?> >Masculino</option>
														<option value="F" <? if($this->usuarios[0]["sexo"]=="F"){?> selected <?}?> >Femenino</option>
													</select>
													
													
												</p>
												
												
												
												
												
												
												
												
												
												<p class="impar">
													<label>
														E-mail:
													</label>
													
													<input type="text" name="email" value="<?=$this->usuarios[0]["email"]?>" id="email" class="required">
													
												</p>
												
												
													<p>
														<label>
															Password:
														</label>

														<input type="text" name="password" value="<?=$this->usuarios[0]["forget"]?>" id="password" class="required">

													</p>
												
												
											
													<!-- 
													<p>
														<label>
															Tipo de Usuario
														</label>
														
														<select name="tipo_usuario_id" id="tipo_usuario_id" >
														<?php
														
														for($i=0;$i<count($this->tipousuarios);$i++){
															?>
															<option value="<?=$this->tipousuarios[$i]["id"]?>" 
															<? if($this->usuarios[0]["tipo_usuario_id"]==$this->tipousuarios[$i]["id"]){
																?>
																selected
																<?
															} ?>><?=$this->tipousuarios[$i]["nombre"]?></option>
															<?
														}
														
														?>
														</select>
														

													</p>
													
													-->
													
													
													
													
													
														<div class="direcciones_list">

															<div class="direcciones_left">
																<label>Dirección:</label>
															</div>

															<div class="direcciones_right">

																<?php

																		for($i=0;$i<count($this->direcciones);$i++){
																			?>
																				<?=$this->direcciones[$i]["calle_principal"]?> / <?=$this->direcciones[$i]["calle_secundaria"]?>, <?=$this->direcciones[$i]["ciudad"]?> (<?=$this->direcciones[$i]["tipo"]?>) 


																				<a href="<?=URL?>?page=configuracion&action=editar_direccion&id=<?=$this->direcciones[$i]["id"]?>"><img src="<?=URL?>images/icon_edit.png"></a>
																				<a href="<?=URL?>?page=configuracion&action=borrar_direccion&id=<?=$this->direcciones[$i]["id"]?>" class="eliminar" title="¿Deseas eliminar la dirección?"><img src="<?=URL?>images/delete.png"></a> <br>
																			<?php
																		}
																		?>


																<?php 
																if(count($this->direcciones)==0){
																	?>
																	No tiene direcciones registradas
																	<?
																}
																?>


															</div>

															<div class="clear"></div>


													</div>
													
													
													
														<div class="direcciones_list impar">

																<div class="direcciones_left">
																	<label>Teléfonos:</label>
																</div>

																<div class="direcciones_right">

																	<?php

																			for($i=0;$i<count($this->telefonos);$i++){
																				?>
																					<?=$this->telefonos[$i]["numero"]?> (<?=$this->telefonos[$i]["tipo"]?>)


																					<a href="<?=URL?>?page=configuracion&action=editar_telefono&id=<?=$this->telefonos[$i]["id"]?>"><img src="<?=URL?>images/icon_edit.png"></a>
																					<a href="<?=URL?>?page=configuracion&action=borrar_telefono&id=<?=$this->telefonos[$i]["id"]?>" class="eliminar" title="¿Deseas eliminar la dirección?"><img src="<?=URL?>images/delete.png"></a> <br>
																				<?php
																			}
																			?>


																	<?php 
																	if(count($this->telefonos)==0){
																		?>
																		No tiene teléfonos registradas
																		<?
																	}
																	?>


																</div>

																<div class="clear"></div>


														</div>
														<div class="direcciones_list">

															


																<div class="direcciones_left">
																	<label>E-mail:</label>
																</div>

																<div class="direcciones_right">

																	<?php			
																	for($i=0;$i<count($this->correos);$i++){
																	?>
																	<?=$this->correos[$i]["email"]?>  (<?=$this->correos[$i]["tipo"]?>)
																	<br>

																	<?
																	}
																	?>

																	<?php 
																	if(count($this->correos)==0){
																		?>
																		No tiene correos registrados<br>
																		<?
																	}  
																	?>

																</div>
																<div class="clear"></div>
														
														</div>
													
													
													
													
													
														
															<p align="center"><input type="submit" value="Actualizar Datos&rarr;"></p>


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