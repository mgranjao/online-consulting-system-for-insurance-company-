<?

class Urlweb{
	var $url,$queryurl;
	function Urlweb($url) {
			$this->url=$url;
			$this->queryurl="http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
	}
	
	function get_seccion($num){
			$secciones=str_replace($this->url,"",$this->queryurl);
			$seccion=explode("/",$secciones);
			return $seccion[$num];
	}	
	function navegacion($seccion){
		$seccion=strtolower(str_replace("-"," ",$seccion));
		return $seccion;
	}
}
?>
