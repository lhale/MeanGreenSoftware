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
 *  Purpose of file: V4BObject base class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class V4BObject
{

    // state/type (static)
    var $_objType;                // object type
    var $_objJoin;                // object join data
    var $_objValidation;          // object validation data

    // data + access descriptor
    var $_objData;                // object data
    var $_objField;               // object key retrieval field
    var $_objKey;                 // object key value
    var $_objPath;                // object session/input path
    var $_objPermissionFilter;    // object permission filter applied

    // support
    var $_table;                  // table name
    var $_columns;                // column array

    // constants
    var $_GET_FROM_DB      = 'D'; // get data from DB
    var $_GET_FROM_GET     = 'G'; // get data from $_GET
    var $_GET_FROM_POST    = 'P'; // get data from $_POST
    var $_GET_FROM_REQUEST = 'R'; // get data from $_REQUEST
    var $_GET_FROM_SESSION = 'S'; // get data from $_SESSION


    /**
     * Constructur, init everything to sane defaults and handle parameters
     *
     * @param init       Initialization value (see _init() for details)
     * @param key        The DB key to use to retrieve the object (optional) (default=null)
     */
    function V4BObject ($init=null, $key=null)
    {
        $this->_objType             = 'v4b_generic';
        $this->_objValidation       = null;
        $this->_objJoin             = null;
        $this->_objData             = null;
        $this->_objField            = 'id';
        $this->_objKey              = 0;
        $this->_objPath             = 'generic';
        $this->_objPermissionFilter = null;

        $this->_init ($init, $key);
    }


    /**
     * Internal intialization routine
     *
     * @param init       Initialization value (can be an object or a string directive)
     * @param key        The DB key to use to retrieve the object (optional) (default=null)
     * @param field      The field containing the key value (optional) (default='id')
     *
     * If $_init is an arrary it is set(), otherwise it is interpreted as a string specifying
     * the source from where the data should be retrieved from.
     */
    function _init ($init=null, $key=null, $field='id')
    {
        if ($this->_objType != 'v4b_generic')
        {
            $pntables       = pnDBGetTables();
            $tkey           = $this->_objType;
            $ckey           = $this->_objType . "_column";
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
            {
                if (!strlen($key))
                    v4b_exit ("Missing DB-key in V4BObject::init() ...");

                $this->get($key, $this->_objField, true);
            }
            else
            if ($init == $this->_GET_FROM_GET)
                $this->getDataFromSource ($_GET, $this->_objPath);
            else
            if ($init == $this->_GET_FROM_POST)
                $this->getDataFromSource ($_POST, $this->_objPath);
            else
            if ($init == $this->_GET_FROM_REQUEST)
                $this->getDataFromSource ($_REQUEST, $this->_objPath);
            else
            if ($init == $this->_GET_FROM_SESSION)
                $this->getDataFromSource ($_SESSION, $this->_objPath);
            else
                v4b_exit ("Invalid init-directive [$init] found in V4BObject::init() ...");
        }
        else
            v4b_exit ("Unexpected parameter type init [$init] in V4BObject::init() ...");
    }


    /**
     * Set (and return) the object data.
     *
     * @param data        The data to assign
     * @param cache       Wether or not to cache the data in session (optional) (default=true)
     */
    function setData ($data, $cache=true)
    {
        if (!is_array($data))
        {
            $false = false;
            return $false;
        }

        $this->_objData = $data;
        if ($cache)
            $_SESSION[$this->_objPath] = $data;

        return $this->_objData;
    }


    /**
     * Return the current object data. If $key and $field are supplied,
     * the object is fetched again from the database.
     *
     * @param key        The record's key value
     * @param field      The field we wish to get (optional) (default='id')
     * @param force      If false, the system attempts to return the object from the session cache (optional) (default=false)
     *
     * @return The object's data value
     */
    function &get ($key=0, $field='id', $force=false)
    {
        if (!$key)
            return $this->_objData;

        return $this->select ($key, $field);
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
     * Return the object-ID or false
     *
     * @return The object-ID or false
     */
    function getID ()
    {
         if (isset($this->_objData[$this->_objField]))
             return $this->_objData[$this->_objField];

         return false;
    }


    /**
     * Return/Select the object using the given where clause.
     *
     * @param where        The where-clause to use
     *
     * @return The object's data value
     */
    function &getWhere ($where)
    {
        return $this->select (null, null, $where);
    }


    /**
     * Return wether or not this object has a set ID field
     *
     * @return Boolean
     */
    function hasID ()
    {
        return (boolean)($this->_objData[$this->_objField]);
    }


    /**
     * Select the object from the database using the specified key (and field)
     *
     * @param key        The record's key value (if init is a string directive)
     * @param field      The key-field we wish to select by (optional) (default='id')
     * @param where      The key-field we wish to select by (optional) (default='id')
     *
     * @return The object's data value
     */
    function &select ($key, $field='id', $where='')
    {
        if (!$this->_objType)
            return array();

        if ((!$key || !$field) && !$where)
            return array();

        // use explicit where clause
        if ($where)
        {
            if ($this->_objJoin)
                $objArray = DBUtil::selectExpandedObjectArray ($this->_objType, $this->_objJoin, $where, '', -1, -1, '', null, $this->_objPermissionFilter);
            else
                $objArray = DBUtil::selectObjectArray ($this->_objType, $where, '', -1, -1, '', null, $this->_objPermissionFilter);

            $this->_objData = $objArray[0];
        }
        // generic key=>value lookup
        else
        {
            if ($this->_objJoin)
                $this->_objData = DBUtil::selectExpandedObjectById ($this->_objType, $this->_objJoin, $key, $field, null, $this->_objPermissionFilter);
            else
                $this->_objData = DBUtil::selectObjectById ($this->_objType, $key, $field, null, $this->_objPermissionFilter);

            $this->_key   = $key;
            $this->_field = $field;
        }

        $this->selectPostProcess ();
        return $this->_objData;
    }


    /**
     * Post-Process the newly selected object. Subclasses can define appropriate implementations.
     *
     * @param obj         Override object (needed for selectObjectArray processing) (optional) (default=null)
     *
     * @return The object's data value
     */
    function selectPostProcess ($obj=null)
    {
    }


    /**
     * Get the data from the various input streams provided.
     *
     * @param key        The access key of the object (optional) (default=null, reverts to $this->_objPath)
     * @param default    The default value to return (optional) (default=null)
     * @param source     Where to get the variable from (optional) (default=null)
     *
     * @return The requested object/value
     */
    function &getDataFromInput ($key=null, $default=null, $source=null)
    {
        $this->getDataFromInput_PreProcess ();

        if (!$key)
            $key = $this->_objPath;

        $obj = FormUtil::getPassedValue ($key, $default, $source);

        if ($obj)
        {
            $this->_objData = $obj;
            $this->getDataFromInput_PostProcess ();
            return $this->_objData;
        }

        return $default;
    }


    /**
     * Post-Process the data after getting it from Input. Subclasses can define appropriate implementations.
     */
    function getDataFromInput_PreProcess ($data=null)
    {
    }


    /**
     * Post-Process the data after getting it from Input. Subclasses can define appropriate implementations.
     */
    function getDataFromInput_PostProcess ($data=null)
    {
    }


    /**
     * Generic access function to retrieve data from the specified source
     *
     * @param source    The source data
     * @param key       The access key of the object (optional) (default=null)
     * @param default   The default value to return (optional) (default=null)
     * @param clean     Wether or not to clean the acquired data (optional) (default=true)
     *
     * @return The requested object/value
     */
    function getDataFromSource ($source, $key=null, $default=null, $clean=true)
    {
        if (!$key)
            $key = $this->_objPath;

        if (isset($source[$key]))
            return $this->setData ($source[$key]);

        return $this->setData ($default);
    }


    /**
     * Generic function to retrieve
     *
     * @param key        The access key of the object field
     * @param default    The default value to return (optional) (default=null)
     *
     * @return The Object Data
     */
    function getDataField ($key, $default=null)
    {
        $objData = $this->_objData;
        if (isset($objData[$key]))
            return $objData[$key];

        return $default;
    }


    /**
     * Generic function to retrieve
     *
     * @param key         The access key of the object field
     * @param value       The value to assign to the specified object field
     *
     * @return The value which was set into the specified object field
     */
    function setDataField ($key, $value)
    {
        $objData =& $this->_objData;
        $objData[$key] = $value;

        return $value;
    }


    /**
     * Generic insert handler for an object (ID is inserted into the object data). If the object
     * contains a valid ID, it is updated, otherwise it it inserted
     *
     * @return The result set
     */
    function save ()
    {
        if ($this->hasID())
        {
            $this->updatePreProcess ();
            $res = DBUtil::updateObject ($this->_objData, $this->_objType);
            $this->updatePostProcess ();
        }
        else
        {
            $this->insertPreProcess ();
            $res = DBUtil::insertObject ($this->_objData, $this->_objType);
            $this->insertPostProcess ();
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
        $this->insertPreProcess ();
        $res = DBUtil::insertObject ($this->_objData, $this->_objType);
        $this->insertPostProcess ();

        return $this->_objData;
    }


    /**
     * Pre-Process the data prior to an insert. Subclasses can define appropriate implementations.
     */
    function insertPreProcess ()
    {
    }


    /**
     * Post-Process the data after an insert. Subclasses can define appropriate implementations.
     */
    function insertPostProcess ()
    {
    }


    /**
     * Generic upate handler for an object
     *
     * @return The Object Data
     */
    function update ()
    {
        $this->updatePreProcess ();
        $res = DBUtil::updateObject ($this->_objData, $this->_objType);
        $this->updatePostProcess ();

        return $this->_objData;
    }


    /**
     * Pre-Process the data prior to an update. Subclasses can define appropriate implementations.
     */
    function updatePreProcess ()
    {
        // empty function, should be implemented by child classes
    }


    /**
     * Post-Process the data after an update. Subclasses can define appropriate implementations.
     */
    function updatePostProcess ()
    {
        // empty function, should be implemented by child classes
    }


    /**
     * Generic delete handler for an object
     *
     * @return The Object Data
     */
    function delete ()
    {
        if ($this->hasID())
        {
            $this->deletePreProcess ();
            DBUtil::deleteObject ($this->_objData, $this->_objType);
            $this->deletePostProcess ();
        }

        return $this->_objData;
    }


    /**
     * Pre-Process the data prior a delete. Subclasses can define appropriate implementations.
     */
    function deletePreProcess ()
    {
        // empty function, should be implemented by child classes
    }


    /**
     * Post-Process the data after a delete. Subclasses can define appropriate implementations.
     */
    function deletePostProcess ()
    {
        // empty function, should be implemented by child classes
    }


    function getValidation ()
    {
        return $this->_objValidation;
    }


    /**
     * Generic function to validate an object
     *
     * @return Boolean indicating wether validation has passed or failed
     */
    function validate ()
    {
        if (!$this->_objValidation)
            return true;

        Loader::loadClass ('ValidationUtil');
        $res1 = ValidationUtil::validateObjectPlain ($this->_objPath, $this->_objValidation);
        $res2 = $this->validatePostProcess();

        return ($res1 && $res2);
    }


    /**
     * Post-Process the basic object validation with class specific logic.
     * Subclasses can define appropriate implementations.
     */
    function validatePostProcess ($type='user')
    {
        // empty function, should be implemented by child classes
        return true;
    }


    /**
     * Get the hashcode for this object data
     */
    function getHash ($includeStandardFields=true)
    {
        $objData = $this->_objData;

        if (!$includeStandardFields)
        {
            $objData = $this->_objData; // copy
            removeStandardFieldsFromObject ($objData);
        }

        return md5(serialize($objData));
    }


    /**
     * Clear the session cache for this object
     */
    function clearSessionCache ()
    {
        unset ($_SESSION[$this->_objPath]);
    }


    /**
     * Print HTML-formatted debug output for the object
     */
    function prayer ()
    {
        prayer ($this);
    }


    /**
     * Print HTML-formatted debug output for the object data
     */
    function prayerData ()
    {
        prayer ($this->_objData);
    }
}
?>