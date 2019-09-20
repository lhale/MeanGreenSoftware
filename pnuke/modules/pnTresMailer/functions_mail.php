<?php

// tracker on = 1, off = 0
	$tracker = 0;

// $Id: functions_mail.php,v 1.10 2005/12/29 00:30:58 kdoerges Exp $
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
// Purpose of file:  pnTresMailer Mailing Functions
// ----------------------------------------------------------------------

if (!defined("LOADED_AS_MODULE")) {
         die ("You can't access this file directly...");
}

$ModName = basename(dirname(__FILE__));

modules_get_language();

if(!(pnSecAuthAction(0, 'pnTresMailer::', '::', ACCESS_ADMIN))) {
    include("modules/$ModName/common.php");
	page_headers('');
    OpenTable();
    echo "<center><font class=\"pn-normal\">"._ADMINONLY."</font></center>";
	CloseTable();
	page_footers('');
	return;
}

$error_log=""; // tal - 20Jan04 - clear smtp error log
$error_cnt=0; // tal- 20Jan04 - clear smtp error count

function ListSmtpErrors() { // tal - 20Jan04 - display email addresses & smtp errors
    global $error_cnt, $error_log;

// get vars
    $ModName = basename(dirname(__FILE__));	
	
	if ($error_cnt>0) {
	    $error_log = preg_replace(array("/</", "/>/", "/\n/"), array('&lt;', '&gt;', '<br>'), $error_log);
	    echo "<table align=\"left\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
	        ."<tr>\n"
	        ."<td align=\"left\" class=\"pn-normal\">Bad Email(s)<br>".$error_log."<br><br>To return back to the administration panel, click <a href=\"admin.php?module=$ModName&op=main\">"._HERE."</a>.</td>\n"
	        ."</tr>\n"
	        ."</table>\n"
	        ."<br>\n";
    }
}

function PreviewHTML() {

// get vars
    $prefix = pnConfigGetVar('prefix');
	$ModName = basename(dirname(__FILE__));

// get db connection
    list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();

    list($date) = getdate();
	$locale = pnConfigGetVar('locale');
	setlocale (LC_TIME, '$locale');
	$display_date = (ml_ftime(_DATELONG, $date));

	$sql = "SELECT * FROM $prefix"._nl_var;
	$result = $dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
	    echo _DBREADERROR;
	}		
	$nl_var = $result->GetRowAssoc(false);

	$nl_var[nl_header] = str_replace ("\r", "<br>", $nl_var[nl_header]);
	$nl_var[nl_header] = stripslashes($nl_var[nl_header]);
	$nl_var[nl_footer] = str_replace ("\r", "<br>", $nl_var[nl_footer]);
	$nl_var[nl_footer] = stripslashes($nl_var[nl_footer]);

	$file_tpl = "modules/$ModName/templates/$nl_var[nl_tpl_html]";

	if(phpversion() == '4.2.3') {
	    $message = file($file_tpl);
		$message = implode("", $message);
    } else {
	    $open_tpl = fopen($file_tpl, "rb");
		$message = fread($open_tpl, filesize($file_tpl));
		fclose($open_tpl);
	}

	$message = str_replace ("<!-- [DATE] -->", "$display_date", $message);
	$message = str_replace ("<!-- [ISSUE] -->", "$nl_var[nl_issue]", $message);
	$message = str_replace ("<!-- [HEADER] -->", "$nl_var[nl_header]", $message);
	$message = str_replace ("<!-- [FOOTER] -->", "$nl_var[nl_footer]", $message);

	$news = '';

	$modsql = "SELECT mod_file, mod_function, mod_multi_output, mod_qty, mod_id FROM $prefix"._nl_modules." ORDER BY mod_pos";
	$result = $dbconn->Execute($modsql);
	if ($dbconn->ErrorNo() != 0) {
	    echo _DBREADERROR;
	}
	while(!$result->EOF) {
	    list($mod_file, $mod_function, $mod_multi_output, $mod_qty, $mod_id) = $result->fields;
		$result->MoveNext();
		if($mod_multi_output == 1 AND $mod_qty == 0) {
		// do nothing...
		} else {
		    include_once("modules/$ModName/modules/$mod_file.php");
			$mod_function = "$mod_function"._html."";
			$news .= $mod_function($mod_id, $nl_var[nl_url], $ModName);
		}
	}

	$message = str_replace ("<!-- [NEWS] -->", "$news", $message);

	// PERSONALIZE
	if($nl_var[nl_personal] == 1) {
	    $message = str_replace("<!-- [USERNAME] -->", "[FRIEND]", $message);
	}

	echo "$message";
}

