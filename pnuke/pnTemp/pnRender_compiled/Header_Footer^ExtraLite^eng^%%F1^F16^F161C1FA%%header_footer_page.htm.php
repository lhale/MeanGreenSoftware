<?php /* Smarty version 2.6.14, created on 2007-09-03 08:26:22
         compiled from header_footer_page.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang', 'header_footer_page.htm', 2, false),array('function', 'title', 'header_footer_page.htm', 4, false),array('function', 'slogan', 'header_footer_page.htm', 5, false),array('function', 'keywords', 'header_footer_page.htm', 6, false),array('function', 'sitename', 'header_footer_page.htm', 7, false),array('function', 'charset', 'header_footer_page.htm', 9, false),array('function', 'modulestylesheet', 'header_footer_page.htm', 20, false),array('function', 'additional_header', 'header_footer_page.htm', 22, false),array('function', 'pagerendertime', 'header_footer_page.htm', 32, false),array('function', 'typetoolv80', 'header_footer_page.htm', 33, false),array('block', 'nocache', 'header_footer_page.htm', 32, false),)), $this); ?>
<?php $this->_cache_serials['pnTemp/pnRender_compiled\Header_Footer^ExtraLite^eng^%%F1^F16^F161C1FA%%header_footer_page.htm.inc'] = '1c2c5d9465a2884a707fa957d793852f'; ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo smarty_function_lang(array(), $this);?>
">
<head>
<title><?php echo smarty_function_title(array(), $this);?>
</title>
<meta name="Description" content="<?php echo smarty_function_slogan(array(), $this);?>
" />
<meta name="Keywords" content="<?php echo smarty_function_keywords(array(), $this);?>
" />
<meta name="Author" content="<?php echo smarty_function_sitename(array(), $this);?>
" />
<meta name="Copyright" content="Copyright (c) 2005 by <?php echo smarty_function_sitename(array(), $this);?>
" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo smarty_function_charset(array(), $this);?>
" />
<meta name="Robots" content="index,follow" />
<meta name="Resource-Type" content="document" />
<meta http-equiv="Expires" content="0" />
<meta name="Revisit-After" content="1 days" />
<meta name="Distribution" content="Global" />
<meta name="Generator" content="PostNuke - http://postnuke.com" />
<meta name="Rating" content="General" />
<link rel="alternate" href="backend.php" type="application/rss+xml" title="<?php echo smarty_function_sitename(array(), $this);?>
" />
<link rel="icon" href="<?php echo $this->_tpl_vars['imagepath']; ?>
/icon.png" type="image/png" />
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['imagepath']; ?>
/favicon.ico" />
<?php echo smarty_function_modulestylesheet(array('xhtml' => true), $this);?>

<?php echo smarty_function_modulestylesheet(array('stylesheet' => "admin.css",'modname' => 'admin','xhtml' => true), $this);?>

<?php echo smarty_function_additional_header(array(), $this);?>

<link rel="stylesheet" href="<?php echo $this->_tpl_vars['themepath']; ?>
/style/styleNN.css" type="text/css" />
<style type="text/css">
@import url("<?php echo $this->_tpl_vars['themepath']; ?>
/style/style.css");
</style>
<script type="text/javascript" src="javascript/showimages.js"></script>
<script type="text/javascript" src="javascript/openwindow.js"></script>
</head>
<body>
<?php echo $this->_tpl_vars['maincontent']; ?>

<?php if ($this->caching && !$this->_cache_including) { echo '{nocache:1c2c5d9465a2884a707fa957d793852f#0}'; };$this->_tag_stack[] = array('nocache', array()); $_block_repeat=true;pnRender_block_nocache($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start();  echo smarty_function_pagerendertime(array(), $this); $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo pnRender_block_nocache($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); if ($this->caching && !$this->_cache_including) { echo '{/nocache:1c2c5d9465a2884a707fa957d793852f#0}'; }; echo smarty_function_typetoolv80(array(), $this);?>

</body>
</html>