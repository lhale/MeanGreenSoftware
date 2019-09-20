<?php
// ----------------------------------------------------------------------
// Module: pnChangeLog version 1.02
// Author: Cas Nuy
// ----------------------------------------------------------------------
// This module is free software. You can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License.
// ----------------------------------------------------------------------
/**
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */

function pnSSI_init()
{


global $pnconfig;
// Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
// return arrays but we handle them differently.  For pnDBGetConn()
// we currently just want the first item, which is the official
// database handle.  For pnDBGetTables() we want to keep the entire
// tables array together for easy reference later on

list($dbconn) = pnDBGetConn();
$pntable = pnDBGetTables();

$ssitable = $pnconfig[prefix] . "_ssi";

// SSI  table
$sql = "CREATE TABLE $ssitable (uid int(11) ,logon varchar(40), PRIMARY KEY(uid))";
$dbconn->Execute($sql) ;
if ($dbconn->ErrorNo() != 0) {
	pnSessionSetVar('errormsg', _CREATETABLEFAILED);
	pnChangeLog_delete();
	return false;
}

// Initialisation successful
return true;
}

/**
 * delete the module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function pnSSI_delete()
{
global $pnconfig;
list($dbconn) = pnDBGetConn();
$pntable = pnDBGetTables();
$ssitable = $pnconfig[prefix] . "_ssi";
$errors=false;
$sql = "DROP TABLE $ssitable";
$dbconn->Execute($sql);
if ($dbconn->ErrorNo() != 0) {
	$errors=true;
}
if ($errors){
	pnSessionSetVar('errormsg', _DELETEWITHERRORS);
	return false ;
} else {
return true;
}
}
?>