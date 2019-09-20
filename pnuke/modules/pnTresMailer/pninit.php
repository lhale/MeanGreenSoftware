<?php
// $Id: pninit.php,v 1.2 2005/11/21 21:53:07 bamm Exp $
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
// Purpose of file:  Initialization functions for pnTresMailer
// ----------------------------------------------------------------------


function pntresmailer_init(){
    $dbconn =& pnDBGetConn(true);
    $pntable = pnDBGetTables();

// nl_arch_subscriber
    $nl_arch_subscribertable = $pntable['nl_arch_subscriber'];
    $nl_arch_subscribercolumn = &$pntable['nl_arch_subscriber_column'];

    $sql = "CREATE TABLE $nl_arch_subscribertable (
            $nl_arch_subscribercolumn[arch_mid] int(11) NOT NULL default '0',
            $nl_arch_subscribercolumn[sub_reg_id] int(11) NOT NULL default '0',
            $nl_arch_subscribercolumn[arch_date] int(25) NOT NULL default '0',
            $nl_arch_subscribercolumn[arch_read] int(25) NOT NULL default '0')";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
        return false;
    }

// nl_archive
    $nl_archivetable = $pntable['nl_archive'];
    $nl_archivecolumn = &$pntable['nl_archive_column'];

    $sql = "CREATE TABLE $nl_archivetable (
            $nl_archivecolumn[arch_mid] int(11) NOT NULL auto_increment,
            $nl_archivecolumn[arch_issue] tinytext NOT NULL,
            $nl_archivecolumn[arch_message] longtext NOT NULL,
            $nl_archivecolumn[arch_date] int(25) NOT NULL default '0',
            PRIMARY KEY(arch_mid))";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
        return false;
    }

// nl_archive_txt
    $nl_archive_txttable = $pntable['nl_archive_txt'];
    $nl_archive_txtcolumn = &$pntable['nl_archive_txt_column'];

    $sql = "CREATE TABLE $nl_archive_txttable (
            $nl_archive_txtcolumn[arch_mid] int(11) NOT NULL,
            $nl_archive_txtcolumn[arch_issue] tinytext NOT NULL,
            $nl_archive_txtcolumn[arch_message] longtext NOT NULL,
            $nl_archive_txtcolumn[arch_date] int(25) NOT NULL default '0',
            PRIMARY KEY(arch_mid))";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
        return false;
    }

// nl_modules
    $nl_modulestable = $pntable['nl_modules'];
    $nl_modulescolumn = &$pntable['nl_modules_column'];

    $sql = "CREATE TABLE $nl_modulestable (
            $nl_modulescolumn[mod_id] int(11) NOT NULL auto_increment,
            $nl_modulescolumn[mod_pos] int(11) NOT NULL default '0',
            $nl_modulescolumn[mod_file] tinytext NOT NULL,
            $nl_modulescolumn[mod_name] tinytext NOT NULL,
            $nl_modulescolumn[mod_function] tinytext NOT NULL,
            $nl_modulescolumn[mod_descr] tinytext NOT NULL,
            $nl_modulescolumn[mod_version] tinytext NOT NULL,
            $nl_modulescolumn[mod_multi_output] int(5) NOT NULL default '0',
            $nl_modulescolumn[mod_qty] int(5) NOT NULL default '1',
            $nl_modulescolumn[mod_edit] int(5) NOT NULL default '0',
            $nl_modulescolumn[mod_data] mediumtext NOT NULL,
            PRIMARY KEY(mod_id))";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
        return false;
    }

// nl_subscriber
    $nl_subscribertable = $pntable['nl_subscriber'];
    $nl_subscribercolumn = &$pntable['nl_subscriber_column'];

    $sql = "CREATE TABLE $nl_subscribertable (
            $nl_subscribercolumn[sub_reg_id] int(11) NOT NULL auto_increment,
            $nl_subscribercolumn[sub_uid] int(11) NOT NULL default '0',
            $nl_subscribercolumn[sub_name] tinytext NOT NULL,
            $nl_subscribercolumn[sub_email] tinytext NOT NULL,
            $nl_subscribercolumn[sub_last_date] int(25) NOT NULL default '0',
            PRIMARY KEY(sub_reg_id))";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
        return false;
    }

