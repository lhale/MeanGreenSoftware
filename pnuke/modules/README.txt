PNphpBB2 1.2i-patch1
====================

This -patch release contains only bugfixes and no major features.

In order to upgrade to PNphpBB2 1.2i-patch1 you MUST already have 1.2i
installed.

THIS PATCH WON'T WORK WITH VERSION OTHER THAN 1.2i!!!

Installation
============

Before starting the upgrade switch your PN installation to English language.
You can change it back to your language after the upgrade.

This should be a low-risk upgrade, but you are strongly advised to backup your
files and database.

* PNphpBB2-1.2i-patch1-diff.zip / PNphpBB2-1.2i-patch1-diff.tar.gz 
  
  Before patching you installation you MUST restore "install" directory from
  1.2i.

  This file contains the patch between 1.2i and 1.2i-patch1 (unified diff
  format). Apply the patch with diff -p2.

* PNphpBB2-1.2i-patch1-delta.zip / PNphpBB2-1.2i-patch1-delta.tar.gz

  This compressed archive contains *only* the files that have been changes
  between 1.2i and 1.2i-patch1. In order to ease the upgrade this packages also
  includes a full copy of "install" directory, so you don't need to restore it
  from the original package.
  
  To upgrade you installation just decompress the archive file into your PN
  module directory.

Once you have updated the files go to Module administration (PN admin panel),
regenerate the list and upgrade PNphpBB2. The upgrade procedure will start,
follow the instructions.

After the upgrade has been completed remove install directory from PNphpBB2
directory.
