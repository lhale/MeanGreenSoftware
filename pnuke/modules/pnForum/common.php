<?php
/************************************************************************
 * pnForum - The Post-Nuke Module                                       *
 * ==============================                                       *
 *                                                                      *
 * Copyright (c) 2001-2004 by the pnForum Module Development Team       *
 * http://www.pnforum.de/                                               *
 ************************************************************************
 * Modified version of:                                                 *
 ************************************************************************
 * phpBB version 1.4                                                    *
 * begin                : Wed July 19 2000                              *
 * copyright            : (C) 2001 The phpBB Group                      *
 * email                : support@phpbb.com                             *
 ************************************************************************
 * License                                                              *
 ************************************************************************
 * This program is free software; you can redistribute it and/or modify *
 * it under the terms of the GNU General Public License as published by *
 * the Free Software Foundation; either version 2 of the License, or    *
 * (at your option) any later version.                                  *
 *                                                                      *
 * This program is distributed in the hope that it will be useful,      *
 * but WITHOUT ANY WARRANTY; without even the implied warranty of       *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        *
 * GNU General Public License for more details.                         *
 *                                                                      *
 * You should have received a copy of the GNU General Public License    *
 * along with this program; if not, write to the Free Software          *
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 *
 * USA                                                                  *
 ************************************************************************
 *
 * general functions
 * @version $Id: common.php,v 1.27 2005/11/11 08:51:50 landseer Exp $
 * @author Frank Schummertz
 * @copyright 2004 by Frank Schummertz
 * @package pnForum
 * @license GPL <http://www.gnu.org/licenses/gpl.html>
 * @link http://www.pnforum.de
 *
 ***********************************************************************/
/*
 * getforumerror
 *
 * retrieve a custom error message
 * @param error_type string The type of error. category, forum, system, etc
 * @param error_name string The name of the error.  auth_read,  auth_mod, someothertype, etc
 * @param error_id string The specific identifier for the error.  forum_id, cat_id, etc.  This will change depending on what error_type is set to.
 * @param default_msg string The message to display if a custom page can't be found
 * Example: getforumerror('auth_read', '2', 'category', _PNFORUM_NOAUTH_TOREAD);
 *          This would look for the file:
 *          pnForum/pntemplates/errors/category/LANG/pnforum_error_auth_read_2.html
 *          which would be the error message for someone who didn't have read
 *          access to the category with cat_id = 2;
 * The default is to look for a forum error, and if the forum doesn't have
 * a custom error message to look for the error message for the category.
 *
 * This is not limited strictly to forum and category errors though.  It can
 * easily be expanded in the future to accomodate any type by simply creating
 * the type folder: pnForum/pntemplates/errors/TYPE and placing the
 * type files in that directory.
 *
 * Language specific files should be placed in a language directory below the type directory.  The language directories follow the same naming convention as the pnlang subfolders.
 *
 * The default language files do not need to be placed in a language specific folder.  They can be placed directly in the 'errors/TYPE' folder.
 *
 * Search order:
 * 1) errors/type/lang/specificID
 * 2) errors/type/specificID
 * IF THE TYPE IS FORUM AND WE HAVEN'T FOUND IT YET CHECK THE CATEGORY
 * 3) errors/category/lang/categoryID
 * 4) errors/category/categoryID
 * 5) errors/type/generic
 *
 * Specific files should be named:
 * pnforum_error_TYPE_ID.html
 *
 * Generic files should be named:
 * pnforum_error_TYPE.html
 *
 * Examples:
 * pnforum_error_auth_overview_2.html (Can see forum 2 or category 2 depending on whether this file is placed in the errors/forum or errors/category directory)
 * pnforum_error_auth_read.html (Generic file to use when a specific file isn't available
 * pnforum_error_auth_mod.html  (same as previous)
 * pnforum_error_auth_admin.html (same as previous)
 *
 */
