<?php
// $Id: pnadmin.php,v 1.22 2005/04/07 04:57:16 nuclearw Exp $
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
// Purpose of file:  DonateReg administration display functions
// ----------------------------------------------------------------------
/*
************************************************************
TODO: 
	* Add in ability for custom HTML Description Page
	* Add Ability for custom user registration form W/ addtl options.
************************************************************

Mail routine?
$ModName = basename( dirname( __FILE__ ) );
pnMail($_mailto, $subject, $message, "From: \"Medi-Esthetic.NET\" <$sentfrom>\nX-Mailer: PHP/" .phpversion());
*/

/**
 * the main administration function
 * This function is the default function, and is called whenever the
 * module is initiated without defining arguments.  As such it can
 * be used for a number of things, but most commonly it either just
 * shows the module menu and returns or calls whatever the module
 * designer feels should be the default function (often this is the
 * view() function)
 */

/*
 * LDH _ Try forcibly to get this module to import the lingo files
 */
// include_once "modules/".pnVarPrepForOS($GLOBALS['ModName'])."/pnlang/".pnVarPrepForOS($currentlang)."/$script.php";
/*
if (file_exists("modules/DonateReg/pnlang/eng/admin.php"))
    echo "file_exists modules/DonateReg/pnlang/eng/admin.php";
if (file_exists("modules\DonateReg\pnlang\eng\admin.php"))
    echo "file_exists modules/DonateReg/pnlang/eng/admin.php";   
if (file_exists("pnlang/eng/admin.php"))
    echo "file_exists modules/DonateReg/pnlang/eng/admin.php";  
if (file_exists("pnlang\eng\admin.php"))
    echo "file_exists modules/DonateReg/pnlang/eng/admin.php";
if (file_exists("pnuke/modules/DonateReg/pnlang/eng/admin.php"))
    echo "file_exists modules/DonateReg/pnlang/eng/admin.php";
if (file_exists("pnuke\modules\DonateReg\pnlang\eng\admin.php"))
    echo "file_exists modules/DonateReg/pnlang/eng/admin.php"; 
if (file_exists("html/pnuke/modules/DonateReg/pnlang/eng/admin.php"))
    echo "file_exists modules/DonateReg/pnlang/eng/admin.php";
if (file_exists("html\pnuke\modules\DonateReg\pnlang\eng\admin.php"))
    echo "file_exists modules/DonateReg/pnlang/eng/admin.php";   
if (file_exists("C:/Applications/Apache/Apache2/us4earth/html/pnuke/modules/DonateReg/pnlang/eng/admin.php"))
    echo "file_exists modules/DonateReg/pnlang/eng/admin.php";
if (file_exists("C:\Applications\Apache\Apache2\us4earth\html\pnuke\modules\DonateReg\pnlang\eng\admin.php"))
    echo "file_exists modules/DonateReg/pnlang/eng/admin.php";
// None of these worked. Reason: Stupid chmod problem causing no access to the real locat/file
*/
/* EventReg experiment - both work great - ???
if (file_exists("modules/EventReg/pnlang/eng/admin.php"))
    echo "file_exists modules/DonateReg/pnlang/eng/admin.php";
if (file_exists("modules\EventReg\pnlang\eng\admin.php"))
    echo "file_exists modules/DonateReg/pnlang/eng/admin.php";   
*/    
    
/*
 * This is interesting - even tho it's a chmod prob, the ModName & currentlanf processed by
 * pnVarPrepForOS comes back BLANK!!!
 * echo "->modules/".pnVarPrepForOS($GLOBALS['ModName'])."/pnlang/".pnVarPrepForOS($currentlang)."/admin.php:";
 * 
 */
if (file_exists("modules/".pnVarPrepForOS($GLOBALS['ModName'])."/pnlang/".pnVarPrepForOS($currentlang)."/admin.php"))
    echo "file_exists modules/".pnVarPrepForOS($GLOBALS['ModName'])."/pnlang/".pnVarPrepForOS($currentlang)."/admin.php";
// include_once "modules/DonateReg/pnlang/eng/admin.php"; - doesn't work if everything not chmod'd 777
// define('_NEWCATEGORY', 'Create A New Category');    // Well, at LEAST this works...

function donatereg_admin_main()
{ 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML(); 
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing.  For the
    // main function we want to check that the user has at least edit privilege
    // for some item within this component, or else they won't be able to do
    // anything and so we refuse access altogether.  The lowest level of access
    // for administration depends on the particular module, but it is generally
    // either 'edit' or 'delete'
    if (!pnSecAuthAction(0, 'DonateReg::', '::', ACCESS_EDIT)) {
        $output->Text(_EVENTREGNOAUTH . "for user " . pnUserGetVar('uname'));
        return $output->GetOutput();
    } 
    // Add menu to output - it helps if all of the module pages have a standard
    // menu at their head to aid in navigation
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(donatereg_admin_viewevents());
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // Return the output that has been generated by this function
    return $output->GetOutput();
} 

/**
 * view items
 */
