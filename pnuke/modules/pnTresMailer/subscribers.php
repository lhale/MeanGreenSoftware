<?php
// $Id: subscribers.php,v 1.11 2005/12/28 16:17:35 kdoerges Exp $
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
// Purpose of file:  pnTresMailer Subscribers
// ----------------------------------------------------------------------

$ModName = basename(dirname(__FILE__));

modules_get_language();

function ViewSubscribers($col_sort, $start) {
    
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

	  if(!$start) {
		    $start = 0;
		}

	  if (!$col_sort) {
		    $col_sort = "sub_name";
		}

//	Count Subscribers
	  $sql = "SELECT sub_uid FROM $prefix"._nl_subscriber;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  } else {
	      $rows = $result->RecordCount();
		}

	  echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-title\"><b>"._SUBSCRIBERSLIST."</b></td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-sub\">(<a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewUnsub\">"._VIEWUNSUBLIST."</a>)</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-sub\">(<a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=AddSub\">"._ADDNEWSUB."</a>)</td>\n"
		    ."</tr>\n"		
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-sub\">(<a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=AddCsv\">"._ADDNEWCSV."</a>)</td>\n"
		    ."</tr>\n"			
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-sub\">(<a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ImportPNStart\">"._IMPORTPNUSER."</a>)</td>\n"
		    ."</tr>\n"			
   	    ."</table>\n"
		    ."\n"
		    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"4\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\">";

	  if($rows > 25) {
		    prodpaging($start, $rows, $col_sort);
		}

