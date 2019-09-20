<?php 
/**
 *  $Id: admin.php,v 1.1 2004/02/11 19:21:45 larsneo Exp $
 *
 *  PostCalendar::PostNuke Events Calendar Module
 *  Copyright (C) 2002  The PostCalendar Team
 *  http://pc.bahraini.tv
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

//=========================================================================
//  ok, here's the rest of the language defines
//=========================================================================

define('_PC_UPDATED',                   'Die PostCalendar-Konfiguration wurde aktualisiert.');
define('_PC_UPDATED_DEFAULTS',          'Die PostCalendar-Konfiguration wurde auf die Defaults zurückgesetzt');
define('_POSTCALENDAR',                 'PostCalendar-Administration');
define('_PC_ADMIN_GLOBAL_SETTINGS',     '<b>PostCalendar Allgemeine Einstellungen</b>');
define('_PC_ADMIN_CATEGORY_SETTINGS',   '<b>PostCalendar Kategorie Einstellungen</b>');
define('_PC_APPROVED_ADMIN',            'Administration Terminfreigabe');
define('_PC_HIDDEN_ADMIN',              'Administration Termine deaktivieren');
define('_PC_QUEUED_ADMIN',              'Administration eingereichte Termine');
define('_PC_NO_EVENT_SELECTED',         'Termin wählen');
define('_EDIT_PC_CONFIG_GLOBAL',        'Allgemeine Einstellungen');
define('_EDIT_PC_CONFIG_DEFAULT',       'Defaults benutzen');
define('_EDIT_PC_CONFIG_CATEGORIES',    'Kategorie Einstellungen');
define('_PC_CREATE_EVENT',              'neuen Termin anlegen');
define('_PC_VIEW_APPROVED',             'freigegebene Termine anzeigen');
define('_PC_VIEW_HIDDEN',               'inaktive Termine anzeigen');
define('_PC_VIEW_QUEUED',               'eingereichte Termine anzeigen');
define('_PC_SUBMISSION_ADMIN',          'Administration für eingereichte Termine');
define('_PC_NEW_SUBMISSIONS',           'Neue Termine');
define('_PC_NO_SUBMISSIONS',            'keine neuen Termine');
define('_PC_SUNDAY',                    'Sonntag');
define('_PC_MONDAY',                    'Montag');
define('_PC_SATURDAY',                  'Samstag');
define('_PC_ADMIN_SUBMIT',              'Änderungen speichern');
define('_PC_TIME24HOURS',               '24-Stunden-Zeitformat?');
define('_PC_TIME_INCREMENT',            'Zeitversatz bei neuen Terminen (1-60 Minuten)');
define('_PC_EVENTS_IN_NEW_WINDOW',      'Termine im Pop-Up-Fenster anzeigen?');
define('_PC_INTERNATIONAL_DATES',       'internationales Datumsformat?');
define('_PC_FIRST_DAY_OF_WEEK',         'erster Tag der Woche');
define('_PC_TIMES',                     'Zeit Array (N/A)');
define('_PC_DAY_HIGHLIGHT_COLOR',       'Highlight Farbe für aktuellen Tag');
define('_PC_USE_JS_POPUPS',             'Hoover-Effekte bei Mouse-Over?');
define('_PC_ALLOW_DIRECT_SUBMIT',       'Eingereichte Termine sofort aktiv?');
define('_PC_ALLOW_SITEWIDE_SUBMIT',     'Benutzern globale Termine erlauben?');
define('_PC_ALLOW_USER_CALENDAR',     	'Benutzern private Terminkalender erlauben?');
define('_PC_SHOW_EVENTS_IN_YEAR',       'Das Jahr mit Terminen füllen? <i>[nicht empfohlen]</i>');
define('_PC_NUM_COLS_IN_YEAR_VIEW',     'Anzahl der Spalten bei Jahresansicht.');
define('_PC_UPGRADE_TABLES',            'alte Termine einfügen?');
define('_PC_LIST_HOW_MANY',             'Anzahl der Termine auf Adminseiten?');
define('_PC_USE_CACHE',             	'Cache benutzen?');
define('_PC_CACHE_LIFETIME',            'Cache Zeitspanne (in Sekunden)');
define('_PC_DISPLAY_TOPICS',            'Topics benutzen?');
define('_PC_PERFORM_ACTION',            'Aktion ausführen');
define('_PC_ADMIN_ACTION_APPROVE',      'freigeben');
define('_PC_ADMIN_ACTION_HIDE',         'verstecken');
define('_PC_ADMIN_ACTION_DELETE',       'löschen');
define('_PC_ADMIN_ACTION_EDIT',         'editieren');
define('_PC_ADMIN_ACTION_VIEW',         'zeigen');
define('_PC_EVENTS',                    'Termine');
define('_PC_NO_EVENTS',                 'keine Termine');
define('_PC_APPROVE_ARE_YOU_SURE',      'diese Termine freigeben?');
define('_PC_HIDE_ARE_YOU_SURE',         'diese Termine verstecken?');
define('_PC_VIEW_ARE_YOU_SURE',         'diese Termine anzeigen?');
define('_PC_EDIT_ARE_YOU_SURE',         'diese Termine editieren?');
define('_PC_ADMIN_EVENTS_APPROVED',     'Termine wurden freigegeben.');
define('_PC_ADMIN_EVENTS_HIDDEN',       'Termine wurden versteckt.');
define('_PC_NEXT',                      'vor');
define('_PC_PREV',                      'zurück');
define('_PC_EVENT_DATE_FORMAT',         'Datumsformat <i>siehe php <a href="http://php.net/strftime">strftime</a> format</i>');
define('_PC_CAT_DELETE',                'löschen');
define('_PC_CAT_NAME',                  'Kategoriename');
define('_PC_CAT_DESC',                  'Kategoriebeschreibung');
define('_PC_CAT_COLOR',                 'Kategoriefarbe');
define('_PC_CAT_NEW',                   'neu =>');
define('_PC_ARE_YOU_SURE',              'wirklich fortfahren?');
define('_PC_DELETE_CATS',               'lösche Kategorien mit ID(s) : ');
define('_PC_ADD_CAT',                   'Kategorie hinzufügen: ');
define('_PC_MODIFY_CATS',               'Kategorie modifizieren.');
define('_PC_CATS_CONFIRM',              'JA!');
define('_PC_DEFAULT_TEMPLATE',          'Default Template');
define('_PC_DEFAULT_VIEW',          	'Default Terminansicht');
define('_PC_USE_SAFE_MODE',          	'läuft PHP im Safe Mode?');
define('_PC_CLEAR_CACHE',          		'Smarty Cache löschen');
define('_PC_CACHE_CLEARED',          	'Smarty Cache wurde gelöscht');
define('_PC_TEST_SYSTEM',          		'System testen');
define('_PC_SAFE_MODE_MESSAGE', 		'Option "'._PC_USE_SAFE_MODE.'" in den PostCalendar Einstellungen aktivieren!');
?>
