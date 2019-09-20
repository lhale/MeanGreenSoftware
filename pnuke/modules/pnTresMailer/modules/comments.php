<?php
// $Id: comments.php,v 1.2 2005/11/07 21:57:30 jazzie Exp $
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
// Purpose of file:  Comments Module for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'comments'; // the name of this php file
	$modversion['mod_name'] = 'Comments'; // the name of the module you are writing this for
	$modversion['multi_output'] = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '0'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.2';
	$modversion['function_name'] = 'latest_comments'; // the name of the function listed below
	$modversion['description'] = 'Latest Comments'; // brief description of this module
	$modversion['author'] = 'foyleman';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

function latest_comments_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/comments.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// clear the output variable
// title of the page to show up
	$output = "<b>"._LATESTCOMMENTS.":</b><br><br>\n";

// query the database and generate your output in the amount of mod_qty
	$output .= "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
	$output .= "<tr><td></td><td><hr></td></tr>\n";
	$sql = mysql_query("SELECT pn_sid, pn_tid, pn_name, pn_comment FROM $pntable[comments] 
		ORDER BY pn_date DESC limit 0,$mod_qty");
	while(list($pn_sid, $pn_tid, $pn_name, $pn_comment) = mysql_fetch_row($sql)) {
		$output .= "<tr>\n";
		$output .= "<td valign=\"top\" class=\"main\"><a href=\"$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\" target=\"_blank\"><b>$pn_name:</b></a>&nbsp;</td>\n";
		$output .= "<td class=\"main\">$pn_comment<hr></td>\n";
		$output .= "</td>\n";
		$output .= "</tr>\n";
		}
	$output .= "</table>\n";

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function latest_comments_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/comments.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// clear the output variable
// title of the page to show up
	$output = ""._LATESTCOMMENTS.":\n\n";

// query the database and generate your output in the amount of mod_qty
	$output .= "-----------------------------------------------\n";
	$sql = mysql_query("SELECT pn_sid, pn_tid, pn_name, pn_comment FROM $pntable[comments] 
		ORDER BY pn_date DESC limit 0,$mod_qty");
	while(list($pn_sid, $pn_tid, $pn_name, $pn_comment) = mysql_fetch_row($sql)) {
		$output .= "$pn_name:\n";
		$output .= "$pn_comment\n";
		$output .= "$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\n";
		$output .= "-----------------------------------------------\n";
		}
	$output .= "\n";

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}

?>