<?php
// $Id: function.pnmodurl.php,v 1.3 2005/01/26 22:42:54 rgasch Exp $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
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
// but WIthOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
/**
 * pnRender plugin
 * 
 * This file is a plugin for pnRender, the PostNuke implementation of Smarty
 *
 * @package      Xanthia_Templating_Environment
 * @subpackage   pnRender
 * @version      $Id: function.pnmodurl.php,v 1.3 2005/01/26 22:42:54 rgasch Exp $
 * @author       The PostNuke development team
 * @link         http://www.postnuke.com  The PostNuke Home Page
 * @copyright    Copyright (C) 2002 by the PostNuke Development Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

 
/**
 * Smarty function to create a PostNuke-compatible URL for a specific module function.
 * 
 * This function returns a module URL string if successful. Unlike the API
 * function pnModURL, this is already sanitized to display, so it should not be
 * passed to the pnvarprepfordisplay modifier.
 * 
 * Available parameters:
 *   - modname:  The well-known name of a module for which to create the URL (required)
 *   - type:     The type of function for which to create the URL; currently one of 'user' or 'admin' (default is 'user')
 *   - func:     The actual module function for which to create the URL (default is 'main')
 *   - all remaining parameters are passed to the module function
 * 
 * Example
 * Create a URL to the News 'view' function with parameters 'sid' set to 3 and 'index' set to '0'
 *   <a href="<!--[pnmodurl modname="News" type="user" func="view" sid="3" index="0"]-->">Link</a>
 * 
 * 
 * @author       Mark West
 * @since        08/08/2003
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      The URL
 */
function smarty_function_pnmodurl ($params, &$smarty) 
{
    extract($params); 
    unset($params['modname']);
    unset($params['type']);
    unset($params['func']);
    unset($params['append']);
    unset($params['assign']);
	
    if (!isset($modname)) {
        $smarty->trigger_error("pnmodurl: attribute modname required");
        return false;
    }    

    if (!isset($type)) {
        $type = 'user';
    }    

    if (!isset($func)) {
        $func = 'main';
    }    
    $url = pnModURL($modname, $type, $func, $params);        

    if ($append)
      $url .= $append;

    if ($assign)
      $smarty->assign ($assign, $url);
    else
      return pnVarPrepForDisplay($url);
}

?>