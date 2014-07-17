
<div   class="left">
	
	<div  id="" class="inside">

		

		
		
		<div  id="" class="polizas">
			<div  id="" class="inside">
				Seleccione Cliente:
				<form action="<?=URL?>?page=brokers&action=informacion_poliza" class="poliza_form" method="post" accept-charset="utf-8">
				
				
				<p>
					
						<select name="cliente" class="seleccion_cliente" id="cliente">

							<option value="" <?if(!(isset($_SESSION["cliente"]["ruc"]))){ ?> selected <?}?>>Elija un cliente</option>	
							<?php
							for($i=0;$i<count($_SESSION["equivida"]["clientes"]);$i++){
								?>
								<option value="<?=$_SESSION["equivida"]["clientes"][$i]->numeroDocumento?>"
									<? if(($_SESSION["cliente"]["ruc"]==$_SESSION["equivida"]["clientes"][$i]->numeroDocumento)&&(isset($_SESSION["cliente"]["ruc"])))
									{ echo "selected"; } ?>
									><?=$_SESSION["equivida"]["clientes"][$i]->contratante?></option>
								<?
							}
							?>
						</select>
					
				
				</p>

				Póliza:


				<p>
					
					<select name="poliza_cliente"  id="poliza_cliente">

						<option value="#">Seleccione</option>		

							<?php
								for($i=0;$i<count($_SESSION["equivida"]["poliza"]);$i++){
									?>
									<option value="<?=$_SESSION["equivida"]["poliza"][$i]["numeroPoliza"]?>-<?=$_SESSION["equivida"]["poliza"][$i]["codigoSucursal"]?>-<?=$_SESSION["equivida"]["poliza"][$i]["codigoRamo"]?>"
										<? if($_SESSION["equivida"]["poliza"][$i]["numeroPoliza"]==$_SESSION["poliza"]["nro_pol"]){?>selected<?}?>
										><?=$_SESSION["equivida"]["poliza"][$i]["numeroPoliza"]?></option>
									<?
								}
								?>
						
					</select>
					
				</p>

				<p align="center">
					<input type="submit" name="enviar" value="Consultar" id="enviar">
				</p>
					</form>
			</div>
		</div>

		<div  id="" class="opciones_secundarias">
		
			
			<ul class="submenu_secundario">
			
				<?php 
				if(isset($_SESSION["poliza"])){

				?>


				<li class="tuseguro">


					<a class="botonmenu" id="botonmenu-2" > Información General</a>
					
					
					<div class="submenu <? if(!(($_GET["action"]=="informacion_poliza")||($_GET["action"]=="coberturas_contratadas")||($_GET["action"]=="certificado_individual"))){ ?>hidden <?}?>" id="submenu-2">
						<ul>
								<li><a href="<?=URL?>brokers/informacion_poliza/"  <? if($_GET["action"]=="informacion_poliza"){?> class="active" <?}?> > Información Póliza </a></li>
								<li><a href="<?=URL?>brokers/coberturas_contratadas/" <? if($_GET["action"]=="coberturas_contratadas"){?> class="active" <?}?>>Coberturas Contratadas</a></li>
								<li><a href="<?=URL?>brokers/certificado_individual/" <? if($_GET["action"]=="certificado_individual"){?> class="active" <?}?> >Certificado Individual</a></li>
						</ul>
					</div>

				</li>



				<li class="tuseguro">


					<a href="<?=URL?>?page=brokers&action=asegurados"  > Asegurados</a>
					

				</li>


				<li class="reporte">
							<a  class="botonmenu" id="botonmenu-3">Reporte & Siniestros</a>
							
							<div class="submenu <? if(!(($_GET["action"]=="siniestro")||($_GET["action"]=="notificar"))){ ?>hidden <?}?>" id="submenu-3">
								<ul>
									<li><a href="<?=URL?>brokers/siniestro/" <? if($_GET["action"]=="siniestro"){?> class="active" <?}?> >Documentos Requeridos</a></li>
									<li><a href="<?=URL?>brokers/notificar/" <? if($_GET["action"]=="notificar"){?> class="active" <?}?> >Notificar</a></li>
								</ul>
							</div>

				</li>

				<?

				}
				?>


			</ul>

		</div>

	</div>
	
</div>

