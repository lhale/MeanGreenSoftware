<?php
// $Id: pnphpbbatopics.php,v 1.6 2005/12/28 13:32:50 kdoerges Exp $
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
// Original Author of file: foyleman, rudyvarner
// Purpose of file:  Books Module for pnTresMailer
// ----------------------------------------------------------------------

// variable that need to be defined for the system
	$modversion['file_name'] = 'pnphpbbatopics'; // the name of this php file
	$modversion['mod_name'] = 'PNphpBB'; // the name of the module you are writing this for
	$modversion['multi_output'] = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
	$modversion['mod_edit'] = '0'; // can this plugin be edited 1:true, 0:false
	$modversion['version'] = '1.5';
	$modversion['function_name'] = 'recent_pnphpbb_topics'; // the name of the function listed below
	$modversion['description'] = 'Recently Active Forum Topics'; // brief description of this module
	$modversion['author'] = 'kdoerges';
	$modversion['contact'] = 'http://canvas.anubix.net/';

// function named as above, in this case the format is for the HTML part of the mailer

function recent_pnphpbb_topics_html($mod_id, $nl_url, $ModName) {

// get vars
    $prefix = pnConfigGetVar('prefix');
    $language = pnConfigGetVar('language');

// get db connection		
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

// name the lang file the same as this file
    include("modules/$ModName/modules/lang/$language/pnphpbbatopics.php");

    // get the module setting from the database
	  $modsql = "SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'";
		$result = $dbconn->Execute($modsql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
    if (!$result->EOF) {
	      list($mod_qty, $mod_data) = $result->fields;
    } else {
		    // todo: take care of errors?
		}

// clear the output variable
// title of the page to show up
	  $output = "<b>"._RECENTPNPHPBBTOPICS.":</b><br><br>\n";

// query the database and generate your output in the amount of mod_qty
    $sql = "SELECT post_id, post_text FROM ".$prefix."_phpbb_posts_text ORDER BY post_id DESC LIMIT 0,$mod_qty";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
    $output .= "";
    while(!$result->EOF) {
		    list($post_id, $post_text) = $result->fields;
				$result->MoveNext();
        $sql2 = "SELECT topic_id, poster_id, FROM_UNIXTIME(post_time,'%b %d, %Y @ %T hrs') as post_time FROM ".$prefix."_phpbb_posts where post_id='$post_id'";
		    $result2 = $dbconn->Execute($sql2);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
        list($topic_id, $poster_id, $post_time) = $result2->fields;

        $sql3 = "SELECT topic_title, topic_views, topic_time, topic_replies, topic_last_post_id FROM ".$prefix."_phpbb_topics where topic_id='$topic_id'";
		    $result3 = $dbconn->Execute($sql3);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
        list($topic_title, $topic_views, $topic_time, $topic_replies, $topic_last_post_id) = $result3->fields;
        $topic_title=strip_tags(substr($topic_title,0,50));

        $sql4 = "SELECT pn_uname, pn_uid FROM ".$prefix."_users where pn_uid='$poster_id'";
		    $result4 = $dbconn->Execute($sql4);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
        list($uname, $uid) = $result4->fields;
        $msg_text=substr($post_text,0,50);

#$post_date=gmdate ("M d Y H:i:s", $post_time + (3600 * 8));
#$post_date=create_date('D M d, Y g:i a', '$post_time', '8');
#$post_date=$post_time
        $msg_text = preg_replace("[b:[a-z0-9]\](.*?)\[/b:[a-z0-9]]",  "", $msg_text);
        
        $output .= "<a href=\"$nl_url/index.php?op=modload&name=PNphpBB2&file=viewtopic&amp;t=$topic_id\"STYLE=\"text-decoration: none\" target=_blank>$topic_title</a>...($topic_views "._PNPHPBBVIEWS.")<br>"
                ."<a href=\"$nl_url/index.php?op=modload&name=PNphpBB2&file=viewtopic&amp;p=$post_id#$post_id\"STYLE=\"text-decoration: none\" target=_blank><img src=\"$nl_url/modules/pnTresMailer/modules/images/pnphpbb/icon_latest_reply.gif\" border=\"0\" alt=\"\"></a> "._PNPHPBBLASTPOSTBY.": <A HREF=\"$nl_url/index.php?op=modload&name=PNphpBB2&file=profile&mode=viewprofile&u=$uid\"STYLE=\"text-decoration: none\" target=_blank>"
                ."<b>$uname</b></a> "._PNPHPBBPOSTEDON." $post_time<br><br>";
    }
        
// strip the slashes out all at once
	  $output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	  return $output;
}


// function named as above, in this case the format is for the TEXT part of the mailer

function recent_pnphpbb_topics_text($mod_id, $nl_url, $ModName) {

// get vars
    $prefix = pnConfigGetVar('prefix');
    $language = pnConfigGetVar('language');

// get db connection		
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();

// name the lang file the same as this file
    include("modules/$ModName/modules/lang/$language/pnphpbbatopics.php");
		
    // get the module setting from the database
	  $modsql = "SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'";
		$result = $dbconn->Execute($modsql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
    if (!$result->EOF) {
	      list($mod_qty, $mod_data) = $result->fields;
    } else {
		    // todo: take care of errors?
		}

// clear the output variable
// title of the page to show up
	$output = ""._RECENTPNPHPBBTOPICS.":</b>\n\n";

// query the database and generate your output in the amount of mod_qty
    $sql = "SELECT post_id, post_text FROM ".$prefix."_phpbb_posts_text ORDER BY post_id DESC LIMIT 0,$mod_qty";
		$result = $dbconn->Execute($sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
    $output .= "";
    while(!$result->EOF) {
		    list($post_id, $post_text) = $result->fields;
				$result->MoveNext();
        $sql2 = "SELECT topic_id, poster_id, FROM_UNIXTIME(post_time,'%b %d, %Y @ %T hrs') as post_time FROM ".$prefix."_phpbb_posts where post_id='$post_id'";
		    $result2 = $dbconn->Execute($sql2);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
        list($topic_id, $poster_id, $post_time) = $result2->fields;

        $sql3 = "SELECT topic_title, topic_views, topic_time, topic_replies, topic_last_post_id FROM ".$prefix."_phpbb_topics where topic_id='$topic_id'";
		    $result3 = $dbconn->Execute($sql3);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
        list($topic_title, $topic_views, $topic_time, $topic_replies, $topic_last_post_id) = $result3->fields;
        $topic_title=strip_tags(substr($topic_title,0,50));

        $sql4 = "SELECT pn_uname, pn_uid FROM ".$prefix."_users where pn_uid='$poster_id'";
		    $result4 = $dbconn->Execute($sql4);
	      if ($dbconn->ErrorNo() != 0) {
		        echo _DBREADERROR;
	      }
        list($uname, $uid) = $result4->fields;
        $msg_text=substr($post_text,0,50);

#$post_date=gmdate ("M d Y H:i:s", $post_time + (3600 * 8));
#$post_date=create_date('D M d, Y g:i a', '$post_time', '8');
#$post_date=$post_time
        $msg_text = preg_replace("[b:[a-z0-9]\](.*?)\[/b:[a-z0-9]]",  "", $msg_text);
        
        $output .= "$topic_title  ...($topic_views "._PNPHPBBVIEWS.")\n"
                .""._PNPHPBBLASTPOSTBY.": $uname "._PNPHPBBPOSTEDON." $post_time\n"
                ."$nl_url/index.php?op=modload&name=PNphpBB2&file=viewtopic&amp;t=$topic_id\n\n";
    }
    $output .= ""._PNPHPBBACCESS.": $nl_url/index.php?op=modload&name=PNphpBB2&file=index\n\n\n";
// strip the slashes out all at once
	  $output = stripslashes($output);

// send the output to the system (it must be output and not another variable name)
	  return $output;
}

?>