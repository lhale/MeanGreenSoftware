<?php /* Smarty version 2.6.14, created on 2007-10-04 07:04:47
         compiled from modules_admin_view.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'modules_admin_view.htm', 3, false),array('function', 'pnmodurl', 'modules_admin_view.htm', 5, false),array('function', 'pagerabc', 'modules_admin_view.htm', 18, false),array('function', 'cycle', 'modules_admin_view.htm', 31, false),array('function', 'pnimg', 'modules_admin_view.htm', 37, false),array('function', 'pager', 'modules_admin_view.htm', 50, false),array('modifier', 'pnvarprepfordisplay', 'modules_admin_view.htm', 32, false),array('modifier', 'default', 'modules_admin_view.htm', 33, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_MODULESVIEW'), $this);?>
</h2>
<div style="float:right">
<form action="<?php echo smarty_function_pnmodurl(array('modname' => 'Modules','type' => 'admin','func' => 'view'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<select id="modules_state" name="state" onchange="submit()">
		<option value="0"><?php echo smarty_function_pnml(array('name' => '_ALL'), $this);?>
</option>
		<option value="<?php echo smarty_function_pnml(array('name' => '_PNMODULE_STATE_UNINITIALISED'), $this);?>
"<?php if ($this->_tpl_vars['state'] == 1): ?> selected="selected"<?php endif; ?>><?php echo smarty_function_pnml(array('name' => '_MODULESUNINIT'), $this);?>
</option>
		<option value="<?php echo smarty_function_pnml(array('name' => '_PNMODULE_STATE_INACTIVE'), $this);?>
"<?php if ($this->_tpl_vars['state'] == 2): ?> selected="selected"<?php endif; ?>><?php echo smarty_function_pnml(array('name' => '_MODULESINACTIVE'), $this);?>
</option>
		<option value="<?php echo smarty_function_pnml(array('name' => '_PNMODULE_STATE_ACTIVE'), $this);?>
"<?php if ($this->_tpl_vars['state'] == 3): ?> selected="selected"<?php endif; ?>><?php echo smarty_function_pnml(array('name' => '_MODULESACTIVE'), $this);?>
</option>
		<option value="<?php echo smarty_function_pnml(array('name' => '_PNMODULE_STATE_MISSING'), $this);?>
"<?php if ($this->_tpl_vars['state'] == 4): ?> selected="selected"<?php endif; ?>><?php echo smarty_function_pnml(array('name' => '_MODULESFILESMISSING'), $this);?>
</option>
		<option value="<?php echo smarty_function_pnml(array('name' => '_PNMODULE_STATE_UPGRADED'), $this);?>
"<?php if ($this->_tpl_vars['state'] == 5): ?> selected="selected"<?php endif; ?>><?php echo smarty_function_pnml(array('name' => '_MODULESUPGRADED'), $this);?>
</option>
	</select>
</div>
</form>
</div>
<div>[<?php echo smarty_function_pagerabc(array('posvar' => 'letter','separator' => "|&nbsp;",'names' => "A;B;C;D;E;F;G;H;I;J;K;L;M;N;O;P;Q;R;S;T;U;V;W;X;Y;Z",'forwardvars' => "module,type,func"), $this);?>
]</div>
<div>&nbsp;</div>
<table class="pn-admintable">
  <tr>
    <th><?php echo smarty_function_pnml(array('name' => '_MODULESNAME'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_MODULESDISPNAME'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_MODULESDESC'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_MODULESDIR'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_MODULESVERSION'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_MODULESSTATE'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_MODULESACTIONS'), $this);?>
</th>
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
    <tr class="<?php echo smarty_function_cycle(array('values' => "pn-odd,pn-even"), $this);?>
">
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['modules'][$this->_sections['modules']['index']]['modinfo']['name'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['modules'][$this->_sections['modules']['index']]['modinfo']['displayname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "&nbsp;") : smarty_modifier_default($_tmp, "&nbsp;")); ?>
</td>
      <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['modules'][$this->_sections['modules']['index']]['modinfo']['description'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "&nbsp;") : smarty_modifier_default($_tmp, "&nbsp;")); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['modules'][$this->_sections['modules']['index']]['modinfo']['directory'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['modules'][$this->_sections['modules']['index']]['modinfo']['version'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo smarty_function_pnimg(array('src' => ((is_array($_tmp=$this->_tpl_vars['modules'][$this->_sections['modules']['index']]['statusimage'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp))), $this);?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['modules'][$this->_sections['modules']['index']]['status'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
	  <td>
	    <?php $this->assign('options', $this->_tpl_vars['modules'][$this->_sections['modules']['index']]['options']); ?>
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
<?php echo smarty_function_pager(array('show' => 'page','rowcount' => $this->_tpl_vars['pager']['numitems'],'limit' => $this->_tpl_vars['pager']['itemsperpage'],'posvar' => 'startnum','forwardvars' => "letter,state",'shift' => 1), $this);?>