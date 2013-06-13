<?
include("../controller.php");

$controller = new Controller();
$models = "user";
$seo = false;

$controller->mainController($models, false, "Beheer", $seo);
?>