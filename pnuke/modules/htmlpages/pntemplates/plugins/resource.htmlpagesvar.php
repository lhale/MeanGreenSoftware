<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: resource.htmlpagesvar.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/*
* Smarty plugin
* -------------------------------------------------------------
* Type:     resource
* Purpose:  fetches template from a global variable
* Version:  1.0 [Sep 28, 2002 boots since Sep 28, 2002 boots]
* -------------------------------------------------------------
*/

function smarty_resource_htmlpagesvar_source($tpl_name, &$tpl_source, &$smarty)
{
	if (isset($tpl_name)) {
     	$tpl_source = $GLOBALS[$tpl_name];
      	return true;
	}
   	return false;
}

function smarty_resource_htmlpagesvar_timestamp($tpl_name, $tpl_timestamp, &$smarty)
{
   	if (isset($tpl_name)) {
      	$tpl_timestamp = microtime();
      	return true;
    }
   	return false;
}

function smarty_resource_htmlpagesvar_secure($tpl_name, &$smarty)
{
	// assume all templates are secure
	return true;
}

function smarty_resource_htmlpagesvar_trusted($tpl_name, &$smarty)
{
	// not used for templates
}
