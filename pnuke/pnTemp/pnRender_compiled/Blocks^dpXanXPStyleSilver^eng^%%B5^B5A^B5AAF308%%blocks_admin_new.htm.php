<?php /* Smarty version 2.6.14, created on 2007-10-26 13:49:19
         compiled from blocks_admin_new.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'blocks_admin_new.htm', 3, false),array('function', 'pnmodurl', 'blocks_admin_new.htm', 4, false),array('function', 'pnsecgenauthkey', 'blocks_admin_new.htm', 6, false),array('function', 'html_options', 'blocks_admin_new.htm', 16, false),array('function', 'pnmodcallhooks', 'blocks_admin_new.htm', 54, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "blocks_admin_menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo smarty_function_pnml(array('name' => '_ADDBLOCK'), $this);?>
</h2>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Blocks','type' => 'admin','func' => 'create'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
    <input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Blocks'), $this);?>
" />
	<table>
    <tr>
      <td><label for="blocks_title"><?php echo smarty_function_pnml(array('name' => '_TITLE'), $this);?>
</label></td>
      <td><input id="blocks_title" name="title" type="text" size="40" maxlength="60" /></td>
    </tr>
    <tr>
      <td><label for="blocks_blockid"><?php echo smarty_function_pnml(array('name' => '_BLOCK'), $this);?>
</label></td>
      <td>
	    <select id="blocks_blockid" name="blockid">
            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['blockids']), $this);?>

        </select>
	  </td>
    </tr>
    <tr>
      <td><label for="blocks_position"><?php echo smarty_function_pnml(array('name' => '_POSITION'), $this);?>
</label></td>
      <td>
	    <select id="blocks_position" name="position">
          <option value="l"><?php echo smarty_function_pnml(array('name' => '_LEFT'), $this);?>
</option>		
          <option value="r"><?php echo smarty_function_pnml(array('name' => '_RIGHT'), $this);?>
</option>		
          <option value="c"><?php echo smarty_function_pnml(array('name' => '_CENTRE'), $this);?>
</option>		
        </select>
	  </td>
    </tr>
    <tr>
      <td><label for="blocks_collapsable"><?php echo smarty_function_pnml(array('name' => '_COLLAPSABLE'), $this);?>
</label></td>
      <td>
	    <?php echo smarty_function_pnml(array('name' => '_YES'), $this);?>
<input id="blocks_collapsable" name="collapsable" type="radio" value="1" checked="checked" />
        <?php echo smarty_function_pnml(array('name' => '_NO'), $this);?>
<input id="blocks_collapsable" name="collapsable" type="radio" value="0" />
      </td>
    </tr>
    <tr>
      <td><label for="blocks_defaultstate"><?php echo smarty_function_pnml(array('name' => '_DEFAULTSTATE'), $this);?>
</label></td>
      <td>
	    <?php echo smarty_function_pnml(array('name' => '_EXPANDED'), $this);?>
<input id="blocks_defaultstate" name="defaultstate" type="radio" value="1" checked="checked" />
        <?php echo smarty_function_pnml(array('name' => '_COLLAPSED'), $this);?>
<input id="blocks_defaultstate" name="defaultstate" type="radio" value="0" />
      </td>
    </tr>
    <tr>
      <td><label for="blocks_language"><?php echo smarty_function_pnml(array('name' => '_LANGUAGE'), $this);?>
 </label></td>
      <td>
	    <select id="blocks_language" name="language">
          <option value=""><?php echo smarty_function_pnml(array('name' => '_ALL'), $this);?>
</option>		
            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['blocklanguages']), $this);?>

        </select>
	  </td>
    </tr>
    </table>
    <?php echo smarty_function_pnmodcallhooks(array('hookobject' => 'item','hookaction' => 'new','module' => 'Blocks'), $this);?>

	<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_COMMIT'), $this);?>
" />
</div>
</form>