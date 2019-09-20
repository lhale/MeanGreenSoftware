<?php
// $Id: downloads.php,v 1.2 2005/11/07 21:57:30 jazzie Exp $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WIthOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: foyleman
// Purpose of file:  Downloads Module for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'downloads'; // the name of this php file
	$modversion['mod_name'] = 'Downloads'; // the name of the module you are writing this for
	$modversion['multi_output'] = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '0'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.2';
	$modversion['function_name'] = 'latest_downloads'; // the name of the function listed below
	$modversion['description'] = 'Latest Downloads'; // brief description of this module
	$modversion['author'] = 'foyleman';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

function latest_downloads_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/downloads.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// clear the output variable
// title of the page to show up
	$output = "<b>"._LATESTDOWNLOADS.":</b><br><br>\n";

// query the database and generate your output in the amount of mod_qty
	$sql = mysql_query("SELECT pn_lid, pn_title, pn_description, pn_filesize FROM $pntable[downloads_downloads] 
		ORDER BY pn_date DESC limit 0,$mod_qty");
	while(list($pn_lid, $pn_title, $pn_description, $pn_filesize) = mysql_fetch_row($sql)) {
		$output .= "<a href=\"$nl_url/modules.php?op=modload&name=Downloads&file=index&req=viewdownloaddetails&lid=$pn_lid&ttitle=$pn_title\" target=\"_blank\"><b>$pn_title</b></a><br>\n";
		$output .= "$pn_description<br>\n";
		$output .= ""._FILESIZE.": $pn_filesize "._BYTES."<br><br>\n";
		}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function latest_downloads_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/downloads.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// clear the output variable
// title of the page to show up
	$output = ""._LATESTDOWNLOADS.":\n\n";

// query the database and generate your output in the amount of mod_qty
	$sql = mysql_query("SELECT pn_lid, pn_title, pn_description, pn_filesize FROM $pntable[downloads_downloads] 
		ORDER BY pn_date DESC limit 0,$mod_qty");
	while(list($pn_lid, $pn_title, $pn_description, $pn_filesize) = mysql_fetch_row($sql)) {
		$output .= "$pn_title\n";
		$output .= "$pn_description\n";
		$output .= "$nl_url/modules.php?op=modload&name=Downloads&file=index&req=viewdownloaddetails&lid=$pn_lid&ttitle=$pn_title\n";
		$output .= ""._FILESIZE.": $pn_filesize "._BYTES."\n\n";
		}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}

?>