function donatereg_admin_viewevents()
{ 
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from pnVarCleanFromInput(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    $startnum = pnVarCleanFromInput('page'); 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML();

    if (!pnSecAuthAction(0, 'DonateReg::', '::', ACCESS_EDIT)) {
        $output->Text(_EVENTREGNOAUTH);
        return $output->GetOutput();
    } 
    // Add menu to output - it helps if all of the module pages have a standard
    // menu at their head to aid in navigation
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(donatereg_adminmenu());
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // Title - putting a title ad the head of each page reminds the user what
    // they are doing
    $output->Title(_VIEWEVENTS); 
    
    // LDH - the goddammned language shit isn't working - WTF???
//    $output->Text("Sesn Lang=" . pnSessionGetVar('lang') . ", PN Lang=" . pnUserGetLang());
//    pnModLangLoad('DonateReg', 'admin');    // This doesn't do JACK
// (This problem was the one & same file permission problem noted above)
    
    // Load API.  Note that this is loading the user API, that is because the
    // user API contains the function to obtain item information which is the
    // first thing that we need to do.  If the API fails to load an appropriate
    // error message is posted and the function returns
    if (!pnModAPILoad('DonateReg', 'user')) {
        $output->Text(_LOADUSERAPIFAILED);
        return $output->GetOutput();
    } 
    if (!pnModAPILoad('DonateReg', 'admin')) {
        $output->Text(_LOADADMINAPIFAILED);
        return $output->GetOutput();
    } 
    // The user API function is called.  This takes the number of items
    // required and the first number in the list of all items, which we
    // obtained from the input and gets us the information on the appropriate
    // items.
	//Got pager working 1-31-05 Brian M
    $startnum = pnVarCleanFromInput('startnum');
	//$itemsperpage = 20;  //This really needs to be turned into a module variable
	$itemsperpage = pnModGetVar('DonateReg','eventsperpage'); //got the  modvar now - Brian M 2/3/05
    $items = pnModAPIFunc('DonateReg',
        'admin',
        'getallevents',
        array('startnum' => $startnum,
            'numitems' => $itemsperpage)); //pnModGetVar('DonateReg','itemsperpage')
	//End of pager
    // Start output table
    $output->TableStart('',
        array(_EVENTNAME,
            _EVENTSTARTDATE,
            _EVENTDESCRIPTION,
            _EVENTOPTIONS,
            _EVENTREGISTRATIONS,
						_POSTCALENDAR),
        2);

    foreach ($items as $item) {
        $row = array();

        if (pnSecAuthAction(0, 'DonateReg::', ":$item[categoryid]:$item[donate_selectionid]", ACCESS_READ)) {
            // Name and number.  Note that unlike the user function we do not
            // censor the text that is being displayed.  This is so the
            // administrator can see the text as exists in the database rather
            // than the munged output version
            $row[] = '&nbsp;' . $item['name'];
			
			/* don't need anymore - using new timestamp to take care of this - Brian M 2/3/05
            list($startyear, $startmonth, $startday) = explode('-', $item['startdate']);
            $startdate = "$startmonth/$startday/$startyear";
            $row[] = '&nbsp;' . $startdate;
			*/
			$row[] = '&nbsp;' . pnVarCensor(date(pnModGetVar('DonateReg','dateformat') . ' ' . pnModGetVar('DonateReg','timeformat'),$item['event_start']));
            $row[] = '&nbsp;' . $item['description']; 
            // Options for the item.  Note that each item has the appropriate
            // levels of authentication checked to ensure that it is suitable
            // for display
            $options = array();
            $output->SetOutputMode(_PNH_RETURNOUTPUT);
            if (pnSecAuthAction(0, 'DonateReg::', "$item[name]::$item[donate_selectionid]", ACCESS_EDIT)) {
                $options[] = $output->URL(pnModURL('DonateReg',
                        'admin',
                        'modifyevent',
                        array('donate_selectionid' => $item['donate_selectionid'])),
                    _EDIT);
                if (pnSecAuthAction(0, 'DonateReg::', "$item[name]::$item[donate_selectionid]", ACCESS_DELETE)) {
                    $options[] = $output->URL(pnModURL('DonateReg',
                            'admin',
                            'deleteevent',
                            array('donate_selectionid' => $item['donate_selectionid'])),
                        _DELETE);
                } 
            } 
            $options[] = $output->URL(pnModURL('DonateReg',
                    'admin',
                    'displayevent',
                    array('donate_selectionid' => $item['donate_selectionid'])),
                _DETAILS);

            $options = join(' | ', $options);
            $output->SetInputMode(_PNH_VERBATIMINPUT);
            $row[] = $output->Text($options);
						
				
            $totalregs = pnModAPIFunc('DonateReg', 'user', 'countregistrationsforevent',
                array('donate_selectionid' => $item['donate_selectionid']));
            $row[] = $output->URL(pnModURL('DonateReg', 'admin',
                    'displayevent',
                    array('donate_selectionid' => $item['donate_selectionid'])),
                $totalregs);
								
								//Moved hidden form that passes data to PostCalendar into it's own function
	if (!pnModLoad('DonateReg', 'admin')) {
        pnSessionSetVar('errormsg', _LOADUSERFAILED);
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    } 
	//if(pnModAvailable( 'PostCalendr')){
    $output->SetInputMode(_PNH_VERBATIMINPUT);
	$row[] = $output -> Text(pnModFunc('DonateReg',
        'admin',
        'PostCalendarForm',
        array('donate_selectionid' => $item['donate_selectionid'])));
				
            $output->SetOutputMode(_PNH_KEEPOUTPUT);
            $output->TableAddRow($row);
            $output->SetInputMode(_PNH_PARSEINPUT);
        } 
		//}
    } 
    $output->TableEnd(); 
    // Call the pnHTML helper function to produce a pager in case of there
    // being many items to display.
    
    // Note that this function includes another user API function.  The
    // function returns a simple count of the total number of items in the item
    // table so that the pager function can do its job properly
	
	//Got pager working 1-31-05 Brian M
  $total = pnModAPIFunc('DonateReg', 'user', 'countitems'); //created the function
//echo $total;
    $output->Pager($startnum,
        pnModAPIFunc('DonateReg', 'user', 'countitems'),
        pnModURL('DonateReg',
            'admin',
            'viewevents',
            array('startnum' => '%%')),
        $itemsperpage); //pnModGetVar('DonateReg', 'itemsperpage') <-need to get this mod var setup
		//end of pager
    // Return the output that has been generated by this function
    return $output->GetOutput();
} 

function donatereg_admin_displayevent($args)
{ 
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from pnVarCleanFromInput(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke.
    list($donate_selectionid,
        $objectid) = pnVarCleanFromInput('donate_selectionid',
        'objectid'); 
    // User functions of this type can be called by other modules.  If this
    // happens then the calling module will be able to pass in arguments to
    // this function through the $args parameter.  Hence we extract these
    // arguments *after* we have obtained any form-based input through
    // pnVarCleanFromInput().
    extract($args); 
    // At this stage we check to see if we have been passed $objectid, the
    // generic item identifier.  This could have been passed in by a hook or
    // through some other function calling this as part of a larger module, but
    // if it exists it overrides $tid
    
    // Note that this module couuld just use $objectid everywhere to avoid all
    // of this munging of variables, but then the resultant code is less
    // descriptive, especially where multiple objects are being used.  The
    // decision of which of these ways to go is up to the module developer
    if (!empty($objectid)) {
        $donate_selectionid = $objectid;
    } 
    if (!pnModAPILoad('DonateReg', 'user')) {
        $output->Text(_LOADUSERAPIFAILED);
        return $output->GetOutput();
    } 
    if (!pnModLoad('DonateReg', 'user')) {
        $output->Text(_LOADUSERFAILED);
        return $output->GetOutput();
    } 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML(); 
    // Add menu to output - it helps if all of the module pages have a standard
    // menu at their head to aid in navigation
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(donatereg_adminmenu());
    $output->SetInputMode(_PNH_PARSEINPUT); 
    $output->LineBreak(2);
	// Load API.  All of the actual work for obtaining information on the items
    // is done within the API, so we need to load that in before we can do
    // anything.  If the API fails to load an appropriate error message is
    // posted and the function returns

    $output->SetInputMode(_PNH_VERBATIMINPUT);
	$output->Text(pnModFunc('DonateReg',
        					'user',
							'displayevent',
							array('objectid' => $event['donate_selectionid'],
							      'erhidemenu' => true)));
/*
	$output->Text(pnModFunc('DonateReg',
        					'user',
							'viewregistrations',
							array('donate_selectionid' => $event['donate_selectionid'])));
    // Return the output that has been generated by this function
	// $output->SetOutputMode(_PNH_KEEPOUTPUT);
*/
    $output->SetInputMode(_PNH_PARSEINPUT);
    return $output->GetOutput();
} 

function donatereg_admin_viewcategories()
{ 
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from pnVarCleanFromInput(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    $startnum = pnVarCleanFromInput('startnum'); 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML();

    if (!pnSecAuthAction(0, 'DonateReg::', '::', ACCESS_EDIT)) {
        $output->Text(_EVENTREGNOAUTH);
        return $output->GetOutput();
    } 
    // Add menu to output - it helps if all of the module pages have a standard
    // menu at their head to aid in navigation
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(donatereg_adminmenu());
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // Title - putting a title ad the head of each page reminds the user what
    // they are doing
    $output->Title(_VIEWCATEGORIES); 
    // Load API.  Note that this is loading the user API, that is because the
    // user API contains the function to obtain item information which is the
    // first thing that we need to do.  If the API fails to load an appropriate
    // error message is posted and the function returns
    if (!pnModAPILoad('DonateReg', 'user')) {
        $output->Text(_LOADUSERAPIFAILED);
        return $output->GetOutput();
    } 
    // The user API function is called.  This takes the number of items
    // required and the first number in the list of all items, which we
    // obtained from the input and gets us the information on the appropriate
    // items.
    $items = pnModAPIFunc('DonateReg',
        'user',
        'getallcategories',
        array('startnum' => $startnum,
            'numitems' => pnModGetVar('DonateReg',
                'itemsperpage'))); 
    // Start output table
    $output->TableStart('',
        array(_CATEGORYNAME,
            _CATEGORYDESCRIPTION,
            _CATEGORYEVENTS,
            _OPTIONS),
        4);

    foreach ($items as $item) {
        $row = array();

        if (pnSecAuthAction(0, 'DonateReg::', ":$item[categoryid]:$item[donate_selectionid]", ACCESS_READ)) {
            // Name and number.  Note that unlike the user function we do not
            // censor the text that is being displayed.  This is so the
            // administrator can see the text as exists in the database rather
            // than the munged output version
            $categoryid = $item[categoryid];
            $numevents = pnModAPIFunc('DonateReg', 'user', 'counteventsincategory', array('categoryid' => $categoryid));
            $row[] = '&nbsp;' . $item['name'];
            $row[] = '&nbsp;' . $item['description'];
            $row[] = '&nbsp;' . $numevents; 
            // Options for the item.  Note that each item has the appropriate
            // levels of authentication checked to ensure that it is suitable
            // for display
            $options = array();
            $output->SetOutputMode(_PNH_RETURNOUTPUT);
            if (pnSecAuthAction(0, 'DonateReg::', "$item[name]::$item[tid]", ACCESS_EDIT)) {
                $options[] = $output->URL(pnModURL('DonateReg',
                        'admin',
                        'modifycategory',
                        array('categoryid' => $item['categoryid'])),
                    _EDIT);
                if (pnSecAuthAction(0, 'DonateReg::', "$item[name]::$item[tid]", ACCESS_DELETE)) {
                    $options[] = $output->URL(pnModURL('DonateReg',
                            'admin',
                            'deletecategory',
                            array('categoryid' => $item['categoryid'])),
                        _DELETE);
                } 
            } 
            $options[] = $output->URL(pnModURL('DonateReg',
                    'admin',
                    'viewevents',
                    array('categoryid' => $item['categoryid'])),
                _DETAILS);

            $options = join('<BR>', $options);
            $output->SetInputMode(_PNH_VERBATIMINPUT);
            $row[] = $output->Text($options);
            $output->SetOutputMode(_PNH_KEEPOUTPUT);
            $output->TableAddRow($row);
            $output->SetInputMode(_PNH_PARSEINPUT);
        } 
    } 
    $output->TableEnd(); 
    // Call the pnHTML helper function to produce a pager in case of there
    // being many items to display.
    
    // Note that this function includes another user API function.  The
    // function returns a simple count of the total number of items in the item
    // table so that the pager function can do its job properly
    $output->Pager($startnum,
        pnModAPIFunc('DonateReg', 'user', 'countitems'),
        pnModURL('DonateReg',
            'admin',
            'viewcategories',
            array('startnum' => '%%')),
        pnModGetVar('DonateReg', 'itemsperpage')); 
    // Return the output that has been generated by this function
    return $output->GetOutput();
} 

function donatereg_admin_viewregistrations()
{ 
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from pnVarCleanFromInput(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    $startnum = pnVarCleanFromInput('startnum'); 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML();

    if (!pnSecAuthAction(0, 'DonateReg::registrations', '::', ACCESS_EDIT)) {
        $output->Text(_EVENTREGNOAUTH);
        return $output->GetOutput();
    } 
    // Add menu to output - it helps if all of the module pages have a standard
    // menu at their head to aid in navigation
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(donatereg_adminmenu());
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // Title - putting a title ad the head of each page reminds the user what
    // they are doing
    $output->Title(_VIEWREGISTRATIONS); 
    // Load API.  Note that this is loading the user API, that is because the
    // user API contains the function to obtain item information which is the
    // first thing that we need to do.  If the API fails to load an appropriate
    // error message is posted and the function returns
    if (!pnModAPILoad('DonateReg', 'user')) {
        $output->Text(_LOADUSERAPIFAILED);
        return $output->GetOutput();
    } 
    // The user API function is called.  This takes the number of items
    // required and the first number in the list of all items, which we
    // obtained from the input and gets us the information on the appropriate
    // items.
    $items = pnModAPIFunc('DonateReg',
        'admin',
        'getallregistrations',
        array('startnum' => $startnum,
            'numitems' => pnModGetVar('DonateReg',
                'itemsperpage'))); 
    // Start output table
    $output->TableStart('',
        array(_CATEGORYNAME,
            _CATEGORYDESCRIPTION,
            _CATEGORYEVENTS,
            _OPTIONS),
        4);

    foreach ($items as $item) {
        $row = array();

        if (pnSecAuthAction(0, 'DonateReg::', ":$item[categoryid]:$item[donate_selectionid]", ACCESS_READ)) {
            // Name and number.  Note that unlike the user function we do not
            // censor the text that is being displayed.  This is so the
            // administrator can see the text as exists in the database rather
            // than the munged output version
            $categoryid = $item[categoryid];
            $numevents = pnModAPIFunc('DonateReg', 'user', 'counteventsincategory', array('categoryid' => $categoryid));
            $row[] = '&nbsp;' . $item['name'];
            $row[] = '&nbsp;' . $item['description'];
            $row[] = '&nbsp;' . $numevents; 
            // Options for the item.  Note that each item has the appropriate
            // levels of authentication checked to ensure that it is suitable
            // for display
            $options = array();
            $output->SetOutputMode(_PNH_RETURNOUTPUT);
            if (pnSecAuthAction(0, 'DonateReg::', "$item[name]::$item[tid]", ACCESS_EDIT)) {
                $options[] = $output->URL(pnModURL('DonateReg',
                        'admin',
                        'modifycategory',
                        array('categoryid' => $item['categoryid'])),
                    _EDIT);
                if (pnSecAuthAction(0, 'DonateReg::', "$item[name]::$item[tid]", ACCESS_DELETE)) {
                    $options[] = $output->URL(pnModURL('DonateReg',
                            'admin',
                            'deletecategory',
                            array('categoryid' => $item['categoryid'])),
                        _DELETE);
                } 
            } 
            $options[] = $output->URL(pnModURL('DonateReg',
                    'admin',
                    'viewcategory',
                    array('categoryid' => $item['categoryid'])),
                _DETAILS);

            $options = join('<BR>', $options);
            $output->SetInputMode(_PNH_VERBATIMINPUT);
            $row[] = $output->Text($options);
            $output->SetOutputMode(_PNH_KEEPOUTPUT);
            $output->TableAddRow($row);
            $output->SetInputMode(_PNH_PARSEINPUT);
        } 
    } 
    $output->TableEnd(); 
    // Call the pnHTML helper function to produce a pager in case of there
    // being many items to display.
    
    // Note that this function includes another user API function.  The
    // function returns a simple count of the total number of items in the item
    // table so that the pager function can do its job properly
    $output->Pager($startnum,
        pnModAPIFunc('DonateReg', 'user', 'countitems'),
        pnModURL('DonateReg',
            'admin',
            'viewcategories',
            array('startnum' => '%%')),
        pnModGetVar('DonateReg', 'itemsperpage')); 
    // Return the output that has been generated by this function
    return $output->GetOutput();
} 

/**
 * This is a standard function to modify the configuration parameters of the
 * module
 */
function donatereg_admin_modifyconfig()
{ 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML(); 
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing
    if (!pnSecAuthAction(0, 'DonateReg::', '::', ACCESS_ADMIN)) {
        $output->Text(_DonateRegNOAUTH);
        return $output->GetOutput();
    } 
    // Add menu to output - it helps if all of the module pages have a standard
    // menu at their head to aid in navigation
    /*
    if ((!isset($type)) ||
        (!isset($realm)) ||
        (!isset($id)) ||
        (!isset($component)) ||
        (!isset($instance)) ||
        (!isset($level)) ||
        (!isset($insseq))) {

 * @param $args['type'] the type of the permission to update (user or group)
 * @param $args['realm'] the new realm of the permission
 * @param $args['id'] the new group/user id of the permission
 * @param $args['component'] the new component of the permission
 * @param $args['instance'] the new instance of the permission
 * @param $args['level'] the new level of the permission
*/
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(donatereg_adminmenu());
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // Title - putting a title ad the head of each page reminds the user what
    // they are doing
    $output->Title(_EVENTREGMODIFYCONFIG); 
    // Start form - note the use of pnModURL() to create the recipient URL of
    // this form.  All URLs should be generated through pnModURL() to ensure
    // compatibility with future versions of PostNuke
    $output->FormStart(pnModURL('DonateReg', 'admin', 'updateconfig')); 
    // Add an authorisation ID - this adds a hidden field in the form that
    // contains an authorisation ID.  The authorisation ID is very important in
    // preventing certain attacks on the website
    $output->FormHidden('authid', pnSecGenAuthKey()); 
    // Start the table that holds the information to be modified.  Note how
    // each item in the form is kept logically separate in the code; this helps
    // to see which part of the code is responsible for the display of each
    // item, and helps with future modifications
    $output->TableStart(); 
    // Bold
	$maplist[] = array('id'=> 'MapQuest','name' => _EVENTREGMAPQUEST);
	$maplist[] = array('id'=> 'Yahoo','name' => _EVENTREGYAHOOMAP);
	$maplist[] = array('id'=> 'MultiMap','name' => _EVENTREGMULTIMAP);
	$maplist[] = array('id'=> 'Maporama','name' => _EVENTREGMAPORAMA);
	$maplist[] = array('id'=> 'None','name' => _EVENTREGNONE);
	$row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTREGUSEMAPS));
    $row[] = $output->FormSelectMultiple('mapservice',$maplist,0,1,pnModGetVar('DonateReg', 'mapservice'));
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2); 
    // Bold

    // Modified by Eric Mathieu
    // Gets security levels from permissions module
   $ids = accesslevelnames();
   foreach($ids as $k => $v) {
      $reglevels[] = array('id'   => $k,
	                        'name' => $v);
   }
	//$reglevels[] = array('id' => 100, 'name' => _ER_EVERYONE);
	//$reglevels[] = array('id' => 300, 'name' => _ER_REGISTERED);
	//$reglevels[] = array('id' => 800, 'name' => _ER_ADMIN_ONLY);

    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_REGVIEWSECLEVEL));
    $row[] = $output->FormSelectMultiple('viewregistrationlevel',$reglevels,0,1,pnModGetVar('DonateReg', 'viewregistrationlevel'));
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2); 
	//Time Format - Added by Brian M 2/3/05 
	//see http://us3.php.net/manual/en/function.date.php
	$timeformats[] = array('id' => 'g:i a', 'name' => date('g:i a'));
	$timeformats[] = array('id' => 'g:i A', 'name' => date('g:i A'));
	$timeformats[] = array('id' => 'h:i a', 'name' => date('h:i a'));
	$timeformats[] = array('id' => 'h:i A', 'name' => date('h:i A'));
	$timeformats[] = array('id' => 'G:i', 'name' => date('G:i'));
	$timeformats[] = array('id' => 'H:i', 'name' => date('H:i'));
	
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_TIMEFORMAT));
    $row[] = $output->FormSelectMultiple('timeformat',$timeformats,0,1,pnModGetVar('DonateReg', 'timeformat'));
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2); 
	//Date Format - Added by Brian M 2/3/05 
	//see http://us3.php.net/manual/en/function.date.php
	$dateformats[] = array('id' => 'Y-m-d', 'name' => date('Y-m-d'));
	//$dateformats[] = array('id' => 'Y-m-j', 'name' => date('Y-m-j'));
	$dateformats[] = array('id' => 'm/d/Y', 'name' => date('m/d/Y')); // 02/03/2005
	$dateformats[] = array('id' => 'n/j/Y', 'name' => date('n/j/Y'));// 2/3/2005
	$dateformats[] = array('id' => 'm/d/y', 'name' => date('m/d/y'));// 02/03/05
	$dateformats[] = array('id' => 'n/j/y', 'name' => date('n/j/y'));// 2/3/05
	$dateformats[] = array('id' => 'm-d-Y', 'name' => date('m-d-Y'));//02-03-2005
	//$dateformats[] = array('id' => 'm-j-Y', 'name' => date('m-j-Y'));
	$dateformats[] = array('id' => 'm-d-y', 'name' => date('m-d-y')); // 02-03-05
	$dateformats[] = array('id' => 'n-j-Y', 'name' => date('n-j-Y')); // 2-3-2005
	$dateformats[] = array('id' => 'n-j-y', 'name' => date('n-j-y')); // 2-3-05
	$dateformats[] = array('id' => 'F, d Y', 'name' => date('F, d Y')); //February, 03 2005
	//$dateformats[] = array('id' => 'F, dS Y', 'name' => date('F, dS Y'));//February, 03rd 2005
	$dateformats[] = array('id' => 'F, j Y', 'name' => date('F, j Y'));//February, 3 2005
	$dateformats[] = array('id' => 'F, jS Y', 'name' => date('F, jS Y'));//February, 3rd 2005
	$dateformats[] = array('id' => 'F, d \'y', 'name' => date('F, d y'));//February, 03 '05
	$dateformats[] = array('id' => 'F, dS \'y', 'name' => date('F, dS y'));//February, 03rd '05
	$dateformats[] = array('id' => 'F, j \'y', 'name' => date('F, j y'));//February, 3 '05
	$dateformats[] = array('id' => 'F, jS \'y', 'name' => date('F, jS y'));//February, 3rd '05
	$dateformats[] = array('id' => 'M, d Y', 'name' => date('M, d Y'));//Feb., 03 2005
	//$dateformats[] = array('id' => 'M, dS Y', 'name' => date('M, dS Y'));//Feb., 03rd 2005
	$dateformats[] = array('id' => 'M, j Y', 'name' => date('M, j Y'));//Feb., 3 2005
	$dateformats[] = array('id' => 'M, jS Y', 'name' => date('M, jS Y'));//Feb., 3rd 2005
	$dateformats[] = array('id' => 'F, d \'y', 'name' => date('F, d \'y'));//Feb., 03 '05
	$dateformats[] = array('id' => 'F, dS \'y', 'name' => date('F, dS \'y'));//Feb., 03rd '05
	$dateformats[] = array('id' => 'M, j \'y', 'name' => date('M, d \'y'));//Feb., 3 '05
	$dateformats[] = array('id' => 'M, jS \'y', 'name' => date('M, dS \'y'));//Feb., 3rd '05
	$dateformats[] = array('id' => 'd/m/Y', 'name' => date('d/m/Y'));// 03/02/2005
	$dateformats[] = array('id' => 'j/n/Y', 'name' => date('j/m/Y'));// 3/2/2005
	$dateformats[] = array('id' => 'd/m/y', 'name' => date('d/m/y'));// 03/02/05
	$dateformats[] = array('id' => 'j/n/y', 'name' => date('j/m/y'));// 3/2/05
	$dateformats[] = array('id' => 'd-m-Y', 'name' => date('d-m-Y'));// 03-02-2005
	$dateformats[] = array('id' => 'j-n-Y', 'name' => date('j-m-Y'));// 3-2-2005
	$dateformats[] = array('id' => 'd-m-y', 'name' => date('d-m-y'));// 03-02-05
	$dateformats[] = array('id' => 'j-n-y', 'name' => date('j-m-y'));// 3-2-05
	$dateformats[] = array('id' => 'd, F Y', 'name' => date('d, F Y'));// 03, February 2005
	$dateformats[] = array('id' => 'dS, F Y', 'name' => date('dS, F Y'));// 03rd, February 2005
	$dateformats[] = array('id' => 'j, F Y', 'name' => date('j, F Y'));// 3, February 2005
	$dateformats[] = array('id' => 'jS, F Y', 'name' => date('jS, F Y'));// 3rd, February 2005
	$dateformats[] = array('id' => 'd, M Y', 'name' => date('d, M Y'));// 03, Feb. 2005
	$dateformats[] = array('id' => 'dS, M Y', 'name' => date('dS, M Y'));// 03rd, Feb. 2005
	$dateformats[] = array('id' => 'j, M Y', 'name' => date('j, M Y'));// 3, Feb. 2005
	$dateformats[] = array('id' => 'jS, M Y', 'name' => date('jS, M Y'));// 3rd, Feb. 2005
	$dateformats[] = array('id' => 'l F dS, Y', 'name' => date('l F jS, Y'));//Thursday February 3rd, 2005
	$dateformats[] = array('id' => 'D F dS, Y', 'name' => date('D F dS, Y'));//Thurs. February 3rd, 2005
	$dateformats[] = array('id' => 'l jS of F Y', 'name' => date('l jS of F Y'));//Thursday 3rd of February 2005
	$dateformats[] = array('id' => 'D jS of F Y', 'name' => date('D jS of F Y'));//Thurs. 3rd of February 2005

    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_DATEFORMAT));
    $row[] = $output->FormSelectMultiple('dateformat',$dateformats,0,1,pnModGetVar('DonateReg', 'dateformat'));
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2); 
	
    // Number of items to display per page
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTREGCATEGORYCOLUMNS));
    $row[] = $output->FormText('categorycolumns', pnModGetVar('DonateReg', 'categorycolumns'), 3, 3);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
	//Number events per page
	$output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2); 
    // Number of items to display per page - Added by Brian M 2/3/05
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTREGEVENTSPERPAGE));
    $row[] = $output->FormText('eventsperpage', pnModGetVar('DonateReg', 'eventsperpage'), 3, 3);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
	
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2);
		//default e-mail to notify when someone registers
	
		$row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_NOTIFYEMAIL));
    $row[] = $output->FormText('notifyemail', pnModGetVar('DonateReg', 'notifyemail'),70);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2);

    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTREGMULTIREGS));
    $row[] = $output->FormCheckBox('multiregs', pnModGetVar('DonateReg', 'AllowMultipleRegs'),70);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);

    $output->TableEnd(); 
    // End form
    $output->Linebreak(2);
    $output->FormSubmit(_EVENTREGUPDATE);
    $output->FormEnd(); 
    // Return the output that has been generated by this function
    return $output->GetOutput();
} 

