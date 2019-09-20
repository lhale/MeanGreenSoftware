<?php
// $Id: html_insert.php,v 1.2 2005/11/07 21:57:30 jazzie Exp $
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
// Purpose of file:  Text Plugin for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'html_insert'; // the name of this php file
	$modversion['mod_name'] = 'HTML Insert'; // the name of the module you are writing this for
	$modversion['multi_output'] = '0'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '1'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.0';
	$modversion['function_name'] = 'html_insert'; // the name of the function listed below
	$modversion['description'] = 'HTML Insert'; // brief description of this module
	$modversion['author'] = 'foyleman';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

function html_insert_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/html_insert.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
		$mod_data = explode("|", $mod_data);

// clear the output variable
// title of the page to show up
	$output = "";

// each bit of mod_data was stored with | separating them. The data is exploded and numbered as 0,1,2,3...

		$clean_text = str_replace ("\r", "<br>", $mod_data[0]);

		$output .= "<div align=\"justify\">$clean_text</div><br><br>\n";

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function html_insert_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

//	$language = pnConfigGetVar('language');

// name the lang file the same as this file
//	include("modules/$ModName/modules/lang/$language/html_insert.php");

// get the module setting from the database
//	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
//	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
//		$mod_data = explode("|", $mod_data);

// clear the output variable
// title of the page to show up
	$output = "";

// each bit of mod_data was stored with | separating them. The data is exploded and numbered as 0,1,2,3...

//		$clean_text = "$mod_data[0]";

//		$output .= "$mod_data[0]\n\n";

// strip the slashes out all at once
//	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function html_insert_admin($mod_id, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/html_insert.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);
	
// strip the slashes out all at once
	$mod_data = stripslashes($mod_data);

// create the array from the stored variables
	$mod_data = explode("|", $mod_data);


// the admin part
	echo "<table cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\">"._INSERTTHEHTML."</td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\">";

	echo "<textarea cols=\"40\" rows=\"5\" name=\"mod_data[0]\">$mod_data[0]</textarea>";

	echo "</td>\n"
		."</tr>\n"
		."</table>\n"
		."\n";

// send the mod_data to the system (it must be mod_data and not another variable name)
	return $mod_data;
}

?>