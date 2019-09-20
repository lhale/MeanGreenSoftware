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
 *  Purpose of file: category utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


Loader::loadClass ('DateUtil');
Loader::loadClass ('StringUtil');

$layersMenuPath = 'includes/v4blib/phplayersmenu/lib';
Loader::loadFile ('PHPLIB.php', $layersMenuPath);
Loader::loadFile ('layersmenu-common.inc.php', $layersMenuPath);
Loader::loadFile ('layersmenu.inc.php', $layersMenuPath);
Loader::loadFile ('treemenu.inc.php', $layersMenuPath);


class CategoryUtil
{
    /**
     * Return a category object by ID
     *
     * @param cid      The category-ID to retrieve
     *
     * @return The resulting folder object
     */
    function getCategoryByID ($cid)
    {
        pnModDBInfoLoad ('v4bCategories');
        require ('modules/v4bCategories/inc/table_init.inc');
        $cid = (int)$cid;
        $where = "WHERE $category_column[id]=$cid";
        $cats  = CategoryUtil::getCategories ($where, '', false);

        if (isset($cats[0]) && is_array($cats[0]))
            return $cats[0];

        return $cats;
    }


    /**
     * Return an array of categories objects according the specified where-clause and sort criteria.
     *
     * @param where       The where clause to use in the select (optional) (default='')
     * @param sort        The order-by clause to use in the select (optional) (default='')
     * @param assocKey    The field to use as the associated array key (optional) (default='')
     *
     * @return The resulting folder object array
     */
    function getCategories ($where='', $sort='', $assocKey='')
    {
        pnModDBInfoLoad ('v4bCategories');
        if (!$sort)
        {
            require ('modules/v4bCategories/inc/table_init.inc');
            $sort = "ORDER BY $category_column[sort_value], $category_column[name]";
        }

        $hash = md5($where . $sort . $assocKey);
        if (isset($GLOBALS['v4bCache']['categories'][$hash]))
            return $GLOBALS['v4bCache']['categories'][$hash];

        $cats = DBUtil::selectObjectArray ('v4b_categories_category', $where, $sort,
                                             -1, -1, $assocKey);

        $keys = array_keys ($cats);
        foreach ($keys as $key)
        {
            if ($cats[$key]['display_name'])
                $cats[$key]['display_name'] = unserialize ($cats[$key]['display_name']);

            if ($cats[$key]['display_desc'])
                $cats[$key]['display_desc'] = unserialize ($cats[$key]['display_desc']);
        }

        $GLOBALS['v4bCache']['categories'][$hash] = $cats;
        return $cats;
    }


    /**
     * Return a folder object by it's ID
     *
     * @param apath        The path to retrieve by
     * @param field        The (path) field we search for (either path or ipath) (optional) (default='path')
     *
     * @return The resulting folder object
     */
    function getCategoryByPath ($apath, $field='path')
    {
        pnModDBInfoLoad ('v4bCategories');
        require ('modules/v4bCategories/inc/table_init.inc');
        $where = "$category_column[$field]='$apath'";
        $cats  = CategoryUtil::getCategories ($where);

        if (isset($cats[0]) && is_array($cats[0]))
            return $cats[0];

        return $cats;
    }


    /**
     * Return the direct subcategories of the specified category
     *
     * @param id            The folder id to retrieve
     * @param sort          The order-by clause (optional) (default='')
     * @param all           Wether or not to return all (or only active) categories (optional) (default=false)
     * @param value         The value to filter by (optional) (default='')
     * @param domain        The domain (name) to search for (optional) (default='')
     * @param domainValue   The datafield-domain value we're looking for (optional) (default='')
     * @param assocKey      The field to use as the associated array key (optional) (default='')
     *
     * @return The resulting folder object
     */
    function getCategoriesByParentID ($id, $sort='', $all=false, $value='', $domain='', $domainValue='', $assocKey='')
    {
        pnModDBInfoLoad ('v4bCategories');
        require ('modules/v4bCategories/inc/table_init.inc');

        $id = (int)$id;
        $where = "$category_column[parent_id]=$id";

        if (!$all)
            $where .= " AND $category_column[status]='A'";

        if ($value)
            $where .= " AND $category_column[value]='$value'";

        if ($domain && $domainValue)
        {
            $where .= " AND (";
            $where .= " ($category_column[data1]='$domainValue' AND $category_column[data1_domain]='$domain') OR";
            $where .= " (AND $category_column[data2]='$domainValue' AND $category_column[data2_domain]='$domain') OR";
            $where .= " (AND $category_column[data3]='$domainValue' AND $category_column[data3_domain]='$domain') OR";
            $where .= " (AND $category_column[data4]='$domainValue' AND $category_column[data4_domain]='$domain') OR";
            $where .= " (AND $category_column[data5]='$domainValue' AND $category_column[data5_domain]='$domain') )";
        }

        $cats = CategoryUtil::getCategories ($where, $sort, $assocKey);

        // post process to deliver easy lookup fields: domain and domain_value
        if ($domain && $domainValue)
        {
            $ak = array_keys ($cats);
            foreach ($ak as $v)
            {
                $cats[$v]['domain'] = $domain;
                $cats[$v]['domain_value'] = $domainValue;
            }
        }

        return $cats;
    }


