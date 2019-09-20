<?php
// $Id: coming_events.php,v 1.2 2005/11/07 21:50:04 jazzie Exp $
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
// Purpose of file:  News Module for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'coming_events'; // the name of this php file
	$modversion['mod_name'] = 'PostCalendar'; // the name of the module you are writing this for
	$modversion['multi_output'] = '0'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '1'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.6';
	$modversion['function_name'] = 'coming_events'; // the name of the function listed below
	$modversion['description'] = 'Coming PostCalendar Events'; // brief description of this module
	$modversion['author'] = 'foyleman';
	$modversion['contact'] = 'http://canvas.anubix.net/';


// function named as above, in this case the format is for the HTML part of the mailer

// this plugin module has been specially modified for it's particular features
// and may not be suitable as a template for other plugins

function coming_events_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/coming_events.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
	$mod_data = explode("|", $mod_data);

	if($mod_data[1] == 0) {
		// events happening this week
		$Month=date("m");
		$Day=date("d");
		$Year=date("Y");
		$starting_date = date('m/d/Y',mktime(0,0,0,$Month,$Day,$Year));
		$ending_date   = date('m/d/Y',mktime(0,0,0,$Month,$Day+7,$Year));
		$events = getevents($starting_date, $ending_date, $mod_data[2]);
		if(!$events) {
			// if there is no events to report, then stop
			return;
		}
		// clear the output variable
		// title of the page to show up
		if($mod_data[0] == '') {
			$output = "";
		} else {
			$output ="<b>$mod_data[0]:</b><br><br>\n";
		}
		foreach($events as $event){
			if($events[sharing] = 0) {
				continue;
				}
			$pc_eventid = $event['eid'];
			$pc_catname = $event['eventcatname'];
			$pc_title = stripslashes($event['eventtitle']);
			$pc_hometext = stripslashes($event['eventdesc']);
			$pc_hometext = str_replace(":text:", "", $pc_hometext);
			$linkdate = str_replace("-", "", $event['eventdate']);
			$pc_eventDate = strtotime($event['eventdate']);
			$pc_endDate = strtotime($event['enddate']);
			$locale = pnConfigGetVar('locale');
			setlocale (LC_TIME, '$locale');
			$pc_eventDate = (ml_ftime(_DATEBRIEF, $pc_eventDate));
			$pc_endDate = (ml_ftime(_DATEBRIEF, $pc_endDate));
			$output .= "<b>"._EVENTDATE.":</b> $pc_eventDate";

			if($event['enddate'] != '0000-00-00') {
				$output .= " - $pc_endDate";
				}

			$output .= "<br>\n";
			$output .= "<b>$pc_catname - $pc_title</b>:<br>\n";
			$output .= "$pc_hometext<br>\n";
			$output .= "<a href=\"$nl_url/index.php?module=PostCalendar&func=view&Date=$linkdate&viewtype=details&eid=$pc_eventid&print=\">"._FINDOUTMORE."</a><br><br>\n";
		}
		$output .= "<br>\n";

	} elseif($mod_data[1] == 1) {
		// events occured in the last week
                $Month=date("m");
                $Day=date("d");
                $Year=date("Y");
                $starting_date = date('m/d/Y',mktime(0,0,0,$Month,$Day,$Year));
                $ending_date   = date('m/d/Y',mktime(0,0,0,$Month,$Day-7,$Year));
                $events = getevents($starting_date, $ending_date, $mod_data[2]);
                if(!$events) {
                        // if there is no events to report, then stop
                        return;
                }
                // clear the output variable
                // title of the page to show up
                if($mod_data[0] == '') {
                        $output = "";
                } else {
                        $output ="<b>$mod_data[0]:</b><br><br>\n";
                }
                foreach($events as $event){
						if($events[sharing] = 0) {
							continue;
							}
                        $pc_eventid = $event['eid'];
                        $pc_catname = $event['eventcatname'];
                        $pc_title = stripslashes($event['eventtitle']);
                        $pc_hometext = stripslashes($event['eventdesc']);
                        $pc_hometext = str_replace(":text:", "", $pc_hometext);
                        $linkdate = str_replace("-", "", $event['eventdate']);
                        $pc_eventDate = strtotime($event['eventdate']);
						$pc_endDate = strtotime($event['enddate']);
                        $locale = pnConfigGetVar('locale');
                        setlocale (LC_TIME, '$locale');
						$pc_eventDate = (ml_ftime(_DATEBRIEF, $pc_eventDate));
						$pc_endDate = (ml_ftime(_DATEBRIEF, $pc_endDate));
                        $output .= "<b>"._EVENTDATE.":</b> $pc_eventDate";

						if($event['enddate'] != '0000-00-00') {
							$output .= " - $pc_endDate";
							}

                        $output .= "<br>\n";
                        $output .= "<b>$pc_catname - $pc_title</b>:<br>\n";
                        $output .= "$pc_hometext<br>\n";
                        $output .= "<a href=\"$nl_url/index.php?module=PostCalendar&func=view&Date=$linkdate&viewtype=details&eid=$pc_eventid&print=\">"._FINDOUTMORE."</a><br><br>\n";
                }
		$output .= "<br>\n";
	} elseif($mod_data[1] == 2) {
		// events happening over the next month
                $Month=date("m");
                $Day=date("d");
                $Year=date("Y");
                $starting_date = date('m/d/Y',mktime(0,0,0,$Month,$Day,$Year));
                $ending_date   = date('m/d/Y',mktime(0,0,0,$Month+1,$Day,$Year));
                $events = getevents($starting_date, $ending_date, $mod_data[2]);
                if(!$events) {
                        // if there is no events to report, then stop
                        return;
                }
                // clear the output variable
                // title of the page to show up
                if($mod_data[0] == '') {
                        $output = "";
                } else {
                        $output ="<b>$mod_data[0]:</b><br><br>\n";
                }
                foreach($events as $event){
						if($events[sharing] = 0) {
							continue;
							}
                        $pc_eventid = $event['eid'];
                        $pc_catname = $event['eventcatname'];
                        $pc_title = stripslashes($event['eventtitle']);
                        $pc_hometext = stripslashes($event['eventdesc']);
                        $pc_hometext = str_replace(":text:", "", $pc_hometext);
                        $linkdate = str_replace("-", "", $event['eventdate']);
                        $pc_eventDate = strtotime($event['eventdate']);
						$pc_endDate = strtotime($event['enddate']);
                        $locale = pnConfigGetVar('locale');
                        setlocale (LC_TIME, '$locale');
						$pc_eventDate = (ml_ftime(_DATEBRIEF, $pc_eventDate));
						$pc_endDate = (ml_ftime(_DATEBRIEF, $pc_endDate));
                        $output .= "<b>"._EVENTDATE.":</b> $pc_eventDate";

						if($event['enddate'] != '0000-00-00') {
							$output .= " - $pc_endDate";
							}

                        $output .= "<br>\n";
                        $output .= "<b>$pc_catname - $pc_title</b>:<br>\n";
                        $output .= "$pc_hometext<br>\n";
                        $output .= "<a href=\"$nl_url/index.php?module=PostCalendar&func=view&Date=$linkdate&viewtype=details&eid=$pc_eventid&print=\">"._FINDOUTMORE."</a><br><br>\n";
                }
		$output .= "<br>\n";
	} elseif($mod_data[1] == 3) {
		// events happening over the next 3 months
                $Month=date("m");
                $Day=date("d");
                $Year=date("Y");
		print($todays_date);
                $starting_date = date('m/d/Y',mktime(0,0,0,$Month,$Day,$Year));
                $ending_date   = date('m/d/Y',mktime(0,0,0,$Month+3,$Day,$Year));
                $events = getevents($starting_date, $ending_date, $mod_data[2]);
                if(!$events) {
                        // if there is no events to report, then stop
                        return;
                }
                // clear the output variable
                // title of the page to show up
                if($mod_data[0] == '') {
                        $output = "";
                } else {
                        $output ="<b>$mod_data[0]:</b><br><br>\n";
                }
                foreach($events as $event){
						if($events[sharing] = 0) {
							continue;
							}
                        $pc_eventid = $event['eid'];
                        $pc_catname = $event['eventcatname'];
                        $pc_title = stripslashes($event['eventtitle']);
                        $pc_hometext = stripslashes($event['eventdesc']);
                        $pc_hometext = str_replace(":text:", "", $pc_hometext);
                        $linkdate = str_replace("-", "", $event['eventdate']);
                        $pc_eventDate = strtotime($event['eventdate']);
						$pc_endDate = strtotime($event['enddate']);
                        $locale = pnConfigGetVar('locale');
                        setlocale (LC_TIME, '$locale');
						$pc_eventDate = (ml_ftime(_DATEBRIEF, $pc_eventDate));
						$pc_endDate = (ml_ftime(_DATEBRIEF, $pc_endDate));
                        $output .= "<b>"._EVENTDATE.":</b> $pc_eventDate";

						if($event['enddate'] != '0000-00-00') {
							$output .= " - $pc_endDate";
							}

                        $output .= "<br>\n";
                        $output .= "<b>$pc_catname - $pc_title</b>:<br>\n";
                        $output .= "$pc_hometext<br>\n";
                        $output .= "<a href=\"$nl_url/index.php?module=PostCalendar&func=view&Date=$linkdate&viewtype=details&eid=$pc_eventid&print=\">"._FINDOUTMORE."</a><br><br>\n";
                }
		$output .= "<br>\n";
	}