function PreviewText() {

// get vars
    $prefix = pnConfigGetVar('prefix');
	$ModName = basename(dirname(__FILE__));

// get db connection
    list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();

	list($date) = getdate();
	$locale = pnConfigGetVar('locale');
	setlocale (LC_TIME, '$locale');
	$display_date = (ml_ftime(_DATELONG, $date));

	$sql = "SELECT * FROM $prefix"._nl_var;
	$result = $dbconn->Execute($sql);
	if ($dbconn->ErrorNo() != 0) {
	    echo _DBREADERROR;
	}		
	$nl_var = $result->GetRowAssoc(false);

	$nl_var[nl_header] = str_replace ("\r", "<br>", $nl_var[nl_header]);
	$nl_var[nl_header] = stripslashes($nl_var[nl_header]);
	$nl_var[nl_footer] = str_replace ("\r", "<br>", $nl_var[nl_footer]);
	$nl_var[nl_footer] = stripslashes($nl_var[nl_footer]);

	$file_tpl = "modules/$ModName/templates/$nl_var[nl_tpl_text]";

	if(phpversion() == '4.2.3') {
	    $message = file($file_tpl);
	    $message = implode("", $message);
	} else {
	    $open_tpl = fopen($file_tpl, "rb");
	    $message = fread($open_tpl, filesize($file_tpl));
	    fclose($open_tpl);
	}

	$message = str_replace ("<!-- [DATE] -->", "$display_date", $message);
	$message = str_replace ("<!-- [ISSUE] -->", "$nl_var[nl_issue]", $message);
	$message = str_replace ("<!-- [HEADER] -->", "$nl_var[nl_header]", $message);
	$message = str_replace ("<!-- [FOOTER] -->", "$nl_var[nl_footer]", $message);

	$news = '';

	$modsql = "SELECT mod_file, mod_function, mod_multi_output, mod_qty, mod_id FROM $prefix"._nl_modules." ORDER BY mod_pos";
	$result = $dbconn->Execute($modsql);
	if ($dbconn->ErrorNo() != 0) {
	    echo _DBREADERROR;
	}
	while(!$result->EOF) {
	    list($mod_file, $mod_function, $mod_multi_output, $mod_qty, $mod_id) = $result->fields;
		$result->MoveNext();
		if($mod_multi_output == 1 AND $mod_qty == 0) {
        // do nothing
	    } else {
		    include_once("modules/$ModName/modules/$mod_file.php");
			$mod_function = "$mod_function"._text."";
			$news .= $mod_function($mod_id, $nl_var[nl_url], $ModName);
		}
	}

	$message = str_replace ("<!-- [NEWS] -->", "$news", $message);

	// PERSONALIZE
	if($nl_var[nl_personal] == 1) {
	    $message = str_replace("<!-- [USERNAME] -->", "[FRIEND]", $message);
	}

// get rid of the html stuff
	$message = strip_tags($message, '<a>');
	$message = eregi_replace (" title=\"*\"", "", $message);
	$message = eregi_replace (" target=_blank", "", $message);
	$message = eregi_replace (" target=\"_blank\"", "", $message);
	$message = eregi_replace (" href=", " ", $message);
	$message = eregi_replace ("</a>", " ", $message);
	$message = eregi_replace ("<a", "", $message);
	$message = eregi_replace (">", " ", $message);
	$message = strtr($message, array_flip(get_html_translation_table(HTML_ENTITIES)));
	$message = preg_replace("/&#([0-9]+);/me", "chr('\\1')", $message);

	$message = str_replace ("\n", "<br>", $message);

	echo "$message";
}

