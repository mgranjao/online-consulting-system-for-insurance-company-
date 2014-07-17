	<?php
		$this->display("html/layouts/header.tpl.php");
	?>


	<?php
	
	
	switch($_SESSION["equivida"]["rol"]){
		
		case "persona":
			$this->display("html/layouts/menu_cliente.tpl.php");
		break;
		case "empresa":
			$this->display("html/layouts/menu_empresa.tpl.php");		
		break;
		case "brokers":
			$this->display("html/layouts/menu_brokers.tpl.php");
		break;
		case "accionista":
			$this->display("html/layouts/menu_accionista.tpl.php");
		break;
		
	}
	
	
	?>
	
	
	

<div  class="right">
	
	
	<?php
		
		include 'html/layouts/message.tpl.php';
		
		
	?>


	<div  id="" class="inside">

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			
			<h1> Teléfono </h1>
			
				<div class="formulario">
					
					<p>
						Actualizar el correo electrónico:
						<br>
						<span class="campo_obligatorio">(Campo Obligatorio *)</span>
					</p>
					

				
					
				
					<form action="<?=URL?>?page=configuracion&action=actualizar_telefono" method="POST" id="form_telefonos" class="form_valida" accept-charset="utf-8">
						
						
						<input type="hidden" name="status" value="nuevo_telefono" id="status">
						
						<input type="hidden" name="id" value="<?=$this->telefono[0]["id"]?>" id="id">
						
						<p>
								<label>Tipo Teléfono <span class="campo_obligatorio">*</span> </label>
								<select name="tipo" id="tipo" class="required" >
									<option value="">Seleccionar</option>
									<option value="MOVIL" <? if($this->telefono[0]["tipo"]=="MOVIL"){ ?> selected <?}?> >MOVIL</option>
									<option value="CONVENCIONAL" <? if($this->telefono[0]["tipo"]=="CONVENCIONAL"){ ?> selected <?}?> >CONVENCIONAL</option>
								</select>
						</p>
						

						<p>
							<label>Número <span class="campo_obligatorio">*</span> </label>
							<input type="text" name="numero" value="<?=$this->telefono[0]["numero"]?>" id="numero" class="required">
						</p>

					
						
						<p align="center"><input type="submit" value="Guardar &rarr;"></p>
					</form>

				</div>	
					
			
			</div>

		</div>

	</div>


</div>
<div  id="" class="clear"></div>


<?php
	$this->display("html/layouts/footer.tpl.php");
?>