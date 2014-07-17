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
			
			<h1>Coberturas de tu seguro</h1>

				<ul class="imprimir">

				<li><a href="<?=URL?>?page=personas&action=coberturas&format=excel" class="exportar">Exportar</a></li>
				<li><a href="<?=URL?>?page=personas&action=coberturas&format=print" target="_blank" class="print">Imprimir</a></li>

				<div  id="" class="clear"></div>
			
			</ul>
			
			
		
			
			<p>
				Tu seguro te brinda las siguientes coberturas:
			</p>

			<?php 

					if(count($this->coberturas)!=0){
					
					$ban=0;
						foreach($this->coberturas as $key=>$value){
							if((!(is_int($key)))&&($ban==0)){
									$this->coberturas=array($this->coberturas);
									$ban=1;
							}
						}

					}
					
					?>	
			
			
					<?php 

					$categoria=0;

					foreach($this->coberturas[0] as $key=>$value){
							if($key=="cod_ind_categ"){
								$categoria=1;
							}
						}


					 ?>
			
			
			<div class="datatable">
			
			
					
					<?php 


					

					$categoria=0;

					foreach($this->coberturas[0] as $key=>$value){
							if($key=="cod_ind_categ"){
								$categoria=1;
							}
						}


					 ?>

					 <?php 

					 if($categoria==0){

					  ?>
					
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

						<thead>
							<tr>
								<th>Cobertura</th>
								<th class="der-nopadding">Valor asegurado</th>
								<th class="der-nopadding">Vencimiento</th>
								<th class="der-nopadding">Cuota de pago</th>
							</tr>
						</thead>
						<tbody>

							<?php 

							for($i=0;$i<count($this->coberturas);$i++){
								?>

								<tr>
									<td class="alinear-izq"><?=$this->coberturas[$i]->cobertura?></td>
									<td class="alinear-der">$ <?=number_format($this->coberturas[$i]->imp_capital,2,',', '.')?></td>
									<td class="alinear-der"><?=$this->coberturas[$i]->fec_vto?></td>
									<td class="alinear-der">$ <?=number_format($this->coberturas[$i]->imp_prima,2 ,'.', ',')?></td>
								</tr>
								<?
							}

							?>


						</tbody>
					</table>
                   
                    
					<?php 
					}else{
					?>
					

					<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

						<thead>
							<tr>
								<th>Categoría</th>
								<th>Descripción</th>
								<th>Valor asegurado</th>
								<th>Tasa</th>
							</tr>
						</thead>
						<tbody>

							<?php 

							for($i=0;$i<count($this->coberturas);$i++){
								?>

								<tr>
									<td class="alinear-izq"><?=$this->coberturas[$i]->txt_desc_categ?></td>
									<td class="alinear-izq"><?=$this->coberturas[$i]->txt_desc2?></td>
									<td class="alinear-der"><?=number_format($this->coberturas[$i]->imp_suma_aseg,2,'.', ',')?></td>
									<td class="alinear-der"><?=number_format($this->coberturas[$i]->pje_tasa,2 ,'.', ',')?></td>
								</tr>
								<?
							}

							?>

							
						</tbody>
					</table>



					<?
					} 
					?>

			</div>
			
			<div class="aclaratoria">
            <div class="recuerde">Recuerda:</div>
            <ul>
            <li>El valor de tu <b>Cuota de Pago</b> o <b>Prima</b> se encuentra establecido en la póliza de acuerdo al tiempo de periodicidad convenido.</li>
            <li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20coberturas%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
            </ul>
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