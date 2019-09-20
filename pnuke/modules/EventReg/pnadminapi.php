<?php 
// $Id: pnadminapi.php,v 1.17 2005/02/04 20:24:18 the_lorax Exp $
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
// Purpose of file:  Template administration API
// ----------------------------------------------------------------------
/*
Functions in this module

createcategory($name, $description)  
    returns categoryid or false
deletecategory($categoryid)
    returns true or false
updatecategory($categoryid, $name, $description)
	returns true or false
newevent($name, $orgname, $category, $startdate, $enddate
	     $reg_startdate, $reg_enddate, $location, $summary, $header
		 $description, $max_regs, $fee, $phone, $eventlogo, $eventicon
		 $commentfieldlabel, $dateadded, $addeby)
	returns eventid or false
deleteevent($eventid)
	returns true or false
updateevent($eventid, $name, $orgname, $category, $startdate, $enddate
	        $reg_startdate, $reg_enddate, $location, $summary, $header
		    $description, $max_regs, $fee, $phone, $eventlogo, $eventicon
		    $commentfieldlabel, $dateadded)
	returns true or false

	
	
	
	
*/

 

function eventreg_adminapi_createcategory($args)
{
    extract($args);

    if ((!isset($name)) ||
            (!isset($description))) {
        pnSessionSetVar('errormsg', _EVENTREGNEWCATEGORYADMINREQARGS);
        return false;
    } 
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing
    if (!pnSecAuthAction(0, 'EventReg::category', "::", ACCESS_ADD)) {
        pnSessionSetVar('errormsg', _EVENTREGNOADDCATAUTH);
        return false;
    } 
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
    $categoriestable = $pntable['eventreg_categories'];
    $categoriescolumn = &$pntable['eventreg_categories_column']; 
    // Get next ID in table - this is required prior to any insert that
    // uses a unique ID, and ensures that the ID generation is carried
    // out in a database-portable fashion
    $nextId = $dbconn->GenId($categoriestable); 
    // Add item - the formatting here is not mandatory, but it does make
    // the SQL statement relatively easy to read.  Also, separating out
    // the sql statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
    $sql = "INSERT INTO $categoriestable (
              $categoriescolumn[categoryid],
              $categoriescolumn[name],
              $categoriescolumn[description],
	       	  $categoriescolumn[pc_categoryid])
            VALUES (
              $nextId,
              '" . pnVarPrepForStore($name) . "',
              '" . pnvarPrepForStore($description) . "',
	          '".pnvarPrepForStore($pc_categoryid)."')";
    $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATECATFAILED . "<BR>" . $sql . "<BR>" . $name . "<BR>" . $description);
        return false;
    } 
    // Get the ID of the item that we inserted.  It is possible, although
    // very unlikely, that this is different from $nextId as obtained
    // above, but it is better to be safe than sorry in this situation
    $categoryid = $dbconn->PO_Insert_ID($categoriestable, $categoriescolumn['categoryid']); 
    // Let any hooks know that we have created a new item.  As this is a
    // create hook we're passing 'tid' as the extra info, which is the
    // argument that all of the other functions use to reference this
    // item
    pnModCallHooks('item', 'create', $catid, 'id'); 
    // Return the id of the newly created item to the calling process
    return $categoryid;
} 

function eventreg_adminapi_deletecategory($args)
{ 
    // Get arguments from argument array - all arguments to this function
    // should be obtained from the $args array, getting them from other
    // places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    extract($args); 
    // Argument check - make sure that all required arguments are present,
    // if not then set an appropriate error message and return
    if (!isset($categoryid)) {
        pnSessionSetVar('errormsg', _EVENTREGMISSINGCATID);
        return false;
    } 
    // Load API.  Note that this is loading the user API in addition to
    // the administration API, that is because the user API contains
    // the function to obtain item information which is the first thing
    // that we need to do.  If the API fails to load an appropriate error
    // message is posted and the function returns
    if (!pnModAPILoad('EventReg', 'user')) {
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    } 
    // The user API function is called.  This takes the item ID which
    // we obtained from the input and gets us the information on the
    // appropriate item.  If the item does not exist we post an appropriate
    // message and return
    $category = pnModAPIFunc('EventReg',
        'user',
        'getcategory',
        array('categoryid' => $categoryid));

    if ($category == false) {
        $output->Text(_EVENTREGNOSUCHITEM);
        return $output->GetOutput();
    } 
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing.
    // However, in this case we had to wait until we could obtain the item
    // name to complete the instance information so this is the first
    // chance we get to do the check
    if (!pnSecAuthAction(0, 'EventReg::category', "$category[name]::$categoryid", ACCESS_DELETE)) {
        pnSessionSetVar('errormsg', _EVENTREGNOAUTH);
        return false;
    } 
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
    $categoriestable = $pntable['eventreg_categories'];
    $categoriescolumn = &$pntable['eventreg_categories_column'];
    $eventtable = $pntable['eventreg_events'];
    $eventcolumn = $pntable['eventreg_events_column'];
    $registrationstable = $pntable['eventreg_registrations'];
    $registrationscolumn = $pntable['eventreg_registrations_column']; 
    // Delete the item - the formatting here is not mandatory, but it does
    // make the SQL statement relatively easy to read.  Also, separating
    // out the sql statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
    $sql = "DELETE FROM $categoriestable
            WHERE $categoriescolumn[categoryid] = '" . pnVarPrepForStore($categoryid) . "'";
    $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _EVENTREFDELETECATEGORYFAILED);
        return false;
    } 

    $sql = "DELETE FROM $eventtable
            WHERE $eventcolumn[category] = '" . pnVarPrepForStore($categoryid) . "'";
    $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _EVENTREFDELETEEVENTFAILED);
        return false;
    } 

    $sql = "DELETE FROM $registrationstable
            WHERE $registrationscolumn[category] = '" . pnVarPrepForStore($categoryid) . "'";
    $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _EVENTREFDELETEREGFAILED);
        return false;
    } 
    // Let any hooks know that we have deleted an item.  As this is a
    // delete hook we're not passing any extra info
    pnModCallHooks('item', 'delete', $categoryid, ''); 
    // Let the calling process know that we have finished successfully
    return true;
} 

