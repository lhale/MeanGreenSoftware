-- MySQL dump 10.9
--
-- Host: localhost    Database: os760
-- ------------------------------------------------------
-- Server version	4.1.11-Max
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,MYSQL40' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `os_core_RSS`
--

CREATE TABLE os_core_RSS (
  pn_fid int(10) NOT NULL auto_increment,
  pn_name varchar(32) NOT NULL default '',
  pn_url varchar(255) NOT NULL default '',
  PRIMARY KEY  (pn_fid)
);

--
-- Dumping data for table `os_core_RSS`
--


--
-- Table structure for table `os_core_admin_category`
--

CREATE TABLE os_core_admin_category (
  pn_cid int(10) NOT NULL auto_increment,
  pn_name varchar(32) NOT NULL default '',
  pn_description varchar(254) NOT NULL default '',
  PRIMARY KEY  (pn_cid)
);

--
-- Dumping data for table `os_core_admin_category`
--

INSERT INTO os_core_admin_category VALUES (1,'System','System Modules');
INSERT INTO os_core_admin_category VALUES (2,'Community','Modules useful for Online Communities');
INSERT INTO os_core_admin_category VALUES (3,'Resource Pack','Resource Pack Modules');
INSERT INTO os_core_admin_category VALUES (4,'Utility','Utility Modules');
INSERT INTO os_core_admin_category VALUES (5,'3rd Party','Third Party Modules');
INSERT INTO os_core_admin_category VALUES (6,'Media/Publishing','');
INSERT INTO os_core_admin_category VALUES (7,'Office','');

--
-- Table structure for table `os_core_admin_module`
--

CREATE TABLE os_core_admin_module (
  pn_mid int(10) NOT NULL default '0',
  pn_cid int(10) NOT NULL default '0'
);

--
-- Dumping data for table `os_core_admin_module`
--

INSERT INTO os_core_admin_module VALUES (14,2);
INSERT INTO os_core_admin_module VALUES (1,1);
INSERT INTO os_core_admin_module VALUES (35,1);
INSERT INTO os_core_admin_module VALUES (32,4);
INSERT INTO os_core_admin_module VALUES (48,3);
INSERT INTO os_core_admin_module VALUES (52,6);
INSERT INTO os_core_admin_module VALUES (2,1);
INSERT INTO os_core_admin_module VALUES (49,4);
INSERT INTO os_core_admin_module VALUES (55,6);
INSERT INTO os_core_admin_module VALUES (56,2);
INSERT INTO os_core_admin_module VALUES (47,2);
INSERT INTO os_core_admin_module VALUES (50,2);
INSERT INTO os_core_admin_module VALUES (57,7);
INSERT INTO os_core_admin_module VALUES (9,2);
INSERT INTO os_core_admin_module VALUES (58,7);
INSERT INTO os_core_admin_module VALUES (60,3);
INSERT INTO os_core_admin_module VALUES (51,2);
INSERT INTO os_core_admin_module VALUES (61,3);
INSERT INTO os_core_admin_module VALUES (3,1);
INSERT INTO os_core_admin_module VALUES (46,1);
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
INSERT INTO os_core_admin_module VALUES (72,4);
INSERT INTO os_core_admin_module VALUES (27,1);
INSERT INTO os_core_admin_module VALUES (74,2);
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
INSERT INTO os_core_admin_module VALUES (38,2);
INSERT INTO os_core_admin_module VALUES (18,2);
INSERT INTO os_core_admin_module VALUES (17,3);
INSERT INTO os_core_admin_module VALUES (7,1);
INSERT INTO os_core_admin_module VALUES (84,7);
INSERT INTO os_core_admin_module VALUES (85,4);
INSERT INTO os_core_admin_module VALUES (86,4);
INSERT INTO os_core_admin_module VALUES (89,7);
INSERT INTO os_core_admin_module VALUES (91,6);
INSERT INTO os_core_admin_module VALUES (92,7);
INSERT INTO os_core_admin_module VALUES (93,7);
INSERT INTO os_core_admin_module VALUES (28,2);
INSERT INTO os_core_admin_module VALUES (39,1);
INSERT INTO os_core_admin_module VALUES (94,3);

--
-- Table structure for table `os_core_autolinks`
--

CREATE TABLE os_core_autolinks (
  pn_lid int(11) NOT NULL auto_increment,
  pn_keyword varchar(100) NOT NULL default '',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(200) NOT NULL default '',
  pn_comment varchar(200) NOT NULL default '',
  PRIMARY KEY  (pn_lid),
  KEY os_core_autolinks_index (pn_keyword)
);

--
-- Dumping data for table `os_core_autolinks`
--


--
-- Table structure for table `os_core_autonews`
--

CREATE TABLE os_core_autonews (
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
);

--
-- Dumping data for table `os_core_autonews`
--


--
-- Table structure for table `os_core_banner`
--

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
);

--
-- Dumping data for table `os_core_banner`
--


--
-- Table structure for table `os_core_bannerclient`
--

CREATE TABLE os_core_bannerclient (
  pn_cid int(11) NOT NULL auto_increment,
  pn_name varchar(60) NOT NULL default '',
  pn_contact varchar(60) NOT NULL default '',
  pn_email varchar(60) NOT NULL default '',
  pn_login varchar(10) NOT NULL default '',
  pn_passwd varchar(10) NOT NULL default '',
  pn_extrainfo text NOT NULL,
  PRIMARY KEY  (pn_cid)
);

--
-- Dumping data for table `os_core_bannerclient`
--


--
-- Table structure for table `os_core_bannerfinish`
--

CREATE TABLE os_core_bannerfinish (
  pn_bid int(11) NOT NULL auto_increment,
  pn_cid int(11) NOT NULL default '0',
  pn_impressions int(11) NOT NULL default '0',
  pn_clicks int(11) NOT NULL default '0',
  pn_datestart datetime default NULL,
  pn_dateend datetime default NULL,
  PRIMARY KEY  (pn_bid)
);

--
-- Dumping data for table `os_core_bannerfinish`
--


--
-- Table structure for table `os_core_blocks`
--

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
);

--
-- Dumping data for table `os_core_blocks`
--

INSERT INTO os_core_blocks VALUES (1,'menu','Main Menu','style:=1\ndisplaymodules:=0\ndisplaywaiting:=0\ncontent:=index.php|Home|Back to the home page..LINESPLITuser.php|My Account|Administer your personal account..LINESPLITadmin.php|Administration|Administer your PostNuked site..LINESPLITuser.php?module=User&op=logout|Logout|Logout of your account..LINESPLIT||LINESPLIT[Downloads]|Downloads|Find downloads listed on this website..LINESPLIT[FAQ]|FAQ|Frequently Asked Questions.LINESPLIT[News]|News|Latest News on this site..LINESPLIT[Reviews]|Reviews|Reviews Section on this website..LINESPLIT[Search]|Search|Search our website..LINESPLIT[Sections]|Sections|Other content on this website..LINESPLIT[Submit_News]|Submit News|Submit an article..LINESPLIT[Topics]|Topics|Listing of news topics on this website..LINESPLIT[Web_Links]|Web Links|Links to other sites..','',0,'l','1.0',1,0,'2001-11-22 09:07:26','',1,1);
INSERT INTO os_core_blocks VALUES (2,'menu','Incoming','style:=1\ndisplaymodules:=0\ndisplaywaiting:=1\ncontent:=','',0,'l','2.0',1,0,'0000-00-00 00:00:00','',1,1);
INSERT INTO os_core_blocks VALUES (3,'online','Online','','',0,'l','3.0',1,0,'0000-00-00 00:00:00','',1,1);
INSERT INTO os_core_blocks VALUES (5,'user','Users Block','Put anything you want here','',0,'l','3.5',1,0,'0000-00-00 00:00:00','',1,1);
INSERT INTO os_core_blocks VALUES (6,'search','Search Box','','',0,'l','4.0',0,0,'0000-00-00 00:00:00','',1,1);
INSERT INTO os_core_blocks VALUES (8,'thelang','Languages','','',0,'l','6.0',1,0,'0000-00-00 00:00:00','',1,1);
INSERT INTO os_core_blocks VALUES (13,'login','Login','','',0,'r','5.0',1,0,'0000-00-00 00:00:00','',1,1);
INSERT INTO os_core_blocks VALUES (15,'messages','Administration Messages','','',35,'c','1.0',1,0,'0000-00-00 00:00:00','',1,1);

--
-- Table structure for table `os_core_blocks_buttons`
--

CREATE TABLE os_core_blocks_buttons (
  pn_id int(11) unsigned NOT NULL auto_increment,
  pn_bid int(11) unsigned NOT NULL default '0',
  pn_title varchar(255) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_images longtext NOT NULL,
  PRIMARY KEY  (pn_id)
);

--
-- Dumping data for table `os_core_blocks_buttons`
--


--
-- Table structure for table `os_core_cmodsdownload_categories`
--

CREATE TABLE os_core_cmodsdownload_categories (
  pn_cid int(11) NOT NULL auto_increment,
  pn_title varchar(50) NOT NULL default '',
  pn_description text NOT NULL,
  PRIMARY KEY  (pn_cid)
);

--
-- Dumping data for table `os_core_cmodsdownload_categories`
--


--
-- Table structure for table `os_core_cmodsdownload_downloads`
--

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
);

--
-- Dumping data for table `os_core_cmodsdownload_downloads`
--


--
-- Table structure for table `os_core_cmodsdownload_editorials`
--

CREATE TABLE os_core_cmodsdownload_editorials (
  pn_id int(11) NOT NULL default '0',
  pn_adminid varchar(60) NOT NULL default '',
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_text text NOT NULL,
  pn_title varchar(100) NOT NULL default '',
  PRIMARY KEY  (pn_id)
);

--
-- Dumping data for table `os_core_cmodsdownload_editorials`
--


--
-- Table structure for table `os_core_cmodsdownload_modrequest`
--

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
);

--
-- Dumping data for table `os_core_cmodsdownload_modrequest`
--


--
-- Table structure for table `os_core_cmodsdownload_newdownload`
--

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
);

--
-- Dumping data for table `os_core_cmodsdownload_newdownload`
--


--
-- Table structure for table `os_core_cmodsdownload_subcategories`
--

CREATE TABLE os_core_cmodsdownload_subcategories (
  pn_sid int(11) NOT NULL auto_increment,
  pn_cid int(11) NOT NULL default '0',
  pn_title varchar(50) NOT NULL default '',
  PRIMARY KEY  (pn_sid)
);

--
-- Dumping data for table `os_core_cmodsdownload_subcategories`
--


--
-- Table structure for table `os_core_cmodsdownload_votedata`
--

CREATE TABLE os_core_cmodsdownload_votedata (
  pn_id int(11) NOT NULL auto_increment,
  pn_lid int(11) NOT NULL default '0',
  pn_user varchar(60) NOT NULL default '',
  pn_rating int(11) NOT NULL default '0',
  pn_hostname varchar(60) NOT NULL default '',
  pn_comments text NOT NULL,
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (pn_id)
);

--
-- Dumping data for table `os_core_cmodsdownload_votedata`
--


--
-- Table structure for table `os_core_cmodsweblinks_categories`
--

CREATE TABLE os_core_cmodsweblinks_categories (
  pn_cat_id int(11) NOT NULL auto_increment,
  pn_parent_id int(11) default NULL,
  pn_title varchar(50) NOT NULL default '',
  pn_description text NOT NULL,
  PRIMARY KEY  (pn_cat_id)
);

--
-- Dumping data for table `os_core_cmodsweblinks_categories`
--


--
-- Table structure for table `os_core_cmodsweblinks_editorials`
--

CREATE TABLE os_core_cmodsweblinks_editorials (
  pn_linkid int(11) NOT NULL default '0',
  pn_adminid varchar(60) NOT NULL default '',
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_text text NOT NULL,
  pn_title varchar(100) NOT NULL default '',
  PRIMARY KEY  (pn_linkid)
);

--
-- Dumping data for table `os_core_cmodsweblinks_editorials`
--


--
-- Table structure for table `os_core_cmodsweblinks_links`
--

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
);

--
-- Dumping data for table `os_core_cmodsweblinks_links`
--


--
-- Table structure for table `os_core_cmodsweblinks_modrequest`
--

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
);

--
-- Dumping data for table `os_core_cmodsweblinks_modrequest`
--


--
-- Table structure for table `os_core_cmodsweblinks_newlink`
--

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
);

--
-- Dumping data for table `os_core_cmodsweblinks_newlink`
--


--
-- Table structure for table `os_core_cmodsweblinks_votedata`
--

CREATE TABLE os_core_cmodsweblinks_votedata (
  pn_id int(11) NOT NULL auto_increment,
  pn_lid int(11) NOT NULL default '0',
  pn_user varchar(60) NOT NULL default '',
  pn_rating int(11) NOT NULL default '0',
  pn_hostname varchar(60) NOT NULL default '',
  pn_comments text NOT NULL,
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (pn_id)
);

--
-- Dumping data for table `os_core_cmodsweblinks_votedata`
--


--
-- Table structure for table `os_core_comments`
--

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
  PRIMARY KEY  (pn_tid)
);

--
-- Dumping data for table `os_core_comments`
--


--
-- Table structure for table `os_core_downloads_categories`
--

CREATE TABLE os_core_downloads_categories (
  pn_cid int(11) NOT NULL auto_increment,
  pn_title varchar(50) NOT NULL default '',
  pn_description text NOT NULL,
  PRIMARY KEY  (pn_cid)
);

--
-- Dumping data for table `os_core_downloads_categories`
--


--
-- Table structure for table `os_core_downloads_downloads`
--

CREATE TABLE os_core_downloads_downloads (
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
);

--
-- Dumping data for table `os_core_downloads_downloads`
--


--
-- Table structure for table `os_core_downloads_editorials`
--

CREATE TABLE os_core_downloads_editorials (
  pn_id int(11) NOT NULL default '0',
  pn_adminid varchar(60) NOT NULL default '',
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_text text NOT NULL,
  pn_title varchar(100) NOT NULL default '',
  PRIMARY KEY  (pn_id)
);

--
-- Dumping data for table `os_core_downloads_editorials`
--


--
-- Table structure for table `os_core_downloads_modrequest`
--

CREATE TABLE os_core_downloads_modrequest (
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
);

--
-- Dumping data for table `os_core_downloads_modrequest`
--


--
-- Table structure for table `os_core_downloads_newdownload`
--

CREATE TABLE os_core_downloads_newdownload (
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
);

--
-- Dumping data for table `os_core_downloads_newdownload`
--


--
-- Table structure for table `os_core_downloads_subcategories`
--

CREATE TABLE os_core_downloads_subcategories (
  pn_sid int(11) NOT NULL auto_increment,
  pn_cid int(11) NOT NULL default '0',
  pn_title varchar(50) NOT NULL default '',
  PRIMARY KEY  (pn_sid)
);

--
-- Dumping data for table `os_core_downloads_subcategories`
--


--
-- Table structure for table `os_core_downloads_votedata`
--

CREATE TABLE os_core_downloads_votedata (
  pn_id int(11) NOT NULL auto_increment,
  pn_lid int(11) NOT NULL default '0',
  pn_user varchar(60) NOT NULL default '',
  pn_rating int(11) NOT NULL default '0',
  pn_hostname varchar(60) NOT NULL default '',
  pn_comments text NOT NULL,
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (pn_id)
);

--
-- Dumping data for table `os_core_downloads_votedata`
--


--
-- Table structure for table `os_core_dqhelpdesk_extusers`
--

CREATE TABLE os_core_dqhelpdesk_extusers (
  firstname varchar(255) default '',
  lastname varchar(255) default '',
  email varchar(255) NOT NULL default '',
  phone varchar(30) default '',
  PRIMARY KEY  (email)
);

--
-- Dumping data for table `os_core_dqhelpdesk_extusers`
--

INSERT INTO os_core_dqhelpdesk_extusers VALUES ('1','Dimensionquest','www.dimensionquest.net','-= Thank you for installing my');

--
-- Table structure for table `os_core_dqhelpdesk_histories`
--

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
);

--
-- Dumping data for table `os_core_dqhelpdesk_histories`
--


--
-- Table structure for table `os_core_dqhelpdesk_manufacturers`
--

CREATE TABLE os_core_dqhelpdesk_manufacturers (
  manufacturer_id int(10) NOT NULL default '0',
  manufacturer varchar(255) NOT NULL default '',
  website varchar(255) default '',
  notes text,
  PRIMARY KEY  (manufacturer_id)
);

--
-- Dumping data for table `os_core_dqhelpdesk_manufacturers`
--


--
-- Table structure for table `os_core_dqhelpdesk_priorities`
--

CREATE TABLE os_core_dqhelpdesk_priorities (
  priority_id int(10) NOT NULL default '0',
  priority varchar(255) NOT NULL default '',
  priority_color varchar(8) NOT NULL default '####',
  PRIMARY KEY  (priority_id)
);

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

CREATE TABLE os_core_dqhelpdesk_software (
  software_id int(10) NOT NULL default '0',
  manufacturer_id int(10) default '0',
  swtype_id int(10) default '1',
  software_name varchar(255) NOT NULL default '',
  PRIMARY KEY  (software_id)
);

--
-- Dumping data for table `os_core_dqhelpdesk_software`
--

INSERT INTO os_core_dqhelpdesk_software VALUES (1,1,1,'DQ Help Desk');

--
-- Table structure for table `os_core_dqhelpdesk_sources`
--

CREATE TABLE os_core_dqhelpdesk_sources (
  source_id int(10) NOT NULL default '0',
  source varchar(255) NOT NULL default '',
  PRIMARY KEY  (source_id)
);

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

