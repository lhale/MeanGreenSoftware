<?php /* Smarty version 2.6.14, created on 2007-09-28 10:30:49
         compiled from xanthiaadminmenu.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'admincategorymenu', 'xanthiaadminmenu.htm', 2, false),array('function', 'pngetstatusmsg', 'xanthiaadminmenu.htm', 3, false),array('function', 'pnml', 'xanthiaadminmenu.htm', 4, false),array('function', 'xanthiaadminlinks', 'xanthiaadminmenu.htm', 7, false),)), $this); ?>
<?php echo smarty_function_admincategorymenu(array(), $this);?>

<?php echo smarty_function_pngetstatusmsg(array(), $this);?>

<h1><?php echo smarty_function_pnml(array('name' => '_XA_COMPASSEDIT'), $this);?>
</h1>
<div class="pn-menu">
<?php echo smarty_function_xanthiaadminlinks(array(), $this);?>

</div>