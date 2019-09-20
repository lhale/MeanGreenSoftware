<?php
// File: $Id: SecurityUtil.class.php,v 1.1 2006/01/16 15:37:16 drak Exp $
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2001 by the PostNuke Development Team.
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
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: Drak
// Purpose of file: Security Utilities
// ----------------------------------------------------------------------

/**
 * SecurityUtil
 *
 * @package PostNuke_Core
 *
 */
class SecurityUtil
{
    /**
     * Check permissions
     *
     * @param $component
     * @param $instance
     * @param $level
     * @param $user
     * @return bool
     */
    function checkPermission($component=null, $instance=null, $level=null, $user=null)
    {
        return pnSecAuthAction(0, $component, $instance, $level, $user);
    }

    /**
     * register a permission schema
     *
     * @param $component
     * @param $schema
     * @return bool
     */
    function registerPermissionSchema($component, $schema)
    {
        return pnSecAddSchema($component, $schema);
    }

    /**
     * confirm auth key
     *
     * @return bool
     */
    function confirmAuthKey()
    {
        return pnSecConfirmAuthKey();
    }

    /**
     * generate auth key
     *
     * @param $modname module name
     * @return an encrypted key for use in authorisation of operations
     */
    function generateAuthKey($modname = '')
    {
        return pnSecAuthKey($modname);
    }

    /**
     * get auth info
     *
     * @param $user
     * @return array two element array of user and group permissions
     */
    function getAuthInfo($user=null)
    {
        return pnSecAuthInfo($user);
    }

    /**
     * get security level
     *
     * @param $perms
     * @param $component
     * @param $instance
     * @return int matching security level
     */
    function getSecurityLevel($perms, $component, $instance)
    {
        return pnSecGetLevel($perms, 0, $component, $instance);
    }


}

?>