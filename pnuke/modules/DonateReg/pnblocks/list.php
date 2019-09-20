<?php
// $Id: list.php,v 1.1 2005/01/09 02:02:27 nuclearw Exp $
// =======================================================================
// For POST-NUKE Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WIthOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// =======================================================================
// Block based on list block from PageSetter by Jorn Lind-Nielsen (C) 2003.
// Adapted for DonateReg by Eric Mathieu
// ----------------------------------------------------------------------


/**
 * initialise block
 */
function DonateReg_listblock_init()
{
    // Security
  pnSecAddSchema('DonateReg:Listblock:', 'Block title:Block Id:Type Id');
}


/**
 * get information on block
 */
function DonateReg_listblock_info()
{
    // Values
  return array('text_type'      => 'DonateRegList',
               'module'         => 'DonateReg',
               'text_type_long' => 'DonateReg list N events',
               'allow_multiple' => true,
               'form_content'   => false,
               'form_refresh'   => false,
               'show_preview'   => true);
}


function DonateReg_listblock_display($blockinfo)
{
   // Security check
   if (!pnSecAuthAction(0, 'DonateReg::', '::', ACCESS_READ)) {
       return;
   }
	if (!pnModAvailable('DonateReg')) {
		return;
	}

   // Get variables from content block
	$vars = pnBlockVarsFromContent($blockinfo['content']);

#    $tid = $vars['tid'];
#    if (!isset($tid))
#        $tid = pnModGetVar('DonateReg','frontpagePubType');
#   if (!isset($tid))
#   {
#     $blockinfo['content'] = 'No type ID set for this block.';
#     return themesideblock($blockinfo);
#   }
#
   if ($startnum == ""){$startnum = 1;
	} else {$startnum = pnVarCleanFromInput('startnum');}

	$viewtype = pnVarCleanFromInput('viewtype');
	$categoryid = pnVarCleanFromInput('categoryid');

#   $listCount  = $vars['listCount'];
#   $listOffset = $vars['listOffset'];
#   $template   = (isset($vars['template']) && $vars['template'] != '' ? $vars['template'] : 'block-list');
#   $filterStr  = $vars['filters'];
#   $orderBy    = $vars['orderBy'];
#   
#   if (empty($filterStr))
#     $filters = null;
#   else
#     $filters = preg_split("/\s*&\s*/", $filterStr);

   if (!pnModAPILoad('DonateReg', 'user'))
     return DonateRegErrorPage(__FILE__, __LINE__, 'Failed to load DonateReg user API');

	$items = pnModAPIFunc('DonateReg',
                         'user',
                         'getallevents',
                         array('startnum'   => $vars['startnum'],
						  		       'categoryid' => $categoryid,
								       'type'       => $viewtype,
                               'numitems'   => $vars['numitems']));
#
#   $pubList = $pubList['publications']; // No need for the "more" part
# 
   $smarty = new pnRender('DonateReg');
   $html = '';

   // Add a simplified $core
   $core = array('tid'       => $tid,
                 'title'     => $blockinfo['title']);
   $smarty->assign('core', $core);

   $templateHeaderFile = "list-header.html";
   if ($smarty->template_exists($templateHeaderFile))
       $html .= $smarty->fetch($templateHeaderFile, "H_$cacheID");

   $templateFile = "list.html";
   if ($smarty->template_exists($templateFile)) {

      require_once $smarty->_get_plugin_filepath('modifier','date_format');

      foreach ($items as $item) {

         // get full item
         $item = pnModAPIFunc(
                    'DonateReg',
                    'user',
                    'getevent',
                    array('donate_selectionid' => $item['donate_selectionid']));

         // sets additionnal information
         $item['fullURL'] = pnModURL('DonateReg',
                                     'user',
                                     'displayevent',
                                     array('donate_selectionid' => $item['donate_selectionid']));

         $item['Date'] = smarty_modifier_date_format($item['startdate'], _DATELONG);

         $smarty->assign('item', $item);

         $html .= $smarty->fetch($templateFile, "$cacheID");
      }
   }

   $templateFooterFile = "list-footer.html";
   if ($smarty->template_exists($templateFooterFile))
     $html .= $smarty->fetch($templateFooterFile, "F_$cacheID");

   $blockinfo['content'] = $html;

   return themesideblock($blockinfo);
}


/**
 * modify block settings
 */
