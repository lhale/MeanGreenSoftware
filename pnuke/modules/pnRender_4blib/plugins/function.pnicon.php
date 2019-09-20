<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2002, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: function.pnicon.php 18167 2006-03-16 01:49:56Z drak $
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
 *   - type:          The type of image to render (example: save)
 *   - size:           The size of the image (extrasmall - small - large - default:extrasmall)
 *   - width, height: If set, they will be passed. If none is set, they are obtained from the 'size' parameter
 *   - alt:           If not set, an empty string is being assigned
 *   - altml:         If true then alt string is assumed to be a ML constant
 *   - title:         If not set, an empty string is being assigned
 *   - titleml:       If true then title string is assumed to be a ML constant
 *   - assign:        If set, the results are assigned to the corresponding variable instead of printed out
 *   - optional       If set then the plugin will not return an error if an image is not found
 *   - default        If set then a default image is used should the requested image not be found (Note: full path required)
 *   - all remaining parameters are passed to the image tag
 *
 * Example: <!--[pnicon type="save" size="extrasmall" altml="_SAVE"]-->
 * Output:  <img src="images/icons/extrasmall/save.png" alt="Save" />
 *
 * Example: <!--[pnicon type="save" width="100" border="1" alt="foobar" ]-->
 * Output:  <img src="images/icons/extrasmall/save.png" width="100" border="1" alt="foobar"  />
 *
 * If the parameter assign is set, the results are assigned as an array. The components of
 * this array are the same as the attributes of the img tag; additionally an entry 'imgtag' is
 * set to the complete image tag.
 *
 * Example:
 * <!--[pnicon src="heading.gif" assign="myvar"]-->
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
 * @author       Joerg Napp / Simon Birtwistle
 * @since        05. Nov. 2003
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      The img tag
 */
function smarty_function_pnicon($params, &$smarty)
{
    // get the parameters
    extract($params);
    unset($params['type']);
    unset($params['assign']);
    unset($params['altml']);
    unset($params['titleml']);
    unset($params['optional']);
    unset($params['default']);

    if (!isset($type)) {
        $smarty->trigger_error('pnicon: attribute \'type\' required');
        return false;
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
    if (!isset($size)) {
        $size = 'extrasmall';
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
    //$lang =  pnVarPrepForOS(pnUserGetLang());

    $cWhereIsPerso = WHERE_IS_PERSO;
    if (!(empty($cWhereIsPerso))) {
        $iconpath = $cWhereIsPerso . 'images/icons/';
    } else {
        $iconpath = 'images/icons/';
    }

    // Include icon config file
    if (file_exists($iconpath . 'config.php') && !isset($icons)) {
        include($iconpath . 'config.php');
    }

    $size = pnVarPrepForOS($size);
    $filename = pnVarPrepForOS($icons[$type]);

    $imgsrc = '';
    if (isset($icons[$type])) {
        $imgpath = $iconpath.$size.'/'.$icons[$type];
        if (file_exists($imgpath) && is_readable($imgpath)) {
            $imgsrc = $imgpath;
        }
    }

    if ($imgsrc == '' && isset($default)) {
        $imgsrc = $default;
    }

    if ($imgsrc == '') {
        if (!isset($optional)) {
            $smarty->trigger_error("pnicon: image $type not found");
        }
        return;
    }

    // If neither width nor height is set, get these parameters.
    // If one of them is set, we do NOT obtain the real dimensions.
    // This way it is easy to scale the image to a certain dimension.
    if(!isset($params['width']) && !isset($params['height'])) {
        if(!$_image_data = @getimagesize($imgsrc)) {
            $smarty->trigger_error("pnimg: image $type is not a valid image file");
            return false;
        }
        $params['width']  = $_image_data[0];
        $params['height'] = $_image_data[1];
    }

    $imgtag = '<img src="'.pnGetBaseURI().'/'.$imgsrc.'" ';
    foreach ($params as $key => $value) {
        $imgtag .= $key . '="' .$value  . '" ';
    }
    $imgtag .= ' />';

    if (isset($assign)) {
        $params['src'] = $imgsrc;
        $params['imgtag'] = $imgtag;
        $smarty->assign($assign, $params);
    } else {
        return $imgtag;
    }
}
?>