<?php /* Smarty version 2.6.14, created on 2008-10-27 17:23:11
         compiled from modules/user.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang', 'modules/user.tpl', 3, false),array('function', 'charset', 'modules/user.tpl', 5, false),array('function', 'slogan', 'modules/user.tpl', 6, false),array('function', 'sitename', 'modules/user.tpl', 10, false),array('function', 'pnml', 'modules/user.tpl', 14, false),array('function', 'keywords', 'modules/user.tpl', 16, false),array('function', 'title', 'modules/user.tpl', 17, false),array('function', 'additional_header', 'modules/user.tpl', 25, false),array('function', 'modulestylesheet', 'modules/user.tpl', 26, false),array('function', 'pnimg', 'modules/user.tpl', 57, false),array('function', 'datetime', 'modules/user.tpl', 74, false),array('function', 'theme', 'modules/user.tpl', 89, false),array('function', 'footmsg', 'modules/user.tpl', 104, false),array('function', 'pagerendertime', 'modules/user.tpl', 106, false),array('function', 'typetoolv80', 'modules/user.tpl', 106, false),array('block', 'nocache', 'modules/user.tpl', 106, false),)), $this); ?>
<?php $this->_cache_serials['pnTemp/Xanthia_compiled\dpXanXPStyleSilvereng^%%2E^2E7^2E74914A%%user.tpl.inc'] = 'f291d3d93b569795820d7e49fc047ab3'; ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- LDH- for some reason, */user.php hlinks refer here instead of master.tpl -->
<html lang="<?php echo smarty_function_lang(array(), $this);?>
">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo smarty_function_charset(array(), $this);?>
">
<meta name="DESCRIPTION" content="<?php echo smarty_function_slogan(array(), $this);?>
">
<meta name="ROBOTS" content="INDEX,FOLLOW">
<meta name="resource-type" content="document">
<meta http-equiv="expires" content="0">
<meta name="author" content="<?php echo smarty_function_sitename(array(), $this);?>
">
<meta name="copyright" content="Copyright (c) 2004 by <?php echo smarty_function_sitename(array(), $this);?>
">
<meta name="revisit-after" content="1 days">
<meta name="distribution" content="Global">
<meta name="generator" content="PostNuke <?php echo smarty_function_pnml(array('name' => '_PN_VERSION_NUM'), $this);?>
 - http://www.dev-postnuke.com">
<meta name="rating" content="General">
<meta name="KEYWORDS" content="<?php echo smarty_function_keywords(array(), $this);?>
">
<title><?php echo smarty_function_title(array(), $this);?>
</title>
<link rel="StyleSheet" href="<?php echo $this->_tpl_vars['themepath']; ?>
/style/styleNN.css" type="text/css">
<link rel="StyleSheet" href="<?php echo $this->_tpl_vars['themepath']; ?>
/style/us4earthOrig.css" type="text/css">
<link rel="icon" href="<?php echo $this->_tpl_vars['imagepath']; ?>
/icon.png" type="image/png">
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['imagepath']; ?>
/favicon.ico">
<style type="text/css">
@import url("<?php echo $this->_tpl_vars['themepath']; ?>
/style/style.css");
</style>
<?php echo smarty_function_additional_header(array(), $this);?>

<?php echo smarty_function_modulestylesheet(array(), $this);?>

<script type="text/javascript" src="/pnuke/javascript/master.js">
</script>
</head>


<!-- CABECERA -->
<!-- LOGO -->
<table cellpadding="0" cellspacing="0" width="<?php echo $this->_tpl_vars['pagewidth']; ?>
" border="0" bgcolor="<?php echo $this->_tpl_vars['bgcolor']; ?>
">
<tr>
<!-- 
<td bgcolor="<?php echo $this->_tpl_vars['bgcolor']; ?>
" align="center"><a href="index.php"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/Apollo8earthrise.jpg" width="79" alt="Theme by us4earth.com"/></a></td>
-->
<td bgcolor="<?php echo $this->_tpl_vars['bgcolor']; ?>
" align="center"><a href="index.php"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/nature3.jpg" width="64" alt="Theme by us4earth.com"/></a>
</td>
<td align="center" ><p><a class="Banner" href="http://localhost/pnuke/index.php?module=PostWrap&page=participate"> Us4Earth - You Are Invited To Join Our Adventures!</a>
</p>
</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" width="<?php echo $this->_tpl_vars['pagewidth']; ?>
" border="0" align="center" bgcolor="<?php echo $this->_tpl_vars['bgcolor']; ?>
">
<tr valign="middle" bgcolor="<?php echo $this->_tpl_vars['bgcolor']; ?>
">
<!--  
   	<td align="center" width="10" height="32"style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/Buttonleiste/leilinks_2.jpg)">
	</td>
-->
    <td valign="middle" align="left" height="30" >        
		<a onmouseover="return FP_swapImg(1,0,/*id*/'TAB1',/*url*/'<?php echo $this->_tpl_vars['imagepath']; ?>
/YurInvited4.1.png');"
		    onmouseout="return FP_swapImg(0,0,'TAB1','<?php echo $this->_tpl_vars['imagepath']; ?>
/YurInvited3.png');"
		    onmousedown="return FP_swapImg(1,0,'TAB1','<?php echo $this->_tpl_vars['imagepath']; ?>
