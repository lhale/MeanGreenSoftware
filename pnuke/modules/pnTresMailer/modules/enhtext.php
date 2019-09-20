<?php
// $Id: enhtext.php,v 1.1 2005/10/27 21:05:58 bamm Exp $
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
// Purpose of file:  Disclaimer Plugin for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'enhtext'; // the name of this php file
	$modversion['mod_name'] = 'Text'; // the name of the module you are writing this for
	$modversion['multi_output'] = '0'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '1'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.0';
	$modversion['function_name'] = 'enhtext'; // the name of the function listed below
	$modversion['description'] = 'Ehanced Text'; // brief description of this module
	$modversion['author'] = 'Ozancin';
	$modversion['contact'] = 'http://www.symantec.com/';

function enhtext_init($ModName) {

	$language = pnConfigGetVar('language');

	// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/enhtext.php");

	// install common look and feel
	include("modules/$ModName/modules/common/enh.php");

	$data = ""._LATESTMESSAGE."|<emtpy>|"._BORDERCOLOR_VALUE."|"._BGCOLOR1_VALUE."|"._BGCOLOR2_VALUE."|"._BORDERWIDTH_VALUE."|modules/images/enhtext/message.gif|"._BULLETIMG_VALUE."";

	return $data;
}

	$modversion['mod_data'] .= enhtext_init($ModName);

// function named as above, in this case the format is for the HTML part of the mailer

function enhtext_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/text.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
		$mod_data = explode("|", $mod_data);

	$bordercolor = $mod_data[2];
	$bgcolor1    = $mod_data[3];
	$bgcolor2    = $mod_data[4];
	$border      = $mod_data[5];
	$header      = $mod_data[6];
	$bullet      = $mod_data[7];

	// clear the output variable
	// title of the page to show up
	if($mod_data[0] == '') {
		$output = "";
	} else {
		$output ="<h3>$mod_data[0]</h3>\n";
	}

	$clean_text = str_replace ("\r", "<br>", $mod_data[1]);

		$output .= "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"$border\" bordercolor=\"$bordercolor\"><tbody><tr><td><table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\"><tbody><tr><td width=\"100%\" bgcolor=\"$bgcolor1\">\n";

		if (!empty($header)) {
			$output .= "<img src=\"$nl_url/modules/$ModName/$header\" border=\"0\">\n";
		}

		$output .= "<table border=\"0\"><tr><td><div align=\"left\"><div align=\"left\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><font style=\"FONT-SIZE: 13px\"><div align=\"right\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"3\"><tr>\n";
		if (!empty($bullet)) {
			$output .= "<td valign=\"top\"><img border=\"0\" src=\"$nl_url/modules/$ModName/$bullet\"></td>\n";
		}

		$output .= "<td><font style=\"FONT-SIZE: 11px\">$clean_text</font></td>\n";

		$output .= "</tr></table></div></font></td></tr></table></div></div></td></tr></table></td></tr></tbody></table></td></tr>\n";

		$output .= "<tr><td align=\"left\" bgcolor=\"$bgcolor2\"><div align=\"left\"><table border=\"0\" width=\"100%\" cellspacing=\"3\" cellpadding=\"3\"><tr>\n";

		$output .= "<td valign=\"middle\"><b><font style=\"FONT-SIZE: 11px\">  </font></b></td>\n";


		$output .= " </tr></table></div></td></tr></tbody></table><br>\n";


// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function enhtext_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/text.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
		$mod_data = explode("|", $mod_data);

// clear the output variable
// title of the page to show up
	$output = "";

// each bit of mod_data was stored with | separating them. The data is exploded and numbered as 0,1,2,3...

		$output .= "$mod_data[0]\n\n";
		$output .= "$mod_data[1]";

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function enhtext_admin($mod_id, $ModName) {
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
	echo "<table cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
	."<tr><td align=\"right\" class=\"pn-normal\"><b>"._HEADING.":</b></td><td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[0]\" value=\"$mod_data[0]\"></td></tr>\n";

	echo "<tr><td align=\"right\" class=\"pn-normal\"><b>"._MESSAGE.":</b></td><td align=\"center\" class=\"pn-normal\"><textarea cols=\"40\" rows=\"5\" name=\"mod_data[1]\">$mod_data[1]</textarea></td></tr>\n";

	echo "<tr>\n";
	echo "<td align=\"right\" class=\"pn-normal\"><b>"._BORDERCOLOR.":</b></td>\n"
	."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[2]\" value=\"$mod_data[2]\"></td>\n"
	."</tr>\n";

	echo "<tr>\n";
		echo "<td align=\"right\" class=\"pn-normal\"><b>"._BGCOLOR1.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[3]\" value=\"$mod_data[3]\"></td></tr>\n";

		echo "<tr>\n";
		echo "<td align=\"right\" class=\"pn-normal\"><b>"._BGCOLOR2.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[4]\" value=\"$mod_data[4]\"></td>\n<tr>";


		echo "<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._BORDERWIDTH.":</b></td>\n"
		."<td class=\"pn-normal\">\n";
		echo "<select name=\"mod_data[5]\">\n"

		."<option value=\"0\"";	
		if ($mod_data[5] == '0') {
			echo " selected";
			}	
		echo ">0</option>\n"
			."<option value=\"1\"";	
		if ($mod_data[5] == '1') {
			echo " selected";
			}	
		echo ">1</option>\n"
			."<option value=\"2\"";	
		if ($mod_data[5] == '2') {
			echo " selected";
			}	
		echo ">2</option>\n"
			."<option value=\"3\"";	
		if ($mod_data[5] == '3') {
			echo " selected";
			}	
		echo ">3</option>\n"
			."<option value=\"4\"";	
		if ($mod_data[5] == '4') {
			echo " selected";
			}	
		echo ">4</option>\n"
			."<option value=\"5\"";	
		if ($mod_data[5] == '5') {
			echo " selected";
			}	
		echo ">5</option>\n"
			."<option value=\"6\"";	
		if ($mod_data[5] == '6') {
			echo " selected";
			}	
		echo ">6</option>\n"
			."<option value=\"7\"";	
		if ($mod_data[5] == '7') {
			echo " selected";
			}	
		echo ">7</option>\n"
			."<option value=\"8\"";	
		if ($mod_data[5] == '8') {
			echo " selected";
			}	
		echo ">8</option>\n"
			."<option value=\"9\"";	
		if ($mod_data[5] == '9') {
			echo " selected";
			}	
		echo ">9</option>\n"
			."<option value=\"10\"";	
		if ($mod_data[5] == '10') {
			echo " selected";
			}	
		echo ">10</option>\n"
			."<option value=\"15\"";	
		if ($mod_data[5] == '15') {
			echo " selected";
			}	
		echo ">15</option>\n"
		."</select>\n"
		."</tr>\n";


		echo "<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._HIMAGE.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[6]\" value=\"$mod_data[6]\"></td></tr>\n";

		echo "<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._BIMAGE.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[7]\" value=\"$mod_data[7]\"></td></tr>\n";
		echo "</tr>\n"
		."</table>\n"
		."\n";


// send the mod_data to the system (it must be mod_data and not another variable name)
	return $mod_data;
}

?>
