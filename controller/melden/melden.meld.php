<?
include("../controller.php");

$controller = new Controller();
$models = "melden, hardware";
$seo = false;

$controller->mainController($models, false, "Melden", $seo);
?>