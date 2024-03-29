<?php
@define('__POSTCALENDAR__','PostCalendar');
/**
 *  $Id: pnuser.php,v 1.4 2004/08/19 19:16:06 larsneo Exp $
 *
 *  PostCalendar::PostNuke Events Calendar Module
 *  Copyright (C) 2002  The PostCalendar Team
 *  http://postcalendar.tv
 *  
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *  
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 *  To read the license please read the docs/license.txt or visit
 *  http://www.gnu.org/copyleft/gpl.html
 *
 */

//=========================================================================
//  Load the API Functions and Language defines
//=========================================================================
pnModAPILoad(__POSTCALENDAR__,'user');

//=========================================================================
//  start the main postcalendar application
//=========================================================================
function postcalendar_user_main()
{
    // check the authorization
    
    if (!pnSecAuthAction(0, 'PostCalendar::', '::', ACCESS_OVERVIEW))
     { return _POSTCALENDARNOAUTH; } 
    // get the date and go to the view function
    $Date = postcalendar_getDate();
    return postcalendar_user_view(array('Date'=>$Date));
}


/**
 * view items
 * This is a standard function to provide an overview of all of the items
 * available from the module.
 */
function postcalendar_user_view()
{
    if (!pnSecAuthAction(0, 'PostCalendar::', '::', ACCESS_OVERVIEW)) { return _POSTCALENDARNOAUTH; }
    
    // get the vars that were passed in
    list($Date,
         $print,
		 $viewtype,
         $jumpday,
         $jumpmonth,
         $jumpyear) = pnVarCleanFromInput('Date',
		                                  'print',
                                          'viewtype',
                                          'jumpday',
                                          'jumpmonth',
                                          'jumpyear');
    
    $Date =& postcalendar_getDate();
    if(!isset($viewtype))   $viewtype = _SETTING_DEFAULT_VIEW;
    return postcalendar_user_display(array('viewtype'=>$viewtype,'Date'=>$Date,'print'=>$print)) . postcalendar_footer();
}

/**
 * display item
 * This is a standard function to provide detailed information on a single item
 * available from the module.
 */
