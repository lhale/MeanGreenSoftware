<?php // $Id: global.php,v 1.5 2005/11/28 20:55:40 jazzie Exp $ $Name:  $
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
// Filename: modules/NewsLetter/lang/fra/global.php
// Original Author: foyleman
// Purpose: NewsLetter Module, language definitions
// ----------------------------------------------------------------------

// these definitions you may want to edit right away

// these definitions were added in version 6.00

define('_UNSUBSCRIBERSINFO', 'Cette liste vous permet de voir "qui", "comment" et "quand" chaque utilisateur a �t� r�sili�. <br> si vous supprimez quelqu\'un de cette liste, il sera de nouveau capable de se r�inscrire..');
// renamed all the "modules" references to "plugins" to avoid confusion

// these definitions were added in version 5.98

define('_PNTRESMAILER_ICON_LABEL', 'Souscription au Bulletin d\'Informations');

// these definitions were added in version 5.95

define('_IDUPUNSUBSCRIBER','<b>Vous vous �tes d�j� d�sabonn�(e) une fois avec cette adresse �lectronique. </b> <br> si vous voulez vous r�-inscrire, vous devez entrer en contact avec l\'administrateur.<br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer ');
define('_DUPUNSUBSCRIBER','<b>Adresse �lectronique trouv�e dans la Liste de d�sabonnement. </b> <br> si vous voulez vous r�-inscrire, vous devez entrer en contact avec l\'administrateur.<br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer ');
define('_ALLOWRESUBSCRIBERS','Autoriser R�inscriptions');
// Edited below: _INTROB

// these definitions were added in version 5.90

define('_ARCHIVESUPDATED','<b>Archives mises � jour.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer ');
define('_ARCHIVESSKIPPED','<b>Archives inchang�es.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer ');
define('_EDITARCHHTML','Editer Archive HTML ');
define('_EDITARCHTEXT','Editer Archive Texte ');
define('_EDITNEWLETTERT','<span class="pn-title"><u>ETAPE TROIS</u> : <u>Editer Nouvel Envoi</u></span>');
define('_EDITNEWLETTER','<b>Editer le texte et l\'html de l\'archive manuellement.</b><br>Vous devez �diter les archives seulement si vous avez l\'exp�rience du HTML.');
define('_EDITNEWLETTERB','Editer Archive');
define('_UPDATEARCHIVEB','Mettre � Jour les Archives');
define('_SKIPARCHIVEB','Passer');
define('_PREVIEWNEWLETTERT','<span class="pn-title"><u>ETAPE DEUX</u> : <u>Pr�visualiser Nouvel Envoi</u></span>');
define('_PREVIEWNEWLETTER','<b>Pr�visualiser les envois avant de les faire partir.</b>');
define('_PRETEXTNEWSLETTERB','Envoi Texte');
define('_PREHTMLNEWSLETTERB','Envoi HTML');

// these definitions were added in version 5.90

