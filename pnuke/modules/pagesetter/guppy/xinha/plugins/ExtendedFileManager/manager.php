<?
/**
 * The main GUI for the ExtendedFileManager.
 * Authors: Wei Zhuo, Afru
 * Version: Updated on 08-01-2005 by Afru
 * Package: ExtendedFileManager (EFM 1.0 beta)
 * http://www.afrusoft.com/htmlarea
 */

	if(isset($_REQUEST['mode'])) $insertMode=$_REQUEST['mode'];
	if(!isset($insertMode)) $insertMode="image";

	require_once('config.inc.php');
	require_once('Classes/ExtendedFileManager.php');
	
	$manager = new ExtendedFileManager($IMConfig);
	$dirs = $manager->getDirs();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	<title>Insert File</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link href="assets/manager.css" rel="stylesheet" type="text/css" />	
<script type="text/javascript" src="assets/popup.js"></script>
<script type="text/javascript" src="assets/dialog.js"></script>
<script type="text/javascript">
/*<![CDATA[*/
	window.resizeTo(600, 460);

	if(window.opener)
		I18N = window.opener.ExtendedFileManager.I18N;

	var thumbdir = "<? echo $IMConfig['thumbnail_dir']; ?>";
	var base_url = "<? echo $manager->getBaseURL(); ?>";
	
	<?
	if(isset($_REQUEST['mode']))
	{
		echo 'var manager_mode="'.$_REQUEST['mode'].'";';
	}
	else
	{
		echo 'var manager_mode="image";';
	}
	?>
/*]]>*/
</script>
<script type="text/javascript" src="assets/manager.js"></script>
</head>
<body>
<div class="title">File Manager</div>
<form action="images.php?mode=<?echo $insertMode;?>" id="uploadForm" method="post" enctype="multipart/form-data">
<fieldset><legend>File Manager</legend>


<TABLE border=0 cellpadding=0 cellspacing=0>
<TR>
<TD nowrap style="padding:10px;">

	<label for="dirPath">Directory</label>
	<select name="dir" class="dirWidth" id="dirPath" onchange="updateDir(this)">
	<option value="/">/</option>
<? foreach($dirs as $relative=>$fullpath) { ?>
		<option value="<? echo rawurlencode($relative); ?>"><? echo $relative; ?></option>
<? } ?>
	</select>

	<a href="#" onclick="javascript: goUpDir();" title="Directory Up"><img src="img/btnFolderUp.gif" height="15" width="15" alt="Directory Up" /></a>


<? if($IMConfig['safe_mode'] == false && $IMConfig['allow_new_dir']) { ?>
	<a href="#" onclick="newFolder();" title="New Folder"><img src="img/btnFolderNew.gif" height="15" width="15" alt="New Folder" /></a>
<? } ?>

	<select name="viewtype" id="viewtype" onChange="updateView()">
	<option value="thumbview" <? if($IMConfig['view_type']=="thumbview") echo "selected";?> >Thumbnail View</option>
	<option value="listview" <? if($IMConfig['view_type']=="listview") echo "selected";?> >List View</option>
	</select>


</TD>
</TR>

<TR><TD style="padding:10px; padding-top:0px;">

	<div id="messages" style="display: none;"><span id="message"></span><img SRC="img/dots.gif" width="22" height="12" alt="..." /></div>
	<iframe src="images.php?mode=<?echo $insertMode;?>" name="imgManager" id="imgManager" class="imageFrame" scrolling="auto" title="Image Selection" frameborder="0"></iframe>

</TD></TR>

