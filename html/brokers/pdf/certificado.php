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

//print_r($this->tpl->coberturas[0]);
//print_r($_SESSION["poliza"]["data"]);  
//echo($_SESSION["poliza"]["data"]->descRamo);
//echo((int)($this->tpl->coberturas[0]->nroAsegurado));
//print_r($_SESSION['vidas_seguras'][(int)($this->tpl->coberturas[0]->nroAsegurado)-1]->codAsegurado);


//echo "<pre>";
//print_r($seleccionado);
//print_r($_SESSION);
//print_r($_POST);
//echo "</pre>";


$solicitud=new Solicitud();

$id_solicitud=$solicitud->set_certificado();



$codigo = '<html>
    <style type="text/css">
  body {margin:0;padding:0;}
  * {margin:1; padding:0;} 
  </style>
 
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="640" ><tr><td><br></td></tr>  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
<table border="1" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="560">
    <tr>
       <td  valign="top" height="750">
           
           <p class="MsoNormal" align="center">
               <span style="font-size: 12pt; font-family: Verdana, sans-serif">
                   <font  color="#000000"><b>
                   CERTIFICADO INDIVIDUAL <br>
                   DE SEGURO COLECTIVO
                   </b></font></span></p>
          
                <br>   
                   
           <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000"><b>
                   &nbsp;Certificado No: </b> '.$id_solicitud.'
                   </font></span></p>   
                   
              <br>     
                   
            <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">EQUIVIDA COMPA&Ntilde;&Iacute;A DE SEGUROS Y REASEGUROS S.A. <br>
                   CERTIFICA QUE HA ASEGURADO A:
                   </font></span></p> 
                   
                 <br> 
            
            <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                   <b>SE&Ntilde;OR(A):</b>
                   </font></span></p>      
                   
                   
          <table border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
              <tr>
                  <td> </td>
                  <td>
                       <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                   <b>&nbsp;&nbsp;'.utf8_decode($seleccionado["nombre"]." ".$seleccionado["apellido"]." ".$seleccionado["apellido2"]).'</b>
                   </font></span></p>    
                     
                  </td>
              </tr>
              
              <tr>
                  
                  <td>
                       <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                    &nbsp;&nbsp;EMPRESA CONTRATANTE 
                   </font></span></p>    
                     
                  </td>
                  <td>
                       <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                    &nbsp;&nbsp;'.utf8_decode($_SESSION["poliza"]["data"]->nombreContratante).'
                   </font></span></p>    
                     
                  </td>
                  
              </tr>
              
            <tr>                  
                  <td>
                       <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                    &nbsp;&nbsp;P&Oacute;LIZA DE
                   </font></span></p>    
                     
                  </td>
                  <td>
                       <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                    &nbsp;&nbsp;'.utf8_decode($_SESSION["poliza"]["data"]->descRamo).'
                   </font></span></p>    
                     
                  </td>
              </tr>
              
              <tr>                  
                  <td>
                       <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                    &nbsp;&nbsp;No P&Oacute;LIZA
                   </font></span></p>    
                     
                  </td>
                  <td>
                       <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                    &nbsp;&nbsp;'.utf8_decode($_SESSION["poliza"]["data"]->numeroPoliza).'
                   </font></span></p>    
                     
                  </td>
              </tr>
              <tr>
                  <td>
              <table border="0 ">
              <tr>                  
                  <td>
                       <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                   &nbsp;VIGENCIA DESDE
                   </font></span></p>    
                     
                  </td>
                  <td>
                       <p class="MsoNormal" align="center">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                    &nbsp;&nbsp;&nbsp;'.$_SESSION["poliza"]["data"]->inicioVigencia.'
                   </font></span></p>    
                     
                  </td>
              </tr> 
              </table>
              </td>
              
              <td>
              <table border="0 ">
              <tr>                  
                  <td>
                       <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                   &nbsp;VIGENCIA HASTA
                   </font></span></p>    
                  </td>
                  <td>
                       <p class="MsoNormal" align="center">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                    &nbsp;&nbsp;&nbsp;'.$_SESSION["poliza"]["data"]->finVigencia.'
                   </font></span></p>    
                  </td>
              </tr> 
              </table>
              </td>
              </tr>
          </table> 
          
         <br>
         
        <table border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
          <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>                    
         <table border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"  width="520">
            <tr>
                   <td colspan="2"><hr></td>
                 </tr>
             <tr>
                  <td>
                  <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000"><b>
                   COBERTURA
                   </b></font></span></p>   
                  </td>
                  
                  <td>
                <p class="MsoNormal" align="right">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000"><b>
                   MONTO ASEGURADO
                   </b></font></span></p>    
                  </td>
              </tr>';

for($i=0;$i<count($this->tpl->coberturas);$i++){
        $codigo.='<tr>
                  <td>
                  <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                   '.utf8_decode($this->tpl->coberturas[$i]->cobertura).'&nbsp;&nbsp;&nbsp;&nbsp;
                   </font></span></p>   
                  </td>
                  
                  <td>
                <p class="MsoNormal" align="right">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                   &nbsp;&nbsp;'.$this->tpl->coberturas[$i]->valorAsegurado.'
                   </font></span></p>    
                  </td>
              </tr>';        
}