function eventreg_adminapi_updatecategory($args)
{ 
    // Get arguments from argument array - all arguments to this function
    // should be obtained from the $args array, getting them from other
    // places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    extract($args);
    $output = new pnHTML(); 
    // Argument check - make sure that all required arguments are present,
    // if not then set an appropriate error message and return
    if ((!isset($categoryid)) ||
            (!isset($name)) ||
            (!isset($description))) {
        pnSessionSetVar('errormsg', "$categoryid $name $description  a $args[categorid] $categoryid a" . _MODtestttRGSERROR);
        return false;
    } 
    // Load API.  Note that this is loading the user API in addition to
    // the administration API, that is because the user API contains
    // the function to obtain item information which is the first thing
    // that we need to do.  If the API fails to load an appropriate error
    // message is posted and the function returns
    if (!pnModAPILoad('EventReg', 'user')) {
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    } 
    // The user API function is called.  This takes the item ID which
    // we obtained from the input and gets us the information on the
    // appropriate item.  If the item does not exist we post an appropriate
    // message and return
    // $category = pnModAPIFunc('EventReg', 'user','getcategory', array('categoryid' => $categoryid));
    
    // if ($category == false) {
    // $output->Text(_EVENTREGNOSUCHITEM);
    // return $output->GetOutput(); 
    // }
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing.
    // However, in this case we had to wait until we could obtain the item
    // name to complete the instance information so this is the first
    // chance we get to do the check
    // Note that at this stage we have two sets of item information, the
    // pre-modification and the post-modification.  We need to check against
    // both of these to ensure that whoever is doing the modification has
    // suitable permissions to edit the item otherwise people can potentially
    // edit areas to which they do not have suitable access
    if (!pnSecAuthAction(0, 'EventReg::category', "$item[name]::$categoryid", ACCESS_EDIT)) {
        pnSessionSetVar('errormsg', _TEMPLATENOAUTH);
        return false;
    } 
    if (!pnSecAuthAction(0, 'EventReg::category', "$name::$categoryid", ACCESS_EDIT)) {
        pnSessionSetVar('errormsg', _TEMPLATENOAUTH);
        return false;
    } 
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
    $categoriestable = $pntable['eventreg_categories'];
    $categoriescolumn = &$pntable['eventreg_categories_column']; 
    // Update the item - the formatting here is not mandatory, but it does
    // make the SQL statement relatively easy to read.  Also, separating
    // out the sql statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
    $sql = "UPDATE $categoriestable
            SET $categoriescolumn[name] = '" . pnVarPrepForStore($name) . "',
                $categoriescolumn[description] = '" . pnVarPrepForStore($description) . "',
				$categoriescolumn[pc_categoryid] ='" . pnVarPrepForStore($pc_categoryid) ."'
            	WHERE $categoriescolumn[categoryid] = '" . pnVarPrepForStore($categoryid) . "'";
	    //echo $sql;
    $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    // pnSessionSetVar('errormsg', $sql . $categoryid);
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _UPDATEFAILED);
        return false;
    } 
    // Let the calling process know that we have finished successfully
    return true;
} 

function eventreg_adminapi_getallcategories()
{
    $categories = array();

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $categoriestable = $pntable['eventreg_categories'];
    $categoriescolumn = &$pntable['eventreg_categories_column'];

    $result = $dbconn->Execute("SELECT $categoriescolumn[categoryid], $categoriescolumn[name]
                              FROM $categoriestable
                              ORDER BY $categoriescolumn[name]");

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETALLCATEGORIESFAILED);
        return false;
    } 

    if (!$result->EOF) {
        while (list($id, $name) = $result->fields) {
            $categories[] = array('id' => $id,
                'name' => $name);
            $result->MoveNext();
        } 
    } 
    return $categories;
} 


function eventreg_adminapi_getallregistrations()
{
    $categories = array();

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $categoriestable = $pntable['eventreg_categories'];
    $categoriescolumn = &$pntable['eventreg_categories_column'];

    $result = $dbconn->Execute("SELECT $categoriescolumn[categoryid], $categoriescolumn[name]
                              FROM $categoriestable
                              ORDER BY $categoriescolumn[name]");

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETALLCATEGORIESFAILED);
        return false;
    } 

    if (!$result->EOF) {
        while (list($id, $name) = $result->fields) {
            $categories[] = array('id' => $id,
                'name' => $name);
            $result->MoveNext();
        } 
    } 
    return $categories;
} 

