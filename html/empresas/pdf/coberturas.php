<?php


$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image("http://www.equivida.com/images/uploads/formularios/logo.png" , 10 ,8, 90 , 16, "PNG" ,"http://www.equivida.com/");
		
		$contratante=$_SESSION["poliza"]["data"]->nombreContratante;
		$asegurado=$_SESSION["poliza"]["data"]->nombreAseg;
		$numeroPoliza=$_SESSION["poliza"]["data"]->numeroPoliza;
		
	
	
$pdf->Ln();
$pdf->Ln();
$pdf->SetY(30);
$pdf->SetFont('Arial','B',11);
	
$pdf->Cell(0,10,"Contratante: ".utf8_decode(texto($contratante)));
$pdf->Ln();
	

if(trim($asegurado)!=""){
	$pdf->Cell(0,10,"Asegurado: ".utf8_decode(texto($asegurado)));
	$pdf->Ln();
}
	
	$pdf->Cell(0,10,utf8_decode("Número de Póliza: ").utf8_decode($numeroPoliza));
	$pdf->Ln();		
	$pdf->Cell(0,10, utf8_decode('DETALLE DE COBERTURAS'),0,0,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',8);

$pdf->SetFillColor(7,89,165);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(7,89,165);
$pdf->SetLineWidth(.3);
$pdf->SetFont('Arial','B',8);
	





if(count($this->tpl->coberturas)!=0){
$ban=0;
foreach($this->tpl->coberturas as $key=>$value){
	if((!(is_int($key)))&&($ban==0)){
		$this->tpl->coberturas=array($this->tpl->coberturas);
		$ban=1;
	}
} 
}


$categoria=0;

foreach($this->tpl->coberturas[0] as $key=>$value){
	if($key=="cod_ind_categ"){
		$categoria=1;
	}
}


if($categoria==0){

	$pdf->Cell(100,7,'Cobertura',1,0,'C',1);
	if($this->tpl->mostrarValorAsegurado==TRUE)
        {    
            $pdf->Cell(30,7,'Valor Asegurado',1,0,'C',1);
        }
        $pdf->Cell(20,7,'Vencimiento',1,0,'C',1);
	$pdf->Cell(40,7,'Prima',1,0,'C',1);

}else{

	$pdf->Cell(70,7,utf8_decode('Categoría'),1,0,'C',1);
	$pdf->Cell(60,7,utf8_decode('Descripción'),1,0,'C',1);
	if($this->tpl->mostrarValorAsegurado==TRUE)
        {
            $pdf->Cell(30,7,utf8_decode('Valor asegurado'),1,0,'C',1);
        }
        $pdf->Cell(30,7,utf8_decode('Tasa'),1,0,'C',1);

}

	
$pdf->Ln();

$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
	
	
$pdf->SetFont('Arial','',8);

	
	
for($i=0;$i<count($this->tpl->coberturas);$i++){

	if($i%2==0)
		$fill=true;
	else
		$fill=false;
		

	if($categoria==0){	
		
		$pdf->Cell(100,6,utf8_decode($this->tpl->coberturas[$i]->cobertura),'LR',0,'L',$fill);
		if($this->tpl->mostrarValorAsegurado==TRUE)
                {   
                    $pdf->Cell(30,6,"$ ".number_format($this->tpl->coberturas[$i]->imp_capital,2),'LR',0,'R',$fill);
                }
                $pdf->Cell(20,6,$this->tpl->coberturas[$i]->fec_vto,'LR',0,'L',$fill);
		$pdf->Cell(40,6,"$ ".number_format($this->tpl->coberturas[$i]->imp_prima,2),'LR',0,'R',$fill);
	
	}else{

		$pdf->Cell(70,6,utf8_decode($this->tpl->coberturas[$i]->txt_desc_categ),'LR',0,'L',$fill);
		$pdf->Cell(60,6,$this->tpl->coberturas[$i]->txt_desc2,'LR',0,'L',$fill);
		//$pdf->Cell(50,6,"$ ".number_format($this->tpl->coberturas[$i]->imp_suma_aseg,2),'LR',0,'L',$fill);
                if($this->tpl->mostrarValorAsegurado==TRUE)
                {
                    $pdf->Cell(30,6,"$ ".number_format($this->tpl->coberturas[$i]->imp_suma_aseg,2),'LR',0,'R',$fill);
                }
                $pdf->Cell(30,6,number_format($this->tpl->coberturas[$i]->pje_tasa,2)." %",'LR',0,'R',$fill);

	}

	$pdf->Ln();
	
}

$fill=!$fill;
if($this->tpl->mostrarValorAsegurado==TRUE)
{
    $pdf->Cell(190,0,'','T');
}else{
    $pdf->Cell(160,0,'','T');
}
$pdf->Output("equivida-coberturas.pdf",'I');

?>