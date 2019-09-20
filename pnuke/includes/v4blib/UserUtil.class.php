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
 *  Purpose of file: user utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class UserUtil
{
    /**
     * Return a user object
     *
     * @param uid         The userID of the user to retrieve
     * @param getVars       Wether or not to also get the user-variables (not implemented yet)
     *
     * @return The resulting user object
     */
    function getPNUser ($uid, $getVars=false)
    {
        $user = DBUtil::selectObjectByID ('users', $uid, 'uid');

        if ($getVars)
        {
            $dud = UserUtil::getUserDynamicDataFields ($data['user_record'], 'uda_propid');
        $user['DUD'] = $dud;
        }

        return $user;
    }


    /**
     * Return a field from a user object
     *
     * @param id         The userID of the user to retrieve
     * @param field        The field from the user object to get
     *
     * @return The requested field
     */
    function getPNUserField ($id, $field)
    {
        $user = UserUtil::getPNUser ($id);
        return $user[$field];
    }


    /**
     * Return a hash structure mapping uid to username
     *
     * @param where     The where clause to use (optional)
     * @param orderBy     The order by clause to use (optional)
     * @param limitOffset    The select-limit offset (optional) (default=-1)
     * @param limitNumRows    The number of rows to fetch (optional) (default=-1)
     * @param assocKey    The associative key to apply (optional) (default='gid')
     *
     * @return An array mapping uid to username
     */
    function getPNUsers ($where='', $orderBy='', $limitOffset=-1, $limitNumRows=-1, $assocKey='uid')
    {
        return DBUtil::selectObjectArray ('users', $where, $orderby, $limitOffset, $limitNumRows, $assocKey);
    }


    /**
     * Return a group object
     *
     * @param gid         The groupID to retrieve
     *
     * @return The resulting group object
     */
    function getPNGroup ($gid)
    {
        return DBUtil::selectObjectByID ('groups', $gid, 'gid');
    }


    /**
     * Return a hash structure mapping gid to groupname
     *
     * @param where     The where clause to use (optional) (default='')
     * @param orderBy     The order by clause to use (optional) (default='')
     * @param limitOffset    The select-limit offset (optional) (default=-1)
     * @param limitNumRows    The number of rows to fetch (optional) (default=-1)
     * @param assocKey    The associative key to apply (optional) (default='gid')
     *
     * @return An array mapping gid to groupname
     */
    function getPNGroups ($where='', $orderBy='', $limitOffset=-1, $limitNumRows=-1, $assocKey='gid')
    {
        return DBUtil::selectObjectArray ('groups', $where, $orderby, $limitOffset, $limitNumRows, $assocKey);
    }


    /**
     * Return a (string) list of user-ids which can then be used in a SQL 'IN (...)' clause
     *
     * @param where     The where clause to use (optional)
     * @param orderBy     The order by clause to use (optional)
     * @param separator     The field separator to use (default=",") (optional)
     *
     * @return A string list of user ids
     */
    function getPNUserIdList ($where='', $orderBy='', $separator=',')
    {
        $userdata = UserUtil::getPNUsers ($where, $orderBy);

        $keys = array_keys ($userdata);
        $size = sizeof ($keys);
        $list = '';

        if ($size == 0)
          return '-1';

        for ($i=0; $i<$size; $i++)
            $list .= $keys[$i] . $separator;

        if (($length = strlen($list)) > 0)
            $list= substr($list, 0, $length - 1);

        return $list;
    }


    /**
     * Return a (string) list of group-ids which can then be used in a SQL 'IN (...)' clause
     *
     * @param where     The where clause to use (optional)
     * @param orderBy     The order by clause to use (optional)
     * @param separator     The field separator to use (default=",") (optional)
     *
     * @return A string list of group ids
     */
    function getPNGroupIdList ($where='', $orderBy='', $separator=',')
    {
        $groupdata = UserUtil::getPNGroups ($where, $orderBy);

        $keys = array_keys ($groupdata);
        $numkeys = sizeof ($keys);
        $list = '';

        for ($i=0; $i<$numkeys; $i++)
            $list .= $keys[$i] . $separator;

        if (($length = strlen($list)) > 0)
            $list= substr($list, 0, $length - 1);

        return $list;
    }


    /**
     * Return an array group-ids for the specified user
     *
     * @param uid         The user ID for which we want the groups
     *
     * @return An array of group IDs
     */
    function getGroupsForUser ($uid)
    {
        if (empty($uid))
          return array();

        $where = '';
        if ($uid != -1)
            $where = "WHERE pn_uid = $uid";

        $groups = DBUtil::selectFieldArray ('group_membership', 'gid', $where);
        return $groups;
    }


    /**
     * Return a string list of group-ids for the specified user
     *
     * @param uid         The user ID for which we want the groups
     * @param separator     The field separator to use (default=",") (optional)
     *
     * @return A string list of group ids
     */
    function getGroupListForUser ($uid=0, $separator=",")
    {
        if (!$uid)
            $uid = pnUserGetVar('uid');

        $gidArray = UserUtil::getGroupsForUser ($uid);
        $size = count ($gidArray);
        $gidlist = '';

        if ($size == 0)
            return "-1";

        for ($i=0; $i<$size; $i++)
            $gidlist .= $gidArray[$i] . $separator;

        if (($length = strlen($gidlist)) > 0)
            $gidlist = substr($gidlist, 0, $length - 1);

        return $gidlist;
    }


    /**
     * Return a string list of user-ids for the specified group
     *
     * @param gid         The group ID for which we want the users
     * @param separator     The field separator to use (default=",") (optional)
     *
     * @return an array of user IDs
     */
    function getUsersForGroup ($gid, $separator=",")
    {
        if (!$gid)
          return array ();

        $where = "WHERE pn_gid = $gid";
        $users = DBUtil::selectFieldArray ('group_membership', 'uid', $where);
        return $users;
    }


    /**
     * Return the defined dynamic user data fields
     *
     * @return an array of dynamic data field definitions
     */
    function getDynamicDataFields ()
    {
        $dudfields = DBUtil::selectObjectArray ('user_property');
        return $dudfields;
    }


    /**
     * Return a string list of user-ids for the specified group
     *
     * @param uid         The user ID for which we want the users
     * @param assocKey    The associate Key to use
     * @param standardFields Wether or not to also marshall the standard user properties into the DUD array
     *
     * @return an array of user IDs
     */
    function getUserDynamicDataFields ($uid, $assocKey='uda_propid', $standardFields=false)
    {
        if (!$uid)
        {
            $array = array();
            return $array;
        }

        $where = "WHERE pn_uda_uid = $uid";
        $dud   = DBUtil::selectObjectArray ('user_data', $where, '', -1, -1, $assocKey);

        if ($standardFields)
        {
            $user = UserUtil::getPNUser ($uid, false);
        foreach ($user as $k=>$v)
            if (strpos($k, 'user_')===0)
                    $dud[$k] = $user[$k];
        }

        return $dud;
    }


    /**
     * Return a PN array structure for the PN user group selector
     *
     * @param defaultValue     The default value of the selector (default=0) (optional)
     * @param defaultText    The text of the default value (optional)
     * @param ignore    An array of keys to ignore (optional)
     * @param includeAll    Wether to include an "All" choice (optional)
     * @param allText    The text to display for the "All" choice (optional)
     *
     * @return The PN array structure for the user group selector
     */
    function getSelectorData_PNGroup ($defaultValue=0, $defaultText='', $ignore=array(), 
                                      $includeAll=0, $allText='')
    {
        $dropdown = array ();
    
        if ($defaultText)
          $dropdown[] = array ('id'=>$defaultValue, 'name'=>$defaultText);
    
        $groupdata =& UserUtil::getPNGroups ('', 'ORDER BY pn_name');

        if (sizeof($groupdata) == 0) { return $dropdown; }
    
        $keys = array_keys ($groupdata);
        $numkeys = sizeof ($keys);
    
        if ($includeAll)
          $dropdown[] = array ('id'=>$includeAll, 'name'=>$allText);
    
        for ($i=0; $i<$numkeys; $i++)
        {
          if (!isset($ignore[$keys[$i]]))
            $dropdown[] = array ('id'=>$keys[$i], 'name'=>$groupdata[$keys[$i]]['name']);
        }
    
        return $dropdown;
    }
    
    
    /**
     * Return a PN array strcuture for the PN user dropdown box 
     *
     * @param defaultValue    The default value of the selector (optional) (default=0)
     * @param defaultText    The text of the default value (optional) (default='')
     * @param ignore    An array of keys to ignore (optional) (default=array())
     * @param includeAll    Wether to include an "All" choice (optional) (default=0)
     * @param allText    The text to display for the "All" choice (optional) (default='')
     * @param exclude       An SQL IN-LIST string to exclude specified uids
     *
     * @return The PN array structure for the user group selector
     */
    function getSelectorData_PNUser ($defaultValue=0, $defaultText='', $ignore=array(), 
                                     $includeAll=0, $allText='', $exclude='')
    {
        $dropdown = array ();
    
        if ($defaultText)
          $dropdown[] = array ('id'=>$defaultValue, 'name'=>$defaultText);
    
        $where = '';
        if ($exclude)
          $where = "WHERE pn_uid NOT IN ($exclude)";
    
        $userdata =& UserUtil::getPNUsers($where, 'ORDER BY pn_uname');
    
        if (sizeof ($userdata) == 0) { return $dropdown; }
    
        $keys = array_keys ($userdata);
        $numkeys = sizeof ($keys);
    
        if ($includeAll)
          $dropdown[] = array ('id'=>$includeAll, 'name'=>$allText);
    
        for ($i=0; $i<$numkeys; $i++)
        {
          if (!isset($ignore[$keys[$i]]))
            $dropdown[] = array ('id'=>$keys[$i], 'name'=>$userdata[$keys[$i]]['name']);
        }
    
        return $dropdown;
    }
}
?>