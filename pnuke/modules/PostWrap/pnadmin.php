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

define('_CONFIG_MODULE', pnModGetName());

// main functions for the admin interface according to actions
function PostWrap_admin_main()
{
	$output = new pnHTML();
	// Security check - important to do this as early as possible to avoid
	// potential security holes or just too much wasted processing
	if (!pnSecAuthAction(0, _CONFIG_MODULE.'::', '::', ACCESS_ADMIN))
	{
		$output->Text(_MODIFYLINKSSNOAUTH);
		return $output->GetOutput();
	}
	
	$output->SetInputMode(_PNH_VERBATIMINPUT);
	$output->Text(PostWrap_adminmenu());
	$output->SetInputMode(_PNH_PARSEINPUT);	
	
	return $output->GetOutput();
}

function PostWrap_admin_Url()
{
	$output = new pnHTML();
	// Security check - important to do this as early as possible to avoid
	// potential security holes or just too much wasted processing
	if (!pnSecAuthAction(0, _CONFIG_MODULE.'::', '::', ACCESS_ADMIN))
	{
		$output->Text(_MODIFYLINKSSNOAUTH);
		return $output->GetOutput();
	}
	
	$output->SetInputMode(_PNH_VERBATIMINPUT);
	$output->Text(PostWrap_adminmenu());
	$output->SetInputMode(_PNH_PARSEINPUT);
	$output->BoldText(_ADMINURLPANEL);
	$output->Linebreak(2);
	
	$output->SetOutputMode(_PNH_KEEPOUTPUT);
	
	list($dbconn) = pnDBGetConn();
	$pntable = pnDBGetTables();
	
	$urltable = $pntable['postwrap_url'];
	$result = $dbconn->Execute("SELECT * FROM $urltable");
	
	$output->FormStart(pnModURL('PostWrap', 'admin', 'AddUrl'));
	// Add an authorisation ID - this adds a hidden field in the form that
	// contains an authorisation ID.  The authorisation ID is very important in
	// preventing certain attacks on the website
	$output->FormHidden('authid', pnSecGenAuthKey());
	
	$output->TableStart('','',0);
	
	$row1 = array();
	$output->SetOutputMode(_PNH_RETURNOUTPUT);
	
//	$row1[] = $output->BoldText(_IDURL);
	$row1[] = $output->BoldText(_URLNAME);
	$row1[] = $output->BoldText(_URLALIAS);
	$row1[] = $output->BoldText(_URLOPTION);
	
	$output->SetOutputMode(_PNH_KEEPOUTPUT);
	$output->SetInputMode(_PNH_VERBATIMINPUT);
	$output->TableAddRow($row1, 'left');
	
	while(list($id, $name, $alias) = $result->fields)
	{
		$result->MoveNext();
		$row2 = array();
		
		$output->SetOutputMode(_PNH_RETURNOUTPUT);
		//$row2[] = $output->Text($id);
		$row2[] = $output->Text($name);
		$row2[] = $output->Text($alias);
		$row2[] = $output->URL(pnModURL('PostWrap',
										//'adminapi',
										'admin',
										'EditUrl', array('id' => $id, 'bluff'=> $id)),
										_URLEDIT);
		
		$row2[] = $output->URL(pnModURL('PostWrap',
										'admin',
										'DeleteUrl', array('id' => $id, 'bluff'=> $id)),
										_URLDELETE);
		
		$output->SetOutputMode(_PNH_KEEPOUTPUT);
		$output->SetInputMode(_PNH_VERBATIMINPUT);
		$output->TableAddRow($row2, 'left');
	}
	
	$row3 = array();
	$output->SetOutputMode(_PNH_RETURNOUTPUT);
	
	//$row3[] = $output->Text(_URLNEW);
	$row3[] = $output->FormText('host', 'http://', 30, 255);
	$row3[] = $output->FormText('alias', '', 30, 50);
	$row3[] = $output->FormSubmit(_URLADD);
	$output->SetOutputMode(_PNH_KEEPOUTPUT);
	$output->SetInputMode(_PNH_VERBATIMINPUT);
	$output->TableAddRow("&nbsp;");
	$output->TableAddRow("&nbsp;");
    $output->TableAddRow($row3, 'left');
	//$output->Linebreak(2);
	
	$output->TableEnd();
	
	//Get vars from URL SETTINGS
	// LDH - uncommented
	$reg_user_only['0'] = '';
	$reg_user_only['1'] = '';
	$reg_user_only[pnModGetVar(_CONFIG_MODULE, 'reg_user_only')] = ' checked';
	
	$open_direct['0'] = '';
	$open_direct['1'] = '';
	$open_direct[pnModGetVar(_CONFIG_MODULE, 'open_direct')] = ' checked';
	$use_fixed_title['0'] = '';
	$use_fixed_title['1'] = '';
	$use_fixed_title[pnModGetVar(_CONFIG_MODULE, 'use_fixed_title')] = ' checked';
	$auto_resize['0'] = '';
	$auto_resize['1'] = '';
	$auto_resize[pnModGetVar(_CONFIG_MODULE, 'auto_resize')] = ' checked';
	$vsize=pnModGetVar(_CONFIG_MODULE, 'vsize');
	$hsize=pnModGetVar(_CONFIG_MODULE, 'hsize'); //New
	//End Geting vars
	
	$output->Linebreak();
	$output->BoldText(_ADMINURLOVERRIDE._ADMINCONFIG._ADMINURLOVERRIDE1);
	$output->Linebreak(2);
	
	$output->SetInputMode(_PNH_VERBATIMINPUT);
	
	// LDH - Somewhere along the line reg_user gets dropped and needs to be re-set
	//        The following reg_user code used to be commented out, but no more
	$output->Text(_REGUSERONLY);
	$output->FormCheckbox('reg_user_only', $reg_user_only['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('reg_user_only', $reg_user_only['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_OPENDIRECT);
	$output->FormCheckbox('open_direct', $open_direct['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('open_direct', $open_direct['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_USEFIXEDTITLE);
	$output->FormCheckbox('use_fixed_title', $use_fixed_title['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('use_fixed_title', $use_fixed_title['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_AUTORESIZE);
	$output->FormCheckbox('auto_resize', $auto_resize['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('auto_resize', $auto_resize['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_VSIZE);
	$output->FormText('vsize', $vsize, 4, 4);
	$output->Linebreak();
	$output->Text("* "._VSIZENOTE1);
	$output->Text(", ");
	$output->Text(_VSIZENOTE2);
	$output->Linebreak(2);
	$output->Text(_HSIZE);
	$output->FormText('hsize', $hsize, 4, 4);
	$output->Linebreak();
	$output->Text("* "._HSIZENOTE1);
	$output->Linebreak(2);
	
	$output->FormEnd();
	
	return $output->GetOutput();
}

function PostWrap_admin_Settings()
{
	$output = new pnHTML();
	// Security check - important to do this as early as possible to avoid
	// potential security holes or just too much wasted processing
	if (!pnSecAuthAction(0, _CONFIG_MODULE.'::', '::', ACCESS_ADMIN))
	{
		$output->Text(_MODIFYLINKSSNOAUTH);
		return $output->GetOutput();
	}
	$output->SetOutputMode(_PNH_KEEPOUTPUT);
	
	$output->SetInputMode(_PNH_VERBATIMINPUT);
	$output->Text(PostWrap_adminmenu());
	$output->SetInputMode(_PNH_PARSEINPUT);
	$output->BoldText(_ADMINCONFIG);
	$output->Linebreak(2);
	
	//Get vars
	//$default_size=pnModGetVar(_CONFIG_MODULE, 'default_size');
	$allow_local_only['0'] = '';
	$allow_local_only['1'] = '';
	$allow_local_only[pnModGetVar(_CONFIG_MODULE, 'allow_local_only')] = ' checked';
	/* $use_buffering['0'] = '';
	$use_buffering['1'] = '';
	$use_buffering[pnModGetVar(_CONFIG_MODULE, 'use_buffering')] = ' checked';
	$use_compression['0'] = '';
	$use_compression['1'] = '';
	$use_compression[pnModGetVar(_CONFIG_MODULE, 'use_compression')] = ' checked'; */
	$no_user_entry['0'] = '';
	$no_user_entry['1'] = '';
	$no_user_entry[pnModGetVar(_CONFIG_MODULE, 'no_user_entry')] = ' checked';
	$security['0'] = '';
	$security['1'] = '';
	$security[pnModGetVar(_CONFIG_MODULE, 'security')] = ' checked';
	//URL Settings
	// LDH - uncommented
	$reg_user_only['0'] = '';
	$reg_user_only['1'] = '';
	$reg_user_only[pnModGetVar(_CONFIG_MODULE, 'reg_user_only')] = ' checked';
	
	$open_direct['0'] = '';
	$open_direct['1'] = '';
	$open_direct[pnModGetVar(_CONFIG_MODULE, 'open_direct')] = ' checked';
	$use_fixed_title['0'] = '';
	$use_fixed_title['1'] = '';
	$use_fixed_title[pnModGetVar(_CONFIG_MODULE, 'use_fixed_title')] = ' checked';
	$auto_resize['0'] = '';
	$auto_resize['1'] = '';
	$auto_resize[pnModGetVar(_CONFIG_MODULE, 'auto_resize')] = ' checked';
	$vsize=pnModGetVar(_CONFIG_MODULE, 'vsize');
	$hsize=pnModGetVar(_CONFIG_MODULE, 'hsize'); //new
	//End Geting vars
	
	$output->FormStart(pnModURL('PostWrap', 'admin', 'updateLinks'));

	$output->SetInputMode(_PNH_VERBATIMINPUT);

	$output->Text(_ALLOWLOCALONLY);
	$output->FormCheckbox('allow_local_only', $allow_local_only['1'], '1', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('allow_local_only', $allow_local_only['0'], '0', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	/* $output->Text(_USEBUFFERING);
	$output->FormCheckbox('use_buffering', $use_buffering['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('use_buffering', $use_buffering['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak();
	$output->Text(_USECOMPRESSION);
	$output->FormCheckbox('use_compression', $use_compression['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('use_compression', $use_compression['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2); */
	$output->Text(_NOUSERENTRY);
	$output->FormCheckbox('no_user_entry', $no_user_entry['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('no_user_entry', $no_user_entry['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_SECURITY);
	$output->FormCheckbox('security', $security['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('security', $security['1'], '1', 'radio');
	$output->Text(_YES);
	
	$output->Linebreak(2);
	
	// LDH - Somewhere along the line reg_user gets dropped and needs to be re-set
	//        The following reg_user code used to be commented out, but no more
	$output->Text(_REGUSERONLY);
	$output->FormCheckbox('reg_user_only', $reg_user_only['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('reg_user_only', $reg_user_only['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_OPENDIRECT);
	$output->FormCheckbox('open_direct', $open_direct['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('open_direct', $open_direct['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_USEFIXEDTITLE);
	$output->FormCheckbox('use_fixed_title', $use_fixed_title['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('use_fixed_title', $use_fixed_title['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_AUTORESIZE);
	$output->FormCheckbox('auto_resize', $auto_resize['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('auto_resize', $auto_resize['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_VSIZE);
	$output->FormText('vsize', $vsize, 4, 4);
	$output->Linebreak();
	$output->Text("* "._VSIZENOTE1);
	$output->Text(", ");
	$output->Text(_VSIZENOTE2);
	$output->Linebreak(2);
	$output->Text(_HSIZE);
	$output->FormText('hsize', $hsize, 4, 4);
	$output->Linebreak();
	$output->Text("* "._HSIZENOTE1);
	$output->Linebreak(2);
	
	$output->FormSubmit(_SAVECHANGES);
	
	$output->FormEnd();
	
	return $output->GetOutput();
}

function Postwrap_adminmenu()
{
	// Create output object - this object will store all of our output so that
    // we can return it easily when required
    $output = new pnHTML();

    // Display status message if any.  Note that in future this functionality
    // will probably be in the theme rather than in this menu, but this is the
    // best place to keep it for now
    $output->Text(pnGetStatusMsg());
    $output->Linebreak(2);

    // Start options menu
    $output->TableStart(_MODULETITLE." "._MODULEVER);
    $output->SetOutputMode(_PNH_RETURNOUTPUT);

    // Menu options.  These options are all added in a single row, to add
    // multiple rows of options the code below would just be repeated
    $columns = array();
    $columns[] = $output->URL(pnModURL('PostWrap',
                           'admin',
                           'Settings'),
                           _ADMINCONFIG);
                           
    $columns[] = $output->URL(pnModURL('PostWrap',
                           'admin',
                           'Url'),
                           _ADMINURLPANEL);
                           
    $output->SetOutputMode(_PNH_KEEPOUTPUT);

    $output->SetInputMode(_PNH_VERBATIMINPUT);
    $output->TableAddRow($columns);
    $output->SetInputMode(_PNH_PARSEINPUT);

    $output->TableEnd();
    $output->Linebreak();

    // Return the output that has been generated by this function
    return $output->GetOutput();
}

// Edit a Url
function PostWrap_admin_EditUrl($args)
{
	$output = new pnHTML();
	// Security check - important to do this as early as possible to avoid
	// potential security holes or just too much wasted processing
	if (!pnSecAuthAction(0, 'PostWrap::', '::', ACCESS_ADMIN))
	{
		$output->Text(_MODIFYLINKSSNOAUTH);
		return $output->GetOutput();
	}
	$output->SetInputMode(_PNH_VERBATIMINPUT);
	$output->Text(PostWrap_adminmenu());
	$output->SetInputMode(_PNH_PARSEINPUT);
	/*
	// Confirm authorisation code.  This checks that the form had a valid
	// authorisation code attached to it.  If it did not then the function will
	// proceed no further as it is possible that this is an attempt at sending
	// in false data to the system
	if (!pnSecConfirmAuthKey())
	{
		pnSessionSetVar('errormsg', _BADAUTHKEY);
		pnRedirect(pnModURL('PostWrap', 'admin', 'main'));
		return true;
	}
	*/
	list($dbconn) = pnDBGetConn();
	$pntable = pnDBGetTables();
	
	list($id, $bluff)= pnVarCleanFromInput('id', 'bluff');
	
	extract($args);
	
	$urltable = $pntable['postwrap_url'];
	
	// extract info from db
	$sql = "SELECT
			*
			FROM
			$urltable
			WHERE id=$id";
	
	$result = $dbconn->Execute($sql);
	$output->FormStart(pnModURL('PostWrap', 'admin', 'AddUrl'));
	// Add an authorisation ID - this adds a hidden field in the form that
	// contains an authorisation ID.  The authorisation ID is very important in
	// preventing certain attacks on the website
	$output->FormHidden('authid', pnSecGenAuthKey());
	
	$output->TableStart('','',0);
	
	$row1 = array();
	$output->SetOutputMode(_PNH_RETURNOUTPUT);
	
	//$row1[] = $output->BoldText(_IDURL);
	$row1[] = $output->BoldText(_URLNAME);
	$row1[] = $output->BoldText(_URLALIAS);
	
	$output->SetOutputMode(_PNH_KEEPOUTPUT);
	$output->SetInputMode(_PNH_VERBATIMINPUT);
	
	$output->TableAddRow($row1, 'left');
	
	$row3 = array();
	$output->SetOutputMode(_PNH_RETURNOUTPUT);
	
	list($id, $host, $alias, $reg_user_only, $open_direct, $use_fixed_title, $auto_resize, $vsize, $hsize) = $result->fields;
	
	$row3[] = $output->FormText('host', $host, 30, 255).$output->FormHidden('id', $id);;
	$row3[] = $output->FormText('alias', $alias, 30, 50);
	$row3[] = $output->FormSubmit(_URLSAVE);
	$output->SetOutputMode(_PNH_KEEPOUTPUT);
	$output->SetInputMode(_PNH_VERBATIMINPUT);
	$output->TableAddRow($row3, 'left');
	//$output->Linebreak(2);
	
	$output->TableEnd();
	
	//Set some values if they exists
	if (isset($reg_user_only))
	{
		$reg_user_only_db['0'] = '';
		$reg_user_only_db['1'] = '';
		$reg_user_only_db[$reg_user_only] = ' checked';
	}
	if (isset($open_direct))
	{
		$open_direct_db['0'] = '';
		$open_direct_db['1'] = '';
		$open_direct_db[$open_direct] = ' checked';
	}
	if (isset($use_fixed_title))
	{
		$use_fixed_title_db['0'] = '';
		$use_fixed_title_db['1'] = '';
		$use_fixed_title_db[$use_fixed_title] = ' checked';
	}
	if (isset($auto_resize))
	{
		$auto_resize_db['0'] = '';
		$auto_resize_db['1'] = '';
		$auto_resize_db[$auto_resize] = ' checked';
	}
	//End set
	$output->Linebreak();
	$output->BoldText(_ADMINURLOVERRIDE._ADMINCONFIG._ADMINURLOVERRIDE1);
	$output->Linebreak(2);
	
	$output->SetInputMode(_PNH_VERBATIMINPUT);
	// LDH - Somewhere along the line reg_user gets dropped and needs to be re-set
	//        The following reg_user code used to be commented out, but no more
	$output->Text(_REGUSERONLY);
	$output->FormCheckbox('reg_user_only', $reg_user_only_db['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('reg_user_only', $reg_user_only_db['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_OPENDIRECT);
	$output->FormCheckbox('open_direct', $open_direct_db['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('open_direct', $open_direct_db['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_USEFIXEDTITLE);
	$output->FormCheckbox('use_fixed_title', $use_fixed_title_db['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('use_fixed_title', $use_fixed_title_db['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_AUTORESIZE);
	$output->FormCheckbox('auto_resize', $auto_resize_db['0'], '0', 'radio');
	$output->Text(_NO);
	$output->FormCheckbox('auto_resize', $auto_resize_db['1'], '1', 'radio');
	$output->Text(_YES);
	$output->Linebreak(2);
	$output->Text(_VSIZE);
	$output->FormText('vsize', $vsize, 4, 4);
	$output->Linebreak();
	$output->Text("* "._VSIZENOTE1);
	$output->Text(", ");
	$output->Text(_VSIZENOTE2);
	$output->Linebreak(2);
	$output->Text(_HSIZE);
	$output->FormText('hsize', $hsize, 4, 4);
	$output->Linebreak();
	$output->Text("* "._HSIZENOTE1);
	$output->Linebreak(2);
	$output->FormHidden('id', $id);
	$output->SetOutputMode(_PNH_RETURNOUTPUT);
	
	$output->FormEnd();
	
	pnSessionSetVar('PostWrap_status', _URLEDIT);
	
	return $output->GetOutput();
}

function PostWrap_admin_AddUrl($args)
{
    pnModAPIFunc('postwrap', 'admin', 'addurl', $args);
}

function PostWrap_admin_DeleteUrl($args)
{
    pnModAPIFunc('postwrap', 'admin', 'deleteurl', $args);
}

function PostWrap_admin_UpdateUrl($args)
{
    pnModAPIFunc('postwrap', 'admin', 'updateurl', $args);
}

function PostWrap_admin_UpdateLinks($args)
{
    pnModAPIFunc('postwrap', 'admin', 'updatelinks', $args);
}

?>
