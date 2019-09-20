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

function PostWrap_pntables()
{
    // Initialise table array
    $pntable = array();
	
    // Get the name for the template item table.  This is not necessary
    // but helps in the following statements and keeps them readable
	$url_name = pnConfigGetVar('prefix') . '_postwrap_url';
	
    // Set the table name
    $pntable['postwrap_url'] = $url_name;
	
    // Set the column names.  Note that the array has been formatted
    // on-screen to be very easy to read by a user.
    $pntable['postwrap_url_column'] = array('id'    			=> $url_name . '.id',
                                            'name'  			=> $url_name . '.name',
											'alias' 			=> $url_name . '.alias',
											'reg_user_only' 	=> $url_name . '.reg_user_only',
											'open_direct' 		=> $url_name . '.open_direct',
											'use_fixed_title' 	=> $url_name . '.use_fixed_title',
											'auto_resize' 		=> $url_name . '.auto_resize',
											'vsize' 			=> $url_name . '.vsize',
											'hsize' 			=> $url_name . '.hsize');
	
    // Return the table information
    return $pntable;
}

?>
