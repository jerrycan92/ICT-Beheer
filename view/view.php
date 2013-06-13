<?
include_once("../include/config.php");
class View {
	public function show($page, $action, $controller, $model) {
		if (!$page) {
			include(defaults("BASE_PATH") . "view/index/index.view.php");
		} else {
			include(defaults("BASE_PATH") . "view/" . $page . "/" . $page . "." . $action . ".php");
		}
	}
}
?>