CREATE TABLE os_core_dqhelpdesk_status (
  status_id int(10) NOT NULL default '0',
  `status` varchar(255) NOT NULL default '',
  PRIMARY KEY  (status_id)
);

--
-- Dumping data for table `os_core_dqhelpdesk_status`
--

INSERT INTO os_core_dqhelpdesk_status VALUES (1,'Open');
INSERT INTO os_core_dqhelpdesk_status VALUES (2,'In Work');
INSERT INTO os_core_dqhelpdesk_status VALUES (3,'Closed');

--
-- Table structure for table `os_core_dqhelpdesk_swtypes`
--

CREATE TABLE os_core_dqhelpdesk_swtypes (
  swtype_id int(10) NOT NULL default '0',
  swtype varchar(255) NOT NULL default '',
  PRIMARY KEY  (swtype_id)
);

--
-- Dumping data for table `os_core_dqhelpdesk_swtypes`
--

INSERT INTO os_core_dqhelpdesk_swtypes VALUES (1,'Support');

--
-- Table structure for table `os_core_dqhelpdesk_swversions`
--

CREATE TABLE os_core_dqhelpdesk_swversions (
  swversion_id int(10) NOT NULL default '0',
  software_id int(10) NOT NULL default '1',
  swversion varchar(10) NOT NULL default '',
  PRIMARY KEY  (swversion_id)
);

--
-- Dumping data for table `os_core_dqhelpdesk_swversions`
--

INSERT INTO os_core_dqhelpdesk_swversions VALUES (1,1,'0.3.1');

--
-- Table structure for table `os_core_dqhelpdesk_tickets`
--

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
);

--
-- Dumping data for table `os_core_dqhelpdesk_tickets`
--


--
-- Table structure for table `os_core_dqhelpdesk_types`
--

CREATE TABLE os_core_dqhelpdesk_types (
  type_id int(10) NOT NULL default '0',
  `type` varchar(255) NOT NULL default '',
  PRIMARY KEY  (type_id)
);

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

CREATE TABLE os_core_ephem (
  pn_eid int(11) NOT NULL auto_increment,
  pn_did tinyint(2) NOT NULL default '0',
  pn_mid tinyint(2) NOT NULL default '0',
  pn_yid int(4) NOT NULL default '0',
  pn_content text,
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_eid)
);

--
-- Dumping data for table `os_core_ephem`
--


--
-- Table structure for table `os_core_eventia`
--

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
);

--
-- Dumping data for table `os_core_eventia`
--


--
-- Table structure for table `os_core_eventia_regs`
--

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
);

--
-- Dumping data for table `os_core_eventia_regs`
--


--
-- Table structure for table `os_core_ezcomments`
--

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
  PRIMARY KEY  (id)
);

--
-- Dumping data for table `os_core_ezcomments`
--


--
-- Table structure for table `os_core_faqanswer`
--

CREATE TABLE os_core_faqanswer (
  pn_id int(6) NOT NULL auto_increment,
  pn_id_cat int(6) default NULL,
  pn_question text,
  pn_answer text,
  pn_submittedby varchar(250) NOT NULL default '',
  PRIMARY KEY  (pn_id)
);

--
-- Dumping data for table `os_core_faqanswer`
--


--
-- Table structure for table `os_core_faqcategories`
--

CREATE TABLE os_core_faqcategories (
  pn_id_cat int(6) NOT NULL auto_increment,
  pn_categories varchar(255) default NULL,
  pn_language varchar(30) NOT NULL default '',
  pn_parent_id int(6) NOT NULL default '0',
  PRIMARY KEY  (pn_id_cat)
);

--
-- Dumping data for table `os_core_faqcategories`
--


--
-- Table structure for table `os_core_group_membership`
--

CREATE TABLE os_core_group_membership (
  pn_gid int(11) NOT NULL default '0',
  pn_uid int(11) NOT NULL default '0'
);

--
-- Dumping data for table `os_core_group_membership`
--

INSERT INTO os_core_group_membership VALUES (2,2);

--
-- Table structure for table `os_core_group_perms`
--

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
);

--
-- Dumping data for table `os_core_group_perms`
--

INSERT INTO os_core_group_perms VALUES (1,2,1,0,'.*','.*',800,0);
INSERT INTO os_core_group_perms VALUES (2,-1,2,0,'Menublock::','Main Menu:Administration:',0,0);
INSERT INTO os_core_group_perms VALUES (3,1,3,0,'.*','.*',300,0);
INSERT INTO os_core_group_perms VALUES (4,0,4,0,'Menublock::','Main Menu:(My Account|Logout|Submit News):',0,0);
INSERT INTO os_core_group_perms VALUES (5,0,5,0,'.*','.*',200,0);

--
-- Table structure for table `os_core_groups`
--

CREATE TABLE os_core_groups (
  pn_gid int(11) NOT NULL auto_increment,
  pn_name varchar(255) NOT NULL default '',
  PRIMARY KEY  (pn_gid)
);

--
-- Dumping data for table `os_core_groups`
--

INSERT INTO os_core_groups VALUES (1,'Users');
INSERT INTO os_core_groups VALUES (2,'Admins');

--
-- Table structure for table `os_core_headlines`
--

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
);

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
);

--
-- Dumping data for table `os_core_hooks`
--

INSERT INTO os_core_hooks VALUES (1,'item','transform',NULL,NULL,'API','Autolinks','user','transform');
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

--
-- Table structure for table `os_core_ip_country`
--

CREATE TABLE os_core_ip_country (
  pn_id int(11) NOT NULL auto_increment,
  pn_startip varchar(15) NOT NULL default '',
  pn_endip varchar(15) NOT NULL default '',
  pn_startlongip int(11) unsigned NOT NULL default '0',
  pn_endlongip int(11) unsigned NOT NULL default '0',
  pn_code char(2) NOT NULL default '',
  pn_country varchar(40) NOT NULL default '',
  PRIMARY KEY  (pn_id)
);

--
-- Dumping data for table `os_core_ip_country`
--

INSERT INTO os_core_ip_country VALUES (1,'2.6.190.56','222.247.255.255',33996344,3740794879,'Un','Unknown - Load ip_country Table');

--
-- Table structure for table `os_core_languages_constant`
--

CREATE TABLE os_core_languages_constant (
  pn_constant varchar(32) NOT NULL default '',
  pn_file varchar(64) NOT NULL default '',
  PRIMARY KEY  (pn_constant)
);

--
-- Dumping data for table `os_core_languages_constant`
--


--
-- Table structure for table `os_core_languages_file`
--

CREATE TABLE os_core_languages_file (
  pn_target varchar(64) NOT NULL default '',
  pn_source varchar(64) NOT NULL default '',
  PRIMARY KEY  (pn_target,pn_source),
  UNIQUE KEY source (pn_source)
);

--
-- Dumping data for table `os_core_languages_file`
--


--
-- Table structure for table `os_core_languages_translation`
--

CREATE TABLE os_core_languages_translation (
  pn_language varchar(32) NOT NULL default '',
  pn_constant varchar(32) NOT NULL default '',
  pn_translation longblob NOT NULL,
  pn_level tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (pn_constant,pn_language)
);

--
-- Dumping data for table `os_core_languages_translation`
--


--
-- Table structure for table `os_core_links_categories`
--

CREATE TABLE os_core_links_categories (
  pn_cat_id int(11) NOT NULL auto_increment,
  pn_parent_id int(11) default NULL,
  pn_title varchar(50) NOT NULL default '',
  pn_description text NOT NULL,
  PRIMARY KEY  (pn_cat_id)
);

--
-- Dumping data for table `os_core_links_categories`
--


--
-- Table structure for table `os_core_links_editorials`
--

CREATE TABLE os_core_links_editorials (
  pn_linkid int(11) NOT NULL default '0',
  pn_adminid varchar(60) NOT NULL default '',
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  pn_text text NOT NULL,
  pn_title varchar(100) NOT NULL default '',
  PRIMARY KEY  (pn_linkid)
);

--
-- Dumping data for table `os_core_links_editorials`
--


--
-- Table structure for table `os_core_links_links`
--

CREATE TABLE os_core_links_links (
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
);

--
-- Dumping data for table `os_core_links_links`
--


--
-- Table structure for table `os_core_links_modrequest`
--

CREATE TABLE os_core_links_modrequest (
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
);

--
-- Dumping data for table `os_core_links_modrequest`
--


--
-- Table structure for table `os_core_links_newlink`
--

CREATE TABLE os_core_links_newlink (
  pn_lid int(11) NOT NULL auto_increment,
  pn_cat_id int(11) NOT NULL default '0',
  pn_title varchar(100) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  pn_description text NOT NULL,
  pn_name varchar(100) NOT NULL default '',
  pn_email varchar(100) NOT NULL default '',
  pn_submitter varchar(60) NOT NULL default '',
  PRIMARY KEY  (pn_lid)
);

--
-- Dumping data for table `os_core_links_newlink`
--


--
-- Table structure for table `os_core_links_votedata`
--

CREATE TABLE os_core_links_votedata (
  pn_id int(11) NOT NULL auto_increment,
  pn_lid int(11) NOT NULL default '0',
  pn_user varchar(60) NOT NULL default '',
  pn_rating int(11) NOT NULL default '0',
  pn_hostname varchar(60) NOT NULL default '',
  pn_comments text NOT NULL,
  pn_timestamp datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (pn_id)
);

--
-- Dumping data for table `os_core_links_votedata`
--


--
-- Table structure for table `os_core_message`
--

CREATE TABLE os_core_message (
  pn_mid int(11) NOT NULL auto_increment,
  pn_title varchar(100) NOT NULL default '',
  pn_content longtext,
  pn_date varchar(14) NOT NULL default '',
  pn_expire int(7) NOT NULL default '0',
  pn_active int(4) NOT NULL default '1',
  pn_view int(1) NOT NULL default '1',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_mid)
);

--
-- Dumping data for table `os_core_message`
--

INSERT INTO os_core_message VALUES (1,'Welcome to PostNuke, the =-Phoenix-= release (0.760)','<p><a href=\"http://www.postnuke.com\">PostNuke</a> is a weblog/content management system (CMS). It is far more secure and stable than competing products, and is able to work in high-volume environments with ease.<br /><br />\nSome of the key features of PostNuke are:</p>\n<ul>\n<li> customization of all aspects of the web site\'s appearance through themes, with support for CSS stylesheets</li>\n<li> the ability to specify items as being suitable for either a single language or for all languages</li>\n<li> the best guarantee of properly displaying your web pages in all browsers, thanks to full compliance with W3C HTML standards</li>\n<li> a standard API (application programming interface) and extensive documentation to allow for easy extension of your web site\'s functionality through modules and blocks.</li>\n</ul>\n<p>PostNuke has a very active developer and support community at <a href=\"http://www.postnuke.com\">PostNuke.com</a>.</p>\n<p>We hope you will enjoy using PostNuke.<br /><br /><strong>The PostNuke development team </strong></p>\n<p><em>Note: you can edit or remove this message by going to the Administration page and clicking on the \'Administration messages\' entry </em></p>','1125767377',0,1,1,'');

--
-- Table structure for table `os_core_module_vars`
--

