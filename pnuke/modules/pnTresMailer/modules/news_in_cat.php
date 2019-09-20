<?php
// $Id: news_in_cat.php,v 1.2 2005/11/07 21:57:30 jazzie Exp $
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
// Purpose of file:  News Module for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'news_in_cat'; // the name of this php file
	$modversion['mod_name'] = 'News'; // the name of the module you are writing this for
	$modversion['multi_output'] = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '1'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.1';
	$modversion['function_name'] = 'latest_news_in_cat'; // the name of the function listed below
	$modversion['description'] = 'Latest Articles in a Category'; // brief description of this module
	$modversion['author'] = 'foyleman';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

function latest_news_in_cat_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/news_in_cat.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// strip the slashes out all at once
	$mod_data = stripslashes($mod_data);

// create the array from the stored variables
	$mod_data = explode("|", $mod_data);

// clear the output variable
// title of the page to show up
	if($mod_data[0] == '') {
		$output = "";
		} else {
		$output ="<b>$mod_data[0]:</b><br><br>\n";
		}

// query the database and generate your output in the amount of mod_qty
	$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext FROM $pntable[stories] 
		WHERE pn_catid = '$mod_data[1]' ORDER BY pn_time DESC limit 0,$mod_qty");
	while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext) = mysql_fetch_row($sql)) {
		$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\"><b>$pn_title</b></a><br>\n";
		$output .= "$pn_hometext<br>\n";
		if ($pn_bodytext) {
			$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\">"._READMORE."</a><br>\n";
			}
		$output .= "<br>\n";
		}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function latest_news_in_cat_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/news_in_cat.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// strip the slashes out all at once
	$mod_data = stripslashes($mod_data);

// create the array from the stored variables
	$mod_data = explode("|", $mod_data);

// clear the output variable
// title of the page to show up
	if($mod_data[0] == '') {
		$output = "";
		} else {
		$output ="$mod_data[0]:\n\n";
		}

// query the database and generate your output in the amount of mod_qty
	$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext FROM $pntable[stories] 
		WHERE pn_catid = '$mod_data[1]' ORDER BY pn_time DESC limit 0,$mod_qty");
	while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext) = mysql_fetch_row($sql)) {
		$output .= "$pn_title\n";
		$output .= "$pn_hometext\n";
		if ($pn_bodytext) {
			$output .= ""._READMORE.": $nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\n";
			}
		$output .= "\n";
		}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function latest_news_in_cat_admin($mod_id, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/news_in_cat.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// strip the slashes out all at once
	$mod_data = stripslashes($mod_data);

// create the array from the stored variables
	$mod_data = explode("|", $mod_data);


// the admin part
	$sql = mysql_query("SELECT pn_catid, pn_title FROM $pntable[stories_cat] ORDER BY pn_title");
	$cat_count = mysql_num_rows($sql);

	$locale = pnConfigGetVar('locale');
	setlocale (LC_TIME, '$locale');
	echo "<table cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._HEADING.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[0]\" value=\"$mod_data[0]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._CATEGORY.":</b></td>\n"
		."<td class=\"pn-normal\"><select name=\"mod_data[1]\">";

	while(list($pn_catid, $pn_title) = mysql_fetch_row($sql)) {
		echo "<option value=\"$pn_catid\"";
		if($pn_catid == $mod_data[1]) {
			echo " selected";
			}
		echo ">$pn_title</option>";
		}

	echo "</select></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"></td>\n"
		."<td class=\"pn-normal\"></td>\n"
		."</tr>\n"
		."</table>\n"
		."\n";

// send the mod_data to the system (it must be mod_data and not another variable name)
	return $mod_data;
}

?>