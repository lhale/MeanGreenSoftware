<?php /* Smarty version 2.6.14, created on 2008-10-28 09:44:04
         compiled from modules_admin_menu.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'admincategorymenu', 'modules_admin_menu.htm', 2, false),array('function', 'pngetstatusmsg', 'modules_admin_menu.htm', 3, false),array('function', 'pnml', 'modules_admin_menu.htm', 4, false),array('function', 'modulesadminlinks', 'modules_admin_menu.htm', 5, false),)), $this); ?>
<?php echo smarty_function_admincategorymenu(array(), $this);?>

<?php echo smarty_function_pngetstatusmsg(array(), $this);?>

<h1><?php echo smarty_function_pnml(array('name' => '_MODULES'), $this);?>
</h1>
<div class="pn-menu"><?php echo smarty_function_modulesadminlinks(array(), $this);?>
</div>