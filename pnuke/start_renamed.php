<?php
// File: $Id: index.php,v 1.41 2005/05/13 12:51:40 landseer Exp $
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2001 by the PostNuke Development Team.
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
// Original Author of this file: Larry Hale
// Purpose of this file: Last ditch attempt to properly redirect all website users
// consistently to the right starting location.
// (There is NO start page as defined in config.php, using the start admin stuff in 
// the admin control panel doesn't cut it (see http://community.postnuke.com/Wiki-BasicsStartPage.htm), so...)
/* Results: After setting all the following environment crap, it's not rendering in
 * my chosen theme (SHIT). This is the same as if ./pnuke/index.php is chosen as the
 * Apache start page (BOGUS). I think what I need to do to get this working is to copy
 * index.php, which gets the environment going and brute force fix it for PostWrap calls.
 */
// ----------------------------------------------------------------------

// include base api
include 'includes/pnAPI.php';

// start PN
pnInit();
// Redirect to the static gallery of UTube thumbnail images
// pnRedirect("index.php?module=PostWrap&page=google");
pnModSetVar("PostWrap", "page", "matrix");
$_SERVER['QUERY_STRING'] = "page=matrix";
$_REQUEST['page'] = 'matrix';
pnModSetVar("PostWrap", "no_user_entry", true);
pnModLoad("PostWrap", "user", true);    // true = force mod load

        include_once('header.php');
// echo ("p=" . pnModGetVar("PostWrap", "page") . "\n");   // Debug for next line
pnModFunc("PostWrap", "user", "main", array('page' => "matrix"));   // This is used to force-start the center home pg
// Actually, it appears it's not used in lieu of the Admin->Settings start page feature (so, this file not NEEDED)

        include_once('footer.php');
?>