<?php
// $Id: survey.php,v 1.2 2005/11/07 21:57:30 jazzie Exp $
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
// Purpose of file:  Survey Module for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'survey'; // the name of this php file
	$modversion['mod_name'] = 'Survey'; // the name of the module you are writing this for
	$modversion['multi_output'] = '0'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '0'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.2';
	$modversion['function_name'] = 'latest_survey'; // the name of the function listed below
	$modversion['description'] = 'Latest Survey'; // brief description of this module
	$modversion['author'] = 'foyleman';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

function latest_survey_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/survey.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// clear the output variable
// title of the page to show up
	$output = "<b>"._LATESTSURVEY.":</b><br><br>\n";

// query the database and generate your output in the amount of mod_qty
	$sql = mysql_query("SELECT pn_pollid, pn_title FROM $pntable[poll_desc] 
		ORDER BY pn_pollid DESC limit 1");
	while(list($pn_pollid, $pn_title) = mysql_fetch_row($sql)) {
		$output .= "<a href=\"$nl_url/modules.php?op=modload&name=NS-Polls&file=index&pollID=$pn_pollid\" target=\"_blank\"><b>$pn_title:</b></a><br>\n";
		$sql2 = mysql_query("SELECT pn_optiontext FROM $pntable[poll_data] 
			WHERE pn_pollid = '$pn_pollid' ORDER BY pn_voteid");
		while (list($pn_optiontext) = mysql_fetch_row($sql2)) {
			if($pn_optiontext) {
				$output .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#149; $pn_optiontext<br>";
				}
			}
		}
	$output .= "<br><br>";

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function latest_survey_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/survey.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// clear the output variable
// title of the page to show up
	$output = ""._LATESTSURVEY.":\n\n";

// query the database and generate your output in the amount of mod_qty
	$sql = mysql_query("SELECT pn_pollid, pn_title FROM $pntable[poll_desc] 
		ORDER BY pn_pollid DESC limit 1");
	while(list($pn_pollid, $pn_title) = mysql_fetch_row($sql)) {
		$output .= "$pn_title:\n";
		$sql2 = mysql_query("SELECT pn_optiontext FROM $pntable[poll_data] 
			WHERE pn_pollid = '$pn_pollid' ORDER BY pn_voteid");
		while (list($pn_optiontext) = mysql_fetch_row($sql2)) {
			if($pn_optiontext) {
				$output .= "     - $pn_optiontext\n";
				}
			}
	$output .= "$nl_url/modules.php?op=modload&name=NS-Polls&file=index&pollID=$pn_pollid\n\n";
		}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}

?>