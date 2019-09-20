<?php 
/**
 * $Id: admin.php,v 1.1 2004/09/17 19:25:27 aboensis Exp $
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

define('_PNRENDER_DEBUG_SETTINGS',       'Debug-asetukset');
define('_PNRENDER_EXPOSE_TEMPLATE',      'Paljasta mallipohjatieto kommenteissa');

define('_PNRENDER_ADMIN',			     'pnRender ylläpito');

define('_PNRENDER_COMPILE_SETTINGS',     'Käännösasetukset');
define('_PNRENDER_COMPILE_CHECK',	     'Käännöstarkistus');
define('_PNRENDER_FORCE_COMPILE',	     'Pakota käännökseen');
define('_PNRENDER_CLEAR_COMPILED',	     'Poista käännetyt mallit');
define('_PNRENDER_COMPILED_CLEARED',	 'Käännetyt malllipohjat poistettu');

define('_PNRENDER_CACHE_SETTINGS',       'Välimuistiasetukset');
define('_PNRENDER_CACHE_ENABLE',         'Salli puskurointi');
define('_PNRENDER_CACHE_LIFETIME',       'Säilö sivuja välimuistissa');
define('_PNRENDER_CACHE_LIFETIME_UNIT',  'sekuntia');
define('_PNRENDER_CLEAR_CACHED',	     'Poista sivut välimuistista');
define('_PNRENDER_CACHE_CLEARED',	     'Välimuisti tyhjennetty');

define('_PNRENDER_CONFIG_UPDATED',	     'Asetukset päivitetty');
define('_PNRENDER_OK', 				     'Vahvista muutokset');

define('_PNRENDER_NOAUTH',			     'VIRHE: Sinulla ei ole oikeuksia muokata pnRender-toimintoja.');
?>