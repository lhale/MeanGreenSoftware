<?php /* Smarty version 2.6.14, created on 2007-10-08 14:47:32
         compiled from modules_admin_modifyconfig.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'modules_admin_modifyconfig.htm', 3, false),array('function', 'pnmodurl', 'modules_admin_modifyconfig.htm', 4, false),array('function', 'pnsecgenauthkey', 'modules_admin_modifyconfig.htm', 6, false),array('modifier', 'pnvarprepfordisplay', 'modules_admin_modifyconfig.htm', 9, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_MODULESMODIFYCONFIG'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Modules','type' => 'admin','func' => 'updateconfig'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Modules'), $this);?>
" />
	<div class="pn-adminformrow">
		<label for="modules_itemsperpage"><?php echo smarty_function_pnml(array('name' => '_MODULESITEMSPERPAGE'), $this);?>
</label>
		<input id="modules_itemsperpage" type="text" name="itemsperpage" size="3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['itemsperpage'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<?php echo smarty_function_pnml(array('name' => '_MODULESLOADLEGACY'), $this);?>

		<?php if ($this->_tpl_vars['loadlegacy'] == 1): ?>
			<div>
				<label for="modules_loadlegacy_yes"><?php echo smarty_function_pnml(array('name' => '_YES'), $this);?>
</label><input id="modules_loadlegacy_yes" type="radio" name="loadlegacy" value="1" checked="checked" />
				<label for="modules_loadlegacy_no"><?php echo smarty_function_pnml(array('name' => '_NO'), $this);?>
</label><input id="modules_loadlegacy_no" type="radio" name="loadlegacy" value="0" />
			</div>
		<?php else: ?>
			<div>
				<label for="modules_loadlegacy_yes"><?php echo smarty_function_pnml(array('name' => '_YES'), $this);?>
</label><input id="modules_loadlegacy_yes" type="radio" name="loadlegacy" value="1" />
				<label for="modules_loadlegacy_no"><?php echo smarty_function_pnml(array('name' => '_NO'), $this);?>
</label><input id="modules_loadlegacy_no" type="radio" name="loadlegacy" value="0" checked="checked" />
			</div>
		<?php endif; ?>
	</div>
	<div class="pn-adminformrow">
		<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_MODULESUPDATECONFIG'), $this);?>
" />
	</div>
	<div class="pn-adminformrow"></div>
</div>
</form>