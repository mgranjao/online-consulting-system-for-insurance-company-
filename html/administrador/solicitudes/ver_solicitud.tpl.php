
<?php
	$this->display("html/layouts/admin_header.tpl.php");
?>


		
		<div class="formulario_crear">
			
			<div class="header_box"></div>
			<div class="body_box">
				
				<div class="inside">
					
					<h1>Administrador Consulta en Línea</h1>
					
					
					<div class="panel_admin">
						
						<div class="left_admin">
							
							
							<?php
								$this->display("html/layouts/admin_menu.tpl.php");
							?>
							
							
							
						</div>
						
						<div class="right_admin">
							
							
							<div class="area_trabajo">
								
								
							
								
								<div class="inside">
									
										<h4>Solicitud Nº <?=$this->solicitud[0]["id"]?></h4>
										
									
										
										<p>
											La solicitud fue generada con los siguientes datos:
										</p>
										
											<a href="javascript:history.back(1)" class="regresar"></a>
										
										<?php
										if(($this->solicitudes[0]["poliza"]==0)||($this->solicitudes[0]["poliza"]=="")){
											$poliza="-";
										}else{
											$poliza=$this->solicitudes[0]["poliza"];
										}
										?>
										
										<p>
											<b>Email:</b> <?=$this->solicitud[0]["email"]?><br>
											<b>Sección:</b> <?=$this->solicitud[0]["seccion"]?><br>
											<b>Póliza:</b> <?=$this->solicitud[0]["poliza"]?><br>
											<b>Acción:</b> <?=$this->solicitud[0]["accion"]?><br>
											<b>Fecha Creada:</b> <?=$this->solicitud[0]["fecha_create"]?><br>
										</p>
										
										<?php
										
										if($this->solicitud[0]["html_cliente"]!=""){
										
										$this->solicitud[0]["html_cliente"]=str_replace("a|","á",$this->solicitud[0]["html_cliente"]);
										$this->solicitud[0]["html_cliente"]=str_replace("e|","é",$this->solicitud[0]["html_cliente"]);
										$this->solicitud[0]["html_cliente"]=str_replace("i|","í",$this->solicitud[0]["html_cliente"]);
										$this->solicitud[0]["html_cliente"]=str_replace("o|","ó",$this->solicitud[0]["html_cliente"]);
										$this->solicitud[0]["html_cliente"]=str_replace("u|","ú",$this->solicitud[0]["html_cliente"]);
										$this->solicitud[0]["html_cliente"]=str_replace("n|","&ntilde;",$this->solicitud[0]["html_cliente"]);
										?>
											
											
										<p>
											<b>Correo Enviado al Cliente:</b>
											<div class="ver_email">
												<?=$this->solicitud[0]["html_cliente"]?>
											</div>
											
										</p>
										
										<?php
										}
										
										if($this->solicitud[0]["html_equivida"]!=""){
										
										$this->solicitud[0]["html_equivida"]=str_replace("a|","á",$this->solicitud[0]["html_equivida"]);
										$this->solicitud[0]["html_equivida"]=str_replace("e|","é",$this->solicitud[0]["html_equivida"]);
										$this->solicitud[0]["html_equivida"]=str_replace("i|","í",$this->solicitud[0]["html_equivida"]);
										$this->solicitud[0]["html_equivida"]=str_replace("o|","ó",$this->solicitud[0]["html_equivida"]);
										$this->solicitud[0]["html_equivida"]=str_replace("u|","ú",$this->solicitud[0]["html_equivida"]);
										$this->solicitud[0]["html_equivida"]=str_replace("n|","&ntilde;",$this->solicitud[0]["html_equivida"]);
										?>
										
										<p>
											<b>Correo Enviado a Equivida:</b>
											<div class="ver_email">
												<?=stripslashes($this->solicitud[0]["html_equivida"])?>
											</div>
										</p>
										<?php
										}
										?>
										
									
								</div>
								
							</div>
							
							
						</div>
						
						<div class="clear"></div>
						
					</div>
					
					
					
					
				</div>
				
				
			</div>
			<div class="footer_box"></div>
			
		</div>


<?php
	$this->display("html/layouts/admin_footer.tpl.php");
?>