<?php
/************************************************************************
 * pnForum - The Post-Nuke Module                                       *
 * ==============================                                       *
 *                                                                      *
 * Copyright (c) 2001-2004 by the pnForum Module Development Team       *
 * http://www.pnforum.de/                                               *
 ************************************************************************
 * Modified version of:                                                 *
 ************************************************************************
 * phpBB version 1.4                                                    *
 * begin                : Wed July 19 2000                              *
 * copyright            : (C) 2001 The phpBB Group                      *
 * email                : support@phpbb.com                             *
 ************************************************************************
 * License                                                              *
 ************************************************************************
 * This program is free software; you can redistribute it and/or modify *
 * it under the terms of the GNU General Public License as published by *
 * the Free Software Foundation; either version 2 of the License, or    *
 * (at your option) any later version.                                  *
 *                                                                      *
 * This program is distributed in the hope that it will be useful,      *
 * but WITHOUT ANY WARRANTY; without even the implied warranty of       *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        *
 * GNU General Public License for more details.                         *
 *                                                                      *
 * You should have received a copy of the GNU General Public License    *
 * along with this program; if not, write to the Free Software          *
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 *
 * USA                                                                  *
 ************************************************************************
 *
 * french language defines
 * @version $Id: global.php,v 1.17 2005/11/23 14:52:31 landseer Exp $
 * @author various
 * @copyright 2004 by pnForum team
 * @package pnForum
 * @license GPL <http://www.gnu.org/licenses/gpl.html>
 * @link http://www.pnforum.de
 *
 ************************************************************************
 * Traduction fran�aise : Franck Barbenoire, le 18 janvier 2005         *
 * Traduction fran�aise : Chestnut, le 11 septembre 2005                *
 ************************************************************************/

//nouveau (sp?, damn, I should have learned french in school, but latin was more interesting :-))

// alphasorting starts here

//
// A
//
define('_PNFORUM_ACCOUNT_INFORMATION', 'Information des membres - IP et compte');
define('_PNFORUM_ACTIONS','Actions');
define('_PNFORUM_ACTIVE_FORUMS','forums les plus actifs :');
define('_PNFORUM_ACTIVE_POSTERS','membres les plus actifs :');
define('_PNFORUM_ADD','Ajouter');
define('_PNFORUM_ADDNEWCATEGORY', '-- ajouter une nouvelle cat�gorie --');
define('_PNFORUM_ADDNEWFORUM', '-- ajouter un nouveau forum --');
define('_PNFORUM_ADD_FAVORITE_FORUM','Ajouter un forum aux favoris');
define('_PNFORUM_ADMINADVANCEDCONFIG', 'Configuration avanc�e');
define('_PNFORUM_ADMINADVANCEDCONFIG_HINT', 'Attention : De mauvais param�tres peuvent avoir des effets secondaires n�gatifs. Si vous ne comprenez pas ce qui se passe ici, ne prenez pas de risque et laissez la configuration comme elle est.');
define('_PNFORUM_ADMINADVANCEDCONFIG_INFO', 'Attention, mettre � jour la configuration avanc�e !');
define('_PNFORUM_ADMINBADWORDS_TITLE','Administration des mots censur�s');
define('_PNFORUM_ADMINCATADD','Ajouter une cat�gorie');
define('_PNFORUM_ADMINCATADD_INFO','Ce lien vous permettra d\'ajouter une nouvelle cat�gorie dans laquelle ajouter des forums');
define('_PNFORUM_ADMINCATDELETE','Supprimer une cat�gorie');
define('_PNFORUM_ADMINCATDELETE_INFO','Ce lien vous permettra de supprimer une cat�gorie de la base de donn�es');
define('_PNFORUM_ADMINCATEDIT','Modifier le titre d\'une cat�gorie');
define('_PNFORUM_ADMINCATEDIT_INFO','Ce lien vous permettra de modifier le titre d\'une cat�gorie');
define('_PNFORUM_ADMINCATORDER','R�organiser les cat�gories');
define('_PNFORUM_ADMINCATORDER_INFO','Ce lien vous permettra de changer l\'ordre d\'affichage des cat�gories dans la page d\'index');
define('_PNFORUM_ADMINFORUMADD','Ajouter un forum');
define('_PNFORUM_ADMINFORUMADD_INFO','Ce lien vous emmenera vers vers une page o� vous pouvez ajouter un forum � la base de donn�es');
define('_PNFORUM_ADMINFORUMEDIT','Modifier un forum');
define('_PNFORUM_ADMINFORUMEDIT_INFO','Ce lien vous permettra de modifier un forum existant');
define('_PNFORUM_ADMINFORUMOPTIONS','Options des forums');
define('_PNFORUM_ADMINFORUMOPTIONS_INFO','Ce lien vous permettra de modifier les options des forums');
define('_PNFORUM_ADMINFORUMORDER','R�organiser les forums');
define('_PNFORUM_ADMINFORUMORDER_INFO','Cela vous permet de changer l\'ordre dans lequels les forums sont affich�s dans la page d\'index');
define('_PNFORUM_ADMINFORUMSPANEL','Administration de pnForum');
define('_PNFORUM_ADMINFORUMSYNC','Synchroniser les forums par rapport � l\'index des sujets');
define('_PNFORUM_ADMINFORUMSYNC_INFO','Ce lien vous permettra de synchroniser le forum avec l\'index des sujets pour r�parer des incoh�rences qui pourraient exister');
define('_PNFORUM_ADMINHONORARYASSIGN','Affecter un titre honorifique');
define('_PNFORUM_ADMINHONORARYASSIGN_INFO','Ce lien vous permettra d\'affecter des titres honorifiques');
define('_PNFORUM_ADMINHONORARYRANKS','Administrer les titres honorifiques');
define('_PNFORUM_ADMINHONORARYRANKS_INFO','Ici, vous pouvez affecter des titres honorifiques � des membres particuliers.');
define('_PNFORUM_ADMINRANKS','Administrer les notations');
define('_PNFORUM_ADMINRANKS_INFO','Ce lien vous permettra d\'ajouter/modifier/supprimer des notations sur les membres en fonction du nombre de messages post�s');
define('_PNFORUM_ADMINUSERRANK_IMAGE','Image');
define('_PNFORUM_ADMINUSERRANK_INFO','Pour modifier une notation, changez les valeurs dans les cases de texte et puis cliquez sur le bouton "Modifier".<BR>Pour supprimer une notation, cliquez sur le bouton "Supprimer".');
define('_PNFORUM_ADMINUSERRANK_INFO2','Utilisez ce formulaire pour ajouter une notation dans la base de donn�es.');
define('_PNFORUM_ADMINUSERRANK_MAX','Nombre max de messages');
define('_PNFORUM_ADMINUSERRANK_MIN','Nombre min de messages');
define('_PNFORUM_ADMINUSERRANK_TITLE','Administration des notations des membres');
define('_PNFORUM_ADMINUSERRANK_TITLE2','Notation');
define('_PNFORUM_ADMIN_SYNC','Synchroniser');
define('_PNFORUM_ALLPNTOPIC', 'tous les sujets');
define('_PNFORUM_AND', 'et');
define('_PNFORUM_ASSIGN','Affecter �');
define('_PNFORUM_ATTACHSIGNATURE', 'Attacher ma signature');
define('_PNFORUM_AUTHOR','Auteur');
define('_PNFORUM_AUTOMATICDISCUSSIONMESSAGE', 'Cr�er automatiquement un sujet des �l�ments en attente');
define('_PNFORUM_AUTOMATICDISCUSSIONSUBJECT', 'Cr�er automatiquement un sujet');

