<?php /* Smarty version 2.6.14, created on 2008-11-10 06:47:29
         compiled from htmlpages_user_display.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnmodurl', 'htmlpages_user_display.htm', 3, false),array('function', 'pnml', 'htmlpages_user_display.htm', 3, false),array('function', 'pnimg', 'htmlpages_user_display.htm', 4, false),array('function', 'pnmodcallhooks', 'htmlpages_user_display.htm', 10, false),array('modifier', 'pnmodcallhooks', 'htmlpages_user_display.htm', 7, false),array('modifier', 'pnvarprephtmldisplay', 'htmlpages_user_display.htm', 7, false),)), $this); ?>
<?php if ($this->_tpl_vars['printlink']): ?>
<div class="htmlpages-printerlink">
<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','type' => 'user','func' => 'display','pid' => $this->_tpl_vars['pid'],'theme' => 'Printer'), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_PRINTFRIENDLY'), $this);?>
</a>
<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','type' => 'user','func' => 'display','pid' => $this->_tpl_vars['pid'],'theme' => 'Printer'), $this);?>
"> <?php echo smarty_function_pnimg(array('src' => "print.gif",'alt' => '_PRINTFRIENDLY'), $this);?>
</a>
</div>
<?php endif; ?>
<h1><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('pnmodcallhooks', true, $_tmp) : smarty_modifier_pnmodcallhooks($_tmp)))) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)); ?>
</h1>
<?php echo ((is_array($_tmp=$this->_tpl_vars['content'])) ? $this->_run_mod_handler('pnmodcallhooks', true, $_tmp) : smarty_modifier_pnmodcallhooks($_tmp)); ?>

<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','func' => 'display','pid' => $this->_tpl_vars['pid'],'assign' => 'returnurl'), $this);?>

<?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'item','hookaction' => 'display','hookid' => $this->_tpl_vars['pid'],'module' => 'htmlpages','returnurl' => $this->_tpl_vars['returnurl']), $this);?>