// strip the slashes out all at once
	$output = stripslashes($output);
// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function coming_events_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/coming_events.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// create the array from the stored variables
	$mod_data = explode("|", $mod_data);

	if($mod_data[1] == 0 OR $mod_data[1] == '') {
                // events happening this week
                $Month=date("m");
                $Day=date("d");
                $Year=date("Y");
                $starting_date = date('m/d/Y',mktime(0,0,0,$Month,$Day,$Year));
                $ending_date   = date('m/d/Y',mktime(0,0,0,$Month,$Day+7,$Year));
                $events = getevents($starting_date, $ending_date, $mod_data[2]);
                if(!$events) {
                        // if there is no events to report, then stop
                        return;
                }
		// clear the output variable
		// title of the page to show up
		if($mod_data[0] == '') {
			$output = "";
		} else {
			$output ="$mod_data[0]:\n\n";
		}
                $output .= "<br>\n";
                foreach($events as $event){
						if($events[sharing] = 0) {
							continue;
							}
                        $pc_eventid = $event['eid'];
                        $pc_catname = $event['eventcatname'];
                        $pc_title = stripslashes($event['eventtitle']);
                        $pc_hometext = stripslashes($event['eventdesc']);
						$pc_hometext = str_replace(":text:", "", $pc_hometext);
                        $linkdate = str_replace("-", "", $event['eventdate']);
						$pc_eventDate = strtotime($event['eventdate']);
						$pc_endDate = strtotime($event['enddate']);
                        $locale = pnConfigGetVar('locale');
                        setlocale (LC_TIME, '$locale');
						$pc_eventDate = (ml_ftime(_DATEBRIEF, $pc_eventDate));
						$pc_endDate = (ml_ftime(_DATEBRIEF, $pc_endDate));
						$output .= ""._EVENTDATE.": $pc_eventDate";

						if($event['enddate'] != '0000-00-00') {
							$output .= " - $pc_endDate";
							}

                        $output .= "\n";
						$output .= "$pc_catname - $pc_title:\n";
						$output .= "$pc_hometext\n";
						$output .= ""._FINDOUTMORE." : $nl_url/index.php?module=PostCalendar&func=view&Date=$linkdate&viewtype=details&eid=$pc_eventid&print=\n\n";
		}
		$output .= "\n";
	} elseif($mod_data[1] == 1) {
		// events added last week
                $Month=date("m");
                $Day=date("d");
                $Year=date("Y");
                $starting_date = date('m/d/Y',mktime(0,0,0,$Month,$Day,$Year));
                $ending_date   = date('m/d/Y',mktime(0,0,0,$Month,$Day-7,$Year));
                $events = getevents($starting_date, $ending_date, $mod_data[2]);
                if(!$events) {
                        // if there is no events to report, then stop
                        return;
                }
                // clear the output variable
                // title of the page to show up
                if($mod_data[0] == '') {
                        $output = "";
                } else {
                        $output ="$mod_data[0]:\n\n";
                }       
                $output .= "<br>\n";
                foreach($events as $event){
						if($events[sharing] = 0) {
							continue;
							}
                        $pc_eventid = $event['eid'];
                        $pc_catname = $event['eventcatname'];
                        $pc_title = stripslashes($event['eventtitle']);
                        $pc_hometext = stripslashes($event['eventdesc']);
                        $pc_hometext = str_replace(":text:", "", $pc_hometext);
                        $linkdate = str_replace("-", "", $event['eventdate']);
                        $pc_eventDate = strtotime($event['eventdate']);
						$pc_endDate = strtotime($event['enddate']);
                        $locale = pnConfigGetVar('locale');
                        setlocale (LC_TIME, '$locale');
						$pc_eventDate = (ml_ftime(_DATEBRIEF, $pc_eventDate));
						$pc_endDate = (ml_ftime(_DATEBRIEF, $pc_endDate));
						$output .= ""._EVENTDATE.": $pc_eventDate";

						if($event['enddate'] != '0000-00-00') {
							$output .= " - $pc_endDate";
							}

                        $output .= "\n";
                        $output .= "$pc_catname - $pc_title:\n";
                        $output .= "$pc_hometext\n";
                        $output .= ""._FINDOUTMORE." : $nl_url/index.php?module=PostCalendar&func=view&Date=$linkdate&viewtype=details&eid=$pc_eventid&print=\n\n";
                }       
		$output .= "\n";
	} elseif($mod_data[1] == 2) {
		// events coming in the next month
                $Month=date("m");
                $Day=date("d");
                $Year=date("Y");
                $starting_date = date('m/d/Y',mktime(0,0,0,$Month,$Day,$Year));
                $ending_date   = date('m/d/Y',mktime(0,0,0,$Month+1,$Day,$Year));
                $events = getevents($starting_date, $ending_date, $mod_data[2]);
                if(!$events) {
                        // if there is no events to report, then stop
                        return;
                }
                // clear the output variable
                // title of the page to show up
                if($mod_data[0] == '') {
                        $output = "";
                } else {
                        $output ="$mod_data[0]:\n\n";
                }       
                $output .= "<br>\n";
                foreach($events as $event){
						if($events[sharing] = 0) {
							continue;
							}
                        $pc_eventid = $event['eid'];
                        $pc_catname = $event['eventcatname'];
                        $pc_title = stripslashes($event['eventtitle']);
                        $pc_hometext = stripslashes($event['eventdesc']);
                        $pc_hometext = str_replace(":text:", "", $pc_hometext);
                        $linkdate = str_replace("-", "", $event['eventdate']);
						$pc_eventDate = strtotime($event['startdate']);
						$pc_endDate = strtotime($event['enddate']);
                        $locale = pnConfigGetVar('locale');
                        setlocale (LC_TIME, '$locale');
						$pc_eventDate = (ml_ftime(_DATEBRIEF, $pc_eventDate));
						$pc_endDate = (ml_ftime(_DATEBRIEF, $pc_endDate));
						$output .= ""._EVENTDATE.": $pc_eventDate";

						if($event['enddate'] != '0000-00-00') {
							$output .= " - $pc_endDate";
							}

                        $output .= "\n";
                        $output .= "$pc_catname - $pc_title:\n";
                        $output .= "$pc_hometext\n";
                        $output .= ""._FINDOUTMORE." : $nl_url/index.php?module=PostCalendar&func=view&Date=$linkdate&viewtype=details&eid=$pc_eventid&print=\n\n";
                }       
		$output .= "\n";
	} elseif($mod_data[1] == 3) {
		// events coming in the next 3 months
                $Month=date("m");
                $Day=date("d");
                $Year=date("Y");
                $starting_date = date('m/d/Y',mktime(0,0,0,$Month,$Day,$Year));
                $ending_date   = date('m/d/Y',mktime(0,0,0,$Month+3,$Day,$Year));
                $events = getevents($starting_date, $ending_date, $mod_data[2]);
                if(!$events) {
                        // if there is no events to report, then stop
                        return;
                }
                // clear the output variable
                // title of the page to show up
                if($mod_data[0] == '') {
                        $output = "";
                } else {
                        $output ="$mod_data[0]:\n\n";
                }       
                $output .= "<br>\n";
                foreach($events as $event){
						if($events[sharing] = 0) {
							continue;
							}
                        $pc_eventid = $event['eid'];
                        $pc_catname = $event['eventcatname'];
                        $pc_title = stripslashes($event['eventtitle']);
                        $pc_hometext = stripslashes($event['eventdesc']);
                        $pc_hometext = str_replace(":text:", "", $pc_hometext);
                        $linkdate = str_replace("-", "", $event['eventdate']);
                        $pc_eventDate = strtotime($event['eventdate']);
						$pc_endDate = strtotime($event['enddate']);
                        $locale = pnConfigGetVar('locale');
                        setlocale (LC_TIME, '$locale');
						$pc_eventDate = (ml_ftime(_DATEBRIEF, $pc_eventDate));
						$pc_endDate = (ml_ftime(_DATEBRIEF, $pc_endDate));
						$output .= ""._EVENTDATE.": $pc_eventDate";

						if($event['enddate'] != '0000-00-00') {
							$output .= " - $pc_endDate";
							}

                        $output .= "\n";
                        $output .= "$pc_catname - $pc_title:\n";
                        $output .= "$pc_hometext\n";
                        $output .= ""._FINDOUTMORE." : $nl_url/index.php?module=PostCalendar&func=view&Date=$linkdate&viewtype=details&eid=$pc_eventid&print=\n\n";
                }
	}

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function coming_events_admin($mod_id, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/coming_events.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);
	
