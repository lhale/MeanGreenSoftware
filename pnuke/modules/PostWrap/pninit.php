<?php
// ----------------------------------------------------------------------
// Copyright (c) 2002-2004 Shawn McKenzie
// http://spidean.mckenzies.net
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

function PostWrap_init()
{
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();
	
    $urltable = $pntable['postwrap_url'];
	$urlcolumn = &$pntable['postwrap_url_column'];
	
    $sql = "CREATE TABLE $urltable (
            $urlcolumn[id] int(11) NOT NULL auto_increment,
            $urlcolumn[name] varchar(255) NOT NULL default '',
			$urlcolumn[alias] varchar(50) NOT NULL default '',
			$urlcolumn[reg_user_only] tinyint(2) default NULL,
			$urlcolumn[open_direct] tinyint(2) default NULL,
			$urlcolumn[use_fixed_title] tinyint(2) default NULL,
			$urlcolumn[auto_resize] tinyint(2) default NULL,
			$urlcolumn[vsize] int(50) default NULL,
			$urlcolumn[hsize] varchar(5) default NULL,
            PRIMARY KEY(id))";

    $dbconn->Execute($sql);
	
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
        return false;
    }	
	pnModSetVar('PostWrap', 'allow_local_only', "0");	// 1 = display off-site pages, 0 = NO display off-site pages 0*
	pnModSetVar('PostWrap', 'no_user_entry', "0");		// 1 = allow input from browser address bar, 0 = NOT allow input from browser address bar 0*
	pnModSetVar('PostWrap', 'open_direct', "0");		// 0 = NO $open_direct_msg link display, 1 = $open_direct_msg link display	0*
	pnModSetVar('PostWrap', 'use_fixed_title', "0");	// 0 = NO title from $title_msg or ptitle, 1 = title from $title_msg or ptitle 0*
	pnModSetVar('PostWrap', 'auto_resize', "1");		// 0 = default size
	pnModSetVar('PostWrap', 'vsize', "600");			// set to height of screen size for loaded window 600*
	pnModSetVar('PostWrap', 'hsize', "100%");			// set to width of screen size for loaded window 100%*
	pnModSetVar('PostWrap', 'security', "1");			// 0 = NO check with DB, 1 = check with DB) 1*
	
	return true;
}
 
function PostWrap_upgrade($oldversion)
{
	switch($oldversion) {
	
        case "2.0":
        case "2.01":
	        list($dbconn) = pnDBGetConn();
		    $pntable = pnDBGetTables();
			
			$urltable = $pntable['postwrap_url'];
			$urlcolumn = &$pntable['postwrap_url_column'];
			
		    $sql = "ALTER TABLE $urltable
					ADD $urlcolumn[hsize] hsize VARCHAR( 5 ) NULL
					AFTER $urlcolumn[vsize] vsize";

		    $dbconn->Execute($sql);
			
		    if ($dbconn->ErrorNo() != 0) {
		        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
		        return false;
		    }			
			pnModSetVar('PostWrap', 'hsize', "100%");
			pnModDelVar('PostWrap', 'default_size');
			pnModDelVar('PostWrap', 'use_auth_hosts');
			pnModDelVar('PostWrap', 'use_buffering');
	        pnModDelVar('PostWrap', 'use_compression');
	        pnModDelVar('PostWrap', 'reg_user_only');
	        pnModDelVar('PostWrap', 'auto_resize_type');
	        pnModDelVar('PostWrap', 'auto_resize_trim');
	        pnModDelVar('PostWrap', 'table_borders');
	        pnModDelVar('PostWrap', 'full_screen');
		break;
		
		case "2.1":
			pnModDelVar('PostWrap', 'default_size');
			pnModDelVar('PostWrap', 'use_auth_hosts');
			pnModDelVar('PostWrap', 'use_buffering');
	        pnModDelVar('PostWrap', 'use_compression');
	        pnModDelVar('PostWrap', 'reg_user_only');
	        pnModDelVar('PostWrap', 'auto_resize_type');
	        pnModDelVar('PostWrap', 'auto_resize_trim');
	        pnModDelVar('PostWrap', 'table_borders');
	        pnModDelVar('PostWrap', 'full_screen');		
		break;
		
		default:
		    PostWrap_init();
		break;
	}
	return true;
}

function PostWrap_delete()
{
    pnModDelVar('PostWrap', 'allow_local_only');
	pnModDelVar('PostWrap', 'no_user_entry');
	pnModDelVar('PostWrap', 'open_direct');
	pnModDelVar('PostWrap', 'use_fixed_title');
	pnModDelVar('PostWrap', 'auto_resize');
	pnModDelVar('PostWrap', 'vsize');
	pnModDelVar('PostWrap', 'hsize');
	pnModDelVar('PostWrap', 'security', "1");

	list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();
    $urltable = $pntable['postwrap_url'];
		
	$sql = "DROP TABLE $urltable";
	$dbconn->Execute($sql);
	
	if ($dbconn->ErrorNo() != 0) {
		pnSessionSetVar('errormsg', _DELETETABLEFAILED);
		return false;
	}
	return true;
}

?>