function PrepMailer() {
    
// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
		
	  include("modules/$ModName/common.php");

	  page_headers('');

	  menu_admin();

	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._GENERATENEWLETTERT."</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._GENERATENEWLETTER."</td>\n"
		    ."</tr>\n"

	      ."<form action=\"modules.php\" method=\"post\">\n"
	      ."<input type=\"hidden\" name=\"op\" value=\"modload\">\n"
	      ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">\n"
	      ."<input type=\"hidden\" name=\"file\" value=\"functions_mail\">\n"
	      ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">\n"
	      ."<input type=\"hidden\" name=\"req\" value=\"PrepMailerGo\">\n"

		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><input type=\"submit\" value=\""._GENERATENEWLETTERB."\"></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."</form>\n"
		    ."\n"
		    ."<hr width=\"50%\" color=\"$bgcolor2\" noshade>\n"
		    ."\n";

    $previewHtmlUrl = "index.php?op=modload&name=$ModName&file=archives&req=PreviewArchive";
	  $previewTextUrl = "index.php?op=modload&name=$ModName&file=archives&req=PreviewArchiveTxt"; 
	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._PREVIEWNEWLETTERT."</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._PREVIEWNEWLETTER."</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><a href=\"$previewHtmlUrl\" target=\"preview\" onclick=\"return pntmPopupWindow('$previewHtmlUrl','Preview','scrollbars=yes,width=500,height=550,resizable=yes')\" title=\""._TPREVIEWMAILER."\">"
		    .""._PREHTMLNEWSLETTERB."</a> / \n"
		    ."<a href=\"$previewTextUrl\" target=\"preview\" onclick=\"return pntmPopupWindow('$previewTextUrl','Preview','scrollbars=yes,width=500,height=550,resizable=yes')\" title=\""._TPREVIEWMAILER."\">"
		    .""._PRETEXTNEWSLETTERB."</a></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."<hr width=\"50%\" color=\"$bgcolor2\" noshade>\n"
		    ."\n";

    echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._EDITNEWLETTERT."</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._EDITNEWLETTER."</td>\n"
		    ."</tr>\n"

        ."<form action=\"modules.php\" method=\"post\">\n"
	      ."<input type=\"hidden\" name=\"op\" value=\"modload\">\n"
	      ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">\n"
	      ."<input type=\"hidden\" name=\"file\" value=\"archives\">\n"
	      ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">\n"
	      ."<input type=\"hidden\" name=\"req\" value=\"EditArchive\">\n"

		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><input type=\"submit\" value=\""._EDITNEWLETTERB."\"></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."</form>\n"
		    ."\n"
		    ."<hr width=\"50%\" color=\"$bgcolor2\" noshade>\n"
		    ."\n";

    echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._SENDNEWLETTER."</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._READYTOSEND."</td>\n"
		    ."</tr>\n"

	      ."<form action=\"modules.php\" method=\"post\">\n"
	      ."<input type=\"hidden\" name=\"op\" value=\"modload\">\n"
	      ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">\n"
	      ."<input type=\"hidden\" name=\"file\" value=\"functions_mail\">\n"
	      ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">\n"
	      ."<input type=\"hidden\" name=\"req\" value=\"SendMailer\">\n"

		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><input type=\"submit\" value=\"".__READYTOSENDB."\"></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."</form>\n"
		    ."\n";
    echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._READYTOSENDSINGLES."</td>\n"
		    ."</tr>\n"

        ."<form action=\"modules.php\" method=\"post\">\n"
	      ."<input type=\"hidden\" name=\"op\" value=\"modload\">\n"
	      ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">\n"
	      ."<input type=\"hidden\" name=\"file\" value=\"functions_mail\">\n"
	      ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">\n"
	      ."<input type=\"hidden\" name=\"req\" value=\"SendSingles\">\n"

		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><input type=\"submit\" value=\"".__READYTOSENDB."\"></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."</form>\n"
		    ."<br>\n"
		    ."\n";
	  page_footers('');
}

function PrepMailerFix($arch_mid) {
    
// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));

// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();
		
	  include("modules/$ModName/common.php");

	  page_headers('');

	  menu_admin();

// SELECT THE LAST sub_reg_id TO GET A MAILER

// COUNT HOW MANY GOT ONE


	  $sql = "SELECT MAX(sub_reg_id), COUNT(sub_reg_id) FROM $prefix"._nl_arch_subscriber." WHERE arch_mid = '$arch_mid' GROUP BY arch_mid";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  list($last_reg_id, $t_sent) = $result->fields;

	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._SENDNEWLETTERF."</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._READYTOSENDF."</td>\n"
		    ."</tr>\n"

		    ."<form action=\"modules.php\" method=\"post\">\n"
	      ."<input type=\"hidden\" name=\"op\" value=\"modload\">\n"
	      ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">\n"
	      ."<input type=\"hidden\" name=\"file\" value=\"functions_mail\">\n"
	      ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">\n"
	      ."<input type=\"hidden\" name=\"req\" value=\"SendMailer\">\n"
	      ."<input type=\"hidden\" name=\"t_sent\" value=\"$t_sent\">\n"
	      ."<input type=\"hidden\" name=\"last_reg_id\" value=\"$last_reg_id\">\n"

		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><input type=\"submit\" value=\"".__READYTOSENDB."\"></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."</form>\n"
		    ."\n";
	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._READYTOSENDSINGLESF."</td>\n"
		    ."</tr>\n"

		    ."<form action=\"modules.php\" method=\"post\">\n"
	      ."<input type=\"hidden\" name=\"op\" value=\"modload\">\n"
	      ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">\n"
	      ."<input type=\"hidden\" name=\"file\" value=\"functions_mail\">\n"
	      ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">\n"
	      ."<input type=\"hidden\" name=\"req\" value=\"SendSingles\">\n"
	      ."<input type=\"hidden\" name=\"t_sent\" value=\"$t_sent\">\n"
	      ."<input type=\"hidden\" name=\"last_reg_id\" value=\"$last_reg_id\">\n"

		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><input type=\"submit\" value=\"".__READYTOSENDB."\"></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."</form>\n"
		    ."<br>\n"
		    ."\n";
	  page_footers('');
}

function PrepMailerGo() {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));

// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();
		
	  include("modules/$ModName/pnversion.php");
	  include("modules/$ModName/common.php");

	  require("modules/$ModName/smtp.php");
	  
		$smtp=new smtp_class;
	  if(!function_exists("GetMXRR"))	{
		    $_NAMESERVERS=array();
		    include("modules/$ModName/getmxrr.php");
		}

	  list($date) = getdate();
	  $locale = pnConfigGetVar('locale');
	  setlocale (LC_TIME, '$locale');
	  $display_date = (ml_ftime(_DATELONG, $date));

	  $sql = "SELECT nl_header, nl_footer, nl_url, nl_tpl_html, nl_tpl_text, nl_issue FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  list($nl_header, $nl_footer, $nl_url, $nl_tpl_html, $nl_tpl_text, $nl_issue) = $result->fields;

	  $nl_header = str_replace ("\r", "<br>", $nl_header);
	  $nl_header = stripslashes($nl_header);
	  $nl_footer = str_replace ("\r", "<br>", $nl_footer);
	  $nl_footer = stripslashes($nl_footer);

// html formatting

	  $file_tpl = "modules/$ModName/templates/$nl_tpl_html";

	  if(phpversion() == '4.2.3') {
		    $message = file($file_tpl);
		    $message = implode("", $message);
		} else {
		    $open_tpl = fopen($file_tpl, "rb");
		    $message = fread($open_tpl, filesize($file_tpl));
		    fclose($open_tpl);
		}

	  $message = str_replace ("<!-- [DATE] -->", "$display_date", $message);
	  $message = str_replace ("<!-- [ISSUE] -->", "$nl_issue", $message);
	  $message = str_replace ("<!-- [HEADER] -->", "$nl_header", $message);
	  $message = str_replace ("<!-- [FOOTER] -->", "$nl_footer", $message);

	  $news = '';

	  $modsql = "SELECT mod_file, mod_function, mod_multi_output, mod_qty, mod_id FROM $prefix"._nl_modules." ORDER BY mod_pos";
		$result = $dbconn->Execute($modsql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  while(!$result->EOF) {
		    list($mod_file, $mod_function, $mod_multi_output, $mod_qty, $mod_id) = $result->fields;
				$result->MoveNext();
		    if($mod_multi_output == 1 AND $mod_qty == 0) {
			  } else {
			      include_once("modules/$ModName/modules/$mod_file.php");
			      $mod_function = "$mod_function"._html."";
			      $news .= $mod_function($mod_id, $nl_url, $ModName);
			  }
		}

	  $message = str_replace ("<!-- [NEWS] -->", "$news", $message);

	  $message = addslashes($message);

	  $sql = "INSERT INTO $prefix"._nl_archive." (arch_issue, arch_message, arch_date) VALUES ('$nl_issue', '$message', '$date')";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBINSERTERROR;
	  }
	  $sql = "SELECT arch_mid FROM $prefix"._nl_archive." ORDER BY arch_mid DESC LIMIT 1";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  list($arch_mid) = $result->fields;

// text formatting

	  $file_tpl = "modules/$ModName/templates/$nl_tpl_text";

	  if(phpversion() == '4.2.3') {
		    $message = file($file_tpl);
		    $message = implode("", $message);
		} else {
		    $open_tpl = fopen($file_tpl, "rb");
		    $message = fread($open_tpl, filesize($file_tpl));
		    fclose($open_tpl);
		}

	  $message = str_replace ("<!-- [DATE] -->", "$display_date", $message);
	  $message = str_replace ("<!-- [ISSUE] -->", "$nl_issue", $message);
	  $message = str_replace ("<!-- [HEADER] -->", "$nl_header", $message);
	  $message = str_replace ("<!-- [FOOTER] -->", "$nl_footer", $message);

	  $news = '';

	  $modsql = "SELECT mod_file, mod_function, mod_multi_output, mod_qty, mod_id FROM $prefix"._nl_modules." ORDER BY mod_pos";
		$result = $dbconn->Execute($modsql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  while(!$result->EOF) {
		    list($mod_file, $mod_function, $mod_multi_output, $mod_qty, $mod_id) = $result->fields;
        $result->MoveNext();
		    if($mod_multi_output == 1 AND $mod_qty == 0) {
            // do nothing
			  } else {
			      include_once("modules/$ModName/modules/$mod_file.php");
			      $mod_function = "$mod_function"._text."";
			      $news .= $mod_function($mod_id, $nl_url, $ModName);
			  }
		}

	  $message = str_replace ("<!-- [NEWS] -->", "$news", $message);
	  $message = str_replace ("<!-- [USERNAME] -->", "[USERNAME]", $message); // remove html style tagging

// get rid of the html stuff
	  $message = strip_tags($message, '<a>');
	  $message = eregi_replace (" title=\"*\"", "", $message);
	  $message = eregi_replace (" target=_blank", "", $message);
	  $message = eregi_replace (" target=\"_blank\"", "", $message);
	  $message = eregi_replace (" href=", " ", $message);
	  $message = eregi_replace ("</a>", " ", $message);
	  $message = eregi_replace ("<a", "", $message);
	  $message = eregi_replace (">", " ", $message);
	  $message = strtr($message, array_flip(get_html_translation_table(HTML_ENTITIES)));
	  $message = preg_replace("/&#([0-9]+);/me", "chr('\\1')", $message);

	  $message = str_replace ("[USERNAME]", "<!-- [USERNAME] -->", $message); // put html style tagging back

	  $message = addslashes($message);

	  $sql = "INSERT INTO $prefix"._nl_archive_txt." (arch_mid, arch_issue, arch_message, arch_date) VALUES ('$arch_mid', '$nl_issue', '$message', '$date')";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBINSERTERROR;
	  }
	  $nl_issue_next = ($nl_issue + 1);
	  $sql = "UPDATE $prefix"._nl_var." SET nl_issue = '$nl_issue_next' WHERE nl_var_id = '1'";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBUPDATEERROR;
	  }

	  page_headers('');
	  success_message(""._ARCHIVEGENERATED."", "functions_mail", "PrepMailer");
	  page_footers('');
}

