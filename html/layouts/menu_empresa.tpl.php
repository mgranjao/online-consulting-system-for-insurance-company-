


<div   class="left">
	
	<div  id="" class="inside">
		
		<div  id="" class="polizas">
			<div  id="insidePoliza" class="inside">
				Seleccione la Póliza:

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
					<div id="select_empresa">
					<select name="poliza"  id="poliza">
						<?php
						$array_aux=array();
						
						
						for($i=0;$i<count($_SESSION["equivida"]["poliza"]);$i++){
							
							$entrar=1;
							for($a=0;$a<count($array_aux);$a++){
								if($array_aux[$a]==$_SESSION["equivida"]["poliza"][$i]["numeroPoliza"]){
									$entrar=0;
								}
							}
							
							if($entrar==1){
						    
							$array_aux[]=$_SESSION["equivida"]["poliza"][$i]["numeroPoliza"];
						
								?>
							<option value="<?=$_SESSION["equivida"]["poliza"][$i]["numeroPoliza"]?>-<?=$_SESSION["equivida"]["poliza"][$i]["codigoSucursal"]?>-<?=$_SESSION["equivida"]["poliza"][$i]["codigoRamo"]?>"
								<? if($_SESSION["equivida"]["poliza"][$i]["numeroPoliza"]==$_SESSION["poliza"]["nro_pol"]){?>selected<?}?>
								><?=$_SESSION["equivida"]["poliza"][$i]["numeroPoliza"]?></option>
							<?
							}
							
							
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
		
			<span>Información de la Póliza: <b><?=$_SESSION["poliza"]["nro_pol"]?></b></span>

			<ul class="submenu_secundario">
				<li class="tuseguro">
					<a href="<?=URL?>index.php" class="botonmenu" id="botonmenu-1" >Tu póliza</a>
					
					<!--
					<div class="submenu <? if(!(($_GET["action"]=="")||($_GET["action"]=="vidas_seguras"))){ ?>hidden <?}?>" id="submenu-1">
						<ul>
								<li><a href="index.php" <? if($_GET["action"]==""){?> class="active" <?}?> > Información General </a></li>
								<li><a href="?page=empresas&action=vidas_seguras" <? if($_GET["action"]=="vidas_seguras"){?> class="active" <?}?>>Vidas Seguras</a></li>
								
						</ul>
					</div>
					-->
				</li>
				
				<li class="estadocuenta">
					<a class="botonmenu" id="botonmenu-2" >Coberturas</a>
					
						<div class="submenu <? if(!(($_GET["action"]=="coberturas")||($_GET["action"]=="certificado_individual"))){ ?>hidden <?}?>" id="submenu-2">
							<ul>
									<li><a href="<?=URL?>empresas/coberturas/" <? if($_GET["action"]=="coberturas"){?> class="active" <?}?>  > Coberturas Contratadas </a></li>
									<li><a href="<?=URL?>empresas/certificado_individual/" <? if($_GET["action"]=="certificado_individual"){?> class="active" <?}?>>Certificado Individual</a></li>

							</ul>
						</div>
					
				</li>
				<li class="reporte">
					<a class="botonmenu" id="botonmenu-3">Siniestros</a>
				
					<div class="submenu <? if(!(($_GET["action"]=="siniestro")||($_GET["action"]=="notificar"))){ ?>hidden <?}?>" id="submenu-3">
						<ul>
								<li><a href="<?=URL?>empresas/siniestro/" <? if($_GET["action"]=="siniestro"){?> class="active" <?}?> > Documentos Requeridos </a></li>
								<li><a href="<?=URL?>empresas/notificar/" <? if($_GET["action"]=="notificar"){?> class="active" <?}?> > Notificación de Siniestro</a></li>

						</ul>
					</div>
				
					
				</li>

					<?php 
				if($_SESSION["mostrar_noticias"]==1) {?>

						<li class="solicita_factura"><a href="<?=URL?>empresas/informate/">Infórmate</a></li>
				
				<?php 
				} ?>	

				
				
				
				
				
				<div class="clear"></div>
			</ul>

		</div>

	</div>
	
</div>

