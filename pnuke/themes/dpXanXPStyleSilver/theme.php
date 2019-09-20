<?php
if (!defined('_XANTHIA_ROOT_PATH')) {
	$xanthiarootpath = pnModGetVar('Xanthia','rootpath');
	define('_XANTHIA_ROOT_PATH', $xanthiarootpath);
}

global $engine, $thename, $themepath, $imagepath, $xanthia_theme;

if (!pnModAPILoad('Xanthia', 'user')) {
	pnSessionSetVar('errormsg', _XA_APILOADFAILED);
}

$thename = basename(dirname(__FILE__));
$themepath = 'themes/'.$thename;
$imagepath = $themepath.'/images';
$postnuke_theme = true;
$xanthia_theme = true;
$skinID = pnModAPIFunc('Xanthia','user','getSkinID', array('skin' => $thename));
$engine = pnModAPIFunc('Xanthia','user','init');

if (!is_object($engine)) {
	echo _XA_FAILEDTOINITENGINE . " " . $thename;
	exit;
}

$paletteid = pnModGetVar('Xanthia',''.$thename.'use');

$colors = pnModAPIFunc('Xanthia','user','getSkinColors', array('skinid' => $skinID, 'paletteid' => $paletteid));

if (!empty($colors)) {
	$bgcolor1   = $colors['background'];
	$bgcolor2   = $colors['color1'];
	$bgcolor3   = $colors['color2'];
	$bgcolor4   = $colors['color3'];
	$bgcolor5   = $colors['color4'];
	$bgcolor6   = $colors['color5'];
	$sepcolor   = $colors['sepcolor'];
	$textcolor1 = $colors['text1'];
	$textcolor2 = $colors['text2'];

	define('_XA_TBGCOLOR',''.$colors['background'].'');
	define('_XA_TCOLOR1',$colors['color1']);
	define('_XA_TCOLOR2',$colors['color2']);
	define('_XA_TCOLOR3',$colors['color3']);
	define('_XA_TCOLOR4',$colors['color4']);
	define('_XA_TCOLOR5',$colors['color5']);
	define('_XA_TCOLOR6',$colors['color6']);
	define('_XA_TCOLOR7',$colors['color7']);
	define('_XA_TCOLOR8',$colors['color8']);
	define('_XA_TSEPCOLOR',$colors['sepcolor']);
	define('_XA_TTEXT1COLOR',$colors['text1']);
	define('_XA_TTEXT2COLOR',$colors['text2']);
	define('_XA_TLINKCOLOR',$colors['link']);
	define('_XA_TVLINKCOLOR',$colors['vlink']);
	define('_XA_THOVERCOLOR',$colors['hover']);
}

themes_get_language();

function OpenTable() {
	global $engine;
	$engine->do_themetable('start', '1');
}

function CloseTable() {
	global $engine;
	$engine->do_themetable('stop', '1');
}

function OpenTable2() {
	global $engine;
	$engine->do_themetable('start', '2');
}

function CloseTable2() {
	global $engine;
	$engine->do_themetable('stop', '2');
}

function themeheader() {
	global $engine, $thename, $index, $themepath, $imagepath;

	//$engine->load_css_file(&$Browser);        mh7: not yet re-implemented
	if ($index != 3) {
		$engine->do_themeheader($index);
	}
}

function themefooter() {
	global $engine, $index, $themepath;
	
	if ($index != 3) {
		$engine->do_themefooter($index);
	}
}

function themeindex ($_deprecated, $_deprecated, $_deprecated, $_deprecated,
        $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated,
        $_deprecated, $_deprecated, $_deprecated, $info, $links, $preformat) {

	global $engine, $index;
	
	$engine->do_themeindex($info, $links, $preformat, $index);
}

function themearticle ($_deprecated, $_deprecated, $_deprecated, $_deprecated,
        $_deprecated, $_deprecated, $_deprecated, $_deprecated, $_deprecated,
        $info, $links, $preformat) {

	global $engine;
	
	$engine->do_themearticle($info, $links, $preformat);
}

function themesidebox($block) {
	global $engine, $index, $block_side;
	
	$engine->do_themesidebox($block, $index);
}

?>