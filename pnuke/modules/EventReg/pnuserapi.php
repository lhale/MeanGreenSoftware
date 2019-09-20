<?php 
// $Id: pnuserapi.php,v 1.28 2005/04/07 04:57:16 nuclearw Exp $
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
// Original Author of file: Erik Bartels
// Purpose of file:  EventReg User API
// ----------------------------------------------------------------------
// changelog:
// 04/05/2004  Modified counteventsincategory & getallevents functions to filter events
// That happened in the past.
// 04/05/2004  Modified getallevents function to use ADODB to modify date format, and
// removed the corresponding code for date format conversion from viewcategories

function eventreg_userapi_createregistration($args)
{
    extract($args);
    // if ((!isset($name)) ||
    // (!isset($description))) {
    // pnSessionSetVar('errormsg', _EVENTREGNEWCATEGORYADMINREQARGS);
    // return false;
    // } 
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing
    if (!pnSecAuthAction(0, 'EventReg::registration', "$eventid::", ACCESS_READ)) {
        pnSessionSetVar('errormsg', _EVENTREGNOREGISTRATIONAUTH);
        return false;
    } 
	
	//Check if registration is still open for this event
	//Added by Brian M 12-23-04
	If(!pnModAPIFunc('EventReg', 'user', 'checkregopen', array('event_id' => $eventid))) {
		//pnSessionSetVar('errormsg', _EVENTREG_REGWINDOWCLOSED2);
		//didn't set that errormsq because it appears at wrong time(?)
       		return false;
	}

    // Get database setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn()
    // we currently just want the first item, which is the official
    // database handle.  For pnDBGetTables() we want to keep the entire
    // tables array together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // Start of routine to check if this event has reached the max_regs threshold.
    // Added this check for EventReg .511
    $event = pnModAPIFunc('EventReg', 'user', 'getevent', array('eventid' => $eventid));
	/* replacing with new getistration check function - brian 1/14/05
    if (($event['registrations'] + pnVarPrepForStore($numberofpeople)) >= $event['max_regs']) {
        pnSessionSetVar('errormsg', _MAXREGSREACHED);
        return false;
    } 
	*/
	$reg_status = pnModAPIFunc('EventReg', 'user', 'checkfull', array('eventid' => $eventid));
	//first see if the event is full already
	if ($reg_status[event_full]) {
		//echo "sorry already full<br>";
		//pnSessionSetVar('errormsg', _MAXREGSREACHED);
        return false;
	}
	//Second, check that there are enough seats left to fit the number of people in this registration,
	//i.e. this registration isnt' for 5 people, but there are only 3 seats left
	
	if ($reg_status[seats_left] - pnVarPrepForStore($numberofpeople) < 0) {
		//sorry, not enough room left for requested # of people
		//echo "not enough room<br>";
		//pnSessionSetVar('errormsg', _NOTENOUGHROOM);
        return false;
	}
	//End checks to make sure there is room left
	
	//Check to make sure the user hasn't already registered for this event - Brian M 1-15-05
	if(pnModAPIFunc('EventReg', 'user', 'alreadyregistered', array('event_id' => $eventid))) {
		//sorry, not enough room left for requested # of people
		//echo "not enough room<br>";
		pnSessionSetVar('errormsg', _ALREADYREGISTERED);
        return false;
	}
	//End check to make sure user isn't already registered
	
    // End of max_regs check routine added for EventReg .511
    // It's good practice to name the table and column definitions you
    // are getting - $table and $column don't cut it in more complex
    // modules
    $registrationstable = $pntable['eventreg_registrations'];
    $registrationscolumn = &$pntable['eventreg_registrations_column']; 
    // Get next ID in table - this is required prior to any insert that
    // uses a unique ID, and ensures that the ID generation is carried
    // out in a database-portable fashion
    $nextId = $dbconn->GenId($registrationtable); 
    // Add item - the formatting here is not mandatory, but it does make
    // the SQL statement relatively easy to read.  Also, separating out
    // the sql statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
    $sql = "INSERT INTO $registrationstable (
              $registrationscolumn[registrationid],
              $registrationscolumn[userid],
              $registrationscolumn[eventid],
              $registrationscolumn[nameregistered],
              $registrationscolumn[numberofpeople],
              $registrationscolumn[altphone],
              $registrationscolumn[comments],
              $registrationscolumn[regemail])
            VALUES (
              $nextId,
              '" . pnVarPrepForStore($userid) . "',
              '" . pnVarPrepForStore($eventid) . "',
              '" . pnVarPrepForStore($nameregistered) . "',
              '" . pnVarPrepForStore($numberofpeople) . "',
              '" . pnVarPrepForStore($altphone) . "',
              '" . pnvarPrepForStore($comment) . "',
	      	  '" . pnVarPrepForStore($regemail) . "')";
//echo $sql;
    $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATEREGFAILED . $sql);
		//echo "reg insert failed<br>";
        return false;
    } 

    // Get the ID of the item that we inserted.  It is possible, although
    // very unlikely, that this is different from $nextId as obtained
    // above, but it is better to be safe than sorry in this situation
    $registrationid = $dbconn->PO_Insert_ID($registrationstable, $registrationscolumn['registrationid']); 
    // Let any hooks know that we have created a new item.  As this is a
    // create hook we're passing 'tid' as the extra info, which is the
    // argument that all of the other functions use to reference this
    // item
		
		
		
    // Now increment number of registrations in relevant table
    $eventstable = $pntable['eventreg_events'];
    $eventscolumn = &$pntable['eventreg_events_column']; 
    // Update item - the formatting here is not mandatory, but it does make
    // the SQL statement relatively easy to read.  Also, separating out
    // the sql statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
   
	 
	//Add the number of people being registered (as declared by the user) to the registrations count.  First make sure that $numberofpeople is an integer
	
	/*  As of now, the registration field of the events table is only to be used for counting OFFLINE registrations, no longer updated upon online reg. - Brian 1-21-05
	If (!is_int($numberofpeople)) {
		$numberofpeople = intval($numberofpeople);
	}
	IF ($numberofpeople <= 0) {
		$numberofpeople = 1;
	}
    $sql = "UPDATE $eventstable
    	SET $eventscolumn[registrations] = $event[registrations] + $numberofpeople
              WHERE $eventscolumn[eventid] = $event[eventid]";
	     
	
    $dbconn->Execute($sql);
    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATEREGFAILED);
		//echo "reg count update failed<br>";
        return false;
    } 
	*/
		//send out notification e-mails (if e-mail is a valid one)
		IF (check_mail($regemail)) {
		// Load API.  All of the actual work for obtaining information on the items
    // is done within the API, so we need to load that in before we can do
    // anything.  If the API fails to load an appropriate error message is
    // posted and the function returns
    if (!pnModAPILoad('EventReg', 'user')) {
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    } 
		
		//consolidated e-mail function - Brian M 12-23-04
	pnModAPIFunc('EventReg',
        'user',
        'sendnotifications',
        array('eventid' => $eventid, 'regemail' => $regemail, 'nameregistered' => $nameregistered, 'comment' => $comment, 'eventname' => $event[name], 'type' => 'register'));

		}

	
//done firing e-mail function
		
    pnModCallHooks('item', 'create', $registrationid, 'id'); 
    // Return the id of the newly created item to the calling process
    return $registrationid;
} 

function eventreg_userapi_buildDaySelect($args)
{
    extract($args);

    if (!isset($pc_day)) {
        $pc_day = Date('d');
    } 
    // create the return object to be inserted into the form
    $output = array();
    $count = 0;
    if (!isset($selected)) $selected = '';
    for ($i = 1; $i <= 31; $i++) {
        if ($selected) {
            $sel = $selected == $i ? true : false;
        } elseif ($i == $pc_day) {
            $sel = true;
        } else {
            $sel = false;
        } 
        $output[$count]['id'] = $i;
        $output[$count]['selected'] = $sel;
        $output[$count]['name'] = $i;
        $count++;
    } 

    return $output;
} 

