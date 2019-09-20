<?php // $Id: index.php,v 1.8 2005/12/28 16:16:37 kdoerges Exp $ $Name:  $
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

// ======================================================================
// THESE SETTINGS CAN BE ALTERED


$resub_redirect = 1; // resubscriber page redirect on=1 off=0
$sub_redirect = 1; // subscriber page redirect on=1 off=0
$test_email_addr = 1; // test the email address domain on=1 off=0


// YOU SHOULD NOT EDIT BELOW THIS LINE
// ======================================================================

function Subscriber($col_sort, $start)
{
    
    $prefix = pnConfigGetVar('prefix');
	$ModName = basename(dirname(__FILE__));
		
    $sitename = pnConfigGetVar('sitename');
	$pnuid = pnUserGetVar('uid');
	$pnuname = pnUserGetVar('uname');
	$pnemail = pnUserGetVar('email');

    list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();

    include("modules/$ModName/common.php");
	page_headers('');
	include("modules/$ModName/pntables.php");

	preview_mailer();

	// if this is a registered user
    if($pnuid > 0) {
	    $sql = "SELECT sub_reg_id, sub_name, sub_email, sub_last_date FROM $prefix"._nl_subscriber." WHERE sub_uid = '$pnuid'";
		$result = $dbconn->Execute($sql);
	    if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	    }
	    $sub_check = $result->RecordCount();
        if ($sub_check > 0) {
	        list($sub_reg_id, $sub_name, $sub_email, $sub_last_date) = $result->fields;
		}

		// if this registered user is not subscribed
		if($sub_check == 0) {
            echo "<form action=\"modules.php\" method=\"post\">"
	            ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
		        ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
		        ."<input type=\"hidden\" name=\"file\" value=\"index\">"
		        ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
		        ."<input type=\"hidden\" name=\"req\" value=\"AddSubSelf\">"
		        ."<input type=\"hidden\" name=\"sub_uid\" value=\"$pnuid\">"
		        ."<input type=\"hidden\" name=\"sub_name\" value=\"$pnuname\">";
	
		    echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		        ."<tr>\n"
		        ."<td align=\"center\">"._INTROA." <b>$sitename</b> "._INTROB."</td>\n"
		        ."</tr>\n"
		        ."</table>\n"
		        ."\n"
		        ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		        ."<tr>\n"
		        ."<td align=\"center\"><b><u>"._NEWSUBHEAD."</u></b></td>\n"
		        ."</tr>\n"
		        ."</table>\n"
		        ."\n"
		        ."<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		        ."<tr>\n"
		        ."<td align=\"right\">"._USERNAME.":</td>\n"
		        ."<td><b>$pnuname</b></td>\n"
		        ."</tr>\n"
		        ."<tr>\n"
		        ."<td align=\"right\">"._EMAIL.":</td>\n"
		        ."<td><input type=\"text\" name=\"sub_email\" value=\"$pnemail\" size=\"40\"></td>\n"
		        ."</tr>\n"
		        ."</table>\n"
		        ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				."<tr>\n"
				."<td align=\"center\"><input type=\"submit\" value=\""._SUBSCRIBE."\"></td>\n"
				."</tr>\n"
				."</table></form>\n"
				."<br>\n";
			// if this registered user is subscribed
        } else {
            if($sub_last_date == 0) {
			    $sub_last_date = _NONESENT;
			} else {
			    $locale = pnConfigGetVar('locale');
			    setlocale (LC_TIME, '$locale');
			    $sub_last_date = (ml_ftime(_DATELONG, $sub_last_date));
			}

		    echo "<form action=\"modules.php\" method=\"post\">"
			    ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
			    ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
			    ."<input type=\"hidden\" name=\"file\" value=\"index\">"
			    ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
			    ."<input type=\"hidden\" name=\"req\" value=\"UpdateSubSelf\">"
			    ."<input type=\"hidden\" name=\"sub_reg_id\" value=\"$sub_reg_id\">";
	
			echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
			    ."<tr>\n"
			    ."<td align=\"center\">"._INTROA." <b>$sitename</b> "._INTROB."</td>\n"
			    ."</tr>\n"
			    ."</table>\n"
			    ."\n"
			    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
			    ."<tr>\n"
			    ."<td align=\"center\"><b><u>"._CURRENTSUBHEAD."</u></b></td>\n"
			    ."</tr>\n"
			    ."</table>\n"
			    ."<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				."<tr>\n"
				."<td align=\"right\">"._USERNAME.":</td>\n"
				."<td><b>$sub_name</b></td>\n"
				."</tr>\n"
				."<tr>\n"
				."<td align=\"right\">"._EMAIL.":</td>\n"
				."<td><input type=\"text\" name=\"sub_email\" value=\"$sub_email\" size=\"40\"></td>\n"
				."</tr>\n"
				."<tr>\n"
				."<td align=\"right\">"._LASTMAILER.":</td>\n"
				."<td><b>$sub_last_date</b></td>\n"
				."</tr>\n"
				."</table>\n"
				."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				."<tr>\n"
				."<td align=\"center\"><input type=\"submit\" value=\""._UPDATE."\"></td>\n"
				."</tr>\n"
				."</table></form>\n"
				."<br>\n";

		    echo "<form action=\"modules.php\" method=\"post\">"
			    ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
			    ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
			    ."<input type=\"hidden\" name=\"file\" value=\"index\">"
			    ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
			    ."<input type=\"hidden\" name=\"req\" value=\"DelSubSelf\">"
			    ."<input type=\"hidden\" name=\"sub_reg_id\" value=\"$sub_reg_id\">";
	
			echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
			    ."<tr>\n"
				."<td align=\"center\">"._UNSUBINFOA." <b>$sitename</b> "._UNSUBINFOB."</td>\n"
				."</tr>\n"
			    ."</table>\n"
				."\n"
				."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				."<tr>\n"
				."<td align=\"center\"><b><u>"._UNSUBHEAD."</u></b></td>\n"
				."</tr>\n"
				."</table>\n"
				."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				."<tr>\n"
				."<td align=\"center\"><input type=\"submit\" value=\""._UNSUB."\"></td>\n"
				."</tr>\n"
				."</table></form>\n"
				."<br>\n";
            }

	// if this is not a registered user
    } else {
	      $sql = "SELECT nl_unreg FROM $prefix"._nl_var."";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
		    list($nl_unreg) = $result->fields;

		// if unregistered users are allowed to subscribe
		    if($nl_unreg == 1) {

		        echo "<form action=\"modules.php\" method=\"post\">"
			          ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
			          ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
			          ."<input type=\"hidden\" name=\"file\" value=\"index\">"
			          ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
			          ."<input type=\"hidden\" name=\"req\" value=\"AddSubSelf\">";
	
			      echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\">"._INTROA." <b>$sitename</b> "._INTROBUNREG."</td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."\n"
				        ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\"><b><u>"._NEWSUBHEAD."</u></b></td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."\n"
				        ."<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"right\">"._USERNAME.":</td>\n"
				        ."<td><input type=\"text\" name=\"sub_name\" size=\"40\"></td>\n"
				        ."</tr>\n"
				        ."<tr>\n"
				        ."<td align=\"right\">"._EMAIL.":</td>\n"
				        ."<td><input type=\"text\" name=\"sub_email\" size=\"40\"></td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."\n"
				        ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\"><input type=\"submit\" value=\""._SUBSCRIBE."\"></td>\n"
				        ."</tr>\n"
				        ."</table></form>\n"
				        ."<br>\n"
				        ."\n";

            echo "<form action=\"modules.php\" method=\"post\">"
			          ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
			          ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
			          ."<input type=\"hidden\" name=\"file\" value=\"index\">"
			          ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
			          ."<input type=\"hidden\" name=\"req\" value=\"DelSubSelfUnreg\">";
	
			      echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\">"._UNSUBINFOA." <b>$sitename</b> "._UNSUBINFOBUNREG."</td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."\n"
				        ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\"><b><u>"._UNSUBHEAD."</u></b></td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."\n"
				        ."<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"right\">"._USERNAME.":</td>\n"
				        ."<td><input type=\"text\" name=\"sub_name\" size=\"40\"></td>\n"
				        ."</tr>\n"
				        ."<tr>\n"
				        ."<td align=\"right\">"._EMAIL.":</td>\n"
				        ."<td><input type=\"text\" name=\"sub_email\" size=\"40\"></td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."\n"
				        ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\"><input type=\"submit\" value=\""._UNSUB."\"></td>\n"
				        ."</tr>\n"
				        ."</table></form>\n"
				        ."<br>\n"
				        ."\n";

		        echo "<form action=\"modules.php\" method=\"post\">"
			          ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
			          ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
			          ."<input type=\"hidden\" name=\"file\" value=\"index\">"
			          ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
			          ."<input type=\"hidden\" name=\"req\" value=\"LostUsername\">";
	
			      echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\">"._LOSTUSERNAME."</td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."\n"
				        ."<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"right\">"._EMAIL.":</td>\n"
				        ."<td><input type=\"text\" name=\"sub_email\" size=\"40\"></td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."\n"
				        ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\"><input type=\"submit\" value=\""._GETLOSTNAME."\"></td>\n"
				        ."</tr>\n"
				        ."</table></form>\n"
				        ."<br>\n"
				        ."\n";

		// if unregistered users are NOT allowed to subscribe
        } else {
	
            echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\">"._NOUNREGSUBSCRIPT."</td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."<br>\n"
				        ."\n";
        }
    }


	  if(!$start) {
		    $start = 0;
		}

	  if (!$col_sort) {
		    $col_sort = "arch_date DESC";
		}


	  $sql = "SELECT arch_mid FROM $prefix"._nl_archive;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	
	  if(!$result->EOF) {
		    $rows = $result->RecordCount();
		}

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
		."<td align=\"center\" class=\"pn-normal\"><b>"._ISSUE."</b></td>\n"
		."<td align=\"center\" class=\"pn-normal\"><b>"._DATE."</b></td>\n"
		."<td align=\"center\" class=\"pn-normal\"><b>"._PREVIEW."</b></td>\n"
		."</tr>\n";

	if($rows == 0) {
	echo "<td align=\"center\" class=\"pn-normal\">---</td>\n"
		."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		."</tr>\n";
		} else {
		$i=1;
		$sql = "SELECT arch_mid, arch_date, arch_issue FROM $prefix"._nl_archive." ORDER BY $col_sort LIMIT $start,50";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
			
		while(!$result->EOF) {
		  list($arch_mid, $arch_date, $arch_issue) = $result->fields;
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
			$previewUrl = "index.php?op=modload&name=$ModName&file=index&req=PreviewArchive&arch_mid=$arch_mid";
			echo "$date</td>\n"
				."<td align=\"center\" class=\"pn-normal\"><a href=\"$previewUrl\" target=\"preview\" onclick=\"return pntmPopupWindow('$previewUrl','Preview','scrollbars=yes,width=500,height=550,resizable=yes')\" title=\""._TPREVIEWARCHIVE."\">"._IMGPREVIEW."</a></td>\n"
				."</tr>\n";
			$i++;
			}
		}

	echo "</table>\n"
		."<br>\n"
		."\n";

	$privacyUrl = "index.php?op=modload&name=$ModName&file=index&req=Privacy";
	echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-normal\"><a href=\"$privacyUrl\" target=\"preview\" onclick=\"return pntmPopupWindow('$privacyUrl','Preview','scrollbars=yes,width=500,height=550,resizable=yes')\"><b>"._PRIVACYLINK."</b></a></td>\n"
		."</tr>\n"
		."</table>\n";

	page_footers('');
}