function postcalendar_user_display($args)
{
    list($eid, $viewtype, $tplview,
		 $pc_username, $Date, $print, $category, $topic) = pnVarCleanFromInput('eid', 'viewtype', 'tplview', 
		                                                 'pc_username', 'Date', 'print', 'pc_category', 'pc_topic');
	
	extract($args);
    if(empty($Date) && empty($viewtype)) {
        return false;
    }
	if(empty($tplview)) $tplview = 'default';
    $uid = pnUserGetVar('uid');
	$theme = pnUserGetTheme();
	
	$cacheid = md5($Date.$viewtype.$tplview._SETTING_TEMPLATE.$eid.$print.$uid.'u'.$pc_username.$theme.'c'.$category.'t'.$topic);
	
	switch ($viewtype) 
    {
        case 'details':
            if (!(bool)PC_ACCESS_READ) {
				return _POSTCALENDARNOAUTH;
    		}
			$event = pnModAPIFunc('PostCalendar','user','eventDetail',array('eid'=>$eid,
																		   'Date'=>$Date,
																		   'print'=>$print,
																		   'cacheid'=>$cacheid));
			if($event === false) { 
				pnRedirect(pnModURL(__POSTCALENDAR__,'user'));
			}
			$out  = "\n\n<!-- START user_display -->\n\n";
            $out .= $event;
			$out .= "\n\n<!-- END user_display -->\n\n";
            break;

		default :
            if (!(bool)PC_ACCESS_OVERVIEW) {
        		return _POSTCALENDARNOAUTH;
    		}
			$out  = "\n\n<!-- START user_display -->\n\n";
            $out .= pnModAPIFunc('PostCalendar','user','buildView',array('Date'=>$Date,
			                                                			 'viewtype'=>$viewtype,
																		 'cacheid'=>$cacheid));
            $out .= "\n\n<!-- END user_display -->\n\n";
            break;
    }
    // Return the output that has been generated by this function
    return $out;
}
function postcalendar_user_delete()
{
    if(!(bool)PC_ACCESS_ADD) {
        return _POSTCALENDAR_NOAUTH;
    }
	
	$output =& new pnHTML();
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    
	$uname = pnUserGetVar('uname');
    list($action,$pc_event_id) = pnVarCleanFromInput('action','pc_event_id');
    $event =& postcalendar_userapi_pcGetEventDetails($pc_event_id);
	if($uname != $event['uname']) {
		return _PC_CAN_NOT_DELETE;
	}
	unset($event);
	
	// delete form fixed by --Roger Clermont 7/8/04 <roger_c_clermont@yahoo.com>
    $output->FormStart(pnModUrl(__POSTCALENDAR__,'user','deleteevents'));
    $output->FormHidden('pc_eid',$pc_event_id);
	$output->Text(_PC_DELETE_ARE_YOU_SURE.' ');
    $output->FormSubmit(_PC_ADMIN_YES);
	$output->FormEnd();
    $output->Linebreak(2);
    $output->Text(pnModAPIFunc(__POSTCALENDAR__,'user','eventDetail',array('eid'=>$pc_event_id,'cacheid'=>'','print'=>0,'Date'=>'')));
    $output->Linebreak(2);
	$output->FormStart(pnModUrl(__POSTCALENDAR__,'user','deleteevents'));
    $output->FormHidden('pc_eid',$pc_event_id);
	$output->Text(_PC_DELETE_ARE_YOU_SURE.' ');
    $output->FormSubmit(_PC_ADMIN_YES);
    $output->FormEnd();
    
	return $output->GetOutput();
}
function postcalendar_user_deleteevents()
{
    if(!(bool)PC_ACCESS_ADD) {
        return _POSTCALENDAR_NOAUTH;
    }
	
	$uname = pnUserGetVar('uname');
	$pc_eid = pnVarCleanFromInput('pc_eid');
	$event =& postcalendar_userapi_pcGetEventDetails($pc_eid);
	if($uname != $event['uname']) {
		return _PC_CAN_NOT_DELETE;
	}
	unset($event);
	
    $output =& new pnHTML();
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();
    $events_table = $pntable['postcalendar_events'];
    $events_column = &$pntable['postcalendar_events_column'];
    
    $sql = "DELETE FROM $events_table WHERE $events_column[eid] = '".(int)pnVarPrepForStore($pc_eid)."'";

    $dbconn->Execute($sql);
    if ($dbconn->ErrorNo() != 0) {
        $output->Text(_PC_ADMIN_EVENT_ERROR);
    } else {
        $output->Text(_PC_ADMIN_EVENTS_DELETED);
    }
    
	// clear the template cache
	$tpl =& new pcSmarty();
	$tpl->clear_all_cache();
    return $output->GetOutput(); 
}

/**
 * submit an event
 */
