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
 * This function returns the html code for opening a table for the admin menu in the PostaCalendar style
 * 
 * Available parameters:
 *   - name:    Name of the module/directory of the module
 *   - assign:  If set, the results are assigned to the corresponding variable instead of printed out
 * 
 * Example
 * <!--[v4b_openadminmenu name="PostCalendar"]-->
 * 
 * 
 * @author       Jörg Napp
 * @since        16. Sept. 2003
 * @todo         check to work with Xanthia themes
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $default     (optional) The default value to return if the theme variable is not set
 * @return       string      the colour definition
 */
function smarty_function_v4b_openadminmenu($params, &$smarty) 
{
    pnThemeLoad(pnUserGetTheme());
    $bgcolor1 = pnThemeGetVar('bgcolor1');
    $bgcolor2 = pnThemeGetVar('bgcolor2');
    
    $result  = "<table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:100%;border:1px solid $bgcolor2;background-color:$bgcolor1;\">\n";
    $result .= "<tr>\n";
    $result .= "<td align=\"left\"><img border=\"0\" src=\"modules/$params[name]/pnimages/admin.gif\"></td>\n";
    $result .= "<td align=\"left\" valign=\"middle\" width=\"100%\">\n";
    $result .= "<table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:100%;border:1px solid $bgcolor2;background-color:$bgcolor1;\">\n";    
    $result .= "<tr>\n";
    $result .= "<td width=\"100%\">\n";

    if (isset($assign)) {
        $smarty->assign($assign, $result);
    } else {
        return $result;        
    }        
}

?>