function PreviewArchive($arch_mid) {

// get vars
    $prefix = pnConfigGetVar('prefix');
    $sitename = pnConfigGetVar('sitename');
	  $ModName = basename(dirname(__FILE__));
// get db connection		
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  include("modules/$ModName/common.php");

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
		$arch_message = str_replace("<!-- [USERNAME] -->", "[FRIEND]", $arch_message);
		}

	echo "$arch_message\n";

	echo "<center><form><input type=\"button\" value=\"Close Window\" onClick=\"window.close()\"></form></center>";
}

function Privacy() {

    $prefix = pnConfigGetVar('prefix');
    $sitename = pnConfigGetVar('sitename');

	  $ModName = basename(dirname(__FILE__));

	  include("modules/$ModName/common.php");

	echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"center\" class=\"pn-title\"><b>"._PRIVACYTITLE."</b></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td class=\"pn-normal\">"._PRIVACYSTATEMENT."</td>\n"
		."</tr>\n"
		."</table>\n"
		."<br>\n";

	echo "<center><form><input type=\"button\" value=\"Close Window\" onClick=\"window.close()\"></form></center>";
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
		    echo "<a href=\"index.php?op=modload&name=$ModName&file=index&req=ViewArchives&col_sort=$col_sort&start=$previous\" title=\""._PREVIOUSPAGE."\"><<</a>";
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
			      echo "<a href=\"index.php?op=modload&name=$ModName&file=index&req=ViewArchives&col_sort=$col_sort&start=$startb\" title=\""._GOTOPAGE." $pagenum\">$pagenum</a>";
			  }
		}
	  $pagenum = $pagenum-1;

	// print link for last page in not on last page
	  $next = $start+50;
	  if(($pages > 1) && ($current != $pages)) {
		    echo " <a href=\"index.php?op=modload&name=$ModName&file=index&req=ViewArchives&col_sort=$col_sort&start=$next\" title=\""._NEXTPAGE."\">>></a>";
		}
}

