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
 *  Purpose of file: assign the specified smarty variable
 *  Copyright: Value4Business GmbH
 *  ----------------------------------------------------------------------
 */
 
/**
 * v4b_assign
 *
 * @author	Robert Gasch
 * @version     $Id: function.v4b_array_size.php,v 1.1 2005/01/21 11:10:20 rgasch Exp $
 * @param	name		the variable name we wish to assign
 * @param	value		the value we wish to assign to the named variable
 * @param	html		wether or not to pnVarPrepHTMLDisplay the value
 */ 
function smarty_function_v4b_array_size ($params, &$smarty) 
{
    $val = 0;
    if (is_array($params['array']))
        $val = count($params['array']);

    if (isset($params['assign']) && $params['assign'])
      $smarty->assign($params['assign'], $val);
    else
      return $val;
}
?>