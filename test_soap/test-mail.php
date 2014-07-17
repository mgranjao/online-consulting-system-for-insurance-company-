<?php

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}


require_once "helpers/swift/Swift.php";
require_once "helpers/swift/Swift/Connection/SMTP.php";



$email="bedomax@gmail.com";
$from="webmail@equivida.com";
$name_from="Equivida";
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$cabeceras .= 'From:'.$name_from.'<'.$from.'>' . "\r\n";
$cabeceras .= 'From:  '.$from. "\r\n" .
    'Reply-To: webmail@equivida.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$asunto="Equivida.com: Accesos Sistema de Clientes";
$smtp =& new Swift_Connection_SMTP("200.32.69.186",25);
$smtp->setUsername("webmail");
$smtp->setpassword("Webmail.2013");
$swift =& new Swift($smtp);

$html='
Email de prueba
';

$message =& new Swift_Message($asunto, $html, "text/html");

if ($swift->send($message,$email, new Swift_Address($from,$name_from))){
	echo "Se envío correctamente";
}


?>