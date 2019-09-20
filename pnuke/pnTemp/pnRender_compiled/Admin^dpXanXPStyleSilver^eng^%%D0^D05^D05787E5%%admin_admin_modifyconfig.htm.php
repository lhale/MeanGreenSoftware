<?php /* Smarty version 2.6.14, created on 2007-12-03 10:20:55
         compiled from admin_admin_modifyconfig.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'admin_admin_modifyconfig.htm', 3, false),array('function', 'pnmodurl', 'admin_admin_modifyconfig.htm', 4, false),array('function', 'pnsecgenauthkey', 'admin_admin_modifyconfig.htm', 6, false),array('function', 'modstyleslist', 'admin_admin_modifyconfig.htm', 26, false),array('function', 'pnmodcallhooks', 'admin_admin_modifyconfig.htm', 74, false),array('modifier', 'pnvarprepfordisplay', 'admin_admin_modifyconfig.htm', 30, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_MODIFYCONFIG'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Admin','type' => 'admin','func' => 'updateconfig'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Admin'), $this);?>
" />
    <div class="pn-adminformrow">
	  <label for="admin_graphic"><?php echo smarty_function_pnml(array('name' => '_ADMINDISPLAYICONS'), $this);?>
</label>
	  <?php if ($this->_tpl_vars['admingraphic'] == 1): ?>
        <input id="admin_graphic" name="admingraphic" type="checkbox" value="1" checked="checked" />
	  <?php else: ?>
        <input id="admin_graphic" name="admingraphic" type="checkbox" value="1" />
	  <?php endif; ?>
    </div>
    <div class="pn-adminformrow">
	  <label for="admin_ignoreinstallercheck"><?php echo smarty_function_pnml(array('name' => '_ADMINIGNOREINSTALLERCHECK'), $this);?>
</label>
	  <?php if ($this->_tpl_vars['ignoreinstallercheck'] == 1): ?>
        <input id="admin_ignoreinstallercheck" name="ignoreinstallercheck" type="checkbox" value="1" checked="checked" />
	  <?php else: ?>
        <input id="admin_ignoreinstallercheck" name="ignoreinstallercheck" type="checkbox" value="1" />
	  <?php endif; ?>
	  <div class="pn-statusmsg"><?php echo smarty_function_pnml(array('name' => '_ADMINIGNOREINSTALLERCHECKWARNING'), $this);?>
</div>
    </div>
   	<div class="pn-adminformrow">
      <label for="admin_skin"><?php echo smarty_function_pnml(array('name' => '_ADMINSKIN'), $this);?>
</label>
      <?php echo smarty_function_modstyleslist(array('name' => 'modulestylesheet','modname' => 'Admin','selected' => $this->_tpl_vars['modulestylesheet']), $this);?>

    </div>
    <div class="pn-adminformrow">
      <label for="admin_modulesperrow"><?php echo smarty_function_pnml(array('name' => '_ADMINMODULESPERROW'), $this);?>
</label>
      <input id="admin_modulesperrow" name="modulesperrow" type="text" size="3" maxlength="3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['modulesperrow'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
    </div>
    <div class="pn-adminformrow">
      <label for="admin_itemsperpage"><?php echo smarty_function_pnml(array('name' => '_ADMINITEMSPERPAGE'), $this);?>
</label>
      <input id="admin_itemsperpage" name="itemsperpage" type="text" size="3" maxlength="3" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['itemsperpage'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
    </div>
    <div class="pn-adminformrow">
      <label for="admin_startcategory"><?php echo smarty_function_pnml(array('name' => '_ADMINSTARTCATEGORY'), $this);?>
</label>
	    <select id="admin_startcategory" name="startcategory">
          <?php unset($this->_sections['categories']);
$this->_sections['categories']['name'] = 'categories';
$this->_sections['categories']['loop'] = is_array($_loop=$this->_tpl_vars['categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['categories']['show'] = true;
$this->_sections['categories']['max'] = $this->_sections['categories']['loop'];
$this->_sections['categories']['step'] = 1;
$this->_sections['categories']['start'] = $this->_sections['categories']['step'] > 0 ? 0 : $this->_sections['categories']['loop']-1;
if ($this->_sections['categories']['show']) {
    $this->_sections['categories']['total'] = $this->_sections['categories']['loop'];
    if ($this->_sections['categories']['total'] == 0)
        $this->_sections['categories']['show'] = false;
} else
    $this->_sections['categories']['total'] = 0;
if ($this->_sections['categories']['show']):

            for ($this->_sections['categories']['index'] = $this->_sections['categories']['start'], $this->_sections['categories']['iteration'] = 1;
                 $this->_sections['categories']['iteration'] <= $this->_sections['categories']['total'];
                 $this->_sections['categories']['index'] += $this->_sections['categories']['step'], $this->_sections['categories']['iteration']++):
$this->_sections['categories']['rownum'] = $this->_sections['categories']['iteration'];
$this->_sections['categories']['index_prev'] = $this->_sections['categories']['index'] - $this->_sections['categories']['step'];
$this->_sections['categories']['index_next'] = $this->_sections['categories']['index'] + $this->_sections['categories']['step'];
$this->_sections['categories']['first']      = ($this->_sections['categories']['iteration'] == 1);
$this->_sections['categories']['last']       = ($this->_sections['categories']['iteration'] == $this->_sections['categories']['total']);
?>  
		    <?php if ($this->_tpl_vars['startcategory'] == $this->_tpl_vars['categories'][$this->_sections['categories']['index']]['cid']): ?>
    		  <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['categories'][$this->_sections['categories']['index']]['cid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" selected="selected"><?php echo ((is_array($_tmp=$this->_tpl_vars['categories'][$this->_sections['categories']['index']]['catname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</option>
			<?php else: ?>
    		  <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['categories'][$this->_sections['categories']['index']]['cid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['categories'][$this->_sections['categories']['index']]['catname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</option>
			<?php endif; ?>
		  <?php endfor; endif; ?>
	    </select>
    </div>
    <div class="pn-adminformrow">
      <label for="admin_defaultcategory"><?php echo smarty_function_pnml(array('name' => '_ADMINDEFAULTCATEGORY'), $this);?>
</label>
	    <select id="admin_defaultcategory" name="defaultcategory">
          <?php unset($this->_sections['categories']);
$this->_sections['categories']['name'] = 'categories';
$this->_sections['categories']['loop'] = is_array($_loop=$this->_tpl_vars['categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['categories']['show'] = true;
$this->_sections['categories']['max'] = $this->_sections['categories']['loop'];
$this->_sections['categories']['step'] = 1;
$this->_sections['categories']['start'] = $this->_sections['categories']['step'] > 0 ? 0 : $this->_sections['categories']['loop']-1;
if ($this->_sections['categories']['show']) {
    $this->_sections['categories']['total'] = $this->_sections['categories']['loop'];
    if ($this->_sections['categories']['total'] == 0)
        $this->_sections['categories']['show'] = false;
} else
    $this->_sections['categories']['total'] = 0;
if ($this->_sections['categories']['show']):

            for ($this->_sections['categories']['index'] = $this->_sections['categories']['start'], $this->_sections['categories']['iteration'] = 1;
                 $this->_sections['categories']['iteration'] <= $this->_sections['categories']['total'];
                 $this->_sections['categories']['index'] += $this->_sections['categories']['step'], $this->_sections['categories']['iteration']++):
$this->_sections['categories']['rownum'] = $this->_sections['categories']['iteration'];
$this->_sections['categories']['index_prev'] = $this->_sections['categories']['index'] - $this->_sections['categories']['step'];
$this->_sections['categories']['index_next'] = $this->_sections['categories']['index'] + $this->_sections['categories']['step'];
$this->_sections['categories']['first']      = ($this->_sections['categories']['iteration'] == 1);
$this->_sections['categories']['last']       = ($this->_sections['categories']['iteration'] == $this->_sections['categories']['total']);
?>  
		    <?php if ($this->_tpl_vars['defaultcategory'] == $this->_tpl_vars['categories'][$this->_sections['categories']['index']]['cid']): ?>
    		  <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['categories'][$this->_sections['categories']['index']]['cid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" selected="selected"><?php echo ((is_array($_tmp=$this->_tpl_vars['categories'][$this->_sections['categories']['index']]['catname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</option>
			<?php else: ?>
    		  <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['categories'][$this->_sections['categories']['index']]['cid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['categories'][$this->_sections['categories']['index']]['catname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</option>
			<?php endif; ?>
		  <?php endfor; endif; ?>
	    </select>
    </div>
    <?php unset($this->_sections['modulecategories']);
$this->_sections['modulecategories']['name'] = 'modulecategories';
$this->_sections['modulecategories']['loop'] = is_array($_loop=$this->_tpl_vars['modulecategories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['modulecategories']['show'] = true;
$this->_sections['modulecategories']['max'] = $this->_sections['modulecategories']['loop'];
$this->_sections['modulecategories']['step'] = 1;
$this->_sections['modulecategories']['start'] = $this->_sections['modulecategories']['step'] > 0 ? 0 : $this->_sections['modulecategories']['loop']-1;
if ($this->_sections['modulecategories']['show']) {
    $this->_sections['modulecategories']['total'] = $this->_sections['modulecategories']['loop'];
    if ($this->_sections['modulecategories']['total'] == 0)
        $this->_sections['modulecategories']['show'] = false;
} else
    $this->_sections['modulecategories']['total'] = 0;
if ($this->_sections['modulecategories']['show']):

            for ($this->_sections['modulecategories']['index'] = $this->_sections['modulecategories']['start'], $this->_sections['modulecategories']['iteration'] = 1;
                 $this->_sections['modulecategories']['iteration'] <= $this->_sections['modulecategories']['total'];
                 $this->_sections['modulecategories']['index'] += $this->_sections['modulecategories']['step'], $this->_sections['modulecategories']['iteration']++):
$this->_sections['modulecategories']['rownum'] = $this->_sections['modulecategories']['iteration'];
$this->_sections['modulecategories']['index_prev'] = $this->_sections['modulecategories']['index'] - $this->_sections['modulecategories']['step'];
$this->_sections['modulecategories']['index_next'] = $this->_sections['modulecategories']['index'] + $this->_sections['modulecategories']['step'];
$this->_sections['modulecategories']['first']      = ($this->_sections['modulecategories']['iteration'] == 1);
$this->_sections['modulecategories']['last']       = ($this->_sections['modulecategories']['iteration'] == $this->_sections['modulecategories']['total']);
?>  
      <div class="pn-adminformrow">
        <label for="admin_<?php echo $this->_tpl_vars['modulecategories'][$this->_sections['modulecategories']['index']]['name']; ?>
"><?php echo $this->_tpl_vars['modulecategories'][$this->_sections['modulecategories']['index']]['name']; ?>
</label>
		  <select id="admin_<?php echo $this->_tpl_vars['modulecategories'][$this->_sections['modulecategories']['index']]['name']; ?>
" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['modulecategories'][$this->_sections['modulecategories']['index']]['name'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
">
            <?php unset($this->_sections['categories']);
$this->_sections['categories']['name'] = 'categories';
$this->_sections['categories']['loop'] = is_array($_loop=$this->_tpl_vars['categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['categories']['show'] = true;
$this->_sections['categories']['max'] = $this->_sections['categories']['loop'];
$this->_sections['categories']['step'] = 1;
$this->_sections['categories']['start'] = $this->_sections['categories']['step'] > 0 ? 0 : $this->_sections['categories']['loop']-1;
if ($this->_sections['categories']['show']) {
    $this->_sections['categories']['total'] = $this->_sections['categories']['loop'];
    if ($this->_sections['categories']['total'] == 0)
        $this->_sections['categories']['show'] = false;
} else
    $this->_sections['categories']['total'] = 0;
if ($this->_sections['categories']['show']):

            for ($this->_sections['categories']['index'] = $this->_sections['categories']['start'], $this->_sections['categories']['iteration'] = 1;
                 $this->_sections['categories']['iteration'] <= $this->_sections['categories']['total'];
                 $this->_sections['categories']['index'] += $this->_sections['categories']['step'], $this->_sections['categories']['iteration']++):
$this->_sections['categories']['rownum'] = $this->_sections['categories']['iteration'];
$this->_sections['categories']['index_prev'] = $this->_sections['categories']['index'] - $this->_sections['categories']['step'];
$this->_sections['categories']['index_next'] = $this->_sections['categories']['index'] + $this->_sections['categories']['step'];
$this->_sections['categories']['first']      = ($this->_sections['categories']['iteration'] == 1);
$this->_sections['categories']['last']       = ($this->_sections['categories']['iteration'] == $this->_sections['categories']['total']);
?>  
		      <?php if ($this->_tpl_vars['modulecategories'][$this->_sections['modulecategories']['index']]['category'] == $this->_tpl_vars['categories'][$this->_sections['categories']['index']]['cid']): ?>
                <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['categories'][$this->_sections['categories']['index']]['cid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" selected="selected"><?php echo ((is_array($_tmp=$this->_tpl_vars['categories'][$this->_sections['categories']['index']]['catname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</option>
              <?php else: ?>
    		    <option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['categories'][$this->_sections['categories']['index']]['cid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['categories'][$this->_sections['categories']['index']]['catname'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</option>
              <?php endif; ?>
		    <?php endfor; endif; ?>
	      </select>
      </div>
    <?php endfor; endif; ?>
  <?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'module','hookaction' => 'modifyconfig','module' => 'Admin'), $this);?>

  <div class="pn-adminformrow">
    <input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_UPDATECONFIG'), $this);?>
" />
  </div>
  <div style="clear:both;"></div>
</div>
</form>