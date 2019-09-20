<?php /* Smarty version 2.6.14, created on 2007-09-28 16:12:52
         compiled from xanthiaadmincolors.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'pnvarprepfordisplay', 'xanthiaadmincolors.htm', 3, false),array('function', 'pnml', 'xanthiaadmincolors.htm', 3, false),array('function', 'pnmodurl', 'xanthiaadmincolors.htm', 4, false),)), $this); ?>
<?php echo $this->_tpl_vars['menu']; ?>

<br />
<div class="pn-title"><?php echo ((is_array($_tmp=$this->_tpl_vars['skin'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
&nbsp;<?php echo smarty_function_pnml(array('name' => '_XA_COLORSCONFIG'), $this);?>
</div>
<div class="pn-menu">[&nbsp;<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'newColor','skin' => $this->_tpl_vars['skinid']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_XA_ADDCOLOR'), $this);?>
</a>&nbsp;]</div>
<div class="pn-normal" style="width:100%;">
<!--Start Color Loop-->
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
<div class="pn-title"><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['palname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</div>
<table width="100%" border="3">
	<tr>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_BACKGROUNDC'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_SEPERATORC'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_TEXT1C'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_TEXT2C'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_LINKC'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_VLINKC'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_HOVERC'), $this);?>
</th>
	</tr>
	<tr>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['bgcolor'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['sepcolor'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['text1'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['text2'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['link'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['vlink'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['hover'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['bgcolor'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['sepcolor'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['text1'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['text2'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['link'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['vlink'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['hover'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
	</tr>
</table>
<table width="100%" border="3">
	<tr>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_COLOR1C'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_COLOR2C'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_COLOR3C'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_COLOR4C'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_COLOR5C'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_COLOR6C'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_COLOR7C'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_COLOR8C'), $this);?>
</th>
	</tr>
	<tr>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color1'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color2'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color3'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color4'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color5'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color6'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color7'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
		<td style="background-color:<?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color8'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color1'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color2'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color3'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color4'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color5'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color6'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color7'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['color8'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
	</tr>
</table>
<table width="100%" border="3">
	<tr>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_ACTIONS'), $this);?>
<br />
		<?php $this->assign('display', $this->_tpl_vars['items'][$this->_sections['items']['index']]['display']); ?>	    
		<?php unset($this->_sections['display']);
$this->_sections['display']['name'] = 'display';
$this->_sections['display']['loop'] = is_array($_loop=$this->_tpl_vars['display']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['display']['show'] = true;
$this->_sections['display']['max'] = $this->_sections['display']['loop'];
$this->_sections['display']['step'] = 1;
$this->_sections['display']['start'] = $this->_sections['display']['step'] > 0 ? 0 : $this->_sections['display']['loop']-1;
if ($this->_sections['display']['show']) {
    $this->_sections['display']['total'] = $this->_sections['display']['loop'];
    if ($this->_sections['display']['total'] == 0)
        $this->_sections['display']['show'] = false;
} else
    $this->_sections['display']['total'] = 0;
if ($this->_sections['display']['show']):

            for ($this->_sections['display']['index'] = $this->_sections['display']['start'], $this->_sections['display']['iteration'] = 1;
                 $this->_sections['display']['iteration'] <= $this->_sections['display']['total'];
                 $this->_sections['display']['index'] += $this->_sections['display']['step'], $this->_sections['display']['iteration']++):
$this->_sections['display']['rownum'] = $this->_sections['display']['iteration'];
$this->_sections['display']['index_prev'] = $this->_sections['display']['index'] - $this->_sections['display']['step'];
$this->_sections['display']['index_next'] = $this->_sections['display']['index'] + $this->_sections['display']['step'];
$this->_sections['display']['first']      = ($this->_sections['display']['iteration'] == 1);
$this->_sections['display']['last']       = ($this->_sections['display']['iteration'] == $this->_sections['display']['total']);
?>
			<?php if ($this->_tpl_vars['display'][$this->_sections['display']['index']]['url'] == 1): ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['display'][$this->_sections['display']['index']]['label'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
&nbsp;
			<?php else: ?>
				<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['display'][$this->_sections['display']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['display'][$this->_sections['display']['index']]['label'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</a>&nbsp;
			<?php endif; ?>
		<?php endfor; endif; ?>
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
</a>&nbsp;
		<?php endfor; endif; ?>
		</th>
	</tr>
</table>
<br /><br />
<!--End Color Loop-->
<?php endfor; endif; ?>
</div>