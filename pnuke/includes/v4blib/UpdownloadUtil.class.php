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
 *  Purpose of file: updownload utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class UpdownloadUtil
{
    /**
     * Return the category by ID
     *
     * @param cid        The category-ID we wish to retrieve
     *
     * @return The category object
     */
    function getCategoryByID ($cid)
    {
        pnModDBInfoLoad ('UpDownload');
        return DBUtil::selectObjectByID ('updownload_categories', $cid, 'cid');
    }


    /**
     * Return the subcategory by ID
     *
     * @param id        The sub-category-ID we wish to retrieve
     *
     * @return The subcategory object
     */
    function getSubCategoryByID ($id)
    {
        pnModDBInfoLoad ('UpDownload');
        return DBUtil::selectObjectByID ('updownload_subcategories', $id, 'sid');
    }


    /**
     * Return the path for a particular download
     *
     * @param download     The Download we wish to get the path for
     *
     * @return The generated path
     */
    function getDownloadPath ($download)
    {
        $path = '';

        $subCategory = UpdownloadUtil::getSubCategoryByID ($download['sid']);
        $category    = UpdownloadUtil::getCategoryByID ($download['cid']);

        $path = "$category/$subCategory";
        return $path;
    }

}
?>