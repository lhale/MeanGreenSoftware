<?php /* Smarty version 2.6.14, created on 2008-11-24 13:58:37
         compiled from groups_admin_menu.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'admincategorymenu', 'groups_admin_menu.htm', 2, false),array('function', 'pngetstatusmsg', 'groups_admin_menu.htm', 3, false),array('function', 'pnml', 'groups_admin_menu.htm', 4, false),array('function', 'groupsadminlinks', 'groups_admin_menu.htm', 5, false),)), $this); ?>
<?php echo smarty_function_admincategorymenu(array(), $this);?>

<?php echo smarty_function_pngetstatusmsg(array(), $this);?>

<h1><?php echo smarty_function_pnml(array('name' => '_GROUPS'), $this);?>
</h1>
<div class="pn-menu"><?php echo smarty_function_groupsadminlinks(array(), $this);?>
</div>