define('_PERSONALEMAILS','Personaliser Emails');
define('_FRIENDREPLACE','amis');
define('_VIEW','Voir');
define('_MODAUTHOR','D�tails');
define('_UNSUBSCRIBERSLIST','Utilisateurs D�sabonn�s');
define('_UNSUBDATE','Date Enlev�e');
define('_UNSUBINFO','D�tails');
define('_VIEWUNSUBLIST','Voir Info Utilisateur D�sabonn�');
define('_UNSUBSCRIBERDEL','<b>Non-Inscrit Effac�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_MODPREREFNAME','Nom de R�f�rence');
define('_MODPREDESCR','Description');
define('_MODPREVERS','Version');
define('_MODPREFILE','Nom de Fichier');
define('_MODPREEDIT','Qt� Editable');
define('_MODPREADMIN','Panneau Admin');
define('_MODPREAUTHNAME','Nom Auteur');
define('_MODPREAUTHCONT','Contact Auteur');
define('_MODPREYES','Oui');
define('_MODPRENO','Non');
define('_UNSUBPRESUBID','Souscription N�');
define('_UNSUBPREDATE','Date R�siliation');
define('_UNSUBPREPNUID','Membre N�');
define('_UNSUBPRENAME','Nom');
define('_UNSUBPREEMAIL','Adresse Email');
define('_UNSUBPRELAST','Date Dernier Envoi');
define('_UNSUBPREREC','Envoi Recu');
define('_UNSUBPREIPT','Adresse IP du d�sabonn�');
define('_UNSUBPRETP','IP d�sabonn�');
define('_UNSUBPREBROWT','Information navigateur du d�sabonn�');
define('_UNSUBPREBROW','Navigateur');
define('_UNSUBPREWHOT','Num�ro membre du d�sabonn�');
define('_UNSUBPREWHO','N� membre');
define('_UNSUBPRENONE','Aucun');
define('_GENERATENEWLETTERB','G�n�rer');
define('_SENDFIX','Correctif');
define('_SENDFIXL','Correctif');
define('_SENDFIXT','Envoyer Emails de Rappel - Si l\'Envoi a �chou�');
define('__READYTOSENDB','Envoyer');
define('_SENDNEWLETTERF','<span class="pn-title"><u>Envoyer un Correctif</u></span><br>Exp�dier le dernier envoi g�n�r� � partir des archives, en commen�ant par le dernier abonn� qui a bien re�u un envoi.<br> Cela reprendra le processus de postage o� vous vous �tes arr�t� s\'il y a eu des probl�mes. <br> < b> Utiliser seulement s\'il y a eu des probl�mes.</b>');
define('_READYTOSENDF','<b>Continuer � exp�dier en utilisant la m�thode des Email de Masse. </b > <br> Cela enverra vos emails en utilisant l\'en-t�te BCC (copie cach�e).');
define('_READYTOSENDSINGLESF','<b>>Continuer � exp�dier chaque email s�par�ment ?</b><br>Cette m�thode les enverra un par un et prendra beaucoup plus de temps.');

// these definitions were added in version 5.70

define('_GENERATENEWLETTER','<b>Vous voulez produire une nouvelle lettre pour les archives ?</b><br>Elle sera alors la prochaine lettre envoy�e � tous vos abonn�s.');
define('_GENERATENEWLETTERT','<span class="pn-title"><u>ETAPE UNE</u> : <u>G�n�rer Nouvel Envoi</u></span>');
define('_LOOPTEXT','Emails Envoy�s Avant Rafra�chissement');
define('_ARCHIVEGENERATED','<b>Le Nouvel Envoi Archiv� a �t� G�n�r�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_SENDNEWLETTER','<span class="pn-title"><u>ETAPE QUATRE</u> : <u>Faire Partir Nouvel Evoi</u></span><br>Exp�dier le dernier envoi g�n�r� par les archives.');
// These were moved and edited from below - previous versions
define('_SENDMAILER','G�n�rer et Exp�dier');
define('_TSENDMAILER','G�n�rer une Nouvelle Lettre et Exp�dier aux Abonn�s');
define('_READYTOSEND','<b>Etes-vous pr�t(e) � exp�dier l\'envoi � tous vos abonn�s ?</b><br>Cela enverra vos emails en utilisant l\'en-t�te BCC (copie cach�e).');
define('_READYTOSENDSINGLES','<b>Voulez-vous exp�dier chaque email s�par�ment ?</b><br>Cette m�thode les enverra un par un et prendra beaucoup plus de temps.');
define('_YOURLASTNEWS','Votre dernier bulletin a �t� <u>archiv�</u> on');

// these definitions were added in version 5.50

define('_PHPVERFIX','Activer correctif PHP 4.2.3');
define('_SUBEMAIL','Adresse');
define('_SENDONENOW','Envoyer');
define('_EDITPNDETAILS','Editer D�tails PN');
define('_NOPNDETAILS','Cet abonn� n\'est pas enregistr�.');
define('_HTMLONLYSUB','Souscriptions HTML seulement');
define('_HTMLONLYOPT','HTML Seulement');
// Edited below: _EDITSUBDETAILS, _SEND

