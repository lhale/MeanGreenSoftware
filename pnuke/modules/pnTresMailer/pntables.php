<?php
// $Id: pntables.php,v 1.2 2005/10/29 09:24:44 kdoerges Exp $
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
// Purpose of file:  Table information for pnTresMailer
// ----------------------------------------------------------------------


function pntresmailer_pntables(){
    $pntable = array();

    $nl_arch_subscriber = pnConfigGetVar('prefix') . '_nl_arch_subscriber';

    $pntable['nl_arch_subscriber'] = $nl_arch_subscriber;

    $pntable['nl_arch_subscriber_column'] = array('arch_mid'   => $nl_arch_subscriber . '.arch_mid',
												  'sub_reg_id' => $nl_arch_subscriber . '.sub_reg_id',
												  'arch_date'  => $nl_arch_subscriber . '.arch_date',
												  'arch_read'  => $nl_arch_subscriber . '.arch_read');


    $nl_archive = pnConfigGetVar('prefix') . '_nl_archive';

    $pntable['nl_archive'] = $nl_archive;

    $pntable['nl_archive_column'] = array('arch_mid'     => $nl_archive . '.arch_mid',
										  'arch_issue'   => $nl_archive . '.arch_issue',
										  'arch_message' => $nl_archive . '.arch_message',
										  'arch_date'    => $nl_archive . '.arch_date');


    $nl_archive_txt = pnConfigGetVar('prefix') . '_nl_archive_txt';

    $pntable['nl_archive_txt'] = $nl_archive_txt;

    $pntable['nl_archive_txt_column'] = array('arch_mid'     => $nl_archive_txt . '.arch_mid',
											  'arch_issue'   => $nl_archive_txt . '.arch_issue',
											  'arch_message' => $nl_archive_txt . '.arch_message',
											  'arch_date'    => $nl_archive_txt . '.arch_date');


    $nl_modules = pnConfigGetVar('prefix') . '_nl_modules';

    $pntable['nl_modules'] = $nl_modules;

    $pntable['nl_modules_column'] = array('mod_id'           => $nl_modules . '.mod_id',
										  'mod_pos'          => $nl_modules . '.mod_pos',
										  'mod_file'         => $nl_modules . '.mod_file',
										  'mod_name'         => $nl_modules . '.mod_name',
										  'mod_function'     => $nl_modules . '.mod_function',
										  'mod_descr'        => $nl_modules . '.mod_descr',
										  'mod_version'      => $nl_modules . '.mod_version',
										  'mod_multi_output' => $nl_modules . '.mod_multi_output',
										  'mod_qty'          => $nl_modules . '.mod_qty',
										  'mod_edit'         => $nl_modules . '.mod_edit',
										  'mod_data'         => $nl_modules . '.mod_data');


    $nl_subscriber = pnConfigGetVar('prefix') . '_nl_subscriber';

    $pntable['nl_subscriber'] = $nl_subscriber;

    $pntable['nl_subscriber_column'] = array('sub_reg_id'	   => $nl_subscriber . '.sub_reg_id',
											                       'sub_uid'       => $nl_subscriber . '.sub_uid',
											                       'sub_name'      => $nl_subscriber . '.sub_name',
											                       'sub_email'     => $nl_subscriber . '.sub_email',
											                       'sub_last_date' => $nl_subscriber . '.sub_last_date');


    $nl_unsubscribe = pnConfigGetVar('prefix') . '_nl_unsubscribe';

    $pntable['nl_unsubscribe'] = $nl_unsubscribe;

    $pntable['nl_unsubscribe_column'] = array('unsub_reg_id'      => $nl_unsubscribe . '.unsub_reg_id',
											  'unsub_uid'         => $nl_unsubscribe . '.unsub_uid',
											  'unsub_name'        => $nl_unsubscribe . '.unsub_name',
											  'unsub_email'       => $nl_unsubscribe . '.unsub_email',
											  'unsub_last_date'   => $nl_unsubscribe . '.unsub_last_date',
											  'unsub_date'        => $nl_unsubscribe . '.unsub_date',
											  'unsub_received'    => $nl_unsubscribe . '.unsub_received',
											  'unsub_remote_addr' => $nl_unsubscribe . '.unsub_remote_addr',
											  'unsub_user_agent'  => $nl_unsubscribe . '.unsub_user_agent',
											  'unsub_who'         => $nl_unsubscribe . '.unsub_who');


    $nl_var = pnConfigGetVar('prefix') . '_nl_var';

    $pntable['nl_var'] = $nl_var;

    $pntable['nl_var_column'] = array('nl_var_id'      => $nl_var . '.nl_var_id',
									  'nl_header'      => $nl_var . '.nl_header',
									  'nl_footer'      => $nl_var . '.nl_footer',
									  'nl_subject'     => $nl_var . '.nl_subject',
									  'nl_name'        => $nl_var . '.nl_name',
									  'nl_email'       => $nl_var . '.nl_email',
									  'nl_url'         => $nl_var . '.nl_url',
									  'nl_tpl_html'    => $nl_var . '.nl_tpl_html',
									  'nl_tpl_text'    => $nl_var . '.nl_tpl_text',
									  'nl_issue'       => $nl_var . '.nl_issue',
									  'nl_bulk_count'  => $nl_var . '.nl_bulk_count',
									  'nl_loop_count'  => $nl_var . '.nl_loop_count',
									  'nl_mail_server' => $nl_var . '.nl_mail_server',
									  'nl_unreg'       => $nl_var . '.nl_unreg',
									  'nl_system'      => $nl_var . '.nl_system',
									  'nl_popup'       => $nl_var . '.nl_popup',
									  'nl_popup_days'  => $nl_var . '.nl_popup_days',
									  'nl_sample'      => $nl_var . '.nl_sample',
									  'nl_personal'    => $nl_var . '.nl_personal',
									  'nl_resub'       => $nl_var . '.nl_resub');

    return $pntable;
}

?>