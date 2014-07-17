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

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			<h1>Configuración de Acceso</h1>
			
			
			
				<div class="formulario">
					
						<p class="aclaratoriaAcc">
                        Puedes editar el correo y contraseña del usuario presionando el botón editar <a href="<?=URL?>?page=configuracion&amp;action=editar_usuario_admin&amp;id=1">(<img width="17" height="18" alt="Icon Edit" src="<?=URL?>images/icon_edit.png">).</a>
                        </p>
                        <p>
						Actualmente tienes registrados los siguientes usuarios:
						</p>

						<?php 
						if(($_SESSION["equivida"]["rol"]=="empresa")||($_SESSION["equivida"]["rol"]=="brokers")){
						if($_SESSION["tipo_user_equivida"]=="admin"){
						 ?>
						
						<a href="<?=URL?>?page=configuracion&action=usuario_nuevo" class="crear_usuario">Crear Usuario</a>
						<?php 
						}
						}
						 ?>
						
						
						<div class="datatable">


							<?php


							if(($_SESSION["equivida"]["rol"]=="persona")||($_SESSION["equivida"]["rol"]=="accionista")||($_SESSION["equivida"]["rol"]=="director")){
							?>

							<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

								<thead>
									<tr>
										<th>Nº</th>
										<th>Email</th>
										<th>Tipo de usuario</th>
										<th>Editar</th>
									</tr>
								</thead>
								<tbody>
								
									<tr>
										<td class="alinear-cen">1</td>
										<td class="alinear-izq"><?=$_SESSION["equivida"]["username"]?></td>
										<td class="alinear-izq">Principal</td>
										<td class="alinear-cen"> <a href="<?=URL?>?page=configuracion&action=editar_usuario_admin&id=<?=$_SESSION["equivida"]["id"]?>"><img src="<?=URL?>images/icon_edit.png" width="17" height="18" alt="Icon Edit"> </a> </td>
									</tr>

								</tbody>
							</table>
							

							<?
							}else{
							?>
							

								<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

								<thead>
									<tr>
										<th>Nº</th>
										<th>Email</th>
										<th>Tipo de usuario</th>
										<th>Editar</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>

									<?php 
									$cont=0;
									if($_SESSION["tipo_user_equivida"]=="admin"){
										$cont=1;
									
										?>

									<tr>
										<td class="alinear-cen">1</td>
										<td class="alinear-izq"><?=$_SESSION["equivida"]["username"]?></td>
										<td class="alinear-izq">Principal</td>
										<td class="alinear-cen"> <a href="<?=URL?>?page=configuracion&action=editar_usuario_admin&id=<?=$_SESSION["equivida"]["id"]?>"><img src="<?=URL?>images/icon_edit.png" width="17" height="18" alt="Icon Edit"> </a> </td>
										<td class="alinear-izq"> <small>Administrador</small></td>
									</tr>

										<?
									}
									 ?>
								
									<?php 
									
									for($i=0;$i<count($this->usuarios_adicionales);$i++){
										$cont++;
										
										if(($_SESSION["tipo_user_equivida"]=="admin")||($_SESSION["email__adicional_user_equivida"]==$this->usuarios_adicionales[$i]["email"])){
										?>
										<tr>
											<td class="alinear-cen"><?=$cont?></td>
											<td class="alinear-izq"><?=$this->usuarios_adicionales[$i]["email"]?></td>
											<td>Adicional</td>
											<td class="alinear-cen"> <a href="<?=URL?>?page=configuracion&action=editar_usuario_adicional&id=<?=$this->usuarios_adicionales[$i]["id"]?>"><img src="<?=URL?>images/icon_edit.png" width="17" height="18" alt="Icon Edit"> </a> </td>
											<?php
												if($_SESSION["tipo_user_equivida"]=="admin"){
											?>
											<td> <a href="<?=URL?>?page=configuracion&action=eliminar_usuario_adicional&id=<?=$this->usuarios_adicionales[$i]["id"]?>" class="eliminar" title="¿Deseas borrar el registro?"><img src="<?=URL?>images/delete.png"></a> </td>
											<?php
											}else{
												?>
											<td> <center>-</center> </td>		
												<?php
											}
											?>
											
										</tr>
										<?
										}
									}
									 ?>

						
									
								</tbody>
							</table>
							
						



							<?
							}


							 ?>

							
						
							
						</div>
						
						
					
				<div class="aclaratoria">
                    <div class="recuerde">Recuerda:</div>
                    <ul>
                    <li>Puedes editar tu cuenta de usuario, cambiar tu correo electrónico y contraseña. Si utilizas el generador de contraseñas, te sugerimos que la anotes en un lugar seguro para que no la olvides.</li>
                    <li>Si no estás de acuerdo con la información presentada o tienes alguna inquietud por favor comunícate con nosotros al correo <a href="mailto:servicioalcliente@equivida.com?Subject=Contacto%20por%20beneficiarios%20de%20la%20póliza">servicioalcliente@equivida.com</a> o llama a nuestro Call Center <b>1 800 EQUIVIDA (378484)</b>.</li>
                    </ul>
                </div>
					
				
				</div>
			
			
			</div>

		</div>

	</div>


</div>
<div  id="" class="clear"></div>



<?php
	$this->display("html/layouts/footer.tpl.php");
?>