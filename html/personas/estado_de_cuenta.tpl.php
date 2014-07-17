<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php   
		$this->display("html/layouts/menu_cliente.tpl.php");
	?>

<div  class="right">
	
	<?php
		
		include 'html/layouts/message.tpl.php';
		
		
	?>
	
	
	
	<div  id="" class="inside">

		<?php
			//$this->display("html/layouts/menu_estado_de_cuenta.tpl.php");


		?>
	
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			<h1>Estado de Cuenta</h1>
			
			<?php
			if($_SESSION["poliza"]["cod_ramo"]=="59"||$_SESSION["poliza"]["cod_ramo"]=="58"||$_SESSION["poliza"]["cod_ramo"]=="55"){
				?>
				
				<a class="solicitud box boxEstCta">Solicita tu Estado de Cuenta</a>
				
				
				<?
			}
			?>
				
				
				<?php
				if($_SESSION["poliza"]["cod_ramo"]=="59"){
					
					?>
					
						<ul class="imprimir">
							
							<!--
							<li><a href="?page=personas&action=estado_de_cuenta&format=excel" class="exportar">Exportar</a></li>
							-->
							
							<li><a href="<?=URL?>?page=personas&action=estado_de_cuenta&format=print" target="_blank" class="print">Imprimir</a></li>
							<div  id="" class="clear"></div>
							
						</ul>


						<!--<p>texto intro
						</p>-->
						
					
						<div class="view-data">
								
									

								<?php 




								if(count($this->estado_de_cuenta)!=0){

								$ban=0;
								foreach($this->estado_de_cuenta as $key=>$value){
										if((!(is_int($key)))&&($ban==0)){
											$this->estado_de_cuenta=array($this->estado_de_cuenta);
											$ban=1;
										}
								}


								}
								
								
								
								if(count($this->estado_de_cuenta)>0){
									
										$total=count($this->estado_de_cuenta);
										$pos=$total-1;
										
										
									
									?>
												<p>
													<label>Valor asegurado</label>
													$ <?=number_format($this->estado_de_cuenta[$pos]->impSumaAseg,2,'.', ',')?>
												</p>	


												<p>
												<label><abbr class="verinfo" title="Es el saldo de la cuenta individual a la fecha de generación del estado de cuenta.">Saldo Cuenta Individual <span class="pregunta_signo">¿?</span>  </abbr></label>
                                                                                                <?=number_format($this->estado_de_cuenta[$pos]->impSaldoFinal,2 ,'.', ',')?>

											</p>

												<p>
													<label><abbr class="verinfo" title="Es el valor que se disminuye del saldo de la cuenta individual en el caso que se solicite un valor de rescate o retiro.">Cargos por Rescate <span class="pregunta_signo">¿?</span> </abbr></label>
                                                                                                        <?=number_format($this->estado_de_cuenta[$pos]->impRescateCobBasica,2 ,'.', ',')?>
												</p>

											<!--<p>
												<label><abbr class="verinfo" title="Es el monto a disposición del asegurado en el caso de cancelar la póliza.">Valor del Rescate Total  <span class="pregunta_signo">¿?</span> </abbr></label>
												<?=number_format($this->estado_de_cuenta[$pos]->impRescateTotal,2 ,'.', ',')?>
											</p>


											<p>
												<label>Saldo Préstamo</label>
												<?=number_format($this->estado_de_cuenta[$pos]->saldoDeudaPorPrestamo,2 ,'.', ',');?>
											</p>-->
											

										<div class="clear"></div>


										<div class="datatable">


												<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_estadodecuenta">

													<thead>
														<tr>
															<th>Año / Mes</th>
															<th><abbr class="verinfo" title="Corresponde a los pagos realizados cada mes.">Depósitos<span class="pregunta_signo">?</span> </abbr></th>
															<th><abbr class="verinfo" title="Monto por gastos administrativos e impuestos establecidos por ley.">Gastos admin. <span class="pregunta_signo">?</span> </abbr></th>
															<th><abbr class="verinfo" title="Monto que se debita cada mes por costos propios de la póliza.">Deducción mensual <span class="pregunta_signo">?</span> </abbr></th>
															<th><abbr class="verinfo" title="Valor acreditado mensualmente por intereses.">Interés acreditado <span class="pregunta_signo">?</span> </abbr></th>
															<th>Tasa de interés</th>
                                                            <!-- <th>Retiros</th>
                                                            <th>Ajustes</th>-->
                                                            <th>Saldo Cuenta Individual</th>
                                                            <!-- <th>Prestamos Otorgados</th> -->
															
														</tr>
														
														
													</thead>
													<tbody>

														<?php 
													for($i=0;$i<count($this->estado_de_cuenta);$i++){

														if($this->estado_de_cuenta[$i]->fechaVigenDesde!=""){


															$this->estado_de_cuenta[$i]->impGastos=str_replace("-","",$this->estado_de_cuenta[$i]->impGastos);
															?>
															
															
															

															<tr>
															<td class="alinear-izq"><?=$this->estado_de_cuenta[$i]->aaaa_proceso?> / <?=$this->estado_de_cuenta[$i]->mm_proceso?></td>
															<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impReserva,2 ,'.', ',')?></td>
															<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impGastos,2 ,'.', ',')?></td>
															<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impDM,2 ,'.', ',')?></td>
															<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impIE,2 ,'.', ',')?></td>
															<td class="alinear-der"><?=number_format($this->estado_de_cuenta[$i]->pjeTasaInteres,2 ,'.', ',')?> %</td>
															<!--<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impRetiro,2 ,'.', ',')?></td>
                                                            <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impAjustes,2 ,'.', ',')?></td>-->
                                                            <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impDisponible,2 ,'.', ',')?></td>
                                                            <!-- <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impSaldoPrestamos,2 ,'.', ',')?></td>-->
															</tr>
															
															
															<?									

														}

														}
														?>

													</tbody>
												</table>
												
												
												
                                                                                                                                                                      
												
												
										</div>

											</div>
                                
									<?php
								
								}else{
									?>
										
										
									<?php
								}
								

								?>
								
						

						
					<?php
					
				}else{
					
                                    if($_SESSION["poliza"]["cod_ramo"]=="58"){
                                        ?>
                                
                                            <ul class="imprimir">
							
							<!--
							<li><a href="?page=personas&action=estado_de_cuenta&format=excel" class="exportar">Exportar</a></li>
							-->
							
							<li><a href="<?=URL?>?page=personas&action=estado_de_cuenta&format=print" target="_blank" class="print">Imprimir</a></li>
							<div  id="" class="clear"></div>
							
						</ul>


						<!--<p>texto intro
						</p>-->
						
					
						<div class="view-data">
								
									

								<?php 




								if(count($this->estado_de_cuenta)!=0){

								$ban=0;
								foreach($this->estado_de_cuenta as $key=>$value){
										if((!(is_int($key)))&&($ban==0)){
											$this->estado_de_cuenta=array($this->estado_de_cuenta);
											$ban=1;
										}
								}


								}
								
								
								
								if(count($this->estado_de_cuenta)>0){
									
										$total=count($this->estado_de_cuenta);
										$pos=$total-1;
									
										
									
									?>
												<p>
													<label>Valor asegurado</label>
													$ <?=number_format($this->estado_de_cuenta[$pos]->impSumaAseg,2,'.', ',')?>
												</p>	


												<p>
												<label><abbr class="verinfo" title="Es el saldo final de la cuenta aportes a la fecha de generación del estado de cuenta.">Saldo Final Cta Aportes <span class="pregunta_signo">¿?</span>  </abbr></label>
												<?=number_format($this->estado_de_cuenta[$pos]->impSaldoFinal,2 ,'.', ',')?>

											</p>

												<p>
													<label><abbr class="verinfo" title="Es el valor que se disminuye del saldo final de la cuenta en el caso que se solicite un valor de rescate o retiro.">Cargos por Rescate <span class="pregunta_signo">¿?</span> </abbr></label>
													<?=number_format($this->estado_de_cuenta[$pos]->impCargosRescateApAd,2 ,'.', ',')?>
												</p>

											<!--<p>
												<label><abbr class="verinfo" title="Es el monto a disposición del asegurado en el caso de cancelar la póliza.">Valor del Rescate Total  <span class="pregunta_signo">¿?</span> </abbr></label>
												<?=number_format($this->estado_de_cuenta[$pos]->impRescateTotal,2 ,'.', ',')?>
											</p>


											<p>
												<label>Saldo Préstamo</label>
												<?=number_format($this->estado_de_cuenta[$pos]->saldoDeudaPorPrestamo,2 ,'.', ',');?>
											</p>-->
											

										<div class="clear"></div>


										<div class="datatable">


												<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_estadodecuenta">

													<thead>
													
														<tr>
															<th>Año / Mes</th>
                                                            <th>Aporte Adicional</th>
															<th>Cargo Administrativo</th>
                                                            <th>Intereses Acreditados</th>
                                                            <th>% Rendimiento Mensual</th>                                                                                                                        
                                                            <th>Saldo Acumulado</th>
														</tr>
													
													
													</thead>
													<tbody>

														<?php 
													for($i=0;$i<count($this->estado_de_cuenta);$i++){

														if($this->estado_de_cuenta[$i]->fechaVigenDesde!=""){


															$this->estado_de_cuenta[$i]->impGastos=str_replace("-","",$this->estado_de_cuenta[$i]->impGastos);
															?>

																<tr>
																<td class="alinear-izq"><?=$this->estado_de_cuenta[$i]->aaaa_proceso?> / <?=$this->estado_de_cuenta[$i]->mm_proceso?></td>
																<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impReserva,2 ,'.', ',')?></td>
																<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impGastos,2 ,'.', ',')?></td>
																<td class="alinear-der"><?=number_format($this->estado_de_cuenta[$i]->impIE,2 ,'.', ',')?>%</td>
																<td class="alinear-der"> <?=number_format($this->estado_de_cuenta[$i]->pjeTasaInteres,2 ,'.', ',')?>%</td>																
                                                                <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impDisponible,2 ,'.', ',')?></td>
																</tr>
															
															<?									

														}

														}
														?>

													</tbody>
												</table>

												
										</div>

											</div>
                                
									<?php
								
								}else{
									?>
										
									<?php
								}

								?>
                                
                                        <?php
                                    }else{
                                        //Tablas para la poliza del Ramo 55
                                         if($_SESSION["poliza"]["cod_ramo"]=="55"){
                                          ?>  
                                
                                          <ul class="imprimir">
							
							<!--
							<li><a href="?page=personas&action=estado_de_cuenta&format=excel" class="exportar">Exportar</a></li>
							-->
							
							<li><a href="<?=URL?>?page=personas&action=estado_de_cuenta&format=print" target="_blank" class="print">Imprimir</a></li>
							<div  id="" class="clear"></div>
							
						</ul>


						<!--<p>texto intro
						</p>-->
						
					
						<div class="view-data">
								
									

								<?php 




								if(count($this->estado_de_cuenta)!=0){

								$ban=0;
								foreach($this->estado_de_cuenta as $key=>$value){
										if((!(is_int($key)))&&($ban==0)){
											$this->estado_de_cuenta=array($this->estado_de_cuenta);
											$ban=1;
										}
								}


								}
								
								
								
								if(count($this->estado_de_cuenta)>0){
									
										$total=count($this->estado_de_cuenta);
										$pos=$total-1;
									
										
									
									?>
												<!--<p>
													<label>Valor asegurado</label>
													$ <?=number_format($this->estado_de_cuenta[$pos]->impSumaAseg,2,'.', ',')?>
												</p>-->	


												<p>
												<label><abbr class="verinfo" title="Es el saldo disponible a la fecha de generación del estado de cuenta.">Saldo Disponible <span class="pregunta_signo">¿?</span>  </abbr></label>
												<?=number_format($this->estado_de_cuenta[$pos]->impSaldo,2 ,'.', ',')?>

											</p>

												<!--<p>
													<label><abbr class="verinfo" title="Es el valor que se disminuye del saldo de la cuenta individual en el caso que se solicite un valor de rescate o retiro.">Cargos por Rescate <span class="pregunta_signo">¿?</span> </abbr></label>
													<?=number_format($this->estado_de_cuenta[$pos]->impRescateCobBasica,2 ,'.', ',')?>
												</p>

											<!--<p>
												<label><abbr class="verinfo" title="Es el monto a disposición del asegurado en el caso de cancelar la póliza.">Valor del Rescate Total  <span class="pregunta_signo">¿?</span> </abbr></label>
												<?=number_format($this->estado_de_cuenta[$pos]->impRescateTotal,2 ,'.', ',')?>
											</p>


											<p>
												<label>Saldo Préstamo</label>
												<?=number_format($this->estado_de_cuenta[$pos]->saldoDeudaPorPrestamo,2 ,'.', ',');?>
											</p>-->

										<div class="clear"></div>


										<div class="datatable">


												<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_estadodecuenta">

													<thead>
															<tr>
																<th>Fecha</th>
                                                                <th>Concepto</th>
                                                                <th>Interés</th>
                                                                <th>Créditos</th>
                                                                <th>Débitos</th>
                                                                <th>Saldo</th>
															</tr>
															
															
													</thead>
													<tbody>

														<?php 
													for($i=0;$i<count($this->estado_de_cuenta);$i++){

														if($this->estado_de_cuenta[$i]->fechaVigenDesde!=""){


															$this->estado_de_cuenta[$i]->impGastos=str_replace("-","",$this->estado_de_cuenta[$i]->impGastos);
															?>
															
																	<tr>
																	<!--<td class="alinear-izq"><?=$this->estado_de_cuenta[$i]->aaaa_proceso?> / <?=$this->estado_de_cuenta[$i]->mm_proceso?></td>-->
                                                                                                                                            <?
                                                                                                                                            
                                                                                                                                            $anio = substr(trim($this->estado_de_cuenta[$i]->fechaReserva), 6, 4);
                                                                                                                                            $mes = substr(trim($this->estado_de_cuenta[$i]->fechaReserva), 3, 2); 
                                                                                                                                            $dia = substr(trim($this->estado_de_cuenta[$i]->fechaReserva), 0, 2); 
                                                                                                                                            $fechaReserva=$anio."/".$mes."/".$dia;
                                                                                                                                            ?>
																	<td class="alinear-izq"><?=$fechaReserva?></td>
                                                                        <td class="alinear-izq"><?=$this->estado_de_cuenta[$i]->txtConcepto?></td>
                                                                        <td class="alinear-der"><?=number_format($this->estado_de_cuenta[$i]->pjeInteres,2 ,'.', ',')?> %</td>
                                                                        <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impCredito,2 ,'.', ',')?></td>
                                                                        <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impDebito,2 ,'.', ',')?></td>
                                                                        <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impSaldo,2 ,'.', ',')?></td>
																	</tr>
																
															</tr>
															<?									

														}

														}
														?>

													</tbody>
												</table>
												
												
												
										</div>

											</div>
                                
									<?php
								
								}else{
									?>
										
									<?php
								}

								?>
                                          
                                
                                          <?php   
                                         }else{
                                        
					?>
					
						<p>
						Si deseas recibir un corte de tu Estado de Cuenta impreso o por correo electrónico, solicítalo a través del siguiente formulario: 
						</p>




						<div class="formulario">

							<form action="<?=URL?>?page=personas&action=estado_de_cuenta" method="POST" class="form_valida" accept-charset="utf-8">

								<input type="hidden" name="status" value="enviar" id="status">

								<p>
									<label>Nº de póliza</label>
									<input type="text" name="n_poliza" value="<?=$_SESSION["poliza"]["nro_pol"]?>" id="n_poliza" class="required" disabled>
								</p>

								<p>
									<label>Cédula asegurado</label>
									<input type="text" name="cedula_asegurado" value="<?=$_SESSION["equivida"]["cedula"]?>" class="required" id="cedula_asegurado" disabled>
								</p>

								 <p>Selecciona el período del que deseas el corte de tu estado de cuenta:</p>
                                <p>
                               <label>Período</label>
			            <input type="hidden" name="solicitud_estado_cuenta" value="1">				
                                    <input type="radio" name="periodo" value="1 mes" id="periodo" class="periodo_est required" > 1 mes 

									<input type="radio" name="periodo" value="2 meses" id="periodo"  class="periodo_est required"> 2 meses
                                    
                                    <input type="radio" name="periodo" value="3 meses" id="periodo"  class="periodo_est required"> 3 meses
								</p>

								<!--<p>
									<label>Desde</label>
									<input type="text" name="desde" value="" class="datepicker required" id="desde_poliza" >
								</p>

								<p>
									<label>Hasta</label>
									<input type="text" name="hasta" value="" class="datepicker required"  id="hasta_poliza">
								</p>-->
								
								<p>
									<label>Teléfono de contacto</label>
									<input type="text" name="n_contacto" value="" class="required" id="n_contacto">
								</p>
								

								<p>
									<label>Forma de envío</label>
									<input type="radio" name="envio" value="email" id="envio" class="donde_envio required" > Correo electrónico 

									<input type="radio" name="envio" value="impreso" id="envio"  class="donde_envio required"> Impreso

								</p>


								<div class="hidden" id="vista_email">
									

									<?php 
									if(count($this->correos)==0){
										?>
                                        <span class="error errorDatos">Debes tener un correo registrado. Puedes registrarlo en la sección <a href="<?=URL?>?page=configuracion&amp;action=datos_personales">Datos Personales</a>.</span>
										<?
									}

									 ?>
								
									
									
									<p>
										<label>Email</label>
											<select name="email" id="email">
														<?php
														for($i=0;$i<count($this->correos);$i++){
																?>
																	<option value="<?=$this->correos[$i]["email"]?>"><?=$this->correos[$i]["email"]?></option>
																<?php
														}
														?>
											</select>

									</p>


								</div>

								<div class="hidden" id="vista_direccion">

									<?php 
									if(count($this->direcciones)==0){
										?>
                                         <span class="error errorDatos">Debes tener una dirección registrada. Puedes registrarla en la sección <a href="<?=URL?>?page=configuracion&amp;action=datos_personales">Datos Personales</a>.</span>
										<?
									}

									 ?>

									<p>
										<label>Dirección</label>


										<select name="lugar_entrega" id="lugar_entrega">
													<?php
													for($i=0;$i<count($this->direcciones);$i++){
															?>
																<option value="<?=$this->direcciones[$i]["id"]?>"><?=$this->direcciones[$i]["calle_principal"]?> / <?=$this->direcciones[$i]["calle_secundaria"]?> - <?=$this->direcciones[$i]["ciudad"]?></option>
															<?php
													}
													?>
										</select>

									</p>

								</div>





								<p align="center"><input type="submit" value="Enviar &rarr;"></p>

							</form>

						</div>
					
					<?
				}
                                
                                }
                                
                                }
				
				?>
				
	
			
			<div class="clear"></div>
			
			</div>