function AddSubSelf($sub_uid, $sub_name, $sub_email) {
    global $resub_redirect, $sub_redirect, $test_email_addr;

    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
		
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  include("modules/$ModName/pnversion.php");
	  include("modules/$ModName/common.php");

	  if($sub_email == '') {
		    page_headers('');
		    echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
			      ."<tr>\n"
			      ."<td align=\"center\" class=\"pn-normal\">"._SELFSUBSCRIBERMISS." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
			      ."</tr>\n"
			      ."</table>\n"
			      ."<br>\n"
			      ."\n";
		    ?>
			<script> 
			function redirect()
			{ 
			window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
			} 
			setTimeout("redirect();", 1250); 
			</script>
        <?php
		    page_footers('');
		    return;
		}

	  $sql = "SELECT * FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $nl_var = $result->GetRowAssoc();

	  foreach($nl_var as $key => $value) {
		    $nl_var[$key] = stripslashes($value);
		}

	  if($nl_var[nl_resub] == '0') {
		    $sql = "SELECT * FROM $prefix"._nl_unsubscribe." WHERE unsub_email = '$sub_email'";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
		    $dup_check = $result->RecordCount();
		    if($dup_check > 0) {
			      page_headers('');
			      echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\" class=\"pn-normal\">"._IDUPUNSUBSCRIBER." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."<br>\n"
				        ."\n";

			      if($resub_redirect == 0) {
				        page_footers('');
				        return;
				    }

			      ?>
				<script> 
				function redirect()
				{ 
				window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
				} 
				setTimeout("redirect();", 4000); 
				</script>
			  <?php
			  page_footers('');
			      return;
		    }
    }

	  if(sub_uid > 1) {
	      $sql = "INSERT INTO $prefix"._nl_subscriber." (sub_uid, sub_name, sub_email) VALUES ('$sub_uid', '$sub_name', '$sub_email')";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBINSERTERROR;
	      }
		} else {
		    $sql = "SELECT * FROM $prefix"._nl_subscriber." WHERE sub_email = '$sub_email'";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
		    $dup_check = $result->RecordCount();
		    if($dup_check > 0) {
			      page_headers('');
			      echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\" class=\"pn-normal\">"._DUPSUBSCRIBER." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."<br>\n"
				        ."\n";

			      if($resub_redirect == 0) {
				        page_footers('');
				        return;
				    }

			?>
				<script> 
				function redirect()
				{ 
				window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
				} 
				setTimeout("redirect();", 4000); 
				</script>
			<?php
			      page_footers('');
			      return;
			  }

		    include("modules/$ModName/email_test.php");
		    $result = valid_email($sub_email, $ModName);
		    if($result == 0 AND $test_email_addr == 1) {
			      page_headers('');
			      echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\" class=\"pn-normal\">"._SELFSUBSCRIBERBAD." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."<br>\n"
				        ."\n";
			?>
				<script> 
				function redirect()
				{ 
				window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
				} 
				setTimeout("redirect();", 1250); 
				</script>
			<?php
			      page_footers('');
			      return;
			  }
	
	      $sql = "INSERT INTO $prefix"._nl_subscriber." (sub_uid, sub_name, sub_email) VALUES ('$sub_uid', '$sub_name', '$sub_email')";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBINSERTERROR;
	      }
		}
	  list($date) = getdate();
	  $locale = pnConfigGetVar('locale');
	  setlocale (LC_TIME, '$locale');
	  $display_date = (ml_ftime(_DATELONG, $date));

	  $sql = "SELECT nl_subject, nl_name, nl_email, nl_url, nl_sample FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  list($nl_subject, $nl_name, $nl_email, $nl_url, $nl_sample) = $result->fields;

	  $nl_subject = stripslashes($nl_subject);
	  $nl_name = stripslashes($nl_name);

	  $message = "<b>"._THANKYOUFORSUB." $display_date.</b><br><br>"._IFSUBINERROR."<br><br><a href=\"$nl_url/index.php?op=modload&name=$ModName&file=index\">$nl_url</a>.<br><br>"._THANKYOU.",<br><a href=\"mailto:$nl_email\">$nl_name</a>";

	  $footer_message = ""._FOOTERMESSAGE."";

	  $message .= "<br><br><br><br>$footer_message";

	  $mailto .= "$sub_name<$sub_email>";

	  $headers = "Errors: $nl_name<$nl_email>\n";
	  $headers .= "Reply-To: $nl_name<$nl_email>\n";
	  $headers .= "Return-Path: $nl_name<$nl_email>\n";
	  $headers .= "FROM: $nl_name<$nl_email>\n";
	  $headers .= "MIME-Version: 1.0\n";
	  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
	  $headers .= "Content-Transfer-Encoding: 7bit\n";
	  $headers .= "Content-Disposition: inline;\n";
	  $headers .= "Content-Base: $nl_url\n";

	  $to = "$mailto";

	  mail("$to", "$nl_subject", "$message", "$headers");

	  if($nl_sample == 1) {
		    $sql = "SELECT arch_message FROM $prefix"._nl_archive." ORDER BY arch_date DESC LIMIT 1";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
		    $arch_check = $result->RecordCount();
		    if($arch_check > 0) {
			      list($message) = $result->fields;
			      $message = stripslashes($message);
			      $message .= "\n\n"._FOOTERMESSAGE."";

			      mail("$to", "$nl_subject", "$message", "$headers");

			      $sql = "UPDATE $prefix"._nl_subscriber." SET sub_last_date = '1' WHERE sub_email = '$sub_email'";
		        $result = $dbconn->Execute($sql);
	          if ($dbconn->ErrorNo() != 0) {
		            echo _DBUPDATEERROR;
	          }
			  }  
		}

	  $to = "$nl_name<$nl_email>";

	  $message = ""._JUSTRECEIVEDSUB."<br><br>"._SUBSCRIBERNAME.": <b>$sub_name</b><br>"._SUBSCRIBEREMAIL.": <b>$sub_email</b><br><br>"._MOREINFOSUB."<br><br><a href=\"$nl_url/admin.php?module=pnTresMailer&op=main\">$nl_url/admin.php?module=pnTresMailer&op=main</a>.";

	  mail("$to", "$nl_subject", "$message", "$headers");

	  page_headers('');
	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._SELFSUBSCRIBERADDED." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";

	  if($sub_redirect == 0) {
		    page_footers('');
		    return;
		}

	?>
		<script> 
		function redirect()
		{ 
		window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
		} 
		setTimeout("redirect();", 1250); 
		</script>
	<?php
	  page_footers('');
	  return;
}

