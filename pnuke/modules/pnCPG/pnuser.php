<?php
function pnCPG_user_main() {

$direct = pnVarCleanFromInput('task');
$lang = pnVarCleanFromInput('lang');
$cat = pnVarCleanFromInput('category');
$theme = pnVarCleanFromInput('theme');
$username=pnUserGetVar(uname);
$username1 = $username ;
$CPGloc1=pnModGetVar('pnCPG', '_CPGloc');
$CPGloc=trim($CPGloc1);
$CPGwindow=pnModGetVar('pnCPG', '_CPGwindow');
$CPGguest=pnModGetVar('pnCPG', '_CPGguest');
$CPGguestorg=pnModGetVar('pnCPG', '_CPGguestorg');
$CPGusers=pnModGetVar('pnCPG', '_CPGusers');
$CPGwrap=pnModGetVar('pnCPG', '_CPGwrap');
$CPGlang=pnModGetVar('pnCPG', '_lang');
$make=pnModGetVar('pnCPG', '_make');
$CPGtheme=pnModGetVar('pnCPG', '_theme');
$guestalbum=pnModGetVar('pnCPG', '_guestalbum');
$sendmail=pnModGetVar('pnCPG', '_sendmail');
$usermail=pnUserGetVar(email);
$uid=pnUserGetVar(uid);
$usedud=pnModGetVar('pnCPG', '_usedud');
$prefix = pnConfigGetVar('prefix');

if ($lang!=""){
$CPGlang=$lang ;
}
if ($theme!=""){
$CPGtheme=$theme ;
}
if (!pnUserLoggedIn()) {
	if ($CPGguest == 1){
		$username= "Guest" ;
	} else {
		$username= "" ;
	}
} else {

if ($usedud == "2"){
	// verify password exist
        $check_pwd = pnUserGetVar("_CPGPWD",$uid);
	// if not exist, create one
	if ($check_pwd != ""){
		$pwd = base64_encode(pnUserGetVar("_CPGPWD",$uid)) ;
	}else{
		$dudpwd1 = pnCPG_ranpass() ;
		$ok = pnUserSetVar("_CPGPWD",$dudpwd1);
		$pwd = base64_encode(pnUserGetVar("_CPGPWD",$uid)) ;
	}
}

if ($usedud == "3"){
	$ntPrefix = pnConfigGetVar('prefix');
	$ssitable = $ntPrefix ;
	$ssitable .="_ssi";
	$query = "select logon from $ssitable where uid=$uid";
    $result = mysql_query($query) ;
	$pwd = mysql_result( $result ,0);
}


}
$home = pnGetBaseURL() ;
$album = 0 ;
$parm = $username ;
$parm .="|";
$parm .= $CPGusers;
$parm .="|";
$parm .= 0 ;
$parm .="|";
$parm .= $album;
$parm .="|";
$parm .= 0 ;
$parm .="|";
$parm .= $direct ;
$parm .="|";
$parm .= $home ;
$parm .="|";
$parm .= $CPGlang ;
$parm .="|";
$parm .= $cat ;
$parm .="|";
$parm .= $make ;
$parm .="|";
$parm .= $CPGtheme ;
$parm .="|";
$parm .= $guestalbum ;
$parm .="|";
$parm .= $CPGguestorg ;
$parm .="|";
$parm .= $sendmail ;
$parm .="|";
$parm .= $usermail ;
$parm .="|";
$parm .= $pwd ;
$parm .="|";

$check=md5($parm) ;

$url="$CPGloc/index_pn.php?parm=$parm%26check=$check";

if ($CPGwindow == 1 ) {
	$url="$CPGloc/index_pn.php?parm=$parm&check=$check";
	?>
	<script type="text/javascript">
	window.open('<?php echo $url;?>')
	</script>
	<?php
}

$go = pnCPG_user_go($url) ;

return true;

}

