		<div   class="left">
			
			<div  id="" class="inside">
				
				<div  id="" class="polizas">
					<div  id="insidePoliza"  class="inside">
						Selecciona la Póliza:
						<?php
						
						$url_form='';
						
						if((isset($_GET["page"]))&&(isset($_GET["action"]))){
							$url_form='?page='.$_GET["page"]."&".'action='.$_GET["action"];
						}else{
							$url_form="?page=dashboard";
						}
						
						
						?>
						
						<form action="<?=URL?><?=$url_form?>" class="poliza_form" method="post" accept-charset="utf-8">
						<p>
							<div id="select_persona">
							<select name="poliza"  id="poliza">
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
                                                            </div>
							
						
						
						</p>
						<p align="center">
							<input type="submit" name="enviar" value="Consultar" id="enviar">
						</p>
							</form>
					</div>
				
				</div>




				<div  id="" class="opciones_secundarias">
				
					<div class="select-pol">Información de la póliza:<br />
<b><?=$_SESSION["poliza"]["nro_pol"]?></b></div>

					<ul class="submenu_secundario">
						<li class="tuseguro">
							<a class="botonmenu" id="botonmenu-1" >Mi seguro</a>
							<div class="submenu <? if(!(($_GET["action"]=="")||($_GET["action"]=="menu")||($_GET["action"]=="coberturas")||($_GET["action"]=="beneficiarios"))){ ?>hidden <?}?>" id="submenu-1">
								<ul>
										<li><a href="<?=URL?>index.php" <? if($_GET["action"]=="" || $_GET["action"]=="menu"){?> class="active" <?}?>> Datos de tu p&oacute;liza </a></li>
										<li><a href="<?=URL?>personas/coberturas/" <? if($_GET["action"]=="coberturas"){?> class="active" <?}?>>Coberturas</a></li>
										
										<?php
											if(($_SESSION["poliza"]["cod_ramo"]!="50")&&($_SESSION["poliza"]["cod_ramo"]!="25")){
										
										?>
										<li><a href="<?=URL?>personas/beneficiarios/" <? if($_GET["action"]=="beneficiarios"){?> class="active" <?}?>>Beneficiarios</a></li>
										
										<?php
										}
										?>
										
								</ul>
							</div>
						</li>
						
						
						<li class="estadocuenta">
							<?php 

							
							if($_SESSION["equivida"]["estadocuenta"]==1){
								?>
									<a class="botonmenu" id="botonmenu-2">Estado de Cuenta & Transacciones</a>
								<?
							}else{
								?>
									<a class="botonmenu" id="botonmenu-2">Transacciones</a>
								<?
							}
							?>

							
							<div class="submenu <? if(!(($_GET["action"]=="estado_de_cuenta")||($_GET["action"]=="solicitud")||($_GET["action"]=="solicitud")||($_GET["action"]=="retiro")||($_GET["action"]=="prestamo")||($_GET["action"]=="pagos"))){ ?>hidden <?}?>" id="submenu-2"> 
								<ul>

									<?php 
									if($_SESSION["equivida"]["estadocuenta"]==1){
									 ?>
									
									<?php
									
									if($_SESSION["poliza"]["cod_ramo"]=="59"||$_SESSION["poliza"]["cod_ramo"]=="58"||$_SESSION["poliza"]["cod_ramo"]=="55"){
									?>
									
									<li><a href="<?=URL?>personas/estado_de_cuenta/" <? if($_GET["action"]=="estado_de_cuenta"){?> class="active" <?}?> >Estado de Cuenta</a></li>
									
									<?php
								}
									?>
									<?php 
									}
									 ?>
										<?php
										if(($_SESSION["poliza"]["cod_ramo"]=="59")||($_SESSION["poliza"]["cod_ramo"]=="55")){

											?>
									<!--<li><a href="<?=URL?>personas/retiro/" <? if($_GET["action"]=="retiro"){?> class="active" <?}?> >Consulta Retiro</a></li>-->
									<?php
								}
									?>
									
									<?php
									if(($_SESSION["poliza"]["cod_ramo"]=="55")||($_SESSION["poliza"]["cod_ramo"]=="59")){
									?>
									<!--<li><a href="<?=URL?>personas/prestamo" <? if($_GET["action"]=="prestamo"){?> class="active" <?}?> >Consulta Préstamo</a></li>-->
									<?php
									}
									?>
									
									<?php
									if(($_SESSION["poliza"]["cod_ramo"]!="50")||($_SESSION["poliza"]["cod_ramo"]!="25")){
									?>
									<li><a href="<?=URL?>personas/pagos/" <? if($_GET["action"]=="pagos"){?> class="active" <?}?> >Pagos Pendientes</a></li>
									<?php
									}
									?>
									
								</ul>
							</div>
						</li>
						
						<li class="reporte">
							<a  class="botonmenu" id="botonmenu-3">Reporte de Siniestros</a>
							
							<div class="submenu <? if(!(($_GET["action"]=="siniestro")||($_GET["action"]=="notificar"))){ ?>hidden <?}?>" id="submenu-3">
								<ul>
									<li><a href="<?=URL?>personas/siniestro/" <? if($_GET["action"]=="siniestro"){?> class="active" <?}?> >Documentos Requeridos</a></li>
									<li><a href="<?=URL?>personas/notificar/" <? if($_GET["action"]=="notificar"){?> class="active" <?}?> >Reportar</a></li>
								</ul>
							</div>

						</li>
						<li class="solicita_factura">
							<a class="botonmenu"  id="botonmenu-4" >Solicita tu Factura</a>
							
							<div class="submenu <? if(!(($_GET["action"]=="factura"))){ ?>hidden <?}?>" id="submenu-4">
								<ul>
									<li><a href="<?=URL?>personas/factura/" <? if($_GET["action"]=="factura"){?> class="active" <?}?> >Última facturación</a></li>
								</ul>
							</div>
							
						</li>

						<?php 
						if($_SESSION["mostrar_noticias"]==1) {?>

							<li class="solicita_factura"><a href="<?=URL?>personas/informate/">Infórmate</a></li>
						<?php 
						} ?>					
						<div class="clear"></div>
					</ul>

				</div>

			</div>
			
		</div>
	
