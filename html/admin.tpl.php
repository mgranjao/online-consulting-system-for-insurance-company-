
<?php
	$this->display("html/layouts/admin_header.tpl.php");
?>


		
		<div class="formulario_crear">
			
			<div class="header_box"></div>
			<div class="body_box">
				
				<div class="inside">
					
					<h1>Ingreso  Administrador Consulta en Línea</h1>
					
					
					
					<div class="form_login">
						
						
						
						<div class="box_login">
							
							
							<form action="<?=URL?>?page=login_admin" method="POST" class="login_admin" accept-charset="utf-8">
								
								<fieldset id="ingreso_a_administrado_de_consulta_en_línea" class="">
									<legend>Ingreso a Administrador de Consulta en Línea</legend>

									<p>
										Ingrese los datos de autenticación:
									</p>
									
									<p>
										<label>Usuario:</label>
										<input type="text" name="usuario" value="" id="usuario" class="required">
									</p>
									
									
									<p>
										<label>Contraseña:</label>
										<input type="password" name="contrasena" value="" id="contrasena" class="required">
									</p>
									
									<p align="center">
										<input type="submit" name="some_name" value="Entrar" id="some_name">
									</p>
									
								</fieldset>

								
							</form>
							
						</div>
						
						
						
						
					</div>
					
					
					
					
				</div>
				
				
			</div>
			<div class="footer_box"></div>
			
		</div>


<?php
	$this->display("html/layouts/admin_footer.tpl.php");
?>