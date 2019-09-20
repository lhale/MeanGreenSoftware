<?php
  // $Id: paged_news.php,v 1.3 2005/10/31 12:05:28 kdoerges Exp $
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
    $modversion['file_name']     = 'paged_news'; // the name of this php file
    $modversion['mod_name']      = 'PagEd'; // the name of the module you are writing this for
    $modversion['multi_output']  = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
    $modversion['mod_edit']      = '0'; // can this plugin be edited 1:true, 0:false
    $modversion['version']       = '0.1';
    $modversion['function_name'] = 'latest_pagednewsonly'; // the name of the function listed below
    $modversion['description']   = 'Latest PagEd News'; // brief description of this module
    $modversion['author']        = 'K.Doerges, based on Oivind Skau';
    $modversion['contact']       = 'http://www.cycronic.de/';

  // function named as below, in this case the format is for the HTML part of the mailer

function latest_pagednewsonly_html($mod_id, $nl_url, $ModName) {

// get vars
    $prefix = pnConfigGetVar('prefix');
    $language = pnConfigGetVar('language');

// get db connection		
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();
		
    $getnewspath = ($prefix."_paged_news");
    $getheaderpath = ($prefix."_paged_titles");
    $getcontentpath = ($prefix."_paged_content");
    $todaysdate = time();

    // name the lang file the same as this file
    include("modules/".$ModName."/modules/lang/".$language."/paged_news.php");

    // get the module setting from the database
	  $modsql = "SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'";
		$result = $dbconn->Execute($modsql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  }
    if (!$result->EOF) {
	      list($mod_qty, $mod_data) = $result->fields;
    } else {
		    // take care od errors?
		}

    // GENERATE OUTPUT **********************************
    // clear the output variable
    // title of the page to show up
    $output ="<b>"._LATESTPAGEDNEWS." :</b><br><br>\n";
    $newsitemcounter = 0;

    // Look up News Items
    $getnewstitle_sql = "select page_id from ".$prefix."_paged_news where isnews_switch = 1 $sqlwherepagedtopic order by page_id DESC LIMIT 10 ";
    $getnewstitle_result = $dbconn->Execute($getnewstitle_sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  } 

    $newsitemcounter = 1;

    if (!$getnewstitle_result->EOF) {
        while((list($page_id) = $getnewstitle_result->fields) & ($newsitemcounter <= $mod_qty)) {
            $gettitle_sql = "select topic_id, language, title, ingress from ".$getheaderpath." where page_id=".$page_id;
            $gettitle_result = $dbconn->Execute($gettitle_sql);
	          if ($dbconn->ErrorNo() != 0) {
		            echo _DBREADERROR;
	          } 
            list($topic_id, $pagelanguage, $title, $ingress) = $gettitle_result->fields;
            if ($topic_id>0) {
                $gettopiclanguage_sql = "select topic_language from ".$prefix."_paged_topics where topic_id=".$topic_id;
                $gettopiclanguage_result = $dbconn->Execute($gettopiclanguage_sql);
	              if ($dbconn->ErrorNo() != 0) {
		                echo _DBREADERROR;
	              } 
                list($pagelanguage) = $gettopiclanguage_result->fields;
            }
            if (($pagelanguage == $userlanguage) or ($pagelanguage == ("all"))) {
                $getcontent_sql = "select subtitle, text from ".$getcontentpath." where page_id=".$page_id." and section=1";
                $getcontent_result = $dbconn->Execute($getcontent_sql);
	              if ($dbconn->ErrorNo() != 0) {
		                echo _DBREADERROR;
	              } 
                list($subtitle, $text) = $getcontent_result->fields;
                if (!stristr ($ingress, '<pre') && !stristr ($ingress, '<table') && !stristr ($ingress, '<br') && !stristr($ingress, '<h'))	{
                    $ingress = str_replace ("\n" , "<br>", $ingress);
                }
                if (!stristr ($text, '<pre') && !stristr ($text, '<table') && !stristr ($text, '<br') && !stristr($text, '<h')) {
                    $text = str_replace ("\n" , "<br>", $text);
                }

                $title = stripslashes($title);
                $ingress = stripslashes($ingress);
                $subtitle = stripslashes($subtitle);
                $text = stripslashes($text);
                list($title, $ingress, $subtitle, $text)= pnVarPrepHTMLDisplay($title, $ingress, $subtitle, $text);
                $output .= "<a href=\"".$nl_url."/index.php?name=PagEd&page_id=".$page_id."\" target=\"_blank\"><b>".$title."</b></a><br>\n";
                if ($ingress)	{
                    $textandurls = eregi_replace( "[^\"]http://([^[:space:]]*)([[:alnum:]#?/&=])", "&nbsp;<a href=\"http://\\1\\2\" target=\"_blank\">http://\\1\\2</a>", $ingress);
                    $textandurls = eregi_replace( "(([a-z0-9_]|\-|\.)+@([^[:space:]]*)([[:alnum:]-]))", "<a href=\"mailto:\\1\" target=\"_blank\">\\1</a>", $textandurls);
                    $output .= $textandurls."<br>";
                } else {
                    if ($subtitle) {
                        $output .= $subtitle."<br>";
                    }
                    if ($text) {
                        $textandurls = eregi_replace( "[^\"]http://([^[:space:]]*)([[:alnum:]#?/&=])", "&nbsp;<a href=\"http://\\1\\2\" target=\"_blank\">http://\\1\\2</a>", $text);
                        $textandurls = eregi_replace( "(([a-z0-9_]|\-|\.)+@([^[:space:]]*)([[:alnum:]-]))", "<a href=\"mailto:\\1\" target=\"_blank\">\\1</a>", $textandurls);
                        $output .= $textandurls;
                    }
                }
                if ($ingress) {
                    $sectiontocheck = 1;
                } else {
                    $sectiontocheck = 2;
                }
                $getsecondcontent_sql = "select subtitle, text from ".$getcontentpath." where page_id=".$page_id." and section=".$sectiontocheck;
                $getsecondcontent_result = $dbconn->Execute($getsecondcontent_sql);
	              if ($dbconn->ErrorNo() != 0) {
		                echo _DBREADERROR;
	              } 
                list($subtitle, $text) = $getsecondcontent_result->fields;
                if (($subtitle) or ($text)) {
                    $output .= "<br><a href=\"".$nl_url."/index.php?name=PagEd&page_id=".$page_id."\" target=\"_blank\">"._READMORE."</a><br>\n";
                }
            }
            $output .= "<br><br>";
            $newsitemcounter = $newsitemcounter + 1;
        }
    }

    // strip the slashes out all at once
    $output = stripslashes($output);

    // send the output to the system (it must be output and not another variable name)
    return $output;
  }


