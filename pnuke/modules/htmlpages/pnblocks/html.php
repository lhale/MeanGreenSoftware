<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: html.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

/**
 * initialise block
 */
function htmlpages_htmlblock_init()
{
    // Security
    pnSecAddSchema('htmlpages:htmlblock:', 'Block title::');
}

/**
 * get information on block
 */
function htmlpages_htmlblock_info()
{
    // Values
    return array('text_type' => 'html',
                 'module' => 'htmlpages',
                 'text_type_long' => 'Show htmlpage in a block',
                 'allow_multiple' => true,
                 'form_content' => false,
                 'form_refresh' => false,
                 'show_preview' => true);
}

/**
 * display block
 */
function htmlpages_htmlblock_display($blockinfo)
{
    // Security check
    if (!pnSecAuthAction(0, 'htmlpages:htmlblock:', "$blockinfo[title]::", ACCESS_READ)) {
        return;
    }

    // Get variables from content block
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // return if no pid
    if (empty($vars['pid'])) {
        return;
    }

    // get the page
    $item = pnModAPIFunc('htmlpages', 'user', 'get', array('pid' => $vars['pid'], 'parse' => true));

	// check for a valid item
	if ($item == false) {
		return;
	}

    if (!pnSecAuthAction(0, 'htmlpages::', "$item[title]::$vars[pid]", ACCESS_READ)) {
        return;       
    }
     // Create output object
    if (!isset($item['content'])) {
        return;
    }

	// create the output object
	$pnRender = new pnRender('htmlpages');

	// assign the item
	$pnRender->assign($item);

    // Populate block info and pass to theme
    $blockinfo['content'] = $pnRender->fetch('htmlpages_html_block_display.htm');
    return themesideblock($blockinfo);
}

/**
 * modify block settings
 */
function htmlpages_htmlblock_modify($blockinfo)
{
	// create the output object
	$pnRender = new pnRender('htmlpages');

    // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

	// assign the block vars
	$pnRender->assign($vars);

    // Return output
    return $pnRender->fetch('htmlpages_html_block_modify.htm');
}

/**
 * update block settings
 */
function htmlpages_htmlblock_update($blockinfo)
{
    $vars['pid'] = pnVarCleanFromInput('pid');

    $blockinfo['content'] = pnBlockVarsToContent($vars);

    return $blockinfo;
}
