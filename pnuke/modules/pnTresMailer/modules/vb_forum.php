<?php
// $Id: vb_forum.php,v 1.2 2005/11/07 21:57:30 jazzie Exp $
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
	$modversion['file_name'] = 'vb_forum'; // the name of this php file
	$modversion['mod_name'] = 'VB'; // the name of the module you are writing this for
	$modversion['multi_output'] = '0'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '1'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.0';
	$modversion['function_name'] = 'vb_forum'; // the name of the function listed below
	$modversion['description'] = 'VB Latest Posts'; // brief description of this module
	$modversion['author'] = 'foyleman';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

function vb_forum_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/vb_forum.php");

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

// let's get connected
require("$mod_data[1]");
require("$path/config.php");

if ( ! defined( '_VB_PREFIX' ) )
{
	define('_VB_PREFIX', 'vb3_');
}

$connection = mysql_connect("localhost","user","pass")
	or die ("Couldnt connect to the database.");

$db = mysql_select_db("annointe", $connection)
	or die ("Couldn't select database.");

$hfs = $fs+2;
$fs .= "pt";
$hfs .= "pt";
if ($tw == "") {
	$twt = "";
} else {
	$twt = "width=\"$tw\"";
}

if ($cs == "") {
	$cs = 0;
}
// start up our table, decide whether to show
#OpenTable();
$output .= "<table border=0 cellpadding=4 cellspacing=$cs $twt align=\"center\"><tr bgcolor=\"$hc\">\n";

if ($showicon == "1") {
	$output .= "<td>&nbsp;</td>";
}

$output .= "<td style=\"font-family:$f; font-size:$hfs; color:$tcc;\"><b><nobr></nobr></b></td>\n";
$output .= "<td style=\"font-family:$f; font-size:$hfs; color:$tcc;\"><b><nobr>Topic</nobr></b></td>\n";
// the last poster column,
if ($lastposter == "1") {
	$output .= "<td style=\"font-family:$f; font-size:$hfs; color:$tcc;\" align=\"center\"><b><nobr>Last Poster</nobr></b></td>\n";
}
// the last post date & time column,
if ($lastpostdate == "1") {
	$output .= "<td style=\"font-family:$f; font-size:$hfs; color:$tcc;\" align=\"center\"><b><nobr>Last Post</nobr></b></td>\n";
}
// the views column,
if ($views == "1") {
	$output .= "<td style=\"font-family:$f; font-size:$hfs; color:$tcc;\" align=\"center\"><b>Views</b></td>\n";
}
// and/or the replies column
if ($replies == "1") {
	$output .= "<td style=\"font-family:$f; font-size:$hfs; color:$tcc;\" align=\"center\"><b>Replies</b></td>\n";
}
$output .= "</tr>\n";

// the base WHERE statement
$wheresql = "WHERE "._VB_PREFIX."thread.lastposter="._VB_PREFIX."user.username AND "._VB_PREFIX."thread.open!='10'";

