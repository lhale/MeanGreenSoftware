<?php 

$search_modules[] = array(
    'title' => 'pnCPG',
    'func_search' => 'search3_pncpg',
    'func_opt' => 'search3_pncpg_opt'
);

function search3_pncpg_opt() {

   global
        $bgcolor2,
        $textcolor1;

	if (!pnModAvailable('pnCPG')) {
		return;    
	}

    $output =& new pnHTML();
    $output->SetInputMode(_PNH_VERBATIMINPUT);

     if (pnSecAuthAction(0, 'pnCPG::', '::', ACCESS_READ)) {
        $output->Text("<table border=\"0\" width=\"100%\"><tr style=\"background-color:$bgcolor2\"><td>
		<span style=\"text-color:$textcolor1\">
		<input type=\"checkbox\" name=\"active_cpg3\" id=\"active_cpg3\" value=\"1\" checked=\"checked\" tabindex=\"0\" />
		&nbsp;<label for=\"active_cpg3\">Search Coppermine Comments</label>
		</span></td></tr></table>");
    }
 

    
    return $output->GetOutput();
}

function search3_pncpg() {

    list($q,
         $bool,
         $startnum,
         $total,
         $active_cpg3) = pnVarCleanFromInput('q',
                                             'bool',
                                             'startnum',
                                             'total',
                                             'active_cpg3');

    if (empty($active_cpg3)) {
        return;
    }

	if (!pnModAvailable('pnCPG')) {
		return;    
	}


global $pntable, $prefix;
$currentlang = pnUserGetLang();
$ntPrefix = pnConfigGetVar('prefix');
$std_db = $ntPrefix = pnConfigGetVar('dbname');
$cpgloc1=pnModGetVar('pnCPG', '_CPGloc');
$cpgpath = trim($cpgloc1);
$CPGwindow=pnModGetVar('pnCPG', '_CPGwindow');
$target = "" ;
if ($CPGwindow == 1 ) {
	$target = "target=_blank" ;
}
$_dbhost=pnModGetVar('pnCPG', '_dbhost');
$_dbuser=pnModGetVar('pnCPG', '_dbuser');
$_dbpw=pnModGetVar('pnCPG', '_dbpw');
$_pnroot=pnModGetVar('pnCPG', '_pnroot');

$db=pnModGetVar('pnCPG', '_db');
$cpgprf=pnModGetVar('pnCPG', '_prf');
$cur_usr = pnUserGetVar(uname) ;
$cur_logged =  pnUserLoggedIn() ;

$cpgpath .= "/albums/" ;

// is there another database owner, let's connect
if ($_dbhost !==""){
	$link = mysql_connect($_dbhost, $_dbuser, $_dbpw) or mysql_error();
}

$true = mysql_select_db($db) ;



    $output =& new pnHTML();
    $output->SetInputMode(_PNH_VERBATIMINPUT);

   if (!isset($startnum) || !is_numeric($startnum)) {
        $startnum = 1;
    }
    if (isset($total) && !is_numeric($total)) {
    	unset($total);
    }

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
	
$query = "SELECT $cpgprf"._pictures.".filename, $cpgprf"._pictures.".title,$cpgprf"._albums.".aid ,$cpgprf"._albums.".description,$cpgprf"._pictures.".pid,$cpgprf"._comments.".msg_body  from $cpgprf"._pictures.",$cpgprf"._albums.",$cpgprf"._comments."   WHERE $cpgprf"._pictures.".aid = $cpgprf"._albums.".aid and $cpgprf"._pictures.".pid = $cpgprf"._comments.".pid and $cpgprf"._pictures.".approved = 'YES' and (find_in_set( visibility, '$view_list') > 0) and ";

    $w = search_split_query($q);
    $flag = false;
    foreach($w as $word) {
        if($flag) {
            switch($bool) {
                case 'AND' :
                    $query .= ' AND ';
                    break;
                case 'OR' :
                default :
                    $query .= ' OR ';
                    break;
            }
        }
        $query .= '(';
        // faqs
        $query .= "$cpgprf"._comments.".msg_body LIKE '".pnVarPrepForStore($word)."' OR \n";
        $query .= "$cpgprf"._comments.".msg_author LIKE '".pnVarPrepForStore($word)."'\n";
        $query .= ')';
	
        $flag = true;
    }
    $result = mysql_query($query) or die("Query3 failed : " . mysql_error());
	$total = mysql_num_rows($result); 

    if ($total<>0) {
	

        $output->Text( 'Coppermine Comments: ' . $total . ' ' . _SEARCHRESULTS);
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        // Rebuild the search string from previous information
		$url="index.php?module=pnCPG&func=view&soort=1&album=$aid&pos=$pid";
       $output->Text("<dl>");
        //while(!$result->EOF) {
		$hits= 0;
while (list($name, $title,$aid, $description,  $pid,$msg) = mysql_fetch_row($result) and $hits<11 ) { 
	            $output->Text("<dt><a href=\"index.php?module=pnCPG&func=view&soort=1&album=$aid&pos=$pid\">".pnVarPrepForDisplay($name)."</a></dt>");
	            $output->Text("<dt>".pnVarPrepForDisplay($title)."</a></dt>");
	            $output->Text("<dt>".pnVarPrepForDisplay($msg)."</dt>");
	            $output->Text("<dd>".pnVarPrepForDisplay($description)."</dd>");
				$hits ++;
        }
        $output->Text('</dl>');
        // Munge URL for template
        $urltemplate = $url . "&amp;startnum=%%&amp;total=$total";
        $output->Pager($startnum,
                       $total,
                       $urltemplate,
                       10);
 
    } else {
        $output->SetInputMode(_PNH_VERBATIMINPUT);
        $output->Text('No Results within Coppermine Comments');
        $output->SetInputMode(_PNH_PARSEINPUT);
    }
    $output->Linebreak(3);

if ($_dbhost !==""){
	include_once($_pnroot."config.php");
	// Decode encoded DB parameters
	if ($pnconfig['encoded']) {
		$pnconfig['dbuname'] = base64_decode($pnconfig['dbuname']);
		$pnconfig['dbpass'] = base64_decode($pnconfig['dbpass']);
	}
	$link = mysql_connect($pnconfig['dbhost'], $pnconfig['dbuname'], $pnconfig['dbpass']) or mysql_error();
}
$true = mysql_select_db($std_db) or mysql_error();
	
    return $output->GetOutput();
}
?>