//
// B
//
define('_PNFORUM_BACKTOFORUMADMIN', 'Retour au forum admin');
define('_PNFORUM_BACKTOSUBMISSION', 'Lien vers l\'Article');
define('_PNFORUM_BASEDONLASTXMINUTES', 'Donn�es pour les %m% derni�res minutes');
define('_PNFORUM_BLOCK_PARAMETERS', 'Param�tres');
define('_PNFORUM_BLOCK_PARAMETERS_HINT', 'liste s�par�e par des virgules, e.g.. maxposts=5,forum_id=27 ');
define('_PNFORUM_BLOCK_TEMPLATENAME', 'Nom du fichier template');
define('_PNFORUM_BODY','Corps du message');
define('_PNFORUM_BOTTOM','Fin');

//
// C
//
define('_PNFORUM_CANCELPOST','Ne pas envoyer');
define('_PNFORUM_CATEGORIES','Cat�gories');
define('_PNFORUM_CATEGORY','Cat�gorie');
define('_PNFORUM_CATEGORYINFO', 'Informations sur la cat�gorie');
define('_PNFORUM_CHANGE_FORUM_ORDER','R�organiser les forums');
define('_PNFORUM_CHANGE_POST_ORDER','R�organiser les messages');
define('_PNFORUM_CHOOSECATWITHFORUMS4REORDER','S�lectionnez une cat�gorie contenant les forums � r�organiser');
define('_PNFORUM_CHOOSEFORUMEDIT','S�lectionnez le forum � modifier');
define('_PNFORUM_CREATEFORUM_INCOMPLETE','Vous n\'avez pas rempli tous les champs obligatoires du formulaire.<br> Avez vous d�sign� au moins un mod�rateur ? Revenez en arri�re et corrigez le formulaire');
define('_PNFORUM_CREATESHADOWTOPIC','Cr�er un sujet cach�');
define('_PNFORUM_CURRENT', 'courant');

//
// D
//
define('_PNFORUM_DATABASEINUSE', 'Base de donn�es utilis�e');
define('_PNFORUM_DATE','Date');
define('_PNFORUM_DELETE','Supprimer ce message');
define('_PNFORUM_DELETETOPIC','Supprimer ce sujet');
define('_PNFORUM_DELETETOPICS','Supprimer les sujets s�lectionn�s');
define('_PNFORUM_DELETETOPIC_INFO', 'En appuyant sur le bouton de suppression � la fin de ce formulaire, le sujet s�lectionn� et tous les messages qui en d�pendent seront <strong>d�finitivement</strong> supprim�s.');
define('_PNFORUM_DESCRIPTION', 'Description');
define('_PNFORUM_DISCUSSINFORUM', 'Discuter de cette proposition dans le forum');
define('_PNFORUM_DOWN','Vers le bas');

//
// E
//
define('_PNFORUM_EDITBY','modifi� par :');
define('_PNFORUM_EDITDELETE', 'modifier/supprimer');
define('_PNFORUM_EDITFORUMS','Modifier les forums');
define('_PNFORUM_EDITPREFS','Modifier vos pr�f�rences');
define('_PNFORUM_EDIT_POST','Modifier le message');
define('_PNFORUM_EMAILTOPICMSG','Bonjour ! Visitez ce site, cela devrait vous int�resser');
define('_PNFORUM_EMAIL_TOPIC', 'envoyer en tant qu\'email');
define('_PNFORUM_EMPTYMSG','Vous devez entrer un message. Les messages vides ne sont pas autoris�s. Revenez en arri�re et r�essayez.');
define('_PNFORUM_ERRORLOGGINGIN', 'Connexion Impossible, Pseudo ou mot de passe invalide !');
define('_PNFORUM_ERRORMAILTO', 'Envoyer un rapport de bug');
define('_PNFORUM_ERROROCCURED', 'L\'erreur suivante s\'est produite :');
define('_PNFORUM_ERROR_CONNECT','Erreur de connexion � la base de donn�es !<br>');
define('_PNFORUM_EXTENDEDOPTIONSAFTERSAVING', 'Options suppl�mentaires apr�s l\'enregistrement');
define('_PNFORUM_EXTERNALSOURCE', 'Source Externe');
define('_PNFORUM_EXTERNALSOURCEURL_HINT', 'Si un Fil RSS est disponible, entrez son identifiant tel qu\'il appara�t dans le module RSS'); // <--- beurk one.........

