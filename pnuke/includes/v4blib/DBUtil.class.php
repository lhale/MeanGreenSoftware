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
 *  Purpose of file: database utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class DBUtil
{
    /**
     * The strucuture of the parameters joinInfo and permFilter are described here globally 
     * rather then repeating this definition every time these parameters are used/referenced.
     *
     * The joinInfo parameter has to be an array structured as follows:
     * $joinInfo[] = array ('join_table'         =>  'The tablekey to join to'
     *                      'join_field'         =>  'The field key of the field to join',
     *                      'object_field_name'  =>  'The resulting field name ',
     *                      'compare_field_table'=>  'The compare field name (select table)',
     *                      'compare_field_join' =>  'The compare field name (join table)');
     *
     * The permissionFilter parameter has to be an array structured as follows:
     * $permFilter [] = array ('realm'            =>  'The realm to test in (usually 0)',
     *                         'component_left'   =>  'The left part of the component test',
     *                         'component_middle' =>  'The middle part of the component test',
     *                         'component_right'  =>  'The right part of the component test',
     *                         'instance_left'    =>  'The left object field of the instance test',
     *                         'instance_middle'  =>  'The middle object field of the instance test',
     *                         'instance_right'   =>  'The right object field of the instance test',
     *                         'level'            =>  'The access level to check');
     */


    /**
     * Execute SQL, check for errors and return result
     *
     * @param sql          The SQL statement to execute
     * @param exitOnError  Wether to exit on error (default=true) (optional)
     * @param verbose      Wether to be verbose (default=true) (optional)
     *
     * @return mixed The result set of the successfully executed query or false on error
     */
    function executeSQL ($sql, $exitOnError=true, $verbose=true)
    {
        if (!$sql)
            v4b_exit ('No SQL statement to execute in DBUtil::executeSQL()');

        $dbconn = DBConnectionStack::getConnection();
        if (!$dbconn && defined('_PNINSTALLVER'))
            return false;

        if ($result = $dbconn->Execute($sql))
            return $result;

        if ($verbose)
            print '<br />' . $dbconn->ErrorMsg() . '<br />' . $sql . '<br />';

        if ($exitOnError)
            v4b_exit('Exiting after SQL-error');

        return false;
    }


    /**
     * Set the gobal object fetch counter to the specified value
     *
     * This function is workaround for PHP4 limitations when passing default arguments by reference
     *
     * @param count        The value to set the object marhsall counter to
     *
     * @return Nothing, the global variable is assigned counter
     */
    function setFetchedObjectCount ($count=0)
    {
        $GLOBALS['DBUtilFetchObjectCount'] = $count;
    }


    /**
     * Get the gobal object fetch counter
     *
     * This function is workaround for PHP4 limitations when passing default arguments by reference
     *
     * @return The value held by the global
     */
    function getFetchedObjectCount ()
    {
        if (isset($GLOBALS['DBUtilFetchObjectCount']))
            return (int)$GLOBALS['DBUtilFetchObjectCount'];

        return false;
    }


    /**
     * Set the gobal object marshall counter to the specified value
     *
     * This function is workaround for PHP4 limitations when passing default arguments by reference
     *
     * @param count        The value to set the object marhsall counter to
     *
     * @return Nothing, the global variable is assigned
     */
    function setMarshalledObjectCount ($count=0)
    {
        $GLOBALS['DBUtilMarshallObjectCount'] = $count;
    }


    /**
     * Add the specified value to the gobal object marshall counter
     *
     * This function is workaround for PHP4 limitations when passing default arguments by reference
     *
     * @param count        The value to add to the object marhsall counter
     *
     * @return Nothing, the global variable is incremented
     */
    function addMarshalledObjectCount ($count)
    {
        $GLOBALS['DBUtilMarshallObjectCount'] += $count;
    }


    /**
     * Get the gobal object marshall counter
     *
     * This function is workaround for PHP4 limitations when passing default arguments by reference
     *
     * @return Nothing, the global variable is incremented
     */
    function getMarshalledObjectCount ()
    {
        if (isset($GLOBALS['DBUtilMarshallObjectCount']))
            return (int)$GLOBALS['DBUtilMarshallObjectCount'];

        return false;
    }


    /**
     * Convenience function to ensure that the where-clause starts with "WHERE"
     *
     * @param where        The original where clause
     *
     * @return The value held by the global counter
     */
    function checkWhereClause (&$where)
    {
        if (!strlen(trim($where)))
            return;

        if ($where && stristr($where, 'WHERE') === false)
            $where = 'WHERE ' . $where;
    }


    /**
     * Convenience function to ensure that the order-by-clause starts with "ORDER BY"
     *
     * @param orderby    The original order-by clause
     *
     * @return Nothing, the order-by-clause is altered in place
     */
    function checkOrderByClause (&$orderby)
    {
        if (!strlen(trim($orderby)))
            return;

        if ($orderby && stristr($orderby, 'ORDER BY') === false)
            $orderby = 'ORDER BY ' . $orderby;
    }


    /**
     * Build a basic select clause for the specified table with the specified where and orderBy clause
     *
     * @param tablename      The tablename key for the PNTables structure
     * @param where          The original where clause (optional) (default='')
     * @param orderBy        The original order-by clause (optional) (default='')
     * @param columnArray    The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return Nothing, the order-by-clause is altered in place
     */
    function getSelectAllColumnsFrom ($tablename, $where='', $orderBy='', $columnArray=null)
    {
        $pntable = pnDBGetTables();
        $table   = $pntable[$tablename];

        $query = 'SELECT ' . DBUtil::getAllColumns($tablename, $columnArray) . " FROM $table ";

        if (trim($where))
        {
            DBUtil::checkWhereClause ($where);
            $query .= $where . ' ';
        }

        if (trim($orderBy))
        {
            DBUtil::checkOrderByClause ($orderBy);
            $query .= $orderBy . ' ';
        }

        return $query;
    }


    /**
     * Same as PN HTMLApi function but without AS aliasing
     *
     * @param tablename      The tablename key for the PNTables structure
     * @param columnArray    The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return The generated sql string
     */
    function getAllColumns ($tablename, $columnArray=null)
    {
        $pntable = pnDBGetTables();
        $columns = $pntable["{$tablename}_column"];

        if (!$columns)
            v4b_exit ("Invalid table-key [$tablename] passed to getAllColumns");

        $query = '';
        foreach ($columns as $key => $val)
            if (!$columnArray || isset($columnArray[$key]))
                $query .= " $val AS \"$key\",";

        if (!$query && $columnArray)
            v4b_exit ("Empty query generated for [$tablename] filtered by columnArray: ");

        // remove the last ',' from our built result...if there is any
        // length - 1 is the last pos in our string, the ','
        if (($length = strlen($query)) > 0)
            $query = substr($query, 0, $length-1) . ' ';

        return $query;
    }


    /**
     * Same as PN HTMLApi function but returns fully qualified fieldnames
     *
     * @param tablename      The tablename key for the PNTables structure
     * @param tablealias     The SQL table alias to use in the SQL statement
     * @param columnArray    The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return The generated sql string
     */
    function getAllColumnsQualified ($tablename, $tablealias, $columnArray=null)
    {
        $pntable = pnDBGetTables();
        $column  = $pntable["{$tablename}_column"];
        $query   = '';

        if (!$column)
            v4b_exit ("Invalid table-key [$tablename] passed to getAllColumns");

        foreach ($column as $key => $val)
            if (!$columnArray || isset($columnArray[$key]))
                $query .= " $tablealias.$val AS \"$key\",";

        if (!$query && $columnArray)
            v4b_exit ("Empty query generated for [$tablename] filtered by columnArray: ");

        // remove the last ',' from our built result...if there is any
        // length - 1 is the last pos in our string, the ','
        if (($length = strlen($query)) > 0)
            $query = substr($query, 0, $length-1) . ' ';

        return $query;
    }


    /**
     * return the column array for the given table
     *
     * @param tablename      The tablename key for the PNTables structure
     * @param columnArray    The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return The column array for the given table
     */
    function getColumnsArray ($tablename, $columnArray=null)
    {
        $pntables = pnDBGetTables();
        $tkey     = $tablename . '_column';
        $ca       = array ();

        if (!isset($pntables[$tkey]))
            return $ca;

        $cols = $pntables[$tkey];
        foreach ($cols as $key => $val)
        {
           // since the key is plain name, we take it rather
           // than the value to construct object fields from
           //$ca[] = $column[$key];
            if (!$columnArray || isset($columnArray[$key]))
                $ca[] = $key;
        }

        if (!$ca && $columnArray)
            v4b_exit ("Empty column array generated for [$tablename] filtered by columnArray: ");

        return $ca;
    }


    /**
     * Transform a SQL query result set into an object/array, optionally applying an PN permission filter
     *
     * @param result           The result set we wish to marshall
     * @param objectColumns    The column array to map onto the result set
     * @param closeResultSet   Wether or not to close the supplied result set (optional) (default=true)
     * @param assocKey         The key field to use to build the associative index (optional) (default='')
     * @param clean            Wether or not to clean up the fmarshalled data (optional) (default=true)
     * @param permissionFilter The permission structure to use for permission checking (optional) (default=null)
     *
     * @return The marhalled array of objects
     */
    function marshallObjects ($result, $objectColumns, $closeResultSet=true,
                              $assocKey='', $clean=true, $permissionFilter=null)
    {
        if (!$objectColumns)
            v4b_exit ("Invalid objectColumns [$assocKey] received");

        if ($assocKey && !in_array($assocKey, $objectColumns))
            v4b_exit ("Unable to find assocKey [$assocKey] in objectColumns");

        // since the single-object selects don't need to init
        // the paging logic, we ensure values are set here
        // in order to avoid E_ALL issues
        if (!isset($GLOBALS['DBUtilMarshallObjectCount']))
        {
            DBUtil::setFetchedObjectCount (0);
            DBUtil::setMarshalledObjectCount (0);
        }

        $object      = array ();
        $objectArray = array ();
        $cSize       = count($objectColumns);
        $fCount      = 0;

        for ( ; !$result->EOF; $result->MoveNext(), $fCount++)
        {
            // in PHP 5 can do:
            // $object = array_combine($objectColumns,$result->fields);
            // for now we do:
            for ($j=0; $j<$cSize; $j++)
            {
                $col = $objectColumns[$j];
                $object[$col] = $result->fields[$j];
                if ($clean && get_magic_quotes_gpc())
                    pnStripSlashes($object[$col]);
            }

            $havePerm = true;
            if ($permissionFilter)
            {
                if (!is_array($permissionFilter))
                    v4b_exit ('Permission filter is not an array');

                // we need an array of arrays, but this will fix a single array
                if (!is_array($permissionFilter[0]))
                    $permissionFilter = array($permissionFilter);

                $ak = array_keys ($permissionFilter);
                foreach ($ak as $k)
                {
                    $pf = $permissionFilter[$k];
                    if (!is_array($pf))
                        v4b_exit ('Permission filter iterator did not return an array (must be an array of arrays)');

                    $cl  = (isset($pf['component_left'])   ? $pf['component_left']   : '');
                    $cm  = (isset($pf['component_middle']) ? $pf['component_middle'] : '');
                    $cr  = (isset($pf['component_right'])  ? $pf['component_right']  : '');
                    $il  = (isset($pf['instance_left'])    ? $pf['instance_left']    : '');
                    $im  = (isset($pf['instance_middle'])  ? $pf['instance_middle']  : '');
                    $ir  = (isset($pf['instance_right'])   ? $pf['instance_right']   : '');
                    $oil = ($il && isset($object[$il]) ? $object[$il] : '');
                    $oim = ($im && isset($object[$im]) ? $object[$im] : '');
                    $oir = ($ir && isset($object[$ir]) ? $object[$ir] : '');

                    if (!$cl && !$cm && !$cr)
                        v4b_exit ("Permission filter component is empty: [$cl], [$cm], [$cr]");

                    if (!$il && !$im && !$ir)
                        v4b_exit ("Permission filter instance is empty: [$il], [$im], [$ir]");

                    if (!$oil && !$oim && !$oir)
                        v4b_exit ("Permission filter instance is invalid: [$oil], [$oim], [$oir]");

                    if (!pnSecAuthAction($pf['realm'], "$cl:$cm:$cr", "$oil:$oim:$oir", $pf['level']))
                    {
                        $havePerm = false;
                        break;
                    }
            }
        }

            if ($havePerm)
            {
                if ($assocKey)
                {
                    $key = $object[$assocKey];
                    $objectArray[$key] = $object;
                }
                else
                    $objectArray[] = $object;
            }
        }

        if ($closeResultSet)
            $result->Close();

        DBUtil::addMarshalledObjectCount(count($objectArray));
        DBUtil::setFetchedObjectCount($fCount);
        return $objectArray;
    }


    /**
     * Transform a result set into an array of field values
     *
     * @param result          The result set we wish to marshall
     * @param closeResultSet  Wether or not to close the supplied result set (optional) (default=true)
     * @param assocKey        The key field to use to build the associative index (optional) (default='')
     *
     * @return The resulting field array
     */
    function marshallFieldArray (&$result, $closeResultSet=true, $assocKey='')
    {
        $fieldArray = array ();

        for ($i=0; !$result->EOF; $result->MoveNext(), $i++)
        {
            if ($assocKey)
            {
                $f1 = $result->fields[1];
                $fieldArray[$f1] = $result->fields[0];
            }
            else
                $fieldArray[$i] = $result->fields[0];
        }

        if ($closeResultSet)
            $result->Close();

        return $fieldArray;
    }


    /**
     * Select & return a field array
     *
     * @param tablename    The tablename key for the PNTables structure
     * @param field        The name of the field we wish to marshall
     * @param where        The where clause (optional) (default='')
     * @param orderby      The orderby clause (optional) (default='')
     * @param distinct     Wether or not to add a 'DISTINCT' clause (optional) (default=false)
     * @param assocKey     The key field to use to build the associative index (optional) (default='')
     *
     * @return The resulting field array
     */
    function selectFieldArray ($tablename, $field, $where='', $orderby='', $distinct=false, $assocKey='')
    {
        $pntables = pnDBGetTables();
        $columns  = $pntables["{$tablename}_column"];
        $table    = $pntables[$tablename];

        DBUtil::checkWhereClause ($where);

        if ($orderby)
            DBUtil::checkOrderByClause ($orderby);
        else
            $orderby = "ORDER BY $columns[$field]";

        $dSql  = ($distinct ? "DISTINCT($columns[$field])" : "$columns[$field]");
        $assoc = ($assocKey ? ", $columns[$assocKey]" : '');
        $sql   = "SELECT $dSql $assoc FROM $table $where $orderby";
        $res   = DBUtil::executeSQL ($sql);
        if ($res === false)
            return $res;

        return DBUtil::marshallFieldArray ($res, true, $assocKey);
    }


    /**
     * Select & return an expanded field array
     *
     * @param tablename        The tablename key for the PNTables structure
     * @param joinInfo         The array containing the extended join information
     * @param field            The name of the field we wish to marshall
     * @param where            The where clause (optional) (default='')
     * @param orderby          The orderby clause (optional) (default='')
     * @param distinct         Wether or not to add a 'DISTINCT' clause (optional) (default=false)
     * @param assocKey         The key field to use to build the associative index (optional) (default='')
     * @param permissionFilter The permission filter to use for permission checking (optional) (default=null)
     *
     * @return The resulting field array
     */
    function selectExpandedFieldArray ($tablename, $joinInfo, $field, $where='', $orderby='', $distinct=false, $assocKey='', $permissionFilter=null)
    {
        DBUtil::setFetchedObjectCount (0);
        DBUtil::setMarshalledObjectCount (0);

        $pntables = pnDBGetTables();
        $columns  = $pntables["{$tablename}_column"];
        $table    = $pntables[$tablename];
        $ca       = array();
        $ca[]     = $field;

        $alias    = 'a';
        $sqlJoin  = '';
        $sqlJoinFieldList = '';
        $ak = array_keys($joinInfo);
        foreach ($ak as $k)
        {
            $jt   = $joinInfo[$k]['join_table'];
            $jf   = $joinInfo[$k]['join_field'];
            $ofn  = $joinInfo[$k]['object_field_name'];
            $cft  = $joinInfo[$k]['compare_field_table'];
            $cfj  = $joinInfo[$k]['compare_field_join'];

            $jtab = $pntables[$jt];
            $jcol = $pntables["{$jt}_column"];

            // some PN tables encode the table name in column list
            // we attempt to remove it here
            $c1   = $jcol[$jf];
            $c2   = $jcol[$cfj];

            $t = strstr ($c1, '.');
            if ($t !== false)
                $c1 = substr ($t, 1);

            $t = strstr ($c2, '.');
            if ($t !== false)
                $c2 = substr ($t, 1);
            // end extra column info removal

            $line  = ", $alias.$c1 AS $ofn ";
            $sqlJoinFieldList .= $line;

            $ca[] = $ofn;
            $line  = " LEFT JOIN $jtab $alias ON $alias.$c2 = tbl.$columns[$cft] ";
            $sqlJoin .= $line;

            ++$alias;
        }

        DBUtil::checkWhereClause ($where);
        DBUtil::checkOrderByClause ($orderby);

        $dSql  = ($distinct ? "DISTINCT($columns[$field])" : "$columns[$field]");
        $sqlStart = "SELECT $dSql ";
        $sqlFrom  = "FROM $table AS tbl ";

        $sql = "$sqlStart $sqlJoinFieldList $sqlFrom $sqlJoin $where $orderby";
        $res = DBUtil::executeSQL ($sql);
        if ($res === false)
            return $res;

        return DBUtil::marshallFieldArray ($res, true, $assocKey);
    }


    /**
     * Select & return the max/min value of a field
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param field         The name of the field we wish to marshall
     * @param option        MIN or MAX or SUM or COUNT (optional) (default='MAX')
     * @param where         The where clause (optional) (default='')
     *
     * @return The resulting min/max value
     */
    function selectFieldMax ($tablename, $field, $option='MAX', $where='')
    {
        $pntables = pnDBGetTables();
        $columns = $pntables["{$tablename}_column"];
        $table = $pntables[$tablename];

        $sql = "SELECT $option($columns[$field]) FROM $table";

        if ($where != '')
            DBUtil::checkWhereClause ($where);

        $sql = $sql . ' ' . $where;

        $res = DBUtil::executeSQL ($sql);
        if ($res === false)
            return false;

        $max = false;
        if (!$res->EOF)
            $max = $res->fields[0];

        return $max;
    }


    /**
     * Select & return a field by an ID-field value
     *
     * @param tablename    The tablename key for the PNTables structure
     * @param field        The field we wish to select
     * @param id           The ID value we wish to select with
     * @param idfield       The idfield to use (optional) (default='id');
     *
     * @return The resulting field value
     */
    function selectFieldByID ($tablename, $field, $id, $idfield='id')
    {
        $pntables = pnDBGetTables();
        $cols     = $pntables["{$tablename}_column"];
        $where    = $cols[$idfield] . "='" . pnVarPrepForStore($id) . "'";

        return DBUtil::selectField ($tablename, $field, $where);
    }


    /**
     * Select & return a field
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param field         The name of the field we wish to marshall
     * @param where         The where clause (optional) (default='');
     *
     * @return The resulting field array
     */
    function selectField ($tablename, $field, $where='')
    {
        $fieldArray = DBUtil::selectFieldArray ($tablename, $field, $where);

        if (count($fieldArray) > 0)
            return $fieldArray[0];

        return false;
    }


    /**
     * Select & return a specific object using the given sql statement
     *
     * @param sql              The sql statement to execute for the selection
     * @param tablename        The tablename key for the PNTables structure
     * @param columnArray      The columns to marshall into the resulting object (optional) (default=null)
     * @param permissionFilter The permission filter to use for permission checking (optional) (default=null)
     *
     * @return The resulting object
     */
    function selectObjectSql ($sql, $tablename, $columnArray=null, $permissionFilter=null)
    {
        $res = DBUtil::executeSQL ($sql);
        if ($res === false)
            return $res;

        $ca = DBUtil::getColumnsArray ($tablename, $columnArray);
        $objArr = DBUtil::marshallObjects ($res, $ca, true, '', true, $permissionFilter);

        if (count($objArr) > 0)
            return $objArr[0];

        return $objArr;
    }


    /**
     * Select & return a specific object based on a PN table definition
     *
     * @param tablename        The tablename key for the PNTables structure
     * @param where            The where clause (optional) (default='')
     * @param columnArray      The columns to marshall into the resulting object (optional) (default=null)
     * @param permissionFilter The permission filter to use for permission checking (optional) (default=null)
     *
     * @return The resulting object
     */
    function selectObject ($tablename, $where='', $columnArray=null, $permissionFilter=null)
    {
        $sql = DBUtil::getSelectAllColumnsFrom($tablename, $where, '', $columnArray);
        $object = DBUtil::selectObjectSql ($sql, $tablename, $columnArray, $permissionFilter);

        $pntables = pnDBGetTables();
        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
               isset($pntables["{$tablename}_db_extra_enable_attribution"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_ATTRIBUTION') &&
            strcmp($tablename, 'v4b_objectdata_attributes') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 )
                ObjectUtil::expandObjectWithAttributes ($object, $tablename);

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_meta"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_META') &&
            strcmp($tablename, 'v4b_objectdata_attributes') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_meta') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 )
                ObjectUtil::expandObjectWithMeta ($object, $tablename);

        return $object;
    }


    /**
     * Return the number of rows affected
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param where         The where clause (optional) (default='')
     * @param column        The column to place in the count phrase (optional) (default='*')
     * @param distinct      Wether or not to count distinct entries (optional) (default='false')
     *
     * @return The resulting object count
     */
    function selectObjectCount ($tablename, $where='', $column='1', $distinct=false)
    {
        $pntables = pnDBGetTables();
        $table    = $pntables[$tablename];
        $cols     = $pntables["{$tablename}_column"];

        DBUtil::checkWhereClause ($where);

        $dst = ($distinct && $column!='1' ? 'DISTINCT' : '');
        $col = ($column === '1' ? '1' : $cols[$column]);
        $sql = "SELECT COUNT($dst $col) FROM $table $where";

        $res = DBUtil::executeSQL ($sql);
        if ($res === false)
            return $res;

        $count = false;
        if (!$res->EOF)
            $count = $res->fields[0];

        return $count;
    }


    /**
     * Select an object count by ID
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param id            The id value to match
     * @param field         The field to match the ID against
     *
     * @return The resulting object count
     */
    function selectObjectCountByID ($tablename, $id, $field='id')
    {
        if (!$id)
            v4b_exit ('DBUtil::selectObjectCountByID: empty id supplied');

        if ($field == 'id' && !is_numeric($id))
            v4b_exit ('DBUtil::selectObjectCountByID: non-numeric id supplied');

        $pntables = pnDBGetTables();
        $cols     = $pntables["{$tablename}_column"];
        $where    = $cols[$field] . "='" . pnVarPrepForStore($id) . "'";

        return DBUtil::selectObjectCount ($tablename, $where, $field);
    }


    /**
     * Return the number of rows affected
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param joinInfo      The array containing the extended join information
     * @param where         The where clause (optional) (default='')
     * @param column        The column to place in the count phrase (optional) (default='*')
     * @param distinct      Wether or not to count distinct entries (optional) (default='false')
     *
     * @return The resulting object count
     */
    function selectExpandedObjectCount ($tablename, $joinInfo, $where='', $column='*', $distinct=false)
    {
        DBUtil::setFetchedObjectCount (0);
        DBUtil::setMarshalledObjectCount (0);

        $pntables = pnDBGetTables();
        $table    = $pntables[$tablename];
        $columns  = $pntables["{$tablename}_column"];
        if ($column != '*')
            $col      = $columns[$column];
        else
            $col      = $column;
        $ca       = DBUtil::getColumnsArray ($tablename, $columnArray);

        $alias    = 'a';
        $sqlJoin  = '';
        $sqlJoinFieldList = '';
        $ak = array_keys($joinInfo);
        foreach ($ak as $k)
        {
            $jt   = $joinInfo[$k]['join_table'];
            $jf   = $joinInfo[$k]['join_field'];
            $ofn  = $joinInfo[$k]['object_field_name'];
            $cft  = $joinInfo[$k]['compare_field_table'];
            $cfj  = $joinInfo[$k]['compare_field_join'];

            $jtab = $pntables[$jt];
            $jcol = $pntables["{$jt}_column"];

            // some PN tables encode the table name in column list
            // we attempt to remove it here
            $c1   = $jcol[$jf];
            $c2   = $jcol[$cfj];

            $t = strstr ($c1, '.');
            if ($t !== false)
                $c1 = substr ($t, 1);

            $t = strstr ($c2, '.');
            if ($t !== false)
                $c2 = substr ($t, 1);
            // end extra column info removal

            $line  = ", $alias.$c1 AS $ofn ";
            $sqlJoinFieldList .= $line;

            $ca[] = $ofn;
            $line  = " LEFT JOIN $jtab $alias ON $alias.$c2 = tbl.$columns[$cft] ";
            $sqlJoin .= $line;

            ++$alias;
        }

        DBUtil::checkWhereClause ($where);
        DBUtil::checkOrderByClause ($orderby);

        $dst      = ($distinct ? 'DISTINCT' : '');
        $sqlStart = "SELECT COUNT($dst $col) ";
        $sqlFrom  = "FROM $table AS tbl ";

        $sql = "$sqlStart $sqlFrom $sqlJoin $where $orderby";

        $res = DBUtil::executeSQL ($sql);
        if ($res === false)
            return $res;

        $count = false;
        if (!$res->EOF)
            $count = $res->fields[0];

        return $count;
    }


    /**
     * Select & return a specific object by using the ID field
     *
     * @param tablename        The tablename key for the PNTables structure
     * @param id               The object ID to query
     * @param field            The field key which holds the ID value (optional) (default='id')
     * @param columnArray      The columns to marshall into the resulting object (optional) (default=null)
     * @param permissionFilter The permission structure to use for permission checking (optional) (default=null)
     * @param cacheObject      If true returns a cached object if availbel (optional) (default=true)
     *
     * @return The resulting object
     */
    function selectObjectByID ($tablename, $id, $field='id', $columnArray=null, $permissionFilter=null, $cacheObject=true)
    {
        if (!$id)
            v4b_exit ('DBUtil::selectObjectByID: empty id supplied');

        if ($field == 'id' && !is_numeric($id))
            v4b_exit ('DBUtil::selectObjectByID: non-numeric id supplied');

        // avoid double get for title hack, etc.
        static $objectCache = array();
        if (isset($objectCache[$tablename][$field][$id]) && !defined('_PNINSTALLVER') && $cacheObject)
            return $objectCache[$tablename][$field][$id];

        $pntables = pnDBGetTables();
        $cols     = $pntables["{$tablename}_column"];
        $where    = $cols[$field] . "='" . pnVarPrepForStore($id) . "'";

        $obj = DBUtil::selectObject ($tablename, $where, $columnArray, $permissionFilter);
        $objectCache[$tablename][$field][$id] = $obj;
        return $obj;
    }


    /**
     * Select & return a object with it's left join fields filled in
     *
     * @param tablename         The tablename key for the PNTables structure
     * @param joinInfo          The array containing the extended join information
     * @param where             The where clause (optional)
     * @param columnArray       The columns to marshall into the resulting object (optional) (default=null)
     * @param permissionFilter  The permission structure to use for permission checking (optional) (default=null)
     *
     * @return The resulting object
     */
    function selectExpandedObject ($tablename, $joinInfo, $where='', $columnArray=null, $permissionFilter=null)
    {
        $objects = DBUtil::selectExpandedObjectArray ($tablename, $joinInfo, $where, '',
                                                       -1, -1, '', $columnArray, $permissionFilter);

        if (count($objects))
            return $objects[0];

        return $objects;
    }


    /**
     * Select & return an object by it's ID  with it's left join fields filled in
     *
     * @param tablename        The tablename key for the PNTables structure
     * @param joinInfo         The array containing the extended join information
     * @param id               The ID value to use for object retrieval
     * @param field            The field key which holds the ID value (optional) (default='id')
     * @param columnArray      The columns to marshall into the resulting object (optional) (default=null)
     * @param permissionFilter The permission structure to use for permission checking (optional) (default=null)
     *
     * @return The resulting object
     */
    function selectExpandedObjectByID ($tablename, $joinInfo, $id, $field='id', $columnArray=null, $permissionFilter=null)
    {
        $pntables = pnDBGetTables();
        $cols     = $pntables["{$tablename}_column"];
        $where    = $cols[$field] . "='" . pnVarPrepForStore($id) . "'";

        $object   = DBUtil::selectExpandedObject ($tablename, $joinInfo, $where, $columnArray, $permissionFilter=null);
        return $object;
    }


    /**
     * Select & return an object array based on a PN table definition
     *
     * @param tablename      The tablename key for the PNTables structure
     * @param where          The where clause (optional) (default='')
     * @param orderby        The order by clause (optional) (default='')
     * @param limitOffset    The lower limit bound (optional) (default=-1)
     * @param limitNumRows   The upper limit bound (optional) (default=-1)
     * @param assocKey       The key field to use to build the associative index (optional) (default='')
     * @param permissionFilter The permission filter to use for permission checking (optional) (default=null)
     * @param columnArray    The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return The resulting object array
     */
    function selectObjectArray ($tablename, $where='', $orderby='', $limitOffset=-1, $limitNumRows=-1,
                                 $assocKey='', $permissionFilter=null, $columnArray=null)
    {
        DBUtil::setFetchedObjectCount (0);
        DBUtil::setMarshalledObjectCount (0);

        DBUtil::checkWhereClause ($where);
        DBUtil::checkOrderByClause ($orderby);

        $objects = array();
        $ca      = DBUtil::getColumnsArray ($tablename, $columnArray);
        $sql     = DBUtil::getSelectAllColumnsFrom($tablename, $where, $orderby, $columnArray);

        do
        {
            $fc   = DBUtil::getFetchedObjectCount();
            $stmt = $sql;

            if ($limitOffset!=-1 && $limitNumRows!=-1)
            {
                $limitOffset += $fc;
                $stmt .= " LIMIT $limitOffset, $limitNumRows";
            }

            $res = DBUtil::executeSQL ($stmt);
            if ($res === false)
                return $res;

            $objArr  = DBUtil::marshallObjects ($res, $ca, true, $assocKey, true, $permissionFilter);
            $objects = $objects + $objArr; // append new array
        }
        while ($permissionFilter && ($limitNumRows!=-1 && $limitNumRows>0) &&
               $fc>0 && count($objects)<$limitNumRows);

        $pntables = pnDBGetTables();
        if (defined('_PNINSTALLVER') || !DBConnectionStack::isDefaultConnection())
            return $objects;

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_attribution"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_ATTRIBUTION') &&
            strcmp($tablename, 'v4b_objectdata_attributes') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 )
        {
            $ak = array_keys ($objects);
            foreach ($ak as $key)
                ObjectUtil::expandObjectWithAttributes ($objects[$key], $tablename);
        }

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_meta"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_META') &&
            strcmp($tablename, 'v4b_objectdata_attributes') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_meta') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 )
        {
            $ak = array_keys ($objects);
            foreach ($ak as $key)
                ObjectUtil::expandObjectWithMeta ($objects[$key], $tablename);
        }

        return $objects;
    }


    /**
     * Select & return an array of objects with it's left join fields filled in
     *
     * @param tablename     The tablename key for the PNTables structure
     * @param joinInfo      The array containing the extended join information
     * @param where         The where clause (optional)
     * @param orderby       The order by clause (optional)
     * @param limitOffset   The lower limit bound (optional)
     * @param limitNumRows  The upper limit bound (optional)
     * @param assocKey      The key field to use to build the associative index (optional) (default='')
     * @param permissionFilter  The permission filter to use for permission checking (optional) (default=null)
     * @param columnArray   The columns to marshall into the resulting object (optional) (default=null)
     *
     * @return The resulting object
     */
    function selectExpandedObjectArray ($tablename, &$joinInfo, $where='', $orderby='',
                                        $limitOffset=-1, $limitNumRows=-1, $assocKey='',
                                        $permissionFilter=null, $columnArray=null)
    {
        DBUtil::setFetchedObjectCount (0);
        DBUtil::setMarshalledObjectCount (0);

        $pntables = pnDBGetTables();
        $columns  = $pntables["{$tablename}_column"];
        $table    = $pntables[$tablename];
        $ca       = DBUtil::getColumnsArray ($tablename, $columnArray);

        $sqlStart = "SELECT " . DBUtil::getAllColumnsQualified ($tablename, 'tbl', $columnArray);
        $sqlFrom  = "FROM $table AS tbl ";

        $alias    = 'a';
        $sqlJoin  = '';
        $sqlJoinFieldList = '';
        $ak = array_keys($joinInfo);
        foreach ($ak as $k)
        {
            $jt   = $joinInfo[$k]['join_table'];
            $jf   = $joinInfo[$k]['join_field'];
            $ofn  = $joinInfo[$k]['object_field_name'];
            $cft  = $joinInfo[$k]['compare_field_table'];
            $cfj  = $joinInfo[$k]['compare_field_join'];

            $jtab = $pntables[$jt];
            $jcol = $pntables["{$jt}_column"];

            // some PN tables encode the table name in column list
            // we attempt to remove it here
            $c1   = $jcol[$jf];
            $c2   = $jcol[$cfj];

            $t = strstr ($c1, '.');
            if ($t !== false)
                $c1 = substr ($t, 1);

            $t = strstr ($c2, '.');
            if ($t !== false)
                $c2 = substr ($t, 1);
            // end extra column info removal

            $line  = ", $alias.$c1 AS $ofn ";
            $sqlJoinFieldList .= $line;

            $ca[] = $ofn;
            $line  = " LEFT JOIN $jtab $alias ON $alias.$c2 = tbl.$columns[$cft] ";
            $sqlJoin .= $line;

            ++$alias;
        }

        DBUtil::checkWhereClause ($where);
        DBUtil::checkOrderByClause ($orderby);

        $objects = array();
        $sql = "$sqlStart $sqlJoinFieldList $sqlFrom $sqlJoin $where $orderby";

        do
        {
            $fc   = DBUtil::getFetchedObjectCount();
            $stmt = $sql;

            if ($limitOffset!=-1 && $limitNumRows!=-1)
            {
                $limitOffset += $fc;
                $stmt .= " LIMIT $limitOffset, $limitNumRows";
            }

            $res = DBUtil::executeSQL ($stmt);
            if ($res === false)
                return $res;

            $objArr  = DBUtil::marshallObjects ($res, $ca, true, $assocKey, true, $permissionFilter);
            $objects = $objects + $objArr; // append new array
        }
        while ($permissionFilter && ($limitNumRows!=-1 && $limitNumRows>0) &&
               $fc>0 && count($objects)<$limitNumRows);

        if (defined('_PNINSTALLVER') || !DBConnectionStack::isDefaultConnection())
            return $objects;

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_attribution"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_ATTRIBUTION') &&
            strcmp($tablename, 'v4b_objectdata_attributes') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 )
        {
            $ak = array_keys ($objects);
            foreach ($ak as $key)
                ObjectUtil::expandObjectWithAttributes ($objects[$key], $tablename);
        }

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_meta"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_META') &&
            strcmp($tablename, 'v4b_objectdata_attributes') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_meta') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 )
        {
            $ak = array_keys ($objects);
            foreach ($ak as $key)
                ObjectUtil::expandObjectWithAttributes ($objects[$key], $tablename);
        }

        return $objects;
    }


    /**
     * Loop through the array and feed it to DBUtil::insertObject()
     *
     * @param objects       The objectArray we wish to insert
     * @param tablename     The tablename key for the PNTables structure
     * @param force         Wether or not to insert empty values as NULL
     * @param idcolumn      The column which stores the primary key
     *
     * @return The result set from the last insert operation. The objects are updated with the newly generated ID.
     */
    function insertObjectArray (&$objects, $tablename, $force=false, $idcolumn='id')
    {
        if (!is_array ($objects))
            v4b_exit ('DBUtil::insertObjectArray: objects is not an array ... ');

        $res = false;
        $ak = array_keys ($objects);
        foreach ($ak as $k)
            $res = DBUtil::insertObject ($objects[$k], $tablename, $force, $idcolumn);

        return $res;
    }


    /**
     * Generate and execute an insert SQL statement for the given object
     *
     * @param object        The object we wish to insert
     * @param tablename     The tablename key for the PNTables structure
     * @param force         Wether or not to insert empty values as NULL
     * @param idcolumn      The column which stores the primary key
     *
     * @return The result set from the update operation. The object is updated with the newly generated ID.
     */
    function insertObject (&$object, $tablename, $force=false, $idcolumn='id')
    {
        if (!is_array ($object))
            v4b_exit ('DBUtil::insertObject: object is not an array ... ');

        $dbconn   = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $sql      = "INSERT INTO $pntables[$tablename] (";

        // set standard architecture fields
        ObjectUtil::setStandardFieldsOnObjectCreate ($object, $force);

        // build the column list
        $obj_id = $dbconn->GenID($pntables[$tablename]);
        $column = $pntables["{$tablename}_column"];
        foreach ($column as $key => $val) {
            if ($key == $idcolumn || isset($object[$key])) {
                $sql .= " $column[$key],";
            }
        }

        if (($length = strlen($sql)) > 0) {
            $sql = substr($sql, 0, $length - 1) . ') ';
        }

        $sql .= 'VALUES (';

        // build the value list
        foreach ($column as $key => $val)
        {
            if ($key == $idcolumn && !$force)
            {
                if (DBConnectionStack::getConnectionDBType() == 'postgres')
                    $sql .= 'DEFAULT,';
                else
                    $sql .= "'$obj_id',";
            }
            else
            if ($key == $idcolumn && $force) {
                $sql .= "'$object[$idcolumn]',";
            }
            else
            if (isset($object[$key]) && $key !== $idcolumn) {
                $sql .= ' ' . (isset($object[$key]) ? "'".pnVarPrepForStore($object[$key])."'" : "''") . ',';
            }
        }

        // cleanup sql statement
        if (($length = strlen($sql)) > 0)
            $sql = substr($sql, 0, $length - 1) . ') ';

        $res = DBUtil::executeSQL ($sql);
        if ($res === false)
            return $res;

        $obj_id = $dbconn->PO_Insert_ID($tablename);
        $object[$idcolumn] = $obj_id;

        if (defined('_PNINSTALLVER') || !DBConnectionStack::isDefaultConnection())
            return $object;

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_attribution"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_ATTRIBUTION') &&
            strcmp($tablename, 'v4b_objectdata_attributes') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 )
                ObjectUtil::storeObjectAttributes ($object, $tablename, $idcolumn);

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_meta"]) ) &&
            strcmp($tablename, 'v4b_objectdata_attributes') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_meta') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 )
                ObjectUtil::insertObjectMetaData ($object, $tablename, $idcolumn);

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_logging"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_LOGGING') &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0)
        {
            if (pnModDBInfoLoad('v4bObjectData'))
            {
                $log                = array();
                $log['object_type'] = $tablename;
                $log['object_id']   = $object[$idcolumn];
                $log['op']          = 'I';
                $log['diff']        = serialize($object);

                DBUtil::insertObject ($log, 'v4b_objectdata_log', false, false);
            }
        }

        return $res;
    }


    /**
     * Generate and execute an update SQL statement for the given object
     *
     * @param object        The object we wish to update
     * @param tablename     The tablename key for the PNTables structure
     * @param where         The where clause (optional)
     * @param force         Wether or not to insert empty values as NULL
     * @param idcolumn      The column which stores the primary key
     *
     * @return The result set from the update operation
     */
    function updateObject (&$object, $tablename, $where='', $force=false, $idcolumn='id')
    {
        if (!is_array ($object))
            v4b_exit ('DBUtil::updateObject: object is not an array ... ');

        if (!isset($object[$idcolumn]) && !$where)
            v4b_exit ('DBUtil::updateObject: no object ID and no where ... ');

        $pntables = pnDBGetTables();
        $sql      = "UPDATE $pntables[$tablename] SET ";

        // set standard architecture fields
        ObjectUtil::setStandardFieldsOnObjectUpdate ($object, $force);

        // grab each key and value and append to the sql string
        $column = $pntables["{$tablename}_column"];
        foreach ($column as $key => $val)
        {
            if ($key != $idcolumn)
                if ($force || isset($object[$key]))
                {
                    $sql .= ' ' . $val;
                    $sql .= '=' . (isset($object[$key]) ? "'".pnVarPrepForStore($object[$key])."'" : 'NULL') . ',';
                }
        }

        if (!$where)
            $where = " WHERE $column[$idcolumn]='" . pnVarPrepForStore($object[$idcolumn]) . "'";
        else
            DBUtil::checkWhereClause ($where);

        // cleanup sql statement
        if (($length = strlen($sql)) > 0)
            $sql = substr($sql, 0, $length - 1) . " $where";

        $res = DBUtil::executeSQL ($sql);
        if ($res === false)
            return $res;

        if (defined('_PNINSTALLVER') || !DBConnectionStack::isDefaultConnection())
            return $object;

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_attribution"]) ) &&
            strcmp($tablename, 'v4b_objectdata_attributes') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 )
                ObjectUtil::storeObjectAttributes ($object, $tablename, $idcolumn);

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_meta"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_META') &&
            strcmp($tablename, 'v4b_objectdata_attributes') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_meta') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 )
                ObjectUtil::updateObjectMetaData ($object, $tablename, $idcolumn);

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_logging"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_LOGGING') &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 && !$where)
        {
            if (pnModDBInfoLoad('v4bObjectData'))
            {
                $oldObj = selectObjectByID ($tablename, $object[$idcolumn]);
                require_once ('includes/v4blib/ArrayUtil.class.php');

                $log                = array();
                $log['object_type'] = $tablename;
                $log['object_id']   = $object[$idcolumn];
                $log['op']          = 'U';
                $log['diff']        = ObjectUtil::diffExtended ($oldObj, $object, $idcolumn);

                DBUtil::insertObject ($log, 'v4b_objectdata_log', false, false);
            }
        }

        return $res;
    }


    /**
     * Loop through the array and feed it to DBUtil::insertObject()
     *
     * @param objects       The objectArray we wish to insert
     * @param tablename     The tablename key for the PNTables structure
     * @param force         Wether or not to insert empty values as NULL
     * @param idcolumn      The column which stores the primary key
     *
     * @return The result set from the last insert operation. The objects are updated with the newly generated ID.
     */
    function updateObjectArray (&$objects, $tablename, $force=false, $idcolumn='id')
    {
        if (!is_array ($objects))
            v4b_exit ("DBUtil::updateObjectArray: objects is not an array ... ");

        $ak = array_keys ($objects);
        foreach ($ak as $k=>$v)
            $res = DBUtil::updateObject ($objects[$k], $tablename, '', $force, $idcolumn);

        return $res;
    }


    /**
     * Delete (an) object(s) via a where clause
     *
     * @param tablename    The tablename key for the PNTables structure
     * @param where        The where-clause to use
     *
     * @return The result from the delete operation
     */
    function deleteWhere ($tablename, $where)
    {
        if (!$where)
          v4b_exit ("DBUtil::deleteWhere: empty where clause passed ... ");

        $object = array();
        return DBUtil::deleteObject ($object, $tablename, $where);
    }


    /**
     * Delete an object by its ID.
     *
     * @param tablename   The tablename key for the PNTables structure
     * @param id          The ID of the object to delete
     * @param idcolumn    The column which contains the ID field (optional) (default='id')
     *
     * @return The result from the delete operation
     */
    function deleteObjectByID ($tablename, $id, $idcolumn='id')
    {
        $object = array();
        $object[$idcolumn] = $id;
        return DBUtil::deleteObject ($object, $tablename, '', $idcolumn);
    }


    /**
     * Generate and execute a delete SQL statement for the given object
     *
     * @param object       The object we wish to update
     * @param tablename    The tablename key for the PNTables structure
     * @param where        The where clause to use (optional) (default='')
     * @param idcolumn     The column which contains the ID field (optional) (default='id')
     *
     * @return The result from the delete operation
     */
    function deleteObject ($object, $tablename, $where='', $idcolumn='id')
    {
        if (!is_array ($object))
          v4b_exit ("DBUtil::deleteObject: object is not an array ... ");

        if ($object && $where)
          v4b_exit ("DBUtil::deleteObject: can't specify both object and where-clause ... ");

        $pntables = pnDBGetTables();
        $column   = $pntables["{$tablename}_column"];
        $tab      = $pntables[$tablename];

        $sql = "DELETE FROM $tab ";
        if (!$where)
        {
            if (!$object[$idcolumn])
                v4b_exit ("DBUtil::deleteObject: object does not have an ID ... ");

            $sql .= "WHERE $column[$idcolumn]='$object[$idcolumn]'";
        }
        else
        {
            DBUtil::checkWhereClause ($where);
            $sql .= $where;
            $object['__fake_field__'] = 'Fake entry to mark deleteWhere() return as valid object';
        }

        $res = DBUtil::executeSQL ($sql);
        if ($res === false)
            return $res;

        // Attribution and logging only make sense if we do object-based deletion.
        // If we come from deleteWhere, we simply don't do any of this as in that
        // case we don't know the object ID to map attributes to.
        // TODO: there should be a dangling attribute cleanup function somewhere.
        if (defined('_PNINSTALLVER') || !DBConnectionStack::isDefaultConnection() || $where)
            return $object;

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_attribution"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_ATTRIBUTION') &&
            strcmp($tablename, 'v4b_objectdata_attributes') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 )
                ObjectUtil::deleteObjectAttributes ($object, $tablename);

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_meta"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_META') &&
            strcmp($tablename, 'v4b_objectdata_attributes') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_meta') !== 0 &&
            strcmp($tablename, 'v4b_objectdata_log') !== 0 )
                ObjectUtil::deleteObjectMetaData ($object, $tablename, $idcolumn);

        if ( ( isset($pntables["{$tablename}_db_extra_enable_all"]) || 
              isset($pntables["{$tablename}_db_extra_enable_logging"]) ) &&
            pnConfigGetVar('PN_CONFIG_USE_OBJECT_LOGGING') &&
            strcmp ($tablename, 'v4b_objectdata_log') !== 0)
        {
            if (pnModDBInfoLoad('v4bObjectData'))
            {
                $log                = array();
                $log['object_type'] = $tablename;
                $log['object_id']   = $object[$idcolumn];
                $log['op']          = 'D';
                $log['diff']        = serialize($object);

                DBUtil::insertObject ($log, 'v4b_objectdata_log', false, false);
            }
        }

        return $res;
    }


    /*
     * generate and execute a delete SQL statement
     */
    function deleteObjectsFromKeyArray ($keyarray, $tablename, $field='id')
    {
        if (!is_array ($keyarray))
            v4b_exit ('DBUtil::deleteObjectsFromKeyArray: keyarray is not an array ... ');

        $pntables = pnDBGetTables();
        $column   = $pntables["{$tablename}_column"];
        $tab      = $pntables[$tablename];
        $sql      = "DELETE FROM $tab WHERE $column[$field] IN (";

        foreach ($keyarray as $key => $val)
            $sql .= " $key,";

        if (($length = strlen($sql)) > 0)
            $sql = substr($sql, 0, $length - 1) . ') ';

        return $res = DBUtil::executeSQL ($sql);
    }


    /*
     * returns the last inserted ID
     */
    function getInsertID ($tablename, $field='id', $exitOnError=true, $verbose=true)
    {
        $dbconn   = DBConnectionStack::getConnection();
        $pntables = pnDBGetTables();
        $table    = $pntables[$tablename];
        $column   = $pntables["{$tablename}_column"];

        if (!$resultID = $dbconn->PO_Insert_ID($table, $column[$field]))
        {
            if ($verbose)
                print '<br />' . $dbconn->ErrorMsg() . '<br />';

            if ($exitOnError)
                v4b_exit('Exiting after SQL-error');
        }

        return $resultID;
    }

    /**
     * create a database table using ADODB dictionary method
     *
     * @author Drak
     * @param  tablename The tablename key for the PNTables structure
     * @param  sql ADODB dictionary representation of table
     * @return bool
     */
    function createTable($tablename, $sql)
    {
        if (empty ($tablename))
            v4b_exit ('DBUtil::createTable: table must specify table name to create... ');

        if (empty ($sql))
            v4b_exit ('DBUtil::createTable: sql must specify ADODB dictionary represenation of table to create... ');

        $dbconn   = DBConnectionStack::getConnection();
        $pntable  = pnDBGetTables();
        $dict     = NewDataDictionary($dbconn);
        $tabopt   = pnDBGetTableOptions();
        $table    = $pntable[$tablename];
        $sqlarray = $dict->CreateTableSQL($table, $sql, $tabopt);
        $result   = $dict->ExecuteSQLArray($sqlarray);

        if ($result != 2)
	  exit ('<br />' . prayer($sqlarray) . '<br />' . $dbconn->ErrorMsg() . '<br />' . $sql . '<br />');

        return ($result==2);
    }


    /**
     * change database table using ADODB dictionary method
     *
     * @author Drak
     * @param  tablename The tablename key for the PNTables structure
     * @param  sql ADODB dictionary representation of table
     * @return bool
     */
    function changeTable($tablename, $sql)
    {
        if (empty ($tablename))
            v4b_exit ('DBUtil::changeTable: table must specify table name to change... ');

        if (empty ($sql))
            v4b_exit ('DBUtil::changeTable: sql must specify ADODB dictionary representation of table to change... ');

        $dbconn   = DBConnectionStack::getConnection();
        $pntable  = pnDBGetTables();
        $dict     = NewDataDictionary($dbconn);
        $table    = $pntable[$tablename];
        $sqlarray = $dict->ChangeTableSQL($table, $sql);
        $result   = $dict->ExecuteSQLArray($sqlarray);

        return ($result==2);
    }

    /**
     * truncate database table
     *
     * @param  tablename The tablename key for the PNTables structure
     * @return bool
     */
    function truncateTable($tablename)
    {
        if (empty ($tablename))
            pn_exit ('DBUtil::truncateTable: table must specify table name to truncate ... ');

        $pntables = pnDBGetTables();
        $sql = "TRUNCATE TABLE $pntables[$tablename]";
        return DBUtil::executeSQL ($sql);
    }


    /**
     * delete database table
     *
     * @param  tablename The tablename key for the PNTables structure
     * @return bool
     */
    function dropTable($tablename)
    {
        if (empty ($tablename))
            v4b_exit ('DBUtil::dropTable: table must specify table name to delete... ');

        $dbconn   = DBConnectionStack::getConnection();
        $pntable  = pnDBGetTables();
        $dict     = NewDataDictionary($dbconn);
        $table    = $pntable[$tablename];
        $sqlarray = $dict->DropTableSQL($table);
        $result   = $dict->ExecuteSQLArray($sqlarray);

        return ($result==2);
    }


    /**
     * create index on table
     *
     * @author Drak
     * @param  idxname
     * @param  tablename The tablename key for the PNTables structure
     * @param  flds string field name, or non-associative array of field names
     * @param  idxoptarray
     * return  bool
     */
    function createIndex($idxname, $tablename, $flds, $idxoptarray=false)
    {
        if (empty ($idxname))
            v4b_exit ('DBUtil::createIndex: idxname must specify index name... ');

        if (empty ($tablename))
            v4b_exit ('DBUtil::createIndex: table must specify table name... ');

        if (empty ($flds))
            v4b_exit ('DBUtil::createIndex: flds must specify index field or fields as non-associative array... ');

        if (!empty($idxoptarray) && !is_array($idxoptarray))
            v4b_exit ('DBUtil::createIndex: idxoptarray must be an array ... ');

        $dbconn  = DBConnectionStack::getConnection();
        $pntable = pnDBGetTables();
        $dict    = NewDataDictionary($dbconn);
        $table   = $pntable[$tablename];
        $column  = $pntable["{$tablename}_column"];

        if(!is_array($flds)) {
            $flds = $column[$flds];
        }else{
            $newflds = array();
            foreach($flds as $fld) {
                $newflds[] = $column[$fld];
            }
            $flds = $newflds;
        }

        $sqlarray = $dict->CreateIndexSQL($idxname, $table, $flds, $idxoptarray);
        $result   = $dict->ExecuteSQLArray($sqlarray);

        return ($result==2);
    }


    /**
     * drop index on table
     *
     * @author Drak
     * @param  idxname index name
     * @param  tablename The tablename key for the PNTables structure
     * return  bool
     */
    function dropIndex($idxname, $tablename)
    {
        if (empty ($idxname))
            v4b_exit ('DBUtil::dropIndex: idxname must specify index name... ');

        if (empty ($tablename))
            v4b_exit ('DBUtil::dropIndex: tablename must specify index name... ');

        $dbconn   = DBConnectionStack::getConnection();
        $pntable  = pnDBGetTables();
        $dict     = NewDataDictionary($dbconn);
        $table    = $pntable[$tablename];
        $sqlarray = $dict->DropIndexSQL ($idxname, $table);
        $result   = $dict->ExecuteSQLArray($sqlarray);

        return ($result==2);
    }


    /**
     * get a list of databases available on the server
     *
     * @author Mark West
     * return  array of databases
     */
    function metaDatabases()
    {
        $dbconn = DBConnectionStack::getConnection();
        return $dbconn->MetaDatabases();
    }


    /**
     * get a list of tables in the currently connected database
     *
     * @author Mark West
     * @param  ttype type of 'tables' to get
     * @param  showSchema add the schema name to the table
     * @param  mask mask to apply to return result set
     * return  array of tables
     */
    function metaTables($ttype=false, $showSchema=false, $mask=false)
    {
        $dbconn = DBConnectionStack::getConnection();
        return $dbconn->MetaTables($ttype, $showSchema, $mask);
    }


    /**
     * get a list of columns in a table
     *
     * @author Mark West
     * @param  tablename The tablename key for the PNTables structure
     * @param  notcasesensitive normalize case of table name
     * return  array of column objects
     */
    function metaColumns($tablename, $notcasesensitive=true)
    {
        if (empty ($tablename))
            v4b_exit ('DBUtil::metaColumns: tablename must specify table name... ');

        $dbconn  = DBConnectionStack::getConnection();
        $pntable = pnDBGetTables();
        return $dbconn->MetaColumns($pntable[$tablename], $notcasesensitive);
    }


    /**
     * get a list of column names in a table
     *
     * @author Mark West
     * @param  tablename The tablename key for the PNTables structure
     * @param  numericIndex use numeric keys
     * return  array of column names
     */
    function metaColumnNames($tablename, $numericIndex=false)
    {
        if (empty ($tablename))
            v4b_exit ('DBUtil::metaColumnNames: tablename must specify table name... ');

        $dbconn   = DBConnectionStack::getConnection();
        $pntable  = pnDBGetTables();
        return $dbconn->MetaColumnNames($pntable[$tablename], $numericIndex);
    }


    /**
     * get a list of primary keys for a table
     *
     * @author Mark West
     * @param  tablename The tablename key for the PNTables structure
     * @param  owner
     * @todo   work out what owner param actually does
     * return  array of column names
     */
    function metaPrimaryKeys($tablename, $owner=false)
    {
        if (empty ($tablename))
            v4b_exit ('DBUtil::metaPrimaryKeys: tablename must specify table name... ');

        $dbconn   = DBConnectionStack::getConnection();
        $pntable  = pnDBGetTables();
        return $dbconn->MetaPrimaryKeys($pntable[$tablename], $owner);
    }


    /**
     * get a list of foreign keys for a table
     *
     * @author Mark West
     * @param  tablename The tablename key for the PNTables structure
     * @param  owner
     * @param  upper upper case key names
     * @todo   work out what owner param actually does
     * return  array of column names
     */
    function metaForeignKeys($tablename, $owner=false, $upper=false)
    {
        if (empty ($tablename))
            v4b_exit ('DBUtil::metaForeignKeys: tablename must specify table name... ');

        $dbconn   = DBConnectionStack::getConnection();
        $pntable  = pnDBGetTables();
        return $dbconn->MetaForeignKeys($pntable[$tablename], $owner, $upper);
    }


    /**
     * get a list of indexes for a table
     *
     * @author Mark West
     * @param table table name
     * @param primary show only primary keys
     * @param owner
     * @todo work out what owner param actually does
     * return array of column names
     */
    function metaIndexes($tablename, $primary=false, $owner=false)
    {
        if (empty ($tablename))
            v4b_exit ('DBUtil::metaForeignKeys: table must specify table name... ');

        $dbconn   = DBConnectionStack::getConnection();
        $pntable  = pnDBGetTables();
        return $dbconn->MetaIndexes($pntable[$tablename], $primary, $owner);
    }


    /**
     * return server information
     *
     * @author Mark West
     * return array of server info
     */
    function serverInfo()
    {
        $dbconn = DBConnectionStack::getConnection();
        return $dbconn->ServerInfo();
    }


    /**
     * create database
     *
     * @author Drak
     * @param  dbname the database name
     * @param  optionsarray the options array
     * @return bool
     */
    function createDatabase($dbname, $optionsarray=false)
    {
        if (empty($dbname)) 
            pn_exit('DBUtil::createDatabase: must specify a database name');

        $dbconn = DBConnectionStack::getConnection();
        $dict = NewDataDictionary($dbconn);
        $sql  = $dict->CreateDatabase($dbname, $optionsarray);
        return $dict->ExecuteSQLArray($sql);
    }
}
?>