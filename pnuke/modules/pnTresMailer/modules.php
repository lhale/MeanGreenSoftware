<?php
// $Id: modules.php,v 1.6 2005/12/28 16:17:01 kdoerges Exp $
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
// Purpose of file:  pnTresMailer Modules
// ----------------------------------------------------------------------

$ModName = basename(dirname(__FILE__));

modules_get_language();

function ViewModules() {

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

// list current modules in use
	  $sql = "SELECT mod_pos FROM $prefix"._nl_modules;
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
		if ($result->EOF) {
		    $rows = 0;
		} else {
        $rows = $result->RecordCount();
		} 

	  echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-title\"><b>"._MODULESLIST."</b></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._MODPOS."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._MODDESCR."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._MODVERSION."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._MODQTY."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._EDIT."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._REMOVE."</b></td>\n"
		    ."</tr>\n";

    if($rows == 0) {
	      echo "<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."<td align=\"center\" class=\"pn-normal\">---</td>\n"
		        ."</tr>\n";
		} else {
		    $i=1;
		
		    $sql = "SELECT mod_id, mod_pos, mod_descr, mod_version, mod_qty, mod_multi_output, mod_edit, mod_file FROM $prefix"._nl_modules." ORDER BY mod_pos";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }

		    while(!$result->EOF) {
				    list($mod_id, $mod_pos, $mod_descr, $mod_version, $mod_qty, $mod_multi_output, $mod_edit, $mod_file) = $result->fields;
            $result->MoveNext();
		        include_once("modules/$ModName/modules/$mod_file.php");
			      $mod_file = $modversion;
			  		if ($i % 2) {
				        echo "<tr bgcolor=\"$bgcolor1\">\n";
				    } else {
				        echo "<tr>\n";
				    }
			      echo "<td align=\"center\" >\n"
				        ."\n"
				        ."<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n"
				        ."<tr>\n";

			      if ($mod_pos == '1') {
				        echo "<td>"._MOVEBLANK."";
				    } else {
				        echo "<td>"
					          ."<a href=\"index.php?op=modload&name=$ModName&file=functions&req=UpModule&mod_id=$mod_id\" title=\""._TUP."\">"._MOVEUP."</a>";
				    }
			      if ($mod_pos == $rows) {
				        echo ""._MOVEBLANK." ";
				    } else {
				        echo "<a href=\"index.php?op=modload&name=$ModName&file=functions&req=DownModule&mod_id=$mod_id\" title=\""._TDOWN."\">"._MOVEDOWN."</a>";
				    }
			      echo "</td>\n"
				        ."</tr>\n"
				        ."</table>\n"
				        ."\n"
				        ."</td>\n"
				        ."<td align=\"center\" class=\"pn-normal\">$mod_descr</td>\n"
				        ."<td align=\"center\" class=\"pn-normal\">$mod_version</td>\n"
				        ."<td align=\"center\" class=\"pn-normal\">";

			      if($mod_multi_output == 1) {
			          echo "<form action=\"modules.php\" method=\"post\">"
				            ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
				            ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
				            ."<input type=\"hidden\" name=\"file\" value=\"functions\">"
				            ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
				            ."<input type=\"hidden\" name=\"mod_id\" value=\"$mod_id\">"
				            ."<input type=\"hidden\" name=\"req\" value=\"UpdateModule\">";

				        echo "<select name=\"mod_qty\">\n"
					          ."<option value=\"0\"";	
				        if ($mod_qty == '0') {
					          echo " selected";
					      }	
				        echo ">0</option>\n"
					          ."<option value=\"1\"";	
				        if ($mod_qty == '1') {
					          echo " selected";
					      }	
				        echo ">1</option>\n"
					          ."<option value=\"2\"";	
				        if ($mod_qty == '2') {
					          echo " selected";
					      }	
				        echo ">2</option>\n"
					          ."<option value=\"3\"";	
				        if ($mod_qty == '3') {
					          echo " selected";
					      }	
				        echo ">3</option>\n"
					          ."<option value=\"4\"";	
				        if ($mod_qty == '4') {
					          echo " selected";
					      }	
				        echo ">4</option>\n"
					          ."<option value=\"5\"";	
				        if ($mod_qty == '5') {
					          echo " selected";
					      }	
				        echo ">5</option>\n"
					          ."<option value=\"6\"";	
				        if ($mod_qty == '6') {
					          echo " selected";
					      }	
				        echo ">6</option>\n"
					          ."<option value=\"7\"";	
				        if ($mod_qty == '7') {
					          echo " selected";
					      }	
				        echo ">7</option>\n"
					          ."<option value=\"8\"";	
				        if ($mod_qty == '8') {
					          echo " selected";
					      }	
				        echo ">8</option>\n"
					          ."<option value=\"9\"";	
				        if ($mod_qty == '9') {
					          echo " selected";
					      }	
				        echo ">9</option>\n"
					          ."<option value=\"10\"";	
				        if ($mod_qty == '10') {
					          echo " selected";
					      }	
				        echo ">10</option>\n"
					          ."<option value=\"15\"";	
				        if ($mod_qty == '15') {
					          echo " selected";
					      }	
				        echo ">15</option>\n"
					          ."</select><input type=\"submit\" value=\""._SET."\">";
				    } else {
				        echo "N/A";
				    }

			      echo "</td></form>\n";

			      if($mod_edit == 1) {
				        echo "<td align=\"center\" class=\"pn-normal\"><a href=\"index.php?op=modload&name=$ModName&file=modules&req=EditModule&mod_id=$mod_id\">"._EDIT."</a></td>\n";
				    } else {
				        echo "<td align=\"center\" class=\"pn-normal\">N/A</td>";
				    }
			      echo "<td align=\"center\" class=\"pn-normal\">";

			      if($modversion[version] != $mod_version) {
				        echo "<a href=\"index.php?op=modload&name=$ModName&file=functions&req=UpgradeModule&mod_id=$mod_id&mod_file=$mod_file\">"._UPGRADE."</a>/";
				    }

			      echo "<a href=\"index.php?op=modload&name=$ModName&file=functions&req=DelModule&mod_id=$mod_id\">"._IMGDELETE."</a></td>\n"
				        ."</tr>\n";
			      $i++;
        }
    }