<!--Aclaratorias-->
<div class="aclaratoria EstCta">

    <?php
if ($_SESSION["poliza"]["cod_ramo"]=="59") {?>
<div class="recuerde">Aclaraciones:</div>

<ul>
<li><b>Gastos administrativos:</b> Monto de recargo por gastos administrativos más impuestos establecidos por ley.</li>
<li><b>Deducción mensual:</b> Debito mensual de tu cuenta individual por costos propios de la póliza (amortizaciones, tasas, contribuciones o incremento en el valor asegurado).</li>
<li><b>Saldo cuenta individual:</b> Monto equivalente a tu fondo (seguro+ahorro) que se incrementa con cada cuota pagada.</li>
<li><b>Rescate Total:</b> Monto máximo de retiro en caso de cancelación de la póliza.</li>
</ul>
<?} 
?>
<div class="recuerde">Recuerda:</div>
<ul>

<?php
if ($_SESSION["poliza"]["cod_ramo"]=="59") {
    echo "<li>Retirar todo tu fondo tiene un valor de Rescate Total de: $"?><?=number_format($this->estado_de_cuenta[$pos]->impRescateTotal,2 ,'.', ',')?><?php echo ". Sin embargo en ese caso tu póliza Vida Universal se cancelará, por ello te ofrecemos asesoría especializada para darte una mejor solución sin perder tu cobertura.</li>";
} else {
    echo "";
}

