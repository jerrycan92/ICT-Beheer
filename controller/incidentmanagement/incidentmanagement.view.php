<?
include("../controller.php");

$controller = new Controller();
$models = "incidentmanagement";
$seo = false;

$controller->mainController($models, false, "Incidentmanagement", $seo);
?>