function eventreg_adminapi_createevent($args)
{ 
    // Get arguments from argument array - all arguments to this function
    // should be obtained from the $args array, getting them from other
    // places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    extract($args); 
    // Argument check - make sure that all required arguments are present,
    // if not then set an appropriate error message and return
	/*if (!isset($commentlabel))     {$missingargs = $missingargs . '_MSNGCOMMENTLABEL\n';}

	if (isset($missingargs)){
        pnSessionSetVar('errormsg', _EVENTREGNEWCATEGORYADMINREQARGS);
        return false;
	}
	*/
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing
     if (!pnSecAuthAction(0, 'EventReg::event', "::", ACCESS_ADD)) {
     pnSessionSetVar('errormsg', _EVENTREGNOAUTH);
     return false;
     }

    $reg_startdate = $regstartyear . '-' . $regstartmonth . '-' . $regstartday ;
    $reg_starttime = $regstarttimeh . ':' . $regstarttimem . ':00';
    $reg_enddate = $regendyear . '-' . $regendmonth . '-' . $regendday;
    $reg_endtime = $regendtimeh . ':' . $regendtimem . ':00';
    $startdate = $eventstartyear . '-' . $eventstartmonth . '-' . $eventstartday;
    $starttime = $eventstarttimeh . ':' . $eventstarttimem . ':00';
    $enddate = $eventendyear . '-' . $eventendmonth . '-' . $eventendday;
    $endtime = $eventendtimeh . ':' . $eventendtimem . ':00';
	//new storage format - Brian M 2/3/05
	$reg_start = $reg_startdate." ".$reg_starttime;
	$reg_end = $reg_enddate." ".$reg_endtime;
	$event_start = $startdate." ".$starttime;
	$event_end = $enddate." ".$endtime;
	
    $eventlogo = '';
    $eventicon = ''; 
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
    $eventtable = $pntable['eventreg_events'];
    $eventcolumn = &$pntable['eventreg_events_column']; 
    // Get next ID in table - this is required prior to any insert that
    // uses a unique ID, and ensures that the ID generation is carried
    // out in a database-portable fashion
    $nextId = $dbconn->GenId($eventtable); 
    // Add item - the formatting here is not mandatory, but it does make
    // the SQL statement relatively easy to read.  Also, separating out
    // the sql statement from the Execute() command allows for simpler
    // debug operation if it is ever needed


    $sql = "INSERT INTO $eventtable (
		      $eventcolumn[eventid],
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
			  )
            VALUES (
              $nextId,
         	  '" . pnvarPrepForStore($eventname) . "',
         	  '" . pnvarPrepForStore($orgname) . "',
         	  '" . pnvarPrepForStore($category) . "',
		      '" . pnvarPrepForStore($event_start) . "',
	          '" . pnvarPrepForStore($event_end) . "',
	          '" . pnvarPrepForStore($reg_start) . "',
	          '" . pnvarPrepForStore($reg_end) . "',
	          '" . pnvarPrepForStore($location) . "',
	          '" . pnvarPrepForStore($country) . "',
	          '" . pnvarPrepForStore($header) . "',
	          '" . pnvarPrepForStore($summary) . "',
	          '" . pnvarPrepForStore($description) . "',
			  '" . pnvarPrepForStore($registrations) . "',
			  '" . pnvarPrepForStore($maxregistrations) . "',
			  '" . pnvarPrepForStore($fee) . "',
	          '" . pnvarPrepForStore($phone) . "',
	          '" . pnvarPrepForStore($eventlogo) . "',
	          '" . pnvarPrepForStore($eventicon) . "',
	          '" . pnvarPrepForStore($commentlabel) . "',
	          NOW(),
			  '" . pnvarPrepForStore(pnUserGetVar('uid')) . "',
		  	  '" . pnvarPrepForStore($notifyemail) . "')";
    $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATEFAILED . $sql);
        return false;
    } 
    // Get the ID of the item that we inserted.  It is possible, although
    // very unlikely, that this is different from $nextId as obtained
    // above, but it is better to be safe than sorry in this situation
    $eventid = $dbconn->PO_Insert_ID($eventtable, $eventcolumn['eventid']); 
    // Let any hooks know that we have created a new item.  As this is a
    // create hook we're passing 'tid' as the extra info, which is the
    // argument that all of the other functions use to reference this
    // item
    pnModCallHooks('item', 'create', $eventid, 'eventid'); 
    // Return the id of the newly created item to the calling process
    return $eventid;
} 

/**
 * delete a template item
 * 
 * @param  $args ['tid'] ID of the item
 * @returns bool
 * @return true on success, false on failure
 */
function eventreg_adminapi_deleteevent($args)
{ 
    // Get arguments from argument array - all arguments to this function
    // should be obtained from the $args array, getting them from other
    // places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    extract($args); 
    // Argument check - make sure that all required arguments are present,
    // if not then set an appropriate error message and return
    if (!isset($eventid)) {
        pnSessionSetVar('errormsg', _MISSINGEVENTID);
        return false;
    } 
    // Load API.  Note that this is loading the user API in addition to
    // the administration API, that is because the user API contains
    // the function to obtain item information which is the first thing
    // that we need to do.  If the API fails to load an appropriate error
    // message is posted and the function returns
    if (!pnModAPILoad('EventReg', 'user')) {
        $output->Text(_LOADAPIFAILED);
        return $output->GetOutput();
    } 
    // The user API function is called.  This takes the item ID which
    // we obtained from the input and gets us the information on the
    // appropriate item.  If the item does not exist we post an appropriate
    // message and return
    $event = pnModAPIFunc('EventReg', 'user', 'getevent', array('eventid' => $eventid));
    extract ($event);

    if ($event == false) {
        $output->Text(_NOSUCHEVENT);
        return $output->GetOutput();
    } 
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing.
    // However, in this case we had to wait until we could obtain the item
    // name to complete the instance information so this is the first
    // chance we get to do the check
    if (!pnSecAuthAction(0, 'EventReg::event', "$event[name]:$event[category]:$eventid", ACCESS_DELETE)) {
        pnSessionSetVar('errormsg', _EVENTREGNOAUTH);
        return false;
    } 
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
    $eventtable = $pntable['eventreg_events'];
    $eventcolumn = &$pntable['eventreg_events_column'];
    $registrationstable = $pntable['eventreg_registrations'];
    $registrationscolumn = &$pntable['eventreg_registrations_column']; 
    // Delete the item - the formatting here is not mandatory, but it does
    // make the SQL statement relatively easy to read.  Also, separating
    // out the sql statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
    $sql = "DELETE FROM $registrationstable
            WHERE $registrationscolumn[eventid] = '" . pnVarPrepForStore($eventid) . "'";
    $dbconn->Execute($sql);

    $sql = "DELETE FROM $eventtable
            WHERE $eventcolumn[eventid] = '" . pnVarPrepForStore($eventid) . "'";
    $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _DELETEFAILED);
        return false;
    } 
    // Let any hooks know that we have deleted an item.  As this is a
    // delete hook we're not passing any extra info
    pnModCallHooks('item', 'delete', $eventid, ''); 
    // Let the calling process know that we have finished successfully
    return true;
} 

