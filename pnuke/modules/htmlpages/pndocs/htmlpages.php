<?php
/**
 * PostNuke Application Framework
 *
 * @copyright (c) 2004, PostNuke Development Team
 * @link http://www.postnuke.com
 * @version $Id: htmlpages.php 30 2007-11-20 09:04:36Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Andrea Moro
 * @author Mark West
 * @author adam_baum
 * @author Kevin McCann
 * @package PostNuke_3rdParty_Modules
 * @subpackage htmlpages
 */

$search_modules[] = array(
    'title' => 'HTMLPAGES',
    'func_search' => 'search_htmlpages',
    'func_opt' => 'search_htmlpages_opt'
);

function search_htmlpages_opt() 
{
    // load the language file
    pnModLangLoad('htmlpages', 'search');

    if (pnSecAuthAction(0, 'htmlpages::', '::', ACCESS_READ)) {
        $pnRender = new pnRender('htmlpages');
        return $pnRender->fetch('htmlpages_search_options.htm');
    }
}

function search_htmlpages() {

    list($q,
         $bool,
         $startnum,
         $total,
         $active_htmlpages) = pnVarCleanFromInput('q',
                                             'bool',
                                             'startnum',
                                             'total',
                                             'active_htmlpages');

    if (empty($active_htmlpages)) {
        return;
    }

    // load the language file
    pnModLangLoad('htmlpages', 'search');

	// load db tables
    pnModDBInfoLoad('htmlpages');

	// get database connection
    $dbconn = pnDBGetConn(true);
    $pntable = pnDBGetTables();

    if (!isset($startnum)) {
        $startnum = 1;
    }

    $w = search_split_query($q);
    $flag = false;
    $column = &$pntable['htmlpages_column'];
    $query = "SELECT $column[pid] as pid, $column[uid] as uid, $column[title] as title, $column[content] as content, $column[timest] as timest 
              FROM $pntable[htmlpages] 
              WHERE \n";
    foreach($w as $word) {
        if($flag) {
            switch($bool) {
                case 'AND' :
                    $query .= ' AND ';
                    break;
                case 'OR' :
                default :
                    $query .= ' OR ';
                    break;
            }
        }
        $query .= '(';
        // faqs
        $query .= "$column[title] LIKE '$word' OR \n";
        $query .= "$column[content] LIKE '$word'\n";
        $query .= ')';
        $flag = true;
    }

    $query .= " ORDER BY $column[pid]";

    if (empty($total)) {
        $countres =& $dbconn->Execute($query);
        $total = $countres->PO_RecordCount();
        $countres->Close();
    }
    $result = $dbconn->SelectLimit($query, 1, $startnum-1);


    $items = array();
    if (!$result->EOF) {
        $pnRender = new pnRender('htmlpages');
        $pnRender->assign('total', $total);
        while(!$result->EOF) {
            $items[] = $result->GetRowAssoc(false);
            $result->MoveNext();
        }
        $pnRender->assign('items', $items);
        // Munge URL for template
        $urltemplate = "index.php?name=Search&amp;action=search&amp;active_htmlpages=1&amp;bool=$bool&amp;q=$q&amp;startnum=%%&amp;total=$total";
        $output = new pnHTML();
        $output->Pager($startnum, $total, $urltemplate, 1);
        $pnRender->assign('pager', $output->GetOutput());
        return $pnRender->fetch('htmlpages_search.htm');
    } else {
        return('<p>'._SEARCH_NO_HTMLPAGES.'</p>');
    }
}
