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
 *  Purpose of file: faq utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class FaqUtil
{
    /**
     * Retrieve the FAQ category by ID
     *
     * @param id         The category ID to retrieve
     *
     * @return         The value object array or false
     */
    function getCategoryByID ($id)
    {
        pnModDBInfoLoad ('FAQ');
        return DBUtil::selectObjectByID ('faqcategories', $id, 'id');
    }


    /**
     * Construct a path for the the given faq
     *
     * @param faq         The FAQ object to get the path fo
     *
     * @return         The value object array or false
     */
    function getFAQPath ($faq)
    {
        $path = '';

        while ($faq['parent_id']);
        {
            $cat = FaqUtil::getCatgegoryByID ($faq['id']);
            $path = "$cat[title]/$path";
        }

        return $path;
    }
}

?>