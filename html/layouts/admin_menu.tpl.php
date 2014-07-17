	<h2>Menú</h2>
	
	
	<div class="submenu">
		<h3>Usuarios</h3>
		
		<ul>
                        <? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>    
			<li <? if($_GET["action"]==""){?> class="active"  <?}?>><a href="?page=dashboard" >Todos</a></li>
                        <?}elseif($_SESSION["equivida"]["permiso_todos"]==1){?>
                        <li <? if($_GET["action"]==""){?> class="active"  <?}?>><a href="<?=URL?>dashboard" >Todos</a></li>
                        <?}?>
                        
                        <? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>    
			<li <? if($_GET["action"]=="personas"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/personas/"  >Personas</a></li>
                        <?}elseif($_SESSION["equivida"]["permiso_personas"]==1){?>
                        <li <? if($_GET["action"]=="personas"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/personas_usuario_seguimiento/"  >Personas</a></li>
                        <?}?>
                        
                        <? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>    
			<li <? if($_GET["action"]=="empresas"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/empresas/"  >Empresas</a></li>
                        <?}elseif($_SESSION["equivida"]["permiso_empresas"]==1){?>
                        <li <? if($_GET["action"]=="empresas"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/empresas_usuario_seguimiento/"  >Empresas</a></li>
                        <?}?>
                        
                        <? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>    
			<li <? if($_GET["action"]=="brokers"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/brokers/">Brokers</a></li>
                        <?}elseif($_SESSION["equivida"]["permiso_brokers"]==1){?>
                        <li <? if($_GET["action"]=="brokers"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/brokers_usuario_seguimiento/">Brokers</a></li>
                        <?}?>
                        
                        <? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>    
			<li <? if($_GET["action"]=="accionista"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/accionistas/"  >Accionistas</a></li>
                        <?}elseif($_SESSION["equivida"]["permiso_accionistas"]==1){?>
                        <li <? if($_GET["action"]=="accionista"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/accionistas_usuario_seguimiento/"  >Accionistas</a></li>
                        <?}?>
                        
                        
		</ul>
	</div>
	
        <? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>    
	<div class="submenu">
		<h3>Usuarios Seguimiento</h3>
		
		<ul>
			<li <? if($_GET["action"]=="usuarios_seguimiento"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/usuarios_seguimiento/" >Usuarios</a></li>
		</ul>
	</div>
	 <?}?>    
        
         <? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>  
	<div class="submenu">
		<h3>Archivos</h3>
		
		<ul>
			<li <? if($_GET["action"]=="directorios"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/directorios/" >Administrar</a></li>
		</ul>
	</div>
	 <?}elseif($_SESSION["equivida"]["permiso_archivos"]==1){?>
        <div class="submenu">
		<h3>Archivos</h3>
		
		<ul>
			<li <? if($_GET["action"]=="directorios"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/directorios_usuario_seguimiento/" >Administrar</a></li>
		</ul>
	</div>
	<?}?>
        
        <? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>  
	<div class="submenu">
		<h3>Pólizas Colectivas</h3>
		
		<ul>
			<li <? if($_GET["action"]=="polizas_colectivas"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/polizas_colectivas/" >Administrar</a></li>
		</ul>
	</div>
	 <?}elseif($_SESSION["equivida"]["permiso_polizas_colectivas"]==1){?>
        <div class="submenu">
		<h3>Pólizas Colectivas</h3>
		
		<ul>
			<li <? if($_GET["action"]=="polizas_colectivas"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/polizas_colectivas/" >Administrar</a></li>
		</ul>
	</div>
	<?}?>
       
        
        <? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>  
	<div class="submenu">
		<h3>Solicitudes</h3>
		
		<ul>
			<li <? if($_GET["action"]=="historial"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/historial/" >Historial</a></li>
		</ul>
	</div>
	<?}elseif($_SESSION["equivida"]["permiso_solicitudes"]==1){?>
        <div class="submenu">
		<h3>Solicitudes</h3>
		
		<ul>
			<li <? if($_GET["action"]=="historial"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/historial_usuario_seguimiento/" >Historial</a></li>
		</ul>
	</div>
        <?}?>

         <? if ($_SESSION["equivida"]["rol"]!="seguimiento"){?>  
	<div class="submenu">
		<h3>Contenidos</h3>
		
		<ul>
			<li <? if($_GET["action"]=="noticias"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/noticias/" >Noticias</a></li>
			<li <? if($_GET["action"]=="banners"){?> class="active"  <?}?> ><a href="<?=URL?>administrador/banners/" >Banners</a></li>
		</ul>
	</div>
        <?}?>