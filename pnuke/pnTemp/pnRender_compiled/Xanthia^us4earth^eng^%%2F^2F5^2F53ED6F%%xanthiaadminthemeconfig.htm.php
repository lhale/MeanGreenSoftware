<?php /* Smarty version 2.6.14, created on 2007-09-20 16:49:57
         compiled from xanthiaadminthemeconfig.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'pnvarprepfordisplay', 'xanthiaadminthemeconfig.htm', 3, false),array('function', 'pnml', 'xanthiaadminthemeconfig.htm', 3, false),array('function', 'pnmodurl', 'xanthiaadminthemeconfig.htm', 5, false),array('function', 'pnsecgenauthkey', 'xanthiaadminthemeconfig.htm', 7, false),)), $this); ?>
<?php echo $this->_tpl_vars['menu']; ?>

<br />
<div class="pn-title"><?php echo ((is_array($_tmp=$this->_tpl_vars['skin'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
&nbsp;<?php echo smarty_function_pnml(array('name' => '_XA_GENERALCONFIG'), $this);?>
</div>
<div class="pn-normal" style="width:100%;">
<form action="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'updateConfig'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Xanthia'), $this);?>
" />
	<input type="hidden" name="skin" id="skin" value="<?php echo $this->_tpl_vars['skinid']; ?>
" />
	<table width="100%" border="3">
		<tr>
			<?php unset($this->_sections['columnheaders']);
$this->_sections['columnheaders']['name'] = 'columnheaders';
$this->_sections['columnheaders']['loop'] = is_array($_loop=$this->_tpl_vars['columnheaders']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['columnheaders']['show'] = true;
$this->_sections['columnheaders']['max'] = $this->_sections['columnheaders']['loop'];
$this->_sections['columnheaders']['step'] = 1;
$this->_sections['columnheaders']['start'] = $this->_sections['columnheaders']['step'] > 0 ? 0 : $this->_sections['columnheaders']['loop']-1;
if ($this->_sections['columnheaders']['show']) {
    $this->_sections['columnheaders']['total'] = $this->_sections['columnheaders']['loop'];
    if ($this->_sections['columnheaders']['total'] == 0)
        $this->_sections['columnheaders']['show'] = false;
} else
    $this->_sections['columnheaders']['total'] = 0;
if ($this->_sections['columnheaders']['show']):

            for ($this->_sections['columnheaders']['index'] = $this->_sections['columnheaders']['start'], $this->_sections['columnheaders']['iteration'] = 1;
                 $this->_sections['columnheaders']['iteration'] <= $this->_sections['columnheaders']['total'];
                 $this->_sections['columnheaders']['index'] += $this->_sections['columnheaders']['step'], $this->_sections['columnheaders']['iteration']++):
$this->_sections['columnheaders']['rownum'] = $this->_sections['columnheaders']['iteration'];
$this->_sections['columnheaders']['index_prev'] = $this->_sections['columnheaders']['index'] - $this->_sections['columnheaders']['step'];
$this->_sections['columnheaders']['index_next'] = $this->_sections['columnheaders']['index'] + $this->_sections['columnheaders']['step'];
$this->_sections['columnheaders']['first']      = ($this->_sections['columnheaders']['iteration'] == 1);
$this->_sections['columnheaders']['last']       = ($this->_sections['columnheaders']['iteration'] == $this->_sections['columnheaders']['total']);
?>
				<th><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGNAME'), $this);?>
</th>
				<th><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGDESCRIPT'), $this);?>
</th>
				<th><?php echo smarty_function_pnml(array('name' => '_XA_CONFIGSETTING'), $this);?>
</th>
			<?php endfor; endif; ?>
		</tr>
		<?php unset($this->_sections['themeconfig']);
$this->_sections['themeconfig']['name'] = 'themeconfig';
$this->_sections['themeconfig']['loop'] = is_array($_loop=$this->_tpl_vars['themeconfig']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['themeconfig']['show'] = true;
$this->_sections['themeconfig']['max'] = $this->_sections['themeconfig']['loop'];
$this->_sections['themeconfig']['step'] = 1;
$this->_sections['themeconfig']['start'] = $this->_sections['themeconfig']['step'] > 0 ? 0 : $this->_sections['themeconfig']['loop']-1;
if ($this->_sections['themeconfig']['show']) {
    $this->_sections['themeconfig']['total'] = $this->_sections['themeconfig']['loop'];
    if ($this->_sections['themeconfig']['total'] == 0)
        $this->_sections['themeconfig']['show'] = false;
} else
    $this->_sections['themeconfig']['total'] = 0;
if ($this->_sections['themeconfig']['show']):

            for ($this->_sections['themeconfig']['index'] = $this->_sections['themeconfig']['start'], $this->_sections['themeconfig']['iteration'] = 1;
                 $this->_sections['themeconfig']['iteration'] <= $this->_sections['themeconfig']['total'];
                 $this->_sections['themeconfig']['index'] += $this->_sections['themeconfig']['step'], $this->_sections['themeconfig']['iteration']++):
$this->_sections['themeconfig']['rownum'] = $this->_sections['themeconfig']['iteration'];
$this->_sections['themeconfig']['index_prev'] = $this->_sections['themeconfig']['index'] - $this->_sections['themeconfig']['step'];
$this->_sections['themeconfig']['index_next'] = $this->_sections['themeconfig']['index'] + $this->_sections['themeconfig']['step'];
$this->_sections['themeconfig']['first']      = ($this->_sections['themeconfig']['iteration'] == 1);
$this->_sections['themeconfig']['last']       = ($this->_sections['themeconfig']['iteration'] == $this->_sections['themeconfig']['total']);
?>  
		<tr>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['themeconfig'][$this->_sections['themeconfig']['index']]['name'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
&nbsp;</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['themeconfig'][$this->_sections['themeconfig']['index']]['description'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
&nbsp;</td>
			<td>
				<input type="hidden" name="config[]" id="config[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['themeconfig'][$this->_sections['themeconfig']['index']]['name'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
				<input type="text" name="setting[]" id="setting[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['themeconfig'][$this->_sections['themeconfig']['index']]['setting'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" size="10" maxlength="10" tabindex="2" />
			</td>
		</tr>
		<?php endfor; endif; ?>
	</table>
<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_SUBMIT'), $this);?>
" />
</div>
</form></div>