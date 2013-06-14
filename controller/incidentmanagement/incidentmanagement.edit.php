<?
include("../controller.php");

$controller = new Controller();
$models = "incidentmanagement";
$seo = false;

$controller->mainController($models, false, "Incidenten", $seo);
?>