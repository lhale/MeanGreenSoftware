#!/bin/sh
#
# Script to create a patch release
#

HOMEDIR=`pwd`
RELDIR=/tmp
cd ../../../../

echo "Press enter the release name"
read RELNAME

echo "Press enter to make an OpenStar release into [$RELDIR]" 
read 

echo "Erasing any old release ..."
rm -rf $RELDIR/openstar
rm -rf $RELDIR/openstar_$RELNAME

echo "Copying files ..."
find openstar -print | grep -v \.svn | cpio -pud $RELDIR

cd $RELDIR
echo "Changing files ownership ..."
chown -R apache:apache openstar

cd $RELDIR/openstar/

echo "Deleting backup module archives ..."
rm -f modules/*.tgz

echo "Deleting vim backup files ..."
find . -name '*~' | xargs rm

echo "Deleting module generator ..."
rm -rf includes/v4blib/extra/stage
rm -rf includes/v4blib/extra/templates
rm -rf includes/v4blib/extra/genmod.php
echo "Deleting module generator module ..."
rm -rf modules/v4bGenMod
rm -rf modules/v4bKB
rm -rf modules/v4b_immo
rm -rf modules/v4bMvt

cd $RELDIR/openstar/includes/v4blib/extra/
echo "Setting correct file permissions ..."
sh fixperms.sh
echo "Cleaning file tree ..."
sh cleantree.sh -f

cd $RELDIR/openstar/
echo "Generating v4blib package ..."
tar -czf $RELDIR/v4blib_$RELNAME.tgz ./personal_config.php ./README_openstar* ./docs/ChangeLog_OpenStar.txt ./index.php ./includes/pnAPI.php ./includes/pnMod.php ./includes/pnSession.php ./includes/pnRender.class.php ./includes/pnLang.php ./includes/v4blib/ ./images/v4b/ ./modules/pnRender/plugins/function.v4b* ./modules/pnRender/plugins/function.formutil* ./modules/pnRender/plugins/function.pnuserloggedin.php ./modules/pnRender/plugins/function.pnimg.php ./modules/pnRender/plugins/function.pnicon.php ./modules/pnRender/pntemplates/ ./modules/pnRender/pnblocks/ ./modules/pnRender/pnlang/  ./modules/pnRender/pnimages/ ./images/icons/extrasmall
echo "Generating v4bAccounting package ..."
tar -czf $RELDIR/v4bAccounting_$RELNAME.tgz ./modules/v4bAccounting
echo "Generating v4bAddressBook package ..."
tar -czf $RELDIR/v4bAddressBook_$RELNAME.tgz ./modules/v4bAddressBook
echo "Generating v4bCategories package ..."
tar -czf $RELDIR/v4bCategories_$RELNAME.tgz ./modules/v4bCategories
echo "Generating v4bContact package ..."
tar -czf $RELDIR/v4bContact_$RELNAME.tgz ./modules/v4bContact
echo "Generating v4bJournal package ..."
tar -czf $RELDIR/v4bJournal_$RELNAME.tgz ./modules/v4bJournal
echo "Generating v4bLorem package ..."
tar -czf $RELDIR/v4bLorem_$RELNAME.tgz ./modules/v4bLorem
echo "Generating v4bNewContent package ..."
tar -czf $RELDIR/v4bNewContent_$RELNAME.tgz ./modules/v4bNewContent
echo "Generating v4bObjectData package ..."
tar -czf $RELDIR/v4bObjectData_$RELNAME.tgz ./modules/v4bObjectData
echo "Generating v4bPgPages package ..."
tar -czf $RELDIR/v4bPgPages_$RELNAME.tgz ./modules/v4bPgPages
echo "Generating v4bProjects package ..."
tar -czf $RELDIR/v4bProjects_$RELNAME.tgz ./modules/v4bProjects
echo "Generating v4bRbs package ..."
tar -czf $RELDIR/v4bRbs_$RELNAME.tgz ./modules/v4bRbs

cd $RELDIR
mv openstar openstar_$RELNAME

echo "All Done!"

