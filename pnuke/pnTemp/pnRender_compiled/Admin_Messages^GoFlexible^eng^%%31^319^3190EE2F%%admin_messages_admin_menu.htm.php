<?php /* Smarty version 2.6.14, created on 2008-11-02 08:38:54
         compiled from admin_messages_admin_menu.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'admincategorymenu', 'admin_messages_admin_menu.htm', 2, false),array('function', 'pngetstatusmsg', 'admin_messages_admin_menu.htm', 3, false),array('function', 'pnml', 'admin_messages_admin_menu.htm', 4, false),array('function', 'adminmessagesadminlinks', 'admin_messages_admin_menu.htm', 5, false),)), $this); ?>
<?php echo smarty_function_admincategorymenu(array(), $this);?>

<?php echo smarty_function_pngetstatusmsg(array(), $this);?>

<h1><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGES'), $this);?>
</h1>
<div class="pn-menu"><?php echo smarty_function_adminmessagesadminlinks(array(), $this);?>
</div>