CREATE TABLE os_core_module_vars (
  pn_id int(11) unsigned NOT NULL auto_increment,
  pn_modname varchar(64) NOT NULL default '',
  pn_name varchar(64) NOT NULL default '',
  pn_value longtext,
  PRIMARY KEY  (pn_id),
  KEY pn_modname (pn_modname),
  KEY pn_name (pn_name)
);

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
INSERT INTO os_core_module_vars VALUES (14,'/PNConfig','sitename','s:14:\"Your Site Name\";');
INSERT INTO os_core_module_vars VALUES (15,'/PNConfig','site_logo','s:8:\"logo.gif\";');
INSERT INTO os_core_module_vars VALUES (16,'/PNConfig','slogan','s:16:\"Your slogan here\";');
INSERT INTO os_core_module_vars VALUES (17,'/PNConfig','metakeywords','s:208:\"nuke, postnuke, free, community, php, portal, opensource, open source, gpl, mysql, sql, database, web site, website, weblog, content management, contentmanagement, web content management, webcontentmanagement\";');
INSERT INTO os_core_module_vars VALUES (18,'/PNConfig','dyn_keywords','i:0;');
INSERT INTO os_core_module_vars VALUES (19,'/PNConfig','startdate','s:7:\"09.2005\";');
INSERT INTO os_core_module_vars VALUES (20,'/PNConfig','Default_Theme','s:9:\"ExtraLite\";');
INSERT INTO os_core_module_vars VALUES (21,'/PNConfig','foot1','s:776:\"<a href=\"http://www.postnuke.com\"><img src=\"images/powered/postnuke.butn.gif\" alt=\"Web site powered by PostNuke\" /></a> <a href=\"http://adodb.sourceforge.net\"><img src=\"images/powered/adodb2.gif\" alt=\"ADODB database library\" /></a> <a href=\"http://www.php.net\"><img src=\"images/powered/php4_powered.gif\" alt=\"PHP Language\" /></a><p>All logos and trademarks in this site are property of their respective owner. The comments are property of their posters, all the rest (c) 2005 by me<br />This web site was made with <a href=\"http://www.postnuke.com\">PostNuke</a>, a web portal system written in PHP. PostNuke is Free Software released under the <a href=\"http://www.gnu.org\">GNU/GPL license</a>.</p>You can syndicate our news using the file <a href=\"backend.php\">backend.php</a>\";');
INSERT INTO os_core_module_vars VALUES (22,'/PNConfig','commentlimit','i:4096;');
INSERT INTO os_core_module_vars VALUES (23,'/PNConfig','anonymous','s:9:\"Anonymous\";');
INSERT INTO os_core_module_vars VALUES (24,'/PNConfig','timezone_offset','i:12;');
INSERT INTO os_core_module_vars VALUES (25,'/PNConfig','nobox','i:0;');
INSERT INTO os_core_module_vars VALUES (26,'/PNConfig','funtext','i:0;');
INSERT INTO os_core_module_vars VALUES (27,'/PNConfig','reportlevel','i:0;');
INSERT INTO os_core_module_vars VALUES (28,'/PNConfig','startpage','s:4:\"News\";');
INSERT INTO os_core_module_vars VALUES (29,'/PNConfig','admingraphic','i:1;');
INSERT INTO os_core_module_vars VALUES (30,'/PNConfig','admart','i:20;');
INSERT INTO os_core_module_vars VALUES (31,'/PNConfig','backend_title','s:21:\"PostNuke Powered Site\";');
INSERT INTO os_core_module_vars VALUES (32,'/PNConfig','backend_language','s:5:\"en-us\";');
INSERT INTO os_core_module_vars VALUES (33,'/PNConfig','seclevel','s:6:\"Medium\";');
INSERT INTO os_core_module_vars VALUES (34,'/PNConfig','secmeddays','i:7;');
INSERT INTO os_core_module_vars VALUES (35,'/PNConfig','secinactivemins','i:10;');
INSERT INTO os_core_module_vars VALUES (36,'/PNConfig','Version_Num','s:7:\"0.7.6.0\";');
INSERT INTO os_core_module_vars VALUES (37,'/PNConfig','Version_ID','s:8:\"PostNuke\";');
INSERT INTO os_core_module_vars VALUES (38,'/PNConfig','Version_Sub','s:7:\"Phoenix\";');
INSERT INTO os_core_module_vars VALUES (39,'/PNConfig','debug_sql','i:0;');
INSERT INTO os_core_module_vars VALUES (40,'/PNConfig','anonpost','i:1;');
INSERT INTO os_core_module_vars VALUES (41,'/PNConfig','minpass','i:5;');
INSERT INTO os_core_module_vars VALUES (42,'/PNConfig','pollcomm','i:1;');
INSERT INTO os_core_module_vars VALUES (43,'/PNConfig','minage','i:13;');
INSERT INTO os_core_module_vars VALUES (44,'/PNConfig','top','i:10;');
INSERT INTO os_core_module_vars VALUES (45,'/PNConfig','storyhome','i:10;');
INSERT INTO os_core_module_vars VALUES (46,'/PNConfig','banners','b:0;');
INSERT INTO os_core_module_vars VALUES (47,'/PNConfig','myIP','s:15:\"192.168.123.254\";');
INSERT INTO os_core_module_vars VALUES (48,'/PNConfig','language','s:3:\"eng\";');
INSERT INTO os_core_module_vars VALUES (49,'/PNConfig','anonymoussessions','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (50,'/PNConfig','multilingual','i:1;');
INSERT INTO os_core_module_vars VALUES (51,'/PNConfig','useflags','i:0;');
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
INSERT INTO os_core_module_vars VALUES (93,'/PNConfig','AllowableHTML','a:83:{s:3:\"!--\";i:2;s:1:\"a\";i:2;s:4:\"abbr\";i:0;s:7:\"acronym\";i:0;s:7:\"address\";i:0;s:6:\"applet\";i:0;s:4:\"area\";i:0;s:1:\"b\";i:1;s:4:\"base\";i:0;s:8:\"basefont\";i:0;s:3:\"bdo\";i:0;s:3:\"big\";i:0;s:10:\"blockquote\";i:0;s:2:\"br\";i:1;s:6:\"button\";i:0;s:7:\"caption\";i:0;s:6:\"center\";i:0;s:4:\"cite\";i:0;s:4:\"code\";i:0;s:3:\"col\";i:0;s:8:\"colgroup\";i:0;s:3:\"del\";i:0;s:3:\"dfn\";i:0;s:3:\"dir\";i:0;s:3:\"div\";i:0;s:2:\"dl\";i:0;s:2:\"dd\";i:0;s:2:\"dt\";i:0;s:2:\"em\";i:1;s:5:\"embed\";i:0;s:8:\"fieldset\";i:0;s:4:\"font\";i:0;s:4:\"form\";i:0;s:2:\"h1\";i:0;s:2:\"h2\";i:0;s:2:\"h3\";i:0;s:2:\"h4\";i:0;s:2:\"h5\";i:0;s:2:\"h6\";i:0;s:2:\"hr\";i:1;s:1:\"i\";i:1;s:6:\"iframe\";i:0;s:3:\"img\";i:0;s:5:\"input\";i:0;s:3:\"ins\";i:0;s:3:\"kbd\";i:0;s:5:\"label\";i:0;s:6:\"legend\";i:0;s:2:\"li\";i:1;s:3:\"map\";i:0;s:7:\"marquee\";i:0;s:4:\"menu\";i:0;s:4:\"nobr\";i:0;s:6:\"object\";i:0;s:2:\"ol\";i:1;s:8:\"optgroup\";i:0;s:6:\"option\";i:0;s:1:\"p\";i:1;s:5:\"param\";i:0;s:3:\"pre\";i:1;s:1:\"q\";i:0;s:1:\"s\";i:0;s:4:\"samp\";i:0;s:6:\"script\";i:0;s:6:\"select\";i:0;s:5:\"small\";i:0;s:4:\"span\";i:0;s:6:\"strike\";i:0;s:6:\"strong\";i:1;s:3:\"sub\";i:0;s:3:\"sup\";i:0;s:5:\"table\";i:2;s:5:\"tbody\";i:0;s:2:\"td\";i:2;s:8:\"textarea\";i:0;s:5:\"tfoot\";i:0;s:2:\"th\";i:2;s:5:\"thead\";i:0;s:2:\"tr\";i:2;s:2:\"tt\";i:1;s:1:\"u\";i:0;s:2:\"ul\";i:1;s:3:\"var\";i:0;}');
INSERT INTO os_core_module_vars VALUES (94,'/PNConfig','CensorList','a:14:{i:0;s:4:\"fuck\";i:1;s:4:\"cunt\";i:2;s:6:\"fucker\";i:3;s:7:\"fucking\";i:4;s:5:\"pussy\";i:5;s:4:\"cock\";i:6;s:4:\"c0ck\";i:7;s:3:\"cum\";i:8;s:4:\"twat\";i:9;s:4:\"clit\";i:10;s:5:\"bitch\";i:11;s:3:\"fuk\";i:12;s:6:\"fuking\";i:13;s:12:\"motherfucker\";}');
INSERT INTO os_core_module_vars VALUES (95,'/PNConfig','CensorMode','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (96,'/PNConfig','CensorReplace','s:5:\"*****\";');
INSERT INTO os_core_module_vars VALUES (97,'/PNConfig','theme_change','i:0;');
INSERT INTO os_core_module_vars VALUES (98,'/PNConfig','htmlentities','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (99,'/PNConfig','UseCompression','i:0;');
INSERT INTO os_core_module_vars VALUES (100,'/PNConfig','refereronprint','i:0;');
INSERT INTO os_core_module_vars VALUES (101,'/PNConfig','storyorder','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (102,'/PNConfig','pnAntiCracker','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (103,'/PNConfig','reg_allowreg','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (104,'/PNConfig','reg_verifyemail','s:1:\"1\";');
INSERT INTO os_core_module_vars VALUES (105,'/PNConfig','reg_Illegalusername','s:87:\"root adm linux webmaster admin god administrator administrador nobody anonymous anonimo\";');
INSERT INTO os_core_module_vars VALUES (106,'/PNConfig','reg_noregreasons','s:45:\"Sorry, registration is disabled at this time.\";');
INSERT INTO os_core_module_vars VALUES (107,'/PNConfig','loadlegacy','i:0;');
INSERT INTO os_core_module_vars VALUES (108,'/PNConfig','newspager','i:0;');
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
INSERT INTO os_core_module_vars VALUES (148,'Autolinks','itemsperpage','20');
INSERT INTO os_core_module_vars VALUES (149,'Autolinks','linkfirst','1');
INSERT INTO os_core_module_vars VALUES (150,'Autolinks','invisilinks','0');
INSERT INTO os_core_module_vars VALUES (151,'Autolinks','newwindow','1');
INSERT INTO os_core_module_vars VALUES (152,'AvantGo','itemsperpage','10');
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
INSERT INTO os_core_module_vars VALUES (192,'cmodsdownload','cdversion','1.9.4');
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
INSERT INTO os_core_module_vars VALUES (236,'cmodsweblinks','cwversion','1.8.5');
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
INSERT INTO os_core_module_vars VALUES (328,'EZComments','smartypath','/var/www/html/v4b/openstar_v3/modules/EZComments/pnclass/Smarty/');
INSERT INTO os_core_module_vars VALUES (329,'EZComments','MailToAdmin','');
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
INSERT INTO os_core_module_vars VALUES (378,'photoshare','tmpdirname','*');
INSERT INTO os_core_module_vars VALUES (379,'photoshare','imagedirname','*');
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
INSERT INTO os_core_module_vars VALUES (402,'pnForum','url_smiles','modules/pnForum/pnimages/smiles');
INSERT INTO os_core_module_vars VALUES (403,'pnForum','url_ranks_images','modules/pnForum/pnimages/ranks');
INSERT INTO os_core_module_vars VALUES (404,'pnForum','folder_image','modules/pnForum/pnimages/folder.gif');
INSERT INTO os_core_module_vars VALUES (405,'pnForum','hot_folder_image','modules/pnForum/pnimages/hot_folder.gif');
INSERT INTO os_core_module_vars VALUES (406,'pnForum','newposts_image','modules/pnForum/pnimages/red_folder.gif');
INSERT INTO os_core_module_vars VALUES (407,'pnForum','hot_newposts_image','modules/pnForum/pnimages/hot_red_folder.gif');
INSERT INTO os_core_module_vars VALUES (408,'pnForum','posticon','modules/pnForum/pnimages/posticon.gif');
INSERT INTO os_core_module_vars VALUES (409,'pnForum','firstnew_image','modules/pnForum/pnimages/firstnew.gif');
INSERT INTO os_core_module_vars VALUES (410,'pnForum','post_sort_order','ASC');
INSERT INTO os_core_module_vars VALUES (411,'pnForum','log_ip','yes');
INSERT INTO os_core_module_vars VALUES (412,'pnForum','slimforum','no');
INSERT INTO os_core_module_vars VALUES (413,'pnmantis','_mantisloc','http://yoursite.com/mantis/');
INSERT INTO os_core_module_vars VALUES (414,'pnmantis','_mantisuser','0');
INSERT INTO os_core_module_vars VALUES (415,'pnmantis','_mantiswindow','0');
INSERT INTO os_core_module_vars VALUES (416,'pnmantis','_mantisguest','0');
INSERT INTO os_core_module_vars VALUES (417,'pnmantis','_mantiswrap','0');
INSERT INTO os_core_module_vars VALUES (418,'pnmantis','_mantisdb','mantis');
INSERT INTO os_core_module_vars VALUES (419,'pnmantis','_mantisframe','0');
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

--
-- Table structure for table `os_core_modules`
--

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
  PRIMARY KEY  (pn_id)
);

--
-- Dumping data for table `os_core_modules`
--

INSERT INTO os_core_modules VALUES (1,'Admin',2,'Administration','Administration',9,'Admin','1.1',1,0,3);
INSERT INTO os_core_modules VALUES (2,'Blocks',2,'Blocks','Administration of side and centre blocks',13,'Blocks','2.2',1,1,3);
INSERT INTO os_core_modules VALUES (3,'Groups',2,'Groups','Modify groups',16,'Groups','1.0',1,0,3);
INSERT INTO os_core_modules VALUES (4,'Modules',2,'Modules','Enable/disable modules, view install/docs/credits.',1,'Modules','2.5',1,0,3);
INSERT INTO os_core_modules VALUES (5,'Permissions',2,'Permissions','Configure permissions',22,'Permissions','0.4',1,0,3);
INSERT INTO os_core_modules VALUES (6,'News',1,'News','News items',7,'News','1.3',0,1,3);
INSERT INTO os_core_modules VALUES (7,'User',1,'User','User Administration',27,'User','0.3',1,0,3);
INSERT INTO os_core_modules VALUES (8,'Recommend_Us',1,'Recommend_Us','Recommend site/Send articles Module',0,'Recommend_Us','1.0',0,1,1);
INSERT INTO os_core_modules VALUES (9,'Ephemerids',2,'Ephemerids','A \'This day in history\' module.',15,'Ephemerids','1.5',1,0,3);
INSERT INTO os_core_modules VALUES (10,'Messages',2,'Messages','Private messaging system for your site',6,'Messages','1.0',0,1,3);
INSERT INTO os_core_modules VALUES (11,'LostPassword',1,'LostPassword','Retrieve lost password of a user.',18,'LostPassword','0.5',0,0,3);
INSERT INTO os_core_modules VALUES (12,'Credits',2,'Credits','Display Module credits, license, help and contact information',0,'Credits','1.2',0,1,3);
INSERT INTO os_core_modules VALUES (13,'Multisites',1,'Multisites','Create multiple sites using the same PN installation files',20,'Multisites','0.1',0,0,1);
INSERT INTO os_core_modules VALUES (14,'AddStory',1,'AddStory','Add a story',8,'AddStory','1.0',1,0,3);
INSERT INTO os_core_modules VALUES (15,'Settings',1,'Settings','Settings',26,'Settings','1.3',1,0,3);
INSERT INTO os_core_modules VALUES (16,'Mailer',2,'Mailer','Postnuke Mailer',0,'Mailer','1.0',1,0,3);
INSERT INTO os_core_modules VALUES (17,'typetool',2,'typetool','TypeTool Visual Editor Implementation',0,'typetool','8.0',1,0,3);
INSERT INTO os_core_modules VALUES (18,'Top_List',1,'Top_List','Display top x listings',0,'Top_List','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (19,'pn_bbsmile',2,'pn_bbsmile','Smilie Hook (Autoincluded)',163,'pn_bbsmile','1.14',1,1,3);
INSERT INTO os_core_modules VALUES (20,'Quotes',2,'Random Quote','Random quotes',24,'Quotes','1.5',1,0,3);
INSERT INTO os_core_modules VALUES (21,'pn_bbcode',2,'pn_bbcode','BBCode Hook',164,'pn_bbcode','1.17',1,1,3);
INSERT INTO os_core_modules VALUES (22,'Members_List',2,'Members_List','Members List',0,'Members_List','1.5',1,1,3);
INSERT INTO os_core_modules VALUES (24,'Sniffer',2,'Sniffer','Browser detection and information',0,'Sniffer','1.1',1,0,3);
INSERT INTO os_core_modules VALUES (25,'Wiki',1,'Wiki','Allow Wiki formatting in the news',28,'Wiki','1.0',0,0,3);
INSERT INTO os_core_modules VALUES (26,'Example',2,'Example','This is an example module for PostNuke CMS',0,'Example','1.2',1,1,1);
INSERT INTO os_core_modules VALUES (27,'pnRender',2,'pnRender','The Smarty implementation for PostNuke',0,'pnRender','1.0',1,0,3);
INSERT INTO os_core_modules VALUES (28,'Web_Links',1,'Web_Links','Links to other sites',0,'Web_Links','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (29,'Submit_News',1,'Submit_News','Contribute a story',0,'Submit_News','1.13',1,1,3);
INSERT INTO os_core_modules VALUES (30,'RSS',2,'RSS','RSS News Feed Reader',0,'RSS','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (31,'MailUsers',1,'MailUsers','Mail all/individual users on your site.',19,'MailUsers','1.3',1,0,3);
INSERT INTO os_core_modules VALUES (32,'Autolinks',2,'Autolinks','Automatically link key words',11,'Autolinks','1.0',1,0,3);
INSERT INTO os_core_modules VALUES (33,'legal',2,'Legal','Generic Privacy Statement and Terms of Use',0,'legal','1.2',1,1,3);
INSERT INTO os_core_modules VALUES (34,'Sections',1,'Sections','Sections',33,'Sections','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (35,'Admin_Messages',2,'Admin_Messages','Display automated/programmed messages.',0,'Admin_Messages','1.5',1,0,3);
INSERT INTO os_core_modules VALUES (36,'Referers',1,'Referers','Referers',25,'Referers','1.3',1,0,3);
INSERT INTO os_core_modules VALUES (37,'Search',1,'Search','Search this site',32,'Search','1.0',0,1,3);
INSERT INTO os_core_modules VALUES (38,'Topics',1,'Topics','Article topics',37,'Topics','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (39,'Xanthia',2,'Xanthia','Xanthia Theme Engine',0,'Xanthia','2.1',1,0,3);
INSERT INTO os_core_modules VALUES (40,'Your_Account',1,'Your_Account','User options',0,'Your_Account','0.8',0,0,3);
INSERT INTO os_core_modules VALUES (41,'Polls',1,'Polls','Polls and surveys',23,'Polls','1.1',1,1,3);
INSERT INTO os_core_modules VALUES (42,'Reviews',1,'Reviews','Reviews',31,'Reviews','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (43,'NewUser',1,'NewUser','New User for postnuke.',21,'NewUser','0.5',0,0,3);
INSERT INTO os_core_modules VALUES (44,'Ratings',2,'Ratings','Rate PostNuke items',41,'Ratings','1.3',1,1,3);
INSERT INTO os_core_modules VALUES (45,'Header_Footer',2,'Header_Footer','Postnuke Page Header and Footer',0,'Header_Footer','1.0',0,1,3);
INSERT INTO os_core_modules VALUES (46,'Languages',1,'Languages','List languages by their ISO Key and name',17,'Languages','1.3',1,0,3);
INSERT INTO os_core_modules VALUES (47,'Comments',1,'Comments','Comment on articles',14,'Comments','1.1',1,1,3);
INSERT INTO os_core_modules VALUES (48,'AvantGo',2,'AvantGo','AvantGo Mobile News Module',2,'AvantGo','1.4',1,1,3);
INSERT INTO os_core_modules VALUES (49,'Censor',2,'Censor','Site Censorship Control',0,'Censor','1.5',1,0,3);
INSERT INTO os_core_modules VALUES (50,'Downloads',1,'Downloads','Files to download',3,'Downloads','1.31',1,1,3);
INSERT INTO os_core_modules VALUES (51,'FAQ',1,'FAQ','Frequently Asked Questions',4,'FAQ','1.11',1,1,3);
INSERT INTO os_core_modules VALUES (52,'Banners',1,'Banners Admin','Administer Banners on your site',12,'Banners','1.0',1,0,3);
INSERT INTO os_core_modules VALUES (53,'ActiveMenu',2,'Active Menu','Active Menu administration.',0,'ActiveMenu','0.73',1,0,1);
INSERT INTO os_core_modules VALUES (54,'AutoTheme',1,'AutoTheme','HTML Theme System',0,'AutoTheme','.8',1,1,1);
INSERT INTO os_core_modules VALUES (55,'CmodsDownload',1,'CmodsDownload','PostNuke Up/Download Module',0,'CmodsDownload','1.9.4',1,1,3);
INSERT INTO os_core_modules VALUES (56,'CmodsWebLinks',1,'CmodsWebLinks','PostNuke Web Links Module',0,'CmodsWebLinks','1.8.5',1,1,3);
INSERT INTO os_core_modules VALUES (57,'dq_helpdesk',2,'dq_helpdesk','Full Featured Help Desk',0,'dq_helpdesk','0.5.5',1,1,3);
INSERT INTO os_core_modules VALUES (58,'eventia',2,'Eventia','Course-Management Module',0,'eventia','3.1',1,1,3);
INSERT INTO os_core_modules VALUES (59,'external',1,'external','',0,'external','0',0,0,1);
INSERT INTO os_core_modules VALUES (60,'EZComments',2,'EZComments','Attach comments to pages using hooks',0,'EZComments','0.2',1,1,3);
INSERT INTO os_core_modules VALUES (61,'formicula',2,'Formicula','Tool for creating contact forms of all kinds',0,'formicula','0.3',1,1,3);
INSERT INTO os_core_modules VALUES (62,'MultiHook',2,'MultiHook','Creates xhtml tags for abbreviations and acronyms, creates autolinks',0,'MultiHook','1.1',1,1,3);
INSERT INTO os_core_modules VALUES (63,'Netquery',2,'Netquery','MultiWhois, DNS, Email, Ports, HTTP, Ping, Traceroute, Looking Glass',0,'Netquery','3.1.1',1,1,3);
INSERT INTO os_core_modules VALUES (64,'pagesetter',2,'Pagesetter','Page creation and manager module',0,'pagesetter','6.1.0.0',1,1,3);
INSERT INTO os_core_modules VALUES (65,'pgarchive',2,'Pagesetter Archive','Archive listing for Pagesetter publications',0,'pgarchive','1.2.0.0',1,1,3);
INSERT INTO os_core_modules VALUES (66,'photoshare',2,'Photoshare','Online photo album',0,'photoshare','4.2.0',1,1,3);
INSERT INTO os_core_modules VALUES (67,'phPro',2,'phProfession','pnAPI-compliant recruitment module',0,'phPro','3.0 beta',1,1,1);
INSERT INTO os_core_modules VALUES (68,'pnAddressBook',2,'pnAddressBook','PostNuke Address Book',0,'pnAddressBook','2.3',1,1,1);
INSERT INTO os_core_modules VALUES (69,'pn_bbclick',2,'pn_bbclick','Make Clickable Hook',165,'pn_bbclick','1.05',1,1,3);
INSERT INTO os_core_modules VALUES (70,'pnForum',2,'pnForum','phpBB-style Bulletin Board',62,'pnForum','2.0.1',1,1,3);
INSERT INTO os_core_modules VALUES (71,'pn_highlight',1,'pn_highlight','highlight text portions',0,'pn_highlight','1.01',0,0,3);
INSERT INTO os_core_modules VALUES (72,'pnmantis',2,'pnmantis','Postnuke Mantis Hack',0,'pnmantis','3.0',1,1,3);
INSERT INTO os_core_modules VALUES (73,'pnOwl',2,'pnOwl','Postnuke Owl Hack',0,'pnOwl','1.5',1,1,1);
INSERT INTO os_core_modules VALUES (74,'pnTresMailer',1,'pnTresMailer','pnTresMailer NewsLetter Module',0,'pnTresMailer','6.03a',1,1,3);
INSERT INTO os_core_modules VALUES (75,'postbbcode',2,'postbbcode','PostNuke BBCode Module',0,'postbbcode','0.2.1',1,1,1);
INSERT INTO os_core_modules VALUES (76,'PostCalendar',2,'PostCalendar','PostNuke Calendar Module',44,'PostCalendar','5.0.0',1,1,3);
INSERT INTO os_core_modules VALUES (77,'postguestbook',2,'postguestbook','Guestbook Module for PostNuke/Envolution',0,'postguestbook','0.6.1',1,1,3);
INSERT INTO os_core_modules VALUES (78,'PostWrap',2,'PostWrap','Incorporate external sites and applications',0,'PostWrap','2.5',1,1,3);
INSERT INTO os_core_modules VALUES (79,'rssdisplay',2,'rssdisplay','rssDisplay',0,'rssdisplay','6',1,1,1);
INSERT INTO os_core_modules VALUES (80,'rssfeed',2,'RSSfeed','Syndicate content in RSS feeds',0,'rssfeed','2',1,1,1);
INSERT INTO os_core_modules VALUES (81,'SnakePending',2,'SnakePending','Modify Pending Content',0,'SnakePending','0.2',1,0,3);
INSERT INTO os_core_modules VALUES (82,'statistics',2,'statistics','Statistics',0,'statistics','8b',1,1,3);
INSERT INTO os_core_modules VALUES (83,'Template',2,'Template','Template for new modules',0,'Template','1.0',1,1,1);
INSERT INTO os_core_modules VALUES (84,'v4bAddressBook',2,'v4bAddressBook','v4bAddressBook',0,'v4bAddressBook','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (85,'v4bCategories',2,'v4bCategories','Site Category Manager',0,'v4bCategories','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (86,'v4bContact',2,'v4bContact','Website Contact Form Manager',0,'v4bContact','0.9',1,1,3);
INSERT INTO os_core_modules VALUES (87,'v4bConvert',2,'v4bConvert','v4bConvert Module',0,'v4bConvert','0.90.2',0,1,3);
INSERT INTO os_core_modules VALUES (88,'v4bLorem',2,'v4bLorem','Random Text Generator',0,'v4bLorem','1.0',0,1,3);
INSERT INTO os_core_modules VALUES (89,'v4bNewContent',2,'v4bNewContent','Display New Content Blocks in a center page',0,'v4bNewContent','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (90,'v4bObjectData',1,'v4bObjectData','V4B Object Model Data',0,'v4bObjectData','1.00',0,0,3);
INSERT INTO os_core_modules VALUES (91,'v4bPgPages',2,'v4bPgPages','Pagesetter Publication Aggregator',0,'v4bPgPages','0.90',1,1,3);
INSERT INTO os_core_modules VALUES (92,'v4bProjects',2,'v4bProjects','v4b Project Manager',0,'v4bProjects','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (93,'v4bRbs',2,'v4bRbs','Manage Resource Bookings',0,'v4bRbs','1.0',1,1,3);
INSERT INTO os_core_modules VALUES (94,'xFPDF',2,'xFPDF','Show content as PDF',0,'xFPDF','2.0',1,1,3);

--
-- Table structure for table `os_core_multihook`
--

CREATE TABLE os_core_multihook (
  pn_aid int(11) NOT NULL auto_increment,
  pn_short varchar(100) NOT NULL default '',
  pn_long varchar(200) NOT NULL default '',
  pn_title varchar(100) NOT NULL default '',
  pn_type tinyint(1) NOT NULL default '0',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_aid)
);

--
-- Dumping data for table `os_core_multihook`
--


--
-- Table structure for table `os_core_netquery_flags`
--

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
);

--
-- Dumping data for table `os_core_netquery_flags`
--

INSERT INTO os_core_netquery_flags VALUES (1,0,'no data','red','white','http://www.virtech.org/tools/#','');
INSERT INTO os_core_netquery_flags VALUES (2,99,'reserved','green','white','','');

--
-- Table structure for table `os_core_netquery_geocc`
--

CREATE TABLE os_core_netquery_geocc (
  ci tinyint(3) unsigned NOT NULL auto_increment,
  cc char(2) NOT NULL default '',
  cn varchar(50) NOT NULL default '',
  lat decimal(7,4) NOT NULL default '0.0000',
  lon decimal(7,4) NOT NULL default '0.0000',
  users mediumint(9) unsigned NOT NULL default '0',
  PRIMARY KEY  (ci)
);

--
-- Dumping data for table `os_core_netquery_geocc`
--

INSERT INTO os_core_netquery_geocc VALUES (1,'XX','<a href=\"http://virtech.org/tools/\">No GeoIP</a>','0.0000','0.0000',0);

--
-- Table structure for table `os_core_netquery_geoip`
--

CREATE TABLE os_core_netquery_geoip (
  `start` int(10) unsigned NOT NULL default '0',
  `end` int(10) unsigned NOT NULL default '0',
  ci tinyint(3) unsigned NOT NULL default '0'
);

--
-- Dumping data for table `os_core_netquery_geoip`
--

INSERT INTO os_core_netquery_geoip VALUES (0,1,1);

--
-- Table structure for table `os_core_netquery_lgrouter`
--

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
);

--
-- Dumping data for table `os_core_netquery_lgrouter`
--

INSERT INTO os_core_netquery_lgrouter VALUES (1,'default','LG Default Settings','','',1,2601,'',1,2602,'',1,2603,'',1,2604,'',1,2605,'',1,2606,'',1);
INSERT INTO os_core_netquery_lgrouter VALUES (2,'ATT Public','route-server.ip.att.net','','',1,23,'',0,0,'',0,0,'',1,23,'',1,23,'',0,0,'',1);
INSERT INTO os_core_netquery_lgrouter VALUES (3,'Oregon-ix','route-views.oregon-ix.net','rviews','',1,23,'',0,0,'',0,0,'',1,23,'',1,23,'',0,0,'',1);

--
-- Table structure for table `os_core_netquery_ports`
--

CREATE TABLE os_core_netquery_ports (
  port_id mediumint(9) NOT NULL auto_increment,
  port mediumint(9) NOT NULL default '0',
  protocol char(3) NOT NULL default '',
  service varchar(35) NOT NULL default '',
  `comment` varchar(50) NOT NULL default '',
  flag tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (port_id)
);

--
-- Dumping data for table `os_core_netquery_ports`
--

INSERT INTO os_core_netquery_ports VALUES (1,0,'xxx','Unknown','Port services data not installed',0);

--
-- Table structure for table `os_core_netquery_whois`
--

CREATE TABLE os_core_netquery_whois (
  whois_id mediumint(9) NOT NULL auto_increment,
  whois_ext varchar(10) NOT NULL default '',
  whois_server varchar(100) NOT NULL default '',
  PRIMARY KEY  (whois_id),
  UNIQUE KEY keyword (whois_ext)
);

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
-- Table structure for table `os_core_nl_arch_subscriber`
--

CREATE TABLE os_core_nl_arch_subscriber (
  arch_mid int(11) NOT NULL default '0',
  sub_reg_id int(11) NOT NULL default '0',
  arch_date int(25) NOT NULL default '0',
  arch_read int(25) NOT NULL default '0'
);

--
-- Dumping data for table `os_core_nl_arch_subscriber`
--


--
-- Table structure for table `os_core_nl_archive`
--

CREATE TABLE os_core_nl_archive (
  arch_mid int(11) NOT NULL auto_increment,
  arch_issue tinytext NOT NULL,
  arch_message longtext NOT NULL,
  arch_date int(25) NOT NULL default '0',
  PRIMARY KEY  (arch_mid)
);

--
-- Dumping data for table `os_core_nl_archive`
--


--
-- Table structure for table `os_core_nl_archive_txt`
--

CREATE TABLE os_core_nl_archive_txt (
  arch_mid int(11) NOT NULL default '0',
  arch_issue tinytext NOT NULL,
  arch_message longtext NOT NULL,
  arch_date int(25) NOT NULL default '0',
  PRIMARY KEY  (arch_mid)
);

--
-- Dumping data for table `os_core_nl_archive_txt`
--


--
-- Table structure for table `os_core_nl_modules`
--

CREATE TABLE os_core_nl_modules (
  mod_id int(11) NOT NULL auto_increment,
  mod_pos int(11) NOT NULL default '0',
  mod_file tinytext NOT NULL,
  mod_name tinytext NOT NULL,
  mod_function tinytext NOT NULL,
  mod_descr tinytext NOT NULL,
  mod_version tinytext NOT NULL,
  mod_multi_output int(5) NOT NULL default '0',
  mod_qty int(5) NOT NULL default '1',
  mod_edit int(5) NOT NULL default '0',
  mod_data mediumtext NOT NULL,
  PRIMARY KEY  (mod_id)
);

--
-- Dumping data for table `os_core_nl_modules`
--


--
-- Table structure for table `os_core_nl_subscriber`
--

CREATE TABLE os_core_nl_subscriber (
  sub_reg_id int(11) NOT NULL auto_increment,
  sub_uid int(11) NOT NULL default '0',
  sub_name tinytext NOT NULL,
  sub_email tinytext NOT NULL,
  sub_last_date int(25) NOT NULL default '0',
  PRIMARY KEY  (sub_reg_id)
);

--
-- Dumping data for table `os_core_nl_subscriber`
--


--
-- Table structure for table `os_core_nl_unsubscribe`
--

CREATE TABLE os_core_nl_unsubscribe (
  unsub_reg_id int(11) NOT NULL default '0',
  unsub_uid int(11) NOT NULL default '0',
  unsub_name tinytext NOT NULL,
  unsub_email tinytext NOT NULL,
  unsub_last_date int(25) NOT NULL default '0',
  unsub_date int(25) NOT NULL default '0',
  unsub_received int(5) NOT NULL default '0',
  unsub_remote_addr tinytext NOT NULL,
  unsub_user_agent tinytext NOT NULL,
  unsub_who int(11) NOT NULL default '0'
);

--
-- Dumping data for table `os_core_nl_unsubscribe`
--


--
-- Table structure for table `os_core_nl_var`
--

CREATE TABLE os_core_nl_var (
  nl_var_id int(11) NOT NULL default '0',
  nl_header mediumtext NOT NULL,
  nl_footer mediumtext NOT NULL,
  nl_subject tinytext NOT NULL,
  nl_name tinytext NOT NULL,
  nl_email tinytext NOT NULL,
  nl_url tinytext NOT NULL,
  nl_tpl_html tinytext NOT NULL,
  nl_tpl_text tinytext NOT NULL,
  nl_issue int(11) NOT NULL default '0',
  nl_bulk_count int(5) NOT NULL default '500',
  nl_loop_count int(5) NOT NULL default '5',
  nl_mail_server tinytext NOT NULL,
  nl_unreg int(5) NOT NULL default '0',
  nl_system int(5) NOT NULL default '0',
  nl_popup int(5) NOT NULL default '0',
  nl_popup_days int(5) NOT NULL default '10',
  nl_sample int(5) NOT NULL default '0',
  nl_personal int(5) NOT NULL default '0',
  nl_resub int(5) NOT NULL default '1',
  PRIMARY KEY  (nl_var_id)
);

--
-- Dumping data for table `os_core_nl_var`
--

INSERT INTO os_core_nl_var VALUES (1,'Here is this weeks newsletter.','Thanks for checking out our news.\r\n\r\nsincerely,\r\nme','Our Newsletter','Your Site Name','you@your.address','http://www.yoursite.com','default/html.tpl','default/text.tpl',1,500,5,'localhost',0,0,0,10,0,0,1);

--
-- Table structure for table `os_core_pagesetter_counters`
--

CREATE TABLE os_core_pagesetter_counters (
  pg_name varchar(100) NOT NULL default '',
  pg_count int(11) NOT NULL default '0',
  PRIMARY KEY  (pg_name)
);

--
-- Dumping data for table `os_core_pagesetter_counters`
--


--
-- Table structure for table `os_core_pagesetter_listitems`
--

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
);

--
-- Dumping data for table `os_core_pagesetter_listitems`
--


--
-- Table structure for table `os_core_pagesetter_lists`
--

CREATE TABLE os_core_pagesetter_lists (
  pg_id int(11) NOT NULL auto_increment,
  pg_authorid int(11) NOT NULL default '0',
  pg_created date NOT NULL default '0000-00-00',
  pg_title varchar(255) default NULL,
  pg_description varchar(255) default NULL,
  PRIMARY KEY  (pg_id)
);

--
-- Dumping data for table `os_core_pagesetter_lists`
--


--
-- Table structure for table `os_core_pagesetter_pubfields`
--

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
);

--
-- Dumping data for table `os_core_pagesetter_pubfields`
--


--
-- Table structure for table `os_core_pagesetter_pubheader`
--

CREATE TABLE os_core_pagesetter_pubheader (
  pg_tid int(11) NOT NULL default '0',
  pg_pid int(11) NOT NULL default '0',
  pg_hitcount int(11) NOT NULL default '0',
  pg_onlineid int(11) default NULL,
  pg_deleted tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (pg_tid,pg_pid)
);

--
-- Dumping data for table `os_core_pagesetter_pubheader`
--


--
-- Table structure for table `os_core_pagesetter_pubtypes`
--

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
  PRIMARY KEY  (pg_id)
);

--
-- Dumping data for table `os_core_pagesetter_pubtypes`
--


--
-- Table structure for table `os_core_pagesetter_revisions`
--

CREATE TABLE os_core_pagesetter_revisions (
  pg_tid int(11) NOT NULL default '0',
  pg_id int(11) NOT NULL default '0',
  pg_pid int(11) NOT NULL default '0',
  pg_prevversion int(11) NOT NULL default '0',
  pg_user int(11) NOT NULL default '0',
  pg_timestamp datetime default NULL,
  PRIMARY KEY  (pg_tid,pg_id)
);

--
-- Dumping data for table `os_core_pagesetter_revisions`
--


--
-- Table structure for table `os_core_pagesetter_session`
--

CREATE TABLE os_core_pagesetter_session (
  pg_sessionid varchar(50) NOT NULL default '',
  pg_cache mediumblob NOT NULL,
  pg_lastused date NOT NULL default '0000-00-00',
  PRIMARY KEY  (pg_sessionid)
);

--
-- Dumping data for table `os_core_pagesetter_session`
--


--
-- Table structure for table `os_core_pagesetter_wfcfg`
--

CREATE TABLE os_core_pagesetter_wfcfg (
  pg_workflow varchar(100) NOT NULL default '',
  pg_tid int(11) NOT NULL default '0',
  pg_setting varchar(100) NOT NULL default '',
  pg_value text,
  PRIMARY KEY  (pg_workflow,pg_tid,pg_setting)
);

--
-- Dumping data for table `os_core_pagesetter_wfcfg`
--


--
-- Table structure for table `os_core_photoshare_access`
--

CREATE TABLE os_core_photoshare_access (
  ps_accessid int(11) NOT NULL auto_increment,
  ps_folder int(11) NOT NULL default '0',
  ps_kind tinyint(4) NOT NULL default '0',
  ps_access tinyint(4) NOT NULL default '0',
  ps_id int(11) NOT NULL default '0',
  PRIMARY KEY  (ps_accessid),
  KEY ps_folder (ps_folder)
);

--
-- Dumping data for table `os_core_photoshare_access`
--


--
-- Table structure for table `os_core_photoshare_folders`
--

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
);

--
-- Dumping data for table `os_core_photoshare_folders`
--


--
-- Table structure for table `os_core_photoshare_images`
--

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
);

--
-- Dumping data for table `os_core_photoshare_images`
--


--
-- Table structure for table `os_core_photoshare_setup`
--

CREATE TABLE os_core_photoshare_setup (
  ps_setupid int(11) NOT NULL auto_increment,
  ps_kind tinyint(4) NOT NULL default '0',
  ps_storage int(11) NOT NULL default '0',
  ps_id int(11) NOT NULL default '0',
  PRIMARY KEY  (ps_setupid),
  KEY ps_kind (ps_kind,ps_storage)
);

--
-- Dumping data for table `os_core_photoshare_setup`
--


--
-- Table structure for table `os_core_pn_bbclick_counter`
--

CREATE TABLE os_core_pn_bbclick_counter (
  cnt_id int(10) NOT NULL auto_increment,
  cnt_url varchar(255) default NULL,
  cnt_counter int(10) default NULL,
  cnt_lastclick int(10) default NULL,
  PRIMARY KEY  (cnt_id),
  KEY cnt_url (cnt_url)
);

--
-- Dumping data for table `os_core_pn_bbclick_counter`
--


--
-- Table structure for table `os_core_pnforum_categories`
--

CREATE TABLE os_core_pnforum_categories (
  cat_id int(10) NOT NULL auto_increment,
  cat_title varchar(100) default NULL,
  cat_order varchar(10) default NULL,
  PRIMARY KEY  (cat_id)
);

--
-- Dumping data for table `os_core_pnforum_categories`
--


--
-- Table structure for table `os_core_pnforum_forum_favorites`
--

CREATE TABLE os_core_pnforum_forum_favorites (
  forum_id int(10) NOT NULL default '0',
  user_id int(10) NOT NULL default '0',
  PRIMARY KEY  (forum_id,user_id)
);

--
-- Dumping data for table `os_core_pnforum_forum_favorites`
--


--
-- Table structure for table `os_core_pnforum_forum_mods`
--

CREATE TABLE os_core_pnforum_forum_mods (
  forum_id int(10) NOT NULL default '0',
  user_id int(10) NOT NULL default '0'
);

--
-- Dumping data for table `os_core_pnforum_forum_mods`
--


--
-- Table structure for table `os_core_pnforum_forums`
--

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
  PRIMARY KEY  (forum_id),
  KEY forum_last_post_id (forum_last_post_id)
);

--
-- Dumping data for table `os_core_pnforum_forums`
--


--
-- Table structure for table `os_core_pnforum_posts`
--

CREATE TABLE os_core_pnforum_posts (
  post_id int(10) NOT NULL auto_increment,
  topic_id int(10) NOT NULL default '0',
  forum_id int(10) NOT NULL default '0',
  poster_id int(10) NOT NULL default '0',
  post_time varchar(20) default NULL,
  poster_ip varchar(16) default NULL,
  PRIMARY KEY  (post_id),
  KEY post_id (post_id),
  KEY forum_id (forum_id),
  KEY topic_id (topic_id),
  KEY poster_id (poster_id)
);

--
-- Dumping data for table `os_core_pnforum_posts`
--


--
-- Table structure for table `os_core_pnforum_posts_text`
--

CREATE TABLE os_core_pnforum_posts_text (
  post_id int(10) NOT NULL default '0',
  post_text text,
  PRIMARY KEY  (post_id)
);

--
-- Dumping data for table `os_core_pnforum_posts_text`
--


--
-- Table structure for table `os_core_pnforum_ranks`
--

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
);

--
-- Dumping data for table `os_core_pnforum_ranks`
--


--
-- Table structure for table `os_core_pnforum_subscription`
--

CREATE TABLE os_core_pnforum_subscription (
  msg_id int(10) NOT NULL auto_increment,
  forum_id int(10) NOT NULL default '0',
  user_id int(10) NOT NULL default '0',
  PRIMARY KEY  (msg_id)
);

--
-- Dumping data for table `os_core_pnforum_subscription`
--


--
-- Table structure for table `os_core_pnforum_topic_subscription`
--

CREATE TABLE os_core_pnforum_topic_subscription (
  topic_id int(10) NOT NULL default '0',
  forum_id int(10) NOT NULL default '0',
  user_id int(10) NOT NULL default '0'
);

--
-- Dumping data for table `os_core_pnforum_topic_subscription`
--


--
-- Table structure for table `os_core_pnforum_topics`
--

CREATE TABLE os_core_pnforum_topics (
  topic_id int(10) NOT NULL auto_increment,
  topic_title varchar(100) default NULL,
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
  PRIMARY KEY  (topic_id),
  KEY forum_id (forum_id),
  KEY topic_last_post_id (topic_last_post_id)
);

--
-- Dumping data for table `os_core_pnforum_topics`
--


--
-- Table structure for table `os_core_pnforum_users`
--

CREATE TABLE os_core_pnforum_users (
  user_id int(10) unsigned NOT NULL default '0',
  user_posts int(10) unsigned NOT NULL default '0',
  user_rank int(10) unsigned NOT NULL default '0',
  user_level int(10) unsigned NOT NULL default '1',
  user_lastvisit timestamp NOT NULL,
  user_favorites int(1) NOT NULL default '0',
  user_post_order int(1) NOT NULL default '0',
  PRIMARY KEY  (user_id)
);

--
-- Dumping data for table `os_core_pnforum_users`
--


--
-- Table structure for table `os_core_poll_check`
--

CREATE TABLE os_core_poll_check (
  pn_ip varchar(20) NOT NULL default '',
  pn_time varchar(14) NOT NULL default ''
);

--
-- Dumping data for table `os_core_poll_check`
--


--
-- Table structure for table `os_core_poll_data`
--

CREATE TABLE os_core_poll_data (
  pn_pollid int(11) NOT NULL default '0',
  pn_optiontext char(50) NOT NULL default '',
  pn_optioncount int(11) NOT NULL default '0',
  pn_voteid int(11) NOT NULL default '0'
);

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

CREATE TABLE os_core_poll_desc (
  pn_pollid int(11) NOT NULL auto_increment,
  pn_title varchar(100) NOT NULL default '',
  pn_timestamp int(11) NOT NULL default '0',
  pn_voters mediumint(9) NOT NULL default '0',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_pollid)
);

--
-- Dumping data for table `os_core_poll_desc`
--

INSERT INTO os_core_poll_desc VALUES (2,'What do you think of PostNuke?',995385085,0,'');

--
-- Table structure for table `os_core_pollcomments`
--

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
  PRIMARY KEY  (pn_tid)
);

--
-- Dumping data for table `os_core_pollcomments`
--


--
-- Table structure for table `os_core_postcalendar_categories`
--

CREATE TABLE os_core_postcalendar_categories (
  pc_catid int(11) unsigned NOT NULL auto_increment,
  pc_catname varchar(100) NOT NULL default 'Undefined',
  pc_catcolor varchar(50) NOT NULL default '#FF0000',
  pc_catdesc text,
  PRIMARY KEY  (pc_catid),
  KEY basic_cat (pc_catname,pc_catcolor)
);

--
-- Dumping data for table `os_core_postcalendar_categories`
--

INSERT INTO os_core_postcalendar_categories VALUES (1,'Default','#ff0000','Default Category');

--
-- Table structure for table `os_core_postcalendar_events`
--

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
);