</TABLE>
</fieldset>
<!-- image properties -->
	<table class="inputTable">
		<tr>
			<td align="right" nowrap><label for="f_url"><?if($insertMode=='image') echo 'File Name'; else echo 'URL';?></label></td>
			<td><input type="text" id="<?if($insertMode=='image') echo 'f_url'; else echo 'f_href';?>" class="largelWidth" value="" /></td>
			<td rowspan="3" align="right"><input type="hidden" id="manager_mode" value="<?echo $insertMode;?>">&nbsp;</td>

			<td align="right"><? if($insertMode=='image') { ?> <label for="f_width">Width</label><?}?></td>

			<td><? if($insertMode=='image') { ?> <input type="text" id="f_width" class="smallWidth" value="" onchange="javascript:checkConstrains('width');"/><?} else echo "&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp";?></td>

			<td rowspan="2" align="right"><? if($insertMode=='image') { ?><img src="img/locked.gif" id="imgLock" width="25" height="32" alt="Constrained Proportions" /><?}?></td>

			<td rowspan="3" align="right">&nbsp;</td>

			<td align="right"><? if($insertMode=='image') { ?><label for="f_vert">V Space</label><?}?></td>

			<td><?if($insertMode=='image') { ?><input type="text" id="f_vert" class="smallWidth" value="" /><?} else if($insertMode=="link") {?><label for="f_align">Target Window</label><?}?></td>
		</tr>		
		<tr>
			<td align="right"><label for="f_alt"><?if($insertMode=='image') echo 'Alt'; else echo 'Title (tooltip)';?></label></td>
			<td><input type="text" id="<?if($insertMode=='image') echo 'f_alt'; else echo 'f_title';?>" class="largelWidth" value="" /></td>

			<td align="right"><?if($insertMode=='image') { ?><label for="f_height">Height</label><?}?></td>

			<td><?if($insertMode=='image') { ?><input type="text" id="f_height" class="smallWidth" value="" onchange="javascript:checkConstrains('height');"/><?}?></td>

			<td align="right"><?if($insertMode=='image') { ?><label for="f_horiz">H Space</label><?}?></td>

			<td><?if($insertMode=='image') { ?><input type="text" id="f_horiz" class="smallWidth" value="" /><?}else if($insertMode=='link') { ?>
			<select id="f_target" style="width:125px;">
			  <option value="">None (use implicit)</option>
			  <option value="_blank">New window (_blank)</option>
			  <option value="_self">Same frame (_self)</option>
		      <option value="_top">Top frame (_top)</option>
		    </select>
			<?}?></td>
		</tr>
		<tr>
<?
if(Files::dirSize($manager->getBaseDir())>($IMConfig['max_foldersize_mb']*1048576))
{ ?>
	<td colspan="2" align="right">Maximum folder size limit reached. Upload disabled.</td>
<?}
else if($IMConfig['allow_upload'] == true) { ?>
			<td align="right"><label for="upload">Upload</label></td>
			<td>
				<table cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td><input type="hidden" name="MAX_FILE_SIZE" value="<? echo ($IMConfig['max_filesize_kb']*1024); ?>" />
<input type="file" name="upload" id="upload"/></td>
                    <td>&nbsp;<button type="submit" name="submit" onclick="doUpload();"/>Upload</button></td>
                  </tr>
                </table>
			</td>
<? } else { ?>
			<td colspan="2"></td>
<? } ?>
			<td align="right"><?if($insertMode=='image') { ?><label for="f_align">Align</label><?}?></td>

			<td colspan="2"><?if($insertMode=='image') { ?>
				<select size="1" id="f_align"  title="Positioning of this image">
				  <option value=""                             >Not Set</option>
				  <option value="left"                         >Left</option>
				  <option value="right"                        >Right</option>
				  <option value="texttop"                      >Texttop</option>
				  <option value="absmiddle"                    >Absmiddle</option>
				  <option value="baseline" selected="selected" >Baseline</option>
				  <option value="absbottom"                    >Absbottom</option>
				  <option value="bottom"                       >Bottom</option>
				  <option value="middle"                       >Middle</option>
				  <option value="top"                          >Top</option>
				</select><?}?>
			</td>

			<td align="right"><?if($insertMode=='image') { ?><label for="f_border">Border</label><?}?></td>
			<td><?if($insertMode=='image') { ?><input type="text" id="f_border" class="smallWidth" value="" /><?}else if($insertMode=='link') { ?><input type="text" name="f_other_target" id="f_other_target" style="visibility:hidden; width:120px;" /><?}?></td>
		</tr>
		<tr>
		 <td></td>
		 <td> <span id="diskmesg"></span><?
/*		
	*/

		  ?></td>
         <td colspan="2" align="right"><?if($insertMode=='image') { ?>
				<input type="hidden" id="orginal_width" />
				<input type="hidden" id="orginal_height" />
            <input type="checkbox" id="constrain_prop" checked="checked" onclick="javascript:toggleConstrains(this);" /><?}?>
          </td>
          <td colspan="5"><?if($insertMode=='image') { ?><label for="constrain_prop">Constrain Proportions</label><?}?></td>
      </tr>
	</table>
<!--// image properties -->	
	<div style="text-align: right;"> 
          <hr />
		  <button type="button" class="buttons" onclick="return refresh();">Refresh</button>
          <button type="button" class="buttons" onclick="return onOK();">OK</button>
          <button type="button" class="buttons" onclick="return onCancel();">Cancel</button>
    </div>
</form>
</body>
</html>