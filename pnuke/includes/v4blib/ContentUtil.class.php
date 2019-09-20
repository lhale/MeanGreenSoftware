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
 *  Purpose of file: content utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


class ContentUtil
{
    // old API
    function getPubTypeByID ($id='', $field='id')
    {
            return DBUtil::selectObjectByID ('pagesetter_pubtypes', $id, $field);
    }


    function getPublicationTypeById ($id='', $field='id')
    {
            return DBUtil::selectObjectByID ('pagesetter_pubtypes', $id, $field);
    }


    function getPublicationTypes ($where='', $orderBy='')
    {
        return DBUtil::selectObjectArray ('pagesetter_pubtypes', $where='', $orderBy='');
    }


    function getPublicationById ($id='', $field='id')
    {
        return DBUtil::selectObjectByID ('pagesetter_pubtypes', $id, $field);
    }


    function getPublications ($tid, $where='', $orderBy='')
    {
        $tkey = 'pagesetter_pubdata' . $tid;
        //if (!$orderBy)
        //$orderBy          = 'ORDER BY ';
        return DBUtil::selectObjectArray ($tkey, $where, $orderBy);
    }


    function getPublicationTitles ($tid, $where='', $orderBy='')
    {
        $tab              =  'pagesetter_pubdata' . $tid;
        $col              =  $tab . '_column';
        $prefix           =  pnConfigGetVar('prefix');
        $pntables         = pnDBGetTables();
        $pntables[$tab]   =  $prefix . '_' . $tab;
        $pntables[$col]   = $pntables['pagesetter_pubdata_column'];

        $fieldID = ContentUtil::getPublicationTitleFieldID ($tid);
        $tkey = 'pagesetter_pubdata' . $tid;
        $field = 'pg_field' . $fieldID;

        $table    = $pntables[$tab];
        $columns  = $pntables[$tab . '_column'];
        $assocKey = 'id';
        $assoc    = ($assocKey ? ", $columns[$assocKey]" : '');
        $sql      = "SELECT $field $assoc FROM $table $where $orderby";
        $res      = DBUtil::executeSQL ($sql);
        $fa       = DBUtil::marshallFieldArray ($res, $field, true, $assocKey);

        return $fa;
    }


    function getPublicationTitleFieldID ($tid)
    {
        $pntables = pnDBGetTables();
        $ckey     = $pntables['pagesetter_pubfields_column'];

        $where = "WHERE $ckey[tid]=$tid AND $ckey[isTitle]=1";
        return DBUtil::selectField ('pagesetter_pubfields', 'id', $where);
    }
}
?>