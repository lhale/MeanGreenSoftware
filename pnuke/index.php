<?php
// File: $Id: index.php,v 1.41 2005/05/13 12:51:40 landseer Exp $
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2001 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of this file: Francisco Burzi
// Purpose of this file: Directs to the start page as defined in config.php
// ----------------------------------------------------------------------

// include base api
include 'includes/pnAPI.php';

// start PN
pnInit();

// Get variables
// Note the op parameter is re-added here for gallery embedding
// this should be removed once gallery has been updated for better
// detection of postnuke - assuming this parameter exists is
// far from the best solution - markwest
list($module,
     $func,
     $name,
     $file,
     $type,
     $op) = pnVarCleanFromInput('module',
                                'func',
                                'name',
                                'file',
                                'type',
                                'op');

// V4B RNG: clear cm flag on empty module spec
if (empty($module) && empty($op)) {
    unset ($_SESSION['cm']);
}
// V4B RNG: clear cache
$v4bCache = pnVarCleanFromInput('v4bCache', '');
if ($v4bCache == 'reset') {
    unset ($_SESSION['v4bCache']);
}
// V4B RNG: profile
$v4bProf = pnVarCleanFromInput('v4bProfile');
if (!isset($v4bProf)) {
    $v4bProf = false;
}
if ($v4bProf) {
    $v4bPFile = pnVarCleanFromInput('v4bPFile');
    if (!$v4bPFile)
        $v4bPFile = 'openstar.prof';
    xdebug_start_profiling($v4bPFile);
}


// check requested module and set to start module if not present
if (empty($name) && empty($module)) {
    $module = pnConfigGetVar('startpage');
    $type = pnConfigGetVar('starttype');
    $func = pnConfigGetVar('startfunc');
    $funcargs = explode(',', pnConfigGetVar('startargs'));
    $arguments = array();
    foreach ($funcargs as $funcarg) {
        if (!empty($funcarg)) {
            $argument=explode('=', $funcarg);
            $arguments[$argument[0]] = $argument[1];
        }
    }
} elseif (empty($module) && !empty($name)) {
    $module = $name;
}

// get module information
$modinfo = pnModGetInfo(pnModGetIDFromName($module));

if ($type<>'init' && !pnModAvailable($modinfo['name'])) {
    // itevo, mna: set an appropriate http error message
    header("HTTP/1.0 404 Not Found");
    // /itevo;
    include ('header.php');
    echo 'Module <strong>' . pnVarPrepForDisplay($module) . '</strong> not available';
    include ('footer.php');
    if ($v4bProf) {
        xdebug_dump_function_profile();
        exit;
    }
}

if ($modinfo['type'] == 2 || $modinfo['type'] == 3)
{
    // New-new style of loading modules
    if (empty($type)) {
        $type = 'user';
    }
    if (empty($func)) {
        $func = 'main';
    }
    if (!isset($arguments)) {
        $arguments = array();
    }

    // we need to force the mod load if we want to call a modules interactive init
    // function because the modules is not active right now
    $force_modload = ($type=='init') ? true : false;
    // it should be $module not $name [class007]
    if (pnModLoad($modinfo['name'], $type, $force_modload)) {

        // V4B RNG Start
        global $v4bConfig;
        if ($v4bConfig['V4B_CONFIG_USE_TRANSACTIONS'])
        {
            $dbConn = pnDBGetConn(true);
            $dbConn->StartTrans();
        }
        // V4B RNG End

        // Run the function
        $return = pnModFunc($modinfo['name'], $type, $func, $arguments);

        // V4B RNG Start
        if ($v4bConfig['V4B_CONFIG_USE_TRANSACTIONS'])
        {
            if ($dbConn->HasFailedTrans())
                $return = 'Transaction failed ... rollback!<br>' . $return;
            $dbConn->CompleteTrans();
        }
        // V4B RNG End


    } else {
        $return = false;
    }
    // Sort out return of function.  Can be
    // true - finished
    // false - display error msg
    // text - return information
    if ($return !== true) {
        include_once('header.php');
        if ($return === false) {
            // Failed to load the module
            // itevo, mna: set an appropriate http error message
            header("HTTP/1.0 404 Not Found");
            // /itevo;
            echo 'Failed to load module <strong>' . pnVarPrepForDisplay($module) .'</strong> (at function: "<strong>'. pnVarPrepForDisplay($func).'</strong>")';
        } elseif (is_string($return) && strlen($return) > 1) {
            // Text
            echo $return;
        } elseif (is_array($return)) {
            $pnRender = new pnRender($modinfo['name']);
            $pnRender->assign($return);
            if (isset($return['template'])) {
                echo $pnRender->fetch($return['template']);
            } else {
                $modname = strtolower($modinfo['name']);
                $type = strtolower($type);
                $func = strtolower($func);
                echo $pnRender->fetch("{$modname}_{$type}_{$func}.htm");
            }
        } else {
            echo 'Function <em>' . pnVarPrepForDisplay($func) . '</em> in module <em>' . pnVarPrepForDisplay($module) .'</em> returned.';
        }
        include_once('footer.php');
    }
} else {
    // Old-old style of loading modules
    if (empty($file)) {
        $file = 'index';
    }
    define('LOADED_AS_MODULE', '1');
    // added for the module/system seperation [class007]
    if (file_exists('modules/' . pnVarPrepForOS($modinfo['directory']) . '/' . pnVarPrepForOS($file) . '.php')) {
        include 'modules/' . pnVarPrepForOS($modinfo['directory']) . '/' . pnVarPrepForOS($file) . '.php';
    } else {
        // Failed to load the module
        // itevo, mna: set an appropriate http error message
        header("HTTP/1.0 404 Not Found");
        // /itevo;
        include ('header.php');
        echo 'Failed to load module <strong>' . pnVarPrepForDisplay($modinfo['name']) . '</strong>';
        include ('footer.php');
    }
}

if ($v4bProf) {
    xdebug_dump_function_profile($v4bProf);
}

?>