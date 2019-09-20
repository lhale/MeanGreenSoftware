<?php /* Smarty version 2.6.14, created on 2007-10-08 14:48:46
         compiled from admin_admin_modify.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'admin_admin_modify.htm', 3, false),array('function', 'pnmodurl', 'admin_admin_modify.htm', 4, false),array('function', 'pnsecgenauthkey', 'admin_admin_modify.htm', 6, false),array('function', 'pnmodcallhooks', 'admin_admin_modify.htm', 16, false),array('modifier', 'pnvarprepfordisplay', 'admin_admin_modify.htm', 7, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_ADMINUPDATECATEGORY'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Admin','type' => 'admin','func' => 'update'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Admin'), $this);?>
" />
	<input type="hidden" name="cid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	<div class="pn-adminformrow">
		<label for="admin_name"><?php echo smarty_function_pnml(array('name' => '_ADMINNAME'), $this);?>
</label>
		<input id="admin_name" name="catname" type="text" size="30" maxlength="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['catname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="admin_description"><?php echo smarty_function_pnml(array('name' => '_ADMINDESCRIPTION'), $this);?>
</label>
		<textarea id="admin_description" name="description" rows="10"><?php echo ((is_array($_tmp=$this->_tpl_vars['description'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</textarea>
	</div>
    <?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'item','hookaction' => 'modify','hookid' => $this->_tpl_vars['cid'],'module' => 'Admin'), $this);?>

	<div class="pn-adminformrow">
		<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_ADMINUPDATECATEGORY'), $this);?>
" />
	</div>
	<div style="clear:both;"></div>
</div>
</form>