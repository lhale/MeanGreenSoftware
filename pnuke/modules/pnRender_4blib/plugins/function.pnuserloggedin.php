<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: function.pnuserloggedin.php 18311 2006-03-23 18:45:06Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package      Xanthia_Templating_Environment
 * @subpackage   pnRender
 */


/**
 * Smarty function to get the site's charset
 *
 * This function will return the PostNuke version number
 *
 * available parameters:
 *  - assign      if set, the loggedin status will be assigned to this variable
 *
 * @author   Jörg Napp
 * @since    23 March 06
 * @param    array    $params     All attributes passed to this function from the template
 * @param    object   $smarty     Reference to the Smarty object
 * @return   bool   the logged in status
 */
function smarty_function_pnuserloggedin($params, &$smarty)
{
    extract($params);
    unset($params);

    $return = pnUserLoggedIn();

    if (isset($assign)) {
        $smarty->assign($assign, $return);
    } else {
        return $return;
    }
}

?>