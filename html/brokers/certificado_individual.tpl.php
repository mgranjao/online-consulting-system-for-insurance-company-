<?php 
    unset($_SESSION["flash_error"]);
    
    if($_COOKIE['error']==1)
    {
        $_SESSION["flash_error"]="Al momento no se puede generar un certificado individual a través de este servicio, para solicitarlo comuníquese con nosotros al correo: atencioncolectivos@equivida.com.";
        setcookie("error", NULL, time()-3600);
        
    }
?>
<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_brokers.tpl.php");
	?>

<div  class="right">
	
	<div  id="" class="inside">

		<?php
			//$this->display("html/layouts/menu_empresa_coberturas.tpl.php");
		?>
	
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			<h1>Certificado Individual</h1>
			
				<p>
						Seleccione el Beneficiario y llene los campos para generar el certificado:
				</p>

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
			
			
			 <div class="formulario">

				




			<div class="datatable">
			
			
				<form action="<?=URL?>?page=brokers&action=certificado_individual&format=certificado"  method="POST" id="certificado_individual" accept-charset="utf-8">
					
			
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

						<thead>
							<tr>
								<th>Nº</th>
								<th>Nombres</th>
								<th>Documento</th>
							
								<th>Seleccionar</th>

							</tr>
						</thead>
						<tbody>

						<?php 
						$total_filas=count($this->vidas_seguras);
						//$total_filas=4;
						for($i=0;$i<$total_filas;$i++){
						//for($i=0;$i<1;$i++){
							if($this->vidas_seguras[$i]->estadoActual!="POLIZA CANCELADA" && isset($this->vidas_seguras[$i]->fechaBaja)!=1){
						?>
							
							<tr>
								<td class="alinear-cen"><?=$i+1?></td>
								<td class="alinear-izq"><?=texto($this->vidas_seguras[$i]->apellido1)?> <?=texto($this->vidas_seguras[$i]->apellido2)?> <?=texto($this->vidas_seguras[$i]->nombre)?></td>
								<td class="alinear-cen"><?=texto($this->vidas_seguras[$i]->documento)?></td>
								<td class="alinear-cen"> 
								<input type="radio" name="seleccionado" value="<?=$this->vidas_seguras[$i]->documento?>" 
								<? if($i==0){ ?>  checked <?}?>
								id="seleccionado"> 
								</td>
							</tr>


						<?
						}

						}
						?>
							
							
						</tbody>
					</table>
					<?php 
					if($total_filas>=9){
						$margin="40";
						?>
						<div style="margin-top:<?=$margin?>px; position:relative; width:680px;" >
						<?
					}else{
						$total=10;
						$total*=$total_filas;
						$margin=80-$total;
						$margin*-1;
						?>
					<div style="margin-top:-<?=$margin?>px; position:relative; width:680px;" >
						<?
					}
					
					?>

					
					<div  id="" class="clear">
					
					</div>
<!--					
					<p>
						<label> Certificado Dirigido a </label> <input type="text" name="dirigido_a" value="" id="dirigido_a">
						<label class="error error_dirigida_a" ></label>
					</p>
-->
<!--					

					<p>
						<label> Ciudad </label> <input type="text" name="ciudad" class="ciudad" value="" id="ciudad">
						<label class="error error_ciudad" ></label>
					</p>
-->
					<p align="center">
						<a class="generar_certificado"></a>
					</p>

					</div>

				


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
        $_SESSION['vidas_seguras']=$this->vidas_seguras;
	$this->display("html/layouts/footer.tpl.php");
?>