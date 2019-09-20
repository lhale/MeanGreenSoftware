<?php
  // $Id: rss.php,v 1.3 2005/11/07 21:57:30 jazzie Exp $
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
  // Purpose of file:  Text Plugin for pnTresMailer
  // ----------------------------------------------------------------------

  // variable that need to be defined for the system
  $modversion['file_name'] = 'rss'; // the name of this php file
  $modversion['mod_name'] = 'RSS Feed'; // the name of the module you are writing this for
  $modversion['multi_output'] = '1'; // is there a quantity spec, or simply return output 1:true, 0:false
  $modversion['mod_edit'] = '1'; // can this plugin be edited 1:true, 0:false
  $modversion['version'] = '1.1';
  $modversion['function_name'] = 'rss'; // the name of the function listed below
  $modversion['description'] = 'RSS Feed Insert, based on Snoopy class. Will work without php url wrapper in fopen()'; // brief description of this module
  $modversion['author'] = 'foyleman, kdoerges';
  $modversion['contact'] = 'http://canvas.anubix.net/';


  // function named as above, in this case the format is for the HTML part of the mailer

  function rss_html($mod_id, $nl_url, $ModName) {

    $prefix = pnConfigGetVar('prefix');		
  	pnModDBInfoLoad($ModName);

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();
		
    $language = pnConfigGetVar('language');

    // name the lang file the same as this file
    include("modules/$ModName/modules/lang/$language/rss.php");

    // get the module setting from the database
    $modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
    list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

    // create the array from the stored variables
    $mod_data = explode("|", $mod_data);

    foreach($mod_data as $key => $value) {
      $mod_data[$key] = stripslashes($value);
    }

    // clear the output variable
    // title of the page to show up
    if($mod_data[0] == '') {
      $output = "No Data!";
    } else {
      $output ="<b>$mod_data[0]:</b><br><br>\n";
    }

    // each bit of mod_data was stored with | separating them. The data is exploded and numbered as 0,1,2,3...


		// get xml data with snoopy

    include ("classes/Snoopy.class.inc");
    $snoopy = new Snoopy;
	  $snoopy->fetch($mod_data[1]);
		$data = $snoopy->results;

    $parser = xml_parser_create();
    xml_parser_set_option($parser,XML_OPTION_CASE_FOLDING,0);
    xml_parser_set_option($parser,XML_OPTION_SKIP_WHITE,1);
    xml_parse_into_struct($parser,$data,$values,$tags);
    xml_parser_free($parser);

    $open_item = 0;
    $item = 1;
    $title_ct = 0;
    $link_ct = 0;
    $descr_ct = 0;

    for($i=0;$i<COUNT($values);$i++) {
      // LOOK FOR ITEM OPEN
        if($values[$i][tag] == 'item' and $values[$i][type] == 'open') {
            $open_item = 1;
            continue;
        }

      // LOOK FOR ITEM CLOSE
        if($values[$i][tag] == 'item' and $values[$i][type] == 'close') {
            $open_item = 0;
            continue;
        }

        if($open_item == 1) {

            if($values[$i][tag] == 'title') {
                if($title_ct < $mod_qty) {
                    $output .= "<b>".$values[$i][value].":</b><br>\n";
                    $title_ct++;
                }
            }

            if($values[$i][tag] == 'link') {
                if($link_ct < $mod_qty) {
                    $output .= "<a href=\"".$values[$i][value]."\">".$values[$i][value]."</a><br><br>\n";
                    $link_ct++;
                }
            }

            if($values[$i][tag] == 'description') {
                if($descr_ct < $mod_qty) {
                    $output .= "".$values[$i][value]."<br><br>\n";
                    $descr_ct++;
                }
            }
        }
    }

    // strip the slashes out all at once
    $output = stripslashes($output);		
		
    // send the output to the system (it must be output and not another variable name)
    return $output;
  }


  // function named as above, in this case the format is for the TEXT part of the mailer

  function rss_text($mod_id, $nl_url, $ModName) {

    $prefix = pnConfigGetVar('prefix');
    $language = pnConfigGetVar('language');

    // name the lang file the same as this file
    include("modules/$ModName/modules/lang/$language/rss.php");

    // get the module setting from the database
    $modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
    list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

    // create the array from the stored variables
    $mod_data = explode("|", $mod_data);

    // clear the output variable
    // title of the page to show up
    if($mod_data[0] == '') {
      $output = "";
    } else {
      $output ="$mod_data[0]:\n\n";
    }

    // each bit of mod_data was stored with | separating them. The data is exploded and numbered as 0,1,2,3...

    $data = file($mod_data[1]);
    $data = implode("", $data);

    $parser = xml_parser_create();
    xml_parser_set_option($parser,XML_OPTION_CASE_FOLDING,0);
    xml_parser_set_option($parser,XML_OPTION_SKIP_WHITE,1);
    xml_parse_into_struct($parser,$data,$values,$tags);
    xml_parser_free($parser);

    $open_item = 0;
    $item = 1;
    $title_ct = 0;
    $link_ct = 0;
    $descr_ct = 0;

    for($i=0;$i<COUNT($values);$i++) {
      // LOOK FOR ITEM OPEN
      if($values[$i][tag] == 'item' and $values[$i][type] == 'open') {
        $open_item = 1;
        continue;
      }

      // LOOK FOR ITEM CLOSE
      if($values[$i][tag] == 'item' and $values[$i][type] == 'close') {
        $open_item = 0;
        continue;
      }

      if($open_item == 1) {

        if($values[$i][tag] == 'title') {
          if($title_ct < $mod_qty) {
            $output .= "".$values[$i][value].":\n";
            $title_ct++;
          }
        }

        if($values[$i][tag] == 'link') {
          if($link_ct < $mod_qty) {
            $output .= "".$values[$i][value]."\n\n";
            $link_ct++;
          }
        }

        if($values[$i][tag] == 'description') {
          if($descr_ct < $mod_qty) {
            $output .= "".$values[$i][value]."\n\n";
            $descr_ct++;
          }
        }

        //			$new_data[$i] = $values[$i];
        //			echo "".$values[$i][tag]." : ".$values[$i][value]."\n";
      }

    }

    // strip the slashes out all at once
    $output = stripslashes($output);

    // send the output to the system (it must be output and not another variable name)
    return $output;
  }


  // function named as above, in this case the format is for the TEXT part of the mailer

  function rss_admin($mod_id, $ModName) {

    $prefix = pnConfigGetVar('prefix');
    $language = pnConfigGetVar('language');

    // name the lang file the same as this file
    include("modules/$ModName/modules/lang/$language/rss.php");

    // get the module setting from the database
    $modsql = mysql_query("SELECT mod_qty, mod_data FROM $prefix"._nl_modules." WHERE mod_id = '$mod_id'");
    list($mod_qty, $mod_data) = mysql_fetch_row($modsql);

    // strip the slashes out all at once
    $mod_data = stripslashes($mod_data);

    // create the array from the stored variables
    $mod_data = explode("|", $mod_data);


    // the admin part
    echo "<table cellspacing=\"0\" cellpadding=\"6\" border=\"0\">\n"
    ."<tr>\n"
    ."<td align=\"right\" class=\"pn-normal\"><b>"._HEADING.":</b></td>\n"
    ."<td class=\"pn-normal\"><input type=\"text\" name=\"mod_data[0]\" value=\"$mod_data[0]\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"right\" class=\"pn-normal\"><b>"._RSSLINK.":</b></td>\n"
    ."<td class=\"pn-normal\"><input type=\"text\" name=\"mod_data[1]\" value=\"$mod_data[1]\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."\n";

    // send the mod_data to the system (it must be mod_data and not another variable name)
    return $mod_data;
  }

?>