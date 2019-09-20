<?php /* Smarty version 2.6.14, created on 2007-10-05 08:32:49
         compiled from xanthiaadminnewtplform.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pnml', 'xanthiaadminnewtplform.htm', 5, false),array('function', 'pnsecgenauthkey', 'xanthiaadminnewtplform.htm', 29, false),)), $this); ?>
<script language="JavaScript" type="text/javascript">
	<!--
	function formSubmit(myform, target){
		if (myform.source.value == "") {
			alert("<?php echo smarty_function_pnml(array('name' => '_XA_TEMPLATE_SOURCE_VALIDATION'), $this);?>
");
			myform.source.focus();
			myform.source.select();
		}
		else if (myform.sourceTpl.value == "") {
			alert("<?php echo smarty_function_pnml(array('name' => '_XA_TEMPLATE_NAME_VALIDATION'), $this);?>
");
			myform.sourceTpl.focus();
			myform.sourceTpl.select();
		}
		else {

			document.myform.target="_self";
		    document.myform.action="index.php?module=Xanthia&type=admin&func=addTplFile";
			document.myform.submit();
		}
	} //-->
</script>
<?php echo $this->_tpl_vars['menu']; ?>

<form method="post" name="myform" action="">
<div>
	<table>
		<tr>
			<?php unset($this->_sections['formcontent']);
$this->_sections['formcontent']['name'] = 'formcontent';
$this->_sections['formcontent']['loop'] = is_array($_loop=$this->_tpl_vars['formcontent']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['formcontent']['show'] = true;
$this->_sections['formcontent']['max'] = $this->_sections['formcontent']['loop'];
$this->_sections['formcontent']['step'] = 1;
$this->_sections['formcontent']['start'] = $this->_sections['formcontent']['step'] > 0 ? 0 : $this->_sections['formcontent']['loop']-1;
if ($this->_sections['formcontent']['show']) {
    $this->_sections['formcontent']['total'] = $this->_sections['formcontent']['loop'];
    if ($this->_sections['formcontent']['total'] == 0)
        $this->_sections['formcontent']['show'] = false;
} else
    $this->_sections['formcontent']['total'] = 0;
if ($this->_sections['formcontent']['show']):

            for ($this->_sections['formcontent']['index'] = $this->_sections['formcontent']['start'], $this->_sections['formcontent']['iteration'] = 1;
                 $this->_sections['formcontent']['iteration'] <= $this->_sections['formcontent']['total'];
                 $this->_sections['formcontent']['index'] += $this->_sections['formcontent']['step'], $this->_sections['formcontent']['iteration']++):
$this->_sections['formcontent']['rownum'] = $this->_sections['formcontent']['iteration'];
$this->_sections['formcontent']['index_prev'] = $this->_sections['formcontent']['index'] - $this->_sections['formcontent']['step'];
$this->_sections['formcontent']['index_next'] = $this->_sections['formcontent']['index'] + $this->_sections['formcontent']['step'];
$this->_sections['formcontent']['first']      = ($this->_sections['formcontent']['iteration'] == 1);
$this->_sections['formcontent']['last']       = ($this->_sections['formcontent']['iteration'] == $this->_sections['formcontent']['total']);
?>
			<td>
				<input type="hidden" name="authid" id="authid" value="<?php echo smarty_function_pnsecgenauthkey(array('module' => 'Xanthia'), $this);?>
" />
				<input type="hidden" name="skinid" id="skinid" value="<?php echo $this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['skinid']; ?>
" />
				<input type="hidden" name="themename" id="themename" value="<?php echo $this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['themename']; ?>
" />
				<input type="hidden" name="newtype" id="newtype" value="<?php echo $this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['newtype']; ?>
" />
				<input type="hidden" name="tpl_module" id="tpl_module" value="<?php echo $this->_tpl_vars['formcontent'][$this->_sections['formcontent']['index']]['tpl_module']; ?>
" />
				<table>
					<tr>
						<th><?php echo smarty_function_pnml(array('name' => '_XA_NEW'), $this);?>
 <?php echo $this->_tpl_vars['skin']; ?>
 <?php echo smarty_function_pnml(array('name' => '_XA_THEME_TEMPLATE'), $this);?>
</th>
					</tr>
					<tr>
						<td>
							<?php echo smarty_function_pnml(array('name' => '_XA_TEMPLATE_NAME'), $this);?>

							<input type="text" name="sourceTpl" id="sourceTpl" value="" size="22" maxlength="50" tabindex="2" /><strong><?php echo smarty_function_pnml(array('name' => '_XA_TEMPLATE_NAME_INSTRUCTIONS'), $this);?>
</strong>
						</td>
					</tr>
					<tr>
						<td><textarea name="source" id="source" rows="25" cols="120" tabindex="1"></textarea></td>
					</tr>
					<tr>
						<td><input type="button" onClick="formSubmit(myform)" name="Submit" value="<?php echo smarty_function_pnml(array('name' => '_SUBMIT'), $this);?>
" /></td>
					</tr>
					<?php endfor; endif; ?>
				</table>
			</td>
		</tr>
	</table>
</div>
</form>