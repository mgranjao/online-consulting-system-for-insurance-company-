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
			
			
			
			<h1>Consulta tu disponibilidad para un Préstamo</h1>
			
			
			<?php 
				
			
			if(count($this->prestamos)!=0){
			
			$ban=0;
			foreach($this->prestamos as $key=>$value){
					if((!(is_int($key)))&&($ban==0)){
						$this->prestamos=array($this->prestamos);
						$ban=1;
					}
			}

			
			}
			
			?>
			
			<div class="clear"></div>
			
			<?php
			
			if(count($this->prestamos)==0){
				?>
				


					<div class="formulario">

						<form action="<?=URL?>?page=personas&action=prestamo" method="POST"  class="form_valida"  accept-charset="utf-8">


							<input type="hidden" name="status" value="enviar" id="status">
								<input type="hidden" name="n_poliza" value="<?=$_SESSION["poliza"]["nro_pol"]?>" id="n_poliza" class="required">
							<input type="hidden" name="monto_a_prestar" value="<?=$this->disponible->impDisponiblePrest*1?>" id="monto_a_retirar">


							


							<?php 

							$disponible = (int) $this->disponible->impDisponiblePrest; 


							$inicio_vigencia=$_SESSION["poliza"]["data"]->inicioVigencia;

							$fecha_vigencia=explode("/",$inicio_vigencia);

							//echo $fecha_vigencia[2];

							$ano_actual=date("Y");

							$ano_actual = (int) $ano_actual;
							$ano_poliza= (int)  $fecha_vigencia[2];

							$diferencia=$ano_actual-$ano_poliza;


							if($diferencia>=3){

							if($disponible>0){
							 ?>
                            
                            
								<p class="intro">
                                  <?php
if ($_SESSION["poliza"]["cod_ramo"]=="59") {
    echo 'Deseas realizar un préstamo? Recuerda que con tu seguro de vida + ahorro, podrás solicitar préstamos en cualquier momento con tasas de interés muy competitivas.<br/>';
} else {
    echo "";
}
?>
                                
									Para solicitar un préstamo es <b>indispensable</b> que entregues una solicitud firmada por el contratante y la copia de cédula en las oficinas de Equivida, en caso de persona Jurídica se requiere la copia certificada del nombramiento del Representante Legal.</p>

									Monto disponible referencial para préstamo: <b>$ <?=number_format($this->disponible->impDisponiblePrest*1,2)?></b> 
									<br/><br/>
									<div class="hidden" id="montoyplazos">
										<center>
										
											<img src="<?=URL?>images/montoplazos.png" width="369" height="87" alt="Montoplazos">
										</center>
									</div>
                                
									<div class="montos"><a class="politicamontoyplazo">Ver montos y plazos</a></div>
							<p>
								<label>Nombres</label>
								<input type="text" name="nombres"  class="required" value="<?=$_SESSION["equivida"]["bd"]["primer_nombre"]?> <?=$_SESSION["equivida"]["bd"]["segundo_nombre"]?>" id="nombres" disabled>
							</p>

							<p>
								<label>Apellidos</label>
								<input type="text" name="apellidos" class="required" value="<?=$_SESSION["equivida"]["bd"]["primer_apellido"]?> <?=$_SESSION["equivida"]["bd"]["segundo_apellido"]?>" id="apellidos" disabled>
							</p>

							<p>
								<label>Nº Cédula / RUC</label>
								<input type="text" name="n_cedula" class="required" value="<?=$_SESSION["equivida"]["bd"]["numero_de_documento"]?>" id="n_cedula" disabled>
							</p>
							
										<p>
											<label>Teléfono de contacto:</label>
											<input type="text" name="n_contacto" value="<?=$_SESSION["equivida"]["bd"]["telefono_convencional"]?> / <?=$_SESSION["equivida"]["bd"]["telefono_movil"]?>" class="required" id="n_contacto">
										</p>
										<!--<a class="politicamontoyplazo"></a>-->
							
							<p>
							
							
								<label>Valor de préstamo
									<br><span class="campo_obligatorio">Valor máximo hasta $ <?=number_format($this->disponible->impDisponiblePrest*1,2)?> </span>

									</label>
								<input type="text" class="required solo-numero" name="valor_a_prestar" value="" id="valor_a_prestar">
								<div class="error_valor_mas"></div>
								
								
							</p>
							


							<p align="center"><input type="submit" class="btn_prestamo" value="Notificar requerimiento"></p>
							<div class="clear"></div>
							
							<div class="aclaratoria Ret">
                            <div class="recuerde">Recuerda:</div>
                            <ul>
                            <li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20coberturas%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
                            </ul>
                            </div>
            
							<?
							}else{
								?>
									<p class="error">
										¡Lo sentimos! Usted no tiene acceso a un préstamo. Para mayor información <a href="<?=URL?>?page=configuracion&action=contacto">contáctenos</a> o llámenos a 1800-EQUIVIDA.
									</p>
								<?
							}

						}else{
							?>

							<p class="error">
									¡Lo sentimos! Usted no tienes acceso a un préstamo. Para mayor información <a href="<?=URL?>?page=configuracion&action=contacto">contáctenos</a> o llámenos a 1800-EQUIVIDA.
									</p>
							<?
						}
							?>

						</form>

					</div>	
				
					
				<?php
			}else{
				
			
				
				?>
				
				
					<?php
					if($this->disponible->impDisponiblePrest!="0.00"){
					?>
					<a class="solicitud box"></a>
					<?php
					}
					?>




					Consulta el estado de tu préstamo actual



				
						<ul class="imprimir">

							<li><a href="<?=URL?>?page=personas&action=prestamo&format=excel" class="exportar">Exportar</a></li>
							<li><a href="<?=URL?>?page=personas&action=prestamo&format=print" class="print">Imprimir</a></li>

						</ul>


					<div class="datatable">
						
				<?php
				if(count($this->prestamos)!=0){

						$ban=0;
						foreach($this->prestamos as $key=>$value){
						if((!(is_int($key)))&&($ban==0)){
							$this->prestamos=array($this->prestamos);
							$ban=1;
						}
						}
				}
				
				
				
				?>

							<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

								<thead>
									<tr>
										<th>Nº Préstamo </th>
										<th>Fecha Concesión</th>
										<th>Monto Otorgado</th>
										<th>Saldo Pendiente</th>
										<th>Banco/Tarjeta</th>
										<th>No. cuenta/tarjeta</th>
							
									</tr>

								</thead>
								<tbody>
										<?php 
									for($i=0;$i<count($this->prestamos);$i++){
										
										if($this->prestamos[$i]->numeroPoliza==$_SESSION["poliza"]["nro_pol"]){
										
										
										
										?>
										
										

										<tr>
											<td><?=$this->prestamos[$i]->numeroPrestamo?></td>
											<td><?=$this->prestamos[$i]->fechaConcesion?></td>
											<td><?=number_format($this->prestamos[$i]->impCapital,2 ,'.', ',')?></td>
											<td><?=number_format($this->prestamos[$i]->impSaldo,2 ,'.', ',')?></td>
											<td><?=$this->prestamos[$i]->descCond?></td>
											<td><?=$this->prestamos[$i]->tarjeta?></td>
										
										</tr>

										<?php
										}
										
										}
										?>

								</tbody>
							</table>


					</div>
				<?php
			}
			
			
			?>
			
			
			
			
			
		
			
			
			<div class="clear"></div>
			
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
				<h1>Solicitar Préstamo</h1>
				
				
				
				
				
			</div>

		</div>


		<div class="text">
			
				<a class="cerrar">Cerrar(x)</a>
				<br>
					<p>
						Para solicitar un préstamo es indispensable entregar en la oficina de Equivida la impresión de esta solicitud y la copia de la cédula, en caso de persona Jurídica se requiere la copia certificada del nombramiento del Representante Legal.

					</p>

			

					Monto disponible referencial para préstamo: <b>$ <?=number_format($this->disponible->impDisponiblePrest*1,2)?></b> 

			
						<div class="hidden" id="montoyplazos">
							<center>
						
								<img src="<?=URL?>images/montoplazos.png" width="369" height="87" alt="Montoplazos">
							</center>
						</div>
					
					
				<div class="formulario">

					<form action="<?=URL?>?page=personas&action=prestamo" method="POST"  class="form_valida"  accept-charset="utf-8">
						
						
						<input type="hidden" name="status" value="enviar" id="status">
						
						
						<input type="hidden" name="n_poliza" value="<?=$_SESSION["poliza"]["nro_pol"]?>" id="n_poliza" class="required">
						<input type="hidden" name="monto_a_prestar" value="<?=$this->disponible->impDisponiblePrest*1?>" id="monto_a_prestar">
						

						<p>
							<label>Nombres</label>
							<input type="text" name="nombres"  class="required" value="<?=$_SESSION["equivida"]["bd"]["primer_nombre"]?> <?=$_SESSION["equivida"]["bd"]["segundo_nombre"]?>" id="nombres" readonly>
						</p>

						<p>
							<label>Apellidos</label>
							<input type="text" name="apellidos" class="required" value="<?=$_SESSION["equivida"]["bd"]["primer_apellido"]?> <?=$_SESSION["equivida"]["bd"]["segundo_apellido"]?>" id="apellidos" readonly>
						</p>

						<p>
							<label>Nº Cédula</label>
							<input type="text" name="n_cedula" class="required" value="<?=$_SESSION["equivida"]["bd"]["numero_de_documento"]?>" id="n_cedula" readonly>
						</p>
						
							<p>
								<label>Número de Contacto</label>
								<input type="text" name="n_contacto" value="<?=$_SESSION["equivida"]["bd"]["telefono_convencional"]?> / <?=$_SESSION["equivida"]["bd"]["telefono_movil"]?>" class="required" id="n_contacto">
							</p>

							<a class="politicamontoyplazo"></a>
								
						<p>
							<label>Valor de Préstamo
								<br><span class="campo_obligatorio">Valor máximo hasta $ <?=number_format($this->disponible->impDisponiblePrest*1,2)?> </span>
								
								</label>
								<input type="text" class="required solo-numero" name="valor_a_prestar" value="" id="valor_a_prestar">
								<div class="error_valor_mas"></div>
						</p>
						
						

						<p align="center"><input type="submit" value="Imprimir &rarr;"></p>
						
							<p>En caso de tener alguna inquietud no dudes en comunicarte al <b>1 800 EQUIVIDA</b> </p>
						
					</form>

				</div>	
					
		</div>


	</div>
</div>
<!-- Proyección Futura -->



<?php
	$this->display("html/layouts/footer.tpl.php");
?>