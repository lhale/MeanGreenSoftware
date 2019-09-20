<?php /* Smarty version 2.6.14, created on 2008-11-06 10:32:15
         compiled from blocks_admin_modify.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'blocks_admin_modify.htm', 3, false),array('function', 'pnmodurl', 'blocks_admin_modify.htm', 5, false),array('function', 'pnsecgenauthkey', 'blocks_admin_modify.htm', 7, false),array('function', 'html_options', 'blocks_admin_modify.htm', 18, false),array('function', 'pnmodcallhooks', 'blocks_admin_modify.htm', 73, false),array('modifier', 'pnvarprepfordisplay', 'blocks_admin_modify.htm', 4, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "blocks_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_MODIFYBLOCK'), $this);?>
</h2>
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['modtitle'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Blocks','type' => 'admin','func' => 'update'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
    <input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Blocks'), $this);?>
" />
    <input type="hidden" name="bid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['bid'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" />
	<table>
    <tr>
      <td><label for="blocks_title"><?php echo smarty_function_pnml(array('name' => '_TITLE'), $this);?>
</label></td>
      <td><input id="blocks_title" name="title" type="text" size="40" maxlength="60" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['blocktitle'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" /></td>
    </tr>
    <tr>
      <td><label for="blocks_position"><?php echo smarty_function_pnml(array('name' => '_POSITION'), $this);?>
</label></td>
      <td>
	    <select id="blocks_position" name="position">
            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['blockpositions'],'selected' => $this->_tpl_vars['blockposition']), $this);?>

        </select>
	  </td>
    </tr>
    <tr>
      <td><?php echo smarty_function_pnml(array('name' => '_COLLAPSABLE'), $this);?>
</td>
      <td>
	    <?php if ($this->_tpl_vars['blockcollapsable'] == 1): ?>
          <label for="blocks_collapsable_yes"><?php echo smarty_function_pnml(array('name' => '_YES'), $this);?>
</label><input id="blocks_collapsable_yes" name="collapsable" type="radio" value="1" checked="checked" />
          <label for="blocks_collapsable_no"><?php echo smarty_function_pnml(array('name' => '_NO'), $this);?>
</label><input id="blocks_collapsable_no" name="collapsable" type="radio" value="0" />
		<?php else: ?>
          <label for="blocks_collapsable_yes"><?php echo smarty_function_pnml(array('name' => '_YES'), $this);?>
</label><input id="blocks_collapsable_yes" name="collapsable" type="radio" value="1" />
          <label for="blocks_collapsable_no"><?php echo smarty_function_pnml(array('name' => '_NO'), $this);?>
</label><input id="blocks_collapsable_no" name="collapsable" type="radio" value="0" checked="checked" />
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td><?php echo smarty_function_pnml(array('name' => '_DEFAULTSTATE'), $this);?>
</td>
      <td>
	    <?php if ($this->_tpl_vars['blockdefaultstate'] == 1): ?>
    	    <label for="blocks_defaultstate_expanded"><?php echo smarty_function_pnml(array('name' => '_EXPANDED'), $this);?>
</label><input id="blocks_defaultstate_expanded" name="defaultstate" type="radio" value="1" checked="checked" />
            <label for="blocks_defaultstate_collapsed"><?php echo smarty_function_pnml(array('name' => '_COLLAPSED'), $this);?>
</label><input id="blocks_defaultstate_collapsed" name="defaultstate" type="radio" value="0" />
		<?php else: ?>
    	    <label for="blocks_defaultstate_expanded"><?php echo smarty_function_pnml(array('name' => '_EXPANDED'), $this);?>
</label><input id="blocks_defaultstate_expanded" name="defaultstate" type="radio" value="1" />
            <label for="blocks_defaultstate_collapsed"><?php echo smarty_function_pnml(array('name' => '_COLLAPSED'), $this);?>
</label><input id="blocks_defaultstate_collapsed" name="defaultstate" type="radio" value="0" checked="checked" />
		<?php endif; ?>
      </td>
    </tr>
    <tr>
      <td><label for="blocks_language"><?php echo smarty_function_pnml(array('name' => '_LANGUAGE'), $this);?>
</label></td>
      <td>
	    <select id="blocks_language" name="language">
          <option value=""><?php echo smarty_function_pnml(array('name' => '_ALL'), $this);?>
</option>		
          <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['languages'],'selected' => $this->_tpl_vars['blocklanguage']), $this);?>

        </select>
	  </td>
    </tr>
	<?php if ($this->_tpl_vars['blockcontentflag'] == 1): ?>
      <tr>
        <td><label for="blocks_content"><?php echo smarty_function_pnml(array('name' => '_CONTENT'), $this);?>
</label></td>
		<td>
          <textarea id="blocks_content" name="content" cols="40" rows="10"><?php echo ((is_array($_tmp=$this->_tpl_vars['blockcontent'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</textarea>
		</td>
	  </tr>
	<?php endif; ?>
    <?php echo $this->_tpl_vars['blockoutput']; ?>

    <tr>
      <td><label for="blocks_refresh"><?php echo smarty_function_pnml(array('name' => '_BLOCKSREFRESH'), $this);?>
</label></td>
      <td>
	    <select id="blocks_refresh" name="refresh">
          <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['blockrefreshtimes'],'selected' => $this->_tpl_vars['blockrefreshtime']), $this);?>

        </select>
	  </td>
    </tr>
    </table>
  <?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'item','hookaction' => 'modify','hookid' => $this->_tpl_vars['bid'],'module' => 'Blocks'), $this);?>

	<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_COMMIT'), $this);?>
" />
</div>
</form>