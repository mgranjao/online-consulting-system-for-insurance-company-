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

				<h1>Comisiones Pagadas</h1>

				
				
					<ul class="imprimir">

						<li><a href="<?=URL?>?page=empresas&action=comisiones_pagadas&format=excel" class="exportar">Exportar</a></li>
						<li><a href="<?=URL?>?page=empresas&action=comisiones_pagadas&format=print" class="print">Imprimir</a></li>
						<div class="clear"></div>
					</ul>


					<form action="<?=URL?>?page=empresas&action=comisiones_pagadas" class="form_valida" method="POST" accept-charset="utf-8">

					<div  id="" class="buscar">

						<ul>
							<li class="space">Elegir por fechas: </li>
							<li> <label>Desde </label> <input type="text" name="desde" value="<?=$this->mostrar_fecha_inicio?>" class="datepicker_fact required" id="desde"> </li>
							<li> <label>Hasta </label>  <input type="text" name="hasta" value="<?=$this->mostrar_fecha_fin?>" class="datepicker_fact required" id="hasta">  </li>
							<li> <input type="submit" name="this" value="Actualizar" id="this"> </li>
                                                        <li><label>Total: (Comisiones Pagadas)</label></li>
                                                        <li class="space"> <?=number_format($this->total,2 ,',', '.')?> </li>
							<div class="clear"></div>
						</ul>

					</div>

					</form>
						<div class="clear"></div>
					<?php


					if(count($this->facturaciones)!=0){

					$ban=0;
					foreach($this->facturaciones as $key=>$value){
							if((!(is_int($key)))&&($ban==0)){
								$this->facturaciones=array($this->facturaciones);
								$ban=1;
							}
					}


					}


					

						
						
				
					?>
					
					
				


					<div class="datatable">
						<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_pagadas">

							<thead>
								<tr>
									<th>Fecha Pago</th>
									<th>Sucursal</th>
									<!--<th>Nº Cuenta</th>
									<th>Banco</th>-->
									<th>Nº Comprobante</th>
									<th>Tipo de Comprobante</th>
									<!--<th>E-mail</th>-->
									<th>Valor Pagado</th>
								</tr>
							</thead>
							<tbody>

										<?php 
									
									if(count($this->facturaciones)>0){	
									
									for($i=0;$i<count($this->facturaciones);$i++){

										if($this->facturaciones[$i]->fecha!=""){
												
											$fecha=explode("/",$this->facturaciones[$i]->fecha);
											$fecha_text=$fecha[2]."-".$fecha[1]."-".$fecha[0];
											
											
											?>

											<tr>
											<td><?=$fecha_text?></td>
											<td class="alinear-cen"><?=$this->facturaciones[$i]->sucursal?></td>
											<!--<td><?=$this->facturaciones[$i]->cuentaOCheque?></td>
											<td><?=$this->facturaciones[$i]->nombreBanco?></td>-->
											<td class="alinear-cen"><?=$this->facturaciones[$i]->nroComprobante?></td>
											<td class="alinear-cen"><?=$this->facturaciones[$i]->comprobante?></td>
											<!--<td><?=$this->facturaciones[$i]->mail?></td>-->
											<td class="alinear-der"><?=number_format($this->facturaciones[$i]->valor,2 ,',', '.')?></td>

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