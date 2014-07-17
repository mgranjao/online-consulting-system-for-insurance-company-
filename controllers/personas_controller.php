<?php

/**
* 
*/

class Personas_controller{
	
	private $tpl;
        private $variableGlobal1;
        private $variableGlobal2;
        private $mensaje;
        
	function __construct($page,&$tpl) {
                        $this->variableGlobal1=0; //No mostrar Ramo 55
                        $this->variableGlobal2=1; //No mostrar Ramos 25,50
			$this->tpl=$tpl;
			if($page!="")
			eval('$this->'.$page.'();');
			else
			$this->index();
	}
	
	
        function menu(){
            //$this->tpl->display("html/layouts/menu_cliente.tpl.php");
            $this->tpl->display("html/layouts/menu_cliente_ajax.tpl.php");
        }
        
	function index(){
		
		/*if(!(isset($_SESSION["equivida"]["poliza"]))){
			$this->setup_polizas();

		}

                
                $this->variables_globales();//verifica las configuraciones de las variables globales
                    
		$this->carga_datos_personales();
			
		if(!isset($_POST["poliza"])){
                    
			$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/InfoPolizaWsImpl?wsdl";
			$info_wsdl_poliza = new SoapClient($wsdl2);

			if(!isset($_SESSION["poliza"]["cod_suc"])){
				$_SESSION["poliza"]["cod_suc"]=$_SESSION["equivida"]["poliza"][0]["codigoSucursal"];
				$_SESSION["poliza"]["cod_ramo"]=$_SESSION["equivida"]["poliza"][0]["codigoRamo"];
				$_SESSION["poliza"]["nro_pol"]=$_SESSION["equivida"]["poliza"][0]["numeroPoliza"];
				
			}
			$this->tpl->cod_ramo = $_SESSION["poliza"]["cod_ramo"];
                        
			$args=array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
						"nro_pol"=>$_SESSION["poliza"]["nro_pol"],"campoin1"=>"","campoin2"=>"","campoin3"=>"",
						"campoin4"=>"","campoin5"=>"");
			
			

			$infopoliza_array=$info_wsdl_poliza->__soapCall('ws_sise_info_poliza', $args);
			$infopoliza_aux=array($infopoliza_array->item);

			
			$_SESSION["poliza"]["data"]=$infopoliza_array->item;

                        if(!(isset($_SESSION["equivida"]["estadocuenta"]))){
				$this->valida_estado_de_cuenta();	
			}
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

			$this->valida_estado_de_cuenta();
			
			$this->tpl->infopoliza=$infopoliza_aux;
			
			}
			
*/      //$this->valida_estado_de_cuenta();
 

              if(isset($_POST["poliza"])){
            $poliza_array=explode("-",$_POST["poliza"]);
            $_SESSION["poliza"]["nro_pol"] = $poliza_array[0]; 
            }
	
		
			if(count($_SESSION["equivida"]["poliza"])!=0){
				$this->tpl->display('html/personas/index.tpl.php');
			}else{
                            $this->tpl->display('html/personas/index.tpl.php');
                                //$this->tpl->mensaje = $this->mensaje;
				//$this->tpl->display('html/personas/error.tpl.php');
			}
			
			
				
	}
	
	
	function beneficiarios(){
		
            if(isset($_SESSION["poliza"]["cod_suc"])){
                
            
				if(isset($_POST["poliza"])){
					$this->change_poliza();
				}
				
				$inicioVigencia=explode("/",$_SESSION["poliza"]["data"]->inicioVigencia);
				$finVigencia=explode("/",$_SESSION["poliza"]["data"]->finVigencia);

				$inicioVigencia_txt=$inicioVigencia[2].$inicioVigencia[1].$inicioVigencia[0];
				//$finVigencia_txt=$finVigencia[2].$finVigencia[1].$finVigencia[0];
				$finVigencia_txt=date("Ymd");
				
			
				//Codigo Asegurado
				$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/AseguradosPolizaWsImpl?wsdl";

				$asegurado = new SoapClient($wsdl2);
                                //echo($_SESSION["poliza"]["cod_suc"]." | ".$_SESSION["poliza"]["cod_ramo"]." | ".$_SESSION["poliza"]["nro_pol"]." | ".$inicioVigencia_txt." | ".$finVigencia_txt);
				$args=array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
							"nro_pol"=>$_SESSION["poliza"]["nro_pol"],"sn_solo_activos"=>"-1","fec_desde"=>$inicioVigencia_txt,
							"fec_hasta"=>$finVigencia_txt, 
							"campoin1"=>"?","campoin2"=>"?","campoin3"=>"?",
							"campoin4"=>"?","campoin5"=>"?");
						
				

				$codigo_asegurado=$asegurado->__soapCall('ws_sise_list_aseg_poliza', $args);
                                $codAsegurado=$codigo_asegurado->item->codAsegurado;
                                foreach($codigo_asegurado->item as $cod)
                                {
                                    if ($cod->tipoAsegurado == "TITULAR")
                                        $codAsegurado=$cod->codAsegurado;
                                }
				

				//Beneficarios


				$wsdl2= URL_WEBSERVICE."sise-servicio-1.0/BeneficiariosWsImpl?wsdl";
				$beneficiario = new SoapClient($wsdl2);
                                //echo($_SESSION["poliza"]["cod_suc"]." | ".$_SESSION["poliza"]["cod_ramo"]." | ".$_SESSION["poliza"]["nro_pol"]." | ".$codAsegurado);
				$args=array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
							"nro_pol"=>$_SESSION["poliza"]["nro_pol"],"cod_aseg"=>$codAsegurado, 
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
					default:
						$this->tpl->display('html/personas/beneficiarios.tpl.php');
					break;
				}
            }else
                $this->tpl->display('html/personas/beneficiarios.tpl.php');
		
	}
	
	
	function coberturas(){
			
			
			if(isset($_POST["poliza"])){
				$this->change_poliza();
			}
		
			
		
			//Conectarse a Webservice
			
			$wsdl = URL_WEBSERVICE."sise-servicio-1.0/CoberturaPolizaWsImpl?wsdl";
			$cliente = new SoapClient($wsdl);

			$args = array("cod_suc"=> $_SESSION["poliza"]["cod_suc"], "cod_ramo"=>$_SESSION["poliza"]["cod_ramo"], "nro_pol"=>$_SESSION["poliza"]["nro_pol"],  "campoin1"=>"", "campoin2"=>"", "campoin3"=>"" , "campoin4"=>"", "campoin5"=>"");
			
			

			$cobertura = $cliente->__soapCall('ws_sise_cobertura_poliza', $args);
			
			
			$this->tpl->coberturas=$cobertura->item;
			
			
			
			switch($_GET["format"]){
				case "excel":
					
					$this->tpl->display('html/personas/excel/coberturas.tpl.php');
					
				break;
				
				case "print":
				
					include("./html/personas/pdf/coberturas.php");
					
				break;
				
				default:
					$this->tpl->display('html/personas/coberturas.tpl.php');
				
			}
		
	}
	
	function estado_de_cuenta(){
		
			if(isset($_POST["poliza"])){
				$this->change_poliza();
			}
			
		
			
			$wsdl=URL_WEBSERVICE.'sise-servicio-1.0/EstadoCuentaWsImpl?wsdl';
			$cliente = new SoapClient($wsdl);
		
			$inicioVigencia=explode("/",$_SESSION["poliza"]["data"]->inicioVigencia);
			$finVigencia=explode("/",$_SESSION["poliza"]["data"]->finVigencia);
                        
			$inicioVigencia_txt=$inicioVigencia[2].$inicioVigencia[1].$inicioVigencia[0];
			//$finVigencia_txt=$finVigencia[2].$finVigencia[1].$finVigencia[0];
			$finVigencia_txt=date("Ymd");
                        
			$args = array(
						"cod_suc"=> $_SESSION["poliza"]["cod_suc"], 
						"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"], 
						"nro_pol"=>$_SESSION["poliza"]["nro_pol"],
						"fec_desde"=>$inicioVigencia_txt,
						"fec_hasta"=>$finVigencia_txt,
						"campoin1"=>"?", 
						"campoin2"=>"?", 
						"campoin3"=>"?" , 
						"campoin4"=>"?", 
						"campoin5"=>"?");
						
		

			$estado_de_cuenta = $cliente->__soapCall('ws_sise_estado_cuenta', $args);
			
			
			$this->tpl->estado_de_cuenta=$estado_de_cuenta->item;
			
                        			
			
			//Direcciones
			$login=new Cliente();
			$this->tpl->direcciones=$login->get_direcciones();
			$this->tpl->correos=$login->get_correos();
			
			
			if((isset($_POST["status"]))&&($_POST["status"]=="enviar")){
				
				$solicitud=new Solicitud();
				$solicitud->set_solicitud("Estado de Cuenta","Solicitud");
				
			}
			
			
			switch ($_GET["format"]) {
				case 'excel':
					$this->tpl->display('html/personas/excel/estado_de_cuenta.tpl.php');
				break;
				
				case 'print':
				
					include("./html/personas/pdf/estado_de_cuenta.php");

				break;
				
				default:
					$this->tpl->display('html/personas/estado_de_cuenta.tpl.php');
				break;
			}

			
			
	}
	


	function solicitud(){
			$this->tpl->display('html/personas/solicitud.tpl.php');
	}
	function retiro(){
			
				if(isset($_POST["poliza"])){
					$this->change_poliza();
				}
				
				
				$wsdl = URL_WEBSERVICE."sise-servicio-1.0/DisponibleRetiroWsImpl?wsdl";
				$cliente = new SoapClient($wsdl);

				$args = array("cod_sucursal"=> $_SESSION["poliza"]["cod_suc"], "cod_ramo"=>$_SESSION["poliza"]["cod_ramo"], "nro_poliza"=>$_SESSION["poliza"]["nro_pol"],  "fec_hasta"=>date("Ymd"), "sn_muestra"=>"-1",
							"campoin1"=>"?", "campoin2"=>"?" , "campoin3"=>"?", "campoin4"=>"?", "campoin5"=>"?");
			
				$retiros = $cliente->__soapCall('ws_sise_disponible_retiro', $args);
				
				
				
				
			$this->tpl->retiros=$retiros->item;

		
                        if($_POST["status"]=="imprimir"){
                           if($_POST["valor_a_retirar"]>$_POST["monto_a_retirar"]){
					$_SESSION["flash_error"]="El valor a retirar no puede ser mayor al monto disponible";
				}else{ 
                            include("./html/personas/pdf/retiro.php");

					$_SESSION["flash_ok"]="El Documento se genero correctamente";
                                }
                        }
                        
                        
			if($_POST["status"]=="enviar"){
				
				if($_POST["valor_a_retirar"]>$_POST["monto_a_retirar"]){
					$_SESSION["flash_error"]="El valor a retirar no puede ser mayor al monto disponible";
				}else{

                                        if($_POST["enviar_correo"]=="1")
                                        {
                                            $html='
							<table width="100%">
						<tr>
							<td style="border-bottom:1px Solid #d4e5ee;">

								<img src="http://www.tagadata.com/equivida/images/logo.png" />
							</td>
						</tr>
						<tr>
							<td style="color:#5f6263;font-size:12px; font-family:Verdana;  ">
					<p>
					Solicitud de Retiro<br>
                                        Srs. Equivida, por medio de la presente solicito su aprobación de retiro parcial sobre el ahorro de
                                        mi póliza de seguro.<br>
                                        No. de póliza: '.$_SESSION["poliza"]["nro_pol"].'<br>
                                        Nombres: '.$_SESSION["equivida"]["bd"]["primer_nombre"].' '.$_SESSION["equivida"]["bd"]["segundo_nombre"].' '.$_SESSION["equivida"]["bd"]["primer_apellido"].' '.$_SESSION["equivida"]["bd"]["segundo_apellido"].'<br>
                                        Cedula: '.$_SESSION["equivida"]["bd"]["numero_de_documento"].'<br>
                                        Valor a retirar: $'.$_POST["valor_a_retirar"].'<br>
                                        Att.<br>
					<br><br><br>
					______________________<br>
                                        Firma del Contratante
					</td>
									</tr>

									<tr>
										<td style="border-top:1px Solid #d4e5ee; color:#959b9e; font-size:11px; font-family:Verdana;">
										</td>
									</tr>
								</table>
							';

							$ch = curl_init(MAIL_SERVER);

							curl_setopt ($ch, CURLOPT_POST, 1);
							curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
							$post= "action=register&asunto=Equivida: Solicitud de Retiro&de=consultaenlinea@equivida.com&para=".$_SESSION["equivida"]["bd"]["email"]."&html=".$html."&rol=persona";
							curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
							$page=curl_exec ($ch);
							curl_close ($ch);
                                            
                                        }
				
                                        
                                        /**** Notificacion ****/
                                        $html='
							<table width="100%">
						<tr>
							<td style="border-bottom:1px Solid #d4e5ee;">

								<img src="http://www.tagadata.com/equivida/images/logo.png" />
							</td>
						</tr>
						<tr>
							<td style="color:#5f6263;font-size:12px; font-family:Verdana;  ">
					<p>
					Solicitud de Retiro<br>
                                        Hemos sido notificados de una solicitud de retiro:.<br>
                                        No. de póliza: '.$_SESSION["poliza"]["nro_pol"].'<br>
                                        Nombres: '.$_SESSION["equivida"]["bd"]["primer_nombre"].' '.$_SESSION["equivida"]["bd"]["segundo_nombre"].' '.$_SESSION["equivida"]["bd"]["primer_apellido"].' '.$_SESSION["equivida"]["bd"]["segundo_apellido"].'<br>
                                        Cedula: '.$_SESSION["equivida"]["bd"]["numero_de_documento"].'<br>
                                        Valor a retirar: $'.$_POST["valor_a_retirar"].'<br>
                                       
					</td>
									</tr>

									<tr>
										<td style="border-top:1px Solid #d4e5ee; color:#959b9e; font-size:11px; font-family:Verdana;">
										</td>
									</tr>
								</table>
							';

							$ch = curl_init(MAIL_SERVER);

							curl_setopt ($ch, CURLOPT_POST, 1);
							curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
							$post= "action=register&asunto=Equivida: Solicitud de Retiro&de=consultaenlinea@equivida.com&para=servicioalcliente@equivida.com&html=".$html."&rol=persona";
							curl_setopt ($ch, CURLOPT_POSTFIELDS,$post);
							$page=curl_exec ($ch);
							curl_close ($ch);
                                                        /**********/
                                                        
					//include("./html/personas/pdf/retiro.php");

					$_SESSION["flash_ok"]="El Documento se genero correctamente";
				}
				
			}	
		
			$this->tpl->display('html/personas/retiro.tpl.php');
	}
	function prestamo(){
		
			if(isset($_POST["poliza"])){
				$this->change_poliza();
			}
			

			$wsdl=URL_WEBSERVICE."sise-servicio-1.0/EstadoPrestamoAWsImpl?wsdl";
			$cliente = new SoapClient($wsdl);
			
			$args = array("cod_tipo_doc"=> 1, "nro_doc"=>$_SESSION["equivida"]["cedula"],  "sn_activos"=>"-1",
							"campoin1"=>"?", "campoin2"=>"?" , "campoin3"=>"?", "campoin4"=>"?", "campoin5"=>"?");
			
			
			//$args = array("cod_tipo_doc"=> 1, "nro_doc"=>"0601381593",  "sn_activos"=>"0","campoin1"=>"?", "campoin2"=>"?" , "campoin3"=>"?", "campoin4"=>"?", "campoin5"=>"?");
			
			
			$prestamos = $cliente->__soapCall('ws_sise_estado_prestamo_A', $args);

			$this->tpl->prestamos=$prestamos->item;
			
			
			//PRESTAMO 2
			$wsdl=URL_WEBSERVICE."sise-servicio-1.0/DisponiblePrestamoWsImpl?wsdl";
			$cliente = new SoapClient($wsdl);
			$args = array("cod_suc"=> $_SESSION["poliza"]["cod_suc"], "cod_ramo"=>$_SESSION["poliza"]["cod_ramo"], "nro_pol"=>$_SESSION["poliza"]["nro_pol"], "fec_hasta"=>date("Ymd"),"sn_muestra"=>"-1","campoin1"=>"?", "campoin2"=>"?" , "campoin3"=>"?", "campoin4"=>"?", "campoin5"=>"?");
			//$args = array("cod_suc"=> "1", "cod_ramo"=>"59", "nro_pol"=>"1590000720", "fec_hasta"=>"20120817","sn_muestra"=>"-1","campoin1"=>"", "campoin2"=>"" , "campoin3"=>"", "campoin4"=>"", "campoin5"=>"");
			
			
			
			$disponible_prestamos = $cliente->__soapCall('ws_sise_disponible_prestamo', $args);
	
		
			
			$this->tpl->disponible=$disponible_prestamos->item;
			
			
				if($_POST["status"]=="enviar"){

					if($_POST["valor_a_prestar"]>$_POST["monto_a_prestar"]){
						$_SESSION["flash_error"]="El valor a retirar no puede ser mayor al monto disponible";
					}else{
						$solicitud=new Solicitud();
						$solicitud->set_prestamo();
						$_SESSION["flash_ok"]="Tu Solicitud se envío correctamente";
					}

				}
			
			
			
			
				switch ($_GET["format"]) {
					case 'excel':
						$this->tpl->display('html/personas/excel/prestamo.tpl.php');
					break;

					case 'print':

						include("./html/personas/pdf/prestamo.php");

					break;

					default:
						$this->tpl->display('html/personas/prestamo.tpl.php');
					break;
				}
			

			
	}
	
	function pagos(){
		
		
			if(isset($_POST["poliza"])){
				$this->change_poliza();
			}
			
		
			$wsdl=URL_WEBSERVICE."sise-servicio-1.0/InfoSaldosPolizasWsImpl?wsdl";
			$cliente = new SoapClient($wsdl);
			
			$args = array("cod_suc"=> $_SESSION["poliza"]["cod_suc"], "cod_ramo"=>$_SESSION["poliza"]["cod_ramo"], "nro_poliza"=>$_SESSION["poliza"]["nro_pol"], 
						"campoin1"=>"?", "campoin2"=>"?" , "campoin3"=>"?", "campoin4"=>"?", "campoin5"=>"?");
			
			$pagos = $cliente->__soapCall('ws_sise_info_saldos_poliza', $args);
			

			
			$this->tpl->pagos=$pagos->item;
			

			
			$this->tpl->display('html/personas/pagos.tpl.php');
	}
	function siniestro(){
			
			if(isset($_POST["poliza"])){
				$this->change_poliza();
			}
			
		
			$this->tpl->display('html/personas/siniestro.tpl.php');
	}
	function notificar(){
		
			if(isset($_POST["poliza"])){
				$this->change_poliza();
			}
			
			
			if($_POST["status"]=="enviar"){
				
				$solicitud=new Solicitud();
				$solicitud->set_notificar();
			}
		
			$this->tpl->display('html/personas/notificar.tpl.php');
	}
	
	function factura(){
			
			if(isset($_POST["poliza"])){
				$this->change_poliza();
			}
			
			
			if($_POST["status"]=="enviar"){
				
				$solicitud=new Solicitud();
				$solicitud->set_factura();
				
			}
			

			$login=new Cliente();
			$this->tpl->direcciones=$login->get_direcciones();
			$this->tpl->correos=$login->get_correos();


			$this->tpl->display('html/personas/factura.tpl.php');
	}
	
	function setup_polizas(){
		
			if(isset($_POST["poliza"])){
				$this->change_poliza();
			}
			
		
		$wsdl = URL_WEBSERVICE."sise-servicio-1.0/ConsultaPolizasWsImpl?wsdl";
		$cliente = new SoapClient($wsdl);
								
		$args = array("nro_doc"=> $_SESSION["equivida"]["cedula"], "id_persona"=>"", "sn_activas"=>"-1", "tipo_busca"=>"1", "campo1"=>"", "campo2"=>"", "campo3"=>"" , "campo4"=>"", "campo5"=>"");
	
								
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
		$array_noticias=$noticia->get_noticias_seccion(1);
		if(count($array_noticias)>0){
			$_SESSION["mostrar_noticias"]=1;
		}else{
			$_SESSION["mostrar_noticias"]=0;
		}
		
	}
	
	
	function carga_datos_personales(){
			
			$cliente_bd=new Cliente();
			$direcciones=$cliente_bd->get_direcciones();
			$correos=$cliente_bd->get_correos();
			$telefonos=$cliente_bd->get_telefonos();
			
			if(count($direcciones)==0){
				
				$wsdl=URL_WEBSERVICE."equivida-servicio-1.0/ClienteUnicoWsImpl?wsdl";
				$cliente = new SoapClient($wsdl);
				$args=array("codTipoId"=>"C","idPersona"=>$_SESSION["equivida"]["cedula"]);
				$info_cliente = $cliente->__soapCall('personaNatural', $args);
				$info_cliente=$info_cliente;
				$idPersona=$info_cliente->idPersona;
				$_SESSION["equivida"]["bd"]["id_persona"]=$idPersona;
                                
				//$idPersona="2312295";
				$args=array("secPersona"=>$idPersona);
				$info_direccion = $cliente->__soapCall('direccionPersona', $args);
				
			
				
				$info_direccion=$info_direccion->item;
				
				if(count($info_direccion)!=0){
				$ban=0;
				foreach($info_direccion as $key=>$value){
					if((!(is_int($key)))&&($ban==0)){
						$info_direccion=array($info_direccion);
						$ban=1;
					}
				} 
				}
				
				
				
				$args=array("secPersona"=>$idPersona);
				$info_telefonos = $cliente->__soapCall('telefonoDireccion', $args);
				
				
				$info_telefonos=$info_telefonos->item;

				if(count($info_telefonos)!=0){
				$ban=0;
				foreach($info_telefonos as $key=>$value){
					if((!(is_int($key)))&&($ban==0)){
						$info_telefonos=array($info_telefonos);
						$ban=1;
					}
				} 
				}
				
				if(count($info_direccion)>0){
					$cliente_bd->carga_datos_direcciones($info_direccion);
				}
				
		
				
				if(count($info_telefonos)>0){
					$cliente_bd->carga_datos_telefonos($info_telefonos);
				}
				
			
			
			}
			
		
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

		$this->valida_estado_de_cuenta();


	}


	function valida_estado_de_cuenta(){


		$wsdl=URL_WEBSERVICE.'sise-servicio-1.0/EstadoCuentaWsImpl?wsdl';
		$cliente = new SoapClient($wsdl);
		
		$inicioVigencia=explode("/",$_SESSION["poliza"]["data"]->inicioVigencia);
		$finVigencia=explode("/",$_SESSION["poliza"]["data"]->finVigencia);

		$inicioVigencia_txt=$inicioVigencia[2].$inicioVigencia[1].$inicioVigencia[0];
		//$finVigencia_txt=$finVigencia[2].$finVigencia[1].$finVigencia[0];
		$finVigencia_txt=date("Ymd");
			
		$args = array(
						"cod_suc"=> $_SESSION["poliza"]["cod_suc"], 
						"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"], 
						"nro_pol"=>$_SESSION["poliza"]["nro_pol"],
						"fec_desde"=>$inicioVigencia_txt,
						"fec_hasta"=>$finVigencia_txt,
						"campoin1"=>"?", 
						"campoin2"=>"?", 
						"campoin3"=>"?" , 
						"campoin4"=>"?", 
						"campoin5"=>"?");
		
		
		$estado_de_cuenta = $cliente->__soapCall('ws_sise_estado_cuenta', $args);
		
		$this->tpl->estado_de_cuenta=$estado_de_cuenta->item;	

	
		
			if(count($this->tpl->estado_de_cuenta)!=0){
			$ban=0;
			foreach($this->tpl->estado_de_cuenta as $key=>$value){
			if((!(is_int($key)))&&($ban==0)){
					$this->tpl->estado_de_cuenta=array($this->tpl->estado_de_cuenta);
					$ban=1;
			}
			}
		}

		if(count($this->tpl->estado_de_cuenta)==0){
			$_SESSION["equivida"]["estadocuenta"]=0;
		}else{
			$_SESSION["equivida"]["estadocuenta"]=1;
		}	
		/* Fin */
	}

	function informate(){

		$noticia=new Noticia();
		if(!(isset($_GET["id"]))){
			$this->tpl->noticias=$noticia->get_noticias_seccion(1);
			$this->tpl->display('html/personas/informate.tpl.php');
		}else{
			$this->tpl->noticias=$noticia->get_noticia($_GET["id"]);
			$this->tpl->display('html/personas/informate.tpl.php');
		}
	}
        
        
        function variables_globales()
        {
	
			if(isset($_SESSION["equivida"]["poliza"])){
	
            if($this->variableGlobal1==1&&$this->variableGlobal2==0)
                        {
                        $cont=0;
                        foreach($_SESSION["equivida"]["poliza"] as $pz)
                        {
                            if($pz["codigoRamo"] == 55)
                            {unset($_SESSION["equivida"]["poliza"][$cont]);   }
                            $cont++;
                        }
                           
                            $cont=0;
                            foreach($_SESSION["equivida"]["poliza"] as $pz){
                                $arr[$cont] = $pz;
                                $cont++;
                            }
                            
                            $_SESSION["equivida"]["poliza"]=$arr;  
                            $this->mensaje = "Proximamente estar&aacute;n los datos de la p&oacute;liza de tu ramo";
                        }
              elseif($this->variableGlobal1==0&&$this->variableGlobal2==1)
                        {
                            $cont=0;
                        foreach($_SESSION["equivida"]["poliza"] as $pz)
                        {
                            if($pz["codigoRamo"] == 50 || $pz["codigoRamo"] == 25)
                            {unset($_SESSION["equivida"]["poliza"][$cont]);   }
                            $cont++;
                        }
                  
                            $cont=0;
                            foreach($_SESSION["equivida"]["poliza"] as $pz){
                                $arr[$cont] = $pz;
                                $cont++;
                            }
                            
                            $_SESSION["equivida"]["poliza"]=$arr;                                                        
                        }
	       elseif($this->variableGlobal1==1&&$this->variableGlobal2==1)
                        {   
                           $cont=0;
                        foreach($_SESSION["equivida"]["poliza"] as $pz)
                        {
                            if($pz["codigoRamo"] == 55 || $pz["codigoRamo"] == 50 || $pz["codigoRamo"] == 25)
                            {unset($_SESSION["equivida"]["poliza"][$cont]);   }
                            $cont++;
                        }
                            
                            $cont=0;
                            foreach($_SESSION["equivida"]["poliza"] as $pz){
                                $arr[$cont] = $pz;
                                $cont++;
                            }
                            
                            $_SESSION["equivida"]["poliza"]=$arr;
                            $this->mensaje = "Proximamente estar&aacute;n los datos de la p&oacute;liza de tu ramo";
                        }

			}
        }
	
}