/**
 * update a template item
 * 
 * @param  $args ['tid'] the ID of the item
 * @param  $args ['name'] the new name of the item
 * @param  $args ['number'] the new number of the item
 */
function eventreg_adminapi_updateevent($args)
{ 
    // Get arguments from argument array - all arguments to this function
    // should be obtained from the $args array, getting them from other
    // places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke

    if (!pnSecAuthAction(0, 'EventReg::event', "$event[name]:$event[category]:$eventid", ACCESS_DELETE)) {
        pnSessionSetVar('errormsg', _EVENTREGNOAUTH);
        return false;
    } 
    extract($args);
   

    $reg_startdate = $regstartyear . '-' . $regstartmonth . '-' . $regstartday ;
    $reg_starttime = $regstarttimeh . ':' . $regstarttimem . ':00';
    $reg_enddate = $regendyear . '-' . $regendmonth . '-' . $regendday;
    $reg_endtime = $regendtimeh . ':' . $regendtimem . ':00';
    $startdate = $eventstartyear . '-' . $eventstartmonth . '-' . $eventstartday;
    $starttime = $eventstarttimeh . ':' . $eventstarttimem . ':00';
    $enddate = $eventendyear . '-' . $eventendmonth . '-' . $eventendday;
    $endtime = $eventendtimeh . ':' . $eventendtimem . ':00'; 
	//new storage format - Brian M 2/3/05
	$reg_start = $reg_startdate." ".$reg_starttime;
	$reg_end = $reg_enddate." ".$reg_endtime;
	$event_start = $startdate." ".$starttime;
	$event_end = $enddate." ".$endtime;
	
	
    // Argument check - make sure that all required arguments are present,
    // if not then set an appropriate error message and return
    /*    if ( (!isset($eventid)) || (!isset($name)) || (!isset($orgname)) || 
	     (!isset($category)) || (!isset($startdate)) || (!isset($enddate)) || 
		 (!isset($reg_startdate)) || (!isset($reg_enddate)) || (!isset($location)) ||
		 (!isset($summary)) || (!isset($header)) || (!isset($description)) || 
		 (!isset($registrations)) || (!isset($max_regs)) || (!isset($fee)) ||
		 (!isset($phone)) || (!isset($eventlogo)) || (!isset($eventicon)) || 
		 (!isset($commentfieldlabel)) || (!isset($dateadded)) || (!isset($addeby))) {
        pnSessionSetVar('errormsg', _MODARGSERROR);
        return false;
    }
*/
    // Load API.  Note that this is loading the user API in addition to
    // the administration API, that is because the user API contains
    // the function to obtain item information which is the first thing
    // that we need to do.  If the API fails to load an appropriate error
    // message is posted and the function returns
    if (!pnModAPILoad('EventReg', 'user')) {
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    } 
    // The user API function is called.  This takes the item ID which
    // we obtained from the input and gets us the information on the
    // appropriate item.  If the item does not exist we post an appropriate
    // message and return
    $event = pnModAPIFunc('EventReg',
        'user',
        'getevent',
        array('eventid' => $eventid));

    if ($event == false) {
        $output->Text(_NOSUCHEVENT);
        return $output->GetOutput();
    } 
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing.
    // However, in this case we had to wait until we could obtain the item
    // name to complete the instance information so this is the first
    // chance we get to do the check
    // Note that at this stage we have two sets of item information, the
    // pre-modification and the post-modification.  We need to check against
    // both of these to ensure that whoever is doing the modification has
    // suitable permissions to edit the item otherwise people can potentially
    // edit areas to which they do not have suitable access
    if (!pnSecAuthAction(0, 'EventReg::event', ":$category:$eventid", ACCESS_EDIT)) {
        pnSessionSetVar('errormsg', _EVENTREGNOAUTH);
        return false;
    } 
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
    $eventtable = $pntable['eventreg_events'];
    $eventcolumn = &$pntable['eventreg_events_column']; 
    // Update the item - the formatting here is not mandatory, but it does
    // make the SQL statement relatively easy to read.  Also, separating
    // out the sql statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
    $sql = "UPDATE $eventtable 
            SET $eventcolumn[name] = '" . pnvarPrepForStore($eventname) . "',
                $eventcolumn[orgname] = '" . pnvarPrepForStore($orgname) . "',
                $eventcolumn[category] = " . pnvarPrepForStore($category) . ",
				$eventcolumn[event_start] = '" . pnvarPrepForStore($event_start) . "',
                $eventcolumn[event_end] = '" . pnvarPrepForStore($event_end) . "',
                $eventcolumn[reg_start] = '" . pnvarPrepForStore($reg_start) . "',
                $eventcolumn[reg_end] = '" . pnvarPrepForStore($reg_end) . "',
                $eventcolumn[location] = '" . pnvarPrepForStore($location) . "',
                $eventcolumn[country] = '" . pnvarPrepForStore($country) . "',
                $eventcolumn[summary] = '" . pnvarPrepForStore($summary) . "',
                $eventcolumn[header] = '" . pnvarPrepForStore($header) . "',
                $eventcolumn[description] = '" . pnvarPrepForStore($description) . "',
	        $eventcolumn[registrations] = '" . pnvarPrepForStore($registrations) . "',
                $eventcolumn[max_regs] = '" . pnvarPrepForStore($maxregistrations) . "',
                $eventcolumn[fee] = " . pnvarPrepForStore($fee) . ",
                $eventcolumn[phone] = '" . pnvarPrepForStore($phone) . "',
                $eventcolumn[eventlogo] = '" . pnvarPrepForStore($eventlogo) . "',
                $eventcolumn[eventicon] = '" . pnvarPrepForStore($eventicon) . "',
                $eventcolumn[commentfieldlabel] = '" . pnvarPrepForStore($commentfieldlabel) . "',
				$eventcolumn[notifyemail] = '" . pnvarPrepForStore($notifyemail) . "'
                WHERE $eventcolumn[eventid] = '" . pnVarPrepForStore($eventid) . "'";
		
    $dbconn->Execute($sql); 
    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _UPDATEEVENTFAILED . $sql);
        return false;
    } 
    // Let the calling process know that we have finished successfully

    return true;
} 

