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
 *  Purpose of file: document utililty class
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */


@require_once ('includes/v4blib/Loader.class.php');
Loader::loadFile ('includes/v4blib/v4b_globals.inc');
Loader::loadClass ('ContentUtil');
Loader::loadClass ('DateUtil');
Loader::loadClass ('DBUtil');
Loader::loadClass ('FaqUtil');
Loader::loadClass ('ForumUtil');
Loader::loadClass ('MediaUtil');
Loader::loadClass ('ServiceUtil');
Loader::loadClass ('StringUtil');
Loader::loadClass ('WeblinkUtil');


$root = '/VIP Objects';
global $moduleToFolder;
$moduleToFolder = array();
$moduleToFolder['dq_helpdesk']         = "$root/Helpdesk";
$moduleToFolder['News']         = "$root/News";
$moduleToFolder['NS-AddStory']         = "$root/News";
$moduleToFolder['mantis']         = "$root/Service";
$moduleToFolder['PNphpBB2']         = "$root/Forum";
$moduleToFolder['pnAddressBook']     = "$root/Addressbook";
$moduleToFolder['photoshare']         = "$root/Media";
$moduleToFolder['pagesetter']         = "$root/Content";
$moduleToFolder['Topics']         = "$root/News";
//$moduleToFolder['UpDownload']         = "$root/Downloads";
$moduleToFolder['v4bProjects']         = "$root/Projects";
$moduleToFolder['v4bRbs']         = "$root/Ressource Booking";


// explicityly map the OWL tables here
$pntable = &$GLOBALS['pntables'];
$pntable['os_docmgmt_active_sessions'] = 'os_docmgmt_active_sessions';
$pntable['os_docmgmt_active_sessions_column'] = array(
    'sessid'    =>    'sessid',
    'usid'        =>    'usid',
    'lastused'    =>    'lastused',
    'ip'        =>    'ip'
);

$pntable['os_docmgmt_membergroup'] = 'os_docmgmt_membergroup';
$pntable['os_docmgmt_membergroup_column'] = array(
    'userid'    =>    'userid',
    'groupid'    =>    'groupid'
);

$pntable['os_docmgmt_folders'] = 'os_docmgmt_folders';
$pntable['os_docmgmt_folders_column'] = array(
    'id'        =>    'id',
    'name'        =>    'name',
    'parent'    =>    'parent',
    'description'    =>    'description',
    'security'    =>    'security',
    'groupid'    =>    'groupid',
    'creatorid'    =>    'creatorid',
    //'meta_object_id'=>    'meta_object_id',
    'path'        =>    'path'
);

$pntable['os_docmgmt_files'] = 'os_docmgmt_files';
$pntable['os_docmgmt_files_column'] = array(
    'id'        =>    'id',
    'name'        =>    'name',
    'filename'    =>    'filename',
    'f_size'    =>    'f_size',
    'creatorid'    =>    'creatorid',
    'parent'    =>    'parent',
    'created'    =>    'created',
    'description'    =>    'description',
    'metadata'    =>    'metadata',
    'security'    =>    'security',
    'groupid'    =>    'groupid',
    'smodified'    =>    'smodified',
    'checked_out'    =>    'checked_out',
    'major_revision'=>    'major_revision',
    'minor_revision'=>    'minor_revision',
    'url'        =>    'url',
    'doctype'    =>    'doctype',
    //'meta_object_id'=>    'meta_object_id',
    'path'        =>    'path',
    'ib_doc_id'    =>    'ib_doc_id'
);

$pntable['os_docmgmt_comments'] = 'os_docmgmt_comments';
$pntable['os_docmgmt_comments_column'] = array(
    'id'        =>    'id',
    'fid'        =>    'fid',
    'userid'    =>    'userid',
    'comment_date'    =>    'comment_date',
    'comments'    =>    'comments'
);

$pntable['os_docmgmt_news'] = 'os_docmgmt_news';
$pntable['os_docmgmt_news_column'] = array(
    'id'        =>    'id',
    'gid'        =>    'gid',
    'news_title'    =>    'news_title',
    'news_date'    =>    'news_date',
    'news'        =>    'news',
    'news_end_date'    =>    'news_end_date'
);

$pntable['os_docmgmt_filedata'] = 'os_docmgmt_filedata';
$pntable['os_docmgmt_filedata_column'] = array(
    'id'        =>    'id',
    'compressed'    =>    'compressed',
    'data'        =>    'data'
);

$pntable['os_docmgmt_users'] = 'os_docmgmt_users';
$pntable['os_docmgmt_users_column'] = array(
    'id'        =>    'id',
    'groupid'    =>    'groupid',
    'username'    =>    'username',
    'name'        =>    'name',
    'password'    =>    'password',
    'quota_max'    =>    'quota_max',
    'quota_current'    =>    'quota_current',
    'email'        =>    'email',
    'notify'    =>    'notify',
    'attachfile'    =>    'attachfile',
    'disabled'    =>    'disabled',
    'noprefaccess'    =>    'noprefaccess',
    'language'    =>    'language',
    'maxsessions'    =>    'maxsessions',
    'lastlogin'    =>    'lastlogin',
    'curlogin'    =>    'curlogin',
    'lastnews'    =>    'lastnews',
    'newsadmin'    =>    'newsadmin',
    'comment_notify'=>    'comment_notify',
    'buttonstyle'    =>    'buttonstyle',
    'homedir'    =>    'homedir',
    'firstdir'    =>    'firstdir'
    //'homedir_v'    =>    'homedir_v',
    //'firstdir_v'    =>    'firstdir_v'
);