/**
 * This is a standard function to update the configuration parameters of the
 * module given the information passed back by the modification form
 */
function donatereg_admin_updateconfig()
{ 
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from pnVarCleanFromInput(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
	$mapservice = pnVarCleanFromInput('mapservice');
	$categorycolumns = pnVarCleanFromInput('categorycolumns');
	$eventsperpage = pnVarCleanFromInput('eventsperpage');
	$viewregistrationlevel = pnVarCleanFromInput('viewregistrationlevel');
	$notifyemail = pnVarCleanFromInput('notifyemail');
	$timeformat = pnVarCleanFromInput('timeformat');
	$dateformat = pnVarCleanFromInput('dateformat');
        $multiregs = pnVarCleanFromInput('multiregs');
    // Confirm authorisation code.  This checks that the form had a valid
    // authorisation code attached to it.  If it did not then the function will
    // proceed no further as it is possible that this is an attempt at sending
    // in false data to the system
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('DonateReg', 'admin', 'view'));
        return true;
    } 
    // Update module variables.  Note that depending on the HTML structure used
    // to obtain the information from the user it is possible that the values
    // might be unset, so it is important to check them all and assign them
    // default values if required
/*    if (!isset($bold)) {
        $bold = 0;
    }  */
 
    pnModSetVar('DonateReg', 'mapservice', $mapservice);
 
 
 
 
 
    pnModSetVar('DonateReg', 'viewregistrationlevel', $viewregistrationlevel); 
	pnModSetVar('DonateReg','categorycolumns', $categorycolumns);
	pnModSetVar('DonateReg','eventsperpage', $eventsperpage);
	pnModSetVar('DonateReg','dateformat', $dateformat);
	pnModSetVar('DonateReg','timeformat', $timeformat);
	pnModSetVar('DonateReg','notifyemail', $notifyemail);
        pnModSetVar('DonateReg', 'AllowMultipleRegs',$multiregs);
    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    pnRedirect(pnModURL('DonateReg', 'admin', 'modifyconfig')); 
    // Return
    return true;
} 
/**
 * Main administration menu
 */
function donatereg_adminmenu()
{ 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML(); 
    // Display status message if any.  Note that in future this functionality
    // will probably be in the theme rather than in this menu, but this is the
    // best place to keep it for now
    $output->Text(pnGetStatusMsg());
    $output->Linebreak(2); 
    // Start options menu
    $output->TableStart(_EVENTREG);
    $output->SetOutputMode(_PNH_RETURNOUTPUT); 
    // Menu options.  These options are all added in a single row, to add
    // multiple rows of options the code below would just be repeated
    $columns = array();
    $columns[] = $output->URL(pnModURL('DonateReg',
            'admin',
            'newcategory'),
        _NEWCATEGORY);
    $columns[] = $output->URL(pnModURL('DonateReg',
            'admin',
            'newevent'),
        _NEWEVENT); 
    // $columns[] = $output->URL(pnModURL('DonateReg',
    // 'admin',
    // 'newregistration'),
    // _NEWREGISTRATION);
    $columns[] = $output->URL(pnModURL('DonateReg',
            'admin',
            'modifyconfig'),
        _EDITEVENTREGCONFIG);

    $columns2 = array();
    $columns2[] = $output->URL(pnModURL('DonateReg',
            'admin',
            'viewcategories'),
        _VIEWCATEGORY);
    $columns2[] = $output->URL(pnModURL('DonateReg',
            'admin',
            'viewevents'),
        _VIEWEVENT); 
    // $columns2[] = $output->URL(pnModURL('DonateReg',
    // 'admin',
    // 'viewregistrations'),
    // _VIEWREGISTRATIONS);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);

    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddRow($columns);
    $output->TableAddRow($columns2);
    $output->SetInputMode(_PNH_PARSEINPUT);

    $output->TableEnd(); 
    // Return the output that has been generated by this function
    return $output->GetOutput();
} 

/**
 * Categories                              **
 */

/**
 * add new item
 * This is a standard function that is called whenever an administrator
 * wishes to create a new module item
 */
function donatereg_admin_newcategory()
{ 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML(); 
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing
    if (!pnSecAuthAction(0, 'DonateReg::category', '::', ACCESS_ADD)) {
        $output->Text(_EVENTREGNOAUTH);
        return $output->GetOutput();
    } 
    // Add menu to output - it helps if all of the module pages have a standard
    // menu at their head to aid in navigation
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(donatereg_adminmenu());
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // Title - putting a title ad the head of each page reminds the user what
    // they are doing
    $output->Title(_NEWCATEGORY); 
    // Start form - note the use of pnModURL() to create the recipient URL of
    // this form.  All URLs should be generated through pnModURL() to ensure
    // compatibility with future versions of PostNuke
    $output->FormStart(pnModURL('DonateReg', 'admin', 'createcategory')); 
    // Add an authorisation ID - this adds a hidden field in the form that
    // contains an authorisation ID.  The authorisation ID is very important in
    // preventing certain attacks on the website
    $output->FormHidden('authid', pnSecGenAuthKey()); 
    // Start the table that holds the information to be input.  Note how each
    // item in the form is kept logically separate in the code; this helps to
    // see which part of the code is responsible for the display of each item,
    // and helps with future modifications
    $output->TableStart(); 
    // Name
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_CATEGORYNAME));
    $row[] = $output->FormText('name', '', 75, 255);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2); 
    // org Name
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_CATEGORYDESCRIPTION));
    $row[] = $output->FormTextArea('description', '', 6, 75);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);

    //List PostCalendar Categories to match up with
    
    // Load API.  All of the actual work for the creation of the new item is
    // done within the API, so we need to load that in before we can do
    // anything.  If the API fails to load an appropriate error message is
    // posted and the function returns
    if (!pnModAPILoad('DonateReg', 'admin')) {
        pnSessionSetVar('errormsg', _ADMINAPILOADFAILED);
        return $output->GetOutput();
    } 
     // PostCalendar Category selection
    $PostCalcategory = pnModAPIFunc('DonateReg', 'admin', 'getpostcalendarcategories', array());
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    if (!$PostCalcategory) {
        $row[] = $output->Text(pnVarPrepForDisplay(_NOPOSTCALENDARCATEGORY));
    } else {
        $row[] = $output->Text(pnVarPrepForDisplay(_PC_CATEGORY));
        $row[] = $output->FormSelectMultiple('pc_category', $PostCalcategory);
    } 
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    //End of Postcalendar category addition
    
    $output->TableEnd(); 
    // End form
    $output->Linebreak(2);
    $output->FormSubmit(_EVENTREGSUBMITCATEGORY);
    $output->FormEnd(); 
    // Return the output that has been generated by this function
    return $output->GetOutput();
} 

