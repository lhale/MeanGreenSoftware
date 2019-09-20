<?php
// $Id: pntables.php,v 1.29 2006/02/21 16:31:32 staen Exp $
// =======================================================================
// Pagesetter by Jorn Lind-Nielsen (C) 2003.
// ----------------------------------------------------------------------
// For POST-NUKE Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WIthOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// =======================================================================

/**
 * This function is called internally by the core whenever the module is
 * loaded.  It adds in information about the tables that the module uses.
 */
function pagesetter_pntables()
{
  $pntable = array();

    // Publication types table setup

  $tableName = pnConfigGetVar('prefix') . '_pagesetter_pubtypes';

  $pntable['pagesetter_pubtypes'] = $tableName;

  $pntable['pagesetter_pubtypes_column'] = array('id'                 => $tableName . '.pg_id',
                                                 'title'              => $tableName . '.pg_title',
                                                 'filename'           => $tableName . '.pg_filename',
                                                 'formname'           => $tableName . '.pg_formname',
                                                 'description'        => $tableName . '.pg_description',
                                                 'authorID'           => $tableName . '.pg_authorid',
                                                 'created'            => $tableName . '.pg_createddate',
                                                 'listCount'          => $tableName . '.pg_listcount',
                                                 'sortField1'         => $tableName . '.pg_sortfield1',
                                                 'sortDesc1'          => $tableName . '.pg_sortdesc1',
                                                 'sortField2'         => $tableName . '.pg_sortfield2',
                                                 'sortDesc2'          => $tableName . '.pg_sortdesc2',
                                                 'sortField3'         => $tableName . '.pg_sortfield3',
                                                 'sortDesc3'          => $tableName . '.pg_sortdesc3',
                                                 'defaultFilter'      => $tableName . '.pg_defaultFilter',
                                                 'enableHooks'        => $tableName . '.pg_enablehooks',
                                                 'workflow'           => $tableName . '.pg_workflow',
                                                 'enableRevisions'    => $tableName . '.pg_enablerevisions',
                                                 'enableEditOwn'      => $tableName . '.pg_enableeditown',
                                                 'enableTopicAccess'  => $tableName . '.pg_enabletopicaccess',
                                                 'defaultFolder'      => $tableName . '.pg_defaultfolder',
                                                 'defaultSubFolder'   => $tableName . '.pg_defaultsubfolder',
                                                 'defaultFolderTopic' => $tableName . '.pg_defaultfoldertopic');


    // Publication fields table setup

  $tableName = pnConfigGetVar('prefix') . '_pagesetter_pubfields';

  $pntable['pagesetter_pubfields'] = $tableName;

  $pntable['pagesetter_pubfields_column'] = array('id'            => $tableName . '.pg_id',
                                                  'tid'           => $tableName . '.pg_tid',
                                                  'name'          => $tableName . '.pg_name',
                                                  'title'         => $tableName . '.pg_title',
                                                  'description'   => $tableName . '.pg_description',
                                                  'type'          => $tableName . '.pg_type',
                                                  'typeName'      => $tableName . '.pg_typename',
                                                  'typeData'      => $tableName . '.pg_typedata',
                                                  'isTitle'       => $tableName . '.pg_istitle',
                                                  'isPageable'    => $tableName . '.pg_ispageable',
                                                  'isSearchable'  => $tableName . '.pg_issearchable',
                                                  'isMandatory'   => $tableName . '.pg_ismandatory',
                                                  'lineno'        => $tableName . '.pg_lineno');

    // Lists tables setup

  $tableName = pnConfigGetVar('prefix') . '_pagesetter_lists';

  $pntable['pagesetter_lists'] = $tableName;

  $pntable['pagesetter_lists_column'] = array('id'          => $tableName . '.pg_id',
                                              'authorID'    => $tableName . '.pg_authorid',
                                              'created'     => $tableName . '.pg_created',
                                              'title'       => $tableName . '.pg_title',
                                              'description' => $tableName . '.pg_description');


  $tableName = pnConfigGetVar('prefix') . '_pagesetter_listitems';

  $pntable['pagesetter_listitems'] = $tableName;

  $pntable['pagesetter_listitems_column'] = array('id'          => $tableName . '.pg_id',
                                                  'lid'         => $tableName . '.pg_lid',
                                                  'parentID'    => $tableName . '.pg_parentid',
                                                  'title'       => $tableName . '.pg_title',
                                                  'fullTitle'   => $tableName . '.pg_fulltitle',
                                                  'value'       => $tableName . '.pg_value',
                                                  'description' => $tableName . '.pg_description',
                                                  'lineno'      => $tableName . '.pg_lineno',
                                                  'indent'      => $tableName . '.pg_indent',
                                                  'lval'        => $tableName . '.pg_lval',
                                                  'rval'        => $tableName . '.pg_rval');


    // Publication header tables setup

  $tableName = pnConfigGetVar('prefix') . '_pagesetter_pubheader';

  $pntable['pagesetter_pubheader'] = $tableName;

  $pntable['pagesetter_pubheader_column'] = array('tid'         => 'pg_tid', // Key
                                                  'pid'         => 'pg_pid', // Key
                                                  'hitCount'    => 'pg_hitcount',
                                                  'onlineID'    => 'pg_onlineid',
                                                  'deleted'     => 'pg_deleted');


    // Revisions tables setup

  $tableName = pnConfigGetVar('prefix') . '_pagesetter_revisions';

  $pntable['pagesetter_revisions'] = $tableName;

  $pntable['pagesetter_revisions_column'] = array('tid'             => $tableName . '.pg_tid', // Key
                                                  'id'              => $tableName . '.pg_id',  // Key
                                                  'pid'             => $tableName . '.pg_pid',
                                                  'previousVersion' => $tableName . '.pg_prevversion',
                                                  'user'            => $tableName . '.pg_user',
                                                  'timestamp'       => $tableName . '.pg_timestamp');


    // Workflow configuration tables setup

  $tableName = pnConfigGetVar('prefix') . '_pagesetter_wfcfg';

  $pntable['pagesetter_wfcfg'] = $tableName;

  $pntable['pagesetter_wfcfg_column'] = array('workflow'        => $tableName . '.pg_workflow', // Key
                                              'tid'             => $tableName . '.pg_tid',      // Key
                                              'setting'         => $tableName . '.pg_setting',  // Key
                                              'value'           => $tableName . '.pg_value');


    // Counters tables setup

  $tableName = pnConfigGetVar('prefix') . '_pagesetter_counters';

  $pntable['pagesetter_counters'] = $tableName;

  $pntable['pagesetter_counters_column'] = array('name'            => $tableName . '.pg_name', // Key
                                                 'count'           => $tableName . '.pg_count');


    // Guppy session data

  $tableName = pnConfigGetVar('prefix') . '_pagesetter_session';

  $pntable['pagesetter_session'] = $tableName;

  $pntable['pagesetter_session_column'] = array('sessionId' => $tableName . '.pg_sessionid',
                                                'cache'     => $tableName . '.pg_cache',
                                                'lastUsed'  => $tableName . '.pg_lastused');
                                                

    // Relations data
    
  $tableName = pnConfigGetVar('prefix') . '_pagesetter_relations';
  
  $pntable['pagesetter_relations'] = $tableName;
  
  $pntable['pagesetter_relations_column'] = array('tid1'         => 'pg_tid1',
                                                  'pid1'         => 'pg_pid1',
                                                  'fieldId1'     => 'pg_fieldid1',
                                                  'tid2'         => 'pg_tid2',
                                                  'pid2'         => 'pg_pid2',
                                                  'fieldId2'     => 'pg_fieldid2');


    // Publication data (the fixed fields)

  $tableName = pnConfigGetVar('prefix') . '_pagesetter_pubdata'; 

  $pntable['pagesetter_pubdata'] = $tableName; // Unused since we create it dynamically

  $pntable['pagesetter_pubdata_column'] = array('id'                => 'pg_id',  // database ID
                                                'pid'               => 'pg_pid', // publication ID
                                                'approvalState'     => 'pg_approvalState',
                                                'online'            => 'pg_online', // Duplicate/redundant by purpose
                                                'inDepot'           => 'pg_indepot',
                                                'revision'          => 'pg_revision',
                                                'topic'             => 'pg_topic',
                                                'showInMenu'        => 'pg_showInMenu',
                                                'showInList'        => 'pg_showInList',
                                                'author'            => 'pg_author',  // Modifieable author name
                                                'creatorID'         => 'pg_creator', // Non-modifiable author ID
                                                'created'           => 'pg_created',
                                                'hitCount'          => 'pg_hitCount', // Unused, left to enable upgrades
                                                'lastUpdated'       => 'pg_lastUpdatedDate',
                                                'publishDate'       => 'pg_publishDate',
                                                'expireDate'        => 'pg_expireDate',
                                                'language'          => 'pg_language');

  return $pntable;
}

?>