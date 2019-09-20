<?php // $Id: links.modifyeventreg.php,v 1.5 2004/12/28 21:03:30 nuclearw Exp $
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
// Original Author of file: 
// Purpose of file: 
// ----------------------------------------------------------------------

if (preg_match('/links.modifycomments.php/i', $_SERVER['PHP_SELF'])) {
	die ("You can't access this file directly...");
}
$currentlang = pnSessionGetVar('lang');
$script = 'user';
//echo "modules/".pnVarPrepForOS($GLOBALS['ModName'])."/lang/*".pnVarPrepForOS($currentlang)."*/";

if (file_exists("modules/".pnVarPrepForOS($GLOBALS['ModName'])."/pnlang/".pnVarPrepForOS($currentlang)."/$script.php")) {
         @include_once "modules/".pnVarPrepForOS($GLOBALS['ModName'])."/pnlang/".pnVarPrepForOS($currentlang)."/$script.php";
      } 

usermenu("user.php?op=showmydonatereg", _DONATEREGMYREGS , "modules/".pnVarPrepForOS($GLOBALS['ModName'])."/pnimages/my_reg_icon.png");

?>
