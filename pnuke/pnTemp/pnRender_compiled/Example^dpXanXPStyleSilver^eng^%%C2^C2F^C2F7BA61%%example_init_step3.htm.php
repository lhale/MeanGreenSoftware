<?php /* Smarty version 2.6.14, created on 2007-10-23 09:25:42
         compiled from example_init_step3.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'example_init_step3.htm', 2, false),array('function', 'pnmodurl', 'example_init_step3.htm', 6, false),)), $this); ?>
<h2><?php echo smarty_function_pnml(array('name' => '_EXAMPLEINIT'), $this);?>
</h2>
<p style="text-align:center"><?php echo smarty_function_pnml(array('name' => '_EXAMPLEINITSTEP3','html' => 1), $this);?>
</p>
<p style="text-align:center"><?php echo smarty_function_pnml(array('name' => '_EXAMPLEINITTHANKS','html' => 1), $this);?>
</p>
<div style="text-align:center">
<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Modules','type' => 'admin','func' => 'initialise','authid' => $this->_tpl_vars['authid'],'activate' => $this->_tpl_vars['activate']), $this);?>
" title="<?php echo smarty_function_pnml(array('name' => '_EXAMPLEINITCONTINUE'), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_EXAMPLEINITCONTINUE'), $this);?>
</a>
</div>