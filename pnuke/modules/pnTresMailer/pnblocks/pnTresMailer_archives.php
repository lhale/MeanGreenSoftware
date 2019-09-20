<?php
// $Id: pnTresMailer_archives.php,v 1.3 2005/12/28 12:32:59 kdoerges Exp $
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

/********************
* Block Information *
*********************/
function pnTresMailer_pntresmailer_archivesblock_info()
{
    return array('text_type'      => 'pnTresMailer',
                 'module'         => 'pnTresMailer',
                 'text_type_long' => 'NewLetter Archives Block',
                 'allow_multiple' => true,
                 'form_content'   => false,
                 'form_refresh'   => false,
                 'show_preview'   => true);

}

/********************
* Block permission  *
*********************/
function pnTresMailer_pntresmailer_archivesblock_init() {
	pnSecAddSchema('pnTresMailer:pntresmailer_archivesblock:', 'Block title::');
}


function pnTresMailer_pntresmailer_archivesblock_display($blockinfo) {

// get vars		
    $prefix = pnConfigGetVar('prefix');		
    $lang = pnSessionGetVar('lang');

    if (!pnSecAuthAction(0,
                         'pnTresMailer:pntresmailer_archivesblock:',
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

	preview_archive_sb();

	if($pnuid > 1) {
	// registered
	// registered and unsubscribed
	    $output .= "<center>"._NEWSLETTERARCHIVE."<br><br>";
	    $output .= "<table cellspacing=\"0\" cellpadding=\"2\" border=\"0\">\n";
		$output .= "<tr><td align=\"center\" class=\"pn-normal\">"._ISSUE."</td>\n";
		$output .= "<td align=\"center\" class=\"pn-normal\">"._DATE."</td></tr>\n";

		$sql = "SELECT arch_mid, arch_date, arch_issue FROM $prefix"._nl_archive." ORDER BY arch_date DESC LIMIT 5";
	    $result = $dbconn->Execute($sql);
	    if ($dbconn->ErrorNo() != 0) {
	        echo _DBREADERROR;
	    }

		while(!$result->EOF) {
		    list($arch_mid, $arch_date, $arch_issue) = $result->fields;
		    $result->MoveNext();
			$locale = pnConfigGetVar('locale');
			setlocale (LC_TIME, '$locale');
			$date = (ml_ftime(_DATEBRIEF, $arch_date));

			$output .= "<tr><td align=\"center\" class=\"pn-normal\">$arch_issue</td>\n";
			$output .= "<td align=\"center\" class=\"pn-normal\">\n";

			$previewArchiveUrl = "index.php?op=modload&name=pnTresMailer&file=index&req=PreviewArchive&arch_mid=$arch_mid";
			$output .= "<a href=\"$previewArchiveUrl\" target=\"preview\" onclick=\"return pntmPopupWindow('$previewArchiveUrl','Preview','scrollbars=yes,width=500,height=550,resizable=yes')\" title=\""._TPREVIEWARCHIVE."\">$date</a><br>";

			$output .= "</td></tr>\n";
		}

		$output .= "</table><br></center>\n";
	} else {
		// unregistered
		// unregistered and unsubscribed
	    $output .= "<center>"._NEWSLETTERARCHIVE."<br><br>";

		$output .= "<table cellspacing=\"0\" cellpadding=\"2\" border=\"0\">\n";
		$output .= "<tr><td align=\"center\" class=\"pn-normal\">"._ISSUE."</td>\n";
		$output .= "<td align=\"center\" class=\"pn-normal\">"._DATE."</td></tr>\n";

		$sql = "SELECT arch_mid, arch_date, arch_issue FROM $prefix"._nl_archive." ORDER BY arch_date DESC LIMIT 5";
	    $result = $dbconn->Execute($sql);
	    if ($dbconn->ErrorNo() != 0) {
	        echo _DBREADERROR;
	    }	
		while(!$result->EOF) {
		    list($arch_mid, $arch_date, $arch_issue) = $result->fields;
		    $result->MoveNext();
			$locale = pnConfigGetVar('locale');
			setlocale (LC_TIME, '$locale');
			$date = (ml_ftime(_DATEBRIEF, $arch_date));

			$output .= "<tr><td align=\"center\" class=\"pn-normal\">$arch_issue</td>\n";
			$output .= "<td align=\"center\" class=\"pn-normal\">\n";

			$previewArchiveUrl = "index.php?op=modload&name=pnTresMailer&file=index&req=PreviewArchive&arch_mid=$arch_mid";
			$output .= "<a href=\"$previewArchiveUrl\" target=\"preview\" onclick=\"return pntmPopupWindow('$previewArchiveUrl','Preview','scrollbars=yes,width=500,height=550,resizable=yes')\" title=\""._TPREVIEWARCHIVE."\">$date</a><br>";

			$output .= "</td></tr>\n";
		}

		$output .= "</table><br></center>\n";
	}

    $blockinfo['content'] = $output;
    return themesideblock($blockinfo);
}

function preview_archive_sb() {

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