$pntable['os_docmgmt_groups'] = 'os_docmgmt_groups';
$pntable['os_docmgmt_groups_column'] = array(
    'id'        =>    'id',
    'name'        =>    'name'
);

$pntable['os_docmgmt_log'] = 'os_docmgmt_log';
$pntable['os_docmgmt_log_column'] = array(
    'id'        =>    'id',
    'userid'    =>    'userid',
    'filename'    =>    'filename',
    'parent'    =>    'parent',
    'action'    =>    'action',
    'details'    =>    'details',
    'ip'        =>    'ip',
    'agent'        =>    'agent',
    'logdate'    =>    'logdate',
    'type'        =>    'type'
);

$pntable['os_docmgmt_html'] = 'os_docmgmt_html';
$pntable['os_docmgmt_html_column'] = array(
    'id'        =>    'id',
    'table_border'    =>    'table_border',
    'table_header_bg'=>    'table_header_bg',
    'table_cell_bg'    =>    'table_cell_bg',
    'table_cell_bg_alt'    =>    'table_cell_bg_alt',
    'table_expand_width'    =>    'table_expand_width',
    'table_collapse_width'    =>    'table_collapse_width',
    'main_header_bgcolor'    =>    'main_header_bgcolor',
    'body_bgcolor'    =>    'body_bgcolor',
    'body_background'=>    'body_background',
    'owl_logo'    =>    'owl_logo',
    'body_textcolor'=>    'body_textcolor',
    'body_link'    =>    'body_link',
    'body_vlink'    =>    'body_vlink'
);

$pntable['os_docmgmt_prefs'] = 'os_docmgmt_prefs';
$pntable['os_docmgmt_prefs_column'] = array(
    'id'        =>    'id',
    'email_from'    =>    'email_from',
    'email_fromname'=>    'email_fromname',
    'email_replyto'    =>    'email_replyto',
    'email_server'    =>    'email_server',
    'email_subject'    =>    'email_subject',
    'lookathd'    =>    'lookathd',
    'lookathddel'    =>    'lookathddel',
    'def_file_security'    =>    'def_file_security',
    'def_file_group_owner'    =>    'def_file_group_owner',
    'def_file_owner'    =>    'def_file_owner',
    'def_file_title'    =>    'def_file_title',
    'def_file_meta'    =>    'def_file_meta',
    'def_fold_security'    =>    'def_fold_security',
    'def_fold_group_owner'    =>    'def_fold_group_owner',
    'def_fold_owner'    =>    'def_fold_owner',
    'max_filesize'    =>    'max_filesize',
    'tmpdir'    =>    'tmpdir',
    'timeout'    =>    'timeout',
    'expand'    =>    'expand',
    'version_control'    =>    'version_control',
    'restrict_view'    =>    'restrict_view',
    'hide_backup'    =>    'hide_backup',
    'dbdump_path'    =>    'dbdump_path',
    'gzip_path'    =>    'gzip_path',
    'tar_path'    =>    'tar_path',
    'unzip_path'    =>    'unzip_path',
    'pod2html_path'    =>    'pod2html_path',
    'pdftotext_path'    =>    'pdftotext_path',
    'file_perm'    =>    'file_perm',
    'folder_perm'    =>    'folder_perm',
    'logging'    =>    'logging',
    'log_file'    =>    'log_file',
    'log_login'    =>    'log_login',
    'log_rec_per_page'    =>    'log_rec_per_page',
    'rec_per_page'    =>    'rec_per_page',
    'self_reg'    =>    'self_reg',
    'self_reg_quota'    =>    'self_reg_quota',
    'self_reg_notify'    =>    'self_reg_notify',
    'self_reg_attachfile'    =>    'self_reg_attachfile',
    'self_reg_disabled'    =>    'self_reg_disabled',
    'self_reg_noprefacces'    =>    'self_reg_noprefacces',
    'self_reg_maxsessions'    =>    'self_reg_maxsessions',
    'self_reg_group'    =>    'self_reg_group',
    'anon_ro'    =>    'anon_ro',
    'anon_user'    =>    'anon_user',
    'file_admin_group'    =>    'file_admin_group',
    'forgot_pass'    =>    'forgot_pass',
    'collect_trash'    =>    'collect_trash',
    'trash_can_location'    =>    'trash_can_location',
    'allow_popup'    =>    'allow_popup',
    'status_bar_location'    =>    'status_bar_location',
    'hide_bulk'    =>    'hide_bulk',
    'remember_me'    =>    'remember_me',
    'cookie_timeout'    =>    'cookie_timeout',
    'use_smtp'    =>    'use_smtp',
    'use_smtp_auth'    =>    'use_smtp_auth',
    'smtp_passwd'    =>    'smtp_passwd'
);

