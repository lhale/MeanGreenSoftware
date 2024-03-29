<?php
// $Id: function.bbsmile.php,v 1.7 2005/08/17 14:47:36 landseer Exp $
// ----------------------------------------------------------------------
// PostNuke Content Management System
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
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

/**
 * bbsmile plugin
 * shows all available smilies
 *
 *@params textfieldid
 */
function smarty_function_bbsmile($params, &$smarty)
{
    extract($params);
	unset($params);

    $out = "";
	if(pnModAvailable('pn_bbsmile') &&pnModIsHooked('pn_bbsmile', 'pnForum') && pnModLoad('pn_bbsmile', 'user') ) {
	    $out = pnModFunc('pn_bbsmile', 'user', 'bbsmiles',
	                     array('textfieldid' => $textfieldid));
	}
	return $out;
}

?>
