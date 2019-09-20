<?php
// $Id: pninit.php,v 1.19 2005/04/08 08:46:25 nuclearw Exp $
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
// Original Author of file: Jim McDonald
// Purpose of file:  Initialisation functions for template
// ----------------------------------------------------------------------

// ----------------------------------------------------------------------
// Event Registration Module by Erik Bartels
// http://www.silver-wolf.com
// nuclearw@silver-wolf.com / nuclearw@gmail.com
// ----------------------------------------------------------------------


/**
 * initialise the EventReg module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
 
function eventreg_init()
{
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
	
    $eventreg_events_table = $pntable['eventreg_events'];
    $eventreg_events_column = &$pntable['eventreg_events_column'];

    // Create the table - the formatting here is not mandatory, but it does
    // make the SQL statement relatively easy to read.  Also, separating out
    // the SQL statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
    $sql = "DROP TABLE IF EXISTS $eventreg_events_table;";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _DROPTABLEFAILED);
        return false;
    }
    // Added the MyISAM table def to all three tables.
	$sql = "CREATE TABLE $eventreg_events_table (
            $eventreg_events_column[eventid] int(11) NOT NULL auto_increment,
            $eventreg_events_column[name] varchar(255) default '',
            $eventreg_events_column[orgname] varchar(255) default '',
            $eventreg_events_column[category] varchar(10) default '',
            $eventreg_events_column[event_start] datetime default '0000-00-00 00:00:00',
            $eventreg_events_column[event_end] datetime default '0000-00-00 00:00:00',
            $eventreg_events_column[reg_start] datetime default '0000-00-00 00:00:00',
            $eventreg_events_column[reg_end] datetime default '0000-00-00 00:00:00',
            $eventreg_events_column[location] text default '',
            $eventreg_events_column[printtickets] TINYINT(1) ,
            $eventreg_events_column[country] varchar(15) default '',
            $eventreg_events_column[summary] longtext,
            $eventreg_events_column[header] longtext,
            $eventreg_events_column[description] longtext,
            $eventreg_events_column[registrations] tinyint(1)default '0',
            $eventreg_events_column[max_regs] int(11) default '0',
            $eventreg_events_column[fee] int(11) default '0',
            $eventreg_events_column[phone] text,
            $eventreg_events_column[eventlogo] varchar(255) default '',
            $eventreg_events_column[eventicon] varchar(255) default '',
            $eventreg_events_column[dateadded] datetime default '0000-00-00 00:00:00',
            $eventreg_events_column[addedby] varchar (255) default '',
            $eventreg_events_column[commentfieldlabel] varchar(255) default 'Comments?',
            $eventreg_events_column[notifyemail] varchar(255) default '',
            PRIMARY KEY(pn_id)) TYPE=MyISAM";
    $dbconn->Execute($sql);

    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', "  " . $eventreg_events_column[eventid] . "  " . _CREATEEVENTSTABLEFAILED . "  " . $sql);
		$output = new pnHTML();
		echo $output->$eventreg_events_column[eventlogo];
		echo $output->$sql;
        return false;
    }

	// It's good practice to name the table and column definitions you
    // are getting - $table and $column don't cut it in more complex
    // modules
    $eventreg_categories_table = $pntable['eventreg_categories'];
    $eventreg_categories_column = &$pntable['eventreg_categories_column'];

    // Create the table - the formatting here is not mandatory, but it does
    // make the SQL statement relatively easy to read.  Also, separating out
    // the SQL statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
    $sql = "DROP TABLE IF EXISTS $eventreg_categories_table;";
    $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _DROPTABLEFAILED);
        return false;
    }
	$sql = "CREATE TABLE $eventreg_categories_table (
            $eventreg_categories_column[categoryid] int(10) NOT NULL auto_increment,
            $eventreg_categories_column[name] varchar(255) NOT NULL default '',
            $eventreg_categories_column[description] longtext NOT NULL default '',
            $eventreg_categories_column[pc_categoryid] varchar(10) default '',
            PRIMARY KEY(pn_id))  TYPE=MyISAM";
    $dbconn->Execute($sql);

    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    // LDH - not 100% sure if pc_categoryid is an INT(10) or varchar(10)
    //     Decided to follow suit with thhe eventreg_events table
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', "CREATE TABLE $eventreg_categories_table (
            $eventreg_categories_column[categoryid] int(10) NOT NULL auto_increment,
            $eventreg_categories_column[name] varchar(255) NOT NULL default '',
            $eventreg_categories_column[description] longtext NOT NULL default '',
            $eventreg_categories_column[pc_categoryid] varchar(10) default '',
            PRIMARY KEY(pn_id))  TYPE=MyISAM" . ' - ' . _CREATETABLEFAILED);
        return false;
    }


// It's good practice to name the table and column definitions you
    // are getting - $table and $column don't cut it in more complex
    // modules
    $eventreg_registrations_table = $pntable['eventreg_registrations'];
    $eventreg_registrations_column = &$pntable['eventreg_registrations_column'];

    // Create the table - the formatting here is not mandatory, but it does
    // make the SQL statement relatively easy to read.  Also, separating out
    // the SQL statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
    $sql = "DROP TABLE IF EXISTS $eventreg_registrations_table;";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _DROPTABLEFAILED);
        return false;
    }

	$sql = "CREATE TABLE $eventreg_registrations_table (
                    $eventreg_registrations_column[registrationid] int(10) NOT NULL auto_increment,
		    $eventreg_registrations_column[eventid] int(11) NOT NULL default '0',
                    $eventreg_registrations_column[userid] varchar(255) NOT NULL default '',
                    $eventreg_registrations_column[comments] longtext NOT NULL,
		    $eventreg_registrations_column[roomassignment] varchar(100) default '0',
 		    $eventreg_registrations_column[confirmationsent] int(1) default '0',
 		    $eventreg_registrations_column[numberofpeople] int(5) default '1',
 		    $eventreg_registrations_column[nameregistered] varchar(50) default '',
 		    $eventreg_registrations_column[altphone] varchar(14) default '',
		    $eventreg_registrations_column[regemail] varchar(255) default '',
            PRIMARY KEY(pn_id)) TYPE=MyISAM";
    $dbconn->Execute($sql);

    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATETABLEFAILED);
        return false;
    }
    // Set up an initial value for a module variable.  Note that all module
    // variables should be initialised with some value in this way rather
    // than just left blank, this helps the user-side code and means that
    // there doesn't need to be a check to see if the variable is set in
    // the rest of the code as it always will be

        pnModSetVar('EventReg', 'usepostcalendar', false);
        pnModSetVar('EventReg', 'eventsperpage', 10);
	pnModSetVar('EventReg', 'categorycolumns', 3);
	pnModSetVar('EventReg', 'mapservice', null);
	pnModSetVar('EventReg', 'viewregistrationlevel', ACCESS_ADMIN);//Sets detfault to admin only viewing registrations
	pnModSetVar('EventReg', 'notifyemail', pnConfigGetVar('adminmail'));//default person to notify of a registration is the site admin
        pnModSetVar('EventReg', 'timeformat','g:i a');
        pnModSetVar('EventReg', 'dateformat','m/d/Y');
	pnModSetVar('EventReg', 'AllowMultipleRegs',false);
	pnModAPIFunc("Permissions","admin","create",array('type'      =>'group',
													  'realm'     =>0,
													  'id'        =>1,
													  'component' =>'EventReg::',
													  'instance'  =>'.*',
													  'level'     =>600,
													  'insseq'    =>-1));


    // Initialisation successful
    return true;
}

/**
 * upgrade the template module from an old version
 * This function can be called multiple times
 */