    /**
     * Return all parent categories starting from id
     *
     * @param id         The (leaf) folder id to retrieve
     * @param assocKey   Wether or not to return an assocKeyiative array (optional) (default='id')
     *
     * @return The resulting folder object array
     */
    function getParentCategories ($id, $assocKey='id')
    {
        pnModDBInfoLoad ('v4bCategories');
        require ('modules/v4bCategories/inc/table_init.inc');

        $cat  = CategoryUtil::getCategoryByID ($id);
        $cats = array();

        if (!$cat && !$cat['parent_id'])
            return $cats;

        do
            $cats[$cat[$assocKey]] = CategoryUtil::getCategoryByID ($cat['parent_id']);
        while ($cat && $cat['parent_id']);

        return $cats;
    }


    /**
     * Return an array of category objects by path
     *
     * @param apath        The path to retrieve categories by
     * @param sort         The sort field (optional) (default='')
     * @param field        The the (path) field to use (path or ipath) (optional) (default='ipath')
     * @param includeLeaf  Wether or not to also return leaf nodes (optional) (default=true)
     * @param all          Wether or not to return all (or only active) categories (optional) (default=false)
     * @param exclPath     The path to exclude from the retrieved categories (optional) (default='')
     * @param assocKey     The field to use to build an associative key (optional) (default='')
     *
     * @return The resulting folder object array
     */
    function getCategoriesByPath ($apath, $sort='', $field='ipath', $includeLeaf=true,
                                  $all=false, $exclPath='', $assocKey='')
    {
        pnModDBInfoLoad ('v4bCategories');
        require ('modules/v4bCategories/inc/table_init.inc');

        $where = "$category_column[$field] = '$apath' OR $category_column[$field] LIKE '$apath/%'";
        if ($exclPath)
            $where .= " AND $category_column[$field] NOT LIKE '$exclPath%'";
        if (!$all)
            $where .= " AND $category_column[status]='A'";
        if (!$includeLeaf)
            $where .= " AND $category_column[value]='-1'";
        if (!$sort)
            $sort = "ORDER BY $category_column[sort_value], $category_column[path]";

        $cats  = CategoryUtil::getCategories ($where, $sort, $assocKey);
        return $cats;
    }


    /**
     * Return an array of category objects by path
     *
     * @param apath       The path to retrieve categories by
     * @param value       The value to search for
     * @param field       The path field to search by (optional) (default='path')
     *
     * @return The resulting folder object array
     */
    function getDirectSubCategoryByPathValue ($apath, $value, $field='path')
    {
        static $cache=array();
	$key = "$apath:$value:$field";
	if (isset($cache[$key]))
	   return $cache[$key];

        $category = CategoryUtil::getCategoryByPath ($apath, $field);
        $cache[$key] = CategoryUtil::getDirectSubCategoryByValue ($category['id'], $value);

	return $cache[$key];
    }


    /**
     * Return a Subcategory for the specified folder for the given value
     *
     * @param root_id     The root-category category-id (ie: we're going to look for child-categories of this category)
     * @param value       The value to fetch
     *
     * @return The resulting folder object array
     */
    function getDirectSubCategoryByValue ($root_id, $value)
    {
        if (!$value)
            return array();

        static $cache=array();
	$key = "$root_id:$value";
	if (isset($cache[$key]))
	   return $cache[$key][0];

        $cache[$key] = CategoryUtil::getCategoriesByParentID ($root_id, '', true, $value);
        return $cache[$key][0];
    }


