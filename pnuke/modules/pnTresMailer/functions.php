<?php
// $Id: functions.php,v 1.4 2005/11/20 21:20:52 kdoerges Exp $
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
// Purpose of file:  pnTresMailer Functions
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

function AddSubscriber($sub_pndata, $sub_name, $sub_email) {

// get vars
    $prefix = pnConfigGetVar('prefix');
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
	  $nl_var = $result->GetRowAssoc(false);

	  if($sub_pndata == '') {
		    include("modules/$ModName/email_test.php");
		    $result = valid_email($sub_email, $ModName);
		    if($result == 0) {
			      page_headers('');
			      success_message(""._BADSUBSCRIBER."", "subscribers", "ViewSubscribers");
			      page_footers('');
			      return;
			  }
	
		    if($nl_var[nl_resub] == 0) {
			      $sql = "SELECT * FROM $prefix"._nl_unsubscribe." WHERE unsub_email = '$sub_email'";
		        $result = $dbconn->Execute($sql);
	          if ($dbconn->ErrorNo() != 0) {
		            echo _DBREADERROR;
	          }
			      $dup_check = $result->RecordCount();
			      if($dup_check > 0) {
				        page_headers('');
				        success_message(""._DUPUNSUBSCRIBER."", "subscribers", "ViewUnsub");
				        page_footers('');
				        return;
				    }
			  }

		    $sql = "SELECT sub_reg_id FROM $prefix"._nl_subscriber." WHERE sub_email = '$sub_email'";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
		    $dup_check = $result->RecordCount();
		    if($dup_check > 0) {
			      page_headers('');
			      success_message(""._DUPSUBSCRIBER."", "subscribers", "ViewSubscribers");
			      page_footers('');
			      return;
			  }

	      $sql = "INSERT INTO $prefix"._nl_subscriber." (sub_name, sub_email) VALUES ('$sub_name', '$sub_email')";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBINSERTERROR;
	      }
    } else {
		    list($sub_uid, $sub_email, $sub_name) = explode(":", $sub_pndata);
		    if($nl_var[nl_resub] == 0) {
			      $sql = "SELECT * FROM $prefix"._nl_unsubscribe." WHERE unsub_email = '$sub_email'";
		        $result = $dbconn->Execute($sql);
	          if ($dbconn->ErrorNo() != 0) {
		            echo _DBREADERROR;
	          }
			      $dup_check = $result->RecordCount();
			      if($dup_check > 0) {
				        page_headers('');
				        success_message(""._DUPUNSUBSCRIBER."", "subscribers", "ViewUnsub");
				        page_footers('');
				        return;
				    }
			  }
	
		    $sql = "SELECT sub_reg_id FROM $prefix"._nl_subscriber." WHERE sub_email = '$sub_email'";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
		    $dup_check = $result->RecordCount();
		    if($dup_check > 0) {
			      page_headers('');
			      success_message(""._DUPSUBSCRIBER."", "subscribers", "ViewSubscribers");
			      page_footers('');
			      return;
			  }
    	  $sql = "INSERT INTO $prefix"._nl_subscriber." (sub_uid, sub_name, sub_email) VALUES ('$sub_uid', '$sub_name', '$sub_email')";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBINSERTERROR;
	      }
		}

	  page_headers('');
	  success_message(""._SUBSCRIBERADDED."", "subscribers", "ViewSubscribers");
	  page_footers('');
}

function EditSub($sub) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));

// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();
				
	  foreach($sub as $key => $value) {
		    $sub[$key] = addslashes($value);
		}

	  $sql = "SELECT * FROM $prefix"._nl_var;
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  $nl_var = $result->GetRowAssoc(false);

	  if($nl_var[nl_resub] == 0) {
		    $sql = "SELECT * FROM $prefix"._nl_unsubscribe." WHERE unsub_email = '$sub[sub_email]'";
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
		    $dup_check = $result->RecordCount();
		    if($dup_check > 0) {
			      page_headers('');
			      success_message(""._DUPUNSUBSCRIBER."", "subscribers", "ViewUnsub");
			      page_footers('');
			      return;
			  }
		}

    $sql = "UPDATE $prefix"._nl_subscriber." SET 
		               sub_name = '$sub[sub_name]', 
		               sub_email = '$sub[sub_email]' 
		               WHERE sub_reg_id = '$sub[sub_reg_id]'";
									 
    $result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
	      echo _DBUPDATEERROR;
	  }

	  if($sub[sub_uid] > 1) {
	      $sql = "UPDATE $pntable[user] SET 
			                 pn_uname = '$sub[pn_uname]', 
			                 pn_email = '$sub[pn_email]' 
			                 WHERE pn_uid = '$sub[sub_uid]'";
											 
		    $result = $dbconn->Execute($sql);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBUPDATEERROR;
	      }
    }

	  include("modules/$ModName/common.php");

	  page_headers('');
	  success_message(""._SUBSCRIBERUPDATED."", "subscribers", "ViewSubscribers");
	  page_footers('');
}

