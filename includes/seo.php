<?
class SEOinformation {
	public function getSEO ($page, $action) {
		$infoSearch = ucfirst($page) . ucfirst($action);
		
		if (method_exists(get_class(), $infoSearch)) {
			return $this->$infoSearch();
		} else {
			return $this->defaultInfo();
		}
	}
	
	public function defaultInfo () {
		$SEOcontent = '
			default
		';
		return $SEOcontent;	
	}
	
	public function IndexView () {
		$SEOcontent = '
			indexview
		';
		return $SEOcontent;	
	}
}
?>