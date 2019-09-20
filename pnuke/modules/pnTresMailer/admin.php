<?php
// $Id: admin.php,v 1.4 2005/10/29 11:52:51 kdoerges Exp $
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
// Purpose of file:  pnTresMailer Administration
// ----------------------------------------------------------------------

function pnTresMailer_admin_main(){

// get language definitions
    modules_get_language();
// get vars		
    $prefix = pnConfigGetVar('prefix');		
	  $sitename = pnConfigGetVar('sitename');
    $ModName = basename(dirname(__FILE__));		
// get db connection
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    if(!(pnSecAuthAction(0, 'pnTresMailer::', '::', ACCESS_ADMIN))) {
	      include("modules/$ModName/common.php");
		    page_headers('');
    	  OpenTable();
        echo "<center><font class=\"pn-normal\">"._ADMINONLY."</font></center>";
	      CloseTable();
		    page_footers('');
		    return;
		}

    include("modules/$ModName/common.php");
    page_headers();

    menu_admin();

	  $sql = "SELECT sub_reg_id FROM $prefix"._nl_subscriber;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $sub_count = $result->RecordCount();

    $sql = "SELECT sub_name FROM $prefix"._nl_subscriber." ORDER BY sub_reg_id DESC LIMIT 1";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
    list($last_sub) = $result->fields;
    if($last_sub == '') {
		    $last_sub = "No Subscribers";
		}

    $sql = "SELECT arch_date FROM $prefix"._nl_archive." ORDER BY arch_date DESC LIMIT 1";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
    list($last_arch) = $result->fields;
    if($last_arch == '0' OR $last_arch == '') {
		    $last_arch_out = "(None in Database)";
		} else {
		    $locale = pnConfigGetVar('locale');
		    setlocale (LC_TIME, '$locale');
		    $last_arch_out = (ml_ftime(_DATELONG, $last_arch));
		}
	
    list($date) = getdate();
    $doty = date( "z", $date );
    $last_doty = date( "z", $last_arch );
    if($last_doty > $doty) {
		    $doty = ($doty + 366);
		}
    $days_since = ($doty - $last_doty);
    if($last_arch == '0' OR $last_arch == '') {
		    $days_since = "XXX";
		}

    echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\">"._YOURLASTSUB." <b>$last_sub</b>.</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\">"._YOUCURRENTLY." <b>$sub_count</b> "._USERSSUBSCRIBED."</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\">"._YOURLASTNEWS." <b>$last_arch_out</b> "._WHICHIS." <b>$days_since</b> "._DAYSAGO."</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";

    page_footers();
}

?>