// nl_unsubscribe
    $nl_unsubscribetable = $pntable['nl_unsubscribe'];
    $nl_unsubscribecolumn = &$pntable['nl_unsubscribe_column'];

    $sql = "CREATE TABLE $nl_unsubscribetable (
            $nl_unsubscribecolumn[unsub_reg_id] int(11) NOT NULL default '0',
            $nl_unsubscribecolumn[unsub_uid] int(11) NOT NULL default '0',
            $nl_unsubscribecolumn[unsub_name] tinytext NOT NULL,
            $nl_unsubscribecolumn[unsub_email] tinytext NOT NULL,
            $nl_unsubscribecolumn[unsub_last_date] int(25) NOT NULL default '0',
            $nl_unsubscribecolumn[unsub_date] int(25) NOT NULL default '0',
            $nl_unsubscribecolumn[unsub_received] int(5) NOT NULL default '0',
            $nl_unsubscribecolumn[unsub_remote_addr] tinytext NOT NULL,
            $nl_unsubscribecolumn[unsub_user_agent] tinytext NOT NULL,
            $nl_unsubscribecolumn[unsub_who] int(11) NOT NULL default '0')";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
        return false;
    }

// nl_var
    $nl_vartable = $pntable['nl_var'];
    $nl_varcolumn = &$pntable['nl_var_column'];

    $sql = "CREATE TABLE $nl_vartable (
            $nl_varcolumn[nl_var_id] int(11) NOT NULL default '0',
            $nl_varcolumn[nl_header] mediumtext NOT NULL,
            $nl_varcolumn[nl_footer] mediumtext NOT NULL,
            $nl_varcolumn[nl_subject] tinytext NOT NULL,
            $nl_varcolumn[nl_name] tinytext NOT NULL,
            $nl_varcolumn[nl_email] tinytext NOT NULL,
            $nl_varcolumn[nl_url] tinytext NOT NULL,
            $nl_varcolumn[nl_tpl_html] tinytext NOT NULL,
            $nl_varcolumn[nl_tpl_text] tinytext NOT NULL,
            $nl_varcolumn[nl_issue] int(11) NOT NULL default '0',
            $nl_varcolumn[nl_bulk_count] int(5) NOT NULL default '500',
            $nl_varcolumn[nl_loop_count] int(5) NOT NULL default '5',
            $nl_varcolumn[nl_mail_server] tinytext NOT NULL,
            $nl_varcolumn[nl_unreg] int(5) NOT NULL default '0',
            $nl_varcolumn[nl_system] int(5) NOT NULL default '0',
            $nl_varcolumn[nl_popup] int(5) NOT NULL default '0',
            $nl_varcolumn[nl_popup_days] int(5) NOT NULL default '10',
            $nl_varcolumn[nl_sample] int(5) NOT NULL default '0',
            $nl_varcolumn[nl_personal] int(5) NOT NULL default '0',
            $nl_varcolumn[nl_resub] int(5) NOT NULL default '1',
            PRIMARY KEY(nl_var_id))";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
        return false;
    }

    $sql = "INSERT INTO $nl_vartable VALUES (1,'Here is this weeks newsletter.','Thanks for checking out our news.\r\n\r\nsincerely,\r\nme','Our Newsletter','Your Site Name','you@your.address','http://www.yoursite.com','default/html.tpl','default/text.tpl',1,500,5,'localhost',0,0,0,10,0,0,1)";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
        return false;
    }

    return true;
}


