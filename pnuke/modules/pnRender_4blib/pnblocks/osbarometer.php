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
 *  Based on the original OSBarometerBlock code, but rewritten from scratch
 *  Original Author of File: Robert Gasch
 *  Author Contact: RNG@open-star.org
 *  Purpose of File: Site Barometer Block
 *  Copyright: value4business GmbH
 *  ----------------------------------------------------------------------
 */

/*  ----------------------------------------------------------------------
 *  Note that this block (with everything enabled) has the potential to 
 *  execute a significant number of SQL statements. As such, we recommend 
 *  that you either make the block not gobally available (ie: only to a 
 *  subgroup of your users (such as admins)), or you only enable a small 
 *  subset of the available statistics.
 *
 *  In order to reduce the SQL load this block may generate on large 
 *  systems, a session-based caching mechanism has been introduced. You 
 *  should set the caching delay (in seconds) to the amount of time you 
 *  wish to re-use the already queried information. Once this has been 
 *  done, the cache can be flushed by passing the "v4bCacheClear=1" to 
 *  your page. 
 *  ----------------------------------------------------------------------
 */


global $osbarometer_settings;


function pnRender_osbarometerblock_init()
{
    pnSecAddSchema('pnRender::OSBarometerBlock', 'Block title::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'AddressBook::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'Calendar::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'Comments::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'Downloads::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'Eventia::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'FAQ::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'Comments::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'Helpdesk::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'News::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'Pagesetter::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'Photoshare::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'Service::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'Weblinks::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'v4bRbs::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'v4bProjects::');
    pnSecAddSchema('pnRender::OSBarometerBlock', 'Users::');
}


function pnRender_osbarometerblock_info ()
{
    return array(   'text_type'      => 'osbarometer',
		    'module'         => 'pnRender',
		    'text_type_long' => 'OpenStar Site Barometer Sideblock',
		    'allow_multiple' => true,
		    'form_content'   => false,
		    'form_refresh'   => false,
		    'show_preview'   => true);
}


function pnRender_osbarometerblock_display ($blockinfo) 
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', "$blockinfo[title]::", ACCESS_READ)) 
        return;

    // extract and assign the '|' delimeted settings
    global $osbarometer_settings;
    $osbarometer_settings = array();
    $settings = explode("|", $blockinfo['content']);
    foreach ($settings as $set)
    {
      $param = explode("=", $set);
      if ($param[0])
          $osbarometer_settings[$param[0]] = $param[1];
    }

    if (!$osbarometer_settings)
        return;

    $lang = pnSessionGetVar('lang');

    if (isset($_GET['v4bCacheClear']) && $_GET['v4bCacheClear'])
        unset ($_SESSION['v4bCache']['OSBarometer'][$lang]);
    else
    if (isset($_SESSION['v4bCache']['OSBarometer'][$lang]['time']) && 
        $_SESSION['v4bCache']['OSBarometer'][$lang]['time'])
    {
        $tNow   = date ('Y-m-d H:i:s');
        $tCache = $_SESSION['v4bCache']['OSBarometer'][$lang]['time'];
        $sNow   = strtotime($tNow);
        $sCache = strtotime($tCache);
        $sDiff  = $sNow - $sCache;

        if ($sDiff < $osbarometer_settings['cache'])
        {
            $blockinfo['content'] = $_SESSION['v4bCache']['OSBarometer'][$lang]['html'];
            themesideblock($blockinfo);
	    return;
        }
    }

    $html = '';
    $html .= '<table cellspacing="0" cellpadding="2" border="0">' . "\n";
    if ($osbarometer_settings['susr'])  $html .= pnRender_osbarometerblock_display_users ();
    if ($osbarometer_settings['snws'])	$html .= pnRender_osbarometerblock_display_news ();
    if ($osbarometer_settings['spgs'])	$html .= pnRender_osbarometerblock_display_pagesetter ();
    if ($osbarometer_settings['spho'])	$html .= pnRender_osbarometerblock_display_photoshare ();
    if ($osbarometer_settings['sevt'])	$html .= pnRender_osbarometerblock_display_events ();
    if ($osbarometer_settings['scmt'])  $html .= pnRender_osbarometerblock_display_comments ();
    if ($osbarometer_settings['sfrm'])	$html .= pnRender_osbarometerblock_display_forum ();
    if ($osbarometer_settings['sdld'])	$html .= pnRender_osbarometerblock_display_downloads ();
    if ($osbarometer_settings['swbl'])	$html .= pnRender_osbarometerblock_display_weblinks ();
    if ($osbarometer_settings['sfaq'])	$html .= pnRender_osbarometerblock_display_faq ();
    if ($osbarometer_settings['sadr'])	$html .= pnRender_osbarometerblock_display_addressbook ();
    if ($osbarometer_settings['scal'])	$html .= pnRender_osbarometerblock_display_calendar ();
    if ($osbarometer_settings['srbs'])	$html .= pnRender_osbarometerblock_display_v4bRbs ();
    if ($osbarometer_settings['sprj'])	$html .= pnRender_osbarometerblock_display_v4bProjects ();
    if ($osbarometer_settings['shlp'])	$html .= pnRender_osbarometerblock_display_helpdesk ();
    if ($osbarometer_settings['ssrv'])	$html .= pnRender_osbarometerblock_display_service ();
    $html .= '<tr><td colspan="2"><br /></td></tr>' . "\n";
    $html .= '</table>' . "\n";
    //$html .= '<br />';

    $_SESSION['v4bCache']['OSBarometer'][$lang]['time'] = date ('Y-m-d H:i:s');
    $_SESSION['v4bCache']['OSBarometer'][$lang]['html'] = $html;

    $blockinfo['content'] = $html;
    themesideblock($blockinfo);
}


