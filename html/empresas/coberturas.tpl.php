<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_empresa.tpl.php");
	?>

<div  class="right">
	
	<div  id="" class="inside">

		<?php
			//$this->display("html/layouts/menu_empresa_coberturas.tpl.php");
		?>
	
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
				
			
			<h1>Coberturas Contratadas</h1>

			
			<ul class="imprimir">

				<li><a href="<?=URL?>?page=empresas&action=coberturas&format=excel" class="exportar">Descargar</a></li>
				<li><a href="<?=URL?>?page=empresas&action=coberturas&format=print" class="print">Imprimir</a></li>
		
			</ul>
			
			
			

			<!-- 
			<div  id="" class="buscar">
				<ul>
					<li> 
							<label>Filial:</label>
							<select name="filial" id="filial" size="1">
								<option value="option1">Seleccionar</option>


							</select>
					</li>
					
					<li>
						
							<label>Categoría:</label>
							<select name="filial" id="filial" size="1">
								<option value="option1">Seleccionar</option>


							</select>
						
					</li>
				</ul>
			</div>
			
			<div class="clear"></div>
		
			 -->
			
			<div class="datatable">
					
					<?php 


				
				
					


					if(count($this->coberturas)!=0){
					
					$ban=0;
                                        
						foreach($this->coberturas as $key=>$value){
							if((!(is_int($key)))&&($ban==0)){
									$this->coberturas=array($this->coberturas);
									$ban=1;
							}
                                                        
						}
                                                $arr=$this->coberturas;
                                                $cont=  count($this->coberturas);
                                                for($i=1;$i<$cont;$i++){
                                                    for($j=0;$j<$i;$j++){
                                                        if($this->coberturas[$i] == $arr[$j])
                                                        {
                                                            unset($this->coberturas[$i]);
                                                            
                                                        }
                                                        else{
                                                            $j++;
                                                            
                                                        }
                                                             
                                                    }
                                                }
                                                $this->coberturas=  array_values($this->coberturas);
                                                
                                                

					}

					
					?>		
				


					<?php 

					$categoria=0;

					foreach($this->coberturas[0] as $key=>$value){
							if($key=="cod_ind_categ"){
								$categoria=1;
							}
						}


					 ?>

					 <?php 

					 if($categoria==0){

					  ?>

					<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

						<thead>
							<tr>
								<th>Cobertura</th>
                                                                <?php
                                                                if($this->mostrarValorAsegurado==TRUE)
                                                                { 
                                                                ?> 
                                                                    <th>Valor Asegurado</th>
								<?php
                                                                }
                                                                ?>
                                                                <th>Vencimiento</th>
								<th>Prima</th>
							</tr>
						</thead>
						<tbody>

							<?php 

							for($i=0;$i<count($this->coberturas);$i++){
                                                            
								?>

								<tr>
									<td><?=$this->coberturas[$i]->cobertura?></td>
									<?php
                                                                        if($this->mostrarValorAsegurado==TRUE)
                                                                        { 
                                                                        ?> 
                                                                            <?php if($this->coberturas[$i]->imp_suma_aseg!=0){ ?><td><?=number_format($this->coberturas[$i]->imp_capital,2)?></td><?}else{?><td>Servicio</td><?}?>
									<?php 
                                                                        }
                                                                        ?>
                                                                        <td><?=$this->coberturas[$i]->fec_vto?></td>
									<td><?=number_format($this->coberturas[$i]->imp_prima,2)?></td>
								</tr>
								<?
                                                            
							}

							?>

							
						</tbody>
					</table>
					<?php 
					}else{
					?>
					

					<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

						<thead>
							<tr>
								<th>Categoría</th>
								<th>Descripción</th>
                                                                <?php
                                                                if($this->mostrarValorAsegurado==TRUE)
                                                                { 
                                                                ?> 
                                                                    <th>Valor asegurado</th>
                                                                <?php 
                                                                }
                                                                ?>
                                                               
								<!--<th>Tasa</th>-->
							</tr>
						</thead>
						<tbody>

							<?php 

							for($i=0;$i<count($this->coberturas);$i++){
                                                            
								?>

								<tr>
									<td class="alinear-izq"><?=$this->coberturas[$i]->txt_desc_categ?></td>
									<td class="alinear-izq"><?=$this->coberturas[$i]->txt_desc2?></td>
									<?php
                                                                        if($this->mostrarValorAsegurado==TRUE)
                                                                        { 
                                                                        ?> 
                                                                            <?php if($this->coberturas[$i]->imp_suma_aseg!=0){ ?><td class="alinear-der"><?=number_format($this->coberturas[$i]->imp_suma_aseg,2)?></td><?}else{?><td class="alinear-der">Servicio</td><?}?>
									<?php 
                                                                        }
                                                                        ?>
                                                                        <!--<td class="alinear-der"><?=number_format($this->coberturas[$i]->pje_tasa,2)?></td>-->
								</tr>
								<?
                                                                
							}

							?>

							
						</tbody>
					</table>



					<?
					} 
					?>
				
				
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