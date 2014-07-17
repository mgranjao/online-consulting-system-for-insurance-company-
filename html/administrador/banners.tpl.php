
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
									
										<h4>Administrar Banners</h4>
									
										<div class="formulario">


											<form action="<?=URL?>?page=administrador&action=save_banners" class="login_admin" method="post" enctype="multipart/form-data">
									
												<p>
													Listado de Usuarios registrados:
												</p>
									
									
												<p>
													<label>Banner Accionistas</label>
													<input type="file" name="banner-<?=$this->array_datos[0]["seccion_id"]?>" value="" id="banner-<?=$this->array_datos[0]["seccion_id"]?>">
													<br>
													<?php
													if(isset($this->array_datos[0]["seccion_id"])=="4"){
														?>
															Actualmente esta imagen esta subida:  <a href="<?=URL?><?=$this->array_datos[0]["imagen"]?>"><?=$this->array_datos[0]["imagen"]?></a>
														<?php
													}
													?>
												</p>
									
												<p>
													<label>Banner Miembros de Directorio</label>
													<input type="file" name="banner-5" value="" id="banner-5">
													<br>
													<?php
													if(isset($this->array_datos[1]["seccion_id"])=="5"){
														?>
															Actualmente esta imagen esta subida:  <a href="<?=URL?><?=$this->array_datos[1]["imagen"]?>"><?=$this->array_datos[1]["imagen"]?></a>
														<?php
													}
													?>
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