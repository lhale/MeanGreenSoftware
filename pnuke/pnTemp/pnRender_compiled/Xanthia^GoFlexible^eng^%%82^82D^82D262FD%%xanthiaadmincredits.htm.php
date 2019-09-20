<?php /* Smarty version 2.6.14, created on 2008-11-04 11:28:28
         compiled from xanthiaadmincredits.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'xanthiaadmincredits.htm', 3, false),array('modifier', 'upper', 'xanthiaadmincredits.htm', 8, false),array('modifier', 'pnvarprepfordisplay', 'xanthiaadmincredits.htm', 10, false),)), $this); ?>
<?php echo $this->_tpl_vars['menu']; ?>

<br />
<div class="pn-normal"><span class="pn-title"><?php echo smarty_function_pnml(array('name' => '_XA_THEMECREDITS'), $this);?>
</span></div>
<br />
<table>
<?php $_from = $this->_tpl_vars['themeinfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['themekey'] => $this->_tpl_vars['themefield']):
?>
    <tr>
	    <?php $this->assign('themeconstant', ((is_array($_tmp=$this->_tpl_vars['themekey'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp))); ?>
        <td><?php echo smarty_function_pnml(array('name' => "_XA_".($this->_tpl_vars['themeconstant'])), $this);?>
</td>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['themefield'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
    </tr>
<?php endforeach; endif; unset($_from); ?>
</table>