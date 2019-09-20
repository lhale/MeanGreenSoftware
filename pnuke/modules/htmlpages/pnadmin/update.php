<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: update.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * This is a standard function that is called with the results of the
 * form supplied by htmlpages_admin_modify() to update a current item
 * @param 'pid' the id of the item to be updated
 * @param 'uid' the name of the item to be updated
 * @param 'title' the name of the item to be updated
 * @param 'content' the number of the item to be updated
 */
function htmlpages_admin_update($args)
{
    // Get parameters from whatever input we need.  
    list($pid,
         $uid,
         $title,
         $printlink,
         $content) = pnVarCleanFromInput('pid',
                                        'uid',
                                        'title',
                                        'printlink',
                                        'content');

    // User functions of this type can be called by other modules.  
    extract($args);

    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        return pnRedirect(pnModURL('htmlpages', 'admin', 'view'));
    }

    // The API function is called.  
    if(pnModAPIFunc('htmlpages', 'admin', 'update',
                    array(  'pid' => $pid,
                            'uid' => $uid,
                            'title' => $title,
                            'printlink'=>$printlink,
                            'content'=> $content))) {
        // Success
        pnSessionSetVar('statusmsg', _HTMLPAGESUPDATED);
    }

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('htmlpages', 'admin', 'view'));
}
