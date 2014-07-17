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
			
			
			<h1> Direcciones / Editar </h1>
			
			
			<div class="formulario">
					
					<p>
						Ingresa los datos de ubicación de tu domicilio o lugar de trabajo.
						<br>
						<span class="campo_obligatorio">(Campo Obligatorio *)</span>
					</p>


					
					
				
					<form action="<?=URL?>?page=configuracion&action=actualizar_direccion" method="POST" class="form_valida" accept-charset="utf-8">
						
						
						<input type="hidden" name="status" value="nueva_direccion" id="status">
						
						<input type="hidden" name="id" value="<?=$this->direccion[0]["id"]?>" id="id">
						
						<p>
								<label>Tipo Dirección <span class="campo_obligatorio">*</span> </label>
								<select name="tipo_direccion" id="tipo_direccion" class="required" >
									<option value="">Seleccionar</option>
									<option value="DOMICILIO" <? if($this->direccion[0]["tipo"]=="DOMICILIO"){?> selected <?}?> >Domicilio</option>
									<option value="TRABAJO" <? if($this->direccion[0]["tipo"]=="TRABAJO"){?> selected <?}?>>Trabajo</option>
								</select>
						</p>
						

						<p>
							<label>Ciudad <span class="campo_obligatorio">*</span> </label>
							<input type="text" name="ciudad" value="<?=$this->direccion[0]["ciudad"]?>" id="ciudad" class="required">
						</p>

						<p>
							<label>Cantón <span class="campo_obligatorio">*</span> </label>
							<input type="text" name="canton" value="<?=$this->direccion[0]["canton"]?>" id="canton" class="required">
						</p>

						<p>
							<label>Provincia <span class="campo_obligatorio">*</span> </label>
							
							<select name="provincia_id" id="provincia_id" class="required" >
								
								<option value="">Seleccionar</option>
								
								<?php

								for($i=0;$i<count($this->provincias);$i++){
									?>
									<option value="<?=$this->provincias[$i]["id"]?>" <? if($this->provincias[$i]["id"]==$this->direccion[0]["provincia_id"]){ ?> selected <?}?> ><?=$this->provincias[$i]["nombre"]?></option>
									<?php
								}

								?>						
							</select>
							
						
						</p>
						
						<p>
							<label>Calle principal <span class="campo_obligatorio">*</span> </label>
							<input type="text" name="calle_principal" value="<?=$this->direccion[0]["calle_principal"]?>" id="calle_principal" class="required">
							
						</p>
						
						<p>
							<label>Calle Secundaria <span class="campo_obligatorio">*</span> </label>
							<input type="text" name="calle_secundaria" value="<?=$this->direccion[0]["calle_secundaria"]?>" id="calle_secundaria" class="required">
							
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