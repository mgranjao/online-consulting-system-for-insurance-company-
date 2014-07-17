<?php

/**
* 
*/


require_once './models/cliente.php';

class Brokers_controller{
	
	private $tpl;
	function __construct($page,&$tpl) {
			$this->tpl=$tpl;
			if($page!="")
			eval('$this->'.$page.'();');
			else
			$this->index();
	}
	
	function index(){

		unset($_SESSION["poliza"]);
		unset($_SESSION["poliza"]["data"]);
		unset($_SESSION["equivida"]["poliza"]);
		//Clientes
		$_SESSION["aux_broker"]=0;
                
		
                    
			$this->clientes();
		


		$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/DatosAgenteWsImpl?wsdl";
		$info_wsdl= new SoapClient($wsdl2);
	
		$args=array("numeroDoc"=>$_SESSION["equivida"]["bd"]["ruc"],
						"campo1"=>"",
						"campo2"=>"",
						"campo3"=>"",
						"campo4"=>"",
						"campo5"=>"");
		
	
		$info_brokers=$info_wsdl->__soapCall('ws_sise_datos_agente', $args);
		
		
	
		
		$this->tpl->info_brokers=$info_brokers->item;
		
		$this->info_brokers=$info_brokers->item;		
		
		if(count($this->info_brokers)!=0){
		
			$ban=0;
			foreach($this->info_brokers as $key=>$value){
				if((!(is_int($key)))&&($ban==0)){
						$this->info_brokers=array($this->info_brokers);
						$ban=1;
				}
			}

		}
		
		//VALIDA BROKERS
		
		if(count($this->info_brokers)!=0){
		
		$ban=0;
			foreach($this->info_brokers as $key=>$value){
				if((!(is_int($key)))&&($ban==0)){
						$this->info_brokers=array($this->info_brokers);
						$ban=1;
				}
			}

		}
		
		$_SESSION["info_broker"]=$this->info_brokers[0];
		//VALIDA BROKERS
		
	
		
		$noticia=new Noticia();
		$array_noticias=$noticia->get_noticias_seccion(3);
		if(count($array_noticias)>0){
			$_SESSION["mostrar_noticias"]=1;
		}else{
			$_SESSION["mostrar_noticias"]=0;
		}

		$this->tpl->display('html/brokers/index.tpl.php');

		
	}
	
	function tus_clientes(){
		$this->tpl->display('html/brokers/tus_clientes.tpl.php');
	}
	
