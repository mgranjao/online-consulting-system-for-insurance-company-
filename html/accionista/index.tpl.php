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
				
				<?php
				switch($_SESSION["equivida"]["rol"]){
						case "accionista":
						
						for($i=0;$i<count($this->banners);$i++){
							
							if($this->banners[$i]["seccion_id"]=="4"){
							
							?>
							<img src="<?=URL?><?=$this->banners[$i]["imagen"]?>" width="704" height="547" alt="Pantalla Accionistas">
							<?
							}
							
						}
						
						break;
						case "director":
						
							for($i=0;$i<count($this->banners);$i++){
								
								if($this->banners[$i]["seccion_id"]=="5"){
								?>
								<img src="<?=URL?><?=$this->banners[$i]["imagen"]?>" width="704" height="547" alt="Pantalla Directorio">
								<?
								}
							}
							
						break;
				}
				?>
				
		</div>


	</div>
	
<div  id="" class="clear"></div>
</div>
<div  id="" class="clear"></div>







<?php
	$this->display("html/layouts/footer.tpl.php");
?>