function getforumerror($error_name, $error_id=false, $error_type='forum', $default_msg=false)
{
	$modinfo = pnModGetInfo(pnModGetIDFromName('pnForum'));
//    $baseDir = realpath(pnModGetBaseDir('pnForum')) . '/pntemplates';
    $baseDir = realpath('modules/' . $modinfo['directory'] . '/pntemplates');
    $lang = pnUserGetLang();
    $error_path = 'errors/' . $error_type;
    $prefix = 'pnforum_error_';
    $error_type = strtolower($error_type);

    // create the specific filename
    $specific_error_file = $prefix . $error_name;
    $specific_error_file .= ($error_id) ? ('_' . $error_id) : '';
    $specific_error_file .= '.html';

    // create the generic filename
    $generic_error_file = $prefix . $error_name . '.html';

    $pnr =& new pnRender('pnForum');
    $pnr->caching = false;

    // start with a fresh array
    $test_array = array();

    // first we want the most detailed file.  This one is the exact error
    // message for the exact id number in the correct language
    array_push($test_array, $error_path . '/' . $lang . '/' . $specific_error_file);
    // we didn't find one for our desired language so lets check the
    // defaults that sit just outside the lang directory
    array_push($test_array, $error_path . '/' . $specific_error_file);

    // if this is a forum check then we need to check the categories too
    // in case the forum specific ones don't exist
    if (($error_type == 'forum') && (is_numeric($error_id))) {
        $cat_id = pnModAPIFunc('pnForum','user','get_forum_category', array('forum_id'=>$error_id));
        if ($cat_id) {
            // specific category and specific language
            array_push($test_array, 'errors/category/' . $lang . '/' . $prefix . $error_name . '_' . $cat_id . '.html');
            // specific category, default language
            array_push($test_array, 'errors/category/' . $prefix . $error_name . '_' . $cat_id . '.html');
        }
    }
    // this order is important.
    // we want to read the category errors before the default forum error.
    // the category error should be more specific to the chosen forum than
    // the generic forum error
    array_push($test_array, $error_path . '/' . $lang . '/' . $generic_error_file);
    array_push($test_array, $error_path . '/' . $generic_error_file);
    foreach ($test_array as $test) {
        if (file_exists($baseDir . '/' . $test) && is_readable($baseDir . '/' . $test)) {
            // grab the first one we find.
            // that's why the order above is important
            return $pnr->fetch($test);
        }
    }
    // we couldn't find a custom message, fall back to the passed in default
    if ($default_msg) {
        return $default_msg;
    }else {
        // ouch, no custom message and no default.
        return showforumerror('Error message not found', __FILE__, __LINE__);
    }
}

/*
 * showforumerror
 * display a simple error message showing $text
 *@param text string The error text
 */
function showforumerror($error_text, $file='', $line=0)
{
    // we need to load the languages
    // available
    pnModLangLoad('pnForum');

    $pnr =& new pnRender('pnForum');
    $pnr->caching = false;
    $pnr->assign( 'adminmail', pnConfigGetVar('adminmail') );
    $pnr->assign( 'error_text', $error_text );
    if(pnSecAuthAction(0, 'pnForum::', '::', ACCESS_ADMIN)) {
        $pnr->assign( 'file', $file);
        $pnr->assign( 'line', $line);
    }
    $output = $pnr->fetch('pnforum_errorpage.html');
    if(preg_match("/(api\.php|common\.php|pninit\.php)$/i", $file)<>0) {
        // __FILE__ ends with api.php or is common.php or pninit.php
        include_once('header.php');
        echo $output;
        include_once('footer.php');
        exit;
    }
    return $output;

}

/**
 * showforumsqlerror
 * if $sql is not empty then we show message and mail notififcation to site admin
 * if it is empty, then it is not an Error, but just warning and we just show message to a user.
 * No mail is generated
 * If current user is admin, then onscreen message also include additional debug information
 */
