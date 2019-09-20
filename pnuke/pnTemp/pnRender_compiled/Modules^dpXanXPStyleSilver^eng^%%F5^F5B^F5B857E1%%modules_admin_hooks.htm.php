<?php /* Smarty version 2.6.14, created on 2007-10-09 06:17:19
         compiled from modules_admin_hooks.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'modules_admin_hooks.htm', 3, false),array('function', 'pnmodurl', 'modules_admin_hooks.htm', 5, false),array('function', 'pnsecgenauthkey', 'modules_admin_hooks.htm', 7, false),array('modifier', 'pnvarprepfordisplay', 'modules_admin_hooks.htm', 3, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "modules_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_MODULESENABLEHOOKS'), $this);?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['displayname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</h2>
<?php if ($this->_tpl_vars['hooks']): ?>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Modules','type' => 'admin','func' => 'updatehooks'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
    <input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Modules'), $this);?>
" />
    <input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
    <?php unset($this->_sections['hook']);
$this->_sections['hook']['name'] = 'hook';
$this->_sections['hook']['loop'] = is_array($_loop=$this->_tpl_vars['hooks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hook']['show'] = true;
$this->_sections['hook']['max'] = $this->_sections['hook']['loop'];
$this->_sections['hook']['step'] = 1;
$this->_sections['hook']['start'] = $this->_sections['hook']['step'] > 0 ? 0 : $this->_sections['hook']['loop']-1;
if ($this->_sections['hook']['show']) {
    $this->_sections['hook']['total'] = $this->_sections['hook']['loop'];
    if ($this->_sections['hook']['total'] == 0)
        $this->_sections['hook']['show'] = false;
} else
    $this->_sections['hook']['total'] = 0;
if ($this->_sections['hook']['show']):

            for ($this->_sections['hook']['index'] = $this->_sections['hook']['start'], $this->_sections['hook']['iteration'] = 1;
                 $this->_sections['hook']['iteration'] <= $this->_sections['hook']['total'];
                 $this->_sections['hook']['index'] += $this->_sections['hook']['step'], $this->_sections['hook']['iteration']++):
$this->_sections['hook']['rownum'] = $this->_sections['hook']['iteration'];
$this->_sections['hook']['index_prev'] = $this->_sections['hook']['index'] - $this->_sections['hook']['step'];
$this->_sections['hook']['index_next'] = $this->_sections['hook']['index'] + $this->_sections['hook']['step'];
$this->_sections['hook']['first']      = ($this->_sections['hook']['iteration'] == 1);
$this->_sections['hook']['last']       = ($this->_sections['hook']['iteration'] == $this->_sections['hook']['total']);
?>
        <div class="pn-adminformrow">
			<label for="modules_<?php echo ((is_array($_tmp=$this->_tpl_vars['hooks'][$this->_sections['hook']['index']]['targetmodname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['hooks'][$this->_sections['hook']['index']]['hooklabel'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</label>
		  	<?php if ($this->_tpl_vars['hooks'][$this->_sections['hook']['index']]['hookvalue'] == 1): ?>
		    	<input id="modules_<?php echo ((is_array($_tmp=$this->_tpl_vars['hooks'][$this->_sections['hook']['index']]['targetmodname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" name="hooks_<?php echo ((is_array($_tmp=$this->_tpl_vars['hooks'][$this->_sections['hook']['index']]['targetmodname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" type="checkbox" checked="checked" value="ON" />
		  	<?php else: ?>
		    	<input id="modules_<?php echo ((is_array($_tmp=$this->_tpl_vars['hooks'][$this->_sections['hook']['index']]['targetmodname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" name="hooks_<?php echo ((is_array($_tmp=$this->_tpl_vars['hooks'][$this->_sections['hook']['index']]['targetmodname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" type="checkbox" value="ON" />
		  	<?php endif; ?>
		</div>
    <?php endfor; endif; ?>
	<div class="pn-adminformrow"><input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_COMMIT'), $this);?>
" /></div>
	<div style="clear:both"></div>
</div>
</form>
<?php else: ?>
<p><?php echo smarty_function_pnml(array('name' => '_MODULESNOHOOKS'), $this);?>
</p>
<?php endif; ?>