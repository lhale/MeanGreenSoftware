<?php
// $Id: function.post_order_button.php,v 1.7 2005/10/07 11:54:56 landseer Exp $
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
 * post_order_button plugin
 * adds the post_order button
 *
 *@params $params['topic_id'] int forum id
 *@params $params['return_to'] string url to return to after subscribing, necessary because
 *                                    the subscription page can be reached from several places
 *@params $params['image_ascending']    string the image filename (without path)
 *@params $params['image_descending']    string the image filename (without path)
 */
function smarty_function_post_order_button($params, &$smarty)
{
    extract($params);
	unset($params);

    if(!isset($image_ascending) || empty($image_ascending)) {
        $image_ascending = 'postorderasc.gif';
    }
    if(!isset($image_descending) || empty($image_descending)) {
        $image_descending = 'postorderdesc.gif';
    }

    // initialize the variable
    $out = '';

    // if we don't know what topic we came from and we don't have a return_to
    // parameter passed then send them back to the main forum list
    if (!isset($topic_id) && !isset($return_to)) {
        $topic_id = false;
        $return_to = 'main';
    }

    // if we have a numeric topic but no return_to then set the return
    // to viewtopic.  Otherwise return to the main forum view.
    if (empty($return_to) && is_numeric($topic_id)) {
        $return_to = 'viewtopic';
    } else {
        $topic_id = false;
        if(!isset($return_to)) {
            $return_to = 'main';
        }
    }
    if (pnUserLoggedIn()) {
        $post_order = pnModAPIFunc('pnForum','user','get_user_post_order');
        if ($post_order == 'ASC' ) {
            $imagedata = pnf_getimagepath($image_ascending);
            if($imagedata == false) {
                $show = pnVarPrepForDisplay(_PNFORUM_NEWEST_FIRST);
            } else {
                $show = '<img src="' . $imagedata['path'] . '" alt="' . pnVarPrepHTMLDisplay(_PNFORUM_CHANGE_POST_ORDER) .'" ' . $imagedata['size'] . ' />';
            }
        } else {
            $imagedata = pnf_getimagepath($image_descending);
            if($imagedata == false) {
                $show = pnVarPrepForDisplay(_PNFORUM_OLDEST_FIRST);
            } else {
                $show = '<img src="' . $imagedata['path'] . '" alt="' . pnVarPrepHTMLDisplay(_PNFORUM_CHANGE_POST_ORDER) .'" ' . $imagedata['size'] . ' />';
            }
        }
        $out = '<a title="' . pnVarPrepForDisplay(_PNFORUM_CHANGE_POST_ORDER) . '" href="' . pnVarPrepForDisplay(pnModURL('pnForum', 'user', 'prefs', array('act'=>'change_post_order', 'topic'=>$topic_id, 'return_to'=>$return_to))) . '">' . $show . '</a>';
    }
    return $out;
}

?>
