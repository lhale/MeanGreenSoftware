<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: pninit.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * initialise the htmlpages module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function htmlpages_init()
{
    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();
    $htmlpagestable = $pntable['htmlpages'];
    $htmlpagescolumn = $pntable['htmlpages_column'];
    $dict = NewDataDictionary($dbconn);
    $taboptarray = pnDBGetTableOptions();

    $flds = "$htmlpagescolumn[pid] I AUTO NOTNULL PRIMARY,
             $htmlpagescolumn[uid] I NOTNULL DEFAULT '0',
             $htmlpagescolumn[title] C(128) NOTNULL DEFAULT '',
             $htmlpagescolumn[content] X2 NOTNULL,
             $htmlpagescolumn[timest] T DEFTIMESTAMP,
             $htmlpagescolumn[printlink] L NOTNULL DEFAULT '0'";
    $sqlarray = $dict->CreateTableSQL($htmlpagestable, $flds, $taboptarray);

    if ($dict->ExecuteSQLArray($sqlarray) != 2) {
        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
        return false;
    }

	// set module vars
	pnModSetVar('htmlpages', 'itemsperpage', 10);

    return true;
}

function htmlpages_upgrade($oldversion)
{
    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();
    $htmlpagestable = $pntable['htmlpages'];
    $htmlpagescolumn = $pntable['htmlpages_column'];
    $dict = NewDataDictionary($dbconn);

    // apply a table transform
    $flds = "$htmlpagescolumn[pid] I AUTO NOTNULL PRIMARY,
             $htmlpagescolumn[uid] I NOTNULL DEFAULT '0',
             $htmlpagescolumn[title] C(128) NOTNULL DEFAULT '',
             $htmlpagescolumn[content] X2 NOTNULL DEFAULT '',
             $htmlpagescolumn[timest] T DEFTIMESTAMP,
             $htmlpagescolumn[printlink] L NOTNULL DEFAULT '0'";
    $sqlarray = $dict->ChangeTableSQL($htmlpagestable, $flds);
    if ($dict->ExecuteSQLArray($sqlarray) != 2) {
        pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
        return false;
    }

    // Upgrade dependent on old version number
    switch($oldversion) {
        case 1.0:
            return htmlpages_upgrade('1.1');

        case 1.1:
            return htmlpages_upgrade('1.11');
        case 1.11:
			// version 1.11 didn't have the items per page module var
			pnModSetVar('htmlpages', 'itemsperpage', 10);
            return htmlpages_upgrade('2.01');
		case 1.5:
		case 2.0:
		case 2.01:
			break;
    }

    // Update successful
    return true;
}

/**
 * delete the htmlpages module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function htmlpages_delete()
{
    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();
    $htmlpagestable = $pntable['htmlpages'];

    // New Object DataDictionary
    $dict = NewDataDictionary($dbconn);
    $sqlarray = $dict->DropTableSQL($htmlpagestable);
    if ($dict->ExecuteSQLArray($sqlarray) != 2) {
        pnSessionSetVar('errormsg', _DELETETABLEFAILED);
        // Report failed deletion attempt
        return false;
    }

	// delete modular vars
	pnModDelVar('htmlpages');

    // Deletion successful
    return true;
}
