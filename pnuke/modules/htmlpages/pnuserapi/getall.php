<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: getall.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * get all example items
 * @returns array
 * @return array of items, or false on failure
 */
function htmlpages_userapi_getall($args)
{
    //
    extract($args);

    // Optional arguments.
    if (!isset($startnum)) {
        $startnum = 1;
    }
    if (!isset($numitems)) {
        $numitems = -1;
    }

    if ((!isset($startnum)) ||
        (!isset($numitems))) {
        pnSessionSetVar('errormsg', _MODARGSERROR);
        return false;
    }
    
    $items = array();

    // Security check
    if (!pnSecAuthAction(0, 'htmlpages::', '::', ACCESS_OVERVIEW)) {
        return $items;
    }

    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();
    $htmlpagestable = $pntable['htmlpages'];
    $htmlpagescolumn = &$pntable['htmlpages_column'];

    if (!isset($orderby)) {
        $orderby= "$htmlpagescolumn[title]";
    } else {
        $orderby="$htmlpagescolumn[$orderby]";
    }

    if (isset($order) && $order=='DESC') {
        $orderby=$orderby." DESC ";
    }   

	// filter my first letter of page
	if (isset($letter) && !empty($letter)) {
	    $where = "WHERE $htmlpagescolumn[title] LIKE '" . pnVarPrepForStore($letter) . "%'";
	} else {
	    $where = '';
	}

    // Get items 
    $sql = "SELECT $htmlpagescolumn[pid],
                   $htmlpagescolumn[title],                   
                   $htmlpagescolumn[uid],
                   $htmlpagescolumn[timest], 
                   $htmlpagescolumn[printlink]
            FROM $htmlpagestable " . $where .
            " ORDER BY " .$orderby;
    $result = $dbconn->SelectLimit($sql, $numitems, $startnum-1);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETFAILED);
        return false;
    }

    // Put items into result array.  
    for (; !$result->EOF; $result->MoveNext()) {
        list($pid, $title, $uid, $timest,$printlink) = $result->fields;
        if (pnSecAuthAction(0, 'htmlpages::', "$title::$pid", ACCESS_OVERVIEW)) {
            $items[] = array('pid' => $pid,
                             'title' => $title,
                             'uid' => $uid,
                             'timest' => $timest,
                             'printlink' => $printlink);
        }                                  
    }

    $result->Close();

    // Return the items
    return $items;
}
