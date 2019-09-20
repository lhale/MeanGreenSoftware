<?php
// $Id: function.printtopic_button.php,v 1.9 2005/10/07 11:54:56 landseer Exp $
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
 * printtopic_button plugin
 * adds the print topic button
 *
 *@params $params['cat_id'] int category id
 *@params $params['forum_id'] int forum id
 *@params $params['topic_id'] int topic id
 *@params $params['image']    string the image filename (without path)
 */
function smarty_function_printtopic_button($params, &$smarty)
{
    extract($params);
    unset($params);

    // set a default value
    if(!isset($image) || empty($image)) {
        $image = 'printtopic.gif';
    }

    include_once('modules/pnForum/common.php');
    if(allowedtoreadcategoryandforum($cat_id, $forum_id)) {
        $imagedata = pnf_getimagepath($image);
        if($imagedata == false) {
            $show = pnVarPrepForDisplay(_PNFORUM_PRINT_TOPIC);
        } else {
            $show = '<img src="' . $imagedata['path'] . '" alt="' . pnVarPrepHTMLDisplay(_PNFORUM_PRINT_TOPIC) .'" ' . $imagedata['size'] . ' />';
        }
        $lang = pnUserGetLang();
        if(function_exists('pnThemeInfo')) {
            $themeinfo = pnThemeInfo('Printer');
            if($themeinfo['active']) {
                return '<a title="' . pnVarPrepHTMLDisplay(_PNFORUM_PRINT_TOPIC) . '" href="' . pnVarPrepForDisplay(pnModURL('pnForum', 'user', 'viewtopic', array('theme' => 'Printer', 'topic'=>$topic_id))) . '">' . $show . '</a>';
            }
        }
        return '<a title="' . pnVarPrepHTMLDisplay(_PNFORUM_PRINT_TOPIC) . '" href="' . pnVarPrepForDisplay(pnModURL('pnForum', 'user', 'print', array('topic'=>$topic_id))) . '">' . $show . '</a>';
    }
    return '';
}

?>