function UpdateSubSelf($sub_reg_id, $sub_email) {
    global $resub_redirect;

// get vars		
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));

    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  $sql = "SELECT * FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $nl_var = $result->GetRowAssoc();

	  foreach($nl_var as $key => $value) {
		    $nl_var[$key] = stripslashes($value);
		}

	  if($nl_var[nl_resub] == '0') {
		    $sql = "SELECT * FROM $prefix"._nl_unsubscribe." WHERE unsub_email = '$sub_email'";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
		    $dup_check = $result->RecordCount();
		    if($dup_check > 0) {
			      page_headers('');
			      echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
				        ."<tr>\n"
				        ."<td align=\"center\" class=\"pn-normal\">"._IDUPUNSUBSCRIBER." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."<br>\n"
				        ."\n";

			      if($resub_redirect == 0) {
				    page_footers('');
				    return;
				}

			?>
				<script> 
				function redirect()
				{ 
				window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
				} 
				setTimeout("redirect();", 4000); 
				</script>
			<?php
			page_footers('');
			return;
			}
		}

    $sql = "UPDATE $prefix"._nl_subscriber." SET sub_email = '$sub_email' WHERE sub_reg_id = '$sub_reg_id'";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBUPDATEERROR;
	  }

	  include("modules/$ModName/common.php");

	  page_headers('');
	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._SUBSCRIBERUPDATED." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";
	?>
		<script> 
		function redirect()
		{ 
		window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
		} 
		setTimeout("redirect();", 1250); 
		</script>
	<?php
	  page_footers('');
}

