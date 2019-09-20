<?php
// $Id: enhsurvey.php,v 1.2 2005/11/07 21:57:30 jazzie Exp $
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
	$modversion['file_name'] = 'enhsurvey'; // the name of this php file
	$modversion['mod_name'] = 'Survey'; // the name of the module you are writing this for
	$modversion['multi_output'] = '0'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '1'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.0';
	$modversion['function_name'] = 'enh_latest_survey'; // the name of the function listed below
	$modversion['description'] = 'Enhanced Latest Survey'; // brief description of this module
	$modversion['author'] = 'foyleman, enhancements by Ozancin';
	$modversion['contact'] = 'http://canvas.anubix.net/';

function enh_latest_survey_init($ModName) {

	$language = pnConfigGetVar('language');

	// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/enhsurvey.php");

	// install common look and feel
	include("modules/$ModName/modules/common/enh.php");

	$data = ""._LATESTSURVEY."|"._BORDERCOLOR_VALUE."|"._BGCOLOR1_VALUE."|"._BGCOLOR2_VALUE."|"._BORDERWIDTH_VALUE."|modules/images/enhsurvey/survey.gif|"._BULLETIMG_VALUE."";

	return $data;
}

	$modversion['mod_data'] .= enh_latest_survey_init($ModName);

// function named as above, in this case the format is for the HTML part of the mailer

function enh_latest_survey_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/survey.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
		$mod_data = explode("|", $mod_data);

	$bordercolor = $mod_data[1];
	$bgcolor1    = $mod_data[2];
	$bgcolor2    = $mod_data[3];
	$border      = $mod_data[4];
	$header      = $mod_data[5];
	$bullet      = $mod_data[6];

	// clear the output variable
	// title of the page to show up
	if($mod_data[0] == '') {
		$output = "";
	} else {
		$output ="<h3>$mod_data[0]</h3>\n";
	}

