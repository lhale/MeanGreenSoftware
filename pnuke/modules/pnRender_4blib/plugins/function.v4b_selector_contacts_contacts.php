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
 *  Purpose of file: get a PN Modules selector
 *  Copyright: Value4Business GmbH
 *  ----------------------------------------------------------------------
 */

/**
 * v4b_selector_module: generate a PN Module selector
 *
 * @author	Robert Gasch
 * @version     $Id: function.v4b_selector_contacts_contacts.php,v 1.1 2005/01/21 11:10:20 rgasch Exp $
 * @param	name		The name of the selector tag
 * @param	selectedValue	The currently selected value
 * @param	defaultValue	The default value (only used if no selectedValue is supplied)
 * @param	defaultText	Text to go with the default value
 * @param	includeAll	Wether or not to include an 'All' selector
 * @param	allText		Text to go with the 'All' select value
 * 
 */ 

function smarty_function_v4b_selector_contacts_contacts ($params, &$smarty) 
{
    return HtmlUtil::getSelector_contactContacts($params['cid'], $params['bid'], 
                                                $params['name'], $params['selectedValue'], 
                                                $params['defaultValue'], $params['defaultText'],
                                                $params['includeAll'], $params['allText']);
}

?>