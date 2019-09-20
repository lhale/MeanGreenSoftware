<?php
// $Id: eventreg.php,v 1.6 2005/03/24 23:03:36 the_lorax Exp $ $Name:  $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the Post-Nuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Search Module
// ===========================
//
// Copyright (c) 2001 by Patrick Kellum (webmaster@ctarl-ctarl.com)
// http://www.ctarl-ctarl.com
//
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
// adam_baum: faq.php based on Patrick Kellum's reviews.php search plugin
//           purpose: search the faq database.
// Filename: includes/search/DonateReg.php
// Original Author: Erik Bartels
// Purpose: Search DonateReg
$search_modules[] = array(
    'title' => 'Event Registration',
    'func_search' => 'search_eventreg',
    'func_opt' => 'search_donatereg_opt'
);

function search_donatereg_opt() {
    global
        $bgcolor2,
        $textcolor1;

    $output = new pnHTML();
    $output->SetInputMode(_PNH_VERBATIMINPUT);

    if (pnSecAuthAction(0, 'DonateReg::', '::', ACCESS_READ)) {
        $output->Text("<table border=\"0\" width=\"100%\"><tr bgcolor=\"$bgcolor2\"><td><font class=\"pn-normal\" style=\"text-color:$textcolor1\"><input type=\"checkbox\" name=\"active_eventreg\" id=\"active_eventreg\" value=\"1\" checked>&nbsp;<label for=\"active_eventreg\">"._SEARCH_EVENTREG."</label></font></td></tr></table>");
    }

    return $output->GetOutput();
}

function search_eventreg() {

    list($active_eventreg,
         $startnum,
         $total,
         $bool,
         $q) = pnVarCleanFromInput('active_eventreg',
                                   'startnum',
                                   'total',
                                   'bool',
                                   'q');

    if(empty($active_eventreg)) {
		   return;
    }

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();

    $output = new pnHTML();
    $output->SetInputMode(_PNH_VERBATIMINPUT);

    if (!isset($startnum) || !is_numeric($startnum)) {
        $startnum = 1;
    }
    if (isset($total) && !is_numeric($total)) {
    	unset($total);
    }

    $w = search_split_query($q);
    $flag = false;
    $column = &$pntable['faqanswer_column'];
    $faqcatcol = &$pntable['faqcategories_column'];
    $eventcolumn = pnConfigGetVar('prefix') . '_donate_selections';
    $catcolumn = pnConfigGetVar('prefix') . '_donate_categories';
	$query = "SELECT " . 
				$eventcolumn . ".pn_id as donate_selectionid, " . 
				$eventcolumn . ".pn_name as name, " . 
				$eventcolumn . ".pn_category as catid, " . 
				$eventcolumn . ".pn_event_start as startdate, " .
				$eventcolumn . ".pn_description as description, " .
				$catcolumn . ".pn_name as categoryname
			  FROM " . $eventcolumn ." 
			  JOIN " . $catcolumn . " on " . $eventcolumn . ".pn_category = " . $catcolumn . ".pn_id
			  WHERE pn_event_start >= '" . date("Y-m-d") . "' AND (";
    foreach($w as $word) {
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
        $query .= $eventcolumn . ".pn_name LIKE '$word' OR ";
        $query .= $eventcolumn . ".pn_description LIKE '$word' OR ";
        $query .= $eventcolumn . ".pn_location LIKE '$word')";
        $flag = true;
    }
    $query .= ")
	 ORDER BY pn_event_start asc ";
	//echo $query;
	// get the total count with permissions!
    if (empty($total)) {
		$total = 0;
        $countres = $dbconn->Execute($query);
		while(!$countres->EOF) {
			$row = $countres->GetRowAssoc(false);
            if (pnSecAuthAction(0, 'DonateReg::event', "::$row[donate_selectionid]", ACCESS_READ)) {
				$total++;
			}
			$countres->MoveNext();
		}
    }

    $result = $dbconn->SelectLimit($query, 10, $startnum-1);

    if (!$result->EOF) {
        $output->Text('EVENTS' . ': ' . $total . ' ' . _SEARCHRESULTS);
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        // Rebuild the search string from previous information
        $output->Text("<ul>");
        while(!$result->EOF) {
            $row = $result->GetRowAssoc(false);
            if (pnSecAuthAction(0, 'DonateReg::event', "::$row[donate_selectionid]", ACCESS_READ)) {
//            	$output->Text("<li><a class=\"pn-normal\" href=\"user.php?op=userinfo&amp;uname=$row[uname]&amp;module=NS-User\">$row[uname]</a><br>$row[name]</li>");
			$output->Text('<li>Event Name:');
			$output->URL(pnModURL('eventreg',
                                  'user',
                                  'displayevent',
                                  array('donate_selectionid' => $row['donate_selectionid'])),
                         pnVarPrepForDisplay(pnVarCensor($row['name'])));
			$output->Text("<br>Description:" . $row['description'] . "<br>In Category : ");
			$output->URL(pnModURL('eventreg',
                                  'user',
                                  'viewevents',
                                  array('categoryid' => $row['catid'])),
                         pnVarPrepForDisplay(pnVarCensor($row['categoryname'])));
			$output->Text('</li><br><br>');
			}
            $result->MoveNext();
        }
        $output->Text('</ul>');

        // Munge URL for template
        $urltemplate = $url . "&amp;startnum=%%&amp;total=$total";
        $output->Pager($startnum,
                       $total,
                       $urltemplate,
                       10);
    } else {
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        $output->Text('<font class="pn-normal">'._SEARCH_NO_EVENTS.'</font>');
        $output->SetInputMode(_PNH_PARSEINPUT);
    }
    $output->Linebreak(3);

    return $output->GetOutput();
}
?>