    /**
     * Return an array of Subcategories for the specified folder
     *
     * @param root_id       The root-category category-id (ie: we're going to look for child-categories of this category)
     * @param domain        The domain entry to look for
     * @param domainValue   The domain value entry to look for
     * @param all           Wether or not to include all (or only active) folders in the result set (optinal) (default=false)
     *
     * @return The resulting folder object array
     */
    function getDirectSubCategoriesByDomainValue ($root_id, $domain, $domainValue, $all=false)
    {
        $cats = CategoryUtil::getCategoriesByParentID ($root_id, '', $all, '', $domain, $domainValue);
        return $cats;
    }


    /**
     * Return an array of Subcategories for the specified folder
     *
     * @param cid          The root-category category-id
     * @param recurse      Wether or not to generate a recursive subcategory result set (optional) (default=true)
     * @param relative     Wether or not to generate relative path indexes (optional) (default=true)
     * @param includeRoot  Wether or not to include the root folder in the result set (optional) (default=false)
     * @param includeLeaf  Wether or not to also return leaf nodes (optional) (default=true)
     * @param all          Wether or not to include all (or only active) folders in the result set (optional) (default=false)
     * @param excludeCid   CategoryID (root folder) to exclude from the result set (optional) (default='')
     *
     * @return The resulting folder object array
     */
    function getSubCategories ($cid, $recurse=true, $relative=true, $includeRoot=false,
                               $includeLeaf=true, $all=false, $excludeCid='')
    {
        $rootCat = CategoryUtil::getCategoryByID ($cid);

        $exclCat = '';
        if ($excludeCid)
            $exclCat = CategoryUtil::getCategoryByID ($excludeCid);

        return CategoryUtil::getSubCategoriesForCategory ($rootCat, $recurse, $relative, $includeRoot, $includeLeaf, $all, $exclCat);
    }


    /**
     * Return an array of Subcategories for the specified folder
     *
     * @param apath        The path to get categories by
     * @param field        The (path) field we match by (either path or ipath) (optional) (default='ipath')
     * @param recurse      Wether or not to generate a recursive subcategory result set (optional) (default=true)
     * @param relative     Wether or not to generate relative path indexes (optional) (default=true)
     * @param includeRoot  Wether or not to include the root folder in the result set (optional) (default=false)
     * @param includeLeaf  Wether or not to also return leaf nodes (optional) (default=true)
     * @param all          Wether or not to include all (or only active) folders in the result set (optional) (default=false)
     * @param excludeCid   CategoryID (root folder) to exclude from the result set (optional) (default='')
     * @param assocKey     The field to use as the associated array key (optional) (default='')
     *
     * @return The resulting folder object array
     */
    function getSubCategoriesByPath ($apath, $field='ipath', $recurse=true, $relative=true,
                                     $includeRoot=false, $includeLeaf=true, $all=false, $excludeCid='', $assocKey='')
    {
        $rootCat = CategoryUtil::getCategoryByPath ($apath, $field);

        $exclCat = '';
        if ($excludeCid)
            $exclCat = CategoryUtil::getCategoryByID ($excludeCid);

        return CategoryUtil::getSubCategoriesForCategory ($rootCat, $recurse, $relative,
                                                          $includeRoot, $includeLeaf, $all, $exclCat, $assocKey);
    }


    /**
     * Return an array of Subcategories by for the given category
     *
     * @param category     The root category to retrieve
     * @param recurse      Wether or not to recruse (if false, only direct subfolders are retrieved) (optional) (default=true)
     * @param relative     Wether or not to also generate relative paths (optional) (default=true)
     * @param includeRoot  Wether or not to include the root folder in the result set (optional) (default=false)
     * @param includeLeaf  Wether or not to also return leaf nodes (optional) (default=true)
     * @param all          Wether or not to return all (or only active) categories (optional) (default=false)
     * @param excludeCat   The root category of the hierarchy to exclude from the result set (optional) (default='')
     * @param assocKey     The field to use as the associated array key (optional) (default='')
     *
     * @return The resulting folder object array
     */
    function getSubCategoriesForCategory ($category, $recurse=true, $relative=true, $includeRoot=false,
                                          $includeLeaf=true, $all=false, $excludeCat=null, $assocKey='')
    {
        $cats = array();

        if (!$category)
            return $cats;

        if ($recurse)
        {
            $ipath = $category['ipath'];
            $ipathExcl = ($excludeCat ? $excludeCat['ipath'] : '');
            $cats = CategoryUtil::getCategoriesByPath ($ipath, 'path', 'ipath', $includeLeaf, $all, $ipathExcl, $assocKey);
        }
        else
        {
            $cats = CategoryUtil::getCategoriesByParentID ($category['id'], '', $all, false, '', '', $assocKey);
            array_unshift ($cats, $category);
        }

        if (!$includeRoot)
            $c = array_shift ($cats);

        if ($cats && $relative)
            CategoryUtil::buildRelativePaths ($category, $cats);

        return $cats;
    }