function DelSubSelf($sub_reg_id) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
	  $pnuid = pnUserGetVar('uid');
		
    list($dbconn) = pnDBGetConn();
    $pntable =& pnDBGetTables();

	  $sql = "SELECT * FROM $prefix"._nl_subscriber." WHERE sub_reg_id = '$sub_reg_id'";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $sub = $result->GetRowAssoc();
		
	  $sql = "SELECT COUNT(*) FROM $prefix"._nl_arch_subscriber." WHERE sub_reg_id = '$sub[sub_reg_id]'";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  list($unsub_received) = $result->fields;

	  $unsub_date = time();
	  $unsub_remote_addr = $_SERVER['REMOTE_ADDR'];
	  $unsub_user_agent = $_SERVER['HTTP_USER_AGENT'];

	  $sql = "INSERT INTO $prefix"._nl_unsubscribe." (unsub_reg_id, unsub_uid, unsub_name, unsub_email, unsub_last_date, unsub_date, unsub_received, unsub_remote_addr, unsub_user_agent, unsub_who) VALUES ('$sub[sub_reg_id]', '$sub[sub_uid]', '$sub[sub_name]', '$sub[sub_email]', '$sub[sub_last_date]', '$unsub_date', '$unsub_received', '$unsub_remote_addr', '$unsub_user_agent', '$pnuid')";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBINSERTERROR;
	  }

    $sql = "DELETE FROM $prefix"._nl_subscriber." WHERE sub_reg_id = $sub_reg_id";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBDELETEERROR;
	  }

    $sql = "DELETE FROM $prefix"._nl_arch_subscriber." WHERE sub_reg_id = $sub_reg_id";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBDELETEERROR;
	  }

	  include("modules/$ModName/common.php");

	  page_headers('');
	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._SUBSCRIBERDEL." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";
	?>
		<script> 
		function redirect()
		{ 
		window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
		} 
		setTimeout("redirect();", 1250); 
		</script>
	<?php
	page_footers('');
}

