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
 *  Purpose of file: extended pnml implementation with assign functionality
 *  Copyright: Value4Business GmbH
 *  ----------------------------------------------------------------------
 */

/**
 * pnml: same as pnml() but with the added option to assign the result to a smarty variable
 *
 * @author	Robert Gasch
 * @version     $Id: function.v4b_inputvar.php,v 1.2 2005/01/26 22:42:54 rgasch Exp $
 * @param	assign		The smarty variable to assign the resulting menu HTML to	
 * @param	html		Wether or not to pnVarPrepHTMLDisplay'ize the ML value
 * @param	name		The name of the ML tag to translate
 * @param	noprocess       If set, no processing is applied to the constant value
 *
 */ 
function smarty_function_v4b_inputvar ($params, &$smarty)
{
    if (!$params['name']) 
      {
      $smarty->trigger_error('v4b_inputvar: attribute name required');
      return false;
      }

    if (!$params['var']) 
      {
      $smarty->trigger_error('v4b_inputvar: attribute var required');
      return false;
      }

    $name    = $params['name'];
    $var     = $params['var'];
    $default = $params['default'];

    if ($name == '_SESSION')
      $val = $_SESSION[$var];
    else
    if ($name == '_POST')
      $val = $_POST[$var];
    else
    if ($name == '_GET')
      $val = $_GET[$var];
    else
    if ($name == '_REQUEST')
      $val = $_REQUEST[$var];

    if ($default || $default === 0)
      if (!$val && $val !== 0)
        $val = $default;

    if (isset($params['assign']) && $params['assign'])
        $smarty->assign ($params['assign'], $val);
    else 
        return $val;
}

?>