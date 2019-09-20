<?php
// $Id: first.php,v 1.11 2005/01/10 14:42:23 markwest Exp $
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
/**
 * pnCPG Module
 *
 * This modules provides Single Signon between PN76x and Coppermine 1.4.x
 * In addition a number of PN blocks are provided
 * This block shows a specific picture
 *
 *
 * @package      Nuy.Info PostNuke Modules
 * @subpackage   pnCPG
 * @version      $Id: 3.1
 * @author       Cas Nuy
 * @link         http://www.Nuy.Info
 */


/**
 * initialise block
 *
 */
function pnCPG_specblock_init()
{
    // Security
    pnSecAddSchema('pnCPG:spec:', 'Block title::');
}

/**
 * get information on block
 *
 * @return       array       The block information
 */
function pnCPG_specblock_info()
{
    return array('text_type'      => 'spec',
                 'module'         => 'pnCPG',
                 'text_type_long' => 'Show specific picture',
                 'allow_multiple' => true,
                 'form_content'   => false,
                 'form_refresh'   => false,
                 'show_preview'   => true);
}

/**
 * display block
 *
 * @param        array       $blockinfo     a blockinfo structure
 * @return       output      the rendered bock
 */
function pnCPG_specblock_display($blockinfo)
{
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing.
	// Note that we have Example:Firstblock: as the component.
    if (!pnSecAuthAction(0,
                         'pnCPG:spec:',
                         "$blockinfo[title]::",
                         ACCESS_READ)) {
        return false;
    }

    // Get variables from content block
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // Defaults
   if (empty($vars['amount'])) {
        $vars['amount'] = 5;
   }

	// Check if the pnCPG module is available.
	if (!pnModAvailable('pnCPG')) {
		return false;
	}

$cpgloc1=pnModGetVar('pnCPG', '_CPGloc');
$cpgpath = trim($cpgloc1);
$cpgpath .= "/albums/" ;

$target = "" ;
if ($CPGwindow == 1 ) {
	$target = " target=_blank" ;
}

$db=pnModGetVar('pnCPG', '_db');
$cpgprf=pnModGetVar('pnCPG', '_prf');
$cur_usr = pnUserGetVar(uname) ;
$cur_logged =  pnUserLoggedIn() ;
$std_db = $ntPrefix = pnConfigGetVar('dbname');

$_dbhost=pnModGetVar('pnCPG', '_dbhost');
$_dbuser=pnModGetVar('pnCPG', '_dbuser');
$_dbpw=pnModGetVar('pnCPG', '_dbpw');
$_pnroot=pnModGetVar('pnCPG', '_pnroot');


// is there another database owner, let's connect
if ($_dbhost !==""){
	$link = mysql_connect($_dbhost, $_dbuser, $_dbpw) or mysql_error();
}
$true = mysql_select_db($db) ;

$query = "SELECT $cpgprf"._pictures.".owner_name, $cpgprf"._pictures.".title, $cpgprf"._pictures.".caption,$cpgprf"._pictures.".filepath,$cpgprf"._pictures.".filename,$cpgprf"._pictures.".hits,$cpgprf"._albums.".aid,$cpgprf"._pictures.".pid  from $cpgprf"._pictures.",$cpgprf"._albums."   WHERE $cpgprf"._pictures.".aid = $cpgprf"._albums.".aid and $cpgprf"._pictures.".pid = ";
$query .= $vars['amount'];
$query .= ";";

$result = mysql_query($query) or die("Query1 failed : " . mysql_error());
$items = array();
while (list($owner, $title, $caption, $path, $name, $hits,$aid,$pid) = mysql_fetch_row($result)) {
	$picture = $cpgpath ;
	$picture .= $path ;
	$picture .="thumb_";
	$picture .= $name ;

	$url = 'index.php?module=pnCPG&func=view&soort=1&album=' ;
	$url .= $aid;
	$url .= '&pos=';
	$url .= $pid ;
	$url .= $target ;

if ($title==""){
	$title= $name ;
}
	$items[] = array('url' => $url,'picture' => $picture, 'owner' => $owner, 'hits' => $hits,  'title' => $title);

}

if ($_dbhost !==""){
	include_once($_pnroot."config.php");
	// Decode encoded DB parameters
	if ($pnconfig['encoded']) {
		$pnconfig['dbuname'] = base64_decode($pnconfig['dbuname']);
		$pnconfig['dbpass'] = base64_decode($pnconfig['dbpass']);
	}
	$link = mysql_connect($pnconfig['dbhost'], $pnconfig['dbuname'], $pnconfig['dbpass']) or mysql_error();
}
$true = mysql_select_db($std_db) ;

// Create output object
	// Note that for a block the corresponding module must be passed.
	$pnRender =& new pnRender('pnCPG');


    $pnRender->assign('items', $items);

    // Populate block info and pass to theme
    $blockinfo['content'] = $pnRender->fetch('pnCPG_block_spec.htm');

    return themesideblock($blockinfo);


}


/**
 * modify block settings
 *
 * @param        array       $blockinfo     a blockinfo structure
 * @return       output      the bock form
 */
function pnCPG_specblock_modify($blockinfo)
{
    // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // Defaults
    if (empty($vars['amount'])) {
        $vars['amount'] = 5;
    }

    // Create output object
	$pnRender =& new pnRender('pnCPG');

	// As Admin output changes often, we do not want caching.
	$pnRender->caching = false;

    // assign the approriate values
	$pnRender->assign('amount', $vars['amount']);

    // Return the output that has been generated by this function
	return $pnRender->fetch('pnCPG_block_spec_modify.htm');
}


/**
 * update block settings
 *
 * @param        array       $blockinfo     a blockinfo structure
 * @return       $blockinfo  the modified blockinfo structure
 */
function pnCPG_specblock_update($blockinfo)
{
    // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

	// alter the corresponding variable
    $vars['amount'] = pnVarCleanFromInput('amount');

	// write back the new contents
    $blockinfo['content'] = pnBlockVarsToContent($vars);

	// clear the block cache
	$pnRender =& new pnRender('pnCPG');
	$pnRender->clear_cache('pnCPG_block_spec.htm');

    return $blockinfo;
}

?>
