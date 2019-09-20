<?php
// $Id: function.postanchor.php,v 1.3 2005/10/10 09:04:00 landseer Exp $
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
 * postanchor plugin
 * adds an anchor to the url to directly jump to a special posting inside a thread
 *
 *@params $params['postings']  int number of postings in this thread
 *@params $params['min']       int minimum number of postings needed before adding an anchor
 *                                 default = 2
 *@params $params['post_id']   int post id
 *@params $params['assign']    string(optional) if set, thr result is assigned to this
 *                                              variable and not returned
 *
 *
 **************************************************************
 *
 * This plugin is deprecated, do not use it in your templates!!
 *
 **************************************************************
 */
function smarty_function_postanchor($params, &$smarty)
{
    extract($params);
	unset($params);

    if(empty($post_id)) { return; }
    if(empty($postings) || $postings==0) { return; }
    if(empty($min)) {
        $min = pnModGetVar('pnForum', 'min_postings_for_anchor');
        $min = (!empty($min)) ? $min : 2;
    }

    $anchor = "";
    if($postings >= $min) {
        $anchor = "#pid$post_id";
    }

    if(!empty($assign)) {
        $smarty->assign($assign, $anchor);
        return;
    }
    return $anchor;
}

?>