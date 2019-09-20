<?php /* Smarty version 2.6.14, created on 2007-10-08 17:37:12
         compiled from permissions_admin_view.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'pnvarprepfordisplay', 'permissions_admin_view.htm', 4, false),array('function', 'html_options', 'permissions_admin_view.htm', 10, false),array('function', 'pnml', 'permissions_admin_view.htm', 21, false),array('function', 'cycle', 'permissions_admin_view.htm', 30, false),array('function', 'pnimg', 'permissions_admin_view.htm', 35, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "permissions_admin_menu.htm", 'smarty_include_vars' => array('permgrp' => $this->_tpl_vars['permgrp'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "componentinstance.js", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</h2>
<?php if ($this->_tpl_vars['filterlabel'] != ''): ?>
<div style="text-align:right;">
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['formurl'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
  <input type="hidden" name="authid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['authid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
  <select name="permgrp"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['permgrps'],'selected' => $this->_tpl_vars['permgrp']), $this);?>
</select>
  <input name="submit" type="submit" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['submit'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
</div>
</form>
</div>
<?php endif;  if ($this->_tpl_vars['showsirenbar'] == 1):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "permissions_admin_sirenbar.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>
<table class="pn-admintable">
  <tr>
    <th><?php echo smarty_function_pnml(array('name' => '_SEQUENCE'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_SEQ_ADJUST'), $this);?>
</th>
    <th><?php echo $this->_tpl_vars['mlpermtype']; ?>
</th>
    <th><a href="javascript:showinstanceinformation()"> <?php echo smarty_function_pnml(array('name' => '_COMPONENT'), $this);?>
</a></th>
    <th><a href="javascript:showinstanceinformation()"> <?php echo smarty_function_pnml(array('name' => '_INSTANCE'), $this);?>
</a></th>
    <th><?php echo smarty_function_pnml(array('name' => '_PERMLEVEL'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_PERMOPS'), $this);?>
</th>
  </tr>
  <?php unset($this->_sections['permissions']);
$this->_sections['permissions']['name'] = 'permissions';
$this->_sections['permissions']['loop'] = is_array($_loop=$this->_tpl_vars['permissions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['permissions']['show'] = true;
$this->_sections['permissions']['max'] = $this->_sections['permissions']['loop'];
$this->_sections['permissions']['step'] = 1;
$this->_sections['permissions']['start'] = $this->_sections['permissions']['step'] > 0 ? 0 : $this->_sections['permissions']['loop']-1;
if ($this->_sections['permissions']['show']) {
    $this->_sections['permissions']['total'] = $this->_sections['permissions']['loop'];
    if ($this->_sections['permissions']['total'] == 0)
        $this->_sections['permissions']['show'] = false;
} else
    $this->_sections['permissions']['total'] = 0;
if ($this->_sections['permissions']['show']):

            for ($this->_sections['permissions']['index'] = $this->_sections['permissions']['start'], $this->_sections['permissions']['iteration'] = 1;
                 $this->_sections['permissions']['iteration'] <= $this->_sections['permissions']['total'];
                 $this->_sections['permissions']['index'] += $this->_sections['permissions']['step'], $this->_sections['permissions']['iteration']++):
$this->_sections['permissions']['rownum'] = $this->_sections['permissions']['iteration'];
$this->_sections['permissions']['index_prev'] = $this->_sections['permissions']['index'] - $this->_sections['permissions']['step'];
$this->_sections['permissions']['index_next'] = $this->_sections['permissions']['index'] + $this->_sections['permissions']['step'];
$this->_sections['permissions']['first']      = ($this->_sections['permissions']['iteration'] == 1);
$this->_sections['permissions']['last']       = ($this->_sections['permissions']['iteration'] == $this->_sections['permissions']['total']);
?>
    <tr class="<?php echo smarty_function_cycle(array('values' => "pn-odd,pn-even"), $this);?>
">
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['sequence'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td>
	  	<?php echo '';  if ($this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['arrows']['up'] == 1):  echo '<a href="';  echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['up']['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp));  echo '">';  echo smarty_function_pnimg(array('src' => "up.gif",'alt' => $this->_tpl_vars['postions']['up']['title']), $this); echo '</a>';  endif;  echo '';  if ($this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['arrows']['down'] == 1):  echo '<a href="';  echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['down']['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp));  echo '">';  echo smarty_function_pnimg(array('src' => "down.gif",'alt' => $this->_tpl_vars['postions']['down']['title']), $this); echo '</a>';  endif;  echo ''; ?>

	  </td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['group'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['component'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['instance'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['accesslevel'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
	  <td>
	    <?php $this->assign('options', $this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['options']); ?>
        <?php unset($this->_sections['options']);
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
?>
	      <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['options'][$this->_sections['options']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo smarty_function_pnimg(array('src' => $this->_tpl_vars['options'][$this->_sections['options']['index']]['imgfile'],'title' => $this->_tpl_vars['options'][$this->_sections['options']['index']]['title'],'alt' => $this->_tpl_vars['options'][$this->_sections['options']['index']]['title']), $this);?>
</a>
        <?php endfor; endif; ?>
	  </td>
    </tr>
  <?php endfor; endif; ?>
</table>