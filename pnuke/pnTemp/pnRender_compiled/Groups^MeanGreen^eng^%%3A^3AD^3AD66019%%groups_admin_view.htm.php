<?php /* Smarty version 2.6.14, created on 2008-11-24 13:58:37
         compiled from groups_admin_view.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'groups_admin_view.htm', 3, false),array('function', 'cycle', 'groups_admin_view.htm', 11, false),array('function', 'pager', 'groups_admin_view.htm', 28, false),array('modifier', 'pnvarprepfordisplay', 'groups_admin_view.htm', 12, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "groups_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_GROUPSADMINVIEW'), $this);?>
</h2>
<table class="pn-admintable">
  <tr>
    <th><?php echo smarty_function_pnml(array('name' => '_GROUPSNAME'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_GROUPSNUMBER'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_GROUPSOPTIONS'), $this);?>
</th>
  </tr>
  <?php unset($this->_sections['groups']);
$this->_sections['groups']['name'] = 'groups';
$this->_sections['groups']['loop'] = is_array($_loop=$this->_tpl_vars['groups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['groups']['show'] = true;
$this->_sections['groups']['max'] = $this->_sections['groups']['loop'];
$this->_sections['groups']['step'] = 1;
$this->_sections['groups']['start'] = $this->_sections['groups']['step'] > 0 ? 0 : $this->_sections['groups']['loop']-1;
if ($this->_sections['groups']['show']) {
    $this->_sections['groups']['total'] = $this->_sections['groups']['loop'];
    if ($this->_sections['groups']['total'] == 0)
        $this->_sections['groups']['show'] = false;
} else
    $this->_sections['groups']['total'] = 0;
if ($this->_sections['groups']['show']):

            for ($this->_sections['groups']['index'] = $this->_sections['groups']['start'], $this->_sections['groups']['iteration'] = 1;
                 $this->_sections['groups']['iteration'] <= $this->_sections['groups']['total'];
                 $this->_sections['groups']['index'] += $this->_sections['groups']['step'], $this->_sections['groups']['iteration']++):
$this->_sections['groups']['rownum'] = $this->_sections['groups']['iteration'];
$this->_sections['groups']['index_prev'] = $this->_sections['groups']['index'] - $this->_sections['groups']['step'];
$this->_sections['groups']['index_next'] = $this->_sections['groups']['index'] + $this->_sections['groups']['step'];
$this->_sections['groups']['first']      = ($this->_sections['groups']['iteration'] == 1);
$this->_sections['groups']['last']       = ($this->_sections['groups']['iteration'] == $this->_sections['groups']['total']);
?>  
    <tr class="<?php echo smarty_function_cycle(array('values' => "pn-odd,pn-even"), $this);?>
">
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['groups'][$this->_sections['groups']['index']]['name'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['groups'][$this->_sections['groups']['index']]['gid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
	  <td>
	    <?php $this->assign('options', $this->_tpl_vars['groups'][$this->_sections['groups']['index']]['options']); ?>
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
<div style="text-align: left;"><?php echo smarty_function_pnml(array('name' => '_GROUPSISDEFAULTUSERGROUP'), $this);?>
</div>
<?php echo smarty_function_pager(array('show' => 'page','rowcount' => $this->_tpl_vars['pager']['numitems'],'limit' => $this->_tpl_vars['pager']['itemsperpage'],'posvar' => 'startnum','shift' => 1), $this);?>