// Begin Listing Subscribers
	  echo "</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"></td>\n"
		    ."<td align=\"left\" class=\"pn-normal\"><b><a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewSubscribers&col_sort=";
	  if($col_sort == 'sub_name') {
		    echo "sub_name DESC";
		} else {
		    echo "sub_name";
		}
	  echo "\">"._USERNAME."</a></b></td>\n"
		    ."<td align=\"left\" class=\"pn-normal\"><b><a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewSubscribers&col_sort=";
	  if($col_sort == 'sub_email') {
		    echo "sub_email DESC";
		} else {
		    echo "sub_email";
		}
	  echo "\">"._SUBEMAIL."</a></b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b><a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewSubscribers&col_sort=";
	  if($col_sort == 'sub_last_date') {
		    echo "sub_last_date DESC";
		} else {
		    echo "sub_last_date";
		}
	  echo "\">"._LAST."</a></b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._EDIT."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._SEND."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._REMOVE."</b></td>\n"
		    ."</tr>\n";

	  if($rows == 0) {
	      echo "<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"left\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"left\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."</tr>\n";
    } else {
		    $i=1;
		    $sql = "SELECT * FROM $prefix"._nl_subscriber." LEFT JOIN $pntable[users] ON (sub_uid = pn_uid)
			                      ORDER BY $col_sort LIMIT $start,25";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
														
		    while(!$result->EOF) {
				    $sub = $result->GetRowAssoc(false);

			      foreach($sub as $key => $value) {
				        $sub[$key] = stripslashes($value);
				    }

				    $result->MoveNext();
			      if ($i % 2) {
				        echo "<tr bgcolor=\"$bgcolor1\">\n";
				    } else {
				        echo "<tr>\n";
				    }

			      $sql2 = "SELECT arch_read FROM $prefix"._nl_arch_subscriber." WHERE sub_reg_id = '$sub[sub_reg_id]' AND arch_date = '".$sub[sub_last_date]."' AND arch_read = '1'";
		        $result2 = $dbconn->Execute($sql2);
	          if ($dbconn->ErrorNo() != 0) {
		            echo _DBREADERROR;
	          }
			      $arch_read_chk = $result2->RecordCount();
			      if($arch_read_chk != 0) {
				        $arch_read = "<font color=\"#ff0000\"><b>(r)</b></font>";
				    } else {
				        $arch_read = "";
				    }

			      $sub[sub_number] = ($i+$start);
			      echo "<td align=\"center\" class=\"pn-normal\">$sub[sub_number]</td>\n";

			      if($sub[sub_uid] > 0) {
				        echo "<td align=\"left\" class=\"pn-normal\"><a href=\"user.php?op=userinfo&uname=$sub[sub_name]\" title=\""._VIEWUSER."\">$sub[sub_name]</a></td>\n";
				    } else {
				        echo "<td align=\"left\" class=\"pn-normal\">$sub[sub_name]</td>\n";
				    }

			      if(strlen($sub[sub_email]) > 14) {
				        $sub_email_f = substr($sub[sub_email], 0, 13);
				        $sub_email_f .= "...";
				    } else {
				        $sub_email_f = $sub[sub_email];
				    }

			      if($sub[sub_email] != $sub[pn_email]) {
				        $fcolor = "#ff0000";
				    } else {
				        $fcolor = "";
				    }

			      echo "<td align=\"left\" class=\"pn-normal\"><a href=\"mailto:$sub[sub_email]\" title=\"$sub[sub_email]\"><font color=\"$fcolor\">$sub_email_f</font></a></td>\n"
				        ."<td align=\"center\" class=\"pn-normal\">";

			      if($sub[sub_last_date] == '0') {
				        $date = '<b>'._NONESENT.'</b>';	
				    } elseif($sub[sub_last_date] == '1') {
				        $date = '<b>'._ARCHSENT.'</b>';	
				    } else {
				        $locale = pnConfigGetVar('locale');
				        setlocale (LC_TIME, '$locale');
				        $date = (ml_ftime(_DATEBRIEF, $sub[sub_last_date]));
				    }
			      echo "$date $arch_read</td>\n"
				        ."<td align=\"center\" class=\"pn-normal\"><a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=EditSubscriber&sub_reg_id=$sub[sub_reg_id]\">"._EDIT."</a></td>\n"
				        ."<td align=\"center\" class=\"pn-normal\"><a href=\"index.php?op=modload&name=$ModName&file=functions_mail&req=SendSingle&sub_reg_id=$sub[sub_reg_id]\">"._SENDONENOW."</a></td>\n"
				        ."<td align=\"center\" class=\"pn-normal\"><a href=\"index.php?op=modload&name=$ModName&file=functions&req=DelSubscriber&sub_reg_id=$sub[sub_reg_id]\">"._REMOVE."</a></td>\n"
				        ."</tr>\n";
			      $i++;
        }
		}

	  echo "</table>\n"
		    ."<br>\n"
		    ."\n";

	  page_footers();
}

