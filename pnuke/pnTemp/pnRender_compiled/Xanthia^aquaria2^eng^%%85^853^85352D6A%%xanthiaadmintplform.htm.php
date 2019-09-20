<?php /* Smarty version 2.6.14, created on 2007-09-28 10:39:45
         compiled from xanthiaadmintplform.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnmodurl', 'xanthiaadmintplform.htm', 2, false),array('function', 'pnsecgenauthkey', 'xanthiaadmintplform.htm', 5, false),array('function', 'pnml', 'xanthiaadmintplform.htm', 12, false),array('modifier', 'pnvarprepfordisplay', 'xanthiaadmintplform.htm', 22, false),)), $this); ?>
<?php echo $this->_tpl_vars['menu']; ?>

<form method="post" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'doModTemplate'), $this);?>
">
<div>
<?php unset($this->_sections['formcontent']);
$this->_sections['formcontent']['name'] = 'formcontent';
$this->_sections['formcontent']['loop'] = is_array($_loop=$this->_tpl_vars['formcontent']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['formcontent']['show'] = true;
$this->_sections['formcontent']['max'] = $this->_sections['formcontent']['loop'];
$this->_sections['formcontent']['step'] = 1;
$this->_sections['formcontent']['start'] = $this->_sections['formcontent']['step'] > 0 ? 0 : $this->_sections['formcontent']['loop']-1;
if ($this->_sections['formcontent']['show']) {
    $this->_sections['formcontent']['total'] = $this->_sections['formcontent']['loop'];
    if ($this->_sections['formcontent']['total'] == 0)
        $this->_sections['formcontent']['show'] = false;
} else
    $this->_sections['formcontent']['total'] = 0;
if ($this->_sections['formcontent']['show']):

            for ($this->_sections['formcontent']['index'] = $this->_sections['formcontent']['start'], $this->_sections['formcontent']['iteration'] = 1;
                 $this->_sections['formcontent']['iteration'] <= $this->_sections['formcontent']['total'];
                 $this->_sections['formcontent']['index'] += $this->_sections['formcontent']['step'], $this->_sections['formcontent']['iteration']++):
$this->_sections['formcontent']['rownum'] = $this->_sections['formcontent']['iteration'];
$this->_sections['formcontent']['index_prev'] = $this->_sections['formcontent']['index'] - $this->_sections['formcontent']['step'];
$this->_sections['formcontent']['index_next'] = $this->_sections['formcontent']['index'] + $this->_sections['formcontent']['step'];
$this->_sections['formcontent']['first']      = ($this->_sections['formcontent']['iteration'] == 1);
$this->_sections['formcontent']['last']       = ($this->_sections['formcontent']['iteration'] == $this->_sections['formcontent']['total']);
?>
	<input type="hidden" name="authid" id="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Xanthia'), $this);?>
" />
	<input type="hidden" name="tpl_id" id="tpl_id" value="<?php echo $this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['hiddentpl_id']; ?>
" />
	<input type="hidden" name="skin_id" id="skin_id" value="<?php echo $this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['hiddenskin_id']; ?>
" />
	<input type="hidden" name="tpl_file" id="tpl_file" value="<?php echo $this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['hiddentpl_file']; ?>
" />
	<input type="hidden" name="osource" id="osource" value="<?php echo $this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['hiddenosource']; ?>
" />
	<table>
		<tr>
			<th><?php echo smarty_function_pnml(array('name' => '_XA_EDITTEMPLATEFILE'), $this);?>
</th>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['filetext']; ?>
:&nbsp;&nbsp;<?php echo $this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['filename']; ?>
</td>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['modifiedtext']; ?>
:&nbsp;&nbsp;<?php echo $this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['modified']; ?>
</td>
		</tr>
		<tr>
			<td>
				<textarea name="source" id="source" rows="25" cols="120" tabindex="1"><?php echo ((is_array($_tmp=$this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['source'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="<?php echo smarty_function_pnml(array('name' => '_SUBMIT'), $this);?>
" />
			</td>
		</tr>
	</table>
<?php endfor; endif; ?>
</div>
</form>