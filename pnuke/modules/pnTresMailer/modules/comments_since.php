<?php
// $Id: comments_since.php,v 1.2 2005/11/07 21:57:30 jazzie Exp $
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
	$modversion['file_name'] = 'comments_since'; // the name of this php file
	$modversion['mod_name'] = 'Comments'; // the name of the module you are writing this for
	$modversion['multi_output'] = '0'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '1'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.0';
	$modversion['function_name'] = 'comments_since'; // the name of the function listed below
	$modversion['description'] = 'Comments Since'; // brief description of this module
	$modversion['author'] = 'foyleman';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

function comments_since_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/comments_since.php");

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
		$output ="<b>$mod_data[0]:</b><br><br>\n";
		}

		$output .= "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
		$output .= "<tr><td></td><td><hr></td></tr>\n";
		while(list($pn_sid, $pn_tid, $pn_name, $pn_comment) = mysql_fetch_row($sql)) {
			$output .= "<tr>\n";
			$output .= "<td valign=\"top\" class=\"main\"><a href=\"$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\" target=\"_blank\"><b>$pn_name:</b></a>&nbsp;</td>\n";
			$output .= "<td class=\"main\">$pn_comment<hr></td>\n";
			$output .= "</td>\n";
			$output .= "</tr>\n";
			}
		$output .= "</table>\n";

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
		$output ="<b>$mod_data[0]:</b><br><br>\n";
		}

		$output .= "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
		$output .= "<tr><td></td><td><hr></td></tr>\n";
		while(list($pn_sid, $pn_tid, $pn_name, $pn_comment) = mysql_fetch_row($sql)) {
			$output .= "<tr>\n";
			$output .= "<td valign=\"top\" class=\"main\"><a href=\"$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\" target=\"_blank\"><b>$pn_name:</b></a>&nbsp;</td>\n";
			$output .= "<td class=\"main\">$pn_comment<hr></td>\n";
			$output .= "</td>\n";
			$output .= "</tr>\n";
			}
		$output .= "</table>\n";

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
		$output ="<b>$mod_data[0]:</b><br><br>\n";
		}

		$output .= "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
		$output .= "<tr><td></td><td><hr></td></tr>\n";
		while(list($pn_sid, $pn_tid, $pn_name, $pn_comment) = mysql_fetch_row($sql)) {
			$output .= "<tr>\n";
			$output .= "<td valign=\"top\" class=\"main\"><a href=\"$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\" target=\"_blank\"><b>$pn_name:</b></a>&nbsp;</td>\n";
			$output .= "<td class=\"main\">$pn_comment<hr></td>\n";
			$output .= "</td>\n";
			$output .= "</tr>\n";
			}
		$output .= "</table>\n";

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
		$output ="<b>$mod_data[0]:</b><br><br>\n";
		}

		$output .= "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
		$output .= "<tr><td></td><td><hr></td></tr>\n";
		while(list($pn_sid, $pn_tid, $pn_name, $pn_comment) = mysql_fetch_row($sql)) {
			$output .= "<tr>\n";
			$output .= "<td valign=\"top\" class=\"main\"><a href=\"$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\" target=\"_blank\"><b>$pn_name:</b></a>&nbsp;</td>\n";
			$output .= "<td class=\"main\">$pn_comment<hr></td>\n";
			$output .= "</td>\n";
			$output .= "</tr>\n";
			}
		$output .= "</table>\n";

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
		$output ="<b>$mod_data[0]:</b><br><br>\n";
		}

		$output .= "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
		$output .= "<tr><td></td><td><hr></td></tr>\n";
		while(list($pn_sid, $pn_tid, $pn_name, $pn_comment) = mysql_fetch_row($sql)) {
			$output .= "<tr>\n";
			$output .= "<td valign=\"top\" class=\"main\"><a href=\"$nl_url/modules.php?op=modload&name=News&file=article&mode=flat&order=0&sid=$pn_sid#$pn_tid\" target=\"_blank\"><b>$pn_name:</b></a>&nbsp;</td>\n";
			$output .= "<td class=\"main\">$pn_comment<hr></td>\n";
			$output .= "</td>\n";
			$output .= "</tr>\n";
			}
		$output .= "</table>\n";

		}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function comments_since_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/comments_since.php");

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

function comments_since_admin($mod_id, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/comments_since.php");

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
	echo "<table cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._HEADING.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[0]\" value=\"$mod_data[0]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
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

	$sql = mysql_query("SELECT pn_date FROM $pntable[comments] ORDER BY pn_date DESC LIMIT 50");
	while(list($pn_date) = mysql_fetch_row($sql)) {
		if($pn_date != $last_pn_date) {
			echo "<option value=\"$pn_date\"";
			if($mod_data[2] == $pn_date) {
				echo " selected";
				}
			echo ">";
			$make_date = strtotime($pn_date);
			$make_date = (ml_ftime(_DATELONG, $make_date));
			echo "$make_date</option>\n";
			}
		$last_pn_date = $pn_date;
		}

	echo "</select></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\">"._NEWESTDATE."</td>\n"
		."<td class=\"pn-normal\"><select name=\"mod_data[3]\">";

	$sql = mysql_query("SELECT pn_date FROM $pntable[comments] ORDER BY pn_date DESC LIMIT 50");
	while(list($pn_date) = mysql_fetch_row($sql)) {
		if($pn_date != $last_pn_date) {
			echo "<option value=\"$pn_date\"";
			if($mod_data[3] == $pn_date) {
				echo " selected";
				}
			echo ">";
			$make_date = strtotime($pn_date);
			$make_date = (ml_ftime(_DATELONG, $make_date));
			echo "$make_date</option>\n";
			}
		$last_pn_date = $pn_date;
		}

	echo "</select></td>\n"
		."</tr>\n"
		."</table>\n"
		."\n";

// send the mod_data to the system (it must be mod_data and not another variable name)
	return $mod_data;
}

?>