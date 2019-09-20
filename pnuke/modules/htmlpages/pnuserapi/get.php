<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: get.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * get a specific item
 * @param $args['pid'] id of example item to get
 * @returns array
 * @return item array, or false on failure
 */
function htmlpages_userapi_get($args)
{
    extract($args);
    
    if (!isset($pid) || !is_numeric($pid)) {
        pnSessionSetVar('errormsg', _MODARGSERROR);
        return false;
    }

	if (!isset($parse) || !is_bool($parse))  {
		$parse = false;
	}

    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();
    $htmlpagestable = $pntable['htmlpages'];
    $htmlpagescolumn = &$pntable['htmlpages_column'];

    $sql = "SELECT $htmlpagescolumn[title],
                   $htmlpagescolumn[content],
                   $htmlpagescolumn[uid],
                   $htmlpagescolumn[printlink]
            FROM $htmlpagestable
            WHERE $htmlpagescolumn[pid] = '" . (int)pnVarPrepForStore($pid) . "'";
    $result = $dbconn->Execute($sql);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        return false;
    }
 
    // Check for no rows found, and if so return
    if ($result->EOF) {
        return false;
    }
 
    // Obtain the item information from the result set
    list($title, $content, $uid, $printlink) = $result->fields;

    $result->Close();

    if (!pnSecAuthAction(0, 'htmlpages::', "$title::$pid", ACCESS_OVERVIEW)) {
        return false;
    }

	// if the parse parameter was true
	// lets get the template source using our custom resource
	if ($parse) {
		$pnRender = new pnRender('htmlpages');
		$pnRender->caching = false;
		$GLOBALS['htmlpagesitem'.$title] =& $content;
		$content = $pnRender->fetch('htmlpagesvar:htmlpagesitem'.$title, $pid, $pid);
	}

    // Create the item array
    $item = array('pid' => $pid,
                  'title' => $title,
                  'content' => $content,
                  'printlink' => $printlink,
                  'uid' => $uid);

    // Return the item array
    return $item;
}
