/************************************************************************/
/* pnCPG       (/pndocs/readme.txt)                                */
/************************************************************************/

The pnCPG hack for Postnuke 0.76x is very simple and requires no tables in the DB.

Basically what this hack does is that it tries to log on the current Postnuke user within Coppermine.
If the user is known, automatically this user will be logged on.
There is no database integration, this hack only offers seamingless logon pass-through.

Tested with :
Postnuke 0.761
Coppermine 1.43
Linux/Windows

Location of the Coppermine installation is not important.

INSTALLATION
======================
1.  Unzip the contents to your /modules directory.
2.  Copy pnCPG\Coppermine\index_pn.php to your Coppermine root directory. (mandatory)
3.  Initialise & activate the module
4.  Go to the AdminPanel and set the directory of Coppermine
    All settings are explained within AdminSettings.txt
5.  Link the module into a menu block as : {pnCPG}
	or as :
	{pnCPG:main&task=users} to have a direkt link into a users gallery
	or as :
	{pnCPG:main&task=upload} to have a direkt link into a users gallery for uploading
6.  Make this link only available to Registered Users through Permissions (unless you allow guest access).
7.  Add a new block and set your preferences for that


If you have installed Coppermine itself in the modules directory of PostNuke, you will need to remove a check within index.php of Coppermine.
Please remove the following code :
// Check if standalone is installed in a portal like phpNuke (added by DJMaze)
$DIR=preg_split("/[\/\\\]/",dirname($_SERVER["SCRIPT_NAME"] ? $_SERVER["SCRIPT_NAME"] : $HTTP_SERVER_VARS["SCRIPT_NAME"]));
if ($DIR[count($DIR)-2] == "modules") {
    echo "<html><body><h1>ERROR</h1>You installed the standalone Coppermine into your Nuke portal.<br>".
         "Please download and install a CPG Port: <a href=\"http://sourceforge.net/project/showfiles.php?group_id=89658\">CPG for PostNuke OR CPG for PHPnuke</a></body></html>";
    die();
} // end check

BLOCK SETTINGS
==============
When you setup the block, there are some settings that need explaining.
You can choose to use a Java menu  for options.
If you choose "yes" :
you can choose to load the java-component, it defaults to Yes but there might be another app that already loaded it, in that case change the setting to "n".
You can choose where the menu pop ups, Left or Right from the mosue. Choose the opposite direction of the side you are placing the block.

Applications using same Java library :
PostCalandar
pnChangeLog


Guest Account
=============
If one enables guest access, a user-account named "guest" will be created. This account will have the same rights as any other normal user (such as creating albums). This can be avoided by restricting the access rights of this Guest-user.

Enabling Coppermine Search within Postnuke
==========================================
Simply copy the contents of pnCPG\Postnuke\includes into the incvludes directory of Postnuke.

FINALLY
========================
In the admin panel, there is a checkbox in order to sync the PN users with Coppermine.

Password encryption
===================
During the upgrade from 1.3x to 1.4.1 you have been asked if you like to start encrypting your passwords. If you said "yes" pnCPG will not work without changing a setting "under water".
Installing from fresh does not even ask, just encrypts.
I have asked the developers to have it available as a choice but they are (untill now) not willing to do so.
There is a way to make it work again :
1. Open the database with a tool like phpMyAdmin
2. Select the table cpg141-config (possible you have a different prefix)
3. Find the record with the key "enable_encrypted_passwords" (record 104 in a fresh install)
4. Set the value to 0

pnCPG will work fine again.
Perhaps if all users of pnCPG will ask the developers to make this option available as a choice (which is very easy) they might get convinced of the use of this.
After you have changed this setting it actually already shows up as an option.


As of version 3.2, there is an option to use this module in combination with an encrypted Coppermine version.
This is done by using a Dynamic Data field in Postnuke.
Before selecting this setting, make sure this field has been created :
1. Logon to postnuke as administrator
2. Go to the admin section, system tab
3. Go to the User section
4. Go to the Dynamic user data
5. Add the field "_CPGPWD", type "string", length 10
6. You must create a define for this variable in language/eng/global.php
	-also in other languages you support => language/*???*/global.php
7. Activate the "Use Dynamic user data" option within the admin section.

Now what happens is the following :
If an authorised user is entering the Coppermine gallery for the first time a password will be generated unless the user already provided one within his account details within PN.
When a password is generated, and "send email" is selected, the user will also receive an email with his/her password for Coppermine direct.
If a password is present in PostNuke, Coppermine password will be synchronized at next logon to Coppermine.

As of version 4.0, you can enable the usage of Postnuke passwords for Coppermine. THis will only work in combination with my pnSSI module.
For now this has been tested on Postnuke 0.764.

NOTE_NOTE_NOTE_NOTE_NOTE_NOTE_NOTE_NOTE_NOTE_NOTE_NOTE_NOTE_NOTE_NOTE_NOTE_NOTE_

If you do not want to use Dynamic user data or the Postnuke password feature, this module will only work with Coppermine configured without encrypted passwords !!!!!!!!!!!!
