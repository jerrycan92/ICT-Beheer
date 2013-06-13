<?
include("../../includes/config.php");

class Controller {
	public function segments ($place = false) {
		$check = "";
		if(!defaults("SUB_FOLDER")){
			$check = "/check";
		}
		$_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$segments = explode('/', $check . $_SERVER['REQUEST_URI_PATH']);	
		
		$place++;
		
		if ($place !== false) {
			return $segments[$place];
		} else {
			return $segments;	
		}
	}
	
	public function mainController ($modelsToLoad = false, $webshop = true, $active = "", $seo = "") {
		$page = $this->segments(1);
		$action = $this->segments(2);
		
		include(defaults("BASE_PATH") . "includes/helpers.php");
		include(defaults("BASE_PATH") . "layout/head.php");	
		include_once(defaults("BASE_PATH") . "model/model.php");
		include(defaults("BASE_PATH") . "view/view.php");
		
		$model = new Model();
		$view = new View();
		
		if ($modelsToLoad) {
			if(stristr($modelsToLoad, ", ")) {
				$modelsToLoad = explode(", ", $modelsToLoad);
				foreach ($modelsToLoad as $modelToLoad) {
					$model->loadModel($modelToLoad);	
				}
			} else {
				$model->loadModel($modelsToLoad);	
			}
		}
		
		$page = $this->segments(1);
		$action = $this->segments(2);
		
		$view->show($page, $action, $this, $model);
		
		include(defaults("BASE_PATH") . "layout/foot.php");	
	}
}
?>