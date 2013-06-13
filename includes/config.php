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
	$restrictions['actual'] = 1;
	
	return $restrictions[$type];
}
?>