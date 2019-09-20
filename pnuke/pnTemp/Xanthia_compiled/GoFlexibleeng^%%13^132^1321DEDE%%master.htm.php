<?php /* Smarty version 2.6.14, created on 2008-11-03 13:55:56
         compiled from master.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'charset', 'master.htm', 4, false),array('function', 'slogan', 'master.htm', 5, false),array('function', 'sitename', 'master.htm', 9, false),array('function', 'keywords', 'master.htm', 14, false),array('function', 'title', 'master.htm', 15, false),array('function', 'additional_header', 'master.htm', 16, false),array('function', 'modulestylesheet', 'master.htm', 20, false),array('function', 'footmsg', 'master.htm', 58, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
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

<link rel="stylesheet" type="text/css"  href="<?php echo $this->_tpl_vars['themepath']; ?>
/style/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['themepath']; ?>
/style/print.css" media="print" />

<?php echo smarty_function_modulestylesheet(array('xhtml' => true), $this);?>

</head>
<body>
<div id="wrap">

    <!-- HEADER -->
	  <!-- Background -->
    <div id="header-section">
      <img id="header-background-single" src="<?php echo $this->_tpl_vars['imagepath']; ?>
/MeanGreenLogo.jpg" alt="Mean Green Software"/>
		</div>

	  <!-- Navigation -->
    <div id="header">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?name=CmodsDownload">Download</a></li>
        <li><a href="index.php?name=CmodsWebLinks">Weblinks</a></li>
        <li class="selected"><a href="index.php?name=pnForum">Forum</a></li>
        <li><a href="index.php">Kontakt</a></li>  
        <li><a href="index.php">Registrierung</a></li>
      </ul>
    </div>

	  <!-- LEFT COLUMN -->
	  <!-- Navigation -->
    <div id="left-column">
     <?php echo $this->_tpl_vars['leftblocks']; ?>

</div>
	

	  <!-- MIDDLE COLUMN -->
    <div id="middle-column1">
	 	
		 <?php echo $this->_tpl_vars['maincontent']; ?>

		</div>

	  <!-- FOOTER -->
    <div id="footer">
	<?php echo smarty_function_footmsg(array(), $this);?>
<br />
       Copyright &copy; 2006 <a href="http://www.cmods-dev.de">Cmods-dev</a> | All Rights Reserved | Design by <a href="mailto:gw@actamail.com">Gerhard Erbes</a>
    </div>
</div>
</body>
</html>