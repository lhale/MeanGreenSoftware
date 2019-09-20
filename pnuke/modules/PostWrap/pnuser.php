<?php
// ----------------------------------------------------------------------
// Copyright (c) 2002-2004 Shawn McKenzie
// http://spidean.mckenzies.net
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

function PostWrap_user_main()
{
    global $pnconfig;
    
    $output = new pnHTML();

    $ModName = pnModGetName();
    
	if(!pnSecAuthAction(0, "$ModName::", '::', ACCESS_READ)) {
        $output->Text(_NOTAUTHMODMSG);
        return $output->GetOutput();
    }
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    		
    // Module specific
	$allow_local_only = pnModGetVar($ModName, 'allow_local_only');
	$no_user_entry = pnModGetVar($ModName, 'no_user_entry');
	$open_direct = pnModGetVar($ModName, 'open_direct');
	$use_fixed_title = pnModGetVar($ModName, 'use_fixed_title');
	$auto_resize = pnModGetVar($ModName, 'auto_resize');
	$vsize = pnModGetVar($ModName, 'vsize');
	$hsize = pnModGetVar($ModName, 'hsize');
	$security = pnModGetVar($ModName, 'security');
    $footer = pnConfigGetVar('foot1');
	$page = pnVarCleanFromInput('page');
	if ($page == null || $page == "" )    // LDH - added so wrapped start pages will work
	    $page = pnModGetVar($ModName, 'page');
	$title = pnVarCleanFromInput('title');
	$width = pnVarCleanFromInput('width');
	$height = pnVarCleanFromInput('height');
	$resize = pnVarCleanFromInput('resize');
	
//	echo ("pg=" . $page . "\n");
//	echo ("page=" . pnModGetVar("PostWrap", 'page' . "\n"));
	
// CyberOto [---Begin-----------------------------]
// Use DB to check URL
    $page_anchor_name = false;
    if ($security) {
        list($dbconn) = pnDBGetConn();
		$urltable = pnConfigGetVar('prefix') . '_postwrap_url';
		
		$result = $dbconn->Execute("SELECT * FROM $urltable");
	
		while (list($id, $name, $alias, $reg_user_only1, $open_direct1, $use_fixed_title1, $auto_resize1, $vsize1, $hsize1) = $result->fields) {
			$result->MoveNext();
//  echo ("alias,page=" . $alias . "," . $page . "| ");
			// Check if URL is in DB
			if (($alias == $page) || ($name == $page) || ($name == "http://".$page)) {
				$db_checked = 1;
				$page = $name;
				// Override global settings
				$open_direct = $open_direct1;
				$use_fixed_title = $use_fixed_title1;
				$auto_resize = $auto_resize1;
				$vsize = $vsize1;
				$hsize = $hsize1;
// echo ("alias,page=" . $alias . "," . $page);
				break;
			}
			else {
			    $db_checked = 0;
			}
		}	
    	// Security is on but URL is not in DB
		if (!$db_checked) {	
			$output->Text(_NOTAUTHHOSTMSG);
            return $output->GetOutput();
		}
		// Check to see if a page anchor redirection is in order
		/** (The secure URL takes the form page_alias___page_anchor_name)
		 */
		$page_anchor_name = strstr($page, "___");
		if ( $page_anchor_name != false )
		{
		    $page = substr($page, 0, strlen($page) - strlen($page_anchor_name));
		    $page_anchor_name = substr($page_anchor_name, 3);    // Strip out 3 prefix characters
		    $page = $page . "#" . $page_anchor_name;  // NOTE: This doesn't work; browsers aren't looking for iframe page anchors
		    $redirect_form = "\n"
		    				."<form action=\"index.html\" method=\"post\" name=\"where\" >"
	                           ."<input type=\"hidden\" name=\"whereto\" value=\"$page_anchor_name\" id=\"whereto\">"
	                        ."</form>"
	                        ."\n";
		}
	}

// CyberOto [---End-------------------------------]

// Store URL parts in array
	$url_parts = parse_url($page);
// echo "page=$page" . "<br />" ;
// Check that a page was specified
	if (!isset($page) || ($page == "")) {
		$output->Text(_NOPAGEMSG);
        return $output->GetOutput();
	}
	
// Check for not entered in browser location window if set
	if (!$_SERVER["HTTP_REFERER"] && !$no_user_entry) {
/* LDH - backtrace debugging
    echo "<pre>\n PostWrap_user_main Call Btrc:\n";
    debug_print_backtrace();
	// To finish off our 'extreme' debugging mode here, let's also give
    // a full backtrace dump, which will contain all variables that existed
    // and much much more.
    echo "\nFull Backtrace:\n";
    var_dump(debug_backtrace());
    echo "</pre>\n"
*/
		$output->Text(_NOUSERENTRYMSG);
        return $output->GetOutput();
    }
	
// Check for not local page if set
	if ($allow_local_only && ($url_parts['host'] != $_SERVER["SERVER_NAME"]) && ($url_parts['host'] != $_SERVER["HTTP_HOST"])) {
		$output->Text(_NOTLOCALMSG);
        return $output->GetOutput();
	}
	
// Everything is good - ready to display

// Check for fixed title and use it 
    if (!$title) {
        if ($use_fixed_title) {
            $title = (_TITLEMSG);
            $end_title = (_TITLEMSGEND);
        }
        else {
            $title = "";
            $end_title = "";
        }
    }
    else {
        $end_title = "";
    }
	
// Add the Open Direct link if set 
	if ($open_direct) {
        $title .= "<br />[ <a href=\"$page\" target=\"_blank\">"._OPENDIRECTMSG."</a> ]";
		$end_title .= "<br />[ <a href=\"$page\" target=\"_blank\">"._OPENDIRECTMSG."</a> ]";
	}
	
// Check if height, width or resize were passed in URL
    if ($height) {
	    $vsize = $height;
        $auto_resize = false;
    }
    if ($width) {
        $hsize = $width;
    }
    elseif (!$hsize) {
	    $hsize = "100%";
    }	
    if ($resize) {
        $auto_resize = true;
    }
// LDH - analysis indicates that the new Iframe has a new session created
// echo ("uid=" . $_SESSION['uid'] . "," . $_SESSION['PNSVuid'] . ",sesn="  . session_id());
    
// If auto_resize set vsize = 0 and build javascript content
	if ($auto_resize) {
/* LDH - The original algorithm is based on tabled pages and errantly makes vsize too small
 		$jscontent = "\n"
		."<!--\n"
        ."************************* PostWrap 2.5 (resize start) ***************************\n"
        ."-->\n"
		."<script language=\"javascript\" type=\"text/javascript\" src=\"modules/$ModName/javascript/postwrap.js\">\n"
		."</script>\n"
		."<!--\n"
        ."************************* PostWrap 2.5 (resize end) *****************************\n"
        ."-->\n";
*/	
 		$jscontent = "\n"
		."<!--\n"
        ."************************* PostWrap 2.5 (resize start) ***************************\n"
        ."-->\n"
		."<script language=\"javascript\" type=\"text/javascript\" src=\"modules/$ModName/javascript/postwrap.js\">\n"
		."</script>\n"
		."<script language=\"javascript\" type=\"text/javascript\" >\n"
		."resizeIframe(\"postwrap-content\");\n"
		."</script>\n"
		."<!--\n"
        ."************************* PostWrap 2.5 (resize end) *****************************\n"
        ."-->\n";
        $vsize = 0;		
        $pnconfig['foot1'] .= $jscontent;
	}

// Build title and content
// LDH - add PN user id & name to the page req
if ( strstr( $page, "?") == false)
    $page = $page . '?pnUserID=' . $_SESSION['PNSVuid'];    // Probab can use pnUserGetVar('uid') here
else
    $page = $page . '&pnUserID=' . $_SESSION['PNSVuid'];
if (pnUserLoggedIn())
$page = $page . '&pnUserNm=' . pnUserGetVar('uname');

    // Add a special form for redirecting from within the iframe if needed
    if ( $page_anchor_name != false)
        $output->Text($redirect_form);
// LDH scrolling=\"no\" causes truncation of the bottom of the Cblock (?WTF??). Suspect a TD/TABLE dimen sit.	
	$content = "\n"
    ."<!--\n"
    ."************************* PostWrap 2.5 (content start) **************************\n"
    ."-->\n"
	."<div class=\"pn-pagetitle\" align=\"center\">".$title."</div>\n"
	."<iframe id=\"postwrap-content\" class=\"postwrap-content\" scrolling=\"no\" src=\"$page\" width=\"$hsize\" height=\"$vsize\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"\n"
	."style=\"overflow:visible; width:100%; display:none\" >\n"
	."  <br />"._SORRYBROWSER."<a class=\"pn-pagetitle\" href=\"$page\" target=\"_blank\">"._LINKYOU."</a>"._SORRYBROWSER1."<br /><br />\n"
	."</iframe>\n"
	."<div class=\"pn-pagetitle\" align=\"center\">".$end_title."</div>\n"
	."<!--\n"
    ."************************* PostWrap 2.5 (content end) ****************************\n"
    ."-->\n";
// LDH -   echo "content=$content\n" . "<br />"; 
// Finish up
    $output->Text($content);
    return $output->GetOutput();
}	

?>
