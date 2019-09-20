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
 *  Purpose of file: take a list of menu-items and generate the HTML menu code for it
 *  Copyright: Value4Business GmbH
 *  ----------------------------------------------------------------------
 */


require_once ('includes/v4blib/debug.php');


/**
 * v4b_buildmenu
 *
 * @author	Robert Gasch
 * @version     $Id: function.v4b_buildmenu.php,v 1.5 2004/12/28 23:08:31 rgasch Exp $
 * @param	assign		The smarty variable to assign the resulting menu HTML to	
 * @param	??????		More (undocumented)
 *
 */ 
function smarty_function_v4b_buildmenu ($params, &$smarty) 
{
    $cm = (int)$_GET['cm'];
    $cb = (int)$_GET['cb'];

    // forced unset
    if ($cm == -1)
    {
        unset ($_SESSION['v4bMenu']['cm']);
        unset ($_SESSION['v4bMenu']['cb']);
    }

    // if proper menu param, keep it, otherwise get it from session
    if ($cm > 0)
        $_SESSION['v4bMenu']['cm'] = $cm;
    else
    if (isset($_SESSION['v4bMenu']['cm']))
        $cm = $_SESSION['v4bMenu']['cm'];

    // if proper menu-block param, keep it, otherwise get it from session
    if ($cb > 0)
        $_SESSION['v4bMenu']['cb'] = $cb;
    else
    if (isset($_SESSION['v4bMenu']['cb']))
        $cb = $_SESSION['v4bMenu']['cb'];

    $menu = v4b_buildMenu ($params['params'], $cm, $cb, $smarty->_tpl_vars['blockid']);

    if ($params['assign'])
        $smarty->assign ($assign, $menu);

    return $menu;
}


function v4b_buildMenu ($allMenus, $currMenuIdx, $currMenuBlock, $currentBlock)
{
    $html = '';
    $currMenuPath  = v4b_createMenuPath ($allMenus, $currMenuIdx);
    $currMenuDepth = $allMenus[$currMenuIdx]['depth'];
    $isCurrentBlock  = (int)($currMenuBlock == $currentBlock);

    foreach ($allMenus as $k => $menu)
    {
        $mDepth   = $menu['depth'];
        $mUrl     = $menu['url'];
        $mName    = $menu['name'];
        $mTarget  = $menu['newwin'];

        // only do submenus in current active menu block
        if ($mDepth!=0 && !$isCurrentBlock)
             continue;
	
        // build proper indentation 
        $spc = '';
        for ($i=0; $i<$mDepth; $i++)
            $spc .= '&nbsp;&nbsp;&nbsp;&nbsp;';

        $selected = (($k === $currMenuIdx) && $isCurrentBlock);
        $menuPath = v4b_createMenuPath ($allMenus, $k);
		
        // find the parent level of this menu 
        $mParentPath = rtrim(rtrim($menuPath, "/"), "0..9");
    
        // pulled the identical calls apart in order to make the 
        // logic a bit less convoluted. 
        if ($mDepth == 0)
            $html .= v4b_createMenuEntryHTML ($mUrl, $mName, $mDesc, $mTarget, $spc, $selected, 'js_'.$k.'_'.$currentBlock);
        else if ($currMenuIdx>0)
        {
             if ( (strpos($menuPath, $currMenuPath)===0 && $mDepth <= $currMenuDepth + 1) ||
                  (strpos($currMenuPath, $mParentPath)===0) )
             {
                 $html .= v4b_createMenuEntryHTML ($mUrl, $mName, $mDesc, $mTarget, $spc, $selected, 'js_'.$k.'_'.$currentBlock);
             }
        }
    }

    return $html;
}


function v4b_createMenuPath ($allMenus, $currMenuIdx)
{
    $path = '/'; 
    $currMenu = $allMenus[$currMenuIdx];

    if ($currMenu['depth'] == 0)
        return '/' . $currMenuIdx . $path;


    for ($i=$currMenuIdx; $i>=0; $i=$j)
    {
        // find the parent level of this indendation 
        for ($j=$i-1; $j>=0; $j--)
        {
            if ($allMenus[$j]['depth'] < $allMenus[$i]['depth'])
                break;
        }

	// build path 
        if ($allMenus[$i]['depth'] > $allMenus[$j]['depth'])
            $path = '/' . $i . $path;

        // done 
        if ($allMenus[$i]['depth'] == 0)
	    break;
    }

    return $path;
}


function v4b_createMenuEntryHTML ($url, $text, $desc, $target, $spc, $selected=false, $js_text)
{
    $spc_size = strlen($spc);
    $targettxt = '';
    if ($target)
        $targettxt = 'target="_blank"';
    
    $pnRender = new pnRender('pnRender', false);
    $pnRender->assign ('js_text',$js_text);
    $pnRender->assign ('selected',$selected);
    $pnRender->assign ('targettxt',$targettxt);
    $pnRender->assign ('url',$url);
    $pnRender->assign ('text',$text);
    $pnRender->assign ('desc',$desc);
    $pnRender->assign ('spc',$spc);
    $pnRender->assign ('spc_size',$spc_size);
    
    $tpl = 'v4b_pnmenu_list_items.html';
    return $pnRender->fetch($tpl);
}
?>