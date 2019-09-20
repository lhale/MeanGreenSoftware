<?php /* Smarty version 2.6.14, created on 2007-09-16 09:08:57
         compiled from pnforum_user_latestposts.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'pnforum_user_latestposts.html', 5, false),array('function', 'pnmodurl', 'pnforum_user_latestposts.html', 6, false),array('modifier', 'pnvarprepfordisplay', 'pnforum_user_latestposts.html', 34, false),array('modifier', 'profilelink', 'pnforum_user_latestposts.html', 40, false),array('modifier', 'pndate_format', 'pnforum_user_latestposts.html', 43, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pnforum_user_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1 style="background: <?php echo $this->_tpl_vars['bgcolor2']; ?>
; text-align: center;"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_OURLATESTPOSTS'), $this);?>
 (<?php echo $this->_tpl_vars['text']; ?>
)</h1>
<form name="latestposts" method="post" action="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'viewlatest'), $this);?>
">
<div style="text-align: center; background: <?php echo $this->_tpl_vars['bgcolor3']; ?>
;">
    [ <a href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'viewlatest','selorder' => 3), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_YESTERDAY'), $this);?>
</a> ]
    [ <a href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'viewlatest','selorder' => 2), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_TODAY'), $this);?>
</a> ]
    [ <a href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'viewlatest','selorder' => 1), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_LAST24'), $this);?>
</a> ]
    [ <button style="border: 1px solid black; margin: 0; background: transparent; text-decoration: underline;" type="submit"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_LAST'), $this);?>
</button> <input type="text" name="nohours" id="pnForum_hours" size="3" value="<?php echo $this->_tpl_vars['nohours']; ?>
" maxlength="3" tabindex="0" /> <button style="border: 1px solid black; margin: 0; background: transparent; text-decoration: underline;" type="submit"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_HOURS'), $this);?>
</button> ]
</div>
<div style="text-align: center; background: <?php echo $this->_tpl_vars['bgcolor3']; ?>
;">
    [ <a href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'viewlatest','selorder' => 4), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_LASTWEEK'), $this);?>
</a> ]
    [ <a href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'viewlatest','selorder' => 4,'unanswered' => 1), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_UALASTWEEK'), $this);?>
</a> ]
    <?php if ($this->_tpl_vars['last_visit_unix'] <> 0): ?>
    [ <a href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'viewlatest','selorder' => 6), $this);?>
"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_LASTVISIT'), $this);?>
</a> ]
    <?php endif; ?>
</div>
</form>


<h2 style="background: <?php echo $this->_tpl_vars['bgcolor2']; ?>
; text-align: center; margin-top: 1.5em;"><a id="postings"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_FORUMS'), $this);?>
</a></h2>
<table border="0" cellpadding="3" cellspacing="1" width="100%">
	<tr style="background: <?php echo $this->_tpl_vars['bgcolor2']; ?>
; text-align: left;">
          <td width="50%"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_TOPIC'), $this);?>
</strong></td>
          <td width="15%" style="text-align: center;"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_REPLIES'), $this);?>
</strong></td>
          <td width="15%"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_AUTHOR'), $this);?>
</strong></td>
          <td width="20%"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_POSTED'), $this);?>
</strong></td>
	</tr>
	<?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['post']):
?>
    <tr style="background: <?php echo $this->_tpl_vars['bgcolor1']; ?>
;" onmouseover="this.style.backgroundColor='<?php echo $this->_tpl_vars['bgcolor3']; ?>
'" onmouseout="this.style.backgroundColor='<?php echo $this->_tpl_vars['bgcolor1']; ?>
'">
        <td width="50%">
            <a href="<?php echo $this->_tpl_vars['post']['last_post_url_anchor']; ?>
" title="<?php echo $this->_tpl_vars['post']['forum_name']; ?>
 :: <?php echo $this->_tpl_vars['post']['cat_title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']['topic_title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</a>
        </td>
        <td style="text-align: center;">
            <?php echo $this->_tpl_vars['post']['topic_replies']; ?>

        </td>
        <td>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['post']['poster_name'])) ? $this->_run_mod_handler('profilelink', true, $_tmp) : smarty_modifier_profilelink($_tmp)); ?>

        </td>
        <td>            <?php echo ((is_array($_tmp=$this->_tpl_vars['post']['posted_unixtime'])) ? $this->_run_mod_handler('pndate_format', true, $_tmp, "%d.%m.%Y, %H:%M") : smarty_modifier_pndate_format($_tmp, "%d.%m.%Y, %H:%M")); ?>

        </td>
    </tr>
    <?php endforeach; else: ?>
    <tr>
        <td colspan="4" style="text-align: center;">
            <strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_NOPOSTS'), $this);?>
</strong>
        </td>
    </tr>
    <?php endif; unset($_from); ?>
</table>

<h2 style="text-align: center; margin-top: 1.5em;"><a id="rss"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_RSS2FORUMPOSTS'), $this);?>
</a></h2>
<table border="0" cellpadding="3" cellspacing="1" width="100%">
	<tr style="background: <?php echo $this->_tpl_vars['bgcolor2']; ?>
; text-align: left;">
          <td width="50%"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_TOPIC'), $this);?>
</strong></td>
          <td width="15%" style="text-align: center;"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_REPLIES'), $this);?>
</strong></td>
          <td width="15%"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_AUTHOR'), $this);?>
</strong></td>
          <td width="20%"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_POSTED'), $this);?>
</strong></td>
	</tr>
	<?php $_from = $this->_tpl_vars['rssposts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['post']):
?>
    <tr style="background: <?php echo $this->_tpl_vars['bgcolor1']; ?>
;" onmouseover="this.style.backgroundColor='<?php echo $this->_tpl_vars['bgcolor3']; ?>
'" onmouseout="this.style.backgroundColor='<?php echo $this->_tpl_vars['bgcolor1']; ?>
'">
        <td width="50%">
            <a href="<?php echo $this->_tpl_vars['post']['last_post_url_anchor']; ?>
" title="<?php echo $this->_tpl_vars['post']['forum_name']; ?>
 :: <?php echo $this->_tpl_vars['post']['cat_title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']['topic_title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</a>
        </td>
        <td style="text-align: center;">
            <?php echo $this->_tpl_vars['post']['topic_replies']; ?>

        </td>
        <td>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['post']['poster_name'])) ? $this->_run_mod_handler('profilelink', true, $_tmp) : smarty_modifier_profilelink($_tmp)); ?>

        </td>
        <td>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['post']['posted_unixtime'])) ? $this->_run_mod_handler('pndate_format', true, $_tmp, "%d.%m.%Y, %H:%M") : smarty_modifier_pndate_format($_tmp, "%d.%m.%Y, %H:%M")); ?>

        </td>
    </tr>
    <?php endforeach; else: ?>
    <tr>
        <td colspan="4" style="text-align: center;">
            <strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_NOPOSTS'), $this);?>
</strong>
        </td>
    </tr>
    <?php endif; unset($_from); ?>
</table>

<h2 style="text-align: center; margin-top: 1.5em;"><a id="lists"><?php echo smarty_function_pnml(array('name' => '_PNFORUM_MAIL2FORUMPOSTS'), $this);?>
</a></h2>
<table border="0" cellpadding="3" cellspacing="1" width="100%">
	<tr style="background: <?php echo $this->_tpl_vars['bgcolor2']; ?>
; text-align: left;">
          <td width="50%"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_TOPIC'), $this);?>
</strong></td>
          <td width="15%" style="text-align: center;"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_REPLIES'), $this);?>
</strong></td>
          <td width="15%"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_AUTHOR'), $this);?>
</strong></td>
          <td width="20%"><strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_POSTED'), $this);?>
</strong></td>
	</tr>
	<?php $_from = $this->_tpl_vars['m2fposts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['post']):
?>
    <tr style="background: <?php echo $this->_tpl_vars['bgcolor1']; ?>
;" onmouseover="this.style.backgroundColor='<?php echo $this->_tpl_vars['bgcolor3']; ?>
'" onmouseout="this.style.backgroundColor='<?php echo $this->_tpl_vars['bgcolor1']; ?>
'">
        <td width="50%">
            <a href="<?php echo $this->_tpl_vars['post']['last_post_url_anchor']; ?>
" title="<?php echo $this->_tpl_vars['post']['forum_name']; ?>
 :: <?php echo $this->_tpl_vars['post']['cat_title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']['topic_title'])) ? $this->_run_mod_handler('pnvarprepfordisplay', true, $_tmp) : smarty_modifier_pnvarprepfordisplay($_tmp)); ?>
</a>
        </td>
        <td style="text-align: center;">
            <?php echo $this->_tpl_vars['post']['topic_replies']; ?>

        </td>
        <td>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['post']['poster_name'])) ? $this->_run_mod_handler('profilelink', true, $_tmp) : smarty_modifier_profilelink($_tmp)); ?>

        </td>
        <td>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['post']['posted_unixtime'])) ? $this->_run_mod_handler('pndate_format', true, $_tmp, "%d.%m.%Y, %H:%M") : smarty_modifier_pndate_format($_tmp, "%d.%m.%Y, %H:%M")); ?>

        </td>
    </tr>
    <?php endforeach; else: ?>
    <tr>
        <td colspan="4" style="text-align: center;">
            <strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_NOPOSTS'), $this);?>
</strong>
        </td>
    </tr>
    <?php endif; unset($_from); ?>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'pnforum_user_footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