// list modules available for use that can be added to the system
    echo "</table>\n"
		    ."<br>\n"
		    ."\n";

	  echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-title\"><b>"._MODULESNEWLIST."</b></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n"
		    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._MODNAME."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._MODDESCR."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._MODVERSION."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._MODAUTHOR."</b></td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><b>"._ADD."</b></td>\n"
		    ."</tr>\n";

	  $i=1;
	  $mod_folder = "modules/$ModName/modules/";
	  $dir = opendir($mod_folder); 

	  while ($file = readdir($dir)) {
		    $type = filetype($mod_folder.$file); 
		    if($type == 'file') {
			      $filelist[] = $file;
			  }
		}

	  closedir($dir);

	  natsort($filelist);

		foreach($filelist as $file) {
		    $in_file = explode(".", $file); // strip the file extension off
			  $out_file = $in_file[0];
			  if($$out_file) {

				    $mod_name = ${$out_file}[mod_name];
				    $description = ${$out_file}[description];
				    $version = ${$out_file}[version];
				    $file_name = ${$out_file}[file_name];

				    if ($i % 2) {
					      echo "<tr bgcolor=\"$bgcolor1\">\n";
					  } else {
					    echo "<tr>\n";
					  }

					$previewUrl = "index.php?op=modload&name=$ModName&file=modules&req=PreviewAuth&id=$file";
					$insertUrl = "index.php?op=modload&name=$ModName&file=functions&req=AddModule&fname=$file_name";
				    echo ("<td align=\"center\" class=\"pn-normal\">$mod_name</td>\n"
					      ."<td align=\"center\" class=\"pn-normal\">$description</td>\n"
					      ."<td align=\"center\" class=\"pn-normal\">$version</td>\n"
					      ."<td align=\"center\" class=\"pn-normal\"><a href=\"".$previewUrl."\" target=\"preview\" onclick=\"return pntmPopupWindow('".$previewUrl."','Preview','scrollbars=yes,width=450,height=300,resizable=yes');\">"._VIEW."</a></td>\n"
					      ."<td align=\"center\" class=\"pn-normal\"><a href=\"".$insertUrl."\">"._INSERT."</a></td>\n"
					      ."</tr>\n" );
				    $i++;
				} else {
				    include_once($mod_folder.$file);

				    if ($i % 2) {
					      echo "<tr bgcolor=\"$bgcolor1\">\n";
					  } else {
					      echo "<tr>\n";
					  }

					$previewUrl = "index.php?op=modload&name=$ModName&file=modules&req=PreviewAuth&id=$file";
					$insertUrl = "index.php?op=modload&name=$ModName&file=functions&req=AddModule&fname=".$modversion['file_name'];
				    echo "<td align=\"center\" class=\"pn-normal\">$modversion[mod_name]</td>\n"
					      ."<td align=\"center\" class=\"pn-normal\">$modversion[description]</td>\n"
					      ."<td align=\"center\" class=\"pn-normal\">$modversion[version]</td>\n"
					      ."<td align=\"center\" class=\"pn-normal\"><a href=\"".$previewUrl."\" target=\"preview\" onclick=\"return pntmPopupWindow('".$previewUrl."','Preview','scrollbars=yes,width=450,height=300,resizable=yes');\">"._VIEW."</a></td>\n"
					      ."<td align=\"center\" class=\"pn-normal\"><a href=\"".$insertUrl."\">"._INSERT."</a></td>\n"
					      ."</tr>\n";
				    $i++;
				}
    }

	  echo "</table>\n"
		    ."<br>\n"
		    ."\n";

	  page_footers();
}

