// ** I18N

// Calendar EN language
// Author: Mihai Bazon, <mishoo@infoiasi.ro>
// Encoding: any
// Distributed under the same terms as the calendar itself.

// For translators: please use UTF-8 if possible.  We strongly believe that
// Unicode is the answer to a real internationalized world.  Also please
// include your contact information in the header, as can be seen above.

// full day names
Calendar._DN = new Array
("Sonntag",
 "Montag",
 "Dienstag",
 "Mittwoch",
 "Donnerstag",
 "Freitag",
 "Samstag",
 "Sonntag");

// Please note that the following array of short day names (and the same goes
// for short month names, _SMN) isn't absolutely necessary.  We give it here
// for exemplification on how one can customize the short day names, but if
// they are simply the first N letters of the full name you can simply say:
//
//   Calendar._SDN_len = N; // short day name length
//   Calendar._SMN_len = N; // short month name length
//
// If N = 3 then this is not needed either since we assume a value of 3 if not
// present, to be compatible with translation files that were written before
// this feature.

// short day names
Calendar._SDN = new Array
("So",
 "Mo",
 "Di",
 "Mi",
 "Do",
 "Fr",
 "Sa",
 "So");

// full month names
Calendar._MN = new Array
("Januar",
 "Februar",
 "M\u00e4rz",
 "April",
 "Mai",
 "Juni",
 "Juli",
 "August",
 "September",
 "Oktober",
 "November",
 "Dezember");

// short month names
Calendar._SMN = new Array
("Jan",
 "Feb",
 "M\u00e4r",
 "Apr",
 "Mai",
 "Jun",
 "Jul",
 "Aug",
 "Sep",
 "Okt",
 "Nov",
 "Dez");

// tooltips
Calendar._TT = {};
Calendar._TT["INFO"] = "Zu diesem Kalender";

Calendar._TT["ABOUT"] =
"DHTML Datum/Zeit Selector\n" +
"(c) dynarch.com 2002-2003\n" + // don't translate this this ;-)
"Donwload neueste Version: http://dynarch.com/mishoo/calendar.epl\n" +
"Distributed under GNU LGPL.  See http://gnu.org/licenses/lgpl.html for details." +
"\n\n" +
"Datumsauswahl:\n" +
"- Jahr ausw\u00e4hlen mit \xab und \xbb\n" +
"- Monat ausw\u00e4hlen mit " + String.fromCharCode(0x2039) + " und " + String.fromCharCode(0x203a) + "\n" +
"- Fr Auswahl aus Liste Maustaste gedr\u00fcckt halten.";
Calendar._TT["ABOUT_TIME"] = "\n\n" +
"Zeit w\u00e4hlen:\n" +
"- Stunde/Minute weiter mit Mausklick\n" +
"- Stunde/Minute zurck mit Shift-Mausklick\n" +
"- oder f\u00fcr schnellere Auswahl nach links oder rechts ziehen.";

Calendar._TT["PREV_YEAR"] = "Jahr zur\u00fcck (halten -> Auswahlmen\u00fc)";
Calendar._TT["PREV_MONTH"] = "Monat zur\u00fcck (halten -> Auswahlmen\u00fc)";
Calendar._TT["GO_TODAY"] = "Gehe zum heutigen Datum";
Calendar._TT["NEXT_MONTH"] = "Monat vor (halten -> Auswahlmen\u00fc)";
Calendar._TT["NEXT_YEAR"] = "Jahr vor (halten -> Auswahlmen\u00fc)";
Calendar._TT["SEL_DATE"] = "Datum ausw\u00e4hlen";
Calendar._TT["DRAG_TO_MOVE"] = "Klicken und halten um zu verschieben";
Calendar._TT["PART_TODAY"] = " (heute)";

// the following is to inform that "%s" is to be the first day of week
// %s will be replaced with the day name.
Calendar._TT["DAY_FIRST"] = "%s zuerst zeigen";

// This may be locale-dependent.  It specifies the week-end days, as an array
// of comma-separated numbers.  The numbers are from 0 to 6: 0 means Sunday, 1
// means Monday, etc.
Calendar._TT["WEEKEND"] = "0,6";

Calendar._TT["CLOSE"] = "Schlie\u00dfen";
Calendar._TT["TODAY"] = "Heute";
Calendar._TT["TIME_PART"] = "(Shift-)Click or drag to change value";

// date formats
Calendar._TT["DEF_DATE_FORMAT"] = "%Y-%m-%d";
Calendar._TT["TT_DATE_FORMAT"] = "%a, %b %e";

Calendar._TT["WK"] = "wk";
Calendar._TT["TIME"] = "Time:";
