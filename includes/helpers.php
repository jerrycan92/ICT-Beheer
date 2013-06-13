<?
function menuSetup ($active = "") {
	$defaultON = "Home";
	$elements = array (
		"Home" => defaults("BASE_SHORT") . "index/view/",
		"Melden" => defaults("BASE_SHORT") . "melden/meld/",
		"Contact" => "#",
		"Beheer" => defaults("BASE_SHORT") . "beheer/incidenten/"
	);
	
	$returning = "";
	
	foreach ($elements as $element => $link) {
		$activeHTML = "";
		if (((!$active || $active == "") && $element == $defaultON) || 
			$element == $active) {
				
			$activeHTML = " active";
		}
		
		$returning .= '
			<a href="' . $link . '">
				<div class="button' . $activeHTML . '">' . $element . '</div>
			</a>';
	}
	
	return $returning;
}

function makeValuta ($val) {
	$val = str_replace(".00", "", $val);
	$val = str_replace(".", ",", $val);
	
	if (strpos($val, ",")) {
		$valExp = explode(",", $val);
		if (strlen($valExp[1]) == 1) {
			$val = "&euro;" . $val . "0";	
		} else {
			$val = "&euro;" . $val;	
		}
	} else {
		$val = "&euro;" . $val . ",-";	
	}
	
	return $val;
}

function restrictionCheck ($got, $needed = 1) {
	if ($needed != $got) {
		return "U heeft niet de juiste permissies om deze pagina te bekijken";
	} else {
		return false;	
	}
}

function restrictionCheckStop () {
	if (restrictionCheck(restrictions()) != false) {
		echo restrictionCheck(restrictions());
		exit();
	}	
}

function shuffle_assoc($list) { 
	if (!is_array($list)) return $list; 
	
	$keys = array_keys($list); 
	shuffle($keys); 
	$random = array(); 
	foreach ($keys as $key) { 
		$random[] = $list[$key]; 
	}
	return $random; 
} 
?>