function DonateReg_listblock_modify($blockinfo)
{
  $output = new pnHTML();

    // Get current content
  $vars = pnBlockVarsFromContent($blockinfo['content']);

    if (empty($vars['numitems'])) {
        $vars['numitems'] = 5;
    }
    if (empty($vars['startnum'])) {
        $vars['startnum'] = 0;
    }
#     // Defaults
#   if (!isset($vars['tid']))
#     $vars['tid'] = pnModGetVar('DonateReg','frontpagePubType');
#   if (!isset($vars['listCount']))
#     $vars['listCount'] = 10;
#   if (!isset($vars['listOffset']))
#     $vars['listOffset'] = '';
#   if (!isset($vars['template']))
#     $vars['template'] = '';
# 
#   $listCount  = $vars['listCount'];
#   $listOffset = $vars['listOffset'];
#   $template   = $vars['template'];
#   $filters    = $vars['filters'];
#   $orderBy    = $vars['orderBy'];
#   if (!pnModAPILoad('DonateReg', 'admin'))
#     return DonateRegErrorPage(__FILE__, __LINE__, 'Failed to load DonateReg admin API');
# 
#     // (no table start/end since the block framework takes care of that)
# 
#     // Create row for "Publication type"
#   $pubTypesData = pnModAPIFunc('DonateReg',
#                                'admin',
#                                'getPublicationTypes');
# 
#   $pubTypes = array();
#   foreach ($pubTypesData as $pubType)
#   {
#     $pubTypes[] = array( 'name' => $pubType['title'],
#                          'id'   => $pubType['id'] );
#     if ($pubType['id'] == $vars['tid'])
#       $pubTypes[count($pubTypes)-1]['selected'] = 1;
#   }
# 
#   $row = array();
#   $output->SetOutputMode(_PNH_RETURNOUTPUT);
#   $row[] = $output->Text(_PGBLOCKLISTPUBTYPE);
#   $row[] = $output->FormSelectMultiple('tid', $pubTypes);
#   $output->SetOutputMode(_PNH_KEEPOUTPUT);
# 
#     // Add row
#   $output->SetInputMode(_PNH_VERBATIMINPUT);
#   $output->TableAddRow($row, 'left');
#   $output->SetInputMode(_PNH_PARSEINPUT);
# 
#     // Add filter
# 
#   $row = array();
#   $output->SetOutputMode(_PNH_RETURNOUTPUT);
#   $row[] = $output->Text(_PGBLOCKLISTFILTER);
#   $row[] = $output->FormText('filters', $filters);
#   $output->SetOutputMode(_PNH_KEEPOUTPUT);
# 
#     // Add row
#   $output->SetInputMode(_PNH_VERBATIMINPUT);
#   $output->TableAddRow($row, 'left');
#   $output->SetInputMode(_PNH_PARSEINPUT);
# 
#     // Add order by
# 
#   $row = array();
#   $output->SetOutputMode(_PNH_RETURNOUTPUT);
#   $row[] = $output->Text(_PGBLOCKLISTORDERBY);
#   $row[] = $output->FormText('orderBy', $orderBy);
#   $output->SetOutputMode(_PNH_KEEPOUTPUT);
# 
#     // Add row
#   $output->SetInputMode(_PNH_VERBATIMINPUT);
#   $output->TableAddRow($row, 'left');
#   $output->SetInputMode(_PNH_PARSEINPUT);
# 
#     // Add no. of publications
# 
#   $row = array();
#   $output->SetOutputMode(_PNH_RETURNOUTPUT);
#   $row[] = $output->Text(_PGBLOCKLISTSHOWCOUNT);
#   $row[] = $output->FormText('listCount', $listCount);
#   $output->SetOutputMode(_PNH_KEEPOUTPUT);
# 
#     // Add row
#   $output->SetInputMode(_PNH_VERBATIMINPUT);
#   $output->TableAddRow($row, 'left');
#   $output->SetInputMode(_PNH_PARSEINPUT);
# 
#     // Add no. of publications offset
# 
#   $row = array();
#   $output->SetOutputMode(_PNH_RETURNOUTPUT);
#   $row[] = $output->Text(_PGBLOCKLISTSHOWOFFSET);
#   $row[] = $output->FormText('listOffset', $listOffset);
#   $output->SetOutputMode(_PNH_KEEPOUTPUT);
# 
#     // Add row
#   $output->SetInputMode(_PNH_VERBATIMINPUT);
#   $output->TableAddRow($row, 'left');
#   $output->SetInputMode(_PNH_PARSEINPUT);
# 
#     // Add template
# 
#   $row = array();
#   $output->SetOutputMode(_PNH_RETURNOUTPUT);
#   $row[] = $output->Text(_PGBLOCKLISTTEMPLATE);
#   $row[] = $output->FormText('template', $template);
#   $output->SetOutputMode(_PNH_KEEPOUTPUT);
# 
#     // Add row
#   $output->SetInputMode(_PNH_VERBATIMINPUT);
#   $output->TableAddRow($row, 'left');
#   $output->SetInputMode(_PNH_PARSEINPUT);

    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(_NUMITEMS);
    $row[] = $output->FormText('numitems',
                               pnVarPrepForDisplay($vars['numitems']),
                               5,
                               5);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddRow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);

    $row = array();
    $output->SetOutputMode(_PNH_RETURNOUTPUT);
    $row[] = $output->Text(_STARTNUM);
 	 $row[] = $output->FormText('startnum',
                               pnVarPrepForDisplay($vars['startnum']),
                               5,
                               5);
    $output->SetOutputMode(_PNH_KEEPOUTPUT);
	 $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddRow($row, 'left');
    $output->SetInputMode(_PNH_PARSEINPUT);


    return $output->GetOutput();
}

/**
 * update block settings
 */
function DonateReg_listblock_update($blockinfo)
{
#   $filters = pnVarCleanFromInput('filters');
# 
#   $vars = array('tid'        => pnVarCleanFromInput('tid'),
#                 'filters'    => $filters,
#                 'listCount'  => pnVarCleanFromInput('listCount'),
#                 'listOffset' => pnVarCleanFromInput('listOffset'),
#                 'template'   => pnVarCleanFromInput('template'),
#                 'orderBy'    => pnVarCleanFromInput('orderBy'));
   $vars['numitems'] = pnVarCleanFromInput('numitems');
	$vars['startnum'] = pnVarCleanFromInput('startnum');

  $blockinfo['content'] = pnBlockVarsToContent($vars);

  return $blockinfo;
}


?>
