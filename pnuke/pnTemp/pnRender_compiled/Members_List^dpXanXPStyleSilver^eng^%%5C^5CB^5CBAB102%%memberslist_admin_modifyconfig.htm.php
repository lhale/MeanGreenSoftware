<?php /* Smarty version 2.6.14, created on 2007-12-05 06:19:20
         compiled from memberslist_admin_modifyconfig.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'memberslist_admin_modifyconfig.htm', 3, false),array('function', 'pnmodurl', 'memberslist_admin_modifyconfig.htm', 4, false),array('function', 'pnsecgenauthkey', 'memberslist_admin_modifyconfig.htm', 6, false),array('modifier', 'pnvarprepfordisplay', 'memberslist_admin_modifyconfig.htm', 9, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "memberslist_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_MEMBERSLISTEDITCONFIG'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Members_List','type' => 'admin','func' => 'updateconfig'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Members_List'), $this);?>
" />
	<div class="pn-adminformrow">
		<label for="memberslist_memberslistitemsperpage"><?php echo smarty_function_pnml(array('name' => '_MEMBERSLISTMEMBERSPERPAGE'), $this);?>
</label>
		<input id="memberslist_memberslistitemsperpage" type="text" name="memberslistitemsperpage" size="3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['memberslistitemsperpage'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="memberslist_onlinemembersitemsperpage"><?php echo smarty_function_pnml(array('name' => '_MEMBERSLISTONLINEMEMBERSITEMSPERPAGE'), $this);?>
</label>
		<input id="memberslist_onlinemembersitemsperpage" type="text" name="onlinemembersitemsperpage" size="3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['onlinemembersitemsperpage'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
<!--	<div class="pn-adminformrow">
		<label for="memberslist_filterunverified"><?php echo smarty_function_pnml(array('name' => '_MEMBERSLISTUNVERIFIED'), $this);?>
</label>
		<?php if ($this->_tpl_vars['filterunverified'] == 1): ?>
			<input id="memberslist_filterunverified" type="radio" name="filterunverified" value="1" checked="checked" /><?php echo smarty_function_pnml(array('name' => '_YES'), $this);?>

			<input id="memberslist_filterunverified" type="radio" name="filterunverified" value="0" /><?php echo smarty_function_pnml(array('name' => '_NO'), $this);?>

		<?php else: ?>
			<input id="memberslist_filterunverified" type="radio" name="filterunverified" value="1" /><?php echo smarty_function_pnml(array('name' => '_YES'), $this);?>

			<input id="memberslist_filterunverified" type="radio" name="filterunverified" value="0" checked="checked" /><?php echo smarty_function_pnml(array('name' => '_NO'), $this);?>

		<?php endif; ?>
	</div>-->
	<div class="pn-adminformrow"><input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_MEMBERSLISTUPDATECONFIG'), $this);?>
" /></div>
	<div style="clear:both"></div>
</div>
</form>