function postcalendar_user_edit($args) {return postcalendar_user_submit($args); }
function postcalendar_user_submit($args)
{   
    // We need at least ADD permission to submit an event
    if (!(bool)PC_ACCESS_ADD) {
        return _POSTCALENDARNOAUTH;
    }
	
	$output =& new pnHTML();
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    
	// get the theme globals :: is there a better way to do this?
    pnThemeLoad(pnUserGetTheme());
    global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $textcolor1, $textcolor2;
    
	extract($args);
	
	$Date =& postcalendar_getDate();
	$year   = substr($Date,0,4);
    $month  = substr($Date,4,2);
    $day    = substr($Date,6,2);
    
	// basic event information
	$event_subject  	= pnVarCleanFromInput('event_subject');
	$event_desc 		= pnVarCleanFromInput('event_desc');
	$event_sharing  	= pnVarCleanFromInput('event_sharing');
	$event_category 	= pnVarCleanFromInput('event_category');
	$event_topic 		= pnVarCleanFromInput('event_topic');
	
	// event start information
	$event_startmonth 	= pnVarCleanFromInput('event_startmonth');
	$event_startday 	= pnVarCleanFromInput('event_startday');
	$event_startyear 	= pnVarCleanFromInput('event_startyear');
	$event_starttimeh	= pnVarCleanFromInput('event_starttimeh');
	$event_starttimem 	= pnVarCleanFromInput('event_starttimem');
	$event_startampm 	= pnVarCleanFromInput('event_startampm');
	
	// event end information
	$event_endmonth 	= pnVarCleanFromInput('event_endmonth');
	$event_endday 		= pnVarCleanFromInput('event_endday');
	$event_endyear  	= pnVarCleanFromInput('event_endyear');
	$event_endtype  	= pnVarCleanFromInput('event_endtype');
	$event_dur_hours 	= pnVarCleanFromInput('event_dur_hours');
	$event_dur_minutes  = pnVarCleanFromInput('event_dur_minutes');
	$event_duration 	= (60*60*$event_dur_hours) + (60*$event_dur_minutes);
	$event_allday 		= pnVarCleanFromInput('event_allday');
	
	// location data
	$event_location 	= pnVarCleanFromInput('event_location');
	$event_street1  	= pnVarCleanFromInput('event_street1');
	$event_street2  	= pnVarCleanFromInput('event_street2');
	$event_city 		= pnVarCleanFromInput('event_city');
	$event_state 		= pnVarCleanFromInput('event_state');
	$event_postal 		= pnVarCleanFromInput('event_postal');
	$event_location_info = serialize(compact('event_location', 'event_street1', 'event_street2',
                                             'event_city', 'event_state', 'event_postal'));
	// contact data
	$event_contname 	= pnVarCleanFromInput('event_contname');
	$event_conttel  	= pnVarCleanFromInput('event_conttel');
	$event_contemail 	= pnVarCleanFromInput('event_contemail');
	$event_website  	= pnVarCleanFromInput('event_website');
	$event_fee  		= pnVarCleanFromInput('event_fee');
	
	// event repeating data
	$event_repeat 		= pnVarCleanFromInput('event_repeat');
	$event_repeat_freq  = pnVarCleanFromInput('event_repeat_freq');
	$event_repeat_freq_type = pnVarCleanFromInput('event_repeat_freq_type');
	$event_repeat_on_num = pnVarCleanFromInput('event_repeat_on_num');
	$event_repeat_on_day = pnVarCleanFromInput('event_repeat_on_day');
	$event_repeat_on_freq = pnVarCleanFromInput('event_repeat_on_freq');
	$event_recurrspec = serialize(compact('event_repeat_freq', 'event_repeat_freq_type', 'event_repeat_on_num',
                                          'event_repeat_on_day', 'event_repeat_on_freq'));
	
	$form_action = pnVarCleanFromInput('form_action');
	$pc_html_or_text = pnVarCleanFromInput('pc_html_or_text');
    $pc_event_id = pnVarCleanFromInput('pc_event_id');
	$data_loaded = pnVarCleanFromInput('data_loaded');
    $is_update   = pnVarCleanFromInput('is_update');
	$authid      = pnVarCleanFromInput('authid');
	
	if(pnUserLoggedIn()) { $uname = pnUserGetVar('uname'); } 
    else { $uname = pnConfigGetVar('anonymous'); }
    if(!isset($event_repeat)) { $event_repeat = 0; }
    
	if(!isset($pc_event_id) || empty($pc_event_id) || $data_loaded) {
		// lets wrap all the data into array for passing to submit and preview functions
		$eventdata = compact('event_subject','event_desc','event_sharing','event_category','event_topic',
		'event_startmonth','event_startday','event_startyear','event_starttimeh','event_starttimem','event_startampm',
		'event_endmonth','event_endday','event_endyear','event_endtype','event_dur_hours','event_dur_minutes',
		'event_duration','event_allday','event_location','event_street1','event_street2','event_city','event_state',
		'event_postal','event_location_info','event_contname','event_conttel','event_contemail',
		'event_website','event_fee','event_repeat','event_repeat_freq','event_repeat_freq_type',
		'event_repeat_on_num','event_repeat_on_day','event_repeat_on_freq','event_recurrspec','uname',
		'Date','year','month','day','pc_html_or_text');
		$eventdata['is_update'] = $is_update;
		$eventdata['pc_event_id'] = $pc_event_id;
		$eventdata['data_loaded'] = true;
	} else {
		$event =& postcalendar_userapi_pcGetEventDetails($pc_event_id);
		if($uname != $event['uname']) {
			return _PC_CAN_NOT_EDIT;
		}
		$eventdata['event_subject'] = $event['title'];
		$eventdata['event_desc'] = $event['hometext'];
		$eventdata['event_sharing'] = $event['sharing'];
		$eventdata['event_category'] = $event['catid'];
		$eventdata['event_topic'] = $event['topic'];
		$eventdata['event_startmonth'] = substr($event['eventDate'],5,2);
		$eventdata['event_startday'] = substr($event['eventDate'],8,2);
		$eventdata['event_startyear'] = substr($event['eventDate'],0,4);
		$eventdata['event_starttimeh'] = substr($event['startTime'],0,2);
		$eventdata['event_starttimem'] = substr($event['startTime'],3,2);
		$eventdata['event_startampm'] = $eventdata['event_starttimeh'] < 12 ? _PC_AM : _PC_PM ;
		$eventdata['event_endmonth'] = substr($event['endDate'],5,2);
		$eventdata['event_endday'] = substr($event['endDate'],8,2);
		$eventdata['event_endyear'] = substr($event['endDate'],0,4);
		$eventdata['event_endtype'] = $event['endDate'] == '0000-00-00' ? '0' : '1' ;
		$eventdata['event_dur_hours'] = $event['duration_hours'];
		$eventdata['event_dur_minutes'] = $event['duration_minutes'];
		$eventdata['event_duration'] = $event['duration'];
		$eventdata['event_allday'] = $event['alldayevent'];
		$loc_data = unserialize($event['location']);
		$eventdata['event_location'] = $loc_data['event_location'];
		$eventdata['event_street1'] = $loc_data['event_street1'];
		$eventdata['event_street2'] = $loc_data['event_street2'];
		$eventdata['event_city'] = $loc_data['event_city'];
		$eventdata['event_state'] = $loc_data['event_state'];
		$eventdata['event_postal'] = $loc_data['event_postal'];
		$eventdata['event_location_info'] = $loc_data;
		$eventdata['event_contname'] = $event['contname'];
		$eventdata['event_conttel'] = $event['conttel'];
		$eventdata['event_contemail'] = $event['contemail'];
		$eventdata['event_website'] = $event['website'];
		$eventdata['event_fee'] = $event['fee'];
		$eventdata['event_repeat'] = $event['recurrtype'];
		$rspecs = unserialize($event['recurrspec']);
		$eventdata['event_repeat_freq'] = $rspecs['event_repeat_freq'];
		$eventdata['event_repeat_freq_type'] = $rspecs['event_repeat_freq_type'];
		$eventdata['event_repeat_on_num'] = $rspecs['event_repeat_on_num'];
		$eventdata['event_repeat_on_day'] = $rspecs['event_repeat_on_day'];
		$eventdata['event_repeat_on_freq'] = $rspecs['event_repeat_on_freq'];
		$eventdata['event_recurrspec'] = $rspecs;
		$eventdata['uname'] = $uname;
		$eventdata['Date'] = $Date;
		$eventdata['year'] = $year;
		$eventdata['month'] = $month;
		$eventdata['day'] = $day;
		$eventdata['is_update'] = true;
		$eventdata['pc_event_id'] = $pc_event_id;
		$eventdata['data_loaded'] = true;
		$eventdata['pc_html_or_text'] = $pc_html_or_text;
	}
	
	// lets get the module's information
    //$modinfo = pnModGetInfo(pnModGetIDFromName(__POSTCALENDAR__));
    $categories = pnModAPIFunc(__POSTCALENDAR__,'user','getCategories');
	$output->tabindex=1;
	
	
	//================================================================
	//	ERROR CHECKING
	//================================================================
    $required_vars = array('event_subject','event_desc');
    $required_name = array(_PC_EVENT_TITLE,_PC_EVENT_DESC);
    $error_msg = '';
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $reqCount = count($required_vars);
    for ($r=0; $r<$reqCount; $r++) {
        if(empty($$required_vars[$r]) || !preg_match('/\S/i',$$required_vars[$r])) {
            $error_msg .= $output->Text('<b>'.$required_name[$r].'</b> '._PC_SUBMIT_ERROR4);
            $error_msg .= $output->Linebreak(); 
        }
    }
	unset($reqCount);
	// check repeating frequencies
	if($event_repeat == REPEAT) {
		if(!isset($event_repeat_freq) ||  $event_repeat_freq < 1 || empty($event_repeat_freq)) {
			$error_msg .= $output->Text(_PC_SUBMIT_ERROR5);
        	$error_msg .= $output->Linebreak(); 
		} elseif(!is_numeric($event_repeat_freq)) {
			$error_msg .= $output->Text(_PC_SUBMIT_ERROR6);
        	$error_msg .= $output->Linebreak();
		}
	} elseif($event_repeat == REPEAT_ON) {
		if(!isset($event_repeat_on_freq) || $event_repeat_on_freq < 1 || empty($event_repeat_on_freq)) {
			$error_msg .= $output->Text(_PC_SUBMIT_ERROR5);
        	$error_msg .= $output->Linebreak(); 
		} elseif(!is_numeric($event_repeat_on_freq)) {
			$error_msg .= $output->Text(_PC_SUBMIT_ERROR6);
        	$error_msg .= $output->Linebreak();
		}
	}
	// check date validity
    if(_SETTING_TIME_24HOUR) {
        $startTime = $event_starttimeh.':'.$event_starttimem;
        $endTime =   $event_endtimeh.':'.$event_endtimem;
    } else {
        if($event_startampm == _AM_VAL) {
            $event_starttimeh = $event_starttimeh == 12 ? '00' : $event_starttimeh;
        } else {
            $event_starttimeh =  $event_starttimeh != 12 ? $event_starttimeh+=12 : $event_starttimeh;
        }
        $startTime = $event_starttimeh.':'.$event_starttimem;
    }
    $sdate = strtotime($event_startyear.'-'.$event_startmonth.'-'.$event_startday);
    $edate = strtotime($event_endyear.'-'.$event_endmonth.'-'.$event_endday);
    $tdate = strtotime(date('Y-m-d'));
    if($edate < $sdate && $event_endtype == 1) {
        $error_msg .= $output->Text(_PC_SUBMIT_ERROR1);
        $error_msg .= $output->Linebreak(); 
    }
    if(!checkdate($event_startmonth,$event_startday,$event_startyear)) {
        $error_msg .= $output->Text(_PC_SUBMIT_ERROR2);
        $error_msg .= $output->Linebreak(); 
    }
    if(!checkdate($event_endmonth,$event_endday,$event_endyear)) {
        $error_msg .= $output->Text(_PC_SUBMIT_ERROR3); 
        $error_msg .= $output->Linebreak();
    }
	$output->SetOutputMode(_PNH_KEEPOUTPUT);
	
	if($form_action == 'preview') {
        //================================================================
		//	Preview the event
		//================================================================
		// check authid
        if (!pnSecConfirmAuthKey()) { return(_NO_DIRECT_ACCESS); }
        if(!empty($error_msg)) {
            $preview = false;
            $output->Text('<table border="0" width="100%" cellpadding="1" cellspacing="0"><tr><td bgcolor="red">');
            $output->Text('<table border="0" width="100%" cellpadding="1" cellspacing="0"><tr><td bgcolor="pink">');
                $output->Text('<center><b>'._PC_SUBMIT_ERROR.'</b></center>'); 
                $output->Linebreak();
                $output->Text($error_msg);
            $output->Text('</td></td></table>');
            $output->Text('</td></td></table>');
            $output->Linebreak(2);
        } else {
            $output->Text(pnModAPIFunc(__POSTCALENDAR__,'user','eventPreview',$eventdata));
			$output->Linebreak();
        }
    } elseif($form_action == 'commit') {
		//================================================================
		//	Enter the event into the DB
		//================================================================
		if (!pnSecConfirmAuthKey()) { return(_NO_DIRECT_ACCESS); }
		if(!empty($error_msg)) {
            $preview = false;
            $output->Text('<table border="0" width="100%" cellpadding="1" cellspacing="0"><tr><td bgcolor="red">');
            $output->Text('<table border="0" width="100%" cellpadding="1" cellspacing="0"><tr><td bgcolor="pink">');
                $output->Text('<center><b>'._PC_SUBMIT_ERROR.'</b></center>'); 
                $output->Linebreak();
                $output->Text($error_msg);
            $output->Text('</td></tr></table>');
            $output->Text('</td></tr></table>');
            $output->Linebreak(2);
        } else {
            if (!pnModAPIFunc(__POSTCALENDAR__,'user','submitEvent',$eventdata)) {
        		$output->Text('<center><div style="padding:5px; border:1px solid red; background-color: pink;">');		
				$output->Text("<b>"._PC_EVENT_SUBMISSION_FAILED."</b>");		
				$output->Text('</div></center><br />');	
				$output->Linebreak();
        		$output->Text($dbconn->ErrorMsg());
    		} else {
        		// clear the Smarty cache
				$tpl =& new pcSmarty();
				$tpl->clear_all_cache();
				$output->Text('<center><div style="padding:5px; border:1px solid green; background-color: lightgreen;">');		
				if($is_update) {
					$output->Text("<b>"._PC_EVENT_EDIT_SUCCESS."</b>");		
				} else {
					$output->Text("<b>"._PC_EVENT_SUBMISSION_SUCCESS."</b>");		
				}
				$output->Text('</div></center><br />');	
				$output->Linebreak();
        		// clear the form vars
        		$event_subject=$event_desc=$event_sharing=$event_category=$event_topic=
				$event_startmonth=$event_startday=$event_startyear=$event_starttimeh=$event_starttimem=$event_startampm=
				$event_endmonth=$event_endday=$event_endyear=$event_endtype=$event_dur_hours=$event_dur_minutes=
				$event_duration=$event_allday=$event_location=$event_street1=$event_street2=$event_city=$event_state=
				$event_postal=$event_location_info=$event_contname=$event_conttel=$event_contemail=
				$event_website=$event_fee=$event_repeat=$event_repeat_freq=$event_repeat_freq_type=
				$event_repeat_on_num=$event_repeat_on_day=$event_repeat_on_freq=$event_recurrspec=$uname=
				$Date=$year=$month=$day=$pc_html_or_text=null;
				$is_update = false;
				$pc_event_id = 0;
				// lets wrap all the data into array for passing to submit and preview functions
				$eventdata = compact('event_subject','event_desc','event_sharing','event_category','event_topic',
				'event_startmonth','event_startday','event_startyear','event_starttimeh','event_starttimem','event_startampm',
				'event_endmonth','event_endday','event_endyear','event_endtype','event_dur_hours','event_dur_minutes',
				'event_duration','event_allday','event_location','event_street1','event_street2','event_city','event_state',
				'event_postal','event_location_info','event_contname','event_conttel','event_contemail',
				'event_website','event_fee','event_repeat','event_repeat_freq','event_repeat_freq_type',
				'event_repeat_on_num','event_repeat_on_day','event_repeat_on_freq','event_recurrspec','uname',
				'Date','year','month','day','pc_html_or_text','is_update','pc_event_id');
			}
        }
	}

    $output->Text(pnModAPIFunc('PostCalendar','user','buildSubmitForm',$eventdata));
	return $output->GetOutput();
}

