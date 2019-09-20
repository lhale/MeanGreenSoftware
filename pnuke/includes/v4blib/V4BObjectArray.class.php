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
 *  Purpose of file: V4BObjectArray base class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class V4BObjectArray extends V4BObject
{
    /**
     * Constructur, init everything to sane defaults and handle parameters
     *
     * @param init        Initialization value (see _init() for details)
     * @param where       The where clause to apply to the DB get/select (optional) (default='')
     */
    function V4BObjectArray ($init=null, $where='')
    {
        $this->V4BObject ();

        $this->_objType       = 'v4b_generic';
        $this->_objValidation = null;
        $this->_objJoin       = null;
        $this->_objData       = null;
        $this->_objField      = 'id';
        $this->_objKey        = 0;
        $this->_objPath       = 'generic_array';

        $this->_init ($init, $where);
    }


    /**
     * Internal intialization routine
     *
     * @param init        Initialization value (can be an object or a string directive) (optional) (default=null)
     * @param where       The where clause to use when retrieving the object array (optional) (default='')
     * @param orderBy     The order-by clause to use when retrieving the object array (optional) (default='')
     * @param assocKey    Key field to use for building an associative array (optional) (default=null)
     *
     * If $init is an arrary it is set(), otherwise it is interpreted as a string specifying
     * the source from where the data should be retrieved from.
     */
    function _init ($init=null, $where='', $orderBy='', $assocKey=null)
    {
        if ($this->_objType != 'v4b_generic')
        {
            $pntables       = pnDBGetTables();
            $tkey           = $this->_objType;
            $ckey           = $tkey . "_column";
            $this->_table   = $pntables[$tkey];
            $this->_columns = $pntables[$ckey];
        }

        if (!$init)
            return;

        if (is_array($init))
            $this->setData ($init);
        else
        if (is_string($init))
        {
            if ($init == $this->_GET_FROM_DB)
                $this->get($where, $orderBy, -1, -1, $assocKey, true);
            else
            if ($init == $this->_GET_FROM_GET)
                $this->getDataFromSource ($_GET, $this->_objPath, array());
            else
            if ($init == $this->_GET_FROM_POST)
                $this->getDataFromSource ($_POST, $this->_objPath, array());
            else
            if ($init == $this->_GET_FROM_REQUEST)
                $this->getDataFromSource ($_REQUEST, $this->_objPath, array());
            else
            if ($init == $this->_GET_FROM_SESSION)
                $this->getDataFromSource ($_SESSION, $this->_objPath, array(), false);
            else
                v4b_exit ("Invalid init-directive [$init] found in V4BObject::init() ...");
        }
        else
          v4b_exit ("Unexpected parameter type init [$init] in V4BObject::init() ...");
    }


    /**
     * Set (and return) the object data. Since we dont' have a definitive key, we don't cache
     *
     * @param data      The data to assign
     */
    function setData ($data)
    {
        if (!is_array($data))
            return false;

        $this->_objData = $data;
        return $this->_objData;
    }


    /**
     * Return the record count for the given object set
     *
     * @param where     The where-clause to use
     * @param doJoin    Wether or not to use the auto-join for the count
     *
     * @return The object's data set count
     */
    function getCount ($where='', $doJoin=false)
    {
        if ($this->_objJoin && $doJoin)
            $this->_objData = DBUtil::selectExpandedObjectCount ($this->_objType, $this->_objJoin, $where);
        else
            $this->_objData = DBUtil::selectObjectCount ($this->_objType, $where);
        return $this->_objData;
    }


    /**
     * Return the current object data. If $key and $field are supplied,
     * the object is fetched again from the database.
     *
     * @param where         The where-clause to use
     * @param sort          The order-by clause to use
     * @param limitOffset   The limiting offset
     * @param limitNumRows  The limiting number of rows
     * @param assocKey      Key field to use for building an associative array (optional) (default=null)
     * @param force         Wether or not to force a DB-get (optional) (default=false)
     * @param distinct      Wether or not to do a select distinct (optional) (default=false)
     *
     * @return The object's data value
     */
    function get ($where='', $sort='', $limitOffset=-1, $limitNumRows=-1, $assocKey=null, $force=false, $distinct=false)
    {
        //$key  = $this->$_objType . $where . $sort . $limitOffset . $limitNumRows . $assocKey;
        //$hash = md5($key);
        //return $this->select($where, $sort, $limitOffset, $limitNumRows, $assocKey);
        if (strlen($where) || strlen($sort) || $force)
            $this->select($where, $sort, $limitOffset, $limitNumRows, $assocKey, $distinct);
        else
        if (!$this->_objData && isset($_SESSION[$this->_objPath]) && $_SESSION[$this->_objPath])
            $this->_objData = $_SESSION[$this->_objPath];

        return $this->_objData;
    }


    /**
     * Return the currently set object data
     *
     * @return The object's data array
     */
    function getData ()
    {
        return $this->_objData;
    }


    /**
     * Generic select handler for an object. Select (and set) the specified object array
     *
     * @param where         The where-clause to use
     * @param orderBy       The order-by clause to use
     * @param limitOffset   The limiting offset
     * @param limitNumRows  The limiting number of rows
     * @param assocKey      Key field to use for building an associative array (optional) (default=null)
     * @param distinct      Wether or not to use the distinct clause
     *
     * @return The selected Object-Array
     */
    function select ($where='', $orderBy='', $limitOffset=-1, $limitNumRows=-1, $assocKey=false, $distinct=false)
    {
        if ($this->_objJoin)
            $objArr = DBUtil::selectExpandedObjectArray ($this->_objType, $this->_objJoin,
                        $where, $orderBy, $limitOffset, $limitNumRows, $assocKey, $this->_objPermissionFilter);
        else
            $objArr = DBUtil::selectObjectArray ($this->_objType, $where,
                        $orderBy, $limitOffset, $limitNumRows, $assocKey, $this->_objPermissionFilter);

        $this->selectPostProcess ($objArr);
        $this->_objData = $objArr;
        $this->_key     = $where;
        $this->_field   = $orderBy;

        return $this->_objData;
    }


    /**
     * Iterate over the object data and post-process it
     *
     * @return The Object Data
     */
    function selectPostProcess ($data=null)
    {
    }


    /**
     * Generic function to retrieve
     *
     * @return The Object Data
     */
    function getDataField ($offset, $key, $default=null)
    {
        $obj = $this->_objData[$offset];
        if (isset($obj[$key]))
            return $obj[$key];

        return $default;
    }


    /**
     * Save an object - if it has an ID update it, otherwise insert it
     *
     * @return The result set
     */
    function save()
    {
        $objArray =& $this->_objData;
        $ak = array_keys($objArray);
        foreach ($ak as $k)
        {
            if ($objArray[$k][$this->_objField])
            {
                $this->updatePreProcess ($objArray[$k]);
                $res = DBUtil::updateObject ($objArray[$k], $this->_objType);
                $this->updatePostProcess ($objArray[$k]);
            }
            else
            {
               $this->insertPreProcess ($objArray[$k]);
               $res = DBUtil::insertObject ($objArray[$k], $this->_objType);
               $this->insertPostProcess ($objArray[$k]);
            }
        }

        return $res;
    }


    /**
     * Generic insert handler for an object (ID is inserted into the object data)
     *
     * @return The Object Data
     */
    function insert ()
    {
        $objArray =& $this->_objData;
        $ak = array_keys($objArray);
        foreach ($ak as $k)
        {
            $this->insertPreProcess ($objArray[$k]);
            DBUtil::insertObject ($objArray[$k], $this->_objType);
            $this->insertPostProcess ($objArray[$k]);
        }

        return $this->_objData;
    }


    /**
     * Generic upate handler for an object
     *
     * @return The Object Data
     */
    function update ()
    {
        $objArray =& $this->_objData;
        $ak = array_keys($objArray);
        foreach ($ak as $k)
        {
            $this->insertPreProcess ($objArray[$k]);
            DBUtil::updateObject ($objArray[$k], $this->_objType);
            $this->insertPostProcess ($objArray[$k]);
        }

        return $this->_objData;
    }


    /**
     * Generic delete handler for an object
     *
     * @return The Object Data
     */
    function delete ()
    {
        $objArray =& $this->_objData;
        $ak = array_keys($objArray);
        foreach ($ak as $k)
        {
            $this->deletePreProcess ($objArray[$k]);
            DBUtil::deleteObject ($objArray[$k], $this->_objType);
            $this->deletePostProcess ($objArray[$k]);
        }

        return $this->_objData;
    }


    /**
     * Clean the acquired input
     *
     * @param objArray    The object-array to clean (optional) (default=null, reverts to $this->_objData)
     *
     * @return The Object Data
     */
    function clean ($objArray=null)
    {
        if (!$objArray)
            $objArray =& $this->_objData;

        $ak = array_keys($objArray);
        foreach ($ak as $k)
        {
            $obj =& $objArray[$k];
            $ak2 = array_keys($obj);
            foreach ($ak2 as $f)
                $obj[$f] = pnVarCleanFromInput(trim($obj[$f]));
        }

        return $objArray;
    }


    /**
     * Get a selector for the object array
     *
     * @param name          The name of the selector to generate
     * @param selected      The currently selected value (optional) (default=-1234)
     * @param defaultValue  The default value (optional) (default=0)
     * @param defaultText   The default text (optional) (default='')
     * @param allValue      The all-selected value (optional) (default=0)
     * @param allText       The all-selected text (optional) (default='')
     * @param idField       The id field to use (optional) (default='id')
     * @param nameField     The name field to use (optional) (default='title')
     * @param submit        Wether or not to submit the form upon selection (optional) (default=false)
     * @param ignoreList    The list of entries to ignore (default=null)
     *
     * @return The generated selector html text
     */
    function getSelector ($name, $selected=-1234, $defaultValue=0, $defaultText='',
                          $allValue=0, $allText='', $idField='id', $nameField='title',
                          $submit=false, $ignoreList=null)
    {
        $html = '<select name="'.$name.'"'
               .' id="'.pnVarPrepForDisplay($name).'"'
               .($submit ? ' onChange="this.form.submit();"' : '')
               .'>';

        if ($defaultText)
            $html .= "<option value=\"$defaultValue\">$defaultText</option>";

        if ($allText)
            $html .= "<option value=\"$allValue\">$allText</option>";

        foreach ($this->_objData as $k => $v)
        {
            $disp  = $v[$nameField];
            $val   = $v[$idField];

            if (strpos($ignoreList, '$val') === false)
            {
                $sel   = ($val==$selected ? "selected" : "");
                $html .= "<option value=\"$val\" $sel>$disp</option>";
            }
        }
        $html .= '</select>';

        return $html;
    }


    /**
     * Constructur, init everything to sane defaults and handle parameters
     *
     * @return Boolean indicating wether or not validation passed successfully
     */
    function validate ()
    {
        $res1 = ValidationUtil::validateObjectPlain ($this->_objPath, $this->_objValidation);
        $res2 = $this->validatePostProcess();

        if (!$res || !$res2)
            return false;

        return true;
    }


    /**
     * Get the hashcode for this object data array
     */
    function getHash ($includeStandardFields=true)
    {
        $objArrayData = $this->_objData;

        $arrayHash = '';
        foreach ($objArrayData as $obj)
        {

            $objData = $obj;
            if (!$includeStandardFields)
            {
                $objData = $obj; // copy
                removeStandardFieldsFromObject ($objData);
            }

            $arrayHash .= md5(serialize($objData));
        }

        return md5($arrayHash);
    }
}
?>