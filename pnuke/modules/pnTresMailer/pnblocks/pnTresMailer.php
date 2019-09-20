<?php
// $Id: pnTresMailer.php,v 1.4 2005/12/28 13:28:51 kdoerges Exp $
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
// Original Author of file: foyleman
// Purpose of file: Subscription block for pnTresMailer NewsLetter
// ----------------------------------------------------------------------

function pnTresMailer_pntresmailerblock_info() {
    return array('text_type' => 'pnTresMailer',
                 'module' => 'pnTresMailer',
                 'text_type_long' => 'NewsLetter Subscription Block',
                 'allow_multiple' => true,
                 'form_content' => false,
                 'form_refresh' => false,
                 'show_preview' => true);
}

function pnTresMailer_pnTresMailerblock_init() {
	pnSecAddSchema('pnTresMailer::', 'Block title::');
}

function pnTresMailer_pnTresMailerblock_display($blockinfo) {

// get vars		
    $prefix = pnConfigGetVar('prefix');		
    $lang = pnSessionGetVar('lang');

    if (!pnSecAuthAction(0,
                         'pnTresMailer::',
                         "$blockinfo[title]::",
                         ACCESS_READ)) {
        return;
    }

    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

    $pnuid = pnUserGetVar('uid');
	  $pnuname = pnUserGetVar('uname');
	  $pnemail = pnUserGetVar('email');

	  $sql = "SELECT sub_reg_id FROM $prefix"._nl_subscriber." WHERE sub_uid = '$pnuid'";

		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $check = $result->RecordCount();

	  $sql = "SELECT nl_unreg, nl_popup, nl_popup_days FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	
	  list($nl_unreg, $nl_popup, $nl_popup_days) = $result->fields;

	  $output = "";

// start popup script
	$popup_script .= "
<HEAD>
<SCRIPT LANGUAGE=\"JavaScript\">
var expDays = $nl_popup_days;
var page = \"modules/pnTresMailer/pnlang/$lang/subscribe_pop.php\";
var windowprops = \"width=220,height=150,location=no,toolbar=no,menubar=no,scrollbars=no,resizable=yes\";
function GetCookie (name) {  
var arg = name + \"=\";  
var alen = arg.length;  
var clen = document.cookie.length;  
var i = 0;  
while (i < clen) {    
var j = i + alen;    
if (document.cookie.substring(i, j) == arg)      
return getCookieVal (j);    
i = document.cookie.indexOf(\" \", i) + 1;    
if (i == 0) break;   
}  
return null;
}
function SetCookie (name, value) {  
var argv = SetCookie.arguments;  
var argc = SetCookie.arguments.length;  
var expires = (argc > 2) ? argv[2] : null;  
var path = (argc > 3) ? argv[3] : null;  
var domain = (argc > 4) ? argv[4] : null;  
var secure = (argc > 5) ? argv[5] : false;  
document.cookie = name + \"=\" + escape (value) + 
((expires == null) ? \"\" : (\"; expires=\" + expires.toGMTString())) + 
((path == null) ? \"\" : (\"; path=\" + path)) +  
((domain == null) ? \"\" : (\"; domain=\" + domain)) +    
((secure == true) ? \"; secure\" : \"\");
}
function DeleteCookie (name) {  
var exp = new Date();  
exp.setTime (exp.getTime() - 1);  
var cval = GetCookie (name);  
document.cookie = name + \"=\" + cval + \"; expires=\" + exp.toGMTString();
}
var exp = new Date(); 
exp.setTime(exp.getTime() + (expDays*24*60*60*1000));
function amt(){
var count = GetCookie('count')
if(count == null) {
SetCookie('count','1')
return 1
}
else {
var newcount = parseInt(count) + 1;
DeleteCookie('count')
SetCookie('count',newcount,exp)
return count
   }
}
function getCookieVal(offset) {
var endstr = document.cookie.indexOf (\";\", offset);
if (endstr == -1)
endstr = document.cookie.length;
return unescape(document.cookie.substring(offset, endstr));
}
function checkCount() {
var count = GetCookie('count');
if (count == null) {
count=1;
SetCookie('count', count, exp);
window.open(page, \"\", windowprops);
}
else {
count++;
SetCookie('count', count, exp);
   }
}
</script>
</HEAD>
<BODY OnLoad=\"checkCount()\">
";
// end popup script



	if($pnuid > 1) {
		if($check == 0) {
			$output .= "<center>"._SUBSCRIBEANDSTAY."<br><br>";
			$output .= "<a href=\"index.php?op=modload&name=pnTresMailer&file=index&req=AddSubSelf&sub_uid=$pnuid&sub_name=$pnuname&sub_email=$pnemail&sub_format=0\" title=\""._TSUBSCRIBENOW."\">"._SUBSCRIBENOW."</a><br><br>";
			$output .= ""._ORFINDOUT." <a href=\"index.php?op=modload&name=pnTresMailer&file=index\">"._MOREABOUTIT."</a>.<br><br></center>";
			if($nl_popup == 2) {
				echo "$popup_script";
				}
			} else {
			$output .= "<center>"._YOUARECURRENTLY."<br><br>";
			$output .= "<a href=\"index.php?op=modload&name=pnTresMailer&file=index\" title=\""._TEDITSUBSCRIPTION."\">"._EDITSUBSCRIPTION."</a><br><br></center>";
			}
		} else {
		if($nl_unreg == 1) {
			$output .= "<center>"._YOUARECURRENTLYNOT." <a href=\"user.php\" title=\"Login or Register Now\">"._LOGGEDIN."</a>, "._BUTYOUCANSTILL.".<br><br>";
			$output .= "<a href=\"index.php?op=modload&name=pnTresMailer&file=index\" title=\""._TSUBSCRIBENOW."\">"._SUBSCRIBENOW."</a><br><br></center>";
			if($nl_popup > 0) {
				echo "$popup_script";
				}
			} else {
			$output .= "<center>"._YOUARENOTALLOWED."<br>";
			$output .= ""._YOUMUSTREGISTER."<br><br></center>";
			}
		}

    $blockinfo['content'] = $output;
    return themesideblock($blockinfo);
}

?>