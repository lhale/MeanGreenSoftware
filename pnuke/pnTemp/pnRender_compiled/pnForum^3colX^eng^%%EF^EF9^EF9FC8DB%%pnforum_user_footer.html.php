<?php /* Smarty version 2.6.14, created on 2007-09-20 10:49:38
         compiled from pnforum_user_footer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnforumonline', 'pnforum_user_footer.html', 3, false),array('function', 'pnconfiggetvar', 'pnforum_user_footer.html', 5, false),array('function', 'pnml', 'pnforum_user_footer.html', 10, false),array('function', 'pnmodgetinfo', 'pnforum_user_footer.html', 31, false),array('modifier', 'profilelink', 'pnforum_user_footer.html', 15, false),)), $this); ?>

<?php echo smarty_function_pnforumonline(array('assign' => 'online'), $this);?>


<?php echo smarty_function_pnconfiggetvar(array('name' => 'anonymoussessions','assign' => 'anonsessions'), $this);?>

<?php echo smarty_function_pnconfiggetvar(array('name' => 'secinactivemins','assign' => 'mins'), $this);?>


<div style="margin-top: 1em; clear: both; width: 100%; font-size: 1.0em; border: 1px solid black;">
    <div style="background: <?php echo $this->_tpl_vars['bgcolor3']; ?>
; line-height: 1.4em; padding: 0.2em 0 0.2em 2px;">
        <strong><?php echo smarty_function_pnml(array('name' => '_PNFORUM_USERSONLINE'), $this);?>
:</strong><br />
    </div>
    <div style="margin: 2px; font-size: 0.8em;">
        <?php $_from = $this->_tpl_vars['online']['unames']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['num'] => $this->_tpl_vars['user']):
?>
            <?php if ($this->_tpl_vars['user']['admin'] == '1'): ?>
                <?php echo ((is_array($_tmp=$this->_tpl_vars['user']['uname'])) ? $this->_run_mod_handler('profilelink', true, $_tmp, 'pnfadminuser') : smarty_modifier_profilelink($_tmp, 'pnfadminuser')); ?>

            <?php else: ?>
                <?php echo ((is_array($_tmp=$this->_tpl_vars['user']['uname'])) ? $this->_run_mod_handler('profilelink', true, $_tmp, 'pnfnoadminuser') : smarty_modifier_profilelink($_tmp, 'pnfnoadminuser')); ?>

            <?php endif; ?>
            <?php if ($this->_tpl_vars['online']['numusers'] > 1 && $this->_tpl_vars['num'] <> $this->_tpl_vars['online']['numusers']-1): ?>-<?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
        <?php if ($this->_tpl_vars['anonsessions'] == 1): ?>
        <?php echo smarty_function_pnml(array('name' => '_PNFORUM_AND'), $this);?>
 <?php if ($this->_tpl_vars['online']['numguests'] == 1): ?>0 <?php echo smarty_function_pnml(array('name' => '_GUEST'), $this); else:  echo $this->_tpl_vars['online']['numguests']; ?>
 <?php echo smarty_function_pnml(array('name' => '_GUESTS'), $this); endif; ?>
        <?php endif; ?>
        <br />
        <br />
        <?php echo smarty_function_pnml(array('name' => '_PNFORUM_BASEDONLASTXMINUTES','m' => $this->_tpl_vars['mins']), $this);?>

    </div>
</div>
<br /><br />
<div style="width: 100%; font-size: 0.8em; text-align: center;">
    <?php echo smarty_function_pnml(array('name' => '_PNFORUM_POWEREDBY','html' => 1), $this);?>
&nbsp;<?php echo smarty_function_pnmodgetinfo(array('modname' => 'pnForum','info' => 'version'), $this);?>

</div>