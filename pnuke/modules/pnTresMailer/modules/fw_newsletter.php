<?php
// $Id: fw_newsletter.php,v 1.2 2005/11/07 21:57:30 jazzie Exp $
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
	$modversion['file_name'] = 'fw_newsletter'; // the name of this php file
	$modversion['mod_name'] = 'pnTresMailer'; // the name of the module you are writing this for
	$modversion['multi_output'] = '0'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '1'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.2';
	$modversion['function_name'] = 'fw_newsletter'; // the name of the function listed below
	$modversion['description'] = 'Forward This Newsletter'; // brief description of this module
	$modversion['author'] = 'foyleman';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

function fw_newsletter_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/fw_newsletter.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
		$mod_data = explode("|", $mod_data);

// clear the output variable
// title of the page to show up
	if($mod_data[0] == '') {
		$output = "";
		} else {
		$output ="<b>$mod_data[0]:</b><br><br>\n";
		}

// each bit of mod_data was stored with | separating them. The data is exploded and numbered as 0,1,2,3...

		$fwtext = str_replace ("\r", "<br>", $mod_data[1]);

		$sql = mysql_query("SELECT arch_mid FROM $prefix"._nl_archive." ORDER BY arch_mid DESC LIMIT 1");
		list($arch_mid) = mysql_fetch_row($sql);
		$arch_mid = ($arch_mid + 1); // add 1 since it hasn't been stored yet

		$sql = mysql_query("SELECT nl_url FROM $prefix"._nl_var."");
		list($nl_url) = mysql_fetch_row($sql);

	    $output .= "<form action=\"$nl_url/modules.php\" method=\"post\">";
		$output .= "<input type=\"hidden\" name=\"op\" value=\"modload\">";
		$output .= "<input type=\"hidden\" name=\"name\" value=\"$ModName\">";
		$output .= "<input type=\"hidden\" name=\"file\" value=\"forward\">";

		if($mod_data[2] == '1') {
			$output .= "<input type=\"hidden\" name=\"req\" value=\"Sub\">";
			} else {
			$output .= "<input type=\"hidden\" name=\"req\" value=\"Fwd\">";
			}

		$output .= "<input type=\"hidden\" name=\"arch_mid\" value=\"$arch_mid\">";

		$output .= "<div align=\"justify\">$fwtext</div>\n";

		$output .= ""._FWDNAME.": <input type=\"text\" name=\"sub_name\">";
		$output .= " "._FWDEMAIL.": <input type=\"text\" name=\"sub_email\">";
		$output .= " <input type=\"submit\" value=\""._FWDSEND."\"></form><br><br>\n";

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function fw_newsletter_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

//	$language = pnConfigGetVar('language');

// name the lang file the same as this file
//	include("modules/$ModName/modules/lang/$language/fw_newsletter.php");

// get the module setting from the database
//	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
//	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
//		$mod_data = explode("|", $mod_data);

// clear the output variable
// title of the page to show up
//	if($mod_data[0] == '') {
		$output = "";
//		} else {
//		$output ="<b>$mod_data[0]:</b><br><br>\n";
//		}

// each bit of mod_data was stored with | separating them. The data is exploded and numbered as 0,1,2,3...

//		$fwtext = str_replace ("\r", "<br>", $mod_data[1]);

//		$output .= "<div align=\"justify\">$fwtext</div><br><br>\n";

// strip the slashes out all at once
//	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function fw_newsletter_admin($mod_id, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/fw_newsletter.php");

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
		."<td align=\"center\" class=\"pn-normal\"><b>"._HEADING.":</b> <input type=\"text\" name=\"mod_data[0]\" value=\"$mod_data[0]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\">"._FWTEXT."</td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\">"
		."<textarea cols=\"40\" rows=\"5\" name=\"mod_data[1]\">$mod_data[1]</textarea>"
		."</td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\"><b>"._ADDTOSUB.":</b> <input type=\"radio\" name=\"mod_data[2]\" value=\"1\"";
	if($mod_data[2] == '1') {
		echo " checked";
		}
	echo "> Yes <input type=\"radio\" name=\"mod_data[2]\" value=\"0\"";
	if($mod_data[2] == '0' OR !$mod_data[2]) {
		echo " checked";
		}
	echo "> No</td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\">"._NOTEXTVERSION."</td>\n"
		."</tr>\n"
		."</table>\n"
		."\n";

// send the mod_data to the system (it must be mod_data and not another variable name)
	return $mod_data;
}

?>