//
// F
//
define('_PNFORUM_FAILEDTOCREATEHOOK', 'Echec de la cr�ation de l\'extension');
define('_PNFORUM_FAILEDTODELETEHOOK', 'Echec de la suppression de l\'extension');
define('_PNFORUM_FAVORITES','Favoris');
define('_PNFORUM_FAVORITE_STATUS','Etat des favoris');
define('_PNFORUM_FORUM','Forum');
define('_PNFORUM_FORUMID', 'ID des forums');
define('_PNFORUM_FORUMINFO', 'Informations sur ce forum');
define('_PNFORUM_FORUMS','Forums');
define('_PNFORUM_FORUMSINDEX','Index du forum');
define('_PNFORUM_FORUM_EDIT_FORUM','Modifier le forum');
define('_PNFORUM_FORUM_EDIT_ORDER','Modifier l\'ordre');
define('_PNFORUM_FORUM_NOEXIST','Erreur - Le forum/sujet que vous avez s�lectionn� n\'existe pas. Retournez en arri�re et r�essayez.');
define('_PNFORUM_FORUM_REORDER','R�organiser');
define('_PNFORUM_FORUM_SEQUENCE_DESCRIPTION','Si vous voulez d�placer un forum d\'une seule position, cliquez sur la fl�che vers le haut ou vers le bas. Si un forum a un num�ro d\'ordre � 0, il sera affich� par ordre lexicographique. L\'ordre lexicographique a priorit� sur l\'ordre num�rique.  Cliquez sur le num�ro d\'ordre pour le modifier.');

//
// G
//
define('_PNFORUM_GOTOPAGE','Aller � la page');
define('_PNFORUM_GOTO_CAT','aller � la categorie');
define('_PNFORUM_GOTO_FORUM','aller au forum');
define('_PNFORUM_GOTO_LATEST', 'voir le dernier message');
define('_PNFORUM_GOTO_TOPIC','aller au sujet');
define('_PNFORUM_GROUP', 'Groupe');

//
// H
//
define('_PNFORUM_HOMEPAGE','Accueil');
define('_PNFORUM_HONORARY_RANK','Titre honorifique');
define('_PNFORUM_HONORARY_RANKS','Titres honorifiques');
define('_PNFORUM_HOST', 'H�te');
define('_PNFORUM_HOTNEWTOPIC', 'Sujet chaud contenant des nouveaux messages');
define('_PNFORUM_HOTTHRES','Plus de %d messages');
define('_PNFORUM_HOTTOPIC', 'Sujet chaud');
define('_PNFORUM_HOURS','heures');

//
// I
//
define('_PNFORUM_ILLEGALMESSAGESIZE', 'Taille de message ill�gale (max: 65535 caract�res');
define('_PNFORUM_IMAGE', 'Image');
define('_PNFORUM_IP_USERNAMES', 'Nom des utilisateurs actifs avec leurs totaux et IP');
define('_PNFORUM_ISLOCKED','Le sujet est verrouill�. Pas de nouveau message');

//
// J
//
define('_PNFORUM_JOINTOPICS', 'Fusionner des sujets');
define('_PNFORUM_JOINTOPICS_INFO', 'Fusionner deux sujets');
define('_PNFORUM_JOINTOPICS_TOTOPIC', 'Sujet cible');

//
// L
//
define('_PNFORUM_LAST','derni�res');
define('_PNFORUM_LAST24','derni�res 24 heures');
define('_PNFORUM_LASTCHANGE','derni�re modification le ');
define('_PNFORUM_LASTPOST','Dernier message');
define('_PNFORUM_LASTPOSTINGBY', 'Dernier message par :');
define('_PNFORUM_LASTPOSTSTRING','%s<br />par %s');
define('_PNFORUM_LASTVISIT', 'derni�re visite');
define('_PNFORUM_LASTWEEK','semaine derni�re');
define('_PNFORUM_LAST_SEEN', 'derni�re visite');
define('_PNFORUM_LATEST','Derniers messages');
define('_PNFORUM_LOCKTOPIC','Verrouillez ce sujet');
define('_PNFORUM_LOCKTOPICS','Verrouiller les sujets s�lectionn�s');
define('_PNFORUM_LOCKTOPIC_INFO', 'Quand vous pressez le bouton de verrouillage � la fin de ce formulaire, le sujet s�lectionn� sera <strong>verrouill�</strong>. Vous pourrez le d�verouiller plus tard.');

