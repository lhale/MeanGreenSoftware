<?php /* Smarty version 2.6.14, created on 2007-09-03 08:26:21
         compiled from admin_messages_block_messages.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'pnvarprephtmldisplay', 'admin_messages_block_messages.htm', 4, false),array('modifier', 'pnmodcallhooks', 'admin_messages_block_messages.htm', 4, false),array('modifier', 'pnvarcensor', 'admin_messages_block_messages.htm', 4, false),)), $this); ?>
<div style="padding:5px;">
<?php unset($this->_sections['messages']);
$this->_sections['messages']['name'] = 'messages';
$this->_sections['messages']['loop'] = is_array($_loop=$this->_tpl_vars['messages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['messages']['show'] = true;
$this->_sections['messages']['max'] = $this->_sections['messages']['loop'];
$this->_sections['messages']['step'] = 1;
$this->_sections['messages']['start'] = $this->_sections['messages']['step'] > 0 ? 0 : $this->_sections['messages']['loop']-1;
if ($this->_sections['messages']['show']) {
    $this->_sections['messages']['total'] = $this->_sections['messages']['loop'];
    if ($this->_sections['messages']['total'] == 0)
        $this->_sections['messages']['show'] = false;
} else
    $this->_sections['messages']['total'] = 0;
if ($this->_sections['messages']['show']):

            for ($this->_sections['messages']['index'] = $this->_sections['messages']['start'], $this->_sections['messages']['iteration'] = 1;
                 $this->_sections['messages']['iteration'] <= $this->_sections['messages']['total'];
                 $this->_sections['messages']['index'] += $this->_sections['messages']['step'], $this->_sections['messages']['iteration']++):
$this->_sections['messages']['rownum'] = $this->_sections['messages']['iteration'];
$this->_sections['messages']['index_prev'] = $this->_sections['messages']['index'] - $this->_sections['messages']['step'];
$this->_sections['messages']['index_next'] = $this->_sections['messages']['index'] + $this->_sections['messages']['step'];
$this->_sections['messages']['first']      = ($this->_sections['messages']['iteration'] == 1);
$this->_sections['messages']['last']       = ($this->_sections['messages']['iteration'] == $this->_sections['messages']['total']);
?>
<h1><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['messages'][$this->_sections['messages']['index']]['title'])) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)))) ? $this->_run_mod_handler('pnmodcallhooks', true, $_tmp, 'Admin_Messages') : smarty_modifier_pnmodcallhooks($_tmp, 'Admin_Messages')))) ? $this->_run_mod_handler('pnvarcensor', true, $_tmp) : smarty_modifier_pnvarcensor($_tmp)); ?>
</h1>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['messages'][$this->_sections['messages']['index']]['content'])) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)))) ? $this->_run_mod_handler('pnmodcallhooks', true, $_tmp, 'Admin_Messages') : smarty_modifier_pnmodcallhooks($_tmp, 'Admin_Messages')))) ? $this->_run_mod_handler('pnvarcensor', true, $_tmp) : smarty_modifier_pnvarcensor($_tmp)); ?>

<?php endfor; endif; ?>
</div>