function EditModule($mod_id) {

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

	  $modsql = "SELECT mod_file, mod_function, mod_multi_output, mod_qty, mod_descr FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'";

		$result = $dbconn->Execute($modsql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }

	  if (!$result->EOF) {
		    list($mod_file, $mod_function, $mod_multi_output, $mod_qty, $mod_descr) = $result->fields;
		} else {
		  // catch error?
		}
	  include("modules/$ModName/modules/$mod_file.php");
	  $mod_function = "$mod_function"._admin."";

	  echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-title\"><b>"._EDITMODULE." : $mod_descr</b></td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."\n";

	  if($mod_multi_output == 1) {
	      echo "<form action=\"modules.php\" method=\"post\">"
		        ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
		        ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
		        ."<input type=\"hidden\" name=\"file\" value=\"functions\">"
		        ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
		        ."<input type=\"hidden\" name=\"mod_id\" value=\"$mod_id\">"
		        ."<input type=\"hidden\" name=\"req\" value=\"UpdateModule\">";

		    echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
			      ."<tr>\n"
			      ."<td align=\"center\" class=\"pn-normal\"><b>"._MODQTY.": </b></td>\n"
			      ."<td align=\"center\" class=\"pn-normal\"><select name=\"mod_qty\">\n"
			      ."<option value=\"0\"";	
		    if ($mod_qty == '0') {
			      echo " selected";
			  }	
		    echo ">0</option>\n"
			      ."<option value=\"1\"";	
		    if ($mod_qty == '1') {
			      echo " selected";
			  }	
		    echo ">1</option>\n"
			      ."<option value=\"2\"";	
		    if ($mod_qty == '2') {
			     echo " selected";
			  }	
		    echo ">2</option>\n"
			      ."<option value=\"3\"";	
		    if ($mod_qty == '3') {
			      echo " selected";
			  }	
		    echo ">3</option>\n"
			      ."<option value=\"4\"";	
		    if ($mod_qty == '4') {
			      echo " selected";
			  }	
		    echo ">4</option>\n"
			      ."<option value=\"5\"";	
		    if ($mod_qty == '5') {
			      echo " selected";
			  }	
		    echo ">5</option>\n"
			      ."<option value=\"6\"";	
		    if ($mod_qty == '6') {
			      echo " selected";
			  }	
		    echo ">6</option>\n"
			      ."<option value=\"7\"";	
		    if ($mod_qty == '7') {
			      echo " selected";
			  }	
		    echo ">7</option>\n"
			      ."<option value=\"8\"";	
		    if ($mod_qty == '8') {
			    echo " selected";
			  }	
		    echo ">8</option>\n"
			      ."<option value=\"9\"";	
		    if ($mod_qty == '9') {
			      echo " selected";
			  }	
		    echo ">9</option>\n"
			      ."<option value=\"10\"";	
		    if ($mod_qty == '10') {
			      echo " selected";
			  }	
		    echo ">10</option>\n"
			      ."<option value=\"15\"";	
		    if ($mod_qty == '15') {
			      echo " selected";
			  }	
		    echo ">15</option>\n"
			      ."</select>"
			      ."</td>\n"
			      ."<td align=\"center\" class=\"pn-normal\"><input type=\"submit\" value=\""._SET."\">"
			      ."</td></form>\n"
			      ."<tr>\n"
			      ."</table>\n"
			      ."\n";
		}

	  echo "<form action=\"modules.php\" method=\"post\">"
		    ."<input type=\"hidden\" name=\"op\" value=\"modload\">"
		    ."<input type=\"hidden\" name=\"name\" value=\"$ModName\">"
		    ."<input type=\"hidden\" name=\"file\" value=\"functions\">"
		    ."<input type=\"hidden\" name=\"authid\" value=\"" . pnSecGenAuthKey() . "\">"
		    ."<input type=\"hidden\" name=\"mod_id\" value=\"$mod_id\">"
		    ."<input type=\"hidden\" name=\"req\" value=\"UpdateModuleData\">";

    echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"center\" class=\"pn-normal\">";

    $mod_function($mod_id, $ModName);

	  echo "</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."</td>\n"
		    ."<td align=\"center\" class=\"pn-normal\"><input type=\"submit\" value=\""._UPDATE."\">"
		    ."</td></form>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";

	  page_footers();
}