/**
 * search events
 */
function postcalendar_user_search()
{   
    // We need at least ADD permission to submit an event
    if (!(bool)PC_ACCESS_OVERVIEW) {
        return _POSTCALENDARNOAUTH;
    }
	
    $tpl =& new pcSmarty();
	
    $k = pnVarCleanFromInput('pc_keywords');
    $k_andor = pnVarCleanFromInput('pc_keywords_andor');
	$pc_category = pnVarCleanFromInput('pc_category');
	$pc_topic = pnVarCleanFromInput('pc_topic');
	$submit = pnVarCleanFromInput('submit');
	
	$categories = postcalendar_userapi_getCategories();
	$cat_options = '';
	foreach($categories as $category) {
		$cat_options .= "<option value=\"$category[id]\">$category[name]</option>";
	}
	$tpl->assign_by_ref('CATEGORY_OPTIONS',$cat_options);
	
	if(_SETTING_DISPLAY_TOPICS) {
		$topics = postcalendar_userapi_getTopics();
		$top_options = '';
		foreach($topics as $topic) {
			if ($topic[text]!="") {
			    $top_options .= "<option value=\"$topic[id]\">$topic[text]</option>";
			}
		}
		$tpl->assign_by_ref('TOPIC_OPTIONS',$top_options);
	}
	//=================================================================
    //  Find out what Template we're using    
	//=================================================================
    $template_name = _SETTING_TEMPLATE;
    if(!isset($template_name)) {
    	$template_name = 'default';
    }
	//=================================================================
    //  Output the search form
	//=================================================================
	$tpl->assign('FORM_ACTION',pnModURL(__POSTCALENDAR__,'user','search'));
	//=================================================================
    //  Perform the search if we have data
	//=================================================================
	if(!empty($submit)) {
		$sqlKeywords = '';
		$keywords = explode(' ',$k);
		// build our search query
		foreach($keywords as $word) {
			if(!empty($sqlKeywords)) $sqlKeywords .= " $k_andor ";
			$word = pnVarPrepForStore($word);
			$sqlKeywords .= '(';
			$sqlKeywords .= "a.pc_title LIKE '%$word%' OR ";
			$sqlKeywords .= "a.pc_hometext LIKE '%$word%' OR ";
			$sqlKeywords .= "a.pc_location LIKE '%$word%'";
			$sqlKeywords .= ') ';
		}
		
		if(!empty($pc_category)) {
			$pc_category = pnVarPrepForStore($pc_category);
			$s_category = "a.pc_catid = '$pc_category'";
		}
		
		if(!empty($pc_topic)) {
			$pc_topic = pnVarPrepForStore($pc_topic);
			$s_topic = "a.pc_topic = '$pc_topic'";
		}
		
		$searchargs = array();
		if(!empty($sqlKeywords)) $searchargs['s_keywords'] = $sqlKeywords;
		if(!empty($s_category)) $searchargs['s_category'] = $s_category;
		if(!empty($s_topic)) $searchargs['s_topic'] = $s_topic;
		
		$eventsByDate =& postcalendar_userapi_pcGetEvents($searchargs);
		$tpl->assign('SEARCH_PERFORMED',true);
		$tpl->assign('A_EVENTS',$eventsByDate);
	}
	$tpl->caching = false;
	$pageSetup =& pnModAPIFunc(__POSTCALENDAR__,'user','pageSetup');
	return $pageSetup . $tpl->fetch($template_name.'/user/search.html');
}

?>
