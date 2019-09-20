<?php /* Smarty version 2.6.14, created on 2007-09-28 16:31:22
         compiled from xanthiaadminthemezones.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'pnvarprepfordisplay', 'xanthiaadminthemezones.htm', 3, false),array('function', 'pnml', 'xanthiaadminthemezones.htm', 3, false),array('function', 'pnmodurl', 'xanthiaadminthemezones.htm', 5, false),)), $this); ?>
<?php echo $this->_tpl_vars['menu']; ?>

<br />
<div class="pn-title"><?php echo ((is_array($_tmp=$this->_tpl_vars['skin'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
 <?php echo smarty_function_pnml(array('name' => '_XA_ZONECONFIG'), $this);?>
</div>
<div class="pn-menu">
<span class="pn-menuitem-title">[&nbsp;<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'newZones','skin' => $this->_tpl_vars['skinid']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_XA_ADDZONE'), $this);?>
</a>&nbsp;]</span>
</div>
<div class="pn-normal" style="width:100%;">
<table width="100%" border="3">
	<tr>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_ZONENAME'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_ZONELABEL'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_ZONETYPE'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_ISACTIVE'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_TEMPLATE'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_ACTIONS'), $this);?>
</th>
	</tr>
	<?php unset($this->_sections['items']);
$this->_sections['items']['name'] = 'items';
$this->_sections['items']['loop'] = is_array($_loop=$this->_tpl_vars['items']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['items']['show'] = true;
$this->_sections['items']['max'] = $this->_sections['items']['loop'];
$this->_sections['items']['step'] = 1;
$this->_sections['items']['start'] = $this->_sections['items']['step'] > 0 ? 0 : $this->_sections['items']['loop']-1;
if ($this->_sections['items']['show']) {
    $this->_sections['items']['total'] = $this->_sections['items']['loop'];
    if ($this->_sections['items']['total'] == 0)
        $this->_sections['items']['show'] = false;
} else
    $this->_sections['items']['total'] = 0;
if ($this->_sections['items']['show']):

            for ($this->_sections['items']['index'] = $this->_sections['items']['start'], $this->_sections['items']['iteration'] = 1;
                 $this->_sections['items']['iteration'] <= $this->_sections['items']['total'];
                 $this->_sections['items']['index'] += $this->_sections['items']['step'], $this->_sections['items']['iteration']++):
$this->_sections['items']['rownum'] = $this->_sections['items']['iteration'];
$this->_sections['items']['index_prev'] = $this->_sections['items']['index'] - $this->_sections['items']['step'];
$this->_sections['items']['index_next'] = $this->_sections['items']['index'] + $this->_sections['items']['step'];
$this->_sections['items']['first']      = ($this->_sections['items']['iteration'] == 1);
$this->_sections['items']['last']       = ($this->_sections['items']['iteration'] == $this->_sections['items']['total']);
?>  
	<tr>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['name'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['zonelabel'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['type'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['active'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['template'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td>
		<?php $this->assign('actions', $this->_tpl_vars['items'][$this->_sections['items']['index']]['actions']); ?>
		<?php unset($this->_sections['actions']);
$this->_sections['actions']['name'] = 'actions';
$this->_sections['actions']['loop'] = is_array($_loop=$this->_tpl_vars['actions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['actions']['show'] = true;
$this->_sections['actions']['max'] = $this->_sections['actions']['loop'];
$this->_sections['actions']['step'] = 1;
$this->_sections['actions']['start'] = $this->_sections['actions']['step'] > 0 ? 0 : $this->_sections['actions']['loop']-1;
if ($this->_sections['actions']['show']) {
    $this->_sections['actions']['total'] = $this->_sections['actions']['loop'];
    if ($this->_sections['actions']['total'] == 0)
        $this->_sections['actions']['show'] = false;
} else
    $this->_sections['actions']['total'] = 0;
if ($this->_sections['actions']['show']):

            for ($this->_sections['actions']['index'] = $this->_sections['actions']['start'], $this->_sections['actions']['iteration'] = 1;
                 $this->_sections['actions']['iteration'] <= $this->_sections['actions']['total'];
                 $this->_sections['actions']['index'] += $this->_sections['actions']['step'], $this->_sections['actions']['iteration']++):
$this->_sections['actions']['rownum'] = $this->_sections['actions']['iteration'];
$this->_sections['actions']['index_prev'] = $this->_sections['actions']['index'] - $this->_sections['actions']['step'];
$this->_sections['actions']['index_next'] = $this->_sections['actions']['index'] + $this->_sections['actions']['step'];
$this->_sections['actions']['first']      = ($this->_sections['actions']['iteration'] == 1);
$this->_sections['actions']['last']       = ($this->_sections['actions']['iteration'] == $this->_sections['actions']['total']);
?>
		<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['actions'][$this->_sections['actions']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['actions'][$this->_sections['actions']['index']]['label'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</a>
		<?php endfor; endif; ?>
		</td>
	</tr>
	<?php endfor; endif; ?>
</table>
</div>