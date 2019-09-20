<?php
// $Id: function.plainbbcode.php,v 1.9 2005/05/27 09:53:56 landseer Exp $
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
 * bbcode plugin
 * shows all available bbcode tags
 *
 *@params $params $images boolean if true then show images instead of text links
 *@params $params $textfieldis string id of the textfield to update
 */
function smarty_function_plainbbcode($params, &$smarty)
{
    extract($params);
	unset($params);

    $out = "";
    $args = array();
    if(!empty($textfieldid)) {
        $args['textfieldid'] = $textfieldid;
    }
    $args['images'] = $images;

	if(pnModAvailable('pn_bbcode') && pnModLoad('pn_bbcode', 'user') ) {
	    $out = pnModFunc('pn_bbcode', 'user', 'bbcodes', $args);
	}
	return $out;
}

?>