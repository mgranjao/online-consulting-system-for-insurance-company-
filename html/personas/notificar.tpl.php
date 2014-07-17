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
			//$this->display("html/layouts/menu_siniestros.tpl.php");
		?>
	
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			<h1>Reportar un Siniestro</h1>
			
			<p class="intro">
				Una vez sucedido el evento, debes reportarlo dentro de los tiempos establecidos. Puedes notificarnos del siniestro sufrido a través del siguiente formulario: 
			</p>
		
			<div class="formulario">
				
				<form action="<?=URL?>?page=personas&action=notificar" class="form_valida" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
					
					
		
				<input type="hidden" name="email" value="<?=$_SESSION["equivida"]["bd"]["email"]?>" id="email">
				
				
				<input type="hidden" name="status" value="enviar" id="status">
				
			
					<input type="hidden" name="primer_nombre" class="required" value="<?=$_SESSION["equivida"]["bd"]["primer_nombre"]?>" id="primer_nombre">
					<input type="hidden" name="segundo_nombre"  class="required"  value="<?=$_SESSION["equivida"]["bd"]["segundo_nombre"]?>" id="segundo_nombre">
					<input type="hidden" name="apellido_paterno"  class="required"  value="<?=$_SESSION["equivida"]["bd"]["primer_apellido"]?>" id="apellido_paterno">
					<input type="hidden" name="cedula"  class="required"  value="<?=$_SESSION["equivida"]["bd"]["numero_de_documento"]?>" id="cedula">
					<input type="hidden" name="celular"  class="required celular" value="<?=$_SESSION["equivida"]["bd"]["telefono_movil"]?>" id="celular">
					<input type="hidden" name="n_poliza" class="required"  value="<?=$_SESSION["poliza"]["nro_pol"]?>" id="n_poliza">
					<input type="hidden" name="telefono_particular" class="required telefono"  value="<?=$_SESSION["equivida"]["bd"]["telefono_convencional"]?>" id="telefono_particular">
                                        <input type="hidden" name="contratante" value="<?=$_SESSION["equivida"]["bd"]["primer_nombre"]?> <?=$_SESSION["equivida"]["bd"]["primer_apellido"]?>"  class="required"  id="contratante">
				<!--<p>
					<label>
					Nombre del contacto (completo)</label>
					<input type="text" name="nombre_completo_contacto" class="required"  value="" id="nombre_completo_contacto">
				</p>-->
				
				<!--<p>
					<label>Nombre del contratante</label>
					<input type="text" name="contratante" value=""  class="required"  id="contratante">
				</p>-->
                                        
                                <p>
					<label>Afectado:</label>
					<input type="text" name="afectado" value=""  class="required"  id="afectado">
				</p>
                                
                                <p>
					<label>Lugar del Siniestro:</label>
					<input type="text" name="lugar" value=""  class="required"  id="lugar">
				</p>
                                
                                <p>
					<label>
					Teléfono móvil</label>
					<?=$_SESSION["equivida"]["bd"]["telefono_movil"]?>
				</p>
                                
                                <p>
					<label>
					Teléfono convencional</label>
					<?=$_SESSION["equivida"]["bd"]["telefono_convencional"]?>
				</p>
				
				<p>
					<label>
					Teléfono de contacto</label>
					<input type="text" name="telefono_contacto" value="" class="required telefono"  id="telefono_contacto">
				</p>
				
				<!--<p>
					<label>
					Celular de contacto</label>
					<input type="text" name="celular_contacto" value="" class="required celular"  id="celular_contacto">
				</p>-->
				
				
				<!--<p>
					<label>
					E-mail</label>
					<input type="text" name="mail_contacto" value="" class="required"  id="mail_contacto">
				</p>-->
				
					<p>
						<label>
						Fecha del evento</label>
						<input type="text" name="fecha_del_evento" value="" class="required datepicker"  id="nombre">
					</p>
                                        <p class="tooltip">
						<label>Adjuntar archivo</label>
						<input name="archivo" type="file"  id="subirArchivoSiniestro">
                                                <span>Puedes cargar archivos: pdf, word, bmp, png, gif, jpg</span>
					</p> 
					
						<p>
							<label>
							Diagnóstico y breve descripción del evento</label>
							<textarea name="breve_descripcion" class="required"  rows="8" cols="40"></textarea>
						</p>
				
				
				
				
				<div align="center">
					<input type="submit" name="Enviar" value="Reportar" id="enviar">
				</div>
				
				
				</form>
				
                <div class="aclaratoria Ret">
                    <div class="recuerde">Aclaraciones:</div>
                    <ul>
                    <li><b>Siniestro:</b> Puede ser un accidente, daño, avería, destrucción fortuita o pérdida importante que puedes sufrir, pudiendo ser indemnizado según las cobertura contratadas en tu seguro.
					</ul>
                    <div class="recuerde">Recuerda:</div>
                    <ul>
                    <li>Para realizar un reclamo por siniestro debes respetar los tiempos establecidos y entregar toda la documentación solicitada. <a href="<?=URL?>?page=personas&action=siniestro">(ver más)</a></li>
                    <li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20beneficiarios%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
                    </ul>
                </div>	
                
               
                
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