	function facturacion(){
		
		
		$nom_empresa=explode(" ",trim($_SESSION["info_broker"]->razonSocial));
			
		$nom_empresa=$nom_empresa[0];
		
		$cliente=new Cliente();
		$datos_broker=$cliente->get_broker($nom_empresa);
		
		
		
		
	
		if(isset($_POST["hasta"])){
			
			$inicioVigencia=explode("/",$_POST["desde"]);
			
			$this->tpl->mostrar_fecha_inicio=$_POST["desde"];
			$this->tpl->mostrar_fecha=$_POST["hasta"];
			
			$finVigencia=explode("/",$_POST["hasta"]);

			$inicioVigencia_txt=$inicioVigencia[0].$inicioVigencia[1].$inicioVigencia[2];
			$finVigencia_txt=$finVigencia[0].$finVigencia[1].$finVigencia[2];
			$this->tpl->mostrar_fecha_inicio=$_POST["desde"];	
				
		}else{
			//$inicioVigencia=explode("/",$_SESSION["poliza"]["data"]->finVigencia);
			/*
			$dia=intval(date("d"));
			
			if($dia<15){
				$mes=intval(date("m"));
				$mes=$mes-1;
				if($mes>=10){
					$finVigencia_txt=date("Y");
					$finVigencia_txt.=$mes."01";
				}else{
					$finVigencia_txt=date("Y");
					$finVigencia_txt.="0".$mes."01";
				}
				
			}else{
				$finVigencia_txt=date("Ym");
				$finVigencia_txt.="01";
			}
			*/
                    $this->tpl->mostrar_fecha_inicio="2000-01";//date("Y-m");
		    $this->tpl->mostrar_fecha_inicio.="-01";
                        $inicioVigencia_txt="200001";//date("Ym");
	                $inicioVigencia_txt.="01";
                                
			$finVigencia_txt=date("Ymd");
			$this->tpl->mostrar_fecha=date("Y-m-d");
                        //$nuevafecha = strtotime ( '-30 day' , strtotime ( $this->tpl->mostrar_fecha ) ) ;
                        //$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
                        //$this->tpl->mostrar_fecha_inicio = $nuevafecha;
                        //$inicioVigencia_txt =  date ( 'Ymd' , $nuevafecha );
			
		}
	
		

		
		$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/ComisionNoPagadaWsImpl?wsdl";
		$info_wsdl= new SoapClient($wsdl2);
                 
                $args=array("cod_tipo_agente"=>1,
						"cod_agente"=>$datos_broker[0]["codigo"],
                                                "fec_desde"=>$inicioVigencia_txt,
						"fec_hasta"=> $finVigencia_txt,
						"campoin1"=>"",
						"campoin2"=>"",
						"campoin3"=>"",
						"campoin4"=>"",
						"campoin5"=>"");

		
	
		$facturaciones=$info_wsdl->__soapCall('ws_sise_comision_no_pagada', $args);
		

		
		$this->tpl->facturaciones=$facturaciones->item;
                
		$total=0; $i=0; $arr;
                        foreach($this->tpl->facturaciones as $comision)
                        {
                            $total+=$comision->impComisNormal;
                            
                           if( $comision->impComisNormal != 0 )//|| $comision->numFactura != 0 || $comision->impPrima !=0)
                               $arr[$i]=$comision;
                           
                           $i++;
						
                        }
			$this->tpl->total = $total;
                        $this->tpl->facturaciones = $arr;
                        
			switch ($_GET["format"]) {

				case 'excel':
					$this->tpl->display('html/brokers/excel/comisiones_liberadas.tpl.php');	
				break;

					case 'print':
						
						include("./html/brokers/pdf/comisiones_liberadas.php");
						
						
					break;
					
				default:
				
					$this->tpl->display('html/brokers/comisiones_liberadas.tpl.php');
				
			}
				
		
	}
	
	function comisiones_pagadas(){
		
		
			$nom_empresa=explode(" ",trim($_SESSION["info_broker"]->razonSocial));

			$nom_empresa=$nom_empresa[0];

			$cliente=new Cliente();
			$datos_broker=$cliente->get_broker($nom_empresa);
			
			
			if((isset($_POST["desde"]))&&(isset($_POST["hasta"]))){

				$inicioVigencia=explode("-",$_POST["desde"]);
				$finVigencia=explode("-",$_POST["hasta"]);
				
				$this->tpl->mostrar_fecha_inicio=$_POST["desde"];
				$this->tpl->mostrar_fecha_fin=$_POST["hasta"];

				$inicioVigencia_txt=$inicioVigencia[0].$inicioVigencia[1].$inicioVigencia[2];
				$finVigencia_txt=$finVigencia[0].$finVigencia[1].$finVigencia[2];


			}else{	
				
				//$this->tpl->mostrar_fecha_inicio=date("Y-m");
				//$this->tpl->mostrar_fecha_inicio.="-01";
				
				$this->tpl->mostrar_fecha_fin=date("Y-m-d");
				
				$finVigencia_txt=date("Ymd");
				//$inicioVigencia_txt=date("Ym");
				//$inicioVigencia_txt.="01";
				
                                $nuevafecha0 = strtotime ( '-30 day' , strtotime ( $this->tpl->mostrar_fecha_fin ) ) ;
                                $nuevafecha = date ( 'Y-m-d' , $nuevafecha0 );
                                $this->tpl->mostrar_fecha_inicio = $nuevafecha;
                                $inicioVigencia_txt =  date ( 'Ymd' , $nuevafecha0 );
				
				/*
				$dia=intval(date("d"));

				if($dia<15){
					$mes=intval(date("m"));
					$mes=$mes-1;
					if($mes>=10){
						$finVigencia_txt=date("Y");
						$finVigencia_txt.=$mes."01";
						$this->tpl->mostrar_fecha_fin=date("Y")."-".$mes."-"."01";
						
						$mes=$mes-1;
						$inicioVigencia_txt=date("Y").$mes."01";
						$this->tpl->mostrar_fecha_inicio=date("Y")."-".$mes."-"."01";
						
					}else{
						$finVigencia_txt=date("Y");
						$finVigencia_txt.="0".$mes."01";
						$this->tpl->mostrar_fecha_fin=date("Y")."-"."0".$mes."-"."01";
						
						$mes=$mes-1;
						$inicioVigencia_txt=date("Y")."0".$mes."01";
						$this->tpl->mostrar_fecha_inicio=date("Y")."-0".$mes."-01";
						
					}

				}else{
					$finVigencia_txt=date("Ym");
					$finVigencia_txt.="01";
					$this->tpl->mostrar_fecha_fin=date("Y-m")."01";
					
					$mes=$mes-1;
					$inicioVigencia_txt=date("Y").$mes."01";
					$this->tpl->mostrar_fecha_inicio=date("Y")."-0".$mes."-01";
					
				}
				
				*/
				
				
				
			}
			
			
			
			$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/ComisionPagadaWsImpl?wsdl";
			$info_wsdl= new SoapClient($wsdl2);
                       
                        
			$args=array("cod_tipo_agente"=>1,
							"cod_agente"=>$datos_broker[0]["codigo"],
							"fec_desde"=>$inicioVigencia_txt,
							"fec_hasta"=>$finVigencia_txt,
							"campoin1"=>"",
							"campoin2"=>"",
							"campoin3"=>"",
							"campoin4"=>"",
							"campoin5"=>"");
							
			
							

			
			$facturaciones=$info_wsdl->__soapCall('ws_sise_comision_pagada', $args);

			$this->tpl->facturaciones=$facturaciones->item;
			
                        $total=0;
                        foreach($this->tpl->facturaciones as $comision)
                        {
                            $total+=$comision->valor;
                        }
			$this->tpl->total = $total;
                        
				switch ($_GET["format"]) {

					case 'excel':
						$this->tpl->display('html/brokers/excel/comisiones_pagadas.tpl.php');
					break;

					case 'print':
						
						include("./html/brokers/pdf/comisiones_pagadas.php");
						
						
					break;
						
					default:
						$this->tpl->display('html/brokers/comisiones_pagadas.tpl.php');
				}
		
		
		
		
	}
	


