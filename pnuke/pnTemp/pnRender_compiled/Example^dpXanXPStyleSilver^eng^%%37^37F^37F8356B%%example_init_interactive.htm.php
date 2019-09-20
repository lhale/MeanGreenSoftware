<?php /* Smarty version 2.6.14, created on 2007-10-23 09:25:14
         compiled from example_init_interactive.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'example_init_interactive.htm', 2, false),array('function', 'pnmodurl', 'example_init_interactive.htm', 5, false),)), $this); ?>
<h2><?php echo smarty_function_pnml(array('name' => '_EXAMPLEINIT'), $this);?>
</h2>
<div style="text-align:center;">
<p><?php echo smarty_function_pnml(array('name' => '_EXAMPLEINITWELCOME','html' => 1), $this);?>
</p>
<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Example','type' => 'init','func' => 'step2'), $this);?>
" title="<?php echo smarty_function_pnml(array('name' => '_EXAMPLEINITCONTINUE'), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_EXAMPLEINITCONTINUE'), $this);?>
</a>
</div>