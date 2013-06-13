<?
include("connection.php");

session_start();

function defaults ($r) {
	$defaults = array (
		"BASE_PATH" => $_SERVER['DOCUMENT_ROOT'] . "/",
		"BASE_SHORT" => "/",
		"SUB_FOLDER" => false
	);
	
	return $defaults[$r];
}

function restrictions ($type = "actual") {
	if (isset($_SESSION['restriction'])) {
		$restrictions['actual'] = $_SESSION['restriction'];
	} else {
		$restrictions['actual'] = 0;	
	}
	
	return $restrictions[$type];
}
?>