function pnCPG_user_view() {
$album = pnVarCleanFromInput('album');
$pos = pnVarCleanFromInput('pos');
$soort = pnVarCleanFromInput('soort');
$username=pnUserGetVar(uname);
$username1 = $username ;
$CPGloc1=pnModGetVar('pnCPG', '_CPGloc');
$CPGloc=trim($CPGloc1);
$CPGwindow=pnModGetVar('pnCPG', '_CPGwindow');
$CPGguest=pnModGetVar('pnCPG', '_CPGguest');
$CPGguestorg=pnModGetVar('pnCPG', '_CPGguestorg');
$CPGusers=pnModGetVar('pnCPG', '_CPGusers');
$CPGwrap=pnModGetVar('pnCPG', '_CPGwrap');
$CPGlang=pnModGetVar('pnCPG', '_lang');
$CPGtheme=pnModGetVar('pnCPG', '_theme');
$guestalbum=pnModGetVar('pnCPG', '_guestalbum');
$sendmail=pnModGetVar('pnCPG', '_sendmail');
$usermail=pnUserGetVar(email);
$uid=pnUserGetVar(uid);
$usedud=pnModGetVar('pnCPG', '_usedud');
$prefix = pnConfigGetVar('prefix');

$make=pnModGetVar('pnCPG', '_make');
if (!pnUserLoggedIn()) {
	if ($CPGguest == 1){
		$username= "Guest" ;
	} else {
		$username= "" ;
	}
} else {

if ($usedud == "2"){
	// verify password exist
        $check_pwd = pnUserGetVar("_CPGPWD",$uid);
	// if not exist, create one
	if ($check_pwd != ""){
		$pwd = base64_encode(pnUserGetVar("_CPGPWD",$uid)) ;
	}else{
		$dudpwd1 = pnCPG_ranpass() ;
		$ok = pnUserSetVar("_CPGPWD",$dudpwd1);
		$pwd = base64_encode(pnUserGetVar("_CPGPWD",$uid)) ;
	}
}

if ($usedud == "3"){
	$ntPrefix = pnConfigGetVar('prefix');
	$ssitable = $ntPrefix ;
	$ssitable .="_ssi";
	$query = "select logon from $ssitable where uid=$uid";
    $result = mysql_query($query) ;
	$pwd = mysql_result( $result ,0);
}

}

$home = pnGetBaseURL() ;
$direct = "" ;
$parm = $username ;
$parm .="|";
$parm .= $CPGusers;
$parm .="|";
$parm .= $soort;
$parm .="|";
$parm .= $album;
$parm .="|";
$parm .= $pos;
$parm .="|";
$parm .= $direct ;
$parm .="|";
$parm .= $home ;
$parm .="|";
$parm .= $CPGlang ;
$parm .="|";
$parm .= 0 ;
$parm .="|";
$parm .= $make;
$parm .="|";
$parm .= $CPGtheme ;
$parm .="|";
$parm .= $guestalbum ;
$parm .="|";
$parm .= $CPGguestorg ;
$parm .="|";
$parm .= $sendmail ;
$parm .="|";
$parm .= $usermail ;
$parm .="|";
$parm .= $pwd ;
$parm .="|";

$check=md5($parm) ;

$url="$CPGloc/index_pn.php?parm=$parm%26check=$check";

if ($CPGwindow == 1 ) {
	$url="$CPGloc/index_pn.php?parm=$parm&check=$check";
	?>
	<script type="text/javascript">
	window.open('<?php echo $url;?>')
	</script>
	<?php
}

$go = pnCPG_user_go($url) ;

return true;
}

function pnCPG_user_go($url=""){

$CPGwindow=pnModGetVar('pnCPG', '_CPGwindow');
$guest=pnModGetVar('pnCPG', '_CPGguest');
$useat=pnModGetVar('pnCPG', '_useat');
$home = pnGetBaseURL() ;
$home .= "user.php?op=loginscreen&module=NS-User" ;
if (!pnUserLoggedIn()) {
	if ($guest<1){
		pnRedirect($home) ;
	}
}

include("header.php");

if ($CPGwindow != 1 ) {
echo "<script language='javascript' type='text/javascript'>";
echo "function iFrameHeight() {";
echo "  var h = 0;";
echo "	if ( !document.all ) {";
echo "		h = document.getElementById('blockrandom').contentDocument.height;";
echo "		document.getElementById('blockrandom').style.height = h + 60 + 'px';";
echo "	} else if( document.all ) {";
echo "		h = document.frames('blockrandom').document.body.scrollHeight;";
echo "		document.all.blockrandom.style.height = h + 20 + 'px';";
echo "	}";
echo "}";
echo "</script>";
echo "<iframe onload='iFrameHeight()' id='blockrandom' name='pnCPG'";
echo "  src='$url' width='100%' height='400' scrolling='auto' align='top' frameborder='0'>";
echo "</iframe>";
}else{
echo pnVarPrepHTMLDisplay(_PNCPG_LAUNCHED);
}
if ($useat != 1){
	include("footer.php");
}
return true;


}

function pnCPG_ranpass($len = "8"){
 $pass = NULL;
 for($i=0; $i<$len; $i++) {
   $char = chr(rand(48,122));
   while (!ereg("[a-zA-Z0-9]", $char)){
     if($char == $lchar) continue;
     $char = chr(rand(48,90));
   }
   $pass .= $char;
   $lchar = $char;
 }
 return $pass;
}



?>