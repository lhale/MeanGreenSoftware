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
 *  Purpose of file: serice utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


// explicityly map the OWL tables here
global $pntable;
$pntable['mantis_bug_file_table'] = 'os_service_bug_file_table';
$pntable['mantis_bug_file_table_column'] = array(
    'id'    =>    'id',
    'bug_id'    =>    'bug_id',
    'title'    =>    'title',
    'description'    =>    'description',
    'diskfile'    =>    'diskfile',
    'filename'    =>    'filename',
    'folder'    =>    'folder',
    'filesize'    =>    'filesize',
    'file_type'    =>    'file_type',
    'date_added'    =>    'date_added',
    'content'    =>    'content'
);

$pntable['mantis_bug_history_table'] = 'os_service_bug_history_table';
$pntable['mantis_bug_history_table_column'] = array(
    'id'    =>    'id',
    'user_id'    =>    'user_id',
    'bug_id'    =>    'bug_id',
    'date_modified'    =>    'date_modified',
    'field_name'    =>    'field_name',
    'old_value'    =>    'old_value',
    'new_value'    =>    'new_value',
    'type'    =>    'type'
);

$pntable['mantis_bug_monitor_table'] = 'os_service_bug_monitor_table';
$pntable['mantis_bug_monitor_table_column'] = array(
    'user_id'    =>    'user_id',
    'bug_id'    =>    'bug_id'
);

$pntable['mantis_bug_relationship_table'] = 'os_service_bug_relationship_table';
$pntable['mantis_bug_relationship_table_column'] = array(
    'id'    =>    'id',
    'source_bug_id'    =>    'source_bug_id',
    'destination_bug_id'    =>    'destination_bug_id',
    'relationship_type'    =>    'relationship_type'
);

$pntable['mantis_bug_table'] = 'os_service_bug_table';
$pntable['mantis_bug_table_column'] = array(
    'id'    =>    'id',
    'project_id'    =>    'project_id',
    'reporter_id'    =>    'reporter_id',
    'handler_id'    =>    'handler_id',
    'duplicate_id'    =>    'duplicate_id',
    'priority'    =>    'priority',
    'severity'    =>    'severity',
    'reproducibility'    =>    'reproducibility',
    'status'    =>    'status',
    'resolution'    =>    'resolution',
    'projection'    =>    'projection',
    'category'    =>    'category',
    'date_submitted'    =>    'date_submitted',
    'last_updated'    =>    'last_updated',
    'eta'    =>    'eta',
    'bug_text_id'    =>    'bug_text_id',
    'os'    =>    'os',
    'os_build'    =>    'os_build',
    'platform'    =>    'platform',
    'version'    =>    'version',
    'build'    =>    'build',
    'profile_id'    =>    'profile_id',
    'view_state'    =>    'view_state',
    'summary'    =>    'summary'
);

$pntable['mantis_bug_text_table'] = 'os_service_bug_text_table';
$pntable['mantis_bug_text_table_column'] = array(
    'id'    =>    'id',
    'description'    =>    'description',
    'steps_to_reproduce'    =>    'steps_to_reproduce',
    'additional_information'    =>    'additional_information'
);

$pntable['mantis_bugnote_table'] = 'os_service_bugnote_table';
$pntable['mantis_bugnote_table_column'] = array(
    'id'    =>    'id',
    'bug_id'    =>    'bug_id',
    'reporter_id'    =>    'reporter_id',
    'bugnote_text_id'    =>    'bugnote_text_id',
    'view_state'    =>    'view_state',
    'date_submitted'    =>    'date_submitted',
    'last_modified'    =>    'last_modified'
);

$pntable['mantis_bugnote_text_table'] = 'os_service_bugnote_text_table';
$pntable['mantis_bugnote_text_table_column'] = array(
    'id'    =>    'id',
    'note'    =>    'note'
);

$pntable['mantis_custom_field_project_table'] = 'os_service_custom_field_project_table';
$pntable['mantis_custom_field_project_table_column'] = array(
    'field_id'    =>    'field_id',
    'project_id'    =>    'project_id',
    'sequence'    =>    'sequence'
);

$pntable['mantis_custom_field_string_table'] = 'os_service_custom_field_string_table';
$pntable['mantis_custom_field_string_table_column'] = array(
    'field_id'    =>    'field_id',
    'bug_id'    =>    'bug_id',
    'value'    =>    'value'
);

