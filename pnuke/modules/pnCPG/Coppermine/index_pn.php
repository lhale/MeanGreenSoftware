<?php
// ------------------------------------------------------------------------- //
//  Coppermine Photo Gallery                                                 //
// ------------------------------------------------------------------------- //
//  Copyright (C) 2002,2003  Grégory DEMAR <gdemar@wanadoo.fr>               //
//  http://www.chezgreg.net/coppermine/                                      //
// ------------------------------------------------------------------------- //
//  Based on PHPhotoalbum by Henning Støverud <henning@stoverud.com>         //
//  http://www.stoverud.com/PHPhotoalbum/                                    //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
// ------------------------------------------------------------------------- //
$reqVar = '_' . $_SERVER['REQUEST_METHOD'];
$form_vars = $$reqVar;
$parm = $form_vars['parm'] ;
$check = $form_vars['check'] ;

$url = explode("|", $parm);

$f_username = $url[0];
$f_users = $url[1];
$soort = $url[2] ;
$albumCPG = $url[3] ;
$posCPG = $url[4] ;
$direct= $url[5] ;
$home= $url[6] ;
$home .= "user.php?op=loginscreen&module=NS-User" ;
$lang= $url[7] ;
$cat = $url[8] ;
$makealbum = $url[9] ;
$theme= $url[10] ;
$guestalbum = $url[11];
$guestorg = $url[12] ;
$sendmail= $url[13] ;
$usermail = $url[14] ;
$dudpwd = $url[15] ;

if ($f_username==""){
	if ($guestorg =='n'){
		header ("Location : $home") ;
		exit;
	}
}

$f_username=str_replace(".","_", $f_username);
$f_username=str_replace("{","_", $f_username);
$f_username=str_replace("}","_", $f_username);


if ($guestalbum==""){
	$guestalbum= $f_username;
}


if ($guestorg =='y'){
	if ($url[5] !=""){
		$soort=0;
	}
}

define('IN_COPPERMINE', true);
define('LOGIN_PHP', true);


require('include/init.inc.php');

$login_failed = '';
$cookie_warning = '';
$referer = dirname(__FILE__);

$where = $_SERVER['PHP_SELF'];
$referer = dirname ($where);

if ($cat>1){
	$soort=4;
}
if ($url[5] !=""){
	if ($url[5]== "upload"){
		$soort=90 ;
	}else{
		$soort=99;
	}
}


switch($soort) {
	case 0:
		if ($url[8]==""){
			$referer .= '/index.php?lang=';
			$referer .= $lang;
			$referer .= '&theme=';
			$referer .= $theme;
		}else{
			$referer .= '/index.php?cat=';
			$referer .= $cat ;
			$referer .= '&lang=';
			$referer .= $lang;
			$referer .= '&theme=';
			$referer .= $theme;
		}
		break ;
	case 1:
		$posCPG1 = $posCPG * -1 ;
		$referer .= '/displayimage.php?album=random&pos=';
		$referer .= $posCPG1 ;
		$referer .= '&lang=';
		$referer .= $lang;
		$referer .= '&theme=';
		$referer .= $theme;
		break ;
	case 2:
		$referer .= '/thumbnails.php?album=';
		$referer .= $albumCPG ;
		$referer .= '&lang=';
		$referer .= $lang;
		$referer .= '&theme=';
		$referer .= $theme;
		break ;
	case 3:
		$referer .= '/ecard.php?album=';
		$referer .= $albumCPG ;
		$referer .= '&pid=' ;
		$referer .= $posCPG ;
		$referer .= '&lang=';
		$referer .= $lang;
		$referer .= '&theme=';
		$referer .= $theme;
		break ;
	case 4:
		$referer .= '/index.php?cat=';
		$referer .= $cat ;
		$referer .= '&lang=';
		$referer .= $lang;
		$referer .= '&theme=';
		$referer .= $theme;
		break ;
	case 90:
		$referer .= '/upload.php';
		$referer .= '?lang=';
		$referer .= $lang;
		$referer .= '&theme=';
		$referer .= $theme;
		break ;
}


// if we have a password, let's check if you exist in the Coppermine database
$f_pwd= base64_decode($dudpwd );

