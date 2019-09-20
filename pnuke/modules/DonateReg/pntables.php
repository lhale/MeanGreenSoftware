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
function donatereg_pntables()
{ 
    // Initialise table array
    $pntable = array(); 
    // Get the name for the template item table.  This is not necessary
    // but helps in the following statements and keeps them readable
    $donate_selections = pnConfigGetVar('prefix') . '_donate_selections'; // :DH - Was $donate_selections
    // Set the table name
    $pntable['donate_selections'] = $donate_selections; 
    // Set the column names.  Note that the array has been formatted
    // on-screen to be very easy to read by a user.
    $pntable['donate_selections_column'] = array(
    	'donate_selectionid' => $donate_selections . '.pn_id',    // LDH - Was eventid
        'name' => $donate_selections . '.pn_name',
        'orgname' => $donate_selections . '.pn_orgname',    // Corp sponsors & such
        'category' => $donate_selections . '.pn_category',  // ref to donate_categories id
//        'startdate' => $donate_selections . '.pn_startdate',    // LDH - no need for times
//        'starttime' => $donate_selections . '.pn_starttime',
//        'event_start' => $donate_selections . '.pn_event_start',
//        'enddate' => $donate_selections . '.pn_enddate',
//        'endtime' => $donate_selections . '.pn_endtime ',
//        'event_end' => $donate_selections . '.pn_event_end',
//        'reg_startdate' => $donate_selections . '.pn_reg_startdate',
//        'reg_starttime' => $donate_selections . '.pn_reg_starttime',
//        'reg_start' => $donate_selections . '.pn_reg_start',
//        'reg_enddate' => $donate_selections . '.pn_reg_enddate',
//        'reg_endtime' => $donate_selections . '.pn_reg_endtime',
//        'reg_end' => $donate_selections . '.pn_reg_end',
        'location' => $donate_selections . '.pn_location',
        'country' => $donate_selections . '.pn_country',
        'summary' => $donate_selections . '.pn_summary',
        'header' => $donate_selections . '.pn_header',    // LDH - could possibly be the pn_donate_categ's.categ.desc
        'description' => $donate_selections . '.pn_description',
 //       'registrations' => $donate_selections . '.pn_registrations',    // No need for a quota
        'max_donors' => $donate_selections . '.pn_max_donors',    // was max_regs
 //       'fee' => $donate_selections . '.pn_fee',    // donors don't need to pay a fee
        'phone' => $donate_selections . '.pn_phone',
        'eventlogo' => $donate_selections . '.pn_eventlogo',
        'eventicon' => $donate_selections . '.pn_eventicon',
        'commentfieldlabel' => $donate_selections . '.pn_commentfieldlabel',
        'dateadded' => $donate_selections . '.pn_dateadded',
        'addedby' => $donate_selections . '.pn_addedby',
        'datechanged' => $donate_selections . '.pn_datechanged',
        'changedby' => $donate_selections . '.pn_changedby',
//        'printtickets' => $donate_selections . '.pn_printtickets',
//		'regstartampm' => $donate_selections . '.regstartampm',
//		'regendampm' => $donate_selections . '.regendampm',
//		'eventstartampm' => $donate_selections . '.eventstartampm',
//		'eventendampm' => $donate_selections . '.eventendampm',
		'notifyemail' => $donate_selections . '.notifyemail'); 

    // Get the name for the template item table.  This is not necessary
    // but helps in the following statements and keeps them readable
    $donate_categories = pnConfigGetVar('prefix') . '_donate_categories'; 
    // Set the table name
    $pntable['donate_categories'] = $donate_categories; 
    // Set the column names.  Note that the array has been formatted
    // on-screen to be very easy to read by a user.
    $pntable['donate_categories_column'] = array('categoryid' => $donate_categories . '.pn_id',
        'name' => $donate_categories . '.pn_name',
        'description' => $donate_categories . '.pn_description',
		'pc_categoryid' => $donate_categories . '.pc_categoryid'); 
	
    // Get the name for the template item table.  This is not necessary
    // but helps in the following statements and keeps them readable
    $donate_registrations = pnConfigGetVar('prefix') . '_donate_registrations'; 
    // Set the table name
    $pntable['donate_registrations'] = $donate_registrations; 
    // Set the column names.  Note that the array has been formatted
    // on-screen to be very easy to read by a user.
    $pntable['donate_registrations_column'] = array(
    	'registrationid' => $donate_registrations . '.pn_id', 
        'selectionid' => $donate_registrations . '.pn_selectionid',   // ref: pn_donate_selections.pn_id
        'userid' => $donate_registrations . '.pn_userid',
        'nameregistered' => $donate_registrations . '.pn_nameregistered',
        'phone' => $donate_registrations . '.pn_phone',    // LDH - added
        'other' => $donate_registrations . '.pn_other',    // LDH - added either this OR selectionid
        'comments' => $donate_registrations . '.pn_comments',
//        'roomassignment' => $donate_registrations . '.pn_roomassignment',
        'confirmationsent' => $donate_registrations . '.pn_confirmationsent',
        'altphone' => $donate_registrations . '.pn_altphone',
//        'numberofpeople' => $donate_registrations . '.pn_numberofpeople',    // one donor per sign up
	'regemail' => $donate_registrations. '.regemail'); 
	
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
