#!/bin/sh
#
# Script to clean a newly checked out VIP directory tree
#

case $# in
	0|1) ;;
	*)   echo "Usage: $0 [-s]"
	     echo "        -s: also remove subversion files"
	     exit;;
esac

cd ../../../

if [ $# -eq 1 ]
then
	if [ $1 = "-f" ]
	then
		echo ""
	fi
fi

if [ $# -eq 1 ]
then
	if [ $1 = "-s" ]
	then
		echo "Removing SVN directories ..."
		find . -type d -name \.svn | xargs rm -rf 
	fi
fi


for i in pnRender pagesetter pnesp
do
	echo "Removing cache files for $i"
	rm -rf modules/$i/pntemplates/cache/*
	rm -rf modules/$i/pntemplates/compiled/*
done

echo "Removing global pnRender cache files"
rm -rf pnTemp/pnRender_cache/*
touch pnTemp/pnRender_cache/index.html

echo "Removing global pnRender compiled files"
rm -rf pnTemp/pnRender_compiled/*
touch pnTemp/pnRender_compiled/index.html

echo "Removing global Xanthia cache files"
rm -rf pnTemp/Xanthia_cache/*
touch pnTemp/Xanthia_cache/index.html

echo "Removing global Xanthia compiled files"
rm -rf pnTemp/Xanthia_compiled/*
touch pnTemp/Xanthia_compiled/index.html

echo "Removing global Autotheme cache files"
rm -rf modules/AutoTheme/_compile/*
touch modules/AutoTheme/_compile/index.html

echo "Removing cache files for v4bProjects"
rm -f modules/v4bProjects/tmpimages/*.png

echo "Removing vi backup files"
find . -name "*~" -print | xargs rm -f 


