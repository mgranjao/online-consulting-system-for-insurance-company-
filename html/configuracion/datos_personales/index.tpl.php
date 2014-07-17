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
		
		include 'html/layouts/message.tpl.php';
		
		
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
				
			
				
			
			
			<div class="view-data">
				
			
				<?php
			
				
				?>
				<?php
				switch($_SESSION["equivida"]["rol"]){
					case "persona":
					?>
						<h1>Datos Personales</h1>
					<?php
					break;
					
					case "empresa":
					?>
						<h1>Datos de la Empresa</h1>
					<?php
					break;
					
					case "brokers":
					?>
						<h1>Datos de la Empresa</h1>
					<?php
					break;
					
					case "accionista":
					?>
						<h1>Datos del Accionista</h1>
					<?php
					break;	
					
					case "director":
					?>
						<h1>Datos del Accionista</h1>
					<?php
					break;
				}
				?>
				
				
                                               <!-- <a class="solicitud box boxEstCta cboxElement">Actualizar</a>-->
				<a class="actualizar box_3 box boxEstCta cboxElement">Actualizar</a>

				<?php 
                                				
				if(($_SESSION["equivida"]["bd"]["tipo_usuario_id"]=="1")||($_SESSION["equivida"]["bd"]["tipo_usuario_id"]=="4")){
				
                               
				if(isset($this->info_cliente->idPersonaNatural)){
				
				
					
					$this->info_cliente->apellidoPaterno=str_replace("Ã","Í",$this->info_cliente->apellidoPaterno);
					
					$this->info_cliente->apellidoMaterno=str_replace("Ã","Í",$this->info_cliente->apellidoMaterno);
					
					$this->info_cliente->primerNombre=str_replace("Ã","Í",$this->info_cliente->primerNombre);
					
					$this->info_cliente->segundoNombre=str_replace("Ã","Í",$this->info_cliente->segundoNombre);
					
				

					?>
					
					<p>
					<label>Apellido paterno:</label>
					<?=format($this->info_cliente->apellidoPaterno)?>
					</p>
				
					<p>
					<label>Apellido materno:</label>
					<?=format($this->info_cliente->apellidoMaterno)?>
					</p>
				
					<p>
					<label>Primer nombre:</label>
					<?=format($this->info_cliente->primerNombre)?>
					</p>
				
				
					<p>
					<label>Segundo nombre:</label>
					<?=format($this->info_cliente->segundoNombre)?>
					</p>
					
					
					<p>
						<label>Email:</label>
						<?=$_SESSION["equivida"]["bd"]["email"]?>
					</p>
					
						<p>
							<label>Tipo de documento:</label>
							<?php
							if($_SESSION["equivida"]["bd"]["tipo_de_documento"]=="C"){
								echo "Cédula";
							}else{
								echo "Pasaporte";
							}
							?>
						</p>
					
					
					<p>

						<label>Cédula o pasaporte:</label>
						<?=$_SESSION["equivida"]["bd"]["numero_de_documento"]?>

					</p>
					
					<?php
					
					
						$fecha_nacimiento=$this->info_cliente->fechaNacimiento;
						$fecha_nacimiento=explode("T",$fecha_nacimiento);
						
					
					?>
					<p>
						<label>Fecha de nacimiento</label>
						<?=$fecha_nacimiento[0]?>
					</p>
					
					<!-- 
					<p>
						<label>Teléfono Convencional</label>
						<?=$_SESSION["equivida"]["bd"]["telefono_convencional"]?>
					</p>

					<p>
						<label>Teléfono Móvil</label>
						<?=$_SESSION["equivida"]["bd"]["telefono_movil"]?>
					</p>
					-->
					<?

				}else{

					?>
					<p>
					<label>Apellido paterno:</label>
					<?=$_SESSION["equivida"]["bd"]["primer_apellido"]?>
					</p>
				
					<p>
					<label>Apellido materno:</label>
					<?=$_SESSION["equivida"]["bd"]["segundo_apellido"]?>
					</p>
				
					<p>
					<label>Primer nombre:</label>
					<?=$_SESSION["equivida"]["bd"]["primer_nombre"]?>
					</p>
				
				
					<p>
					<label>Segundo nombre:</label>
					<?=$_SESSION["equivida"]["bd"]["segundo_nombre"]?>
					</p>
					
					
					
						<p>
							<label>Tipo de documento:</label>
							<?php
							if($_SESSION["equivida"]["bd"]["tipo_de_documento"]=="C"){
								echo "Cédula";
							}else{
								echo "Pasaporte";
							}
							?>
						</p>

						<p>
							<label>Email:</label>
							<?=$_SESSION["equivida"]["bd"]["email"]?>
						</p>

						<p>

							<label>Cédula o pasaporte:</label>
							<?=$_SESSION["equivida"]["bd"]["numero_de_documento"]?>

						</p>

						<!-- 

						<p>
							<label>Teléfono Convencional</label>
							<?=$_SESSION["equivida"]["bd"]["telefono_convencional"]?>
						</p>

						<p>
							<label>Teléfono Móvil</label>
							<?=$_SESSION["equivida"]["bd"]["telefono_movil"]?>
						</p>
					
						-->
					
					
					<?

				}
				
				}else{
					
					?>
							<p>
								<label>Razón social:</label>
								<?=$_SESSION["poliza"]["data"]->nombreContratante?>
                                                                
							</p>
							
							<p>
								<label>RUC:</label>
								<?=$_SESSION["poliza"]["data"]->numDocContratante?>
							</p>
							
							<p>
								<label>E-mail:</label>
								<?=$_SESSION["equivida"]["bd"]["email"]?>
							</p>
						
						
					<?php
				}
				
				
				
				
				

				 ?>
				
                                
				<a class="add box">Agregar una dirección</a>
				
				<div class="direcciones_list">

					<div class="direcciones_left">
						<label>Dirección:</label>
					</div>

					<div class="direcciones_right">

						<?php
								
								for($i=0;$i<count($this->direcciones);$i++){
									?>
										<?=$this->direcciones[$i]["calle_principal"]?> / <?=$this->direcciones[$i]["calle_secundaria"]?>, <?=$this->direcciones[$i]["ciudad"]?> (<?=$this->direcciones[$i]["tipo"]?>) 

										
										<a href="<?=URL?>?page=configuracion&action=editar_direccion&id=<?=$this->direcciones[$i]["id"]?>"><img src="<?=URL?>images/icon_edit.png"></a>
										<a href="<?=URL?>?page=configuracion&action=borrar_direccion&id=<?=$this->direcciones[$i]["id"]?>" class="eliminar" title="¿Deseas eliminar la dirección?"><img src="<?=URL?>images/delete.png"></a> <br>
									<?php
								}
								?>


						<?php 
						if(count($this->direcciones)==0){
							?>
							No tienes direcciones registradas.
							<?
						}
						?>

						
					</div>

					<div class="clear"></div>


			</div>
				
			

			<a class="add box_4">Agregar un teléfono</a>
				
			<div class="direcciones_list impar">

					<div class="direcciones_left">
						<label>Teléfonos:</label>
					</div>

					<div class="direcciones_right">

						<?php
								
								for($i=0;$i<count($this->telefonos);$i++){
									?>
										<?=$this->telefonos[$i]["numero"]?> (<?=$this->telefonos[$i]["tipo"]?>)

							
										<a href="<?=URL?>?page=configuracion&action=editar_telefono&id=<?=$this->telefonos[$i]["id"]?>"><img src="<?=URL?>images/icon_edit.png"></a>
										<a href="<?=URL?>?page=configuracion&action=borrar_telefono&id=<?=$this->telefonos[$i]["id"]?>" class="eliminar" title="¿Deseas eliminar la dirección?"><img src="<?=URL?>images/delete.png"></a> <br>
									<?php
								}
								?>


						<?php 
						if(count($this->telefonos)==0){
							?>
							No tienes teléfonos registrados.
							<?
						}
						?>

						
					</div>

					<div class="clear"></div>


			</div>
			<div class="direcciones_list">

					<a class="add box_2">Agregar un e-mail</a>


					<div class="direcciones_left">
						<label>E-mail</label>
					</div>

					<div class="direcciones_right">

						<?php			
						for($i=0;$i<count($this->correos);$i++){
						?>
						<?=$this->correos[$i]["email"]?>  (<?=$this->correos[$i]["tipo"]?>)
						<a href="<?=URL?>?page=configuracion&action=editar_correo&id=<?=$this->correos[$i]["id"]?>">  <img src="<?=URL?>images/icon_edit.png"></a>
						<a href="<?=URL?>?page=configuracion&action=borrar_correo&id=<?=$this->correos[$i]["id"]?>" class="eliminar" title="¿Deseas eliminar la dirección?"> <img src="<?=URL?>images/delete.png"></a><br>
									
						<?
						}
						?>

						<?php 
						if(count($this->correos)==0){
							?>
							No tienes correos registrados.
							<?
						}  
						?>

					</div>
					<div class="clear"></div>
				</div>
			</div>	
			

			<div class="aclaratoria">
                    <div class="recuerde">Recuerda:</div>
                    <ul>
                    <li>Registrar tu e-mai, dirección y teléfonos actualizados para que podamos hacerte llegar tus facturas, estados de cuenta y que podamos contactarnos contigo más rápido y mejor.</li>
                    <li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20beneficiarios%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
                    </ul>
                </div>
			
			
			
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
				<h1>Agregar dirección</h1>
                <a class="cerrar">Cerrar</a>
			</div>

		</div>


		<div class="text">
			
			<!--	<a class="cerrar">Cerrar</a>-->
			
				<div class="formulario">
					
					<p>
						Ingrese los datos de ubicación de su domicilio o lugar de trabajo.
						<br>
						<span class="campo_obligatorio">(Campo obligatorio *)</span>
					</p>
					
					
				
					<form action="<?=URL?>?page=configuracion&action=nueva_direccion" method="POST" class="form_valida" accept-charset="utf-8">
						
						
						<input type="hidden" name="status" value="nueva_direccion" id="status">
						
						<p>
								<label>Tipo dirección: <span class="campo_obligatorio">*</span> </label>
								<select name="tipo_direccion" id="tipo_direccion" class="required" >
									<option value="">Seleccionar</option>
									<option value="DOMICILIO">Domicilio</option>
									<option value="TRABAJO">Trabajo</option>
								</select>
						</p>
						

						<p>
							<label>Ciudad: <span class="campo_obligatorio">*</span> </label>
							<input type="text" name="ciudad" value="" id="ciudad" class="required">
						</p>

						<p>
							<label>Cantón: <span class="campo_obligatorio">*</span> </label>
							<input type="text" name="canton" value="" id="canton" class="required">
						</p>

						<p>
							<label>Provincia: <span class="campo_obligatorio">*</span> </label>
							
							<select name="provincia_id" id="provincia_id" class="required" >
								
								<option value="">Seleccionar</option>
								
								<?php

								for($i=0;$i<count($this->provincias);$i++){
									?>
									<option value="<?=$this->provincias[$i]["id"]?>"><?=$this->provincias[$i]["nombre"]?></option>
									<?php
								}

								?>						
							</select>
							
						
						</p>
						
						<p>
							<label>Calle principal: <span class="campo_obligatorio">*</span> </label>
							<input type="text" name="calle_principal" value="" id="calle_principal" class="required">
							
						</p>
						
						<p>
							<label>Calle Secundaria: <span class="campo_obligatorio">*</span> </label>
							<input type="text" name="calle_secundaria" value="" id="calle_secundaria" class="required">
							
						</p>
					
						
						<p align="center"><input type="submit" value="Guardar"></p>
					</form>

				</div>	
					
		</div>


	</div>