/**
 * This is a standard function that is called with the results of the
 * form supplied by donatereg_admin_new() to create a new item
 * 
 * @param  $ 'name' the name of the item to be created
 * @param  $ 'number' the number of the item to be created
 */
function donatereg_admin_createcategory($args)
{ 
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from pnVarCleanFromInput(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    list($name, $description, $pc_categoryid) = pnVarCleanFromInput('name', 'description', 'pc_category'); 
    // Admin functions of this type can be called by other modules.  If this
    // happens then the calling module will be able to pass in arguments to
    // this function through the $args parameter.  Hence we extract these
    // arguments *after* we have obtained any form-based input through
    // pnVarCleanFromInput().
    extract($args); 
    // Confirm authorisation code.  This checks that the form had a valid
    // authorisation code attached to it.  If it did not then the function will
    // proceed no further as it is possible that this is an attempt at sending
    // in false data to the system
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('DonateReg', 'admin', 'error'));
        return true;
    } 
    // Notable by its absence there is no security check here.  This is because
    // the security check is carried out within the API function and as such we
    // do not duplicate the work here
    // Load API.  All of the actual work for the creation of the new item is
    // done within the API, so we need to load that in before we can do
    // anything.  If the API fails to load an appropriate error message is
    // posted and the function returns
    if (!pnModAPILoad('DonateReg', 'admin')) {
        pnSessionSetVar('errormsg', _ADMINAPILOADFAILED);
        return $output->GetOutput();
    } 
    // The API function is called.  Note that the name of the API function and
    // the name of this function are identical, this helps a lot when
    // programming more complex modules.  The arguments to the function are
    // passed in as their own arguments array
    $categoryid = pnModAPIFunc('DonateReg',
        'admin',
        'createcategory',
        array('name' => $name,
            'description' => $description, 'pc_categoryid' => $pc_categoryid)); 
    // The return value of the function is checked here, and if the function
    // suceeded then an appropriate message is posted.  Note that if the
    // function did not succeed then the API function should have already
    // posted a failure message so no action is required
    if ($categoryid) {
        // Success
        pnSessionSetVar('statusmsg', _CATEGORYCREATED . " ID: $categoryid");
    } 
    if (!$categoryid) {
        pnSessionSetVar('statusmsg', _CANTCREATECATEGORY);
    } 
    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    pnRedirect(pnModURL('DonateReg', 'admin', 'viewcategories')); 
    // Return
    return true;
} 

/**
 * modify an item
 * This is a standard function that is called whenever an administrator
 * wishes to modify a current module item
 * 
 * @param  $ 'tid' the id of the item to be modified
 */
function donatereg_admin_modifycategory($args)
{ 
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from pnVarCleanFromInput(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    list($categoryid,
        $objectid) = pnVarCleanFromInput('categoryid',
        'objectid'); 
    // Admin functions of this type can be called by other modules.  If this
    // happens then the calling module will be able to pass in arguments to
    // this function through the $args parameter.  Hence we extract these
    // arguments *after* we have obtained any form-based input through
    // pnVarCleanFromInput().
    extract($args); 
    // At this stage we check to see if we have been passed $objectid, the
    // generic item identifier.  This could have been passed in by a hook or
    // through some other function calling this as part of a larger module, but
    // if it exists it overrides $tid
    
    // Note that this module couuld just use $objectid everywhere to avoid all
    // of this munging of variables, but then the resultant code is less
    // descriptive, especially where multiple objects are being used.  The
    // decision of which of these ways to go is up to the module developer
    if (!empty($objectid)) {
        $categoryid = $objectid;
    } 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML(); 
    // Load API.  Note that this is loading the user API, that is because the
    // user API contains the function to obtain item information which is the
    // first thing that we need to do.  If the API fails to load an appropriate
    // error message is posted and the function returns
    if (!pnModAPILoad('DonateReg', 'user')) {
        $output->Text(_LOADUSERAPIFAILED);
        return $output->GetOutput();
    } 
    // The user API function is called.  This takes the item ID which we
    // obtained from the input and gets us the information on the appropriate
    // item.  If the item does not exist we post an appropriate message and
    // return
    $item = pnModAPIFunc('DonateReg',
        'user',
        'getcategory',
        array('categoryid' => $categoryid));

    if ($item == false) {
        $output->Text(_NOSUCHCATEGORY);
        return $output->GetOutput();
    } 
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing.  However,
    // in this case we had to wait until we could obtain the item name to
    // complete the instance information so this is the first chance we get to
    // do the check
    if (!pnSecAuthAction(0, 'DonateReg::Item', "$item[name]::$donate_selectionid", ACCESS_EDIT)) {
        $output->Text(_CATMODIFYNOAUTH);
        return $output->GetOutput();
    } 
    // Add menu to output - it helps if all of the module pages have a standard
    // menu at their head to aid in navigation
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(donatereg_adminmenu());
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // Title - putting a title ad the head of each page reminds the user what
    // they are doing
    $output->Title(_EDITCATEGORY); 
    // Start form - note the use of pnModURL() to create the recipient URL of
    // this form.  All URLs should be generated through pnModURL() to ensure
    // compatibility with future versions of PostNuke
    $output->FormStart(pnModURL('DonateReg', 'admin', 'updatecategory')); 
    // Add an authorisation ID - this adds a hidden field in the form that
    // contains an authorisation ID.  The authorisation ID is very important in
    // preventing certain attacks on the website
    $output->FormHidden('authid', pnSecGenAuthKey()); 
    // Add a hidden variable for the item id.  This needs to be passed on to
    // the update function so that it knows which item for which item to carry
    // out the update
    $output->FormHidden('categoryid', pnVarPrepForDisplay($categoryid)); 
    // Start the table that holds the information to be input.  Note how each
    // item in the form is kept logically separate in the code; this helps to
    // see which part of the code is responsible for the display of each item,
    // and helps with future modifications
    $output->TableStart(); 
    // Name
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_CATEGORYNAME));
    $row[] = $output->FormText('name', pnVarPrepForDisplay($item['name']), 50, 150);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2); 
    // Description
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_CATEGORYDESCRIPTION));
    $row[] = $output->FormTextArea('description', pnVarPrepForDisplay($item['description']), 6, 75);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->Linebreak(2);
	// PostCalendar Category selection
	   if (!pnModAPILoad('DonateReg', 'admin')) {
        $output->Text(_LOADUSERAPIFAILED);
        return $output->GetOutput();
    } 
    $PostCalcategory = pnModAPIFunc('DonateReg', 'admin', 'getpostcalendarcategories', array());
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    if (!$PostCalcategory) {
        $row[] = $output->Text(pnVarPrepForDisplay(_NOPOSTCALENDARCATEGORY));
    } else {
        $row[] = $output->Text(pnVarPrepForDisplay(_PC_CATEGORY));
        $row[] = $output->FormSelectMultiple('pc_categoryid', $PostCalcategory, 0, 1, $item[pc_categoryid]);
    } 
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    //End of Postcalendar category addition
    $output->TableEnd(); 
    // End form
    $output->Linebreak(2);
    $output->FormSubmit(_CATEGORYUPDATE);
    $output->FormEnd(); 

    // Return the output that has been generated by this function
    return $output->GetOutput();
} 

/**
 * This is a standard function that is called with the results of the
 * form supplied by donatereg_admin_modify() to update a current item
 * 
 * @param  $ 'tid' the id of the item to be updated
 * @param  $ 'name' the name of the item to be updated
 * @param  $ 'number' the number of the item to be updated
 */
function donatereg_admin_updatecategory($args)
{ 
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from pnVarCleanFromInput(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    list($categoryid,
        $objectid,
        $name,
        $description,
	$pc_categoryid) = pnVarCleanFromInput('categoryid',
        'objectid',
        'name',
        'description',
		'pc_categoryid'); 
    // User functions of this type can be called by other modules.  If this
    // happens then the calling module will be able to pass in arguments to
    // this function through the $args parameter.  Hence we extract these
    // arguments *after* we have obtained any form-based input through
    // pnVarCleanFromInput().
    extract($args); 
    // At this stage we check to see if we have been passed $objectid, the
    // generic item identifier.  This could have been passed in by a hook or
    // through some other function calling this as part of a larger module, but
    // if it exists it overrides $tid
    
    // Note that this module couuld just use $objectid everywhere to avoid all
    // of this munging of variables, but then the resultant code is less
    // descriptive, especially where multiple objects are being used.  The
    // decision of which of these ways to go is up to the module developer
    if (!empty($objectid)) {
        $categoryid = $objectid;
    } 
    // Confirm authorisation code.  This checks that the form had a valid
    // authorisation code attached to it.  If it did not then the function will
    // proceed no further as it is possible that this is an attempt at sending
    // in false data to the system
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('DonateReg', 'admin', 'viewcategories'));
        return true;
    } 
    // Notable by its absence there is no security check here.  This is because
    // the security check is carried out within the API function and as such we
    // do not duplicate the work here
    // Load API.  All of the actual work for the update of the new item is done
    // within the API, so we need to load that in before we can do anything.
    // If the API fails to load an appropriate error message is posted and the
    // function returns
    if (!pnModAPILoad('DonateReg', 'admin')) {
        pnSessionSetVar('errormsg', _LOADADMINAPIFAILED);
        return $output->GetOutput();
    } 
    // The API function is called.  Note that the name of the API function and
    // the name of this function are identical, this helps a lot when
    // programming more complex modules.  The arguments to the function are
    // passed in as their own arguments array.
    
    // The return value of the function is checked here, and if the function
    // suceeded then an appropriate message is posted.  Note that if the
    // function did not succeed then the API function should have already
    // posted a failure message so no action is required
    if (pnModAPIFunc('DonateReg',
            'admin',
            'updatecategory',
            array('categoryid' => $categoryid,
                'name' => $name,
                'description' => $description,
				'pc_categoryid' => $pc_categoryid))) {
        // Success
        pnSessionSetVar('statusmsg', _CATEGORYUPDATED);
    } 
    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    pnRedirect(pnModURL('DonateReg', 'admin', 'viewcategories')); 
    // Return
    return true;
} 

/**
 * add new item
 * This is a standard function that is called whenever an administrator
 * wishes to create a new module item
 */
