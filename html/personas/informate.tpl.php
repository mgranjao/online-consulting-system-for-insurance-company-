<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_cliente.tpl.php");
	?>

<div  class="right">
	
	<div  id="" class="inside">

		<?php
			//$this->display("html/layouts/menu_tuseguro.tpl.php");
		?>
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			
		
			
			
			<h1> Infórmate </h1>
			
		
					<?php 

					for($i=0;$i<count($this->noticias);$i++){
						?>
						<div  class="noticias">
						
						<h1><a href="<?=URL?>?page=<?=$_GET["page"]?>&action=informate&id=<?=$this->noticias[$i]["id"]?>"><?=stripslashes($this->noticias[$i]["titulo"])?></a></h1>
						<small><b>Publicado:</b> <?=$this->noticias[$i]["fecha_create"]?></small>

						<?php 
						if((isset($_GET["id"]))){
							?>
							<a href="<?=URL?>?page=<?=$_GET["page"]?>&action=informate" class="regresar"></a>
							<?
						} ?>

					
						
						
							<div class="parrafo">
								
									<?php 
									if($this->noticias[$i]["imagen"]!=""){
										?>
										<img src="<?=$this->noticias[$i]["imagen"]?>" />
										<?
									} ?>
								
								<?=stripslashes($this->noticias[$i]["breve"])?>
							</div>
						
							
						
							<?php 
							if(!(isset($_GET["id"]))){
								?>
								
							
								<a href="<?=URL?>?page=<?=$_GET["page"]?>&action=informate&id=<?=$this->noticias[$i]["id"]?>" style="float:right;margin-right:20px;">Leer más</a>
							
								<?
							}else{
									
								$this->noticias[$i]["contenido"]=str_replace(Chr(10),"<br>",$this->noticias[$i]["contenido"]);
								
								?>
								<div class="clear"></div>
								<div class="parrafo">
								
									<?=stripslashes($this->noticias[$i]["contenido"])?>
								</div>
								<?
							}
							 ?>
							
					<div class="clear"></div>
					
					</div>
					<?php
				}
					?>
			
		
	
			</div>

		</div>

	</div>


</div>
<div  id="" class="clear"></div>


<?php
	$this->display("html/layouts/footer.tpl.php");
?>