</div>
<!-- Proyección Futura -->



<!-- Proyección Futura -->
<div style="display:none">
	<div id="box_2">

		<div class="header">

			<div class="inside">
				<h1>Agregar correo electrónico</h1>
                <a class="cerrar">Cerrar</a>
			</div>

		</div>


		<div class="text">
			
				<!--<a class="cerrar">Cerrar</a>-->
			
				<div class="formulario">
					
					<p>
						Ingrese el correo electrónico:
						<br>
						<span class="campo_obligatorio">(Campo obligatorio *)</span>
					</p>
					
					
				
					<form action="<?=URL?>?page=configuracion&action=nuevo_correo" method="POST" id="form_email" class="form_valida" accept-charset="utf-8">
						
						
						<input type="hidden" name="status" value="nuevo_email" id="status">
						
						<p>
								<label>Tipo dirección: <span class="campo_obligatorio">*</span> </label>
								<select name="tipo_direccion" id="tipo_direccion" class="required" >
									<option value="">Seleccionar</option>
									<option value="TRABAJO">Trabajo</option>
									<option value="PERSONAL">Personal</option>
								</select>
						</p>
						

						<p>
							<label>E-mail: <span class="campo_obligatorio">*</span> </label>
							<input type="text" name="email" value="" id="email" class="required email">
						</p>

					
						
						<p align="center"><input type="submit" value="Guardar"></p>
					</form>

				</div>	
					
		</div>


	</div>