//
// M
//
define('_PNFORUM_MAIL2FORUM', 'Mail2Forum');
define('_PNFORUM_MAIL2FORUMPOSTS', 'Listes de diffusion');
define('_PNFORUM_MAILTO_NOBODY','Vous devez entrer un message.');
define('_PNFORUM_MAILTO_WRONGEMAIL','Vous n\'avez pas saisi d\'adresse email pour le destinataire ou elle n\'est pas correcte.');
define('_PNFORUM_MANAGETOPICSUBSCRIPTIONS', 'Administrer les inscriptions aux sujets');
define('_PNFORUM_MANAGETOPICSUBSCRIPTIONS_HINT', 'Vous pouvez g�rer les inscriptions aux sujets sur cette page.');
define('_PNFORUM_MINSHORT', 'min');
define('_PNFORUM_MODERATE','Mod�rer');
define('_PNFORUM_MODERATEDBY','Mod�r� par');
define('_PNFORUM_MODERATE_JOINTOPICS_HINT', 'Si vous d�sirez fusionner des sujets, s�lectionnez ici le sujet cible'); // Error in English file
define('_PNFORUM_MODERATE_MOVETOPICS_HINT','Choisissez le forum cible o� d�placer les sujets :');
define('_PNFORUM_MODERATION_NOTICE', 'Requ�te de Mod�ration');
define('_PNFORUM_MODERATOR','Mod�rateur');
define('_PNFORUM_MODERATORSOPTIONS', 'Options - Mod�rateurs');
define('_PNFORUM_MODULEREFERENCE', 'R�f�rence Module');
define('_PNFORUM_MODULEREFERENCE_HINT', 'Utilis� comme option de commentaires, tous les �l�ments propos�s de ce module auront un sujet associ� dans le forum. Cette liste ne contient que les modules pour lesquels le pnForum a �t� activ�.');
define('_PNFORUM_MORETHAN','Plus de ');
define('_PNFORUM_MOVED_SUBJECT', 'd�plac�');
define('_PNFORUM_MOVEPOST', 'D�placer un message');
define('_PNFORUM_MOVEPOST_INFO', 'D�placer un message d\'un sujet � un autre');
define('_PNFORUM_MOVEPOST_TOTOPIC', 'Sujet cible');
define('_PNFORUM_MOVETOPIC','D�placer ce sujet');
define('_PNFORUM_MOVETOPICS','D�placer les sujets s�lectionn�s');
define('_PNFORUM_MOVETOPICTO','D�placez le sujet vers :');
define('_PNFORUM_MOVETOPIC_INFO', 'Quand vous pressez le bouton de d�placement � la fin de ce formulaire, le sujet s�lectionn� et les messages qu\'il contient seront <strong>d�plac�s</strong> vers le forum s�lectionn�. Note: vous n\'�tes autoris� � d�placer que vers les forums dont vous �tes mod�rateur. L\'administrateur peut d�placer n\importe quel sujet dans n\importe quel forum.');

//
// N
//
define('_PNFORUM_NEWEST_FIRST','Afficher en premier les nouveaux messages');
define('_PNFORUM_NEWPOSTS','Nouveaux messages pr�sents depuis votre derni�re visite.');
define('_PNFORUM_NEWTOPIC','nouveau sujet');
define('_PNFORUM_NEW_THREADS','Nouveau sujet');
define('_PNFORUM_NEXTPAGE','Page suivante');
define('_PNFORUM_NEXT_TOPIC','vers le sujet suivant');
define('_PNFORUM_NOAUTH', 'Action interdite');
define('_PNFORUM_NOAUTHPOST','Note: non autoris� � envoyer des commentaires');
define('_PNFORUM_NOAUTH_MODERATE','Vous n\'�tes pas le mod�rateur de ce forum, vous ne pouvez donc pas ex�cuter cette action.');
define('_PNFORUM_NOAUTH_TOADMIN', 'Vous n\'avez pas l\'autorisation d\'administrer ce module');
define('_PNFORUM_NOAUTH_TOMODERATE', 'Vous n\'avez pas l\'autorisation de mod�rer cette cat�gorie ou ce forum');
define('_PNFORUM_NOAUTH_TOREAD', 'Vous n\'avez pas l\'autorisation de lire cette cat�gorie ou ce forum');
define('_PNFORUM_NOAUTH_TOSEE', 'Vous n\'avez pas l\'autorisation de voir cette cat�gorie ou ce forum');
define('_PNFORUM_NOAUTH_TOWRITE', 'Vous n\'avez pas l\'autorisation d\'�crire dans cette cat�gorie ou ce forum');
define('_PNFORUM_NOCATEGORIES', 'Pas de cat�gorie');
define('_PNFORUM_NOEXTERNALSOURCE', 'Aucun source externe');
define('_PNFORUM_NOFAVORITES','Pas de favoris');
define('_PNFORUM_NOFORUMS', 'pas de forum');
define('_PNFORUM_NOHOOKEDMODULES', 'Aucun module trouv�'); //no hooked module found');
define('_PNFORUM_NOHTMLALLOWED', 'Tags HTML interdits (except� � l\'int�rieur des balises [code][/code])');
define('_PNFORUM_NOJOINTO', 'Aucun sujet cible pour fusionner la s�lection');
define('_PNFORUM_NOMODERATORSASSIGNED', 'pas de mod�rateur d�sign�');
define('_PNFORUM_NOMOVETO', 'Aucun forum cible o� d�placer la s�lection');
define('_PNFORUM_NONE', 'aucun');
define('_PNFORUM_NONEWPOSTS','Pas de nouveau message depuis votre derni�re visite.');
define('_PNFORUM_NOPNTOPIC', 'aucun sujet');
define('_PNFORUM_NOPOSTLOCK','Vous ne pouvre pas r�pondre � ce message, le sujet est verrouill�.');
define('_PNFORUM_NOPOSTS','Pas de message');
define('_PNFORUM_NORANK', 'Pas de titre honorifique');
define('_PNFORUM_NORANKSINDATABASE', 'Pas de titre honorifique');
define('_PNFORUM_NORMALNEWTOPIC', 'Sujet normal contenant des nouveaux messages');
define('_PNFORUM_NORMALTOPIC', 'Sujet normal');
define('_PNFORUM_NOSMILES','Il n\'y a pas d\'�moticon dans la base de donn�es');
define('_PNFORUM_NOSPECIALRANKSINDATABASE', 'Aucun rang sp�cial dans la base de donn�es. Vous pouvez en ajouter un par le formulaire ci-bas.');
define('_PNFORUM_NOSUBJECT', 'Aucun sujet');
define('_PNFORUM_NOTEDIT','Vous ne pouvez pas modifier les messages dont vous n\'�tes pas l\'auteur.');
define('_PNFORUM_NOTIFYBODY1','Forums');
define('_PNFORUM_NOTIFYBODY2','�crit �');
define('_PNFORUM_NOTIFYBODY3','R�pondre � ce message : ');
define('_PNFORUM_NOTIFYBODY4','Faire d�filer les fils de discussion :');
define('_PNFORUM_NOTIFYBODY5','Vous recevez ce message car vous avez demand� � recevoir les messages du forum : ');
define('_PNFORUM_NOTIFYBODY6', 'Lien entre les Sujets et les inscriptions au Forum :');
define('_PNFORUM_NOTIFYME', 'M\'avertir lorsqu\'une r�ponse est envoy�e');
define('_PNFORUM_NOTIFYMODBODY1', 'Requ�te de mod�ration');
define('_PNFORUM_NOTIFYMODBODY2', 'Commentaire');
define('_PNFORUM_NOTIFYMODBODY3', 'Lien au sujet');
define('_PNFORUM_NOTIFYMODERATOR', 'avertir un mod�rateur');
define('_PNFORUM_NOTIFYMODERATORTITLE', 'Avertir un mod�rateur � propos d\'un message');
define('_PNFORUM_NOTOPICS','Il n\'y a pas de sujet dans ce forum.');
define('_PNFORUM_NOTOPICSUBSCRIPTIONSFOUND', 'Aucune inscription trouv�e');
define('_PNFORUM_NOTSUBSCRIBED','Vous n\'�tes pas inscrit � ce forum');
define('_PNFORUM_NOUSER_OR_POST','Erreur - Ce membre ou ce message n\'existe pas dans la base de donn�es.');
define('_PNFORUM_NO_FORUMS_DB', 'Pas de forum dans la base de donn�es');
define('_PNFORUM_NO_FORUMS_MOVE', 'Aucun autre forum mod�r� par vous o� aller');