function pnRender_osbarometerblock_display_addressbook ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'AddressBook::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('v4bAddressBook'))
        return;

    pnModDBInfoLoad ('v4bAddressBook');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $sql =  "SELECT COUNT(*) FROM $pntable[v4b_addressbook_company]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nCompany = (int)$res->fields[0] - 1;
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[v4b_addressbook_company_branch]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nBranch = (int)$res->fields[0] - 1;
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[v4b_addressbook_contact]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nAddress = (int)$res->fields[0];
    $res->Close();

    $url   = 'index.php?module=v4bAddressBook&amp;func=main';
    $img   = 'images/barometer/addressbook.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_ADDRESSBOOK, _OS_BAROMETER_ADDRESSBOOK_ALT,  
    					 	$nCompany, _OS_BAROMETER_ADDRESSBOOK_COMPANIES, 
						$nBranch, _OS_BAROMETER_ADDRESSBOOK_BRANCHES, 
						$nAddress, _OS_BAROMETER_ADDRESSBOOK_ADDRESSES); 
}


function pnRender_osbarometerblock_display_calendar ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'Calendar::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('PostCalendar'))
        return;

    pnModDBInfoLoad ('PostCalendar');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $sql =  "SELECT COUNT(*) FROM $pntable[postcalendar_categories]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nCats = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[postcalendar_events]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nEvents = (int)$res->fields[0];
    $res->Close();

    $url   = 'index.php?module=PostCalendar&amp;func=main';
    $img   = 'images/barometer/calendar.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_CALENDAR, _OS_BAROMETER_CALENDAR_ALT,  
    					 	$nCats, _OS_BAROMETER_CALENDAR_CATEGORIES,
    					 	$nEvents, _OS_BAROMETER_CALENDAR_COUNT);
}


