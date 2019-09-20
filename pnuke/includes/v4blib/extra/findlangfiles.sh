#!/bin/sh
#

cd ../../..
find . -type f -name "*.php" | grep lang | grep -v svn | grep eng | sort > langfiles.txt
