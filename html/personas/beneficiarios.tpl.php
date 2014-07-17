<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_cliente.tpl.php");
	?>

<div  class="right">
	
	<div  id="" class="inside">

		<?php
			//$this->display("html/layouts/menu_tuseguro.tpl.php");
		?>
	
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			<h1>Beneficiarios de tu seguro</h1>

				<ul class="imprimir">

				<li><a href="<?=URL?>?page=personas&action=beneficiarios&format=excel" class="exportar">Exportar</a></li>
				<li><a href="<?=URL?>?page=personas&action=beneficiarios&format=print" target="_blank" class="print">Imprimir</a></li>
				<div  id="" class="clear"></div>
				
			</ul>

			
			<p>
				Tienes registradas a las siguientes personas:
			</p>

				<?php 

							if(count($this->lista_beneficios)!=0){

							$ban=0;
							foreach($this->lista_beneficios as $key=>$value){
									if((!(is_int($key)))&&($ban==0)){
										$this->lista_beneficios=array($this->lista_beneficios);
										$ban=1;
									}
							}


							}

							?>
		
		
			
			
		
		
				
			<div class="datatable">
			
			
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

						<thead>
							<tr>
								<th>Nombre</th>
								<th>Fecha inicio</th>
								<th>Parentesco</th>
								<th>Porcentaje de beneficio</th>
								<th>Tipo de beneficiario</th>
							</tr>
						</thead>
						<tbody>

							<?php 
						
							for($i=0;$i<count($this->lista_beneficios);$i++){
								
								
								$this->lista_beneficios[$i]->nombre=str_replace("Ð","Ñ",$this->lista_beneficios[$i]->nombre);
								
								
								
								if(!(isset($this->lista_beneficios[$i]->fechaBaja))){
								?>

								<tr>
									<td class="alinear-izq"><?=$this->lista_beneficios[$i]->nombre?></td>
									<td class="alinear-cen"><?=$this->lista_beneficios[$i]->fechaAlta?></td>
									<td class="alinear-cen"><?=$this->lista_beneficios[$i]->parentesco?></td>
									<td class="alinear-cen"><?=$this->lista_beneficios[$i]->pjePartic?>&nbsp;%</td>
									<td class="alinear-izq"><?=$this->lista_beneficios[$i]->tipoBeneficiario?></td>
								</tr>
								<?
								}
							}

							?>

						<tbody>

							
						</tbody>
					</table>
					
                    <div class="aclaratoria">
            		<div class="recuerde">Recuerda:</div>
                    <ul>
            		<li>Para cambiar beneficiarios o su porcentaje de beneficio debes acercarte a nuestras oficinas con una carta firmada por el asegurado explicando el cambio requerido (porcentaje y parentesco).</li>
                    <li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20beneficiarios%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
                    </ul>
            		</div>
				
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