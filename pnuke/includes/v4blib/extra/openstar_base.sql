-- MySQL dump 10.9
--
-- Host: localhost    Database: os4
-- ------------------------------------------------------
-- Server version	4.1.12-Max

--
-- Table structure for table `os_core_RSS`
--

DROP TABLE IF EXISTS os_core_RSS;
CREATE TABLE os_core_RSS (
  pn_fid int(10) NOT NULL auto_increment,
  pn_name varchar(32) NOT NULL default '',
  pn_url varchar(255) NOT NULL default '',
  PRIMARY KEY  (pn_fid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_RSS`
--

INSERT INTO os_core_RSS VALUES (1,'Journal','http://openstar.postnuke.com/modules/v4bJournal/rss/journal.xml');

--
-- Table structure for table `os_core_activemenu`
--

DROP TABLE IF EXISTS os_core_activemenu;
CREATE TABLE os_core_activemenu (
  pn_menuorder varchar(40) NOT NULL default '',
  pn_menutitle varchar(40) NOT NULL default '',
  pn_menulink varchar(255) default NULL,
  pn_menupic varchar(255) default NULL,
  pn_menusub int(11) NOT NULL default '0',
  pn_menuheight int(11) default NULL,
  pn_menuwidth int(11) default NULL,
  PRIMARY KEY  (pn_menuorder)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_activemenu`
--

INSERT INTO os_core_activemenu VALUES ('01','Active Menu Home','http://www.meulensteen.nl/','',0,15,138);
INSERT INTO os_core_activemenu VALUES ('02','Internet','','',2,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_01','Software','','',5,15,150);
INSERT INTO os_core_activemenu VALUES ('02_01_01','MySQL','http://www.mysql.com','',0,15,150);
INSERT INTO os_core_activemenu VALUES ('02_01_02','PHP','http://www.php.net','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_01_03','phpMyAdmin','http://www.phpmyadmin.net/','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_01_04','PostNuke','http://www.postnuke.com','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_01_05','PostNuke Resources','','',2,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_01_05_01','Duster/s Docs','http://techcellence.net/index.php','',0,15,150);
INSERT INTO os_core_activemenu VALUES ('02_01_05_02','Auto Theme and PostWrap','http://spidean.mckenzies.net','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_01_05_03','PN_zClassifieds','http://http://technivore.info/index.php?newlang=eng','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_01_05_04','PN MultiSites','http://www.athomeandabout.com/modules.php?op=modload&name=Subjects&file=index&req=viewpage&pageid=4','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_02','Linux','blank.htm','',3,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_02_01','Frank\'s Corner','http://frankscorner.org','',0,15,200);
INSERT INTO os_core_activemenu VALUES ('02_02_02','TransGaming Technologies','http://www.transgaming.com','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_02_03','PCLinuxOnline','http://www.pclinuxonline.com','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_02_04','CodeWeavers','http://www.codeweavers.com/','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_02_05','Wine HQ','http://www.winehq.org/','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('02_02_06','Wine Application Database','http://appdb.codeweavers.com/','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('03','Search Engines','blank.htm','',3,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('03_01','Altavista','http://www.altavista.com','',0,15,150);
INSERT INTO os_core_activemenu VALUES ('03_02','Google','http://www.google.com','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('03_03','Yahoo','http://www.yahoo.com','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('04','Webmaster','blank.htm','',4,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('04_01','Dynamic Drive','http://www.dynamicdrive.com','',0,15,180);
INSERT INTO os_core_activemenu VALUES ('04_02','JavaScript Kit','http://www.javascriptkit.com','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('04_03','Freewarejava','http://www.freewarejava.com','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('04_04','Web Review','http://www.webreview.com','',0,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('05','Other','javascript:top.location.href=\'blank.htm\'','',1,NULL,NULL);
INSERT INTO os_core_activemenu VALUES ('05_01','Menu Author\'s Site','http://www.burmees.nl/menu/menus.htm','',0,15,140);

--
-- Table structure for table `os_core_activemenuvars`
--

DROP TABLE IF EXISTS os_core_activemenuvars;
CREATE TABLE os_core_activemenuvars (
  pn_varname varchar(40) NOT NULL default '',
  pn_varvalue varchar(255) default NULL,
  pn_vardescription varchar(255) default NULL,
  PRIMARY KEY  (pn_varname)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_activemenuvars`
--

INSERT INTO os_core_activemenuvars VALUES ('Arrws','[\'modules/ActiveMenu/pnimages/tri.gif\',5,10,\'modules/ActiveMenu/pnimages/tridown.gif\',10,5,\'modules/ActiveMenu/pnimages/trileft.gif\',5,10]','Location of arrow Icons');
INSERT INTO os_core_activemenuvars VALUES ('BorderBtwnElmnts','0','');
INSERT INTO os_core_activemenuvars VALUES ('BorderColor','\'#D4E2ED\'','');
INSERT INTO os_core_activemenuvars VALUES ('BorderSubColor','\'#363636\'','');
INSERT INTO os_core_activemenuvars VALUES ('BorderWidth','1','');
INSERT INTO os_core_activemenuvars VALUES ('ChildOverlap','.3','');
INSERT INTO os_core_activemenuvars VALUES ('ChildVerticalOverlap','.2','');
INSERT INTO os_core_activemenuvars VALUES ('DissapearDelay','500','');
INSERT INTO os_core_activemenuvars VALUES ('DocTargetFrame','\'space\'','');
INSERT INTO os_core_activemenuvars VALUES ('FirstLineFrame','\'navig\'','');
INSERT INTO os_core_activemenuvars VALUES ('FirstLineHorizontal','0','');
INSERT INTO os_core_activemenuvars VALUES ('FontBold','1','');
INSERT INTO os_core_activemenuvars VALUES ('FontFamily','\'arial,verdana,helvetica\'','');
INSERT INTO os_core_activemenuvars VALUES ('FontHighColor','\'#363636\'','');
INSERT INTO os_core_activemenuvars VALUES ('FontItalic','0','');
INSERT INTO os_core_activemenuvars VALUES ('FontLowColor','\'#363636\'','');
INSERT INTO os_core_activemenuvars VALUES ('FontSize','8','');
INSERT INTO os_core_activemenuvars VALUES ('FontSubHighColor','\'#363636\'','');
INSERT INTO os_core_activemenuvars VALUES ('FontSubLowColor','\'black\'','');
INSERT INTO os_core_activemenuvars VALUES ('HideTop','0','');
INSERT INTO os_core_activemenuvars VALUES ('HighBgColor','\'white\'','');
INSERT INTO os_core_activemenuvars VALUES ('HighSubBgColor','\'white\'','');
INSERT INTO os_core_activemenuvars VALUES ('HorCorrect','0','');
INSERT INTO os_core_activemenuvars VALUES ('KeepHilite','1','');
INSERT INTO os_core_activemenuvars VALUES ('LeftPaddng','3','');
INSERT INTO os_core_activemenuvars VALUES ('LowBgColor','\'#D4E2ED\'','');
INSERT INTO os_core_activemenuvars VALUES ('LowSubBgColor','\'#D4E2ED\'','');
INSERT INTO os_core_activemenuvars VALUES ('MenuCentered','\'left\'','');
INSERT INTO os_core_activemenuvars VALUES ('MenuFramesVertical','1','');
INSERT INTO os_core_activemenuvars VALUES ('MenuTextCentered','\'left\'','');
INSERT INTO os_core_activemenuvars VALUES ('MenuVerticalCentered','\'top\'','');
INSERT INTO os_core_activemenuvars VALUES ('MenuWrap','1','');
INSERT INTO os_core_activemenuvars VALUES ('RightToLeft','0','');
INSERT INTO os_core_activemenuvars VALUES ('SecLineFrame','\'space\'','');
INSERT INTO os_core_activemenuvars VALUES ('ShowArrow','1','');
INSERT INTO os_core_activemenuvars VALUES ('StartLeft','0','');
INSERT INTO os_core_activemenuvars VALUES ('StartTop','0','');
INSERT INTO os_core_activemenuvars VALUES ('TakeOverBgColor','1','');
INSERT INTO os_core_activemenuvars VALUES ('TargetLoc','\'MenuPos\'','');
INSERT INTO os_core_activemenuvars VALUES ('TopPaddng','2','');
INSERT INTO os_core_activemenuvars VALUES ('UnfoldsOnClick','0','');
INSERT INTO os_core_activemenuvars VALUES ('VerCorrect','0','');
INSERT INTO os_core_activemenuvars VALUES ('WebMasterCheck','0','');

--
-- Table structure for table `os_core_admin_category`
--

DROP TABLE IF EXISTS os_core_admin_category;
CREATE TABLE os_core_admin_category (
  pn_cid int(10) NOT NULL auto_increment,
  pn_name varchar(32) NOT NULL default '',
  pn_description varchar(254) NOT NULL default '',
  PRIMARY KEY  (pn_cid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_admin_category`
--

INSERT INTO os_core_admin_category VALUES (1,'System','System Modules');
INSERT INTO os_core_admin_category VALUES (2,'Community','Modules useful for Online Communities');
INSERT INTO os_core_admin_category VALUES (3,'Resources','Resource Pack Modules');
INSERT INTO os_core_admin_category VALUES (4,'Utility','Utility Modules');
INSERT INTO os_core_admin_category VALUES (5,'3rd Party','Third Party Modules');
INSERT INTO os_core_admin_category VALUES (6,'Publishing','');
INSERT INTO os_core_admin_category VALUES (7,'Office','');

--
-- Table structure for table `os_core_admin_module`
--

DROP TABLE IF EXISTS os_core_admin_module;
CREATE TABLE os_core_admin_module (
  pn_mid int(10) NOT NULL default '0',
  pn_cid int(10) NOT NULL default '0'
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_admin_module`
--

INSERT INTO os_core_admin_module VALUES (32,4);
INSERT INTO os_core_admin_module VALUES (48,3);
INSERT INTO os_core_admin_module VALUES (50,2);
INSERT INTO os_core_admin_module VALUES (60,3);
INSERT INTO os_core_admin_module VALUES (3,1);
INSERT INTO os_core_admin_module VALUES (46,1);
INSERT INTO os_core_admin_module VALUES (72,4);
INSERT INTO os_core_admin_module VALUES (85,4);
INSERT INTO os_core_admin_module VALUES (28,2);
INSERT INTO os_core_admin_module VALUES (139,4);
INSERT INTO os_core_admin_module VALUES (74,2);
INSERT INTO os_core_admin_module VALUES (53,4);
INSERT INTO os_core_admin_module VALUES (14,2);
INSERT INTO os_core_admin_module VALUES (1,1);
INSERT INTO os_core_admin_module VALUES (35,1);
INSERT INTO os_core_admin_module VALUES (103,6);
INSERT INTO os_core_admin_module VALUES (54,1);
INSERT INTO os_core_admin_module VALUES (136,2);
INSERT INTO os_core_admin_module VALUES (52,6);
INSERT INTO os_core_admin_module VALUES (2,1);
INSERT INTO os_core_admin_module VALUES (49,4);
INSERT INTO os_core_admin_module VALUES (55,6);
INSERT INTO os_core_admin_module VALUES (56,2);
INSERT INTO os_core_admin_module VALUES (47,2);
INSERT INTO os_core_admin_module VALUES (57,7);
INSERT INTO os_core_admin_module VALUES (9,2);
INSERT INTO os_core_admin_module VALUES (58,7);
INSERT INTO os_core_admin_module VALUES (144,4);
INSERT INTO os_core_admin_module VALUES (51,2);
INSERT INTO os_core_admin_module VALUES (61,3);
INSERT INTO os_core_admin_module VALUES (107,1);
INSERT INTO os_core_admin_module VALUES (104,6);
INSERT INTO os_core_admin_module VALUES (33,2);
INSERT INTO os_core_admin_module VALUES (16,1);
INSERT INTO os_core_admin_module VALUES (31,4);
INSERT INTO os_core_admin_module VALUES (22,2);
INSERT INTO os_core_admin_module VALUES (4,1);
INSERT INTO os_core_admin_module VALUES (62,4);
INSERT INTO os_core_admin_module VALUES (63,4);
INSERT INTO os_core_admin_module VALUES (64,6);
INSERT INTO os_core_admin_module VALUES (5,1);
INSERT INTO os_core_admin_module VALUES (65,6);
INSERT INTO os_core_admin_module VALUES (66,6);
INSERT INTO os_core_admin_module VALUES (70,7);
INSERT INTO os_core_admin_module VALUES (102,1);
INSERT INTO os_core_admin_module VALUES (138,4);
INSERT INTO os_core_admin_module VALUES (27,1);
INSERT INTO os_core_admin_module VALUES (178,4);
INSERT INTO os_core_admin_module VALUES (69,3);
INSERT INTO os_core_admin_module VALUES (21,3);
INSERT INTO os_core_admin_module VALUES (19,3);
INSERT INTO os_core_admin_module VALUES (41,2);
INSERT INTO os_core_admin_module VALUES (76,7);
INSERT INTO os_core_admin_module VALUES (77,4);
INSERT INTO os_core_admin_module VALUES (78,3);
INSERT INTO os_core_admin_module VALUES (20,2);
INSERT INTO os_core_admin_module VALUES (44,2);
INSERT INTO os_core_admin_module VALUES (36,4);
INSERT INTO os_core_admin_module VALUES (42,2);
INSERT INTO os_core_admin_module VALUES (30,4);
INSERT INTO os_core_admin_module VALUES (34,2);
INSERT INTO os_core_admin_module VALUES (15,1);
INSERT INTO os_core_admin_module VALUES (81,4);
INSERT INTO os_core_admin_module VALUES (24,4);
INSERT INTO os_core_admin_module VALUES (82,1);
INSERT INTO os_core_admin_module VALUES (29,2);
INSERT INTO os_core_admin_module VALUES (169,4);
INSERT INTO os_core_admin_module VALUES (38,2);
INSERT INTO os_core_admin_module VALUES (18,2);
INSERT INTO os_core_admin_module VALUES (134,4);
INSERT INTO os_core_admin_module VALUES (17,3);
INSERT INTO os_core_admin_module VALUES (7,1);
INSERT INTO os_core_admin_module VALUES (163,7);
INSERT INTO os_core_admin_module VALUES (84,7);
INSERT INTO os_core_admin_module VALUES (121,4);
INSERT INTO os_core_admin_module VALUES (86,4);
INSERT INTO os_core_admin_module VALUES (116,2);
INSERT INTO os_core_admin_module VALUES (89,7);
INSERT INTO os_core_admin_module VALUES (90,4);
INSERT INTO os_core_admin_module VALUES (91,6);
INSERT INTO os_core_admin_module VALUES (92,7);
INSERT INTO os_core_admin_module VALUES (93,7);
INSERT INTO os_core_admin_module VALUES (168,6);
INSERT INTO os_core_admin_module VALUES (39,1);
INSERT INTO os_core_admin_module VALUES (94,3);

--
-- Table structure for table `os_core_advanced_polls_data`
--

DROP TABLE IF EXISTS os_core_advanced_polls_data;
CREATE TABLE os_core_advanced_polls_data (
  pn_pollid int(11) NOT NULL default '0',
  pn_optiontext varchar(255) NOT NULL default '',
  pn_optionid int(11) NOT NULL default '0',
  pn_optioncolour varchar(7) NOT NULL default ''
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_advanced_polls_data`
--


--
-- Table structure for table `os_core_advanced_polls_desc`
--

DROP TABLE IF EXISTS os_core_advanced_polls_desc;
CREATE TABLE os_core_advanced_polls_desc (
  pn_pollid int(11) NOT NULL auto_increment,
  pn_title varchar(100) NOT NULL default '',
  pn_description text,
  pn_optioncount int(4) NOT NULL default '0',
  pn_opendate int(16) NOT NULL default '0',
  pn_closedate int(16) NOT NULL default '0',
  pn_recurring int(4) NOT NULL default '0',
  pn_recurringoffset int(4) NOT NULL default '0',
  pn_recurringinterval int(4) NOT NULL default '0',
  pn_multipleselect int(4) NOT NULL default '0',
  pn_multipleselectcount int(4) NOT NULL default '0',
  pn_voteauthtype int(4) NOT NULL default '0',
  pn_tiebreakalg mediumint(4) NOT NULL default '0',
  pn_language varchar(30) NOT NULL default '',
  pn_votingmethod int(4) NOT NULL default '0',
  PRIMARY KEY  (pn_pollid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_advanced_polls_desc`
--


--
-- Table structure for table `os_core_advanced_polls_votes`
--

DROP TABLE IF EXISTS os_core_advanced_polls_votes;
CREATE TABLE os_core_advanced_polls_votes (
  pn_voteid int(11) NOT NULL auto_increment,
  pn_ip varchar(20) NOT NULL default '',
  pn_time varchar(14) NOT NULL default '',
  pn_uid int(11) NOT NULL default '0',
  pn_voterank int(4) NOT NULL default '0',
  pn_pollid int(11) NOT NULL default '0',
  pn_optionid int(11) NOT NULL default '0',
  PRIMARY KEY  (pn_voteid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_advanced_polls_votes`
--


--
-- Table structure for table `os_core_banner`
--

DROP TABLE IF EXISTS os_core_banner;
CREATE TABLE os_core_banner (
  pn_bid int(11) NOT NULL auto_increment,
  pn_cid int(11) NOT NULL default '0',
  pn_type char(2) NOT NULL default '0',
  pn_imptotal int(11) NOT NULL default '0',
  pn_impmade int(11) NOT NULL default '0',
  pn_clicks int(11) NOT NULL default '0',
  pn_imageurl varchar(255) NOT NULL default '',
  pn_clickurl varchar(255) NOT NULL default '',
  pn_date datetime default NULL,
  PRIMARY KEY  (pn_bid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_banner`
--


--
-- Table structure for table `os_core_bannerclient`
--

DROP TABLE IF EXISTS os_core_bannerclient;
CREATE TABLE os_core_bannerclient (
  pn_cid int(11) NOT NULL auto_increment,
  pn_name varchar(60) NOT NULL default '',
  pn_contact varchar(60) NOT NULL default '',
  pn_email varchar(60) NOT NULL default '',
  pn_login varchar(10) NOT NULL default '',
  pn_passwd varchar(10) NOT NULL default '',
  pn_extrainfo text NOT NULL,
  PRIMARY KEY  (pn_cid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_bannerclient`
--


--
-- Table structure for table `os_core_bannerfinish`
--

DROP TABLE IF EXISTS os_core_bannerfinish;
CREATE TABLE os_core_bannerfinish (
  pn_bid int(11) NOT NULL auto_increment,
  pn_cid int(11) NOT NULL default '0',
  pn_impressions int(11) NOT NULL default '0',
  pn_clicks int(11) NOT NULL default '0',
  pn_datestart datetime default NULL,
  pn_dateend datetime default NULL,
  PRIMARY KEY  (pn_bid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_bannerfinish`
--


--
-- Table structure for table `os_core_blocks`
--

DROP TABLE IF EXISTS os_core_blocks;
CREATE TABLE os_core_blocks (
  pn_bid int(11) unsigned NOT NULL auto_increment,
  pn_bkey varchar(255) NOT NULL default '',
  pn_title varchar(255) NOT NULL default '',
  pn_content text NOT NULL,
  pn_url varchar(254) NOT NULL default '',
  pn_mid int(11) unsigned NOT NULL default '0',
  pn_position char(1) NOT NULL default 'l',
  pn_weight decimal(10,1) NOT NULL default '0.0',
  pn_active tinyint(3) unsigned NOT NULL default '1',
  pn_refresh int(11) unsigned NOT NULL default '0',
  pn_last_update timestamp NOT NULL,
  pn_language varchar(30) NOT NULL default '',
  pn_collapsable int(11) NOT NULL default '1',
  pn_defaultstate int(11) NOT NULL default '1',
  PRIMARY KEY  (pn_bid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_blocks`
--

INSERT INTO os_core_blocks VALUES (1,'menu','Main Menu','style:=1\ndisplaymodules:=0\ndisplaywaiting:=0\ncontent:=index.php|Home|Back to the home page..LINESPLITuser.php|My Account|Administer your personal account..LINESPLITadmin.php|Administration|Administer your PostNuked site..LINESPLITuser.php?module=User&op=logout|Logout|Logout of your account..LINESPLIT||LINESPLIT[Downloads]|Downloads|Find downloads listed on this website..LINESPLIT[FAQ]|FAQ|Frequently Asked Questions.LINESPLIT[News]|News|Latest News on this site..LINESPLIT[Reviews]|Reviews|Reviews Section on this website..LINESPLIT[Search]|Search|Search our website..LINESPLIT[Sections]|Sections|Other content on this website..LINESPLIT[Submit_News]|Submit News|Submit an article..LINESPLIT[Topics]|Topics|Listing of news topics on this website..LINESPLIT[Web_Links]|Web Links|Links to other sites..','',0,'l','2.0',0,0,'2005-10-09 03:05:39','',1,1);
INSERT INTO os_core_blocks VALUES (2,'menu','Incoming','style:=1\ndisplaymodules:=0\ndisplaywaiting:=1\ncontent:=','',0,'l','3.0',1,0,'2005-10-09 03:05:52','',1,1);
INSERT INTO os_core_blocks VALUES (3,'online','Online','','',0,'l','4.0',1,0,'2005-10-09 03:05:56','',1,1);
INSERT INTO os_core_blocks VALUES (4,'user','Users Block','Put anything you want here','',0,'l','5.0',1,0,'2005-10-09 03:05:58','',1,1);
INSERT INTO os_core_blocks VALUES (5,'search','Search Box','','',0,'l','7.0',0,0,'2005-10-09 03:06:07','',1,1);
INSERT INTO os_core_blocks VALUES (6,'thelang','Languages','','',0,'l','8.0',1,0,'2005-10-09 03:06:11','',1,1);
INSERT INTO os_core_blocks VALUES (7,'login','Login','','',0,'l','6.0',1,1800,'2005-10-09 03:06:01','',1,1);
INSERT INTO os_core_blocks VALUES (8,'v4b_pnmenu','Menu','a:6:{s:12:\"templatefile\";s:20:\"v4b_pnmenu_list.html\";s:10:\"highLinkID\";s:2:\"45\";s:14:\"displaywaiting\";i:0;s:14:\"displaymodules\";i:0;s:10:\"blocktitle\";a:6:{s:3:\"spa\";s:6:\"Portal\";s:3:\"eng\";s:6:\"Portal\";s:3:\"deu\";s:6:\"Portal\";s:3:\"dan\";s:6:\"Portal\";s:3:\"fin\";s:6:\"Portal\";s:3:\"fra\";s:6:\"Portal\";}s:7:\"content\";s:21031:\"a:32:{i:0;a:6:{s:2:\"id\";s:1:\"1\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:9:\"index.php\";s:3:\"eng\";s:9:\"index.php\";s:3:\"deu\";s:9:\"index.php\";s:3:\"dan\";s:9:\"index.php\";s:3:\"fin\";s:9:\"index.php\";s:3:\"fra\";s:9:\"index.php\";}s:4:\"name\";a:6:{s:3:\"spa\";s:4:\"Home\";s:3:\"eng\";s:4:\"Home\";s:3:\"deu\";s:4:\"Home\";s:3:\"dan\";s:4:\"Home\";s:3:\"fin\";s:4:\"Home\";s:3:\"fra\";s:4:\"Home\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:1;a:6:{s:2:\"id\";s:1:\"2\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:8:\"user.php\";s:3:\"eng\";s:8:\"user.php\";s:3:\"deu\";s:8:\"user.php\";s:3:\"dan\";s:8:\"user.php\";s:3:\"fin\";s:8:\"user.php\";s:3:\"fra\";s:8:\"user.php\";}s:4:\"name\";a:6:{s:3:\"spa\";s:8:\"Settings\";s:3:\"eng\";s:8:\"Settings\";s:3:\"deu\";s:13:\"Einstellungen\";s:3:\"dan\";s:8:\"Settings\";s:3:\"fin\";s:8:\"Settings\";s:3:\"fra\";s:8:\"Settings\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:2;a:6:{s:2:\"id\";s:1:\"3\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:9:\"admin.php\";s:3:\"eng\";s:9:\"admin.php\";s:3:\"deu\";s:9:\"admin.php\";s:3:\"dan\";s:9:\"admin.php\";s:3:\"fin\";s:9:\"admin.php\";s:3:\"fra\";s:9:\"admin.php\";}s:4:\"name\";a:6:{s:3:\"spa\";s:5:\"Admin\";s:3:\"eng\";s:5:\"Admin\";s:3:\"deu\";s:5:\"Admin\";s:3:\"dan\";s:5:\"Admin\";s:3:\"fin\";s:5:\"Admin\";s:3:\"fra\";s:5:\"Admin\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:3;a:6:{s:2:\"id\";s:1:\"4\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:33:\"user.php?module=NS-User&op=logout\";s:3:\"eng\";s:33:\"user.php?module=NS-User&op=logout\";s:3:\"deu\";s:33:\"user.php?module=NS-User&op=logout\";s:3:\"dan\";s:33:\"user.php?module=NS-User&op=logout\";s:3:\"fin\";s:33:\"user.php?module=NS-User&op=logout\";s:3:\"fra\";s:33:\"user.php?module=NS-User&op=logout\";}s:4:\"name\";a:6:{s:3:\"spa\";s:6:\"Logout\";s:3:\"eng\";s:6:\"Logout\";s:3:\"deu\";s:9:\"Abmeldung\";s:3:\"dan\";s:6:\"Logout\";s:3:\"fin\";s:6:\"Logout\";s:3:\"fra\";s:6:\"Logout\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:4;a:6:{s:2:\"id\";s:1:\"6\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:0:\"\";s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"dan\";s:0:\"\";s:3:\"fin\";s:0:\"\";s:3:\"fra\";s:0:\"\";}s:4:\"name\";a:6:{s:3:\"spa\";s:0:\"\";s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"dan\";s:0:\"\";s:3:\"fin\";s:0:\"\";s:3:\"fra\";s:0:\"\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:5;a:6:{s:2:\"id\";s:2:\"45\";s:5:\"depth\";s:0:\"\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:41:\"index.php?module=v4bAddressBook&func=main\";s:3:\"eng\";s:41:\"index.php?module=v4bAddressBook&func=main\";s:3:\"deu\";s:41:\"index.php?module=v4bAddressBook&func=main\";s:3:\"dan\";s:41:\"index.php?module=v4bAddressBook&func=main\";s:3:\"fin\";s:41:\"index.php?module=v4bAddressBook&func=main\";s:3:\"fra\";s:41:\"index.php?module=v4bAddressBook&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:12:\"Address Book\";s:3:\"eng\";s:12:\"Address Book\";s:3:\"deu\";s:10:\"Adressbuch\";s:3:\"dan\";s:12:\"Address Book\";s:3:\"fin\";s:12:\"Address Book\";s:3:\"fra\";s:12:\"Address Book\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:6;a:6:{s:2:\"id\";s:1:\"5\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:40:\"index.php?module=v4bAccounting&func=main\";s:3:\"eng\";s:40:\"index.php?module=v4bAccounting&func=main\";s:3:\"deu\";s:40:\"index.php?module=v4bAccounting&func=main\";s:3:\"dan\";s:40:\"index.php?module=v4bAccounting&func=main\";s:3:\"fin\";s:40:\"index.php?module=v4bAccounting&func=main\";s:3:\"fra\";s:40:\"index.php?module=v4bAccounting&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:10:\"Accounting\";s:3:\"eng\";s:10:\"Accounting\";s:3:\"deu\";s:11:\"Buchhaltung\";s:3:\"dan\";s:10:\"Accounting\";s:3:\"fin\";s:10:\"Accounting\";s:3:\"fra\";s:10:\"Accounting\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:7;a:6:{s:2:\"id\";s:2:\"11\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:52:\"modules.php?op=modload&name=CmodsDownload&file=index\";s:3:\"eng\";s:52:\"modules.php?op=modload&name=CmodsDownload&file=index\";s:3:\"deu\";s:52:\"modules.php?op=modload&name=CmodsDownload&file=index\";s:3:\"dan\";s:52:\"modules.php?op=modload&name=CmodsDownload&file=index\";s:3:\"fin\";s:52:\"modules.php?op=modload&name=CmodsDownload&file=index\";s:3:\"fra\";s:52:\"modules.php?op=modload&name=CmodsDownload&file=index\";}s:4:\"name\";a:6:{s:3:\"spa\";s:9:\"Downloads\";s:3:\"eng\";s:9:\"Downloads\";s:3:\"deu\";s:9:\"Downloads\";s:3:\"dan\";s:9:\"Downloads\";s:3:\"fin\";s:9:\"Downloads\";s:3:\"fra\";s:9:\"Downloads\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:8;a:6:{s:2:\"id\";s:1:\"8\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:39:\"index.php?module=PostCalendar&func=main\";s:3:\"eng\";s:39:\"index.php?module=PostCalendar&func=main\";s:3:\"deu\";s:39:\"index.php?module=PostCalendar&func=main\";s:3:\"dan\";s:39:\"index.php?module=PostCalendar&func=main\";s:3:\"fin\";s:39:\"index.php?module=PostCalendar&func=main\";s:3:\"fra\";s:39:\"index.php?module=PostCalendar&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:8:\"Calendar\";s:3:\"eng\";s:8:\"Calendar\";s:3:\"deu\";s:8:\"Kalender\";s:3:\"dan\";s:8:\"Calendar\";s:3:\"fin\";s:8:\"Calendar\";s:3:\"fra\";s:8:\"Calendar\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:9;a:6:{s:2:\"id\";s:2:\"10\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:34:\"index.php?module=eventia&func=main\";s:3:\"eng\";s:34:\"index.php?module=eventia&func=main\";s:3:\"deu\";s:34:\"index.php?module=eventia&func=main\";s:3:\"dan\";s:34:\"index.php?module=eventia&func=main\";s:3:\"fin\";s:34:\"index.php?module=eventia&func=main\";s:3:\"fra\";s:34:\"index.php?module=eventia&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:6:\"Events\";s:3:\"eng\";s:6:\"Events\";s:3:\"deu\";s:6:\"Events\";s:3:\"dan\";s:6:\"Events\";s:3:\"fin\";s:6:\"Events\";s:3:\"fra\";s:6:\"Events\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:10;a:6:{s:2:\"id\";s:1:\"7\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:34:\"index.php?module=pnForum&func=main\";s:3:\"eng\";s:34:\"index.php?module=pnForum&func=main\";s:3:\"deu\";s:34:\"index.php?module=pnForum&func=main\";s:3:\"dan\";s:34:\"index.php?module=pnForum&func=main\";s:3:\"fin\";s:34:\"index.php?module=pnForum&func=main\";s:3:\"fra\";s:34:\"index.php?module=pnForum&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:5:\"Forum\";s:3:\"eng\";s:5:\"Forum\";s:3:\"deu\";s:5:\"Forum\";s:3:\"dan\";s:5:\"Forum\";s:3:\"fin\";s:5:\"Forum\";s:3:\"fra\";s:5:\"Forum\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:11;a:6:{s:2:\"id\";s:2:\"13\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:42:\"modules.php?op=modload&name=FAQ&file=index\";s:3:\"eng\";s:42:\"modules.php?op=modload&name=FAQ&file=index\";s:3:\"deu\";s:42:\"modules.php?op=modload&name=FAQ&file=index\";s:3:\"dan\";s:42:\"modules.php?op=modload&name=FAQ&file=index\";s:3:\"fin\";s:42:\"modules.php?op=modload&name=FAQ&file=index\";s:3:\"fra\";s:42:\"modules.php?op=modload&name=FAQ&file=index\";}s:4:\"name\";a:6:{s:3:\"spa\";s:4:\"FAQs\";s:3:\"eng\";s:4:\"FAQs\";s:3:\"deu\";s:4:\"FAQs\";s:3:\"dan\";s:4:\"FAQs\";s:3:\"fin\";s:4:\"FAQs\";s:3:\"fra\";s:4:\"FAQs\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:12;a:6:{s:2:\"id\";s:2:\"43\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:37:\"index.php?module=v4bJournal&func=main\";s:3:\"eng\";s:37:\"index.php?module=v4bJournal&func=main\";s:3:\"deu\";s:37:\"index.php?module=v4bJournal&func=main\";s:3:\"dan\";s:37:\"index.php?module=v4bJournal&func=main\";s:3:\"fin\";s:37:\"index.php?module=v4bJournal&func=main\";s:3:\"fra\";s:37:\"index.php?module=v4bJournal&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:7:\"Journal\";s:3:\"eng\";s:7:\"Journal\";s:3:\"deu\";s:7:\"Journal\";s:3:\"dan\";s:7:\"Journal\";s:3:\"fin\";s:7:\"Journal\";s:3:\"fra\";s:7:\"Journal\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:13;a:6:{s:2:\"id\";s:2:\"26\";s:5:\"depth\";s:0:\"\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:0:\"\";s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"dan\";s:0:\"\";s:3:\"fin\";s:0:\"\";s:3:\"fra\";s:0:\"\";}s:4:\"name\";a:6:{s:3:\"spa\";s:0:\"\";s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"dan\";s:0:\"\";s:3:\"fin\";s:0:\"\";s:3:\"fra\";s:0:\"\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:14;a:6:{s:2:\"id\";s:1:\"9\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10000&pid=1\";s:3:\"eng\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10000&pid=1\";s:3:\"deu\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10000&pid=1\";s:3:\"dan\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10000&pid=1\";s:3:\"fin\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10000&pid=1\";s:3:\"fra\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10000&pid=1\";}s:4:\"name\";a:6:{s:3:\"spa\";s:7:\"Content\";s:3:\"eng\";s:7:\"Content\";s:3:\"deu\";s:7:\"Content\";s:3:\"dan\";s:7:\"Content\";s:3:\"fin\";s:7:\"Content\";s:3:\"fra\";s:7:\"Content\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:15;a:6:{s:2:\"id\";s:2:\"33\";s:5:\"depth\";s:1:\"1\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10000&pid=2\";s:3:\"eng\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10000&pid=2\";s:3:\"deu\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10000&pid=2\";s:3:\"dan\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10000&pid=2\";s:3:\"fin\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10000&pid=2\";s:3:\"fra\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10000&pid=2\";}s:4:\"name\";a:6:{s:3:\"spa\";s:9:\"Barcelona\";s:3:\"eng\";s:9:\"Barcelona\";s:3:\"deu\";s:9:\"Barcelona\";s:3:\"dan\";s:9:\"Barcelona\";s:3:\"fin\";s:9:\"Barcelona\";s:3:\"fra\";s:9:\"Barcelona\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:16;a:6:{s:2:\"id\";s:2:\"34\";s:5:\"depth\";s:1:\"1\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10001&pid=1\";s:3:\"eng\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10001&pid=1\";s:3:\"deu\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10001&pid=1\";s:3:\"dan\";s:58:\"index.php?module=pagesetter&func=viewpub&tid=10001&pid=1\r\n\";s:3:\"fin\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10001&pid=1\";s:3:\"fra\";s:56:\"index.php?module=pagesetter&func=viewpub&tid=10001&pid=1\";}s:4:\"name\";a:6:{s:3:\"spa\";s:10:\"Design2100\";s:3:\"eng\";s:10:\"Design2100\";s:3:\"deu\";s:10:\"Design2100\";s:3:\"dan\";s:10:\"Design2100\";s:3:\"fin\";s:10:\"Design2100\";s:3:\"fra\";s:10:\"Design2100\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:17;a:6:{s:2:\"id\";s:2:\"41\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:51:\"index.php?module=v4bPgPages&func=viewpub&pub=cities\";s:3:\"eng\";s:51:\"index.php?module=v4bPgPages&func=viewpub&pub=cities\";s:3:\"deu\";s:51:\"index.php?module=v4bPgPages&func=viewpub&pub=cities\";s:3:\"dan\";s:51:\"index.php?module=v4bPgPages&func=viewpub&pub=cities\";s:3:\"fin\";s:51:\"index.php?module=v4bPgPages&func=viewpub&pub=cities\";s:3:\"fra\";s:51:\"index.php?module=v4bPgPages&func=viewpub&pub=cities\";}s:4:\"name\";a:6:{s:3:\"spa\";s:12:\"Publications\";s:3:\"eng\";s:12:\"Publications\";s:3:\"deu\";s:18:\"Veröffentlichungen\";s:3:\"dan\";s:12:\"Publications\";s:3:\"fin\";s:12:\"Publications\";s:3:\"fra\";s:12:\"Publications\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:18;a:6:{s:2:\"id\";s:2:\"14\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:37:\"index.php?module=photoshare&func=main\";s:3:\"eng\";s:37:\"index.php?module=photoshare&func=main\";s:3:\"deu\";s:37:\"index.php?module=photoshare&func=main\";s:3:\"dan\";s:37:\"index.php?module=photoshare&func=main\";s:3:\"fin\";s:37:\"index.php?module=photoshare&func=main\";s:3:\"fra\";s:37:\"index.php?module=photoshare&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:14:\"Media Database\";s:3:\"eng\";s:14:\"Media Database\";s:3:\"deu\";s:15:\"Mediendatenbank\";s:3:\"dan\";s:14:\"Media Database\";s:3:\"fin\";s:14:\"Media Database\";s:3:\"fra\";s:14:\"Media Database\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:19;a:6:{s:2:\"id\";s:2:\"15\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:43:\"modules.php?op=modload&name=News&file=index\";s:3:\"eng\";s:43:\"modules.php?op=modload&name=News&file=index\";s:3:\"deu\";s:43:\"modules.php?op=modload&name=News&file=index\";s:3:\"dan\";s:43:\"modules.php?op=modload&name=News&file=index\";s:3:\"fin\";s:43:\"modules.php?op=modload&name=News&file=index\";s:3:\"fra\";s:43:\"modules.php?op=modload&name=News&file=index\";}s:4:\"name\";a:6:{s:3:\"spa\";s:4:\"News\";s:3:\"eng\";s:4:\"News\";s:3:\"deu\";s:4:\"News\";s:3:\"dan\";s:4:\"News\";s:3:\"fin\";s:4:\"News\";s:3:\"fra\";s:4:\"News\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:20;a:6:{s:2:\"id\";s:2:\"27\";s:5:\"depth\";s:1:\"1\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:45:\"modules.php?op=modload&name=Topics&file=index\";s:3:\"eng\";s:45:\"modules.php?op=modload&name=Topics&file=index\";s:3:\"deu\";s:45:\"modules.php?op=modload&name=Topics&file=index\";s:3:\"dan\";s:45:\"modules.php?op=modload&name=Topics&file=index\";s:3:\"fin\";s:45:\"modules.php?op=modload&name=Topics&file=index\";s:3:\"fra\";s:45:\"modules.php?op=modload&name=Topics&file=index\";}s:4:\"name\";a:6:{s:3:\"spa\";s:6:\"Topics\";s:3:\"eng\";s:6:\"Topics\";s:3:\"deu\";s:6:\"Themen\";s:3:\"dan\";s:6:\"Topics\";s:3:\"fin\";s:6:\"Topics\";s:3:\"fra\";s:6:\"Topics\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:21;a:6:{s:2:\"id\";s:2:\"28\";s:5:\"depth\";s:1:\"1\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:50:\"modules.php?op=modload&name=Submit_News&file=index\";s:3:\"eng\";s:50:\"modules.php?op=modload&name=Submit_News&file=index\";s:3:\"deu\";s:50:\"modules.php?op=modload&name=Submit_News&file=index\";s:3:\"dan\";s:50:\"modules.php?op=modload&name=Submit_News&file=index\";s:3:\"fin\";s:50:\"modules.php?op=modload&name=Submit_News&file=index\";s:3:\"fra\";s:50:\"modules.php?op=modload&name=Submit_News&file=index\";}s:4:\"name\";a:6:{s:3:\"spa\";s:11:\"Submit News\";s:3:\"eng\";s:11:\"Submit News\";s:3:\"deu\";s:14:\"News einsenden\";s:3:\"dan\";s:11:\"Submit News\";s:3:\"fin\";s:11:\"Submit News\";s:3:\"fra\";s:11:\"Submit News\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:22;a:6:{s:2:\"id\";s:2:\"16\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:33:\"index.php?module=v4bRbs&func=main\";s:3:\"eng\";s:33:\"index.php?module=v4bRbs&func=main\";s:3:\"deu\";s:33:\"index.php?module=v4bRbs&func=main\";s:3:\"dan\";s:33:\"index.php?module=v4bRbs&func=main\";s:3:\"fin\";s:33:\"index.php?module=v4bRbs&func=main\";s:3:\"fra\";s:33:\"index.php?module=v4bRbs&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:16:\"Resource Booking\";s:3:\"eng\";s:16:\"Resource Booking\";s:3:\"deu\";s:17:\"Ressourcen buchen\";s:3:\"dan\";s:16:\"Resource Booking\";s:3:\"fin\";s:16:\"Resource Booking\";s:3:\"fra\";s:16:\"Resource Booking\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:23;a:6:{s:2:\"id\";s:2:\"17\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:45:\"modules.php?op=modload&name=Search&file=index\";s:3:\"eng\";s:45:\"modules.php?op=modload&name=Search&file=index\";s:3:\"deu\";s:45:\"modules.php?op=modload&name=Search&file=index\";s:3:\"dan\";s:45:\"modules.php?op=modload&name=Search&file=index\";s:3:\"fin\";s:45:\"modules.php?op=modload&name=Search&file=index\";s:3:\"fra\";s:45:\"modules.php?op=modload&name=Search&file=index\";}s:4:\"name\";a:6:{s:3:\"spa\";s:6:\"Search\";s:3:\"eng\";s:6:\"Search\";s:3:\"deu\";s:5:\"Suche\";s:3:\"dan\";s:6:\"Search\";s:3:\"fin\";s:6:\"Search\";s:3:\"fra\";s:6:\"Search\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:24;a:6:{s:2:\"id\";s:2:\"21\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:0:\"\";s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"dan\";s:0:\"\";s:3:\"fin\";s:0:\"\";s:3:\"fra\";s:0:\"\";}s:4:\"name\";a:6:{s:3:\"spa\";s:0:\"\";s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"dan\";s:0:\"\";s:3:\"fin\";s:0:\"\";s:3:\"fra\";s:0:\"\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:25;a:6:{s:2:\"id\";s:2:\"18\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:52:\"modules.php?op=modload&name=CmodsWebLinks&file=index\";s:3:\"eng\";s:52:\"modules.php?op=modload&name=CmodsWebLinks&file=index\";s:3:\"deu\";s:52:\"modules.php?op=modload&name=CmodsWebLinks&file=index\";s:3:\"dan\";s:52:\"modules.php?op=modload&name=CmodsWebLinks&file=index\";s:3:\"fin\";s:52:\"modules.php?op=modload&name=CmodsWebLinks&file=index\";s:3:\"fra\";s:52:\"modules.php?op=modload&name=CmodsWebLinks&file=index\";}s:4:\"name\";a:6:{s:3:\"spa\";s:8:\"Weblinks\";s:3:\"eng\";s:8:\"Weblinks\";s:3:\"deu\";s:8:\"Weblinks\";s:3:\"dan\";s:8:\"Weblinks\";s:3:\"fin\";s:8:\"Weblinks\";s:3:\"fra\";s:8:\"Weblinks\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:26;a:6:{s:2:\"id\";s:2:\"19\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:35:\"index.php?module=pnmantis&func=main\";s:3:\"eng\";s:35:\"index.php?module=pnmantis&func=main\";s:3:\"deu\";s:35:\"index.php?module=pnmantis&func=main\";s:3:\"dan\";s:35:\"index.php?module=pnmantis&func=main\";s:3:\"fin\";s:35:\"index.php?module=pnmantis&func=main\";s:3:\"fra\";s:35:\"index.php?module=pnmantis&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:7:\"Service\";s:3:\"eng\";s:7:\"Service\";s:3:\"deu\";s:7:\"Service\";s:3:\"dan\";s:7:\"Service\";s:3:\"fin\";s:7:\"Service\";s:3:\"fra\";s:7:\"Service\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:27;a:6:{s:2:\"id\";s:2:\"20\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:38:\"index.php?module=DQ_Helpdesk&func=main\";s:3:\"eng\";s:38:\"index.php?module=DQ_Helpdesk&func=main\";s:3:\"deu\";s:38:\"index.php?module=DQ_Helpdesk&func=main\";s:3:\"dan\";s:38:\"index.php?module=DQ_Helpdesk&func=main\";s:3:\"fin\";s:38:\"index.php?module=DQ_Helpdesk&func=main\";s:3:\"fra\";s:38:\"index.php?module=DQ_Helpdesk&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:8:\"Helpdesk\";s:3:\"eng\";s:8:\"Helpdesk\";s:3:\"deu\";s:8:\"Helpdesk\";s:3:\"dan\";s:8:\"Helpdesk\";s:3:\"fin\";s:8:\"Helpdesk\";s:3:\"fra\";s:8:\"Helpdesk\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:28;a:6:{s:2:\"id\";s:2:\"40\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:35:\"index.php?module=v4bLorem&func=main\";s:3:\"eng\";s:35:\"index.php?module=v4bLorem&func=main\";s:3:\"deu\";s:35:\"index.php?module=v4bLorem&func=main\";s:3:\"dan\";s:35:\"index.php?module=v4bLorem&func=main\";s:3:\"fin\";s:35:\"index.php?module=v4bLorem&func=main\";s:3:\"fra\";s:35:\"index.php?module=v4bLorem&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:11:\"Lorem Ipsum\";s:3:\"eng\";s:11:\"Lorem Ipsum\";s:3:\"deu\";s:11:\"Lorem Ipsum\";s:3:\"dan\";s:11:\"Lorem Ipsum\";s:3:\"fin\";s:11:\"Lorem Ipsum\";s:3:\"fra\";s:11:\"Lorem Ipsum\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:29;a:6:{s:2:\"id\";s:2:\"23\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:37:\"index.php?module=v4bConvert&func=main\";s:3:\"eng\";s:37:\"index.php?module=v4bConvert&func=main\";s:3:\"deu\";s:37:\"index.php?module=v4bConvert&func=main\";s:3:\"dan\";s:37:\"index.php?module=v4bConvert&func=main\";s:3:\"fin\";s:37:\"index.php?module=v4bConvert&func=main\";s:3:\"fra\";s:37:\"index.php?module=v4bConvert&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:15:\"Unit Conversion\";s:3:\"eng\";s:15:\"Unit Conversion\";s:3:\"deu\";s:14:\"Maße umrechnen\";s:3:\"dan\";s:15:\"Unit Conversion\";s:3:\"fin\";s:15:\"Unit Conversion\";s:3:\"fra\";s:15:\"Unit Conversion\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:30;a:6:{s:2:\"id\";s:2:\"24\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:36:\"index.php?module=whatsnews&func=main\";s:3:\"eng\";s:36:\"index.php?module=whatsnews&func=main\";s:3:\"deu\";s:36:\"index.php?module=whatsnews&func=main\";s:3:\"dan\";s:36:\"index.php?module=whatsnews&func=main\";s:3:\"fin\";s:36:\"index.php?module=whatsnews&func=main\";s:3:\"fra\";s:36:\"index.php?module=whatsnews&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:10:\"Newsletter\";s:3:\"eng\";s:10:\"Newsletter\";s:3:\"deu\";s:10:\"Newsletter\";s:3:\"dan\";s:10:\"Newsletter\";s:3:\"fin\";s:10:\"Newsletter\";s:3:\"fra\";s:10:\"Newsletter\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}i:31;a:6:{s:2:\"id\";s:2:\"25\";s:5:\"depth\";s:1:\"0\";s:6:\"newwin\";i:0;s:3:\"url\";a:6:{s:3:\"spa\";s:38:\"index.php?module=v4bProjects&func=main\";s:3:\"eng\";s:38:\"index.php?module=v4bProjects&func=main\";s:3:\"deu\";s:38:\"index.php?module=v4bProjects&func=main\";s:3:\"dan\";s:38:\"index.php?module=v4bProjects&func=main\";s:3:\"fin\";s:38:\"index.php?module=v4bProjects&func=main\";s:3:\"fra\";s:38:\"index.php?module=v4bProjects&func=main\";}s:4:\"name\";a:6:{s:3:\"spa\";s:18:\"Project management\";s:3:\"eng\";s:18:\"Project management\";s:3:\"deu\";s:16:\"Projektmangement\";s:3:\"dan\";s:18:\"Project management\";s:3:\"fin\";s:18:\"Project management\";s:3:\"fra\";s:18:\"Project management\";}s:4:\"desc\";a:6:{s:3:\"spa\";N;s:3:\"eng\";N;s:3:\"deu\";N;s:3:\"dan\";N;s:3:\"fin\";N;s:3:\"fra\";N;}}}\";}','',27,'l','1.0',1,3600,'2006-08-14 15:03:00','',1,1);
INSERT INTO os_core_blocks VALUES (9,'messages','Administration Messages','','',35,'c','13.0',0,1800,'2005-10-08 18:57:11','eng',1,1);
INSERT INTO os_core_blocks VALUES (10,'messages','Administrative Mitteilungen','','',35,'c','14.0',0,3600,'2005-10-08 18:57:11','deu',1,1);
INSERT INTO os_core_blocks VALUES (11,'pending','Pending Content','N;','',81,'r','2.0',1,3600,'2006-06-26 15:53:07','eng',0,1);
INSERT INTO os_core_blocks VALUES (13,'osnews','Latest News','a:3:{s:6:\"amount\";i:5;s:6:\"length\";i:40;s:7:\"mlength\";i:45;}','',6,'c','12.0',0,3600,'2005-10-08 19:21:30','eng',1,1);
INSERT INTO os_core_blocks VALUES (14,'osnews','Letzte Neuigkeiten','a:3:{s:6:\"amount\";i:5;s:6:\"length\";i:40;s:7:\"mlength\";i:45;}','',6,'c','11.0',0,3600,'2005-10-08 19:22:02','deu',1,1);
INSERT INTO os_core_blocks VALUES (15,'osdownloads','Newest Downloads','a:2:{s:10:\"num_recent\";i:5;s:11:\"num_popular\";i:5;}','',55,'c','10.0',0,3600,'2005-10-08 19:21:57','eng',1,1);
INSERT INTO os_core_blocks VALUES (16,'osdownloads','Neueste Downloads','a:2:{s:10:\"num_recent\";i:5;s:11:\"num_popular\";i:5;}','',55,'c','9.0',0,3600,'2005-10-08 19:21:56','deu',1,1);
INSERT INTO os_core_blocks VALUES (17,'osweblinks','Latest Weblinks','a:2:{s:10:\"num_recent\";i:5;s:11:\"num_popular\";i:5;}','',56,'c','8.0',0,3600,'2005-10-08 19:21:54','eng',1,1);
INSERT INTO os_core_blocks VALUES (18,'osweblinks','Neueste Weblinks','a:2:{s:10:\"num_recent\";i:5;s:11:\"num_popular\";i:5;}','',56,'c','7.0',0,3600,'2005-10-08 19:21:51','deu',1,1);
INSERT INTO os_core_blocks VALUES (19,'center','Latest Forum Posts','a:2:{s:11:\"cb_template\";s:32:\"pnforum_centerblock_display.html\";s:13:\"cb_parameters\";s:10:\"maxposts=5\";}','',70,'c','6.0',0,3600,'2005-10-08 19:21:49','eng',1,1);
INSERT INTO os_core_blocks VALUES (20,'center','Neueste Forenbeiträge','','',70,'c','5.0',0,3600,'2005-10-08 19:21:47','deu',1,1);
INSERT INTO os_core_blocks VALUES (21,'first','Events','a:1:{s:8:\"numitems\";s:1:\"5\";}','',58,'c','4.0',0,3600,'2005-10-08 19:21:45','eng',1,1);
INSERT INTO os_core_blocks VALUES (22,'first','Veranstaltungen','a:1:{s:8:\"numitems\";s:1:\"5\";}','',58,'c','3.0',0,3600,'2005-10-08 19:21:43','deu',1,1);
INSERT INTO os_core_blocks VALUES (23,'newaddress','New Contact Entries','a:1:{s:8:\"numitems\";s:1:\"5\";}','',84,'c','2.0',0,3600,'2005-10-08 19:21:40','eng',1,1);
INSERT INTO os_core_blocks VALUES (24,'newaddress','Neue Addressdaten','a:1:{s:8:\"numitems\";s:1:\"5\";}','',84,'c','1.0',0,3600,'2005-10-08 19:21:37','deu',1,1);
INSERT INTO os_core_blocks VALUES (26,'osbarometer','Barometer','cache=300|susr=1|sadr=1|scal=1|scmt=1|sdld=1|sevt=1|sfaq=1|sfrm=1|shlp=1|snws=1|spgs=1|spho=1|sprj=1|srbs=1|ssrv=1|swbl=1|','',27,'l','9.0',1,3600,'2005-10-09 03:06:11','',1,1);

--
-- Table structure for table `os_core_blocks_buttons`
--

DROP TABLE IF EXISTS os_core_blocks_buttons;
CREATE TABLE os_core_blocks_buttons (
  pn_id int(11) unsigned NOT NULL auto_increment,
  pn_bid int(11) unsigned NOT NULL default '0',
  pn_title varchar(255) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_images longtext NOT NULL,
  PRIMARY KEY  (pn_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_blocks_buttons`
--


--
-- Table structure for table `os_core_cmodsdownload_categories`
--

DROP TABLE IF EXISTS os_core_cmodsdownload_categories;
CREATE TABLE os_core_cmodsdownload_categories (
  pn_cid int(11) NOT NULL auto_increment,
  pn_title varchar(50) NOT NULL default '',
  pn_description text NOT NULL,
  PRIMARY KEY  (pn_cid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsdownload_categories`
--


--
-- Table structure for table `os_core_cmodsdownload_downloads`
--

DROP TABLE IF EXISTS os_core_cmodsdownload_downloads;
CREATE TABLE os_core_cmodsdownload_downloads (
  pn_lid int(11) NOT NULL auto_increment,
  pn_cid int(11) NOT NULL default '0',
  pn_sid int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_date datetime default NULL,
  pn_name varchar(100) NOT NULL default '',
  pn_email varchar(100) NOT NULL default '',
  pn_hits int(11) NOT NULL default '0',
  pn_submitter varchar(60) NOT NULL default '',
  pn_ratingsummary double(6,4) NOT NULL default '0.0000',
  pn_totalvotes int(11) NOT NULL default '0',
  pn_totalcomments int(11) NOT NULL default '0',
  pn_filesize int(11) NOT NULL default '0',
  pn_version varchar(10) NOT NULL default '',
  pn_homepage varchar(200) NOT NULL default '',
  PRIMARY KEY  (pn_lid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsdownload_downloads`
--


--
-- Table structure for table `os_core_cmodsdownload_editorials`
--

DROP TABLE IF EXISTS os_core_cmodsdownload_editorials;
CREATE TABLE os_core_cmodsdownload_editorials (
  pn_id int(11) NOT NULL default '0',
  pn_adminid varchar(60) NOT NULL default '',
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_text text NOT NULL,
  pn_title varchar(100) NOT NULL default '',
  PRIMARY KEY  (pn_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsdownload_editorials`
--


--
-- Table structure for table `os_core_cmodsdownload_modrequest`
--

DROP TABLE IF EXISTS os_core_cmodsdownload_modrequest;
CREATE TABLE os_core_cmodsdownload_modrequest (
  pn_requestid int(11) NOT NULL auto_increment,
  pn_lid int(11) NOT NULL default '0',
  pn_cid int(11) NOT NULL default '0',
  pn_sid int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_modifysubmitter varchar(60) NOT NULL default '',
  pn_brokendownload int(3) NOT NULL default '0',
  pn_name varchar(100) NOT NULL default '',
  pn_email varchar(100) NOT NULL default '',
  pn_filesize int(11) NOT NULL default '0',
  pn_version varchar(10) NOT NULL default '',
  pn_homepage varchar(200) NOT NULL default '',
  PRIMARY KEY  (pn_requestid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsdownload_modrequest`
--


--
-- Table structure for table `os_core_cmodsdownload_newdownload`
--

DROP TABLE IF EXISTS os_core_cmodsdownload_newdownload;
CREATE TABLE os_core_cmodsdownload_newdownload (
  pn_lid int(11) NOT NULL auto_increment,
  pn_cid int(11) NOT NULL default '0',
  pn_sid int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_name varchar(100) NOT NULL default '',
  pn_email varchar(100) NOT NULL default '',
  pn_submitter varchar(60) NOT NULL default '',
  pn_filesize int(11) NOT NULL default '0',
  pn_version varchar(10) NOT NULL default '',
  pn_homepage varchar(200) NOT NULL default '',
  PRIMARY KEY  (pn_lid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsdownload_newdownload`
--


--
-- Table structure for table `os_core_cmodsdownload_subcategories`
--

DROP TABLE IF EXISTS os_core_cmodsdownload_subcategories;
CREATE TABLE os_core_cmodsdownload_subcategories (
  pn_sid int(11) NOT NULL auto_increment,
  pn_cid int(11) NOT NULL default '0',
  pn_title varchar(50) NOT NULL default '',
  PRIMARY KEY  (pn_sid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsdownload_subcategories`
--


--
-- Table structure for table `os_core_cmodsdownload_votedata`
--

DROP TABLE IF EXISTS os_core_cmodsdownload_votedata;
CREATE TABLE os_core_cmodsdownload_votedata (
  pn_id int(11) NOT NULL auto_increment,
  pn_lid int(11) NOT NULL default '0',
  pn_user varchar(60) NOT NULL default '',
  pn_rating int(11) NOT NULL default '0',
  pn_hostname varchar(60) NOT NULL default '',
  pn_comments text NOT NULL,
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (pn_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsdownload_votedata`
--


--
-- Table structure for table `os_core_cmodsweblinks_categories`
--

DROP TABLE IF EXISTS os_core_cmodsweblinks_categories;
CREATE TABLE os_core_cmodsweblinks_categories (
  pn_cat_id int(11) NOT NULL auto_increment,
  pn_parent_id int(11) default NULL,
  pn_title varchar(50) NOT NULL default '',
  pn_description text NOT NULL,
  PRIMARY KEY  (pn_cat_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsweblinks_categories`
--


--
-- Table structure for table `os_core_cmodsweblinks_editorials`
--

DROP TABLE IF EXISTS os_core_cmodsweblinks_editorials;
CREATE TABLE os_core_cmodsweblinks_editorials (
  pn_linkid int(11) NOT NULL default '0',
  pn_adminid varchar(60) NOT NULL default '',
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_text text NOT NULL,
  pn_title varchar(100) NOT NULL default '',
  PRIMARY KEY  (pn_linkid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsweblinks_editorials`
--


--
-- Table structure for table `os_core_cmodsweblinks_links`
--

DROP TABLE IF EXISTS os_core_cmodsweblinks_links;
CREATE TABLE os_core_cmodsweblinks_links (
  pn_lid int(11) NOT NULL auto_increment,
  pn_cat_id int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_date datetime default NULL,
  pn_name varchar(100) NOT NULL default '',
  pn_email varchar(100) NOT NULL default '',
  pn_hits int(11) NOT NULL default '0',
  pn_submitter varchar(60) NOT NULL default '',
  pn_ratingsummary double(6,4) NOT NULL default '0.0000',
  pn_totalvotes int(11) NOT NULL default '0',
  pn_totalcomments int(11) NOT NULL default '0',
  PRIMARY KEY  (pn_lid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsweblinks_links`
--


--
-- Table structure for table `os_core_cmodsweblinks_modrequest`
--

DROP TABLE IF EXISTS os_core_cmodsweblinks_modrequest;
CREATE TABLE os_core_cmodsweblinks_modrequest (
  pn_requestid int(11) NOT NULL auto_increment,
  pn_lid int(11) NOT NULL default '0',
  pn_cat_id int(11) NOT NULL default '0',
  pn_sid int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_modifysubmitter varchar(60) NOT NULL default '',
  pn_brokenlink tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (pn_requestid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsweblinks_modrequest`
--


--
-- Table structure for table `os_core_cmodsweblinks_newlink`
--

DROP TABLE IF EXISTS os_core_cmodsweblinks_newlink;
CREATE TABLE os_core_cmodsweblinks_newlink (
  pn_lid int(11) NOT NULL auto_increment,
  pn_cat_id int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_name varchar(100) NOT NULL default '',
  pn_email varchar(100) NOT NULL default '',
  pn_submitter varchar(60) NOT NULL default '',
  PRIMARY KEY  (pn_lid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsweblinks_newlink`
--


--
-- Table structure for table `os_core_cmodsweblinks_votedata`
--

DROP TABLE IF EXISTS os_core_cmodsweblinks_votedata;
CREATE TABLE os_core_cmodsweblinks_votedata (
  pn_id int(11) NOT NULL auto_increment,
  pn_lid int(11) NOT NULL default '0',
  pn_user varchar(60) NOT NULL default '',
  pn_rating int(11) NOT NULL default '0',
  pn_hostname varchar(60) NOT NULL default '',
  pn_comments text NOT NULL,
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (pn_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_cmodsweblinks_votedata`
--


--
-- Table structure for table `os_core_comments`
--

DROP TABLE IF EXISTS os_core_comments;
CREATE TABLE os_core_comments (
  pn_tid int(11) NOT NULL auto_increment,
  pn_pid int(11) default '0',
  pn_sid int(11) default '0',
  pn_date datetime default NULL,
  pn_name varchar(60) NOT NULL default '',
  pn_email varchar(60) default NULL,
  pn_url varchar(254) default NULL,
  pn_host_name varchar(60) default NULL,
  pn_subject varchar(85) NOT NULL default '',
  pn_comment text NOT NULL,
  pn_score tinyint(4) NOT NULL default '0',
  pn_reason tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (pn_tid),
  KEY idx_pid (pn_pid),
  KEY idx_sid (pn_sid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_comments`
--


--
-- Table structure for table `os_core_dqhelpdesk_extusers`
--

DROP TABLE IF EXISTS os_core_dqhelpdesk_extusers;
CREATE TABLE os_core_dqhelpdesk_extusers (
  firstname varchar(255) default '',
  lastname varchar(255) default '',
  email varchar(255) NOT NULL default '',
  phone varchar(30) default '',
  PRIMARY KEY  (email)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_dqhelpdesk_extusers`
--

INSERT INTO os_core_dqhelpdesk_extusers VALUES ('1','Dimensionquest','www.dimensionquest.net','-= Thank you for installing my');

--
-- Table structure for table `os_core_dqhelpdesk_histories`
--

DROP TABLE IF EXISTS os_core_dqhelpdesk_histories;
CREATE TABLE os_core_dqhelpdesk_histories (
  history_id int(10) NOT NULL default '0',
  ticket_id int(10) NOT NULL default '0',
  history text,
  history_date varchar(20) default NULL,
  history_updatedby int(10) NOT NULL default '0',
  history_notes text,
  history_hours tinyint(3) unsigned default NULL,
  history_minutes tinyint(3) unsigned default NULL,
  PRIMARY KEY  (history_id),
  KEY ticket_id (ticket_id),
  KEY history_updatedby (history_updatedby)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_dqhelpdesk_histories`
--


--
-- Table structure for table `os_core_dqhelpdesk_manufacturers`
--

DROP TABLE IF EXISTS os_core_dqhelpdesk_manufacturers;
CREATE TABLE os_core_dqhelpdesk_manufacturers (
  manufacturer_id int(10) NOT NULL default '0',
  manufacturer varchar(255) NOT NULL default '',
  website varchar(255) default '',
  notes text,
  PRIMARY KEY  (manufacturer_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_dqhelpdesk_manufacturers`
--


--
-- Table structure for table `os_core_dqhelpdesk_priorities`
--

DROP TABLE IF EXISTS os_core_dqhelpdesk_priorities;
CREATE TABLE os_core_dqhelpdesk_priorities (
  priority_id int(10) NOT NULL default '0',
  priority varchar(255) NOT NULL default '',
  priority_color varchar(8) NOT NULL default '####',
  PRIMARY KEY  (priority_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_dqhelpdesk_priorities`
--

INSERT INTO os_core_dqhelpdesk_priorities VALUES (1,'Low','00B99B');
INSERT INTO os_core_dqhelpdesk_priorities VALUES (2,'Medium','F9FD5F');
INSERT INTO os_core_dqhelpdesk_priorities VALUES (3,'High','FF0000');
INSERT INTO os_core_dqhelpdesk_priorities VALUES (4,'Comment','FFC3C0');

--
-- Table structure for table `os_core_dqhelpdesk_software`
--

DROP TABLE IF EXISTS os_core_dqhelpdesk_software;
CREATE TABLE os_core_dqhelpdesk_software (
  software_id int(10) NOT NULL default '0',
  manufacturer_id int(10) default '0',
  swtype_id int(10) default '1',
  software_name varchar(255) NOT NULL default '',
  PRIMARY KEY  (software_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_dqhelpdesk_software`
--

INSERT INTO os_core_dqhelpdesk_software VALUES (1,1,1,'DQ Help Desk');

--
-- Table structure for table `os_core_dqhelpdesk_sources`
--

DROP TABLE IF EXISTS os_core_dqhelpdesk_sources;
CREATE TABLE os_core_dqhelpdesk_sources (
  source_id int(10) NOT NULL default '0',
  source varchar(255) NOT NULL default '',
  PRIMARY KEY  (source_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_dqhelpdesk_sources`
--

INSERT INTO os_core_dqhelpdesk_sources VALUES (1,'Web');
INSERT INTO os_core_dqhelpdesk_sources VALUES (2,'E-mail');
INSERT INTO os_core_dqhelpdesk_sources VALUES (3,'Phone');
INSERT INTO os_core_dqhelpdesk_sources VALUES (4,'Other');

--
-- Table structure for table `os_core_dqhelpdesk_status`
--

DROP TABLE IF EXISTS os_core_dqhelpdesk_status;
CREATE TABLE os_core_dqhelpdesk_status (
  status_id int(10) NOT NULL default '0',
  `status` varchar(255) NOT NULL default '',
  PRIMARY KEY  (status_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_dqhelpdesk_status`
--

INSERT INTO os_core_dqhelpdesk_status VALUES (1,'Open');
INSERT INTO os_core_dqhelpdesk_status VALUES (2,'In Work');
INSERT INTO os_core_dqhelpdesk_status VALUES (3,'Closed');

--
-- Table structure for table `os_core_dqhelpdesk_swtypes`
--

DROP TABLE IF EXISTS os_core_dqhelpdesk_swtypes;
CREATE TABLE os_core_dqhelpdesk_swtypes (
  swtype_id int(10) NOT NULL default '0',
  swtype varchar(255) NOT NULL default '',
  PRIMARY KEY  (swtype_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_dqhelpdesk_swtypes`
--

INSERT INTO os_core_dqhelpdesk_swtypes VALUES (1,'Support');

--
-- Table structure for table `os_core_dqhelpdesk_swversions`
--

DROP TABLE IF EXISTS os_core_dqhelpdesk_swversions;
CREATE TABLE os_core_dqhelpdesk_swversions (
  swversion_id int(10) NOT NULL default '0',
  software_id int(10) NOT NULL default '1',
  swversion varchar(10) NOT NULL default '',
  PRIMARY KEY  (swversion_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_dqhelpdesk_swversions`
--

INSERT INTO os_core_dqhelpdesk_swversions VALUES (1,1,'0.3.1');

--
-- Table structure for table `os_core_dqhelpdesk_tickets`
--

DROP TABLE IF EXISTS os_core_dqhelpdesk_tickets;
CREATE TABLE os_core_dqhelpdesk_tickets (
  ticket_id int(10) NOT NULL default '0',
  ticket_date varchar(20) default NULL,
  ticket_statusid int(10) NOT NULL default '1',
  ticket_typeid int(10) NOT NULL default '1',
  ticket_priorityid int(10) NOT NULL default '1',
  ticket_sourceid int(10) NOT NULL default '1',
  ticket_openedby int(10) NOT NULL default '0',
  ticket_assignedto int(10) NOT NULL default '0',
  ticket_closedby int(10) NOT NULL default '0',
  ticket_subject varchar(255) NOT NULL default '',
  ticket_lastupdate varchar(20) default NULL,
  ticket_swversionid int(10) NOT NULL default '0',
  ticket_softwareid int(10) NOT NULL default '0',
  ticket_anonname varchar(255) default '',
  ticket_anonphone varchar(255) default '',
  ticket_email varchar(255) default '',
  ticket_firstaction varchar(255) default '',
  PRIMARY KEY  (ticket_id),
  KEY ticket_statusid (ticket_statusid),
  KEY ticket_typeid (ticket_typeid),
  KEY ticket_priorityid (ticket_priorityid),
  KEY ticket_openedby (ticket_openedby),
  KEY ticket_assignedto (ticket_assignedto)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_dqhelpdesk_tickets`
--


--
-- Table structure for table `os_core_dqhelpdesk_types`
--

DROP TABLE IF EXISTS os_core_dqhelpdesk_types;
CREATE TABLE os_core_dqhelpdesk_types (
  type_id int(10) NOT NULL default '0',
  `type` varchar(255) NOT NULL default '',
  PRIMARY KEY  (type_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_dqhelpdesk_types`
--

INSERT INTO os_core_dqhelpdesk_types VALUES (1,'General HelpDesk');
INSERT INTO os_core_dqhelpdesk_types VALUES (2,'Tech Support');
INSERT INTO os_core_dqhelpdesk_types VALUES (3,'Networking');
INSERT INTO os_core_dqhelpdesk_types VALUES (4,'Telecom');

--
-- Table structure for table `os_core_ephem`
--

DROP TABLE IF EXISTS os_core_ephem;
CREATE TABLE os_core_ephem (
  pn_eid int(11) NOT NULL auto_increment,
  pn_did tinyint(2) NOT NULL default '0',
  pn_mid tinyint(2) NOT NULL default '0',
  pn_yid int(4) NOT NULL default '0',
  pn_content text,
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_eid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_ephem`
--


--
-- Table structure for table `os_core_eventia`
--

DROP TABLE IF EXISTS os_core_eventia;
CREATE TABLE os_core_eventia (
  pn_tid int(10) NOT NULL auto_increment,
  pn_course_NR varchar(30) default '',
  pn_course_title varchar(120) default '',
  pn_course_type varchar(100) default '',
  pn_course_description text,
  pn_course_location varchar(100) default '',
  pn_course_street varchar(100) default '',
  pn_course_plz varchar(6) default '',
  pn_course_city varchar(100) default '',
  pn_course_edu_points int(2) default '0',
  pn_course_trainer varchar(100) default '',
  pn_course_length int(2) default '0',
  pn_course_cost decimal(7,2) default '0.00',
  pn_course_starttime varchar(5) default '00:00',
  pn_course_start date default '0000-00-00',
  pn_course_end date default '0000-00-00',
  pn_course_active int(1) default '1',
  pn_course_pub int(1) default '0',
  pn_course_full int(1) default '0',
  pn_course_admmail int(1) default '0',
  pn_course_email_info_to varchar(60) default '',
  PRIMARY KEY  (pn_tid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_eventia`
--


--
-- Table structure for table `os_core_eventia_regs`
--

DROP TABLE IF EXISTS os_core_eventia_regs;
CREATE TABLE os_core_eventia_regs (
  pn_reg_id int(10) NOT NULL auto_increment,
  pn_reg_time int(10) default NULL,
  pn_reg_course_NR varchar(30) default '',
  pn_reg_toname varchar(50) default '',
  pn_reg_toaddress varchar(50) default '',
  pn_reg_toaddress2 varchar(50) default '',
  pn_reg_toaddress3 varchar(50) default '',
  pn_reg_tel varchar(50) default '',
  pn_reg_info text,
  pn_reg_info_int text,
  pn_reg_active int(1) default '1',
  pn_reg_ready int(1) default '0',
  PRIMARY KEY  (pn_reg_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_eventia_regs`
--


--
-- Table structure for table `os_core_ezcomments`
--

DROP TABLE IF EXISTS os_core_ezcomments;
CREATE TABLE os_core_ezcomments (
  id int(11) NOT NULL auto_increment,
  modname varchar(64) NOT NULL default '',
  objectid text NOT NULL,
  url text NOT NULL,
  `date` datetime default NULL,
  uid int(11) default '0',
  `comment` text NOT NULL,
  `subject` text NOT NULL,
  replyto int(11) NOT NULL default '-1',
  anonname varchar(255) NOT NULL default '',
  anonmail varchar(255) NOT NULL default '',
  `status` int(4) NOT NULL default '0',
  ipaddr varchar(85) NOT NULL default '',
  `type` varchar(64) NOT NULL default '',
  anonwebsite varchar(255) NOT NULL default '',
  PRIMARY KEY  (id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_ezcomments`
--


--
-- Table structure for table `os_core_faqanswer`
--

DROP TABLE IF EXISTS os_core_faqanswer;
CREATE TABLE os_core_faqanswer (
  pn_id int(6) NOT NULL auto_increment,
  pn_id_cat int(6) default NULL,
  pn_question text,
  pn_answer text,
  pn_submittedby varchar(250) NOT NULL default '',
  PRIMARY KEY  (pn_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_faqanswer`
--


--
-- Table structure for table `os_core_faqcategories`
--

DROP TABLE IF EXISTS os_core_faqcategories;
CREATE TABLE os_core_faqcategories (
  pn_id_cat int(6) NOT NULL auto_increment,
  pn_categories varchar(255) default NULL,
  pn_language varchar(30) NOT NULL default '',
  pn_parent_id int(6) NOT NULL default '0',
  PRIMARY KEY  (pn_id_cat)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_faqcategories`
--


--
-- Table structure for table `os_core_group_membership`
--

DROP TABLE IF EXISTS os_core_group_membership;
CREATE TABLE os_core_group_membership (
  pn_gid int(11) NOT NULL default '0',
  pn_uid int(11) NOT NULL default '0',
  KEY idx_ug (pn_uid,pn_gid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_group_membership`
--

INSERT INTO os_core_group_membership VALUES (2,2);
INSERT INTO os_core_group_membership VALUES (1,3);

--
-- Table structure for table `os_core_group_perms`
--

DROP TABLE IF EXISTS os_core_group_perms;
CREATE TABLE os_core_group_perms (
  pn_pid int(11) NOT NULL auto_increment,
  pn_gid int(11) NOT NULL default '0',
  pn_sequence int(11) NOT NULL default '0',
  pn_realm smallint(4) NOT NULL default '0',
  pn_component varchar(255) NOT NULL default '',
  pn_instance varchar(255) NOT NULL default '',
  pn_level smallint(4) NOT NULL default '0',
  pn_bond int(2) NOT NULL default '0',
  PRIMARY KEY  (pn_pid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_group_perms`
--

INSERT INTO os_core_group_perms VALUES (1,2,1,0,'.*','.*',800,0);
INSERT INTO os_core_group_perms VALUES (2,-1,3,0,'Menublock::','Main Menu:Administration:',0,0);
INSERT INTO os_core_group_perms VALUES (3,1,9,0,'.*','.*',300,0);
INSERT INTO os_core_group_perms VALUES (4,0,4,0,'Menublock::','Main Menu:(My Account|Logout|Submit News):',0,0);
INSERT INTO os_core_group_perms VALUES (5,0,10,0,'.*','.*',200,0);
INSERT INTO os_core_group_perms VALUES (6,-1,5,0,'v4bMenublock::','Menu:(3):',0,0);
INSERT INTO os_core_group_perms VALUES (7,0,6,0,'v4bMenublock::','Menu:(2|4|5|7|8|10|12|16|17|19|20|21|22|23|24|25):',0,0);
INSERT INTO os_core_group_perms VALUES (8,0,7,0,'Submit news::','.*',600,0);
INSERT INTO os_core_group_perms VALUES (9,0,8,0,'v4bJournal::','.*',300,0);
INSERT INTO os_core_group_perms VALUES (10,0,2,0,'pnForum::','.*:(4):',0,0);

--
-- Table structure for table `os_core_groups`
--

DROP TABLE IF EXISTS os_core_groups;
CREATE TABLE os_core_groups (
  pn_gid int(11) NOT NULL auto_increment,
  pn_name varchar(255) NOT NULL default '',
  PRIMARY KEY  (pn_gid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_groups`
--

INSERT INTO os_core_groups VALUES (1,'Users');
INSERT INTO os_core_groups VALUES (2,'Admins');

--
-- Table structure for table `os_core_headlines`
--

DROP TABLE IF EXISTS os_core_headlines;
CREATE TABLE os_core_headlines (
  pn_id int(11) unsigned NOT NULL auto_increment,
  pn_sitename varchar(255) NOT NULL default '',
  pn_rssuser varchar(10) default NULL,
  pn_rsspasswd varchar(10) default NULL,
  pn_use_proxy tinyint(3) NOT NULL default '0',
  pn_rssurl varchar(255) NOT NULL default '',
  pn_maxrows tinyint(3) NOT NULL default '10',
  pn_siteurl varchar(255) NOT NULL default '',
  pn_options varchar(20) default '',
  PRIMARY KEY  (pn_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_headlines`
--

INSERT INTO os_core_headlines VALUES (1,'PostNuke',NULL,NULL,0,'http://postnuke.com/backend.php',10,'','');
INSERT INTO os_core_headlines VALUES (2,'LinuxCentral',NULL,NULL,0,'http://linuxcentral.com/backend/lcnew.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (3,'Slashdot',NULL,NULL,0,'http://slashdot.org/slashdot.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (4,'NewsForge',NULL,NULL,0,'http://www.newsforge.com/newsforge.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (5,'PHPBuilder',NULL,NULL,0,'http://phpbuilder.com/rss_feed.php',10,'','');
INSERT INTO os_core_headlines VALUES (6,'Linux.com',NULL,NULL,0,'http://linux.com/mrn/front_page.rss',10,'','');
INSERT INTO os_core_headlines VALUES (7,'Freshmeat',NULL,NULL,0,'http://freshmeat.net/backend/fm.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (9,'LinuxWeeklyNews',NULL,NULL,0,'http://lwn.net/headlines/rss',10,'','');
INSERT INTO os_core_headlines VALUES (11,'Segfault',NULL,NULL,0,'http://segfault.org/stories.xml',10,'','');
INSERT INTO os_core_headlines VALUES (13,'KDE',NULL,NULL,0,'http://www.kde.org/news/kdenews.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (14,'Perl.com',NULL,NULL,0,'http://www.perl.com/pace/perlnews.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (17,'MozillaNewsBot',NULL,NULL,0,'http://www.mozilla.org/newsbot/newsbot.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (21,'SciFi-News',NULL,NULL,0,'http://www.technopagan.org/sf-news/rdf.php',10,'','');
INSERT INTO os_core_headlines VALUES (26,'DrDobbsTechNetCast',NULL,NULL,0,'http://www.technetcast.com/tnc_headlines.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (27,'RivaExtreme',NULL,NULL,0,'http://rivaextreme.com/ssi/rivaextreme.rdf.cdf',10,'','');
INSERT INTO os_core_headlines VALUES (29,'PBSOnline',NULL,NULL,0,'http://cgi.pbs.org/cgi-registry/featuresrdf.pl',10,'','');
INSERT INTO os_core_headlines VALUES (30,'Listology',NULL,NULL,0,'http://listology.com/recent.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (33,'exoScience',NULL,NULL,0,'http://www.exosci.com/exosci.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (39,'DailyDaemonNews',NULL,NULL,0,'http://daily.daemonnews.org/ddn.rdf.php3',10,'','');
INSERT INTO os_core_headlines VALUES (40,'PerlMonks',NULL,NULL,0,'http://www.perlmonks.org/headlines.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (42,'BSDToday',NULL,NULL,0,'http://www.bsdtoday.com/backend/bt.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (45,'HotWired',NULL,NULL,0,'http://www.hotwired.com/webmonkey/meta/headlines.rdf',10,'','');
INSERT INTO os_core_headlines VALUES (52,'SolarisCentral',NULL,NULL,0,'http://www.SolarisCentral.org/news/SolarisCentral.rdf',10,'','');

--
-- Table structure for table `os_core_hooks`
--

DROP TABLE IF EXISTS os_core_hooks;
CREATE TABLE os_core_hooks (
  pn_id int(11) unsigned NOT NULL auto_increment,
  pn_object varchar(64) NOT NULL default '',
  pn_action varchar(64) NOT NULL default '',
  pn_smodule varchar(64) default NULL,
  pn_stype varchar(64) default NULL,
  pn_tarea varchar(64) NOT NULL default '',
  pn_tmodule varchar(64) NOT NULL default '',
  pn_ttype varchar(64) NOT NULL default '',
  pn_tfunc varchar(64) NOT NULL default '',
  PRIMARY KEY  (pn_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_hooks`
--

INSERT INTO os_core_hooks VALUES (2,'item','transform',NULL,NULL,'API','Censor','user','transform');
INSERT INTO os_core_hooks VALUES (3,'item','display',NULL,NULL,'GUI','EZComments','user','view');
INSERT INTO os_core_hooks VALUES (4,'item','transform',NULL,NULL,'API','MultiHook','user','transform');
INSERT INTO os_core_hooks VALUES (5,'item','transform',NULL,NULL,'API','pn_bbclick','user','transform');
INSERT INTO os_core_hooks VALUES (6,'item','transform',NULL,NULL,'API','pn_bbcode','user','transform');
INSERT INTO os_core_hooks VALUES (7,'item','transform',NULL,NULL,'API','pn_bbsmile','user','transform');
INSERT INTO os_core_hooks VALUES (8,'item','transform',NULL,NULL,'API','pn_highlight','user','transform');
INSERT INTO os_core_hooks VALUES (9,'item','display',NULL,NULL,'GUI','Ratings','user','display');
INSERT INTO os_core_hooks VALUES (10,'item','delete',NULL,NULL,'API','Ratings','admin','deletehook');
INSERT INTO os_core_hooks VALUES (11,'module','remove',NULL,NULL,'API','Ratings','admin','removehook');
INSERT INTO os_core_hooks VALUES (12,'item','transform',NULL,NULL,'API','Wiki','user','transform');
INSERT INTO os_core_hooks VALUES (13,'item','create',NULL,NULL,'API','pnGroups','admin','groupadded');
INSERT INTO os_core_hooks VALUES (14,'item','delete',NULL,NULL,'API','pnGroups','admin','groupdeleted');
INSERT INTO os_core_hooks VALUES (18,'item','delete',NULL,NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (19,'module','remove',NULL,NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (21,'item','delete',NULL,NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (22,'module','remove',NULL,NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (24,'item','delete',NULL,NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (25,'module','remove',NULL,NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (27,'item','delete',NULL,NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (28,'module','remove',NULL,NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (30,'item','delete',NULL,NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (31,'module','remove',NULL,NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (33,'item','delete',NULL,NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (34,'module','remove',NULL,NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (35,'item','create',NULL,NULL,'API','pnForum','hook','createbyitem');
INSERT INTO os_core_hooks VALUES (36,'item','update',NULL,NULL,'API','pnForum','hook','updatebyitem');
INSERT INTO os_core_hooks VALUES (37,'item','delete',NULL,NULL,'API','pnForum','hook','deletebyitem');
INSERT INTO os_core_hooks VALUES (38,'item','display',NULL,NULL,'GUI','pnForum','hook','showdiscussionlink');
INSERT INTO os_core_hooks VALUES (40,'item','delete',NULL,NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (41,'module','remove',NULL,NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (43,'item','delete',NULL,NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (44,'module','remove',NULL,NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (45,'item','display',NULL,NULL,'GUI','EZComments','user','view');
INSERT INTO os_core_hooks VALUES (46,'item','delete',NULL,NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (47,'module','remove',NULL,NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (71,'item','delete','v4bJournal',NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (72,'module','remove','v4bJournal',NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (73,'item','delete','v4bJournal',NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (74,'module','remove','v4bJournal',NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (75,'item','delete','v4bJournal',NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (76,'module','remove','v4bJournal',NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (77,'item','delete','v4bJournal',NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (78,'module','remove','v4bJournal',NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (79,'item','display','v4bJournal',NULL,'GUI','EZComments','user','view');
INSERT INTO os_core_hooks VALUES (80,'item','display','v4bJournal',NULL,'GUI','EZComments','user','view');
INSERT INTO os_core_hooks VALUES (81,'item','delete','v4bJournal',NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (82,'module','remove','v4bJournal',NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (83,'item','delete','v4bJournal',NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (84,'module','remove','v4bJournal',NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (85,'item','delete','v4bJournal',NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (86,'module','remove','v4bJournal',NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (87,'item','delete','v4bJournal',NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (88,'module','remove','v4bJournal',NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (89,'item','delete','v4bJournal',NULL,'API','EZComments','admin','deletebyitem');
INSERT INTO os_core_hooks VALUES (90,'module','remove','v4bJournal',NULL,'API','EZComments','admin','deletemodule');
INSERT INTO os_core_hooks VALUES (91,'item','transform','v4bJournal',NULL,'API','MultiHook','user','transform');
INSERT INTO os_core_hooks VALUES (92,'item','transform','v4bJournal',NULL,'API','pn_bbclick','user','transform');
INSERT INTO os_core_hooks VALUES (93,'item','transform','v4bJournal',NULL,'API','pn_bbcode','user','transform');
INSERT INTO os_core_hooks VALUES (94,'item','transform','v4bJournal',NULL,'API','pn_bbsmile','user','transform');

--
-- Table structure for table `os_core_htmlpages`
--

DROP TABLE IF EXISTS os_core_htmlpages;
CREATE TABLE os_core_htmlpages (
  pn_pid int(10) NOT NULL auto_increment,
  pn_uid int(11) NOT NULL default '0',
  pn_title varchar(128) NOT NULL default '',
  pn_content text NOT NULL,
  pn_timest date default '0000-00-00',
  pn_printlink tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (pn_pid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_htmlpages`
--


--
-- Table structure for table `os_core_ip_country`
--

DROP TABLE IF EXISTS os_core_ip_country;
CREATE TABLE os_core_ip_country (
  pn_id int(11) NOT NULL auto_increment,
  pn_startip varchar(15) NOT NULL default '',
  pn_endip varchar(15) NOT NULL default '',
  pn_startlongip int(11) unsigned NOT NULL default '0',
  pn_endlongip int(11) unsigned NOT NULL default '0',
  pn_code char(2) NOT NULL default '',
  pn_country varchar(40) NOT NULL default '',
  PRIMARY KEY  (pn_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_ip_country`
--

INSERT INTO os_core_ip_country VALUES (1,'2.6.190.56','222.247.255.255',33996344,3740794879,'Un','Unknown - Load ip_country Table');

--
-- Table structure for table `os_core_message`
--

DROP TABLE IF EXISTS os_core_message;
CREATE TABLE os_core_message (
  pn_mid int(11) NOT NULL auto_increment,
  pn_title varchar(100) NOT NULL default '',
  pn_content longtext,
  pn_date varchar(14) NOT NULL default '',
  pn_expire int(7) NOT NULL default '0',
  pn_active int(4) NOT NULL default '1',
  pn_view int(1) NOT NULL default '1',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_mid),
  KEY idx_exp (pn_active,pn_expire)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_message`
--

INSERT INTO os_core_message VALUES (1,'OpenStar 4.03','<a href=\"http:www.open-star.org\">OpenStar</a> ist ein auf <a href=\"http://www.postnuke.com\" target=\"_blank\">PostNuke</a> basierendes Content Management System (CMS), das Inhalte von Design und Technik trennt. Die Inhalte einer Internetpräsenz (zum Beispiel Artikel, Links, Downloads, FAQs, Bildergalerien, Foren etc.) können dabei direkt via Browser verwaltet werden. Durch die klare Aufgliederung in Form, Funktion, Inhalt und Gestaltung hilft PostNuke, die Kosten und den Aufwand beim Betrieb einer Website zu reduzieren.<br /><br />\r\nOpenStar ist (wie PostNuke) modular aufgebaut und erweitert den Funktionsumfang von PostNuke durch die Aufnahme von externen Modulen. Des weiteren enthält Open-Star eine Objektorientierte Entwicklungsumgebung welche die Erstellung von Modulen beträchtlich vereinfacht. Infos und Support (ohne Garanie, da gratis) gibtes unter <a href=\"http://www.open-star.org\" target=\"_blank\">open-star.org</a>.</b><br /><br />\r\n<i>Anmerkung: Diese Meldung kann in Administration-Admin Nachrichten bearbeitet werden.</i>','993373194',0,1,1,'deu');
INSERT INTO os_core_message VALUES (2,'OpenStar 4.03','<a href=\"http://www.open-star.org\">OpenStar</a> is a Content Management System (CMS) based on <a href=\"http://www.postnuke.com\" target=\"_blank\">PostNuke</a>, separating content from design and storage. The content driving an internet presence (ex: Articles, News, Links,Downloads, FAQs, Image Galleries, Forums etc.) can be administererd directly through any standard web browser. Through the strict separation of content and presentation the system provides powerful functionalities while limiting the effort required to manage such a site. <br /><br/>\r\nOpenStar is (as is PostNuke) a modular system; it extends the functionalities PostNuke delivers through the integration of external modules and provides and object-oriented development environment which significantly eases module development. More info und support (no guarantees, it\'s free) can be found under <a href=\"http://www.open-star.org\" target=\"_blank\">open-star.org</a>.</b><br /><br />\r\n<i>Comment: This message can be managed under the Admin Section under the Administrative Messages icon.</i>','1111413699',0,1,1,'eng');

--
-- Table structure for table `os_core_module_vars`
--

DROP TABLE IF EXISTS os_core_module_vars;
CREATE TABLE os_core_module_vars (
  pn_id int(11) unsigned NOT NULL auto_increment,
  pn_modname varchar(64) NOT NULL default '',
  pn_name varchar(64) NOT NULL default '',
  pn_value longtext,
  PRIMARY KEY  (pn_id),
  KEY pn_modname (pn_modname),
  KEY pn_name (pn_name)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_module_vars`
--

INSERT INTO os_core_module_vars VALUES (1,'Groups','defaultgroup','Users');
INSERT INTO os_core_module_vars VALUES (2,'Blocks','collapseable','1');
INSERT INTO os_core_module_vars VALUES (3,'Admin','modulesperrow','5');
INSERT INTO os_core_module_vars VALUES (4,'Admin','itemsperpage','50');
INSERT INTO os_core_module_vars VALUES (5,'Admin','defaultcategory','5');
INSERT INTO os_core_module_vars VALUES (6,'Admin','modulestylesheet','navtabs.css');
INSERT INTO os_core_module_vars VALUES (7,'Admin','admingraphic','1');
INSERT INTO os_core_module_vars VALUES (8,'Admin','startcategory','1');
INSERT INTO os_core_module_vars VALUES (9,'Admin','ignoreinstallercheck','');
INSERT INTO os_core_module_vars VALUES (10,'Modules','itemsperpage','25');
INSERT INTO os_core_module_vars VALUES (11,'Groups','itemsperpage','25');
INSERT INTO os_core_module_vars VALUES (12,'/PNConfig','adminmail','s:20:\"openstar@example.com\";');
INSERT INTO os_core_module_vars VALUES (13,'/PNConfig','debug','i:0;');
INSERT INTO os_core_module_vars VALUES (14,'/PNConfig','sitename','s:8:\"OpenStar\";');
INSERT INTO os_core_module_vars VALUES (15,'/PNConfig','site_logo','s:8:\"logo.gif\";');
INSERT INTO os_core_module_vars VALUES (16,'/PNConfig','slogan','s:41:\"Open Source Enterprise Content Management\";');
INSERT INTO os_core_module_vars VALUES (17,'/PNConfig','metakeywords','s:218:\"nuke, postnuke, openstar, free, community, php, portal, opensource, open source, gpl, mysql, sql, database, web site, website, weblog, content management, contentmanagement, web content management, webcontentmanagement\";');
INSERT INTO os_core_module_vars VALUES (18,'/PNConfig','dyn_keywords','i:0;');
INSERT INTO os_core_module_vars VALUES (19,'/PNConfig','startdate','s:7:\"09.2005\";');
INSERT INTO os_core_module_vars VALUES (20,'/PNConfig','Default_Theme','s:6:\"ATBlue\";');
INSERT INTO os_core_module_vars VALUES (21,'/PNConfig','foot1','s:935:\"<a href=\"http://openstar.postnuke.com\"><img src=\"images/powered/small/cms_openstar.png\" alt=\"OpenStar: a Value-Added PN Distribution\" /></a> <a href=\"http://www.postnuke.com\"><img src=\"images/powered/small/pn_grey.png\" alt=\"Web site powered by PostNuke\" /></a> <a href=\"http://adodb.sourceforge.net\"><img src=\"images/powered/small/adodb_powered.png\" alt=\"ADODB database library\" /></a> <a href=\"http://www.php.net\"><img src=\"images/powered/small/php_powered.png\" alt=\"PHP Language\" /></a><p>All logos and trademarks in this site are property of their respective owner. The comments are property of their posters, all the rest (c) 2005 by me<br />This web site was made with <a href=\"http://www.postnuke.com\">PostNuke</a>, a web portal system written in PHP. PostNuke is Free Software released under the <a href=\"http://www.gnu.org\">GNU/GPL license</a>.</p>You can syndicate our news using the file <a href=\"backend.php\">backend.php</a>\";');
INSERT INTO os_core_module_vars VALUES (22,'/PNConfig','commentlimit','i:4096;');
INSERT INTO os_core_module_vars VALUES (23,'/PNConfig','anonymous','s:9:\"Anonymous\";');
INSERT INTO os_core_module_vars VALUES (24,'/PNConfig','timezone_offset','s:2:\"12\";');
INSERT INTO os_core_module_vars VALUES (25,'/PNConfig','nobox','s:1:\"0\";');
INSERT INTO os_core_module_vars VALUES (26,'/PNConfig','funtext','s:1:\"0\";');
INSERT INTO os_core_module_vars VALUES (27,'/PNConfig','reportlevel','s:1:\"0\";');
INSERT INTO os_core_module_vars VALUES (28,'/PNConfig','startpage','s:13:\"v4bNewContent\";');
INSERT INTO os_core_module_vars VALUES (29,'/PNConfig','admingraphic','i:1;');
INSERT INTO os_core_module_vars VALUES (30,'/PNConfig','admart','s:2:\"20\";');
INSERT INTO os_core_module_vars VALUES (31,'/PNConfig','backend_title','s:21:\"PostNuke Powered Site\";');
INSERT INTO os_core_module_vars VALUES (32,'/PNConfig','backend_language','s:5:\"en-us\";');
INSERT INTO os_core_module_vars VALUES (33,'/PNConfig','seclevel','s:6:\"Medium\";');
INSERT INTO os_core_module_vars VALUES (34,'/PNConfig','secmeddays','s:1:\"7\";');
INSERT INTO os_core_module_vars VALUES (35,'/PNConfig','secinactivemins','s:2:\"10\";');
INSERT INTO os_core_module_vars VALUES (36,'/PNConfig','Version_Num','s:7:\"0.7.6.1\";');
INSERT INTO os_core_module_vars VALUES (37,'/PNConfig','Version_ID','s:8:\"PostNuke\";');
INSERT INTO os_core_module_vars VALUES (38,'/PNConfig','Version_Sub','s:7:\"Phoenix\";');
INSERT INTO os_core_module_vars VALUES (39,'/PNConfig','debug_sql','i:0;');
INSERT INTO os_core_module_vars VALUES (40,'/PNConfig','anonpost','i:1;');
INSERT INTO os_core_module_vars VALUES (41,'/PNConfig','minpass','i:5;');
INSERT INTO os_core_module_vars VALUES (42,'/PNConfig','pollcomm','i:1;');
INSERT INTO os_core_module_vars VALUES (43,'/PNConfig','minage','i:13;');
INSERT INTO os_core_module_vars VALUES (44,'/PNConfig','top','i:10;');
INSERT INTO os_core_module_vars VALUES (45,'/PNConfig','storyhome','s:2:\"10\";');
INSERT INTO os_core_module_vars VALUES (46,'/PNConfig','banners','b:0;');
INSERT INTO os_core_module_vars VALUES (47,'/PNConfig','myIP','s:15:\"192.168.123.254\";');
INSERT INTO os_core_module_vars VALUES (48,'/PNConfig','language','s:3:\"eng\";');
INSERT INTO os_core_module_vars VALUES (49,'/PNConfig','anonymoussessions','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (50,'/PNConfig','multilingual','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (51,'/PNConfig','useflags','s:1:\"0\";');
INSERT INTO os_core_module_vars VALUES (52,'/PNConfig','perpage','i:10;');
INSERT INTO os_core_module_vars VALUES (53,'/PNConfig','popular','i:500;');
INSERT INTO os_core_module_vars VALUES (54,'/PNConfig','newlinks','i:10;');
INSERT INTO os_core_module_vars VALUES (55,'/PNConfig','toplinks','i:25;');
INSERT INTO os_core_module_vars VALUES (56,'/PNConfig','linksresults','i:10;');
INSERT INTO os_core_module_vars VALUES (57,'/PNConfig','links_anonaddlinklock','i:0;');
INSERT INTO os_core_module_vars VALUES (58,'/PNConfig','anonwaitdays','i:1;');
INSERT INTO os_core_module_vars VALUES (59,'/PNConfig','outsidewaitdays','i:1;');
INSERT INTO os_core_module_vars VALUES (60,'/PNConfig','useoutsidevoting','i:1;');
INSERT INTO os_core_module_vars VALUES (61,'/PNConfig','anonweight','i:10;');
INSERT INTO os_core_module_vars VALUES (62,'/PNConfig','outsideweight','i:20;');
INSERT INTO os_core_module_vars VALUES (63,'/PNConfig','detailvotedecimal','i:2;');
INSERT INTO os_core_module_vars VALUES (64,'/PNConfig','mainvotedecimal','i:1;');
INSERT INTO os_core_module_vars VALUES (65,'/PNConfig','toplinkspercentrigger','i:0;');
INSERT INTO os_core_module_vars VALUES (66,'/PNConfig','mostpoplinkspercentrigger','i:0;');
INSERT INTO os_core_module_vars VALUES (67,'/PNConfig','mostpoplinks','i:25;');
INSERT INTO os_core_module_vars VALUES (68,'/PNConfig','featurebox','i:1;');
INSERT INTO os_core_module_vars VALUES (69,'/PNConfig','linkvotemin','i:5;');
INSERT INTO os_core_module_vars VALUES (70,'/PNConfig','blockunregmodify','i:0;');
INSERT INTO os_core_module_vars VALUES (71,'/PNConfig','newdownloads','i:10;');
INSERT INTO os_core_module_vars VALUES (72,'/PNConfig','topdownloads','i:25;');
INSERT INTO os_core_module_vars VALUES (73,'/PNConfig','downloadsresults','i:10;');
INSERT INTO os_core_module_vars VALUES (74,'/PNConfig','downloads_anonadddownloadlock','i:1;');
INSERT INTO os_core_module_vars VALUES (75,'/PNConfig','topdownloadspercentrigger','i:0;');
INSERT INTO os_core_module_vars VALUES (76,'/PNConfig','mostpopdownloadspercentrigger','i:0;');
INSERT INTO os_core_module_vars VALUES (77,'/PNConfig','mostpopdownloads','i:25;');
INSERT INTO os_core_module_vars VALUES (78,'/PNConfig','downloadvotemin','i:5;');
INSERT INTO os_core_module_vars VALUES (79,'/PNConfig','notify','i:0;');
INSERT INTO os_core_module_vars VALUES (80,'/PNConfig','notify_email','s:15:\"me@yoursite.com\";');
INSERT INTO os_core_module_vars VALUES (81,'/PNConfig','notify_subject','s:16:\"NEWS for my site\";');
INSERT INTO os_core_module_vars VALUES (82,'/PNConfig','notify_message','s:44:\"Hey! You got a new submission for your site.\";');
INSERT INTO os_core_module_vars VALUES (83,'/PNConfig','notify_from','s:9:\"webmaster\";');
INSERT INTO os_core_module_vars VALUES (84,'/PNConfig','moderate','i:1;');
INSERT INTO os_core_module_vars VALUES (85,'/PNConfig','BarScale','i:1;');
INSERT INTO os_core_module_vars VALUES (86,'/PNConfig','tipath','s:14:\"images/topics/\";');
INSERT INTO os_core_module_vars VALUES (87,'/PNConfig','userimg','s:11:\"images/menu\";');
INSERT INTO os_core_module_vars VALUES (88,'/PNConfig','usergraphic','i:1;');
INSERT INTO os_core_module_vars VALUES (89,'/PNConfig','topicsinrow','i:5;');
INSERT INTO os_core_module_vars VALUES (90,'/PNConfig','httpref','i:0;');
INSERT INTO os_core_module_vars VALUES (91,'/PNConfig','httprefmax','i:1000;');
INSERT INTO os_core_module_vars VALUES (92,'/PNConfig','reasons','a:11:{i:0;s:5:\"As Is\";i:1;s:8:\"Offtopic\";i:2;s:9:\"Flamebait\";i:3;s:5:\"Troll\";i:4;s:9:\"Redundant\";i:5;s:10:\"Insightful\";i:6;s:11:\"Interesting\";i:7;s:11:\"Informative\";i:8;s:5:\"Funny\";i:9;s:9:\"Overrated\";i:10;s:10:\"Underrated\";}');
INSERT INTO os_core_module_vars VALUES (93,'/PNConfig','AllowableHTML','a:83:{s:3:\"!--\";s:1:\"2\";s:1:\"a\";s:1:\"2\";s:4:\"abbr\";s:1:\"2\";s:7:\"acronym\";i:0;s:7:\"address\";s:1:\"2\";s:6:\"applet\";i:0;s:4:\"area\";i:0;s:1:\"b\";s:1:\"1\";s:4:\"base\";i:0;s:8:\"basefont\";i:0;s:3:\"bdo\";i:0;s:3:\"big\";s:1:\"1\";s:10:\"blockquote\";s:1:\"2\";s:2:\"br\";s:1:\"1\";s:6:\"button\";i:0;s:7:\"caption\";i:0;s:6:\"center\";s:1:\"1\";s:4:\"cite\";s:1:\"2\";s:4:\"code\";i:0;s:3:\"col\";s:1:\"1\";s:8:\"colgroup\";s:1:\"1\";s:3:\"del\";i:0;s:3:\"dfn\";i:0;s:3:\"dir\";i:0;s:3:\"div\";i:0;s:2:\"dl\";i:0;s:2:\"dd\";i:0;s:2:\"dt\";i:0;s:2:\"em\";s:1:\"1\";s:5:\"embed\";i:0;s:8:\"fieldset\";s:1:\"2\";s:4:\"font\";s:1:\"2\";s:4:\"form\";i:0;s:2:\"h1\";i:0;s:2:\"h2\";i:0;s:2:\"h3\";i:0;s:2:\"h4\";i:0;s:2:\"h5\";i:0;s:2:\"h6\";i:0;s:2:\"hr\";s:1:\"1\";s:1:\"i\";s:1:\"1\";s:6:\"iframe\";i:0;s:3:\"img\";s:1:\"2\";s:5:\"input\";i:0;s:3:\"ins\";i:0;s:3:\"kbd\";i:0;s:5:\"label\";s:1:\"2\";s:6:\"legend\";s:1:\"2\";s:2:\"li\";s:1:\"1\";s:3:\"map\";i:0;s:7:\"marquee\";i:0;s:4:\"menu\";i:0;s:4:\"nobr\";i:0;s:6:\"object\";i:0;s:2:\"ol\";s:1:\"1\";s:8:\"optgroup\";i:0;s:6:\"option\";i:0;s:1:\"p\";s:1:\"1\";s:5:\"param\";i:0;s:3:\"pre\";s:1:\"1\";s:1:\"q\";i:0;s:1:\"s\";i:0;s:4:\"samp\";i:0;s:6:\"script\";i:0;s:6:\"select\";i:0;s:5:\"small\";i:0;s:4:\"span\";i:0;s:6:\"strike\";s:1:\"1\";s:6:\"strong\";s:1:\"1\";s:3:\"sub\";i:0;s:3:\"sup\";i:0;s:5:\"table\";s:1:\"2\";s:5:\"tbody\";s:1:\"2\";s:2:\"td\";s:1:\"2\";s:8:\"textarea\";i:0;s:5:\"tfoot\";i:0;s:2:\"th\";s:1:\"2\";s:5:\"thead\";s:1:\"2\";s:2:\"tr\";s:1:\"2\";s:2:\"tt\";s:1:\"1\";s:1:\"u\";s:1:\"1\";s:2:\"ul\";s:1:\"1\";s:3:\"var\";i:0;}');
INSERT INTO os_core_module_vars VALUES (94,'/PNConfig','CensorList','a:14:{i:0;s:4:\"fuck\";i:1;s:4:\"cunt\";i:2;s:6:\"fucker\";i:3;s:7:\"fucking\";i:4;s:5:\"pussy\";i:5;s:4:\"cock\";i:6;s:4:\"c0ck\";i:7;s:3:\"cum\";i:8;s:4:\"twat\";i:9;s:4:\"clit\";i:10;s:5:\"bitch\";i:11;s:3:\"fuk\";i:12;s:6:\"fuking\";i:13;s:12:\"motherfucker\";}');
INSERT INTO os_core_module_vars VALUES (95,'/PNConfig','CensorMode','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (96,'/PNConfig','CensorReplace','s:5:\"*****\";');
INSERT INTO os_core_module_vars VALUES (97,'/PNConfig','theme_change','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (98,'/PNConfig','htmlentities','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (99,'/PNConfig','UseCompression','s:1:\"0\";');
INSERT INTO os_core_module_vars VALUES (100,'/PNConfig','refereronprint','s:1:\"0\";');
INSERT INTO os_core_module_vars VALUES (101,'/PNConfig','storyorder','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (102,'/PNConfig','pnAntiCracker','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (103,'/PNConfig','reg_allowreg','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (104,'/PNConfig','reg_verifyemail','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (105,'/PNConfig','reg_Illegalusername','s:87:\"root adm linux webmaster admin god administrator administrador nobody anonymous anonimo\";');
INSERT INTO os_core_module_vars VALUES (106,'/PNConfig','reg_noregreasons','s:45:\"Sorry, registration is disabled at this time.\";');
INSERT INTO os_core_module_vars VALUES (107,'/PNConfig','loadlegacy','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (108,'/PNConfig','newspager','s:1:\"0\";');
INSERT INTO os_core_module_vars VALUES (109,'pnrender','compile_check','1');
INSERT INTO os_core_module_vars VALUES (110,'pnrender','force_compile','');
INSERT INTO os_core_module_vars VALUES (111,'pnrender','cache','');
INSERT INTO os_core_module_vars VALUES (112,'pnrender','expose_template','');
INSERT INTO os_core_module_vars VALUES (113,'pnrender','lifetime','3600');
INSERT INTO os_core_module_vars VALUES (114,'Xanthia','rootpath','modules');
INSERT INTO os_core_module_vars VALUES (115,'Xanthia','vba','0');
INSERT INTO os_core_module_vars VALUES (116,'Xanthia','enablecache','0');
INSERT INTO os_core_module_vars VALUES (117,'Xanthia','modulesnocache','');
INSERT INTO os_core_module_vars VALUES (118,'Xanthia','db_cache','0');
INSERT INTO os_core_module_vars VALUES (119,'Xanthia','db_compile','0');
INSERT INTO os_core_module_vars VALUES (120,'Xanthia','compile_check','0');
INSERT INTO os_core_module_vars VALUES (121,'Xanthia','use_db','0');
INSERT INTO os_core_module_vars VALUES (122,'Xanthia','cache_lifetime','3600');
INSERT INTO os_core_module_vars VALUES (123,'Xanthia','db_templates','0');
INSERT INTO os_core_module_vars VALUES (124,'Xanthia','block_control','0');
INSERT INTO os_core_module_vars VALUES (125,'Xanthia','TopCenter','0');
INSERT INTO os_core_module_vars VALUES (126,'Xanthia','BotCenter','0');
INSERT INTO os_core_module_vars VALUES (127,'Xanthia','InnerBlock','0');
INSERT INTO os_core_module_vars VALUES (128,'Xanthia','shorturls','0');
INSERT INTO os_core_module_vars VALUES (129,'Xanthia','shorturlsextension','html');
INSERT INTO os_core_module_vars VALUES (130,'Xanthia','shorturlsok','1');
INSERT INTO os_core_module_vars VALUES (131,'Admin_Messages','itemsperpage','25');
INSERT INTO os_core_module_vars VALUES (132,'Mailer','mailertype','1');
INSERT INTO os_core_module_vars VALUES (133,'Mailer','charset','iso-8859-1');
INSERT INTO os_core_module_vars VALUES (134,'Mailer','encoding','8bit');
INSERT INTO os_core_module_vars VALUES (135,'Mailer','contenttype','text/plain');
INSERT INTO os_core_module_vars VALUES (136,'Mailer','wordwrap','50');
INSERT INTO os_core_module_vars VALUES (137,'Mailer','msmailheaders','');
INSERT INTO os_core_module_vars VALUES (138,'Mailer','sendmailpath','/usr/sbin/sendmail');
INSERT INTO os_core_module_vars VALUES (139,'Mailer','smtpauth','1');
INSERT INTO os_core_module_vars VALUES (140,'Mailer','smtpserver','localhost');
INSERT INTO os_core_module_vars VALUES (141,'Mailer','smtpport','25');
INSERT INTO os_core_module_vars VALUES (142,'Mailer','smtptimeout','10');
INSERT INTO os_core_module_vars VALUES (143,'Mailer','smtpusername','');
INSERT INTO os_core_module_vars VALUES (144,'Mailer','smtppassword','');
INSERT INTO os_core_module_vars VALUES (145,'legal','termsofuse','1');
INSERT INTO os_core_module_vars VALUES (146,'legal','privacypolicy','1');
INSERT INTO os_core_module_vars VALUES (147,'legal','accessibilitystatement','1');
INSERT INTO os_core_module_vars VALUES (153,'cmodsdownload','screenshotlink','modules/CmodsDownload/screenshots/');
INSERT INTO os_core_module_vars VALUES (154,'cmodsdownload','thumbmaillink','modules/CmodsDownload/screenshots/small/');
INSERT INTO os_core_module_vars VALUES (155,'cmodsdownload','upload_folder','modules/CmodsDownload/upload');
INSERT INTO os_core_module_vars VALUES (156,'cmodsdownload','anonadddownloadlock','0');
INSERT INTO os_core_module_vars VALUES (157,'cmodsdownload','perpage','10');
INSERT INTO os_core_module_vars VALUES (158,'cmodsdownload','allowupload','1');
INSERT INTO os_core_module_vars VALUES (159,'cmodsdownload','anonwaitdays','1');
INSERT INTO os_core_module_vars VALUES (160,'cmodsdownload','outsidewaitdays','1');
INSERT INTO os_core_module_vars VALUES (161,'cmodsdownload','useoutsidevoting','0');
INSERT INTO os_core_module_vars VALUES (162,'cmodsdownload','anonweight','10');
INSERT INTO os_core_module_vars VALUES (163,'cmodsdownload','outsideweight','20');
INSERT INTO os_core_module_vars VALUES (164,'cmodsdownload','detailvotedecimal','2');
INSERT INTO os_core_module_vars VALUES (165,'cmodsdownload','mainvotedecimal','1');
INSERT INTO os_core_module_vars VALUES (166,'cmodsdownload','topdownloadspercentrigger','0');
INSERT INTO os_core_module_vars VALUES (167,'cmodsdownload','topdownloads','25');
INSERT INTO os_core_module_vars VALUES (168,'cmodsdownload','mostpopdownloadspercentrigger','0');
INSERT INTO os_core_module_vars VALUES (169,'cmodsdownload','mostpopdownloads','25');
INSERT INTO os_core_module_vars VALUES (170,'cmodsdownload','featurebox','0');
INSERT INTO os_core_module_vars VALUES (171,'cmodsdownload','downloadvotemin','5');
INSERT INTO os_core_module_vars VALUES (172,'cmodsdownload','blockunregmodify','0');
INSERT INTO os_core_module_vars VALUES (173,'cmodsdownload','popular','500');
INSERT INTO os_core_module_vars VALUES (174,'cmodsdownload','newdownloads','10');
INSERT INTO os_core_module_vars VALUES (175,'cmodsdownload','downloadsresults','10');
INSERT INTO os_core_module_vars VALUES (176,'cmodsdownload','maxdltitle','40');
INSERT INTO os_core_module_vars VALUES (177,'cmodsdownload','ratexdlsamount','10');
INSERT INTO os_core_module_vars VALUES (178,'cmodsdownload','topxdlsamount','10');
INSERT INTO os_core_module_vars VALUES (179,'cmodsdownload','lastxdlsamount','10');
INSERT INTO os_core_module_vars VALUES (180,'cmodsdownload','ratexdlsactive','1');
INSERT INTO os_core_module_vars VALUES (181,'cmodsdownload','topxdlsactive','1');
INSERT INTO os_core_module_vars VALUES (182,'cmodsdownload','lastxdlsactive','1');
INSERT INTO os_core_module_vars VALUES (183,'cmodsdownload','securedownload','1');
INSERT INTO os_core_module_vars VALUES (184,'cmodsdownload','sizelimit','yes');
INSERT INTO os_core_module_vars VALUES (185,'cmodsdownload','limitsize','2097152');
INSERT INTO os_core_module_vars VALUES (186,'cmodsdownload','folderperms','0777');
INSERT INTO os_core_module_vars VALUES (187,'cmodsdownload','fileperms','0644');
INSERT INTO os_core_module_vars VALUES (188,'cmodsdownload','cmodsborder1','333333');
INSERT INTO os_core_module_vars VALUES (189,'cmodsdownload','cmodsborder2','999999');
INSERT INTO os_core_module_vars VALUES (190,'cmodsdownload','cmodsbgcolor1','F3F3F3');
INSERT INTO os_core_module_vars VALUES (191,'cmodsdownload','cmodsbgcolor2','CDCDCD');
INSERT INTO os_core_module_vars VALUES (192,'cmodsdownload','cdversion','1.9.5');
INSERT INTO os_core_module_vars VALUES (193,'cmodsdownload','showscreenshot','1');
INSERT INTO os_core_module_vars VALUES (194,'cmodsdownload','screenshotwidth','100');
INSERT INTO os_core_module_vars VALUES (195,'cmodsdownload','screenshotheight','70');
INSERT INTO os_core_module_vars VALUES (196,'cmodsdownload','popupwidth','640');
INSERT INTO os_core_module_vars VALUES (197,'cmodsdownload','popupheight','480');
INSERT INTO os_core_module_vars VALUES (198,'cmodsdownload','screenshotmaxsize','300000');
INSERT INTO os_core_module_vars VALUES (199,'cmodsdownload','thumbmailmaxsize','50000');
INSERT INTO os_core_module_vars VALUES (200,'cmodsdownload','iconshow','yes');
INSERT INTO os_core_module_vars VALUES (201,'cmodsweblinks','screenshotlink','modules/CmodsWebLinks/screenshots/');
INSERT INTO os_core_module_vars VALUES (202,'cmodsweblinks','thumbmaillink','modules/CmodsWebLinks/screenshots/small/');
INSERT INTO os_core_module_vars VALUES (203,'cmodsweblinks','anonaddlinklock','0');
INSERT INTO os_core_module_vars VALUES (204,'cmodsweblinks','perpage','10');
INSERT INTO os_core_module_vars VALUES (205,'cmodsweblinks','anonwaitdays','1');
INSERT INTO os_core_module_vars VALUES (206,'cmodsweblinks','outsidewaitdays','1');
INSERT INTO os_core_module_vars VALUES (207,'cmodsweblinks','useoutsidevoting','0');
INSERT INTO os_core_module_vars VALUES (208,'cmodsweblinks','anonweight','10');
INSERT INTO os_core_module_vars VALUES (209,'cmodsweblinks','outsideweight','20');
INSERT INTO os_core_module_vars VALUES (210,'cmodsweblinks','detailvotedecimal','2');
INSERT INTO os_core_module_vars VALUES (211,'cmodsweblinks','mainvotedecimal','1');
INSERT INTO os_core_module_vars VALUES (212,'cmodsweblinks','toplinkspercentrigger','0');
INSERT INTO os_core_module_vars VALUES (213,'cmodsweblinks','toplinks','25');
INSERT INTO os_core_module_vars VALUES (214,'cmodsweblinks','mostpoplinkspercentrigger','0');
INSERT INTO os_core_module_vars VALUES (215,'cmodsweblinks','mostpoplinks','25');
INSERT INTO os_core_module_vars VALUES (216,'cmodsweblinks','featurebox','0');
INSERT INTO os_core_module_vars VALUES (217,'cmodsweblinks','linkvotemin','5');
INSERT INTO os_core_module_vars VALUES (218,'cmodsweblinks','blockunregmodify','0');
INSERT INTO os_core_module_vars VALUES (219,'cmodsweblinks','popular','500');
INSERT INTO os_core_module_vars VALUES (220,'cmodsweblinks','newlinks','10');
INSERT INTO os_core_module_vars VALUES (221,'cmodsweblinks','linksresults','10');
INSERT INTO os_core_module_vars VALUES (222,'cmodsweblinks','sitename','10');
INSERT INTO os_core_module_vars VALUES (223,'cmodsweblinks','adminmail','10');
INSERT INTO os_core_module_vars VALUES (224,'cmodsweblinks','locale','10');
INSERT INTO os_core_module_vars VALUES (225,'cmodsweblinks','lastxlinksactive','1');
INSERT INTO os_core_module_vars VALUES (226,'cmodsweblinks','lastxlinksamount','10');
INSERT INTO os_core_module_vars VALUES (227,'cmodsweblinks','ratexlinksactive','1');
INSERT INTO os_core_module_vars VALUES (228,'cmodsweblinks','ratexlinksamount','10');
INSERT INTO os_core_module_vars VALUES (229,'cmodsweblinks','topxlinksactive','1');
INSERT INTO os_core_module_vars VALUES (230,'cmodsweblinks','topxlinksamount','10');
INSERT INTO os_core_module_vars VALUES (231,'cmodsweblinks','maxlinkstitle','40');
INSERT INTO os_core_module_vars VALUES (232,'cmodsweblinks','cmodsborder1','999999');
INSERT INTO os_core_module_vars VALUES (233,'cmodsweblinks','cmodsborder2','333333');
INSERT INTO os_core_module_vars VALUES (234,'cmodsweblinks','cmodsbgcolor1','F3F3F3');
INSERT INTO os_core_module_vars VALUES (235,'cmodsweblinks','cmodsbgcolor2','CDCDCD');
INSERT INTO os_core_module_vars VALUES (236,'cmodsweblinks','cwversion','1.9');
INSERT INTO os_core_module_vars VALUES (237,'cmodsweblinks','attrib','_self');
INSERT INTO os_core_module_vars VALUES (238,'cmodsweblinks','showscreenshot','1');
INSERT INTO os_core_module_vars VALUES (239,'cmodsweblinks','screenshotwidth','100');
INSERT INTO os_core_module_vars VALUES (240,'cmodsweblinks','screenshotheight','70');
INSERT INTO os_core_module_vars VALUES (241,'cmodsweblinks','popupwidth','640');
INSERT INTO os_core_module_vars VALUES (242,'cmodsweblinks','popupheight','480');
INSERT INTO os_core_module_vars VALUES (243,'cmodsweblinks','screenshotmaxsize','300000');
INSERT INTO os_core_module_vars VALUES (244,'cmodsweblinks','thumbmailmaxsize','50000');
INSERT INTO os_core_module_vars VALUES (245,'dq_helpdesk','Website','http://www.dimensionquest.net');
INSERT INTO os_core_module_vars VALUES (246,'dq_helpdesk','Default rows per page','20');
INSERT INTO os_core_module_vars VALUES (247,'dq_helpdesk','Page Count Limit','10');
INSERT INTO os_core_module_vars VALUES (248,'dq_helpdesk','Anonymous can Submit','0');
INSERT INTO os_core_module_vars VALUES (249,'dq_helpdesk','User can Submit','1');
INSERT INTO os_core_module_vars VALUES (250,'dq_helpdesk','User can check status','1');
INSERT INTO os_core_module_vars VALUES (251,'dq_helpdesk','Techs see all tickets','1');
INSERT INTO os_core_module_vars VALUES (252,'dq_helpdesk','EnforceAuthKey','0');
INSERT INTO os_core_module_vars VALUES (253,'dq_helpdesk','Enable Images','1');
INSERT INTO os_core_module_vars VALUES (254,'dq_helpdesk','AllowCloseOnSubmit','1');
INSERT INTO os_core_module_vars VALUES (255,'dq_helpdesk','ShowOpenedByInSummary','1');
INSERT INTO os_core_module_vars VALUES (256,'dq_helpdesk','ShowAssignedToInSummary','1');
INSERT INTO os_core_module_vars VALUES (257,'dq_helpdesk','ShowClosedByInSummary','1');
INSERT INTO os_core_module_vars VALUES (258,'dq_helpdesk','OpenedByDefaultToLoggedIn','1');
INSERT INTO os_core_module_vars VALUES (259,'dq_helpdesk','AssignedToDefaultToLoggedIn','1');
INSERT INTO os_core_module_vars VALUES (260,'dq_helpdesk','ShowDateEnteredInSummary','1');
INSERT INTO os_core_module_vars VALUES (261,'dq_helpdesk','ShowLastModifiedInSummary','1');
INSERT INTO os_core_module_vars VALUES (262,'dq_helpdesk','ShowPriorityInSummary','1');
INSERT INTO os_core_module_vars VALUES (263,'dq_helpdesk','ShowStatusInSummary','1');
INSERT INTO os_core_module_vars VALUES (264,'dq_helpdesk','AllowSoftwareChoice','1');
INSERT INTO os_core_module_vars VALUES (265,'dq_helpdesk','AllowVersionChoice','1');
INSERT INTO os_core_module_vars VALUES (266,'dq_helpdesk','EnableMyStatsHyperLink','1');
INSERT INTO os_core_module_vars VALUES (267,'dq_helpdesk','AssignedToDefaultToUser','-1');
INSERT INTO os_core_module_vars VALUES (268,'dq_helpdesk','EmailAdminNewTickets','-1');
INSERT INTO os_core_module_vars VALUES (269,'dq_helpdesk','EnableTotalTicketCountUser','0');
INSERT INTO os_core_module_vars VALUES (270,'dq_helpdesk','EnableTotalTicketCountStaff','1');
INSERT INTO os_core_module_vars VALUES (271,'dq_helpdesk','EmailTechNewTickets','-1');
INSERT INTO os_core_module_vars VALUES (272,'dq_helpdesk','EmailGroupNewTickets','-1');
INSERT INTO os_core_module_vars VALUES (273,'dq_helpdesk','EmailUserNewTicket','0');
INSERT INTO os_core_module_vars VALUES (274,'dq_helpdesk','User can Delete Ticket','0');
INSERT INTO os_core_module_vars VALUES (275,'dq_helpdesk','ShowSoftwareInSummary','1');
INSERT INTO os_core_module_vars VALUES (276,'dq_helpdesk','TicketUpdatedMsgSubj','HelpDesk Ticket Updated');
INSERT INTO os_core_module_vars VALUES (277,'dq_helpdesk','TicketNewMsgSubj','HelpDesk Ticket Opened');
INSERT INTO os_core_module_vars VALUES (278,'dq_helpdesk','TicketReassignedMsgSubj','HelpDesk Ticket Reassigned');
INSERT INTO os_core_module_vars VALUES (279,'dq_helpdesk','TicketClosedMsgSubj','HelpDesk Ticket Closed');
INSERT INTO os_core_module_vars VALUES (280,'dq_helpdesk','TicketClosedMsgBody','This ticket has been closed.');
INSERT INTO os_core_module_vars VALUES (281,'dq_helpdesk','TicketUpdatedMsgBody','This ticket has been updated.');
INSERT INTO os_core_module_vars VALUES (282,'dq_helpdesk','SendMailOnUpdate','1');
INSERT INTO os_core_module_vars VALUES (283,'dq_helpdesk','SendMailOnNewAssignee','1');
INSERT INTO os_core_module_vars VALUES (284,'dq_helpdesk','User can Modify own Ticket','0');
INSERT INTO os_core_module_vars VALUES (285,'dq_helpdesk','User can Add History to own Ticket','1');
INSERT INTO os_core_module_vars VALUES (286,'dq_helpdesk','Tech can Modify Ticket','0');
INSERT INTO os_core_module_vars VALUES (287,'dq_helpdesk','Tech can Delete Ticket','0');
INSERT INTO os_core_module_vars VALUES (288,'dq_helpdesk','Tech can Modify History','0');
INSERT INTO os_core_module_vars VALUES (289,'dq_helpdesk','ShowTypeInSummary','1');
INSERT INTO os_core_module_vars VALUES (290,'dq_helpdesk','DefaultTicketPriority','');
INSERT INTO os_core_module_vars VALUES (291,'dq_helpdesk','AllowUserSelectPriority','1');
INSERT INTO os_core_module_vars VALUES (292,'dq_helpdesk','DefaultTicketType','');
INSERT INTO os_core_module_vars VALUES (293,'dq_helpdesk','AllowUserSelectType','1');
INSERT INTO os_core_module_vars VALUES (294,'dq_helpdesk','AllowViewFirstaction','0');
INSERT INTO os_core_module_vars VALUES (295,'dq_helpdesk','EnableExtUserList','0');
INSERT INTO os_core_module_vars VALUES (296,'dq_helpdesk','EmailToExtUsers','0');
INSERT INTO os_core_module_vars VALUES (297,'dq_helpdesk','EmailToExtUsersOptional','0');
INSERT INTO os_core_module_vars VALUES (298,'dq_helpdesk','EmailToExtUsersOptionalDefault','0');
INSERT INTO os_core_module_vars VALUES (299,'dq_helpdesk','debug message','');
INSERT INTO os_core_module_vars VALUES (300,'Ephemerids','itemsperpage','10');
INSERT INTO os_core_module_vars VALUES (301,'eventia','bold','1');
INSERT INTO os_core_module_vars VALUES (302,'eventia','itemsperpage','5');
INSERT INTO os_core_module_vars VALUES (303,'eventia','regitemsperpage','5');
INSERT INTO os_core_module_vars VALUES (304,'eventia','regitemstodb','1');
INSERT INTO os_core_module_vars VALUES (305,'eventia','copy','1');
INSERT INTO os_core_module_vars VALUES (306,'eventia','showactivecourse','0');
INSERT INTO os_core_module_vars VALUES (307,'eventia','showfullcourse','1');
INSERT INTO os_core_module_vars VALUES (308,'eventia','showactivereg','0');
INSERT INTO os_core_module_vars VALUES (309,'eventia','showreadyreg','0');
INSERT INTO os_core_module_vars VALUES (310,'eventia','sortby','1');
INSERT INTO os_core_module_vars VALUES (311,'eventia','inclusive','0');
INSERT INTO os_core_module_vars VALUES (312,'eventia','currency','EUR');
INSERT INTO os_core_module_vars VALUES (313,'eventia','duration','45');
INSERT INTO os_core_module_vars VALUES (314,'eventia','mailertype','1');
INSERT INTO os_core_module_vars VALUES (315,'eventia','charset','iso-8859-1');
INSERT INTO os_core_module_vars VALUES (316,'eventia','encoding','8bit');
INSERT INTO os_core_module_vars VALUES (317,'eventia','contenttype','text/plain');
INSERT INTO os_core_module_vars VALUES (318,'eventia','wordwrap','50');
INSERT INTO os_core_module_vars VALUES (319,'eventia','msmailheaders','');
INSERT INTO os_core_module_vars VALUES (320,'eventia','sendmailpath','/usr/sbin/sendmail');
INSERT INTO os_core_module_vars VALUES (321,'eventia','smtpauth','1');
INSERT INTO os_core_module_vars VALUES (322,'eventia','smtpserver','localhost');
INSERT INTO os_core_module_vars VALUES (323,'eventia','smtpport','25');
INSERT INTO os_core_module_vars VALUES (324,'eventia','smtptimeout','10');
INSERT INTO os_core_module_vars VALUES (325,'eventia','smtpusername','');
INSERT INTO os_core_module_vars VALUES (326,'eventia','smtppassword','');
INSERT INTO os_core_module_vars VALUES (327,'eventia','nolessons','0');
INSERT INTO os_core_module_vars VALUES (329,'EZComments','MailToAdmin','0');
INSERT INTO os_core_module_vars VALUES (330,'formicula','show_phone','1');
INSERT INTO os_core_module_vars VALUES (331,'formicula','show_company','1');
INSERT INTO os_core_module_vars VALUES (332,'formicula','show_url','1');
INSERT INTO os_core_module_vars VALUES (333,'formicula','show_location','1');
INSERT INTO os_core_module_vars VALUES (334,'formicula','show_comment','1');
INSERT INTO os_core_module_vars VALUES (335,'formicula','send_user','1');
INSERT INTO os_core_module_vars VALUES (336,'formicula','Contacts','a:0:{}');
INSERT INTO os_core_module_vars VALUES (337,'formicula','upload_dir','pnTemp');
INSERT INTO os_core_module_vars VALUES (338,'formicula','delete_file','1');
INSERT INTO os_core_module_vars VALUES (339,'formicula','version','0.3');
INSERT INTO os_core_module_vars VALUES (340,'Members_List','memberslistitemsperpage','20');
INSERT INTO os_core_module_vars VALUES (341,'Members_List','onlinemembersitemsperpage','20');
INSERT INTO os_core_module_vars VALUES (342,'MultiHook','itemsperpage','20');
INSERT INTO os_core_module_vars VALUES (343,'MultiHook','abacfirst','1');
INSERT INTO os_core_module_vars VALUES (344,'MultiHook','invisiblelinks','1');
INSERT INTO os_core_module_vars VALUES (345,'MultiHook','mhincodetags','0');
INSERT INTO os_core_module_vars VALUES (346,'Netquery','modulestylesheet','netquery.css');
INSERT INTO os_core_module_vars VALUES (347,'Netquery','querytype_default','whois');
INSERT INTO os_core_module_vars VALUES (348,'Netquery','exec_timer_enabled','1');
INSERT INTO os_core_module_vars VALUES (349,'Netquery','capture_log_enabled','0');
INSERT INTO os_core_module_vars VALUES (350,'Netquery','capture_log_allowuser','0');
INSERT INTO os_core_module_vars VALUES (351,'Netquery','capture_log_filepath','modules/Netquery/logs/nq_log.txt');
INSERT INTO os_core_module_vars VALUES (352,'Netquery','capture_log_dtformat','Y-m-d H:i:s');
INSERT INTO os_core_module_vars VALUES (353,'Netquery','clientinfo_enabled','1');
INSERT INTO os_core_module_vars VALUES (354,'Netquery','topcountries_limit','10');
INSERT INTO os_core_module_vars VALUES (355,'Netquery','whois_enabled','1');
INSERT INTO os_core_module_vars VALUES (356,'Netquery','whois_max_limit','3');
INSERT INTO os_core_module_vars VALUES (357,'Netquery','whois_default','.com');
INSERT INTO os_core_module_vars VALUES (358,'Netquery','whoisip_enabled','1');
INSERT INTO os_core_module_vars VALUES (359,'Netquery','dns_lookup_enabled','1');
INSERT INTO os_core_module_vars VALUES (360,'Netquery','dns_dig_enabled','1');
INSERT INTO os_core_module_vars VALUES (361,'Netquery','digexec_local','');
INSERT INTO os_core_module_vars VALUES (362,'Netquery','email_check_enabled','1');
INSERT INTO os_core_module_vars VALUES (363,'Netquery','query_email_server','0');
INSERT INTO os_core_module_vars VALUES (364,'Netquery','port_check_enabled','1');
INSERT INTO os_core_module_vars VALUES (365,'Netquery','user_submissions','1');
INSERT INTO os_core_module_vars VALUES (366,'Netquery','http_req_enabled','1');
INSERT INTO os_core_module_vars VALUES (367,'Netquery','ping_enabled','1');
INSERT INTO os_core_module_vars VALUES (368,'Netquery','pingexec_local','ping.exe');
INSERT INTO os_core_module_vars VALUES (369,'Netquery','ping_remote_enabled','1');
INSERT INTO os_core_module_vars VALUES (370,'Netquery','pingexec_remote','http://noc.thunderworx.net/cgi-bin/public/ping.pl');
INSERT INTO os_core_module_vars VALUES (371,'Netquery','pingexec_remote_t','target');
INSERT INTO os_core_module_vars VALUES (372,'Netquery','trace_enabled','1');
INSERT INTO os_core_module_vars VALUES (373,'Netquery','traceexec_local','traceroute');
INSERT INTO os_core_module_vars VALUES (374,'Netquery','trace_remote_enabled','1');
INSERT INTO os_core_module_vars VALUES (375,'Netquery','traceexec_remote','http://noc.thunderworx.net/cgi-bin/public/traceroute.pl');
INSERT INTO os_core_module_vars VALUES (376,'Netquery','traceexec_remote_t','target');
INSERT INTO os_core_module_vars VALUES (377,'Netquery','looking_glass_enabled','1');
INSERT INTO os_core_module_vars VALUES (378,'photoshare','tmpdirname','images/temp/');
INSERT INTO os_core_module_vars VALUES (379,'photoshare','imagedirname','images/photoshare');
INSERT INTO os_core_module_vars VALUES (380,'photoshare','useImageDirectory','1');
INSERT INTO os_core_module_vars VALUES (381,'photoshare','thumbnailsize','80');
INSERT INTO os_core_module_vars VALUES (382,'photoshare','maxdisplaywidth','0');
INSERT INTO os_core_module_vars VALUES (383,'photoshare','maxdisplayheight','0');
INSERT INTO os_core_module_vars VALUES (384,'photoshare','imageSizeLimitSingle','250000');
INSERT INTO os_core_module_vars VALUES (385,'photoshare','imageSizeLimitTotal','5000000');
INSERT INTO os_core_module_vars VALUES (386,'photoshare','allowframeremove','');
INSERT INTO os_core_module_vars VALUES (387,'photoshare','defaultTopic','-1');
INSERT INTO os_core_module_vars VALUES (388,'photoshare','defaultTemplate','gallery');
INSERT INTO os_core_module_vars VALUES (389,'photoshare','mainlist','flat');
INSERT INTO os_core_module_vars VALUES (390,'photoshare','extra1Title','');
INSERT INTO os_core_module_vars VALUES (391,'photoshare','extra2Title','');
INSERT INTO os_core_module_vars VALUES (392,'photoshare','extra3Title','');
INSERT INTO os_core_module_vars VALUES (393,'photoshare','extra4Title','');
INSERT INTO os_core_module_vars VALUES (394,'photoshare','extra5Title','');
INSERT INTO os_core_module_vars VALUES (395,'photoshare','extra6Title','');
INSERT INTO os_core_module_vars VALUES (396,'pnForum','posts_per_page','15');
INSERT INTO os_core_module_vars VALUES (397,'pnForum','topics_per_page','15');
INSERT INTO os_core_module_vars VALUES (398,'pnForum','min_postings_for_anchor','2');
INSERT INTO os_core_module_vars VALUES (399,'pnForum','hot_threshold','20');
INSERT INTO os_core_module_vars VALUES (400,'pnForum','email_from','openstar@example.com');
INSERT INTO os_core_module_vars VALUES (401,'pnForum','default_lang','iso-8859-1');
INSERT INTO os_core_module_vars VALUES (403,'pnForum','url_ranks_images','modules/pnForum/pnimages/ranks');
INSERT INTO os_core_module_vars VALUES (408,'pnForum','posticon','modules/pnForum/pnimages/posticon.gif');
INSERT INTO os_core_module_vars VALUES (409,'pnForum','firstnew_image','modules/pnForum/pnimages/firstnew.gif');
INSERT INTO os_core_module_vars VALUES (410,'pnForum','post_sort_order','ASC');
INSERT INTO os_core_module_vars VALUES (411,'pnForum','log_ip','yes');
INSERT INTO os_core_module_vars VALUES (412,'pnForum','slimforum','no');
INSERT INTO os_core_module_vars VALUES (420,'pn_bbclick','externallink','externallink');
INSERT INTO os_core_module_vars VALUES (421,'pn_bbclick','maillink','maillink');
INSERT INTO os_core_module_vars VALUES (422,'pn_bbclick','maxsize','30');
INSERT INTO os_core_module_vars VALUES (423,'pn_bbclick','countclicks','1');
INSERT INTO os_core_module_vars VALUES (424,'pn_bbcode','quote','<fieldset style=\"background-color: #cccccc; text-align: left; border: 1px solid black;\"><legend style=\"font-weight: bold;\">%u</legend>%t</fieldset>');
INSERT INTO os_core_module_vars VALUES (425,'pn_bbcode','code','<fieldset style=\"background-color: #cccccc; text-align: left; border: 1px solid black;\"><legend style=\"font-weight: bold;\">%h</legend><pre>%c</pre></fieldset>');
INSERT INTO os_core_module_vars VALUES (426,'pn_bbcode','size_tiny','0.75em');
INSERT INTO os_core_module_vars VALUES (427,'pn_bbcode','size_small','0.85em');
INSERT INTO os_core_module_vars VALUES (428,'pn_bbcode','size_normal','1.0em');
INSERT INTO os_core_module_vars VALUES (429,'pn_bbcode','size_large','1.5em');
INSERT INTO os_core_module_vars VALUES (430,'pn_bbcode','size_huge','2.0em');
INSERT INTO os_core_module_vars VALUES (431,'pn_bbcode','allow_usersize','no');
INSERT INTO os_core_module_vars VALUES (432,'pn_bbcode','allow_usercolor','no');
INSERT INTO os_core_module_vars VALUES (433,'pn_bbcode','color_enabled','yes');
INSERT INTO os_core_module_vars VALUES (434,'pn_bbcode','size_enabled','yes');
INSERT INTO os_core_module_vars VALUES (435,'pn_bbcode','linenumbers','yes');
INSERT INTO os_core_module_vars VALUES (436,'pn_bbcode','syntaxhilite','yes');
INSERT INTO os_core_module_vars VALUES (437,'pn_bbsmile','smiliepath','modules/pn_bbsmile/pnimages/smilies');
INSERT INTO os_core_module_vars VALUES (438,'pn_bbsmile','activate_auto','0');
INSERT INTO os_core_module_vars VALUES (439,'pn_bbsmile','remove_inactive','1');
INSERT INTO os_core_module_vars VALUES (440,'pn_bbsmile','smiliepath_auto','modules/pn_bbsmile/pnimages/smilies_auto');
INSERT INTO os_core_module_vars VALUES (441,'pn_bbsmile','smilie_array','a:13:{s:16:\"icon_biggrin.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:16:\"icon_biggrin.gif\";s:3:\"alt\";s:12:\"icon_biggrin\";s:5:\"short\";s:3:\":-D\";s:5:\"alias\";s:0:\"\";s:6:\"active\";s:1:\"1\";}s:17:\"icon_confused.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:17:\"icon_confused.gif\";s:3:\"alt\";s:13:\"icon_confused\";s:5:\"short\";s:3:\":-?\";s:5:\"alias\";s:0:\"\";s:6:\"active\";s:1:\"1\";}s:13:\"icon_cool.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:13:\"icon_cool.gif\";s:3:\"alt\";s:9:\"icon_cool\";s:5:\"short\";s:3:\"8-)\";s:5:\"alias\";s:0:\"\";s:6:\"active\";s:1:\"1\";}s:12:\"icon_eek.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:12:\"icon_eek.gif\";s:3:\"alt\";s:8:\"icon_eek\";s:5:\"short\";s:3:\":-O\";s:5:\"alias\";s:0:\"\";s:6:\"active\";s:1:\"1\";}s:13:\"icon_evil.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:13:\"icon_evil.gif\";s:3:\"alt\";s:9:\"icon_evil\";s:5:\"short\";s:6:\":evil:\";s:5:\"alias\";s:7:\":devil:\";s:6:\"active\";s:1:\"1\";}s:14:\"icon_frown.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:14:\"icon_frown.gif\";s:3:\"alt\";s:10:\"icon_frown\";s:5:\"short\";s:3:\":-(\";s:5:\"alias\";s:0:\"\";s:6:\"active\";s:1:\"1\";}s:12:\"icon_lol.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:12:\"icon_lol.gif\";s:3:\"alt\";s:8:\"icon_lol\";s:5:\"short\";s:5:\":lol:\";s:5:\"alias\";s:0:\"\";s:6:\"active\";s:1:\"1\";}s:12:\"icon_mad.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:12:\"icon_mad.gif\";s:3:\"alt\";s:8:\"icon_mad\";s:5:\"short\";s:3:\":-x\";s:5:\"alias\";s:0:\"\";s:6:\"active\";s:1:\"1\";}s:13:\"icon_razz.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:13:\"icon_razz.gif\";s:3:\"alt\";s:9:\"icon_razz\";s:5:\"short\";s:3:\":-P\";s:5:\"alias\";s:0:\"\";s:6:\"active\";s:1:\"1\";}s:16:\"icon_redface.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:16:\"icon_redface.gif\";s:3:\"alt\";s:12:\"icon_redface\";s:5:\"short\";s:6:\":oops:\";s:5:\"alias\";s:0:\"\";s:6:\"active\";s:1:\"1\";}s:17:\"icon_rolleyes.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:17:\"icon_rolleyes.gif\";s:3:\"alt\";s:13:\"icon_rolleyes\";s:5:\"short\";s:6:\":roll:\";s:5:\"alias\";s:0:\"\";s:6:\"active\";s:1:\"1\";}s:14:\"icon_smile.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:14:\"icon_smile.gif\";s:3:\"alt\";s:10:\"icon_smile\";s:5:\"short\";s:3:\":-)\";s:5:\"alias\";s:0:\"\";s:6:\"active\";s:1:\"1\";}s:13:\"icon_wink.gif\";a:6:{s:4:\"type\";i:0;s:6:\"imgsrc\";s:13:\"icon_wink.gif\";s:3:\"alt\";s:9:\"icon_wink\";s:5:\"short\";s:3:\";-)\";s:5:\"alias\";s:0:\"\";s:6:\"active\";s:1:\"1\";}}');
INSERT INTO os_core_module_vars VALUES (442,'PostCalendar','pcTime24Hours','0');
INSERT INTO os_core_module_vars VALUES (443,'PostCalendar','pcEventsOpenInNewWindow','0');
INSERT INTO os_core_module_vars VALUES (444,'PostCalendar','pcUseInternationalDates','0');
INSERT INTO os_core_module_vars VALUES (445,'PostCalendar','pcFirstDayOfWeek','0');
INSERT INTO os_core_module_vars VALUES (446,'PostCalendar','pcDayHighlightColor','#FF0000');
INSERT INTO os_core_module_vars VALUES (447,'PostCalendar','pcUsePopups','1');
INSERT INTO os_core_module_vars VALUES (448,'PostCalendar','pcDisplayTopics','0');
INSERT INTO os_core_module_vars VALUES (449,'PostCalendar','pcAllowDirectSubmit','0');
INSERT INTO os_core_module_vars VALUES (450,'PostCalendar','pcListHowManyEvents','15');
INSERT INTO os_core_module_vars VALUES (451,'PostCalendar','pcTimeIncrement','15');
INSERT INTO os_core_module_vars VALUES (452,'PostCalendar','pcAllowSiteWide','0');
INSERT INTO os_core_module_vars VALUES (453,'PostCalendar','pcAllowUserCalendar','1');
INSERT INTO os_core_module_vars VALUES (454,'PostCalendar','pcEventDateFormat','%Y-%m-%d');
INSERT INTO os_core_module_vars VALUES (455,'PostCalendar','pcTemplate','default');
INSERT INTO os_core_module_vars VALUES (456,'PostCalendar','pcRepeating','0');
INSERT INTO os_core_module_vars VALUES (457,'PostCalendar','pcMeeting','0');
INSERT INTO os_core_module_vars VALUES (458,'PostCalendar','pcAddressbook','1');
INSERT INTO os_core_module_vars VALUES (459,'PostCalendar','pcUseCache','1');
INSERT INTO os_core_module_vars VALUES (460,'PostCalendar','pcCacheLifetime','3600');
INSERT INTO os_core_module_vars VALUES (461,'PostCalendar','pcDefaultView','month');
INSERT INTO os_core_module_vars VALUES (462,'PostCalendar','pcNotifyAdmin','0');
INSERT INTO os_core_module_vars VALUES (463,'PostCalendar','pcNotifyEmail','openstar@example.com');
INSERT INTO os_core_module_vars VALUES (464,'postguestbook','entries_per_page','10');
INSERT INTO os_core_module_vars VALUES (465,'postguestbook','style','internal');
INSERT INTO os_core_module_vars VALUES (466,'postguestbook','enable_html','0');
INSERT INTO os_core_module_vars VALUES (467,'postguestbook','enable_bbcode','0');
INSERT INTO os_core_module_vars VALUES (468,'postguestbook','notify','0');
INSERT INTO os_core_module_vars VALUES (469,'postguestbook','notify_email','me@yoursite.com');
INSERT INTO os_core_module_vars VALUES (470,'postguestbook','notify_subject','NEWS for my site');
INSERT INTO os_core_module_vars VALUES (471,'postguestbook','notify_message','Hey! You got a new submission for your site.');
INSERT INTO os_core_module_vars VALUES (472,'postguestbook','notify_from','webmaster');
INSERT INTO os_core_module_vars VALUES (473,'postguestbook','use_smarty_version','new');
INSERT INTO os_core_module_vars VALUES (474,'postguestbook','sign_check_by_cms','0');
INSERT INTO os_core_module_vars VALUES (475,'PostWrap','allow_local_only','0');
INSERT INTO os_core_module_vars VALUES (476,'PostWrap','no_user_entry','0');
INSERT INTO os_core_module_vars VALUES (477,'PostWrap','open_direct','0');
INSERT INTO os_core_module_vars VALUES (478,'PostWrap','use_fixed_title','0');
INSERT INTO os_core_module_vars VALUES (479,'PostWrap','auto_resize','1');
INSERT INTO os_core_module_vars VALUES (480,'PostWrap','vsize','600');
INSERT INTO os_core_module_vars VALUES (481,'PostWrap','hsize','100%');
INSERT INTO os_core_module_vars VALUES (482,'PostWrap','security','1');
INSERT INTO os_core_module_vars VALUES (483,'Quotes','itemsperpage','25');
INSERT INTO os_core_module_vars VALUES (484,'Ratings','defaultstyle','outoffivestars');
INSERT INTO os_core_module_vars VALUES (485,'Ratings','seclevel','medium');
INSERT INTO os_core_module_vars VALUES (486,'RSS','bold','0');
INSERT INTO os_core_module_vars VALUES (487,'RSS','openinnewwindow','0');
INSERT INTO os_core_module_vars VALUES (488,'RSS','itemsperpage','10');
INSERT INTO os_core_module_vars VALUES (489,'RSS','cachedirectory','rss');
INSERT INTO os_core_module_vars VALUES (490,'RSS','cacheinterval','180');
INSERT INTO os_core_module_vars VALUES (491,'SnakePending','itemsperpage','10');
INSERT INTO os_core_module_vars VALUES (492,'statistics','collect','0');
INSERT INTO os_core_module_vars VALUES (493,'statistics','filter','details');
INSERT INTO os_core_module_vars VALUES (494,'statistics','filter_ip','');
INSERT INTO os_core_module_vars VALUES (495,'statistics','filter_hostname','');
INSERT INTO os_core_module_vars VALUES (496,'statistics','filter_user','');
INSERT INTO os_core_module_vars VALUES (497,'statistics','filter_requrl','');
INSERT INTO os_core_module_vars VALUES (498,'statistics','dump_path','/var/www/html/v4b/openstar/modules/statistics/dumps');
INSERT INTO os_core_module_vars VALUES (499,'statistics','details_consolidate','0');
INSERT INTO os_core_module_vars VALUES (500,'statistics','details_interval','');
INSERT INTO os_core_module_vars VALUES (501,'statistics','details_referer','');
INSERT INTO os_core_module_vars VALUES (502,'statistics','details_browser','');
INSERT INTO os_core_module_vars VALUES (503,'statistics','details_os','');
INSERT INTO os_core_module_vars VALUES (504,'statistics','details_request','');
INSERT INTO os_core_module_vars VALUES (505,'statistics','details_visit','');
INSERT INTO os_core_module_vars VALUES (506,'statistics','summary_consolidate','0');
INSERT INTO os_core_module_vars VALUES (507,'statistics','summary_interval','');
INSERT INTO os_core_module_vars VALUES (508,'statistics','summary_referer','');
INSERT INTO os_core_module_vars VALUES (509,'statistics','summary_browser','');
INSERT INTO os_core_module_vars VALUES (510,'statistics','summary_os','');
INSERT INTO os_core_module_vars VALUES (511,'statistics','summary_request','');
INSERT INTO os_core_module_vars VALUES (512,'statistics','summary_visit','');
INSERT INTO os_core_module_vars VALUES (513,'statistics','archive_consolidate','0');
INSERT INTO os_core_module_vars VALUES (514,'statistics','archive_interval','');
INSERT INTO os_core_module_vars VALUES (515,'statistics','archive_referer','');
INSERT INTO os_core_module_vars VALUES (516,'statistics','archive_browser','');
INSERT INTO os_core_module_vars VALUES (517,'statistics','archive_os','');
INSERT INTO os_core_module_vars VALUES (518,'statistics','archive_request','');
INSERT INTO os_core_module_vars VALUES (519,'statistics','archive_visit','');
INSERT INTO os_core_module_vars VALUES (520,'typetool','enable','0');
INSERT INTO os_core_module_vars VALUES (521,'typetool','language','language.js');
INSERT INTO os_core_module_vars VALUES (522,'v4bAddressBook','special_chars_1','ÄÖÜäöüß');
INSERT INTO os_core_module_vars VALUES (523,'v4bAddressBook','special_chars_2','AOUaous');
INSERT INTO os_core_module_vars VALUES (524,'v4bRbs','day_start_hour','07');
INSERT INTO os_core_module_vars VALUES (525,'v4bRbs','day_end_hour','19');
INSERT INTO os_core_module_vars VALUES (526,'v4bRbs','color_reserved','');
INSERT INTO os_core_module_vars VALUES (527,'v4bRbs','color_booked','');
INSERT INTO os_core_module_vars VALUES (528,'v4bRbs','display_direction','0');
INSERT INTO os_core_module_vars VALUES (529,'Wiki','AllowedProtocols','http|https|mailto|ftp|news|gopher');
INSERT INTO os_core_module_vars VALUES (530,'Wiki','InlineImages','png|jpg|gif');
INSERT INTO os_core_module_vars VALUES (531,'Wiki','ExtlinkNewWindow','1');
INSERT INTO os_core_module_vars VALUES (532,'Wiki','IntlinkNewWindow','');
INSERT INTO os_core_module_vars VALUES (533,'Wiki','FieldSeparator','³');
INSERT INTO os_core_module_vars VALUES (534,'xFPDF','cache_loc','modules/xFPDF/cache');
INSERT INTO os_core_module_vars VALUES (535,'xFPDF','cache_time','1000');
INSERT INTO os_core_module_vars VALUES (536,'xFPDF','font','times');
INSERT INTO os_core_module_vars VALUES (537,'xFPDF','fontsize','12');
INSERT INTO os_core_module_vars VALUES (538,'xFPDF','logo_position','images/logo.gif');
INSERT INTO os_core_module_vars VALUES (539,'xFPDF','file_orientation','P');
INSERT INTO os_core_module_vars VALUES (540,'xFPDF','file_unit','mm');
INSERT INTO os_core_module_vars VALUES (541,'xFPDF','file_format','A4');
INSERT INTO os_core_module_vars VALUES (542,'xFPDF','file_formatcustomsize','0');
INSERT INTO os_core_module_vars VALUES (543,'xFPDF','file_formatlength','');
INSERT INTO os_core_module_vars VALUES (544,'xFPDF','file_formatwidth','');
INSERT INTO os_core_module_vars VALUES (545,'xFPDF','text_inclusion','<img src=\"modules/xFPDF/pnimages/admin.gif\" height=\"200\" width=\"200\">');
INSERT INTO os_core_module_vars VALUES (546,'photoshare','useimagedirectory','1');
INSERT INTO os_core_module_vars VALUES (547,'photoshare','defaultfolderaccess','1');
INSERT INTO os_core_module_vars VALUES (548,'photoshare','allowaccessperuser','');
INSERT INTO os_core_module_vars VALUES (555,'/PNConfig','siteoffreason','s:0:\"\";');
INSERT INTO os_core_module_vars VALUES (556,'/PNConfig','starttype','s:0:\"\";');
INSERT INTO os_core_module_vars VALUES (557,'/PNConfig','startfunc','s:0:\"\";');
INSERT INTO os_core_module_vars VALUES (558,'/PNConfig','startargs','s:0:\"\";');
INSERT INTO os_core_module_vars VALUES (559,'Xanthia','travelogueuse','1');
INSERT INTO os_core_module_vars VALUES (560,'Xanthia','traveloguenewzone','');
INSERT INTO os_core_module_vars VALUES (561,'Xanthia','xATBlueuse','2');
INSERT INTO os_core_module_vars VALUES (562,'Xanthia','xATBluenewzone','');
INSERT INTO os_core_module_vars VALUES (563,'pnGroups','modulestylesheet','pngroups.css');
INSERT INTO os_core_module_vars VALUES (564,'pnGroups','itemsperpage','15');
INSERT INTO os_core_module_vars VALUES (575,'advanced_polls','admindateformat','_DATETIMEBRIEF');
INSERT INTO os_core_module_vars VALUES (576,'advanced_polls','userdateformat','_DATETIMEBRIEF');
INSERT INTO os_core_module_vars VALUES (577,'advanced_polls','usereversedns','0');
INSERT INTO os_core_module_vars VALUES (578,'advanced_polls','scalingfactor','4');
INSERT INTO os_core_module_vars VALUES (579,'advanced_polls','adminitemsperpage','25');
INSERT INTO os_core_module_vars VALUES (580,'advanced_polls','useritemsperpage','25');
INSERT INTO os_core_module_vars VALUES (581,'advanced_polls','defaultcolour','#000000');
INSERT INTO os_core_module_vars VALUES (582,'advanced_polls','defaultoptioncount','12');
INSERT INTO os_core_module_vars VALUES (583,'ActiveMenu','detail','0');
INSERT INTO os_core_module_vars VALUES (584,'ActiveMenu','table','1');
INSERT INTO os_core_module_vars VALUES (591,'pnForum','fulltextindex','1');
INSERT INTO os_core_module_vars VALUES (592,'pnForum','extendedsearch','no');
INSERT INTO os_core_module_vars VALUES (593,'pnForum','m2f_enabled','yes');
INSERT INTO os_core_module_vars VALUES (594,'pnForum','favorites_enabled','yes');
INSERT INTO os_core_module_vars VALUES (595,'pnForum','hideusers','no');
INSERT INTO os_core_module_vars VALUES (604,'v4bAddressBook','pagesize','30');
INSERT INTO os_core_module_vars VALUES (605,'v4bAddressBook','char_replace_src','ÄÖÜäöüß');
INSERT INTO os_core_module_vars VALUES (606,'v4bAddressBook','char_replace_dst','AOUaous');
INSERT INTO os_core_module_vars VALUES (607,'v4bAddressBook','show_tab_bank','1');
INSERT INTO os_core_module_vars VALUES (608,'v4bAddressBook','show_tab_photo','1');
INSERT INTO os_core_module_vars VALUES (609,'v4bAddressBook','show_tab_dud','1');
INSERT INTO os_core_module_vars VALUES (610,'v4bAddressBook','show_tab_extra','1');
INSERT INTO os_core_module_vars VALUES (611,'v4bAddressBook','use_pending_mode','0');
INSERT INTO os_core_module_vars VALUES (616,'htmlpages','itemsperpage','10');
INSERT INTO os_core_module_vars VALUES (623,'v4bJournal','private_mode','0');
INSERT INTO os_core_module_vars VALUES (624,'v4bJournal','allow_file_upload','1');
INSERT INTO os_core_module_vars VALUES (625,'v4bJournal','hide_top_menu_for_anonymous','0');
INSERT INTO os_core_module_vars VALUES (626,'v4bJournal','max_files','50');
INSERT INTO os_core_module_vars VALUES (627,'v4bJournal','max_file_size','100000');
INSERT INTO os_core_module_vars VALUES (628,'v4bJournal','page_size','20');
INSERT INTO os_core_module_vars VALUES (629,'v4bJournal','user_link_shows_detail','0');
INSERT INTO os_core_module_vars VALUES (630,'v4bJournal','rss_global','1');
INSERT INTO os_core_module_vars VALUES (631,'v4bJournal','rss_user','1');
INSERT INTO os_core_module_vars VALUES (632,'v4bJournal','rss_version','RSS2.0');
INSERT INTO os_core_module_vars VALUES (633,'v4bJournal','pnphpbb2_for_mail','0');
INSERT INTO os_core_module_vars VALUES (634,'v4bJournal','show_allowed_html','1');
INSERT INTO os_core_module_vars VALUES (635,'v4bJournal','use_photoshare','0');
INSERT INTO os_core_module_vars VALUES (636,'v4bJournal','use_granular_permissions','0');
INSERT INTO os_core_module_vars VALUES (637,'v4bJournal','admin_group','2');
INSERT INTO os_core_module_vars VALUES (638,'v4bJournal','date_format','Y-M-d');
INSERT INTO os_core_module_vars VALUES (639,'v4bJournal','cal_date_format','%Y-%m-%d');
INSERT INTO os_core_module_vars VALUES (640,'v4bJournal','max_image_size_x','100');
INSERT INTO os_core_module_vars VALUES (641,'v4bJournal','max_image_size_y','100');
INSERT INTO os_core_module_vars VALUES (642,'ActiveMenu','itemsperpage','50');
INSERT INTO os_core_module_vars VALUES (649,'EZComments','template','pnForum');
INSERT INTO os_core_module_vars VALUES (650,'EZComments','itemsperpage','25');
INSERT INTO os_core_module_vars VALUES (651,'EZComments','anonusersinfo','0');
INSERT INTO os_core_module_vars VALUES (652,'EZComments','moderation','0');
INSERT INTO os_core_module_vars VALUES (653,'EZComments','moderationlist','');
INSERT INTO os_core_module_vars VALUES (654,'EZComments','blacklist','');
INSERT INTO os_core_module_vars VALUES (655,'EZComments','modlinkcount','2');
INSERT INTO os_core_module_vars VALUES (656,'EZComments','moderationmail','0');
INSERT INTO os_core_module_vars VALUES (657,'EZComments','alwaysmoderate','0');
INSERT INTO os_core_module_vars VALUES (658,'EZComments','proxyblacklist','0');
INSERT INTO os_core_module_vars VALUES (659,'EZComments','dontmoderateifcommented','0');
INSERT INTO os_core_module_vars VALUES (660,'EZComments','logip','0');
INSERT INTO os_core_module_vars VALUES (661,'EZComments','feedtype','rss');
INSERT INTO os_core_module_vars VALUES (662,'EZComments','feedcount','10');
INSERT INTO os_core_module_vars VALUES (663,'EZComments','enablepager','');
INSERT INTO os_core_module_vars VALUES (664,'EZComments','commentsperpage','25');
INSERT INTO os_core_module_vars VALUES (683,'tRSSNews','cachetime','10');
INSERT INTO os_core_module_vars VALUES (684,'tRSSNews','expirecache','0');
INSERT INTO os_core_module_vars VALUES (685,'tRSSNews','usefeedimage','1');
INSERT INTO os_core_module_vars VALUES (686,'tRSSNews','defaultimage','news.gif');
INSERT INTO os_core_module_vars VALUES (687,'tRSSNews','lcolwidth','150');
INSERT INTO os_core_module_vars VALUES (688,'tRSSNews','rcolwidth','150');
INSERT INTO os_core_module_vars VALUES (689,'tRSSNews','numitems','10');
INSERT INTO os_core_module_vars VALUES (690,'tRSSNews','catimage','cat1.gif');
INSERT INTO os_core_module_vars VALUES (691,'tRSSNews','catonepage','0');
INSERT INTO os_core_module_vars VALUES (692,'tRSSNews','usemyfeeds','0');
INSERT INTO os_core_module_vars VALUES (693,'tRSSNews','switchago','0');
INSERT INTO os_core_module_vars VALUES (694,'tRSSNews','useproxy','0');
INSERT INTO os_core_module_vars VALUES (695,'tRSSNews','proxyauth','0');
INSERT INTO os_core_module_vars VALUES (696,'tRSSNews','proxyname','');
INSERT INTO os_core_module_vars VALUES (697,'tRSSNews','proxyport','');
INSERT INTO os_core_module_vars VALUES (698,'tRSSNews','proxyuser','');
INSERT INTO os_core_module_vars VALUES (699,'tRSSNews','proxypass','');
INSERT INTO os_core_module_vars VALUES (700,'tRSSNews','artpage','1');
INSERT INTO os_core_module_vars VALUES (701,'tRSSNews','maxitems','0');
INSERT INTO os_core_module_vars VALUES (708,'Avatar','avatardir','images/avatar');
INSERT INTO os_core_module_vars VALUES (709,'Avatar','forumdir','');
INSERT INTO os_core_module_vars VALUES (710,'Avatar','allow_resize','');
INSERT INTO os_core_module_vars VALUES (711,'Avatar','maxsize','5000');
INSERT INTO os_core_module_vars VALUES (712,'Avatar','maxheight','50');
INSERT INTO os_core_module_vars VALUES (713,'Avatar','maxwidth','50');
INSERT INTO os_core_module_vars VALUES (714,'Avatar','allowed_extensions','gif;jpg');
INSERT INTO os_core_module_vars VALUES (715,'Avatar','prefix_group_1','');
INSERT INTO os_core_module_vars VALUES (716,'Avatar','prefix_group_2','');
INSERT INTO os_core_module_vars VALUES (717,'Avatar','prefix_group_3','');
INSERT INTO os_core_module_vars VALUES (718,'Avatar','prefix_prefix_1','');
INSERT INTO os_core_module_vars VALUES (719,'Avatar','prefix_prefix_2','');
INSERT INTO os_core_module_vars VALUES (720,'Avatar','prefix_prefix_3','');
INSERT INTO os_core_module_vars VALUES (721,'pnForum','deletehookaction','lock');
INSERT INTO os_core_module_vars VALUES (722,'pnForum','rss2f_enabled','yes');
INSERT INTO os_core_module_vars VALUES (723,'Netquery','mapping_site','1');
INSERT INTO os_core_module_vars VALUES (730,'v4bRbs','clock_day','1');
INSERT INTO os_core_module_vars VALUES (731,'v4bRbs','enable_repeat','0');
INSERT INTO os_core_module_vars VALUES (732,'v4bRbs','week_starts','0');
INSERT INTO os_core_module_vars VALUES (733,'v4bRbs','slot_duration','');
INSERT INTO os_core_module_vars VALUES (734,'v4bRbs','repeat_limit','');
INSERT INTO os_core_module_vars VALUES (750,'EZComments','migrated','a:1:{i:0;s:5:\"dummy\";}');
INSERT INTO os_core_module_vars VALUES (751,'v4bAccounting','tax_included','1');
INSERT INTO os_core_module_vars VALUES (752,'v4bAccounting','page_size','25');
INSERT INTO os_core_module_vars VALUES (753,'whatsnews','itemsperpage','10');
INSERT INTO os_core_module_vars VALUES (754,'whatsnews','maillinefeedmode','0');
INSERT INTO os_core_module_vars VALUES (755,'whatsnews','moduleredirectmode','0');
INSERT INTO os_core_module_vars VALUES (756,'whatsnews','smtplibext_useit','0');
INSERT INTO os_core_module_vars VALUES (757,'whatsnews','smtplibext_host','localhost');
INSERT INTO os_core_module_vars VALUES (758,'whatsnews','smtplibext_port','25');
INSERT INTO os_core_module_vars VALUES (759,'whatsnews','smtplibext_helo','localhost');
INSERT INTO os_core_module_vars VALUES (760,'whatsnews','smtplibext_auth','0');
INSERT INTO os_core_module_vars VALUES (761,'whatsnews','smtplibext_user','testuser');
INSERT INTO os_core_module_vars VALUES (762,'whatsnews','smtplibext_pass','testpass');
INSERT INTO os_core_module_vars VALUES (763,'whatsnews','firstinstallversion','1.8.0beta');
INSERT INTO os_core_module_vars VALUES (764,'v4bJournal','file_upload','1');
INSERT INTO os_core_module_vars VALUES (765,'v4bJournal','max_title_length','50');
INSERT INTO os_core_module_vars VALUES (766,'v4bJournal','max_body_length','750');
INSERT INTO os_core_module_vars VALUES (767,'v4bJournal','max_body_overlib','400');
INSERT INTO os_core_module_vars VALUES (768,'v4bJournal','use_bbcode','1');
INSERT INTO os_core_module_vars VALUES (769,'v4bJournal','use_comments','1');
INSERT INTO os_core_module_vars VALUES (770,'/PNConfig','safehtml','s:1:\"0\";');
INSERT INTO os_core_module_vars VALUES (771,'v4bAddressBook','date_format','Y-M-d');
INSERT INTO os_core_module_vars VALUES (779,'v4bJournal','generate_thumbnails','1');
INSERT INTO os_core_module_vars VALUES (780,'Thumbnail','std_image_size_x','150');
INSERT INTO os_core_module_vars VALUES (781,'Thumbnail','allow_size_override','1');
INSERT INTO os_core_module_vars VALUES (782,'Thumbnail','std_image_size_y','150');
INSERT INTO os_core_module_vars VALUES (783,'pnSkype','theaction','chat');
INSERT INTO os_core_module_vars VALUES (784,'pnSkype','thepicture','smallicon');
INSERT INTO os_core_module_vars VALUES (785,'pnSkype','usermenu','no');
INSERT INTO os_core_module_vars VALUES (786,'EZComments','modlist','');
INSERT INTO os_core_module_vars VALUES (797,'pagesetter','frontpagePubType','');
INSERT INTO os_core_module_vars VALUES (798,'pagesetter','uploadDir','');
INSERT INTO os_core_module_vars VALUES (799,'pagesetter','uploadDirDocs','');
INSERT INTO os_core_module_vars VALUES (800,'pagesetter','autofillPublishDate','0');
INSERT INTO os_core_module_vars VALUES (801,'guppy','htmlAreaStyled','0');
INSERT INTO os_core_module_vars VALUES (802,'guppy','htmlAreaUndo','0');
INSERT INTO os_core_module_vars VALUES (803,'guppy','htmlAreaWordKill','1');
INSERT INTO os_core_module_vars VALUES (804,'guppy','htmlAreaEnabled','1');
INSERT INTO os_core_module_vars VALUES (805,'MultiHook','mhlinktitle','0');
INSERT INTO os_core_module_vars VALUES (806,'MultiHook','mhreplaceabbr','0');
INSERT INTO os_core_module_vars VALUES (807,'MultiHook','mhshoweditlink','1');
INSERT INTO os_core_module_vars VALUES (808,'pnMantis','_mantisloc','modules/external/service');
INSERT INTO os_core_module_vars VALUES (809,'pnMantis','_mantisframe','1');
INSERT INTO os_core_module_vars VALUES (810,'pnMantis','_mantiswindow','0');
INSERT INTO os_core_module_vars VALUES (811,'pnMantis','_mantisuser','1');
INSERT INTO os_core_module_vars VALUES (812,'pnMantis','_mantisusedud','0');
INSERT INTO os_core_module_vars VALUES (813,'pnMantis','_mantissendmail','0');
INSERT INTO os_core_module_vars VALUES (814,'pnMantis','_mantisencryption','');
INSERT INTO os_core_module_vars VALUES (815,'pnMantis','_mantisguest','0');
INSERT INTO os_core_module_vars VALUES (816,'pnMantis','_mantisdb','');
INSERT INTO os_core_module_vars VALUES (817,'pnMantis','_mantiswinheight','800');

--
-- Table structure for table `os_core_modules`
--

DROP TABLE IF EXISTS os_core_modules;
CREATE TABLE os_core_modules (
  pn_id int(11) unsigned NOT NULL auto_increment,
  pn_name varchar(64) NOT NULL default '',
  pn_type int(6) NOT NULL default '0',
  pn_displayname varchar(64) NOT NULL default '',
  pn_description varchar(255) NOT NULL default '',
  pn_regid int(11) unsigned NOT NULL default '0',
  pn_directory varchar(64) NOT NULL default '',
  pn_version varchar(10) NOT NULL default '0',
  pn_admin_capable tinyint(1) NOT NULL default '0',
  pn_user_capable tinyint(1) NOT NULL default '0',
  pn_state tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (pn_id),
  KEY idx_name (pn_name)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_modules`
--

INSERT INTO os_core_modules VALUES (1,'Admin',2,'Administration','Provides the PostNuke site administration panel',9,'Admin','1.1',1,0,3);
INSERT INTO os_core_modules VALUES (2,'Blocks',2,'Blocks','Provides a side and center display blocks system',13,'Blocks','2.2',1,1,3);
INSERT INTO os_core_modules VALUES (4,'Modules',2,'Modules','Provides a system for managing PostNuke core and 3rd-party modules',1,'Modules','2.5',1,0,3);
INSERT INTO os_core_modules VALUES (5,'Permissions',2,'Permissions','Modify permissions security',22,'Permissions','0.4',1,0,3);
INSERT INTO os_core_modules VALUES (6,'News',1,'News','Provides a news article publishing system',7,'News','1.3',0,1,3);
INSERT INTO os_core_modules VALUES (7,'User',1,'User','PN-Core user module',27,'User','0.3',1,0,3);
INSERT INTO os_core_modules VALUES (9,'Ephemerids',2,'Ephemerids','A \'This day in history\' module.',15,'Ephemerids','1.5',1,0,3);
INSERT INTO os_core_modules VALUES (10,'Messages',2,'Messages','Provides an in-site private messaging system',6,'Messages','1.0',0,1,3);
INSERT INTO os_core_modules VALUES (11,'LostPassword',1,'LostPassword','Provides a self-service facility for lost user account password recovery',18,'LostPassword','0.5',0,0,3);
INSERT INTO os_core_modules VALUES (12,'Credits',2,'Credits','Displays module credits, license, help and contact information',0,'Credits','1.2',0,1,3);
INSERT INTO os_core_modules VALUES (14,'AddStory',1,'AddStory','Provides an article publishing system',8,'AddStory','1.0',1,0,3);
INSERT INTO os_core_modules VALUES (15,'Settings',1,'Settings','Administer site settings/preferences.',26,'Settings','1.4',1,0,3);
INSERT INTO os_core_modules VALUES (16,'Mailer',2,'Mailer','Provides a mail transport configuration facility',0,'Mailer','1.0',1,0,3);
INSERT INTO os_core_modules VALUES (17,'typetool',2,'typetool','TypeTool Visual Editor Implementation',0,'typetool','8.0',1,0,3);
INSERT INTO os_core_modules VALUES (18,'Top_List',1,'Top_List','Display top x listings',0,'Top_List','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (19,'pn_bbsmile',2,'pn_bbsmile','Smilie Hook (Autoincluded)',163,'pn_bbsmile','1.16',1,1,3);
INSERT INTO os_core_modules VALUES (20,'Quotes',2,'Random Quote','Random quotes',24,'Quotes','1.5',1,0,3);
INSERT INTO os_core_modules VALUES (21,'pn_bbcode',2,'pn_bbcode','BBCode Hook',164,'pn_bbcode','1.20',1,1,3);
INSERT INTO os_core_modules VALUES (22,'Members_List',2,'Members_List','Provides an index of registered-users',0,'Members_List','1.5',1,1,3);
INSERT INTO os_core_modules VALUES (24,'Sniffer',2,'Sniffer','Browser detection and information',0,'Sniffer','1.1',1,0,3);
INSERT INTO os_core_modules VALUES (25,'Wiki',1,'Wiki','Provides support for Wiki formatting in articles',28,'Wiki','1.0',0,0,3);
INSERT INTO os_core_modules VALUES (27,'pnRender',2,'pnRender','The Smarty implementation for PostNuke',0,'pnRender','1.0',1,0,3);
INSERT INTO os_core_modules VALUES (29,'Submit_News',1,'Submit_News','Submit news module',0,'Submit_News','1.13',1,1,3);
INSERT INTO os_core_modules VALUES (30,'RSS',2,'RSS','RSS News Feed Reader',0,'RSS','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (31,'MailUsers',1,'MailUsers','Provides a facility for sending mailing shots to one or more registered users',19,'MailUsers','1.3',1,0,3);
INSERT INTO os_core_modules VALUES (33,'legal',2,'Legal','Generic Privacy Statement and Terms of Use',0,'legal','1.2',1,1,3);
INSERT INTO os_core_modules VALUES (34,'Sections',1,'Sections','Displays Extra Sections on Site',33,'Sections','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (35,'Admin_Messages',2,'Admin_Messages','Provides an automated administrator announcement facility',0,'Admin_Messages','1.5',1,0,3);
INSERT INTO os_core_modules VALUES (36,'Referers',1,'Referers','View HTTP referer statistics.',25,'Referers','1.3',1,0,3);
INSERT INTO os_core_modules VALUES (37,'Search',1,'Search','Search reviews/users/stories/faqs',32,'Search','1.0',0,1,3);
INSERT INTO os_core_modules VALUES (38,'Topics',1,'Topics','Display site topics',37,'Topics','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (39,'Xanthia',2,'Xanthia','Xanthia theme engine for customized layouts and presentation',0,'Xanthia','2.1',1,0,3);
INSERT INTO os_core_modules VALUES (40,'Your_Account',1,'Your_Account','Provides a self-service account settings control panel for registered users',0,'Your_Account','0.8',0,0,3);
INSERT INTO os_core_modules VALUES (41,'Polls',1,'Polls','Voting System Module',23,'Polls','1.1',1,1,3);
INSERT INTO os_core_modules VALUES (42,'Reviews',1,'Reviews','Reviews System Module',31,'Reviews','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (43,'NewUser',1,'NewUser','Provides new user account registration management',21,'NewUser','0.5',0,0,3);
INSERT INTO os_core_modules VALUES (44,'Ratings',2,'Ratings','Rate PostNuke items',41,'Ratings','1.3',1,1,3);
INSERT INTO os_core_modules VALUES (45,'Header_Footer',2,'Header_Footer','Provides a page header and footer management system',0,'Header_Footer','1.0',0,1,3);
INSERT INTO os_core_modules VALUES (47,'Comments',1,'Comments','Provides a system for adding comments to content and administering comments',14,'Comments','1.1',1,1,3);
INSERT INTO os_core_modules VALUES (49,'Censor',2,'Censor','Provides the ability to censor use of certain words in site content',0,'Censor','1.5',1,0,3);
INSERT INTO os_core_modules VALUES (51,'FAQ',1,'FAQ','Provides a system for managing frequently-asked questions',4,'FAQ','1.11',1,1,3);
INSERT INTO os_core_modules VALUES (52,'Banners',1,'Banners Admin','Provides a banner advertisement system',12,'Banners','1.0',1,0,3);
INSERT INTO os_core_modules VALUES (53,'ActiveMenu',2,'Active Menu','Provides a cascading menu system',0,'ActiveMenu','0.73',1,0,3);
INSERT INTO os_core_modules VALUES (54,'AutoTheme',1,'AutoTheme','HTML Theme System',0,'AutoTheme','0.87',1,1,3);
INSERT INTO os_core_modules VALUES (55,'CmodsDownload',1,'CmodsDownload','Provides a file uploads and downloads facility',0,'CmodsDownload','1.9.5',1,1,3);
INSERT INTO os_core_modules VALUES (56,'CmodsWebLinks',1,'CmodsWebLinks','Provides a web links facility',0,'CmodsWebLinks','1.9',1,1,3);
INSERT INTO os_core_modules VALUES (57,'dq_helpdesk',2,'dq_helpdesk','Provides a help desk system',0,'dq_helpdesk','0.5.5',1,1,3);
INSERT INTO os_core_modules VALUES (58,'eventia',2,'Eventia','Provides a course management system',0,'eventia','3.1',1,1,3);
INSERT INTO os_core_modules VALUES (61,'formicula',2,'Formicula','Provides a tool for creating contact forms of all kinds',0,'formicula','0.3',1,1,3);
INSERT INTO os_core_modules VALUES (62,'MultiHook',2,'MultiHook','_MH_MODULEDESCRIPTION',0,'MultiHook','3.0',1,1,3);
INSERT INTO os_core_modules VALUES (63,'Netquery',2,'Netquery','MultiWhois, DNS, Email, Ports, HTTP, Ping, Traceroute, Looking Glass',0,'Netquery','3.2.0',1,1,3);
INSERT INTO os_core_modules VALUES (64,'pagesetter',2,'Pagesetter','Page creation and manager module',0,'pagesetter','6.2.0.3',1,1,3);
INSERT INTO os_core_modules VALUES (65,'pgarchive',2,'Pagesetter Archive','Archive listing for Pagesetter publications',0,'pgarchive','1.2.0.0',1,1,3);
INSERT INTO os_core_modules VALUES (66,'photoshare',2,'Photoshare','Online photo album',0,'photoshare','4.2.0',1,1,3);
INSERT INTO os_core_modules VALUES (69,'pn_bbclick',2,'pn_bbclick','Make Clickable Hook',165,'pn_bbclick','1.05',1,1,3);
INSERT INTO os_core_modules VALUES (70,'pnForum',2,'pnForum','phpBB-style Bulletin Board',62,'pnForum','2.6',1,1,3);
INSERT INTO os_core_modules VALUES (71,'pn_highlight',1,'pn_highlight','highlight text portions',0,'pn_highlight','1.01',0,0,3);
INSERT INTO os_core_modules VALUES (75,'postbbcode',2,'postbbcode','PostNuke BBCode Module',0,'postbbcode','0.2.1',1,1,1);
INSERT INTO os_core_modules VALUES (76,'PostCalendar',2,'PostCalendar','PostNuke Calendar Module',44,'PostCalendar','5.0.0',1,1,3);
INSERT INTO os_core_modules VALUES (77,'postguestbook',2,'postguestbook','Guestbook Module for PostNuke/Envolution',0,'postguestbook','0.6.1',1,1,3);
INSERT INTO os_core_modules VALUES (78,'PostWrap',2,'PostWrap','Incorporate external sites and applications',0,'PostWrap','2.5',1,1,3);
INSERT INTO os_core_modules VALUES (81,'SnakePending',2,'SnakePending','Modify Pending Content',0,'SnakePending','0.2',1,0,3);
INSERT INTO os_core_modules VALUES (82,'statistics',2,'statistics','Statistics',0,'statistics','8b',1,1,3);
INSERT INTO os_core_modules VALUES (83,'Template',2,'Template','Template for new modules',0,'Template','1.0',1,1,1);
INSERT INTO os_core_modules VALUES (84,'v4bAddressBook',2,'v4bAddressBook','Provides an address book',0,'v4bAddressBook','1.01',1,1,3);
INSERT INTO os_core_modules VALUES (86,'v4bContact',2,'v4bContact','Provides a web site contact form management system',0,'v4bContact','0.9',1,1,3);
INSERT INTO os_core_modules VALUES (87,'v4bConvert',2,'v4bConvert','Provides a measurement unit conversion facility',0,'v4bConvert','0.91',0,1,3);
INSERT INTO os_core_modules VALUES (88,'v4bLorem',2,'v4bLorem','Provides a random text generator',0,'v4bLorem','1.0',0,1,3);
INSERT INTO os_core_modules VALUES (89,'v4bNewContent',2,'v4bNewContent','Display New Content Blocks in a center page',0,'v4bNewContent','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (90,'v4bObjectData',2,'v4bObjectData','v4b object model data',0,'v4bObjectData','1.01',0,0,3);
INSERT INTO os_core_modules VALUES (91,'v4bPgPages',2,'v4bPgPages','Provides an aggregator for Pagesetter publications',0,'v4bPgPages','0.90',1,1,3);
INSERT INTO os_core_modules VALUES (92,'v4bProjects',2,'v4bProjects','Provides a project management system',0,'v4bProjects','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (93,'v4bRbs',2,'v4bRbs','Provides a resource booking system',0,'v4bRbs','1.2',1,1,3);
INSERT INTO os_core_modules VALUES (94,'xFPDF',2,'xFPDF','Provides a facility for generating  PDF files from site content',0,'xFPDF','2.0',1,1,3);
INSERT INTO os_core_modules VALUES (102,'pnGroups',2,'pnGroups','Groups Adminstration Add-On',0,'pnGroups','2.0',1,1,3);
INSERT INTO os_core_modules VALUES (103,'advanced_polls',2,'Advanced Polls','Provides an advanced poll and survey system',0,'advanced_polls','1.51',1,1,3);
INSERT INTO os_core_modules VALUES (104,'htmlpages',2,'htmlpages','Provides a facility for adding and managing HTML pages',0,'htmlpages','2.01',1,1,3);
INSERT INTO os_core_modules VALUES (107,'Groups',2,'Groups Adminstration','Provides a system for managing user groups',16,'Groups','1.0',1,0,3);
INSERT INTO os_core_modules VALUES (116,'v4bJournal',2,'v4bJournal','Provides an on-line blog diary facility',0,'v4bJournal','0.99b',1,1,3);
INSERT INTO os_core_modules VALUES (121,'v4bCategories',2,'v4bCategories','Provides a category management system',0,'v4bCategories','1.01',1,1,3);
INSERT INTO os_core_modules VALUES (134,'tRSSNews',2,'tRSSNews','RSS News Feed Module',0,'tRSSNews','2.01',1,1,3);
INSERT INTO os_core_modules VALUES (136,'Avatar',2,'Avatar','Upload of individual Avatars',0,'Avatar','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (138,'pnMantis',2,'pnMantis','Postnuke Mantis Hack',0,'pnMantis','5.02',1,1,3);
INSERT INTO os_core_modules VALUES (144,'EZComments',2,'EZComments','Attach comments to pages using hooks',0,'EZComments','1.3',1,1,3);
INSERT INTO os_core_modules VALUES (149,'Recommend_Us',1,'Recommend_Us','Recommend site/Send articles Module',0,'Recommend_Us','1.0',0,1,1);
INSERT INTO os_core_modules VALUES (163,'v4bAccounting',2,'v4bAccounting','Provides Basic Accounting Facilities',0,'v4bAccounting','1.01',1,1,3);
INSERT INTO os_core_modules VALUES (168,'whatsnews',2,'whatsnews','For users: Newsletter Subscription. For admins: Statistics about anything',0,'whatsnews','1.8.0',1,1,3);
INSERT INTO os_core_modules VALUES (169,'Thumbnail',2,'Thumbnail','Provides thumbnail generation facilities via userapi functions',0,'Thumbnail','1.0',1,0,3);
INSERT INTO os_core_modules VALUES (174,'Example',2,'Example','This is an example module for the PostNuke CMS',0,'Example','1.2',1,1,1);
INSERT INTO os_core_modules VALUES (178,'pnSkype',2,'pnSkype','Adds Skype links into PostNuke',0,'pnSkype','0.2',1,1,3);
INSERT INTO os_core_modules VALUES (182,'Multisites',1,'Multisites','Create multiple sites using the same PN installation files',20,'Multisites','0.1',0,0,1);
INSERT INTO os_core_modules VALUES (183,'Past_Nuke',1,'Past Nuke','',0,'NS-Past_Nuke','0',0,0,1);

--
-- Table structure for table `os_core_multihook`
--

DROP TABLE IF EXISTS os_core_multihook;
CREATE TABLE os_core_multihook (
  pn_aid int(11) NOT NULL auto_increment,
  pn_short varchar(100) NOT NULL default '',
  pn_long varchar(200) NOT NULL default '',
  pn_title varchar(100) NOT NULL default '',
  pn_type tinyint(1) NOT NULL default '0',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_aid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_multihook`
--


--
-- Table structure for table `os_core_netquery_flags`
--

DROP TABLE IF EXISTS os_core_netquery_flags;
CREATE TABLE os_core_netquery_flags (
  flag_id mediumint(9) NOT NULL auto_increment,
  flagnum mediumint(9) NOT NULL default '0',
  keyword varchar(20) NOT NULL default '',
  fontclr varchar(20) NOT NULL default '',
  backclr varchar(20) NOT NULL default '',
  lookup_1 varchar(100) NOT NULL default '',
  lookup_2 varchar(100) NOT NULL default '',
  PRIMARY KEY  (flag_id),
  UNIQUE KEY keyword (flagnum)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_netquery_flags`
--

INSERT INTO os_core_netquery_flags VALUES (1,0,'no data','red','white','http://www.virtech.org/tools/#','');
INSERT INTO os_core_netquery_flags VALUES (2,99,'reserved','green','white','','');

--
-- Table structure for table `os_core_netquery_geocc`
--

DROP TABLE IF EXISTS os_core_netquery_geocc;
CREATE TABLE os_core_netquery_geocc (
  ci tinyint(3) unsigned NOT NULL auto_increment,
  cc char(2) NOT NULL default '',
  cn varchar(50) NOT NULL default '',
  lat decimal(7,4) NOT NULL default '0.0000',
  lon decimal(7,4) NOT NULL default '0.0000',
  users mediumint(9) unsigned NOT NULL default '0',
  PRIMARY KEY  (ci)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_netquery_geocc`
--

INSERT INTO os_core_netquery_geocc VALUES (1,'XX','<a href=\"http://virtech.org/tools/\">No GeoIP</a>','0.0000','0.0000',0);

--
-- Table structure for table `os_core_netquery_geoip`
--

DROP TABLE IF EXISTS os_core_netquery_geoip;
CREATE TABLE os_core_netquery_geoip (
  `start` int(10) unsigned NOT NULL default '0',
  `end` int(10) unsigned NOT NULL default '0',
  ci tinyint(3) unsigned NOT NULL default '0'
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_netquery_geoip`
--

INSERT INTO os_core_netquery_geoip VALUES (0,1,1);

--
-- Table structure for table `os_core_netquery_lgrouter`
--

DROP TABLE IF EXISTS os_core_netquery_lgrouter;
CREATE TABLE os_core_netquery_lgrouter (
  router_id mediumint(9) NOT NULL auto_increment,
  router varchar(100) NOT NULL default '',
  address varchar(100) NOT NULL default '',
  username varchar(20) NOT NULL default '',
  `password` varchar(20) NOT NULL default '',
  zebra tinyint(4) NOT NULL default '0',
  zebra_port mediumint(9) NOT NULL default '0',
  zebra_password varchar(20) NOT NULL default '',
  ripd tinyint(4) NOT NULL default '0',
  ripd_port mediumint(9) NOT NULL default '0',
  ripd_password varchar(20) NOT NULL default '',
  ripngd tinyint(4) NOT NULL default '0',
  ripngd_port mediumint(9) NOT NULL default '0',
  ripngd_password varchar(20) NOT NULL default '',
  ospfd tinyint(4) NOT NULL default '0',
  ospfd_port mediumint(9) NOT NULL default '0',
  ospfd_password varchar(20) NOT NULL default '',
  bgpd tinyint(4) NOT NULL default '0',
  bgpd_port mediumint(9) NOT NULL default '0',
  bgpd_password varchar(20) NOT NULL default '',
  ospf6d tinyint(4) NOT NULL default '0',
  ospf6d_port mediumint(9) NOT NULL default '0',
  ospf6d_password varchar(20) NOT NULL default '',
  use_argc tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (router_id),
  UNIQUE KEY keyword (router)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_netquery_lgrouter`
--

INSERT INTO os_core_netquery_lgrouter VALUES (1,'default','LG Default Settings','','',1,2601,'',1,2602,'',1,2603,'',1,2604,'',1,2605,'',1,2606,'',1);
INSERT INTO os_core_netquery_lgrouter VALUES (2,'ATT Public','route-server.ip.att.net','','',1,23,'',0,0,'',0,0,'',1,23,'',1,23,'',0,0,'',1);
INSERT INTO os_core_netquery_lgrouter VALUES (3,'Oregon-ix','route-views.oregon-ix.net','rviews','',1,23,'',0,0,'',0,0,'',1,23,'',1,23,'',0,0,'',1);

--
-- Table structure for table `os_core_netquery_ports`
--

DROP TABLE IF EXISTS os_core_netquery_ports;
CREATE TABLE os_core_netquery_ports (
  port_id mediumint(9) NOT NULL auto_increment,
  port mediumint(9) NOT NULL default '0',
  protocol char(3) NOT NULL default '',
  service varchar(35) NOT NULL default '',
  `comment` varchar(50) NOT NULL default '',
  flag tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (port_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_netquery_ports`
--

INSERT INTO os_core_netquery_ports VALUES (1,0,'xxx','Unknown','Port services data not installed',0);

--
-- Table structure for table `os_core_netquery_whois`
--

DROP TABLE IF EXISTS os_core_netquery_whois;
CREATE TABLE os_core_netquery_whois (
  whois_id mediumint(9) NOT NULL auto_increment,
  whois_ext varchar(10) NOT NULL default '',
  whois_server varchar(100) NOT NULL default '',
  PRIMARY KEY  (whois_id),
  UNIQUE KEY keyword (whois_ext)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_netquery_whois`
--

INSERT INTO os_core_netquery_whois VALUES (1,'.com','whois.crsnic.net');
INSERT INTO os_core_netquery_whois VALUES (2,'.net','whois.crsnic.net');
INSERT INTO os_core_netquery_whois VALUES (3,'.edu','whois.crsnic.net');
INSERT INTO os_core_netquery_whois VALUES (4,'.org','whois.publicinterestregistry.net');
INSERT INTO os_core_netquery_whois VALUES (5,'.ca','whois.cira.ca');
INSERT INTO os_core_netquery_whois VALUES (6,'.uk','whois.nic.uk');
INSERT INTO os_core_netquery_whois VALUES (7,'.co.uk','whois.nic.uk');
INSERT INTO os_core_netquery_whois VALUES (8,'.us','whois.nic.us');
INSERT INTO os_core_netquery_whois VALUES (9,'.biz','whois.neulevel.biz');
INSERT INTO os_core_netquery_whois VALUES (10,'.info','whois.afilias.info');
INSERT INTO os_core_netquery_whois VALUES (11,'.ws','whois.website.ws');
INSERT INTO os_core_netquery_whois VALUES (12,'.name','whois.nic.name');
INSERT INTO os_core_netquery_whois VALUES (13,'.cc','whois.nic.cc');
INSERT INTO os_core_netquery_whois VALUES (14,'.cn','whois.cnnic.cn');
INSERT INTO os_core_netquery_whois VALUES (15,'.com.cn','whois.cnnic.cn');
INSERT INTO os_core_netquery_whois VALUES (16,'.net.cn','whois.cnnic.cn');
INSERT INTO os_core_netquery_whois VALUES (17,'.org.cn','whois.cnnic.cn');
INSERT INTO os_core_netquery_whois VALUES (18,'.tm','whois.nic.tm');
INSERT INTO os_core_netquery_whois VALUES (19,'.nl','whois.domain-registry.nl');

--
-- Table structure for table `os_core_pagesetter_counters`
--

DROP TABLE IF EXISTS os_core_pagesetter_counters;
CREATE TABLE os_core_pagesetter_counters (
  pg_name varchar(100) NOT NULL default '',
  pg_count int(11) NOT NULL default '0',
  PRIMARY KEY  (pg_name)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pagesetter_counters`
--


--
-- Table structure for table `os_core_pagesetter_listitems`
--

DROP TABLE IF EXISTS os_core_pagesetter_listitems;
CREATE TABLE os_core_pagesetter_listitems (
  pg_id int(11) NOT NULL auto_increment,
  pg_lid int(11) NOT NULL default '0',
  pg_parentid int(11) NOT NULL default '0',
  pg_title varchar(255) default NULL,
  pg_fulltitle varchar(255) default NULL,
  pg_value varchar(255) default NULL,
  pg_description varchar(255) default NULL,
  pg_lineno int(11) NOT NULL default '0',
  pg_indent int(11) NOT NULL default '0',
  pg_lval int(11) NOT NULL default '0',
  pg_rval int(11) NOT NULL default '0',
  PRIMARY KEY  (pg_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pagesetter_listitems`
--


--
-- Table structure for table `os_core_pagesetter_lists`
--

DROP TABLE IF EXISTS os_core_pagesetter_lists;
CREATE TABLE os_core_pagesetter_lists (
  pg_id int(11) NOT NULL auto_increment,
  pg_authorid int(11) NOT NULL default '0',
  pg_created date NOT NULL default '0000-00-00',
  pg_title varchar(255) default NULL,
  pg_description varchar(255) default NULL,
  PRIMARY KEY  (pg_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pagesetter_lists`
--


--
-- Table structure for table `os_core_pagesetter_pubdata10000`
--

DROP TABLE IF EXISTS os_core_pagesetter_pubdata10000;
CREATE TABLE os_core_pagesetter_pubdata10000 (
  pg_id int(11) NOT NULL auto_increment,
  pg_approvalState varchar(255) default NULL,
  pg_online tinyint(4) default NULL,
  pg_topic int(11) default NULL,
  pg_showInMenu tinyint(4) default NULL,
  pg_showInList tinyint(4) default NULL,
  pg_author varchar(255) default NULL,
  pg_creator int(11) NOT NULL default '0',
  pg_created datetime default NULL,
  pg_lastUpdatedDate datetime default NULL,
  pg_publishDate date default NULL,
  pg_expireDate date default NULL,
  pg_language varchar(10) default NULL,
  pg_field10000 varchar(255) default NULL,
  pg_field10001 mediumtext,
  pg_field10002 mediumtext,
  pg_indepot tinyint(4) default '0',
  pg_revision int(11) default '1',
  pg_pid int(11) default NULL,
  PRIMARY KEY  (pg_id),
  KEY pg_pid (pg_pid,pg_online)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pagesetter_pubdata10000`
--


--
-- Table structure for table `os_core_pagesetter_pubdata10001`
--

DROP TABLE IF EXISTS os_core_pagesetter_pubdata10001;
CREATE TABLE os_core_pagesetter_pubdata10001 (
  pg_id int(11) NOT NULL auto_increment,
  pg_approvalState varchar(255) default NULL,
  pg_online tinyint(4) default NULL,
  pg_topic int(11) default NULL,
  pg_showInMenu tinyint(4) default NULL,
  pg_showInList tinyint(4) default NULL,
  pg_author varchar(255) default NULL,
  pg_creator int(11) NOT NULL default '0',
  pg_created datetime default NULL,
  pg_lastUpdatedDate datetime default NULL,
  pg_publishDate date default NULL,
  pg_expireDate date default NULL,
  pg_language varchar(10) default NULL,
  pg_field10003 varchar(255) default NULL,
  pg_field10004 varchar(255) default NULL,
  pg_field10005 varchar(255) default NULL,
  pg_field10006 int(11) default NULL,
  pg_field10007 int(11) default NULL,
  pg_field10008 int(11) default NULL,
  pg_field10009 int(11) default NULL,
  pg_field10010 int(11) default NULL,
  pg_field10011 int(11) default NULL,
  pg_field10012 int(11) default NULL,
  pg_field10013 varchar(255) default NULL,
  pg_field10014 varchar(255) default NULL,
  pg_field10015 varchar(255) default NULL,
  pg_field10016 varchar(255) default NULL,
  pg_field10017 varchar(255) default NULL,
  pg_field10018 mediumtext,
  pg_indepot tinyint(4) default '0',
  pg_revision int(11) default '1',
  pg_pid int(11) default NULL,
  PRIMARY KEY  (pg_id),
  KEY pg_pid (pg_pid,pg_online)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pagesetter_pubdata10001`
--


--
-- Table structure for table `os_core_pagesetter_pubfields`
--

DROP TABLE IF EXISTS os_core_pagesetter_pubfields;
CREATE TABLE os_core_pagesetter_pubfields (
  pg_id int(11) NOT NULL auto_increment,
  pg_tid int(11) NOT NULL default '0',
  pg_name varchar(255) default NULL,
  pg_title varchar(255) default NULL,
  pg_description varchar(255) default NULL,
  pg_type varchar(50) default NULL,
  pg_typedata varchar(255) default NULL,
  pg_istitle tinyint(4) default NULL,
  pg_ispageable tinyint(4) default NULL,
  pg_issearchable tinyint(4) default '1',
  pg_lineno int(11) NOT NULL default '0',
  PRIMARY KEY  (pg_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pagesetter_pubfields`
--


--
-- Table structure for table `os_core_pagesetter_pubheader`
--

DROP TABLE IF EXISTS os_core_pagesetter_pubheader;
CREATE TABLE os_core_pagesetter_pubheader (
  pg_tid int(11) NOT NULL default '0',
  pg_pid int(11) NOT NULL default '0',
  pg_hitcount int(11) NOT NULL default '0',
  pg_onlineid int(11) default NULL,
  pg_deleted tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (pg_tid,pg_pid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pagesetter_pubheader`
--


--
-- Table structure for table `os_core_pagesetter_pubtypes`
--

DROP TABLE IF EXISTS os_core_pagesetter_pubtypes;
CREATE TABLE os_core_pagesetter_pubtypes (
  pg_id int(11) NOT NULL auto_increment,
  pg_authorid int(11) NOT NULL default '0',
  pg_createddate date NOT NULL default '0000-00-00',
  pg_title varchar(255) default NULL,
  pg_filename varchar(100) default NULL,
  pg_formname varchar(100) default NULL,
  pg_description varchar(255) default NULL,
  pg_listcount int(11) default NULL,
  pg_sortfield1 varchar(255) default NULL,
  pg_sortdesc1 tinyint(4) default NULL,
  pg_sortfield2 varchar(255) default NULL,
  pg_sortdesc2 tinyint(4) default NULL,
  pg_sortfield3 varchar(255) default NULL,
  pg_sortdesc3 tinyint(4) default NULL,
  pg_defaultFilter varchar(255) default NULL,
  pg_enablehooks tinyint(4) default '1',
  pg_workflow varchar(255) default 'standard',
  pg_enablerevisions tinyint(4) default '1',
  pg_enableeditown tinyint(4) default '0',
  pg_enabletopicaccess tinyint(4) default '0',
  pg_defaultFolder int(11) default NULL,
  pg_defaultSubFolder varchar(255) default NULL,
  pg_defaultFolderTopic int(11) default NULL,
  PRIMARY KEY  (pg_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pagesetter_pubtypes`
--


--
-- Table structure for table `os_core_pagesetter_revisions`
--

DROP TABLE IF EXISTS os_core_pagesetter_revisions;
CREATE TABLE os_core_pagesetter_revisions (
  pg_tid int(11) NOT NULL default '0',
  pg_id int(11) NOT NULL default '0',
  pg_pid int(11) NOT NULL default '0',
  pg_prevversion int(11) NOT NULL default '0',
  pg_user int(11) NOT NULL default '0',
  pg_timestamp datetime default NULL,
  PRIMARY KEY  (pg_tid,pg_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pagesetter_revisions`
--


--
-- Table structure for table `os_core_pagesetter_session`
--

DROP TABLE IF EXISTS os_core_pagesetter_session;
CREATE TABLE os_core_pagesetter_session (
  pg_sessionid varchar(50) NOT NULL default '',
  pg_cache mediumblob NOT NULL,
  pg_lastused date NOT NULL default '0000-00-00',
  PRIMARY KEY  (pg_sessionid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pagesetter_session`
--


--
-- Table structure for table `os_core_pagesetter_wfcfg`
--

DROP TABLE IF EXISTS os_core_pagesetter_wfcfg;
CREATE TABLE os_core_pagesetter_wfcfg (
  pg_workflow varchar(100) NOT NULL default '',
  pg_tid int(11) NOT NULL default '0',
  pg_setting varchar(100) NOT NULL default '',
  pg_value text,
  PRIMARY KEY  (pg_workflow,pg_tid,pg_setting)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pagesetter_wfcfg`
--


--
-- Table structure for table `os_core_photoshare_access`
--

DROP TABLE IF EXISTS os_core_photoshare_access;
CREATE TABLE os_core_photoshare_access (
  ps_accessid int(11) NOT NULL auto_increment,
  ps_folder int(11) NOT NULL default '0',
  ps_kind tinyint(4) NOT NULL default '0',
  ps_access tinyint(4) NOT NULL default '0',
  ps_id int(11) NOT NULL default '0',
  PRIMARY KEY  (ps_accessid),
  KEY ps_folder (ps_folder)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_photoshare_access`
--


--
-- Table structure for table `os_core_photoshare_folders`
--

DROP TABLE IF EXISTS os_core_photoshare_folders;
CREATE TABLE os_core_photoshare_folders (
  ps_id int(11) NOT NULL auto_increment,
  ps_owner int(11) NOT NULL default '0',
  ps_createddate datetime NOT NULL default '0000-00-00 00:00:00',
  ps_modifieddate timestamp NOT NULL,
  ps_title varchar(255) default NULL,
  ps_description text,
  ps_topic int(11) NOT NULL default '0',
  ps_template varchar(255) NOT NULL default 'slideshow',
  ps_blockfromlist tinyint(1) NOT NULL default '0',
  ps_hidepnframe tinyint(1) NOT NULL default '0',
  ps_parentfolder int(11) NOT NULL default '0',
  ps_accesslevel smallint(6) NOT NULL default '0',
  ps_viewkey varchar(32) default NULL,
  ps_mainimage int(11) default NULL,
  PRIMARY KEY  (ps_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_photoshare_folders`
--


--
-- Table structure for table `os_core_photoshare_images`
--

DROP TABLE IF EXISTS os_core_photoshare_images;
CREATE TABLE os_core_photoshare_images (
  ps_id int(11) NOT NULL auto_increment,
  ps_owner int(11) NOT NULL default '0',
  ps_filename varchar(255) NOT NULL default '',
  ps_mimetype varchar(255) NOT NULL default '',
  ps_createddate datetime NOT NULL default '0000-00-00 00:00:00',
  ps_modifieddate timestamp NOT NULL,
  ps_title varchar(255) default NULL,
  ps_description text,
  ps_extra1 varchar(255) default NULL,
  ps_extra2 varchar(255) default NULL,
  ps_extra3 varchar(255) default NULL,
  ps_extra4 varchar(255) default NULL,
  ps_extra5 varchar(255) default NULL,
  ps_extra6 varchar(255) default NULL,
  ps_parentfolder int(11) NOT NULL default '0',
  ps_imagedata longblob NOT NULL,
  ps_thumbnaildata longblob NOT NULL,
  ps_xsize smallint(6) NOT NULL default '0',
  ps_ysize smallint(6) NOT NULL default '0',
  ps_bytesize int(11) NOT NULL default '0',
  ps_position int(11) NOT NULL default '0',
  PRIMARY KEY  (ps_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_photoshare_images`
--


--
-- Table structure for table `os_core_photoshare_setup`
--

DROP TABLE IF EXISTS os_core_photoshare_setup;
CREATE TABLE os_core_photoshare_setup (
  ps_setupid int(11) NOT NULL auto_increment,
  ps_kind tinyint(4) NOT NULL default '0',
  ps_storage int(11) NOT NULL default '0',
  ps_id int(11) NOT NULL default '0',
  PRIMARY KEY  (ps_setupid),
  KEY ps_kind (ps_kind,ps_storage)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_photoshare_setup`
--


--
-- Table structure for table `os_core_pnSkype_user`
--

DROP TABLE IF EXISTS os_core_pnSkype_user;
CREATE TABLE os_core_pnSkype_user (
  pn_skypeid int(11) NOT NULL auto_increment,
  pn_skypename varchar(40) default '0',
  pn_username varchar(40) default '0',
  pn_userdetails varchar(254) NOT NULL default '',
  PRIMARY KEY  (pn_skypeid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pnSkype_user`
--


--
-- Table structure for table `os_core_pn_bbclick_counter`
--

DROP TABLE IF EXISTS os_core_pn_bbclick_counter;
CREATE TABLE os_core_pn_bbclick_counter (
  cnt_id int(10) NOT NULL auto_increment,
  cnt_url varchar(255) default NULL,
  cnt_counter int(10) default NULL,
  cnt_lastclick int(10) default NULL,
  PRIMARY KEY  (cnt_id),
  KEY cnt_url (cnt_url)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pn_bbclick_counter`
--


--
-- Table structure for table `os_core_pnforum_categories`
--

DROP TABLE IF EXISTS os_core_pnforum_categories;
CREATE TABLE os_core_pnforum_categories (
  cat_id int(10) NOT NULL auto_increment,
  cat_title varchar(100) default NULL,
  cat_order varchar(10) default NULL,
  PRIMARY KEY  (cat_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pnforum_categories`
--


--
-- Table structure for table `os_core_pnforum_forum_favorites`
--

DROP TABLE IF EXISTS os_core_pnforum_forum_favorites;
CREATE TABLE os_core_pnforum_forum_favorites (
  forum_id int(10) NOT NULL default '0',
  user_id int(10) NOT NULL default '0',
  PRIMARY KEY  (forum_id,user_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pnforum_forum_favorites`
--


--
-- Table structure for table `os_core_pnforum_forum_mods`
--

DROP TABLE IF EXISTS os_core_pnforum_forum_mods;
CREATE TABLE os_core_pnforum_forum_mods (
  forum_id int(10) NOT NULL default '0',
  user_id int(10) NOT NULL default '0',
  KEY forum_id (forum_id),
  KEY user_id (user_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pnforum_forum_mods`
--


--
-- Table structure for table `os_core_pnforum_forums`
--

DROP TABLE IF EXISTS os_core_pnforum_forums;
CREATE TABLE os_core_pnforum_forums (
  forum_id int(10) NOT NULL auto_increment,
  forum_name varchar(150) default NULL,
  forum_desc text,
  forum_access int(10) default '1',
  forum_topics int(10) unsigned NOT NULL default '0',
  forum_posts int(10) unsigned NOT NULL default '0',
  forum_last_post_id int(10) unsigned NOT NULL default '0',
  cat_id int(10) default NULL,
  forum_type int(10) default '0',
  forum_order mediumint(8) unsigned default NULL,
  forum_pop3_active int(1) NOT NULL default '0',
  forum_pop3_server varchar(60) default NULL,
  forum_pop3_port int(5) NOT NULL default '110',
  forum_pop3_login varchar(60) default NULL,
  forum_pop3_password varchar(60) default NULL,
  forum_pop3_interval int(4) NOT NULL default '0',
  forum_pop3_lastconnect int(11) NOT NULL default '0',
  forum_pop3_pnuser varchar(60) default NULL,
  forum_pop3_pnpassword varchar(40) default NULL,
  forum_pop3_matchstring varchar(255) default NULL,
  forum_moduleref int(11) default NULL,
  forum_pntopic tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (forum_id),
  KEY forum_last_post_id (forum_last_post_id),
  KEY forum_moduleref (forum_moduleref)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pnforum_forums`
--


--
-- Table structure for table `os_core_pnforum_posts`
--

DROP TABLE IF EXISTS os_core_pnforum_posts;
CREATE TABLE os_core_pnforum_posts (
  post_id int(10) NOT NULL auto_increment,
  topic_id int(10) NOT NULL default '0',
  forum_id int(10) NOT NULL default '0',
  poster_id int(10) NOT NULL default '0',
  post_time varchar(20) default NULL,
  poster_ip varchar(16) default NULL,
  post_msgid varchar(100) default NULL,
  PRIMARY KEY  (post_id),
  KEY post_id (post_id),
  KEY forum_id (forum_id),
  KEY topic_id (topic_id),
  KEY poster_id (poster_id),
  KEY post_msgid (post_msgid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pnforum_posts`
--


--
-- Table structure for table `os_core_pnforum_posts_text`
--

DROP TABLE IF EXISTS os_core_pnforum_posts_text;
CREATE TABLE os_core_pnforum_posts_text (
  post_id int(10) NOT NULL default '0',
  post_text text,
  PRIMARY KEY  (post_id),
  FULLTEXT KEY post_text (post_text)
) TYPE=MyISAM;

--
-- Dumping data for table `os_core_pnforum_posts_text`
--


--
-- Table structure for table `os_core_pnforum_ranks`
--

DROP TABLE IF EXISTS os_core_pnforum_ranks;
CREATE TABLE os_core_pnforum_ranks (
  rank_id int(10) NOT NULL auto_increment,
  rank_title varchar(50) NOT NULL default '',
  rank_min int(10) NOT NULL default '0',
  rank_max int(10) NOT NULL default '0',
  rank_special int(2) default '0',
  rank_image varchar(255) default NULL,
  rank_style varchar(255) NOT NULL default '',
  PRIMARY KEY  (rank_id),
  KEY rank_min (rank_min),
  KEY rank_max (rank_max)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pnforum_ranks`
--


--
-- Table structure for table `os_core_pnforum_subscription`
--

DROP TABLE IF EXISTS os_core_pnforum_subscription;
CREATE TABLE os_core_pnforum_subscription (
  msg_id int(10) NOT NULL auto_increment,
  forum_id int(10) NOT NULL default '0',
  user_id int(10) NOT NULL default '0',
  PRIMARY KEY  (msg_id),
  KEY forum_id (forum_id),
  KEY user_id (user_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pnforum_subscription`
--


--
-- Table structure for table `os_core_pnforum_topic_subscription`
--

DROP TABLE IF EXISTS os_core_pnforum_topic_subscription;
CREATE TABLE os_core_pnforum_topic_subscription (
  topic_id int(10) NOT NULL default '0',
  forum_id int(10) NOT NULL default '0',
  user_id int(10) NOT NULL default '0',
  KEY topic_id (topic_id),
  KEY forum_id (forum_id),
  KEY user_id (user_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pnforum_topic_subscription`
--


--
-- Table structure for table `os_core_pnforum_topics`
--

DROP TABLE IF EXISTS os_core_pnforum_topics;
CREATE TABLE os_core_pnforum_topics (
  topic_id int(10) NOT NULL auto_increment,
  topic_title varchar(255) default NULL,
  topic_poster int(10) default NULL,
  topic_time varchar(20) default NULL,
  topic_views int(10) NOT NULL default '0',
  topic_replies int(10) unsigned NOT NULL default '0',
  topic_last_post_id int(10) unsigned NOT NULL default '0',
  forum_id int(10) NOT NULL default '0',
  topic_status int(10) NOT NULL default '0',
  topic_notify int(2) default '0',
  sticky tinyint(3) unsigned NOT NULL default '0',
  sticky_label varchar(255) default NULL,
  poll_id int(10) unsigned NOT NULL default '0',
  topic_reference varchar(60) default NULL,
  PRIMARY KEY  (topic_id),
  KEY forum_id (forum_id),
  KEY topic_last_post_id (topic_last_post_id),
  KEY topic_reference (topic_reference),
  FULLTEXT KEY topic_title (topic_title)
) TYPE=MyISAM;

--
-- Dumping data for table `os_core_pnforum_topics`
--


--
-- Table structure for table `os_core_pnforum_users`
--

DROP TABLE IF EXISTS os_core_pnforum_users;
CREATE TABLE os_core_pnforum_users (
  user_id int(10) unsigned NOT NULL default '0',
  user_posts int(10) unsigned NOT NULL default '0',
  user_rank int(10) unsigned NOT NULL default '0',
  user_level int(10) unsigned NOT NULL default '1',
  user_lastvisit timestamp NOT NULL,
  user_favorites int(1) NOT NULL default '0',
  user_post_order int(1) NOT NULL default '0',
  PRIMARY KEY  (user_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pnforum_users`
--


--
-- Table structure for table `os_core_pngroups`
--

DROP TABLE IF EXISTS os_core_pngroups;
CREATE TABLE os_core_pngroups (
  pn_gid int(11) default NULL,
  pn_type varchar(25) default '',
  pn_description varchar(200) default '',
  pn_prefix varchar(25) default '',
  pn_state int(1) default '0',
  pn_nbuser int(11) default '0',
  pn_nbumax int(11) default '0',
  pn_link int(11) default '0',
  pn_uidmaster int(11) default '0',
  KEY pncGIndex (pn_gid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pngroups`
--

INSERT INTO os_core_pngroups VALUES (1,'-1','','',0,0,0,0,0);
INSERT INTO os_core_pngroups VALUES (2,'-1','','',0,0,0,0,0);

--
-- Table structure for table `os_core_pngroups_applications`
--

DROP TABLE IF EXISTS os_core_pngroups_applications;
CREATE TABLE os_core_pngroups_applications (
  pn_app_id int(11) NOT NULL auto_increment,
  pn_uid int(11) default '0',
  pn_gid int(11) default '0',
  pn_application longblob,
  pn_status int(1) default '0',
  PRIMARY KEY  (pn_app_id),
  KEY pncGAppIndex (pn_app_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pngroups_applications`
--


--
-- Table structure for table `os_core_poll_check`
--

DROP TABLE IF EXISTS os_core_poll_check;
CREATE TABLE os_core_poll_check (
  pn_ip varchar(20) NOT NULL default '',
  pn_time varchar(14) NOT NULL default ''
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_poll_check`
--


--
-- Table structure for table `os_core_poll_data`
--

DROP TABLE IF EXISTS os_core_poll_data;
CREATE TABLE os_core_poll_data (
  pn_pollid int(11) NOT NULL default '0',
  pn_optiontext char(50) NOT NULL default '',
  pn_optioncount int(11) NOT NULL default '0',
  pn_voteid int(11) NOT NULL default '0',
  KEY idx_pollid (pn_pollid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_poll_data`
--

INSERT INTO os_core_poll_data VALUES (2,'',0,12);
INSERT INTO os_core_poll_data VALUES (2,'',0,11);
INSERT INTO os_core_poll_data VALUES (2,'',0,10);
INSERT INTO os_core_poll_data VALUES (2,'',0,9);
INSERT INTO os_core_poll_data VALUES (2,'',0,8);
INSERT INTO os_core_poll_data VALUES (2,'',0,7);
INSERT INTO os_core_poll_data VALUES (2,'',0,6);
INSERT INTO os_core_poll_data VALUES (2,'',0,5);
INSERT INTO os_core_poll_data VALUES (2,'',0,4);
INSERT INTO os_core_poll_data VALUES (2,'Think? I use it!',0,3);
INSERT INTO os_core_poll_data VALUES (2,'It is what was needed.',0,2);
INSERT INTO os_core_poll_data VALUES (2,'What is PostNuke ?',0,1);

--
-- Table structure for table `os_core_poll_desc`
--

DROP TABLE IF EXISTS os_core_poll_desc;
CREATE TABLE os_core_poll_desc (
  pn_pollid int(11) NOT NULL auto_increment,
  pn_title varchar(100) NOT NULL default '',
  pn_timestamp int(11) NOT NULL default '0',
  pn_voters mediumint(9) NOT NULL default '0',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_pollid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_poll_desc`
--

INSERT INTO os_core_poll_desc VALUES (2,'What do you think of PostNuke?',995385085,0,'');

--
-- Table structure for table `os_core_pollcomments`
--

DROP TABLE IF EXISTS os_core_pollcomments;
CREATE TABLE os_core_pollcomments (
  pn_tid int(11) NOT NULL auto_increment,
  pn_pid int(11) default '0',
  pn_pollid int(11) default '0',
  pn_date datetime default NULL,
  pn_name varchar(60) NOT NULL default '',
  pn_email varchar(60) default NULL,
  pn_url varchar(254) default NULL,
  pn_host_name varchar(60) default NULL,
  pn_subject varchar(60) NOT NULL default '',
  pn_comment text NOT NULL,
  pn_score tinyint(4) NOT NULL default '0',
  pn_reason tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (pn_tid),
  KEY idx_pollid (pn_pollid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_pollcomments`
--


--
-- Table structure for table `os_core_postcalendar_categories`
--

DROP TABLE IF EXISTS os_core_postcalendar_categories;
CREATE TABLE os_core_postcalendar_categories (
  pc_catid int(11) unsigned NOT NULL auto_increment,
  pc_catname varchar(100) NOT NULL default 'Undefined',
  pc_catcolor varchar(50) NOT NULL default '#FF0000',
  pc_catdesc text,
  PRIMARY KEY  (pc_catid),
  KEY basic_cat (pc_catname,pc_catcolor)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_postcalendar_categories`
--

INSERT INTO os_core_postcalendar_categories VALUES (1,'Default','#ff0000','Default Category');

--
-- Table structure for table `os_core_postcalendar_events`
--

DROP TABLE IF EXISTS os_core_postcalendar_events;
CREATE TABLE os_core_postcalendar_events (
  pc_eid int(11) unsigned NOT NULL auto_increment,
  pc_catid int(11) NOT NULL default '0',
  pc_aid varchar(30) NOT NULL default '',
  pc_title varchar(150) default '',
  pc_time datetime default NULL,
  pc_hometext text,
  pc_comments int(11) default '0',
  pc_counter mediumint(8) unsigned default '0',
  pc_topic int(3) NOT NULL default '1',
  pc_informant varchar(20) NOT NULL default '',
  pc_eventDate date NOT NULL default '0000-00-00',
  pc_endDate date NOT NULL default '0000-00-00',
  pc_duration bigint(20) NOT NULL default '0',
  pc_recurrtype int(1) NOT NULL default '0',
  pc_recurrspec text,
  pc_recurrfreq int(3) NOT NULL default '0',
  pc_startTime time default NULL,
  pc_endTime time default NULL,
  pc_alldayevent int(1) NOT NULL default '0',
  pc_location text,
  pc_conttel varchar(50) default '',
  pc_contname varchar(50) default '',
  pc_contemail varchar(255) default '',
  pc_website varchar(255) default '',
  pc_fee varchar(50) default '',
  pc_eventstatus int(11) NOT NULL default '0',
  pc_sharing int(11) NOT NULL default '0',
  pc_language varchar(30) default '',
  pc_meeting_id int(11) default '0',
  PRIMARY KEY  (pc_eid),
  KEY basic_event (pc_catid,pc_aid,pc_eventDate,pc_endDate,pc_eventstatus,pc_sharing,pc_topic)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_postcalendar_events`
--

INSERT INTO os_core_postcalendar_events VALUES (1,1,'2','Test','2006-05-28 12:02:37',':text:sfsdf',0,0,0,'admin','2006-05-15','0000-00-00',3600,0,'a:5:{s:17:\"event_repeat_freq\";s:1:\"1\";s:22:\"event_repeat_freq_type\";s:1:\"1\";s:19:\"event_repeat_on_num\";s:1:\"1\";s:19:\"event_repeat_on_day\";s:1:\"1\";s:20:\"event_repeat_on_freq\";N;}',0,'01:00:00',NULL,0,'a:6:{s:14:\"event_location\";s:41:\"SampleCorp / Remote Branch Office SIberia\";s:13:\"event_street1\";s:14:\"De Iktarwg. 71\";s:13:\"event_street2\";s:0:\"\";s:10:\"event_city\";s:8:\"Budapest\";s:11:\"event_state\";s:2:\"HU\";s:12:\"event_postal\";s:5:\"76236\";}','+49-113-665452','Gabor Bethlen','bg@samplecorp.com','','',1,1,'',0);

--
-- Table structure for table `os_core_postguestbook_gb`
--

DROP TABLE IF EXISTS os_core_postguestbook_gb;
CREATE TABLE os_core_postguestbook_gb (
  gb_id int(11) NOT NULL auto_increment,
  gb_owner_uid int(11) NOT NULL default '-1',
  gb_name varchar(255) NOT NULL default '',
  gb_email varchar(150) default NULL,
  gb_ip varchar(50) default NULL,
  gb_message text NOT NULL,
  gb_comment text,
  gb_homepage varchar(255) default NULL,
  gb_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  gb_members int(11) NOT NULL default '0',
  gb_private_msg int(11) NOT NULL default '0',
  gb_location varchar(128) default NULL,
  gb_mood varchar(128) default NULL,
  gb_user1 varchar(255) default NULL,
  gb_user2 varchar(255) default NULL,
  gb_user3 varchar(255) default NULL,
  gb_user4 varchar(255) default NULL,
  gb_user5 varchar(255) default NULL,
  gb_disable_html char(1) NOT NULL default 'N',
  gb_disable_bbcode char(1) NOT NULL default 'N',
  gb_disable_autolinks char(1) NOT NULL default 'N',
  gb_pn_uid int(11) default NULL,
  PRIMARY KEY  (gb_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_postguestbook_gb`
--


--
-- Table structure for table `os_core_postwrap_url`
--

DROP TABLE IF EXISTS os_core_postwrap_url;
CREATE TABLE os_core_postwrap_url (
  id int(11) NOT NULL auto_increment,
  name varchar(255) NOT NULL default '',
  alias varchar(50) NOT NULL default '',
  reg_user_only tinyint(2) default NULL,
  open_direct tinyint(2) default NULL,
  use_fixed_title tinyint(2) default NULL,
  auto_resize tinyint(2) default NULL,
  vsize int(50) default NULL,
  hsize varchar(5) default NULL,
  PRIMARY KEY  (id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_postwrap_url`
--


--
-- Table structure for table `os_core_priv_msgs`
--

DROP TABLE IF EXISTS os_core_priv_msgs;
CREATE TABLE os_core_priv_msgs (
  pn_msg_id int(11) NOT NULL auto_increment,
  pn_msg_image varchar(100) NOT NULL default '',
  pn_subject varchar(100) default '',
  pn_from_userid int(11) NOT NULL default '0',
  pn_to_userid int(11) NOT NULL default '0',
  pn_msg_time varchar(20) default '',
  pn_msg_text text,
  pn_read_msg int(4) NOT NULL default '0',
  PRIMARY KEY  (pn_msg_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_priv_msgs`
--


--
-- Table structure for table `os_core_queue`
--

DROP TABLE IF EXISTS os_core_queue;
CREATE TABLE os_core_queue (
  pn_qid smallint(5) unsigned NOT NULL auto_increment,
  pn_uid mediumint(9) NOT NULL default '0',
  pn_arcd tinyint(1) NOT NULL default '0',
  pn_uname varchar(40) NOT NULL default '',
  pn_subject varchar(255) NOT NULL default '',
  pn_story text,
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_topic varchar(20) NOT NULL default '',
  pn_language varchar(30) NOT NULL default '',
  pn_bodytext text,
  PRIMARY KEY  (pn_qid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_queue`
--


--
-- Table structure for table `os_core_quotes`
--

DROP TABLE IF EXISTS os_core_quotes;
CREATE TABLE os_core_quotes (
  pn_qid int(10) NOT NULL auto_increment,
  pn_quote text,
  pn_author varchar(150) NOT NULL default '',
  PRIMARY KEY  (pn_qid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_quotes`
--


--
-- Table structure for table `os_core_ratings`
--

DROP TABLE IF EXISTS os_core_ratings;
CREATE TABLE os_core_ratings (
  pn_rid int(10) NOT NULL auto_increment,
  pn_module varchar(32) NOT NULL default '',
  pn_itemid varchar(64) NOT NULL default '',
  pn_ratingtype varchar(64) NOT NULL default '',
  pn_rating double(6,5) NOT NULL default '0.00000',
  pn_numratings int(5) NOT NULL default '1',
  PRIMARY KEY  (pn_rid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_ratings`
--


--
-- Table structure for table `os_core_ratingslog`
--

DROP TABLE IF EXISTS os_core_ratingslog;
CREATE TABLE os_core_ratingslog (
  pn_id varchar(32) NOT NULL default '',
  pn_ratingid varchar(64) NOT NULL default '',
  pn_rating int(3) NOT NULL default '0'
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_ratingslog`
--


--
-- Table structure for table `os_core_realms`
--

DROP TABLE IF EXISTS os_core_realms;
CREATE TABLE os_core_realms (
  pn_rid int(11) NOT NULL auto_increment,
  pn_name varchar(255) NOT NULL default '',
  PRIMARY KEY  (pn_rid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_realms`
--


--
-- Table structure for table `os_core_referer`
--

DROP TABLE IF EXISTS os_core_referer;
CREATE TABLE os_core_referer (
  pn_rid int(11) NOT NULL auto_increment,
  pn_url varchar(254) NOT NULL default '',
  pn_frequency int(15) default NULL,
  PRIMARY KEY  (pn_rid),
  KEY pn_url (pn_url),
  KEY idx_url (pn_url)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_referer`
--


--
-- Table structure for table `os_core_related`
--

DROP TABLE IF EXISTS os_core_related;
CREATE TABLE os_core_related (
  pn_rid int(11) NOT NULL auto_increment,
  pn_tid int(11) NOT NULL default '0',
  pn_name varchar(30) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  PRIMARY KEY  (pn_rid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_related`
--


--
-- Table structure for table `os_core_reviews`
--

DROP TABLE IF EXISTS os_core_reviews;
CREATE TABLE os_core_reviews (
  pn_id int(11) NOT NULL auto_increment,
  pn_date datetime NOT NULL default '0000-00-00 00:00:00',
  pn_title varchar(150) NOT NULL default '',
  pn_text text NOT NULL,
  pn_reviewer varchar(20) default NULL,
  pn_email varchar(60) default NULL,
  pn_score int(11) NOT NULL default '0',
  pn_cover varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_url_title varchar(150) NOT NULL default '',
  pn_hits int(11) NOT NULL default '0',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_reviews`
--


--
-- Table structure for table `os_core_reviews_add`
--

DROP TABLE IF EXISTS os_core_reviews_add;
CREATE TABLE os_core_reviews_add (
  pn_id int(11) NOT NULL auto_increment,
  pn_date datetime default NULL,
  pn_title varchar(150) NOT NULL default '',
  pn_text text NOT NULL,
  pn_reviewer varchar(20) NOT NULL default '',
  pn_email varchar(60) default NULL,
  pn_score int(11) NOT NULL default '0',
  pn_url varchar(254) NOT NULL default '',
  pn_url_title varchar(150) NOT NULL default '',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_reviews_add`
--


--
-- Table structure for table `os_core_reviews_comments`
--

DROP TABLE IF EXISTS os_core_reviews_comments;
CREATE TABLE os_core_reviews_comments (
  pn_cid int(11) NOT NULL auto_increment,
  pn_rid int(11) NOT NULL default '0',
  pn_userid varchar(25) NOT NULL default '',
  pn_date datetime default NULL,
  pn_comments text,
  pn_score int(11) NOT NULL default '0',
  PRIMARY KEY  (pn_cid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_reviews_comments`
--


--
-- Table structure for table `os_core_reviews_main`
--

DROP TABLE IF EXISTS os_core_reviews_main;
CREATE TABLE os_core_reviews_main (
  pn_title varchar(100) default NULL,
  pn_description text
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_reviews_main`
--

INSERT INTO os_core_reviews_main VALUES ('Reviews Section Title','Reviews Section Long Description');

--
-- Table structure for table `os_core_seccont`
--

DROP TABLE IF EXISTS os_core_seccont;
CREATE TABLE os_core_seccont (
  pn_artid int(11) NOT NULL auto_increment,
  pn_secid int(11) NOT NULL default '0',
  pn_title text NOT NULL,
  pn_content text NOT NULL,
  pn_counter int(11) NOT NULL default '0',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_artid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_seccont`
--


--
-- Table structure for table `os_core_sections`
--

DROP TABLE IF EXISTS os_core_sections;
CREATE TABLE os_core_sections (
  pn_secid int(11) NOT NULL auto_increment,
  pn_secname varchar(40) NOT NULL default '',
  pn_image varchar(50) NOT NULL default '',
  PRIMARY KEY  (pn_secid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_sections`
--


--
-- Table structure for table `os_core_session_info`
--

DROP TABLE IF EXISTS os_core_session_info;
CREATE TABLE os_core_session_info (
  pn_sessid varchar(32) NOT NULL default '',
  pn_ipaddr varchar(20) NOT NULL default '',
  pn_firstused int(11) NOT NULL default '0',
  pn_lastused int(11) NOT NULL default '0',
  pn_uid int(11) NOT NULL default '0',
  pn_vars longblob,
  PRIMARY KEY  (pn_sessid),
  KEY idx_last (pn_lastused)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_session_info`
--


--
-- Table structure for table `os_core_snakepending`
--

DROP TABLE IF EXISTS os_core_snakepending;
CREATE TABLE os_core_snakepending (
  pn_pend_id int(10) NOT NULL auto_increment,
  pn_pend_url varchar(255) NOT NULL default '',
  pn_pend_Name varchar(255) NOT NULL default '',
  pn_pend_SQL varchar(255) NOT NULL default '',
  PRIMARY KEY  (pn_pend_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_snakepending`
--

INSERT INTO os_core_snakepending VALUES (1,'admin.php?module=CmodsDownload&op=main','Downloads (new)','SELECT count(*) FROM os_core_cmodsdownload_newdownload');
INSERT INTO os_core_snakepending VALUES (2,'admin.php?module=CmodsDownload&op=main','Downloads (modified)','SELECT count(*) FROM  os_core_cmodsdownload_modrequest');
INSERT INTO os_core_snakepending VALUES (3,'admin.php?module=FAQ&op=FaqCatUnanswered','FAQ (unanswered)','SELECT count(*) FROM os_core_faqanswer where pn_answer=\'\'');
INSERT INTO os_core_snakepending VALUES (5,'admin.php?module=NS-Referers&op=main','Referers','SELECT count(*) FROM os_core_referer');
INSERT INTO os_core_snakepending VALUES (6,'admin.php?module=Reviews&op=main','Reviews','SELECT count(*) FROM os_core_reviews');
INSERT INTO os_core_snakepending VALUES (7,'admin.php?module=Reviews&op=main','Reviews (waiting)','SELECT count(*) FROM os_core_reviews_add');
INSERT INTO os_core_snakepending VALUES (8,'admin.php?module=AddStory&op=submissions','Stories (waiting)','SELECT count(*) FROM os_core_queue WHERE pn_arcd=0');
INSERT INTO os_core_snakepending VALUES (9,'admin.php?module=Sections&op=main','Stories (Sections)','SELECT count(*) FROM os_core_seccont');
INSERT INTO os_core_snakepending VALUES (10,'admin.php?module=CmodsWebLinks','Web_Links (new)','SELECT count(*) FROM os_core_cmodsweblinks_newlink');
INSERT INTO os_core_snakepending VALUES (11,'admin.php?module=CmodsWebLinks&op=main','Web_Links (modified)','SELECT count(*) FROM os_core_cmodsweblinks_modrequest');
INSERT INTO os_core_snakepending VALUES (12,'admin.php?module=CmodsWebLinks&op=LinksListBrokenLinks','Web_Links (broken)','SELECT count(*) FROM os_core_cmodsweblinks_modrequest WHERE pn_brokenlink=1');
INSERT INTO os_core_snakepending VALUES (13,'admin.php?module=CmodsWebLinks&op=LinksListModRequests','Web_Links (modified)','SELECT count(*) FROM os_core_cmodsweblinks_modrequest WHERE pn_brokenlink=0');
INSERT INTO os_core_snakepending VALUES (14,'index.php?module=statistics&func=main','Statistics (Hits)','SELECT pn_count FROM os_core_counter WHERE pn_var like \'hits\'');

--
-- Table structure for table `os_core_stats_archive`
--

DROP TABLE IF EXISTS os_core_stats_archive;
CREATE TABLE os_core_stats_archive (
  pn_id int(8) NOT NULL auto_increment,
  pn_key varchar(255) default '',
  pn_host varchar(255) default '',
  pn_requrl varchar(255) default '',
  pn_http_referer varchar(255) default '',
  pn_ip varchar(15) default '',
  pn_hostip varchar(99) default '',
  pn_os varchar(15) default '',
  pn_browser varchar(15) default '',
  pn_uname varchar(25) default '',
  pn_uid int(4) default '0',
  pn_sessionid varchar(64) default '',
  pn_postdata varchar(255) default '',
  pn_browserdata varchar(255) default '',
  pn_count smallint(5) unsigned default '0',
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_summary_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (pn_id),
  KEY `timestamp` (pn_timestamp),
  KEY username (pn_uname),
  KEY sessionid (pn_sessionid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_stats_archive`
--


--
-- Table structure for table `os_core_stats_details`
--

DROP TABLE IF EXISTS os_core_stats_details;
CREATE TABLE os_core_stats_details (
  pn_id int(8) NOT NULL auto_increment,
  pn_key varchar(255) default '',
  pn_host varchar(255) default '',
  pn_requrl varchar(255) default '',
  pn_http_referer varchar(255) default '',
  pn_ip varchar(15) default '',
  pn_hostip varchar(99) default '',
  pn_os varchar(15) default '',
  pn_browser varchar(15) default '',
  pn_uname varchar(25) default '',
  pn_uid int(4) default '0',
  pn_sessionid varchar(64) default '',
  pn_postdata varchar(255) default '',
  pn_browserdata varchar(255) default '',
  pn_count smallint(5) unsigned default '0',
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_summary_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (pn_id),
  KEY `timestamp` (pn_timestamp),
  KEY username (pn_uname),
  KEY sessionid (pn_sessionid),
  KEY idx_timestamp (pn_timestamp),
  KEY idx_summary_timestamp (pn_summary_timestamp)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_stats_details`
--


--
-- Table structure for table `os_core_stats_reports`
--

DROP TABLE IF EXISTS os_core_stats_reports;
CREATE TABLE os_core_stats_reports (
  pn_id int(11) NOT NULL auto_increment,
  pn_name text NOT NULL,
  pn_desc text NOT NULL,
  pn_table text NOT NULL,
  pn_start text NOT NULL,
  pn_end text NOT NULL,
  pn_vars text NOT NULL,
  PRIMARY KEY  (pn_id),
  UNIQUE KEY name (pn_name(24))
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_stats_reports`
--

INSERT INTO os_core_stats_reports VALUES (1,'Classic','A report similar to the old Stats module.','stats_details','sitestart','today','ta=details|ps=1|cs=1|csp=monthly|br=1|os=1|hd=1|dw=1|gv=1|gvp=monthly|detp=monthly|hic=10|ptc=10|dtc=10|ltc=10|rac=10|re=1|rec=10|epc=10|sdc=10|udu=every|ueu=every|');

--
-- Table structure for table `os_core_stats_summary`
--

DROP TABLE IF EXISTS os_core_stats_summary;
CREATE TABLE os_core_stats_summary (
  pn_id int(8) NOT NULL auto_increment,
  pn_key varchar(255) default '',
  pn_host varchar(255) default '',
  pn_requrl varchar(255) default '',
  pn_http_referer varchar(255) default '',
  pn_ip varchar(15) default '',
  pn_hostip varchar(99) default '',
  pn_os varchar(15) default '',
  pn_browser varchar(15) default '',
  pn_uname varchar(25) default '',
  pn_uid int(4) default '0',
  pn_sessionid varchar(64) default '',
  pn_postdata varchar(255) default '',
  pn_browserdata varchar(255) default '',
  pn_count smallint(5) unsigned default '0',
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_summary_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (pn_id),
  KEY `timestamp` (pn_timestamp),
  KEY username (pn_uname),
  KEY sessionid (pn_sessionid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_stats_summary`
--


--
-- Table structure for table `os_core_stories`
--

DROP TABLE IF EXISTS os_core_stories;
CREATE TABLE os_core_stories (
  pn_sid int(11) NOT NULL auto_increment,
  pn_catid int(11) NOT NULL default '0',
  pn_aid varchar(30) NOT NULL default '',
  pn_title varchar(255) default NULL,
  pn_time datetime default NULL,
  pn_hometext text,
  pn_bodytext text NOT NULL,
  pn_comments int(11) default '0',
  pn_counter mediumint(8) unsigned default NULL,
  pn_topic tinyint(4) NOT NULL default '1',
  pn_informant varchar(20) NOT NULL default '',
  pn_notes text NOT NULL,
  pn_ihome tinyint(1) NOT NULL default '0',
  pn_themeoverride varchar(30) NOT NULL default '',
  pn_language varchar(30) NOT NULL default '',
  pn_withcomm tinyint(1) NOT NULL default '0',
  pn_format_type tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (pn_sid),
  KEY idx_catid (pn_catid),
  KEY idx_topic (pn_topic)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_stories`
--


--
-- Table structure for table `os_core_stories_cat`
--

DROP TABLE IF EXISTS os_core_stories_cat;
CREATE TABLE os_core_stories_cat (
  pn_catid int(11) NOT NULL auto_increment,
  pn_title varchar(40) NOT NULL default '',
  pn_counter int(11) NOT NULL default '0',
  pn_themeoverride varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_catid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_stories_cat`
--


--
-- Table structure for table `os_core_test_company`
--

DROP TABLE IF EXISTS os_core_test_company;
CREATE TABLE os_core_test_company (
  cmp_id int(10) unsigned NOT NULL auto_increment,
  cmp_type_cat_val varchar(64) default NULL,
  cmp_name varchar(80) default NULL,
  cmp_sortname varchar(80) default NULL,
  cmp_obj_status char(1) NOT NULL default 'A',
  cmp_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  cmp_cr_uid int(11) NOT NULL default '0',
  cmp_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  cmp_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (cmp_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_test_company`
--

INSERT INTO os_core_test_company VALUES (1,'1','kjsdhkjsd','jhsdfjhsdf','A','2006-04-19 09:34:51',2,'2006-04-19 09:34:51',2);

--
-- Table structure for table `os_core_theme_addons`
--

DROP TABLE IF EXISTS os_core_theme_addons;
CREATE TABLE os_core_theme_addons (
  pn_addon_id int(11) unsigned NOT NULL auto_increment,
  pn_block_id int(11) unsigned NOT NULL default '0',
  pn_addonname varchar(25) NOT NULL default '',
  pn_block_function varchar(200) NOT NULL default '',
  KEY pn_addon_id (pn_addon_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_theme_addons`
--


--
-- Table structure for table `os_core_theme_blcontrol`
--

DROP TABLE IF EXISTS os_core_theme_blcontrol;
CREATE TABLE os_core_theme_blcontrol (
  pn_module varchar(64) NOT NULL default '',
  pn_block varchar(32) NOT NULL default '',
  pn_theme varchar(32) NOT NULL default '',
  pn_identi varchar(32) NOT NULL default '',
  pn_pos varchar(4) NOT NULL default '',
  pn_weight decimal(10,1) NOT NULL default '1.0',
  pn_template varchar(50) NOT NULL default '',
  pn_active tinyint(1) NOT NULL default '1',
  pn_always tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (pn_block,pn_module,pn_theme)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_theme_blcontrol`
--


--
-- Table structure for table `os_core_theme_cache`
--

DROP TABLE IF EXISTS os_core_theme_cache;
CREATE TABLE os_core_theme_cache (
  cache_id varchar(32) NOT NULL default '',
  cache_contents mediumtext NOT NULL,
  PRIMARY KEY  (cache_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_theme_cache`
--


--
-- Table structure for table `os_core_theme_config`
--

DROP TABLE IF EXISTS os_core_theme_config;
CREATE TABLE os_core_theme_config (
  skin_id int(11) NOT NULL default '1',
  name varchar(200) NOT NULL default '',
  description varchar(60) NOT NULL default '',
  setting text NOT NULL,
  `data` text NOT NULL
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_theme_config`
--

INSERT INTO os_core_theme_config VALUES (2,'pagewidth','_TM_PAGEWIDTH','100%','');
INSERT INTO os_core_theme_config VALUES (2,'lcolwidth','_TM_LCOLWIDTH','140','');
INSERT INTO os_core_theme_config VALUES (2,'rcolwidth','_TM_RCOLWIDTH','170','');
INSERT INTO os_core_theme_config VALUES (2,'indexcol','_TM_INDEXCOL','1','');
INSERT INTO os_core_theme_config VALUES (2,'righton','_TM_RIGHTON','0','');

--
-- Table structure for table `os_core_theme_layout`
--

DROP TABLE IF EXISTS os_core_theme_layout;
CREATE TABLE os_core_theme_layout (
  skin_id int(11) NOT NULL default '0',
  zone_label varchar(255) NOT NULL default '',
  tpl_file varchar(200) NOT NULL default '',
  skin_type varchar(8) NOT NULL default 'theme',
  KEY skin_id (skin_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_theme_layout`
--

INSERT INTO os_core_theme_layout VALUES (1,'master','master.htm','theme');
INSERT INTO os_core_theme_layout VALUES (1,'lsblock','block.htm','block');
INSERT INTO os_core_theme_layout VALUES (1,'rsblock','block.htm','block');
INSERT INTO os_core_theme_layout VALUES (1,'News-index','News-index.htm','theme');
INSERT INTO os_core_theme_layout VALUES (1,'News-article','News-article.htm','theme');
INSERT INTO os_core_theme_layout VALUES (1,'ccblock','ccblock.htm','block');
INSERT INTO os_core_theme_layout VALUES (1,'dsblock','block.htm','block');
INSERT INTO os_core_theme_layout VALUES (2,'master','master.htm','theme');
INSERT INTO os_core_theme_layout VALUES (2,'lsblock','lsblock.htm','block');
INSERT INTO os_core_theme_layout VALUES (2,'rsblock','rsblock.htm','block');
INSERT INTO os_core_theme_layout VALUES (2,'table1','table1.htm','theme');
INSERT INTO os_core_theme_layout VALUES (2,'table2','table2.htm','theme');
INSERT INTO os_core_theme_layout VALUES (2,'News-index','news_summary.htm','theme');
INSERT INTO os_core_theme_layout VALUES (2,'News-article','article.htm','theme');
INSERT INTO os_core_theme_layout VALUES (2,'mainmenu','mainmenu.htm','block');
INSERT INTO os_core_theme_layout VALUES (2,'ccblock','ccblock.htm','block');
INSERT INTO os_core_theme_layout VALUES (2,'*admin','admin.htm','module');
INSERT INTO os_core_theme_layout VALUES (2,'*home','home.htm','module');

--
-- Table structure for table `os_core_theme_palette`
--

DROP TABLE IF EXISTS os_core_theme_palette;
CREATE TABLE os_core_theme_palette (
  palette_id int(11) unsigned NOT NULL auto_increment,
  palette_name varchar(32) NOT NULL default '',
  skin_id int(11) NOT NULL default '0',
  pn_module varchar(64) NOT NULL default '',
  all_themes tinyint(1) NOT NULL default '1',
  background varchar(12) NOT NULL default '#FFFFFF',
  color1 varchar(12) NOT NULL default '#FFFFFF',
  color2 varchar(12) NOT NULL default '#FFFFFF',
  color3 varchar(12) NOT NULL default '#FFFFFF',
  color4 varchar(12) NOT NULL default '#FFFFFF',
  color5 varchar(12) NOT NULL default '#FFFFFF',
  color6 varchar(12) NOT NULL default '#000000',
  color7 varchar(12) NOT NULL default '#000000',
  color8 varchar(12) NOT NULL default '#000000',
  sepcolor varchar(12) NOT NULL default '#000000',
  text1 varchar(12) NOT NULL default '#000000',
  text2 varchar(12) NOT NULL default '#000000',
  link varchar(12) NOT NULL default '#000000',
  vlink varchar(12) NOT NULL default '#000000',
  hover varchar(12) NOT NULL default '#000000',
  PRIMARY KEY  (palette_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_theme_palette`
--

INSERT INTO os_core_theme_palette VALUES (1,'MinimaPlus',1,'',1,'#FEFEFE','#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF','#000000','#333','#333','#58a','#969','#c60');
INSERT INTO os_core_theme_palette VALUES (2,'xAT_Blue',2,'',1,'#ffffff','#ffffff','#ffffff','#ffffff','#ffffff','#ffffff','#fffffff','#ffffff','#ffffff','#ffffff','#ffffff','#ffffff','#ffffff','#ffffff','#ffffff');

--
-- Table structure for table `os_core_theme_skins`
--

DROP TABLE IF EXISTS os_core_theme_skins;
CREATE TABLE os_core_theme_skins (
  skin_id int(11) unsigned NOT NULL auto_increment,
  name varchar(200) NOT NULL default '',
  is_active int(1) NOT NULL default '0',
  is_multicolor int(1) NOT NULL default '0',
  PRIMARY KEY  (skin_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_theme_skins`
--

INSERT INTO os_core_theme_skins VALUES (1,'travelogue',1,0);
INSERT INTO os_core_theme_skins VALUES (2,'xATBlue',1,0);

--
-- Table structure for table `os_core_theme_tplfile`
--

DROP TABLE IF EXISTS os_core_theme_tplfile;
CREATE TABLE os_core_theme_tplfile (
  tpl_id mediumint(7) unsigned NOT NULL auto_increment,
  tpl_skin_id smallint(5) unsigned NOT NULL default '0',
  tpl_module varchar(25) NOT NULL default '',
  tpl_skin_name varchar(50) NOT NULL default '',
  tpl_file varchar(200) NOT NULL default '',
  tpl_desc varchar(255) NOT NULL default '',
  tpl_lastmodified int(10) unsigned NOT NULL default '0',
  tpl_lastimported int(10) unsigned NOT NULL default '0',
  tpl_type varchar(20) NOT NULL default '',
  PRIMARY KEY  (tpl_id),
  KEY tpl_skin_id (tpl_skin_id,tpl_type),
  KEY tpl_skin_name (tpl_skin_name,tpl_file(10))
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_theme_tplfile`
--

INSERT INTO os_core_theme_tplfile VALUES (1,1,'travelogue','travelogue','News-article.htm','',1126275571,1126275571,'theme');
INSERT INTO os_core_theme_tplfile VALUES (2,1,'travelogue','travelogue','News-index.htm','',1126275571,1126275571,'theme');
INSERT INTO os_core_theme_tplfile VALUES (3,1,'travelogue','travelogue','master.htm','',1126275571,1126275571,'theme');
INSERT INTO os_core_theme_tplfile VALUES (4,1,'travelogue','travelogue','block.htm','',1126275571,1126275571,'block');
INSERT INTO os_core_theme_tplfile VALUES (5,1,'travelogue','travelogue','ccblock.htm','',1126275571,1126275571,'block');
INSERT INTO os_core_theme_tplfile VALUES (6,2,'xATBlue','xATBlue','article-old.htm','',1126857831,1126857831,'theme');
INSERT INTO os_core_theme_tplfile VALUES (7,2,'xATBlue','xATBlue','article.htm','',1126857831,1126857831,'theme');
INSERT INTO os_core_theme_tplfile VALUES (8,2,'xATBlue','xATBlue','master.htm','',1126857831,1126857831,'theme');
INSERT INTO os_core_theme_tplfile VALUES (9,2,'xATBlue','xATBlue','news_summary-old.htm','',1126857831,1126857831,'theme');
INSERT INTO os_core_theme_tplfile VALUES (10,2,'xATBlue','xATBlue','news_summary.htm','',1126857831,1126857831,'theme');
INSERT INTO os_core_theme_tplfile VALUES (11,2,'xATBlue','xATBlue','table1.htm','',1126857831,1126857831,'theme');
INSERT INTO os_core_theme_tplfile VALUES (12,2,'xATBlue','xATBlue','table2.htm','',1126857831,1126857831,'theme');
INSERT INTO os_core_theme_tplfile VALUES (13,2,'xATBlue','xATBlue','admin.htm','',1126857831,1126857831,'module');
INSERT INTO os_core_theme_tplfile VALUES (14,2,'xATBlue','xATBlue','home.htm','',1126857831,1126857831,'module');
INSERT INTO os_core_theme_tplfile VALUES (15,2,'xATBlue','xATBlue','ccblock.htm','',1126857831,1126857831,'block');
INSERT INTO os_core_theme_tplfile VALUES (16,2,'xATBlue','xATBlue','lsblock.htm','',1126857831,1126857831,'block');
INSERT INTO os_core_theme_tplfile VALUES (17,2,'xATBlue','xATBlue','mainmenu.htm','',1126857831,1126857831,'block');
INSERT INTO os_core_theme_tplfile VALUES (18,2,'xATBlue','xATBlue','rsblock.htm','',1126857831,1126857831,'block');

--
-- Table structure for table `os_core_theme_tplsource`
--

DROP TABLE IF EXISTS os_core_theme_tplsource;
CREATE TABLE os_core_theme_tplsource (
  tpl_id int(11) unsigned NOT NULL auto_increment,
  tpl_skin_id int(11) unsigned NOT NULL default '0',
  tpl_file_name varchar(200) NOT NULL default '',
  tpl_source mediumtext NOT NULL,
  tpl_secure tinyint(1) NOT NULL default '1',
  tpl_trusted tinyint(1) NOT NULL default '1',
  tpl_timestamp timestamp NOT NULL,
  KEY tpl_id (tpl_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_theme_tplsource`
--

INSERT INTO os_core_theme_tplsource VALUES (1,1,'News-article.htm','<div class=\"post\">\n	<div class=\"post_cal\">\n		<div class=\"dayname\"><!--[$info.time|date_format:\"%a\"]--></div>\n		<div class=\"daynum\"><!--[$info.time|date_format:\"%d\"]--></div>\n		<div class=\"month\"><!--[$info.time|date_format:\"%b\"]--> </div>\n		<div class=\"year\"><!--[$info.time|date_format:\"%Y\"]--></div>\n	</div>\n	<div class=\"post_head\">\n		<h2 id=\"post-<!--[$info.sid]-->\"><!--[$info.title]--></h2>\n		<p class=\"postmetadata\"><!--[pnml name=_PARTOF]--> <a href=\"user.php?op=userinfo&amp;uname=<!--[$info.informant]-->\"><!--[$info.informant]-->\'s</a> <!--[pnml name=_ADVENTUREIN]--> <a href=\"index.php?name=News&amp;topicid=<!--[$info.topicid]-->\"><!--[$info.topictext]--></a> <!--[articleadminlinks sid=$info.sid]--></p> \n	</div>\n	<div class=\"entry\">\n		<!--[$info.fulltext]-->\n	</div>\n	<div class=\"comments\">\n		<p style=\"font-weight:bold;text-align:right;\"><!--[$preformat.readmore]--></p>\n	</div>\n</div>',1,1,'2005-09-09 22:19:31');
INSERT INTO os_core_theme_tplsource VALUES (2,1,'News-index.htm','<div class=\"post\">\n	<div class=\"post_cal\">\n		<div class=\"dayname\"><!--[$info.time|date_format:\"%a\"]--></div>\n		<div class=\"daynum\"><!--[$info.time|date_format:\"%d\"]--></div>\n		<div class=\"month\"><!--[$info.time|date_format:\"%b\"]--> </div>\n		<div class=\"year\"><!--[$info.time|date_format:\"%Y\"]--></div>\n	</div>\n	<div class=\"post_head\">\n		<h2 id=\"post-<!--[$info.sid]-->\"><a href=\"<!--[$links.fullarticle]-->\" rel=\"bookmark\" title=\"<!--[pnml name=_PERMALINK]--> <!--[$info.title]-->\"><!--[$info.title]--></a></h2>\n		<p class=\"postmetadata\"><!--[pnml name=_PARTOF]--> <a href=\"user.php?op=userinfo&amp;uname=<!--[$info.informant]-->\"><!--[$info.informant]-->\'s</a> <!--[pnml name=_ADVENTUREIN]--> <a href=\"index.php?name=News&amp;topicid=<!--[$info.topicid]-->\"><!--[$info.topictext]--></a> <!--[articleadminlinks sid=$info.sid]--></p> \n	</div>\n	<div class=\"entry\">\n		<!--[$info.hometext]-->\n	</div>\n	<div class=\"comments\">\n		<p style=\"font-weight:bold;text-align:right;\"><!--[$preformat.readmore]--></p>\n	</div>\n</div>',1,1,'2005-09-09 22:19:31');
INSERT INTO os_core_theme_tplsource VALUES (3,1,'master.htm','<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"<!--[lang]-->\">\n<head profile=\"http://gmpg.org/xfn/11\">\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=<!--[charset]-->\" />\n<meta name=\"description\" content=\"<!--[slogan]-->\" />\n<meta name=\"robots\" content=\"index,follow\" />\n<meta name=\"author\" content=\"<!--[sitename]-->\" />\n<meta name=\"copyright\" content=\"Copyright (c) 2004 by <!--[sitename]-->\" />\n<meta name=\"generator\" content=\"PostNuke - http://postnuke.com\" />\n<meta name=\"keywords\" content=\"<!--[keywords]-->\" />\n<title><!--[title]--></title>\n<link rel=\"stylesheet\" href=\"<!--[$themepath]-->/style/style.css\" type=\"text/css\" />\n<script type=\"text/javascript\" src=\"javascript/showimages.js\"></script>\n<script type=\"text/javascript\" src=\"javascript/openwindow.js\"></script>\n<!--[additional_header]-->\n<!--[modulestylesheet xhtml=true]-->\n<!--[modulestylesheet stylesheet=admin.css modname=admin xhtml=true]-->\n</head>\n<body>\n<div id=\"polaroid\" class=\"polaroid<!--[rand min=1 max=1]-->\">\n&nbsp;\n</div>\n<div id=\"header-img\">\n	<a href=\"index.php\"><img src=\"<!--[$imagepath]-->/header_img.jpg\" width=\"486\" height=\"184\" alt=\"<!--[sitename]-->: <!--[slogan]-->\" /></a>\n</div>\n<div id=\"subheader\">\n	<div id=\"search\">\n		<h3><!--[pnml name=_SEARCH]--> <!--[sitename]-->:</h3>\n		<!--[pnml name=_SEARCH assign=searchlabel]-->\n		<!--[search class=searchform button=$searchlabel]--></div>\n	<div id=\"cats\">\n		<h3><!--[pnml name=_CHOOSETOPIC]-->:</h3>\n		<form action=\"index.php?name=News\" method=\"post\">\n		<div>\n			<!--[topicsdropdown]-->\n			<input type=\"submit\" value=\"<!--[pnml name=_SUBMIT]-->\" />\n		</div>\n		</form>\n	</div>\n</div>\n<div id=\"sidebar\">\n	<!--[$leftblocks]-->\n	<!--[$rightblocks]-->\n</div>\n<div id=\"content\">\n	<!--[$maincontent]-->\n</div>\n<div id=\"footer\">\n	<p>\n		<!--[sitename]--> <!--[pnml name=_RUNNINGON]--> \n		<a href=\"http://www.postnuke.com\">PostNuke</a>\n		<br />RSS: <a href=\"backend.php\">Entries</a>\n		<br /><!--[pagerendertime]-->\n	</p>\n</div>\n</body>\n</html>',1,1,'2005-09-09 22:19:31');
INSERT INTO os_core_theme_tplsource VALUES (4,1,'block.htm','<!--  BEGIN: Sidebox  -->\n<div class=\"sidebox block-<!--[$bkey]--> bid-<!--[$bid]-->\">\n	<div class=\"boxhead\">\n		<h3><!--[$title|default:\"&nbsp;\"]--></h3>\n	</div>\n	<div class=\"boxbody\">\n		<!--[$content]-->\n	</div>\n</div>\n<!--  END: Sidebox  -->',1,1,'2005-09-09 22:19:31');
INSERT INTO os_core_theme_tplsource VALUES (5,1,'ccblock.htm','<!--  Start Center Block  -->\r\n<div class=\"block block-<!--[$bkey]--> bid-<!--[$bid]-->\">\r\n	<div class=\"post\">\r\n		<!--[if $title neq \'\']-->\r\n			<div class=\"post-title\"><!--[$title]--></div>\r\n		<!--[/if]-->\r\n		<!--[$content]-->\r\n	</div>\r\n</div>\r\n<!--  End Center Block  -->\r\n',1,1,'2005-09-09 22:19:31');
INSERT INTO os_core_theme_tplsource VALUES (6,2,'article-old.htm','<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><table width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\"><tr>\r\n<td><span color=\"#000000\"> </span></td></tr></table><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"10\"><tr><td width=\"15%\" valign=\"top\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td align=\"right\" valign=\"top\"><div align=\"right\"><!--[$preformat.searchtopic]--></div></td></tr><tr><td align=\"right\" valign=\"top\"><div align=\"center\"><span class=\"tiny\"><!--[pnml name=\"_POSTEDBY\"]-->: <!--[$info.informant]--><br /><!--[$info.briefdatetime]--></div></td></tr></table><div align=\"center\"><span color=\"#000000\"><span class=\"pn-sub\"> [ <!--[articleadminlinks sid=$info.sid]--> ]</span><br /><<!--[$preformat.print]--> | <!--[$preformat.send]--></span></div></td><td width=\"85%\" valign=\"top\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><span class=\"storytitle\"><!--[$preformat.catandtitle]--></span></td></tr><tr><td align=\"left\" valign=\"top\"><div align=\"left\"><span class=\"tiny\"> <!--[$preformat.reads]--></span></div><span class=\"storycontent\"><!--[$preformat.fulltext]--></span><br /><br /><span class=\"note\"><!--[$preformat.notes|default:\"&nbsp;\"]--></span></div></td></tr><tr><td align=\"left\" valign=\"top\">&nbsp; </td></tr></table></td></tr></table></td></tr></table>',1,1,'2005-09-16 16:03:51');
INSERT INTO os_core_theme_tplsource VALUES (7,2,'article.htm','<table style=\"background-color:#F7F9FB;\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r<tr>\r<td><img src=\"<!--[$imagepath]-->/box_r1_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n<td width=\"100%\" style=\"background-image:url(<!--[$imagepath]-->/box_r1_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r<td><img src=\"<!--[$imagepath]-->/box_r1_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r</tr>\r<tr>\r<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c1.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r<td valign=\"top\" style=\"background-color:#ffffff;\">\r<table width=\"100%\" border=\"0\" cellpadding=\"2\">\r\n<tr>\r\n<td><span class=\"storytitle\"><!--[$preformat.catandtitle]--></span><br />\r\n<span class=\"tiny\"><!--[pnml name=\"_POSTEDBY\"]-->: <!--[$info.informant]--> <!--[pnml name=\"_ON\"]-->&nbsp; <!--[$info.longdate]--><span class=\"pn-sub\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--[articleadminlinks sid=$info.sid]--> </span><br /><!--[$info.counter]--> <!--[pnml name=\"_READS\"]--></span></td>\r\n</tr>\r<tr>\r<td>\r<div align=\"left\">\r\n<div style=\"float:left;margin:0px 10px 10px 0px;padding:0px;\"><!--[$preformat.searchtopic]--></div>\r<span class=\"storycontent\"><!--[$preformat.fulltext]--></span><br /><br />\r<span class=\"note\"><!--[$preformat.notes|default:\"&nbsp;\"]--></span></div><br />\r<div align=\"right\"><!--[$preformat.print]--> | <!--[$preformat.send]--></div>\r</td>\r</tr>\r\r</table>\r</td>\r<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c3.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r</tr>\r<tr>\r<td><img src=\"<!--[$imagepath]-->/box_r3_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r<td style=\"background-image:url(<!--[$imagepath]-->/box_r3_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r<td><img src=\"<!--[$imagepath]-->/box_r3_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r</tr>\r</table>\r<br />',1,1,'2005-09-16 16:03:51');
INSERT INTO os_core_theme_tplsource VALUES (8,2,'master.htm','<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \n\"http://www.w3.org/TR/REC-html40/loose.dtd\">\n<html lang=\"<!--[lang]-->\">\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=<!--[charset]-->\">\n<meta name=\"description\" content=\"<!--[slogan]-->\">\n<meta name=\"robots\" content=\"index,follow\">\n<meta name=\"resource-type\" content=\"document\">\n<meta http-equiv=\"expires\" content=\"0\">\n<meta name=\"author\" content=\"<!--[sitename]-->\">\n<meta name=\"copyright\" content=\"Copyright (c) 2005 by <!--[sitename]-->\">\n<meta name=\"revisit-after\" content=\"1 days\">\n<meta name=\"distribution\" content=\"Global\">\n<meta name=\"Generator\" content=\"<!--[ v4b_meta_generator ]-->\">\n<meta name=\"rating\" content=\"General\">\n<meta name=\"keywords\" content=\"<!--[keywords]-->\">\n<title><!--[titlehack]--></title>\n<link rel=\"stylesheet\" href=\"<!--[$themepath]-->/style/style.css\" type=\"text/css\" />\n<script type=\"text/javascript\" src=\"javascript/showimages.js\"></script>\n<script type=\"text/javascript\" src=\"javascript/openwindow.js\"></script>\n<!--[additional_header]-->\n<!--[modulestylesheet xhtml=true]-->\n<!--[modulestylesheet stylesheet=admin.css modname=admin xhtml=true]-->\n<script type=\"text/javaScript\">\n<!--\nDOM = (document.getElementById) ? 1 : 0;\nNS4 = (document.layers) ? 1 : 0;\n// We need to explicitly detect Konqueror\n// because Konqueror 3 sets IE = 1 ... AAAAAAAAAARGHHH!!!\nKonqueror = (navigator.userAgent.indexOf(\"Konqueror\") > -1) ? 1 : 0;\n// We need to detect Konqueror 2.2 as it does not handle the window.onresize event\nKonqueror22 = (navigator.userAgent.indexOf(\"Konqueror 2.2\") > -1 || navigator.userAgent.indexOf(\"Konqueror/2.2\") > -1) ? 1 : 0;\nOpera = (navigator.userAgent.indexOf(\"Opera\") > -1) ? 1 : 0;\nOpera5 = (navigator.userAgent.indexOf(\"Opera 5\") > -1 || navigator.userAgent.indexOf(\"Opera/5\") > -1) ? 1 : 0;\nOpera6 = (navigator.userAgent.indexOf(\"Opera 6\") > -1 || navigator.userAgent.indexOf(\"Opera/6\") > -1) ? 1 : 0;\nOpera56 = Opera5 || Opera6;\nIE = (navigator.userAgent.indexOf(\"MSIE\") > -1) ? 1 : 0;\nIE = IE && !Opera;\nIE5 = IE && DOM;\nIE4 = (document.all) ? 1 : 0;\nIE4 = IE4 && IE && !DOM;\n\nfunction MM_findObj(n, d) { //v4.01\n  var p,i,x;  if(!d) d=document; if((p=n.indexOf(\"?\"))>0&&parent.frames.length) {\n    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}\n  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];\n  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);\n  if(!x && d.getElementById) x=d.getElementById(n); return x;\n}\nfunction MM_swapImage() { //v3.0\n  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)\n   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}\n}\nfunction MM_swapImgRestore() { //v3.0\n  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;\n}\n\nfunction MM_preloadImages() { //v3.0\n var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();\n   var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)\n   if (a[i].indexOf(\"#\")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}\n}\n//-->\n</script>\n<script type=\"text/javascript\" src=\"includes/v4blib/phplayersmenu/libjs/layersmenu-library.js\"></script>\n<script type=\"text/javascript\" src=\"includes/v4blib/phplayersmenu/libjs/layersmenu.js\"></script>\n<script type=\"text/javascript\" src=\"includes/v4blib/phplayersmenu/libjs/layerstreemenu-cookies.js\"></script>\n</head>\n\n<body style=\"background-color:#F7F9FB; color:#333333; margin:0px;\">\n<table style=\"background-color:#F7F9FB;\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n	<tr>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"8\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"48\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"49\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"62\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"35\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"50\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"66\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"142\" height=\"1\" alt=\"image\" /></td>\n		<td width=\"100%\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"4\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"291\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td><img src=\"<!--[$imagepath]-->/header_r1_c1.jpg\" width=\"8\" height=\"18\" alt=\"image\" /></td>\n		<td colspan=\"7\" style=\"background-image:url(<!--[$imagepath]-->/header_r1_c2.jpg)\">\n			<img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" />\n			<div id=\"welcome\"><!--[userwelcome]-->&nbsp;&nbsp;&nbsp;<!--[pnml name=\"_WELCOMETO\"]-->&nbsp;<!--[sitename]-->\n&nbsp;&nbsp;&nbsp;<!--[twuserlinks start=\" \" end=\" \" seperator=\"::\"]--></div>\n		</td>\n		<td style=\"background-image:url(<!--[$imagepath]-->/header_r1_c9.jpg)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td rowspan=\"2\"><img src=\"<!--[$imagepath]-->/header_r1_c10.jpg\" width=\"291\" height=\"88\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"18\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td><img src=\"<!--[$imagepath]-->/header_r2_c1.jpg\" width=\"8\" height=\"70\" alt=\"image\" /></td> \n		<td colspan=\"7\" style=\"background-image:url(<!--[$imagepath]-->/header_r2_c2.jpg)\">\n			<div align=\"center\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /><!-- [banners] --></div>\n		</td>\n    	<td nowrap=\"nowrap\" style=\"background-image:url(<!--[$imagepath]-->/header_r2_c9.jpg)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"70\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td style=\"background-image:url(<!--[$imagepath]-->/header_r3_c1.jpg)\" colspan=\"7\" valign=\"top\">\n			<a href=\"index.php\" onMouseOut=\"MM_swapImgRestore();\" onMouseOver=\"MM_swapImage(\'header_r3_c2\',\'\',\'<!--[$imagepath]-->/header_r3_c2_f2.jpg\',1);\"><img src=\"<!--[$imagepath]-->/header_r3_c2.jpg\" width=\"48\" height=\"32\" alt=\"<!--[php]--> echo _AT_FRONT; <!--[/php]-->\" align=\"left\"></a>\n			<a href=\"modules.php?op=modload&amp;name=FAQ&amp;file=index\" onMouseOut=\"MM_swapImgRestore();\" onMouseOver=\"MM_swapImage(\'header_r3_c5\',\'\',\'<!--[$imagepath]-->/header_r3_c5_f2.jpg\',1);\"><img src=\"<!--[$imagepath]-->/header_r3_c5.jpg\" width=\"35\" height=\"32\" alt=\"<!--[php]--> echo _AT_QUESTION; <!--[/php]-->\" align=\"left\"></a>\n			<a href=\"index.php?module=v4bContact&amp;func=main\" onMouseOut=\"MM_swapImgRestore();\" onMouseOver=\"MM_swapImage(\'header_r3_c7\',\'\',\'<!--[$imagepath]-->/header_r3_c7_f2.jpg\',1);\"><img src=\"<!--[$imagepath]-->/header_r3_c7.jpg\" width=\"66\" height=\"32\" alt=\"<!--[php]--> echo _AT_CONTACT; <!--[/php]-->\" align=\"left\"></a>\n		</td>\n		<td height=\"0\" colspan=\"3\" align=\"right\" valign=\"top\" nowrap=\"nowrap\" style=\"background-image:url(<!--[$imagepath]-->/header_r3_c8.jpg)\">\n			<img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" />\n			<div id=\"time\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" />\n\n<!--[datetime]-->&nbsp;&nbsp;</div>\n		</td>\n		<td valign=\"top\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"32\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td colspan=\"10\" style=\"background-image:url(<!--[$imagepath]-->/header_r4_c1.jpg)\" valign=\"top\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td valign=\"top\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"20\" alt=\"image\" /></td>\n	</tr>\n</table>\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n	<tr valign=\"top\">\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"5\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-color:#F7F9FB;\" width=\"120\" valign=\"top\">\n<!--  begin left blocks output here  -->\n<!--[$leftblocks]-->\n<!--  end left blocks output here  -->\n</td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"10\" height=\"1\" alt=\"image\" /></td>\n		<td align=\"center\" valign=\"top\" width=\"100%\" style=\"background-color:#F7F9FB;\">\n<!--[$centerblocks]-->\n<!--  begin modules output here  -->\n<!--[$maincontent]-->\n<!--  end modules output here  -->\n		</td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"10\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-color:#F7F9FB;\" valign=\"top\" width=\"150\">\n<!--[php]--> $modname=pnModGetName(); if ($modname != \'\') { <!--[/php]-->\n<!--  begin right blocks output here  -->\n<!--[$rightblocks]-->\n<!--  end right blocks output here  -->\n<!--[php]--> } <!--[/php]-->\n</td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"5\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n	</tr>\n</table>\n<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n	<tr>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"311\" height=\"1\" alt=\"image\" /></td>\n		<td width=\"100%\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"132\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"312\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td style=\"background-color:#F7F9FB;\" colspan=\"2\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"29\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td style=\"background-image:url(<!--[$imagepath]-->/Footer_r2_c1.jpg)\" colspan=\"2\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-image:url(<!--[$imagepath]-->/Footer_r2_c1.jpg)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"38\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td colspan=\"3\" valign=\"top\" style=\"background-image:url(<!--[$imagepath]-->/Footer_r3_c1.jpg)\">\n			<div align=\"center\">\n				<img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" />\n				&nbsp;<br /><br />\n				<span class=\"slogan\">\n<!--[slogan]-->\n&nbsp;&nbsp;</span><br />\n				<span class=\"pn-sub\">\n<!--[footmsg]-->\n<br /></span>\n			</div>\n		</td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"14\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td style=\"background-image:url(<!--[$imagepath]-->/Footer_r4_c1.jpg)\" colspan=\"2\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-image:url(<!--[$imagepath]-->/Footer_r4_c1.jpg)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"14\" alt=\"image\" /></td>\n	</tr>\n</table>\n</body>\n</html>\n',1,1,'2005-09-16 16:03:51');
INSERT INTO os_core_theme_tplsource VALUES (9,2,'news_summary-old.htm','<table bgcolor=\"#f7f9fb\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n<tr>\r\n<td><img src=\"<!--[$imagepath]-->/box_r1_c1.gif\" width=\"12\" height=\"13\" alt=\"image\"></td>\r\n<td width=\"100%\" background=\"<!--[$imagepath]-->/box_r1_c2.gif\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\"></td>\r\n<td><img src=\"<!--[$imagepath]-->/box_r1_c3.gif\" width=\"12\" height=\"13\" alt=\"image\"></td>\r\n</tr>\r\n\r\n<tr>\r\n<td background=\"<!--[$imagepath]-->/box_r2_c1.gif\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\"></td>\r\n<td valign=\"top\" bgcolor=\"#FFFFFF\">\r\n<table width=\"100%\" border=\"0\" cellpadding=\"2\">\r\n<tr>\r\n<td><span class=\"storytitle\"><!-- [news:html:catandtitle] --></span><br>\r\n<span class=\"tiny\"><!--[pnml name=\"_POSTEDBY\"]-->: <!--[$info.informant]--> <!--[pnml name=\"_ON\"]-->&nbsp; <!--[$info.longdate]--><br>\r\n<!--[$info.counter]--> <!--[pnml name=\"_READS\"]--></span></td>\r\n</tr>\r\n\r\n<tr>\r\n<td><!--[$preformat.searchtopic]-->\r\n<div align=\"left\"><span class=\"storycontent\"><!--[$info.hometext]--></span><br>\r\n<br>\r\n<span class=\"note\"><!--[$preformat.notes|default:\"&nbsp;\"]--></span></div>\r\n\r\n<br>\r\n<div align=\"right\"><!--[$preformat.print]-->| <!--[$preformat.send]--><br>\r\n<span class=\"comments\"><!--[$preformat.comment]--></span></div>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<td align=\"right\"><a href=\"<!--[$links.fullarticle]-->\" style=\"FONT-FAMILY: Arial, Helvetica, sans-serif; COLOR: #37608C; FONT-SIZE: 11px; FONT-WEIGHT: bold; LETTER-SPACING: 3px; TEXT-DECORATION: none; BACKGROUND: none;><!--[pnml name=_READMORETEXT]--></a></span><!--<div align=\" class=\"comments\"><!--[$preformat.comment]-->--></a></td>\r\n</tr>\r\n</table>\r\n</td>\r\n<td background=\"<!--[$imagepath]-->/box_r2_c3.gif\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\"></td>\r\n</tr>\r\n\r\n<tr>\r\n<td><img src=\"<!--[$imagepath]-->/box_r3_c1.gif\" width=\"12\" height=\"13\" alt=\"image\"></td>\r\n<td background=\"<!--[$imagepath]-->/box_r3_c2.gif\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\"></td>\r\n<td><img src=\"<!--[$imagepath]-->/box_r3_c3.gif\" width=\"12\" height=\"13\" alt=\"image\"></td>\r\n</tr>\r\n</table>',1,1,'2005-09-16 16:03:51');
INSERT INTO os_core_theme_tplsource VALUES (10,2,'news_summary.htm','<table style=\"background-color:#F7F9FB;\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r<tr>\r<td><img src=\"<!--[$imagepath]-->/box_r1_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n<td width=\"100%\" style=\"background-image:url(<!--[$imagepath]-->/box_r1_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r<td><img src=\"<!--[$imagepath]-->/box_r1_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r</tr>\r<tr>\r<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c1.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r<td valign=\"top\" style=\"background-color:#ffffff;\">\r<table width=\"100%\" border=\"0\" cellpadding=\"2\">\r\n<tr>\r\n<td><span class=\"storytitle\"><!--[$preformat.catandtitle]--></span><br />\r\n<span class=\"tiny\"><!--[pnml name=\"_POSTEDBY\"]-->: <!--[$info.informant]--> <!--[pnml name=\"_ON\"]-->&nbsp; <!--[$info.longdate]--><br /><!--[$info.counter]--> <!--[pnml name=\"_READS\"]--></span></td>\r\n</tr>\r<tr>\r<td>\r<div align=\"left\">\r\n<div style=\"float:left;margin:0px 10px 10px 0px;padding:0px;\"><!--[$preformat.searchtopic]--></div>\r<span class=\"storycontent\"><!--[$info.hometext]--></span><br /><br />\r<span class=\"note\"><!--[$preformat.notes|default:\"&nbsp;\"]--></span></div><br />\r<div align=\"right\"><!--[$preformat.print]--> | <!--[$preformat.send]--><br />\r<span class=\"comments\"><!--[$preformat.comment]--></span></div>\r</td>\r</tr>\r<tr>\r<td align=\"right\">\r<a href=\"<!--[$links.fullarticle]-->\" style=\"FONT-FAMILY: Arial, Helvetica, sans-serif; COLOR: #37608C; FONT-SIZE: 11px; FONT-WEIGHT: bold; LETTER-SPACING: 3px; TEXT-DECORATION: none; BACKGROUND: none; FONT: italic;\"><!--[pnml name=_READMORETEXT]--></a>\r</td>\r</tr>\r</table>\r</td>\r<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c3.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r</tr>\r<tr>\r<td><img src=\"<!--[$imagepath]-->/box_r3_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r<td style=\"background-image:url(<!--[$imagepath]-->/box_r3_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r<td><img src=\"<!--[$imagepath]-->/box_r3_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r</tr>\r</table>\r<br />',1,1,'2005-09-16 16:03:51');
INSERT INTO os_core_theme_tplsource VALUES (11,2,'table1.htm','<table style=\"background-color:#F7F9FB;\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n<tr>\r\n<td><img src=\"<!--[$imagepath]-->/box_r1_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td> \r\n<td width=\"100%\" style=\"background-image:url(<!--[$imagepath]-->/box_r1_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n<td><img src=\"<!--[$imagepath]-->/box_r1_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n</tr>\r\n<tr>\r\n<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c1.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n<td valign=\"top\" style=\"background-color:#ffffff;\">\r\n<!--[$tablecontent]-->\r\n</td>\r\n<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c3.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"<!--[$imagepath]-->/box_r3_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n<td style=\"background-image:url(<!--[$imagepath]-->/box_r3_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n<td><img src=\"<!--[$imagepath]-->/box_r3_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n</tr>\r\n</table>\r\n<br />',1,1,'2005-09-16 16:03:51');
INSERT INTO os_core_theme_tplsource VALUES (12,2,'table2.htm','<table style=\"background-color:#F7F9FB;\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n	<tr>\r\n		<td><img src=\"<!--[$imagepath]-->/box_r1_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td> \r\n		<td width=\"100%\" style=\"background-image:url(<!--[$imagepath]-->/box_r1_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n		<td><img src=\"<!--[$imagepath]-->/box_r1_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n	</tr>\r\n	<tr>\r\n		<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c1.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n		<td valign=\"top\" style=\"background-color:#ffffff;\">\r\n			<!--[$tablecontent]-->    </td>\r\n		<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c3.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n	</tr>\r\n	<tr>\r\n		<td><img src=\"<!--[$imagepath]-->/box_r3_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n		<td style=\"background-image:url(<!--[$imagepath]-->/box_r3_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n		<td><img src=\"<!--[$imagepath]-->/box_r3_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n	</tr>\r\n</table>\r\n<br />\r\n',1,1,'2005-09-16 16:03:51');
INSERT INTO os_core_theme_tplsource VALUES (13,2,'admin.htm','<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \n\"http://www.w3.org/TR/REC-html40/loose.dtd\">\n<html lang=\"<!--[lang]-->\">\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=<!--[charset]-->\">\n<meta name=\"description\" content=\"<!--[slogan]-->\">\n<meta name=\"robots\" content=\"index,follow\">\n<meta name=\"resource-type\" content=\"document\">\n<meta http-equiv=\"expires\" content=\"0\">\n<meta name=\"author\" content=\"<!--[sitename]-->\">\n<meta name=\"copyright\" content=\"Copyright (c) 2005 by <!--[sitename]-->\">\n<meta name=\"revisit-after\" content=\"1 days\">\n<meta name=\"distribution\" content=\"Global\">\n<meta name=\"Generator\" content=\"<!--[ v4b_meta_generator ]-->\">\n<meta name=\"rating\" content=\"General\">\n<meta name=\"keywords\" content=\"<!--[keywords]-->\">\n<title><!--[titlehack]--></title>\n<link rel=\"stylesheet\" href=\"<!--[$themepath]-->/style/style.css\" type=\"text/css\" />\n<script type=\"text/javascript\" src=\"javascript/showimages.js\"></script>\n<script type=\"text/javascript\" src=\"javascript/openwindow.js\"></script>\n<!--[additional_header]-->\n<!--[modulestylesheet xhtml=true]-->\n<!--[modulestylesheet stylesheet=admin.css modname=admin xhtml=true]-->\n<script type=\"text/javaScript\">\n<!--\nDOM = (document.getElementById) ? 1 : 0;\nNS4 = (document.layers) ? 1 : 0;\n// We need to explicitly detect Konqueror\n// because Konqueror 3 sets IE = 1 ... AAAAAAAAAARGHHH!!!\nKonqueror = (navigator.userAgent.indexOf(\"Konqueror\") > -1) ? 1 : 0;\n// We need to detect Konqueror 2.2 as it does not handle the window.onresize event\nKonqueror22 = (navigator.userAgent.indexOf(\"Konqueror 2.2\") > -1 || navigator.userAgent.indexOf(\"Konqueror/2.2\") > -1) ? 1 : 0;\nOpera = (navigator.userAgent.indexOf(\"Opera\") > -1) ? 1 : 0;\nOpera5 = (navigator.userAgent.indexOf(\"Opera 5\") > -1 || navigator.userAgent.indexOf(\"Opera/5\") > -1) ? 1 : 0;\nOpera6 = (navigator.userAgent.indexOf(\"Opera 6\") > -1 || navigator.userAgent.indexOf(\"Opera/6\") > -1) ? 1 : 0;\nOpera56 = Opera5 || Opera6;\nIE = (navigator.userAgent.indexOf(\"MSIE\") > -1) ? 1 : 0;\nIE = IE && !Opera;\nIE5 = IE && DOM;\nIE4 = (document.all) ? 1 : 0;\nIE4 = IE4 && IE && !DOM;\n\nfunction MM_findObj(n, d) { //v4.01\n  var p,i,x;  if(!d) d=document; if((p=n.indexOf(\"?\"))>0&&parent.frames.length) {\n    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}\n  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];\n  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);\n  if(!x && d.getElementById) x=d.getElementById(n); return x;\n}\nfunction MM_swapImage() { //v3.0\n  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)\n   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}\n}\nfunction MM_swapImgRestore() { //v3.0\n  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;\n}\n\nfunction MM_preloadImages() { //v3.0\n var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();\n   var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)\n   if (a[i].indexOf(\"#\")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}\n}\n//-->\n</script>\n<script type=\"text/javascript\" src=\"includes/v4blib/phplayersmenu/libjs/layersmenu-library.js\"></script>\n<script type=\"text/javascript\" src=\"includes/v4blib/phplayersmenu/libjs/layersmenu.js\"></script>\n<script type=\"text/javascript\" src=\"includes/v4blib/phplayersmenu/libjs/layerstreemenu-cookies.js\"></script>\n</head>\n\n<body style=\"background-color:#F7F9FB; color:#333333; margin:0px;\">\n<table style=\"background-color:#F7F9FB;\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n	<tr>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"8\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"48\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"49\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"62\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"35\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"50\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"66\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"142\" height=\"1\" alt=\"image\" /></td>\n		<td width=\"100%\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"4\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"291\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td><img src=\"<!--[$imagepath]-->/header_r1_c1.jpg\" width=\"8\" height=\"18\" alt=\"image\" /></td>\n		<td colspan=\"7\" style=\"background-image:url(<!--[$imagepath]-->/header_r1_c2.jpg)\">\n			<img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" />\n			<div id=\"welcome\"><!--[userwelcome]-->&nbsp;&nbsp;&nbsp;<!--[pnml name=\"_WELCOMETO\"]-->&nbsp;<!--[sitename]-->\n&nbsp;&nbsp;&nbsp;<!--[twuserlinks start=\" \" end=\" \" seperator=\"::\"]--></div>\n		</td>\n		<td style=\"background-image:url(<!--[$imagepath]-->/header_r1_c9.jpg)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td rowspan=\"2\"><img src=\"<!--[$imagepath]-->/header_r1_c10.jpg\" width=\"291\" height=\"88\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"18\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td><img src=\"<!--[$imagepath]-->/header_r2_c1.jpg\" width=\"8\" height=\"70\" alt=\"image\" /></td> \n		<td colspan=\"7\" style=\"background-image:url(<!--[$imagepath]-->/header_r2_c2.jpg)\">\n			<div align=\"center\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /><!-- [banners] --></div>\n		</td>\n    	<td nowrap=\"nowrap\" style=\"background-image:url(<!--[$imagepath]-->/header_r2_c9.jpg)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"70\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td style=\"background-image:url(<!--[$imagepath]-->/header_r3_c1.jpg)\" colspan=\"7\" valign=\"top\">\n			<a href=\"index.php\" onMouseOut=\"MM_swapImgRestore();\" onMouseOver=\"MM_swapImage(\'header_r3_c2\',\'\',\'<!--[$imagepath]-->/header_r3_c2_f2.jpg\',1);\"><img src=\"<!--[$imagepath]-->/header_r3_c2.jpg\" width=\"48\" height=\"32\" alt=\"<!--[php]--> echo _AT_FRONT; <!--[/php]-->\" align=\"left\"></a>\n			<a href=\"modules.php?op=modload&amp;name=FAQ&amp;file=index\" onMouseOut=\"MM_swapImgRestore();\" onMouseOver=\"MM_swapImage(\'header_r3_c5\',\'\',\'<!--[$imagepath]-->/header_r3_c5_f2.jpg\',1);\"><img src=\"<!--[$imagepath]-->/header_r3_c5.jpg\" width=\"35\" height=\"32\" alt=\"<!--[php]--> echo _AT_QUESTION; <!--[/php]-->\" align=\"left\"></a>\n			<a href=\"index.php?module=v4bContact&amp;func=main\" onMouseOut=\"MM_swapImgRestore();\" onMouseOver=\"MM_swapImage(\'header_r3_c7\',\'\',\'<!--[$imagepath]-->/header_r3_c7_f2.jpg\',1);\"><img src=\"<!--[$imagepath]-->/header_r3_c7.jpg\" width=\"66\" height=\"32\" alt=\"<!--[php]--> echo _AT_CONTACT; <!--[/php]-->\" align=\"left\"></a>\n		</td>\n		<td height=\"0\" colspan=\"3\" align=\"right\" valign=\"top\" nowrap=\"nowrap\" style=\"background-image:url(<!--[$imagepath]-->/header_r3_c8.jpg)\">\n			<img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" />\n			<div id=\"time\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" />\n\n<!--[datetime]-->&nbsp;&nbsp;</div>\n		</td>\n		<td valign=\"top\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"32\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td colspan=\"10\" style=\"background-image:url(<!--[$imagepath]-->/header_r4_c1.jpg)\" valign=\"top\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td valign=\"top\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"20\" alt=\"image\" /></td>\n	</tr>\n</table>\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n	<tr valign=\"top\">\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"5\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-color:#F7F9FB;\" width=\"120\" valign=\"top\">\n<!--  begin left blocks output here  -->\n<!--[$leftblocks]-->\n<!--  end left blocks output here  -->\n</td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"10\" height=\"1\" alt=\"image\" /></td>\n		<td align=\"left\" valign=\"top\" width=\"100%\" style=\"background-color:#F7F9FB;\">\n\n<!--  begin modules output here  -->\n<!--[$maincontent]-->\n<!--  end modules output here  -->\n		</td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"10\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-color:#F7F9FB;\" valign=\"top\" width=\"150\">\n<!--[php]--> $modname=pnModGetName(); if ($modname != \'\') { <!--[/php]-->\n<!--  begin right blocks output here  -->\n<!--[$rightblocks]-->\n<!--  end right blocks output here  -->\n<!--[php]--> } <!--[/php]-->\n</td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"5\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n	</tr>\n</table>\n<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n	<tr>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"311\" height=\"1\" alt=\"image\" /></td>\n		<td width=\"100%\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"132\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"312\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td style=\"background-color:#F7F9FB;\" colspan=\"2\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"29\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td style=\"background-image:url(<!--[$imagepath]-->/Footer_r2_c1.jpg)\" colspan=\"2\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-image:url(<!--[$imagepath]-->/Footer_r2_c1.jpg)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"38\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td colspan=\"3\" valign=\"top\" style=\"background-image:url(<!--[$imagepath]-->/Footer_r3_c1.jpg)\">\n			<div align=\"center\">\n				<img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" />\n				&nbsp;<br /><br />\n				<span class=\"slogan\">\n<!--[slogan]-->\n&nbsp;&nbsp;</span><br />\n				<span class=\"pn-sub\">\n<!--[footmsg]-->\n<br /></span>\n			</div>\n		</td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"14\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td style=\"background-image:url(<!--[$imagepath]-->/Footer_r4_c1.jpg)\" colspan=\"2\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-image:url(<!--[$imagepath]-->/Footer_r4_c1.jpg)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"14\" alt=\"image\" /></td>\n	</tr>\n</table>\n</body>\n</html>\n',1,1,'2005-09-16 16:03:51');
INSERT INTO os_core_theme_tplsource VALUES (14,2,'home.htm','<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \n\"http://www.w3.org/TR/REC-html40/loose.dtd\">\n<html lang=\"<!--[lang]-->\">\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=<!--[charset]-->\">\n<meta name=\"description\" content=\"<!--[slogan]-->\">\n<meta name=\"robots\" content=\"index,follow\">\n<meta name=\"resource-type\" content=\"document\">\n<meta http-equiv=\"expires\" content=\"0\">\n<meta name=\"author\" content=\"<!--[sitename]-->\">\n<meta name=\"copyright\" content=\"Copyright (c) 2005 by <!--[sitename]-->\">\n<meta name=\"revisit-after\" content=\"1 days\">\n<meta name=\"distribution\" content=\"Global\">\n<meta name=\"Generator\" content=\"<!--[ v4b_meta_generator ]-->\">\n<meta name=\"rating\" content=\"General\">\n<meta name=\"keywords\" content=\"<!--[keywords]-->\">\n<title><!--[titlehack]--></title>\n<link rel=\"stylesheet\" href=\"<!--[$themepath]-->/style/style.css\" type=\"text/css\">\n<script type=\"text/javascript\" src=\"javascript/showimages.js\"></script>\n<script type=\"text/javascript\" src=\"javascript/openwindow.js\"></script>\n<!--[additional_header]-->\n<!--[modulestylesheet xhtml=true]-->\n<!--[modulestylesheet stylesheet=admin.css modname=admin xhtml=true]-->\n<script type=\"text/javaScript\">\n<!--\nDOM = (document.getElementById) ? 1 : 0;\nNS4 = (document.layers) ? 1 : 0;\n// We need to explicitly detect Konqueror\n// because Konqueror 3 sets IE = 1 ... AAAAAAAAAARGHHH!!!\nKonqueror = (navigator.userAgent.indexOf(\"Konqueror\") > -1) ? 1 : 0;\n// We need to detect Konqueror 2.2 as it does not handle the window.onresize event\nKonqueror22 = (navigator.userAgent.indexOf(\"Konqueror 2.2\") > -1 || navigator.userAgent.indexOf(\"Konqueror/2.2\") > -1) ? 1 : 0;\nOpera = (navigator.userAgent.indexOf(\"Opera\") > -1) ? 1 : 0;\nOpera5 = (navigator.userAgent.indexOf(\"Opera 5\") > -1 || navigator.userAgent.indexOf(\"Opera/5\") > -1) ? 1 : 0;\nOpera6 = (navigator.userAgent.indexOf(\"Opera 6\") > -1 || navigator.userAgent.indexOf(\"Opera/6\") > -1) ? 1 : 0;\nOpera56 = Opera5 || Opera6;\nIE = (navigator.userAgent.indexOf(\"MSIE\") > -1) ? 1 : 0;\nIE = IE && !Opera;\nIE5 = IE && DOM;\nIE4 = (document.all) ? 1 : 0;\nIE4 = IE4 && IE && !DOM;\n\nfunction MM_findObj(n, d) { //v4.01\n  var p,i,x;  if(!d) d=document; if((p=n.indexOf(\"?\"))>0&&parent.frames.length) {\n    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}\n  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];\n  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);\n  if(!x && d.getElementById) x=d.getElementById(n); return x;\n}\nfunction MM_swapImage() { //v3.0\n  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)\n   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}\n}\nfunction MM_swapImgRestore() { //v3.0\n  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;\n}\n\nfunction MM_preloadImages() { //v3.0\n var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();\n   var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)\n   if (a[i].indexOf(\"#\")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}\n}\n//-->\n</script>\n<script type=\"text/javascript\" src=\"includes/v4blib/phplayersmenu/libjs/layersmenu-library.js\"></script>\n<script type=\"text/javascript\" src=\"includes/v4blib/phplayersmenu/libjs/layersmenu.js\"></script>\n<script type=\"text/javascript\" src=\"includes/v4blib/phplayersmenu/libjs/layerstreemenu-cookies.js\"></script>\n</head>\n\n<body style=\"background-color:#F7F9FB; color:#333333; margin:0px;\">\n<table style=\"background-color:#F7F9FB;\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n	<tr>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"8\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"48\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"49\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"62\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"35\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"50\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"66\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"142\" height=\"1\" alt=\"image\" /></td>\n		<td width=\"100%\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"4\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"291\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td><img src=\"<!--[$imagepath]-->/header_r1_c1.jpg\" width=\"8\" height=\"18\" alt=\"image\" /></td>\n		<td colspan=\"7\" style=\"background-image:url(<!--[$imagepath]-->/header_r1_c2.jpg)\">\n			<img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" />\n			<div id=\"welcome\"><!--[userwelcome]-->&nbsp;&nbsp;&nbsp;<!--[pnml name=\"_WELCOMETO\"]-->&nbsp;<!--[sitename]-->\n&nbsp;&nbsp;&nbsp;<!--[twuserlinks start=\" \" end=\" \" seperator=\"::\"]--></div>\n		</td>\n		<td style=\"background-image:url(<!--[$imagepath]-->/header_r1_c9.jpg)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td rowspan=\"2\"><img src=\"<!--[$imagepath]-->/header_r1_c10.jpg\" width=\"291\" height=\"88\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"18\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td><img src=\"<!--[$imagepath]-->/header_r2_c1.jpg\" width=\"8\" height=\"70\" alt=\"image\" /></td> \n		<td colspan=\"7\" style=\"background-image:url(<!--[$imagepath]-->/header_r2_c2.jpg)\">\n			<div style=\"text-align:center;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /><!--[pnbannerdisplay id=\"\"]--></div>\n		</td>\n    	<td nowrap=\"nowrap\" style=\"background-image:url(<!--[$imagepath]-->/header_r2_c9.jpg)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"70\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td style=\"background-image:url(<!--[$imagepath]-->/header_r3_c1.jpg)\" colspan=\"7\" valign=\"top\">\n			<a href=\"index.php\" onMouseOut=\"MM_swapImgRestore();\" onMouseOver=\"MM_swapImage(\'header_r3_c2\',\'\',\'<!--[$imagepath]-->/header_r3_c2_f2.jpg\',1);\"><img src=\"<!--[$imagepath]-->/header_r3_c2.jpg\" width=\"48\" height=\"32\" alt=\"<!--[php]--> echo _AT_FRONT; <!--[/php]-->\" align=\"left\"></a>\n			<a href=\"modules.php?op=modload&amp;name=FAQ&amp;file=index\" onMouseOut=\"MM_swapImgRestore();\" onMouseOver=\"MM_swapImage(\'header_r3_c5\',\'\',\'<!--[$imagepath]-->/header_r3_c5_f2.jpg\',1);\"><img src=\"<!--[$imagepath]-->/header_r3_c5.jpg\" width=\"35\" height=\"32\" alt=\"<!--[php]--> echo _AT_QUESTION; <!--[/php]-->\" align=\"left\"></a>\n			<a href=\"index.php?module=v4bContact&amp;func=main\" onMouseOut=\"MM_swapImgRestore();\" onMouseOver=\"MM_swapImage(\'header_r3_c7\',\'\',\'<!--[$imagepath]-->/header_r3_c7_f2.jpg\',1);\"><img src=\"<!--[$imagepath]-->/header_r3_c7.jpg\" width=\"66\" height=\"32\" alt=\"<!--[php]--> echo _AT_CONTACT; <!--[/php]-->\" align=\"left\"></a>\n		</td>\n		<td height=\"0\" colspan=\"3\" align=\"right\" valign=\"top\" nowrap=\"nowrap\" style=\"background-image:url(<!--[$imagepath]-->/header_r3_c8.jpg)\">\n			<img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" />\n			<div id=\"time\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" />\n\n<!--[datetime]-->&nbsp;&nbsp;</div>\n		</td>\n		<td valign=\"top\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"32\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td colspan=\"10\" style=\"background-image:url(<!--[$imagepath]-->/header_r4_c1.jpg)\" valign=\"top\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td valign=\"top\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"20\" alt=\"image\" /></td>\n	</tr>\n</table>\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n	<tr valign=\"top\">\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"5\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-color:#F7F9FB;\" width=\"120\" valign=\"top\">\n<!--  begin left blocks output here  -->\n<!--[$leftblocks]-->\n<!--  end left blocks output here  -->\n</td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"10\" height=\"1\" alt=\"image\" /></td>\n		<td align=\"center\" valign=\"top\" width=\"100%\" style=\"background-color:#F7F9FB;\">\n<!--[$centerblocks]-->\n<!--[$ZAREA1]-->\n<!--[php]--> $modname=pnModGetName(); if (stristr(\'Blocks|ContentExpress|PostCalendar|Modules|MyHeadlines|pagesetter|pnTresMailer|UpDownload|Permissions|photoshare|phPro|PNphpBB2|DQ_Helpdesk\',$modname)){ <!--[/php]--><!-- [open-table] --><!--[php]--> } <!--[/php]-->	\n<!--  begin modules output here  -->\n<!--[$maincontent]-->\n<!--  end modules output here  -->\n<!--[php]--> $modname=pnModGetName(); if (stristr(\'Blocks|ContentExpress|PostCalendar|Modules|MyHeadlines|pagesetter|pnTresMailer|UpDownload|Permissions|photoshare|phPro|PNphpBB2|DQ_Helpdesk\',$modname)){ <!--[/php]--><!-- [close-table] --><!--[php]--> } <!--[/php]-->	\n		</td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"10\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-color:#F7F9FB;\" valign=\"top\" width=\"150\">\n<!--[php]--> $modname=pnModGetName(); if ($modname != \'\') { <!--[/php]-->\n<!--  begin right blocks output here  -->\n<!--[$rightblocks]-->\n<!--  end right blocks output here  -->\n<!--[php]--> } <!--[/php]-->\n</td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"5\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n	</tr>\n</table>\n<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n	<tr>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"311\" height=\"1\" alt=\"image\" /></td>\n		<td width=\"100%\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"132\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"312\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td style=\"background-color:#F7F9FB;\" colspan=\"2\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-color:#F7F9FB;\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"29\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td style=\"background-image:url(<!--[$imagepath]-->/Footer_r2_c1.jpg)\" colspan=\"2\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-image:url(<!--[$imagepath]-->/Footer_r2_c1.jpg)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"38\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td colspan=\"3\" valign=\"top\" style=\"background-image:url(<!--[$imagepath]-->/Footer_r3_c1.jpg)\">\n			<div align=\"center\">\n				<img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" />\n				&nbsp;<br /><br />\n				<span class=\"slogan\">\n<!--[slogan]-->\n&nbsp;&nbsp;</span><br />\n				<span class=\"pn-sub\">\n<!--[footmsg]-->\n<br /></span>\n			</div>\n		</td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"14\" alt=\"image\" /></td>\n	</tr>\n	<tr>\n		<td style=\"background-image:url(<!--[$imagepath]-->/Footer_r4_c1.jpg)\" colspan=\"2\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td style=\"background-image:url(<!--[$imagepath]-->/Footer_r4_c1.jpg)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\n		<td><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"14\" alt=\"image\" /></td>\n	</tr>\n</table>\n</body>\n</html>\n',1,1,'2005-09-16 16:03:51');
INSERT INTO os_core_theme_tplsource VALUES (15,2,'ccblock.htm','<table style=\"background-color:#F7F9FB;\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n<tr>\r\n<td><img src=\"<!--[$imagepath]-->/box_r1_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td> \r\n<td width=\"100%\" style=\"background-image:url(<!--[$imagepath]-->/box_r1_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n<td><img src=\"<!--[$imagepath]-->/box_r1_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n</tr>\r\n<tr>\r\n<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c1.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n<td valign=\"top\" style=\"background-color:#ffffff;\">\r\n<!--  takes care of title being empty  -->\r\n<!--[if $title != \"\"]-->\r\n<span class=\"leftcontent\">\r\n<!--[$title]-->\r\n</span><br />\r\n<!--[/if]-->\r\n<!--  end takes care of title being empty  -->\r\n<div class=\"storycontent\">\r\n<!--[$content]-->\r\n</div>		\r\n</td>\r\n<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c3.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"<!--[$imagepath]-->/box_r3_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n<td style=\"background-image:url(<!--[$imagepath]-->/box_r3_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n<td><img src=\"<!--[$imagepath]-->/box_r3_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n</tr>\r\n</table>\r\n<br />',1,1,'2005-09-16 16:03:51');
INSERT INTO os_core_theme_tplsource VALUES (16,2,'lsblock.htm','<table style=\"background-color:#F7F9FB;\" cellpadding=\"0\" cellspacing=\"0\" width=\"155\">\r\n<tr>\r\n<td><img src=\"<!--[$imagepath]-->/box_r1_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td> \r\n<td width=\"100%\" style=\"background-image:url(<!--[$imagepath]-->/box_r1_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n<td><img src=\"<!--[$imagepath]-->/box_r1_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n</tr>\r\n<tr>\r\n<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c1.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n<td class=\"leftcontent\" valign=\"top\" style=\"background-color:#ffffff;\">\r\n<div class=\"leftcontent\">\r\n    	<!--[$title]-->\r\n		<br /><br />\r\n<!--[$content]-->\r\n      	</div>\r\n</td>\r\n<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c3.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"<!--[$imagepath]-->/box_r3_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n<td style=\"background-image:url(<!--[$imagepath]-->/box_r3_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n<td><img src=\"<!--[$imagepath]-->/box_r3_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n</tr>\r\n</table>\r\n<br />\r\n',1,1,'2005-09-16 16:03:51');
INSERT INTO os_core_theme_tplsource VALUES (17,2,'mainmenu.htm','<table style=\"background-color:#F7F9FB;\" cellpadding=\"0\" cellspacing=\"0\" width=\"155\">\r\n<tr>\r\n<td><img src=\"<!--[$imagepath]-->/box_r1_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td> \r\n<td width=\"100%\" style=\"background-image:url(<!--[$imagepath]-->/box_r1_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n<td><img src=\"<!--[$imagepath]-->/box_r1_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n</tr>\r\n<tr>\r\n<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c1.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n<td class=\"leftcontent\" valign=\"top\" style=\"background-color:#ffffff;\">\r\n<div class=\"leftcontent\" id=\"mainmenu\">\r\n    	<!--[$title]-->\r\n		<br /><br />\r\n<!--[$content]-->\r\n      	</div>\r\n</td>\r\n<td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c3.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n</tr>\r\n<tr>\r\n<td><img src=\"<!--[$imagepath]-->/box_r3_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n<td style=\"background-image:url(<!--[$imagepath]-->/box_r3_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n<td><img src=\"<!--[$imagepath]-->/box_r3_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n</tr>\r\n</table>\r\n<br />\r\n',1,1,'2005-09-16 16:03:51');
INSERT INTO os_core_theme_tplsource VALUES (18,2,'rsblock.htm','<table style=\"background-color:#F7F9FB;\" cellpadding=\"0\" cellspacing=\"0\" width=\"155\">\r\n  <tr>\r\n   <td><img src=\"<!--[$imagepath]-->/box_r1_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td> <td width=\"100%\" style=\"background-image:url(<!--[$imagepath]-->/box_r1_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n   <td><img src=\"<!--[$imagepath]-->/box_r1_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n  </tr>\r\n  <tr>\r\n    <td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c1.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n    <td valign=\"top\" style=\"background-color:#ffffff;\">\r\n    	<div class=\"leftcontent\">\r\n    	<!--[$title]-->\r\n		<br /><br />\r\n<!--[$content]-->\r\n      	</div>\r\n    </td>\r\n    <td style=\"background-image:url(<!--[$imagepath]-->/box_r2_c3.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n  </tr>\r\n  <tr>\r\n   <td><img src=\"<!--[$imagepath]-->/box_r3_c1.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n    <td style=\"background-image:url(<!--[$imagepath]-->/box_r3_c2.gif)\"><img src=\"<!--[$imagepath]-->/spacer.gif\" width=\"1\" height=\"1\" alt=\"image\" /></td>\r\n   <td><img src=\"<!--[$imagepath]-->/box_r3_c3.gif\" width=\"12\" height=\"13\" alt=\"image\" /></td>\r\n  </tr></table><br />',1,1,'2005-09-16 16:03:51');

--
-- Table structure for table `os_core_theme_zones`
--

DROP TABLE IF EXISTS os_core_theme_zones;
CREATE TABLE os_core_theme_zones (
  zone_id int(3) NOT NULL auto_increment,
  skin_id int(3) NOT NULL default '1',
  name varchar(40) NOT NULL default 'No Name',
  label varchar(255) NOT NULL default 'addon',
  `type` int(1) NOT NULL default '1',
  is_active int(1) NOT NULL default '0',
  skin_type varchar(8) NOT NULL default 'theme',
  PRIMARY KEY  (zone_id),
  KEY `type` (`type`)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_theme_zones`
--

INSERT INTO os_core_theme_zones VALUES (1,1,'Master template','master',0,1,'theme');
INSERT INTO os_core_theme_zones VALUES (2,1,'Left side block','lsblock',0,1,'block');
INSERT INTO os_core_theme_zones VALUES (3,1,'Right side block','rsblock',1,1,'block');
INSERT INTO os_core_theme_zones VALUES (4,1,'News index (standard)','News-index',0,1,'theme');
INSERT INTO os_core_theme_zones VALUES (5,1,'News article','News-article',0,1,'theme');
INSERT INTO os_core_theme_zones VALUES (6,1,'Center block','ccblock',1,1,'block');
INSERT INTO os_core_theme_zones VALUES (7,1,'Default block','dsblock',0,1,'block');
INSERT INTO os_core_theme_zones VALUES (8,2,'Master template','master',0,1,'theme');
INSERT INTO os_core_theme_zones VALUES (9,2,'Left side block','lsblock',0,1,'block');
INSERT INTO os_core_theme_zones VALUES (10,2,'Right side block','rsblock',1,1,'block');
INSERT INTO os_core_theme_zones VALUES (11,2,'OpenTable1','table1',0,1,'theme');
INSERT INTO os_core_theme_zones VALUES (12,2,'OpenTable2','table2',0,1,'theme');
INSERT INTO os_core_theme_zones VALUES (13,2,'News index (standard)','News-index',0,1,'theme');
INSERT INTO os_core_theme_zones VALUES (14,2,'News article','News-article',0,1,'theme');
INSERT INTO os_core_theme_zones VALUES (15,2,'Main menu block','mainmenu',1,1,'block');
INSERT INTO os_core_theme_zones VALUES (16,2,'_TM_CENTERB','ccblock',1,1,'block');
INSERT INTO os_core_theme_zones VALUES (17,2,'Admin pages','*admin',1,1,'module');
INSERT INTO os_core_theme_zones VALUES (18,2,'Homepage','*home',1,1,'module');

--
-- Table structure for table `os_core_topics`
--

DROP TABLE IF EXISTS os_core_topics;
CREATE TABLE os_core_topics (
  pn_topicid tinyint(4) NOT NULL auto_increment,
  pn_topicname varchar(255) default NULL,
  pn_topicimage varchar(255) default NULL,
  pn_topictext varchar(255) default NULL,
  pn_counter int(11) NOT NULL default '0',
  PRIMARY KEY  (pn_topicid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_topics`
--

INSERT INTO os_core_topics VALUES (1,'PostNuke','PostNuke.gif','PostNuke',0);
INSERT INTO os_core_topics VALUES (2,'Linux','linux.gif','Linux',1);

--
-- Table structure for table `os_core_trssnewscats`
--

DROP TABLE IF EXISTS os_core_trssnewscats;
CREATE TABLE os_core_trssnewscats (
  id_cat int(11) NOT NULL auto_increment,
  cat_name varchar(255) NOT NULL default '',
  parent_id int(11) NOT NULL default '0',
  cat_image varchar(250) NOT NULL default '',
  PRIMARY KEY  (id_cat)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_trssnewscats`
--


--
-- Table structure for table `os_core_trssnewsfeeds`
--

DROP TABLE IF EXISTS os_core_trssnewsfeeds;
CREATE TABLE os_core_trssnewsfeeds (
  id int(11) NOT NULL auto_increment,
  id_cat int(11) NOT NULL default '0',
  feedname varchar(50) NOT NULL default '',
  feedsource text,
  feed_title varchar(250) NOT NULL default '',
  feed_description text,
  feed_image varchar(250) NOT NULL default '',
  feed_image_link varchar(250) NOT NULL default '',
  feed_image_width int(11) NOT NULL default '0',
  feed_image_height int(11) NOT NULL default '0',
  active tinyint(4) NOT NULL default '1',
  userid int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_trssnewsfeeds`
--


--
-- Table structure for table `os_core_trssnewsitems`
--

DROP TABLE IF EXISTS os_core_trssnewsitems;
CREATE TABLE os_core_trssnewsitems (
  id int(11) NOT NULL auto_increment,
  source_id int(11) NOT NULL default '0',
  item_title text,
  item_link varchar(250) NOT NULL default '',
  item_pic_img varchar(250) NOT NULL default '',
  item_pic_link varchar(250) NOT NULL default '',
  item_pic_width int(11) NOT NULL default '0',
  item_pic_height int(11) NOT NULL default '0',
  item_description text,
  item_pubdate datetime NOT NULL default '0000-00-00 00:00:00',
  click bigint(20) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY linkindex (item_link)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_trssnewsitems`
--


--
-- Table structure for table `os_core_user_data`
--

DROP TABLE IF EXISTS os_core_user_data;
CREATE TABLE os_core_user_data (
  pn_uda_id int(11) NOT NULL auto_increment,
  pn_uda_propid int(11) NOT NULL default '0',
  pn_uda_uid int(11) NOT NULL default '0',
  pn_uda_value mediumblob NOT NULL,
  PRIMARY KEY  (pn_uda_id),
  UNIQUE KEY index_id_propid (pn_uda_propid,pn_uda_id),
  KEY idx_uid (pn_uda_uid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_user_data`
--


--
-- Table structure for table `os_core_user_perms`
--

DROP TABLE IF EXISTS os_core_user_perms;
CREATE TABLE os_core_user_perms (
  pn_pid int(11) NOT NULL auto_increment,
  pn_uid int(11) NOT NULL default '0',
  pn_sequence int(6) NOT NULL default '0',
  pn_realm int(4) NOT NULL default '0',
  pn_component varchar(255) NOT NULL default '',
  pn_instance varchar(255) NOT NULL default '',
  pn_level int(4) NOT NULL default '0',
  pn_bond int(2) NOT NULL default '0',
  PRIMARY KEY  (pn_pid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_user_perms`
--


--
-- Table structure for table `os_core_user_property`
--

DROP TABLE IF EXISTS os_core_user_property;
CREATE TABLE os_core_user_property (
  pn_prop_id int(11) NOT NULL auto_increment,
  pn_prop_label varchar(255) NOT NULL default '',
  pn_prop_dtype int(11) NOT NULL default '0',
  pn_prop_length int(11) NOT NULL default '255',
  pn_prop_weight int(11) NOT NULL default '0',
  pn_prop_validation varchar(255) default NULL,
  PRIMARY KEY  (pn_prop_id),
  UNIQUE KEY pn_prop_label (pn_prop_label)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_user_property`
--

INSERT INTO os_core_user_property VALUES (1,'_UREALNAME',0,255,1,NULL);
INSERT INTO os_core_user_property VALUES (2,'_UREALEMAIL',-1,255,2,NULL);
INSERT INTO os_core_user_property VALUES (3,'_UFAKEMAIL',0,255,3,NULL);
INSERT INTO os_core_user_property VALUES (4,'_YOURHOMEPAGE',0,255,4,NULL);
INSERT INTO os_core_user_property VALUES (5,'_TIMEZONEOFFSET',0,255,5,NULL);
INSERT INTO os_core_user_property VALUES (6,'_YOURAVATAR',0,255,6,NULL);
INSERT INTO os_core_user_property VALUES (7,'_YICQ',0,255,7,NULL);
INSERT INTO os_core_user_property VALUES (8,'_YAIM',0,255,8,NULL);
INSERT INTO os_core_user_property VALUES (9,'_YYIM',0,255,9,NULL);
INSERT INTO os_core_user_property VALUES (10,'_YMSNM',0,255,10,NULL);
INSERT INTO os_core_user_property VALUES (11,'_YLOCATION',0,255,11,NULL);
INSERT INTO os_core_user_property VALUES (12,'_YOCCUPATION',0,255,12,NULL);
INSERT INTO os_core_user_property VALUES (13,'_YINTERESTS',0,255,13,NULL);
INSERT INTO os_core_user_property VALUES (14,'_SIGNATURE',0,255,14,NULL);
INSERT INTO os_core_user_property VALUES (15,'_EXTRAINFO',0,255,15,NULL);
INSERT INTO os_core_user_property VALUES (16,'_PASSWORD',-1,255,16,NULL);

--
-- Table structure for table `os_core_userblocks`
--

DROP TABLE IF EXISTS os_core_userblocks;
CREATE TABLE os_core_userblocks (
  pn_uid int(11) NOT NULL default '0',
  pn_bid int(11) NOT NULL default '0',
  pn_active tinyint(3) NOT NULL default '1',
  pn_last_update timestamp NOT NULL,
  KEY idx_ub (pn_uid,pn_bid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_userblocks`
--

INSERT INTO os_core_userblocks VALUES (2,1,1,'2005-09-04 01:09:57');
INSERT INTO os_core_userblocks VALUES (2,3,1,'2005-09-04 01:09:57');
INSERT INTO os_core_userblocks VALUES (2,8,1,'2005-09-04 01:09:57');
INSERT INTO os_core_userblocks VALUES (2,15,1,'2005-09-04 01:09:57');
INSERT INTO os_core_userblocks VALUES (2,16,1,'2005-09-09 19:39:44');
INSERT INTO os_core_userblocks VALUES (2,30,1,'2005-09-16 16:04:35');
INSERT INTO os_core_userblocks VALUES (2,26,1,'2005-09-16 16:39:59');
INSERT INTO os_core_userblocks VALUES (2,33,1,'2005-09-16 16:39:59');
INSERT INTO os_core_userblocks VALUES (2,2,1,'2005-09-19 20:02:13');
INSERT INTO os_core_userblocks VALUES (2,37,1,'2005-09-19 20:09:39');
INSERT INTO os_core_userblocks VALUES (2,47,1,'2005-09-19 20:25:38');
INSERT INTO os_core_userblocks VALUES (2,9,1,'2005-10-08 19:22:41');
INSERT INTO os_core_userblocks VALUES (2,13,1,'2005-10-08 19:22:42');
INSERT INTO os_core_userblocks VALUES (2,21,1,'2005-10-08 19:22:42');
INSERT INTO os_core_userblocks VALUES (2,19,1,'2005-10-08 19:22:42');
INSERT INTO os_core_userblocks VALUES (2,17,1,'2005-10-08 19:22:42');
INSERT INTO os_core_userblocks VALUES (2,23,1,'2005-10-08 19:22:42');
INSERT INTO os_core_userblocks VALUES (2,6,1,'2005-11-05 16:36:12');
INSERT INTO os_core_userblocks VALUES (2,10,1,'2005-11-06 17:23:26');
INSERT INTO os_core_userblocks VALUES (2,14,1,'2005-11-06 17:23:26');
INSERT INTO os_core_userblocks VALUES (2,22,1,'2005-11-06 17:23:26');
INSERT INTO os_core_userblocks VALUES (2,20,1,'2005-11-06 17:23:26');
INSERT INTO os_core_userblocks VALUES (2,18,1,'2005-11-06 17:23:26');
INSERT INTO os_core_userblocks VALUES (2,24,1,'2005-11-06 17:23:26');
INSERT INTO os_core_userblocks VALUES (3,9,1,'2006-05-03 23:36:16');
INSERT INTO os_core_userblocks VALUES (3,13,1,'2006-05-03 23:36:16');
INSERT INTO os_core_userblocks VALUES (3,21,1,'2006-05-03 23:36:16');
INSERT INTO os_core_userblocks VALUES (3,19,1,'2006-05-03 23:36:16');
INSERT INTO os_core_userblocks VALUES (3,15,1,'2006-05-03 23:36:16');
INSERT INTO os_core_userblocks VALUES (3,17,1,'2006-05-03 23:36:16');
INSERT INTO os_core_userblocks VALUES (3,23,1,'2006-05-03 23:36:16');

--
-- Table structure for table `os_core_users`
--

DROP TABLE IF EXISTS os_core_users;
CREATE TABLE os_core_users (
  pn_uid int(11) NOT NULL auto_increment,
  pn_name varchar(60) NOT NULL default '',
  pn_uname varchar(25) NOT NULL default '',
  pn_email varchar(60) NOT NULL default '',
  pn_femail varchar(60) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_user_avatar varchar(30) default NULL,
  pn_user_regdate varchar(20) NOT NULL default '',
  pn_user_icq varchar(15) default NULL,
  pn_user_occ varchar(100) default NULL,
  pn_user_from varchar(100) default NULL,
  pn_user_intrest varchar(150) default NULL,
  pn_user_sig varchar(255) default NULL,
  pn_user_viewemail tinyint(2) default NULL,
  pn_user_theme tinyint(3) default NULL,
  pn_user_aim varchar(18) default NULL,
  pn_user_yim varchar(25) default NULL,
  pn_user_msnm varchar(25) default NULL,
  pn_pass varchar(40) NOT NULL default '',
  pn_storynum tinyint(4) NOT NULL default '10',
  pn_umode varchar(10) NOT NULL default '',
  pn_uorder tinyint(1) NOT NULL default '0',
  pn_thold tinyint(1) NOT NULL default '0',
  pn_noscore tinyint(1) NOT NULL default '0',
  pn_bio tinytext NOT NULL,
  pn_ublockon tinyint(1) NOT NULL default '0',
  pn_ublock text NOT NULL,
  pn_theme varchar(255) NOT NULL default '',
  pn_commentmax int(11) NOT NULL default '4096',
  pn_counter int(11) NOT NULL default '0',
  pn_timezone_offset float(3,1) NOT NULL default '0.0',
  PRIMARY KEY  (pn_uid),
  KEY idx_uname (pn_uname)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_users`
--

INSERT INTO os_core_users VALUES (1,'','Anonymous','','','','blank.gif','1125767375','','','','','',0,0,'','','','',10,'',0,0,0,'',0,'','',4096,0,12.0);
INSERT INTO os_core_users VALUES (2,'admin','admin','openstar@example.com','','http://www.open-star.com','blank.gif','1125767375','','','','','',0,0,'','','','21232f297a57a5a743894a0e4a801fc3',10,'',0,0,0,'',0,'','',4096,0,12.0);
INSERT INTO os_core_users VALUES (3,'','test','test@test.com','','','blank.gif','1146692133','','','','','',0,NULL,'','','','098f6bcd4621d373cade4e832627b4f6',10,'',0,0,0,'',0,'','',4096,0,12.0);

--
-- Table structure for table `os_core_v4b_accounting_account`
--

DROP TABLE IF EXISTS os_core_v4b_accounting_account;
CREATE TABLE os_core_v4b_accounting_account (
  acc_id int(10) unsigned NOT NULL auto_increment,
  acc_code varchar(10) NOT NULL default '',
  acc_name varchar(60) NOT NULL default '',
  acc_category_id int(11) default NULL,
  acc_company_id int(11) default NULL,
  acc_type char(1) NOT NULL default 'C',
  acc_factor int(1) NOT NULL default '1',
  acc_status char(1) NOT NULL default 'A',
  acc_obj_status char(1) NOT NULL default 'A',
  acc_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  acc_cr_uid int(11) NOT NULL default '0',
  acc_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  acc_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (acc_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_accounting_account`
--


--
-- Table structure for table `os_core_v4b_accounting_entrytype`
--

DROP TABLE IF EXISTS os_core_v4b_accounting_entrytype;
CREATE TABLE os_core_v4b_accounting_entrytype (
  etp_id int(10) unsigned NOT NULL auto_increment,
  etp_account_id int(11) NOT NULL default '0',
  etp_tax_id int(11) NOT NULL default '0',
  etp_tax_account_id int(11) NOT NULL default '0',
  etp_name varchar(60) NOT NULL default '',
  etp_status char(1) NOT NULL default 'A',
  etp_description varchar(255) default NULL,
  etp_obj_status char(1) NOT NULL default 'A',
  etp_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  etp_cr_uid int(11) NOT NULL default '0',
  etp_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  etp_lu_uid int(11) NOT NULL default '0',
  etp_dbl_account_id int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (etp_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_accounting_entrytype`
--


--
-- Table structure for table `os_core_v4b_accounting_gl_entry`
--

DROP TABLE IF EXISTS os_core_v4b_accounting_gl_entry;
CREATE TABLE os_core_v4b_accounting_gl_entry (
  gle_id int(10) unsigned NOT NULL auto_increment,
  gle_entrytype_id int(11) NOT NULL default '0',
  gle_account varchar(10) NOT NULL default '',
  gle_amount double NOT NULL default '0',
  gle_date datetime default NULL,
  gle_ref_id int(11) default NULL,
  gle_company_id int(11) default NULL,
  gle_customer_id int(11) default NULL,
  gle_currency char(3) NOT NULL default 'EUR',
  gle_module varchar(40) default NULL,
  gle_table varchar(40) default NULL,
  gle_idcolumn varchar(40) default NULL,
  gle_obj_id varchar(40) default NULL,
  gle_status char(1) NOT NULL default 'C',
  gle_comment varchar(255) default NULL,
  gle_obj_status char(1) NOT NULL default 'A',
  gle_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  gle_cr_uid int(11) NOT NULL default '0',
  gle_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  gle_lu_uid int(11) NOT NULL default '0',
  gle_category_id int(11) NOT NULL default '0',
  PRIMARY KEY  (gle_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_accounting_gl_entry`
--


--
-- Table structure for table `os_core_v4b_accounting_tax`
--

DROP TABLE IF EXISTS os_core_v4b_accounting_tax;
CREATE TABLE os_core_v4b_accounting_tax (
  tax_id int(10) unsigned NOT NULL auto_increment,
  tax_code varchar(10) NOT NULL default '',
  tax_name varchar(60) NOT NULL default '',
  tax_rate double NOT NULL default '0',
  tax_obj_status char(1) NOT NULL default 'A',
  tax_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  tax_cr_uid int(11) NOT NULL default '0',
  tax_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  tax_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (tax_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_accounting_tax`
--


--
-- Table structure for table `os_core_v4b_addressbook_company`
--

DROP TABLE IF EXISTS os_core_v4b_addressbook_company;
CREATE TABLE os_core_v4b_addressbook_company (
  acm_id int(10) unsigned NOT NULL auto_increment,
  acm_name varchar(80) NOT NULL default '',
  acm_sortname varchar(80) NOT NULL default '',
  acm_type_cat_val varchar(64) default NULL,
  acm_status_cat_val varchar(64) default NULL,
  acm_obj_status char(1) NOT NULL default 'A',
  acm_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  acm_cr_uid int(11) NOT NULL default '0',
  acm_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  acm_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (acm_id),
  KEY idx_company_1 (acm_name),
  KEY idx_company_2 (acm_sortname)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_addressbook_company`
--


--
-- Table structure for table `os_core_v4b_addressbook_company_branch`
--

DROP TABLE IF EXISTS os_core_v4b_addressbook_company_branch;
CREATE TABLE os_core_v4b_addressbook_company_branch (
  acb_id int(10) unsigned NOT NULL auto_increment,
  acb_company_id int(10) unsigned NOT NULL default '0',
  acb_name varchar(80) NOT NULL default '',
  acb_sortname varchar(80) NOT NULL default '',
  acb_type_cat_val varchar(64) default NULL,
  acb_status_cat_val varchar(64) default NULL,
  acb_obj_status char(1) NOT NULL default 'A',
  acb_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  acb_cr_uid int(11) NOT NULL default '0',
  acb_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  acb_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (acb_id),
  KEY idx_branch_1 (acb_name),
  KEY idx_branch_2 (acb_sortname)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_addressbook_company_branch`
--


--
-- Table structure for table `os_core_v4b_addressbook_contact`
--

DROP TABLE IF EXISTS os_core_v4b_addressbook_contact;
CREATE TABLE os_core_v4b_addressbook_contact (
  aco_id int(10) unsigned NOT NULL auto_increment,
  aco_id_nr int(11) NOT NULL default '0',
  aco_company_id int(11) default NULL,
  aco_branch_id int(11) default NULL,
  aco_type_cat_val varchar(64) default NULL,
  aco_anrede varchar(64) default NULL,
  aco_title varchar(64) default NULL,
  aco_gender varchar(64) NOT NULL default '',
  aco_name_first varchar(40) NOT NULL default '',
  aco_name_middle varchar(40) NOT NULL default '',
  aco_name_last varchar(40) NOT NULL default '',
  aco_sortname_first varchar(40) NOT NULL default '',
  aco_sortname_middle varchar(40) NOT NULL default '',
  aco_sortname_last varchar(40) NOT NULL default '',
  aco_birthdate datetime NOT NULL default '0000-00-00 00:00:00',
  aco_function varchar(80) default NULL,
  aco_newsletter int(1) default '0',
  aco_nationality_cat_val varchar(64) default NULL,
  aco_addr_street1 varchar(80) default NULL,
  aco_addr_street2 varchar(80) default NULL,
  aco_addr_zip varchar(10) default NULL,
  aco_addr_city varchar(80) default NULL,
  aco_addr_state varchar(80) default NULL,
  aco_addr_country char(3) NOT NULL default 'DEU',
  aco_addr_phone1 varchar(40) default NULL,
  aco_addr_phone2 varchar(15) default NULL,
  aco_addr_mobile1 varchar(40) default NULL,
  aco_addr_mobile2 varchar(40) default NULL,
  aco_addr_fax1 varchar(40) default NULL,
  aco_addr_fax2 varchar(40) default NULL,
  aco_addr_email1 varchar(255) default NULL,
  aco_addr_email2 varchar(255) default NULL,
  aco_addr_homepage varchar(255) default NULL,
  aco_additional varchar(255) default NULL,
  aco_comments varchar(255) default NULL,
  aco_commerce int(1) default '0',
  aco_bank_name varchar(20) default NULL,
  aco_bank_city varchar(80) default NULL,
  aco_bank_account varchar(20) default NULL,
  aco_bank_code varchar(20) default NULL,
  aco_bank_iban varchar(20) default NULL,
  aco_bank_lsb_nr varchar(20) default NULL,
  aco_bank_pay_type_cat_val varchar(64) default NULL,
  aco_pending_status char(1) NOT NULL default 'P',
  aco_user_record int(11) default NULL,
  aco_image varchar(80) default NULL,
  aco_is_private char(1) NOT NULL default 'N',
  aco_obj_status char(1) NOT NULL default 'A',
  aco_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  aco_cr_uid int(11) NOT NULL default '0',
  aco_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  aco_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (aco_id),
  KEY idx_contact_1 (aco_pending_status,aco_is_private,aco_company_id,aco_branch_id,aco_addr_country,aco_addr_city,aco_name_last,aco_name_first,aco_cr_date),
  KEY idx_contact_2 (aco_pending_status,aco_is_private,aco_cr_date),
  KEY idx_contact_3 (aco_pending_status,aco_is_private,aco_name_last),
  KEY idx_contact_4 (aco_pending_status,aco_is_private,aco_name_first),
  KEY idx_contact_5 (aco_pending_status,aco_is_private,aco_addr_city),
  KEY idx_contact_6 (aco_pending_status,aco_is_private,aco_addr_phone1),
  KEY idx_contact_7 (aco_pending_status,aco_is_private,aco_addr_email1),
  KEY idx_contact_8 (aco_pending_status,aco_is_private,aco_sortname_last),
  KEY idx_contact_9 (aco_pending_status,aco_is_private,aco_sortname_first)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_addressbook_contact`
--


--
-- Table structure for table `os_core_v4b_addressbook_contact_category`
--

DROP TABLE IF EXISTS os_core_v4b_addressbook_contact_category;
CREATE TABLE os_core_v4b_addressbook_contact_category (
  acc_contact_id int(11) NOT NULL default '0',
  acc_category_cat_val varchar(64) NOT NULL default '',
  acc_obj_status char(1) NOT NULL default 'A',
  acc_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  acc_cr_uid int(11) NOT NULL default '0',
  acc_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  acc_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (acc_contact_id,acc_category_cat_val)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_addressbook_contact_category`
--


--
-- Table structure for table `os_core_v4b_addressbook_favourite`
--

DROP TABLE IF EXISTS os_core_v4b_addressbook_favourite;
CREATE TABLE os_core_v4b_addressbook_favourite (
  afv_owner_uid int(11) NOT NULL default '0',
  afv_contact_id int(11) NOT NULL default '0',
  avf_obj_status char(1) NOT NULL default 'A',
  avf_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  avf_cr_uid int(11) NOT NULL default '0',
  avf_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  avf_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (afv_owner_uid,afv_contact_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_addressbook_favourite`
--


--
-- Table structure for table `os_core_v4b_categories_category`
--

DROP TABLE IF EXISTS os_core_v4b_categories_category;
CREATE TABLE os_core_v4b_categories_category (
  cat_id int(11) NOT NULL auto_increment,
  cat_parent_id int(11) NOT NULL default '0',
  cat_name varchar(255) NOT NULL default '',
  cat_value varchar(255) NOT NULL default '-1',
  cat_sort_value int(11) NOT NULL default '0',
  cat_display_name text NOT NULL,
  cat_display_desc text NOT NULL,
  cat_data1 varchar(255) NOT NULL default '',
  cat_data1_domain varchar(255) NOT NULL default '',
  cat_data2 varchar(255) NOT NULL default '',
  cat_data2_domain varchar(255) NOT NULL default '',
  cat_data3 varchar(255) NOT NULL default '',
  cat_data3_domain varchar(255) NOT NULL default '',
  cat_data4 varchar(255) NOT NULL default '',
  cat_data4_domain varchar(255) NOT NULL default '',
  cat_data5 varchar(255) NOT NULL default '',
  cat_data5_domain varchar(255) NOT NULL default '',
  cat_security_domain varchar(255) NOT NULL default 'v4bCategories',
  cat_path text NOT NULL,
  cat_ipath varchar(255) NOT NULL default '',
  cat_status char(1) NOT NULL default 'A',
  cat_obj_status char(1) NOT NULL default 'A',
  cat_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  cat_cr_uid int(11) NOT NULL default '0',
  cat_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  cat_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (cat_id),
  KEY idx_categories_parent (cat_parent_id),
  KEY idx_categories_name (cat_name),
  KEY idx_categories_ipath (cat_ipath),
  KEY idx_categories_security_domain (cat_security_domain),
  KEY idx_categories_status (cat_status),
  KEY idx_categories_ipath_status (cat_ipath,cat_status)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_categories_category`
--

INSERT INTO os_core_v4b_categories_category VALUES (1,0,'__SYSTEM__','-1',0,'b:0;','b:0;','','','','','','','','','','','v4bCategories::','/__SYSTEM__','/1','A','A','2005-11-13 01:42:56',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (2,1,'Modules','-1',0,'a:2:{s:3:\"deu\";s:6:\"Module\";s:3:\"eng\";s:7:\"Modules\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules','/1/2','A','A','2004-12-16 20:12:35',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (3,2,'Projectmanagement','-1',0,'a:2:{s:3:\"deu\";s:17:\"Projektmanagement\";s:3:\"eng\";s:18:\"Project Management\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement','/1/2/3','A','A','2004-12-16 20:14:48',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (4,3,'Projects','-1',0,'a:2:{s:3:\"deu\";s:8:\"Projekte\";s:3:\"eng\";s:8:\"Projects\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/Projects','/1/2/3/4','A','A','2004-12-16 20:15:10',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (5,4,'Priority','-1',0,'a:2:{s:3:\"deu\";s:9:\"Priorität\";s:3:\"eng\";s:8:\"Priority\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Priority','/1/2/3/4/5','A','A','2004-12-16 20:29:02',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (6,5,'1 - Highest','10',10,'a:2:{s:3:\"eng\";s:7:\"Highest\";s:3:\"deu\";s:7:\"Höchste\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Priority/1 - Highest','/1/2/3/4/5/6','A','A','2004-12-16 20:31:37',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (7,5,'2 - High','20',20,'a:2:{s:3:\"deu\";s:4:\"Hoch\";s:3:\"eng\";s:4:\"High\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Priority/2 - High','/1/2/3/4/5/7','A','A','2004-12-16 20:32:16',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (8,5,'3 - Medium','30',30,'a:2:{s:3:\"deu\";s:6:\"Normal\";s:3:\"eng\";s:6:\"Medium\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Priority/3 - Medium','/1/2/3/4/5/8','A','A','2004-12-16 20:32:56',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (9,5,'4 - Low','40',40,'a:2:{s:3:\"deu\";s:7:\"Niedrig\";s:3:\"eng\";s:3:\"Low\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Priority/4 - Low','/1/2/3/4/5/9','A','A','2004-12-16 20:33:41',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (10,5,'5 - Lowest','50',50,'a:2:{s:3:\"deu\";s:10:\"Niedrigste\";s:3:\"eng\";s:6:\"Lowest\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Priority/5 - Lowest','/1/2/3/4/5/10','A','A','2004-12-16 20:34:05',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (11,4,'Status','-1',0,'a:2:{s:3:\"deu\";s:6:\"Status\";s:3:\"eng\";s:6:\"Status\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','-1','IsActive','-1','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Status','/1/2/3/4/11','A','A','2004-12-21 23:18:58',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (12,11,'1 - Not Yet Commenced','NOTCOMMENCED',0,'a:2:{s:3:\"deu\";s:21:\"Noch nicht angefangen\";s:3:\"eng\";s:17:\"Not yet commenced\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Status/1 - Not Yet Commenced','/1/2/3/4/11/12','A','A','2004-12-21 23:22:06',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (13,11,'2 - Commenced','COMMENCED',0,'a:2:{s:3:\"deu\";s:10:\"Angefangen\";s:3:\"eng\";s:9:\"Commenced\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/Projects/Status/2 - Commenced','/1/2/3/4/11/13','A','A','2004-12-21 23:23:34',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (14,11,'3 - Finished','FINISHED',0,'a:2:{s:3:\"deu\";s:14:\"Fertiggestellt\";s:3:\"eng\";s:8:\"Finished\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','1','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Status/3 - Finished','/1/2/3/4/11/14','A','A','2004-12-21 23:24:43',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (15,11,'4 - Abgebrochen','CANCELLED',0,'a:2:{s:3:\"deu\";s:11:\"Abgebrochen\";s:3:\"eng\";s:9:\"Cancelled\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Status/4 - Abgebrochen','/1/2/3/4/11/15','A','A','2004-12-21 23:25:58',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (16,11,'5 - On Hold','ONHOLD',0,'a:2:{s:3:\"deu\";s:10:\"Angehalten\";s:3:\"eng\";s:7:\"On Hold\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Status/5 - On Hold','/1/2/3/4/11/16','A','A','2004-12-21 23:27:07',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (17,3,'Todos','-1',0,'a:2:{s:3:\"deu\";s:5:\"Todos\";s:3:\"eng\";s:5:\"Todos\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/Todos','/1/2/3/17','A','A','2004-12-26 18:39:22',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (18,31,'000 - 0%','0.0',0,'a:2:{s:3:\"deu\";s:2:\"0%\";s:3:\"eng\";s:2:\"0%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/000 - 0%','/1/2/3/17/31/18','A','A','2004-12-26 18:49:09',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (19,31,'010 - 10%','0.1',0,'a:2:{s:3:\"deu\";s:3:\"10%\";s:3:\"eng\";s:3:\"10%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/010 - 10%','/1/2/3/17/31/19','A','A','2004-12-26 18:50:34',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (20,31,'020 - 20%','0.2',0,'a:2:{s:3:\"deu\";s:3:\"20%\";s:3:\"eng\";s:3:\"20%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/020 - 20%','/1/2/3/17/31/20','A','A','2004-12-26 18:51:26',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (21,31,'030 - 30%','0.3',0,'a:2:{s:3:\"deu\";s:3:\"30%\";s:3:\"eng\";s:3:\"30%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/030 - 30%','/1/2/3/17/31/21','A','A','2004-12-26 18:52:13',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (22,31,'040 - 40%','0.4',0,'a:2:{s:3:\"deu\";s:3:\"40%\";s:3:\"eng\";s:3:\"40%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/040 - 40%','/1/2/3/17/31/22','A','A','2004-12-26 18:53:24',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (23,31,'050 - 50%','0.5',0,'a:2:{s:3:\"deu\";s:3:\"50%\";s:3:\"eng\";s:3:\"50%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/050 - 50%','/1/2/3/17/31/23','A','A','2004-12-26 18:53:46',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (24,31,'060 - 60%','0.6',0,'a:2:{s:3:\"deu\";s:3:\"60%\";s:3:\"eng\";s:3:\"60%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/060 - 60%','/1/2/3/17/31/24','A','A','2004-12-26 18:54:32',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (25,31,'070 - 70%','0.7',0,'a:2:{s:3:\"deu\";s:3:\"70%\";s:3:\"eng\";s:3:\"70%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/070 - 70%','/1/2/3/17/31/25','A','A','2004-12-26 18:55:05',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (26,31,'080 - 80%','0.8',0,'a:2:{s:3:\"deu\";s:3:\"80%\";s:3:\"eng\";s:3:\"80%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/080 - 80%','/1/2/3/17/31/26','A','A','2004-12-26 18:55:28',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (27,31,'090 - 90%','0.9',0,'a:2:{s:3:\"deu\";s:3:\"90%\";s:3:\"eng\";s:3:\"90%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/090 - 90%','/1/2/3/17/31/27','A','A','2004-12-26 18:55:57',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (28,31,'100 - 100%','1',0,'a:2:{s:3:\"deu\";s:4:\"100%\";s:3:\"eng\";s:4:\"100%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','1','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/100 - 100%','/1/2/3/17/31/28','A','A','2004-12-26 18:56:31',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (29,31,'110 - OnHold','OnHold',0,'a:2:{s:3:\"deu\";s:10:\"Angehalten\";s:3:\"eng\";s:7:\"On Hold\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/110 - OnHold','/1/2/3/17/31/29','A','A','2004-12-26 18:57:32',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (30,31,'120 - Cancelled','Cancelled',0,'a:2:{s:3:\"deu\";s:11:\"Abgebrochen\";s:3:\"eng\";s:9:\"Cancelled\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/120 - Cancelled','/1/2/3/17/31/30','A','A','2004-12-26 18:58:14',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (31,17,'Status','-1',0,'a:2:{s:3:\"deu\";s:6:\"Status\";s:3:\"eng\";s:6:\"Status\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','-1','IsActive','-1','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status','/1/2/3/17/31','A','A','2004-12-26 19:07:30',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (32,17,'Priority','-1',0,'a:2:{s:3:\"deu\";s:9:\"Priorität\";s:3:\"eng\";s:8:\"Priority\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Priority','/1/2/3/17/32','A','A','2005-01-04 20:32:10',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (33,32,'1 - Highest','10',10,'a:2:{s:3:\"deu\";s:7:\"Höchste\";s:3:\"eng\";s:7:\"Highest\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Priority/1 - Highest','/1/2/3/17/32/33','A','A','2005-01-04 20:32:10',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (34,32,'2 - High','20',20,'a:2:{s:3:\"deu\";s:4:\"Hoch\";s:3:\"eng\";s:4:\"High\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Priority/2 - High','/1/2/3/17/32/34','A','A','2005-01-04 20:32:10',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (35,32,'3 - Medium','30',30,'a:2:{s:3:\"deu\";s:6:\"Normal\";s:3:\"eng\";s:6:\"Medium\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Priority/3 - Medium','/1/2/3/17/32/35','A','A','2005-01-04 20:32:10',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (36,32,'4 - Low','40',40,'a:2:{s:3:\"deu\";s:7:\"Niedrig\";s:3:\"eng\";s:3:\"Low\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Priority/4 - Low','/1/2/3/17/32/36','A','A','2005-01-04 20:32:10',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (37,32,'5 - Lowest','50',50,'a:2:{s:3:\"deu\";s:10:\"Niedrigste\";s:3:\"eng\";s:6:\"Lowest\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Priority/5 - Lowest','/1/2/3/17/32/37','A','A','2005-01-04 20:32:10',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (38,47,'Tasks','-1',0,'a:2:{s:3:\"deu\";s:11:\"Tätigkeiten\";s:3:\"eng\";s:5:\"Tasks\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks','/1/2/3/47/38','A','A','2005-01-04 23:33:24',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (40,38,'Analysis','ANA',0,'a:2:{s:3:\"deu\";s:7:\"Analyse\";s:3:\"eng\";s:8:\"Analysis\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Analysis','/1/2/3/47/38/40','A','A','2005-01-04 23:35:56',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (41,38,'Design','DES',0,'a:2:{s:3:\"deu\";s:6:\"Design\";s:3:\"eng\";s:6:\"Design\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Design','/1/2/3/47/38/41','A','A','2005-01-04 23:36:32',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (42,38,'Implementation','IMP',0,'a:2:{s:3:\"deu\";s:15:\"Implementierung\";s:3:\"eng\";s:14:\"Implementation\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Implementation','/1/2/3/47/38/42','A','A','2005-01-04 23:37:11',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (43,38,'Documentation','DOC',0,'a:2:{s:3:\"deu\";s:13:\"Dokumentation\";s:3:\"eng\";s:13:\"Documentation\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Documentation','/1/2/3/47/38/43','A','A','2005-01-04 23:38:13',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (44,38,'Bug Fixing','BUG',0,'a:2:{s:3:\"deu\";s:14:\"Fehlerbehebung\";s:3:\"eng\";s:10:\"Bug Fixing\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Bug Fixing','/1/2/3/47/38/44','A','A','2005-01-04 23:39:53',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (45,38,'Support','SUP',0,'a:2:{s:3:\"deu\";s:7:\"Support\";s:3:\"eng\";s:7:\"Support\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Support','/1/2/3/47/38/45','A','A','2005-01-04 23:40:24',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (46,38,'Research','RES',0,'a:2:{s:3:\"deu\";s:9:\"Forschung\";s:3:\"eng\";s:8:\"Research\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Research','/1/2/3/47/38/46','A','A','2005-01-04 23:44:22',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (47,3,'General','-1',0,'a:2:{s:3:\"deu\";s:9:\"Allgemein\";s:3:\"eng\";s:7:\"General\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General','/1/2/3/47','A','A','2005-01-05 12:57:15',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (48,47,'Customer Status','-1',0,'a:2:{s:3:\"deu\";s:12:\"Kundenstatus\";s:3:\"eng\";s:15:\"Customer Status\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Customer Status','/1/2/3/47/48','A','A','2005-01-05 12:59:09',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (49,48,'Prospect','P',0,'a:2:{s:3:\"deu\";s:8:\"Prospect\";s:3:\"eng\";s:8:\"Prospect\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Customer Status/Prospect','/1/2/3/47/48/49','A','A','2005-01-05 13:01:12',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (50,48,'Negotations','N',0,'a:2:{s:3:\"deu\";s:14:\"In Verhandlung\";s:3:\"eng\";s:15:\"In Negotiations\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Customer Status/Negotations','/1/2/3/47/48/50','A','A','2005-01-05 13:02:14',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (51,48,'Customer','C',0,'a:2:{s:3:\"deu\";s:5:\"Kunde\";s:3:\"eng\";s:8:\"Customer\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Customer Status/Customer','/1/2/3/47/48/51','A','A','2005-01-05 13:02:48',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (52,48,'Ex Customer','E',0,'a:2:{s:3:\"deu\";s:8:\"Ex Kunde\";s:3:\"eng\";s:11:\"Ex Customer\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Customer Status/Ex Customer','/1/2/3/47/48/52','A','A','2005-01-05 13:04:12',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (53,48,'Defunct','D',0,'a:2:{s:3:\"deu\";s:9:\"Insolvent\";s:3:\"eng\";s:7:\"Defunct\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Customer Status/Defunct','/1/2/3/47/48/53','A','A','2005-01-05 13:04:39',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (54,47,'Project Report Status','-1',0,'a:2:{s:3:\"eng\";s:21:\"Project Report Status\";s:3:\"deu\";s:21:\"Project Report Status\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status','/1/2/3/47/54','A','A','2005-01-05 13:07:16',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (55,54,'1 - Green','#00FF00',10,'a:2:{s:3:\"eng\";s:5:\"Green\";s:3:\"deu\";s:4:\"Grün\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status/1 - Green','/1/2/3/47/54/55','A','A','2005-01-05 13:09:07',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (56,54,'2 - Green Yellow','#80FF00',20,'a:2:{s:3:\"eng\";s:11:\"Geen-Yellow\";s:3:\"deu\";s:9:\"Grün-Gelb\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status/2 - Green Yellow','/1/2/3/47/54/56','A','A','2005-01-05 13:09:51',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (57,54,'3 - Yellow','#FFFF00',30,'a:2:{s:3:\"eng\";s:6:\"Yellow\";s:3:\"deu\";s:4:\"Gelb\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status/3 - Yellow','/1/2/3/47/54/57','A','A','2005-01-05 13:10:13',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (58,54,'4 - Yellow Red','#FF8000',40,'a:2:{s:3:\"eng\";s:10:\"Yellow-Red\";s:3:\"deu\";s:8:\"Gelb-Rot\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status/4 - Yellow Red','/1/2/3/47/54/58','A','A','2005-01-05 13:11:07',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (59,54,'5 - Red','#FF0000',50,'a:2:{s:3:\"eng\";s:3:\"Red\";s:3:\"deu\";s:3:\"Rot\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status/5 - Red','/1/2/3/47/54/59','A','A','2005-01-05 13:11:43',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (60,54,'6 - Black','#000000',60,'a:2:{s:3:\"eng\";s:5:\"Black\";s:3:\"deu\";s:7:\"Schwarz\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status/6 - Black','/1/2/3/47/54/60','A','A','2005-01-05 13:12:26',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (61,1,'General','-1',0,'a:2:{s:3:\"deu\";s:9:\"Allgemein\";s:3:\"eng\";s:7:\"General\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General','/1/61','A','A','2005-01-05 13:13:49',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (62,61,'YesNo','-1',0,'a:2:{s:3:\"deu\";s:7:\"Ja/Nein\";s:3:\"eng\";s:6:\"Yes/No\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/YesNo','/1/61/62','A','A','2005-01-05 13:14:39',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (63,62,'1 - Yes','Y',1,'b:0;','b:0;','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/YesNo/1 - Yes','/1/61/62/63','A','A','2005-01-05 13:15:04',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (64,62,'2 - No','N',2,'b:0;','b:0;','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/YesNo/2 - No','/1/61/62/64','A','A','2005-01-05 13:15:19',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (65,47,'Travel','-1',0,'a:2:{s:3:\"deu\";s:7:\"Anreise\";s:3:\"eng\";s:6:\"Travel\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Travel','/1/2/3/47/65','A','A','2005-01-05 21:03:29',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (66,47,'Location','-1',0,'a:2:{s:3:\"deu\";s:3:\"Ort\";s:3:\"eng\";s:8:\"Location\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Location','/1/2/3/47/66','A','A','2005-01-07 19:42:52',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (67,66,'3 - Customer Site','CUST',0,'a:2:{s:3:\"deu\";s:10:\"Kundensitz\";s:3:\"eng\";s:15:\"Customer Office\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsInternal','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Location/3 - Customer Site','/1/2/3/47/66/67','A','A','2005-01-07 19:46:00',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (68,66,'1 - Office','OFF',0,'a:2:{s:3:\"deu\";s:6:\"Office\";s:3:\"eng\";s:6:\"Office\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsInternal','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Location/1 - Office','/1/2/3/47/66/68','A','A','2005-01-07 19:46:41',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (69,66,'5 - Home','HOM',0,'a:2:{s:3:\"deu\";s:8:\"Zu Hause\";s:3:\"eng\";s:11:\"Home Office\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsInternal','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Location/5 - Home','/1/2/3/47/66/69','A','A','2005-01-07 19:48:07',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (70,66,'7 - Hotel','HOT',0,'a:2:{s:3:\"deu\";s:31:\"Reise (Flug, Bahn, Hotel, etc.)\";s:3:\"eng\";s:34:\"Travel (Plane, Train, Hotel, etc.)\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsInternal','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Location/7 - Hotel','/1/2/3/47/66/70','A','A','2005-01-07 19:49:50',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (71,65,'1 - Car','CAR',0,'a:2:{s:3:\"deu\";s:4:\"Auto\";s:3:\"eng\";s:3:\"Car\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Travel/1 - Car','/1/2/3/47/65/71','A','A','2005-01-07 20:03:22',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (72,65,'2 - Train','TRN',0,'a:2:{s:3:\"deu\";s:3:\"Zug\";s:3:\"eng\";s:5:\"Train\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Travel/2 - Train','/1/2/3/47/65/72','A','A','2005-01-07 20:04:03',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (73,65,'3 - Flight','FLI',0,'a:2:{s:3:\"deu\";s:4:\"Flug\";s:3:\"eng\";s:6:\"Flight\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Travel/3 - Flight','/1/2/3/47/65/73','A','A','2005-01-07 20:05:11',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (74,4,'Graph Size','-1',0,'a:2:{s:3:\"deu\";s:6:\"Grösse\";s:3:\"eng\";s:4:\"Size\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Graph Size','/1/2/3/4/74','A','A','2005-01-28 16:16:07',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (77,74,'600','600',10,'a:2:{s:3:\"deu\";s:3:\"600\";s:3:\"eng\";s:3:\"600\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Graph Size/600','/1/2/3/4/74/77','A','A','2005-01-28 16:36:16',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (78,74,'800','800',20,'a:2:{s:3:\"deu\";s:3:\"800\";s:3:\"eng\";s:3:\"800\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Graph Size/800','/1/2/3/4/74/78','A','A','2005-01-28 16:36:26',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (79,74,'1000','1000',30,'a:2:{s:3:\"deu\";s:4:\"1000\";s:3:\"eng\";s:4:\"1000\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Graph Size/1000','/1/2/3/4/74/79','A','A','2005-01-28 16:36:45',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (80,74,'1400','1400',40,'a:2:{s:3:\"deu\";s:4:\"1400\";s:3:\"eng\";s:4:\"1400\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Graph Size/1400','/1/2/3/4/74/80','A','A','2005-01-28 16:37:08',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (81,74,'Full','0',50,'a:2:{s:3:\"deu\";s:12:\"Volle Grösse\";s:3:\"eng\";s:9:\"Full Size\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Graph Size/Full','/1/2/3/4/74/81','A','A','2005-01-28 16:37:44',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (82,4,'Category','-1',-1,'a:2:{s:3:\"deu\";s:9:\"Kateogrie\";s:3:\"eng\";s:8:\"Category\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Category','/1/2/3/4/82','A','A','2005-01-29 11:55:47',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (83,82,'SAP','SAP',0,'a:2:{s:3:\"deu\";s:3:\"SAP\";s:3:\"eng\";s:3:\"SAP\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Category/SAP','/1/2/3/4/82/83','A','A','2005-01-30 19:58:55',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (84,82,'IT-Analysis','ITA',0,'a:2:{s:3:\"deu\";s:10:\"IT-Analyse\";s:3:\"eng\";s:11:\"IT-Analysis\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Category/IT-Analysis','/1/2/3/4/82/84','A','A','2005-01-30 19:59:24',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (85,82,'Design','DES',0,'a:2:{s:3:\"deu\";s:6:\"Design\";s:3:\"eng\";s:6:\"Design\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Category/Design','/1/2/3/4/82/85','A','A','2005-01-30 19:59:50',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (86,82,'Project Management','PRO',0,'a:2:{s:3:\"deu\";s:17:\"Projektmanagement\";s:3:\"eng\";s:18:\"Project Management\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Category/Project Management','/1/2/3/4/82/86','A','A','2005-01-30 20:00:26',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (87,47,'Effort','-1',0,'a:2:{s:3:\"deu\";s:7:\"Aufwand\";s:3:\"eng\";s:6:\"Effort\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','AddStory','/__SYSTEM__/Modules/Projectmanagement/General/Effort','/1/2/3/47/87','A','A','2005-01-30 20:13:55',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (88,87,'4','4',4,'a:2:{s:3:\"deu\";s:9:\"4 Stunden\";s:3:\"eng\";s:7:\"4 Hours\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','AddStory','/__SYSTEM__/Modules/Projectmanagement/General/Effort/4','/1/2/3/47/87/88','A','A','2005-01-30 20:18:51',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (89,87,'8','8',8,'a:2:{s:3:\"deu\";s:9:\"8 Stunden\";s:3:\"eng\";s:7:\"8 Hours\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','AddStory','/__SYSTEM__/Modules/Projectmanagement/General/Effort/8','/1/2/3/47/87/89','A','A','2005-01-30 20:19:07',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (90,87,'10','10',10,'a:2:{s:3:\"deu\";s:10:\"10 Stunden\";s:3:\"eng\";s:8:\"10 Hours\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','AddStory','/__SYSTEM__/Modules/Projectmanagement/General/Effort/10','/1/2/3/47/87/90','A','A','2005-01-30 20:19:30',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (91,87,'12','12',12,'a:2:{s:3:\"deu\";s:10:\"12 Stunden\";s:3:\"eng\";s:9:\"12  Hours\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','AddStory','/__SYSTEM__/Modules/Projectmanagement/General/Effort/12','/1/2/3/47/87/91','A','A','2005-01-30 20:19:41',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (92,47,'Billing Rate','-1',-1,'a:2:{s:3:\"deu\";s:11:\"Stundensatz\";s:3:\"eng\";s:12:\"Billing Rate\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','-1','Rate','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Billing Rate','/1/2/3/47/92','A','A','2005-02-01 23:12:02',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (93,92,'R1','80',1,'a:2:{s:3:\"deu\";s:2:\"R1\";s:3:\"eng\";s:2:\"R1\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Billing Rate/R1','/1/2/3/47/92/93','A','A','2005-02-01 23:16:22',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (94,92,'R2','100',2,'a:2:{s:3:\"deu\";s:2:\"R2\";s:3:\"eng\";s:2:\"R2\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Billing Rate/R2','/1/2/3/47/92/94','A','A','2005-02-01 23:16:47',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (95,92,'R3','125',3,'a:2:{s:3:\"deu\";s:2:\"R3\";s:3:\"eng\";s:2:\"R3\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Billing Rate/R3','/1/2/3/47/92/95','A','A','2005-02-01 23:17:03',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (96,92,'R4','150',4,'a:2:{s:3:\"deu\";s:2:\"R4\";s:3:\"eng\";s:2:\"R4\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','-1','Rate','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Billing Rate/R4','/1/2/3/47/92/96','A','A','2005-02-01 23:17:21',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (97,2,'Contact','-1',0,'a:2:{s:3:\"deu\";s:20:\"Kontaktieren sie uns\";s:3:\"eng\";s:10:\"Contact us\";}','a:2:{s:3:\"deu\";s:89:\"Auf dieser Seite haben sie die Moeglichkeit unsere Abteilungen zu kontakieren. Bitte mis \";s:3:\"eng\";s:93:\"Here you can direct questions at our various departments. We will reply as soon as possible. \";}','','','','','','','','','','','v4bContact','/__SYSTEM__/Modules/Contact','/1/2/97','A','A','2005-02-07 22:06:15',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (98,97,'Marketing','info@value4business.com',0,'a:2:{s:3:\"deu\";s:9:\"Marketing\";s:3:\"eng\";s:9:\"Marketing\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bContact','/__SYSTEM__/Modules/Contact/Marketing','/1/2/97/98','A','A','2005-02-07 22:07:48',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (99,97,'Sales','sales@value4business.com',0,'a:2:{s:3:\"deu\";s:7:\"Verkauf\";s:3:\"eng\";s:5:\"Sales\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bContact','/__SYSTEM__/Modules/Contact/Sales','/1/2/97/99','A','A','2005-02-07 22:08:20',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (100,97,'Human Resources','hr@value4business.com',0,'a:2:{s:3:\"deu\";s:15:\"Human Resources\";s:3:\"eng\";s:15:\"Human Resources\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bContact','/__SYSTEM__/Modules/Contact/Human Resources','/1/2/97/100','A','A','2005-02-07 22:08:57',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (101,2,'PgPages','-1',0,'a:2:{s:3:\"eng\";s:7:\"PgPages\";s:3:\"deu\";s:7:\"PgPages\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages','/1/2/101','A','A','2005-05-09 09:33:20',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (102,101,'Pages','-1',0,'a:2:{s:3:\"eng\";s:5:\"Pages\";s:3:\"deu\";s:6:\"Seiten\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Pages','/1/2/101/102','A','A','2005-05-09 09:48:42',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (103,101,'Publications','0',-1,'a:2:{s:3:\"eng\";s:12:\"Publications\";s:3:\"deu\";s:18:\"Veröffentlichungen\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Publications','/1/2/101/103','A','A','2005-05-09 09:49:20',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (104,101,'Translations','-1',0,'a:2:{s:3:\"eng\";s:12:\"Translations\";s:3:\"deu\";s:13:\"Übersetzungen\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Translations','/1/2/101/104','A','A','2005-05-09 09:50:11',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (105,104,'English','eng',0,'a:2:{s:3:\"eng\";s:7:\"English\";s:3:\"deu\";s:8:\"Englisch\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Translations/English','/1/2/101/104/105','A','A','2005-05-09 10:00:07',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (106,104,'German','deu',0,'a:2:{s:3:\"eng\";s:6:\"German\";s:3:\"deu\";s:7:\"Deutsch\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Translations/German','/1/2/101/104/106','A','A','2005-05-09 10:00:30',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (107,104,'Spanish','spa',0,'a:2:{s:3:\"eng\";s:7:\"Spanish\";s:3:\"deu\";s:8:\"Spanisch\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Translations/Spanish','/1/2/101/104/107','A','A','2005-05-09 10:00:51',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (108,102,'City - Barcelona','cty_barcelona',1,'a:2:{s:3:\"eng\";s:16:\"City - Barcelona\";s:3:\"deu\";s:17:\"Stadt - Barcelona\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Pages/City - Barcelona','/1/2/101/102/108','A','A','2005-05-09 11:18:56',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (109,102,'City - Amsterdam','cty_amsterdam',0,'a:2:{s:3:\"eng\";s:16:\"City - Amsterdam\";s:3:\"deu\";s:17:\"Stadt - Amsterdam\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Pages/City - Amsterdam','/1/2/101/102/109','A','A','2005-05-09 11:19:17',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (110,103,'Technical','manual',0,'a:2:{s:3:\"eng\";s:16:\"Technical Manual\";s:3:\"deu\";s:16:\"Technisches Buch\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Publications/Technical','/1/2/101/103/110','A','A','2005-05-15 17:17:55',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (111,103,'Cities','cities',0,'a:2:{s:3:\"eng\";s:15:\"European Cities\";s:3:\"deu\";s:17:\"Euopäische Städte\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Publications/Cities','/1/2/101/103/111','A','A','2005-05-15 17:18:52',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (112,61,'GenMod','-1',0,'a:2:{s:3:\"eng\";s:15:\"Default Entries\";s:3:\"deu\";s:16:\"Default Einträge\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/GenMod','/1/61/112','A','A','2005-06-01 17:28:17',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (113,112,'1','1',1,'a:2:{s:3:\"eng\";s:23:\"This is a default value\";s:3:\"deu\";s:25:\"Dies ist ein default Wert\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/GenMod/1','/1/61/112/113','A','A','2005-06-01 17:29:16',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (114,112,'2','2',2,'a:2:{s:3:\"eng\";s:35:\"You need to further customize this!\";s:3:\"deu\";s:32:\"Dies muss noch angepasst werden!\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/GenMod/2','/1/61/112/114','A','A','2005-06-01 17:29:53',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (115,4,'Completion','-1',0,'a:2:{s:3:\"eng\";s:6:\"% Done\";s:3:\"deu\";s:8:\"% Fertig\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','-1','IsFinished','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion','/1/2/3/4/115','A','A','2005-06-10 16:00:27',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (116,115,'000 - 0%','0.0',0,'a:2:{s:3:\"deu\";s:2:\"0%\";s:3:\"eng\";s:2:\"0%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/000 - 0%','/1/2/3/4/115/116','A','A','2004-12-26 18:49:09',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (117,115,'010 - 10%','0.1',0,'a:2:{s:3:\"deu\";s:3:\"10%\";s:3:\"eng\";s:3:\"10%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/010 - 10%','/1/2/3/4/115/117','A','A','2004-12-26 18:50:34',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (118,115,'020 - 20%','0.2',0,'a:2:{s:3:\"deu\";s:3:\"20%\";s:3:\"eng\";s:3:\"20%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/020 - 20%','/1/2/3/4/115/118','A','A','2004-12-26 18:51:26',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (119,115,'030 - 30%','0.3',0,'a:2:{s:3:\"deu\";s:3:\"30%\";s:3:\"eng\";s:3:\"30%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/030 - 30%','/1/2/3/4/115/119','A','A','2004-12-26 18:52:13',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (120,115,'040 - 40%','0.4',0,'a:2:{s:3:\"deu\";s:3:\"40%\";s:3:\"eng\";s:3:\"40%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/040 - 40%','/1/2/3/4/115/120','A','A','2004-12-26 18:53:24',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (121,115,'050 - 50%','0.5',0,'a:2:{s:3:\"deu\";s:3:\"50%\";s:3:\"eng\";s:3:\"50%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/050 - 50%','/1/2/3/4/115/121','A','A','2004-12-26 18:53:46',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (122,115,'060 - 60%','0.6',0,'a:2:{s:3:\"deu\";s:3:\"60%\";s:3:\"eng\";s:3:\"60%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/060 - 60%','/1/2/3/4/115/122','A','A','2004-12-26 18:54:32',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (123,115,'070 - 70%','0.7',0,'a:2:{s:3:\"deu\";s:3:\"70%\";s:3:\"eng\";s:3:\"70%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/070 - 70%','/1/2/3/4/115/123','A','A','2004-12-26 18:55:05',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (124,115,'080 - 80%','0.8',0,'a:2:{s:3:\"deu\";s:3:\"80%\";s:3:\"eng\";s:3:\"80%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/080 - 80%','/1/2/3/4/115/124','A','A','2004-12-26 18:55:28',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (125,115,'090 - 90%','0.9',0,'a:2:{s:3:\"deu\";s:3:\"90%\";s:3:\"eng\";s:3:\"90%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/090 - 90%','/1/2/3/4/115/125','A','A','2004-12-26 18:55:57',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (126,115,'100 - 100%','1',0,'a:2:{s:3:\"deu\";s:4:\"100%\";s:3:\"eng\";s:4:\"100%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','1','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/100 - 100%','/1/2/3/4/115/126','A','A','2004-12-26 18:56:11',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (127,47,'Utilization Plan Months','-1',0,'a:2:{s:3:\"eng\";s:24:\"Kapazitätsplanungsmonate\";s:3:\"deu\";s:27:\"Utilization Planning Months\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','HaveSubmittedAll','0','Closed','0','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Utilization Plan Months','/1/2/3/47/127','A','A','2005-06-14 18:46:40',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (129,127,'2005 August','2005-08',2,'a:2:{s:3:\"eng\";s:11:\"August 2005\";s:3:\"deu\";s:11:\"August 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Utilization Plan Months/2005 August','/1/2/3/47/127/129','A','A','2005-06-14 18:52:30',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (130,127,'2005 September','2005-09',3,'a:2:{s:3:\"eng\";s:14:\"September 2005\";s:3:\"deu\";s:14:\"September 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Utilization Plan Months/2005 September','/1/2/3/47/127/130','A','A','2005-06-14 18:53:07',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (131,127,'2005 October','2005-10',4,'a:2:{s:3:\"eng\";s:12:\"October 2005\";s:3:\"deu\";s:12:\"Oktober 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Utilization Plan Months/2005 October','/1/2/3/47/127/131','A','A','2005-06-14 18:54:21',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (132,127,'2005 November','2005-11',5,'a:2:{s:3:\"eng\";s:13:\"November 2005\";s:3:\"deu\";s:13:\"November 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Utilization Plan Months/2005 November','/1/2/3/47/127/132','A','A','2005-06-14 18:54:48',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (133,127,'2005 December','2005-12',6,'a:2:{s:3:\"eng\";s:13:\"December 2005\";s:3:\"deu\";s:13:\"Dezember 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Utilization Plan Months/2005 December','/1/2/3/47/127/133','A','A','2005-06-14 18:55:15',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (134,17,'Permissions','-1',0,'a:2:{s:3:\"eng\";s:11:\"Permissions\";s:3:\"deu\";s:6:\"Rechte\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Permissions','/1/2/3/17/134','A','A','2005-06-15 14:35:29',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (135,134,'Public','PUBLIC',0,'a:2:{s:3:\"eng\";s:6:\"Public\";s:3:\"deu\";s:10:\"Öffentlich\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Permissions/Public','/1/2/3/17/134/135','A','A','2005-06-15 14:36:08',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (136,134,'Private','PRIVATE',1,'a:2:{s:3:\"eng\";s:7:\"Private\";s:3:\"deu\";s:6:\"Privat\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Permissions/Private','/1/2/3/17/134/136','A','A','2005-06-15 14:36:23',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (137,47,'Status Report Months','-1',0,'a:2:{s:3:\"eng\";s:19:\"Status Report Month\";s:3:\"deu\";s:19:\"Status Report Monat\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','ActiveMenu','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months','/1/2/3/47/137','A','A','2005-06-15 18:40:40',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (138,137,'2005 July','200507',0,'a:2:{s:3:\"eng\";s:9:\"July 2005\";s:3:\"deu\";s:9:\"Juli 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects::','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months/2005 July','/1/2/3/47/137/138','A','A','2005-06-16 17:12:19',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (139,137,'2005 August','200508',1,'a:2:{s:3:\"eng\";s:11:\"August 2005\";s:3:\"deu\";s:11:\"August 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects::','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months/2005 August','/1/2/3/47/137/139','A','A','2005-06-16 17:12:37',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (140,137,'2005 September','200509',2,'a:2:{s:3:\"eng\";s:14:\"September 2005\";s:3:\"deu\";s:14:\"September 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects::','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months/2005 September','/1/2/3/47/137/140','A','A','2005-06-16 17:13:00',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (141,137,'2005 October','200510',3,'a:2:{s:3:\"eng\";s:12:\"October 2005\";s:3:\"deu\";s:12:\"Oktober 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects::','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months/2005 October','/1/2/3/47/137/141','A','A','2005-06-16 17:13:44',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (142,137,'2005 November','200511',4,'a:2:{s:3:\"eng\";s:13:\"November 2005\";s:3:\"deu\";s:13:\"November 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects::','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months/2005 November','/1/2/3/47/137/142','A','A','2005-06-16 17:14:17',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (143,137,'2005 December','200512',5,'a:2:{s:3:\"eng\";s:13:\"December 2005\";s:3:\"deu\";s:13:\"Dezember 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects::','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months/2005 December','/1/2/3/47/137/143','A','A','2005-06-16 17:15:29',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (144,4,'Permissions','-1',0,'a:2:{s:3:\"eng\";s:11:\"Permissions\";s:3:\"deu\";s:6:\"Rechte\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','canRead','-1','canWrite','-1','canDelete','-1','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Permissions','/1/2/3/4/144','A','A','2005-06-16 17:36:19',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (145,144,'None','0',0,'a:2:{s:3:\"eng\";s:4:\"None\";s:3:\"deu\";s:6:\"Keines\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','canRead','0','canWrite','0','canDelete','0','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Permissions/None','/1/2/3/4/144/145','A','A','2005-06-16 17:37:53',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (146,144,'Read','10',10,'a:2:{s:3:\"eng\";s:4:\"Read\";s:3:\"deu\";s:5:\"Lesen\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','canRead','1','canWrite','0','canDelete','0','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Permissions/Read','/1/2/3/4/144/146','A','A','2005-06-16 17:38:22',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (147,144,'Write','20',20,'a:2:{s:3:\"eng\";s:5:\"Write\";s:3:\"deu\";s:9:\"Schreiben\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','canRead','1','canWrite','1','canDelete','0','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Permissions/Write','/1/2/3/4/144/147','A','A','2005-06-16 17:38:56',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (148,144,'Delete','30',30,'a:2:{s:3:\"eng\";s:6:\"Delete\";s:3:\"deu\";s:7:\"Löschen\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','canRead','1','canWrite','1','canDelete','1','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Permissions/Delete','/1/2/3/4/144/148','A','A','2005-06-16 17:39:57',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (149,61,'Pending Status Extended','-1',0,'a:2:{s:3:\"eng\";s:14:\"Pending Status\";s:3:\"deu\";s:19:\"Neue Inhalte Status\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','-1','IsApproved','-1','IsPublished','-1','','','','','AddStory','/__SYSTEM__/General/Pending Status Extended','/1/61/149','A','A','2005-06-18 11:50:12',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (150,149,'Pending','P',0,'a:2:{s:3:\"eng\";s:7:\"Pending\";s:3:\"deu\";s:7:\"Wartend\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','1','IsApproved','0','IsPublished','0','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status Extended/Pending','/1/61/149/150','A','A','2005-06-18 11:51:00',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (151,149,'Checked','C',1,'a:2:{s:3:\"eng\";s:7:\"Checked\";s:3:\"deu\";s:12:\"Kontrolliert\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','0','IsApproved','0','IsPublished','0','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status Extended/Checked','/1/61/149/151','A','A','2005-06-18 11:52:06',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (152,149,'Approved','A',3,'a:2:{s:3:\"eng\";s:8:\"Approved\";s:3:\"deu\";s:9:\"Genehmigt\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','0','IsApproved','1','IsPublished','0','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status Extended/Approved','/1/61/149/152','A','A','2005-06-18 11:52:38',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (153,149,'Online','O',5,'a:2:{s:3:\"eng\";s:6:\"Online\";s:3:\"deu\";s:6:\"Online\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','0','IsApproved','1','IsPublished','1','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status Extended/Online','/1/61/149/153','A','A','2005-06-18 11:53:14',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (154,149,'Rejected','R',4,'a:2:{s:3:\"eng\";s:8:\"Rejected\";s:3:\"deu\";s:9:\"Abgelehnt\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','0','IsApproved','0','IsPublished','0','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status Extended/Rejected','/1/61/149/154','A','A','2005-06-18 12:00:20',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (155,61,'Gender','-1',0,'a:2:{s:3:\"deu\";s:10:\"Geschlecht\";s:3:\"eng\";s:6:\"Gender\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/Gender','/1/61/155','A','A','2005-08-01 08:51:03',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (156,155,'Male','M',1,'a:2:{s:3:\"deu\";s:4:\"Mann\";s:3:\"eng\";s:4:\"Male\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/Gender/Male','/1/61/155/156','A','A','2005-08-01 08:51:24',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (157,155,'Female','F',2,'a:2:{s:3:\"deu\";s:4:\"Frau\";s:3:\"eng\";s:6:\"Female\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/Gender/Female','/1/61/155/157','A','A','2005-08-01 08:51:46',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (158,61,'Title','-1',0,'a:2:{s:3:\"deu\";s:5:\"Titel\";s:3:\"eng\";s:5:\"Title\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/Title','/1/61/158','A','A','2005-08-01 08:53:42',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (159,158,'Dr','DR',0,'a:2:{s:3:\"deu\";s:3:\"Dr.\";s:3:\"eng\";s:3:\"Dr.\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/Title/Dr','/1/61/158/159','A','A','2005-08-01 08:55:16',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (160,158,'Prof','PROF',0,'a:2:{s:3:\"deu\";s:4:\"Prof\";s:3:\"eng\";s:4:\"Prof\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/Title/Prof','/1/61/158/160','A','A','2005-08-01 08:55:36',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (161,158,'Mag','MAG',0,'a:2:{s:3:\"deu\";s:4:\"Mag.\";s:3:\"eng\";s:4:\"Mag.\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/Title/Mag','/1/61/158/161','A','A','2005-08-01 08:56:05',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (162,2,'AddressBook','-1',0,'a:2:{s:3:\"deu\";s:10:\"Adressbuch\";s:3:\"eng\";s:11:\"AddressBook\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook','/1/2/162','A','A','2005-08-01 09:00:25',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (163,162,'JobTitle','-1',0,'a:2:{s:3:\"deu\";s:8:\"Funktion\";s:3:\"eng\";s:9:\"Job Title\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/JobTitle','/1/2/162/163','A','A','2005-08-01 09:01:06',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (164,163,'AccountManager','ACCMGR',0,'a:2:{s:3:\"deu\";s:15:\"Account Manager\";s:3:\"eng\";s:15:\"Account Manager\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/JobTitle/AccountManager','/1/2/162/163/164','A','A','2005-08-01 09:03:19',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (165,163,'Salesperson','SALESPER',0,'a:2:{s:3:\"deu\";s:9:\"Verkäufer\";s:3:\"eng\";s:12:\"Sales Person\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/JobTitle/Salesperson','/1/2/162/163/165','A','A','2005-08-01 09:04:40',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (166,163,'Marketing','MARKETING',0,'a:2:{s:3:\"deu\";s:9:\"Marketing\";s:3:\"eng\";s:9:\"Marketing\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/JobTitle/Marketing','/1/2/162/163/166','A','A','2005-08-01 09:05:05',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (167,163,'Support','SUPPORT',0,'a:2:{s:3:\"deu\";s:7:\"Support\";s:3:\"eng\";s:7:\"Support\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/JobTitle/Support','/1/2/162/163/167','A','A','2005-08-01 09:05:28',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (168,163,'Manager','MANAGER',0,'a:2:{s:3:\"deu\";s:7:\"Manager\";s:3:\"eng\";s:7:\"Manager\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/JobTitle/Manager','/1/2/162/163/168','A','A','2005-08-01 09:05:48',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (169,163,'DepartementalHead','DEPTHEAD',0,'a:2:{s:3:\"deu\";s:16:\"Abteilungsleiter\";s:3:\"eng\";s:18:\"Departemental Head\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/JobTitle/DepartementalHead','/1/2/162/163/169','A','A','2005-08-01 09:06:59',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (170,163,'Researcher','RESEARCHER',0,'a:2:{s:3:\"deu\";s:8:\"Forscher\";s:3:\"eng\";s:10:\"Researcher\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/JobTitle/Researcher','/1/2/162/163/170','A','A','2005-08-01 09:07:44',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (171,163,'Corporate Officer','CORPOFFICER',0,'a:2:{s:3:\"deu\";s:8:\"Vorstand\";s:3:\"eng\";s:17:\"Corporate Officer\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/JobTitle/Corporate Officer','/1/2/162/163/171','A','A','2005-08-01 09:08:35',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (172,162,'PaymentType','-1',0,'a:2:{s:3:\"deu\";s:11:\"Zahlungsart\";s:3:\"eng\";s:12:\"Payment Type\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','payments_per_year','-1','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/PaymentType','/1/2/162/172','A','A','2005-08-01 09:16:46',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (173,172,'Monthly','MONTHLY',1,'a:2:{s:3:\"deu\";s:9:\"Monatlich\";s:3:\"eng\";s:7:\"Monthly\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','payments_per_year','12','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/PaymentType/Monthly','/1/2/162/172/173','A','A','2005-08-01 09:17:33',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (174,172,'Quarterly','QUARTERLY',2,'a:2:{s:3:\"deu\";s:7:\"Quartal\";s:3:\"eng\";s:9:\"Quarterly\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','payments_per_year','4','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/PaymentType/Quarterly','/1/2/162/172/174','A','A','2005-08-01 09:18:18',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (175,172,'Yearly','YEARLY',3,'a:2:{s:3:\"deu\";s:8:\"Jährlich\";s:3:\"eng\";s:6:\"Yearly\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','payments_per_year','1','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/PaymentType/Yearly','/1/2/162/172/175','A','A','2005-08-01 09:18:51',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (176,162,'Categories','-1',0,'a:2:{s:3:\"deu\";s:10:\"Kategorien\";s:3:\"eng\";s:10:\"Categories\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/Categories','/1/2/162/176','A','A','2005-08-08 21:59:48',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (177,176,'Kunden','CUST',10,'a:2:{s:3:\"deu\";s:6:\"Kunden\";s:3:\"eng\";s:9:\"Customers\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/Categories/Kunden','/1/2/162/176/177','A','A','2005-08-08 22:01:43',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (178,176,'Suppliers','SUPP',20,'a:2:{s:3:\"deu\";s:12:\"Leveranciers\";s:3:\"eng\";s:9:\"Suppliers\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/Categories/Suppliers','/1/2/162/176/178','A','A','2005-08-08 22:02:34',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (179,176,'Spies','SERV',30,'a:2:{s:3:\"deu\";s:7:\"Service\";s:3:\"eng\";s:7:\"Service\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bAddressBook','/__SYSTEM__/Modules/AddressBook/Categories/Spies','/1/2/162/176/179','A','A','2005-08-08 22:03:23',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (180,61,'ActiveStatus','-1',0,'a:2:{s:3:\"deu\";s:16:\"Aktivitätsstatus\";s:3:\"eng\";s:15:\"Activity Status\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','IsActive','-1','','','','','','','','','v4bCategories','/__SYSTEM__/General/ActiveStatus','/1/61/180','A','A','2005-08-17 18:44:19',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (181,180,'Active','A',1,'a:2:{s:3:\"deu\";s:5:\"Aktiv\";s:3:\"eng\";s:6:\"Active\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','IsActive','1','','','','','','','','','v4bCategories','/__SYSTEM__/General/ActiveStatus/Active','/1/61/180/181','A','A','2005-08-17 18:45:11',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (182,180,'Inactive','I',2,'a:2:{s:3:\"deu\";s:7:\"Inaktiv\";s:3:\"eng\";s:8:\"Inactive\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','IsActive','0','','','','','','','','','v4bCategories','/__SYSTEM__/General/ActiveStatus/Inactive','/1/61/180/182','A','A','2005-08-17 18:45:41',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (183,61,'Pending Status Basic','-1',0,'a:2:{s:3:\"eng\";s:20:\"Pending Status Basic\";s:3:\"deu\";s:27:\"Neue Inhalte Status Einfach\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','-1','IsApproved','-1','','','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status Basic','/1/61/183','A','A','2005-06-18 11:50:12',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (184,183,'Pending','P',0,'a:2:{s:3:\"eng\";s:7:\"Pending\";s:3:\"deu\";s:7:\"Wartend\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','1','IsApproved','0','','','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status Basic/Pending','/1/61/183/184','A','A','2005-06-18 11:51:00',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (185,183,'Approved','A',3,'a:2:{s:3:\"eng\";s:8:\"Approved\";s:3:\"deu\";s:9:\"Genehmigt\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','0','IsApproved','1','','','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status Basic/Approved','/1/61/183/185','A','A','2005-06-18 11:52:38',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (186,2,'Accounting','-1',0,'a:3:{s:3:\"eng\";s:10:\"Accounting\";s:3:\"deu\";s:11:\"Buchhaltung\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting','/1/2/186','A','A','2006-04-19 13:48:43',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (187,186,'Account Categories','-1',0,'a:3:{s:3:\"eng\";s:18:\"Account Categories\";s:3:\"deu\";s:16:\"Kontenkategorien\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','-1','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories','/1/2/186/187','A','A','2006-04-19 15:44:09',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (188,187,'Einnahmen - Ideeller Bereich','EIN_IDEELL',10,'a:3:{s:3:\"eng\";s:28:\"Einnahmen - Ideeller Bereich\";s:3:\"deu\";s:28:\"Einnahmen - Ideeller Bereich\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','C','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Einnahmen - Ideeller Bereich','/1/2/186/187/188','A','A','2006-04-19 15:45:18',2,'2006-04-26 22:50:18',2);
INSERT INTO os_core_v4b_categories_category VALUES (189,187,'Einnahmen - Vermögensverwaltung','EIN_VERM',20,'a:3:{s:3:\"eng\";s:31:\"Einnahmen - Vermögensverwaltung\";s:3:\"deu\";s:31:\"Einnahmen - Vermögensverwaltung\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','C','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Einnahmen - Vermögensverwaltung','/1/2/186/187/189','A','A','2006-04-19 15:46:59',2,'2006-04-26 22:50:27',2);
INSERT INTO os_core_v4b_categories_category VALUES (190,187,'Einnahmen - Zweckbetrieb','EIN_ZWECK',30,'a:3:{s:3:\"eng\";s:24:\"Einnahmen - Zweckbetrieb\";s:3:\"deu\";s:24:\"Einnahmen - Zweckbetrieb\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','C','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Einnahmen - Zweckbetrieb','/1/2/186/187/190','A','A','2006-04-19 15:48:31',2,'2006-04-26 22:50:37',2);
INSERT INTO os_core_v4b_categories_category VALUES (191,187,'Einnahmen - Wirtschaftlicher Geschäftsbetrieb','EIN_WIRT',40,'a:3:{s:3:\"eng\";s:45:\"Einnahmen - Wirtschaftlicher Geschäftsbetrieb\";s:3:\"deu\";s:45:\"Einnahmen - Wirtschaftlicher Geschäftsbetrieb\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','C','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Einnahmen - Wirtschaftlicher Geschäftsbetrieb','/1/2/186/187/191','A','A','2006-04-19 15:49:21',2,'2006-04-26 22:51:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (192,187,'Einnahmen - Umlaufvermögen','EIN_UMLAUF',5,'a:3:{s:3:\"eng\";s:26:\"Einnahmen - Umlaufvermögen\";s:3:\"deu\";s:26:\"Einnahmen - Umlaufvermögen\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','C','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Einnahmen - Umlaufvermögen','/1/2/186/187/192','A','A','2006-04-19 15:51:21',2,'2006-04-26 22:50:08',2);
INSERT INTO os_core_v4b_categories_category VALUES (193,187,'Ausgaben - Umlaufvermögen','AUS_UMLAUF',50,'a:3:{s:3:\"eng\";s:25:\"Ausgaben - Umlaufvermögen\";s:3:\"deu\";s:25:\"Ausgaben - Umlaufvermögen\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','D','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Ausgaben - Umlaufvermögen','/1/2/186/187/193','A','A','2006-04-19 15:51:44',2,'2006-04-26 22:51:16',2);
INSERT INTO os_core_v4b_categories_category VALUES (194,187,'Ausgaben - Club Allgemein','AUS_CLUBALL',60,'a:3:{s:3:\"eng\";s:25:\"Ausgaben - Club Allgemein\";s:3:\"deu\";s:25:\"Ausgaben - Club Allgemein\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','D','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Ausgaben - Club Allgemein','/1/2/186/187/194','A','A','2006-04-19 15:52:16',2,'2006-04-26 22:51:28',2);
INSERT INTO os_core_v4b_categories_category VALUES (195,187,'Ausgaben - Clubhaus','AUS_CLUBHAUS',70,'a:3:{s:3:\"eng\";s:19:\"Ausgaben - Clubhaus\";s:3:\"deu\";s:19:\"Ausgaben - Clubhaus\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','D','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Ausgaben - Clubhaus','/1/2/186/187/195','A','A','2006-04-19 15:52:41',2,'2006-04-26 22:51:43',2);
INSERT INTO os_core_v4b_categories_category VALUES (196,187,'Ausgaben - Platzanlage','AUS_PLATZANL',80,'a:3:{s:3:\"eng\";s:22:\"Ausgaben - Platzanlage\";s:3:\"deu\";s:22:\"Ausgaben - Platzanlage\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','D','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Ausgaben - Platzanlage','/1/2/186/187/196','A','A','2006-04-19 15:53:08',2,'2006-04-26 22:51:58',2);
INSERT INTO os_core_v4b_categories_category VALUES (197,187,'Ausgaben - Sportbereich','AUS_SPORT',90,'a:3:{s:3:\"eng\";s:23:\"Ausgaben - Sportbereich\";s:3:\"deu\";s:23:\"Ausgaben - Sportbereich\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','D','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Ausgaben - Sportbereich','/1/2/186/187/197','A','A','2006-04-19 15:53:47',2,'2006-04-26 22:52:20',2);
INSERT INTO os_core_v4b_categories_category VALUES (198,187,'Ausgaben - Vermögensverwaltung','AUS_VERMOEG',100,'a:3:{s:3:\"eng\";s:30:\"Ausgaben - Vermögensverwaltung\";s:3:\"deu\";s:30:\"Ausgaben - Vermögensverwaltung\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','D','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Ausgaben - Vermögensverwaltung','/1/2/186/187/198','A','A','2006-04-19 15:54:47',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (199,187,'Ausgaben - Zweckbetrieb','AUS_ZWECK',110,'a:3:{s:3:\"eng\";s:23:\"Ausgaben - Zweckbetrieb\";s:3:\"deu\";s:23:\"Ausgaben - Zweckbetrieb\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','D','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Ausgaben - Zweckbetrieb','/1/2/186/187/199','A','A','2006-04-19 15:55:30',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (200,187,'Ausgaben - Wirtschaftlicher Geschäftsbetrieb','AUS_WIRT',120,'a:3:{s:3:\"eng\";s:44:\"Ausgaben - Wirtschaftlicher Geschäftsbetrieb\";s:3:\"deu\";s:44:\"Ausgaben - Wirtschaftlicher Geschäftsbetrieb\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','D','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Account Categories/Ausgaben - Wirtschaftlicher Geschäftsbetrieb','/1/2/186/187/200','A','A','2006-04-19 15:59:07',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (201,186,'Credit Debit','-1',0,'a:3:{s:3:\"eng\";s:12:\"Credit Debit\";s:3:\"deu\";s:12:\"Credit Debit\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Credit Debit','/1/2/186/201','A','A','2006-04-19 16:47:11',2,'2006-04-26 21:21:29',2);
INSERT INTO os_core_v4b_categories_category VALUES (202,201,'Credit','C',10,'a:3:{s:3:\"eng\";s:6:\"Credit\";s:3:\"deu\";s:8:\"Guthaben\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Credit Debit/Credit','/1/2/186/201/202','A','A','2006-04-19 16:47:54',2,'2006-05-01 16:57:16',2);
INSERT INTO os_core_v4b_categories_category VALUES (203,201,'Debit','D',20,'a:3:{s:3:\"eng\";s:5:\"Debit\";s:3:\"deu\";s:5:\"Debit\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Credit Debit/Debit','/1/2/186/201/203','A','A','2006-04-19 16:48:18',2,'2006-04-26 21:21:30',2);
INSERT INTO os_core_v4b_categories_category VALUES (204,186,'GL Entry Status','-1',0,'a:3:{s:3:\"eng\";s:15:\"GL Entry Status\";s:3:\"deu\";s:17:\"GL Buchungsstatus\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/GL Entry Status','/1/2/186/204','A','A','2006-04-27 00:08:11',2,'2006-04-27 00:08:11',2);
INSERT INTO os_core_v4b_categories_category VALUES (205,204,'Pending','P',0,'a:3:{s:3:\"eng\";s:7:\"Pending\";s:3:\"deu\";s:7:\"Wartend\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/GL Entry Status/Pending','/1/2/186/204/205','A','A','2006-04-27 00:11:21',2,'2006-04-27 00:11:21',2);
INSERT INTO os_core_v4b_categories_category VALUES (206,204,'Confirmed','C',10,'a:3:{s:3:\"eng\";s:9:\"Confirmed\";s:3:\"deu\";s:9:\"Bestätigt\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/GL Entry Status/Confirmed','/1/2/186/204/206','A','A','2006-04-27 00:11:54',2,'2006-04-27 00:11:54',2);
INSERT INTO os_core_v4b_categories_category VALUES (10032,186,'Basic Account Categories','-1',0,'a:3:{s:3:\"deu\";s:25:\"Einfache Kontenkategorien\";s:3:\"eng\";s:24:\"Basic Account Categories\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','-1','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Basic Account Categories','/1/2/186/10032','A','A','2006-05-11 21:51:41',2,'2006-05-11 21:55:13',2);
INSERT INTO os_core_v4b_categories_category VALUES (10033,10032,'Credit','CREDIT',0,'a:3:{s:3:\"deu\";s:9:\"Einnahmen\";s:3:\"eng\";s:6:\"Credit\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','C','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Basic Account Categories/Credit','/1/2/186/10032/10033','A','A','2006-05-11 21:53:58',2,'2006-05-11 21:55:13',2);
INSERT INTO os_core_v4b_categories_category VALUES (10034,10032,'Debit','DEBIT',1,'a:3:{s:3:\"deu\";s:8:\"Ausgaben\";s:3:\"eng\";s:5:\"Debit\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";s:3:\"spa\";s:0:\"\";}','D','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Basic Account Categories/Debit','/1/2/186/10032/10034','A','A','2006-05-11 21:54:20',2,'2006-05-11 21:55:13',2);
INSERT INTO os_core_v4b_categories_category VALUES (10035,10032,'Debit - Wages','DEBIT',2,'a:3:{s:3:\"deu\";s:29:\"Ausgaben - LÃÂ¶he und GehÃÂ¤lter\";s:3:\"eng\";s:13:\"Debit - Wages\";s:3:\"spa\";s:0:\"\";}','a:3:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";s:3:spa\";s:0:\"\";}','D','Type','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Accounting/Basic Account Categories/Debit - Wages','/1/2/186/10032/10035','A','A','2006-05-11 21:56:23',2,'2006-05-11 21:56:23',2);
ALTER TABLE os_core_v4b_categories_category AUTO_INCREMENT=10000;

--
-- Table structure for table `os_core_v4b_categories_mapmeta`
--

DROP TABLE IF EXISTS os_core_v4b_categories_mapmeta;
CREATE TABLE os_core_v4b_categories_mapmeta (
  cmm_id int(11) NOT NULL auto_increment,
  cmm_meta_id int(11) NOT NULL default '0',
  cmm_category_id int(11) NOT NULL default '0',
  cmm_obj_status char(1) NOT NULL default 'A',
  cmm_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  cmm_cr_uid int(11) NOT NULL default '0',
  cmm_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  cmm_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (cmm_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_categories_mapmeta`
--


--
-- Table structure for table `os_core_v4b_categories_mapobj`
--

DROP TABLE IF EXISTS os_core_v4b_categories_mapobj;
CREATE TABLE os_core_v4b_categories_mapobj (
  cmo_id int(11) NOT NULL auto_increment,
  cmo_modname varchar(60) NOT NULL default '',
  cmo_table varchar(60) NOT NULL default '',
  cmo_obj_id int(11) NOT NULL default '0',
  cmo_category_id int(11) NOT NULL default '0',
  cmo_obj_status char(1) NOT NULL default 'A',
  cmo_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  cmo_cr_uid int(11) NOT NULL default '0',
  cmo_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  cmo_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (cmo_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_categories_mapobj`
--


--
-- Table structure for table `os_core_v4b_categories_registry`
--

DROP TABLE IF EXISTS os_core_v4b_categories_registry;
CREATE TABLE os_core_v4b_categories_registry (
  crg_id int(11) NOT NULL auto_increment,
  crg_modname varchar(60) NOT NULL default '',
  crg_property varchar(60) NOT NULL default '',
  crg_category_id int(11) NOT NULL default '0',
  crg_obj_status char(1) NOT NULL default 'A',
  crg_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  crg_cr_uid int(11) NOT NULL default '0',
  crg_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  crg_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (crg_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_categories_registry`
--


--
-- Table structure for table `os_core_v4b_journal_journal`
--

DROP TABLE IF EXISTS os_core_v4b_journal_journal;
CREATE TABLE os_core_v4b_journal_journal (
  jjo_id int(11) unsigned NOT NULL auto_increment,
  jjo_title varchar(128) NOT NULL default '',
  jjo_bodytext text NOT NULL,
  jjo_mood varchar(64) NOT NULL default '',
  jjo_status varchar(64) NOT NULL default '',
  jjo_owner_uid int(11) NOT NULL default '0',
  jjo_image varchar(64) NOT NULL default '',
  jjo_image_position int(2) NOT NULL default '0',
  jjo_image_size_x int(11) NOT NULL default '0',
  jjo_image_size_y int(11) NOT NULL default '0',
  jjo_lu_uid int(11) NOT NULL default '0',
  jjo_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  jjo_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  jjo_permission char(1) NOT NULL default 'P',
  jjo_view_count int(11) NOT NULL default '0',
  PRIMARY KEY  (jjo_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_journal_journal`
--


--
-- Table structure for table `os_core_v4b_journal_stats`
--

DROP TABLE IF EXISTS os_core_v4b_journal_stats;
CREATE TABLE os_core_v4b_journal_stats (
  jst_id int(11) unsigned NOT NULL auto_increment,
  jst_uid int(11) NOT NULL default '0',
  jst_jid int(11) NOT NULL default '0',
  jst_entry_count int(10) unsigned NOT NULL default '1',
  jst_view_count int(11) NOT NULL default '0',
  jst_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  jst_lv_date datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (jst_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_journal_stats`
--


--
-- Table structure for table `os_core_v4b_journal_tmp`
--

DROP TABLE IF EXISTS os_core_v4b_journal_tmp;
CREATE TABLE os_core_v4b_journal_tmp (
  jtm_owner_uid int(11) unsigned NOT NULL auto_increment,
  jtm_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (jtm_owner_uid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_journal_tmp`
--


--
-- Table structure for table `os_core_v4b_newcontent`
--

DROP TABLE IF EXISTS os_core_v4b_newcontent;
CREATE TABLE os_core_v4b_newcontent (
  nc_id int(10) unsigned NOT NULL auto_increment,
  nc_block_id int(11) NOT NULL default '0',
  nc_position int(11) NOT NULL default '0',
  nc_removable int(11) NOT NULL default '0',
  nc_obj_status char(1) NOT NULL default 'A',
  nc_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  nc_cr_uid int(11) NOT NULL default '0',
  nc_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  nc_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (nc_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_newcontent`
--

INSERT INTO os_core_v4b_newcontent VALUES (1,9,1,0,'A','2005-10-08 13:18:36',2,'2005-10-08 13:18:36',2);
INSERT INTO os_core_v4b_newcontent VALUES (2,10,2,0,'A','2005-10-08 13:18:40',2,'2005-10-08 13:18:40',2);
INSERT INTO os_core_v4b_newcontent VALUES (3,13,3,0,'A','2005-10-08 13:18:56',2,'2005-10-08 13:18:56',2);
INSERT INTO os_core_v4b_newcontent VALUES (4,14,4,0,'A','2005-10-08 13:19:08',2,'2005-10-08 13:19:08',2);
INSERT INTO os_core_v4b_newcontent VALUES (5,21,5,1,'A','2005-10-08 13:19:23',2,'2005-10-08 13:20:56',2);
INSERT INTO os_core_v4b_newcontent VALUES (6,22,6,1,'A','2005-10-08 13:19:30',2,'2005-10-08 13:20:56',2);
INSERT INTO os_core_v4b_newcontent VALUES (7,19,7,1,'A','2005-10-08 13:19:37',2,'2005-10-08 13:20:56',2);
INSERT INTO os_core_v4b_newcontent VALUES (8,20,8,1,'A','2005-10-08 13:19:44',2,'2005-10-08 13:20:56',2);
INSERT INTO os_core_v4b_newcontent VALUES (9,16,10,1,'A','2005-10-08 13:19:53',2,'2005-10-08 13:20:56',2);
INSERT INTO os_core_v4b_newcontent VALUES (10,15,9,1,'A','2005-10-08 13:19:57',2,'2005-10-08 13:20:56',2);
INSERT INTO os_core_v4b_newcontent VALUES (11,17,11,1,'A','2005-10-08 13:20:07',2,'2005-10-08 13:20:56',2);
INSERT INTO os_core_v4b_newcontent VALUES (13,18,12,1,'A','2005-10-08 13:20:24',2,'2005-10-08 13:20:56',2);
INSERT INTO os_core_v4b_newcontent VALUES (14,23,13,1,'A','2005-10-08 13:20:30',2,'2005-10-08 13:20:56',2);
INSERT INTO os_core_v4b_newcontent VALUES (15,24,14,1,'A','2005-10-08 13:20:35',2,'2005-10-08 13:20:56',2);

--
-- Table structure for table `os_core_v4b_newcontent_userprefs`
--

DROP TABLE IF EXISTS os_core_v4b_newcontent_userprefs;
CREATE TABLE os_core_v4b_newcontent_userprefs (
  ncpref_owner_uid int(11) NOT NULL default '0',
  ncpref_content text,
  ncpref_obj_status char(1) NOT NULL default 'A',
  ncpref_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  ncpref_cr_uid int(11) NOT NULL default '0',
  ncpref_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  ncpref_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (ncpref_owner_uid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_newcontent_userprefs`
--


--
-- Table structure for table `os_core_v4b_objectdata_attributes`
--

DROP TABLE IF EXISTS os_core_v4b_objectdata_attributes;
CREATE TABLE os_core_v4b_objectdata_attributes (
  oba_id int(11) unsigned NOT NULL auto_increment,
  oba_attribute_name varchar(80) NOT NULL default '',
  oba_object_id int(11) NOT NULL default '0',
  oba_object_type varchar(80) NOT NULL default '',
  oba_value varchar(255) NOT NULL default '',
  oba_obj_status char(1) NOT NULL default 'A',
  oba_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  oba_cr_uid int(11) NOT NULL default '0',
  oba_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  oba_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (oba_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_objectdata_attributes`
--


--
-- Table structure for table `os_core_v4b_objectdata_log`
--

DROP TABLE IF EXISTS os_core_v4b_objectdata_log;
CREATE TABLE os_core_v4b_objectdata_log (
  obl_id int(11) unsigned NOT NULL auto_increment,
  obl_object_type varchar(80) NOT NULL default '',
  obl_object_id int(11) NOT NULL default '0',
  obl_op varchar(16) NOT NULL default '',
  obl_diff longtext NOT NULL,
  obl_obj_status char(1) NOT NULL default 'A',
  obl_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  obl_cr_uid int(11) NOT NULL default '0',
  obl_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  obl_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (obl_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_objectdata_log`
--


--
-- Table structure for table `os_core_v4b_objectdata_meta`
--

DROP TABLE IF EXISTS os_core_v4b_objectdata_meta;
CREATE TABLE os_core_v4b_objectdata_meta (
  obm_id int(11) unsigned NOT NULL auto_increment,
  obm_module varchar(40) NOT NULL default '',
  obm_table varchar(40) NOT NULL default '',
  obm_idcolumn varchar(40) NOT NULL default '',
  obm_obj_id int(11) unsigned NOT NULL default '0',
  obm_permissions varchar(255) default NULL,
  obm_dc_title varchar(80) default NULL,
  obm_dc_author varchar(80) default NULL,
  obm_dc_subject varchar(255) default NULL,
  obm_dc_keywords varchar(128) default NULL,
  obm_dc_description varchar(255) default NULL,
  obm_dc_publisher varchar(128) default NULL,
  obm_dc_contributor varchar(128) default NULL,
  obm_dc_startdate datetime default NULL,
  obm_dc_enddate datetime default NULL,
  obm_dc_type varchar(128) default NULL,
  obm_dc_format varchar(128) default NULL,
  obm_dc_uri varchar(255) default NULL,
  obm_dc_source varchar(128) default NULL,
  obm_dc_language varchar(32) default NULL,
  obm_dc_relation varchar(255) default NULL,
  obm_dc_coverage varchar(64) default NULL,
  obm_dc_entity varchar(64) default NULL,
  obm_dc_comment varchar(255) default NULL,
  obm_dc_extra varchar(255) default NULL,
  obm_obj_status char(1) NOT NULL default 'A',
  obm_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  obm_cr_uid int(11) NOT NULL default '0',
  obm_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  obm_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (obm_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_objectdata_meta`
--


--
-- Table structure for table `os_core_v4b_pgpages_pages`
--

DROP TABLE IF EXISTS os_core_v4b_pgpages_pages;
CREATE TABLE os_core_v4b_pgpages_pages (
  pgp_id int(10) unsigned NOT NULL auto_increment,
  pgp_page_cat_id int(11) NOT NULL default '0',
  pgp_pub_type int(11) NOT NULL default '0',
  pgp_pub_pid int(11) NOT NULL default '0',
  pgp_lang char(3) NOT NULL default '',
  pgp_obj_status char(1) NOT NULL default 'A',
  pgp_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  pgp_cr_uid int(11) NOT NULL default '0',
  pgp_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  pgp_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (pgp_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_pgpages_pages`
--

INSERT INTO os_core_v4b_pgpages_pages VALUES (4,109,10000,1,'eng','A','2005-06-15 21:45:01',2,'2005-06-15 21:45:01',2);
INSERT INTO os_core_v4b_pgpages_pages VALUES (5,109,10000,1,'deu','A','2005-06-15 21:45:01',2,'2005-06-15 21:45:01',2);
INSERT INTO os_core_v4b_pgpages_pages VALUES (6,109,10000,1,'spa','A','2005-06-15 21:45:01',2,'2005-06-15 21:45:01',2);
INSERT INTO os_core_v4b_pgpages_pages VALUES (7,108,10000,2,'eng','A','2005-06-15 21:45:24',2,'2005-06-15 21:45:24',2);
INSERT INTO os_core_v4b_pgpages_pages VALUES (8,108,10000,2,'deu','A','2005-06-15 21:45:24',2,'2005-06-15 21:45:24',2);
INSERT INTO os_core_v4b_pgpages_pages VALUES (9,108,10000,2,'spa','A','2005-06-15 21:45:24',2,'2005-06-15 21:45:24',2);

--
-- Table structure for table `os_core_v4b_pgpages_pubpages`
--

DROP TABLE IF EXISTS os_core_v4b_pgpages_pubpages;
CREATE TABLE os_core_v4b_pgpages_pubpages (
  ppu_id int(10) unsigned NOT NULL auto_increment,
  ppu_pub_cat_id int(11) NOT NULL default '0',
  ppu_page_cat_id int(11) NOT NULL default '0',
  ppu_position int(11) NOT NULL default '0',
  ppu_obj_status char(1) NOT NULL default 'A',
  ppu_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  ppu_cr_uid int(11) NOT NULL default '0',
  ppu_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  ppu_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (ppu_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_pgpages_pubpages`
--


--
-- Table structure for table `os_core_v4b_projects_changelog`
--

DROP TABLE IF EXISTS os_core_v4b_projects_changelog;
CREATE TABLE os_core_v4b_projects_changelog (
  pcl_id int(10) unsigned NOT NULL auto_increment,
  pcl_project_id int(11) NOT NULL default '0',
  pcl_milestone_id int(11) NOT NULL default '0',
  pcl_todo_id int(11) NOT NULL default '0',
  pcl_task_cat_val varchar(64) default NULL,
  pcl_date datetime default NULL,
  pcl_name varchar(80) default NULL,
  pcl_description varchar(255) default NULL,
  pcl_obj_status char(1) NOT NULL default 'A',
  pcl_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  pcl_cr_uid int(11) NOT NULL default '0',
  pcl_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  pcl_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (pcl_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_projects_changelog`
--


--
-- Table structure for table `os_core_v4b_projects_customer`
--

DROP TABLE IF EXISTS os_core_v4b_projects_customer;
CREATE TABLE os_core_v4b_projects_customer (
  pcu_id int(10) unsigned NOT NULL auto_increment,
  pcu_company_id int(11) NOT NULL default '0',
  pcu_branch_id int(11) NOT NULL default '0',
  pcu_contact_id int(11) NOT NULL default '0',
  pcu_name varchar(80) default NULL,
  pcu_description varchar(255) default NULL,
  pcu_pending_status varchar(64) default 'P',
  pcu_obj_status char(1) NOT NULL default 'A',
  pcu_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  pcu_cr_uid int(11) NOT NULL default '0',
  pcu_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  pcu_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (pcu_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_projects_customer`
--


--
-- Table structure for table `os_core_v4b_projects_milestone`
--

DROP TABLE IF EXISTS os_core_v4b_projects_milestone;
CREATE TABLE os_core_v4b_projects_milestone (
  pmi_id int(10) unsigned NOT NULL auto_increment,
  pmi_project_id int(11) NOT NULL default '0',
  pmi_date datetime default NULL,
  pmi_name varchar(80) default NULL,
  pmi_description varchar(255) default NULL,
  pmi_obj_status char(1) NOT NULL default 'A',
  pmi_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  pmi_cr_uid int(11) NOT NULL default '0',
  pmi_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  pmi_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (pmi_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_projects_milestone`
--


--
-- Table structure for table `os_core_v4b_projects_permission`
--

DROP TABLE IF EXISTS os_core_v4b_projects_permission;
CREATE TABLE os_core_v4b_projects_permission (
  ppe_id int(10) unsigned NOT NULL auto_increment,
  ppe_project_id int(11) NOT NULL default '0',
  ppe_group_id int(11) NOT NULL default '0',
  ppe_permission_cat_val varchar(64) default 'READ',
  ppe_obj_status char(1) NOT NULL default 'A',
  ppe_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  ppe_cr_uid int(11) NOT NULL default '0',
  ppe_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  ppe_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (ppe_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_projects_permission`
--


--
-- Table structure for table `os_core_v4b_projects_project`
--

DROP TABLE IF EXISTS os_core_v4b_projects_project;
CREATE TABLE os_core_v4b_projects_project (
  ppr_id int(10) unsigned NOT NULL auto_increment,
  ppr_name varchar(128) NOT NULL default '',
  ppr_description text NOT NULL,
  ppr_type varchar(64) NOT NULL default '',
  ppr_customer_id int(11) NOT NULL default '0',
  ppr_priority_cat_val varchar(64) default NULL,
  ppr_status_cat_val varchar(64) default NULL,
  ppr_completion_cat_val varchar(64) default NULL,
  ppr_parent_project_id int(11) default NULL,
  ppr_forum_topic_id varchar(20) default NULL,
  ppr_docmgmt_folder_id varchar(20) default NULL,
  ppr_display_global char(1) default '0',
  ppr_startdate datetime NOT NULL default '0000-00-00 00:00:00',
  ppr_enddate datetime NOT NULL default '0000-00-00 00:00:00',
  ppr_closing_comment text,
  ppr_closing_date datetime default NULL,
  ppr_owner_proj_management_uid int(11) NOT NULL default '0',
  ppr_owner_proj_controlling_uid int(11) default NULL,
  ppr_owner_proj_reporting_uid int(11) default NULL,
  ppr_owner_approved_by_uid int(11) default NULL,
  ppr_comment text,
  ppr_pending_status varchar(64) default 'P',
  ppr_ipath varchar(64) NOT NULL default '/',
  ppr_obj_status char(1) NOT NULL default 'A',
  ppr_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  ppr_cr_uid int(11) NOT NULL default '0',
  ppr_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  ppr_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (ppr_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_projects_project`
--


--
-- Table structure for table `os_core_v4b_projects_statusreport`
--

DROP TABLE IF EXISTS os_core_v4b_projects_statusreport;
CREATE TABLE os_core_v4b_projects_statusreport (
  pst_id int(10) unsigned NOT NULL auto_increment,
  pst_project_id int(11) NOT NULL default '0',
  pst_milestone_id int(11) NOT NULL default '0',
  pst_todo_id int(11) NOT NULL default '0',
  pst_period_cat_val varchar(64) default NULL,
  pst_summary varchar(255) default NULL,
  pst_status_cat_val varchar(64) default NULL,
  pst_activity1 varchar(255) default NULL,
  pst_activity2 varchar(255) default NULL,
  pst_activity3 varchar(255) default NULL,
  pst_result1 varchar(255) default NULL,
  pst_result2 varchar(255) default NULL,
  pst_result3 varchar(255) default NULL,
  pst_comment1 varchar(255) default NULL,
  pst_comment2 varchar(255) default NULL,
  pst_comment3 varchar(255) default NULL,
  pst_news text,
  pst_next_steps text,
  pst_work_days_intern_plan float default '0',
  pst_work_days_intern_curr float default '0',
  pst_work_days_intern_diff float default '0',
  pst_work_days_extern_plan float default '0',
  pst_work_days_extern_curr float default '0',
  pst_work_days_extern_diff float default '0',
  pst_projected_enddate datetime NOT NULL default '0000-00-00 00:00:00',
  pst_comment text,
  pst_pending_status varchar(64) default 'P',
  pst_obj_status char(1) NOT NULL default 'A',
  pst_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  pst_cr_uid int(11) NOT NULL default '0',
  pst_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  pst_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (pst_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_projects_statusreport`
--


--
-- Table structure for table `os_core_v4b_projects_timetracker`
--

DROP TABLE IF EXISTS os_core_v4b_projects_timetracker;
CREATE TABLE os_core_v4b_projects_timetracker (
  ptr_id int(10) unsigned NOT NULL auto_increment,
  ptr_project_id int(11) NOT NULL default '0',
  ptr_milestone_id int(11) NOT NULL default '0',
  ptr_todo_id int(11) NOT NULL default '0',
  ptr_owner_uid int(11) NOT NULL default '0',
  ptr_startdate datetime default NULL,
  ptr_enddate datetime default NULL,
  ptr_minutes int(11) NOT NULL default '0',
  ptr_task_cat_val varchar(64) default NULL,
  ptr_obj_status char(1) NOT NULL default 'A',
  ptr_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  ptr_cr_uid int(11) NOT NULL default '0',
  ptr_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  ptr_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (ptr_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_projects_timetracker`
--


--
-- Table structure for table `os_core_v4b_projects_todo`
--

DROP TABLE IF EXISTS os_core_v4b_projects_todo;
CREATE TABLE os_core_v4b_projects_todo (
  ptd_id int(10) unsigned NOT NULL auto_increment,
  ptd_project_id int(11) NOT NULL default '0',
  ptd_milestone_id int(11) NOT NULL default '0',
  ptd_todo_id int(11) default NULL,
  ptd_name varchar(80) default NULL,
  ptd_description varchar(255) default NULL,
  ptd_task_cat_val varchar(64) NOT NULL default '',
  ptd_location varchar(80) default NULL,
  ptd_billable_cat_val varchar(64) default NULL,
  ptd_transportation_cat_val varchar(64) default NULL,
  ptd_startdate datetime default NULL,
  ptd_enddate datetime default NULL,
  ptd_owner_uid int(11) default NULL,
  ptd_owner_gid int(11) default NULL,
  ptd_from_uid int(11) default NULL,
  ptd_status_cat_val varchar(64) default NULL,
  ptd_priority_cat_val varchar(64) default NULL,
  ptd_permission varchar(64) default 'PUBLIC',
  ptd_pending_status varchar(64) NOT NULL default 'P',
  ptd_ipath varchar(64) NOT NULL default '/',
  ptd_obj_status char(1) NOT NULL default 'A',
  ptd_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  ptd_cr_uid int(11) NOT NULL default '0',
  ptd_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  ptd_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (ptd_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_projects_todo`
--


--
-- Table structure for table `os_core_v4b_projects_utilization`
--

DROP TABLE IF EXISTS os_core_v4b_projects_utilization;
CREATE TABLE os_core_v4b_projects_utilization (
  put_id int(10) unsigned NOT NULL auto_increment,
  put_type varchar(64) NOT NULL default 'PLAN',
  put_project_id int(11) NOT NULL default '0',
  put_milestone_id int(11) NOT NULL default '0',
  put_period_cat_val varchar(64) NOT NULL default '',
  put_task_cat_val varchar(64) NOT NULL default '',
  put_pay_cat_val varchar(64) NOT NULL default '',
  put_days float NOT NULL default '0',
  put_comment varchar(255) default NULL,
  put_pending_status varchar(64) default 'P',
  put_obj_status char(1) NOT NULL default 'A',
  put_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  put_cr_uid int(11) NOT NULL default '0',
  put_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  put_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (put_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_projects_utilization`
--


--
-- Table structure for table `os_core_v4b_rbs_category`
--

DROP TABLE IF EXISTS os_core_v4b_rbs_category;
CREATE TABLE os_core_v4b_rbs_category (
  rbc_id int(11) unsigned NOT NULL auto_increment,
  rbc_name varchar(80) NOT NULL default '',
  rbc_url varchar(80) default NULL,
  rbc_is_default int(1) default '0',
  rbc_needs_approval int(1) default '0',
  rbc_support_accounting int(1) NOT NULL default '0',
  rbc_account_id int(1) NOT NULL default '0',
  rbc_support_multiplayer int(1) NOT NULL default '0',
  rbc_admin_group_id int(11) default '0',
  rbc_obj_status char(1) NOT NULL default 'A',
  rbc_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  rbc_cr_uid int(11) NOT NULL default '0',
  rbc_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  rbc_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (rbc_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_rbs_category`
--


--
-- Table structure for table `os_core_v4b_rbs_entry`
--

DROP TABLE IF EXISTS os_core_v4b_rbs_entry;
CREATE TABLE os_core_v4b_rbs_entry (
  rbe_id int(11) unsigned NOT NULL auto_increment,
  rbe_repeat_id int(11) default NULL,
  rbe_category_id int(11) NOT NULL default '0',
  rbe_resource_id int(11) NOT NULL default '0',
  rbe_subject varchar(80) NOT NULL default '',
  rbe_description varchar(255) NOT NULL default '',
  rbe_startdate datetime NOT NULL default '0000-00-00 00:00:00',
  rbe_enddate datetime NOT NULL default '0000-00-00 00:00:00',
  rbe_user_1 int(11) NOT NULL default '0',
  rbe_user_2 int(11) NOT NULL default '0',
  rbe_user_3 int(11) NOT NULL default '0',
  rbe_user_4 int(11) NOT NULL default '0',
  rbe_needs_approval int(1) NOT NULL default '0',
  rbe_pending_state char(1) NOT NULL default 'P',
  rbe_approved_by int(11) NOT NULL default '0',
  rbe_approved_date datetime default NULL,
  rbe_obj_status char(1) NOT NULL default 'A',
  rbe_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  rbe_cr_uid int(11) NOT NULL default '0',
  rbe_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  rbe_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (rbe_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_rbs_entry`
--


--
-- Table structure for table `os_core_v4b_rbs_repeat`
--

DROP TABLE IF EXISTS os_core_v4b_rbs_repeat;
CREATE TABLE os_core_v4b_rbs_repeat (
  rbp_id int(11) unsigned NOT NULL auto_increment,
  rbp_resource_id int(11) NOT NULL default '0',
  rbp_type int(11) NOT NULL default '0',
  rbp_day int(11) default NULL,
  rbp_startdate datetime NOT NULL default '0000-00-00 00:00:00',
  rbp_enddate datetime NOT NULL default '0000-00-00 00:00:00',
  rbp_obj_status char(1) NOT NULL default 'A',
  rbp_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  rbp_cr_uid int(11) NOT NULL default '0',
  rbp_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  rbp_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (rbp_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_rbs_repeat`
--


--
-- Table structure for table `os_core_v4b_rbs_resource`
--

DROP TABLE IF EXISTS os_core_v4b_rbs_resource;
CREATE TABLE os_core_v4b_rbs_resource (
  rbr_id int(11) unsigned NOT NULL auto_increment,
  rbr_category_id int(11) NOT NULL default '0',
  rbr_name varchar(80) NOT NULL default '',
  rbr_description varchar(255) default NULL,
  rbr_cost varchar(255) NOT NULL default '0',
  rbr_extra int(1) NOT NULL default '0',
  rbr_image varchar(255) default NULL,
  rbr_obj_status char(1) NOT NULL default 'A',
  rbr_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  rbr_cr_uid int(11) NOT NULL default '0',
  rbr_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  rbr_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (rbr_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_v4b_rbs_resource`
--


--
-- Table structure for table `os_core_whatsnews_config`
--

DROP TABLE IF EXISTS os_core_whatsnews_config;
CREATE TABLE os_core_whatsnews_config (
  wn_nid int(10) unsigned NOT NULL default '0',
  wn_secid varchar(50) NOT NULL default '',
  wn_sqlstatement text NOT NULL,
  wn_sqlstatementfortrigger text NOT NULL,
  wn_htmlheader text NOT NULL,
  wn_linkstatement text NOT NULL,
  wn_htmlfooter text NOT NULL,
  wn_emptyhtml text NOT NULL,
  wn_textheader text NOT NULL,
  wn_txtlinkstatement text NOT NULL,
  wn_textfooter text NOT NULL,
  wn_emptytext text NOT NULL,
  wn_sqllimit tinyint(4) NOT NULL default '5',
  wn_sqldatestart enum('lastsent','now','all') NOT NULL default 'lastsent',
  wn_sqltimerange enum('','1w','2w','3w','4w','5w','6w','8w') NOT NULL default '',
  wn_sqldateend enum('all','now') NOT NULL default 'all',
  wn_sqltrigger tinyint(3) unsigned NOT NULL default '0',
  wn_rssremoteurl varchar(255) NOT NULL default '',
  wn_rssconfig varchar(255) NOT NULL default 'a:6:{s:8:"altstyle";i:0;s:16:"showdescriptions";i:0;s:10:"showsearch";i:0;s:9:"showimage";s:1:"1";s:8:"maxitems";s:1:"5";s:6:"rssurl";s:0:"";}',
  PRIMARY KEY  (wn_secid,wn_nid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_whatsnews_config`
--

INSERT INTO os_core_whatsnews_config VALUES (1,'latestdownloads','SELECT pn_lid, pn_cid, pn_sid, pn_title, pn_description, DATE_FORMAT(pn_date,\'%Y-%m-%d\') as pn_date, pn_hits\r\nFROM [wnglobal_nukeprefix]_downloads_downloads\r\nWHERE pn_date >= [wnpluginsql_datestart]\r\n AND  pn_date <= [wnpluginsql_dateend]\r\nORDER BY pn_lid DESC \r\n[wnpluginsql_limit]','','<table width=\'100%\'>\r\n<tr>\r\n<td width=\'100%\' colspan=\'3\'><p align=\'center\'><b><font size=\'2\'>The [wnplugin_limit] lastest downloads :</font></b></td>\r\n</tr>\r\n<tr bgcolor=\'#6699cc\'>\r\n<td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>N°- TITLE</b></font></td>\r\n<td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Adding date :</b></font></td>\r\n<td align=\'center\' NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Hits</b></font></td>\r\n</tr>\r\n','<tr bgcolor=\"#[wnpluginrow_dualswitch#EFEFEF#6699cc]\">\r\n  <td NOWRAP><font size=\'2\'>[wnpluginrow_counter] - <a style=\'color:#0000ff\' href=\"[wnglobal_sitebaseurl]modules.php?op=modload&name=Downloads&file=index&req=viewdownloaddetails&lid=[pn_lid]&ttitle=[pn_title]\">[pn_title]</a></font></td>\r\n  <td NOWRAP><font size=\'2\' color=\'#0000ff\'>[pn_date]</font></td>\r\n  <td align=\'center\' NOWRAP><font size=\'2\' color=\'#0000ff\'>[pn_hits]</font></td>\r\n</tr>\r\n','<tr bgcolor=\'#6699cc\'>\r\n<td colspan=\'3\'><font size=\'1\'>- <a style=\'color:#0000FF\' href=\"[wnglobal_sitebaseurl]modules.php?op=modload&name=Downloads&file=index\">All the downloads</a></font></td>\r\n</tr>\r\n</table>\r\n','<table width=\'100%\'>\r\n<tr>\r\n<td width=\'100%\' colspan=\'3\'><p align=\'center\'><b><font size=\'2\'>The [wnplugin_limit] lastest downloads :</font></b></td>\r\n</tr>\r\n<tr bgcolor=\'#6699cc\'>\r\n<td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>N°- TITLE</b></font></td>\r\n<td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Adding date :</b></font></td>\r\n<td align=\'center\' NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Hits</b></font></td>\r\n</tr>\r\n<tr bgcolor=\'#EFEFEF\'>\r\n<td colspan=\'3\'><font size=\'1\'>No new downloads found</font></td>\r\n</tr>\r\n<tr bgcolor=\'#6699cc\'>\r\n<td colspan=\'3\'><font size=\'1\'>- <a style=\'color:#0000FF\' href=\"[wnglobal_sitebaseurl]modules.php?op=modload&name=Downloads&file=index\">All the downloads</a></font></td>\r\n</tr>\r\n</table>\r\n','The [wnplugin_limit] latest downloads\r\n---------------------------------------------------------\r\n','[] [pn_date] - [pn_title] - Hits: [pn_hits]\r\n( URL: [wnglobal_sitebaseurl]modules.php?op=modload&name=Downloads&file=index&req=viewdownloaddetails&lid=[pn_lid]&ttitle=[pn_title] )\r\n\r\n','---------------------------------------------------------\r\nAll the downloads:\r\n   [wnglobal_sitebaseurl]modules.php?op=modload&name=Downloads&file=index','No new downloads found\r\n---------------------------------------------------------\r\nAll the downloads:\r\n   [wnglobal_sitebaseurl]modules.php?op=modload&name=Downloads&file=index',15,'lastsent','','now',0,'','a:4:{s:16:\"showdescriptions\";i:0;s:10:\"showsearch\";i:0;s:9:\"showimage\";i:1;s:8:\"maxitems\";i:5;}');
INSERT INTO os_core_whatsnews_config VALUES (1,'latestpolls','SELECT pn_pollID, pn_title, FROM_UNIXTIME(pn_timestamp,\'%Y-%m-%d\') AS pn_date, pn_voters \r\nFROM [wnglobal_nukeprefix]_poll_desc \r\nWHERE pn_timestamp >= [wnpluginsql_datestartunixtime]\r\n AND  pn_timestamp <= [wnpluginsql_dateendunixtime]\r\nORDER BY pn_timestamp DESC\r\n[wnpluginsql_limit]\r\n','','<table width=\'100%\'>\r\n<tr>\r\n<td width=\'100%\' colspan=\'3\'><p align=\'center\'><b><font size=\'2\'>The [wnplugin_limit] lastest surveys :</font></b></td>\r\n</tr>\r\n<tr bgcolor=\'#6699cc\'>\r\n<td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>N°- TITLE</b></font></td>\r\n<td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Adding date :</b></font></td>\r\n<td align=\'center\' NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Votes</b></font></td>\r\n</tr>\r\n','<tr bgcolor=\"#[wnpluginrow_dualswitch#EFEFEF#6699cc]\">\r\n  <td NOWRAP><font size=\'2\'>[wnpluginrow_counter] - <a style=\'color:#0000FF\' href=\"[wnglobal_sitebaseurl]modules.php?op=modload&name=NS-Polls&file=index&req=results&pollID=[pn_pollID]\">[pn_title]</a></font></td>\r\n  <td NOWRAP><font size=\'2\' color=\'#0000ff\'>[pn_date]</font></td>\r\n  <td align=\'center\' NOWRAP><font size=\'2\' color=\'#0000FF\'>[pn_voters]</font></td>\r\n</tr>\r\n','<tr bgcolor=\'#6699cc\'>\r\n<td colspan=\'3\'><font size=\'1\'>- <a style=\'color:#0000FF\' href=\"[wnglobal_sitebaseurl]modules.php?op=modload&name=NS-Polls&file=index\">All the surveys</a></font></td>\r\n</tr>\r\n</table>\r\n','<table width=\'100%\'>\r\n<tr>\r\n<td width=\'100%\' colspan=\'3\'><p align=\'center\'><b><font size=\'2\'>The [wnplugin_limit] lastest surveys :</font></b></td>\r\n</tr>\r\n<tr bgcolor=\'#6699cc\'>\r\n<td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>N°- TITLE</b></font></td>\r\n<td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Adding date :</b></font></td>\r\n<td align=\'center\' NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Votes</b></font></td>\r\n</tr>\r\n<tr bgcolor=\'#EFEFEF\'>\r\n<td colspan=\'3\'><font size=\'1\'>No new surveys found</font></td>\r\n</tr>\r\n<tr bgcolor=\'#6699cc\'>\r\n<td colspan=\'3\'><font size=\'1\'>- <a style=\'color:#0000FF\' href=\"[wnglobal_sitebaseurl]modules.php?op=modload&name=NS-Polls&file=index\">All the surveys</a></font></td>\r\n</tr>\r\n</table>\r\n','The [wnplugin_limit] latest surveys\r\n---------------------------------------------------------\r\n','[] [pn_date] - [pn_title] - Hits: [pn_voters]\r\n( URL: [wnglobal_sitebaseurl]modules.php?op=modload&name=NS-Polls&file=index&req=results&pollID=[pn_pollID] )\r\n\r\n','---------------------------------------------------------\r\nAll the surveys:\r\n   [wnglobal_sitebaseurl]modules.php?op=modload&name=NS-Polls&file=index','No new surveys found\r\n---------------------------------------------------------\r\nAll the surveys:\r\n   [wnglobal_sitebaseurl]modules.php?op=modload&name=NS-Polls&file=index',15,'lastsent','','now',0,'','a:4:{s:16:\"showdescriptions\";i:0;s:10:\"showsearch\";i:0;s:9:\"showimage\";i:1;s:8:\"maxitems\";i:5;}');
INSERT INTO os_core_whatsnews_config VALUES (1,'lateststories','SELECT pn_sid, pn_catid, pn_aid, pn_title, pn_topic, pn_topictext, [wnglobal_nukeprefix]_stories.pn_counter, DATE_FORMAT(pn_time,\'%Y-%m-%d\') as pn_time\r\nFROM [wnglobal_nukeprefix]_stories LEFT JOIN [wnglobal_nukeprefix]_topics ON pn_topic=pn_topicid\r\nWHERE pn_time >= [wnpluginsql_datestart]\r\n AND  pn_time <= [wnpluginsql_dateend]\r\nORDER BY pn_time DESC \r\n[wnpluginsql_limit]\r\n','','<table width=\'100%\'>\r\n<tr>\r\n<td width=\'100%\' colspan=\'4\' NOWRAP><p align=\'center\'><b><font size=\'2\'>The [wnplugin_limit] lastest news on the site : </font></b></td>\r\n</tr>\r\n<tr bgcolor=\'#6699cc\'>\r\n  <td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Subject : </b></font></td>\r\n  <td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Title : </b></font></td>\r\n  <td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Adding date :</b></font></td>\r\n  <td align=\'center\' NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Hits</b></font></td>\r\n</tr>\r\n','<tr bgcolor=\"#[wnpluginrow_dualswitch#EFEFEF#6699cc]\">\r\n  <td NOWRAP><font size=\'2\'>[wnpluginrow_counter] - <a style=\'color:#0000FF\' href=\"[wnglobal_sitebaseurl]modules.php?op=modload&name=Search&file=index&action=search&overview=1&active_stories=1&stories_topics[0]=[pn_topic]\">[pn_topictext]</a></td>\r\n  <td NOWRAP><font size=\'2\'><a style=\'color:#0000FF\' href=\"[wnglobal_sitebaseurl]modules.php?op=modload&name=News&file=article&sid=[pn_sid]\">[pn_title]</a></td>\r\n  <td NOWRAP><font size=\'2\' color=\'#0000FF\'>[pn_time]</font></td>\r\n  <td align=\'center\' NOWRAP><font size=\'2\' color=\'#0000FF\'>[pn_counter]</font></td>\r\n</tr>\r\n','</table>\r\n','<table width=\'100%\'>\r\n<tr>\r\n<td width=\'100%\' colspan=\'4\' NOWRAP><p align=\'center\'><b><font size=\'2\'>The [wnplugin_limit] lastest stories on the site : </font></b></td>\r\n</tr>\r\n<tr bgcolor=\'#6699cc\'>\r\n  <td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Subject : </b></font></td>\r\n  <td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Title : </b></font></td>\r\n  <td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Adding date :</b></font></td>\r\n  <td align=\'center\' NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Hits</b></font></td>\r\n</tr>\r\n<tr bgcolor=\'#EFEFEF\'>\r\n<td colspan=\'4\'><font size=\'1\'>No new stories found</font></td>\r\n</tr>\r\n</table>\r\n','The [wnplugin_limit] latest news\r\n---------------------------------------------------------\r\n','[] [pn_time] - [pn_topictext] - Hits: [pn_counter]\r\n( URL: [wnglobal_sitebaseurl]modules.php?op=modload&name=News&file=article&sid=[pn_sid] )\r\nTitle: [pn_title]\r\n\r\n','---------------------------------------------------------\r\nAll the news:\r\n   [wnglobal_sitebaseurl]modules.php?op=modload&name=News&file=index\r\n','No new stories found\r\n---------------------------------------------------------\r\nAll the news:\r\n   [wnglobal_sitebaseurl]modules.php?op=modload&name=News&file=index\r\n',15,'lastsent','','now',0,'','a:4:{s:16:\"showdescriptions\";i:0;s:10:\"showsearch\";i:0;s:9:\"showimage\";i:1;s:8:\"maxitems\";i:5;}');
INSERT INTO os_core_whatsnews_config VALUES (1,'latestweblinks','SELECT pn_lid, pn_cat_id, pn_title, pn_description, DATE_FORMAT(pn_date,\'%Y-%m-%d\') as pn_date, pn_hits \r\nFROM [wnglobal_nukeprefix]_links_links \r\nWHERE pn_date >= [wnpluginsql_datestart]\r\n AND  pn_date <= [wnpluginsql_dateend]\r\nORDER BY pn_lid DESC\r\n[wnpluginsql_limit]\r\n','','<table width=\'100%\'>\r\n<tr>\r\n<td width=\'100%\' colspan=\'3\'><p align=\'center\'><b><font size=\'2\'>The [wnplugin_limit] lastest web links : </font></b></td></tr>\r\n<tr bgcolor=\'#6699cc\'>\r\n<td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>N°- TITLE</b></font></td>\r\n<td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Adding date :</b></font></td>\r\n<td align=\'center\' NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Hits</b></font></td>\r\n</tr>\r\n','<tr bgcolor=\"#[wnpluginrow_dualswitch#EFEFEF#6699cc]\">\r\n  <td NOWRAP><font size=\'2\'>[wnpluginrow_counter] - <a style=\'color:#0000FF\' href=\"[wnglobal_sitebaseurl]modules.php?op=modload&name=Web_Links&file=index&req=viewlinkdetails&lid=[pn_lid]&ttitle=[pn_title]\">[pn_title]</a></font></td>\r\n  <td NOWRAP><font size=\'2\' color=\'#0000FF\'>[pn_date]</font></td>\r\n  <td align=\'center\' NOWRAP><font size=\'2\' color=\'#0000FF\'>[pn_hits]</font></td>\r\n</tr>\r\n','<tr bgcolor=\'#6699cc\'>\r\n<td colspan=\'3\'><font size=\'1\'>- <a style=\'color:#0000FF\' href=\"[wnglobal_sitebaseurl]modules.php?op=modload&name=Web_Links&file=index\">All the web links</a></font></td>\r\n</tr>\r\n</table>\r\n','<table width=\'100%\'>\r\n<tr>\r\n<td width=\'100%\' colspan=\'3\'><p align=\'center\'><b><font size=\'2\'>The [wnplugin_limit] lastest web links : </font></b></td></tr>\r\n<tr bgcolor=\'#6699cc\'>\r\n<td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>N°- TITLE</b></font></td>\r\n<td NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Adding date :</b></font></td>\r\n<td align=\'center\' NOWRAP><font size=\'2\' color=\'#0000FF\'><b>Hits</b></font></td>\r\n</tr>\r\n<tr bgcolor=\'#EFEFEF\'>\r\n<td colspan=\'3\'><font size=\'1\'>No new web links found</font></td>\r\n</tr>\r\n<tr bgcolor=\'#6699cc\'>\r\n<td colspan=\'3\'><font size=\'1\'>- <a style=\'color:#0000FF\' href=\"[wnglobal_sitebaseurl]modules.php?op=modload&name=Web_Links&file=index\">All the web links</a></font></td>\r\n</tr>\r\n</table>\r\n','The [wnplugin_limit] latest web links\r\n---------------------------------------------------------\r\n','[] [pn_date] - [pn_title] - Hits: [pn_hits]\r\n( URL: [wnglobal_sitebaseurl]modules.php?op=modload&name=Web_Links&file=index&req=viewlinkdetails&lid=[pn_lid]&ttitle=[pn_title] )\r\n\r\n','---------------------------------------------------------\r\nAll the web links:\r\n   [wnglobal_sitebaseurl]modules.php?op=modload&name=Web_Links&file=index','No new web links found\r\n---------------------------------------------------------\r\nAll the web links:\r\n   [wnglobal_sitebaseurl]modules.php?op=modload&name=Web_Links&file=index',15,'lastsent','','now',0,'','a:4:{s:16:\"showdescriptions\";i:0;s:10:\"showsearch\";i:0;s:9:\"showimage\";i:1;s:8:\"maxitems\";i:5;}');

--
-- Table structure for table `os_core_whatsnews_emailusers`
--

DROP TABLE IF EXISTS os_core_whatsnews_emailusers;
CREATE TABLE os_core_whatsnews_emailusers (
  wn_key int(10) unsigned NOT NULL auto_increment,
  wn_email varchar(255) NOT NULL default '',
  wn_password varchar(16) NOT NULL default '',
  PRIMARY KEY  (wn_key)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_whatsnews_emailusers`
--


--
-- Table structure for table `os_core_whatsnews_log`
--

DROP TABLE IF EXISTS os_core_whatsnews_log;
CREATE TABLE os_core_whatsnews_log (
  wn_logid int(10) unsigned NOT NULL auto_increment,
  wn_log_user_uid int(11) NOT NULL default '0',
  wn_log_emailid int(10) unsigned NOT NULL default '0',
  wn_log_email varchar(255) NOT NULL default '',
  wn_log_date datetime NOT NULL default '0000-00-00 00:00:00',
  wn_log_nid int(10) unsigned NOT NULL default '0',
  wn_log_admin_uid int(11) NOT NULL default '0',
  wn_log_action enum('subscribed','confirming_s','unsubscribed','confirming_u','sent_test','sent_letter','unknown') NOT NULL default 'unknown',
  wn_log_mimetype enum('html','text','both','none') NOT NULL default 'none',
  PRIMARY KEY  (wn_logid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_whatsnews_log`
--

INSERT INTO os_core_whatsnews_log VALUES (1,2,0,'openstar@example.com','2006-05-09 19:05:48',1,0,'confirming_s','html');

--
-- Table structure for table `os_core_whatsnews_newsletter`
--

DROP TABLE IF EXISTS os_core_whatsnews_newsletter;
CREATE TABLE os_core_whatsnews_newsletter (
  wn_nid int(10) unsigned NOT NULL auto_increment,
  wn_title varchar(100) NOT NULL default '',
  wn_sitebaseurl varchar(255) NOT NULL default '',
  wn_htmltemplate text NOT NULL,
  wn_texttemplate text NOT NULL,
  wn_htmlbody text NOT NULL,
  wn_textbody text NOT NULL,
  wn_lastsent datetime NOT NULL default '0000-00-00 00:00:00',
  wn_public tinyint(1) NOT NULL default '0',
  wn_description varchar(255) NOT NULL default '',
  wn_html tinyint(3) unsigned NOT NULL default '0',
  wn_text tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (wn_nid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_whatsnews_newsletter`
--

INSERT INTO os_core_whatsnews_newsletter VALUES (1,'Sample Newsletter','http://localhost/v4b/openstar/','<html>\r\n<body>\r\n<!-- Introduction -->\r\n\r\nNewsletter from [wnglobal_nukesitename] - [wnglobal_nukeslogan]\r\n\r\n<!-- Downloads -->\r\n\r\n[latestdownloads]\r\n\r\n<p>\r\n\r\n\r\n<!-- News -->\r\n\r\n[lateststories]\r\n\r\n<p>\r\n\r\n\r\n<!-- Web links -->\r\n\r\n[latestweblinks]\r\n\r\n<p>\r\n\r\n\r\n<!-- Polls -->\r\n\r\n[latestpolls]\r\n\r\n\r\n<p>\r\n\r\n<!-- Final words -->\r\n\r\n<HR NOSHADE>\r\nTo unsubscribe from this newsletter please go to:<br>\r\n&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"[wnglobal_sitebaseurl]?name=whatsnews\">[wnglobal_sitebaseurl]?name=whatsnews</a>\r\n</body>\r\n</html>','Newsletter from [wnglobal_nukesitename] - [wnglobal_nukeslogan]\r\n\r\n\r\n[latestdownloads]\r\n\r\n\r\n[lateststories]\r\n\r\n\r\n[latestweblinks]\r\n\r\n\r\n[latestpolls]\r\n\r\n\r\nYours\r\n    [wnglobal_nukeadminmail]\r\n\r\n---------------------------------------------------------------------\r\nTo unsubscribe from this newsletter please go to: wnglobal_sitebaseurl]?name=whatsnews','','','0000-00-00 00:00:00',1,'Stay in tune... stay informed! Subscribe to this newsletter that will be delivered to your email with links to the latest news, downloads, polls and other activities of this site.',1,1);

--
-- Table structure for table `os_core_whatsnews_subscribers`
--

DROP TABLE IF EXISTS os_core_whatsnews_subscribers;
CREATE TABLE os_core_whatsnews_subscribers (
  wn_uid int(11) NOT NULL default '0',
  wn_emailid int(10) unsigned NOT NULL default '0',
  wn_nid int(10) unsigned NOT NULL default '0',
  wn_mimetype char(1) NOT NULL default 'T',
  wn_status char(2) NOT NULL default 'Us',
  wn_confirmid varchar(50) NOT NULL default '',
  PRIMARY KEY  (wn_uid,wn_nid,wn_emailid)
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_whatsnews_subscribers`
--

INSERT INTO os_core_whatsnews_subscribers VALUES (2,0,1,'H','Us','3046bf097a86abec8b4562d1cf74f913');

--
-- Table structure for table `os_service_bug_file_table`
--

DROP TABLE IF EXISTS os_service_bug_file_table;
CREATE TABLE os_service_bug_file_table (
  id int(7) unsigned NOT NULL auto_increment,
  bug_id int(7) unsigned NOT NULL default '0',
  title varchar(250) NOT NULL default '',
  description varchar(250) NOT NULL default '',
  diskfile varchar(250) NOT NULL default '',
  filename varchar(250) NOT NULL default '',
  folder varchar(250) NOT NULL default '',
  filesize int(11) NOT NULL default '0',
  file_type varchar(250) NOT NULL default '',
  date_added datetime NOT NULL default '1970-01-01 00:00:01',
  content longblob NOT NULL,
  PRIMARY KEY  (id),
  KEY bug_id (bug_id),
  KEY date_added (date_added),
  KEY title (title),
  KEY bug_id_2 (bug_id),
  KEY date_added_2 (date_added),
  KEY title_2 (title),
  KEY bug_id_3 (bug_id),
  KEY date_added_3 (date_added),
  KEY title_3 (title),
  KEY bug_id_4 (bug_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_bug_file_table`
--


--
-- Table structure for table `os_service_bug_history_table`
--

DROP TABLE IF EXISTS os_service_bug_history_table;
CREATE TABLE os_service_bug_history_table (
  id int(7) unsigned NOT NULL auto_increment,
  user_id int(7) unsigned NOT NULL default '0',
  bug_id int(7) unsigned NOT NULL default '0',
  date_modified datetime NOT NULL default '1970-01-01 00:00:01',
  field_name varchar(32) NOT NULL default '',
  old_value varchar(128) NOT NULL default '',
  new_value varchar(128) NOT NULL default '',
  `type` int(2) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY bug_id (bug_id),
  KEY user_id (user_id),
  KEY bug_id_2 (bug_id),
  KEY user_id_2 (user_id),
  KEY bug_id_3 (bug_id),
  KEY user_id_3 (user_id),
  KEY bug_id_4 (bug_id),
  KEY user_id_4 (user_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_bug_history_table`
--


--
-- Table structure for table `os_service_bug_monitor_table`
--

DROP TABLE IF EXISTS os_service_bug_monitor_table;
CREATE TABLE os_service_bug_monitor_table (
  user_id int(7) unsigned NOT NULL default '0',
  bug_id int(7) unsigned NOT NULL default '0',
  PRIMARY KEY  (user_id,bug_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_bug_monitor_table`
--


--
-- Table structure for table `os_service_bug_relationship_table`
--

DROP TABLE IF EXISTS os_service_bug_relationship_table;
CREATE TABLE os_service_bug_relationship_table (
  id int(7) unsigned NOT NULL auto_increment,
  source_bug_id int(7) unsigned NOT NULL default '0',
  destination_bug_id int(7) unsigned NOT NULL default '0',
  relationship_type int(2) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY source_bug_id (source_bug_id),
  KEY destination_bug_id (destination_bug_id),
  KEY source_bug_id_2 (source_bug_id),
  KEY destination_bug_id_2 (destination_bug_id),
  KEY source_bug_id_3 (source_bug_id),
  KEY destination_bug_id_3 (destination_bug_id),
  KEY source_bug_id_4 (source_bug_id),
  KEY destination_bug_id_4 (destination_bug_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_bug_relationship_table`
--


--
-- Table structure for table `os_service_bug_table`
--

DROP TABLE IF EXISTS os_service_bug_table;
CREATE TABLE os_service_bug_table (
  id int(7) unsigned NOT NULL auto_increment,
  project_id int(7) unsigned NOT NULL default '0',
  reporter_id int(7) unsigned NOT NULL default '0',
  handler_id int(7) unsigned NOT NULL default '0',
  duplicate_id int(7) unsigned NOT NULL default '0',
  priority int(2) NOT NULL default '30',
  severity int(2) NOT NULL default '50',
  reproducibility int(2) NOT NULL default '10',
  `status` int(2) NOT NULL default '10',
  resolution int(2) NOT NULL default '10',
  projection int(2) NOT NULL default '10',
  category varchar(64) NOT NULL default '',
  date_submitted datetime NOT NULL default '1970-01-01 00:00:01',
  last_updated datetime NOT NULL default '1970-01-01 00:00:01',
  eta int(2) NOT NULL default '10',
  bug_text_id int(7) unsigned NOT NULL default '0',
  os varchar(32) NOT NULL default '',
  os_build varchar(32) NOT NULL default '',
  platform varchar(32) NOT NULL default '',
  version varchar(64) NOT NULL default '',
  fixed_in_version varchar(64) NOT NULL default '',
  build varchar(32) NOT NULL default '',
  profile_id int(7) unsigned NOT NULL default '0',
  view_state int(2) NOT NULL default '10',
  summary varchar(128) NOT NULL default '',
  sponsorship_total int(7) NOT NULL default '0',
  sticky tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY sponsorship_total (sponsorship_total),
  KEY fixed_in_version (fixed_in_version),
  KEY `status` (`status`),
  KEY project_id (project_id),
  KEY priority (priority),
  KEY project_id_2 (project_id),
  KEY reporter_id (reporter_id),
  KEY handler_id (handler_id),
  KEY severity (severity),
  KEY reproducibility (reproducibility),
  KEY status_2 (`status`),
  KEY resolution (resolution),
  KEY projection (projection),
  KEY category (category),
  KEY last_updated (last_updated),
  KEY priority_2 (priority),
  KEY project_id_3 (project_id),
  KEY reporter_id_2 (reporter_id),
  KEY handler_id_2 (handler_id),
  KEY severity_2 (severity),
  KEY reproducibility_2 (reproducibility),
  KEY status_3 (`status`),
  KEY resolution_2 (resolution),
  KEY projection_2 (projection),
  KEY category_2 (category),
  KEY last_updated_2 (last_updated),
  KEY priority_3 (priority),
  KEY project_id_4 (project_id),
  KEY reporter_id_3 (reporter_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_bug_table`
--


--
-- Table structure for table `os_service_bug_text_table`
--

DROP TABLE IF EXISTS os_service_bug_text_table;
CREATE TABLE os_service_bug_text_table (
  id int(7) unsigned NOT NULL auto_increment,
  description text NOT NULL,
  steps_to_reproduce text NOT NULL,
  additional_information text NOT NULL,
  PRIMARY KEY  (id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_bug_text_table`
--


--
-- Table structure for table `os_service_bugnote_table`
--

DROP TABLE IF EXISTS os_service_bugnote_table;
CREATE TABLE os_service_bugnote_table (
  id int(7) unsigned NOT NULL auto_increment,
  bug_id int(7) unsigned NOT NULL default '0',
  reporter_id int(7) unsigned NOT NULL default '0',
  bugnote_text_id int(7) unsigned NOT NULL default '0',
  view_state int(2) NOT NULL default '10',
  date_submitted datetime NOT NULL default '1970-01-01 00:00:01',
  last_modified datetime NOT NULL default '1970-01-01 00:00:01',
  note_type int(7) default '0',
  note_attr varchar(250) default '',
  PRIMARY KEY  (id),
  KEY bug_id (bug_id),
  KEY last_modified (last_modified),
  KEY date_submitted (date_submitted),
  KEY view_state (view_state),
  KEY bug_id_2 (bug_id),
  KEY date_submitted_2 (date_submitted),
  KEY view_state_2 (view_state),
  KEY bug_id_3 (bug_id),
  KEY date_submitted_3 (date_submitted),
  KEY view_state_3 (view_state),
  KEY bug_id_4 (bug_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_bugnote_table`
--


--
-- Table structure for table `os_service_bugnote_text_table`
--

DROP TABLE IF EXISTS os_service_bugnote_text_table;
CREATE TABLE os_service_bugnote_text_table (
  id int(7) unsigned NOT NULL auto_increment,
  note text NOT NULL,
  PRIMARY KEY  (id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_bugnote_text_table`
--


--
-- Table structure for table `os_service_config_table`
--

DROP TABLE IF EXISTS os_service_config_table;
CREATE TABLE os_service_config_table (
  config_id varchar(64) NOT NULL default '',
  project_id int(11) NOT NULL default '0',
  user_id int(11) NOT NULL default '0',
  access_reqd int(11) default '0',
  `type` int(11) default '90',
  `value` text NOT NULL,
  PRIMARY KEY  (config_id,project_id,user_id),
  KEY config_id (config_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_config_table`
--

INSERT INTO os_service_config_table VALUES ('database_version',0,0,90,1,'51');

--
-- Table structure for table `os_service_custom_field_project_table`
--

DROP TABLE IF EXISTS os_service_custom_field_project_table;
CREATE TABLE os_service_custom_field_project_table (
  field_id int(3) NOT NULL default '0',
  project_id int(7) unsigned NOT NULL default '0',
  sequence int(2) NOT NULL default '0',
  PRIMARY KEY  (field_id,project_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_custom_field_project_table`
--


--
-- Table structure for table `os_service_custom_field_string_table`
--

DROP TABLE IF EXISTS os_service_custom_field_string_table;
CREATE TABLE os_service_custom_field_string_table (
  field_id int(3) NOT NULL default '0',
  bug_id int(7) NOT NULL default '0',
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (field_id,bug_id),
  KEY bug_id (bug_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_custom_field_string_table`
--


--
-- Table structure for table `os_service_custom_field_table`
--

DROP TABLE IF EXISTS os_service_custom_field_table;
CREATE TABLE os_service_custom_field_table (
  id int(3) NOT NULL auto_increment,
  name varchar(64) NOT NULL default '',
  `type` int(2) NOT NULL default '0',
  possible_values varchar(255) NOT NULL default '',
  default_value varchar(255) NOT NULL default '',
  valid_regexp varchar(255) NOT NULL default '',
  access_level_r int(2) NOT NULL default '0',
  access_level_rw int(2) NOT NULL default '0',
  length_min int(3) NOT NULL default '0',
  length_max int(3) NOT NULL default '0',
  advanced int(1) NOT NULL default '0',
  require_report tinyint(1) NOT NULL default '0',
  require_update tinyint(1) NOT NULL default '0',
  display_report tinyint(1) NOT NULL default '1',
  display_update tinyint(1) NOT NULL default '1',
  require_resolved tinyint(1) NOT NULL default '0',
  display_resolved tinyint(1) NOT NULL default '0',
  display_closed tinyint(1) NOT NULL default '0',
  require_closed tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY name (name)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_custom_field_table`
--


--
-- Table structure for table `os_service_filters_table`
--

DROP TABLE IF EXISTS os_service_filters_table;
CREATE TABLE os_service_filters_table (
  id int(7) unsigned NOT NULL auto_increment,
  user_id int(7) NOT NULL default '0',
  project_id int(7) NOT NULL default '0',
  is_public tinyint(1) default NULL,
  name varchar(64) NOT NULL default '',
  filter_string text NOT NULL,
  PRIMARY KEY  (id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_filters_table`
--


--
-- Table structure for table `os_service_news_table`
--

DROP TABLE IF EXISTS os_service_news_table;
CREATE TABLE os_service_news_table (
  id int(7) unsigned NOT NULL auto_increment,
  project_id int(7) unsigned NOT NULL default '0',
  poster_id int(7) unsigned NOT NULL default '0',
  date_posted datetime NOT NULL default '1970-01-01 00:00:01',
  last_modified datetime NOT NULL default '1970-01-01 00:00:01',
  view_state int(2) NOT NULL default '10',
  announcement int(1) NOT NULL default '0',
  headline varchar(64) NOT NULL default '',
  body text NOT NULL,
  PRIMARY KEY  (id),
  KEY id (id),
  KEY headline (headline),
  KEY announcement (announcement),
  KEY project_id (project_id),
  KEY date_posted (date_posted),
  KEY headline_2 (headline),
  KEY announcement_2 (announcement),
  KEY project_id_2 (project_id),
  KEY date_posted_2 (date_posted),
  KEY headline_3 (headline),
  KEY announcement_3 (announcement),
  KEY project_id_3 (project_id),
  KEY date_posted_3 (date_posted)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_news_table`
--


--
-- Table structure for table `os_service_project_category_table`
--

DROP TABLE IF EXISTS os_service_project_category_table;
CREATE TABLE os_service_project_category_table (
  project_id int(7) unsigned NOT NULL default '0',
  category varchar(64) NOT NULL default '',
  user_id int(7) unsigned NOT NULL default '0',
  PRIMARY KEY  (project_id,category)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_project_category_table`
--


--
-- Table structure for table `os_service_project_file_table`
--

DROP TABLE IF EXISTS os_service_project_file_table;
CREATE TABLE os_service_project_file_table (
  id int(7) unsigned NOT NULL auto_increment,
  project_id int(7) unsigned NOT NULL default '0',
  title varchar(250) NOT NULL default '',
  description varchar(250) NOT NULL default '',
  diskfile varchar(250) NOT NULL default '',
  filename varchar(250) NOT NULL default '',
  folder varchar(250) NOT NULL default '',
  filesize int(11) NOT NULL default '0',
  file_type varchar(250) NOT NULL default '',
  date_added datetime NOT NULL default '1970-01-01 00:00:01',
  content longblob NOT NULL,
  PRIMARY KEY  (id),
  KEY project_id (project_id),
  KEY project_id_2 (project_id),
  KEY filename (filename),
  KEY date_added (date_added),
  KEY project_id_3 (project_id),
  KEY project_id_4 (project_id),
  KEY filename_2 (filename),
  KEY date_added_2 (date_added),
  KEY project_id_5 (project_id),
  KEY project_id_6 (project_id),
  KEY filename_3 (filename),
  KEY date_added_3 (date_added)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_project_file_table`
--


--
-- Table structure for table `os_service_project_hierarchy_table`
--

DROP TABLE IF EXISTS os_service_project_hierarchy_table;
CREATE TABLE os_service_project_hierarchy_table (
  child_id int(10) unsigned NOT NULL default '0',
  parent_id int(10) unsigned NOT NULL default '0',
  KEY child_id (child_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_project_hierarchy_table`
--


--
-- Table structure for table `os_service_project_table`
--

DROP TABLE IF EXISTS os_service_project_table;
CREATE TABLE os_service_project_table (
  id int(7) unsigned NOT NULL auto_increment,
  name varchar(128) NOT NULL default '',
  `status` int(2) NOT NULL default '10',
  enabled int(1) NOT NULL default '1',
  view_state int(2) NOT NULL default '10',
  access_min int(2) NOT NULL default '10',
  file_path varchar(250) NOT NULL default '',
  description text NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY name (name),
  KEY id (id),
  KEY view_state (view_state),
  KEY enabled (enabled),
  KEY view_state_2 (view_state),
  KEY access_min (access_min),
  KEY enabled_2 (enabled),
  KEY view_state_3 (view_state),
  KEY access_min_2 (access_min),
  KEY enabled_3 (enabled),
  KEY view_state_4 (view_state),
  KEY access_min_3 (access_min)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_project_table`
--


--
-- Table structure for table `os_service_project_user_list_table`
--

DROP TABLE IF EXISTS os_service_project_user_list_table;
CREATE TABLE os_service_project_user_list_table (
  project_id int(7) unsigned NOT NULL default '0',
  user_id int(7) unsigned NOT NULL default '0',
  access_level int(2) NOT NULL default '10',
  PRIMARY KEY  (project_id,user_id),
  KEY user_id (user_id),
  KEY user_id_2 (user_id),
  KEY access_level (access_level),
  KEY project_id (project_id),
  KEY user_id_3 (user_id),
  KEY access_level_2 (access_level),
  KEY project_id_2 (project_id),
  KEY user_id_4 (user_id),
  KEY access_level_3 (access_level),
  KEY project_id_3 (project_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_project_user_list_table`
--


--
-- Table structure for table `os_service_project_version_table`
--

DROP TABLE IF EXISTS os_service_project_version_table;
CREATE TABLE os_service_project_version_table (
  id int(7) NOT NULL auto_increment,
  project_id int(7) unsigned NOT NULL default '0',
  version varchar(64) NOT NULL default '',
  date_order datetime NOT NULL default '1970-01-01 00:00:01',
  description text NOT NULL,
  released tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (id),
  UNIQUE KEY project_version (project_id,version)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_project_version_table`
--


--
-- Table structure for table `os_service_sponsorship_table`
--

DROP TABLE IF EXISTS os_service_sponsorship_table;
CREATE TABLE os_service_sponsorship_table (
  id int(7) NOT NULL auto_increment,
  bug_id int(7) NOT NULL default '0',
  user_id int(7) NOT NULL default '0',
  amount int(7) NOT NULL default '0',
  logo varchar(128) NOT NULL default '',
  url varchar(128) NOT NULL default '',
  paid int(1) NOT NULL default '0',
  date_submitted datetime NOT NULL default '1970-01-01 00:00:01',
  last_updated datetime NOT NULL default '1970-01-01 00:00:01',
  PRIMARY KEY  (id),
  KEY bug_id (bug_id),
  KEY user_id (user_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_sponsorship_table`
--


--
-- Table structure for table `os_service_tokens_table`
--

DROP TABLE IF EXISTS os_service_tokens_table;
CREATE TABLE os_service_tokens_table (
  id int(11) NOT NULL auto_increment,
  owner int(11) NOT NULL default '0',
  `type` int(11) NOT NULL default '0',
  `timestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  expiry datetime NOT NULL default '0000-00-00 00:00:00',
  `value` text NOT NULL,
  PRIMARY KEY  (id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_tokens_table`
--

INSERT INTO os_service_tokens_table VALUES (1,2,2,'2005-07-14 23:10:12','0000-00-00 00:00:00','a:7:{s:3:\"new\";s:1:\"1\";s:8:\"feedback\";s:1:\"0\";s:12:\"acknowledged\";s:1:\"0\";s:9:\"confirmed\";s:1:\"0\";s:8:\"assigned\";s:1:\"3\";s:8:\"resolved\";s:1:\"0\";s:6:\"closed\";s:1:\"0\";}');

--
-- Table structure for table `os_service_upgrade_table`
--

DROP TABLE IF EXISTS os_service_upgrade_table;
CREATE TABLE os_service_upgrade_table (
  upgrade_id char(20) NOT NULL default '',
  description char(255) NOT NULL default '',
  PRIMARY KEY  (upgrade_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_upgrade_table`
--

INSERT INTO os_service_upgrade_table VALUES ('0.13-1','Add os_service_project_table');
INSERT INTO os_service_upgrade_table VALUES ('0.13-10','Set project_id to \"0000001\" for all news postings');
INSERT INTO os_service_upgrade_table VALUES ('0.13-11','Added login count to user table');
INSERT INTO os_service_upgrade_table VALUES ('0.13-12','Add manager to access_levels');
INSERT INTO os_service_upgrade_table VALUES ('0.13-13','Make username unique');
INSERT INTO os_service_upgrade_table VALUES ('0.13-2','Insert default project into os_service_project_table');
INSERT INTO os_service_upgrade_table VALUES ('0.13-3','Add os_service_project_category_table');
INSERT INTO os_service_upgrade_table VALUES ('0.13-4','Add os_service_project_version_table');
INSERT INTO os_service_upgrade_table VALUES ('0.13-5','Add project_id column to os_service_bug_table');
INSERT INTO os_service_upgrade_table VALUES ('0.13-6','Change category column in os_service_bug_table to varchar');
INSERT INTO os_service_upgrade_table VALUES ('0.13-7','Change version column in os_service_bug_table to varchar');
INSERT INTO os_service_upgrade_table VALUES ('0.13-8','Set project_id to \"0000001\" for all bugs');
INSERT INTO os_service_upgrade_table VALUES ('0.13-9','Add project_id column news table');
INSERT INTO os_service_upgrade_table VALUES ('0.14-0','Change some of the TIMESTAMP fields to DATETIME');
INSERT INTO os_service_upgrade_table VALUES ('0.14-1','Change some of the TIMESTAMP fields to DATETIME');
INSERT INTO os_service_upgrade_table VALUES ('0.14-10','INT(1) Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-100','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-101','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-102','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-103','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-104','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-105','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-106','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-107','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-108','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-109','Make new project level user access table');
INSERT INTO os_service_upgrade_table VALUES ('0.14-11','INT(1) Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-110','Make new project file table');
INSERT INTO os_service_upgrade_table VALUES ('0.14-111','Make new bug file table');
INSERT INTO os_service_upgrade_table VALUES ('0.14-112','more varchar to enum conversions');
INSERT INTO os_service_upgrade_table VALUES ('0.14-113','more varchar to enum conversions');
INSERT INTO os_service_upgrade_table VALUES ('0.14-114','Need this entry for the project listing to work');
INSERT INTO os_service_upgrade_table VALUES ('0.14-115','Add ordering field for versions');
INSERT INTO os_service_upgrade_table VALUES ('0.14-116','Make the cookie string unique');
INSERT INTO os_service_upgrade_table VALUES ('0.14-12','INT(1) Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-13','INT(1) Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-14','INT(1) Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-15','INT(1) Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-16','Change CHAR(3) to INT(1)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-17','Change CHAR(3) to INT(1)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-18','Change CHAR(3) to INT(1)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-19','Change CHAR(3) to INT(1)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-2','Change some of the TIMESTAMP fields to DATETIME');
INSERT INTO os_service_upgrade_table VALUES ('0.14-20','Change CHAR(3) to INT(1)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-21','Change CHAR(3) to INT(1)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-22','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-23','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-24','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-25','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-26','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-27','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-28','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-29','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-3','Change some of the TIMESTAMP fields to DATETIME');
INSERT INTO os_service_upgrade_table VALUES ('0.14-30','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-31','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-32','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-33','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-34','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-35','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-36','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-37','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-38','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-39','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-4','INT(1) Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-40','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-41','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-42','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-43','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-44','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-45','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-46','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-47','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-48','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-49','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-5','INT(1) Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-50','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-51','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-52','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-53','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-54','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-55','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-56','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-57','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-58','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-59','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-6','INT(1) Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-60','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-61','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-62','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-63','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-64','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-65','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-66','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-67','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-68','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-69','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-7','INT(1) Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-70','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-71','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-72','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-73','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-74','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-75','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-76','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-77','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-78','ENUM Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-79','Change ENUM to INT');
INSERT INTO os_service_upgrade_table VALUES ('0.14-8','INT(1) Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-80','Change ENUM to INT');
INSERT INTO os_service_upgrade_table VALUES ('0.14-81','Change ENUM to INT');
INSERT INTO os_service_upgrade_table VALUES ('0.14-82','Change ENUM to INT');
INSERT INTO os_service_upgrade_table VALUES ('0.14-83','Change ENUM to INT');
INSERT INTO os_service_upgrade_table VALUES ('0.14-84','Change ENUM to INT');
INSERT INTO os_service_upgrade_table VALUES ('0.14-85','Change ENUM to INT');
INSERT INTO os_service_upgrade_table VALUES ('0.14-86','Change ENUM to INT');
INSERT INTO os_service_upgrade_table VALUES ('0.14-87','Update dates to be legal');
INSERT INTO os_service_upgrade_table VALUES ('0.14-88','Update dates to be legal');
INSERT INTO os_service_upgrade_table VALUES ('0.14-89','Update dates to be legal');
INSERT INTO os_service_upgrade_table VALUES ('0.14-9','INT(1) Updates (Before ALTERation)');
INSERT INTO os_service_upgrade_table VALUES ('0.14-90','Shorten cookie string to 64 characters');
INSERT INTO os_service_upgrade_table VALUES ('0.14-91','Add file_path to projects');
INSERT INTO os_service_upgrade_table VALUES ('0.14-92','Add access_min to projects');
INSERT INTO os_service_upgrade_table VALUES ('0.14-93','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-94','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-95','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-96','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-97','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-98','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14-99','Add new user prefs');
INSERT INTO os_service_upgrade_table VALUES ('0.14a-0','');
INSERT INTO os_service_upgrade_table VALUES ('0.14a-1','');
INSERT INTO os_service_upgrade_table VALUES ('0.14a-2','');
INSERT INTO os_service_upgrade_table VALUES ('0.14a-3','');
INSERT INTO os_service_upgrade_table VALUES ('0.14a-4','');
INSERT INTO os_service_upgrade_table VALUES ('0.14a-5','');
INSERT INTO os_service_upgrade_table VALUES ('0.14a-6','');
INSERT INTO os_service_upgrade_table VALUES ('0.14a-7','');
INSERT INTO os_service_upgrade_table VALUES ('0.14a-8','');
INSERT INTO os_service_upgrade_table VALUES ('0.14a-9','');
INSERT INTO os_service_upgrade_table VALUES ('0.15-1','Add file type column to bug file table');
INSERT INTO os_service_upgrade_table VALUES ('0.15-2','Add file type column to project file table');
INSERT INTO os_service_upgrade_table VALUES ('0.15-3','');
INSERT INTO os_service_upgrade_table VALUES ('0.15-4','');
INSERT INTO os_service_upgrade_table VALUES ('0.15-5','');
INSERT INTO os_service_upgrade_table VALUES ('0.15-6','');
INSERT INTO os_service_upgrade_table VALUES ('0.15-7','');
INSERT INTO os_service_upgrade_table VALUES ('0.15-8','Create bug history table');
INSERT INTO os_service_upgrade_table VALUES ('0.15-9','Add order field to project version table');
INSERT INTO os_service_upgrade_table VALUES ('0.16-1','');
INSERT INTO os_service_upgrade_table VALUES ('0.16-10','');
INSERT INTO os_service_upgrade_table VALUES ('0.16-11','');
INSERT INTO os_service_upgrade_table VALUES ('0.16-12','');
INSERT INTO os_service_upgrade_table VALUES ('0.16-13','Add project_id to user pref table');
INSERT INTO os_service_upgrade_table VALUES ('0.16-14','Create bug relationship table');
INSERT INTO os_service_upgrade_table VALUES ('0.16-15','Create bug monitor table');
INSERT INTO os_service_upgrade_table VALUES ('0.16-2','');
INSERT INTO os_service_upgrade_table VALUES ('0.16-3','');
INSERT INTO os_service_upgrade_table VALUES ('0.16-4','');
INSERT INTO os_service_upgrade_table VALUES ('0.16-5','');
INSERT INTO os_service_upgrade_table VALUES ('0.16-6','');
INSERT INTO os_service_upgrade_table VALUES ('0.16-7','Add view_state to bug table');
INSERT INTO os_service_upgrade_table VALUES ('0.16-8','Add view_state to bugnote table');
INSERT INTO os_service_upgrade_table VALUES ('0.16-9','');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-1','Set default for os_service_bug_file_table.date_added (incorrect for 0.15 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-10','Set default for os_service_news_table.date_posted (incorrect for < 0.17 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-11','Correct values for os_service_news_table.date_posted (incorrect for < 0.17 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-12','Set default for os_service_bug_table.date_submitted (incorrect for < 0.17 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-13','Correct values for os_service_bug_table.date_submitted (incorrect for < 0.17 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-14','Set default for os_service_bugnote_table.date_submitted (incorrect for < 0.17 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-15','Correct values for os_service_bugnote_table.date_submitted (incorrect for < 0.17 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-16','Add unique index to cookie_string if it is not already there (incorrect for > 0.14)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-17','Remove os_service_project_version_table.ver_order (incorrect for < 0.15)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-18','Remove users from project 0');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-2','Correct values for os_service_bug_file_table.date_added (incorrect for 0.15 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-3','Set default for os_service_project_file_table.date_added (incorrect for 0.15 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-4','Correct values for os_service_project_file_table.date_added (incorrect for 0.15 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-5','Set default for os_service_bug_table.build (incorrect for 0.16 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-6','Correct values for os_service_bug_table.build (incorrect for 0.16 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-7','Set default for os_service_user_table.date_created (incorrect for < 0.17 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-8','Correct values for os_service_user_table.date_created (incorrect for < 0.17 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-compat-9','Set default for os_service_project_table.enabled to 1 (incorrect for < 0.17 installs)');
INSERT INTO os_service_upgrade_table VALUES ('0.17-custom-field-1','Add os_service_custom_field_table');
INSERT INTO os_service_upgrade_table VALUES ('0.17-custom-field-2','Add os_service_custom_field_string_table');
INSERT INTO os_service_upgrade_table VALUES ('0.17-custom-field-3','Add os_service_custom_field_project_table');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-1','Printing Preference Table');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-10','Add primary key on os_service_project_user_list_table');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-11','Add primary key on os_service_project_category_table');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-12','Add primary key on os_service_bug_monitor_table');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-13','Remove zerofill on os_service_bug_file_table.id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-14','Remove zerofill on os_service_bug_file_table.bug_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-15','Remove zerofill on os_service_bug_history_table.user_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-16','Remove zerofill on os_service_bug_history_table.bug_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-17','Remove zerofill on os_service_bug_monitor_table.user_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-18','Remove zerofill on os_service_bug_relationship_table.id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-19','Remove zerofill on os_service_bug_relationship_table.source_bug_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-2','Bug history');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-20','Remove zerofill on os_service_bug_relationship_table.destination_bug_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-21','Remove zerofill on os_service_bug_table.id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-22','Remove zerofill on os_service_bug_table.project_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-23','Remove zerofill on os_service_bug_table.reporter_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-24','Remove zerofill on os_service_bug_table.handler_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-25','Remove zerofill on os_service_bug_table.duplicate_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-26','Remove zerofill on os_service_bug_table.bug_text_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-27','Remove zerofill on os_service_bug_table.profile_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-28','Remove zerofill on os_service_bug_text_table.id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-29','Remove zerofill on os_service_bugnote_table.id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-3','Auto-assigning of bugs for a default user per category');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-30','Remove zerofill on os_service_bugnote_table.bug_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-31','Remove zerofill on os_service_bugnote_table.reporter_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-32','Remove zerofill on os_service_bugnote_table.bugnote_text_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-33','Remove zerofill on os_service_bugnote_text_table.id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-34','Remove zerofill on os_service_news_table.id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-35','Remove zerofill on os_service_news_table.project_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-36','Remove zerofill on os_service_news_table.poster_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-37','Remove zerofill on os_service_project_category_table.project_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-38','Remove zerofill on os_service_project_file_table.id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-39','Remove zerofill on os_service_project_file_table.project_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-4','Private news support');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-40','Remove zerofill on os_service_project_table.id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-41','Remove zerofill on os_service_project_user_list_table.project_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-42','Remove zerofill on os_service_project_user_list_table.user_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-43','Remove zerofill on os_service_project_version_table.project_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-44','Remove zerofill on os_service_user_pref_table.id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-45','Remove zerofill on os_service_user_pref_table.user_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-46','Remove zerofill on os_service_user_pref_table.project_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-47','Remove zerofill on os_service_user_pref_table.default_profile');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-48','Remove zerofill on os_service_user_pref_table.default_project');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-49','Remove zerofill on os_service_user_print_pref_table.user_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-5','Allow news items to stay at the top');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-50','Remove zerofill on os_service_user_profile_table.id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-51','Remove zerofill on os_service_user_profile_table.user_id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-52','Remove zerofill on os_service_user_table.id');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-6','relationship support');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-7','Drop os_service_project_customization_table');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-8','Drop votes column of os_service_bug_table');
INSERT INTO os_service_upgrade_table VALUES ('0.17-jf-9','Add primary key on os_service_project_version_table');
INSERT INTO os_service_upgrade_table VALUES ('0.17-vb-19','Add id field to bug history table');
INSERT INTO os_service_upgrade_table VALUES ('0.18-bugnote-limit','Add email_bugnote_limit to user preference table');
INSERT INTO os_service_upgrade_table VALUES ('0.18-bugnote-order','Add bugnote_order to user preference table');
INSERT INTO os_service_upgrade_table VALUES ('0.18-vb-1','Add index on bug_id field in os_service_bug_file_table.');
INSERT INTO os_service_upgrade_table VALUES ('bugnote-attr','Add note_attr column to bugnote');
INSERT INTO os_service_upgrade_table VALUES ('bugnote-type','Add note type column to bugnote');
INSERT INTO os_service_upgrade_table VALUES ('bug_project_index','Add index on project_id in bug table');
INSERT INTO os_service_upgrade_table VALUES ('bug_status_index','Add index on status in bug table');
INSERT INTO os_service_upgrade_table VALUES ('cat_user_id_unsigned','Change the user_id in os_service_project_category_table to unsigned int.');
INSERT INTO os_service_upgrade_table VALUES ('cb_ml_upgrade','Upgrade custom field types (checkbox, list, multilist) to support advanced filtering');
INSERT INTO os_service_upgrade_table VALUES ('cf_string_bug_index','Add index on bug_id in custom_field_string table');
INSERT INTO os_service_upgrade_table VALUES ('config-key1','make os_service_config_table keys not null');
INSERT INTO os_service_upgrade_table VALUES ('config-key2','make os_service_config_table keys not null');
INSERT INTO os_service_upgrade_table VALUES ('configdb-1','Add os_service_config_table');
INSERT INTO os_service_upgrade_table VALUES ('configdb-pk','Add os_service_config_table primary key');
INSERT INTO os_service_upgrade_table VALUES ('configdb-un','Drop os_service_config_table unique key');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-1','Allow custom fields to be set/required for resolve/close/report/update');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-10','Rename Column');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-11','Rename Column');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-12','Rename Column');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-13','Rename Column');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-14','Rename Column');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-15','Rename Column');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-16','Rename Column');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-17','Rename Column');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-18','Rename Column');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-19','Rename Column');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-2','Allow custom fields to be set/required for resolve/close/report/update');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-20','Rename Column');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-3','Allow custom fields to be set/required for resolve/close/report/update');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-4','Allow custom fields to be set/required for resolve/close/report/update');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-5','Allow custom fields to be set/required for resolve/close/report/update');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-6','Allow custom fields to be set/required for resolve/close/report/update');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-7','Allow custom fields to be hidden/displayed for report/update');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-8','Allow custom fields to be hidden/displayed for report/update');
INSERT INTO os_service_upgrade_table VALUES ('custom_fields-9','Rename Column');
INSERT INTO os_service_upgrade_table VALUES ('delete-admin-over','Delete any project level access overrides for admin users');
INSERT INTO os_service_upgrade_table VALUES ('emailsevs-1','Add the necessary columns for email severity filtering');
INSERT INTO os_service_upgrade_table VALUES ('escaping-fix-1','Fix double escaped data in os_service_bug_file_table');
INSERT INTO os_service_upgrade_table VALUES ('escaping-fix-10','Remove history entries where type=0 and the old value = new value.  These existed because of escaping errors');
INSERT INTO os_service_upgrade_table VALUES ('escaping-fix-2','Fix double escaped data in os_service_bug_table');
INSERT INTO os_service_upgrade_table VALUES ('escaping-fix-3','Fix double escaped data in os_service_bug_text_table');
INSERT INTO os_service_upgrade_table VALUES ('escaping-fix-4','Fix double escaped data in os_service_bugnote_text_table');
INSERT INTO os_service_upgrade_table VALUES ('escaping-fix-5','Fix double escaped data in os_service_news_table');
INSERT INTO os_service_upgrade_table VALUES ('escaping-fix-6','Fix double escaped data in os_service_project_file_table');
INSERT INTO os_service_upgrade_table VALUES ('escaping-fix-7','Fix double escaped data in os_service_project_table');
INSERT INTO os_service_upgrade_table VALUES ('escaping-fix-8','Fix double escaped data in os_service_user_profile_table');
INSERT INTO os_service_upgrade_table VALUES ('escaping-fix-9','Fix double escaped data in os_service_bug_history_table');
INSERT INTO os_service_upgrade_table VALUES ('field_naming-1','DBMS compatibility: access is a reserved word');
INSERT INTO os_service_upgrade_table VALUES ('field_shorten-1','shorten field names: lost_password_in_progress_count');
INSERT INTO os_service_upgrade_table VALUES ('filtersdb-1','Add os_service_filters_table');
INSERT INTO os_service_upgrade_table VALUES ('fixed_in_version-1','Add fixed_in_version field to bug table.');
INSERT INTO os_service_upgrade_table VALUES ('fixed_in_version-2','Add index on fixed_in_version field in bug table.');
INSERT INTO os_service_upgrade_table VALUES ('lost-password','Add the necessary columns for managing lost passwords');
INSERT INTO os_service_upgrade_table VALUES ('note_bug_id_index','Add index on bug_id in bugnotes table');
INSERT INTO os_service_upgrade_table VALUES ('note_updated_index','Add index on last_modified in bugnotes table');
INSERT INTO os_service_upgrade_table VALUES ('pref_assigned_min','change pref email_on_assigned_minimum_severity for database compabilility');
INSERT INTO os_service_upgrade_table VALUES ('pref_bugnote_min','change pref email_on_bugnote_minimum_severity for database compabilility');
INSERT INTO os_service_upgrade_table VALUES ('pref_closed_min','change pref email_on_closed_minimum_severity for database compabilility');
INSERT INTO os_service_upgrade_table VALUES ('pref_feedback_min','change pref email_on_feedback_minimum_severity for database compabilility');
INSERT INTO os_service_upgrade_table VALUES ('pref_new_min','change pref email_on_new_minimum_severity for database compabilility');
INSERT INTO os_service_upgrade_table VALUES ('pref_priority_min','change pref email_on_priority_minimum_severity for database compabilility');
INSERT INTO os_service_upgrade_table VALUES ('pref_reopened_min','change pref email_on_reopened_minimum_severity for database compabilility');
INSERT INTO os_service_upgrade_table VALUES ('pref_resolved_min','change pref email_on_resolved_minimum_severity for database compabilility');
INSERT INTO os_service_upgrade_table VALUES ('pref_status_min','change pref email_on_minimum_severity for database compabilility');
INSERT INTO os_service_upgrade_table VALUES ('project-hierarchy','Add project hierarchy table');
INSERT INTO os_service_upgrade_table VALUES ('project_child_index','Add index on child_id in project heirarchy table');
INSERT INTO os_service_upgrade_table VALUES ('project_uid_index','Add index on user_id in project_user table');
INSERT INTO os_service_upgrade_table VALUES ('project_vs_index','Add index on view_state in project table');
INSERT INTO os_service_upgrade_table VALUES ('relationship-1','Add index on source_bug_id field in os_service_bug_relationship_table');
INSERT INTO os_service_upgrade_table VALUES ('relationship-2','Add index on destination_bug_id field in os_service_bug_relationship_table');
INSERT INTO os_service_upgrade_table VALUES ('relationship-3','Translate duplicate id information in a new duplicate relationship');
INSERT INTO os_service_upgrade_table VALUES ('relationship-4','Fix swapped value in duplicate relationship');
INSERT INTO os_service_upgrade_table VALUES ('release_51','Mark release for database version 51');
INSERT INTO os_service_upgrade_table VALUES ('sponsorship-1','Add sponsorships table');
INSERT INTO os_service_upgrade_table VALUES ('sponsorship-2','Add sponsorship_total to bug table');
INSERT INTO os_service_upgrade_table VALUES ('sponsorship-3','Add an index on sponsorship_total in bug table');
INSERT INTO os_service_upgrade_table VALUES ('sticky-issues','Add sticky column to bug table');
INSERT INTO os_service_upgrade_table VALUES ('tokensdb-1','Add os_service_tokens_table');
INSERT INTO os_service_upgrade_table VALUES ('user_access_index','Add index on access_level in user table');
INSERT INTO os_service_upgrade_table VALUES ('user_enabled_index','Add index on enabled in user table');
INSERT INTO os_service_upgrade_table VALUES ('user_realname','Add real name to user information.');
INSERT INTO os_service_upgrade_table VALUES ('version_add_descript','Add description field to versions.');
INSERT INTO os_service_upgrade_table VALUES ('version_add_project_','Add a unique index for project_id + version combination.');
INSERT INTO os_service_upgrade_table VALUES ('version_add_released','Add released flag to determine whether the version was released or still a future release.');
INSERT INTO os_service_upgrade_table VALUES ('version_add_version_','Add id to version table and use it as primary key');
INSERT INTO os_service_upgrade_table VALUES ('version_remove_pk','Remove project_id+version primary key');

--
-- Table structure for table `os_service_user_pref_table`
--

DROP TABLE IF EXISTS os_service_user_pref_table;
CREATE TABLE os_service_user_pref_table (
  id int(7) unsigned NOT NULL auto_increment,
  user_id int(7) unsigned NOT NULL default '0',
  project_id int(7) unsigned NOT NULL default '0',
  default_profile int(7) unsigned NOT NULL default '0',
  default_project int(7) unsigned NOT NULL default '0',
  advanced_report int(1) NOT NULL default '0',
  advanced_view int(1) NOT NULL default '0',
  advanced_update int(1) NOT NULL default '0',
  refresh_delay int(4) NOT NULL default '0',
  redirect_delay int(1) NOT NULL default '0',
  bugnote_order varchar(4) NOT NULL default 'ASC',
  email_on_new int(1) NOT NULL default '0',
  email_on_assigned int(1) NOT NULL default '0',
  email_on_feedback int(1) NOT NULL default '0',
  email_on_resolved int(1) NOT NULL default '0',
  email_on_closed int(1) NOT NULL default '0',
  email_on_reopened int(1) NOT NULL default '0',
  email_on_bugnote int(1) NOT NULL default '0',
  email_on_status int(1) NOT NULL default '0',
  email_on_priority int(1) NOT NULL default '0',
  email_on_priority_min_severity int(2) NOT NULL default '10',
  email_on_status_min_severity int(2) NOT NULL default '10',
  email_on_bugnote_min_severity int(2) NOT NULL default '10',
  email_on_reopened_min_severity int(2) NOT NULL default '10',
  email_on_closed_min_severity int(2) NOT NULL default '10',
  email_on_resolved_min_severity int(2) NOT NULL default '10',
  email_on_feedback_min_severity int(2) NOT NULL default '10',
  email_on_assigned_min_severity int(2) NOT NULL default '10',
  email_on_new_min_severity int(2) NOT NULL default '10',
  email_bugnote_limit int(2) NOT NULL default '0',
  language varchar(32) NOT NULL default 'english',
  PRIMARY KEY  (id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_user_pref_table`
--

INSERT INTO os_service_user_pref_table VALUES (1,2,0,0,0,0,0,0,30,2,'ASC',1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,'english');
INSERT INTO os_service_user_pref_table VALUES (2,3,0,0,0,0,0,0,30,2,'ASC',1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,'english');

--
-- Table structure for table `os_service_user_print_pref_table`
--

DROP TABLE IF EXISTS os_service_user_print_pref_table;
CREATE TABLE os_service_user_print_pref_table (
  user_id int(7) unsigned NOT NULL default '0',
  print_pref varchar(27) NOT NULL default '',
  PRIMARY KEY  (user_id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_user_print_pref_table`
--


--
-- Table structure for table `os_service_user_profile_table`
--

DROP TABLE IF EXISTS os_service_user_profile_table;
CREATE TABLE os_service_user_profile_table (
  id int(7) unsigned NOT NULL auto_increment,
  user_id int(7) unsigned NOT NULL default '0',
  platform varchar(32) NOT NULL default '',
  os varchar(32) NOT NULL default '',
  os_build varchar(32) NOT NULL default '',
  description text NOT NULL,
  PRIMARY KEY  (id)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_user_profile_table`
--


--
-- Table structure for table `os_service_user_table`
--

DROP TABLE IF EXISTS os_service_user_table;
CREATE TABLE os_service_user_table (
  id int(7) unsigned NOT NULL auto_increment,
  username varchar(32) NOT NULL default '',
  realname varchar(64) NOT NULL default '',
  email varchar(64) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  date_created datetime NOT NULL default '1970-01-01 00:00:01',
  last_visit datetime NOT NULL default '1970-01-01 00:00:01',
  enabled int(1) NOT NULL default '1',
  protected int(1) NOT NULL default '0',
  access_level int(2) NOT NULL default '10',
  login_count int(11) NOT NULL default '0',
  lost_password_request_count int(2) NOT NULL default '0',
  failed_login_count int(2) NOT NULL default '0',
  cookie_string varchar(64) NOT NULL default '',
  PRIMARY KEY  (id),
  UNIQUE KEY cookie_string (cookie_string),
  UNIQUE KEY username (username),
  KEY enabled (enabled),
  KEY access_level (access_level),
  KEY username_2 (username),
  KEY date_created (date_created),
  KEY last_visit (last_visit),
  KEY enabled_2 (enabled),
  KEY access_level_2 (access_level),
  KEY username_3 (username),
  KEY date_created_2 (date_created),
  KEY last_visit_2 (last_visit),
  KEY enabled_3 (enabled),
  KEY access_level_3 (access_level),
  KEY username_4 (username),
  KEY date_created_3 (date_created),
  KEY last_visit_3 (last_visit),
  KEY enabled_4 (enabled),
  KEY access_level_4 (access_level)
) TYPE=InnoDB;

--
-- Dumping data for table `os_service_user_table`
--

INSERT INTO os_service_user_table VALUES (1,'administrator','','root@localhost','63a9f0ea7bb98050796b649e85481845','2003-02-16 02:03:48','2004-07-08 23:59:22',1,1,90,3,0,0,'b0bbdeb5a394e2a96b9587a6aecb37690a41f23b3f51e3bd3a0881d254c5b803');
INSERT INTO os_service_user_table VALUES (2,'Admin','Admin','RNG@value4business.com','87aa873a3ba6787b50b71e025db605dc','2005-07-12 23:05:30','2006-08-14 16:37:38',1,0,90,35,0,0,'58913138b59b851444917447b5030635b19ff7a10056fcd3b466d14690a66128');
INSERT INTO os_service_user_table VALUES (3,'Test','Test','test@test.com','81287fefd604c71c08e6b5a329daa913','2005-07-12 23:27:58','2005-07-12 23:27:59',1,0,55,1,0,0,'fcca555ed840359d97293d620917338af5f1f9469af372636aca3db8ab1353a4');

--
-- Table structure for table `pn_autonews`
--

DROP TABLE IF EXISTS pn_autonews;
CREATE TABLE pn_autonews (
  pn_anid int(11) NOT NULL auto_increment,
  pn_catid int(11) NOT NULL default '0',
  pn_aid varchar(30) NOT NULL default '',
  pn_title varchar(80) NOT NULL default '',
  pn_time varchar(19) NOT NULL default '',
  pn_hometext text NOT NULL,
  pn_bodytext text NOT NULL,
  pn_topic tinyint(4) NOT NULL default '1',
  pn_informant varchar(20) NOT NULL default '',
  pn_notes text NOT NULL,
  pn_ihome tinyint(1) NOT NULL default '0',
  pn_language varchar(30) NOT NULL default '',
  pn_withcomm int(1) NOT NULL default '0',
  PRIMARY KEY  (pn_anid)
) TYPE=InnoDB;

--
-- Dumping data for table `pn_autonews`
--



