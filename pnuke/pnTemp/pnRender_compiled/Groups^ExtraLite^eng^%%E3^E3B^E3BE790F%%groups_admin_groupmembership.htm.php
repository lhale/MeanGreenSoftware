<?php /* Smarty version 2.6.14, created on 2007-09-03 08:47:44
         compiled from groups_admin_groupmembership.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'groups_admin_groupmembership.htm', 3, false),array('function', 'cycle', 'groups_admin_groupmembership.htm', 11, false),array('function', 'pager', 'groups_admin_groupmembership.htm', 23, false),array('function', 'pnmodurl', 'groups_admin_groupmembership.htm', 26, false),array('function', 'pagerabc', 'groups_admin_groupmembership.htm', 26, false),array('function', 'pnsecgenauthkey', 'groups_admin_groupmembership.htm', 33, false),array('function', 'html_options', 'groups_admin_groupmembership.htm', 38, false),array('modifier', 'pnvarprepfordisplay', 'groups_admin_groupmembership.htm', 12, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "groups_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_GROUPSMEMBERSHIP'), $this);?>
</h2>
<table class="pn-admintable">
  <tr>
    <th><?php echo smarty_function_pnml(array('name' => '_USERNAME'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_GROUPSUID'), $this);?>
</th>
    <th><?php echo smarty_function_pnml(array('name' => '_GROUPSOPTIONS'), $this);?>
</th>
  </tr>
  <?php unset($this->_sections['groupmembers']);
$this->_sections['groupmembers']['name'] = 'groupmembers';
$this->_sections['groupmembers']['loop'] = is_array($_loop=$this->_tpl_vars['groupmembers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['groupmembers']['show'] = true;
$this->_sections['groupmembers']['max'] = $this->_sections['groupmembers']['loop'];
$this->_sections['groupmembers']['step'] = 1;
$this->_sections['groupmembers']['start'] = $this->_sections['groupmembers']['step'] > 0 ? 0 : $this->_sections['groupmembers']['loop']-1;
if ($this->_sections['groupmembers']['show']) {
    $this->_sections['groupmembers']['total'] = $this->_sections['groupmembers']['loop'];
    if ($this->_sections['groupmembers']['total'] == 0)
        $this->_sections['groupmembers']['show'] = false;
} else
    $this->_sections['groupmembers']['total'] = 0;
if ($this->_sections['groupmembers']['show']):

            for ($this->_sections['groupmembers']['index'] = $this->_sections['groupmembers']['start'], $this->_sections['groupmembers']['iteration'] = 1;
                 $this->_sections['groupmembers']['iteration'] <= $this->_sections['groupmembers']['total'];
                 $this->_sections['groupmembers']['index'] += $this->_sections['groupmembers']['step'], $this->_sections['groupmembers']['iteration']++):
$this->_sections['groupmembers']['rownum'] = $this->_sections['groupmembers']['iteration'];
$this->_sections['groupmembers']['index_prev'] = $this->_sections['groupmembers']['index'] - $this->_sections['groupmembers']['step'];
$this->_sections['groupmembers']['index_next'] = $this->_sections['groupmembers']['index'] + $this->_sections['groupmembers']['step'];
$this->_sections['groupmembers']['first']      = ($this->_sections['groupmembers']['iteration'] == 1);
$this->_sections['groupmembers']['last']       = ($this->_sections['groupmembers']['iteration'] == $this->_sections['groupmembers']['total']);
?>  
    <tr class="<?php echo smarty_function_cycle(array('values' => "pn-odd,pn-even"), $this);?>
">
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['groupmembers'][$this->_sections['groupmembers']['index']]['uname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['groupmembers'][$this->_sections['groupmembers']['index']]['name'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
)</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['groupmembers'][$this->_sections['groupmembers']['index']]['uid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
	  <td>
	    <?php $this->assign('options', $this->_tpl_vars['groupmembers'][$this->_sections['groupmembers']['index']]['options']); ?>
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
"><?php echo ((is_array($_tmp=$this->_tpl_vars['options'][$this->_sections['options']['index']]['title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</a>
        <?php endfor; endif; ?>
	  </td>
    </tr>
  <?php endfor; endif; ?>
</table>
<?php echo smarty_function_pager(array('show' => 'page','rowcount' => $this->_tpl_vars['pager']['numitems'],'limit' => $this->_tpl_vars['pager']['itemsperpage'],'posvar' => 'startnum','shift' => 1), $this);?>

<h2><?php echo smarty_function_pnml(array('name' => '_GROUPSADDUSER'), $this);?>
</h2>
<div class="group-membership-alphanav">
	[&nbsp;<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Groups','type' => 'admin','func' => 'groupmembership','gid' => $this->_tpl_vars['gid'],'letter' => "*"), $this);?>
">*</a>&nbsp;|&nbsp;<?php echo smarty_function_pagerabc(array('posvar' => 'letter','separator' => "&nbsp;|&nbsp;",'names' => "A;B;C;D;E;F;G;H;I;J;K;L;M;N;O;P;Q;R;S;T;U;V;W;X;Y;Z",'forwardvars' => "module,type,func,gid"), $this);?>
&nbsp;|&nbsp;<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Groups','type' => 'admin','func' => 'groupmembership','gid' => $this->_tpl_vars['gid'],'letter' => "?"), $this);?>
">?</a>&nbsp;]
</div>
<br />

<?php if ($this->_tpl_vars['uids']): ?>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Groups','type' => 'admin','func' => 'adduser'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Groups'), $this);?>
" />
	<input type="hidden" name="gid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	<div class="pn-adminformrow">
		<label for="groups_uid"><?php echo smarty_function_pnml(array('name' => '_GROUPSADDUSER'), $this);?>
</label>
		<select id="groups_uid" name="uid[]" multiple="multiple" size="10">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['uids']), $this);?>

		</select>
	</div>
	<div class="pn-adminformrow"><input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_GROUPSADDUSER'), $this);?>
" /></div>
	<div style="clear:both"></div>
</div>
</form>
<?php else:  echo smarty_function_pnml(array('name' => '_GROUPSNOMOREUSERS'), $this);?>

<?php endif; ?>