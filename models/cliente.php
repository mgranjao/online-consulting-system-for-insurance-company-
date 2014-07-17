<?php
require_once("basededatos.php");

class Cliente  extends Basededatos{
	
	
	function __construct(){
		parent::__construct();
	}
	
	
	function set_direccion(){
		
		
		if(isset($_SESSION["equivida"]["bd"]["id"])){
			
		$query='INSERT INTO direcciones SET
				ciudad="'.$_POST["ciudad"].'",
				canton="'.$_POST["canton"].'",
				provincia_id="'.$_POST["provincia_id"].'",
				calle_principal="'.$_POST["calle_principal"].'",
				calle_secundaria="'.$_POST["calle_secundaria"].'",
				usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'",
				tipo="'.$_POST["tipo_direccion"].'", fecha_create=NOW();';
		
		//echo $query;
		
		$this->query($query,0);
		$_SESSION["flash_ok"]="La dirección se ingreso correctamente.";
		}
		
	}



	function update_direccion(){
		
		
		if(isset($_SESSION["equivida"]["bd"]["id"])){
		
			$query='UPDATE direcciones SET
				ciudad="'.$_POST["ciudad"].'",
				canton="'.$_POST["canton"].'",
				provincia_id="'.$_POST["provincia_id"].'",
				calle_principal="'.$_POST["calle_principal"].'",
				calle_secundaria="'.$_POST["calle_secundaria"].'",
				usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'",
				tipo="'.$_POST["tipo_direccion"].'" WHERE id="'.$_POST["id"].'" LIMIT 1 ;';
		
				$this->query($query,0);
				$_SESSION["flash_ok"]="La dirección se actualizó correctamente.";
		}
	}

	



	function get_direcciones(){
		
		if(isset($_SESSION["equivida"]["bd"]["id"])){
			$query='SELECT d.id, d.ciudad, d.canton, (SELECT nombre FROM provincias WHERE id=d.provincia_id) as provincia_nombre, d.calle_principal, d.calle_secundaria, d.usuario_id, d.tipo  FROM direcciones d WHERE usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'";';
                        //$query='SELECT d.id, d.ciudad, d.canton, (SELECT nombre FROM provincias WHERE id=d.provincia_id) as provincia_nombre, d.calle_principal, d.calle_secundaria, d.usuario_id, d.tipo  FROM direcciones d WHERE usuario_id="'.$_SESSION["equivida"]["bd"]["id_persona"].'";';  
		//echo($query);
                
			$array_datos=$this->query($query,1);
		}
		
		return $array_datos;
		
	}


	function get_direccion($id){
		
		if(isset($_SESSION["equivida"]["bd"]["id"])){
			$query='SELECT d.id, d.ciudad, d.canton, (SELECT nombre FROM provincias WHERE id=d.provincia_id) as provincia_nombre, d.provincia_id,  d.calle_principal, d.calle_secundaria, d.usuario_id, d.tipo  FROM direcciones d WHERE usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'" and id='.$id.';';
		
			$array_datos=$this->query($query,1);
		}
		
		return $array_datos;
		
	}
        
        function get_direccion_by_user_id($user_id){
		
		
			$query='SELECT d.id, d.ciudad, d.canton, (SELECT nombre FROM provincias WHERE id=d.provincia_id) as provincia_nombre, d.provincia_id,  d.calle_principal, d.calle_secundaria, d.usuario_id, d.tipo  FROM direcciones d WHERE usuario_id="'.$user_id.'" ;';
		
			$array_datos=$this->query($query,1);
		
		
		return $array_datos;
		
	}


	function get_telefono($id){
		
		if(isset($_SESSION["equivida"]["bd"]["id"])){
			$query='SELECT * FROM telefonos  WHERE usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'" and id='.$id.';';

			$array_datos=$this->query($query,1);
		}
		
		return $array_datos;
		
	}
	
	
	function get_telefonos(){
		if(isset($_SESSION["equivida"]["bd"]["id"])){
			$query='SELECT *  FROM telefonos t WHERE usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'";';
			$array_datos=$this->query($query,1);
		}
		return $array_datos;
	}

	function get_correos(){
		if(isset($_SESSION["equivida"]["bd"]["id"])){
			$query='SELECT * FROM correos d WHERE usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'";';
			$array_datos=$this->query($query,1);
		}
		
		return $array_datos;
	}