/**
 * Returns an array of form data for FormSelectMultiple
 */
function eventreg_userapi_buildYearSelect($args)
{
    extract($args);

    if (!isset($pc_year)) {
        $pc_year = Date('Y');
    } 
    // create the return object to be inserted into the form
    $output = array(); 
    // we want the list to contain 10 year before today and 30 years after
    // maybe this will eventually become a user defined value
    $pc_start_year = $pc_year - 10;
    $pc_end_year = $pc_year + 30;
    $count = 0;
    if (!isset($selected)) $selected = '';
    for ($i = $pc_start_year; $i <= $pc_end_year; $i++) {
        if ($selected) {
            $sel = $selected == $i ? true : false;
        } elseif ($i == $pc_year) {
            $sel = true;
        } else {
            $sel = false;
        } 
        $output[$count]['id'] = $i;
        $output[$count]['selected'] = $sel;
        $output[$count]['name'] = $i;
        $count++;
    } 

    return $output;
} 

/**
 * Returns an array of form data for FormSelectMultiple
 */
function eventreg_userapi_buildTimeSelect($args)
{
//Commented out by Erik Bartels 1/11/05, Event Creation will be 24hr only
//    $time24hours = pnModGetVar('PostCalendar', 'time24hours');
$time24hours = true;

    $inc = 15; // <--- should this be a setting?
    extract($args);

    $output = array();
    $output['h'] = array();
    $output['m'] = array();

    if ($time24hours) {
        $start = 0;
        $end = 23;
    } else {
        $start = 1;
        $end = 12;
    } 

    if (!$time24hours) {
        $hselected = $hselected > 12 ? $hselected -= 12 : $hselected ;
    } 

    $count = 0;
    for ($h = $start; $h <= $end; $h++) {
        $hour = $h < 10 ? "0$h" : "$h";
        $selected = $hselected == $hour ? true : false;
        $output['h'][$count]['id'] = pnVarPrepForStore($h);
        $output['h'][$count]['selected'] = $selected;
        $output['h'][$count]['name'] = pnVarPrepForDisplay($hour);
        $count++;
    } 

    $count = 0;
    for ($m = 0; $m <= 60 - $inc; $m += $inc) {
        $min = $m < 10 ? "0$m" : "$m";
        $selected = $mselected == $min ? true : false;
        $output['m'][$count]['id'] = pnVarPrepForStore($m);
        $output['m'][$count]['selected'] = $selected;
        $output['m'][$count]['name'] = pnVarPrepForDisplay($min);
        $count++;
    } 

    return $output;
} 

function eventreg_userapi_buildMonthSelect($args)
{
    extract($args);

    if (!isset($pc_month)) {
        $pc_month = Date('m');
    } 
    // create the return object to be inserted into the form
    $output = array();
    $count = 0;
    if (!isset($selected)) $selected = '';
    for ($i = 1; $i <= 12; $i++) {
        if ($selected) {
            $sel = $selected == $i ? true : false;
        } elseif ($i == $pc_month) {
            $sel = true;
        } else {
            $sel = false;
        } 

        $output[$count]['id'] = $i;
        $output[$count]['selected'] = $sel;
        $output[$count]['name'] = $i;
        $count++;
    } 

    return $output;
} 

//Function to count total number of events in database for use with pager 
// (actually used by the admin area to make pager for admin list of all events)
function eventreg_userapi_countitems($args)
{
    extract($args); 

    
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $eventtable = $pntable['eventreg_events'];
    $eventcolumn = &$pntable['eventreg_events_column']; 
    // Get item - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the Execute() command allows for simpler debug operation
    // if it is ever needed
    /* No reason to get these fields when all we really want is a count
	$sql = "SELECT $eventcolumn[name], $eventcolumn[category], $eventcolumn[startdate]
            FROM $eventtable
			where $eventcolumn[category] = $categoryid
			AND ($eventcolumn[startdate] >= '" . date("Y-m-d") . "'" ; */

 //Added this where clause 4/4/2004 to not display events that are in the past to the users.
//Switched to using count() function in sql - Brian M 12-23-04
	$sql = "SELECT COUNT($eventcolumn[name]) FROM $eventtable";

    // $sql .= " group by $eventcolumn[name],$eventcolumn[category]";
//echo $sql."<br><br>";
    $result = $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _COUNTEVENTSSQLFAILED . $sql . "<BR>" . $dbconn->ErrorNo());
        return '0';
    } 
    // Obtain the number of items
	/* Why are we manually counting here, why not just use a COUNT() in the sql? Brian M 12/23/04
    $total = 0;
    while (!$result->EOF) {
        $total++;
        $result->MoveNext();
    } 

    $numitems = $total; //$result->RecordCount;
*/

	list($numitems) = $result->fields;    
    if (!$numitems) {
        $numitems = 0;
    } 
    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
    // Return the number of items
    return $numitems;
} 
/**
 * get all example items
 * 
 * @returns array
 * @return array of items, or false on failure
 */
function eventreg_userapi_counteventsincategory($args)
{
    extract($args); 
    // Argument check - make sure that all required arguments are present, if
    // not then set an appropriate error message and return
    if (!isset($categoryid)) {
        pnSessionSetVar('errormsg', _MISSINGCATEGORY);
        return false;
    } 
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $eventtable = $pntable['eventreg_events'];
    $eventcolumn = &$pntable['eventreg_events_column']; 
    // Get item - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the Execute() command allows for simpler debug operation
    // if it is ever needed
    /* No reason to get these fields when all we really want is a count
	$sql = "SELECT $eventcolumn[name], $eventcolumn[category], $eventcolumn[startdate]
            FROM $eventtable
			where $eventcolumn[category] = $categoryid
			AND ($eventcolumn[startdate] >= '" . date("Y-m-d") . "'" ; */

 //Added this where clause 4/4/2004 to not display events that are in the past to the users.
//Switched to using count() function in sql - Brian M 12-23-04
	$sql = "SELECT COUNT($eventcolumn[name]) FROM $eventtable
			where $eventcolumn[category] = $categoryid
			AND ($eventcolumn[event_start] >= '" . date("Y-m-d G:i:s") . "'" ;
	$sql = $sql . "OR ($eventcolumn[event_start] <= '" . date("Y-m-d G:i:s") . "' AND $eventcolumn[event_end] >= '" . date("Y-m-d G:i:s") . "'))"; //Added by Brian M 12/21/04 to handle events that have started but not finished

    // $sql .= " group by $eventcolumn[name],$eventcolumn[category]";
//echo $sql."<br><br>";
    $result = $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _COUNTCATEGORYSQLFAILED . $sql . "<BR>" . $dbconn->ErrorNo());
        return '0';
    } 
    // Obtain the number of items
	/* Why are we manually counting here, why not just use a COUNT() in the sql? Brian M 12/23/04
    $total = 0;
    while (!$result->EOF) {
        $total++;
        $result->MoveNext();
    } 

    $numitems = $total; //$result->RecordCount;
*/

	list($numitems) = $result->fields;    
    if (!$numitems) {
        $numitems = 0;
    } 
    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
    // Return the number of items
    return $numitems;
} 

function eventreg_userapi_countcategories()
{ 
    // Argument check - make sure that all required arguments are present, if
    // not then set an appropriate error message and return
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $categoriestable = $pntable['eventreg_categories'];
    $categoriescolumn = &$pntable['eventreg_categories_column']; 
    // Get item - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the Execute() command allows for simpler debug operation
    // if it is ever needed
    $sql = "SELECT COUNT(1)
            FROM $categoriestable";
    $result = $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _COUNTCATEGORYSQLFAILED . $sql . $eventable);
        return false;
    } 
    // Obtain the number of items
    list($numitems) = $result->fields;

    if (!$numitems) {
        $numitems = 0;
    } 
    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
    // Return the number of items
    return $numitems;
} 


