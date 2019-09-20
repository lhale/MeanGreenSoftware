OpenStar README File
--------------------
OpenStar is a value-added PostNuke distribution which aims to extend 
the functional converage of PostNuke by including and integrating 
3rd party modules in order to expand the capabilities of the default 
PostNuke distribution. This file is intended to answer the questions 
typically raised after downloading (and *before* installing!) new 
software. 


Intro:
------
You can basically consider OpenStar to be something like PostNuke+: 
PostNuke with lots of add ons, some cleanups and some nice minor 
fixes/improvements. We aim to provide a software distribution which 
is a clear improvement when compared to the base PostNuke distribution. 
Not all sites need such features; however, complex and highly 
interactive sites may benefit from our add-ons in the areas of 
Content Management, Project Management, Resource Booking, etc. 


Recommended Installation Procedure (complete Package):
------------------------------------------------------
The easiest way of installing OpenStar, is to import the file 
	openstar/includes/v4blib/extra/openstar_ship.sql
into your OpenStar database. This will give you fully configured 
OpenStar instance with some basic demo data to play with. 

If you only want the base install without any demo data, you can 
import the file 
	openstar/includes/v4blib/extra/openstar_base.sql
which gives you the base install without any demo data. Please 
note that if you do this, some of the links in the left menu (such 
as Content) will not work correctly as there's no demo data to 
display. 

You can import the dumpfiles by doing a 
	mysql -D [database] -u [user] -p < openstar_ship.sql
For information on how to create your database please see 
	http://dev.mysql.com/doc/mysql/en/create-database.html
or use a tool such as 
	http://www.phpmyadmin.net/home_page/

If you are on a server which grants PHP scripts only 8 MB of memory, 
also import the file 
	openstar/includes/v4blib/extra/openstar_low_memory.sql
which will generate a configuration which will run in 8 MB of PHP
memory. 

Once you have installed the files and loaded the database data you can 
call the script
        http://<server>/<openstar_install_dir>/openstar_postinstall.php
This script will apply the required changes to config.php.

Plese note that the default table prefix (as specified in config.php) 
for the delivered OpenStar schema is "os_core" and the default "admin"
password is "admin".


Alternative (and more tedious) Installation Procedure (complete Package):
-------------------------------------------------------------------------
Alternatively, you can choose to install OpenStar as you would any standard 
PostNuke distribution. In order to do so, you first need to rename 

    install.bak        to   install
    install.php.bak    to   install.php

and then hit 

    http://<server>/<openstar_install_dir>/install.php

and proceed from there. This will give you all the configuration options of 
the basic PostNuke install with all extra modules disabled. The task of 
activating these modules and further configuring your system is then up to 
you. *Be*warned*: this is a somewhat tedious task which is not fully 
documented! 


Installing v4b Modules onto an existing PostNuke installation:
--------------------------------------------------------------
You can download the modules we have created from 
	http://openstar.postnuke.com
and install them onto an existing PostNuke installation by following 
this procedure:

	1) Download and install the proper v4blib 
           - this is a file-only install which requires no database actions
        2) Download and install the module you wish to activate
 	3) Initialize and Activate the module through the PostNuke 
	   Module Admin tool as you would any other PostNuke module. 
	4) Create a menu entry for the module. All v4b Modules can be 
	   accessed through a link like
		index.php?module=[module_name]

Please note: All v4b modules require that v4blib is installed before they 
can be initialized, activated and used!!!


Upgrades/Patches
----------------
Please read the relevant documents in the "docs" directory in order to get 
a list of files which has changed since the last release. 


Features for Users:
-------------------
On the user side, We have added modules in the 
areas of Content Management, Calendar and AddressBook, 
Project Management, Resource Booking, Event Management 
and lots more.  


Features for Developers:
------------------------
On the developer side, we provide v4blib (located under 
includes/v4blib) which is our development library which 
provides an object based persistence model which can 
greatly facilitate the development of complex modules. In 
addition to the basic open 

More on the details of this can be found on our website 
at http://www.open-star.org. 

The reason this library is named 'v4blib' is twofold: 
  - Historic: our company's initials are 'v4b'.
  - Practical: The string 'v4b' is not commonly found which 
    makes it a very 'nice' string to 'grep' for. 


Where can I find the v4blib API Docs?
-------------------------------------
Both the full package download as well as the v4blib download contain
the directory 
  includes/v4blib/html
which contain the generated API docs for that version


Incompatabilities with Existing PostNuke Modules/Installations:
---------------------------------------------------------------
Please note that while the version of PostCalendar supplied 
with OpenStar appears to be identical to the standard PostCalendar 
version, it contains numerous fixes and improvements and is 
*not*data*compatbile* to the standard PostCalendar version! 


Questions/Support:
------------------
Please use the forums available under 
  http://www.open-star.org


Release History
------------------
2005-07-04: 3.0 RC3
2005-04-20: 3.0 RC2
2005-03-20: 3.0 RC1