</div>
<!-- Proyección Futura -->




<!-- Proyección Futura -->
<div style="display:none">
	<div id="box_4">

		<div class="header">

			<div class="inside">
				<h1>Agregar teléfono</h1>
                <a class="cerrar">Cerrar</a>
			</div>

		</div>


		<div class="text">
			
				<!--<a class="cerrar">Cerrar(x)</a>-->
			
				<div class="formulario">
					
					<p>
						Ingrese número telefónico:
						<br>
						<span class="campo_obligatorio">(Campo obligatorio *)</span>
					</p>
					
					
				
					<form action="<?=URL?>?page=configuracion&action=nuevo_telefono" method="POST" id="form_telefonos" class="form_valida" accept-charset="utf-8">
						
						
						<input type="hidden" name="status" value="nuevo_telefono" id="status">
						
						<p>
								<label>Tipo teléfono: <span class="campo_obligatorio">*</span> </label>
								<select name="tipo" id="tipo" class="required" >
									<option value="">Seleccionar</option>
									<option value="MOVIL">Móvil</option>
									<option value="CONVENCIONAL">Convencional</option>
								</select>
						</p>
						

						<p>
							<label>Número: <span class="campo_obligatorio">*</span> </label>
							<input type="text" name="numero" value="" id="numero" class="required">
						</p>

					
						
						<p align="center"><input type="submit" value="Guardar"></p>
					</form>

				</div>	
					
		</div>


	</div>