--
-- Dumping data for table `os_core_postcalendar_events`
--


--
-- Table structure for table `os_core_postguestbook_gb`
--

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
);

--
-- Dumping data for table `os_core_postguestbook_gb`
--


--
-- Table structure for table `os_core_postwrap_url`
--

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
);

--
-- Dumping data for table `os_core_postwrap_url`
--


--
-- Table structure for table `os_core_priv_msgs`
--

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
);

--
-- Dumping data for table `os_core_priv_msgs`
--


--
-- Table structure for table `os_core_queue`
--

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
);

--
-- Dumping data for table `os_core_queue`
--


--
-- Table structure for table `os_core_quotes`
--

CREATE TABLE os_core_quotes (
  pn_qid int(10) NOT NULL auto_increment,
  pn_quote text,
  pn_author varchar(150) NOT NULL default '',
  PRIMARY KEY  (pn_qid)
);

--
-- Dumping data for table `os_core_quotes`
--


--
-- Table structure for table `os_core_ratings`
--

CREATE TABLE os_core_ratings (
  pn_rid int(10) NOT NULL auto_increment,
  pn_module varchar(32) NOT NULL default '',
  pn_itemid varchar(64) NOT NULL default '',
  pn_ratingtype varchar(64) NOT NULL default '',
  pn_rating double(6,5) NOT NULL default '0.00000',
  pn_numratings int(5) NOT NULL default '1',
  PRIMARY KEY  (pn_rid)
);

