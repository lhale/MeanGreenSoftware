<?php /* Smarty version 2.6.14, created on 2007-09-03 08:47:07
         compiled from groups_admin_modify.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'groups_admin_modify.htm', 3, false),array('function', 'pnmodurl', 'groups_admin_modify.htm', 4, false),array('function', 'pnsecgenauthkey', 'groups_admin_modify.htm', 6, false),array('function', 'pnmodcallhooks', 'groups_admin_modify.htm', 12, false),array('modifier', 'pnvarprepfordisplay', 'groups_admin_modify.htm', 7, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "groups_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_GROUPSMODIFY'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Groups','type' => 'admin','func' => 'update'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Groups'), $this);?>
" />
	<input type="hidden" name="gid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	<div class="pn-adminformrow">
		<label for="groups_name"><?php echo smarty_function_pnml(array('name' => '_GROUPSNAME'), $this);?>
</label>
		<input id="groups_name" name="name" type="text" size="30" maxlength="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow"><?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'item','hookaction' => 'modify','hookid' => $this->_tpl_vars['gid'],'module' => 'Groups'), $this);?>
</div>
	<div class="pn-adminformrow"><input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_GROUPSMODIFY'), $this);?>
" /></div>
	<div style="clear:both"></div>
</div>
</form>