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

define('_UNSUBSCRIBERSINFO', 'Cette liste vous permet de voir "qui", "comment" et "quand" chaque utilisateur a été résilié. <br> si vous supprimez quelqu\'un de cette liste, il sera de nouveau capable de se réinscrire..');
// renamed all the "modules" references to "plugins" to avoid confusion

// these definitions were added in version 5.98

define('_PNTRESMAILER_ICON_LABEL', 'Souscription au Bulletin d\'Informations');

// these definitions were added in version 5.95

define('_IDUPUNSUBSCRIBER','<b>Vous vous êtes déjà désabonné(e) une fois avec cette adresse électronique. </b> <br> si vous voulez vous ré-inscrire, vous devez entrer en contact avec l\'administrateur.<br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer ');
define('_DUPUNSUBSCRIBER','<b>Adresse électronique trouvée dans la Liste de désabonnement. </b> <br> si vous voulez vous ré-inscrire, vous devez entrer en contact avec l\'administrateur.<br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer ');
define('_ALLOWRESUBSCRIBERS','Autoriser Réinscriptions');
// Edited below: _INTROB

// these definitions were added in version 5.90

define('_ARCHIVESUPDATED','<b>Archives mises à jour.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer ');
define('_ARCHIVESSKIPPED','<b>Archives inchangées.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer ');
define('_EDITARCHHTML','Editer Archive HTML ');
define('_EDITARCHTEXT','Editer Archive Texte ');
define('_EDITNEWLETTERT','<span class="pn-title"><u>ETAPE TROIS</u> : <u>Editer Nouvel Envoi</u></span>');
define('_EDITNEWLETTER','<b>Editer le texte et l\'html de l\'archive manuellement.</b><br>Vous devez éditer les archives seulement si vous avez l\'expérience du HTML.');
define('_EDITNEWLETTERB','Editer Archive');
define('_UPDATEARCHIVEB','Mettre à Jour les Archives');
define('_SKIPARCHIVEB','Passer');
define('_PREVIEWNEWLETTERT','<span class="pn-title"><u>ETAPE DEUX</u> : <u>Prévisualiser Nouvel Envoi</u></span>');
define('_PREVIEWNEWLETTER','<b>Prévisualiser les envois avant de les faire partir.</b>');
define('_PRETEXTNEWSLETTERB','Envoi Texte');
define('_PREHTMLNEWSLETTERB','Envoi HTML');

// these definitions were added in version 5.90

define('_PERSONALEMAILS','Personaliser Emails');
define('_FRIENDREPLACE','amis');
define('_VIEW','Voir');
define('_MODAUTHOR','Détails');
define('_UNSUBSCRIBERSLIST','Utilisateurs Désabonnés');
define('_UNSUBDATE','Date Enlevée');
define('_UNSUBINFO','Détails');
define('_VIEWUNSUBLIST','Voir Info Utilisateur Désabonné');
define('_UNSUBSCRIBERDEL','<b>Non-Inscrit Effacé.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_MODPREREFNAME','Nom de Référence');
define('_MODPREDESCR','Description');
define('_MODPREVERS','Version');
define('_MODPREFILE','Nom de Fichier');
define('_MODPREEDIT','Qté Editable');
define('_MODPREADMIN','Panneau Admin');
define('_MODPREAUTHNAME','Nom Auteur');
define('_MODPREAUTHCONT','Contact Auteur');
define('_MODPREYES','Oui');
define('_MODPRENO','Non');
define('_UNSUBPRESUBID','Souscription N°');
define('_UNSUBPREDATE','Date Résiliation');
define('_UNSUBPREPNUID','Membre N°');
define('_UNSUBPRENAME','Nom');
define('_UNSUBPREEMAIL','Adresse Email');
define('_UNSUBPRELAST','Date Dernier Envoi');
define('_UNSUBPREREC','Envoi Recu');
define('_UNSUBPREIPT','Adresse IP du désabonné');
define('_UNSUBPRETP','IP désabonné');
define('_UNSUBPREBROWT','Information navigateur du désabonné');
define('_UNSUBPREBROW','Navigateur');
define('_UNSUBPREWHOT','Numéro membre du désabonné');
define('_UNSUBPREWHO','N° membre');
define('_UNSUBPRENONE','Aucun');
define('_GENERATENEWLETTERB','Générer');
define('_SENDFIX','Correctif');
define('_SENDFIXL','Correctif');
define('_SENDFIXT','Envoyer Emails de Rappel - Si l\'Envoi a échoué');
define('__READYTOSENDB','Envoyer');
define('_SENDNEWLETTERF','<span class="pn-title"><u>Envoyer un Correctif</u></span><br>Expédier le dernier envoi généré à partir des archives, en commençant par le dernier abonné qui a bien reçu un envoi.<br> Cela reprendra le processus de postage où vous vous êtes arrêté s\'il y a eu des problèmes. <br> < b> Utiliser seulement s\'il y a eu des problèmes.</b>');
define('_READYTOSENDF','<b>Continuer à expédier en utilisant la méthode des Email de Masse. </b > <br> Cela enverra vos emails en utilisant l\'en-tête BCC (copie cachée).');
define('_READYTOSENDSINGLESF','<b>>Continuer à expédier chaque email séparément ?</b><br>Cette méthode les enverra un par un et prendra beaucoup plus de temps.');

