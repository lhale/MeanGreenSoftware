<?php /* Smarty version 2.6.14, created on 2007-09-18 15:02:33
         compiled from pnforum_search.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'pnforum_search.html', 6, false),array('modifier', 'pnvarprephtmldisplay', 'pnforum_search.html', 17, false),)), $this); ?>

<input type="hidden" name="pnForum_startnum" value="0" />

<div style="padding-left: 3px; background-color: <?php echo $this->_tpl_vars['bgcolor2']; ?>
;">
    <input type="checkbox" name="active_pnForum" id="active_pnForum" value="1" checked="checked" />&nbsp;<?php echo smarty_function_pnml(array('name' => '_PNFORUM_SEARCHINCLUDE_TITLE'), $this);?>

</div>

<div style="clear:both; padding: 4px;">
    <div style="padding-top: 2px; float: left; width: 20%; text-align: right;">
        <?php echo smarty_function_pnml(array('name' => '_PNFORUM_SEARCHINCLUDE_FORUM'), $this);?>
:
    </div>
    <div style="float: left; width: 70%; text-align: left;">
        <select name="pnForum_forum[]" id="pnForum_forum" size="5" multiple="multiple">
        <option value="" selected="selected"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_SEARCHINCLUDE_ALLTOPICS'), $this);?>
</option>
        <?php $_from = $this->_tpl_vars['forums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['forum']):
?>
        <option value="<?php echo $this->_tpl_vars['forum']['forum_id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['forum']['cat_title'])) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)); ?>
 :: <?php echo ((is_array($_tmp=$this->_tpl_vars['forum']['forum_name'])) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)); ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
        </select>
    </div>
</div>
<div style="clear:both; padding: 4px;">
    <div style="padding-top: 2px; float: left; width: 20%; text-align: right;">
        <?php echo smarty_function_pnml(array('name' => '_PNFORUM_SEARCHINCLUDE_AUTHOR'), $this);?>
:
    </div>
    <div style="float: left; width: 70%; text-align: left;">
        <input type="text" name="pnForum_author" id="pnForum_author" size="20" maxlength="255" />
    </div>
</div>
<div style="clear:both; padding: 4px;">
    <div style="padding-top: 2px; float: left; width: 20%; text-align: right;">
        <?php echo smarty_function_pnml(array('name' => '_PNFORUM_SEARCHINCLUDE_ORDER'), $this);?>
:
    </div>
    <div style="float: left; width: 70%; text-align: left;">
        <select name="pnForum_order[]" id="pnForum_order" size="1">
        <option value="1" selected="selected"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_SEARCHINCLUDE_BYDATE'), $this);?>
</option>
        <option value="2"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_SEARCHINCLUDE_BYTITLE'), $this);?>
</option>
        <option value="3"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_SEARCHINCLUDE_BYFORUM'), $this);?>
</option>
        </select>
    </div>
</div>
<div style="clear:both; padding: 4px;">
    <div style="padding-top: 2px; float: left; width: 20%; text-align: right;">
        <?php echo smarty_function_pnml(array('name' => '_PNFORUM_SEARCHINCLUDE_LIMIT'), $this);?>
:
    </div>
    <div style="float: left; width: 70%; text-align: left;">
        <select name="pnForum_limit" id="pnForum_limit" size="1">
        <option value="0"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_SEARCHINCLUDE_NOLIMIT'), $this);?>
</option>
        <option value="10" selected="selected">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
        </select>
        <?php echo smarty_function_pnml(array('name' => '_PNFORUM_SEARCHINCLUDE_HITS'), $this);?>

    </div>
</div>
<div style="clear:both;"> </div>