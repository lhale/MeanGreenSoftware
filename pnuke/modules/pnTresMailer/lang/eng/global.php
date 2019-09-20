<?php // $Id: global.php,v 1.5 2005/11/27 15:44:15 kdoerges Exp $ $Name:  $
// ----------------------------------------------------------------------
// POST-NUKE Content Management System
// Copyright (C) 2001 by the Post-Nuke Development Team.
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
// Filename: modules/NewsLetter/lang/eng/global.php
// Original Author: foyleman
// Purpose: NewsLetter Module, language definitions
// ----------------------------------------------------------------------

// these definitions you may want to edit right away


// these definitions were added in version 6.00

define('_UNSUBSCRIBERSINFO', 'This list is for your records of who, how and when each user was unsubscribed.<br>If you delete someone from this list, they will be able to re-subscribe.');
// renamed all the "modules" references to "plugins" to avoid confusion

// these definitions were added in version 5.98

define('_PNTRESMAILER_ICON_LABEL', 'Newsletter Subscription');

// these definitions were added in version 5.95

define('_IDUPUNSUBSCRIBER','<b>You have already un-subscribed once with this email address.</b><br>If you wish to re-subscribe, you must contact an administrator.<br>If you are not redirected to the appropriate page, please click');
define('_DUPUNSUBSCRIBER','<b>Email Address found in Un-Subscribe List.</b><br>If you wish to re-subscribe, you must contact an administrator.<br>If you are not redirected to the appropriate page, please click');
define('_ALLOWRESUBSCRIBERS','Allow Re-Subscribers');
// Edited below: _INTROB

// these definitions were added in version 5.90

define('_ARCHIVESUPDATED','<b>Archives Updated.</b><br>If you are not redirected to the appropriate page, please click');
define('_ARCHIVESSKIPPED','<b>Archives Left Untouched.</b><br>If you are not redirected to the appropriate page, please click');
define('_EDITARCHHTML','Edit HTML Archive');
define('_EDITARCHTEXT','Edit Text Archive');
define('_EDITNEWLETTERT','<span class="pn-title"><u>STEP THREE</u> : <u>Edit New Mailer</u></span>');
define('_EDITNEWLETTER','<b>Edit the text and html of the archive manually.</b><br>You should only edit the archive if you have experience working with html.');
define('_EDITNEWLETTERB','Edit Archive');
define('_UPDATEARCHIVEB','Update Achives');
define('_SKIPARCHIVEB','Skip');
define('_PREVIEWNEWLETTERT','<span class="pn-title"><u>STEP TWO</u> : <u>Preview New Mailer</u></span>');
define('_PREVIEWNEWLETTER','<b>Preview the mailers before sending them out.</b>');
define('_PRETEXTNEWSLETTERB','Text Mailer');
define('_PREHTMLNEWSLETTERB','HTML Mailer');

// these definitions were added in version 5.90

