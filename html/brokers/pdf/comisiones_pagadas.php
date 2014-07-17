<?php


	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->Image("http://www.equivida.com/images/uploads/formularios/logo.png" , 10 ,8, 90 , 16, "PNG" ,"http://www.equivida.com/");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetY(30);
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(0,10,'Comisiones Pagadas');	
        $totVal=0;
        for($i=0;$i<count($this->tpl->facturaciones);$i++){
          $totVal+=$this->tpl->facturaciones[$i]->valor; 
        }
        $pdf->Ln();
        $pdf->SetFont('Arial','',10);
        $meses=array(1=>"Enero",2=>"Febrero",3=>"Marzo",4=>"Abril",5=>"Mayo",6=>"Junio",7=>"Julio",8=>"Agosto",9=>"Septiembre",10=>"Octubre",11=>"Noviembre",12=>"Diciembre");
        $pdf->Cell(0,5,'Fecha de consulta: '.date('j')." ".$meses[date('n')]." del ".date('Y'));
        $pdf->Ln();
        $pdf->Cell(0,5,'Valor total de comisiones: $'.utf8_decode(texto(number_format($totVal,2 ,',', '.'))));        
	$pdf->SetFont('Arial','',10);
	$pdf->Ln();
	$pdf->SetFont('Arial','B',8);
	
	
	//$pdf->SetY(85);
	$pdf->SetFillColor(7,89,165);
	$pdf->SetTextColor(255);
	$pdf->SetDrawColor(7,89,165);
	$pdf->SetLineWidth(.3);
	$pdf->SetFont('Arial','B',7);

	$pdf->Cell(20,7,'Fecha Pago',1,0,'C',1);
	$pdf->Cell(20,7,'Sucursal',1,0,'C',1);
	$pdf->Cell(20,7,'No. Cuenta',1,0,'C',1);
	$pdf->Cell(20,7,'Banco',1,0,'C',1);
	$pdf->Cell(20,7,utf8_decode('No Comprobante'),1,0,'C',1);
	$pdf->Cell(20,7,utf8_decode('Comprobante'),1,0,'C',1);
	$pdf->Cell(40,7,utf8_decode('E-mail'),1,0,'C',1);
	$pdf->Cell(20,7,utf8_decode('Valor'),1,0,'C',1);

	$pdf->Ln();

	$pdf->SetFillColor(224,235,255);
	$pdf->SetTextColor(0);
	$pdf->SetFont('');


	$pdf->SetFont('Arial','',7);

	if(count($this->tpl->facturaciones)!=0){

	$ban=0;
	foreach($this->tpl->facturaciones as $key=>$value){
			if((!(is_int($key)))&&($ban==0)){
				$this->tpl->facturaciones=array($this->tpl->facturaciones);
				$ban=1;
			}
	}


	}

	

	for($i=0;$i<count($this->tpl->facturaciones);$i++){

		if($i%2==0)
			$fill=true;
		else
			$fill=false;

		if($this->tpl->facturaciones[$i]->fecha!=""){

		$cont=$i+1;

	
		$pdf->Cell(20,6,utf8_decode(texto($this->tpl->facturaciones[$i]->fecha)),'LR',0,'L',$fill);
		$pdf->Cell(20,6,utf8_decode(texto($this->tpl->facturaciones[$i]->sucursal)),'LR',0,'L',$fill);
		$pdf->Cell(20,6,utf8_decode(texto($this->tpl->facturaciones[$i]->cuentaOCheque)),'LR',0,'L',$fill);

		$pdf->Cell(20,6,utf8_decode(texto($this->tpl->facturaciones[$i]->nombreBanco)),'LR',0,'L',$fill);
		$pdf->Cell(20,6,utf8_decode(texto($this->tpl->facturaciones[$i]->nroComprobante)),'LR',0,'L',$fill);
		$pdf->Cell(20,6,utf8_decode(texto($this->tpl->facturaciones[$i]->comprobante)),'LR',0,'L',$fill);

		$pdf->Cell(40,6,utf8_decode(texto($this->tpl->facturaciones[$i]->mail)),'LR',0,'L',$fill);
		$pdf->Cell(20,6,"$ ".utf8_decode(texto(number_format($this->tpl->facturaciones[$i]->valor,2 ,',', '.'))),'LR',0,'R',$fill);

		$pdf->Ln();

		}
	}
	
	$fill=!$fill;
	$pdf->Cell(180,0,'','T');

	$pdf->Output("equivida-comisiones-pagadas.pdf",'I');

?>