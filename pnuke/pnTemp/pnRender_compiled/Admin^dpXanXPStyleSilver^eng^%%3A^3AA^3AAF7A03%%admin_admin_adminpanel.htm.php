<?php /* Smarty version 2.6.14, created on 2007-09-28 15:40:53
         compiled from admin_admin_adminpanel.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnthemegetvar', 'admin_admin_adminpanel.htm', 3, false),array('function', 'math', 'admin_admin_adminpanel.htm', 7, false),array('function', 'pnimg', 'admin_admin_adminpanel.htm', 10, false),array('function', 'automatednews', 'admin_admin_adminpanel.htm', 20, false),array('function', 'articles', 'admin_admin_adminpanel.htm', 21, false),array('function', 'currentpoll', 'admin_admin_adminpanel.htm', 22, false),array('modifier', 'pnvarprepfordisplay', 'admin_admin_adminpanel.htm', 4, false),)), $this); ?>
<?php echo $this->_tpl_vars['menu']; ?>

<div class="container" style="border-color:<?php echo smarty_function_pnthemegetvar(array('name' => 'sepcolor'), $this);?>
;padding:5px;">
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['category']['catname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</h2>
<div style="text-align:center;margin-bottom:10px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['category']['description'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</div><div style="width:100%">
<?php unset($this->_sections['adminlinks']);
$this->_sections['adminlinks']['name'] = 'adminlinks';
$this->_sections['adminlinks']['loop'] = is_array($_loop=$this->_tpl_vars['adminlinks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['adminlinks']['show'] = true;
$this->_sections['adminlinks']['max'] = $this->_sections['adminlinks']['loop'];
$this->_sections['adminlinks']['step'] = 1;
$this->_sections['adminlinks']['start'] = $this->_sections['adminlinks']['step'] > 0 ? 0 : $this->_sections['adminlinks']['loop']-1;
if ($this->_sections['adminlinks']['show']) {
    $this->_sections['adminlinks']['total'] = $this->_sections['adminlinks']['loop'];
    if ($this->_sections['adminlinks']['total'] == 0)
        $this->_sections['adminlinks']['show'] = false;
} else
    $this->_sections['adminlinks']['total'] = 0;
if ($this->_sections['adminlinks']['show']):

            for ($this->_sections['adminlinks']['index'] = $this->_sections['adminlinks']['start'], $this->_sections['adminlinks']['iteration'] = 1;
                 $this->_sections['adminlinks']['iteration'] <= $this->_sections['adminlinks']['total'];
                 $this->_sections['adminlinks']['index'] += $this->_sections['adminlinks']['step'], $this->_sections['adminlinks']['iteration']++):
$this->_sections['adminlinks']['rownum'] = $this->_sections['adminlinks']['iteration'];
$this->_sections['adminlinks']['index_prev'] = $this->_sections['adminlinks']['index'] - $this->_sections['adminlinks']['step'];
$this->_sections['adminlinks']['index_next'] = $this->_sections['adminlinks']['index'] + $this->_sections['adminlinks']['step'];
$this->_sections['adminlinks']['first']      = ($this->_sections['adminlinks']['iteration'] == 1);
$this->_sections['adminlinks']['last']       = ($this->_sections['adminlinks']['iteration'] == $this->_sections['adminlinks']['total']);
?>  
  <div style="float:left; width:<?php echo smarty_function_math(array('equation' => "100/x",'x' => $this->_tpl_vars['modulesperrow'],'format' => "%.0f"), $this);?>
%;">
	<div style="text-align:center;padding:1px;">
	<?php if ($this->_tpl_vars['admingraphic'] == 1): ?>
	   <a title="<?php echo $this->_tpl_vars['adminlinks'][$this->_sections['adminlinks']['index']]['menutexttitle']; ?>
" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminlinks'][$this->_sections['adminlinks']['index']]['menutexturl'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo smarty_function_pnimg(array('src' => "admin.gif",'width' => 60,'height' => 60,'modname' => $this->_tpl_vars['adminlinks'][$this->_sections['adminlinks']['index']]['modname'],'title' => $this->_tpl_vars['adminlinks'][$this->_sections['adminlinks']['index']]['menutexttitle'],'alt' => $this->_tpl_vars['adminlinks'][$this->_sections['adminlinks']['index']]['menutext'],'default' => $this->_tpl_vars['defaultimage']), $this);?>
</a>
	   <br />
	<?php endif; ?>
	<a title="<?php echo $this->_tpl_vars['adminlinks'][$this->_sections['adminlinks']['index']]['menutexttitle']; ?>
" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminlinks'][$this->_sections['adminlinks']['index']]['menutexturl'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['adminlinks'][$this->_sections['adminlinks']['index']]['menutext'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</a>
	</div>
  </div>
<?php endfor; endif; ?>
<div style="clear:both;"></div>
</div>
</div>
<?php echo smarty_function_automatednews(array(), $this);?>

<?php echo smarty_function_articles(array(), $this);?>

<?php echo smarty_function_currentpoll(array(), $this);?>
