<?php 

$urlVariables = explode("/",$_SERVER['REQUEST_URI']);

// Not used yet
function globalizeurl($urlloc,$urlVariables) {
	
	$urlid = "url".$urlloc;
	
	// Check for get variable 
	$stc = substr($urlVariables[$urlloc],0,1); 
	if ($stc == "?") { 
		$url == "";
	} else { 
		//$url = sanitize($urlVariables[$urlloc]);
		if ($url) { $GLOBALS[$urlid] = $url; } 
		else { unset($GLOBALS[$urlid]);	}
	}
	
	return $url;
}

if (isset($urlVariables[1])) { $url1 = globalizeurl(1,$urlVariables); }
if (isset($urlVariables[2])) { $url2 = globalizeurl(2,$urlVariables); }	
if (isset($urlVariables[3])) { $url3 = globalizeurl(3,$urlVariables); }	
if (isset($urlVariables[4])) { $url4 = globalizeurl(4,$urlVariables); }	
if (isset($urlVariables[5])) { $url5 = globalizeurl(5,$urlVariables); }	
if (isset($urlVariables[6])) { $url6 = globalizeurl(6,$urlVariables); }	
if (isset($urlVariables[7])) { $url7 = globalizeurl(7,$urlVariables); }	
if (isset($urlVariables[8])) { $url8 = globalizeurl(8,$urlVariables); }	

if ((!$url1) || ($url1 == "") || ($url1 == " ")) { 
	$url1 = "Home";
} else if ($url1 == "404") {
	// 404 do nothing.
}


// Bypass for now to skip sanitization
if (isset($urlVariables[1])) { $url1 = $urlVariables[1]; }
if (isset($urlVariables[2])) { $url2 = $urlVariables[2]; }	
if (isset($urlVariables[3])) { $url3 = $urlVariables[3]; }	
if (isset($urlVariables[4])) { $url4 = $urlVariables[4]; }	
if (isset($urlVariables[5])) { $url4 = $urlVariables[5]; }	
if (isset($urlVariables[6])) { $url4 = $urlVariables[6]; }	
if (isset($urlVariables[7])) { $url4 = $urlVariables[7]; }	
if (isset($urlVariables[8])) { $url4 = $urlVariables[8]; }	

// Pages
if (!$url1) { include("pages/home.php"); }
if ($url1 == "Login") { include("pages/login.php"); }
if ($url1 == "AddExercise") { include("pages/addexercise.php"); }
if ($url1 == "ViewExercises") { include("pages/viewexercises.php"); }
if ($url1 == "Users") { include ("pages/users.php"); }
if ($url1 == "Home") { include ("pages/home.php"); }


?>