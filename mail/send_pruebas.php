<?php

require_once ('swift/swift_required.php');
require_once ('../config.php');



$html_antes='<table width="100%">

		<tr>
			<td style="border-bottom:1px Solid #d4e5ee;">

				<img src="http://www.tagadata.com/equivida/images/logo.png" />

			</td>
		</tr>

		<tr>

			<td style="color:#5f6263;font-size:12px; font-family:Verdana;  ">';

$html_despues='</td>

				</tr>


				<tr>
					<td style="border-top:1px Solid #d4e5ee; color:#959b9e; font-size:11px; font-family:Verdana;">

						1 800 EQUIVIDA - Av. Amazonas N40-100 y Gaspar de Villaroel (Esq.) Centro Comercial El Globo

					</td>
				</tr>

			</table>';

$_POST["html"]=$html_antes.$_POST["html"].$html_despues;



switch($_POST["action"]){
	
	
	case "register":
		

		$_POST["html"]=str_replace("Contrasena","Contrase&ntilde;a",$_POST["html"]);
		
		$_POST["html"]=str_replace("a|","á",$_POST["html"]);
		$_POST["html"]=str_replace("e|","é",$_POST["html"]);
		$_POST["html"]=str_replace("i|","í",$_POST["html"]);
		$_POST["html"]=str_replace("o|","ó",$_POST["html"]);
		$_POST["html"]=str_replace("u|","ú",$_POST["html"]);
		$_POST["html"]=str_replace("n|","&ntilde;",$_POST["html"]);
		
		
		//Envio de Correo
		//$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465)
		$transport = Swift_SmtpTransport::newInstance(SMTP_SERVER, PORT_SMTP)
		  ->setUsername(USER_SMTP)
		  ->setPassword(PASSWORD_SMTP);
		$mailer = Swift_Mailer::newInstance($transport);
		
		switch($_POST["rol"]){
			case "persona":
				$message = Swift_Message::newInstance($_POST["asunto"])
				  ->setFrom(array($_POST["de"] => 'Equivida'))
				  ->setReplyTo(array($_POST["de"] => 'Equivida'))
				  ->setTo(array($_POST["para"]=> "" ))
				  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
				  ->setBcc(array(
		  			'controlcalidad@equivida.com '=>'Bedo Caceres'
					));
		
			break;
			case "empresa":
				
					switch ($_POST["seccion"]) {
					  
						case 'actualizacion':
							
							$message = Swift_Message::newInstance($_POST["asunto"])
							  ->setFrom(array($_POST["de"] => 'Equivida'))
							  ->setReplyTo(array($_POST["de"] => 'Equivida'))
							  ->setTo(array($_POST["para"]=> "" ))
							  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
							  ->setBcc(array(
					  			'controlcalidad@equivida.com'=>'Bedo Caceres'
								));
								
						break;

						case 'contacto':
							
							$message = Swift_Message::newInstance($_POST["asunto"])
							  ->setFrom(array($_POST["de"] => 'Equivida'))
							  ->setReplyTo(array($_POST["de"] => 'Equivida'))
							  ->setTo(array($_POST["para"]=> "" ))
							  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
							  ->setBcc(array(
					  			'controlcalidad@equivida.com'=>'Bedo Caceres'
								));
								
						break;


					  	default:
							
							
							$message = Swift_Message::newInstance($_POST["asunto"])
							  ->setFrom(array($_POST["de"] => 'Equivida'))
							  ->setReplyTo(array($_POST["de"] => 'Equivida'))
							  ->setTo(array($_POST["para"]=> "" ))
							  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
							  ->setBcc(array(
					  			'controlcalidad@equivida.com'=>'Bedo Caceres'
								));

					  	break;
					  }

			break;
			case "brokers":
			
					switch ($_POST["seccion"]) {
					  
						case 'actualizacion':
							
							$message = Swift_Message::newInstance($_POST["asunto"])
							  ->setFrom(array($_POST["de"] => 'Equivida'))
							  ->setReplyTo(array($_POST["de"] => 'Equivida'))
							  ->setTo(array($_POST["para"]=> "" ))
							  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
							  ->setBcc(array(
					  			'controlcalidad@equivida.com'=>'Bedo Caceres'
								));

						break;

						case 'contacto':
							
							$message = Swift_Message::newInstance($_POST["asunto"])
							  ->setFrom(array($_POST["de"] => 'Equivida'))
							  ->setReplyTo(array($_POST["de"] => 'Equivida'))
							  ->setTo(array($_POST["para"]=> "" ))
							  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
							  ->setBcc(array(
					  			'controlcalidad@equivida.com'=>'Bedo Caceres'
								));
								
						break;


					  	default:
							
							
							$message = Swift_Message::newInstance($_POST["asunto"])
							  ->setFrom(array($_POST["de"] => 'Equivida'))
							  ->setReplyTo(array($_POST["de"] => 'Equivida'))
							  ->setTo(array($_POST["para"]=> "" ))
							  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
							  ->setBcc(array(
					  			'controlcalidad@equivida.com'=>'Bedo Caceres'
								));

					  	break;
					  }

			break;
			case "accionista":
					$message = Swift_Message::newInstance($_POST["asunto"])
					  ->setFrom(array($_POST["de"] => 'Equivida'))
					  ->setReplyTo(array($_POST["de"] => 'Equivida'))
					  ->setTo(array($_POST["para"]=> "" ))
					  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
					  ->setBcc(array(
			  			'controlcalidad@equivida.com'=>'Bedo Caceres'
						));
			break;
			case "usuario":
				$message = Swift_Message::newInstance($_POST["asunto"])
				  ->setFrom(array($_POST["de"] => 'Equivida'))
				  ->setReplyTo(array($_POST["de"] => 'Equivida'))
				  ->setTo(array($_POST["para"]=> "" ))
				  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
				  ->setBcc(array(
		  			'controlcalidad@equivida.com '=>'Bedo Caceres'));
			
			break;
		}
		
		

		 if($mailer->send($message)){
		  	echo "Enviado";
		  }
		
		 //echo $_POST["html"];
	
	break;
	

	case "notificar":
		

		$_POST["html"]=str_replace("Contrasena","Contrase&ntilde;a",$_POST["html"]);
		
		$_POST["html"]=str_replace("a|","á",$_POST["html"]);
		$_POST["html"]=str_replace("e|","é",$_POST["html"]);
		$_POST["html"]=str_replace("i|","í",$_POST["html"]);
		$_POST["html"]=str_replace("o|","ó",$_POST["html"]);
		$_POST["html"]=str_replace("u|","ú",$_POST["html"]);
		$_POST["html"]=str_replace("n|","&ntilde;",$_POST["html"]);
		
		
		//Envio de Correo
		//$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465)
		$transport = Swift_SmtpTransport::newInstance(SMTP_SERVER, PORT_SMTP)
		  ->setUsername(USER_SMTP)
		  ->setPassword(PASSWORD_SMTP);
		$mailer = Swift_Mailer::newInstance($transport);
		
		$message = Swift_Message::newInstance($_POST["asunto"])
		  ->setFrom(array($_POST["de"] => 'Equivida'))
		  ->setReplyTo(array($_POST["de"] => 'Equivida'))
		  ->setTo(array($_POST["para"]=> "" ))
		  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
		  ->setBcc(array(
  			'controlcalidad@equivida.com'=>'Bedo Caceres'
  			));
		
		
		switch($_POST["rol"]){
			case "persona":
			
					$message = Swift_Message::newInstance($_POST["asunto"])
					  ->setFrom(array($_POST["de"] => 'Equivida'))
					  ->setReplyTo(array($_POST["de"] => 'Equivida'))
					  ->setTo(array($_POST["para"]=> "" ))
					  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
					  ->setBcc(array(
			  			'controlcalidad@equivida.com'=>'Bedo Caceres'
			  			));
			
			break;
			case "empresa":
				
				$message = Swift_Message::newInstance($_POST["asunto"])
				  ->setFrom(array($_POST["de"] => 'Equivida'))
				  ->setReplyTo(array($_POST["de"] => 'Equivida'))
				  ->setTo(array($_POST["para"]=> "" ))
				  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
				  ->setBcc(array(
		  			'controlcalidad@equivida.com'=>'Bedo Caceres'
		  			
		  			));

			break;
			case "brokers":
				
				$message = Swift_Message::newInstance($_POST["asunto"])
				  ->setFrom(array($_POST["de"] => 'Equivida'))
				  ->setReplyTo(array($_POST["de"] => 'Equivida'))
				  ->setTo(array($_POST["para"]=> "" ))
				  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
				  ->setBcc(array(
		  			'controlcalidad@equivida.com'=>'Bedo Caceres'
		  			
		  			));
			

			break;
			case "accionista":
				
				$message = Swift_Message::newInstance($_POST["asunto"])
				  ->setFrom(array($_POST["de"] => 'Equivida'))
				  ->setReplyTo(array($_POST["de"] => 'Equivida'))
				  ->setTo(array($_POST["para"]=> "" ))
				  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
				  ->setBcc(array(
		  			'controlcalidad@equivida.com'=>'Bedo Caceres'
		  			
		  			));
				
			break;
			
			case "usuario":
				$message = Swift_Message::newInstance($_POST["asunto"])
				  ->setFrom(array($_POST["de"] => 'Equivida'))
				  ->setReplyTo(array($_POST["de"] => 'Equivida'))
				  ->setTo(array($_POST["para"]=> "" ))
				  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
				  ->setBcc(array(
			 		'controlcalidad@equivida.com'=>'Bedo Caceres'));

			break;
			
		}
		
		

		
		  if($mailer->send($message)){
		  	echo "Enviado";
		  }

		 //echo $_POST["html"];
		
	break;
	
	
	case "forget":
		
		
		if($_POST["ambiente"]=="local"){
			//$link='http://www.equivida.com/consultaenlinea/?action=recuperar&key='.$_POST["key"]."&tipo_usuario=".$_POST["tipo"];
                       $link='http://www.equivida.com/consultaenlinea/index/recuperar/?key='.$_POST["key"]."&tipo_usuario=".$_POST["tipo"];
			
		}else{
		
			//$link='http://www.equivida.com/consultaenlinea/?action=recuperar&key='.$_POST["key"]."&tipo_usuario=".$_POST["tipo"];
			$link='http://www.equivida.com/consultaenlinea/index/recuperar/?key='.$_POST["key"]."&tipo_usuario=".$_POST["tipo"];
		}
		
		
		
	
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
				<b>Recuperación de Contrase&ntilde;a:</b>

				<p>
				Estimado Cliente, para recuperar su contrase&ntilde;a debe hacer click en el siguiente link:
				</p>
				<p>
				'.$link.'
				</p>
				<p>
				Si contin&uacute;a con problemas para ingresar, por favor comunicarse con: soporteweb@equivida.com
				</p>

				<p>
				Saludos Cordiales<br>
				Equipo de Equivida
				</p>
				</td>

								</tr>


								<tr>
									<td style="border-top:1px Solid #d4e5ee; color:#959b9e; font-size:11px; font-family:Verdana;">

										1 800 EQUIVIDA - Av. Amazonas N40-100 y Gaspar de Villaroel (Esq.) Centro Comercial El Globo

									</td>
								</tr>

							</table>
		';
		

	
	
		$transport = Swift_SmtpTransport::newInstance(SMTP_SERVER, PORT_SMTP)
		  ->setUsername(USER_SMTP)
		  ->setPassword(PASSWORD_SMTP);
		$mailer = Swift_Mailer::newInstance($transport);
		
		$message = Swift_Message::newInstance("Equivida: Recuperar Accesos a Consulta en Linea")
		  ->setFrom(array($_POST["de"] => 'Equivida'))
		  ->setReplyTo(array($_POST["de"] => 'Equivida'))
		  ->setTo(array($_POST["para"]=> "" ))
		  ->setBody($html, 'text/html', 'iso-8859-2')
		  ->setBcc(array(
  			'controlcalidad@equivida.com '=>'Bedo Caceres'));
	
	  if($mailer->send($message)){
	  	echo "Enviado";
	  }
	

		
		
	break;
	
	
	case "cotizador":
		
			$_POST["html"]=str_replace("Contrasena","Contrase&ntilde;a",$_POST["html"]);

			$_POST["html"]=str_replace("a|","á",$_POST["html"]);
			$_POST["html"]=str_replace("e|","é",$_POST["html"]);
			$_POST["html"]=str_replace("i|","í",$_POST["html"]);
			$_POST["html"]=str_replace("o|","ó",$_POST["html"]);
			$_POST["html"]=str_replace("u|","ú",$_POST["html"]);
			$_POST["html"]=str_replace("n|","&ntilde;",$_POST["html"]);


			//Envio de Correo
			//$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465)
			$transport = Swift_SmtpTransport::newInstance(SMTP_SERVER, PORT_SMTP)
			  ->setUsername(USER_SMTP)
			  ->setPassword(PASSWORD_SMTP);
			$mailer = Swift_Mailer::newInstance($transport);

			$message = Swift_Message::newInstance($_POST["asunto"])
			  ->setFrom(array($_POST["de"] => 'Equivida'))
			  ->setReplyTo(array($_POST["de"] => 'Equivida'))
			  ->setTo(array($_POST["para"]=> "" ))
			  ->setBody($_POST["html"], 'text/html', 'iso-8859-2')
			  ->setBcc(array(
	  			'controlcalidad@equivida.com'=>'Bedo Caceres'));


			  if($mailer->send($message)){
			  	echo "Enviado";
			  }
	
	break;
	
	
	case "password_generado":
		
		
		if($_POST["ambiente"]=="local"){
			
			//$link='http://localhost/equivida/consultaenlinea/';
			$link='http://www.equivida.com/consultaenlinea/';
			
		}else{
		
			$link='http://www.equivida.com/consultaenlinea/';
			
		}
		
		
		
		$html='
			<table width="100%">

					<tr>
						<td style="border-bottom:1px Solid #d4e5ee;">

							<img src="http://www.tagadata.com/equivida/images/logo.png" />

						</td>
					</tr>

					<tr>

					<td style="color:#5f6263;font-size:12px; font-family:Verdana;  ">
						
						
						Estimado Usuario
						<p>
						Su cuenta ha sido aprobada, su tipo de usuario es <b>'.$_POST["tipo_usuario"].'</b>
						</p>
						<p>
						Sus datos de acceso son los siguientes:<br>
						<b>Email: </b>'.$_POST["para"].'<br>
						<b>Contrase&ntilde;a: </b>'.$_POST["randomPassword"].'<br>
						</p>
						Para ingresar haz click en el siguiente link:<br>
						<a href="'.$link.'">'.$link.'</a>
						<p>
						Si tiene  problemas para ingresar, por favor comunicarse con: soporteweb@equivida.com
						</p>
						Saludos<br>
						Equipo EQUIVIDA
						
					</td>

								</tr>


								<tr>
									<td style="border-top:1px Solid #d4e5ee; color:#959b9e; font-size:11px; font-family:Verdana;">

										1 800 EQUIVIDA - Av. Amazonas N40-100 y Gaspar de Villaroel (Esq.) Centro Comercial El Globo

									</td>
								</tr>

							</table>
		';
		
		
		
		$transport = Swift_SmtpTransport::newInstance(SMTP_SERVER, PORT_SMTP)
		  ->setUsername(USER_SMTP)
		  ->setPassword(PASSWORD_SMTP);
		$mailer = Swift_Mailer::newInstance($transport);

		$message = Swift_Message::newInstance("Equivida: Cuenta de Usuario Aprobada")
		  ->setFrom(array($_POST["de"] => 'Equivida'))
		  ->setReplyTo(array($_POST["de"] => 'Equivida'))
		  ->setTo(array($_POST["para"]=> "" ))
		  ->setBody($html, 'text/html', 'iso-8859-2')
		  ->setBcc(array(
	  		'controlcalidad@equivida.com'=>'Bedo Caceres'));

		if($mailer->send($message)){
		  	echo "Enviado";
		  }
		

		
		
	break;
	
	case "password_cambiar_generado":
		
		
		
			if($_POST["ambiente"]=="local"){

                                          http://www.equivida.com/consultaenlinea/index/activar/?key=4caimQ==&tipo_usuario=admin
				//$link='http://www.equivida.com/consultaenlinea/?action=activar&key='.$_POST["key"];
                                          $link='http://www.equivida.com/consultaenlinea/index/activar/?key='.$_POST["key"];

			}else{

				//$link='http://www.equivida.com/consultaenlinea/?action=activar&key='.$_POST["key"];
                                          $link='http://www.equivida.com/consultaenlinea/index/activar/?key='.$_POST["key"];

			}




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
					<b>Cuenta Activada</b>
					
					<p>Estimado Usuario</p>
					
					<p>
					Su cuenta ha sido aprobada, su tipo de usuario es <b>'.$_POST["tipo_usuario"].'</b>
					</p>
					<p>
					Para activar tu cuenta haz click en el siguiente link:<br>
					<a href="'.$link.'">'.$link.'</a>
					<p>
					Si tiene  problemas para ingresar, por favor comunicarse con: soporteweb@equivida.com
					</p>
					Saludos<br>
					Equipo EQUIVIDA
					
					
					</td>

									</tr>


									<tr>
										<td style="border-top:1px Solid #d4e5ee; color:#959b9e; font-size:11px; font-family:Verdana;">

											1 800 EQUIVIDA - Av. Amazonas N40-100 y Gaspar de Villaroel (Esq.) Centro Comercial El Globo

										</td>
									</tr>

								</table>
								
								
			';




			$transport = Swift_SmtpTransport::newInstance(SMTP_SERVER, PORT_SMTP)
			  ->setUsername(USER_SMTP)
			  ->setPassword(PASSWORD_SMTP);
			$mailer = Swift_Mailer::newInstance($transport);

			$message = Swift_Message::newInstance("Equivida: Cuenta de Usuario Aprobada")
			  ->setFrom(array($_POST["de"] => 'Equivida'))
			  ->setReplyTo(array($_POST["de"] => 'Equivida'))
			  ->setTo(array($_POST["para"]=> "" ))
			  ->setBody($html, 'text/html', 'iso-8859-2')
			  ->setBcc(array(
	  			'controlcalidad@equivida.com'=>'Bedo Caceres'));

		  if($mailer->send($message)){
		  	echo "Enviado";
		  }
		
		
		
		
	break;
	
}




?>