// we can't have both the last 24 hours *and* the last 7 days, so error out if needed
if ($last24 == "1" && $last7 == "1") {
	print("Error: \$last24 and \$last7 are both set to 1. Please change one of them to 0.");
	exit;
}
// otherwise we're gonna find out which one it is
// last 24
if ($last24 == "1") {
	$time = time()-86400;
	$wheresql .= " AND "._VB_PREFIX."thread.lastpost>'$time'";
}
// last 7
if ($last7 == "1") {
	$time = time()-604800;
	$wheresql .= " AND "._VB_PREFIX."thread.lastpost>'$time'";
}
// are we trying to exclude *and* include forums? if so, error out
if ($excludeforums != "" && $includeforums != "") {
	print("Error: \$includeforums and \$excludeforums are both set with numbers. Please remove the numbers from <b>one</b> of these two to proceed.");
	exit;
}
// otherwise figure out which one we're using
// include forums
if ($includeforums == "" or $includeforums <= "0") {
	$quarter = "no";
} else {
	$incfid = explode(",",$includeforums); $i = 0; $a = count($incfid);
	if ($a > 1) {
		$wheresql .= " AND ("._VB_PREFIX."thread.forumid='$incfid[0]'";
		++$i;
		while ($i < $a) {
			$wheresql .= " OR "._VB_PREFIX."thread.forumid='$incfid[$i]'"; ++$i;
		}
		$wheresql .= ")";
	} else {
		$wheresql .= " AND "._VB_PREFIX."thread.forumid='$incfid[$i]'";
	}
}
// or exclude forums
if ($excludeforums == "" or $excludeforums <= "0") {
	$quarter = "no";
} else {
	$excfid = explode(",",$excludeforums); $i = 0; $a = count($excfid);
	while ($i < $a) {
		$wheresql .= " AND "._VB_PREFIX."thread.forumid!='$excfid[$i]'";	++$i;
	}
}
if ($showforumtitle == "1") {
	$ftitle = ","._VB_PREFIX."forum";
	$fsel = ","._VB_PREFIX."forum.title AS ftitle";
	$wheresql .= " AND "._VB_PREFIX."thread.forumid="._VB_PREFIX."forum.forumid";
}
// ooh a query!
$query = "SELECT "._VB_PREFIX."thread.lastpost,"._VB_PREFIX."thread.title,"._VB_PREFIX."thread.lastposter,"._VB_PREFIX."thread.replycount,"._VB_PREFIX."thread.views,"._VB_PREFIX."user.userid,"._VB_PREFIX."thread.threadid,"._VB_PREFIX."thread.forumid$fsel,"._VB_PREFIX."thread.iconid FROM "._VB_PREFIX."thread,"._VB_PREFIX."user$ftitle $wheresql ORDER BY "._VB_PREFIX."thread.$ob $obdir LIMIT $maxthreads";
// let's get the info
$tr = mysql_query($query) or die("MySQL reported this error while trying to retreive the info: ".mysql_error());
$dtf = mysql_query("SELECT value FROM "._VB_PREFIX."setting WHERE varname='dateformat' OR varname='timeformat' OR varname='timeoffset' ORDER BY varname");
$df = mysql_result($dtf,0,0);
$tf = mysql_result($dtf,1,0);
$tof = mysql_result($dtf,2,0);
if ($showdate == "1") {
	$fdt = "$df $tf";
} else {
	$fdt = "$tf";
}
$cols = 1;
// let's display the info
while ($threads = mysql_fetch_array($tr)) {	
	// are we going to show the message too?
	if ($showmessages == "1") {
		$query0 = "SELECT pagetext,postid,dateline,iconid FROM "._VB_PREFIX."post WHERE threadid='$threads[threadid]' ORDER BY dateline DESC LIMIT 1";
		$lastpost = mysql_query($query0) or die("MySQL reported this error while trying to retrieve the last post info: ".mysql_error());
		while ($lastpost1 = mysql_fetch_array($lastpost)) {
			$lastpostshort = $lastpost1[pagetext];
			$postii = $lastpost1[iconid];
		}
		if (strlen($lastpostshort) > $lplen) {
			$lastpostshort = substr($lastpostshort,0,$lplen);
			$lastpostshort .= "...";
		}
		$smilies = mysql_query("SELECT smilietext,smiliepath FROM "._VB_PREFIX."smilie");
		while ($smiles = mysql_fetch_array($smilies)) {
			$lastpostshort = str_replace($smiles[smilietext],"<img src=\"".$url."/".$smiles[smiliepath]."\" border=0>",$lastpostshort);
		}
		if ($nb == "1") {
			$lastpostshort = nl2br($lastpostshort);
		}
		$lastpostshort = str_replace("[i]","<i>",$lastpostshort);
		$lastpostshort = str_replace("[/i]","</i>",$lastpostshort);
		$lastpostshort = str_replace("[u]","<u>",$lastpostshort);
		$lastpostshort = str_replace("[/u]","</u>",$lastpostshort);
		$lastpostshort = str_replace("[b]","<b>",$lastpostshort);
		$lastpostshort = str_replace("[/b]","</b>",$lastpostshort);
		$lastpostshort = str_replace("[quote]","<br>quote:<br><hr> ",$lastpostshort);
		$lastpostshort = str_replace("[/quote]"," <hr><br>\n",$lastpostshort);
		$lastpostshort = str_replace("[I]","<i>",$lastpostshort);
		$lastpostshort = str_replace("[/I]","</i>",$lastpostshort);
		$lastpostshort = str_replace("[U]","<u>",$lastpostshort);
		$lastpostshort = str_replace("[/U]","</u>",$lastpostshort);
		$lastpostshort = str_replace("[B]","<b>",$lastpostshort);
		$lastpostshort = str_replace("[/B]","</b>",$lastpostshort);
		$lastpostshort = str_replace("[QUOTE]","<br>quote:<br><hr> ",$lastpostshort);
		$lastpostshort = str_replace("[/QUOTE]"," <hr><br>\n",$lastpostshort);
		$lastpostshort = str_replace("[CODE]","<br>code:<br><hr> ",$lastpostshort);
		$lastpostshort = str_replace("[/CODE]"," <hr><br>\n",$lastpostshort);
		$lastpostshort = str_replace("[code]","<br>code:<br><hr> ",$lastpostshort);
		$lastpostshort = str_replace("[/code]"," <hr><br>\n",$lastpostshort);
		$lastpostshort = str_replace("[img]","",$lastpostshort);
		$lastpostshort = str_replace("[/img]","",$lastpostshort);
		$lastpostshort = str_replace("[IMG]","",$lastpostshort);
		$lastpostshort = str_replace("[/IMG]","",$lastpostshort);
		$lastpostshort = str_replace("[url]","",$lastpostshort);
		$lastpostshort = str_replace("[/url]","",$lastpostshort);
		$lastpostshort = str_replace("[URL]","",$lastpostshort);
		$lastpostshort = str_replace("[/URL]","",$lastpostshort);
	}
	// thanks to kier for this idea to do the alternating row colors
	if (($counter++ % 2) != 0) {
		$bc=$bc1;
	} else {
		$bc=$bc2;
	}
	// if the title is more than $len characters, we need to cut it off and add ... to the end
	if (strlen($threads[title]) > $len) { 
		$title = substr($threads[title],0,$len);
		$title .= "...";
	} else { 
		$title = $threads[title];
	}
	// convert the date to a format readable by non-unix geeks :)
	$fd = date($fdt,$threads[lastpost]);
	// display everything in a nice table. in the future we're gonna try to do this so others can format the data, but this is sufficient for now
	$output .= "<tr>" ;
	if ($showicon == "1") {
		$output .= "<td bgcolor=\"$bc\">";
		if ($postii != "0" && $postii != "") {
			$output .= "<img src=\"$urlimg/icons/icon$postii.gif\" border=\"0\">";
		}
		if (($postii == "0" || $postii == "") && $threads[iconid] != "0" && $threads[iconid] != "") {
			$output .= "<img src=\"$urlimg/icons/icon$threads[iconid].gif\" border=\"0\">";
		}
		if (($postii == "0" || $postii == "") && ($threads[iconid] == "0" || $threads[iconid] == "")) {
			$output .= "&nbsp;";
		}
		$output .= "</td>";
		++$cols;
	}
	$output .= "<td bgcolor=\"$bc\" style=\"font-family:$f; font-size:$fs; color:$tc;\"><nobr>";
	if ($showforumtitle == "1") {
#		$output .= "<b>Forum :</b> <a href=\"$url/forumdisplay.php?forumid=$threads[forumid]\" style=\"color: $lc;\">$threads[ftitle]</a>: <br>";

		$output .= "<a href=\"$url/forumdisplay.php?forumid=$threads[forumid]\" style=\"color: $lc;\">$threads[ftitle]</a>: </td>";
	}

	$output .= "<td bgcolor=\"$bc\" style=\"font-family:$f; font-size:$fs; color:$tc;\"><nobr>";
	$output .= "<a href=\"$url/showthread.php?threadid=$threads[threadid]&goto=newpost\" style=\"color: $lc;\" title=\"$threads[title]\">$title</a></nobr></td>\n";
	// last poster column?
	if ($lastposter == "1") {
		$output .= "<td bgcolor=\"$bc\" style=\"font-family:$f; font-size:$fs; color:$tc;\" align=\"center\"><a href=\"$url/member.php?action=getinfo&userid=$threads[userid]\" style=\"color: $lc;\">$threads[lastposter]</a></td>\n";
		++$cols;
	}
	// the last post date & time column,
	if ($lastpostdate == "1") {
		$output .= "<td bgcolor=\"$bc\" style=\"font-family:$f; font-size:$fs; color:$tc;\" align=\"center\">$fd</td>\n";
		++$cols;
	}
	// views column?
	if ($views == "1") {
		$output .= "<td bgcolor=\"$bc\" style=\"font-family:$f; font-size:$fs; color:$tc;\" align=\"center\">$threads[views]</td>\n";
		++$cols;
	}
	// replies column?
	if ($replies == "1") {
		$output .= "<td bgcolor=\"$bc\" style=\"font-family:$f; font-size:$fs; color:$tc;\" align=\"center\">$threads[replycount]</td>\n";
		++$cols;
	}
	$output .= "</tr>";
	// are we showing the last post?
	if ($showmessages == "1") {
		$output .= "<tr bgcolor=\"$bc\"><td colspan=\"$cols\" style=\"font-family:$f; font-size:$fs; color:$tc;\" align=\"left\">\n";
		$output .= "<table border=0 cellpadding=4 cellspacing=0 width=\"$tw\">\n";
		$output .= "<tr bgcolor=\"$bc\"><td style=\"font-family:$f; font-size:$fs; color:$tc;\" align=\"right\" valign=\"top\"><b><nobr>Last Post:</nobr></b></td>\n";
		$output .= "<td style=\"font-family:$f; font-size:$fs; color:$tc;\" align=\"left\" width=\"100%\">$lastpostshort</td></tr>\n";
		$output .= "</table></td>\n";
	}
	$fd = "";
}
// close it all up
$output .= "</tr></table><br>";
#CloseTable();
// bye!

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function vb_forum_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/vb_forum.php");

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
			$output ="$mod_data[0]:\n\n";
			}

