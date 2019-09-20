<?php /* Smarty version 2.6.14, created on 2007-10-11 07:01:35
         compiled from admin_messages_admin_view.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'admin_messages_admin_view.htm', 3, false),array('function', 'cycle', 'admin_messages_admin_view.htm', 16, false),array('function', 'pager', 'admin_messages_admin_view.htm', 36, false),array('modifier', 'pnvarprepfordisplay', 'admin_messages_admin_view.htm', 17, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin_messages_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESVIEW'), $this);?>
</h2>
<table class="pn-admintable">
  <tr>
    <th><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESID'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESTITLE'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_LANGUAGE'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESVIEW'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESACTIVE'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESEXPIRY'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_ADMINMESSAGESEXPIRYDATE'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_OPTIONS'), $this);?>
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
    <tr class="<?php echo smarty_function_cycle(array('values' => "pn-odd,pn-even"), $this);?>
">
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['mid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['language'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['whocanview'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['active'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['expire'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['items'][$this->_sections['items']['index']]['expiredate'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
	  <td>
	    <?php $this->assign('options', $this->_tpl_vars['items'][$this->_sections['items']['index']]['options']); ?>
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
 echo '<a href="';  echo ((is_array($_tmp=$this->_tpl_vars['options'][$this->_sections['options']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp));  echo '">';  echo smarty_function_pnml(array('name' => $this->_tpl_vars['options'][$this->_sections['options']['index']]['text']), $this); echo '</a>';  if (! $this->_sections['options']['last']):  echo ' | ';  endif;  echo '';  endfor; endif;  echo ']'; ?>

	  </td>
    </tr>
  <?php endfor; endif; ?>
</table>
<?php echo smarty_function_pager(array('show' => 'page','rowcount' => $this->_tpl_vars['pager']['numitems'],'limit' => $this->_tpl_vars['pager']['itemsperpage'],'posvar' => 'startnum','shift' => 1), $this);?>