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
 *  Purpose of file: module utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class ModuleUtil
{
    /**
     * Generic modules select function. Only modules in the module
     * table are returned which means that new/unscanned modules
     * will not be returned
     *
     * @param where The where clause to use for the select
     * @param sort  The sort to use
     *
     * @return The resulting module object array
     */
    function getModules ($where='', $sort='displayname')
    {
        return DBUtil::selectObjectArray ('modules', $where, $sort);
    }


    /**
     * Return an array of modules in the specified state, only modules in
     * the module table are returned which means that new/unscanned modules
     * will not be returned
     *
     * @param state    The module state (optional) (defaults = active state)
     * @param sort  The sort to use
     *
     * @return The resulting module object array
     */
    function getModulesByState ($state=3, $sort='displayname')
    {
        $pntables     = pnDBGetTables();
        $moduletable  = $pntables['modules'];
        $modulecolumn = $pntables['modules_column'];

        $where = "$modulecolumn[state] = $state";
        return DBUtil::selectObjectArray ('modules', $where, $sort);
    }

}
?>