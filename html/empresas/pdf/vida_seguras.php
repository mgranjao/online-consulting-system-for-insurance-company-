<?php

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image("http://www.equivida.com/images/uploads/formularios/logo.png" , 10 ,8, 90 , 16, "PNG" ,"http://www.equivida.com/");
$pdf->Ln();
$pdf->Ln();
$pdf->SetY(30);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'Vidas Seguras');	
$pdf->SetFont('Arial','',10);
$pdf->Ln();
$pdf->Cell(0,10, utf8_decode('Tu póliza cuenta con las siguientes asegurados:'));

$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,10,utf8_decode('No. de póliza: ').utf8_decode($_SESSION["poliza"]["nro_pol"]));

$pdf->Ln();
$pdf->Ln();

//$pdf->SetY(85);
$pdf->SetFillColor(7,89,165);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(7,89,165);
$pdf->SetLineWidth(.3);
$pdf->SetFont('Arial','B',7);

$pdf->Cell(5,7,'No',1,0,'C',1);
$pdf->Cell(90,7,'Nombres',1,0,'C',1);
$pdf->Cell(30,7,utf8_decode('Cédula'),1,0,'C',1);
$pdf->Cell(30,7,utf8_decode('Fecha Inclusión'),1,0,'C',1);
$pdf->Cell(25,7,"Tipo de Asegurado",1,0,'C',1);




$pdf->Ln();

$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');


$pdf->SetFont('Arial','',7);

if(count($this->tpl->vidas_seguras)!=0){
$ban=0;
foreach($this->tpl->vidas_seguras as $key=>$value){
	if((!(is_int($key)))&&($ban==0)){
		$this->tpl->vidas_seguras=array($this->tpl->vidas_seguras);
		$ban=1;
	}
} 
}



for($i=0;$i<count($this->tpl->vidas_seguras);$i++){

	if($i%2==0)
		$fill=true;
	else
		$fill=false;
	
	
	$cont=$i+1;

	$pdf->Cell(5,6,$cont,'LR',0,'L',$fill);
	$pdf->Cell(90,6,texto($this->tpl->vidas_seguras[$i]->apellido1)." ".texto($this->tpl->vidas_seguras[$i]->apellido2)." ".texto($this->tpl->vidas_seguras[$i]->nombre),'LR',0,'L',$fill);

	$pdf->Cell(30,6,texto($this->tpl->vidas_seguras[$i]->documento),'LR',0,'L',$fill);
	$pdf->Cell(30,6,texto($this->tpl->vidas_seguras[$i]->fechaAlta),'LR',0,'L',$fill);
	$pdf->Cell(25,6,texto($this->tpl->vidas_seguras[$i]->tipoAsegurado),'LR',0,'L',$fill);


	$pdf->Ln();

}

$fill=!$fill;
$pdf->Cell(180,0,'','T');

$pdf->Output("equivida-vidas-seguras.pdf",'I');
?>