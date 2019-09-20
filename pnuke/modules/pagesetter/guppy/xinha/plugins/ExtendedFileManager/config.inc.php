<?
/**
 * ExtendedFileManager configuration file.
 * Authors: Wei Zhuo, Afru
 * Version: Updated on 08-01-2005 by Afru
 * Package: ExtendedFileManager
 * http://www.afrusoft.com/htmlarea
 */

/*  Configuration file usage:
 *	There are two insertModes for this filemanager. One is "image" and another is "link".
 *	So you can assign config values as below
 *
 *	if($insertMode=="image") $IMConfig['property']=somevalueforimagemode;
 *	else if($insertMode=="link") $IMConfig['property']=somevalueforlinkmode;
 *
 *	(or) you can directly ass $IMConfig['property']=somevalueforbothmodes;
 *
 *	Best of Luck :) Afru.
 */

/*
	 File system path to the directory you want to manage the images
	 for multiple user systems, set it dynamically.

	 NOTE: This directory requires write access by PHP. That is,
		   PHP must be able to create files in this directory.
		   Able to create directories is nice, but not necessary.
*/
//$IMConfig['base_dir'] = $_SERVER['DOCUMENT_ROOT'].'/htmlarea/resources/';
$IMConfig['base_dir'] = $_SERVER['DOCUMENT_ROOT'].'/image_store/';


/*
 The URL to the above path, the web browser needs to be able to see it.
 It can be protected via .htaccess on apache or directory permissions on IIS,
 check you web server documentation for futher information on directory protection
 If this directory needs to be publicly accessiable, remove scripting capabilities
 for this directory (i.e. disable PHP, Perl, CGI). We only want to store assets
 in this directory and its subdirectories.
*/
$IMConfig['base_url'] = "http://".$_SERVER['HTTP_HOST']."/image_store/";

/*
  Possible values: true, false

  TRUE - If PHP on the web server is in safe mode, set this to true.
         SAFE MODE restrictions: directory creation will not be possible,
		 only the GD library can be used, other libraries require
		 Safe Mode to be off.

  FALSE - Set to false if PHP on the web server is not in safe mode.
*/
$IMConfig['safe_mode'] = false;


/*
This sepcifies whether any image library is available to resize and edit images.
TRUE - Thumbnails will be resized by image libraries and if there is no library, default thumbnail will be shown.
FALSE - Thumbnails will be resized by browser ignoring image libraries.
*/
$IMConfig['img_library'] = true;


/*
View type when the File manager is in insert image mode.
Valid values are "thumbview" and "listview". Default is thumbview.
*/
if($insertMode=="image")
	$IMConfig['view_type'] = "thumbview";
else if($insertMode=="link")
	$IMConfig['view_type'] = "listview";


/*
View type when the File manager is in insert link mode.
Valid values are "thumbview" and "listview". Default is listview.

$IMConfig['linkmode_view_type'] = "listview";
*/

/*
 Possible values: 'GD', 'IM', or 'NetPBM'

 The image manipulation library to use, either GD or ImageMagick or NetPBM.
 If you have safe mode ON, or don't have the binaries to other packages,
 your choice is 'GD' only. Other packages require Safe Mode to be off.
*/
define('IMAGE_CLASS', 'IM');


/*
 After defining which library to use, if it is NetPBM or IM, you need to
 specify where the binary for the selected library are. And of course
 your server and PHP must be able to execute them (i.e. safe mode is OFF).
 GD does not require the following definition.
*/
define('IMAGE_TRANSFORM_LIB_PATH', '');


/*
  The prefix for thumbnail files, something like .thumb will do. The
  thumbnails files will be named as "prefix_imagefile.ext", that is,
  prefix + orginal filename.
*/
$IMConfig['thumbnail_prefix'] = '.thumb';


/*
  Thumbnail can also be stored in a directory, this directory
  will be created by PHP. If PHP is in safe mode, this parameter
  is ignored, you can not create directories.

  If you do not want to store thumbnails in a directory, set this
  to false or empty string '';
*/
$IMConfig['thumbnail_dir'] = '.thumbs';


/*
  Possible values: true, false

 TRUE -  Allow the user to create new sub-directories in the
         $IMConfig['base_dir'].

 FALSE - No directory creation.

 NOTE: If $IMConfig['safe_mode'] = true, this parameter
       is ignored, you can not create directories
*/
$IMConfig['allow_new_dir'] = true;


/*
  Possible values: true, false

 TRUE -  Allow the user to edit image by image editor.

 FALSE - No edit icon will be displayed.

 NOTE: If $IMConfig['img_library'] = false, this parameter
       is ignored, you can not edit images.
*/
$IMConfig['allow_edit_image'] = true;


/*
  Possible values: true, false

  TRUE - Allow the user to upload files.

  FALSE - No uploading allowed.
*/
$IMConfig['allow_upload'] = true;

/* Maximum upload file size in Kilobytes */
$IMConfig['max_filesize_kb'] = 90;

/* Maximum upload folder size in Megabytes */
$IMConfig['max_foldersize_mb'] = 5;

/*
Allowed extensions that can be shown and allowed to upload.
Available icons are for "doc,fla,gif,gz,html,jpg,js,mov,pdf,php,png,ppt,rar,txt,xls,zip"
-Changed by AFRU.
*/

if($insertMode=="image")
$IMConfig['allowed_extensions'] = array("jpg","gif","png","bmp");
else if($insertMode=="link")
$IMConfig['allowed_extensions'] = array("jpg","gif","js","php","pdf","zip","txt","psd","png","html","swf");



/*
 The default thumbnail and list view icon in case thumbnails are not created and the files are of unknown.
*/
$IMConfig['default_thumbnail'] = 'icons/def.gif';
$IMConfig['default_listicon'] = 'icons/def_small.gif';


/*
Only files with these extensions will be shown as thumbnails. All other files will be shown as icons.
*/
$IMConfig['thumbnail_extensions'] = array("jpg", "gif", "png", "bmp");

/*
  Thumbnail dimensions.
*/
$IMConfig['thumbnail_width'] = 84;
$IMConfig['thumbnail_height'] = 84;

/*
  Image Editor temporary filename prefix.
*/
$IMConfig['tmp_prefix'] = '.editor_';
?>