/*
		 eventid
         name
         orgname
         category
         startdate
         enddate
         reg_startdate
         reg_enddate
         location
         summary
         header
         description
		 registrations
		 max_regs
		 fee
         phone
         eventlogo
         eventicon
         commentfieldlabel
         dateadded
		 addeby

*/

/**
 * create a new template item
 * 
 * @param  $args ['name'] name of the item
 * @param  $args ['number'] number of the item
 * @returns int
 * @return template item ID on success, false on failure
 */

function eventreg_adminapi_getallevents($args)
{ 
    
    extract($args); 
    // Optional arguments.
    if (!isset($page)) {
        $page = 1;
    } 
    if (!isset($numitems)) {
        $numitems = -1;
    } 

    if ((!isset($page)) ||
            (!isset($numitems))) {
        pnSessionSetVar('errormsg', _MODARGSERROR);
        return false;
    } 

    $items = array(); 
    // Security check - important to do this as early on as possible to
    // avoid potential security holes or just too much wasted processing
    if (!pnSecAuthAction(0, 'EventReg::', '::', ACCESS_ADMIN)) {
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
    // operation if it is ever needed
    $sql = "SELECT $eventcolumn[eventid],
                   $eventcolumn[name],
		   $eventcolumn[category],
		   $eventcolumn[description],
		   $eventcolumn[event_start],
		   $eventcolumn[summary]
            FROM $eventtable ";
    if (isset($categoryid)) {
        $sql = $sql . " AND $eventcolumn[category] = " . pnVarPrepForStore($categoryid) . " ";
    } 
    $sql = $sql . "ORDER BY $eventcolumn[event_start]";
    //$result = $dbconn->SelectLimit($sql, 9999,0);//$numitems, $page-1);
	//Changed to get the pager working correctly - Brian M 1-31-05
		//echo "numitems=[".$numitems."] page=[".$page."] startnum=[".$startnum."]<br>";

		$result = $dbconn->SelectLimit($sql, $numitems, $startnum-1);//$numitems, $page-1); 
    // Check for an error with the database code, and if so set an appropriate
    // error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETEVENTSFAILED);
        return false;
    } 
    // Put items into result array.  Note that each item is checked
    // individually to ensure that the user is allowed access to it before it
    // is added to the results array
    for (; !$result->EOF; $result->MoveNext()) {
        list($eventid, $name, $categoryid, $description, $event_start, $summary) = $result->fields;
        if (pnSecAuthAction(0, 'EventReg::event', ":$categoryid:$eventid", ACCESS_READ)) {
            $items[] = array('eventid' => $eventid,
                'name' => $name,
                'categoryid' => $categoryid,
                'description' => $description,
                'event_start' => dttm2unixtime($event_start),
                'summary' => $summary);
        } 
    } 
    // All successful database queries produce a result set, and that result
    // set should be closed when it has been finished with
    $result->Close(); 
    // Return the items
    return $items;
} 

