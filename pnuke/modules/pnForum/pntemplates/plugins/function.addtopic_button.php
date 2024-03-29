<?php
// $Id: function.addtopic_button.php,v 1.10 2005/10/07 11:54:56 landseer Exp $
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
 * addtopic_button
 * shows a button "new topic" depending in the lang files
 *
 *@params $params['cat_id'] int category id
 *@params $params['forum_id'] int forum id
 *@params $params['image']    string the image filename (without path)
 */
function smarty_function_addtopic_button($params, &$smarty)
{
    extract($params);
	unset($params);

    // set a default value
    if(!isset($image) || empty($image)) {
        $image = 'post.gif';
    }

    include_once('modules/pnForum/common.php');
    $out = "";
    if(allowedtowritetocategoryandforum($cat_id, $forum_id)) {
        $imagedata = pnf_getimagepath($image);
        if($imagedata == false) {
            $show = pnVarPrepForDisplay(_PNFORUM_NEWTOPIC);
        } else {
            $show = '<img src="' . $imagedata['path'] . '" alt="' . pnVarPrepHTMLDisplay(_PNFORUM_NEWTOPIC) .'" ' . $imagedata['size'] . ' />';
        }
        $out = '<a title="' . pnVarPrepHTMLDisplay(_PNFORUM_NEWTOPIC) . '" href="'. pnVarPrepForDisplay(pnModURL('pnForum', 'user', 'newtopic', array('forum'=>$forum_id))) . '">' . $show . '</a>';
	}
    return $out;
}

?>