--
-- Dumping data for table `os_core_ratings`
--


--
-- Table structure for table `os_core_ratingslog`
--

CREATE TABLE os_core_ratingslog (
  pn_id varchar(32) NOT NULL default '',
  pn_ratingid varchar(64) NOT NULL default '',
  pn_rating int(3) NOT NULL default '0'
);

--
-- Dumping data for table `os_core_ratingslog`
--


--
-- Table structure for table `os_core_realms`
--

CREATE TABLE os_core_realms (
  pn_rid int(11) NOT NULL auto_increment,
  pn_name varchar(255) NOT NULL default '',
  PRIMARY KEY  (pn_rid)
);

--
-- Dumping data for table `os_core_realms`
--


--
-- Table structure for table `os_core_referer`
--

CREATE TABLE os_core_referer (
  pn_rid int(11) NOT NULL auto_increment,
  pn_url varchar(254) NOT NULL default '',
  pn_frequency int(15) default NULL,
  PRIMARY KEY  (pn_rid),
  KEY pn_url (pn_url)
);

--
-- Dumping data for table `os_core_referer`
--


--
-- Table structure for table `os_core_related`
--

CREATE TABLE os_core_related (
  pn_rid int(11) NOT NULL auto_increment,
  pn_tid int(11) NOT NULL default '0',
  pn_name varchar(30) NOT NULL default '',
  pn_url varchar(254) NOT NULL default '',
  PRIMARY KEY  (pn_rid)
);

--
-- Dumping data for table `os_core_related`
--


--
-- Table structure for table `os_core_reviews`
--

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
);

--
-- Dumping data for table `os_core_reviews`
--


--
-- Table structure for table `os_core_reviews_add`
--

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
);

--
-- Dumping data for table `os_core_reviews_add`
--


--
-- Table structure for table `os_core_reviews_comments`
--

CREATE TABLE os_core_reviews_comments (
  pn_cid int(11) NOT NULL auto_increment,
  pn_rid int(11) NOT NULL default '0',
  pn_userid varchar(25) NOT NULL default '',
  pn_date datetime default NULL,
  pn_comments text,
  pn_score int(11) NOT NULL default '0',
  PRIMARY KEY  (pn_cid)
);

--
-- Dumping data for table `os_core_reviews_comments`
--


--
-- Table structure for table `os_core_reviews_main`
--

CREATE TABLE os_core_reviews_main (
  pn_title varchar(100) default NULL,
  pn_description text
);

--
-- Dumping data for table `os_core_reviews_main`
--

INSERT INTO os_core_reviews_main VALUES ('Reviews Section Title','Reviews Section Long Description');

--
-- Table structure for table `os_core_seccont`
--

CREATE TABLE os_core_seccont (
  pn_artid int(11) NOT NULL auto_increment,
  pn_secid int(11) NOT NULL default '0',
  pn_title text NOT NULL,
  pn_content text NOT NULL,
  pn_counter int(11) NOT NULL default '0',
  pn_language varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_artid)
);

--
-- Dumping data for table `os_core_seccont`
--


--
-- Table structure for table `os_core_sections`
--

CREATE TABLE os_core_sections (
  pn_secid int(11) NOT NULL auto_increment,
  pn_secname varchar(40) NOT NULL default '',
  pn_image varchar(50) NOT NULL default '',
  PRIMARY KEY  (pn_secid)
);

--
-- Dumping data for table `os_core_sections`
--


--
-- Table structure for table `os_core_session_info`
--

CREATE TABLE os_core_session_info (
  pn_sessid varchar(32) NOT NULL default '',
  pn_ipaddr varchar(20) NOT NULL default '',
  pn_firstused int(11) NOT NULL default '0',
  pn_lastused int(11) NOT NULL default '0',
  pn_uid int(11) NOT NULL default '0',
  pn_vars blob,
  PRIMARY KEY  (pn_sessid)
);

--
-- Dumping data for table `os_core_session_info`
--

INSERT INTO os_core_session_info VALUES ('47bc2a8ed214afad9933186252d91630','127.0.0.1',1125767384,1125850391,2,'PNSVrand|i:959189179;PNSVlang|s:3:\"eng\";PNSVuid|i:2;PNSVrememberme|i:1;PNSVlastcid|s:1:\"3\";');

--
-- Table structure for table `os_core_snakepending`
--

CREATE TABLE os_core_snakepending (
  pn_pend_id int(10) NOT NULL auto_increment,
  pn_pend_url varchar(255) NOT NULL default '',
  pn_pend_Name varchar(255) NOT NULL default '',
  pn_pend_SQL varchar(255) NOT NULL default '',
  PRIMARY KEY  (pn_pend_id)
);

--
-- Dumping data for table `os_core_snakepending`
--

INSERT INTO os_core_snakepending VALUES (1,'admin.php?module=Downloads&op=main','Downloads (new)','SELECT count(*) FROM os_core_downloads_newdownload');
INSERT INTO os_core_snakepending VALUES (2,'admin.php?module=Downloads&op=main','Downloads (modified)','SELECT count(*) FROM os_core_downloads_modrequest');
INSERT INTO os_core_snakepending VALUES (3,'admin.php?module=FAQ&op=FaqCatUnanswered','FAQ (unanswered)','SELECT count(*) FROM os_core_faqanswer where pn_answer=\'\'');
INSERT INTO os_core_snakepending VALUES (4,'modules.php?op=modload&name=Members_List&file=index','reg. User','SELECT count(*) FROM os_core_users');
INSERT INTO os_core_snakepending VALUES (5,'admin.php?module=NS-Referers&op=main','Referers','SELECT count(*) FROM os_core_referer');
INSERT INTO os_core_snakepending VALUES (6,'admin.php?module=Reviews&op=main','Reviews','SELECT count(*) FROM os_core_reviews');
INSERT INTO os_core_snakepending VALUES (7,'admin.php?module=Reviews&op=main','Reviews (waiting)','SELECT count(*) FROM os_core_reviews_add');
INSERT INTO os_core_snakepending VALUES (8,'admin.php?module=NS-AddStory&op=submissions','Stories (waiting)','SELECT count(*) FROM os_core_queue WHERE pn_arcd=0');
INSERT INTO os_core_snakepending VALUES (9,'admin.php?module=Sections&op=main','Stories (Sections)','SELECT count(*) FROM os_core_seccont');
INSERT INTO os_core_snakepending VALUES (10,'admin.php?module=Web_Links&op=main','Web_Links (new)','SELECT count(*) FROM os_core_links_newlink');
INSERT INTO os_core_snakepending VALUES (11,'admin.php?module=Web_Links&op=main','Web_Links (modified)','SELECT count(*) FROM os_core_links_modrequest');
INSERT INTO os_core_snakepending VALUES (12,'admin.php?module=Web_Links&op=LinksListBrokenLinks','Web_Links (broken','SELECT count(*) FROM os_core_links_modrequest WHERE pn_brokenlink=1');
INSERT INTO os_core_snakepending VALUES (13,'admin.php?module=Web_Links&op=LinksListModRequests','Web_Links (modified)','SELECT count(*) FROM os_core_links_modrequest WHERE pn_brokenlink=0');
INSERT INTO os_core_snakepending VALUES (14,'index.php?module=statistics&func=main','Statistics (Hits)','SELECT pn_count FROM os_core_counter WHERE pn_var like \'hits\'');

--
-- Table structure for table `os_core_stats_archive`
--

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
);

--
-- Dumping data for table `os_core_stats_archive`
--


--
-- Table structure for table `os_core_stats_details`
--

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
  KEY sessionid (pn_sessionid)
);

--
-- Dumping data for table `os_core_stats_details`
--


--
-- Table structure for table `os_core_stats_reports`
--

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
);

--
-- Dumping data for table `os_core_stats_reports`
--

INSERT INTO os_core_stats_reports VALUES (1,'Classic','A report similar to the old Stats module.','stats_details','sitestart','today','ta=details|ps=1|cs=1|csp=monthly|br=1|os=1|hd=1|dw=1|gv=1|gvp=monthly|detp=monthly|hic=10|ptc=10|dtc=10|ltc=10|rac=10|re=1|rec=10|epc=10|sdc=10|udu=every|ueu=every|');

--
-- Table structure for table `os_core_stats_summary`
--

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
);

--
-- Dumping data for table `os_core_stats_summary`
--


--
-- Table structure for table `os_core_stories`
--

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
  PRIMARY KEY  (pn_sid)
);

--
-- Dumping data for table `os_core_stories`
--


--
-- Table structure for table `os_core_stories_cat`
--

CREATE TABLE os_core_stories_cat (
  pn_catid int(11) NOT NULL auto_increment,
  pn_title varchar(40) NOT NULL default '',
  pn_counter int(11) NOT NULL default '0',
  pn_themeoverride varchar(30) NOT NULL default '',
  PRIMARY KEY  (pn_catid)
);

--
-- Dumping data for table `os_core_stories_cat`
--


--
-- Table structure for table `os_core_theme_addons`
--

CREATE TABLE os_core_theme_addons (
  pn_addon_id int(11) unsigned NOT NULL auto_increment,
  pn_block_id int(11) unsigned NOT NULL default '0',
  pn_addonname varchar(25) NOT NULL default '',
  pn_block_function varchar(200) NOT NULL default '',
  KEY pn_addon_id (pn_addon_id)
);

--
-- Dumping data for table `os_core_theme_addons`
--


--
-- Table structure for table `os_core_theme_blcontrol`
--

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
);

--
-- Dumping data for table `os_core_theme_blcontrol`
--


--
-- Table structure for table `os_core_theme_cache`
--

CREATE TABLE os_core_theme_cache (
  cache_id varchar(32) NOT NULL default '',
  cache_contents mediumtext NOT NULL,
  PRIMARY KEY  (cache_id)
);

--
-- Dumping data for table `os_core_theme_cache`
--


--
-- Table structure for table `os_core_theme_config`
--

CREATE TABLE os_core_theme_config (
  skin_id int(11) NOT NULL default '1',
  name varchar(200) NOT NULL default '',
  description varchar(60) NOT NULL default '',
  setting text NOT NULL,
  `data` text NOT NULL
);

--
-- Dumping data for table `os_core_theme_config`
--


--
-- Table structure for table `os_core_theme_layout`
--

CREATE TABLE os_core_theme_layout (
  skin_id int(11) NOT NULL default '0',
  zone_label varchar(255) NOT NULL default '',
  tpl_file varchar(200) NOT NULL default '',
  skin_type varchar(8) NOT NULL default 'theme',
  KEY skin_id (skin_id)
);

--
-- Dumping data for table `os_core_theme_layout`
--


--
-- Table structure for table `os_core_theme_palette`
--

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
);

