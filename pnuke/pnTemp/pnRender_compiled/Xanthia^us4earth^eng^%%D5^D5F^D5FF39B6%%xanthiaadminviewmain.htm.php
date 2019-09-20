<?php /* Smarty version 2.6.14, created on 2007-09-20 16:49:18
         compiled from xanthiaadminviewmain.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'xanthiaadminviewmain.htm', 3, false),array('function', 'pnimg', 'xanthiaadminviewmain.htm', 16, false),array('function', 'pnmodurl', 'xanthiaadminviewmain.htm', 28, false),array('modifier', 'pnvarprepfordisplay', 'xanthiaadminviewmain.htm', 13, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "xanthiaadminmenu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br />
<div class="pn-title"><?php echo smarty_function_pnml(array('name' => '_XA_AVAILABLETHEMES'), $this);?>
</div>
<div class="pn-normal" style="width:100%;">
<table width="100%" border="3">
	<tr>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_THEMENAME'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_ISACTIVE'), $this);?>
</th>
		<th><?php echo smarty_function_pnml(array('name' => '_XA_ACTIONS'), $this);?>
</th>
	</tr>
	<?php unset($this->_sections['theme']);
$this->_sections['theme']['name'] = 'theme';
$this->_sections['theme']['loop'] = is_array($_loop=$this->_tpl_vars['theme']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['theme']['show'] = true;
$this->_sections['theme']['max'] = $this->_sections['theme']['loop'];
$this->_sections['theme']['step'] = 1;
$this->_sections['theme']['start'] = $this->_sections['theme']['step'] > 0 ? 0 : $this->_sections['theme']['loop']-1;
if ($this->_sections['theme']['show']) {
    $this->_sections['theme']['total'] = $this->_sections['theme']['loop'];
    if ($this->_sections['theme']['total'] == 0)
        $this->_sections['theme']['show'] = false;
} else
    $this->_sections['theme']['total'] = 0;
if ($this->_sections['theme']['show']):

            for ($this->_sections['theme']['index'] = $this->_sections['theme']['start'], $this->_sections['theme']['iteration'] = 1;
                 $this->_sections['theme']['iteration'] <= $this->_sections['theme']['total'];
                 $this->_sections['theme']['index'] += $this->_sections['theme']['step'], $this->_sections['theme']['iteration']++):
$this->_sections['theme']['rownum'] = $this->_sections['theme']['iteration'];
$this->_sections['theme']['index_prev'] = $this->_sections['theme']['index'] - $this->_sections['theme']['step'];
$this->_sections['theme']['index_next'] = $this->_sections['theme']['index'] + $this->_sections['theme']['step'];
$this->_sections['theme']['first']      = ($this->_sections['theme']['iteration'] == 1);
$this->_sections['theme']['last']       = ($this->_sections['theme']['iteration'] == $this->_sections['theme']['total']);
?>
	<tr>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['theme'][$this->_sections['theme']['index']]['themename'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
		<td>
			<?php if ($this->_tpl_vars['theme'][$this->_sections['theme']['index']]['state'] == 1): ?>
				<?php echo smarty_function_pnimg(array('src' => "green_dot.gif"), $this);?>

			<?php else: ?>
				<?php echo smarty_function_pnimg(array('src' => "red_dot.gif"), $this);?>

			<?php endif; ?>
			<?php if ($this->_tpl_vars['theme'][$this->_sections['theme']['index']]['state'] == 1): ?>
				<?php echo smarty_function_pnml(array('name' => '_XA_ACTIVE'), $this);?>

			<?php else: ?>
				<?php echo smarty_function_pnml(array('name' => '_XA_INACTIVE'), $this);?>

			<?php endif; ?>						
		</td>
		<td>
			<?php if ($this->_tpl_vars['theme'][$this->_sections['theme']['index']]['state'] == 1): ?>
				|<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'thememenu','skin' => $this->_tpl_vars['theme'][$this->_sections['theme']['index']]['themename']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_XA_EDITTHEME'), $this);?>
</a>|
				|<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'removeTheme','authid' => $this->_tpl_vars['authid'],'skin' => $this->_tpl_vars['theme'][$this->_sections['theme']['index']]['themename']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_XA_REMOVETHEME'), $this);?>
</a>|
				|<a href="index.php?theme=<?php echo $this->_tpl_vars['theme'][$this->_sections['theme']['index']]['themename']; ?>
" target="_blank"><?php echo smarty_function_pnml(array('name' => '_XA_VIEWTHEME'), $this);?>
</a>|
			<?php else: ?>
				|<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'addTheme','authid' => $this->_tpl_vars['authid'],'skin' => $this->_tpl_vars['theme'][$this->_sections['theme']['index']]['themename']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_XA_ADDTHEME'), $this);?>
</a>|
			<?php endif; ?>
			|<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'credits','skin' => $this->_tpl_vars['theme'][$this->_sections['theme']['index']]['themename']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_XA_THEMECREDITS'), $this);?>
</a>|
		</td>
	</tr>
	<?php endfor; else: ?>
	<tr>
		<td><?php echo smarty_function_pnml(array('name' => '_XA_NOTHEMESAVAILABLE'), $this);?>
</td>
		<td>****</td>
		<td></td>
	</tr>
	<?php endif; ?>
</table>
</div>