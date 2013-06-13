<?
include("../controller.php");

$controller = new Controller();
$models = false;
$seo = false;

$controller->mainController($models, false, "Beheer", $seo);
?>