	function informacion_poliza(){


		
		$_POST["cliente"]=$_GET["cliente"];

		$this->todas_polizas();

		if(isset($_POST["poliza_cliente"])){
		
	
		$poliza_array=explode("-",$_POST["poliza_cliente"]);
			
		$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/InfoPolizaWsImpl?wsdl";
		$info_wsdl_poliza = new SoapClient($wsdl2);
		$args=array("cod_suc"=>$poliza_array[1],"cod_ramo"=>$poliza_array[2],
					"nro_pol"=>$poliza_array[0],"campoin1"=>"","campoin2"=>"","campoin3"=>"",
					"campoin4"=>"","campoin5"=>"");
		
		
		
						
		$_SESSION["poliza"]["cod_suc"]=$poliza_array[1];
		$_SESSION["poliza"]["cod_ramo"]=$poliza_array[2];
		$_SESSION["poliza"]["nro_pol"]=$poliza_array[0];			

		}else{
			
			$_SESSION["poliza"]["cod_suc"]=$_SESSION["equivida"]["poliza"][0]["codigoSucursal"];
			$_SESSION["poliza"]["cod_ramo"]=$_SESSION["equivida"]["poliza"][0]["codigoRamo"];
			$_SESSION["poliza"]["nro_pol"]=$_SESSION["equivida"]["poliza"][0]["numeroPoliza"];

			$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/InfoPolizaWsImpl?wsdl";
			$info_wsdl_poliza = new SoapClient($wsdl2);
			$args=array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
						"nro_pol"=>$_SESSION["poliza"]["nro_pol"],"campoin1"=>"","campoin2"=>"","campoin3"=>"",
						"campoin4"=>"","campoin5"=>"");
		

		}
	
			
		$infopoliza_array=$info_wsdl_poliza->__soapCall('ws_sise_info_poliza', $args);
		
		/*
					echo "<pre>";
					print_r($args);
					print_r($infopoliza_array);
					echo "</pre>";
		*/
		$infopoliza_aux=array($infopoliza_array->item);
			
		$_SESSION["poliza"]["data"]=$infopoliza_array->item;
		
		$this->tpl->infopoliza=$infopoliza_aux;
                