// strip the slashes out all at once
	$mod_data = stripslashes($mod_data);

// create the array from the stored variables
	$mod_data = explode("|", $mod_data);


// the admin part
	$locale = pnConfigGetVar('locale');
	setlocale (LC_TIME, '$locale');
	echo "<table cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><b>"._HEADING.":</b></td>\n"
		."<td class=\"pn-normal\"><input type=\"text\" name=\"mod_data[0]\" value=\"$mod_data[0]\"></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><input type=\"radio\" name=\"mod_data[1]\" value=\"0\"";

	if($mod_data[1] == 0 OR $mod_data[1] == '') {
		echo " checked";
		}

	echo "></td>\n"
		."<td class=\"pn-normal\"><b>"._EVENTSTHISWEEK."</b></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><input type=\"radio\" name=\"mod_data[1]\" value=\"1\"";

	if($mod_data[1] == 1) {
		echo " checked";
		}

	echo ">";

	$sql = mysql_query("SELECT arch_date FROM $prefix"._nl_archive."");
	$none_sent = mysql_num_rows($sql);
	if($none_sent == 0) {
		echo "<font color=\"#FF0000\">"._NOTRECOMMENDED."</font>";
		}

	echo "</td>\n"
		."<td class=\"pn-normal\"><b>"._EVENTSADDEDLASTWEEK."</b></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><input type=\"radio\" name=\"mod_data[1]\" value=\"2\"";

	if($mod_data[1] == 2) {
		echo " checked";
		}

	echo "></td>\n"
		."<td class=\"pn-normal\"><b>"._EVENTSTHISMONTH."</b></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><input type=\"radio\" name=\"mod_data[1]\" value=\"3\"";

	if($mod_data[1] == 3) {
		echo " checked";
		}


	echo "></td>\n"
		."<td class=\"pn-normal\"><b>"._EVENTSTHISQUARTER."</b></td>\n"
		."</tr>\n"
		."<tr>\n"
		."<td align=\"right\" class=\"pn-normal\"><input type=\"checkbox\" name=\"mod_data[2]\" value=\"1\"";

	if($mod_data[2] == 1) {
		echo " checked";
		}


	echo "></td>\n"
		."<td class=\"pn-normal\"><b>"._EVENTSONLYONCE."</b></td>\n"
		."</tr>\n"
		."</table>\n\n";
