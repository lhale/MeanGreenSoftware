<?php
// $Id: vars.php,v 1.3 2005/10/29 13:53:34 kdoerges Exp $
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
// Purpose of file:  pnTresMailer Var Content
// ----------------------------------------------------------------------

function ViewVars() {

// get vars
    $prefix = pnConfigGetVar('prefix');
    $sitename = pnConfigGetVar('sitename');
    $ModName = basename(dirname(__FILE__));		
// get db connection
    list($dbconn) = pnDBGetConn();
    $pntable =& pnDBGetTables();

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

	  if(!$start) {
		    $start = 0;
		}

	  if (!$col_sort) {
		    $col_sort = pn_uname;
		}

    $sql = "SELECT * FROM $prefix"._nl_var." WHERE nl_var_id = '1'";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $nl_var = $result->GetRowAssoc(false);

	  foreach($nl_var as $key => $value) {
		    $nl_var[$key] = stripslashes($value);
		}

	  $file_check = @fopen("modules/$ModName/templates/$nl_var[nl_tpl_text]","r"); 
	  if (!$file_check) {
		    $missing_text = ""._TEXTINVALID."";
		}
	  $file_check = @fopen("modules/$ModName/templates/$nl_var[nl_tpl_html]","r"); 
	  if (!$file_check) {
		    $missing_html = ""._HTMLINVALID."";
		}

    echo "<form action=\"modules.php\" method=\"post\">"
	      ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
	      ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
	      ."<input type=\"hidden\" name=\"file\" value=\"functions\">"
	      ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
	      ."<input type=\"hidden\" name=\"req\" value=\"EditVars\">";

    echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-title\"><b>"._VARSLIST."</b></td>\n"
		    ."</tr>\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\"><font color=\"Red\">$missing_html";
	if($missing_html AND $missing_text) {
		echo "<br>";
		}
	echo "$missing_text</font></td>\n"
		."</tr>\n"
		."</table>\n"
		."\n"
		."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"center\" valign=\"top\">\n"
		."\n"
		."<table cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._NEXTISSUENUM.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"text\" name=\"nl_var[nl_issue]\" value=\"$nl_var[nl_issue]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._EMAILSUBJECT.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"text\" name=\"nl_var[nl_subject]\" value=\"$nl_var[nl_subject]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._REPLYTONAME.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"text\" name=\"nl_var[nl_name]\" value=\"$nl_var[nl_name]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._REPLYTOADDRESS.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"text\" name=\"nl_var[nl_email]\" value=\"$nl_var[nl_email]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._ALLOWUNREGISTERED.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"radio\" name=\"nl_var[nl_unreg]\" value=\"1\"";
	if($nl_var[nl_unreg] == 1) {
		echo " checked";
		}
	echo ">"._YES." <input type=\"radio\" name=\"nl_var[nl_unreg]\" value=\"0\"";
	if($nl_var[nl_unreg] == 0) {
		echo " checked";
		}
	echo ">"._NO."</td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._ALLOWRESUBSCRIBERS.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"radio\" name=\"nl_var[nl_resub]\" value=\"1\"";
	if($nl_var[nl_resub] == 1) {
		echo " checked";
		}
	echo ">"._YES." <input type=\"radio\" name=\"nl_var[nl_resub]\" value=\"0\"";
	if($nl_var[nl_resub] == 0) {
		echo " checked";
		}
	echo ">"._NO."</td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" valign=\"top\" class=\"pn-normal\"><b>"._SIDEBLOCKPOPUP.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"radio\" name=\"nl_var[nl_popup]\" value=\"0\"";
	if($nl_var[nl_popup] == 0) {
		echo " checked";
		}
	echo ">"._NO."<br><input type=\"radio\" name=\"nl_var[nl_popup]\" value=\"1\"";
	if($nl_var[nl_popup] == 1) {
		echo " checked";
		}
	echo ">"._UNREGONLY."<br><input type=\"radio\" name=\"nl_var[nl_popup]\" value=\"2\"";
	if($nl_var[nl_popup] == 2) {
		echo " checked";
		}
	echo ">"._ALLUSERS."</td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._SIDEBLOCKPOPUPDAYS.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"text\" name=\"nl_var[nl_popup_days]\" value=\"$nl_var[nl_popup_days]\" size=\"3\"></td>\n"
		."</tr>\n"
		."</table>\n"
		."\n"
		."</td>\n"
		."<td align=\"center\" valign=\"top\">\n"
		."\n"
		."<table cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._BASEURL.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"text\" name=\"nl_var[nl_url]\" value=\"$nl_var[nl_url]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._HTMLTPL.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"text\" name=\"nl_var[nl_tpl_html]\" value=\"$nl_var[nl_tpl_html]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._TEXTTPL.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"text\" name=\"nl_var[nl_tpl_text]\" value=\"$nl_var[nl_tpl_text]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._BULKTEXT.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"text\" name=\"nl_var[nl_bulk_count]\" value=\"$nl_var[nl_bulk_count]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._LOOPTEXT.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"text\" name=\"nl_var[nl_loop_count]\" value=\"$nl_var[nl_loop_count]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._MAILSERVER.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"text\" name=\"nl_var[nl_mail_server]\" value=\"$nl_var[nl_mail_server]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._ALTMAILSYSTEM.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"radio\" name=\"nl_var[nl_system]\" value=\"1\"";
	if($nl_var[nl_system] == 1) {
		echo " checked";
		}
	echo ">"._YES." <input type=\"radio\" name=\"nl_var[nl_system]\" value=\"0\"";
	if($nl_var[nl_system] == 0) {
		echo " checked";
		}
	echo ">"._NO."</td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._NEWSUBSAMPLE.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"radio\" name=\"nl_var[nl_sample]\" value=\"1\"";
	if($nl_var[nl_sample] == 1) {
		echo " checked";
		}
	echo ">"._YES." <input type=\"radio\" name=\"nl_var[nl_sample]\" value=\"0\"";
	if($nl_var[nl_sample] == 0) {
		echo " checked";
		}
	echo ">"._NO."</td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._PERSONALEMAILS.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"radio\" name=\"nl_var[nl_personal]\" value=\"1\"";
	if($nl_var[nl_personal] == 1) {
		echo " checked";
		}
	echo ">"._YES." <input type=\"radio\" name=\"nl_var[nl_personal]\" value=\"0\"";
	if($nl_var[nl_personal] == 0) {
		echo " checked";
		}
	echo ">"._NO."</td>\n"
		."</tr>\n"
		."</table>\n"
		."\n"
		."</td>\n"
		."</tr>\n"
		."</table>\n"
		."\n"
		."<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\"><b>"._OPENMESSAGE.":</b></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\"><textarea cols=\"80\" rows=\"5\" name=\"nl_var[nl_header]\">$nl_var[nl_header]</textarea></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\"><b>"._CLOSEMESSAGE.":</b></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\"><textarea cols=\"80\" rows=\"5\" name=\"nl_var[nl_footer]\">$nl_var[nl_footer]</textarea></td>\n"
		."</tr>\n"
		."</table>\n"
		."\n";

	echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td><input type=\"submit\" value=\""._UPDATE."\"></td>\n"
		."</tr></form>\n"
		."</table>\n"
		."<br>\n"
		."\n";

	page_footers();
}

// funcs end here
// main start here

// get language definition
modules_get_language();

if(empty($req)) {
    $req = '';
}

// get all of our variables cleanly
list($req, 
	 $start) = pnVarCleanFromInput('req',
                   		           'start');


switch($req) {

    case "ViewVars":
        ViewVars();
        break;

}

?>