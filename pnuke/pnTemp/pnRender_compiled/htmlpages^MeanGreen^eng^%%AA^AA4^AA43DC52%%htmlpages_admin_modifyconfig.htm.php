<?php /* Smarty version 2.6.14, created on 2008-11-13 09:37:42
         compiled from htmlpages_admin_modifyconfig.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'htmlpages_admin_modifyconfig.htm', 4, false),array('function', 'pnmodurl', 'htmlpages_admin_modifyconfig.htm', 5, false),array('function', 'pnsecgenauthkey', 'htmlpages_admin_modifyconfig.htm', 7, false),array('function', 'pnmodcallhooks', 'htmlpages_admin_modifyconfig.htm', 12, false),array('modifier', 'pnvarprepfordisplay', 'htmlpages_admin_modifyconfig.htm', 10, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "htmlpages_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="pn-admincontainer">
<h2><?php echo smarty_function_pnml(array('name' => '_MODIFYCONFIG'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','type' => 'admin','func' => 'updateconfig'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'htmlpages'), $this);?>
" />
	<div class="pn-adminformrow">
		<label for="htmlpages_itemsperpage"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESITEMSPERPAGE'), $this);?>
</label>
		<input id="htmlpages_itemsperpage" type="text" name="itemsperpage" size="3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['itemsperpage'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'module','hookaction' => 'modifyconfig','hookid' => 'htmlpages','module' => 'htmlpages'), $this);?>

	<div class="pn-adminformrow">
		<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_UPDATECONFIG'), $this);?>
" />
	</div>
</div>
</form>
</div>