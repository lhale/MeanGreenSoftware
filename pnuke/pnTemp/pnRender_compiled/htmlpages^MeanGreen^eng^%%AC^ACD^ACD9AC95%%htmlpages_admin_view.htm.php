<?php /* Smarty version 2.6.14, created on 2008-11-10 05:42:48
         compiled from htmlpages_admin_view.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'htmlpages_admin_view.htm', 6, false),array('function', 'pnmodurl', 'htmlpages_admin_view.htm', 7, false),array('function', 'pagerabc', 'htmlpages_admin_view.htm', 7, false),array('function', 'pnimg', 'htmlpages_admin_view.htm', 23, false),array('function', 'cycle', 'htmlpages_admin_view.htm', 30, false),array('function', 'pnusergetvar', 'htmlpages_admin_view.htm', 33, false),array('function', 'pager', 'htmlpages_admin_view.htm', 53, false),array('modifier', 'pnvarprephtmldisplay', 'htmlpages_admin_view.htm', 32, false),array('modifier', 'pnvarprepfordisplay', 'htmlpages_admin_view.htm', 44, false),)), $this); ?>
<?php if ($this->_tpl_vars['type'] == 'admin'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "htmlpages_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="pn-admincontainer">
<?php endif; ?>
<h2><?php echo smarty_function_pnml(array('name' => '_VIEWPAGES'), $this);?>
 - <?php echo smarty_function_pnml(array('name' => '_SORTEDBY'), $this);?>
 <?php echo $this->_tpl_vars['sortedby']; ?>
</h2>
<div>&nbsp;<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','type' => $this->_tpl_vars['type'],'func' => 'view'), $this);?>
">*</a>&nbsp;|&nbsp;<?php echo smarty_function_pagerabc(array('posvar' => 'letter','separator' => "&nbsp;|&nbsp;",'names' => "A;B;C;D;E;F;G;H;I;J;K;L;M;N;O;P;Q;R;S;T;U;V;W;X;Y;Z",'forwardvars' => "module,type,func,order,orderby"), $this);?>
</div>
<table class="pn-admintable">
  <thead>
  <tr>
      <?php if ($this->_tpl_vars['type'] == 'admin'): ?>
      <th><a href="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','type' => 'admin','func' => 'view','orderby' => 'pid','order' => $this->_tpl_vars['order']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESPID'), $this);?>
</a></th>
      <th><a href="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','type' => 'admin','func' => 'view','orderby' => 'uid','order' => $this->_tpl_vars['order']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESUSER'), $this);?>
</a></th>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['type'] == 'admin'): ?>
      <th><a href="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','type' => 'admin','func' => 'view','orderby' => 'title','order' => $this->_tpl_vars['order']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESTITLE'), $this);?>
</a></th>
      <th><a href="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','type' => 'admin','func' => 'view','orderby' => 'timest','order' => $this->_tpl_vars['order']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESTIME'), $this);?>
</a></th>
      <?php else: ?>
      <th><a href="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','func' => 'view','orderby' => 'title','order' => $this->_tpl_vars['order']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESTITLE'), $this);?>
</a></th>
      <th><a href="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','func' => 'view','orderby' => 'timest','order' => $this->_tpl_vars['order']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESTIME'), $this);?>
</a></th>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['type'] == 'admin'): ?>
      <th><a href="<?php echo smarty_function_pnmodurl(array('modname' => 'htmlpages','type' => 'admin','func' => 'view','orderby' => 'printlink','order' => $this->_tpl_vars['order']), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_ADD'), $this);?>
 <?php echo smarty_function_pnimg(array('src' => "print.gif",'alt' => '_PRFRVIEW'), $this);?>
 <?php echo smarty_function_pnml(array('name' => '_LINK'), $this);?>
</a></th>
      <?php endif; ?>
      <th><?php echo smarty_function_pnml(array('name' => '_HTMLPAGESACTIONS'), $this);?>
</th>
  </tr>
  </thead>
  <tbody>
  <?php unset($this->_sections['pages']);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['loop'] = is_array($_loop=$this->_tpl_vars['pages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pages']['show'] = true;
$this->_sections['pages']['max'] = $this->_sections['pages']['loop'];
$this->_sections['pages']['step'] = 1;
$this->_sections['pages']['start'] = $this->_sections['pages']['step'] > 0 ? 0 : $this->_sections['pages']['loop']-1;
if ($this->_sections['pages']['show']) {
    $this->_sections['pages']['total'] = $this->_sections['pages']['loop'];
    if ($this->_sections['pages']['total'] == 0)
        $this->_sections['pages']['show'] = false;
} else
    $this->_sections['pages']['total'] = 0;
if ($this->_sections['pages']['show']):

            for ($this->_sections['pages']['index'] = $this->_sections['pages']['start'], $this->_sections['pages']['iteration'] = 1;
                 $this->_sections['pages']['iteration'] <= $this->_sections['pages']['total'];
                 $this->_sections['pages']['index'] += $this->_sections['pages']['step'], $this->_sections['pages']['iteration']++):
$this->_sections['pages']['rownum'] = $this->_sections['pages']['iteration'];
$this->_sections['pages']['index_prev'] = $this->_sections['pages']['index'] - $this->_sections['pages']['step'];
$this->_sections['pages']['index_next'] = $this->_sections['pages']['index'] + $this->_sections['pages']['step'];
$this->_sections['pages']['first']      = ($this->_sections['pages']['iteration'] == 1);
$this->_sections['pages']['last']       = ($this->_sections['pages']['iteration'] == $this->_sections['pages']['total']);
?>
    <tr class="<?php echo smarty_function_cycle(array('values' => "pn-odd,pn-even"), $this);?>
">
      <?php if ($this->_tpl_vars['type'] == 'admin'): ?>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['pages'][$this->_sections['pages']['index']]['pid'])) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)); ?>
</td>
      <td><?php echo smarty_function_pnusergetvar(array('name' => 'uname','uid' => $this->_tpl_vars['pages'][$this->_sections['pages']['index']]['uid']), $this);?>
</td>
      <?php endif; ?>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['pages'][$this->_sections['pages']['index']]['title'])) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['pages'][$this->_sections['pages']['index']]['timest'])) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)); ?>
</td>
      <?php if ($this->_tpl_vars['type'] == 'admin'): ?>
      <td><?php if ($this->_tpl_vars['pages'][$this->_sections['pages']['index']]['printlink']):  echo smarty_function_pnml(array('name' => '_YES'), $this); else:  echo smarty_function_pnml(array('name' => '_NO'), $this); endif; ?></td>
      <?php endif; ?>
	  <td>
	    <?php $this->assign('options', $this->_tpl_vars['pages'][$this->_sections['pages']['index']]['options']); ?>
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
  </tbody>
</table>
<?php echo smarty_function_pager(array('show' => 'page','rowcount' => $this->_tpl_vars['pager']['numitems'],'limit' => $this->_tpl_vars['pager']['itemsperpage'],'posvar' => 'startnum','shift' => 1), $this);?>

<?php if ($this->_tpl_vars['type'] == 'admin'): ?>
</div>
<?php endif; ?>