function donatereg_admin_newevent()
{ 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $ModName = basename(dirname(__FILE__));
    $output = new pnHTML(); 
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing
    if (!pnSecAuthAction(0, 'DonateReg::event', '::', ACCESS_ADD)) {
        $output->Text("Sorry - NOGO");
        return $output->GetOutput();
    } 

    if (!pnModAPILoad('DonateReg', 'user')) {
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    } 
    if (!pnModAPILoad('DonateReg', 'admin')) {
        pnSessionSetVar('errormsg', _LOADFAILED);
        return $output->GetOutput();
    } 

    if (!isset($Date)) {
        $Date = date('m/d/Y');
    } 
    list($month, $day, $year) = explode('/', $Date); 
    // Add menu to output - it helps if all of the module pages have a standard
    // menu at their head to aid in navigation
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    /*	$output->Text('<SCRIPT LANGUAGE="JavaScript" SRC="modules/'. $GLOBALS['name'] . '/calendar_javascript.js"></SCRIPT>');*/
    $output->Text(donatereg_adminmenu());
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // Title - putting a title ad the head of each page reminds the user what
    // they are doing
    $output->Title(_NEWEVENT); 
    // Start form - note the use of pnModURL() to create the recipient URL of
    // this form.  All URLs should be generated through pnModURL() to ensure
    // compatibility with future versions of PostNuke
    $output->FormStart(pnModURL('DonateReg', 'admin', 'createevent')); 
    // Add an authorisation ID - this adds a hidden field in the form that
    // contains an authorisation ID.  The authorisation ID is very important in
    // preventing certain attacks on the website
    $output->FormHidden('authid', pnSecGenAuthKey());
    $output->FormHidden('addedby', pnUserGetVar('uid')); 
    // Start the table that holds the information to be input.  Note how each
    // item in the form is kept logically separate in the code; this helps to
    // see which part of the code is responsible for the display of each item,
    // and helps with future modifications
	$er_ampm = array();
	$er_ampm[] = array('id'=> '1','name' => 'AM');
	$er_ampm[] = array('id'=> '2','name' => 'PM');
    $output->TableStart(); 
    // Name
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTNAME));
    $row[] = $output->FormText('eventname', '', 75, 255);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // org Name
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_ORGNAME));
    $row[] = $output->FormText('orgname', '', 75, 255);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->FormStart(pnModURL('DonateReg', 'admin', 'createevent')); 
    // Event Category ID
    $DonateRegcategory = pnModAPIFunc('DonateReg', 'admin', 'getallcategories', array());
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    if (!$DonateRegcategory) {
        $row[] = $output->Text(pnVarPrepForDisplay(_NOEVENTREGCATEGORY));
    } else {
        $row[] = $output->Text(pnVarPrepForDisplay(_SELECTEVENTCATEGORY));
        $row[] = $output->FormSelectMultiple('category', $DonateRegcategory);
    } 
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
/* LDH - later (unsure about datetime relevance )
    // pninclude_once()
    $stimes = pnModAPIFunc('DonateReg', 'user', 'buildTimeSelect', array('hselected' => $event_starttimeh, 'mselected' => $event_starttimem));
    $etimes = pnModAPIFunc('DonateReg', 'user', 'buildTimeSelect', array('hselected' => $event_endtimeh, 'mselected' => $event_endtimem)); 
    // Registration Start Date/time
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_REGSTARTDATETM));
    if ($useinternationaldates) {
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildDaySelect', array('pc_day' => $day, 'selected' => $event_startday));
        $row[2] = $output->FormSelectMultiple('regstartday', $sel_data);
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildMonthSelect', array('pc_month' => $month, 'selected' => $event_startmonth));
        $row[2] .= $output->FormSelectMultiple('regstartmonth', $sel_data);
    } else {
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildMonthSelect', array('pc_month' => $month, 'selected' => $event_startmonth));
        $row[2] = $output->FormSelectMultiple('regstartmonth', $sel_data);
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildDaySelect', array('pc_day' => $day, 'selected' => $event_startday));
        $row[2] .= $output->FormSelectMultiple('regstartday', $sel_data);
    } 
    $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildYearSelect', array('pc_year' => $year, 'selected' => $event_startyear));
    $row[2] .= $output->FormSelectMultiple('regstartyear', $sel_data);
    $row[2] .= $output->Text('  ');
    $row[2] .= $output->FormSelectMultiple('regstarttimeh', $stimes['h']);
    $row[2] .= $output->Text(' : ');
    $row[2] .= $output->FormSelectMultiple('regstarttimem', $stimes['m']);
    $row[2] .= $output->Text('  ');
    $row[2] .= $output->FormSelectMultiple('regstartampm', $er_ampm);    
    $output->SetOutputMode(_PNH_KEEPOUTPUT);

    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // Registration End Date/time
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_REGENDDATETM));
    if ($useinternationaldates) {
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildDaySelect', array('pc_day' => $day, 'selected' => $event_startday));
        $row[2] = $output->FormSelectMultiple('regendday', $sel_data);
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildMonthSelect', array('pc_month' => $month, 'selected' => $event_startmonth));
        $row[2] .= $output->FormSelectMultiple('regendmonth', $sel_data);
    } else {
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildMonthSelect', array('pc_month' => $month, 'selected' => $event_startmonth));
        $row[2] = $output->FormSelectMultiple('regendmonth', $sel_data);
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildDaySelect', array('pc_day' => $day, 'selected' => $event_startday));
        $row[2] .= $output->FormSelectMultiple('regendday', $sel_data);
    } 
    $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildYearSelect', array('pc_year' => $year, 'selected' => $event_startyear));
    $row[2] .= $output->FormSelectMultiple('regendyear', $sel_data);
    $row[2] .= $output->Text('  ');
    $row[2] .= $output->FormSelectMultiple('regendtimeh', $stimes['h']);
    $row[2] .= $output->Text(' : ');
    $row[2] .= $output->FormSelectMultiple('regendtimem', $stimes['m']);
    $row[2] .= $output->Text('  ');
    $row[2] .= $output->FormSelectMultiple('regendampm', $er_ampm);    

	$output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // event Start Date/time
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTSTARTDATETM));
    if ($useinternationaldates) {
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildDaySelect', array('pc_day' => $day, 'selected' => $event_startday));
        $row[2] = $output->FormSelectMultiple('eventstartday', $sel_data);
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildMonthSelect', array('pc_month' => $month, 'selected' => $event_startmonth));
        $row[2] .= $output->FormSelectMultiple('eventstartmonth', $sel_data);
    } else {
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildMonthSelect', array('pc_month' => $month, 'selected' => $event_startmonth));
        $row[2] = $output->FormSelectMultiple('eventstartmonth', $sel_data);
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildDaySelect', array('pc_day' => $day, 'selected' => $event_startday));
        $row[2] .= $output->FormSelectMultiple('eventstartday', $sel_data);
    } 
    $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildYearSelect', array('pc_year' => $year, 'selected' => $event_startyear));
    $row[2] .= $output->FormSelectMultiple('eventstartyear', $sel_data);
    $row[2] .= $output->Text('  ');
    $row[2] .= $output->FormSelectMultiple('eventstarttimeh', $stimes['h']);
    $row[2] .= $output->Text(' : ');
    $row[2] .= $output->FormSelectMultiple('eventstarttimem', $stimes['m']);
    $row[2] .= $output->Text('  ');
    $row[2] .= $output->FormSelectMultiple('eventstartampm', $er_ampm);    

    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // event end Start Date/time
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTENDDATETM));
    if ($useinternationaldates) {
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildDaySelect', array('pc_day' => $day, 'selected' => $event_startday));
        $row[2] = $output->FormSelectMultiple('eventendday', $sel_data);
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildMonthSelect', array('pc_month' => $month, 'selected' => $event_startmonth));
        $row[2] .= $output->FormSelectMultiple('eventendmonth', $sel_data);
    } else {
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildMonthSelect', array('pc_month' => $month, 'selected' => $event_startmonth));
        $row[2] = $output->FormSelectMultiple('eventendmonth', $sel_data);
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildDaySelect', array('pc_day' => $day, 'selected' => $event_startday));
        $row[2] .= $output->FormSelectMultiple('eventendday', $sel_data);
    } 
    $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildYearSelect', array('pc_year' => $year, 'selected' => $event_startyear));
    $row[2] .= $output->FormSelectMultiple('eventendyear', $sel_data);
    $row[2] .= $output->Text('  ');
    $row[2] .= $output->FormSelectMultiple('eventendtimeh', $stimes['h']);
    $row[2] .= $output->Text(' : ');
    $row[2] .= $output->FormSelectMultiple('eventendtimem', $stimes['m']);
    $row[2] .= $output->Text('  ');
    $row[2] .= $output->FormSelectMultiple('eventendampm', $er_ampm);    

    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
*/
    // Location Format
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTLOCATION));
    $row[] = $output->FormText('event_location', '', 50);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
/* LDH - perhaps later
    // Address Line 1 : New Location Format (Needed for mapping abily)
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTADDR1));
    $row[] = $output->FormText('event_street1', '', 50);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Address Line 2 : New Location Format (Needed for mapping abily)
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTADDR2));
    $row[] = $output->FormText('event_street2', '', 50);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // City, State, Zipcod : New Location Format (Needed for mapping abily)
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[0] = $output->Text(pnVarPrepForDisplay(_EVENTCITY . ", " . _EVENTSTATE . " " . _EVENTZIPCODE));
    $row[1] = $output->FormText('event_city', '', 20);
    $row[1] .= $output->Text(', ');
    $row[1] .= $output->FormText('event_state', '', 5);
    $row[1] .= $output->Text(' ');
    $row[1] .= $output->FormText('event_postal', '', 15);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
*/
    // Country : New Location Format (Needed for mapping abily)
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTCOUNTRY));
    $row[] = $output->FormText('country', '', 15);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Event Header Text
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTHEADER));
    $row[] = $output->FormTextArea('headertext', '', 4, 75);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Event Summary Text
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTSUMMARY));
    $row[] = $output->FormTextArea('summary', '', 4, 75);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Event Detail Text
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTDESCRIPTION));
    $row[] = $output->FormTextArea('description', '', 12, 75);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
 /* LDH - maybe later
    // Registrations
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTREGISTRATIONS));
    $row[] = $output->FormText('registrations', '', 9, 9);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
*/
    // Maximum Registrations
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTMAXREGISTRATIONS));
    $row[] = $output->FormText('maxregistrations', '', 9, 9);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
/* LFH - Don't think we should charge donors
    // Fee
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTFEE . " (" . _EVENTREGCURRENCY . ")"));
    $row[] = $output->FormText('fee', '', 6, 6);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
*/
    // Contact Phone Number
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTCONTACTPHONE));
    $row[] = $output->FormText('phone', '', 12, 12);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
		// Notify Email Address
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_NOTIFYEMAIL));
    $row[] = $output->FormText('notifyemail', pnModGetVar('DonateReg','notifyemail'));
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // LOGO GOES HERE
    // ICON GOES HERE
    // Comment Field Label
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTUSERREGCOMMENTFIELDLABEL));
    $row[] = $output->FormText('commentlabel', '', 100, 100);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);

    $output->TableEnd(); 
    // End form
    $output->Linebreak(2);
    $output->FormSubmit(_EVENTREGADD);
    $output->FormEnd(); 
    // Return the output that has been generated by this function
    return $output->GetOutput();
} 

