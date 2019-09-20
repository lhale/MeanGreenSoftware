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
 *  Purpose of file: domain utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


define ('DOMAIN_NAME_CACHE', 'DomainNameToId');
define ('DOMAIN_VALUES_CACHE', 'DomainValuesByDomainId');


class DomainUtil
{
    /*
     * Note: The domain tables are maintained by the v4bEdm module!
     */
    function domainUtil_getDomainValue ($dvid, $decode=true)
    {
        if (!is_numeric($dvid))
          v4b_exit ('Invalid dvid (non-numeric) passed to DomainUtil::getDomainValue ...');

        pnModDBInfoLoad ('v4bEdm', 'v4bEdm');

        $pntables       = pnDBGetTables();
        $domval_table   = $pntables['v4b_edm_domain_value'];
        $domval_column  = $pntables['v4b_edm_domain_value_column'];

        $where = "$domval_column[id] = $dvid";

        $domValue = DBUtil::selectObject ('v4b_edm_domain_value', $where);

        if ($decode)
        $domValue ['display'] = unserialize(base64_decode ($domValue['display_serialized']));

        return $domValue;
    }


    /**
     * Retrieve the values for a particular domain
     *
     * @param name         The domain id for which we want the values
     * @param extraWhere    An extra where-clause to use
     * @param decode    Wether or not to decode the encoded ML values
     *
     * @return         The value object array or false
     */
    function domainUtil_getDomainValuesForDomainByName ($name, $extraWhere='', $decode=true)
    {
        pnModDBInfoLoad ('v4bEdm', 'v4bEdm');

        $domID = domainUtil_getDomainIdByName ($name);
        $domValues = domainUtil_getDomainValuesForDomain ($domID, $extraWhere, $decode);

        return $domValues;
    }


    /**
     * Retrieve the values for a particular domain
     *
     * @param id         The domain id for which we want the values
     * @param extraWhere    An extra where-clause to use
     * @param decode    Wether or not to decode the encoded ML values
     *
     * @return         The value object array or false
     */
    function domainUtil_getDomainValuesForDomain($id, $extraWhere='', $decode=true)
    {
        if (!is_numeric($id))
          v4b_exit ('Invalid id (non-numeric) passed to DomainUtil::getValuesForDomain ...');

        pnModDBInfoLoad ('v4bEdm', 'v4bEdm');

        $pntables       = pnDBGetTables();
        $domval_table   = $pntables['v4b_edm_domain_value'];
        $domval_column  = $pntables['v4b_edm_domain_value_column'];

        $where = "WHERE $domval_column[domain_id] = $id";
        $sort  = "ORDER BY $domval_column[sort_value]";

        if ($extraWhere)
          $where .= " AND $extraWhere";

        $domainValues = DBUtil::selectObjectArray ('v4b_edm_domain_value', $where, $sort, -1, -1, 'db_value');

        if ($decode)
          {
          foreach ($domainValues as $k => $v)
            {
            $domValue = $domainValues[$k];
            $domValue['display'] = unserialize(base64_decode ($domValue['display_serialized']));
            }
          }

        return $domainValues;
    }


    /**
     * Retrieve the domain record for the given ID
     *
     * @param id        The domain id for which we want to retrieve
     *
     * @return         The domain ID or false
     */
    function domainUtil_getDomainById ($id)
    {
        if (!is_numeric($id))
          v4b_exit ('Invalid id (non-numeric) passed to DomainUtil::getDomainById ...');

        if (!$id)
          v4b_exit ('Invalid domainname passed to DomainUtil::getDomainById ...');

        pnModDBInfoLoad ('v4bEdm', 'v4bEdm');

        $dom_table   = $pntables['v4b_edm_domain'];
        $dom_column  = $pntables['v4b_edm_domain_column'];

        $domain = DBUtil::selectObjectById ('v4b_edm_domain', $id);

        return $domain;
    }


    /**
     * Resolve Display value of a domain and give value id back
     *
     * @param domainname            The name of the Domain
     * @param text                  The Displayvalue to resolve
     *
     * @return id                   The valueid of the Displayvalue or NULL
    **/
    function domainUtil_getValueIDfromDisplayValue($domainname, $text)
    {
            $domainid = domainUtil_getDomainIdByName($domainname);
            $data = HtmlUtil::getSelectorData_DomainValues($domainid, '', '');
            $id = NULL;
            foreach($data as $d)
            {
                    if(trim($d['name'])==trim($text))
                    {
                            $id = $d['id'];
                    }
            }
            return $id;
    }



