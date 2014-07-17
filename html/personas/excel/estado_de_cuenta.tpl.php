<?php 

header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=Equivida-EstadodeCuenta".date("Y-m-d").".xls");
header("Pragma: no-cache");
header("Expires: 0");


if(count($this->estado_de_cuenta)!=0){
					
		$ban=0;
		foreach($this->estado_de_cuenta as $key=>$value){
		if((!(is_int($key)))&&($ban==0)){
			$this->estado_de_cuenta=array($this->estado_de_cuenta);
			$ban=1;
		}
		}
}
	if(count($this->estado_de_cuenta)>0){
		
			$total=count($this->estado_de_cuenta);
			$pos=$total-1;
?>

<table height="70px" width="227px" border="0px" >
<tr>
	<td  colspan="4"  width="227px" height="70px" >	
		<img src="http://www.tagadata.com/equivida/images/logo.png" width="227px" height="57px" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
</tr>
</table>




<table border="0px">
	
			<tr>
				<td colspan="7" style="align=center;">
					<p align="center">
					<center><b>Estado de Cuenta</b></center>
					</p>
				</td>
			</tr>
	
		<tr>
			<td colspan="7">
			<b>Valor Asegurado:</b>
			<?=number_format($this->estado_de_cuenta[$pos]->valorAsegurado,2,'.', ',')?>
			</td>
		</tr>


	<tr>
		<td colspan="7">
			<b>Saldo de Cuenta Individual:</b>
		<?=number_format($this->estado_de_cuenta[$pos]->saldoCuentaIndividual,2 ,'.', ',')?>
		</td>
	</tr>
	<tr>
		<td colspan="7">
			<b>Cargos por Rescate : </b>
			<?=number_format($this->estado_de_cuenta[$pos]->cargosPorRescate,2 ,'.', ',')?>
		</td>
	</tr>

<!--	<tr>
		<td colspan="7">
		<b>Valor del Rescate Total :</b>
		<?=number_format($this->estado_de_cuenta[$pos]->valorRescateTotal,2 ,'.', ',')?>
		</td>
	</tr>


<tr>	
		<td colspan="7">
		<b>Saldo Préstamo :</b>
		<?=number_format($this->estado_de_cuenta[$pos]->saldoDeudaPorPrestamo,2 ,'.', ',');?>
		</td>
</tr>-->

<tr>	
		<td colspan="7">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
		</td>
</tr>

</table>


<?php
				if($_SESSION["poliza"]["cod_ramo"]=="59"){
					
					?>
<table border="1px">
	<tr>
		<th>Año / Mes</th>
		<th><abbr class="verinfo" title="Corresponde a los pagos realizados cada mes.">Depósitos<span class="pregunta_signo">?</span> </abbr></th>
		<th>
																<abbr class="verinfo" title="Monto por gastos administrativos e impuestos establecidos por ley.">Gastos admin. <span class="pregunta_signo">?</span> </abbr>
		</th>
		<th>
																<abbr class="verinfo" title="Monto que se debita cada mes por costos propios de la póliza.">Deducción mensual <span class="pregunta_signo">?</span> </abbr></th>
		<th><abbr class="verinfo" title="Valor acreditado mensualmente por intereses.">Interés acreditado <span class="pregunta_signo">?</span>  </abbr></th>
		<th>Tasa de interés</th>
                 <!-- <th>Retiros</th>
                <th>Ajustes</th>-->
                 <th>Saldo Cuenta Individual</th>
                <!-- <th>Prestamos Otorgados</th> -->
	</tr>
        <!--
<?

for($i=0;$i<count($this->estado_de_cuenta);$i++){

	if($this->estado_de_cuenta[$i]->fechaVigenDesde!=""){

		$this->estado_de_cuenta[$i]->gastosAdmin=str_replace("-","",$this->estado_de_cuenta[$i]->gastosAdmin);
		
		?>
		<tr>
			<td><?=$this->estado_de_cuenta[$i]->fechaVigenDesde?></td>
			<td><center>$ <?=number_format($this->estado_de_cuenta[$i]->depositosEfectuados,2 ,'.', ',')?></center></td>
			<td><center>$ <?=number_format($this->estado_de_cuenta[$i]->gastosAdmin,2 ,'.', ',')?></center></td>
			<td><center>$ <?=number_format($this->estado_de_cuenta[$i]->deduccionMensual,2 ,'.', ',')?></center></td>
			<td><center>$ <?=number_format($this->estado_de_cuenta[$i]->interesesAcreditados,2 ,'.', ',')?></center></td>
			<td><center><?=number_format($this->estado_de_cuenta[$i]->tasaRendimientoMensual,2 ,'.', ',')?> %</center></td>
			<td><center>$ <?=number_format($this->estado_de_cuenta[$i]->saldo,2 ,'.', ',')?></center></td>
		</tr>
		<?
	}

}
}
?>
     -->           
 
<?php 
													for($i=0;$i<count($this->estado_de_cuenta);$i++){

														if($this->estado_de_cuenta[$i]->fechaVigenDesde!=""){


															$this->estado_de_cuenta[$i]->impGastos=str_replace("-","",$this->estado_de_cuenta[$i]->impGastos);
															?>
															
															
															

															<tr>
															<td class="alinear-izq"><?=$this->estado_de_cuenta[$i]->aaaa_proceso?> / <?=$this->estado_de_cuenta[$i]->mm_proceso?></td>
															<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impReserva,2 ,'.', ',')?></td>
															<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impGastos,2 ,'.', ',')?></td>
															<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impDM,2 ,'.', ',')?></td>
															<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impIE,2 ,'.', ',')?></td>
															<td class="alinear-der"><?=number_format($this->estado_de_cuenta[$i]->pjeTasaInteres,2 ,'.', ',')?> %</td>
															<!--<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impRetiro,2 ,'.', ',')?></td>
                                                                                                                        <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impAjustes,2 ,'.', ',')?></td>-->
                                                                                                                        <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impDisponible,2 ,'.', ',')?></td>
                                                                                                                       <!-- <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impSaldoPrestamos,2 ,'.', ',')?></td>-->
															</tr>
															
															
															<?									

														}

														}
														?>                
                
