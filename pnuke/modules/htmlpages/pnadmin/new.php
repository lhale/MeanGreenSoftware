<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: new.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * add new item
 * This is a standard function that is called whenever an administrator
 * wishes to create a new module item
 */
function htmlpages_admin_new()
{
    // Security check 
    if (!pnSecAuthAction(0, 'htmlpages::', '::', ACCESS_ADD)) {
        return pnVarPrepHTMLDisplay(_MODULENOAUTH);
    }

	// create new output object
	$pnRender = new pnRender('htmlpages');

    // As Admin output changes often, we do not want caching.
    $pnRender->caching = false;

    // Return the output that has been generated by this function
    return $pnRender->fetch('htmlpages_admin_new.htm');
}
