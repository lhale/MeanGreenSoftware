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
 * @version     $Id: function.v4b_get_category_display_by_value.php,v 1.1 2005/01/21 11:10:20 rgasch Exp $
 * @param	assign		The smarty variable to assign the resulting menu HTML to	
 * @param	html		Wether or not to pnVarPrepHTMLDisplay'ize the ML value
 * @param	name		The name of the ML tag to translate
 * @param	noprocess       If set, no processing is applied to the constant value
 *
 */ 
function smarty_function_v4b_get_category_display_by_value ($params, &$smarty)
{
    if (!$params['path']) 
    {
      $smarty->trigger_error('pnml: attribute path required');
      return false;
    }

    if (!isset($params['value'])) 
    {
      $smarty->trigger_error('pnml: attribute value required');
      return false;
    }

    Loader::loadClass ('CategoryUtil');

    $root = CategoryUtil::getCategoryByPath($params['path']);
    if (!$root) 
        return $params['path'];

    $cat = CategoryUtil::getDirectSubCategoryByValue ($root['id'], $params['value']);
    if (!$cat) 
        return $params['value'];

    $lang = pnSessionGetVar('lang');
    $val  = $cat['display_name'][$lang];

    if (!$val)
      {
      $val  = $cat['display_name']['eng'];

      if (!$val)
        $val  = $cat['name'];
      }

    // assign the ML string to the requested var name
    if (isset($params['assign']) && $params['assign']) 
      {
      if ($params['noprocess'])
        $smarty->assign ($params['assign'], $val);
      else 
      if ($params['html'])
        $smarty->assign ($params['assign'], pnVarPrepHTMLDisplay($val)); 
      else 
        $smarty->assign ($params['assign'], pnVarPrepForDisplay($val));
      } 
    // return ML string (standard pnml behaviour)
    else 
      {
      if ($params['noprocess'])
        return $val;
      if ($params['html'])
        return pnVarPrepHTMLDisplay($val);
      else
        return pnVarPrepForDisplay($val);
      }
}

?>