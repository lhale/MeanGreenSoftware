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
 * initialise the DonateReg module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
 
function donatereg_init()
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
	
    $donate_selections_table = $pntable['donate_selections'];    // was eventreg_events
    $donate_selections_column = &$pntable['donate_selections_column'];    // Was donate_selections_column

    // Create the table - the formatting here is not mandatory, but it does
    // make the SQL statement relatively easy to read.  Also, separating out
    // the SQL statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
    $sql = "DROP TABLE IF EXISTS $donate_selections_table;";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _DROPTABLEFAILED . " for " . $donate_selections_table . " table." );
        return false;
    }
    // LDH - Added the MyISAM table def to all three tables.
/* Old Event table - was donate_selections
	$sql = "CREATE TABLE $donate_selections_table (
            $donate_selections_column[donate_selectionid] int(11) NOT NULL auto_increment,
            $donate_selections_column[name] varchar(255) default '',
            $donate_selections_column[orgname] varchar(255) default '',
            $donate_selections_column[category] varchar(10) default '',
            $donate_selections_column[event_start] datetime default '0000-00-00 00:00:00',
            $donate_selections_column[event_end] datetime default '0000-00-00 00:00:00',
            $donate_selections_column[reg_start] datetime default '0000-00-00 00:00:00',
            $donate_selections_column[reg_end] datetime default '0000-00-00 00:00:00',
            $donate_selections_column[location] text default '',
            $donate_selections_column[printtickets] TINYINT(1) ,
            $donate_selections_column[country] varchar(15) default '',
            $donate_selections_column[summary] longtext,
            $donate_selections_column[header] longtext,
            $donate_selections_column[description] longtext,
            $donate_selections_column[registrations] tinyint(1)default '0',
            $donate_selections_column[max_donors] int(11) default '0',
            $donate_selections_column[fee] int(11) default '0',
            $donate_selections_column[phone] text,
            $donate_selections_column[eventlogo] varchar(255) default '',
            $donate_selections_column[eventicon] varchar(255) default '',
            $donate_selections_column[dateadded] datetime default '0000-00-00 00:00:00',
            $donate_selections_column[addedby] varchar (255) default '',
            $donate_selections_column[commentfieldlabel] varchar(255) default 'Comments?',
            $donate_selections_column[notifyemail] varchar(255) default '',
            PRIMARY KEY(pn_id)) TYPE=MyISAM";
*/
	$sql = "CREATE TABLE $donate_selections_table (
            $donate_selections_column[donate_selectionid] int(11) NOT NULL auto_increment,
            $donate_selections_column[category] varchar(10) default '',
            $donate_selections_column[name] varchar(255) default '',
            $donate_selections_column[orgname] varchar(255) default '',
            $donate_selections_column[location] text default '',
            $donate_selections_column[country] varchar(15) default '',
            $donate_selections_column[summary] longtext,
            $donate_selections_column[header] longtext,
            $donate_selections_column[description] longtext,
            $donate_selections_column[max_donors] int(11) default '0',
            $donate_selections_column[phone] text,
            $donate_selections_column[eventlogo] varchar(255) default '',
            $donate_selections_column[eventicon] varchar(255) default '',
            $donate_selections_column[dateadded] datetime default '0000-00-00 00:00:00',
            $donate_selections_column[addedby] varchar (255) default '',
            $donate_selections_column[datechanged] datetime default '0000-00-00 00:00:00',
            $donate_selections_column[changedby] varchar (255) default '',
            $donate_selections_column[commentfieldlabel] varchar(255) default 'Comments?',
            $donate_selections_column[notifyemail] varchar(255) default '',
            PRIMARY KEY(pn_id)) TYPE=MyISAM";
    $dbconn->Execute($sql);

    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', "  " . $donate_selections_column[donate_selectionid] . "  " . _CREATEEVENTSTABLEFAILED . "  " . $sql);
		$output = new pnHTML();
		echo $output->$donate_selections_column[eventlogo];
		echo $output->$sql;
        return false;
    }

	// It's good practice to name the table and column definitions you
    // are getting - $table and $column don't cut it in more complex
    // modules
    $donate_categories_table = $pntable['donate_categories'];
    $donate_categories_column = &$pntable['donate_categories_column'];

    // Create the table - the formatting here is not mandatory, but it does
    // make the SQL statement relatively easy to read.  Also, separating out
    // the SQL statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
    $sql = "DROP TABLE IF EXISTS $donate_categories_table;";
    $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _DROPTABLEFAILED);
        return false;
    }
	$sql = "CREATE TABLE $donate_categories_table (
            $donate_categories_column[categoryid] int(10) NOT NULL auto_increment,
            $donate_categories_column[name] varchar(255) NOT NULL default '',
            $donate_categories_column[description] longtext NOT NULL default '',
            $donate_categories_column[pc_categoryid] varchar(10) default '',
            PRIMARY KEY(pn_id))  TYPE=MyISAM";
    $dbconn->Execute($sql);

    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    // LDH - not 100% sure if pc_categoryid is an INT(10) or varchar(10)
    //     Decided to follow suit with thhe donate_selections table
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', "CREATE TABLE $donate_categories_table (
            $donate_categories_column[categoryid] int(10) NOT NULL auto_increment,
            $donate_categories_column[name] varchar(255) NOT NULL default '',
            $donate_categories_column[description] longtext NOT NULL default '',
            $donate_categories_column[pc_categoryid] varchar(10) default '',
            PRIMARY KEY(pn_id))  TYPE=MyISAM" . ' - ' . _CREATETABLEFAILED);
        return false;
    }


