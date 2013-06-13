<?
include_once(defaults("BASE_PATH") . "model/model.php");

class IncidentenmanagementModel extends Model {
		function getRowFromIncidents ($type = "data") {
		$data['row'] = mysql_query("SELECT ID_I, TXT_I_HC_Identificatiecode, DAT_I_gemeld, DAT_I_Oplossing, FID_I_W
                                        		FROM Incidenten");
										
		return $this->setFormat($data['row'], $type);
	}
}
?>