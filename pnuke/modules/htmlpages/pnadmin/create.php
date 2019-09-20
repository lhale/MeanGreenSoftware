<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: create.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * Create an item
 *
 * This is a standard function that is called with the results of the
 * form supplied by htmlpages_admin_new() to create a new item
 *
 */
function htmlpages_admin_create($args)
{
    list($uid,
         $title,
         $printlink,
         $content) = pnVarCleanFromInput('uid',
                                         'title',
                                         'printlink',
                                         'content');

    extract($args);

    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        return pnRedirect(pnModURL('htmlpages', 'admin', 'view'));
    }

    $tid = pnModAPIFunc('htmlpages', 'admin', 'create',
                        array('uid' => $uid,
                              'content' => $content,
                              'printlink'=>$printlink,
                              'title' => $title));

    if ($tid != false) {
        // Success
        pnSessionSetVar('statusmsg', _HTMLPAGESCREATED);
    }

    return pnRedirect(pnModURL('htmlpages', 'admin', 'view'));
}