function datetimeselectarray($day, $month, $year, $hour, $minute, $miltime, $verbalmonth)
{

    $functoutput = array();
    $today = getdate();
    $tyear = $today['year'];

    if ($year) {
        $yeartot = 0;
        while ($yeartot <= 5) {
            $dummy = $hour;
            if ($hour < 10) {
                $hour = "$cero$hour";
            } 
            $tmpyear = ($tyear + $yeartot);
            $functoutput[] = array('value' => pnVarPrepForStore($tmpyear), 'desc' => pnVarPrepForStore($tmpyear));
            $yeartot++;
        } 
    } 

    if ($month) {
        if (!$verbalmonth) {
            $functoutput[] = array('value' => '01', 'desc' => _MNTHJAN);
            $functoutput[] = array('value' => '02', 'desc' => _MNTHFEB);
            $functoutput[] = array('value' => '03', 'desc' => _MNTHMAR);
            $functoutput[] = array('value' => '04', 'desc' => _MNTHAPR);
            $functoutput[] = array('value' => '05', 'desc' => _MNTHMAY);
            $functoutput[] = array('value' => '06', 'desc' => _MNTHJUN);
            $functoutput[] = array('value' => '07', 'desc' => _MNTHJUL);
            $functoutput[] = array('value' => '08', 'desc' => _MNTHAUG);
            $functoutput[] = array('value' => '09', 'desc' => _MNTHSEP);
            $functoutput[] = array('value' => '10', 'desc' => _MNTHOCT);
            $functoutput[] = array('value' => '11', 'desc' => _MNTHNOV);
            $functoutput[] = array('value' => '12', 'desc' => _MNTHDEC);
        } else {
            $functoutput[] = array('value' => '01', 'desc' => '01');
            $functoutput[] = array('value' => '02', 'desc' => '02');
            $functoutput[] = array('value' => '03', 'desc' => '03');
            $functoutput[] = array('value' => '04', 'desc' => '04');
            $functoutput[] = array('value' => '05', 'desc' => '05');
            $functoutput[] = array('value' => '06', 'desc' => '06');
            $functoutput[] = array('value' => '07', 'desc' => '07');
            $functoutput[] = array('value' => '08', 'desc' => '08');
            $functoutput[] = array('value' => '09', 'desc' => '09');
            $functoutput[] = array('value' => '10', 'desc' => '00');
            $functoutput[] = array('value' => '11', 'desc' => '11');
            $functoutput[] = array('value' => '12', 'desc' => '12');
        } 
    } 
    if ($hour) {
        if (!$miltime) {
            $functoutput[] = array('value' => '00', 'desc' => '12 am');
            $functoutput[] = array('value' => '01', 'desc' => ' 1 am');
            $functoutput[] = array('value' => '02', 'desc' => ' 2 am');
            $functoutput[] = array('value' => '03', 'desc' => ' 3 am');
            $functoutput[] = array('value' => '04', 'desc' => ' 4 am');
            $functoutput[] = array('value' => '05', 'desc' => ' 5 am');
            $functoutput[] = array('value' => '06', 'desc' => ' 6 am');
            $functoutput[] = array('value' => '07', 'desc' => ' 7 am');
            $functoutput[] = array('value' => '08', 'desc' => ' 8 am');
            $functoutput[] = array('value' => '09', 'desc' => ' 9 am');
            $functoutput[] = array('value' => '10', 'desc' => '10 am');
            $functoutput[] = array('value' => '11', 'desc' => '11 am');
            $functoutput[] = array('value' => '12', 'desc' => '12 pm');
            $functoutput[] = array('value' => '13', 'desc' => '01 pm');
            $functoutput[] = array('value' => '14', 'desc' => '02 pm');
            $functoutput[] = array('value' => '15', 'desc' => '03 pm');
            $functoutput[] = array('value' => '16', 'desc' => '04 pm');
            $functoutput[] = array('value' => '17', 'desc' => '05 pm');
            $functoutput[] = array('value' => '18', 'desc' => '06 pm');
            $functoutput[] = array('value' => '19', 'desc' => '07 pm');
            $functoutput[] = array('value' => '20', 'desc' => '08 pm');
            $functoutput[] = array('value' => '21', 'desc' => '09 pm');
            $functoutput[] = array('value' => '22', 'desc' => '10 pm');
            $functoutput[] = array('value' => '23', 'desc' => '11 pm');
        } else {
            $functoutput[] = array('value' => '00', 'desc' => '00');
            $functoutput[] = array('value' => '01', 'desc' => '01');
            $functoutput[] = array('value' => '02', 'desc' => '02');
            $functoutput[] = array('value' => '03', 'desc' => '03');
            $functoutput[] = array('value' => '04', 'desc' => '04');
            $functoutput[] = array('value' => '05', 'desc' => '05');
            $functoutput[] = array('value' => '06', 'desc' => '06');
            $functoutput[] = array('value' => '07', 'desc' => '07');
            $functoutput[] = array('value' => '08', 'desc' => '08');
            $functoutput[] = array('value' => '09', 'desc' => '09');
            $functoutput[] = array('value' => '10', 'desc' => '10');
            $functoutput[] = array('value' => '11', 'desc' => '11');
            $functoutput[] = array('value' => '12', 'desc' => '12');
            $functoutput[] = array('value' => '13', 'desc' => '13');
            $functoutput[] = array('value' => '14', 'desc' => '14');
            $functoutput[] = array('value' => '15', 'desc' => '15');
            $functoutput[] = array('value' => '16', 'desc' => '16');
            $functoutput[] = array('value' => '17', 'desc' => '17');
            $functoutput[] = array('value' => '18', 'desc' => '18');
            $functoutput[] = array('value' => '19', 'desc' => '19');
            $functoutput[] = array('value' => '20', 'desc' => '20');
            $functoutput[] = array('value' => '21', 'desc' => '21');
            $functoutput[] = array('value' => '22', 'desc' => '22');
            $functoutput[] = array('value' => '23', 'desc' => '23');
        } 
    } 
} 

if ($minute) {
    $min = 0;
    while ($min <= 59) {
        if (($min == 0) OR ($min == 5)) {
            $min = "0$min";
        } 
        $functoutput[] = array('value' => pnVarPrepForDisplay($min));
        $min = $min + 5;
    } 

    return $functoutput;
} 