//
// O
//
define('_PNFORUM_OFFLINE', 'hors ligne');
define('_PNFORUM_OKTODELETE','Supprimer ?');
define('_PNFORUM_OLDEST_FIRST','Afficher en premier les plus vieux messages');
define('_PNFORUM_ONEREPLY','r�ponse');
define('_PNFORUM_ONLINE', 'en ligne');
define('_PNFORUM_OPTIONS','Options');
define('_PNFORUM_OR', 'ou');
define('_PNFORUM_OURLATESTPOSTS','Derniers messages du forum');

//
// P
//
define('_PNFORUM_PAGE','Page #');
define('_PNFORUM_PASSWORD', 'Mot de passe');
define('_PNFORUM_PASSWORDNOMATCH', 'Les mots de passe ne correspondent pas, s.v.p. revenez en arri�re pour corriger');
define('_PNFORUM_PERMDENY','Acc�s refus� !');
define('_PNFORUM_PERSONAL_SETTINGS','Pr�f�rences');
define('_PNFORUM_PNPASSWORD', 'Mot de passe PN');
define('_PNFORUM_PNPASSWORDCONFIRM', 'Confirmer le mot de passe PN');
define('_PNFORUM_PNTOPIC', 'Cat�gorie (Sujet) PostNuke');
define('_PNFORUM_PNTOPIC_HINT', '');
define('_PNFORUM_PNUSER', 'Pseudo PN');
define('_PNFORUM_POP3ACTIVE', 'Mail2Forum activ�');
define('_PNFORUM_POP3INTERVAL', 'Interval de recherche de message');
define('_PNFORUM_POP3LOGIN', 'Login Pop3');
define('_PNFORUM_POP3MATCHSTRING', 'R�gle');
define('_PNFORUM_POP3MATCHSTRINGHINT', 'La r�gle est une expression r�guli�re que doit contenir le sujet des mails pour �viter le spam. Aucune v�rification si la r�gle est vide !');
define('_PNFORUM_POP3PASSWORD', 'Mot de passe Pop3');
define('_PNFORUM_POP3PASSWORDCONFIRM', 'Confirmer le mot de passe Pop3');
define('_PNFORUM_POP3PORT', 'Port');
define('_PNFORUM_POP3SERVER', 'Serveur Pop3');
define('_PNFORUM_POP3TEST', 'Effectuer le test Pop3 apr�s la sauvegarde');
define('_PNFORUM_POP3TESTRESULTS', 'Resultats du test Pop3');
define('_PNFORUM_POST','Envoyer');
define('_PNFORUM_POSTED','Envoy�');
define('_PNFORUM_POSTER','Exp�diteur');
define('_PNFORUM_POSTS','Messages');
define('_PNFORUM_POST_GOTO_NEWEST','aller au message le plus r�cent dans ');
define('_PNFORUM_POWEREDBY', 'G�n�r� par <a href="http://www.pnforum.de/" title="pnForum">pnForum</a> Version');
define('_PNFORUM_PREFS_ASCENDING', 'Ascendant');
define('_PNFORUM_PREFS_AUTOSUBSCRIBE', 'Inscription automatique aux nouveaux sujets et messages');
define('_PNFORUM_PREFS_CHARSET', 'Jeu de caract�res par d�faut :<br /><em>(c\'est le jeu de caract�res utilis� dans les en-t�tes des emails)</em>');
define('_PNFORUM_PREFS_DELETEHOOKACTION', 'Action lorsque l\'extension d\'effacement est appel�e');
define('_PNFORUM_PREFS_DELETEHOOKACTIONLOCK', 'Supprimer le sujet');
define('_PNFORUM_PREFS_DELTEHOOKACTIONREMOVE', 'Fermer le sujet');
define('_PNFORUM_PREFS_DESCENDING', 'Descendant');
define('_PNFORUM_PREFS_EMAIL', 'Adresse email de l\'exp�diteur :<br /><em>(appara�tra dans tous les emails envoy�s par le forum)</em>');
define('_PNFORUM_PREFS_FAVORITESENABLED', 'Favoris activ�s');
define('_PNFORUM_PREFS_FIRSTNEWPOSTICON', 'Ic�ne d\'envoi du premier message :');
define('_PNFORUM_PREFS_HIDEUSERSINFORUMADMIN', 'Cacher les utilisateurs dans le forum admin');
define('_PNFORUM_PREFS_HOTNEWPOSTSICON', 'Ic�ne de sujet contenant beaucoup de messages dont beaucoup sont nouveaux :');
define('_PNFORUM_PREFS_HOTTOPIC', 'Nombre de messages au del� duquel un sujet est consid�r� comme br�lant :');
define('_PNFORUM_PREFS_HOTTOPICICON', 'Ic�ne de sujet br�lant :<br /><em>(sujet contenant beaucoup de messages)</em>');
define('_PNFORUM_PREFS_ICONS','<br /><strong>Ic�nes</strong>');
define('_PNFORUM_PREFS_INTERNALSEARCHWITHEXTENDEDFULLTEXTINDEX', 'Utiliser la recherche �tendue dans la recherche interne');
define('_PNFORUM_PREFS_INTERNALSEARCHWITHEXTENDEDFULLTEXTINDEX_HINT', '<i>La recherche �tendue permet l\'utilisation de param�tres comme "+pnforum -skype" pour trouver les messages contenant "pnforum" mais ne contenant pas "skype". Minimum requis : MySQL 4.01.</i><br /><a href="http://dev.mysql.com/doc/mysql/en/fulltext-boolean.html" title="Recherche �tendue sur MySQL">Recherche �tendue sur MySQL</a>.');
define('_PNFORUM_PREFS_LOGIP', 'Enregistrer les adresses IP :');
define('_PNFORUM_PREFS_M2FENABLED', 'Mail2Forum activ�');
define('_PNFORUM_PREFS_NEWPOSTSICON', 'Ic�ne de nouveaux messages :<br /><em>(sujet contenant de nouveaux messages depuis la derni�re visite)</em>');
define('_PNFORUM_PREFS_NO', 'Non');
define('_PNFORUM_PREFS_POSTICON', 'Ic�ne d\'envoi de message :');
define('_PNFORUM_PREFS_POSTSORTORDER', 'Ordre de tri des messages :');
define('_PNFORUM_PREFS_POSTSPERPAGE', 'Nombre de messages par page :<br /><em>(c\'est le nombre de messages d\'un sujet qui seront affich�s par page. La valeur par d�faut est 15)</em>');
define('_PNFORUM_PREFS_RANKLOCATION', 'Emplacement des ic�nes de notation :');
define('_PNFORUM_PREFS_REMOVESIGNATUREFROMPOST', 'Retirer la signature des utilisateurs des messages');
define('_PNFORUM_PREFS_REMOVESIGNATUREFROMPOST', 'Retirer la signature des utilisateurs sur les messages (Affichage)');
define('_PNFORUM_PREFS_RESTOREDEFAULTS', 'Restaurer les valeurs par d�faut');
define('_PNFORUM_PREFS_RSS2FENABLED', 'RSS2Forum activ�');
define('_PNFORUM_PREFS_SAVE', 'Enregistrer');
define('_PNFORUM_PREFS_SEARCHWITHFULLTEXTINDEX', 'Rechercher en utilisant la recherche par index');
define('_PNFORUM_PREFS_SEARCHWITHFULLTEXTINDEX_HINT', '<i>La recherche utilisant les index de texte complet requiert min. MySQL 4 ou plus r�cent et ne fonctionne pas avec les bases InnoDB. Ce drapeau sera normalement utilis� lors de l\'installation lorsque les index auront �t� cr��s. Le r�sultat de la recherche pourrait �tre vide si la requ�te est pr�sente dans un trop gran nombre de messages. C\'est une "fonctionnalit�" MySQL.</i><br /><a href="http://dev.mysql.com/doc/mysql/en/fulltext-search.html" title="Fulltext search in MySQL">Recherche Texte complet MySQL</a>.');
define('_PNFORUM_PREFS_SIGNATUREEND', 'Marque de fin de signature :');
define('_PNFORUM_PREFS_SIGNATURESTART', 'Marque de d�but de signature :');
define('_PNFORUM_PREFS_SLIMFORUM', 'Masquer les cat�gories contenant un seul forum');
define('_PNFORUM_PREFS_STRIPTAGSFROMPOST', 'Supprimer le HTML des nouveaux messages (garde le contenu entre les balises [code][/code]');
define('_PNFORUM_PREFS_TOPICICON', 'Ic�ne de sujet :');
define('_PNFORUM_PREFS_TOPICSPERPAGE', 'Nombre de sujets par page :<br /><em>(c\'est le nombre de sujets d\'un forum qui seront affich�s par page. La valeur par d�faut est 15)</em>');
define('_PNFORUM_PREFS_YES', 'Oui');
define('_PNFORUM_PREVIEW','Aper�u');
define('_PNFORUM_PREVIOUS_TOPIC','vers le sujet pr�c�dent');
define('_PNFORUM_PREVPAGE','Page pr�c�dente');
define('_PNFORUM_PRINT_POST','Imprimer le message');
define('_PNFORUM_PRINT_TOPIC','Imprimer le sujet');
define('_PNFORUM_PROFILE', 'Donn�es personnelles');