--
-- Dumping data for table `os_core_theme_palette`
--


--
-- Table structure for table `os_core_theme_skins`
--

CREATE TABLE os_core_theme_skins (
  skin_id int(11) unsigned NOT NULL auto_increment,
  name varchar(200) NOT NULL default '',
  is_active int(1) NOT NULL default '0',
  is_multicolor int(1) NOT NULL default '0',
  PRIMARY KEY  (skin_id)
);

--
-- Dumping data for table `os_core_theme_skins`
--


--
-- Table structure for table `os_core_theme_tplfile`
--

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
);

--
-- Dumping data for table `os_core_theme_tplfile`
--


--
-- Table structure for table `os_core_theme_tplsource`
--

CREATE TABLE os_core_theme_tplsource (
  tpl_id int(11) unsigned NOT NULL auto_increment,
  tpl_skin_id int(11) unsigned NOT NULL default '0',
  tpl_file_name varchar(200) NOT NULL default '',
  tpl_source mediumtext NOT NULL,
  tpl_secure tinyint(1) NOT NULL default '1',
  tpl_trusted tinyint(1) NOT NULL default '1',
  tpl_timestamp timestamp NOT NULL,
  KEY tpl_id (tpl_id)
);

--
-- Dumping data for table `os_core_theme_tplsource`
--


--
-- Table structure for table `os_core_theme_zones`
--

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
);

--
-- Dumping data for table `os_core_theme_zones`
--


--
-- Table structure for table `os_core_topics`
--

CREATE TABLE os_core_topics (
  pn_topicid tinyint(4) NOT NULL auto_increment,
  pn_topicname varchar(255) default NULL,
  pn_topicimage varchar(255) default NULL,
  pn_topictext varchar(255) default NULL,
  pn_counter int(11) NOT NULL default '0',
  PRIMARY KEY  (pn_topicid)
);

--
-- Dumping data for table `os_core_topics`
--

INSERT INTO os_core_topics VALUES (2,'Linux','linux.gif','Linux',0);
INSERT INTO os_core_topics VALUES (1,'PostNuke','PostNuke.gif','PostNuke',0);

--
-- Table structure for table `os_core_user_data`
--

CREATE TABLE os_core_user_data (
  pn_uda_id int(11) NOT NULL auto_increment,
  pn_uda_propid int(11) NOT NULL default '0',
  pn_uda_uid int(11) NOT NULL default '0',
  pn_uda_value mediumblob NOT NULL,
  PRIMARY KEY  (pn_uda_id),
  UNIQUE KEY index_id_propid (pn_uda_propid,pn_uda_id)
);

--
-- Dumping data for table `os_core_user_data`
--


--
-- Table structure for table `os_core_user_perms`
--

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
);

--
-- Dumping data for table `os_core_user_perms`
--


--
-- Table structure for table `os_core_user_property`
--

CREATE TABLE os_core_user_property (
  pn_prop_id int(11) NOT NULL auto_increment,
  pn_prop_label varchar(255) NOT NULL default '',
  pn_prop_dtype int(11) NOT NULL default '0',
  pn_prop_length int(11) NOT NULL default '255',
  pn_prop_weight int(11) NOT NULL default '0',
  pn_prop_validation varchar(255) default NULL,
  PRIMARY KEY  (pn_prop_id),
  UNIQUE KEY pn_prop_label (pn_prop_label)
);

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

CREATE TABLE os_core_userblocks (
  pn_uid int(11) NOT NULL default '0',
  pn_bid int(11) NOT NULL default '0',
  pn_active tinyint(3) NOT NULL default '1',
  pn_last_update timestamp NOT NULL
);

--
-- Dumping data for table `os_core_userblocks`
--

INSERT INTO os_core_userblocks VALUES (2,1,1,'2005-09-03 19:09:57');
INSERT INTO os_core_userblocks VALUES (2,3,1,'2005-09-03 19:09:57');
INSERT INTO os_core_userblocks VALUES (2,8,1,'2005-09-03 19:09:57');
INSERT INTO os_core_userblocks VALUES (2,15,1,'2005-09-03 19:09:57');

--
-- Table structure for table `os_core_users`
--

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
  PRIMARY KEY  (pn_uid)
);

--
-- Dumping data for table `os_core_users`
--

INSERT INTO os_core_users VALUES (1,'','Anonymous','','','','blank.gif','1125767375','','','','','',0,0,'','','','',10,'',0,0,0,'',0,'','',4096,0,12.0);
INSERT INTO os_core_users VALUES (2,'admin','admin','openstar@example.com','','http://www.open-star.com','blank.gif','1125767375','','','','','',0,0,'','','','21232f297a57a5a743894a0e4a801fc3',10,'',0,0,0,'',0,'','',4096,0,12.0);

--
-- Table structure for table `os_core_v4b_addressbook_company`
--

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
);

--
-- Dumping data for table `os_core_v4b_addressbook_company`
--


--
-- Table structure for table `os_core_v4b_addressbook_company_branch`
--

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
);

--
-- Dumping data for table `os_core_v4b_addressbook_company_branch`
--


--
-- Table structure for table `os_core_v4b_addressbook_contact`
--

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
  aco_addr_phone1 varchar(15) default NULL,
  aco_addr_phone2 varchar(15) default NULL,
  aco_addr_mobile1 varchar(15) default NULL,
  aco_addr_mobile2 varchar(15) default NULL,
  aco_addr_fax1 varchar(15) default NULL,
  aco_addr_fax2 varchar(15) default NULL,
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
);

--
-- Dumping data for table `os_core_v4b_addressbook_contact`
--


--
-- Table structure for table `os_core_v4b_addressbook_contact_category`
--

CREATE TABLE os_core_v4b_addressbook_contact_category (
  acc_contact_id int(11) NOT NULL default '0',
  acc_category_cat_val varchar(64) NOT NULL default '',
  acc_obj_status char(1) NOT NULL default 'A',
  acc_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  acc_cr_uid int(11) NOT NULL default '0',
  acc_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  acc_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (acc_contact_id,acc_category_cat_val)
);

--
-- Dumping data for table `os_core_v4b_addressbook_contact_category`
--


--
-- Table structure for table `os_core_v4b_addressbook_favourite`
--

CREATE TABLE os_core_v4b_addressbook_favourite (
  afv_owner_uid int(11) NOT NULL default '0',
  afv_contact_id int(11) NOT NULL default '0',
  avf_obj_status char(1) NOT NULL default 'A',
  avf_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  avf_cr_uid int(11) NOT NULL default '0',
  avf_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  avf_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (afv_owner_uid,afv_contact_id)
);

--
-- Dumping data for table `os_core_v4b_addressbook_favourite`
--


--
-- Table structure for table `os_core_v4b_categories_category`
--

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
);

--
-- Dumping data for table `os_core_v4b_categories_category`
--

