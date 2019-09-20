#!/bin/sh
#
# Script to create and process a mysql dump
#
# As of mysql 4.1 some defaults have changed so we need some extra options ...
#

mysqldump --compatible=mysql40 --skip-opt --add-drop-table --quote-names=0 os4 -u root -p > t.sql
php fixdump.php t.sql