</table>

<?php
} ?>


<?php
 if($_SESSION["poliza"]["cod_ramo"]=="58"){
 ?>


<table border="1px">
													
														<tr>
															<th>Año / Mes</th>
															<!--<th><abbr class="verinfo" title="Corresponde a los pagos realizados cada mes.">Depósitos<span class="pregunta_signo">?</span> </abbr></th>
															<th>
																<abbr class="verinfo" title="Monto por gastos administrativos e impuestos establecidos por ley.">Gastos admin. <span class="pregunta_signo">?</span> </abbr>
															</th>
															<th>
																<abbr class="verinfo" title="Monto que se debita cada mes por costos propios de la póliza.">Deducción mensual <span class="pregunta_signo">?</span> </abbr></th>
															<th><abbr class="verinfo" title="Valor acreditado mensualmente por intereses.">Interés acreditado <span class="pregunta_signo">?</span>  </abbr></th>
															-->
                                                                                                                        <th>Aporte Adicional</th>
															<th>Cargo Administrativo</th>
                                                                                                                        <th>Intereses Acreditados</th>
                                                                                                                        <th>% Rendimiento Mensual</th>
                                                                                                                        <!--<th>Retiros</th>-->
                                                                                                                        <th>Prestamos Otorgados</th>
                                                                                                                        <th>Aportes Imputados</th>
                                                                                                                        <!--<th>Ajustes</th>-->
                                                                                                                        <th>Saldo Acumulado</th>
														</tr>
														
														
													
													
													


<?php 
													for($i=0;$i<count($this->estado_de_cuenta);$i++){

														if($this->estado_de_cuenta[$i]->fechaVigenDesde!=""){


															$this->estado_de_cuenta[$i]->impGastos=str_replace("-","",$this->estado_de_cuenta[$i]->impGastos);
															?>

																<tr>
																<td class="alinear-izq"><?=$this->estado_de_cuenta[$i]->aaaa_proceso?> / <?=$this->estado_de_cuenta[$i]->mm_proceso?></td>
																<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impSaldoInicial,2 ,'.', ',')?></td>
																<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impGastos,2 ,'.', ',')?></td>
																<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impIE,2 ,'.', ',')?></td>
																<td class="alinear-der"> <?=number_format($this->estado_de_cuenta[$i]->pjeTasaInteres,2 ,'.', ',')?>%</td>
																<!--<td class="alinear-der">$<?=number_format($this->estado_de_cuenta[$i]->impRetiro,2 ,'.', ',')?> </td>-->
																<td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impPrestamo,2 ,'.', ',')?></td>
                                                                                                                                <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impPagoPrimas,2 ,'.', ',')?></td>
                                                                                                                                <!--<td class="alinear-der"> <?=number_format($this->estado_de_cuenta[$i]->impAjustes,2 ,'.', ',')?></td>-->
                                                                                                                                <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impDisponible,2 ,'.', ',')?></td>
																</tr>
															
															<?									

														}

														}
														?>
</table>

<?php } ?>


 <?php
if($_SESSION["poliza"]["cod_ramo"]=="55"){
?>  

<table border="1px">
													
														<tr>
																<th>Año / Mes</th>
                                                                                                                                <th>Concepto</th>
                                                                                                                                <th>Interés</th>
                                                                                                                                <th>Créditos</th>
                                                                                                                                <th>Débitos</th>
                                                                                                                                <th>Saldo</th>
															</tr>
														
														
	<?php 
													for($i=0;$i<count($this->estado_de_cuenta);$i++){

														if($this->estado_de_cuenta[$i]->fechaVigenDesde!=""){


															$this->estado_de_cuenta[$i]->impGastos=str_replace("-","",$this->estado_de_cuenta[$i]->impGastos);
															?>
															
																	<tr>
																	<td class="alinear-izq"><?=$this->estado_de_cuenta[$i]->aaaa_proceso?> / <?=$this->estado_de_cuenta[$i]->mm_proceso?></td>
																	<td class="alinear-izq"><?=$this->estado_de_cuenta[$i]->txtConcepto?></td>
                                                                                                                                        <td class="alinear-der"><?=number_format($this->estado_de_cuenta[$i]->pjeTasaInteres,2 ,'.', ',')?> %</td>
                                                                                                                                        <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impCredito,2 ,'.', ',')?></td>
                                                                                                                                        <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impDebito,2 ,'.', ',')?></td>
                                                                                                                                        <td class="alinear-der">$ <?=number_format($this->estado_de_cuenta[$i]->impSaldo,2 ,'.', ',')?></td>
																	</tr>
																
										                                               
															</tr>
															<?									

														}

														}
														?>
</table>

 <?php } ?>