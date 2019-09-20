<?php // $Id: common.php,v 1.5 2005/12/27 21:14:42 kdoerges Exp $ $Name:  $
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
// Filename: modules/NewsLetter/*.php
// Original Author: foyleman
// Purpose: NewsLetter Module
// ----------------------------------------------------------------------


function success_message($message, $file, $return) {
// get vars	
  $ModName = basename(dirname(__FILE__));

	echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\">$message <a href=\"index.php?op=modload&name=$ModName&file=$file&req=$return\">"._HERE."</a>.</td>\n"
		."</tr>\n"
		."</table>\n"
		."<br>\n"
		."\n";

?>
<script> 
function redirect()
{ 
window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=<?php echo $file?>&req=<?php echo $return?>"); 
} 
setTimeout("redirect();", 1250); 
</script>
<?php
}

function menu_admin() {
// get vars
	$ModName = basename(dirname(__FILE__));
	$sitename = pnConfigGetVar('sitename');

	preview_mailer();

	$previewHtml = "index.php?op=modload&name=$ModName&file=functions_mail&req=PreviewHTML";
	$previewText ="index.php?op=modload&name=$ModName&file=functions_mail&req=PreviewText";
	echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n"
		."<tr>\n"
		."<td>\n"
		."<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td class=\"pn-normal\"><b>"._NEWSLETTERADMINMENU."</b></td>\n"
		."</tr>\n"
		."</table>\n"
		."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\"><a href=\"admin.php\" title=\""._TBACKTOPNADMIN."\">"._BACKTOPNADMIN."</a></td>\n"
		."<td align=\"center\" class=\"pn-normal\"><a href=\"admin.php?module=pnTresMailer&op=main\" title=\""._TBACKTOMAIN."\">"._BACKTOMAIN."</a></td>\n"
		."<td align=\"center\" class=\"pn-normal\"><a href=\"index.php?op=modload&name=$ModName&file=archives&req=ViewArchives\" title=\""._TVIEWARCHIVES."\">"._VIEWARCHIVES."</a></td>\n"
		."<td align=\"center\" class=\"pn-normal\"><a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewSubscribers\" title=\""._TVIEWSUBSCRIBERS."\">"._VIEWSUBSCRIBERS."</a></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\"><a href=\"index.php?op=modload&name=$ModName&file=vars&req=ViewVars\" title=\""._TVIEWVARS."\">"._VIEWVARS."</a></td>\n"
		."<td align=\"center\" class=\"pn-normal\"><a href=\"index.php?op=modload&name=$ModName&file=modules&req=ViewModules\" title=\""._TVIEWMODULES."\">"._VIEWMODULES."</a></td>\n"
		."<td align=\"center\" class=\"pn-normal\">"._PREVIEWMAILER." <a href=\"$previewHtml\" target=\"preview\" onclick=\"return pntmPopupWindow('$previewHtml','Preview','scrollbars=yes,width=500,height=550,resizable=yes')\" title=\""._TPREVIEWMAILER."\">"
		.""._HTML."</a> / \n"
		."<a href=\"$previewText\" target=\"preview\" onclick=\"return pntmPopupWindow('$previewText','Preview','scrollbars=yes,width=500,height=550,resizable=yes')\" title=\""._TPREVIEWMAILER."\">"
		.""._TEXT."</a></td>\n"
		."<td align=\"center\" class=\"pn-normal\"><a href=\"index.php?op=modload&name=$ModName&file=functions_mail&req=PrepMailer\" title=\""._TSENDMAILER."\">"._SENDMAILER."</a></td>\n"
		."</tr>\n"
		."</table>\n"
		."</td>\n"
		."</tr>\n"
		."</table>\n"
		."<br>\n"
		."\n";
}

function page_headers() {

// get vars
	$sitename = pnConfigGetVar('sitename');

	include('header.php');

	OpenTable();
	echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td class=\"pn-title\">$sitename "._NEWSLETTER."</td>\n"
		."</tr>\n"
		."</table>\n";
	CloseTable();
}

function page_footers() {
// get vars
	$ModName = basename(dirname(__FILE__));
	include("modules/$ModName/pnversion.php");

	OpenTable();
	echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-sub\">$modversion[name] $modversion[version] by <a href=\"$modversion[contact]\">$modversion[author]</a>.</td>\n"
		."</tr>\n"
		."</table>\n";
	CloseTable();

	include('footer.php');
}

function preview_mailer() {
	?>
	<script type="text/javascript">
	<!--
	
	/**
	 * @deprecated
	 */
	function PopWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	
	function pntmPopupWindow(theURL, winName, features) {
		var winInstance = window.open(theURL,winName,features);
		if (winInstance) {
			return false;
		} else {
			// there seems to be an popup-blocker, return true, to execute link
			return true;
		}
	}
	//-->
	</script>
	<?php
}

?>
