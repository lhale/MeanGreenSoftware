<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: function.htmlpagesadminlinks.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */
 
/**
 * Smarty function to display admin links for the htmlpages module
 * based on the user's permissions
 * 
 * htmlpages
 * <!--[htmlpagesadminlinks start="[" end="]" seperator="|" class="pn-menuitem-title"]-->
 * 
 * @author       Mark West
 * @since        5/4/2004
 * @see          function.htmlpagesadminlinks.php::smarty_function_htmlpagesadminlinks()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $start       start string
 * @param        string      $end         end string
 * @param        string      $seperator   link seperator
 * @param        string      $class       CSS class
 * @return       string      the results of the module function
 */
function smarty_function_htmlpagesadminlinks($params, &$smarty) 
{
    extract($params); 
	unset($params);
    
	// set some defaults
	if (!defined($start)) {
		$start = '[';
	}
	if (!defined($end)) {
		$end = ']';
	}
	if (!defined($separator)) {
		$seperator = '|';
	}
    if (!defined($class)) {
	    $class = 'pn-menuitem-title';
	}

    $adminlinks = "<span class=\"$class\">$start ";
	
    if (pnSecAuthAction(0, 'htmlpages::', "::", ACCESS_READ)) {
		$adminlinks .= "<a href=\"" . pnVarPrepForDisplay(pnModURL('htmlpages', 'admin', 'view')) . "\">" . _VIEW . "</a> ";
    }
    if (pnSecAuthAction(0, 'htmlpages::', "::", ACCESS_ADD)) {
		$adminlinks .= "$seperator <a href=\"" . pnVarPrepForDisplay(pnModURL('htmlpages', 'admin', 'new')) . "\">" . _NEW . "</a> ";
    }
    if (pnSecAuthAction(0, 'htmlpages::', "::", ACCESS_ADMIN)) {
		$adminlinks .= "$seperator <a href=\"" . pnVarPrepForDisplay(pnModURL('htmlpages', 'admin', 'modifyconfig')) . "\">" . _MODIFYCONFIG . "</a> ";
    }

	$adminlinks .= "$end</span>\n";

    return $adminlinks;
}
