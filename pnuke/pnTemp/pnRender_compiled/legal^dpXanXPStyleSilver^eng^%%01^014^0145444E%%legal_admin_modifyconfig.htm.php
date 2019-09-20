<?php /* Smarty version 2.6.14, created on 2007-12-06 17:31:46
         compiled from legal_admin_modifyconfig.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'legal_admin_modifyconfig.htm', 3, false),array('function', 'pnmodurl', 'legal_admin_modifyconfig.htm', 4, false),array('function', 'pnsecgenauthkey', 'legal_admin_modifyconfig.htm', 6, false),array('function', 'pnmodcallhooks', 'legal_admin_modifyconfig.htm', 40, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "legal_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_MODIFYCONFIG'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'legal','type' => 'admin','func' => 'updateconfig'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'legal'), $this);?>
" />
	<div class="pn-adminformrow">
		<label for="legal_termsofuse"><?php echo smarty_function_pnml(array('name' => '_LEGALTERMSOFUSE'), $this);?>
</label>
		<?php if ($this->_tpl_vars['termsofuse'] == 1): ?>
		<input id="legal_termsofuse" name="termsofuse" type="checkbox" value="1" checked="checked" />
		<?php else: ?>
		<input id="legal_termsofuse" name="termsofuse" type="checkbox" value="1" />
		<?php endif; ?>
	</div>
	<div class="pn-adminformrow">
		<label for="legal_privacypolicy"><?php echo smarty_function_pnml(array('name' => '_LEGALPRIVACYPOLICY'), $this);?>
</label>
		<?php if ($this->_tpl_vars['privacypolicy'] == 1): ?>
		<input id="legal_privacypolicy" name="privacypolicy" type="checkbox" value="1" checked="checked" />
		<?php else: ?>
		<input id="legal_privacypolicy" name="privacypolicy" type="checkbox" value="1" />
		<?php endif; ?>
	</div>
	<div class="pn-adminformrow">
		<label for="legal_accessibilitystatement"><?php echo smarty_function_pnml(array('name' => '_LEGALACCESSIBILITYSTATEMENT'), $this);?>
</label>
		<?php if ($this->_tpl_vars['accessibilitystatement'] == 1): ?>
		<input id="legal_accessibilitystatement" name="accessibilitystatement" type="checkbox" value="1" checked="checked" />
		<?php else: ?>
		<input id="legal_accessibilitystatement" name="accessibilitystatement" type="checkbox" value="1" />
		<?php endif; ?>
	</div>
	<div class="pn-adminformrow">
		<label for="legal_refundpolicy"><?php echo smarty_function_pnml(array('name' => '_LEGALREFUNDPOLICY'), $this);?>
</label>
		<?php if ($this->_tpl_vars['refundpolicy'] == 1): ?>
		<input id="legal_refundpolicy" name="refundpolicy" type="checkbox" value="1" checked="checked" />
		<?php else: ?>
		<input id="legal_refundpolicy" name="refundpolicy" type="checkbox" value="1" />
		<?php endif; ?>
	</div>
	<div class="pn-adminformrow">
		<?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'module','hookaction' => 'modifyconfig','hookid' => 'legal','module' => 'legal'), $this);?>

	</div>
	<div class="pn-adminformrow">
	<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_UPDATECONFIG'), $this);?>
" />
	</div>
	<div style="clear:both"></div>
</div>
</form>