$pntable['os_docmgmt_monitored_file'] = 'os_docmgmt_monitored_file';
$pntable['os_docmgmt_monitored_file_column'] = array(
    'id'        =>    'id',
    'userid'    =>    'userid',
    'fid'        =>    'fid'
);

$pntable['os_docmgmt_monitored_folder'] = 'os_docmgmt_monitored_folder';
$pntable['os_docmgmt_monitored_folder_column'] = array(
    'id'        =>    'id',
    'userid'    =>    'userid',
    'fid'        =>    'fid'
);

$pntable['os_docmgmt_mimes'] = 'os_docmgmt_mimes';
$pntable['os_docmgmt_mimes_column'] = array(
    'filetype'    =>    'filetype',
    'mimetype'    =>    'mimetype'
);

$pntable['os_docmgmt_wordidx'] = 'os_docmgmt_wordidx';
$pntable['os_docmgmt_wordidx_column'] = array(
    'wordid'    =>    'wordid',
    'word'    =>    'word'
);

$pntable['os_docmgmt_searchidx'] = 'os_docmgmt_searchidx';
$pntable['os_docmgmt_searchidx_column'] = array(
    'wordid'    =>    'wordid',
    'owlfileid'    =>    'owlfileid'
);

$pntable['os_docmgmt_doctype'] = 'os_docmgmt_doctype';
$pntable['os_docmgmt_doctype_column'] = array(
    'doc_type_id'    =>    'doc_type_id',
    'doc_type_name'    =>    'doc_type_name'
);

$pntable['os_docmgmt_docfields'] = 'os_docmgmt_docfields';
$pntable['os_docmgmt_docfields_column'] = array(
    'id'        =>    'id',
    'doc_type_id'    =>    'doc_type_id',
    'field_name'    =>    'field_name',
    'field_position'=>    'field_position',
    'field_type'    =>    'field_type',
    'field_values'    =>    'field_values',
    'field_label'    =>    'field_label',
    'field_size'    =>    'field_size',
    'searchable'    =>    'searchable',
    'required'    =>    'required'
);

$pntable['os_docmgmt_docfieldvalues'] = 'os_docmgmt_docfieldvalues';
$pntable['os_docmgmt_docfieldvalues_column'] = array(
    'id'        =>    'id',
    'file_id'    =>    'file_id',
    'field_name'    =>    'field_name',
    'field_value'    =>    'field_value'
);

$pntable['os_docmgmt_docfieldslabel'] = 'os_docmgmt_docfieldslabel';
$pntable['os_docmgmt_docfieldslabel_column'] = array(
    'doc_field_id'    =>    'doc_field_id',
    'field_label'    =>    'field_label',
    'locale'    =>    'locale'
);

$pntable['os_docmgmt_meta_object'] = 'os_docmgmt_meta_object';
$pntable['os_docmgmt_meta_object_column'] = array(
    'id'            =>      'id',
    'name'            =>      'name',
    'description'        =>      'description',
    'obj_module'        =>      'obj_module',
    'obj_key_table'        =>      'obj_key_table',
    'obj_key_field'        =>      'obj_key_field',
    'obj_key_value'        =>      'obj_key_value',
    'url_delete'        =>      'url_delete',
    'url_display'        =>      'url_display',
    'url_edit'        =>      'url_edit',
    'url_new'        =>      'url_new',
    'source_system'        =>     'source_system',
    'security_domain'     =>     'security_domain',
    'security_function'     =>     'security_function'
);


// check to see if we're outside of PN
if (!function_exists('pnDBInit') && !function_exists('pnDBGetConn'))
{
  // Get database parameters
  global $pnconfig;
  $pnconfig['dbuname'] = base64_decode($pnconfig['dbuname']);
  $pnconfig['dbpass'] = base64_decode($pnconfig['dbpass']);

  $dbtype  = $pnconfig['dbtype'];
  $dbhost  = $pnconfig['dbhost'];
  $dbname  = $pnconfig['dbname'];
  $dbuname = $pnconfig['dbuname'];
  $dbpass  = $pnconfig['dbpass'];

  global $dbconn;
  $dbconn = ADONewConnection($dbtype);
  $dbconn->debug = false;
  $dbh = $dbconn->Connect($dbhost, $dbuname, $dbpass, $dbname);
  if (!$dbh)
    die ("Error establishing DB connection outside of PN (DocMgmt) realm ...<br>" . $dbconn->ErrorMsg());

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
}


// V4B RNG Test Only
//DocumentUtil::rebuildFoldersPaths ();
//DocumentUtil::rebuildFilesPaths ();
//v4b_exit();


class DocumentUtil
{
    /**
     * Given an array of folders (with the folder-ids being
     * the keys of the array, return an array of folder
     * paths with the same index.
     *
     * @param folders    The folder object array
     *
     * @return The resulting folder path array
     */
    function buildFoldersPath ($folders)
    {
        $paths = array ();

        foreach ($folders as $key => $folder)
          {
          $path   = $folder['name'];
          $parent = $folder['parent'];

          while ($parent)
            {
        $pfolder = $folders[$parent];
            $path    = "$pfolder[name]/$path";
        $parent  = $pfolder['parent'];
        }

          $paths[$key] = "/$path";
          }

        return $paths;
    }


