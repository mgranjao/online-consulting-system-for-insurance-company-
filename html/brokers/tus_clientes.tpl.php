<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_brokers.tpl.php");
	?>

	<div  class="right">

		<div  id="" class="inside">

			

			<div  id="" class="clear"></div>

			<div  id="" class="data">

				<div  id="" class="inside">

				<h1>Tus Clientes</h1>


			
				 <div class="datatable">
			
			
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

						<thead>
							<tr>
								<th>Nº</th>
								<th>Código Asegurado</th>
								<th>Contratante</th>
								<th>RUC</th>
								<th>Seleccionar</th>
							</tr>
						</thead>
						<tbody>

						<?php 

						for($i=0;$i<count($_SESSION["equivida"]["clientes"]);$i++){
						?>
							
							<tr>
								<td><?=$i+1?></td>
								<td><?=texto($_SESSION["equivida"]["clientes"][$i]->codAseg)?></td>
								<td><?=texto($_SESSION["equivida"]["clientes"][$i]->contratante)?></td>
								<td><?=texto($_SESSION["equivida"]["clientes"][$i]->numeroDocumento)?></td>
								<td> <input type="radio" name="cliente_seleccionar" value="<?=$_SESSION["equivida"]["clientes"][$i]->numeroDocumento?>" id="cliente_seleccionar"> </td>
							</tr>


						<?
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


	<?php
		$this->display("html/layouts/footer.tpl.php");
	?>