// these definitions were added in version 5.34

define('_ARCHSENT','Archive Envoy�e');

// these definitions were added in version 5.33

define('_PRIVACYLINK','Politique de respect de la vie priv�e');
define('_PRIVACYTITLE','Politique de respect de la vie priv�e du Bulletin');
define('_PRIVACYSTATEMENT','Nous respectons une politique "anti-spam" stricte. Votre adresse �lectronique ne sera ni vendue, ni c�d�e, en aucune fa�on, � un tiers si vous vous abonnez � un de nos bulletins ou une de nos listes de discussion. <br> <br> Si vous signez pour un bulletin d\'information par email avec nous, vous recevrez seulement le bulletin que vous avez demand�, et seulement lui. Vous pouvez recevoir occasionnellement des informations concernant d\'autres bulletins ou listes d\'exp�ditions que nous offrons, si vous choisissez "Opter". <br><br> Vous pouvez "Opter" ou "Pas Opter" pour n\'importe quel bulletin ou listes d\'exp�ditions que nous offrons � n\'importe quel moment. <br><br> Une fois que vous avez choisi "Pas Opter" pour un abonnement � l\'un de nos bulletins, vous ne serez plus ajout�(e) � cette liste de nouveau. <br><br> Des r�ponses � toutes vos questions ou soucis peuvent �tre obtenues en contactant une personne ici.');
define('_NEWSUBSAMPLE','Lettre Type � un Nouvel Abonn�');
define('_LOSTUSERNAME','<b>Perdu votre nom d\'utilisateur ?</b><br>Remplissez le formulaire ci-dessous et il vous sera envoy� par email.');
define('_GETLOSTNAME','Obtenir mon Nom d\'Utilisateur Perdu');
define('_NOSUBEMAIL','Votre adresse �lectronique n\'existe pas dans notre base de donn�es.<br>Vous avez peut-�tre saisi une mauvaise adresse email ou vous ne pouvez peut-�tre pas �tre abonn�(e).');
define('_SOMEUSERREQUEST','Vous trouverez ci-dessous les informations relatives � votre Demande de Nom d\'Utilisateur sur le site');
define('_USERNAMEMAILED','Votre nom d\'utilisateur vous a �t� envoy� par email.');

// these definitions were added in version 5.30

define('_READYTOSENDSINGLES','Voulez-vous exp�dier chaque email s�par�ment ?<br>Cette m�thode prend un certain temps.');
define('_OUTOF','de');
define('_OOEMAILSSENT','emails envoy�s');
define('_CONTITOSENDHTML','Continuer � exp�dier des envois HTML');
define('_CONTITOSENDTEXT','Continuer � exp�dier des envois Texte');
// these definitions were added in version 5.20

define('_EDITSUB','Editer Abonn�');
define('_EDITSUBDETAILS','Editer D�tails Abonn�');
define('_SIDEBLOCKPOPUP','Popup Window Sideblock');
define('_UNREGONLY','Utilisateurs non-enregistr�s seulement');
define('_ALLUSERS','Tous les Utilisateurs');
define('_SIDEBLOCKPOPUPDAYS','Jours avant popup de nouveau');

// these definitions were added in version 5.00

