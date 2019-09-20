<?php /* Smarty version 2.6.14, created on 2008-11-02 08:20:51
         compiled from blocks_admin_modifyconfig.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'blocks_admin_modifyconfig.htm', 3, false),array('function', 'pnmodurl', 'blocks_admin_modifyconfig.htm', 4, false),array('function', 'pnsecgenauthkey', 'blocks_admin_modifyconfig.htm', 6, false),array('function', 'pnmodcallhooks', 'blocks_admin_modifyconfig.htm', 8, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "blocks_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_BLOCKSCONFIG'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Blocks','type' => 'admin','func' => 'updateconfig'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Blocks'), $this);?>
" />
	<div class="pn-adminformrow">
	<?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'module','hookaction' => 'modifyconfig','module' => 'Blocks'), $this);?>

	</div>
	<div class="pn-adminformrow"><label for="blocks_collapseable"><?php echo smarty_function_pnml(array('name' => '_BLOCKSCOLLAPSEABLE'), $this);?>
</label> 	 
		<?php if ($this->_tpl_vars['collapseable'] == 1): ?> 	 
			<input id="blocks_collapseable" name="collapseable" type="checkbox" value="1" checked="checked" /> 	 
		<?php else: ?> 	 
			<input id="blocks_collapseable" name="collapseable" type="checkbox" value="1" /> 	 
		<?php endif; ?> 	 
	</div>
	<div class="pn-adminformrow">
		<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_UPDATE'), $this);?>
" />
	</div>
	<div style="clear:both"></div>
</div>
</form>