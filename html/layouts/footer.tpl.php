		
	</div>
</div>

<div  id="" class="footer_page"></div>

</div>


<div class="container">
	
	
	<div class="footer">
		<div id="logo"></div>
	    <div id="menu">
	    	<ul>
	        	<li><a href="http://www.equivida.com/index.php/mapa-del-sitio">Mapa de sitio</a></li>
	            <li><a href="http://www.equivida.com/index.php/oportunidades-laborales">Oportunidades Laborales</a></li>
	        </ul>
	    </div>
	    <div id="copyright">
	    	<span>&copy; Copyright <a href="http://www.equivida.com">Equivida</a> 2013</span>
	    </div>
	</div>
	
</div>



<?php


if(1==0){
	?>
	
	
	<!-- Proyección Futura -->
	<div style="display:none">
		<div id="box_clientes">
			
			<?php
			if($_SESSION["aux_broker"]==1){
			?>
			<a class="cerrar"></a>
			<?php
			}
			?>
			<div class="header">

				<div class="inside">
				
				<h1>Seleccione un Cliente</h1>
					
				</div>

			</div>


			<div class="text">
				
				
				<div class="inside_cliente">
					
				
				<form action="<?=URL?>?page=brokers&action=informacion_poliza" class="poliza_form" method="post" accept-charset="utf-8">
				
				Seleccionar cliente para visualizar sus pólizas:
				
				<div class="datatable">
					
						<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_clientes">

							<thead>
								<tr>
									<th>Nº</th>
									<th>Cliente</th>
									<th>Seleccionar</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$cont=0;
								for($i=0;$i<count($_SESSION["equivida"]["clientes"]);$i++){
									$cont++;
									?>
									<tr>
										<td><?=$cont?></td>
										<td><?=$_SESSION["equivida"]["clientes"][$i]->contratante?></td>
										<td><input type="radio" name="cliente" value="<?=$_SESSION["equivida"]["clientes"][$i]->numeroDocumento?>" <?
										
										
										if(isset($_SESSION["poliza"]["data"])){
											if($_SESSION["equivida"]["clientes"][$i]->numeroDocumento==$_SESSION["cliente"]["ruc"]){
												?>
												CHECKED
												<?
											}
										}else{
											if($cont==1){?>CHECKED<?}
										}
										
										?> /></td>
									</tr>
									<?
								}
								?>
								
							</tbody>
						</table>
						
						<div class="clear"></div>
						
						<p align="center">
							<input type="submit" name="aceptar" value="Aceptar" id="aceptar">
							<?php
							if($_SESSION["aux_broker"]==0){
							?>
							<br><br><a href="<?=URL?>logout" class="cancelar">Cancelar</a>
							<?php
							}
							?>
						</p>
					
				</div>
				
				
				</form>
				
				
				</div>
				
				
			</div>


		</div>
	</div>
	<!-- Proyección Futura -->
	
	
	
		<?
		if($_SESSION["aux_broker"]==0){
			$_SESSION["aux_broker"]=1;
			
		?>
		<script type="text/javascript" charset="utf-8">
		$.colorbox({inline:true, href:"#box_clientes",
		onOpen:function(){ 
			$('a.cerrar').click(function(event){
				parent.$.fn.colorbox.close();
			});
		}});
		</script>
		<?	
		}
	
}

?>


<!--Google Anatytics-->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34136815-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!--Google Anatytics-->	
		


<input type="hidden" name="URL" value="<?=URL?>" id="URL" />
</body>
</html>
