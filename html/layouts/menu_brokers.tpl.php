
<div   class="left">
	
	<div  id="" class="inside">

		
			
			<?php
                        
                        $tipoPoliza=$_GET["tipo"];
                        $clasePoliza=$_SESSION["poliza"]["data"]->tipo;   
                        if(isset($_SESSION["poliza"]["data"]->nombreContratante)){
                             
                              
                        ?>
			
			<div class="info_cliente">
				
				<h1>Esta viendo al cliente:</h1>
				<ul>
					<li class="cliente"><?=$_SESSION["poliza"]["data"]->nombreContratante?></li>
					<li><a href="<?=URL?>brokers" class="cambiar_cliente">Ver lista de clientes</a></li>
					
					<div class="clear"></div>
					
				</ul>
				
			</div>
		
			<?php
			}
			?>
		
	
		
			<form action="<?=URL?>brokers/informacion_poliza/" class="poliza_form" method="post" accept-charset="utf-8">
		
		

		
		<div  id="ver_polizas_cliente" class="polizas <? if(count($_SESSION["equivida"]["poliza"])==0){?>hidden<?}?>" >
			<div  id="" class="inside">
				<label>Póliza: </label>
				
					

	

						<select name="poliza_cliente"  id="poliza_cliente">

						
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

	
				<p align="center">
					<input type="submit" name="enviar" value="Consultar" id="enviar">
				</p>
				
			
				
			</div>
		</div>
		
			</form>
		

		<div  id="" class="opciones_secundarias brokers">
		
			
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
								<?php 
                                    
                                                                    if(!strcmp($tipoPoliza, "INDIVIDUAL")==0)
                                                                    {
                                                                        if(strcmp($clasePoliza, "AUTOMATICA")==0)
                                                                        {        
                                                                ?>
                                                                        <li><a href="<?=URL?>brokers/certificado_individual/" <? if($_GET["action"]=="certificado_individual"){?> class="active" <?}?> >Certificado Individual</a></li>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>    
                                                                    
                                                </ul>
					</div>

				</li>



				<li class="tuseguro">


					<a href="<?=URL?>brokers/asegurados/"  > Asegurados</a>
					

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
				
					<?php 
					if($_SESSION["mostrar_noticias"]==1) {?>

							<li class="solicita_factura"><a href="<?=URL?>brokers/informate/">Infórmate</a></li>
					<?php 
					} ?>

				<?

				}
				?>


			

				
				


			</ul>

		</div>

	</div>
	
</div>

