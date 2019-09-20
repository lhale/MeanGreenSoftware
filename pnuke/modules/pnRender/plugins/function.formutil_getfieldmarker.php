<?php
// $Id: function.formutil_getfieldmarker.php,v 1.1 2006/02/01 12:03:04 markwest Exp $
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
 * Available parameters:
 *   - assign:   If set, the results are assigned to the corresponding variable instead of printed out
 *   - field:    The field for which we wish to get the field marker
 *   - validationErrors: the validation errors
 * 
 * Example
 * 
 */
function smarty_function_formutil_getfieldmarker($params, &$smarty) 
{
    $field = $params['field'];
    $marker = FormUtil::getFieldMarker ($params['validation'], $field);    

    if (isset($params['assign'])) 
        $smarty->assign($params['assign'], $marker);
    else 
        return $marker;
}

?>