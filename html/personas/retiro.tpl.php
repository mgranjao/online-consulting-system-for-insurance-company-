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
			
            <?php
			
		
			if($this->retiros->valorMaximoRetiro!="0.00"){
				?>
					<!--<a class="solicitud box retirobox">Imprime una Solicitud</a>-->
				<?php
			}
			
			?>
            
            
			<h1>Consulta el monto disponible para Retiro</h1>
			
	
			<?php
if ($_SESSION["poliza"]["cod_ramo"]=="59") {
    echo '<p class="intro">Nunca sabremos el momento en que necesitaremos de un fondo de ahorro.  Con tu seguro de vida + ahorro, podrás realizar retiros parciales de tu ahorro acumulado para cubrir alguna necesidad.</p>';
} else {
    echo "";
}
?>
			
			<div class="view-data">
			
			<p>
				<label>Nombre del asegurado</label>
				<?=texto($_SESSION["poliza"]["data"]->nombreAseg)?>
			</p>
			
			<p>
				<label>Nº de póliza</label>
				<?=texto($_SESSION["poliza"]["data"]->numeroPoliza)?>
			</p>
			
			<p>
				<label>Inicio de vigencia</label>
				<?=texto($_SESSION["poliza"]["data"]->inicioVigencia)?>
			</p>
			
			<p>
				<label>Valor asegurado</label>
			
					$ <?=number_format($_SESSION["poliza"]["data"]->impValorAseg,2)?>
			</p>
			
                    <?php if ($_SESSION["poliza"]["cod_ramo"]=="55") {
                                 echo "";
                            } else {?>
                        <p>
				<label>Saldo cuenta individual</label>

					$ <?=number_format($this->retiros->saldoCuenta,2)?>
			</p>
                    <?php } ?>
                        
			
			
				<p>   
                                      <?php if ($_SESSION["poliza"]["cod_ramo"]=="55") {
                                      echo "<label>Cargos por retiro</label>";
                                      } else {?>
					<label>Cargos por retiro anticipado</label>
                                      <?php } ?>      
					$ <?=number_format($this->retiros->costoRescate,2)?>
				</p>


			<p>
				<label>Monto disponible para retiro<br>(Este es un valor referencial)</label>

					$ <?=number_format($this->retiros->valorMaximoRetiro*0.8,2 ,'.', ',')?>
			</p>
			
			<!--<p>
				<label>Saldo Préstamo</label>

				<?=number_format($this->retiros->saldoPrestamo,2)?>
			</p>-->
			<?php
			if(isset($this->retiros->mensaje)){
			?>
			<p><span class="campo_mensaje">
				<label>Mensaje</label>
				<?=texto($this->retiros->mensaje)?>
                                </span>
			</p>
			<?php
			}
			?>
			
                        	
					
			</div>
                        <hr/>
                        
                        
                        
                                <p>
				<label class=""><b>Solicitud de Retiro</b> </label>
				<form action="<?=URL?>?page=personas&action=retiro"  target="_blank" class="form_valida" method="POST" accept-charset="utf-8">
                            <input type="hidden" name="monto_a_retirar" value="<?=$this->retiros->valorMaximoRetiro*0.8?>" id="monto_a_retirar">
                            <input type="hidden" name="status" value="imprimir" id="status">
                            <input type="hidden" name="nombres" class="required" value="<?=$_SESSION["equivida"]["bd"]["primer_nombre"]?> <?=$_SESSION["equivida"]["bd"]["segundo_nombre"]?>" id="nombres" readonly>
                            <input type="hidden" name="apellidos" class="required"  value="<?=$_SESSION["equivida"]["bd"]["primer_apellido"]?> <?=$_SESSION["equivida"]["bd"]["segundo_apellido"]?>" id="apellidos" readonly>
                            <input type="hidden" name="n_cedula" class="required"  value="<?=$_SESSION["equivida"]["bd"]["numero_de_documento"]?>" id="n_cedula" readonly>
                            <input type="hidden" name="valor_a_retirar"  value="0" id="valor_a_retirar_imprimir">
                            <input type="hidden" name="bandera_imprimir"   value="0" id="bandera_imprimir">
                            <!--<ul class="imprimir">
							<li><a href="#" class="print"></a></li>
                                                        
							
                                                        <div  id="" class="clear"></div>
							
						</ul>-->
                            <input type="submit" value="Imprimir" id="imprimir_solicitud_retiro" class="printbutton">
                            </form>
                                
                                </p>
				<div class="formulario">

					<form action="<?=URL?>?page=personas&action=retiro" class="form_valida" method="POST" accept-charset="utf-8">
						
							
							<input type="hidden" name="status" value="enviar" id="status">
							
							<input type="hidden" name="monto_a_retirar" value="<?=$this->retiros->valorMaximoRetiro*0.8?>" id="monto_a_retirar">

						<p>
							<label>Nombres</label>
							<input type="text" name="nombres" class="required" value="<?=$_SESSION["equivida"]["bd"]["primer_nombre"]?> <?=$_SESSION["equivida"]["bd"]["segundo_nombre"]?>" id="nombres" readonly>
						</p>

						<p>
							<label>Apellidos</label>
							<input type="text" name="apellidos" class="required"  value="<?=$_SESSION["equivida"]["bd"]["primer_apellido"]?> <?=$_SESSION["equivida"]["bd"]["segundo_apellido"]?>" id="apellidos" readonly>
						</p>
						
						
						
						<p>
							<label>Nº Cédula</label>
							<input type="text" name="n_cedula" class="required"  value="<?=$_SESSION["equivida"]["bd"]["numero_de_documento"]?>" id="n_cedula" readonly>
						</p>

						<p>
							<label>Valor a Retirar<br><span class="campo_obligatorio">Valor máximo hasta $ <?=number_format($this->retiros->valorMaximoRetiro*0.8,2)?> </span> </label>
							
							<input type="text" name="valor_a_retirar" class="required solo-numero"  value="" id="valor_a_retirar">
							
							<div class="error_valor_mas"></div>
							
						</p>
						
						<p>
							<label>Notificar a Email registrado<br><span class="campo_obligatorio">email:<?=$_SESSION["equivida"]["bd"]["email"]?> </span></label>
							<input type="checkbox" name="enviar_correo"  value="1" id="enviar_correo" checked>
						</p>
					

						<p align="center"><input type="submit" value="Notificar"></p>
						
					</form>
                                    
				</div>	
					
                        
                        
			<div class="aclaratoria Ret">
            
            <div class="recuerde">Aclaraciones:</div>
                    <ul>
                         <?php if ($_SESSION["poliza"]["cod_ramo"]=="55") {
                            echo "<li><b>Cargo por Retiro:</b> (retiro parcial anticipado) Monto de recargo que disminuye el saldo de tu cuenta individual por hacer un retiro antes del tiempo mínimo establecido en tu póliza.</li>";
                         } else {?>
                    <li><b>Cargo por Rescate:</b> (retiro parcial anticipado) Monto de recargo que disminuye el saldo de tu cuenta individual por hacer un retiro antes del tiempo mínimo establecido en tu póliza.</li>
                    <?php } ?>
                    <?php if ($_SESSION["poliza"]["cod_ramo"]=="55") {
                            echo "";
                         } else {?>
                    <li><b>Rescate Total:</b> Monto máximo de retiro total de tus fondos en caso de cancelación de la póliza.</li>
                    <?php } ?>
                    <li><b>Monto disponible para retiro:</b> Monto  referencial para retirar fondos parciales y sin cancelar tu póliza.
              </ul>
            
            <div class="recuerde">Recuerda:</div>
                    <ul>
                    <li>Para hacer un retiro debes entregar una solicitud firmada por el contratante indicando el monto a retirar y la copia de cédula, en caso de persona Jurídica se requiere la copia certificada del nombramiento del Representante Legal.
                    <span class="AclaratorioaNota">* Modelo de solicitud sugerido en <a class="box">Imprime una Solicitud</a> (esquina superior derecha).</span></li>
                    
           			<?php
