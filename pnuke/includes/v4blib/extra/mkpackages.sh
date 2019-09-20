#!/bin/sh
#
# Script to create a patch release
#

HOMEDIR=`pwd`
RELDIR=/tmp

echo "Press enter base release name"
read RELNAME

echo "Press enter to generate subreleases for [$RELNAME]" 
read 

for i in light home office
do
    echo "Generating $i subrelease ..."
    $TDIR=$RELDIR/$RELNAME_$i
    cp -r $RELDIR/$RELNAME $TDIR
    rm -rf $TDIR/modules/*

    # copy files
    for j in `cat $HOMEDIR/rel_mod_list_$i`
    do
        echo "   $j"
        cp -r $RELDIR/$RELNAME/modules/$j $TDIR/modules/
    done

    # now generate a DB dump
    mysql -u root << EOF
drop database osrelease;
create database osrelease;
EOF

    echo "   Generating DB Dump"
    mysql -D osrelease -u root < $TDIR/includes/v4blib/extra/openstar_ship.sql

    $TABLIST=`cat $HOMEDIR/rel_tab_list_$i`
    mysqldump --add-drop-table --compatible=mysql40 --skip-opt --quote-names=0 osrelease -u root $TABLIST > $HOMEDIR/openstar_ship_$i.sql
    
done
     
echo "All Done!"
