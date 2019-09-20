<?php
// $Id: newssince.php,v 1.2 2005/11/07 21:57:30 jazzie Exp $
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
	$modversion['file_name'] = 'newssince'; // the name of this php file
	$modversion['mod_name'] = 'News'; // the name of the module you are writing this for
	$modversion['multi_output'] = '0'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '1'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '2.1';
	$modversion['function_name'] = 'news_since'; // the name of the function listed below
	$modversion['description'] = 'News Since'; // brief description of this module
	$modversion['author'] = 'foyleman';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

function news_since_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/newssince.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
	$mod_data = explode("|", $mod_data);

// query the database and generate your output in the amount of mod_qty

	if($mod_data[6] == 1) {
		$ihome = "pn_ihome = '0' AND";
		}

	$top_cat = '';
	if($mod_data[4] > 0) {
		$top_cat = " AND pn_topic = '$mod_data[4]'";
		}
	if($mod_data[5] > 0) {
		$top_cat .= " AND pn_catid = '$mod_data[5]'";
		}

	if($mod_data[1] == 1) {
// news last week
		$date = mktime();
		$date = strtotime('-7 day',$date);
		$date = date("Y-m-d H:i:s",$date);
		$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_time FROM $pntable[stories] 
			WHERE $ihome pn_time >= '$date' $top_cat ORDER BY pn_time DESC");

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

		while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_time) = mysql_fetch_row($sql)) {
			$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\"><b>$pn_title</b></a><br>\n";
			$output .= "$pn_hometext<br>\n";
			if ($pn_bodytext) {
				$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\">"._READMORE."</a><br>\n";
				}
			$output .= "<br>\n";
			}
		} elseif($mod_data[1] == 2) {
// news last month
		$date = mktime();
		$date = strtotime('-1 month',$date);
		$date = date("Y-m-d H:i:s",$date);
		$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_time FROM $pntable[stories] 
			WHERE $ihome pn_time >= '$date' $top_cat ORDER BY pn_time DESC");

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

		while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_time) = mysql_fetch_row($sql)) {
			$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\"><b>$pn_title</b></a><br>\n";
			$output .= "$pn_hometext<br>\n";
			if ($pn_bodytext) {
				$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\">"._READMORE."</a><br>\n";
				}
			$output .= "<br>\n";
			}
		} elseif($mod_data[1] == 3) {
// news since date
		$oldest_date = $mod_data[2];
		$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_time FROM $pntable[stories] 
			WHERE $ihome pn_time >= '$oldest_date' $top_cat ORDER BY pn_time DESC");

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

		while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_time) = mysql_fetch_row($sql)) {
			$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\"><b>$pn_title</b></a><br>\n";
			$output .= "$pn_hometext<br>\n";
			if ($pn_bodytext) {
				$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\">"._READMORE."</a><br>\n";
				}
			$output .= "<br>\n";
			}
		} elseif($mod_data[1] == 4) {
// news between dates
		$oldest_date = $mod_data[2];
		$newest_date = $mod_data[3];
		$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_time FROM $pntable[stories] 
			WHERE $ihome pn_time >= '$oldest_date' AND pn_time <= '$newest_date' $top_cat ORDER BY pn_time DESC");

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

		while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_time) = mysql_fetch_row($sql)) {
			$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\"><b>$pn_title</b></a><br>\n";
			$output .= "$pn_hometext<br>\n";
			if ($pn_bodytext) {
				$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\">"._READMORE."</a><br>\n";
				}
			$output .= "<br>\n";
			}
		} else {
// news since last newsletter
		$sql = mysql_query("SELECT arch_date FROM $prefix"._nl_archive." ORDER BY arch_date DESC limit 1");
		list($arch_date) = mysql_fetch_row($sql);
		$arch_date = date("Y-m-d H:i:s",$arch_date);
		$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_time FROM $pntable[stories] 
			WHERE $ihome pn_time > '$arch_date' $top_cat ORDER BY pn_time DESC");

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

		while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_time) = mysql_fetch_row($sql)) {
			$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\"><b>$pn_title</b></a><br>\n";
			$output .= "$pn_hometext<br>\n";
			if ($pn_bodytext) {
				$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\">"._READMORE."</a><br>\n";
				}
			$output .= "<br>\n";
			}
		}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function news_since_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/newssince.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
		$mod_data = explode("|", $mod_data);