function AddSubscribers() {
    
// get vars		
    $prefix = pnConfigGetVar('prefix');
    $sitename = pnConfigGetVar('sitename');
  	$ModName = basename(dirname(__FILE__));
		
// get db connection
    $dbconn =& pnDBGetConn(true);
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

    echo "<form action=\"modules.php\" method=\"post\">"
	      ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
	      ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
	      ."<input type=\"hidden\" name=\"file\" value=\"functions\">"
	      ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
	      ."<input type=\"hidden\" name=\"req\" value=\"AddSubscriber\">";

 	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td><b>"._ADDNEWSUB."</b></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"right\"></td>\n"
		    ."<td>"._FROMPOSTNUKEDATA."</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\">"._SUBNAME.":</td>\n"
		    ."<td><select name=\"sub_pndata\">\n"
		    ."<option value=\"\">"._SELECTUSER."</option>\n";

	  $sql = "SELECT sub_uid FROM $prefix"._nl_subscriber;
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }

	  if($result->RecordCount() > 0) {
		    $sql2 = "SELECT pn_uid, pn_uname, pn_email FROM $pntable[users] ORDER BY pn_uname";
        $result2 = $dbconn->Execute($sql2);
        if ($dbconn->ErrorNo() != 0) {
            echo _DBREADERROR;
        }
		    while(!$result2->EOF) {
				    list($lpnuid, $lpnuname, $lpnemail) = $result2->fields;
						$result2->MoveNext();
			      echo "<option value=\"".$lpnuid.":".$lpnemail.":".$lpnuname."\">$lpnuname</option>\n";
			  }
		} else {
		    $sql3 = "SELECT pn_uid, pn_uname, pn_email FROM $pntable[users] ORDER BY pn_uname";
        $result3 = $dbconn->Execute($sql3);
        if ($dbconn->ErrorNo() != 0) {
            echo _DBREADERROR;
        }
		    while(!$result3->EOF) {
				    list($lpnuid, $lpnuname, $lpnemail) = $result3->fields;
						$result3->MoveNext();
			      $sql4 = "SELECT sub_uid FROM $prefix"._nl_subscriber." WHERE sub_uid = '$lpnuid'";
            $result4 = $dbconn->Execute($sql4);
            if ($dbconn->ErrorNo() != 0) {
                echo _DBREADERROR;
            }
			      $sub_exists = $result4->RecordCount();
			      if($sub_exists == 0) {
				        echo "<option value=\"$lpnuid:$lpnemail:$lpnuname\">$lpnuname</option>\n";
				    }
			  }
		}

	  echo "</select>$sql3</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\"></td>\n"
		    ."<td>"._FROMMANUALDATA."</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\">"._SUBNAME.":</td>\n"
		    ."<td><input type=\"text\" name=\"sub_name\" size=\"40\"></td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\">"._EMAIL.":</td>\n"
		    ."<td><input type=\"text\" name=\"sub_email\" size=\"40\"></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n";

	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td><input type=\"submit\" value=\""._ADDUSER."\"></td>\n"
		    ."</tr></form>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";

	  page_footers();
}

function EditSubscriber($sub_reg_id) {
    
// get vars		
    $prefix = pnConfigGetVar('prefix');
    $sitename = pnConfigGetVar('sitename');
  	$ModName = basename(dirname(__FILE__));
		
// get db connection
    $dbconn =& pnDBGetConn(true);
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

	  $sql = "SELECT * FROM $prefix"._nl_subscriber." LEFT JOIN $pntable[users] ON (sub_uid = pn_uid) WHERE sub_reg_id = '$sub_reg_id'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  $sub = $result->GetRowAssoc(false);

	  foreach($sub as $key => $value) {
		    $sub[$key] = stripslashes($value);
		}

    echo "<form action=\"modules.php\" method=\"post\">"
	      ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
	      ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
	      ."<input type=\"hidden\" name=\"file\" value=\"functions\">"
	      ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
	      ."<input type=\"hidden\" name=\"req\" value=\"EditSub\">"
	      ."<input type=\"hidden\" name=\"sub[sub_reg_id]\" value=\"$sub[sub_reg_id]\">"
	      ."<input type=\"hidden\" name=\"sub[sub_uid]\" value=\"$sub[sub_uid]\">";

	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" colspan=\"2\" class=\"pn-normal\"><b>"._EDITSUBDETAILS."</b></td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\">"._SUBNAME.":</td>\n"
		    ."<td><input type=\"text\" name=\"sub[sub_name]\" value=\"$sub[sub_name]\" size=\"40\"></td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\">"._EMAIL.":</td>\n"
		    ."<td><input type=\"text\" name=\"sub[sub_email]\" value=\"$sub[sub_email]\" size=\"40\"></td>\n"
		    ."</tr>\n";

    if($sub[sub_uid] > 1) {
		    echo "<tr>\n"
			      ."<td align=\"center\" colspan=\"2\" class=\"pn-normal\"><b>"._EDITPNDETAILS."</b></td>\n"
			      ."</tr>\n"
			      ."<tr>\n"
			      ."<td align=\"right\" class=\"pn-normal\">"._SUBNAME.":</td>\n"
			      ."<td><input type=\"text\" name=\"sub[pn_uname]\" value=\"$sub[pn_uname]\" size=\"40\"></td>\n"
			      ."</tr>\n"
			      ."<tr>\n"
			      ."<td align=\"right\" class=\"pn-normal\">"._EMAIL.":</td>\n"
			      ."<td><input type=\"text\" name=\"sub[pn_email]\" value=\"$sub[pn_email]\" size=\"40\"></td>\n"
			      ."</tr>\n"
			      ."</table>\n"
			      ."\n";
		} else {
		    echo "<tr>\n"
			      ."<td align=\"center\" colspan=\"2\" class=\"pn-normal\"><b>"._NOPNDETAILS."</b></td>\n"
			      ."</tr>\n"
			      ."</table>\n"
			      ."\n";
		}

	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td><input type=\"submit\" value=\""._EDITSUB."\"></td>\n"
		    ."</tr></form>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";

	  page_footers();
}

