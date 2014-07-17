<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_empresa.tpl.php");
	?>

<div  class="right">
	
	<?php
		
		include 'html/layouts/message.tpl.php';
		
		
	?>
	
	<div  id="" class="inside">

		<?php
			//$this->display("html/layouts/menu_empresa_siniestro.tpl.php");
		

		?>
	
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
				<h1>Notificar </h1>
			
			<p>
				Para notificar un siniestro completa el siguiente formulario. Recuerda que para realizar el reclamo debes entregar la documentación solicitada. 
			</p>
		
			<div class="formulario">
				
				<form action="<?=URL?>?page=empresas&action=notificar" class="form_valida" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
					
					
		
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
					Nombre completo Contacto</label>
					<input type="text" name="nombre_completo_contacto" class="required"  value="" id="nombre_completo_contacto">
				</p>
				
				<p>
					<label>Contratante</label>
					<input type="text" name="contratante" value=""  class="required"  id="contratante">
				</p>
				-->
                                
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
					Teléfono de emergencia</label>
					<input type="text" name="telefono_contacto" value="" class="required telefono"  id="telefono_contacto">
				</p>
				
				<!--<p>
					<label>
					
						Celular Contacto</label>
					<input type="text" name="celular_contacto" value="" class="required celular"  id="celular_contacto">
				</p>-->
				
				
				<!--<p>
					<label>
					
						E-mail</label>
					<input type="text" name="mail_contacto" value="" class="required"  id="mail_contacto">
				</p>-->
				
					<p>
						<label>

							Fecha del Evento</label>
						<input type="text" name="fecha_del_evento" value="" class="required datepicker"  id="nombre">
					</p>
					
                                        <p class="tooltip">
						<label>Adjuntar archivo</label>
						<input name="archivo" type="file"  id="subirArchivoSiniestro">
                                                <span>Puedes cargar archivos: pdf, word, bmp, png, gif, jpg</span>
					</p> 
						<p>
							<label>

								Diagnostico y breve descripción del evento</label>
							<textarea name="breve_descripcion" class="required"  rows="8" cols="40"></textarea>
						</p>
				
				
				
				
				<p align="center">
					<input type="submit" name="Enviar" value="Enviar" id="enviar">
				</p>
				
				
				</form>
				
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