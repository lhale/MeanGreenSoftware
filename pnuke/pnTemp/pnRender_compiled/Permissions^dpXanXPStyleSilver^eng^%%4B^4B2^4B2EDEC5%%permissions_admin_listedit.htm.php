<?php /* Smarty version 2.6.14, created on 2007-10-08 17:46:33
         compiled from permissions_admin_listedit.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'pnvarprepfordisplay', 'permissions_admin_listedit.htm', 3, false),array('function', 'pnsecgenauthkey', 'permissions_admin_listedit.htm', 10, false),array('function', 'pnml', 'permissions_admin_listedit.htm', 18, false),array('function', 'cycle', 'permissions_admin_listedit.htm', 26, false),array('function', 'html_options', 'permissions_admin_listedit.htm', 31, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "permissions_admin_menu.htm", 'smarty_include_vars' => array('permgrp' => $this->_tpl_vars['permgrp'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "componentinstance.js", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</h1>
<?php if ($this->_tpl_vars['showsirenbar'] == 1):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "permissionsadminsirenbar.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['action'] == 'insert' || $this->_tpl_vars['action'] == 'modify' || $this->_tpl_vars['action'] == 'add'): ?>
<form class="pn-adminform" action="<?php echo ((is_array($_tmp=$this->_tpl_vars['formurl'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Permissions'), $this);?>
" />
<input type="hidden" name="permtype" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['permtype'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
<input type="hidden" name="permgrp" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['permgrp'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
<input type="hidden" name="insseq" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['insseq'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
<input type="hidden" name="realm" value="0" />
<?php endif; ?>
<table class="pn-admintable">
  <tr>
    <th><?php echo smarty_function_pnml(array('name' => '_SEQUENCE'), $this);?>
</th>
    <th><?php echo ((is_array($_tmp=$this->_tpl_vars['mlpermtype'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</th>
    <th><a href="javascript:showinstanceinformation()"><?php echo smarty_function_pnml(array('name' => '_COMPONENT'), $this);?>
</a></th>
    <th><a href="javascript:showinstanceinformation()"><?php echo smarty_function_pnml(array('name' => '_INSTANCE'), $this);?>
</a></th>
    <th><?php echo smarty_function_pnml(array('name' => '_PERMLEVEL'), $this);?>
</th>
    <th>&nbsp;</th>
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
      <?php if (( $this->_tpl_vars['insseq'] == $this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['sequence'] ) && ( $this->_tpl_vars['action'] == insert )): ?>
		  <td>&nbsp;</td>
          <td>	    
            <select name="id">
              <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['idvalues']), $this);?>

            </select>
          </td>
          <td><textarea name="component"></textarea></td>
          <td><textarea name="instance"></textarea></td>
          <td>
		    <select name="level">
		      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['permissionlevels']), $this);?>

            </select>
          </td>
          <td>
            <input name="submit" type="submit" value="<?php echo $this->_tpl_vars['submit']; ?>
" />
		  </td>
			</tr>
			<tr>
              <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['sequence'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
			  <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['group'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
			  <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['component'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
			  <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['instance'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
			  <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['accesslevel'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
			  <td>&nbsp;</td>
      <?php elseif (( $this->_tpl_vars['chgpid'] == $this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['pid'] ) && ( $this->_tpl_vars['action'] == modify )): ?>
		    <td>
			<input type="text" name="seq" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['sequence'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
			<input type="hidden" name="oldseq" value="<?php echo $this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['sequence']; ?>
" />
			<input type="hidden" name="pid" value="<?php echo $this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['pid']; ?>
" />
			</td>
            <td>	    
            <select name="id">
              <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['idvalues'],'selected' => $this->_tpl_vars['selectedid']), $this);?>

            </select>
			</td>
			<td><textarea name="component"><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['component'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</textarea></td>
			<td><textarea name="instance"><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['instance'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</textarea></td>
			<td>
			  <select name="level">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['permissionlevels'],'selected' => $this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['level']), $this);?>

			  </select>
			</td>
			<td>
			<input name="submit" type="submit" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['submit'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
			</td>
      <?php else: ?>	  
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['sequence'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['group'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['component'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['instance'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['accesslevel'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
        <td>&nbsp;</td>
	  <?php endif; ?>
    </tr>
  <?php endfor; endif; ?>
  <?php if ($this->_tpl_vars['action'] == 'add'): ?>
  <tr>
    <td>&nbsp;</td>
	<td>	    
	<select name="id">
	  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['idvalues'],'selected' => $this->_tpl_vars['idvalue']), $this);?>

	</select>
	</td>
	<td><textarea name="component"><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['component'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</textarea></td>
	<td><textarea name="instance"><?php echo ((is_array($_tmp=$this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['instance'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</textarea></td>
	<td>
	  <select name="level">
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['permissionlevels'],'selected' => $this->_tpl_vars['permissions'][$this->_sections['permissions']['index']]['level']), $this);?>

	  </select>
	</td>
	<td>
	<input name="submit" type="submit" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['submit'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	</td>
	</tr>
  <?php endif; ?>
</table>
<?php if ($this->_tpl_vars['action'] == 'insert' || $this->_tpl_vars['action'] == 'modify' || $this->_tpl_vars['action'] == 'add'): ?>
</div>
</form>
<?php endif;  echo $this->_tpl_vars['pager']; ?>
