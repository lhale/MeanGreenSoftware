#!/bin/sh
#
# Script to correctly set the file permissions on a newly 
# checked out VIP directory tree
#

echo "Setting cache directory permissions for:"

echo Shell scripts
chmod -f a+rx *.sh *.php

cd ../../..

echo Fixing file and global permissions
chown apache:apache * 
find . -type d -print0 | xargs -0 chmod 755
find . -type f -print0 | xargs -0 chmod 644

for i in EZComments pnRender pagesetter 
do
	echo $i
	chmod -f a+wx modules/$i/pntemplates/cache/
	chmod -f a+wx modules/$i/pntemplates/compiled/
done

echo Fixing Permissions in Topics Images
chmod -f a+wx images/topics/

echo Fixing Permissions in Photoshare Images
chmod -f a+wx images/photoshare/

echo Fixing Permissions in CmodsDownload Upload
chmod -f a+wx modules/CmodsDownload/upload/
chmod -f a+wx modules/CmodsDownload/screenshots/
chmod -f a+wx modules/CmodsDownload/screenshots/*

echo Fixing Permissions in CmodsDownload Screenshots
chmod -f a+wx modules/CmodsDownload/screenshots/
chmod -f a+wx modules/CmodsDownload/screenshots/*

echo Fixing Permissions in v4bJournal img
chmod -f a+wx modules/v4bJournal/img/
chmod -f a+wx modules/v4bJournal/img/users/
chmod -f a+wx modules/v4bJournal/rss/

echo Fixing Permissions in v4bProjects Images
chmod -f a+wx modules/v4bProjects/tmpimages/

echo Fixing Permissions in v4bProjects Images
chmod -f a+wx modules/v4bProjects/tmpimages/

echo Fixing Permissions in pnTemp pnRender
chmod -f a+wx pnTemp/pnRender*

echo Fixing Permissions in pnTemp Xanthia
chmod -f a+wx pnTemp/Xanthia*

echo Fixing Permissions in Cron
chmod -f a+wx includes/v4blib/cron/cronjobs

echo Fixing Permissions for Authotheme config 
chmod -f a+wx modules/AutoTheme/autotheme.cfg

echo Fixing Permissions for postguestbook
chmod -f 777 postguestbook/smarty/templates_c

