<?php 
/**
 *  $Id: popup.php,v 1.1 2004/02/11 19:21:45 larsneo Exp $
 *
 *  PostCalendar::PostNuke Events Calendar Module
 *  Copyright (C) 2002  The PostCalendar Team
 *  http://www.alyousif.tv/cal
 *  
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *  
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 *  To read the license please read the docs/license.txt or visit
 *  http://www.gnu.org/copyleft/gpl.html
 *
 */
define('_CALVIEWEVENT','Detailansicht');
define('_CALEVENTDATEPREVIEW','Tag');
define('_CALSTARTTIME','Beginn');
define('_CALENDTIME','Ende');
define('_CALARTICLETEXT','Beschreibung');
define('_CALLOCATION','Ort');
define('_CONTTEL','Telefon');
define('_CONTNAME','Name');
define('_CONTEMAIL','E-Mail');
define('_CONTWEBSITE','Website');
define('_FEE','Kosten');
define('_CALPOSTEDBY','eingereicht von');
define('_CALPOSTEDON','veröffentlicht am');
define('_PC_AM','morgens');
define('_PC_PM','nachmittags');
if (!defined('_POSTCALENDARNOAUTH')) {
	define('_POSTCALENDARNOAUTH','keine Authorisierung für das Postcalendar Modul');
}
?>
