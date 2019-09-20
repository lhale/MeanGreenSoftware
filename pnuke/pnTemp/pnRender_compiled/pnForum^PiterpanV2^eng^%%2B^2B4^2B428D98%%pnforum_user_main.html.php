<?php /* Smarty version 2.6.14, created on 2007-09-16 08:24:05
         compiled from pnforum_user_main.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'pnforum_user_main.html', 6, false),array('function', 'pnmodurl', 'pnforum_user_main.html', 14, false),array('function', 'pnimg', 'pnforum_user_main.html', 14, false),array('function', 'adminlink', 'pnforum_user_main.html', 37, false),array('function', 'listforummods', 'pnforum_user_main.html', 53, false),array('modifier', 'pndate_format', 'pnforum_user_main.html', 57, false),array('modifier', 'profilelink', 'pnforum_user_main.html', 57, false),array('modifier', 'pnvarprepfordisplay', 'pnforum_user_main.html', 57, false),array('modifier', 'pnvarprephtmldisplay', 'pnforum_user_main.html', 57, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pnforum_user_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table class="pnForum-border" border="0"  cellpadding="5" cellspacing="1" width="97%" summary="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_FORUMS'), $this);?>
">
    <thead>
        <tr style="text-align:left;background-color:<?php echo $this->_tpl_vars['bgcolor2']; ?>
;" align="left">
            <?php if ($this->_tpl_vars['pncore']['logged_in'] == true): ?>
            <th id="col_0" abbr="<?php if ($this->_tpl_vars['pncore']['pnForum']['favorites_enabled'] == 'yes'):  echo smarty_function_pnml(array('name' => '_PNFORUM_FAVORITES'), $this);?>
 <?php else:  echo smarty_function_pnml(array('name' => '_PNFORUM_FORUM'), $this); endif; ?>" colspan="2" align="left" valign="middle">
                <?php if ($this->_tpl_vars['pncore']['pnForum']['favorites_enabled'] == 'yes'): ?>
                    <strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_FAVORITES'), $this);?>
</strong>&nbsp;
                    <?php if ($this->_tpl_vars['favorites']): ?>
                        <a href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'prefs','act' => 'showallforums'), $this);?>
" title="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_SHOWALLFORUMS'), $this);?>
"><?php echo smarty_function_pnimg(array('src' => "showallforums.gif",'alt' => '_PNFORUM_SHOWALLFORUMS','altml' => true), $this);?>
</a>
                    <?php else: ?>
                        <a href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'prefs','act' => 'showfavorites'), $this);?>
" title="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_SHOWFAVORITES'), $this);?>
"><?php echo smarty_function_pnimg(array('src' => "showfavorites.gif",'alt' => '_PNFORUM_SHOWFAVORITES','altml' => true), $this);?>
</a>
                    <?php endif; ?>
                <?php else: ?>
                    <strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_FORUMS'), $this);?>
</strong>
                <?php endif; ?>
            </th>
           <?php else: ?>
            <th id="col_0" abbr="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_FORUM'), $this);?>
" colspan="2" align="left" valign="middle">
                <strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_FORUMS'), $this);?>
</strong>
            </th>
           <?php endif; ?>
            <th id="col_1" abbr="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_TOPICS'), $this);?>
" align="center"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_TOPICS'), $this);?>
</strong></th>
            <th id="col_2" abbr="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_POSTS'), $this);?>
" align="center"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_POSTS'), $this);?>
</strong></th>
            <th id="col_3" abbr="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_LASTPOST'), $this);?>
" align="center"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_LASTPOST'), $this);?>
</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php $_from = $this->_tpl_vars['tree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
        <tr align="left" valign="top" style="background-color:<?php echo $this->_tpl_vars['bgcolor3']; ?>
;">
            <td headers="col_0" colspan="5" style="padding: 10px 0 10px 6px;">
                <a title="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_GOTO_CAT'), $this);?>
 '<?php echo $this->_tpl_vars['category']['cat_title']; ?>
'" href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'main','viewcat' => $this->_tpl_vars['category']['cat_id']), $this);?>
">
                <strong><?php echo $this->_tpl_vars['category']['cat_title']; ?>
</strong></a>&nbsp;<?php echo smarty_function_adminlink(array('type' => 'category','id' => $this->_tpl_vars['category']['cat_id']), $this);?>

            </td>
        </tr>
        <?php if (( $this->_tpl_vars['view_category'] == $this->_tpl_vars['category']['cat_id'] ) || ( $this->_tpl_vars['view_category'] == -1 )): ?>
        <?php $_from = $this->_tpl_vars['category']['forums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['forum']):
?>
         <tr align="left" valign="top" style="background-color:<?php echo $this->_tpl_vars['bgcolor1']; ?>
;" onmouseover="this.style.background='<?php echo $this->_tpl_vars['bgcolor3']; ?>
'" onmouseout="this.style.background='<?php echo $this->_tpl_vars['bgcolor1']; ?>
'">
            <td headers="col_0" align="center" valign="middle" style="width:2%;">
                <?php if ($this->_tpl_vars['forum']['new_posts'] == 1): ?>
                    <?php echo smarty_function_pnimg(array('src' => 'red_folder.gif','alt' => '_PNFORUM_NEWPOSTS','altml' => true), $this);?>

                <?php else: ?>
                    <?php echo smarty_function_pnimg(array('src' => 'folder.gif','alt' => '_PNFORUM_NONEWPOSTS','altml' => true), $this);?>

                <?php endif; ?>
            </td>
            <td headers="col_0">
                <a title="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_GOTO_FORUM'), $this);?>
 '<?php echo $this->_tpl_vars['forum']['forum_name']; ?>
'" href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'viewforum','forum' => $this->_tpl_vars['forum']['forum_id']), $this);?>
"><strong><?php echo $this->_tpl_vars['forum']['forum_name']; ?>
</strong></a>&nbsp;<?php echo smarty_function_adminlink(array('type' => 'forum','id' => $this->_tpl_vars['forum']['forum_id']), $this);?>

                <br /><?php echo $this->_tpl_vars['forum']['forum_desc']; ?>

                <br /><?php echo smarty_function_pnml(array('name' => '_PNFORUM_MODERATEDBY'), $this);?>
: <?php echo smarty_function_listforummods(array('moderators' => $this->_tpl_vars['forum']['forum_mods']), $this);?>

            </td>
            <td headers="col_1" style="width:5%;text-align:center;" align="center" valign="middle"><?php echo $this->_tpl_vars['forum']['forum_topics']; ?>
</td>
            <td headers="col_2" style="width:5%;text-align:center;" align="center" valign="middle"><?php echo $this->_tpl_vars['forum']['forum_posts']; ?>
</td>
            <td headers="col_3" style="width:15%;text-align:center;" align="center" valign="middle"><?php if ($this->_tpl_vars['forum']['last_post_data']['name'] <> ''):  echo ((is_array($_tmp=$this->_tpl_vars['forum']['last_post_data']['unixtime'])) ? $this->_run_mod_handler('pndate_format', true, $_tmp, 'datetimebrief') : smarty_modifier_pndate_format($_tmp, 'datetimebrief')); ?>
<br /> <?php echo smarty_function_pnml(array('name' => '_BY'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['forum']['last_post_data']['name'])) ? $this->_run_mod_handler('profilelink', true, $_tmp) : smarty_modifier_profilelink($_tmp)); ?>
<br /><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['forum']['last_post_data']['url_anchor'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
" title="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_GOTO_LATEST'), $this);?>
 '<?php echo ((is_array($_tmp=$this->_tpl_vars['forum']['last_post_data']['subject'])) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp)); ?>
'"><?php echo smarty_function_pnimg(array('src' => "icon_latest_topic.gif"), $this);?>
</a><?php else:  echo smarty_function_pnml(array('name' => '_PNFORUM_NOPOSTS'), $this); endif; ?></td>
        </tr>
        <?php endforeach; else: ?>
        <tr>
            <td headers="col_0" style="background-color:<?php echo $this->_tpl_vars['bgcolor1']; ?>
;" width="2%">&nbsp;</td>
            <td headers="col_0" colspan="4" style="background-color:<?php echo $this->_tpl_vars['bgcolor1']; ?>
;" align="left" valign="middle" width="2%">
                <span style="padding-left: 5px;"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_NOFORUMS'), $this);?>
</strong></span>
            </td>
        </tr>
        <?php endif; unset($_from); ?>
        <?php endif; ?>
        <?php endforeach; else: ?>
        <tr>
            <td colspan="5" style="background-color:<?php echo $this->_tpl_vars['bgcolor1']; ?>
;">
                <?php if ($this->_tpl_vars['pncore']['pnForum']['favorites_enabled'] == 'yes'): ?>
                <?php echo smarty_function_pnml(array('name' => '_PNFORUM_NOFAVORITES'), $this);?>

                <?php else: ?>
                <?php echo smarty_function_pnml(array('name' => '_PNFORUM_NO_FORUMS_DB'), $this);?>

                <?php endif; ?>
            </td>
        </tr>
        <?php endif; unset($_from); ?>
    </tbody>
</table>
<?php echo smarty_function_pnimg(array('src' => "red_folder.gif",'alt' => '_PNFORUM_NEWPOSTS','altml' => true), $this);?>
 = <?php echo smarty_function_pnml(array('name' => '_PNFORUM_NEWPOSTS'), $this);?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['last_visit_unix'])) ? $this->_run_mod_handler('pndate_format', true, $_tmp, "%e. %b %Y  - %R") : smarty_modifier_pndate_format($_tmp, "%e. %b %Y  - %R")); ?>
)<br />
<?php echo smarty_function_pnimg(array('src' => "folder.gif",'alt' => '_PNFORUM_NONEWPOSTS','altml' => true), $this);?>
 = <?php echo smarty_function_pnml(array('name' => '_PNFORUM_NONEWPOSTS'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pnforum_user_footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>