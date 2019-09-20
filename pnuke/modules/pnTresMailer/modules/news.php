<?php
// $Id: news.php,v 1.4 2005/11/27 18:24:13 kdoerges Exp $
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
	$modversion['file_name'] = 'news'; // the name of this php file
	$modversion['mod_name'] = 'News'; // the name of the module you are writing this for
	$modversion['multi_output'] = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '0'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.5';
	$modversion['function_name'] = 'latest_news'; // the name of the function listed below
	$modversion['description'] = 'Latest Articles'; // brief description of this module
	$modversion['author'] = 'kdoerges';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

function latest_news_html($mod_id, $nl_url, $ModName) {
// get vars
		$prefix = pnConfigGetVar('prefix');
	  list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  $language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/news.php");

// get the module setting from the database
	  $modsql = "SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'";
		$result = $dbconn->Execute($modsql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
    if (!$result->EOF) {
	      list($mod_qty, $mod_data) = $result->fields;
    } else {
		    // take care od errors?
		}

// clear the output variable
// title of the page to show up
	$output ="<b>"._LATESTARTICLES.":</b><br><br>\n";

// query the database and generate your output in the amount of mod_qty
    $sql = "SELECT pn_sid, pn_title, pn_hometext, pn_bodytext FROM $pntable[stories] 
		        WHERE pn_ihome = '0' ORDER BY pn_time DESC limit 0,$mod_qty";

		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
						
    while(!$result->EOF) {
		    list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext) = $result->fields;
				$result->MoveNext();
		    $output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\"><b>$pn_title</b></a><br>\n";
		    $output .= "$pn_hometext<br>\n";
		    if ($pn_bodytext) {
			      $output .= "$pn_bodytext<br>\n";
//			$output .= "<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\">"._READMORE."</a><br>\n";
			  }
		$output .= "<br>\n";
		}

// strip the slashes out all at once
	  $output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	  return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function latest_news_text($mod_id, $nl_url, $ModName) {
// get vars
		$prefix = pnConfigGetVar('prefix');
	  list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  $language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/news.php");

// get the module setting from the database
	  $modsql = "SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'";
		$result = $dbconn->Execute($modsql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
    if (!$result->EOF) {
	      list($mod_qty, $mod_data) = $result->fields;
    } else {
		    // take care od errors?
		}

// clear the output variable
// title of the page to show up
	$output =""._LATESTARTICLES.":\n\n";

// query the database and generate your output in the amount of mod_qty
    $sql = "SELECT pn_sid, pn_title, pn_hometext, pn_bodytext FROM $pntable[stories] 
		        WHERE pn_ihome = '0' ORDER BY pn_time DESC limit 0,$mod_qty";

		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
						
    while(!$result->EOF) {
		    list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext) = $result->fields;
				$result->MoveNext();
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
?>