function ViewUnsub($col_sort, $start) {
    
// get vars		
    $prefix = pnConfigGetVar('prefix');
    $sitename = pnConfigGetVar('sitename');
  	$ModName = basename(dirname(__FILE__));
		
// get db connection
    $dbconn =& pnDBGetConn(true);
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
		    $col_sort = "unsub_name";
		}

//	Count Subscribers
	  $sql = "SELECT unsub_reg_id FROM $prefix"._nl_unsubscribe;
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  if(!$result->EOF) {
		    $rows = $result->RecordCount();
		}

	  echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-title\"><b>"._UNSUBSCRIBERSLIST."</b></td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._UNSUBSCRIBERSINFO."</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"4\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\">";

	  if($rows > 50) {
		    prodpaging_unsub($start, $rows, $col_sort);
		}

// Begin Listing Subscribers
    echo "</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"left\" class=\"pn-normal\"><b><a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewUnsub&col_sort=";
    if($col_sort == 'unsub_name') {
		    echo "unsub_name DESC";
		} else {
		    echo "unsub_name";
		}
	  echo "\">"._USERNAME."</a></b></td>\n"
		    ."<td align=\"left\" class=\"pn-normal\"><b><a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewUnsub&col_sort=";
	  if($col_sort == 'unsub_email') {
		    echo "unsub_email DESC";
		} else {
		  echo "unsub_email";
		}
	  echo "\">"._SUBEMAIL."</a></b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b><a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewUnsub&col_sort=";
	  if($col_sort == 'unsub_date') {
		    echo "unsub_date DESC";
		} else {
		    echo "unsub_date";
		}
	  echo "\">"._UNSUBDATE."</a></b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._UNSUBINFO."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._REMOVE."</b></td>\n"
		    ."</tr>\n";

	  if($rows == 0) {
	      echo "<td align=\"left\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"left\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."</tr>\n";
		} else {
		    $i=1;
		    $sql = "SELECT * FROM $prefix"._nl_unsubscribe." ORDER BY $col_sort LIMIT $start,50";
        $result = $dbconn->Execute($sql);
        if ($dbconn->ErrorNo() != 0) {
            echo _DBREADERROR;
        }
		    while(!$result->EOF) {
				    $unsub = $result->GetRowAssoc(false);
						$result->MoveNext();
			      if ($i % 2) {
				        echo "<tr bgcolor=\"$bgcolor1\">\n";
				    } else {
				        echo "<tr>\n";
				    }
		 	      foreach($unsub as $key => $value) {
				        $unsub[$key] = stripslashes($value);
				    }
			      if($sub[sub_uid] > 0) {
				        echo "<td align=\"left\" class=\"pn-normal\"><a href=\"user.php?op=userinfo&uname=$unsub[unsub_name]\" title=\""._VIEWUSER."\">$sub[sub_name]</a></td>\n";
				    } else {
				        echo "<td align=\"left\" class=\"pn-normal\">$unsub[unsub_name]</td>\n";
				    }
			      if(strlen($unsub[unsub_email]) > 14) {
				        $unsub_email_f = substr($unsub[unsub_email], 0, 13);
				        $unsub_email_f .= "...";
				    } else {
				        $unsub_email_f = $unsub[unsub_email];
				    }

			      echo "<td align=\"left\" class=\"pn-normal\"><a href=\"mailto:$unsub[unsub_email]\" title=\"$unsub[unsub_email]\">$unsub_email_f</a></td>\n"
				.        "<td align=\"center\" class=\"pn-normal\">";

			      if($unsub[unsub_date] == '0') {
				        $date = '<b>'._NONESENT.'</b>';	
				    } elseif($unsub[unsub_date] == '1') {
				        $date = '<b>'._ARCHSENT.'</b>';	
				    } else {
				        $locale = pnConfigGetVar('locale');
				        setlocale (LC_TIME, '$locale');
				        $date = (ml_ftime(_DATEBRIEF, $unsub[unsub_date]));
				    }
				    $viewUrl = "index.php?op=modload&name=$ModName&file=subscribers&req=PreviewUnsub&unsub_reg_id=$unsub[unsub_reg_id]";
			      echo "$date</td>\n"
				        ."<td align=\"center\" class=\"pn-normal\"><a href=\"$viewUrl\" target=\"preview\" onclick=\"return pntmPopupWindow('$viewUrl','Preview','scrollbars=yes,width=600,height=400,resizable=yes')\">"._VIEW."</a></td>\n"
				        ."<td align=\"center\" class=\"pn-normal\"><a href=\"index.php?op=modload&name=$ModName&file=functions&req=DelUnsub&sub_reg_id=$unsub[unsub_reg_id]\">"._REMOVE."</a></td>\n"
				        ."</tr>\n";
			      $i++;
			  }
		}

	  echo "</table>\n"
		    ."<br>\n"
		    ."\n";

	  page_footers();
}

