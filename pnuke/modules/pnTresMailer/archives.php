<?php
// $Id: archives.php,v 1.6 2005/12/27 21:14:15 kdoerges Exp $
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
// Purpose of file:  pnTresMailer Archives
// ----------------------------------------------------------------------

function ViewArchives($col_sort, $start) {
		
    $prefix = pnConfigGetVar('prefix');		
	  $sitename = pnConfigGetVar('sitename');
// get db connection
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $ModName = basename(dirname(__FILE__));

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
		    $col_sort = "arch_mid DESC";
		}

	  $sql = "SELECT arch_mid FROM $prefix"._nl_archive;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $rows = $result->RecordCount();
		
	  echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-title\"><b>"._ARCHIVESLIST."</b></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"4\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\">";

    if($rows > 50) {
		    prodpaging($start, $rows, $col_sort);
		}

	  echo "</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b><a href=\"index.php?op=modload&name=$ModName&file=archives&req=ViewArchives&col_sort=";
    if($col_sort == 'arch_mid') {
		    echo "arch_mid DESC";
		} else {
		    echo "arch_mid";
		}
	echo "\">"._ISSUE."</a></b></td>\n"
		."<td align=\"center\" class=\"pn-normal\"><b><a href=\"index.php?op=modload&name=$ModName&file=archives&req=ViewArchives&col_sort=";
	if($col_sort == 'arch_date') {
		echo "arch_date DESC";
		} else {
		echo "arch_date";
		}
	echo "\">"._DATE."</a></b></td>\n"
		."<td align=\"center\" class=\"pn-normal\"><b>"._WHO."</b></td>\n"
		."<td align=\"center\" class=\"pn-normal\"><b>"._PREVIEW."</b></td>\n"
		."<td align=\"center\" class=\"pn-normal\"><b>"._IMGDELETE."</b></td>\n"
		."<td align=\"center\" class=\"pn-normal\"><b>"._SENDFIX."</b></td>\n"
		."</tr>\n";

	if($rows == 0) {
	echo "<td align=\"center\" class=\"pn-normal\">---</td>\n"
		."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		."</tr>\n";
		} else {
		$i=1;
		$sql = "SELECT arch_mid, arch_issue, arch_date FROM $prefix"._nl_archive." ORDER BY $col_sort LIMIT $start,50";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }

		while(!$result->EOF) {
		    list($arch_mid, $arch_issue, $arch_date) = $result->fields;
				$result->MoveNext();
			  if ($i % 2) {
				    echo "<tr bgcolor=\"$bgcolor1\">\n";
				} else {
				    echo "<tr>\n";
				}

			  $sub_number = ($i+$start);
			  echo "<td align=\"center\" class=\"pn-normal\">$arch_issue</td>\n"
				    ."<td align=\"center\" class=\"pn-normal\">";
			  $locale = pnConfigGetVar('locale');
			  setlocale (LC_TIME, '$locale');
			  $date = (ml_ftime(_DATEBRIEF, $arch_date));
			  $listUrl = "index.php?op=modload&name=$ModName&file=archives&req=ViewArchiveSub&arch_mid=$arch_mid";
			  $previewHtml = "index.php?op=modload&name=$ModName&file=archives&req=PreviewArchive&arch_mid=$arch_mid";
			  $previewText ="index.php?op=modload&name=$ModName&file=archives&req=PreviewArchiveTxt&arch_mid=$arch_mid";
			  echo "$date</td>\n"
				    ."<td align=\"center\" class=\"pn-normal\"><a href=\"$listUrl\" target=\"preview\" onclick=\"return pntmPopupWindow('$listUrl','Preview','scrollbars=yes,width=500,height=550,resizable=yes');\" title=\""._TLISTARCHIVE."\">"._LISTSUB."</a></td>\n"
				    ."<td align=\"center\" class=\"pn-normal\"><a href=\"$previewHtml\" target=\"preview\" onclick=\"return pntmPopupWindow('$previewHtml','Preview','scrollbars=yes,width=500,height=550,resizable=yes')\" title=\""._TPREVIEWARCHIVE."\">"._HTML."</a>\n"
				    ."/<a href=\"$previewText\" target=\"preview\" onclick=\"return pntmPopupWindow('$previewText','Preview','scrollbars=yes,width=500,height=550,resizable=yes')\" title=\""._TPREVIEWARCHIVE."\">"._TEXT."</a></td>\n"
				    ."<td align=\"center\" class=\"pn-normal\"><a href=\"index.php?op=modload&name=$ModName&file=functions&req=DelArchive&arch_mid=$arch_mid\" title=\""._TDELETEARCHIVE."\">"._IMGDELETE."</a></td>\n"
				    ."<td align=\"center\" class=\"pn-normal\"><a href=\"index.php?op=modload&name=$ModName&file=functions_mail&req=PrepMailerFix&arch_mid=$arch_mid\" title=\""._SENDFIXT."\">"._SENDFIXL."</a></td>\n"
				    ."</tr>\n";
			  $i++;
		}
		}

	echo "</table>\n"
		."<br>\n"
		."\n";

	page_footers();
}

