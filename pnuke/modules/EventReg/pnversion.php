<?php // $Id: pnversion.php,v 1.12 2005/01/09 02:01:40 nuclearw Exp $

$modversion['name'] = 'EventReg';
$modversion['description'] = 'Event Registration Module';
$modversion['version'] = '0.57';
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Erik Bartels';
$modversion['contact'] = 'http://www.silver-wolf.com/';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('EventReg::event' => 'Author ID:Category ID:Event ID',
							  		  'EventReg::category' => 'Category Name::Category ID',
							  		  'EventReg::registration' => 'eventid:Category ID:registrationid');
?>