    /**
     * Rebuild the path field for all folders in the database
     */
    function rebuildFoldersPaths ()
    {
        $folders = DocumentUtil::getFolders ($where, '', false, true);
        $paths = DocumentUtil::buildFoldersPath ($folders);

        foreach ($folders as $key => $folder)
          {
          $folder['path'] = $paths[$key];
          $res = DBUtil::updateObject ($folder, 'os_docmgmt_folders', '', false);
          }
    }


    /**
     * Rebuild the path field for all files in the database
     */
    function rebuildFilesPaths ()
    {
        $folders = DocumentUtil::getFolders ($where, '', false, true);

        foreach ($folders as $key => $folder)
          {
          $where = "WHERE parent=$key";
          $files = DocumentUtil::getFiles ($where);

          foreach ($files as $fid => $file)
            {
            $file['path'] = $folder['path'] . "/$file[name]";
            $res = DBUtil::updateObject ($file, 'os_docmgmt_files', '', false);
            }
          }
    }


    /**
     * Get the files according the specified where-clause and sort criteria
     *
     * @param where        The where clause to use in the select (optional) (default='')
     * @param sort        The order-by clause to use in the select (optional) (default='')
     *
     * @return The resulting folder object array
     */
    function getFiles ($where='', $sort='')
    {
        $files = DBUtil::selectObjectArray ('os_docmgmt_files', $where, $sort, -1, -1);
        return $files;
    }


    /**
     * Return an array of folder objects according the specified where-clause and sort criteria.
     *
     * @param where        The where clause to use in the select (optional) (default='')
     * @param sort        The order-by clause to use in the select (optional) (default='')
     * @param doStats       Return the number of documents in each folder
     * @param keyIndex      Return an array where the index is the folder-id
     *
     * @return The resulting folder object array
     */
    function getFolders ($where='', $sort='', $doStats=false, $keyIndex=false)
    {
        $folders = DBUtil::selectObjectArray ('os_docmgmt_folders', $where, $sort, -1, -1, 'id');

        if ($doStats)
          {
          $keys = array_keys ($folders);
          $ksize = count($keys);
          for ($i=0; $i<$kSize; $i++)
            {
            $fld = &$folders[$keys[$i]];

            $where = "WHERE parent = $fld[id]";
            $count = DBUtil::selectObjectCount ('os_docmgmt_files', $where);
            $fld['file_count'] = $count;
            }
          }

        return $folders;
    }


    /**
     * Return a folder object.
     *
     * @param where        The where clause to use in the select
     *
     * @return The resulting folder object
     */
    function getFolder ($where)
    {
        $folders = DocumentUtil::getFolders ($where);

        if ($folders[0])
          return $folders[0];

        return array();
    }



    /**
     * Return a folder object by it's ID
     *
     * @param id         The folder id to retrieve
     *
     * @return The resulting folder object
     */
    function getFolderByID ($id)
    {
        $where   = "id = $id";
        $folders = DocumentUtil::getFolders ($where);

        if ($folders[0])
          return $folders[0];

        return array ();
    }


    /**
     * Return a folder object by it's path
     *
     * @param path    The path to retrieve by
     *
     * @return The resulting folder object
     */
    function getFolderByPath ($path)
    {
        $where   = "path = '$path'";
        $folders = DocumentUtil::getFolders ($where);

        if ($folders[0])
          return $folders[0];

        return array ();
    }


    /**
     * Return an array of folder objects by path
     *
     * @param path        The path to retrieve by
     * @param sort        The sort order to use
     *
     * @return The resulting folder object array
     */
    function getFoldersByPath ($path, $sort='path')
    {
        $where   = "path LIKE '$path%'";
        $sort    = "ORDER BY $sort";
        $folders = DocumentUtil::getFolders ($where, $sort);

        return $folders;
    }


    /**
     * Return a docmgmt user by username
     *
     * @param username    The username to retrieve
     *
     * @return The resulting folder object array
     */
    function getUserByName ($username)
    {
        $where = "username = '$username'";
        $owluser = DBUtil::selectObject ('os_docmgmt_users', $where);
        return $owluser;
    }


    /**
     * Return an array of files the user has at least access/view rights to.
     *
     * @param username    The username we wish to get the folder list for
     * @param mode        The browseMode we're in
     * @param includeFolders Wether or not to include the folders
     *
     * @return The resulting folder path array
     */
    function getUserFiles ($username, $mode, $includeFolders=true)
    {
        $files   = array();
        $folders = DocumentUtil::getUserFolders ($username, $mode);

        $user = DocumentUtil::getUserByName ($username);
        if (!$user)
          return $folders;

        $size = count($folders);
        for ($i=0; $i<$size; $i++)
          {
          $folder = $folders[$i];

          $userFolders  = "creatorid = $user[id]";
          $groupFolders = "(groupid = $user[groupid] AND security != 2)";

          if ($mode == 'D')
            $exclude    = "(path LIKE '/Documents%')";
          else
            $exclude    = "(path NOT LIKE '/Documents%')";

          //$where = "($userFolders OR $groupFolders) AND ($exclude) AND (path LIKE '$folder[path]%')";
          $where = "path LIKE '$folder[path]%'";
          $sort  = 'ORDER BY path';

          if ($includeFolders)
            $files[] = $folder;

          $files = array_merge ((array)$files, (array)DocumentUtil::getFiles ($where, $sort));
          }

        return $files;
    }



