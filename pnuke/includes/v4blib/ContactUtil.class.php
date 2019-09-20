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
 *  Purpose of file: contact utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class ContactUtil
{
    /**
     * Return a company by it's ID
     *
     * @return The resulting company object
     */
    function getCompanyByID ($id)
    {
        return DBUtil::selectObjectByID ('pnaddressbook_company', $id);
    }


    /**
     * Return a field list of companies
     *
     * @return The resulting field list
     */
    function getCompanies ()
    {
        pnModDBInfoLoad ('pnAddressBook');

        $sort = "ORDER BY name";
        return DBUtil::selectObjectArray ('pnaddressbook_company', '', $sort, -1, -1, 'id');
    }


    /**
     * Return an array of categories objects according the specified where-clause and sort criteria.
     *
     * @param cid        The company-id for which we want branches
     *
     * @return The resulting field list
     */
    function getCompanyBranches ($cid)
    {
        pnModDBInfoLoad ('pnAddressBook');

        $cid   = (int)$cid;
        $where = "brc_cmp_id=$cid";
        $sort  = "ORDER BY name";

        return DBUtil::selectObjectArray ('pnaddressbook_branch', $where, $sort, -1, -1, 'id');
    }


    /**
     * Return an array of categories objects according the specified where-clause and sort criteria.
     *
     * @param cid        The company-id for which we want contacts
     * @param bid        The branch-id for which we want contacts
     *
     * @return The resulting object list
     */
    function getContacts ($cid, $bid=0)
    {
        pnModDBInfoLoad ('pnAddressBook');

        $pntable = pnDBGetTables();
        $table   = $pntable['pnaddressbook_address'];
        $column  = $pntable['pnaddressbook_branch_column'];

        $cid   = (int)$cid;
        $bid   = (int)$bid;

        $where   = '';
        if ($cid)
          $where = "adr_cmp_id=$cid ";

        if ($bid)
          if ($where)
            $where .= "AND adr_brc_id=$bid";
          else
            $where .= "adr_cmp=$cid";

        return DBUtil::selectObjectArray ('pnaddressbook_address', $where, 'adr_name');
    }

}
?>