// It's good practice to name the table and column definitions you
    // are getting - $table and $column don't cut it in more complex
    // modules
    $donate_registrations_table = $pntable['donate_registrations'];
    $donate_registrations_column = &$pntable['donate_registrations_column'];

    // Create the table - the formatting here is not mandatory, but it does
    // make the SQL statement relatively easy to read.  Also, separating out
    // the SQL statement from the Execute() command allows for simpler
    // debug operation if it is ever needed
    $sql = "DROP TABLE IF EXISTS $donate_registrations_table;";
    $dbconn->Execute($sql);

    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _DROPTABLEFAILED);
        return false;
    }
/*
	$sql = "CREATE TABLE $donate_registrations_table (
            $donate_registrations_column[registrationid] int(10) NOT NULL auto_increment,
		    $donate_registrations_column[donate_selectionid] int(11) NOT NULL default '0',
            $donate_registrations_column[userid] varchar(255) NOT NULL default '',
 		    $donate_registrations_column[nameregistered] varchar(255) default '',
            $donate_registrations_column[comments] longtext NOT NULL,
 		    $donate_registrations_column[roomassignment] varchar(100) default '0',
 		    $donate_registrations_column[confirmationsent] int(1) default '0',
 		    $donate_registrations_column[numberofpeople] int(5) default '1',
 		    $donate_registrations_column[altphone] varchar(25) default '',
		    $donate_registrations_column[regemail] varchar(255) default '',
            PRIMARY KEY(pn_id)) TYPE=MyISAM";
*/
    	$sql = "CREATE TABLE $donate_registrations_table (
            $donate_registrations_column[registrationid] int(10) NOT NULL auto_increment,
		    $donate_registrations_column[selectionid] int(11) NOT NULL ,
            $donate_registrations_column[userid] varchar(255) NOT NULL default '',
 		    $donate_registrations_column[nameregistered] varchar(255) default '',
            $donate_registrations_column[other] longtext NOT NULL,
            $donate_registrations_column[comments] longtext NOT NULL,
 		    $donate_registrations_column[phone] varchar(25) default '',	
 		    $donate_registrations_column[confirmationsent] int(1) default '0',
 		    $donate_registrations_column[altphone] varchar(25) default '',
		    $donate_registrations_column[regemail] varchar(255) default '',
            PRIMARY KEY(pn_id)) TYPE=MyISAM";
    $dbconn->Execute($sql);

    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        pnSessionSetVar('errormsg', _CREATETABLEFAILED . "for table " . $donate_registrations_table);
        return false;
    }
    // Set up an initial value for a module variable.  Note that all module
    // variables should be initialised with some value in this way rather
    // than just left blank, this helps the user-side code and means that
    // there doesn't need to be a check to see if the variable is set in
    // the rest of the code as it always will be

        pnModSetVar('DonateReg', 'usepostcalendar', false);
        pnModSetVar('DonateReg', 'eventsperpage', 10);
	pnModSetVar('DonateReg', 'categorycolumns', 3);
	pnModSetVar('DonateReg', 'mapservice', null);
	pnModSetVar('DonateReg', 'viewregistrationlevel', ACCESS_ADMIN);//Sets detfault to admin only viewing registrations
	pnModSetVar('DonateReg', 'notifyemail', pnConfigGetVar('adminmail'));//default person to notify of a registration is the site admin
        pnModSetVar('DonateReg', 'timeformat','g:i a');
        pnModSetVar('DonateReg', 'dateformat','m/d/Y');
	pnModSetVar('DonateReg', 'AllowMultipleRegs',false);
	pnModAPIFunc("Permissions","admin","create",array('type'      =>'group',
													  'realm'     =>0,
													  'id'        =>1,
													  'component' =>'DonateReg::',
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
function donatereg_upgrade($oldversion)
{
//this is the initial release
list($dbconn) = pnDBGetConn();
$pntable = pnDBGetTables();

$donate_selections_table = $pntable['donate_selections'];
$donate_selections_column = &$pntable['donate_selections_column'];

$donate_categories_table = $pntable['donate_categories'];
$donate_categories_column = &$pntable['donate_categories_column'];

$donate_registrations_table = $pntable['donate_registrations'];
$donate_registrations_column = &$pntable['donate_registrations_column'];

switch($oldversion){
	case ".50":
	case ".51":
	case ".52":
		$sql = "ALTER TABLE `" . $donate_selections_table . "` 
				ADD $donate_selections_column[printtickets] TINYINT( 1 ) ,
				ADD $donate_selections_column[country] varchar(15) default '',
				CHANGE $donate_selections_column[location] $donate_selections_column[location] TEXT;";
	    $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
	        pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
       		return false;
		    }

		//upgrade module variabless    
		pnModDelVar('DonateReg', 'categoriesperpage');
		pnModSetVar('DonateReg', 'categorycolumns', 3);
		pnModSetVar('DonateReg', 'mapservice', null);
	case ".53":
		$sql = "ALTER TABLE `" . $donate_selections_table . "` 
				ADD $donate_selections_column[regstartampm] TINYINT( 1 ) ,
				ADD $donate_selections_column[regendampm] TINYINT( 1 ) ,
				ADD $donate_selections_column[eventstartampm] TINYINT( 1 ) ,
				ADD $donate_selections_column[eventendampm] TINYINT( 1 );";
	    $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
	        pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
       		return false;
		    }   
		    
		   //upgrade module variables 
		pnModSetVar('DonateReg', 'viewregistrationlevel', ACCESS_ADMIN);//Sets detfault to admin only viewing registrations
		return true;
	case ".54":
		//upgrade the tables for Brian's (the_lorax) addition of e-mail notification
		
		//add field to events table to hold e-mail address to notify of registration
		$sql = "ALTER TABLE `" . $donate_selections_table . "` 
				ADD $donate_selections_column[notifyemail] varchar(255) default '';";
			$dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
	        pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
       		return false;
		    }   
		    	
		  //Modify categories table to add in field to hold corresponding PostCalendar categoryID
		  $sql = "ALTER TABLE `" . $donate_categories_table . "` 
				ADD $donate_categories_column[pc_categoryid] int(10) default '';";
	    
		    
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
	    $donate_registrations_table = $pntable['donate_registrations'];
	    $donate_registrations_column = &$pntable['donate_registrations_column'];
            //modify the registrations table to add in the registered e-mail
 		    $sql = "ALTER TABLE `" . $donate_registrations_table . "` 
				ADD $donate_registrations_column[regemail] varchar(255) default '';";
	    $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
                          pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
                          return false;
		    }
				
		    pnModSetVar('DonateReg', 'notifyemail', pnConfigGetVar('adminmail'));//default person to notify of a registration is the site admin
				return true;
		//break;
