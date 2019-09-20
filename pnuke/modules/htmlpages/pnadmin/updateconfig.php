<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: updateconfig.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * Update the configuration
 * 
 * This is a standard function to update the configuration parameters of the
 * module given the information passed back by the modification form
 * Modify configuration
 * 
 * @author       Mark West
 * @version      $Revision: 30 $
 * @param        itemsperpage   number of items per page
 */
function htmlpages_admin_updateconfig()
{
    // Security check
    if (!pnSecAuthAction(0, 'htmlpages::', '::', ACCESS_ADMIN)) {
        return pnVarPrepHTMLDisplay(_MODULENOAUTH);
    }

    // Get parameters from whatever input we need.
    $itemsperpage = pnVarCleanFromInput('itemsperpage');

    // Confirm authorisation code.
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', pnVarPrepHTMLDisplay(_BADAUTHKEY));
        return pnRedirect(pnModURL('htmlpages', 'admin', 'view'));
    }

    // Update module variables.
    if (!isset($itemsperpage)) {
        $itemsperpage = 10;
    }
    pnModSetVar('htmlpages', 'itemsperpage', $itemsperpage);

    // report configuration updated
    pnSessionSetVar('statusmsg', pnVarPrepHTMLDisplay(_CONFIGUPDATED));

    // The configuration has been changed, so we clear all caches for 
    // this module.
    $pnRender = new pnRender('htmlpages');
    $pnRender->clear_cache(); 

    // Let any other modules know that the modules configuration has been updated
    pnModCallHooks('module','updateconfig', 'htmlpages', array('module' => 'htmlpages'));

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('htmlpages', 'admin', 'view'));
}
