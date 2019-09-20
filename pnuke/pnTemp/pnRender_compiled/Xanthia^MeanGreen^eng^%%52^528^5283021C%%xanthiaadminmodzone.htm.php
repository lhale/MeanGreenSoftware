<?php /* Smarty version 2.6.14, created on 2008-11-04 11:41:31
         compiled from xanthiaadminmodzone.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'xanthiaadminmodzone.htm', 3, false),array('function', 'pnmodurl', 'xanthiaadminmodzone.htm', 5, false),array('function', 'pnsecgenauthkey', 'xanthiaadminmodzone.htm', 7, false),array('modifier', 'pnvarprepfordisplay', 'xanthiaadminmodzone.htm', 8, false),)), $this); ?>
<?php echo $this->_tpl_vars['menu']; ?>

<br />
<div class="pn-title"><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGTEMPLATES'), $this);?>
</div>
<div class="pn-normal"><?php echo smarty_function_pnml(array('name' => '_XA_TPLINFO'), $this);?>
</div>
<form action="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'updateZones'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded" name="modifythemezone">		
<div>
<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Xanthia'), $this);?>
" />
<input type="hidden" name="skin" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['skinid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />	
<input type="hidden" name="zone" id="zone" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['zone'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
<input type="hidden" name="skintype" id="skintype" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['skintype'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
<table>
	<tr>
		<td><?php echo smarty_function_pnml(array('name' => '_XA_ZONELABEL'), $this);?>
</td>
		<td><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['zone'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</strong></td>
	</tr>
	<tr>
		<td><?php echo smarty_function_pnml(array('name' => '_XA_TEMPLATE'), $this);?>
</td>
		<td>
			<select name="tpl" id="tpl" size="1" tabindex="3">
			<?php unset($this->_sections['allzones']);
$this->_sections['allzones']['name'] = 'allzones';
$this->_sections['allzones']['loop'] = is_array($_loop=$this->_tpl_vars['allzones']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['allzones']['show'] = true;
$this->_sections['allzones']['max'] = $this->_sections['allzones']['loop'];
$this->_sections['allzones']['step'] = 1;
$this->_sections['allzones']['start'] = $this->_sections['allzones']['step'] > 0 ? 0 : $this->_sections['allzones']['loop']-1;
if ($this->_sections['allzones']['show']) {
    $this->_sections['allzones']['total'] = $this->_sections['allzones']['loop'];
    if ($this->_sections['allzones']['total'] == 0)
        $this->_sections['allzones']['show'] = false;
} else
    $this->_sections['allzones']['total'] = 0;
if ($this->_sections['allzones']['show']):

            for ($this->_sections['allzones']['index'] = $this->_sections['allzones']['start'], $this->_sections['allzones']['iteration'] = 1;
                 $this->_sections['allzones']['iteration'] <= $this->_sections['allzones']['total'];
                 $this->_sections['allzones']['index'] += $this->_sections['allzones']['step'], $this->_sections['allzones']['iteration']++):
$this->_sections['allzones']['rownum'] = $this->_sections['allzones']['iteration'];
$this->_sections['allzones']['index_prev'] = $this->_sections['allzones']['index'] - $this->_sections['allzones']['step'];
$this->_sections['allzones']['index_next'] = $this->_sections['allzones']['index'] + $this->_sections['allzones']['step'];
$this->_sections['allzones']['first']      = ($this->_sections['allzones']['iteration'] == 1);
$this->_sections['allzones']['last']       = ($this->_sections['allzones']['iteration'] == $this->_sections['allzones']['total']);
?>  
			<?php if ($this->_tpl_vars['defaultzone'] == $this->_tpl_vars['allzones'][$this->_sections['allzones']['index']]['id']): ?>
				<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['allzones'][$this->_sections['allzones']['index']]['id'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" selected="selected"><?php echo ((is_array($_tmp=$this->_tpl_vars['allzones'][$this->_sections['allzones']['index']]['name'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</option>
			<?php else: ?>
				<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['allzones'][$this->_sections['allzones']['index']]['id'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['allzones'][$this->_sections['allzones']['index']]['name'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</option>
			<?php endif; ?>
			<?php endfor; endif; ?>
			</select>
		</td>
	</tr>
	<tr>
</table>
<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_SUBMIT'), $this);?>
" />
</div>
</form>