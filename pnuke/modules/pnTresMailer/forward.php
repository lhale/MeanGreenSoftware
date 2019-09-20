<?php // $Id: forward.php,v 1.5 2005/12/28 16:16:03 kdoerges Exp $ $Name:  $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the Post-Nuke Development Team.
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
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Filename: modules/pnTresMailer/*.php
// Original Author: foyleman
// Purpose: pnTresMailer NewsLetter Module
// ----------------------------------------------------------------------

function Fwd($arch_mid, $sub_name, $sub_email) {
    
// get vars
    $prefix = pnConfigGetVar('prefix');
	$ModName = basename(dirname(__FILE__));

// get db connection
    list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();
		
	$language = pnConfigGetVar('language');
	include("modules/$ModName/modules/lang/$language/fw_newsletter.php");

    include("modules/$ModName/common.php");
	include("modules/$ModName/pntables.php");

	if($sub_email == '') {
	    page_headers('');
		echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
			      ."<tr>\n"
			      ."<td align=\"center\" class=\"pn-normal\">"._MISSFORWARDEMAIL."</td>\n"
			      ."</tr>\n"
			      ."</table>\n"
			      ."<br>\n"
			      ."\n";
		    page_footers('');
		    return;
		}

	  $sql = "SELECT nl_subject, nl_name, nl_email, nl_url FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  list($nl_subject, $nl_name, $nl_email, $nl_url) = $result->fields;
	  $nl_subject = stripslashes($nl_subject);
	  $nl_name = stripslashes($nl_name);

	  $sql = "SELECT arch_message FROM $prefix"._nl_archive." WHERE arch_mid = '$arch_mid'";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  list($message) = $result->fields;
	  $message = stripslashes($message);

	  $footer_message = ""._FOOTERMESSAGE."";
		$footer_tag = "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n";
		$footer_tag .= "<tr>\n<td><font face=\"Arial\" size=\"-4\">";
		$footer_tag .= "$footer_message";
		$footer_tag .= "</font></td>\n</tr>\n</table>\n\n";
		$footer_tag .= "\n\n</body>";
		$message = str_replace ("</body>", "$footer_tag", $message);

	  if($sub_name == '') {
		    $mailto .= "$sub_email";
		} else {
		    $mailto .= "$sub_name<$sub_email>";
		}

	  $headers = "Errors: $nl_name<$nl_email>\n";
	  $headers .= "Reply-To: $nl_name<$nl_email>\n";
	  $headers .= "Return-Path: $nl_name<$nl_email>\n";
	  $headers .= "FROM: $nl_name<$nl_email>\n";
	  $headers .= "MIME-Version: 1.0\n";
	  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
	  $headers .= "Content-Transfer-Encoding: 7bit\n";
	  $headers .= "Content-Disposition: inline;\n";
	  $headers .= "Content-Base: $nl_url\n";

	  mail("$mailto", "$nl_subject", "$message", "$headers");

	  page_headers('');

	  echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\"><b>"._THANKSFORWARD."</b></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";

	  page_footers('');
}

function Sub($arch_mid, $sub_name, $sub_email) {
    
// get vars		
    $prefix = pnConfigGetVar('prefix');		
    $sitename = pnConfigGetVar('sitename');
	  $ModName = basename(dirname(__FILE__));
	  $language = pnConfigGetVar('language');

// get db connection		
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  include("modules/$ModName/modules/lang/$language/fw_newsletter.php");

    include("modules/$ModName/common.php");
	  include("modules/$ModName/pntables.php");

	  if($sub_email == '') {
		    page_headers('');
		    echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
			      ."<tr>\n"
			      ."<td align=\"center\" class=\"pn-normal\">"._MISSFORWARDEMAIL."</td>\n"
			      ."</tr>\n"
			      ."</table>\n"
			      ."<br>\n"
			      ."\n";
		    page_footers('');
		    return;
		}

	  $sql = "SELECT nl_subject, nl_name, nl_email, nl_url, nl_unreg FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  list($nl_subject, $nl_name, $nl_email, $nl_url, $nl_unreg) = $result->fields;

	  $nl_subject = stripslashes($nl_subject);
	  $nl_name = stripslashes($nl_name);

// does admin want to accept unregistered subscribers?
	  if($nl_unreg == '1') {

// check to see if user already exists in database
	      $sql = "SELECT sub_reg_id FROM $prefix"._nl_subscriber." WHERE sub_email = '$sub_email'";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
	      $sub_dup_chk = $result->RecordCount();

// validate email address
		    include("modules/$ModName/email_test.php");
		    $result = valid_email($sub_email, $ModName);
		    if($result != 0 AND $sub_dup_chk == 0 AND $sub_name != '') {
		        $sql2 = "INSERT INTO $prefix"._nl_subscriber." (sub_name, sub_email) VALUES ('$sub_name', '$sub_email')";
		        $result = $dbconn->Execute($sql2);
	          if ($dbconn->ErrorNo() != 0) {
		            echo _DBINSERTERROR;
	          }
			  }
    }

	  $sql = "SELECT arch_message FROM $prefix"._nl_archive." WHERE arch_mid = '$arch_mid'";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  list($message) = $result->fields;

	  $message = stripslashes($message);

	  $footer_message = ""._FOOTERMESSAGE."";
		$footer_tag = "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n";
		$footer_tag .= "<tr>\n<td><font face=\"Arial\" size=\"-4\">";
		$footer_tag .= "$footer_message";
		$footer_tag .= "</font></td>\n</tr>\n</table>\n\n";
		$footer_tag .= "\n\n</body>";
		$message = str_replace ("</body>", "$footer_tag", $message);

	  if($sub_name == '') {
		    $mailto .= "$sub_email";
		} else {
		    $mailto .= "$sub_name<$sub_email>";
		}

	  $headers = "Errors: $nl_name<$nl_email>\n";
	  $headers .= "Reply-To: $nl_name<$nl_email>\n";
	  $headers .= "Return-Path: $nl_name<$nl_email>\n";
	  $headers .= "FROM: $nl_name<$nl_email>\n";
	  $headers .= "MIME-Version: 1.0\n";
	  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
	  $headers .= "Content-Transfer-Encoding: 7bit\n";
	  $headers .= "Content-Disposition: inline;\n";
	  $headers .= "Content-Base: $nl_url\n";

	  mail("$mailto", "$nl_subject", "$message", "$headers");

	  $sql = "UPDATE $prefix"._nl_subscriber." SET sub_last_date = '1' WHERE sub_email = '$sub_email'";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBUPDATEERROR;
	  }

	  page_headers('');

	  echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\"><b>"._THANKSFORWARD."</b></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";

	  page_footers('');
}

// main starts here

// get all of our variables cleanly
list($req, 
	   $arch_mid, 
	   $sub_name,
	   $sub_email) = pnVarCleanFromInput('req',
                   		           	     'arch_mid',
								   	   								 'sub_name',
								   	   								 'sub_email');


$ModName = basename(dirname(__FILE__));

modules_get_language();
											 
											 
if(empty($req)) {
    $req = '';
}

switch($req) {

    case "Fwd":
        Fwd($arch_mid, $sub_name, $sub_email);
        break;

    case "Sub":
        Sub($arch_mid, $sub_name, $sub_email);
        break;

}
?>