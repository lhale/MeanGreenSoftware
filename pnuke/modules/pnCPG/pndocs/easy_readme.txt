/************************************************************************/
/* pnCPG       (/pndocs/readme.txt)					*/
/* Resived by  Pedro Innecco (aka Guybrush)				*/
/************************************************************************/


WHAT IS pnCPG?
==============
The pnCPG script is a PostNuke module that integrates a standalone build of the Coppermine Gallery into an existing installation of PostNuke.

Advantages:

* No need to hack your PostNuke or Coppermine installation in order to run it.
* PostNuke users can be automatically created into Coppermine.
* The pnCPG hack for Postnuke 0.7x is very simple and requires no tables in the DB.




How DOES IT WORK?
================
Basically what this hack does is that it tries to log on the current PostNuke user within Coppermine. If the user is known, automatically this user will be logged on.
Please note that there is no database integration, this hack only offers seamingless logon pass-through.

Tested with :
Postnuke 0.72x
Postnuke 0.750 (GOLD)
Postnuke 0.761
Coppermine 1.4.3
Linux/Windows




INSTALLATION
============
1.  First you must obtain a standalone (i.e.: official) copy of the Coppermine Gallery. Please reffer to http://coppermine.sourceforge.net for details.


2.  Follow the Coppermine instructions on how to install the script. Please note that the Location of the Coppermine installation is not important, but we discourage the installation of Coppermine into your PostNuke /modules subdirectory. A common directory instruction should be like:

-pnuke		(root www directory - Where PostNuke is installed)
|-Modules 	(PostNuke's /modules subdirectory)
|--pnCPG	(the pnCPG PostNuke module)
|-Coppermine	(the standalone Coppermine gallery)

Ask you can see, pnCPG and Coppermine are on separated directories. However, if you have installed Coppermine itself in the modules directory of PostNuke, you will need to remove the following check within index.php of Coppermine:

	// Check if standalone is installed in a portal like phpNuke (added by DJMaze)
	$DIR=preg_split("/[\/\\\]/",dirname($_SERVER["SCRIPT_NAME"] ? $_SERVER["SCRIPT_NAME"] : $HTTP_SERVER_VARS["SCRIPT_NAME"]));
	if ($DIR[count($DIR)-2] == "modules") {
	    echo "<html><body><h1>ERROR</h1>You installed the standalone Coppermine into your Nuke portal.<br>".
	         "Please download and install a CPG Port: <a href=\"http://sourceforge.net/project/showfiles.php?group_id=89658\">CPG for PostNuke OR CPG for PHPnuke</a></body></html>";
	    die();
	} // end check

3.  After confirming that Coppermine runs as standalone,unzip the contents of the pnCPG archives into your PostNuke /modules subdirectory.


4.  Copy pnCPG\Coppermine/index_pn.php to your Coppermine root directory. (mandatory - do not jump this step!)


5.  On PostNuke, initialise & activate the pnCPG module on the Modules administration of PostNuke.


6.  On the AdminPanel, you should now see an icon for the configuration of pnCPG. Click on it in order to configure the module.
see Adminsettings.txt

7.  When creating a menu option in PostNuke, link the module into a menu block as {pnCPG}
	or as: {pnCPG:main&task=users} to have a direct link into a users gallery.


8.  Make this link only available to Registered Users through Permissions (unless you allow guest access).


9.  Add a new block and set your preferences for that.




BLOCK SETTINGS
==============
When you setup the block, there are some settings that need explaining.
You can choose to use a Java menu for options.
If you choose "yes" :
you can choose to load the java-component, it defaults to Yes but there might be another app that already loaded it, in that case change the setting to "n".
You can choose where the menu pop ups, Left or Right from the mosue. Choose the opposite direction of the side you are placing the block.

Applications using same Java library:
PostCalandar
pnChangeLog

-- LDH :
After #7 above on the user brwsr, I'm getting the following:
"
Coppermine Photo Gallery - Your Online Photo Gallery
Coppermine Photo Gallery seems not to be installed correctly, or you are running coppermine for the first time. You'll be redirected to the installer. If your browser doesn't support redirect, click here.
"


