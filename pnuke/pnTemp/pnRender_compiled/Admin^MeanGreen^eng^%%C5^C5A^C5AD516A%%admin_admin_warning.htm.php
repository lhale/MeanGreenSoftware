<?php /* Smarty version 2.6.14, created on 2008-11-05 10:58:11
         compiled from admin_admin_warning.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnimg', 'admin_admin_warning.htm', 3, false),array('function', 'pnml', 'admin_admin_warning.htm', 5, false),array('modifier', 'pnvarprepfordisplay', 'admin_admin_warning.htm', 10, false),)), $this); ?>
<div class="warning-container">
	<?php echo smarty_function_pnimg(array('src' => "warning.gif"), $this);?>

	<?php if ($this->_tpl_vars['installexists']): ?>
		<h2><?php echo smarty_function_pnml(array('name' => '_ADMININSTALLWARNING'), $this);?>
</h2>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['psakexists']): ?>
		<h2><?php echo smarty_function_pnml(array('name' => '_ADMINPSAKWARNING'), $this);?>
</h2>
	<?php endif; ?>
	<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminpanellink'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo smarty_function_pnml(array('name' => '_ADMINCONTINUE'), $this);?>
</a>
</div>