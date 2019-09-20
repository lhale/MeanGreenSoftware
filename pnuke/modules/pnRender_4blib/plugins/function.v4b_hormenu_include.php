<?php

require_once ('includes/v4blib/phplayersmenu/lib/PHPLIB.php');
require_once ('includes/v4blib/phplayersmenu/lib/layersmenu-common.inc.php');
require_once ('includes/v4blib/phplayersmenu/lib/layersmenu.inc.php');

/**
 * Smarty function to display the generated menu tree data 
 * 
 * @author       Robert gasch
 * @since        01/11/2004
 * @see          
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the results of the module function
 */
function smarty_function_v4b_hormenu_include ($params, &$smarty) 
{
    if (!$params['menuString'])
      {
      exit ('no menuString in smarty_function_v4b_hormenu_include ...');
      }
      
    $output  = "\n";
    $output .= '<link rel="stylesheet" href="includes/v4blib/phplayersmenu/layersmenu-demo.css" type="text/css"></link>' . "\n";
    $output .= '<link rel="stylesheet" href="includes/v4blib/phplayersmenu/layersmenu-v4b.css" type="text/css"></link>' . "\n";
    $output .= '<script language="JavaScript" type="text/javascript" src="includes/v4blib/phplayersmenu/libjs/layersmenu-browser_detection.js"></script>' . "\n";
    $output .= '<script language="JavaScript" type="text/javascript" src="includes/v4blib/phplayersmenu/libjs/layersmenu-library.js"></script>' . "\n";
    $output .= '<script language="JavaScript" type="text/javascript" src="includes/v4blib/phplayersmenu/libjs/layersmenu.js"></script>' . "\n";

    $mid = new LayersMenu ();
    $mid->setDirroot('includes/v4blib/phplayersmenu/');
    $mid->setImgdir('includes/v4blib/phplayersmenu/images/');
    $mid->setImgwww('includes/v4blib/phplayersmenu/images/');
    $mid->setIcondir('includes/v4blib/phplayersmenu/menuicons/');
    $mid->setIconwww('includes/v4blib/phplayersmenu/menuicons/');
    $mid->setIconsize(16, 16);
    $mid->setMenuStructureString ($params['menuString']);
    $mid->parseStructureForMenu ('hormenu1');
    $mid->newHorizontalMenu ('hormenu1');
    $output .= $mid->makeHeader ();
    $output .= $mid->getMenu ('hormenu1');
    $output .= $mid->makeFooter('hormenu1');

    return $output;
}

?>