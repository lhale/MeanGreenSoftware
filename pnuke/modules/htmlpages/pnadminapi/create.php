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
 * create a new htmlpages item
 * @param $args['title'] title of the item
 * @param $args['uid'] the uid of the creatorof the item
 * @param $args['content'] the uid of the creatorof the item
 * @returns int
 * @return htmlpages item ID on success, false on failure
 */
function htmlpages_adminapi_create($args)
{
    extract($args);
   
    // Argument check
    if ((!isset($title)) ||
        (!isset($uid))   ||
        (!isset($content))){
        pnSessionSetVar('errormsg', _MODARGSERROR);
        return false;
    }

    // set some defaults
    if (!isset($printlink) || !is_bool($printlink)) {
        $printlink = false;
    }

    // Security check
    if (!pnSecAuthAction(0, 'htmlpages::', "$title::", ACCESS_ADD)) {
        pnSessionSetVar('errormsg', _MODULENOAUTH);
        return false;
    }
 
    // Get datbase setup 
    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();
    $htmlpagestable = $pntable['htmlpages'];
    $htmlpagescolumn = &$pntable['htmlpages_column'];

    $nextId = $dbconn->GenId($htmlpagestable);

    // Add item 
    $sql = "INSERT INTO $htmlpagestable (
              $htmlpagescolumn[timest],  
              $htmlpagescolumn[pid],
              $htmlpagescolumn[title],
              $htmlpagescolumn[uid],
              $htmlpagescolumn[printlink],
              $htmlpagescolumn[content])
            VALUES (
              NOW(NULL),
              $nextId,
              '" . pnVarPrepForStore($title) . "',
              " . (int)pnVarPrepForStore($uid) . ",
              " . (int)pnVarPrepForStore($printlink) . ",
              '" . pnvarPrepForStore($content) . "')";
    $dbconn->Execute($sql);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', $sql);
        return false;
    }

    // Get the ID of the item that we inserted.  
    $pid = $dbconn->PO_Insert_ID($htmlpagestable, $htmlpagescolumn['pid']);

    // Let any hooks know that we have created a new item
    pnModCallHooks('item', 'create', $pid, array('module' => 'htmlpages'));

    // Return the id of the newly created item to the calling process
    return $pid;
}