INSERT INTO os_core_v4b_categories_category VALUES (1,0,'__SYSTEM__','-1',0,'','','','','','','','','','','','','v4bCategories::','/__SYSTEM__','/1','A','A','2005-09-03 19:20:17',2,'2005-09-03 19:20:17',2);
INSERT INTO os_core_v4b_categories_category VALUES (2,1,'Modules','-1',0,'a:2:{s:3:\"deu\";s:6:\"Module\";s:3:\"eng\";s:7:\"Modules\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules','/1/2','A','A','2004-12-16 20:12:35',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (3,2,'Projectmanagement','-1',0,'a:2:{s:3:\"deu\";s:17:\"Projektmanagement\";s:3:\"eng\";s:18:\"Project Management\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement','/1/2/3','A','A','2004-12-16 20:14:48',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (4,3,'Projects','-1',0,'a:2:{s:3:\"deu\";s:8:\"Projekte\";s:3:\"eng\";s:8:\"Projects\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/Projects','/1/2/3/4','A','A','2004-12-16 20:15:10',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (5,4,'Priority','-1',0,'a:2:{s:3:\"deu\";s:9:\"Priorität\";s:3:\"eng\";s:8:\"Priority\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Priority','/1/2/3/4/5','A','A','2004-12-16 20:29:02',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (6,5,'1 - Highest','10',10,'a:2:{s:3:\"eng\";s:7:\"Highest\";s:3:\"deu\";s:7:\"Höchste\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Priority/1 - Highest','/1/2/3/4/5/6','A','A','2004-12-16 20:31:37',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (7,5,'2 - High','20',20,'a:2:{s:3:\"deu\";s:4:\"Hoch\";s:3:\"eng\";s:4:\"High\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Priority/2 - High','/1/2/3/4/5/7','A','A','2004-12-16 20:32:16',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (8,5,'3 - Medium','30',30,'a:2:{s:3:\"deu\";s:6:\"Normal\";s:3:\"eng\";s:6:\"Medium\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Priority/3 - Medium','/1/2/3/4/5/8','A','A','2004-12-16 20:32:56',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (9,5,'4 - Low','40',40,'a:2:{s:3:\"deu\";s:7:\"Niedrig\";s:3:\"eng\";s:3:\"Low\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Priority/4 - Low','/1/2/3/4/5/9','A','A','2004-12-16 20:33:41',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (10,5,'5 - Lowest','50',50,'a:2:{s:3:\"deu\";s:10:\"Niedrigste\";s:3:\"eng\";s:6:\"Lowest\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Priority/5 - Lowest','/1/2/3/4/5/10','A','A','2004-12-16 20:34:05',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (11,4,'Status','-1',0,'a:2:{s:3:\"deu\";s:6:\"Status\";s:3:\"eng\";s:6:\"Status\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','-1','IsActive','-1','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Status','/1/2/3/4/11','A','A','2004-12-21 23:18:58',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (12,11,'1 - Not Yet Commenced','NOTCOMMENCED',0,'a:2:{s:3:\"deu\";s:21:\"Noch nicht angefangen\";s:3:\"eng\";s:17:\"Not yet commenced\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Status/1 - Not Yet Commenced','/1/2/3/4/11/12','A','A','2004-12-21 23:22:06',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (13,11,'2 - Commenced','COMMENCED',0,'a:2:{s:3:\"deu\";s:10:\"Angefangen\";s:3:\"eng\";s:9:\"Commenced\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/Projects/Status/2 - Commenced','/1/2/3/4/11/13','A','A','2004-12-21 23:23:34',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (14,11,'3 - Finished','FINISHED',0,'a:2:{s:3:\"deu\";s:14:\"Fertiggestellt\";s:3:\"eng\";s:8:\"Finished\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','1','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Status/3 - Finished','/1/2/3/4/11/14','A','A','2004-12-21 23:24:43',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (15,11,'4 - Abgebrochen','CANCELLED',0,'a:2:{s:3:\"deu\";s:11:\"Abgebrochen\";s:3:\"eng\";s:9:\"Cancelled\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Status/4 - Abgebrochen','/1/2/3/4/11/15','A','A','2004-12-21 23:25:58',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (16,11,'5 - On Hold','ONHOLD',0,'a:2:{s:3:\"deu\";s:10:\"Angehalten\";s:3:\"eng\";s:7:\"On Hold\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Status/5 - On Hold','/1/2/3/4/11/16','A','A','2004-12-21 23:27:07',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (17,3,'Todos','-1',0,'a:2:{s:3:\"deu\";s:5:\"Todos\";s:3:\"eng\";s:5:\"Todos\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/Todos','/1/2/3/17','A','A','2004-12-26 18:39:22',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (18,31,'000 - 0%','0.0',0,'a:2:{s:3:\"deu\";s:2:\"0%\";s:3:\"eng\";s:2:\"0%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/000 - 0%','/1/2/3/17/31/18','A','A','2004-12-26 18:49:09',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (19,31,'010 - 10%','0.1',0,'a:2:{s:3:\"deu\";s:3:\"10%\";s:3:\"eng\";s:3:\"10%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/010 - 10%','/1/2/3/17/31/19','A','A','2004-12-26 18:50:34',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (20,31,'020 - 20%','0.2',0,'a:2:{s:3:\"deu\";s:3:\"20%\";s:3:\"eng\";s:3:\"20%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/020 - 20%','/1/2/3/17/31/20','A','A','2004-12-26 18:51:26',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (21,31,'030 - 30%','0.3',0,'a:2:{s:3:\"deu\";s:3:\"30%\";s:3:\"eng\";s:3:\"30%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/030 - 30%','/1/2/3/17/31/21','A','A','2004-12-26 18:52:13',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (22,31,'040 - 40%','0.4',0,'a:2:{s:3:\"deu\";s:3:\"40%\";s:3:\"eng\";s:3:\"40%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/040 - 40%','/1/2/3/17/31/22','A','A','2004-12-26 18:53:24',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (23,31,'050 - 50%','0.5',0,'a:2:{s:3:\"deu\";s:3:\"50%\";s:3:\"eng\";s:3:\"50%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/050 - 50%','/1/2/3/17/31/23','A','A','2004-12-26 18:53:46',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (24,31,'060 - 60%','0.6',0,'a:2:{s:3:\"deu\";s:3:\"60%\";s:3:\"eng\";s:3:\"60%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/060 - 60%','/1/2/3/17/31/24','A','A','2004-12-26 18:54:32',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (25,31,'070 - 70%','0.7',0,'a:2:{s:3:\"deu\";s:3:\"70%\";s:3:\"eng\";s:3:\"70%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/070 - 70%','/1/2/3/17/31/25','A','A','2004-12-26 18:55:05',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (26,31,'080 - 80%','0.8',0,'a:2:{s:3:\"deu\";s:3:\"80%\";s:3:\"eng\";s:3:\"80%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/080 - 80%','/1/2/3/17/31/26','A','A','2004-12-26 18:55:28',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (27,31,'090 - 90%','0.9',0,'a:2:{s:3:\"deu\";s:3:\"90%\";s:3:\"eng\";s:3:\"90%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/090 - 90%','/1/2/3/17/31/27','A','A','2004-12-26 18:55:57',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (28,31,'100 - 100%','1',0,'a:2:{s:3:\"deu\";s:4:\"100%\";s:3:\"eng\";s:4:\"100%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','1','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/100 - 100%','/1/2/3/17/31/28','A','A','2004-12-26 18:56:31',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (29,31,'110 - OnHold','OnHold',0,'a:2:{s:3:\"deu\";s:10:\"Angehalten\";s:3:\"eng\";s:7:\"On Hold\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/110 - OnHold','/1/2/3/17/31/29','A','A','2004-12-26 18:57:32',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (30,31,'120 - Cancelled','Cancelled',0,'a:2:{s:3:\"deu\";s:11:\"Abgebrochen\";s:3:\"eng\";s:9:\"Cancelled\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status/120 - Cancelled','/1/2/3/17/31/30','A','A','2004-12-26 18:58:14',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (31,17,'Status','-1',0,'a:2:{s:3:\"deu\";s:6:\"Status\";s:3:\"eng\";s:6:\"Status\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','-1','IsActive','-1','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Status','/1/2/3/17/31','A','A','2004-12-26 19:07:30',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (32,17,'Priority','-1',0,'a:2:{s:3:\"deu\";s:9:\"Priorität\";s:3:\"eng\";s:8:\"Priority\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Priority','/1/2/3/17/32','A','A','2005-01-04 20:32:10',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (33,32,'1 - Highest','10',10,'a:2:{s:3:\"deu\";s:7:\"Höchste\";s:3:\"eng\";s:7:\"Highest\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Priority/1 - Highest','/1/2/3/17/32/33','A','A','2005-01-04 20:32:10',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (34,32,'2 - High','20',20,'a:2:{s:3:\"deu\";s:4:\"Hoch\";s:3:\"eng\";s:4:\"High\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Priority/2 - High','/1/2/3/17/32/34','A','A','2005-01-04 20:32:10',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (35,32,'3 - Medium','30',30,'a:2:{s:3:\"deu\";s:6:\"Normal\";s:3:\"eng\";s:6:\"Medium\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Priority/3 - Medium','/1/2/3/17/32/35','A','A','2005-01-04 20:32:10',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (36,32,'4 - Low','40',40,'a:2:{s:3:\"deu\";s:7:\"Niedrig\";s:3:\"eng\";s:3:\"Low\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Priority/4 - Low','/1/2/3/17/32/36','A','A','2005-01-04 20:32:10',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (37,32,'5 - Lowest','50',50,'a:2:{s:3:\"deu\";s:10:\"Niedrigste\";s:3:\"eng\";s:6:\"Lowest\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Priority/5 - Lowest','/1/2/3/17/32/37','A','A','2005-01-04 20:32:10',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (38,47,'Tasks','-1',0,'a:2:{s:3:\"deu\";s:11:\"Tätigkeiten\";s:3:\"eng\";s:5:\"Tasks\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks','/1/2/3/47/38','A','A','2005-01-04 23:33:24',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (40,38,'Analysis','ANA',0,'a:2:{s:3:\"deu\";s:7:\"Analyse\";s:3:\"eng\";s:8:\"Analysis\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Analysis','/1/2/3/47/38/40','A','A','2005-01-04 23:35:56',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (41,38,'Design','DES',0,'a:2:{s:3:\"deu\";s:6:\"Design\";s:3:\"eng\";s:6:\"Design\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Design','/1/2/3/47/38/41','A','A','2005-01-04 23:36:32',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (42,38,'Implementation','IMP',0,'a:2:{s:3:\"deu\";s:15:\"Implementierung\";s:3:\"eng\";s:14:\"Implementation\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Implementation','/1/2/3/47/38/42','A','A','2005-01-04 23:37:11',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (43,38,'Documentation','DOC',0,'a:2:{s:3:\"deu\";s:13:\"Dokumentation\";s:3:\"eng\";s:13:\"Documentation\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Documentation','/1/2/3/47/38/43','A','A','2005-01-04 23:38:13',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (44,38,'Bug Fixing','BUG',0,'a:2:{s:3:\"deu\";s:14:\"Fehlerbehebung\";s:3:\"eng\";s:10:\"Bug Fixing\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Bug Fixing','/1/2/3/47/38/44','A','A','2005-01-04 23:39:53',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (45,38,'Support','SUP',0,'a:2:{s:3:\"deu\";s:7:\"Support\";s:3:\"eng\";s:7:\"Support\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Support','/1/2/3/47/38/45','A','A','2005-01-04 23:40:24',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (46,38,'Research','RES',0,'a:2:{s:3:\"deu\";s:9:\"Forschung\";s:3:\"eng\";s:8:\"Research\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Tasks/Research','/1/2/3/47/38/46','A','A','2005-01-04 23:44:22',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (47,3,'General','-1',0,'a:2:{s:3:\"deu\";s:9:\"Allgemein\";s:3:\"eng\";s:7:\"General\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General','/1/2/3/47','A','A','2005-01-05 12:57:15',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (48,47,'Customer Status','-1',0,'a:2:{s:3:\"deu\";s:12:\"Kundenstatus\";s:3:\"eng\";s:15:\"Customer Status\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Customer Status','/1/2/3/47/48','A','A','2005-01-05 12:59:09',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (49,48,'Prospect','P',0,'a:2:{s:3:\"deu\";s:8:\"Prospect\";s:3:\"eng\";s:8:\"Prospect\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Customer Status/Prospect','/1/2/3/47/48/49','A','A','2005-01-05 13:01:12',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (50,48,'Negotations','N',0,'a:2:{s:3:\"deu\";s:14:\"In Verhandlung\";s:3:\"eng\";s:15:\"In Negotiations\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Customer Status/Negotations','/1/2/3/47/48/50','A','A','2005-01-05 13:02:14',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (51,48,'Customer','C',0,'a:2:{s:3:\"deu\";s:5:\"Kunde\";s:3:\"eng\";s:8:\"Customer\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Customer Status/Customer','/1/2/3/47/48/51','A','A','2005-01-05 13:02:48',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (52,48,'Ex Customer','E',0,'a:2:{s:3:\"deu\";s:8:\"Ex Kunde\";s:3:\"eng\";s:11:\"Ex Customer\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Customer Status/Ex Customer','/1/2/3/47/48/52','A','A','2005-01-05 13:04:12',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (53,48,'Defunct','D',0,'a:2:{s:3:\"deu\";s:9:\"Insolvent\";s:3:\"eng\";s:7:\"Defunct\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Customer Status/Defunct','/1/2/3/47/48/53','A','A','2005-01-05 13:04:39',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (54,47,'Project Report Status','-1',0,'a:2:{s:3:\"eng\";s:21:\"Project Report Status\";s:3:\"deu\";s:21:\"Project Report Status\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status','/1/2/3/47/54','A','A','2005-01-05 13:07:16',2,'2005-07-03 14:07:14',2);
INSERT INTO os_core_v4b_categories_category VALUES (55,54,'1 - Green','#00FF00',10,'a:2:{s:3:\"eng\";s:5:\"Green\";s:3:\"deu\";s:4:\"Grün\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status/1 - Green','/1/2/3/47/54/55','A','A','2005-01-05 13:09:07',2,'2005-07-03 14:08:31',2);
INSERT INTO os_core_v4b_categories_category VALUES (56,54,'2 - Green Yellow','#80FF00',20,'a:2:{s:3:\"eng\";s:11:\"Geen-Yellow\";s:3:\"deu\";s:9:\"Grün-Gelb\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status/2 - Green Yellow','/1/2/3/47/54/56','A','A','2005-01-05 13:09:51',2,'2005-07-03 14:08:38',2);
INSERT INTO os_core_v4b_categories_category VALUES (57,54,'3 - Yellow','#FFFF00',30,'a:2:{s:3:\"eng\";s:6:\"Yellow\";s:3:\"deu\";s:4:\"Gelb\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status/3 - Yellow','/1/2/3/47/54/57','A','A','2005-01-05 13:10:13',2,'2005-07-03 14:08:46',2);
INSERT INTO os_core_v4b_categories_category VALUES (58,54,'4 - Yellow Red','#FF8000',40,'a:2:{s:3:\"eng\";s:10:\"Yellow-Red\";s:3:\"deu\";s:8:\"Gelb-Rot\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status/4 - Yellow Red','/1/2/3/47/54/58','A','A','2005-01-05 13:11:07',2,'2005-07-03 14:09:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (59,54,'5 - Red','#FF0000',50,'a:2:{s:3:\"eng\";s:3:\"Red\";s:3:\"deu\";s:3:\"Rot\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status/5 - Red','/1/2/3/47/54/59','A','A','2005-01-05 13:11:43',2,'2005-07-03 14:09:33',2);
INSERT INTO os_core_v4b_categories_category VALUES (60,54,'6 - Black','#000000',60,'a:2:{s:3:\"eng\";s:5:\"Black\";s:3:\"deu\";s:7:\"Schwarz\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Project Report Status/6 - Black','/1/2/3/47/54/60','A','A','2005-01-05 13:12:26',2,'2005-07-03 14:09:55',2);
INSERT INTO os_core_v4b_categories_category VALUES (61,1,'General','-1',0,'a:2:{s:3:\"deu\";s:9:\"Allgemein\";s:3:\"eng\";s:7:\"General\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General','/1/61','A','A','2005-01-05 13:13:49',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (62,61,'YesNo','-1',0,'a:2:{s:3:\"deu\";s:7:\"Ja/Nein\";s:3:\"eng\";s:6:\"Yes/No\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/YesNo','/1/61/62','A','A','2005-01-05 13:14:39',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (63,62,'1 - Yes','Y',1,'b:0;','b:0;','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/YesNo/1 - Yes','/1/61/62/63','A','A','2005-01-05 13:15:04',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (64,62,'2 - No','N',2,'b:0;','b:0;','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/YesNo/2 - No','/1/61/62/64','A','A','2005-01-05 13:15:19',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (65,47,'Travel','-1',0,'a:2:{s:3:\"deu\";s:7:\"Anreise\";s:3:\"eng\";s:6:\"Travel\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Travel','/1/2/3/47/65','A','A','2005-01-05 21:03:29',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (66,47,'Location','-1',0,'a:2:{s:3:\"deu\";s:3:\"Ort\";s:3:\"eng\";s:8:\"Location\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Location','/1/2/3/47/66','A','A','2005-01-07 19:42:52',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (67,66,'3 - Customer Site','CUST',0,'a:2:{s:3:\"deu\";s:10:\"Kundensitz\";s:3:\"eng\";s:15:\"Customer Office\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsInternal','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Location/3 - Customer Site','/1/2/3/47/66/67','A','A','2005-01-07 19:46:00',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (68,66,'1 - Office','OFF',0,'a:2:{s:3:\"deu\";s:6:\"Office\";s:3:\"eng\";s:6:\"Office\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsInternal','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Location/1 - Office','/1/2/3/47/66/68','A','A','2005-01-07 19:46:41',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (69,66,'5 - Home','HOM',0,'a:2:{s:3:\"deu\";s:8:\"Zu Hause\";s:3:\"eng\";s:11:\"Home Office\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsInternal','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Location/5 - Home','/1/2/3/47/66/69','A','A','2005-01-07 19:48:07',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (70,66,'7 - Hotel','HOT',0,'a:2:{s:3:\"deu\";s:31:\"Reise (Flug, Bahn, Hotel, etc.)\";s:3:\"eng\";s:34:\"Travel (Plane, Train, Hotel, etc.)\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsInternal','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Location/7 - Hotel','/1/2/3/47/66/70','A','A','2005-01-07 19:49:50',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (71,65,'1 - Car','CAR',0,'a:2:{s:3:\"deu\";s:4:\"Auto\";s:3:\"eng\";s:3:\"Car\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Travel/1 - Car','/1/2/3/47/65/71','A','A','2005-01-07 20:03:22',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (72,65,'2 - Train','TRN',0,'a:2:{s:3:\"deu\";s:3:\"Zug\";s:3:\"eng\";s:5:\"Train\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Travel/2 - Train','/1/2/3/47/65/72','A','A','2005-01-07 20:04:03',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (73,65,'3 - Flight','FLI',0,'a:2:{s:3:\"deu\";s:4:\"Flug\";s:3:\"eng\";s:6:\"Flight\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/General/Travel/3 - Flight','/1/2/3/47/65/73','A','A','2005-01-07 20:05:11',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (74,4,'Graph Size','-1',0,'a:2:{s:3:\"deu\";s:6:\"Grösse\";s:3:\"eng\";s:4:\"Size\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Graph Size','/1/2/3/4/74','A','A','2005-01-28 16:16:07',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (77,74,'600','600',10,'a:2:{s:3:\"deu\";s:3:\"600\";s:3:\"eng\";s:3:\"600\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Graph Size/600','/1/2/3/4/74/77','A','A','2005-01-28 16:36:16',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (78,74,'800','800',20,'a:2:{s:3:\"deu\";s:3:\"800\";s:3:\"eng\";s:3:\"800\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Graph Size/800','/1/2/3/4/74/78','A','A','2005-01-28 16:36:26',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (79,74,'1000','1000',30,'a:2:{s:3:\"deu\";s:4:\"1000\";s:3:\"eng\";s:4:\"1000\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Graph Size/1000','/1/2/3/4/74/79','A','A','2005-01-28 16:36:45',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (80,74,'1400','1400',40,'a:2:{s:3:\"deu\";s:4:\"1400\";s:3:\"eng\";s:4:\"1400\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Graph Size/1400','/1/2/3/4/74/80','A','A','2005-01-28 16:37:08',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (81,74,'Full','0',50,'a:2:{s:3:\"deu\";s:12:\"Volle Grösse\";s:3:\"eng\";s:9:\"Full Size\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Graph Size/Full','/1/2/3/4/74/81','A','A','2005-01-28 16:37:44',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (82,4,'Category','-1',-1,'a:2:{s:3:\"deu\";s:9:\"Kateogrie\";s:3:\"eng\";s:8:\"Category\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Category','/1/2/3/4/82','A','A','2005-01-29 11:55:47',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (83,82,'SAP','SAP',0,'a:2:{s:3:\"deu\";s:3:\"SAP\";s:3:\"eng\";s:3:\"SAP\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Category/SAP','/1/2/3/4/82/83','A','A','2005-01-30 19:58:55',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (84,82,'IT-Analysis','ITA',0,'a:2:{s:3:\"deu\";s:10:\"IT-Analyse\";s:3:\"eng\";s:11:\"IT-Analysis\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Category/IT-Analysis','/1/2/3/4/82/84','A','A','2005-01-30 19:59:24',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (85,82,'Design','DES',0,'a:2:{s:3:\"deu\";s:6:\"Design\";s:3:\"eng\";s:6:\"Design\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Category/Design','/1/2/3/4/82/85','A','A','2005-01-30 19:59:50',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (86,82,'Project Management','PRO',0,'a:2:{s:3:\"deu\";s:17:\"Projektmanagement\";s:3:\"eng\";s:18:\"Project Management\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Category/Project Management','/1/2/3/4/82/86','A','A','2005-01-30 20:00:26',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (87,47,'Effort','-1',0,'a:2:{s:3:\"deu\";s:7:\"Aufwand\";s:3:\"eng\";s:6:\"Effort\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','AddStory','/__SYSTEM__/Modules/Projectmanagement/General/Effort','/1/2/3/47/87','A','A','2005-01-30 20:13:55',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (88,87,'4','4',4,'a:2:{s:3:\"deu\";s:9:\"4 Stunden\";s:3:\"eng\";s:7:\"4 Hours\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','AddStory','/__SYSTEM__/Modules/Projectmanagement/General/Effort/4','/1/2/3/47/87/88','A','A','2005-01-30 20:18:51',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (89,87,'8','8',8,'a:2:{s:3:\"deu\";s:9:\"8 Stunden\";s:3:\"eng\";s:7:\"8 Hours\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','AddStory','/__SYSTEM__/Modules/Projectmanagement/General/Effort/8','/1/2/3/47/87/89','A','A','2005-01-30 20:19:07',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (90,87,'10','10',10,'a:2:{s:3:\"deu\";s:10:\"10 Stunden\";s:3:\"eng\";s:8:\"10 Hours\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','AddStory','/__SYSTEM__/Modules/Projectmanagement/General/Effort/10','/1/2/3/47/87/90','A','A','2005-01-30 20:19:30',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (91,87,'12','12',12,'a:2:{s:3:\"deu\";s:10:\"12 Stunden\";s:3:\"eng\";s:9:\"12  Hours\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','AddStory','/__SYSTEM__/Modules/Projectmanagement/General/Effort/12','/1/2/3/47/87/91','A','A','2005-01-30 20:19:41',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (92,47,'Billing Rate','-1',-1,'a:2:{s:3:\"deu\";s:11:\"Stundensatz\";s:3:\"eng\";s:12:\"Billing Rate\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','-1','Rate','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Billing Rate','/1/2/3/47/92','A','A','2005-02-01 23:12:02',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (93,92,'R1','80',1,'a:2:{s:3:\"deu\";s:2:\"R1\";s:3:\"eng\";s:2:\"R1\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Billing Rate/R1','/1/2/3/47/92/93','A','A','2005-02-01 23:16:22',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (94,92,'R2','100',2,'a:2:{s:3:\"deu\";s:2:\"R2\";s:3:\"eng\";s:2:\"R2\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Billing Rate/R2','/1/2/3/47/92/94','A','A','2005-02-01 23:16:47',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (95,92,'R3','125',3,'a:2:{s:3:\"deu\";s:2:\"R3\";s:3:\"eng\";s:2:\"R3\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Billing Rate/R3','/1/2/3/47/92/95','A','A','2005-02-01 23:17:03',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (96,92,'R4','150',4,'a:2:{s:3:\"deu\";s:2:\"R4\";s:3:\"eng\";s:2:\"R4\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','-1','Rate','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Billing Rate/R4','/1/2/3/47/92/96','A','A','2005-02-01 23:17:21',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (97,2,'Contact','-1',0,'a:2:{s:3:\"deu\";s:20:\"Kontaktieren sie uns\";s:3:\"eng\";s:10:\"Contact us\";}','a:2:{s:3:\"deu\";s:89:\"Auf dieser Seite haben sie die Moeglichkeit unsere Abteilungen zu kontakieren. Bitte mis \";s:3:\"eng\";s:93:\"Here you can direct questions at our various departments. We will reply as soon as possible. \";}','','','','','','','','','','','v4bContact','/__SYSTEM__/Modules/Contact','/1/2/97','A','A','2005-02-07 22:06:15',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (98,97,'Marketing','info@value4business.com',0,'a:2:{s:3:\"deu\";s:9:\"Marketing\";s:3:\"eng\";s:9:\"Marketing\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bContact','/__SYSTEM__/Modules/Contact/Marketing','/1/2/97/98','A','A','2005-02-07 22:07:48',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (99,97,'Sales','sales@value4business.com',0,'a:2:{s:3:\"deu\";s:7:\"Verkauf\";s:3:\"eng\";s:5:\"Sales\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bContact','/__SYSTEM__/Modules/Contact/Sales','/1/2/97/99','A','A','2005-02-07 22:08:20',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (100,97,'Human Resources','hr@value4business.com',0,'a:2:{s:3:\"deu\";s:15:\"Human Resources\";s:3:\"eng\";s:15:\"Human Resources\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','','','','','','','','','','','v4bContact','/__SYSTEM__/Modules/Contact/Human Resources','/1/2/97/100','A','A','2005-02-07 22:08:57',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (101,2,'PgPages','-1',0,'a:2:{s:3:\"eng\";s:7:\"PgPages\";s:3:\"deu\";s:7:\"PgPages\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages','/1/2/101','A','A','2005-05-09 09:33:20',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (102,101,'Pages','-1',0,'a:2:{s:3:\"eng\";s:5:\"Pages\";s:3:\"deu\";s:6:\"Seiten\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Pages','/1/2/101/102','A','A','2005-05-09 09:48:42',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (103,101,'Publications','0',-1,'a:2:{s:3:\"eng\";s:12:\"Publications\";s:3:\"deu\";s:18:\"Veröffentlichungen\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Publications','/1/2/101/103','A','A','2005-05-09 09:49:20',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (104,101,'Translations','-1',0,'a:2:{s:3:\"eng\";s:12:\"Translations\";s:3:\"deu\";s:13:\"Übersetzungen\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Translations','/1/2/101/104','A','A','2005-05-09 09:50:11',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (105,104,'English','eng',0,'a:2:{s:3:\"eng\";s:7:\"English\";s:3:\"deu\";s:8:\"Englisch\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Translations/English','/1/2/101/104/105','A','A','2005-05-09 10:00:07',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (106,104,'German','deu',0,'a:2:{s:3:\"eng\";s:6:\"German\";s:3:\"deu\";s:7:\"Deutsch\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Translations/German','/1/2/101/104/106','A','A','2005-05-09 10:00:30',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (107,104,'Spanish','spa',0,'a:2:{s:3:\"eng\";s:7:\"Spanish\";s:3:\"deu\";s:8:\"Spanisch\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Translations/Spanish','/1/2/101/104/107','A','A','2005-05-09 10:00:51',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (108,102,'City - Barcelona','cty_barcelona',1,'a:2:{s:3:\"eng\";s:16:\"City - Barcelona\";s:3:\"deu\";s:17:\"Stadt - Barcelona\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Pages/City - Barcelona','/1/2/101/102/108','A','A','2005-05-09 11:18:56',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (109,102,'City - Amsterdam','cty_amsterdam',0,'a:2:{s:3:\"eng\";s:16:\"City - Amsterdam\";s:3:\"deu\";s:17:\"Stadt - Amsterdam\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Pages/City - Amsterdam','/1/2/101/102/109','A','A','2005-05-09 11:19:17',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (110,103,'Technical','manual',0,'a:2:{s:3:\"eng\";s:16:\"Technical Manual\";s:3:\"deu\";s:16:\"Technisches Buch\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Publications/Technical','/1/2/101/103/110','A','A','2005-05-15 17:17:55',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (111,103,'Cities','cities',0,'a:2:{s:3:\"eng\";s:15:\"European Cities\";s:3:\"deu\";s:17:\"Euopäische Städte\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bPgPages','/__SYSTEM__/Modules/PgPages/Publications/Cities','/1/2/101/103/111','A','A','2005-05-15 17:18:52',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (112,61,'GenMod','-1',0,'a:2:{s:3:\"eng\";s:15:\"Default Entries\";s:3:\"deu\";s:16:\"Default Einträge\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/GenMod','/1/61/112','A','A','2005-06-01 17:28:17',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (113,112,'1','1',1,'a:2:{s:3:\"eng\";s:23:\"This is a default value\";s:3:\"deu\";s:25:\"Dies ist ein default Wert\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/GenMod/1','/1/61/112/113','A','A','2005-06-01 17:29:16',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (114,112,'2','2',2,'a:2:{s:3:\"eng\";s:35:\"You need to further customize this!\";s:3:\"deu\";s:32:\"Dies muss noch angepasst werden!\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bCategories','/__SYSTEM__/General/GenMod/2','/1/61/112/114','A','A','2005-06-01 17:29:53',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (115,4,'Completion','-1',0,'a:2:{s:3:\"eng\";s:6:\"% Done\";s:3:\"deu\";s:8:\"% Fertig\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','-1','IsFinished','','','','','','','','','v4bCategories','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion','/1/2/3/4/115','A','A','2005-06-10 16:00:27',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (116,115,'000 - 0%','0.0',0,'a:2:{s:3:\"deu\";s:2:\"0%\";s:3:\"eng\";s:2:\"0%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/000 - 0%','/1/2/3/4/115/116','A','A','2004-12-26 18:49:09',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (117,115,'010 - 10%','0.1',0,'a:2:{s:3:\"deu\";s:3:\"10%\";s:3:\"eng\";s:3:\"10%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/010 - 10%','/1/2/3/4/115/117','A','A','2004-12-26 18:50:34',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (118,115,'020 - 20%','0.2',0,'a:2:{s:3:\"deu\";s:3:\"20%\";s:3:\"eng\";s:3:\"20%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/020 - 20%','/1/2/3/4/115/118','A','A','2004-12-26 18:51:26',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (119,115,'030 - 30%','0.3',0,'a:2:{s:3:\"deu\";s:3:\"30%\";s:3:\"eng\";s:3:\"30%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/030 - 30%','/1/2/3/4/115/119','A','A','2004-12-26 18:52:13',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (120,115,'040 - 40%','0.4',0,'a:2:{s:3:\"deu\";s:3:\"40%\";s:3:\"eng\";s:3:\"40%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/040 - 40%','/1/2/3/4/115/120','A','A','2004-12-26 18:53:24',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (121,115,'050 - 50%','0.5',0,'a:2:{s:3:\"deu\";s:3:\"50%\";s:3:\"eng\";s:3:\"50%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/050 - 50%','/1/2/3/4/115/121','A','A','2004-12-26 18:53:46',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (122,115,'060 - 60%','0.6',0,'a:2:{s:3:\"deu\";s:3:\"60%\";s:3:\"eng\";s:3:\"60%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/060 - 60%','/1/2/3/4/115/122','A','A','2004-12-26 18:54:32',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (123,115,'070 - 70%','0.7',0,'a:2:{s:3:\"deu\";s:3:\"70%\";s:3:\"eng\";s:3:\"70%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/070 - 70%','/1/2/3/4/115/123','A','A','2004-12-26 18:55:05',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (124,115,'080 - 80%','0.8',0,'a:2:{s:3:\"deu\";s:3:\"80%\";s:3:\"eng\";s:3:\"80%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/080 - 80%','/1/2/3/4/115/124','A','A','2004-12-26 18:55:28',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (125,115,'090 - 90%','0.9',0,'a:2:{s:3:\"deu\";s:3:\"90%\";s:3:\"eng\";s:3:\"90%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','1','IsActive','0','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/090 - 90%','/1/2/3/4/115/125','A','A','2004-12-26 18:55:57',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (126,115,'100 - 100%','1',0,'a:2:{s:3:\"deu\";s:4:\"100%\";s:3:\"eng\";s:4:\"100%\";}','a:2:{s:3:\"deu\";s:0:\"\";s:3:\"eng\";s:0:\"\";}','0','IsActive','1','IsFinished','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Completion/100 - 100%','/1/2/3/4/115/126','A','A','2004-12-26 18:56:11',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (127,47,'Utilization Plan Months','-1',0,'a:2:{s:3:\"eng\";s:24:\"Kapazitätsplanungsmonate\";s:3:\"deu\";s:27:\"Utilization Planning Months\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','HaveSubmittedAll','0','Closed','0','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Utilization Plan Months','/1/2/3/47/127','A','A','2005-06-14 18:46:40',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (129,127,'2005 August','2005-08',2,'a:2:{s:3:\"eng\";s:11:\"August 2005\";s:3:\"deu\";s:11:\"August 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Utilization Plan Months/2005 August','/1/2/3/47/127/129','A','A','2005-06-14 18:52:30',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (130,127,'2005 September','2005-09',3,'a:2:{s:3:\"eng\";s:14:\"September 2005\";s:3:\"deu\";s:14:\"September 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Utilization Plan Months/2005 September','/1/2/3/47/127/130','A','A','2005-06-14 18:53:07',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (131,127,'2005 October','2005-10',4,'a:2:{s:3:\"eng\";s:12:\"October 2005\";s:3:\"deu\";s:12:\"Oktober 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Utilization Plan Months/2005 October','/1/2/3/47/127/131','A','A','2005-06-14 18:54:21',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (132,127,'2005 November','2005-11',5,'a:2:{s:3:\"eng\";s:13:\"November 2005\";s:3:\"deu\";s:13:\"November 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Utilization Plan Months/2005 November','/1/2/3/47/127/132','A','A','2005-06-14 18:54:48',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (133,127,'2005 December','2005-12',6,'a:2:{s:3:\"eng\";s:13:\"December 2005\";s:3:\"deu\";s:13:\"Dezember 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/General/Utilization Plan Months/2005 December','/1/2/3/47/127/133','A','A','2005-06-14 18:55:15',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (134,17,'Permissions','-1',0,'a:2:{s:3:\"eng\";s:11:\"Permissions\";s:3:\"deu\";s:6:\"Rechte\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Permissions','/1/2/3/17/134','A','A','2005-06-15 14:35:29',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (135,134,'Public','PUBLIC',0,'a:2:{s:3:\"eng\";s:6:\"Public\";s:3:\"deu\";s:10:\"Öffentlich\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Permissions/Public','/1/2/3/17/134/135','A','A','2005-06-15 14:36:08',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (136,134,'Private','PRIVATE',1,'a:2:{s:3:\"eng\";s:7:\"Private\";s:3:\"deu\";s:6:\"Privat\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Todos/Permissions/Private','/1/2/3/17/134/136','A','A','2005-06-15 14:36:23',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (137,47,'Status Report Months','-1',0,'a:2:{s:3:\"eng\";s:19:\"Status Report Month\";s:3:\"deu\";s:19:\"Status Report Monat\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','ActiveMenu','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months','/1/2/3/47/137','A','A','2005-06-15 18:40:40',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (138,137,'2005 July','200507',0,'a:2:{s:3:\"eng\";s:9:\"July 2005\";s:3:\"deu\";s:9:\"Juli 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects::','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months/2005 July','/1/2/3/47/137/138','A','A','2005-06-16 17:12:19',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (139,137,'2005 August','200508',1,'a:2:{s:3:\"eng\";s:11:\"August 2005\";s:3:\"deu\";s:11:\"August 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects::','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months/2005 August','/1/2/3/47/137/139','A','A','2005-06-16 17:12:37',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (140,137,'2005 September','200509',2,'a:2:{s:3:\"eng\";s:14:\"September 2005\";s:3:\"deu\";s:14:\"September 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects::','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months/2005 September','/1/2/3/47/137/140','A','A','2005-06-16 17:13:00',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (141,137,'2005 October','200510',3,'a:2:{s:3:\"eng\";s:12:\"October 2005\";s:3:\"deu\";s:12:\"Oktober 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects::','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months/2005 October','/1/2/3/47/137/141','A','A','2005-06-16 17:13:44',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (142,137,'2005 November','200511',4,'a:2:{s:3:\"eng\";s:13:\"November 2005\";s:3:\"deu\";s:13:\"November 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects::','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months/2005 November','/1/2/3/47/137/142','A','A','2005-06-16 17:14:17',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (143,137,'2005 December','200512',5,'a:2:{s:3:\"eng\";s:13:\"December 2005\";s:3:\"deu\";s:13:\"Dezember 2005\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','','','','','','','','','','','v4bProjects::','/__SYSTEM__/Modules/Projectmanagement/General/Status Report Months/2005 December','/1/2/3/47/137/143','A','A','2005-06-16 17:15:29',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (144,4,'Permissions','-1',0,'a:2:{s:3:\"eng\";s:11:\"Permissions\";s:3:\"deu\";s:6:\"Rechte\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','canRead','-1','canWrite','-1','canDelete','-1','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Permissions','/1/2/3/4/144','A','A','2005-06-16 17:36:19',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (145,144,'None','0',0,'a:2:{s:3:\"eng\";s:4:\"None\";s:3:\"deu\";s:6:\"Keines\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','canRead','0','canWrite','0','canDelete','0','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Permissions/None','/1/2/3/4/144/145','A','A','2005-06-16 17:37:53',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (146,144,'Read','10',10,'a:2:{s:3:\"eng\";s:4:\"Read\";s:3:\"deu\";s:5:\"Lesen\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','canRead','1','canWrite','0','canDelete','0','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Permissions/Read','/1/2/3/4/144/146','A','A','2005-06-16 17:38:22',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (147,144,'Write','20',20,'a:2:{s:3:\"eng\";s:5:\"Write\";s:3:\"deu\";s:9:\"Schreiben\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','canRead','1','canWrite','1','canDelete','0','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Permissions/Write','/1/2/3/4/144/147','A','A','2005-06-16 17:38:56',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (148,144,'Delete','30',30,'a:2:{s:3:\"eng\";s:6:\"Delete\";s:3:\"deu\";s:7:\"Löschen\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','canRead','1','canWrite','1','canDelete','1','','','','','v4bProjects','/__SYSTEM__/Modules/Projectmanagement/Projects/Permissions/Delete','/1/2/3/4/144/148','A','A','2005-06-16 17:39:57',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (149,61,'Pending Status','-1',0,'a:2:{s:3:\"eng\";s:14:\"Pending Status\";s:3:\"deu\";s:19:\"Neue Inhalte Status\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','-1','IsApproved','-1','IsPublished','-1','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status','/1/61/149','A','A','2005-06-18 11:50:12',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (150,149,'Pending','P',0,'a:2:{s:3:\"eng\";s:7:\"Pending\";s:3:\"deu\";s:7:\"Wartend\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','1','IsApproved','0','IsPublished','0','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status/Pending','/1/61/149/150','A','A','2005-06-18 11:51:00',2,'2005-06-30 22:04:05',2);
INSERT INTO os_core_v4b_categories_category VALUES (151,149,'Checked','C',1,'a:2:{s:3:\"eng\";s:7:\"Checked\";s:3:\"deu\";s:12:\"Kontrolliert\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','0','IsApproved','0','IsPublished','0','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status/Checked','/1/61/149/151','A','A','2005-06-18 11:52:06',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (152,149,'Approved','A',3,'a:2:{s:3:\"eng\";s:8:\"Approved\";s:3:\"deu\";s:9:\"Genehmigt\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','0','IsApproved','1','IsPublished','0','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status/Approved','/1/61/149/152','A','A','2005-06-18 11:52:38',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (153,149,'Online','O',5,'a:2:{s:3:\"eng\";s:6:\"Online\";s:3:\"deu\";s:6:\"Online\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','0','IsApproved','1','IsPublished','1','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status/Online','/1/61/149/153','A','A','2005-06-18 11:53:14',2,'2005-06-30 22:04:06',2);
INSERT INTO os_core_v4b_categories_category VALUES (154,149,'Rejected','R',4,'a:2:{s:3:\"eng\";s:8:\"Rejected\";s:3:\"deu\";s:9:\"Abgelehnt\";}','a:2:{s:3:\"eng\";s:0:\"\";s:3:\"deu\";s:0:\"\";}','IsPending','0','IsApproved','0','IsPublished','0','','','','','v4bCategories::','/__SYSTEM__/General/Pending Status/Rejected','/1/61/149/154','A','A','2005-06-18 12:00:20',2,'2005-06-30 22:04:06',2);

--
-- Table structure for table `os_core_v4b_newcontent`
--

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
);

--
-- Dumping data for table `os_core_v4b_newcontent`
--


--
-- Table structure for table `os_core_v4b_newcontent_userprefs`
--

CREATE TABLE os_core_v4b_newcontent_userprefs (
  ncpref_owner_uid int(11) NOT NULL default '0',
  ncpref_content text,
  ncpref_obj_status char(1) NOT NULL default 'A',
  ncpref_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  ncpref_cr_uid int(11) NOT NULL default '0',
  ncpref_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  ncpref_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (ncpref_owner_uid)
);

--
-- Dumping data for table `os_core_v4b_newcontent_userprefs`
--


--
-- Table structure for table `os_core_v4b_objectdata_attributes`
--

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
);

--
-- Dumping data for table `os_core_v4b_objectdata_attributes`
--


--
-- Table structure for table `os_core_v4b_objectdata_log`
--

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
);

--
-- Dumping data for table `os_core_v4b_objectdata_log`
--


--
-- Table structure for table `os_core_v4b_pgpages_pages`
--

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
);

--
-- Dumping data for table `os_core_v4b_pgpages_pages`
--


--
-- Table structure for table `os_core_v4b_pgpages_pubpages`
--

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
);

--
-- Dumping data for table `os_core_v4b_pgpages_pubpages`
--


--
-- Table structure for table `os_core_v4b_projects_changelog`
--

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
);

--
-- Dumping data for table `os_core_v4b_projects_changelog`
--


--
-- Table structure for table `os_core_v4b_projects_customer`
--

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
);

--
-- Dumping data for table `os_core_v4b_projects_customer`
--


--
-- Table structure for table `os_core_v4b_projects_milestone`
--

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
);

--
-- Dumping data for table `os_core_v4b_projects_milestone`
--


--
-- Table structure for table `os_core_v4b_projects_permission`
--

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
);

--
-- Dumping data for table `os_core_v4b_projects_permission`
--


--
-- Table structure for table `os_core_v4b_projects_project`
--

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
);

--
-- Dumping data for table `os_core_v4b_projects_project`
--


--
-- Table structure for table `os_core_v4b_projects_statusreport`
--

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
);

--
-- Dumping data for table `os_core_v4b_projects_statusreport`
--


--
-- Table structure for table `os_core_v4b_projects_timetracker`
--

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
);

--
-- Dumping data for table `os_core_v4b_projects_timetracker`
--


--
-- Table structure for table `os_core_v4b_projects_todo`
--

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
);

--
-- Dumping data for table `os_core_v4b_projects_todo`
--


--
-- Table structure for table `os_core_v4b_projects_utilization`
--

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
);

--
-- Dumping data for table `os_core_v4b_projects_utilization`
--


--
-- Table structure for table `os_core_v4b_rbs_category`
--

CREATE TABLE os_core_v4b_rbs_category (
  rbc_id int(11) unsigned NOT NULL auto_increment,
  rbc_name varchar(80) NOT NULL default '',
  rbc_is_default int(1) default '0',
  rbc_needs_approval int(1) default '0',
  rbc_admin_group_id int(11) default '0',
  rbc_obj_status char(1) NOT NULL default 'A',
  rbc_cr_date datetime NOT NULL default '0000-00-00 00:00:00',
  rbc_cr_uid int(11) NOT NULL default '0',
  rbc_lu_date datetime NOT NULL default '0000-00-00 00:00:00',
  rbc_lu_uid int(11) NOT NULL default '0',
  PRIMARY KEY  (rbc_id)
);

--
-- Dumping data for table `os_core_v4b_rbs_category`
--


--
-- Table structure for table `os_core_v4b_rbs_entry`
--

CREATE TABLE os_core_v4b_rbs_entry (
  rbe_id int(11) unsigned NOT NULL auto_increment,
  rbe_repeat_id int(11) default NULL,
  rbe_category_id int(11) NOT NULL default '0',
  rbe_resource_id int(11) NOT NULL default '0',
  rbe_subject varchar(80) NOT NULL default '',
  rbe_description varchar(255) NOT NULL default '',
  rbe_startdate datetime NOT NULL default '0000-00-00 00:00:00',
  rbe_enddate datetime NOT NULL default '0000-00-00 00:00:00',
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
);

--
-- Dumping data for table `os_core_v4b_rbs_entry`
--


--
-- Table structure for table `os_core_v4b_rbs_repeat`
--

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
);

--
-- Dumping data for table `os_core_v4b_rbs_repeat`
--


--
-- Table structure for table `os_core_v4b_rbs_resource`
--

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
);

--
-- Dumping data for table `os_core_v4b_rbs_resource`
--


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