function eventreg_userapi_getallcategories($args)
{ 
    
    extract($args); 
    // Optional arguments.
    $items = array(); 
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing
    if (!pnSecAuthAction(0, 'EventReg::', '::', ACCESS_READ)) {
        return $items;
    } 
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    list($dbconn2) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $categorytable = $pntable['eventreg_categories'];
    $categorycolumn = &$pntable['eventreg_categories_column']; 
    // Get items - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the SelectLimit() command allows for simpler debug
    // operation if it is ever needed
    $sql = "SELECT $categorycolumn[categoryid],
                   $categorycolumn[name],
                   $categorycolumn[description]
            FROM $categorytable
            ORDER BY $categorycolumn[name]";
    $result = $dbconn->Execute($sql); //SelectLimit($sql, $numitems, $startnum-1);
     
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETALLCATEGORIESFAILED);
        return false;
    } 
    // Put items into result array.  Note that each item is checked
    // individually to ensure that the user is allowed access to it before it
    // is added to the results array
    for (; !$result->EOF; $result->MoveNext()) {
        list($categoryid, $name, $description) = $result->fields;
        if (pnSecAuthAction(0, 'EventReg::', "$name::$categoryid", ACCESS_READ)) {
            $items[] = array('categoryid' => $categoryid,
                'name' => $name,
                'description' => $description);
        } 
    } 
    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
    // Return the items
    return $items;
} 

function eventreg_userapi_getallevents($args)
{ 
    
    extract($args); 
    // Optional arguments.
    if (!isset($startnum)) {
        $startnum = 1;
    } 
    if (!isset($numitems)) {
        $numitems = -1;
    } 

    if ((!isset($startnum)) ||
            (!isset($numitems))) {
        pnSessionSetVar('errormsg', _MODARGSERROR);
        return false;
    } 

    $items = array(); 
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing
    if (!pnSecAuthAction(0, 'EventReg::', '::', ACCESS_READ)) {
        return $items;
    } 
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $eventtable = $pntable['eventreg_events'];
    $eventcolumn = &$pntable['eventreg_events_column']; 
    // Get items - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the SelectLimit() command allows for simpler debug
    // operation if it is ever needed (LDH - added header for hyperlink title info
    $sql = "SELECT $eventcolumn[eventid],
                   $eventcolumn[name],
                   $eventcolumn[category],
                   $eventcolumn[description],
                   $eventcolumn[event_start],
                   $eventcolumn[summary],
                   $eventcolumn[header]
            FROM $eventtable 
			where ($eventcolumn[event_start] >= '" . date("Y-m-d G:i:s") . "'"; //Added this where clause 4/4/2004 to not display events that are in the past to the users.
	$sql = $sql . "OR ($eventcolumn[event_start] <= '" . date("Y-m-d G:i:s") . "' AND $eventcolumn[event_end] >= '" . date("Y-m-d G:i:s") . "'))"; //Added by brian 12/21/04 to handle events that have started but not finished
    if (isset($categoryid)) {
        $sql = $sql . " AND $eventcolumn[category] = " . pnVarPrepForStore($categoryid) . " ";
    } 
    $sql = $sql . "ORDER BY $eventcolumn[event_start]";

    $result = $dbconn->SelectLimit($sql, $numitems, $startnum-1); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETEVENTSFAILED . $sql );
        return false;
    } 
    // Put items into result array.  Note that each item is checked
    // individually to ensure that the user is allowed access to it before it
    // is added to the results array
    for (; !$result->EOF; $result->MoveNext()) {
        list($eventid, $name, $categoryid, $description, $event_start, $summary, $header) = $result->fields;
        if (pnSecAuthAction(0, 'EventReg::event', ":$categoryid:$eventid", ACCESS_READ)) {
            $items[] = array('eventid' => $eventid,
                'name' => $name,
                'categoryid' => $categoryid,
                'description' => $description,
                'event_start' => dttm2unixtime($event_start),
		'reg_end' => dttm2unixtime($reg_end),
                'summary' => $summary,
                'header' => $header);
        } 
    } 
    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
    // Return the items
    return $items;
} 

/**
 * get a specific item
 * 
 * @param  $args ['tid'] id of example item to get
 * @returns array
 * @return item array, or false on failure
 */
function eventreg_userapi_getcategory($args)
{ 
    // Get arguments from argument array - all arguments to this function
    // should be obtained from the $args array, getting them from other places
    // such as the environment is not allowed, as that makes assumptions that
    // will not hold in future versions of PostNuke
    extract($args); 
    // Argument check - make sure that all required arguments are present, if
    // not then set an appropriate error message and return
    if (!isset($categoryid)) {
        pnSessionSetVar('errormsg', _EVENTREGMISSINGCATID);
        return false;
    } 
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $eventcategoriestable = $pntable['eventreg_categories'];
    $eventcategoriescolumn = &$pntable['eventreg_categories_column']; 
    // Get item - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the Execute() command allows for simpler debug operation
    // if it is ever needed
    $sql = "SELECT $eventcategoriescolumn[name],
                   $eventcategoriescolumn[description],
                   $eventcategoriescolumn[pc_categoryid]
            FROM $eventcategoriestable
            WHERE $eventcategoriescolumn[categoryid] = " . pnVarPrepForStore($categoryid);
	    //echo $sql;
    $result = $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _MODARGSERROR . '3232' . $sql);
        return false;
    } 
    // Check for no rows found, and if so return
    if ($result->EOF) {
        return false;
    } 
    // Obtain the item information from the result set
    list($name, $description, $pc_categoryid) = $result->fields;
    // pnSessionSetVar('errormsg', _MODARRROR . "  $catid  1 " . $name . '  2 ' . $description); 
    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
    // Security check - important to do this as early on as possible to avoid
    // potential security holes or just too much wasted processing.  Although
    // this one is a bit late in the function it is as early as we can do it as
    // this is the first time we have the relevant information
    if (!pnSecAuthAction(0, 'EventReg::', "::", ACCESS_READ)) {
        return false;
    } 
    // Create the item array
    $cat = array('categoryid' => $categoryid,
        'name' => $name,
        'description' => $description,
	'pc_categoryid' => $pc_categoryid); 
    // Return the item array
    return $cat;
} 

/**
 * get a specific item
 * 
 * @param  $args ['tid'] id of example item to get
 * @returns array
 * @return item array, or false on failure
 */

