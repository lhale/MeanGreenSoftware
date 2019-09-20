<?php
// $Id: function.adminlink.php,v 1.4 2005/03/23 06:57:00 landseer Exp $
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

// id, type
/**
 * adminlink plugin
 * adds a link to the configuration of a category or forum
 *
 *@params $params['type'] string, either 'category' or 'forum'
 *@params $params['id']   int     category or forum id, depending of $type
 */ 
function smarty_function_adminlink($params, &$smarty) 
{
    extract($params); 
	unset($params);

    if (pnSecAuthAction(0, 'pnForum::', "::", ACCESS_ADMIN)) { 
        if(empty($id) || empty($type)) {
            $smarty->trigger_error("adminlink: missing parameter(s)");
            return;
        }
        
        if($type=="category") {
            return "<a href=\"".pnVarPrepHTMLDisplay(pnModURL('pnForum', 'admin', 'category', array('cat_id'=>(int)$id)))."\">[".pnVarPrepForDisplay(_PNFORUM_ADMINCATEDIT)."]</a>";
        } elseif ($type=="forum") {
            return "<a href=\"".pnVarPrepHTMLDisplay(pnModURL('pnForum', 'admin', 'forum', array('forum_id'=>(int)$id)))."\">[".pnVarPrepForDisplay(_PNFORUM_ADMINFORUMEDIT)."]</a>";
        }
    }
    return;
}

?>
