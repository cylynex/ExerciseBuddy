<?php

class Rewrite {
	
	public function GetUrlVariables() {
		$urlVariables = explode("/",$_SERVER['REQUEST_URI']);
		if (isset($urlVariables[1])) { $url[1] = $urlVariables[1]; }
		if (isset($urlVariables[2])) { $url[2] = $urlVariables[2]; }	
		if (isset($urlVariables[3])) { $url[3] = $urlVariables[3]; }
		return $url;
	}
}

$rewrite = new Rewrite();