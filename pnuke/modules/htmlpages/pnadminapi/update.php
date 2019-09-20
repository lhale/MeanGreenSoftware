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
 * update a htmlpages item
 * @param $args['pid'] the ID of the item
 * @param $args['title'] the new name of the item
 * @param $args['uid'] the new uid of the item
 * @param $args['content'] the new uid of the item
 */
function htmlpages_adminapi_update($args)
{
    extract($args);

    // Argument check
    if ((!isset($pid)) ||
        (!isset($title)) ||
        (!isset($content)) ||
        (!isset($uid))) {
        pnSessionSetVar('errormsg', _MODARGSERROR);
        return false;
    }

    $item = pnModAPIFunc('htmlpages',
            'user',
            'get',
            array('pid' => $pid));

    if ($item == false) {
        pnSessionSetVar('errormsg', _HTMLPAGESNOSUCHITEM);
        return false;
    }

    if (!pnSecAuthAction(0, 'htmlpages::', "$item[title]::$pid", ACCESS_EDIT)) {
        pnSessionSetVar('errormsg', _MODULENOAUTH);
        return false;
    }
    if (!pnSecAuthAction(0, 'htmlpages::', "$title::$pid", ACCESS_EDIT)) {
        pnSessionSetVar('errormsg', _MODULENOAUTH);
        return false;
    }

    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();
    $htmlpagestable = $pntable['htmlpages'];
    $htmlpagescolumn = &$pntable['htmlpages_column'];

    // Update the item 
    $sql = "UPDATE $htmlpagestable
            SET $htmlpagescolumn[title] = '" . pnVarPrepForStore($title) . "',
                $htmlpagescolumn[timest] = NOW(NULL),
                $htmlpagescolumn[content] = '" . pnVarPrepForStore($content) . "',
                $htmlpagescolumn[printlink] = '" . pnVarPrepForStore($printlink) . "',
                $htmlpagescolumn[uid] = '" . (int)pnVarPrepForStore($uid) . "'
            WHERE $htmlpagescolumn[pid] = '" . (int)pnVarPrepForStore($pid) . "'";
    $dbconn->Execute($sql);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _UPDATEFAILED);
        return false;
    }

	// The item has been modified, so we clear all compiled pages of this item.
    $pnRender = new pnRender('htmlpages');
	$pnRender->clear_compiled_tpl('htmlpagesvar:htmlpagesitem'.$title, $pid, $pid);

    // Let any hooks know that we have updated an item.
    pnModCallHooks('item', 'update', $pid, array('module' => 'htmlpages'));

    // Let the calling process know that we have finished successfully
    return true;
}
