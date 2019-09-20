<?php /* Smarty version 2.6.14, created on 2007-10-11 06:32:37
         compiled from admin_messages_admin_modify.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'admin_messages_admin_modify.htm', 3, false),array('function', 'pnmodurl', 'admin_messages_admin_modify.htm', 4, false),array('function', 'pnsecgenauthkey', 'admin_messages_admin_modify.htm', 6, false),array('function', 'languagelist', 'admin_messages_admin_modify.htm', 15, false),array('function', 'pnmodcallhooks', 'admin_messages_admin_modify.htm', 70, false),array('modifier', 'pnvarprepfordisplay', 'admin_messages_admin_modify.htm', 7, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin_messages_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESEDIT'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Admin_Messages','type' => 'admin','func' => 'update'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Admin_Messages'), $this);?>
" />
	<input type="hidden" name="mid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	<input type="hidden" name="oldtime" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['date'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	<div class="pn-adminformrow">
		<label for="admin_messages_title"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESTITLE'), $this);?>
</label>
		<input id="admin_messages_title" name="title" type="text" size="50" maxlength="100" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="admin_messages_language"><?php echo smarty_function_pnml(array('name' => '_LANGUAGE'), $this);?>
</label>
		<?php echo smarty_function_languagelist(array('name' => 'language','selected' => $this->_tpl_vars['language']), $this);?>

	</div>
	<div class="pn-adminformrow">
		<label for="admin_messages_content"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESCONTENT'), $this);?>
</label>
		<textarea id="admin_messages_content" name="content" cols="50" rows="10"><?php echo ((is_array($_tmp=$this->_tpl_vars['content'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</textarea>
	</div>
	<div class="pn-adminformrow">
		<label for="admin_messages_active"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESACTIVEQ'), $this);?>
</label>
		<div>
		<?php if ($this->_tpl_vars['active'] == 1): ?>
			<?php echo smarty_function_pnml(array('name' => '_YES'), $this);?>
<input id="admin_messages_active" name="active" type="radio" value="1" checked="checked" />
			<?php echo smarty_function_pnml(array('name' => '_NO'), $this);?>
<input id="admin_messages_active" name="active" type="radio" value="0" />
		<?php else: ?>
			<?php echo smarty_function_pnml(array('name' => '_YES'), $this);?>
<input id="admin_messages_active" name="active" type="radio" value="1" />
			<?php echo smarty_function_pnml(array('name' => '_NO'), $this);?>
<input id="admin_messages_active" name="active" type="radio" value="0" checked="checked" />
		<?php endif; ?>
		</div>
	</div>
	<div class="pn-adminformrow">
		<label for="admin_messages_changestartday"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESCHANGEQ'), $this);?>
</label>
		<div>
			<?php echo smarty_function_pnml(array('name' => '_YES'), $this);?>
<input id="admin_messages_changestartday" name="changestartday" type="radio" value="1" checked="checked" />
			<?php echo smarty_function_pnml(array('name' => '_NO'), $this);?>
<input id="admin_messages_changestartday" name="changestartday" type="radio" value="0" />
		</div>
	</div>
	<div class="pn-adminformrow">
		<label for="admin_messages_expire"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESEXPIRE'), $this);?>
</label>
		<div><input id="admin_messages_expire" name="expire" type="text" size="5" maxlength="5" value="<?php echo $this->_tpl_vars['expire']/86400; ?>
" /> <?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESEXPIREHELP'), $this);?>
</div>
	</div>
	<div class="pn-adminformrow">
		<label for="admin_messages_whocanview"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESWHOCANVIEWQ'), $this);?>
</label>
		<select id="admin_messages_whocanview" name="whocanview">
		<?php if ($this->_tpl_vars['whocanview'] == 1): ?>
			<option value="1" selected="selected"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESALL'), $this);?>
</option>
		<?php else: ?>
			<option value="1"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESALL'), $this);?>
</option>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['whocanview'] == 2): ?>
			<option value="2" selected="selected"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESUSERS'), $this);?>
</option>
		<?php else: ?>
			<option value="2"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESUSERS'), $this);?>
</option>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['whocanview'] == 3): ?>
			<option value="3" selected="selected"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESANON'), $this);?>
</option>
		<?php else: ?>
			<option value="3"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESANON'), $this);?>
</option>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['whocanview'] == 4): ?>
			<option value="4" selected="selected"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESADMIN'), $this);?>
</option>
		<?php else: ?>
			<option value="4"><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESADMIN'), $this);?>
</option>
		<?php endif; ?>
		</select>
	</div>
	<div class="pn-adminformrow">
		<?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'item','hookaction' => 'modify','hookid' => $this->_tpl_vars['mid'],'module' => 'Admin_Messages'), $this);?>

	</div>
	<div class="pn-adminformrow">
		<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESUPDATE'), $this);?>
" />
	</div>
	<div style="clear:both"></div>
</div>
</form>