// each bit of mod_data was stored with | separating them. The data is exploded and numbered as 0,1,2,3...

// let's get connected
require("$mod_data[1]");
require("$path/config.php");

if ( ! defined( '_VB_PREFIX' ) )
{
	define('_VB_PREFIX', 'vb3_');
}

$connection = mysql_connect("localhost","user","pass")
	or die ("Couldnt connect to the database.");

$db = mysql_select_db("annointe", $connection)
	or die ("Couldn't select database.");

$hfs = $fs+2;
$fs .= "pt";
$hfs .= "pt";
if ($tw == "") {
	$twt = "";
} else {
	$twt = "width=\"$tw\"";
}

if ($cs == "") {
	$cs = 0;
}
// start up our table, decide whether to show
#OpenTable();

if ($showforumtitle == "1") {
	$output .= "Forum : ";
}

$output .= "Topic";

// the last poster column,
if ($lastposter == "1") {
	$output .= " : Last Poster";
}
// the views column,
if ($views == "1") {
	$output .= " : Views";
}
// and/or the replies column
if ($replies == "1") {
	$output .= " : Replies";
}
$output .= " : Link\n\n";

// the base WHERE statement
$wheresql = "WHERE "._VB_PREFIX."thread.lastposter="._VB_PREFIX."user.username AND "._VB_PREFIX."thread.open!='10'";

