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
 *  Purpose of file: stacked connection handler
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


/**
 * This class is really only in this release to mimic basic compatability 
 * to the services the 0.8 class provides
 */
class DBConnectionStack
{
    function getConnectionDBType ()
    {
        return 'mysql';
    }

    function getConnection ()
    {
        return $GLOBALS['pndbconn'];
    }

    function isDefaultConnection ()
    {
        return true;
    }
}
?>