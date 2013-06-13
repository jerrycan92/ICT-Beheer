<?
include_once(defaults("BASE_PATH") . "model/model.php");

class UserModel extends Model {
	function getPasswordByUsername($Username, $type = "data"){
		$data['wachtwoord'] =  mysql_query("SELECT Wachtwoord
											FROM BeheerLogin
											WHERE Gebruikersnaam = '" . mysql_real_escape_string($Username) . "'");
		return $this->setFormat($data['wachtwoord'], $type);		
	}
}
?>