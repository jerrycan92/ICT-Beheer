<?
include_once(defaults("BASE_PATH") . "model/model.php");

class HardwareModel extends Model {
	function getHardwareIDs ($type = "data") {
		$data['hardwareIDs'] = mysql_query("SELECT TXT_HC_Identificatiecode
												FROM Hardware_Componenten");
										
		return $this->setFormat($data['hardwareIDs'], $type);
	}
	
}
?>