function eventreg_userapi_getevent($args)
{ 
    // Get arguments from argument array - all arguments to this function
    // should be obtained from the $args array, getting them from other places
    // such as the environment is not allowed, as that makes assumptions that
    // will not hold in future versions of PostNuke
    extract($args); 
    // Argument check - make sure that all required arguments are present, if
    // not then set an appropriate error message and return
    if (!isset($eventid)) {
        pnSessionSetVar('errormsg', _MISSINGEVENTID);
        return false;
    } 
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $eventtable = $pntable['eventreg_events'];
    $eventcolumn = &$pntable['eventreg_events_column']; 
    // Get item - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the Execute() command allows for simpler debug operation
    // if it is ever needed
    $sql = "SELECT $eventcolumn[eventid],
             	   $eventcolumn[name],
                   $eventcolumn[orgname],
                   $eventcolumn[category],
                   $eventcolumn[event_start],
                   $eventcolumn[event_end],
                   $eventcolumn[reg_start],
                   $eventcolumn[reg_end],
                   $eventcolumn[location],
                   $eventcolumn[country],
                   $eventcolumn[header],
                   $eventcolumn[summary],
                   $eventcolumn[description],
                   $eventcolumn[registrations],
                   $eventcolumn[max_regs],
                   $eventcolumn[fee],
                   $eventcolumn[phone],
                   $eventcolumn[eventlogo],
                   $eventcolumn[eventicon],
                   $eventcolumn[commentfieldlabel],
                   $eventcolumn[dateadded],
                   $eventcolumn[addedby],
                   $eventcolumn[notifyemail]
                   FROM $eventtable
                   WHERE $eventcolumn[eventid] = " . pnVarPrepForStore($eventid);
    $result = $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        return false;
    } 
    // Check for no rows found, and if so return
    if ($result->EOF) {
        return false;
    } 
    // Obtain the item information from the result set
    list($eventid, $name,
         $orgname, $category,
         $event_start, $event_end,
         $reg_start, $reg_end,
         $location, $country, 
         $header, $summary, 
         $description,  $registrations,
         $max_regs, $fee, 
         $phone, $eventlogo, 
         $eventicon, $commentfieldlabel, 
         $dateadded, $addedby, $notifyemail) = $result->fields; 
    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close();
	
    if (!pnSecAuthAction(0, 'EventReg::', "::", ACCESS_READ)) {
        return false;
    } 
    // Create the item array

	if (strpos($location,'{')) {
	    $loc_data = unserialize($location);
        } ELSE {	
	$loc_data['event_location'] = $location; 
	$loc_data['event_street1'] = null;
        $loc_data['event_street2'] = null;
        $loc_data['event_city'] = null;
        $loc_data['event_state'] = null;
        $loc_data['event_postal'] = null;

	}


    $event = array('eventid' => $eventid,
        'name' => $name,
        'orgname' => $orgname,
        'category' => $category,
        'event_start' => dttm2unixtime($event_start),
        'event_end' => dttm2unixtime($event_end),
        'reg_start' => dttm2unixtime($reg_start),
        'reg_end' => dttm2unixtime($reg_end),
        'location' => $loc_data['event_location'],
        'addr1' => $loc_data['event_street1'],
        'addr2' => $loc_data['event_street2'],
        'city' => $loc_data['event_city'],
        'state' => $loc_data['event_state'],
        'zipcode' => $loc_data['event_postal'],
        'country' => $country,
        'header' => $header,
        'summary' => $summary,
        'description' => $description,
		'registrations' => $registrations,
        'max_regs' => $max_regs,
        'fee' => $fee,
        'phone' => $phone,
        'eventlogo' => $eventlogo,
        'eventicon' => $eventicon,
        'commentfieldlabel' => $commentfieldlabel,
	'notifyemail' => $notifyemail); 
    // Return the item array
    return $event;
} 


function eventreg_userapi_getregistrationsforevent($args)
{
    extract($args);
    if (!$eventid) {
        pnSessionSetVar('errormsg', _GETREGISTRATIONSFAILED);
        return false;
    } 

    if (!pnSecAuthAction(0, 'EventReg::', "::", pnModGetVar('EventReg','viewregistrationlevel'))) {
        return false;
    } 

    $registrations = array();

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $registrationstable = $pntable['eventreg_registrations'];
    $registrationscolumn = &$pntable['eventreg_registrations_column'];

    $sql = "SELECT $registrationscolumn[registrationid], 
                   $registrationscolumn[userid],
                   $registrationscolumn[comments],
                   $registrationscolumn[nameregistered],
                   $registrationscolumn[altphone],
                   $registrationscolumn[numberofpeople],
                   $registrationscolumn[confirmationsent],
                   $registrationscolumn[roomassignment],
                   $registrationscolumn[regemail]
                   FROM $registrationstable
                   WHERE $registrationscolumn[eventid] = $eventid";

    $result = $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETALLregistrationsFAILED . $sql);
        return false;
    } 
    if (!$result->EOF) {
        while (list($registrationid, $userid, $comments, $nameregistered, $altphone,
                $numberofpeople, $confirmationsent, $roomassignment, $regemail) = $result->fields) {
            $registrations[] = array('registrationid' => $registrationid,
                'userid' => $userid,
                'comments' => $comments,
                'nameregistered' => $nameregistered,
                'altphone' => $altphone,
                'numberofpeople' => $numberofpeople,
                'confirmationsent' => $confirmationsent,
                'roomassignment' => $roomassignment,
		'regemail' => $regemail
                );
            $result->MoveNext();
        } 
    } 
    return $registrations;
} 



//Quick functions to verify that e-mail addresses are reasonable ones
//Probably should be done elsewhere in the api, but this will work for now.
function ereg_words($car, $data){
   $err = false;
   $cnt = strlen($data);
   $len = strlen($car);
   for($i=0;$i<$cnt;$i++){
       $errm = false;
       $chrm = strtolower($data{$i});
       for($k=0;$k<$len;$k++) if($car{$k}==$chrm) $errm = true;
       if(!$errm) $err = true;
   }
   return $err;
} // End ereg_words() -----------

function check_mail($mail){

   // $car -> list acceptable words
   $car = "0123456789.abcdefghijklmnopqrstuvwxyz_@-";
   // $ext -> list extension domain words
   $ext = "abcdefghijklmnopqrstuvwxyz";

   /**
   * if you not use return(), is necesary to put elseif()
   */

   if(ereg_words($car, $mail)) return "01"; // contain invalid caracter(s)
   $expMail = explode("@", $mail);
   if(count($expMail)==1) return "02"; // invalid format
   if(count($expMail)>2) return "03"; // contain multi @ caracters
   else{
       if(empty($expMail[0])) return "04"; // begin at @ is empty
       if(strlen($expMail[1])<3) return "05"; // after @ invalid format
       $expSep = explode(".", $expMail[1]);
       if(count($expSep)==1) return "06"; // invalid format domain host
       else{
           if(empty($expSep[count($expSep)-2])) return "07"; // domain name is empty
           if(strlen($expSep[count($expSep)-1])<2 || strlen($expSep[count($expSep)-1])>4) return "08"; // invalid extension domain
           if(ereg_words($ext, $expSep[count($expSep)-1])) return "09"; // extension domain contain invalid caracter(s)
       }
   }

   return $mail;

} // End check_mail() -----------------------------------
//End e-mail validation functions

/*
funtion countregistrationsforevent()
Purpose:	
	Grabs the total number of people registered for an event via online and offline registration 
Arguments:
	$eventid
Returns:
	$total_regs (integer )
*/
function eventreg_userapi_countregistrationsforevent($args)   
 {   
     extract($args);   
     // Argument check - make sure that all required arguments are present, if   
     // not then set an appropriate error message and return   
     if (!isset($eventid)) {   
         pnSessionSetVar('errormsg', _MISSINGEVENTID);   
         return false;   
     }   
     // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()   
     // return arrays but we handle them differently.  For pnDBGetConn() we   
     // currently just want the first item, which is the official database   
     // handle.  For pnDBGetTables() we want to keep the entire tables array   
     // together for easy reference later on   
     list($dbconn) = pnDBGetConn();   
     $pntable = pnDBGetTables();   
     // It's good practice to name the table and column definitions you are   
     // getting - $table and $column don't cut it in more complex modules   
     $registrationstable = $pntable['eventreg_registrations'];   
     $registrationscolumn = &$pntable['eventreg_registrations_column'];   
     // Get item - the formatting here is not mandatory, but it does make the   
     // SQL statement relatively easy to read.  Also, separating out the sql   
     // statement from the Execute() command allows for simpler debug operation   
     // if it is ever needed   
     $sql = "SELECT sum($registrationscolumn[numberofpeople]) as total   
             FROM $registrationstable   
                         where $registrationscolumn[eventid] = $eventid";   
     $result = $dbconn->Execute($sql);   
     // Check for an error with the database code, and if so set an appropriate   
     // error message and return   
     if ($dbconn->ErrorNo() != 0) {   
         pnSessionSetVar('errormsg', _NUMBOFREGSFAILED . $sql);   
         return false;   
     }   
     // Obtain the number of items   
     list($online_regs) = $result->fields;   
     if (!$online_regs) {   
         $online_regs = 0;   
     }   
     /*
     Starting with EventReg v0.57 the reg count is stored in two places, the registrations table stores a count of online registrations (retrieved above).  The Events table registrations field is now used to store offline registrations.  To get a correct total count, we must retrieve the offline reg # and add it to the online registrations. 
     Brian M - 1-21-05
     */
     
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $eventtable = $pntable['eventreg_events'];
    $eventcolumn = &$pntable['eventreg_events_column']; 
    // Get items - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the SelectLimit() command allows for simpler debug
    // operation if it is ever needed
    $sql = "SELECT $eventcolumn[eventid],
                   	$eventcolumn[registrations], $eventcolumn[max_regs]
            FROM $eventtable 
			where $eventcolumn[eventid] = '".pnVarPrepForStore($eventid)."'";
	//echo $sql."<br>";
    $result = $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETEVENTSFAILED);
        return false;
    } 
    // Put items into result array.  Note that each item is checked
    // individually to ensure that the user is allowed access to it before it
    // is added to the results array
            list($eventid, $offline_regs, $max_regs) = $result->fields;
     
     // All successful database queries produce a result set, and that result   
     // set should be closed when it has been finished with   
     $result->Close();   
     
     //Now add up online and offline registrations to get the total
     $total_regs = $online_regs + $offline_regs;
     
     // Return the number of items   
     return $total_regs;   
 } 