// query the database and generate your output in the amount of mod_qty
	$sql = mysql_query("SELECT pn_pollid, pn_title FROM $pntable[poll_desc] 
		ORDER BY pn_pollid DESC limit 1");
	while(list($pn_pollid, $pn_title) = mysql_fetch_row($sql)) {

		$output .= "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"$border\" bordercolor=\"$bordercolor\"><tbody><tr><td><table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\"><tbody><tr><td width=\"100%\" bgcolor=\"$bgcolor1\">\n";

		if (!empty($header)) {
			$output .= "<img src=\"$nl_url/modules/$ModName/$header\" border=\"0\">\n";
		}

		$output .= "<table border=\"0\"><tr><td><div align=\"left\"><div align=\"left\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><font style=\"FONT-SIZE: 13px\"><div align=\"right\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\"><tr>\n";
		if (!empty($bullet)) {
			$output .= "<td valign=\"top\"><img border=\"0\" src=\"$nl_url/modules/$ModName/$bullet\" vspace=\"4\"></td>\n";
		}

		$output .= "<td><div align=\"left\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"3\"><tr>\n";

		$output .= "<td><a href=\"$nl_url/modules.php?op=modload&name=NS-Polls&file=index&pollID=$pn_pollid\" target=\"_blank\"><b><font style=\"font-size: 13px\" size=\"4\">$pn_title</font></b></a></td>\n";

		$output .= "</tr></table></div>\n";

		$output .= "<div align=\"left\"> <table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"3\"><tr><font style=\"FONT-SIZE: 11px\">\n";

		$sql2 = mysql_query("SELECT pn_optiontext FROM $pntable[poll_data] 
			WHERE pn_pollid = '$pn_pollid' ORDER BY pn_voteid");
		while (list($pn_optiontext) = mysql_fetch_row($sql2)) {
			if($pn_optiontext) {
				$output .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#149; $pn_optiontext<br>";
			}
		}
	
		$output .= "</font></td>\n";
		
		$output .= "</tr></table></div></td></tr></table></div></font></td></tr></table></div></div></td></tr></table></td></tr></tbody></table></td></tr>\n";

		$output .= "<tr><td align=\"left\" bgcolor=\"$bgcolor2\"><div align=\"left\"><table border=\"0\" width=\"100%\" cellspacing=\"3\" cellpadding=\"3\"><tr>\n";

		$output .= "<td valign=\"middle\"><b><font style=\"FONT-SIZE: 11px\">  </font></b></td>\n";


		$output .= " </tr></table></div></td></tr></tbody></table><br>\n";

	}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function enh_latest_survey_text($mod_id, $nl_url, $ModName) {
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

// function named as above, in this case the format is for the TEXT part of the mailer

function enh_latest_survey_admin($mod_id, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/text.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);
	
// strip the slashes out all at once
	$mod_data = stripslashes($mod_data);

// create the array from the stored variables
	$mod_data = explode("|", $mod_data);


// the admin part
// send the mod_data to the system (it must be mod_data and not another variable name)
	echo "<table cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n";

	echo "<tr>\n"
	."<td align=\"right\" class=\"pn-normal\"><b>"._HEADING.":</b></td>\n"
	."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[0]\" value=\"$mod_data[0]\"></td>\n"
	."</tr>\n";

	echo "<tr>\n";
	echo "<td align=\"right\" class=\"pn-normal\"><b>"._BORDERCOLOR.":</b></td>\n"
	."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[1]\" value=\"$mod_data[1]\"></td>\n"
	."</tr>\n";

	echo "<tr>\n";
		echo "<td align=\"right\" class=\"pn-normal\"><b>"._BGCOLOR1.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[2]\" value=\"$mod_data[2]\"></td></tr>\n";

		echo "<tr>\n";
		echo "<td align=\"right\" class=\"pn-normal\"><b>"._BGCOLOR2.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[3]\" value=\"$mod_data[3]\"></td>\n<tr>";


		echo "<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._BORDERWIDTH.":</b></td>\n"
		."<td class=\"pn-normal\">\n";
		echo "<select name=\"mod_data[4]\">\n"

		."<option value=\"0\"";	
		if ($mod_data[4] == '0') {
			echo " selected";
			}	
		echo ">0</option>\n"
			."<option value=\"1\"";	
		if ($mod_data[4] == '1') {
			echo " selected";
			}	
		echo ">1</option>\n"
			."<option value=\"2\"";	
		if ($mod_data[4] == '2') {
			echo " selected";
			}	
		echo ">2</option>\n"
			."<option value=\"3\"";	
		if ($mod_data[4] == '3') {
			echo " selected";
			}	
		echo ">3</option>\n"
			."<option value=\"4\"";	
		if ($mod_data[4] == '4') {
			echo " selected";
			}	
		echo ">4</option>\n"
			."<option value=\"5\"";	
		if ($mod_data[4] == '5') {
			echo " selected";
			}	
		echo ">5</option>\n"
			."<option value=\"6\"";	
		if ($mod_data[4] == '6') {
			echo " selected";
			}	
		echo ">6</option>\n"
			."<option value=\"7\"";	
		if ($mod_data[4] == '7') {
			echo " selected";
			}	
		echo ">7</option>\n"
			."<option value=\"8\"";	
		if ($mod_data[4] == '8') {
			echo " selected";
			}	
		echo ">8</option>\n"
			."<option value=\"9\"";	
		if ($mod_data[4] == '9') {
			echo " selected";
			}	
		echo ">9</option>\n"
			."<option value=\"10\"";	
		if ($mod_data[4] == '10') {
			echo " selected";
			}	
		echo ">10</option>\n"
			."<option value=\"15\"";	
		if ($mod_data[4] == '15') {
			echo " selected";
			}	
		echo ">15</option>\n"
		."</select>\n"
		."</tr>\n";


		echo "<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._HIMAGE.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[5]\" value=\"$mod_data[5]\"></td></tr>\n";

		echo "<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._BIMAGE.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[6]\" value=\"$mod_data[6]\"></td></tr>\n";
		echo "</tr>\n"
		."</table>\n"
		."\n";

	return $mod_data;
}

?>
