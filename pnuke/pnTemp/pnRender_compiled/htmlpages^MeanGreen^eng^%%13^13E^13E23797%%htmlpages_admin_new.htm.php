<?php /* Smarty version 2.6.14, created on 2008-11-10 05:43:19
         compiled from htmlpages_admin_new.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'htmlpages_admin_new.htm', 4, false),array('function', 'pnmodurl', 'htmlpages_admin_new.htm', 5, false),array('function', 'pnsecgenauthkey', 'htmlpages_admin_new.htm', 7, false),array('function', 'pnusergetvar', 'htmlpages_admin_new.htm', 8, false),array('function', 'pnmodcallhooks', 'htmlpages_admin_new.htm', 25, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "htmlpages_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="pn-admincontainer">
<h2><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESADD'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','type' => 'admin','func' => 'create'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'htmlpages'), $this);?>
" />
	<input type="hidden" name="uid" value="<?php echo smarty_function_pnusergetvar(array('name' => 'uid'), $this);?>
" />
	<div class="pn-adminformrow">
		<label for="htmlpages_title"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESTITLE'), $this);?>
</label>
		<input id="htmlpages_title" name="title" type="text" size="32" maxlength="128" />
	</div>
	<div class="pn-adminformrow">
		<label for="htmlpages_userid"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESUSER'), $this);?>
</label>
		<span id="htmlpages_userid"><?php echo smarty_function_pnusergetvar(array('name' => 'uname'), $this);?>
</span>
	</div>
	<div class="pn-adminformrow">
		<label for="htmlpages_printlink"><?php echo smarty_function_pnml(array('name' => '_HTMLPRINTLINK'), $this);?>
</label>
		<input id="htmlpages_printlink" name="printlink" type="checkbox" />
	</div>
	<div class="pn-adminformrow">
		<label for="htmlpages_content"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESCONTENT'), $this);?>
</label>
		<textarea id="htmlpages_content" name="content" rows="30" cols="60"></textarea>
	</div>
	<?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'item','hookaction' => 'new','module' => 'htmlpages'), $this);?>

	<div class="pn-adminformrow">
		<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_HTMLPAGESADD'), $this);?>
" />
	</div>
</div>
</form>
</div>