	function get_correo($id){
		if(isset($_SESSION["equivida"]["bd"]["id"])){
			$query='SELECT * FROM correos d WHERE usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'" and id='.$id.';';
			$array_datos=$this->query($query,1);	
		}
		
		return $array_datos;
	}
	
	function borrar_direccion(){
		
		if(isset($_SESSION["equivida"]["bd"]["id"])){
			$query='DELETE FROM direcciones WHERE id='.$_GET["id"].';';
			$this->query($query,0);
		}
		
	}

	function borrar_correo(){
		if(isset($_SESSION["equivida"]["bd"]["id"])){
			$query='DELETE FROM correos WHERE id='.$_GET["id"].';';
			$this->query($query,0);
		}
		
	}
	
	
	function set_email(){
		
		if(isset($_SESSION["equivida"]["bd"]["id"])){
				$query='INSERT INTO correos SET
				email="'.$_POST["email"].'",
				usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'",
				tipo="'.$_POST["tipo_direccion"].'";';
		
				$this->query($query,0);
				$_SESSION["flash_ok"]="La dirección se ingreso correctamente.";
		}
	}



	function update_email(){
		
		if(isset($_SESSION["equivida"]["bd"]["id"])){
				$query='UPDATE correos SET
				email="'.$_POST["email"].'",
				usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'",
				tipo="'.$_POST["tipo_direccion"].'" WHERE id="'.$_POST["id"].'" ;';
		
				//echo $query;
				$this->query($query,0);
				$_SESSION["flash_ok"]="El correo se actualizó correctamente.";
		}
	}
	
	function set_telefono(){
		
		if(isset($_SESSION["equivida"]["bd"]["id"])){
				
				
				$query='INSERT INTO telefonos SET
						numero="'.$_POST["numero"].'",
						tipo="'.$_POST["tipo"].'",
						usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'";';
						
				$this->query($query,0);
				$_SESSION["flash_ok"]="EL número de teléfono se ingreso.";
				
		}
		
		
	}

	function actualizar_telefono(){

		if(isset($_SESSION["equivida"]["bd"]["id"])){

			$query='UPDATE telefonos SET
				numero="'.$_POST["numero"].'",
				tipo="'.$_POST["tipo"].'",
				usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'" 
				WHERE id="'.$_POST["id"].'";';

			$this->query($query,0);
			$_SESSION["flash_ok"]="EL número de teléfono se actualizó correctamente.";


		}

	}

	function borrar_telefono(){

		if(isset($_SESSION["equivida"]["bd"]["id"])){
			$query='DELETE FROM telefonos WHERE id='.$_GET["id"].';';
			$this->query($query,0);

		}
		
	}
	
	function get_broker($texto){
			$query='SELECT * FROM `agentes` WHERE brokers like ("%'.$texto.'%")';
			$array_datos=$this->query($query,1);
			
			if(count($array_datos)>0){
				
				return $array_datos;
				
			}else{
				
				$array_datos[0]["codigo"]=$_SESSION["info_broker"]->idPersona;
				return $array_datos;
				
			}
			
			
	}
	
	function carga_datos_direcciones($direcciones){
		for($i=0;$i<count($direcciones);$i++){
			
				$query_valida='SELECT * FROM `direcciones` WHERE calle_principal like ("'.$direcciones[$i]->callePrincipal.'%") and   calle_secundaria like ("'.$direcciones[$i]->calleSecundaria.'%")';
				$array_valida=$this->query($query_valida,1);
				
				if(count($array_valida)==0){
			
				$query='INSERT INTO direcciones SET
						ciudad="",
						canton="",
						provincia_id="'.$direcciones[$i]->idProvincia.'",
						calle_principal="'.$direcciones[$i]->callePrincipal.'",
						calle_secundaria="'.$direcciones[$i]->calleSecundaria.'",
						usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'",
						tipo="DOMICILIO";';
				$this->query($query,0);
				
				}
		}	
	}
	
	function carga_datos_telefonos($telefonos){
			for($i=0;$i<count($telefonos);$i++){
				
				$query_valida='SELECT * FROM `telefonos` WHERE numero like ("'.$telefonos[$i]->nroTelefono.'%")';
				$array_valida=$this->query($query_valida,1);
				if(count($array_valida)==0){
					$query='INSERT INTO telefonos SET
							numero="'.$telefonos[$i]->nroTelefono.'",
							tipo="CONVENCIONAL",
							usuario_id="'.$_SESSION["equivida"]["bd"]["id"].'";';
					$this->query($query,0);
				}	
				
					
			}
	}
	
	
}

?>