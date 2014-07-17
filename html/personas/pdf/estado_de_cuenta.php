<?php

		
			if(count($this->tpl->estado_de_cuenta)!=0){
			$ban=0;
			foreach($this->tpl->estado_de_cuenta as $key=>$value){
				if((!(is_int($key)))&&($ban==0)){
					$this->tpl->estado_de_cuenta=array($this->tpl->estado_de_cuenta);
					$ban=1;
				}
			} 
			}
			
			$total=count($this->tpl->estado_de_cuenta);
			$pos=$total-1;
			
                        $pdf = new FPDF();
			//Codigo para hacer horizontal el reporte
                        /*if($_SESSION["poliza"]["cod_ramo"]=="59"||$_SESSION["poliza"]["cod_ramo"]=="58"){
                        $pdf=new FPDF('L','mm','A4');
                        }
                        else
                        {
                          $pdf = new FPDF();  
                        }*/
			$pdf->AddPage();
			$pdf->Image("http://www.equivida.com/images/uploads/formularios/logo.png" , 10 ,8, 90 , 16, "PNG" ,"http://www.equivida.com/");
				
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetY(30);
			$pdf->SetFont('Arial','B',14);
			$pdf->Cell(0,10,'Estado de Cuenta');	
			
			
			$pdf->SetFont('Arial','',10);
			
			$pdf->Ln();
			$pdf->Cell(0,10, utf8_decode('Tu póliza cuenta con los siguientes movimientos:'));
			
			$pdf->Ln();
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(0,10,utf8_decode('No. de póliza ').utf8_decode($_SESSION["poliza"]["nro_pol"]));
		
                        
                        if($_SESSION["poliza"]["cod_ramo"]=="59"){
			$pdf->Ln();
			$pdf->Cell(0,10,'Valor Asegurado '.number_format($this->tpl->estado_de_cuenta[$pos]->impSumaAseg,2,'.', ','));
			
			$pdf->Ln();
			$pdf->Cell(0,10,'Saldo Final Cuenta Individual '.number_format($this->tpl->estado_de_cuenta[$pos]->impSaldoFinal,2 ,'.', ','));
			
			$pdf->Ln();
			$pdf->Cell(0,10,'Cargos por Rescate '.number_format($this->tpl->estado_de_cuenta[$pos]->impRescateCobBasica,2 ,'.', ','));
                        }
                        
                         if($_SESSION["poliza"]["cod_ramo"]=="58"){
			$pdf->Ln();
			$pdf->Cell(0,10,'Valor Asegurado '.number_format($this->tpl->estado_de_cuenta[$pos]->impSumaAseg,2,'.', ','));
			
			$pdf->Ln();
			$pdf->Cell(0,10,'Saldo Final Cuenta Individual '.number_format($this->tpl->estado_de_cuenta[$pos]->impSaldoFinal,2 ,'.', ','));
			
			$pdf->Ln();
			$pdf->Cell(0,10,'Cargos por Rescate '.number_format($this->tpl->estado_de_cuenta[$pos]->impCargosRescateApAd,2 ,'.', ','));
                        }
                        
                        if($_SESSION["poliza"]["cod_ramo"]=="55"){
                       
                        $pdf->Ln();
			$pdf->Cell(0,10,'Saldo Final Cuenta Individual '.number_format($this->tpl->estado_de_cuenta[$pos]->impSaldo,2 ,'.', ','));
			
                        }
			//$pdf->Ln();
			//$pdf->Cell(0,10,'Valor del Rescate Total '.number_format($this->tpl->estado_de_cuenta[$pos]->impRescateTotal,2 ,'.', ','));
		
			//$pdf->Ln();
			//$pdf->Cell(0,10,utf8_decode('Saldo Préstamo  ').number_format($this->tpl->estado_de_cuenta[$pos]->saldoDeudaPorPrestamo,2 ,'.', ','));
			
			$pdf->Ln();
			
			//$pdf->SetY(85);
			$pdf->SetFillColor(7,89,165);
			$pdf->SetTextColor(255);
			$pdf->SetDrawColor(7,89,165);
			$pdf->SetLineWidth(.3);
			$pdf->SetFont('Arial','B',8);
			//Cabecera
			
                        /*$pdf->Cell(15,7,utf8_decode('Año / Mes'),1,0,'C',1);
			$pdf->Cell(30,7,utf8_decode('Depósitos Efectuados'),1,0,'C',1);
			$pdf->Cell(20,7,utf8_decode('Gastos Adm.'),1,0,'C',1);
			$pdf->Cell(30,7,utf8_decode('Deducción Mensual'),1,0,'C',1);
			$pdf->Cell(30,7,utf8_decode('Intereses Acreditados'),1,0,'C',1);
			$pdf->Cell(30,7,utf8_decode('Tasa Rendimiento'),1,0,'C',1);
			$pdf->Cell(35,7,utf8_decode('Saldo Cuenta Individual'),1,0,'C',1);*/
			if($_SESSION["poliza"]["cod_ramo"]=="59"){
			$pdf->Cell(15,7,utf8_decode('Año / Mes'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Depósitos'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Gastos admin.'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Deducción mensual'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Interés acreditado'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Tasa de interés'),1,0,'C',1);
                        //$pdf->Cell(30,7,utf8_decode('Retiros'),1,0,'C',1);
                        //$pdf->Cell(30,7,utf8_decode('Ajustes'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Saldo Cuenta'),1,0,'C',1);
                        //$pdf->Cell(30,7,utf8_decode('Prestamos Otorgados'),1,0,'C',1);
                        }
                        if($_SESSION["poliza"]["cod_ramo"]=="58"){
                        $pdf->Cell(15,7,utf8_decode('Año / Mes'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Aporte Adicional'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Cargo Administrativo'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Intereses Acreditados'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('% Rendimiento Mensual'),1,0,'C',1);
                       //$pdf->Cell(30,7,utf8_decode('Retiros'),1,0,'C',1);
                      //  $pdf->Cell(30,7,utf8_decode('Prestamos Otorgados'),1,0,'C',1);
                      //  $pdf->Cell(30,7,utf8_decode('Aportes Imputados'),1,0,'C',1);
                        //$pdf->Cell(30,7,utf8_decode('Ajustes'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Saldo Acumulado'),1,0,'C',1);
                        }
                         if($_SESSION["poliza"]["cod_ramo"]=="55"){
                        $pdf->Cell(20,7,utf8_decode('Fecha'),1,0,'C',1);
                        $pdf->Cell(50,7,utf8_decode('Concepto'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Interés'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Créditos'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Débitos'),1,0,'C',1);
                        $pdf->Cell(30,7,utf8_decode('Saldo'),1,0,'C',1);    
                         }
			
			$pdf->Ln();

			$pdf->SetFillColor(224,235,255);
			$pdf->SetTextColor(0);
			$pdf->SetFont('');


			$pdf->SetFont('Arial','',8);

			

			for($i=0;$i<count($this->tpl->estado_de_cuenta);$i++){

				$this->tpl->estado_de_cuenta[$i]->gastosAdmin=str_replace("-","",$this->tpl->estado_de_cuenta[$i]->gastosAdmin);

				if($i%2==0)
					$fill=true;
				else
					$fill=false;

				/*$pdf->Cell(15,6,$this->tpl->estado_de_cuenta[$i]->aaaa_proceso."/".$this->tpl->estado_de_cuenta[$i]->mm_proceso,'LR',0,'L',$fill);
				$pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->depositosEfectuados,2 ,'.', ','),'LR',0,'R',$fill);
				$pdf->Cell(20,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->gastosAdmin,2 ,'.', ','),'LR',0,'R',$fill);
				$pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->deduccionMensual,2 ,'.', ','),'LR',0,'R',$fill);
				
				$pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->interesesAcreditados,2 ,'.', ','),'LR',0,'R',$fill);
				$pdf->Cell(30,6,number_format($this->tpl->estado_de_cuenta[$i]->tasaRendimientoMensual,2 ,'.', ',')." %",'LR',0,'R',$fill);
				$pdf->Cell(35,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->saldo,2 ,',', '.'),'LR',0,'R',$fill);
				*/
                                if($_SESSION["poliza"]["cod_ramo"]=="59"){
                                $pdf->Cell(15,6,$this->tpl->estado_de_cuenta[$i]->aaaa_proceso."/".$this->tpl->estado_de_cuenta[$i]->mm_proceso,'LR',0,'L',$fill);
                                $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impReserva,2 ,'.', ','),'LR',0,'R',$fill);
                                $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impGastos,2 ,'.', ','),'LR',0,'R',$fill);
                                $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impDM,2 ,'.', ','),'LR',0,'R',$fill);
                                $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impIE,2 ,'.', ','),'LR',0,'R',$fill);
                                $pdf->Cell(30,6,number_format($this->tpl->estado_de_cuenta[$i]->pjeTasaInteres,2 ,'.', ',')." %",'LR',0,'R',$fill);
                               // $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impRetiro,2 ,'.', ','),'LR',0,'R',$fill);
                               // $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impAjustes,2 ,'.', ','),'LR',0,'R',$fill);
                                $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impDisponible,2 ,'.', ','),'LR',0,'R',$fill);
                                //$pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impSaldoPrestamos,2 ,'.', ','),'LR',0,'R',$fill);
                                }
                                
                                 if($_SESSION["poliza"]["cod_ramo"]=="58"){
                                $pdf->Cell(15,6,$this->tpl->estado_de_cuenta[$i]->aaaa_proceso."/".$this->tpl->estado_de_cuenta[$i]->mm_proceso,'LR',0,'L',$fill);
                                $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impReserva,2 ,'.', ','),'LR',0,'R',$fill);
                                $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impGastos,2 ,'.', ','),'LR',0,'R',$fill);
                                $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impIE,2 ,'.', ','),'LR',0,'R',$fill);
                                $pdf->Cell(30,6,number_format($this->tpl->estado_de_cuenta[$i]->pjeTasaInteres,2 ,'.', ',')." %",'LR',0,'R',$fill);
                               //$pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impRetiro,2 ,'.', ','),'LR',0,'R',$fill);
                               // $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impPrestamo,2 ,'.', ','),'LR',0,'R',$fill);
                               // $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impPagoPrimas,2 ,'.', ','),'LR',0,'R',$fill);
                               // $pdf->Cell(30,6,number_format($this->tpl->estado_de_cuenta[$i]->impAjustes,2 ,'.', ',')." %",'LR',0,'R',$fill);
                                $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impDisponible,2 ,'.', ','),'LR',0,'R',$fill);   
                                 }
                                 if($_SESSION["poliza"]["cod_ramo"]=="55"){
                                    $anio = substr(trim($this->tpl->estado_de_cuenta[$i]->fechaReserva), 6, 4);
                                    $mes = substr(trim($this->tpl->estado_de_cuenta[$i]->fechaReserva), 3, 2); 
                                    $dia = substr(trim($this->tpl->estado_de_cuenta[$i]->fechaReserva), 0, 2); 
                                    $fechaReserva=$anio."/".$mes."/".$dia;
                                $pdf->Cell(20,6,$fechaReserva,'LR',0,'L',$fill);
                                $pdf->Cell(50,6,$this->tpl->estado_de_cuenta[$i]->txtConcepto,'LR',0,'R',$fill);
                                $pdf->Cell(30,6,number_format($this->tpl->estado_de_cuenta[$i]->pjeInteres,2 ,'.', ',')." %",'LR',0,'R',$fill);
                                $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impCredito,2 ,'.', ','),'LR',0,'R',$fill);
                                $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impDebito,2 ,'.', ','),'LR',0,'R',$fill);
                                $pdf->Cell(30,6,"$ ".number_format($this->tpl->estado_de_cuenta[$i]->impSaldo,2 ,'.', ','),'LR',0,'R',$fill);
                                    
                                 } 
				$pdf->Ln();
			}

			$fill=!$fill;
			$pdf->Cell(190,0,'','T');

			$pdf->Output("equivida-EstadoDeCuenta.pdf",'I');


?>