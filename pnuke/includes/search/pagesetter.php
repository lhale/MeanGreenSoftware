<?php
// $Id: pagesetter.php,v 1.3 2005/09/29 21:40:54 jornlind Exp $
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
// but WithOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// =======================================================================

require_once("modules/pagesetter/common.php");

$currentlang = pnUserGetLang();
include("modules/pagesetter/pnlang/$currentlang/userapi.php");


  // Inform PostNuke search framework of the functions this module uses
$search_modules[] = array( 'title'       => 'Pagesetter documents',
                           'func_search' => 'search_pagesetter',
                           'func_opt'    => 'search_pagesetter_opt'
                         );

  // Define a callback class suitable for PostNuke standard search
class PagesetterPNSearchCallback extends PagesetterSearchCallback
{
  var $count;
  var $startnum;
  var $limit;
  var $skip_hits;
  var $resultsarray;

  function PagesetterPNSearchCallback()
  {
    list($pagesetter_startnum, $pagesetter_limit) = pnVarCleanFromInput('pagesetter_startnum', 'pagesetter_limit');
	
    if (!isset($pagesetter_startnum) || !is_numeric($pagesetter_startnum))
      $pagesetter_startnum = 0;

    if (!isset($pagesetter_limit) || !is_numeric($pagesetter_limit))
      $pagesetter_limit = 10;
	
    $this->count = 0;  // total number of results
    $this->startnum = $pagesetter_startnum;  // first result to keep
    $this->skip_hits = 0;  // number of results already skipped
    $this->limit = $pagesetter_limit;  // number of results to keep
    $this->resultsarray = array();
  }


  function start()
  {
    list($pagesetter_startnum, $pagesetter_limit) = pnVarCleanFromInput('pagesetter_startnum', 'pagesetter_limit');
    if (!isset($pagesetter_startnum) || !is_numeric($pagesetter_startnum))
      $pagesetter_startnum = 0;

    if (!isset($pagesetter_limit) || !is_numeric($pagesetter_limit))
      $pagesetter_limit = 10;
	
    $this->count = 0;  // total number of results
    $this->startnum = $pagesetter_startnum;  // first result to keep
    $this->skip_hits = 0;  // number of results already skipped
    $this->limit = $pagesetter_limit;  // number of results to keep
    $this->resultsarray = array();
  }


  function found($tid, $pid, $pubTitle, $title, $url)
  {
  // check if we have to skip the first $startnum entries or not
    if( ($this->startnum > 0) && ($this->skip_hits < $this->startnum) ) {
      $this->skip_hits++;
    } else {
    // check if we have a limit and wether we have reached it or not
      if( ( ($this->limit > 0) && (count($this->resultsarray) < $this->limit) ) || ($this->limit==0) ) {
        $sresult['tid'] = $tid;
        $sresult['pid'] = $pid;
        $sresult['pubTitle'] = $pubTitle;
        $sresult['title'] = $title;
        $sresult['url'] = $url;
        $this->resultsarray[] = $sresult;
      }
    }

    ++$this->count;
  }


  function stop()
  {
  }
};


  // "Print" search form in advanced search
function search_pagesetter_opt()
{
  if(!pnModAPILoad('pagesetter', 'admin')) {
      return pagesetterErrorPage(__FILE__, __LINE__, 'Failed to load Pagesetter user API');
  }
  $pubtypes = pnModAPIFunc('pagesetter', 'admin', 'getPublicationTypes', array('getForGuppyDropdown' => true));
  $pnRender =& new pnRender('pagesetter');
  $pnRender->caching = false;
  $pnRender->assign('pubtypes', $pubtypes);
  return $pnRender->fetch('pagesetter_search_form.html'); 
}


  // Do the searching (or rather - let the API do it)
function search_pagesetter()
{
  list($query,
       $bool,
       $startnum,
       $total,
       $active_pagesetter,
       $pagesetter_startnum,
       $pagesetter_limit,
       $pubTypes) = pnVarCleanFromInput('q',
                                                 'bool',
                                                 'startnum',
                                                 'total',
                                                 'active_pagesetter',
                                                 'pagesetter_startnum',
                                                 'pagesetter_limit',
                                                 'pagesetter_pubtypes');

  if (empty($active_pagesetter))
    return;

  if (empty($query))
    return _PGSEARCHNONEFOUND . '<br>';

  if (!isset($pagesetter_startnum) || !is_numeric($pagesetter_startnum))
    $pagesetter_startnum = 0;

  if (!isset($pagesetter_limit) || !is_numeric($pagesetter_limit))
    $pagesetter_limit = 10;


  if (isset($total) && !is_numeric($total))
    unset($total);

  if (!pnModAPILoad('pagesetter', 'user'))
    return pagesetterErrorPage(__FILE__, __LINE__, 'Failed to load Pagesetter user API');

  $callback = new PagesetterPNSearchCallback;
  $ok = pnModAPIFunc( 'pagesetter',
                      'user',
                      'search',
                      array('query'    => $query,
                            'match'    => $bool,
                            'pubTypes' => $pubTypes,
                            'callback' => &$callback) );

  if (!$ok)
    return pagesetterErrorAPIGet();

  $pnr =& new pnRender('pagesetter');
  $pnr->caching = false;
  
  $pnr->assign('searchresults', $callback->resultsarray);
  $pnr->assign('items_count', $callback->count);
  $pnr->assign('perpage', $pagesetter_limit);
  $pnr->assign('startnum', $pagesetter_startnum);
  $pnr->assign('searchfor', urlencode($q));
  return $pnr->fetch('pagesetter_search_results.html');
}


?>