function showforumsqlerror($msg, $sql='', $mysql_errno='', $mysql_error='', $file='', $line)
{
	if(!empty($sql)) {
		// Sending notify e-mail for error
		$message = "Error occured\n\n";
		$message .= "SQL statement:\n" . $sql . "\n\n";
		$message .= "Database error number:\n" . $mysql_errno . "\n\n";
		$message .= "Database error message:\n" . $mysql_error . "\n\n";
		$message .= "Link: " . pnGetCurrentURL() . "\n\n";
		$message .= "HTTP_USER_AGENT:\n" . pnServerGetVar('HTTP_USER_AGENT') . "\n";
/*
    	$email_from = pnModGetVar('pnForum', 'email_from');
    	if ($email_from == '') {
    		// nothing in forumwide-settings, use PN adminmail
    		$email_from = pnConfigGetVar('adminmail');
    	}
    	$msg_From_Header = 'From: ' . pnConfigGetVar('sitename') . '<' . $email_from.">\n";
    	$modInfo = pnModGetInfo(pnModGetIDFromName('pnForum'));
    	$msg_XMailer_Header = 'X-Mailer: pnForum ' . $modVersion . "\n";
    	$msg_ContentType_Header = 'Content-Type: text/plain;';

    	$pnforum_default_charset = pnModGetVar('pnForum', 'default_lang');
    	if ($pnforum_default_charset != '') {
    		$msg_ContentType_Header .= ' charset=' . $pnforum_default_charset;
    	}
    	$msg_ContentType_Header .= "\n";
		$msg_To = pnConfigGetVar('adminmail');
		// set reply-to to his own adress ;)
		$msg_Headers = $msg_From_Header.$msg_XMailer_Header.$msg_ContentType_Header;
		$msg_Headers .= "Reply-To: $msg_To";
        $msg_Subject = 'sql error in your pnForum';
*/
//    	pnMail($msg_To, $msg_Subject, $posted_message, $msg_Headers);

    	$email_from = pnModGetVar('pnForum', 'email_from');
    	if ($email_from == '') {
    		// nothing in forumwide-settings, use PN adminmail
    		$email_from = pnConfigGetVar('adminmail');
    	}
		$email_to = pnConfigGetVar('adminmail');
        $subject = 'sql error in your pnForum';
        $modinfo = pnModGetInfo(pnModGetIDFromName(pnModGetName()));

        $args = array( 'fromname'    => pnConfigGetVar('sitename'),
                       'fromaddress' => $email_from,
                       'toname'      => $email_to,
                       'toaddress'   => $email_to,
                       'subject'     => $subject,
                       'body'        => $message,
                       'headers'     => array('X-Mailer: ' . $modinfo['name'] . ' ' . $modinfo['version']));
        pnModAPIFunc('Mailer', 'user', 'sendmessage', $args);





	}
    if(pnSecAuthAction(0, 'pnForum::', '::', ACCESS_ADMIN)) {
        return showforumerror( "$msg <br />
                                sql  : $sql <br />
                                code : $mysql_errno <br />
                                msg  : $mysql_error <br />", $file, $line );
    } else {
        return showforumerror( $msg, $file, $line );
    }
}

/**
 * internal debug function
 *
 */
function pnfdebug($name='', $data, $die = false)
{
    if(pnSecAuthAction(0, 'pnForum::', '::', ACCESS_ADMIN)) {
        $type = gettype($data);
        echo "\n<!-- begin debug of $name -->\n<div style=\"color: red;\">$name ($type";
        if(is_array($data)||is_object($data)) {
            $size = count($data);
            if($size>0) {
                echo ", size=$size entries):<pre>";
                echo htmlspecialchars(print_r($data, true));
                echo "</pre>:<br />";
            } else {
                echo "):empty<br />";
            }
        } else if(is_bool($data)) {
            echo ") ";
            echo ($data==true) ? "true<br />" : "false<br />";
        } else if(is_string($data)) {
            echo ", len=".strlen($data).") :$data:<br />";
        } else {
            echo ") :$data:<br />";
        }
        echo "</div><br />\n<!-- end debug of $name -->";
        if($die==true) {
            die();
        }
    }
}

/**
 * internal function
 *
 */
function pnfsqldebug($sql)
{
    pnfdebug('sql', $sql);
}

/**
 * pnfOpenDB
 * creates a dbconnection object and returns it to the calling function
 *
 *@params $table (string) name of the table you want to access, optional
 *@return array consisting:
 * if a tablename is given:
 *@returns object dbconn object for use to execute sql queries
 *@returns string fully qualified tablename
 *@returns array with field names
 * if no tablename is given:
 *@returns object dbconn object for use to execute sql queries
 *@returns array  pntable array
 *        or false on error
 */
function pnfOpenDB($tablename='')
{
	pnModDBInfoLoad('pnForum');
	$dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    if(!empty($tablename)) {
        $columnname = $tablename . '_column';
        if( !array_key_exists($tablename, $pntable) ||
            !array_key_exists($columnname, $pntable) ) {return false; }
        // table exists, now get the dbconnection object
        return array($dbconn, &$pntable[$tablename], &$pntable[$columnname]);
    } else {
        return array($dbconn, $pntable);
    }
}

/**
 * pnfCloseDB
 * closes an db connection opened with pnfOpenDB
 *
 *@params $resobj object as returned by $dbconn->Execute();
 *@returns nothing
 *
 */
function pnfCloseDB($resobj)
{
    if(is_object($resobj))
    {
        $resobj->Close();
    }
    return;
}

/**
 * pnfExecuteSQL
 * executes an sql command and returns the result, shows error if necessary
 *
 *@params $dbconn object db onnection object
 *@params $sql    string the sql ommand to execute
 *@params $debug  bool   true if debug should be activated, default is false
 *@params $file   string name of the calling file, important for error reporting
 *@params $line   int    line in the calling file, important for error reorting
 *@returns object the result of $dbconn->Execute($sql)
 */
function pnfExecuteSQL(&$dbconn, $sql, $file=__FILE__, $line=__LINE__, $debug=false)
{
    if(!is_object($dbconn) || !isset($sql) || empty($sql)) {
        return showforumerror(_MODARGSERROR, $file, $line);
    }
    if(pnSecAuthAction(0, 'pnForum::', '::', ACCESS_ADMIN)) {
        // only admins shall see the debug output
        $dbconn->debug = $debug;
    }
    $result = $dbconn->Execute($sql);
    $dbconn->debug = false;
    if($dbconn->ErrorNo() != 0) {
        return showforumsqlerror(_PNFORUM_ERROR_CONNECT,$sql,$dbconn->ErrorNo(),$dbconn->ErrorMsg(), $file, $line);
    }
    return $result;
}

/**
 * pnfAutoExecuteSQL
 * executes an sql command and returns the result, shows error if necessary
 *
 *@params $dbconn object db onnection object
 *@params $record array of fieldname -> value to INSERT or UPDATE
 *@params $where  string WHERE clause for INSERT
 *@params $debug  bool   true if debug should be activated, default is false
 *@params $file   string name of the calling file, important for error reporting
 *@params $line   int    line in the calling file, important for error reorting
 *@returns boolean the result of $dbconn->AutoExecute()
 */
function pnfAutoExecuteSQL(&$dbconn, $table=null, $record, $where='', $file=__FILE__, $line=__LINE__, $debug=false)
{
    if(!is_object($dbconn) || !isset($table) || empty($table) || !isset($record) || !is_array($record) || empty($record)) {
        return showforumerror(_MODARGSERROR, $file, $line);
    }
    if(pnSecAuthAction(0, 'pnForum::', '::', ACCESS_ADMIN)) {
        // only admins shall see the debug output
        $dbconn->debug = $debug;
    }

    $mode = (empty($where)) ? 'INSERT': 'UPDATE';

    $result = $dbconn->AutoExecute($table, $record, $mode, $where);
    $dbconn->debug = false;
    if($dbconn->ErrorNo() != 0) {
        return showforumsqlerror(_PNFORUM_ERROR_CONNECT, $dbconn->sql, $dbconn->ErrorNo(), $dbconn->ErrorMsg(), $file, $line);
    }
    return $result;
}

/**
 * pnfSelectLimit
 * executes an sql command and returns a part of the result, shows error if necessary
 *
 *@params $dbconn object db onnection object
 *@params $sql    string the sql ommand to execute
 *@params $limit  int    max number of lines to read
 *@params $start  int    number of lines to start reading
 *@params $file   string name of the calling file, important for error reporting
 *@params $line   int    line in the calling file, important for error reorting
 *@params $debug  bool   true if debug should be activated, default is false
 *@returns object the result of $dbconn->Execute($sql)
 */
function pnfSelectLimit(&$dbconn, $sql, $limit=0, $start=false, $file=__FILE__, $line=__LINE__, $debug=false)
{
    if(!is_object($dbconn) || !isset($sql) || empty($sql) || ($limit==0) ) {
        return showforumerror(_MODARGSERROR, $file, $line);
    }
    if(pnSecAuthAction(0, 'pnForum::', '::', ACCESS_ADMIN)) {
        // only admins shall see the debug output
        $dbconn->debug = $debug;
    }
    if( $start<>false && (is_numeric($start) && $start<>0 ) ){
        $result = $dbconn->SelectLimit($sql, $limit, $start);
    } else {
        $result = $dbconn->SelectLimit($sql, $limit);
    }
    $dbconn->debug = false;
    if($dbconn->ErrorNo() != 0) {
        return showforumsqlerror(_PNFORUM_ERROR_CONNECT,$sql,$dbconn->ErrorNo(),$dbconn->ErrorMsg(), $file, $line);
    }
    return $result;
}

/**
 * is_serialized
 * checks if a string is a serialized array
 *
 *@params $string the string to test
 *@returns boolean true or false
 *
 */
if(!function_exists('pnForum_is_serialized')) {
    function pnForum_is_serialized( $string ) {
        return @unserialize($string)!=='';
        /*
        if( @unserialize( $string ) == '' ) {
            return false;
        }
        return true;
        */
    }
}

/**
 * pn_bbdecode/pn_bbencode functions:
 * Rewritten - Nathan Codding - Aug 24, 2000
 * Using Perl-Compatible regexps now. Won't kill special chars
 * outside of a [code]...[/code] block now, and all BBCode tags
 * are implemented.
 * Note: the "i" matching switch is used, so BBCode tags are
 * case-insensitive.
 *
 * obsolete function - we have pn_bbcode
 *
 */

function pnForum_bbdecode($message)
{
    // Undo [code]
    $message = preg_replace("#<!-- BBCode Start --><TABLE BORDER=0 ALIGN=CENTER WIDTH=85%><TR><TD>Code:<HR></TD></TR><TR><TD><PRE>(.*?)</PRE></TD></TR><TR><TD><HR></TD></TR></TABLE><!-- BBCode End -->#s", "[code]\\1[/code]", $message);

    // Undo [quote]
    $message = preg_replace("#<!-- BBCode Quote Start --><TABLE BORDER=0 ALIGN=CENTER WIDTH=85%><TR><TD>Quote:<HR></TD></TR><TR><TD><BLOCKQUOTE>(.*?)</BLOCKQUOTE></TD></TR><TR><TD><HR></TD></TR></TABLE><!-- BBCode Quote End -->#s", "[quote]\\1[/quote]", $message);

    // Undo [b] and [i]
    $message = preg_replace("#<!-- BBCode Start --><strong>(.*?)</strong><!-- BBCode End -->#s", "[b]\\1[/b]", $message);
    $message = preg_replace("#<!-- BBCode Start --><I>(.*?)</I><!-- BBCode End -->#s", "[i]\\1[/i]", $message);

    // Undo [url] (both forms)
    $message = preg_replace("#<!-- BBCode Start --><A HREF=\"http://(.*?)\" TARGET=\"_blank\">(.*?)</A><!-- BBCode End -->#s", "[url=\\1]\\2[/url]", $message);

    // Undo [email]
    $message = preg_replace("#<!-- BBCode Start --><A HREF=\"mailto:(.*?)\">(.*?)</A><!-- BBCode End -->#s", "[email]\\1[/email]", $message);

    // Undo [img]
    $message = preg_replace("#<!-- BBCode Start --><IMG SRC=\"http://(.*?)\"><!-- BBCode End -->#s", "[img]http://\\1[/img]", $message);
    //$message = preg_replace("#<!-- BBCode Start --><IMG SRC=\"(.*?)\"><!-- BBCode End -->#s", "[img]\\1[/img]", $message);

    // Undo lists (unordered/ordered)

    // unordered list code..
    $matchCount = preg_match_all("#<!-- BBCode ulist Start --><UL>(.*?)</UL><!-- BBCode ulist End -->#s", $message, $matches);

    for ($i = 0; $i < $matchCount; $i++)
    {
    	$currMatchTextBefore = preg_quote($matches[1][$i]);
    	$currMatchTextAfter = preg_replace("#<LI>#s", "[*]", $matches[1][$i]);

    	$message = preg_replace("#<!-- BBCode ulist Start --><UL>$currMatchTextBefore</UL><!-- BBCode ulist End -->#s", "[list]" . $currMatchTextAfter . "[/list]", $message);
    }

    // ordered list code..
    $matchCount = preg_match_all("#<!-- BBCode olist Start --><OL TYPE=([A1])>(.*?)</OL><!-- BBCode olist End -->#si", $message, $matches);

    for ($i = 0; $i < $matchCount; $i++)
    {
    	$currMatchTextBefore = preg_quote($matches[2][$i]);
    	$currMatchTextAfter = preg_replace("#<LI>#s", "[*]", $matches[2][$i]);

    	$message = preg_replace("#<!-- BBCode olist Start --><OL TYPE=([A1])>$currMatchTextBefore</OL><!-- BBCode olist End -->#si", "[list=\\1]" . $currMatchTextAfter . "[/list]", $message);
    }

    return($message);
}


/**
 * Nathan Codding - Feb 6, 2001
 * Reverses the effects of make_clickable(), for use in editpost.
 * - Does not distinguish between "www.xxxx.yyyy" and "http://aaaa.bbbb" type URLs.
 *
 *
 * obsolete function - we have pn_bbclick
 */
function pnForum_undo_make_clickable($text)
{
	$text = preg_replace("#<!-- BBCode auto-link start --><a href=\"(.*?)\" target=\"_blank\">.*?</a><!-- BBCode auto-link end -->#i", "\\1", $text);
	$text = preg_replace("#<!-- BBcode auto-mailto start --><a href=\"mailto:(.*?)\">.*?</a><!-- BBCode auto-mailto end -->#i", "\\1", $text);
    return $text;
}

/**
 * removes instances of <br /> since sometimes they are stored in DB :(
 */
function phpbb_br2nl($str)
{
    return preg_replace("=<br(>|([\s/][^>]*)>)\r?\n?=i", "\n", $str);
}

/**
 * allowedtoseecategoryandforum
 */
function allowedtoseecategoryandforum($category_id, $forum_id)
{
    return pnSecAuthAction(0, 'pnForum::', $category_id . ':' . $forum_id . ':', ACCESS_OVERVIEW);
}

/**
 * allowedtoreadcategoryandforum
 */
function allowedtoreadcategoryandforum($category_id, $forum_id)
{
    return pnSecAuthAction(0, 'pnForum::', $category_id . ':' . $forum_id . ':', ACCESS_READ);
}

/**
 * allowedtowritetocategoryandforum
 */
function allowedtowritetocategoryandforum($category_id, $forum_id)
{
    return pnSecAuthAction(0, 'pnForum::', $category_id . ':' . $forum_id . ':', ACCESS_COMMENT);
}

/**
 * allowedtomoderatecategoryandforum
 */
function allowedtomoderatecategoryandforum($category_id, $forum_id)
{
    return pnSecAuthAction(0, 'pnForum::', $category_id . ':' . $forum_id . ':', ACCESS_MODERATE);
}

/**
 * allowedtoadmincategoryandforum
 */
function allowedtoadmincategoryandforum($category_id, $forum_id)
{
    return pnSecAuthAction(0, 'pnForum::', $category_id . ':' . $forum_id . ':', ACCESS_ADMIN);
}

/**
 * sorting categories by cat_order (this is a VARCHAR, so we need this function for sorting)
 *
 */
function cmp_catorder ($a, $b)
{
   return (int)$a['cat_order'] > (int)$b['cat_order'];
}

/**
 * pnForum_replacesignature
 *
 */
function pnForum_replacesignature($text, $signature='')
{
    $removesignature = pnModGetVar('pnForum', 'removesignature');
    if($removesignature == 'yes') {
        $signature = '';
    }
    if (!empty($signature)){
        $sigstart = stripslashes(pnModGetVar('pnForum', 'signature_start'));
        $sigend   = stripslashes(pnModGetVar('pnForum', 'signature_end'));
        $text = eregi_replace("\[addsig]$", "\n\n" . $sigstart . $signature . $sigend, $text);
    } else {
        $text = eregi_replace("\[addsig]$", '', $text);
    }
    return $text;
}

/**
 * mailcronecho
 *
 */
function mailcronecho($text)
{
    if(pnSessionGetVar('mailcronrunning')==true) {
        echo $text;
        if(pnSessionGetVar('mailcrondebug')==true) {
            echo '<br />';
        }
        flush();
    }
    return;
}

/**
 * pnfVarPrepHTMLDisplay
 * removes the  [code]...[/code] before really calling pnVarPrepHTMLDisplay()
 *
 */
function pnfVarPrepHTMLDisplay($text)
{
    // remove code tags
    $codecount1 = preg_match_all("/\[code(.*)\](.*)\[\/code\]/si", $text, $codes1);
    for($i=0; $i < $codecount1; $i++) {
        $text = preg_replace('/(' . preg_quote($codes1[0][$i], '/') . ')/', " PNFORUMCODEREPLACEMENT{$i} ", $text, 1);
    }
    // the real work
    $text = pnVarPrepHTMLDisplay($text);
    // re-insert code tags
    for ($i = 0; $i < $codecount1; $i++) {
        $text = preg_replace("/ PNFORUMCODEREPLACEMENT{$i} /", $codes1[0][$i], $text, 1);
    }
    return $text;
}

/**
 * microtime_float
 * used for debug purposes only
 *
 */
if(!function_exists('microtime_float')) {
function microtime_float()
{
    list($usec, $sec) = explode(' ', microtime());
    return ((float)$usec + (float)$sec);
}
}

/**
 * useragent_is_bot
 * check if the useragent is a bot (blacklisted)
 *
 * returns bool
 *
 */
function useragent_is_bot()
{
    // check the user agent - if it is a bot, return immediately
    $robotslist = array ( 'ia_archiver',
                          'googlebot',
                          'mediapartners-google',
                          'yahoo!',
                          'msnbot',
                          'jeeves',
                          'lycos');
    $useragent = pnServerGetVar('HTTP_USER_AGENT');
    for($cnt=0; $cnt < count($robotslist); $cnt++) {
        if(strpos(strtolower($useragent), $robotslist[$cnt]) !== false) {
            return true;
        }
    }
    return false;
}

/**
 * �nf_getimagepath
 *
 * gets an path for a image - this is a copy of the pnimh logic
 *
 *@params $image string the imagefile name
 *@returns an array of information for the imagefile:
 *         ['path']   string the path to the imagefile
 *         ['size']   string 'width="xx" height="yy"' as delivered by getimagesize, may be empty
 * or false on error
 */
function pnf_getimagepath($image=null)
{
    if(!isset($image)) {
        return false;
    }

    $result = array();

    // module
    $modname = pnModGetName();

    // language
    $lang =  pnVarPrepForOS(pnUserGetLang());

    // theme directory
    $theme         = pnVarPrepForOS(pnUserGetTheme());
    $osmodname     = pnVarPrepForOS($modname);
    $cWhereIsPerso = WHERE_IS_PERSO;
    if (!(empty($cWhereIsPerso))) {
    	$themelangpath = $cWhereIsPerso . "themes/$theme/templates/modules/$osmodname/images/$lang";
    	$themepath     = $cWhereIsPerso . "themes/$theme/templates/modules/$osmodname/images";
    	$corethemepath = $cWhereIsPerso . "themes/$theme/images";
    } else {
        $themelangpath = "themes/$theme/templates/modules/$osmodname/images/$lang";
    	$themepath     = "themes/$theme/templates/modules/$osmodname/images";
    	$corethemepath = "themes/$theme/images";
    }
    // module directory
    $modinfo       = pnModGetInfo(pnModGetIDFromName($modname));
    $osmoddir      = pnVarPrepForOS($modinfo['directory']);
	$modlangpath   = "modules/$osmoddir/pnimages/$lang";
	$modpath       = "modules/$osmoddir/pnimages";
	$syslangpath   = "system/$osmoddir/pnimages/$lang";
	$syspath       = "system/$osmoddir/pnimages";

    $ossrc = pnVarPrepForOS($image);

    // search for the image
    foreach (array($themelangpath,
				   $themepath,
				   $corethemepath,
				   $modlangpath,
				   $modpath,
				   $syslangpath,
				   $syspath) as $path) {
     	if (file_exists("$path/$ossrc") && is_readable("$path/$ossrc")) {
    		$result['path'] = "$path/$ossrc";
		break;
    	}
    }

    if ($result['path'] == '') {
	    return false;
    }

    if(!$_image_data = @getimagesize($result['path'])) {
        // invalid image
        $result['size']  = '';
    } else {
        $result['size']  = $_image_data[3];
    }

    return $result;
}

/**
 * pnfstriptags
 * strip all thml tags outside of [code][/code]
 *
 *@params  $text     string the text
 *@returns string    the sanitized text
 */
function pnfstriptags($text='')
{
    if(empty($text)) {
        return $text;
    }

    if(pnModGetVar('pnForum', 'striptags') == 'yes') {
        // save code tags
        $codecount = preg_match_all("/\[code(.*)\](.*)\[\/code\]/siU", $text, $codes);
        for($i=0; $i < $codecount; $i++) {
            $text = preg_replace('/(' . preg_quote($codes[0][$i], '/') . ')/', " PNFSTREPLACEMENT{$i} ", $text, 1);
        }

        // strip all html
        $text = strip_tags($text);

        // replace code tags saved before
        for ($i = 0; $i < $codecount; $i++) {
            $text = preg_replace("/ PNFSTREPLACEMENT{$i} /", $codes[0][$i], $text, 1);
        }
    }
    return $text;
}

/**
 * see if a user is authorised to carry out a particular task
 * @public
 * @param realm the realm under test
 * @param component the component under test
 * @param instance the instance under test
 * @param level the level of access required
 * @return bool true if authorised, false if not
 */
function pnfSecAuthAction($testrealm, $testcomponent, $testinstance, $testlevel, $testuser=null)
{
    static $userperms, $groupperms;

    if(!isset($userperms) || !isset($groupperms)) {
        $userperms  = array();
        $groupperms = array();
    }

    if(!isset($testuser)) {
        $testuser = pnUserGetVar('uid');
    }

    if (!isset($GLOBALS['pnfauthinfogathered'][$testuser]) || (int)$GLOBALS['pnfauthinfogathered'][$testuser] == 0) {
        // First time here - get auth info
        list($userperms[$testuser], $groupperms[$testuser]) = pnfSecGetAuthInfo($testuser);

        if ((count($userperms[$testuser]) == 0) &&
            (count($groupperms[$testuser]) == 0)) {
                // No permissions
                return;
        }
    }

    // Get user access level
    $userlevel = pnSecGetLevel($userperms[$testuser], $testrealm, $testcomponent, $testinstance);

    // User access level is override, so return that if it exists
    if ($userlevel > ACCESS_INVALID) {
        // user has explicitly defined access level for this
        // realm/component/instance combination
		return $userlevel >= $testlevel;
    }

	return pnSecGetLevel($groupperms[$testuser], $testrealm, $testcomponent, $testinstance) >= $testlevel;
}

/**
 * get authorisation information for this user
 *
 * @public
 * @return array two element array of user and group permissions
 */
function pnfSecGetAuthInfo($testuser=null)
{
    // Load the groups db info
	pnModDBInfoLoad('Groups', 'Groups');
	pnModDBInfoLoad('Permissions', 'Permissions');

    $dbconn =& pnDBGetConn(true);
    $pntable =& pnDBGetTables();

    // Tables we use
    $userpermtable = $pntable['user_perms'];
    $userpermcolumn = &$pntable['user_perms_column'];

    $groupmembershiptable = $pntable['group_membership'];
    $groupmembershipcolumn = &$pntable['group_membership_column'];

    $grouppermtable = $pntable['group_perms'];
    $grouppermcolumn = &$pntable['group_perms_column'];

    $realmtable = $pntable['realms'];
    $realmcolumn = &$pntable['realms_column'];

    // Empty arrays
    $userperms = array();
    $groupperms = array();

    $uids[] = -1;
    // Get user ID
    if(!isset($testuser)) {
        if (!pnUserLoggedIn()) {
            // Unregistered UID
            $uids[] = 0;
            $vars['Active User'] = 'unregistered';
        } else {
            $uids[] = pnUserGetVar('uid');
            $vars['Active User'] = pnUserGetVar('uid');
        }
    } else {
        $uids[] = $testuser;
        $vars['Active User'] = $testuser;
    }

    $uids = implode(",", $uids);

    // Get user permissions
    $query = "SELECT $userpermcolumn[realm],
                     $userpermcolumn[component],
                     $userpermcolumn[instance],
                     $userpermcolumn[level]
              FROM $userpermtable
              WHERE $userpermcolumn[uid] IN (" . pnVarPrepForStore($uids) . ")
              ORDER by $userpermcolumn[sequence]";
    $result =& $dbconn->Execute($query);

    if ($dbconn->ErrorNo() != 0) {
        return array($userperms, $groupperms);
    }

	while (list($realm, $component, $instance, $level) = $result->fields) {
        $result->MoveNext();
		//itevo
		$component = fixsecuritystring($component);
		$instance = fixsecuritystring($instance);
        $userperms[] = array('realm'     => $realm,
                             'component' => $component,
                             'instance'  => $instance,
                             'level'     => $level);
    }

    // Get all groups that user is in
    $query = "SELECT $groupmembershipcolumn[gid]
              FROM $groupmembershiptable
              WHERE $groupmembershipcolumn[uid] IN (" . pnVarPrepForStore($uids) . ")";

    $result =& $dbconn->Execute($query);

    if ($dbconn->ErrorNo() != 0) {
        return array($userperms, $groupperms);
    }

    $usergroups[] = -1;
    if (!pnUserLoggedIn()) {
        // Unregistered GID
        $usergroups[] = 0;
    }
	while (list($gid) = $result->fields) {
        $result->MoveNext();
        $usergroups[] = $gid;
    }
    $usergroups = implode(",", $usergroups);

    // Get all group permissions
    $query = "SELECT $grouppermcolumn[realm],
                     $grouppermcolumn[component],
                     $grouppermcolumn[instance],
                     $grouppermcolumn[level]
              FROM $grouppermtable
              WHERE $grouppermcolumn[gid] IN (" . pnVarPrepForStore($usergroups) . ")
              ORDER by $grouppermcolumn[sequence]";
    $result =& $dbconn->Execute($query);

    if ($dbconn->ErrorNo() != 0) {
        return array($userperms, $groupperms);
    }

    while(list($realm, $component, $instance, $level) = $result->fields) {
        $result->MoveNext();
		//itevo
		$component = fixsecuritystring($component);
		$instance = fixsecuritystring($instance);
        // Search/replace of special names
		preg_match_all("/<([^>]+)>/", $instance, $res);
		for($i = 0; $i < count($res[1]); $i++) {
			$instance = preg_replace("/<([^>]+)>/", $vars[$res[1][$i]], $instance, 1);
		}
        $groupperms[] = array('realm'     => $realm,
                              'component' => $component,
                              'instance'  => $instance,
                              'level'     => $level);
    }

	// we've now got the permissions info
	$GLOBALS['pnfauthinfogathered'][$testuser] = 1;

    return array($userperms, $groupperms);
}

/**
 * array_csort implementation
 *
 */
if (!function_exists('array_csort')) {
    function array_csort() {  //coded by Ichier2003 found on php.net (watch out the eval).
       $args = func_get_args();
       $marray = array_shift($args);

       $msortline = "return(array_multisort(";
       foreach ($args as $arg) {
           $i++;
           if (is_string($arg)) {
               foreach ($marray as $row) {
                   $sortarr[$i][] = $row[$arg];
               }
           } else {
               $sortarr[$i] = $arg;
           }
           $msortline .= "\$sortarr[".$i."],";
       }
       $msortline .= "\$marray));";

       eval($msortline);
       return $marray;
    }
}

?>