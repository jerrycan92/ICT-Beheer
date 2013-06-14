<?
include_once(defaults("BASE_PATH") . "model/model.php");

class MeldenModel extends Model {
	function getQuestionscripts ($type = "data") {
		$data['questionscripts'] = mysql_query("SELECT DISTINCT ID_HS, ID_Omschrijving, Omschrijving
                                        		FROM Vragenscripts
												ORDER BY ID_HS DESC");
										
		return $this->setFormat($data['questionscripts'], $type);
	}
	
	function getQuestionscriptByIDO ($ID_Omschrijving, $type = "data") {
		$data['questionscript'] = mysql_query("SELECT DISTINCT ID_HS, Omschrijving
                                        		FROM Vragenscripts
												WHERE ID_Omschrijving = '" . mysql_real_escape_string($ID_Omschrijving) . "'");
										
		return $this->setFormat($data['questionscript'], $type);	
	}
	
	function getQuestionsByIDO ($ID_Omschrijving, $type = "data") {
		$data['questions']	 = mysql_query("SELECT Vraag, ID_Vraag, Ja, Nee
											FROM Vragenscripts
											WHERE ID_Omschrijving = '" . mysql_real_escape_string($ID_Omschrijving) . "'");
											
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