function donatereg_admin_createevent($args)
{ 
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from pnVarCleanFromInput(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('DonateReg', 'admin', 'newevent'));
        return true;
    } 

    list($eventname,
        $orgname,
        $category,
        $event_location,
/* LDH - maybe later
        $regstartday,
        $regstartmonth,
        $regstartyear,
        $regstarttimeh,
        $regstarttimem,
	$regstartampm,
        $regendday,
        $regendmonth,
        $regendyear,
        $regendtimeh,
        $regendtimem,
	$regendampm,
        $eventstartday,
        $eventstartmonth,
        $eventstartyear,
        $eventstarttimeh,
        $eventstarttimem,
	$eventstartampm,
        $eventendday,
        $eventendmonth,
        $eventendyear,
        $eventendtimeh,
        $eventendtimem,
	$eventendampm,
	$event_street1,
        $event_street2,
        $event_city,
        $event_state,
        $event_postal,
        $maxregistrations,
        $fee,
*/
        $country,
        $headertext,
        $summary,
        $description,
        $registrations,
        $phone,
	$notifyemail,
        $commentlabel
        ) = pnVarCleanFromInput('eventname',
        'orgname',
        'category',
/* LDH _ later 
        'regstartday',
        'regstartmonth',
        'regstartyear',
        'regstarttimeh',
        'regstarttimem',
	'regstartampm',
        'regendday',
        'regendmonth',
        'regendyear',
        'regendtimeh',
        'regendtimem',
	'regendampm',
	'eventstartday',
        'eventstartmonth',
        'eventstartyear',
        'eventstarttimeh',
        'eventstarttimem',
        'eventstartampm',
	'eventendday',
        'eventendmonth',
        'eventendyear',
        'eventendtimeh',
        'eventendtimem',
        'eventendampm',
*/
	'event_location',
	'event_street1',
        'event_street2',
        'event_city',
        'event_state',
        'event_postal',
        'country',
        'headertext',
        'summary',
        'description',
        'registrations',
        'maxregistrations',
        'fee',
        'phone',
	'notifyemail',
        'commentlabel');

    extract($args); 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML(); 
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing.  However,
    // in this case we had to wait until we could obtain the item name to
    // complete the instance information so this is the first chance we get to
    // do the check
    if (!pnSecAuthAction(0, 'DonateReg::event', '::', ACCESS_ADD)) {
        $output->Text(_EVENTREGNOAUTH);
        return $output->GetOutput();
    } 

    if (!pnModLoad('DonateReg', 'user')) {
        pnSessionSetVar('errormsg', _LOADUSERFAILED);
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    } 
    if (!pnModAPILoad('DonateReg', 'admin')) {
        pnSessionSetVar('errormsg', _LOADADMINAPIFAILED);
        return $output->GetOutput();
    } 

	$loc = serialize(compact('event_location', 'event_street1', 'event_street2',
                                             'event_city', 'event_state', 'event_postal'));


    $donate_selectionid = pnModAPIFunc('DonateReg',
        'admin',
        'createevent',
        array('eventname' => $eventname,
            'orgname' => $orgname,
            'category' => $category,
            'regstartday' => $regstartday,
            'regstartmonth' => $regstartmonth,
            'regstartyear' => $regstartyear,
            'regstarttimeh' => $regstarttimeh,
            'regstarttimem' => $regstarttimem,
            'regstartampm' => $regstartampm,
            'regendday' => $regendday,
            'regendmonth' => $regendmonth,
            'regendyear' => $regendyear,
            'regendtimeh' => $regendtimeh,
            'regendtimem' => $regendtimem,
            'regendampm' => $regendampm,
            'eventstartday' => $eventstartday,
            'eventstartmonth' => $eventstartmonth,
            'eventstartyear' => $eventstartyear,
            'eventstarttimeh' => $eventstarttimeh,
            'eventstarttimem' => $eventstarttimem,
            'eventstartampm' => $eventstartampm,
            'eventendday' => $eventendday,
            'eventendmonth' => $eventendmonth,
            'eventendyear' => $eventendyear,
            'eventendtimeh' => $eventendtimeh,
            'eventendtimem' => $eventendtimem,
            'eventendampm' => $eventendampm,
            'location' => $loc,
            'country' => $country,
            'headertext' => $headertext,
            'summary' => $summary,
            'description' => $description,
            'registrations' => $registrations,
            'maxregistrations' => $maxregistrations,
            'fee' => $fee,
            'phone' => $phone,
            'notifyemail' => $notifyemail,
            'commentlabel' => $commentlabel));
    if ($donate_selectionid != false) {
        // Success
        pnSessionSetVar('statusmsg', _EVENTCREATED); 
        // Add menu to output - it helps if all of the module pages have a standard
        // menu at their head to aid in navigation
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        $output->Text(donatereg_adminmenu());
        $output->SetInputMode(_PNH_PARSEINPUT); 
        // Title - putting a title ad the head of each page reminds the user what
        // they are doing
        $output->Title(_CONFIRMADDEVENT); 
        // Start form - note the use of pnModURL() to create the recipient URL of
        // this form.  All URLs should be generated through pnModURL() to ensure
        // compatibility with future versions of PostNuke
        $output->SetOutputMode(_PNH_KEEPOUTPUT);
        $output->SetInputMode(_PNH_VERBATIMINPUT);
		$output->Text(pnModFunc('DonateReg',
        					'user',
							'displayevent',
							array('objectid' => $donate_selectionid,
							      'erhidemenu' => true)));
	    $output->SetInputMode(_PNH_PARSEINPUT);
	    /*
			//Add a link to add this event into PostCalendar
			$output->SetInputMode(_PNH_VERBATIMINPUT);
        $output->URL(pnModURL('DonateReg',
        					'admin',
							'prepcalendarevent',
							array('donate_selectionid' => $donate_selectionid)),"Create PostCalendar Event");
							
        $output->SetInputMode(_PNH_PARSEINPUT); 
	*/
	
	//Moved hidden form that passes data to PostCalendar into it's own function
	if (!pnModLoad('DonateReg', 'admin')) {
        pnSessionSetVar('errormsg', _LOADUSERFAILED);
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    } 
    $output->SetInputMode(_PNH_VERBATIMINPUT);
	$output -> Text(pnModFunc('DonateReg',
        'admin',
        'PostCalendarForm',
        array('donate_selectionid' => $donate_selectionid)));
	
	    return $output->GetOutput();
	}
} 

/*
Function to generate a hidden form that contains the event data to be passes to PostCalendar
*/
function donatereg_admin_PostCalendarForm($args) {
    extract($args);

    if(pnModAvailable('PostCalendar')) {
    	//echo "PC avail<br>";
    } else {
    	//echo "PC not avail<br>";
    	$msg = _POSTCALENDARNOTINSTALLED;
    	return $msg;
    }

//Add a form with hidden fields to pass event info to PostCalendar
	
	//Get the event data in a format that PostCalendar can understand
	// The API function is called.  The arguments to the function are passed in
    // as their own arguments array
    $pc_event = pnModAPIFunc('DonateReg',
        'admin',
        'preppostcalendarevent',
        array('donate_selectionid' => $donate_selectionid));
	
	// Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML(); 
      $output->SetInputMode(_PNH__VERBATIMINPUT);
	 // Start form - note the use of pnModURL() to create the recipient URL of
    // this form.  All URLs should be generated through pnModURL() to ensure
    // compatibility with future versions of PostNuke
    $output->FormStart(pnModURL('PostCalendar', 'admin', 'submit')); 
    //event title
    $output->FormHidden('event_subject', $pc_event[event_subject]); 
    //event description
    $output->FormHidden('event_desc', $pc_event[event_desc]); 
    //event sharing (going to assume global - 3 - by default
    $output->FormHidden('event_sharing', $pc_event[event_sharing]); 
    //Event Category (this is the PC category, not the DonateReg category)
    $output->FormHidden('event_category', $pc_event[event_category]); 
    //Event topic
    //this is a postcalendar field but appears unused
    $output->FormHidden('event_topic', $pc_event[event_topic]); 
    //Event start month
    $output->FormHidden('event_startmonth', $pc_event[event_startmonth]); 
	//event  start day
	$output->FormHidden('event_startday', $pc_event[event_startday]); 
	//event start year
	$output->FormHidden('event_startyear', $pc_event[event_startyear]); 
	//event start time hour
	$output->FormHidden('event_starttimeh', $pc_event[event_starttimeh]); 
	//event start time minutes
	$output->FormHidden('event_starttimem', $pc_event[event_starttimem]); 
	//event start time am or pm
	$output->FormHidden('event_startampm', $pc_event[event_startampm]); 
	//event end month
	$output->FormHidden('event_endmonth', $pc_event[event_endmonth]); 
	//event end day
	$output->FormHidden('event_endday', $pc_event[event_endday]); 
	//event end year
	$output->FormHidden('event_endyear', $pc_event[event_endyear]); 
	//event end type (assuming that the event doesn't go on forever, so use 1 by default
	$output->FormHidden('event_endtype', 1); 
	//Event duration (in hours)
	$output->FormHidden('event_dur_hours', $pc_event[event_dur_hours]); 
	//Event duration (in minutes)
	$output->FormHidden('event_dur_minutes', $pc_event[event_dur_minutes]); 
	//event allday? - assuming not so use default value of 0
	$output->FormHidden('event_allday', 0); 
	//Event Location
	$output->FormHidden('event_location', $pc_event[event_location]); 
	//event street address 1
	$output->FormHidden('event_street1', $pc_event[event_street1]); 
	//event street address 2
	$output->FormHidden('event_street2', $pc_event[event_street2]); 
	//event city
	$output->FormHidden('event_city', $pc_event[event_city]); 
     	//event state
	$output->FormHidden('event_state', $pc_event[event_state]); 
        //event postal code (zip code)
	$output->FormHidden('event_postal', $pc_event[event_postal]); 
	//Event contact person name (don't know, could lookup from the createdby userid)
        $output->FormHidden('event_contname', $pc_event[event_contname]); 
	//Event contact phone number
	$output->FormHidden('event_conttel', $pc_event[event_conttel]); 
        //Event contact email address (use same as the notify email for DonateReg)
	$output->FormHidden('event_contemail', $pc_event[event_contemail]); 
        //Event website (don't know - could use the site address or a link right to the eventreg page?) blank for now
	$output->FormHidden('event_website', $pc_event[event_website]); 
         //Event fee
	 $output->FormHidden('event_fee', $pc_event[event_fee]); 
          //Event repeat (0 = doesn't repeat, 1 = every x days/weeks, 2 = on the xth day of month)
	  $output->FormHidden('event_repeat', $pc_event[event_repeat]); 
	  
	//Event repeat frequency (the number of days/weeks between events.  example every 1 weeks)
	$output->FormHidden('event_repeat_freq', $pc_event[event_repeat_freq]); 
	
        //Event repeat frequency type (0 = days, 1= weeks, 2= months, 3 = years)
	$output->FormHidden('event_repeat_freq_type', $pc_event[event_repeat_freq_type]);
	 
        //event repeat on number (1st, 2nd, 3rd, 4th, last)
	$output->FormHidden('event_repeat_on_num', $pc_event[event_repeat_on_num]); 
	
        //event repeat on day (0-6 = sunday- saturday)
	$output->FormHidden('event_repeat_on_day', $pc_event[event_repeat_on_day]); 
	
         //event repeat on frequency (number of Months - example every 1 months of every 3 months)
	 $output->FormHidden('event_repeat_on_freq', $pc_event[event_repeat_on_freq]); 
	 
         //event desc plain text or html? - always html because we've added a link in the description back to evenreg
	 $output->FormHidden('pc_html_or_text', $pc_event[pc_html_or_text]); 
	//form action (preview or submit) use preview here so the user can review the data and verify that it is correct
	$output->FormHidden('form_action', $pc_event[form_action]); 
     // End form
    $output->Linebreak(2);
    $output->FormSubmit(_MAKEPOSTCALENDAREVENT);
    $output->FormEnd(); 
    
    //End of PostCalendar integration form
    //return $output;
  
     return $output->GetOutput();
}

/**
 * modify an item
 * This is a standard function that is called whenever an administrator
 * wishes to modify a current module item. Its job is to create the update
 * item page sent to the admin to start the show.
 * 
 * @param  $ 'tid' the id of the item to be modified
 */