function DelSubSelfUnreg($sub_name, $sub_email) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
	  $pnuid = pnUserGetVar('uid');

// get db connection		
    $dbconn =& pnDBGetConn(true);
	  $pntable =& pnDBGetTables();
    
	  include("modules/$ModName/common.php");

	  $sql = "SELECT sub_reg_id FROM $prefix"._nl_subscriber." WHERE sub_name = '$sub_name' AND sub_email = '$sub_email'";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  $sub_check = $result->RecordCount();

	  if($sub_check == 0) {
		    page_headers('');
		    echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
			      ."<tr>\n"
			      ."<td align=\"center\" class=\"pn-normal\">"._SUBSCRIBERNOTDEL." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
			      ."</tr>\n"
			      ."</table>\n"
			      ."<br>\n"
			      ."\n";
		?>
			<script> 
			function redirect()
			{ 
			window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
			} 
			setTimeout("redirect();", 1250); 
			</script>
		<?php
        page_footers('');
        return;
    } else {
		    $sql = "SELECT * FROM $prefix"._nl_subscriber." WHERE sub_name = '$sub_name' AND sub_email = '$sub_email'";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
		    $sub = $result->GetRowAssoc();

		    $sql = "SELECT COUNT(*) FROM $prefix"._nl_arch_subscriber." WHERE sub_reg_id = '$sub[sub_reg_id]'";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
		    list($unsub_received) = $result->fields;

		    $unsub_date = time();
		    $unsub_remote_addr = $_SERVER['REMOTE_ADDR'];
		    $unsub_user_agent = $_SERVER['HTTP_USER_AGENT'];

		    $sql = "INSERT INTO $prefix"._nl_unsubscribe." (unsub_reg_id, unsub_uid, unsub_name, unsub_email, unsub_last_date, unsub_date, unsub_received, unsub_remote_addr, unsub_user_agent, unsub_who) VALUES ('$sub[sub_reg_id]', '$sub[sub_uid]', '$sub[sub_name]', '$sub[sub_email]', '$sub[sub_last_date]', '$unsub_date', '$unsub_received', '$unsub_remote_addr', '$unsub_user_agent', '$pnuid')";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBINSERTERROR;
	      }
	
        $sql = "DELETE FROM $prefix"._nl_subscriber." WHERE sub_reg_id = '$sub[sub_reg_id]'";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBDELETEERROR;
	      }

        $sql = "DELETE FROM $prefix"._nl_arch_subscriber." WHERE sub_reg_id = '$sub[sub_reg_id]'";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBDELETEERROR;
	      }

		}

	  page_headers('');
	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._SUBSCRIBERDEL." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";
	?>
		<script> 
		function redirect()
		{ 
		window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
		} 
		setTimeout("redirect();", 1250); 
		</script>
	<?php
	  page_footers('');
}