$codigo.='
               </table>  
                 
              </td>
              </tr>
             </table>
                   
            <br>
            ';     
  /*
   //Codigo para agregar los beneficiarios de la Poliza en el Certificado
                     
 $codigo.='<table border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
          <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>                    
         <table border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" width="520">
         <tr>
                   <td colspan="4"><p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                   Los Beneficiarios pagaderos bajo esta p&oacute;liza, y los dem&aacute;s t&eacute;rminos y condiciones est&aacute;n estipuladas en la misma
                   </font></span></p>  
                   </td>
                 </tr>
            <tr>
                   <td colspan="4"><hr></td>
                 </tr>
             <tr>
                  <td>
                  <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000"><b>
                   BENEFICIARIO&nbsp;
                   </b></font></span></p>   
                  </td>
                  
                  <td>
                <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000"><b>
                   &nbsp;%&nbsp;
                   </b></font></span></p>    
                  </td>
                  
                  <td>
                  <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000"><b>
                   &nbsp;PARENTESCO&nbsp;
                   </b></font></span></p>   
                  </td>
                  
                  <td>
                <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000"><b>
                   &nbsp;TUTOR
                   </b></font></span></p>    
                  </td>
              </tr>
              
             ';



$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/BeneficiariosWsImpl?wsdl";
		$beneficiario = new SoapClient($wsdl2);
		$args=array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
							"nro_pol"=>$_SESSION["poliza"]["nro_pol"],"cod_aseg"=>$_SESSION['vidas_seguras'][(int)($this->tpl->coberturas[0]->nroAsegurado)-1]->codAsegurado, 
							"campoin1"=>"","campoin2"=>"","campoin3"=>"",
							"campoin4"=>"","campoin5"=>"");

		$lista_beneficios=$beneficiario->__soapCall('ws_sise_beneficiarios', $args);

		$this->tpl->lista_beneficios=$lista_beneficios->item;
              
                
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

	$this->tpl->lista_beneficios[$i]->nombre=str_replace("Ð","Ñ",$this->tpl->lista_beneficios[$i]->nombre);
        
        $codigo.='<tr>
                  <td>
                  <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                    '.utf8_decode($this->tpl->lista_beneficios[$i]->nombre).'&nbsp;&nbsp;&nbsp;&nbsp;
                   </font></span></p>   
                  </td>
                  
                  <td>
                <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                   &nbsp;&nbsp;'.$this->tpl->lista_beneficios[$i]->pjePartic.'
                   </font></span></p>    
                  </td>
                  
                      <td>
                  <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                   &nbsp;&nbsp;'.$this->tpl->lista_beneficios[$i]->parentesco.' &nbsp;&nbsp;&nbsp;
                   </font></span></p>   
                  </td>
                  
                  <td>
                <p class="MsoNormal" align="left">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                   &nbsp;&nbsp;
                   </font></span></p>    
                  </td>
              </tr>';
        

}                
                
              
              
              
  
 

             
    $codigo.='           </table>  
                 
              </td>
              </tr>
             </table>';        
    */
    $meses=array(1=>"Enero",2=>"Febrero",3=>"Marzo",4=>"Abril",5=>"Mayo",6=>"Junio",7=>"Julio",8=>"Agosto",9=>"Septiembre",10=>"Octubre",11=>"Noviembre",12=>"Diciembre");
       
    $actual = getcwd();  // para seber en cual estas 

    $codigo.='  <table border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="position:absolute;top:800px;left:45px;">
        <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><img src="'.$actual.'/images/firma_autorizada.png"></td>  
        <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><hr></td>
              </tr>
              <tr><td></td><td><p class="MsoNormal" align="center">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">FIRMA AUTORIZADA</font></span></p><td></td>
              </tr>
              </table>
 
     <table border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"  style="position:absolute;top:975px;left:45px;" >
          <tr><td><p class="MsoNormal" align="right">
               <span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">Fecha:&nbsp;</font></span></p></td>
              <td><p class="MsoNormal" align="left"><span style="font-size: 10pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">'.utf8_decode($_POST["ciudad"])."".date('j')." ".$meses[date('n')]." del ".date('Y').' </font></span></p></td>
              
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              
              <td><td>
                <p class="MsoNormal" align="right">
               <span style="font-size: 6pt; font-family: Verdana, sans-serif">
                   <font  color="#000000">
                   Resoluci&oacute;n 94-222-5 Reg: 14449
                   del 03 de Agosto del 1994
                   </font></span></p>  
              </td>
              </tr>
              </table>               
                  
       </td> 
    </tr> 
</table>  </td></tr></table> 
</html>';


  
 

   if (!isset($GLOBALS["carateres_latinos"])){
      $todas = get_html_translation_table(HTML_ENTITIES, ENT_NOQUOTES);
      $etiquetas = get_html_translation_table(HTML_SPECIALCHARS, ENT_NOQUOTES);
      $GLOBALS["carateres_latinos"] = array_diff($todas, $etiquetas);
   }
   $codigo = strtr($codigo, $GLOBALS["carateres_latinos"]);
   

$codigo = utf8_decode($codigo);


$dompdf = new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit","64M");
$dompdf->render();
$dompdf->stream("certificado-individual_".$seleccionado["nombre"]."".$seleccionado["apellido"]."".$seleccionado["apellido2"].".pdf");
?>