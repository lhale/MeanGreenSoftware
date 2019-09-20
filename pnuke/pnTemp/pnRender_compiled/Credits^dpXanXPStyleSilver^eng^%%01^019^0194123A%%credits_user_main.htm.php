<?php /* Smarty version 2.6.14, created on 2007-10-09 09:39:29
         compiled from credits_user_main.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'credits_user_main.htm', 3, false),array('function', 'pnmodurl', 'credits_user_main.htm', 5, false),array('modifier', 'default', 'credits_user_main.htm', 28, false),array('modifier', 'pnvarprepfordisplay', 'credits_user_main.htm', 28, false),array('modifier', 'trim', 'credits_user_main.htm', 37, false),array('modifier', 'pnvarprephtmldisplay', 'credits_user_main.htm', 37, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "credits_user_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div style="text-align:center;"><?php echo smarty_function_pnml(array('name' => '_CREDITSPOSTNUKE','html' => 1), $this);?>
</div>
<div style="text-align:center;">
	<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Credits','type' => 'user','func' => 'display','mod' => 'core','filetype' => 'credits'), $this);?>
">
		<img src="modules/Credits/pnimages/credits.gif" alt="<?php echo smarty_function_pnml(array('name' => '_CREDITSCREDITS'), $this);?>
" />
    	<?php echo smarty_function_pnml(array('name' => '_CREDITSREADPNCR'), $this);?>

	</a>
	<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Credits','type' => 'user','func' => 'display','mod' => 'core','filetype' => 'help'), $this);?>
">
		<img src="modules/Credits/pnimages/help.gif" alt="<?php echo smarty_function_pnml(array('name' => '_CREDITSHELP'), $this);?>
" />
		<?php echo smarty_function_pnml(array('name' => '_CREDITSREADPNHP'), $this);?>

	</a>
	<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Credits','type' => 'user','func' => 'display','mod' => 'core','filetype' => 'license'), $this);?>
">
		<img src="modules/Credits/pnimages/license.gif" alt="<?php echo smarty_function_pnml(array('name' => '_CREDITSLICENSE'), $this);?>
" />
	    <?php echo smarty_function_pnml(array('name' => '_CREDITSREADPNLIC'), $this);?>

	</a>
</div>
<table width="100%" border="3">
  <tr>
      <th><?php echo smarty_function_pnml(array('name' => '_HEADCREDITDISPNAME'), $this);?>
</th>
      <th><?php echo smarty_function_pnml(array('name' => '_HEADCREDITVERSION'), $this);?>
</th>
      <th><?php echo smarty_function_pnml(array('name' => '_HEADCREDITDESC'), $this);?>
</th>
      <th><?php echo smarty_function_pnml(array('name' => '_HEADCREDITAUTHOR'), $this);?>
</th>
      <th><?php echo smarty_function_pnml(array('name' => '_HEADCREDITDOCS'), $this);?>
</th>
  </tr>
  <?php unset($this->_sections['modulesinfo']);
$this->_sections['modulesinfo']['name'] = 'modulesinfo';
$this->_sections['modulesinfo']['loop'] = is_array($_loop=$this->_tpl_vars['modules']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['modulesinfo']['show'] = true;
$this->_sections['modulesinfo']['max'] = $this->_sections['modulesinfo']['loop'];
$this->_sections['modulesinfo']['step'] = 1;
$this->_sections['modulesinfo']['start'] = $this->_sections['modulesinfo']['step'] > 0 ? 0 : $this->_sections['modulesinfo']['loop']-1;
if ($this->_sections['modulesinfo']['show']) {
    $this->_sections['modulesinfo']['total'] = $this->_sections['modulesinfo']['loop'];
    if ($this->_sections['modulesinfo']['total'] == 0)
        $this->_sections['modulesinfo']['show'] = false;
} else
    $this->_sections['modulesinfo']['total'] = 0;
if ($this->_sections['modulesinfo']['show']):

            for ($this->_sections['modulesinfo']['index'] = $this->_sections['modulesinfo']['start'], $this->_sections['modulesinfo']['iteration'] = 1;
                 $this->_sections['modulesinfo']['iteration'] <= $this->_sections['modulesinfo']['total'];
                 $this->_sections['modulesinfo']['index'] += $this->_sections['modulesinfo']['step'], $this->_sections['modulesinfo']['iteration']++):
$this->_sections['modulesinfo']['rownum'] = $this->_sections['modulesinfo']['iteration'];
$this->_sections['modulesinfo']['index_prev'] = $this->_sections['modulesinfo']['index'] - $this->_sections['modulesinfo']['step'];
$this->_sections['modulesinfo']['index_next'] = $this->_sections['modulesinfo']['index'] + $this->_sections['modulesinfo']['step'];
$this->_sections['modulesinfo']['first']      = ($this->_sections['modulesinfo']['iteration'] == 1);
$this->_sections['modulesinfo']['last']       = ($this->_sections['modulesinfo']['iteration'] == $this->_sections['modulesinfo']['total']);
?>
    <tr>
      <td><?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['filename'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")))) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>

	      <?php if ($this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['official'] == 1): ?><img src="modules/Credits/pnimages/official.gif" alt="" /><?php endif; ?>
	  </td>
      <td><?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['version'])) ? $this->_run_mod_handler('default', true, $_tmp, ' ') : smarty_modifier_default($_tmp, ' ')))) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['description'])) ? $this->_run_mod_handler('default', true, $_tmp, ' ') : smarty_modifier_default($_tmp, ' ')))) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</td>
      <td>
		<?php echo '';  unset($this->_sections['contacts']);
$this->_sections['contacts']['name'] = 'contacts';
$this->_sections['contacts']['loop'] = is_array($_loop=$this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['contact']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['contacts']['show'] = true;
$this->_sections['contacts']['max'] = $this->_sections['contacts']['loop'];
$this->_sections['contacts']['step'] = 1;
$this->_sections['contacts']['start'] = $this->_sections['contacts']['step'] > 0 ? 0 : $this->_sections['contacts']['loop']-1;
if ($this->_sections['contacts']['show']) {
    $this->_sections['contacts']['total'] = $this->_sections['contacts']['loop'];
    if ($this->_sections['contacts']['total'] == 0)
        $this->_sections['contacts']['show'] = false;
} else
    $this->_sections['contacts']['total'] = 0;
if ($this->_sections['contacts']['show']):

            for ($this->_sections['contacts']['index'] = $this->_sections['contacts']['start'], $this->_sections['contacts']['iteration'] = 1;
                 $this->_sections['contacts']['iteration'] <= $this->_sections['contacts']['total'];
                 $this->_sections['contacts']['index'] += $this->_sections['contacts']['step'], $this->_sections['contacts']['iteration']++):
$this->_sections['contacts']['rownum'] = $this->_sections['contacts']['iteration'];
$this->_sections['contacts']['index_prev'] = $this->_sections['contacts']['index'] - $this->_sections['contacts']['step'];
$this->_sections['contacts']['index_next'] = $this->_sections['contacts']['index'] + $this->_sections['contacts']['step'];
$this->_sections['contacts']['first']      = ($this->_sections['contacts']['iteration'] == 1);
$this->_sections['contacts']['last']       = ($this->_sections['contacts']['iteration'] == $this->_sections['contacts']['total']);
 echo '';  if ($this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['contact'][$this->_sections['contacts']['index']] != ''):  echo '<a href="';  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['contact'][$this->_sections['contacts']['index']])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)))) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp));  echo '">';  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['author'][$this->_sections['contacts']['index']])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)))) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp));  echo '</a>';  else:  echo '';  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['author'][$this->_sections['contacts']['index']])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)))) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp));  echo '';  endif;  echo '';  if ($this->_sections['contacts']['last'] != true):  echo ', ';  endif;  echo '';  endfor; endif;  echo ''; ?>

	  </td>
	  <td align="left">&nbsp;
          <?php if ($this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['credits'] != ""): ?>
			<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Credits','type' => 'user','func' => 'display','mod' => $this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['filename'],'filetype' => 'credits'), $this);?>
">
				<img src="modules/Credits/pnimages/credits.gif" alt="<?php echo smarty_function_pnml(array('name' => '_CREDITSCREDITS'), $this);?>
" />
			</a>
		  <?php endif; ?>
		  <?php if ($this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['help'] != ""): ?>
    		<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Credits','type' => 'user','func' => 'display','mod' => $this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['filename'],'filetype' => 'help'), $this);?>
">
				<img src="modules/Credits/pnimages/help.gif" alt="<?php echo smarty_function_pnml(array('name' => '_CREDITSHELP'), $this);?>
" />
			</a>
		  <?php endif; ?>
		  <?php if ($this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['license'] != ""): ?>
    		<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Credits','type' => 'user','func' => 'display','mod' => $this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['filename'],'filetype' => 'license'), $this);?>
">
				<img src="modules/Credits/pnimages/license.gif" alt="<?php echo smarty_function_pnml(array('name' => '_CREDITSLICENSE'), $this);?>
" />
			</a>
		  <?php endif; ?>
		  <?php if ($this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['changelog'] != ""): ?>
			<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Credits','type' => 'user','func' => 'display','mod' => $this->_tpl_vars['modules'][$this->_sections['modulesinfo']['index']]['filename'],'filetype' => 'changelog'), $this);?>
">
				<img src="modules/Credits/pnimages/credits.gif" alt="<?php echo smarty_function_pnml(array('name' => '_CREDITSCHANGELOG'), $this);?>
" />
			</a>
		  <?php endif; ?>
	  </td>
    </tr>
  <?php endfor; endif; ?>
</table>