// query the database and generate your output in the amount of mod_qty

	if($mod_data[6] == 1) {
		$ihome = "pn_ihome = '0' AND";
		}

	$top_cat = '';
	if($mod_data[4] > 0) {
		$top_cat = " AND pn_topic = '$mod_data[4]'";
		}
	if($mod_data[5] > 0) {
		$top_cat .= " AND pn_catid = '$mod_data[5]'";
		}

	if($mod_data[1] == 1) {
// news last week
		$date = mktime();
		$date = strtotime('-7 day',$date);
		$date = date("Y-m-d H:i:s",$date);
		$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_time FROM $pntable[stories] 
			WHERE $ihome pn_time >= '$date' $top_cat ORDER BY pn_time DESC");

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

		while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_time) = mysql_fetch_row($sql)) {
			$output .= "$pn_title\n";
			$output .= "$pn_hometext\n";
			if ($pn_bodytext) {
				$output .= ""._READMORE.": $nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\n";
				}
			$output .= "\n";
			}
		} elseif($mod_data[1] == 2) {
// news last month
		$date = mktime();
		$date = strtotime('-1 month',$date);
		$date = date("Y-m-d H:i:s",$date);
		$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_time FROM $pntable[stories] 
			WHERE $ihome pn_time >= '$date' $top_cat ORDER BY pn_time DESC");

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

		while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_time) = mysql_fetch_row($sql)) {
			$output .= "$pn_title\n";
			$output .= "$pn_hometext\n";
			if ($pn_bodytext) {
				$output .= ""._READMORE.": $nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\n";
				}
			$output .= "\n";
			}
		} elseif($mod_data[1] == 3) {
// news since date
		$oldest_date = $mod_data[2];
		$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_time FROM $pntable[stories] 
			WHERE $ihome pn_time >= '$oldest_date' $top_cat ORDER BY pn_time DESC");

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

		while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_time) = mysql_fetch_row($sql)) {
			$output .= "$pn_title\n";
			$output .= "$pn_hometext\n";
			if ($pn_bodytext) {
				$output .= ""._READMORE.": $nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\n";
				}
			$output .= "\n";
			}
		} elseif($mod_data[1] == 4) {
// news between dates
		$oldest_date = $mod_data[2];
		$newest_date = $mod_data[3];
		$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_time FROM $pntable[stories] 
			WHERE $ihome pn_time >= '$oldest_date' AND pn_time <= '$newest_date' $top_cat ORDER BY pn_time DESC");

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

		while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_time) = mysql_fetch_row($sql)) {
			$output .= "$pn_title\n";
			$output .= "$pn_hometext\n";
			if ($pn_bodytext) {
				$output .= ""._READMORE.": $nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\n";
				}
			$output .= "\n";
			}
		} else {
// news since last newsletter
		$sql = mysql_query("SELECT arch_date FROM $prefix"._nl_archive." ORDER BY arch_date DESC limit 1,1");
		list($arch_date) = mysql_fetch_row($sql);
		$arch_date = date("Y-m-d H:i:s",$arch_date);
		$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_time FROM $pntable[stories] 
			WHERE $ihome pn_time > '$arch_date' $top_cat ORDER BY pn_time DESC");

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

		while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_time) = mysql_fetch_row($sql)) {
			$output .= "$pn_title\n";
			$output .= "$pn_hometext\n";
			if ($pn_bodytext) {
				$output .= ""._READMORE.": $nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\n";
				}
			$output .= "\n";
			}
		}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function news_since_admin($mod_id, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/newssince.php");

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
		."<td align=\"right\" class=\"pn-normal\"><b>"._OLDESTDATE."</b></td>\n"
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
		."<td align=\"right\" class=\"pn-normal\"><b>"._NEWESTDATE."</b></td>\n"
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

	echo "</select></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._NEWSSINCETOP."</b></td>\n"
		."<td class=\"pn-normal\"><select name=\"mod_data[4]\">\n"
		."<option value=\"0\">All Topics</option>\n";

	$sql = mysql_query("SELECT pn_topicid, pn_topicname FROM $pntable[topics] ORDER BY pn_topicname");
	while(list($tid, $topicname) = mysql_fetch_row($sql)) {
		$topicname = stripslashes($topicname);
		echo "<option value=\"$tid\"";

		if($mod_data[4] == $tid) {
			echo " selected";
			}

		echo ">$topicname</option>\n";
		}

	echo "</select></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._NEWSSINCECAT."</b></td>\n"
		."<td class=\"pn-normal\"><select name=\"mod_data[5]\">\n"
		."<option value=\"0\">All Categories</option>\n";

	$sql = mysql_query("SELECT pn_catid, pn_title FROM $pntable[stories_cat] ORDER BY pn_title");
	while(list($catid, $title) = mysql_fetch_row($sql)) {
		$title = stripslashes($title);
		echo "<option value=\"$catid\"";

		if($mod_data[5] == $catid) {
			echo " selected";
			}

		echo ">$title</option>\n";
		}

	echo "</select></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._NEWSSINCEIHOME."</b></td>\n"
		."<td class=\"pn-normal\">No <input type=\"radio\" name=\"mod_data[6]\" value=\"0\"";

	if($mod_data[6] == 0 OR $mod_data[6] == '') {
		echo " checked";
		}

	echo ">Yes <input type=\"radio\" name=\"mod_data[6]\" value=\"1\"";

	if($mod_data[6] == 1) {
		echo " checked";
		}

	echo "></td>\n"
		."</tr>\n"
		."</table>\n"
		."\n";

// send the mod_data to the system (it must be mod_data and not another variable name)
	return $mod_data;
}

?>