function SendMailer($t_sent, $last_reg_id) {
    global $error_cnt, $error_log;

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));

// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();
		
    if(empty($t_sent)) {
		    $t_sent = 0;
		}
	  if(empty($last_reg_id)) {
		    $last_reg_id = 0;
		}

	  include("modules/$ModName/pnversion.php");
	  include("modules/$ModName/common.php");

	  require("modules/$ModName/smtp.php");
	  $smtp=new smtp_class;
	  if(!function_exists("GetMXRR"))	{
		    $_NAMESERVERS=array();
		    include("modules/$ModName/getmxrr.php");
		}

	  $nl_var = nl_var_info();

	// PERSONALIZE
	  if($nl_var[nl_personal] == 1) {
		    $nl_var[message] = str_replace("<!-- [USERNAME] -->", ""._FRIENDREPLACE."", $nl_var[message]);
		}

	  $smtp->host_name=$nl_var[nl_mail_server]; /* relay SMTP server address */
	  $smtp->localhost="localhost"; /* this computer address */
	  $smtp->direct_delivery=0; /* Set to 1 to deliver directly to the recepient SMTP server */
	  $smtp->timeout=10;        /* Set to the number of seconds wait for a successful connection to the SMTP server */
	  $smtp->data_timeout=0;    /* Set to the number seconds wait for sending or retrieving data from the SMTP server.
								 Set to 0 to use the same defined in the timeout variable */
	  $smtp->html_debug=0;      /* Set to 1 to format the debug output as HTML */
	  $smtp->debug=0;           /* Set to 1 to output the communication with the SMTP server */
	  $smtp->user="";           /* Set to the user name if the server requires authetication */
	  $smtp->realm="";          /* Set to the authetication realm, usually the authentication user e-mail domain */
	  $smtp->password="";       /* Set to the authetication password */

	  $sql = "SELECT sub_reg_id FROM $prefix"._nl_subscriber;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $total_user_count = $result->RecordCount();

	  $this_sent = 0;

	  foreach($nl_var as $key => $value) {
		    $nl_var[$key] = stripslashes($value);
		}

	  for($lc=1;$lc<=$nl_var[nl_loop_count];$lc++) {

		    $mailto = "";

		    $sql = "SELECT sub_reg_id, sub_email FROM $prefix"._nl_subscriber." WHERE sub_reg_id > '$last_reg_id' ORDER BY sub_reg_id LIMIT $nl_var[nl_bulk_count]";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
		    $user_count = $result->RecordCount();

		    if($user_count != 0) {
			      while(!$result->EOF) {
						    list($sub_reg_id, $sub_email) = $result->fields;

				        $mailto .= "$sub_email,";

				        $sql2 = "INSERT INTO $prefix"._nl_arch_subscriber." (arch_mid, sub_reg_id, arch_date) VALUES ('$nl_var[arch_mid]', '$sub_reg_id', '$nl_var[date]')";
		            $result = $dbconn->Execute($sql2);
	              if ($dbconn->ErrorNo() != 0) {
		                echo _DBINSERTERROR;
	              }
				        $sql2 = "UPDATE $prefix"._nl_subscriber." SET sub_last_date = '$nl_var[date]' WHERE sub_reg_id = '$sub_reg_id'";
		            $result = $dbconn->Execute($sql2);
	              if ($dbconn->ErrorNo() != 0) {
		                echo _DBUPDATEERROR;
	              }

				        $last_reg_id = $sub_reg_id;
				        $this_sent++;
				    }

			      $mailto = rtrim($mailto, ",");

			      $nl_var[message] = wordwrap($nl_var[message]);

			// MAIL THEM OUT
			      if($nl_var[nl_system] == 1) {
				        $xheaders = $nl_var[headers]."BCC: $mailto\n";
				        $xheaders = str_replace("\r","",$xheaders);
				        mail("$nl_var[nl_name]<$nl_var[nl_email]>", "$nl_var[nl_subject]", "$nl_var[message]", "$xheaders");
				    } else {
				        $xheaders = $nl_var[headers]."Subject: $nl_var[nl_subject]\r\n";
				        $xheaders .= "To: $nl_var[nl_name]<$nl_var[nl_email]>\r\n";
				        $mailto = explode(",", $mailto);
				        if(!($success=$smtp->SendMessage($nl_var[nl_email],$mailto,$xheaders,$nl_var[message])) || $smtp->error!="") {
					 //tal - 20Jan04 - increment smtp error count, log 
					          $error_cnt++;
					          $error_log .= $smtp->error; //tal - 20Jan04
					      }
				    }
			  }
		}

	// RELOAD AND DO IT AGAIN
	  $t_sent = ($t_sent + $this_sent);

	  if($user_count != 0) {

		    page_headers('');
		    echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		  	    ."<tr>\n"
			      ."<td align=\"center\" class=\"pn-normal\">$t_sent "._OUTOF." $total_user_count "._OOEMAILSSENT.".<br>"._CONTITOSENDHTML.".</td>\n"
			      ."</tr>\n"
			      ."</table>\n"
			      ."<br>\n"
			      ."\n";
		    ?>
			    <script> 
			    function redirect()
			    { 
			        window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=functions_mail&req=SendMailer&t_sent=<?php echo $t_sent?>&last_reg_id=<?php echo $last_reg_id?>"); 
			    } 
			    setTimeout("redirect();", 500); 
			    </script>
		    <?php
		    page_footers('');
		    return;

		} else {	// DONE SENDING
	
		    page_headers('');
		    if ($error_cnt>0) { 
			      ListSmtpErrors('');
				} else {
			      success_message(""._EMAILSSENT."", "archives", "ViewArchives");
				}
		    page_footers('');
		    return;
		}
}