//
// Q
//
define('_PNFORUM_QUICKREPLY', 'R�ponse rapide');
define('_PNFORUM_QUICKSELECTFORUM','- selectionner -');

//
// R
//
define('_PNFORUM_RECENT_POSTS','sujets r�cents :');
define('_PNFORUM_RECENT_POST_ORDER', 'Ordre des messages r�cents dans les sujets');
define('_PNFORUM_REGISTER','S\'enregistrer');
define('_PNFORUM_REGISTRATION_NOTE','Note: les membres peuvent s\'inscrire pour recevoir les nouveaux messages');
define('_PNFORUM_REG_SINCE', 'enregistr� depuis');
define('_PNFORUM_REMEMBERME', 'Se souvenir de moi');
define('_PNFORUM_REMOVE', 'supprimer');
define('_PNFORUM_REMOVE_FAVORITE_FORUM','Supprimer des favoris');
define('_PNFORUM_REORDER','R�organiser');
define('_PNFORUM_REORDERCATEGORIES','R�organiser les cat�gories');
define('_PNFORUM_REORDERFORUMS','R�organiser les forums');
define('_PNFORUM_REPLACE_WORDS','Remplacer les mots');
define('_PNFORUM_REPLIES','R�ponses');
define('_PNFORUM_REPLY', 'r�pondre');
define('_PNFORUM_REPLYLOCKED', 'verrouill�');
define('_PNFORUM_REPLYQUOTE', 'citer');
define('_PNFORUM_REPLY_POST','R�pondre � ');
define('_PNFORUM_REPORTINGUSERNAME', 'Rapporter un utilisateur');
define('_PNFORUM_RETURNTOTOPIC', 'Retour au sujet');
define('_PNFORUM_RSS2FORUM', 'RSS2Forum');
define('_PNFORUM_RSS2FORUMPOSTS', 'Fil RSS');
define('_PNFORUM_RSSMODULENOTAVAILABLE', '<span style="color: red;">Module RSS non-disponible !</span>');
define('_PNFORUM_RSS_SUMMARY', 'Sommaire');

