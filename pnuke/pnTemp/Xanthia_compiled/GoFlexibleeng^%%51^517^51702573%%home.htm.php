<?php /* Smarty version 2.6.14, created on 2008-12-16 17:56:20
         compiled from modules/home.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'charset', 'modules/home.htm', 4, false),array('function', 'slogan', 'modules/home.htm', 5, false),array('function', 'sitename', 'modules/home.htm', 9, false),array('function', 'keywords', 'modules/home.htm', 14, false),array('function', 'title', 'modules/home.htm', 15, false),array('function', 'additional_header', 'modules/home.htm', 16, false),array('function', 'modulestylesheet', 'modules/home.htm', 22, false),array('function', 'footmsg', 'modules/home.htm', 120, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
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

<script type="text/javascript" src="/pnuke/javascript/dropdownmenu.js"></script>

<?php echo smarty_function_modulestylesheet(array('xhtml' => true), $this);?>

</head>
<body>

    <!-- HEADER -->
	  <!-- Background -->
    <div id="header-section">
      <img id="header-background-single" src="<?php echo $this->_tpl_vars['imagepath']; ?>
/MeanGreenLogo.jpg" alt=""/>
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

                    <a class="itemText" href="http://www.meangreensoftware.com" title="Go to top of site">Home</a>
    </div>
		  		</td>
			    <td width="2" bgcolor="#FFFFFF" ></td>
                <td height="10" align="left">
    <div id="menu0item1" onMouseover="dropdownmenu(this, event, menu1, '150px')" onMouseout="delayhidemenu(this)" class="topnavcell">

                    <a class="itemText" href="#">Services</a>
    </div>
		  		</td>
			    <td width="2" bgcolor="#FFFFFF" ></td>
				<td>
    <div id="menu0item2" onMouseover="dropdownmenu(this, event, menu2, '150px')" onMouseout="delayhidemenu(this)" class="topnavcell">

                    <a class="itemText" href="#">Industries</a>
    </div>
                </td>
			    <td width="2" bgcolor="#FFFFFF" ></td>
				<td>
    <div id="menu0item3" onMouseover="dropdownmenu(this, event, menu3, '150px')" onMouseout="delayhidemenu(this)" class="topnavcell">

                    <a class="itemText" href="#">Solutions</a>
    </div>
		  		</td>
			    <td width="2" bgcolor="#FFFFFF" ></td>
				<td>
    <div id="menu0item4" onMouseover="dropdownmenu(this, event, menu4, '150px')" onMouseout="delayhidemenu(this)" class="topnavcell">

                    <a class="itemText" href="#">About Us</a>
    </div>
		  		</td>
			    <td width="2" bgcolor="#FFFFFF" ></td>
                <td height="10" align="left">
    <div id="menu0item0" class="topnavcell" onMouseover="dropdownmenu(this, event, menu0, '0px')" onMouseout="delayhidemenu(this)" >

                    <a class="itemText" href="http://www.meangreensoftware.com" title="Connect with MeanGreen">Contact Us</a>
    </div>
		  		</td>
            </tr>
        </tbody>
        </table>
  </div>

	  <!-- LEFT COLUMN -->
	  <!-- Navigation -->
    <div id="left-column">
     <?php echo $this->_tpl_vars['leftblocks']; ?>

	</div>

	  <!-- MIDDLE COLUMN -->
    <div id="middle-column">
	 	 <?php echo $this->_tpl_vars['centerblocks']; ?>
		
		 <?php echo $this->_tpl_vars['maincontent']; ?>


	</div>

	  <!-- RIGHT COLUMN -->
    <div id="right-column">
		 <?php echo $this->_tpl_vars['rightblocks']; ?>
	
    </div>
    
	  <!-- FOOTER -->
    <div id="footer">
	    <div >
	      <img id="footer-image" src="<?php echo $this->_tpl_vars['imagepath']; ?>
/Grass_mat_short.png" alt="The grass is greener here..."/>
		</div>
     <?php echo smarty_function_footmsg(array(), $this);?>

       Copyright &copy; 2007 <a href="http://meangreensoftware.com">Mean Green Software</a> | All Rights Reserved | Design by <a href="mailto:lhale@meangreensoftware.com">Larry Hale</a> 
	</div>
</body>
</html>