function eventreg_adminapi_preppostcalendarevent($args) {
extract($args);
//echo $eventid;
// Load API.  All of the actual work for obtaining information on the items
    // is done within the API, so we need to load that in before we can do
    // anything.  If the API fails to load an appropriate error message is
    // posted and the function returns
    if (!pnModAPILoad('EventReg', 'user')) {
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    } 
    // The API function is called.  The arguments to the function are passed in
    // as their own arguments array
    $event = pnModAPIFunc('EventReg',
        'user',
        'getevent',
        array('eventid' =>$eventid));
				
		//Now translate the info about our event into a format that PostCalendar will understand.
		/* (this is what getevent returns for reference)
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
	'notifyemail' => $notifyemail);  */
		
		//break down the event dates to a format that we can use need seperate day, month, and year hour, min, secs
			/*Outdated - we're getting a timestamp now and need to assign the variables from that instead
		list($event_startmonth, $event_startday, $event_startyear) = explode('/', $event[startdate]);
    list($event_starttimeh, $event_starttimem, $event_starttimes) = explode(':', $event[starttime]);
		list($event_endmonth, $event_endday, $event_endyear) = explode('/', $event[enddate]);
    list($event_endtimeh, $event_endtimem, $event_endtimes) = explode(':', $event[endtime]);	
	*/
	//Convert from timestamp into appropriate parts.
	$event_startmonth = date("m", $event[event_start]);
	$event_startday = date("d", $event[event_start]);
	$event_startyear = date("Y", $event[event_start]);
	$event_starttimeh = date("H", $event[event_start]);
	$event_starttimem = date("i", $event[event_start]);
	$event_starttimes = date("s", $event[event_start]);
	$event_endmonth = date("m", $event[event_start]);
	$event_endday = date("d", $event[event_start]);
	$event_endyear = date("Y", $event[event_start]);
	$event_endtimeh = date("H", $event[event_start]);
	$event_endtimem = date("i", $event[event_start]);
	$event_endtimes = date("s", $event[event_start]);
	
	//convert start/end time and date into timestamps so we can work with them easier
	//first need 24hr format (otherwise the timestamps will always assume am)
	//echo "eventstartampm=[".$event[eventstartampm]."]<br>";
	/* No longer needed - already in 24hr format now - Brian M 2/3/05
	switch($event[eventstartampm]) {
		case 1:
			//a.m. - don't need to do anything
			$event_tempstarttimeh = $event_starttimeh;
			break;
		case 2:
			//it's pm, so have to add 12 to the hours
			$event_tempstarttimeh = $event_starttimeh + 12;
			//echo $event_starttimeh."<br>";
	}
	//echo "eventendampm=[".$event[eventendampm]."]<br>";
	switch($event[eventendampm]) {
		case 1:
			//don't need to do anything
			$event_tempendtimeh = $event_endtimeh;
			break;
		case 2:
			//it's pm, so have to add 12 to the hours
			$event_tempendtimeh = $event_endtimeh + 12;
			//echo $event_endtimeh."<br>";
	}
	*/
	//mktime(int hour, int minute, int second, int month, int day, int year, int [is_dst] )
	/* don't need to do this anymore - already have the timestamp in $event[event_start] and $event[event_end]
	$event_startstamp = mktime($event_tempstarttimeh, $event_starttimem, 0, $event_startmonth, $event_startday, $event_startyear);
	$event_endstamp = mktime($event_tempendtimeh, $event_endtimem, 0, $event_endmonth, $event_endday, $event_endyear);
	//echo "start: ".$event_startstamp."<br>End: ".$event_endstamp."<br>";
	*/
	//Now we need to establist am (1) or pm(2)
	If(date("a",$event[event_start]) == "am") {
		$eventstartampm = "1";
	}elseif(date("a",$event[event_start]) == "pm") {
		$eventstartampm = "2";

	}
	//call function to figure out the duration
	$duration = pnModAPIFunc('EventReg',
        'admin',
        'guesspostcalendarduration',
        array('event_start' =>$event[event_start],
	'event_end' => $event[event_end]));
    //array('event_start' =>$event_startstamp, 'event_end' => $event_endstamp) already have the timestamp now
    
		//add a link to the event in eventreg to the description
		 
		$url= pnModURL('EventReg','user','displayevent',array('eventid' => $eventid));
		//echo "output=[".$url."]<br>";
		// $url ='<a href="'.$url.'">register</a>';
		// LDH - added a little hyperlink prominence so that folks could see it (I missed it several times)
		$url = "<br />" . '<a href="' . $url . '" style="font-size: x-large; font-weight: bold;">' . _EVENTREG_REGNOW . '</a>';
		//echo "output=[".$url."]<br>";
		$description = "<p>".$event[description]."<br />".$url."</p>";
		//echo $description;
		$pc_event = array('event_subject' => $event[name],
							//'event_desc' => $event[description],
							'event_desc' => $description,
							'event_sharing' => 3, //assuming it's a global event
							'event_category' => pnModAPIFunc('EventReg',
								'admin',
								'findpostcalendarcategory',
								$event[category]), 
							'event_topic' => "", //this is a postcalendar field but appears unused
							'event_startmonth' => $event_startmonth,
							'event_startday' => $event_startday,
							'event_startyear' => $event_startyear,
							'event_starttimeh' => $event_starttimeh,
							'event_starttimem' => $event_starttimem,
							'event_startampm' => $eventstartampm,
							'event_endmonth' => $event_endmonth,
							'event_endday' => $event_endday,
							'event_endyear' => $event_endyear,
							'event_endtype' => 1, //assume that the event doesn't go on forever
							'event_dur_hours' => $duration[event_dur_hours], 
							'event_dur_minutes' => $duration[event_dur_minutes], 
							'event_allday' => 0, //assume the event isn't an all-day event
							'event_location' => $event[location],
							'event_street1' => $event[addr1],
							'event_street2' => 	$event[addr2],
            	'event_city' => $event[city],
            	'event_state' => $event[state],
            	'event_postal' => $event[zipcode],
							'event_contname' => "", //don't know
            	'event_conttel' => $event[phone],
            	'event_contemail' => $event[notifyemail],
            	'event_website' => "", //don't know, could use a link to the eventreg item?
            	'event_fee' => $event[fee],
		'event_repeat' => $duration[event_repeat], 
            	'event_repeat_freq' => $duration[event_repeat_freq],
            	'event_repeat_freq_type' => "",
            	'event_repeat_on_num' => "",
            	'event_repeat_on_day' => "",
            	'event_repeat_on_freq' => $duration[event_repeat_on_freq],
							'pc_html_or_text' => "html",
							'form_action' => "preview");
							
		
   
	 //redirect to the postcalendar page and provide data gathered above
	 //pnRedirect(pnModURL('postcalendar', 'admin', 'submit', $pc_event));				
	return $pc_event;						
							
}

/* Function to get the time difference between 2 dates
Function borrowed from phpbuilder.com -> http://www.phpbuilder.net/columns/akent20000610.php3?page=7
* ERB - 10/25/04 Removed BCDIV call for math in this function due to compatability
* concerns
*/
Function DateDiff ($interval,$date1,$date2) 
{
    // get the number of seconds between the two dates 
$timedifference = $date2 - $date1;

    switch ($interval) {
        case 'w':
            $retval = $timedifference / 604800;
            break;
        case 'd':
            $retval = $timedifference / 86400;
            break;
        case 'h':
            $retval = $timedifference / 3600;
            break;
        case 'n':
            $retval = $timedifference / 60;
            break;
        case 's':
            $retval = $timedifference;
            break;
            
    }
    return $retval;

}

/*Function to add (or subtract) a given amount of time from a date
Interval can be one of: 
yyyy = year
q = Quarter
m = Month
y = Day of year
d = Day
w = Weekday
ww = Week of year
h = Hour
n = Minute
s = Second
*/
function DateAdd($interval, $number, $date) {

    $date_time_array = getdate($date);
    $hours = $date_time_array['hours'];
    $minutes = $date_time_array['minutes'];
    $seconds = $date_time_array['seconds'];
    $month = $date_time_array['mon'];
    $day = $date_time_array['mday'];
    $year = $date_time_array['year'];

    switch ($interval) {
    
        case 'yyyy':
            $year+=$number;
            break;
        case 'q':
            $year+=($number*3);
            break;
        case 'm':
            $month+=$number;
            break;
        case 'y':
        case 'd':
        case 'w':
            $day+=$number;
            break;
        case 'ww':
            $day+=($number*7);
            break;
        case 'h':
            $hours+=$number;
            break;
        case 'n':
            $minutes+=$number;
            break;
        case 's':
            $seconds+=$number; 
            break;            
    }
       $timestamp= mktime($hours,$minutes,$seconds,$month,$day,$year);
    return $timestamp;
}