    /**
     * Return an array of folders the user has at least access/view rights to.
     *
     * @param username    The username we wish to get the folder list for
     * @param mode        The browse-mode we're in
     *
     * @return The resulting folder path array
     */
    function getUserFolders ($username, $mode)
    {
        $folders = array ();

        $user = DocumentUtil::getUserByName ($username);
        if (!$user)
          return $folders;

        $userFolders  = "creatorid = $user[id]";
        //$groupFolders = "(groupid = $user[groupid] AND security != 52)";
        //if ($mode == 'D')
          //$exclude    = "(name = 'Documents' OR path LIKE '/Documents%')";
        //else
          //$exclude    = "(name != 'Documents' AND path NOT LIKE '/Documents%')";
        //$where = "WHERE ($userFolders OR $groupFolders) AND ($exclude)";
        //$where = "WHERE ($userFolders OR $groupFolders)";
        //$where = "WHERE ($userFolders OR $groupFolders)";
        $sort  = 'ORDER BY path';

        $folders = DocumentUtil::getFolders($where, $sort, true);
        return $folders;
    }


    /**
     * Generate the menu structure for the given folder array
     *
     * @param folders    The folder array to generate the menu structure for
     *
     * @return The resulting folder path array
     */
    function getUserFoldersMenuStructure ($folders)
    {
        $menuString = '';

        $expand   = $_REQUEST['expand'];
        $sess     = $_REQUEST['sess'];
        $order    = $_REQUEST['order'];
        $sortname = $_REQUEST['sortname'];
        $mode     = $_REQUEST['mode'];
        $display_folders = $_REQUEST['display_folders'];

        // use foreach as folders can come back with folderIDs as keys
        foreach ($folders as $folder)
          {
          $path   = $folder['path'];
          $depth  = StringUtil::countInstances ($path, '/');

          // account for the fact that a single slash is a valid root
          // path but subfolders only have a single slash as well
          if (strlen($path) > 1)
            $depth++;

          $ds = '';
          for ($j=0; $j<$depth; $j++)
            $ds .= '.';

          $parent = $folder['id'];

          if ($folder['filename']) // folder is really a file
            $parent = $folder['parent'];

          $url    = "browse.php?sess=$sess&parent=$parent&expand=$expand&order=$order&sortname=$sortname&mode=$mode&display_folders=$display_folders";

          $open = 0;
          //if ($_REQUEST['parent'] == $folder['id'])
            //$open = 1;

          $name = $folder['name'];
          if ($folder['file_count'])
            $name .= " ($folder[file_count])";

          if ($folder['filename']) // folder is really a file
            $menuLine = "$ds|$name|$url||../../../images/v4b/document.gif||$open\n";
          else
            $menuLine = "$ds|$name|$url||||$open\n";

          $menuString .= $menuLine;
          }

        //print (nl2br ($menuString));
        return $menuString;
    }


    /**
     * Get the (recursive) subfolders for this folder
     *
     * @param fid        The username we wish to get the folder list for
     * @param relative    The username we wish to get the folder list for
     * @param includeRoot    Wether or not to include the root folder in the result set
     *
     * @return The resulting folder path array
     */
    function getSubfolders ($fid, $relative=true, $includeRoot=false)
    {
        $folder = DocumentUtil::getFolderByID ($fid);

        if (!$folder)
          return array();

        $path = $folder['path'];

        if (!$path)
          return array();

        return DocumentUtil::getSubfoldersByPath ($path, $relative, $includeRoot);
    }


    /**
     * Get the direct subfolders for this folder
     *
     * @param fid        The username we wish to get the folder list for
     * @param relative    Not implemented for this function (no need yet)
     * @param includeRoot    Wether or not to include the root folder in the result set
     *
     * @return The resulting folder path array
     */
    function getDirectSubfolders ($fid, $relative=true, $includeRoot=false)
    {

        $where = "WHERE parent = $fid";
        $folders = DocumentUtil::getFolders ($where, 'name');

        return $folders;
    }


    /**
     * Return an array of subfolders for a given folder
     *
     * @param path        The path to get by
     * @param relative    Wether or not to return relative paths (optional) (default=true)
     * @param includeRoot    Wether or not to include the root folder in the result set
     *
     * @return The resulting folder path array
     */
    function getSubfoldersByPath ($path, $relative=true, $includeRoot=false)
    {
        $folders = DocumentUtil::getFoldersByPath ($path);

        if (!$includeRoot)
          {
          $f = array_shift ($folders);
          $folders = $f;
          }

        if ($relative)
          {
          }

        return $folders;
    }


