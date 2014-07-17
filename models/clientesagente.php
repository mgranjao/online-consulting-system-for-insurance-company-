<?php
require_once("basededatos.php");

class Clientesagente  extends Basededatos{
	
	
	function __construct(){
		parent::__construct();
	}
	
	function set_cliente($codAseg, $contratante, $idPersona, $numeroDocumento, $ramos, $numDocAgente){
            $query='INSERT INTO clientes_agente SET
				codAseg="'.$codAseg.'",
				contratante="'.$contratante.'",
				idPersona="'.$idPersona.'",
				numeroDocumento="'.$numeroDocumento.'",
                                ramos="'.$ramos.'",
                                numDocAgente="'.$numDocAgente.'"';
            $this->query($query,0);
		
            $insert_id=mysql_insert_id();
        }
        
        function get_clientes(){
		
		if(isset($_SESSION["equivida"]["bd"]["ruc"])){
			$query='SELECT codAseg, contratante, idPersona, numeroDocumento, ramos FROM clientes_agente WHERE numDocAgente ="'.$_SESSION["equivida"]["bd"]["ruc"].'"';
                                        
			$array_datos=$this->query($query,1);
		}
		for($i=0;$i<count($array_datos);$i++){
                    $array_datos[$i]=(object)$array_datos[$i];
                }
		return $array_datos;
		
	}
        
}

?>