function SendSingles($t_sent, $last_reg_id) {
    global $error_cnt, $error_log, $tracker;

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));

// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();
				
	  include("modules/$ModName/pnversion.php");
	  include("modules/$ModName/common.php");

	  require("modules/$ModName/smtp.php");
	  $smtp=new smtp_class;
	  if(!function_exists("GetMXRR"))	{
		    $_NAMESERVERS=array();
		    include("modules/$ModName/getmxrr.php");
		}

	  $nl_var = nl_var_info();

	  $smtp->host_name=$nl_var[nl_mail_server]; /* relay SMTP server address */
	  $smtp->localhost="localhost"; /* this computer address */
	  $smtp->direct_delivery=0; /* Set to 1 to deliver directly to the recepient SMTP server */
	  $smtp->timeout=10;        /* Set to the number of seconds wait for a successful connection to the SMTP server */
	  $smtp->data_timeout=0;    /* Set to the number seconds wait for sending or retrieving data from the SMTP server.
								 Set to 0 to use the same defined in the timeout variable */
	  $smtp->html_debug=0;      /* Set to 1 to format the debug output as HTML */
	  $smtp->debug=0;           /* Set to 1 to output the communication with the SMTP server */
	  $smtp->user="";           /* Set to the user name if the server requires authetication */
	  $smtp->realm="";          /* Set to the authetication realm, usually the authentication user e-mail domain */
	  $smtp->password="";       /* Set to the authetication password */

	  $sql = "SELECT sub_reg_id FROM $prefix"._nl_subscriber;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $total_user_count = $result->RecordCount();

	  $this_sent = 0;

		$mailto = "";

		$sql = "SELECT sub_reg_id, sub_email, sub_name FROM $prefix"._nl_subscriber." WHERE sub_reg_id > '$last_reg_id' ORDER BY sub_reg_id LIMIT $nl_var[nl_loop_count]";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
		$user_count = $result->RecordCount();

		if($user_count != 0) {
		    while(!$result->EOF) {
				    list($sub_reg_id, $sub_email, $sub_name) = $result->fields;
				    $sub_name = stripslashes($sub_name);

				    $mailto = "$sub_email";

				    $sql2 = "INSERT INTO $prefix"._nl_arch_subscriber." (arch_mid, sub_reg_id, arch_date) VALUES ('$nl_var[arch_mid]', '$sub_reg_id', '$nl_var[date]')";
		        $result = $dbconn->Execute($sql2);
	          if ($dbconn->ErrorNo() != 0) {
		            echo _DBINSERTERROR;
	          }
			      $sql2 = "UPDATE $prefix"._nl_subscriber." SET sub_last_date = '$nl_var[date]' WHERE sub_reg_id = '$sub_reg_id'";
		        $result = $dbconn->Execute($sql2);
	          if ($dbconn->ErrorNo() != 0) {
		            echo _DBUPDATEERROR;
	          }

				    $last_reg_id = $sub_reg_id;

				    $new_message = $nl_var[message];

				// TRACKER : setting at top of page
				    if($tracker == 1) {
					      $new_message = str_replace ("<!-- [TRACKER] -->", "<img src=\"$nl_var[nl_url]/modules/$ModName/tracker.php?arch_mid=$nl_var[arch_mid]&sub_reg_id=$sub_reg_id\" width=\"1\" height=\"1\">", $new_message);
					  }

				// PERSONALIZE
				    if($nl_var[nl_personal] == 1) {
					      $new_message = str_replace("<!-- [USERNAME] -->", "$sub_name", $new_message);
					  }

				    foreach($nl_var as $key => $value) {
					      $nl_var[$key] = stripslashes($value);
					  }

				    $new_message = wordwrap($new_message);

				// MAIL IT OUT
				    if($nl_var[nl_system] == 1) {
					      $xheaders = str_replace("\r","",$nl_var[headers]);
					      mail("$mailto", "$nl_var[nl_subject]", "$new_message", "$xheaders");
					  } else {
					      $xheaders = $nl_var[headers]."Subject: $nl_var[nl_subject]\r\n";
					      $xheaders .= "To: $mailto\r\n";
					      $mailto = explode(",", $mailto);
					      if(!$smtp->SendMessage($nl_var[nl_email],$mailto,$xheaders,$new_message) || $smtp->error!="") {
					 //tal - 20Jan04 - increment smtp error count, log error
					          $error_cnt++;
					          $error_log .= $smtp->error;
						    }
					  }

				    $this_sent++;
				}
    }

	// RELOAD AND DO IT AGAIN
	  $t_sent = ($t_sent + $this_sent);

	  if($user_count != 0) {

		    page_headers('');
		    echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
			      ."<tr>\n"
			      ."<td align=\"center\" class=\"pn-normal\">$t_sent "._OUTOF." $total_user_count "._OOEMAILSSENT.".<br>"._CONTITOSENDHTML.".</td>\n"
			      ."</tr>\n"
			      ."</table>\n"
			      ."<br>\n"
			      ."\n";
		?>
			<script> 
			function redirect()
			{ 
			window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=functions_mail&req=SendSingles&t_sent=<?php echo $t_sent?>&last_reg_id=<?php echo $last_reg_id?>"); 
			} 
			setTimeout("redirect();", 500); 
			</script>
		<?php
		    page_footers('');
		    return;

		} else {	// DONE SENDING
	
		    page_headers('');
		    ListSmtpErrors();
		    success_message(""._EMAILSSENT."", "archives", "ViewArchives");
		    page_footers('');
		    return;
		}
}