function DelSubscriber($sub_reg_id) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
	  $pnuid = pnUserGetVar('uid');
		
// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  $sql = "SELECT * FROM $prefix"._nl_subscriber." WHERE sub_reg_id = '$sub_reg_id'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  $sub = $result->GetRowAssoc(false);

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
	  success_message(""._SUBSCRIBERDEL."", "subscribers", "ViewSubscribers");
	  page_footers('');
}

function DelArchive($arch_mid) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
	  $pnuid = pnUserGetVar('uid');
		
// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

    $sql = "DELETE FROM $prefix"._nl_archive." WHERE arch_mid = $arch_mid";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBDELETEERROR;
    }

    $sql = "DELETE FROM $prefix"._nl_archive_txt." WHERE arch_mid = $arch_mid";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBDELETEERROR;
    }

    $sql = "DELETE FROM $prefix"._nl_arch_subscriber." WHERE arch_mid = $arch_mid";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBDELETEERROR;
    }
		

	  include("modules/$ModName/common.php");

	  page_headers('');
	  success_message(""._ARCHIVEDEL."", "archives", "ViewArchives");
	  page_footers('');
}

function EditVars($nl_var) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
		
// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  foreach($nl_var as $key => $value) {
		    $nl_var[$key] = addslashes($value);
		}

    $sql = "UPDATE $prefix"._nl_var." SET 
		               nl_header      = '$nl_var[nl_header]',
		               nl_footer      = '$nl_var[nl_footer]',
		               nl_subject     = '$nl_var[nl_subject]',
		               nl_name        = '$nl_var[nl_name]',
		               nl_email       = '$nl_var[nl_email]',
		               nl_url         = '$nl_var[nl_url]',
		               nl_tpl_html    = '$nl_var[nl_tpl_html]',
		               nl_tpl_text    = '$nl_var[nl_tpl_text]',
		               nl_issue       = '$nl_var[nl_issue]',
		               nl_bulk_count  = '$nl_var[nl_bulk_count]',
		               nl_mail_server = '$nl_var[nl_mail_server]',
		               nl_unreg       = '$nl_var[nl_unreg]',
		               nl_system      = '$nl_var[nl_system]',
		               nl_popup       = '$nl_var[nl_popup]',
		               nl_popup_days  = '$nl_var[nl_popup_days]',
		               nl_sample      = '$nl_var[nl_sample]',
		               nl_loop_count  = '$nl_var[nl_loop_count]',
		               nl_personal    = '$nl_var[nl_personal]',
		               nl_resub       = '$nl_var[nl_resub]'
		        WHERE nl_var_id = '1'";

    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBUPDATEERROR;
    }
						
	  include("modules/$ModName/common.php");

	  page_headers('');
	  success_message(""._VARSUPDATED."", "vars", "ViewVars");
	  page_footers('');
}

function AddModule($fname) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
		
// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  $sql = "SELECT mod_pos FROM $prefix"._nl_modules." ORDER BY mod_pos DESC LIMIT 1";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  $check_mods = $result->RecordCount();
	  if($check_mods == 0) {
		    $new_mod_pos = 1;
		} else {
		    list($last_mod_pos) = $result->fields;
		    $new_mod_pos = ($last_mod_pos + 1);
		}

	  include("modules/$ModName/modules/$fname.php");

	  if($modversion[multi_output] == 1) {
		    $mod_qty = 1;
		} else {
		    $mod_qty = 0;
		}

    $sql = "INSERT INTO $prefix"._nl_modules." (mod_pos, mod_file, mod_name, mod_function, mod_descr, mod_version, mod_qty, mod_multi_output, mod_edit, mod_data) VALUES ('$new_mod_pos', '$modversion[file_name]', '$modversion[mod_name]', '$modversion[function_name]', '$modversion[description]', '$modversion[version]', '$mod_qty', '$modversion[multi_output]', '$modversion[mod_edit]', '$modversion[mod_data]')";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBINSERTERROR;
    }

	  include("modules/$ModName/common.php");

	  page_headers('');
	  success_message(""._MODULEADDED."", "modules", "ViewModules");
	  page_footers('');
}

