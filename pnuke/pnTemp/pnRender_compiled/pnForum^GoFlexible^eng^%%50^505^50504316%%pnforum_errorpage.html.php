<?php /* Smarty version 2.6.14, created on 2008-11-03 06:41:12
         compiled from pnforum_errorpage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'pnforum_errorpage.html', 19, false),)), $this); ?>

<!-- [ include file=pnforum_user_header.html ]-->
<br />
<div style="width: 95%;">
<fieldset style="padding: 10px 10px 0px 10px;">
    <legend>
    <?php echo smarty_function_pnml(array('name' => '_PNFORUM_ERROROCCURED'), $this);?>

    </legend>
    <br /><br />
    <?php echo $this->_tpl_vars['error_text']; ?>
<br /><br />
    <?php if ($this->_tpl_vars['file'] != ""): ?>File: <?php echo $this->_tpl_vars['file']; ?>
<br /><?php endif; ?>
    <?php if ($this->_tpl_vars['line'] != ""): ?>Line: <?php echo $this->_tpl_vars['line']; ?>
<br /><?php endif; ?>
    <br />
    <a title="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_ERRORMAILTO'), $this);?>
" href="mailto:<?php echo $this->_tpl_vars['adminmail']; ?>
"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_ERRORMAILTO'), $this);?>
</a>
    <br /><br />
</fieldset>
</div>
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pnforum_user_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>