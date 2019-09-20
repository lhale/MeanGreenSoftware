<?php
// $Id: newmembers.php,v 1.1 2005/10/27 21:05:58 bamm Exp $
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
// Purpose of file:  Subjects Module for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'newmembers'; // the name of this php file
	$modversion['mod_name'] = 'NewMembers'; // the name of the module you are writing this for
	$modversion['multi_output'] = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '0'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.2';
	$modversion['function_name'] = 'newest_members'; // the name of the function listed below
	$modversion['description'] = 'Newest Members'; // brief description of this module
	$modversion['author'] = 'rudyvarner';
	$modversion['contact'] = 'http://www.planetrockabilly.com/';


// function named as above, in this case the format is for the HTML part of the mailer

function newest_members_html($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/newmembers.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// clear the output variable
// title of the page to show up
	$output = "<b>"._NEWMEMBERS.":</b><br><br>\n";

// query the database and generate your output in the amount of mod_qty
	
$dbconn =& pnDBGetConn(true);
     $pntable =& pnDBGetTables();
$result = mysql_query("select pn_uname, pn_uid, pn_user_avatar from $pntable[users] order by pn_uid DESC limit 0,$mod_qty");
$output.="<center><font size=\"2\">"._GREETINGSX1." <b>$mod_qty</b> "._GREETINGSX2." </font></center><table width=100% cellpadding=0 cellspacing=0>";
while (list($uname, $uid, $avatar) = mysql_fetch_row($result)) {

$output.= "<tr><td width=10><img src=\"$nl_url/modules/$ModName/modules/images/newmembers/arrow_b.gif\" > </td><td><font size=\"2\"><a class=\"pn-normal\" href=\"$nl_url/user.php?op=userinfo&uname=$uname\"><b> $uname</b></a></font></td> \n";

 $newresult = mysql_query("select pn_user_regdate from $pntable[users] where pn_uid=$uid");
	    list($user_regdate)=mysql_fetch_row($newresult);
		    
		    	   
	 // put registration date in UNIX epoch seconds 
$datereg = date("U",$user_regdate); 
// convert registration time into days 
$datereg = intval($datereg / 60 / 60 / 24); 
// get current time in UNIX epoch seconds 
$datenow = time(); 
// convert current time into days 
$datenow = intval($datenow / 60 / 60 / 24); 
// how long ago did the user register? 
$old = $datenow - $datereg; 
	      
	    	    if ($old == 0) {
			$output.= " <td align=left><img src=\"$nl_url/modules/$ModName/modules/images/newmembers/new_1.gif\" alt=\""._NEWTODAY."\"></td>";
		    }
	            if ($old > 0  && $old <= 3) {
			$output.= "<td align=left><img src=\"$nl_url/modules/$ModName/modules/images/newmembers/new_3.gif\" alt=\""._NEWLAST3DAYS."\"></td>";
		    }
	            if ($old > 3 && $old <= 7) {
			$output.= "<td align=left><img src=\"$nl_url/modules/$ModName/modules/images/newmembers/new_7.gif\" alt=\""._NEWTHISWEEK."\"></td>";
		    }
	            if ($old <= 14 && $old > 7) {
			$output.= "<td align=left><img src=\"$nl_url/modules/$ModName/modules/images/newmembers/new_2.gif\" alt=\""._NEW." "._LAST." "._2WEEKS."\"></td>";
		    }
		    	   
$output.= "<tr><td></td><td colspan=2><font size=1>".date("m/d/Y H:i",$user_regdate)."</font></td></tr>"; 
}
$output.="</table><hr width=\"100%\" noshade color=\"black\" size=\"1\"><br>";

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function newest_members_text($mod_id, $nl_url, $ModName) {
	global $prefix, $pntable;
	$dbconn =& pnDBGetConn(true);
	        $pntable =& pnDBGetTables();

	$language = pnConfigGetVar('language');

// name the lang file the same as this file
	include("modules/$ModName/modules/lang/$language/newmembers.php");

// get the module setting from the database
	$modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
	list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

// clear the output variable
// title of the page to show up
	$output = ""._NEWMEMBERS.":\n\n";

// query the database and generate your output in the amount of mod_qty
	
$dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();
$result = mysql_query("select pn_uname, pn_uid, pn_user_avatar from $pntable[users] order by pn_uid DESC limit 0,$mod_qty");
$output.=""._GREETINGSX1." $mod_qty "._GREETINGSX2."\n\n";
while (list($uname, $uid, $avatar) = mysql_fetch_row($result)) {

$output.= "*  $uname\n";

 $newresult = mysql_query("select pn_user_regdate from $pntable[users] where pn_uid=$uid");
	    list($user_regdate)=mysql_fetch_row($newresult);
		    
// put registration date in UNIX epoch seconds 
$datereg = date("U",$user_regdate); 
// convert registration time into days 
$datereg = intval($datereg / 60 / 60 / 24); 
// get current time in UNIX epoch seconds 
$datenow = time(); 
// convert current time into days 
$datenow = intval($datenow / 60 / 60 / 24); 
// how long ago did the user register? 
$old = $datenow - $datereg; 
   	   
$output.= "  ".date("m/d/Y H:i",$user_regdate)."\n\n"; 
}
$output.="\n";

// strip the slashes out all at once
	$output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	return $output;
}

?>