function pnRender_osbarometerblock_display_comments ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'Comments::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('EZComments'))
        return;

    pnModDBInfoLoad ('EZComments');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $tab = $pntable['EZComments'];
    $col = $pntable['EZComments_column'];

    $sql =  "SELECT COUNT(*) FROM $tab";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nComments = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT DISTINCT COUNT($col[modname]) FROM $tab";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nModules = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT DISTINCT COUNT($col[objectid]) FROM $tab";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nObjects = (int)$res->fields[0];
    $res->Close();

    $url   = 'index.php?module=EZComments&amp;type=admin';
    $img   = 'images/barometer/comments.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_COMMENTS, _OS_BAROMETER_COMMENTS_ALT,  
						$nModules, _OS_BAROMETER_COMMENTS_MODULES, 
						$nObjects, _OS_BAROMETER_COMMENTS_OBJECTS,
    					 	$nComments, _OS_BAROMETER_COMMENTS_COUNT); 
}


function pnRender_osbarometerblock_display_downloads ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'Downloads::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('CmodsDownload'))
        return;

    pnModDBInfoLoad ('CmodsDownload');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $sql =  "SELECT COUNT(*) FROM $pntable[cmodsdownload_downloads]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $numDownloads = (int)$res->fields[0];
    $res->Close();

    $totalDownload = 0;
    $totalFilesize = 0;
    $totalHits     = 0;

    $sql =  "SELECT pn_lid, pn_filesize, pn_hits FROM $pntable[cmodsdownload_downloads]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    for (; !$res->EOF; $res->MoveNext())
    {
	list($lid, $filesize, $hits) = $res->fields;
        $totalFilesize  += $filesize;
        $totalHits      += $hits;
        $totalDownload  += $hits * $filesize;
    }
    $res->Close();

    $mb = 1024*1024;
    $gb = $mb*1024;
    $totalFilesizeMB = sprintf ("%01.2f",$totalFilesize/$mb);
    $totalDownloadGB = sprintf ("%01.2f",$totalDownload/$gb);

    $url = 'modules.php?op=modload&amp;name=CmodsDownload&amp;file=index';
    $img = 'images/barometer/downloads.gif';

    $html = pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_DOWNLOADS, _OS_BAROMETER_DOWNLOADS_ALT,  
    					 	$numDownloads, _OS_BAROMETER_DOWNLOADS_COUNT, 
						$totalHits, _OS_BAROMETER_DOWNLOADS_HITS); 

    $img = 'images/barometer/totalmb.gif';

    $html .= pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_DOWNLOADS_SIZE, _OS_BAROMETER_DOWNLOADS_SIZE_ALT,  
    					 	 $totalFilesizeMB, _OS_BAROMETER_DOWNLOADS_FILESIZE, 
						 $totalDownloadGB, _OS_BAROMETER_DOWNLOADS_TRAFFIC); 

    return $html;
}


function pnRender_osbarometerblock_display_events ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'Eventia::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('eventia'))
        return;

    pnModDBInfoLoad ('eventia');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $sql =  "SELECT COUNT(*) FROM $pntable[eventia]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nEvents = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[eventia_regs]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nRegs = (int)$res->fields[0];
    $res->Close();

    $url   = 'modules.php?op=modload&amp;name=FAQ';
    $url   = 'index.php?module=eventia&amp;func=main';
    $img   = 'images/barometer/eventia.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_EVENTS, _OS_BAROMETER_EVENTS_ALT,  
    					 	$nEvents, _OS_BAROMETER_EVENTS_COUNT, 
						$nRegs, _OS_BAROMETER_EVENTS_REGS); 
}


function pnRender_osbarometerblock_display_faq ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'FAQ::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('FAQ'))
        return;

    pnModDBInfoLoad ('FAQ');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $sql =  "SELECT COUNT(*) FROM $pntable[faqcategories]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nCategories = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[faqanswer]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nFAQs = (int)$res->fields[0];
    $res->Close();

    $url   = 'modules.php?op=modload&amp;name=FAQ';
    $img   = 'images/barometer/faq.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_FAQ, _OS_BAROMETER_FAQ_ALT,  
    					 	$nCategories, _OS_BAROMETER_FAQ_CATEGORIES, 
						$nFAQs, _OS_BAROMETER_FAQ_COUNT); 
}


