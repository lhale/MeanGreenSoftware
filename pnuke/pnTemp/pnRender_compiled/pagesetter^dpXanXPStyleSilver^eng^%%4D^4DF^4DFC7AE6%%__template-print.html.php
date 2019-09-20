<?php /* Smarty version 2.6.14, created on 2007-10-22 16:11:16
         compiled from __template-print.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'var', '__template-print.html', 1, false),array('function', 'varFull', '__template-print.html', 4, false),)), $this); ?>
<h1><?php echo smarty_function_var(array('name' => "core.title"), $this);?>
</h1>

<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
<?php echo $this->_tpl_vars['field']['title']; ?>
: <?php echo smarty_function_varFull(array('name' => $this->_tpl_vars['field']['name'],'pageable' => $this->_tpl_vars['field']['isPageable']), $this);?>
<br />
<?php endforeach; endif; unset($_from); ?>