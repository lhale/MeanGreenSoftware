<?php
function pnCPG_randomblock_init()
{
    // Security
    pnSecAddSchema('pnCPG:random:', 'Block title::');
}

/**
 * get information on block
 *
 * @return       array       The block information
 */
function pnCPG_randomblock_info()
{
    return array('text_type'      => 'random',
                 'module'         => 'pnCPG',
                 'text_type_long' => 'Show random images',
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
function pnCPG_randomblock_display($blockinfo)
{
    // Security check - important to do this as early as possible to avoid
    // potential security holes or just too much wasted processing.
	// Note that we have Example:Firstblock: as the component.
    if (!pnSecAuthAction(0,
                         'pnCPG:random:',
                         "$blockinfo[title]::",
                         ACCESS_READ)) {
        return false;
    }

    // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // Defaults
    if (empty($vars['amount'])) {
        $vars['amount'] = 5;
    }

    if (empty($vars['shrandom'])) {
        $vars['shrandom'] = 'y';
    }
    if (empty($vars['shalbum'])) {
        $vars['shalbum'] = 'y';
    }
    if (empty($vars['shlast'])) {
        $vars['shlast'] = 'y';
    }
    if (empty($vars['usejava'])) {
        $vars['usejava'] = 'y';
    }
    if (empty($vars['loadjava'])) {
        $vars['loadjava'] = 'y';
    }
    if (empty($vars['showmenu'])) {
        $vars['showmenu'] = 'L';
    }
    if (empty($vars['nouser'])) {
        $vars['nouser'] = 'n';
    }
    if (empty($vars['show1'])) {
        $vars['show1'] = 'y';
    }
    if (empty($vars['show2'])) {
        $vars['show2'] = 'y';
    }
    if (empty($vars['show3'])) {
        $vars['show3'] = 'y';
    }
    if (empty($vars['shstats'])) {
        $vars['shstats'] = 'y';
    }
    if (empty($vars['amount2'])) {
        $vars['amount2'] = 100;
    }


$cpgloc1=pnModGetVar('pnCPG', '_CPGloc');
$cpgpath = trim($cpgloc1);
$cpgpath .= "/albums/" ;
$target = "" ;
if ($CPGwindow == 1 ) {
	$target = "target=_blank" ;
}
$db=pnModGetVar('pnCPG', '_db');
$cpgprf=pnModGetVar('pnCPG', '_prf');
$std_db = $ntPrefix = pnConfigGetVar('dbname');
$cur_usr = pnUserGetVar(uname) ;
$cur_logged =  pnUserLoggedIn() ;
$pcModInfo = pnModGetInfo(pnModGetIDFromName('pnCPG'));
$ModName = pnVarPrepForOS($pcModInfo['directory']);
$_dbhost=pnModGetVar('pnCPG', '_dbhost');
$_dbuser=pnModGetVar('pnCPG', '_dbuser');
$_dbpw=pnModGetVar('pnCPG', '_dbpw');
$_pnroot=pnModGetVar('pnCPG', '_pnroot');


// is there another database owner, let's connect
if ($_dbhost !==""){
	$link = mysql_connect($_dbhost, $_dbuser, $_dbpw) or mysql_error();
}
$true = mysql_select_db($db) ;

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



if ($vars['shstats'] == 'y'){


// number of Albums
$query="SELECT * FROM $cpgprf"._albums."" ;
$result = mysql_query($query) or die("Query1 failed : " . mysql_error());
$numalbums = mysql_num_rows($result);

// number of pictures
$query="SELECT * FROM $cpgprf"._pictures."" ;
$result = mysql_query($query) or die("Query1 failed : " . mysql_error());
$numpic = mysql_num_rows($result);

// number of hits
$query="SELECT SUM(hits) FROM $cpgprf"._pictures."" ;
$result = mysql_query($query) or die("Query1 failed : " . mysql_error());
$row = mysql_fetch_row( $result );
$numhits= $row[0] ;


// number of votes
$query="SELECT SUM(votes) FROM $cpgprf"._pictures."" ;
$result = mysql_query($query) or die("Query1 failed : " . mysql_error());
$row = mysql_fetch_row( $result );
$numvotes= $row[0] ;

// number of comments
$query="SELECT * FROM $cpgprf"._comments."" ;
$result = mysql_query($query) or die("Query1 failed : " . mysql_error());
$numcomments = mysql_num_rows($result);

}





if ($vars['shrandom'] == 'y'){

	if ($vars['nouser'] == 'y'){
		$query = "SELECT $cpgprf"._pictures.".owner_name, $cpgprf"._albums.".title, $cpgprf"._pictures.".caption,$cpgprf"._pictures.".filepath,$cpgprf"._pictures.".filename,$cpgprf"._pictures.".hits,$cpgprf"._albums.".aid,$cpgprf"._pictures.".pid  from $cpgprf"._pictures.",$cpgprf"._albums."   WHERE $cpgprf"._pictures.".aid = $cpgprf"._albums.".aid and $cpgprf"._pictures.".approved = 'YES' and category < 10000  and find_in_set( visibility, '$view_list') > 0 and UPPER(RIGHT($cpgprf"._pictures.".filename,3))='JPG' order by RAND() limit 1 ";
	} else {
		$query = "SELECT $cpgprf"._pictures.".owner_name, $cpgprf"._albums.".title, $cpgprf"._pictures.".caption,$cpgprf"._pictures.".filepath,$cpgprf"._pictures.".filename,$cpgprf"._pictures.".hits,$cpgprf"._albums.".aid,$cpgprf"._pictures.".pid  from $cpgprf"._pictures.",$cpgprf"._albums."   WHERE $cpgprf"._pictures.".aid = $cpgprf"._albums.".aid and $cpgprf"._pictures.".approved = 'YES' and find_in_set( visibility, '$view_list') > 0 and UPPER(RIGHT($cpgprf"._pictures.".filename,3))='JPG' order by RAND() limit 1 ";
	}
	$result = mysql_query($query) or die("Query1 failed : " . mysql_error());
	$items = array();
	while (list($owner, $title, $caption, $path, $name, $hits,$aid,$pid) = mysql_fetch_row($result)) {
		$picture = $cpgpath ;
		$picture .= $path ;
		$picture .="thumb_";
		$picture .= $name ;
		if ($title==""){
			$title= $name ;
		}
		$url="index.php?module=pnCPG&func=view&soort=1&album=$aid&pos=$pid";
		$popup1="" ;
		$menu1="" ;
		if ($vars['usejava'] == 'y'){
			$expand = _PNCPG_EXPAND;
			$go = _PNCPG_GO_ALBUM ;
			$email = _PNCPG_ECARD ;
			if ($vars['showmenu'] == "L"){
				$menu1 = "LEFT" ;
			} else {
				$menu1 = "RIGHT" ;
			}
			if ($vars['show1'] == 'y'){
				$popup1 .= "<a href=index.php?module=pnCPG&func=view&soort=1&album=$aid&pos=$pid ".$target.">$expand</a>" ;
				$popup1 .= "<br>";
			}
			if ($vars['show2'] == 'y'){
				$popup1 .= "<a href=index.php?module=pnCPG&func=view&soort=2&album=$aid&pos=0".$target.">$go</a>" ;
				$popup1 .= "<br>";
			}
			if ($vars['show3'] == 'y'){
				$popup1 .= "<a href=index.php?module=pnCPG&func=view&soort=3&album=$aid&pos=$pid ".$target.">$email</a>" ;
			}
		}
		$items[] = array('url' => $url,'picture' => $picture, 'owner' => $owner, 'hits' => $hits,  'title' => $title, 'caption' => $caption);
	}
}

if ($vars['shalbum'] == 'y'){
	if ($vars['nouser'] == 'y'){
		$private='y';
	}else{
		$private='n';
	}
	$query = "SELECT  pid,aid from $cpgprf"._pictures." where approved = 'YES' order by pid desc limit ".$vars['amount2']." ";
	$result = mysql_query($query) or die("Query2 failed : " . mysql_error());
	$last_albums = array() ;
	$alb_num = 0;
	while (list($pid,$aid) = mysql_fetch_row($result)) {
		if (!in_array($aid, $last_albums)) {
			$alb_num ++;
			$last_albums[$alb_num] = $aid ;
		}
	}
	$num_alb= 1 ;
	$counter2=0 ;
	$items2 = array();
	while ($num_alb<=$alb_num and $counter2<$vars['amount']){
		if ($private == 'y'){
			$query1 = "SELECT title,aid,category  from $cpgprf"._albums."  where find_in_set( visibility, '$view_list') > 0 and category < 10000 and  aid='$last_albums[$num_alb]' ";
		} else{
			$query1 = "SELECT title,aid,category  from $cpgprf"._albums."  where find_in_set( visibility, '$view_list') > 0 and  aid='$last_albums[$num_alb]' ";
		}
		$result1 = mysql_query($query1) or die("Query failed : " . mysql_error());
		$num_rows = mysql_num_rows($result1);
		if ($num_rows>0){
			$row1 = mysql_fetch_row($result1) ;
			$title = $row1[0];
			$aid1 = $row1[1];
			$content .= "<center>" ;
			$url="index.php?module=pnCPG&func=view&soort=2&album=".$aid1." ".$target."";

		$items2[] = array('url' => $url, 'title' => $title);
			$counter2 ++;
		}
		$num_alb ++ ;
	}
}

if ($vars['shlast'] == 'y'){
	if ($vars['nouser'] == 'y'){
		$query = "SELECT $cpgprf"._pictures.".owner_name, $cpgprf"._albums.".title, $cpgprf"._pictures.".caption,$cpgprf"._pictures.".filepath,$cpgprf"._pictures.".filename,$cpgprf"._pictures.".hits,$cpgprf"._albums.".aid,$cpgprf"._pictures.".pid  from $cpgprf"._pictures.",$cpgprf"._albums."   WHERE $cpgprf"._pictures.".aid = $cpgprf"._albums.".aid and $cpgprf"._pictures.".approved = 'YES' and $cpgprf"._albums.".category < 10000 and (find_in_set( visibility, '$view_list') > 0 ) and UPPER(RIGHT($cpgprf"._pictures.".filename,3))='JPG' order by pid desc limit 1 ";
	} else {
	$query = "SELECT $cpgprf"._pictures.".owner_name, $cpgprf"._albums.".title, $cpgprf"._pictures.".caption,$cpgprf"._pictures.".filepath,$cpgprf"._pictures.".filename,$cpgprf"._pictures.".hits,$cpgprf"._albums.".aid,$cpgprf"._pictures.".pid  from $cpgprf"._pictures.",$cpgprf"._albums."   WHERE $cpgprf"._pictures.".aid = $cpgprf"._albums.".aid and $cpgprf"._pictures.".approved = 'YES' and (find_in_set( visibility, '$view_list') > 0)  and UPPER(RIGHT($cpgprf"._pictures.".filename,3))='JPG' order by pid desc limit 1 ";
	}

	$result = mysql_query($query) or die("Query3 failed : " . mysql_error());
	$items3 = array();
	$popup2="" ;
	$menu2="" ;
	while (list($owner, $title, $caption, $path, $name, $hits,$aid,$pid) = mysql_fetch_row($result)) {
		$picture = $cpgpath ;
		$picture .= $path ;
		$picture .="thumb_";
		$picture .= $name ;
		$picture1 = $cpgpath ;
		$picture1 .= $path ;
		$picture1 .= $name ;
		$url="index.php?module=pnCPG&func=view&soort=1&album=$aid&pos=$pid";
		if ($vars['usejava'] == 'y'){
			$expand = _PNCPG_EXPAND;
			$go = _PNCPG_GO_ALBUM ;
			$email = _PNCPG_ECARD ;
			if ($vars['showmenu'] == "L"){
				$menu2 = "LEFT" ;
			} else {
				$menu2 = "RIGHT" ;
			}
			if ($vars['show1'] == 'y'){
				$popup2 .= "<a href=index.php?module=pnCPG&func=view&soort=1&album=$aid&pos=$pid ".$target.">$expand</a>" ;
				$popup2 .= "<br>";
			}
			if ($vars['show2'] == 'y'){
				$popup2 .= "<a href=index.php?module=pnCPG&func=view&soort=2&album=$aid&pos=0 ".$target.">$go</a>" ;
				$popup2 .= "<br>";
			}
			if ($vars['show3'] == 'y'){
				$popup2 .= "<a href=index.php?module=pnCPG&func=view&soort=3&album=$aid&pos=$pid ".$target.">$email</a>" ;
			}
		}
		$items3[] = array('url' => $url,'picture' => $picture, 'owner' => $owner, 'hits' => $hits,  'title' => $title, 'caption' => $caption);
	}
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


// settings
$pnRender->assign('shstats', $vars['shstats']);
$pnRender->assign('shrandom', $vars['shrandom']);
$pnRender->assign('shalbum', $vars['shalbum']);
$pnRender->assign('shlast', $vars['shlast']);
$pnRender->assign('usejava', $vars['usejava']);
$pnRender->assign('loadjava', $vars['loadjava']);

// variables
$pnRender->assign('modname', $ModName);

$pnRender->assign('target', $target);

$pnRender->assign('numalbums', $numalbums);
$pnRender->assign('numpic', $numpic);
$pnRender->assign('numhits', $numhits);
$pnRender->assign('numvotes', $numvotes);
$pnRender->assign('numcomments', $numcomments);


$pnRender->assign('items', $items);
$pnRender->assign('items2', $items2);
$pnRender->assign('items3', $items3);

$pnRender->assign('popup1', $popup1);
$pnRender->assign('popup2', $popup2);
$pnRender->assign('menu1', $menu1);
$pnRender->assign('menu2', $menu2);


// Populate block info and pass to theme
$blockinfo['content'] = $pnRender->fetch('pnCPG_block_random.htm');
themesideblock($blockinfo);
}


/**
 * modify block settings
 *
 */
function pnCPG_randomblock_modify($blockinfo)
{

    // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

    // Defaults
    if (empty($vars['amount'])) {
        $vars['amount'] = 5;
    }

    if (empty($vars['shrandom'])) {
        $vars['shrandom'] = 'y';
    }
    if (empty($vars['shalbum'])) {
        $vars['shalbum'] = 'y';
    }
    if (empty($vars['shlast'])) {
        $vars['shlast'] = 'y';
    }
    if (empty($vars['usejava'])) {
        $vars['usejava'] = 'y';
    }
    if (empty($vars['loadjava'])) {
        $vars['loadjava'] = 'y';
    }
    if (empty($vars['showmenu'])) {
        $vars['showmenu'] = 'L';
    }
    if (empty($vars['nouser'])) {
        $vars['nouser'] = 'n';
    }
    if (empty($vars['show1'])) {
        $vars['show1'] = 'y';
    }
    if (empty($vars['show2'])) {
        $vars['show2'] = 'y';
    }
    if (empty($vars['show3'])) {
        $vars['show3'] = 'y';
    }
    if (empty($vars['shstats'])) {
        $vars['shstats'] = 'y';
    }
    if (empty($vars['amount2'])) {
        $vars['amount2'] = 100;
    }


    // Create output object
	$pnRender =& new pnRender('pnCPG');

// As Admin output changes often, we do not want caching.
	$pnRender->caching = false;

   // assign the approriate values
	$pnRender->assign('amount', $vars['amount']);
	$pnRender->assign('shrandom', $vars['shrandom']);
	$pnRender->assign('shalbum', $vars['shalbum']);
	$pnRender->assign('shlast', $vars['shlast']);
	$pnRender->assign('usejava', $vars['usejava']);
	$pnRender->assign('loadjava', $vars['loadjava']);
	$pnRender->assign('showmenu', $vars['showmenu']);
	$pnRender->assign('nouser', $vars['nouser']);
	$pnRender->assign('show1', $vars['show1']);
	$pnRender->assign('show2', $vars['show2']);
	$pnRender->assign('show3', $vars['show3']);
	$pnRender->assign('shstats', $vars['shstats']);
	$pnRender->assign('amount2', $vars['amount2']);

    // Return the output that has been generated by this function
	return $pnRender->fetch('pnCPG_block_random_modify.htm');


}

/**
 * update block settings
 *
 */
function pnCPG_randomblock_update($blockinfo)
{
   // Get current content
    $vars = pnBlockVarsFromContent($blockinfo['content']);

	// alter the corresponding variable
    $vars['amount'] = pnVarCleanFromInput('amount');
    $vars['shrandom'] = pnVarCleanFromInput('shrandom');
    $vars['shalbum'] = pnVarCleanFromInput('shalbum');
    $vars['shlast'] = pnVarCleanFromInput('shlast');
    $vars['usejava'] = pnVarCleanFromInput('usejava');
    $vars['loadjava'] = pnVarCleanFromInput('loadjava');
    $vars['showmenu'] = pnVarCleanFromInput('showmenu');
    $vars['nouser'] = pnVarCleanFromInput('nouser');
    $vars['show1'] = pnVarCleanFromInput('show1');
    $vars['show2'] = pnVarCleanFromInput('show2');
    $vars['show3'] = pnVarCleanFromInput('show3');
    $vars['shstats'] = pnVarCleanFromInput('shstats');
    $vars['amount2'] = pnVarCleanFromInput('amount2');

	// write back the new contents
    $blockinfo['content'] = pnBlockVarsToContent($vars);

	// clear the block cache
	$pnRender =& new pnRender('pnCPG');
	$pnRender->clear_cache('pnCPG_block_random.htm');

    return $blockinfo;



}
?>
