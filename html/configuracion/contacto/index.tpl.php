<?php
	$this->display("html/layouts/header.tpl.php");
?>

<?php


switch($_SESSION["equivida"]["rol"]){
	
	case "persona":
		$this->display("html/layouts/menu_cliente.tpl.php");
	break;
	case "empresa":
		$this->display("html/layouts/menu_empresa.tpl.php");		
	break;
	case "brokers":
		$this->display("html/layouts/menu_brokers.tpl.php");
	break;
	case "accionista":
		$this->display("html/layouts/menu_accionista.tpl.php");
	break;
	case "director":
		$this->display("html/layouts/menu_accionista.tpl.php");
	break;
	
}


?>

<div  class="right">


	<?php
	
	if((isset($_SESSION["flash_ok"]))&&($_SESSION["flash_ok"]!="")){
		?>
			<div  class="alert ok">
					<div  class="message">
					<?php
					echo $_SESSION["flash_ok"];
					?>
					</div>
			</div>
		<?php
		$_SESSION["flash_ok"]="";
	}
	
	
	if((isset($_SESSION["flash_error"]))&&($_SESSION["flash_error"]!="")){
		?>
			<div  class="alert error">
					<div  class="message">
						<?php
						echo $_SESSION["flash_error"];
						?>
					</div>
			</div>
			
		<?php
		$_SESSION["flash_error"]="";
	}
	?>


	
	<div  id="" class="inside">

		<!-- <div  id="" class="tab">
				<ul>
					<li>
						<a href="" class="active">Tu Seguro</a>
					</li>
					<li>
						<a href="">Coberturas</a>
					</li>
				</ul>	
			</div> -->
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			
			<h1>Contáctanos</h1>
			
			<p>¡Será un gusto poder ayudarte!</p>
			
			<?php
			if($_SESSION["equivida"]["rol"]=="accionista"){
			?>
			<p>
			Envíenos sus dudas, requerimientos o comentarios a través de este formulario. En las próximas horas recibirá una respuesta de nuestra Oficial de Relaciones con los Accionistas.
			</p>
			
			<?	
			}else{
			?>
			<p>
			Envíanos tus dudas, requerimientos o comentarios a través de este formulario. En las próximas horas recibirás una respuesta de nuestros ejecutivos de servicio al cliente. 
			</p>
			
			<?	
			}
			?>
			
			
			
			
			
			
			<div class="formulario">

		
				<form action="<?=URL?>?page=configuracion&action=contacto" method="POST" class="form_valida" accept-charset="utf-8"  enctype="multipart/form-data">
					
					
					<input type="hidden" name="status" value="enviar" id="status">
					
					<input type="hidden" name="username" value="<?=$_SESSION["equivida"]["username"]?>" id="username">
					<input type="hidden" name="nombre" value="<?=$_SESSION["equivida"]["primerNombre"]?>" id="nombre">
					<input type="hidden" name="apellidoPaterno" value="<?=$_SESSION["equivida"]["apellidoPaterno"]?>" id="apellidoPaterno">
					<input type="hidden" name="apellidoMaterno" value="<?=$_SESSION["equivida"]["apellidoMaterno"]?>" id="apellidoMaterno">
					<input type="hidden" name="cedula" value="<?=$_SESSION["equivida"]["cedula"]?>" id="cedula">

					<input type="hidden" name="email" value="<?=$_SESSION["equivida"]["bd"]["email"]?>" id="email">
					<input type="hidden" name="ciudad" value="<?=$_SESSION["equivida"]["bd"]["ciudad"]?>" id="ciudad">
					<input type="hidden" name="provincia" value="<?=$_SESSION["equivida"]["bd"]["provincia"]?>" id="provincia">
					<input type="hidden" name="pais" value="<?=$_SESSION["equivida"]["bd"]["pais"]?>" id="pais">

					<input type="hidden" name="tipo_usuario" value="<?=$_SESSION["equivida"]["bd"]["tipo_usuario"]?>" id="tipo_usuario">

					<p>
						<label>Asunto</label>
						<input type="text" name="asunto" value="" class="required" id="asunto">
					</p>
					
					<p>
						<label>Teléfono de contacto</label>
						<input type="text" name="n_contacto" value="" class="required" id="n_contacto">
					</p>
					
					<p class="tooltip">
						<label>Adjuntar archivo</label>
						<input name="archivo" type="file"  id="subirArchivo">
                                                <span>Puedes cargar archivos: PDF, WORD o EXCEL</span>
					</p> 
					
					<p>
						<label>Mensaje</label>
						
						<textarea name="mensaje" id="mensaje" class="required"></textarea>
						
					</p>
					
					
					
					<p align="center">
						<input type="submit" name="some_name" value="Enviar" id="some_name">
					</p>
					
					
					
				</form>
			
			</div>
		
        
        <div class="aclaratoria">
                    <div class="recuerde">Recuerda:</div>
                    <ul>
                    <li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros a través de este formulario, escríbenos al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20beneficiarios%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
                    <li>Horarios de Atención Call Center: lunes a viernes de 8:00 a 17:30.
                    </ul>
                </div>
        
			
			</div>

		</div>

	</div>


</div>
<div  id="" class="clear"></div>


<?php
	$this->display("html/layouts/footer.tpl.php");
?>