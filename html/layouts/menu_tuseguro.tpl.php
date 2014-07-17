<div  id="" class="tab">
	<ul>
		<li>
			<a href="<?=URL?>index.php"  <? if(!isset($_GET["action"])){ ?> class="active" <? } ?> >Tu Seguro</a>
		</li>
		<li>
			<a href="<?=URL?>personas/coberturas/" <? if($_GET["action"]=="coberturas"){ ?> class="active" <? } ?> >Coberturas</a>
		</li>
	</ul>	
</div>