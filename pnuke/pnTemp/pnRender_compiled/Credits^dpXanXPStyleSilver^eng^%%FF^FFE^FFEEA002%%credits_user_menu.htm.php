<?php /* Smarty version 2.6.14, created on 2007-10-09 09:39:29
         compiled from credits_user_menu.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pngetstatusmsg', 'credits_user_menu.htm', 2, false),array('function', 'pnml', 'credits_user_menu.htm', 3, false),array('function', 'pnmodurl', 'credits_user_menu.htm', 5, false),)), $this); ?>
<?php echo smarty_function_pngetstatusmsg(array(), $this);?>

<h1><?php echo smarty_function_pnml(array('name' => '_CREDITSTITLE'), $this);?>
</h1>
<div class="pn-menu">
<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Credits','type' => 'user','func' => 'main'), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_CREDITSTITLE'), $this);?>
</a>
</div>