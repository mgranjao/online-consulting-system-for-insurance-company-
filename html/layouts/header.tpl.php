<!DOCTYPE html>
<!--[if lt IE 7]><html lang="es" class="ie6"><![endif]-->
<!--[if IE 7]><html lang="es" class="ie7"><![endif]-->
<!--[if IE 8]><html lang="es" class="ie8"><![endif]-->
<!--[if IE 9]><html lang="es" class="ie9"><![endif]-->
<!--[if gt IE 9]><html lang="es"><![endif]-->
<!--[if !IE]>-->
<html lang="es"><!--<![endif]-->


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Equivida - Consulta en Línea</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,400italic' rel='stylesheet' type='text/css'>

	<script src="<?=URL?>js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=URL?>js/jquery.maskedinput-1.3.min.js" type="text/javascript" charset="utf-8"></script>

	
	
	
	<!-- Favicon -->
	
	<link rel="shortcut icon" href="<?=URL?>images/favicon.ico" />
	
	
	<!--[if lt IE 7]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
	<![endif]-->

		<!--[if lte IE 8]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script><![endif]-->

		<!--[if lt IE 9]>
		<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
		<![endif]-->
		
	<script src="<?=URL?>js/modernizr.custom.47227.js" type="text/javascript" charset="utf-8"></script>
	
	
	<!-- Datatable -->
	<script type="text/javascript" language="javascript" src="<?=URL?>helpers/datatable/media/js/jquery.dataTables.js?rand=<?=rand()?>"></script>
	<link rel="stylesheet" href="<?=URL?>helpers/datatable/media/css/demo_table.css?rand=<?=rand()?>" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="<?=URL?>helpers/datatable/media/css/demo_table.css?rand=<?=rand()?>" type="text/css" media="print" title="no title" charset="utf-8">


	<!-- Datatable -->
	
	
	
	<link rel="stylesheet" href="<?=URL?>css/master.css?rand=<?=rand();?>" type="text/css" media="screen" title="no title" charset="utf-8">
	
	<!-- Imprimir -->
	<link rel="stylesheet" href="<?=URL?>css/master_print.css?rand=<?=rand();?>" type="text/css" media="print" />
	
	
	<script src="<?=URL?>js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>

	<link rel="stylesheet" href="<?=URL?>css/colorbox.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<script src="<?=URL?>js/jquery.colorbox.js" type="text/javascript" charset="utf-8"></script>

	
	<script src="<?=URL?>js/jquery-ui-1.10.1.custom.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="<?=URL?>css/redmond/jquery-ui-1.10.1.custom.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
	
	<script src="<?=URL?>js/jquery.selectboxes.js" type="text/javascript" charset="utf-8"></script>
	
	
	<link rel="stylesheet" href="<?=URL?>css/jquery.alerts.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<script src="<?=URL?>js/jquery.alerts.js" type="text/javascript" charset="utf-8"></script>
	
	
	<script src="<?=URL?>js/jquery.tooltip.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="<?=URL?>css/jquery.tooltip.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
	
	<script src="<?=URL?>js/equivida.js?rand=<?=rand();?>" type="text/javascript" charset="utf-8"></script>
	
	
	
	
	
