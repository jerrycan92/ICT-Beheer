<?
include_once(defaults("BASE_PATH") . "model/model.php");

class HardwareModel extends Model {
	function getHardwareIDs ($type = "data") {
		$data['hardwareIDs'] = mysql_query("SELECT TXT_HC_Identificatiecode
												FROM Hardware_Componenten");
										
		return $this->setFormat($data['hardwareIDs'], $type);
	}
	
	function getHardwareSoortByID ($ID_HS, $type = "data") {
		$data['hardwareIDs'] = mysql_query("SELECT TXT_HS_Naam
												FROM Hardware_Soort
												WHERE ID_HS = '" . mysql_real_escape_string($ID_HS) . "'");
										
		return $this->setFormat($data['hardwareIDs'], $type);
	}
}
?>