<?php
	$this->display("html/layouts/header.tpl.php");
?>

<?php


switch($_SESSION["equivida"]["rol"]){
	
	case "persona":
		$this->display("html/layouts/menu_cliente.tpl.php");
	break;
	case "empresa":
		$this->display("html/layouts/menu_empresa.tpl.php");		
	break;
	case "brokers":
		$this->display("html/layouts/menu_brokers.tpl.php");
	break;
	case "accionista":
		$this->display("html/layouts/menu_accionista.tpl.php");
	break;
	case "director":
		$this->display("html/layouts/menu_accionista.tpl.php");
	break;
	
}


?>

<div  class="right">
	
	<?php
		
		include 'html/layouts/message.tpl.php';
		
		
	?>
	
	
	<div  id="" class="inside">

		<!-- <div  id="" class="tab">
					<ul>
						<li>
							<a href="" class="active">Tu Seguro</a>
						</li>
						<li>
							<a href="">Coberturas</a>
						</li>
					</ul>	
				</div> -->
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
												<img src="<?=URL?><?=$this->noticias[$i]["imagen"]?>" />
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
				

				

	</div></div>

	</div>
	
<div  id="" class="clear"></div>
</div>
<div  id="" class="clear"></div>







<?php
	$this->display("html/layouts/footer.tpl.php");
?>