function eventreg_userapi_viewmyregistrations($args)
{
    extract($args);
    if (!pnUserGetVar('uid')) {
        pnSessionSetVar('errormsg', _NOTLOGGEDIN);
        return false;
    } 

    /*This security check is overzealous and causes the myregistrations area to fail if EventReg is 
    not set to let all Registered users view registrations.  This is a bit much since the person is 
    just asking for their own registrations and not those of someone else.
    
    if (!pnSecAuthAction(0, 'EventReg::', "::", pnModGetVar('EventReg','viewregistrationlevel'))) {
        //echo "not authorized to view registrations";
				return false;
    } 
    */

    $userid = pnUserGetVar('uid'); // Sets UID to make sure they cant forge
                                   // someone elses account.

    $registrations = array();

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $registrationstable = $pntable['eventreg_registrations'];
    $registrationscolumn = &$pntable['eventreg_registrations_column'];
    $eventstable = $pntable['eventreg_events'];
    $eventscolumn = &$pntable['eventreg_events_column'];

    /* The join in this query seems to cause problems with older versions of MySQL
    $sql = "SELECT  $registrationscolumn[registrationid],
                    $registrationscolumn[numberofpeople], 
                    $registrationscolumn[nameregistered],
                    $registrationscolumn[eventid], 
                    $eventscolumn[name]
            FROM $registrationstable
            JOIN $eventstable
            ON $registrationscolumn[eventid] = $eventscolumn[eventid]
            WHERE $registrationscolumn[userid] = $userid";
	*/
	//New query that should work better with older versions of MySQL
	$sql = "SELECT $registrationscolumn[registrationid], 
		$registrationscolumn[numberofpeople], 
		$registrationscolumn[nameregistered], 
		$registrationscolumn[eventid],  
		$eventscolumn[name]
		FROM $registrationstable, $eventstable 
		WHERE $registrationscolumn[eventid] = $eventscolumn[eventid] 
		AND $registrationscolumn[userid] = $userid";
	//echo $sql."<br>";
    $result = $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETMYREGISTRATIONSFAILED); //. $sql);
        return false;
    } 
    if (!$result->EOF) {
        while (list($registrationid, $numberofpeople, $nameregistered, 
                    $eventid, $eventname) = $result->fields) {
                    $registrations[] = array('registrationid' => $registrationid,
                    'registrationid' => $registrationid,
                    'numberofpeople' => $numberofpeople,
                    'nameregistered' => $nameregistered,
                    'eventid' => $eventid,
                    'eventname' => $eventname
                );
            $result->MoveNext();
        } 
    } 
    return $registrations;
} 

function eventreg_userapi_getregistration($args)
{ 
    // Get arguments from argument array - all arguments to this function
    // should be obtained from the $args array, getting them from other places
    // such as the environment is not allowed, as that makes assumptions that
    // will not hold in future versions of PostNuke
    extract($args); 
    // Argument check - make sure that all required arguments are present, if
    // not then set an appropriate error message and return
    if (!isset($registrationid)) {
        pnSessionSetVar('errormsg', _EVENTREGMISSINGREGISTRATIONID);
        return false;
    } 
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $registrationstable = $pntable['eventreg_registrations'];
    $registrationscolumn = &$pntable['eventreg_registrations_column']; 
    // Get item - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the Execute() command allows for simpler debug operation
    // if it is ever needed
    $sql = "SELECT $registrationscolumn[registrationid],
                   $registrationscolumn[userid]
            FROM $registrationstable
            WHERE $registrationscolumn[registrationid] = " . pnVarPrepForStore($registrationid);
	    //echo $sql;
    $result = $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _MODARGSERROR . '3232' . $sql);
        return false;
    } 
    // Check for no rows found, and if so return
    if ($result->EOF) {
        return false;
    } 
    // Obtain the item information from the result set
    list($registrationid, $reg_userid) = $result->fields;
    //echo "looked up regid=[".$registrationid."] this registration was made by userid=[".$reg_userid."]";
    
    // pnSessionSetVar('errormsg', _MODARRROR . "  $catid  1 " . $name . '  2 ' . $description); 
    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
    // Security check - important to do this as early on as possible to avoid
    // potential security holes or just too much wasted processing.  Although
    // this one is a bit late in the function it is as early as we can do it as
    // this is the first time we have the relevant information
    if (!pnSecAuthAction(0, 'EventReg::', "::", ACCESS_READ)) {
        return false;
    } 
    // Create the item array
    
    /*What the heck is this?  Am I just totally missing something here of is this just messed up?
    the stuff being returned isn't even what's being retrieved from the database!  This is just a 
    copy of another function.
    
    $cat = array('categoryid' => $categoryid,
        'name' => $name,
        'description' => $description,
	'pc_categoryid' => $pc_categoryid); 
	*/
	$registration = array('registrationid' => $registrationid,
	'userid' => $reg_userid);
    // Return the item array
    return $registration;
} 

