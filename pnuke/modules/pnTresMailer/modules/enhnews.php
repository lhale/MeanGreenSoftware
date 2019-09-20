<?php
// $Id: enhnews.php,v 1.3 2005/10/29 15:27:14 kdoerges Exp $
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
    $modversion['file_name'] = 'enhnews'; // the name of this php file
    $modversion['mod_name'] = 'EnhNews'; // the name of the module you are writing this for
    $modversion['multi_output'] = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
    $modversion['mod_edit'] = '0'; // can this plugin be edited 1:true, 0:false
    $modversion['version'] = '1.2';
    $modversion['function_name'] = 'enh_latest_news'; // the name of the function listed below
	  $modversion['description'] = 'Latest Articles Enhanced'; // brief description of this module
    $modversion['author'] = 'rudyvarner';
    $modversion['contact'] = 'http://www.planetrockabilly.com/';


// function named as above, in this case the format is for the HTML part of the mailer

function enh_latest_news_html($mod_id, $nl_url, $ModName) {

// get vars
    $prefix = pnConfigGetVar('prefix');		
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();
	
    $bgcolor1 = "#0056A7";
	  $bgcolor2 = "#d8e1ea";

	  $language = pnConfigGetVar('language');

// name the lang file the same as this file
	  include("modules/$ModName/modules/lang/$language/enhnews.php");

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
	  $output = "<b>"._ENHLATESTARTICLES.":</b><br><br>\n";

// query the database and generate your output in the amount of mod_qty
	  $sql = "SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_informant, pn_time 
		        FROM $pntable[stories] 
		        WHERE pn_ihome = '0' ORDER BY pn_time DESC limit 0,$mod_qty";

		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
						
    while(!$result->EOF) {
		    list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_informant, $pn_time) = $result->fields;
				$result->MoveNext(); 
	      $output .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tr><td bgcolor=\"$bgcolor1\">\n";
	      $output .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" width=\"100%\"><tr><td bgcolor=\"$bgcolor2\">\n";
	      $output .= "<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\" width=\"100%\"><tr><td bgcolor=\"$bgcolor2\">\n";
	      $output .= "<img src=\"$nl_url/modules/$ModName/modules/images/enhnews/off.gif\" border=\"0\"></td><td width=\"100%\" bgcolor=\"$bgcolor2\"><b>&nbsp;<a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\"><font style=\"FONT-SIZE: 13px\"><b>$pn_title</b></a></font></b></td></tr>\n";
	      $output .= "<tr><td colspan=\"2\" bgcolor=\"$bgcolor2\"><br>\n";
	      $output .= "<table border=\"0\" width=\"98%\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    	  $output .= "<font style=\"FONT-SIZE: 11px\">$pn_hometext</font>\n";
    	  $output .= "</td></tr></table>\n";
	      $output .= "</td></tr></table><br>\n";
	      $output .= "</td></tr><tr><td bgcolor=\"$bgcolor2\" align=\"left\">\n";
        $output .= "&nbsp";
	      $output .= "<font style=\"FONT-SIZE: 10px\"><b>"._POSTEDBY.": $pn_informant "._ON." $pn_time</font><br>";
	      if ($pn_bodytext) {
		        $output .= "<div align=\"right\"><font style=\"FONT-SIZE: 11px\"><a href=\"$nl_url/modules.php?op=modload&name=News&file=article&sid=$pn_sid\" target=\"_blank\">"._READMORE."</a></font>&nbsp;&nbsp;</div>\n";
		    }
	      $output .= "<img src=\"$nl_url/modules/$ModName/modules/images/enhnews/pixel.gif\" border=\"0\" height=\"2\">";
	      $output .= "</td></tr></table>\n";
	      $output .= "</td></tr></table><br>\n";
    }

// strip the slashes out all at once
	  $output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	  return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function enh_latest_news_text($mod_id, $nl_url, $ModName) {

// get vars
    $prefix = pnConfigGetVar('prefix');		
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

    $language = pnConfigGetVar('language');

// name the lang file the same as this file
    include("modules/$ModName/modules/lang/$language/enhnews.php");

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
	  $output =""._ENHLATESTARTICLES.":\n\n";

// query the database and generate your output in the amount of mod_qty
	  $sql = "SELECT pn_sid, pn_title, pn_hometext, pn_bodytext, pn_informant, pn_time 
		        FROM $pntable[stories] 
		        WHERE pn_ihome = '0' ORDER BY pn_time DESC limit 0,$mod_qty";

		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
						
    while(!$result->EOF) {
		    list($pn_sid, $pn_title, $pn_hometext, $pn_bodytext, $pn_informant, $pn_time) = $result->fields;
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