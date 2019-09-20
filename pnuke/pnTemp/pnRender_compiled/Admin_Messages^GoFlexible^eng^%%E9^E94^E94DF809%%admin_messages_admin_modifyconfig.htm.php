<?php /* Smarty version 2.6.14, created on 2008-11-02 08:46:12
         compiled from admin_messages_admin_modifyconfig.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'admin_messages_admin_modifyconfig.htm', 3, false),array('function', 'pnmodurl', 'admin_messages_admin_modifyconfig.htm', 4, false),array('function', 'pnsecgenauthkey', 'admin_messages_admin_modifyconfig.htm', 6, false),array('function', 'pnmodcallhooks', 'admin_messages_admin_modifyconfig.htm', 12, false),array('modifier', 'pnvarprepfordisplay', 'admin_messages_admin_modifyconfig.htm', 9, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin_messages_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESMODIFYCONFIG'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Admin_Messages','type' => 'admin','func' => 'updateconfig'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Admin_Messages'), $this);?>
" />
	<div class="pn-adminformrow">
		<label for="admin_messages_itemsperpage"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESITEMSPERPAGE'), $this);?>
</label>
		<input id="admin_messages_" name="itemsperpage" type="text" size="3" maxlength="3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['itemsperpage'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'module','hookaction' => 'modifyconfig','module' => 'Admin_Messages'), $this);?>

	</div>
	<div class="pn-adminformrow">
		<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESUPDATECONFIG'), $this);?>
" />
	</div>
	<div style="clear:both;"></div>
</div>
</form>