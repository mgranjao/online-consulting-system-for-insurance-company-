<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_cliente.tpl.php");
	?>

<div  class="right">
	
	<div  id="" class="inside">

		<?php
			//$this->display("html/layouts/menu_estado_de_cuenta.tpl.php");
		?>
	
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
				
				
			<h1>Pagos Pendientes</h1>
			
			
			<div class="view-data">
				
				
				
				<?php
                                        $this->pagos->nroCuentasMora="";
					if(trim($this->pagos->nroCuentasMora)==""){
						
				?>
				
					<div class="error_datos">
						<div class="inside">
							<!--Lo sentimos, no registramos información en esta sección, en caso de tener alguna duda puede comunicarse con: <b> servicioalcliente@equivida.com </b> ó en <a href="<?=URL?>?page=configuracion&action=contacto">nuestro formulario de contacto</a>.-->
                                                        Gracias por estar al día con tus pagos, no tienes pagos pendientes.
						</div>
					</div>
				
				<?php
			}else{
				?>
			
				<p>
					<label>Nº de póliza</label>
					<?=$_SESSION["poliza"]["nro_pol"]?>
				</p>
			
				<?php
				if(trim($this->pagos->nroCuentasMora)!=""){
					?>
					<p>
						<label>Pagos pendientes</label>
						<?=$this->pagos->nroCuentasMora?>
					</p>
					
					<?
				}
				?>
				
				<?php
				if(trim($this->pagos->valorMora)!=""){
				?>
				
				<p>
					<label>Valor pendiente</label>
					$ <?=number_format($this->pagos->valorMora,2)?>
				</p>
				
				<?
				}
				?>
				
				
				<?php
				if(trim($this->pagos->valorMora)!=""){
				?>
				<p>
					<label>Periodicidad de pago</label>
					<?=$this->pagos->periocidadPago?>
				</p>
				<?
				}
				}
				?>
				
				
			</div>
			
            	<div class="aclaratoria Ret">
                    <div class="recuerde">Recuerda:</div>
                    <ul>
                    <li>Si realizaste un pago recientemente es posible que no se vea reflejado en el sistema, puede tomar unos días el procesamiento de los pagos.</li>
                    <li>Un pago pendiente puede corresponder a una cuota inpaga o a un saldo parcial de la misma.</li>
 
                    <li>Puedes realizar tus pagos en las oficinas de Equivida o en la cuenta: (<span class="AclaratorioaNota">Cuando realices un pago identifícalo mencionando al cajero el <b>nombre del asegurado</b>, <b>número de cédula / RUC</b> y <b>el valor que estás cancelando</b>.</span>)
 						<ul>
                        	<li>Produbanco: 5532558</li>
                        </ul>
                     
 					</li>               
                     <li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20beneficiarios%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
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