if ($_SESSION["poliza"]["cod_ramo"]=="55") {
    echo "<li>El retiro de fondos antes del tiempo estipulado tiene un valor de recargo por rescate.</li>";
    echo "<li>Retirar todo tu fondo tiene un valor de Rescate Total, sin embargo en ese caso tu póliza se cancelará, por ello te ofrecemos asesoría especializada para darte una mejor solución sin perder tu cobertura.</li>";
}
?>

<li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20coberturas%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
</ul>


</div>

		</div>

	</div>


</div>



<div  id="" class="clear"></div>




<!-- Proyección Futura -->
<div style="display:none">
	<div id="box">

		<div class="header">

			<div class="inside">
				<h1>Solicita tu Estado de Cuenta</h1>
                <a class="cerrar">Cerrar</a>
			</div>

		</div>


		<div class="text textEstCta" style="height:400px;">
			
				<!--<a class="cerrar">Cerrar(x)</a>-->
				<br>
				<p>
				Completa el formulario para solicitar el corte de tu estado de cuenta impreso o por correo electrónico: 
				</p>
				
				
				
					
				<div class="formulario">

					<form action="<?=URL?>?page=personas&action=estado_de_cuenta" method="POST" class="form_valida" accept-charset="utf-8">
						
						<input type="hidden" name="status" value="enviar" id="status">
			
						<p>
							<label>Nº de póliza</label>
							<input type="text" name="n_poliza" value="<?=$_SESSION["poliza"]["nro_pol"]?>" id="n_poliza" class="required" readonly>
						</p>
						
						<p>
							<label>Cédula asegurado</label>
							<input type="text" name="cedula_asegurado" value="<?=$_SESSION["equivida"]["cedula"]?>" class="required" id="cedula_asegurado" readonly>
						</p>
			 <!--			 <p>
                         Selecciona el período del que deseas el estado de cuenta:
                         </p>
                         <p>
                         <label>Período</label>
                              
                                    <input type="hidden" name="solicitud_estado_cuenta" value="1">
                                    <input type="radio" name="periodo" value="1 mes" id="periodo" class="periodo_est required" > 1 mes 

									<input type="radio" name="periodo" value="2 meses" id="periodo"  class="periodo_est required"> 2 meses
                                    
                                    <input type="radio" name="periodo" value="3 meses" id="periodo"  class="periodo_est required"> 3 meses
                        </p>-->
						<!--<p>
							<label>Fecha desde</label>
							<input type="text" name="desde" value="" class="datepicker required" id="desde_poliza" >
						</p>
						
						<p>
							<label>Fecha hasta</label>
							<input type="text" name="hasta" value="" class="datepicker required"  id="hasta_poliza">
						</p>-->
						
						<p>
							<label>Teléfono de contacto</label>
							<input type="text" name="n_contacto" value="" class="required" id="n_contacto">
						</p>
						
						
						<p>
							<label>Forma de envío</label>
							<input type="radio" name="envio" value="email" id="envio" class="donde_envio required" > Correo Electrónico 
							
							<input type="radio" name="envio" value="impreso" id="envio"  class="donde_envio required"> Impreso
							
						</p>

						
						<div class="hidden" id="vista_email">

								<?php 
									if(count($this->correos)==0){
										?>
										<span class="error errorDatos">Debe tener un correo registrado. Puede registrarlo en la sección <a href="<?=URL?>?page=configuracion&amp;action=datos_personales">Datos Personales</a>.</span>
										<?
									}

									 ?>
								
							
								<p>
									<label>Email:</label>
										<select name="email" id="email">
													<?php
													for($i=0;$i<count($this->correos);$i++){
															?>
																<option value="<?=$this->correos[$i]["email"]?>"><?=$this->correos[$i]["email"]?></option>
															<?php
													}
													?>
										</select>

								</p>
							
							
						</div>
						
						<div class="hidden" id="vista_direccion">
							
								
									<?php 
									if(count($this->direcciones)==0){
										?>
										<span class="error errorDatos">Debe tener una dirección registrada. Puede registrarla en la sección <a href="<?=URL?>?page=configuracion&amp;action=datos_personales">Datos Personales</a>.</span>
										<?
									}

									 ?>

							<p>
								<label>Dirección:</label>
								
								
								<select name="lugar_entrega" id="lugar_entrega">
											<?php
											for($i=0;$i<count($this->direcciones);$i++){
													?>
														<option value="<?=$this->direcciones[$i]["id"]?>"><?=$this->direcciones[$i]["calle_principal"]?> / <?=$this->direcciones[$i]["calle_secundaria"]?> - <?=$this->direcciones[$i]["ciudad"]?></option>
													<?php
											}
											?>
								</select>
							
							</p>
							
						</div>
						
						
						
						
						
						<p align="center"><input type="submit" value="Solicitar"></p>
						
					</form>

				</div>	
					
		</div>


	</div>
</div>
<!-- Proyección Futura -->








<?php
	$this->display("html/layouts/footer.tpl.php");
?>