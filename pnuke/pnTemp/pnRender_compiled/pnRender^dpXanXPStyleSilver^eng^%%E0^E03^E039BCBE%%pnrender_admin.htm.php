<?php /* Smarty version 2.6.14, created on 2007-10-04 07:08:46
         compiled from pnrender_admin.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'admincategorymenu', 'pnrender_admin.htm', 22, false),array('function', 'pngetstatusmsg', 'pnrender_admin.htm', 23, false),array('function', 'pnml', 'pnrender_admin.htm', 26, false),array('function', 'v4b_openadminmenu', 'pnrender_admin.htm', 29, false),array('function', 'v4b_closeadminmenu', 'pnrender_admin.htm', 31, false),array('function', 'pnmodurl', 'pnrender_admin.htm', 33, false),array('function', 'pnsecgenauthkey', 'pnrender_admin.htm', 35, false),array('function', 'html_checkboxes', 'pnrender_admin.htm', 43, false),array('modifier', 'pnvarprepfordisplay', 'pnrender_admin.htm', 54, false),)), $this); ?>
<?php echo smarty_function_admincategorymenu(array(), $this);?>

<?php echo smarty_function_pngetstatusmsg(array(), $this);?>

<!--
<h1><?php echo smarty_function_pnml(array('name' => '_PNRENDER_ADMIN'), $this);?>
</h1>
<br />
-->
<?php echo smarty_function_v4b_openadminmenu(array('name' => 'pnRender'), $this);?>

<strong><?php echo smarty_function_pnml(array('name' => '_PNRENDER_ADMIN'), $this);?>
</strong>
<?php echo smarty_function_v4b_closeadminmenu(array(), $this);?>

<form action="<?php echo smarty_function_pnmodurl(array('modname' => 'pnRender','type' => 'admin','func' => 'updateconfig'), $this);?>
"  method="post" enctype="application/x-www-form-urlencoded">
<div>
<input type="hidden" name="authid" id="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'pnRender'), $this);?>
" />
<table border="0" width="100%">
	<tr>
		<td>
			<fieldset>
	  			<legend>
					<strong><?php echo smarty_function_pnml(array('name' => '_PNRENDER_COMPILE_SETTINGS'), $this);?>
</strong>
				</legend>
    			<?php echo smarty_function_html_checkboxes(array('name' => 'settings','output' => $this->_tpl_vars['compile_output'],'values' => $this->_tpl_vars['compile_values'],'checked' => $this->_tpl_vars['compile_checked'],'separator' => "<br />"), $this);?>
<br />
				<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnRender','type' => 'admin','func' => 'clear_compiled'), $this);?>
&amp;authid=<?php echo smarty_function_pnsecgenauthkey(array('module' => 'pnRender'), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_PNRENDER_CLEAR_COMPILED'), $this);?>
</a>
			</fieldset>
		</td>
		<td>
			<fieldset>
				<legend>
					<strong><?php echo smarty_function_pnml(array('name' => '_PNRENDER_CACHE_SETTINGS'), $this);?>
</strong>
				</legend>
	   			<?php echo smarty_function_html_checkboxes(array('name' => 'settings','output' => $this->_tpl_vars['cache_output'],'values' => $this->_tpl_vars['cache_values'],'checked' => $this->_tpl_vars['cache_checked'],'separator' => "<br />"), $this);?>

				<?php echo smarty_function_pnml(array('name' => '_PNRENDER_CACHE_LIFETIME'), $this);?>
:
				<input type="text" name="lifetime" id="lifetime" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['lifetime'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" size="6" />&nbsp;
				<?php echo smarty_function_pnml(array('name' => '_PNRENDER_CACHE_LIFETIME_UNIT'), $this);?>
<br /><br />
				<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnRender','type' => 'admin','func' => 'clear_cache'), $this);?>
&amp;authid=<?php echo smarty_function_pnsecgenauthkey(array('module' => 'pnRender'), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_PNRENDER_CLEAR_CACHED'), $this);?>
</a><br />										 
			</fieldset>
		</td>
	</tr>
	<tr>
	    <td>
			<fieldset>
	  			<legend>
					<strong><?php echo smarty_function_pnml(array('name' => '_PNRENDER_DEBUG_SETTINGS'), $this);?>
</strong>
				</legend>
    			<?php echo smarty_function_html_checkboxes(array('name' => 'settings','output' => $this->_tpl_vars['expose_output'],'values' => $this->_tpl_vars['expose_values'],'checked' => $this->_tpl_vars['expose_checked'],'separator' => "<br />"), $this);?>
<br />
			</fieldset>
	    </td>
	    <td>&nbsp;</td>
	</tr>
</table><br />
<input type="submit" value="<?php echo smarty_function_pnml(array('name' => '_PNRENDER_OK'), $this);?>
" />
</div>
</form>