// these definitions were added in version 5.70

define('_GENERATENEWLETTER','<b>Vous voulez produire une nouvelle lettre pour les archives ?</b><br>Elle sera alors la prochaine lettre envoyée à tous vos abonnés.');
define('_GENERATENEWLETTERT','<span class="pn-title"><u>ETAPE UNE</u> : <u>Générer Nouvel Envoi</u></span>');
define('_LOOPTEXT','Emails Envoyés Avant Rafraîchissement');
define('_ARCHIVEGENERATED','<b>Le Nouvel Envoi Archivé a été Généré.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_SENDNEWLETTER','<span class="pn-title"><u>ETAPE QUATRE</u> : <u>Faire Partir Nouvel Evoi</u></span><br>Expédier le dernier envoi généré par les archives.');
// These were moved and edited from below - previous versions
define('_SENDMAILER','Générer et Expédier');
define('_TSENDMAILER','Générer une Nouvelle Lettre et Expédier aux Abonnés');
define('_READYTOSEND','<b>Etes-vous prêt(e) à expédier l\'envoi à tous vos abonnés ?</b><br>Cela enverra vos emails en utilisant l\'en-tête BCC (copie cachée).');
define('_READYTOSENDSINGLES','<b>Voulez-vous expédier chaque email séparément ?</b><br>Cette méthode les enverra un par un et prendra beaucoup plus de temps.');
define('_YOURLASTNEWS','Votre dernier bulletin a été <u>archivé</u> on');

// these definitions were added in version 5.50

define('_PHPVERFIX','Activer correctif PHP 4.2.3');
define('_SUBEMAIL','Adresse');
define('_SENDONENOW','Envoyer');
define('_EDITPNDETAILS','Editer Détails PN');
define('_NOPNDETAILS','Cet abonné n\'est pas enregistré.');
define('_HTMLONLYSUB','Souscriptions HTML seulement');
define('_HTMLONLYOPT','HTML Seulement');
// Edited below: _EDITSUBDETAILS, _SEND

// these definitions were added in version 5.34

define('_ARCHSENT','Archive Envoyée');

// these definitions were added in version 5.33

define('_PRIVACYLINK','Politique de respect de la vie privée');
define('_PRIVACYTITLE','Politique de respect de la vie privée du Bulletin');
define('_PRIVACYSTATEMENT','Nous respectons une politique "anti-spam" stricte. Votre adresse électronique ne sera ni vendue, ni cédée, en aucune façon, à un tiers si vous vous abonnez à un de nos bulletins ou une de nos listes de discussion. <br> <br> Si vous signez pour un bulletin d\'information par email avec nous, vous recevrez seulement le bulletin que vous avez demandé, et seulement lui. Vous pouvez recevoir occasionnellement des informations concernant d\'autres bulletins ou listes d\'expéditions que nous offrons, si vous choisissez "Opter". <br><br> Vous pouvez "Opter" ou "Pas Opter" pour n\'importe quel bulletin ou listes d\'expéditions que nous offrons à n\'importe quel moment. <br><br> Une fois que vous avez choisi "Pas Opter" pour un abonnement à l\'un de nos bulletins, vous ne serez plus ajouté(e) à cette liste de nouveau. <br><br> Des réponses à toutes vos questions ou soucis peuvent être obtenues en contactant une personne ici.');
define('_NEWSUBSAMPLE','Lettre Type à un Nouvel Abonné');
define('_LOSTUSERNAME','<b>Perdu votre nom d\'utilisateur ?</b><br>Remplissez le formulaire ci-dessous et il vous sera envoyé par email.');
define('_GETLOSTNAME','Obtenir mon Nom d\'Utilisateur Perdu');
define('_NOSUBEMAIL','Votre adresse électronique n\'existe pas dans notre base de données.<br>Vous avez peut-être saisi une mauvaise adresse email ou vous ne pouvez peut-être pas être abonné(e).');
define('_SOMEUSERREQUEST','Vous trouverez ci-dessous les informations relatives à votre Demande de Nom d\'Utilisateur sur le site');
define('_USERNAMEMAILED','Votre nom d\'utilisateur vous a été envoyé par email.');

