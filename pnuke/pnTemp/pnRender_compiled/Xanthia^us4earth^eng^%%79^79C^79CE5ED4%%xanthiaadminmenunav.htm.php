<?php /* Smarty version 2.6.14, created on 2007-09-20 16:49:31
         compiled from xanthiaadminmenunav.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pngetstatusmsg', 'xanthiaadminmenunav.htm', 3, false),array('function', 'pnthemegetvar', 'xanthiaadminmenunav.htm', 5, false),array('function', 'pnml', 'xanthiaadminmenunav.htm', 7, false),array('function', 'pnmodurl', 'xanthiaadminmenunav.htm', 11, false),array('modifier', 'pnvarprepfordisplay', 'xanthiaadminmenunav.htm', 7, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "xanthiaadminmenu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  echo smarty_function_pngetstatusmsg(array(), $this);?>

<br />
<div class="container" style="border-color:<?php echo smarty_function_pnthemegetvar(array('name' => 'sepcolor'), $this);?>
">
<div  class="pn-pagetitle" style="width:99%; background-color:<?php echo smarty_function_pnthemegetvar(array('name' => 'bgcolor2'), $this);?>
; text-align:center; padding:4px;">
<?php echo smarty_function_pnml(array('name' => '_XA_THEMECONFIG'), $this);?>
  - <?php echo ((is_array($_tmp=$this->_tpl_vars['skin'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>

</div>

<br />
 |<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'Xanthia','type' => 'admin','func' => 'generatethemecache','authid' => $this->_tpl_vars['authid'],'skin' => $this->_tpl_vars['skin']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_XA_CACHETHEMESETTINGS'), $this);?>
</a>|

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
<a class="active" href="<?php echo $this->_tpl_vars['menuoptions'][$this->_sections['menuoption']['index']]['url']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['menuoptions'][$this->_sections['menuoption']['index']]['title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</a>
<?php else: ?>
<a href="<?php echo $this->_tpl_vars['menuoptions'][$this->_sections['menuoption']['index']]['url']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['menuoptions'][$this->_sections['menuoption']['index']]['title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</a>
<?php endif; ?>
</li>
<?php endfor; endif; ?>
</ul>
</div>