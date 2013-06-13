<?
include("../controller.php");

$controller = new Controller();
$models = "incidentenmanagement";
$seo = false;

$controller->mainController($models, false, "Incidenten", $seo);
?>