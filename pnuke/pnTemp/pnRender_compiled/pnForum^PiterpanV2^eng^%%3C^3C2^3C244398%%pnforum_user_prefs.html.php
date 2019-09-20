<?php /* Smarty version 2.6.14, created on 2007-09-16 09:09:12
         compiled from pnforum_user_prefs.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'pnforum_user_prefs.html', 7, false),array('function', 'post_order_button', 'pnforum_user_prefs.html', 14, false),array('function', 'pnmodurl', 'pnforum_user_prefs.html', 23, false),array('function', 'pnimg', 'pnforum_user_prefs.html', 23, false),array('function', 'subscribeforum_button', 'pnforum_user_prefs.html', 65, false),array('function', 'favoriteforum_button', 'pnforum_user_prefs.html', 69, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pnforum_user_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h1 style="text-align: center;"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_SETTING'), $this);?>
</strong></h1>

<div class="pnfadminrow98" style="background: <?php echo $this->_tpl_vars['bgcolor2']; ?>
; height: 1.2em;">
    <div class="pnfadmincol49" style="margin-left: 5px;">
        <strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_RECENT_POST_ORDER'), $this);?>
</strong>
    </div>
    <div class="pnfadmincol49" style="text-align: center;">
        <?php echo smarty_function_post_order_button(array('return_to' => 'prefs'), $this);?>
&nbsp;
    </div>
</div>

<div class="pnfadminrow98" style="background: <?php echo $this->_tpl_vars['bgcolor2']; ?>
; height: 1.2em;">
    <div class="pnfadmincol49" style="margin-left: 5px;">
        <strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_MANAGETOPICSUBSCRIPTIONS'), $this);?>
</strong>
    </div>
    <div class="pnfadmincol49" style="text-align: center;">
        <a href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'topicsubscriptions'), $this);?>
" title="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_MANAGETOPICSUBSCRIPTIONS'), $this);?>
"><?php echo smarty_function_pnimg(array('src' => "managetopicsubscriptions.gif",'altml' => true,'alt' => '_PNFORUM_MANAGETOPICSUBSCRIPTIONS'), $this);?>
</a>
    </div>
</div>


<div style="clear: both;"></div>

<br />
<table bgcolor="<?php echo $this->_tpl_vars['bgcolor2']; ?>
" border="0" cellpadding="3" cellspacing="1" width="100%">
    <thead>
    <tr bgcolor="<?php echo $this->_tpl_vars['bgcolor2']; ?>
" align="left">
        <th style="width:50%; height:28px;">
            <strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_CATEGORY'), $this);?>
 / <?php echo smarty_function_pnml(array('name' => '_PNFORUM_FORUM'), $this);?>
</strong>
        </th>
        <th style="width:25%; height:28px; text-align: center;">
            <strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_SUBSCRIBE_STATUS'), $this);?>
</strong>
        </th>
        <?php if ($this->_tpl_vars['favorites_enabled'] == 'yes'): ?>
        <th style="width:25%; height:28px; text-align: center;">
            <strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_FAVORITE_STATUS'), $this);?>
</strong>
        </th>
        <?php endif; ?>
    </tr>
    </thead>
    <tbody>
    <?php $_from = $this->_tpl_vars['tree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
    <tr align="left" valign="top">
        <td colspan="2" height="28">
            <strong><?php echo $this->_tpl_vars['category']['cat_title']; ?>
</strong>
        </td>
        <?php if ($this->_tpl_vars['favorites_enabled'] == 'yes'): ?>
        <td>&nbsp;</td>
        <?php endif; ?>
    </tr>
    <?php $_from = $this->_tpl_vars['category']['forums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['forum']):
?>
    <tr bgcolor="<?php echo $this->_tpl_vars['bgcolor3']; ?>
" style="text-align:left; vertical-align:top;">
        <td width="50%">
          	<a href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'viewforum','forum' => $this->_tpl_vars['forum']['forum_id']), $this);?>
"><strong><?php echo $this->_tpl_vars['forum']['forum_name']; ?>
</strong></a>
    	    <br />
        	<?php echo $this->_tpl_vars['forum']['forum_desc']; ?>

        </td>
        <td style="text-align:center; vertical-align:middle;">
            <?php echo smarty_function_subscribeforum_button(array('forum_id' => $this->_tpl_vars['forum']['forum_id'],'cat_id' => $this->_tpl_vars['category']['cat_id'],'return_to' => 'prefs'), $this);?>
&nbsp;<br />
        </td>
        <?php if ($this->_tpl_vars['favorites_enabled'] == 'yes'): ?>
        <td style="text-align:center; vertical-align:middle;">
            <?php echo smarty_function_favoriteforum_button(array('forum_id' => $this->_tpl_vars['forum']['forum_id'],'cat_id' => $this->_tpl_vars['category']['cat_id'],'return_to' => 'prefs'), $this);?>
&nbsp;
		</td>
        <?php endif; ?>
    </tr>

    <?php endforeach; endif; unset($_from); ?>
    <?php endforeach; endif; unset($_from); ?>
    </tbody>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'pnforum_user_footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>