    /* ***************************************************************************************** */
    /* ***************************************************************************************** */
    /* **************************** Meta Object Integration ************************************ */
    /* ***************************************************************************************** */
    /* ***************************************************************************************** */



    /**
     * Return a specific meta-object as specified by the where clause
     *
     * @param where        The where-clause to use
     *
     * @return The resulting object
     */
    function getMetaObject ($where)
    {
        return DBUtil::selectObject ('os_docmgmt_meta_object', $where);
    }


    /**
     * Return a specific meta-object by ID
     *
     * @param id        The ID to use in the where clause
     *
     * @return The resulting object
     */
    function getMetaObjectByID ($id)
    {
        $where = "WHERE id = $id";
        return DBUtil::selectObjectByID ('os_docmgmt_meta_object', $id);
    }



    /**
     * Insert a meta object by values
     *
     * @param obj_module        The target module
     * @param name            The name of the object instance
     * @param description        The description of the object instance
     * @param obj_key_table        The table the object is referring to
     * @param obj_key_field        The table-field key the object is referring to
     * @param obj_key_value        The table-field value (ie: the object key)
     * @param url_delete         The URL to access the delete function
     * @param url_display        The URL to access the display function
     * @param url_edit        The URL to acess the edit function
     * @param url_new        The URL to acess the new function
     * @param source_system         The system based object source
     * @param security_domain     The security domain it's used for
     * @param security_function     The security function to call
     * @param vipObject        The object representation of the vip object
     *
     * @return The resulting object
     */
    function insertMetaObjectByValues ($obj_module, $name, $description, $obj_key_table, $obj_key_field,
                                       $obj_key_value, $url_delete, $url_display,
                       $url_edit, $url_new, $source_system,
                       $security_domain, $security_function, &$vipObject)
    {
        $object = array();
        $object['name']             = $name;
        $object['description']       = $description;
        $object['obj_module']        = $obj_module;
        $object['obj_key_table']     = $obj_key_table;
        $object['obj_key_field']     = $obj_key_field;
        $object['obj_key_value']     = $obj_key_value;
        $object['url_delete']        = $url_delete;
        $object['url_display']       = $url_display;
        $object['url_edit']          = $url_edit;
        $object['url_new']           = $url_new;
        $object['source_system']     = $source_system;
        $object['security_domain']   = $security_domain;
        $object['security_function'] = $security_function;

        DocumentUtil::insertMetaObject ($object, $vipObject);

        return $object;
    }


    /**
     * Insert a meta object
     *
     * @param metaObject    The meta object
     * @param vipObject     The vip object
     *
     * @return The resulting meta-object ID
     */
    function insertMetaObject (&$metaObject, $vipObject)
    {
        if (!$metaObject)
          v4b_exit ("Empty object passed to DocumentUtil::insertMetaObject ...");

        $ok = true;
        foreach ($metaObject as $k => $v)
          if ($k != 'url_delete' && $k != 'security_domain' && $k != 'security_function' && !$v)
            {
            print ("Empty $k passed to DocumentUtil::insertMetaObject ...<br>");
            $ok = false;
            }

        if (!$ok)
          v4b_exit ('Exiting ...');

        // FIXME: For some reason metaObject returns the insert value from the bug_history table.
        // This seems to point towards an issue with owl's db management. We explicitly get the ID here ...
        DBUtil::insertObject ($metaObject, 'os_docmgmt_meta_object', true, false);
        $max_id = DBUtil::selectFieldMax ('os_docmgmt_meta_object', 'id');
        $metaObject['id'] = $max_id;

        DocumentUtil::insertMetaObjectReference ($metaObject, $vipObject);
        return $metaObject['id'];
    }


    /**
     * Create a folder structure as dictated by the given parent Folder and path
     *
     * @param parentFolder         The parent folder object
     * @param newFolderPath        The new folder path string
     * @param meta_object_id    The meta object-id for this object
     *
     * @return The resulting meta-object ID
     */
    function createFoldersByPath ($parentFolder, $newFolderPath, $meta_object_id)
    {
        $tokens = StringUtil::tokenize($newFolderPath, '/');

        foreach ($tokens as $tok)
          {
          if ($tok)
              {
              $newPath = $parentFolder['path'] . '/' . $tok;
              $wantedParentFolder = DocumentUtil::getFolderByPath ($newPath);

              // if the cateogory folder doesn't exist, create it
              if ($wantedParentFolder)
            $parentFolder = $wantedParentFolder;
              else
                {
                $newFolder = array();
                $newFolder['id']             = '';
                $newFolder['name']           = $tok;
                $newFolder['parent']         = $parentFolder['id'];
                $newFolder['security']       = 50;
                $newFolder['description']    = $fldDesc;
                $newFolder['groupid']        = 0;
                $newFolder['creatorid']      = 1;
                $newFolder['meta_object_id'] = $meta_object_id;
                $newFolder['path']           = $newPath;

                DBUtil::insertObject ($newFolder, 'os_docmgmt_folders', false);
                $parentFolder = $newFolder;
                }
              }

          }

       return $parentFolder;
    }


