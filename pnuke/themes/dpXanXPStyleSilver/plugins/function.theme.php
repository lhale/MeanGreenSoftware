<?php
 
// LDH - don't know exactly who's calling this beastie...
function smarty_function_theme($params, &$smarty) 
{
    extract($params); 
	unset($params);

	// set some defaults
	if (!defined($class)) {
		$class = 'pn-normal';
	}
//	$greeting = "<span class=\"$class\">Theme creado por<br /><a href=\"http://www.dev-postnuke.com\" target=\"new\">dev-postnuke.com</a></span>";
	$greeting = "<span class=\"$class\">Theme created by MeanGreen Software</span>";
	
	return $greeting;
}

?>