$pntable['mantis_custom_field_table'] = 'os_service_custom_field_table';
$pntable['mantis_custom_field_table_column'] = array(
    'id'    =>    'id',
    'name'    =>    'name',
    'type'    =>    'type',
    'possible_values'    =>    'possible_values',
    'default_value'    =>    'default_value',
    'valid_regexp'    =>    'valid_regexp',
    'access_level_r'    =>    'access_level_r',
    'access_level_rw'    =>    'access_level_rw',
    'length_min'    =>    'length_min',
    'length_max'    =>    'length_max',
    'advanced'    =>    'advanced'
);

$pntable['mantis_news_table'] = 'os_service_news_table';
$pntable['mantis_news_table_column'] = array(
    'id'    =>    'id',
    'project_id'    =>    'project_id',
    'poster_id'    =>    'poster_id',
    'date_posted'    =>    'date_posted',
    'last_modified'    =>    'last_modified',
    'view_state'    =>    'view_state',
    'announcement'    =>    'announcement',
    'headline'    =>    'headline',
    'body'    =>    'body'
);

$pntable['mantis_project_category_table'] = 'os_service_project_category_table';
$pntable['mantis_project_category_table_column'] = array(
    'project_id'    =>    'project_id',
    'category'    =>    'category',
    'user_id'    =>    'user_id'
);

$pntable['mantis_project_file_table'] = 'os_service_project_file_table';
$pntable['mantis_project_file_table_column'] = array(
    'id'    =>    'id',
    'project_id'    =>    'project_id',
    'title'    =>    'title',
    'description'    =>    'description',
    'diskfile'    =>    'diskfile',
    'filename'    =>    'filename',
    'folder'    =>    'folder',
    'filesize'    =>    'filesize',
    'file_type'    =>    'file_type',
    'date_added'    =>    'date_added',
    'content'    =>    'content'
);

$pntable['mantis_project_table'] = 'os_service_project_table';
$pntable['mantis_project_table_column'] = array(
    'id'    =>    'id',
    'name'    =>    'name',
    'status'    =>    'status',
    'enabled'    =>    'enabled',
    'view_state'    =>    'view_state',
    'access_min'    =>    'access_min',
    'file_path'    =>    'file_path',
    'description'    =>    'description'
);

$pntable['mantis_project_user_list_table'] = 'os_service_project_user_list_table';
$pntable['mantis_project_user_list_table_column'] = array(
    'project_id'    =>    'project_id',
    'user_id'    =>    'user_id',
    'access_level'    =>    'access_level'
);

$pntable['mantis_project_version_table'] = 'os_service_project_version_table';
$pntable['mantis_project_version_table_column'] = array(
    'project_id'    =>    'project_id',
    'version'    =>    'version',
    'date_order'    =>    'date_order'
);

$pntable['mantis_upgrade_table'] = 'os_service_upgrade_table';
$pntable['mantis_upgrade_table_column'] = array(
    'upgrade_id'    =>    'upgrade_id',
    'description'    =>    'description'
);

$pntable['mantis_user_pref_table'] = 'os_service_user_pref_table';
$pntable['mantis_user_pref_table_column'] = array(
    'id'    =>    'id',
    'user_id'    =>    'user_id',
    'project_id'    =>    'project_id',
    'default_profile'    =>    'default_profile',
    'default_project'    =>    'default_project',
    'advanced_report'    =>    'advanced_report',
    'advanced_view'    =>    'advanced_view',
    'advanced_update'    =>    'advanced_update',
    'refresh_delay'    =>    'refresh_delay',
    'redirect_delay'    =>    'redirect_delay',
    'email_on_new'    =>    'email_on_new',
    'email_on_assigned'    =>    'email_on_assigned',
    'email_on_feedback'    =>    'email_on_feedback',
    'email_on_resolved'    =>    'email_on_resolved',
    'email_on_closed'    =>    'email_on_closed',
    'email_on_reopened'    =>    'email_on_reopened',
    'email_on_bugnote'    =>    'email_on_bugnote',
    'email_on_status'    =>    'email_on_status',
    'email_on_priority'    =>    'email_on_priority',
    'language'    =>    'language'
);

