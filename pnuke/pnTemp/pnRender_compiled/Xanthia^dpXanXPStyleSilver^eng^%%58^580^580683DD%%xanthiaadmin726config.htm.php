<?php /* Smarty version 2.6.14, created on 2007-09-28 16:28:11
         compiled from xanthiaadmin726config.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'xanthiaadmin726config.htm', 3, false),array('function', 'pnmodurl', 'xanthiaadmin726config.htm', 4, false),array('function', 'pnsecgenauthkey', 'xanthiaadmin726config.htm', 6, false),array('modifier', 'pnvarprepfordisplay', 'xanthiaadmin726config.htm', 77, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "xanthiaadminmenu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br />
<div class="pn-title"><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGURE_TITLE'), $this);?>
</div>
<form action="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'updateMain'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Xanthia'), $this);?>
" />
<table width="100%">						
	<tr>
		<td><label><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGURE_VBA'), $this);?>
</label>
		</td>	<?php if ($this->_tpl_vars['vba'] == 1): ?>
		<td>								
			<input name="vba" type="checkbox" value="1" checked="checked" />
		</td>	<?php else: ?>
		<td>								
			<input name="vba" type="checkbox" value="1" />
		</td>	<?php endif; ?>
	</tr>						
	<tr>
		<td><label><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGURE_SHORTURL'), $this);?>
</label>
		<?php if ($this->_tpl_vars['htaccess'] != 1): ?>
		&nbsp;&nbsp;&nbsp;<span style="color:red;"><strong><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGURENOHTACCESS'), $this);?>
</strong></span>
		<?php endif; ?>						
		</td>	
		<?php if ($this->_tpl_vars['htaccess'] == 1): ?>
			<?php if ($this->_tpl_vars['shorturls'] == 1): ?>
				<td>								
					<input name="shorturls" type="checkbox" value="1" checked="checked" />
				</td>	<?php else: ?>
				<td>								
					<input name="shorturls" type="checkbox" value="1" />
				</td>
			<?php endif; ?>
		<?php endif; ?>
	</tr>
	<tr>
		<td><label><?php echo smarty_function_pnml(array('name' => '_XA_SHORTURL_EXTENSION'), $this);?>
</label></td>
		<td><input name="shorturlsextension" value="<?php echo $this->_tpl_vars['shorturlsextension']; ?>
" /></td>
	</tr>													
	<tr>
		<td><label><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGURE_USECACHE'), $this);?>
</label>
		</td>	<?php if ($this->_tpl_vars['enablecache'] == 1): ?>
		<td>								
			<input name="enablecache" type="checkbox" value="1" checked="checked" />
		</td>	<?php else: ?>
		<td>								
			<input name="enablecache" type="checkbox" value="1" />
		</td>	<?php endif; ?>
	</tr>
	<tr>
		<td><label><?php echo smarty_function_pnml(array('name' => '_XA_MODULES_NOCACHE'), $this);?>
</label></td>
		<td><input name="modulesnocache" type="text" size="30" maxlength="255" value="<?php echo $this->_tpl_vars['modulesnocache']; ?>
" /> (<?php echo smarty_function_pnml(array('name' => '_XA_COMMASEPERATED'), $this);?>
)</td>
	</tr>
	<tr>
		<td><label><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGURE_TEMPLATECHECK'), $this);?>
</label>
		</td>	<?php if ($this->_tpl_vars['compile_check'] == 1): ?>
		<td>								
			<input name="compile_check" type="checkbox" value="1" checked="checked" />
		</td>	<?php else: ?>
		<td>								
			<input name="compile_check" type="checkbox" value="1" />
		</td>	<?php endif; ?>
	</tr>
	<tr>
		<td><label><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGURE_FORCETEMPLATECHECK'), $this);?>
</label>
		</td>	<?php if ($this->_tpl_vars['force_compile'] == 1): ?>
		<td>								
			<input name="force_compile" type="checkbox" value="1" checked="checked" />
		</td>	<?php else: ?>
		<td>								
			<input name="force_compile" type="checkbox" value="1" />
		</td>	<?php endif; ?>
	</tr>
	<tr>
		<td><label><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGURE_CACHETIME'), $this);?>
</label>
		</td>
		<td>								
			<input type="text" name="cache_lifetime" id="cache_lifetime" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cache_lifetime'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" size="4" maxlength="4" tabindex="2" />
		</td>	
	</tr>
	<tr>
		<td><label><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGURE_DBTEMPLATES'), $this);?>
</label>
		</td>	<?php if ($this->_tpl_vars['db_templates'] == 1): ?>
		<td>								
			<input name="db_templates" type="checkbox" value="1" checked="checked" />
		</td>	<?php else: ?>
		<td>								
			<input name="db_templates" type="checkbox" value="1" />
		</td>	<?php endif; ?>
	</tr>
	<tr>
		<td><label><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGURE_TRIMWHITESPACE'), $this);?>
</label>
		</td>	<?php if ($this->_tpl_vars['trimwhitespace'] == 1): ?>
		<td>								
			<input name="trimwhitespace" type="checkbox" value="1" checked="checked" />
		</td>	<?php else: ?>
		<td>								
			<input name="trimwhitespace" type="checkbox" value="1" />
		</td>	<?php endif; ?>
	</tr>
	<tr>
		<td>&nbsp;
		</td>
		<td>								
			<input type="submit" value="<?php echo smarty_function_pnml(array('name' => '_SUBMIT'), $this);?>
" align="middle" tabindex="9" />
		</td>
	</tr>
</table>
</div>
</form>