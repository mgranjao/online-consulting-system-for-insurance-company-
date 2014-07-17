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
			
			
			<h1> Correo Electrónico </h1>
			
				<div class="formulario">
					
					<p>
						Actualizar el correo electrónico:
						<br>
						<span class="campo_obligatorio">(Campo Obligatorio *)</span>
					</p>
					

				
					
				
					<form action="<?=URL?>?page=configuracion&action=actualizar_correo" method="POST" id="form_email" class="form_valida" accept-charset="utf-8">
						
						
						<input type="hidden" name="status" value="nuevo_email" id="status">
						
						<input type="hidden" name="id" value="<?=$this->correo[0]["id"]?>" id="id">
						
						<p>
								<label>Tipo Dirección <span class="campo_obligatorio">*</span> </label>
								<select name="tipo_direccion" id="tipo_direccion" class="required" >
									<option value="">Seleccionar</option>
									<option value="TRABAJO" <? if($this->correo[0]["tipo"]=="TRABAJO"){ ?> selected <?}?> >Trabajo</option>
									<option value="PERSONAL" <? if($this->correo[0]["tipo"]=="PERSONAL"){ ?> selected <?}?> >Personal</option>
								</select>
						</p>
						

						<p>
							<label>E-mail <span class="campo_obligatorio">*</span> </label>
							<input type="text" name="email" value="<?=$this->correo[0]["email"]?>" id="email" class="required email">
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