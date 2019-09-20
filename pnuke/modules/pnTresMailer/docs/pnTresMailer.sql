--
-- Table structure for table 'nuke_nl_arch_subscriber' for module pnTresMailer version 5.95 - 6.00
--

CREATE TABLE nuke_nl_arch_subscriber (
  arch_mid int(11) NOT NULL default '0',
  sub_reg_id int(11) NOT NULL default '0',
  arch_date int(25) NOT NULL default '0',
  arch_read int(25) NOT NULL default '0'
) TYPE=MyISAM;

--
-- Dumping data for table 'nuke_nl_arch_subscriber'
--



--
-- Table structure for table 'nuke_nl_archive' for module pnTresMailer version 5.95 - 6.00
--

CREATE TABLE nuke_nl_archive (
  arch_mid int(11) NOT NULL auto_increment,
  arch_issue tinytext NOT NULL,
  arch_message longtext NOT NULL,
  arch_date int(25) NOT NULL default '0',
  PRIMARY KEY  (arch_mid)
) TYPE=MyISAM;

--
-- Dumping data for table 'nuke_nl_archive'
--



--
-- Table structure for table 'nuke_nl_archive_txt' for module pnTresMailer version 5.95 - 6.00
--

CREATE TABLE nuke_nl_archive_txt (
  arch_mid int(11) NOT NULL default '0',
  arch_issue tinytext NOT NULL,
  arch_message longtext NOT NULL,
  arch_date int(25) NOT NULL default '0',
  PRIMARY KEY  (arch_mid)
) TYPE=MyISAM;

--
-- Dumping data for table 'nuke_nl_archive_txt'
--



--
-- Table structure for table 'nuke_nl_modules' for module pnTresMailer version 5.95 - 6.00
--

CREATE TABLE nuke_nl_modules (
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
) TYPE=MyISAM;

--
-- Dumping data for table 'nuke_nl_modules'
--



--
-- Table structure for table 'nuke_nl_subscriber' for module pnTresMailer version 5.95 - 6.00
--

CREATE TABLE nuke_nl_subscriber (
  sub_reg_id int(11) NOT NULL auto_increment,
  sub_uid int(11) NOT NULL default '0',
  sub_name tinytext NOT NULL,
  sub_email tinytext NOT NULL,
  sub_last_date int(25) NOT NULL default '0',
  PRIMARY KEY  (sub_reg_id)
) TYPE=MyISAM;

--
-- Dumping data for table 'nuke_nl_subscriber'
--



--
-- Table structure for table 'nuke_nl_unsubscribe' for module pnTresMailer version 5.95 - 6.00
--

CREATE TABLE nuke_nl_unsubscribe (
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
) TYPE=MyISAM;

--
-- Dumping data for table 'nuke_nl_unsubscribe'
--



--
-- Table structure for table 'nuke_nl_var' for module pnTresMailer version 5.95 - 6.00
--

CREATE TABLE nuke_nl_var (
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
  nl_mail_server tinytext NOT NULL,
  nl_unreg int(5) NOT NULL default '0',
  nl_system int(5) NOT NULL default '0',
  nl_popup int(5) NOT NULL default '0',
  nl_popup_days int(5) NOT NULL default '10',
  nl_sample int(5) NOT NULL default '0',
  nl_loop_count int(5) NOT NULL default '5',
  nl_personal int(5) NOT NULL default '5',
  nl_resub int(5) NOT NULL default '1',
  PRIMARY KEY  (nl_var_id)
) TYPE=MyISAM;

--
-- Dumping data for table 'nuke_nl_var'
--


INSERT INTO nuke_nl_var VALUES (1,'Hello <!-- [USERNAME] -->.\r\n\r\nHere is this weeks newsletter.','Thanks for checking out our news.\r\n\r\nsincerely,\r\nwebmaster\r\n<!-- [TRACKER] -->','Our Newsletter','Your Site Name','you@your.address','http://www.yoursite.com','default/html.tpl','default/text.tpl',1,500,'localhost',0,0,0,10,0,5,1,1);