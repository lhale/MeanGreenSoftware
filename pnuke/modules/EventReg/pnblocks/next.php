<?php
// $Id: next.php,v 1.3 2004/12/28 21:03:30 nuclearw Exp $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the Post-Nuke Development Team.
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
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: Quinie at Quinie.nl
// Purpose of file: Show next X events scheduled in a sideblock
// or show them as a featured event in a sideblock
// ----------------------------------------------------------------------
// Version 0.2
// ----------------------------------------------------------------------

function EventReg_nextblock_init()
{
    pnSecAddSchema('eventreg:nextblock:', 'Block title::');
}


function EventReg_nextblock_info()
{
    return array('text_type' => 'NextEvent',
                 'module' => 'eventreg',
                 'text_type_long' => 'Show or Feature events',
                 'allow_multiple' => true,
                 'form_content' => false,
                 'form_refresh' => false,
                 'show_preview' => true);
}


function EventReg_nextblock_display($blockinfo)
{

    if (!pnSecAuthAction(0, 'eventreg::', '::', ACCESS_READ)) {
        $output->Text(_EVENTREGNOAUTH);
        return $output->GetOutput();
    }
	if (!pnModAvailable('EventReg')) {
		return false;
	}

	$vars = pnBlockVarsFromContent($blockinfo['content']);


    if ($startnum == ""){$startnum = 1; 
	} else {$startnum = pnVarCleanFromInput('startnum');}

	$viewtype = pnVarCleanFromInput('viewtype');
	$categoryid = pnVarCleanFromInput('categoryid'); 


	$output = new pnHTML();
	if (!pnModAPILoad('EventReg', 'user')) {
        $output->Text(_LOADFAILED);
        return $output->GetOutput();
    }
	if (!pnModAPILoad('EventReg', 'admin')) {
        pnSessionSetVar('errormsg', _LOADFAILED);
        return $output->GetOutput();
    }
	


	$items = pnModAPIFunc('EventReg',
                          'user',
                          'getallevents',
                          array('startnum'   => $vars['startnum'],
						  		'categoryid' => $categoryid,
								'type'       => $viewtype,
                                'numitems'   => $vars['numitems']));

if ($items == false) {
        $output->Text(_EVENTREGITEMFAILED);
    }
    $output->SetInputMode(_PNH_VERBATIMINPUT);

	$currentdt='';
    foreach ($items as $item) {
        list($startyear,$startday,$startmonth) = explode('/',$item[startdate]);
		$startdate = "$startmonth/$startday/$startyear";
		list($starttimeh,$starttimem,$starttimes) = explode(':',$item[starttime]);
        list($reg_startyear,$reg_startmonth,$reg_startday) = explode('-',$item[reg_startdate]);
		list($reg_starttimeh,$reg_starttimem,$reg_starttimes) = explode(':',$item[reg_starttime]);

		if ($startdate != $currentdt) {
			$currentdt = $startdate;
			$output->Text($currentdt);
			$output->Text(' ');
		} else {
		}
			
		if (pnSecAuthAction(0,
                            'eventreg::events',
                            " $item[addedby]:$item[category]:$item[eventid] ",
                            ACCESS_READ)) {
            $output->Text($item[starttime]);
			$output->Text('<br>');
//			$output->BoldText(pnVarPrepForDisplay(pnVarCensor($item['name'])));
			$output->URL(pnModURL('EventReg',
                    'user',
                    'displayevent',
                    array('eventid' => $item['eventid'])),
            	    pnVarPrepForDisplay(pnVarCensor($item['name'])));
			
        }
		$output->Text('<br><br>');
    }

//    return $output->GetOutput();
    $blockinfo['content'] = $output->GetOutput();
	return themesideblock($blockinfo);

}

function EventReg_nextblock_modify($blockinfo)
{
    $output = new pnHTML();
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    if (empty($vars['numitems'])) {
        $vars['numitems'] = 5;
    }
   if (empty($vars['startnum'])) {
        $vars['startnum'] = 0;
    }
    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(_NUMITEMS);
    $row[] = $output->FormText('numitems',
                               pnVarPrepForDisplay($vars['numitems']),
                               5,
                               5);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddRow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);

    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(_STARTNUM);
	$row[] = $output->FormText('startnum',
                               pnVarPrepForDisplay($vars['startnum']),
                               5,
                               5);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
	$output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddRow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);

    return $output->GetOutput();
}

function EventReg_nextblock_update($blockinfo)
{
    $vars['numitems'] = pnVarCleanFromInput('numitems');
	$vars['startnum'] = pnVarCleanFromInput('startnum');
    $blockinfo['content'] = pnBlockVarsToContent($vars);
    return $blockinfo;
}

?>
