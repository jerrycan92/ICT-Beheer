<?
include_once("../../includes/config.php");

class Model {
	public function loadModel ($modelToLoad) {
		include_once(defaults("BASE_PATH") . "model/" . $modelToLoad . ".php");
		
		$modelToLoadFull = ucfirst($modelToLoad) . "Model";
		$this->$modelToLoad = new $modelToLoadFull();
	}
	
	public function setFormat ($content, $type = "data") {
		if ($type == "assoc") {
			return mysql_fetch_assoc($content);	
		} else if ($type == "data") {
			return $content;
		}
	}
	
	public function doQuery ($query) {
		$do = mysql_query($query);
		
		return $do;
	}
	
	public function fieldChecks ($content, $checks, $table = "", $field = "") {
		$checks = explode(", ", $checks);
		$succes = true;
		
		foreach ($checks as $check) {
			if ($succes == false) 					return false;
			
			if ($check == "isFilled") {
				if ($content == "") {
					$succes = false;	
				}
			}
			if ($check == "isNumber") {
				$succes = is_numeric($content);
			}
			if ($check == "notExists") {
				$data = mysql_query("SELECT " . $field . "
												FROM " . $table . "
												WHERE " . $field . " = '" . $content . "'");	
				
				if (mysql_num_rows($data) != 0) {
					$succes = false;	
				}
			}
			if ($check == "doesExists") {
				$data = mysql_query("SELECT " . $field . "
												FROM " . $table . "
												WHERE " . $field . " = '" . $content . "'");	
				
				if (mysql_num_rows($data) == 0) {
					$succes = false;	
				}
			}
		}
		
		return $succes;
	}
}
?>