function SendSingle($sub_reg_id) {
    global $error_cnt, $error_log, $tracker;

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));

// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();
				
	  include("modules/$ModName/pnversion.php");
	  include("modules/$ModName/common.php");

	  require("modules/$ModName/smtp.php");
	  $smtp=new smtp_class;
	  if(!function_exists("GetMXRR"))	{
		    $_NAMESERVERS=array();
		    include("modules/$ModName/getmxrr.php");
		}

	  $sql = "SELECT sub_email, sub_name FROM $prefix"._nl_subscriber." WHERE sub_reg_id = '$sub_reg_id'";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  list($sub_email, $sub_name) = $result->fields;

	  $nl_var = nl_var_info();

	  $smtp->host_name=$nl_var[nl_mail_server]; /* relay SMTP server address */
	  $smtp->localhost="localhost"; /* this computer address */
	  $smtp->direct_delivery=0; /* Set to 1 to deliver directly to the recepient SMTP server */
	  $smtp->timeout=10;        /* Set to the number of seconds wait for a successful connection to the SMTP server */
	  $smtp->data_timeout=0;    /* Set to the number seconds wait for sending or retrieving data from the SMTP server.
								 Set to 0 to use the same defined in the timeout variable */
	  $smtp->html_debug=0;      /* Set to 1 to format the debug output as HTML */
	  $smtp->debug=0;           /* Set to 1 to output the communication with the SMTP server */
	  $smtp->user="";           /* Set to the user name if the server requires authetication */
	  $smtp->realm="";          /* Set to the authetication realm, usually the authentication user e-mail domain */
	  $smtp->password="";       /* Set to the authetication password */

	  $mailto .= "$sub_email";

	// UPDATE THE SUBSCRIBER INFORMATION AS WE COLLECT EMAILS
	  $sql2 = "INSERT INTO $prefix"._nl_arch_subscriber." (arch_mid, sub_reg_id, arch_date) VALUES ('$nl_var[arch_mid]', '$sub_reg_id', '$nl_var[date]')";
		$result = $dbconn->Execute($sql2);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBINSERTERROR;
	  }
	  $sql2 = "UPDATE $prefix"._nl_subscriber." SET sub_last_date = '$nl_var[date]' WHERE sub_reg_id = '$sub_reg_id'";
		$result = $dbconn->Execute($sql2);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBUPDATEERROR;
	  }

	// TRACKER : setting at top of page
	  if($tracker == 1) {
		    $nl_var[message] = str_replace ("<!-- [TRACKER] -->", "<img src=\"$nl_var[nl_url]/modules/$ModName/tracker.php?arch_mid=$nl_var[arch_mid]&sub_reg_id=$sub_reg_id\" width=\"1\" height=\"1\">", $nl_var[message]);
		}

	// PERSONALIZE
	  if($nl_var[nl_personal] == 1) {
		    $nl_var[message] = str_replace("<!-- [USERNAME] -->", "$sub_name", $nl_var[message]);
		}

	  foreach($nl_var as $key => $value) {
		    $nl_var[$key] = stripslashes($value);
		}

	  $nl_var[message] = wordwrap($nl_var[message]);

	// MAIL THEM OUT
	  if($nl_var[nl_system] == 1) {
		    $xheaders = str_replace("\r","",$nl_var[headers]);
		    mail("$mailto", "$nl_var[nl_subject]", "$nl_var[message]", "$xheaders");
		} else {
		    $xheaders = $nl_var[headers]."Subject: $nl_var[nl_subject]\r\n";
		    $xheaders .= "To: $mailto\r\n";
		    $mailto = explode(",", $mailto);
		    if(!$smtp->SendMessage($nl_var[nl_email],$mailto,$xheaders,$nl_var[message]) || $smtp->error!="") {
			 //tal - 20Jan04 - increment smtp error count, log error
			      $error_cnt++;
			      $error_log .= $smtp->error;
			  }
		}

	  page_headers('');
	  ListSmtpErrors();
	  success_message(""._SINGLEEMAILSSENT."", "subscribers", "ViewSubscribers");
	  page_footers('');
}