function ViewArchiveSub($arch_mid) {

    $prefix = pnConfigGetVar('prefix');		
	  $sitename = pnConfigGetVar('sitename');
// get db connection
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

	  $ModName = basename(dirname(__FILE__));

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

	  echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-title\"><b>"._SUBSCRIBERSLIST."</b></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._USERNAME."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._EMAIL."</b></td>\n"
		    ."</tr>\n";

	  $i=1;
	  $sql = "SELECT sub_name, sub_email FROM ($prefix"._nl_arch_subscriber.", $prefix"._nl_subscriber.") WHERE $prefix"._nl_arch_subscriber.".sub_reg_id = $prefix"._nl_subscriber.".sub_reg_id AND arch_mid = '$arch_mid' ORDER BY sub_name";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  while(!$result->EOF) {
		    list($sub_name, $sub_email) = $result->fields;

			  if ($i % 2) {
				    echo "<tr bgcolor=\"#f0f0f0\">\n";
				} else {
				    echo "<tr>\n";
				}

			  echo "<td align=\"center\" class=\"pn-normal\">$i</td>\n"
				    ."<td align=\"center\" class=\"pn-normal\">$sub_name</td>\n"
				    ."<td align=\"center\" class=\"pn-normal\">$sub_email</td>\n"
				    ."</tr>\n";
			  $i++;
		}

	  echo "</table>\n";

	  echo "<center><form><input type=\"button\" value=\"Close Window\" onClick=\"window.close()\"></form></center>";
}

function PreviewArchive($arch_mid) {

    $prefix = pnConfigGetVar('prefix'); 
		$sitename = pnConfigGetVar('sitename');
// get db connection
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

	  $ModName = basename(dirname(__FILE__));

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

	  if(empty($arch_mid)) {
		    $sql = "SELECT arch_mid FROM $prefix"._nl_archive." ORDER BY arch_mid DESC LIMIT 1";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
		    list($arch_mid) = $result->fields;
		}

	  $sql = "SELECT * FROM $prefix"._nl_var;
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }

	  $nl_var = $result->GetRowAssoc();

	  $sql = "SELECT arch_message FROM $prefix"._nl_archive." WHERE arch_mid = '$arch_mid'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
       echo _DBREADERROR;
    }

	  list($arch_message) = $result->fields;

	  $arch_message = stripslashes($arch_message);

	// PERSONALIZE
	  if($nl_var[nl_personal] == 1) {
		    $arch_message = str_replace("<!-- [USERNAME] -->", "[USERNAME]", $arch_message);
		}

	  echo "$arch_message\n";

	  echo "<center><form><input type=\"button\" value=\"Close Window\" onClick=\"window.close()\"></form></center>";
}

function PreviewArchiveTxt($arch_mid) {

    $prefix = pnConfigGetVar('prefix');
	  $sitename = pnConfigGetVar('sitename');
// get db connection
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

	  $ModName = basename(dirname(__FILE__));

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

	  if(empty($arch_mid)) {
		    $sql = "SELECT arch_mid FROM $prefix"._nl_archive_txt." ORDER BY arch_mid DESC LIMIT 1";
        $result = $dbconn->Execute($sql);
        if ($dbconn->ErrorNo() != 0) {
            echo _DBREADERROR;
        }
		    list($arch_mid) = $result->fields;
		}

	  $sql = "SELECT * FROM $prefix"._nl_var;
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  $nl_var = $result->GetRowAssoc();

	  $sql = "SELECT arch_message FROM $prefix"._nl_archive_txt." WHERE arch_mid = '$arch_mid'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  list($arch_message) = $result->fields;

	  $arch_message = stripslashes($arch_message);

	  $arch_message = str_replace ("\n", "<br>", $arch_message);

	// PERSONALIZE
	  if($nl_var[nl_personal] == 1) {
		    $arch_message = str_replace("<!-- [USERNAME] -->", "[USERNAME]", $arch_message);
		}

	  echo "$arch_message\n";

	  echo "<center><form><input type=\"button\" value=\"Close Window\" onClick=\"window.close()\"></form></center>";
}

