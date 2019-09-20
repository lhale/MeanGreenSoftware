<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: view.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * view items
 * This is a standard function to provide an overview of all of the items
 * available from the module.
 */
function htmlpages_user_view()
{  
    if (!pnSecAuthAction(0, 'htmlpages::', '::', ACCESS_OVERVIEW)) {
		return pnVarPrepHTMLDisplay(_MODULENOAUTH);
    }

	list($pid, $objectid)= pnVarCleanFromInput('pid', 'objectid');

    if (!isset($pid) || ($pid == '')) {
        return pnModFunc('htmlpages', 'admin', 'view');
    } else {
        return pnRedirect(pnModURL('htmlpages', 'user', 'display', array('pid' => $pid)));  
    }
}