    /**
     * Insert a meta object reference based on the type it has
     *
     * @param metaObject    The meta object
     * @param vipObject     The vip object
     *
     * @return The resulting meta-object ID
     */
    function insertMetaObjectReference (&$metaObject, &$vipObject)
    {
        if (!$metaObject)
          v4b_exit ("Empty metaObject passed to DocumentUtil::insertMetaObjectReference ...");

        if (!$vipObject)
          v4b_exit ("Empty vipObject passed to DocumentUtil::insertMetaObjectReference ...");

        global $moduleToFolder;
        $obj_module       = $metaObject['obj_module'];
        $parentFolderPath = "$moduleToFolder[$obj_module]";

        if (!$obj_module)
          v4b_exit ("Unable to determine path for module $obj_module in DocumentUtil::insertMetaObjectReference ...");

        $parentFolder     =& DocumentUtil::getFolder ("path = '$parentFolderPath'");

        $keyTable        = $metaObject['obj_key_table'];
        $name            = $metaObject['name'];
        $createObjFolder = false;
        $objFolderID     = '';
        $pathToAdd       = '';
        $parentKey       = '';
        $qryTable        = '';

        if ($obj_module == 'v4bProjects')
          {
          if ($keyTable == 'v4b_projects_project')
            {
            $fldName         = $name;
            $fldDesc         = "$name Projekt Ordner";
            $parentKey       = $vipObject['parent_project_id'];
            $qryTable        = $keyTable;
            $pathToAdd       = $name;
            }
          else
          if ($keyTable == 'v4b_projects_statusreport')
            {
            $fldName = "Statusreport $vipObject[lu_date]";
            $fldDesc = $vipObject['text_project'];
            $name = $vipObject['description'];
            $parentKey = $vipObject['project_id'];
            $pathToAdd = 'Statusreports';
            $qryTable = 'v4b_projects_project';
            }
          else
          if ($keyTable == 'v4b_projects_timesheet')
            {
            $name = $vipObject['description'];
            $fldName = $name;
            $fldDesc = $vipObject['description'];
            $parentKey = $vipObject['project_id'];
            $pathToAdd = 'Timesheets';
            $qryTable = 'v4b_projects_project';
            }
          else
          if ($keyTable == 'v4b_projects_todo')
            {
            $name = $vipObject['subject'];
            $fldName = $name;
            $fldDesc = $vipObject['description'];
            $parentKey = $vipObject['project_id'];
            $pathToAdd = 'Todos';
            $qryTable = 'v4b_projects_project';
            }
          }
        else
        if ($obj_module == 'v4bRbs')
          {
          $name = $vipObject['subject'];
          $fldDesc = $vipObject['description'];
          if (!$fldDesc)
            $fldDesc = $fldName;
          $fldDesc .= ": $vipObject[startdate] - $vipObject[enddate]";
          $year = DateUtil::getDatetime_Field ($vipObject['startdate'], 1);
          $pathToAdd = "$vipObject[category_name]/$year/$vipObject[resource_name]";
          }
        else
        if ($obj_module == 'dq_helpdesk')
          {
          $name = "$vipObject[ticket_subject]";
          $fldName = $name;
          $fldDesc = $vipObject['ticket_subject'];
          if (!$fldDesc)
            $fldDesc = $fldName;
          $fldDesc .= "<br>$vipObject[ticketdate]";
          $year  = DateUtil::getDatetime_Field ($vipObject['ticket_date'], 1);
          $month = DateUtil::getDatetime_Field ($vipObject['ticket_date'], 2);
          $day   = DateUtil::getDatetime_Field ($vipObject['ticket_date'], 3);
          $pathToAdd = "$year/$month/$day";
          }
        else
        if ($obj_module == 'FAQ')
          {
          $name = "$vipObject[question]";
          $fldName = $name;
          $fldDesc = $vipObject['answer'];
          if (!$fldDesc)
            $fldDesc = $fldName;
          $fldDesc .= "<br>$vipObject[submittedby]";

          $pathToAdd = FaqUtil::getFAQPath ($vipObject);
          }
        else
        if ($obj_module == 'mantis')
          {
          $name = "$vipObject[summary]";
          $fldName = $name;
          $fldDesc = $vipObject['description'];

          $pathToAdd = ServiceUtil::getBugPath ($vipObject);
          }
        else
        if ($obj_module == 'NS-AddStory')
          {
          $name = $vipObject['title'];
          $fldName = $name;
          $fldDesc = $vipObject['hometext'];
          $qryTable = 'topics';
          $objFolderID = $parentFolder['id'];

          if ($vipObject['topic'])
            $parentKey = $vipObject['topic'];
          }
        else
        if ($obj_module == 'pagesetter')
          {
          $name = "$vipObject[pg_field1]";
          $fldName = $name;
          $fldDesc = $vipObject['pg_field2'];
          $qryTable = $metaObject['url_key_table'];

          $found = 0;
          $len = strlen ($qryTable);
          $tid = '';
          for ($i=0; $i<$len; $i++)
            {
            $rest = substr ($qryTable, $i);
            if (is_numeric($rest))
          $tid = (int)$rest;
        }

          $contentType = ContentUtil::getPubTypeByID ($tid);
          $pathToAdd = $contentType['title'];
          }
        else
        if ($obj_module == 'photoshare')
          {
          $name = "$vipObject[title]";
          $fldName = $name;
          $fldDesc = $vipObject['description'];
          if (!$fldDesc)
            $fldDesc = $fldName;

          $folder = MediaUtil::getFolderByID ($vipObject['parentFolder']);
          $pathToAdd = $folder['title'];
          }
        else
        if ($obj_module == 'pnAddressBook')
          {
          $name = "$vipObject[lname] $vipObject[fname]";
          $fldName = $name;
          $fldDesc = $vipObject['hometext'];
          $qryTable = 'pnaddressbook_address';
          $pathToAdd = strtoupper (substr ($name, 0, 1));
          }
        else
        if ($obj_module == 'PNphpBB2')
          {
          $name = "$vipObject[post_subject]";
          $fldName = $name;
          $fldDesc = $vipObject['description'];

          $pathToAdd = ForumUtil::getTopicPath ($vipObject['topic_id']);
          }
        else
        if ($obj_module == 'Topics')
          {
          $name = $vipObject['topicname'];
          $fldName = $name;
          $fldDesc = $name;
          $pathToAdd = $name;
          }
        else
        if ($obj_module == 'Web-Links')
          {
          $name = "$vipObject[title]";
          $fldName = $name;
          $fldDesc = $vipObject['description'];
          if (!$fldDesc)
            $fldDesc = $fldName;
          $fldDesc .= "<br>$vipObject[url]<br>$vipObject[date]";

          $pathToAdd = WeblinkUtil::getWeblinkPath ($vipObject);
          }
//        else
//        if ($obj_module == 'UpDownload')
//          {
//          $name = $vipObject['topicname'];
//          $fldName = $name;
//          $fldDesc = $name;
//          $pathToAdd = $name;
//          }
        else
          v4b_exit ("Unsupported module $obj_module requested in DocumentUtil::insertMetaObjectReference ...");

        if ($qryTable && $parentKey)
          {
          $parentFolder = &DocumentUtil::retrieveMetaObjectParentFolder ($qryTable, $parentKey);
          if (!$parentFolder)
            v4b_exit ("Unable to determine parentFolder for $qryTable, $parentKey in DocumentUtil::insertMetaObjectReference ...");
          $objFolderID = $parentFolder['id'];
          }

        //
        // real processing starts here ...
        //

        // ensure we have all required folders
        if ($pathToAdd)
          {
          $parentFolder = &DocumentUtil::createFoldersByPath ($parentFolder, $pathToAdd, $metaObject['id']);
          if (!$parentFolder)
            v4b_exit ("Unable to create parentFolders for $pathToAdd in DocumentUtil::insertMetaObjectReference ...");
          $objFolderID  = $parentFolder['id'];
          }

        // finally, insert the actual meta object file reference
        if ($objFolderID)
          {
          $newPath = $parentFolder['path'] . '/' . $name;
          $cr_date = DateUtil::getDatetime ();

          $objFile = array();
          $objFile['id']             = '';
          $objFile['name']           = $fldName;
          $objFile['filename']       = $fldName;
          $objFile['f_size']         = 0;
          $objFile['creatorid']      = 1;
          $objFile['parent']         = $objFolderID;
          $objFile['created']        = $cr_date;
          $objFile['description']    = $fldDesc;
          $objFile['metadata']       = '';
          $objFile['security']       = 0;
          $objFile['groupid']        = 0;
          $objFile['smodified']      = $cr_date;
          $objFile['checked_out']    = 0;
          $objFile['major_revision'] = 0;
          $objFile['minor_revision'] = 1;
          $objFile['url']            = '';
          $objFile['doctype']        = 0;
          $objFile['meta_object_id'] = $metaObject['id'];

          DBUtil::insertObject ($objFile, 'os_docmgmt_files', false);
          }
        else
         print "Unable to determine object folder ID for meta object $newPath";
    }


    /**
     * Retrieve the parent Folder for the specified meta object
     *
     * @param keyTable    The table key for the meta-object
     * @param parentKey    The parent key for the meta-object
     *
     * @return The resulting meta-object ID
     */
    function retrieveMetaObjectParentFolder ($keyTable, $parentKey)
    {
        // retrieve the parent meta folder
        $where = "obj_key_table = '$keyTable' AND obj_key_value = $parentKey";
        $parentMeta =& DocumentUtil::getMetaObject ($where);
        if (!$parentMeta)
          print ("Unable to locate parent Meta Object for [$key_table, $parentKey] in DocumentUtil::insertMetaObjectReference ...");

        // retrieve the parent meta object folder
        $parentMetaID = $parentMeta['id'];
        $where = "meta_object_id = $parentMetaID";
        $parentFolder =& DocumentUtil::getFolder ($where);
        if (!$parentFolder)
          print ("Unable to locate parent Folder for [$vipObject[id]] in DocumentUtil::insertMetaObjectReference ...");

        return $parentFolder;
    }


}
?>