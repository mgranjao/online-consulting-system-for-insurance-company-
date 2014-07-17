<?php 

session_start();
require_once("../config.php");
require_once("../models/basededatos.php");
require_once("../models/chuleta.php");
require_once ("../models/noticia.php");

class Ajax_controller  extends Basededatos{	

	private $tpl;
        private $variableGlobal1;
        private $variableGlobal2;
        private $mensaje;
	function __construct($page) {
		
			parent::__construct();
                        
                        $this->variableGlobal1=0; //No mostrar Ramo 55
                        $this->variableGlobal2=1; //No mostrar Ramos 25,50
			$this->tpl=$tpl;
			if($page!="")
			eval('$this->'.$page.'();');
			else
			$this->index();
	}

        function cargar_index_empresas()
        {
            session_start();
            if(!(isset($_SESSION["equivida"]["poliza"]))){
               
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
                
                }
            if($_POST["poliza"]==""){

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
                                //print_r($_SESSION["poliza"]);
			}
                        
                        
                        if(!(isset($this->tpl->infopoliza[0]->descRamo))){
					
					
					$html='	<a href="'.URL.'?page=configuracion&action=contacto">
							<img src="'.URL.'images/noinfohaypolizas.png" width="680" height="63" alt="Noinfohaypolizas">
						</a>
                                                <br/><br/>
                                                <!--<a href="'.URL.'index.php">
                                                    <img src="'.URL.'images/noinfohaypolizas_volveracargar.png" width="680" height="63" alt="Noinfohaypolizas">
						</a>-->
                                                
                                                <Center>
                                                <form action="'.URL.'index.php" class="poliza_form" method="post" accept-charset="utf-8">
                                                    <input type="submit" name="enviar" value="Cargar p&oacute;lizas" id="enviar">
                                                </form> 
                                                </Center>
                                                <br/>';
                                                }
                                                else
                                                {
                       $html = '<div class="view-data" >
                                <script>$(".view-data p:odd").addClass("impar");</script>
				<p>
								<label>Seguro Contratado</label>'.texto($this->tpl->infopoliza[0]->descRamo).'
							</p>
							<p>
								<label>Nº de póliza</label> '.texto($this->tpl->infopoliza[0]->numeroPoliza).'
							</p>
								<p>
					<label> Inicio de Vigencia</label> '.texto($this->tpl->infopoliza[0]->inicioVigencia).'
				</p>
				<p>
					<label> Fin de Vigencia</label> '.texto($this->tpl->infopoliza[0]->finVigencia).'
				</p>
			';
				

				 
				if(trim($this->tpl->infopoliza[0]->numDocAseg)!=""){
				

				$html.='<p>
					<label> Cédula</label> '.texto($this->tpl->infopoliza[0]->numDocAseg).'
				</p>';
				
				}
				
				
			
				 
				if(trim($this->tpl->infopoliza[0]->pPago)!=""){
				
				$html.='<p>
					<label> Forma de Pago</label> '.texto($this->tpl->infopoliza[0]->pPago).'
				</p>';
				
				}
				

				 
				if(trim($this->tpl->infopoliza[0]->estadoPoliza)!=""){
				$html.='
				<p>
					<label> Estado de Póliza</label> '.texto($this->tpl->infopoliza[0]->estadoPoliza).'
				</p>
				';
				}
				

							
				
				
					
					if(trim($this->tpl->infopoliza[0]->nombreContratante)!=""){
					
					$html.='<h1> Datos del Contratante</h1>
					
					<p>
						<label> Contratante</label> '.texto($this->tpl->infopoliza[0]->nombreContratante).'
					</p>
					
					<p>
						<label> Número de RUC</label> '.texto($this->tpl->infopoliza[0]->numDocContratante).'
					</p>';
					
					
					}
					
					 
					if(trim($this->tpl->infopoliza[0]->nombreAseg)!=""){
					
					
					$html.='<h1>Datos del Asegurado</h1>
					
					<p>
					<label> Asegurado</label> '.texto($this->tpl->infopoliza[0]->nombreAseg).'
					</p>
					
					<p>
						<label> Número de cédula / RUC </label> '.texto($this->tpl->infopoliza[0]->numDocAseg).'
					</p>';
					
					
					}
					
				
					
						 
						if(trim($this->tpl->infopoliza[0]->ocupacion)!=""){
						
						$html.='<p>
							<label> Ocupación</label> '.texto($this->tpl->infopoliza[0]->ocupacion).'
						</p>';
						
						}
						


						 
						if(trim($this->tpl->infopoliza[0]->condicion)!=""){
						$html.='
						<p>
							<label> Condición</label> '.texto($this->tpl->infopoliza[0]->condicion).'
						</p>
						';
						}
						
					
					
                                               $html.= '
						</div>
                                                ';}
                                                
                                               //echo($html);
                                               echo $html;
                        
        }
        
         function cargar_index_personas()
        {   //set_time_limit(120);
            //ini_set('default_socket_timeout', 600);
            session_start();
            
            if(!(isset($_SESSION["equivida"]["poliza"]))){
               
                $wsdl = URL_WEBSERVICE."sise-servicio-1.0/ConsultaPolizasWsImpl?wsdl";
		$cliente = new SoapClient($wsdl);
								
		$args = array("nro_doc"=> $_SESSION["equivida"]["cedula"], "id_persona"=>"", "sn_activas"=>"-1", "tipo_busca"=>"1", "campo1"=>"", "campo2"=>"", "campo3"=>"" , "campo4"=>"", "campo5"=>"");
	
								
		$poliza = $cliente->__soapCall('llamarConsultaPolizasSp', $args);
		
	
		if(!isset($poliza->item)||count($poliza->item)==0)
                {
                 
                 $html = '
                     <div class="error">
				<div class="inside">
                                    Estimado cliente, pedimos disculpas si está experimentando problemas para visualizar su información, nos encontramos haciendo ajustes para solucionarlo. Por favor intente ingresar más tarde.
				</div>
                     </div>
                     ';
                 echo $html;
                }
		
		
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
            if($_POST["poliza"]==""){

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

                                //$this->valida_estado_de_cuenta_personas();
                                
				$this->tpl->infopoliza=$infopoliza_aux;
                                //print_r($_SESSION["poliza"]);
			}
                        
                        
                        if(!(isset($this->tpl->infopoliza[0]->descRamo))){
					
					
					$html='	<a href="'.URL.'?page=configuracion&action=contacto">
							<img src="'.URL.'images/noinfohaypolizas.png" width="680" height="63" alt="Noinfohaypolizas">
						</a>
                                                <br/><br/>
                                                <!--<a href="'.URL.'index.php">
                                                    <img src="'.URL.'images/noinfohaypolizas_volveracargar.png" width="680" height="63" alt="Noinfohaypolizas">
						</a>-->
                                                
                                               <Center>
                                                <form action="'.URL.'index.php" class="poliza_form" method="post" accept-charset="utf-8">
                                                    <input type="submit" name="enviar" value="Cargar p&oacute;lizas" id="enviar">
                                                </form> 
                                                </Center>
                                                <br/>';
                                                }
                                                else
                                                {
                      
                     
					
						$html = '	<script>$(".view-data p:odd").addClass("impar");</script>
                                                                                        <p>
												<label>Seguro contratado</label> '.texto($this->tpl->infopoliza[0]->descRamo).'
											</p>

											<p>
												<label>Nº de póliza</label> '.texto($this->tpl->infopoliza[0]->numeroPoliza).'
											</p>

										
												<p>
									<label> Inicio de vigencia</label> '.texto($this->tpl->infopoliza[0]->inicioVigencia).'
								</p>

								<p>
									<label> Fin de vigencia</label> '.texto($this->tpl->infopoliza[0]->finVigencia).'
								</p>';




								
								



								 
								
								
                                                                if($_SESSION["poliza"]["cod_ramo"]!=25 && $_SESSION["poliza"]["cod_ramo"]!=50)
                                                                {
                                                                    
								if(trim($this->tpl->infopoliza[0]->impValorAseg)!=""){
								
								$html .= '<p>
									<label> Valor asegurado</label>$ '.number_format($this->tpl->infopoliza[0]->impValorAseg,2 ,'.', ',').'
								</p>';
								
								}
                                                                }
								

								 
								if(trim($this->tpl->infopoliza[0]->pPago)!=""){
								
								$html .= '<p>
									<label> Forma de pago</label> '.texto($this->tpl->infopoliza[0]->pPago).'
								</p>';
								
								}
								

								
								if(trim($this->tpl->infopoliza[0]->estadoPoliza)!=""){
								
								$html .= '<p>
									<label> Estado de la póliza</label> '.texto($this->tpl->infopoliza[0]->estadoPoliza).'
								</p>';
								
								}
								
								 
									if(trim($this->tpl->infopoliza[0]->nombreAseg)!=""){
									

									

									$html .= '<p>
									<label>Nombre del asegurado</label> '.texto($this->tpl->infopoliza[0]->nombreAseg).'
									</p>

									<p>
										<label>Número de cédula / RUC </label> '.texto($this->tpl->infopoliza[0]->numDocAseg).'
									</p>';

									
									}
									


										
										if(trim($this->tpl->infopoliza[0]->ocupacion)!=""){
										
										$html .= '<p>
											<label> Ocupación</label> '.texto($this->tpl->infopoliza[0]->ocupacion).'
										</p>';
										
										}
				


										
										if(trim($this->tpl->infopoliza[0]->condicion)!=""){
										
										$html .= '<p>
											<label> Condición</label> '.texto($this->tpl->infopoliza[0]->condicion).'
										</p>';
										
										}
										


									
									if(trim($this->tpl->infopoliza[0]->nombreContratante)!=""){
									
									$html .= '<h1> Datos del Contratante</h1>

									<p>
										<label> Contratante</label> '.texto($this->tpl->infopoliza[0]->nombreContratante).'
									</p>

									<p>
										<label> Número de cédula / RUC</label> '.texto($this->tpl->infopoliza[0]->numDocContratante).'
									</p>';

									
									//}
									

					
					
				}
					
						
			                               
                                                    
                      }
                                                
                                               //echo($html);
                                               echo $html;
                        
        }
        
        
        function valida_estado_de_cuenta_personas(){

                 set_time_limit(180);
                ini_set('default_socket_timeout', 180);
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
                
                //$this->display("html/layouts/menu_cliente.tpl.php");
                echo $_SESSION["equivida"]["estadocuenta"];
		/* Fin */
	}
        
        
         function cargar_select_empresas()
        {
             if(!(isset($_SESSION["equivida"]["poliza"]))){
               
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
                
                }
                
            $array_aux=array();
						
						$html='<select name="poliza"  id="poliza">';
            
						for($i=0;$i<count($_SESSION["equivida"]["poliza"]);$i++){
							
							$entrar=1;
							for($a=0;$a<count($array_aux);$a++){
								if($array_aux[$a]==$_SESSION["equivida"]["poliza"][$i]["numeroPoliza"]){
									$entrar=0;
								}
							}
							
							if($entrar==1){
						    
							$array_aux[]=$_SESSION["equivida"]["poliza"][$i]["numeroPoliza"];
						
								
							$html.='<option value="'.$_SESSION["equivida"]["poliza"][$i]["numeroPoliza"].'-'.$_SESSION["equivida"]["poliza"][$i]["codigoSucursal"].'-'.$_SESSION["equivida"]["poliza"][$i]["codigoRamo"].'"';
								 if($_SESSION["equivida"]["poliza"][$i]["numeroPoliza"]==$_SESSION["poliza"]["nro_pol"]){$html.='selected';}
								$html.='>'.$_SESSION["equivida"]["poliza"][$i]["numeroPoliza"].'</option>';
							
							}
							
							
						}
                                                $html.='</select>';
                                                echo($html);
                        
        }
        
	function polizas_cliente(){

		$wsdl = URL_WEBSERVICE."sise-servicio-1.0/ConsultaPolizasWsImpl?wsdl";
		$cliente = new SoapClient($wsdl);

		$args = array("nro_doc"=> $_POST["id"], "id_persona"=>"", "sn_activas"=>"-1", "tipo_busca"=>"1", "campo1"=>"", "campo2"=>"", "campo3"=>"" , "campo4"=>"", "campo5"=>"");

		
		$poliza = $cliente->__soapCall('llamarConsultaPolizasSp', $args);

			
		$ban=0;
		foreach($poliza->item as $key=>$value){
				if((!(is_int($key)))&&($ban==0)){
					$poliza->item =array($poliza->item);
					$ban=1;
				}
		}

		
		$texto="";

		for($i=0;$i<count($poliza->item);$i++){
			$texto=$texto.$poliza->item[$i]->numeroPoliza."-".$poliza->item[$i]->codigoSucursal."-".$poliza->item[$i]->codigoRamo."|".$poliza->item[$i]->numeroPoliza.";";
		}

		echo $texto;

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
                        echo("hola");
        }
	
	
	function polizas_cliente_nombre(){
		
		$_POST["id"]="";
		
		for($i=0;$i<count($_SESSION["equivida"]["clientes"]);$i++){
			
			if(trim($_SESSION["equivida"]["clientes"][$i]->contratante)==trim($_POST["buscar_cliente"])){
				$_POST["id"]=$_SESSION["equivida"]["clientes"][$i]->numeroDocumento;
			}
			
		}
		
		$wsdl = URL_WEBSERVICE."sise-servicio-1.0/ConsultaPolizasWsImpl?wsdl";
		$cliente = new SoapClient($wsdl);

		$args = array("nro_doc"=> $_POST["id"], "id_persona"=>"", "sn_activas"=>"-1", "tipo_busca"=>"1", "campo1"=>"", "campo2"=>"", "campo3"=>"" , "campo4"=>"", "campo5"=>"");

		
		$poliza = $cliente->__soapCall('llamarConsultaPolizasSp', $args);

			
		$ban=0;
		foreach($poliza->item as $key=>$value){
				if((!(is_int($key)))&&($ban==0)){
					$poliza->item =array($poliza->item);
					$ban=1;
				}
		}

		
		$texto="";
		

		for($i=0;$i<count($poliza->item);$i++){
			
			if($i==0){
				$texto=$texto.$poliza->item[$i]->numeroPoliza."-".$poliza->item[$i]->codigoSucursal."-".$poliza->item[$i]->codigoRamo."|".$poliza->item[$i]->numeroPoliza;
			}else{
				$texto=$texto.";".$poliza->item[$i]->numeroPoliza."-".$poliza->item[$i]->codigoSucursal."-".$poliza->item[$i]->codigoRamo."|".$poliza->item[$i]->numeroPoliza;
			}
			
			
		}

		echo $texto;
	
	}
	
	
	
	
	
	function valid_ruc(){
		
		$query='SELECT * FROM usuarios where ruc="'.$_POST["ruc"].'";';
		$array_datos=$this->query($query,1);
		
			if(count($array_datos)==0){
				
					if (!preg_match("/[a-z]+/",$_POST["cedula"])){
						echo "1";
				   	}else{
						echo "3";
					}
								
			}else{
				
				echo "2";
				
			}
	
	}
	
	
	function valid_cedula(){
		
		$query='SELECT * FROM usuarios where numero_de_documento="'.$_POST["cedula"].'" and tipo_usuario_id="'.$_POST["tipo_usuario"].'" and estado_id <> 3;';
                //$query='SELECT * FROM usuarios where numero_de_documento="'.$_POST["cedula"].'";';
                //echo $query;
		$array_datos=$this->query($query,1);
		
			if(count($array_datos)==0){
				
				if (!preg_match("/[a-z]+/",$_POST["cedula"])){
					echo "1";
			   	}else{
					echo "3";
				}
				
								
			}else{
				
				echo "2";
				
			}
	
	}
	
	
	
	function valid_email(){
		
		$query='SELECT * FROM usuarios where email="'.$_POST["email"].'";';
		$array_datos=$this->query($query,1);
		
		$query_2='SELECT * FROM usuarios_adicionales where email="'.$_POST["email"].'";';
		$array_datos_2=$this->query($query_2,1);

		
		if($this->comprobar_email($_POST["email"])==1){
			
			
			if(count($array_datos)==0){
				

				if(count($array_datos_2)==0){

					echo "1";

				}else{

					echo "2";
				}
								
			}else{
				
				echo "2";
				
			}
			

		}else{
			echo "3";
		}
		
	}
	
	
	function valid_contrasena(){
		
		if (!preg_match("/[0-9]+/",$_POST["contrasena"])){
			echo "0";
	   	}else{
		
			if (!preg_match("/[a-z]+/",$_POST["contrasena"])){
				echo "0";
			}else{
				
				if(strlen($_POST["contrasena"])>=8){
					echo "1";
				}else{
					echo "0";
				}
			}
		}
		
	
	}

	function valid_verficar(){

		if($_POST["contrasena"]==$_POST["verificar_contrasena"]){
			echo "1";
		}else{
			echo "0";
		}

	}
	
	
	function comprobar_email($email){
	    $mail_correcto = 0;
	    //compruebo unas cosas primeras
	    if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
	       if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
	          //miro si tiene caracter .
	          if (substr_count($email,".")>= 1){
	             //obtengo la terminacion del dominio
	             $term_dom = substr(strrchr ($email, '.'),1);
	             //compruebo que la terminación del dominio sea correcta
	             if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
	                //compruebo que lo de antes del dominio sea correcto
	                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
	                $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
	                if ($caracter_ult != "@" && $caracter_ult != "."){
	                   $mail_correcto = 1;
	                }
	             }
	          }
	       }
	    }
	    if ($mail_correcto)
	       return 1;
	    else
	       return 0;
	}

	function beneficiarios(){

		$wsdl = URL_WEBSERVICE."sise-servicio-1.0/BeneficiariosWsImpl?wsdl";
		$cliente = new SoapClient($wsdl);

		$args = array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
						"nro_pol"=>$_SESSION["poliza"]["nro_pol"],"cod_aseg"=>$_POST["code"],"campoin1"=>"null",
						"campoin2"=>"null","campoin3"=>"null","campoin4"=>"null","campoin5"=>"null");
						
	
		$lista_beneficios = $cliente->__soapCall('ws_sise_beneficiarios', $args);

		$lista_beneficios=$lista_beneficios->item;
		
	
		
		if(count($lista_beneficios)!=0){
			$ban=0;
			foreach($lista_beneficios as $key=>$value){
				if((!(is_int($key)))&&($ban==0)){
							$lista_beneficios=array($lista_beneficios);
							$ban=1;
				}
			}
		}

		
		//$wsdl = URL_WEBSERVICE."sise-servicio-1.0/BeneficiariosWsImpl?wsdl";
		//$cliente = new SoapClient($wsdl);
		?>
		<ul class="imprimir">

				<li><a href="<?=URL?>?page=brokers&action=beneficiarios&format=excel&code=<?=$_POST["code"]?>" class="exportar">Exportar</a></li>
				<li><a href="<?=URL?>?page=brokers&action=beneficiarios&format=print&code=<?=$_POST["code"]?>" class="print">Imprimir</a></li>
			
			</ul>

		<div class="datatable">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

						<thead>
							<tr>
								<th>Nº</th>
								<th>Nombre</th>
								<th>Fecha de Alta</th>
								<th>Parentesco</th>
								<th>Porcentaje Participación</th>
								<th>Tipo de Beneficiario</th>
								
							</tr>
						</thead>
						<tbody>

							<?php 
							
							for($i=0;$i<count($lista_beneficios);$i++){
								
								
								$lista_beneficios[$i]->nombre=str_replace("Ð","Ñ",$lista_beneficios[$i]->nombre);
								?>

								<tr><td><?=$i+1;?></td>
									<td><?=$lista_beneficios[$i]->nombre?></td>
									<td><?=$lista_beneficios[$i]->fechaAlta?></td>
									<td><?=$lista_beneficios[$i]->parentesco?></td>
									<td><?=$lista_beneficios[$i]->pjePartic."%"?></td>
									<td><?=$this->lista_beneficios[$i]->tipoBeneficiario?></td>
								</tr>
								<?
							}

							?>

						</tbody>
			</table>
		</div>
		<?
		if(count($lista_beneficios)==0){
			?>
				<p class="error" style="text-align:center;">Lo sentimos no tiene registrado ningún beneficiario</p>
			<?php
		}

	}


	function beneficiarios2(){

		$wsdl = URL_WEBSERVICE."sise-servicio-1.0/BeneficiariosWsImpl?wsdl";
		$cliente = new SoapClient($wsdl);

		$args = array("cod_suc"=>$_SESSION["poliza"]["cod_suc"],"cod_ramo"=>$_SESSION["poliza"]["cod_ramo"],
						"nro_pol"=>$_SESSION["poliza"]["nro_pol"],"cod_aseg"=>$_POST["code"],"campoin1"=>"",
						"campoin2"=>"","campoin3"=>"","campoin4"=>"","campoin5"=>"");
						

		
		$lista_beneficios = $cliente->__soapCall('ws_sise_beneficiarios', $args);

		$lista_beneficios=$lista_beneficios->item;

		if(count($lista_beneficios)!=0){
			$ban=0;
			foreach($lista_beneficios as $key=>$value){
				if((!(is_int($key)))&&($ban==0)){
							$lista_beneficios=array($lista_beneficios);
							$ban=1;
				}
			}
		}
		
		
		//$wsdl = URL_WEBSERVICE."sise-servicio-1.0/BeneficiariosWsImpl?wsdl";
		//$cliente = new SoapClient($wsdl);
		?>
		<ul class="imprimir">

				<li><a href="<?=URL?>?page=empresas&action=beneficiarios&format=excel&code=<?=$_POST["code"]?>" class="exportar">Exportar</a></li>
				<li><a href="<?=URL?>?page=empresas&action=beneficiarios&format=print&code=<?=$_POST["code"]?>" class="print">Imprimir</a></li>
			
			</ul>

		<div class="datatable">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

						<thead>
							<tr>
								<th>Nº</th>
								<th>Nombre</th>
								<th>Fecha de Alta</th>
								<th>Parentesco</th>
								<th>Porcentaje Participación</th>
								<th>Tipo de Beneficiario</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							
							for($i=0;$i<count($lista_beneficios);$i++){
								
								
								$lista_beneficios[$i]->nombre=str_replace("Ð","Ñ",$lista_beneficios[$i]->nombre);
								?>

								<tr><td><?=$i+1;?></td>
									<td><?=$lista_beneficios[$i]->nombre?></td>
									<td><?=$lista_beneficios[$i]->fechaAlta?></td>
									<td><?=$lista_beneficios[$i]->parentesco?></td>
									<td><?=$lista_beneficios[$i]->pjePartic."%"?></td>
									<td><?=$this->lista_beneficios[$i]->tipoBeneficiario?></td>
								</tr>
								<?
							}

							?>

						</tbody>
			</table>
		</div>
		<?
		
		if(count($lista_beneficios)==0){
			?>
				<p class="error" style="text-align:center;">Lo sentimos no tiene registrado ningún beneficiario</p>
			<?php
		}

	}


	function generar_password(){

		$randomPassword=$this->randomPassword();

		?>
		
		<input type="hidden" name="randomPassword" value="<?=$randomPassword?>" id="randomPassword">

		<p>
			La clave generada es:
			<span class="yellow"><?=$randomPassword?></span>
		</p>
		<p>
			Enviar alerta a usuario:  <input type="checkbox" name="enviar_alerta" value="si" id="enviar_alerta" checked>
		</p>
		<!-- 
		<p>
			Permitir que el usuario cambie el contrase&ntilde;a: <input type="checkbox" name="cambiar_password" value="si" id="cambiar_password">
		</p>
		-->
		
		<?
	}

	function generar_password_text(){
		echo $randomPassword=$this->randomPassword();
	}




	function randomPassword() {
    	$alphabet = "abcdefghijklmnopqrstuwxyz";
    	$pass = array(); //remember to declare $pass as an array
    	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    	for ($i = 0; $i < 4; $i++) {
     	   $n = rand(0, $alphaLength);
        	$pass[] = $alphabet[$n];
    	}
    	
    	$parte_1=implode($pass);

    	$alphabet = "0123456789";
    	$pass = array(); //remember to declare $pass as an array
    	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    	for ($i = 0; $i < 4; $i++) {
     	   $n = rand(0, $alphaLength);
        	$pass[] = $alphabet[$n];
    	}

    	$parte_2=implode($pass);

    	return $parte_1.$parte_2;

	}
	
	function brokers_mas_clientes(){
		

				
				
				$empezar=intval($_POST["pagina"])*10;
				$hasta=$empezar+10;
				$cont=$empezar;
				
				
				
				for($i=$empezar;$i<$hasta;$i++){
					$cont++;
					
					if($_SESSION["equivida"]["clientes"][$i]->contratante!=""){
					?>
					<div class="info_cliente">
						
						<ul>
							<li class="numero"><?=$cont?> :</li>
							<li><a href="<?=URL?>?page=brokers&action=informacion_poliza&cliente=<?=$_SESSION["equivida"]["clientes"][$i]->numeroDocumento?>"><?=textoMAYUSCULAS($_SESSION["equivida"]["clientes"][$i]->contratante)?></a> <span class="ruc">| RUC: <?=$_SESSION["equivida"]["clientes"][$i]->numeroDocumento?></span><span class="ruc"> | Tipo: <?=$_SESSION["equivida"]["clientes"][$i]->ramos?></span></li>
							<div class="clear"></div>
						</ul>
						
					</div>
					
					<?php
					}
				}
		
		
	}
	
	function buscar_cliente_broker(){

		$cont=0;
		
		for($i=0;$i<count($_SESSION["equivida"]["clientes"]);$i++){
			
                        
                        if((strstr(textoMAYUSCULAS($_SESSION["equivida"]["clientes"][$i]->contratante), textoMAYUSCULAS($_POST["buscar"])))||(strstr(textoMAYUSCULAS($_SESSION["equivida"]["clientes"][$i]->numeroDocumento), $_POST["buscar"]))||(strstr(textoMAYUSCULAS($_SESSION["equivida"]["clientes"][$i]->ramos), textoMAYUSCULAS($_POST["buscar"]),TRUE))){
			$cont++;	
			}
		}
		
		?>
			<p class="leyenda_buscar">
			Se encontraron <b><?=$cont?></b> registros con <b>"<?=$_POST["buscar"]?>"</b> . <a href="<?=URL?>?page=brokers">¿Deseas regresar al listado completo?</a>
			</p>
		<?php
		
		$cont=0;
		
		for($i=0;$i<count($_SESSION["equivida"]["clientes"]);$i++){
			
			$cont++;
			
			if($_SESSION["equivida"]["clientes"][$i]->contratante!=""){
			
			if((strstr(textoMAYUSCULAS($_SESSION["equivida"]["clientes"][$i]->contratante), textoMAYUSCULAS($_POST["buscar"])))||(strstr(textoMAYUSCULAS($_SESSION["equivida"]["clientes"][$i]->numeroDocumento), $_POST["buscar"]))||(strstr(textoMAYUSCULAS($_SESSION["equivida"]["clientes"][$i]->ramos), textoMAYUSCULAS($_POST["buscar"])))){
			?>
			
				<div class="info_cliente">
					
					<ul>
						<li class="numero"><?=$cont?> :</li>
						<li><a href="<?=URL?>?page=brokers&action=informacion_poliza&cliente=<?=$_SESSION["equivida"]["clientes"][$i]->numeroDocumento?>"><?=textoMAYUSCULAS($_SESSION["equivida"]["clientes"][$i]->contratante)?></a> <span class="ruc"> | RUC: <?=$_SESSION["equivida"]["clientes"][$i]->numeroDocumento?></span><span class="ruc">| Ramo: <?=$_SESSION["equivida"]["clientes"][$i]->ramos?></span></li>
						<div class="clear"></div>
					</ul>
					
				</div>
			
			<?
			}
			
			}
			
		}
		
	}

	
        
        function valid_nro_poliza_colectiva(){
		
		$query='SELECT * FROM polizas_colectivas where n_poliza="'.$_POST["nro_poliza"].'";';
		$array_datos=$this->query($query,1);
			
			if(count($array_datos)==0){
                                echo "true";
			}else{
				echo "false";
			}
		
	}
        
        function valid_array_nro_poliza_colectiva(){
		$polizas =  explode(",", $_POST["nro_poliza"]);
		$arr = "";
                for($i=0; $i<count($polizas)-1; $i++) 
                {
                 $query='SELECT * FROM polizas_colectivas where n_poliza="'.$polizas[$i].'";';   
                 $array_datos=$this->query($query,1);
			
			if(count($array_datos)==0){
                                $arr .= "true,";
			}else{
				$arr .= "false,";
			}
                }
                
                echo $arr;
		
	}

}


$ajax=new Ajax_controller($_POST["action"]);


 ?>