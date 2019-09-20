<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: function.pnimg.php 18931 2006-04-18 19:22:15Z landseer $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package      Xanthia_Templating_Environment
 * @subpackage   pnRender
 */


/**
 * Smarty function to provide easy access to an image
 *
 * This function provides an easy way to include an image. The function will return the
 * full source path to the image. It will as well provite the width and height attributes
 * if none are set.
 *
 * Available parameters:
 *   - src:           The file name of the image
 *   - modname:       The well-known name of a module (default: the current module)
 *   - width, height: If set, they will be passed. If none is set, they are obtained from the image
 *   - alt:           If not set, an empty string is being assigned
 *   - altml:         If true then alt string is assumed to be a ML constant
 *   - title:         If not set, an empty string is being assigned
 *   - titleml:       If true then title string is assumed to be a ML constant
 *   - assign:        If set, the results are assigned to the corresponding variable instead of printed out
 *   - optional       If set then the plugin will not return an error if an image is not found
 *   - default        If set then a default image is used should the requested image not be found (Note: full path required)
 *   - set            If modname is 'core' then the set parameter is set to define the directory in /images/
 *   - nostoponerror  If set and error ocurs (image not found or src is no image), do not trigger_error, but return false and fill pnimg_error instead
 *   - all remaining parameters are passed to the image tag
 *
 * Example: <!--[pnimg src="heading.gif" ]-->
 * Output:  <img src="modules/Example/pnimages/eng/heading.gif" alt="" width="261" height="69"  />
 *
 * Example: <!--[pnimg src="heading.gif" width="100" border="1" alt="foobar" ]-->
 * Output:  <img src="modules/Example/pnimages/eng/heading.gif" width="100" border="1" alt="foobar"  />
 *
 * Example <!--[pnimg src=xhtml11.png modname=core set=powered]-->
 * <img src="/Theme/images/powered/xhtml11.png" alt="" title="" width="88" height="31"  />
 *
 * If the parameter assign is set, the results are assigned as an array. The components of
 * this array are the same as the attributes of the img tag; additionally an entry 'imgtag' is
 * set to the complete image tag.
 *
 * Example:
 * <!--[pnimg src="heading.gif" assign="myvar"]-->
 * <!--[$myvar.src]-->
 * <!--[$myvar.width]-->
 * <!--[$myvar.imgtag]-->
 *
 * Output:
 * modules/Example/pnimages/eng/heading.gif
 * 261
 * <img src="modules/Example/pnimages/eng/heading.gif" alt="" width="261" height="69"  />
 *
 *
 * @author       Joerg Napp
 * @since        05. Nov. 2003
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      The img tag
 */
