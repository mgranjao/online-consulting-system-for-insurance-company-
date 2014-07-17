<?php

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image("http://www.equivida.com/images/uploads/formularios/logo.png" , 10 ,8, 90 , 16, "PNG" ,"http://www.equivida.com/");
$pdf->Ln();


$contratante=$_SESSION["poliza"]["data"]->nombreContratante;
$asegurado=$_SESSION["poliza"]["data"]->nombreAseg;
$numeroPoliza=$_SESSION["poliza"]["data"]->numeroPoliza;



$pdf->Ln();
$pdf->SetY(30);
//$pdf->SetFont('Arial','B',14);
//$pdf->Cell(0,10,'Coberturas');

$pdf->SetFont('Arial','B',11);

$pdf->Cell(0,10,"Contratante: ".utf8_decode(texto($contratante)));
$pdf->Ln();

$pdf->Cell(0,10,"Asegurado: ".utf8_decode(texto($asegurado)));
$pdf->Ln();

$pdf->Cell(0,10,utf8_decode("Número de Póliza: ").utf8_decode($numeroPoliza));
$pdf->Ln();		
$pdf->Cell(0,10, utf8_decode('DETALLE DE BENEFICIARIOS'),0,0,'C');
$pdf->Ln();
//$pdf->SetY(85);
$pdf->SetFillColor(7,89,165);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(7,89,165);
$pdf->SetLineWidth(.3);
$pdf->SetFont('Arial','B',8);

$pdf->Cell(70,7,'Nombre',1,0,'C',1);
$pdf->Cell(20,7,'Fecha inicio',1,0,'C',1);
$pdf->Cell(20,7,'Parentesco',1,0,'C',1);
$pdf->Cell(40,7,utf8_decode('Porcentaje de beneficio'),1,0,'C',1);
$pdf->Cell(40,7,utf8_decode('Tipo de beneficiario'),1,0,'C',1);

$pdf->Ln();

$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');


$pdf->SetFont('Arial','',8);

if(count($this->tpl->lista_beneficios)!=0){
$ban=0;
foreach($this->tpl->lista_beneficios as $key=>$value){
	if((!(is_int($key)))&&($ban==0)){
		$this->tpl->lista_beneficios=array($this->tpl->lista_beneficios);
		$ban=1;
	}
} 
}



for($i=0;$i<count($this->tpl->lista_beneficios);$i++){

	if($i%2==0)
		$fill=true;
	else
		$fill=false;
	
	
	$this->tpl->lista_beneficios[$i]->nombre=str_replace("Ð","Ñ",$this->tpl->lista_beneficios[$i]->nombre);
	
	$pdf->Cell(70,6,utf8_decode($this->tpl->lista_beneficios[$i]->nombre),'LR',0,'L',$fill);
	$pdf->Cell(20,6,$this->tpl->lista_beneficios[$i]->fechaAlta,'LR',0,'C',$fill);
	$pdf->Cell(20,6,$this->tpl->lista_beneficios[$i]->parentesco,'LR',0,'C',$fill);
	$pdf->Cell(40,6,$this->tpl->lista_beneficios[$i]->pjePartic,'LR',0,'C',$fill);
	$pdf->Cell(40,6,$this->tpl->lista_beneficios[$i]->tipoBeneficiario,'LR',0,'C',$fill);
	$pdf->Ln();

}

$fill=!$fill;
$pdf->Cell(190,0,'','T');

$pdf->Output("equivida-beneficiarios.pdf",'I');


?>