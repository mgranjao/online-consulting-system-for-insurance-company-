<?php

$wsdl2=URL_WEBSERVICE."sise-servicio-1.0/CertificadoIndividualWsImpl?wsdl";
$info_wsdl_poliza = new SoapClient($wsdl2);



$args=array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],
	"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
	"nro_pol"=>$_SESSION["poliza"]["nro_pol"],
	"nro_aseg"=>"",
	"nro_doc"=>$_POST["seleccionado"],
	"campoin1"=>"",
	"campoin2"=>"",
	"campoin3"=>"",
	"campoin4"=>"",
	"campoin5"=>"");


$coberturas=$info_wsdl_poliza->__soapCall('ws_sise_certificado_individual', $args);


		
	


$this->tpl->coberturas=$coberturas->item;


if(count($this->tpl->coberturas)!=0){
	$ban=0;
	foreach($this->tpl->coberturas as $key=>$value){
		if((!(is_int($key)))&&($ban==0)){
			$this->tpl->coberturas=array($this->tpl->coberturas);
			$ban=1;
		}
	}	 
}

$seleccionado["nombre"]=texto($this->tpl->coberturas[0]->nombre);
$seleccionado["apellido"]=texto($this->tpl->coberturas[0]->apellido1);
$seleccionado["apellido2"]=texto($this->tpl->coberturas[0]->apellido2);
$seleccionado["documento"]=$this->tpl->coberturas[0]->nroDocumento;




/*
echo "<pre>";
print_r($seleccionado);
print_r($_SESSION);
print_r($_POST);
echo "</pre>";
*/

$solicitud=new Solicitud();

$id_solicitud=$solicitud->set_certificado();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

$pdf->Cell(0,10,'Certificado No: '.$id_solicitud,0,0,'C');

$pdf->Ln();



$pdf->SetFont('Arial','B',10);

$pdf->Ln();

//Sr(s)
//Nombre
$pdf->Cell(0,5, utf8_decode('Sr(s): '.$_POST["dirigido_a"]));

$pdf->SetFont('Arial','',10);
//$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,5, utf8_decode('Equivida Compañía de Seguros y Reaseguros S.A., certifica que ha asegurado a:'));

$pdf->Ln();
$pdf->Ln();


$pdf->Ln();

$pdf->SetFont('Arial','B',10);					
$pdf->Cell(0,5,utf8_decode('Señor(a):'));

$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,utf8_decode($seleccionado["nombre"]." ".$seleccionado["apellido"]." ".$seleccionado["apellido2"]));

	
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,5,utf8_decode('Cédula de Identidad: '));

$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,$seleccionado["documento"]);

$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,5,utf8_decode('Póliza: '));

$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,utf8_decode($_SESSION["poliza"]["nro_pol"]));					


$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,5,utf8_decode('Vigencia  Desde: '));

$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,utf8_decode("Desde: ").$_SESSION["poliza"]["data"]->inicioVigencia." Hasta: ".$_SESSION["poliza"]["data"]->finVigencia);			

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,5,utf8_decode('Contratante: '));

$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,utf8_decode($_SESSION["poliza"]["data"]->nombreContratante));		

$pdf->Ln();

$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5, utf8_decode('El Asegurado, goza de una cobertura las 24 horas del día, los 365 días del año en cualquier lugar del mundo,'));

$pdf->Ln();
$pdf->Cell(0,5, utf8_decode('este laborando o no.'));



//Coberturas
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
//$pdf->Cell(0,5, utf8_decode('Coberturas:'));

/*
Cobertura						Monto Asegurado
Vida							20,000.00
*/


if(count($this->tpl->coberturas)!=0){
$ban=0;
foreach($this->tpl->coberturas as $key=>$value){
	if((!(is_int($key)))&&($ban==0)){
		$this->tpl->coberturas=array($this->tpl->coberturas);
		$ban=1;
	}
} 
}
/*
for($i=0;$i<count($this->tpl->coberturas);$i++){
			$pdf->Ln();
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(0,5, "- ".utf8_decode($this->tpl->coberturas[$i]->cobertura).": ".$this->tpl->coberturas[$i]->valorAsegurado);

}
*/
//Coberturas

$pdf->SetFillColor(7,89,165);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(7,89,165);
$pdf->SetLineWidth(.3);
$pdf->SetFont('Arial','B',8);


$pdf->Cell(150,7,'Cobertura',1,0,'C',1);
$pdf->Cell(30,7,'Monto',1,0,'C',1);
	
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
		
	$pdf->Cell(150,6,utf8_decode($this->tpl->coberturas[$i]->cobertura),'LR',0,'L',$fill);
	$pdf->Cell(30,6,number_format($this->tpl->coberturas[$i]->valorAsegurado,2 ,'.', ','),'LR',0,'C',$fill);
	$pdf->Ln();	
}
$fill=!$fill;
$pdf->Cell(180,0,'','T');

$pdf->Ln();


$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Ln();
$pdf->Cell(0,5, utf8_decode('El presente certificado está emitido en base a las condiciones generales y particulares de las pólizas arriba indicadas.'));

$pdf->Ln();
$pdf->Cell(0,5, utf8_decode('La póliza es de un período de un año solo en caso que una de las partes de por terminado el mismo, caso contrario'));

$pdf->Ln();
$pdf->Cell(0,5, utf8_decode('es renovable automáticamente.'));


$meses=array(1=>"Enero",2=>"Febrero",3=>"Marzo",4=>"Abril",5=>"Mayo",6=>"Junio",7=>"Julio",8=>"Agosto",9=>"Septiembre",10=>"Octubre",11=>"Noviembre",12=>"Diciembre");


$pdf->Ln();
$pdf->Ln();

$pdf->Ln();
$pdf->Cell(0,5, utf8_decode($_POST["ciudad"]).", ".date('j')." ".$meses[date('n')]." del ".date('Y'));

$pdf->Ln();

$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,5, "EQUIVIDA CIA DE SEGUROS Y REASEGUROS",0,0,'R');

$pdf->Ln();
$pdf->Ln();

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(0,5, "ASEGURADO                                                                                                           FIRMA AUTORIZADA");

$pdf->Output("certificado-individual.pdf",'I');

?>