/*Function to get more complete registration info for use when sending cancellation e-mails
Need to get the user's e-mail address, the user's name, the eventid and the event notifyemail address
so it can be passes onto the e-mail function later
*/
function eventreg_userapi_getregistration_extrainfo($args)
{ 
    // Get arguments from argument array - all arguments to this function
    // should be obtained from the $args array, getting them from other places
    // such as the environment is not allowed, as that makes assumptions that
    // will not hold in future versions of PostNuke
    extract($args); 
    // Argument check - make sure that all required arguments are present, if
    // not then set an appropriate error message and return
    if (!isset($registrationid)) {
        pnSessionSetVar('errormsg', _EVENTREGMISSINGREGISTRATIONID);
        return false;
    } 
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $registrationstable = $pntable['eventreg_registrations'];
    $registrationscolumn = &$pntable['eventreg_registrations_column'];
		
		$eventtable = $pntable['eventreg_events'];
		$eventscolumn = &$pntable['eventreg_events_column'];
		 
    // Get item - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the Execute() command allows for simpler debug operation
    // if it is ever needed
		
		/*
		want to perform a query like this one to get both the user's reg info and the event info
		SELECT nuke_eventreg_registrations.regemail, nuke_eventreg_registrations.pn_eventid, nuke_eventreg_registrations.pn_nameregistered, nuke_eventreg_events.pn_name, nuke_eventreg_events.notifyemail
    FROM nuke_eventreg_registrations, nuke_eventreg_events
    WHERE nuke_eventreg_registrations.pn_id =19
    AND nuke_eventreg_registrations.pn_eventid = nuke_eventreg_events.pn_id
		*/
    $sql = "SELECT $registrationscolumn[regemail], $registrationscolumn[eventid], $registrationscolumn[nameregistered], $registrationscolumn[numberofpeople], $eventscolumn[name], $eventscolumn[notifyemail]
            FROM $registrationstable, $eventtable
            WHERE $registrationscolumn[registrationid] = " . pnVarPrepForStore($registrationid). " AND $registrationscolumn[eventid] = $eventscolumn[eventid]";
	    //echo $sql;
    $result = $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _MODARGSERROR . '3232' . $sql);
        return false;
    } 
    // Check for no rows found, and if so return
    if ($result->EOF) {
        return false;
    } 
    // Obtain the item information from the result set
    list($user_email, $eventid, $user_names, $numberofpeople, $event_name, $event_notifyemail) = $result->fields;
    // pnSessionSetVar('errormsg', _MODARRROR . "  $catid  1 " . $name . '  2 ' . $description); 
    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
    // Security check - important to do this as early on as possible to avoid
    // potential security holes or just too much wasted processing.  Although
    // this one is a bit late in the function it is as early as we can do it as
    // this is the first time we have the relevant information
    if (!pnSecAuthAction(0, 'EventReg::', "::", ACCESS_READ)) {
        return false;
    } 
    // Create the item array
    $cat = array('user_email' => $user_email,
        'eventid' => $eventid,
        'user_names' => $user_names,
		'numberofpeople' => $numberofpeople,
	'event_name' => $event_name,
	'event_notifyemail' => $event_notifyemail); 
    // Return the item array
    return $cat;
} 

function eventreg_userapi_deleteregistration($args)
{
    // Get arguments from argument array - all arguments to this function
    // should be obtained from the $args array, getting them from other
    // places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    extract($args);
    // Argument check - make sure that all required arguments are present,
    // if not then set an appropriate error message and return
    if (!isset($registrationid)) {
        pnSessionSetVar('errormsg', _EVENTREGMISSINGREGID);
        return false;
    }

    // The user API function is called.  This takes the item ID which
    // we obtained from the input and gets us the information on the
    // appropriate item.  If the item does not exist we post an appropriate
    // message and return
    $registration = pnModAPIFunc('EventReg',
                                 'user',
                                 'getregistration',
                                 array('registrationid' => $registrationid));

    if ($registration == false) {
        $output->Text(_EVENTREGNOSUCHITEM);
        return $output->GetOutput();
    }
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing.
    // However, in this case we had to wait until we could obtain the item
    // name to complete the instance information so this is the first
    // chance we get to do the check    
    
    /*the_lorax trying to rework this so it makes sense
    if (
       $registration[userid] != pnUserGetVar('uid') &&  !pnSecAuthAction(0,'EventReg::registrations','::', ACCESS_ADMIN)
			 $registration[userid] != pnUserGetVar('uid')
     ) {
        $output->Text(_EVENTREGNOTYOURREGISTRATION);
        return $output->GetOutput();
    }
    */
    //want to make sure that either the uid of the registration is the same as that of the user OR that if the uid isn't that of the user, the user making the deletion request is an admin.
    
    //first check if uid of registration matches that of the user
    if ($registration[userid] != pnUserGetVar('uid')){
    	//the uid doesn't match so check if the user has admin rights to EventReg
	
	//echo "this event registration isn't yours!  your uid is: ".pnUserGetVar('uid')." but the registration was made by uid: ".$registration[userid]." if you're not an admin you are a naughty person!";
	
	if (!pnSecAuthAction(0,'EventReg::registrations','::', ACCESS_ADMIN)) {
		//the user isn't an admin but they asking for someone elses events, assume this was a hack attempt
		$output->Text(_EVENTREGNOTYOURREGISTRATION);
        return $output->GetOutput();
	}
    }
		
		//before deleting info from database, grab the registration email and basic 
		//event info so that an e-mail can be sent letting everyone know the deletion has occurred
		
		$deletenotifyinfo = pnModAPIFunc('EventReg',
                                 'user',
                                 'getregistration_extrainfo',
                                 array('registrationid' => $registrationid));
		
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn()
    // we currently just want the first item, which is the official
    // database handle.  For pnDBGetTables() we want to keep the entire
    // tables array together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();
    // It's good practice to name the table and column definitions you
    // are getting - $table and $column don't cut it in more complex
    // modules

    $registrationstable = $pntable['eventreg_registrations'];
    $registrationscolumn = $pntable['eventreg_registrations_column'];

    // Delete the item - the formatting here is not mandatory, but it does
    // make the SQL statement relatively easy to read.  Also, separating
    // out the sql statement from the Execute() command allows for simpler
    // debug operation if it is ever needed

    $sql = "DELETE FROM $registrationstable
            WHERE $registrationscolumn[registrationid] = '" . pnVarPrepForStore($registrationid) . "'";
    $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _EVENTREFDELETEREGFAILED);
        return false;
    }
    // Let any hooks know that we have deleted an item.  As this is a
    // delete hook we're not passing any extra info
    pnModCallHooks('item', 'delete', $categoryid, '');
	
	//Since registrations count is kept in the events table, we need to update accordingly
	/* Never mind, as of now the registrations field is only used for offline registrations
	- Brian M 1-21-05
	$eventstable = $pntable['eventreg_events'];
    $eventscolumn = $pntable['eventreg_events_column'];
	$sql = "UPDATE $eventstable 
	SET $eventscolumn[registrations] = $eventscolumn[registrations] - $deletenotifyinfo[numberofpeople] 
	WHERE $eventscolumn[eventid] = $deletenotifyinfo[eventid]";
		//ECHO $sql."<BR>";
	$dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _EVENTREGUPDATEREGCOUNTFAILED);
        return false;
    }	*/
		
		//Send out e-mails so the user and event owner knows the registration has been cancelled
		//send out notification e-mails (if e-mail is a valid one)
		IF (check_mail($deletenotifyinfo[user_email])) {
		// Load API.  All of the actual work for obtaining information on the items
    // is done within the API, so we need to load that in before we can do
    // anything.  If the API fails to load an appropriate error message is
    // posted and the function returns
    if (!pnModAPILoad('EventReg', 'user')) {
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    } 
		//consolidated e-mail function - Brian M 12-23-04
//echo "delete occurring in event=[".$deletenotifyinfo[eventid]."]<br>";
	pnModAPIFunc('EventReg',
        'user',
        'sendnotifications',
        array('eventid' => $deletenotifyinfo[eventid], 'regemail' => $deletenotifyinfo[user_email], 'nameregistered' => $deletenotifyinfo[user_names], 'eventname' => $deletenotifyinfo[event_name], 'type' => 'cancel'));

		}//done firing e-mail function
		
    // Let the calling process know that we have finished successfully
    return true;
}


