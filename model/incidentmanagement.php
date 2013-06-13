<?
include_once(defaults("BASE_PATH") . "model/model.php");

class IncidentmanagementModel extends Model {
	function getIncidents ($type = "data") {
		$data['incidenten'] = mysql_query("SELECT ID_I, TXT_I_HC_Identificatiecode, DAT_I_gemeld, DAT_I_Oplossing, FID_I_W
                                   		FROM Incidenten");
										
		return $this->setFormat($data['incidenten'], $type);
	}
}
?>