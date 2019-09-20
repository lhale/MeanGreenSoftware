#!/bin/sh
#
# Script to take OpenStar stuff and move/translate it to PN
#

echo "Copying v4bstuff to PostNuke ..."

cd ../../../..
HOME=`pwd`

TFILE="/tmp/tmpfile"
SRCLIB="openstar/includes/v4blib"
DSTLIB="PostNuke/includes/pnobjlib"
#rm -rf $DSTLIB
#mkdir $DSTLIB

SRCMOD="openstar/modules"
DSTMOD="PostNuke/system"

SRCPNR="openstar/modules/pnRender/plugins"
DSTPNR="PostNuke/system/pnRender/plugins"

# first copy the v4blib files
FILES="CategoryUtil.class.php \
	ArrayUtil.class.php \
	DateUtil.class.php \
	DBUtil.class.php \
	debug.php \
	FileUtil.class.php \
	FormUtil.class.php \
	HtmlUtil.class.php \
	LanguageUtil.class.php \
	Loader.class.php \
	LogUtil.class.php \
	ModuleUtil.class.php \
	ObjectUtil.class.php \
	RandomUtil.class.php \
	StringUtil.class.php \
	UserUtil.class.php \
	V4BObject.class.php \
	V4BObjectArray.class.php \
	ValidationUtil.class.php \
	doxygen.conf \
	v4b_globals.inc"

for i in $FILES
do
    echo $i
    FNAME=`echo $i|sed -e 's/V4B/PN/g' -e 's/v4b_globals/pnobjlib_globals/g'`
    cat $SRCLIB/$i | sed -e 's/v4bConfig/pnconfig/g' -e 's/v4b_globals/pnobjlib_globals/g' -e 's~includes/v4blib/jscalendar~javascript/jscalendar~g' -e 's/v4blib/pnobjlib/g' -e 's/v4b_objectdata/objectdata/g' -e 's/V4B/PN/g' -e 's/v4b/pn/g' -e 's~includes/pnobjlib/phplayersmenu/lib~javascript/phplayersmenu/lib~g' -e 's/pn_categories/categories/g' -e 's/pn_objectdata/objectdata/g'  -e 's~modules/pnCategories~system/Categories~g' -e 's~modules/pnObjectdata~system/ObjectData~g' -e 's~includes/pnobjlib/phplayersmenu~javascript/phplayersmenu~g' -e 's~modules/~system/~g' -e 's/pnObjectData/ObjectData/g' -e 's/pnCategories/Categories/g' > $DSTLIB/$FNAME
done


# now copy the modules we want to convert
MODS="v4bObjectData v4bCategories"
for i in $MODS
do
    echo $i
    FNAME=`echo $i|sed 's/v4b//g'`
    #rm -rf $DSTMOD/$FNAME
    #cp -rf $SRCMOD/$i/* $DSTMOD/$FNAME/

    for i in `find $SRCMOD/$i -name "*.php" -print`
    do
        cp $i $DSTMOD/$FNAME
    done

    #for i in `find $DSTMOD/$FNAME -print | grep svn`
    #do
        #rm -rf $i
    #done

    for i in `find $DSTMOD/$FNAME -name "*.php" -print`
    do
        echo "  $i"
        cat $i | sed -e 's/v4b_globals/pnobjlib_globals/g' -e 's/v4blib/pnobjlib/g' -e 's/_V4B_/_/g' -e 's/V4B/PN/g' -e 's/v4b_//g' -e 's/v4b//g' -e 's~modules/~system/~g' > $TFILE
        mv -f $TFILE $i
    done


    for i in `find $DSTMOD/$FNAME -name "*.inc" -print`
    do
        echo "  $i"
        cat $i | sed -e 's/v4b_globals/pnobjlib_globals/g' -e 's/v4blib/pnobjlib/g' -e 's/V4B/PN/g' -e 's/v4b_//g' -e 's/v4b//g' > $TFILE
        mv -f $TFILE $i
    done


    for i in `find $DSTMOD/$FNAME -name "V4B*.php" -print`
    do
        echo "  $i"
        NEWNAME=`echo $i|sed 's/V4B/PN/g'`
        mv -f $i $NEWNAME
    done

    TPLDIR=$DSTMOD/$FNAME/pntemplates
    if [ -d $TPLDIR ]
    then
        for i in `find $TPLDIR -name "v4b*" -print`
        do
            echo "  $i"
            NEWNAME=`echo $i|sed 's/v4b_//g'`
            cat $i | sed -e 's/v4bCategories/Categories/g' -e 's/v4b_categories_admin_menu/categories_admin_menu/g' -e 's/v4b_categories_adminlinks/categories_adminlinks/g'  -e 's/v4b_categories_treemenu_include/categories_treemenu_include/g' -e 's/v4b_categories_user_list/categories_user_list/g' -e 's/_V4B_/_/g' > $TFILE
            rm -f $i
            mv -f $TFILE $NEWNAME
        done
    fi

    TPLDIR=$DSTMOD/$FNAME/pntemplates/plugins
    if [ -d $TPLDIR ]
    then
        for i in `find $TPLDIR -name "function*" -print`
        do
            echo "  $i"
            NEWNAME=`echo $i|sed 's/v4b_//g'`
            cat $i | sed -e 's~includes/pnobjlib/phplayersmenu~javascript/phplayersmenu~g' > $TFILE
            mv -f $TFILE $NEWNAME
	    rm -f $i
        done
    fi


done


# now copy pnRender plugins we need
#PLUGS="function.v4b_pnml.php function.v4b_assign.php function.v4b_selector_module.php function.v4b_inputvar.php function.v4b_pnmodurl.php function.v4b_array_size.php function.v4b_selector_category_by_path.php function.v4b_selector_field_array_distinct.php function.v4b_get_category_display_by_value.php function.v4b_selector_object_array.php "
#for i in $PLUGS
#do
#    echo "  $i"
#    cp -f $SRCPNR/$i $DSTPNR
#done


# now copy the JS libraries we want to convert
#LIBS="jscalendar overlib phplayersmenu tabnavigation"
#for i in $LIBS
#do
    #echo $i
    #rm -rf PostNuke/javascript/$i
    #cp -rf $SRCLIB/$i/* PostNuke/javascript/$i/
    #find PostNuke/javascript -print | grep svn | xargs rm -rf
#done