function EditArchive($arch_mid) {

    $prefix = pnConfigGetVar('prefix');
	  $sitename = pnConfigGetVar('sitename');
// get db connection
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

	  $ModName = basename(dirname(__FILE__));

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

	  if(empty($arch_mid)) {
		    $sql = "SELECT arch_mid FROM $prefix"._nl_archive." ORDER BY arch_mid DESC LIMIT 1";
        $result = $dbconn->Execute($sql);
        if ($dbconn->ErrorNo() != 0) {
            echo _DBREADERROR;
        }
		    list($arch_mid) = $result->fields;
		}

	  $sql = "SELECT arch_message FROM $prefix"._nl_archive." WHERE arch_mid = '$arch_mid'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  list($arch[arch_message_html]) = $result->fields;

	  $sql = "SELECT arch_message FROM $prefix"._nl_archive_txt." WHERE arch_mid = '$arch_mid'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  list($arch[arch_message_text]) = $result->fields;

	  foreach($arch as $key => $value) {
		    $arch[$key] = stripslashes($value);
		}

    echo "<form action=\"modules.php\" method=\"post\">\n"
	      ."<input type=\"hidden\" name=\"op\" value=\"modload\">\n"
	      ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">\n"
	      ."<input type=\"hidden\" name=\"file\" value=\"functions\">\n"
	      ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">\n"
	      ."<input type=\"hidden\" name=\"req\" value=\"UpdateArchives\">\n"
	      ."<input type=\"hidden\" name=\"arch[arch_mid]\" value=\"$arch_mid\">\n";

	  echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-title\"><b>"._EDITARCHHTML."</b></td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><textarea name=\"arch[arch_message_html]\" cols=\"80\" rows=\"30\">$arch[arch_message_html]</textarea></td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-title\"><b>"._EDITARCHTEXT."</b></td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><textarea name=\"arch[arch_message_text]\" cols=\"80\" rows=\"30\">$arch[arch_message_text]</textarea></td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><input type=\"submit\" name=\"arch[submit]\" value=\""._UPDATEARCHIVEB."\"> <input type=\"submit\" name=\"arch[submit]\" value=\""._SKIPARCHIVEB."\"></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."</form>\n"
		    ."<br>\n"
		    ."\n";

	  page_footers();
}

function prodpaging($start, $rows, $col_sort) {

	  $ModName = basename(dirname(__FILE__));
	// adjust for fractional page count
    $pages = $rows/50;
	  $whole = round($pages);
	  $fraction = $pages - $whole;
	  if($fraction > 0) {
		    $whole++;
		}
	  $pages = $whole;

	  echo "Pages: ";

	// print link for previous page if not on first page
	  $previous = $start-50;
	  if($previous >= 0) {
		    echo "<a href=\"index.php?op=modload&name=$ModName&file=archives&req=ViewArchives&col_sort=$col_sort&start=$previous\" title=\""._PREVIOUSPAGE."\"><<</a>";
		}

	  for($pagenum = 1; $pagenum <= $pages; $pagenum++) {
		    $startb = (($pagenum*50)-50);
		    $current = (($start/50)+1);
		    if($pagenum != 1) {
			      echo ", ";
			  } else {
			      echo " ";
			  }
		    if($current == 0) {
			      $current = 1;
			  }
		    if($pagenum == $current) {
			      echo "$pagenum";
			  } else {
			      echo "<a href=\"index.php?op=modload&name=$ModName&file=archives&req=ViewArchives&col_sort=$col_sort&start=$startb\" title=\""._GOTOPAGE." $pagenum\">$pagenum</a>";
			  }
		}
	  $pagenum = $pagenum-1;

	// print link for last page in not on last page
	  $next = $start+50;
	  if(($pages > 1) && ($current != $pages)) {
		    echo " <a href=\"index.php?op=modload&name=$ModName&file=archives&req=ViewArchives&col_sort=$col_sort&start=$next\" title=\""._NEXTPAGE."\">>></a>";
		}
}

// func ends here
// Start of Main

// get language definitions
modules_get_language();

// get all of our variables cleanly
list($req, 
	   $start,
	   $col_sort,
	   $arch_mid) = pnVarCleanFromInput('req',
                   		           			'start',
								   										'col_sort',
								   										'arch_mid');


if(empty($req)) {
    $req = '';
}

switch($req) {

    case "ViewArchives":
        ViewArchives($col_sort, $start);
        break;

    case "ViewArchiveSub":
        ViewArchiveSub($arch_mid);
        break;

    case "PreviewArchive":
        PreviewArchive($arch_mid);
        break;

    case "PreviewArchiveTxt":
        PreviewArchiveTxt($arch_mid);
        break;

    case "EditArchive":
        EditArchive($arch_mid);
        break;
}
?>