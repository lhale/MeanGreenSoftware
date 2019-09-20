<?php // $Id
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the Post-Nuke Development Team.
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
// Original Author of file: Rob Brandt (bronto)
// ----------------------------------------------------------------------
// NOTES: much of this module has been grafted onto the example module 
//        provided with the PostNuke system as "Template".  As such, many
//        of the original comments from this example may remain.  Thus,
//        if a comment seems to make no sense whatsoever, you can likely 
//        safely disregard it =)  Sorry, much was copy / pasted, without 
//        much regard for the timely process of changing comments...
// ----------------------------------------------------------------------

modules_get_language();
$modInfo = pnModGetInfo(pnModGetIDFromName('pnTresMailer'));
user_menu_add_option("user.php?op=pntresmailer", _PNTRESMAILER_ICON_LABEL, "modules/".$modInfo['name']."/images/pntresmailer.gif");

?>