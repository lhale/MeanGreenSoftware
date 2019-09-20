<?php /* Smarty version 2.6.14, created on 2008-10-28 06:42:23
         compiled from modules/home.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang', 'modules/home.htm', 2, false),array('function', 'title', 'modules/home.htm', 4, false),array('function', 'slogan', 'modules/home.htm', 5, false),array('function', 'keywords', 'modules/home.htm', 6, false),array('function', 'sitename', 'modules/home.htm', 7, false),array('function', 'charset', 'modules/home.htm', 9, false),array('function', 'modulestylesheet', 'modules/home.htm', 20, false),array('function', 'additional_header', 'modules/home.htm', 22, false),array('function', 'datetime', 'modules/home.htm', 31, false),array('function', 'displaygreeting', 'modules/home.htm', 31, false),array('function', 'pnbannerdisplay', 'modules/home.htm', 53, false),array('function', 'footmsg', 'modules/home.htm', 100, false),array('function', 'pagerendertime', 'modules/home.htm', 107, false),array('function', 'typetoolv80', 'modules/home.htm', 108, false),array('block', 'nocache', 'modules/home.htm', 107, false),)), $this); ?>
<?php $this->_cache_serials['pnTemp/Xanthia_compiled\PiterPanV2eng^%%51^517^51702573%%home.htm.inc'] = '5c2f377a1e9b8ad3a50fa226357ade21'; ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html lang="<?php echo smarty_function_lang(array(), $this);?>
">
<head>
<title><?php echo smarty_function_title(array(), $this);?>
</title>
<meta name="Description" content="<?php echo smarty_function_slogan(array(), $this);?>
">
<meta name="Keywords" content="<?php echo smarty_function_keywords(array(), $this);?>
">
<meta name="Author" content="<?php echo smarty_function_sitename(array(), $this);?>
">
<meta name="Copyright" content="Copyright (c) 2005 by <?php echo smarty_function_sitename(array(), $this);?>
">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo smarty_function_charset(array(), $this);?>
">
<meta name="Robots" content="index,follow">
<meta name="Resource-Type" content="document">
<meta http-equiv="Expires" content="0">
<meta name="Revisit-After" content="1 days">
<meta name="Distribution" content="Global">
<meta name="Generator" content="PostNuke - http://postnuke.com">
<meta name="Rating" content="General">
<link rel="alternate" href="backend.php" type="application/rss+xml" title="<?php echo smarty_function_sitename(array(), $this);?>
">
<link rel="icon" href="<?php echo $this->_tpl_vars['imagepath']; ?>
/icon.png" type="image/png">
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['imagepath']; ?>
/favicon.ico">
<?php echo smarty_function_modulestylesheet(array(), $this);?>

<link rel="StyleSheet" href="<?php echo $this->_tpl_vars['themepath']; ?>
/style/style.css" type="text/css">
<?php echo smarty_function_additional_header(array(), $this);?>

<script type="text/javascript" src="javascript/showimages.js"></script>
<script type="text/javascript" src="javascript/openwindow.js"></script>
</head>
<body>
<table style="background-color:#E9EDF5;" width="<?php echo $this->_tpl_vars['pagewidth']; ?>
" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td style="height:18px;" align="left" valign="middle">
			<span class="pn-title">
				&nbsp;<?php echo smarty_function_datetime(array(), $this);?>
&nbsp;-&nbsp;<?php echo smarty_function_displaygreeting(array(), $this);?>

			</span>
		</td>
	</tr>
	<tr>
		<td style="background-color:<?php echo $this->_tpl_vars['sepcolor']; ?>
;">
			<img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pix-t.gif" width="1" height="1" alt="" />
		</td>
	</tr>
</table>
<table style="background-color:#FEFEFE;background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/sasa.png);" width="<?php echo $this->_tpl_vars['pagewidth']; ?>
" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td rowspan="2" class="pn-title" valign="bottom" align="left">
			<object type="application/x-shockwave-flash" data="<?php echo $this->_tpl_vars['imagepath']; ?>
/title.swf?Text=<?php echo smarty_function_sitename(array(), $this);?>
&amp;slogan=<?php echo smarty_function_slogan(array(), $this);?>
" width="290" height="100">
			<param name="movie" value="<?php echo $this->_tpl_vars['imagepath']; ?>
/title.swf?Text=<?php echo smarty_function_sitename(array(), $this);?>
&amp;slogan=<?php echo smarty_function_slogan(array(), $this);?>
" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#FEFEFE" />
			<param name="menu" value="false" />
			</object>
			<a class="pn-logo" href="index.php"><?php echo smarty_function_sitename(array(), $this);?>
</a><br /><!--newtemplate-->
		</td>
		<td style="width:50%;" valign="middle" align="right">
			<?php echo smarty_function_pnbannerdisplay(array(), $this);?>

		</td>
	</tr>
	<tr>
		<td style="width:50%;" valign="bottom" align="right">
			<object type="application/x-shockwave-flash" data="<?php echo $this->_tpl_vars['imagepath']; ?>
/menu.swf" width="490" height="30">
			<param name="movie" value="<?php echo $this->_tpl_vars['imagepath']; ?>
/menu.swf" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#FEFEFE" />
			<param name="menu" value="false" />
			</object>
		</td>
	</tr>
</table>
<table width="<?php echo $this->_tpl_vars['pagewidth']; ?>
" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="9"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pix-t.gif" height="5" alt="" /></td>
	</tr>
	<tr>
		<td style="width:<?php echo $this->_tpl_vars['lcolwidth']; ?>
px;" align="center" valign="top">
			<!-- Left Block Start -->
			<?php echo $this->_tpl_vars['leftblocks']; ?>

			<!-- Left Block End -->
		</td>
		<td style="width:5px;"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pix-t.gif" width="5" height="1" alt="" /></td>
		<td style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/checkerboard.gif);"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pix-t.gif" width="1" height="1" alt="" /></td>
		<td style="width:5px;"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pix-t.gif" width="5" height="1" alt="" /></td>
		<td style="width:100%;" valign="top">
			<!-- Content Start -->
			<?php echo $this->_tpl_vars['centerblocks']; ?>

			<?php echo $this->_tpl_vars['maincontent']; ?>

			<!-- Content End -->
		</td>
		<td style="width:5px;"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pix-t.gif" width="5" height="1" alt="" /></td>
		<td style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/checkerboard.gif);"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pix-t.gif" width="1" height="1" alt="" /></td>
		<td style="width:5px;"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pix-t.gif" width="5" height="1" alt="" /></td>
		<td style="width:<?php echo $this->_tpl_vars['rcolwidth']; ?>
px;" align="center" valign="top">
			<!-- Right Block Start -->
			<?php echo $this->_tpl_vars['rightblocks']; ?>

			<!-- Right Block End -->
		</td>
	</tr>
</table>
<!-- Page footer table -->
<table width="<?php echo $this->_tpl_vars['pagewidth']; ?>
" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td style="height:36px;background-color:#FEFEFE;text-align:center;" valign="middle">
			<?php echo smarty_function_footmsg(array(), $this);?>

		</td>
	</tr>
	<tr>
		<td style="background-color:<?php echo $this->_tpl_vars['sepcolor']; ?>
;"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pix-t.gif" width="1" height="1" alt="" /></td>
	</tr>
</table>
<?php if ($this->caching && !$this->_cache_including) { echo '{nocache:5c2f377a1e9b8ad3a50fa226357ade21#0}'; };$this->_tag_stack[] = array('nocache', array()); $_block_repeat=true;pnRender_block_nocache($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start();  echo smarty_function_pagerendertime(array(), $this); $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo pnRender_block_nocache($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); if ($this->caching && !$this->_cache_including) { echo '{/nocache:5c2f377a1e9b8ad3a50fa226357ade21#0}'; }; echo smarty_function_typetoolv80(array(), $this);?>

</body>
</html>