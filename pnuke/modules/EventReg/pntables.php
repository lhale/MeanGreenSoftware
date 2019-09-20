<?php 
// $Id: pntables.php,v 1.9 2005/01/09 02:01:40 nuclearw Exp $
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

// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WIthOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: Jim McDonald
// Purpose of file:  Table information for template module
// ----------------------------------------------------------------------
// ----------------------------------------------------------------------
// Seminars module by Vassilis Stratigakis
// http://www.tequilastarrise.net
// webmaster@tequilastarrise.net
// ----------------------------------------------------------------------
/**
 * This function is called internally by the core whenever the module is
 * loaded.  It adds in the information
 */
function eventreg_pntables()
{ 
    // Initialise table array
    $pntable = array(); 
    // Get the name for the template item table.  This is not necessary
    // but helps in the following statements and keeps them readable
    $eventreg_events = pnConfigGetVar('prefix') . '_eventreg_events'; 
    // Set the table name
    $pntable['eventreg_events'] = $eventreg_events; 
    // Set the column names.  Note that the array has been formatted
    // on-screen to be very easy to read by a user.
    $pntable['eventreg_events_column'] = array('eventid' => $eventreg_events . '.pn_id',
        'name' => $eventreg_events . '.pn_name',
        'orgname' => $eventreg_events . '.pn_companyname',
        'category' => $eventreg_events . '.pn_category',
        'startdate' => $eventreg_events . '.pn_startdate',
        'starttime' => $eventreg_events . '.pn_starttime',
        'event_start' => $eventreg_events . '.pn_event_start',
        'enddate' => $eventreg_events . '.pn_enddate',
        'endtime' => $eventreg_events . '.pn_endtime ',
        'event_end' => $eventreg_events . '.pn_event_end',
        'reg_startdate' => $eventreg_events . '.pn_reg_startdate',
        'reg_starttime' => $eventreg_events . '.pn_reg_starttime',
        'reg_start' => $eventreg_events . '.pn_reg_start',
        'reg_enddate' => $eventreg_events . '.pn_reg_enddate',
        'reg_endtime' => $eventreg_events . '.pn_reg_endtime',
        'reg_end' => $eventreg_events . '.pn_reg_end',
        'location' => $eventreg_events . '.pn_location',
        'country' => $eventreg_events . '.pn_country',
        'summary' => $eventreg_events . '.pn_summary',
        'header' => $eventreg_events . '.pn_header',
        'description' => $eventreg_events . '.pn_description',
        'registrations' => $eventreg_events . '.pn_registrations',
        'max_regs' => $eventreg_events . '.pn_max_regs',
        'fee' => $eventreg_events . '.pn_fee',
        'phone' => $eventreg_events . '.pn_phone',
        'eventlogo' => $eventreg_events . '.pn_eventlogo',
        'eventicon' => $eventreg_events . '.pn_eventicon',
        'commentfieldlabel' => $eventreg_events . '.pn_commentfieldlabel',
        'dateadded' => $eventreg_events . '.pn_dateadded',
        'addedby' => $eventreg_events . '.pn_addedby',
        'printtickets' => $eventreg_events . '.pn_printtickets',
		'regstartampm' => $eventreg_events . '.regstartampm',
		'regendampm' => $eventreg_events . '.regendampm',
		'eventstartampm' => $eventreg_events . '.eventstartampm',
		'eventendampm' => $eventreg_events . '.eventendampm',
		'notifyemail' => $eventreg_events . '.notifyemail'); 

    // Get the name for the template item table.  This is not necessary
    // but helps in the following statements and keeps them readable
    $eventreg_categories = pnConfigGetVar('prefix') . '_eventreg_categories'; 
    // Set the table name
    $pntable['eventreg_categories'] = $eventreg_categories; 
    // Set the column names.  Note that the array has been formatted
    // on-screen to be very easy to read by a user.
    $pntable['eventreg_categories_column'] = array('categoryid' => $eventreg_categories . '.pn_id',
        'name' => $eventreg_categories . '.pn_name',
        'description' => $eventreg_categories . '.pn_description',
		'pc_categoryid' => $eventreg_categories . '.pc_categoryid'); 
	
    // Get the name for the template item table.  This is not necessary
    // but helps in the following statements and keeps them readable
    $eventreg_registrations = pnConfigGetVar('prefix') . '_eventreg_registrations'; 
    // Set the table name
    $pntable['eventreg_registrations'] = $eventreg_registrations; 
    // Set the column names.  Note that the array has been formatted
    // on-screen to be very easy to read by a user.
    $pntable['eventreg_registrations_column'] = array('registrationid' => $eventreg_registrations . '.pn_id',
        'eventid' => $eventreg_registrations . '.pn_eventid',
        'userid' => $eventreg_registrations . '.pn_userid',
        'comments' => $eventreg_registrations . '.pn_comments',
        'roomassignment' => $eventreg_registrations . '.pn_roomassignment',
        'confirmationsent' => $eventreg_registrations . '.pn_confirmationsent',
        'nameregistered' => $eventreg_registrations . '.pn_nameregistered',
        'altphone' => $eventreg_registrations . '.pn_altphone',
        'numberofpeople' => $eventreg_registrations . '.pn_numberofpeople',
	'regemail' => $eventreg_registrations. '.regemail'); 
	
	//This is a work around to be able to get data out of the PostCalendar about the categories.  I just couldn't find any obvious function in the PostCalendar code to give a list of available categories, so for now we'll just generate it ourselves.  The table defs are from the PostCalendar 4.01 code
	
	// Get the name for the template item table.  This is not necessary
    // but helps in the following statements and keeps them readable
    $pc_categories = pnConfigGetVar('prefix') . '_postcalendar_categories';   
    //Set the table name
    $pntable['postcalendar_categories'] = $pc_categories;
    $pntable['postcalendar_categories_column'] = array(
        'catid'         => 'pc_catid',
        'catname'       => 'pc_catname',
        'catcolor'      => 'pc_catcolor',
        'catdesc'       => 'pc_catdesc'
        );
	
    // Return the table information
    return $pntable;
} 

?>