function prodpaging($start, $rows, $col_sort) {

    $ModName = basename(dirname(__FILE__));

	// adjust for fractional page count
	  $pages = $rows/25;
	  $whole = round($pages);
	  $fraction = $pages - $whole;
	  if($fraction > 0) {
		    $whole++;
		}
	  $pages = $whole;

	  echo "Pages: ";

	// print link for previous page if not on first page
	  $previous = $start-25;
	  if($previous >= 0) {
		    echo "<a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewSubscribers&col_sort=$col_sort&start=$previous\" title=\""._PREVIOUSPAGE."\"><<</a>";
		}

	  for($pagenum = 1; $pagenum <= $pages; $pagenum++) {
		    $startb = (($pagenum*25)-25);
		    $current = (($start/25)+1);
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
			      echo "<a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewSubscribers&col_sort=$col_sort&start=$startb\" title=\""._GOTOPAGE." $pagenum\">$pagenum</a>";
			  }
		}
	  $pagenum = $pagenum-1;

	// print link for last page in not on last page
	  $next = $start+25;
	  if(($pages > 1) && ($current != $pages)) {
		    echo " <a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewSubscribers&col_sort=$col_sort&start=$next\" title=\""._NEXTPAGE."\">>></a>";
		}
}

function prodpaging_unsub($start, $rows, $col_sort) {

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
		    echo "<a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewUnsub&col_sort=$col_sort&start=$previous\" title=\""._PREVIOUSPAGE."\"><<</a>";
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
			      echo "<a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewUnsub&col_sort=$col_sort&start=$startb\" title=\""._GOTOPAGE." $pagenum\">$pagenum</a>";
			  }
		}
	  $pagenum = $pagenum-1;

	// print link for last page in not on last page
	  $next = $start+50;
	  if(($pages > 1) && ($current != $pages)) {
		    echo " <a href=\"index.php?op=modload&name=$ModName&file=subscribers&req=ViewUnsub&col_sort=$col_sort&start=$next\" title=\""._NEXTPAGE."\">>></a>";
		}
}