define('_PERSONALEMAILS','Personalize Emails');
define('_FRIENDREPLACE','friend');
define('_VIEW','View');
define('_MODAUTHOR','Details');
define('_UNSUBSCRIBERSLIST','Unsubscribed Users');
define('_UNSUBDATE','Date Removed');
define('_UNSUBINFO','Details');
define('_VIEWUNSUBLIST','View Unsubscribed User Info');
define('_UNSUBSCRIBERDEL','<b>Non-Subscriber Deleted.</b><br>If you are not redirected to the appropriate page, please click');
define('_MODPREREFNAME','Reference Name');
define('_MODPREDESCR','Description');
define('_MODPREVERS','Version');
define('_MODPREFILE','File Name');
define('_MODPREEDIT','Editable Qty');
define('_MODPREADMIN','Admin Panel');
define('_MODPREAUTHNAME','Author Name');
define('_MODPREAUTHCONT','Author Contact');
define('_MODPREYES','Yes');
define('_MODPRENO','No');
define('_UNSUBPRESUBID','Subscription Id');
define('_UNSUBPREDATE','Unsubscribe Date');
define('_UNSUBPREPNUID','PN User Id');
define('_UNSUBPRENAME','Name');
define('_UNSUBPREEMAIL','Email Address');
define('_UNSUBPRELAST','Last Mailer Date');
define('_UNSUBPREREC','Mailer Received');
define('_UNSUBPREIPT','IP address of unsubscriber');
define('_UNSUBPRETP','Unsub. IP Address');
define('_UNSUBPREBROWT','Browser information of unsubscriber');
define('_UNSUBPREBROW','Unsub. User Agent');
define('_UNSUBPREWHOT','User ID of unsubscriber');
define('_UNSUBPREWHO','Unsub User Id');
define('_UNSUBPRENONE','None');
define('_GENERATENEWLETTERB','Generate');
define('_SENDFIX','Fix');
define('_SENDFIXL','Fix');
define('_SENDFIXT','Send Remaining Emails - If Send Failed');
define('__READYTOSENDB','Send');
define('_SENDNEWLETTERF','<span class="pn-title"><u>Send Mailer FIX</u></span><br>Send out the last mailer generated from the archive starting after the last subscriber who received one.<br>This will restart the mailing process where you left off if there were any problems.<br><b>Only use if there were problems.</b>');
define('_READYTOSENDF','<b>Continue sending using the Bulk Email method.</b><br>This will send using the BCC header of your email.');
define('_READYTOSENDSINGLESF','<b>Continue sending each email separately?</b><br>This method will send out one at a time and will take much longer.');

// these definitions were added in version 5.70

define('_GENERATENEWLETTER','<b>Do you wish to generate a new letter for the archive?</b><br>This will then be the next letter sent out to all subscribers.');
define('_GENERATENEWLETTERT','<span class="pn-title"><u>STEP ONE</u> : <u>Generate New Mailer</u></span>');
define('_LOOPTEXT','Emails Sent Before Refresh');
define('_ARCHIVEGENERATED','<b>New Archived Mailer has been Generated.</b><br>If you are not redirected to the appropriate page, please click');
define('_SENDNEWLETTER','<span class="pn-title"><u>STEP FOUR</u> : <u>Send New Mailer</u></span><br>Send out the last mailer generated from the archive.');
// These were moved and edited from below - previous versions
define('_SENDMAILER','Generate and Mail');
define('_TSENDMAILER','Generate a New Letter and Send to Subscribers');
define('_READYTOSEND','<b>Are you ready to send out the mailer to all subscribed users?</b><br>This will send using the BCC header of your email.');
define('_READYTOSENDSINGLES','<b>Do you wish to send out each email separately?</b><br>This method will send out one at a time and will take much longer.');
define('_YOURLASTNEWS','Your last newsletter was <u>archived</u> on');

// these definitions were added in version 5.50

define('_PHPVERFIX','Activate PHP 4.2.3 Fix');
define('_SUBEMAIL','Address');
define('_SENDONENOW','Send');
define('_EDITPNDETAILS','Edit Postnuke Details');
define('_NOPNDETAILS','This subscriber is not registered.');
define('_HTMLONLYSUB','HTML Subscriptions Only');
define('_HTMLONLYOPT','HTML Only');
// Edited below: _EDITSUBDETAILS, _SEND

// these definitions were added in version 5.34

define('_ARCHSENT','Archive Sent');

// these definitions were added in version 5.33

define('_PRIVACYLINK','Privacy Policy');
define('_PRIVACYTITLE','Newsletter Privacy Policy');
define('_PRIVACYSTATEMENT','We maintain a strict "no-spam" policy. Your email address will not be sold to a third party if you sign up for one of our newsletters or discussion lists.<br><br>If you sign up for an email newsletter with us, you will receive only the email newsletter you have requested. You may receive on occasion information regarding other newsletters or mailing lists we offer of which you may choose to "Opt-Out".<br><br>You may "Opt-In" or "Opt-Out" of any  newsletter or mailing list service that we offere at anytime.<br><br>Once you have chosen to "Opt-Out" of a newsletter subscription from us, you will not be added to the same list again.<br><br>Any questions or concerns may be obtained by contacting someone here.');
define('_NEWSUBSAMPLE','Sample Letter to New Subscriber');
define('_LOSTUSERNAME','<b>Lost your username?</b><br>Fill out the form below and it will be emailed to you.');
define('_GETLOSTNAME','Get My Lost Username');
define('_NOSUBEMAIL','Your email address does not exist in our database.<br>You may have entered the wrong email addres or you may not be subscribed.');
define('_SOMEUSERREQUEST','Below you will find the information regarding your Unsername Request from');
define('_USERNAMEMAILED','Your username has been mailed to you.');