    /**
     * Delete a category by it's ID
     *
     * @param cid        The categoryID to delete
     *
     * @return The DB result set
     */
    function deleteCategoryByID ($cid)
    {
        pnModDBInfoLoad ('v4bCategories');
        require ('modules/v4bCategories/inc/table_init.inc');

        $cid = (int)$cid;
        $sql = "DELETE FROM $category_table WHERE $category_column[id] = $cid";
        $res = DBUtil::executeSql ($sql);

        return $res;
    }


    /**
     * Delete categories by Path
     *
     * @param apath        The path we wish to delete
     * @param field        The (path) field we delete from (either path or ipath) (optional) (default='ipath')
     *
     * @return The DB result set
     */
    function deleteCategoriesByPath ($apath, $field='ipath')
    {
        pnModDBInfoLoad ('v4bCategories');
        require ('modules/v4bCategories/inc/table_init.inc');

        $sql = "DELETE FROM $category_table WHERE $category_column[$field] LIKE '$apath%'";
        $res = DBUtil::executeSql ($sql);

        return $res;
    }


    /**
     * Move categories by ID (recursive move)
     *
     * @param cid           The categoryID we wish to move
     * @param newparent_id  The categoryID of the new parent category
     *
     * @return true or false
     */
    function moveCategoriesByID ($cid, $newparent_id)
    {
        $cat = CategoryUtil::getCategoryByID ($cid);

        if (!$cat)
        {
            $false = false;
            return $false;
        }

        return CategoryUtil::moveCategoriesByPath ($cat['ipath'], $newparent_id);
    }


    /**
     * Move SubCategories by Path (recurisve move)
     *
     * @param apath         The path to move from
     * @param newparent_id  The categoryID of the new parent category
     * @param field         The field to use for the path reference (optional) (default='ipath')
     *
     * @return true or false
     */
    function moveSubCategoriesByPath ($apath, $newparent_id, $field='ipath')
    {
        return CategoryUtil::moveCategoriesByPath ($apath, $newparent_id, $field, false);
    }


    /**
     * Move Categories by Path (recurisve move)
     *
     * @param apath         The path to move from
     * @param newparent_id  The categoryID of the new parent category
     * @param field         The field to use for the path reference (optional) (default='ipath')
     * @param includeRoot   Wether or not to also move the root folder  (optional) (default=true)
     *
     * @return true or false
     */
    function moveCategoriesByPath ($apath, $newparent_id, $field='ipath', $includeRoot=true)
    {
        $cats = CategoryUtil::getCategoriesByPath ($apath, 'path', $field);
        $newParent = CategoryUtil::getCategoryByID ($newparent_id);

        if (!$newParent || !$cats)
        {
            $false = false;
            return $false;
        }

        if (!$includeRoot)
            array_shift ($cats);

        $newParentIPath  = $newParent['ipath'] . '/';
        $newParentPath   = $newParent['path'] . '/';

        $oldParent       = CategoryUtil::getCategoryByID ($cats[0]['parent_id']);
        $oldParentIPath  = $oldParent['ipath'] . '/';
        $oldParentPath   = $oldParent['path'] . '/';

        pnModDBInfoLoad ('v4bCategories');
        require ('modules/v4bCategories/inc/table_init.inc');

        $pathField = $category_column[$field];
        $fpath     = $category_column['path'];
        $fipath    = $category_column['ipath'];

        $sql = "UPDATE $category_table SET
                $fpath = REPLACE($fpath, '$oldParentPath', '$newParentPath'),
                $fipath = REPLACE($fipath, '$oldParentIPath', '$newParentIPath')
                WHERE $pathField = '$apath' OR $pathField LIKE '$apath/%'";
        DBUtil::executeSql ($sql);

        $pid = $cats[0]['id'];
        $sql = "UPDATE $category_table SET $category_column[parent_id] = $newparent_id
                WHERE $category_column[id] = $pid";
        DBUtil::executeSql ($sql);

        return true;
    }