function LostUsername($sub_email) {

    $prefix = pnConfigGetVar('prefix');
	$ModName = basename(dirname(__FILE__));
    $sitename = pnConfigGetVar('sitename');

    list($dbconn) = pnDBGetConn();
	$pntable =& pnDBGetTables();

	include("modules/$ModName/pnversion.php");
	include("modules/$ModName/common.php");

    if($sub_email == '') {
		    page_headers('');
		    echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
			      ."<tr>\n"
			      ."<td align=\"center\" class=\"pn-normal\">"._SELFSUBSCRIBERMISS." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
			      ."</tr>\n"
			      ."</table>\n"
			      ."<br>\n"
			      ."\n";
		?>
			<script> 
			function redirect()
			{ 
			window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
			} 
			setTimeout("redirect();", 1250); 
			</script>
		<?php
		    page_footers('');
		    return;
		}

	  $sql = "SELECT sub_name, sub_email FROM $prefix"._nl_subscriber." WHERE sub_email = '$sub_email'";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
    $email_check = $result->RecordCount();

	  if($email_check == 0) {
		    page_headers('');
		    echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
			      ."<tr>\n"
			      ."<td align=\"center\" class=\"pn-normal\">"._NOSUBEMAIL." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
			      ."</tr>\n"
			      ."</table>\n"
			      ."<br>\n"
			      ."\n";
		?>
			<script> 
			function redirect()
			{ 
			window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
			} 
			setTimeout("redirect();", 1250); 
			</script>
		<?php
		    page_footers('');
		    return;
		}

	  list($sub_name, $sub_email) = $result->fields;
	  $sub_name = stripslashes($sub_name);

	  $sql = "SELECT nl_subject, nl_name, nl_email, nl_url FROM $prefix"._nl_var;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
	  list($nl_subject, $nl_name, $nl_email, $nl_url) = $result->fields;

	  $nl_subject = stripslashes($nl_subject);
	  $nl_name = stripslashes($nl_name);

	  $message = "<b>"._SOMEUSERREQUEST." $sitename.</b><br><br>"._EMAIL." : <b>$sub_email</b><br>"._USERNAME." : <b>$sub_name</b><br><br><a href=\"$nl_url/index.php?op=modload&name=$ModName&file=index\">$nl_url</a>.<br><br>"._THANKYOU.",<br><a href=\"mailto:$nl_email\">$nl_name</a>";

	  $footer_message = ""._FOOTERMESSAGE."";

	  $message .= "<br><br><br><br>$footer_message";

	  $mailto .= "$sub_name<$sub_email>";

	  $headers = "Errors: $nl_name<$nl_email>\n";
	  $headers .= "Reply-To: $nl_name<$nl_email>\n";
	  $headers .= "Return-Path: $nl_name<$nl_email>\n";
	  $headers .= "FROM: $nl_name<$nl_email>\n";
	  $headers .= "MIME-Version: 1.0\n";
	  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
	  $headers .= "Content-Transfer-Encoding: 7bit\n";
	  $headers .= "Content-Disposition: inline;\n";
	  $headers .= "Content-Base: $nl_url\n";

	  $to = "$mailto";

	  mail("$to", "$nl_subject", "$message", "$headers");

	  page_headers('');
	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">"._USERNAMEMAILED." <a href=\"index.php?op=modload&name=$ModName&file=index\">"._HERE."</a>.</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";
	?>
		<script> 
		function redirect()
		{ 
		window.location.replace("index.php?op=modload&name=<?php echo $ModName?>&file=index"); 
		} 
		setTimeout("redirect();", 1250); 
		</script>
	<?php
	  page_footers('');
}

