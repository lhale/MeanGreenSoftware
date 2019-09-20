<?php
 
function smarty_function_bienvenido($params, &$smarty) 
{
    extract($params); 
	unset($params);

	$out = "&nbsp;&nbsp;";
	if( pnUserLoggedIn() ) {        
		$out .= "<span class=\"pn-login\">"._WELCOME."&nbsp;<a href=\"user.php\" title=\""._YOUR_ACCOUNT."\">".pnUserGetVar('uname')."</a>&nbsp;!</span>";
    } else {
        $out .= "<span class=\"pn-login\"><a href=\"user.php\">"._INTRODUCE."</a>&nbsp;"._TU_USUARIO."</span>";
    }
	
	return $out;
}

?>