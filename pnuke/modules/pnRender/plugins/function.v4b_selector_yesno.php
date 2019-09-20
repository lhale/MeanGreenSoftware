<?php
/*  ----------------------------------------------------------------------
 *  LICENSE
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License (GPL)
 *  as published by the Free Software Foundation; either version 2
 *  of the License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WIthOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  To read the license please visit http://www.gnu.org/copyleft/gpl.html
 *  ----------------------------------------------------------------------
 *  Original Author of  Robert Gasch
 *  Author Contact: r.gasch@chello.nl, robert.gasch@value4business.com
 *  Purpose of file: generate a v4b permissions selector
 *  Copyright: Value4Business GmbH
 *  ----------------------------------------------------------------------
 */

/**
 * v4b_selector_group: generate a v4b permissions selector
 *
 * @author	Robert Gasch
 * @version     $Id: function.v4b_selector_yesno.php,v 1.1 2005/01/05 19:57:08 rgasch Exp $
 * @param	name		The name of the selector tag
 * @param	selectedValue	The currently selected value
 * 
 */ 

function smarty_function_v4b_selector_yesno ($params, &$smarty) 
{
    $selected     = $params['selected'];
    $defaultValue = $params['defaultValue'];
    $defaultText  = $params['defaultText'];
    $lang         = $params['lang'];
    $name         = $params['name'];

    require_once ('includes/v4blib/HtmlUtil.class.php');
    return HtmlUtil::getSelector_Category ('/__SYSTEM__/General/YesNo', $name,
                                           $selected, $defaultValue, $defaultText, $lang);
}

?>