</div>
<!-- Proyección Futura -->








<!-- Proyección Futura -->
<div style="display:none">
	<div id="box_3">

		<div class="header">

			<div class="inside">
				<h1>Solicitud para actualizar datos</h1>
                <a class="cerrar">Cerrar</a>
			</div>

		</div>


		<div class="text">
			
				<!--<a class="cerrar">Cerrar(x)</a>-->
			
				<div class="formulario">
					
					<p>
						Ingrese los motivos por los que desea actualizar datos:
						<br>
						<span class="campo_obligatorio">(Campo obligatorio *)</span>
					</p>
					
					
				
					<form action="<?=URL?>?page=configuracion&action=datos_personales" method="POST" id="form_actualiza" class="form_valida" accept-charset="utf-8">
						
							
					<?php
                                            if($_SESSION["equivida"]["bd"]["tipo_usuario_id"]!="2" and $_SESSION["equivida"]["bd"]["tipo_usuario_id"]!="3")
                                            {
                                        ?>		
                                            <input type="hidden" name="status" value="enviar" id="status">

                                            <input type="hidden" name="username" value="<?=$_SESSION["equivida"]["username"]?>" id="username">
                                            <input type="hidden" name="apellidoPaterno" value="<?=format($this->info_cliente->apellidoPaterno)?>" id="apellidoPaterno">
                                            <input type="hidden" name="apellidoMaterno" value="<?=format($this->info_cliente->apellidoMaterno)?>" id="apellidoMaterno">
                                            <input type="hidden" name="primerNombre" value="<?=format($this->info_cliente->primerNombre)?>" id="primerNombre">
                                            <input type="hidden" name="segundoNombre" value="<?=format($this->info_cliente->segundoNombre)?>" id="segundoNombre">
                                            <input type="hidden" name="email" value="<?=$_SESSION["equivida"]["bd"]["email"]?>" id="email">
                                            <input type="hidden" name="cedula" value="<?=$_SESSION["equivida"]["bd"]["numero_de_documento"]?>" id="cedula">
                                            <input type="hidden" name="fechaNacimiento" value="<?=$fecha_nacimiento[0]?>" id="fechaNacimiento">




                                            <input type="hidden" name="ciudad" value="<?=$_SESSION["equivida"]["bd"]["ciudad"]?>" id="ciudad">
                                            <input type="hidden" name="provincia" value="<?=$_SESSION["equivida"]["bd"]["provincia"]?>" id="provincia">
                                            <input type="hidden" name="pais" value="<?=$_SESSION["equivida"]["bd"]["pais"]?>" id="pais">
                                            <input type="hidden" name="tipo_usuario" value="<?=$_SESSION["equivida"]["bd"]["tipo_usuario_id"]?>" id="tipo_usuario">

                                            <!--<p>
                                                    <label>Asunto:</label>-->
                                                    <input type="hidden" name="asunto" value=""  id="asunto"> <!--class="required"-->
                                            <!--</p>-->
                                            <p>
                                                    <label>Apellido Paterno:</label>
                                                    <input type="text" name="apellidoPaternoTxt" value="<?=format($this->info_cliente->apellidoPaterno)?>" class="required" id="apellidoPaternoTxt">
                                            </p>
                                            <p>
                                                    <label>Apellido Materno:</label>
                                                    <input type="text" name="apellidoMaternoTxt" value="<?=format($this->info_cliente->apellidoMaterno)?>" class="required" id="apellidoMaternoTxt">
                                            </p>
                                            <p>
                                                    <label>Primer Nombre:</label>
                                                    <input type="text" name="primerNombreTxt" value="<?=format($this->info_cliente->primerNombre)?>" class="required" id="primerNombreTxt">
                                            </p>
                                            <p>
                                                    <label>Segundo Nombre:</label>
                                                    <input type="text" name="segundoNombreTxt" value="<?=format($this->info_cliente->segundoNombre)?>" class="required" id="segundoNombreTxt">
                                            </p>
                                            <p>
                                                    <label>Email:</label>
                                                    <input type="text" name="emailTxt" value="<?=$_SESSION["equivida"]["bd"]["email"]?>" class="required" id="emailTxt">
                                            </p>
                                            <p>
                                                    <label>Tipo de documento:</label>
                                                    <!--<input type="text" name="tipoDocumentoTxt" value="<?php
                                                            if($_SESSION["equivida"]["bd"]["tipo_de_documento"]=="C"){
                                                                    echo "Cédula";
                                                            }else{
                                                                    echo "Pasaporte";
                                                            }
                                                            ?>" class="required" id="asunto">-->
                                                    <select name="tipoDocumentoTxt" class="required" id="tipoDocumentoTxt">
                                                    <option value="C">Cédula</option>
                                                    <option value="P">Pasaporte</option>                                                
                                                    </select>
                                            </p>
                                            <p>
                                                    <label>Cédula o pasaporte:</label>
                                                    <input type="text" name="cedulaTxt" value="<?=$_SESSION["equivida"]["bd"]["numero_de_documento"]?>" class="required" id="cedulaTxt">
                                            </p>
                                            <p>
                                                    <label>Fecha de Nacimiento:</label>
                                                    <input type="text" name="fechaNacimientoTxt" value="<?=$fecha_nacimiento[0]?>" class="datepicker_fact required" id="fechaNacimientoTxt">
                                            </p>

                                            <p>
                                                    <label>Número de contacto:</label>
                                                    <input type="text" name="n_contactoTxt" value="" class="required" id="n_contactoTxt">
                                            </p>

                                            <!--<p>
                                                    <label>Mensaje:</label>

                                                    <textarea name="mensaje" id="mensaje" class="required" ></textarea>

                                            </p>-->
					<?php
                                            }else{
                                               
                                        ?>
                                            
                                            <input type="hidden" name="status" value="enviar" id="status">

                                            <input type="hidden" name="username" value="<?=$_SESSION["equivida"]["username"]?>" id="username">
                                            <input type="hidden" name="razon_social" value="<?=$_SESSION["poliza"]["data"]->nombreContratante?>" id="razon_social">
                                            <input type="hidden" name="ruc" value="<?=$_SESSION["poliza"]["data"]->numDocContratante?>" id="ruc">
                                            <input type="hidden" name="email" value="<?=$_SESSION["equivida"]["bd"]["email"]?>" id="email">
                                            <input type="hidden" name="tipo_usuario" value="<?=$_SESSION["equivida"]["bd"]["tipo_usuario_id"]?>" id="tipo_usuario">

                                            
                                            
                                            <p>
                                                <label>Raz&oacute;n Social:</label>
                                                    <input type="text" name="razonSocialTxt" value="<?=$_SESSION["poliza"]["data"]->nombreContratante?>" class="required" id="razonSocialTxt">
                                            </p>
                                            <p>
                                                    <label>Ruc:</label>
                                                    <input type="text" name="rucTxt" value="<?=$_SESSION["poliza"]["data"]->numDocContratante?>" class="required" id="rucTxt">
                                            </p>
                                            <p>
                                                    <label>Email:</label>
                                                    <input type="text" name="emailTxt" value="<?=$_SESSION["equivida"]["bd"]["email"]?>" class="required" id="emailTxt">
                                            </p>
                                            
					<?php
                                            }
                                        ?>

					
						
                                            <p align="center"><input type="button"  value="Guardar" id="sendDatos" name="sendDatos"></p>
					</form>

				</div>	
					
		</div>


	</div>
</div>
<!-- Proyección Futura -->


				



<?php
	$this->display("html/layouts/footer.tpl.php");
?>