// these definitions were added in version 5.30

define('_OUTOF','out of');
define('_OOEMAILSSENT','emails sent');
define('_CONTITOSENDHTML','Continuing to send HTML mailers');
define('_CONTITOSENDTEXT','Continuing to send Text mailers');

// these definitions were added in version 5.20

define('_EDITSUB','Edit Subscriber');
define('_EDITSUBDETAILS','Edit Subscription Details');
define('_SIDEBLOCKPOPUP','Sideblock Popup Window');
define('_UNREGONLY','Unregistered Users Only');
define('_ALLUSERS','All Users');
define('_SIDEBLOCKPOPUPDAYS','Days before popup again');

// these definitions were added in version 5.00

define('_ALTMAILSYSTEM','Alt. Mail System');
define('_ALLOWUNREGISTERED','Unregistered Subscribers');
define('_BADSUBSCRIBER','<b>Bad Email Address..</b><br>If you are not redirected to the appropriate page, please click');
define('_DUPSUBSCRIBER','<b>Duplicate Email Address.</b><br>If you are not redirected to the appropriate page, please click');
define('_FROMPOSTNUKEDATA','Registered Users');
define('_FROMMANUALDATA','Unregistered Users');
define('_INTROBUNREG',' and receive updates of what is going on right in your mailbox. You choose whether its HTML or Text. We do the rest. All you have to do to get started is correctly fill in the fields below and hit the subscribe button below.');
define('_NOUNREGSUBSCRIPT','Sorry, but we do not allow unregistered users to subscribe.');
define('_SELECTUSER','Select User');
define('_SELFSUBSCRIBERBAD','<b>Bad Email Address.</b><br>If you are not redirected to the appropriate page, please click');
define('_SELFSUBSCRIBERMISS','<b>Missing Field in Subscription.</b><br>If you are not redirected to the appropriate page, please click');
define('_SUBSCRIBERNOTDEL','<b>Subscriber NOT Deleted.</b><br>If you are not redirected to the appropriate page, please click');
define('_UNSUBINFOBUNREG',' just fill in BOTH FIELDS as you subscribed and click the unsubscribe button below.');


// these are standard and will most likely be left alone

