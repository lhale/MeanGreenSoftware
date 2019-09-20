<?php /* Smarty version 2.6.14, created on 2007-10-08 14:48:36
         compiled from admin_admin_menu.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'admincategorymenu', 'admin_admin_menu.htm', 2, false),array('function', 'pngetstatusmsg', 'admin_admin_menu.htm', 3, false),array('function', 'pnml', 'admin_admin_menu.htm', 4, false),array('function', 'adminadminlinks', 'admin_admin_menu.htm', 5, false),)), $this); ?>
<?php echo smarty_function_admincategorymenu(array(), $this);?>

<?php echo smarty_function_pngetstatusmsg(array(), $this);?>

<h1><?php echo smarty_function_pnml(array('name' => '_ADMIN'), $this);?>
</h1>
<div class="pn-menu"><?php echo smarty_function_adminadminlinks(array(), $this);?>
</div>