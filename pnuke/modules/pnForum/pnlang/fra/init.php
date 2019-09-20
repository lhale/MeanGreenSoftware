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
 * english language defines
 * @version $Id: init.php,v 1.2 2005/11/05 13:21:05 landseer Exp $
 * @author various
 * @copyright 2004 by pnForum team
 * @package pnForum
 * @license GPL <http://www.gnu.org/licenses/gpl.html>
 * @link http://www.pnforum.de
 *
 ***********************************************************************/

define('_PNFORUM_WELCOMETOINTERACTIVEUPGRADE', 'Mise � jour pnForum');
define('_PNFORUM_OLDVERSION', 'Ancienne version');
define('_PNFORUM_NEWVERSION', 'Nouvelle version');
define('_PNFORUM_NEXTVERSION', 'Prochaine version');

define('_PNFORUM_BACKUPHINT', 'Cr�er une sauvegarde de la base avant<br/>de proc�der la prochaine �tape de mise � jour !');
define('_PNFORUM_UPGRADE_ADDINDEXNOW', 'Cr�er les index de champs maintenant');
define('_PNFORUM_UPGRADE_ADDINDEXLATER', 'Cr�er les index manuellement avec phpmyadmin ou autres.');

define('_PNFORUM_TO25_HINT', 'Cette mise � jour contient plusieurs changements au niveau de la base de donn�es incluant la cr�ation de deux index de champs am�liorant les performances de recherche sur le texte complet. Cela pourrait entra�ner des probl�mes sur des h�bergements mutualis�s et une base contenant beaucoup de messages !');
define('_PNFORUM_TO25_FAILED', 'Echec de la mise � jour du pnForum � la version 2.5');

define('_PNFORUM_TO26_HINT', 'Cette mise � jour contient plusieurs changements au niveau de la base de donn�es concernant l\'option des commentaires via le forum.');
define('_PNFORUM_TO26_FAILED', 'Echec de la mise � jour du pnForum � la version 2.6');

?>