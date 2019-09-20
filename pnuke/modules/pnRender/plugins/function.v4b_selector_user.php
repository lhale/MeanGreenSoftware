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
 *  Purpose of file: get a PN user selector
 *  Copyright: Value4Business GmbH
 *  ----------------------------------------------------------------------
 */

/**
 * v4b_selector_user: generate a PN user selector
 *
 * @author	Robert Gasch
 * @version     $Id: function.v4b_selector_user.php,v 1.2 2004/12/28 23:08:31 rgasch Exp $
 * @param	name		The name of the selector tag
 * @param	selectedValue	The currently selected value
 * @param	defaultValue	The default value (only used if no selectedValue is supplied)
 * @param	defaultText	Text to go with the default value
 * @param   allValue    The value to assign for the "All" choice (optional) (default='')
 * @param	allText		Text to go with the 'All' select value
 * @param	exclude		SQL IDList to exclude from the user list
 * @param   disabled    Wether or not to disable selector (optional) (default=false)
 * 
 */ 

function smarty_function_v4b_selector_user ($params, &$smarty) 
{
    require_once ('includes/v4blib/HtmlUtil.class.php');
    return HtmlUtil::getSelector_PNUser ($params['name'], $params['selectedValue'], 
                                        $params['defaultValue'], $params['defaultText'],
                                        $params['allValue'], $params['allText'],
					$params['disabled'], $params['submit'], $params['onchange']);
}

?>