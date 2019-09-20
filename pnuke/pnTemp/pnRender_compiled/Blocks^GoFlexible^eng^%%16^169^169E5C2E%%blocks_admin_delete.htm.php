<?php /* Smarty version 2.6.14, created on 2008-11-03 09:02:23
         compiled from blocks_admin_delete.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'blocks_admin_delete.htm', 3, false),array('function', 'pnmodurl', 'blocks_admin_delete.htm', 5, false),array('function', 'pnsecgenauthkey', 'blocks_admin_delete.htm', 7, false),array('modifier', 'pnvarprepfordisplay', 'blocks_admin_delete.htm', 4, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "blocks_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_DELETEBLOCK'), $this);?>
</h2>
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['blockname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Blocks','type' => 'admin','func' => 'delete'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
    <input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Blocks'), $this);?>
" />
    <input type="hidden" name="confirmation" value="1" />
    <input type="hidden" name="bid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['bid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	<div class="pn-adminformrow">
		<label for="blocks_submit"><?php echo smarty_function_pnml(array('name' => '_CONFIRMBLOCKDELETE'), $this);?>
</label>	
		<input id="blocks_submit" name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_DELETE'), $this);?>
" />
	</div>
	<div style="clear:both"></div>
</div>
</form>
<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Blocks','type' => 'admin','func' => 'view'), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_CANCELBLOCKDELETE'), $this);?>
</a>