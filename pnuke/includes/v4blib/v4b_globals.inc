<?php
/*  ---------------------------------------------------------------------- 
 *  LICENSE 
 *  
 *  This program is free software; you can redistribute it and/or 
 *  modify it under the terms of the GNU General Public License (GPL) 
 *  as published by the Free Software Foundation, either version 2
 *  of the License, or (at your option) any later version.
 *  
 *  This program is distributed in the hope that it will be useful, 
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of 
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
 *  GNU General Public License for more details. 
 *  
 *  To read the license please visit http://www.gnu.org/copyleft/gpl.html 
 *  ---------------------------------------------------------------------- 
 *  Original Author of file: Robert Gasch
 *  Author Contact: RNG@open-star.org
 *  Purpose of file: Gobal definitions used by the v4b codebase 
 *  Copyright: value4business GmbH
 *  ---------------------------------------------------------------------- 
 */


// PHP constants 
define('_HAVE_V4BLIB',				'1');


// V4B Log Setting 
define('_V4B_LOG',				'0'); // wether to log or not 
define('_V4B_TIMER',				'0'); // wether to run timer code or not


// V4B Permissions 
define('_V4B_PERMISSION_BASIC_PRIVATE', 	'P');
define('_V4B_PERMISSION_BASIC_GROUP', 		'G');
define('_V4B_PERMISSION_BASIC_USER', 		'U');
define('_V4B_PERMISSION_BASIC_PUBLIC', 		'A');


// V4B Permission Levels
define('_V4B_PERMISSION_LEVEL_NONE', 		'0');
define('_V4B_PERMISSION_LEVEL_READ', 		'R');
define('_V4B_PERMISSION_LEVEL_WRITE', 		'W');


// V4B Validation Marker
define ('_MARKER_NONE', 			'<font FACE="courier new" size="3"><tt><b>&nbsp;</b></tt></font>');
define ('_REQUIRED_MARKER', 			'<font FACE="courier new" size="3" COLOR="blue"><tt><b>*</b></tt></font>');
define ('_VALIDATION_MARKER', 			'<font FACE="courier new" size="3" COLOR="#b22222"><tt><b>!</b></tt></font>');


if (pnConfigGetVar('V4B_CONFIG_USE_LOG4_LOGGING'))
{
    define ('LOG4PHP_DIR', 'includes/v4blib/log4php/src/log4php');
    define ('LOG4PHP_CONFIGURATION', 'includes/v4blib/log4php/openstar.properties');

    //print(LOG4PHP_DIR . '/LoggerManager.php');
    require_once (LOG4PHP_DIR . '/LoggerManager.php');

    // Quick Test
    //$logger =& LoggerManager::getLogger('debug');
    //$logger->debug('Hello again!');
}

?>
