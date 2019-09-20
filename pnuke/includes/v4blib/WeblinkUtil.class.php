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
 *  Purpose of file: weblink utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class WeblinkUtil
{
    /**
     * Return the category by ID
     *
     * @param id        The category-ID we wish to retrieve
     *
     * @return The category object
     */
    function getCategoryByID ($id)
    {
        pnModDBInfoLoad ('Web-Links');
        return DBUtil::selectObjectByID ('links_categories', $id, 'cid');
    }


    /**
     * Return the weblink path
     *
     * @param weblink     The weblink we wish to get the path for
     *
     * @return The weblink path
     */
    function getWeblinkPath ($weblink)
    {
        $path = '';

        while ($weblink['parent_id'])
        {
            $weblink = WeblinkUtil::getCategoryByID ($weblink['id']);
            $path = "$weblink[title]/$path";
        }

        return $path;
    }
}
?>