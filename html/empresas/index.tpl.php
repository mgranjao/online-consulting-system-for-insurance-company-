<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_empresa.tpl.php");
         /*$this->infopoliza = array($_SESSION["poliza"]["data"]);
         /*echo($_SESSION["poliza"]["nro_pol"]);
         print_r($_SESSION["poliza"]);*/
	?>
<input type="hidden" id="hddControlador" value="empresas">
<input type="hidden" id="hddPoliza" value="" >
<div  class="right">
	
	<div  id="" class="inside">



		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			
			<h1> Tú Póliza</h1>
			
			<div class="view-data">
			
		<!--	
		<?php
		
			

				//if(!(isset($this->infopoliza[0]->descRamo))){
					
					?>
						<a href="<?=URL?>?page=configuracion&action=contacto">
							<img src="<?=URL?>images/noinfohaypolizas.png" width="680" height="63" alt="Noinfohaypolizas">
						</a>
                                                <br/><br/>
                                                <a href="<?=URL?>index.php">
                                                    <img src="<?=URL?>images/noinfohaypolizas_volveracargar.png" width="680" height="63" alt="Noinfohaypolizas">
						</a>
					-->		
					<?php
				
				//}else{
						

					
						?>
						


                                                <div  id="view_data_poliza" >
                                                    
                                                  <br/>
                                                        
                                                        <Center> <img src="<?=URL?>images/ajax-bar-loader.gif" width="256" height="25" alt="Noinfohaypolizas"></Center> 
                                                   <br/> 
                                                  
                                                   
						<!--<div class="view-data" >
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
				
			

				<?php 
				//if(trim($this->infopoliza[0]->impValorAseg)!=""){
				?><!--
				<p>
					<label> Valor Asegurado</label> <?=number_format($this->infopoliza[0]->impValorAseg,2 ,'.', ',')?>
				</p>--
				<?
				//}
				?>
			
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
						<label> Número de RUC</label> <?=texto($this->infopoliza[0]->numDocContratante)?>
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
					
					
					
						</div>--></div>
					<?php

				//}


				?>
				
			</div>
			
		
			
			</div>

		</div>

	</div>


</div>
<div  id="" class="clear"></div>


<?php
	$this->display("html/layouts/footer.tpl.php");
?>