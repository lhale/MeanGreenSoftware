<?
/**
 * ExtendedFileManager images.php file. Shows folders and files.
 * Authors: Wei Zhuo, Afru
 * Version: Updated on 08-01-2005 by Afru
 * Package: ExtendedFileManager (EFM 1.0 beta)
 * http://www.afrusoft.com/htmlarea
 */
	if(isset($_REQUEST['mode'])) $insertMode=$_REQUEST['mode'];
	if(!isset($insertMode)) $insertMode="image";

require_once('config.inc.php');
require_once('Classes/ExtendedFileManager.php');

//default path is /
$relative = '/';
$manager = new ExtendedFileManager($IMConfig);

//process any file uploads
$uploadStatus=$manager->processUploads();

$manager->deleteFiles();


$refreshDir = false;
//process any directory functions
if($manager->deleteDirs() || $manager->processNewDir())
	$refreshDir = true;


$diskInfo=$manager->getDiskInfo();

//check for any sub-directory request
//check that the requested sub-directory exists
//and valid
if(isset($_REQUEST['dir']))
{
	$path = rawurldecode($_REQUEST['dir']);
	if($manager->validRelativePath($path))
		$relative = $path;
}


$afruViewType="";
if(isset($_REQUEST['viewtype']))
{
	$afruViewType=$_REQUEST['viewtype'];
}
if($afruViewType!="thumbview" && $afruViewType!="listview")
$afruViewType=$IMConfig['view_type'];



$manager = new ExtendedFileManager($IMConfig);


//get the list of files and directories
$list = $manager->getFiles($relative);


/* ================= OUTPUT/DRAW FUNCTIONS ======================= */


/**
 * Draw folders and files. Changed by Afru
 */