function donatereg_admin_modifyevent($args)
{ 
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from pnVarCleanFromInput(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    list($donate_selectionid,
        $objectid) = pnVarCleanFromInput('donate_selectionid',
        'objectid'); 
    // Admin functions of this type can be called by other modules.  If this
    // happens then the calling module will be able to pass in arguments to
    // this function through the $args parameter.  Hence we extract these
    // arguments *after* we have obtained any form-based input through
    // pnVarCleanFromInput().
    extract($args); 
    // At this stage we check to see if we have been passed $objectid, the
    // generic item identifier.  This could have been passed in by a hook or
    // through some other function calling this as part of a larger module, but
    // if it exists it overrides $tid
    
    // Note that this module couuld just use $objectid everywhere to avoid all
    // of this munging of variables, but then the resultant code is less
    // descriptive, especially where multiple objects are being used.  The
    // decision of which of these ways to go is up to the module developer
    if (!empty($objectid)) {
        $donate_selectionid = $objectid;
    } 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML(); 
    // Load API.  Note that this is loading the user API, that is because the
    // user API contains the function to obtain item information which is the
    // first thing that we need to do.  If the API fails to load an appropriate
    // error message is posted and the function returns
    if (!pnModAPILoad('DonateReg', 'user')) {
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    } 
    if (!pnModAPILoad('DonateReg', 'admin')) {
        pnSessionSetVar('errormsg', _LOADFAILED);
        return $output->GetOutput();
    } 
    // The user API function is called.  This takes the item ID which we
    // obtained from the input and gets us the information on the appropriate
    // item.  If the item does not exist we post an appropriate message and
    // return
    $event = pnModAPIFunc('DonateReg',
        'user',
        'getevent',
        array('donate_selectionid' => $donate_selectionid));

    if (!$event) {
        $output->Text(_NOSUCHEVENT);
        return $output->GetOutput();
    } 

	extract($event);
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing.  However,
    // in this case we had to wait until we could obtain the item name to
    // complete the instance information so this is the first chance we get to
    // do the check
    if (!pnSecAuthAction(0, 'DonateReg::', "::", ACCESS_EDIT)) {
        $output->Text(_EVENTREGADMINNOAUTH);
        return $output->GetOutput();
    } 
    // Add menu to output - it helps if all of the module pages have a standard
    // menu at their head to aid in navigation
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(donatereg_adminmenu());
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // Title - putting a title ad the head of each page reminds the user what
    // they are doing
    $output->Title(_EDITEVENT); 
    // Start form - note the use of pnModURL() to create the recipient URL of
    // this form.  All URLs should be generated through pnModURL() to ensure
    // compatibility with future versions of PostNuke
    $output->UploadMode();
    $output->FormStart(pnModURL('DonateReg', 'admin', 'updateevent')); 
    // Add an authorisation ID - this adds a hidden field in the form that
    // contains an authorisation ID.  The authorisation ID is very important in
    // preventing certain attacks on the website
    $output->FormHidden('authid', pnSecGenAuthKey()); 
    // Add a hidden variable for the item id.  This needs to be passed on to
    // the update function so that it knows which item for which item to carry
    // out the update
    $output->FormHidden('donate_selectionid', pnVarPrepForDisplay($donate_selectionid)); 
    // Start the table that holds the information to be input.  Note how each
    // item in the form is kept logically separate in the code; this helps to
    // see which part of the code is responsible for the display of each item,
    // and helps with future modifications
    $output->TableStart('', '', 0, ''); 
    // Name
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTNAME));
    $row[] = $output->FormText('eventname', $event[name], 75, 255);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // org Name
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_ORGNAME));
    $row[] = $output->FormText('orgname', $event[orgname], 75, 255);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    $output->FormStart(pnModURL('DonateReg', 'admin', 'createevent')); 
    // Category selection
    // Load API.  All of the actual work for the creation of the new item is
    // done within the API, so we need to load that in before we can do
    // anything.  If the API fails to load an appropriate error message is
    // posted and the function returns
    if (!pnModAPILoad('DonateReg', 'admin')) {
        pnSessionSetVar('errormsg', _ADMINAPILOADFAILED);
        return $output->GetOutput();
    } 
    $DonateRegcategory = pnModAPIFunc('DonateReg', 'admin', 'getallcategories', array());
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    if (!$DonateRegcategory) {
        $row[] = $output->Text(pnVarPrepForDisplay(_NOEVENTREGCATEGORY));
    } else {
        $row[] = $output->Text(pnVarPrepForDisplay(_SELECTEVENTCATEGORY));
        $row[] = $output->FormSelectMultiple('category', $DonateRegcategory, 0, 1, $category);
    } 
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Registration Start Date/time
    $reg_starttimes = pnModAPIFunc('DonateReg', 'user', 'buildTimeSelect', array('hselected' => date('g',$event[reg_start]), 'mselected' => date('i',$event[reg_start])));
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_REGSTARTDATETM));
    $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildMonthSelect', array('pc_month' => $month, 'selected' => date('m',$reg_start)));
    $row[2] = $output->FormSelectMultiple('regstartmonth', $sel_data);
    $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildDaySelect', array('pc_day' => $day, 'selected' => date('d',$event[reg_start])));
    $row[2] .= $output->FormSelectMultiple('regstartday', $sel_data);
    $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildYearSelect', array('pc_year' => $year, 'selected' => date('Y',$event[reg_start])));
    $row[2] .= $output->FormSelectMultiple('regstartyear', $sel_data);
    $row[2] .= $output->Text('  ');
    $row[2] .= $output->FormSelectMultiple('regstarttimeh', $reg_starttimes['h']);
    $row[2] .= $output->Text(' : ');
    $row[2] .= $output->FormSelectMultiple('regstarttimem', $reg_starttimes['m']);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // Registration End Date/time
    $reg_endtimes = pnModAPIFunc('DonateReg', 'user', 'buildTimeSelect', array('hselected' => date('g',$event[reg_end]), 'mselected' => date('i',$event[reg_end])));

    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_REGENDDATETM));
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildMonthSelect', array('pc_month' => $month, 'selected' => date('m',$event[reg_end])));
        $row[2] = $output->FormSelectMultiple('regendmonth', $sel_data);
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildDaySelect', array('pc_day' => $day, 'selected' => date('d',$event[reg_end])));
        $row[2] .= $output->FormSelectMultiple('regendday', $sel_data);
    $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildYearSelect', array('pc_year' => $year, 'selected' => date('Y',$event[reg_end])));
    $row[2] .= $output->FormSelectMultiple('regendyear', $sel_data);
    $row[2] .= $output->Text('  ');
    $row[2] .= $output->FormSelectMultiple('regendtimeh', $reg_endtimes['h']);
    $row[2] .= $output->Text(' : ');
    $row[2] .= $output->FormSelectMultiple('regendtimem', $reg_endtimes['m']);

    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // event Start Date/time
    $event_starttimes = pnModAPIFunc('DonateReg', 'user', 'buildTimeSelect', array('hselected' => date('g',$event[event_start]), 'mselected' => date('i',$event[event_start])));
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTSTARTDATETM));
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildMonthSelect', array('pc_month' => $month, 'selected' => date('m',$event[event_start])));
        $row[2] = $output->FormSelectMultiple('eventstartmonth', $sel_data);
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildDaySelect', array('pc_day' => $day, 'selected' => date('d',$event[event_start])));
        $row[2] .= $output->FormSelectMultiple('eventstartday', $sel_data);
    $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildYearSelect', array('pc_year' => $year, 'selected' => date('Y',$event[event_start])));
    $row[2] .= $output->FormSelectMultiple('eventstartyear', $sel_data);
    $row[2] .= $output->Text('  ');
    $row[2] .= $output->FormSelectMultiple('eventstarttimeh', $event_starttimes['h']);
    $row[2] .= $output->Text(' : ');
    $row[2] .= $output->FormSelectMultiple('eventstarttimem', $event_starttimes['m']);

    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT); 
    // event end Start Date/time
    $event_endtimes = pnModAPIFunc('DonateReg', 'user', 'buildTimeSelect', array('hselected' => date('g',$event[event_end]), 'mselected' => date('i',$event[event_end])));
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTENDDATETM));
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildMonthSelect', array('pc_month' => $month, 'selected' => date('m',$event[event_end])));
        $row[2] = $output->FormSelectMultiple('eventendmonth', $sel_data);
        $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildDaySelect', array('pc_day' => $day, 'selected' => date('d',$event[event_end])));
        $row[2] .= $output->FormSelectMultiple('eventendday', $sel_data);
    $sel_data = pnModAPIFunc('DonateReg', 'user', 'buildYearSelect', array('pc_year' => $year, 'selected' => date('Y',$event[event_end])));
    $row[2] .= $output->FormSelectMultiple('eventendyear', $sel_data);
    $row[2] .= $output->Text('  ');
    $row[2] .= $output->FormSelectMultiple('eventendtimeh', $event_endtimes['h']);
    $row[2] .= $output->Text(' : ');
    $row[2] .= $output->FormSelectMultiple('eventendtimem', $event_endtimes['m']);

    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);

    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTLOCATION));
    $row[] = $output->FormText('location',$event['location'],100);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Address Line 1 : New Location Format (Needed for mapping abily)
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTADDR1));
    $row[] = $output->FormText('addr1', $event[addr1], 50);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Address Line 2 : New Location Format (Needed for mapping abily)
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTADDR2));
    $row[] = $output->FormText('addr2', $event[addr2], 50);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // City, State, Zipcode : New Location Format (Needed for mapping abily)
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[0] = $output->Text(pnVarPrepForDisplay(_EVENTCITY . ", " . _EVENTSTATE . " " . _EVENTZIPCODE));
    $row[1] = $output->FormText('city', $event[city], 20);
    $row[1] .= $output->Text(', ');
    $row[1] .= $output->FormText('state', $event[state], 5);
    $row[1] .= $output->Text(' ');
    $row[1] .= $output->FormText('zipcode', $event[zipcode], 15);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Country : New Location Format (Needed for mapping abily)
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTCOUNTRY));
    $row[] = $output->FormText('country', $event[country], 15);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Event Header Text
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTHEADER));
    $row[] = $output->FormTextArea('header', $event[header], 4, 75);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Event Summary Text
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTSUMMARY));
    $row[] = $output->FormTextArea('summary', $event[summary], 4, 75);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Event Detail Text
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTDESCRIPTION));
    $row[] = $output->FormTextArea('description', $event[description], 12, 75);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Registrations
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTREGISTRATIONS));
    $row[] = $output->FormText('registrations', $event[registrations], 9, 9);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Maximum Registrations
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTMAXREGISTRATIONS));
    $row[] = $output->FormText('maxregistrations', $event[max_donors], 9, 9);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Fee
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTFEE . " (" . _EVENTREGCURRENCY . ")"));
    $row[] = $output->FormText('fee', $event[fee], 6, 6);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
    // Contact Phone Number
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTCONTACTPHONE));
    $row[] = $output->FormText('phone', $event[phone], 12, 12);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
		
		  // Notify email
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_NOTIFYEMAIL));
    $row[] = $output->FormText('notifyemail', $event[notifyemail]);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);
		
    // LOGO GOES HERE
    // ICON GOES HERE
    // Comment Field Label
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(pnVarPrepForDisplay(_EVENTUSERREGCOMMENTFIELDLABEL));
    $row[] = $output->FormText('commentfieldlabel', $event[commentfieldlabel], 100, 100);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddrow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);

    $output->TableEnd(); 
    // End form
    $output->Linebreak(2);

    $output->FormSubmit(_EVENTUPDATE);
    $output->FormEnd(); 
    // Return the output that has been generated by this function
    return $output->GetOutput();
} 

/**
 * This is a standard function that is called with the results of the
 * form supplied by donatereg_admin_modify() to update a current item
 * 
 * @param  $ 'tid' the id of the item to be updated
 * @param  $ 'name' the name of the item to be updated
 * @param  $ 'number' the number of the item to be updated
 */
function donatereg_admin_updateevent($args)
{
       if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('DonateReg', 'admin', 'newevent'));
        return true;
    }

    list($donate_selectionid,
        $eventname,
        $orgname,
        $category,
        $regstartday,
        $regstartmonth,
        $regstartyear,
        $regstarttimeh,
        $regstarttimem,
		$regstartampm,
        $regendday,
        $regendmonth,
        $regendyear,
        $regendtimeh,
        $regendtimem,
		$regendampm,
        $eventstartday,
        $eventstartmonth,
        $eventstartyear,
        $eventstarttimeh,
        $eventstarttimem,
		$eventstartampm,
        $eventendday,
        $eventendmonth,
        $eventendyear,
        $eventendtimeh,
        $eventendtimem,
		$eventendampm,
        $event_location,
		$event_street1,
        $event_street2,
        $event_city,
        $event_state,
        $event_postal,
        $country,
        $header,
        $summary,
        $description,
        $registrations,
        $maxregistrations,
        $changedby,
        $fee,
        $phone,
        $commentfieldlabel,
	$notifyemail
        ) = pnVarCleanFromInput(
		'donate_selectionid',
        'eventname',
        'orgname',
        'category',
        'regstartday',
        'regstartmonth',
        'regstartyear',
        'regstarttimeh',
        'regstarttimem',
		'regstartampm',
        'regendday',
        'regendmonth',
        'regendyear',
        'regendtimeh',
        'regendtimem',
		'regendampm',
        'eventstartday',
        'eventstartmonth',
        'eventstartyear',
        'eventstarttimeh',
        'eventstarttimem',
		'eventstartampm',
        'eventendday',
        'eventendmonth',
        'eventendyear',
        'eventendtimeh',
        'eventendtimem',
		'eventendampm',
		'location',
        'addr1',
        'addr2',
        'city',
        'state',
        'zipcode',
        'country',
        'header',
        'summary',
        'description',
        'registrations',
        'maxregistrations',
        'changedby',
        'fee',
        'phone',
        'commentfieldlabel',
		'notifyemail');
    extract($args);

    $output = new pnHTML(); 
    // Create output object - this object will store all of our output so that
    // we can return it easily when required
    if (!pnModLoad('DonateReg', 'user')) {
        pnSessionSetVar('errormsg', _LOADUSERFAILED);
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    } 
    if (!pnModAPILoad('DonateReg', 'admin')) {
        pnSessionSetVar('errormsg', _LOADADMINAPIFAILED);
        return $output->GetOutput();
    } 
    // LDH - only focus on the changer; leave addedby intact
    if ($changedby == "")
        $changedby = pnUserGetVar('uid');
        
	$loc = serialize(compact('event_location', 'event_street1', 'event_street2',
                                            'event_city', 'event_state', 'event_postal'));
    $updated = pnModAPIFunc('DonateReg',
        'admin',
        'updateevent',
        array('donate_selectionid' => $donate_selectionid,
            'category' => $category,
            'eventname' => $eventname,
            'orgname' => $orgname,
/* LDH - see note above
            'regstartday' => $regstartday,
            'regstartmonth' => $regstartmonth,
            'regstartyear' => $regstartyear,
            'regstarttimeh' => $regstarttimeh,
            'regstarttimem' => $regstarttimem,
			'regstartampm' => $regstartampm,
            'regendday' => $regendday,
            'regendmonth' => $regendmonth,
            'regendyear' => $regendyear,
            'regendtimeh' => $regendtimeh,
            'regendtimem' => $regendtimem,
			'regendampm' => $regendampm,
            'eventstartday' => $eventstartday,
            'eventstartmonth' => $eventstartmonth,
            'eventstartyear' => $eventstartyear,
            'eventstarttimeh' => $eventstarttimeh,
            'eventstarttimem' => $eventstarttimem,
			'eventstartampm' => $eventstartampm,
            'eventendday' => $eventendday,
            'eventendmonth' => $eventendmonth,
            'eventendyear' => $eventendyear,
            'eventendtimeh' => $eventendtimeh,
            'eventendtimem' => $eventendtimem,
			'eventendampm' => $eventendampm,
*/
            'location' => $loc,
            'country' => $country,
            'summary' => $summary,
            'header' => $header,
            'description' => $description,
            'maxregistrations' => $maxregistrations,
            'phone' => $phone,
/* LDH - see note above
            'registrations' => $registrations,
            'fee' => $fee,
*/
            'changedby' => $changedby,
            'commentfieldlabel' => $commentfieldlabel,
	    	'notifyemail' => $notifyemail)
        );
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->Text(donatereg_adminmenu());
    $output->SetInputMode(_PNH_PARSEINPUT);

    if ($updated = false) {
        pnSessionSetVar('errormsg', _EVENTUPDATEFAILED);
        return false;
    } 

    if ($updated) {
        pnSessionSetVar('statusmsg', _EVENTUPDATED);
    } 
    // Add menu to output - it helps if all of the module pages have a standard
    // menu at their head to aid in navigation
    // Title - putting a title ad the head of each page reminds the user what
    // they are doing
    $output->SetInputMode(_PNH_VERBATIMINPUT);

    $output->Title(_CONFIRMUPDATEEVENT); 
    $output->Text(pnModFunc('DonateReg',
                  'user',
				  'displayevent',
				  array('donate_selectionid' => $donate_selectionid,
				        'erhidemenu'=> true)));

    return $output->GetOutput();
} 