function eventreg_upgrade($oldversion)
{
//this is the initial release
list($dbconn) = pnDBGetConn();
$pntable = pnDBGetTables();

$eventreg_events_table = $pntable['eventreg_events'];
$eventreg_events_column = &$pntable['eventreg_events_column'];

$eventreg_categories_table = $pntable['eventreg_categories'];
$eventreg_categories_column = &$pntable['eventreg_categories_column'];

$eventreg_registrations_table = $pntable['eventreg_registrations'];
$eventreg_registrations_column = &$pntable['eventreg_registrations_column'];

switch($oldversion){
	case ".50":
	case ".51":
	case ".52":
		$sql = "ALTER TABLE `" . $eventreg_events_table . "` 
				ADD $eventreg_events_column[printtickets] TINYINT( 1 ) ,
				ADD $eventreg_events_column[country] varchar(15) default '',
				CHANGE $eventreg_events_column[location] $eventreg_events_column[location] TEXT;";
	    $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
	        pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
       		return false;
		    }

		//upgrade module variabless    
		pnModDelVar('EventReg', 'categoriesperpage');
		pnModSetVar('EventReg', 'categorycolumns', 3);
		pnModSetVar('EventReg', 'mapservice', null);
	case ".53":
		$sql = "ALTER TABLE `" . $eventreg_events_table . "` 
				ADD $eventreg_events_column[regstartampm] TINYINT( 1 ) ,
				ADD $eventreg_events_column[regendampm] TINYINT( 1 ) ,
				ADD $eventreg_events_column[eventstartampm] TINYINT( 1 ) ,
				ADD $eventreg_events_column[eventendampm] TINYINT( 1 );";
	    $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
	        pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
       		return false;
		    }   
		    
		   //upgrade module variables 
		pnModSetVar('EventReg', 'viewregistrationlevel', ACCESS_ADMIN);//Sets detfault to admin only viewing registrations
		return true;
	case ".54":
		//upgrade the tables for Brian's (the_lorax) addition of e-mail notification
		
		//add field to events table to hold e-mail address to notify of registration
		$sql = "ALTER TABLE `" . $eventreg_events_table . "` 
				ADD $eventreg_events_column[notifyemail] varchar(255) default '';";
			$dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
	        pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
       		return false;
		    }   
		    	
		  //Modify categories table to add in field to hold corresponding PostCalendar categoryID
		  $sql = "ALTER TABLE `" . $eventreg_categories_table . "` 
				ADD $eventreg_categories_column[pc_categoryid] int(10) default '';";
	    
		    
	    $dbconn->Execute($sql);
		// Check for an error with the database code, and if so set an
		// appropriate error message and return
		if ($dbconn->ErrorNo() != 0) {
		    pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
	       	return false;
		}
		// It's good practice to name the table and column definitions you
		    // are getting - $table and $column don't cut it in more complex
	    // modules
	    $eventreg_registrations_table = $pntable['eventreg_registrations'];
	    $eventreg_registrations_column = &$pntable['eventreg_registrations_column'];
            //modify the registrations table to add in the registered e-mail
 		    $sql = "ALTER TABLE `" . $eventreg_registrations_table . "` 
				ADD $eventreg_registrations_column[regemail] varchar(255) default '';";
	    $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
                          pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
                          return false;
		    }
				
		    pnModSetVar('EventReg', 'notifyemail', pnConfigGetVar('adminmail'));//default person to notify of a registration is the site admin
				return true;
		//break;
	case ".55":
	case ".551":
	case ".56":
            $sql = "ALTER TABLE `" . $eventreg_events_table . "` 
	            ADD $eventreg_events_column[reg_start] DATETIME NOT NULL ,
	            ADD $eventreg_events_column[reg_end] DATETIME NOT NULL ,
	            ADD $eventreg_events_column[event_start] DATETIME NOT NULL ,
	            ADD $eventreg_events_column[event_end] DATETIME NOT NULL;";

	    $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
              	        pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
        		return false;
		    }


             $sql = "UPDATE `$eventreg_events_table` SET $eventreg_events_column[reg_start] = 
                                      DATE_ADD($eventreg_events_column[reg_startdate],INTERVAL $eventreg_events_column[reg_starttime] HOUR_SECOND ),
                     $eventreg_events_column[reg_end] = 
                                      DATE_ADD($eventreg_events_column[reg_enddate],INTERVAL $eventreg_events_column[reg_endtime] HOUR_SECOND ),
                     $eventreg_events_column[event_start] = 
                                      DATE_ADD($eventreg_events_column[startdate],INTERVAL $eventreg_events_column[starttime] HOUR_SECOND ),
                     $eventreg_events_column[event_end] = 
                                      DATE_ADD($eventreg_events_column[enddate],INTERVAL $eventreg_events_column[endtime] HOUR_SECOND );";

	    $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
	        pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
        		return false;
		    }

             $sql = "UPDATE `$eventreg_events_table` SET $eventreg_events_column[reg_start] = 
                                      DATE_ADD($eventreg_events_column[reg_start],INTERVAL 12 HOUR )
                     WHERE $eventreg_events_column[regstartampm] = \"2\";";

	    $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
	        pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
        		return false;
		    }

	             $sql = "UPDATE `$eventreg_events_table` SET $eventreg_events_column[reg_end] = 
                                      DATE_ADD($eventreg_events_column[reg_end],INTERVAL 12 HOUR )
                     WHERE $eventreg_events_column[regendampm] = \"2\";";

             $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
             if ($dbconn->ErrorNo() != 0) {
                  pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
                  return false;
             }



             $sql = "UPDATE `$eventreg_events_table` SET $eventreg_events_column[event_start] = 
                                      DATE_ADD($eventreg_events_column[event_start],INTERVAL 12 HOUR )
                     WHERE $eventreg_events_column[eventstartampm] = \"2\";";

             $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
             if ($dbconn->ErrorNo() != 0) {
                  pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
                  return false;
             }
             $sql = "UPDATE `$eventreg_events_table` SET $eventreg_events_column[event_end] = 
                                      DATE_ADD($eventreg_events_column[event_end],INTERVAL 12 HOUR )
                     WHERE $eventreg_events_column[eventendampm] = \"2\";";

             $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
             if ($dbconn->ErrorNo() != 0) {
                  pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
                  return false;
             }
        pnModSetVar('EventReg', 'timeformat','g:i a');
        pnModSetVar('EventReg', 'dateformat','m/d/Y');

	case ".57":
        pnModSetVar('EventReg', 'AllowMultipleRegs',false);

	case ".58":
		return true;
                //Current Version

	default:

	} // switch

}

