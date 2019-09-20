<?php /* Smarty version 2.6.14, created on 2019-08-25 00:40:15
         compiled from master.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'charset', 'master.htm', 4, false),array('function', 'slogan', 'master.htm', 5, false),array('function', 'sitename', 'master.htm', 9, false),array('function', 'keywords', 'master.htm', 14, false),array('function', 'title', 'master.htm', 15, false),array('function', 'additional_header', 'master.htm', 16, false),array('function', 'modulestylesheet', 'master.htm', 23, false),array('function', 'footmsg', 'master.htm', 123, false),)), $this); ?>
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
<!--  <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['themepath']; ?>
/style/print.css" media="print" />  (found in xneucleus theme only)  -->

<script type="text/javascript" src="/pnuke/javascript/dropdownmenu.js"></script>
<script type="text/javascript" src="/pnuke/javascript/floatingmenu.js"></script>

<?php echo smarty_function_modulestylesheet(array('xhtml' => true), $this);?>

</head>
<body>

    <!-- HEADER -->
	  <!-- Background -->
    <div id="header-section">
      <img id="header-background-single" src="<?php echo $this->_tpl_vars['imagepath']; ?>
/MeanGreenLogo2.jpg" alt="Mean Green Software"/>
	</div>

	  <!-- Navigation -->
<!-- original GoFlexible nav
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
-->

<!-- Use a style sheet + DHTML based approach for the nav header -->
  <div class="topnavbar">
        <table  cellspacing="0" cellpadding="0" border="0" >
        <tbody>
            <tr align="center">
                <td height="10" align="left">
    <div id="menu0item0" class="topnavcell" onMouseover="dropdownmenu(this, event, menu0, '0px')" onMouseout="delayhidemenu(this)" >

                    <a class="itemText" href="/pnuke/index.php" title="Go to top of site">Home</a>
    </div>
		  		</td>
			    <td width="2" bgcolor="#FFFFFF" ></td>
                <td height="10" align="left">
    <div id="menu0item1" onMouseover="dropdownmenu(this, event, menu1, '170px')" onMouseout="delayhidemenu(this)" class="topnavcell">

                    <a class="itemText" href="/pnuke/index.php?module=htmlpages&func=display&pid=2">Services</a>
    </div>
		  		</td>
			    <td width="2" bgcolor="#FFFFFF" ></td>
				<td>
    <div id="menu0item2" onMouseover="dropdownmenu(this, event, menu2, '170px')" onMouseout="delayhidemenu(this)" class="topnavcell">

                    <a class="itemText" href="/pnuke/index.php?module=htmlpages&func=display&menu_title=Industries&pid=3">Industries</a>
    </div>
                </td>
			    <td width="2" bgcolor="#FFFFFF" ></td>
				<td>
    <div id="menu0item3" onMouseover="dropdownmenu(this, event, menu3, '170px')" onMouseout="delayhidemenu(this)" class="topnavcell">

                    <a class="itemText" href="/pnuke/index.php?module=htmlpages&func=display&menu_title=Solutions&pid=4">Solutions</a>
    </div>
		  		</td>
			    <td width="2" bgcolor="#FFFFFF" ></td>
				<td>
    <div id="menu0item4" onMouseover="dropdownmenu(this, event, menu4, '170px')" onMouseout="delayhidemenu(this)" class="topnavcell">

                    <a class="itemText" href="/pnuke/index.php?module=htmlpages&func=display&menu_title=About Us&pid=5">About Us</a>
    </div>
		  		</td>
			    <td width="2" bgcolor="#FFFFFF" ></td>
                <td height="10" align="left">
    <div id="menu0item0" class="topnavcell" onMouseover="dropdownmenu(this, event, menu0, '0px')" onMouseout="delayhidemenu(this)" >

                    <a class="itemText" href="/pnuke/index.php?module=htmlpages&func=display&pid=1" title="Connect with MeanGreen">Contact Us</a>
    </div>
		  		</td>
            </tr>
        </tbody>
        </table>
  </div>

<div id="wrap">
	  <!-- LEFT COLUMN -->
	  <!-- Navigation -->
    <div id="divTopLeft">
        <?php echo $this->_tpl_vars['leftblocks']; ?>

    </div>
	
	  <!-- MIDDLE COLUMN -->
    <div id="middle-column1">
        <div style="margin-left:10px;margin-top:10px;">
		    <?php echo $this->_tpl_vars['maincontent']; ?>

		</div>
	</div>

	  <!-- RIGHT COLUMN -->
    <div id="right-column">
		 <?php echo $this->_tpl_vars['rightblocks']; ?>
	
    </div>
</div>  <!--  end wrap -->
    
	  <!-- FOOTER -->
    <div id="footer">
	    <div style="height: 50px; overflow:hidden;">
	      <img id="footer-image" src="<?php echo $this->_tpl_vars['imagepath']; ?>
/Grass_mat_short2.jpg" alt="The grass is greener here..." />
		</div>
	    <?php echo smarty_function_footmsg(array(), $this);?>

       Copyright &copy; 2007-2009 <a href="http://www.meangreensoftware.com">Mean Green Software</a> | All Rights Reserved | Design by <a href="mailto:lhale@meangreensoftware.com">Mean Green Software</a>
    </div>

<script type="text/javascript" >
JSFX_FloatDiv("divTopLeft", 2,2).floatIt();
</script>
<!-- ********************************************************* -->
    
</body>
</html>