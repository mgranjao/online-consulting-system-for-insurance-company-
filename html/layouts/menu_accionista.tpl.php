
<div   class="left">
	
	<div  id="" class="inside">
		
	


		<div  id="" class="opciones_secundarias">
		
			
		
			
			<ul class="submenu_secundario">
				
				<?php
				
				for($i=0;$i<count($this->directorios);$i++){
					
					if(($_SESSION["equivida"]["rol"]=="director")&&($this->directorios[$i]["tipo_accionista_id"]=="2")){
					?>
					<li class="tuseguro" ><a href="<?=URL?>accionista/view/?id=<?=$this->directorios[$i]["id"]?>"><?=$this->directorios[$i]["nombre"]?></a></li>
					<?
					}	
					
					
					if(($_SESSION["equivida"]["rol"]=="accionista")&&(($this->directorios[$i]["tipo_accionista_id"]=="1")||($this->directorios[$i]["tipo_accionista_id"]=="2"))){
					?>
					<li class="tuseguro" ><a href="<?=URL?>accionista/view/?id=<?=$this->directorios[$i]["id"]?>"><?=$this->directorios[$i]["nombre"]?></a></li>
					<?
					}
					
					if($this->directorios[$i]["tipo_accionista_id"]=="0"){
					?>
						<li class="tuseguro" ><a href="<?=URL?>accionista/view/?id=<?=$this->directorios[$i]["id"]?>"><?=$this->directorios[$i]["nombre"]?></a></li>
					<?php
					}
				}
				?>


				<?php 
						if($_SESSION["mostrar_noticias"]==1) {?>

							<li class="solicita_factura"><a href="<?=URL?>accionista/informate/">Infórmate</a></li>
						<?php 
						} ?>	
			
			</ul>

		</div> 

	</div>
	
</div>

