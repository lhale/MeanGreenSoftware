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
  KEY timestamp (pn_timestamp),
  KEY username (pn_uname),
  KEY sessionid (pn_sessionid)
) TYPE=MyISAM;

--
-- Dumping data for table `os_core_stats_archive`
--


--
-- Table structure for table `os_core_stats_date`
--

DROP TABLE IF EXISTS os_core_stats_date;
CREATE TABLE os_core_stats_date (
  pn_date varchar(80) NOT NULL default '',
  pn_hits int(11) unsigned NOT NULL default '0'
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_stats_date`
--

INSERT INTO os_core_stats_date VALUES ('03022005',2);

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
  KEY timestamp (pn_timestamp),
  KEY username (pn_uname),
  KEY sessionid (pn_sessionid)
) TYPE=MyISAM;

--
-- Dumping data for table `os_core_stats_details`
--


--
-- Table structure for table `os_core_stats_hour`
--

DROP TABLE IF EXISTS os_core_stats_hour;
CREATE TABLE os_core_stats_hour (
  pn_hour tinyint(2) unsigned NOT NULL default '0',
  pn_hits int(11) unsigned NOT NULL default '0'
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_stats_hour`
--

INSERT INTO os_core_stats_hour VALUES (0,0);
INSERT INTO os_core_stats_hour VALUES (1,0);
INSERT INTO os_core_stats_hour VALUES (2,0);
INSERT INTO os_core_stats_hour VALUES (3,0);
INSERT INTO os_core_stats_hour VALUES (4,0);
INSERT INTO os_core_stats_hour VALUES (5,0);
INSERT INTO os_core_stats_hour VALUES (6,0);
INSERT INTO os_core_stats_hour VALUES (7,0);
INSERT INTO os_core_stats_hour VALUES (8,0);
INSERT INTO os_core_stats_hour VALUES (9,0);
INSERT INTO os_core_stats_hour VALUES (10,0);
INSERT INTO os_core_stats_hour VALUES (11,0);
INSERT INTO os_core_stats_hour VALUES (12,0);
INSERT INTO os_core_stats_hour VALUES (13,0);
INSERT INTO os_core_stats_hour VALUES (14,0);
INSERT INTO os_core_stats_hour VALUES (15,0);
INSERT INTO os_core_stats_hour VALUES (16,0);
INSERT INTO os_core_stats_hour VALUES (17,0);
INSERT INTO os_core_stats_hour VALUES (18,0);
INSERT INTO os_core_stats_hour VALUES (19,0);
INSERT INTO os_core_stats_hour VALUES (20,0);
INSERT INTO os_core_stats_hour VALUES (21,0);
INSERT INTO os_core_stats_hour VALUES (22,0);
INSERT INTO os_core_stats_hour VALUES (23,2);

--
-- Table structure for table `os_core_stats_month`
--

DROP TABLE IF EXISTS os_core_stats_month;
CREATE TABLE os_core_stats_month (
  pn_month tinyint(2) unsigned NOT NULL default '0',
  pn_hits int(11) unsigned NOT NULL default '0'
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_stats_month`
--

INSERT INTO os_core_stats_month VALUES (1,0);
INSERT INTO os_core_stats_month VALUES (2,2);
INSERT INTO os_core_stats_month VALUES (3,0);
INSERT INTO os_core_stats_month VALUES (4,0);
INSERT INTO os_core_stats_month VALUES (5,0);
INSERT INTO os_core_stats_month VALUES (6,0);
INSERT INTO os_core_stats_month VALUES (7,0);
INSERT INTO os_core_stats_month VALUES (8,0);
INSERT INTO os_core_stats_month VALUES (9,0);
INSERT INTO os_core_stats_month VALUES (10,0);
INSERT INTO os_core_stats_month VALUES (11,0);
INSERT INTO os_core_stats_month VALUES (12,0);

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
) TYPE=MyISAM;

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
  KEY timestamp (pn_timestamp),
  KEY username (pn_uname),
  KEY sessionid (pn_sessionid)
) TYPE=MyISAM;

--
-- Dumping data for table `os_core_stats_summary`
--


--
-- Table structure for table `os_core_stats_week`
--

DROP TABLE IF EXISTS os_core_stats_week;
CREATE TABLE os_core_stats_week (
  pn_weekday tinyint(1) unsigned NOT NULL default '0',
  pn_hits int(11) unsigned NOT NULL default '0'
) TYPE=InnoDB;

--
-- Dumping data for table `os_core_stats_week`
--

INSERT INTO os_core_stats_week VALUES (0,0);
INSERT INTO os_core_stats_week VALUES (1,0);
INSERT INTO os_core_stats_week VALUES (2,0);
INSERT INTO os_core_stats_week VALUES (3,0);
INSERT INTO os_core_stats_week VALUES (4,2);
INSERT INTO os_core_stats_week VALUES (5,0);
INSERT INTO os_core_stats_week VALUES (6,0);

