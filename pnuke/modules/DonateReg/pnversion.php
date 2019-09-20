<?php // $Id: pnversion.php,v 1.12 2005/01/09 02:01:40 nuclearw Exp $

$modversion['name'] = 'DonateReg';
$modversion['description'] = 'Donate Registration Module';
$modversion['version'] = '0.1';
$modversion['credits'] = 'pndocs/credits.txt';
$modversion['help'] = 'pndocs/help.txt';
$modversion['changelog'] = 'pndocs/changelog.txt';
$modversion['license'] = 'pndocs/license.txt';
$modversion['official'] = 0;
$modversion['author'] = 'Erik Bartels & Larry Hale';
$modversion['contact'] = 'http://www.silver-wolf.com/ & http://www.us4earth.org';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('DonateReg::event' => 'Author ID:Category ID:Event ID',
							  		  'DonateReg::category' => 'Category Name::Category ID',
							  		  'DonateReg::registration' => 'donate_selectionid:Category ID:registrationid');
?>
