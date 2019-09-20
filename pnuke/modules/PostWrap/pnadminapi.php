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

//LDH - arrived at when General Settings are form-submitted
function PostWrap_adminapi_updateLinks($var)
	{
		$output = new pnHTML();
		// Security check - important to do this as early as possible to avoid
		// potential security holes or just too much wasted processing
		if (!pnSecAuthAction(0, 'PostWrap::', '::', ACCESS_ADMIN))
		{
			$output->Text(_MODIFYLINKSSNOAUTH);
			return $output->GetOutput();
		}
		
		list($default_size, $allow_local_only, $use_buffering, $use_compression, $no_user_entry, $security, $reg_user_only, $open_direct, $use_fixed_title, $auto_resize, $vsize, $hsize) = pnVarCleanFromInput('default_size','allow_local_only','use_buffering','use_compression','no_user_entry','security','reg_user_only','open_direct','use_fixed_title','auto_resize','vsize','hsize');
		
		// Admin functions of this type can be called by other modules.  If this
		// happens then the calling module will be able to pass in arguments to
		// this function through the $args parameter.  Hence we extract these
	  	// arguments *after* we have obtained any form-based input through
		// pnVarCleanFromInput().
		extract($var);
		
		//Save Settings
		//pnModSetVar('PostWrap', 'default_size', $default_size);
		pnModSetVar('PostWrap', 'allow_local_only', $allow_local_only);
		//pnModSetVar('PostWrap', 'use_buffering', $use_buffering);
		//pnModSetVar('PostWrap', 'use_compression', $use_compression);
		pnModSetVar('PostWrap', 'no_user_entry', $no_user_entry);
		
		pnModSetVar('PostWrap', 'security', $security);
		
		//pnModSetVar('PostWrap', 'reg_user_only', $reg_user_only);
		pnModSetVar('PostWrap', 'open_direct', $open_direct);
		pnModSetVar('PostWrap', 'use_fixed_title', $use_fixed_title);
		pnModSetVar('PostWrap', 'auto_resize', $auto_resize);
		pnModSetVar('PostWrap', 'vsize', $vsize);
		pnModSetVar('PostWrap', 'hsize', $hsize);
		//Set Status
		pnSessionSetVar('PostWrap_status', _SETTINGSSAVED);
		pnRedirect(pnModURL('PostWrap', 'admin', 'Settings'));
		
		return true;
		return $output->GetOutput();
	}

function PostWrap_adminapi_updateUrlSettings($var)
	{
		$output = new pnHTML();
		// LDH - DEBUG
		$output->Text("<br>PostWrap_adminapi_updateUrlSettings()<br>");
		print("<br>PostWrap_adminapi_updateUrlSettings()<br>");
		drabfussgidgit();
		return $output->GetOutput();
			
		// Security check - important to do this as early as possible to avoid
		// potential security holes or just too much wasted processing
		if (!pnSecAuthAction(0, 'PostWrap::', '::', ACCESS_ADMIN))
		{
			$output->Text(_MODIFYLINKSSNOAUTH);
			return $output->GetOutput();
		}
		
		list($reg_user_only, $open_direct, $use_fixed_title, $auto_resize, $vsize) = pnVarCleanFromInput('reg_user_only','open_direct','use_fixed_title','auto_resize','vsize');
		// Admin functions of this type can be called by other modules.  If this
		// happens then the calling module will be able to pass in arguments to
		// this function through the $args parameter.  Hence we extract these
	  	// arguments *after* we have obtained any form-based input through
		// pnVarCleanFromInput().
		extract($var);
		
		//Save Settings
		//pnModSetVar('PostWrap', 'reg_user_only', $reg_user_only);
		pnModSetVar('PostWrap', 'open_direct', $open_direct);
		pnModSetVar('PostWrap', 'use_fixed_title', $use_fixed_title);
		pnModSetVar('PostWrap', 'auto_resize', $auto_resize);
		pnModSetVar('PostWrap', 'vsize', $vsize);
		//Set Status
		pnSessionSetVar('PostWrap_status', _SETTINGSSAVED);
		pnRedirect(pnModURL('PostWrap', 'admin', 'UrlSettings'));
		
		return true;
		return $output->GetOutput();
	}

