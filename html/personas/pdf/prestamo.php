<?php 

		$pdf = new FPDF();
					$pdf->AddPage();
					
					
					
					$pdf->Image("http://www.equivida.com/images/uploads/formularios/logo.png" , 10 ,8, 90 , 16, "PNG" ,"http://www.equivida.com/");
					
					
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
					
					if(trim($asegurado)!=""){
						$pdf->Cell(0,10,"Asegurado: ".utf8_decode(texto($asegurado)));
						$pdf->Ln();
					}

					
					$pdf->Cell(0,10,utf8_decode("Número de Póliza: ").utf8_decode($numeroPoliza));
					$pdf->Ln();		
					$pdf->Cell(0,10, utf8_decode('Préstamos'),0,0,'C');
					$pdf->Ln();
					$pdf->SetFont('Arial','B',8);
					//$pdf->Cell(0,10,utf8_decode('No. de póliza: ').utf8_decode($_SESSION["poliza"]["nro_pol"]));
					//$pdf->Ln();
					//$pdf->Ln();
					
					//$pdf->SetY(85);
					$pdf->SetFillColor(7,89,165);
					$pdf->SetTextColor(255);
					$pdf->SetDrawColor(7,89,165);
					$pdf->SetLineWidth(.3);
					$pdf->SetFont('Arial','B',8);
					//Cabecera

					
					
					$pdf->Cell(30,7,utf8_decode('No. Préstamo'),1,0,'C',1);
					$pdf->Cell(25,7,utf8_decode('Fecha Concesión'),1,0,'C',1);
					$pdf->Cell(30,7,utf8_decode('Monto Otorgado'),1,0,'C',1);
					$pdf->Cell(30,7,utf8_decode('Saldo Pendiente'),1,0,'C',1);
					$pdf->Cell(40,7,utf8_decode('Banco/Tarjeta'),1,0,'C',1);
					$pdf->Cell(40,7,utf8_decode('No. cuenta/tarjeta'),1,0,'C',1);
					
					$pdf->Ln();
					
					$pdf->SetFillColor(224,235,255);
					$pdf->SetTextColor(0);
					$pdf->SetFont('');
					
					
					$pdf->SetFont('Arial','',8);
					
					if(count($this->tpl->prestamos)!=0){

							$ban=0;
							foreach($this->tpl->prestamos as $key=>$value){
							if((!(is_int($key)))&&($ban==0)){
								$this->tpl->prestamos=array($this->tpl->prestamos);
								$ban=1;
							}
							}
					}
					
					
					for($i=0;$i<count($this->tpl->prestamos);$i++){
						
						if($i%2==0)
							$fill=true;
						else
							$fill=false;
						
						
						if($this->tpl->prestamos[$i]->numeroPoliza==$_SESSION["poliza"]["nro_pol"]){
						
						$pdf->Cell(30,6,utf8_decode($this->tpl->prestamos[$i]->numeroPrestamo),'LR',0,'L',$fill);
						$pdf->Cell(25,6,utf8_decode($this->tpl->prestamos[$i]->fechaConcesion),'LR',0,'L',$fill);
						$pdf->Cell(30,6,"$ ".number_format($this->tpl->prestamos[$i]->impCapital,2 ,'.', ','),'LR',0,'L',$fill);
						$pdf->Cell(30,6,"$ ".number_format($this->tpl->prestamos[$i]->impSaldo,2 ,'.', ','),'LR',0,'L',$fill);
						$pdf->Cell(40,6,$this->tpl->prestamos[$i]->descCond,'LR',0,'L',$fill);
						$pdf->Cell(40,6,$this->tpl->prestamos[$i]->tarjeta,'LR',0,'L',$fill);
						$pdf->Ln();
						
						}
						
					}
					
					
					$fill=!$fill;
					$pdf->Cell(195,0,'','T');
					
					$pdf->Output("equivida-prestamos.pdf",'I');

 ?>