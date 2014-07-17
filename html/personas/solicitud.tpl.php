<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_cliente.tpl.php");
	?>

<div  class="right">
	
	<div  id="" class="inside">

		<?php
			//$this->display("html/layouts/menu_estado_de_cuenta.tpl.php");
		?>
	
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			<h1>Solicitar Estado de Cuenta</h1>
			
			<p>
				Si necesitas que te enviemos un estado de cuenta impreso o por correo electrónico, solicítalo a través del siguiente formulario. 
			</p>
			
			<div class="formulario">
					<form action="<?=URL?>?page=personas&action=solicitud" method="POST" accept-charset="utf-8">
						
						
						
						
					
						<p>
							<label>Nº de Póliza</label>
							<input type="text" name="n_poliza" value="<?=$_SESSION["poliza"]["nro_pol"]?>" id="n_poliza">
						</p>
						
						<p>
							<label>Cédula Asegurado</label>
							<input type="text" name="cedula_asegurado" value="<?=$_SESSION["equivida"]["cedula"]?>" id="cedula_asegurado">
						</p>
						
						<p>
							Periodo: selecciona el periodo del que deseas el estado de cuenta
						</p>
						
						<p>
							<label>Desde</label>
							<input type="text" name="desde" value="" class="datepicker" id="desde_poliza">
						</p>
						
						<p>
							<label>Hasta</label>
							<input type="text" name="hasta" value="" class="datepicker"  id="hasta_poliza">
						</p>
						
						<p>
							<label>Envío</label>
							<input type="checkbox" name="envio" value="email" id="envio" class="donde_envio"> Correo Electrónico 
							
							<input type="checkbox" name="envio" value="impreso" id="envio" class="donde_envio"> Impreso
							
						</p>
						
						<p>
							<label>Email</label>
							<input type="text" name="email" value="<?=$_SESSION["equivida"]["bd"]["email"]?>" id="n_poliza">
							
						</p>
						
						<p>
							<label>Dirección</label>
							<input type="text" name="direccion" value="" id="direccion">
							
						</p>
						

						<p align="center"><input type="submit" value="Enviar &rarr;"></p>
					</form>
					
			</div>
		
			
			
			<div class="clear"></div>
			
			</div>

		</div>

	</div>


</div>
<div  id="" class="clear"></div>


<?php
	$this->display("html/layouts/footer.tpl.php");
?>