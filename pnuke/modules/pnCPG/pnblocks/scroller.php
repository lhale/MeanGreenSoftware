<?php
/********************************************************/
/* pnCPG scrolling Block                                */
/* Written by: Cas Nuy       		                */
/* http://www.NUY.info                                  */
/********************************************************/
function pnCPG_scrollerblock_init()
{
    // Security
    pnSecAddSchema('pnCPG:scroller:', 'Block title::');
}


function pnCPG_scrollerblock_info()
{
    return array('text_type'      => 'scroller',
                 'module'         => 'pnCPG',
                 'text_type_long' => 'Scroll your coppermine pictures',
                 'allow_multiple' => true,
                 'form_content'   => false,
                 'form_refresh'   => false,
                 'show_preview'   => true);
}


function pnCPG_scrollerblock_display($blockinfo)
{
if (!pnSecAuthAction(0,
                   'pnCPG:scroller:',
                    "$blockinfo[title]::",
                     ACCESS_READ)) {
      return false;
}

global $pntable, $prefix;
$currentlang = pnUserGetLang();
$ntPrefix = pnConfigGetVar('prefix');
$cpgloc1=pnModGetVar('pnCPG', '_CPGloc');
$cpgpath = trim($cpgloc1);
$CPGwindow=pnModGetVar('pnCPG', '_CPGwindow');
$target = "" ;
if ($CPGwindow == 1 ) {
	$target = "target=_blank" ;
}
$cpgpath .= "/albums/" ;
$db=pnModGetVar('pnCPG', '_db');
$cpgprf = pnModGetVar('pnCPG', '_prf');
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



   // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // Defaults
    if (empty($vars['amount'])) {
        $vars['amount'] = 5;
    }

    if (empty($vars['soort'])) {
        $vars['soort'] = 'r';
    }
    if (empty($vars['scrolldir'])) {
        $vars['scrolldir'] = 'left';
    }
    if (empty($vars['scrollheight'])) {
        $vars['scrollheight'] = 50;
    }
    if (empty($vars['scrollamount'])) {
        $vars['scrollamount'] = 2;
    }
    if (empty($vars['scrolldelay'])) {
        $vars['scrollamount'] = 20;
    }
    if (empty($vars['exuser'])) {
        $vars['exuser'] = 'y';
    }
    if (empty($vars['shtit'])) {
        $vars['shtit'] = 'y';
    }
    if (empty($vars['scrollwidth'])) {
        $vars['scrollwidth'] = 0;


  }




$scrolldir1 = $vars['scrolldir'] ;
$scrolldir2 = $vars['scrolldir'] ;
$scrolldir3 = $vars['scrolldir'];
$scrolldir4 = $vars['scrolldir'];


if (trim($scrolldir1) == 'up'){
$content1 = "<BR><BR>";
}
if (trim($scrolldir2) == 'left'){
$content1 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
}
if (trim($scrolldir3) == 'down'){
$content1 = "<BR><BR>";
}
if (trim($scrolldir4) == 'right'){
$content1 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
}


if ($vars['soort'] != 'r'){
	$order = " order by pid Desc ";
} else {
	$order = "order by RAND() ";
}

// Incorporate Coppermine Authorizations
// take user_group  as list, compare with visibility in album
// WHERE FIND_IN_SET ('albums.visibility',view_list)>0;
// let's buid the list
if (!cur_logged) {
	$view_list="0" ;
} else {
	$view_list="0" ;
	$query0= "select user_group,user_id from $cpgprf"._users." where user_name= '$cur_usr'";
	$result0 = mysql_query($query0) or die("Query0 failed : " . mysql_error());
	$num_rows = mysql_num_rows($result0);
	if ($num_rows > 0 ){
		$row0 = mysql_fetch_row($result0) ;
		$view_list .= "," ;
		$view_list .= $row0[0] ;
		$base = 10000 ;
		$usercat = $base + $row0[1];
		$view_list .= "," ;
		$view_list .= $usercat ;
	}

}
// by now we have the bloody list
// let's try to build it into the query string
// string would be something like :
// where find_in_set( visibility, '$view_list') > 0

if ($vars['exuser'] =='y'){
$query = "SELECT $cpgprf"._pictures.".owner_name, $cpgprf"._pictures.".title, $cpgprf"._pictures.".caption,$cpgprf"._pictures.".filepath,$cpgprf"._pictures.".filename,$cpgprf"._pictures.".hits,$cpgprf"._albums.".aid,$cpgprf"._pictures.".pid  from $cpgprf"._pictures.",$cpgprf"._albums."   WHERE $cpgprf"._pictures.".aid = $cpgprf"._albums.".aid and $cpgprf"._pictures.".approved = 'YES' and category < 10000 and (find_in_set( visibility, '$view_list') > 0) and UPPER(RIGHT($cpgprf"._pictures.".filename,3))='JPG' ".$order." limit ".$vars['amount']."";
} else {
$query = "SELECT $cpgprf"._pictures.".owner_name, $cpgprf"._pictures.".title, $cpgprf"._pictures.".caption,$cpgprf"._pictures.".filepath,$cpgprf"._pictures.".filename,$cpgprf"._pictures.".hits,$cpgprf"._albums.".aid,$cpgprf"._pictures.".pid  from $cpgprf"._pictures.",$cpgprf"._albums."   WHERE $cpgprf"._pictures.".aid = $cpgprf"._albums.".aid and $cpgprf"._pictures.".approved = 'YES' and (find_in_set( visibility, '$view_list') > 0)  and UPPER(RIGHT($cpgprf"._pictures.".filename,3))='JPG' ".$order." limit ".$vars['amount']."";
}


$items = array();
$result = mysql_query($query) or die("Query3 failed : " . mysql_error());
$num_rows = mysql_num_rows($result);

while (list($owner, $title, $caption, $path, $name, $hits,$aid,$pid) = mysql_fetch_row($result)) {

$picture = $cpgpath ;
$picture .= $path ;
$picture .="thumb_";
$picture .= $name ;
$url="index.php?module=pnCPG&func=view&soort=1&album=$aid&pos=$pid";

if ($title==""){
	$title= $name ;
}


$items[] = array('url' => $url,'title' => $title, 'picture' => $picture);

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
$pnRender->assign('dir', $vars['scrolldir']);
$pnRender->assign('height', $vars['scrollheight']);
$pnRender->assign('amount1', $vars['scrollamount']);
$pnRender->assign('delay', $vars['scrolldelay']);
$pnRender->assign('width', $vars['scrollwidth']);
$pnRender->assign('content1', $content1);
$pnRender->assign('target', $target);



// Populate block info and pass to theme
$blockinfo['content'] = $pnRender->fetch('pnCPG_block_scroller.htm');
themesideblock($blockinfo);
}

function pnCPG_scrollerblock_modify($blockinfo)
{

    // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // Defaults
    if (empty($vars['amount'])) {
        $vars['amount'] = 5;
    }

    if (empty($vars['soort'])) {
        $vars['soort'] = 'r';
    }
    if (empty($vars['scrolldir'])) {
        $vars['scrolldir'] = 'left';
    }
    if (empty($vars['scrollheight'])) {
        $vars['scrollheight'] = 50;
    }
    if (empty($vars['scrollamount'])) {
        $vars['scrollamount'] = 2;
    }
    if (empty($vars['scrolldelay'])) {
        $vars['scrolldelay'] = 20;
    }
    if (empty($vars['exuser'])) {
        $vars['exuser'] = 'y';
    }
    if (empty($vars['shtit'])) {
        $vars['shtit'] = 'y';
    }
    if (empty($vars['scrollwidth'])) {
        $vars['scrollwidth'] = 0;
    }
    // Create output object
	$pnRender =& new pnRender('pnCPG');

// As Admin output changes often, we do not want caching.
	$pnRender->caching = false;

    // assign the approriate values
	$pnRender->assign('amount', $vars['amount']);
	$pnRender->assign('soort', $vars['soort']);
	$pnRender->assign('scrolldir', $vars['scrolldir']);
	$pnRender->assign('scrollheight', $vars['scrollheight']);
	$pnRender->assign('scrollamount', $vars['scrollamount']);
	$pnRender->assign('scrolldelay', $vars['scrolldelay']);
	$pnRender->assign('exuser', $vars['exuser']);
	$pnRender->assign('shtit', $vars['shtit']);
	$pnRender->assign('scrollwidth', $vars['scrollwidth']);

    // Return the output that has been generated by this function
	return $pnRender->fetch('pnCPG_block_scroller_modify.htm');

}

function pnCPG_scrollerblock_update($blockinfo)
{
   // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);
	// alter the corresponding variable
    $vars['amount'] = pnVarCleanFromInput('amount');
    $vars['soort'] = pnVarCleanFromInput('soort');
    $vars['scrolldir'] = pnVarCleanFromInput('scrolldir');
    $vars['scrollheight'] = pnVarCleanFromInput('scrollheight');
    $vars['scrollamount'] = pnVarCleanFromInput('scrollamount');
    $vars['scrolldelay'] = pnVarCleanFromInput('scrolldelay');
    $vars['exuser'] = pnVarCleanFromInput('exuser');
    $vars['shtit'] = pnVarCleanFromInput('shtit');
    $vars['scrollwidth'] = pnVarCleanFromInput('scrollwidth');

    // write back the new contents
    $blockinfo['content'] = pnBlockVarsToContent($vars);
	// clear the block cache
	$pnRender =& new pnRender('pnCPG');
	$pnRender->clear_cache('pnCPG_block_scroller.htm');

    return $blockinfo;
}
?>
