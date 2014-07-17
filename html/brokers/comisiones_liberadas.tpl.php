<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_brokers.tpl.php");
	?>

	<div  class="right">

		<div  id="" class="inside">

			<?php
				$this->display("html/layouts/menu_brokers_comisiones_liberadas.tpl.php");
			?>

			<div  id="" class="clear"></div>

			<div  id="" class="data">

				<div  id="" class="inside">

				<h1>Comisiones Liberadas</h1>
				
				<?php
				//12/03/2013
				
				if(count($this->facturaciones)!=0){

				$ban=0;
				foreach($this->facturaciones as $key=>$value){
						if((!(is_int($key)))&&($ban==0)){
							$this->facturaciones=array($this->facturaciones);
							$ban=1;
						}
				}


				}
				
			
	           
				
				//if(0==0){
				?>
				
				
				
				<ul class="imprimir">

					<li><a href="<?=URL?>?page=empresas&action=facturacion&format=excel" class="exportar">Exportar</a></li>
					<li><a href="<?=URL?>?page=empresas&action=facturacion&format=print" class="print">Imprimir</a></li>
					<div class="clear"></div>
				</ul>


				<form action="<?=URL?>?page=empresas&action=facturacion" class="form_valida" method="POST" accept-charset="utf-8">

				<div  id="" class="buscar">

					<ul>
						<li class="space">Elegir por fecha </li>
						 
						<li> <label>Desde: </label> <input type="text" name="desde" value="<?=$this->mostrar_fecha_inicio?>" class="datepicker_fact required" id="desde"> </li>
						
						<li> <label>Hasta: </label>  <input type="text" name="hasta" value="<?=$this->mostrar_fecha?>" class="datepicker_fact required" id="hasta">  </li>
						<li> <input type="submit" name="this" value="Actualizar" id="this"> </li>
                                                <li><label>Total: (Comisiones Liberadas)</label></li>
                                                <li class="space"> <?=number_format($this->total,2 ,',', '.')?> </li>
						<div class="clear"></div>
					</ul>

				</div>

				</form>


				<div class="clear"></div>
			
				
				<div class="datatable">
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_liberadas">

						<thead>
							<tr>
								<th>Fecha Pago</th>
								<th>Suc-Ramo-Pol-Endoso-NºCuota</th>
								<th>Factura</th>
								<!--<th>Prima Total</th>-->
								<th>Prima Neta</th>
								<th>Comisión</th>
								
								
								
								
							
							</tr>
						</thead>
						<tbody>
						
						<?php
						if(count($this->facturaciones)>0){
						?>
									<?php 
								for($i=0;$i<count($this->facturaciones);$i++){

									if($this->facturaciones[$i]->fechaCobroPago!=""){
										
										
										$fecha=explode("/",$this->facturaciones[$i]->fechaCobroPago);
										$fecha_text=$fecha[2]."-".$fecha[1]."-".$fecha[0];
										
										?>
										
									

										<tr>
										
										<td><?=$fecha_text?></td>
										<td class="alinear-cen"><?=$this->facturaciones[$i]->poliza?></td>
										<td class="alinear-der"><?=$this->facturaciones[$i]->numFactura?></td>		
										<!--<td><?=number_format($this->facturaciones[$i]->impPrimaTotal,2 ,',', '.')?></td>-->
										<td class="alinear-der"><?=number_format($this->facturaciones[$i]->impPrima,2 ,',', '.')?></td>
										<td class="alinear-der"><?=number_format($this->facturaciones[$i]->impComisNormal,2 ,',', '.')?></td>
						
										</tr>

										<?									

									}

									}
									?>
									
									<?php
									}
									?>

						</tbody>
					</table>
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