if ($f_pwd != ""){
	$results = mysql_query( "SELECT user_password FROM {$CONFIG['TABLE_USERS']} WHERE  user_name='$f_username' AND user_active = 'YES'  AND user_password != ''" );
	$num_rows = mysql_num_rows($results);
	if ($num_rows < 1){
	// never logged on before, set you up within Coppermine
               if ($CONFIG['enable_encrypted_passwords']) {
                        $encpassword = md5($f_pwd);
                } else {
                        $encpassword = $f_pwd;
                }
		$adding = mysql_query("INSERT INTO {$CONFIG['TABLE_USERS']}(user_group, user_active,user_name, user_password,user_lastvisit, user_regdate) VALUES ('2','YES', '$f_username','$encpassword',NOW(), NOW())");

		$USER_DATA = $cpg_udb->login( addslashes("$f_username"), addslashes("$f_pwd") ) ;

		if ($makealbum == 'y'){
			$USER_DATA = mysql_fetch_array($results);
			$temp_user_cat = $USER_DATA['user_id'];
			$temp_user_cat = $temp_user_cat + 10000;
			mysql_query("INSERT INTO {$CONFIG['TABLE_ALBUMS']}(title, description, visibility, uploads, comments, votes, pos, category, pic_count, thumb, last_addition, stat_uptodate, keyword) VALUES ('$guestalbum', '', '0', 'NO', 'YES', 'YES', '1', '$temp_user_cat', '0', '0', '0', 'NO', '$f_username')");
		}

		if ($sendmail == 1){
			$tekst="Your password for this Coppermine site  ";
			$tekst .= " is : ";
			$tekst .= $f_pwd ;
			$subject = "Password for the Coppermine site, user ";
			$subject .= $f_username ;
			mail($usermail, $subject, $tekst);
		}

	} else {
		if ($CONFIG['enable_encrypted_passwords']) {
			$encpassword = md5($f_pwd);
		} else {
			$encpassword = $f_pwd;
		}
		$sql= "UPDATE {$CONFIG['TABLE_USERS']} set user_password = '$encpassword' WHERE user_name = '$f_username' LIMIT 1";
		$result = mysql_query($sql)or die("cannot update: " . mysql_error());
		$USER_DATA = $cpg_udb->login( addslashes("$f_username"), addslashes("$f_pwd") ) ;
		// every thing should be setup and checked now, on to the login
	}
}


if ($f_pwd != ""){
	setcookie($CONFIG['cookie_name'] . '_pass', '', time()-86400, $CONFIG['cookie_path']);
	setcookie($CONFIG['cookie_name'] . '_uid', '', time()-86400, $CONFIG['cookie_path']);
	$USER_DATA = $cpg_udb->login( addslashes("$f_username"), addslashes("$f_pwd") ) ;
}else{


	if ($f_username !=""){
		$sql= "SELECT user_password FROM {$CONFIG['TABLE_USERS']} WHERE  user_name='$f_username' AND user_active = 'YES'  AND user_password != ''" ;
		$results = mysql_query($sql)or die("problem: " . mysql_error());
		$num_rows = mysql_num_rows($results);
	}else{
		$num_rows=0;
	}
if ($num_rows < 1){
	if ($f_username !=""){
		if ($f_users != ''){
			// Insert the new user
			$cpg_pwd = ranpass() ;
			$adding = mysql_query("INSERT INTO {$CONFIG['TABLE_USERS']}(user_group, user_active,user_name, user_password,user_lastvisit, user_regdate) VALUES ('2','YES', '$f_username','$cpg_pwd',NOW(), NOW())");

			$results = mysql_query( "SELECT user_password FROM {$CONFIG['TABLE_USERS']} WHERE  user_name='$f_username' AND user_active = 'YES'  AND user_password != ''" );

			$f_pwd = mysql_result( $results ,0);
			$USER_DATA = $cpg_udb->login( addslashes("$f_username"), addslashes("$f_pwd") ) ;

			if ($makealbum == 'y'){
				$USER_DATA = mysql_fetch_array($results);
				$temp_user_cat = $USER_DATA['user_id'];
				$temp_user_cat = $temp_user_cat + 10000;
				mysql_query("INSERT INTO {$CONFIG['TABLE_ALBUMS']}(title, description, visibility, uploads, comments, votes, pos, category, pic_count, thumb, last_addition, stat_uptodate, keyword) VALUES ('$f_username', '', '0', 'NO', 'YES', 'YES', '1', '$temp_user_cat', '0', '0', '0', 'NO', '$f_username')");
			}

			if ($sendmail == 1){
				$tekst="Your password for this Coppermine site  ";
//				$tekst .= $cpgdomain;
				$tekst .= " is : ";
				$tekst .= $cpg_pwd ;
				$subject = "Password for the Coppermine site, user ";
				$subject .= $f_username ;
				mail($usermail, $subject, $tekst);
			}

		}
	}
}else {
	setcookie($CONFIG['cookie_name'] . '_pass', '', time()-86400, $CONFIG['cookie_path']);
	setcookie($CONFIG['cookie_name'] . '_uid', '', time()-86400, $CONFIG['cookie_path']);

	$f_pwd = mysql_result( $results ,0);
	$USER_DATA = $cpg_udb->login( addslashes("$f_username"), addslashes("$f_pwd") ) ;
}

}

// first check if we need to amend the referer, only if we have results
if ($url[5] !=""){
if ($url[5] !="upload"){
	$cat1 = $USER_DATA['user_id'];
	$cat1 =$cat1 + 10000 ;
	$referer .= '/index.php?cat=';
	$referer .= $cat1 ;
	$referer .= '&lang=';
	$referer .= $lang;
	$referer .= '&theme=';
	$referer .= $theme;
}
}

//pageheader($lang_login_php['login'],"<META http-equiv=\"refresh\" content=\"0;url=$referer\">");
header("Location:$referer");
pagefooter();
exit;


function ranpass($len = "8"){
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
