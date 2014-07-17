<?/*
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
									
                                                                    
										<h4>Historial de Solicitudes</h4>
										
										<p>
											Revise las polizas_colectivas generadas por el usuario:
										</p>
					
											
									
									
									
                                                                                <a href="?page=administrador&action=agregar_polizas_colectivas" >Agregar Pólizas</a>
									
									<div class="datatable">


											<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

												<thead>
													<tr>

														<th>ID</th>
														<th>Nro Póliza</th>
														<th>Contratante</th>
														<th>Archivo</th>
														<th>Fecha Creación</th>
													</tr>
												</thead>
												<tbody>

													<?php

													for($i=0;$i<count($this->polizas_colectivas);$i++){

														?>
															<tr>
																<td><?=$this->polizas_colectivas[$i]["id"]?></td>
																<td><?=$this->polizas_colectivas[$i]["n_poliza"]?></td>
																<td><?=$this->polizas_colectivas[$i]["nombre_contratante"]?></td>
																<td><?=$this->polizas_colectivas[$i]["url_archivo"]?></td>
																<td><?=$this->polizas_colectivas[$i]["fecha_creacion"]?></td>
																<td> <a href="?page=administrador&action=ver_solicitud&id=<?=$this->polizas_colectivas[$i]["id"]?>"><img src="images/view_polizas_colectivas.png" width="24" height="24" alt="View Solicitudes"> </a> </td>
															</tr>
														<?php
													}


													?>






												</tbody>
											</table>


									</div>
									
									
									
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

*/?>


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


                            <?php
                            //if (($this->usuarios[0]["tipo_usuario_id"] == 2) || ($this->usuarios[0]["tipo_usuario_id"] == 3)) {
                                ?>

                                <div class="panel_usuarios">

                                    <h1>Pólizas Colectivas</h1>
										
										<p>
											Pólizas colectivas ingresadas:
										</p>

                                     <a href="<?=URL?>?page=administrador&action=agregar_polizas_colectivas" class="crear_usuario">Agregar Pólizas</a>

                                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

                                        <thead>
                                            <tr>
                                                <th>Id</th>
						<th>Nro Póliza</th>
						<th>Contratante</th>
						<th>Archivo</th>
						<th>Fecha Creación</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            <?php
                                            $cont = 0;
                                            for ($i = 0; $i < count($this->polizas_colectivas); $i++) {
                                                $cont++;
                                                ?>
                                                <tr>
                                                    <td><?=$this->polizas_colectivas[$i]["id"]?></td>
																<td><?=$this->polizas_colectivas[$i]["n_poliza"]?></td>
																<td><?=$this->polizas_colectivas[$i]["nombre_contratante"]?></td>
																<td><?=$this->polizas_colectivas[$i]["url_archivo"]?></td>
																<td><?=$this->polizas_colectivas[$i]["fecha_creacion"]?></td>
                                                    <!--<td> <a href="?page=administrador&action=editar_usuario_seguimiento&id=<?= $this->usuarios_seguimiento[$i]["id"] ?>"><img src="<?=URL?>images/icon_edit.png" width="17" height="18" alt="Icon Edit"> </a> </td>

                                                    <td> <a href="?page=administrador&action=eliminar_usuario_seguimiento&id=<?= $this->usuarios_seguimiento[$i]["id"] ?>" class="eliminar" title="¿Deseas borrar el registro?"><img src="<?=URL?>images/delete.png"></a> </td>
                                                        -->
                                                </tr>
        <?
    }
    ?>



                                        </tbody>
                                    </table>






                                </div>


    <?php
//}
?>


                       










                        </div>




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