// function named as above, in this case the format is for the TEXT part of the mailer

function latest_pagednewsonly_text($mod_id, $nl_url, $ModName) {

// get vars	
    $prefix = pnConfigGetVar('prefix');
    $language = pnConfigGetVar('language');

// get db connection		
    list($dbconn) = pnDBGetConn();
	  $pntable =& pnDBGetTables();
		
    $getnewspath = ($prefix."_paged_news");
    $getheaderpath = ($prefix."_paged_titles");
    $getcontentpath = ($prefix."_paged_content");
    $todaysdate = time();

    // name the lang file the same as this file
    include("modules/".$ModName."/modules/lang/".$language."/paged_news.php");

    // get the module setting from the database
    $modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
    list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

    // GENERATE OUTPUT **********************************
    // clear the output variable
    // title of the page to show up
    $output = _LATESTPAGEDNEWS." :\n\n\n";
    $newsitemcounter = 0;

    // Look up News Items
    $getnewstitle_sql = "select page_id from ".$prefix."_paged_news where isnews_switch = 1 $sqlwherepagedtopic order by page_id DESC LIMIT 10 ";
    $getnewstitle_result = $dbconn->Execute($getnewstitle_sql);
	  if ($dbconn->ErrorNo() != 0) {
		    echo _DBREADERROR;
	  } 

    $newsitemcounter = 1;

    if (!$getnewstitle_result->EOF) {
        while((list($page_id) = $getnewstitle_result->fields) & ($newsitemcounter <= $mod_qty)) {
            $gettitle_sql = "select topic_id, language, title, ingress from ".$getheaderpath." where page_id=".$page_id;
            $gettitle_result = $dbconn->Execute($gettitle_sql);
	          if ($dbconn->ErrorNo() != 0) {
		            echo _DBREADERROR;
	          } 
            list($topic_id, $pagelanguage, $title, $ingress) = $gettitle_result->fields;
            if ($topic_id>0) {
                $gettopiclanguage_sql = "select topic_language from ".$prefix."_paged_topics where topic_id=".$topic_id;
                $gettopiclanguage_result = $dbconn->Execute($gettopiclanguage_sql);
	              if ($dbconn->ErrorNo() != 0) {
		                echo _DBREADERROR;
	              } 
                list($pagelanguage) = $gettopiclanguage_result->fields;
            }
            if (($pagelanguage == $userlanguage) or ($pagelanguage == ("all"))) {
                $getcontent_sql = "select subtitle, text from ".$getcontentpath." where page_id=".$page_id." and section=1";
                $getcontent_result = $dbconn->Execute($getcontent_sql);
	              if ($dbconn->ErrorNo() != 0) {
		                echo _DBREADERROR;
	              } 
                list($subtitle, $text) = $getcontent_result->fields;
                if (!stristr ($ingress, '<pre') && !stristr ($ingress, '<table') && !stristr ($ingress, '<br') && !stristr($ingress, '<h'))	{
                    $ingress = str_replace ("\n" , "<br>", $ingress);
                }
                if (!stristr ($text, '<pre') && !stristr ($text, '<table') && !stristr ($text, '<br') && !stristr($text, '<h')) {
                    $text = str_replace ("\n" , "<br>", $text);
                }

                $title = stripslashes($title);
                $ingress = stripslashes($ingress);
                $subtitle = stripslashes($subtitle);
                $text = stripslashes($text);
                list($title, $ingress, $subtitle, $text)= pnVarPrepHTMLDisplay($title, $ingress, $subtitle, $text);
                $output .= "<a href=\"".$nl_url."/index.php?name=PagEd&page_id=".$page_id."\" target=\"_blank\"><b>".$title."</b></a><br>\n";
                if ($ingress)	{
                    $textandurls = eregi_replace( "[^\"]http://([^[:space:]]*)([[:alnum:]#?/&=])", "&nbsp;<a href=\"http://\\1\\2\" target=\"_blank\">http://\\1\\2</a>", $ingress);
                    $textandurls = eregi_replace( "(([a-z0-9_]|\-|\.)+@([^[:space:]]*)([[:alnum:]-]))", "<a href=\"mailto:\\1\" target=\"_blank\">\\1</a>", $textandurls);
                    $output .= $textandurls."<br>";
                } else {
                    if ($subtitle) {
                        $output .= $subtitle."<br>";
                    }
                    if ($text) {
                        $textandurls = eregi_replace( "[^\"]http://([^[:space:]]*)([[:alnum:]#?/&=])", "&nbsp;<a href=\"http://\\1\\2\" target=\"_blank\">http://\\1\\2</a>", $text);
                        $textandurls = eregi_replace( "(([a-z0-9_]|\-|\.)+@([^[:space:]]*)([[:alnum:]-]))", "<a href=\"mailto:\\1\" target=\"_blank\">\\1</a>", $textandurls);
                        $output .= $textandurls;
                    }
                }
                if ($ingress) {
                    $sectiontocheck = 1;
                } else {
                    $sectiontocheck = 2;
                }
                $getsecondcontent_sql = "select subtitle, text from ".$getcontentpath." where page_id=".$page_id." and section=".$sectiontocheck;
                $getsecondcontent_result = $dbconn->Execute($getsecondcontent_sql);
	              if ($dbconn->ErrorNo() != 0) {
		                echo _DBREADERROR;
	              } 
                list($subtitle, $text) = $getsecondcontent_result->fields;
                if (($subtitle) or ($text)) {
                    $output .= "\n".$nl_url."/index.php?name=PagEd&page_id=".$page_id."\n\n";
                }
            }
            $output .= "\n\n";
            $newsitemcounter = $newsitemcounter + 1;
        }
    }
    // strip the slashes out all at once
    $output = stripslashes($output);

    // send the output to the system (it must be output and not another variable name)
    return $output;
  }

?>