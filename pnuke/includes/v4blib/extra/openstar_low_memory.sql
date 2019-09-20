UPDATE os_core_module_vars SET pn_value='s:4:\"News\";' WHERE pn_modname='/PNConfig' AND pn_name='startpage';
DELETE FROM os_core_blocks WHERE pn_bid>=13 AND pn_bid<26;
DELETE FROM os_core_v4b_newcontent; 
DELETE FROM os_core_v4b_newcontent_userprefs; 
