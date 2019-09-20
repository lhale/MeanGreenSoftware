<?php /* Smarty version 2.6.14, created on 2007-10-23 09:29:10
         compiled from example_admin_new.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'example_admin_new.htm', 3, false),array('function', 'pnmodurl', 'example_admin_new.htm', 4, false),array('function', 'pnsecgenauthkey', 'example_admin_new.htm', 6, false),array('function', 'pnmodcallhooks', 'example_admin_new.htm', 15, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "example_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_EXAMPLEADD'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Example','type' => 'admin','func' => 'create'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Example'), $this);?>
" />
	<div class="pn-adminformrow">
		<label for="example_name"><?php echo smarty_function_pnml(array('name' => '_EXAMPLENAME'), $this);?>
</label>
		<input id="example_name" name="itemname" type="text" size="32" maxlength="32" />
	</div>
	<div class="pn-adminformrow">
		<label for="example_number"><?php echo smarty_function_pnml(array('name' => '_EXAMPLENUMBER'), $this);?>
</label>
		<input id="example_number" name="number" type="text" size="5" maxlength="5" />
	</div>
    <?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'item','hookaction' => 'new','module' => 'Example'), $this);?>

	<div class="pn-adminformrow">
		<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_CREATE'), $this);?>
" />
	</div>
</div>
</form>