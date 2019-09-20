<?php /* Smarty version 2.6.14, created on 2008-11-02 08:36:55
         compiled from modules_admin_modify.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'modules_admin_modify.htm', 3, false),array('function', 'pnmodurl', 'modules_admin_modify.htm', 4, false),array('function', 'pnsecgenauthkey', 'modules_admin_modify.htm', 6, false),array('modifier', 'pnvarprepfordisplay', 'modules_admin_modify.htm', 7, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_MODULESMODIFY'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Modules','type' => 'admin','func' => 'update'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
    <input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Modules'), $this);?>
" />
    <input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	<div class="pn-adminformrow">
		<label for="modules_newdisplayname"><?php echo smarty_function_pnml(array('name' => '_MODULESNEWNAME'), $this);?>
</label>
		<input id="modules_newdisplayname" name="newdisplayname" type="text" size="30" maxlength="64" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['newdisplayname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="modules_newdescription"><?php echo smarty_function_pnml(array('name' => '_MODULESNEWDESCRIPTION'), $this);?>
</label>
		<textarea id="modules_newdescription" name="newdescription" cols="50" rows="10"><?php echo ((is_array($_tmp=$this->_tpl_vars['newdescription'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</textarea>
	</div>
	<div class="pn-adminformrow">
		<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_COMMIT'), $this);?>
" />
	</div>
	<div style="clear:both"></div>
</div>
</form>