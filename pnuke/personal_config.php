<?php

/* 
 * This is this Open-Star specific config. Various hooks and 
 * flags are set here to be available through the application.
 */


$pnconfig['V4B_HTTP_SERVER']			= "http://localhost";
$pnconfig['V4B_HTTPS_SERVER']			= "https://localhost";


/* 
 * File Location Parameters
 */
$pnconfig['V4B_FILE_FS_ROOT'] 			= '/usr/local/www/html';
$pnconfig['V4B_FILE_APP_ROOT']			= 'v4b/openstar';
$pnconfig['V4B_FILE_APP_ROOT_PATH']		= "$pnconfig[V4B_FILE_FS_ROOT]/$pnconfig[V4B_FILE_APP_ROOT]";
$pnconfig['V4B_FILE_MOD_ROOT']			= "$pnconfig[V4B_FILE_APP_ROOT]/modules";
$pnconfig['V4B_FILE_MOD_ROOT_PATH']		= "$pnconfig[V4B_FILE_APP_ROOT_PATH]/modules";
$pnconfig['V4B_FILE_MODEXT_ROOT']		= "$pnconfig[V4B_FILE_MOD_ROOT]/external";
$pnconfig['V4B_FILE_MODEXT_ROOT_PATH']		= "$pnconfig[V4B_FILE_APP_ROOT_PATH]/modules/external";
$pnconfig['V4B_FILE_TMP_PATH']			= "/tmp";


/* 
 * OS Release Info
 */
$pnconfig['V4B_OS_RELEASE_NAME'] 		= 'OpenStar';
$pnconfig['V4B_OS_RELEASE_VERSION']		= '4.03';
$pnconfig['V4B_OS_RELEASE_HOME']		= 'http://openstar.postnuke.com';


/*
 * Login extension parameters
 */
$pnconfig['V4B_CONFIG_HTTP_LOGIN_ALLOW']  		= false;
$pnconfig['V4B_CONFIG_HTTP_LOGIN_FORCE_SECURITY'] 	= false;


/*
 * Global extension parameters; change with care!
 */
$pnconfig['V4B_CONFIG_USE_OBJECT_ATTRIBUTION']		= false;
$pnconfig['V4B_CONFIG_USE_OBJECT_LOGGING']		= false;
$pnconfig['V4B_CONFIG_USE_OBJECT_META']			= false;
$pnconfig['V4B_CONFIG_USE_LOG4_LOGGING']		= false;
$pnconfig['V4B_CONFIG_USE_SESSION_POLLUTION_CHECK']	= false;
$pnconfig['V4B_CONFIG_USE_TRANSACTIONS']		= false;


if ($pnconfig['V4B_CONFIG_USE_TRANSACTIONS'] && $pnconfig['dbtype'] == 'mysql')
  exit ('personal_config.php: Impossible Configuration: mysql does not not support transacations ...');


/*
 * IMBrain Search Server 
 */
$pnconfig['V4B_CONFIG_USE_IB_SEARCH']			= true;
$pnconfig['V4B_CONFIG_IB_SERVER_HOST']			= 'localhost';
$pnconfig['V4B_CONFIG_IB_SERVER_PORT']			= 8911;


// ----------------------------------------------------------------------
// 0.8 compatability code
// ----------------------------------------------------------------------
// ----------------------------------------------------------------------
// The following define some data layer settings but aren't really used 
// in the 0.7x series
// ----------------------------------------------------------------------
global $PNConfig;
$PNConfig['System']['PN_CONFIG_USE_LOG4_LOGGING']       = false;
$PNConfig['System']['PN_CONFIG_USE_OBJECT_ATTRIBUTION'] = false;
$PNConfig['System']['PN_CONFIG_USE_OBJECT_LOGGING']     = false;
$PNConfig['System']['PN_CONFIG_USE_OBJECT_META']        = false;
$PNConfig['System']['PN_CONFIG_USE_TRANSACTIONS']       = false;

?>