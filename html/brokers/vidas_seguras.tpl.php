<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_brokers.tpl.php");
	?>

<div  class="right">
	
	<div  id="" class="inside">

		<?php
			//$this->display("html/layouts/menu_empresa_tuseguro.tpl.php");
		?>
	
		

		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			<h1>Vidas Seguras </h1>
			

			<ul class="imprimir">

				<li><a href="<?=URL?>?page=brokers&action=asegurados&format=excel" class="exportar">Exportar</a></li>
				<li><a href="<?=URL?>?page=brokers&action=asegurados&format=print" class="print">Imprimir</a></li>
				<div  id="" class="clear"></div>
			
			</ul>
			
			
		
			
			<div class="clear"></div>


			<?php 

			
			if(count($this->vidas_seguras)!=0){

				$ban=0;
				foreach($this->vidas_seguras as $key=>$value){
							if((!(is_int($key)))&&($ban==0)){
									$this->vidas_seguras=array($this->vidas_seguras);
									$ban=1;
							}
				}

			}


		

			?>
			 
			<div class="datatable">
			
			
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

						<thead>
							<tr>
								<th>Nº</th>
								<th>Nombres</th>
								<th>Cédula</th>
                                                                
								<th>Fecha Inclusión</th>
								<th>Tipo de Asegurado</th>
								
								<?php
									if(($_SESSION["poliza"]["cod_ramo"]!="50")&&($_SESSION["poliza"]["cod_ramo"]!="25")){
								?>
								<th>Beneficiarios</th>
								
								<?php
								}
								?>
								
							</tr>
						</thead>
						<tbody>

						<?php 
                                                //var_dump($this->vidas_seguras[0]);
                                                //die();
						for($i=0;$i<count($this->vidas_seguras);$i++){
							
							
							if($this->vidas_seguras[$i]->estadoActual=="ACTIVO"){
							
						?>
							
							<tr>
								<td class="alinear-cen"><?=$i+1?></td>
								<td class="alinear-izq"><?=texto($this->vidas_seguras[$i]->apellido1)?> <?=texto($this->vidas_seguras[$i]->apellido2)?> <?=texto($this->vidas_seguras[$i]->nombre)?></td>
								<td class="alinear-cen"><?=texto($this->vidas_seguras[$i]->documento)?></td>
								<td class="alinear-cen"><?=texto($this->vidas_seguras[$i]->fechaAlta)?></td>
								<td class="alinear-izq"><?=texto($this->vidas_seguras[$i]->tipoAsegurado)?></td>
								
								<?php
									if(($_SESSION["poliza"]["cod_ramo"]!="50")&&($_SESSION["poliza"]["cod_ramo"]!="25")){
								?>
								<td class="alinear-izq"><a class="beneficiarios" id="code-<?=$this->vidas_seguras[$i]->codAsegurado?>"> <img src="<?=URL?>images/beneficiarios.png" /> </a></td>
								<?php
								}
								?>
								
								
							</tr>


						<?
							}
						
						}
						?>
							
							
						</tbody>
					</table>

				
			</div>
			
			
			
			<div class="clear"></div>
			
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
				<h1>Beneficiarios</h1>
			</div>

		</div>
		
		<div class="text">
			
				<a class="cerrar">Cerrar(x)</a>
				<br>
				Listado de Beneficiarios:
				

				<div  id="ajax_tabla">
				
				</div>


		</div>


	</div>
</div>


<?php
	$this->display("html/layouts/footer.tpl.php");
?>