function smarty_function_pnimg($params, &$smarty)
{
    // get the parameters
    extract($params);
    unset($params['src']);
    unset($params['modname']);
    unset($params['assign']);
    unset($params['altml']);
    unset($params['titleml']);
    unset($params['optional']);
    unset($params['default']);
    unset($params['set']);
    unset($params['nostoponerror']);
    
    $nostoponerror = (isset($nostoponerror)) ? true : false;

    if (!isset($src)) {
        if($nostoponerror == true) {
            $smarty->assign('pnimg_error', 'pnimg: attribute src required');
            return;
        } else {
            $smarty->trigger_error('pnimg: attribute src required');
            return false;
        }
    }

    // default for the module
    if (!isset($modname)) {
        $modname = $smarty->module;
    }

    // if the module name is 'core' then we require an image set
    if ($modname == 'core') {
        if (!isset($set)) {
            if($nostoponerror == true) {
                $smarty->assign('pnimg_error', 'pnimg: attribute set required');
                return;
            } else {
                $smarty->trigger_error('pnimg: attribute set required');
                return false;
            }
        }
        $osset = pnVarPrepForOS($set);
    }

    // default for the optional flag
    if (!isset($optional)) {
        $optional = true;
    }

    // always provide an alt attribute.
    // if none is set, assign an empty one.
    if (!isset($alt)) {
        $params['alt'] = '';
    }
    if (!isset($title)) {
        $params['title'] = $params['alt'];
    }

    // check if the alt string is an ml constant
    if (isset($altml) && is_bool($altml) && $altml) {
        if ($params['title'] == $params['alt']) {
            $titleml = true;
        }
        $params['alt'] = constant($params['alt']);
    }

    // check if the title string is an ml constant
    if (isset($titleml) && is_bool($titleml) && $titleml) {
        $params['title'] = constant($params['title']);
    }

    // language
    $lang =  pnVarPrepForOS(pnUserGetLang());

    // theme directory
    $theme         = pnVarPrepForOS(pnUserGetTheme());
    $osmodname     = pnVarPrepForOS($modname);
    $cWhereIsPerso = WHERE_IS_PERSO;
    if (!(empty($cWhereIsPerso))) {
        $themelangpath = $cWhereIsPerso . "themes/$theme/templates/modules/$osmodname/images/$lang";
        $themepath     = $cWhereIsPerso . "themes/$theme/templates/modules/$osmodname/images";
        $corethemepath = $cWhereIsPerso . "themes/$theme/images";
    } else {
        $themelangpath = "themes/$theme/templates/modules/$osmodname/images/$lang";
        $themepath     = "themes/$theme/templates/modules/$osmodname/images";
        $corethemepath = "themes/$theme/images";
    }
    // module directory
    $modinfo       = pnModGetInfo(pnModGetIDFromName($modname));
    $osmoddir      = pnVarPrepForOS($modinfo['directory']);
    if ($modname == 'core') {
        $modpath       = "images/$osset";
    } elseif ($modinfo['type'] != 1) {
        $modlangpath   = "modules/$osmoddir/pnimages/$lang";
        $modpath       = "modules/$osmoddir/pnimages";
        $syslangpath   = "system/$osmoddir/pnimages/$lang";
        $syspath       = "system/$osmoddir/pnimages";
    } else {
        $modlangpath   = "modules/$osmoddir/images/$lang";
        $modpath       = "modules/$osmoddir/images";
        $syslangpath   = "system/$osmoddir/images/$lang";
        $syspath       = "system/$osmoddir/images";
    }
    $ossrc = pnVarPrepForOS($src);

    // form the array of paths
    if ($modname == 'core') {
        $paths = array($themepath, $corethemepath, $modpath);
    } else {
        $paths = array($themelangpath, $themepath, $corethemepath,
                       $modlangpath, $modpath, $syslangpath, $syspath);
    }

    // search for the image
    $imgsrc = '';
    foreach ($paths as $path) {
        if (file_exists("$path/$ossrc") && is_readable("$path/$ossrc")) {
            $imgsrc = "$path/$ossrc";
            break;
        }
    }

    if ($imgsrc == '' && isset($default)) {
        $imgsrc = $default;
    }

    if ($imgsrc == '') {
        if ($optional) {
            if($nostoponerror == true) {
                $smarty->assign('pnimg_error', "pnimg: image $src not found");
                return;
            } else {
                $smarty->trigger_error("pnimg: image $src not found");
                return false;
            }
        }
        return;
    }

    // If neither width nor height is set, get these parameters.
    // If one of them is set, we do NOT obtain the real dimensions.
    // This way it is easy to scale the image to a certain dimension.
    if(!isset($params['width']) && !isset($params['height'])) {
        if(!$_image_data = @getimagesize($imgsrc)) {
            if($nostoponerror == true) {
                $smarty->assign('pnimg_error', "pnimg: image $src is not a valid image file");
                return;
            } else {
                $smarty->trigger_error("pnimg: image $src is not a valid image file");
                return false;
            }
        }
        $params['width']  = $_image_data[0];
        $params['height'] = $_image_data[1];
    }

    $imgtag = '<img src="'.pnGetBaseURI().'/'.$imgsrc.'" ';
    foreach ($params as $key => $value) {
        $imgtag .= $key . '="' .$value  . '" ';
    }
    $imgtag .= '/>';

    if (isset($assign)) {
        $params['src'] = $imgsrc;
        $params['imgtag'] = $imgtag;
        $smarty->assign($assign, $params);
    } else {
        return $imgtag;
    }
}

?>