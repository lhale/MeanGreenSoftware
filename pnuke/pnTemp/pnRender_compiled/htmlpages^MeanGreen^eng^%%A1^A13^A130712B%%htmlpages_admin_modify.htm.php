<?php /* Smarty version 2.6.14, created on 2008-11-11 10:47:23
         compiled from htmlpages_admin_modify.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'htmlpages_admin_modify.htm', 4, false),array('function', 'pnmodurl', 'htmlpages_admin_modify.htm', 5, false),array('function', 'pnsecgenauthkey', 'htmlpages_admin_modify.htm', 7, false),array('function', 'pnusergetvar', 'htmlpages_admin_modify.htm', 20, false),array('function', 'pnmodcallhooks', 'htmlpages_admin_modify.htm', 35, false),array('modifier', 'pnvarprepfordisplay', 'htmlpages_admin_modify.htm', 13, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "htmlpages_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="pn-admincontainer">
<h2><?php echo smarty_function_pnml(array('name' => '_EDITHTMLPAGES'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','type' => 'admin','func' => 'update'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'htmlpages'), $this);?>
" />
	<input type="hidden" name="uid" value="<?php echo $this->_tpl_vars['uid']; ?>
" />
	<input type="hidden" name="printlink" value="0" />
	<input type="hidden" name="pid" value="<?php echo $this->_tpl_vars['pid']; ?>
" />
	<div class="pn-adminformrow">
		<label for="htmlpages_title"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESTITLE'), $this);?>
</label>
		<input id="htmlpages_title" name="title" type="text" size="32" maxlength="128" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"/>
	</div>
	<div class="pn-adminformrow">
		<label for="htmlpages_userid"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESUSER'), $this);?>
</label>
		<?php if ($this->_tpl_vars['adminaccess']): ?>
			<input id="htmlpages_userid" type="text" name="uid" width="5" maxlength="5" value="<?php echo $this->_tpl_vars['uid']; ?>
" />
		<?php else: ?>
			<span id="htmlpages_userid"><?php echo smarty_function_pnusergetvar(array('name' => 'uname','uid' => $this->_tpl_vars['uname']), $this);?>
</span>
		<?php endif; ?>
	</div>
	<div class="pn-adminformrow">
		<label for="htmlpages_printlink"><?php echo smarty_function_pnml(array('name' => '_HTMLPRINTLINK'), $this);?>
</label>
		<?php if ($this->_tpl_vars['printlink']): ?>
		  <input id="htmlpages_printlink" name="printlink" type="checkbox" value="1" checked="checked" />
		<?php else: ?>
		  <input id="htmlpages_printlink" name="printlink" type="checkbox" value="1" />
		<?php endif; ?>		
	</div>
	<div class="pn-adminformrow">
		<label for="htmlpages_content"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESCONTENT'), $this);?>
</label>
		<textarea id="htmlpages_content" name="content" rows="30" cols="60"><?php echo ((is_array($_tmp=$this->_tpl_vars['content'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</textarea>
	</div>
	<?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'item','hookaction' => 'modify','hookid' => $this->_tpl_vars['pid'],'module' => 'htmlpages'), $this);?>

	<div class="pn-adminformrow">
		<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_HTMLPAGESUPDATE'), $this);?>
" />
	</div>
</div>
</form>
</div>