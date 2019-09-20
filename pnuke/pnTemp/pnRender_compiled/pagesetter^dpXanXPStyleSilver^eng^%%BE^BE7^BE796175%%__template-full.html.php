<?php /* Smarty version 2.6.14, created on 2007-10-22 16:11:15
         compiled from __template-full.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'var', '__template-full.html', 1, false),array('function', '__field', '__template-full.html', 3, false),)), $this); ?>
<h1><?php echo smarty_function_var(array('name' => "core.title"), $this);?>
</h1>
<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
<?php echo $this->_tpl_vars['field']['title']; ?>
: <?php echo smarty_function___field(array('field' => $this->_tpl_vars['field']), $this);?>
<br/>
<?php endforeach; endif; unset($_from); ?>

<br/><br/>

<?php echo smarty_function_var(array('name' => "core.printThis"), $this);?>
 | <?php echo smarty_function_var(array('name' => "core.sendThis"), $this);?>
 | Hits: <?php echo smarty_function_var(array('name' => 'nocache','noDollar' => '1'), $this); echo smarty_function_var(array('name' => "core.hitCount"), $this); echo smarty_function_var(array('name' => "/nocache",'noDollar' => '1'), $this);?>
 | <?php echo smarty_function_var(array('name' => 'nocache','noDollar' => '1'), $this); echo smarty_function_var(array('name' => "core.editThis"), $this); echo smarty_function_var(array('name' => "/nocache",'noDollar' => '1'), $this);?>


<?php echo '
<!--[if $core.useDisplayHooks]-->
<!--[pnmodurl modname=pagesetter func=viewpub tid=$core.tid pid=$core.pid assign=viewUrl]-->
<!--[pnmodcallhooks hookobject=item hookaction=display hookid=$core.uniqueId module=pagesetter returnurl=$viewUrl]-->
<!--[/if]-->
'; ?>