define('_ADD','Add');
define('_ADDNEWSUB','Add New Subscriber');
define('_ADDUSER','Add Subscriber');
define('_ADMINONLY','Your must be an authorized user to access this page.');
define('_ARCHIVEDEL','<b>Archived Mailer Deleted.</b><br>If you are not redirected to the appropriate page, please click');
define('_ARCHIVESLIST','Archived Mailers');
define('_BACKTOMAIN','Mailer Main');
define('_BACKTOPNADMIN','PN Admin');
define('_BASEURL','Base Url of Your Site');
define('_BULKTEXT','Max Emails in Bcc');
define('_CLICKTOCHG','Click to Change');
define('_CLOSEMESSAGE','Footer / Closing Message');
define('_CURRENTSUBHEAD','You are currently subscribed as...');
define('_DATE','Date');
define('_DAYSAGO','day(s) ago.');
define('_DUPSUBSCRIBER','<b>Duplicate Subscriber.</b><br>If you are not redirected to the appropriate page, please click');
define('_EDITMODULE','Edit Module');
define('_EMAIL','Email');
define('_EMAILSSENT','<b>All Mailers Sent.</b><br>If you are not redirected to the appropriate page, please click');
define('_EMAILSUBJECT','Email Subject');
define('_FOOTERMESSAGE','pnTresMailer by Tresware.com');
define('_FORMAT','Format');
define('_GOTOPAGE','Go To Page');
define('_HERE','here');
define('_HTML','HTML');
define('_HTMLINVALID','Your template for <u>html</u> emails is not valid.');
define('_HTMLTPL','HTML Email Template');
define('_IFSUBINERROR','If you have subscribed in error, you can unsubscribe by visiting our site using the link below.');
define('_IMGDELETE','Delete');
define('_IMGPREVIEW','Preview');
define('_INSERT','Insert');
define('_INTROA','Subscribe to the');
define('_INTROB','<b>NewsLetter</b> and receive updates of what is going on right in your mailbox. All you have to do to get started is hit the subscribe button below.');
define('_ISSUE','Issue');
define('_JUSTRECEIVEDSUB','<b>You have just received a new subscriber to your newsletter.</b>');
define('_LASTMAILER','Last Mailer Received');
define('_LISTSUB','List');
define('_MAILSERVER','Outgoing Mail Server');
define('_MODDESCR','Description');
define('_MODNAME','Name');
define('_MODPOS','Position');
define('_MODQTY','Quantity');
define('_MODULEADDED','<b>New Module Added.</b><br>If you are not redirected to the appropriate page, please click');
define('_MODULEDEL','<b>Module Deleted.</b><br>If you are not redirected to the appropriate page, please click');
define('_MODULEDOWN','<b>Module Moved.</b><br>If you are not redirected to the appropriate page, please click');
define('_MODULESLIST','pnTresMailer Plugins (Modules)');
define('_MODULESNEWLIST','Available Plugins');
define('_MODULEUP','<b>Module Moved.</b><br>If you are not redirected to the appropriate page, please click');
define('_MODULEUPDATE','<b>Module Updated.</b><br>If you are not redirected to the appropriate page, please click');
define('_MODVERSION','Ver.');
define('_MOREINFOSUB','You can find out more information about your subscriber or send them an HTML Mailer by visiting the newletter administration.');
define('_MOVEBLANK','<img src="modules/pnTresMailer/images/clearpixel.gif" width="13" height="20" border="0">');
define('_MOVEDOWN','<img src="modules/pnTresMailer/images/down.gif" border="0">');
define('_MOVEUP','<img src="modules/pnTresMailer/images/up.gif" border="0">');
define('_NEWSLETTER','Newsletter');
define('_NEWSLETTERADMINMENU','pnTresMailer Main Menu');
define('_NEWSUBHEAD','Subscribe Now...');
define('_NEXTISSUENUM','Next Issue Number');
define('_NEXTPAGE','Next Page');
define('_NO','No');
define('_NONESENT','None Sent');
define('_OPENMESSAGE','Header / Opening Message');
define('_PREVIEW','Preview');
define('_PREVIEWMAILER','Preview');
define('_PREVIOUSPAGE','Previous Page');
define('_REMOVE','Remove');
define('_REPLYTOADDRESS','Email Reply-To Address');
define('_REPLYTONAME','Email Reply-To Name');
define('_SELFDUPSUBSCRIBER','<b>You are already subscribed.</b><br><br>If you are not redirected to the appropriate page, please click');
define('_SELFSUBSCRIBERADDED','<b>Thank you for Subscribing.</b><br>You will receive a confirmation mail shortly and be on our list for the next newsletter mailing.<br>If you are not redirected to the appropriate page, please click');
define('_SEND','Email');
define('_SENDINGMAILER','<b>Preparing HTML Mailer</b>');
define('_SENTHTMLNOWTEXT','<b>HTML Mailer has been Sent.<br>Preparing Text Mailer.</b>');
define('_SET','Set');
define('_SINGLEEMAILSSENT','<b>Single Mailer Sent.</b><br>If you are not redirected to the appropriate page, please click');
define('_SUBFORMAT','Format');
define('_SUBISSUE','sub-issue');
define('_SUBNAME','Name');
define('_SUBSCRIBE','Subscribe');
define('_SUBSCRIBERADDED','<b>New Subscriber Added.</b><br>If you are not redirected to the appropriate page, please click');
define('_SUBSCRIBERADDED','<b>Subscriber Deleted.</b><br>If you are not redirected to the appropriate page, please click');
define('_SUBSCRIBERDEL','<b>Subscriber Deleted.</b><br>If you are not redirected to the appropriate page, please click');
define('_SUBSCRIBERDEL','<b>Subscriber Deleted.</b><br>If you are not redirected to the appropriate page, please click');
define('_SUBSCRIBEREMAIL','Subscriber Email');
define('_SUBSCRIBERNAME','Subscriber Name');
define('_SUBSCRIBERSLIST','Subscribers List');
define('_SUBSCRIBERSLIST','Subscribers List');
define('_SUBSCRIBERUPDATED','<b>Subscriber Updated.</b><br>If you are not redirected to the appropriate page, please click');
define('_SUBSCRIPTSERV','subscription services.');
define('_TBACKTOMAIN','pnTresMailer Administration');
define('_TBACKTOPNADMIN','PostNuke Administration');
define('_TDELETEARCHIVE','Delete the Archive');
define('_TDOWN','Move Down');
define('_TEXT','Text');
define('_TEXTINVALID','Your template for <u>text</u> emails is not valid.');
define('_TEXTTPL','Text Email Template');
define('_THANKYOU','Thank You');
define('_THANKYOUFORSUB','Thank you for Subscribing to our newletter on');
define('_TLISTARCHIVE','List Subscribers in Archive');
define('_TPREVIEWARCHIVE','View the Archived Mailer');
define('_TPREVIEWMAILER','Preview the Current Mailer');
define('_TUP','Move Up');
define('_TVIEWARCHIVES','View Archived Mailers');
define('_TVIEWMODULES','Manage Plugins');
define('_TVIEWSUBSCRIBERS','View all Subscribers');
define('_TVIEWVARS','Manage Settings');
define('_UNSUB','UNSUBSCRIBE');
define('_UNSUBHEAD','Unsubscribe now...');
define('_UNSUBINFOA','If you no longer wish to be subscribed to the');
define('_UNSUBINFOB','<b>NewsLetter</b><br>just click the unsubscribe button below.');
define('_UPDATE','Update');
define('_UPGRADE','Upgrade');
define('_USERNAME','Username');
define('_USERSSUBSCRIBED','user(s) subscribed to your newletter.');
define('_VARSLIST','Mailer Settings');
define('_VARSUPDATED','<b>Mailer Settings Updated.</b><br>If you are not redirected to the appropriate page, please click');
define('_VIEWARCHIVES','Archives');
define('_VIEWMODULES','Plugins');
define('_VIEWSUBSCRIBERS','Subscribers');
define('_VIEWUSER','View User Profile');
define('_VIEWVARS','Settings');
define('_WHICHIS','which is');
define('_WHO','Who');
define('_YES','Yes');
define('_YOUCURRENTLY','You currently have');
define('_YOUMUSTBE','You must be logged in to use the');
define('_YOURLASTSUB','Your last subscriber was');

