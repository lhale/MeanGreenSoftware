<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: countitems.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * utility function to count the uid of items held by this module
 * @returns integer
 * @return uid of items held by this module
 */
function htmlpages_userapi_countitems()
{
    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();
    $htmlpagestable = $pntable['htmlpages'];
    $htmlpagescolumn = &$pntable['htmlpages_column'];

	// filter my first letter of page
	if (isset($letter) && !empty($letter)) {
	    $where = "WHERE $htmlpagescolumn[title] LIKE '" . pnVarPrepForStore($letter) . "%'";
	} else {
	    $where = '';
	}

    // Get item
    $sql = "SELECT COUNT(1)
            FROM $htmlpagestable " .$where;
    $result = $dbconn->Execute($sql);

    // Check for an error with the database code
    if ($dbconn->ErrorNo() != 0) {
        return false;
    }

    // Obtain the uid of items
    list($numitems) = $result->fields;

    $result->Close();

    // Return the uid of items
    return $numitems;
}