/YurInvited4.png');"
			href="<?php echo smarty_function_pnml(array('name' => '_LINK1'), $this);?>
"><?php echo smarty_function_pnimg(array('src' => "YurInvited3.png",'id' => 'TAB1','height' => '30'), $this);?>
</a>
		<a onmouseover="return FP_swapImg(1,0,/*id*/'TAB2',/*url*/'<?php echo $this->_tpl_vars['imagepath']; ?>
/Volunteer2.1.png');"
		    onmouseout="return FP_swapImg(0,0,'TAB2','<?php echo $this->_tpl_vars['imagepath']; ?>
/Volunteer2.png');"
		    onmousedown="return FP_swapImg(1,0,'TAB2','<?php echo $this->_tpl_vars['imagepath']; ?>
/Volunteer.png');"
			href="<?php echo smarty_function_pnml(array('name' => '_LINK2'), $this);?>
"><?php echo smarty_function_pnimg(array('src' => "Volunteer2.png",'id' => 'TAB2','height' => '30'), $this);?>
</a>
		<a onmouseover="return FP_swapImg(1,0,/*id*/'TAB3',/*url*/'<?php echo $this->_tpl_vars['imagepath']; ?>
/Donate2.1.png');"
		    onmouseout="return FP_swapImg(0,0,'TAB3','<?php echo $this->_tpl_vars['imagepath']; ?>
/Donate2.png');"
		    onmousedown="return FP_swapImg(1,0,'TAB3','<?php echo $this->_tpl_vars['imagepath']; ?>
/Donate.png');"
			href="<?php echo smarty_function_pnml(array('name' => '_LINK3'), $this);?>
"><?php echo smarty_function_pnimg(array('src' => "Donate2.png",'id' => 'TAB3','height' => '30'), $this);?>
</a>
		<a onmouseover="return FP_swapImg(1,0,/*id*/'TAB4',/*url*/'<?php echo $this->_tpl_vars['imagepath']; ?>
/ContactUs2.1.png');"
		    onmouseout="return FP_swapImg(0,0,'TAB4','<?php echo $this->_tpl_vars['imagepath']; ?>
/ContactUs2.png');"
		    onmousedown="return FP_swapImg(1,0,'TAB4','<?php echo $this->_tpl_vars['imagepath']; ?>
/ContactUs.png');"
			href="<?php echo smarty_function_pnml(array('name' => '_LINK4'), $this);?>
"><?php echo smarty_function_pnimg(array('src' => "ContactUs2.png",'id' => 'TAB4','height' => '30'), $this);?>
</a>
<!-- Not added: onmouseup=onmouseover -->
   	</td>
   	<!-- 
   	<td align="center" width="100" height="32"style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/Buttonleiste/leilinks_2.jpg)">
		<font class="content"><?php echo smarty_function_datetime(array(), $this);?>
</font>
	</td>
	 -->
</tr>
</table>

<!-- BLOQUES DERECHO - CENTRAL - IZQUIERDO -->
<table width="<?php echo $this->_tpl_vars['pagewidth']; ?>
" cellpadding="0" cellspacing="0" border="0" bgcolor="<?php echo $this->_tpl_vars['bgcolor']; ?>
" align="center">
<tr valign="top">
<!-- 
	<td bgcolor="<?php echo $this->_tpl_vars['color5']; ?>
"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pixel.gif" width="5" height="1" border="0" alt=""></td>
 -->
    <td valign="top" bgcolor="<?php echo $this->_tpl_vars['bgcolor']; ?>
" width="<?php echo $this->_tpl_vars['lcolwidth']; ?>
" style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/block_left/fond_titre2.1.jpg)">
        <!-- Left Block Start -->
		<?php echo $this->_tpl_vars['leftblocks']; ?>

		<?php echo smarty_function_theme(array(), $this);?>

		<!-- Left Block End -->
	</td>
    <td bgcolor="<?php echo $this->_tpl_vars['bgcolor']; ?>
"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pixel.gif" width="5" height="1" border="0" alt="" style="border-top:solid 0.5pt;" ></td>       
	<td valign="top" align="center" width="100%" style="border-top:solid 0.5pt;" >
		<!-- Content Start -->			
		<?php echo $this->_tpl_vars['maincontent']; ?>

		<!-- Content End -->
	</td>
	<td style="background-image:url(<?php echo $this->_tpl_vars['imagepath']; ?>
/block-right/side.gif)"><img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/pixel.gif" width="15" height="1" border="0" alt=""></td>
</tr>
</table>
<!-- FIN DE BLOQUES -->
	
<div style="text-align:center;" class="pn-sub">
<?php echo smarty_function_footmsg(array(), $this);?>

<br /><br />
<?php if ($this->caching && !$this->_cache_including) { echo '{nocache:f291d3d93b569795820d7e49fc047ab3#0}'; };$this->_tag_stack[] = array('nocache', array()); $_block_repeat=true;pnRender_block_nocache($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start();  echo smarty_function_pagerendertime(array(), $this); $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo pnRender_block_nocache($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); if ($this->caching && !$this->_cache_including) { echo '{/nocache:f291d3d93b569795820d7e49fc047ab3#0}'; }; echo smarty_function_typetoolv80(array(), $this);?>

</div>

</body>
</html>