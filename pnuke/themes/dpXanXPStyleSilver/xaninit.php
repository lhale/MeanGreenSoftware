<?php

function xanthia_skins_install($args)
{
/////////////////////////////////////// Do Not Edit /////////////////////////////////////////
    // Check if the user has permission to perform this action
	if (!pnSecAuthAction(0, 'Xanthia::', '::', ACCESS_EDIT)) {
		return false;
	}
    // extract all arguments passed to this function
	extract($args);    
	// set the skin name from the id passed this function
	if(isset($id)) {
    	$skinName = $id;
	} else {
		return false;
	}
///////////////////////////////////// End Do Not Edit ////////////////////////////////////////
    $skinID = CreateTheme($skinName);

	//	CreatePalette($skinName, $skinID, <default = 1 otherwise 0>, <palette name>,
	//					<background>,<color1>,<color2>,<color3>,
	//					<color4>,<color5>,<color6>, <color7>,
	//	              	<color8>, <sepcolor>, <text1>, <text2>, 
	//					<link>, <vlink>, <hover>);
	CreatePalette($skinName, $skinID, 1, $skinName, 
					'#FFFF99', 
							   '#000000', '#CC9966', '#FF9933', 
					'#CC3333', '#FFFFFF', '#FFFFFF', '#FFFFFF', 
					'#FFFFFF', '#FFFFFF', '#000000', '#000000', 
					'#505050', '#505050', '#505050');
	
		$skinID = pnModAPIFunc('Xanthia','user','getSkinID', array('skin' => $skinName));

	CreateThemeVar($skinID, 'pagewidth',_TM_PAGEWIDTH,'100%','');
	CreateThemeVar($skinID,'lcolwidth',_TM_LCOLWIDTH,'175','');
    CreateThemeVar($skinID,'rcolwidth',_TM_RCOLWIDTH,'175','');
	CreateThemeVar($skinID,'indexcol',_TM_INDEXCOL,'1','');
	CreateThemeVar($skinID,'righton',_TM_RIGHTON,'1','');
	//CreateThemeVar($skinID,'iblkwidth',_TM_INBLKWIDTH,'145','');
	
	// Create theme templates
	CreateThemeTemplate($skinID,'master','master.tpl', 'theme');
	CreateThemeTemplate($skinID,'News-index','News-index.tpl', 'theme');
    CreateThemeTemplate($skinID,'lsblock','lsblock.tpl', 'block');				// bloque izquierdo
    CreateThemeTemplate($skinID,'rsblock','rsblock.tpl', 'block');				// bloque derecho
	CreateThemeTemplate($skinID, 'ccblock', 'ccblock.tpl', 'block');			// bloque central
    CreateThemeTemplate($skinID,'table1','table1.tpl', 'theme'); 				// OpenTable 1
    CreateThemeTemplate($skinID,'table2','table2.tpl', 'theme'); 				// OpenTable 2  
    CreateThemeTemplate($skinID,'News-article','News-article.tpl', 'theme'); 	// Texto extendido de la noticia
	CreateThemeTemplate($skinID, '*home', 'home.tpl', 'module');				// Pagina principal de la web
	CreateThemeTemplate($skinID, '*user', 'user.tpl', 'module');				// Pagina de usuario user.php
	
	// Add zones for theme
	pnModSetVar('Xanthia', $skinName.'newzone','');
	// Create theme zones
    CreateThemeZone($skinID, _XA_MASTER, 'master', 0, 1, 'theme'); 				// Master Zone
	CreateThemeZone($skinID, _XA_NEWSINDEX, 'News-index', 0, 1, 'theme'); 		// News-Index (std)
	CreateThemeZone($skinID, _XA_LEFTSIDEB, 'lsblock', 0, 1, 'block'); 			// Left Sidebox
	CreateThemeZone($skinID, _XA_RIGHTSIDEB, 'rsblock', 1, 1, 'block'); 		// Right Sidebox
	CreateThemeZone($skinID, _XA_CENTERBLOCK, 'ccblock', 1, 1, 'block');		// Center Block
    CreateThemeZone($skinID, _XA_OPENTABLE1, 'table1', 0, 1, 'theme'); 			// OpenTable1
    CreateThemeZone($skinID, _XA_OPENTABLE2, 'table2', 0, 1, 'theme'); 			// OpenTable2  
    CreateThemeZone($skinID, _XA_NEWSART, 'News-article', 0, 1, 'theme'); 		// News-article - texto extendido
	CreateThemeZone($skinID, _TM_HOMEPAGE, '*home', 1, 1, 'module');			// Pagina principal de la web
	CreateThemeZone($skinID, _TM_USERPAGE, '*user', 1, 1, 'module');			// Pagina de usuario user.php

	// Report success
	return true;
}

?>