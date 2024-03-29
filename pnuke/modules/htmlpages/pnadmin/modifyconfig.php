<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: modifyconfig.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * Modify configuration
 * 
 * This is a standard function to modify the configuration parameters of the
 * module
 * 
 * @author       Mark West
 * @version      $Revision: 30 $
 * @return       output       The configuration page
 */
function htmlpages_admin_modifyconfig()
{
    // Security check
    if (!pnSecAuthAction(0, 'htmlpages::', '::', ACCESS_ADMIN)) {
        return pnVarPrepHTMLDisplay(_MODULENOAUTH);
    }

    // Create output object
    $pnRender = new pnRender('htmlpages');

    // As admin output changes often, we do not want caching.
    $pnRender->caching = false;

    // Assign all module vars
    $pnRender->assign(pnModGetVar('htmlpages'));

    // Return the output that has been generated by this function
    return $pnRender->fetch('htmlpages_admin_modifyconfig.htm');
}
