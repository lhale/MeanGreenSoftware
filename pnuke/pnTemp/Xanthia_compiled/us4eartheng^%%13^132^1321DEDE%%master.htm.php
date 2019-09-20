<?php /* Smarty version 2.6.14, created on 2007-09-28 15:14:28
         compiled from master.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'charset', 'master.htm', 5, false),array('function', 'slogan', 'master.htm', 6, false),array('function', 'sitename', 'master.htm', 10, false),array('function', 'keywords', 'master.htm', 15, false),array('function', 'title', 'master.htm', 16, false),array('function', 'additional_header', 'master.htm', 17, false),array('function', 'modulestylesheet', 'master.htm', 19, false),array('function', 'footmsg', 'master.htm', 55, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo smarty_function_charset(array(), $this);?>
" />
<meta name="description" content="<?php echo smarty_function_slogan(array(), $this);?>
" />
<meta name="robots" content="index,follow" />
<meta name="resource-type" content="document" />
<meta http-equiv="expires" content="0" />
<meta name="author" content="<?php echo smarty_function_sitename(array(), $this);?>
" />
<meta name="copyright" content="Copyright (c) 2004 by <?php echo smarty_function_sitename(array(), $this);?>
" />
<meta name="revisit-after" content="1 days" />
<meta name="distribution" content="Global" />
<meta name="rating" content="General" />
<meta name="KEYWORDS" content="<?php echo smarty_function_keywords(array(), $this);?>
" />
<title><?php echo smarty_function_title(array(), $this);?>
</title>
<?php echo smarty_function_additional_header(array(), $this);?>

<link rel="stylesheet" type="text/css" title="style" href="<?php echo $this->_tpl_vars['themepath']; ?>
/style/style.css" />
<?php echo smarty_function_modulestylesheet(array('xhtml' => true), $this);?>

</head>
<body>
<div id="menu">
	<ul>
		<li class="active"><a href="#" accesskey="1" title="">Home</a></li>
		<li><a href="#" accesskey="2" title="">Blogs</a></li>
		<li><a href="#" accesskey="3" title="">Photos</a></li>
		<li><a href="#" accesskey="4" title="">Links</a></li>
		<li><a href="#" accesskey="5" title="">About</a></li>
		<li><a href="#" accesskey="6" title="">Contact</a></li>
	</ul>
</div>
<!-- end #menu -->
<div id="header">
	<div id="logo">
		<h1><a href="#"><?php echo smarty_function_sitename(array(), $this);?>
</a></h1>
	</div>
	<div id="banner"><a href="#"><?php echo smarty_function_slogan(array(), $this);?>
</a></div>
</div>
<!-- end #header -->
<div id="page">
	<div id="content">
	<?php echo $this->_tpl_vars['maincontent']; ?>

	</div>
	<!-- end #content -->
	<div id="sidebar">
	<?php echo $this->_tpl_vars['leftblocks']; ?>

	</div>
	<!-- end #sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->
<div id="footer">
<!-- PLEASE DO NOT REMOVE THESE LINES -->  
	<p id="legal">Copyright &copy; 2007 Aquaria. Designed by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></p>
	<p id="links">-- Xanthia by:<a title="Your PostNuke Theme Resource" href="http://www.cmods-dev.de/">cmods-dev</a><?php echo smarty_function_footmsg(array(), $this);?>
	</p>
</div>
<!-- end #footer -->
</body>
</html>