if ($_SESSION["poliza"]["cod_ramo"]=="59") {
    echo "<li>Retirar todo tu fondo tiene un valor de Rescate Total. Sin embargo en ese caso tu póliza Vida Universal se cancelará, por ello te ofrecemos asesoría especializada para darte una mejor solución sin perder tu cobertura.</li>";
} else {
    echo "";
}
?>
                   
                    <li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20coberturas%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
                    </ul>
            		</div>
	
			
			</div>

		</div>

	</div>


</div>
<div  id="" class="clear"></div>







<!-- Proyección Futura --
<div style="display:none">
	<div id="box">

		<div class="header">

			<div class="inside">
				<h1>Imprime una solicitud de retiro</h1>
                <a class="cerrar">Cerrar</a>
			</div>

		</div>
		
		<div class="text textretiro">
			
				
				Monto disponible referencial para retiro: <b>$ <?=number_format($this->retiros->valorMaximoRetiro,2 ,'.', ',')?></b> 
			
					
				<div class="formulario">

					<form action="?page=personas&action=retiro"  target="_blank" class="form_valida" method="POST" accept-charset="utf-8">
						
							
							<input type="hidden" name="status" value="enviar" id="status">
							
							<input type="hidden" name="monto_a_retirar" value="<?=$this->retiros->valorMaximoRetiro*0.8?>" id="monto_a_retirar">

						<p>
							<label>Nombres</label>
							<input type="text" name="nombres" class="required" value="<?=$_SESSION["equivida"]["bd"]["primer_nombre"]?> <?=$_SESSION["equivida"]["bd"]["segundo_nombre"]?>" id="nombres" readonly>
						</p>

						<p>
							<label>Apellidos</label>
							<input type="text" name="apellidos" class="required"  value="<?=$_SESSION["equivida"]["bd"]["primer_apellido"]?> <?=$_SESSION["equivida"]["bd"]["segundo_apellido"]?>" id="apellidos" readonly>
						</p>
						
						
						
						<p>
							<label>Nº Cédula</label>
							<input type="text" name="n_cedula" class="required"  value="<?=$_SESSION["equivida"]["bd"]["numero_de_documento"]?>" id="n_cedula" readonly>
						</p>

						<p>
							<label>Valor a Retirar<br><span class="campo_obligatorio">Valor máximo hasta $ <?=number_format($this->retiros->valorMaximoRetiro*0.8,2)?> </span> </label>
							
							<input type="text" name="valor_a_retirar" class="required solo-numero"  value="" id="valor_a_retirar">
							
							<div class="error_valor_mas"></div>
							
						</p>
						
						<p>
							<label>Enviar a Email registrado<br><span class="campo_obligatorio">email:<?=$_SESSION["equivida"]["bd"]["email"]?> </span></label>
							<input type="checkbox" name="enviar_correo" class="required solo-numero"  value="1" id="valor_a_retirar">
						</p>
					

						<p align="center"><input type="submit" value="Imprimir"></p>
						
					</form>
                                    
				</div>	
					
		</div>


	</div>
</div>
<!-- Proyección Futura -->




<?php
	$this->display("html/layouts/footer.tpl.php");
?>