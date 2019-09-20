<?php
// File: admin.php 03.09.04
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the Post-Nuke Development Team.
// http://www.postnuke.com/
// Based on ... License ... You know the drill.
// ----------------------------------------------------------------------
//
// Purpose of file: Language Definitions for pnRender module
// ----------------------------------------------------------------------
//
// Please include your name and an e-mail where you may be contacted if further help is needed.
//
//  Translator: Kim Enemark
//  E-mail: kimenemark@postnuke.dk
//  Translationtool: Nubel 0.31a (http://canvas.anubix.net)
// ----------------------------------------------------------------------

/**
 * $Id: admin.php,v 1.6 2004/06/25 09:43:53 landseer Exp $
 * 
 * * pnRender *
 * 
 * PostNuke wrapper class for Smarty
 * 
 * * License *
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU GENERAL PUBLIC LICENSE (GPL)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * @author      PostNuke development team 
 * @version     .7/.8
 * @link        http://www.post-nuke.net              PostNuke home page
 * @link        http://smarty.php.net                 Smarty home page
       * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
   * @package     Xanthia_Templating_Environment
 * @subpackage  pnRender
 */

define('_PNRENDER_DEBUG_SETTINGS','DEBUG indstillinger');
define('_PNRENDER_EXPOSE_TEMPLATE','Vis skabelon informationer i kommentarer');

define('_PNRENDER_ADMIN','pnRender administration');

define('_PNRENDER_COMPILE_SETTINGS','Kompiler indstillinger');
define('_PNRENDER_COMPILE_CHECK','Kompiler kontrol');
define('_PNRENDER_FORCE_COMPILE','Gennemtving kompilering');
define('_PNRENDER_CLEAR_COMPILED','Slet kompilerede skabeloner');
define('_PNRENDER_COMPILED_CLEARED','Kompilerede skabeloner er slettet');

define('_PNRENDER_CACHE_SETTINGS','Cache indstillinger');
define('_PNRENDER_CACHE_ENABLE','Aktiver cache');
define('_PNRENDER_CACHE_LIFETIME','Levetid for cachede sider');
define('_PNRENDER_CACHE_LIFETIME_UNIT','sekunder');
define('_PNRENDER_CLEAR_CACHED','Slet cachede sider');
define('_PNRENDER_CACHE_CLEARED','Cache er slettet');

define('_PNRENDER_CONFIG_UPDATED','Indstillinger er opdateret');
define('_PNRENDER_OK','Bekræft ændringer');

define('_PNRENDER_NOAUTH','Beklager! Du har ikke rettigheder til at administrere pnRender');
?>