<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login</title>
	<meta name="generator" content="TextMate http://macromates.com/">
	<meta name="author" content="Maximiliano Cáceres">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=URL?>css/login.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
	<script src="<?=URL?>js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=URL?>js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
	
	<script src="<?=URL?>js/equivida_login.js" type="text/javascript" charset="utf-8"></script>


</head>
<body>
	
	
	
	
	


	<div class="container">
		<div class="cabecera">
	    	<div id="logo"></div>
	    </div>
	   

	    <div  class="add_header">
	    <ul>
	    	<li> <a href="http://www.equivida.com">Regresar a la Página Web </a> </li>
	    	<li> <a href="<?=URL?>index.php">Ingresar</a> </li>
	    </ul>
	    </div>

	  </div>  	
		
		
		<div class="formulario_crear">
			
			<div class="header_box"></div>
			<div class="body_box">
				
				<div class="inside">
					
					<h1>PORTAL DE USUARIOS</h1>
					
					<form action="<?=URL?>logout" method="POST" class="" accept-charset="utf-8">
						

					<input type="hidden" name="tipo_usuario" value="<?=$_GET["tipo"]?>" id="tipo_usuario">
					
					
					
					<div class="box_chico">
						
						<div class="header_chico"></div>
						<div class="body_chico">
							
							<div class="inside">
								
							<form action="<?=URL?>index.php" method="POST" class="default_form" accept-charset="utf-8">
								<p align="center">
									
									<a href="<?=URL?>?page=logout">
									<img src="<?=URL?>images/error_al_conectarse.png" width="490" height="187" alt="Nohaypolizas">
									</a>
								</p>
								
							
								
							</form>
							</div>
						
						</div>
						<div class="footer_chico"></div>
						
					</div>
					
					</form>
					
					
				</div>
				
				
			</div>
			<div class="footer_box"></div>
			
		</div>




	 <div class="container">
	    <div class="footer">
	    	<div id="logo"></div>
	        <div id="menu">
	        	<ul>
	            	<li><a href="#">MAPA DEL SITIO</a></li>
	                <li><a href="#">ACCESIBILIDAD</a></li>
	                <li><a href="#">OPORTUNIDADES LABORALES</a></li>
	            </ul>
	        </div>
	        <div id="copyright">
	        	<span>&copy; Copyright Equivida 2012</span>
	        </div>
	    </div>
	</div>
	
	
	

</body>
</html>