    /**
     * Copy categories by ID (recursive copy)
     *
     * @param cid           The categoryID we wish to copy
     * @param newparent_id  The categoryID of the new parent category
     *
     * @return true or false
     */
    function copyCategoriesByID ($cid, $newparent_id)
    {
        $cat = CategoryUtil::getCategoryByID ($cid);

        if (!$cat)
          return false;

        return CategoryUtil::copyCategoriesByPath ($cat['ipath'], $newparent_id);
    }


    /**
     * Copy SubCategories by Path (recurisve copy)
     *
     * @param apath         The path to copy from
     * @param newparent_id  The categoryID of the new parent category
     * @param field         The field to use for the path reference (optional) (default='ipath')
     *
     * @return true or false
     */
    function copySubCategoriesByPath ($apath, $newparent_id, $field='ipath')
    {
        return CategoryUtil::copyCategoriesByPath ($apath, $newparent_id, $field, false);
    }


    /**
     * Copy Categories by Path (recurisve copy)
     *
     * @param apath         The path to copy from
     * @param newparent_id  The categoryID of the new parent category
     * @param field         The field to use for the path reference (optional) (default='ipath')
     * @param includeRoot   Wether or not to also move the root folder (optional) (default=true)
     *
     * @return true or false
     */
    function copyCategoriesByPath ($apath, $newparent_id, $field='ipath', $includeRoot=true)
    {
        $cats = CategoryUtil::getSubCategoriesByPath ($apath, 'ipath', $field, true, true);
        $newParent = CategoryUtil::getCategoryByID ($newparent_id);

        if (!$newParent || !$cats)
            return false;

        $oldToNewID = array();
        $oldToNewID[$cats[0]['parent_id']] = $newParent['id'];

        if (!$includeRoot)
            array_shift ($cats);

        $ak = array_keys ($cats);
        foreach ($ak as $v)
        {
            $cat = $cats[$v];

            $oldID = $cat['id'];
            $cat['id']        = '';
            $cat['parent_id'] = $oldToNewID[$cat['parent_id']];
            $cat['path']      = $newParent['path'] . $cat['path_relative'];

            $v4bCat = new v4bCategory ($cat);
            $v4bCat->insert ();
            $oldToNewID[$oldID] = $v4bCat->_objData['id'];
        }

        // rebuild iPath since now we have all new PathIDs
        CategoryUtil::rebuildPaths ('ipath', 'id');
        return true;
    }


    /**
     * Check wether $cid is a direct subcategory of $root_id
     *
     * @param root_id    The root/parent ID
     * @param cid        The categoryID we wish to check for subcategory-ness.
     *
     * @return true or false
     */
    function isDirectSubCategoryByID ($root_id, $cid)
    {
        $cat = CategoryUtil::getCategoryByID ($cid);

        if ($cat['parent_id'])
            return $cat['parent_id'] == $root_id;

        return false;
    }


    /**
     * Check wether $cid is a direct subcategory of $root_id
     *
     * @param rootCat    The root/parent category
     * @param cat        The category we wish to check for subcategory-ness.
     *
     * @return true or false
     */
    function isDirectSubCategory ($rootCat, $cat)
    {
        return $cat['parent_id'] == $rootCat['id'];
    }


    /**
     * Check wether $cid is a subcategory of $root_id
     *
     * @param root_id    The ID of the root category we wish to check from
     * @param cid        The category-id we wish to check for subcategory-ness.
     *
     * @return true or false
     */
    function isSubCategoryByID ($root_id, $cid)
    {
        $rootCat = CategoryUtil::getCategoryByID ($root_id);
        $cat     = CategoryUtil::getCategoryByID ($cid);

        if (!$rootCat || !$cid)
            return false;

        return CategoryUtil::isSubCategory ($rootCat, $cat);
    }


    /**
     * Check wether $cat is a subcategory of $rootCat
     *
     * @param rootCat    The root/parent category
     * @param cat        The category we wish to check for subcategory-ness.
     *
     * @return true or false
     */
    function isSubCategory ($rootCat, $cat)
    {
        $rPath = $rootCat['ipath'] . '/';
        $cPath = $cat['ipath'];

        return strpos($cPath, $rPath) === 0;
    }


