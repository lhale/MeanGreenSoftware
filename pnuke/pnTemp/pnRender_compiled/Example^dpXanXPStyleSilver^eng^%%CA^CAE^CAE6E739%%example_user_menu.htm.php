<?php /* Smarty version 2.6.14, created on 2007-10-23 09:26:10
         compiled from example_user_menu.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pngetstatusmsg', 'example_user_menu.htm', 2, false),array('function', 'pnml', 'example_user_menu.htm', 3, false),array('function', 'pnimg', 'example_user_menu.htm', 4, false),array('function', 'pnmodurl', 'example_user_menu.htm', 6, false),)), $this); ?>
<?php echo smarty_function_pngetstatusmsg(array(), $this);?>

<?php echo smarty_function_pnml(array('name' => '_EXAMPLE','assign' => 'heading'), $this);?>

<h2><?php echo smarty_function_pnimg(array('src' => "heading.gif",'title' => $this->_tpl_vars['heading'],'alt' => $this->_tpl_vars['heading']), $this);?>
</h2>
<div class="pn-menu">
	<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Example','type' => 'user','func' => 'view'), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_EXAMPLEVIEW'), $this);?>
</a>
</div>