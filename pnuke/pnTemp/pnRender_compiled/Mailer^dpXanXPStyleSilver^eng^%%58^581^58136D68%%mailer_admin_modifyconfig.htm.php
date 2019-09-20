<?php /* Smarty version 2.6.14, created on 2007-11-17 07:44:30
         compiled from mailer_admin_modifyconfig.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'mailer_admin_modifyconfig.htm', 3, false),array('function', 'pnmodurl', 'mailer_admin_modifyconfig.htm', 4, false),array('function', 'pnsecgenauthkey', 'mailer_admin_modifyconfig.htm', 6, false),array('function', 'html_options', 'mailer_admin_modifyconfig.htm', 9, false),array('modifier', 'pnvarprepfordisplay', 'mailer_admin_modifyconfig.htm', 13, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mailer_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_MAILERMODIFYCONFIG'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Mailer','type' => 'admin','func' => 'updateconfig'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Mailer'), $this);?>
" />
	<div class="pn-adminformrow">
		<label for="mailer_mailertype"><?php echo smarty_function_pnml(array('name' => '_MAILERTRANSPORT'), $this);?>
</label>
		<select id="mailer_mailertype" name="mailertype"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['mailertypes'],'selected' => $this->_tpl_vars['mailertype']), $this);?>
</select>
	</div>
	<div class="pn-adminformrow">
		<label for="mailer_charset"><?php echo smarty_function_pnml(array('name' => '_MAILERCHARSET'), $this);?>
</label>
		<input id="mailer_charset" name="charset" type="text" size="10" maxlength="20" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['charset'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="mailer_encoding"><?php echo smarty_function_pnml(array('name' => '_MAILERENCODING'), $this);?>
</label>
		<input id="mailer_encoding" name="encoding" type="text" size="10" maxlength="20" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['encoding'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="mailer_contenttype"><?php echo smarty_function_pnml(array('name' => '_MAILERCONTENTTYPE'), $this);?>
</label>
		<input id="mailer_contenttype" name="contenttype" type="text" size="10" maxlength="20" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['contenttype'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="mailer_wordwrap"><?php echo smarty_function_pnml(array('name' => '_MAILERWORDWRAP'), $this);?>
</label>
		<input id="mailer_wordwrap" name="wordwrap" type="text" size="3" maxlength="3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['wordwrap'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="mailer_msmailheaders"><?php echo smarty_function_pnml(array('name' => '_MAILERMSMAILHEADERS'), $this);?>
</label>
		<?php if ($this->_tpl_vars['msmailheadersc'] == 1): ?>
			<input id="mailer_msmailheaders" name="msmailheaders" type="checkbox" value="1" checked="checked" />
		<?php else: ?>
			<input id="mailer_msmailheaders" name="msmailheaders" type="checkbox" value="1" />
		<?php endif; ?>
	</div>
	<div class="pn-adminformrow">
		<label for="mailer_sendmailpath"><?php echo smarty_function_pnml(array('name' => '_MAILERSENDMAILPATH'), $this);?>
</label>
		<input id="mailer_sendmailpath" name="sendmailpath" type="text" size="50" maxlength="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['sendmailpath'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="mailer_smtpserver"><?php echo smarty_function_pnml(array('name' => '_MAILERSMTPSERVER'), $this);?>
</label>
		<input id="mailer_smtpserver" name="smtpserver" type="text" size="30" maxlength="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['smtpserver'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="mailer_smtpport"><?php echo smarty_function_pnml(array('name' => '_MAILERSMTPPORT'), $this);?>
</label>
		<input id="mailer_smtpport" name="smtpport" type="text" size="5" maxlength="5" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['smtpport'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="mailer_smtptimeout"><?php echo smarty_function_pnml(array('name' => '_MAILERSMTPTIMEOUT'), $this);?>
</label>
		<input id="mailer_smtptimeout" name="smtptimeout" type="text" size="5" maxlength="5" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['smtptimeout'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="mailer_smtpauth"><?php echo smarty_function_pnml(array('name' => '_MAILERSMTPAUTH'), $this);?>
</label>
		<?php if ($this->_tpl_vars['smtpauth'] == 1): ?>
		<input id="mailer_smtpauth" name="smtpauth" type="checkbox" value="1" checked="checked" />
		<?php else: ?>
		<input id="mailer_smtpauth" name="smtpauth" type="checkbox" value="1" />
		<?php endif; ?>
	</div>
	<div class="pn-adminformrow">
		<label for="mailer_smtpusername"><?php echo smarty_function_pnml(array('name' => '_MAILERSMTPUSERNAME'), $this);?>
</label>
		<input id="mailer_smtpusername" name="smtpusername" type="text" size="30" maxlength="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['smtpusername'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<label for="mailer_smtppassword"><?php echo smarty_function_pnml(array('name' => '_MAILERSMTPPASSWORD'), $this);?>
</label>
		<input id="mailer_smtppassword" name="smtppassword" type="password" size="30" maxlength="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['smtppassword'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</div>
	<div class="pn-adminformrow">
		<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_MAILERUPDATECONFIG'), $this);?>
" />
	</div>
	<div style="clear:both"></div>
</div>
</form>