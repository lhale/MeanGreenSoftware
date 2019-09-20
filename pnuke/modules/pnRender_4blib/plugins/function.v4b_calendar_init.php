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
 *  Purpose of file: include the required files so the calendar can be used
 *  Copyright: Value4Business GmbH
 *  ----------------------------------------------------------------------
 */
 
/**
 * v4b_calendar_init: include the required files so the calendar can be used
 *
 * @author	Robert Gasch
 * @version     $Id: function.v4b_calendar_init.php,v 1.2 2004/12/28 23:08:31 rgasch Exp $
 * @param	assign		The smarty variable to assign the resulting menu HTML to	
 *
 */
function smarty_function_v4b_calendar_init ($params, &$smarty) 
{
    extract($params); 
    unset($params);
    
    $currentLang = pnSessionGetVar('lang');
    $calLang     = 'en';
    $langFile    = 'includes/v4blib/jscalendar/lang/calendar-en.js';

    if ($currentLang == 'deu')
      $calLang = 'de';

    if ($calLang != 'en')
      {
      $lF = 'includes/v4blib/jscalendar/lang/calendar-'.$calLang.'.js';
      if (file_exists ($lF))
        $langFile = $lF;
      }

    $init  = '<link rel="stylesheet" type="text/css" media="all" href="includes/v4blib/jscalendar/calendar-win2k-cold-1.css" title="win2k-cold-1"/>';
    $init .='<script type="text/javascript" src="includes/v4blib/jscalendar/calendar.js"></script>';
    $init .='<script type="text/javascript" src="'.$langFile.'"></script>';
    $init .='<script type="text/javascript" src="includes/v4blib/jscalendar/calendar-setup.js"></script>';

    if (isset($assign)) 
        $smarty->assign ($assign, $init);
    else 
        return $init;
}
?>