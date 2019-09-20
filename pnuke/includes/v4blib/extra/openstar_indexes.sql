--
-- This file supplements the regular table structure which 
-- results from the build of the OpenStar system.
--


--
-- Taken from 
-- http://centre.ics.uci.edu/~grape/modules.php?op=modload&name=Wiki&file=index&pagename=Performance%20Tips
--
ALTER TABLE os_core_comments ADD INDEX idx_pid (pn_pid);
ALTER TABLE os_core_comments ADD INDEX idx_sid (pn_sid);
ALTER TABLE os_core_group_membership ADD INDEX idx_ug (pn_uid,pn_gid);
ALTER TABLE os_core_message ADD INDEX idx_exp (pn_active,pn_expire);
ALTER TABLE os_core_modules ADD INDEX idx_name (pn_name);
ALTER TABLE os_core_poll_data ADD INDEX idx_pollid (pn_pollid);
ALTER TABLE os_core_pollcomments ADD INDEX idx_pollid (pn_pollid);
ALTER TABLE os_core_referer ADD INDEX idx_url (pn_url);
ALTER TABLE os_core_stats_details ADD INDEX idx_timestamp (pn_timestamp);
ALTER TABLE os_core_stats_details ADD INDEX idx_summary_timestamp (pn_summary_timestamp);
ALTER TABLE os_core_session_info ADD INDEX idx_last (pn_lastused);
ALTER TABLE os_core_stories ADD INDEX idx_catid (pn_catid);
ALTER TABLE os_core_stories ADD INDEX idx_topic (pn_topic);
ALTER TABLE os_core_user_data ADD INDEX idx_uid (pn_uda_uid);
ALTER TABLE os_core_userblocks ADD INDEX idx_ub (pn_uid,pn_bid);
ALTER TABLE os_core_users ADD INDEX idx_uname (pn_uname);



--
-- Taken from 
-- http://sourceforge.net/forum/forum.php?thread_id=898703&forum_id=47435
--
ALTER TABLE os_service_project_file_table ADD INDEX(`project_id`);
ALTER TABLE os_service_bug_file_table ADD INDEX(`date_added`);
ALTER TABLE os_service_bug_file_table ADD INDEX(`title`);
ALTER TABLE os_service_bug_file_table ADD INDEX(`bug_id`);
ALTER TABLE os_service_bug_history_table ADD INDEX(`bug_id`);
ALTER TABLE os_service_bug_history_table ADD INDEX(`user_id`);
ALTER TABLE os_service_bug_relationship_table ADD INDEX(`source_bug_id`);
ALTER TABLE os_service_bug_relationship_table ADD INDEX(`destination_bug_id`);
ALTER TABLE os_service_project_file_table ADD INDEX(`project_id`);
ALTER TABLE os_service_project_file_table ADD INDEX(`filename`);
ALTER TABLE os_service_project_file_table ADD INDEX(`date_added`);
ALTER TABLE os_service_bug_table ADD INDEX(`priority`);
ALTER TABLE os_service_bug_table ADD INDEX(`project_id`);
ALTER TABLE os_service_bug_table ADD INDEX(`reporter_id`);
ALTER TABLE os_service_bug_table ADD INDEX(`handler_id`);
ALTER TABLE os_service_bug_table ADD INDEX(`severity`);
ALTER TABLE os_service_bug_table ADD INDEX(`reproducibility`);
ALTER TABLE os_service_bug_table ADD INDEX(`status`);
ALTER TABLE os_service_bug_table ADD INDEX(`resolution`);
ALTER TABLE os_service_bug_table ADD INDEX(`projection`);
ALTER TABLE os_service_bug_table ADD INDEX(`category`);
ALTER TABLE os_service_bug_table ADD INDEX(`last_updated`);
ALTER TABLE os_service_bugnote_table ADD INDEX(`date_submitted`);
ALTER TABLE os_service_bugnote_table ADD INDEX(`view_state`);
ALTER TABLE os_service_bugnote_table ADD INDEX(`bug_id`);
ALTER TABLE os_service_news_table ADD INDEX(`headline`);
ALTER TABLE os_service_news_table ADD INDEX(`announcement`);
ALTER TABLE os_service_news_table ADD INDEX(`project_id`);
ALTER TABLE os_service_news_table ADD INDEX(`date_posted`);
ALTER TABLE os_service_project_table ADD INDEX(`enabled`);
ALTER TABLE os_service_project_table ADD INDEX(`view_state`);
ALTER TABLE os_service_project_table ADD INDEX(`access_min`);
ALTER TABLE os_service_project_user_list_table ADD INDEX(`user_id`);
ALTER TABLE os_service_project_user_list_table ADD INDEX(`access_level`);
ALTER TABLE os_service_project_user_list_table ADD INDEX(`project_id`);
ALTER TABLE os_service_user_table ADD INDEX(`username`);
ALTER TABLE os_service_user_table ADD INDEX(`date_created`);
ALTER TABLE os_service_user_table ADD INDEX(`last_visit`);
ALTER TABLE os_service_user_table ADD INDEX(`enabled`);
ALTER TABLE os_service_user_table ADD INDEX(`access_level`);
