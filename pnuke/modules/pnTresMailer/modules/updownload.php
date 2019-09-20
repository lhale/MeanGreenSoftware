<?php
// $Id: updownload.php,v 1.0
// ----------------------------------------------------------------------
// POSTNUKE Content Management System
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
// Purpose of file:  Downloads Module for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
    $modversion['file_name'] = 'updownload'; // the name of this php file
	  $modversion['mod_name'] = 'UpDownload'; // the name of the module you are writing this for
	  $modversion['multi_output'] = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
	  $modversion['mod_edit'] = '0'; // can this plugin be edited 1:true, 0:false
	  $modversion['version'] = '1.2';
	  $modversion['function_name'] = 'latest_updownload'; // the name of the function listed below
	  $modversion['description'] = 'Latest UpDownload'; // brief description of this module
	  $modversion['author'] = 'Petzi-Juist';
	  $modversion['contact'] = 'http://noc.postnuke.com/projects/updownload/';

// function named as above, in this case the format is for the HTML part of the mailer

function latest_updownload_html($mod_id, $nl_url, $ModName) {

// get vars
    pnModDBInfoLoad('UpDownload');
		$prefix = pnConfigGetVar('prefix');
	  list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  $language = pnConfigGetVar('language');

// name the lang file the same as this file
	  include("modules/$ModName/modules/lang/$language/updownload.php");

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
    $output = "<strong>"._LATESTDOWNLOADS.":</strong><br /><br />\n";

// query the database and generate your output in the amount of mod_qty
	  $sql = "SELECT pn_lid, pn_title, pn_description, pn_filesize FROM $pntable[updownload_downloads] ORDER BY pn_date DESC limit 0,$mod_qty";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
    while(!$result->EOF) {
        list($pn_lid, $pn_title, $pn_description, $pn_filesize) = $result->fields;
				$result->MoveNext();
		    $output .= "<a href=\"$nl_url/index.php?name=UpDownload&amp;req=viewdownloaddetails&amp;lid=$pn_lid\"><strong>$pn_title</strong></a><br />\n";
		    $output .= "$pn_description<br />\n";
		    $output .= ""._FILESIZE.": $pn_filesize "._BYTES."<br /><br />\n";
		}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function latest_updownload_text($mod_id, $nl_url, $ModName) {

// get vars
		$prefix = pnConfigGetVar('prefix');
	  pnModDBInfoLoad('UpDownload');
// get db connection
	  list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  $language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/downloads.php");

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
	$output = ""._LATESTDOWNLOADS.":\n\n";

// query the database and generate your output in the amount of mod_qty
	  $sql = "SELECT pn_lid, pn_title, pn_description, pn_filesize FROM $pntable[updownload_downloads] ORDER BY pn_date DESC limit 0,$mod_qty";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
    while(!$result->EOF) {
	      list($pn_lid, $pn_title, $pn_description, $pn_filesize) = $result->fields;
        $result->MoveNext();
		    $output .= "$pn_title\n";
		    $output .= "$pn_description\n";
		    $output .= "$nl_url/index.php?name=UpDownload&amp;req=viewdownloaddetails&amp;lid=$pn_lid\n";
		    $output .= ""._FILESIZE.": $pn_filesize "._BYTES."\n\n";
		}

// strip the slashes out all at once
	  $output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	  return $output;
}

?>