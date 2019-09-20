<?php /* Smarty version 2.6.14, created on 2007-10-09 10:10:10
         compiled from default/views/global/details_navigation.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'default/views/global/details_navigation.html', 2, false),array('function', 'pc_form_nav_open', 'default/views/global/details_navigation.html', 24, false),array('function', 'pc_date_select', 'default/views/global/details_navigation.html', 28, false),array('function', 'pc_url', 'default/views/global/details_navigation.html', 40, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "navigation.conf"), $this);?>

<?php echo smarty_function_config_load(array('file' => "lang.".($this->_tpl_vars['USER_LANG'])), $this);?>


<style type="text/css">
.bnav 			{ border: 1px solid #000000; }
td.nav  		{ border-right: 1px outset <?php echo $this->_tpl_vars['BGCOLOR3']; ?>
; background-color:<?php echo $this->_tpl_vars['BGCOLOR3']; ?>
; }
td.nav:hover 	{ border-right: 1px outset <?php echo $this->_tpl_vars['BGCOLOR3']; ?>
; background-color:<?php echo $this->_tpl_vars['BGCOLOR2']; ?>
; }
td.rnav 		{ background-color:<?php echo $this->_tpl_vars['BGCOLOR3']; ?>
; }
td.rnav:hover 	{ background-color:<?php echo $this->_tpl_vars['BGCOLOR2']; ?>
; }
td.snav 		{ border-right: 1px outset <?php echo $this->_tpl_vars['BGCOLOR3']; ?>
; background-color:<?php echo $this->_tpl_vars['BGCOLOR1']; ?>
; font-weight : bold; }
td.rsnav 		{ background-color:<?php echo $this->_tpl_vars['BGCOLOR1']; ?>
; font-weight : bold; }
a.nav:link  	{ padding-right: 3px; padding-left: 3px; color: <?php echo $this->_tpl_vars['TEXTCOLOR1']; ?>
; text-decoration: none; }
a.nav:active 	{ padding-right: 3px; padding-left: 3px; color: <?php echo $this->_tpl_vars['TEXTCOLOR1']; ?>
; text-decoration: none; }
a.nav:hover 	{ padding-right: 3px; padding-left: 3px; color: <?php echo $this->_tpl_vars['TEXTCOLOR1']; ?>
; text-decoration: none; }
a.nav:visited 	{ padding-right: 3px; padding-left: 3px; color: <?php echo $this->_tpl_vars['TEXTCOLOR1']; ?>
; text-decoration: none; }
SELECT.nav  	{ color: <?php echo $this->_tpl_vars['TEXTCOLOR1']; ?>
; background-color:<?php echo $this->_tpl_vars['BGCOLOR1']; ?>
; }
OPTION.nav  	{ color: <?php echo $this->_tpl_vars['TEXTCOLOR1']; ?>
; background-color:<?php echo $this->_tpl_vars['BGCOLOR1']; ?>
; }
INPUT.nav 		{ color: <?php echo $this->_tpl_vars['TEXTCOLOR1']; ?>
; background-color:<?php echo $this->_tpl_vars['BGCOLOR1']; ?>
; }
</style>

<!-- main navigation -->
<?php echo smarty_function_pc_form_nav_open(array(), $this);?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
     <tr>
         <td nowrap valign="bottom" class="pn-normal">
             <?php echo smarty_function_pc_date_select(array('day' => 'on','month' => 'on','year' => 'on','view' => 'on','label' => $this->_config[0]['vars']['_PC_JUMP_MENU_LABEL'],'class' => "",'order' => "month,day,year,view,jump"), $this);?>

         </td>
         <td valign="bottom" align="left">
            <table id="bnav" class="bnav" border="0" cellpadding="3" cellspacing="0" width="100%" bgcolor="<?php echo $this->_config[0]['vars']['TABLE_BGCOLOR']; ?>
">
                <tr>
                    <td nowrap align="center" valign="bottom" <?php if ($this->_tpl_vars['VIEW_TYPE'] == 'day'): ?>class="snav"<?php else: ?>class="nav"<?php endif; ?>>
                        <a class="nav" href="<?php echo smarty_function_pc_url(array('action' => 'day'), $this);?>
"><?php echo $this->_config[0]['vars']['_PC_THEME_DAY']; ?>
</a>
                    </td>
                    <td nowrap align="center" valign="bottom" <?php if ($this->_tpl_vars['VIEW_TYPE'] == 'week'): ?>class="snav"<?php else: ?>class="nav"<?php endif; ?>>
                        <a class="nav" href="<?php echo smarty_function_pc_url(array('action' => 'week'), $this);?>
"><?php echo $this->_config[0]['vars']['_PC_THEME_WEEK']; ?>
</a>
                    </td>
                    <td nowrap align="center" valign="bottom" <?php if ($this->_tpl_vars['VIEW_TYPE'] == 'month'): ?>class="snav"<?php else: ?>class="nav"<?php endif; ?>>
                        <a class="nav" href="<?php echo smarty_function_pc_url(array('action' => 'month'), $this);?>
"><?php echo $this->_config[0]['vars']['_PC_THEME_MONTH']; ?>
</a>
                    </td>
                    <td nowrap align="center" valign="bottom" <?php if ($this->_tpl_vars['VIEW_TYPE'] == 'year'): ?>class="snav"<?php else: ?>class="nav"<?php endif; ?>>
                        <a class="nav" href="<?php echo smarty_function_pc_url(array('action' => 'year'), $this);?>
"><?php echo $this->_config[0]['vars']['_PC_THEME_YEAR']; ?>
</a>
                    </td>
					<?php if ($this->_tpl_vars['ACCESS_ADD'] == true): ?>
                    <td nowrap align="center" valign="bottom" <?php if ($this->_tpl_vars['FUNCTION'] == 'submit'): ?>class="snav"<?php else: ?>class="nav"<?php endif; ?>>
                        <a class="nav" href="<?php echo smarty_function_pc_url(array('action' => 'submit'), $this);?>
"><?php echo $this->_config[0]['vars']['_PC_THEME_SUBMIT']; ?>
</a>
                    </td>
					<?php endif; ?>
                    <td nowrap align="center" valign="bottom" <?php if ($this->_tpl_vars['FUNCTION'] == 'search'): ?>class="rsnav"<?php else: ?>class="rnav"<?php endif; ?>>
                        <a class="nav" href="<?php echo smarty_function_pc_url(array('action' => 'search'), $this);?>
"><?php echo $this->_config[0]['vars']['_PC_THEME_SEARCH']; ?>
</a>
                    </td>
                </tr>
            </table>
         </td>
     </tr>
 </table>