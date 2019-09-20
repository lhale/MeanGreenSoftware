<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: main.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * the main administration function
 * This function is the default function
 */
function htmlpages_admin_main()
{
    if (!pnSecAuthAction(0, 'htmlpages::', '::', ACCESS_OVERVIEW)) {
        return pnVarPrepHTMLDisplay(_MODULENOAUTH);
    }

    return pnRedirect(pnModURL('htmlpages', 'admin', 'view'));
}