/* function to try to guess event duration and repeat values to pass to PostCalendar
This is just a basic attempt to get reasonable values, the user should probably still
double check the settings when actually creating the calendar item.
Needs to figure out the number of hours and minutes an event lasts.
Takes a timestamp of the event start datetime and end datetime*/
function eventreg_adminapi_guesspostcalendarduration($args) {
extract($args);
/* echo "Start time: ";
echo strftime('%Hh%M %A %d %b',$event_start);
echo "<br />End time: ";
echo strftime('%Hh%M %A %d %b',$event_end);
echo "<br />"; */
//determine the number of hours
$timedifference_in_hours = DateDiff("h", $event_start, $event_end);
//Echo "difference in hours: ".$timedifference_in_hours."<br />";

//add the number of hours just calculated to the start time so that the number of
// additional minutes can be calculated
$temp_starttime = DateAdd("h", $timedifference_in_hours, $event_start);
/* Echo "Temp time: ";
echo strftime('%Hh%M %A %d %b',$temp_starttime)."<br />"; */

//determine the new difference in minutes
$timedifference_in_minutes = DateDiff("n", $temp_starttime, $event_end);
//echo "difference in minutes: ".$timedifference_in_minutes."<br />";

//try to deal with events that last more than 24hrs
if ($timedifference_in_hours > 24) {
	//this event is more that a day long, PostCalendar won't accept this hour duration.
	
	//figure out how many days long this event is
	$timedifference_in_days = DateDiff("d", $event_start, $event_end);
	
	//guess repeat intervals (only going to deal with days, user is going to have to deal with weeks, months and years)
	if($timedifference_in_days <= 7) {
		//lasts less than or equal to 1 week, going to assume that it occurs every day
		$event_repeat = 1; //postcalendar repeats every x days/months
		$event_repeat_freq_type = 0; //postcalendar day repeat
		$event_repeat_freq = 1; //postcalendar repeat every 1 interval (in this case day)
		
		//now need to try to get a reasonable hour duration value
		$temptime = DateAdd("d", $timedifference_in_days, $event_start);
		$tempdiff = DateDiff("h", $temptime, $event_end);
		/*unfortunately, if an event starts in the pm and ends in the am, we're going to get a
		 negative hour difference, which doesn't make any sense, so need to deal with that 
		 
		 if we get a negative value, recalculate the temptime with 1 less day (should give the correct hour duration?)*/
		 if($tempdiff < 0) {
		 	$temptime = DateAdd("d", $timedifference_in_days-1, $event_start);
			$tempdiff = DateDiff("h", $temptime, $event_end);
		 }
		 $timedifference_in_hours = $tempdiff;
	} else {
		$event_repeat = ""; //postcalendar repeats every x days/months
		$event_repeat_freq = ""; //postcalendar day repeat
		$event_repeat_on_freq = ""; //postcalendar repeat this many
	}
}

//return results
$duration = array('event_dur_hours' => $timedifference_in_hours,
	'event_dur_minutes' => $timedifference_in_minutes,
	'event_repeat' => $event_repeat,
	'event_repeat_freq' => $event_repeat_freq,
	'event_repeat_on_freq' => $event_repeat_on_freq);

	return $duration;
}

//Function to find what PostCalendar category matches an EventReg Category
function eventreg_adminapi_findpostcalendarcategory($eventreg_catid)
{

//    if (!pnModAPILoad('PostCalendar', 'admin')) {
//        return false; 
//    }



//echo "looking up eventreg category [".$eventreg_catid."]<br>";
//establish database connection
list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();
    $eventreg_categories_table =  $pntable['eventreg_categories'];
    $eventreg_categories_column =  $pntable['eventreg_categories_column'];
    
    $sql = "Select $eventreg_categories_column[pc_categoryid] 
    FROM $eventreg_categories_table
    WHERE $eventreg_categories_column[categoryid] = $eventreg_catid";
    //echo $sql."<br>";
    $result = $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETMATCHINGPCCATEGORYFAILED);
        return false;
    } 
    /*
      if (!$result->EOF) {
        while (list($pc_catid) = $result->fields) {
		echo $pc_catid;
            $pc_categoryid[] = array('id' => $pc_catid);
            $result->MoveNext();
        } 
     }
	*/
	if(!$result->EOF){
		list($pc_catid) = $result->fields;
		return $pc_catid;
	}
    
    //echo "pc_categoryid[id]=[".$pc_categoryid[id]."]<br>";
    //return $pc_categoryid[id];
}

/*Function to find out what Categories exist for the PostCalendar module so we can let the admin match up
EventReg categories to PostCalendar categories and better integrate the two modules (i.e when you use EventReg to create a PostCalendar item it has the correct category */
function eventreg_adminapi_getpostcalendarcategories()
{
    $categories = array();

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $pc_categoriestable = $pntable['postcalendar_categories'];
    $pc_categoriescolumn = &$pntable['postcalendar_categories_column'];
    $sql = "SELECT $pc_categoriescolumn[catid], $pc_categoriescolumn[catname]
                              FROM $pc_categoriestable
                              ORDER BY $pc_categoriescolumn[catname]";
//echo $sql;
    $result = $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _GETALLCATEGORIESFAILED);
        return false;
    } 

    if (!$result->EOF) {
        while (list($id, $name) = $result->fields) {
            $categories[] = array('id' => $id,
                'name' => $name);
            $result->MoveNext();
        } 
    } 
    return $categories;
} 


?>