    /**
     * Retrieve the domain ID for the given domain name
     *
     * @param domainname     The domain name for which we want the ID
     *
     * @return         The domain ID or false
     */
    function domainUtil_getDomainIdByName ($domainname)
    {
        if (!$domainname)
          v4b_exit ('Invalid domainname passed to DomainUtil::getDomainIdByName ...');

        pnModDBInfoLoad ('v4bEdm', 'v4bEdm');

        $pntables     = pnDBGetTables();
        $dom_table   = $pntables['v4b_edm_domain'];
        $dom_column  = $pntables['v4b_edm_domain_column'];

        $where = "$dom_column[name] = '$domainname'";
        $domain = DBUtil::selectObject ('v4b_edm_domain', $where);
        $domId = $domain['id'];

        return $domId;
    }


    /**
     * Store the domains and its values.
     *
     * @param domain        The domain-object we wish to update
     * @param domainValues  The domainValues which go with this domain
     */
    function updateDomainDefinition ($domain, $domainValues)
    {
        if (!$domain)
          v4b_exit ('Invalid domain passed to DomainUtil::updateDomainDefinition ...');

        pnModDBInfoLoad ('v4bEdm', 'v4bEdm');

        $dom_id = $domain['id'];
        if ($dom_id)
          DBUtil::updateObject ($domain, 'v4b_edm_domain');
        else
          DBUtil::insertObject ($domain, 'v4b_edm_domain');

        return true;
    }


    /**
     * Store the domains value for the given objects.
     *
     * @param domainValue    The domainValue to update
     */
    function updateDomainValue ($domainValue)
    {
        if (!$domainValue)
          v4b_exit ('Invalid domainValue passed to DomainUtil::updateDomainValue ...');

        if (!$domainValue['domain_id'])
          v4b_exit ('Invalid domainValue[domain_id] passed to DomainUtil::updateDomainValue ...');

        pnModDBInfoLoad ('v4bEdm', 'v4bEdm');

        $domainValue['display_serialized'] = base64_encode (serialize ($domainValue['display']));

        if ($domainValue['id'])
          DBUtil::updateObject ($domainValue, 'v4b_edm_domain_value');
        else
          DBUtil::insertObject ($domainValue, 'v4b_edm_domain_value');
    }


    /**
     * Retrieve a list of domains defined in the system
     *
     * @param where     The where-clause to use
     * @param sort      The order-by-clause to use
     * @param doStats    Wether or not to assemble usage statistics
     */
    function getSystemDomains ($where='', $sort='name', $doStats=true)
    {
        pnModDBInfoLoad ('v4bEdm', 'v4bEdm');

        $pntables      = pnDBGetTables();
        $dom_table     = $pntables['v4b_edm_domain'];
        $dom_column    = $pntables['v4b_edm_domain_column'];

        $domains = DBUtil::selectObjectArray ('v4b_edm_domain', $where, $dom_column[$sort]);

        // for each domain get the
        if ($doStats)
          {
          $domval_table  = $pntables['v4b_edm_domain_value'];
          $domval_column = $pntables['v4b_edm_domain_value_column'];

          $size = count($domains);
          for ($i=0; $i<$size; $i++)
            {
            $dom = $domains[$i];
              {
              $where = "WHERE $domval_column[domain_id] = $dom[id]";
              $count = DBUtil::selectObjectCount ('v4b_edm_domain_value', $where);

          if ($count)
            $dom['count'] = $count;
              }
            }
          }

        return $domains;
    }


    /**
     * Delete a domain
     *
     * @param domain    The domain object to delete
     * @param cascade       Wether or not to also delete the domain values
     */
    function deleteDomain ($domain, $cascade=true)
    {
        pnModDBInfoLoad ('v4bEdm', 'v4bEdm');

        DBUtil::deleteObject ($domain, 'v4b_edm_domain', false);

        if ($cascade)
          {
          $pntables      = pnDBGetTables();
          $domval_table  = $pntables['v4b_edm_domain_value'];
          $domval_column = $pntables['v4b_edm_domain_value_column'];

          $sql = "DELETE FROM $domval_table WHERE $domval_column[domain_id] = $domain[id]";
          DBUtil::executeSQL ($sql, $false, true);
          }
    }


    /**
     * Delete a domain value
     *
     * @param domainvalue    The domainvalue object to delete
     */
    function deleteDomainValue ($domainvalue)
    {
        pnModDBInfoLoad ('v4bEdm', 'v4bEdm');

        DBUtil::deleteObject ($domainvalue, 'v4b_edm_domain_value', false);
    }

}
?>