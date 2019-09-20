<?php
/**
 *  $Id: global.php,v 1.2 2004/02/12 21:02:41 larsneo Exp $
 *
 *  PostCalendar::PostNuke Events Calendar Module
 *  Copyright (C) 2002  The PostCalendar Team
 *  http://postcalendar.tv
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
//  The following define is necessary for the date and time functions
//  set it to the locale for this language
//
// 	PLEASE CHECK IF YOU NEED THE UNIX-STYLE OR THE WINDOWS STYLE!
//
//=========================================================================

define('_PC_LOCALE','de_DE'); // unix-style
// define('_PC_LOCALE','German_Germany'); // windows style


//=========================================================================
//  Defines used in all files
//=========================================================================
// new in 3.9.9
define('_PC_NOTIFY_ADMIN',				'Admin über neue Einträge/Änderungen per Mail informieren?');
define('_PC_NOTIFY_EMAIL',				'Admin E-Mail-Addresse');
define('_PC_NOTIFY_UPDATE_MSG', 		"Der folgende Termin wurde modifiziert:\n\n");
define('_PC_NOTIFY_NEW_MSG', 			"Der folgende Termin wurde neu hinzugefägt:\n\n");
define('_PC_NOTIFY_SUBJECT', 			'ANMERKUNG:: PostCalendar Termineintrag/-änderung');
//...
define('_POSTCALENDARNOAUTH',			'keine Authorisierung für den PostCalendar');
define('_POSTCALENDAR_NOAUTH',			'keine Authorisierung für den PostCalendar');
define('_PC_CAN_NOT_EDIT',				'keine Authorisierung, den Termin zu editieren');
define('_PC_CAN_NOT_DELETE',			'keine Authorisierung, den Termin zu löschen');
define('_PC_DELETE_ARE_YOU_SURE',       'wirklich diesen Termin löschen?');
define('_PC_ADMIN_YES',       			'Ja');
define('_PC_FILTER_USERS',				'Default/alle');
define('_PC_FILTER_USERS_ALL',			'alle Benutzer');
define('_PC_FILTER_CATEGORY',			'alle Kategorien');
define('_PC_FILTER_TOPIC',				'alle Topics');
define('_USER_BUSY_TITLE',				'beschäftigt');
define('_USER_BUSY_MESSAGE',			'während dieser Zeit beschäftigt');
define('_PC_JUMP_MENU_SUBMIT',  		'go');
define('_PC_TPL_VIEW_SUBMIT', 			'wechsel');
define('_PC_SUBMIT_TEXT', 				'Text (mit erlaubtem HTML)');
define('_PC_SUBMIT_HTML', 				'HTML (vorformatiert)');
define('_CALJAN',           			'Januar');
define('_CALFEB',           			'Februar');
define('_CALMAR',           			'März');
define('_CALAPR',           			'April');
define('_CALMAY',           			'Mai');
define('_CALJUN',           			'Juni');
define('_CALJUL',           			'Juli');
define('_CALAUG',           			'August');
define('_CALSEP',          			 	'September');
define('_CALOCT',           			'Oktober');
define('_CALNOV',           			'November');
define('_CALDEC',           			'Dezember');
define('_CALPREVIOUS',      			'zurück');
define('_CALNEXT',          			'vor');
define('_CALLONGFIRSTDAY',  			'Sonntag');
define('_CALLONGSECONDDAY', 			'Montag');
define('_CALLONGTHIRDDAY',  			'Dienstag');
define('_CALLONGFOURTHDAY', 			'Mittwoch');
define('_CALLONGFIFTHDAY',  			'Donnerstag');
define('_CALLONGSIXTHDAY',  			'Freitag');
define('_CALLONGSEVENTHDAY',			'Samstag');
define('_CALMONDAYSHORT',   			'M');
define('_CALTUESDAYSHORT',  			'D');
define('_CALWEDNESDAYSHORT',			'M');
define('_CALTHURSDAYSHORT', 			'D');
define('_CALFRIDAYSHORT',   			'F');
define('_CALSATURDAYSHORT', 			'S');
define('_CALSUNDAYSHORT',   			'S');
define('_CALSUNDAY',        			'Sonntag');
define('_CALMONDAY',        			'Montag');
define('_CALTUESDAY',       			'Dienstag');
define('_CALWEDNESDAY',					'Mittwoch');
define('_CALTHURSDAY',					'Donnerstag');
define('_CALFRIDAY',					'Freitag');
define('_CALSATURDAY',					'Samstag');
define('_CAL_DAYVIEW',      			'Tag');
define('_CAL_WEEKVIEW',     			'Woche');
define('_CAL_MONTHVIEW',    			'Monat');
define('_CAL_YEARVIEW',     			'Jahr');
define('_PC_NEW_EVENT_HEADER',			'Termin');
define('_PC_DATE_TIME',					'Datum');
define('_PC_ALLDAY_EVENT',				'Ganztages-Termin');
define('_PC_TIMED_EVENT',				'Terminbeginn');
define('_PC_EVENT_TYPE',				'Kategorie');
define('_PC_SHARING',					'Sharing');
define('_PC_EVENT_TOPIC',				'Topic');
define('_PC_SHARE_PRIVATE',				'privat');
define('_PC_SHARE_PUBLIC',				'registrierte Benutzer');
define('_PC_SHARE_SHOWBUSY',			'als belegt kennzeichnen');
define('_PC_SHARE_GLOBAL',				'alle Benutzer');
define('_PC_EVENT_STREET',				'Strasse');
define('_PC_EVENT_CITY',				'Stadt');
define('_PC_EVENT_STATE',				'Staat');
define('_PC_EVENT_POSTAL',				'PLZ');
define('_PC_EVENT_CONTACT',				'Kontakt');
define('_PC_EVENT_PHONE',				'Telefon');
define('_PC_EVENT_EMAIL',				'E-Mail');
define('_PC_REPEATING_HEADER',			'Wiederholung');
define('_PC_NO_REPEAT',					'keine Wiederholung');
define('_PC_REPEAT',					'Terminwiederholung');
define('_PC_REPEAT_ON',					'jeden');
define('_PC_OF_THE_MONTH',				'des Monats jeden');
define('_PC_END_DATE',					'Enddatum');
define('_PC_NO_END',					'kein Enddatum');
define('_PC_TIMED_DURATION',			'Dauer');
define('_PC_TIMED_DURATION_HOURS',		'Stunden');
define('_PC_TIMED_DURATION_MINUTES',	'Minuten');
define('_PC_EVERY',						'jeden');
define('_PC_EVERY_OTHER',				'jeden zweiten');
define('_PC_EVERY_THIRD',				'jeden dritten');
define('_PC_EVERY_FOURTH',				'jeden vierten');
define('_PC_EVERY_1ST',					'ersten');
define('_PC_EVERY_2ND',					'zweiten');
define('_PC_EVERY_3RD',					'dritten');
define('_PC_EVERY_4TH',					'vierten');
define('_PC_EVERY_LAST',				'letzten');
define('_PC_EVERY_SUN',					'Son');
define('_PC_EVERY_MON',					'Mon');
define('_PC_EVERY_TUE',					'Die');
define('_PC_EVERY_WED',					'Mit');
define('_PC_EVERY_THU',					'Don');
define('_PC_EVERY_FRI',					'Fre');
define('_PC_EVERY_SAT',					'Sam');
define('_PC_OF_EVERY_MONTH',			'Monat');
define('_PC_OF_EVERY_2MONTH',			'zweiten Monat');
define('_PC_OF_EVERY_3MONTH',			'dritten Monat');
define('_PC_OF_EVERY_4MONTH',			'vierten Monat');
define('_PC_OF_EVERY_6MONTH',			'sechsten Monat');
define('_PC_OF_EVERY_YEAR',				'Jahr');
define('_PC_EVERY_DAY',					'Tag');
define('_PC_EVERY_WEEK',				'Woche');
define('_PC_EVERY_MONTH',				'Monat');
define('_PC_MONTHS',					'Monat(e)');
define('_PC_EVERY_YEAR',				'Jahr');
define('_PC_EVERY_MWF',					'Mon, Mit &amp; Fre');
define('_PC_EVERY_TR',					'Die &amp; Don');
define('_PC_EVERY_MF',					'Mon bis Fre');
define('_PC_EVERY_SS',					'Sam &amp; Son');
define('_PC_EVENT_LOCATION',            'Ort');
define('_PC_EVENT_CONTNAME',            'Kontakt');
define('_PC_EVENT_CONTTEL',             'Telefon');
define('_PC_EVENT_CONTEMAIL',           'E-Mail');
define('_PC_EVENT_WEBSITE',             'Website');
define('_PC_EVENT_FEE',                 'Kosten');
define('_PC_EVENT_PREVIEW',             'Vorschau');
define('_PC_EVENT_SUBMIT',              'einreichen');
define('_PC_EVENT_TITLE',               'Titel');
define('_PC_EVENT_DESC',                'Beschreibung');
define('_PC_EVENT_CATEGORY',            'Kategorie');
define('_PC_TOPIC',                     'Topic');
define('_PC_REQUIRED',                  '*notwendig');
define('_PC_AM',                        'morgens');
define('_PC_PM',                        'nachmittags');
define('_PC_EVENT_SUBMISSION_FAILED',   'Eintrag fehlgeschlagen');
define('_PC_EVENT_SUBMISSION_SUCCESS',  'Termin eingereicht');
define('_PC_EVENT_EDIT_SUCCESS',  		'Termin editiert');
define('_PC_SUBMIT_ERROR',              'Die Anmeldung konnte nicht verarbeitet werden - siehe unten.');
define('_PC_SUBMIT_ERROR1',             'Startdatum grösser als Enddatum');
define('_PC_SUBMIT_ERROR2',             'ungültiges Startdatum');
define('_PC_SUBMIT_ERROR3',             'ungültiges Enddatum');
define('_PC_SUBMIT_ERROR4',             'ist ein notwendiges Feld');
define('_PC_SUBMIT_ERROR5',             'Wiederholungsfrequenz muss mindestens 1 sein');
define('_PC_SUBMIT_ERROR6',             'Wiederholungsfrequenz muss eine Zahl sein');
define('_PC_ADMIN_EVENT_ERROR', 		'es ist ein Fehler aufgetreten');
define('_PC_ADMIN_EVENTS_DELETED', 		'Termin wurde gelöscht');
@define('_NO_DIRECT_ACCESS',            'die Funktion kann nicht direkt angesprochen werden');
?>