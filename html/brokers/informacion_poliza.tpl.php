<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_brokers.tpl.php");
	?>

<div  class="right">
	
	<div  id="" class="inside">

		

		<div  id="" class="data">
			
			<div  id="" class="inside">
				
				<h1> Información Póliza</h1>
				
				<?php

				if(!(isset($this->infopoliza[0]->descRamo))){
					
					?>
						<a href="<?=URL?>?page=configuracion&action=contacto">
							<img src="<?=URL?>images/noinfohaypolizas.png" width="680" height="63" alt="Noinfohaypolizas">
						</a>
						
					<?php
					
				}else	{



							?>

								
						
							
							
							


							<div class="view-data">
					<p>
									<label>Seguro Contratado</label> <?=texto($this->infopoliza[0]->descRamo)?>
								</p>

								<p>
									<label>Nº de póliza</label> <?=texto($this->infopoliza[0]->numeroPoliza)?>
								</p>

								

									<p>
						<label> Inicio de Vigencia</label> <?=texto($this->infopoliza[0]->inicioVigencia)?>
					</p>

					<p>
						<label> Fin de Vigencia</label> <?=texto($this->infopoliza[0]->finVigencia)?>
					</p>




					<?php 
					if(trim($this->infopoliza[0]->numDocAseg)!=""){
					?>

					<p>
						<label> Cédula</label> <?=texto($this->infopoliza[0]->numDocAseg)?>
					</p>
					<?
					}
					?>


<!--
					<?php 
					if(trim($this->infopoliza[0]->impValorAseg)!=""){
					?>
					<p>
						<label> Valor Asegurado</label> <?=number_format($this->infopoliza[0]->impValorAseg,2 ,'.', ',')?>
					</p>
					<?
					}
					?>
-->
					<?php 
					if(trim($this->infopoliza[0]->pPago)!=""){
					?>
					<p>
						<label> Forma de Pago</label> <?=texto($this->infopoliza[0]->pPago)?>
					</p>
					<?
					}
					?>

					<?php 
					if(trim($this->infopoliza[0]->estadoPoliza)!=""){
					?>
					<p>
						<label> Estado de Póliza</label> <?=texto($this->infopoliza[0]->estadoPoliza)?>
					</p>
					<?
					}
					?>




						<?php 
						if(trim($this->infopoliza[0]->nombreContratante)!=""){
						?>
						<h1> Datos del Contratante</h1>

						<p>
							<label> Contratante</label> <?=texto($this->infopoliza[0]->nombreContratante)?>
						</p>

						<p>
							<label> Número de Ruc</label> <?=texto($this->infopoliza[0]->numDocContratante)?>
						</p>

						<?
						}
						?>

						<?php 
						if(trim($this->infopoliza[0]->nombreAseg)!=""){
						?>

						<h1>Datos del Asegurado</h1>

						<p>
						<label> Asegurado</label> <?=texto($this->infopoliza[0]->nombreAseg)?>
						</p>

						<p>
							<label> Número de cédula / RUC </label> <?=texto($this->infopoliza[0]->numDocAseg)?>
						</p>

						<?
						}
						?>


							<?php 
							if(trim($this->infopoliza[0]->ocupacion)!=""){
							?>
							<p>
								<label> Ocupación</label> <?=texto($this->infopoliza[0]->ocupacion)?>
							</p>
							<?
							}
							?>


							<?php 
							if(trim($this->infopoliza[0]->condicion)!=""){
							?>
							<p>
								<label> Condición</label> <?=texto($this->infopoliza[0]->condicion)?>
							</p>
							<?
							}
							?>



							</div>
						<?php

					}


					?>
				
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