/*Function to send out notification e-mails
This is a consolidated version of the old eventreg_userapi_sendregistrationemails($args),
eventreg_userapi_notifyeventowner($args), eventreg_userapi_sendcancellationemails($args) &
eventreg_userapi_notifyeventownercancellation($args) functions
*Also switched over to using the pnMail() function instead of the mail() function
which should make for better compatibility.

Expected arguments--
'eventid' , 'regemail', 'nameregistered', 'comment', 'eventname', 'type')
					'type' should be either "register" or "cancel"

*/
function EventReg_userapi_sendnotifications($args){
				 //First gather the arguments passed into the function
				 extract($args);
				 
	

				 //First thing, before we bother creating the e-mails, let's make sure that
				 //the user's e-mail address is valid
				 if(!check_mail($regemail)){
				 			//the email adderss provided by the user doesn't look valid
							return false;
				 }
								 
				 //Gather some data that will be needed
				 
				 //Get the details of the event in question preformatted for email
				 			 // Load API.  All of the actual work for obtaining information on the items
                  // is done within the API, so we need to load that in before we can do
                  // anything.  If the API fails to load an appropriate error message is
                  // posted and the function returns
                  if (!pnModLoad('EventReg', 'user')) {
                      $output->Text(_LOADFAILED);
                      return $output->GetOutput();
                  } 
                  // The API function is called.  The arguments to the function are passed in
                  // as their own arguments array
              		$event_details .= pnModFunc('EventReg',
                      'user',
                      'emailinfo',
                      array('eventid' =>$eventid));
				
				//Get the event details (normal format)  we use this to find out who the event owner is
							// The API function is called.  The arguments to the function are passed in
                  // as their own arguments array
                  $event = pnModAPIFunc('EventReg',
                      'user',
                      'getevent',
                      array('eventid' =>$eventid));
				
				//Is this supposed to be an email about a registration or a cancellation?
				If($type == "register"){
								 //Send e-mails for registrations
								 
								 //Send e-mail to the user first
  								 $to  = $regemail;
  								 $subject = _EMAILSUBJECTREGMADE.$eventname;
  								 $message = _USERNOTIFY."\n".Chr(10);
                	$message .= _NAMEREGISTERED." ".$nameregistered." (".$regemail.")\n".Chr(10);
                	$message .= _REGNOTIFYCOMMENT."\n".$comment."\n".Chr(10);
                	$message .= _EVENTINFOFOLLOWS."\n".Chr(10);
                	$message .= "*******************************************************************************\n".chr(10);
                	$message .= $event_details;
                	$headers .= "To: ".$regemail."\r\n";
                  $headers .= "From: ".$event[notifyemail]."\r\n";
                  
                  /* and now mail it */
                  pnMail($to, $subject, $message, $headers);
									
								 //Done with user's email
								 //Send e-mail to event's owner
								 $to  = $event[notifyemail];
								 $subject = _EMAILSUBJECTREGMADE.$event[name];
								 $message = _OWNERNOTIFY."\n".Chr(10);
                	$message .= _NAMEREGISTERED." ".$nameregistered." (".$regemail.")\n".Chr(10);
                	$message .= _REGNOTIFYCOMMENT."\n".$comment."\n".Chr(10);
                	$message .= _EVENTINFOFOLLOWS."\n".Chr(10);
                	$message .= "*******************************************************************************\n".chr(10);
                	$message .= $event_details;
                	$headers .= "To: ".$event[notifyemail]."\r\n";
                  $headers .= "From: ".pnConfigGetVar('adminmail')."\r\n";
                  
                  /* and now mail it */
                  pnMail($to, $subject, $message, $headers);
								 
								 return true;
								 //Done with owner's email
								 
				} elseif ($type == "cancel") {
								 //send e-mails for cancellation
								 $to  = $regemail;
								 $subject = _EMAILSUBJECTREGDELETED.$eventname;
								 	$message = _EMAILUSERREGISTRATIONWASDELETED."\n".Chr(10);
                	$message .= _EMAILUSERREGISTRATIONWASDELETEDNAMES." ".$nameregistered." (".$regemail.")\n".Chr(10);
                	$message .= _EVENTINFOFOLLOWS."\n".Chr(10);
                	$message .= "*******************************************************************************\n".chr(10);
									$message .= $event_details;
                  
                  /* additional headers */
                  $headers .= "To: ".$regemail."\r\n";
                  $headers .= "From: ".$event[notifyemail]."\r\n";
                  
                  /* and now mail it */
                  //switched to using pnMail instead of php's mail() more versitile now
              	pnMail($to, $subject, $message, $headers);	
								 //Send e-mail to the user first
								 
								 //Done with user's email
								 
								 //Send e-mail to event's owner
								 $to  = $event[notifyemail];
								 $subject = _EMAILSUBJECTREGDELETED.$event[name];
								 $message = _EMAILOWNERREGISTRATIONWASDELETED."\n".Chr(10);
                	$message .= _EMAILTHISPERSONCANCELLED." ".$nameregistered." (".$regemail.")\n".Chr(10);
                	$message .= _EVENTINFOFOLLOWS."\n".Chr(10);
                	$message .= "*******************************************************************************\n".chr(10);
									$message .= $event_details;
									$headers .= "To: ".$event[notifyemail]."\r\n";
    							$headers .= "From: ".pnConfigGetVar('adminmail')."\r\n";
									pnMail($to, $subject, $message, $headers);
					return true;
								 //Done with owner's email
				} else {
					//don't know what was intended, fail
									return false;
				}
		 
}
 //End of notification e-mails function

//function to check if registration window is still open
//Added by Brain M 12-21-04
function eventreg_userapi_checkregopen($args){
	
	extract($args);
	//echo "eventid received by userapi_checkregopen=[".$event_id."]<br>";
	if(!$event_id){
	//echo "hey you didn't pass me an eventid!<br>";
		return false;
	}
$items = array(); 
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing
    if (!pnSecAuthAction(0, 'EventReg::', '::', ACCESS_READ)) {
	echo "no auth to view<br>";
        return false;
    } 
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $eventtable = $pntable['eventreg_events'];
    $eventcolumn = &$pntable['eventreg_events_column']; 
    // Get items - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the SelectLimit() command allows for simpler debug
    // operation if it is ever needed
    $sql = "SELECT $eventcolumn[eventid],
                   	$eventcolumn[reg_end]
            FROM $eventtable 
			where $eventcolumn[eventid] = '".pnVarPrepForStore($event_id)."'";
	//echo $sql."<br>";
    $result = $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETEVENTSFAILED);
        return false;
    } 
    // Put items into result array.  Note that each item is checked
    // individually to ensure that the user is allowed access to it before it
    // is added to the results array
            list($eventid, $reg_end) = $result->fields;
		//decide if user can still register
//echo "Reg end date=[".$reg_enddate."]<br>";
		//$reg_end_array = explode("-", $reg_enddate);
		//$end_timestamp = mktime(0,0,0,$reg_end_array[1],$reg_end_array[2],$reg_end_array[0]);
		$end_timestamp = dttm2unixtime($reg_end);
		$today = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
		//echo "Today = ".$today."<br>";
		//echo "ends--- ".$end_timestamp."<br>";
		if ($today > $end_timestamp){
			
			$can_register = false;
		} else {
			$can_register = true;
		}
        


    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
    // Return the items
    return $can_register;

}
//End of function to check if registration windows is still open

function dttm2unixtime($dttm2timestamp_in){
   //    returns unixtime stamp for a given date time string that comes from DB
   $date_time = explode(" ", $dttm2timestamp_in);
   $date = explode("-",$date_time[0]);
   $time = explode(":",$date_time[1]);    
   unset($date_time);
   list($year, $month, $day)=$date;
   list($hour,$minute,$second)=$time;
   return mktime(intval($hour), intval($minute), intval($second), intval($month), intval($day), intval($year));
}

/* Function to check if an event has already reached the maximum number of registrations
arguments:
 	$event_id 
 returns
 	$reg_status = array('event_full' => $event_full, 'seats_left' => $seats_left);
 where event_full = true if event is full and seats_left is the number of available registration slots left (zero if full)
 */