define('_ALTMAILSYSTEM','Syst�me Mail Alt.');
define('_ALLOWUNREGISTERED','Abonn�s non-enregistr�s');
define('_BADSUBSCRIBER','<b>Adresse email invalide..</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_DUPSUBSCRIBER','<b>Adresse email en doublon.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_FROMPOSTNUKEDATA','Utilisateurs Enregistr�s');
define('_FROMMANUALDATA','Utilisateurs Non-Enregistr�s');
define('_INTROBUNREG',' et recevez les mises � jour de ce qui se passe directement dans votre bo�te aux lettres. Vous choisissez la version HTML ou la version Texte. Nous faisons le reste. Tout ce que vous devez faire pour d�buter correctement est de remplir les champs ci-dessous et cliquer sur le bouton abonnement.');
define('_NOUNREGSUBSCRIPT','D�sol�, mais nous ne permettons pas aux utilisateurs non-enregistr�s de souscrire.');
define('_SELECTUSER','S�lectionner Utilisateur');
define('_SELFSUBSCRIBERBAD','<b>Adresse email invalide.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_SELFSUBSCRIBERMISS','<b>Champs Manquants lors de la Souscription.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_SUBSCRIBERNOTDEL','<b>Abonn� NON Effac�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_UNSUBINFOBUNREG',' remplissez juste LES DEUX CHAMPS comme lorsque vous avez souscrit et cliquez sur le bouton d�sabonnement ci-dessous.');


// these are standard and will most likely be left alone