		$this->tpl->display('html/brokers/informacion_poliza.tpl.php');

	}

	
	function clientes(){

		/*$wsdl=URL_WEBSERVICE."sise-servicio-1.0/ClientesAgenteWsImpl?wsdl";
		$info_wsdl= new SoapClient($wsdl);

		$args=array("numDoc"=>$_SESSION["equivida"]["bd"]["ruc"],
					"tipoAgente"=>"",
					"codAgente"=>"",
					"snActivas"=>-1,
					"campoin1"=>"",
					"campoin2"=>"",
					"campoin3"=>"",
					"campoin4"=>"",
					"campoin5"=>"");
		
		
	
		$info_clientes=$info_wsdl->__soapCall('ws_sise_clientes_agente', $args);		
                $_SESSION["equivida"]["clientes"]=$info_clientes->item;*/
                $clientesagente=new Clientesagente;
                $info_clientes=$clientesagente->get_clientes();
                
                
		$_SESSION["equivida"]["clientes"]=$info_clientes;
		
			for($i=0;$i<count($_SESSION["equivida"]["clientes"]);$i++){
				$_SESSION["equivida"]["clientes"][$i]->contratante=trim($_SESSION["equivida"]["clientes"][$i]->contratante);
			}


        }

	function todas_polizas(){


		if(isset($_POST["cliente"])){
			
			for($i=0;$i<count($_SESSION["equivida"]["clientes"]);$i++){

				if($_SESSION["equivida"]["clientes"][$i]->numeroDocumento==$_POST["cliente"]){
								$_SESSION["cliente"]["nombre"]=$_SESSION["equivida"]["clientes"][$i]->contratante;
				}

			}

			$_SESSION["cliente"]["ruc"]=$_POST["cliente"];
			
			$wsdl = URL_WEBSERVICE."sise-servicio-1.0/ConsultaPolizasWsImpl?wsdl";
			$cliente = new SoapClient($wsdl);
			
			unset($_SESSION["equivida"]["poliza"]);
			
			$args = array("nro_doc"=> $_POST["cliente"], "id_persona"=>"", "sn_activas"=>"-1", "tipo_busca"=>"1", "campo1"=>"", "campo2"=>"", "campo3"=>"" , "campo4"=>"", "campo5"=>"");
			$poliza = $cliente->__soapCall('llamarConsultaPolizasSp', $args);
			
			$ban=0;
			foreach($poliza->item as $key=>$value){
					if((!(is_int($key)))&&($ban==0)){
						$poliza->item =array($poliza->item);
						$ban=1;
					}
			}

			for($i=0;$i<count($poliza->item);$i++){
                                if ($poliza->item[$i]->numeroDocAgente == $_SESSION["equivida"]["bd"]["ruc"])//Filtro
                                        {$_SESSION["equivida"]["poliza"][$i]["numeroPoliza"]=$poliza->item[$i]->numeroPoliza;
					$_SESSION["equivida"]["poliza"][$i]["codigoSucursal"]=$poliza->item[$i]->codigoSucursal;
					$_SESSION["equivida"]["poliza"][$i]["codigoRamo"]=$poliza->item[$i]->codigoRamo;}

			}
			

		}
		
	}


	function certificado_individual(){

		
			switch ($_GET["format"]) {
				case 'certificado':
					

					include("./html/brokers/pdf/certificado.php");
	
				break;
				
				default:

								$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/AseguradosPolizaWsImpl?wsdl";
			$info_wsdl_poliza = new SoapClient($wsdl2);
			
			
			if((isset($_POST["desde"]))&&(isset($_POST["hasta"]))){
				
				$inicioVigencia=explode("/",$_POST["desde"]);
				$finVigencia=explode("/",$_POST["hasta"]);
				
				$inicioVigencia_txt=$inicioVigencia[0].$inicioVigencia[1].$inicioVigencia[2];
				$finVigencia_txt=$finVigencia[0].$finVigencia[1].$finVigencia[2];
				
				
			}else{
				$inicioVigencia=explode("/",$_SESSION["poliza"]["data"]->finVigencia);
				$finVigencia=explode("/",$_SESSION["poliza"]["data"]->finVigencia);
				
				$inicioVigencia_txt=$inicioVigencia[2].$inicioVigencia[1].$inicioVigencia[0];
				$finVigencia_txt=$finVigencia[2].$finVigencia[1].$finVigencia[0];
			}
		
			$inicioVigencia_txt=$inicioVigencia[2].$inicioVigencia[1].$inicioVigencia[0];
			$finVigencia_txt=$finVigencia[2].$finVigencia[1].$finVigencia[0];

			$args=array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],
						"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
						"nro_pol"=>$_SESSION["poliza"]["nro_pol"],
						"sn_solo_activos"=>-1,
						"fec_desde"=>$inicioVigencia_txt,
						"fec_hasta"=>$finVigencia_txt,
						"campoin1"=>"",
						"campoin2"=>"",
						"campoin3"=>"",
						"campoin4"=>"",
						"campoin5"=>"");

			$vidas_seguras=$info_wsdl_poliza->__soapCall('ws_sise_list_aseg_poliza', $args);
			$this->tpl->vidas_seguras=$vidas_seguras->item;


					$this->tpl->display('html/brokers/certificado_individual.tpl.php');
				break;
			}

			

			

			

	}

	function coberturas_contratadas(){

			$wsdl2=URL_WEBSERVICE."sise-servicio-1.0/CoberturaPolizaWsImpl?wsdl";
			$info_wsdl_poliza = new SoapClient($wsdl2);
                        
			$args=array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],
						"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
						"nro_pol"=>$_SESSION["poliza"]["nro_pol"],
						"campoin1"=>"",
						"campoin2"=>"",
						"campoin3"=>"",
						"campoin4"=>"",
						"campoin5"=>"");
	
			$coberturas=$info_wsdl_poliza->__soapCall('ws_sise_cobertura_poliza', $args);
                       
                        $mostrarValorAsegurado=TRUE;
                        
                        
                        if(is_array($coberturas->item))
                        {        
                            if(strcmp(trim($coberturas->item[0]->txt_desc_capital),"MULTIPLO DE SUELDOS")==0){
                                $mostrarValorAsegurado=FALSE;
                            }elseif (strcmp(trim($coberturas->item[0]->txt_desc_capital),"MULTIPLO SUELDO Y PRIMA POR EDAD")==0) {
                                $mostrarValorAsegurado=FALSE;
                            }elseif (strcmp(trim($coberturas->item[0]->txt_desc_capital),"SUELDO POR ANTIGUEDAD")==0) {
                                $mostrarValorAsegurado=FALSE;
                            }elseif (strcmp(trim($coberturas->item[0]->txt_desc_capital),"S.M.M.L.V.")==0) {
                                $mostrarValorAsegurado=FALSE;
                            }
                        }   
                        
			$this->tpl->coberturas=$coberturas->item;
                        $this->tpl->mostrarValorAsegurado=$mostrarValorAsegurado;



			

			switch ($_GET["format"]) {

				case 'excel':
					$this->tpl->display('html/brokers/excel/coberturas.tpl.php');	
				break;

				case 'print':

					include("./html/brokers/pdf/coberturas.php");

				break;

				default:
					$this->tpl->display('html/brokers/coberturas.tpl.php');
				break;


			}


	}

	function asegurados(){
			$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/AseguradosPolizaWsImpl?wsdl";
			$info_wsdl_poliza = new SoapClient($wsdl2);
			
			
			if((isset($_POST["desde"]))&&(isset($_POST["hasta"]))){
				
				$inicioVigencia=explode("/",$_POST["desde"]);
				$finVigencia=explode("/",$_POST["hasta"]);
				
				$inicioVigencia_txt=$inicioVigencia[0].$inicioVigencia[1].$inicioVigencia[2];
				$finVigencia_txt=$finVigencia[0].$finVigencia[1].$finVigencia[2];
				
				
			}else{
				$inicioVigencia=explode("/",$_SESSION["poliza"]["data"]->finVigencia);
				$finVigencia=explode("/",$_SESSION["poliza"]["data"]->finVigencia);
				
				$inicioVigencia_txt=$inicioVigencia[2].$inicioVigencia[1].$inicioVigencia[0];
				$finVigencia_txt=$finVigencia[2].$finVigencia[1].$finVigencia[0];
			}
		
			$inicioVigencia_txt=$inicioVigencia[2].$inicioVigencia[1].$inicioVigencia[0];
			$finVigencia_txt=$finVigencia[2].$finVigencia[1].$finVigencia[0];
                        
			$args=array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],
						"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
						"nro_pol"=>$_SESSION["poliza"]["nro_pol"],
						"sn_solo_activos"=>-1,
						"fec_desde"=>$inicioVigencia_txt,
						"fec_hasta"=>$finVigencia_txt,
						"campoin1"=>"",
						"campoin2"=>"",
						"campoin3"=>"",
						"campoin4"=>"",
						"campoin5"=>"");

			$vidas_seguras=$info_wsdl_poliza->__soapCall('ws_sise_list_aseg_poliza', $args);
                        
			$this->tpl->vidas_seguras=$vidas_seguras->item;

			



			switch ($_GET["format"]) {

				case 'excel':

				$this->tpl->display('html/brokers/excel/vidas_seguras.tpl.php');	

				break;

				case 'print':


				
					include("./html/brokers/pdf/vidas_seguras.php");


				break;

				default:

				$this->tpl->display('html/brokers/vidas_seguras.tpl.php');

			}

		
	}

	function siniestro(){
		$this->tpl->display('html/brokers/siniestro.tpl.php');
	}

	function notificar(){

		if($_POST["status"]=="enviar"){
				
				$solicitud=new Solicitud();
				$solicitud->set_notificar();
		}

		$this->tpl->display('html/brokers/notificar.tpl.php');
	}


	function beneficiarios(){
		$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/BeneficiariosWsImpl?wsdl";
		$beneficiario = new SoapClient($wsdl2);
		$args=array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
							"nro_pol"=>$_SESSION["poliza"]["nro_pol"],"cod_aseg"=>$_GET["code"], 
							"campoin1"=>"","campoin2"=>"","campoin3"=>"",
							"campoin4"=>"","campoin5"=>"");

		$lista_beneficios=$beneficiario->__soapCall('ws_sise_beneficiarios', $args);

		$this->tpl->lista_beneficios=$lista_beneficios->item;
				
				
				switch ($_GET["format"]) {
					case 'excel':
						$this->tpl->display('html/personas/excel/beneficiarios.tpl.php');
					break;
					case 'print':
						
						$pdf = new FPDF();
						$pdf->AddPage();
						$pdf->Image("http://www.equivida.com/images/uploads/formularios/logo.png" , 10 ,8, 90 , 16, "PNG" ,"http://www.equivida.com/");
						$pdf->Ln();
						$pdf->Ln();
						$pdf->SetY(30);
						$pdf->SetFont('Arial','B',14);
						$pdf->Cell(0,10,'Beneficiarios');	
						$pdf->SetFont('Arial','',10);
						$pdf->Ln();
						$pdf->Cell(0,10, utf8_decode('Tu póliza cuenta con las siguientes beneficiarios:'));
						
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
						$pdf->SetFont('Arial','B',8);
						
						$pdf->Cell(90,7,'Nombre',1,0,'C',1);
						$pdf->Cell(20,7,'Fecha Alta',1,0,'C',1);
						$pdf->Cell(20,7,'Parentesco',1,0,'C',1);
						$pdf->Cell(40,7,utf8_decode('Porcentaje Participacion'),1,0,'C',1);
						
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
							
							$pdf->Cell(90,6,utf8_decode($this->tpl->lista_beneficios[$i]->nombre),'LR',0,'L',$fill);
							$pdf->Cell(20,6,$this->tpl->lista_beneficios[$i]->fechaAlta,'LR',0,'L',$fill);
							$pdf->Cell(20,6,$this->tpl->lista_beneficios[$i]->parentesco,'LR',0,'L',$fill);
							$pdf->Cell(40,6,$this->tpl->lista_beneficios[$i]->pjePartic,'LR',0,'L',$fill);
							$pdf->Ln();
						
						}

						$fill=!$fill;
						$pdf->Cell(170,0,'','T');

						$pdf->Output("equivida-beneficiarios.pdf",'I');
						
						
					break;
			}


	}


	function informate(){

		$noticia=new Noticia();
		if(!(isset($_GET["id"]))){
			$this->tpl->noticias=$noticia->get_noticias_seccion(3);
			$this->tpl->display('html/brokers/informate.tpl.php');
		}else{
			$this->tpl->noticias=$noticia->get_noticia($_GET["id"]);
			$this->tpl->display('html/brokers/informate.tpl.php');
		}
	}

}