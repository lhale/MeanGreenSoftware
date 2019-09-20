<?php /* Smarty version 2.6.14, created on 2007-10-23 09:27:51
         compiled from example_admin_view.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'example_admin_view.htm', 3, false),array('function', 'cycle', 'example_admin_view.htm', 11, false),array('function', 'pager', 'example_admin_view.htm', 26, false),array('modifier', 'pnvarprephtmldisplay', 'example_admin_view.htm', 12, false),array('modifier', 'pnvarprepfordisplay', 'example_admin_view.htm', 18, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "example_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_EXAMPLEADMINVIEW'), $this);?>
</h2>
<table class="pn-admintable">
  <tr>
      <th><?php echo smarty_function_pnml(array('name' => '_EXAMPLENAME'), $this);?>
</th>
      <th><?php echo smarty_function_pnml(array('name' => '_EXAMPLENUMBER'), $this);?>
</th>
      <th><?php echo smarty_function_pnml(array('name' => '_OPTIONS'), $this);?>
</th>
  </tr>
  <?php unset($this->_sections['exampleitems']);
$this->_sections['exampleitems']['name'] = 'exampleitems';
$this->_sections['exampleitems']['loop'] = is_array($_loop=$this->_tpl_vars['exampleitems']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['exampleitems']['show'] = true;
$this->_sections['exampleitems']['max'] = $this->_sections['exampleitems']['loop'];
$this->_sections['exampleitems']['step'] = 1;
$this->_sections['exampleitems']['start'] = $this->_sections['exampleitems']['step'] > 0 ? 0 : $this->_sections['exampleitems']['loop']-1;
if ($this->_sections['exampleitems']['show']) {
    $this->_sections['exampleitems']['total'] = $this->_sections['exampleitems']['loop'];
    if ($this->_sections['exampleitems']['total'] == 0)
        $this->_sections['exampleitems']['show'] = false;
} else
    $this->_sections['exampleitems']['total'] = 0;
if ($this->_sections['exampleitems']['show']):

            for ($this->_sections['exampleitems']['index'] = $this->_sections['exampleitems']['start'], $this->_sections['exampleitems']['iteration'] = 1;
                 $this->_sections['exampleitems']['iteration'] <= $this->_sections['exampleitems']['total'];
                 $this->_sections['exampleitems']['index'] += $this->_sections['exampleitems']['step'], $this->_sections['exampleitems']['iteration']++):
$this->_sections['exampleitems']['rownum'] = $this->_sections['exampleitems']['iteration'];
$this->_sections['exampleitems']['index_prev'] = $this->_sections['exampleitems']['index'] - $this->_sections['exampleitems']['step'];
$this->_sections['exampleitems']['index_next'] = $this->_sections['exampleitems']['index'] + $this->_sections['exampleitems']['step'];
$this->_sections['exampleitems']['first']      = ($this->_sections['exampleitems']['iteration'] == 1);
$this->_sections['exampleitems']['last']       = ($this->_sections['exampleitems']['iteration'] == $this->_sections['exampleitems']['total']);
?>  
    <tr class="<?php echo smarty_function_cycle(array('values' => "pn-odd,pn-even"), $this);?>
">
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['exampleitems'][$this->_sections['exampleitems']['index']]['itemname'])) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['exampleitems'][$this->_sections['exampleitems']['index']]['number'])) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)); ?>
</td>
	  <td>
	    <?php $this->assign('options', $this->_tpl_vars['exampleitems'][$this->_sections['exampleitems']['index']]['options']); ?>
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
<?php echo smarty_function_pager(array('show' => 'page','rowcount' => $this->_tpl_vars['pager']['numitems'],'limit' => $this->_tpl_vars['pager']['itemsperpage'],'posvar' => 'startnum','shift' => 1), $this);?>