function donatereg_admin_deleteevent($args)
{ 
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from pnVarCleanFromInput(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    list($donate_selectionid,
        $objectid,
        $confirmation) = pnVarCleanFromInput('donate_selectionid',
        'objectid',
        'confirmation'); 
    // User functions of this type can be called by other modules.  If this
    // happens then the calling module will be able to pass in arguments to
    // this function through the $args parameter.  Hence we extract these
    // arguments *after* we have obtained any form-based input through
    // pnVarCleanFromInput().
    extract($args); 
    // At this stage we check to see if we have been passed $objectid, the
    // generic item identifier.  This could have been passed in by a hook or
    // through some other function calling this as part of a larger module, but
    // if it exists it overrides $tid
    
    // Note that this module couuld just use $objectid everywhere to avoid all
    // of this munging of variables, but then the resultant code is less
    // descriptive, especially where multiple objects are being used.  The
    // decision of which of these ways to go is up to the module developer
    if (!empty($objectid)) {
        $donate_selectionid = $objectid;
    } 
    // Load API.  Note that this is loading the user API, that is because the
    // user API contains the function to obtain item information which is the
    // first thing that we need to do.  If the API fails to load an appropriate
    // error message is posted and the function returns
    if (!pnModAPILoad('DonateReg', 'user')) {
        $output->Text(_LOADUSERAPIFAILED);
        return $output->GetOutput();
    } 
    // The user API function is called.  This takes the item ID which we
    // obtained from the input and gets us the information on the appropriate
    // item.  If the item does not exist we post an appropriate message and
    // return
    $event = pnModAPIFunc('DonateReg',
        'user',
        'getevent',
        array('donate_selectionid' => $donate_selectionid));

    if ($event == false) {
        $output->Text(_NOSUCHEVENT);
        return $output->GetOutput();
    } 
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing.  However,
    // in this case we had to wait until we could obtain the item name to
    // complete the instance information so this is the first chance we get to
    // do the check
    if (!pnSecAuthAction(0, 'DonateReg::event', "$event[addedby]:$event[category]:$event[donate_selectionid]", ACCESS_DELETE)) {
        $output->Text(_DonateRegNOAUTH);
        return $output->GetOutput();
    } 
    // Check for confirmation.
    if (empty($confirmation)) {
        // No confirmation yet - display a suitable form to obtain confirmation
        // of this action from the user
        // Create output object - this object will store all of our output so
        // that we can return it easily when required
        $output = new pnHTML(); 
        // Add menu to output - it helps if all of the module pages have a
        // standard menu at their head to aid in navigation
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        $output->Text(donatereg_adminmenu());
        $output->SetInputMode(_PNH_PARSEINPUT); 
        // Title - putting a title ad the head of each page reminds the user
        // what they are doing
        $output->Title(_DELETEEVENT); 
        // Add confirmation to output.  Note that this uses a pnHTML helper
        // function to produce the requested confirmation in a standard
        // fashion.  This not only cuts down on code within the module but
        // allows it to be altered in future without the module developer
        // having to worry about it
        $output->Text(_EVENTNAME . pnVarPrepForDisplay(" $event[name]"));
        $output->Linebreak(1);
        $output->Text(_EVENTDESCRIPTION . pnVarPrepForDisplay("$event[description]"));
        $output->ConfirmAction(_CONFIRMEVENTDELETE,
            pnModURL('DonateReg',
                'admin',
                'deleteevent'),
            _CANCELEVENTDELETE,
            pnModURL('DonateReg',
                'admin',
                'viewevents'),
            array('donate_selectionid' => $donate_selectionid)); 
        // Return the output that has been generated by this function
        return $output->GetOutput();
    } 
    // If we get here it means that the user has confirmed the action
    // Confirm authorisation code.  This checks that the form had a valid
    // authorisation code attached to it.  If it did not then the function will
    // proceed no further as it is possible that this is an attempt at sending
    // in false data to the system
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('DonateReg', 'admin', 'viewevents'));
        return true;
    } 
    // Load API.  All of the actual work for the deletion of the item is done
    // within the API, so we need to load that in before before we can do
    // anything.  If the API fails to load an appropriate error message is
    // posted and the function returns
    if (!pnModAPILoad('DonateReg', 'admin')) {
        $output->Text(_LOADADMINAPIFAILED);
        return $output->GetOutput();
    } 
    // The API function is called.  Note that the name of the API function and
    // the name of this function are identical, this helps a lot when
    // programming more complex modules.  The arguments to the function are
    // passed in as their own arguments array.
    
    // The return value of the function is checked here, and if the function
    // suceeded then an appropriate message is posted.  Note that if the
    // function did not succeed then the API function should have already
    // posted a failure message so no action is required
    if (pnModAPIFunc('DonateReg',
            'admin',
            'deleteevent',
            array('donate_selectionid' => $donate_selectionid))) {
        // Success
        pnSessionSetVar('statusmsg', _EVENTDELETED);
    } 
    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    pnRedirect(pnModURL('DonateReg', 'admin', 'viewevents')); 
    // Return
    return true;
} 

function donatereg_admin_deletecategory($args)
{ 
    // Get parameters from whatever input we need.  All arguments to this
    // function should be obtained from pnVarCleanFromInput(), getting them
    // from other places such as the environment is not allowed, as that makes
    // assumptions that will not hold in future versions of PostNuke
    list($categoryid,
        $objectid,
        $confirmation) = pnVarCleanFromInput('categoryid',
        'objectid',
        'confirmation'); 
    // User functions of this type can be called by other modules.  If this
    // happens then the calling module will be able to pass in arguments to
    // this function through the $args parameter.  Hence we extract these
    // arguments *after* we have obtained any form-based input through
    // pnVarCleanFromInput().
    extract($args); 
    // At this stage we check to see if we have been passed $objectid, the
    // generic item identifier.  This could have been passed in by a hook or
    // through some other function calling this as part of a larger module, but
    // if it exists it overrides $tid
    
    // Note that this module couuld just use $objectid everywhere to avoid all
    // of this munging of variables, but then the resultant code is less
    // descriptive, especially where multiple objects are being used.  The
    // decision of which of these ways to go is up to the module developer
    if (!empty($objectid)) {
        $categoryid = $objectid;
    } 
    // Load API.  Note that this is loading the user API, that is because the
    // user API contains the function to obtain item information which is the
    // first thing that we need to do.  If the API fails to load an appropriate
    // error message is posted and the function returns
    if (!pnModAPILoad('DonateReg', 'user')) {
        $output->Text(_LOADUSERAPIFAILED);
        return $output->GetOutput();
    } 
    // The user API function is called.  This takes the item ID which we
    // obtained from the input and gets us the information on the appropriate
    // item.  If the item does not exist we post an appropriate message and
    // return
    $category = pnModAPIFunc('DonateReg',
        'user',
        'getcategory',
        array('categoryid' => $categoryid));

    if ($category == false) {
        $output->Text(_NOSUCHCATEGORY);
        return $output->GetOutput();
    } 
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing.  However,
    // in this case we had to wait until we could obtain the item name to
    // complete the instance information so this is the first chance we get to
    // do the check
    if (!pnSecAuthAction(0, 'DonateReg::category', "$category[name]::$donate_selectionid", ACCESS_DELETE)) {
        $output->Text(_DonateRegNOAUTH);
        return $output->GetOutput();
    } 
    // Check for confirmation.
    if (empty($confirmation)) {
        // No confirmation yet - display a suitable form to obtain confirmation
        // of this action from the user
        // Create output object - this object will store all of our output so
        // that we can return it easily when required
        $output = new pnHTML(); 
        // Add menu to output - it helps if all of the module pages have a
        // standard menu at their head to aid in navigation
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        $output->Text(donatereg_adminmenu());
        $output->SetInputMode(_PNH_PARSEINPUT); 
        // Title - putting a title ad the head of each page reminds the user
        // what they are doing
        $output->Title(_DELETECATEGORY);
        $output->Text(_CATEGORYNAME . pnVarPrepForDisplay(" $category[name]"));
        $output->Linebreak(1);
        $output->Text(_CATEGORYDESCRIPTION . pnVarPrepForDisplay(" $category[description]")); 
        // Add confirmation to output.  Note that this uses a pnHTML helper
        // function to produce the requested confirmation in a standard
        // fashion.  This not only cuts down on code within the module but
        // allows it to be altered in future without the module developer
        // having to worry about it
        $output->ConfirmAction(_CONFIRMCATEGORYDELETE,
            pnModURL('DonateReg',
                'admin',
                'deletecategory'),
            _CANCELCATEGORYDELETE,
            pnModURL('DonateReg',
                'admin',
                'viewcategories'),
            array('categoryid' => $categoryid)); 
        // Return the output that has been generated by this function
        return $output->GetOutput();
    } 
    // If we get here it means that the user has confirmed the action
    // Confirm authorisation code.  This checks that the form had a valid
    // authorisation code attached to it.  If it did not then the function will
    // proceed no further as it is possible that this is an attempt at sending
    // in false data to the system
    if (!pnSecConfirmAuthKey()) {
        pnSessionSetVar('errormsg', _BADAUTHKEY);
        pnRedirect(pnModURL('DonateReg', 'admin', 'viewcategories'));
        return true;
    } 
    // Load API.  All of the actual work for the deletion of the item is done
    // within the API, so we need to load that in before before we can do
    // anything.  If the API fails to load an appropriate error message is
    // posted and the function returns
    if (!pnModAPILoad('DonateReg', 'admin')) {
        $output->Text(_LOADADMINAPIFAILED);
        return $output->GetOutput();
    } 
    // The API function is called.  Note that the name of the API function and
    // the name of this function are identical, this helps a lot when
    // programming more complex modules.  The arguments to the function are
    // passed in as their own arguments array.
    
    // The return value of the function is checked here, and if the function
    // suceeded then an appropriate message is posted.  Note that if the
    // function did not succeed then the API function should have already
    // posted a failure message so no action is required
    if (pnModAPIFunc('DonateReg',
            'admin',
            'deletecategory',
            array('categoryid' => $categoryid))) {
        // Success
        pnSessionSetVar('statusmsg', _CATEGORYDELETED);
    } 
    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    pnRedirect(pnModURL('DonateReg', 'admin', 'viewcategories')); 
    // Return
    return true;
} 

function donatereg_admin_prepcalendarevent($args) {
				$donate_selectionid = pnVarCleanFromInput('donate_selectionid'); 
				 extract($args);
			//echo $donate_selectionid;
			//echo "<br />";
	
				 // Load API.  All of the actual work for the prepping of the item is done
    // within the API, so we need to load that in before before we can do
    // anything.  If the API fails to load an appropriate error message is
    // posted and the function returns
    if (!pnModAPILoad('DonateReg', 'admin')) {
        $output->Text(_LOADADMINAPIFAILED);
        return $output->GetOutput();
    } 
    // The API function is called.  Note that the name of the API function and
    // the name of this function are identical, this helps a lot when
    // programming more complex modules.  The arguments to the function are
    // passed in as their own arguments array.
    
    // The return value of the function is checked here, and if the function
    // suceeded then an appropriate message is posted.  Note that if the
    // function did not succeed then the API function should have already
    // posted a failure message so no action is required
    if (pnModAPIFunc('DonateReg',
            'admin',
            'preppostcalendarevent',
            array('donate_selectionid' => $donate_selectionid))) {
        //echo "worked";
    } 
	
		//echo "loaded";
		return true;
}		

?>
