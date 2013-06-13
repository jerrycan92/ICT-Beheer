<?
include("../controller.php");

$controller = new Controller();
$models = "melden";
$seo = false;

$controller->mainController($models, false, "Melden", $seo);
?>