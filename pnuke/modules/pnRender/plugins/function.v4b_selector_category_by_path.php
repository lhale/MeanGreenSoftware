<?php
// $Id: function.v4b_contact_selector_contacts.php,v 1.1 2005/02/08 19:16:40 rgasch Exp $
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
 *   - btnText:  If set, the results are assigned to the corresponding variable instead of printed out
 *   - cid:      category ID     
 * 
 * Example
 * <!--[v4b_rbs_getcategory cid="1" assign="category"]-->
 * 
 */
function smarty_function_v4b_selector_category_by_path ($params, &$smarty) 
{
    $selectedValue = $params['selectedValue'];
    $defaultValue  = $params['defaultValue'];
    $defaultText   = $params['defaultText'];
    $field         = $params['field'];
    $lang          = $params['lang'];
    $name          = $params['name'];
    $path          = $params['path'];
    $submit        = $params['submit'];
    $ignore        = $params['ignore'];
    $disabled      = $params['disabled'];
    $recurse       = $params['recurse'];
    $relative      = $params['relative'];
    $includeRoot   = $params['includeRoot'];
    $onchange      = $params['onchange'];

    if (!$field)
        $field = 'value';

    require_once ('includes/v4blib/HtmlUtil.class.php');
    return HtmlUtil::getSelector_CategoryField ($path, $name, $field, $selectedValue, 
                                                $defaultValue, $defaultText, $lang, $submit, $ignore, 
                                                false, $disabled, $recurse, $relative, $includeRoot, $onchange);
}
?>