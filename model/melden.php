<?
include_once(defaults("BASE_PATH") . "model/model.php");

class MeldenModel extends Model {
	function getQuestionscripts ($type = "data") {
		$data['questionscripts'] = mysql_query("SELECT DISTINCT poNR, probleem, omschrijving
                                        		FROM Vragenscripts");
										
		return $this->setFormat($data['questionscripts'], $type);
	}
	
	function getQuestionscriptBypoNR ($poNR, $type = "data") {
		$data['questionscript'] = mysql_query("SELECT DISTINCT probleem, omschrijving
                                        		FROM Vragenscripts
												WHERE poNR = '" . mysql_real_escape_string($poNR) . "'");
										
		return $this->setFormat($data['questionscript'], $type);	
	}
	
	function getQuestionsBypoNR ($poNR, $type = "data") {
		$data['questions']	 = mysql_query("SELECT vraag, vraagNR, ja, nee
											FROM Vragenscripts
											WHERE poNR = '" . mysql_real_escape_string($poNR) . "'");
											
		return $this->setFormat($data['questions'], $type);
	}
	
	function getWorkaroundByID_W($ID_W, $type = "data") {
		$data['workaround']	 = mysql_query("SELECT TXT_W_Omschrijving, TXT_W
											FROM Workarounds
											WHERE ID_W = '" . mysql_real_escape_string($ID_W) . "'");
											
		return $this->setFormat($data['workaround'], $type);
	}
}
?>