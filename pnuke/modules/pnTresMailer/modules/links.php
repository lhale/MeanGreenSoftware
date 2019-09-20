<?php
// $Id: links.php,v 1.3 2005/11/27 18:39:40 kdoerges Exp $
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
// Purpose of file:  Links Module for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'links'; // the name of this php file
	$modversion['mod_name'] = 'Web_Links'; // the name of the module you are writing this for
	$modversion['multi_output'] = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '0'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.5';
	$modversion['function_name'] = 'latest_links'; // the name of the function listed below
	$modversion['description'] = 'Latest Links'; // brief description of this module
	$modversion['author'] = 'kdoerges';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

function latest_links_html($mod_id, $nl_url, $ModName) {
// get vars
		$prefix = pnConfigGetVar('prefix');
	  list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

// name the lang file the same as this file
	  $language = pnConfigGetVar('language');
	  include("modules/$ModName/modules/lang/$language/links.php");

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
	  $output = "<b>"._LATESTLINKS.":</b><br><br>\n";

// query the database and generate your output in the amount of mod_qty
	  $sql = "SELECT pn_lid, pn_title, pn_description FROM $pntable[links_links] 
		        ORDER BY pn_date DESC limit 0,$mod_qty";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }

	  while(!$result->EOF) {
		    list($pn_lid, $pn_title, $pn_description) = $result->fields;
				$result->MoveNext();
		    $output .= "<a href=\"$nl_url/modules.php?op=modload&name=Web_Links&file=index&req=visit&lid=$pn_lid\" target=\"_blank\"><b>$pn_title</b></a><br>\n";
		    $output .= "$pn_description<br><br>\n";
		}

// strip the slashes out all at once
	  $output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	  return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function latest_links_text($mod_id, $nl_url, $ModName) {
// get vars
		$prefix = pnConfigGetVar('prefix');
	  list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

// name the lang file the same as this file
	  $language = pnConfigGetVar('language');
	  include("modules/$ModName/modules/lang/$language/links.php");

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
	  $output = ""._LATESTLINKS.":\n\n";

// query the database and generate your output in the amount of mod_qty
	  $sql = "SELECT pn_lid, pn_title, pn_description FROM $pntable[links_links] 
		        ORDER BY pn_date DESC limit 0,$mod_qty";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }

	  while(!$result->EOF) {
		    list($pn_lid, $pn_title, $pn_description) = $result->fields;
				$result->MoveNext();
		    $output .= "$pn_title\n";
		    $output .= "$pn_description\n";
		    $output .= "$nl_url/modules.php?op=modload&name=Web_Links&file=index&req=visit&lid=$pn_lid\n\n";
		}

// strip the slashes out all at once
	  $output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	  return $output;
}
?>