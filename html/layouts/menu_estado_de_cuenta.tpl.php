<div  id="" class="tab">
	<ul>
		<li>
			<a href="<?=URL?>personas/estado_de_cuenta/"  <? if($_GET["action"]=="estado_de_cuenta"){ ?> class="active" <? } ?> >Consulta</a>
		</li>
		<li>
			<a href="<?=URL?>personas/solicitud/" <? if($_GET["action"]=="solicitud"){ ?> class="active" <? } ?> >Solicitud E. de Cuenta</a>
		</li>
		<li>
			<a href="<?=URL?>personas/retiro/" <? if($_GET["action"]=="retiro"){ ?> class="active" <? } ?> >Retiro</a>
		</li>
		
		<li>
			<a href="<?=URL?>personas/prestamo/" <? if($_GET["action"]=="prestamo"){ ?> class="active" <? } ?> >Préstamo </a>
		</li>
		
		<li>
			<a href="<?=URL?>personas/pagos/" <? if($_GET["action"]=="pagos"){ ?> class="active" <? } ?> >Pagos </a>
		</li>
	
	</ul>	
</div>