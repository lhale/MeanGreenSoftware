<?php /* Smarty version 2.6.14, created on 2007-10-10 06:48:36
         compiled from permissions_admin_delete.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'permissions_admin_delete.htm', 3, false),array('function', 'pnmodurl', 'permissions_admin_delete.htm', 4, false),array('function', 'pnsecgenauthkey', 'permissions_admin_delete.htm', 6, false),array('modifier', 'pnvarprepfordisplay', 'permissions_admin_delete.htm', 8, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "permissions_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_PERMISSIONSDELETE'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Permissions','type' => 'admin','func' => 'delete'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
    <input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Permissions'), $this);?>
" />
    <input type="hidden" name="confirmation" value="1" />
    <input type="hidden" name="pid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
    <input type="hidden" name="permgrp" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['permgrp'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
    <input type="hidden" name="permtype" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['permtype'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	<div class="pn-adminformrow">
		<label for="permissions_delete"><?php echo smarty_function_pnml(array('name' => '_PERMISSIONSCONFIRMDELETE'), $this);?>
</label>
		<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_PERMISSIONSCONFIRMDELETE'), $this);?>
" />
	</div>
	<div style="clear:both"></div>
</div>
</form>
<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Permissions','type' => 'admin','func' => 'view'), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_PERMISSIONSCANCELDELETE'), $this);?>
</a>