function drawDirs_Files($list, &$manager) 
{
	global $relative, $afruViewType, $IMConfig, $insertMode;


	if($afruViewType!="thumbview" && $afruViewType!="listview")
	$afruViewType="thumbview";

	if($afruViewType=="thumbview")
	{

		$maxFileNameLength=10;
		$maxFolderNameLength=13;
		$numCols=5;
		$cnt=1;
		// start of foreach for draw thumbview folders.
		foreach($list[0] as $path => $dir) 
		{ ?>
			<td style="padding:6px;"><table cellpadding="0" cellspacing="0"><tr>
			<td class="block" style="<? echo 'width:'.$IMConfig['thumbnail_width'].'px; height:'.$IMConfig['thumbnail_height'].'px;';
				?> cursor:pointer; padding:1px;"><a href="images.php?mode=<?echo $insertMode;?>&amp;dir=<? echo rawurlencode($path); ?>&amp;viewtype=<? echo $afruViewType; ?>" onclick="updateDir('<? echo $path; ?>')" title="<? echo $dir['entry']; ?>"><img src="img/folder.gif" alt="<? echo $dir['entry']; ?>" /></a>
			</td></tr><tr>
			<td class="edit" nowrap>
				<a href="images.php?mode=<?echo $insertMode;?>&amp;dir=<? echo $relative; ?>&amp;deld=<? echo rawurlencode($path); ?>&amp;viewtype=<? echo $afruViewType; ?>" title="Trash" onclick="return confirmDeleteDir('<? echo $dir['entry']; ?>', <? echo $dir['count']; ?>);"><img src="img/edit_trash.gif" height="15" width="15" alt="Trash"/></a>

				<? if(strlen($dir['entry'])>$maxFolderNameLength) echo substr($dir['entry'],0,$maxFolderNameLength)."..."; else echo $dir['entry']; ?>


			</td>
			</tr></table></td>
		  <? 
			$cnt++;
			if($cnt%$numCols==1) echo "</tr><tr>";
		} // end of foreach for draw thumbview folders.


		// start of foreach for draw thumbview files.
		foreach($list[1] as $entry => $file) 
		{ 
			$afruimgdimensions=$manager->checkImageSize($file['relative']);
			?>
			<td style="padding:6px;"><table cellpadding="0" cellspacing="0">
				<tr><td class="block" style="<? echo 'width:'.$IMConfig['thumbnail_width'].'px; height:'.$IMConfig['thumbnail_height'].'px;';
				?> cursor:pointer; padding:1px;" onclick="selectImage('<? echo $file['relative'];?>', '<? echo $entry; ?>', <? echo $file['image'][0];?>, <? echo $file['image'][1]; ?>);" title="<? echo $entry; ?> - <? echo Files::formatSize($file['stat']['size']); ?>">
				<img src="<? echo $manager->getThumbnail($file['relative']); ?>" alt="<? echo $entry; ?> - <? echo Files::formatSize($file['stat']['size']); ?>" <? if($afruimgdimensions[0]) echo 'width="'.$afruimgdimensions[0].'"'; ?> <? if($afruimgdimensions[1]) echo 'height="'.$afruimgdimensions[1].'"'; ?> />
				</td></tr>
				
				<tr><td class="edit" nowrap>
				<a href="images.php?mode=<?echo $insertMode;?>&amp;dir=<? echo $relative; ?>&amp;delf=<? echo rawurlencode($file['relative']);?>&amp;viewtype=<? echo $afruViewType; ?>" title="Trash" onclick="return confirmDeleteFile('<? echo $entry; ?>');"><img src="img/edit_trash.gif" height="15" width="15" alt="Trash"/></a>

				<? if($IMConfig['img_library'] && $IMConfig['allow_edit_image'])
				{ ?> <a href="javascript:;" title="Edit" onclick="editImage('<? echo rawurlencode($file['relative']);?>');"><img src="img/edit_pencil.gif" height="15" width="15" alt="Edit"/></a>
				<?$maxFileName2=$maxFileNameLength-3;}
				else $maxFileName2=$maxFileNameLength; ?>


				<? 
					if(strlen($entry)>$maxFileName2) echo strtolower(substr($entry,0,$maxFileName2))."..."; else echo $entry;
				?>

				</td></tr></table>
			</td> 
		  <? 
			$cnt++;
			if($cnt%$numCols==1) echo "</tr><tr>";
		}//end of foreach of draw thumbview files
		$cnt--;

		//Calculate empty colums at the end of display and add them as empty <TD></TD>.
		$emptyTDs=($numCols-($cnt%$numCols));
		for($i=0;$i<$emptyTDs;$i++) echo"<td></td>";
	}//end of thumbview


	else if($afruViewType=="listview")
	{ 
		$maxNameLength=50;
		?>
		
		<td class="lsviewheader">&nbsp;</td><td class="lsviewheader" width="100%">Name</td> <td class="lsviewheader">Size</td><td class="lsviewheader" nowrap>Date Modified</td>
		<td class="lsviewheader">&nbsp;</td>
		</tr>
		<?	
		// start of foreach for draw listview folders .
		foreach($list[0] as $path => $dir) 
		{ ?>
			<tr>
			<td class="lsviewpanel"><img src="icons/folder_small.gif"></td>

			<td class="lsviewpanel" nowrap><a href="images.php?mode=<?echo $insertMode;?>&amp;dir=<? echo rawurlencode($path); ?>&amp;viewtype=<? echo $afruViewType; ?>" onclick="updateDir('<? echo $path; ?>')" title="<? echo $dir['entry']; ?>">
			<? 
			if(strlen($dir['entry'])>$maxNameLength) echo substr($dir['entry'],0,$maxNameLength)."..."; else echo $dir['entry'];
			?>
			</a></td>

			<td class="lsviewpanel" nowrap style="padding-right:20px;">Folder</td>

			<td class="lsviewpanel" nowrap style="padding-right:20px;"><? echo date("d.m.y H:i",$dir['stat']['mtime']); ?></td>

			<td class="edit" nowrap style="padding-right:20px;">
				<a href="images.php?mode=<?echo $insertMode;?>&amp;dir=<? echo $relative; ?>&amp;deld=<? echo rawurlencode($path); ?>&amp;viewtype=<? echo $afruViewType; ?>" title="Trash" onclick="return confirmDeleteDir('<? echo $dir['entry']; ?>', <? echo $dir['count']; ?>);" style="border:0px;"><img src="img/edit_trash.gif" height="15" width="15" alt="Trash" border="0"/></a>
			</td>
			</tr>
		  <? 
		} // end of foreach for draw listview folders .

		clearstatcache();
		// start of foreach for draw listview files .
		foreach($list[1] as $entry => $file) 
		{ 
			?>
			<tr>
			<td class="lsviewpanel"><img src="<? if(is_file('icons/'.$file['ext'].'_small.gif')) echo "icons/".$file['ext']."_small.gif"; else echo $IMConfig['default_listicon']; ?>"></td>
			
			<td class="lsviewpanel" nowrap> <a href="#" onclick="return selectImage('<? echo $file['relative'];?>', '<? echo $entry; ?>', <? echo $file['image'][0];?>, <? echo $file['image'][1]; ?>);"  title="<? echo $entry; ?>" >
			<? 
			if(strlen($entry)>$maxNameLength) echo substr($entry,0,$maxNameLength)."..."; else echo $entry;
			?>
			</a></td>

			<td class="lsviewpanel" nowrap style="padding-right:20px;"><? echo Files::formatSize($file['stat']['size']); ?></td>

			<td class="lsviewpanel" nowrap style="padding-right:20px;"><? echo date("d.m.y H:i",$file['stat']['mtime']); ?></td>

			<td class="edit" nowrap style="padding-right:20px;"><a href="images.php?mode=<?echo $insertMode;?>&amp;dir=<? echo $relative; ?>&amp;delf=<? echo rawurlencode($file['relative']);?>&amp;viewtype=<? echo $afruViewType; ?>" title="Trash" onclick="return confirmDeleteFile('<? echo $entry; ?>');"><img src="img/edit_trash.gif" height="15" width="15" alt="Trash" border=0/></a>

			<? if($IMConfig['img_library'] && $IMConfig['allow_edit_image'])
			{ ?> <a href="javascript:;" title="Edit" onclick="editImage('<? echo rawurlencode($file['relative']);?>');"><img src="img/edit_pencil.gif" height="15" width="15" alt="Edit"/ border=0></a> <? }?>
			</td>
			</tr>

		  <? 
		}//end of foreach of draw listview files 



	}// end of listview

}//end of function drawDirs_Files


