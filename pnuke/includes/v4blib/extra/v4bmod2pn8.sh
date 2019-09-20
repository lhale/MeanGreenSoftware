#!/bin/sh
#
# Script to take a v4b OS module and turn it into a PN8 module
#

case $# in
	1) ;;
	*) echo "Usage: $0 module"
	   exit;;
esac

MOD=$1

echo "Converting module $MOD ..."

#SRCMOD=$MOD
#DSTMOD="$MOD.pn"

MODS="$1"
for i in $MODS
do
    SRCMOD=$i;
    DSTMOD=$i;
    DSTMODDIR="$i.converted";

    if [ ! -d $i ]
    then
        exit "Can't open $i ... Exiting";
    fi

    rm -rf $DSTMODDIR

    echo $i
    cp -rf $SRCMOD $DSTMODDIR

    FNAME=`echo $i|sed 's/v4b/pn/g'`
    for j in `find $DSTMODDIR -name "*.php" -print`
    do
        echo "  $j"
        cat $j | sed -e 's/v4blib/pnobjlib/g' -e 's/V4B/PN/g' -e 's/v4b_exit/pn_exit/g' -e "s/$SRCMOD/$DSTMOD/g" > t
        mv -f t $j
    done

    for j in `find $DSTMODDIR -name "*.inc" -print`
    do
        if [ $FNAME != "$DSTMODDIR/inc/table_init.inc" ]
        then
            echo "  $j"
            cat $j | sed -e 's/v4blib/pnobjlib/g' -e 's/V4B/PN/g' -e 's/v4b_exit/pn_exit/g' > t
            mv -f t $j
        fi
    done

    for j in `find $DSTMODDIR -name "V4B*.php" -print`
    do
        echo "  $j"
        NEWNAME=`echo $j|sed 's/V4B/PN/g'`
        mv -f $j $NEWNAME
    done

    TPLDIR="$DSTMODDIR/pntemplates"
    if [ -d $TPLDIR ]
    then
        for j in `find $TPLDIR -name "v4b*" -print`
        do
            echo "  $j"
            cat $j | sed -e 's/v4b_categories_treemenu_include/categories_treemenu_include/g' -e 's/v4b_categories_user_list/categories_user_list/g' -e 's/v4b_//g' -e 's/_V4B_/_PN_/g' > t
            mv -f t $j
        done
    fi 

done