// these definitions were added in version 5.30

define('_READYTOSENDSINGLES','Voulez-vous expédier chaque email séparément ?<br>Cette méthode prend un certain temps.');
define('_OUTOF','de');
define('_OOEMAILSSENT','emails envoyés');
define('_CONTITOSENDHTML','Continuer à expédier des envois HTML');
define('_CONTITOSENDTEXT','Continuer à expédier des envois Texte');
// these definitions were added in version 5.20

define('_EDITSUB','Editer Abonné');
define('_EDITSUBDETAILS','Editer Détails Abonné');
define('_SIDEBLOCKPOPUP','Popup Window Sideblock');
define('_UNREGONLY','Utilisateurs non-enregistrés seulement');
define('_ALLUSERS','Tous les Utilisateurs');
define('_SIDEBLOCKPOPUPDAYS','Jours avant popup de nouveau');

// these definitions were added in version 5.00

define('_ALTMAILSYSTEM','Système Mail Alt.');
define('_ALLOWUNREGISTERED','Abonnés non-enregistrés');
define('_BADSUBSCRIBER','<b>Adresse email invalide..</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_DUPSUBSCRIBER','<b>Adresse email en doublon.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_FROMPOSTNUKEDATA','Utilisateurs Enregistrés');
define('_FROMMANUALDATA','Utilisateurs Non-Enregistrés');
define('_INTROBUNREG',' et recevez les mises à jour de ce qui se passe directement dans votre boîte aux lettres. Vous choisissez la version HTML ou la version Texte. Nous faisons le reste. Tout ce que vous devez faire pour débuter correctement est de remplir les champs ci-dessous et cliquer sur le bouton abonnement.');
define('_NOUNREGSUBSCRIPT','Désolé, mais nous ne permettons pas aux utilisateurs non-enregistrés de souscrire.');
define('_SELECTUSER','Sélectionner Utilisateur');
define('_SELFSUBSCRIBERBAD','<b>Adresse email invalide.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_SELFSUBSCRIBERMISS','<b>Champs Manquants lors de la Souscription.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_SUBSCRIBERNOTDEL','<b>Abonné NON Effacé.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_UNSUBINFOBUNREG',' remplissez juste LES DEUX CHAMPS comme lorsque vous avez souscrit et cliquez sur le bouton désabonnement ci-dessous.');


// these are standard and will most likely be left alone

