<?php /* Smarty version 2.6.14, created on 2007-09-28 15:40:52
         compiled from admin_admin_categorymenu.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pngetstatusmsg', 'admin_admin_categorymenu.htm', 2, false),array('function', 'pnthemegetvar', 'admin_admin_categorymenu.htm', 3, false),array('function', 'pnml', 'admin_admin_categorymenu.htm', 4, false),array('function', 'adminonlinemanual', 'admin_admin_categorymenu.htm', 32, false),array('modifier', 'pnvarprepfordisplay', 'admin_admin_categorymenu.htm', 25, false),)), $this); ?>
<?php echo smarty_function_pngetstatusmsg(array(), $this);?>

<div class="container" style="border-color:<?php echo smarty_function_pnthemegetvar(array('name' => 'sepcolor'), $this);?>
">
<h1><?php echo smarty_function_pnml(array('name' => '_ADMIN'), $this);?>
 (<?php echo smarty_function_pnml(array('name' => '_PN_VERSION_NUM'), $this);?>
)</h1>
<?php if (! $this->_tpl_vars['magic_quotes']): ?>
<strong><?php echo smarty_function_pnml(array('name' => '_ADMIN_MAGIC_QUOTES','html' => 1), $this);?>
</strong><br />
<?php endif;  if ($this->_tpl_vars['register_globals']): ?>
<strong><?php echo smarty_function_pnml(array('name' => '_ADMIN_REGISTER_GLOBALS','html' => 1), $this);?>
</strong><br />
<?php endif;  if ($this->_tpl_vars['config_php']): ?>
<strong><?php echo smarty_function_pnml(array('name' => '_ADMIN_CONFIG_PHP','html' => 1), $this);?>
</strong><br />
<?php endif;  if ($this->_tpl_vars['config_old_php']): ?>
<strong><?php echo smarty_function_pnml(array('name' => '_ADMIN_CONFIG_OLD_PHP','html' => 1), $this);?>
</strong><br />
<?php endif;  if (! $this->_tpl_vars['pntemp_htaccess']): ?>
<strong><?php echo smarty_function_pnml(array('name' => '_ADMIN_PNTEMP_HTACCESS','html' => 1), $this);?>
</strong><br />
<?php endif; ?>
<br />
<ul id="minitabs">
<?php unset($this->_sections['menuoption']);
$this->_sections['menuoption']['name'] = 'menuoption';
$this->_sections['menuoption']['loop'] = is_array($_loop=$this->_tpl_vars['menuoptions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['menuoption']['show'] = true;
$this->_sections['menuoption']['max'] = $this->_sections['menuoption']['loop'];
$this->_sections['menuoption']['step'] = 1;
$this->_sections['menuoption']['start'] = $this->_sections['menuoption']['step'] > 0 ? 0 : $this->_sections['menuoption']['loop']-1;
if ($this->_sections['menuoption']['show']) {
    $this->_sections['menuoption']['total'] = $this->_sections['menuoption']['loop'];
    if ($this->_sections['menuoption']['total'] == 0)
        $this->_sections['menuoption']['show'] = false;
} else
    $this->_sections['menuoption']['total'] = 0;
if ($this->_sections['menuoption']['show']):

            for ($this->_sections['menuoption']['index'] = $this->_sections['menuoption']['start'], $this->_sections['menuoption']['iteration'] = 1;
                 $this->_sections['menuoption']['iteration'] <= $this->_sections['menuoption']['total'];
                 $this->_sections['menuoption']['index'] += $this->_sections['menuoption']['step'], $this->_sections['menuoption']['iteration']++):
$this->_sections['menuoption']['rownum'] = $this->_sections['menuoption']['iteration'];
$this->_sections['menuoption']['index_prev'] = $this->_sections['menuoption']['index'] - $this->_sections['menuoption']['step'];
$this->_sections['menuoption']['index_next'] = $this->_sections['menuoption']['index'] + $this->_sections['menuoption']['step'];
$this->_sections['menuoption']['first']      = ($this->_sections['menuoption']['iteration'] == 1);
$this->_sections['menuoption']['last']       = ($this->_sections['menuoption']['iteration'] == $this->_sections['menuoption']['total']);
?>
<li>
<?php if ($this->_tpl_vars['currentcat'] == $this->_tpl_vars['menuoptions'][$this->_sections['menuoption']['index']]['cid']): ?>
<a class="active" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['menuoptions'][$this->_sections['menuoption']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['menuoptions'][$this->_sections['menuoption']['index']]['description'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['menuoptions'][$this->_sections['menuoption']['index']]['title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</a>
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['menuoptions'][$this->_sections['menuoption']['index']]['url'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['menuoptions'][$this->_sections['menuoption']['index']]['description'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['menuoptions'][$this->_sections['menuoption']['index']]['title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</a>
<?php endif; ?>
</li>
<?php endfor; endif; ?>
</ul>
<?php echo smarty_function_adminonlinemanual(array(), $this);?>

</div>