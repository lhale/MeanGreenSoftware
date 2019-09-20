<?php /* Smarty version 2.6.14, created on 2007-10-23 09:25:26
         compiled from example_init_step2.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'example_init_step2.htm', 2, false),array('function', 'pnmodurl', 'example_init_step2.htm', 5, false),array('function', 'pnsecgenauthkey', 'example_init_step2.htm', 7, false),)), $this); ?>
<h2><?php echo smarty_function_pnml(array('name' => '_EXAMPLEINIT'), $this);?>
</h2>
<div style="text-align:center;">
<p><?php echo smarty_function_pnml(array('name' => '_EXAMPLEINITSTEP2','html' => 1), $this);?>
</p>
<form class="pn-adminform" action="<?php echo smarty_function_pnmodurl(array('modname' => 'Example','type' => 'init','func' => 'step2'), $this);?>
" method="post" enctype="application/x-www-form-urlencoded">
<div>
	<input type="hidden" name="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Example'), $this);?>
" />
	<div class="pn-adminformrow">
		<label for="example_bold"><?php echo smarty_function_pnml(array('name' => '_EXAMPLEINITBOLD'), $this);?>
</label>
		<input id="example_bold" name="bold" type="checkbox" value="1" />
	</div>
	<div class="pn-adminformrow">
		<label for="example_itemsperpage"><?php echo smarty_function_pnml(array('name' => '_EXAMPLEINITITEMSPERPAGE'), $this);?>
</label>
		<input id="example_itemsperpage" type="text" name="itemsperpage" size="3" value="10" />
	</div>
	<div class="pn-adminformrow">
		<label for="example_activate"><?php echo smarty_function_pnml(array('name' => '_EXAMPLEINITACTIVATE'), $this);?>
</label>
		<input id="example_activate" name="activate" type="checkbox" value="1" />
	</div>
	<div class="pn-adminformrow">
	<input name="submit" type="submit" value="<?php echo smarty_function_pnml(array('name' => '_SUBMIT'), $this);?>
" />
	</div>
</div>
</form>
</div>