    /**
     * Check wether the category $cid has subcategories with have proper value entries (leaf nodes)
     *
     * @param cid        The parent category
     * @param valueOnly  Wether or not to explicitly check for valid values in the subcategories
     * @param all        Wether or not to return all (or only active) subcategories
     *
     * @return true or false
     */
    function haveDirectSubcategories ($cid, $valueOnly=false, $all=true)
    {
        $cats = CategoryUtil::getCategoriesByParentID ($cid, '', $all);

        if(!$valueOnly)
            return (boolean)count($cats);

        foreach ($cats as $cat)
            if ($cat['value'] != -1)
                return true;

        return false;
    }


    /**
     * Get the java-script for the tree menu
     *
     * @param cats       The categories array to represent in the tree
     *
     * @return generated tree JS text
     */
    function getCategoryTreeJS ($cats)
    {
        $menuString = CategoryUtil::getCategoryTreeStructure ($cats);

        $treemid = new TreeMenu();
        $treemid->setMenuStructureString($menuString);
        $treemid->parseStructureForMenu('treemenu1');
        $treemid->setLibjsdir("includes/v4blib/phplayersmenu/libjs");
        $treemid->setImgdir("includes/v4blib/phplayersmenu/images");
        $treemid->setImgwww("includes/v4blib/phplayersmenu/images");
        $treemenu1 = $treemid->newTreeMenu('treemenu1');
        return $treemenu1;
    }


    /**
     * Return an array of folders the user has at least access/view rights to.
     *
     * @param cats       The username we wish to get the folder list for
     *
     * @return The resulting folder path array
     */
    function getCategoryTreeStructure ($cats)
    {
        $menuString = '';
        $params = array();
        $params['mode'] = 'edit';

        // use foreach as folders can come back with folderIDs as keys
        foreach ($cats as $k => $v)
        {
             $path   = $v['path'];
             $depth  = StringUtil::countInstances ($path, '/');

             // account for the fact that a single slash is a valid root
             // path but subfolders only have a single slash as well
             if (strlen($path) > 1)
                 $depth++;

             $ds = '';
             for ($j=0; $j<$depth; $j++)
                 $ds .= '.';

             $parent = $v['id'];

             $params['cid'] = $v['id'];
             $url = pnVarPrepForDisplay(pnModURL ('v4bCategories', 'admin', 'edit', $params));

             if ($_GET['type'] == 'admin')
                 $url .= '#top';

             $name = $v['name'];
             $menuLine = "$ds|$name|$url||||\n";

             $menuString .= $menuLine;
        }

        //print (nl2br ($menuString));
        return $menuString;
    }


    /**
     * Return the HTML selector code for the given category hierarchy
     *
     * @param cats          The category hierarchy to generate a HTML selector for
     * @param selected      The selected category
     * @param name          The name of the selector field to generate (optional) (default='category[parent_id]') 
     * @param defaultValue  The default value to present to the user
     * @param defaultText   The default text to present to the user
     * @param submit        Wether or not to submit the form upon change (optional) (default=false)
     *
     * @return The HTML selector code for the given category hierarchy
     */
    function getSelector_Categories ($cats, $selected='0', $name='category[parent_id]', $defaultValue=0, $defaultText='', $submit=false)
    {
        $line = '------------------------------------------------';

        if ($submit)
            $html = "<select name=\"$name\" id=\"$name\" onChange=\"this.form.submit();\">";
        else
            $html = "<select name=\"$name\" id=\"$name\">";

        if ($defaultText)
            $html   = $html . "<option VALUE=\"$defaultValue\">$defaultText</option>";

        $count = 0;
        foreach ($cats as $cat)
        {
            $cslash = StringUtil::countInstances ($cat['ipath'], '/');
            $indent = substr ($line, 0, ($cslash-1)*2);

            if ($count)
                $indent = '|' . $indent;
            else
                $indent = '&nbsp;' . $indent;

            $sel    = ($cat['id']==$selected ? 'selected="selected"' : "");
            $html   = $html . "<option VALUE=\"$cat[id]\" $sel>$indent $cat[name]</option>";
            $count++;
        }
        $html = $html . '</select>';

        return $html;
    }


    /**
     * Compare function for ML name field
     *
     * @param catA      1st category
     * @param catB      2nd category
     *
     * @return The resulting compare value
     */
    function cmpName($catA, $catB)
    {
        $lang = pnUserGetLang();

        if (!$catA['display_name'][$lang])
            $catA['display_name'][$lang] = $catA['name'];

        if ($catA['display_name'][$lang] == $catB['display_name'][$lang])
            return 0;

        return strcmp($catA['display_name'][$lang], $catB['display_name'][$lang]);
    }