// new definitions for 6.1
define('_DBREADERROR', 'Can not read database.');
define('_ADDNEWCSV',   'Add subscriber from csv list');
define('_IMPORTPNUSER','Import users from PostNuke database');
define('_NODUPSUBSCRIBER', 'Deleted adress will not be re-imported');
define('_IMPORTFROMPNDB', 'This will import ALL of your current PostNuke users into the new pnTresMailer NewsLetter module. ');
define('_IMPORTFROMPNDBTITLE', 'pnTresMailer Subscription Database Import');
define('_IMPORTFROMPNDBCOMPLETE', 'Import completed');
define('_IMPORTEDUSER', 'user imported');
define('_DUPDELETED', 'deleted duplets');
define('_IMPORTCSVTITLE', 'Subscribers CSV Entry Form');
define('_IMPORTCSVHELP1', '<b>Add As:</b> NAME,EMAIL <i>(no spaces at comma)</i>');
define('_IMPORTCSVHELP2', '<b>CSV Data</b><br>separate name and email with a comma and<br>separate each entry with line break.<br> Instructions can be found in the install document.');
define('_IMPORTCSVSTART', 'Add Subscribers');
define('_IMPORTPNSUCCESS', '<b>SUCCESS!</b><br><b>Subscriber list has been added.</b>');
define('_IMPORTTHERE','There were ');
define('_IMPORTDUPREMOVED', ' duplicate entries removed.');
define('_IMPORTBLANKREMOVED', ' blank entries removed.');
define('_IMPORTRESUBREMOVED', ' resubscribers removed.');
?>