function pnRender_osbarometerblock_display_forum ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'Forum::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('pnForum'))
        return;

    pnModDBInfoLoad ('pnForum');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $tab = $pntable['pnforum_posts'];
    $col = $pntable['pnforum_posts_column'];

    $sql =  "SELECT COUNT(*) FROM $pntable[pnforum_forums]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nForums = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[pnforum_topics]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nTopics = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[pnforum_posts]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nPosts = (int)$res->fields[0];
    $res->Close();

    $url   = 'index.php?module=pnForum&amp;func=main';
    $img   = 'images/barometer/forum.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_FORUM, _OS_BAROMETER_FORUM_ALT,  
    					 	$nForums, _OS_BAROMETER_FORUM_COUNT, 
						$nTopics, _OS_BAROMETER_FORUM_TOPICS, 
						$nPosts, _OS_BAROMETER_FORUM_POSTS);
}


function pnRender_osbarometerblock_display_helpdesk ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'Helpdesk::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('DQ_Helpdesk'))
        return;

    pnModDBInfoLoad ('DQ_Helpdesk');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $tab = $pntable['dqhelpdesk_tickets'];
    $col = $pntable['dqhelpdesk_tickets_column'];

    $sql =  "SELECT COUNT(*) FROM $tab";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nTickets = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $tab WHERE $col[ticket_closedby]=0";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nTicketsOpen = (int)$res->fields[0];
    $res->Close();

    $url   = 'index.php?module=DQ_Helpdesk&amp;func=main';
    $img   = 'images/barometer/helpdesk.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_HELPDESK, _OS_BAROMETER_HELPDESK_ALT,  
    					 	$nTickets, _OS_BAROMETER_HELPDESK_OPEN, 
						$nTicketsOpen, _OS_BAROMETER_HELPDESK_COUNT);
}


function pnRender_osbarometerblock_display_news ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'News::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('News'))
        return;

    pnModDBInfoLoad ('Topics');
    pnModDBInfoLoad ('News');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $sql =  "SELECT COUNT(*) FROM $pntable[topics]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nTopics = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[stories]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nNews = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT SUM(pn_counter) FROM $pntable[stories]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nHits = (int)$res->fields[0];
    $res->Close();

    $url   = 'modules.php?op=modload&amp;name=news&amp;file=index';
    $img   = 'images/barometer/news.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_NEWS, _OS_BAROMETER_NEWS_ALT,  
    					 	$nTopics, _OS_BAROMETER_NEWS_TOPICS, 
						$nNews, _OS_BAROMETER_NEWS_STORIES, 
						$nHits, _OS_BAROMETER_NEWS_HITS);
}


function pnRender_osbarometerblock_display_pagesetter ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'Pagesetter::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('pagesetter'))
        return;

    pnModDBInfoLoad ('pagesetter');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $pubTypes = array();
    $sql =  "SELECT pg_id FROM $pntable[pagesetter_pubtypes]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    for (; !$res->EOF; $res->MoveNext())
        $pubTypes[] = (int)$res->fields[0];
    $res->Close();

    $nPubTypes = count($pubTypes);
    $nPubs = 0;

    $prefix = pnConfigGetVar('prefix');
    foreach ($pubTypes as $pt)
    {
        $tab = $prefix . '_pagesetter_pubdata' . $pt;
        $sql =  "SELECT COUNT(*) FROM $tab WHERE pg_revision=1";
        $res =& $dbconn->Execute ($sql);
        if (!$res && !$_GET['osbarometerblock']=='debug') return;
        $nPubs += (int)$res->fields[0];
        $res->Close();
    }

    $sql =  "SELECT COUNT(*) FROM $pntable[pagesetter_revisions]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nRevs = (int)$res->fields[0];
    $res->Close();

    $url   = 'modules.php?op=modload&amp;name=news&amp;file=index';
    $img   = 'images/barometer/pagesetter.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_PGSETTER, _OS_BAROMETER_PGSETTER_ALT,  
    					 	$nPubTypes, _OS_BAROMETER_PGSETTER_TOPICS, 
						$nPubs, _OS_BAROMETER_PGSETTER_STORIES, 
						$nRevs, _OS_BAROMETER_PGSETTER_HITS);
}


