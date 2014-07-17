<div  id="" class="tab">
	<ul>
		<li>
			<a href="<?=URL?>brokers/facturacion/" <? if($_GET["action"]=="facturacion"){?> class="active" <?}?> >Comisiones Liberadas</a>
		</li>
		<li>
			<a href="<?=URL?>brokers/comisiones_pagadas/" <? if($_GET["action"]=="comisiones_pagadas"){?> class="active" <?}?> >Comisiones Pagadas</a>
		</li>
	</ul>	
</div>