function PreviewUnsub($unsub_reg_id) {

// get vars		
    $prefix = pnConfigGetVar('prefix');
    $sitename = pnConfigGetVar('sitename');
  	$ModName = basename(dirname(__FILE__));
		
// get db connection
    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

	  $sql = "SELECT * FROM $prefix"._nl_unsubscribe." WHERE unsub_reg_id = '$unsub_reg_id'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  $unsub = $result->GetRowAssoc(false);

	  foreach($unsub as $key => $value) {
		    $unsub[$key] = stripslashes($value);
		}

	  $locale = pnConfigGetVar('locale');
	  setlocale (LC_TIME, '$locale');

	  $unsub[unsub_date] = (ml_ftime(_DATEBRIEF, $unsub[unsub_date]));
	  $unsub[unsub_last_date] = (ml_ftime(_DATEBRIEF, $unsub[unsub_last_date]));

	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._UNSUBPRESUBID.":</b></td>\n"
		    ."<td class=\"pn-normal\">$unsub[unsub_reg_id]</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._UNSUBPREDATE.":</b></td>\n"
		    ."<td class=\"pn-normal\">$unsub[unsub_date]</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._UNSUBPREPNUID.":</b></td>\n"
		    ."<td class=\"pn-normal\">";

	  if($unsub[unsub_uid] == 0) {
		    echo "Un-Registered";
		} else {
		    echo "$unsub[unsub_uid]";
		}

	  echo "</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._UNSUBPRENAME.":</b></td>\n"
		    ."<td class=\"pn-normal\">$unsub[unsub_name]</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._UNSUBPREEMAIL.":</b></td>\n"
		    ."<td class=\"pn-normal\">$unsub[unsub_email]</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._UNSUBPRELAST.":</b></td>\n"
		    ."<td class=\"pn-normal\">";

	  if($unsub[unsub_last_date] == 0) {
		    echo ""._UNSUBPRENONE."";
		} else {
		    echo "$unsub[unsub_last_date]";
		}

	  echo "</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._UNSUBPREREC.":</b></td>\n"
		    ."<td class=\"pn-normal\">$unsub[unsub_received]</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><a title=\""._UNSUBPREIPT."\"><b>"._UNSUBPRETP.":</b></a></td>\n"
		    ."<td class=\"pn-normal\">$unsub[unsub_remote_addr]</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><a title=\""._UNSUBPREBROWT."\"><b>"._UNSUBPREBROW.":</b></a></td>\n"
		    ."<td class=\"pn-normal\">$unsub[unsub_user_agent]</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><a title=\""._UNSUBPREWHOT."\"><b>"._UNSUBPREWHO.":</b></a></td>\n"
		    ."<td class=\"pn-normal\">$unsub[unsub_who]</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";	

	  return;
}

// new integrated import functions

function ImportFromPN() {
// get vars
    $prefix = pnConfigGetVar('prefix');
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

	  $sql = "SELECT * FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $nl_var = $result->GetRowAssoc(false);
		
	  page_headers();

	  menu_admin();

    echo "<form action=\"modules.php\" method=\"post\">"
	      ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
	      ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
	      ."<input type=\"hidden\" name=\"file\" value=\"subscribers\">"
	      ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
	      ."<input type=\"hidden\" name=\"req\" value=\"ImportUsers\">";

	  echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\"><b>"._IMPORTFROMPNDBTITLE."</b></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\">"._IMPORTFROMPNDB."</td>\n"
		    ."</tr>\n";

    if($nl_var[nl_resub] == 0) {
		    echo "<tr>";
		    echo "<td align=\"center\"><font color=\"#FF0000\">"._NODUPSUBSCRIBER."</font></td>\n";				
				echo "</tr>";
		} 
				
		echo "</table>\n"
		    ."\n"
		    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><input type=\"submit\" value=\"Update Newsletter\"></form></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n";
	  page_footers();
}

