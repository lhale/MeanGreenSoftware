<?php /* Smarty version 2.6.14, created on 2007-09-14 13:50:30
         compiled from blocks_admin_view.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'blocks_admin_view.htm', 3, false),array('function', 'cycle', 'blocks_admin_view.htm', 16, false),array('function', 'pnimg', 'blocks_admin_view.htm', 19, false),array('modifier', 'pnvarprepfordisplay', 'blocks_admin_view.htm', 19, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "blocks_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_VIEWBLOCKS'), $this);?>
</h2>
<table class="pn-admintable">
  <tr>
    <th><?php echo smarty_function_pnml(array('name' => '_ORDER'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_POSITION'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_TITLE'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_MODULE'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_NAME'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_LANGUAGE'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_STATE'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_OPTIONS'), $this);?>
</th>
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
    <tr class="<?php echo smarty_function_cycle(array('values' => "pn-odd,pn-even"), $this);?>
">
      <td>&nbsp;
	    <?php if ($this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['arrows']['up'] == 1): ?>
		  <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['upurl'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo smarty_function_pnimg(array('src' => "up.gif",'alt' => '_UP','altml' => true), $this);?>
</a>
		<?php endif; ?>
	    <?php if ($this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['arrows']['down'] == 1): ?>
		  <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['downurl'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo smarty_function_pnimg(array('src' => "down.gif",'alt' => '_DOWN','altml' => true), $this);?>
</a>
		<?php endif; ?>
	  </td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['postion'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['modname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['bkey'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['language'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo smarty_function_pnimg(array('src' => $this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['stateimage']), $this);?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['state'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
	  <td>
	    <?php $this->assign('options', $this->_tpl_vars['blocks'][$this->_sections['blocks']['index']]['options']); ?>
		<?php echo '[';  unset($this->_sections['options']);
$this->_sections['options']['name'] = 'options';
$this->_sections['options']['loop'] = is_array($_loop=$this->_tpl_vars['options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['options']['show'] = true;
$this->_sections['options']['max'] = $this->_sections['options']['loop'];
$this->_sections['options']['step'] = 1;
$this->_sections['options']['start'] = $this->_sections['options']['step'] > 0 ? 0 : $this->_sections['options']['loop']-1;
if ($this->_sections['options']['show']) {
    $this->_sections['options']['total'] = $this->_sections['options']['loop'];
    if ($this->_sections['options']['total'] == 0)
        $this->_sections['options']['show'] = false;
} else
    $this->_sections['options']['total'] = 0;
if ($this->_sections['options']['show']):

            for ($this->_sections['options']['index'] = $this->_sections['options']['start'], $this->_sections['options']['iteration'] = 1;
                 $this->_sections['options']['iteration'] <= $this->_sections['options']['total'];
                 $this->_sections['options']['index'] += $this->_sections['options']['step'], $this->_sections['options']['iteration']++):
$this->_sections['options']['rownum'] = $this->_sections['options']['iteration'];
$this->_sections['options']['index_prev'] = $this->_sections['options']['index'] - $this->_sections['options']['step'];
$this->_sections['options']['index_next'] = $this->_sections['options']['index'] + $this->_sections['options']['step'];
$this->_sections['options']['first']      = ($this->_sections['options']['iteration'] == 1);
$this->_sections['options']['last']       = ($this->_sections['options']['iteration'] == $this->_sections['options']['total']);
 echo '<a href="';  echo ((is_array($_tmp=$this->_tpl_vars['options'][$this->_sections['options']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp));  echo '">';  echo smarty_function_pnml(array('name' => $this->_tpl_vars['options'][$this->_sections['options']['index']]['title']), $this); echo '</a>';  if (! $this->_sections['options']['last']):  echo ' | ';  endif;  echo '';  endfor; endif;  echo ']'; ?>

	  </td>
    </tr>
  <?php endfor; endif; ?>
</table>