/**
 * delete the EventReg module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function eventreg_delete()
{
    // Get datbase setup - note that both pnDBGetConn() and pnDBGetTables()
    // return arrays but we handle them differently.  For pnDBGetConn()
    // we currently just want the first item, which is the official
    // database handle.  For pnDBGetTables() we want to keep the entire
    // tables array together for easy reference later on
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    // Drop the table - for such a simple command the advantages of separating
    // out the SQL statement from the Execute() command are minimal, but as
    // this has been done elsewhere it makes sense to stick to a single method
    $sql = "DROP TABLE $pntable[eventreg_events]";
    $dbconn->Execute($sql);

    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        // Report failed deletion attempt
        return false;
    }
    // Drop the table - for such a simple command the advantages of separating
    // out the SQL statement from the Execute() command are minimal, but as
    // this has been done elsewhere it makes sense to stick to a single method
    $sql = "DROP TABLE $pntable[eventreg_categories]";
    $dbconn->Execute($sql);

    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        // Report failed deletion attempt
        return false;
    }
    // Drop the table - for such a simple command the advantages of separating
    // out the SQL statement from the Execute() command are minimal, but as
    // this has been done elsewhere it makes sense to stick to a single method
    $sql = "DROP TABLE $pntable[eventreg_registrations]";
    $dbconn->Execute($sql);

    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        // Report failed deletion attempt
        return false;
    }


    // Delete any module variables
    pnModDelVar('EventReg', 'usepostcalendar');
    pnModDelVar('EventReg', 'eventsperpage');
    pnModDelVar('EventReg', 'categorycolumns');
	pnModDelVar('EventReg', 'mapservice');
	pnModDelVar('EventReg', 'viewregistrationlevel');
	pnModDelVar('EventReg', 'notifyemail');
        pnModDelVar('EventReg', 'AllowMultipleRegs');
    // Deletion successful
    return true;
}

?>
