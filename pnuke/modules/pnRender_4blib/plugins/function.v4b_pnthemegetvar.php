<?php
// $Id: function.v4b_pnthemegetvar.php,v 1.1 2005/01/21 11:10:20 rgasch Exp $
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
 * @version      $Id: function.v4b_pnthemegetvar.php,v 1.1 2005/01/21 11:10:20 rgasch Exp $
 * @author       The PostNuke development team
 * @link         http://www.postnuke.com  The PostNuke Home Page
 * @copyright    Copyright (C) 2002 by the PostNuke Development Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

 
/**
 * Smarty function to get a colour definition from the theme
 * 
 * This function returns the corresponding color define from the theme
 * 
 * Available parameters:
 *  - name     Name of the colour definition
 * 
 * Example
 * <!--[pnthemegetvar name="bgcolor2"]-->
 * 
 * 
 * @author       J�rg Napp
 * @since        16. Sept. 2003
 * @todo         check to work with Xanthia themes
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the colour definition
 */
function smarty_function_v4b_pnthemegetvar($params, &$smarty) 
{
    if (!isset($params['name'])) 
    {
        $smarty->trigger_error("pnthemegetvar: variable name required");
        return false;
    }    

    $name = $params['name'];

    // get value 
    pnThemeLoad(pnUserGetTheme());
    $val = pnThemeGetVar($name);
    $ret = -1;

    // process as requested
    if ($params['noprocess'])
      $ret = $val;
    else
    if ($params['html'])
      $ret = pnVarPrepHTMLDisplay($val);
    else
      $ret = pnVarPrepForDisplay($val);

    // assign or return 
    if (isset($params['assign']) && $params['assign'])
        $smarty->assign ($params['assign'], $ret);
    else
        return $ret;
}

?>