function pnRender_osbarometerblock_display_photoshare ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'Photoshare::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('photoshare'))
        return;

    pnModDBInfoLoad ('photoshare');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $sql =  "SELECT COUNT(*) FROM $pntable[photoshare_folders]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nFolders = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[photoshare_images]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nImages = (int)$res->fields[0];
    $res->Close();

    $url   = 'index.php?module=photoshare&amp;func=main';
    $img   = 'images/barometer/photoshare.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_PHOTOSHARE, _OS_BAROMETER_PHOTOSHARE_ALT,  
    					 	$nFolders, _OS_BAROMETER_PHOTOSHARE_FOLDERS, 
						$nImages, _OS_BAROMETER_PHOTOSHARE_IMAGES);
}



function pnRender_osbarometerblock_display_service ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'Service::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('pnmantis'))
        return;

    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $sql =  'SELECT COUNT(*) FROM os_service_project_table';
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nProjects = (int)$res->fields[0];
    $res->Close();

    $sql =  'SELECT COUNT(*) FROM os_service_bug_table WHERE status < 90';
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nBugsOpen = (int)$res->fields[0];
    $res->Close();

    $sql =  'SELECT COUNT(*) FROM os_service_bug_table';
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nBugs = (int)$res->fields[0];
    $res->Close();

    $url   = 'index.php?module=pnmantis&amp;func=main';
    $img   = 'images/barometer/service.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_SERVICE, _OS_BAROMETER_SERVICE_ALT,  
    					 	$nProjects, _OS_BAROMETER_SERVICE_PROJECTS, 
						$nBugsOpen, _OS_BAROMETER_SERVICE_OPEN, 
						$nBugs, _OS_BAROMETER_SERVICE_COUNT);
}


function pnRender_osbarometerblock_display_weblinks ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'Weblinks::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('CmodsWebLinks'))
        return;

    pnModDBInfoLoad ('CmodsWebLinks');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $tab = $pntable['cmodsweblinks_links'];

    $sql =  "SELECT COUNT(*) FROM $tab";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nLinks = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT SUM(pn_hits) FROM $tab";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nHits = (int)$res->fields[0];
    $res->Close();

    $url  = 'modules.php?op=modload&amp;name=CmodsWeblinks&amp;file=index';
    $img  = 'images/barometer/weblinks.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_WEBLINKS, _OS_BAROMETER_WEBLINKS_ALT,  
    					 	$nLinks, _OS_BAROMETER_WEBLINKS_COUNT, $nHits, _OS_BAROMETER_WEBLINKS_HITS);
}


function pnRender_osbarometerblock_display_v4bRbs ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'v4bRbs::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('v4bRbs'))
        return;

    pnModDBInfoLoad ('v4bRbs');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $sql =  "SELECT COUNT(*) FROM $pntable[v4b_rbs_category]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nCats = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[v4b_rbs_resource]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nRes = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[v4b_rbs_entry]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nEntry = (int)$res->fields[0];
    $res->Close();

    $url = 'index.php?module=v4bRbs&amp;func=main';
    $img = 'images/barometer/projects.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_RBS, _OS_BAROMETER_RBS_ALT,  
    					 	$nCats, _OS_BAROMETER_RBS_CATEGORIES, 
						$nRes, _OS_BAROMETER_RBS_RESOURCES, 
						$nEntry, _OS_BAROMETER_RBS_COUNT);
}