//Add an Url
function PostWrap_adminapi_AddUrl($args)
{
	$output = new pnHTML();
	// Security check - important to do this as early as possible to avoid
	// potential security holes or just too much wasted processing
	if (!pnSecAuthAction(0, 'PostWrap::', '::', ACCESS_ADMIN))
	{
	    print("<br>Security for user " . pnUserGetVar('uname') . " denied.<br>");
        // LDH - let's get to the bottom of the problem..
        list($userperms, $groupperms) = pnSecGetAuthInfo();

        if (count($userperms) == 0)
            print("No user permissions<br>");
        if (count($groupperms) == 0) {
            print("No group permissions<br>"); 
        }
		$output->Text(_MODIFYLINKSSNOAUTH);
		return $output->GetOutput();
	}
	
	// Get parameters from whatever input we need.  All arguments to this
	// function should be obtained from pnVarCleanFromInput(), getting them
	// from other places such as the environment is not allowed, as that makes
	// assumptions that will not hold in future versions of PostNuke
	list($reg_user_only, $open_direct, $use_fixed_title, $auto_resize, $vsize, $hsize, $host, $alias, $id) = pnVarCleanFromInput('reg_user_only','open_direct','use_fixed_title','auto_resize','vsize','hsize','host', 'alias', 'id');
	
	// Admin functions of this type can be called by other modules.  If this
	// happens then the calling module will be able to pass in arguments to
	// this function through the $args parameter.  Hence we extract these
  	// arguments *after* we have obtained any form-based input through
	// pnVarCleanFromInput().
	extract($args);
	
	$output->SetOutputMode(_PNH_KEEPOUTPUT);
	
	// Confirm authorisation code.  This checks that the form had a valid
	// authorisation code attached to it.  If it did not then the function will
	// proceed no further as it is possible that this is an attempt at sending
	// in false data to the system
	if (!pnSecConfirmAuthKey())
	{
		pnSessionSetVar('errormsg', _BADAUTHKEY . "Bad authorization key");
		pnRedirect(pnModURL('PostWrap', 'admin', 'main'));
		return true;
	}
	
	if($host!=""&&$alias!="")
	{
		//Sanitize Url
		//To do: more complex checking
		$host_arr = parse_url($host);
		
		//Get rid of whitespaces
		$alias = str_replace(" ", "_", $alias);
		
		if(is_array($host_arr))
		{
			$host = "";
			if(empty($host_arr['scheme'])) $host = "http://";
			else $host = $host_arr['scheme'] . "://";
			
			if(!empty($host_arr['host'])) $host .= $host_arr['host'];
			if(!empty($host_arr['port'])) $host .= ":" . $host_arr['port'];
			if(!empty($host_arr['path'])) $host .= "" . $host_arr['path'];
			if(!empty($host_arr['query'])) $host .= "?" . $host_arr['query'];
			
			$output->Text($host_arr['scheme']."|");
			$output->Text($host_arr['host']);
			$output->Text($host_arr['port']);
			$output->Text($host_arr['path']);
			$output->Text($host_arr['query']);
			$output->LineBreak(4);
		}
		else
		{
			$output->Text(_BADURL);
			return false;
		}
		
		list($dbconn) = pnDBGetConn();
		$pntable = pnDBGetTables();
		
		$urltable = $pntable['postwrap_url'];
		
		//Check If this URL or Alias already exists in DB if we don't edit them
		if (pnSessionGetVar('PostWrap_status') != _URLEDIT)
		{
			pnSessionSetVar('PostWrap_status','');
			
			$result = $dbconn->Execute("SELECT * FROM $urltable");
			
			while(list($id, $name_db, $alias_db) = $result->fields)
			{
				$result->MoveNext();
				if ($alias == $alias_db)
				{
			        pnSessionSetVar('errormsg', _DBERROREXISTSALIAS);
					pnRedirect(pnModURL('PostWrap', 'admin', 'Url'));
			        return false;
				}
				elseif ($host == $name_db)
				{
			        pnSessionSetVar('errormsg', _DBERROREXISTSHOST);
					pnRedirect(pnModURL('PostWrap', 'admin', 'Url'));
			        return false;
				}
			}
		}
		
		pnSessionSetVar('PostWrap_status','');

		if($id=="")
		{
			$sql = "INSERT
					INTO $urltable
					(name, alias, reg_user_only, open_direct, use_fixed_title, auto_resize, vsize, hsize)
					VALUES ('".pnVarPrepForStore($host)."',
							'".pnVarPrepForStore($alias)."',
							'".pnVarPrepForStore($reg_user_only)."',
							'".pnVarPrepForStore($open_direct)."',
							'".pnVarPrepForStore($use_fixed_title)."',
							'".pnVarPrepForStore($auto_resize)."',
							'".pnVarPrepForStore($vsize)."',
							'".pnVarPrepForStore($hsize)."')";
		}
		else
		{
			$sql = "UPDATE
					$urltable
					SET name 			= '".pnVarPrepForStore($host)."',
						alias 			= '".pnVarPrepForStore($alias)."',
						reg_user_only 	= '".pnVarPrepForStore($reg_user_only)."',
						open_direct 	= '".pnVarPrepForStore($open_direct)."',
						use_fixed_title = '".pnVarPrepForStore($use_fixed_title)."',
						auto_resize 	= '".pnVarPrepForStore($auto_resize)."',
						vsize 			= '".pnVarPrepForStore($vsize)."',
						hsize 			= '".pnVarPrepForStore($hsize)."'
					WHERE id=$id";
		}
		$result=$dbconn->Execute($sql);
		
	    // Check for an error with the database code, and if so set an
	    // appropriate error message and return
	    if ($dbconn->ErrorNo() != 0) {
	        pnSessionSetVar('errormsg', _DBERROR . "SQL=UPDATE
					$urltable
					SET name 			= '".pnVarPrepForStore($host)."',
						alias 			= '".pnVarPrepForStore($alias)."',
						reg_user_only 	= '".pnVarPrepForStore($reg_user_only)."',
						open_direct 	= '".pnVarPrepForStore($open_direct)."',
						use_fixed_title = '".pnVarPrepForStore($use_fixed_title)."',
						auto_resize 	= '".pnVarPrepForStore($auto_resize)."',
						vsize 			= '".pnVarPrepForStore($vsize)."',
						hsize 			= '".pnVarPrepForStore($hsize)."'
					WHERE id=$id;");
	        return false;
	    }
		if($id=="")
		{
			pnSessionSetVar('PostWrap_status', _URLSAVED);
		}
		else
		{
			pnSessionSetVar('PostWrap_status', _URLUPDATED);
		}
		
		pnRedirect(pnModURL('PostWrap', 'admin', 'Url'));
		
		return true;
	}
	else
	{
		$output->Text(_FILLFIELDS);
		return $output->GetOutput();
		
		return false;
	}
	return $output->GetOutput();
}

// delete a Url
function PostWrap_adminapi_deleteUrl($args)
{
	// Security check - important to do this as early as possible to avoid
	// potential security holes or just too much wasted processing
	if (!pnSecAuthAction(0, 'PostWrap::', '::', ACCESS_ADMIN))
	{
		$output->Text(_MODIFYLINKSSNOAUTH);
		return $output->GetOutput();
	}
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
	$sql = "DELETE
			FROM
			$urltable
			WHERE id=$id";
	
	$result = $dbconn->Execute($sql);
	
    if ($dbconn->ErrorNo() != 0)
	{
        pnSessionSetVar('errormsg', _DBDELETEERROR);
        return false;
    }
		pnSessionSetVar('PostWrap_status', _URLDELETED);
		pnRedirect(pnModURL('PostWrap', 'admin', 'Url'));
		return true;
}

?>
