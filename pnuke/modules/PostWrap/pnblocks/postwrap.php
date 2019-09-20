<?php
// ----------------------------------------------------------------------
// Copyright (c) 2002-2004 Shawn McKenzie
// http://spidean.mckenzies.net
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

function PostWrap_postwrapblock_init()
{
    pnSecAddSchema('PostWrap:postwrapblock:', 'Block title::');
}

function PostWrap_postwrapblock_info()
{
    return array('text_type' => 'URL',
                 'module' => 'PostWrap',
                 'text_type_long' => 'PostWrap URLs',
                 'allow_multiple' => true,
                 'form_content' => false,
                 'form_refresh' => false,
                 'show_preview' => true);
}

function PostWrap_postwrapblock_display($blockinfo)
{
    pnModDBInfoLoad('PostWrap');

    list($dbconn) = pnDBGetConn();
    $pntable = pnDBGetTables();
    $urltable = $pntable['postwrap_url'];

    if (!pnSecAuthAction(0, 'PostWrap:postwrapblock:', "$blockinfo[title]::", ACCESS_READ)) {
        return;
    }
    $result = $dbconn->Execute("SELECT * FROM $urltable");

    $output = new pnHTML();

    while(list($id, $name, $alias) = $result->fields) {
    	$link = htmlentities('index.php?module=PostWrap&page='.$alias);
    	$anchor = '<a href="'.$link.'">'.$alias.'</a>';
    	
    	$output->SetInputMode(_PNH_VERBATIMINPUT);
    	$output->Text($anchor);
    	$output->LineBreak();
    	$output->SetInputMode(_PNH_PARSEINPUT);
    	$result->MoveNext();
    }    
    $blockinfo['content'] = $output->GetOutput();
    
    return themesideblock($blockinfo);
}

?>