function UpgradeModule($mod_id, $mod_file) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
		
// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  include("modules/$ModName/modules/$mod_file.php");

	  if($modversion[multi_output] == 1) {
		    $mod_qty = 1;
		} else {
		    $mod_qty = 0;
		}

    $sql = "UPDATE $prefix"._nl_modules." SET 
		               mod_file = '$modversion[file_name]', 
									 mod_name = '$modversion[mod_name]', 
									 mod_function = '$modversion[function_name]', 
									 mod_descr = '$modversion[description]', 
									 mod_version = '$modversion[version]', 
									 mod_multi_output = '$modversion[multi_output]', 
									 mod_edit = '$modversion[mod_edit]'
		        WHERE mod_id = '$mod_id'";

    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBUPDATEERROR;
    }
		
	  include("modules/$ModName/common.php");

	  page_headers('');
	  success_message(""._MODULEUPDATE."", "modules", "ViewModules");
	  page_footers('');
}

function UpModule($mod_id) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
		
// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  $sql = "SELECT mod_pos FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  list($mod_pos) = $result->fields;

	  $mod_pos_previous = ($mod_pos - 1);

	  $sql = "SELECT mod_id FROM $prefix"._nl_modules." WHERE mod_pos = '$mod_pos_previous'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  list($mod_id_previous) = $result->fields;
	
	  $sql = "UPDATE $prefix"._nl_modules." SET 
	                 mod_pos	 = '$mod_pos_previous' 
		        WHERE mod_id = '$mod_id'";

    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBUPDATEERROR;
    }
	
	  $sql = "UPDATE $prefix"._nl_modules." SET 
	                 mod_pos	 = '$mod_pos' 
		        WHERE mod_id = '$mod_id_previous'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBUPDATEERROR;
    }
					
	  include("modules/$ModName/common.php");

	  page_headers('');
	  success_message(""._MODULEUP."", "modules", "ViewModules");
	  page_footers('');
}

function DownModule($mod_id) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
		
// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  $sql = "SELECT mod_pos FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }

	  list($mod_pos) = $result->fields;

	  $mod_pos_next = ($mod_pos + 1);

	  $sql = "SELECT mod_id FROM $prefix"._nl_modules." WHERE mod_pos = '$mod_pos_next'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  list($mod_id_next) = $result->fields;
	
	  $sql = "UPDATE $prefix"._nl_modules." SET 
		               mod_pos = '$mod_pos_next' 
		        WHERE mod_id = '$mod_id'";

    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBUPDATEERROR;
    }
	
	  $sql = "UPDATE $prefix"._nl_modules." SET 
		               mod_pos = '$mod_pos' 
		        WHERE mod_id = '$mod_id_next'";

    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }

	  include("modules/$ModName/common.php");

	  page_headers('');
	  success_message(""._MODULEDOWN."", "modules", "ViewModules");
	  page_footers('');
}

function UpdateModule($mod_id, $mod_qty) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
		
// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();
	
	  $sql = "UPDATE $prefix"._nl_modules." SET 
		               mod_qty = '$mod_qty' 
		        WHERE mod_id = '$mod_id'";

    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBUPDATEERROR;
    }
						
	  include("modules/$ModName/common.php");

	  page_headers('');
	  success_message(""._MODULEUPDATE."", "modules", "ViewModules");
	  page_footers('');
}

function UpdateModuleData($mod_id, $mod_data) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
		
// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  $mod_data = implode("|", $mod_data);
	  $mod_data = addslashes($mod_data);

	  $sql = "UPDATE $prefix"._nl_modules." SET 
		               mod_data = '$mod_data' 
		        WHERE mod_id = '$mod_id'";

    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBUPDATEERROR;
    }
						
	  include("modules/$ModName/common.php");

	  page_headers('');
	  success_message(""._MODULEUPDATE."", "modules", "EditModule&mod_id=$mod_id");
	  page_footers('');
}

function DelModule($mod_id) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
		
// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  $sql = "SELECT mod_pos FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBUPDATEERROR;
    }
	  list($delete_mod_pos) = $result->fields;

	  $sql = "SELECT mod_id FROM $prefix"._nl_modules;
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
	  $mod_count = $result->RecordCount();
	  $mods_remaining = ($mod_count - $delete_mod_pos);

	  $sql = "SELECT mod_id, mod_pos FROM $prefix"._nl_modules." 
		                    ORDER BY mod_pos LIMIT $delete_mod_pos, $mods_remaining";

    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBREADERROR;
    }
												
	  while(!$result->EOF) {
		    list($moving_mod_id, $moving_mod_pos) = $result->fields;
				$result->MoveNext();
		    $new_mod_pos = ($moving_mod_pos - 1);
		    $sql2 = "UPDATE $prefix"._nl_modules." SET mod_pos = '$new_mod_pos' 
			                       WHERE mod_id = '$moving_mod_id'";
        $result2 = $dbconn->Execute($sql2);
        if ($dbconn->ErrorNo() != 0) {
            echo _DBUPDATEERROR;
        }										 
		}

	  $sql = "DELETE FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBDELETEERROR;
    }
	  include("modules/$ModName/common.php");

	  page_headers('');
	  success_message(""._MODULEDEL."", "modules", "ViewModules");
	  page_footers('');
}

function DelUnsub($sub_reg_id) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
		
// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();
		
    $sql = "DELETE FROM $prefix"._nl_unsubscribe." WHERE unsub_reg_id = '$sub_reg_id'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBDELETEERROR;
    }

	  include("modules/$ModName/common.php");

	  page_headers('');
	  success_message(""._UNSUBSCRIBERDEL."", "subscribers", "ViewUnsub");
	  page_footers('');
}

function UpdateArchives($arch) {

// get vars
    $prefix = pnConfigGetVar('prefix');
		$ModName = basename(dirname(__FILE__));
		
// get db connection
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

	  include("modules/$ModName/common.php");

	  if($arch[submit] == 'Skip') {
		    page_headers('');
		    success_message(""._ARCHIVESSKIPPED."", "functions_mail", "PrepMailer");
		    page_footers('');
		    return;
		}

 	  foreach($arch as $key => $value) {
		    $arch[$key] = addslashes($value);
		}

    $sql = "UPDATE $prefix"._nl_archive." SET arch_message = '$arch[arch_message_html]' WHERE arch_mid = '$arch[arch_mid]'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBUPDATEERROR;
    }

    $sql = "UPDATE $prefix"._nl_archive_txt." SET arch_message = '$arch[arch_message_text]' WHERE arch_mid = '$arch[arch_mid]'";
    $result = $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        echo _DBUPDATEERROR;
    }

	  page_headers('');
	  success_message(""._ARCHIVESUPDATED."", "functions_mail", "PrepMailer");
	  page_footers('');
}

// get all of our variables cleanly
list($req, 
	   $sub_pndata,
	   $sub_name,
	   $sub_email,
	   $sub,
	   $sub_reg_id,
	   $arch_mid,
	   $nl_var,
	   $fname,
	   $mod_id, 
	   $mod_file,
	   $mod_qty,
	   $mod_data,
	   $arch) = pnVarCleanFromInput('req',
            		               	  'sub_pndata',
										  						'sub_name',
										  						'sub_email',
										  						'sub',
										  						'sub_reg_id',
										  						'arch_mid',
										  						'nl_var',
										  						'fname',
										  						'mod_id',
										  						'mod_file',
										  						'mod_qty',
										  						'mod_data',
										  						'arch');



if(empty($req)) {
    $req = '';
}

switch($req) {

    case "AddSubscriber":
        AddSubscriber($sub_pndata, $sub_name, $sub_email);
        break;

    case "EditSub":
        EditSub($sub);
        break;

    case "DelSubscriber":
        DelSubscriber($sub_reg_id);
        break;

    case "DelArchive":
        DelArchive($arch_mid);
        break;

    case "EditVars":
        EditVars($nl_var);
        break;

    case "AddModule":
        AddModule($fname);
        break;

    case "UpgradeModule":
        UpgradeModule($mod_id, $mod_file);
        break;

    case "UpModule":
        UpModule($mod_id);
        break;

    case "DownModule":
        DownModule($mod_id);
        break;

    case "UpdateModule":
        UpdateModule($mod_id, $mod_qty);
        break;

    case "UpdateModuleData":
        UpdateModuleData($mod_id, $mod_data);
        break;

    case "DelModule":
        DelModule($mod_id);
        break;

    case "DelUnsub":
        DelUnsub($sub_reg_id);
        break;

    case "UpdateArchives":
        UpdateArchives($arch);
        break;

}

?>