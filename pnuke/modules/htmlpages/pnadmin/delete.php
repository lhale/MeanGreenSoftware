<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: delete.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * delete item
 */
function htmlpages_admin_delete($args)
{
    // Get parameters from whatever input we need.
    list($pid, $confirmation) = pnVarCleanFromInput('pid', 'confirmation');
    extract($args);

    // The user API function is called.  
    $item = pnModAPIFunc('htmlpages', 'user', 'get', array('pid' => $pid));

    if ($item == false) {
        return pnVarPrepHTMLDisplay(_HTMLPAGESNOSUCHITEM);
    }

    // Security check - 
    if (!pnSecAuthAction(0, 'htmlpages::', "$item[title]::$pid", ACCESS_DELETE)) {
        return pnVarPrepHTMLDisplay(_MODULENOAUTH);
    }

    // Check for confirmation. 
    if (empty($confirmation)) {
        // No confirmation yet - display a suitable form to obtain confirmation
        // of this action from the user
		// create new output object
		$pnRender = new pnRender('htmlpages');
	
		// As Admin output changes often, we do not want caching.
		$pnRender->caching = false;

		// assign the item id
		$pnRender->assign('pid', $pid);

        // Return the output that has been generated by this function
        return $pnRender->fetch('htmlpages_admin_delete.htm');
    }

    // If we get here it means that the user has confirmed the action

    // Confirm authorisation code.  
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        return pnRedirect(pnModURL('htmlpages', 'admin', 'view'));
    }

    // The API function is called.  
    if (pnModAPIFunc('htmlpages', 'admin', 'delete', array('pid' => $pid))) {
        // Success
        pnSessionSetVar('statusmsg', _HTMLPAGESDELETED);
    }

    return pnRedirect(pnModURL('htmlpages', 'admin', 'view'));
}
