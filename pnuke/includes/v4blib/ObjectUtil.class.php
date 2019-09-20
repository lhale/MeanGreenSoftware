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
 *  Purpose of file: object utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class ObjectUtil
{
    /**
     * Add standard V4B architecture fields to the table definition
     *
     * @param columns The column list from the PNTables structure for the current table
     * @param col_prefix The column prefix
     *
     * @return Nothing, column array is altered in place
     */
    function addStandardFieldsToTableDefinition (&$columns, $col_prefix)
    {
        // ensure correct handling of prefix with and without underscore
        if ($col_prefix)
        {
            $plen = strlen($col_prefix);
            if ($col_prefix[$plen-1] != '_')
                $col_prefix .= '_';
        }

        // add standard fields
        $columns['obj_status'] = $col_prefix . 'obj_status';
        $columns['cr_date']    = $col_prefix . 'cr_date';
        $columns['cr_uid']     = $col_prefix . 'cr_uid';
        $columns['lu_date']    = $col_prefix . 'lu_date';
        $columns['lu_uid']     = $col_prefix . 'lu_uid';

        return;
    }


    /**
     * Generate the SQL to create the standard V4B architecture fields
     *
     * @param columns The column list from the PNTables structure for the current table
     *
     * @return The generated SQL string
     */
    function generateCreateSqlForStandardFields ($columns)
    {
        $sql = "$columns[obj_status] CHAR(1) NOT NULL DEFAULT 'A',
                $columns[cr_date] DATETIME NOT NULL,
                $columns[cr_uid] INTEGER NOT NULL,
                $columns[lu_date] DATETIME NOT NULL,
                $columns[lu_uid] INTEGER NOT NULL";

        return $sql;
    }


    /**
     * Generate the ADODB datadict entries to create the standard PN architecture fields
     *
     * @param $table  The table to add standard fields using ADODB dictionary method
     *
     * @return The generated SQL string
     */
    function generateCreateDataDictForStandardFields ($table)
    {
            $pntables = pnDBGetTables();
            $columns  = $pntables["{$table}_column"];
        $sql = ",
                $columns[obj_status] C(1) NOTNULL DEFAULT 'A',
                $columns[cr_date] T NOTNULL,
                $columns[cr_uid] I NOTNULL,
                $columns[lu_date] T NOTNULL,
                $columns[lu_uid] I NOTNULL";

        return $sql;
    }


    /**
     * Set the standard V4B architecture fields for object creation/insert
     *
     * @param object     The object we need to set the standard fields on
     * @param preserveExistingValues Wether or not to preserve value fields which have a valid value set
     *
     * @return Nothing, object is altered in place
     */
    function setStandardFieldsOnObjectCreate (&$object, $preserveExistingValues=false)
    {
        if (!is_array ($object))
        {
          print "ObjectUtil::setStandardFieldsOnObjectUpdate called on non-object:<br />";
          return;
        }

        Loader::loadClass ('DateUtil');

        $object['id']         = ( isset($object['id']) && $object['id'] && $preserveExistingValues ? $object['id'] : '');
        $object['obj_status'] = 'A';
        $object['cr_date']    = ( isset($object['cr_date']) && $object['cr_date'] && $preserveExistingValues ? $object['cr_date'] : DateUtil::getDatetime());
        $object['cr_uid']     = ( isset($object['cr_uid'])  && $object['cr_uid']  && $preserveExistingValues ? $object['cr_uid']  : pnUserGetVar('uid'));
        $object['lu_date']    = ( isset($object['lu_date']) && $object['lu_date'] && $preserveExistingValues ? $object['lu_date'] : DateUtil::getDatetime());
        $object['lu_uid']     = ( isset($object['lu_uid'])  && $object['lu_uid']  && $preserveExistingValues ? $object['lu_uid']  : pnUserGetVar('uid'));

        return;
    }


    /**
     * Set the standard V4B architecture fields to sane values for an object update
     *
     * @param object     The object we need to set the standard fields on
     * @param preserveExistingValues Wether or not to preserve value fields which have a valid value set
     *
     * @return Nothing, object is altered in place
     */
    function setStandardFieldsOnObjectUpdate (&$object, $preserveExistingValues=false)
    {
        if (!is_array ($object))
        {
            print "ObjectUtil::setStandardFieldsOnObjectUpdate called on non-object:<br />";
            return;
        }

        Loader::loadClass ('DateUtil');

        $object['lu_date'] = ( isset($object['lu_date']) && $object['lu_date'] && $preserveExistingValues ? $object['lu_date'] : DateUtil::getDatetime());
        $object['lu_uid']  = ( isset($object['lu_uid'])  && $object['lu_uid']  && $preserveExistingValues ? $object['lu_uid']  : pnUserGetVar('uid'));

        return;
    }


    /**
     * Remove the standard fields from the given object
     *
     * @param object    The object to operate on
     *
     * @return Nothing, object is altered in place
     */
    function removeStandardFieldsFromObject (&$object)
    {
        unset ($object['obj_status']);
        unset ($object['cr_date']);
        unset ($object['cr_uid']);
        unset ($object['lu_date']);
        unset ($object['lu_uid']);

        return;
    }


    /**
     * If the specified field is set return it, otherwise return default
     *
     * @param object     The object to get the field from
     * @param field      The field to get
     * @param default     The default value to return if the field is not set on the object (default=null) (optional)
     *
     * @return The object field value or the default
     */
    function getField ($object, $field, $default=null)
    {
         if (isset($object[$field]))
             return $object[$field];

         return $default;
    }


    /**
     * Create an object of the reuqested type and set the cr_date and cr_uid fields.
     *
     * @param $type     The type of the object to create
     *
     * @return The newly created object
     */
    function createObject ($type)
    {
        $pntable = pnDBGetTables();
        if (!$pntable[$type])
            v4b_exit ("ObjectUtil::createObject: unable to reference object type [$type]");

        Loader::loadClass ('DateUtil');
        $object = array ();
        $object['__TYPE__'] = $type;
        $object['cr_date']  = DateUtil::getDateTime ();
        $object['cr_uid']   = pnUserGetVar('uid');

        return $object;
    }


    /**
     * Diff 2 objects/arrays
     *
     * @param object1     The first array/object
     * @param object2     The second object/array
     *
     * @return The difference between the two objects
     */
    function diff ($object1, $object2)
    {
        if (!is_array ($object1))
            v4b_exit ("ObjectUtil::diff: object1 is not an object ... ");
        if (!is_array ($object2))
            v4b_exit ("ObjectUtil::diff: object2 is not an object ... ");

        return array_diff ($object1, $object2);
    }


    /**
     * Provide an informative extended diff array when comparing 2 arrays
     *
     * @param a1        Array 1
     * @param a2        Array 2
     * @param detail    Wether or not to give detailed update info (optional (default=false)
     * @param recurse   Wether or not to recurse (optional) (default=true)
     */
    function diffExtended ($a1, $a2, $detail=false, $recurse=true)
    {
        $res = array();

        if (!is_array($a1) || !is_array($a2))
            return $res;

        foreach ($a1 as $k => $v)
        {
            if (is_array ($v))
        {
                if ($recurse)
                    $res[$k] = diff ($v, $a2[$v], $detail);
        }
            else
            if (!isset($a2[$k]))
                $res[$k] = 'I: ' . $v;
            else
            if ($v !== $a2[$k])
            {
                if ($detail)
                {
                    $res[$k] = array ();
                    $res[$k]['old'] = $v;
                    $res[$k]['new'] = $a2[$k];
                }
                else
                    $res[$k] = 'U: ' . $a2[$k];
            }

            unset ($a2[$k]);
        }

        foreach ($a2 as $k => $v)
        {
            if (is_array ($v))
        {
                if ($recurse)
                $res[$k] = diff ($a1[$v], $v, $detail);
        }
            else
                $res[$k] = 'D: ' . $v;
        }

        return $res;
    }


    /**
     * Fixes the sequence numbers (column position) in a given table.
     * Needed, if an object was added or deleted in a table using the
     * arrow up/down feature.
     *
     * @param tablename   The tablename key for the PNTables structure
     * @param field       The name of the field we wish to resequence (optional) (default='position')
     * @param float       Wether or not to use a float (optional) (default=false (uses integer))
     * @param idcolumn    The column which contains the unique ID
     */
    function resequenceFields ($tablename, $field='position', $float=false, $idcolumn='id')
    {
        $pntables = pnDBGetTables();
        $column   = $pntables["{$tablename}_column"];
        $tab      = $pntables[$tablename];

        if (!$column['position'])
            v4b_exit ("ObjectUtil::resequenceFields: there is no position field in the specified table... ");

        $sql = "SELECT $column[$idcolumn], $column[$field]
                FROM $tab
                ORDER BY $column[$field]";
        $res = DBUtil::executeSQL ($sql);

        $seq = ($float ? 1.0 : 1);
        while(list($id, $curseq) = $res->fields)
        {
            $res->MoveNext();
            if ($curseq != $seq)
            {
                $sql = "UPDATE $tab SET $column[$field] = $seq WHERE $column[$idcolumn]=$id";
                $upd = DBUtil::executeSQL ($sql);
            }
          $seq += 1;
        }
    }


    /**
     * Increments or decremnts a sequence number (column position) in a table for
     * a given ID. If exists, it swaps the sequence of the field above or down.
     *
     * @param object     The object we wish to increment or decrement
     * @param tablename  The tablename key for the PNTables structure
     * @param direction  Wether we want to increment or decrement the position of the object. Possible values are 'up' (default) and 'down'
     * @param field      The name of the field we wish to resequence
     * @param idcolumn   The column which contains the unique ID
     * @param field2     An additional field to consider in the where-clause
     * @param value2     An additional value to consider in the where-clause
     */
    function moveField ($object, $tablename, $direction='up', $field='position', $idcolumn='id',
                        $field2='', $value2='')
    {
        if (!is_array ($object))
            v4b_exit ("ObjectUtil::moveField: object is not an array ... ");

        if (!isset($object[$idcolumn]))
            v4b_exit ("ObjectUtil::moveField: no object ID ... ");

        $pntables = pnDBGetTables();
        $column   = $pntables["{$tablename}_column"];
        $tab      =  $pntables[$tablename];

        if (!$column[$field])
            v4b_exit ("ObjectUtil::moveField: there is no $field field in the specified table... ");

        // Get info on current position of field
        $where = "$column[$idcolumn]=" . pnVarPrepForStore($object[$idcolumn]);
        $seq = DBUtil::selectField($tablename, $field, $where);

        // Get info on displaced field
        $direction = strtolower ($direction);
        $where2 = '';
        if ($field2 && $value2) {
            $where2 = " AND $column[$field2]='" . pnVarPrepForStore($value2) . "'";
        }

        if ($direction == 'up') {
            $sql = "SELECT $column[$idcolumn], $column[$field]
                    FROM $tab
                    WHERE $column[$field] < " . pnVarPrepForStore($seq) . " $where2
                    ORDER BY $column[$field] DESC LIMIT 0,1";
        }else if ($direction == 'down') {
            $sql = "SELECT $column[$idcolumn], $column[$field]
                    FROM $tab
                    WHERE $column[$field] > " . pnVarPrepForStore($seq) . " $where2
                    ORDER BY $column[$field] ASC LIMIT 0,1";
        }else{
            v4b_exit ("ObjectUtil::moveField: invalid direction [$direction] supplied ... ");
        }

        $res = DBUtil::executeSQL ($sql);
        if ($res->EOF)  // No field directly above or below that one
            return false;

        list($altid, $altseq) = $res->fields;

        // Swap sequence numbers
        $sql = "UPDATE $tab SET $column[$field]=$seq WHERE $column[$idcolumn]=$altid";
        $upd1 = DBUtil::executeSQL ($sql);
        $sql = "UPDATE $tab SET $column[$field]=$altseq WHERE $column[$idcolumn]=$object[$idcolumn]";
        $upd2 = DBUtil::executeSQL ($sql);

        return true;
    }


    /**
     * Retrieve the attribute maps for the specified object
     *
     * @param object     The object whose attribute we wish to retrieve
     * @param type       The type of the given object
     * @param idcolumn   The column which holds the ID value (optional) (default='id')
     *
     * @return The object attribute (array)
     */
    function retrieveObjectAttributes ($object, $type, $idcolumn='id')
    {
        if (!$object)
            v4b_exit ('Invalid object passed to ObjectUtil::retrieveObjectAttributes ...');

        if (!$type)
            v4b_exit ('Invalid type passed to ObjectUtil::retrieveObjectAttributes ...');

        // ensure that only objects with a valid ID are used
        if (!$object[$idcolumn])
            return false;

        if (!pnModDBInfoLoad ('v4bObjectData'))
            return false;

        $pntables       = pnDBGetTables();
        $objattr_table  = $pntables['v4b_objectdata_attributes'];
        $objattr_column = $pntables['v4b_objectdata_attributes_column'];

        // ensure module was successfully loaded
        if (!$objattr_table)
            return false;

        $where = "WHERE $objattr_column[object_id]=$object[$idcolumn] AND
                        $objattr_column[object_type]='$type'";

        $objArray = DBUtil::selectObjectArray ('v4b_objectdata_attributes', $where);
        return $objArray;
    }


    /**
     * Expand the given object with it's attributes
     *
     * @param object     The object whose attribute we wish to retrieve
     * @param type       The type of the given object
     * @param idcolumn   The column which holds the ID value (optional) (default='id')
     *
     * @return The object which has been altered in plac
     */
    function expandObjectWithAttributes (&$object, $type, $idcolumn='id')
    {
        // ensure that only objects with a valid ID are used
        if (!isset($object[$idcolumn]) || !$object[$idcolumn])
            return;

        $objAttributes = ObjectUtil::retrieveObjectAttributes ($object, $type);

        if ($objAttributes === false)
            return false;

        foreach ($objAttributes as $objAtr)
        {
            $atrName = 'ATR_' . $objAtr['attribute_name'];
            $atrVal  = $objAtr['value'];

            $object[$atrName] = $atrVal;
        }

        return $object;
    }



    /**
     * Store the attributes for the given objects. Attributes must start with the
     * string "ATR_" in oder to be recognized.
     *
     * @param object     The object whose attributes we wish to store
     * @param type       The type of the given object
     * @param idcolumn   The idcolumn of the object (optional) (default='id')
     */
    function storeObjectAttributes ($object, $type, $idcolumn='id')
    {
        if (!$object)
            v4b_exit ('Invalid object passed to ObjectUtil::storeObjectAttributes ...');

        if (!$type)
            v4b_exit ('Invalid type passed to ObjectUtil::storeObjectAttributes ...');

        if (!pnModDBInfoLoad ('v4bObjectData'))
            return false;

        $pntables       = pnDBGetTables();
        $objattr_table  = $pntables['v4b_objectdata_attributes'];
        $objattr_column = $pntables['v4b_objectdata_attributes_column'];

        // ensure module was successfully loaded
        if (!$objattr_table)
            return false;

        $objID = $object[$idcolumn];
        if (!$objID)
            v4b_exit ('storeObjectAttributes: Unable to determine object ID ... ');

        // delete old attribute values for this object
        $sql = "DELETE FROM $objattr_table WHERE $objattr_column[object_type] = '$type' AND
                                                 $objattr_column[object_id] = $objID";
        DBUtil::executeSQL ($sql);

        // process all the attribute fields
        $tobj = array ();
        foreach ($object as $key => $val)
        {
            if (!empty($val) && strpos($key, "ATR_") === 0)
            {
                $atrName = substr ($key, 4);

            $tobj['attribute_name'] = $atrName;
            $tobj['object_id'] = $objID;
            $tobj['object_type'] = $type;
            $tobj['value'] = $val;

            DBUtil::insertObject ($tobj, 'v4b_objectdata_attributes');
            }
        }

        return true;
    }


    /**
     * Delete the attributes for the given object.
     *
     * @param object     The object whose attributes we wish to store
     * @param type       The type of the given object
     */
    function deleteObjectAttributes (&$object, $type)
    {
        if (!$object)
          v4b_exit ('Invalid object passed to ObjectUtil::deleteObjectAttributes ...');

        if (!$type)
          v4b_exit ('Invalid type passed to ObjectUtil::deleteObjectAttributes ...');

        if (!pnModDBInfoLoad ('v4bObjectData'))
            return false;

        $pntables       = pnDBGetTables();
        $objattr_table  = $pntables['v4b_objectdata_attributes'];
        $objattr_column = $pntables['v4b_objectdata_attributes_column'];

        // ensure module was successfully loaded
        if (!$objattr_table)
          return false;

        $sql = "DELETE FROM $objattr_table WHERE $objattr_column[object_type] = '$type' AND
                                                 $objattr_column[object_id] = $object[id]";
        $res = DBUtil::executeSQL ($sql);
        return $res;
    }


    /**
     * Retrieve a list of attributes defined in the system
     *
     * @param sort         The column to sort by (optional) (default='attribute_name')
     */
    function getSystemAttributes ($sort='attribute_name')
    {
        if (!pnModDBInfoLoad ('v4bObjectData'))
            return false;

        $pntables       = pnDBGetTables();
        $objattr_table  = $pntables['v4b_objectdata_attributes'];
        $objattr_column = $pntables['v4b_objectdata_attributes_column'];

        // ensure module was successfully loaded
        if (!$objattr_table)
            return false;

        $sql = "SELECT DISTINCT $objattr_column[attribute_name]
                FROM $objattr_table ORDER BY $objattr_column[$sort]";
        $res = DBUtil::executeSql ($sql, false, false);

        if (!$res)
            return $res;

        $atrNames = array ();
        for(; !$res->EOF; $res->MoveNext())
        {
            $atrName = $res->fields[0];
            if ($atrNames != '')
                $atrNames[] = $atrName;
        }

        return $atrNames;
    }


    /**
     * Retrieve the count for a given attribute name
     *
     * @param atrName     The name of the attribute
     *
     * @return The count for the given attribute
     */
    function getAttributeCount ($atrName)
    {
        if (!pnModDBInfoLoad ('v4bObjectData'))
            return false;

        $pntables       = pnDBGetTables();
        $objattr_column = $pntables['v4b_objectdata_attributes_column'];

        $where = "$objattr_column[attribute_name]='$atrName'";
        return DBUtil::selectObjectCount ('v4b_objectdata_attributes', $where);
    }


    /**
     * Ensure that a meta-data object has reasonable default values
     *
     * @param obj        The object we wish to store metadata for
     * @param tablename  The object's tablename
     * @param idcolumn   The object's idcolumn (optional) (default='id')
     *
     * @return Altered meta object (meta object is also altered in place)
     */
    function fixObjectMetaData (&$obj, $tablename, $idcolumn)
    {
        if (!isset($obj['__META__']) || !is_array($obj['__META__']))
            $obj['__META__'] = array ();

        $meta =& $obj['__META__'];

        $meta['table']    = $tablename;
        $meta['idcolumn'] = $idcolumn;

        if (!isset($meta['module']) || !$meta['module'])
            $meta['module'] = pnModGetName ();

        if (!isset($meta['obj_id']) || !$meta['obj_id'])
            $meta['obj_id'] = (isset($obj[$idcolumn]) ? $obj[$idcolumn] : -1);

        return $meta;
    }


    /**
     * Insert a meta data object
     *
     * @param obj        The object we wish to store metadata for
     * @param tablename  The object's tablename
     * @param idcolumn   The object's idcolumn (optional) (default='id')
     *
     * @return The result from the metadata insert operation
     */
    function insertObjectMetaData (&$obj, $tablename, $idcolumn='id')
    {
        if (!pnModDBInfoLoad ('v4bObjectData'))
            return false;

        $meta = ObjectUtil::fixObjectMetaData ($obj, $tablename, $idcolumn);
        if ($meta['obj_id'] > 0)
        {
            $result = DBUtil::insertObject ($meta, 'v4b_objectdata_meta');
            $obj['__META__']['metaid'] = $meta['id'];
            return $meta['id'];
        }

        return false;
    }


    /**
     * Update a meta data object
     *
     * @param obj        The object we wish to store metadata for
     * @param tablename  The object's tablename
     * @param idcolumn   The object's idcolumn (optional) (default='id')
     *
     * @return The result from the metadata insert operation
     */
    function updateObjectMetaData (&$obj, $tablename, $idcolumn='id')
    {
        if (!pnModDBInfoLoad ('v4bObjectData'))
            return false;

        if(!isset($obj['__META__']['id'])) {
            if(!ObjectUtil::expandObjectWithMeta ($obj, $tablename, $idcolumn)) {
                return false;
            }
        }

        $meta = $obj['__META__'];
        if ($meta['obj_id'] > 0)
            return DBUtil::updateObject ($meta, 'v4b_objectdata_meta');

        return true;
    }


    /**
     * Delete a meta data object
     *
     * @param obj        The object we wish to delete metadata for
     * @param tablename  The object's tablename
     * @param idcolumn   The object's idcolumn (optional) (default='id')
     *
     * @return The result from the metadata insert operation
     */
    function deleteObjectMetaData (&$obj, $tablename, $idcolumn='id')
    {
        if (!pnModDBInfoLoad ('v4bObjectData'))
            return false;

        ObjectUtil::fixObjectMetaData ($obj, $tablename, $idcolumn);

        if (isset($obj['__META__']['id']) && $obj['__META__']['id'])
            $rc = DBUtil::deleteObjectByID ($obj['__META__'], 'v4b_objectdata_meta');
        else
        if (isset($obj['__META__']['idcolumn']) && $obj['__META__']['obj_id'])
        {
            $pntables    = pnDBGetTables();
            $meta_column = $pntables['v4b_objectdata_meta_column'];

            $meta = $obj['__META__'];
            $where = "WHERE $meta_column[module]='$meta[module]'
                        AND $meta_column[table]='$meta[table]'
                        AND $meta_column[idcolumn]='$meta[idcolumn]'
                        AND $meta_column[obj_id]='$meta[obj_id]'";

            $rc = DBUtil::deleteObject(array(), 'v4b_objectdata_meta', $where);
        }

        return (boolean)$rc;
    }


    /**
     * Retrieve object meta data
     *
     * @param obj        The object we wish to retrieve metadata for
     * @param tablename  The object's tablename
     * @param idcolumn   The object's idcolumn (optional) (default='id')
     *
     * @return The object with the meta data filled in
     */
    function retrieveObjectMetaData (&$obj, $tablename, $idcolumn='id')
    {
        if (!pnModDBInfoLoad ('v4bObjectData'))
            return false;

        $meta = ObjectUtil::fixObjectMetaData ($obj, $tablename, $idcolumn);
        if ($meta['obj_id'] > 0)
        {
             $pntables       = pnDBGetTables();
             $meta_column = $pntables['v4b_objectdata_meta_column'];

             $where = "WHERE $meta_column[module]='$meta[module]'
                         AND $meta_column[table]='$meta[table]'
                         AND $meta_column[idcolumn]='$meta[idcolumn]'
                         AND $meta_column[obj_id]='$meta[obj_id]'";

             return DBUtil::selectObject ('v4b_objectdata_meta', $where);
        }

        return true;
    }


    /**
     * Expand an object with it's Meta data
     *
     * @param obj        The object we wish to get the metadata for
     * @param tablename  The object's tablename
     * @param idcolumn   The object's idcolumn (optional) (default='id')
     *
     * @return The object with the meta data filled in. The object passed in is altered in place
     */
    function expandObjectWithMeta (&$obj, $tablename, $idcolumn='id')
    {
        $meta = ObjectUtil::retrieveObjectMetaData ($obj, $tablename, $idcolumn);
        $obj['__META__'] = $meta;
        return $obj;
    }


    /**
     * Map an object meta-ID to a category-ID
     *
     * @param metaID      The meta-object's ID
     * @param categoryID  The category OD
     *
     * @return boolean The DB insert operation result code cast to a boolean
     */
    function categorizeObject ($metaID, $categoryID)
    {
        if (!pnModDBInfoLoad ('v4bCategories'))
            return false;

        $obj = array();
        $obj['meta_id'] = (int)$metaID;
        $obj['category_id'] = (int)$categoryID;

        $res = DBUtil::insertObject ($map, 'v4b_categories_map', '', false, false);
        return (boolean)$res;
    }


    /**
     * Save an object category map
     *
     * @param map    The category map data object
     *
     * @return boolean The DB insert operation result code cast to a boolean
     */
    function saveObjectCategoryMapping ($map)
    {
        if (!pnModDBInfoLoad ('v4bCategories'))
            return false;

        if ($map['id'])
            $res = DBUtil::updateObject ($map, 'v4b_categories_map', '', false, false);
        else
            $res = DBUtil::insertObject ($map, 'v4b_categories_map', '', false, false);

        return (boolean)$res;
    }


    /**
     * Save object category maps
     *
     * @param maps    The array of category map data objects
     *
     * @return true
     */
    function saveObjectCategoryMappings ($maps)
    {
        if (!pnModDBInfoLoad ('v4bCategories'))
            return false;

        foreach ($maps as $map)
        {
            if ($map['id'])
                $res = DBUtil::updateObject ($map, 'v4b_categories_map', '', false, false);
            else
                $res = DBUtil::insertObject ($map, 'v4b_categories_map', '', false, false);
        }

        return true;
    }


    /**
     * Register a module category
     *
     * @param modcat    The array of category map data objects
     *
     * @return boolean The DB insert operation result code cast to a boolean
     */
    function registerModuleCategory ($modcat)
    {
        if (!pnModDBInfoLoad ('v4bCategories'))
            return false;

        if ($modcat['id'])
            $res = DBUtil::updateObject ($modcat, 'v4b_categories_registry', '', false, false);
        else
            $res = DBUtil::insertObject ($modcat, 'v4b_categories_registry', '', false, false);

        return (boolean)$res;
    }


    /**
     * Register module categories
     *
     * @param modcats    The array of category map data objects
     *
     * @return true
     */
    function registerModuleCategories ($modcats)
    {
        if (!pnModDBInfoLoad ('v4bCategories'))
            return false;

        foreach ($modcats as $modcat)
        {
            if ($modcat['id'])
                $res = DBUtil::updateObject ($modcat, 'v4b_categories_registry', '', false, false);
            else
                $res = DBUtil::insertObject ($modcat, 'v4b_categories_registry', '', false, false);
        }

        return true;
    }


    /**
     * Get registered Categories for a module
     *
     * @param modname    The module name
     *
     * @return The associative field array of registered categories for the specified module
     */
    function getRegisteredModuleCategories ($modname)
    {
        if (!pnModDBInfoLoad ('v4bCategories'))
            return false;

        $pntables    = pnDBGetTables();
        $cmap_column = $pntables['v4b_categories_registry_column'];

        $where = "WHERE $cmap_column[modname]='$modname'";
        $fArr  = DBUtil::selectFieldArray ('v4b_categories_registry', 'category_id', $where, '', false, 'property');

        return $fArr;
    }


    /**
     * Get registered category for module property
     *
     * @param modname    The array of category map data objects
     * @param property   The property name
     * @param default    The default value to return if the requested value is not set (optional) (default=null)
     *
     * @return The associative field array of registered categories for the specified module
     */
    function getRegisteredModuleCategory ($modname, $property, $default=null)
    {
        $fArr = getRegisteredModuleCategories ($modname);

        if (isset($fArr[$property]))
            return $fArr[$property];

        return $default;
    }

}
?>