// funcs end here
// Main starts here

// get language definitions
modules_get_language();

// get all of our variables cleanly
list($req, 
	   $col_sort, 
	 	 $start,
	 	 $arch_mid,
	 	 $sub_uid, 
	 	 $sub_name, 
	 	 $sub_email,
	 	 $sub_reg_id) = pnVarCleanFromInput('req',
                   		           	      'col_sort',
								   	   									'start',
								   	   									'arch_mid',
									   										'sub_uid',
									   										'sub_name',
									   										'sub_email',
									   										'sub_reg_id');
if(empty($req)) {
    $req = '';
}

switch($req) {

    case "Subscriber":
        Subscriber($col_sort, $start);
        break;

    case "PreviewArchive":    // Admins only
        PreviewArchive($arch_mid);
        break;

    case "Privacy":
        Privacy();
        break;

    case "AddSubSelf":
        AddSubSelf($sub_uid, $sub_name, $sub_email);
        break;

    case "UpdateSubSelf":
        UpdateSubSelf($sub_reg_id, $sub_email);
        break;

    case "DelSubSelf":
        DelSubSelf($sub_reg_id);
        break;

    case "DelSubSelfUnreg":
        DelSubSelfUnreg($sub_name, $sub_email);
        break;

    case "LostUsername":
        LostUsername($sub_email);
        break;

    default:
        Subscriber($col_sort, $start);
        break;
				
}
?>
