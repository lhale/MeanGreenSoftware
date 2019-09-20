<?php /* Smarty version 2.6.14, created on 2007-10-23 09:27:52
         compiled from example_admin_menu.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'admincategorymenu', 'example_admin_menu.htm', 2, false),array('function', 'pngetstatusmsg', 'example_admin_menu.htm', 3, false),array('function', 'pnml', 'example_admin_menu.htm', 4, false),array('function', 'exampleadminlinks', 'example_admin_menu.htm', 7, false),)), $this); ?>
<?php echo smarty_function_admincategorymenu(array(), $this);?>

<?php echo smarty_function_pngetstatusmsg(array(), $this);?>

<h1><?php echo smarty_function_pnml(array('name' => '_EXAMPLE'), $this);?>
</h1>
<div class="pn-menu">
<?php echo smarty_function_exampleadminlinks(array(), $this);?>

</div>