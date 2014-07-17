<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Equivida - Consulta en Línea</title>
	<meta name="generator" content="TextMate http://macromates.com/">
	<meta name="author" content="Maximiliano Cáceres">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=URL?>css/admin.css?rand=<?=rand()?>" type="text/css" media="screen" title="no title" charset="utf-8">
	
	<link rel="shortcut icon" href="images/favicon.ico" />
	<script src="<?=URL?>js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=URL?>js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
	
	
	<!-- Datatable -->
	<script type="text/javascript" language="javascript" src="<?=URL?>helpers/datatable/media/js/jquery.dataTables.js?rand=<?=rand()?>"></script>
	<link rel="stylesheet" href="<?=URL?>helpers/datatable/media/css/demo_table.css?rand=<?=rand()?>" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="<?=URL?>helpers/datatable/media/css/demo_table.css?rand=<?=rand()?>" type="text/css" media="print" title="no title" charset="utf-8">

	<script src="<?=URL?>js/jquery-ui-1.10.1.custom.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="<?=URL?>css/redmond/jquery-ui-1.10.1.custom.css" type="text/css" media="screen" title="no title" charset="utf-8">
	

	<!-- Datatable -->


	
	<link rel="stylesheet" href="<?=URL?>css/jquery.alerts.css" type="text/css" media="screen" title="no title" charset="utf-8">
	

	<script src="<?=URL?>js/jquery.alerts.js" type="text/javascript" charset="utf-8"></script>
	
	
	
	
	<script src="<?=URL?>js/jquery.maskedinput-1.3.min.js" type="text/javascript" charset="utf-8"></script>
	
	<link rel="stylesheet" href="<?=URL?>css/jquery.alerts.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<script src="<?=URL?>js/jquery.alerts.js" type="text/javascript" charset="utf-8"></script>
	
	
	<script src="<?=URL?>js/admin.js?rand=<?=rand();?>" type="text/javascript" charset="utf-8"></script>


	

</head>
<body>
	
	
		<div id="dving"></div>
	
	


	<div class="container">
		<div class="cabecera">
	    	<div id="logo"></div>
	    </div>
	   

	    <div  class="add_header">
	    <ul>
			<?php
			if(isset($_SESSION["equivida"])){
				?>
				<li> <a href="?page=logout" class="logout">Salir(x)</a> </li>
		    
				<?
			}else{
				?>
				<li> <a href="http://www.equivida.com">Regresar a la Página Web </a> </li>
		    	<li> <a href="<?=URL?>index.php">Ingresar</a> </li>
				<?
			}
			?>
		
	    	
	    </ul>
	    </div>

	  </div>  	
		