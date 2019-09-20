<?php
// $Id: enhcommentssince.php,v 1.2 2005/11/07 21:57:30 jazzie Exp $
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
// Purpose of file:  plugin for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'enhcommentssince'; // the name of this php file
	$modversion['mod_name'] = 'Comments'; // the name of the module you are writing this for
	$modversion['multi_output'] = '0'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '1'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.0';
	$modversion['function_name'] = 'enhcomments_since'; // the name of the function listed below
	$modversion['description'] = 'Enhanced Comments Since'; // brief description of this module
	$modversion['author'] = 'foyleman';
	$modversion['contact'] = 'http://canvas.anubix.net/';

// Initialize variables

	// $modversion['mod_data'] = "Latest Comments|0| | |#800000|#080000|#080000|1|modules/images/enhcommentssince/comments.gif|modules/images/enhnews/off.gif";

function enhcomments_since_init($ModName) {

	$language = pnConfigGetVar('language');

	// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/enhcommentssince.php");

	// install common look and feel
	include("modules/$ModName/modules/common/enh.php");

	$data = ""._LATESTCOMMENTS."|0| | |"._BORDERCOLOR_VALUE."|"._BGCOLOR1_VALUE."|"._BGCOLOR2_VALUE."|"._BORDERWIDTH_VALUE."|modules/images/enhcommentssince/comments.gif|"._BULLETIMG_VALUE."";

	return $data;
}

	$modversion['mod_data'] .= enhcomments_since_init($ModName);


// format the output

function enhcomments_since_formatOutput($mod_data, $sql, $nl_url, $ModName) {

	$bordercolor = $mod_data[4];
	$bgcolor1    = $mod_data[5];
	$bgcolor2    = $mod_data[6];
	$border      = $mod_data[7];
	$header      = $mod_data[8];
	$bullet      = $mod_data[9];

	$check_for_news = mysql_num_rows($sql);
	if($check_for_news == 0) {
		// if there is no news to report, then stop
		return;
	}

	// clear the output variable
	// title of the page to show up
	if($mod_data[0] == '') {
		$output = "";
	} else {
		$output ="<h3>$mod_data[0]</h3>\n";
	}

	while(list($pn_sid, $pn_tid, $pn_date, $pn_name, $pn_email, $pn_subject, $pn_comment) = mysql_fetch_row($sql)) {

		$output .= "<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"$border\" bordercolor=\"$bordercolor\"><tbody><tr><td><table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\"><tbody><tr><td width=\"100%\" bgcolor=\"$bgcolor1\">\n";

		if (!empty($header)) {
			$output .= "<img src=\"$nl_url/modules/$ModName/$header\" border=\"0\">\n";
		}

		$output .= "<table border=\"0\"><tr><td><div align=\"left\"><div align=\"left\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><font style=\"FONT-SIZE: 13px\"><div align=\"right\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\"><tr>\n";
		if (!empty($bullet)) {
			$output .= "<td valign=\"top\"><img border=\"0\" src=\"$nl_url/modules/$ModName/$bullet\" vspace=\"4\"></td>\n";
		}

		$output .= "<td><div align=\"left\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"3\"><tr>\n";

		$output .= "<td><a href=\"$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\" target=\"_blank\"><b><font style=\"font-size: 13px\" size=\"4\">$pn_subject</font></b></a></td>\n";

		$output .= "</tr></table></div>\n";

		$output .= "<div align=\"left\"> <table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"3\"><tr>\n";

		$output .= "<td><font style=\"FONT-SIZE: 11px\">$pn_comment</font>\n";
		$output .= "</td>\n";
		
		$output .= "</tr></table></div></td></tr></table></div></font></td></tr></table></div></div></td></tr></table></td></tr></tbody></table></td></tr>\n";

		$output .= "<tr><td align=\"left\" bgcolor=\"$bgcolor2\"><div align=\"left\"><table border=\"0\" width=\"100%\" cellspacing=\"3\" cellpadding=\"3\"><tr>\n";

		$output .= "<td valign=\"middle\"><b><font style=\"FONT-SIZE: 11px\">"._POSTEDBY.": <a href=\"mailto:$pn_email\">$pn_name</a> "._ON." $pn_date</font></b></td>\n";

		$output .= " </tr></table></div></td></tr></tbody></table><br>\n";

	}
	return $output;
}


