<?php /* Smarty version 2.6.14, created on 2007-09-27 15:59:57
         compiled from xanthiaadminblockzones.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'pnvarprephtmldisplay', 'xanthiaadminblockzones.htm', 3, false),array('modifier', 'pnvarprepfordisplay', 'xanthiaadminblockzones.htm', 5, false),)), $this); ?>
<?php echo $this->_tpl_vars['menu']; ?>

<br />
<div class="pn-title"><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)); ?>
</div>
<div class="pn-normal" style="width:100%;">
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['formurl'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo $this->_tpl_vars['authid']; ?>
" />
	<input type="hidden" name="skinID" id="skinID" value="<?php echo $this->_tpl_vars['skinID']; ?>
" />
	<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['nextid']; ?>
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
				<th><?php echo ((is_array($_tmp=$this->_tpl_vars['columnheaders'][$this->_sections['columnheaders']['index']])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</th>
			<?php endfor; endif; ?>
		</tr>
		<?php unset($this->_sections['blockzones']);
$this->_sections['blockzones']['name'] = 'blockzones';
$this->_sections['blockzones']['loop'] = is_array($_loop=$this->_tpl_vars['blockzones']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['blockzones']['show'] = true;
$this->_sections['blockzones']['max'] = $this->_sections['blockzones']['loop'];
$this->_sections['blockzones']['step'] = 1;
$this->_sections['blockzones']['start'] = $this->_sections['blockzones']['step'] > 0 ? 0 : $this->_sections['blockzones']['loop']-1;
if ($this->_sections['blockzones']['show']) {
    $this->_sections['blockzones']['total'] = $this->_sections['blockzones']['loop'];
    if ($this->_sections['blockzones']['total'] == 0)
        $this->_sections['blockzones']['show'] = false;
} else
    $this->_sections['blockzones']['total'] = 0;
if ($this->_sections['blockzones']['show']):

            for ($this->_sections['blockzones']['index'] = $this->_sections['blockzones']['start'], $this->_sections['blockzones']['iteration'] = 1;
                 $this->_sections['blockzones']['iteration'] <= $this->_sections['blockzones']['total'];
                 $this->_sections['blockzones']['index'] += $this->_sections['blockzones']['step'], $this->_sections['blockzones']['iteration']++):
$this->_sections['blockzones']['rownum'] = $this->_sections['blockzones']['iteration'];
$this->_sections['blockzones']['index_prev'] = $this->_sections['blockzones']['index'] - $this->_sections['blockzones']['step'];
$this->_sections['blockzones']['index_next'] = $this->_sections['blockzones']['index'] + $this->_sections['blockzones']['step'];
$this->_sections['blockzones']['first']      = ($this->_sections['blockzones']['iteration'] == 1);
$this->_sections['blockzones']['last']       = ($this->_sections['blockzones']['iteration'] == $this->_sections['blockzones']['total']);
?>  
		<tr>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['blockzones'][$this->_sections['blockzones']['index']]['zid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['blockzones'][$this->_sections['blockzones']['index']]['zdesc'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['blockzones'][$this->_sections['blockzones']['index']]['ztag'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
			<td><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['blockzones'][$this->_sections['blockzones']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['blockzones'][$this->_sections['blockzones']['index']]['label'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</a></td>
		</tr>
		<?php endfor; endif; ?>
		<tr>
			<td><?php echo $this->_tpl_vars['addzone']; ?>
</td>
			<td><input type="text" name="desc" id="desc" value="" size="20" maxlength="20" tabindex="2" /></td>
			<td>&lt;!--<input type="text" name="tag" id="tag" value="" size="20" maxlength="20" tabindex="3" />--&gt;</td>
			<td><input name="submit" type="submit" value="<?php echo $this->_tpl_vars['submit']; ?>
" /></td>
		</tr>
	</table>
</div>
</form>
</div>