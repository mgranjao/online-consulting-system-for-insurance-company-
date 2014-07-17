<?php

/**
* 
*/

class Empresas_controller{
	
	private $tpl;
	function __construct($page,&$tpl) {
			$this->tpl=$tpl;
			if($page!="")
			eval('$this->'.$page.'();');
			else
			$this->index();
	}
	
	function index(){
		/*
		if(!(isset($_SESSION["equivida"]["poliza"]))){
			$this->setup_polizas();
		}
		
		
	


			if(!isset($_POST["poliza"])){

				$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/InfoPolizaWsImpl?wsdl";
				$info_wsdl_poliza = new SoapClient($wsdl2);

				if(!isset($_SESSION["poliza"]["cod_suc"])){
					$_SESSION["poliza"]["cod_suc"]=$_SESSION["equivida"]["poliza"][0]["codigoSucursal"];
					$_SESSION["poliza"]["cod_ramo"]=$_SESSION["equivida"]["poliza"][0]["codigoRamo"];
					$_SESSION["poliza"]["nro_pol"]=$_SESSION["equivida"]["poliza"][0]["numeroPoliza"];

				}

				$args=array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
							"nro_pol"=>$_SESSION["poliza"]["nro_pol"],"campoin1"=>"","campoin2"=>"","campoin3"=>"",
							"campoin4"=>"","campoin5"=>"");


				$infopoliza_array=$info_wsdl_poliza->__soapCall('ws_sise_info_poliza', $args);
				$infopoliza_aux=array($infopoliza_array->item);

				$_SESSION["poliza"]["data"]=$infopoliza_array->item;

				$this->tpl->infopoliza=$infopoliza_aux;

			}else{

				$poliza_array=explode("-",$_POST["poliza"]);

				$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/InfoPolizaWsImpl?wsdl";
				$info_wsdl_poliza = new SoapClient($wsdl2);
				$args=array("cod_suc"=>$poliza_array[1],"cod_ramo"=>$poliza_array[2],
							"nro_pol"=>$poliza_array[0],"campoin1"=>"","campoin2"=>"","campoin3"=>"",
							"campoin4"=>"","campoin5"=>"");

				$_SESSION["poliza"]["cod_suc"]=$poliza_array[1];
				$_SESSION["poliza"]["cod_ramo"]=$poliza_array[2];
				$_SESSION["poliza"]["nro_pol"]=$poliza_array[0];			

				$infopoliza_array=$info_wsdl_poliza->__soapCall('ws_sise_info_poliza', $args);

				$infopoliza_aux=array($infopoliza_array->item);

				$_SESSION["poliza"]["data"]=$infopoliza_array->item;

				$this->tpl->infopoliza=$infopoliza_aux;

			}
			
*/
            if(isset($_POST["poliza"])){
            $poliza_array=explode("-",$_POST["poliza"]);
            $_SESSION["poliza"]["nro_pol"] = $poliza_array[0]; 
            }

			if(count($_SESSION["equivida"]["poliza"])!=0){
				$this->tpl->display('html/empresas/index.tpl.php');
			}else{
				//$this->tpl->display('html/empresas/error.tpl.php');
                                $this->tpl->display('html/empresas/index.tpl.php');
			}
		
			
		
	}
	
	
	function vidas_seguras(){
			//Conectarse a Webservice


			if(isset($_POST["poliza"])){
					$this->change_poliza();
			}

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
				$finVigencia_txt=date("Ymd");
				
			}
		
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

				$this->tpl->display('html/empresas/excel/vidas_seguras.tpl.php');	

				break;

				case 'print':

					include("./html/empresas/pdf/vida_seguras.php");
						


				break;

				default:

				$this->tpl->display('html/empresas/vidas_seguras.tpl.php');	

			}


			
	}
	
	function coberturas(){

			if(isset($_POST["poliza"])){
					$this->change_poliza();
			}

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
					$this->tpl->display('html/empresas/excel/coberturas.tpl.php');
				break;

				case 'print':

						include("./html/empresas/pdf/coberturas.php");

				break;

						
				default:
					$this->tpl->display('html/empresas/coberturas.tpl.php');
				break;
			}

	}
	function certificado_individual(){

			if(isset($_POST["poliza"])){
					$this->change_poliza();
			}

			switch ($_GET["format"]) {
				case 'certificado':
					

						include("./html/empresas/pdf/certificado.php");

	
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
				//$finVigencia_txt=$finVigencia[2].$finVigencia[1].$finVigencia[0];
				$finVigencia_txt=date("Ymd");
			}
		
			//$inicioVigencia_txt=$inicioVigencia[2].$inicioVigencia[1].$inicioVigencia[0];
			//$finVigencia_txt=$finVigencia[2].$finVigencia[1].$finVigencia[0];
			
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
                        

					$this->tpl->display('html/empresas/certificado_individual.tpl.php');	
				break;
			}

			





	}
	
	function siniestro(){

			if(isset($_POST["poliza"])){
					$this->change_poliza();
			}

			$this->tpl->display('html/empresas/siniestro.tpl.php');
	}
	
	function notificar(){

			if(isset($_POST["poliza"])){
					$this->change_poliza();
			}



			if($_POST["status"]=="enviar"){
				
				$solicitud=new Solicitud();
				$solicitud->set_notificar();
			}

			$this->tpl->display('html/empresas/notificar.tpl.php');
	}
	
	
	

	
	function setup_polizas(){
		
		
		
		$wsdl = URL_WEBSERVICE."sise-servicio-1.0/ConsultaPolizasWsImpl?wsdl";
		$cliente = new SoapClient($wsdl);
								
		$args = array("nro_doc"=> $_SESSION["equivida"]["bd"]["ruc"], "id_persona"=>"", "sn_activas"=>"-1", "tipo_busca"=>"1", "campo1"=>"", "campo2"=>"", "campo3"=>"" , "campo4"=>"", "campo5"=>"");
								
		$poliza = $cliente->__soapCall('llamarConsultaPolizasSp', $args);
		

		

	
		$num_total=count($poliza->item);
		
		$this->tpl->num_total=$num_total;
		
		if(count($poliza->item)==1){
			
				if($poliza->item->estadoPoliza=="VIGENTE"){
				
					$_SESSION["equivida"]["poliza"][0]["numeroPoliza"]=$poliza->item->numeroPoliza;
					$_SESSION["equivida"]["poliza"][0]["codigoSucursal"]=$poliza->item->codigoSucursal;
					$_SESSION["equivida"]["poliza"][0]["codigoRamo"]=$poliza->item->codigoRamo;
				
				}
			
		}else{
			$cont=0;
			for($i=0;$i<count($poliza->item);$i++){
				
				if($poliza->item[$i]->estadoPoliza=="VIGENTE"){
					
					$_SESSION["equivida"]["poliza"][$cont]["numeroPoliza"]=$poliza->item[$i]->numeroPoliza;
					$_SESSION["equivida"]["poliza"][$cont]["codigoSucursal"]=$poliza->item[$i]->codigoSucursal;
					$_SESSION["equivida"]["poliza"][$cont]["codigoRamo"]=$poliza->item[$i]->codigoRamo;
				
					$cont++;
				}
				
			}
			
			
		}

	

		$noticia=new Noticia();
		$array_noticias=$noticia->get_noticias_seccion(2);
		if(count($array_noticias)>0){
			$_SESSION["mostrar_noticias"]=1;
		}else{
			$_SESSION["mostrar_noticias"]=0;
		}


/*
		$num_total=count($poliza->item);
		
	
		$this->tpl->num_total=$num_total;
		
		if(count($poliza->item)==1){
			
				
				
					$_SESSION["equivida"]["poliza"][0]["numeroPoliza"]=$poliza->item->numeroPoliza;
					$_SESSION["equivida"]["poliza"][0]["codigoSucursal"]=$poliza->item->codigoSucursal;
					$_SESSION["equivida"]["poliza"][0]["codigoRamo"]=$poliza->item->codigoRamo;
				
			
			
		}else{
			$cont=0;
			for($i=0;$i<count($poliza->item);$i++){
				
					
					$_SESSION["equivida"]["poliza"][$cont]["numeroPoliza"]=$poliza->item[$i]->numeroPoliza;
					$_SESSION["equivida"]["poliza"][$cont]["codigoSucursal"]=$poliza->item[$i]->codigoSucursal;
					$_SESSION["equivida"]["poliza"][$cont]["codigoRamo"]=$poliza->item[$i]->codigoRamo;
				
					$cont++;
			
				
			}
			
			
		}
	*/
		
		



		
	}




	function change_poliza(){
		
		
		$poliza_array=explode("-",$_POST["poliza"]);
		
		$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/InfoPolizaWsImpl?wsdl";
		$info_wsdl_poliza = new SoapClient($wsdl2);
		$args=array("cod_suc"=>$poliza_array[1],"cod_ramo"=>$poliza_array[2],
					"nro_pol"=>$poliza_array[0],"campoin1"=>"","campoin2"=>"","campoin3"=>"",
					"campoin4"=>"","campoin5"=>"");
					
		$_SESSION["poliza"]["cod_suc"]=$poliza_array[1];
		$_SESSION["poliza"]["cod_ramo"]=$poliza_array[2];
		$_SESSION["poliza"]["nro_pol"]=$poliza_array[0];			
		
		$infopoliza_array=$info_wsdl_poliza->__soapCall('ws_sise_info_poliza', $args);
		
		$infopoliza_aux=array($infopoliza_array->item);
		
		$_SESSION["poliza"]["data"]=$infopoliza_array->item;
		
		$this->tpl->infopoliza=$infopoliza_aux;
		
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
						
						include("./html/personas/pdf/beneficiarios.php");
						
						
					break;
			}


	}


	function informate(){

			if(isset($_POST["poliza"])){
					$this->change_poliza();
			}

			
		$noticia=new Noticia();
		if(!(isset($_GET["id"]))){
			$this->tpl->noticias=$noticia->get_noticias_seccion(2);
			$this->tpl->display('html/empresas/informate.tpl.php');
		}else{
			$this->tpl->noticias=$noticia->get_noticia($_GET["id"]);
			$this->tpl->display('html/empresas/informate.tpl.php');
		}
	}

	
	
}