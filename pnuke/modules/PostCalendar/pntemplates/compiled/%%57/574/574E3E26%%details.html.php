<?php /* Smarty version 2.6.14, created on 2007-10-08 17:28:17
         compiled from default/admin/details.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'default/admin/details.html', 2, false),array('function', 'fetch', 'default/admin/details.html', 7, false),array('function', 'eval', 'default/admin/details.html', 8, false),array('function', 'pc_date_format', 'default/admin/details.html', 28, false),array('modifier', 'date_format', 'default/admin/details.html', 20, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "default.conf"), $this);?>

<?php echo smarty_function_config_load(array('file' => "lang.".($this->_tpl_vars['USER_LANG'])), $this);?>


<?php echo smarty_function_fetch(array('file' => ($this->_tpl_vars['TPL_STYLE_PATH'])."/details.css",'assign' => 'css'), $this);?>

<?php echo smarty_function_eval(array('var' => $this->_tpl_vars['css']), $this);?>


<table width="100%" border="0" cellpadding="5" cellspacing="0" class="calcontainer">
	<tr>
		<td class="eventtitle" width="100%" nowrap="nowrap">
			<b><?php echo $this->_tpl_vars['A_EVENT']['title']; ?>
</b>
		</td>
	</tr>
	<tr>
		<td class="eventtime" width="100%" nowrap="nowrap">
			<?php if ($this->_tpl_vars['A_EVENT']['alldayevent'] != true): ?>
				<?php if ($this->_tpl_vars['24HOUR_TIME']): ?>
					<?php $this->assign('timestamp', ((is_array($_tmp=$this->_tpl_vars['A_EVENT']['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%H:%M") : smarty_modifier_date_format($_tmp, "%H:%M"))); ?>
				<?php else: ?>
					<?php $this->assign('timestamp', ((is_array($_tmp=$this->_tpl_vars['A_EVENT']['startTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%I:%M %p") : smarty_modifier_date_format($_tmp, "%I:%M %p"))); ?>
				<?php endif; ?>
				<?php echo $this->_tpl_vars['timestamp']; ?>

			<?php endif; ?>
			
			<?php if ($this->_tpl_vars['USE_INT_DATES'] == true): ?>
				<?php echo smarty_function_pc_date_format(array('date' => $this->_tpl_vars['A_EVENT']['eventDate'],'format' => "%A, %d %B %Y"), $this);?>

			<?php else: ?>	
				<?php echo smarty_function_pc_date_format(array('date' => $this->_tpl_vars['A_EVENT']['eventDate'],'format' => "%A, %B %d %Y"), $this);?>

			<?php endif; ?>
			
			<?php if ($this->_tpl_vars['A_EVENT']['alldayevent']): ?>
				<?php echo $this->_config[0]['vars']['_PC_ALL_DAY']; ?>

			<?php else: ?>
				<?php echo $this->_config[0]['vars']['_PC_DURATION']; ?>
: <?php echo $this->_tpl_vars['A_EVENT']['duration_hours']; ?>
:<?php echo $this->_tpl_vars['A_EVENT']['duration_minutes']; ?>

			<?php endif; ?>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="5" cellspacing="0" class="calcontainer">
	<tr>
		<td valign="top" align="left" width="100%">
			<?php echo $this->_tpl_vars['A_EVENT']['hometext']; ?>

		</td>
		<td valign="top" align="left" nowrap="nowrap">
			<?php if ($this->_tpl_vars['LOCATION_INFO']): ?>
				<p><b><?php echo $this->_config[0]['vars']['_PC_LOCATION']; ?>
:</b><br />
				<?php if ($this->_tpl_vars['A_EVENT']['location'] != ''): ?>
					<?php echo $this->_tpl_vars['A_EVENT']['location']; ?>
<br />
				<?php endif; ?>
				<?php if ($this->_tpl_vars['A_EVENT']['street1'] != ''): ?>
					<?php echo $this->_tpl_vars['A_EVENT']['street1']; ?>
<br />
				<?php endif; ?>
				<?php if ($this->_tpl_vars['A_EVENT']['street2'] != ''): ?>
					<?php echo $this->_tpl_vars['A_EVENT']['street2']; ?>
<br />
				<?php endif; ?>
				<?php if ($this->_tpl_vars['A_EVENT']['city'] != ''): ?>
					<?php echo $this->_tpl_vars['A_EVENT']['city']; ?>

				<?php endif; ?>
				<?php if ($this->_tpl_vars['A_EVENT']['state'] != ''): ?>
					<?php echo $this->_tpl_vars['A_EVENT']['state']; ?>

				<?php endif; ?>
				<?php if ($this->_tpl_vars['A_EVENT']['postal'] != ''): ?>
					<?php echo $this->_tpl_vars['A_EVENT']['postal']; ?>

				<?php endif; ?>
				</p>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['CONTACT_INFO']): ?>
				<p><b><?php echo $this->_config[0]['vars']['_PC_CONTACT']; ?>
:</b><br />
				<?php if ($this->_tpl_vars['A_EVENT']['contname']): ?>
					<?php echo $this->_tpl_vars['A_EVENT']['contname']; ?>
<br />
				<?php endif; ?>
				<?php if ($this->_tpl_vars['A_EVENT']['conttel']): ?>
					<?php echo $this->_tpl_vars['A_EVENT']['conttel']; ?>
<br />
				<?php endif; ?>
				<?php if ($this->_tpl_vars['A_EVENT']['contemail']): ?>
					<a href="mailto:<?php echo $this->_tpl_vars['A_EVENT']['contemail']; ?>
"><?php echo $this->_tpl_vars['A_EVENT']['contemail']; ?>
</a><br />
				<?php endif; ?>
				<?php if ($this->_tpl_vars['A_EVENT']['website']): ?>
					<a href="<?php echo $this->_tpl_vars['A_EVENT']['website']; ?>
" target="_blank"><?php echo $this->_tpl_vars['A_EVENT']['website']; ?>
</a><br />
				<?php endif; ?>
				</p>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['A_EVENT']['fee'] != ''): ?>
				<br />Fee: <?php echo $this->_tpl_vars['A_EVENT']['fee']; ?>

			<?php endif; ?>
		</td>
	</tr>
</table>
<?php if ($this->_tpl_vars['ACCESS_EDIT']): ?>
	<a href="<?php echo $this->_tpl_vars['ADMIN_EDIT']; ?>
" <?php echo $this->_tpl_vars['ADMIN_TARGET']; ?>
><?php echo $this->_config[0]['vars']['_PC_ADMIN_EDIT']; ?>
</a>
<?php endif; ?>
<?php if ($this->_tpl_vars['ACCESS_DELETE']): ?>
	<a href="<?php echo $this->_tpl_vars['ADMIN_DELETE']; ?>
" <?php echo $this->_tpl_vars['ADMIN_TARGET']; ?>
><?php echo $this->_config[0]['vars']['_PC_ADMIN_DELETE']; ?>
</a>
<?php endif; ?>