// send the mod_data to the system (it must be mod_data and not another variable name)
	return $mod_data;
}

function getevents($starting_date, $ending_date, $once){
	if (!pnModAPILoad('PostCalendar', 'user')) {
		echo "Failed to load PostCalenar API";
	}	
        $days = pnModAPIFunc('PostCalendar','user','pcGetEvents',array('start'=>$starting_date,'end'=>$ending_date));
        $days = array_filter($days, "filterevents");

	$eid_list = array();

	// Loop through each event day and store it in a return array.
	foreach ($days as $events) {
		foreach($events as $event){

			if($once == 1) {

				if(!in_array($event[eid], $eid_list)) {
					$eid_list[] = $event[eid];
					$returndata[] = array('eventdate'=>$event['eventDate'],'eid'=>$event['eid'],'eventtitle'=>$event['title'],'eventdesc'=>$event['hometext'],'eventcatname'=>$event['catname'],'sharing'=>$event['sharing'], 'enddate'=>$event['endDate']);
					}

				} else {

				$returndata[] = array('eventdate'=>$event['eventDate'],'eid'=>$event['eid'],'eventtitle'=>$event['title'],'eventdesc'=>$event['hometext'],'eventcatname'=>$event['catname'],'sharing'=>$event['sharing'], 'enddate'=>$event['endDate']);

				}

		}
	}

	return $returndata;
}

function filterevents($var){
	return($var);
}
?>