define('_ADD','Ajouter');
define('_ADDNEWSUB','Ajouter un nouvel Abonn�');
define('_ADDUSER','Ajouter un Abonn�');
define('_ARCHIVEDEL','<b>Archive effac�e.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_ARCHIVESLIST','Archives de vos Envois');
define('_BACKTOMAIN','Administration des Envois');
define('_BACKTOPNADMIN','Administration PN');
define('_BASEURL','URL de votre site');
define('_BULKTEXT','Max Emails en Bcc');
define('_CLICKTOCHG','Cliquez pour modifier');
define('_CLOSEMESSAGE','Pied de page / Message de fin');
define('_CURRENTSUBHEAD','Vos informations d\'abonnement...');
define('_DATE','Date');
define('_DAYSAGO','jour(s).');
define('_DUPSUBSCRIBER','<b>Duplication d\'Abonn�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_EMAIL','Email');
define('_EMAILSSENT','<b>Tous les bulletins d\'informations ont �t� envoy�s.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_EMAILSUBJECT','Objet du mail');
define('_FOOTERMESSAGE','pnTresMailer par Tresware.com');
define('_FORMAT','Format');
define('_GOTOPAGE','aller � la page');
define('_HERE','ici');
define('_HTML','HTML');
define('_HTMLINVALID','L\'habillage <u>HTML</u> de vos E-Mails est invalide.');
define('_HTMLTPL','Habillage HTML de votre E-mail - Mod�le');
define('_IFSUBINERROR','Si vous vous �tes abonn�(e) par erreur, vous pouvez vous d�sabonner en vous rendant sur notre site gr�ce au lien ci-dessous.');
define('_IMGDELETE','Effacer');
define('_IMGPREVIEW','Aper�u');
define('_INSERT','Ins�rer');
define('_INTROA','Inscrivez-vous au <b>Bulletin d\'Informations</b> ');
define('_INTROB','et recevez les nouveaut�s par mail. Vous pouvez choisir le format HTML ou Texte. Nos envois ont lieu � la fin de chaque semaine.');
define('_ISSUE','Num�ro');
define('_JUSTRECEIVEDSUB','<b>Vous venez de recevoir une nouvelle demande de souscription � votre Bulletin d\'Informations.</b>');
define('_LASTMAILER','Dernier E-Mail recu');
define('_LISTSUB','Liste');
define('_MAILSERVER','Serveur de mail SMTP');
define('_MODDESCR','Description');
define('_MODNAME','Nom');
define('_MODPOS','Position');
define('_MODQTY','Quantit�');
define('_MODULEADDED','<b>Nouveau Module Ajout�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_MODULEDEL','<b>Module Effac�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_MODULEDOWN','<b>Module D�plac�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_MODULESLIST','Modules pnTresMailer (Ajouts)');
define('_MODULESNEWLIST','Modules Disponibles');
define('_MODULEUP','<b>Module D�plac�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_MODULEUPDATE','<b>Module Mis � Jour.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_MODVERSION','Vers.');
define('_MOREINFOSUB','vous pouvez trouver plus d\'informations � propos de vos abonn�s et envoyer un Bulletin en vous rendant � l\'administration de votre Newsletter.');
define('_MOVEBLANK','<img src="modules/pnTresMailer/images/clearpixel.gif" width="13" height="20" border="0">');
define('_MOVEDOWN','<img src="modules/pnTresMailer/images/down.gif" border="0">');
define('_MOVEUP','<img src="modules/pnTresMailer/images/up.gif" border="0">');
define('_NEWSLETTER','Bulletin d\'Informations');
define('_NEWSLETTERADMINMENU','Menu Principal pnTresMailer');
define('_NEWSUBHEAD','S\'inscrire maintenant...');
define('_NEXTISSUENUM','Prochain Num�ro');
define('_NEXTPAGE','Page Suivante');
define('_NO','Non');
define('_NONESENT','Aucun envoi');
define('_OPENMESSAGE','Ent�te / Introduction');
define('_PREVIEW','Aper�u');
define('_PREVIEWMAILER','Aper�u');
define('_PREVIOUSPAGE','Page Pr�c�dente');
define('_READYTOSEND','Etes-vous pr�t(e) � envoyer votre mailing aux abonn�s ?');
define('_REMOVE','Enlever');
define('_REPLYTOADDRESS','Adresse E-mail de r�ponse');
define('_REPLYTONAME','Nom (r�ponse)');
define('_SELFDUPSUBSCRIBER','<b>Vous �tes d�j� abonn�(e).</b><br><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_SELFSUBSCRIBERADDED','<b>Nous vous remercions pour votre inscription.</b><br>Vous allez bient�t recevoir un email de confirmation et ferez partie de notre prochain envoi.<br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_SEND','Envoi unique');
define('_SENDINGMAILER','<b>Pr�paration E-Mail au Format HTML</b>');
define('_SENDMAILER','Envoyer Maintenant');
define('_SENTHTMLNOWTEXT','<b>Mailing HTML correctement envoy�.<br>Pr�paration E-Mail au Format TEXTE.</b>');
define('_SET','Modifier');
define('_SINGLEEMAILSSENT','<b>Envoi unique r�alis�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_SUBFORMAT','Format');
define('_SUBISSUE','NewsFlash');
define('_SUBNAME','Nom');
define('_SUBSCRIBE','Souscrire');
define('_SUBSCRIBERADDED','<b>Nouvel Abonn� ajout�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
//define('_SUBSCRIBERADDED','<b>Abonn� Effac�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_SUBSCRIBERDEL','<b>Abonn� Effac�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
//define('_SUBSCRIBERDEL','<b>Abonn� Effac�.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_SUBSCRIBEREMAIL','Email de l\'Abonn�');
define('_SUBSCRIBERNAME','Nom de l\'Abonn�');
define('_SUBSCRIBERSLIST','Liste des Abonn�s');
//define('_SUBSCRIBERSLIST','Listes des Abonn�s');
define('_SUBSCRIBERUPDATED','<b>Abonn� mis � jour.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_SUBSCRIPTSERV','Abonnement.');
define('_TBACKTOMAIN','Administration pnTresMailer');
define('_TBACKTOPNADMIN','Administration PN');
define('_TDELETEARCHIVE','Effacer les Archives');
define('_TDOWN','D�placer vers le bas');
define('_TEXT','Texte');
define('_TEXTINVALID','L\'habillage de vos E-Mails au format <u>TEXTE</u> est invalide.');
define('_TEXTTPL','Habillage E-Mail Format Texte');
define('_THANKYOU','En vous remerciant');
define('_THANKYOUFORSUB','Nous vous remercions pour votre inscription � notre Bulletin d\'Informations le');
define('_TLISTARCHIVE','Liste des Abonn�s en Archive');
define('_TPREVIEWARCHIVE','Pr�visualiser le mailing archiv�');
define('_TPREVIEWMAILER','Pr�visualiser le mailing actuel');
define('_TSENDMAILER','Envoyer E-mails aux Abonn�s MAINTENANT');
define('_TUP','D�placer vers le haut');
define('_TVIEWARCHIVES','Voir les mailings archiv�s');
define('_TVIEWMODULES','G�rer les Modules');
define('_TVIEWSUBSCRIBERS','Voir tous les Abonn�s');
define('_TVIEWVARS','Pr�f�rences');
define('_UNSUB','R�siliation');
define('_UNSUBHEAD','R�silier maintenant...');
define('_UNSUBINFOA','Si ne voulez plus recevoir ce <b>Bulletin d\'Informations</b>');
define('_UNSUBINFOB','<br>cliquez sur le bouton de r�siliation ci-dessous.');
define('_UPDATE','Mise � Jour');
define('_USERNAME','Pseudo');
define('_USERSSUBSCRIBED','membre(s) abonn�(s) � votre bulletin.');
define('_VARSLIST','R�glages de l\'E-mail');
define('_VARSUPDATED','<b>Pr�f�rences mailing mises � jour.</b><br>Si vous n\'�tes pas redirig�(e) vers la bonne page, veuillez cliquer');
define('_VIEWARCHIVES','Archives');
define('_VIEWMODULES','Modules');
define('_VIEWSUBSCRIBERS','Abonn�s');
define('_VIEWUSER','Voir le profil du membre');
define('_VIEWVARS','R�glages');
define('_WHICHIS',', il y a');
define('_WHO','Qui');
define('_YES','Oui');
define('_YOUCURRENTLY','Vous avez actuellement');
define('_YOUMUSTBE','Vous devez vous connecter pour utiliser');
define('_YOURLASTNEWS','Votre dernier Bulletin d\'Informations a �t� envoy� le');
define('_YOURLASTSUB','Le dernier abonn� est');
// nouveaux definitions for 6.1 by Jazzie 28.11.2005

define('_DBREADERROR', ' Ne peut pas lire la base de donn�es.');
define('_ADDNEWCSV',   'Add subscriber from csv list');
define('_IMPORTPNUSER','Ajoutez la abonn� de la liste de csv');
define('_NODUPSUBSCRIBER', 'Des adress supprim�s ne seront pas r�import�s');
define('_IMPORTFROMPNDB', 'Ceci importera TOUS vos utilisateurs courants de PostNuke dans le nouveau module de bulletin de pnTresMailer. ');
define('_IMPORTFROMPNDBTITLE', 'importation de base l\'donn�es abonnement de pnTresMailer');
define('_IMPORTFROMPNDBCOMPLETE', 'Importation accomplie');
define('_IMPORTEDUSER', 'utilisateur import�');
define('_DUPDELETED', 'duplets supprim�s');
define('_IMPORTCSVTITLE', 'Forme D\'Entr�e Des Abonn�s CSV');
define('_IMPORTCSVHELP1', '<b>Ajoutez:</b> NOME,EMAIL <i>(aucuns espaces � la virgule)</i>');
define('_IMPORTCSVHELP2', '<b>CSV Data</b><br>nom s�par� et email avec une virgule et<br>s�parez chaque entr�e avec la ligne coupure.<br>Des instructions peuvent �tre trouv�es dans le document d\'installation.');
define('_IMPORTCSVSTART', 'Ajoutez Les Abonn�s');
define('_IMPORTPNSUCCESS', '<b>SUCC�S!</b><br><b>La liste d\'abonn� a �t� ajout�e.</b>');
define('_IMPORTTHERE','Il y a ');
define('_IMPORTDUPREMOVED', ' les entr�es doubles enlev�es.');
define('_IMPORTBLANKREMOVED', 'les entr�es blanches enlev�es.');
define('_IMPORTRESUBREMOVED', ' des resubscribers enlev�s.');

?>