</head>
<body>
	

	
	
	
	<?php

	if((isset($_SESSION["flash_ok"]))&&($_SESSION["flash_ok"]!="")){
		?>
		<div id="bg_enviado"><div class="box_mensaje"> 
			<div class="inside_contenido">
				<a class="cerrar_mensaje"></a>
				<img src="<?=URL?>images/mensaje-ok.png" width="43" height="43" alt="Mensaje Ok"> 
				<p><?php
				echo $_SESSION["flash_ok"];
				?></p>		
			</div>
		</div> </div>
	
		<?php
		$_SESSION["flash_ok"]="";
	}


	if((isset($_SESSION["flash_error"]))&&($_SESSION["flash_error"]!="")){
		?>
		<div id="bg_enviado"><div class="box_mensaje"> 
			<div class="inside_contenido">
				<a class="cerrar_mensaje"></a>
				<img src="<?=URL?>images/mensaje-error.png" width="43" height="43" alt="Mensaje Ok"> 
				<p><?php
				echo $_SESSION["flash_error"];
				?></p>			</div>
		</div> </div>

		<?php
		$_SESSION["flash_error"]="";
	}
	?>
	
	

	
	
	
	<div id="dvLoading"></div>
	
	

	<div  id="" class="container">
	

		<div  id="" class="cabecera">
		
			<a href="http://www.equivida.com">
			<div  id="" class="logo">
			</div>
			</a>

		</div>

		<div  class="add_header">
			

			<ul>
				<?php 

				switch($_SESSION["tipo_user_equivida"]){
					case "admin":
					?>
					<li>Bienvenido(a), <?=format($_SESSION["equivida"]["primerNombre"])?> <?=format($_SESSION["equivida"]["apellidoPaterno"])?></li>
					<?
					break;
					case "adicional":
					?>
					<li>Bienvenido(a), <?=format($_SESSION["equivida"]["primerNombre"])?> (Adicional) </li>
					<?
					break;
				}

				 ?>

				
				
				<li><a href="?page=logout" class="logout">Cerrar Sesión</a></li>
				<li>Volver a <a href="http://www.equivida.com">equivida.com</a></li>
			</ul>
			
			
		
			
		</div>

		<div  id="" class="menu">
			<div  id="" class="inside">
				<?php
				

				
				switch($_SESSION["equivida"]["rol"]){
					case "persona":
					?>
						<ul>
							<li><a href="<?=URL?>index.php" <? if(!isset($_GET["action"])){ ?> class="active" <? } ?>>Inicio</a></li>
							<li><a href="<?=URL?>configuracion/datos_personales/" <? if($_GET["action"]=="datos_personales"){ ?> class="active" <?}?>>Datos Personales</a></li>
							<li><a href="<?=URL?>configuracion/configuracion_acceso/" <? if($_GET["action"]=="configuracion_acceso"){ ?> class="active" <?}?> >Configuración Acceso</a></li>
							<li><a href="<?=URL?>configuracion/contacto/" <? if($_GET["action"]=="contacto"){ ?> class="active" <?}?> >Contacto</a></li>
						</ul>
					<?php
					break;
					case "empresa":
					?>
						<ul>
							<li><a href="<?=URL?>index.php" <? if(!isset($_GET["action"])){ ?> class="active" <? } ?>>Inicio</a></li>
							<li><a href="<?=URL?>configuracion/datos_personales/" <? if($_GET["action"]=="datos_personales"){ ?> class="active" <?}?>>Datos de la Empresa</a></li>
							<li><a href="<?=URL?>configuracion/configuracion_acceso/" <? if(($_GET["action"]=="configuracion_acceso")||($_GET["action"]=="usuario_nuevo")){ ?> class="active" <?}?> >Configuración Acceso</a></li>
							<li><a href="<?=URL?>configuracion/contacto/" <? if($_GET["action"]=="contacto"){ ?> class="active" <?}?> >Contacto</a></li>
						</ul>
					<?php
					break;

					case "brokers":
					?>

						<ul>
							<li><a href="<?=URL?>index.php" <? if(!isset($_GET["action"])){ ?> class="active" <? } ?>>Inicio</a></li>
							<li><a href="<?=URL?>configuracion/datos_personales/" <? if($_GET["action"]=="datos_personales"){ ?> class="active" <?}?>>Datos del Broker</a></li>
							<li><a href="<?=URL?>configuracion/configuracion_acceso/" <? if($_GET["action"]=="configuracion_acceso"){ ?> class="active" <?}?> >Configuración Acceso</a></li>
							<!--<li><a href="<?=URL?>brokers/facturacion/" <? if($_GET["action"]=="facturacion"){ ?> class="active" <?}?> >Comisiones</a></li>-->
							<li><a href="<?=URL?>configuracion/contacto/" <? if($_GET["action"]=="contacto"){ ?> class="active" <?}?> >Contacto</a></li>
						</ul>

					<?
					break;

					case "accionista":
					?>
						<ul>
							<li><a href="<?=URL?>index.php" <? if(!isset($_GET["action"])){ ?> class="active" <? } ?>>Inicio</a></li>
							<li><a href="<?=URL?>configuracion/datos_personales/" <? if($_GET["action"]=="datos_personales"){ ?> class="active" <?}?>>Datos del Accionista</a></li>
							<li><a href="<?=URL?>configuracion/configuracion_acceso/" <? if($_GET["action"]=="configuracion_acceso"){ ?> class="active" <?}?> >Configuración Acceso</a></li>
							<li><a href="<?=URL?>configuracion/contacto/" <? if($_GET["action"]=="contacto"){ ?> class="active" <?}?> >Contacto</a></li>
						</ul>
					<?php
					break;
					
					
					case "director":
					?>
							<ul>
								<li><a href="<?=URL?>index.php" <? if(!isset($_GET["action"])){ ?> class="active" <? } ?>>Inicio</a></li>
								<li><a href="<?=URL?>configuracion/datos_personales/" <? if($_GET["action"]=="datos_personales"){ ?> class="active" <?}?>>Datos del Director</a></li>
								<li><a href="<?=URL?>configuracion/configuracion_acceso/" <? if($_GET["action"]=="configuracion_acceso"){ ?> class="active" <?}?> >Configuración Acceso</a></li>
								<li><a href="<?=URL?>configuracion/contacto/" <? if($_GET["action"]=="contacto"){ ?> class="active" <?}?> >Contacto</a></li>
							</ul>
					<?php
					break;
					
				}
				
				?>
				
				
			</div>
		</div>

	</div>

	<div  class="page">
		
		<div  id="" class="body">
			<div  id="" class="inside">
					
			
				
		
