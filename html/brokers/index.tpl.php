<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_brokers.tpl.php");
		
		
		
	?>
	

<div  class="right">
	
	<div  id="" class="inside">

		

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			
			
			
			<h1> Listado de Clientes</h1>
			
			
			
				<input type="hidden" name="num_paginas" value="<?=intval(count($_SESSION["equivida"]["clientes"])/10)?>" id="num_paginas">
				<input type="hidden" name="pagina" value="1" id="pagina">
				<?php
				$cont=0;
                                            $arr;
                                            for($i=0;$i<count($_SESSION["equivida"]["clientes"]);$i++){
                                            $arr[$i]=$_SESSION["equivida"]["clientes"][$i]->numeroDocumento;
                                            }
                                            //busca ruc repetido
                                            /*$arr = array_unique($arr); 
                                            for($i=0;$i<count($_SESSION["equivida"]["clientes"]);$i++){
                                                
                                                for($j=0;$j<count($_SESSION["equivida"]["clientes"]);$j++){
                                                    if($arr[$i]==$_SESSION["equivida"]["clientes"][$j]->numeroDocumento)
                                                    $arr[$i]=$_SESSION["equivida"]["clientes"][$j];
                                                }
                                            }
                                            
                                            $_SESSION["equivida"]["clientes"]=$arr;*/
				$total_registros=count($_SESSION["equivida"]["clientes"]);
				if($total_registros>10){
					$total_registros=10;
				}
			
				?>
				
				
			<div class="view-data">
				
				<div class="broker_letrero">
					<div class="inside">
						<h1>Tienes <span class="num"><?=count($_SESSION["equivida"]["clientes"])?></span> Clientes</h1>
						
						Seleccione para
						visualizar las pólizas:
						
					</div>
				</div>
				
				
				<div class="listado_clientes">
					
					
					<div class="buscador">
						<p>
						<label>BUSCAR:</label>
						<input type="text" name="buscar_texto_broker" value="" id="buscar_texto_broker">
						
						<input type="button" name="Buscar" value="" id="buscar_broker">
						
						</p>
					</div>
					
					
					<div class="inside">
							
							<div class="ver_clientes_brokers">
						
						
							<?
							for($i=0;$i<$total_registros;$i++){
								
								
								if($_SESSION["equivida"]["clientes"][$i]->contratante!=""){
								$cont++;
								?>
								
								<div class="info_cliente">
									
									<ul>
										<li class="numero"><?=$cont?> :</li>
										<li><a href="<?=URL?>?page=brokers&action=informacion_poliza&cliente=<?=$_SESSION["equivida"]["clientes"][$i]->numeroDocumento?>&tipo=<?=$_SESSION["equivida"]["clientes"][$i]->ramos?>"><?=textoMAYUSCULAS($_SESSION["equivida"]["clientes"][$i]->contratante)?></a> <span class="ruc"><span class="ruc_titulo">RUC:</span> <?=$_SESSION["equivida"]["clientes"][$i]->numeroDocumento?></span><span class="ruc"> | <span class="ruc_titulo">Tipo:</span> <?=$_SESSION["equivida"]["clientes"][$i]->ramos?></span></li>
										<div class="clear"></div>
									</ul>
									
								</div>
								
								<?php
								}
							
							}
							?>
							
							
								</div>

							<?php
						
							if($cont>=10){
							?>
							<a href="" class="vermas">Ver más Clientes</a>
							<?php
							}
							?>
							
					</div>
						
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