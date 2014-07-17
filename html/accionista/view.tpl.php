<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_accionista.tpl.php");
	?>
	
	
		
	

<div  class="right">
	
	<div  id="" class="inside">

		

		<div  id="" class="data">
			
			<div  id="" class="inside">
		
				
		
					
			<?php
			
			switch($_SESSION["equivida"]["rol"]){

				case "accionista":
					$tipo_accionista="1";
				break;
				case "director":
					$tipo_accionista="2";
				break;

			}
			
			
			
			
			
			for($i=0;$i<count($this->directorios);$i++){
				
				
				if($this->directorios[$i]["id"]==$_GET["id"]){
				
				
					if(($this->directorios[$i]["tipo_accionista_id"]==$tipo_accionista)||($this->directorios[$i]["tipo_accionista_id"]=="0")||$tipo_accionista==1){
				?>
					<h1> <?=$this->directorios[$i]["nombre"]?></h1>
					
					
					

					<div id="prod-acc">	

						
							
						<?php
						$cont=1;
						$conttab=0;
                                                $contmes=0;
					
						for($j=0;$j<count($this->directorios[$i]["hijo"]);$j++){
							?>
							
							
							
							<?php
							if(($this->directorios[$i]["hijo"][$j]["tipo_accionista_id"]==$tipo_accionista)||($this->directorios[$i]["hijo"][$j]["tipo_accionista_id"]=="0")||$tipo_accionista==1){
							?>
							<div class="acc-box" >
							
							<div class="view-tab click_box" id="botontab-<?=$cont?>"></div>	
							
								
							<h4><?=$this->directorios[$i]["hijo"][$j]["nombre"]?></h4>
							
							
								<div class="acc-info hidden" id="tabview-<?=$cont?>">



									<?php
																
																	for($a=0;$a<count($this->directorios[$i]["hijo"][$j]["hijo"]);$a++){
																	$conttab++;
																		
																		
																		
																		
																		
																		?>
																		
																		
																		
																		<?php
																		if(($this->directorios[$i]["hijo"][$j]["hijo"][$a]["tipo_accionista_id"]==$tipo_accionista)||($this->directorios[$i]["hijo"][$j]["hijo"][$a]["tipo_accionista_id"]=="0")||$tipo_accionista==1){
																		?>
																		
																		<div class="anos">
																			
																			<div class="inside_ano">
																				
																				<a class="ver_ano" id="verano-<?=$conttab?>"><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["nombre"]?></a>
																				
																			</div>
																			
																			
																			<div class="hidden" id="tabano-<?=$conttab?>">
																				
																					<a class="cerrar_tab" id="cerrar-<?=$conttab?>">Cerrar(x)</a>
																			
																			
																			<div class="texto_descripcion">
																				Los archivos que se encuentran en esta categoría: <br><br>
																			</div>
																			
																			
																			<div class="info_ano">
																				
																				<div class="texto">
																				
																					<?php


																					for($e=0;$e<count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"]);$e++){
																						?>
																					<?	
																					if(($this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"][$e]["tipo_accionista_id"]==$tipo_accionista)||($this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"][$e]["tipo_accionista_id"]=="0")||$tipo_accionista==1){
																						
																						?>
																								<div class="archivos">	<a href="<?=URL?><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"][$e]["file"]?>"><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"][$e]["titulo"]?></a> <p><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["archivos"][$e]["descripcion"]?> </p> </div>

																						<?php
																					
																					}
                                                                                                                                                                        
                                                                                                                                                                         ?>
                                                                                                                                                                                              
																					<?}

																					?>
																				
																				
																					<?php
																					
																			if(count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"])>0){
																				for($e=0;$e<count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"]);$e++){
																				?>
                                                                                                                                                                                                
																				<?
																				if(($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$e]["tipo_accionista_id"]==$tipo_accionista)||($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$e]["tipo_accionista_id"]=="0")||$tipo_accionista==1){
																				$contmes++;
																				?>
																				<h5 class="mes" id="mes-<?=$contmes?>"><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$e]["nombre"]?></h5>
																				
                                                                                                                                                                <div  class="hidden" id="tabmes-<?=$contmes?>"> 
                                                                                                                                                        <a class="cerrar_tabmes" id="cerrar-<?=$contmes?>">Cerrar(x)</a>
																				<?php
																	        for($o=0;$o<count($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$e]["archivos"]);$o++){
																		
                                                                                                                                                    
                                                                                                                                                    ?> 
                                                                                                                                                                
                                                                                                                                                    
                                                                                                                                                    <?
																		if(($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$e]["archivos"][$o]["tipo_accionista_id"]==$tipo_accionista)||($this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$e]["archivos"][$o]["tipo_accionista_id"]=="0")||$tipo_accionista==1){		
																			?>
																			
																			<div class="archivos">
                                                                                                                                                            <a href="<?=URL?><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$e]["archivos"][$o]["file"]?>"><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$e]["archivos"][$o]["titulo"]?></a> <p><?=$this->directorios[$i]["hijo"][$j]["hijo"][$a]["hijo"][$e]["archivos"][$o]["descripcion"]?> </p> </div>
																			    
																			<?
																			}   ?>
                                                                                                                                                        
																			<?	} 
																				?></div> 
																				
																				
																				<?
																				
																				}
																				
																				}
																			}
																					
																					?>
																				
																					
																				</div>
																				
																			</div>
																			
																			</div>
																			
																			
																			
																			
																		</div>


																		<?php
																		
																	}
																		
																	}

																	?>	
									

								
									
								
								</div>
						
								</div>
							
								
							<?php
							}
							
							$cont++;
						}
						
						?>	
							

					</div>
				
				
				<?
			}
				}
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