/**
 * No directories and no files.
 */
function drawNoResults() 
{
?>
<table width="100%">
  <tr>
    <td class="noResult">No Files Found</td>
  </tr>
</table>
<?	
}

/**
 * No directories and no files.
 */
function drawErrorBase(&$manager) 
{
?>
<table width="100%">
  <tr>
    <td class="error">Invalid base directory: <? echo $manager->config['base_dir']; ?></td>
  </tr>
</table>
<?	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	<title>File List</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="assets/imagelist.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="assets/dialog.js"></script>
<script type="text/javascript">
/*<![CDATA[*/

	if(window.top)
		I18N = window.top.I18N;

	function hideMessage()
	{
		var topDoc = window.top.document;
		var messages = topDoc.getElementById('messages');
		if(messages)
			messages.style.display = "none";
	}

	init = function()
	{
		hideMessage();

		<?
		if(isset($uploadStatus) && !is_numeric($uploadStatus) && !is_bool($uploadStatus))
		echo 'alert("'.$uploadStatus.'");';
		else if(isset($uploadStatus) && $uploadStatus==false)
		echo 'alert("Unable to upload File. \nEither Maximum file size ['.$IMConfig['max_filesize_kb'].'Kb] exceeded or\nFolder doesn\'t have write permission.");';
		?>
		

		var topDoc = window.top.document;

<? 
	//we need to refesh the drop directory list
	//save the current dir, delete all select options
	//add the new list, re-select the saved dir.
	if($refreshDir) 
	{ 
		$dirs = $manager->getDirs();
?>
		var selection = topDoc.getElementById('dirPath');
		var currentDir = selection.options[selection.selectedIndex].text;

		while(selection.length > 0)
		{	selection.remove(0); }
		
		selection.options[selection.length] = new Option("/","<? echo rawurlencode('/'); ?>");	
		<? foreach($dirs as $relative=>$fullpath) { ?>
		selection.options[selection.length] = new Option("<? echo $relative; ?>","<? echo rawurlencode($relative); ?>");		
		<? } ?>
		
		for(var i = 0; i < selection.length; i++)
		{
			var thisDir = selection.options[i].text;
			if(thisDir == currentDir)
			{
				selection.selectedIndex = i;
				break;
			}
		}		
<? } ?>
	}	

	function editImage(image) 
	{
		var url = "editor.php?img="+image;
		Dialog(url, function(param) 
		{
			if (!param) // user must have pressed Cancel
				return false;
			else
			{
				return true;
			}
		}, null);		
	}

/*]]>*/
</script>
<script type="text/javascript" src="assets/images.js"></script>

<SCRIPT LANGUAGE="JavaScript">
<!--
if(window.top.document.getElementById('manager_mode').value=="image")
emptyProperties();
<? if(isset($diskInfo)) echo 'updateDiskMesg("'.$diskInfo.'");'; ?>
//-->
</SCRIPT>

</head>

<body wrap="off">
<? if ($manager->isValidBase() == false) { drawErrorBase($manager); } 
	elseif(count($list[0]) > 0 || count($list[1]) > 0) { ?>




<TABLE border=0 cellpadding=0 cellspacing=0>
	<tr>
	<? drawDirs_Files($list, $manager); ?>
	</tr>
</table>
<? } else { drawNoResults(); } ?>
</body>
</html>