//
// S
//
define('_PNFORUM_SAVEPREFS','Enregistrer vos pr�f�rences');
define('_PNFORUM_SEARCH','Recherche');
define('_PNFORUM_SEARCHALLFORUMS', 'tous les forums');
define('_PNFORUM_SEARCHAND','tous les mots [AND]');
define('_PNFORUM_SEARCHBOOL', 'condition logique');
define('_PNFORUM_SEARCHFOR','Chercher');
define('_PNFORUM_SEARCHINCLUDE_ALLTOPICS', 'tous');
define('_PNFORUM_SEARCHINCLUDE_AUTHOR','Auteur');
define('_PNFORUM_SEARCHINCLUDE_BYDATE','par date');
define('_PNFORUM_SEARCHINCLUDE_BYFORUM','par forum');
define('_PNFORUM_SEARCHINCLUDE_BYTITLE','par titre');
define('_PNFORUM_SEARCHINCLUDE_DATE','Date');
define('_PNFORUM_SEARCHINCLUDE_FORUM','Cat�gorie et forum');
define('_PNFORUM_SEARCHINCLUDE_HITS', 'clics');
define('_PNFORUM_SEARCHINCLUDE_LIMIT', 'Limiter la recherche �');
define('_PNFORUM_SEARCHINCLUDE_MISSINGPARAMETERS', 'param�tres de recherche manquant');
define('_PNFORUM_SEARCHINCLUDE_NEWWIN','Afficher dans une nouvelle fen�tre');
define('_PNFORUM_SEARCHINCLUDE_NOENTRIES','Aucun message dans les forums');
define('_PNFORUM_SEARCHINCLUDE_NOLIMIT', 'Pas de limite');
define('_PNFORUM_SEARCHINCLUDE_ORDER','Ordre');
define('_PNFORUM_SEARCHINCLUDE_REPLIES','R�ponses');
define('_PNFORUM_SEARCHINCLUDE_RESULTS','Forums');
define('_PNFORUM_SEARCHINCLUDE_TITLE','Chercher dans les forums');
define('_PNFORUM_SEARCHINCLUDE_VIEWS','Affichages');
define('_PNFORUM_SEARCHOR','un seul mot [OR]');
define('_PNFORUM_SEARCHRESULTSFOR','R�sultats de la recherche');
define('_PNFORUM_SELECTACTION', 's�lectionner une action');
define('_PNFORUM_SELECTED','S�lection');
define('_PNFORUM_SELECTEDITCAT','Selectionnez une categorie');
define('_PNFORUM_SELECTREFERENCEMODULE', 'S�lectionner le module'); //select hooked module');
define('_PNFORUM_SELECTRSSFEED', 'S�lectionnez le fil RSS');
define('_PNFORUM_SELECTTARGETFORUM', 's�lectionner un forum cible');
define('_PNFORUM_SELECTTARGETTOPIC', 's�lectionner un sujet cible');
define('_PNFORUM_SENDTO','Envoyer �');
define('_PNFORUM_SEND_PM', 'Envoyer un message priv�');
define('_PNFORUM_SEPARATOR','&nbsp;::&nbsp;');
define('_PNFORUM_SETTING', 'Pr�f�rences');
define('_PNFORUM_SHADOWTOPIC_MESSAGE', 'Le message original a �t� d�plac� <a title="moved" href="%s">ici</a>.');
define('_PNFORUM_SHOWALLFORUMS','Afficher tous les forums');
define('_PNFORUM_SHOWFAVORITES','Afficher les favoris');
define('_PNFORUM_SMILES','Emoticons :');
define('_PNFORUM_SPLIT','Scinder');
define('_PNFORUM_SPLITTOPIC','Scinder le sujet');
define('_PNFORUM_SPLITTOPIC_INFO','Cela scindera le sujet avant le message s�lectionn�.');
define('_PNFORUM_SPLITTOPIC_NEWTOPIC','Sujet du nouveau message');
define('_PNFORUM_START', 'Racine');
define('_PNFORUM_STATSBLOCK','Nombre total de messages :');
define('_PNFORUM_STATUS', 'Status');
define('_PNFORUM_STICKY', 'Coll�');
define('_PNFORUM_STICKYTOPIC','Coller ce sujet');
define('_PNFORUM_STICKYTOPICS','Coller les sujets s�lectionn�s');
define('_PNFORUM_STICKYTOPIC_INFO', 'Quand vous pressez le bouton de collage � la fin du formulaire, le sujet sera <strong>coll�</strong>. Vous pourrez le d�coller ult�rieurement.');
define('_PNFORUM_SUBJECT','Sujet');
define('_PNFORUM_SUBJECT_MAX','(pas plus de 100 symboles)');
define('_PNFORUM_SUBMIT','Envoyer');
define('_PNFORUM_SUBMIT_HINT','ATTENTION : pnForum ne vous demandera pas de confirmation ! Cliquer sur Soumettre d�butera imm�diatement l\'action s�lectionn�e!');
define('_PNFORUM_SUBSCRIBE_FORUM', 's\'inscrire au forum');
define('_PNFORUM_SUBSCRIBE_STATUS','Etat de vos inscriptions');
define('_PNFORUM_SUBSCRIBE_TOPIC','s\'inscrire au sujet');
define('_PNFORUM_SYNC_FORUMINDEX', 'Index du forum synchronis�');
define('_PNFORUM_SYNC_POSTSCOUNT', 'Compteur de sujets synchronis�');
define('_PNFORUM_SYNC_TOPICS', 'Sujets synchronis�s');
define('_PNFORUM_SYNC_USERS', 'Membres de PostNuke et pnForum synchronis�s');

