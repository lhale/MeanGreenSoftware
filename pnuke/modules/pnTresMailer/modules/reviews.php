<?php
// $Id: reviews.php,v 1.2 2005/11/07 21:57:30 jazzie Exp $
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
// Purpose of file:  Reviews Module for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'reviews'; // the name of this php file
	$modversion['mod_name'] = 'Reviews'; // the name of the module you are writing this for
	$modversion['multi_output'] = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '0'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.2';
	$modversion['function_name'] = 'latest_reviews'; // the name of the function listed below
	$modversion['description'] = 'Latest Reviews'; // brief description of this module
	$modversion['author'] = 'foyleman';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

function latest_reviews_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/reviews.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// clear the output variable
// title of the page to show up
	$output = "<b>"._LATESTREVIEWS.":</b><br><br>\n";

// query the database and generate your output in the amount of mod_qty
	$sql = mysql_query("SELECT pn_id, pn_title, pn_reviewer, pn_score FROM $pntable[reviews] 
		ORDER BY pn_date DESC limit 0,$mod_qty");
	while(list($pn_id, $pn_title, $pn_reviewer, $pn_score) = mysql_fetch_row($sql)) {
		$output .= "<a href=\"$nl_url/modules.php?op=modload&name=Reviews&file=index&req=showcontent&id=$pn_id\" target=\"_blank\"><b>$pn_title</b></a><br>\n";
		$output .=	"<b>$pn_reviewer</b> "._GAVEITSCORE." <b>$pn_score</b> "._OUTOFTEN."<br><br>\n";
		}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function latest_reviews_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/reviews.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// clear the output variable
// title of the page to show up
	$output = ""._LATESTREVIEWS.":\n\n";

// query the database and generate your output in the amount of mod_qty
	$sql = mysql_query("SELECT pn_id, pn_title, pn_reviewer, pn_score FROM $pntable[reviews] 
		ORDER BY pn_date DESC limit 0,$mod_qty");
	while(list($pn_id, $pn_title, $pn_reviewer, $pn_score) = mysql_fetch_row($sql)) {
		$output .= "$pn_title\n";
		$output .=	"$pn_reviewer "._GAVEITSCORE." $pn_score "._OUTOFTEN."\n";
		$output .= "$nl_url/modules.php?op=modload&name=Reviews&file=index&req=showcontent&id=$pn_id$pn_title\n\n";
		}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}

?>