/*
	case ".55":
	case ".551":
	case ".56":
            $sql = "ALTER TABLE `" . $donate_selections_table . "` 
	            ADD $donate_selections_column[reg_start] DATETIME NOT NULL ,
	            ADD $donate_selections_column[reg_end] DATETIME NOT NULL ,
	            ADD $donate_selections_column[event_start] DATETIME NOT NULL ,
	            ADD $donate_selections_column[event_end] DATETIME NOT NULL;";

	    $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
              	        pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
        		return false;
		    }


             $sql = "UPDATE `$donate_selections_table` SET $donate_selections_column[reg_start] = 
                                      DATE_ADD($donate_selections_column[reg_startdate],INTERVAL $donate_selections_column[reg_starttime] HOUR_SECOND ),
                     $donate_selections_column[reg_end] = 
                                      DATE_ADD($donate_selections_column[reg_enddate],INTERVAL $donate_selections_column[reg_endtime] HOUR_SECOND ),
                     $donate_selections_column[event_start] = 
                                      DATE_ADD($donate_selections_column[startdate],INTERVAL $donate_selections_column[starttime] HOUR_SECOND ),
                     $donate_selections_column[event_end] = 
                                      DATE_ADD($donate_selections_column[enddate],INTERVAL $donate_selections_column[endtime] HOUR_SECOND );";

	    $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
	        pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
        		return false;
		    }

             $sql = "UPDATE `$donate_selections_table` SET $donate_selections_column[reg_start] = 
                                      DATE_ADD($donate_selections_column[reg_start],INTERVAL 12 HOUR )
                     WHERE $donate_selections_column[regstartampm] = \"2\";";

	    $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
		    if ($dbconn->ErrorNo() != 0) {
	        pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
        		return false;
		    }

	             $sql = "UPDATE `$donate_selections_table` SET $donate_selections_column[reg_end] = 
                                      DATE_ADD($donate_selections_column[reg_end],INTERVAL 12 HOUR )
                     WHERE $donate_selections_column[regendampm] = \"2\";";

             $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
             if ($dbconn->ErrorNo() != 0) {
                  pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
                  return false;
             }



             $sql = "UPDATE `$donate_selections_table` SET $donate_selections_column[event_start] = 
                                      DATE_ADD($donate_selections_column[event_start],INTERVAL 12 HOUR )
                     WHERE $donate_selections_column[eventstartampm] = \"2\";";

             $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
             if ($dbconn->ErrorNo() != 0) {
                  pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
                  return false;
             }
             $sql = "UPDATE `$donate_selections_table` SET $donate_selections_column[event_end] = 
                                      DATE_ADD($donate_selections_column[event_end],INTERVAL 12 HOUR )
                     WHERE $donate_selections_column[eventendampm] = \"2\";";

             $dbconn->Execute($sql);
		    // Check for an error with the database code, and if so set an
		    // appropriate error message and return
             if ($dbconn->ErrorNo() != 0) {
                  pnSessionSetVar('errormsg', _EVENTREGUPGRADEFAILED . " Error: $sql " . $dbconn->ErrorNo());
                  return false;
             }
        pnModSetVar('DonateReg', 'timeformat','g:i a');
        pnModSetVar('DonateReg', 'dateformat','m/d/Y');
*/
	case ".57":
        pnModSetVar('DonateReg', 'AllowMultipleRegs',false);

	case ".58":
		return true;
                //Current Version

	default:

	} // switch

}

/**
 * delete the DonateReg module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function donatereg_delete()
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
    $sql = "DROP TABLE $pntable[donate_selections]";
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
    $sql = "DROP TABLE $pntable[donate_categories]";
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
    $sql = "DROP TABLE $pntable[donate_registrations]";
    $dbconn->Execute($sql);

    // Check for an error with the database code, and if so set an
    // appropriate error message and return
    if ($dbconn->ErrorNo() != 0) {
        // Report failed deletion attempt
        return false;
    }


    // Delete any module variables
    pnModDelVar('DonateReg', 'usepostcalendar');
    pnModDelVar('DonateReg', 'eventsperpage');
    pnModDelVar('DonateReg', 'categorycolumns');
	pnModDelVar('DonateReg', 'mapservice');
	pnModDelVar('DonateReg', 'viewregistrationlevel');
	pnModDelVar('DonateReg', 'notifyemail');
    pnModDelVar('DonateReg', 'AllowMultipleRegs');
    // Deletion successful
    return true;
}

?>
