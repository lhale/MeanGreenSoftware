<?php /* Smarty version 2.6.14, created on 2007-10-23 16:22:13
         compiled from legal_user_menu.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pngetstatusmsg', 'legal_user_menu.htm', 2, false),array('function', 'pnml', 'legal_user_menu.htm', 3, false),array('function', 'legaluserlinks', 'legal_user_menu.htm', 6, false),)), $this); ?>
<?php echo smarty_function_pngetstatusmsg(array(), $this);?>

<h1><?php echo smarty_function_pnml(array('name' => '_LEGAL'), $this);?>
</h1>
<div class="pn-menu">
<?php echo smarty_function_legaluserlinks(array(), $this);?>

</div>