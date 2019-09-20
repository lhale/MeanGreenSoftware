<?php /* Smarty version 2.6.14, created on 2008-11-10 05:42:48
         compiled from htmlpages_admin_menu.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'admincategorymenu', 'htmlpages_admin_menu.htm', 2, false),array('function', 'pnml', 'htmlpages_admin_menu.htm', 4, false),array('function', 'htmlpagesadminlinks', 'htmlpages_admin_menu.htm', 7, false),)), $this); ?>
<?php echo smarty_function_admincategorymenu(array(), $this);?>

<div class="pn-adminbox">
<h1><?php echo smarty_function_pnml(array('name' => '_HTMLPAGES'), $this);?>
</h1>
<div class="pn-menu">
<?php echo smarty_function_htmlpagesadminlinks(array(), $this);?>

</div>
</div>