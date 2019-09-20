<?php
// $Id: pninit.php
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
// Filename: 1.0
// Based on : pnCPG
// Postnuked for .723 by Cas Nuy
// Purpose of file:  Initialisation functions for pnCPG
// ----------------------------------------------------------------------

/**
 * initialise the pnCPG module
 * This function is only ever called once during the lifetime of this module
 */
function pnCPG_init()
{
	pnModSetVar(pnCPG, '_CPGloc', 'http://yoursite.com/CPG');
	pnModSetVar(pnCPG, '_CPGusers', 0);
	pnModSetVar(pnCPG, '_CPGwindow', 0);
	pnModSetVar(pnCPG, '_CPGguest', 0);
	pnModSetVar(pnCPG, '_CPGguestorg','n');
	pnModSetVar(pnCPG, '_prf', 'cpg141');
	pnModSetVar(pnCPG, '_cpg_prf', 'cpg141_users');
	pnModSetVar(pnCPG, '_pn_prf', 'nuke_users');
	pnModSetVar(pnCPG, '_db','');
	pnModSetVar(pnCPG, '_lang','english');
	pnModSetVar(pnCPG, '_make','n');
	pnModSetVar(pnCPG, '_theme','default');
	pnModSetVar(pnCPG, '_CPGguestorg','n');
	pnModSetVar(pnCPG, '_sendmail','n');
	pnModSetVar(pnCPG, '_usedud','1');
	pnModSetVar(pnCPG, '_dbhost','');
	pnModSetVar(pnCPG, '_dbuser','');
	pnModSetVar(pnCPG, '_dbpw','');
	pnModSetVar(pnCPG, '_pnhome','');
	pnModSetVar(pnCPG, '_useat','n');
 	return true;
}

function pnCPG_upgrade()
{
return true;
}

function pnCPG_delete()
{
	pnModDelVar(pnCPG, '_CPGloc');
	pnModDelVar(pnCPG, '_CPGwindow');
	pnModDelVar(pnCPG, '_CPGusers');
	pnModDelVar(pnCPG, '_CPGwrap');
	pnModDelVar(pnCPG, '_CPGguest');
	pnModDelVar(pnCPG, '_CPGguestorg');
	pnModDelVar(pnCPG, '_cpg_prf');
	pnModDelVar(pnCPG, '_pn_prf');
	pnModDelVar(pnCPG, '_db');
	pnModDelVar(pnCPG, '_lang');
	pnModDelVar(pnCPG, '_make');
	pnModDelVar(pnCPG, '_theme');
	pnModDelVar(pnCPG, '_guestalbum');
	pnModDelVar(pnCPG, '_CPGguestorg');
	pnModDelVar(pnCPG, '_sendmail');
	pnModDelVar(pnCPG, '_usedud');
	pnModDelVar(pnCPG, '_dbhost');
	pnModDelVar(pnCPG, '_dbuser');
	pnModDelVar(pnCPG, '_dbpw');
	pnModDelVar(pnCPG, '_pnroot');
	pnModDelVar(pnCPG, '_useat');
	return true;
}
?>