//
// T
//
define('_PNFORUM_TODAY','aujourd\'hui');
define('_PNFORUM_TOGGLEALL', 'Supprimer toutes les inscriptions aux sujets');
define('_PNFORUM_TOP','Top');
define('_PNFORUM_TOPIC','Sujet');
define('_PNFORUM_TOPICLOCKED', 'Sujet verrouill�');
define('_PNFORUM_TOPICS','Sujets');
define('_PNFORUM_TOPIC_NOEXIST','Erreur - Le sujet s�lectionn� n\'existe pas. Retournez en arri�re et faites un autre essai.');
define('_PNFORUM_TOPIC_STARTER','commenc� par');
define('_PNFORUM_TOTAL','Total');

//
// U
//
define('_PNFORUM_UALASTWEEK', 'derni�re semaine, sans r�ponse');
define('_PNFORUM_UNKNOWNIMAGE', 'image inconnue');
define('_PNFORUM_UNKNOWNIMAGE', 'image inconnue');
define('_PNFORUM_UNKNOWNUSER', '**utilisateur inconnu**');
define('_PNFORUM_UNLOCKTOPIC','D�verrouiller ce sujet');
define('_PNFORUM_UNLOCKTOPICS','D�verrouiller les sujets s�lectionn�s');
define('_PNFORUM_UNLOCKTOPIC_INFO', 'Quand vous pressez le bouton de d�verrouillage � la fin du formulaire, le sujet s�lectionn� sera <strong>d�verouill�</strong>. Vous pourrez le verrouiller � nouveau ult�rieurement.');
define('_PNFORUM_UNREGISTERED','Utilisateur non enregistr�');
define('_PNFORUM_UNSTICKYTOPIC','Sujet non coll�');
define('_PNFORUM_UNSTICKYTOPICS','D�coller les sujets s�lectionn�s');
define('_PNFORUM_UNSTICKYTOPIC_INFO', 'Quand vous pressez le bouton de d�collage � la fin de ce formulaire, le sujet s�lectionn� sera <strong>d�coll�</strong>. Vous pourrez le recoller ult�rieurement.');
define('_PNFORUM_UNSUBSCRIBE_FORUM','se d�sinscrire du forum');
define('_PNFORUM_UNSUBSCRIBE_TOPIC','se d�sinscrire du sujet');
define('_PNFORUM_UP','Vers le haut');
define('_PNFORUM_UPDATE','Mettre � jour');
define('_PNFORUM_USERLOGINTITLE', 'Cette fonction concerne les membres seulement');
define('_PNFORUM_USERNAME','Nom d\'utilisateur');
define('_PNFORUM_USERSONLINE', 'Utilisateurs en ligne');
define('_PNFORUM_USERS_RANKS','Notation des membres');
define('_PNFORUM_USER_IP', 'IP du Membre');

//
// V
//
define('_PNFORUM_VIEWIP', 'voir l\'adresse IP');
define('_PNFORUM_VIEWS','Affichages');
define('_PNFORUM_VIEW_IP', 'Voir l\'adresse IP');
define('_PNFORUM_VISITCATEGORY', 'visitez cette categorie');
define('_PNFORUM_VISITFORUM', 'visitez ce forum');

//
// W
//
define('_PNFORUM_WRITTENON', '�crit �');

//
// Y
//
define('_PNFORUM_YESTERDAY','hier');

?>