function eventreg_userapi_checkfull($args) {
	
	extract($args);
	//echo "eventid received by userapi_checkregopen=[".$event_id."]<br>";
	if(!$eventid){
	//echo "hey you didn't pass me an eventid!<br>";
		return false;
	}
	
$items = array(); 
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing
    if (!pnSecAuthAction(0, 'EventReg::', '::', ACCESS_READ)) {
	echo "no auth to view<br>";
        return false;
    } 
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $eventtable = $pntable['eventreg_events'];
    $eventcolumn = &$pntable['eventreg_events_column']; 
    // Get items - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the SelectLimit() command allows for simpler debug
    // operation if it is ever needed
    $sql = "SELECT $eventcolumn[eventid], $eventcolumn[max_regs]
            FROM $eventtable 
			where $eventcolumn[eventid] = '".pnVarPrepForStore($eventid)."'";
	//echo $sql."<br>";
    $result = $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETEVENTSFAILED);
        return false;
    } 
    // Put items into result array.  Note that each item is checked
    // individually to ensure that the user is allowed access to it before it
    // is added to the results array
            list($eventid, $max_regs) = $result->fields;
	   
	    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
	
	    //now grab the # of online registrations
	    $current_regs =  pnModAPIFunc('EventReg', 'user', 'countregistrationsforevent', array('eventid' => $eventid));
	    
	    
		//decide if the event is full 
		if ($current_regs < $max_regs){
			$event_full = false;
			$seats_left = $max_regs - $current_regs;
			//echo "seats left =[".$seats_left."]<br>";
		} else {
			$event_full = true;
			$seats_left = 0;
		}
        
	$reg_status = array('event_full' => $event_full, 'seats_left' => $seats_left);

    
    // Return the items
    return $reg_status;

}



/*Funtion to prevent users from registering for an event more than once
input:
$event_id
pnUserGetVar('uid') -not really an input, but it's automatically retrieved & used
Output:
true (user already registered) or false (user hasn't registered already)
*/
function eventreg_userapi_alreadyregistered($args) {
	
// Added by Erik 04-05-2005 to allow multiple registrations via admin ctrl panel
if (pnModGetVar('EventReg', 'AllowMultipleRegs')) {
	return false;
}

	extract($args);
	if(!$event_id){
		return false;
	}
	
$items = array(); 
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing
    if (!pnSecAuthAction(0, 'EventReg::', '::', ACCESS_READ)) {
	echo "no auth to view<br>";
        return false;
    } 
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $registrationstable = $pntable['eventreg_registrations'];
    $registrationscolumn = &$pntable['eventreg_registrations_column']; 
    // Get items - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the SelectLimit() command allows for simpler debug
    // operation if it is ever needed
    $sql = "SELECT $registrationscolumn[registrationid]
            FROM $registrationstable 
			where $registrationscolumn[eventid] = '".pnVarPrepForStore($event_id)."' AND $registrationscolumn[userid] = '".pnUserGetVar('uid')."'";
	//echo $sql."<br>";
    $result = $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETEVENTSFAILED);
        return false;
    } 
   // Check for no rows found, and if so return
    if ($result->EOF) {
        $already_registered = false;
    } else {
		$already_registered = true;
	}

    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
    // Return the items
    return $already_registered;
}

function eventreg_userapi_advancedsearch($args) {
	extract($args);
	$anycategory = true;
	//Convert search dates into useful format (Y-m-d)
	$searchstartdate = $searchstartyear."-".$searchstartmonth."-".$searchstartday;
	$searchenddate = $searchendyear."-".$searchendmonth."-".$searchendday;
	
	//$eventkeyword = search_split_query($eventkeywords);
	if($eventkeywords <> "") {
		$eventkeyword = pnModAPIFunc('EventReg', 'user', 'searchsplitquery', array('q' => $eventkeywords));
	}
	
	//$locationkeyword = search_split_query($locationkeywords);
	if($locationkeywords <> ""){
	$locationkeyword = pnModAPIFunc('EventReg', 'user', 'searchsplitquery', array('q' => $locationkeywords));
	}
// Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn() we
    // currently just want the first item, which is the official database
    // handle.  For pnDBGetTables() we want to keep the entire tables array
    // together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables(); 
    // It's good practice to name the table and column definitions you are
    // getting - $table and $column don't cut it in more complex modules
    $eventtable = $pntable['eventreg_events'];
    $eventcolumn = &$pntable['eventreg_events_column']; 
	$cattable = $pntable['eventreg_categories'];
    $catcolumn = &$pntable['eventreg_categories_column']; 
    // Get items - the formatting here is not mandatory, but it does make the
    // SQL statement relatively easy to read.  Also, separating out the sql
    // statement from the SelectLimit() command allows for simpler debug
    // operation if it is ever needed
	$query = "SELECT  
				$eventcolumn[eventid], 
				$eventcolumn[name],  
				$eventcolumn[category], 
				$eventcolumn[event_start], 
				$eventcolumn[description], 
				$eventcolumn[summary] 
			  FROM $eventtable  
			  JOIN $cattable  on  $eventcolumn[category] = $catcolumn[categoryid] 
			  WHERE ";
	If(!$searchallcategories){
		$query = $query ."$eventcolumn[category] = $category AND ";
	}
	$query = $query . "(";
			  $query = $query . "($eventcolumn[event_start] BETWEEN '" . $searchstartdate . "' and '" . $searchenddate."') "; //Added this where clause 4/4/2004 to not display events that are in the past to the users.
	$query = $query . "OR (".$eventcolumn[event_end] ." BETWEEN '" . $searchstartdate . "' AND '" . $searchenddate . "') OR ($eventcolumn[event_end] >='".$searchenddate."' AND $eventcolumn[event_start] <='".$searchstartdate."')) AND (";
	//echo $query."<br><Br>";
	
    foreach($eventkeyword as $word) {
		//echo "<br>".$word."<br><br>";
        if($flag) {
            switch($bool) {
                case 'AND' :
                    $query .= ' AND ';
                    break;
                case 'OR' :
                default :
                    $query .= ' OR ';
                    break;
            }
        }
         $query .= '(';
        // events
        $query .= "$eventcolumn[name] LIKE '$word' OR ";
        $query .= "$eventcolumn[description] LIKE '$word')";
        $flag = true;
		//echo "keyword query = ".$query."<br>";
    }
    foreach($locationkeyword as $word) {
        if($flag) {
            switch($bool) {
                case 'AND' :
                    $query .= ' AND ';
                    break;
                case 'OR' :
                default :
                    $query .= ' OR ';
                    break;
            }
        }
         $query .= '(';
        // events
        $query .= "$eventcolumn[location] LIKE '$word')";
        //$query .= $eventcolumn . ".pn_description LIKE '$word')";
        $flag = true;
    }
    $query .= ") ORDER BY $eventcolumn[event_start] asc ";
//echo $query;
	
	$result = $dbconn->Execute($query); 

    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETEVENTSFAILED);
        return false;
    }     // Put items into result array.  Note that each item is checked
    // individually to ensure that the user is allowed access to it before it
    // is added to the results array
            //list($eventid, $event_name, $event_category, $event_start, $event_description) = $result->fields;
		if (!$result->EOF) {	
			while (list($eventid, $event_name, $event_category, $event_start, $event_description, $event_summary) = $result->fields) {
                    $matching_events[] = array('eventid' => $eventid,
                    'name' => $event_name,
                    'event_category' => $event_category,
                    'event_start' => dttm2unixtime($event_start),
                    'event_description' => $event_description,
					'summary' => $event_summary
                );
				
            $result->MoveNext();
        } 
	   }
	    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
	
	return $matching_events;
	
}

/*
 * splits the query string into words suitable for a mysql query
 */
function eventreg_userapi_searchsplitquery($args) {
	extract($args);
	//echo "q = ".$q."<br>";
    if (!isset($q)) {
        return;
    }
    $w = array();
    $stripped = pnVarPrepForStore($q);
    $qwords = explode(' ', $stripped);
    foreach($qwords as $word) {
        $w[] = '%' . $word . '%';
    }
	 /* foreach($w as $part) {
		echo "part = ".$part."<br>";
	}  */
    return $w;
}
?>