    /**
     * Compare function for ML description field
     *
     * @param catA      1st category
     * @param catB      2nd category
     *
     * @return The resulting compare value
     */
    function cmpDesc($catA, $catB)
    {
        $lang = pnUserGetLang();

        if ($catA['display_desc'][$lang] == $catB['display_desc'][$lang])
            return 0;

        return strcmp($a['display_desc'][$lang], $catB['display_desc'][$lang]);
    }


    /**
     * Utility function to sort a category array by the current locate of
     * either the ML name or description
     *
     * @param cats      The categories array
     * @param func      Which compare function to use (determines field to be used for comparison) (optional) (defaylt='cmpName')
     *
     * @return The resulting sorted category array (original array altered in place)
     */
    function sortByLocale (&$cats, $func='cmpName')
    {
        usort($cats, $func);
        return;
    }


    /**
     * Resequence the sort fields for the given category
     *
     * @param cats      The categories array
     * @param step      The counting step/interval (optional) (default=1)
     *
     * @return True if something was done, false if an emtpy $cats was passed in
     */
    function resequence (&$cats, $step=1)
    {
        if (!$cats)
            return false;

        $c  = 0;
        $ak = array_keys ($cats);
        foreach ($ak as $k)
            $cats[$k]['sort_value'] = ++$c*$step;

        return true;
    }


    /**
     * Given an array of categories (with the category-IDs being
     * the keys of the array), return an (idenically indexed) array
     * of category-paths based on the given field (name or id make sense)
     *
     * @param rootCategory  The root/parent category
     * @param cats          The associative categories object array
     *
     * @return The resulting folder path array (which is also altered in place)
     */
    function buildRelativePaths ($rootCategory, &$cats)
    {
        $ppos = strrpos($rootCategory['path'], '/') + 1;
        $ipos = strrpos($rootCategory['ipath'], '/') + 1;

        $ak = array_keys ($cats);
        foreach ($ak as $v)
        {
            $cats[$v]['path_relative']  = substr ($cats[$v]['path'], $ppos-1);
            $cats[$v]['ipath_relative'] = substr ($cats[$v]['ipath'], $ipos-1);
        }

        return $cats;
    }


    /**
     * Given an array of categories (with the category-IDs being
     * the keys of the array), return an (idenically indexed) array
     * of category-paths based on the given field (name or id make sense)
     *
     * @param cats      The associative categories object array
     * @param field     Which field to use the building the path (optional) (default='name')
     *
     * @return The resulting folder path array
     */
    function buildPaths ($cats, $field='name')
    {
        $paths = array ();

        foreach ($cats as $k => $v)
        {
            $path = $v[$field];
            $pid  = $v['parent_id'];

            while ($pid)
            {
            $pcat = $cats[$pid];
                $path = "$pcat[$field]/$path";
            $pid  = $pcat['parent_id'];
        }

            $paths[$k] = "/$path";
        }

        return $paths;
    }


    /**
     * Rebuild the path field for all categories in the database
     * Note that the
     *
     * @param field         The field which we wish to populate (optional) (default='path')
     * @param sourceField   The field we use to build the path with (optional) (default='name')
     * @param leaf_id       The leaf-category category-id (ie: we'll rebuild the path of this category and all it's parents) (optional) (default=0)
     *
     * Note that field and sourceField go in pairs (that is, if you want sensical results)!
     */
    function rebuildPaths ($field='path', $sourceField='name', $leaf_id=0)
    {
        pnModDBInfoLoad ('v4bCategories');

        //if ($leaf_id)
          //$cats  = CategoryUtil::getParentCategories ($leaf_id, 'id');
        //else
        $cats  = CategoryUtil::getCategories ('', '', 'id');
        $paths = CategoryUtil::buildPaths ($cats, $sourceField);

        foreach ($cats as $k => $v)
        {
            if ($v[$field] != $paths[$field])
            {
                $v[$field] = $paths[$k];
                $v['display_name'] = serialize ($v['display_name']);
                $v['display_desc'] = serialize ($v['display_desc']);

                $res = DBUtil::updateObject ($v, 'v4b_categories_category', '', false);
            }
        }
    }
}
?>