function PreviewAuth($id) {

// get vars
		$ModName = basename(dirname(__FILE__));
		
	  include_once("modules/$ModName/modules/$id");

	  echo "<table align=\"center\" cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._MODPREREFNAME.":</b></td>\n"
		    ."<td class=\"pn-normal\">$modversion[mod_name]</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._MODPREDESCR.":</b></td>\n"
		    ."<td class=\"pn-normal\">$modversion[description]</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._MODPREVERS.":</b></td>\n"
		    ."<td class=\"pn-normal\">$modversion[version]</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._MODPREFILE.":</b></td>\n"
		    ."<td class=\"pn-normal\">$id</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._MODPREEDIT.":</b></td>\n"
		    ."<td class=\"pn-normal\">";

    if($modversion[multi_output] == 1) {
		    echo ""._MODPREYES."";
		} else {
		    echo ""._MODPRENO."";
		}

	  echo "</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._MODPREADMIN.":</b></td>\n"
		    ."<td class=\"pn-normal\">";

	  if($modversion[mod_edit] == 1) {
		    echo ""._MODPREYES."";
		} else {
		    echo ""._MODPRENO."";
		}

	  echo "</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._MODPREAUTHNAME.":</b></td>\n"
		    ."<td class=\"pn-normal\">$modversion[author]</td>\n"
		    ."</tr>\n"
		    ."<tr>\n"
		    ."<td align=\"right\" class=\"pn-normal\"><b>"._MODPREAUTHCONT.":</b></td>\n"
		    ."<td class=\"pn-normal\">$modversion[contact]</td>\n"
		    ."</tr>\n"
		    ."</table>\n"
		    ."<br>\n"
		    ."\n";	
	  return;
}

if(empty($req)) {
    $req = '';
}

// get all of our variables cleanly
list($req, 
	 $mod_id,
	 $id) = pnVarCleanFromInput('req',
                   		        'mod_id',
								'id');


switch($req) {

    case "ViewModules":
        ViewModules();
        break;

    case "EditModule":
        EditModule($mod_id);
        break;

    case "PreviewAuth":
        PreviewAuth($id);
        break;

}

?>