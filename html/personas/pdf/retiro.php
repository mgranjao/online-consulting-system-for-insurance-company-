<?php
				
				$pdf = new FPDF();
				$pdf->AddPage();
				$pdf->SetFont('Arial','B',14);
				
					$pdf->Image("http://www.equivida.com/images/uploads/formularios/logo.png" , 10 ,8, 90 , 16, "PNG" ,"http://www.equivida.com/");

					$pdf->Ln();
					$pdf->Ln();
				
				$pdf->Cell(140,50,'Solicitud de Retiro');

				$pdf->Ln();

				$pdf->SetFont('Arial','',10);

				$pdf->Cell(0,10, utf8_decode('Srs. Equivida, por medio de la presente solicito su aprobación de retiro parcial sobre el ahorro de
mi póliza de seguro.'));

				$pdf->Ln();
				$pdf->Cell(0,10,utf8_decode('No. de póliza: ').utf8_decode($_SESSION["poliza"]["nro_pol"]));
				$pdf->Ln();
				$pdf->Cell(0,10,'Nombres: '.utf8_decode($_SESSION["equivida"]["bd"]["primer_nombre"])." ".utf8_decode($_SESSION["equivida"]["bd"]["segundo_nombre"])." ".utf8_decode($_SESSION["equivida"]["bd"]["primer_apellido"])." ".utf8_decode($_SESSION["equivida"]["bd"]["segundo_apellido"]));
				$pdf->Ln();
				$pdf->Cell(0,10,'Cedula: '.utf8_decode($_SESSION["equivida"]["bd"]["numero_de_documento"]));
				$pdf->Ln();
				$pdf->Cell(0,10,'Valor a retirar: $'.utf8_decode($_POST["valor_a_retirar"]));
				$pdf->Ln();
				$pdf->Cell(0,10,'Att.');
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Ln();
				
				$pdf->Image("http://bedomax.com/upload/images/linea.png");
				$pdf->Cell(0,10,'Firma del contratante');
		
				$pdf->Output("retiro.pdf",'I');


?>