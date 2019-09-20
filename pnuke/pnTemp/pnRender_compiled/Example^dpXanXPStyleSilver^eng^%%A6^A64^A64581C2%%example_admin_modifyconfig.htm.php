<?php /* Smarty version 2.6.14, created on 2007-10-23 09:28:13
         compiled from example_admin_modifyconfig.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'example_admin_modifyconfig.htm', 3, false),array('function', 'pnmodurl', 'example_admin_modifyconfig.htm', 4, false),array('function', 'pnsecgenauthkey', 'example_admin_modifyconfig.htm', 6, false),array('function', 'pnmodcallhooks', 'example_admin_modifyconfig.htm', 19, false),array('modifier', 'pnvarprepfordisplay', 'example_admin_modifyconfig.htm', 17, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "example_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_MODIFYCONFIG'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Example','type' => 'admin','func' => 'updateconfig'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Example'), $this);?>
" />
	<div class="pn-adminformrow">
		<label for="example_bold"><?php echo smarty_function_pnml(array('name' => '_EXAMPLEDISPLAYBOLD'), $this);?>
</label>
		<?php if ($this->_tpl_vars['bold'] == 1): ?>
		<input id="example_bold" name="bold" type="checkbox" value="1" checked="checked" />
		<?php else: ?>
		<input id="example_bold" name="bold" type="checkbox" value="1" />
		<?php endif; ?>
	</div>
	<div class="pn-adminformrow">
		<label for="example_itemsperpage"><?php echo smarty_function_pnml(array('name' => '_EXAMPLEITEMSPERPAGE'), $this);?>
</label>
		<input id="example_itemsperpage" type="text" name="itemsperpage" size="3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['itemsperpage'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'module','hookaction' => 'modifyconfig','hookid' => 'Example','module' => 'Example'), $this);?>

	<div class="pn-adminformrow">
	<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_UPDATECONFIG'), $this);?>
" />
	</div>
</div>
</form>