function pnRender_osbarometerblock_display_v4bProjects ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'v4bProjects::', ACCESS_READ)) 
        return;

    if (!pnModAvailable('v4bProjects'))
        return;

    pnModDBInfoLoad ('v4bProjects');
    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $sql =  "SELECT COUNT(*) FROM $pntable[v4b_projects_project]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nProjects = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[v4b_projects_todo]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nTodos = (int)$res->fields[0];
    $res->Close();

    $sql =  "SELECT COUNT(*) FROM $pntable[v4b_projects_changelog]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nChangelog = (int)$res->fields[0];
    $res->Close();

    $url = 'index.php?module=v4bProjects&amp;func=main';
    $img = 'images/barometer/projects.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_PROJECTS, _OS_BAROMETER_PROJECTS_ALT,  
    					 	$nProjects, _OS_BAROMETER_PROJECTS_COUNT, 
						$nTodos, _OS_BAROMETER_PROJECTS_TODO, 
						$nChangelog, _OS_BAROMETER_PROJECTS_CHANGELOG);
}


function pnRender_osbarometerblock_display_users ()
{
    if (!pnSecAuthAction(0, 'OSBarometerBlock::', 'Users::', ACCESS_READ)) 
        return;

    $dbconn  =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    $sql =  "SELECT COUNT(*) FROM $pntable[users]";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nUsers = (int)$res->fields[0];
    $res->Close();

    $tab =  $pntable['session_info'];
    $col =& $pntable['session_info_column'];
    $activetime = time() - (pnConfigGetVar('secinactivemins') * 60);

    $sql = "SELECT COUNT(*) FROM $tab WHERE $col[lastused] > $activetime AND $col[uid]=0 GROUP BY $col[ipaddr]";
    $res =& $dbconn->Execute($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nGuests = (int)$res->fields[0];
    $res->Close();

    $sql = "SELECT DISTINCT COUNT(*) FROM $tab WHERE $col[lastused] > $activetime AND $col[uid]!=0";
    $res =& $dbconn->Execute ($sql);
    if (!$res && !$_GET['osbarometerblock']=='debug') return;
    $nOnline = (int)$res->fields[0];
    $res->Close();

    $url   = 'modules.php?op=modload&amp;name=Members_List&amp;file=index';
    $img   = 'images/barometer/users.gif';

    return pnRender_osbarometerblock_generate_entry ($img, $url, _OS_BAROMETER_USERS, _OS_BAROMETER_USERS_ALT,  
    					 	$nOnline, _OS_BAROMETER_USERS_ONLINE, 
						$nGuests, _OS_BAROMETER_USERS_GUESTS, 
						$nUsers, _OS_BAROMETER_USERS_COUNT);
}


function pnRender_osbarometerblock_generate_entry ($img, $url, $label, $label_alt, $value1, $label1, $value2=0, $label2=0, $value3=0, $label3=0)
{

    $pnRender =& new pnRender('pnRender');
    $pnRender->caching = false;
    $pnRender->assign ('img', $img);
    $pnRender->assign ('url', $url);
    $pnRender->assign ('label', $label);
    $pnRender->assign ('label_alt', $label_alt);
    $pnRender->assign ('value1', $value1);
    $pnRender->assign ('label1', $label1);
    $pnRender->assign ('value2', $value2);
    $pnRender->assign ('label2', $label2);
    $pnRender->assign ('value3', $value3);
    $pnRender->assign ('label3', $label3);

    return $pnRender->fetch ('osbarometer.html');
}


function pnRender_osbarometerblock_modify ($blockinfo)
{
    if (!empty($blockinfo['content']))
    {
        // extract and assign the '|' delimeted settings
        global $osbarometer_settings;
        $osbarometer_settings = array();
        $settings = explode("|", $blockinfo['content']);
        foreach ($settings as $set)
        {
          $param = explode("=", $set);
          if ($param[0])
              $osbarometer_settings[$param[0]] = $param[1];
        }
    } 
    else 
    {
        $osbarometer_settings['labels']= 0;
        $osbarometer_settings['cache']	= 300;
        $osbarometer_settings['susr'] 	= 1;
        $osbarometer_settings['sadr'] 	= 1;
        $osbarometer_settings['scal'] 	= 1;
        $osbarometer_settings['scmt'] 	= 1;
        $osbarometer_settings['sdld'] 	= 1;
        $osbarometer_settings['sevt'] 	= 1;
        $osbarometer_settings['sfaq'] 	= 1;
        $osbarometer_settings['sfrm'] 	= 1;
        $osbarometer_settings['snws'] 	= 1;
        $osbarometer_settings['sprj'] 	= 1;
        $osbarometer_settings['spgs'] 	= 1;
        $osbarometer_settings['spho'] 	= 1;
        $osbarometer_settings['srbs'] 	= 1;
        $osbarometer_settings['shlp']  = 1;
        $osbarometer_settings['ssrv'] 	= 1;
        $osbarometer_settings['swbl'] 	= 1;
    }

    $checked = ($osbarometer_settings['labels'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_LABELS . '</td>';
    $output .= '  <td><input type="checkbox" name="content[labels]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_CACHE_SECONDS . '</td>';
    $output .= '  <td><input type="input" name="content[cache]" class="pn-normal" value="'.$osbarometer_settings['cache'].'"></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['susr'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_USERS . '</td>';
    $output .= '  <td><input type="checkbox" name="content[susr]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['sadr'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_ADDRESSBOOK . '</td>';
    $output .= '  <td><input type="checkbox" name="content[sadr]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['scal'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_CALENDAR . '</td>';
    $output .= '  <td><input type="checkbox" name="content[scal]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['scmt'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_COMMENTS . '</td>';
    $output .= '  <td><input type="checkbox" name="content[scmt]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['sdld'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_DOWNLOADS . '</td>';
    $output .= '  <td><input type="checkbox" name="content[sdld]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['sevt'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_EVENTS . '</td>';
    $output .= '  <td><input type="checkbox" name="content[sevt]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['sfaq'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_FAQS . '</td>';
    $output .= '  <td><input type="checkbox" name="content[sfaq]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['sfrm'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_FORUM . '</td>';
    $output .= '  <td><input type="checkbox" name="content[sfrm]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['shlp'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_HELPDESK . '</td>';
    $output .= '  <td><input type="checkbox" name="content[shlp]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['snws'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_NEWS. '</td>';
    $output .= '  <td><input type="checkbox" name="content[snws]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['spgs'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_PAGESETTER . '</td>';
    $output .= '  <td><input type="checkbox" name="content[spgs]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['spho'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_PHOTOSHARE . '</td>';
    $output .= '  <td><input type="checkbox" name="content[spho]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['sprj'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_PROJECTS . '</td>';
    $output .= '  <td><input type="checkbox" name="content[sprj]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['srbs'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_RBS . '</td>';
    $output .= '  <td><input type="checkbox" name="content[srbs]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['ssrv'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_SERVICE. '</td>';
    $output .= '  <td><input type="checkbox" name="content[ssrv]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    $checked = ($osbarometer_settings['swbl'] ? ' checked ' : '');
    $output .= '<tr>';
    $output .= '  <td>' . _OS_BAROMETER_CONFIG_SHOW_WEBLINKS . '</td>';
    $output .= '  <td><input type="checkbox" name="content[swbl]" class="pn-normal"'.$checked.'></td>';
    $output .= '</tr>';
    return $output;
}


function pnRender_osbarometerblock_update($blockinfo) 
{
    unset ($_SESSION['v4bCache']['OSBarometer']);

    // have to do this crazyness here to fit the serialized
    // array into 254 characters (max column length)
    $vars =& $blockinfo['content'];
    $keys = array_keys($vars);
    $size = count($vars);
    $config = '';
    for ($i=0; $i<$size; $i++)
    {
        $key = $keys[$i];
        $val = $vars[$key];

        if ($val == 'on')
            $config .= "$key=1|";
        else
            $config .= "$key=$val|";
    }

    $blockinfo['content'] = $config;
    return $blockinfo;
}

?>