// function named as above, in this case the format is for the HTML part of the mailer

function enhcomments_since_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/enhcommentssince.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
	$mod_data = explode("|", $mod_data);

// query the database and generate your output in the amount of mod_qty
	if($mod_data[1] == 1) {
		// news last week
		$date = mktime();
		$date = strtotime('-7 day',$date);
		$date = date("Y-m-d H:i:s",$date);
		$sql = mysql_query("SELECT pn_sid, pn_tid, pn_date, pn_name, pn_email, pn_subject, pn_comment FROM $pntable[comments] 
			WHERE pn_date >= '$date' ORDER BY pn_date DESC");

		$output .= enhcomments_since_formatOutput($mod_data, $sql, $nl_url, $ModName);

	} elseif($mod_data[1] == 2) {
		// news last month
		$date = mktime();
		$date = strtotime('-1 month',$date);
		$date = date("Y-m-d H:i:s",$date);
		$sql = mysql_query("SELECT pn_sid, pn_tid, pn_date, pn_name, pn_email, pn_subject, pn_comment FROM $pntable[comments] 
			WHERE pn_date >= '$date' ORDER BY pn_date DESC");

		$output .= enhcomments_since_formatOutput($mod_data, $sql, $nl_url, $ModName);

	} elseif($mod_data[1] == 3) {
		// news since date
		$oldest_date = $mod_data[2];
		$sql = mysql_query("SELECT pn_sid, pn_tid, pn_date, pn_name, pn_email, pn_subject, pn_comment FROM $pntable[comments] 
			WHERE pn_date >= '$oldest_date' ORDER BY pn_date DESC");

		$output .= enhcomments_since_formatOutput($mod_data, $sql, $nl_url, $ModName);

	} elseif($mod_data[1] == 4) {
		// news between dates
		$oldest_date = $mod_data[2];
		$newest_date = $mod_data[3];
		$sql = mysql_query("SELECT pn_sid, pn_tid, pn_date, pn_name, pn_email, pn_subject, pn_comment FROM $pntable[comments] 
			WHERE pn_date >= '$oldest_date' AND pn_date <= '$newest_date' ORDER BY pn_date DESC");

		$output .= enhcomments_since_formatOutput($mod_data, $sql, $nl_url, $ModName);

	} else {
		// news since last newsletter
		$sql = mysql_query("SELECT arch_date FROM $prefix"._nl_archive." ORDER BY arch_date DESC limit 1");
		list($arch_date) = mysql_fetch_row($sql);
		$arch_date = date("Y-m-d H:i:s",$arch_date);
		$sql = mysql_query("SELECT pn_sid, pn_tid, pn_date, pn_name, pn_email, pn_subject, pn_comment FROM $pntable[comments] 
			WHERE pn_date > '$arch_date' ORDER BY pn_date DESC");

		$output .= enhcomments_since_formatOutput($mod_data, $sql, $nl_url, $ModName);

	}

	// strip the slashes out all at once
	$output = stripslashes($output);

	// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function enhcomments_since_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/enhcommentssince.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
		$mod_data = explode("|", $mod_data);

// query the database and generate your output in the amount of mod_qty
	if($mod_data[1] == 1) {
// news last week
		$date = mktime();
		$date = strtotime('-7 day',$date);
		$date = date("Y-m-d H:i:s",$date);
		$sql = mysql_query("SELECT pn_sid, pn_tid, pn_name, pn_email, pn_subject, pn_comment FROM $pntable[comments] 
			WHERE pn_date >= '$date' ORDER BY pn_date DESC");

		$check_for_news = mysql_num_rows($sql);
		if($check_for_news == 0) {
			// if there is no news to report, then stop
			return;
			}

// clear the output variable
// title of the page to show up
	if($mod_data[0] == '') {
		$output = "";
		} else {
		$output ="$mod_data[0]:\n\n";
		}

		$output .= "-----------------------------------------------\n";
		while(list($pn_sid, $pn_tid, $pn_name, $pn_comment) = mysql_fetch_row($sql)) {
			$output .= "$pn_name:\n";
			$output .= "$pn_comment\n";
			$output .= "$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\n";
			$output .= "-----------------------------------------------\n";
			}
		$output .= "\n";

		} elseif($mod_data[1] == 2) {
// news last month
		$date = mktime();
		$date = strtotime('-1 month',$date);
		$date = date("Y-m-d H:i:s",$date);
		$sql = mysql_query("SELECT pn_sid, pn_tid, pn_name, pn_comment FROM $pntable[comments] 
			WHERE pn_date >= '$date' ORDER BY pn_date DESC");

		$check_for_news = mysql_num_rows($sql);
		if($check_for_news == 0) {
			// if there is no news to report, then stop
			return;
			}

// clear the output variable
// title of the page to show up
	if($mod_data[0] == '') {
		$output = "";
		} else {
		$output ="$mod_data[0]:\n\n";
		}

		$output .= "-----------------------------------------------\n";
		while(list($pn_sid, $pn_tid, $pn_name, $pn_comment) = mysql_fetch_row($sql)) {
			$output .= "$pn_name:\n";
			$output .= "$pn_comment\n";
			$output .= "$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\n";
			$output .= "-----------------------------------------------\n";
			}
		$output .= "\n";

		} elseif($mod_data[1] == 3) {
// news since date
		$oldest_date = $mod_data[2];
		$sql = mysql_query("SELECT pn_sid, pn_tid, pn_name, pn_comment FROM $pntable[comments] 
			WHERE pn_date >= '$oldest_date' ORDER BY pn_date DESC");

		$check_for_news = mysql_num_rows($sql);
		if($check_for_news == 0) {
			// if there is no news to report, then stop
			return;
			}

// clear the output variable
// title of the page to show up
	if($mod_data[0] == '') {
		$output = "";
		} else {
		$output ="$mod_data[0]:\n\n";
		}

		$output .= "-----------------------------------------------\n";
		while(list($pn_sid, $pn_tid, $pn_name, $pn_comment) = mysql_fetch_row($sql)) {
			$output .= "$pn_name:\n";
			$output .= "$pn_comment\n";
			$output .= "$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\n";
			$output .= "-----------------------------------------------\n";
			}
		$output .= "\n";

		} elseif($mod_data[1] == 4) {
// news between dates
		$oldest_date = $mod_data[2];
		$newest_date = $mod_data[3];
		$sql = mysql_query("SELECT pn_sid, pn_tid, pn_name, pn_comment FROM $pntable[comments] 
			WHERE pn_date >= '$oldest_date' AND pn_date <= '$newest_date' ORDER BY pn_date DESC");

		$check_for_news = mysql_num_rows($sql);
		if($check_for_news == 0) {
			// if there is no news to report, then stop
			return;
			}

// clear the output variable
// title of the page to show up
	if($mod_data[0] == '') {
		$output = "";
		} else {
		$output ="$mod_data[0]:\n\n";
		}

		$output .= "-----------------------------------------------\n";
		while(list($pn_sid, $pn_tid, $pn_name, $pn_comment) = mysql_fetch_row($sql)) {
			$output .= "$pn_name:\n";
			$output .= "$pn_comment\n";
			$output .= "$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\n";
			$output .= "-----------------------------------------------\n";
			}
		$output .= "\n";

		} else {
// news since last newsletter
		$sql = mysql_query("SELECT arch_date FROM $prefix"._nl_archive." ORDER BY arch_date DESC limit 1");
		list($arch_date) = mysql_fetch_row($sql);
		$arch_date = date("Y-m-d H:i:s",$arch_date);
		$sql = mysql_query("SELECT pn_sid, pn_tid, pn_name, pn_comment FROM $pntable[comments] 
			WHERE pn_date > '$arch_date' ORDER BY pn_date DESC");

		$check_for_news = mysql_num_rows($sql);
		if($check_for_news == 0) {
			// if there is no news to report, then stop
			return;
			}

// clear the output variable
// title of the page to show up
	if($mod_data[0] == '') {
		$output = "";
		} else {
		$output ="$mod_data[0]:\n\n";
		}

		$output .= "-----------------------------------------------\n";
		while(list($pn_sid, $pn_tid, $pn_name, $pn_comment) = mysql_fetch_row($sql)) {
			$output .= "$pn_name:\n";
			$output .= "$pn_comment\n";
			$output .= "$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\n";
			$output .= "-----------------------------------------------\n";
			}
		$output .= "\n";

		}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function enhcomments_since_admin($mod_id, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/enhcommentssince.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);
	
// strip the slashes out all at once
	$mod_data = stripslashes($mod_data);

// create the array from the stored variables
	$mod_data = explode("|", $mod_data);


// the admin part
	$locale = pnConfigGetVar('locale');

	setlocale (LC_TIME, '$locale');
	echo "<table cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n";

	echo "<tr>\n"
	."<td align=\"right\" class=\"pn-normal\"><b>"._HEADING.":</b></td>\n"
	."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[0]\" value=\"$mod_data[0]\"></td>\n"
	."</tr>\n";

	echo "<tr>\n"
	."<td align=\"right\" class=\"pn-normal\"><input type=\"radio\" name=\"mod_data[1]\" value=\"0\"";

	if($mod_data[1] == 0 OR $mod_data[1] == '') {
		echo " checked";
		}

	echo "></td>\n"
		."<td class=\"pn-normal\"><b>"._NEWSSINCELAST."</b></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><input type=\"radio\" name=\"mod_data[1]\" value=\"1\"";

	if($mod_data[1] == 1) {
		echo " checked";
		}

	echo ">";

	$sql = mysql_query("SELECT arch_date FROM $prefix"._nl_archive."");
	$none_sent = mysql_num_rows($sql);
	if($none_sent == 0) {
		echo "<font color=\"#FF0000\">"._NOTRECOMMENDED."</font>";
		}

	echo "</td>\n"
		."<td class=\"pn-normal\"><b>"._NEWSLASTWEEK."</b></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><input type=\"radio\" name=\"mod_data[1]\" value=\"2\"";

	if($mod_data[1] == 2) {
		echo " checked";
		}

	echo "></td>\n"
		."<td class=\"pn-normal\"><b>"._NEWSLASTMONTH."</b></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><input type=\"radio\" name=\"mod_data[1]\" value=\"3\"";

	if($mod_data[1] == 3) {
		echo " checked";
		}

	echo "></td>\n"
		."<td class=\"pn-normal\"><b>"._NEWSLASTDATE."</b></td>\n"
		."</tr>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><input type=\"radio\" name=\"mod_data[1]\" value=\"4\"";

	if($mod_data[1] == 4) {
		echo " checked";
		}

	echo "></td>\n"
		."<td class=\"pn-normal\"><b>"._NEWSBETWEEN."</b></td>\n"
		."</tr>\n"
		."<td align=\"right\" class=\"pn-normal\">"._OLDESTDATE."</td>\n"
		."<td class=\"pn-normal\"><select name=\"mod_data[2]\">";

	$sql = mysql_query("SELECT pn_time FROM $pntable[stories] ORDER BY pn_time DESC LIMIT 50");
	while(list($pn_time) = mysql_fetch_row($sql)) {
		if($pn_time != $last_pn_time) {
			echo "<option value=\"$pn_time\"";
			if($mod_data[2] == $pn_time) {
				echo " selected";
				}
			echo ">";
			$make_date = strtotime($pn_time);
			$make_date = (ml_ftime(_DATELONG, $make_date));
			echo "$make_date</option>\n";
			}
		$last_pn_time = $pn_time;
		}

	echo "</select></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\">"._NEWESTDATE."</td>\n"
		."<td class=\"pn-normal\"><select name=\"mod_data[3]\">";

	$sql = mysql_query("SELECT pn_time FROM $pntable[stories] ORDER BY pn_time DESC LIMIT 50");
	while(list($pn_time) = mysql_fetch_row($sql)) {
		if($pn_time != $last_pn_time) {
			echo "<option value=\"$pn_time\"";
			if($mod_data[3] == $pn_time) {
				echo " selected";
				}
			echo ">";
			$make_date = strtotime($pn_time);
			$make_date = (ml_ftime(_DATELONG, $make_date));
			echo "$make_date</option>\n";
			}
		$last_pn_time = $pn_time;
		}
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td align=\"right\" class=\"pn-normal\"><b>"._BORDERCOLOR.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[4]\" value=\"$mod_data[4]\"></td>\n"
		."</tr>\n";

		echo "<tr>\n";
		echo "<td align=\"right\" class=\"pn-normal\"><b>"._BGCOLOR1.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[5]\" value=\"$mod_data[5]\"></td></tr>\n";

		echo "<tr>\n";
		echo "<td align=\"right\" class=\"pn-normal\"><b>"._BGCOLOR2.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[6]\" value=\"$mod_data[6]\"></td>\n<tr>";


		echo "<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._BORDERWIDTH.":</b></td>\n"
		."<td class=\"pn-normal\">\n";
		echo "<select name=\"mod_data[7]\">\n"

		."<option value=\"0\"";	
		if ($mod_data[7] == '0') {
			echo " selected";
			}	
		echo ">0</option>\n"
			."<option value=\"1\"";	
		if ($mod_data[7] == '1') {
			echo " selected";
			}	
		echo ">1</option>\n"
			."<option value=\"2\"";	
		if ($mod_data[7] == '2') {
			echo " selected";
			}	
		echo ">2</option>\n"
			."<option value=\"3\"";	
		if ($mod_data[7] == '3') {
			echo " selected";
			}	
		echo ">3</option>\n"
			."<option value=\"4\"";	
		if ($mod_data[7] == '4') {
			echo " selected";
			}	
		echo ">4</option>\n"
			."<option value=\"5\"";	
		if ($mod_data[7] == '5') {
			echo " selected";
			}	
		echo ">5</option>\n"
			."<option value=\"6\"";	
		if ($mod_data[7] == '6') {
			echo " selected";
			}	
		echo ">6</option>\n"
			."<option value=\"7\"";	
		if ($mod_data[7] == '7') {
			echo " selected";
			}	
		echo ">7</option>\n"
			."<option value=\"8\"";	
		if ($mod_data[7] == '8') {
			echo " selected";
			}	
		echo ">8</option>\n"
			."<option value=\"9\"";	
		if ($mod_data[7] == '9') {
			echo " selected";
			}	
		echo ">9</option>\n"
			."<option value=\"10\"";	
		if ($mod_data[7] == '10') {
			echo " selected";
			}	
		echo ">10</option>\n"
			."<option value=\"15\"";	
		if ($mod_data[7] == '15') {
			echo " selected";
			}	
		echo ">15</option>\n"
		."</select>\n"
		."</tr>\n";


		echo "<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._HIMAGE.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[8]\" value=\"$mod_data[8]\"></td></tr>\n";

		echo "<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._BIMAGE.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[9]\" value=\"$mod_data[9]\"></td></tr>\n";

		echo "</table>\n";

// send the mod_data to the system (it must be mod_data and not another variable name)
	return $mod_data;
}

?>
