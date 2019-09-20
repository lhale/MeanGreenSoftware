<?php
// $Id: function.pnthemegetvar.php,v 1.6 2005/11/21 18:48:00 rgasch Exp $
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
 * pnRender plugin
 * 
 * This file is a plugin for pnRender, the PostNuke implementation of Smarty
 *
 * @package      Xanthia_Templating_Environment
 * @subpackage   pnRender
 * @version      $Id: function.pnthemegetvar.php,v 1.6 2005/11/21 18:48:00 rgasch Exp $
 * @author       The PostNuke development team
 * @link         http://www.postnuke.com  The PostNuke Home Page
 * @copyright    Copyright (C) 2002 by the PostNuke Development Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

/**
 * Smarty function to get a colour definition from the theme
 * 
 * This function returns the html code for closing the table for the admin menu in the PostaCalendar style
 * 
 * Available parameters:
 *   - no parameters needed
 *   - assign:  If set, the results are assigned to the corresponding variable instead of printed out
 * 
 * Example
 * <!--[v4b_closeadminmenu]-->
 * 
 * 
 */
function smarty_function_v4b_closeadminmenu($params, &$smarty) 
{
    pnThemeLoad(pnUserGetTheme());
    $bgcolor1 = pnThemeGetVar('bgcolor1');
    $bgcolor2 = pnThemeGetVar('bgcolor2');
    
    $result  = "</td>\n";
    $result .= "</tr>\n";
    $result .= "</table>\n";
    $result .= "</td>\n";
    $result .= "</tr>\n";
    $result .= "</table>\n";
    $result .= "<br />\n";

    if (isset($assign)) {
        $smarty->assign($assign, $result);
    } else {
        return $result;        
    }        
}

?>