function pntresmailer_upgrade($oldversion){

	$dbconn =& pnDBGetConn(true);
	$pntable = pnDBGetTables();

	$nl_arch_subscribertable = $pntable['nl_arch_subscriber'];
	$nl_arch_subscribercolumn = &$pntable['nl_arch_subscriber_column'];

	$nl_archivetable = $pntable['nl_archive'];
	$nl_archivecolumn = &$pntable['nl_archive_column'];

	$nl_modulestable = $pntable['nl_modules'];
	$nl_modulescolumn = &$pntable['nl_modules_column'];

	$nl_subscribertable = $pntable['nl_subscriber'];
	$nl_subscribercolumn = &$pntable['nl_subscriber_column'];

    $nl_unsubscribetable = $pntable['nl_unsubscribe'];
    $nl_unsubscribecolumn = &$pntable['nl_unsubscribe_column'];

	$nl_vartable = $pntable['nl_var'];
	$nl_varcolumn = &$pntable['nl_var_column'];

	switch($oldversion) {
		case 5.30:
		case 5.31:
		case 5.32:

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_sample] int(5) NOT NULL default '0'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

			$sql = "ALTER TABLE $nl_arch_subscribertable ADD $nl_arch_subscribercolumn[arch_read] int(25) NOT NULL default '0'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_html_only] int(5) NOT NULL default '0'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_loop_count] int(5) NOT NULL default '5'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_personal] int(5) NOT NULL default '0'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		    $sql = "CREATE TABLE $nl_unsubscribetable (
		            $nl_unsubscribecolumn[unsub_reg_id] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_uid] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_name] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_email] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_last_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_received] int(5) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_remote_addr] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_user_agent] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_who] int(11) NOT NULL default '0')";
		    $dbconn->Execute($sql);

		    if ($dbconn->ErrorNo() != 0) {
		        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
		        return false;
		    }

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_resub] int(5) NOT NULL default '1'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		break;
		}

	switch($oldversion) {
		case 5.33:
		case 5.34:
		case 5.35:
		case 5.36:
		case 5.37:
		case 5.38:

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_html_only] int(5) NOT NULL default '0'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
			}

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_loop_count] int(5) NOT NULL default '5'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_personal] int(5) NOT NULL default '0'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		    $sql = "CREATE TABLE $nl_unsubscribetable (
		            $nl_unsubscribecolumn[unsub_reg_id] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_uid] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_name] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_email] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_last_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_received] int(5) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_remote_addr] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_user_agent] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_who] int(11) NOT NULL default '0')";
		    $dbconn->Execute($sql);

		    if ($dbconn->ErrorNo() != 0) {
		        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
		        return false;
		    }

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_resub] int(5) NOT NULL default '1'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		break;
		}

	switch($oldversion) {
		case 5.40:
		case 5.41:

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_php_ver] int(5) NOT NULL default '0'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
			}

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_loop_count] int(5) NOT NULL default '5'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_personal] int(5) NOT NULL default '0'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		    $sql = "CREATE TABLE $nl_unsubscribetable (
		            $nl_unsubscribecolumn[unsub_reg_id] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_uid] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_name] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_email] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_last_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_received] int(5) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_remote_addr] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_user_agent] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_who] int(11) NOT NULL default '0')";
		    $dbconn->Execute($sql);

		    if ($dbconn->ErrorNo() != 0) {
		        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
		        return false;
		    }

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_resub] int(5) NOT NULL default '1'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		break;
		}

	switch($oldversion) {
		case 5.50:
		case 5.51:

			$sql = "ALTER TABLE $nl_vartable DROP nl_php_ver";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
			}

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_loop_count] int(5) NOT NULL default '5'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_personal] int(5) NOT NULL default '0'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		    $sql = "CREATE TABLE $nl_unsubscribetable (
		            $nl_unsubscribecolumn[unsub_reg_id] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_uid] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_name] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_email] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_last_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_received] int(5) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_remote_addr] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_user_agent] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_who] int(11) NOT NULL default '0')";
		    $dbconn->Execute($sql);

		    if ($dbconn->ErrorNo() != 0) {
		        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
		        return false;
		    }

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_resub] int(5) NOT NULL default '1'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		break;
		}

	switch($oldversion) {
		case 5.52:

			$sql = "ALTER TABLE $nl_vartable DROP nl_html_only";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
			}

			$sql = "ALTER TABLE $nl_subscribertable DROP sub_format";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
			}

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_loop_count] int(5) NOT NULL default '5'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_personal] int(5) NOT NULL default '0'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		    $sql = "CREATE TABLE $nl_unsubscribetable (
		            $nl_unsubscribecolumn[unsub_reg_id] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_uid] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_name] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_email] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_last_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_received] int(5) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_remote_addr] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_user_agent] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_who] int(11) NOT NULL default '0')";
		    $dbconn->Execute($sql);

		    if ($dbconn->ErrorNo() != 0) {
		        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
		        return false;
		    }

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_resub] int(5) NOT NULL default '1'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		break;
		}

	switch($oldversion) {
		case 5.60:

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_loop_count] int(5) NOT NULL default '5'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_personal] int(5) NOT NULL default '0'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		    $sql = "CREATE TABLE $nl_unsubscribetable (
		            $nl_unsubscribecolumn[unsub_reg_id] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_uid] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_name] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_email] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_last_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_received] int(5) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_remote_addr] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_user_agent] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_who] int(11) NOT NULL default '0')";
		    $dbconn->Execute($sql);

		    if ($dbconn->ErrorNo() != 0) {
		        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
		        return false;
		    }

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_resub] int(5) NOT NULL default '1'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		break;
		}

	switch($oldversion) {
		case 5.70:
		case 5.71:

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_personal] int(5) NOT NULL default '0'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		    $sql = "CREATE TABLE $nl_unsubscribetable (
		            $nl_unsubscribecolumn[unsub_reg_id] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_uid] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_name] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_email] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_last_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_received] int(5) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_remote_addr] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_user_agent] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_who] int(11) NOT NULL default '0')";
		    $dbconn->Execute($sql);

		    if ($dbconn->ErrorNo() != 0) {
		        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
		        return false;
		    }

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_resub] int(5) NOT NULL default '1'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		break;
		}

	switch($oldversion) {
		case 5.80:
		case 5.81:
		case 5.82:

		    $sql = "CREATE TABLE $nl_unsubscribetable (
		            $nl_unsubscribecolumn[unsub_reg_id] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_uid] int(11) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_name] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_email] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_last_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_date] int(25) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_received] int(5) NOT NULL default '0',
		            $nl_unsubscribecolumn[unsub_remote_addr] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_user_agent] tinytext NOT NULL,
		            $nl_unsubscribecolumn[unsub_who] int(11) NOT NULL default '0')";
		    $dbconn->Execute($sql);

		    if ($dbconn->ErrorNo() != 0) {
		        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
		        return false;
		    }

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_resub] int(5) NOT NULL default '1'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		break;
		}

	switch($oldversion) {
		case 5.90:
		case 5.91:
		case 5.92:
		case 5.93:
		case 5.94:

			$sql = "ALTER TABLE $nl_vartable ADD $nl_varcolumn[nl_resub] int(5) NOT NULL default '1'";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', _UPDATETABLEFAILED);
				return false;
			}

		break;
		}

	switch($oldversion) {
		case 5.95:
		case 5.96:
		case 5.97:
		case 5.98:
		case 6.03:
		case '6.03a':
		case '6.03a1':
		case '6.03a2':

		break;
		}

    return true;
}


function pntresmailer_delete(){
    $dbconn =& pnDBGetConn(true);
    $pntable = pnDBGetTables();

    $sql = "DROP TABLE $pntable[nl_arch_subscriber]";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        // Report failed deletion attempt
        return false;
    }


    $sql = "DROP TABLE $pntable[nl_archive]";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        // Report failed deletion attempt
        return false;
    }


    $sql = "DROP TABLE $pntable[nl_archive_txt]";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        // Report failed deletion attempt
        return false;
    }


    $sql = "DROP TABLE $pntable[nl_modules]";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        // Report failed deletion attempt
        return false;
    }


    $sql = "DROP TABLE $pntable[nl_subscriber]";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        // Report failed deletion attempt
        return false;
    }


    $sql = "DROP TABLE $pntable[nl_unsubscribe]";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        // Report failed deletion attempt
        return false;
    }


    $sql = "DROP TABLE $pntable[nl_var]";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        // Report failed deletion attempt
        return false;
    }

    return true;
}

?>