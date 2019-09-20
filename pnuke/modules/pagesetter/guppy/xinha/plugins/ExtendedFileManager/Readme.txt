Package : Extended File Manager EFM 1.0 Beta
Plugin url : http://www.afrusoft.com/htmlarea

Overview :
----------

Extended File Manager is an advanced plugin for HtmlArea 3.0 

It works in two different modes.
1). Insert Image Mode and 
2). Insert File Link Mode.

In Insert Image Mode, it replaces the basic insert image functionality of HtmlArea with its advanced image manager.

If Insert File Link Mode is enabled, a new icon will be added to the toolbar with advanced file linking capability.



Complete Features :
-------------------
* Easy config.inc file that enables individual options for both modes.
* Thumnail View 
* List View 
* Nice icons for both views 
* Create Folders 
* Vertical Scrolling 
* Allowed extensions to view or upload.
* File Uploads 
* Max File upload limit 
* Max Upload Folder size (Including all subfolders and files. A must see option.)
* Dynamic display of available free space in the Upload Folder 
* Dynamic Thumbnails using Image libraries or browser resize 
* Image Editor (Actually done by Wei...a great addon) 
* Can be used to insert images along with properties. 
* Can be used to insert link to non-image files like pdf or zip.


Installation :
--------------

Installing EFM is very easy to implement. Unzip htmlArea_EFM1_0b.zip and copy ExtendedFileManager fodler to plugins directory.

To enable Insert Image Mode, just load the plugin into your HtmlArea. By default, if you just load the plugin without registering it, EFM will enable only Insert Image Mode.
 
 HTMLArea.loadPlugin("ExtendedFileManager");
 HTMLArea.onload = function() {
 var editor = new HTMLArea("textarea_id");
 editor.generate();
 };
 HTMLArea.init();


To enable Insert File Link Mode, load the plugin as said above and also register the plugin as per the example below.

 HTMLArea.loadPlugin("ExtendedFileManager");
 HTMLArea.onload = function() {
 var editor = new HTMLArea("textarea_id");
 editor.registerPlugin(ExtendedFileManager);   //Enables Inser File Link Mode.
 editor.generate();
 };
 HTMLArea.init();


Note : If you enable Insert File Link Mode, Insert Image Mode will also be enabled automatically.


Open and edit config.inc.php file as per your needs. Thats all.

Have a nice day :)


Thanking you,

Afru.
afrusoft@gmail.com
