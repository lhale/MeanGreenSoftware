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
 * delete a htmlpages item
 * @param $args['pid'] ID of the item
 * @returns bool
 * @return true on success, false on failure
 */
function htmlpages_adminapi_delete($args)
{
    // Get arguments from argument array
    extract($args);

    if (!isset($pid)) {
        pnSessionSetVar('errormsg', _MODARGSERROR);
        return false;
    }

    // The user API function is called.  
    $item = pnModAPIFunc('htmlpages', 'user', 'get', array('pid' => $pid));

    if ($item == false) {
        pnSessionSetVar('errormsg', _HTMLPAGESNOSUCHITEM);
        return false;
    }

    // Security check - 
    if (!pnSecAuthAction(0, 'htmlpages::', "$item[title]::$pid", ACCESS_DELETE)) {
        pnSessionSetVar('errormsg', _MODULENOAUTH);
        return false;
    }

    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();
    $htmlpagestable = $pntable['htmlpages'];
    $htmlpagescolumn = &$pntable['htmlpages_column'];

    $sql = "DELETE FROM $htmlpagestable
            WHERE $htmlpagescolumn[pid] = " . pnVarPrepForStore($pid);
    $dbconn->Execute($sql);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _DELETEFAILED);
        return false;
    }

    // Let any hooks know that we have deleted an item.
    pnModCallHooks('item', 'delete', $pid, array('module' => 'htmlpages'));

    // Let the calling process know that we have finished successfully
    return true;
}
