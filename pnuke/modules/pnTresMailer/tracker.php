<?php

	$pnconfig = array();
	include ('../../config.php');
    $dbhost = $pnconfig['dbhost'];
    $dbname = $pnconfig['dbname'];
    $dbuname = base64_decode($pnconfig['dbuname']);
    $dbpass = base64_decode($pnconfig['dbpass']);
    $prefix = $pnconfig['prefix'];
	mysql_connect($dbhost,$dbuname,$dbpass) or die('ERROR: ' . mysql_error() . '');
	mysql_select_db($dbname);

//	$ip_address = $_SERVER['REMOTE_ADDR'];
//	$res='nslookup -timeout=3 -retry=1 $ip_address';
//	if (preg_match('/\nName:(.*)\n/', $res, $out)) {
//		$ip_address = trim($out[1]);
//		}
//	$browser = $_SERVER['HTTP_USER_AGENT'];
//	$host = gethostbyaddr($REMOTE_ADDR);
//	$port = $_SERVER['REMOTE_PORT'];
	$arch_mid = $arch_mid;
	$sub_reg_id = $sub_reg_id;

//	list($date) = getdate();

	$sql = mysql_query("UPDATE $prefix"._nl_arch_subscriber." SET arch_read = '1' WHERE sub_reg_id = '$sub_reg_id' AND arch_mid = '$arch_mid'");

?>