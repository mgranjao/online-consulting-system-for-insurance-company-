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

	
	
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
				
				
			<div class="formulario">
				
		
				

			
			<h1>Solicita tu Factura</h1>
			
            <p class="intro">Puedes solicitar tu última factura emitida en fotmato digital o impreso, recuerda que para que podamos hacertela llegar necesitamos tus datos actualizados de: dirección, email y teléfonos.</p>
			
					<?php
					if(trim($_SESSION["poliza"]["data"]->nombreAseg)==""){

					?>

						<div class="error_datos">
							<div class="inside">
								Lo sentimos, no registramos información en esta sección, en caso de tener alguna duda puede comunicarse con: <b> servicioalcliente@equivida.com </b> ó en <a href="<?=URL?>?page=configuracion&action=contacto">nuestro formulario de contacto</a>.
							</div>
						</div>

					<?php
				}else{
					?>
			
				<form action="<?=URL?>?page=personas&action=factura" class="form_valida" method="POST" accept-charset="utf-8">
				<p>
					<label>Nombre del asegurado</label>
					<?=$_SESSION["poliza"]["data"]->nombreAseg?>
				</p>
				<p>
					<label>Nº de póliza</label>
					<?=$_SESSION["poliza"]["data"]->numeroPoliza?>
				</p>
				<p>
					<label>Nº cédula / RUC</label>
					<?=$_SESSION["poliza"]["data"]->numDocAseg?>
				</p>
				
				
				<input type="hidden" name="status" value="enviar" id="status">
				
				<input type="hidden" name="nombre_asegurado" value="<?=$_SESSION["poliza"]["data"]->nombreAseg?>" id="nombre_asegurado">
				<input type="hidden" name="n_poliza" value="<?=$_SESSION["poliza"]["data"]->numeroPoliza?>" id="poliza">
				<input type="hidden" name="n_cedula" value="<?=$_SESSION["poliza"]["data"]->numDocAseg?>" id="cedula">
				
				
				<!--<p>
					<label>Fecha de factura desde</label>
					<?php
					
					$meses=array(1=>"Enero",2=>"Febrero",3=>"Marzo",4=>"Abril",5=>"Mayo",6=>"Junio",7=>"Julio",8=>"Agosto",9=>"Septiembre",10=>"Octubre",11=>"Noviembre",12=>"Diciembre");
					
					
					$inicioVigencia=$_SESSION["poliza"]["data"]->inicioVigencia;
					$inicio=explode("/",$inicioVigencia);
					
					$mes_desde=intval($inicio[1]);
					$ano_desde=intval($inicio[2]);
					$ano_actual=intval(date("Y"));
					$mes_actual=intval(date("n"));
					
					?>
							<select name="ano_desde" id="ano_desde"  onchange="">
								<?php
								for($i=$ano_desde;$i<=$ano_actual;$i++){
									?>
									<option value="<?=$i?>" <? if($i==$ano_actual){?> selected <?}?> ><?=$i?></option>
									<?php
								}
								?>
							</select>

							<select name="mes_desde" id="mes_desde"  onchange="">
								<?php
								for($i=1;$i<=count($meses);$i++){
									?>
									<option value="<?=$meses[$i]?>" <? if($meses[$i]==$mes_actual){?> selected <?}?>><?=$meses[$i]?></option>
									<?php
								}
								?>
							</select>
					
					
				</p>
				
				<p>
					<label>Fecha de factura hasta</label>
					
						<select name="ano_hasta" id="ano_hasta"  onchange="">
							<?php
							for($i=$ano_desde;$i<=$ano_actual;$i++){
								?>
								<option value="<?=$i?>" <? if($i==$ano_actual){?> selected <?}?> ><?=$i?></option>
								<?php
							}
							?>
						</select>
					
						<select name="mes_hasta" id="mes_hasta"  onchange="">
							<?php
							for($i=1;$i<=count($meses);$i++){
								?>
								<option value="<?=$meses[$i]?>" <? if($meses[$i]==$mes_actual){?> selected <?}?>><?=$meses[$i]?></option>
								<?php
							}
							?>
						</select>
					
					
					
				</p>-->
				
					<p>
						<label>Número de contacto</label>
						<input type="text" name="n_contacto" value="<?=$_SESSION["equivida"]["bd"]["telefono_convencional"]?> / <?=$_SESSION["equivida"]["bd"]["telefono_movil"]?>" class="required" id="n_contacto">
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
										<span class="error errorDatos">Debe tener una dirección registrada. Puede registrarla en <a href="<?=URL?>?page=configuracion&amp;action=datos_personales">Datos Personales</a> </span>
										<?
									}

									 ?>
									
									<p>
										<label>E-mail</label>
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
										<span class="error errorDatos">Debe tener una dirección registrada. Puede registrarla en <a href="<?=URL?>?page=configuracion&amp;action=datos_personales">Datos Personales</a> </span>
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

				
				<p align="center"><input type="submit" value="Solicitar"></p>
		
			
			</form>
		
        <div class="aclaratoria Ret">
                    <div class="recuerde">Recuerda:</div>
                    <ul>
                    <li>Puedes solicitar tu última factura emitida según tu periodicidad de pago.</li>
                    <li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20beneficiarios%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
                    </ul>
                </div>	
			
			<?php
		}
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