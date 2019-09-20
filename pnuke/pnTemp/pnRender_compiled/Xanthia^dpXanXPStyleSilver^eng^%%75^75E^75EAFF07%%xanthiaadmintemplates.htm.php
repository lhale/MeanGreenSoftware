<?php /* Smarty version 2.6.14, created on 2007-09-28 16:32:02
         compiled from xanthiaadmintemplates.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'xanthiaadmintemplates.htm', 3, false),array('function', 'pnmodurl', 'xanthiaadmintemplates.htm', 9, false),array('modifier', 'pnvarprepfordisplay', 'xanthiaadmintemplates.htm', 32, false),)), $this); ?>
<?php echo $this->_tpl_vars['menu']; ?>

<br />
<div class="pn-title"><?php echo $this->_tpl_vars['skin']; ?>
 <?php echo smarty_function_pnml(array('name' => '_XA_TEMPLATES'), $this);?>
</div>
<div class="pn-normal" style="width:100%;">
<table width="100%" border="3">
	<tr>
		<th>
			<?php echo smarty_function_pnml(array('name' => '_XA_THEMETEMPLATES'), $this);?>
<br />
			<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'newThemeTpl','ttype' => 'theme','authid' => $this->_tpl_vars['authid'],'skin' => $this->_tpl_vars['skinid']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_XA_NEWTHEMETEMPLATE'), $this);?>
</a>
		</th>
		<th>
			<?php echo smarty_function_pnml(array('name' => '_XA_MODULETEMPLATES'), $this);?>
<br />
			<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'newThemeTpl','ttype' => 'module','authid' => $this->_tpl_vars['authid'],'skin' => $this->_tpl_vars['skinid']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_XA_NEWMODULETEMPLATE'), $this);?>
</a>
		</th>
		<th>
			<?php echo smarty_function_pnml(array('name' => '_XA_BLOCKTEMPLATES'), $this);?>
<br />
			<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'newThemeTpl','ttype' => 'block','authid' => $this->_tpl_vars['authid'],'skin' => $this->_tpl_vars['skinid']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_XA_NEWBLOCKTEMPLATE'), $this);?>
</a>
		</th>
	</tr>
	<tr>
		<td valign="top">
			<table>
				<tr>
					<td><strong><?php echo smarty_function_pnml(array('name' => '_XA_FILE'), $this);?>
</strong></td>
					<td><strong><?php echo smarty_function_pnml(array('name' => '_XA_ACTION'), $this);?>
</strong></td>
				</tr>
				<?php unset($this->_sections['themes']);
$this->_sections['themes']['name'] = 'themes';
$this->_sections['themes']['loop'] = is_array($_loop=$this->_tpl_vars['themes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['themes']['show'] = true;
$this->_sections['themes']['max'] = $this->_sections['themes']['loop'];
$this->_sections['themes']['step'] = 1;
$this->_sections['themes']['start'] = $this->_sections['themes']['step'] > 0 ? 0 : $this->_sections['themes']['loop']-1;
if ($this->_sections['themes']['show']) {
    $this->_sections['themes']['total'] = $this->_sections['themes']['loop'];
    if ($this->_sections['themes']['total'] == 0)
        $this->_sections['themes']['show'] = false;
} else
    $this->_sections['themes']['total'] = 0;
if ($this->_sections['themes']['show']):

            for ($this->_sections['themes']['index'] = $this->_sections['themes']['start'], $this->_sections['themes']['iteration'] = 1;
                 $this->_sections['themes']['iteration'] <= $this->_sections['themes']['total'];
                 $this->_sections['themes']['index'] += $this->_sections['themes']['step'], $this->_sections['themes']['iteration']++):
$this->_sections['themes']['rownum'] = $this->_sections['themes']['iteration'];
$this->_sections['themes']['index_prev'] = $this->_sections['themes']['index'] - $this->_sections['themes']['step'];
$this->_sections['themes']['index_next'] = $this->_sections['themes']['index'] + $this->_sections['themes']['step'];
$this->_sections['themes']['first']      = ($this->_sections['themes']['iteration'] == 1);
$this->_sections['themes']['last']       = ($this->_sections['themes']['iteration'] == $this->_sections['themes']['total']);
?>
					<?php $this->assign('themetpl', $this->_tpl_vars['themes'][$this->_sections['themes']['index']]['themetpl']); ?>
					<?php $this->assign('themereload', $this->_tpl_vars['themes'][$this->_sections['themes']['index']]['themereload']); ?>
					<?php unset($this->_sections['themetpl']);
$this->_sections['themetpl']['name'] = 'themetpl';
$this->_sections['themetpl']['loop'] = is_array($_loop=$this->_tpl_vars['themetpl']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['themetpl']['show'] = true;
$this->_sections['themetpl']['max'] = $this->_sections['themetpl']['loop'];
$this->_sections['themetpl']['step'] = 1;
$this->_sections['themetpl']['start'] = $this->_sections['themetpl']['step'] > 0 ? 0 : $this->_sections['themetpl']['loop']-1;
if ($this->_sections['themetpl']['show']) {
    $this->_sections['themetpl']['total'] = $this->_sections['themetpl']['loop'];
    if ($this->_sections['themetpl']['total'] == 0)
        $this->_sections['themetpl']['show'] = false;
} else
    $this->_sections['themetpl']['total'] = 0;
if ($this->_sections['themetpl']['show']):

            for ($this->_sections['themetpl']['index'] = $this->_sections['themetpl']['start'], $this->_sections['themetpl']['iteration'] = 1;
                 $this->_sections['themetpl']['iteration'] <= $this->_sections['themetpl']['total'];
                 $this->_sections['themetpl']['index'] += $this->_sections['themetpl']['step'], $this->_sections['themetpl']['iteration']++):
$this->_sections['themetpl']['rownum'] = $this->_sections['themetpl']['iteration'];
$this->_sections['themetpl']['index_prev'] = $this->_sections['themetpl']['index'] - $this->_sections['themetpl']['step'];
$this->_sections['themetpl']['index_next'] = $this->_sections['themetpl']['index'] + $this->_sections['themetpl']['step'];
$this->_sections['themetpl']['first']      = ($this->_sections['themetpl']['iteration'] == 1);
$this->_sections['themetpl']['last']       = ($this->_sections['themetpl']['iteration'] == $this->_sections['themetpl']['total']);
?>
					<tr>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['themetpl'][$this->_sections['themetpl']['index']]['label'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
						<td>[<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['themetpl'][$this->_sections['themetpl']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo smarty_function_pnml(array('name' => '_XA_EDITTEMPLATE'), $this);?>
</a>]</td>
						<?php unset($this->_sections['themereload']);
$this->_sections['themereload']['name'] = 'themereload';
$this->_sections['themereload']['loop'] = is_array($_loop=$this->_tpl_vars['themereload']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['themereload']['show'] = true;
$this->_sections['themereload']['max'] = $this->_sections['themereload']['loop'];
$this->_sections['themereload']['step'] = 1;
$this->_sections['themereload']['start'] = $this->_sections['themereload']['step'] > 0 ? 0 : $this->_sections['themereload']['loop']-1;
if ($this->_sections['themereload']['show']) {
    $this->_sections['themereload']['total'] = $this->_sections['themereload']['loop'];
    if ($this->_sections['themereload']['total'] == 0)
        $this->_sections['themereload']['show'] = false;
} else
    $this->_sections['themereload']['total'] = 0;
if ($this->_sections['themereload']['show']):

            for ($this->_sections['themereload']['index'] = $this->_sections['themereload']['start'], $this->_sections['themereload']['iteration'] = 1;
                 $this->_sections['themereload']['iteration'] <= $this->_sections['themereload']['total'];
                 $this->_sections['themereload']['index'] += $this->_sections['themereload']['step'], $this->_sections['themereload']['iteration']++):
$this->_sections['themereload']['rownum'] = $this->_sections['themereload']['iteration'];
$this->_sections['themereload']['index_prev'] = $this->_sections['themereload']['index'] - $this->_sections['themereload']['step'];
$this->_sections['themereload']['index_next'] = $this->_sections['themereload']['index'] + $this->_sections['themereload']['step'];
$this->_sections['themereload']['first']      = ($this->_sections['themereload']['iteration'] == 1);
$this->_sections['themereload']['last']       = ($this->_sections['themereload']['iteration'] == $this->_sections['themereload']['total']);
?>
							<?php if ($this->_tpl_vars['themereload'][$this->_sections['themereload']['index']]['url'] != ''): ?>   
								<td>[<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['themereload'][$this->_sections['themereload']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo smarty_function_pnml(array('name' => '_XA_RELOADTEMPLATE'), $this);?>
</a>]</td>
							<?php endif; ?>
						<?php endfor; endif; ?>
					</tr>
					<?php endfor; endif; ?>
				<?php endfor; endif; ?>
			</table>
		</td>
		<td valign="top">
			<table>
				<tr>
					<td><strong><?php echo smarty_function_pnml(array('name' => '_XA_FILE'), $this);?>
</strong></td>
					<td><strong><?php echo smarty_function_pnml(array('name' => '_XA_ACTION'), $this);?>
</strong></td>
				</tr>
				<?php unset($this->_sections['modules']);
$this->_sections['modules']['name'] = 'modules';
$this->_sections['modules']['loop'] = is_array($_loop=$this->_tpl_vars['modules']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['modules']['show'] = true;
$this->_sections['modules']['max'] = $this->_sections['modules']['loop'];
$this->_sections['modules']['step'] = 1;
$this->_sections['modules']['start'] = $this->_sections['modules']['step'] > 0 ? 0 : $this->_sections['modules']['loop']-1;
if ($this->_sections['modules']['show']) {
    $this->_sections['modules']['total'] = $this->_sections['modules']['loop'];
    if ($this->_sections['modules']['total'] == 0)
        $this->_sections['modules']['show'] = false;
} else
    $this->_sections['modules']['total'] = 0;
if ($this->_sections['modules']['show']):

            for ($this->_sections['modules']['index'] = $this->_sections['modules']['start'], $this->_sections['modules']['iteration'] = 1;
                 $this->_sections['modules']['iteration'] <= $this->_sections['modules']['total'];
                 $this->_sections['modules']['index'] += $this->_sections['modules']['step'], $this->_sections['modules']['iteration']++):
$this->_sections['modules']['rownum'] = $this->_sections['modules']['iteration'];
$this->_sections['modules']['index_prev'] = $this->_sections['modules']['index'] - $this->_sections['modules']['step'];
$this->_sections['modules']['index_next'] = $this->_sections['modules']['index'] + $this->_sections['modules']['step'];
$this->_sections['modules']['first']      = ($this->_sections['modules']['iteration'] == 1);
$this->_sections['modules']['last']       = ($this->_sections['modules']['iteration'] == $this->_sections['modules']['total']);
?>
					<?php $this->assign('moduletpl', $this->_tpl_vars['modules'][$this->_sections['modules']['index']]['moduletpl']); ?>
					<?php $this->assign('modulereload', $this->_tpl_vars['modules'][$this->_sections['modules']['index']]['modulereload']); ?>
					<?php unset($this->_sections['moduletpl']);
$this->_sections['moduletpl']['name'] = 'moduletpl';
$this->_sections['moduletpl']['loop'] = is_array($_loop=$this->_tpl_vars['moduletpl']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['moduletpl']['show'] = true;
$this->_sections['moduletpl']['max'] = $this->_sections['moduletpl']['loop'];
$this->_sections['moduletpl']['step'] = 1;
$this->_sections['moduletpl']['start'] = $this->_sections['moduletpl']['step'] > 0 ? 0 : $this->_sections['moduletpl']['loop']-1;
if ($this->_sections['moduletpl']['show']) {
    $this->_sections['moduletpl']['total'] = $this->_sections['moduletpl']['loop'];
    if ($this->_sections['moduletpl']['total'] == 0)
        $this->_sections['moduletpl']['show'] = false;
} else
    $this->_sections['moduletpl']['total'] = 0;
if ($this->_sections['moduletpl']['show']):

            for ($this->_sections['moduletpl']['index'] = $this->_sections['moduletpl']['start'], $this->_sections['moduletpl']['iteration'] = 1;
                 $this->_sections['moduletpl']['iteration'] <= $this->_sections['moduletpl']['total'];
                 $this->_sections['moduletpl']['index'] += $this->_sections['moduletpl']['step'], $this->_sections['moduletpl']['iteration']++):
$this->_sections['moduletpl']['rownum'] = $this->_sections['moduletpl']['iteration'];
$this->_sections['moduletpl']['index_prev'] = $this->_sections['moduletpl']['index'] - $this->_sections['moduletpl']['step'];
$this->_sections['moduletpl']['index_next'] = $this->_sections['moduletpl']['index'] + $this->_sections['moduletpl']['step'];
$this->_sections['moduletpl']['first']      = ($this->_sections['moduletpl']['iteration'] == 1);
$this->_sections['moduletpl']['last']       = ($this->_sections['moduletpl']['iteration'] == $this->_sections['moduletpl']['total']);
?>
						<tr>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['moduletpl'][$this->_sections['moduletpl']['index']]['label'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
							<td>[<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['moduletpl'][$this->_sections['moduletpl']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo smarty_function_pnml(array('name' => '_XA_EDITTEMPLATE'), $this);?>
</a>]</td>
							<?php unset($this->_sections['modulereload']);
$this->_sections['modulereload']['name'] = 'modulereload';
$this->_sections['modulereload']['loop'] = is_array($_loop=$this->_tpl_vars['modulereload']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['modulereload']['show'] = true;
$this->_sections['modulereload']['max'] = $this->_sections['modulereload']['loop'];
$this->_sections['modulereload']['step'] = 1;
$this->_sections['modulereload']['start'] = $this->_sections['modulereload']['step'] > 0 ? 0 : $this->_sections['modulereload']['loop']-1;
if ($this->_sections['modulereload']['show']) {
    $this->_sections['modulereload']['total'] = $this->_sections['modulereload']['loop'];
    if ($this->_sections['modulereload']['total'] == 0)
        $this->_sections['modulereload']['show'] = false;
} else
    $this->_sections['modulereload']['total'] = 0;
if ($this->_sections['modulereload']['show']):

            for ($this->_sections['modulereload']['index'] = $this->_sections['modulereload']['start'], $this->_sections['modulereload']['iteration'] = 1;
                 $this->_sections['modulereload']['iteration'] <= $this->_sections['modulereload']['total'];
                 $this->_sections['modulereload']['index'] += $this->_sections['modulereload']['step'], $this->_sections['modulereload']['iteration']++):
$this->_sections['modulereload']['rownum'] = $this->_sections['modulereload']['iteration'];
$this->_sections['modulereload']['index_prev'] = $this->_sections['modulereload']['index'] - $this->_sections['modulereload']['step'];
$this->_sections['modulereload']['index_next'] = $this->_sections['modulereload']['index'] + $this->_sections['modulereload']['step'];
$this->_sections['modulereload']['first']      = ($this->_sections['modulereload']['iteration'] == 1);
$this->_sections['modulereload']['last']       = ($this->_sections['modulereload']['iteration'] == $this->_sections['modulereload']['total']);
?>
								<?php if ($this->_tpl_vars['modulereload'][$this->_sections['modulereload']['index']]['url'] != ''): ?>   
									<td>[<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['modulereload'][$this->_sections['modulereload']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo smarty_function_pnml(array('name' => '_XA_RELOADTEMPLATE'), $this);?>
</a>]</td>
								<?php endif; ?>
							<?php endfor; endif; ?>
						</tr>
					<?php endfor; endif; ?>
				<?php endfor; endif; ?>
			</table>
		</td>
		<td valign="top">
			<table>
				<tr>
					<td><strong><?php echo smarty_function_pnml(array('name' => '_XA_FILE'), $this);?>
</strong></td>
					<td><strong><?php echo smarty_function_pnml(array('name' => '_XA_ACTION'), $this);?>
</strong></td>
				</tr>
				<?php unset($this->_sections['blocks']);
$this->_sections['blocks']['name'] = 'blocks';
$this->_sections['blocks']['loop'] = is_array($_loop=$this->_tpl_vars['blocks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['blocks']['show'] = true;
$this->_sections['blocks']['max'] = $this->_sections['blocks']['loop'];
$this->_sections['blocks']['step'] = 1;
$this->_sections['blocks']['start'] = $this->_sections['blocks']['step'] > 0 ? 0 : $this->_sections['blocks']['loop']-1;
if ($this->_sections['blocks']['show']) {
    $this->_sections['blocks']['total'] = $this->_sections['blocks']['loop'];
    if ($this->_sections['blocks']['total'] == 0)
        $this->_sections['blocks']['show'] = false;
} else
    $this->_sections['blocks']['total'] = 0;
if ($this->_sections['blocks']['show']):

            for ($this->_sections['blocks']['index'] = $this->_sections['blocks']['start'], $this->_sections['blocks']['iteration'] = 1;
                 $this->_sections['blocks']['iteration'] <= $this->_sections['blocks']['total'];
                 $this->_sections['blocks']['index'] += $this->_sections['blocks']['step'], $this->_sections['blocks']['iteration']++):
$this->_sections['blocks']['rownum'] = $this->_sections['blocks']['iteration'];
$this->_sections['blocks']['index_prev'] = $this->_sections['blocks']['index'] - $this->_sections['blocks']['step'];
$this->_sections['blocks']['index_next'] = $this->_sections['blocks']['index'] + $this->_sections['blocks']['step'];
$this->_sections['blocks']['first']      = ($this->_sections['blocks']['iteration'] == 1);
$this->_sections['blocks']['last']       = ($this->_sections['blocks']['iteration'] == $this->_sections['blocks']['total']);
?>
					<?php $this->assign('blocktpl', $this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['blocktpl']); ?>
					<?php $this->assign('blockreload', $this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['blockreload']); ?>
					<?php unset($this->_sections['blocktpl']);
$this->_sections['blocktpl']['name'] = 'blocktpl';
$this->_sections['blocktpl']['loop'] = is_array($_loop=$this->_tpl_vars['blocktpl']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['blocktpl']['show'] = true;
$this->_sections['blocktpl']['max'] = $this->_sections['blocktpl']['loop'];
$this->_sections['blocktpl']['step'] = 1;
$this->_sections['blocktpl']['start'] = $this->_sections['blocktpl']['step'] > 0 ? 0 : $this->_sections['blocktpl']['loop']-1;
if ($this->_sections['blocktpl']['show']) {
    $this->_sections['blocktpl']['total'] = $this->_sections['blocktpl']['loop'];
    if ($this->_sections['blocktpl']['total'] == 0)
        $this->_sections['blocktpl']['show'] = false;
} else
    $this->_sections['blocktpl']['total'] = 0;
if ($this->_sections['blocktpl']['show']):

            for ($this->_sections['blocktpl']['index'] = $this->_sections['blocktpl']['start'], $this->_sections['blocktpl']['iteration'] = 1;
                 $this->_sections['blocktpl']['iteration'] <= $this->_sections['blocktpl']['total'];
                 $this->_sections['blocktpl']['index'] += $this->_sections['blocktpl']['step'], $this->_sections['blocktpl']['iteration']++):
$this->_sections['blocktpl']['rownum'] = $this->_sections['blocktpl']['iteration'];
$this->_sections['blocktpl']['index_prev'] = $this->_sections['blocktpl']['index'] - $this->_sections['blocktpl']['step'];
$this->_sections['blocktpl']['index_next'] = $this->_sections['blocktpl']['index'] + $this->_sections['blocktpl']['step'];
$this->_sections['blocktpl']['first']      = ($this->_sections['blocktpl']['iteration'] == 1);
$this->_sections['blocktpl']['last']       = ($this->_sections['blocktpl']['iteration'] == $this->_sections['blocktpl']['total']);
?>
						<tr>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['blocktpl'][$this->_sections['blocktpl']['index']]['label'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
							<td>[<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['blocktpl'][$this->_sections['blocktpl']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo smarty_function_pnml(array('name' => '_XA_EDITTEMPLATE'), $this);?>
</a>]</td>
							<?php unset($this->_sections['blockreload']);
$this->_sections['blockreload']['name'] = 'blockreload';
$this->_sections['blockreload']['loop'] = is_array($_loop=$this->_tpl_vars['blockreload']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['blockreload']['show'] = true;
$this->_sections['blockreload']['max'] = $this->_sections['blockreload']['loop'];
$this->_sections['blockreload']['step'] = 1;
$this->_sections['blockreload']['start'] = $this->_sections['blockreload']['step'] > 0 ? 0 : $this->_sections['blockreload']['loop']-1;
if ($this->_sections['blockreload']['show']) {
    $this->_sections['blockreload']['total'] = $this->_sections['blockreload']['loop'];
    if ($this->_sections['blockreload']['total'] == 0)
        $this->_sections['blockreload']['show'] = false;
} else
    $this->_sections['blockreload']['total'] = 0;
if ($this->_sections['blockreload']['show']):

            for ($this->_sections['blockreload']['index'] = $this->_sections['blockreload']['start'], $this->_sections['blockreload']['iteration'] = 1;
                 $this->_sections['blockreload']['iteration'] <= $this->_sections['blockreload']['total'];
                 $this->_sections['blockreload']['index'] += $this->_sections['blockreload']['step'], $this->_sections['blockreload']['iteration']++):
$this->_sections['blockreload']['rownum'] = $this->_sections['blockreload']['iteration'];
$this->_sections['blockreload']['index_prev'] = $this->_sections['blockreload']['index'] - $this->_sections['blockreload']['step'];
$this->_sections['blockreload']['index_next'] = $this->_sections['blockreload']['index'] + $this->_sections['blockreload']['step'];
$this->_sections['blockreload']['first']      = ($this->_sections['blockreload']['iteration'] == 1);
$this->_sections['blockreload']['last']       = ($this->_sections['blockreload']['iteration'] == $this->_sections['blockreload']['total']);
?>
								<?php if ($this->_tpl_vars['blockreload'][$this->_sections['blockreload']['index']]['url'] != ''): ?>   
									<td>[<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['blockreload'][$this->_sections['blockreload']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo smarty_function_pnml(array('name' => '_XA_RELOADTEMPLATE'), $this);?>
</a>]</td>
								<?php endif; ?>
							<?php endfor; endif; ?>
						</tr>
					<?php endfor; endif; ?>
				<?php endfor; endif; ?>
			</table>
		</td>
	</tr>
</table></div>