$pntable['mantis_user_print_pref_table'] = 'os_service_user_print_pref_table';
$pntable['mantis_user_print_pref_table_column'] = array(
    'user_id'    =>    'user_id',
    'print_pref'    =>    'print_pref'
);

$pntable['mantis_user_profile_table'] = 'os_service_user_profile_table';
$pntable['mantis_user_profile_table_column'] = array(
    'id'    =>    'id',
    'user_id'    =>    'user_id',
    'platform'    =>    'platform',
    'os'    =>    'os',
    'os_build'    =>    'os_build',
    'description'    =>    'description'
);

$pntable['mantis_user_table'] = 'os_service_user_table';
$pntable['mantis_user_table_column'] = array(
    'id'    =>    'id',
    'username'    =>    'username',
    'email'    =>    'email',
    'password'    =>    'password',
    'date_created'    =>    'date_created',
    'last_visit'    =>    'last_visit',
    'enabled'    =>    'enabled',
    'protected'    =>    'protected',
    'access_level'    =>    'access_level',
    'login_count'    =>    'login_count',
    'cookie_string'    =>    'cookie_string'
);


// check to see if we're outside of PN
if (!function_exists('pnDBInit') && !function_exists('pnDBGetConn'))
{
  // Get database parameters
  global $pnconfig;

  //$pnconfig['dbuname'] = base64_decode($pnconfig['dbuname']);
  //$pnconfig['dbpass'] = base64_decode($pnconfig['dbpass']);

  $dbtype  = $pnconfig['dbtype'];
  $dbhost  = $pnconfig['dbhost'];
  $dbname  = $pnconfig['dbname'];
  $dbuname = $pnconfig['dbuname'];
  $dbpass  = $pnconfig['dbpass'];

  global $dbconn;
  $dbconn = ADONewConnection($dbtype);
  $dbh = $dbconn->Connect($dbhost, 'root', $dbpass , $dbname);
  if (!$dbh)
    die ("Error establishing DB connection outside of PN (service) realm ...<br>" . $dbconn->ErrorMsg());

  // compatability function
  function pnDBGetConn()
  {
    global $dbconn;
    return array($dbconn);
  }

  // compatability function
  function pnDBGetTables()
  {
    global $pntable;
    return $pntable;
  }


  function pnVarPrepForDisplay()
  {
    // This search and replace finds the text 'x@y' and replaces
    // it with HTML entities, this provides protection against
    // email harvesters
    static $search = array('/(.)@(.)/se');

    static $replace = array('"&#" .
                            sprintf("%03d", ord("\\1")) .
                            ";&#064;&#" .
                            sprintf("%03d", ord("\\2")) . ";";');

    $resarray = array();
    foreach (func_get_args() as $ourvar) {

        // Prepare var
        $ourvar = htmlspecialchars($ourvar);

        $ourvar = preg_replace($search, $replace, $ourvar);

        // Add to array
        array_push($resarray, $ourvar);
    }

    // Return vars
    if (func_num_args() == 1) {
        return $resarray[0];
    } else {
        return $resarray;
    }
  }


  function pnVarPrepForStore($var)
  {
    if (!get_magic_quotes_runtime())
      $var = addslashes($var);

    return $var;
  }

}


class ServiceUtil
{
    /**
     * Retrieve a Service Project by ID
     *
     * @param project_id     The ID of the project we wish to retrieve
     *
     * @return The resulting project object
     */
    function &getProjectByID ($project_id)
    {
        return DBUtil::selectObjectByID ('mantis_project_table', $project_id);
    }


    /**
     * Retrieve a Bug by ID
     *
     * @param bug_id     The ID of the bug we wish to retrieve
     *
     * @return The resulting bug object
     */
    function getBugByID ($bug_id)
    {
        return DBUtil::selectObjectByID ('mantis_bug_table', $bug_id);
    }

    /**
     * Return an owl folder object.
     *
     * @param bug    Construct the Path of the bug
     *
     * @return The resulting bug path
     */
    function getBugPath ($bug)
    {
        $project = ServiceUtil::getProjectByID ($bug['project_id']);
        $category = $project['category'];

        $path = '';
        if ($project)
          $path = $project['name'];

        $path .= "/$category";

        return $path;
    }

}
?>