function nl_var_info() {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));

// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  $sql = "SELECT * FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBUPDATEERROR;
	  }
	  $nl_var = $result->GetRowAssoc(false);

	  $sql = "SELECT $prefix"._nl_archive.".arch_mid, $prefix"._nl_archive.".arch_message, $prefix"._nl_archive_txt.".arch_message FROM $prefix"._nl_archive." LEFT JOIN $prefix"._nl_archive_txt." USING (arch_mid) ORDER BY arch_mid DESC LIMIT 1";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBUPDATEERROR;
	  }
	  list($nl_var[arch_mid], $html_message, $text_message) = $result->fields;

	  $bdy = "TRES_BOUNDARY";

	  $nl_var[headers] = "Errors: $nl_var[nl_email]\r\n";
	  $nl_var[headers] .= "Reply-To: $nl_var[nl_email]\r\n";
	  $nl_var[headers] .= "Return-Path: $nl_var[nl_email]\r\n";
	  $nl_var[headers] .= "From: $nl_var[nl_name]<$nl_var[nl_email]>\r\n";
	  $nl_var[headers] .= "MIME-Version: 1.0\r\n";
	  $nl_var[headers] .= "Content-Type: multipart/alternative; boundary=\"$bdy\"\r\n";
	  $nl_var[headers] .= "Content-Transfer-Encoding: 7bit\r\n";
	  $nl_var[headers] .= "Content-Disposition: inline;\r\n";
	  $nl_var[headers] .= "Content-Base: $nl_var[nl_url]\r\n";
	  $nl_var[message] = "\n--$bdy\n";
	  $nl_var[message] .="Content-type: text/plain; charset=iso-8859-1\n\n";
	  $nl_var[message] .= $text_message;
	  $nl_var[message] .="\n--$bdy\n";
	  $nl_var[message] .="Content-type: text/html; charset=iso-8859-1\n\n";
	  $nl_var[message] .= $html_message;
	  $nl_var[message] .="\n--$bdy--\n";

	  $footer_tag = "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n";
	  $footer_tag .= "<tr>\n<td><font face=\"Arial\" size=\"-4\">";
	  $footer_tag .= ""._FOOTERMESSAGE."";
	  $footer_tag .= "</font></td>\n</tr>\n</table>\n\n";
	  $footer_tag .= "\n\n</body>";

	  $nl_var[message] = str_replace ("</body>", "$footer_tag", $nl_var[message]);

	  $nl_var[date] = time();

	  return $nl_var;
}

// get all of our variables cleanly
list($req, 
	   $arch_mid, 
	   $method,
	   $sub_reg_id,
	   $t_sent, 
	   $last_reg_id) = pnVarCleanFromInput('req',
                   		           	       'arch_mid',
								   	   									 'method',
								   	   									 'sub_reg_id',
									   										 't_sent',
									   										 'last_reg_id');

if(empty($req)) {
    $req = '';
}

switch($req) {

    case "PreviewHTML":
        PreviewHTML();
        break;

    case "PreviewText":
        PreviewText();
        break;

    case "PrepMailer":
        PrepMailer();
        break;

    case "PrepMailerFix":
        PrepMailerFix($arch_mid);
        break;

    case "PrepMailerGo":
        PrepMailerGo($method);
        break;

    case "SendSingles":
        SendSingles($t_sent, $last_reg_id);
        break;

    case "SendMailer":
        SendMailer($t_sent, $last_reg_id);
        break;

    case "SendSingle":
        SendSingle($sub_reg_id);
        break;

    case "ListSmtpErrors":
	ListSmtpErrors();
	break;
}

?>