define('_ADD','Ajouter');
define('_ADDNEWSUB','Ajouter un nouvel Abonné');
define('_ADDUSER','Ajouter un Abonné');
define('_ARCHIVEDEL','<b>Archive effacée.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
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
define('_DUPSUBSCRIBER','<b>Duplication d\'Abonné.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_EMAIL','Email');
define('_EMAILSSENT','<b>Tous les bulletins d\'informations ont été envoyés.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_EMAILSUBJECT','Objet du mail');
define('_FOOTERMESSAGE','pnTresMailer par Tresware.com');
define('_FORMAT','Format');
define('_GOTOPAGE','aller à la page');
define('_HERE','ici');
define('_HTML','HTML');
define('_HTMLINVALID','L\'habillage <u>HTML</u> de vos E-Mails est invalide.');
define('_HTMLTPL','Habillage HTML de votre E-mail - Modèle');
define('_IFSUBINERROR','Si vous vous êtes abonné(e) par erreur, vous pouvez vous désabonner en vous rendant sur notre site grâce au lien ci-dessous.');
define('_IMGDELETE','Effacer');
define('_IMGPREVIEW','Aperçu');
define('_INSERT','Insérer');
define('_INTROA','Inscrivez-vous au <b>Bulletin d\'Informations</b> ');
define('_INTROB','et recevez les nouveautés par mail. Vous pouvez choisir le format HTML ou Texte. Nos envois ont lieu à la fin de chaque semaine.');
define('_ISSUE','Numéro');
define('_JUSTRECEIVEDSUB','<b>Vous venez de recevoir une nouvelle demande de souscription à votre Bulletin d\'Informations.</b>');
define('_LASTMAILER','Dernier E-Mail recu');
define('_LISTSUB','Liste');
define('_MAILSERVER','Serveur de mail SMTP');
define('_MODDESCR','Description');
define('_MODNAME','Nom');
define('_MODPOS','Position');
define('_MODQTY','Quantité');
define('_MODULEADDED','<b>Nouveau Module Ajouté.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_MODULEDEL','<b>Module Effacé.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_MODULEDOWN','<b>Module Déplacé.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_MODULESLIST','Modules pnTresMailer (Ajouts)');
define('_MODULESNEWLIST','Modules Disponibles');
define('_MODULEUP','<b>Module Déplacé.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_MODULEUPDATE','<b>Module Mis à Jour.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_MODVERSION','Vers.');
define('_MOREINFOSUB','vous pouvez trouver plus d\'informations à propos de vos abonnés et envoyer un Bulletin en vous rendant à l\'administration de votre Newsletter.');
define('_MOVEBLANK','<img src="modules/pnTresMailer/images/clearpixel.gif" width="13" height="20" border="0">');
define('_MOVEDOWN','<img src="modules/pnTresMailer/images/down.gif" border="0">');
define('_MOVEUP','<img src="modules/pnTresMailer/images/up.gif" border="0">');
define('_NEWSLETTER','Bulletin d\'Informations');
define('_NEWSLETTERADMINMENU','Menu Principal pnTresMailer');
define('_NEWSUBHEAD','S\'inscrire maintenant...');
define('_NEXTISSUENUM','Prochain Numéro');
define('_NEXTPAGE','Page Suivante');
define('_NO','Non');
define('_NONESENT','Aucun envoi');
define('_OPENMESSAGE','Entête / Introduction');
define('_PREVIEW','Aperçu');
define('_PREVIEWMAILER','Aperçu');
define('_PREVIOUSPAGE','Page Précédente');
define('_READYTOSEND','Etes-vous prêt(e) à envoyer votre mailing aux abonnés ?');
define('_REMOVE','Enlever');
define('_REPLYTOADDRESS','Adresse E-mail de réponse');
define('_REPLYTONAME','Nom (réponse)');
define('_SELFDUPSUBSCRIBER','<b>Vous êtes déjà abonné(e).</b><br><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_SELFSUBSCRIBERADDED','<b>Nous vous remercions pour votre inscription.</b><br>Vous allez bientôt recevoir un email de confirmation et ferez partie de notre prochain envoi.<br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_SEND','Envoi unique');
define('_SENDINGMAILER','<b>Préparation E-Mail au Format HTML</b>');
define('_SENDMAILER','Envoyer Maintenant');
define('_SENTHTMLNOWTEXT','<b>Mailing HTML correctement envoyé.<br>Préparation E-Mail au Format TEXTE.</b>');
define('_SET','Modifier');
define('_SINGLEEMAILSSENT','<b>Envoi unique réalisé.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_SUBFORMAT','Format');
define('_SUBISSUE','NewsFlash');
define('_SUBNAME','Nom');
define('_SUBSCRIBE','Souscrire');
define('_SUBSCRIBERADDED','<b>Nouvel Abonné ajouté.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
//define('_SUBSCRIBERADDED','<b>Abonné Effacé.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_SUBSCRIBERDEL','<b>Abonné Effacé.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
//define('_SUBSCRIBERDEL','<b>Abonné Effacé.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_SUBSCRIBEREMAIL','Email de l\'Abonné');
define('_SUBSCRIBERNAME','Nom de l\'Abonné');
define('_SUBSCRIBERSLIST','Liste des Abonnés');
//define('_SUBSCRIBERSLIST','Listes des Abonnés');
define('_SUBSCRIBERUPDATED','<b>Abonné mis à jour.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_SUBSCRIPTSERV','Abonnement.');
define('_TBACKTOMAIN','Administration pnTresMailer');
define('_TBACKTOPNADMIN','Administration PN');
define('_TDELETEARCHIVE','Effacer les Archives');
define('_TDOWN','Déplacer vers le bas');
define('_TEXT','Texte');
define('_TEXTINVALID','L\'habillage de vos E-Mails au format <u>TEXTE</u> est invalide.');
define('_TEXTTPL','Habillage E-Mail Format Texte');
define('_THANKYOU','En vous remerciant');
define('_THANKYOUFORSUB','Nous vous remercions pour votre inscription à notre Bulletin d\'Informations le');
define('_TLISTARCHIVE','Liste des Abonnés en Archive');
define('_TPREVIEWARCHIVE','Prévisualiser le mailing archivé');
define('_TPREVIEWMAILER','Prévisualiser le mailing actuel');
define('_TSENDMAILER','Envoyer E-mails aux Abonnés MAINTENANT');
define('_TUP','Déplacer vers le haut');
define('_TVIEWARCHIVES','Voir les mailings archivés');
define('_TVIEWMODULES','Gérer les Modules');
define('_TVIEWSUBSCRIBERS','Voir tous les Abonnés');
define('_TVIEWVARS','Préférences');
define('_UNSUB','Résiliation');
define('_UNSUBHEAD','Résilier maintenant...');
define('_UNSUBINFOA','Si ne voulez plus recevoir ce <b>Bulletin d\'Informations</b>');
define('_UNSUBINFOB','<br>cliquez sur le bouton de résiliation ci-dessous.');
define('_UPDATE','Mise à Jour');
define('_USERNAME','Pseudo');
define('_USERSSUBSCRIBED','membre(s) abonné(s) à votre bulletin.');
define('_VARSLIST','Réglages de l\'E-mail');
define('_VARSUPDATED','<b>Préférences mailing mises à jour.</b><br>Si vous n\'êtes pas redirigé(e) vers la bonne page, veuillez cliquer');
define('_VIEWARCHIVES','Archives');
define('_VIEWMODULES','Modules');
define('_VIEWSUBSCRIBERS','Abonnés');
define('_VIEWUSER','Voir le profil du membre');
define('_VIEWVARS','Réglages');
define('_WHICHIS',', il y a');
define('_WHO','Qui');
define('_YES','Oui');
define('_YOUCURRENTLY','Vous avez actuellement');
define('_YOUMUSTBE','Vous devez vous connecter pour utiliser');
define('_YOURLASTNEWS','Votre dernier Bulletin d\'Informations a été envoyé le');
define('_YOURLASTSUB','Le dernier abonné est');
// nouveaux definitions for 6.1 by Jazzie 28.11.2005

define('_DBREADERROR', ' Ne peut pas lire la base de données.');
define('_ADDNEWCSV',   'Add subscriber from csv list');
define('_IMPORTPNUSER','Ajoutez la abonné de la liste de csv');
define('_NODUPSUBSCRIBER', 'Des adress supprimés ne seront pas réimportés');
define('_IMPORTFROMPNDB', 'Ceci importera TOUS vos utilisateurs courants de PostNuke dans le nouveau module de bulletin de pnTresMailer. ');
define('_IMPORTFROMPNDBTITLE', 'importation de base l\'données abonnement de pnTresMailer');
define('_IMPORTFROMPNDBCOMPLETE', 'Importation accomplie');
define('_IMPORTEDUSER', 'utilisateur importé');
define('_DUPDELETED', 'duplets supprimés');
define('_IMPORTCSVTITLE', 'Forme D\'Entrée Des Abonnés CSV');
define('_IMPORTCSVHELP1', '<b>Ajoutez:</b> NOME,EMAIL <i>(aucuns espaces à la virgule)</i>');
define('_IMPORTCSVHELP2', '<b>CSV Data</b><br>nom séparé et email avec une virgule et<br>séparez chaque entrée avec la ligne coupure.<br>Des instructions peuvent être trouvées dans le document d\'installation.');
define('_IMPORTCSVSTART', 'Ajoutez Les Abonnés');
define('_IMPORTPNSUCCESS', '<b>SUCCÈS!</b><br><b>La liste d\'abonné a été ajoutée.</b>');
define('_IMPORTTHERE','Il y a ');
define('_IMPORTDUPREMOVED', ' les entrées doubles enlevées.');
define('_IMPORTBLANKREMOVED', 'les entrées blanches enlevées.');
define('_IMPORTRESUBREMOVED', ' des resubscribers enlevés.');

?>