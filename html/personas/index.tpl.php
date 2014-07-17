<?php
	$this->display("html/layouts/header.tpl.php");
?>

<div id="menu_persona">
	<?php
		$this->display("html/layouts/menu_cliente.tpl.php");
	?></div>
<input type="hidden" id="hddControlador" value="personas">
<div  class="right">
	
	<div  id="" class="inside">

		<?php
			//$this->display("html/layouts/menu_tuseguro.tpl.php");
		?>
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			
		
			
			
			<h1> Datos de tu póliza </h1>
			
			<div class="view-data">
				
					<?php

					//if(!(isset($this->infopoliza[0]->descRamo))){

						?>
						<!--	<a href="<?=URL?>?page=configuracion&action=contacto">
								<img src="<?=URL?>images/noinfohaypolizas.png" width="680" height="63" alt="Noinfohaypolizas">
							</a>-->

						<?php

					//}else{
						
						
					
						?>
                            
                            <div  id="view_data_poliza" >
                                <br/>
                                                        
                                                        <Center> <img src="<?=URL?>images/ajax-bar-loader.gif" width="256" height="25" alt="Noinfohaypolizas"></Center> 
                                <br/>                        
                            </div>


					<div class="clear"></div>
                    
                    
				</div>
				<div class="aclaratoria">
            <div class="recuerde">Recuerda:</div>
            <ul>
            <li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20datos%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
            </ul>
            </div>
			</div>
			
			
			
	
			</div>



	</div>


</div>
<div  id="" class="clear"></div>


<?php
	$this->display("html/layouts/footer.tpl.php");
?>