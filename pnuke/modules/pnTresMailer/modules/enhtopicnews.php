<?php
// $Id: enhtopicnews.php,v 1.1 2005/10/27 21:05:58 bamm Exp $
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
// Adapted by jojodee <http://athomeandabout.com>
// Purpose of file:  Enhanced News by Topic Module for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'enhtopicnews'; // the name of this php file
	$modversion['mod_name'] = 'EnhTopicNews'; // the name of the module you are writing this for
	$modversion['multi_output'] = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '1'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.0';
	$modversion['function_name'] = 'enh_topic_news'; // the name of the function listed below
	$modversion['description'] = 'Latest News by Topic'; // brief description of this module
	$modversion['author'] = 'jojodee';
	$modversion['contact'] = 'http://www.athomeandabout.com/';


// function named as above, in this case the format is for the HTML part of the mailer

function enh_topic_news_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();
	
	$bgcolor1 = "#FFFFFF";
	$bgcolor2 = "#e0e9F2";

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/enhtopicnews.php");

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
		$output = ""._TOPICNEWSLATESTARTICLES.":<br><br>\n";
		} else {
		$output ="<b>$mod_data[0]:</b><br><br>\n";
		}

// query the database and generate your output in the amount of mod_qty
   if ($mod_data[1] =='0') {
	$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_informant, pn_time FROM $pntable[stories]
		ORDER BY pn_time DESC limit 0,$mod_qty");

   } else {
	$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_informant, pn_time FROM $pntable[stories]
		WHERE pn_topic = '$mod_data[1]' ORDER BY pn_time DESC limit 0,$mod_qty");
    }
	while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_informant, $pn_time) = mysql_fetch_row($sql)) {
//Start new table here
    $output .= "<table style=\"align:center; cellspacing:0; cellpadding:0; width:95%; border-bottom:1px solid;\">\n";
    $output .= "<tr><td colspan=\"2\" valign=\"top\" align=\"left\">\n";
    $output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\"><span style=\"font-weight:bold; color:#3F76AB; text-decoration:none; font-size:13px;\">$pn_title</span></a>\n";
    $output .= "<br /><span style=\"font-weight:normal; font-size:11px;\">$pn_hometext</span>";
	if ($pn_bodytext) {
        $output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\"><span style=\"font-weight:bold; font-size:10px; text-decoration:none; color:#990000;\"> "._READMORE."</span></a>\n";
    }
    $output .= "</td></tr><tr><td valign=\"top\">\n";
    $output .= "<table \"100%\" padding=\"0\"><tr>\n";
    $output .= "<td width=\"50%\" style=\"font-weight:bold; font-size:10px; font-color:red;\"  background=\"$nl_url/modules/$ModName/modules/images/enhtopicnews/fade.jpg\" >";
     $output .= "<span style=\"color:#3F76AB;\">"._POSTEDON.":<br />$pn_time</span>\n";
    $output .= "</td><td width=\"223px\" align=\"right\">\n";
    $output .= "<a href=\"$nl_url/modules.php?op=modload&name=Recommend_Us&file=index&req=FriendSend&sid=$pn_sid\"><span style=\"font-weight:bold; text-decoration:none; font-size:10px; color:#3F76AB;\">"._SENDFRIEND."</span></a>";
    $output .= "<br /><a href=\"$nl_url/print.php?sid=$pn_sid\"><span style=\"font-weight:bold; text-decoration:none; font-size:10px; color:#3F76AB;\">"._PRINTFRIEND."</span></a>\n";
    $output .= "</td></tr></table></td></tr>\n";
    $output .= "</table>\n";
//    $output .= "<tr><td border-bottom:1px solid; height=\"10px\" width=\"100%\" colspan=\"2\">&nbsp;</td></tr></table>\n";

	}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function enh_topic_news_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

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

   if ($mod_data[1] =='0') {
	$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_informant, pn_time FROM $pntable[stories]
		 ORDER BY pn_time DESC limit 0,$mod_qty");

   } else {
	$sql = mysql_query("SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_informant, pn_time FROM $pntable[stories]
		WHERE pn_topic = '$mod_data[1]' ORDER BY pn_time DESC limit 0,$mod_qty");
    }

	while(list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_informant, $pn_time) = mysql_fetch_row($sql)) {
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

function enh_topic_news_admin($mod_id, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/enhtopicnews.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// strip the slashes out all at once
	$mod_data = stripslashes($mod_data);

// create the array from the stored variables
	$mod_data = explode("|", $mod_data);

// the admin part
	$sql = mysql_query("SELECT pn_topicid, pn_topicname, pn_topictext FROM $pntable[topics] ORDER BY pn_topicname");
	$topic_count = mysql_num_rows($sql);

	$locale = pnConfigGetVar('locale');
	setlocale (LC_TIME, '$locale');
	echo "<table cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._HEADING.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"title\" name=\"mod_data[0]\" value=\"$mod_data[0]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._TOPIC.":</b></td>\n"
		."<td class=\"pn-normal\"><select name=\"mod_data[1]\">";

		echo "<option value=\"0\">All</option>";

	while(list($pn_topicid, $pn_topicname,$pn_topictext) = mysql_fetch_row($sql)) {
		echo "<option value=\"$pn_topicid\"";
		if($pn_topicid == $mod_data[1]) {
			echo " selected";
			}
		echo ">$pn_topicname</option>";
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