// we can't have both the last 24 hours *and* the last 7 days, so error out if needed
if ($last24 == "1" && $last7 == "1") {
	print("Error: \$last24 and \$last7 are both set to 1. Please change one of them to 0.");
	exit;
}
// otherwise we're gonna find out which one it is
// last 24
if ($last24 == "1") {
	$time = time()-86400;
	$wheresql .= " AND "._VB_PREFIX."thread.lastpost>'$time'";
}
// last 7
if ($last7 == "1") {
	$time = time()-604800;
	$wheresql .= " AND "._VB_PREFIX."thread.lastpost>'$time'";
}
// are we trying to exclude *and* include forums? if so, error out
if ($excludeforums != "" && $includeforums != "") {
	print("Error: \$includeforums and \$excludeforums are both set with numbers. Please remove the numbers from <b>one</b> of these two to proceed.");
	exit;
}
// otherwise figure out which one we're using
// include forums
if ($includeforums == "" or $includeforums <= "0") {
	$quarter = "no";
} else {
	$incfid = explode(",",$includeforums); $i = 0; $a = count($incfid);
	if ($a > 1) {
		$wheresql .= " AND ("._VB_PREFIX."thread.forumid='$incfid[0]'";
		++$i;
		while ($i < $a) {
			$wheresql .= " OR "._VB_PREFIX."thread.forumid='$incfid[$i]'"; ++$i;
		}
		$wheresql .= ")";
	} else {
		$wheresql .= " AND "._VB_PREFIX."thread.forumid='$incfid[$i]'";
	}
}
// or exclude forums
if ($excludeforums == "" or $excludeforums <= "0") {
	$quarter = "no";
} else {
	$excfid = explode(",",$excludeforums); $i = 0; $a = count($excfid);
	while ($i < $a) {
		$wheresql .= " AND "._VB_PREFIX."thread.forumid!='$excfid[$i]'";	++$i;
	}
}
if ($showforumtitle == "1") {
	$ftitle = ","._VB_PREFIX."forum";
	$fsel = ","._VB_PREFIX."forum.title AS ftitle";
	$wheresql .= " AND "._VB_PREFIX."thread.forumid="._VB_PREFIX."forum.forumid";
}
// ooh a query!
$query = "SELECT "._VB_PREFIX."thread.lastpost,"._VB_PREFIX."thread.title,"._VB_PREFIX."thread.lastposter,"._VB_PREFIX."thread.replycount,"._VB_PREFIX."thread.views,"._VB_PREFIX."user.userid,"._VB_PREFIX."thread.threadid,"._VB_PREFIX."thread.forumid$fsel,"._VB_PREFIX."thread.iconid FROM "._VB_PREFIX."thread,"._VB_PREFIX."user$ftitle $wheresql ORDER BY "._VB_PREFIX."thread.$ob $obdir LIMIT $maxthreads";
// let's get the info
$tr = mysql_query($query) or die("MySQL reported this error while trying to retreive the info: ".mysql_error());
$dtf = mysql_query("SELECT value FROM "._VB_PREFIX."setting WHERE varname='dateformat' OR varname='timeformat' OR varname='timeoffset' ORDER BY varname");
$df = mysql_result($dtf,0,0);
$tf = mysql_result($dtf,1,0);
$tof = mysql_result($dtf,2,0);
if ($showdate == "1") {
	$fdt = "$df $tf";
} else {
	$fdt = "$tf";
}
$cols = 1;
// let's display the info
while ($threads = mysql_fetch_array($tr)) {	
	// are we going to show the message too?
	if ($showmessages == "1") {
		$query0 = "SELECT pagetext,postid,dateline,iconid FROM "._VB_PREFIX."post WHERE threadid='$threads[threadid]' ORDER BY dateline DESC LIMIT 1";
		$lastpost = mysql_query($query0) or die("MySQL reported this error while trying to retrieve the last post info: ".mysql_error());
		while ($lastpost1 = mysql_fetch_array($lastpost)) {
			$lastpostshort = $lastpost1[pagetext];
			$postii = $lastpost1[iconid];
		}
		if (strlen($lastpostshort) > $lplen) {
			$lastpostshort = substr($lastpostshort,0,$lplen);
			$lastpostshort .= "...";
		}
		$smilies = mysql_query("SELECT smilietext,smiliepath FROM "._VB_PREFIX."smilie");
		while ($smiles = mysql_fetch_array($smilies)) {
			$lastpostshort = str_replace($smiles[smilietext],"<img src=\"".$url."/".$smiles[smiliepath]."\" border=0>",$lastpostshort);
		}
		if ($nb == "1") {
			$lastpostshort = nl2br($lastpostshort);
		}
		$lastpostshort = str_replace("[i]","<i>",$lastpostshort);
		$lastpostshort = str_replace("[/i]","</i>",$lastpostshort);
		$lastpostshort = str_replace("[u]","<u>",$lastpostshort);
		$lastpostshort = str_replace("[/u]","</u>",$lastpostshort);
		$lastpostshort = str_replace("[b]","<b>",$lastpostshort);
		$lastpostshort = str_replace("[/b]","</b>",$lastpostshort);
		$lastpostshort = str_replace("[quote]","<br>quote:<br><hr> ",$lastpostshort);
		$lastpostshort = str_replace("[/quote]"," <hr><br>\n",$lastpostshort);
		$lastpostshort = str_replace("[I]","<i>",$lastpostshort);
		$lastpostshort = str_replace("[/I]","</i>",$lastpostshort);
		$lastpostshort = str_replace("[U]","<u>",$lastpostshort);
		$lastpostshort = str_replace("[/U]","</u>",$lastpostshort);
		$lastpostshort = str_replace("[B]","<b>",$lastpostshort);
		$lastpostshort = str_replace("[/B]","</b>",$lastpostshort);
		$lastpostshort = str_replace("[QUOTE]","<br>quote:<br><hr> ",$lastpostshort);
		$lastpostshort = str_replace("[/QUOTE]"," <hr><br>\n",$lastpostshort);
		$lastpostshort = str_replace("[CODE]","<br>code:<br><hr> ",$lastpostshort);
		$lastpostshort = str_replace("[/CODE]"," <hr><br>\n",$lastpostshort);
		$lastpostshort = str_replace("[code]","<br>code:<br><hr> ",$lastpostshort);
		$lastpostshort = str_replace("[/code]"," <hr><br>\n",$lastpostshort);
		$lastpostshort = str_replace("[img]","",$lastpostshort);
		$lastpostshort = str_replace("[/img]","",$lastpostshort);
		$lastpostshort = str_replace("[IMG]","",$lastpostshort);
		$lastpostshort = str_replace("[/IMG]","",$lastpostshort);
		$lastpostshort = str_replace("[url]","",$lastpostshort);
		$lastpostshort = str_replace("[/url]","",$lastpostshort);
		$lastpostshort = str_replace("[URL]","",$lastpostshort);
		$lastpostshort = str_replace("[/URL]","",$lastpostshort);
	}
	// thanks to kier for this idea to do the alternating row colors
	if (($counter++ % 2) != 0) {
		$bc=$bc1;
	} else {
		$bc=$bc2;
	}
	// if the title is more than $len characters, we need to cut it off and add ... to the end
	if (strlen($threads[title]) > $len) { 
		$title = substr($threads[title],0,$len);
		$title .= "...";
	} else { 
		$title = $threads[title];
	}
	// convert the date to a format readable by non-unix geeks :)
	$fd = date($fdt,$threads[lastpost]);
	// display everything in a nice table. in the future we're gonna try to do this so others can format the data, but this is sufficient for now


	if ($showforumtitle == "1") {
		$output .= "$threads[ftitle] : ";
	}

	$output .= "$title";

	// last poster column?
	if ($lastposter == "1") {
		$output .= " : $threads[lastposter]<";
		++$cols;
	}
	// the last post date & time column,
	if ($lastpostdate == "1") {
		$output .= " : $fd";
		++$cols;
	}
	// views column?
	if ($views == "1") {
		$output .= " : $threads[views]";
		++$cols;
	}
	// replies column?
	if ($replies == "1") {
		$output .= " : $threads[replycount]";
		++$cols;
	}

	$output .= " : $url/showthread.php?threadid=$threads[threadid]&goto=newpost\n";

	// are we showing the last post?
	if ($showmessages == "1") {
		$output .= "Last Post: $lastpostshort\n\n";
	} else {
		$output .= "\n";
	}
	$fd = "";
}
// close it all up
#CloseTable();
// bye!

// strip html tags
	$output = strip_tags($output);

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function vb_forum_admin($mod_id, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/vb_forum.php");

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
		."<td width=\"50%\" align=\"right\" class=\"pn-normal\"><b>"._HEADING.":</b></td>\n"
		."<td width=\"50%\" class=\"pn-normal\"><input type=\"text\" name=\"mod_data[0]\" value=\"$mod_data[0]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td width=\"50%\" align=\"right\" class=\"pn-normal\">location/name of last10config.php</td>\n"
		."<td width=\"50%\" class=\"pn-normal\"><input type=\"text\" name=\"mod_data[1]\" value=\"$mod_data[1]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td colspan=\"2\" align=\"center\" class=\"pn-normal\">File location in relation to donaim root.<br>Example: if it is in the domain's root: last10dreamconfig.php</td>\n"
		."</tr>\n"
		."</table>\n"
		."\n";

// send the mod_data to the system (it must be mod_data and not another variable name)
	return $mod_data;
}

?>