function ImportUsers() {
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

// get mod vars
	  $sql = "SELECT * FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $nl_var = $result->GetRowAssoc(false);
		
	  page_headers();

	  menu_admin();

	  $i=0;
	  $dup=0;
		$unsub_count = 0;
	  $sql = "SELECT pn_uid, pn_uname, pn_email FROM ".$prefix."_users WHERE pn_uid > '1'";
    $dbupdate = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  while(!$dbupdate->EOF) {
		    list($pn_uid, $pn_uname, $pn_email) = $dbupdate->fields;
				$dbupdate->MoveNext();
		    $sql2 = "SELECT sub_uid FROM ".$prefix."_nl_subscriber WHERE sub_uid = '$pn_uid' OR sub_email = '$pn_email'";
        $dbupdate2 = $dbconn->Execute($sql2);
        if ($dbconn->ErrorNo() != 0) {
            echo _DBREADERROR;
        }
		    $dup_check = $dbupdate2->RecordCount();
				
// check if resub				
		    if($nl_var[nl_resub] == 0) {
			      $sql = "SELECT * FROM $prefix"._nl_unsubscribe." WHERE unsub_email = '$sub_email'";
		        $result = $dbconn->Execute($sql);
	          if ($dbconn->ErrorNo() != 0) {
		            echo _DBREADERROR;
	          }
			      $unsub_check = $result->RecordCount();
			  }
				
		    if (($dup_check == 0) & ($unsub_check == 0)) {
			      $sql3 = "INSERT INTO ".$prefix."_nl_subscriber (sub_uid, sub_name, sub_email) VALUES ('$pn_uid', '$pn_uname', '$pn_email')";
            $dbupdate3 = $dbconn->Execute($sql3);
            if ($dbconn->ErrorNo() != 0) {
                echo _DBINSERTERROR;
            }
			  } else {
				    if ($dup_check > 0) {
			          $dup++;
						}
						if ($unsub_check > 0) {
						    $unsub_count++;
						}
			  }
		    $i++;
		}

	  echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\" bordercolor=\"#e4e4e4\" bgcolor=\"#f4f4f4\">\n"
		    ."<tr>\n"
		    ."<td>\n"
		    ."\n"
		    ."<table align=\"center\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" class=\"pn-normal\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\">"._IMPORTFROMPNDBCOMPLETE."<br>$i "._IMPORTEDUSER."<br>$dup "._DUPDELETED."<br>$unsub_count "._IMPORTRESUBREMOVED."</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."</body>\n"
		    ."</html>\n";
	  page_footers();				
}

// Import email from CSV

function AddCsv() {
// get language definitions
    modules_get_language();
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

// get mod vars
	  $sql = "SELECT * FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $nl_var = $result->GetRowAssoc(false);

// write header		
	  page_headers();

// write mod admin
	  menu_admin();

    echo "<form action=\"modules.php\" method=\"post\">"
	      ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
	      ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
	      ."<input type=\"hidden\" name=\"file\" value=\"subscribers\">"
	      ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
	      ."<input type=\"hidden\" name=\"req\" value=\"RunCsv\">";

	  echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pagetitle\"><b>"._IMPORTCSVTITLE."</b></td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"main\">"._IMPORTCSVHELP1."</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"main\">"._IMPORTCSVHELP2."</td>\n"
		    ."</tr>\n";

    if($nl_var[nl_resub] == 0) {
		    echo "<tr>";
		    echo "<td align=\"center\"><font color=\"#FF0000\">"._NODUPSUBSCRIBER."</font></td>\n";				
				echo "</tr>";
		} 

		echo "<tr>\n"
		    ."<td align=\"center\"><textarea cols=\"50\" rows=\"20\" name=\"csv\"></textarea></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"main\"><input type=\"submit\" value=\""._IMPORTCSVSTART."\"></form></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n";

    page_footers();
}

