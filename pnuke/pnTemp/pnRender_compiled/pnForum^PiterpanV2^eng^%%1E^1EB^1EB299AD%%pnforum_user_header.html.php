<?php /* Smarty version 2.6.14, created on 2007-09-16 08:24:06
         compiled from pnforum_user_header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'pnforum_user_header.html', 5, false),array('function', 'pnimg', 'pnforum_user_header.html', 5, false),array('function', 'pnmodurl', 'pnforum_user_header.html', 6, false),array('function', 'jumpbox', 'pnforum_user_header.html', 14, false),array('function', 'pngetstatusmsg', 'pnforum_user_header.html', 16, false),array('modifier', 'pnvarprephtmldisplay', 'pnforum_user_header.html', 16, false),)), $this); ?>

<div style="text-align:left">
	<a title="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_SEARCH'), $this);?>
" href="modules.php?op=modload&amp;name=Search&amp;file=index"><?php echo smarty_function_pnimg(array('src' => "search.gif",'alt' => '_PNFORUM_SEARCH','altml' => true), $this);?>
</a>
	<a title="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_LATEST'), $this);?>
" href="<?php echo smarty_function_pnmodurl(array('modname' => 'pnForum','type' => 'user','func' => 'viewlatest'), $this);?>
"><?php echo smarty_function_pnimg(array('src' => "latestposts.gif",'alt' => '_PNFORUM_LATEST','altml' => true), $this);?>
</a>
	<?php if ($this->_tpl_vars['pncore']['logged_in'] != 1): ?>
		<a title="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_REGISTRATION_NOTE'), $this);?>
" href="user.php?op=loginscreen&amp;module=User"><?php echo smarty_function_pnimg(array('src' => "login.gif",'alt' => '_PNFORUM_REGISTRATION_NOTE','altml' => true), $this);?>
</a>
		<a title="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_REGISTRATION_NOTE'), $this);?>
" href="user.php?op=register&amp;module=NewUser"><?php echo smarty_function_pnimg(array('src' => "register.gif",'alt' => '_PNFORUM_REGISTRATION_NOTE','altml' => true), $this);?>
</a>
	<?php else: ?>
		<a title="<?php echo smarty_function_pnml(array('name' => '_PNFORUM_PERSONAL_SETTINGS'), $this);?>
" href="<?php echo smarty_function_pnmodurl(array('type' => 'user','modname' => 'pnForum','func' => 'prefs'), $this);?>
"><?php echo smarty_function_pnimg(array('src' => "settings.gif",'alt' => '_PNFORUM_PERSONAL_SETTINGS','altml' => true), $this);?>
</a>
	<?php endif; ?>
</div>
<div style="text-align:right"><?php echo smarty_function_jumpbox(array(), $this);?>
</div>

<?php echo smarty_function_pngetstatusmsg(array('class' => 'pnf_statusmsg','tag' => ((is_array($_tmp='div')) ? $this->_run_mod_handler('pnvarprephtmldisplay', true, $_tmp) : smarty_modifier_pnvarprephtmldisplay($_tmp))), $this);?>


<?php if ($this->_tpl_vars['numposts']):  echo smarty_function_pnml(array('name' => '_PNFORUM_STATSBLOCK'), $this);?>
&nbsp;<?php echo $this->_tpl_vars['numposts']; ?>
<br />
<?php endif; ?>