function RunCsv($csv) {
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

// get mod vars
	  $sql = "SELECT * FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $nl_var = $result->GetRowAssoc(false);

// start		
    $i = 0;
	  $dup_count = 0;
	  $blank_count = 0;
    $unsub_count = 0;		
	  $data = explode("\r\n", $csv);
	  foreach ($data AS $k => $v) {
		    $v = addslashes($v);
        $i++;
		    $sub_data = explode(",", $v);
		    $rpl_array = array(" ", "\"", "&quot;", "'", "!", "?", "<", ">", ",", ";", ":", "[", "]", "(", ")", "www.");
		    $sub_email = str_replace($rpl_array, "", $sub_data[1]);
// check if duplicate entry
		    $sql = "SELECT sub_reg_id FROM $prefix"._nl_subscriber." WHERE sub_email = '$sub_data[1]'";
        $result = $dbconn->Execute($sql);
        if ($dbconn->ErrorNo() != 0) {
            echo _DBREADERROR;
        }
		    $dup_check = $result->RecordCount();
// check if resub				
		    if($nl_var[nl_resub] == 0) {
			      $sql = "SELECT * FROM $prefix"._nl_unsubscribe." WHERE unsub_email = '$sub_email'";
		        $result = $dbconn->Execute($sql);
	          if ($dbconn->ErrorNo() != 0) {
		            echo _DBREADERROR;
	          }
			      $unsub_check = $result->RecordCount();
			  }
			
			  if($dup_check > 0) {
				    $dup_count++;
				} elseif($v == '') {
				    $blank_count++;
				} elseif($unsub_check > 0) {
				    $unsub_count++;
				} else {
				    $sql = "INSERT INTO $prefix"._nl_subscriber." (sub_name, sub_email) 
					                 VALUES ('$sub_data[0]', '$sub_email')";
            $result = $dbconn->Execute($sql);
            if ($dbconn->ErrorNo() != 0) {
                echo _DBINSERTERROR;
            }
				}
		}

	  echo "<br>\n"
		    ."<table width=\"626\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\" bordercolor=\"#e4e4e4\" bgcolor=\"#f4f4f4\">\n"
		    ."<tr>\n"
		    ."<td>\n"
		    ."\n"
		    ."<table align=\"center\" width=\"626\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" class=\"main\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\">"._IMPORTPNSUCCESS."<br>"._IMPORTTHERE."<u>$i </u>"._IMPORTEDUSER."<br>"._IMPORTTHERE."<u>$dup_count</u>"._IMPORTDUPREMOVED."<br>"._IMPORTTHERE."<u>$blank_count</u>"._IMPORTBLANKREMOVED."<br>"._IMPORTTHERE."<u>$unsub_count</u>"._IMPORTRESUBREMOVED."</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."</body>\n"
		    ."</html>\n";

	  page_footers();
}

// Start main 

if(empty($req)) {
    $req = '';
}


// get all of our variables cleanly
list($req, 
	   $start,
	   $col_sort,
	   $sub_reg_id,
	   $unsub_reg_id,
		 $csv)          = pnVarCleanFromInput('req',
                   		               	    'start',
										  										'col_sort',
										  										'sub_reg_id',
										  										'unsub_reg_id',
																					'csv');

switch($req) {

    case "ViewSubscribers":
        ViewSubscribers($col_sort, $start);
        break;
		
    case "AddSub":
        AddSubscribers();
        break;		

    case "EditSubscriber":
        EditSubscriber($sub_reg_id);
        break;

    case "ViewUnsub":
        ViewUnsub($col_sort, $start);
        break;

    case "PreviewUnsub":
        PreviewUnsub($unsub_reg_id);
        break;

    case "ImportUsers":
        ImportUsers();
        break;

    case "ImportPNStart":
        ImportFromPN();
        break;

    case "AddCsv":
        AddCsv();
        break;

    case "RunCsv":
        RunCsv($csv);
        break;
			
}
?>